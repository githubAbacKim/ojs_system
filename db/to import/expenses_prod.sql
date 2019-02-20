-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2018 at 08:18 AM
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
-- Table structure for table `expenses_prod`
--

DROP TABLE IF EXISTS `expenses_prod`;
CREATE TABLE IF NOT EXISTS `expenses_prod` (
  `prod_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prod_desc` varchar(100) NOT NULL,
  `prod_qty` char(5) NOT NULL,
  `prod_unit` varchar(85) NOT NULL,
  `prod_price` double(10,2) NOT NULL,
  `prod_note` text NOT NULL,
  `prod_date` char(11) NOT NULL,
  `prod_mon` char(2) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses_prod`
--

INSERT INTO `expenses_prod` (`prod_id`, `prod_desc`, `prod_qty`, `prod_unit`, `prod_price`, `prod_note`, `prod_date`, `prod_mon`) VALUES
(2, '0205-130', '4', 'cut', 9.25, 'Transfer Tape (18.5x2.5) ', '2018-02-05', '2'),
(3, '0207-206', '625', 'pc', 0.25, 'Sub #16 Bondpaper', '2018-02-07', '2'),
(4, '0207-206', '625', 'pc', 0.56, 'Guitar Bondpaper', '2018-02-07', '2'),
(5, '0207-206', '1250', 'pgs', 0.50, 'Printing Ink', '2018-02-07', '2'),
(6, '0207-206', '13', 'pc', 1.50, 'Vellum 180 gsm', '2018-02-07', '2'),
(7, '0207-206', '25', 'bind', 2.50, 'Binding Stiple', '2018-02-07', '2'),
(8, '0217-217', '1', 'pc', 10.00, 'Motor Plate Sticker black', '2018-02-17', '2'),
(9, '0217-217', '1', 'pc', 10.00, 'Motor Plate Transfer Tape', '2018-02-17', '2'),
(10, '0216-213', '1', 'pc', 10.00, 'Motor Plate Black Sticker', '2018-02-17', '2'),
(11, '0216-213', '1', 'pc', 10.00, 'Motor Plate Black Transfer Tape', '2018-02-17', '2'),
(12, '0212-211', '2', 'pc', 1.00, 'A3 bond paper', '2018-02-12', '2'),
(13, '0212-211', '2', 'print', 6.85, 'L220 Ink', '2018-02-12', '2'),
(14, '0212-211', '2', 'screen', 52.00, 'Photo Flash', '2018-02-12', '2'),
(15, '0212-211', '6', 'pad', 10.00, 'Pad Adhesive', '2018-02-12', '2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
