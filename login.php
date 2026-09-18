<?php
session_start();

// Jika sudah login, arahkan ke halaman sesuai role
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: ../admin/dashboard.php");
        exit;
    } elseif ($_SESSION['role'] == 'kasir') {
        header("Location: ../kasir/dashboard.php");
        exit;
    } elseif ($_SESSION['role'] == 'pemilik') {
        header("Location: ../pemilik/dashboard.php");
        exit;
    }
}

$error = '';

if (isset($_GET['error'])) {
    if ($_GET['error'] == 'salah') {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Sistem Informasi Penjualan Toko</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-body">

                    <h3 class="text-center mb-4">
                        Login
                    </h3>

                    <p class="text-center text-muted">
                        Sistem Informasi Penjualan Toko
                    </p>

                    <?php if ($error != '') { ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>

                    <form action="proses_login.php" method="POST">

                        <div class="mb-3">

                            <label class="form-label">
                                Username
                            </label>

                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>

                        </div>

                        <button type="submit"
                                class="btn btn-primary w-100">

                            Login

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>