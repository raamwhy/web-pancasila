<?php

session_start();
include 'koneksi.php'; // Menghubungkan ke database

$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Email = $_POST['Email'];
    $password = $_POST['password'];

    // Query untuk mengecek user berdasarkan Email
    $query = "SELECT * FROM admin WHERE email = '$Email'";
    $result = mysqli_query($koneksi, $query);

    // Cek apakah data ditemukan
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password (gunakan password_hash dan password_verify jika perlu)
        if ($password === $user['password']) {
            $_SESSION['username'] = $user['username'];
            // Redirect ke halaman lain setelah login berhasil
            header("Location: ../dashboard/index.php");
        } else {
            $error = true;
        }
    } else {
        $error = true;
    }
}

if(isset($_GET['message'])){
  if($_GET['message'] == true){
    echo"
    <script>
      alert('Silahkan Login terlebih dahulu!');
      window.location.href = window.location.pathname;
    </script>
    ";
    header("login.php");
  }
}

if($error){
    echo"
  <script>
    alert('Email atau Password Anda Salah!');
  </script>
  ";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- css -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
      body {
        background-image: url("../assets/img/map.jpg");
      }

      .login {
        padding-top: 110px;
      }
    </style>
</head>
<body>
    
<!-- login start -->
<section class="login">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-xxl-11">
        <div class="card shadow-sm">
          <div class="row g-0">
            <div class="col-12 col-md-6">
              <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="../assets/img/perjanjian.jpg" alt="Welcome back you've been missed!">
            </div>
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
              <div class="col-12 col-lg-11 col-xl-10">
                <div class="card-body p-3 p-md-4 p-xl-5">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-4">
                        <h4 class="text-center fw-bold">LOGIN</h3>
                      </div>
                    </div>
                  </div>
                  <form method="POST">
                    <div class="row gy-3 overflow-hidden">
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="Email" required>
                          <label for="text" class="form-label">Email</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" name="password" required>
                          <label for="password" class="form-label">Password</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="d-grid">
                          <button class="btn btn-dark btn-lg mb-3" type="submit">Log in</button>
                          <a href="../index.php" class="btn btn-dark btn-lg"><- Kembali</a>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- login end -->

</body>
</html>