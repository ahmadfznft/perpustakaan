<?php
include 'navbar.php';

// Ambil ID buku dari parameter URL
$id_buku = $_GET['id'];

// Query untuk mengambil detail buku
$query = "SELECT * FROM buku WHERE BukuID = $id_buku";
$result = mysqli_query($conn, $query);
$buku = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto max-w-5xl px-4 py-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Detail Buku</h1>

        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="grid md:grid-cols-2 gap-6 items-center">
                <div class="flex justify-center">
                    <img src="<?php echo $buku['Gambar']; ?>"
                        alt="<?php echo $buku['Judul']; ?>"
                        class="w-[200px] h-[300px] rounded-lg object-cover">
                </div>

                <div class="space-y-3 self-start">
                    <h2 class="text-xl font-semibold text-gray-800"><?php echo $buku['Judul']; ?></h2>
                    <p class="text-gray-700 text-sm"><span class="font-medium">Penulis:</span> <?php echo $buku['Penulis']; ?></p>
                    <p class="text-gray-700 text-sm"><span class="font-medium">Penerbit:</span> <?php echo $buku['Penerbit']; ?></p>
                    <p class="text-gray-700 text-sm"><span class="font-medium">Tahun Terbit:</span> <?php echo $buku['TahunTerbit']; ?></p>
                    <!-- <p class="text-gray-700 text-sm"><span class="font-medium">Kategori :</span> <?php echo $buku['TahunTerbit']; ?></p> -->

                    <div class="actions flex gap-3 mt-4">
                        <a href="home-peminjam.php"
                            class="px-4 py-1.5 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition-colors">
                            Kembali
                        </a>
                        <a href="pinjam-buku.php?id=<?php echo $buku['BukuID']; ?>"
                            class="px-4 py-1.5 bg-blue-500 text-white text-sm rounded-lg hover:bg-blue-600 transition-colors">
                            Pinjam Buku
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>