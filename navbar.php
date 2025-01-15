<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.4.6/tailwind.min.css" />

        <!-- Tailwind-css Navbar  -->
        <nav class="bg-indigo-700 shadow-lg">
            <div class="container mx-auto">
                <div class="sm:flex justify-around">
                    <!-- Site-title  -->
                    <a href="#" class="text-white text-3xl font-bold p-3">Perpustakaan Xenon</a>

                    <!-- Home !-->
                    <ul class="text-gray-400 sm:self-center text-sm border-t sm:border-none">
                        <?php if ($_SESSION['RoleID'] == 1) { ?>
                            <li class="sm:inline-block">
                                <a href="home-admin.php" class="p-3 hover:text-white">Home</a>
                            </li>
                        <?php } elseif ($_SESSION['RoleID'] == 2) { ?>
                            <li class="sm:inline-block">
                                <a href="home-petugas.php" class="p-3 hover:text-white">Home</a>
                            </li>
                        <?php } elseif ($_SESSION['RoleID'] == 3) { ?>
                            <li class="sm:inline-block">
                                <a href="home-user.php" class="p-3 hover:text-white">Home</a>
                            </li>
                        <?php } ?>

                        <!-- End !-->

                        <!-- Menu 1 !-->
                        <?php if ($_SESSION['RoleID'] == 1) { ?>
                            <li class="sm:inline-block">
                                <a href="master-role.php" class="p-3 hover:text-white">Daftar Role </a>
                            </li>
                            <li class="sm:inline-block">
                                <a href="#" class="p-3 hover:text-white">Daftar User</a>
                            </li>
                        <?php } ?>
                        <!-- End !-->

                        <?php if ($_SESSION['RoleID'] == 1 || $_SESSION['RoleID'] == 2) { ?>
                            <li class="sm:inline-block">
                                <a href="master-kategori.php" class="p-3 hover:text-white">Daftar Kategori</a>
                            </li>
                            <li class="sm:inline-block">
                                <a href="#" class="p-3 hover:text-white">Daftar Buku</a>
                            </li>
                            <li class="sm:inline-block">
                                <a href="#" class="p-3 hover:text-white">Laporan</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <script src="https://cdn.tailwindcss.com"></script>
    </body>

    </html>
</body>

</html>