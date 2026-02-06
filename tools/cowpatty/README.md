# Cowpatty

Homepage: [https://github.com/joswr1ght/cowpatty](https://github.com/joswr1ght/cowpatty)

## Cara Instal

```
sudo apt-get update
sudo apt-get install cowpatty
```

## Cara Menggunakan

#### Cek 4-Way Handshake:

```
cowpatty -s [ssid] -r [file_capture] -c 
```

#### Dictionary Attack:

```
cowpatty -s [ssid] -r [file_capture] -f [wordlist] 
```

#### Pre-computed PMK:

```
cowpatty -s [ssid] -r [file_capture] -d [file_genpmk] 
```

> [!tip]
> Tambahkan opsi `-v` untuk menampilkan output yang lebih detail (mode verbose).
