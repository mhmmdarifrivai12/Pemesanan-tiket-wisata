<?php
// Buat objek dari class Users
$model = new Users();
// Panggil fungsi untuk menampilkan data users
$data_users = $model->dataUsers(); 
?>

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <ol>
      <li><a href="index.php?hal=home">Home</a></li>
      <li>About Us</li>
    </ol>
    <h2>Selamat Datang Di Provinsi Lampung</h2>
  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <img src="assets/img/about image.jpeg" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 content">
        <h3>Wisata Lampung</h3>
        <p>Lampung, Indonesia</p>
        <p class="fst-italic">
          Aplikasi ini menyediakan berbagai informasi mengenai destinasi wisata di Lampung dan sekitarnya.
        </p>
        <ul>
          <li><i class="bi bi-check-circle"></i> Terdapat beberapa pilihan destinasi wisata terbaru</li>
          <li><i class="bi bi-check-circle"></i> Pemesanan tiket wisata lebih mudah</li>
          <li><i class="bi bi-check-circle"></i> Berbagai paket wisata dengan harga terjangkau</li>
        </ul>
        <p>
          Nikmati pengalaman wisata terbaik di Lampung, tetap terbaru dengan berita wisata terbaru, dan dapatkan penawaran serta promo menarik!
          Pilihan destinasi wisata terbaru dan seru buat kamu!, terdapat promo-promo menarik juga lohhh,,, 
        </p>
        <p>Yuk tunggu apalagi, pesan tiket wisata kamu sekarang juga!!</p>
      </div>
    </div>
  </div>
</section><!-- End About Section -->

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">
  <div class="container">
    <div class="section-title">
      <h2>Testimoni</h2>
    </div>
    <div class="row">
      <?php
      foreach($data_users as $row){
      ?>
      <div class="col-lg-6">
        <div class="testimonial-item">
          <img src="assets/img/profile/<?= $row['foto'] ?>" class="testimonial-img" alt="">
          <h3><?= $row['fullname'] ?></h3>
          <h6><?= $row['email'] ?></h6>
          <h6><?= $row['role'] ?></h6>
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            Luar Biasa, Sangat Bermanfaat
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
        </div>
      </div>
      <?php
      }
      ?>
    </div>
  </div>
</section><!-- End Testimonials Section -->
