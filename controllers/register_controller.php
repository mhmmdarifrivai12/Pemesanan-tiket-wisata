<?php
include_once '../koneksi.php';
include_once '../models/Users.php';


session_start();


$nama = $_POST['fullname'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$no_hp = $_POST['no_hp'];
$role = $_POST['role'];


$foto = '';
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $file_tmp = $_FILES['foto']['tmp_name'];
    $file_name = basename($_FILES['foto']['name']);
    $foto = $file_name; 

    
    $upload_dir = '../assets/img/profile/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    
    move_uploaded_file($file_tmp, $upload_dir . $foto);
}


$data = [
    $nama, 
    $jenis_kelamin,
    $email,
    $username,
    $password,
    $no_hp,
    $role, 
    $foto, 
];

$model = new Users();

$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);

        $_SESSION['notification'] = 'Pendaftaran berhasil!';
        break;
    
    case 'ubah':
        $data[] = $_POST['idx'];
        $model->ubah($data);
        break;
    
    case 'hapus':
        unset($data); 
        $model->hapus($_POST['idx']);
        break;
    
    default:
        header('location:../login_form.php');
        exit;
}


header('location:../login_form.php');
exit;
?>
