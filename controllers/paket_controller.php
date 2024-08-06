<?php

include_once '../koneksi.php';
include_once '../models/Paket.php'; 

// Capture form data
$nama_paket = $_POST['nama_paket'];
$durasi = $_POST['durasi'];
$snack = $_POST['snack'];
$harga_paket = $_POST['harga_paket']; 


$data = [
    $nama_paket, 
    $durasi, 
    $snack, 
    $harga_paket 
];

$model = new Paket();

$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data); 
        break;

    case 'ubah':
        $data[] = $_POST['idx']; 
        $model->ubah($data); 
        break;

    case 'hapus':
        $model->hapus($_POST['idx']); 
        break;
        
    default:
        header('location:../index.php?hal=paket_wisata');
        exit();
}

// Redirect after processing
header('location:../index.php?hal=paket_wisata');
exit();
?>
