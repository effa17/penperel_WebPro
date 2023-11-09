-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 09, 2023 at 07:03 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penperel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(12) NOT NULL,
  `kata` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `kata`) VALUES
(1, 'aina');

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `idpelajar` int(12) NOT NULL,
  `warden` varchar(50) NOT NULL,
  `namapelajar` varchar(100) NOT NULL,
  `nokppelajar` varchar(12) NOT NULL,
  `kata` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`idpelajar`, `warden`, `namapelajar`, `nokppelajar`, `kata`) VALUES
(1, 'effa', 'elvin', '031922020089', 'elvin');

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `idperalatan` int(20) NOT NULL,
  `pelajar` varchar(250) NOT NULL,
  `jenisperalatan` varchar(80) NOT NULL,
  `jenama` varchar(50) NOT NULL,
  `nosiri` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`idperalatan`, `pelajar`, `jenisperalatan`, `jenama`, `nosiri`) VALUES
(1, 'elvin', 'kipas meja', 'penasonic', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `warden`
--

CREATE TABLE `warden` (
  `idwarden` int(12) NOT NULL,
  `namawarden` varchar(100) NOT NULL,
  `nokpwarden` varchar(12) NOT NULL,
  `kata` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warden`
--

INSERT INTO `warden` (`idwarden`, `namawarden`, `nokpwarden`, `kata`) VALUES
(1, 'effa', '030519020022', 'effa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`idpelajar`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`idperalatan`);

--
-- Indexes for table `warden`
--
ALTER TABLE `warden`
  ADD PRIMARY KEY (`idwarden`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelajar`
--
ALTER TABLE `pelajar`
  MODIFY `idpelajar` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warden`
--
ALTER TABLE `warden`
  MODIFY `idwarden` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
