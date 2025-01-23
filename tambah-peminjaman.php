<?php
include "navbar.php";

if (isset($_GET['id'])) {
    $buku_id = $_GET['id'];

    $query_buku = "SELECT BukuID, Judul, Stok FROM buku WHERE BukuID = '$buku_id'";
    $result_buku = mysqli_query($conn, $query_buku);
    $buku = mysqli_fetch_assoc($result_buku);
    $stok_buku = $buku['Stok'];
}

$today = date('Y-m-d');
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

            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Form Peminjaman</h2>
                <form method="POST" action="proses-pinjam.php">
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Buku yang Dipilih:</label>
                        <input type="hidden" name="buku_id" value="<?php echo $buku['BukuID']; ?>">
                        <input type="text" value="<?php echo $buku['Judul']; ?>" class="w-full px-3 py-2 border rounded-lg bg-gray-100" readonly>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Tanggal Peminjaman:</label>
                        <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" required class="w-full px-3 py-2 border rounded-lg" min="<?php echo $today; ?>" onchange="updateReturnDate()">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Tanggal Pengembalian:</label>
                        <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" required class="w-full px-3 py-2 border rounded-lg" min="<?php echo $today; ?>">
                    </div>

                    <a href="home-peminjam.php"
                        class="px-4 py-2.5 bg-gray-500 text-white text-sm rounded-lg hover:bg-gray-600 transition-colors mr-4">
                        Kembali
                    </a>
                    <input type="submit" name="submit" value="Simpan Peminjaman" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateReturnDate() {
            const startDate = document.getElementById('tanggal_peminjaman').value;
            document.getElementById('tanggal_pengembalian').setAttribute('min', startDate);
        }
    </script>
</body>

</html>