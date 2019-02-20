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
-- Table structure for table `stockitem`
--

DROP TABLE IF EXISTS `stockitem`;
CREATE TABLE IF NOT EXISTS `stockitem` (
  `stock_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `stockCat_id` int(10) UNSIGNED NOT NULL,
  `stock_name` varchar(100) NOT NULL,
  `stock_unit` varchar(85) NOT NULL,
  `stock_qqty` char(6) NOT NULL,
  `stockDispose` char(6) NOT NULL DEFAULT '0',
  `stockCost` double(10,2) NOT NULL,
  `lastStock` char(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stock_id`),
  KEY `FK_stockitem_1` (`stockCat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=287 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockitem`
--

INSERT INTO `stockitem` (`stock_id`, `stockCat_id`, `stock_name`, `stock_unit`, `stock_qqty`, `stockDispose`, `stockCost`, `lastStock`) VALUES
(228, 15, 'Motor Plate Acrylic', 'pc', '1', '9', 90.00, '0'),
(229, 15, 'Car Acrylic', 'pc', '0', '6', 130.00, '0'),
(230, 17, 'Frequent Pigment Ink Cyan', '70ml', '0', '0', 150.00, '0'),
(231, 17, 'Frequent Pigment Ink Magenta', '70ml', '0', '0', 150.00, '0'),
(232, 17, 'Frequent Pigment Ink Yellow', '70ml', '0', '0', 150.00, '0'),
(233, 17, 'Frequent Pigment Ink Black', '70ml', '0', '0', 150.00, '0'),
(234, 17, 'Frequent Dye Sublimation Ink Cyan', '70ml', '0', '0', 250.00, '0'),
(235, 17, 'Frequent Dye Sublimation Ink Magenta', '70ml', '0', '0', 250.00, '0'),
(236, 17, 'Frequent Dye Sublimation Ink Yellow', '70ml', '0', '0', 250.00, '0'),
(237, 17, 'Frequent Dye Sublimation Ink Black', '70ml', '0', '0', 250.00, '0'),
(238, 21, 'Navi 3.8x3.8', 'pc', '0', '3', 75.00, '0'),
(239, 21, 'Virtus Pro 4x4', 'pc', '0', '2', 85.00, '0'),
(240, 21, 'Team Liquid 4x2', 'pc', '0', '8', 45.00, '0'),
(241, 21, 'Evil Genius 4x4', 'pc', '0', '6', 45.00, '0'),
(242, 16, 'Matte White', 'cup', '0', '8', 85.00, '0'),
(243, 16, 'Super White', 'cup', '0', '16', 80.00, '0'),
(244, 16, 'Cyan Pigment', '10g', '0', '40', 10.00, '0'),
(245, 16, 'Magenta Pigment', '10g', '0', '20', 100.00, '0'),
(246, 16, 'Yellow Pigment', '10g', '0', '20', 10.00, '0'),
(247, 16, 'Black Pigment', '10g', '0', '40', 10.00, '0'),
(248, 16, 'Reducer', '1g', '0', '100', 3.00, '0'),
(249, 16, 'Adhesive', 'use', '0', '10', 25.00, '0'),
(254, 15, 'Motor Plate Vinyl Black', 'pc', '2', '9', 10.00, '0'),
(255, 15, 'Motor Plate Application Tape', 'pc', '10', '0', 10.00, '0'),
(256, 15, 'Car Plate Vinyl Sticker Black', 'pc', '-2', '10', 21.00, '0'),
(257, 15, 'Car Plate Application Tape', 'pc', '10', '0', 21.00, '0'),
(258, 19, 'Guitar Bond Paper', 'pc', '-250', '2250', 0.56, '0'),
(259, 19, 'Sub #16 Bondpaper', 'pc', '0', '2250', 0.22, '0'),
(260, 19, 'L220 Print Ink', 'print', '0', '1000', 0.50, '0'),
(261, 19, 'Cloth Tape', 'cut', '0', '50', 0.60, '0'),
(262, 19, 'Binding Staple #15', 'pad', '500', '500', 0.84, '0'),
(263, 19, 'Binding Staple #13', 'pad', '500', '500', 0.65, '0'),
(264, 15, 'Motor Plate Vinyl White', 'pc', '0', '11', 10.00, '0'),
(265, 15, 'Car Plate Vinyl Sticker White', 'pc', '0', '15', 21.00, '0'),
(266, 16, 'A3', 'pc', '0', '80', 1.00, '0'),
(267, 16, 'L1800 Print', 'print', '0', '5000', 6.85, '0'),
(268, 16, 'Emultion', 'coat', '0', '8', 37.50, '0'),
(269, 16, '120 Mesh', 'screen', '0', '10', 100.00, '0'),
(270, 16, '200 Mesh', 'screen', '0', '8', 170.00, '0'),
(271, 16, 'Tucker Staples', 'load', '0', '160', 2.12, '0'),
(272, 18, 'White Vinyl Sticker', 'inc', '0', '576', 0.17, '0'),
(273, 18, 'Black Vinyl Sticker', 'inch', '0', '576', 0.17, '0'),
(274, 18, 'Blue Vinyl Sticker', 'inch', '0', '576', 0.17, '0'),
(275, 18, 'Yellow Vinyl Sticker', 'inch', '0', '576', 0.17, '0'),
(276, 18, 'Red Vinyl Sticker', 'inch', '0', '576', 0.17, '0'),
(277, 18, 'Sky Blue Vinyl Sticker', 'inch', '0', '576', 0.17, '0'),
(278, 18, 'Application Tape 4 Inch', 'inch', '0', '394', 1.83, '0'),
(279, 18, 'Application Tape 6 Inch', 'inch', '0', '394', 2.74, '0'),
(280, 16, 'Photo Flash', 'coat', '0', '15', 52.00, '0'),
(281, 18, 'Gray Vinyl Sticker', 'inch', '0', '576', 0.17, '0'),
(282, 21, 'Autobots', 'pc', '0', '1', 35.00, '0'),
(283, 22, 'Powdered Soap', 'sachet', '3', '0', 7.00, '0'),
(284, 22, 'Clorine', 'pc', '0', '10', 1.00, '0'),
(285, 18, 'Silver Vinyl Stickers', 'inch', '576', '576', 0.17, '0'),
(286, 18, 'Gold Vinyl Sticker', 'inch', '1728', '576', 0.17, '0');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
