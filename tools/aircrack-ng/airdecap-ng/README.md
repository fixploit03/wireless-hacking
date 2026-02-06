# Airdecap-NG

#### Decrypt trafik WEP:

```
airdecap-ng -e [essid] -b [bssid] -w [kunci wep] -o [output] [file_capture]
```

Format kunci WEP (hex):
- **64-bit:** 10 karakter
- **128-bit:** 26 karakter

#### Decrypt trafik WPA/WPA2-PSK:

```
airdecap-ng -e [essid] -b [bssid] -p [password] -o [output] [file_capture]
```

Selain opsi `-p [password]`, bisa juga pakai PMK:

```
airdecap-ng -e [essid] -b [bssid] -k [pmk] -o [output] [file_capture]
```

Format kunci WPA/WPA2-PSK:
- **Password (ASCII):** 8-63 karakter
- **PMK (Hex):** 64 karakter
