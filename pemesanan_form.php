<?php
// Create objects for fetching data
$model_pemesanan = new Pemesanan();
$model_users = new Users();
$model_wisata = new Wisata();
$model_paket = new Paket();

// Retrieve data for dropdowns
$data_pemesanan = $model_pemesanan->dataPemesanan();
$data_users = $model_users->dataUsers();
$data_wisata = $model_wisata->dataWisata();
$data_paket = $model_paket->dataPaket(); // Retrieve data for paket_wisata

// Get current date for booking
$today_date = date('Y-m-d');

// Initialize status
$status = 'pending';

// Check user session
$sesi = $_SESSION['USERS'];
if (isset($sesi)) {
?>

<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Form <span class="alternate">Pemesanan Tiket</span></h3>
                </div>
            </div>
        </div>
        <form action="controllers/pemesanan_controller.php" method="POST" class="row">
            <!-- Nama -->
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Nama</label>
                <input type="text" class="form-control main" name="nama" id="nama" placeholder="Nama" required>
            </div>

            <!-- No Telepon -->
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">No Telepon</label>
                <input type="text" class="form-control main" name="no_telp" id="no_telp" placeholder="No Telepon"
                    required>
            </div>

            <!-- Alamat -->
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Alamat</label>
                <input type="text" class="form-control main" name="alamat" id="alamat" placeholder="Alamat" required>
            </div>

            <!-- Wisata & Harga -->
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Wisata & Harga</label>
                <div class="form-group">
                    <select class="form-control main" name="wisata" id="wisata" required>
                        <option selected>-- Pilih Wisata & Harga --</option>
                        <?php foreach ($data_wisata as $wisata) { ?>
                        <option value="<?= $wisata['nama'] ?>" data-harga="<?= $wisata['harga'] ?>">
                            <?= $wisata['nama'] ?> (Harga: <?= $wisata['harga'] ?>)
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <!-- Jumlah Tiket -->
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Jumlah Tiket Beli</label>
                <input type="number" class="form-control main" name="jumlah_tiket" id="jumlah_tiket"
                    placeholder="Jumlah Tiket" min="1" required>
            </div>

            <!-- Tanggal Booking -->
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Tanggal Booking</label>
                <input type="date" class="form-control main" name="tanggal_boking" id="tanggal_boking"
                    value="<?= date('Y-m-d') ?>" required>
            </div>

            <!-- Checkbox for Paket Wisata -->
            <div class="col-md-12 mt-5">
                <label class="form-label fw-bold">Pilih Paket Wisata</label>
                <div class="form-group">
                    <?php foreach ($data_paket as $paket) { ?>
                    <div class="form-check">
                        <input class="form-check-input paket-checkbox" type="checkbox" name="paket_wisata[]"
                            value="<?= $paket['nama_paket'] ?>" data-harga="<?= $paket['harga_paket'] ?>">
                        <label class="form-check-label">
                            <?= $paket['nama_paket'] ?> (Harga: <?= $paket['harga_paket'] ?>)
                        </label>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Total Pembayaran -->
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Total Pembayaran</label>
                <input type="text" class="form-control main" name="total_pembayaran" id="total_pembayaran"
                    placeholder="Total Pembayaran" readonly>
            </div>

            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Tanggal Pesanan</label>
                <input type="datetime-local" class="form-control main" name="tanggal_pemesanan" id="tanggal_pemesanan"
                    value="<?= date('Y-m-d\TH:i:s') ?>" readonly>
            </div>

            <!-- Hidden input to handle automatic date/time -->
            <input type="hidden" name="tanggal_pemesanan_hidden" id="tanggal_pemesanan_hidden">

            <!-- Metode Pembayaran -->
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Metode Pembayaran</label>
                <select class="form-control main" name="metode_pembayaran" required>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="DANA">DANA</option>
                    <option value="CASH">CASH</option>
                </select>
            </div>

            <!-- Status (auto-set to 'pending') -->
            <input type="hidden" name="status" value="pending">

            <!-- Submit and Cancel Buttons -->
            <div class="col-12 text-center mt-4">
                <button type="submit" name="proses" value="simpan" class="btn btn-success btn-md m-3">Pesan</button>
                <button class="btn btn-danger btn-md" href="index.php?hal=paket_form">Batal</button>
            </div>
        </form>
    </div>

</div>

<script>
// JavaScript to calculate total payment
function calculateTotal() {
    var wisataSelect = document.getElementById('wisata');
    var selectedOption = wisataSelect.options[wisataSelect.selectedIndex];
    var hargaWisata = parseFloat(selectedOption.getAttribute('data-harga')) || 0;
    var jumlahTiket = parseInt(document.getElementById('jumlah_tiket').value) || 0;

    var totalPembayaran = hargaWisata * jumlahTiket;

    // Add the prices of selected packages
    var paketCheckboxes = document.querySelectorAll('.paket-checkbox:checked');
    paketCheckboxes.forEach(function(checkbox) {
        var hargaPaket = parseFloat(checkbox.getAttribute('data-harga')) || 0;
        totalPembayaran += hargaPaket;
    });

    document.getElementById('total_pembayaran').value = totalPembayaran;
}

document.getElementById('jumlah_tiket').addEventListener('input', calculateTotal);
document.getElementById('wisata').addEventListener('change', calculateTotal);

document.querySelectorAll('.paket-checkbox').forEach(function(checkbox) {
    checkbox.addEventListener('change', calculateTotal);
});

</script>

<?php 
} else {
    echo '<script>alert("Anda Harus Login Dahulu !!!");history.back();</script>';
}
?>