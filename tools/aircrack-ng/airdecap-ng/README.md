# Airdecap-NG

#### Decrypt kunci WEP:

```
airdecap-ng -e [essid] -b [bssid] -w [kunci wep] -o [output] [file_capture]
```

Kunci WEP dalam format hex:
- **64-bit:** 10 karakter
- **128-bit:** 26 karakter

#### Decrypt kunci WPA/WPA2-PSK:

```
airdecap-ng -e [essid] -b [bssid] -p [password] -o [output] [file_capture]
```

Selain bisa menggunakan opsi `-p [password]`, bisa juga menggunakan opsi `-k [pmk]`.

Kunci WPA/WPA2-PSK:
- **Password (ASCII):** 8-63 karakter
- **PMK (Hex):** 64 karakter
