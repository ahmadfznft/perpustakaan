<?php 
    include "navbar.php"; 
    include "assets/link.php"; 

    // Ambil ID Buku dari URL
    if (isset($_GET['id'])) {
        $BukuID = $_GET['id'];

        // Query untuk mengambil data buku berdasarkan ID
        $query = "SELECT * FROM buku WHERE BukuID = '$BukuID'";
        $result = mysqli_query($conn, $query);

        // Ambil data buku
        $row = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"></script>
</head>

<body>

    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Edit Buku</h2>

        <form action="proses-buku.php" method="post" enctype="multipart/form-data">
            <div class="space-y-6">

            <input type="hidden" name="id" value="<?= $row['BukuID']; ?>">

                <!-- Judul Buku -->
                <div>
                    <label for="namalengkap" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                    <input type="text" name="judul" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" value="<?= $row['Judul']; ?>" required>
                </div>

                <!-- Penulis -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Penulis</label>
                    <input type="text" name="penulis" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" value="<?= $row['Penulis']; ?>" required>
                </div>

                <!-- Penerbit -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Penerbit</label>
                    <input type="text" name="penerbit" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" value="<?= $row['Penerbit']; ?>" required>
                </div>

                <!-- Tahun Terbit -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
                    <input type="text" name="tahunterbit" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" value="<?= $row['TahunTerbit']; ?>" required>
                </div>

                <!-- Gambar -->
                <div>
                    <label for="gsmbsr" class="block text-sm font-medium text-gray-700">Gambar</label>
                    <div class="flex items-center space-x-4">
                        <img src="<?= $row['Gambar']; ?>" alt="Gambar" class="w-24 h-24 object-cover">
                        <input type="file" name="gambar" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                    </div>
                    <small class="text-red-500">*Kosongkan jika tidak ingin mengubah gambar</small>
                </div>

                <!-- Submit Button -->
                <div>
                    <input type="hidden" name="BukuID" value="<?= $row['BukuID']; ?>">
                    <button type="submit" name="edit" class="w-full bg-yellow-500 text-white py-3 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
