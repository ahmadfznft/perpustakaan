<?php
include "connection.php"; // Pastikan untuk menyertakan koneksi database

if (isset($_GET['konfirmasi'])) {
    $peminjaman_id = $_GET['konfirmasi'];
    $query = "UPDATE peminjaman SET StatusPeminjaman = 'Buku Dipinjam' WHERE PeminjamanID = '$peminjaman_id'";
    if (mysqli_query($conn, $query)) {
        header("Location: data-peminjam.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>