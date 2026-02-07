# Fern Wi-Fi Cracker

Homepage: [https://github.com/savio-code/fern-wifi-cracker](https://github.com/savio-code/fern-wifi-cracker)

## Cara Instal

```
sudo apt-get update
sudo apt-get install fern-wifi-cracker
```

## Cara Menggunakan

#### 1. Kill semua proses yang dapat mengganggu mode monitor:

```
sudo airmon-ng check kill
```

#### 2. Aktifkan mode monitor:

```
sudo airmon-ng start [interface]
```

#### 3. Ubah nama interface wireless:

```
sudo ip link set [interface] down
sudo ip link set [interface] name [interface]mon
sudo ip link set [interface]mon up
```

> [!important]
> Mengapa nama interface wireless perlu diubah? Karena Fern Wi-Fi Cracker memerlukan interface dengan nama yang spesifik (biasanya berakhiran `mon`) agar dapat berfungsi dengan baik tanpa error.

#### 4. Jalankan Fern Wi-Fi Cracker:

```
sudo fern-wifi-cracker
```

Fern Wi-Fi Cracker terdiri dari beberapa menu, di antaranya:

![](https://github.com/fixploit03/wireless-hacking/blob/main/tools/fern-wifi-cracker/img/fern1.png)

#### 5. Pilih interface wireless yang ingin digunakan:

![](https://github.com/fixploit03/wireless-hacking/blob/main/tools/fern-wifi-cracker/img/fern2.png)

#### 6. Scan AP:

![](https://github.com/fixploit03/wireless-hacking/blob/main/tools/fern-wifi-cracker/img/fern3.png)

#### 7. Klik menu menampilkan AP WPA:

![](https://github.com/fixploit03/wireless-hacking/blob/main/tools/fern-wifi-cracker/img/fern4.png)

#### 8. Klik AP yang ingin diserang:

![](https://github.com/fixploit03/wireless-hacking/blob/main/tools/fern-wifi-cracker/img/fern5.png)

#### 9. Klik browse untuk mencari wordlist yang ingin digunakan:

![](https://github.com/fixploit03/wireless-hacking/blob/main/tools/fern-wifi-cracker/img/fern6.png)

#### 10. Pilih wordlist yang ingin digunakan:

Semua wordlist yang ada di Kali Linux tersimpan di direktori `/usr/share/wordlists`.

![](https://github.com/fixploit03/wireless-hacking/blob/main/tools/fern-wifi-cracker/img/fern7.png)

#### 11. Klik tombol Wi-Fi Attack untuk memulai serangan:

Fern Wi-Fi Cracker secara otomatis akan menangkap handshake, melakukan serangan deauth, dan mengcrack kunci Wi-Fi WPA/WPA2-PSK. Tugas kita hanya tinggal menunggu saja.

![](https://github.com/fixploit03/wireless-hacking/blob/main/tools/fern-wifi-cracker/img/fern8.png)

#### 12. Lihat Hasil:

Setelah menunggu beberapa lama, akhirnya kunci Wi-Fi WPA/WPA2-PSK berhasil ditemukan.

Kuncinya: `10101010`

![](https://github.com/fixploit03/wireless-hacking/blob/main/tools/fern-wifi-cracker/img/fern9.png)

#### 13. Klik Key Database untuk melihat kunci yang berhasil di-crack:

![](https://github.com/fixploit03/wireless-hacking/blob/main/tools/fern-wifi-cracker/img/fern10.png)

#### 14. Lihat database yang sudah berhasil di-crack:

Database berisi informasi:
- Nama AP
- MAC address AP
- Jenis keamanan
- Key (Password Wi-Fi)
- Channel
  
![](https://github.com/fixploit03/wireless-hacking/blob/main/tools/fern-wifi-cracker/img/fern11.png)
