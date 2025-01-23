<?php
include 'connection.php';

session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <script>
        var confirmation = confirm("Apakah Anda yakin ingin keluar?");
        
        if (confirmation) {
            window.location.href = "login.php";
        } else {
            window.location.href = document.referrer;
        }
    </script>
</head>

<body>
</body>

</html>
