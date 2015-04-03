-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2015 at 11:09 AM
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
  `password` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `namaPanggilan` varchar(55) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `email`, `role`, `gender`, `namaPanggilan`) VALUES
('princess_anna', 'abcdef', 'abc@gmail.com', 'user', 'Perempuan', 'Anna');

-- --------------------------------------------------------

--
-- Table structure for table `catatan_latihan`
--

CREATE TABLE IF NOT EXISTS `catatan_latihan` (
  `idLatihan` char(4) NOT NULL,
  `idRapor` char(4) NOT NULL,
  `idMateri` char(4) NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  `jawabanBenar` int(5) NOT NULL,
  `tglMengerjakan` date NOT NULL,
  `lamaWaktu` time NOT NULL,
  PRIMARY KEY (`idLatihan`,`idRapor`,`idMateri`,`idKelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catatan_tes`
--

CREATE TABLE IF NOT EXISTS `catatan_tes` (
  `idTes` char(4) NOT NULL,
  `idRapor` char(4) NOT NULL,
  `jawabanBenar` int(5) NOT NULL,
  `tanggalMengerjakan` date NOT NULL,
  `lamaWaktu` time NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  PRIMARY KEY (`idTes`,`idRapor`,`idKelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `idKelas` varchar(6) NOT NULL,
  `deskripsi` varchar(256) DEFAULT NULL,
  `gambar` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`idKelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idKelas`, `deskripsi`, `gambar`) VALUES
('SD001', NULL, NULL),
('SD003', NULL, NULL),
('SD004', '', '11.png'),
('SD005', NULL, NULL),
('SD006', '', '13.png');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `idMateri` int(4) NOT NULL AUTO_INCREMENT,
  `idKelas` varchar(6) NOT NULL COMMENT 'Foreign Key ke table: Kelas column: kelas',
  `nama` varchar(50) NOT NULL,
  `rangkuman` mediumtext NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `gambar` varchar(256) NOT NULL,
  PRIMARY KEY (`idMateri`,`idKelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`idMateri`, `idKelas`, `nama`, `rangkuman`, `deskripsi`, `gambar`) VALUES
(1, 'SD001', 'Penjumlahan', 'Hahahaha', '', ''),
(2, 'SD001', 'Pengurangan', '', '', ''),
(3, 'SD004', 'Snow White', '', 'lsadkakldja', ''),
(4, 'SD002', 'Lingkaran', '', '', ''),
(5, 'SD003', 'Pecahan', 'Ada rangkuman soal pecahan nih??', '', ''),
(43, 'SD001', 'aldsa;ldsa', '', '', 'oneone2.jpg'),
(44, 'SD001', 'blue', '', '', '11bluehaired.jpg'),
(45, 'SD001', '', '', '', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `idPesan` int(6) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `isi` varchar(1000) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`idPesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`idPesan`, `tanggal`, `isi`, `email`) VALUES
(1, '2015-03-04', 'Halo admin,\r\n\r\nMau nanya nih. Kok aku ga bisa log in ya? Lupa username, bukan password. :3', 'hirohamada@hirohamada.com'),
(3, '2015-03-21', 'Testing Pesan', 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_jawaban`
--

CREATE TABLE IF NOT EXISTS `pilihan_jawaban` (
  `pilihanGanda` char(1) NOT NULL,
  `idMateri` char(4) NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  `deskripsi` mediumtext NOT NULL,
  `gambarJawaban` varchar(256) NOT NULL,
  PRIMARY KEY (`pilihanGanda`,`idMateri`,`idKelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rapor`
--

CREATE TABLE IF NOT EXISTS `rapor` (
  `idRapor` char(4) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idRapor`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `idSoal` char(4) NOT NULL,
  `idMateri` char(4) NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  `isTes` enum('latihan','tes') NOT NULL,
  `jawaban` varchar(256) NOT NULL,
  `gambarSoal` varchar(256) NOT NULL,
  `pertanyaan` text NOT NULL,
  `pembahasan` text NOT NULL,
  `gambarSolusi` varchar(256) NOT NULL,
  `isDitunjukkan` enum('Ya','Tidak') NOT NULL,
  `jumlahBenar` int(5) NOT NULL,
  `jumlahSalah` int(5) NOT NULL,
  PRIMARY KEY (`idSoal`,`idMateri`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `target_belajar`
--

CREATE TABLE IF NOT EXISTS `target_belajar` (
  `idTargetBelajar` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `idMateri` char(4) NOT NULL,
  `idKelas` varchar(6) NOT NULL,
  `banyakSoal` int(5) DEFAULT NULL,
  `targetNilai` int(3) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isSelesai` enum('tercapai','tidak') NOT NULL DEFAULT 'tidak',
  PRIMARY KEY (`idTargetBelajar`,`username`,`idMateri`,`idKelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1235 ;

--
-- Dumping data for table `target_belajar`
--

INSERT INTO `target_belajar` (`idTargetBelajar`, `username`, `idMateri`, `idKelas`, `banyakSoal`, `targetNilai`, `tanggal`, `isSelesai`) VALUES
(1232, 'abc', 'Perk', '0', 0, 100, '2015-04-01', 'tercapai'),
(1233, '900', '199', '0', 10, 100, '2015-04-01', 'tercapai'),
(1234, 'kristoff', 'abc', '0', 2, 90, '2015-04-01', 'tidak');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rapor`
--
ALTER TABLE `rapor`
  ADD CONSTRAINT `rapor_ibfk_1` FOREIGN KEY (`username`) REFERENCES `akun` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
