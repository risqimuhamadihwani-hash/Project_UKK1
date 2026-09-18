<?php
session_start();

// Menghubungkan ke database
require_once __DIR__ . '/config/database.php';

// Memeriksa apakah form dikirim menggunakan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

// Mengambil username dan password
$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// Query mencari username
$query = "SELECT id_user, Nama, username, password, role
          FROM users
          WHERE username = ?
          LIMIT 1";

// Membuat prepared statement
$stmt = mysqli_prepare($koneksi, $query);

if (!$stmt) {
    die("Query gagal: " . mysqli_error($koneksi));
}

// Memasukkan username ke query
mysqli_stmt_bind_param($stmt, "s", $username);

// Menjalankan query
mysqli_stmt_execute($stmt);

// Mengambil hasil
mysqli_stmt_store_result($stmt);

// Mengecek username
if (mysqli_stmt_num_rows($stmt) == 1) {

    mysqli_stmt_bind_result(
        $stmt,
        $id_user,
        $nama,
        $username_db,
        $password_db,
        $role
    );

    mysqli_stmt_fetch($stmt);

    // Mengecek password
    if (password_verify($password, $password)) {

        // Membuat session
        $_SESSION['id_user'] = $id_user;
        $_SESSION['nama'] = $nama;
        $_SESSION['username'] = $username_db;
        $_SESSION['role'] = $role;

        // Arahkan sesuai role
        if ($role === 'admin') {
            header("Location: admin/dashboard.php");
            exit;
        }

        if ($role === 'kasir') {
            header("Location: kasir/dashboard.php");
            exit;
        }

        if ($role === 'pemilik') {
            header("Location: pemilik/dashboard.php");
            exit;
        }

        // Role tidak dikenali
        session_destroy();
        header("Location: login.php?error=salah");
        exit;

    } else {

        // Password salah
        header("Location: login.php?error=salah");
        exit;
    }

} else {

    // Username tidak ditemukan
    header("Location: login.php?error=salah");
    exit;
}

mysqli_stmt_close($stmt);
?>