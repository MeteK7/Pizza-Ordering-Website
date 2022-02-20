-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2022 at 03:35 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza_ordering_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `username`, `password`, `address`) VALUES
(1, 'Mete', '12345', 'Hatay'),
(2, 'Omid', '', 'Mersin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history_sale`
--

DROP TABLE IF EXISTS `tbl_history_sale`;
CREATE TABLE IF NOT EXISTS `tbl_history_sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_customer` (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pizza`
--

DROP TABLE IF EXISTS `tbl_pizza`;
CREATE TABLE IF NOT EXISTS `tbl_pizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price_small` decimal(10,2) NOT NULL,
  `price_medium` decimal(10,2) NOT NULL,
  `price_large` decimal(10,2) NOT NULL,
  `availability` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_region`
--

DROP TABLE IF EXISTS `tbl_region`;
CREATE TABLE IF NOT EXISTS `tbl_region` (
  `id_region` int(11) NOT NULL AUTO_INCREMENT,
  `name_region` varchar(100) NOT NULL,
  `time_estimated` int(11) NOT NULL,
  UNIQUE KEY `id_region` (`id_region`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_region`
--

INSERT INTO `tbl_region` (`id_region`, `name_region`, `time_estimated`) VALUES
(1, 'Toros University', 10),
(2, 'Pozcu', 20),
(3, 'Mezitli', 30),
(4, 'Others', 45);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_history_sale`
--
ALTER TABLE `tbl_history_sale`
  ADD CONSTRAINT `tbl_history_sale_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
