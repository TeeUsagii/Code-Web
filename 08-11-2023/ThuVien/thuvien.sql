-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 08:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thuvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `quanlymuon`
--

CREATE TABLE `quanlymuon` (
  `Ma_phieu` int(15) NOT NULL,
  `Ma_doc_gia` int(15) DEFAULT NULL,
  `Ma_sach` int(15) DEFAULT NULL,
  `Ngay_muon` datetime DEFAULT NULL,
  `Ngay_hen_tra` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quanlymuon`
--

INSERT INTO `quanlymuon` (`Ma_phieu`, `Ma_doc_gia`, `Ma_sach`, `Ngay_muon`, `Ngay_hen_tra`) VALUES
(1, 2003, 123, '2023-11-09 00:00:00', '2023-11-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quanlytra`
--

CREATE TABLE `quanlytra` (
  `Ma_phieu` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quanlymuon`
--
ALTER TABLE `quanlymuon`
  ADD PRIMARY KEY (`Ma_phieu`);

--
-- Indexes for table `quanlytra`
--
ALTER TABLE `quanlytra`
  ADD PRIMARY KEY (`Ma_phieu`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `quanlytra`
--
ALTER TABLE `quanlytra`
  ADD CONSTRAINT `quanlytra_ibfk_1` FOREIGN KEY (`Ma_phieu`) REFERENCES `quanlymuon` (`Ma_phieu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
