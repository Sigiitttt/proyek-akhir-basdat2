<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../includes/db.php';

$nim = $_POST['nim'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM user WHERE nim = '$nim'");
$data = mysqli_fetch_assoc($query);

if ($data && $password == $data['password'])  {
    $_SESSION['nim']  = $data['nim'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role'];

    if ($data['role'] == 'admin') {
        header("Location: ../admin/dashboard.php");
    } else {
        header("Location: ../anggota/dashboard.php");
    }
} else {
    echo "<script>alert('NIM atau Password salah'); window.location='../auth/login.php';</script>";
}
?>
