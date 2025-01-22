<?php
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="mt-6">
            <h1 class="text-3xl font-bold text-center mb-6">Tambah Peminjaman Buku</h1>

            <!-- Form Peminjaman Buku -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Form Peminjaman</h2>
                <form method="POST" action="proses-pinjam.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Pilih Buku:</label>
                        <select name="buku_id" required class="w-full px-3 py-2 border rounded-lg">
                            <?php
                            // Ambil data buku dari database
                            $query_buku = "SELECT BukuID, Judul FROM buku";
                            $result_buku = mysqli_query($conn, $query_buku);
                            while ($buku = mysqli_fetch_assoc($result_buku)) {
                                echo "<option value='" . $buku['BukuID'] . "'>" . $buku['Judul'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Tanggal Peminjaman:</label>
                        <input type="date" name="tanggal_peminjaman" required class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Tanggal Pengembalian:</label>
                        <input type="date" name="tanggal_pengembalian" required class="w-full px-3 py-2 border rounded-lg">
                    </div>

                    <button type="submit" name="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                        Simpan Peminjaman
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>