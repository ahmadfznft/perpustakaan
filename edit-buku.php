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

    // Ambil semua kategori
    $query_kategori = "SELECT * FROM kategori_buku";
    $result_kategori = mysqli_query($conn, $query_kategori);

    // Ambil kategori yang sudah dipilih untuk buku
    $query_selected_kategori = "SELECT KategoriID FROM kategoribuku_relasi WHERE BukuID = '$BukuID'";
    $result_selected_kategori = mysqli_query($conn, $query_selected_kategori);
    $selected_kategori = [];
    while ($row_selected_kategori = mysqli_fetch_assoc($result_selected_kategori)) {
        $selected_kategori[] = $row_selected_kategori['KategoriID'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Edit Buku</h2>

        <form action="proses-buku.php" method="post" enctype="multipart/form-data">
            <div class="space-y-6">

                <input type="hidden" name="id" value="<?= $row['BukuID']; ?>">

                <!-- Judul Buku -->
                <div class="flex justify-between space-x-4">
                    <div class="w-1/2">
                        <label for="namalengkap" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                        <input type="text" name="judul" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" value="<?= $row['Judul']; ?>" required>
                    </div>
                    <!-- Penulis -->
                    <div class="w-1/2">
                        <label for="username" class="block text-sm font-medium text-gray-700">Penulis</label>
                        <input type="text" name="penulis" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" value="<?= $row['Penulis']; ?>" required>
                    </div>
                </div>

                <!-- Penerbit -->
                <div class="flex justify-between space-x-4">
                    <div class="w-1/2">
                        <label for="password" class="block text-sm font-medium text-gray-700">Penerbit</label>
                        <input type="text" name="penerbit" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" value="<?= $row['Penerbit']; ?>" required>
                    </div>

                    <!-- Tahun Terbit -->
                    <div class="w-1/2">
                        <label for="email" class="block text-sm font-medium text-gray-700">Tahun Terbit</label>
                        <input type="text" name="tahunterbit" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" value="<?= $row['TahunTerbit']; ?>" required>
                    </div>
                </div>

                <!-- Stok -->
                <div>
                    <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                    <input type="number" name="stok" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" value="<?= $row['Stok']; ?>" required>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required><?= $row['Deskripsi']; ?></textarea>
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

                <!-- Kategori -->
                <div>
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <div class="flex flex-wrap">
                        <?php while ($kategori = mysqli_fetch_assoc($result_kategori)) { ?>
                            <div class="mr-4 mb-2">
                                <input type="checkbox" name="kategori[]" value="<?php echo $kategori['KategoriID']; ?>" class="mr-2" <?php echo in_array($kategori['KategoriID'], $selected_kategori) ? 'checked' : ''; ?>>
                                <label for="kategori"><?php echo $kategori['NamaKategori']; ?></label>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" name="edit" class="w-full bg-yellow-500 text-white py-3 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>