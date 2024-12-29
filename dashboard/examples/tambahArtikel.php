<?php
include 'koneksi.php';

session_start();

if(!isset($_SESSION['username'])){
    $message = true;
    header("Location: ../../login/login.php?message=$message");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judulArtikel'];
    $artikel = $_POST['isi'];
    $tglDibuat = date("Y-m-d");

    // Validasi dan Upload Gambar
    if (isset($_FILES['heroImage']) && $_FILES['heroImage']['error'] == 0) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = $_FILES['heroImage']['type'];
        $file_size = $_FILES['heroImage']['size'];

        if (in_array($file_type, $allowed_types) && $file_size <= 2 * 1024 * 1024) { // Maks 2MB
            $target_dir = "assets/img/Artikel Image/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            
            $target_file = $target_dir . basename($_FILES['heroImage']['name']);
            move_uploaded_file($_FILES['heroImage']['tmp_name'], $target_file);
            $heroImage = basename($_FILES['heroImage']['name']);
        } else {
            echo "File tidak valid atau terlalu besar.";
            exit();
        }
    } else {
        echo "Terjadi kesalahan saat mengunggah file.";
        exit();
    }

    // Simpan ke database
    $query = $koneksi->prepare("INSERT INTO artikel (judul_artikel, isi_artikel, tgl_dibuat, heroImg) VALUES (?, ?, ?, ?)");
    $query->bind_param("ssss", $judul, $artikel, $tglDibuat, $heroImage);
    $query->execute();

    header("Location: dashboard.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/fr2ihic2nqrc3d0ts59b9rz4539dmq3mo4e526r7c6b9f9y1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#isi',
            plugins: 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code preview',
            menubar: false,
            height: 500,
            branding: false,
        });
    </script>
</head>
<body>
    <div class="container mt-5">
        <h3 class="fw-bold mb-3">Upload Artikel</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judulArtikel" class="form-label fw-bold">Judul Artikel</label>
                <input type="text" name="judulArtikel" class="form-control bg-info bg-opacity-10 border border-info border-start-0 rounded-end" required>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label fw-bold">Isi Artikel</label>
                <textarea id="isi" name="isi" class="form-control bg-info bg-opacity-10 border border-info border-start-0 rounded-end"></textarea>
            </div>
            <div class="mb-3">
                <label for="heroImage" class="form-label fw-bold">Input Hero Image</label>
                <input type="file" id="heroImage" class="form-control bg-info bg-opacity-10 border border-info border-start-0 rounded-end" name="heroImage" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Artikel</button>
        </form>
    </div>
</body>
</html>
