<?php
// Create object from Film class
$model = new Wisata();
// Call function to display film data
$data_wisata = $model->dataWisata(); 
?>
  
<!-- ======= Hero Section ======= -->
<section id="hero" style="margin-top: -20px;">
  <div class="hero-container">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide1.jpeg)">
          <div class="carousel-container">
            <div class="carousel-content">
              <h2 class="animate__animated animate__fadeInDown">Selamat Datang di <span>Wisata Bandar Lampung</span></h2>
              <p class="animate__animated animate__fadeInUp">Temukan berbagai destinasi wisata menarik dan terbaik di Bandar Lampung!</p>
              <a href="index.php?hal=about" class="btn-get-started animate__animated animate__fadeInUp">Baca Selengkapnya</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide2.jpeg)">
          <div class="carousel-container">
            <div class="carousel-content">
              <h2 class="animate__animated animate__fadeInDown">Pesan Tiket <span> Wisata Sekarang</span></h2>
              <p class="animate__animated animate__fadeInUp">Nikmati liburan seru dengan tiket wisata terbaik, dan temukan penawaran serta promo menarik!</p>
              <a href="index.php?hal=pemesanan" class="btn-get-started animate__animated animate__fadeInUp">Pesan Tiket Wisata</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide3.jpeg)">
          <div class="carousel-container">
            <div class="carousel-content">
              <h2 class="animate__animated animate__fadeInDown">Lihat Update <span> Wisata</span></h2>
              <p class="animate__animated animate__fadeInUp">Pilihan wisata terbaru dan seru di Bandar Lampung!</p>
              <a href="index.php?hal=wisata" class="btn-get-started animate__animated animate__fadeInUp">Lihat Wisata</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </div>
</section><!-- End Hero -->

<!-- ======= Featured Section ======= -->
<section id="featured" class="featured" style="margin-top: 200px;">
  <div class="container">
    <div class="row">
      <?php foreach ($data_wisata as $row) { ?>
        <div class="col-md-6 mb-4">
          <div class="card h-100">
            <img src="assets/img/wisata/<?= $row['cover'] ?>" class="card-img-top" alt="<?= $row['nama'] ?>" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title"><?= $row['nama'] ?></h5>
              <p class="card-text"><small class="text-muted"><?= $row['tanggal_rilis'] ?></small></p>
              <p class="card-text">Ayo, beli tiketnya sekarang dan nikmati wisata seru di Bandar Lampung!</p>
              <a href="wisata_detail.php?id=<?= $row['id'] ?>" class="btn btn-primary">Selengkapnya</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section><!-- End Featured Section -->
