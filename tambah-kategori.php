<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Kategori</title>
    <?php include "assets/link.php"; ?>
</head>

<body class="bg-gray-100">
    <?php include "navbar.php"; ?>

    <div class="container mx-auto p-4">
        <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-10">
            <form method="post" action="proses-kategori.php">
                <h1 class="text-3xl font-semibold text-center mb-6">Tambah Kategori</h1>
                
                <!-- Nama Role -->
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
                <input type="text" id="nama" name="nama" class="form-input mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Masukkan Nama Kategori" required>
                
                <!-- Button Simpan -->
                <button type="submit" name="simpan" class="mt-6 w-full py-2 px-4 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</body>

</html>
