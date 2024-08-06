<?php
// Include model Wisata
require_once 'models/Wisata.php';

// Ambil ID dari URL
$id = $_GET['id'] ?? null;

if ($id) {
    // Buat object Wisata
    $model = new Wisata();

    // Panggil fungsi untuk mengambil data wisata berdasarkan ID
    $wisata = $model->getById($id);

    $recentWisata = $model->getRecentWisata();

    // Cek jika data ditemukan
    if ($wisata) {
        ?>


<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/fontawesome/css/all.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs d-flex fixed-top align-items-center mb-3">
        <div class="container" style="position: relative;">
            <ol>
                <li><a href="index.php?hal=home">Home</a></li>
                <li>Data Wisata</li>
                <li>Detail Wisata</li>
            </ol>
            <h2>Wisata <?= htmlspecialchars($wisata['nama'], ENT_QUOTES, 'UTF-8') ?></h2>

            <!-- Tombol di pojok kanan -->
            <a href="#" class="mb-3"
                style="position: absolute;"><?= "Rp " . number_format($wisata['harga'], 2, ',', '.') ?></a>
                
            <a href="index.php?hal=pemesanan" class="btn btn-primary"
                style="position: absolute; top: 15px; right: 15px;">Pesan Sekarang</a>
        </div>
    </section><!-- End Breadcrumbs -->
    <br><br>
    <br><br>


    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 entries">
                    <article class="entry entry-single">
                        <div class="entry-img">
                            <img src="assets/img/wisata/<?= htmlspecialchars($wisata['cover'], ENT_QUOTES, 'UTF-8') ?>"
                                alt="Gambar Wisata" class="img-fluid">
                        </div>
                        <div class="entry-content">
                            <h2><?= htmlspecialchars($wisata['nama'], ENT_QUOTES, 'UTF-8') ?></h2>

                            <p>
                                <?= htmlspecialchars($wisata['deskripsi'], ENT_QUOTES, 'UTF-8') ?>
                            </p>
                            <blockquote>
                                <p>
                                    Ajak keluarga dan teman-temanmu untuk menikmati liburan tak terlupakan di
                                    Lampung. Berikut beberapa destinasi wisata yang wajib kamu kunjungi!
                                </p>
                            </blockquote>
                        </div>
                    </article><!-- End blog entry -->
                </div><!-- End blog entries list -->

                <div class="col-lg-4">
                    <div class="sidebar">
                        <h3 class="sidebar-title">Search</h3>
                        <div class="sidebar-item search-form">
                            <form action="">
                                <input type="text">
                            </form>
                        </div><!-- End sidebar search form -->

                        <h3 class="sidebar-title">Categories</h3>
                        <div class="sidebar-item categories">
                            <ul>
                                <li><a href="#">Pantai <span>(5)</span></a></li>
                                <li><a href="#">Gunung <span>(3)</span></a></li>
                                <li><a href="#">Budaya <span>(4)</span></a></li>
                                <li><a href="#">Kuliner <span>(2)</span></a></li>
                                <li><a href="#">Keluarga <span>(3)</span></a></li>
                            </ul>
                        </div><!-- End sidebar categories -->

                        <h3 class="sidebar-title">Update Wisata</h3>
                        <div class="sidebar-item recent-posts">
                            <?php foreach ($recentWisata as $item): ?>
                            <div class="post-item clearfix">
                                <img src="assets/img/wisata/<?= htmlspecialchars($item['cover'], ENT_QUOTES, 'UTF-8') ?>"
                                    alt="">
                                <h4><a
                                        href="wisata_detail.php?id=<?= htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($item['nama'], ENT_QUOTES, 'UTF-8') ?></a>
                                </h4>
                                <time
                                    datetime="<?= htmlspecialchars($item['tanggal_rilis'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars(date('M d, Y', strtotime($item['tanggal_rilis'])), ENT_QUOTES, 'UTF-8') ?></time>
                            </div>
                            <?php endforeach; ?>
                        </div><!-- End sidebar recent posts -->


                        <h3 class="sidebar-title">Tags Kategori Wisata</h3>
                        <div class="sidebar-item tags">
                            <ul>
                                <li><a href="#">Pantai</a></li>
                                <li><a href="#">Gunung</a></li>
                                <li><a href="#">Budaya</a></li>
                                <li><a href="#">Kuliner</a></li>
                                <li><a href="#">Keluarga</a></li>
                                <li><a href="#">Petualangan</a></li>
                            </ul>
                        </div><!-- End sidebar tags -->
                    </div><!-- End sidebar -->
                </div><!-- End blog sidebar -->
            </div>
        </div>
    </section><!-- End Blog Single Section -->

</main><!-- End #main -->

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/fontawesome/js/all.min.js"></script>
<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

<?php
include_once 'footer.php';?>


<?php
    } else {
        echo '<script>alert("Data Wisata tidak ditemukan!");history.back();</script>';
    }
} else {
    echo '<script>alert("ID tidak valid!");history.back();</script>';
}
?>