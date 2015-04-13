-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2015 at 01:27 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
`idPesan` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `rapor`
--

CREATE TABLE IF NOT EXISTS `rapor` (
`idRapor` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=1236 DEFAULT CHARSET=latin1;

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
MODIFY `idLatihan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `catatan_tes`
--
ALTER TABLE `catatan_tes`
MODIFY `idTes` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
MODIFY `idMateri` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
MODIFY `idPesan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rapor`
--
ALTER TABLE `rapor`
MODIFY `idRapor` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
MODIFY `idSoal` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `target_belajar`
--
ALTER TABLE `target_belajar`
MODIFY `idTargetBelajar` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1236;
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
