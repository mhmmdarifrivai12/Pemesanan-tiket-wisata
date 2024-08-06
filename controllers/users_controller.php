<?php
session_start();
include_once '../koneksi.php';
include_once '../models/Users.php';


$username = $_POST['username'];
$password = $_POST['password'];


$data = [
    $username, 
    $password 
];


$model = new Users();
$rs = $model->cekLogin($data);

if (!empty($rs)) { 
    $_SESSION['USERS'] = $rs;
    
    header('Location: ../index.php?hal=home');
    exit();
} else { 
    $_SESSION['login_error'] = 'Username atau Password Anda Salah!!!';
    header('Location: ../login_form.php');
    exit();
}
?>
