<?php
include 'navbar.php';

// Ambil ID buku dari parameter URL
$id_buku = $_GET['id'];

// Query untuk mengambil detail buku
$query = "SELECT * FROM buku WHERE BukuID = $id_buku";
$result = mysqli_query($conn, $query);
$buku = mysqli_fetch_assoc($result);

$qulasan = "SELECT ulasanbuku.*, user.Username 
                   FROM ulasanbuku 
                   JOIN user ON ulasanbuku.UserID = user.UserID 
                   WHERE ulasanbuku.BukuID = $id_buku";
$result_komentar = mysqli_query($conn, $qulasan);

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
                    <p class="text-gray-700 text-sm">
                        <span class="font-medium">Deskripsi :</span>
                        <span id="short-description"><?php echo mb_strimwidth($buku['Deskripsi'], 0, 150, "..."); ?></span>
                        <span id="full-description" class="hidden"><?php echo $buku['Deskripsi']; ?></span>
                        <a href="javascript:void(0)" id="toggle-description" class="text-blue-500">Baca Selengkapnya</a>
                    </p>
                    <p class="text-gray-700 text-sm mt-5">
                        <span class="font-medium">Stok:</span>
                        <?php
                        if ($buku['Stok'] > 0) {
                            echo "<span class='text-emerald-600'>" . $buku['Stok'] . "</span>";
                        } else {
                            echo "<span class='text-red-500'>Stok Habis</span>";
                        }
                        ?>
                    </p>


                    <div class="border-b py-2">
                        <?php while ($komentar = mysqli_fetch_assoc($result_komentar)) : ?>
                            <p class="font-semibold"><?php echo $komentar['Username']; ?></p>
                            <p><?php echo $komentar['Ulasan']; ?></p>

                            <!-- Form untuk balasan -->
                            <form action="proses-balasan.php" method="POST" class="mt-2">
                                <input type="hidden" name="komentar_id" value="<?php echo $komentar['UlasanID']; ?>">
                                <textarea name="balasan" rows="2" class="w-full border rounded-lg p-2" placeholder="Balas komentar..."></textarea>
                                <button type="submit" class="mt-1 px-4 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">Balas</button>
                            </form

                            <!-- Tampilkan balasan jika ada -->
                            <div class="ml-4">
                                <?php
                                // Query untuk mengambil balasan berdasarkan komentar
                                $query_balasan = "SELECT * FROM balasan WHERE KomentarID = " . $komentar['UlasanID'];
                                $result_balasan = mysqli_query($conn, $query_balasan);
                                while ($balasan = mysqli_fetch_assoc($result_balasan)) : ?>
                                    <p class="font-semibold"><?php echo $balasan['Username']; ?></p>
                                    <p><?php echo $balasan['Balasan']; ?></p>
                                <?php endwhile; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>



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

    <script>
        document.getElementById('toggle-description').addEventListener('click', function() {
            var fullDescription = document.getElementById('full-description');
            var shortDescription = document.getElementById('short-description');
            var toggleText = document.getElementById('toggle-description');

            if (fullDescription.classList.contains('hidden')) {
                fullDescription.classList.remove('hidden');
                shortDescription.classList.add('hidden');
                toggleText.textContent = 'Baca Lebih Sedikit';
            } else {
                fullDescription.classList.add('hidden');
                shortDescription.classList.remove('hidden');
                toggleText.textContent = 'Baca Selengkapnya';
            }
        });
    </script>

</body>

</html>