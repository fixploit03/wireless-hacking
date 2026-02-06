# Instal Linux Headers Kali Linux 2025.4

#### 1. Cek versi kernel saat ini:

```
uname -r
```

Output:

```
6.16.8+kali-amd64
```

#### 2. Download file .deb:

```
wget -4 https://github.com/fixploit03/wireless-hacking/raw/refs/heads/main/notes/linux-headers/kali%202025.4/deb/linux-headers-6.16.8+kali-amd64_6.16.8-1kali1_amd64.deb
wget -4 https://github.com/fixploit03/wireless-hacking/raw/refs/heads/main/notes/linux-headers/kali%202025.4/deb/linux-headers-6.16.8+kali-common_6.16.8-1kali1_all.deb
wget -4 https://github.com/fixploit03/wireless-hacking/raw/refs/heads/main/notes/linux-headers/kali%202025.4/deb/linux-kbuild-6.16.8+kali_6.16.8-1kali1_amd64.deb
```

#### 3. Instal paket .deb:

```
sudo dpkg -i *.deb
```

#### 4. Jika ada error dependensi, perbaiki dengan:

```
sudo apt-get install -f
```

#### 5. Konfirmasi instalasi:

```
dpkg -l | grep linux-headers
```

Pastikan output menampilkan paket sesuai versi kernel yang terinstal:

```
ii  linux-headers-6.16.8+kali-amd64        6.16.8-1kali1                            amd64        Header files for Linux 6.16.8+kali-amd64
ii  linux-headers-6.16.8+kali-common       6.16.8-1kali1                            all          Common header files for Linux 6.16.8+kali
```
