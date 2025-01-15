<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Role</title>
    <?php include "assets/link.php"; ?>
</head>

<body class="bg-gray-100">
    <?php
    include "navbar.php";

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM `kategori_buku` WHERE KategoriID=$id");

    while ($kategori_data = mysqli_fetch_array($result)) {
        $nama_kategori = $kategori_data['NamaKategori'];
        $id_kategori = $kategori_data['KategoriID'];
    }
    ?>

    <div class="container mx-auto p-4">
        <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-lg mt-10">
            <form method="post" action="proses-kategori.php">
                <h1 class="text-3xl font-semibold text-center mb-6">Edit Kategori</h1>

                <!-- Hidden Input for id_role -->
                <input type="hidden" name="KategoriID" value="<?= $id_kategori ?>">

                <label for="nama" class="block text-sm font-medium text-gray-700">Nama kategori</label>
                <input type="text" id="nama" name="nama" class="form-input mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" value="<?= $nama_kategori ?>" required>

                <!-- Button Ubah -->
                <button type="submit" name="ubah" class="mt-6 w-full py-2 px-4 bg-yellow-500 text-white font-semibold rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    Ubah
                </button>
            </form>
        </div>
    </div>
</body>

</html>
