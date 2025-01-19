<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"></script>
</head>

<body>

    <?php 
    include "navbar.php"; 
    ?>

    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Tambah Buku</h2>

        <form action="proses-buku.php" method="post" enctype="multipart/form-data">
            <div class="space-y-6">

                <!-- Judul Buku -->
                <div>
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

                <!-- Gambar -->
                <div>
                    <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input type="file" name="gambar" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" name="submit" class="w-full bg-yellow-500 text-white py-3 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">Simpan</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
