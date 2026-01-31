# Temukan PSK yang Valid

Untuk menguji kata sandi Wi-Fi WPA/WPA2-PSK, Aircrack-NG tidak melakukan serangan secara langsung terhadap Access Point (AP). Proses cracking dilakukan secara offline dengan memanfaatkan data 4-Way Handshake yang tersimpan dalam file capture.

Aircrack-NG akan mencoba berbagai kandidat kata sandi, kemudian memverifikasi kebenarannya dengan cara menghitung nilai MIC (Message Integrity Code) dan membandingkannya dengan MIC yang terdapat pada frame EAPOL.

Data yang diperlukan:
- SSID
- PSK
- MAC AP
- MAC STA
- ANonce
- SNonce
- EAPOL Frame M2

> [!NOTE]
> Pada EAPOL Frame Message 2 (M2) terdapat nilai MIC. Nilai MIC ini digunakan sebagai pembanding dengan MIC yang dihitung secara lokal menggunakan kata sandi yang sedang diuji.
>
> Jika nilai MIC hasil perhitungan sama dengan MIC pada EAPOL M2, maka kata sandi tersebut valid.

## Latihan

> [!NOTE]
> Agar Anda memahami apa yang sedang dikerjakan, silakan baca catatan berikut: [http://github.com/fixploit03/wireless-hacking/tree/main/notes/4-way%20handshake](http://github.com/fixploit03/wireless-hacking/tree/main/notes/4-way%20handshake)

**Kisi-Kisi:**
- File Capture:
  - `beacon.pcapng`: Berisi beacon frame
  - `eapol1.pcapng`: Berisi EAPOL frame M1-M4
  - `eapol2.pcapng`: Berisi EAPOL frame M1-M2
- Kandidat Password Wi-Fi:
  - `10101010`
  - `12345678`
    
Berikut langkah-langkah untuk mengekstrak setiap parameter yang dibutuhkan dari file capture menggunakan `tshark`.

#### 1. Mencari SSID

```
tshark -r beacon.pcapng -Y "wlan.fc.type_subtype == 8" -T fields -e "wlan.ssid" | xxd -r -p
```

#### 2. Mencari MAC AP

```
tshark -r beacon.pcapng -Y "wlan.fc.type_subtype == 8" -T fields -e "wlan.sa" | tr -d ":"
```

#### 3. Mencari MAC STA

```
tshark -r eapol1.pcapng -Y "wlan_rsna_eapol.keydes.msgnr == 2" -T fields -e "wlan.sa" | tr -d ":"
```

```
tshark -r eapol2.pcapng -Y "wlan_rsna_eapol.keydes.msgnr == 2" -T fields -e "wlan.sa" | tr -d ":"
```

#### 4. Mencari ANonce

```
tshark -r eapol1.pcapng -Y "wlan_rsna_eapol.keydes.msgnr == 1" -T fields -e "wlan_rsna_eapol.keydes.nonce"
```

```
tshark -r eapol2.pcapng -Y "wlan_rsna_eapol.keydes.msgnr == 1" -T fields -e "wlan_rsna_eapol.keydes.nonce"
```

#### 5. Mencari SNonce

```
tshark -r eapol1.pcapng -Y "wlan_rsna_eapol.keydes.msgnr == 2" -T fields -e "wlan_rsna_eapol.keydes.nonce"
```

```
tshark -r eapol2.pcapng -Y "wlan_rsna_eapol.keydes.msgnr == 2" -T fields -e "wlan_rsna_eapol.keydes.nonce"
```

#### 6. Mencari EAPOL Frame M2

```
tshark -r eapol1.pcapng -Y "wlan_rsna_eapol.keydes.msgnr == 2" -x
```

```
tshark -r eapol2.pcapng -Y "wlan_rsna_eapol.keydes.msgnr == 2" -x
```

![](https://github.com/fixploit03/wireless-hacking/blob/main/challenge/temukan%20psk%20yang%20valid/img/tshark.png)

#### 7. Menghitung MIC

Target MIC diperoleh dari file capture yang menyelesaikan proses 4‑Way Handshake.

Lakukan perhitungan MIC menggunakan script Python:

```
python3 main.py
```

Jika nilai MIC yang dihasilkan identik dengan MIC pada EAPOL M2, maka kata sandi yang diuji adalah benar.

## Tantangan

Tentukan kata sandi Wi‑Fi yang valid:

```
_ _ _ _ _ _ _ _
```
