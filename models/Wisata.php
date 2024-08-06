<?php
require_once __DIR__ . '/../koneksi.php';
class Wisata {

    private $pdo;

    // Konstruktor untuk koneksi database
    public function __construct() {
        global $dbh; // Mengakses variabel global $dbh
        $this->pdo = $dbh; // Menetapkan koneksi database ke properti objek
    }

    // Method untuk mengambil semua data wisata
    public function dataWisata() {
        $sql = "SELECT * FROM wisata ORDER BY id DESC";
        $ps = $this->pdo->prepare($sql);
        $ps->execute();
        return $ps->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method untuk mengambil data wisata berdasarkan ID
    public function getWisata($id) {
        $sql = "SELECT * FROM wisata WHERE id = ?";
        $ps = $this->pdo->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch(PDO::FETCH_ASSOC);
    }

    // Method untuk menyimpan data wisata
    public function simpan($data) {
        $sql = "INSERT INTO wisata (nama, lokasi, deskripsi, harga, tanggal_rilis, cover) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $ps = $this->pdo->prepare($sql);
        $ps->execute($data);
    }

    // Method untuk mengubah data wisata
    public function ubah($data) {
        $sql = "UPDATE wisata SET nama=?, lokasi=?, deskripsi=?, harga=?, tanggal_rilis=?, cover=?
                WHERE id=?";
        $ps = $this->pdo->prepare($sql);
        $ps->execute($data);
    }

    // Method untuk menghapus data wisata
    public function hapus($id) {
        // Ambil nama file gambar dari database
        $sql = "SELECT cover FROM wisata WHERE id = ?";
        $ps = $this->pdo->prepare($sql);
        $ps->execute([$id]);
        $result = $ps->fetch(PDO::FETCH_ASSOC);
        $cover = $result['cover'];
    
        // Hapus entri dari database
        $sql = "DELETE FROM wisata WHERE id = ?";
        $ps = $this->pdo->prepare($sql);
        $ps->execute([$id]);
    
        // Hapus file gambar dari server jika ada
        if ($cover && file_exists('../assets/img/wisata/' . $cover)) {
            unlink('../assets/img/wisata/' . $cover);
        }
    }

    // Method untuk mengambil data wisata berdasarkan ID dengan bindParam
    public function getById($id) {
        $sql = "SELECT * FROM wisata WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRecentWisata($limit = 5) {
        $sql = "SELECT * FROM wisata ORDER BY tanggal_rilis DESC LIMIT ?";
        $ps = $this->pdo->prepare($sql);
        $ps->bindValue(1, $limit, PDO::PARAM_INT);
        $ps->execute();
        return $ps->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
