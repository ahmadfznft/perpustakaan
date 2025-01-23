<?php
include 'connection.php';

if (isset($_GET['ubah'])) {
    $peminjaman_id = $_GET['ubah'];

    $update_status_query = "UPDATE peminjaman SET StatusPeminjaman = 'Sudah Dikembalikan' WHERE PeminjamanID = '$peminjaman_id'";
    if (mysqli_query($conn, $update_status_query)) {
        header('Location: data-peminjaman.php');
    } else {
        echo "Gagal mengubah status peminjaman.";
    }
}

if (isset($_GET['hapus'])) {
    $peminjaman_id = $_GET['hapus'];

    $delete_query = "DELETE FROM peminjaman WHERE PeminjamanID = '$peminjaman_id'";
    if (mysqli_query($conn, $delete_query)) {
        header('Location: data-peminjaman.php');
    } else {
        echo "Gagal menghapus peminjaman.";
    }
}
?>
