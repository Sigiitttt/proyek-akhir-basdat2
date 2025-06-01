<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../includes/auth_anggota.php';
include '../includes/db.php';
include '../includes/header_anggota.php';

$nim = $_SESSION['nim'];

$query = mysqli_query($conn, "
    SELECT 
        b.judul,
        ph.tgl_pinjam,
        ph.tgl_kembali,         -- Tambahkan ini
        pg.tgl_dikembalikan,
        ph.status
    FROM 
        pinjam_header ph
    JOIN 
        pinjam_detail pd ON ph.id_pinjam = pd.id_pinjam
    JOIN 
        buku b ON pd.id_buku = b.id_buku
    LEFT JOIN 
        pengembalian pg ON ph.id_pinjam = pg.id_pinjam
    WHERE 
        ph.nim = '$nim'
    ORDER BY 
        ph.tgl_pinjam DESC
");

?>



<div class="container">
    <h2>Histori Peminjaman</h2>
    <table class="tabel">
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($query)) : ?>
                <tr>
                    <td><?= htmlspecialchars($row['judul']) ?></td>
                    <td><?= $row['tgl_pinjam'] ?></td>
                    <td><?= $row['tgl_kembali'] ?></td>
                    <td><?= ucfirst($row['status']) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>