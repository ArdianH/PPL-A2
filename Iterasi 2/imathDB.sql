-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2015 at 06:36 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `imath`
--
CREATE DATABASE IF NOT EXISTS `imath` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `imath`;

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `namaPanggilan` varchar(80) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `email`, `role`, `gender`, `namaPanggilan`) VALUES
('admin', '0192023a7bbd73250516f069df18b500', 'admin@imath.ac.id', 'admin', 'Perempuan', 'admin'),
('alivia.khaira', '04668875412db9993629099fd66d444d', 'alivia.batuparan@gmail.com', 'user', 'Perempuan', 'ivi'),
('Apela', 'df634f276f1b66f66dbde1d817f25e6c', 'apel@hijau.com', 'user', 'Perempuan', 'Apela'),
('Beast', '13b36a269b42793a8144fc5a25f791b7', 'beast@beautyandthebeast.com', 'user', 'Laki-laki', 'Beast'),
('dika.galih', '8800047777666a0e34b3581bd5a489a5', 'dika.galih@ui.ac.id', 'user', 'Laki-laki', 'Dika Galih'),
('Eric', '9fe1ea2201d7d84e765c7495d6527694', 'eric@littlemermaid.com', 'user', 'Laki-laki', 'Eric'),
('hadaiq2', 'hadaiq', 'hadaiq@gmail.com', 'user', 'Laki-laki', '&lt;?php>'),
('Hicupp', '4fa26955d6333b97e65f92eeb703f883', 'hicupp@toothless.com', 'user', 'Laki-laki', 'Hicupp'),
('hiro_hamada', 'bighero6', 'hirohamada@hiro.com', 'user', 'Laki-laki', 'Hiro'),
('indah', 'decbdbfd2cfa279600fdee01099f6178', 'indah@gmail.com', 'user', 'Perempuan', 'indah ayu'),
('kristoff', 'e80b5017098950fc58aad83c8c14978e', 'kristoff@kristoff.com', 'user', '', 'kristoff'),
('Mawar', '933d26122c5618b6d4aa1263d035ee35', 'mawar@merah.com', 'user', 'Perempuan', 'Mawar'),
('princess_anna', '72858d1af3c55029d5dc0bf1a77b6d9e', 'sweetpineappleforest@gmail.com', 'user', 'Perempuan', 'Anna'),
('QElsa', '4c776288a53c388ee4e1bf1317d88ae3', 'queenelsa@arendelle.com', 'user', 'Perempuan', 'Elsa'),
('Salju', '2e5beb16b303b5b985353e818f60d624', 'salju@putih.com', 'user', 'Perempuan', 'Salju'),
('Violet', '80f1187112e2e5e0403499147f7014b8', 'violet@purple.com', 'user', 'Perempuan', 'Violet');

-- --------------------------------------------------------

--
-- Table structure for table `catatan_latihan`
--

