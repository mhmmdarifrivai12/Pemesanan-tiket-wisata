<?php
session_start(); //memulai session

//------sertakan file koneksi db------
include_once 'koneksi.php';
///------sertakan models------
include_once 'models/Users.php';
include_once 'models/wisata.php';
include_once 'models/Pemesanan.php';
include_once 'models/Paket.php';

//------sertakan potongan2 file template web------
include_once 'header.php';
include_once 'navigation.php';
echo '<br/>';
// area main di logic
// tangkap request menu di url (index.php?hal=.....)
$hal = $_REQUEST['hal'];
//jika ada request dari menu di url tampilkan hal sesuai request
if(!empty($hal)){
    include_once $hal.'.php';
}
else{//jika tidak ada request dari menu di url tampilkan hal home.php
    include_once 'home.php';
}

include_once 'footer.php';

