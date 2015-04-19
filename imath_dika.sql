-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2015 at 03:24 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
  `namaPanggilan` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `email`, `role`, `gender`, `namaPanggilan`) VALUES
('admin', 'admin123', 'admin@imath.ac.id', 'admin', 'Laki-laki', 'Ini Admin'),
('dika.galih', '8800047777666a0e34b3581bd5a489a5', 'dika.galih@ui.ac.id', 'user', 'Laki-laki', 'Dika Galih');

-- --------------------------------------------------------

--
-- Table structure for table `catatan_latihan`
--

CREATE TABLE IF NOT EXISTS `catatan_latihan` (
`idLatihan` int(10) NOT NULL,
  `idRapor` int(10) NOT NULL,
  `idMateri` int(10) NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  `jawabanBenar` int(5) NOT NULL,
  `tglMengerjakan` date NOT NULL,
  `lamaWaktu` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catatan_latihan`
--

INSERT INTO `catatan_latihan` (`idLatihan`, `idRapor`, `idMateri`, `idKelas`, `jawabanBenar`, `tglMengerjakan`, `lamaWaktu`) VALUES
(74, 1, 1, 'SD001', 0, '2015-04-12', 1428844889),
(75, 1, 1, 'SD001', 0, '2015-04-12', 1428844903),
(76, 1, 1, 'SD001', 0, '2015-04-12', 1428844926),
(78, 1, 1, 'SD001', 0, '2015-04-12', 1428845086),
(79, 1, 1, 'SD001', 0, '2015-04-12', 1428845137),
(80, 1, 1, 'SD001', 0, '2015-04-12', 1428845271);

-- --------------------------------------------------------

--
-- Table structure for table `catatan_tes`
--

CREATE TABLE IF NOT EXISTS `catatan_tes` (
`idTes` int(10) NOT NULL,
  `idRapor` int(10) NOT NULL,
  `jawabanBenar` int(5) NOT NULL,
  `tanggalMengerjakan` date NOT NULL,
  `lamaWaktu` int(5) NOT NULL,
  `idKelas` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `idKelas` varchar(6) NOT NULL,
  `deskripsi` text,
  `gambar` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idKelas`, `deskripsi`, `gambar`) VALUES
('SD001', 'Ini deskripsi dari kelas 1', '1.jpg'),
('SD002', 'Ini deskripsi dari kelas 2', '2.jpg'),
('SD003', 'Ini deskripsi dari kelas 3', '3.jpg'),
('SD004', 'Ini deskripsi dari kelas 4', '4.jpg'),
('SD005', 'Ini deskripsi dari kelas 5', '5.jpg'),
('SD006', 'Ini deskripsi dari kelas 6', '6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
`idMateri` int(10) NOT NULL,
  `idKelas` varchar(6) NOT NULL COMMENT 'Foreign Key ke table: Kelas column: kelas',
  `nama` varchar(50) NOT NULL,
  `rangkuman` text NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`idMateri`, `idKelas`, `nama`, `rangkuman`, `deskripsi`, `gambar`) VALUES
