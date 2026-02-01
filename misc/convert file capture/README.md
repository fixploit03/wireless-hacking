# Convert File Capture

Kalo lu ngalamin kendala pas lagi ngejalanin `aircrack-ng`:

```
aircrack-ng LATIHAN-01.pcapng
```

Outputnya kaya gini:

```
Reading packets, please wait...
Opening LATIHAN-01.pcapng
Unsupported file format (not a pcap or IVs file).
Read 0 packets.

No networks found, exiting.


Quitting aircrack-ng...
```

Itu artinya `aircrack-ng` kaga support sama format `pcapng`. Solusinya, lu kudu ubah dulu formatnya ke format `pcap`.

## Caranya

#### Ubah Format

```
editcap -F pcap LATIHAN-01.pcapng LATIHAN-01.pcap
```

#### Jalanin Aircrack-NG

```
aircrack-ng LATIHAN-01.pcap
```

Output:

```
Reading packets, please wait...
Opening LATIHAN-01.pcap
Read 904 packets.

   #  BSSID              ESSID                     Encryption

   1  04:CC:BC:1A:8B:54  HUAWEI-2.4G-Jq7W          WPA (0 handshake)
   2  84:16:F9:FE:64:68  LATIHAN                   WPA (1 handshake)

Index number of target network ? 
```

Gimana, bisa kaga?
