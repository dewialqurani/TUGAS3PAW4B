-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 04:01 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dewi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_014`
--

CREATE TABLE `tbl_014` (
  `id` int(6) NOT NULL,
  `matakuliah` varchar(20) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `w/p` varchar(2) NOT NULL,
  `sks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_014`
--

INSERT INTO `tbl_014` (`id`, `matakuliah`, `nama_dosen`, `kelas`, `w/p`, `sks`) VALUES
(1, 'BASIS DATA II', 'KURNIAWAN EKA PERMANA,S.Kom.,M', 'IF 4D', 'W', 4),
(2, 'GRAFIKA KOMPUTER', 'ACH.DAFID,ST.,MT.', 'IF 4D', 'W', 3),
(3, 'IMK', 'DONI ABDUL FATAH,S.Kom.,M.Kom', 'IF 4F', 'W', 3),
(4, 'PAW', 'ACH.KHOZAIMI,S.Kom.,M.Kom', 'IF 4B', 'W', 4),
(5, 'RPL', 'ACHMAD JAUHARI,S.T.,M.Kom', 'IF 4A', 'W', 3),
(6, 'STRATEGI ALGORITMA', 'BAIN KHUSNUL KHOTIMAH,S.T.,M.K', 'IF 4B', 'W', 3),
(7, 'PANCASILA', 'SANTI RIMA MELATI,SH.,MH.', 'IF 4C', 'W', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_014`
--
ALTER TABLE `tbl_014`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_014`
--
ALTER TABLE `tbl_014`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
