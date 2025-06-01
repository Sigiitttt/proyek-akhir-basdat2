<?php
session_start();
include '../includes/db.php';

$nim = $_SESSION['nim'] ?? null;

if (!$nim) {
    echo "<script>alert('Anda harus login'); window.location='../auth/login.php';</script>";
    exit;
}

$nim = $_SESSION['nim'] ?? null;

if (!$nim) {
    echo "<script>alert('Anda harus login'); window.location='../auth/login.php';</script>";
    exit;
}


$tgl_pinjam = date('Y-m-d');
$tgl_kembali = date('Y-m-d', strtotime('+7 days'));

if (isset($_POST['ajukan'])) {
    $id_buku = $_POST['id_buku'];
    $jumlah = 1; // default jumlah 1 buku

    // 1. Insert ke pinjam_header
    $query1 = "INSERT INTO pinjam_header (nim, tgl_pinjam, status)
               VALUES ('$nim', '$tgl_pinjam', 'Menunggu')";
    mysqli_query($conn, $query1);

    // 2. Ambil ID pinjam terakhir yang dimasukkan
    $id_pinjam = mysqli_insert_id($conn);

    // 3. Insert ke pinjam_detail
    $query2 = "INSERT INTO pinjam_detail (id_pinjam, id_buku, jumlah)
               VALUES ('$id_pinjam', '$id_buku', '$jumlah')";
    mysqli_query($conn, $query2);

    echo "<script>alert('Permintaan peminjaman dikirim'); window.location='../anggota/daftar_buku.php';</script>";

}



// Verifikasi oleh admin
if (isset($_GET['verifikasi'])) {
    $id = $_GET['verifikasi'];
    mysqli_query($conn, "UPDATE pinjam_header SET status = 'Dipinjam' WHERE id_pinjam = $id");
    echo "<script>alert('Peminjaman diverifikasi'); window.location='../admin/pinjam.php';</script>";
}

// Tolak peminjaman
if (isset($_GET['tolak'])) {
    $id = $_GET['tolak'];
    mysqli_query($conn, "DELETE FROM peminjaman WHERE id_pinjam = $id");
    echo "<script>alert('Peminjaman ditolak'); window.location='../admin/pinjam.php';</script>";
}
