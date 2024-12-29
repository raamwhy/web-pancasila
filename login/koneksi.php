<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pancasila_db';

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
