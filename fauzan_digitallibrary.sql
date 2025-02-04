-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2025 at 04:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fauzan_digitallibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `BukuID` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Penulis` varchar(255) NOT NULL,
  `Penerbit` varchar(255) NOT NULL,
  `TahunTerbit` int(11) NOT NULL,
  `Deskripsi` text NOT NULL,
  `Gambar` varchar(255) NOT NULL,
  `Stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`BukuID`, `Judul`, `Penulis`, `Penerbit`, `TahunTerbit`, `Deskripsi`, `Gambar`, `Stok`) VALUES
(1, 'Burlian', 'Tere Liye', 'Republika', 2009, 'Novel yang mengangkat tema persahabatan dan kekeluargaan dengan latar kehidupan anak-anak di Pulau Sumatera pada era Orde Baru. Cerita ini berfokus pada kehidupan Burlian, seorang anak dari keluarga kurang mampu yang tinggal di desa terpencil. Meskipun dikenal sebagai \"si Anak Spesial,\" Burlian harus menghadapi berbagai tantangan hidup, salah satunya adalah pendidikan yang sangat dihargai oleh orang tuanya.\r\nKehidupan Burlian dipenuhi petualangan dan kenakalan bersama kakak dan adiknya. Meskipun sering berbuat nakal, Burlian belajar banyak dari orang tuanya, terutama dari hukuman yang diberikan Mamak dan Bapak yang mendidiknya dengan cara bijak tanpa kekerasan. Salah satu pelajaran berharga adalah pentingnya pendidikan, yang disampaikan melalui pengalaman kerja keras di kebun dan hutan.\r\nBurlian juga menjalin persahabatan dengan Nakamura-San, seorang pria Jepang yang datang ke desa mereka untuk proyek pembangunan. Persahabatan ini membuka jalan bagi Burlian untuk meraih impian, yaitu mendapatkan beasiswa ke Jepang.\r\nNovel ini mengajarkan nilai-nilai seperti kesederhanaan, kerja keras, kejujuran, kasih sayang, dan pengorbanan orang tua. Meskipun ada beberapa bagian cerita yang terasa lambat, novel ini tetap memberikan pesan inspiratif bagi pembaca, terutama anak-anak.', 'images/burlian.jpeg', 2),
(2, 'Bulan', 'Tere Liye', 'Gramedia Pustaka Utama', 2015, 'Setelah pertempuran di Klan Bulan, Raib, Seli, dan Ali kembali menjalani kehidupan normal di Klan Bumi. Enam bulan kemudian, Miss Selena datang untuk mengajak mereka ke Klan Matahari untuk tujuan diplomasi. Setibanya di sana, mereka ikut serta dalam Festival Matahari, sebuah kompetisi berbahaya untuk menemukan bunga matahari pertama yang mekar. Bersama Ily, putra Ilo, mereka melewati berbagai rintangan seperti padang perdu, danau, dan pegunungan, serta bertarung melawan monster dan gorila mengamuk.\r\n\r\nPetualangan ini mengajarkan pentingnya kerja sama, sikap positif, dan ketangguhan dalam menghadapi tantangan. Novel ini penuh dengan misteri yang terungkap, namun masih banyak teka-teki baru yang harus dipecahkan.', 'images/bulan.jpeg', 5),
(3, 'Matahari', 'Tere Liye', 'Kompas Gramedia', 2018, 'melanjutkan petualangan Raib, Seli, dan Ali setelah tewasnya sahabat mereka, Ily. Mereka kembali ke klan Bumi, namun Ali terlibat dalam kontroversi kompetisi basket dan mulai mengembangkan teknologi baru dari klan Matahari dan Bulan. Ali kemudian mengajak Raib dan Seli untuk mengeksplorasi klan Bintang, meskipun Raib menolak menggunakan Buku Kehidupan yang bisa menghancurkan kepercayaan Miss Selena.\r\n\r\nMereka melakukan perjalanan menggunakan pesawat kapsul versi kedua, Ily, menuju gua yang mengarah ke sebuah lorong kuno. Dalam perjalanan, mereka terjebak dalam konflik di Lembah Hijau dan kota Zaramaraz, dihadapkan pada pasukan bayangan dan pengadilan yang melarang kekuatan mereka. Ketiga sekawan ini akhirnya berhadapan dengan Marsekal Laar dan terlibat dalam pertempuran besar.\r\n\r\nKetegangan meningkat saat Ali, Raib, dan Seli berusaha merebut kembali Buku Kehidupan Raib, namun mereka tertangkap dan dibawa ke ruangan isolasi. Pertarungan seru berlanjut, dengan kekuatan mereka yang saling terhubung. Di akhir cerita, Ali melompat ke portal menuju klan Komet, membawa mereka ke dunia paralel yang semakin penuh ancaman.\r\n\r\nNovel ini mengisahkan petualangan, pertarungan, dan tantangan baru yang harus dihadapi oleh ketiga sahabat dalam dunia paralel yang penuh bahaya.', 'images/matahari.jpeg', 5),
(4, 'Bumi', 'Tere Liye', 'Gramedia Pustaka Utama', 2019, 'Novel Bumi menceritakan petualangan tiga remaja—Raib, Seli, dan Ali—yang memiliki kekuatan luar biasa dan terikat takdir untuk menyelamatkan Bumi dari kehancuran. Raib, keturunan Klan Bulan, memiliki kemampuan menghilang dan menguasai Buku Kehidupan; Seli, dari Klan Matahari, memiliki kekuatan api dan tekad kuat; dan Ali, dari Klan Bumi, bisa berkomunikasi dengan hewan. Ketiganya menyadari kekuatan mereka setelah insiden tower listrik, yang kemudian membawa mereka ke dunia paralel.\r\n\r\nMereka menjelajahi Klan Bulan, Klan Matahari, dan Klan Bumi, menghadapi berbagai bahaya seperti monster dan pasukan Tamus, sosok jahat yang ingin menguasai dunia. Dalam perjalanan, mereka bertemu karakter-karakter fantastis yang membantu mereka mengungkap rahasia dunia paralel dan berusaha mengalahkan Tamus.', 'images/bumin.jpg', 6),
(6, 'Laut Bercerita', 'Leila Salikha Chudori.', 'Gramedia', 2017, 'Laut Bercerita mengisahkan Biru Laut, seorang mahasiswa Sastra Inggris di Universitas Gadjah Mada, Yogyakarta, yang terlibat dalam organisasi Winatra yang aktif dalam diskusi sastra dan pergerakan melawan rezim pemerintah. Laut, yang tertarik pada karya-karya Pramoedya Ananta Toer yang dilarang, bergabung dengan aktivis muda lainnya untuk memperjuangkan kebebasan berpikir. Namun, mereka ditangkap, disiksa, dan dipaksa untuk mengungkapkan siapa yang menggerakkan mereka. Keluarga Laut yang tidak mengetahui nasibnya, terus berharap dan berdoa agar ia kembali. Novel ini menceritakan penderitaan, perjuangan, dan semangat kebebasan para aktivis muda di tengah ketidakadilan.', 'images/laut_bercerita.jpg', 15);

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `KategoriBukuID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL,
  `KategoriID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoribuku_relasi`
--

INSERT INTO `kategoribuku_relasi` (`KategoriBukuID`, `BukuID`, `KategoriID`) VALUES
(1, 6, 4),
(2, 6, 6),
(9, 3, 1),
(10, 3, 5),
(11, 3, 12),
(12, 2, 12),
(13, 4, 1),
(14, 4, 5),
(15, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `KategoriID` int(11) NOT NULL,
  `NamaKategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`KategoriID`, `NamaKategori`) VALUES
