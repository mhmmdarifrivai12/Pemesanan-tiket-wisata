<?php
session_start();
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<section class="vh-100" style="background-color:lightblue">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="https://i.pinimg.com/736x/0b/38/46/0b384628dc5639a20ea1385b4f324e9a.jpg"
                                alt="login form" class="img-fluid" style="height: 100%; border-radius: 15px;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form method="POST" action="controllers/users_controller.php">
                                    <h5 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">LOGIN</h5>
                                    <?php
                                    // Tampilkan notifikasi sukses jika ada
                                    if (isset($_SESSION['notification'])) {
                                    echo '<div class="alert alert-success" role="alert">' . $_SESSION['notification'] . '</div>';
                                    unset($_SESSION['notification']); // Hapus notifikasi setelah ditampilkan
                                    }
                                    // Tampilkan pesan kesalahan login jika ada
                                    if (isset($_SESSION['login_error'])) {
                                    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['login_error'] . '</div>';
                                    unset($_SESSION['login_error']); // Hapus pesan kesalahan setelah ditampilkan
                                    }
                                    ?>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example17">Username</label>
                                        <input type="text" name="username" class="form-control" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example27">Password</label>
                                        <input type="password" name="password" class="form-control" />
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
                                    </div>

                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Daftar disini <a href="register.php"
                                            style="color: #393f81;">Register</a></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>