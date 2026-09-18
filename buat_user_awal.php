<?php

require_once __DIR__ . '/config/database.php';

$password = password_hash('admin123', PASSWORD_DEFAULT);

$data = [
    ['Administrator', 'admin', 'admin'],
];

foreach ($data as $user) {

    $nama = $user[0];
    $username = $user[1];
    $role = $user[2];

    $query = "INSERT INTO users (Nama, username, password, role)
              VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($koneksi, $query);

    mysqli_stmt_bind_param(
        $stmt,
        "ssss",
        $nama,
        $username,
        $password,
        $role
    );

    mysqli_stmt_execute($stmt);
}

echo "User berhasil dibuat. Silakan login.";
?>