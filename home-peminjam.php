<?php
include 'navbar.php';

$query = "SELECT * FROM buku";
$result = mysqli_query($conn, $query);

$qrating = "SELECT b.*, 
          COALESCE(AVG(u.Rating), 0) as RataRata, 
          COUNT(u.UlasanID) as JumlahRating 
          FROM buku b 
          LEFT JOIN ulasanbuku u ON b.BukuID = u.BukuID 
          GROUP BY b.BukuID";
$result = mysqli_query($conn, $qrating);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>perpustakaan xenon</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="h-64">
                        <img src="<?php echo $row['Gambar']; ?>" class="w-full h-full object-contain">
                    </div>
                    <div class="p-4">
                        <h5 class="text-xl font-bold mb-2"><?php echo $row['Judul']; ?></h5>
                        <p class="text-gray-600 mb-1">Penulis: <?php echo $row['Penulis']; ?></p>

                        <?php $rating = round($row['RataRata']); ?>
                        <p class="text-gray-600 mb-3">Rating: <?php echo $rating; ?> (<?php echo $row['JumlahRating']; ?> ulasan)</p>

                        <a href="tambah-peminjaman.php?id=<?php echo $row['BukuID']; ?>"
                            class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">
                            Pinjam Buku
                        </a>
                        <a href="detail-buku.php?id=<?php echo $row['BukuID']; ?>"
                            class="inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors">
                            Detail
                        </a>

                        <form action="favorit.php" method="POST" class="inline">
                            <input type="hidden" name="id_produk" value="<?php echo $row['BukuID']; ?>">
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>