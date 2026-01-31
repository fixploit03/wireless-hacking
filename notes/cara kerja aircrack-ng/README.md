# Cara Kerja Aircrack-NG

Buat ngecek password WPA/WPA2-PSK, Aircrack-NG kaga langsung nyerang AP, tapi dia ngecrack password secara offline make data dari 4-Way Handshake yang ada di file capture.

Bahan yang diperluin:
- SSID
- Password (PSK)
- MAC AP
- MAC STA
- ANonce
- SNonce
- EAPOL Frame M2

> [!NOTE]
> Di EAPOL Frame M2 ada MIC, yang nantinya dipake buat ngebandingin sama MIC yang lu itung sendiri. Kalo MIC yang lu itung itu sama ama MIC yang ada di EAPOL Frame M2, berarti kata sandinya bener.

## Latihan

Gw punya bahan buat lu pake:
- File capture:
  - `beacon.pcapng`
  - `eapol1.pcapng`
  - `eapol2.pcapng`
- Password:
  - `10101010`
  - `12345678`
- Script python buat ngitung MIC

**Tugas**

#### 1. Cari SSID

```
tshark -r [file_capture] -Y "wlan.fc.type_subtype == 8" -T fields -e "wlan.ssid" | xxd -r -p
```

#### 2. Cari MAC AP

```
tshark -r [file_capture] -Y "wlan.fc.type_subtype == 8" -T fields -e "wlan.sa"
```

#### 3. Cari MAC STA

```
tshark -r [file_capture] -Y "wlan_rsna_eapol.keydes.msgnr == 2" -T fields -e "wlan.sa"
```

#### 4. Cari ANonce

```
tshark -r [file_capture] -Y "wlan_rsna_eapol.keydes.msgnr == 1" -T fields -e "wlan_rsna_eapol.keydes.nonce"
```

#### 5. Cari SNonce

```
tshark -r [file_capture] -Y "wlan_rsna_eapol.keydes.msgnr == 2" -T fields -e "wlan_rsna_eapol.keydes.nonce"
```

#### 6. Cari EAPOL Frame M2

```
tshark -r[file_capture] -Y "wlan_rsna_eapol.keydes.msgnr == 2" -x
```
