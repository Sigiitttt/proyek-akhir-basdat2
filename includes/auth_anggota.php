<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'anggota') {
    echo "<script>alert('Akses ditolak'); window.location='../auth/login.php';</script>";
    exit;
}
?>
