<?php
 include "connection.php";
if (isset($_GET['ubah'])) {
    $peminjamanID = $_GET['ubah'];

    $queryBukuID = "SELECT BukuID FROM peminjaman WHERE PeminjamanID = ?";
    $stmtBukuID = $conn->prepare($queryBukuID);
    $stmtBukuID->bind_param("i", $peminjamanID);
    $stmtBukuID->execute();
    $resultBukuID = $stmtBukuID->get_result();
    $rowBukuID = $resultBukuID->fetch_assoc();
    $bukuID = $rowBukuID['BukuID'];

    // Update status peminjaman
    $queryUpdateStatus = "UPDATE peminjaman SET StatusPeminjaman = 'Sudah Dikembalikan' WHERE PeminjamanID = ?";
    $stmtUpdateStatus = $conn->prepare($queryUpdateStatus);
    $stmtUpdateStatus->bind_param("i", $peminjamanID);

    if ($stmtUpdateStatus->execute()) {
        // Update stok buku
        $queryUpdateStok = "UPDATE buku SET Stok = Stok + 1 WHERE BukuID = ?";
        $stmtUpdateStok = $conn->prepare($queryUpdateStok);
        $stmtUpdateStok->bind_param("i", $bukuID);
        $stmtUpdateStok->execute();

        // Redirect kembali ke halaman data peminjam setelah berhasil
        $_SESSION['message'] = "Status peminjaman berhasil diubah dan stok buku diperbarui.";
        header("Location: data-peminjam.php?status=success");
        exit();
    } else {
        // Jika gagal, bisa menampilkan pesan error
        echo "Error: " . $stmtUpdateStatus->error;
    }

    $stmtUpdateStatus->close();
    $stmtBukuID->close();
    $conn->close();
}
