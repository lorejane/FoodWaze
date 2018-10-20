-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2018 at 10:07 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodwaze`
--
CREATE DATABASE IF NOT EXISTS `foodwaze` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `foodwaze`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryId` int(10) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) NOT NULL,
  PRIMARY KEY (`CategoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Truncate table before insert `category`
--

TRUNCATE TABLE `category`;
--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`) VALUES
(1, 'Meal'),
(2, 'Pasta'),
(3, 'Dessert'),
(4, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `Lastname` varchar(50) NOT NULL,
  `EmployeeAccount` varchar(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `PositionId` int(11) NOT NULL,
  `StallId` int(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `EmployeeId` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`EmployeeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Truncate table before insert `employee`
--

TRUNCATE TABLE `employee`;
--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Lastname`, `EmployeeAccount`, `Firstname`, `PositionId`, `StallId`, `Password`, `EmployeeId`) VALUES
('', 'admin', '', 1, 0, 'admin', 1),
('stark', 'arya', 'masie', 3, 1, '123', 2),
('', 'lyn', '', 2, 1, '123', 3),
('', 'lore', '', 3, 1, 'lore', 4),
('', 'admin2', '', 1, 0, '123', 5);

-- --------------------------------------------------------

--
-- Table structure for table `foodcourt`
--

DROP TABLE IF EXISTS `foodcourt`;
CREATE TABLE IF NOT EXISTS `foodcourt` (
  `FoodcourtId` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`FoodcourtId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `foodcourt`
--

TRUNCATE TABLE `foodcourt`;
-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `MenuId` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `StallId` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `CategoryId` int(10) NOT NULL,
  PRIMARY KEY (`MenuId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Truncate table before insert `menu`
--

TRUNCATE TABLE `menu`;
--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuId`, `Name`, `StallId`, `Price`, `CategoryId`) VALUES
(1, 'Spaghetti', 1, 85, 2),
(2, 'Chickenw/Rice', 1, 105, 1),
(3, 'Carbonara', 1, 95, 2),
(4, 'Coca Cola', 1, 35, 4);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `OrderId` int(11) NOT NULL AUTO_INCREMENT,
  `StallId` int(11) NOT NULL,
  `Name` int(11) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `order`
--

TRUNCATE TABLE `order`;
-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `OrderId` int(10) NOT NULL,
  `MenuId` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `orderdetails`
--

TRUNCATE TABLE `orderdetails`;
-- --------------------------------------------------------

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
CREATE TABLE IF NOT EXISTS `position` (
  `PositionId` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `position`
--

TRUNCATE TABLE `position`;
--
-- Dumping data for table `position`
--

INSERT INTO `position` (`PositionId`, `Name`) VALUES
(2, 'Manager'),
(3, 'Cashier'),
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `stall`
--

DROP TABLE IF EXISTS `stall`;
CREATE TABLE IF NOT EXISTS `stall` (
  `StallId` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`StallId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `stall`
--

TRUNCATE TABLE `stall`;
--
-- Dumping data for table `stall`
--

INSERT INTO `stall` (`StallId`, `Name`) VALUES
(1, 'Lydia''s'),
(2, 'Kkimbop');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
