<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"></script>
    <style>
        /* Optional: Additional custom styles for select */
        .wide-select {
            width: 100%;
            padding: 10px 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            background-color: #fff;
        }

        .wide-select:hover,
        .wide-select:focus {
            border-color: #666;
            outline: none;
            margin-top: -5px;
        }
    </style>
</head>

<body>

    <?php 
    include "navbar.php"; 

    // Ambil id dari URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM user WHERE UserID = $id";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);
    }

    // Ambil data role untuk dropdown
    $sql_role = "SELECT * FROM role";
    $stmt = mysqli_query($conn, $sql_role);
    ?>

    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Edit User</h2>

        <form action="proses-user.php" method="post">
            <div class="space-y-4">

                <!-- Nama User -->
                <div>
                    <label for="namalengkap" class="block text-sm font-medium text-gray-700">Nama User</label>
                    <input type="text" name="namalengkap" value="<?= $user['Namalengkap'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan Nama user" required>
                </div>

                <!-- Username -->
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" value="<?= $user['Username'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan Username" required>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" value="<?= $user['Password'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan Password" required>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="<?= $user['Email'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan Email" required>
                </div>

                <!-- Alamat -->
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" name="alamat" value="<?= $user['Alamat'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" placeholder="Masukkan Alamat" required>
                </div>

                <!-- Role -->
                <div>
                    <label for="roleID" class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="roleID" class="wide-select px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500">
                        <option value="">--Pilih--</option>
                        <?php while ($role = mysqli_fetch_assoc($stmt)) : ?>
                            <option value="<?= $role['RoleID'] ?>" <?= ($role['RoleID'] == $user['RoleID']) ? 'selected' : '' ?>><?= $role['NamaRole'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <!-- Hidden input to pass the UserID for update -->
                <input type="hidden" name="id" value="<?= $user['UserID'] ?>">

                <!-- Submit Button -->
                <div>
                    <button type="submit" name="update" class="w-full bg-yellow-500 text-white py-3 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">Update</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
