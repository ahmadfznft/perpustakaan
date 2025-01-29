<?php
include 'connection.php';

$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

$query = "SELECT * 
          FROM peminjaman 
          LEFT JOIN user ON user.UserID = peminjaman.UserID 
          LEFT JOIN buku ON buku.BukuID = peminjaman.BukuID";

if ($start_date && $end_date) {
    $query .= " WHERE TanggalPeminjaman BETWEEN '$start_date' AND '$end_date'";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Cetak Laporan Peminjaman Buku</h1>
    <h2>Periode: <?= htmlspecialchars($start_date) ?> s/d <?= htmlspecialchars($end_date) ?></h2>

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
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['Username'] ?: 'Data Tidak Tersedia'); ?></td>
                        <td><?= htmlspecialchars($row['Judul'] ?: 'Data Tidak Tersedia'); ?></td>
                        <td><?= htmlspecialchars($row['TanggalPeminjaman']); ?></td>
                        <td><?= htmlspecialchars($row['TanggalPengembalian']); ?></td>
                        <td><?= htmlspecialchars($row['StatusPeminjaman']); ?></td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data peminjaman.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>