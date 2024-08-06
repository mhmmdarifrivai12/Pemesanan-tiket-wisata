<?php
class Pemesanan {
    private $koneksi;

    public function __construct() {
        global $dbh; 
        $this->koneksi = $dbh;
    }

    public function dataPemesanan() {
        try {
            $sql = "SELECT * FROM pemesanan ORDER BY id DESC";
            $ps = $this->koneksi->prepare($sql);
            $ps->execute();
            return $ps->fetchAll();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO pemesanan (nama, no_telp, alamat, wisata, paket_wisata, jumlah_tiket, tanggal_boking, tanggal_pemesanan, total_pembayaran, metode_pembayaran, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->koneksi->prepare($sql);
        $stmt->execute($data);
    }

    public function ubah($data) {
        try {
            $sql = "UPDATE pemesanan SET nama=?, no_telp=?, alamat=?, wisata=?, paket_wisata=?, jumlah_tiket=?, tanggal_boking=?, tanggal_pemesanan=?, total_pembayaran=?, metode_pembayaran=?, status=?
                    WHERE id=?";
            $ps = $this->koneksi->prepare($sql);
            $ps->execute($data);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function hapus($id) {
        try {
            $sql = "DELETE FROM pemesanan WHERE id=?";
            $ps = $this->koneksi->prepare($sql);
            $ps->execute([$id]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function ubahStatus($id, $status) {
        try {
            $sql = "UPDATE pemesanan SET status = :status WHERE id = :id";
            $stmt = $this->koneksi->prepare($sql);
            $stmt->execute(['status' => $status, 'id' => $id]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function ubahStatusHabis($id, $status) {
        try {
            $sql = "UPDATE pemesanan SET status = :status WHERE id = :id";
            $stmt = $this->koneksi->prepare($sql);
            $stmt->execute(['status' => $status, 'id' => $id]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getOrderById($id) {
        $sql = "SELECT * FROM pemesanan WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch();
    }
    

}
?>