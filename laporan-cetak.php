<?php
include 'connection.php';

$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

if (!$start_date || !$end_date) {
    echo "<script>alert('Silakan pilih tanggal mulai dan tanggal akhir.'); window.location.href = 'laporan.php';</script>";
    exit;
}

if ($end_date < $start_date) {
    echo "<script>alert('Tanggal akhir tidak boleh lebih awal dari tanggal mulai.'); window.location.href = 'laporan.php';</script>";
    exit;
}

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
            margin: 0;
            padding: 20px;
        }

        .header,
        .footer {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1,
        .footer p {
            margin: 0;
        }

        .footer p {
            font-size: 14px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .no-data {
            text-align: center;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Perpustakaan Digital Xenon</h1>
        <div class="footer">
            <p>Jl. Daeng Moh. Ardiwinata, Cibabat, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat 40513</p>
            <p>Telp: (021) 12345678 | Email: perpusdigitalxenon@perpus.go.id</p>
        </div>
        <hr>
        <h2>Laporan Peminjaman Buku</h2>
        <h2>Periode: <?= htmlspecialchars($start_date) ?> s/d <?= htmlspecialchars($end_date) ?></h2>
    </div>

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
                echo "<tr><td colspan='6' class='no-data'>Tidak ada data peminjaman.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        window.print();
    </script>
</body>

</html>