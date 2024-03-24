-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2017 at 08:57 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_db`
--
CREATE DATABASE IF NOT EXISTS `booking_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `booking_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `fullname` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(40) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `email` varchar(140) DEFAULT NULL,
  `username` varchar(70) DEFAULT NULL,
  `password` varchar(130) DEFAULT NULL,
  PRIMARY KEY (`fullname`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `available_class`
--

DROP TABLE IF EXISTS `available_class`;
CREATE TABLE IF NOT EXISTS `available_class` (
  `class_id` varchar(120) NOT NULL,
  `class_name` varchar(80) NOT NULL,
  `class_capacity` smallint(6) NOT NULL DEFAULT '0',
  `class_price` double NOT NULL DEFAULT '10',
  `description` longtext,
  PRIMARY KEY (`class_id`,`class_name`),
  UNIQUE KEY `class_name` (`class_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

DROP TABLE IF EXISTS `booking_details`;
CREATE TABLE IF NOT EXISTS `booking_details` (
  `order_ref` varchar(255) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `contact` varchar(40) DEFAULT NULL,
  `gender` varchar(40) DEFAULT NULL,
  `class_reserved` varchar(255) NOT NULL,
  `destination` varchar(180) NOT NULL,
  `seats_reserved` varchar(50) NOT NULL DEFAULT '1',
  `date_reserved` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(190) NOT NULL,
  `account` varchar(130) NOT NULL,
  `amount` varchar(50) NOT NULL,
  PRIMARY KEY (`order_ref`),
  KEY `available_classbooking_details` (`class_reserved`),
  KEY `transaction_id` (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`order_ref`, `fullname`, `contact`, `gender`, `class_reserved`, `destination`, `seats_reserved`, `date_reserved`, `transaction_id`, `account`, `amount`) VALUES
('RA84O43T53E', 'George Wainaina Njeri', '0705481696', 'MALE', 'Middle Class Travel', 'MOMBASA to NAKURU', '1', 'November 30, 2017', '38329432422', 'MPESA', '52.03'),
('BE19O27T62R', 'Samuel Kumano', '0342423', 'MALE', 'Middle Class Travel', 'NAKURU to MOMBASA', '1', 'December 07, 2017', '807678678', 'KCD_BANK', '52.03');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_generated`
--

DROP TABLE IF EXISTS `tickets_generated`;
CREATE TABLE IF NOT EXISTS `tickets_generated` (
  `ticket_ref` varchar(120) NOT NULL,
  `order_ref` varchar(120) NOT NULL,
  `travel_class` varchar(255) NOT NULL,
  `date_processed` datetime DEFAULT NULL,
  `destination` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`ticket_ref`),
  KEY `available_classtickets_generated` (`travel_class`),
  KEY `booking_detailstickets_generated` (`order_ref`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `amount` double DEFAULT '0',
  `payment_via` varchar(180) DEFAULT NULL,
  `transaction_id` varchar(210) NOT NULL,
  `status` varchar(80) DEFAULT 'unused',
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`amount`, `payment_via`, `transaction_id`, `status`) VALUES
(7500, 'MPESA', 'LORSO93045KWE', 'used');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
