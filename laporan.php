<?php
include 'navbar.php';

$start_date = '';
$end_date = '';

if (isset($_POST['submit'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $query = "SELECT * 
              FROM peminjaman 
              LEFT JOIN user ON user.UserID = peminjaman.UserID 
              LEFT JOIN buku ON buku.BukuID = peminjaman.BukuID
              WHERE TanggalPeminjaman BETWEEN '$start_date' AND '$end_date'";
} else {
    $query = "SELECT * 
              FROM peminjaman 
              LEFT JOIN user ON user.UserID = peminjaman.UserID 
              LEFT JOIN buku ON buku.BukuID = peminjaman.BukuID";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="mt-6">
            <div class="flex justify-between items-center mb-6">
 
                <h1 class="text-3xl font-bold">Laporan Peminjaman Buku</h1>

                <div class="flex space-x-4">
                    <form method="POST" action="" class="flex space-x-4">
                        <div>
                            <label for="start_date" class="block text-gray-700">Tanggal Mulai:</label>
                            <input type="date" name="start_date" id="start_date" value="<?= $start_date ?>" class="px-4 py-2 border rounded-lg">
                        </div>
                        <div>
                            <label for="end_date" class="block text-gray-700">Tanggal Akhir:</label>
                            <input type="date" name="end_date" id="end_date" value="<?= $end_date ?>" class="px-4 py-2 border rounded-lg">
                        </div>
                        <div>
                            <button type="submit" name="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Tampilkan Laporan</button>
                        </div>
                    </form>

                    <a href="laporan-cetak.php?start_date=<?= $start_date ?>&end_date=<?= $end_date ?>" target="_blank" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                        Cetak Laporan
                    </a>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 border">No</th>
                            <th class="py-2 px-4 border">Nama Peminjam</th>
                            <th class="py-2 px-4 border">Judul Buku</th>
                            <th class="py-2 px-4 border">Tanggal Peminjaman</th>
                            <th class="py-2 px-4 border">Tanggal Pengembalian</th>
                            <th class="py-2 px-4 border">Status Peminjaman</th>
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
                                    <td class="py-2 px-4 border"><?= $row['Nama'] ?: 'Data Tidak Tersedia'; ?></td>
                                    <td class="py-2 px-4 border"><?= $row['Judul'] ?: 'Data Tidak Tersedia'; ?></td>
                                    <td class="py-2 px-4 border"><?= $row['TanggalPeminjaman']; ?></td>
                                    <td class="py-2 px-4 border"><?= $row['TanggalPengembalian']; ?></td>
                                    <td class="py-2 px-4 border"><?= $row['StatusPeminjaman']; ?></td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "<tr><td colspan='6' class='py-2 px-4 border text-center'>Tidak ada data peminjaman.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
