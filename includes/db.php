<?php
// Konfigurasi koneksi ke database
$host     = "localhost";      // biasanya localhost
$username = "root";           // username database
$password = "1";               // password database (kosong jika default di XAMPP)
$database = "basdat";   // nama database kamu

// Membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
