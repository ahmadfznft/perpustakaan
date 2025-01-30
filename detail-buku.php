<?php
include 'navbar.php';

$id_buku = $_GET['id'];

$query = "SELECT * FROM buku WHERE BukuID = $id_buku";
$result = mysqli_query($conn, $query);
$buku = mysqli_fetch_assoc($result);

$query_kategori = "SELECT kategori_buku.NamaKategori 
                   FROM kategoribuku_relasi 
                   JOIN kategori_buku ON kategoribuku_relasi.KategoriID = kategori_buku.KategoriID 
                   WHERE kategoribuku_relasi.BukuID = $id_buku";
$result_kategori = mysqli_query($conn, $query_kategori);

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
                    <img src="<?= htmlspecialchars($buku['Gambar']) ?>" alt="<?= htmlspecialchars($buku['Judul']) ?>" class="w-[200px] h-[300px] rounded-lg object-cover">
                </div>

                <div class="space-y-3 self-start">
                    <h2 class="text-xl font-semibold text-gray-800"><?= htmlspecialchars($buku['Judul']) ?></h2>
                    <p class="text-gray-700 text-sm"><span class="font-medium">Penulis:</span> <?= htmlspecialchars($buku['Penulis']) ?></p>
                    <p class="text-gray-700 text-sm"><span class="font-medium">Penerbit:</span> <?= htmlspecialchars($buku['Penerbit']) ?></p>
                    <p class="text-gray-700 text-sm"><span class="font-medium">Tahun Terbit:</span> <?= htmlspecialchars($buku['TahunTerbit']) ?></p>
                    <p class="text-gray-700 text-sm">
                        <span class="font-medium">Deskripsi :</span>
                        <span id="short-description"><?= htmlspecialchars(mb_strimwidth($buku['Deskripsi'], 0, 150, "...")) ?></span>
                        <span id="full-description" class="hidden"><?= htmlspecialchars($buku['Deskripsi']) ?></span>
                        <a href="javascript:void(0)" id="toggle-description" class="text-blue-500">Baca Selengkapnya</a>
                    </p>
                    <p class="text-gray-700 text-sm"><span class="font-medium">Kategori:</span>
                        <?php
                        $kategori_list = [];
                        while ($kategori = $result_kategori->fetch_assoc()) {
                            $kategori_list[] = "<span class='text-sm text-dark'>" . htmlspecialchars($kategori['NamaKategori']) . "</span>";
                        }
                        echo implode(", ", $kategori_list);
                        ?>
                    </p>
                    <p class="text-gray-700 text-sm mt-5">
                        <span class="font-medium">Stok:</span>
                        <?= $buku['Stok'] > 0 ? "<span class='text-emerald-600'>{$buku['Stok']}</span>" : "<span class='text-red-500'>Stok Habis</span>" ?>
                    </p>

                    <!-- Komentar -->
                    <div class="comments-section bg-gray-100 p-4">
                        <div class="space-y-4">
                            <?php while ($komentar = $result_komentar->fetch_assoc()) : ?>
                                <div class="flex gap-3">
                                    <!-- Avatar -->
                                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="text-sm font-medium"><?= htmlspecialchars(substr($komentar['Username'], 0, 1)) ?></span>
                                    </div>

                                    <!-- Komentar content -->
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2">
                                            <span class="font-semibold"><?= htmlspecialchars($komentar['Username']) ?></span>
                                            <span><?= htmlspecialchars($komentar['Ulasan']) ?></span>
                                            <span class="ml-2 text-yellow-500"><?= str_repeat("★", $komentar['rating']) ?></span>
                                        </div>

                                        <!-- Aksi komentar -->
                                        <div class="flex items-center gap-4 mt-1 text-sm text-gray-500">
                                            <span><?= date('d M Y', strtotime($komentar['tanggalUlasan'])) ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>

                    <!-- Formulir Komentar -->
                    <?php
                    $userid = $_SESSION['UserID'];
                    $query_check_rating = "SELECT * FROM ulasanbuku WHERE UserID = ? AND BukuID = ?";
                    $stmt = $conn->prepare($query_check_rating);
                    $stmt->bind_param("ii", $userid, $id_buku);
                    $stmt->execute();
                    $result_check_rating = $stmt->get_result();

                    if ($result_check_rating->num_rows === 0) :
                    ?>
                        <form action="proses-ulasan.php" method="POST" class="mt-4">
                            <input type="hidden" name="buku_id" value="<?= $id_buku ?>">
                            <div class="bg-gray-200 rounded-full p-3 flex items-center">
                                <input type="text" name="komentar" placeholder="Tambahkan komentar" class="flex-1 bg-transparent outline-none px-2" required>
                                <select name="rating" class="bg-transparent outline-none px-2" required>
                                    <option value="">Rating</option>
                                    <option value="1">1 ★</option>
                                    <option value="2">2 ★★</option>
                                    <option value="3">3 ★★★</option>
                                    <option value="4">4 ★★★★</option>
                                    <option value="5">5 ★★★★★</option>
                                </select>
                                <button type="submit" class="text-blue-500 font-semibold">Kirim</button>
                            </div>
                        </form>
                    <?php else : ?>
                        <p class="text-gray-700">Anda sudah memberikan rating untuk buku ini.</p>
                    <?php endif; ?>
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