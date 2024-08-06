<?php
// Konfigurasi koneksi database
$dsn = 'mysql:dbname=wisata_lampung;host=localhost';
$user = 'root';
$password = '';

try {
    // Membuat instance PDO untuk koneksi database
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'Sukses Koneksi database'; // Hapus atau uncomment untuk debugging
} catch (PDOException $e) {
    echo 'Terjadi kesalahan saat koneksi/query dgn sebab ' . $e->getMessage();
    exit(); // Keluar jika koneksi gagal
}
?>
