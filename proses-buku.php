<?php
include "connection.php"; // Pastikan file koneksi ke database sudah benar

if (isset($_POST['submit'])) {
    // Mengambil data dari form
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahunTerbit = $_POST['tahunterbit'];

    // Mengambil informasi file gambar
    $file_name = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $file_size = $_FILES['gambar']['size'];
    $file_error = $_FILES['gambar']['error'];

    // Mengecek apakah ada file yang diupload
    if ($file_error === 0) {
        // Tentukan folder untuk menyimpan gambar
        $target_dir = "images/";
        $target_file = $target_dir . basename($file_name);

        // Mengecek apakah ukuran file terlalu besar (misal 2MB)
        if ($file_size <= 2097152) {
            // Memindahkan file gambar ke folder
            if (move_uploaded_file($file_tmp, $target_file)) {
                // Query untuk memasukkan data ke dalam tabel Buku
                $sql = "INSERT INTO buku (Judul, Penulis, Penerbit, TahunTerbit, Gambar) 
                        VALUES ('$judul', '$penulis', '$penerbit', '$tahunTerbit', '$target_file')";

                // Mengeksekusi query
                if (mysqli_query($conn, $sql)) {
                    echo "<script>
                    alert('Data Berhasil Disimpan');
                        window.location.href='master-buku.php';
                         </script>";
            } else {
                echo "<script>
                alert('Gagal Mengunggah Gambar');
                window.location.href='tambah-buku.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Ukuran File Gambar Terlalu Besar');
                window.location.href='tambah-buku.php';
                </script>";
        }
    } else {
        echo "<script>
        alert('Terjadi Kesalahan Saat Menggungah File Gambar');
        window.location.href='master-buku.php';
        </script>";
    }
}
} elseif (isset($_POST['edit'])) {
    // Mengambil data dari form
    $id_buku = $_POST['id'];  // ID Buku yang akan diedit
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahunTerbit = $_POST['tahunterbit'];

    // Mengambil informasi file gambar (jika ada)
    $gambar = $_FILES['gambar']['name'];
    $lokasiGambar = $_FILES['gambar']['tmp_name'];
    $file_size = $_FILES['gambar']['size'];
    $file_error = $_FILES['gambar']['error'];

    if ($gambar == "") {
        // Jika tidak ada gambar baru, hanya update data lainnya
        $sql = "UPDATE buku 
                SET Judul = '$judul', 
                    Penulis = '$penulis', 
                    Penerbit = '$penerbit', 
                    TahunTerbit = '$tahunTerbit' 
                WHERE BukuID = $id_buku";
        $result = mysqli_query($conn, $sql);
    } else {
        // Jika ada gambar baru, kita memindahkannya ke folder yang sesuai
        $folder_gambar = "images/"; // Folder untuk menyimpan gambar
        $target_file = $folder_gambar . basename($gambar);

        // Mengecek apakah ukuran file lebih besar dari 2MB
        if ($file_size > 2097152) {
            echo "<script>
                    alert('Ukuran gambar terlalu besar! Maksimal 2MB.');
                    window.location.href='edit-buku.php?id=$id_buku';
                  </script>";
            exit();
        }

        // Memindahkan gambar yang di-upload ke folder
        if (move_uploaded_file($lokasiGambar, $target_file)) {
            // Jika berhasil, update data buku dan gambar baru
            $sql = "UPDATE buku 
                    SET Judul = '$judul', 
                        Penulis = '$penulis', 
                        Penerbit = '$penerbit', 
                        TahunTerbit = '$tahunTerbit', 
                        Gambar = '$target_file' 
                    WHERE BukuID = $id_buku";
            $result = mysqli_query($conn, $sql);
        } else {
            echo "<script>
                    alert('Gagal mengunggah gambar!');
                    window.location.href='edit-buku.php?id=$id_buku';
                  </script>";
            exit();
        }
    }
    if ($result) {
        echo "
        <script>
            alert('Data Buku Berhasil diubah');
            window.location.href='master-buku.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data Buku Gagal diubah');
            window.location.href='master-buku.php';
        </script>";
    }
}
?>
