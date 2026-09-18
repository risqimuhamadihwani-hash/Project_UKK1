<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "sistem_informasi_penjualan_toko";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8mb4");

?>