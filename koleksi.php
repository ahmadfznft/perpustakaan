<?php
include 'navbar.php';
$iduser = $_SESSION['UserID'];

$query = "SELECT k.KoleksiID, b.Judul, b.Penulis, b.Penerbit, b.TahunTerbit, b.Gambar, b.BukuID 
          FROM koleksipribadi k 
          INNER JOIN buku b ON k.BukuID = b.BukuID 
          WHERE k.UserID = $iduser";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Buku Pribadi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .card-text {
            color: #555;
        }

        .btn-borrow {
            background-color: green;
            color: white;
        }

        .btn-borrow:hover {
            background-color: darkgreen;
        }

        .card img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="container mx-auto py-6">
        <center>
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Koleksi Pribadi</h1>
        </center>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php while ($book = mysqli_fetch_assoc($result)) { ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">

                    <img src="<?= htmlspecialchars($book['Gambar']) ?>" class="w-full h-auto object-cover" alt="Cover Buku">
                    <div class="p-4">
                        <h5 class="text-xl font-semibold"><?= htmlspecialchars($book['Judul']) ?></h5>
                        <p class="text-gray-700"><strong>Penulis:</strong> <?= htmlspecialchars($book['Penulis']) ?></p>
                        <p class="text-gray-700"><strong>Penerbit:</strong> <?= htmlspecialchars($book['Penerbit']) ?></p>
                        <p class="text-gray-700"><strong>Tahun Terbit:</strong> <?= htmlspecialchars($book['TahunTerbit']) ?></p>

                        <a href="tambah-peminjaman.php?id=<?= $book['BukuID'] ?>" class="block w-full text-center py-2 mt-4 bg-green-500 text-white rounded-lg hover:bg-green-600">Pinjam Buku</a>
                        <a href="proses-koleksi.php?id=<?= $book['KoleksiID']; ?>" class="block w-full text-center py-2 mt-2 bg-red-500 text-white rounded-lg hover:bg-red-600" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini dari koleksi Anda?')">Hapus dari Koleksi</a>
                        <a href="detail-buku.php?id=<?= $book['BukuID']; ?>" class="block w-full text-center py-2 mt-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Detail Buku</a>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>