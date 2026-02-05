# Airmon-NG

Menampilkan daftar interface wireless, driver, dan chipset yang digunakan:

```
sudo airmon-ng
```

Melihat proses yang sedang berjalan pada interface wireless:

```
sudo airmon-ng check
```

Mematikan proses yang sedang berjalan pada interface wireless:

```
sudo airmon-ng check kill
```

Mengaktifkan mode monitor:

```
sudo airmon-ng start [interface]
```

Mengaktifkan mode monitor pada channel atau frekuensi tertentu:

```
sudo airmon-ng start [interface] [channel] | [frequency]
```

Menonaktifkan mode monitor:

```
sudo airmon-ng stop [interface]
```
