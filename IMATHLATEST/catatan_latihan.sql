-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2015 at 05:09 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan_latihan`
--
ALTER TABLE `catatan_latihan`
 ADD PRIMARY KEY (`idLatihan`,`idRapor`,`idMateri`,`idKelas`), ADD KEY `idRapor` (`idRapor`), ADD KEY `catatan_latihan_ibfk_2` (`idMateri`,`idKelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan_latihan`
--
ALTER TABLE `catatan_latihan`
MODIFY `idLatihan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `catatan_latihan`
--
ALTER TABLE `catatan_latihan`
ADD CONSTRAINT `catatan_latihan_ibfk_1` FOREIGN KEY (`idRapor`) REFERENCES `rapor` (`idRapor`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `catatan_latihan_ibfk_2` FOREIGN KEY (`idMateri`, `idKelas`) REFERENCES `materi` (`idMateri`, `idKelas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
