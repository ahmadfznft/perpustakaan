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

    <div class="container mx-auto py-10">
        <div class="text-center mb-6">
            <h1 class="text-4xl font-bold text-gray-800">Daftar Buku</h1>
            <div class="mt-4">
                <a href="tambah-buku.php" class="bg-yellow-500 text-white py-2 px-4 rounded-md hover:bg-yellow-400">Tambah Buku</a>
            </div>
        </div>

        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
            <table class="min-w-full table-auto" id="example">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="py-2 px-4 border-b">ID Buku</th>
                        <th class="py-2 px-4 border-b">Judul</th>
                        <th class="py-2 px-4 border-b">Penulis</th>
                        <th class="py-2 px-4 border-b">Penerbit</th>
                        <th class="py-2 px-4 border-b">Tahun Terbit</th>
                        <th class="py-2 px-4 border-b">Gambar</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
foreach ($q as $row) {?>
                        <tr class="border-b">
                            <td class="py-2 px-4"><?=$row['BukuID'];?></td>
                            <td class="py-2 px-4"><?=$row['Judul'];?></td>
                            <td class="py-2 px-4"><?=$row['Penulis'];?></td>
                            <td class="py-2 px-4"><?=$row['Penerbit'];?></td>
                            <td class="py-2 px-4"><?=$row['TahunTerbit'];?></td>
                            <td class="py-2 px-4">
                                <img src="<?=$row['Gambar'];?>" alt="Gambar" class="w-24 h-24 object-cover">
                            </td>
                            <td class="py-2 px-4">
                                <!-- <a href="#" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-400">Detail</a> -->
                                <a href="edit-buku.php?id=<?=$row['BukuID']?>" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-400">Edit</a>
                                <a href="proses-buku.php?id=<?=$row['BukuID']?>" onclick="return konfirmasiHapus()" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-400">Hapus</a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
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
