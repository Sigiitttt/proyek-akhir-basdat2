<?php
include '../includes/db.php';

// Proses Tambah Buku
if (isset($_POST['tambah'])) {
    $judul    = $_POST['judul'];
    $penulis  = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun    = $_POST['tahun'];

    $query = "INSERT INTO buku (judul, penulis, penerbit, tahun)
              VALUES ('$judul', '$penulis', '$penerbit', '$tahun')";
    mysqli_query($conn, $query);
    
    echo "<script>alert('Buku berhasil ditambahkan'); window.location='../admin/buku.php';</script>";
}

// Proses Hapus Buku
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM buku WHERE id_buku = $id");
    echo "<script>alert('Buku berhasil dihapus'); window.location='../admin/buku.php';</script>";
}


// Proses Edit Buku
if (isset($_POST['update'])) {
    $id_buku  = $_POST['id_buku'];
    $judul    = $_POST['judul'];
    $penulis  = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun    = $_POST['tahun'];

    $query = "UPDATE buku SET 
                judul='$judul', 
                penulis='$penulis', 
                penerbit='$penerbit', 
                tahun='$tahun' 
              WHERE id_buku=$id_buku";

    mysqli_query($conn, $query);
    echo "<script>alert('Data buku diperbarui'); window.location='../admin/buku.php';</script>";
}

?>
