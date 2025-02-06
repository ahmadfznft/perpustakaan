<?php
include "connection.php";
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.4.6/tailwind.min.css" />

<nav class="bg-indigo-700 shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Site-title -->
            <a href="#" class="text-white text-2xl md:text-3xl font-bold">Perpustakaan Xenon</a>
            
            <!-- Mobile menu button -->
            <button id="menu-button" class="md:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex md:items-center text-gray-400 text-sm space-x-1">
                <?php if ($_SESSION['RoleID'] == 1) { ?>
                    <li class="md:inline-block">
                        <a href="home-admin.php" class="px-3 py-2 hover:text-white rounded-md">Home</a>
                    </li>
                <?php } elseif ($_SESSION['RoleID'] == 2) { ?>
                    <li class="md:inline-block">
                        <a href="home-petugas.php" class="px-3 py-2 hover:text-white rounded-md">Home</a>
                    </li>
                <?php } elseif ($_SESSION['RoleID'] == 3) { ?>
                    <li class="md:inline-block">
                        <a href="home-peminjam.php" class="px-3 py-2 hover:text-white rounded-md">Home</a>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['RoleID'] == 1) { ?>
                    <li class="md:inline-block">
                        <a href="master-role.php" class="px-3 py-2 hover:text-white rounded-md">Daftar Role</a>
                    </li>
                    <li class="md:inline-block">
                        <a href="master-user.php" class="px-3 py-2 hover:text-white rounded-md">Daftar User</a>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['RoleID'] == 1 || $_SESSION['RoleID'] == 2) { ?>
                    <li class="md:inline-block">
                        <a href="master-kategori.php" class="px-3 py-2 hover:text-white rounded-md">Daftar Kategori</a>
                    </li>
                    <li class="md:inline-block">
                        <a href="master-buku.php" class="px-3 py-2 hover:text-white rounded-md">Daftar Buku</a>
                    </li>
                    <li class="md:inline-block">
                        <a href="laporan.php" class="px-3 py-2 hover:text-white rounded-md">Laporan</a>
                    </li>
                    <li class="md:inline-block">
                        <a href="data-peminjam.php" class="px-3 py-2 hover:text-white rounded-md">Data Peminjam</a>
                    </li>
                <?php } ?>

                <?php if ($_SESSION['RoleID'] == 3) { ?>
                    <li class="md:inline-block">
                        <a href="pinjam-buku.php" class="px-3 py-2 hover:text-white rounded-md">Pinjam Buku</a>
                    </li>
                    <li class="md:inline-block">
                        <a href="koleksi.php" class="px-3 py-2 hover:text-white rounded-md">Favorit Saya</a>
                    </li>
                <?php } ?>

                <li class="md:inline-block">
                    <a href="logout.php" class="px-3 py-2 hover:text-white rounded-md">Logout</a>
                </li>
            </ul>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <?php if ($_SESSION['RoleID'] == 1) { ?>
                    <a href="home-admin.php" class="block px-3 py-2 text-gray-300 hover:text-white rounded-md">Home</a>
                <?php } elseif ($_SESSION['RoleID'] == 2) { ?>
                    <a href="home-petugas.php" class="block px-3 py-2 text-gray-300 hover:text-white rounded-md">Home</a>
                <?php } elseif ($_SESSION['RoleID'] == 3) { ?>
                    <a href="home-peminjam.php" class="block px-3 py-2 text-gray-300 hover:text-white rounded-md">Home</a>
                <?php } ?>

                <?php if ($_SESSION['RoleID'] == 1) { ?>
                    <a href="master-role.php" class="block px-3 py-2 text-gray-300 hover:text-white rounded-md">Daftar Role</a>
                    <a href="master-user.php" class="block px-3 py-2 text-gray-300 hover:text-white rounded-md">Daftar User</a>
                <?php } ?>

                <?php if ($_SESSION['RoleID'] == 1 || $_SESSION['RoleID'] == 2) { ?>
                    <a href="master-kategori.php" class="block px-3 py-2 text-gray-300 hover:text-white rounded-md">Daftar Kategori</a>
                    <a href="master-buku.php" class="block px-3 py-2 text-gray-300 hover:text-white rounded-md">Daftar Buku</a>
                    <a href="laporan.php" class="block px-3 py-2 text-gray-300 hover:text-white rounded-md">Laporan</a>
                    <a href="data-peminjam.php" class="block px-3 py-2 text-gray-300 hover:text-white rounded-md">Data Peminjam</a>
                <?php } ?>

                <?php if ($_SESSION['RoleID'] == 3) { ?>
                    <a href="pinjam-buku.php" class="block px-3 py-2 text-gray-300 hover:text-white rounded-md">Pinjam Buku</a>
                    <a href="koleksi.php" class="block px-3 py-2 text-gray-300 hover:text-white rounded-md">Favorit Saya</a>
                <?php } ?>

                <a href="logout.php" class="block px-3 py-2 text-gray-300 hover:text-white rounded-md">Logout</a>
            </div>
        </div>
    </div>
</nav>

<script src="https://cdn.tailwindcss.com"></script>
<script>
    // Toggle mobile menu
    document.getElementById('menu-button').addEventListener('click', function() {
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.remove('hidden');
            // Add animation classes
            mobileMenu.classList.add('animate-fade-in');
            mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
        } else {
            // Add animation classes for hiding
            mobileMenu.classList.add('hidden');
            mobileMenu.style.maxHeight = '0';
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) { // md breakpoint
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.add('hidden');
        }
    });
</script>

<style>
    /* Add smooth transition for mobile menu */
    #mobile-menu {
        transition: max-height 0.3s ease-in-out;
        overflow: hidden;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate-fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }
</style>