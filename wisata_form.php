<?php
    // Ciptakan object dari class Wisata
    $obj_wisata = new Wisata();
    // Panggil fungsi untuk menampilkan data wisata
    $data_wisata = $obj_wisata->dataWisata();
    
    $sesi = $_SESSION['USERS'];
    if (isset($sesi) && $sesi['role'] != 'pembeli') {
?>

<section class="page-title bg-title overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <div class="title">
                    <h3>Input Data Wisata</h3>
                </div>
                <ol class="breadcrumb justify-content-center p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                    <li class="breadcrumb-item active">Data Wisata</li>
                    <li class="breadcrumb-item active">Input Data Wisata</li>
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
                    <h3>Input<span class="alternate">Wisata</span></h3>
                </div>
            </div>
        </div>
        <form action="controllers/wisata_controller.php" method="POST" enctype="multipart/form-data" class="row">
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Nama Wisata</label>
                <input type="text" class="form-control main" name="nama" id="nama" placeholder="Nama Wisata">
            </div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Lokasi</label>
                <input type="text" class="form-control main" name="lokasi" id="lokasi" placeholder="Lokasi">
            </div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control main" rows="10"
                    placeholder="Deskripsi"></textarea>
            </div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Harga</label>
                <input type="number" class="form-control main" name="harga" id="harga" placeholder="Harga" step="0.01">
            </div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Tanggal Rilis</label>
                <input type="date" class="form-control main" name="tanggal_rilis" id="tanggal_rilis"
                    placeholder="Tanggal Rilis">
            </div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Cover</label>
                <input type="file" class="form-control main" name="cover" id="cover">
            </div>
            <div class="col-12 text-center mt-4">
                <button type="submit" name="proses" value="simpan" class="btn btn-success btn-md m-3">Simpan</button>
                <button type="submit" name="proses" value="batal" class="btn btn-danger btn-md">Batal</button>
            </div>
        </form>
    </div>
</section>

<?php 
} else {
    echo '<script>alert("Anda Harus Login Dahulu !!!");history.back();</script>';
}
?>