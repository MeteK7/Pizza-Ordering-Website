-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2022 at 08:58 PM
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
  `id` int(11) NOT NULL,
  `price_min` decimal(10,0) NOT NULL,
  `price_max` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history_order`
--

DROP TABLE IF EXISTS `tbl_history_order`;
CREATE TABLE IF NOT EXISTS `tbl_history_order` (
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
  `time_estimated` int(11) NOT NULL,
  UNIQUE KEY `id_region` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_region`
--

INSERT INTO `tbl_region` (`id`, `name`, `time_estimated`) VALUES
(1, 'Toros University', 10),
(2, 'Pozcu', 20),
(3, 'Mezitli', 30),
(4, 'Others', 45);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_history_order`
--
ALTER TABLE `tbl_history_order`
  ADD CONSTRAINT `tbl_history_order_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tbl_customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
