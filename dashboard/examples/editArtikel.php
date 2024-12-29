<?php
include 'koneksi.php';

session_start();

if(!isset($_SESSION['username'])){
    $message = true;
    header("Location: ../../login/login.php?message=$message");
}

$id = $_GET['id'];

$query = "SELECT * FROM artikel WHERE id_artikel = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judulArtikel'];
    $artikel = $_POST['isi'];
    $tglDibuat = date("Y-m-d");
    $heroImage = $row['heroImg'];

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
    }

    // Update data di database
    $updateQuery = "UPDATE artikel SET judul_artikel = ?, isi_artikel = ?, tgl_dibuat = ?, heroImg = ? WHERE id_artikel = ?";
    $updateStmt = $koneksi->prepare($updateQuery);
    $updateStmt->bind_param("ssssi", $judul, $artikel, $tglDibuat, $heroImage, $id);
    $updateStmt->execute();

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Integrasi TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/fr2ihic2nqrc3d0ts59b9rz4539dmq3mo4e526r7c6b9f9y1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#isi',
            plugins: 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
            toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code preview',
            menubar: false,
            height: 400,
            branding: false,
        });
    </script>
</head>
<body>
    <div class="container mt-5">
        <h3>Update Artikel</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judulArtikel" class="form-label fw-bold">Judul Artikel</label>
                <input type="text" name="judulArtikel" value="<?= htmlspecialchars($row['judul_artikel'] ?? '') ?>" class="form-control bg-info bg-opacity-10 border border-info border-start-0 rounded-end" required>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label fw-bold">Isi Artikel</label>
                <textarea id="isi" name="isi"><?= htmlspecialchars($row['isi_artikel'] ?? '') ?></textarea>
            </div>
            <div class="mb-3">
                <label for="currentHeroImage" class="form-label fw-bold">Gambar Hero Saat Ini</label><br>
                <?php if (!empty($row['heroImg'])): ?>
                    <img src="assets/img/Artikel Image/<?= htmlspecialchars($row['heroImg']) ?>" alt="Hero Image" width="200"><br><br>
                <?php else: ?>
                    <p>Tidak ada gambar hero saat ini.</p>
                <?php endif; ?>
                <label for="heroImage" class="form-label fw-bold">Upload Hero Image Baru (Opsional)</label>
                <input type="file" id="heroImage" class="form-control bg-info bg-opacity-10 border border-info border-start-0 rounded-end" name="heroImage">
            </div>
            <button type="submit" class="btn btn-primary">Update Artikel</button>
        </form>
    </div>
</body>
</html>
