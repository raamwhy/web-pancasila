<?php 

include "login/koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY tgl_dibuat DESC LIMIT 4");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Web Pancasila</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet"/>
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
        <section class="page-section clearfix">
            <div class="container">
                <div class="intro">
                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="assets/img/sejarah.jpg" alt="..." />
                    <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper"></span>
                            <span class="section-heading-lower fw-bold">Sejarah Pancasila</span>
                        </h2>
                        <p class="mb-3">Penepatan tanggal 1 Juni sebagai Hari Lahir Pancasila merujuk pada momen penting sidang Badan Penyelidik Usaha Persiapan Kemerdekaan (BPUPKI) atau Dokuritsu Junbi Cosakai dalam upaya merumuskan dasar negara Republik Indonesia. Badan ini menggelar sidang pertamanya pada tanggal <br> 29 Mei 1945.</p>
                        <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl btn-header" href="#!"><h6>Baca selengkapnya!</h6></a></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded rounded">
                            <h2 class="section-heading text-center mb-4">
                                <span class="section-heading-upper"></span>
                                <span class="section-heading-lower fw-bold">Pancasila Bagi Bangsa Indonesia</span>
                            </h2>
                            <p class="mb-0">Pancasila memiliki banyak peran dan fungsi bagi bangsa Indonesia, di antaranya: </p>
                            <ol>
                                <li>Dasar negara: Pancasila merupakan dasar tatanan dan hukum negara Indonesia. Pancasila menjadi acuan bagi pemerintahan, pembangunan sosial, hukum, dan kehidupan masyarakat.</li>
                                <li>Pandangan hidup: Pancasila menjadi pedoman hidup dalam keseharian, dengan menerapkan nilai-nilai yang terkandung dalam kelima sila Pancasila.</li>
                                <li>Pemersatu bangsa: Pancasila mengajarkan masyarakat untuk saling menghormati dan menghargai perbedaan.</li>
                                <li> Ideologi negara: Pancasila merupakan ideologi negara yang bersifat evolutif, artinya senantiasa menyesuaikan dengan perkembangan zaman.</li>
                                <li>Sumber hukum: Pancasila menjadi sumber dari segala sumber hukum di Indonesia.</li>
                            </ol>                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                        <h1 class="postcard__title blue"><a href="baca-artikel.php?id=<?= $row['id_artikel'] ?>"><?= $row['judul_artikel'] ?></a></h1>
                        <div class="postcard__subtitle small">
                            <time datetime="2020-05-25 12:00:00">
                                <i class="fas fa-calendar-alt mr-2"></i><?= $row['tgl_dibuat'] ?>
                            </time>
                        </div>
                        <div class="postcard__bar"></div>
                        <div class="postcard__preview-txt"><?= $artikelDibatasi ?></div>
                        <a href="baca-artikel.php?id=<?= $row['id_artikel'] ?>" class="btn btn-primary btn-md w-25 text-dark btn-text">Baca Selengkapnya</a>
                    </div>
                </article>
                <?php endwhile; ?>
                <a class="btn btn-primary btn-md btn-footer d-flex justify-content-center fw-bold" href="artikel.php"><h3>Lihat selengkapnya!</h3></a>
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
