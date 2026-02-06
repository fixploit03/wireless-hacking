# wpa_supplicant

#### Jalankan wpa_supplicant:

```
sudo wpa_supplicant -i [interface] -c [config_file] -D nl80211
```

#### Dapatkan IP:

```
sudo dhclient -v [interface]
```

#### Konfiramasi:

```
ip a show [interface]
```
