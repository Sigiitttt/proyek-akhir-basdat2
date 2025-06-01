<?php
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim       = $_POST['nim'];
    $nama      = $_POST['nama'];
    $jurusan   = $_POST['jurusan'];
    $angkatan  = $_POST['angkatan'];
    $email     = $_POST['email'];
    $password = $_POST['password']; 
    $role      = 'anggota';

    $cek = mysqli_query($conn, "SELECT * FROM user WHERE nim='$nim'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('NIM sudah terdaftar'); window.location='../auth/register.php';</script>";
    } else {
        $query = "INSERT INTO user (nim, nama, jurusan, angkatan, email, password, role) 
                  VALUES ('$nim', '$nama', '$jurusan', '$angkatan', '$email', '$password', '$role')";
        mysqli_query($conn, $query);
        echo "<script>alert('Registrasi berhasil'); window.location='../auth/login.php';</script>";
    }
}
?>
