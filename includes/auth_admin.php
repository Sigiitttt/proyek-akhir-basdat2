<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    echo "<script>alert('Akses ditolak'); window.location='../auth/login.php';</script>";
    exit;
}
?>
