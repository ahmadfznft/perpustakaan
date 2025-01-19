<?php
include "navbar.php";
include "assets/link.php";

$q = "SELECT * FROM buku
ORDER BY BukuID ASC";
$q = mysqli_query($conn, $q);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Buku</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- DataTables CSS (Tailwind variant) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

<div class="container mx-auto px-4">
    <div class="mt-6">
        <h1 class="text-3xl font-bold text-center mb-6">Data Buku</h1>
        <div class="text-right mb-4">
            <a href="tambah-buku.php" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Tambah Data Buku</a>
        </div>
        <div class="overflow-x-auto">
            <table id="example" class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">ID Buku</th>
                        <th class="py-2 px-4 border">Judul</th>
                        <th class="py-2 px-4 border">Pengarang</th>
                        <th class="py-2 px-4 border">Penerbit</th>
                        <th class="py-2 px-4 border">Tahun Terbit</th>
                        <th class="py-2 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($q as $row) { ?>
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border text-center"><?= $row['BukuID']; ?></td>
                            <td class="py-2 px-4 border text-center"><?= $row['Judul']; ?></td>
                            <td class="py-2 px-4 border text-center"><?= $row['Penulis']; ?></td>
                            <td class="py-2 px-4 border text-center"><?= $row['Penerbit']; ?></td>
                            <td class="py-2 px-4 border text-center"><?= $row['TahunTerbit']; ?></td>
                            <td class="py-2 px-4 border text-center">
                                <a href="edit-buku.php?id=<?= $row['BukuID'] ?>" class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">Edit</a>
                                <a href="proses-buku.php?id=<?= $row['BukuID'] ?>" onclick="return konfirmasiHapus()" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Tailwind DataTables integration (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-table@1.0.0/dist/tailwind-table.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function konfirmasiHapus() {
            var agree = confirm("Apakah Anda yakin ingin menghapus ini?");
            if (agree) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>
