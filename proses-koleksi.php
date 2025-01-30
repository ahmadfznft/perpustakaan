<?php
include 'connection.php';

if (isset($_POST['mantap'])) {

    $buku = $_POST['bukuID'];
    $id = $_POST['userID'];

    // Cek apakah buku sudah ada di koleksi pribadi
    $check_sql = "SELECT * FROM koleksipribadi WHERE BukuID = ? AND UserID = ?";
    $check_stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "ii", $buku, $id);
    mysqli_stmt_execute($check_stmt);
    $result = mysqli_stmt_get_result($check_stmt);

    // Jika buku sudah ada di koleksi pribadi
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Buku ini sudah ada dalam koleksi pribadi Anda!');
        window.location.href='koleksi.php';
        </script>";
    } else {
        // Jika buku belum ada, masukkan ke dalam koleksi pribadi
        $sql = "INSERT INTO koleksipribadi (BukuID, UserID) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $buku, $id);

        // Eksekusi query
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Buku berhasil ditambahkan ke koleksi pribadi');
            window.location.href='koleksi.php';
            </script>";
        } else {
            echo "<script>alert('Gagal menambahkan buku ke koleksi pribadi');
            window.location.href='detail-buku.php';
            </script>";
        }

        // Menutup statement
        mysqli_stmt_close($stmt);
    }

    // Menutup statement pengecekan
    mysqli_stmt_close($check_stmt);
}

// Hapus buku dari koleksi pribadi
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM koleksipribadi WHERE KoleksiID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Buku berhasil dihapus dari koleksi pribadi');
        window.location.href='koleksi.php';
        </script>";
    } else {
        echo "<script>alert('Gagal menghapus buku dari koleksi pribadi');
        window.location.href='koleksi.php';
        </script>";
    }

    // Menutup statement
    mysqli_stmt_close($stmt);
}

// Tambah buku ke koleksi pribadi dengan metode GET
if (isset($_GET['buku_id']) && isset($_GET['user_id'])) {
    $buku_id = $_GET['buku_id'];
    $user_id = $_GET['user_id'];

    // Cek apakah buku sudah ada di koleksi pribadi
    $check_sql = "SELECT * FROM koleksipribadi WHERE BukuID = ? AND UserID = ?";
    $check_stmt = mysqli_prepare($conn, $check_sql);
    mysqli_stmt_bind_param($check_stmt, "ii", $buku_id, $user_id);
    mysqli_stmt_execute($check_stmt);
    $result = mysqli_stmt_get_result($check_stmt);

    // Jika buku sudah ada di koleksi pribadi
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Buku ini sudah ada dalam koleksi pribadi Anda!');
        window.location.href='koleksi.php';
        </script>";
    } else {
        // Jika buku belum ada, masukkan ke dalam koleksi pribadi
        $sql = "INSERT INTO koleksipribadi (BukuID, UserID) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ii", $buku_id, $user_id);

        // Eksekusi query
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Buku berhasil ditambahkan ke koleksi pribadi');
            window.location.href='koleksi.php';
            </script>";
        } else {
            echo "<script>alert('Gagal menambahkan buku ke koleksi pribadi');
            window.location.href='detail-buku.php';
            </script>";
        }

        // Menutup statement
        mysqli_stmt_close($stmt);
    }

    // Menutup statement pengecekan
    mysqli_stmt_close($check_stmt);
}
?>