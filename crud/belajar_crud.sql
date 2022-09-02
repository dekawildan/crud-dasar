-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 02:15 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajar_crud`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cari_buku` (IN `judul` VARCHAR(50))  SELECT * FROM buku WHERE buku.judul_buku LIKE judul$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hapus_buku` (IN `idbuku` INT(11))  DELETE FROM buku WHERE buku.id_buku=idbuku$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tambah_buku` (IN `judul` VARCHAR(50), IN `tgl` DATE, IN `jml` INT(11))  INSERT INTO buku (buku.judul_buku,buku.tgl_terbit,buku.jumlah) VALUES(judul,tgl,jml)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tampil_buku` ()  SELECT * FROM buku$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `update_buku` (IN `id` INT(11), IN `judul` VARCHAR(50), IN `tgl` DATE, IN `jml` INT(11))  UPDATE buku SET buku.judul_buku=judul, buku.tgl_terbit=tgl, buku.jumlah=jml WHERE buku.id_buku=id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tgl_terbit` date NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `tgl_terbit`, `jumlah`) VALUES
(2, 'Pemrograman PHP', '2022-08-02', 50),
(4, 'Matematika', '2022-08-04', 20),
(5, 'Bahasa Indonesia', '2022-08-04', 20),
(6, 'Dasar MySQL', '2022-08-09', 10),
(7, 'PAIBP Kelas X', '2022-08-08', 30),
(8, 'PAIBP Kelas XI', '2022-08-08', 20),
(9, 'Informatika kelas x', '2022-08-12', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
