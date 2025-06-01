<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../includes/auth_admin.php';
include '../includes/db.php';
include '../includes/header.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID buku tidak ditemukan'); window.location='buku.php';</script>";
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Buku tidak ditemukan'); window.location='buku.php';</script>";
    exit;
}
?>

<div class="container">
    <h2>Edit Buku</h2>
    <form action="../proses/proses_buku.php" method="POST">
        <input type="hidden" name="id_buku" value="<?= $data['id_buku'] ?>">

        <label>Judul Buku</label>
        <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" required>

        <label>Penulis</label>
        <input type="text" name="penulis" value="<?= htmlspecialchars($data['penulis']) ?>" required>

        <label>Penerbit</label>
        <input type="text" name="penerbit" value="<?= htmlspecialchars($data['penerbit']) ?>" required>

        <label>Tahun Terbit</label>
        <input type="number" name="tahun" value="<?= $data['tahun'] ?>" required min="1900" max="<?= date('Y') ?>">

        <button type="submit" name="update">Simpan Perubahan</button>
    </form><?php
session_start();
include '../includes/auth.php';
include '../includes/db.php';
include '../includes/header.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID Buku tidak ditemukan'); window.location='buku.php';</script>";
    exit;
}

$id_buku = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = $id_buku");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<script>alert('Buku tidak ditemukan'); window.location='buku.php';</script>";
    exit;
}
?>

<div class="container">
    <h2>Edit Buku</h2>
    <form action="../proses/proses_buku.php" method="post">
        <input type="hidden" name="id_buku" value="<?= $data['id_buku'] ?>">
        <div>
            <label>Judul Buku</label>
            <input type="text" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" required>
        </div>
        <div>
            <label>Penulis</label>
            <input type="text" name="penulis" value="<?= htmlspecialchars($data['penulis']) ?>" required>
        </div>
        <div>
            <label>Penerbit</label>
            <input type="text" name="penerbit" value="<?= htmlspecialchars($data['penerbit']) ?>" required>
        </div>
        <div>
            <label>Tahun Terbit</label>
            <input type="number" name="tahun" value="<?= htmlspecialchars($data['tahun']) ?>" required>
        </div>
        <div>
            <button type="submit" name="update">Update</button>
        </div>
    </form>
</div>

<?php include '../includes/footer.php'; ?>

</div>

<?php include '../includes/footer.php'; ?>
