-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 05:50 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

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

CREATE TABLE IF NOT EXISTS `employee` (
  `Lastname` varchar(50) NOT NULL,
  `EmployeeAccount` varchar(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `PositionId` int(11) NOT NULL,
  `StallId` int(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `EmployeeId` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`EmployeeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Truncate table before insert `employee`
--

TRUNCATE TABLE `employee`;
--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Lastname`, `EmployeeAccount`, `Firstname`, `PositionId`, `StallId`, `Password`, `EmployeeId`) VALUES
('reyes', 'elljhayy', 'lore', 2, 1, '123', 60),
('lolo', 'admin', 'mo', 1, 0, 'admin', 61),
('stark', 'arya', 'arya', 3, 3, '123', 62),
('jane', 'sansa', 'lore', 3, 2, '123', 63),
('condor', 'lana', 'lana', 3, 1, '123', 64);

-- --------------------------------------------------------

--
-- Table structure for table `foodcourt`
--

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

CREATE TABLE IF NOT EXISTS `menu` (
  `MenuId` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `StallId` int(10) NOT NULL,
  `Price` int(11) NOT NULL,
  `CategoryId` int(10) NOT NULL,
  PRIMARY KEY (`MenuId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Truncate table before insert `menu`
--

TRUNCATE TABLE `menu`;
--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuId`, `Name`, `StallId`, `Price`, `CategoryId`) VALUES
(1, 'Spaghetti', 1, 100, 2),
(3, 'Carbonara', 1, 95, 2),
(4, 'Coca Cola', 1, 35, 4),
(5, 'Sprite', 1, 45, 4),
(6, 'Royal', 1, 45, 4),
(7, 'Pinapple Juice', 1, 50, 4),
(9, 'Iced Tea', 1, 50, 4),
(11, 'Palabok', 2, 85, 2),
(12, 'Halo-halo', 2, 65, 3),
(13, 'Gulaman', 2, 50, 4),
(14, 'Bottled Water', 1, 35, 4),
(15, 'Buko Juice', 2, 30, 4),
(16, 'Pepsi', 1, 45, 4),
(18, 'Orange Juice', 1, 45, 4),
(19, 'Slush', 1, 45, 4),
(20, 'Coffee', 1, 95, 4),
(21, 'Chicken with Rice', 1, 80, 1),
(22, 'Ice Cream', 1, 35, 3),
(23, 'Strawberry Cake', 1, 100, 3),
(24, 'Burger Steak', 2, 105, 1),
(25, 'Bbq with Rice', 1, 100, 1),
(30, 'Canton', 1, 100, 2),
(31, 'Cupcake', 1, 50, 3),
(32, 'Nestea', 1, 15, 4),
(33, 'ricemeal', 1, 90, 1),
(34, 'Coke', 1, 50, 4),
(35, 'Soup', 1, 50, 1),
(36, 'cake', 1, 11, 5),
(37, 'cake', 1, 10, 5),
(38, 'pancit', 1, 120, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

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

CREATE TABLE IF NOT EXISTS `position` (
  `PositionId` int(10) NOT NULL AUTO_INCREMENT,
  `PositionName` varchar(100) NOT NULL,
  PRIMARY KEY (`PositionId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `position`
--

TRUNCATE TABLE `position`;
--
-- Dumping data for table `position`
--

INSERT INTO `position` (`PositionId`, `PositionName`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `stall`
--

CREATE TABLE IF NOT EXISTS `stall` (
  `StallId` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Image` varchar(255) NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`StallId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Truncate table before insert `stall`
--

TRUNCATE TABLE `stall`;
--
-- Dumping data for table `stall`
--

INSERT INTO `stall` (`StallId`, `Name`, `Image`) VALUES
(0, 'none', ''),
(1, 'Mcdo', '_20160224_063444.JPG'),
(2, 'Jollibee', ''),
(3, 'Mang inasal', 'food-slide01.jpg'),
(4, 'jabe', 'Food-System.png'),
(6, 'Mcdoo', 'default.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