CREATE TABLE IF NOT EXISTS `catatan_latihan` (
  `idLatihan` int(10) NOT NULL AUTO_INCREMENT,
  `idRapor` int(10) NOT NULL,
  `idMateri` int(10) NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  `jawabanBenar` int(5) NOT NULL,
  `tglMengerjakan` date NOT NULL,
  `lamaWaktu` int(5) NOT NULL,
  PRIMARY KEY (`idLatihan`,`idRapor`,`idMateri`,`idKelas`),
  KEY `idRapor` (`idRapor`),
  KEY `catatan_latihan_ibfk_2` (`idMateri`,`idKelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `catatan_latihan`
--

INSERT INTO `catatan_latihan` (`idLatihan`, `idRapor`, `idMateri`, `idKelas`, `jawabanBenar`, `tglMengerjakan`, `lamaWaktu`) VALUES
(1, 4, 1, 'SD001', 0, '2015-04-25', 4),
(2, 4, 1, 'SD001', 0, '2015-04-25', 3),
(3, 4, 1, 'SD001', 0, '2015-04-25', 4),
(4, 4, 2, 'SD001', 1, '2015-04-25', 4),
(5, 4, 2, 'SD001', 1, '2015-04-25', 4),
(6, 4, 1, 'SD001', 1, '2015-04-25', 21),
(7, 5, 1, 'SD001', 2, '2015-04-25', 172),
(8, 5, 1, 'SD001', 0, '2015-04-25', 8),
(9, 5, 1, 'SD001', 0, '2015-04-25', 157);

-- --------------------------------------------------------

--
-- Table structure for table `catatan_tes`
--

CREATE TABLE IF NOT EXISTS `catatan_tes` (
  `idTes` int(10) NOT NULL AUTO_INCREMENT,
  `idRapor` int(10) NOT NULL,
  `jawabanBenar` int(5) NOT NULL,
  `tglMengerjakan` date NOT NULL,
  `lamaWaktu` int(5) NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  PRIMARY KEY (`idTes`,`idRapor`,`idKelas`),
  KEY `idRapor` (`idRapor`),
  KEY `idKelas` (`idKelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `catatan_tes`
--

INSERT INTO `catatan_tes` (`idTes`, `idRapor`, `jawabanBenar`, `tglMengerjakan`, `lamaWaktu`, `idKelas`) VALUES
(1, 2, 15, '2015-04-13', 58, 'SD002'),
(2, 2, 15, '2015-04-13', 58, 'SD002'),
(3, 2, 1, '2015-04-13', 59, 'SD002'),
(4, 2, 2, '2015-04-13', 59, 'SD002'),
(5, 2, 2, '2015-04-13', 59, 'SD002'),
(6, 2, 2, '2015-04-13', 3588, 'SD002'),
(7, 2, 2, '2015-04-13', 3590, 'SD002'),
(8, 2, 2, '2015-04-13', 3590, 'SD002'),
(9, 2, 2, '2015-04-13', 3590, 'SD002'),
(10, 2, 2, '2015-04-13', 108, 'SD002'),
(11, 2, 2, '2015-04-13', 108, 'SD002'),
(12, 2, 2, '2015-04-13', 108, 'SD002'),
(13, 2, 2, '2015-04-13', 110, 'SD002'),
(14, 2, 2, '2015-04-13', 110, 'SD002'),
(15, 2, 2, '2015-04-13', 110, 'SD002'),
(16, 2, 2, '2015-04-13', 110, 'SD002'),
(17, 2, 1, '2015-04-13', 113, 'SD002'),
(18, 2, 2, '2015-04-13', 14, 'SD002'),
(19, 2, 1, '2015-04-13', 65, 'SD002'),
(20, 2, 1, '2015-04-13', 65, 'SD002'),
(21, 2, 2, '2015-04-13', 69, 'SD002'),
(22, 2, 2, '2015-04-13', 69, 'SD002'),
(23, 2, 2, '2015-04-13', 69, 'SD002'),
(24, 2, 2, '2015-04-13', 69, 'SD002'),
(26, 3, 1, '2015-04-13', 201, 'SD002'),
(27, 5, 0, '2015-04-15', 9, 'SD002'),
(28, 5, 0, '2015-04-15', 9, 'SD002'),
(29, 5, 0, '2015-04-15', 8, 'SD002'),
(30, 5, 0, '2015-04-15', 8, 'SD002'),
(31, 5, 0, '2015-04-15', 10, 'SD002'),
(32, 5, 0, '2015-04-15', 0, 'SD002'),
(33, 5, 0, '2015-04-15', 9, 'SD002'),
(34, 5, 1, '2015-04-15', 8, 'SD002'),
(35, 5, 1, '2015-04-15', 8, 'SD002'),
(36, 5, 0, '2015-04-15', 9, 'SD002'),
(37, 9, 1, '2015-04-15', 16, 'SD002'),
(38, 9, 2, '2015-04-15', 10, 'SD001'),
(39, 9, 2, '2015-04-15', 7, 'SD002'),
(40, 9, 2, '2015-04-15', 11, 'SD001'),
(41, 5, 0, '2015-04-20', 14, 'SD001'),
(42, 5, 1, '2015-04-20', 6, 'SD001'),
(43, 5, 2, '2015-04-21', 20, 'SD001'),
(44, 5, 2, '2015-04-21', 15, 'SD002'),
(45, 10, 2, '2015-04-21', 11, 'SD001'),
(46, 10, 2, '2015-04-21', 0, 'SD001'),
(47, 10, 3, '2015-04-21', 14, 'SD001'),
(48, 10, 2, '2015-04-21', 8, 'SD001'),
(49, 4, 2, '2015-04-23', 8, 'SD001'),
(50, 5, 1, '2015-04-23', 17, 'SD001'),
(51, 4, 3, '2015-04-24', 27, 'SD001'),
(52, 4, 6, '2015-04-25', 41, 'SD001'),
(53, 4, 0, '2015-04-25', 0, 'SD002'),
(54, 4, 6, '2015-04-25', 35, 'SD001');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `idKelas` varchar(6) NOT NULL,
  `deskripsi` text,
  `gambar` varchar(2048) DEFAULT NULL,
  `sertifikat` varchar(256) DEFAULT NULL,
  `waktuTes` int(255) NOT NULL,
  PRIMARY KEY (`idKelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idKelas`, `deskripsi`, `gambar`, `sertifikat`, `waktuTes`) VALUES
('SD001', 'Di Kelas 1, kamu akan belajar mengenai banyak hal baru. Belajar matematika untuk pertama kalinya memang sangat menyenangkan', 'bug.png', 'bee2.png', 0),
('SD002', 'Pada Kelas 2, kamu akan mempelajari matematika yang lebih menantang! Bersiaplah untuk memasuki petualangan angka yang menegangkan!', 'bee.png', 'Sertifikat2.jpg', 0),
('SD003', 'Pada Kelas 3, pelajaran matematika akan semakin seru saja :)', 'owl.png', 'Sertifikat3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE IF NOT EXISTS `kunjungan` (
  `tanggal` date NOT NULL,
  `jumlah` int(255) NOT NULL,
  `idKelas` varchar(6) NOT NULL DEFAULT '',
  PRIMARY KEY (`idKelas`,`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `idMateri` int(10) NOT NULL AUTO_INCREMENT,
  `idKelas` varchar(6) NOT NULL COMMENT 'Foreign Key ke table: Kelas column: kelas',
  `nama` varchar(50) NOT NULL,
  `rangkuman` text NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`idMateri`,`idKelas`),
  KEY `idKelas` (`idKelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`idMateri`, `idKelas`, `nama`, `rangkuman`, `deskripsi`, `gambar`) VALUES
(1, 'SD001', 'Lambang Bilangan Cacah', '1. Membilang bilangan berarti menyatakan besar suatu bilangan.<br> <br>2. Membaca bilangan berarti menyebutkan anama suatu bilangan.<br> <br>3. Menulis bilangan berarti menyatakan bilangan dalam bentuk lambangnya.<br>4. Jumlah kumpulan benda dapat lebih banyak, dapat lebih sedikit, atau dapat sama.<br>5. Urutan jumlah benda dapat dimulai dari yang paling banyak atau paling sedikit.', 'abcedda abcedda abcedda abcedda abcedda', NULL),
(2, 'SD001', 'Penjumlahan', ' Penjumlahan berarti penambahan dua atau lebih bilangan. <br> Penjumlahan disimbolkan tanda +.<br>\r\n<br> Yuk coba hafalkan penjumlahan dasar<br>\r\n<br>1 + 1 = 2\r\n<br> 2 + 2 = 4\r\n<br> 3 + 3 = 6\r\n<br> 4 + 4 = 8\r\n<br> 5 + 5 = 10', 'deskripsi', NULL),
(3, 'SD001', 'Pengurangan', 'Pengurangan menggunakan tanda minus atau -.<br>\r\nHafalkan pengurangan dasar yukk....<br>\r\n<br>2 - 1 = 1\r\n<br>3 - 1 = 2\r\n<br>4 - 1 = 3\r\n<br>5 - 1 = 4\r\n<br> 6 - 1 = 6\r\n<br> 7 - 1 = 7\r\n<br> 8 - 1 = 8\r\n<br> 9 - 1 = 9\r\n<br> 10 - 1 = 10', 'deskripsi', NULL),
(4, 'SD001', 'Bangun Ruang', '1. Bangun ruang antar lain bola, tabung, balok, kubus, prisma, dan kerucut.<br>2. Tabung memiliki alas dan tutup. <br>3. Rusuk adalah garis yang membatasi bentuk balok atau kubus.<br>4. Setiap rusuk pada balok tidak sama panjang.<br>5. Setiap rusuk pada kubus adalah sama panjang.', 'deskripsi', NULL),
(5, 'SD001', 'Pengukuran Berat', '1. Benda ada yang berat dan ada yang ringan.<br>2. Benda ringan dapat dengan mudah dipegang dan diangkat.<br>3. Benda berat susah untuk diangkat. <br>4. Berat benda dapat diukur dengan satuan tidak baku.<br>5. Dua benda dapat dibandingkan berdasarkan beratnya.', 'deskripsi', NULL),
(6, 'SD001', 'Bangun Datar', '1. Bentuk benda bermacam-macam ada benda bentuk segi empat, segitiga, dan lingkaran. <br>2. Benda bentuk segi empat memiliki empat sisi.<br>3. Benda bentuk segitiga memiliki tiga sisi.<br>4. Benda bentuk lingkaran memiliki satu sisi.<br>5. Tepi sebuah benda disebut sisi.', 'deskripsi', NULL),
(8, 'SD002', 'Penjumlahan', '', '', 'wolf.png');

-- --------------------------------------------------------

--
-- Table structure for table `medali`
--

CREATE TABLE IF NOT EXISTS `medali` (
  `username` varchar(50) NOT NULL,
  `idMateri` int(10) NOT NULL,
  PRIMARY KEY (`username`,`idMateri`),
  KEY `idMateri` (`idMateri`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medali`
--

INSERT INTO `medali` (`username`, `idMateri`) VALUES
('admin', 1),
('admin', 3),
('admin', 8);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `idPesan` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`idPesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`idPesan`, `tanggal`, `isi`, `email`) VALUES
(2, '2015-04-13', 'hahahahhaahaaa', 'haha@haha.com'),
(3, '2015-04-15', 'jshadjha', 'hadaiq@hadaiq.com'),
(4, '2015-04-24', '</abcdef', 'abc@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_jawaban`
--

CREATE TABLE IF NOT EXISTS `pilihan_jawaban` (
  `pilihanGanda` char(1) NOT NULL,
  `idSoal` int(10) NOT NULL,
  `idMateri` int(10) NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambarJawaban` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`pilihanGanda`,`idSoal`,`idMateri`,`idKelas`),
  KEY `FK_ID_SOAL` (`idSoal`),
  KEY `FK_ID_MATERI` (`idMateri`),
  KEY `FK_ID_Kelas` (`idKelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilihan_jawaban`
--

INSERT INTO `pilihan_jawaban` (`pilihanGanda`, `idSoal`, `idMateri`, `idKelas`, `deskripsi`, `gambarJawaban`) VALUES
('a', 1, 1, 'SD001', 'dua', NULL),
('a', 2, 1, 'SD001', 'empat', NULL),
('a', 3, 1, 'SD001', 'tiga', NULL),
('a', 4, 1, 'SD001', 'tiga', NULL),
('a', 5, 1, 'SD001', 'empat', NULL),
('a', 6, 1, 'SD001', 'tujuh', NULL),
('a', 7, 1, 'SD001', 'lima', NULL),
('a', 8, 1, 'SD001', 'sembilan', NULL),
('a', 9, 1, 'SD001', 'sembilan', NULL),
('a', 10, 1, 'SD001', 'sembilan', NULL),
('a', 11, 1, 'SD001', '7', NULL),
('a', 12, 1, 'SD001', '3', NULL),
('a', 13, 1, 'SD001', '8', NULL),
('a', 14, 1, 'SD001', '4', NULL),
('a', 15, 1, 'SD001', '5', NULL),
('a', 16, 1, 'SD001', '9', NULL),
('a', 17, 1, 'SD001', '9', NULL),
('a', 18, 1, 'SD001', '9', NULL),
('a', 19, 1, 'SD001', '10', NULL),
('a', 20, 1, 'SD001', '2', NULL),
('a', 21, 2, 'SD001', '2', NULL),
('a', 22, 2, 'SD001', '4', NULL),
('a', 23, 2, 'SD001', '6', NULL),
('a', 24, 2, 'SD001', '8', NULL),
('a', 25, 2, 'SD001', '10', NULL),
('a', 26, 2, 'SD001', '4', NULL),
('a', 27, 2, 'SD001', '6', NULL),
('a', 28, 2, 'SD001', '8', NULL),
('a', 29, 2, 'SD001', '9', NULL),
('a', 30, 2, 'SD001', '4', NULL),
('a', 31, 2, 'SD001', '6', NULL),
('a', 32, 2, 'SD001', '8', NULL),
('a', 33, 2, 'SD001', '9', NULL),
('a', 34, 2, 'SD001', '8', NULL),
('a', 35, 2, 'SD001', '9', NULL),
('a', 36, 2, 'SD001', '8', NULL),
('a', 37, 2, 'SD001', '7', NULL),
('a', 38, 2, 'SD001', '8', NULL),
('a', 39, 2, 'SD001', '8', NULL),
('a', 40, 2, 'SD001', '10', NULL),
('a', 41, 2, 'SD001', '9', NULL),
('a', 42, 1, 'SD001', 'tujuh', NULL),
('a', 43, 1, 'SD001', 'dua', NULL),
('a', 44, 3, 'SD001', '4', NULL),
('a', 45, 3, 'SD001', '4', NULL),
('b', 1, 1, 'SD001', 'tiga', NULL),
('b', 2, 1, 'SD001', 'tiga', NULL),
('b', 3, 1, 'SD001', 'empat', NULL),
('b', 4, 1, 'SD001', 'empat', NULL),
('b', 5, 1, 'SD001', 'tiga', NULL),
('b', 6, 1, 'SD001', 'enam', NULL),
('b', 7, 1, 'SD001', 'sepuluh', NULL),
('b', 8, 1, 'SD001', 'enam', NULL),
('b', 9, 1, 'SD001', 'empat', NULL),
('b', 10, 1, 'SD001', 'lima', NULL),
('b', 11, 1, 'SD001', '10', NULL),
('b', 12, 1, 'SD001', '5', NULL),
('b', 13, 1, 'SD001', '3', NULL),
('b', 14, 1, 'SD001', '1', NULL),
('b', 15, 1, 'SD001', '10', NULL),
('b', 16, 1, 'SD001', '8', NULL),
('b', 17, 1, 'SD001', '8', NULL),
('b', 18, 1, 'SD001', '7', NULL),
('b', 19, 1, 'SD001', '9', NULL),
('b', 20, 1, 'SD001', '1', NULL),
('b', 21, 2, 'SD001', '1', NULL),
('b', 22, 2, 'SD001', '6', NULL),
('b', 23, 2, 'SD001', '7', NULL),
('b', 24, 2, 'SD001', '9', NULL),
('b', 25, 2, 'SD001', '7', NULL),
('b', 26, 2, 'SD001', '3', NULL),
('b', 27, 2, 'SD001', '4', NULL),
('b', 28, 2, 'SD001', '5', NULL),
('b', 29, 2, 'SD001', '6', NULL),
('b', 30, 2, 'SD001', '6', NULL),
('b', 31, 2, 'SD001', '7', NULL),
('b', 32, 2, 'SD001', '10', NULL),
('b', 33, 2, 'SD001', '6', NULL),
('b', 34, 2, 'SD001', '7', NULL),
('b', 35, 2, 'SD001', '7', NULL),
('b', 36, 2, 'SD001', '10', NULL),
('b', 37, 2, 'SD001', '10', NULL),
('b', 38, 2, 'SD001', '10', NULL),
('b', 39, 2, 'SD001', '10', NULL),
('b', 40, 2, 'SD001', '9', NULL),
('b', 41, 2, 'SD001', '8', NULL),
('b', 42, 1, 'SD001', 'delapan', NULL),
('b', 43, 1, 'SD001', 'tiga', NULL),
('b', 44, 3, 'SD001', '5', NULL),
('b', 45, 3, 'SD001', '3', NULL),
('c', 1, 1, 'SD001', 'satu', NULL),
('c', 2, 1, 'SD001', 'satu', NULL),
('c', 3, 1, 'SD001', 'satu', NULL),
('c', 4, 1, 'SD001', 'satu', NULL),
('c', 5, 1, 'SD001', 'enam', NULL),
('c', 6, 1, 'SD001', 'delapan', NULL),
('c', 7, 1, 'SD001', 'tujuh', NULL),
('c', 8, 1, 'SD001', 'delapan', NULL),
('c', 9, 1, 'SD001', 'enam', NULL),
('c', 10, 1, 'SD001', 'satu', NULL),
('c', 11, 1, 'SD001', '2', NULL),
('c', 12, 1, 'SD001', '2', NULL),
('c', 13, 1, 'SD001', '6', NULL),
('c', 14, 1, 'SD001', '2', NULL),
('c', 15, 1, 'SD001', '7', NULL),
('c', 16, 1, 'SD001', '7', NULL),
('c', 17, 1, 'SD001', '7', NULL),
('c', 18, 1, 'SD001', '8', NULL),
('c', 19, 1, 'SD001', '7', NULL),
('c', 20, 1, 'SD001', '7', NULL),
('c', 21, 2, 'SD001', '3', NULL),
('c', 22, 2, 'SD001', '8', NULL),
('c', 23, 2, 'SD001', '8', NULL),
('c', 24, 2, 'SD001', '7', NULL),
('c', 25, 2, 'SD001', '9', NULL),
('c', 26, 2, 'SD001', '8', NULL),
('c', 27, 2, 'SD001', '8', NULL),
('c', 28, 2, 'SD001', '7', NULL),
('c', 29, 2, 'SD001', '7', NULL),
('c', 30, 2, 'SD001', '7', NULL),
('c', 31, 2, 'SD001', '8', NULL),
('c', 32, 2, 'SD001', '9', NULL),
('c', 33, 2, 'SD001', '10', NULL),
('c', 34, 2, 'SD001', '10', NULL),
('c', 35, 2, 'SD001', '8', NULL),
('c', 36, 2, 'SD001', '9', NULL),
('c', 37, 2, 'SD001', '9', NULL),
('c', 38, 2, 'SD001', '7', NULL),
('c', 39, 2, 'SD001', '9', NULL),
('c', 40, 2, 'SD001', '8', NULL),
('c', 41, 2, 'SD001', '7', NULL),
('c', 42, 1, 'SD001', 'sepuluh', NULL),
('c', 43, 1, 'SD001', 'empat', NULL),
('c', 44, 3, 'SD001', '6', NULL),
('c', 45, 3, 'SD001', '2', NULL),
('d', 1, 1, 'SD001', 'empat', NULL),
('d', 2, 1, 'SD001', 'dua', NULL),
('d', 3, 1, 'SD001', 'dua', NULL),
('d', 4, 1, 'SD001', 'dua', NULL),
('d', 5, 1, 'SD001', 'lima', NULL),
('d', 6, 1, 'SD001', 'sembilan', NULL),
('d', 7, 1, 'SD001', 'satu', NULL),
('d', 8, 1, 'SD001', 'dua', NULL),
('d', 9, 1, 'SD001', 'delapan', NULL),
('d', 10, 1, 'SD001', 'sepuluh', NULL),
('d', 11, 1, 'SD001', '1', NULL),
('d', 12, 1, 'SD001', '4', NULL),
('d', 13, 1, 'SD001', '9', NULL),
('d', 14, 1, 'SD001', '3', NULL),
('d', 15, 1, 'SD001', '8', NULL),
('d', 16, 1, 'SD001', '6', NULL),
('d', 17, 1, 'SD001', '6', NULL),
('d', 18, 1, 'SD001', '6', NULL),
('d', 19, 1, 'SD001', '6', NULL),
('d', 20, 1, 'SD001', '10', NULL),
('d', 21, 2, 'SD001', '4', NULL),
('d', 22, 2, 'SD001', '10', NULL),
('d', 23, 2, 'SD001', '9', NULL),
('d', 24, 2, 'SD001', '10', NULL),
('d', 25, 2, 'SD001', '8', NULL),
('d', 26, 2, 'SD001', '2', NULL),
('d', 27, 2, 'SD001', '5', NULL),
('d', 28, 2, 'SD001', '10', NULL),
('d', 29, 2, 'SD001', '8', NULL),
('d', 30, 2, 'SD001', '10', NULL),
('d', 31, 2, 'SD001', '9', NULL),
('d', 32, 2, 'SD001', '7', NULL),
('d', 33, 2, 'SD001', '8', NULL),
('d', 34, 2, 'SD001', '9', NULL),
('d', 35, 2, 'SD001', '6', NULL),
('d', 36, 2, 'SD001', '7', NULL),
('d', 37, 2, 'SD001', '8', NULL),
('d', 38, 2, 'SD001', '9', NULL),
('d', 39, 2, 'SD001', '7', NULL),
('d', 40, 2, 'SD001', '7', NULL),
('d', 41, 2, 'SD001', '10', NULL),
('d', 42, 1, 'SD001', 'sembilan', NULL),
('d', 43, 1, 'SD001', 'lima', NULL),
('d', 44, 3, 'SD001', '7', NULL),
('d', 45, 3, 'SD001', '5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rapor`
--

CREATE TABLE IF NOT EXISTS `rapor` (
  `idRapor` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idRapor`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `rapor`
--

INSERT INTO `rapor` (`idRapor`, `username`) VALUES
(4, 'admin'),
(6, 'alivia.khaira'),
(18, 'Apela'),
(14, 'Beast'),
(1, 'dika.galih'),
(13, 'Eric'),
(8, 'hadaiq'),
(9, 'hadaiq2'),
(12, 'Hicupp'),
(2, 'hiro_hamada'),
(7, 'indah'),
(15, 'kristoff'),
(16, 'Mawar'),
(5, 'princess_anna'),
(10, 'QElsa'),
(17, 'Salju'),
(3, 'suci.fadhilah'),
(11, 'Violet');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE IF NOT EXISTS `sertifikat` (
  `username` varchar(50) NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  PRIMARY KEY (`username`,`idKelas`),
  KEY `idKelas` (`idKelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`username`, `idKelas`) VALUES
('admin', 'SD001'),
('admin', 'SD003');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `idSoal` int(10) NOT NULL,
  `idMateri` int(10) NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  `isTes` enum('latihan','tes') NOT NULL,
  `jawaban` char(1) NOT NULL,
  `gambarSoal` varchar(2048) DEFAULT NULL,
  `pertanyaan` text NOT NULL,
  `pembahasan` text NOT NULL,
  `gambarSolusi` varchar(2048) DEFAULT NULL,
  `isDitunjukkan` enum('Ya','Tidak') NOT NULL,
  `jumlahBenar` int(5) NOT NULL,
  `jumlahSalah` int(5) NOT NULL,
  PRIMARY KEY (`idSoal`,`idMateri`,`idKelas`),
  KEY `idMateri` (`idMateri`),
  KEY `idKelas` (`idKelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`idSoal`, `idMateri`, `idKelas`, `isTes`, `jawaban`, `gambarSoal`, `pertanyaan`, `pembahasan`, `gambarSolusi`, `isDitunjukkan`, `jumlahBenar`, `jumlahSalah`) VALUES
(1, 1, 'SD001', 'latihan', 'c', NULL, '1 = ', '1 dibaca "satu"', NULL, 'Ya', 0, 0),
(2, 1, 'SD001', 'latihan', 'd', NULL, '2 = ', '2 dibaca  "dua"', NULL, 'Ya', 0, 0),
(3, 1, 'SD001', 'latihan', 'a', NULL, '3 = ', '3 dibaca tiga', NULL, 'Ya', 0, 0),
(4, 1, 'SD001', 'latihan', 'b', NULL, '4=', '4 dibaca empat', NULL, 'Ya', 0, 0),
(5, 1, 'SD001', 'latihan', 'd', NULL, '5=', '5 dibaca lima', NULL, 'Ya', 0, 0),
(6, 1, 'SD001', 'latihan', 'b', NULL, '6 =', '6 dibaca enam', NULL, 'Ya', 0, 0),
(7, 1, 'SD001', 'latihan', 'c', NULL, '7=', '7 dibaca tujuh', NULL, 'Ya', 0, 0),
(8, 1, 'SD001', 'latihan', 'c', NULL, '8 =', '8 dibaca delapan', NULL, 'Ya', 0, 0),
(9, 1, 'SD001', 'latihan', 'a', NULL, '9 =', '9 dibaca sembilan', NULL, 'Ya', 0, 0),
(10, 1, 'SD001', 'latihan', 'd', NULL, '10 =', '4 dibaca sepuluh', NULL, 'Ya', 0, 0),
(11, 1, 'SD001', 'latihan', 'd', NULL, 'satu = ', 'satu = 1', NULL, 'Ya', 0, 0),
(12, 1, 'SD001', 'latihan', 'c', NULL, 'dua = ', 'dua = 2', NULL, 'Ya', 0, 0),
(13, 1, 'SD001', 'latihan', 'b', NULL, 'tiga = ', 'tiga = 3', NULL, 'Ya', 0, 0),
(14, 1, 'SD001', 'latihan', 'a', NULL, 'empat =', 'empat = 4', NULL, 'Ya', 0, 0),
(15, 1, 'SD001', 'latihan', 'a', NULL, 'lima =', 'lima = 5', NULL, 'Ya', 0, 0),
(16, 1, 'SD001', 'latihan', 'd', NULL, 'enam =', 'enam = 6', NULL, 'Ya', 0, 0),
(17, 1, 'SD001', 'latihan', 'c', NULL, 'tujuh =', 'tujuh = 7', NULL, 'Ya', 0, 0),
(18, 1, 'SD001', 'latihan', 'c', NULL, 'delapan =', 'delapan = 8', NULL, 'Ya', 0, 0),
(19, 1, 'SD001', 'latihan', 'b', NULL, 'sembilan =', 'sembilan = 9', NULL, 'Ya', 0, 0),
(20, 1, 'SD001', 'latihan', 'd', NULL, 'sepuluh =', 'sepuluh = 10', NULL, 'Ya', 0, 0),
(21, 2, 'SD001', 'latihan', 'a', NULL, '1 + 1 =', '1 + 1 = 2.', NULL, 'Ya', 0, 0),
(22, 2, 'SD001', 'latihan', 'a', NULL, '2 + 2 =', '2 + 2 = 4.', NULL, 'Ya', 0, 0),
(23, 2, 'SD001', 'latihan', 'a', NULL, '3 + 3 = ', '3 + 3 = 6', NULL, 'Ya', 0, 0),
(24, 2, 'SD001', 'latihan', 'a', NULL, '4 + 4 =', '4 + 4 = 8', NULL, 'Ya', 0, 0),
(25, 2, 'SD001', 'latihan', 'a', NULL, '5 + 5 =', '5 + 5 = 10', NULL, 'Ya', 0, 0),
(26, 2, 'SD001', 'latihan', 'b', NULL, '1 + 2 =', '1 + 2 = 3', NULL, 'Ya', 0, 0),
(27, 2, 'SD001', 'latihan', 'b', NULL, '1 + 3 =', '1 + 3 = 4', NULL, 'Ya', 0, 0),
(28, 2, 'SD001', 'latihan', 'b', NULL, '1 + 4 =', '1 + 4 = 5', NULL, 'Ya', 0, 0),
(29, 2, 'SD001', 'latihan', 'b', NULL, '1 + 5 =', '1 + 5 = 6', NULL, 'Ya', 0, 0),
(30, 2, 'SD001', 'latihan', 'c', NULL, '1 + 6 =', '1 + 6 = 7', NULL, 'Ya', 0, 0),
(31, 2, 'SD001', 'latihan', 'c', NULL, '1 + 7 =', '1 + 7 = 8', NULL, 'Ya', 0, 0),
(32, 2, 'SD001', 'latihan', 'c', NULL, '1 + 8 =', '1 + 8 = 9', NULL, 'Ya', 0, 0),
(33, 2, 'SD001', 'latihan', 'c', NULL, '1 + 9 =', '1 + 9 = 10', NULL, 'Ya', 0, 0),
(34, 2, 'SD001', 'latihan', 'c', NULL, '2 + 8', '2 + 8 = 10', NULL, 'Ya', 0, 0),
(35, 2, 'SD001', 'latihan', 'd', NULL, '2 + 4 =', '2 + 4 = 6', NULL, 'Ya', 0, 0),
(36, 2, 'SD001', 'latihan', 'd', NULL, '2 + 5 = ', '2 + 5 = 7', NULL, 'Ya', 0, 0),
(37, 2, 'SD001', 'latihan', 'd', NULL, '5 + 3 =', '5 + 3 = 8', NULL, 'Ya', 0, 0),
(38, 2, 'SD001', 'latihan', 'd', NULL, '5 + 4 =', '5 + 4 = 9', NULL, 'Ya', 0, 0),
(39, 2, 'SD001', 'latihan', 'd', NULL, '4 + 3 =', '4 + 3 = 7', NULL, 'Ya', 0, 0),
(40, 2, 'SD001', 'tes', 'a', NULL, '6 + 4 =', '6 + 4 = 10', NULL, 'Ya', 0, 0),
(41, 2, 'SD001', 'tes', 'b', NULL, '3 + 5 =', '3 + 5 = 8', NULL, 'Ya', 0, 0),
(42, 1, 'SD001', 'tes', 'c', NULL, '10 dibaca ', '10 dibaca sepuluh', NULL, 'Ya', 0, 0),
(43, 1, 'SD001', 'tes', 'd', NULL, '5 dibaca', '5 dibaca lima', NULL, 'Ya', 0, 0),
(44, 3, 'SD001', 'tes', 'a', NULL, '8 - 4 =', '8 - 4 = 4', NULL, 'Ya', 0, 0),
(45, 3, 'SD001', 'tes', 'b', NULL, '7 - 4 =', '7 - 4 = 3', NULL, 'Ya', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `target_belajar`
--

CREATE TABLE IF NOT EXISTS `target_belajar` (
  `idTargetBelajar` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `idMateri` int(10) NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  `banyakSoal` int(5) DEFAULT NULL,
  `targetNilai` int(3) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isSelesai` enum('tercapai','tidak') NOT NULL DEFAULT 'tidak',
  `targetWaktu` int(255) DEFAULT NULL,
  PRIMARY KEY (`idTargetBelajar`,`username`,`idMateri`,`idKelas`),
  KEY `username` (`username`),
  KEY `target_belajar_ibfk_2` (`idMateri`,`idKelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `target_belajar`
--

INSERT INTO `target_belajar` (`idTargetBelajar`, `username`, `idMateri`, `idKelas`, `banyakSoal`, `targetNilai`, `tanggal`, `isSelesai`, `targetWaktu`) VALUES
(2, 'admin', 3, 'SD001', 3, 100, '2015-04-25', 'tercapai', 120),
(4, 'admin', 1, 'SD001', 2, 100, '2015-04-25', 'tidak', 90),
(5, 'admin', 8, 'SD002', 3, 100, '2015-04-25', 'tidak', 140),
(6, 'admin', 4, 'SD001', 3, 100, '2015-04-25', 'tidak', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catatan_latihan`
--
ALTER TABLE `catatan_latihan`
  ADD CONSTRAINT `catatan_latihan_ibfk_1` FOREIGN KEY (`idRapor`) REFERENCES `rapor` (`idRapor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catatan_latihan_ibfk_2` FOREIGN KEY (`idMateri`, `idKelas`) REFERENCES `materi` (`idMateri`, `idKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catatan_tes`
--
ALTER TABLE `catatan_tes`
  ADD CONSTRAINT `catatan_tes_ibfk_1` FOREIGN KEY (`idRapor`) REFERENCES `rapor` (`idRapor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catatan_tes_ibfk_2` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan_ibfk_1` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`);

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medali`
--
ALTER TABLE `medali`
  ADD CONSTRAINT `medali_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`),
  ADD CONSTRAINT `medali_ibfk_2` FOREIGN KEY (`idMateri`) REFERENCES `materi` (`idMateri`);

--
-- Constraints for table `pilihan_jawaban`
--
ALTER TABLE `pilihan_jawaban`
  ADD CONSTRAINT `FK_ID_Kelas` FOREIGN KEY (`idKelas`) REFERENCES `soal` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_MATERI` FOREIGN KEY (`idMateri`) REFERENCES `soal` (`idMateri`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID_SOAL` FOREIGN KEY (`idSoal`) REFERENCES `soal` (`idSoal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pilihan_jawaban_ibfk_1` FOREIGN KEY (`idSoal`) REFERENCES `soal` (`idSoal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `sertifikat_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sertifikat_ibfk_2` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`idMateri`) REFERENCES `materi` (`idMateri`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `soal_ibfk_2` FOREIGN KEY (`idKelas`) REFERENCES `materi` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `target_belajar`
--
ALTER TABLE `target_belajar`
  ADD CONSTRAINT `target_belajar_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `target_belajar_ibfk_2` FOREIGN KEY (`idMateri`, `idKelas`) REFERENCES `materi` (`idMateri`, `idKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
