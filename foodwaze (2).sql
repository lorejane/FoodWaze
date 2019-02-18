-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2019 at 10:19 PM
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
(1, 'Meal'),
(2, 'Pasta'),
(4, 'Drinks'),
(5, 'Dessert'),
(6, 'Shawarma'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Lastname`, `EmployeeAccount`, `Firstname`, `PositionId`, `StallId`, `Password`, `EmployeeId`, `Image`) VALUES
('reyes', 'Manager_1', 'lore', 2, 1, '3819', 60, 'FB_IMG_1546019563498.jpg'),
('Foodwaze', 'Admin', 'Admin', 1, 0, 'admin', 61, 'IMG_20170905_175522.jpg'),
('Mariano', 'Cashier_2', 'Mina', 3, 2, '123', 66, 'default.png'),
('Curbi', 'Manager_2', 'Kat', 2, 2, '12345', 74, 'default.png'),
('Abenoja', 'Manager_3', 'Robilyn', 2, 3, '12345', 75, 'default.png'),
('Reyes', 'Cashier_1', 'Lj', 3, 1, '12345', 76, 'default.png'),
('Lopez', 'Cashier_3', 'AG', 3, 3, '12345', 77, 'default.png'),
('Montano', 'Elljhay_1', 'Hazel', 3, 1, 'hazel123', 78, 'default.png'),
('lore', 'lore', 'lore', 1, 1, '123', 79, '1936039_493775867476560_1693629011423961367_n.jpg'),
('lore', 'loreee', 'lore', 2, 4, '123', 80, 'default.png'),
('lore', 'loree', 'lore', 2, 3, '123', 81, 'default.png'),
('opop', 'lj', 'popo', 1, 1, '123', 82, 'default.png');

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
(84, 'Hot Fudge Sundae', 1, 39, 0, 'Sundae-435X320-V11.png', ''),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=787 ;

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
(659, 473, 3, 1),
(660, 474, 86, 2),
(661, 475, 87, 4),
(662, 475, 86, 7),
(663, 475, 83, 1),
(664, 476, 87, 4),
(665, 476, 86, 8),
(666, 476, 83, 1),
(667, 476, 82, 1),
(668, 477, 82, 1),
(669, 477, 86, 2),
(670, 478, 82, 2),
(671, 478, 86, 2),
(672, 479, 82, 2),
(673, 479, 86, 2),
(674, 479, 83, 1),
(675, 480, 82, 2),
(676, 480, 86, 3),
(677, 480, 83, 1),
(678, 481, 82, 2),
(679, 481, 86, 3),
(680, 481, 83, 1),
(681, 482, 82, 2),
(682, 482, 86, 4),
(683, 482, 83, 1),
(684, 483, 82, 2),
(685, 483, 86, 4),
(686, 483, 83, 1),
(687, 483, 87, 1),
(688, 484, 82, 2),
(689, 484, 86, 4),
(690, 484, 83, 1),
(691, 484, 87, 2),
(692, 485, 82, 2),
(693, 485, 86, 5),
(694, 485, 83, 1),
(695, 485, 87, 2),
(696, 486, 83, 1),
(697, 487, 86, 1),
(698, 488, 82, 1),
(699, 489, 82, 1),
(700, 489, 86, 1),
(701, 490, 82, 1),
(702, 490, 86, 2),
(703, 491, 82, 2),
(704, 491, 86, 2),
(705, 492, 82, 1),
(706, 493, 82, 1),
(707, 494, 82, 1),
(708, 495, 86, 1),
(709, 496, 82, 1),
(710, 497, 82, 1),
(711, 498, 82, 2),
(712, 499, 82, 3),
(713, 500, 82, 3),
(714, 501, 82, 3),
(715, 501, 86, 2),
(716, 502, 82, 3),
(717, 502, 86, 3),
(718, 503, 82, 2),
(719, 504, 86, 1),
(720, 506, 82, 1),
(721, 507, 82, 1),
(722, 508, 82, 2),
(723, 509, 82, 2),
(724, 510, 82, 3),
(725, 511, 82, 3),
(726, 511, 86, 3),
(727, 512, 82, 3),
(728, 512, 86, 4),
(729, 513, 82, 3),
(730, 513, 86, 6),
(731, 514, 82, 3),
(732, 514, 86, 6),
(733, 514, 87, 1),
(734, 515, 84, 1),
(735, 516, 82, 1),
(736, 516, 83, 1),
(737, 516, 84, 1),
(738, 516, 85, 1),
(739, 516, 87, 2),
(740, 517, 82, 2),
(741, 517, 83, 1),
(742, 518, 83, 1),
(743, 519, 82, 1),
(744, 520, 82, 1),
(745, 520, 86, 1),
(746, 520, 87, 3),
(747, 521, 85, 1),
(748, 521, 82, 1),
(749, 522, 84, 1),
(750, 523, 84, 1),
(751, 523, 87, 1),
(752, 523, 83, 1),
(753, 524, 82, 1),
(754, 524, 86, 1),
(755, 525, 84, 1),
(756, 525, 86, 1),
(757, 526, 86, 2),
(758, 527, 87, 1),
(759, 528, 77, 1),
(760, 529, 68, 1),
(761, 533, 77, 1),
(762, 534, 77, 1),
(763, 534, 73, 1),
(764, 535, 74, 1),
(765, 535, 73, 1),
(766, 536, 108, 5),
(767, 536, 107, 5),
(768, 536, 106, 2),
(769, 537, 108, 5),
(770, 537, 107, 5),
(771, 537, 106, 2),
(772, 538, 40, 1),
(773, 538, 93, 4),
(774, 539, 77, 1),
(775, 540, 59, 1),
(776, 541, 70, 1),
(777, 542, 72, 1),
(778, 542, 79, 1),
(779, 543, 68, 1),
(780, 544, 70, 1),
(781, 545, 74, 1),
(782, 546, 68, 1),
(783, 546, 70, 1),
(784, 547, 70, 1),
(785, 548, 70, 2),
(786, 549, 70, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `IsActive` tinyint(1) NOT NULL DEFAULT '1',
  `OrderId` int(11) NOT NULL AUTO_INCREMENT,
  `StallId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Contact_Number` varchar(11) NOT NULL,
  `DateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`OrderId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=550 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`IsActive`, `OrderId`, `StallId`, `Name`, `Contact_Number`, `DateTime`) VALUES
(0, 434, 1, '', '0', '2019-02-13 23:06:40'),
(0, 435, 1, '', '0', '2019-02-13 23:06:45'),
(0, 436, 1, '', '0', '2019-02-13 23:08:56'),
(0, 437, 1, '', '0', '2019-02-13 23:09:10'),
(0, 438, 1, '', '0', '2019-02-13 23:09:20'),
(0, 439, 1, '', '0', '2019-02-14 00:26:54'),
(0, 440, 1, '', '0', '2019-02-14 00:26:59'),
(0, 441, 1, '', '0', '2019-02-14 00:32:09'),
(0, 442, 1, '', '0', '2019-02-14 00:32:14'),
(0, 443, 1, '', '0', '2019-02-14 00:33:52'),
(0, 444, 1, '', '0', '2019-02-14 00:34:50'),
(1, 446, 2, 'lore', '123', '2019-02-14 16:22:02'),
(1, 447, 2, 'lore', '123', '2019-02-14 16:25:18'),
(1, 450, 2, 'mwen', '123', '2019-02-14 16:26:46'),
(0, 451, 1, '', '0', '2019-02-14 21:06:19'),
(0, 452, 1, '', '0', '2019-02-14 21:09:15'),
(0, 453, 1, '', '0', '2019-02-14 21:09:37'),
(0, 454, 1, '', '0', '2019-02-14 21:09:45'),
(0, 455, 1, '', '0', '2019-02-14 21:10:15'),
(0, 456, 1, '', '0', '2019-02-14 21:13:39'),
(0, 457, 1, '', '0', '2019-02-14 21:13:49'),
(0, 458, 1, '', '0', '2019-02-14 21:15:15'),
(0, 459, 1, '', '0', '2019-02-14 21:15:26'),
(0, 460, 1, '', '0', '2019-02-14 21:16:31'),
(0, 461, 1, '', '0', '2019-02-14 21:16:39'),
(0, 462, 1, '', '0', '2019-02-14 21:20:42'),
(0, 467, 1, '', '0', '2019-02-14 23:00:53'),
(0, 471, 1, '', '0', '2019-02-15 14:08:02'),
(0, 472, 1, '', '0', '2019-02-15 15:29:41'),
(0, 473, 1, '', '0', '2019-02-15 23:30:05'),
(0, 474, 1, '', '0', '2019-02-16 21:06:21'),
(0, 475, 1, '', '0', '2019-02-16 21:36:16'),
(0, 476, 1, '', '0', '2019-02-16 22:07:21'),
(0, 477, 1, '', '0', '2019-02-16 22:28:25'),
(0, 478, 1, '', '0', '2019-02-16 22:29:33'),
(0, 479, 1, '', '0', '2019-02-16 22:35:40'),
(0, 480, 1, '', '0', '2019-02-16 22:36:31'),
(0, 481, 1, '', '0', '2019-02-16 22:36:32'),
(0, 482, 1, '', '0', '2019-02-16 22:37:22'),
(0, 483, 1, '', '0', '2019-02-16 22:38:06'),
(0, 484, 1, '', '0', '2019-02-16 22:39:34'),
(0, 485, 1, '', '0', '2019-02-16 22:41:02'),
(0, 486, 1, '', '0', '2019-02-16 22:53:57'),
(0, 487, 1, '', '0', '2019-02-16 22:55:43'),
(0, 488, 1, '', '0', '2019-02-16 22:56:21'),
(0, 489, 1, '', '0', '2019-02-16 22:58:42'),
(0, 490, 1, '', '0', '2019-02-16 22:59:54'),
(0, 491, 1, '', '0', '2019-02-16 23:00:39'),
(0, 492, 1, '', '0', '2019-02-16 23:01:47'),
(0, 493, 1, '', '0', '2019-02-16 23:02:16'),
(0, 494, 1, '', '0', '2019-02-16 23:02:16'),
(0, 495, 1, '', '0', '2019-02-16 23:03:13'),
(0, 496, 1, '', '0', '2019-02-16 23:04:08'),
(0, 497, 1, '', '0', '2019-02-16 23:05:36'),
(0, 498, 1, '', '0', '2019-02-16 23:07:13'),
(0, 499, 1, '', '0', '2019-02-16 23:07:59'),
(0, 500, 1, '', '0', '2019-02-16 23:08:09'),
(0, 501, 1, '', '0', '2019-02-16 23:10:00'),
(0, 502, 1, '', '0', '2019-02-16 23:10:31'),
(0, 503, 1, '', '0', '2019-02-16 23:10:49'),
(0, 504, 1, '', '0', '2019-02-16 23:11:51'),
(0, 505, 1, '', '0', '2019-02-16 23:11:58'),
(0, 506, 0, '', '0', '2019-02-16 23:23:35'),
(0, 507, 0, '', '0', '2019-02-16 23:23:39'),
(0, 508, 1, '', '0', '2019-02-16 23:24:33'),
(0, 509, 1, '', '0', '2019-02-16 23:25:08'),
(0, 510, 1, '', '0', '2019-02-16 23:26:31'),
(0, 511, 1, '', '0', '2019-02-16 23:27:14'),
(0, 512, 1, '', '0', '2019-02-16 23:27:42'),
(0, 513, 1, '', '0', '2019-02-16 23:29:06'),
(0, 514, 1, '', '0', '2019-02-16 23:29:54'),
(0, 515, 1, '', '0', '2019-02-16 23:30:28'),
(0, 516, 1, '', '0', '2019-02-16 23:30:48'),
(0, 517, 1, '', '0', '2019-02-16 23:31:25'),
(0, 518, 1, '', '0', '2019-02-16 23:32:19'),
(0, 519, 1, '', '0', '2019-02-16 23:33:40'),
(0, 520, 1, '', '0', '2019-02-16 23:35:01'),
(0, 521, 1, '', '0', '2019-02-16 23:35:36'),
(0, 522, 1, '', '0', '2019-02-16 23:46:58'),
(0, 523, 1, '', '0', '2019-02-16 23:47:57'),
(0, 524, 1, '', '0', '2019-02-16 23:49:53'),
(0, 525, 1, '', '0', '2019-02-16 23:52:35'),
(0, 526, 1, '', '0', '2019-02-16 23:53:21'),
(0, 527, 1, '', '0', '2019-02-16 23:53:54'),
(0, 528, 1, '', '0', '2019-02-17 20:24:20'),
(0, 529, 1, '', '0', '2019-02-17 22:05:35'),
(0, 530, 1, '', '0', '2019-02-17 22:05:38'),
(0, 531, 1, '', '0', '2019-02-17 22:05:43'),
(0, 532, 1, '', '0', '2019-02-17 22:05:54'),
(0, 533, 1, '', '0', '2019-02-17 22:06:26'),
(0, 534, 1, '', '0', '2019-02-17 22:07:39'),
(0, 535, 1, '', '0', '2019-02-17 22:08:42'),
(1, 536, 2, 'Mark Wendell Q. Cabuang', '2147483647', '2019-02-18 00:21:42'),
(1, 537, 2, 'Mark Wendell Q. Cabuang', '2147483647', '2019-02-18 00:21:43'),
(0, 538, 1, '', '0', '2019-02-18 03:38:27'),
(0, 539, 1, '', '0', '2019-02-18 04:51:25'),
(1, 546, 1, 'rere', '09323656973', '2019-02-18 09:37:23'),
(1, 547, 1, 'naliligo si lore', '09299701698', '2019-02-18 10:28:47'),
(1, 548, 1, 'maliligo si mwen', '09299701698', '2019-02-18 10:29:17'),
(1, 549, 1, 'Abbie Jannina Soriano Oas', '09299701698', '2019-02-18 10:40:42');

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
(473, 608, 700, 92, 0, 1, 66, '2019-02-16 07:30:06'),
(474, 104, 110, 6, 0, 1, 66, '2019-02-17 05:06:21'),
(477, 139, 500, 361, 0, 1, 66, '2019-02-17 06:28:25'),
(478, 174, 500, 326, 0, 1, 66, '2019-02-17 06:29:33'),
(479, 212, 220, 8, 0, 1, 66, '2019-02-17 06:35:40'),
(480, 264, 300, 36, 0, 1, 66, '2019-02-17 06:36:31'),
(481, 264, 300, 36, 0, 1, 66, '2019-02-17 06:36:32'),
(484, 420, 500, 80, 0, 1, 66, '2019-02-17 06:39:34'),
(486, 38, 40, 2, 0, 1, 66, '2019-02-17 06:53:57'),
(488, 35, 50, 15, 0, 1, 66, '2019-02-17 06:56:22'),
(489, 87, 90, 3, 0, 1, 66, '2019-02-17 06:58:42'),
(490, 139, 555, 416, 0, 1, 66, '2019-02-17 06:59:54'),
(491, 174, 999, 825, 0, 1, 66, '2019-02-17 07:00:39'),
(492, 35, 55, 20, 0, 1, 66, '2019-02-17 07:01:47'),
(493, 35, 50, 15, 0, 1, 66, '2019-02-17 07:02:16'),
(494, 35, 50, 15, 0, 1, 66, '2019-02-17 07:02:16'),
(495, 52, 555, 503, 0, 1, 66, '2019-02-17 07:03:14'),
(496, 35, 55, 20, 0, 1, 66, '2019-02-17 07:04:08'),
(497, 35, 331, 296, 0, 1, 66, '2019-02-17 07:05:36'),
(498, 70, 555, 485, 0, 1, 66, '2019-02-17 07:07:13'),
(499, 105, 888, 783, 0, 1, 66, '2019-02-17 07:07:59'),
(500, 105, 888, 783, 0, 1, 66, '2019-02-17 07:08:09'),
(501, 209, 111, -98, 0, 1, 66, '2019-02-17 07:10:00'),
(502, 261, 888, 627, 0, 1, 66, '2019-02-17 07:10:32'),
(503, 70, 100, 30, 0, 1, 66, '2019-02-17 07:10:49'),
(504, 52, 600, 548, 0, 1, 66, '2019-02-17 07:11:51'),
(505, 52, 600, 548, 0, 1, 66, '2019-02-17 07:11:58'),
(508, 70, 90, 20, 0, 1, 66, '2019-02-17 07:24:33'),
(509, 70, 90, 20, 0, 1, 66, '2019-02-17 07:25:08'),
(510, 105, 881, 776, 0, 1, 66, '2019-02-17 07:26:31'),
(511, 261, 999, 738, 0, 1, 66, '2019-02-17 07:27:14'),
(515, 38, 77, 39, 0, 1, 66, '2019-02-17 07:30:28'),
(516, 267, 77, 39, 0, 1, 66, '2019-02-17 07:30:48'),
(517, 108, 88, -20, 0, 1, 66, '2019-02-17 07:31:26'),
(518, 38, 50, 12, 0, 1, 66, '2019-02-17 07:32:19'),
(519, 35, 50, 15, 0, 1, 66, '2019-02-17 07:33:41'),
(520, 243, 55, -188, 0, 1, 66, '2019-02-17 07:35:01'),
(521, 87, 555, 468, 0, 1, 66, '2019-02-17 07:35:37'),
(522, 38, 555, 468, 0, 1, 66, '2019-02-17 07:46:58'),
(523, 128, 555, 427, 0, 1, 66, '2019-02-17 07:47:57'),
(525, 90, 500, 410, 0, 1, 66, '2019-02-17 07:52:35'),
(526, 104, 5555, 5451, 0, 1, 66, '2019-02-17 07:53:21'),
(527, 52, 99, 47, 0, 1, 66, '2019-02-17 07:53:54'),
(528, 59, 550, 491, 0, 1, 76, '2019-02-18 04:24:20'),
(529, 47, 50, 3, 0, 1, 76, '2019-02-18 06:05:35'),
(530, 47, 50, 3, 0, 1, 76, '2019-02-18 06:05:39'),
(531, 47, 50, 3, 0, 1, 76, '2019-02-18 06:05:43'),
(532, 47, 50, 3, 0, 1, 76, '2019-02-18 06:05:54'),
(533, 59, 60, 1, 0, 1, 76, '2019-02-18 06:06:26'),
(534, 106, 555, 449, 0, 1, 76, '2019-02-18 06:07:40'),
(535, 94, 100, 6, 0, 1, 76, '2019-02-18 06:08:42'),
(538, 416, 500, 84, 0, 1, 76, '2019-02-18 11:38:28'),
(539, 59, 5, -54, 0, 1, 76, '2019-02-18 12:51:26');

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
