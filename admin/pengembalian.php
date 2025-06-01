
<?php
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }
include '../includes/auth_admin.php';
include '../includes/db.php';
include '../includes/header.php';


$query = mysqli_query($conn, "
    SELECT ph.*, u.nama, b.judul
    FROM pinjam_header ph
    JOIN user u ON ph.nim = u.nim
    JOIN pinjam_detail pd ON ph.id_pinjam = pd.id_pinjam
    JOIN buku b ON pd.id_buku = b.id_buku
    WHERE ph.status = 'Dipinjam'
");

?>

<div class="container">
    <h2>Daftar Buku yang Sedang Dipinjam</h2>
    <table class="tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($query)) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($row['nama']) ?></td>
                <td><?= htmlspecialchars($row['judul']) ?></td>
                <td><?= htmlspecialchars($row['tgl_pinjam']) ?></td>
                <td>
                    <a href="../proses/proses_kembali.php?kembali=<?= $row['id_pinjam'] ?>" class="btn-kembali"
                       onclick="return confirm('Sudah dikembalikan?')">Kembalikan</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>