-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 30, 2019 at 03:19 AM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaapplication`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ga_barang`
--

CREATE TABLE `tbl_ga_barang` (
  `id_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `panjang` int(10) NOT NULL,
  `lebar` int(10) NOT NULL,
  `tinggi` int(10) NOT NULL,
  `type` enum('FM','SM') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ga_barang`
--

INSERT INTO `tbl_ga_barang` (`id_barang`, `nama_barang`, `panjang`, `lebar`, `tinggi`, `type`) VALUES
('B-1', 'Pottatoes', 23, 50, 100, 'FM'),
('B-2', 'Ikan Gurami', 10, 15, 10, 'FM'),
('B-3', 'Indomie', 20, 50, 15, 'SM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ga_barang_keluar`
--

CREATE TABLE `tbl_ga_barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `stok_rak_id` int(20) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ga_rak`
--

CREATE TABLE `tbl_ga_rak` (
  `id_rak` varchar(100) NOT NULL,
  `panjang` int(100) NOT NULL,
  `lebar` int(100) NOT NULL,
  `tinggi` int(100) NOT NULL,
  `zona` enum('FM','SM') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ga_rak`
--

INSERT INTO `tbl_ga_rak` (`id_rak`, `panjang`, `lebar`, `tinggi`, `zona`) VALUES
('RK-1', 400, 300, 500, 'FM'),
('RK-2', 800, 600, 700, 'SM'),
('RK-3', 300, 200, 200, 'FM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ga_stok`
--

CREATE TABLE `tbl_ga_stok` (
  `id_stok` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ga_stok_detail`
--

CREATE TABLE `tbl_ga_stok_detail` (
  `stok_detail_id` int(11) NOT NULL,
  `id_stok` varchar(100) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ga_stok_rak`
--

CREATE TABLE `tbl_ga_stok_rak` (
  `stok_rak_id` int(20) NOT NULL,
  `stok_detail_id` int(11) NOT NULL,
  `id_rak` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ga_barang`
--
ALTER TABLE `tbl_ga_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tbl_ga_barang_keluar`
--
ALTER TABLE `tbl_ga_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_stok` (`stok_rak_id`);

--
-- Indexes for table `tbl_ga_rak`
--
ALTER TABLE `tbl_ga_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tbl_ga_stok`
--
ALTER TABLE `tbl_ga_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `tbl_ga_stok_detail`
--
ALTER TABLE `tbl_ga_stok_detail`
  ADD PRIMARY KEY (`stok_detail_id`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_stok` (`id_stok`);

--
-- Indexes for table `tbl_ga_stok_rak`
--
ALTER TABLE `tbl_ga_stok_rak`
  ADD PRIMARY KEY (`stok_rak_id`),
  ADD KEY `rak_id` (`id_rak`),
  ADD KEY `stok_detail_id` (`stok_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ga_barang_keluar`
--
ALTER TABLE `tbl_ga_barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ga_stok_detail`
--
ALTER TABLE `tbl_ga_stok_detail`
  MODIFY `stok_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tbl_ga_stok_rak`
--
ALTER TABLE `tbl_ga_stok_rak`
  MODIFY `stok_rak_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_ga_barang_keluar`
--
ALTER TABLE `tbl_ga_barang_keluar`
  ADD CONSTRAINT `tbl_ga_barang_keluar_ibfk_1` FOREIGN KEY (`stok_rak_id`) REFERENCES `tbl_ga_stok_rak` (`stok_rak_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_ga_stok_detail`
--
ALTER TABLE `tbl_ga_stok_detail`
  ADD CONSTRAINT `tbl_ga_stok_detail_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `tbl_ga_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_ga_stok_detail_ibfk_4` FOREIGN KEY (`id_stok`) REFERENCES `tbl_ga_stok` (`id_stok`) ON DELETE CASCADE;

--
-- Constraints for table `tbl_ga_stok_rak`
--
ALTER TABLE `tbl_ga_stok_rak`
  ADD CONSTRAINT `tbl_ga_stok_rak_ibfk_1` FOREIGN KEY (`stok_detail_id`) REFERENCES `tbl_ga_stok_detail` (`stok_detail_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
