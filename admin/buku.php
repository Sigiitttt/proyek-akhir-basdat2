<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../includes/auth_admin.php';
include '../includes/db.php';
include '../includes/header.php';

// Ambil data buku dari database
$query = mysqli_query($conn, "SELECT * FROM buku");
?>

<div class="container">
    <h2>Manajemen Buku</h2>
    <a href="tambah_buku.php" class="btn">+ Tambah Buku</a>

    <table class="tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['judul']) ?></td>
                    <td><?= htmlspecialchars($row['penulis']) ?></td>
                    <td><?= htmlspecialchars($row['penerbit']) ?></td>
                    <td><?= htmlspecialchars($row['tahun_terbit']) ?></td>
                    <td>
                        <a href="edit_buku.php?id=<?= $row['id_buku'] ?>" class="btn-edit">Edit</a> |
                        <a href="../proses/proses_buku.php?hapus=<?= $row['id_buku'] ?>" class="btn-hapus" onclick="return confirm('Hapus buku ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
