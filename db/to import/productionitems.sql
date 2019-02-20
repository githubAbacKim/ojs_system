-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2018 at 08:21 AM
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
-- Database: `ajax_posdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `productionitems`
--

DROP TABLE IF EXISTS `productionitems`;
CREATE TABLE IF NOT EXISTS `productionitems` (
  `production_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stockCat_id` int(10) UNSIGNED NOT NULL,
  `proditem_name` varchar(85) NOT NULL,
  `proditem_unit` varchar(45) NOT NULL,
  `proditem_stock` char(6) NOT NULL,
  `proditem_dispose` char(6) NOT NULL,
  `proditem_cost` double(10,2) NOT NULL,
  PRIMARY KEY (`production_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productionitems`
--

INSERT INTO `productionitems` (`production_id`, `stockCat_id`, `proditem_name`, `proditem_unit`, `proditem_stock`, `proditem_dispose`, `proditem_cost`) VALUES
(13, 15, 'Motor Plate Acrylic', 'pc', '10', '0', 90.00),
(14, 15, 'Car Acrylic', 'pc', '4', '2', 130.00),
(15, 15, 'Motor Plate Vinyl Black', 'pc', '10', '0', 10.00),
(16, 15, 'Motor Plate Application Tape', 'pc', '9', '1', 10.00),
(17, 15, 'Car Plate Vinyl Sticker Black', 'pc', '8', '2', 21.00),
(18, 15, 'Car Plate Application Tape', 'pc', '4', '6', 21.00),
(19, 15, 'Motor Plate Vinyl White', 'pc', '10', '1', 10.00),
(20, 15, 'Car Plate Vinyl Sticker White', 'pc', '6', '2', 21.00),
(21, 19, 'Guitar Bond Paper', 'pc', '1475', '1275', 0.56),
(22, 19, 'Sub #16 Bondpaper', 'pc', '1425', '1325', 0.22),
(23, 19, 'L220 Print Ink', 'print', '2500', '5000', 0.30),
(24, 19, 'Cloth Tape', 'cut', '0', '75', 0.60),
(25, 19, 'Binding Staple #15', 'pad', '450', '50', 0.84),
(26, 19, 'Binding Staple #13', 'pad', '500', '25', 0.65),
(54, 16, 'Matte White', 'cup', '5', '3', 85.00),
(55, 16, 'Super White', 'cup', '16', '0', 80.00),
(56, 16, 'Cyan Pigment', '10g', '40', '0', 10.00),
(57, 16, 'Magenta Pigment', '10g', '20', '0', 100.00),
(58, 16, 'Yellow Pigment', '10g', '19', '1', 10.00),
(59, 16, 'Black Pigment', '10g', '31', '9', 10.00),
(60, 16, 'Reducer', '1g', '85', '15', 3.00),
(61, 16, 'Adhesive', 'use', '8', '2', 25.00),
(62, 16, 'A3', 'pc', '69', '11', 1.00),
(63, 16, 'L1800 Print', 'print', '4989', '11', 6.85),
(64, 16, 'Emultion', 'coat', '8', '0', 37.50),
(65, 16, '120 Mesh', 'screen', '10', '0', 100.00),
(66, 16, '200 Mesh', 'screen', '8', '0', 170.00),
(67, 16, 'Tucker Staples', 'load', '160', '0', 2.12),
(68, 18, 'White Vinyl Sticker', 'inc', '285', '291', 0.17),
(69, 18, 'Black Vinyl Sticker', 'inch', '391', '185', 0.17),
(70, 18, 'Blue Vinyl Sticker', 'inch', '306', '270', 0.17),
(71, 18, 'Yellow Vinyl Sticker', 'inch', '576', '0', 0.17),
(72, 18, 'Red Vinyl Sticker', 'inch', '306', '270', 0.17),
(73, 18, 'Sky Blue Vinyl Sticker', 'inch', '530', '46', 0.17),
(74, 18, 'Application Tape 4 Inch', 'inch', '326.75', '67.25', 1.83),
(75, 18, 'Application Tape 6 Inch', 'inch', '240.5', '153.5', 2.74),
(76, 16, 'Photo Flash', 'coat', '10.5', '4.5', 52.00),
(77, 18, 'Gray Vinyl Sticker', 'inch', '543', '33', 0.17),
(79, 22, 'Clorine', 'pc', '10', '0', 1.00),
(80, 18, 'Silver Vinyl Stickers', 'inch', '569', '7', 0.17),
(81, 18, 'Gold Vinyl Sticker', 'inch', '576', '0', 0.17);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
