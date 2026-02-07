# hcxdumptool

Homepage: [https://github.com/ZerBea/hcxdumptool](https://github.com/ZerBea/hcxdumptool)

## Cara Instal

```
sudo apt-get update
sudo apt-get install hcxdumptool
```

## Cara Menggunakan

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
