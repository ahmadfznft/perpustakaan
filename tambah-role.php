<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Role</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <?php
    include "navbar.php";
    ?>
    <div class="container mx-auto p-4">
        <form method="post" action="proses-role.php" class="bg-white p-6 rounded shadow-md">
            <h1 class="text-2xl font-bold mb-4">Tambah Role</h1>
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama Role</label>
            <input type="text" name="nama" id="nama" class="form-control w-full p-2 border border-gray-300 rounded mb-4" placeholder="Masukan Nama Role" required>
            <button type="submit" name="simpan" class="btn btn-warning bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Simpan</button>
        </form>
    </div>

</body>

</html>