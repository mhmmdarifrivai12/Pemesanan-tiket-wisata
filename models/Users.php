<?php
class Users {
    private $koneksi;

    public function __construct() {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataUsers() {
        $sql = "SELECT * FROM users ORDER BY id DESC";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll(); 
        return $rs;   
    }
    
    public function getUsers($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch(); 
        return $rs;   
    }

    public function simpan($data) {
        $sql = "INSERT INTO users (fullname, jenis_kelamin, email, username, password, no_hp, role, foto)
                VALUES (?,?,?,?,SHA1(MD5(SHA1(?))),?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

    public function ubah($data) {
        $sql = "UPDATE users SET fullname=?, jenis_kelamin=?, email=?, username=?, 
                password=SHA1(MD5(SHA1(?))), no_hp=?, role=?, foto=? WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    
    public function hapus($id) {
        $sql = "DELETE FROM users WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }

    public function cekLogin($data) {
        $sql = "SELECT * FROM users WHERE username = ? AND password = SHA1(MD5(SHA1(?)))";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
        $rs = $ps->fetch(); 
        return $rs;   
    }
}
