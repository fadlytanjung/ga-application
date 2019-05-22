-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 12:07 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
('B-1', 'Coki Coki', 100, 50, 40, 'FM'),
('B-2', 'Indomie', 95, 60, 40, 'FM');

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
('RK-1', 180, 170, 170, 'FM'),
('RK-2', 4, 6, 7, 'SM'),
('RK-3', 6, 6, 6, 'SM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ga_stok`
--

CREATE TABLE `tbl_ga_stok` (
  `id_stok` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ga_stok`
--

INSERT INTO `tbl_ga_stok` (`id_stok`, `tanggal_masuk`, `jam`) VALUES
('5', '2019-01-01', '15:00:00'),
('51305849-7c64-11e9-96d7-88d7f656c446', '2019-10-10', '10:10:00'),
('6', '2019-01-01', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ga_stok_detail`
--

CREATE TABLE `tbl_ga_stok_detail` (
  `stok_detail_id` int(11) NOT NULL,
  `id_stok` varchar(100) NOT NULL,
  `id_barang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ga_stok_detail`
--

INSERT INTO `tbl_ga_stok_detail` (`stok_detail_id`, `id_stok`, `id_barang`, `jumlah`) VALUES
(1, '51305849-7c64-11e9-96d7-88d7f656c446', 'B-1', 100),
(2, '51305849-7c64-11e9-96d7-88d7f656c446', 'B-2', 50);

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
  MODIFY `stok_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ga_stok_rak`
--
ALTER TABLE `tbl_ga_stok_rak`
  MODIFY `stok_rak_id` int(20) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `tbl_ga_stok_detail_ibfk_4` FOREIGN KEY (`id_stok`) REFERENCES `tbl_ga_stok` (`id_stok`);

--
-- Constraints for table `tbl_ga_stok_rak`
--
ALTER TABLE `tbl_ga_stok_rak`
  ADD CONSTRAINT `tbl_ga_stok_rak_ibfk_1` FOREIGN KEY (`stok_detail_id`) REFERENCES `tbl_ga_stok_detail` (`stok_detail_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
