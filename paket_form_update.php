<?php
$model = new Paket();
// Call the function to retrieve data
$data_pemesanan = $model->dataPaket();


// Jika ada parameter `idx`, ambil data paket untuk diupdate
if (isset($_GET['idx'])) {
    $model = new Paket();
    $data_paket = $model->getPaketById($_GET['idx']);
}

// Check user session
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
            <input type="text" class="form-control main" name="nama_paket" id="nama_paket" placeholder="Nama Paket" 
                value="<?= isset($data_paket) ? $data_paket['nama_paket'] : '' ?>" required>
        </div>

        <!-- Durasi -->
        <div class="col-md-6 mt-5">
            <label class="form-label fw-bold">Durasi (hari)</label>
            <input type="number" class="form-control main" name="durasi" id="durasi" placeholder="Durasi dalam hari" 
                value="<?= isset($data_paket) ? $data_paket['durasi'] : '' ?>" required>
        </div>

        <!-- Snack -->
        <div class="col-md-6 mt-5">
            <label class="form-label fw-bold">Snack</label>
            <input type="text" class="form-control main" name="snack" id="snack" placeholder="Snack" 
                value="<?= isset($data_paket) ? $data_paket['snack'] : '' ?>" required>
        </div>

        <!-- Harga Paket -->
        <div class="col-md-6 mt-5">
            <label class="form-label fw-bold">Harga Paket</label>
            <input type="number" class="form-control main" name="harga_paket" id="harga_paket" placeholder="Harga Paket" 
                value="<?= isset($data_paket) ? $data_paket['harga_paket'] : '' ?>" required>
        </div>

        <!-- Hidden field for the WHERE clause -->
        <?php if (isset($data_paket)) { ?>
        <input type="hidden" name="idx" value="<?= $data_paket['id'] ?>">
        <?php } ?>

        <!-- Submit and Cancel Buttons -->
        <div class="col-12 text-center mt-4">
            <button type="submit" name="proses" value="<?= isset($data_paket) ? 'ubah' : 'simpan' ?>" class="btn btn-success btn-md m-3">
                <?= isset($data_paket) ? 'Update' : 'Simpan' ?>
            </button>
            <button type="reset" class="btn btn-danger btn-md">Batal</button>
        </div>
    </form>
</div>

<?php 
} else {
    echo '<script>alert("Anda Harus Login Dahulu!!!");history.back();</script>';
}
?>
