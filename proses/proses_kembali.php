<?php
include '../includes/db.php';

if (isset($_GET['kembali'])) {
    $id = $_GET['kembali'];
    $tgl_dikembalikan = date('Y-m-d');

    // Insert ke tabel pengembalian
    $query = "INSERT INTO pengembalian (id_pinjam, tgl_dikembalikan, denda, keterangan)
              VALUES ('$id', '$tgl_dikembalikan', 0, 'Tepat waktu')";

    mysqli_query($conn, $query);

    // Optional: update status di pinjam_header (jika kolom status digunakan)
    mysqli_query($conn, "UPDATE pinjam_header SET status = 'Dikembalikan' WHERE id_pinjam = '$id'");

    echo "<script>alert('Buku telah dikembalikan'); window.location='../admin/pengembalian.php';</script>";
}
?>
