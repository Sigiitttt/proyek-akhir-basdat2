<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Perpustakaan</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="login-container">
    <h2>Register</h2>
    <form action="../proses/proses_register.php" method="POST">
        <label>NIM</label>
        <input type="text" name="nim" required>

        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Jurusan</label>
        <input type="text" name="jurusan" required>

        <label>Angkatan</label>
        <input type="text" name="angkatan" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</div>
</body>
</html>
