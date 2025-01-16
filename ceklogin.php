<?php
include "connection.php";

$user = $_POST['username'];
$pw = md5($_POST['pass']);

$query = mysqli_query(
    $conn,
    "SELECT * FROM `user` WHERE Username='$user' 
and Password='$pw'"
);

$count = mysqli_num_rows($query);
if ($count > 0) {
    $login = mysqli_fetch_array($query);

    //echo "<script>alert('login berhasil');
    //window.location.href='home.php';
    //</script>";
    $_SESSION['UserID'] = $login['UserID'];
    $_SESSION['RoleID'] = $login['RoleID'];
    $_SESSION['Username'] = $login['Username'];
    $_SESSION['status'] = 'login';

    if ($login['RoleID'] == 1) {
        echo "<script>alert('login berhasil');
    window.location.href='home-admin.php';
    </script>";
    } elseif ($login['RoleID'] == 2) {
        echo "<script>alert('login berhasil');
    window.location.href='home-petugas.php';
    </script>";
    } elseif ($login['RoleID'] == 3) {
        echo "<script>alert('login berhasil');
    window.location.href='home-peminjam.php';
    </script>";
    }
} else {
    echo "<script>alert('login gagal');
    window.location.href='login.php';
   </script>";
}
