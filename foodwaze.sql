-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 09:35 AM
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
  `Image` varchar(255) NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`EmployeeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Lastname`, `EmployeeAccount`, `Firstname`, `PositionId`, `StallId`, `Password`, `EmployeeId`, `Image`) VALUES
('reyes', 'elljhayy', 'lore', 2, 1, '123', 60, 'default.png'),
('lolo', 'admin', 'mo', 1, 0, 'admin', 61, 'default.png'),
('stark', 'arya', 'arya', 3, 3, '123', 62, 'default.png'),
('jane', 'sansa', 'lore', 3, 2, '123', 63, 'default.png'),
('condor', 'lana', 'lana', 2, 1, '123', 64, 'default.png'),
('ger', 'cassh', 'mana', 3, 1, '123', 66, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `foodcourt`
--

CREATE TABLE IF NOT EXISTS `foodcourt` (
  `FoodcourtId` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`FoodcourtId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `Image` varchar(255) NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`MenuId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuId`, `Name`, `StallId`, `Price`, `CategoryId`, `Image`) VALUES
(1, 'Spaghetti', 1, 100, 2, 'default.png'),
(3, 'Carbonara', 1, 95, 2, 'default.png'),
(4, 'Coca Cola', 1, 35, 4, 'default.png'),
(5, 'Sprite', 1, 45, 4, 'default.png'),
(6, 'Royal', 1, 45, 4, 'default.png'),
(7, 'Pinapple Juice', 1, 50, 4, 'default.png'),
(9, 'Iced Tea', 1, 50, 4, 'default.png'),
(11, 'Palabok', 2, 85, 2, 'default.png'),
(12, 'Halo-halo', 2, 65, 3, 'default.png'),
(13, 'Gulaman', 2, 50, 4, 'default.png'),
(14, 'Bottled Water', 1, 35, 4, 'default.png'),
(15, 'Buko Juice', 2, 30, 4, 'default.png'),
(16, 'Pepsi', 1, 45, 4, 'default.png'),
(18, 'Orange Juice', 1, 45, 4, 'food-slide011.jpg'),
(19, 'Slush', 1, 45, 4, 'default.png'),
(20, 'Coffee', 1, 95, 4, 'default.png'),
(21, 'Chicken', 1, 80, 1, 'default.png'),
(22, 'Ice Cream', 1, 35, 3, 'default.png'),
(23, 'Strawberry Cake', 1, 100, 3, 'default.png'),
(24, 'Burger Steak', 2, 105, 1, 'default.png'),
(25, 'Bbq with Rice', 1, 100, 1, 'default.png'),
(30, 'Canton', 1, 100, 2, 'default.png'),
(31, 'Cupcake', 1, 50, 3, 'default.png'),
(32, 'Nestea', 1, 15, 4, 'default.png'),
(33, 'ricemeal', 1, 90, 1, 'default.png'),
(34, 'Coke', 1, 50, 4, 'default.png'),
(35, 'Soup', 1, 50, 1, 'default.png'),
(36, 'cake', 1, 11, 5, 'default.png'),
(37, 'cake', 1, 10, 5, 'default.png'),
(38, 'pancit', 1, 120, 2, 'default.png'),
(39, 'tapsi', 1, 36, 1, 'IMG20180821204741.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `OrderId` int(11) NOT NULL AUTO_INCREMENT,
  `StallId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Contact_Number` int(11) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderId`, `StallId`, `Name`, `Contact_Number`, `Date`) VALUES
(1, 1, 'kat', 909090, '2018-12-28'),
(2, 1, 'melody', 9080506, '2018-12-28'),
(3, 1, 'katmelody', 12344, '2018-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `Orderdetails_ID` int(255) NOT NULL AUTO_INCREMENT,
  `OrderId` int(10) NOT NULL,
  `MenuId` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  PRIMARY KEY (`Orderdetails_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`Orderdetails_ID`, `OrderId`, `MenuId`, `Quantity`) VALUES
(8, 9, 11, 1),
(10, 11, 11, 1),
(11, 12, 11, 1),
(12, 13, 12, 1),
(13, 3, 25, 1),
(14, 3, 33, 1),
(15, 3, 35, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `stall`
--

INSERT INTO `stall` (`StallId`, `Name`, `Image`) VALUES
(1, 'Mcdo', 'stall1.jpg'),
(2, 'Jollibee', 'stall2.jpg'),
(3, 'DQ', 'stall3.jpg'),
(4, 'Dunkin Donuts', 'stall4.jpg'),
(5, 'Pizza hut', 'stall5.jpg'),
(6, 'Krispy Kreme', 'stall6.jpg'),
(7, 'Turks', 'stall7.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
