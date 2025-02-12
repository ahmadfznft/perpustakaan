<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Role</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
</head>

<body class="bg-gray-100">

    <?php
    include "navbar.php";

    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM `role` WHERE roleID=$id");

    while ($role_data = mysqli_fetch_array($result)) {
        $nama_role = $role_data['NamaRole'];
        $id_role = $role_data['RoleID'];
    }
    ?>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
        <form method="post" action="proses-role.php">
            <h1 class="text-3xl font-bold text-center mb-6">Edit Role</h1>
            <input type="hidden" name="RoleID" value="<?= $id_role ?>">

            <label for="nama" class="block text-lg font-semibold mb-2">Nama Role</label>
            <input type="text" name="nama" id="nama" class="form-input w-full py-2 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?= $nama_role ?>"><br><br>

            <button type="submit" name="ubah" class="w-full mt-4 py-2 px-4 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg focus:outline-none">Ubah</button>
        </form>
    </div>
    
</body>

</html>
