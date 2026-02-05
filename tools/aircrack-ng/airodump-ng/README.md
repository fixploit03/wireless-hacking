# Airodump-NG

## Penggunaan Dasar

#### Scan semua jaringan Wi-Fi:

```
sudo airodump-ng [interface]
```

## Opsi Filter

#### Scan berdasarkan nama Wi-Fi:

```
sudo airodump-ng --essid [essid] [interface]
```

#### Scan berdasarkan MAC address AP:

```
sudo airodump-ng --bssid [bssid] [interface]
```

#### Scan berdasarkan channel AP:

```
sudo airodump-ng --channel [channel] [interface]
```

#### Scan berdasarkan band yang digunakan:

```
sudo airodump-ng --band [band] [interface]
```

Daftar band yang tersedia:
- `a`: 802.11a (5 GHz)
- `b`: 802.11b (2.4 GHz)
- `g`: 802.11g (2.4 GHz)
  
#### Scan berdasarkan keamanan yang digunakan:

```
sudo airodump-ng --encrypt [keamanan] [interface]
```

Daftar keamanan yang tersedia:
- opn
- wep
- wpa
- wpa2
- wpa3
- owe
  
## Opsi Capture

#### Hanya capture IVs:

```
sudo airodump-ng --ivs [interface]
```

#### Simpan hasil capture ke file:

```
sudo airodump-ng --write [output] [interface]
```

#### Menentukan format hasil file capture:

```
sudo airodump-ng --write [output] --output-format [format] [interface]
```

Daftar format yang tersedia:
- pcap
- ivs
- csv
- gps
- kismet
- netxml
- logcsv

## Opsi Lainnya

#### Scan Wi-Fi dan menampilkan informasi WPS:

```
sudo airodump-ng --wps [interface]
```

#### Scan Wi-Fi dan menampilkan informasi vendor:

```
sudo airodump-ng --manufacturer [interface]
```

