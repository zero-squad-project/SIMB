-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2019 at 10:16 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `last_login`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2019-06-11 00:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idBarang` varchar(30) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `nama` text NOT NULL,
  `harga` float NOT NULL,
  `stok` int(11) NOT NULL,
  `stok_min` int(11) DEFAULT NULL,
  `satuan` varchar(15) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idBarang`, `idKategori`, `nama`, `harga`, `stok`, `stok_min`, `satuan`, `keterangan`, `foto`) VALUES
('1BMXIR3X2', 3, 'Case for Xiaomi Redmi 3x Aluminium Bumper With Mirror Backdoor Slide - Gold', 25000, 97, 10, 'pcs', 'nope', '1BMXIR3X2_3.jpg'),
('1TGAZNG', 3, 'Tempered Glass for Asus Zenfone Go ZB452KG (4,5\")', 10000, 97, 10, 'pcs', 'nope', '1TGAZNG_3.jpg'),
('BMSG50', 3, 'Casing Metal Bumper Mirror for Samsung Galaxy J3 - Gold ', 20000, 97, 10, 'pcs', 'nope', 'BMSG50_3.png'),
('BMSGJT1', 3, 'Casing Metal Bumper Mirror for Samsung Galaxy J1 Ace - Silver + Free Tempere Glass', 35000, 97, 10, 'pcs', 'nope', 'BMSGJT1_3.png'),
('BMSGP03', 3, 'Casing Metal Bumper Mirror for Samsung Galaxy Grand Prime (G530) - Rose Gold', 23000, 94, 10, 'pcs', 'nope', 'BMSGP03_3.png'),
('BMVOY153', 3, 'Case for Vivo Y15 Aluminium Bumper With Mirror Backdoor Slide - Rose Gold', 25000, 97, 10, 'pcs', 'nope', 'BMVOY153_3.png'),
('MMXT07', 3, ' Motomo Metal hardcase for Xiaomi Redmi 3 Pro - Gold + Free Tempered Glass', 30000, 97, 5, 'pcs', 'nope', 'MMXT07_3.png'),
('TGSAXA', 3, 'Tempered Glass for Smartfren Andromax A', 20000, 97, 10, 'pcs', 'nope', 'TGSAXA_3.png'),
('UTXIR3S1', 3, 'Softcase Ultrathin for Xiaomi Redmi 3s - Putih', 5000, 97, 10, 'pcs', 'nope', 'UTXIR3S1_3.png');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `idBK` int(11) NOT NULL,
  `idBarang` varchar(30) NOT NULL,
  `noPesanan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` float NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `waktu_keluar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total` float NOT NULL,
  `supplier` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`idBK`, `idBarang`, `noPesanan`, `jumlah`, `harga`, `tanggal_keluar`, `waktu_keluar`, `total`, `supplier`) VALUES
(22, 'MMXT07', 'MO736ELAA4SAMDANID-9509947', 1, 35000, '2019-06-10', '2019-06-10 01:42:30', 35000, ''),
(23, 'BMVOY153', 'CA529ELAA5EZ8MANID-10966036', 1, 27000, '2019-06-10', '2019-06-10 01:42:30', 27000, ''),
(24, 'BMSG50', 'CA513ELAA4JDNAANID-8943077', 1, 25000, '2019-06-10', '2019-06-10 01:42:30', 25000, ''),
(25, 'BMSGP03', 'CA513ELAA4XJOIANID-9826002', 2, 26900, '2019-06-10', '2019-06-10 01:42:30', 53800, ''),
(26, 'UTXIR3S1', 'SO908ELAA5R61TANID-11822420', 1, 9000, '2019-06-10', '2019-06-10 01:42:30', 9000, ''),
(27, '1TGAZNG', 'TE615ELAA5CY9GANID-10809683', 1, 15000, '2019-06-10', '2019-06-10 01:42:30', 15000, ''),
(28, 'TGSAXA', 'TE615ELAA5W6EKANID-12350651', 1, 25000, '2019-06-10', '2019-06-10 01:42:30', 25000, ''),
(29, 'BMSGJT1', 'CA513ELAA4S9DBANID-9507937', 1, 39000, '2019-06-10', '2019-06-10 01:42:30', 39000, ''),
(30, '1BMXIR3X2', 'CA529ELAA5PEQIANID-11582073', 1, 28500, '2019-06-10', '2019-06-10 01:42:30', 28500, '');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `idBM` int(11) NOT NULL,
  `idBarang` varchar(30) NOT NULL,
  `noFaktur` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `waktu_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hargaSatuan` float NOT NULL,
  `total` float NOT NULL,
  `supplier` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`idBM`, `idBarang`, `noFaktur`, `jumlah`, `tanggal_masuk`, `waktu_masuk`, `hargaSatuan`, `total`, `supplier`) VALUES
(9, 'UTXIR3S1', '', 100, '2019-06-10', '2019-06-10 03:59:15', 5000, 500000, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`, `description`) VALUES
(1, 'Kuliner', '2019-05-30 03:05:24', '2019-05-29 22:05:24', 'Loren Ipsum dolor sit amet loren ipsum dolor sit amet Loren Ipsum dolor sit amet loren ipsum dolor sit amet Loren Ipsum dolor sit amet loren ipsum dolor sit amet Loren Ipsum dolor sit amet loren ipsum dolor sit amet Loren Ipsum dolor sit amet loren ipsum dolor sit amet Loren Ipsum dolor sit amet loren ipsum dolor sit amet Loren Ipsum dolor sit amet loren ipsum dolor sit amet Loren Ipsum dolor sit amet loren ipsum dolor sit amet Loren Ipsum dolor sit amet loren ipsum dolor sit amet Loren Ipsum dolor sit amet loren ipsum dolor sit amet Loren Ipsum dolor sit amet loren ipsum dolor sit amet '),
(2, 'Mainan', '2019-05-30 03:05:37', '2019-05-29 22:05:37', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet '),
(3, 'Aksesoris', '2019-05-30 03:05:50', '2019-05-29 22:05:50', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet '),
(4, 'Elektronik', '2019-05-29 22:06:35', '0000-00-00 00:00:00', 'loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`),
  ADD KEY `fk_kategoriBarang` (`idKategori`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`idBK`),
  ADD KEY `fk_barangKeluar` (`idBarang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`idBM`),
  ADD KEY `fk_barangMasuk` (`idBarang`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `idBK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `idBM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_kategoriBarang` FOREIGN KEY (`idKategori`) REFERENCES `category` (`id`);

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `fk_barangKeluar` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`);

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `fk_barangMasuk` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
