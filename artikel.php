<?php 

include 'login/koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM artikel");


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Business Casual - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/card.css">
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">Selamat Datang Di</span>
                <span class="site-heading-lower">Website Edukasi <br> Pancasila</span>
            </h1>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.php">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="index.php">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="about.php">About</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="artikel.php">Artikel</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="login/login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="dark">
            <div class="container py-4">
                <h1 class="h1 text-center text-white">Artikel Pancasila</h1>
        
                <?php 
                
                while($row = mysqli_fetch_assoc($query)):
                    $artikel = $row['isi_artikel'];

                    //membatasi artikel hanya 20 kata
                    $kataArtikel = explode(' ', $artikel);
                    $batasKata = array_slice($kataArtikel, 0, 20);
                    $artikelDibatasi = implode(' ', $batasKata);
                ?>
                <article class="postcard dark blue">
                    <a class="postcard__img_link" href="#">
                        <img class="postcard__img" src="assets/img/Artikel Image/<?= $row['heroImg'] ?>" alt="Image Title" />
                    </a>
                    <div class="postcard__text">
                        <h1 class="postcard__title blue"><a href="#"><?= $row['judul_artikel'] ?></a></h1>
                        <div class="postcard__subtitle small">
                            <time datetime="2020-05-25 12:00:00">
                                <i class="fas fa-calendar-alt mr-2"></i>Date Published <?= $row['tgl_dibuat'] ?>
                            </time>
                        </div>
                        <div class="postcard__bar"></div>
                        <div class="postcard__preview-txt"><?= $artikelDibatasi ?>...</div>
                        <a href="baca-artikel.php?id=<?= $row['id_artikel'] ?>" class="btn btn-primary btn-md w-25 text-dark btn-text">Baca Selengkapnya</a>
                    </div>
                </article>
                <?php
                    endwhile;
                ?>
            </div>
        </section>
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright &copy; Kelompok 2 Pancasila 2024</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
