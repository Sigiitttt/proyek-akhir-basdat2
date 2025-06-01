<?php
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }
include '../includes/auth_admin.php'; // Cek sudah login
include '../includes/db.php';
include '../includes/header.php';

// Ambil data peminjaman yang statusnya belum diverifikasi
$query = "SELECT ph.id_pinjam, u.nama, ph.tgl_pinjam, ph.tgl_kembali, ph.status
          FROM pinjam_header ph
          JOIN user u ON ph.nim = u.nim
          WHERE ph.status = 'Menunggu'";
$result = mysqli_query($conn, $query);

// Tambahkan pengecekan error
if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

?>

<div class="container mt-4">
    <h3>Verifikasi Peminjaman</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Pinjam</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id_pinjam'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['tgl_pinjam'] ?></td>
                <td><?= $row['tgl_kembali'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    <a href="../proses/proses_pinjam.php?verifikasi=<?= $row['id_pinjam'] ?>" class="btn btn-success btn-sm">Verifikasi</a>
                    <a href="../proses/proses_pinjam.php?tolak=<?= $row['id_pinjam'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin tolak peminjaman ini?')">Tolak</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
