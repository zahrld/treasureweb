<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "treasure";

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi secara eksplisit
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>