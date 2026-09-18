<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    header("Location: ../login.php");
    exit;
}

if ($_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$nama = $_SESSION['nama'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin - Sistem Informasi Penjualan Toko</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f3f4f6;
        }

        .sidebar {
            position: fixed;
            width: 250px;
            height: 100vh;
            background: #2563eb;
            color: white;
            padding: 25px 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 35px;
            font-size: 20px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 13px 15px;
            margin-bottom: 8px;
            border-radius: 8px;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.15);
        }

        .logout {
            margin-top: 30px;
            background: #dc2626;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
        }

        .header {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .header h1 {
            font-size: 25px;
            margin-bottom: 5px;
        }

        .header p {
            color: #666;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .card h3 {
            font-size: 17px;
            margin-bottom: 10px;
        }

        .card p {
            color: #666;
            font-size: 14px;
        }

        @media (max-width: 800px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .content {
                margin-left: 0;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<div class="sidebar">

    <h2>WARUNG ABC</h2>

    <a href="dashboard.php">Dashboard</a>

    <a href="#">Data Barang</a>

    <a href="#">Kategori</a>

    <a href="#">Stok</a>

    <a href="#">Pengguna</a>

    <a href="../login.php" class="logout">Logout</a>

</div>

<div class="content">

    <div class="header">
        <h1>Dashboard Admin</h1>

        <p>
            Selamat datang,
            <strong><?php echo htmlspecialchars($nama); ?></strong>
        </p>

        <p>
            Username:
            <?php echo htmlspecialchars($username); ?>
        </p>
    </div>

    <div class="cards">

        <div class="card">
            <h3>Data Barang</h3>
            <p>
                Mengelola data barang yang tersedia di toko.
            </p>
        </div>

        <div class="card">
            <h3>Kategori</h3>
            <p>
                Mengelola kategori barang toko.
            </p>
        </div>

        <div class="card">
            <h3>Stok Barang</h3>
            <p>
                Mengelola dan memperbarui stok barang.
            </p>
        </div>

        <div class="card">
            <h3>Pengguna</h3>
            <p>
                Mengelola pengguna dan hak akses sistem.
            </p>
        </div>

        <div class="card">
            <h3>Transaksi</h3>
            <p>
                Melihat informasi transaksi penjualan.
            </p>
        </div>

        <div class="card">
            <h3>Laporan</h3>
            <p>
                Melihat informasi laporan penjualan.
            </p>
        </div>

    </div>

</div>

</body>
</html>