-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2014 at 06:27 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlinestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `last_login_date` date NOT NULL,
  `full_name` varchar(90) NOT NULL,
  `email` varchar(55) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `last_login_date`, `full_name`, `email`, `contact`, `address`) VALUES
(1, 'Admin', '123456', '2014-06-07', 'Laxman Adhikari', 'tekrajchhetri@gmail.com', '8978387126', 'Haraicha-3, Morang, Koshi, Nepal'),
(2, 'tekraj', '654321', '2014-06-06', 'Tek Raj Chhetri', 'tekrajchhetri@yahoo.com', '9842239607', 'Indrapur-8, Buddhabare\r\nMorang, Koshi, Nepal');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `userID` int(11) NOT NULL,
  `orderID` varchar(16) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `desc` longtext NOT NULL,
  `unitp` varchar(10) NOT NULL,
  `qty` varchar(5) NOT NULL,
  `totalp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `subcategory` varchar(55) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `price` varchar(30) NOT NULL,
  `detail` text NOT NULL,
  `location` varchar(40) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `category`, `subcategory`, `currency`, `price`, `detail`, `location`, `date_added`) VALUES
(7, 'Canon CXC153', 'Cameras & Photo', 'CAMERA', 'IRs', '2500', 'This is a camera by Canon with latest features.\r\nFeatures:\r\n16 Mpixel camera\r\n4X zoom\r\nGps \r\nWifi control ', 'Biratchowk', '2014-06-21'),
(11, 'Vax Super Computer', 'Computers', 'Super Computer', 'IRs', '10000', 'It is a vector super computer that is capable of<br>\r\nperforming 32 bit integer as well as 64 bit floating point operations.', 'Itehari', '2014-06-21'),
(13, 'Pen drive', 'Electronics', 'Sony optical technology ', '$', '5', 'This is a new pen drive with size 8 GB. It has a warranty of 3 years.', 'Biratnagar', '2014-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(55) DEFAULT NULL,
  `price` varchar(40) DEFAULT NULL,
  `details` text,
  `category` varchar(30) DEFAULT NULL,
  `subcategory` varchar(34) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `product_name` (`product_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `details`, `category`, `subcategory`) VALUES
(5, 'aksdfjak', '422', 'kjflask', 'Clothing', 'Pants');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE IF NOT EXISTS `shipping` (
  `name` varchar(28) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `address` longtext NOT NULL,
  `pin` int(11) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `uid` int(11) NOT NULL,
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`name`, `tel`, `address`, `pin`, `country`, `state`, `city`, `uid`) VALUES
('TEKRAJ', '8978387126', 'SSNCOLLEGEOFENGINEERINGANDTEHNOLOGY', 523001, 'INDIA', 'ANDHRAPRADESH', 'ONGOLE', 1),
('RAM CHHETRI', '9703965039', 'SSN COLLEGE OF ENGINEERING ANDT ECHNOLOGY', 523001, 'INDIA', 'AP', 'ONGOLE', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id_array` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `mc_gross` varchar(255) NOT NULL,
  `payment_currency` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `txn_type` varchar(255) NOT NULL,
  `payer_status` varchar(255) NOT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_city` varchar(255) NOT NULL,
  `address_state` varchar(255) NOT NULL,
  `address_zip` varchar(255) NOT NULL,
  `address_country` varchar(255) NOT NULL,
  `address_status` varchar(255) NOT NULL,
  `notify_version` varchar(255) NOT NULL,
  `verify_sign` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `mc_currency` varchar(255) NOT NULL,
  `mc_fee` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `txn_id` (`txn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `full_name` varchar(55) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(55) NOT NULL,
  `profile_added` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `password`, `full_name`, `contact`, `address`, `email`, `profile_added`) VALUES
(1, 'tekraj', 'laxman', 'Laxman Adhikari', '9842239607', 'Indrapur-8, buddhabare, Morang , Nepal', 'tekrajchhetri@gmail.com', 1),
(2, 'Ram', 'ramchhetri', 'RamAdhikari', '21546636', 'Indrapur-8  Biratchowk  Morang   Nepal', 'ramu@gmail.com', 1),
(6, 'Dorjee', '12345678', 'Dorjeewangdi', '8764532165', 'SSN COLLEGE OF ENGINEERING AND TECHNOLOGY  ONGOLE', 'dorje@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `uid` int(11) NOT NULL,
  `user_id` varchar(55) NOT NULL,
  `wish_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`uid`, `user_id`, `wish_id`, `pid`) VALUES
(1, 'tekraj', 1, 11),
(1, 'tekraj', 1, 13),
(1, 'tekraj', 1, 12),
(2, 'ram', 1, 12),
(2, 'ram', 1, 13),
(2, 'ram', 1, 11),
(1, 'tekraj', 1, 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
