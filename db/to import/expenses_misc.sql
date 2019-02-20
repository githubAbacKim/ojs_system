-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2018 at 08:17 AM
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
-- Table structure for table `expenses_misc`
--

DROP TABLE IF EXISTS `expenses_misc`;
CREATE TABLE IF NOT EXISTS `expenses_misc` (
  `misc_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `misc_desc` varchar(100) NOT NULL,
  `misc_qty` char(10) NOT NULL,
  `misc_unit` varchar(85) NOT NULL,
  `misc_price` double(10,2) NOT NULL,
  `misc_note` text NOT NULL,
  `misc_date` char(11) NOT NULL,
  `misc_mon` char(2) NOT NULL,
  PRIMARY KEY (`misc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses_misc`
--

INSERT INTO `expenses_misc` (`misc_id`, `misc_desc`, `misc_qty`, `misc_unit`, `misc_price`, `misc_note`, `misc_date`, `misc_mon`) VALUES
(2, 'Snack', '1', '1', 50.00, 't-shirt print snack', '2018-02-14', '2'),
(3, 'Gildan White And Black', '1', 'order', 2833.00, 'Tau gamma shirt', '2018-02-06', '2'),
(4, 'Electric Bill', '1', 'monthly', 1274.00, 'Electric Bill Payment', '2018-01-25', '1'),
(5, 'PLDT Bill', '1', 'monthly', 2022.40, 'PLDT Payment', '2018-01-22', '1'),
(6, 'PLDT Bill', '1', 'monthly', 2022.40, 'PLDT Payment', '2018-02-20', '2'),
(7, 'Snack', '1', 'day', 56.00, 'burger', '2018-02-20', '2'),
(8, 'Electric Bill', '1', 'monthly', 1476.00, 'Payment', '2018-02-20', '2'),
(9, 'Masking Tape', '2', 'pcs', 30.00, 'none', '2018-02-06', '2'),
(10, 'Electric Bill', '1', 'monthly', 1478.31, 'none', '2018-03-20', '3'),
(11, 'Clorine', '30', 'pc', 1.00, 'none', '2018-03-13', '3'),
(12, 'Snack', '1', 'none', 80.00, 'none', '2018-03-21', '3'),
(13, 'Masking Tape', '1', 'pc', 79.00, 'none', '2018-03-21', '3'),
(14, 'Powered Soap', '3', 'pack', 7.00, 'none', '2018-03-13', '3'),
(15, 'Aircon Cleaning', '1', 'service', 1000.00, 'maintenance', '2018-03-30', '3'),
(16, 'PLDT', '1', 'monthly', 2022.40, 'none', '2018-03-28', '3'),
(17, 'Plastic Bag', '1', 'pack', 89.00, 'product silophin', '2018-04-05', '4'),
(18, 'Used News Paper', '1', 'kl', 40.00, 'For Cleaning Glass', '2018-04-05', '4'),
(19, 'Jose Snack &amp;amp; Dinner', '1', 'meal', 50.00, 'none', '2018-04-17', '4'),
(20, 'Dinner', '1', 'buy', 70.00, 'none', '2018-04-26', '4'),
(21, 'Load Sun', '1', 'load', 33.00, 'none', '2018-04-23', '4'),
(22, 'Load Sun', '1', 'load', 33.00, 'none', '2018-04-25', '4'),
(23, 'Chlorine', '10', 'pc', 1.00, 'screen cleaning', '2018-05-02', '5'),
(24, 'Electric Bill', '1', 'monthly', 1722.00, 'electric bill payment', '2018-04-21', '4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
