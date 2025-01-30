<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

    <?php
    include "navbar.php";

    // Ambil kategori dari database
    $query_kategori = "SELECT * FROM kategori_buku";
    $result_kategori = mysqli_query($conn, $query_kategori);
    ?>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Tambah Buku</h2>

        <form action="proses-buku.php" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Judul Buku -->
                <div class="col-span-1 md:col-span-2">
                    <label for="judulbuku" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                    <input type="text" name="judul" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan Judul Buku" required>
                </div>

                <!-- Penulis -->
                <div>
                    <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                    <input type="text" name="penulis" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan Penulis" required>
                </div>

                <!-- Penerbit -->
                <div>
                    <label for="penerbit" class="block text-sm font-medium text-gray-700">Penerbit</label>
                    <input type="text" name="penerbit" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan Penerbit" required>
                </div>

                <!-- Tahun Terbit -->
                <div>
                    <label for="tahunterbit" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
                    <input type="number" name="tahunterbit" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan Tahun Terbit" required>
                </div>

                <!-- Stok -->
                <div>
                    <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                    <input type="number" name="stok" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                </div>

                <!-- Deskripsi -->
                <div class="col-span-1 md:col-span-2">
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required></textarea>
                </div>

                <!-- Gambar -->
                <div>
                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input type="file" name="gambar" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                </div>

                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <div class="flex flex-wrap">
                        <?php while ($kategori = mysqli_fetch_assoc($result_kategori)) { ?>
                            <div class="mr-4 mb-2">
                                <input type="checkbox" name="kategori[]" value="<?php echo $kategori['KategoriID']; ?>" class="mr-2">
                                <label for="kategori"><?php echo $kategori['NamaKategori']; ?></label>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-span-1 md:col-span-2">
                    <button type="submit" name="submit" class="w-full bg-yellow-500 text-white py-3 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">Simpan</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>