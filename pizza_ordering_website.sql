-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2022 at 10:42 AM
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
-- Table structure for table `tbl_beverage`
--

DROP TABLE IF EXISTS `tbl_beverage`;
CREATE TABLE IF NOT EXISTS `tbl_beverage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price_small` decimal(10,2) NOT NULL,
  `price_medium` decimal(10,2) NOT NULL,
  `price_large` decimal(10,2) NOT NULL,
  `availability` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_beverage`
--

INSERT INTO `tbl_beverage` (`id`, `name`, `price_small`, `price_medium`, `price_large`, `availability`) VALUES
(1, 'Water', '2.00', '4.00', '5.50', 100),
(2, 'Cola', '4.00', '6.00', '7.50', 100),
(3, 'Beer', '6.00', '8.00', '9.50', 100),
(4, 'Ayran', '3.00', '5.00', '6.50', 100),
(5, 'Tea', '4.00', '6.00', '7.50', 100),
(6, 'Coffee', '4.00', '6.00', '7.50', 100);

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
-- Table structure for table `tbl_dessert`
--

DROP TABLE IF EXISTS `tbl_dessert`;
CREATE TABLE IF NOT EXISTS `tbl_dessert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price_small` decimal(10,2) NOT NULL,
  `price_medium` decimal(10,2) NOT NULL,
  `price_large` decimal(10,2) NOT NULL,
  `availability` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dessert`
--

INSERT INTO `tbl_dessert` (`id`, `name`, `price_small`, `price_medium`, `price_large`, `availability`) VALUES
(1, 'Apple Pie', '2.00', '4.00', '5.50', 100),
(2, 'Chocolate Cake', '4.00', '6.00', '7.50', 100),
(3, 'Banana Pudding', '6.00', '8.00', '9.50', 100),
(4, 'Ice Cream', '3.00', '5.00', '6.50', 100),
(5, 'Cookie', '4.00', '6.00', '7.50', 100),
(6, 'Stroopwafel', '4.00', '6.00', '7.50', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount_rate`
--

DROP TABLE IF EXISTS `tbl_discount_rate`;
CREATE TABLE IF NOT EXISTS `tbl_discount_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price_min` decimal(10,2) DEFAULT NULL,
  `price_max` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_discount_rate`
--

INSERT INTO `tbl_discount_rate` (`id`, `price_min`, `price_max`, `discount`) VALUES
(2, '50.00', '50.00', '10.00'),
(3, '51.00', '70.00', '15.00'),
(4, '70.00', NULL, '20.00'),
(1, '0.00', '49.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history_order`
--

DROP TABLE IF EXISTS `tbl_history_order`;
CREATE TABLE IF NOT EXISTS `tbl_history_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `grand_total_gross_price` decimal(10,2) NOT NULL,
  `grand_total_price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_customer` (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `name`) VALUES
(1, 'Pizza'),
(2, 'Beverage'),
(3, 'Dessert');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pizza`
--

INSERT INTO `tbl_pizza` (`id`, `name`, `price_small`, `price_medium`, `price_large`, `availability`) VALUES
(1, 'Vegetarian Pizza', '15.00', '17.00', '20.00', 100),
(2, 'Chicken Pizza', '18.00', '20.00', '22.00', 100),
(3, 'Meat Pizza', '18.00', '20.00', '22.00', 100),
(4, 'Pepperoni Pizza', '19.00', '21.00', '23.00', 100),
(5, 'Mix Pizza', '20.00', '22.00', '24.00', 100),
(6, 'COME308 Special Pizza', '22.00', '23.00', '26.00', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_region`
--

DROP TABLE IF EXISTS `tbl_region`;
CREATE TABLE IF NOT EXISTS `tbl_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `id_time_estimated` int(11) NOT NULL,
  `id_time_unit` int(11) NOT NULL,
  UNIQUE KEY `id_region` (`id`),
  KEY `id_time_estimated` (`id_time_estimated`),
  KEY `id_time_unit` (`id_time_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_region`
--

INSERT INTO `tbl_region` (`id`, `name`, `id_time_estimated`, `id_time_unit`) VALUES
(1, 'Toros University', 2, 2),
(2, 'Pozcu', 4, 2),
(3, 'Mezitli', 6, 2),
(4, 'Others', 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_estimated`
--

DROP TABLE IF EXISTS `tbl_time_estimated`;
CREATE TABLE IF NOT EXISTS `tbl_time_estimated` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_time_estimated`
--

INSERT INTO `tbl_time_estimated` (`id`, `time`) VALUES
(1, '5.00'),
(2, '10.00'),
(3, '15.00'),
(4, '20.00'),
(5, '25.00'),
(6, '30.00'),
(7, '35.00'),
(8, '40.00'),
(9, '45.00'),
(10, '50.00'),
(11, '55.00'),
(12, '60.00'),
(13, '65.00'),
(14, '70.00'),
(15, '75.00'),
(16, '80.00'),
(17, '85.00'),
(18, '90.00'),
(19, '95.00'),
(20, '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time_unit`
--

DROP TABLE IF EXISTS `tbl_time_unit`;
CREATE TABLE IF NOT EXISTS `tbl_time_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_time_unit`
--

INSERT INTO `tbl_time_unit` (`id`, `name`) VALUES
(1, 'second(s)'),
(2, 'min(s)'),
(3, 'hour(s)');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_history_order`
--
ALTER TABLE `tbl_history_order`
  ADD CONSTRAINT `tbl_history_order_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id`);

--
-- Constraints for table `tbl_region`
--
ALTER TABLE `tbl_region`
  ADD CONSTRAINT `tbl_region_ibfk_1` FOREIGN KEY (`id_time_estimated`) REFERENCES `tbl_time_estimated` (`id`),
  ADD CONSTRAINT `tbl_region_ibfk_2` FOREIGN KEY (`id_time_unit`) REFERENCES `tbl_time_unit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
