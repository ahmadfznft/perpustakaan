<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $buku_id = $_POST['buku_id'];
    $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $status_peminjaman = 'Dipinjam';
    $user_id = $_SESSION['UserID'];

    // Query untuk menyimpan data peminjaman
    $query = "INSERT INTO peminjaman (UserID, BukuID, TanggalPeminjaman, TanggalPengembalian, StatusPeminjaman) 
              VALUES ('$user_id', '$buku_id', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Peminjaman Berhasil Dilakukan');
                window.location.href='pinjam-buku.php';
            </script>";
    } else {
        echo "<script>
        alert('Peminjaman Gagal di lakukan');
        window.location.href='tambah-peminjaman.php';
    </script>";
    }
}
$id = $_GET['id'];
$sql = "DELETE FROM peminjaman WHERE PeminjamanID = $id";
$hapus = mysqli_query($conn, $sql);

if ($hapus) {
    $query = mysqli_query($conn, "ALTER TABLE peminjaman=$id");
    echo "<script>alert('Berhasil');
    window.location.href='pinjam-buku.php';
    </script>";
} else {
    echo "<script>alert('Gagal');
    window.location.href='pinjam-buku.php';
    </script>";
}
