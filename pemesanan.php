<?php
// Create an object from the Detail_Pemesanan class
$model = new Pemesanan();
// Call the function to retrieve data
$data_pemesanan = $model->dataPemesanan();

$sesi = $_SESSION['USERS'];
if (isset($sesi)) {
?>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="index.php?hal=home">Home</a></li>
            <li>Data Pemesanan</li>
            <li>Data Detail Pemesanan</li>
        </ol>
        <h2>Daftar Pemesanan</h2>
    </div>
</section><!-- End Breadcrumbs -->

<section class="section schedule">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mt-3">
                    <h2>DAFTAR <span class="alternate">PEMESANAN</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-primary btn-sm" href="index.php?hal=pemesanan_form" role="button"
                    title="Tambah Tiket">
                    &nbsp;<i class="fa fa-plus" aria-hidden="true"><label class="p-2">Pesan Tiket</label></i>&nbsp;
                </a>
                <br /><br />
                <table class="table table-primary">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Wisata</th>
                            <th scope="col">Jumlah Tiket</th>
                            <th scope="col">Metode Pembayaran</th>
                            <th scope="col">Tanggal Booking</th>
                            <th scope="col">Tanggal Pemesanan</th>
                            <th scope="col">Total Pembayaran</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="p-4">
                        <?php
                        $no = 1;
                        foreach ($data_pemesanan as $row) {
                        ?>
                        <tr class="table-secondary">
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['no_telp'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $row['wisata'] ?></td>
                            <td><?= $row['jumlah_tiket'] ?></td>
                            <td><?= $row['metode_pembayaran'] ?></td>
                            <td><?= $row['tanggal_boking'] ?></td>
                            <td><?= $row['tanggal_pemesanan'] ?></td>
                            <td>Rp. <?= number_format($row['total_pembayaran'], 0, ',', '.') ?></td>
                            <td><?= $row['status'] ?></td>
                            <td>
                                <!-- Button to print the order -->
                                <a href="cetak_pesanan.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm"
                                    title="Cetak Pesanan">
                                    <i class="fa fa-print fa-lg" aria-hidden="true"></i> Cetak
                                </a>

                                <!-- Form for action buttons, visible to admin and staff roles -->
                                <?php if ($sesi['role'] == 'admin' || $sesi['role'] == 'staff') { ?>
                                <form action="controllers/pemesanan_controller.php" method="POST" class="d-inline">
                                    <div class="d-flex justify-content-start">
                                        <?php if ($sesi['role'] != 'pembeli') { ?>
                                        <button type="submit" class="btn btn-danger btn-sm me-2" name="proses"
                                            value="hapus" onclick="return confirm('Anda Yakin Data akan diHapus?')"
                                            title="Hapus pesanan">
                                            <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i> Hapus
                                        </button>
                                        <?php } ?>
                                        <button type="submit" class="btn btn-success btn-sm me-2" name="proses"
                                            value="accept"
                                            onclick="return confirm('Anda Yakin ingin menerima pesanan?')"
                                            title="Terima pesanan">
                                            <i class="fa fa-check fa-lg" aria-hidden="true"></i> Terima
                                        </button>
                                        <button type="submit" class="btn btn-warning btn-sm" name="proses" value="habis"
                                            onclick="return confirm('Anda Yakin ingin menandai pesanan sebagai habis?')"
                                            title="Habis pesanan">
                                            <i class="fa fa-times fa-lg" aria-hidden="true"></i> Habis
                                        </button>
                                    </div>
                                    <!-- Hidden field for the WHERE clause -->
                                    <input type="hidden" name="idx" value="<?= $row['id'] ?>">
                                </form>
                                <?php } ?>
                            </td>


                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php 
} else {
    echo '<script>alert("Anda Harus Login Dahulu!!!");history.back();</script>';
}
?>