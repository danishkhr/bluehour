-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 08:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `idmakanan` varchar(3) NOT NULL,
  `namamakanan` varchar(20) DEFAULT NULL,
  `gambar` varchar(20) DEFAULT NULL,
  `harga` double(6,2) DEFAULT NULL,
  `idpenjual` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`idmakanan`, `namamakanan`, `gambar`, `harga`, `idpenjual`) VALUES
('K01', 'Bibimbap', 'K01.png', 15.50, 'U01'),
('K02', 'Ramen', 'K02.png', 10.00, 'U02'),
('K03', 'Kimbap', 'K03.png', 8.90, 'U01'),
('K04', 'Tteokbokki', 'K04.png', 13.00, 'U02');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` varchar(4) NOT NULL,
  `katakunci` varchar(8) DEFAULT NULL,
  `namapelanggan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `katakunci`, `namapelanggan`) VALUES
('S001', 'd505', 'Alex'),
('S002', 'd553', 'Loren'),
('S003', 'd444', 'Frank'),
('S004', 'S006', 'AINN');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `idpenjual` varchar(3) NOT NULL,
  `katakunci` varchar(8) DEFAULT NULL,
  `namapenjual` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`idpenjual`, `katakunci`, `namapenjual`) VALUES
('U01', 'm553', 'Jake'),
('U02', 'n127', 'Jay'),
('U03', 'W00', 'Eshan');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `idpelanggan` varchar(4) NOT NULL,
  `idmakanan` varchar(3) NOT NULL,
  `tarikh` date NOT NULL,
  `kuantiti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`idpelanggan`, `idmakanan`, `tarikh`, `kuantiti`) VALUES
('S001', 'K01', '2025-05-19', 1),
('S001', 'K03', '2025-05-19', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`idmakanan`),
  ADD KEY `idpenjual` (`idpenjual`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`idpenjual`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idpelanggan`,`idmakanan`,`tarikh`),
  ADD KEY `idpelanggan` (`idpelanggan`),
  ADD KEY `idmakanan` (`idmakanan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `makanan`
--
ALTER TABLE `makanan`
  ADD CONSTRAINT `makanan_penjual` FOREIGN KEY (`idpenjual`) REFERENCES `penjual` (`idpenjual`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_makanan` FOREIGN KEY (`idmakanan`) REFERENCES `makanan` (`idmakanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_pelanggan` FOREIGN KEY (`idpelanggan`) REFERENCES `pelanggan` (`idpelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
