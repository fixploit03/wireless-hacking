# macchanger

Homepage: [https://github.com/alobbs/macchanger](https://github.com/alobbs/macchanger)

## Cara Instal

```
sudo apt-get update
sudo apt-get install macchanger
```

## Cara Menggunakan

> [!note]
> Sebelum mengganti MAC address, interface harus dalam keadaan tidak aktif. Jika MAC address sudah diganti, interface harus diaktifkan lagi.
> Perintah:
> 
- Menonaktifkan interface: `sudo ip link set [interface] down`
- Mengaktifkan interface: `sudo ip link set [interface] up`

#### Mengganti MAC address secara random:

```
sudo macchanger -r [interface]
```

#### Mengganti MAC address ke MAC tertentu:

```
sudo macchanger -m [mac] [interface]
```

#### Mengembalikan MAC address ke MAC aslinya:

```
sudo macchanger -p [interface]
```

#### Melihat MAC address saat ini:

```
sudo macchanger -s [interface]
```
