<?php
$sesi = $_SESSION['USERS']?? null;
?>

<!-- ======= Top Bar ======= -->
  <!-- ======= Header ======= -->
<br>




  <header id="header" class="d-flex fixed-top align-items-center" style="padding: 15px 15px 30px 15px; ">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="#">WISATA BANDAR LAMPUNG</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php?hal=home" class="link">Home</a></li>
          <li><a href="index.php?hal=about" class="link">About</a></li>          
          <li><a href="index.php?hal=kontak">Contact</a></li>

          <?php
            if(!isset($sesi)){ //---------jika belum/gagal login-----------
          ?>
          <li class="nav-item">
            <a class="nav-link" href="login_form.php">Login</a>
          </li>
          <?php
            }
            else{ //---------jika berhasil login-----------
          ?>
          <li class="dropdown"><a href="#"><span>Data Wisata</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php
                if($sesi['role'] != 'pembeli'){ //--------- tidak untuk akses pembeli----------
              ?>
              <li><a href="index.php?hal=user">Data Users</a></li>
              <?php } ?>
              <li><a href="index.php?hal=wisata">Wisata</a></li>
              <li><a href="index.php?hal=pemesanan">Pemesanan</a></li>
              <li><a href="index.php?hal=paket_wisata">Paket Wisata</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown"><?= $sesi['fullname'] ?> 
              <i class="bi bi-chevron-down"></i>
            </a>
              <!-- Dropdown list -->
            <ul class="dropdown-menu">
              <li><a href="index.php?hal=user_detail&id=<?= $sesi['id'] ?> ">Profile</a></li>
              <?php
               if($sesi['role'] != 'pembeli'){ //---------hanya untuk admin----------
              ?>
              <li><a class="dropdown-item" href="index.php?hal=user">Kelola User</a></li>
              <?php } ?>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <img src="assets/img/profile/<?= $sesi['foto'] ?>" style="border-radius: 50%; margin-left: 10px; width: 50px; height: 50px; margin-top: 12px;">
            </img>
          </li>
          <?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->