<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../includes/auth_anggota.php';
include '../includes/db.php';
include '../includes/header_anggota.php';

$query = mysqli_query($conn, "SELECT * FROM buku");
?>

<div class="container">
    <h2>Daftar Buku</h2>
    <table class="tabel">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?= htmlspecialchars($row['judul']) ?></td>
                    <td><?= htmlspecialchars($row['penulis']) ?></td>
                    <td><?= htmlspecialchars($row['penerbit']) ?></td>
                    <td><?= htmlspecialchars($row['tahun_terbit']) ?></td>
                    <td>
                        <form method="post" action="../proses/proses_pinjam.php" style="display:inline;">
                            <input type="hidden" name="id_buku" value="<?= $row['id_buku'] ?>">
                            <button type="submit" name="ajukan">Pinjam</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
