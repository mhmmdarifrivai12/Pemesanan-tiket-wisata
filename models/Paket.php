<?php
class Paket {
    private $koneksi;

    public function __construct() {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataPaket() {
        $sql = "SELECT * FROM paket_wisata ORDER BY id DESC";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        return $ps->fetchAll();   
    }

    public function simpan($data) {
        $sql = "INSERT INTO paket_wisata (nama_paket, durasi, snack, harga_paket) 
                VALUES (?, ?, ?, ?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

    public function ubah($data) {
        $sql = "UPDATE paket_wisata SET nama_paket=?, durasi=?, snack=?, harga_paket=?
                WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

    public function hapus($id) {
        $sql = "DELETE FROM paket_wisata WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }
    public function getPaketById($id) {
        $sql = "SELECT * FROM paket_wisata WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch();  
    }
}
?>
