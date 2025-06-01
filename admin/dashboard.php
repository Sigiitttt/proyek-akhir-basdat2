<?php
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }
include '../includes/auth_admin.php';       // Cek sudah login
include '../includes/db.php';
include '../includes/header.php';         // Template header
// include '../asstes/css/style.css';         // Template header

// Hitung total buku
$buku = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM buku"));

// Hitung total anggota
$anggota = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM user WHERE role='anggota'"));

// Hitung total peminjaman aktif
$pinjam = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM pinjam_header WHERE status='dipinjam'"));
?>

<!-- Konten Dashboard -->
<div class="container">
    <h2 class="dashboard-title">Selamat Datang di Dashboard Admin</h2>
    <div class="card-grid">
        <div class="card">
            <h3>Total Buku</h3>
            <p><?= $buku['total'] ?> buku</p>
        </div>

        <div class="card">
            <h3>Total Anggota</h3>
            <p><?= $anggota['total'] ?> orang</p>
        </div>

        <div class="card">
            <h3>Peminjaman Aktif</h3>
            <p><?= $pinjam['total'] ?> transaksi</p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
