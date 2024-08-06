<?php
// Buat objek dari class Wisata
$model = new Wisata();
// Panggil fungsi untuk menampilkan data wisata
$data_wisata = $model->dataWisata(); 

$sesi = $_SESSION['USERS'];

// Buat objek dari class Users
$model = new Users();
// Panggil fungsi untuk menampilkan data user
$data_user = $model->dataUsers(); 

// Beri session untuk hak akses halaman member
$sesi = $_SESSION['USERS'];
if(isset($sesi)){
?>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="index.php?hal=home">Home</a></li>
            <li>Data Wisata</li>
        </ol>
        <h2>Daftar Wisata</h2>
    </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Featured Section ======= -->
<section id="featured" class="featured">
    <div class="mb-4" style="margin-left: 50px;">
        <?php if($sesi['role'] != 'pembeli'){ // Tidak untuk akses pembeli ?>
        <a class="btn btn-primary btn-sm" href="index.php?hal=wisata_form" role="button" title="Tambah Wisata">
            &nbsp;<i class="fa fa-plus" aria-hidden="true"> <label class="p-2">Tambah Wisata</label> </i>&nbsp;
        </a>
        <?php } ?>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <?php foreach ($data_wisata as $row) { ?>
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="assets/img/wisata/<?= htmlspecialchars($row['cover'], ENT_QUOTES, 'UTF-8') ?>"
                                class="card-img" alt="Gambar Wisata" style="height: 100%; object-fit: cover;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8') ?></h5>
                                <p class="card-text"><small
                                        class="text-muted"><?= htmlspecialchars($row['tanggal_rilis'], ENT_QUOTES, 'UTF-8') ?></small>
                                </p>
                                <p class="card-text description"><?= htmlspecialchars($row['deskripsi'], ENT_QUOTES, 'UTF-8') ?></p>
                                <p class="card-text">Kepo kan yuk beli tiketnya sekarang!</p>
                                <a href="wisata_detail.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm me-2"
                                        title="Detail wisata">
                                        <i class="fa fa-info-circle"></i> Detail
                                    </a>
                                <?php if ($sesi['role'] == 'admin') { // Hanya untuk admin ?>
                                <div class="mt-3 d-flex">
                                    <a href="index.php?hal=wisata_form_update&idedit=<?= $row['id'] ?>"
                                        class="btn btn-primary btn-sm me-2" title="Ubah wisata">
                                        <i class="fa fa-pencil-square-o"></i> Ubah
                                    </a>
                                    <form action="controllers/wisata_controller.php" method="POST"
                                        onsubmit="return confirm('Anda Yakin Data Akan di Hapus?')"
                                        style="display:inline;">
                                        <button type="submit" class="btn btn-primary btn-sm" name="proses" value="hapus"
                                            title="Hapus wisata">
                                            <i class="fa fa-trash-o"></i> Hapus
                                        </button>
                                        <input type="hidden" name="idx" value="<?= $row['id'] ?>">
                                    </form>
                                </div>


                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section><!-- End Featured Section -->

<?php 
} else {
    echo '<script>alert("Anda Harus Login Dahulu !!!");history.back();</script>';
}
?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const descriptions = document.querySelectorAll('.description');
    descriptions.forEach(description => {
        const maxLength = 100;
        if (description.textContent.length > maxLength) {
            const shortText = description.textContent.substring(0, maxLength) + '...';
            description.textContent = shortText;
        }
    });
});
</script>