(1, 'SD001', 'Penjumlahan', 'Ini rangkuman materi', 'Ini deskripsi materi', '1.jpg'),
(2, 'SD001', 'Pengurangan', 'Ini rangkuman materi', 'Ini deskripsi materi', '1.jpg'),
(3, 'SD002', 'Penjumlahan', 'Ini rangkuman penjumlahan', 'Ini deskripsi penjumlahan', '1.jpg'),
(4, 'SD002', 'Pengurangan', 'Ini rangkuman pengurangan', 'Ini deskripsi pengurangan', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
`idPesan` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`idPesan`, `tanggal`, `isi`, `email`) VALUES
(1, '2015-04-12', 'Hello iMath :3', 'dika.galih@ui.ac.id');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_jawaban`
--

CREATE TABLE IF NOT EXISTS `pilihan_jawaban` (
  `pilihanGanda` char(1) NOT NULL,
  `idSoal` char(10) NOT NULL,
  `idMateri` char(10) NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambarJawaban` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilihan_jawaban`
--

INSERT INTO `pilihan_jawaban` (`pilihanGanda`, `idSoal`, `idMateri`, `idKelas`, `deskripsi`, `gambarJawaban`) VALUES
('A', '1', '1', 'SD001', '2', NULL),
('A', '10', '1', 'SD001', '20', NULL),
('A', '11', '1', 'SD001', '22', NULL),
('A', '12', '1', 'SD001', '24', NULL),
('A', '13', '1', 'SD001', '26', NULL),
('A', '14', '1', 'SD001', '28', NULL),
('A', '15', '1', 'SD001', '30', NULL),
('A', '2', '1', 'SD001', '4', NULL),
('A', '3', '1', 'SD001', '6', NULL),
('A', '4', '1', 'SD001', '8', NULL),
('A', '5', '1', 'SD001', '10', NULL),
('A', '6', '1', 'SD001', '12', NULL),
('A', '7', '1', 'SD001', '14', NULL),
('A', '8', '1', 'SD001', '16', NULL),
('A', '9', '1', 'SD001', '18', NULL),
('B', '1', '1', 'SD001', '4', NULL),
('B', '10', '1', 'SD001', '40', NULL),
('B', '11', '1', 'SD001', '44', NULL),
('B', '12', '1', 'SD001', '48', NULL),
('B', '13', '1', 'SD001', '52', NULL),
('B', '14', '1', 'SD001', '56', NULL),
('B', '15', '1', 'SD001', '60', NULL),
('B', '2', '1', 'SD001', '8', NULL),
('B', '3', '1', 'SD001', '12', NULL),
('B', '4', '1', 'SD001', '16', NULL),
('B', '5', '1', 'SD001', '15', NULL),
('B', '6', '1', 'SD001', '24', NULL),
('B', '7', '1', 'SD001', '28', NULL),
('B', '8', '1', 'SD001', '32', NULL),
('B', '9', '1', 'SD001', '36', NULL),
('C', '1', '1', 'SD001', '6', NULL),
('C', '10', '1', 'SD001', '60', NULL),
('C', '11', '1', 'SD001', '66', NULL),
('C', '12', '1', 'SD001', '72', NULL),
('C', '13', '1', 'SD001', '78', NULL),
('C', '14', '1', 'SD001', '84', NULL),
('C', '15', '1', 'SD001', '90', NULL),
('C', '2', '1', 'SD001', '12', NULL),
('C', '3', '1', 'SD001', '18', NULL),
('C', '4', '1', 'SD001', '24', NULL),
('C', '5', '1', 'SD001', '20', NULL),
('C', '6', '1', 'SD001', '36', NULL),
('C', '7', '1', 'SD001', '42', NULL),
('C', '8', '1', 'SD001', '48', NULL),
('C', '9', '1', 'SD001', '54', NULL),
('D', '1', '1', 'SD001', '8', NULL),
('D', '10', '1', 'SD001', '80', NULL),
('D', '11', '1', 'SD001', '88', NULL),
('D', '12', '1', 'SD001', '96', NULL),
('D', '13', '1', 'SD001', '104', NULL),
('D', '14', '1', 'SD001', '112', NULL),
('D', '15', '1', 'SD001', '120', NULL),
('D', '2', '1', 'SD001', '16', NULL),
('D', '3', '1', 'SD001', '24', NULL),
('D', '4', '1', 'SD001', '32', NULL),
('D', '5', '1', 'SD001', '25', NULL),
('D', '6', '1', 'SD001', '48', NULL),
('D', '7', '1', 'SD001', '56', NULL),
('D', '8', '1', 'SD001', '64', NULL),
('D', '9', '1', 'SD001', '72', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rapor`
--

