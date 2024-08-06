<?php
// Cek apakah sesi pengguna telah diinisialisasi
$sesi = $_SESSION['USERS'];
if (isset($sesi)) {
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="section-title">
                <h3>Form <span class="alternate">Paket Wisata</span></h3>
            </div>
        </div>
    </div>
    <form action="controllers/paket_controller.php" method="POST" class="row">
        <!-- Nama Paket -->
        <div class="col-md-6 mt-5">
            <label class="form-label fw-bold">Nama Paket</label>
            <input type="text" class="form-control main" name="nama_paket" id="nama_paket" placeholder="Nama Paket" required>
        </div>

        <!-- Durasi -->
        <div class="col-md-6 mt-5">
            <label class="form-label fw-bold">Durasi (hari)</label>
            <input type="number" class="form-control main" name="durasi" id="durasi" placeholder="Durasi dalam hari" required>
        </div>

        <!-- Snack -->
        <div class="col-md-6 mt-5">
            <label class="form-label fw-bold">Snack</label>
            <input type="text" class="form-control main" name="snack" id="snack" placeholder="Snack" required>
        </div>

        <!-- Harga Paket -->
        <div class="col-md-6 mt-5">
            <label class="form-label fw-bold">Harga Paket</label>
            <input type="number" class="form-control main" name="harga_paket" id="harga_paket" placeholder="Harga Paket" required>
        </div>

        <!-- Submit and Cancel Buttons -->
        <div class="col-12 text-center mt-4">
            <button type="submit" name="proses" value="simpan" class="btn btn-success btn-md m-3">Simpan</button>
            <button type="reset" class="btn btn-danger btn-md">Batal</button>
        </div>
    </form>
</div>

<?php 
} else {
    echo '<script>alert("Anda Harus Login Dahulu!!!");history.back();</script>';
}
?>
