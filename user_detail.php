<?php
//tangkap request id dari klik tombol detail
$id = $_REQUEST['id'];
//ciptakan object dari class Pegawai
$model = new Users();
//panggil fungsi untuk menampilkan data pegawai
$user = $model->getUsers($id); 

  $sesi = $_SESSION['USERS'];
	if(isset($sesi) && $sesi['role'] != 'pembeli' ){
?>

<style>
.team {
    position: relative;
    z-index: 1;
}

.team::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('https://i.pinimg.com/736x/0b/38/46/0b384628dc5639a20ea1385b4f324e9a.jpg') center center no-repeat;
    background-size: cover;
    filter: blur(10px);
    z-index: -1;
    opacity: 0.7;
}

.team .member {
    text-align: center;
    border-radius: 10px;
    overflow: hidden;
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
    transition: 0.3s;
    padding: 20px;
}

.team .member img {
    margin: 15px auto;
    width: 80%;
    border-radius: 50%;
}

.team .member-info {
    padding: 15px;
}

.team .member-info h4 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 10px;
}

.team .member-info span {
    display: block;
    font-size: 14px;
    color: #888;
}

.team .member-info p {
    font-size: 14px;
    color: #666;
}
</style>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="index.html">Home</a></li>
                <li>User</li>
            </ol>
            <h2>Users Details</h2>

        </div>
    </section><!-- End Breadcrumbs -->

<!-- ======= Team Section ======= -->
<section id="team" class="team">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Profile Section -->
            <div class="col-lg-5 col-md-6 d-flex align-items-stretch">
                <div class="member">
                    <img src="assets/img/profile/<?= $user['foto'] ?>" class="img-fluid" alt="<?= $user['fullname'] ?>">
                    <div class="member-info">
                        <h4><?= $user['fullname'] ?></h4>
                        <span><?= $user['email'] ?></span>
                        <span><?= $user['role'] ?></span>
                        <p><?= $user['no_hp'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End Team Section -->


</main><!-- End #main -->
<?php 
  }
  else{
    echo '<script>alert("Anda dilarang akses halaman Ini !!!");history.back();</script>';
  }
  ?>