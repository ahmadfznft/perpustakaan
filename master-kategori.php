<?php
include "navbar.php"; // Pastikan file navbar.php ada dan berisi koneksi atau navigasi yang benar
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">    
</head>

<body>
    <?php
    include "assets/link.php"; 
    $sql = "SELECT * FROM `kategori_buku` ORDER BY KategoriID ASC";
    $kategori = mysqli_query($conn, $sql); 
    ?>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold text-center mb-6">Data Kategori</h1>

        <div class="flex justify-end mb-4">
            <a href="tambah-kategori.php" class="bg-yellow-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-500">
                <i class="bi bi-person-plus"></i> Tambah Data Kategori
            </a>
        </div>

        <div class="overflow-x-auto">
            <table id="example" class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Nomor</th>
                        <th class="border px-4 py-2">Nama Kategori</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Pastikan menggunakan while atau foreach dengan mysqli_fetch_assoc atau hasil query
                    while ($row = mysqli_fetch_assoc($kategori)) {
                    ?>
                        <tr>
                            <td class="border px-4 py-2"><?= $row['KategoriID']; ?></td>
                            <td class="border px-4 py-2"><?= $row['NamaKategori']; ?></td>
                            <td class="border px-4 py-2">
                                <a href="edit-kategori.php?id=<?= $row['KategoriID'] ?>" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="proses-kategori.php?id=<?= $row['KategoriID'] ?>" onclick="return konfirmasiHapus()" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        // Inisialisasi DataTable
        $(document).ready(function() {
            $('#example').DataTable();
        });

        // Konfirmasi hapus
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