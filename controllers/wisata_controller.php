<?php

include_once '../koneksi.php';
include_once '../models/Wisata.php';


$nama = $_POST['nama'];
$lokasi = $_POST['lokasi'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$tanggal_rilis = $_POST['tanggal_rilis'];


$cover = '';
if (isset($_FILES['cover']) && $_FILES['cover']['error'] == UPLOAD_ERR_OK) {
    $file_tmp = $_FILES['cover']['tmp_name'];
    $file_name = basename($_FILES['cover']['name']);
    $cover = $file_name; 

    
    $upload_dir = '../assets/img/wisata/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    
    move_uploaded_file($file_tmp, $upload_dir . $cover);
}


$data = [
    $nama, 
    $lokasi,
    $deskripsi,
    $harga,
    $tanggal_rilis,
    $cover 
];


$model = new Wisata();

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
        header('location:../index.php?hal=wisata');
        exit();
}


header('location:../index.php?hal=wisata');
exit();
?>
