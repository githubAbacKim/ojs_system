-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2020 at 04:50 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ojs_possys_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `mishandle_reports`
--

CREATE TABLE `mishandle_reports` (
  `report_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(85) NOT NULL,
  `item` varchar(100) NOT NULL,
  `qty` char(5) NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `report_stat` varchar(85) NOT NULL,
  `report_date` char(10) NOT NULL,
  `report_section` varchar(100) NOT NULL,
  `section` varchar(100) NOT NULL,
  `unit` varchar(85) NOT NULL,
  `action` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mishandle_reports`
--
ALTER TABLE `mishandle_reports`
  ADD PRIMARY KEY (`report_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mishandle_reports`
--
ALTER TABLE `mishandle_reports`
  MODIFY `report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
