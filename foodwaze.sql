-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2019 at 05:59 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`) VALUES
(1, 'Shawarma'),
(2, 'Pasta'),
(3, 'Dessert'),
(4, 'Drinks'),
(5, 'Meal'),
(8, 'Burger'),
(9, 'Breakfast');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Lastname`, `EmployeeAccount`, `Firstname`, `PositionId`, `StallId`, `Password`, `EmployeeId`, `Image`) VALUES
('reyes', 'elljhayyyyy', 'loredasd', 2, 1, '123', 60, 'FB_IMG_1546019563498.jpg'),
('lolo', 'admin', 'mo', 1, 0, '123', 61, 'IMG_20170905_175522.jpg'),
('ger', 'cassh', 'mana', 3, 1, '123', 66, 'default.png'),
('lore', 'arya', 'lore', 2, 4, '123', 74, 'default.png');

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
  `ItemDescription` varchar(50) NOT NULL,
  PRIMARY KEY (`MenuId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuId`, `Name`, `StallId`, `Price`, `CategoryId`, `Image`, `ItemDescription`) VALUES
(1, 'Bottled Water Regular', 4, 25, 4, 'water.png', ''),
(2, 'Bottled Water Large', 4, 40, 4, 'water.png', ''),
(3, 'Coke', 4, 20, 4, 'coketurks.jpg', ''),
(40, 'Bacon Smoke House', 1, 100, 8, 't-mcdonalds-baconsmokehouse1.jpg', ''),
(41, 'Big Mac Bacon', 1, 139, 8, 't-mcdonalds-big-mac-bacon1.jpg', ''),
(42, 'Cheeseburger', 1, 50, 8, 't-mcdonalds-Cheeseburger1.jpg', ''),
(43, 'Double Bacon Smoke House', 1, 189, 8, 't-mcdonalds-double-baconsmokehouse1.jpg', ''),
(44, 'Double Quarter Pounder w/ Cheese', 1, 210, 8, 't-mcdonalds-Double-Quarter-Pounder-with-Cheese1.jpg', ''),
(45, 'Hamburger', 1, 35, 8, 't-mcdonalds-Hamburger1.jpg', ''),
(46, 'Mushroom Swiss', 1, 109, 8, 't-mcdonalds-mushroomswiss1.jpg', ''),
(47, 'Double Mushroom Swiss', 1, 159, 8, 't-mcdonalds-mushroomswiss-double1.jpg', ''),
(48, 'Triple Cheeseburger', 1, 99, 8, 't-mcdonalds-Triple-Cheeseburger1.jpg', ''),
(49, 'Quarter Pounder with Cheese', 1, 139, 8, 't-mcdonalds-Quarter-Pounder-with-Cheese1.jpg', ''),
(50, 'Big Breakfast Regular Size Biscuit', 1, 59, 9, 's-mcdonalds-Big-Breakfast-Regular-Size-Biscuit.jpg', ''),
(51, 'Bagon Egg Cheese Biscuit', 1, 89, 9, 't-mcdonalds-Bacon-Egg-Cheese-Biscuit-Regular-Size-Biscuit1.jpg', ''),
(52, 'McGriddles Bacon Egg Cheese', 1, 79, 9, 't-mcdonalds-Bacon-Egg-Cheese-McGriddles.jpg', ''),
(53, 'Big Breakfast w/ Hotcakes & Coffee', 1, 109, 9, 't-mcdonalds-Big-Breakfast-with-Hotcakes-Regular-Size-Biscuit.jpg', ''),
(54, 'McMiffin Egg', 1, 59, 9, 't-mcdonalds-Egg-McMuffin.jpg', ''),
(55, 'Egg White Delight', 1, 79, 9, 't-mcdonalds-EggWhiteDelight.jpg', ''),
(56, 'Hotcakes & Sausage', 1, 89, 9, 't-mcdonalds-Hotcakes-and-Sausage.jpg', ''),
(57, 'Sausage Biscuit Regular', 1, 89, 9, 't-mcdonalds-Sausage-Biscuit-Regular-Size-Biscuit.jpg', ''),
(58, 'McMuffins Sausage', 1, 59, 9, 't-mcdonalds-Sausage-McMuffin.jpg', ''),
(59, 'McSpaghetti w/ Drinks & Fries', 1, 103, 5, 'mealMcSpagWdrinkandFries435X320.png', ''),
(60, 'McSpaghetti w/ Drinks & Burger', 1, 109, 5, 'mealMcSpagWdrinkandBurger435X3201.png', ''),
(61, 'Crispy Chicken Fillet w/ Drink', 1, 89, 5, 'mealCrispyChickenFilletCoke430X320-min1.png', ''),
(62, 'McSpaghetti w/ Drink', 1, 99, 5, 'mealMcSpagWdrink435X320_(1).png', ''),
(63, 'Chicken Fillet w/ Drink and Fries', 1, 109, 5, 'mealChixFilletMeal435X320-min_(1).png', ''),
(64, 'Chicken Fillet Ala King w/ Drinks', 1, 79, 5, 'mealChickenFilletAlaKingCoke430X320-min1.png', ''),
(65, 'Cheesy Burger w/ Coke', 1, 59, 5, 'mealCheesyBurgerwithCokel435X3201.png', ''),
(66, 'Cheesy Eggdesal w/ Coffee', 1, 59, 5, 'mealGreenPRC_CheesyEggdesalCoffee435X3201.png', ''),
(68, 'Coke', 1, 47, 4, 'CokeGlass200x147-V1_(1).png', ''),
(70, 'McCaffe Coffee Float', 1, 59, 4, 'McCaffeeCoffeeFloat-435X320-min1.png', ''),
(71, 'Coke Zero ', 1, 47, 4, 'CokeGlass200x147-V1.png', ''),
(72, 'Sprite ', 1, 48, 4, 'SpriteGlass200x147-V1.png', ''),
(73, 'Iced Tea', 1, 47, 4, 'IcedTea200x147-V1.png', ''),
(74, 'Pineapple Juice', 1, 47, 4, 'MinuteMaid200x147-V1.png', ''),
(75, 'Orange Juice', 1, 48, 4, 'OrangeJuice200x147-V1.png', ''),
(76, 'McCafe Premium Coffee', 1, 29, 4, 'PRCPurple2018_12oz_435X3201.png', ''),
(77, 'McCafe Iced Coffee Plane', 1, 59, 4, 'IcedCoffe2018_435X320_(2).png', ''),
(78, 'McCafe Iced Coffee Vanilla', 1, 59, 4, 'IcedCoffe2018_435X320.png', ''),
(79, 'Coke McFloat', 1, 35, 4, 'PairCokeMcfloat200x147-V1.png', ''),
(80, 'Mixed Berries McFloat', 1, 45, 4, 'MIxB35X3201.png', ''),
(82, 'Apple Pie', 1, 35, 3, 'ApplePie435X320-min1.png', ''),
(83, 'Hot Caramel Sundae', 1, 38, 3, 'CaramelSundae-435X320-V11.png', ''),
(84, 'Hot Fudge Sundae', 1, 38, 3, 'Sundae-435X320-V11.png', ''),
(85, 'McFlurry with Milo', 1, 52, 3, 'Milo435x3201.png', ''),
(86, 'McFlurry with Oreo', 1, 52, 3, 'Product-Shots-435x320-oreo-min1.png', ''),
(87, 'Oreo Matcha McFlurry', 1, 52, 3, 'Product-Shots-435x320-matcha-min1.png', ''),
(88, 'Coke Float', 2, 35, 4, 'coke_float_thumb.jpg', ''),
(89, 'Chocolate Sundae', 2, 35, 3, 'JB_PRODUCT-BANNER-AD_CHOCO-SUNDAE_FA.png', ''),
(90, 'Cone Twirl Krunchy Chocolate', 2, 10, 3, 'JB_PRODUCT-BANNER-AD_KRUNCHY-TWIRL_FA.png', ''),
(91, 'Cone Twirl Vanilla', 2, 10, 3, 'JB_PRODUCT-BANNER-AD_VANILLA-TWIRL_FA.png', ''),
(92, 'Burger Steak w/ Spaghetti', 2, 109, 5, 'JB_PRODUCT-BANNER-AD_BURGERSTAEAK-WITH-SPAGHETTI_FA.png', ''),
(93, 'Big Burger Steak Supreme', 1, 79, 5, 'default.png', ''),
(94, 'Burger Steak w/ Shanghai', 1, 78, 5, 'default.png', ''),
(95, 'Burger Steak w/ Fries & Drinks', 2, 99, 5, 'JB_PRODUCT-BANNER-AD_BURGER-STEAK-WITH-FRIES_FA.png', ''),
(96, '2pc Burger Steak', 2, 99, 5, 'JB_PRODUCT-BANNER-AD_2PC-BURGER-STEAK_FA.png', ''),
(97, 'Garlic Pepper Beef', 2, 79, 5, 'JB_PRODUCT-BANNER-AD_BEEF-TAPA_FA3.png', ''),
(98, '1pc Burger Steak', 2, 55, 5, 'JB_PRODUCT-BANNER-AD_1PC-BURGER-STEAK_FA.png', ''),
(99, '5pc Shanghai Rolls', 2, 55, 5, 'JB_PRODUCT-BANNER-AD_5PC-SHANGHAI_FA.png', ''),
(100, '1pc Chicken Joy w/ Jolly Spaghetti', 2, 129, 5, 'JB_PRODUCT-BANNER-AD_CHICKENJOY-WITH-SPAGHETTI_FA.png', ''),
(101, '1pc Chicken Joy w/ Fries', 2, 109, 5, 'JB_PRODUCT-BANNER-AD_CHICKENJOY-WITH-FRIES_FA.png', ''),
(102, 'Chicken Joy w/ Burger Steak', 2, 129, 5, 'JB_PRODUCT-BANNER-AD_CHICKENJOY-WITH-BURGER-STEAK_FA.png', ''),
(103, '1pc Chicken Joy', 2, 89, 5, 'JB_PRODUCT-BANNER-AD_1PC-CHICKENJOY_FA.png', ''),
(104, '1pc Spicy Chicken Joy', 2, 89, 5, 'JB_PRODUCT-BANNER-AD_SPICY-CHICKENJOY_FA.png', ''),
(106, 'Jolly Spaghetti w/ Yumburger', 2, 99, 2, 'JB_PRODUCT-BANNER-AD_JOLLY-SPAGHETTI-WITH-YUMBURGER_FA.png', ''),
(107, 'Jolly Spaghetti Family Pan', 2, 249, 2, 'JB_PRODUCT-BANNER-AD_JOLLY-SPAGHETTI-FAMILY-PAN_FA.png', ''),
(108, 'Jolly Spaghetti', 2, 59, 2, 'JB_PRODUCT-BANNER-AD_JOLLY-SPAGHETTI-WITH-YUMBURGER_FA1.png', ''),
(109, 'Palabok Fiesta', 2, 89, 2, 'JB_PRODUCT-BANNER-AD_PALABOK_FA.png', ''),
(110, 'Sprite ', 2, 48, 4, 'SpriteGlass200x147-V1.png', ''),
(111, 'Coke Zero ', 2, 47, 4, 'CokeGlass200x147-V1.png', ''),
(112, 'Coke', 2, 47, 4, 'CokeGlass200x147-V1_(1).png', ''),
(113, 'Iced Tea', 2, 47, 4, 'IcedTea200x147-V1.png', ''),
(114, 'Pineapple Juice', 2, 47, 4, 'MinuteMaid200x147-V1.png', ''),
(115, 'Oreo Blizzard (Mini)', 3, 59, 3, 'dqblizzards_cookie_oreo.png', ''),
(116, 'Orange Juice', 2, 48, 4, 'OrangeJuice200x147-V1.png', ''),
(117, 'Oreo Blizzard (Regular)', 3, 75, 3, 'dqblizzards_cookie_oreo.png', ''),
(118, 'Oreo Blizzard (Medium)', 3, 99, 3, 'dqblizzards_cookie_oreo.png', ''),
(119, 'Oreo Blizzard (Large)', 3, 119, 3, 'dqblizzards_cookie_oreo.png', ''),
(120, 'Chocolate Almond Blizzard (Mini)', 3, 59, 3, 'blizzard_chocolate_almond.png', ''),
(121, 'Chocolate Almond Blizzard (Regular)', 3, 75, 3, 'blizzard_chocolate_almond.png', ''),
(122, 'Chocolate Almond Blizzard (Medium)', 3, 99, 3, 'blizzard_chocolate_almond.png', ''),
(123, 'Chocolate Almond Blizzard (Large)', 3, 119, 3, 'blizzard_chocolate_almond.png', ''),
(124, 'Choco Chips Blizzard (Mini)', 3, 59, 3, 'blizzard_chocochips.png', ''),
(125, 'Choco Chips Blizzard (Regular)', 3, 75, 3, 'blizzard_chocochips.png', ''),
(126, 'Choco Chips Blizzard (Medium)', 3, 99, 3, 'blizzard_chocochips.png', ''),
(127, 'Choco Chips Blizzard (Large)', 3, 119, 3, 'blizzard_chocochips.png', ''),
(128, 'Beef Pita Doner', 4, 60, 1, 'turks1.jpg', ''),
(129, 'Chicken Pita Doner', 4, 60, 1, 'turks1.jpg', ''),
(130, 'Beef Pita Doner w/ Drinks', 4, 80, 1, 'turks2.jpg', ''),
(131, 'Chicken Pita Doner w/ Drinks', 4, 80, 1, 'turks2.jpg', ''),
(132, 'Beef Pita Doner w/ Fries and Drinks', 4, 110, 1, 'turks3.jpg', ''),
(133, 'Chicken Pita Doner w/ Fries and Drinks', 4, 110, 1, 'turks3.jpg', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=660 ;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`Orderdetails_ID`, `OrderId`, `MenuId`, `Quantity`) VALUES
(629, 451, 1, 1),
(630, 452, 3, 2),
(631, 453, 3, 2),
(632, 454, 3, 2),
(633, 455, 3, 2),
(634, 456, 3, 1),
(635, 457, 3, 1),
(636, 458, 56, 2),
(637, 459, 3, 2),
(638, 460, 3, 3),
(639, 461, 3, 3),
(640, 462, 3, 3),
(641, 462, 1, 1),
(642, 463, 1, 1),
(643, 464, 3, 1),
(644, 465, 1, 1),
(645, 466, 3, 1),
(646, 466, 30, 1),
(647, 466, 38, 1),
(648, 467, 1, 1),
(649, 468, 1, 3),
(650, 469, 30, 4),
(651, 470, 38, 3),
(652, 470, 59, 1),
(653, 470, 37, 5),
(654, 471, 1, 1),
(655, 472, 3, 1),
(656, 473, 38, 3),
(657, 473, 59, 1),
(658, 473, 37, 5),
(659, 473, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  `OrderId` int(11) NOT NULL AUTO_INCREMENT,
  `StallId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Contact_Number` int(11) NOT NULL,
  `DateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=474 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`IsActive`, `OrderId`, `StallId`, `Name`, `Contact_Number`, `DateTime`) VALUES
(0, 434, 1, '', 0, '2019-02-13 23:06:40'),
(0, 435, 1, '', 0, '2019-02-13 23:06:45'),
(0, 436, 1, '', 0, '2019-02-13 23:08:56'),
(0, 437, 1, '', 0, '2019-02-13 23:09:10'),
(0, 438, 1, '', 0, '2019-02-13 23:09:20'),
(0, 439, 1, '', 0, '2019-02-14 00:26:54'),
(0, 440, 1, '', 0, '2019-02-14 00:26:59'),
(0, 441, 1, '', 0, '2019-02-14 00:32:09'),
(0, 442, 1, '', 0, '2019-02-14 00:32:14'),
(0, 443, 1, '', 0, '2019-02-14 00:33:52'),
(0, 444, 1, '', 0, '2019-02-14 00:34:50'),
(1, 446, 2, 'lore', 123, '2019-02-14 16:22:02'),
(1, 447, 2, 'lore', 123, '2019-02-14 16:25:18'),
(1, 450, 2, 'mwen', 123, '2019-02-14 16:26:46'),
(0, 451, 1, '', 0, '2019-02-14 21:06:19'),
(0, 452, 1, '', 0, '2019-02-14 21:09:15'),
(0, 453, 1, '', 0, '2019-02-14 21:09:37'),
(0, 454, 1, '', 0, '2019-02-14 21:09:45'),
(0, 455, 1, '', 0, '2019-02-14 21:10:15'),
(0, 456, 1, '', 0, '2019-02-14 21:13:39'),
(0, 457, 1, '', 0, '2019-02-14 21:13:49'),
(0, 458, 1, '', 0, '2019-02-14 21:15:15'),
(0, 459, 1, '', 0, '2019-02-14 21:15:26'),
(0, 460, 1, '', 0, '2019-02-14 21:16:31'),
(0, 461, 1, '', 0, '2019-02-14 21:16:39'),
(0, 462, 1, '', 0, '2019-02-14 21:20:42'),
(0, 467, 1, '', 0, '2019-02-14 23:00:53'),
(1, 468, 1, 'tuv', 123, '2019-02-15 13:09:18'),
(1, 469, 1, 'jb', 123, '2019-02-15 13:10:41'),
(0, 471, 1, '', 0, '2019-02-15 14:08:02'),
(0, 472, 1, '', 0, '2019-02-15 15:29:41'),
(0, 473, 1, '', 0, '2019-02-15 23:30:05');

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
-- Table structure for table `receiptmanagement`
--

CREATE TABLE IF NOT EXISTS `receiptmanagement` (
  `OrderId` int(11) NOT NULL,
  `Total` double NOT NULL,
  `Cash` float NOT NULL,
  `Change` float NOT NULL,
  `Discount` float NOT NULL,
  `StallId` int(10) NOT NULL,
  `EmployeeId` int(10) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiptmanagement`
--

INSERT INTO `receiptmanagement` (`OrderId`, `Total`, `Cash`, `Change`, `Discount`, `StallId`, `EmployeeId`, `DateTime`) VALUES
(472, 95, 100, 5, 0, 1, 66, '2019-02-15 23:29:42'),
(473, 608, 700, 92, 0, 1, 66, '2019-02-16 07:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `stall`
--

CREATE TABLE IF NOT EXISTS `stall` (
  `StallId` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Image` varchar(255) NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`StallId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stall`
--

INSERT INTO `stall` (`StallId`, `Name`, `Image`) VALUES
(1, 'McDonalds', 'stall1.jpg'),
(2, 'Jollibee', 'stall2.jpg'),
(3, 'Dairy Queen', 'stall3.jpg'),
(4, 'Turks', 'stall4.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
