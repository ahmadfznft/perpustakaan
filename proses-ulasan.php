<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $buku_id = $_POST['buku_id'];
    $komentar = $_POST['komentar'];
    $user_id = 1;

    $query = "INSERT INTO ulasanbuku (BukuID, UserID, Ulasan) VALUES ('$buku_id', '$user_id', '$komentar')";
    mysqli_query($conn, $query);

    header("Location: detail-buku.php?id=$buku_id");
    exit();
}
?>