CREATE TABLE IF NOT EXISTS `rapor` (
`idRapor` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rapor`
--

INSERT INTO `rapor` (`idRapor`, `username`) VALUES
(1, 'dika.galih');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
`idSoal` int(10) NOT NULL,
  `idMateri` int(10) NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  `isTes` enum('latihan','tes') NOT NULL,
  `jawaban` text NOT NULL,
  `gambarSoal` varchar(2048) DEFAULT NULL,
  `pertanyaan` text NOT NULL,
  `pembahasan` text NOT NULL,
  `gambarSolusi` varchar(2048) DEFAULT NULL,
  `isDitunjukkan` enum('Ya','Tidak') NOT NULL,
  `jumlahBenar` int(5) NOT NULL,
  `jumlahSalah` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`idSoal`, `idMateri`, `idKelas`, `isTes`, `jawaban`, `gambarSoal`, `pertanyaan`, `pembahasan`, `gambarSolusi`, `isDitunjukkan`, `jumlahBenar`, `jumlahSalah`) VALUES
(1, 1, 'SD001', 'latihan', 'A', '1.jpg', '1 + 1 =', '1 + 1 = 2', '2.jpg', 'Ya', 0, 0),
(2, 1, 'SD001', 'latihan', 'A', '2.jpg', '2 + 2 =', '2 + 2 = 4', NULL, 'Ya', 0, 0),
(3, 1, 'SD001', 'latihan', 'A', NULL, '3 + 3 =', '3 + 3 = 6', NULL, 'Ya', 0, 0),
(4, 1, 'SD001', 'latihan', 'A', NULL, '4 + 4 =', '4 + 4 = 8', NULL, 'Ya', 0, 0),
(5, 1, 'SD001', 'latihan', 'A', NULL, '5 + 5 =', '5 + 5 = 10', NULL, 'Ya', 0, 0),
(6, 1, 'SD001', 'latihan', 'A', NULL, '6 + 6 =', '6 + 6 = 12', NULL, 'Ya', 0, 0),
(7, 1, 'SD001', 'latihan', 'A', NULL, '7 + 7 =', '7 + 7 = 14', NULL, 'Ya', 0, 0),
(8, 1, 'SD001', 'latihan', 'A', NULL, '8 + 8 =', '8 + 8 = 16', NULL, 'Ya', 0, 0),
(9, 1, 'SD001', 'latihan', 'A', NULL, '9 + 9 =', '9 + 9 = 18', NULL, 'Ya', 0, 0),
(10, 1, 'SD001', 'latihan', 'A', NULL, '10 + 10 =', '10 + 10 = 20', NULL, 'Ya', 0, 0),
(11, 1, 'SD001', 'latihan', 'A', NULL, '11 + 11 =', '11 + 11 = 22', NULL, 'Tidak', 0, 0),
(12, 1, 'SD001', 'latihan', 'A', NULL, '12 + 12 =', '12 + 12 = 24', NULL, 'Tidak', 0, 0),
(13, 1, 'SD001', 'tes', 'A', NULL, '13 + 13 =', '13 + 13 = 26', NULL, 'Ya', 0, 0),
(14, 1, 'SD001', 'tes', 'A', NULL, '14 + 14 =', '14 + 14 = 28', NULL, 'Ya', 0, 0),
(15, 1, 'SD001', 'tes', 'A', NULL, '15 + 15 =', '15 + 15 = 30', NULL, 'Tidak', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `target_belajar`
--

CREATE TABLE IF NOT EXISTS `target_belajar` (
`idTargetBelajar` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `idMateri` int(10) NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  `banyakSoal` int(5) DEFAULT NULL,
  `targetNilai` int(3) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isSelesai` enum('tercapai','tidak') NOT NULL DEFAULT 'tidak'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `catatan_latihan`
--
ALTER TABLE `catatan_latihan`
 ADD PRIMARY KEY (`idLatihan`,`idRapor`,`idMateri`,`idKelas`), ADD KEY `idRapor` (`idRapor`), ADD KEY `catatan_latihan_ibfk_2` (`idMateri`,`idKelas`);

--
-- Indexes for table `catatan_tes`
--
ALTER TABLE `catatan_tes`
 ADD PRIMARY KEY (`idTes`,`idRapor`,`idKelas`), ADD KEY `idRapor` (`idRapor`), ADD KEY `idKelas` (`idKelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`idKelas`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
 ADD PRIMARY KEY (`idMateri`,`idKelas`), ADD KEY `idKelas` (`idKelas`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
 ADD PRIMARY KEY (`idPesan`);

--
-- Indexes for table `pilihan_jawaban`
--
ALTER TABLE `pilihan_jawaban`
 ADD PRIMARY KEY (`pilihanGanda`,`idSoal`,`idMateri`,`idKelas`);

--
-- Indexes for table `rapor`
--
ALTER TABLE `rapor`
 ADD PRIMARY KEY (`idRapor`), ADD KEY `username` (`username`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
 ADD PRIMARY KEY (`idSoal`,`idMateri`,`idKelas`), ADD KEY `soal_ibfk_1` (`idMateri`,`idKelas`);

--
-- Indexes for table `target_belajar`
--
ALTER TABLE `target_belajar`
 ADD PRIMARY KEY (`idTargetBelajar`,`username`,`idMateri`,`idKelas`), ADD KEY `username` (`username`), ADD KEY `target_belajar_ibfk_2` (`idMateri`,`idKelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan_latihan`
--
ALTER TABLE `catatan_latihan`
MODIFY `idLatihan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `catatan_tes`
--
ALTER TABLE `catatan_tes`
MODIFY `idTes` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
MODIFY `idMateri` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `idPesan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rapor`
--
ALTER TABLE `rapor`
MODIFY `idRapor` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
MODIFY `idSoal` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `target_belajar`
--
ALTER TABLE `target_belajar`
MODIFY `idTargetBelajar` int(10) NOT NULL AUTO_INCREMENT;
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
-- Constraints for table `materi`
--
ALTER TABLE `materi`
ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`idKelas`) REFERENCES `kelas` (`idKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`idMateri`, `idKelas`) REFERENCES `materi` (`idMateri`, `idKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `target_belajar`
--
ALTER TABLE `target_belajar`
ADD CONSTRAINT `target_belajar_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `target_belajar_ibfk_2` FOREIGN KEY (`idMateri`, `idKelas`) REFERENCES `materi` (`idMateri`, `idKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
