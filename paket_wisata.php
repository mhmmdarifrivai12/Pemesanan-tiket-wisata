<?php
// Create an object from the Detail_Pemesanan class
$model = new Paket();
// Call the function to retrieve data
$data_pemesanan = $model->dataPaket();


$sesi = $_SESSION['USERS'];
if (isset($sesi)) {
?>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="index.php?hal=home">Home</a></li>
            <li>Data Paket</li>
        </ol>
        <h2>Daftar Paket</h2>
    </div>
</section><!-- End Breadcrumbs -->

<section class="section schedule">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mt-3">
                    <h2>DAFTAR <span class="alternate">PAKET LIBURAN</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <?php if ($sesi['role'] == 'admin' || $sesi['role'] == 'staff') { // Display actions for admin and staff ?>
                <a class="btn btn-primary btn-sm" href="index.php?hal=paket_form" role="button" title="Tambah Tiket">
                    &nbsp;<i class="fa fa-plus" aria-hidden="true"><label class="p-2">Pesan Paket</label></i>&nbsp;
                </a>
                <?php } ?>

                <br /><br />
                <table class="table table-primary">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">No</th>
                            <th scope="col">Nama Paket</th>
                            <th scope="col">Durasi</th>
                            <th scope="col">snack</th>
                            <th scope="col">Harga Paket</th>
                            <?php if ($sesi['role'] == 'admin' || $sesi['role'] == 'staff') { // Display actions for admin and staff ?>
                            <th scope="col">Aksi</th>
                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody class="p-4">
                        <?php
                        $no = 1;
                        foreach ($data_pemesanan as $row) {
                        ?>
                        <tr class="table-secondary">
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['nama_paket'] ?></td>
                            <td><?= $row['durasi'] ?> Hari</td>
                            <td><?= $row['snack'] ?></td>
                            <td><?= $row['harga_paket'] ?></td>
                            <?php if ($sesi['role'] == 'admin' || $sesi['role'] == 'staff') { // Display actions for admin and staff ?>
                            <td>
                                <form action="controllers/paket_controller.php" method="POST">
                                    <div class="d-flex justify-content-start">
                                        <?php if ($sesi['role'] != 'pembeli') { ?>
                                        <button type="submit" class="btn btn-danger btn-sm me-2" name="proses"
                                            value="hapus" onclick="return confirm('Anda Yakin Data akan diHapus?')"
                                            title="Hapus Paket">
                                            <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm me-2" title="Update Paket"
                                            onclick="window.location.href='index.php?hal=paket_form_update&idx=<?= $row['id'] ?>'">
                                            <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                        </button>
                                        <?php } ?>
                                    </div>
                                    <!-- Hidden field for the WHERE clause -->
                                    <input type="hidden" name="idx" value="<?= $row['id'] ?>">
                                </form>

                            </td>
                            <?php } ?>
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