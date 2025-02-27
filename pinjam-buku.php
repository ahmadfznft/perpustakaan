<?php
include 'navbar.php';

$user_id = $_SESSION['UserID'];

$query = "SELECT peminjaman.*, buku.Judul
          FROM peminjaman 
          JOIN buku ON peminjaman.BukuID = buku.BukuID 
          WHERE peminjaman.UserID = '$user_id' 
          ORDER BY peminjaman.TanggalPeminjaman DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="mt-6">
            <h1 class="text-3xl font-bold text-center mb-6">Pinjam Buku</h1>

            <!-- Tabel Peminjaman -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 border">No</th>
                            <th class="py-2 px-4 border">Judul Buku</th>
                            <th class="py-2 px-4 border">Tanggal Peminjaman</th>
                            <th class="py-2 px-4 border">Tanggal Pengembalian</th>
                            <th class="py-2 px-4 border">Status</th>
                            <th class="py-2 px-4 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border text-center"><?= $no++; ?></td>
                                    <td class="py-2 px-4 border"><?= $row['Judul']; ?></td>
                                    <td class="py-2 px-4 border"><?= $row['TanggalPeminjaman']; ?></td>
                                    <td class="py-2 px-4 border"><?= $row['TanggalPengembalian']; ?></td>
                                    <td class="py-2 px-4 border"><?= $row['StatusPeminjaman']; ?></td>

                                    <td class="py-2 px-4 border text-center">
                                        <?php if ($_SESSION['RoleID'] == 3 || $_SESSION['RoleID'] == 1) : ?>
                                            <?php if (trim($row['StatusPeminjaman']) != 'Buku Dikembalikan') : ?>
                                                <a href="proses-pinjam.php?hapus=<?= $row['PeminjamanID'] ?>"
                                                    onclick="return confirm('Yakin Untuk Membatalkan Peminjaman ?')"
                                                    class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                    Hapus
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6' class='py-2 px-4 border text-center'>Anda belum meminjam buku apapun.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>