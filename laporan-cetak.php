<?php
include 'connection.php';

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
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 100%;
            margin: 0 auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Laporan Peminjaman Buku</h1>
        <button onclick="window.print();" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                        Cetak Laporan
                    </button>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Peminjaman</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $row['Nama'] ?: 'Data Tidak Tersedia'; ?></td>
                            <td><?= $row['Judul'] ?: 'Data Tidak Tersedia'; ?></td>
                            <td><?= $row['TanggalPeminjaman']; ?></td>
                            <td><?= $row['TanggalPengembalian']; ?></td>
                            <td><?= $row['StatusPeminjaman']; ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Tidak ada data peminjaman.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
