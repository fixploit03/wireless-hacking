# hostapd-mana

#### 1. Kill semua proses yang mengganggu:

```
sudo airmon-ng check kill
```

#### 2. Ubah interface ke mode managed:

```
sudo ip link set [interface] down
sudo iw dev [interface] set type managed
sudo ip link set [interface] up
```

#### 3. Jalankan hostapd-mana:

```
sudo hostapd-mana [config_file]
```
