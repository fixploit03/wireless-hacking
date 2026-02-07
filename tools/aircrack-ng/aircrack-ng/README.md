# Aircrack-NG

#### Crack kunci WEP:

Menggunakan PTW Attack:

```
aircrack-ng -a 1 -e [essid] -b [bssid] [file_capture] -l [output]
```

Menggunakan FMS/KoreK Attack:

```
aircrack-ng -a 1 -K -e [essid] -b [bssid] [file_capture] -l [output]
```

#### Crack kunci WPA/WPA2-PSK:

Menggunakan handshake:

```
aircrack-ng -a 2 -e [essid] -b [bssid] [file_capture] -w [wordlist] -l [output]
```

Menggunakan PMKID:

```
aircrack-ng -I [pmkid]*[mac_ap]*[mac_sta]*[ssid_hex] -w [wordlist]
```

Menggunakan database PMK:

```
aircrack-ng -r [nama_db] [file_capture]
```
