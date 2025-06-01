<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../includes/auth_admin.php';
include '../includes/db.php';
include '../includes/header.php';
?>

<div class="container">
    <h2>Tambah Buku Baru</h2>
    <form action="../proses/proses_buku.php" method="post">
        <div>
            <label>Judul Buku</label>
            <input type="text" name="judul" required>
        </div>
        <div>
            <label>Penulis</label>
            <input type="text" name="penulis" required>
        </div>
        <div>
            <label>Penerbit</label>
            <input type="text" name="penerbit" required>
        </div>
        <div>
            <label>Tahun Terbit</label>
            <input type="number" name="tahun" required>
        </div>
        <div>
            <button type="submit" name="tambah">Simpan</button>
        </div>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
