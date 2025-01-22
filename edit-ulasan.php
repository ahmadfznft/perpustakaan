<?php
include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ulasan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="mt-6">
            <h1 class="text-3xl font-bold text-center mb-6">Edit Ulasan</h1>
            
            <!-- Form Edit Ulasan -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">    
                
                <?php
                // Menangkap ID ulasan yang akan diedit
                if (isset($_GET['id'])) {
                    $ulasan_id = $_GET['id'];
                    $query = "SELECT * FROM ulasanbuku WHERE UlasanID = '$ulasan_id'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                }
                ?>

                <form method="POST" action="proses-ulasan.php">
                    <input type="hidden" name="ulasan_id" value="<?= $row['UlasanID']; ?>">

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Pilih Buku:</label>
                        <select name="buku_id" required class="w-full px-3 py-2 border rounded-lg">
                            <?php
                            $query_buku = "SELECT BukuID, Judul FROM buku";
                            $result_buku = mysqli_query($conn, $query_buku);
                            while($buku = mysqli_fetch_assoc($result_buku)) {
                                $selected = ($buku['BukuID'] == $row['BukuID']) ? 'selected' : '';
                                echo "<option value='" . $buku['BukuID'] . "' $selected>" . $buku['Judul'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Rating:</label>
                        <div class="flex gap-4">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                            <label class="flex items-center">
                                <input type="radio" name="rating" value="<?php echo $i; ?>" <?php echo ($i == $row['Rating']) ? 'checked' : ''; ?> required class="mr-1">
                                <span><?php echo $i; ?></span>
                            </label>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2">Ulasan:</label>
                        <textarea name="ulasan" required class="w-full px-3 py-2 border rounded-lg"><?= $row['Ulasan']; ?></textarea>
                    </div>

                    <button type="submit" name="update" class="px-3.5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                        Perbarui Ulasan
                    </button>
                    <a href="ulasan.php"
                            class="px-5 py-2.5 bg-gray-500 text-white text-l rounded-lg hover:bg-gray-600 transition-colors">
                            Kembali
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
