<?php
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <?php
include "assets/link.php";
$sql = "SELECT u.UserID, r.NamaRole AS Role, u.Username, u.Namalengkap, u.Alamat
FROM user u
JOIN role r ON u.RoleID = r.RoleID;";
$kategori = mysqli_query($conn, $sql);
?>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold text-center mb-6">Data Kategori</h1>

        <div class="flex justify-end mb-4">
            <a href="tambah-user.php" class="bg-yellow-400 text-white px-4 py-2 rounded-lg shadow-md hover:bg-yellow-500">
                <i class="bi bi-person-plus"></i> Tambah Data User
            </a>
        </div>

        <div class="overflow-x-auto">
            <table id="example" class="min-w-full table-auto border-collapse">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">ID User</th>
                        <th class="border px-4 py-2">Role</th>
                        <th class="border px-4 py-2">Username</th>
                        <th class="border px-4 py-2">Nama Lengkap</th>
                        <th class="border px-4 py-2">Alamat</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
while ($row = mysqli_fetch_assoc($kategori)) {
    ?>
                        <tr>
                            <td class="border px-4 py-2"><?=$row['UserID'];?></td>
                            <td class="border px-4 py-2"><?=$row['Role'];?></td>
                            <td class="border px-4 py-2"><?=$row['Username'];?></td>
                            <td class="border px-4 py-2"><?=$row['Namalengkap'];?></td>
                            <td class="border px-4 py-2"><?=$row['Alamat'];?></td>
                            <td class="border px-4 py-2">
                                <a href="edit-user.php?id=<?=$row['UserID']?>" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <a href="proses-user.php?id=<?=$row['UserID']?>" onclick="return konfirmasiHapus()" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php
}?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        // Inisialisasi DataTable dengan opsi pagination dan search
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": true,          // Mengaktifkan pagination
                "searching": true,       // Mengaktifkan pencarian
                "lengthChange": true,    // Mengaktifkan dropdown entries
                "pageLength": 5,         // Jumlah entri per halaman
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ entri per halaman",
                    "search": "Cari:",
                    "zeroRecords": "Tidak ada data yang cocok",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data",
                    "infoFiltered": "(disaring dari _MAX_ total entri)"
                }
            });
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
