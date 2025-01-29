<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <?php include "navbar.php";

    $userCount = $conn->query("SELECT COUNT(*) as count FROM user")->fetch_assoc()['count'];
    $roleCount = $conn->query("SELECT COUNT(*) as count FROM role")->fetch_assoc()['count'];
    $categoryCount = $conn->query("SELECT COUNT(*) as count FROM kategori_buku")->fetch_assoc()['count'];
    $bookCount = $conn->query("SELECT COUNT(*) as count FROM buku")->fetch_assoc()['count'];
    $borrowerCount = $conn->query("SELECT COUNT(*) as count FROM peminjaman")->fetch_assoc()['count'];
    ?>

    <div class="flex">

        <main class="flex-1 p-4">
            <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white p-4 shadow-md rounded">
                    <a href="master-kategori.php" class="block">
                        <h2 class="font-bold">Daftar Kategori</h2>
                        <p>Jumlah kategori: <?php echo $categoryCount; ?></p>
                    </a>
                </div>
                <div class="bg-white p-4 shadow-md rounded">
                    <a href="master-buku.php" class="block">
                        <h2 class="font-bold">Daftar Buku</h2>
                        <p>Jumlah buku: <?php echo $bookCount; ?></p>
                    </a>
                </div>
                <div class="bg-white p-4 shadow-md rounded">
                    <a href="data-peminjam.php" class="block">
                        <h2 class="font-bold">Data Peminjam</h2>
                        <p>Jumlah peminjam: <?php echo $borrowerCount; ?></p>
                    </a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>