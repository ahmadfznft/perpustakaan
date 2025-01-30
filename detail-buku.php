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

<style>
    .comments-section {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .input-comment {
        background-color: #F0F2F5;
    }

    .comment-actions button {
        color: #65676B;
    }

    .comment-actions button:hover {
        color: #1C1E21;
    }
</style>

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
                    <p class="text-gray-700 text-sm"><span class="font-medium">Kategori:</span>
                        <?php
                        $kategori_list = [];
                        while ($kategori = mysqli_fetch_assoc($result_kategori)) {
                            $kategori_list[] = "<span class='text-sm text-dark'>" . $kategori['NamaKategori'] . "</span>";
                        }
                        echo implode(", ", $kategori_list);
                        ?>
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


                    <!-- Komentar -->
                    <div class="comments-section bg-gray-100 p-4">
                        <div class="space-y-4">
                            <?php while ($komentar = mysqli_fetch_assoc($result_komentar)) : ?>
                                <div class="flex gap-3">
                                    <!-- Avatar -->
                                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="text-sm font-medium">
                                            <?php echo substr($komentar['Username'], 0, 1); ?>
                                        </span>
                                    </div>

                                    <!-- Komentar content -->
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2">
                                            <span class="font-semibold"><?php echo $komentar['Username']; ?></span>
                                            <span><?php echo $komentar['Ulasan']; ?></span>
                                        </div>


                                        <!-- Aksi komentar -->
                                        <div class="flex items-center gap-4 mt-1 text-sm text-gray-500">
                                            <span><?php echo date('d M Y', strtotime($komentar['tanggalUlasan'])); ?></span>
                                            <!-- <button class="hover:underline" onclick="toggleReplyForm(<?php echo $komentar['UlasanID']; ?>)">Balas</button> -->
                                        </div>
                                        <!-- Form balasan -->
                                        <!-- <form id="reply-form-<?php echo $komentar['UlasanID']; ?>" class="hidden mt-2" action="proses-ulasan.php" method="POST">
                                            <input type="hidden" name="buku_id" value="<?php echo $id_buku; ?>">
                                            <input type="hidden" name="parent_id" value="<?php echo $komentar['UlasanID']; ?>">
                                            <div class="bg-gray-200 rounded-full p-3 flex items-center">
                                                <input type="text" name="reply_komentar" placeholder="Balas komentar" class="flex-1 bg-transparent outline-none px-2" required>
                                                <button type="submit" class="text-blue-500 font-semibold">Kirim</button>
                                            </div>
                                        </form> -->
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>

                    <form action="proses-ulasan.php" method="POST" class="mt-4">
                        <input type="hidden" name="buku_id" value="<?php echo $id_buku; ?>">
                        <div class="bg-gray-200 rounded-full p-3 flex items-center">
                            <input type="text" name="komentar" placeholder="Tambahkan komentar" class="flex-1 bg-transparent outline-none px-2" required>
                            <button type="submit" class="text-blue-500 font-semibold">Kirim</button>
                        </div>
                    </form>
                </div>
                <!-- End -->


                <div class="actions flex gap-3 mt-4">
                    <a href="home-peminjam.php"
                        class="px-4 py-1.5 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition-colors">
                        Kembali
                    </a>
                    <a href="proses-koleksi.php"
                        class="px-4 py-1.5 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition-colors">
                        Tambah-Favorit
                    </a>
                    <a href="tambah-peminjaman.php?id=<?php echo $buku['BukuID']; ?>"
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

    <!-- 
    <script>
        function toggleReplyForm(id) {
            const form = document.getElementById('reply-form-' + id);
            form.classList.toggle('hidden');
        }

        function toggleDropdown(event) {
            const dropdown = event.target.nextElementSibling;
            dropdown.classList.toggle('hidden');
        }
    </script> -->

</body>

</html>