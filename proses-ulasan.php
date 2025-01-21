<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $buku_id = $_POST['buku_id'];
    $user_id = $_SESSION['UserID'];
    $rating = $_POST['rating'];
    $ulasan = $_POST['ulasan'];

    $query_cek = "SELECT * FROM ulasanbuku WHERE UserID = '$user_id' AND BukuID = '$buku_id'";
    $result_cek = mysqli_query($conn, $query_cek);

    if(mysqli_num_rows($result_cek) > 0) {
        echo "<script>
            alert('Anda sudah memberikan ulasan untuk buku ini!');
            window.location.href = 'ulasan.php';
        </script>";
        exit;
    }

    $query = "INSERT INTO ulasanbuku (BukuID, UserID, Rating, Ulasan) 
              VALUES ('$buku_id', '$user_id', '$rating', '$ulasan')";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Ulasan berhasil ditambahkan!');
                window.location.href='ulasan.php';
              </script>";
    }
} elseif (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $user_id = $_SESSION['UserID'];

    // Cek apakah ulasan milik user yang sedang login
    $check_query = "SELECT UserID FROM ulasanbuku WHERE UlasanID = '$id'";
    $result = mysqli_query($conn, $check_query);
    $data = mysqli_fetch_assoc($result);

    if ($data['UserID'] != $user_id) {
        echo "<script>
                alert('Anda tidak berhak menghapus ulasan ini!');
                window.location.href='ulasan.php';
              </script>";
        exit();
    }

    $query = "DELETE FROM ulasanbuku WHERE UlasanID='$id' AND UserID='$user_id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Ulasan berhasil dihapus!');
                window.location.href='ulasan.php';
              </script>";
    }
} elseif (isset($_POST['update'])) {
    $id = $_POST['ulasan_id'];
    $rating = $_POST['rating'];
    $ulasan = $_POST['ulasan'];
    $user_id = $_SESSION['UserID'];

    // Cek apakah ulasan milik user yang sedang login
    $check_query = "SELECT UserID FROM ulasan WHERE UlasanID = '$id'";
    $result = mysqli_query($conn, $check_query);
    $data = mysqli_fetch_assoc($result);

    if ($data['UserID'] != $user_id) {
        echo "<script>
                alert('Anda tidak berhak mengubah ulasan ini!');
                window.location.href='ulasan.php';
              </script>";
        exit();
    }

    $query = "UPDATE ulasan 
              SET Rating='$rating', Ulasan='$ulasan' 
              WHERE UlasanID='$id' AND UserID='$user_id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Ulasan berhasil diupdate!');
                window.location.href='ulasan.php';
              </script>";
    }
}
