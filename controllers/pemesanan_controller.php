<?php

include_once '../koneksi.php';
include_once '../models/Pemesanan.php';


$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$no_telp = isset($_POST['no_telp']) ? $_POST['no_telp'] : '';
$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
$wisata = isset($_POST['wisata']) ? $_POST['wisata'] : '';

$paket_wisata = isset($_POST['paket_wisata']) && is_array($_POST['paket_wisata']) ? implode(', ', $_POST['paket_wisata']) : '';

$jumlah_tiket = isset($_POST['jumlah_tiket']) ? $_POST['jumlah_tiket'] : '';
$tanggal_boking = isset($_POST['tanggal_boking']) ? $_POST['tanggal_boking'] : '';
$tanggal_pemesanan = isset($_POST['tanggal_pemesanan']) ? $_POST['tanggal_pemesanan'] : '';
$metode_pembayaran = isset($_POST['metode_pembayaran']) ? $_POST['metode_pembayaran'] : '';
$total_pembayaran = isset($_POST['total_pembayaran']) ? $_POST['total_pembayaran'] : '';
$status = 'pending'; 

$data = [
    $nama,
    $no_telp,
    $alamat,
    $wisata,
    $paket_wisata,
    $jumlah_tiket,
    $tanggal_boking,
    $tanggal_pemesanan,
    $total_pembayaran,
    $metode_pembayaran,
    $status
];

$model = new Pemesanan();

$tombol = isset($_REQUEST['proses']) ? $_REQUEST['proses'] : '';
switch ($tombol) {
    case 'simpan':
        $model->simpan($data); 
        break;

    case 'ubah':
        $data[] = isset($_POST['idx']) ? $_POST['idx'] : ''; 
        $model->ubah($data); 
        break;

    case 'hapus':
        if (isset($_POST['idx'])) {
            $model->hapus($_POST['idx']); 
        }
        break;
    
    case 'accept':
        if (isset($_POST['idx'])) {
            $model->ubahStatus($_POST['idx'], 'Diterima'); 
        }
        break;

    case 'habis':
        if (isset($_POST['idx'])) {
            $model->ubahStatusHabis($_POST['idx'], 'Tiket Habis'); 
        }
        break;
    
    default:
        header('location:../index.php?hal=pemesanan');
        exit();
}

header('location:../index.php?hal=pemesanan');
exit();
?>
