<?php
include "connection.php";
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.4.6/tailwind.min.css" />

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
                        <a href="home-peminjam.php" class="p-3 hover:text-white">Home</a>
                    </li>
                <?php } ?>

                <!-- End !-->

                <!-- Menu 1 !-->
                <?php if ($_SESSION['RoleID'] == 1) { ?>
                    <li class="sm:inline-block">
                        <a href="master-role.php" class="p-3 hover:text-white">Daftar Role </a>
                    </li>
                    <li class="sm:inline-block">
                        <a href="master-user.php" class="p-3 hover:text-white">Daftar User</a>
                    </li>
                <?php } ?>
                <!-- End !-->

                <?php if ($_SESSION['RoleID'] == 1 || $_SESSION['RoleID'] == 2) { ?>
                    <li class="sm:inline-block">
                        <a href="master-kategori.php" class="p-3 hover:text-white">Daftar Kategori</a>
                    </li>
                    <li class="sm:inline-block">
                        <a href="master-buku.php" class="p-3 hover:text-white">Daftar Buku</a>
                    </li>
                    <li class="sm:inline-block">
                        <a href="laporan.php" class="p-3 hover:text-white">Laporan</a>
                    </li>
                    <li class="sm:inline-block">
                        <a href="data-peminjam.php" class="p-3 hover:text-white">Data Peminjam</a>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['RoleID'] == 3) { ?>
                    <li class="sm:inline-block">
                        <a href="pinjam-buku.php" class="p-3 hover:text-white">Pinjam Buku</a>
                    </li>
                    <li class="sm:inline-block">
                        <a href="koleksi.php" class="p-3 hover:text-white">Favorit Saya</a>
                    </li>
                <?php } ?>

                <li class="sm:inline-block">
                    <a href="logout.php" class="p-10 hover:text-white">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.tailwindcss.com"></script>