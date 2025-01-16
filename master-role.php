<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Mobil</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <?php
    include "navbar.php";
    include "assets/link.php";
    $sql = "SELECT * FROM `role` ORDER BY RoleID ASC";
    $role = mysqli_query($conn, $sql);
    ?>

    <div class="container mx-auto px-4">
        <div class="mt-6">
            <h1 class="text-3xl font-bold text-center mb-6">Data Role</h1>
            <div class="text-right mb-4">
                <a href="tambah-role.php" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Tambah Data Role</a>
            </div>
            <div class="overflow-x-auto">
                <table id="example" class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 border">ID Role</th>
                            <th class="py-2 px-4 border">Nama Role</th>
                            <th class="py-2 px-4 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($role as $row) { ?>
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border text-center"><?= $row['RoleID']; ?></td>
                                <td class="py-2 px-4 border text-center"><?= $row['NamaRole']; ?></td>
                                <td class="py-2 px-4 border text-center">
                                    <a href="edit-role.php?id=<?= $row['RoleID'] ?>" class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">Edit</a>
                                    <a href="proses-role.php?id=<?= $row['RoleID'] ?>" onclick="return konfirmasiHapus()" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function konfirmasiHapus() {
            return confirm("Apakah Anda yakin ingin menghapus ini?");
        }
    </script>
</body>

</html>
