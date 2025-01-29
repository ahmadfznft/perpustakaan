<?php
include 'connection.php';

if (isset($_POST['komentar'])) {
    $bukuID = $_POST['buku_id'];
    $isikomentar = $_POST['komentar'];
    $userid = $_SESSION['UserID'];

    if ($parentID) {
        $query = "INSERT INTO ulasanbuku (UserID, BukuID, Ulasan, tanggalUlasan) 
                  VALUES ('$userid', '$bukuID', '$isikomentar', NOW())";
    } else {
        $query = "INSERT INTO ulasanbuku (UserID, BukuID, Ulasan, tanggalUlasan) 
                  VALUES ('$userid', '$bukuID', '$isikomentar', NOW())";
    }

    if (mysqli_query($conn, $query)) {
        header("Location: detail-buku.php?id=$bukuID");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// if (isset($_POST['reply_komentar'])) {
//     $bukuID = $_POST['buku_id'];
//     $isikomentar = $_POST['reply_komentar'];
//     $userid = $_SESSION['UserID'];
//     $parentID = $_POST['parent_id']; // Mengambil ID parent dari form

//     $query = "INSERT INTO ulasanbuku (UserID, BukuID, Ulasan, ParentID, tanggalUlasan) 
//               VALUES ('$userid', '$bukuID', '$isikomentar', '$parentID', NOW())";

//     if (mysqli_query($conn, $query)) {
//         header("Location: detail-buku.php?id=$bukuID");
//     } else {
//         echo "Error: " . mysqli_error($conn);
//     }
// }
// ?>