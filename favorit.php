<!-- <?php
include 'connection.php';

if(isset($_POST['tambah_favorit'])) {
    $id_user = $_SESSION['id_user'];
    $id_produk = $_POST['id_produk'];
    
    if(simpanFavorit($id_user, $id_produk)) {
        echo "<script>alert('Berhasil ditambahkan ke favorit');</script>";
        echo "<script>window.location.href='home-peminjam.php';</script>";
    }
}

if(isset($_POST['hapus_favorit'])) {
    $id_user = $_SESSION['id_user'];
    $id_produk = $_POST['id_produk'];
    
    if(hapusFavorit($id_user, $id_produk)) {
        echo "<script>alert('Berhasil dihapus dari favorit');</script>";
        echo "<script>window.location.href='home-peminjam.php';</script>";
    }
} -->