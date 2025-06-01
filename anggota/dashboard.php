<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../includes/auth_anggota.php';
include '../includes/db.php';
include '../includes/header_anggota.php';


$id_anggota = $_SESSION['nim'];
$query = mysqli_query($conn, "
    SELECT b.judul, p.tgl_pinjam, p.tgl_kembali, k.tgl_dikembalikan
    FROM pinjam_header p
    JOIN pinjam_detail d ON p.id_pinjam = d.id_pinjam
    JOIN buku b ON d.id_buku = b.id_buku
    LEFT JOIN pengembalian k ON p.id_pinjam = k.id_pinjam
    WHERE p.nim = '$id_anggota' AND p.status = 'dipinjam'
");



?>
<div class="container">
    <h2>Pinjaman Aktif</h2>
    <table class="tabel">
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Harus Kembali</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?= htmlspecialchars($row['judul']) ?></td>
                    <td><?= $row['tgl_pinjam'] ?></td>
                    <td><?= $row['tgl_kembali'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
