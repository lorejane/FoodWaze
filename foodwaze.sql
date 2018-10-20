-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 09:39 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `Lastname` varchar(50) NOT NULL,
  `EmployeeId` int(10) NOT NULL AUTO_INCREMENT,
  `EmployeeAccount` varchar(50) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `PositionId` enum('manager','cashier') NOT NULL DEFAULT 'cashier',
  `StallId` int(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`EmployeeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Lastname`, `EmployeeId`, `EmployeeAccount`, `Firstname`, `PositionId`, `StallId`, `Password`) VALUES
('', 3, 'jane', '', 'manager', 0, '123'),
('', 4, 'arya', '', 'manager', 0, 'lore'),
('', 7, 'robs', '', 'cashier', 0, '123'),
('', 8, 'robs', '', 'cashier', 1, '123'),
('', 9, 'pao', '', 'cashier', 0, '123'),
('', 10, 'lyn', '', 'cashier', 0, 'lore');

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
  `Price` int(10) NOT NULL,
  `CategoryId` int(10) NOT NULL,
  PRIMARY KEY (`MenuId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `OrderId` int(10) NOT NULL,
  `MenuId` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `PositionId` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`PositionId`, `Name`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `stall`
--

CREATE TABLE IF NOT EXISTS `stall` (
  `StallId` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`StallId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `type` enum('manager','admin') DEFAULT 'manager',
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `type`, `username`, `password`) VALUES
(0, 'admin', 'admin', 'admin'),
(20, 'manager', 'lore', '123'),
(21, 'manager', 'robs', 'robs'),
(22, 'manager', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
