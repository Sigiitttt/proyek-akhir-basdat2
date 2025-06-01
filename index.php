C:\Users\ARII\Videos\basdat<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: anggota/dashboard.php");
    }
} else {
    header("Location: auth/login.php");
    exit;
}
?>
