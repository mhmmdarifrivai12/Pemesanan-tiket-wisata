<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<section class="vh-100" style="background-color: lightblue;">
  <div class="container py-5 h-100">

    <?php
    if (isset($_SESSION['notification'])) {
        echo '<div class="alert alert-success" role="alert">' . $_SESSION['notification'] . '</div>';
        unset($_SESSION['notification']); // Remove notification after displaying
    }
    ?>

    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://i.pinimg.com/736x/0b/38/46/0b384628dc5639a20ea1385b4f324e9a.jpg"
                alt="registration form" class="img-fluid" style="height: 100%; border-radius: 15px;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="controllers/register_controller.php" method="POST" enctype="multipart/form-data" class="row">
                  <h5 class="fw-normal mb-3 pb-3 text-center" style="letter-spacing: 1px;">REGISTER</h5>

                  <div class="col-md-6 mt-3">
                    <label class="form-label fw-bold" for="fullname">Nama</label>
                    <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Fullname" required>
                  </div>

                  <div class="col-md-6 mt-3">
                    <label class="form-label fw-bold">Jenis Kelamin</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" id="genderMale" required>
                      <label class="form-check-label" for="genderMale">
                        Laki-Laki
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" id="genderFemale" required>
                      <label class="form-check-label" for="genderFemale">
                        Perempuan
                      </label>
                    </div>
                  </div>

                  <div class="col-md-6 mt-3">
                    <label class="form-label fw-bold" for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                  </div>

                  <div class="col-md-6 mt-3">
                    <label class="form-label fw-bold" for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                  </div>

                  <div class="col-md-6 mt-3">
                    <label class="form-label fw-bold" for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                  </div>

                  <div class="col-md-6 mt-3">
                    <label class="form-label fw-bold" for="no_hp">No HP</label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No HP" required>
                  </div>

                  <div class="col-md-6 mt-3">
                    <label class="form-label fw-bold" for="role">Role</label>
                    <select name="role" class="form-control" id="role" required>
                      <option value="" disabled selected>Pilih Role</option>
                      <option value="Admin">Admin</option>
                      <option value="Staff">Staff</option>
                      <option value="Pembeli">Pembeli</option>
                    </select>
                  </div>

                  <div class="col-md-6 mt-3">
                    <label class="form-label fw-bold" for="foto">Foto</label>
                    <input type="file" class="form-control" name="foto" id="foto">
                  </div>

                  <div class="col-12 text-center mt-4">
                    <button type="submit" name="proses" value="simpan" class="btn btn-success btn-md m-3">Simpan</button>
                    <a href="../index.php?hal=home" class="btn btn-danger btn-md">Batal</a>
                  </div>
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
