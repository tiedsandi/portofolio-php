<?php
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Data user statis (tanpa database)
    $userData = [
        "email" => "admin@admin.com",
        "password" => "123", // Simpan dalam bentuk hash jika ingin lebih aman
        "name" => "Admin",
    ];

    // Validasi email
    if ($email === $userData['email']) {
        // Validasi password
        if ($password === $userData['password']) {
            $_SESSION['nama'] = $userData['name'];

            header("location: index.php");
            exit();
        } else {
            header("location: login.php?error=password_salah");
            exit();
        }
    } else {
        header("location: login.php?error=email_tidak_ditemukan");
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bootstrap 4</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            margin-top: 100px;
            max-width: 400px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="login-container">
        <h4 class="text-center mb-4">Login</h4>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php if ($_GET['error'] == "email_tidak_ditemukan") {
                    echo "Email tidak ditemukan!";
                } else if ($_GET['error'] == "password_salah") {
                    echo "Password salah!";
                } ?>
            </div>
        <?php } ?>
        <form method="POST" action="">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
        </form>
    </div>
</div>

<!-- Bootstrap 4 JS & jQuery (Diperlukan untuk beberapa fitur Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
