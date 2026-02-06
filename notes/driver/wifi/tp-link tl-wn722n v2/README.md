# Instal Driver TP-Link TL-WN722N V2

#### 1. Update repositori Kali Linux:

```
sudo apt-get update
```

#### 2. Instal dependensi yang dibutuhkan:

```
sudo apt install -y dkms build-essential linux-headers-$(uname -r)
```

#### 3. Instal driver `8188eu`:

```
sudo apt-get install realtek-rtl8188eus-dkms
```

#### 4. Reboot sistem:

```
sudo reboot
```

#### 5. Verifikasi instalasi driver:

```
sudo airmon-ng
```

Output:

```
PHY     Interface       Driver          Chipset

phy0    wlan0           rtl8xxxu        TP-Link TL-WN722N v2/v3 [Realtek RTL8188EUS]

```

Dari output tersebut, driver masih menggunakan `rtl8xxxu`. Driver tersebut tidak direkomendasikan untuk digunakan dalam kegiatan pentest karena sering mengalami berbagai masalah.

#### Solusi: Ganti dengan Driver `8188eu`

#### 1. Blacklist driver `rtl8xxxu`:

```
echo "blacklist rtl8xxxu" | sudo tee -a /etc/modprobe.d/blacklist-rtl8xxxu.conf
```

#### 2. Unload driver `rtl8xxxu`:

```
sudo modprobe -r rtl8xxxu
```

#### 3. Load driver `8188eu`:

```
sudo modprobe 8188eu
```

#### 4. Update Initramfs:

```
sudo update-initramfs -u
```

#### 5. Reboot sistem:

```
sudo reboot
```

#### 6. Verifikasi ulang setelah reboot:

```
sudo airmon-ng
```

Output:

```
PHY     Interface       Driver          Chipset

phy0    wlan0           8188eu          TP-Link TL-WN722N v2/v3 [Realtek RTL8188EUS]
```
