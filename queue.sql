-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2020 at 05:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `queue`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `shopName` varchar(100) NOT NULL,
  `shopCategory` varchar(50) NOT NULL,
  `shopOpen` varchar(20) NOT NULL,
  `shopClose` varchar(20) NOT NULL,
  `timePerCustomer` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `shopAddress` varchar(1000) NOT NULL,
  `shopImage` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `userName`, `password`, `shopName`, `shopCategory`, `shopOpen`, `shopClose`, `timePerCustomer`, `country`, `city`, `shopAddress`, `shopImage`) VALUES
(7, 'Aman', '12345', 'baking', '', '18:24', '18:24', 13, 'USA', 'lahore', 'xdfgvzdsgvdzf', ''),
(11, 'ali', '12345', 'sdfcds', '', '18:32', '18:32', 8, 'pakistan', 'lahore', '990 umar block bahria town lahore', 'ali.png'),
(12, 'bilal', '12345', 'hub mart', '', '18:43', '18:43', 5, 'usa', 'lahore', 'lkhnlknlk', NULL),
(13, 'majid', '12345', 'pop', 'clinic', '18:52', '18:52', 10, 'pakistan', 'lahore', 'dsfsdgfdsgfsd', 'majid.png'),
(14, 'bilaldsfds', '12345', 'sdfcds', 'bank', '19:02', '19:02', 7, 'pakistan', 'lahore', 'dgfdzg', NULL),
(15, 'bilalgxfhgfh', '12345', 'mall', 'bank', '19:03', '19:03', 5, 'pakistan', 'lahore', '990 umar block bahria town lahorfdgfe', NULL),
(16, 'bilalfdx', '12345', 'fdzfdbv', 'bank', '19:03', '21:00', 55, 'pakistan', 'lahore', '990 umar block bahria towrfgfxdgfn lahore', NULL),
(17, 'knd', '12345', 'kalala', 'bank', '09:00', '18:08', 5, 'pakistan', 'lahore', 'dxgvfxbgf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `shop` int(11) NOT NULL,
  `tokenNumber` int(11) NOT NULL,
  `phoneCustomer` varchar(50) NOT NULL,
  `nameCustomer` varchar(100) NOT NULL,
  `validDate` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `shop`, `tokenNumber`, `phoneCustomer`, `nameCustomer`, `validDate`, `time`, `status`) VALUES
(4, 17, 1327930562, '304-461-4400', 'Khubaib', '2020-05-26', '9:30', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop` (`shop`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `token_ibfk_1` FOREIGN KEY (`shop`) REFERENCES `shop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
