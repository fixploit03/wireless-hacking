# wpa_supplicant

Homepage: [https://w1.fi/wpa_supplicant/](https://w1.fi/wpa_supplicant/)

## Cara Instal

```
sudo apt-get update
sudo apt-get install wpasupplicant
```

## Cara Menggunakan

#### 1. Stop service NetworkManager:

```
systemctl stop NetworkManager
```

#### 2. Jalankan wpa_supplicant:

```
sudo wpa_supplicant -i [interface] -c [config_file] -D nl80211
```

Jika koneksi berhasil, akan muncul output `CTRL-EVENT-CONNECTED`.
