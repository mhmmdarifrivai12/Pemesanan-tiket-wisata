<?php
    //ciptakan object dari class Kategori dan Film
    $obj_kategori = new Wisata();
    //panggil fungsi untuk menampilkan data kategori
    $data_kategori = $obj_kategori->dataWisata();

    //------------proses edit data------------
    //tangkap request idedit di url (setelah klik tombol edit/icon pencil)
    $idedit = $_REQUEST['idedit'];
    $wisata = !empty($idedit) ? $obj_kategori->getWisata($idedit) : array() ;

    $sesi = $_SESSION['USERS'];
    if(isset($sesi) && $sesi['role'] != 'pembeli' ){
?>

<section class="page-title bg-title overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <div class="title">
                    <h3>Update Data Film</h3>
                </div>
                <ol class="breadcrumb justify-content-center p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                    <li class="breadcrumb-item active">Data Film</li>
                    <li class="breadcrumb-item active">Update Data Film</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="section contact-form">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Update<span class="alternate">Film</span></h3>
                </div>
            </div>
        </div>
        <form action="controllers/wisata_controller.php" method="POST" enctype="multipart/form-data" class="row">
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Nama Wisata</label>
                <input type="text" class="form-control main" name="nama" id="nama" placeholder="nama"
                    value="<?= $wisata['nama'] ?>">
            </div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Harga</label>
                <input type="number" class="form-control main" name="harga" id="harga" placeholder="harga"
                    value="<?= $wisata['harga'] ?>">
            </div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control main" rows="10"
                    placeholder="deskripsi"><?= $wisata['deskripsi'] ?></textarea>
            </div>
            <div class="col-md-6 mt-5 ">
                <label class="form-label fw-bold">Cover</label>
                <input type="file" class="form-control main" name="cover" id="cover" placeholder="Cover">
                <?php if (!empty($wisata['cover'])): ?>
                <img src="assets/img/wisata/<?= $wisata['cover'] ?>" alt="Cover Image"
                    style="max-width: 100px; margin-top: 10px;">
                <?php endif; ?>
            </div>
			<div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Tanggal Rilis</label>
                <input type="date" class="form-control main" name="tanggal_rilis" id="tanggal_rilis"
                    placeholder="Tanggal Rilis" value="<?= $wisata['tanggal_rilis'] ?>">
            </div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Lokasi</label>
                <input type="text" class="form-control main" name="lokasi" id="lokasi" placeholder="lokasi"
                    value="<?= $wisata['lokasi'] ?>">
            </div>
    </div>
    <div class="col-12 text-center mt-3">
        <button type="submit" name="proses" value="ubah" class="btn btn-success btn-md m-2">Ubah</button>
        <!-- hidden field untuk klausa where id=? -->
        <input type="hidden" name="idx" value="<?= $idedit ?>">
        <button type="submit" name="proses" value="batal" class="btn btn-danger btn-md">Batal</button>
    </div>
    </form>
    </div>
</section>
<?php 
}
else{
    echo '<script>alert("Anda Harus Login Dahulu !!!");history.back();</script>';
}
?>