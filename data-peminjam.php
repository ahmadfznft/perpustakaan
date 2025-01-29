<?php
include "navbar.php";

$query = "SELECT * 
          FROM peminjaman 
          LEFT JOIN user ON user.UserID = peminjaman.UserID 
          LEFT JOIN buku ON buku.BukuID = peminjaman.BukuID";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjam</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="mt-6">
            <h1 class="text-3xl font-bold mb-4">Data Peminjam Buku</h1>
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">No</th>
                        <th class="py-2 px-4 border">Nama Peminjam</th>
                        <th class="py-2 px-4 border">Judul Buku</th>
                        <th class="py-2 px-4 border">Tanggal Peminjaman</th>
                        <th class="py-2 px-4 border">Tanggal Pengembalian</th>
                        <th class="py-2 px-4 border">Status Peminjaman</th>
                        <th class="py-2 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border text-center"><?= $no++; ?></td>
                            <td class="py-2 px-4 border"><?= $row['Username'] ?: 'Data Tidak Tersedia'; ?></td>
                            <td class="py-2 px-4 border"><?= $row['Judul'] ?: 'Data Tidak Tersedia'; ?></td>
                            <td class="py-2 px-4 border"><?= $row['TanggalPeminjaman']; ?></td>
                            <td class="py-2 px-4 border"><?= $row['TanggalPengembalian']; ?></td>
                            <td class="py-2 px-4 border"><?= $row['StatusPeminjaman']; ?></td>
                            <td class="py-2 px-4 border">
                                <?php if ($row['StatusPeminjaman'] != 'Sudah Dikembalikan') { ?>
                                    <a href="proses-peminjaman.php?ubah=<?= $row['PeminjamanID']; ?>" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Ubah Status</a>
                                <?php } else { ?>
                                    <span class="text-green-500">Sudah Dikembalikan</span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
