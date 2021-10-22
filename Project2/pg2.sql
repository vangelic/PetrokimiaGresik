-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 10:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pg2`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_alat`
--

CREATE TABLE `daftar_alat` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(256) COLLATE utf8_bin NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `qr` varchar(256) COLLATE utf8_bin NOT NULL,
  `id_pinjam` int(11) DEFAULT NULL,
  `kondisi` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `daftar_alat`
--

INSERT INTO `daftar_alat` (`id_alat`, `nama_alat`, `id_kategori`, `qr`, `id_pinjam`, `kondisi`) VALUES
(1, 'Mikroskop1', 1, 'Mikroskop1.png', NULL, NULL),
(2, 'Mikroskop2', 1, 'Mikroskop2.png', NULL, NULL),
(3, 'Oven1', 2, 'Oven1.png', NULL, NULL),
(4, 'Oven2', 2, 'Oven2.png', NULL, NULL),
(5, 'Microwave1', 3, 'Microwave1.png', NULL, NULL),
(6, 'Oven3', 2, 'Oven3.png', NULL, NULL),
(7, 'Oven4', 2, 'Oven4.png', NULL, NULL),
(8, 'Pengering1', 4, 'Pengering1.png', NULL, NULL),
(9, 'Pengering2', 4, 'Pengering2.png', NULL, NULL),
(10, 'Pengering3', 4, 'Pengering3.png', NULL, NULL),
(11, 'Mikroskop3', 1, 'Mikroskop3.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_alat` int(11) NOT NULL,
  `checkin` timestamp NOT NULL DEFAULT current_timestamp(),
  `checkout` timestamp NULL DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `review` text COLLATE utf8_bin DEFAULT NULL,
  `rekan` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id_history`, `id_alat`, `checkin`, `checkout`, `id_user`, `review`, `rekan`) VALUES
(4, 10, '2021-10-22 01:03:18', '2021-10-22 01:04:07', 3, 'lagi', ''),
(5, 7, '2021-10-22 01:03:26', '2021-10-22 01:03:39', 3, 'ye', ''),
(6, 7, '2021-10-22 01:03:58', '2021-10-22 01:04:14', 3, 'ye lagi', ''),
(7, 11, '2021-10-22 03:20:09', '2021-10-22 03:20:20', 3, 'hbjnkm', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `nama_kategori` varchar(256) COLLATE utf8_bin NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`nama_kategori`, `jumlah`, `id_kategori`) VALUES
('Mikroskop', 3, 1),
('Oven', 4, 2),
('Microwave', 1, 3),
('Pengering', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nik` varchar(64) COLLATE utf8_bin NOT NULL,
  `nama` varchar(64) COLLATE utf8_bin NOT NULL,
  `email` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nik`, `nama`, `email`, `password`) VALUES
(1, 'admin', ' ', NULL, 'a0c7fa805e565d90b90b85334de8df6ece8c2803cb69a2774fcee576571180f2'),
(2, 'paa', 'Iffatusy Syaharani', 'ivfatusy@gmail.com', '468c6b2126c84670f3ef26217588d027c869fe771e76d2582aa5b17ec22169a7'),
(3, 'oke', 'Iffatusy Syaharani', 'ivfatusy@gmail.com', 'b13c0ea15587743a7971f9266557adce3406f98ddaf51d03c29de255eae16606'),
(4, 'coba', 'Iffatusy Syaharani', 'ivfatusy@gmail.com', '132e80d3caf4e1327ff9ad906aa5084ebdc5e625088b9133fcef2e38a58206cc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_alat`
--
ALTER TABLE `daftar_alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_alat`
--
ALTER TABLE `daftar_alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
