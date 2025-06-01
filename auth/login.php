<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Perpustakaan</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="../proses/proses_login.php" method="POST">
            <label for="nim">NIM</label>
            <input type="text" name="nim" required>

            <label for="password">Password</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar</a></p>
    </div>
</body>
</html>