(1, 'petualangan'),
(2, 'horror'),
(3, 'komedi'),
(4, 'romansa'),
(5, 'fantasi'),
(6, 'sejarah'),
(7, 'misteri'),
(8, 'thriller'),
(9, 'keluarga'),
(10, 'inspiratif'),
(12, 'fiksi');

-- --------------------------------------------------------

--
-- Table structure for table `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `KoleksiID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `PeminjamanID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL,
  `TanggalPeminjaman` date NOT NULL,
  `TanggalPengembalian` date NOT NULL,
  `StatusPeminjaman` enum('Menunggu Konfirmasi','Buku Dipinjam','Buku Dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`PeminjamanID`, `UserID`, `BukuID`, `TanggalPeminjaman`, `TanggalPengembalian`, `StatusPeminjaman`) VALUES
(7, 1, 1, '2025-02-04', '2025-02-05', 'Buku Dikembalikan'),
(8, 2, 1, '2025-02-04', '2025-02-05', 'Buku Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `NamaRole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `NamaRole`) VALUES
(1, 'admin'),
(2, 'petugas'),
(3, 'peminjam');

-- --------------------------------------------------------

--
-- Table structure for table `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `UlasanID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL,
  `Ulasan` text NOT NULL,
  `rating` int(11) NOT NULL,
  `tanggalUlasan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ulasanbuku`
--

INSERT INTO `ulasanbuku` (`UlasanID`, `UserID`, `BukuID`, `Ulasan`, `rating`, `tanggalUlasan`) VALUES
(23, 2, 2, 'bagus banget bang bukunya aku suka', 0, '2025-01-30'),
(24, 2, 6, 'ok', 0, '2025-02-02'),
(25, 2, 6, 'ini mantap', 0, '2025-02-02'),
(26, 2, 1, 'ini sih oke bukunya', 2, '2025-02-02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `RoleID`, `Username`, `Password`, `Email`, `NamaLengkap`, `Alamat`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'admin', 'admin'),
(2, 3, 'ujang ', 'ed84089fcb1b864597cf6dc504859d1d', 'ujang@gmail.com', 'ujanaja', 'di jalan jalan'),
(4, 2, 'uus', 'a6e8c26fdaeff2c0230f864ccbc610d2', 'uus@gmail.com', 'uus', 'jalanaja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`BukuID`);

--
-- Indexes for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`KategoriBukuID`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`KategoriID`);

--
-- Indexes for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`KoleksiID`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`PeminjamanID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`UlasanID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `BukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `KategoriBukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `KategoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `KoleksiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `PeminjamanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  MODIFY `UlasanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
