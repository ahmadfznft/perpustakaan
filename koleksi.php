<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Buku Pribadi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <?php
    include "navbar.php";

    $iduser = $_SESSION['UserID']; // Mengambil ID pengguna yang sedang login

    // Query untuk mengambil data buku dalam koleksi pribadi pengguna
    $query = "SELECT k.KoleksiID, b.Judul, b.Penulis, b.Penerbit, b.TahunTerbit, b.Gambar, b.BukuID, k.UserID 
              FROM koleksipribadi k 
              INNER JOIN buku b ON k.BukuID = b.BukuID 
              WHERE k.UserID = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $iduser);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Query Error: " . mysqli_error($conn));
    }
    ?>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .card-text {
            color: #555;
        }

        .btn-borrow {
            background-color: green;
            color: white;
        }

        .btn-borrow:hover {
            background-color: darkgreen;
        }

        .card img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <div class="container mt-3">
        <center>
            <h1 class="text">Koleksi Pribadi</h1>
        </center>
        <div class="row">
            <?php while ($book = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/<?= $book['Gambar'] ?>" class="card-img-top" alt="Cover Buku">
                        <div class="card-body">
                            <h5 class="card-title"><?= $book['Judul'] ?></h5>
                            <p class="card-text"><strong>Penulis:</strong> <?= $book['Penulis'] ?></p>
                            <p class="card-text"><strong>Penerbit:</strong> <?= $book['Penerbit'] ?></p>
                            <p class="card-text"><strong>Tahun Terbit:</strong> <?= $book['TahunTerbit'] ?></p>

                            <a href="tambah-peminjaman.php?id=<?= $book['BukuID'] ?>" class="btn btn-borrow btn-block">Pinjam Buku</a>
                            <a href="proses-koleksi.php?id=<?= $book['KoleksiID']; ?>" class="btn btn-danger btn-block" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini dari koleksi Anda?')">
                                Hapus dari Koleksi
                            </a>

                            <!-- Tombol Detail untuk membuka Modal -->
                            <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#detailModal"
                                data-id="<?= $book['BukuID'] ?>"
                                data-judul="<?= $book['Judul'] ?>"
                                data-penulis="<?= $book['Penulis'] ?>"
                                data-penerbit="<?= $book['Penerbit'] ?>"
                                data-tahunterbit="<?= $book['TahunTerbit'] ?>"
                                data-gambar="<?= $book['Gambar'] ?>">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Modal untuk menampilkan detail buku -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel">Detail Buku</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="bookDetail">
                        <center><img id="bookImage" src="" alt="Book Cover" class="img-fluid mb-3"></center>
                        <h5 id="bookTitle"></h5>
                        <p><strong>Penulis:</strong> <span id="bookAuthor"></span></p>
                        <p><strong>Penerbit:</strong> <span id="bookPublisher"></span></p>
                        <p><strong>Tahun Terbit:</strong> <span id="bookYear"></span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Mengisi modal dengan detail buku saat tombol Detail diklik
        $('#detailModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Tombol yang diklik
            var bukuID = button.data('id');
            var judul = button.data('judul');
            var penulis = button.data('penulis');
            var penerbit = button.data('penerbit');
            var tahunterbit = button.data('tahunterbit');
            var gambar = button.data('gambar');

            var modal = $(this);
            modal.find('#bookTitle').text(judul);
            modal.find('#bookAuthor').text(penulis);
            modal.find('#bookPublisher').text(penerbit);
            modal.find('#bookYear').text(tahunterbit);
            modal.find('#bookImage').attr('src', 'images/' + gambar);
        });
    </script>
</body>

</html>