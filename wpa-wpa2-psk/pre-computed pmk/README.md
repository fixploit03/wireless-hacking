# Pre‑Computed PMK

Pre‑Computed PMK adalah teknik menghitung Pairwise Master Key (PMK) terlebih dahulu berdasarkan ESSID dan wordlist untuk mempercepat proses cracking kunci WPA/WPA2‑PSK.

## Langkah-Langkah

### 1. Membuat Database PMK

#### 1. Import ESSID

```
airolib-ng [nama_db] --import essid [list_essid]
```

#### 2. Import Wordlist

```
airolib-ng [nama_db] --import passwd [wordlist]
```

#### 3. Bersihkan Database

```
airolib-ng [nama_db] --clean all
```

#### 4. Hitung PMK

```
airolib-ng [nama_db] --batch
```

#### 5. Cek Isi Database

```
airolib-ng [nama_db] --stats
```

#### 6. Verifikasi Database

```
airolib-ng [nama_db] --verify all
```

> [!NOTE]
> Database yang dihasilkan dari proses `--batch` hanya dapat digunakan untuk ESSID yang telah di‑import, karena PMK bersifat spesifik terhadap ESSID dan tidak dapat digunakan pada jaringan Wi‑Fi dengan ESSID yang berbeda.

### 2. Crack Kunci WPA/WPA2‑PSK

```
aircrack-ng [file_capture] -r [nama_db]
```

### 3. Opsional

#### 1. Import dari File Cowpatty

```
airolib-ng [nama_db] --import cowpatty [file]
```

#### 2. Export ke File Cowpatty

```
airolib-ng [nama_db] --export cowpatty [essid] [output]
```
