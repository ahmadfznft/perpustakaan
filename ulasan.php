<?php
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="mt-6">
            <h1 class="text-3xl font-bold text-center mb-6">Daftar Ulasan</h1>

            <?php if ($_SESSION['RoleID'] == 3): ?>
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h2 class="text-xl font-semibold mb-4">Tambah Ulasan</h2>
                    <form method="POST" action="proses-ulasan.php">
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Pilih Buku:</label>
                            <select name="buku_id" required class="w-full px-3 py-2 border rounded-lg">
                                <?php
                                $query_buku = "SELECT BukuID, Judul FROM buku";
                                $result_buku = mysqli_query($conn, $query_buku);
                                while ($buku = mysqli_fetch_assoc($result_buku)) {
                                    echo "<option value='" . $buku['BukuID'] . "'>" . $buku['Judul'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Rating:</label>
                            <div class="flex gap-4">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <label class="flex items-center">
                                        <input type="radio" name="rating" value="<?php echo $i; ?>" required class="mr-1">
                                        <span><?php echo $i; ?></span>
                                    </label>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2">Ulasan:</label>
                            <textarea name="ulasan" required class="w-full px-3 py-2 border rounded-lg"></textarea>
                        </div>
                        <button type="submit" name="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                            Kirim Ulasan
                        </button>
                    </form>
                </div>
            <?php endif ?>


            <!-- Tabel Ulasan -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 border">No</th>
                            <th class="py-2 px-4 border">Judul Buku</th>
                            <th class="py-2 px-4 border">Nama</th>
                            <th class="py-2 px-4 border">Rating</th>
                            <th class="py-2 px-4 border">Ulasan</th>
                            <?php if ($_SESSION['RoleID'] == 3): ?>
                                <th class="py-2 px-4 border">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT ulasanbuku.*, buku.Judul, user.Username 
                                FROM ulasanbuku 
                                JOIN buku ON ulasanbuku.BukuID = buku.BukuID 
                                JOIN user ON ulasanbuku.UserID = user.UserID 
                                ORDER BY ulasanbuku.UlasanID DESC";
                        $result = mysqli_query($conn, $query);
                        $no = 1;

                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border text-center"><?= $no++; ?></td>
                                <td class="py-2 px-4 border"><?= $row['Judul']; ?></td>
                                <td class="py-2 px-4 border"><?= $row['Username']; ?></td>
                                <td class="py-2 px-4 border"><?= $row['Rating']; ?></td>
                                <td class="py-2 px-4 border"><?= $row['Ulasan']; ?></td>
                                <?php if ($_SESSION['RoleID'] == 3): ?>
                                    <td class="py-2 px-4 border text-center">
                                        <?php if ($_SESSION['UserID'] == $row['UserID']): ?>
                                            <a href="edit-ulasan.php?id=<?= $row['UlasanID'] ?>"
                                                class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 mr-2">
                                                Edit
                                            </a>
                                            <a href="proses-ulasan.php?hapus=<?= $row['UlasanID'] ?>"
                                                onclick="return confirm('Yakin ingin menghapus ulasan ini?')"
                                                class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                                Hapus
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                <?php endif ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>