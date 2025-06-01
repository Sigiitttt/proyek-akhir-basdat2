<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../includes/auth_admin.php';
include '../includes/db.php';
include '../includes/header.php';

$query = mysqli_query($conn, "SELECT * FROM user WHERE role = 'anggota'");
?>

<div class="container">
    <h2>Manajemen Anggota</h2>
    <a href="tambah_anggota.php" class="btn">+ Tambah Anggota</a>

    <table class="tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>telepon</th>
                <th>jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['nim']) ?></td>
                <td><?= htmlspecialchars($row['telepon']) ?></td>
                <td><?= htmlspecialchars($row['jurusan']) ?></td>
                <td>
                    <a href="edit_anggota.php?id=<?= $row['nim'] ?>">Edit</a> |
                    <a href="../proses/proses_anggota.php?hapus=<?= $row['nim'] ?>" onclick="return confirm('Hapus anggota ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
