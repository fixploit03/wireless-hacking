# hcxdumptool

Homepage: [https://github.com/ZerBea/hcxdumptool](https://github.com/ZerBea/hcxdumptool)

## Cara Instal

```
sudo apt-get update
sudo apt-get install hcxdumptool tshark
```

## Cara Menggunakan

> [!note]
> Versi `hcxdumptool` yang saya gunakan adalah versi 7.0.0

#### 1. Melihat daftar interface yang tersedia:

```
hcxdumptool -L
```

#### 2. Melihat detail informasi interface wireless:

```
hcxdumptool -I [interface]
```

#### 3. Aktifkan mode monitor:

```
sudo hcxdumptool -m [interface]
```

#### 4. Scan semua jarigan Wi-Fi:

Active scan:

```
sudo hcxdumptool -i [interface] --rcascan=a
```

Passive scan:

```
sudo hcxdumptool -i [interface] --rcascan=p
```

#### 5. Buat BPF (Berkeley Packet Filter):

Single target:

```
hcxdumptool --bpfc="wlan addr3 [bssid]" > filter.bpf
```

Multi target:

```
hcxdumptool --bpfc="wlan addr3 [bssid1] or wlan addr3 [bssid2]" > filter.bpf
```

#### 6. Capture Handshake dan PMKID

Capture handshake:

```
sudo hcxdumptool -i [interface] -w [output] --bpf=[file_bpf] --rds=2 --exitoneapol=2
```

Capture PMKID:

```
sudo hcxdumptool -i [interface] -w [output] --bpf=[file_bpf] --rds=2 --disable_disassociation --exitoneapol=1
```

#### 7. Konfirmasi Hasil Capture

Capture handshake:

```
tshark -r [file_capture] -Y "eapol"
```

Output:

```
122 14.826799628 Routerboardc_2c:fc:e3 → 3a:13:86:cb:c5:2c EAPOL 177 Key (Message 1 of 4)
123 14.835552424 3a:13:86:cb:c5:2c → Routerboardc_2c:fc:e3 EAPOL 175 Key (Message 2 of 4)
124 14.838616048 Routerboardc_2c:fc:e3 → 3a:13:86:cb:c5:2c EAPOL 211 Key (Message 3 of 4)
```

Capture PMKID:

```
tshark -r [file_capture] -Y "eapol && wlan_rsna_eapol.keydes.msgnr == 1" -T fields -e "wlan.rsn.ie.pmkid"
```

Output:

```
9d7b9c726cd3bdbdc9c056ae42972fb5
```
