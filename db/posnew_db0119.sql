-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2020 at 06:10 AM
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
-- Database: `posnew_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_access`
--

CREATE TABLE `assign_access` (
  `assign_access_id` int(10) UNSIGNED NOT NULL,
  `account_type` varchar(45) NOT NULL COMMENT 'Admin or Frontdesk',
  `mac_address` varchar(85) NOT NULL,
  `computer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_access`
--

INSERT INTO `assign_access` (`assign_access_id`, `account_type`, `mac_address`, `computer`) VALUES
(25, 'admin', '1C-87-2C-72-D4-54', 'programmer'),
(26, 'ojs', '4C-ED-FB-73-AD-3F', 'store admin'),
(27, 'frontdesk', 'e0-cb-4e-b8-41-d4', 'ojs comp 2'),
(28, 'admin', '3C-95-09-7F-28-CF', 'ojs laptop hp'),
(29, 'admin', '28-E3-47-79-CF-60', 'ojs laptop 2'),
(30, 'frontdesk', '10-D0-7A-A5-07-DC', 'pldt tab'),
(31, 'admin', '5C-1C-B9-B4-BC-5F', 'kim mobile'),
(32, 'production', 'D8-0D-17-CC-AE-0B', 'Luwak');

-- --------------------------------------------------------

--
-- Table structure for table `branch_stocks`
--

CREATE TABLE `branch_stocks` (
  `branch_stocksid` int(10) UNSIGNED NOT NULL,
  `stock_id` int(10) UNSIGNED NOT NULL,
  `branch_name` varchar(85) NOT NULL,
  `bstocks_qty` char(5) NOT NULL,
  `bstocks_unit` varchar(55) NOT NULL,
  `transfer_date` char(20) NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_stocks`
--

INSERT INTO `branch_stocks` (`branch_stocksid`, `stock_id`, `branch_name`, `bstocks_qty`, `bstocks_unit`, `transfer_date`, `emp_id`) VALUES
(1, 237, 'lindugon', '2', 'pack', '2020-01-15 01:16 PM', 12),
(2, 6, 'carcar', '10', 'pcs', '2020-01-15 07:33 PM', 12),
(3, 8, 'carcar', '10', 'pcs', '2020-01-15 07:33 PM', 12),
(4, 10, 'carcar', '3', 'pack', '2020-01-15 07:33 PM', 12),
(5, 16, 'carcar', '2', 'pack', '2020-01-15 07:34 PM', 12),
(6, 24, 'carcar', '6', 'bottle', '2020-01-15 07:34 PM', 12),
(7, 37, 'carcar', '3', 'bottle', '2020-01-15 07:34 PM', 12),
(8, 38, 'carcar', '3', 'bottle', '2020-01-15 07:34 PM', 12),
(9, 7, 'lindugon', '20', 'pcs', '2020-01-15 07:35 PM', 12),
(10, 17, 'lindugon', '1', 'pack', '2020-01-15 07:35 PM', 12),
(11, 11, 'lindugon', '15', 'pack', '2020-01-17 01:10 PM', 13),
(12, 13, 'lindugon', '7', 'pack', '2020-01-17 01:10 PM', 13),
(13, 20, 'lindugon', '6', 'pack', '2020-01-17 01:10 PM', 13),
(14, 9, 'carcar', '10', 'pcs', '2020-01-17 01:11 PM', 13),
(15, 8, 'carcar', '4', 'pcs', '2020-01-17 01:11 PM', 13),
(16, 6, 'carcar', '10', 'pcs', '2020-01-17 01:11 PM', 13),
(17, 10, 'carcar', '3', 'pack', '2020-01-17 01:11 PM', 13),
(18, 11, 'carcar', '6', 'pack', '2020-01-17 01:12 PM', 13),
(19, 17, 'carcar', '1', 'pack', '2020-01-17 01:12 PM', 13),
(20, 7, 'lindugon', '60', 'pcs', '2020-01-17 01:15 PM', 13),
(21, 10, 'carcar', '3', 'pack', '2020-01-17 07:48 PM', 13),
(22, 11, 'carcar', '7', 'pack', '2020-01-17 07:49 PM', 13),
(23, 13, 'carcar', '6', 'pack', '2020-01-17 07:49 PM', 13),
(24, 17, 'carcar', '3', 'pack', '2020-01-17 07:49 PM', 13),
(25, 11, 'lindugon', '2', 'pack', '2020-01-17 07:49 PM', 13),
(26, 17, 'lindugon', '5', 'pack', '2020-01-17 07:50 PM', 13),
(27, 24, 'lindugon', '10', 'bottle', '2020-01-17 07:50 PM', 13),
(28, 237, 'lindugon', '2', 'pack', '2020-01-18 09:16 AM', 13),
(29, 237, 'carcar', '2', 'pack', '2020-01-18 09:16 AM', 13),
(30, 8, 'carcar', '10', 'pcs', '2020-01-18 10:10 AM', 13),
(31, 9, 'carcar', '4', 'pcs', '2020-01-18 12:37 PM', 13),
(32, 6, 'carcar', '11', 'pcs', '2020-01-18 12:37 PM', 13),
(33, 7, 'my_place', '36', 'pcs', '2020-01-18 02:59 PM', 13),
(34, 6, 'carcar', '20', 'pcs', '2020-01-18 08:04 PM', 12),
(35, 8, 'carcar', '10', 'pcs', '2020-01-18 08:04 PM', 12),
(36, 10, 'carcar', '3', 'pack', '2020-01-18 08:04 PM', 12),
(37, 11, 'carcar', '3', 'pack', '2020-01-18 08:05 PM', 12),
(38, 237, 'carcar', '3', 'pack', '2020-01-18 08:05 PM', 12),
(39, 237, 'carcar', '3', 'pack', '2020-01-18 08:06 PM', 12),
(40, 56, 'carcar', '6', 'bottle', '2020-01-18 08:07 PM', 12),
(41, 7, 'lindugon', '12', 'pcs', '2020-01-18 08:07 PM', 12),
(42, 10, 'lindugon', '3', 'pack', '2020-01-18 08:07 PM', 12),
(43, 237, 'lindugon', '6', 'pack', '2020-01-18 08:07 PM', 12);

-- --------------------------------------------------------

--
-- Table structure for table `cashier_logbook`
--

CREATE TABLE `cashier_logbook` (
  `logid` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `log_date` char(10) NOT NULL,
  `login_time` char(8) NOT NULL,
  `logout_time` char(8) DEFAULT NULL,
  `opening_cash` double(10,2) NOT NULL,
  `closing_cash` double(10,2) NOT NULL,
  `deposit` double(10,2) NOT NULL,
  `log_status` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier_logbook`
--

INSERT INTO `cashier_logbook` (`logid`, `emp_id`, `log_date`, `login_time`, `logout_time`, `opening_cash`, `closing_cash`, `deposit`, `log_status`) VALUES
(1, 8, '2020-01-15', '10:00 AM', '07:48 PM', 1000.00, 24525.00, 23525.00, 'close'),
(2, 8, '2020-01-17', '01:15 PM', '08:57 PM', 0.00, 65410.00, 65410.00, 'close'),
(3, 8, '2020-01-18', '07:50 AM', '08:07 PM', 0.00, 25523.00, 25523.00, 'close'),
(4, 8, '2020-01-19', '08:47 AM', NULL, 1000.00, 0.00, 0.00, 'open'),
(5, 4, '2020-01-19', '11:34 AM', NULL, 0.00, 0.00, 0.00, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `daily_output`
--

CREATE TABLE `daily_output` (
  `dailyout_id` int(10) UNSIGNED NOT NULL,
  `output_date` char(11) NOT NULL,
  `output_desc` varchar(100) NOT NULL,
  `output_unit` varchar(85) NOT NULL,
  `batch_num` char(5) NOT NULL,
  `output_qty` char(5) NOT NULL,
  `packing` char(5) NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_output`
--

INSERT INTO `daily_output` (`dailyout_id`, `output_date`, `output_desc`, `output_unit`, `batch_num`, `output_qty`, `packing`, `emp_id`) VALUES
(2, '2020-01-15', 'T-big', 'pcs.', '1', '154', '154', 32),
(3, '2020-01-15', 'T-small', 'pcs.', '2', '237', '237', 32),
(4, '2020-01-15', 'T-ube', 'pcs.', '3', '126', '126', 32),
(5, '2020-01-15', 'T-latte', 'pcs.', '3', '120', '120', 32),
(6, '2020-01-16', 'T-big', 'pcs.', '1', '144', '144', 32),
(7, '2020-01-16', 'T-small', 'pcs.', '2', '126', '126', 32),
(8, '2020-01-16', 'T-big', 'pcs.', '2', '73', '73', 32),
(9, '2020-01-16', 'T-small', 'pcs.', '3', '259', '259', 32),
(10, '2020-01-16', 'Suncake', 'pcs.', '1', '614', '51', 32),
(11, '2020-01-16', 'Bake Polvoron', 'pcs.', '1', '468', '66', 32),
(12, '2020-01-17', 'Tbig', 'pcs.', '1', '155', '155', 32),
(13, '2020-01-17', 'T-small', 'pcs.', '2', '271', '271', 32),
(14, '2020-01-17', 'T-latte', 'pcs.', '3', '137', '137', 32),
(15, '2020-01-17', 'T-ube', 'pcs.', '3', '123', '123', 32),
(16, '2020-01-17', 'Suncake', 'pcs.', '1', '735', '61', 32),
(17, '2020-01-17', 'Cheesecake', 'pcs.', '1', '134', '44', 32),
(18, '2020-01-18', 'Tbig', 'pcs.', '1', '159', '159', 32),
(19, '2020-01-18', 'Tbig', 'pcs.', '2', '151', '151', 32),
(20, '2020-01-18', 'Tsmall', 'pcs.', '3', '132', '132', 32),
(21, '2020-01-18', 'T Ube', 'pcs.', '3', '126', '126', 32),
(22, '2020-01-18', 'T Small', 'pcs.', '4', '258', '258', 32),
(23, '2020-01-18', 'T Latte', 'pcs.', '5', '134', '134', 32),
(24, '2020-01-18', 'T Small', 'pcs.', '5', '124', '124', 32),
(25, '2020-01-18', 'Suncake', 'pcs.', '1', '684', '56', 32);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(10) UNSIGNED NOT NULL,
  `emp_code` char(20) DEFAULT NULL,
  `emp_lname` varchar(45) DEFAULT NULL,
  `emp_mname` varchar(45) DEFAULT NULL,
  `emp_fname` varchar(45) DEFAULT NULL,
  `emp_bday` char(15) DEFAULT NULL,
  `emp_contact` char(11) DEFAULT NULL,
  `emp_address` varchar(85) DEFAULT NULL,
  `emp_email` varchar(45) DEFAULT NULL,
  `job_position_id` int(10) UNSIGNED NOT NULL,
  `emp_status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_code`, `emp_lname`, `emp_mname`, `emp_fname`, `emp_bday`, `emp_contact`, `emp_address`, `emp_email`, `job_position_id`, `emp_status`) VALUES
(4, '1506904', 'Abac', 'Villahermosa', 'Kim', '1990-06-21', '09434469561', 'Argao, Cebu', 'abackim1990@yahoo.com', 12, 'active'),
(8, '1805956', 'Almirante', 'None', 'Gemma', '1995-05-02', 'none', 'Argao, Cebu, Philippines', 'gemmaalmirante@gmailc.om', 4, 'active'),
(9, '1911706', 'Almirante', 'None', 'Edgar', '1970-11-15', 'none', 'Argao, Cebu, Philippines', 'ojstorta@gmail.com', 5, 'active'),
(10, '1909966', 'Dingding', 'Flores', 'Ethel Mae', '1996-09-16', '09474531485', 'Bacong, Binlod Argao Cebu', 'none', 9, 'active'),
(11, '1902986', 'Cambarijan', 'None', 'Jenelou', '1998-02-04', '09227009630', 'Bulasa, Argao', 'none', 4, 'active'),
(12, '1912826', 'Lim', 'None', 'Sheila', '1982-12-31', '09458844049', 'Binlod, Argao', 'none', 17, 'active'),
(13, '1909846', 'Goc-Ong', 'None', 'Chuna', '1984-09-07', '09753283090', 'Suba, Argao, Cebu', 'none', 10, 'active'),
(14, '1910746', 'Mamalias', 'None', 'Flora', '1974-10-14', '09331438714', 'Bulasa, Argao, Cebu', 'none', 17, 'active'),
(15, '1906996', 'Flores', 'None', 'Ma Theresa', '1999-06-04', '09383739160', 'Bulasa, Argao, Cebu', 'none', 17, 'active'),
(16, '1908916', 'Flores', 'None', 'Sherry Mae', '1991-08-18', '09321350306', 'Binload, Argao, Cebu', 'none', 10, 'active'),
(19, '1911836', 'Solano', 'None', 'Presentation', '1983-11-21', '09284891958', 'Tiguib, Argao', 'none', 16, 'active'),
(21, '1901766', 'Campaner', 'None', 'Isidro', '1976-01-01', '09425394572', 'Suba, Argao', 'none', 15, 'active'),
(22, '1912996', 'Almirante', 'Luardo', 'Jocelyn', '1999-12-05', '09663814958', 'Poblacion Argao, Cebu', 'none@none.com', 7, 'active'),
(23, '196', 'Alberca', 'None', 'Myko', NULL, '', '', '', 18, 'active'),
(26, '196', 'Rellin', 'Labrador', 'Gelamie', '', '', '', '', 21, 'active'),
(27, '196', 'Cambarijan', 'Albuera', 'Christine', NULL, '', '', '', 16, 'active'),
(29, '196', 'GEALON', 'N.', 'JAMAICA', '', '', 'BOGO', '', 21, 'active'),
(30, '196', 'BAYLOSIS', 'V.', 'MARIBETH', NULL, '', 'TIGUIB', '', 14, 'active'),
(31, '196', 'De La Torre', 'Avila', 'Elsa', '1987-02-16', '09270322027', 'Looc', 'none@none.com', 13, 'active'),
(32, '196', 'Mamac', 'Carrillo', 'Divina', '1992-07-08', '09294769431', 'Suba, Poblacion, Argao', 'pretier_14@yahoo.com', 13, 'active'),
(33, '2002906', 'Alleones', 'Villarta', 'Divina', '1990-02-01', '09327257439', 'Canbanua', 'none@none.com', 16, 'active'),
(34, '2011736', 'Sardido', 'Villegas', 'Saturnina', '1973-11-29', '09424760483', 'Lamacan, Argao', 'none@none.com', 14, 'active'),
(35, '2007886', 'Alcasid', 'Cabriana', 'Jhinnyvel', '1988-07-04', '09981543767', 'Canbantug, Argao', 'none@none.com', 16, 'active'),
(36, '206', 'ASINGUA', 'R', 'ELVIE', NULL, '', 'SUBA POBLACION', '', 22, 'active'),
(37, '206', 'ALBERCA', 'EGOS', 'AXEL JAY', NULL, '', 'LUWAK CANBANUA', '', 21, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_log`
--

CREATE TABLE `employee_log` (
  `employee_log_id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `date` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_accounts`
--

CREATE TABLE `emp_accounts` (
  `emp_account_id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `emp_username` varchar(55) NOT NULL,
  `emp_password` varchar(85) NOT NULL,
  `emp_dept` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_accounts`
--

INSERT INTO `emp_accounts` (`emp_account_id`, `emp_id`, `emp_username`, `emp_password`, `emp_dept`) VALUES
(4, 4, 'programmer_account', '01992dd2dfad9dbabb6710e1bd6ffa85faca1276', 'cashier'),
(11, 12, 'sheila_cashier@ojs', '12e66cbf3e2c8980c372b42b5618a405671ad717', 'cashier'),
(12, 8, 'gemma_cashier@ojs', '6c8cbb2118fa4df82d2c30c38f4b83dcc08affa0', 'cashier'),
(13, 8, 'gemma_prod@ojs', '8f044c295197d648fcba620b0c5cb455c22af219', 'back_room'),
(15, 9, 'edgar_prod@ojs', '1acf7ba2a245ce633e9f1a1cca1eb2da0845d407', 'production'),
(17, 9, 'edgar_cashier@ojs', '1acf7ba2a245ce633e9f1a1cca1eb2da0845d407', 'cashier'),
(20, 22, 'jojo_cashier@ojs', 'fbe55300cb74ab8b7fc84daf8e15b7265207cff7', 'cashier'),
(21, 22, 'jojo_prod@ojs', '3168c981ee00ce09834e37101ed03e2d0af79826', 'back_room'),
(22, 4, 'prog_prod', '2a5f2873392366df3aa862cdcfa05a7aa22d8d13', 'back_room'),
(23, 4, 'kimabac', 'f60722685fcc25f78b04b237e7a8c8b1bf60e082', 'cashier'),
(24, 12, 'sheila_prod@ojs', 'dba497bc0f0d218c383561f736cc7aa37e3887c9', 'back_room'),
(25, 13, 'chuna_prod@ojs', '771ec0b38c9fcb87a98dcf1f19f142c9b0bc74d6', 'back_room'),
(26, 32, 'divinaM_prod@ojs', 'ebcb037958c15dabc85da2d7e3c05819a26fdfe4', 'production'),
(27, 33, 'divinaA_prod@ojs', '1262281646a8ca0d2f033a0dbf9a7908398e53d7', 'production'),
(28, 35, 'jhinnyvel_prod@ojs', '043aa84ae6944d9f8efee9ac52daf9e7d6eadc8f', 'production'),
(29, 34, 'saturnina_prod@ojs', 'a4668bdba9590b52b527a5c67263bd1c769ebdca', 'production'),
(30, 31, 'elsaT_prod@ojs', '8e2d9cd52a5c8e246069357c39eb77c9a070fcd6', 'production');

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE `emp_attendance` (
  `emp_attendance_id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `salRate` double(10,2) NOT NULL,
  `num_OT` char(10) DEFAULT NULL,
  `t_OT` double(10,2) NOT NULL,
  `attend_date` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_attendance`
--

INSERT INTO `emp_attendance` (`emp_attendance_id`, `emp_id`, `salRate`, `num_OT`, `t_OT`, `attend_date`) VALUES
(1, 10, 0.00, '2', 50.00, '2019-12-30'),
(2, 10, 0.00, '0', 0.00, '2019-12-31'),
(3, 10, 0.00, '1', 25.00, '2020-01-01'),
(4, 10, 0.00, '1', 25.00, '2020-01-02'),
(5, 10, 0.00, '0', 0.00, '2020-01-03'),
(6, 10, 0.00, '0', 0.00, '2020-01-04'),
(7, 10, 0.00, '0', 0.00, '2020-01-05'),
(8, 13, 0.00, '2', 50.00, '2019-12-30'),
(9, 13, 0.00, '4', 100.00, '2019-12-31'),
(10, 13, 0.00, '2', 50.00, '2020-01-01'),
(11, 13, 0.00, '1', 25.00, '2020-01-02'),
(12, 13, 0.00, '0', 0.00, '2020-01-03'),
(13, 13, 0.00, '0', 0.00, '2020-01-04'),
(14, 13, 0.00, '0', 0.00, '2020-01-05'),
(15, 12, 0.00, '2', 50.00, '2019-12-30'),
(16, 12, 0.00, '4', 100.00, '2019-12-31'),
(17, 12, 0.00, '2', 50.00, '2020-01-02'),
(18, 12, 0.00, '50', 50.00, '2020-01-03'),
(19, 12, 0.00, '2', 50.00, '2020-01-04'),
(20, 12, 0.00, '2', 50.00, '2020-01-05'),
(21, 36, 0.00, '2', 50.00, '2019-12-30'),
(22, 36, 0.00, '1', 25.00, '2019-12-31'),
(23, 36, 0.00, '1', 25.00, '2020-01-02'),
(24, 36, 0.00, '1', 25.00, '2020-01-03'),
(25, 36, 0.00, '1', 25.00, '2020-01-04'),
(26, 36, 0.00, '1', 25.00, '2020-01-19'),
(27, 14, 0.00, '0', 0.00, '2019-12-30'),
(28, 14, 0.00, '0', 0.00, '2019-12-31'),
(29, 14, 0.00, '0', 0.00, '2020-01-01'),
(30, 14, 0.00, '0', 0.00, '2020-01-02'),
(31, 14, 0.00, '0', 0.00, '2020-01-03'),
(32, 14, 0.00, '0', 0.00, '2020-01-04'),
(33, 14, 0.00, '2', 50.00, '2020-01-05'),
(34, 15, 0.00, '2', 50.00, '2020-01-02'),
(35, 15, 0.00, '0', 0.00, '2020-01-03'),
(36, 15, 0.00, '0', 0.00, '2020-01-04'),
(37, 15, 0.00, '0', 0.00, '2020-01-05'),
(38, 21, 0.00, '0', 0.00, '2019-12-30'),
(39, 21, 0.00, '0', 0.00, '2019-12-31'),
(40, 21, 0.00, '0', 0.00, '2020-01-01'),
(41, 21, 0.00, '0', 0.00, '2020-01-02'),
(42, 21, 0.00, '0', 0.00, '2020-01-04'),
(43, 21, 0.00, '0', 0.00, '2020-01-05'),
(44, 23, 0.00, '0', 0.00, '2020-01-05'),
(45, 37, 0.00, '0', 0.00, '2020-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `emp_credits`
--

CREATE TABLE `emp_credits` (
  `emp_credit_id` int(10) UNSIGNED NOT NULL,
  `credit_item_name` varchar(45) NOT NULL,
  `credit_item_amount` double(10,2) NOT NULL,
  `credit_item_qty` char(3) NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `credit_date` char(10) NOT NULL,
  `credit_status` varchar(45) DEFAULT 'not_paid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_overtime`
--

CREATE TABLE `emp_overtime` (
  `emp_overtime_id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `date` char(15) NOT NULL,
  `num_hours` char(3) DEFAULT NULL,
  `from` char(20) NOT NULL,
  `to` char(20) DEFAULT NULL,
  `ot_type_id` int(10) UNSIGNED NOT NULL,
  `punch_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_salary`
--

CREATE TABLE `emp_salary` (
  `salary_id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `salary_amount` double(10,2) NOT NULL,
  `salary_date_start` char(22) NOT NULL,
  `salary_date_end` char(22) NOT NULL,
  `credit_amount` double(10,2) NOT NULL,
  `overtime_thours` char(3) NOT NULL,
  `overtime_tamount` double(10,2) NOT NULL,
  `num_days` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_misc`
--

CREATE TABLE `expenses_misc` (
  `misc_id` int(20) UNSIGNED NOT NULL,
  `misc_desc` varchar(100) NOT NULL,
  `misc_qty` char(10) NOT NULL,
  `misc_unit` varchar(85) NOT NULL,
  `misc_price` double(10,2) NOT NULL,
  `misc_note` text NOT NULL,
  `misc_date` char(11) NOT NULL,
  `emp_id` int(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses_misc`
--

INSERT INTO `expenses_misc` (`misc_id`, `misc_desc`, `misc_qty`, `misc_unit`, `misc_price`, `misc_note`, `misc_date`, `emp_id`) VALUES
(1, 'Partial Payment For Fabrication Of Steel Cabinet For The Office', '1', 'pc', 4500.00, 'for the office', '2020-01-07', 8),
(2, 'Gasoline', '8.62', 'ltr.', 1707.00, 'for delivery motorcycle', '2020-01-07', 8),
(3, 'Gasoline', '1', 'ltr.', 1707.07, 'consumed for adventure for marketing', '2020-01-07', 8),
(4, 'Axhole And Labor For Axhole Welding', '1', '1', 340.00, 'repair of delivery vehicle', '2020-01-07', 8),
(5, 'PVC MOULDING/ FOR ELECTRICAL WIRINGS', '1', '1', 1712.00, 'FOR STORE ELECTRICAL WIRING', '2020-01-07', 8),
(6, 'Tarpulin', '1', '1', 330.00, 'no smoking and waste segregation signages', '2020-01-10', 8),
(7, 'Dispossable Gloves', '1', '1', 263.00, 'production crew use', '2020-01-10', 8),
(8, 'Special Gasoline', '1', '1', 480.00, 'for delivery motorcycle use', '2020-01-10', 8),
(9, 'Muriatic For Toilet Cleaning', '1', '1', 58.75, 'cleaning maintenance', '2020-01-17', 8),
(10, 'Palengke Plastic', '1', '1', 300.00, 'for eggwhite packing', '2020-01-18', 8),
(11, 'Globe Landline Payment', '1', '1', 2899.00, 'landline  bill', '2020-01-01', 8),
(12, 'Pldt Bill Payment', '1', '1', 3344.88, 'pldt line paymment', '2020-01-18', 8),
(13, 'RENTAL PAYMENT FOR LINDOGON', '1', '1', 2000.00, 'rental payment', '2020-01-06', 8),
(14, 'BIR Payment', '1', '1', 7.00, 'bir quarterly and monthy due', '2020-01-09', 8);

-- --------------------------------------------------------

--
-- Table structure for table `expenses_prod`
--

CREATE TABLE `expenses_prod` (
  `prod_id` int(20) UNSIGNED NOT NULL,
  `prod_desc` varchar(100) NOT NULL,
  `prod_qty` char(5) NOT NULL,
  `prod_unit` varchar(85) NOT NULL,
  `prod_price` double(10,2) NOT NULL,
  `prod_note` text NOT NULL,
  `prod_date` char(11) NOT NULL,
  `prod_mon` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_stocks`
--

CREATE TABLE `expenses_stocks` (
  `expstocks_id` int(20) UNSIGNED NOT NULL,
  `expstocks_desc` varchar(100) NOT NULL,
  `expstocks_qty` char(5) NOT NULL,
  `expstocks_unit` varchar(85) NOT NULL,
  `expstocks_amount` double(10,2) NOT NULL,
  `expstocks_date` char(11) NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses_stocks`
--

INSERT INTO `expenses_stocks` (`expstocks_id`, `expstocks_desc`, `expstocks_qty`, `expstocks_unit`, `expstocks_amount`, `expstocks_date`, `emp_id`) VALUES
(1, 'Tableya Medium Pouch', '1', '1', 6500.00, '2020-01-08', 8),
(2, 'Miinutemaid Ang C2 Purchse', '1', '1', 1440.00, '2020-01-08', 8),
(3, 'Glacine And Grease Proof Purchase For Torta Packaging', '1', '1', 6772.00, '2020-01-08', 8),
(4, 'Dispossable Cups For Takeout Orders', '1', '1', 640.00, '2020-01-08', 8),
(5, 'Purchase Of Vanilla Ang Box 8 X8 X4', '1', '1', 2150.00, '2020-01-08', 8),
(6, 'Assorted Purchses From Caro Ann Marie For Production Use', '1', '1', 10457.00, '2020-01-08', 8),
(7, 'Landers Store Assorted Coffee Purchase', '1', '1', 1479.50, '2020-01-08', 8),
(8, 'Corn Oil For Production', '1', '1', 16800.00, '2020-01-08', 8),
(9, 'Purchase Of Assorted Ingredients For For Assorted Menu', '1', '1', 981.00, '2020-01-09', 8),
(10, 'Browas For Store Display', '1', '1', 3000.00, '2020-01-09', 8),
(11, 'Purchase Of Ingredients For Batchoy', '1', '1', 471.00, '2020-01-09', 8),
(12, 'Purchase Of 2 Cylinder Gas For Baking ( Regasco )', '1', '1', 6200.00, '2020-01-10', 8),
(13, 'Purchase Of 2 Cylinder Of Gasul', '1', '1', 7908.00, '2020-01-10', 8),
(14, 'Mismo And Swakto', '1', '1', 1930.00, '2020-01-11', 8),
(15, 'Ingredients For Puto', '1', '1', 682.00, '2020-01-11', 8),
(16, 'Browas ( 50 Packs )', '1', '1', 3000.00, '2020-01-13', 8),
(17, 'Cowbell Evaporated Milk ( 48 Cans )', '1', '1', 1068.00, '2020-01-13', 8),
(18, 'Peanut Butter ( 15 X 130 )', '1', '1', 1950.00, '2020-01-13', 8),
(19, 'Ice Cubes For Halo Halo And Etc.', '1', '1', 40.00, '2020-01-15', 8),
(20, 'Loy-a For Puto', '1', '1', 100.00, '2020-01-15', 8),
(21, 'Ingredients For Mango Float', '1', '1', 530.00, '2020-01-15', 8),
(22, 'Ice Cream ( 1 Gal )', '1', '1', 420.00, '2020-01-17', 8),
(23, 'Suka Silver Swan', '1', '1', 43.50, '2020-01-17', 8),
(24, 'Assorted Spices', '1', '1', 285.00, '2020-01-18', 8),
(25, 'Cowbel Condense Milk For Cheesecake', '1', '1', 192.00, '2020-01-17', 8),
(26, 'Assorted Ingredients For Halo Halo', '1', '1', 591.00, '2020-01-18', 8),
(27, 'Cowbel Condensed 2 Cans', '1', '1', 42.00, '2020-01-18', 8),
(28, 'Cowbel Condensed 15 Cans', '1', '1', 480.00, '2020-01-18', 8),
(29, 'Cowbell  Evaporated  (48 Cans )', '1', '1', 1068.00, '2020-01-18', 8),
(30, 'Alpine Evaporated Big ( 48 Cans', '1', '1', 2736.00, '2020-01-18', 8),
(31, 'Assorted Purchases From Caro Ann Marie', '1', '1', 3978.00, '2020-01-18', 8),
(32, 'Plastic For Bake Polvoron Packing', '1', '1', 645.00, '2020-01-18', 8),
(33, 'Mango Puree', '1', '1', 1800.00, '2020-01-18', 8),
(34, 'Cielo Sht', '1', '1', 2800.00, '2020-01-18', 8),
(35, 'Eggs ( 20 Trays )', '1', '1', 3700.00, '2020-01-18', 8),
(36, 'Tabliya (50 Packs ) ', '1', '1', 3700.00, '2020-01-18', 8),
(37, 'Ricor Mills Corn Oil ( 10 Taro )', '1', '1', 16800.00, '2020-01-16', 8),
(38, 'Ricor Mills Corn Oil ( 10 Taro )', '1', '1', 16800.00, '2020-01-16', 8),
(39, 'Eggs ( DAI CHERRY )', '1', '1', 12540.00, '2020-01-05', 8),
(40, 'Torta De Ube Stickers ( 100 SHTS )', '1', '1', 8000.00, '2020-01-06', 8),
(41, 'AQUAWELL MINERAL WATER ( 7 Cases )', '1', '1', 1050.00, '2020-01-07', 8),
(42, 'Calamansi ( 450 Bottles )', '1', '1', 9450.00, '2020-01-17', 8),
(43, 'Sampaloc ( 50 Packs )', '1', '1', 1000.00, '2020-01-07', 8),
(44, 'Browas ( 100 Packs)', '1', '1', 6000.00, '2020-01-18', 8),
(45, 'Cheese', '1', '1', 4147.00, '2020-01-21', 8),
(46, 'Assorted Akromont Purchses', '1', '1', 34598.00, '2020-01-21', 8),
(47, 'Coated And Salted Peanuts', '1', '1', 2695.00, '2020-01-12', 8),
(48, 'Bahalina And Etc.', '1', '1', 1692.00, '2020-01-11', 8),
(49, 'Budbud', '1', '1', 350.00, '2020-01-18', 8),
(50, 'Budbud (30 Pcs)', '1', '1', 150.00, '2020-01-19', 8);

-- --------------------------------------------------------

--
-- Table structure for table `incomestatement`
--

CREATE TABLE `incomestatement` (
  `statement_id` int(20) UNSIGNED NOT NULL,
  `gross_income` double(10,2) NOT NULL,
  `prod_exp` double(10,2) NOT NULL,
  `misc_exp` double(10,2) NOT NULL,
  `stocks_exp` double(10,2) NOT NULL,
  `salary_exp` double(10,2) NOT NULL,
  `gross_taxable` double(10,2) NOT NULL,
  `tax` double(10,2) NOT NULL,
  `net_income` double(10,2) NOT NULL,
  `statement_date` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_position`
--

CREATE TABLE `job_position` (
  `job_position_id` int(10) UNSIGNED NOT NULL,
  `job_position_name` varchar(45) NOT NULL,
  `salary_rate` double(10,2) NOT NULL,
  `salary_term_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_position`
--

INSERT INTO `job_position` (`job_position_id`, `job_position_name`, `salary_rate`, `salary_term_id`) VALUES
(4, 'CEO', 50000.00, 2),
(5, 'Vice President', 15000.00, 2),
(7, 'Supervisor', 5000.00, 2),
(8, 'Sales Lady', 250.00, 1),
(9, 'Sales Cashier', 300.00, 1),
(10, 'Baker', 300.00, 1),
(11, 'Stock Incharge', 250.00, 1),
(12, 'Programmer', 1500.00, 1),
(13, 'Oven Operator', 400.00, 1),
(14, 'Washer/Utility', 220.00, 1),
(15, 'Driver', 200.00, 1),
(16, 'Packer', 250.00, 1),
(17, 'Pro-visionary ', 250.00, 1),
(18, 'Helper', 500.00, 3),
(19, 'Scholar', 150.00, 3),
(20, 'STORE KEEPER', 220.00, 1),
(21, 'WORKING STUDENT', 200.00, 1),
(22, 'UTILITY', 250.00, 1);

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
  `action` varchar(85) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mishandle_reports`
--

INSERT INTO `mishandle_reports` (`report_id`, `type`, `item`, `qty`, `emp_id`, `report_stat`, `report_date`, `report_section`, `section`, `unit`, `action`, `desc`) VALUES
(4, 'error_entry', 'Suncake', '57', 32, 'pending', '2020-01-18', '', 'daily_output', 'pack', 'edit', 'change to 56'),
(5, 'excess', 'Suncake', '10', 32, 'pending', '2020-01-18', '', 'daily_output', 'pcs', 'edit', 'recording'),
(6, 'damages', 'Suncake', '2', 35, 'pending', '2020-01-18', '', 'packing', 'pcs', 'edit', 'recording'),
(7, 'excess', 'Suncake', '1', 12, 'pending', '2020-12-18', '', 'new_stocks', 'pack', 'edit', 'excess quantity'),
(8, 'error_entry', 'Suncake', '56', 8, 'confirm', '2020-01-18', '', 'daily_output', 'pack', 'edit', 'change entry from 57 to 56'),
(14, 'error_entry', 'T Small', '66', 33, 'confirm', '2020-01-19', '', 'new_stocks', 'pcs', 'delete', 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_code` char(20) NOT NULL,
  `cust_name` varchar(80) DEFAULT NULL,
  `order_date` char(20) NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `order_bill_amount` double(10,2) DEFAULT '0.00',
  `order_cash_amount` double(10,2) DEFAULT '0.00',
  `order_type` varchar(20) NOT NULL,
  `order_status` char(10) DEFAULT 'not_paid',
  `order_discount` double(10,2) DEFAULT '0.00',
  `check_in_id` int(10) UNSIGNED DEFAULT NULL,
  `sub_order_type` varchar(20) DEFAULT NULL,
  `order_downpayment` double(10,2) DEFAULT '0.00',
  `tax_rate` double(10,2) DEFAULT '0.00',
  `tax_amount` double(10,2) DEFAULT '0.00',
  `pickup_date` char(16) DEFAULT NULL,
  `or_num` char(5) DEFAULT NULL,
  `pickup_time` char(8) DEFAULT NULL,
  `notes` text,
  `cust_tin` char(15) DEFAULT NULL,
  `cust_address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_code`, `cust_name`, `order_date`, `emp_id`, `order_bill_amount`, `order_cash_amount`, `order_type`, `order_status`, `order_discount`, `check_in_id`, `sub_order_type`, `order_downpayment`, `tax_rate`, `tax_amount`, `pickup_date`, `or_num`, `pickup_time`, `notes`, `cust_tin`, `cust_address`) VALUES
(1, 'OC0115-1', 'CASH', '2020-01-15 10:00 AM', 8, 4805.00, 4805.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(2, 'OC0115-2', 'CASH', '2020-01-15 10:22 AM', 8, 65.00, 65.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(3, 'OC0115-3', 'CASH', '2020-01-15 10:44 AM', 8, 197.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(4, 'OC0115-4', 'CASH', '2020-01-15 11:05 AM', 8, 80.00, 80.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(5, 'OC0115-5', 'CASH', '2020-01-15 11:12 AM', 8, 135.00, 150.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(6, 'OC0115-6', 'CASH', '2020-01-15 11:17 AM', 8, 285.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(7, 'OC0115-7', 'CASH', '2020-01-15 11:23 AM', 8, 457.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(8, 'OC0115-8', 'CASH', '2020-01-15 11:26 AM', 8, 50.00, 50.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(9, 'OC0115-9', 'CASH', '2020-01-15 11:33 AM', 8, 300.00, 300.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(10, 'OC0115-10', 'CASH', '2020-01-15 11:41 AM', 8, 420.00, 420.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(11, 'OC0115-11', 'CASH', '2020-01-15 12:25 PM', 8, 300.00, 300.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(12, 'OC0115-12', 'CASH', '2020-01-15 12:26 PM', 8, 200.00, 200.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(13, 'OC0115-13', 'CASH', '2020-01-15 12:26 PM', 8, 235.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(14, 'OC0115-14', 'CASH', '2020-01-15 12:28 PM', 8, 180.00, 190.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(15, 'OC0115-15', 'CASH', '2020-01-15 12:29 PM', 8, 45.00, 50.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(16, 'OC0115-16', 'CASH', '2020-01-15 12:46 PM', 8, 30.00, 30.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(17, 'OC0115-17', 'CASH', '2020-01-15 12:48 PM', 8, 255.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(18, 'OC0115-18', 'CASH', '2020-01-15 04:49 PM', 8, 10648.00, 10648.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(19, 'OC0115-19', 'CASH', '2020-01-15 05:27 PM', 8, 1464.00, 1464.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(20, 'OC0115-20', 'CASH', '2020-01-15 05:29 PM', 8, 200.00, 200.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(21, 'OC0115-21', 'CASH', '2020-01-15 05:32 PM', 8, 120.00, 120.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(22, 'OC0115-22', 'CASH', '2020-01-15 05:34 PM', 8, 45.00, 45.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(23, 'OC0115-23', 'CASH', '2020-01-15 05:34 PM', 8, 260.00, 260.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(24, 'OC0115-24', 'CASH', '2020-01-15 05:40 PM', 8, 236.00, 236.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(25, 'OC0115-25', 'CASH', '2020-01-15 05:53 PM', 8, 180.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(26, 'OC0115-26', 'CASH', '2020-01-15 05:55 PM', 8, 115.00, 115.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(27, 'OC0115-27', 'CASH', '2020-01-15 05:56 PM', 8, 680.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(28, 'OC0115-28', 'CASH', '2020-01-15 05:59 PM', 8, 180.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(29, 'OC0115-29', 'CASH', '2020-01-15 06:00 PM', 8, 220.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(30, 'OC0115-30', 'CASH', '2020-01-15 06:02 PM', 8, 17.00, 20.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(31, 'OC0115-31', 'CASH', '2020-01-15 06:03 PM', 8, 120.00, 120.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(32, 'OC0115-32', 'CASH', '2020-01-15 06:06 PM', 8, 75.00, 100.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(33, 'OC0115-33', 'CASH', '2020-01-15 06:07 PM', 8, 450.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(34, 'OC0115-34', 'CASH', '2020-01-15 06:15 PM', 8, 50.00, 50.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(35, 'OC0115-35', 'CASH', '2020-01-15 06:31 PM', 8, 54.00, 54.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(36, 'OC0115-36', 'CASH', '2020-01-15 06:33 PM', 8, 25.00, 25.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(37, 'OC0115-37', 'CASH', '2020-01-15 06:54 PM', 8, 275.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(38, 'OC0115-38', 'CASH', '2020-01-15 07:09 PM', 8, 50.00, 100.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(39, 'OC0115-39', 'CASH', '2020-01-15 07:09 PM', 8, 200.00, 200.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(40, 'OC0117-40', 'CASH', '2020-01-17 03:13 PM', 8, 22755.00, 22755.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(42, 'OC0117-41', 'CASH', '2020-01-17 07:27 PM', 8, 85.00, 85.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(43, 'OC0117-42', 'CASH', '2020-01-17 07:29 PM', 8, 90.00, 90.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(44, 'OC0117-43', 'CASH', '2020-01-17 07:33 PM', 8, 38181.00, 38181.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(45, 'OC0117-44', 'CASH', '2020-01-17 08:45 PM', 8, 2735.00, 2735.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(46, 'OC0117-45', 'CASH', '2020-01-17 08:53 PM', 8, 300.00, 300.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(47, 'OC0118-46', 'CASH', '2020-01-18 07:50 AM', 8, 180.00, 200.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(48, 'OC0118-47', 'CASH', '2020-01-18 09:04 AM', 8, 8400.00, 8400.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(49, 'OC0118-48', 'CASH', '2020-01-18 09:05 AM', 8, 260.00, 260.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(50, 'OC0118-49', 'CASH', '2020-01-18 10:27 AM', 8, 3945.00, 3945.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(51, 'OC0118-50', 'CASH', '2020-01-18 10:41 AM', 8, 335.00, 335.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(52, 'OC0118-51', 'CASH', '2020-01-18 11:15 AM', 8, 623.00, 1023.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(53, 'OC0118-52', 'CASH', '2020-01-18 11:41 AM', 8, 161.00, 200.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(54, 'OC0118-53', 'CASH', '2020-01-18 12:04 PM', 8, 210.00, 1010.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(55, 'OC0118-54', 'CASH', '2020-01-18 12:06 PM', 8, 450.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(56, 'OC0118-55', 'CASH', '2020-01-18 12:07 PM', 8, 140.00, 150.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(57, 'OC0118-56', 'CASH', '2020-01-18 12:08 PM', 8, 105.00, 105.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(58, 'OC0118-57', 'CASH', '2020-01-18 12:08 PM', 8, 80.00, 100.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(59, 'OC0118-58', 'CASH', '2020-01-18 12:09 PM', 8, 105.00, 105.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(60, 'OC0118-59', 'CASH', '2020-01-18 12:09 PM', 8, 120.00, 120.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(61, 'OC0118-60', 'CASH', '2020-01-18 12:39 PM', 8, 15.00, 15.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(62, 'OC0118-61', 'CASH', '2020-01-18 12:39 PM', 8, 345.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(63, 'OC0118-62', 'CASH', '2020-01-18 12:40 PM', 8, 60.00, 60.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(64, 'OC0118-63', 'CASH', '2020-01-18 12:46 PM', 8, 440.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(65, 'OC0118-64', 'CASH', '2020-01-18 01:06 PM', 8, 180.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(66, 'OC0118-65', 'CASH', '2020-01-18 01:08 PM', 8, 515.00, 1015.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(67, 'OC0118-66', 'CASH', '2020-01-18 01:10 PM', 8, 500.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(68, 'OC0118-67', 'CASH', '2020-01-18 01:33 PM', 8, 83.00, 100.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(69, 'OC0118-68', 'CASH', '2020-01-18 01:38 PM', 8, 375.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(70, 'OC0118-69', 'CASH', '2020-01-18 01:53 PM', 8, 315.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(71, 'OC0118-70', 'CASH', '2020-01-18 02:03 PM', 8, 80.00, 100.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(72, 'OC0118-71', 'CASH', '2020-01-18 02:03 PM', 8, 245.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(73, 'OC0118-72', 'CASH', '2020-01-18 02:05 PM', 8, 240.00, 250.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(74, 'OC0118-73', 'CASH', '2020-01-18 02:28 PM', 8, 200.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(75, 'OC0118-74', 'CASH', '2020-01-18 02:41 PM', 8, 135.00, 150.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(76, 'OC0118-75', 'CASH', '2020-01-18 02:42 PM', 8, 336.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(77, 'OC0118-76', 'CASH', '2020-01-18 02:44 PM', 8, 160.00, 160.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(78, 'OC0118-77', 'CASH', '2020-01-18 03:01 PM', 8, 336.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(79, 'OC0118-78', 'CASH', '2020-01-18 03:03 PM', 8, 100.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(80, 'OC0118-79', 'CASH', '2020-01-18 03:06 PM', 8, 110.00, 110.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(81, 'OC0118-80', 'CASH', '2020-01-18 03:08 PM', 8, 320.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(82, 'OC0118-81', 'CASH', '2020-01-18 03:14 PM', 8, 255.00, 255.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(83, 'OC0118-82', 'CASH', '2020-01-18 03:16 PM', 8, 20.00, 20.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(84, 'OC0118-83', 'CASH', '2020-01-18 03:24 PM', 8, 140.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(85, 'OC0118-84', 'CASH', '2020-01-18 03:25 PM', 8, 315.00, 515.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(86, 'OC0118-85', 'CASH', '2020-01-18 03:30 PM', 8, 60.00, 60.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(87, 'OC0118-86', 'CASH', '2020-01-18 03:31 PM', 8, 350.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(88, 'OC0118-87', 'CASH', '2020-01-18 04:04 PM', 8, 420.00, 420.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(89, 'OC0118-88', 'CASH', '2020-01-18 04:14 PM', 8, 25.00, 25.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(90, 'OC0118-89', 'CASH', '2020-01-18 04:16 PM', 8, 50.00, 50.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(91, 'OC0118-90', 'CASH', '2020-01-18 04:16 PM', 8, 120.00, 120.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(92, 'OC0118-91', 'CASH', '2020-01-18 04:20 PM', 8, 40.00, 40.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(93, 'OC0118-92', 'CASH', '2020-01-18 04:33 PM', 8, 195.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(95, 'OC0118-94', 'CASH', '2020-01-18 04:46 PM', 8, 515.00, 515.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(96, 'OC0118-95', 'CASH', '2020-01-18 04:50 PM', 8, 90.00, 100.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(97, 'OC0118-96', 'CASH', '2020-01-18 04:50 PM', 8, 125.00, 125.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(98, 'OC0118-97', 'CASH', '2020-01-18 04:53 PM', 8, 50.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(99, 'OC0118-98', 'CASH', '2020-01-18 04:56 PM', 8, 500.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(101, 'OC0118-99', 'CASH', '2020-01-18 05:02 PM', 8, 105.00, 105.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(102, 'OC0118-100', 'CASH', '2020-01-18 05:09 PM', 8, 76.00, 100.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(103, 'OC0118-101', 'CASH', '2020-01-18 05:10 PM', 8, 210.00, 1010.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(104, 'OC0118-102', 'CASH', '2020-01-18 05:11 PM', 8, 340.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(105, 'OC0118-103', 'CASH', '2020-01-18 05:15 PM', 8, 120.00, 120.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(106, 'OC0118-104', 'CASH', '2020-01-18 05:16 PM', 8, 240.00, 240.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(107, 'OC0118-105', 'CASH', '2020-01-18 05:23 PM', 8, 1000.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(108, 'OC0118-106', 'CASH', '2020-01-18 05:27 PM', 8, 2700.00, 3000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(109, 'OC0118-107', 'CASH', '2020-01-18 05:33 PM', 8, 1035.00, 1500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(110, 'OC0118-108', 'CASH', '2020-01-18 05:35 PM', 8, 80.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(111, 'OC0118-109', 'CASH', '2020-01-18 05:37 PM', 8, 120.00, 120.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(112, 'OC0118-110', 'CASH', '2020-01-18 05:56 PM', 8, 195.00, 200.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(113, 'OC0118-111', 'CASH', '2020-01-18 06:00 PM', 8, 25.00, 100.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(114, 'OC0118-112', 'CASH', '2020-01-18 06:10 PM', 8, 298.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(115, 'OC0118-113', 'CASH', '2020-01-18 06:12 PM', 8, 530.00, 530.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(116, 'OC0118-114', 'CASH', '2020-01-18 06:22 PM', 8, 75.00, 75.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(117, 'OC0118-115', 'CASH', '2020-01-18 06:29 PM', 8, 260.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(118, 'OC0118-116', 'CASH', '2020-01-18 06:31 PM', 8, 175.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(119, 'OC0118-117', 'CASH', '2020-01-18 06:31 PM', 8, 90.00, 100.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(120, 'OC0118-118', 'CASH', '2020-01-18 06:32 PM', 8, 155.00, 205.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(121, 'OC0118-119', 'CASH', '2020-01-18 06:36 PM', 8, 25.00, 100.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(122, 'OC0118-120', 'CASH', '2020-01-18 06:39 PM', 8, 233.00, 240.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(123, 'OC0118-121', 'CASH', '2020-01-18 07:04 PM', 8, 185.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(124, 'OC0118-122', 'CASH', '2020-01-18 07:07 PM', 8, 45.00, 100.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(125, 'OC0118-123', 'CASH', '2020-01-18 07:21 PM', 8, 480.00, 480.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(126, 'OC0118-124', 'CASH', '2020-01-18 07:36 PM', 8, 85.00, 85.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(127, 'OC0118-125', 'CASH', '2020-01-18 07:37 PM', 8, 120.00, 120.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(128, 'OC0118-126', 'CASH', '2020-01-18 07:51 PM', 8, 80.00, 500.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(129, 'OC0118-127', 'CASH', '2020-01-18 07:54 PM', 8, 220.00, 220.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(130, 'OC0118-128', 'CASH', '2020-01-18 07:57 PM', 8, 25.00, 25.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(132, 'OC0119-129', 'CASH', '2020-01-19 08:47 AM', 8, 415.00, 415.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(133, 'OC0119-130', 'CASH', '2020-01-19 11:32 AM', 8, 4717.00, 4717.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(134, 'OC0119-131', 'CASH', '2020-01-19 11:37 AM', 4, 0.00, 0.00, 'purchace', 'not_paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, '', NULL, NULL, '000-000-000', NULL),
(135, 'OC0119-132', 'CASH', '2020-01-19 12:29 PM', 8, 670.00, 670.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(136, 'OC0119-133', 'CASH', '2020-01-19 12:34 PM', 8, 0.00, 0.00, 'purchace', 'not_paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, '', NULL, NULL, '000-000-000', NULL),
(137, 'OC0119-134', 'CASH', '2020-01-19 12:35 PM', 8, 520.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(138, 'OC0119-135', 'CASH', '2020-01-19 12:37 PM', 8, 883.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(139, 'OC0119-136', 'CASH', '2020-01-19 01:04 PM', 8, 15.00, 50.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(140, 'OC0119-137', 'CASH', '2020-01-19 01:09 PM', 8, 85.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_item`
--

CREATE TABLE `ordered_item` (
  `order_item_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `order_price` double(10,2) NOT NULL,
  `order_qty` char(4) NOT NULL,
  `order_date` char(22) NOT NULL,
  `order_stock_type` char(25) NOT NULL,
  `stock_id` int(10) UNSIGNED NOT NULL,
  `order_unit` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered_item`
--

INSERT INTO `ordered_item` (`order_item_id`, `order_id`, `order_name`, `order_price`, `order_qty`, `order_date`, `order_stock_type`, `stock_id`, `order_unit`) VALUES
(1, 1, 'Torta S', 30.00, '48', '2020-01-15', 'instock', 6, 'pcs'),
(2, 1, 'Bake Polvoron', 38.00, '5', '2020-01-15', 'instock', 11, 'pack'),
(3, 1, 'Suncake', 45.00, '14', '2020-01-15', 'instock', 10, 'pack'),
(4, 1, 'Sampaloc', 35.00, '4', '2020-01-15', 'instock', 19, 'pack'),
(5, 1, 'Calamansi Juice', 30.00, '1', '2020-01-15', 'instock', 24, 'bottle'),
(6, 1, 'BudBud', 25.00, '1', '2020-01-15', 'instock', 167, '3pcs'),
(7, 1, 'Torta De Ube', 35.00, '25', '2020-01-15', 'instock', 8, 'pcs'),
(8, 1, 'Boxes SP Small 12', 20.00, '1', '2020-01-15', 'instock', 48, 'pc'),
(9, 1, 'Torta B', 40.00, '13', '2020-01-15', 'instock', 7, 'pcs'),
(10, 1, 'Box SP Big 6', 20.00, '1', '2020-01-15', 'instock', 129, 'pc'),
(11, 1, 'Cheesecake New', 37.00, '5', '2020-01-15', 'instock', 237, 'pack'),
(12, 1, 'Torta Latte', 35.00, '6', '2020-01-15', 'instock', 9, 'pcs'),
(13, 1, 'Siomai', 9.00, '10', '2020-01-15', 'nonstock', 164, 'pc'),
(14, 1, 'Halo-halo', 85.00, '4', '2020-01-15', 'nonstock', 136, 'serve'),
(15, 1, 'Mineral', 15.00, '1', '2020-01-15', 'instock', 56, 'bottle'),
(16, 1, 'Puto', 25.00, '1', '2020-01-15', 'instock', 144, 'set'),
(17, 1, 'Hot Choco', 25.00, '2', '2020-01-15', 'nonstock', 27, 'cup'),
(18, 2, 'Tapioca', 65.00, '1', '2020-01-15', 'instock', 241, 'cup'),
(19, 3, 'Torta B', 40.00, '4', '2020-01-15', 'instock', 7, 'pcs'),
(20, 3, 'BudBud', 25.00, '1', '2020-01-15', 'instock', 167, '3pcs'),
(21, 3, 'Coke Swakto', 12.00, '1', '2020-01-15', 'instock', 26, 'bottle'),
(22, 4, 'Torta B', 40.00, '2', '2020-01-15', 'instock', 7, 'pcs'),
(23, 5, 'Torta S', 30.00, '3', '2020-01-15', 'instock', 6, 'pcs'),
(24, 5, 'Macaroons', 45.00, '1', '2020-01-15', 'instock', 13, 'pack'),
(25, 6, 'Calamansi Juice', 30.00, '4', '2020-01-15', 'instock', 24, 'bottle'),
(26, 6, 'Mango Float', 120.00, '1', '2020-01-15', 'instock', 22, 'pack'),
(27, 6, 'Minute Pouch', 15.00, '3', '2020-01-15', 'instock', 52, 'pouch'),
(28, 7, 'Torta S', 30.00, '4', '2020-01-15', 'instock', 6, 'pcs'),
(29, 7, 'Suncake', 45.00, '2', '2020-01-15', 'instock', 10, 'pack'),
(30, 7, 'Tablea White M', 180.00, '1', '2020-01-15', 'instock', 154, 'pouch'),
(31, 7, 'Cheesecake New', 37.00, '1', '2020-01-15', 'instock', 237, 'pack'),
(32, 7, 'Calamansi Juice', 30.00, '1', '2020-01-15', 'instock', 24, 'bottle'),
(33, 8, 'BudBud', 25.00, '2', '2020-01-15', 'instock', 167, '3pcs'),
(34, 9, 'Torta S', 30.00, '10', '2020-01-15', 'instock', 6, 'pcs'),
(35, 10, 'Torta Latte', 35.00, '12', '2020-01-15', 'instock', 9, 'pcs'),
(36, 11, 'Torta S', 30.00, '10', '2020-01-15', 'instock', 6, 'pcs'),
(37, 12, 'Torta Latte', 35.00, '2', '2020-01-15', 'instock', 9, 'pcs'),
(38, 12, 'Torta De Ube', 35.00, '2', '2020-01-15', 'instock', 8, 'pcs'),
(39, 12, 'Torta S', 30.00, '2', '2020-01-15', 'instock', 6, 'pcs'),
(40, 13, 'Torta B', 40.00, '2', '2020-01-15', 'instock', 7, 'pcs'),
(41, 13, 'Cheesecake New', 37.00, '1', '2020-01-15', 'instock', 237, 'pack'),
(42, 13, 'Bake Polvoron', 38.00, '1', '2020-01-15', 'instock', 11, 'pack'),
(43, 13, 'Salted Peanut', 80.00, '1', '2020-01-15', 'instock', 45, 'container'),
(44, 14, 'Torta S', 30.00, '6', '2020-01-15', 'instock', 6, 'pcs'),
(45, 15, 'Macaroons', 45.00, '1', '2020-01-15', 'instock', 13, 'pack'),
(46, 16, 'Calamansi Juice', 30.00, '1', '2020-01-15', 'instock', 24, 'bottle'),
(47, 17, 'Squid Roll', 25.00, '2', '2020-01-15', 'nonstock', 162, 'set'),
(48, 17, 'Tempura', 25.00, '2', '2020-01-15', 'nonstock', 163, 'set'),
(49, 17, 'French Fries', 70.00, '1', '2020-01-15', 'nonstock', 165, 'serve'),
(50, 17, 'Halo-halo', 85.00, '1', '2020-01-15', 'nonstock', 136, 'serve'),
(51, 18, 'Torta Latte', 35.00, '30', '2020-01-15', 'instock', 9, 'pcs'),
(52, 18, 'Torta S', 30.00, '95', '2020-01-15', 'instock', 6, 'pcs'),
(53, 18, 'Torta B', 40.00, '36', '2020-01-15', 'instock', 7, 'pcs'),
(54, 18, 'Torta De Ube', 35.00, '24', '2020-01-15', 'instock', 8, 'pcs'),
(55, 18, 'Boxes SP Small 12', 20.00, '3', '2020-01-15', 'instock', 48, 'pc'),
(56, 18, 'Suncake', 45.00, '21', '2020-01-15', 'instock', 10, 'pack'),
(57, 18, 'Cheesecake New', 37.00, '6', '2020-01-15', 'instock', 237, 'pack'),
(58, 18, 'Bake Polvoron', 38.00, '6', '2020-01-15', 'instock', 11, 'pack'),
(59, 18, 'Macaroons', 45.00, '4', '2020-01-15', 'instock', 13, 'pack'),
(60, 18, 'Browas', 80.00, '9', '2020-01-15', 'instock', 17, 'pack'),
(61, 18, 'Sampaloc', 35.00, '3', '2020-01-15', 'instock', 19, 'pack'),
(62, 18, 'Coke Swakto', 12.00, '4', '2020-01-15', 'instock', 26, 'bottle'),
(63, 18, 'Mismo', 17.00, '5', '2020-01-15', 'instock', 25, 'bottle'),
(64, 18, 'Box Fab Big', 20.00, '2', '2020-01-15', 'instock', 131, 'pc'),
(65, 18, 'BudBud', 25.00, '5', '2020-01-15', 'instock', 167, '3pcs'),
(66, 18, 'Mineral', 15.00, '6', '2020-01-15', 'instock', 56, 'bottle'),
(67, 18, 'C2', 15.00, '1', '2020-01-15', 'instock', 58, 'bottle'),
(68, 18, 'Chocolite Big', 30.00, '1', '2020-01-15', 'instock', 33, 'pc'),
(69, 18, 'Calamansi Juice', 30.00, '2', '2020-01-15', 'instock', 24, 'bottle'),
(70, 18, 'Ice Coffee', 70.00, '1', '2020-01-15', 'nonstock', 229, 'glass'),
(71, 18, 'Squid Roll', 25.00, '2', '2020-01-15', 'nonstock', 162, 'set'),
(72, 18, 'Halo-halo', 85.00, '2', '2020-01-15', 'nonstock', 136, 'serve'),
(73, 18, 'Puto', 25.00, '14', '2020-01-15', 'instock', 144, 'set'),
(74, 18, 'Hot Choco', 25.00, '7', '2020-01-15', 'nonstock', 27, 'cup'),
(75, 18, 'Bam-i', 75.00, '1', '2020-01-15', 'instock', 214, 'pack'),
(76, 18, 'Toron', 40.00, '1', '2020-01-15', 'instock', 20, 'pack'),
(77, 18, 'Mango Float', 120.00, '1', '2020-01-15', 'instock', 22, 'pack'),
(78, 18, 'Shake Mango', 60.00, '5', '2020-01-15', 'nonstock', 137, 'serving'),
(79, 18, 'Black Rice', 100.00, '1', '2020-01-15', 'instock', 43, 'kil'),
(80, 18, 'Sukarap', 65.00, '1', '2020-01-15', 'instock', 37, 'bottle'),
(81, 19, 'Torta De Ube', 35.00, '8', '2020-01-15', 'instock', 8, 'pcs'),
(82, 19, 'Torta Latte', 35.00, '8', '2020-01-15', 'instock', 9, 'pcs'),
(83, 19, 'Torta S', 30.00, '8', '2020-01-15', 'instock', 6, 'pcs'),
(84, 19, 'Suncake', 45.00, '8', '2020-01-15', 'instock', 10, 'pack'),
(85, 19, 'Bake Polvoron', 38.00, '8', '2020-01-15', 'instock', 11, 'pack'),
(86, 20, 'Torta B', 40.00, '5', '2020-01-15', 'instock', 7, 'pcs'),
(87, 21, 'Leche Plan', 120.00, '1', '2020-01-15', 'instock', 21, 'pack'),
(88, 22, 'Suncake', 45.00, '1', '2020-01-15', 'instock', 10, 'pack'),
(89, 23, 'Torta B', 40.00, '3', '2020-01-15', 'instock', 7, 'pcs'),
(90, 23, 'Torta De Ube', 35.00, '4', '2020-01-15', 'instock', 8, 'pcs'),
(91, 24, 'Bake Polvoron', 38.00, '2', '2020-01-15', 'instock', 11, 'pack'),
(92, 24, 'Torta B', 40.00, '2', '2020-01-15', 'instock', 7, 'pcs'),
(93, 24, 'Suncake', 45.00, '1', '2020-01-15', 'instock', 10, 'pack'),
(94, 24, 'Torta De Ube', 35.00, '1', '2020-01-15', 'instock', 8, 'pcs'),
(95, 25, 'Torta S', 30.00, '6', '2020-01-15', 'instock', 6, 'pcs'),
(96, 26, 'Torta B', 40.00, '2', '2020-01-15', 'instock', 7, 'pcs'),
(97, 26, 'Torta De Ube', 35.00, '1', '2020-01-15', 'instock', 8, 'pcs'),
(98, 27, 'Torta De Ube', 35.00, '6', '2020-01-15', 'instock', 8, 'pcs'),
(99, 27, 'Torta Latte', 35.00, '6', '2020-01-15', 'instock', 9, 'pcs'),
(100, 27, 'Torta S', 30.00, '6', '2020-01-15', 'instock', 6, 'pcs'),
(101, 27, 'Box Fab Small', 20.00, '1', '2020-01-15', 'instock', 132, 'pc'),
(102, 27, 'Suncake', 45.00, '1', '2020-01-15', 'instock', 10, 'pack'),
(103, 27, 'C2', 15.00, '1', '2020-01-15', 'instock', 58, 'bottle'),
(104, 28, 'Torta S', 30.00, '6', '2020-01-15', 'instock', 6, 'pcs'),
(105, 29, 'Suncake', 45.00, '2', '2020-01-15', 'instock', 10, 'pack'),
(106, 29, 'Torta Latte', 35.00, '2', '2020-01-15', 'instock', 9, 'pcs'),
(107, 29, 'Torta S', 30.00, '2', '2020-01-15', 'instock', 6, 'pcs'),
(108, 30, 'Mismo', 17.00, '1', '2020-01-15', 'instock', 25, 'bottle'),
(110, 31, 'Torta B', 40.00, '3', '2020-01-15', 'instock', 7, 'pcs'),
(111, 32, 'Bam-i', 75.00, '1', '2020-01-15', 'instock', 214, 'pack'),
(112, 33, 'Suncake', 45.00, '4', '2020-01-15', 'instock', 10, 'pack'),
(113, 33, 'Torta S', 30.00, '9', '2020-01-15', 'instock', 6, 'pcs'),
(114, 34, 'Puto', 25.00, '2', '2020-01-15', 'instock', 144, 'set'),
(115, 35, 'Siomai', 9.00, '6', '2020-01-15', 'nonstock', 164, 'pc'),
(116, 36, 'Squid Roll', 25.00, '1', '2020-01-15', 'nonstock', 162, 'set'),
(117, 37, 'Torta S', 30.00, '4', '2020-01-15', 'instock', 6, 'pcs'),
(118, 37, 'Squid Roll', 25.00, '2', '2020-01-15', 'nonstock', 162, 'set'),
(119, 37, 'Shake Mango', 60.00, '1', '2020-01-15', 'nonstock', 137, 'serving'),
(120, 37, 'Mineral', 15.00, '1', '2020-01-15', 'instock', 56, 'bottle'),
(121, 37, 'Calamansi Juice', 30.00, '1', '2020-01-15', 'instock', 24, 'bottle'),
(122, 38, 'Squid Roll', 25.00, '2', '2020-01-15', 'nonstock', 162, 'set'),
(124, 39, 'Torta B', 40.00, '5', '2020-01-15', 'instock', 7, 'pcs'),
(168, 40, 'Torta De Ube', 35.00, '38', '2020-01-17', 'instock', 8, 'pcs'),
(169, 40, 'Bake Polvoron', 38.00, '31', '2020-01-17', 'instock', 11, 'pack'),
(170, 40, 'Puto', 25.00, '10', '2020-01-17', 'instock', 144, 'set'),
(171, 40, 'Hot Choco', 25.00, '9', '2020-01-17', 'nonstock', 27, 'cup'),
(172, 40, 'Calamansi Juice', 30.00, '7', '2020-01-17', 'instock', 24, 'bottle'),
(173, 40, 'Suncake', 45.00, '44', '2020-01-17', 'instock', 10, 'pack'),
(174, 40, 'Torta B', 40.00, '122', '2020-01-17', 'instock', 7, 'pcs'),
(175, 40, 'Torta S', 30.00, '196', '2020-01-17', 'instock', 6, 'pcs'),
(176, 40, 'Box SP Big 12', 20.00, '3', '2020-01-17', 'instock', 130, 'pc'),
(177, 40, 'Boxes SP Small 12', 20.00, '7', '2020-01-17', 'instock', 48, 'pc'),
(178, 40, 'Macaroons', 45.00, '5', '2020-01-17', 'instock', 13, 'pack'),
(179, 40, 'Boxes SP Small 4', 20.00, '4', '2020-01-17', 'instock', 46, 'pc'),
(180, 40, 'Tablea White M', 180.00, '7', '2020-01-17', 'instock', 154, 'pouch'),
(181, 40, 'Sukarap', 65.00, '1', '2020-01-17', 'instock', 37, 'bottle'),
(182, 40, 'Cheesecake New', 37.00, '7', '2020-01-17', 'instock', 237, 'pack'),
(183, 40, 'Torta Latte', 35.00, '44', '2020-01-17', 'instock', 9, 'pcs'),
(184, 40, 'Mismo', 17.00, '5', '2020-01-17', 'instock', 25, 'bottle'),
(185, 40, 'Toron', 40.00, '1', '2020-01-17', 'instock', 20, 'pack'),
(186, 40, 'Browas', 80.00, '17', '2020-01-17', 'instock', 17, 'pack'),
(187, 40, 'Shake Strawberry', 70.00, '1', '2020-01-17', 'nonstock', 140, 'serving'),
(188, 40, 'Shake Banana', 60.00, '1', '2020-01-17', 'nonstock', 138, 'serving'),
(189, 40, 'Mango Float', 120.00, '1', '2020-01-17', 'instock', 22, 'pack'),
(190, 40, 'Siomai', 9.00, '2', '2020-01-17', 'nonstock', 164, 'pc'),
(191, 40, 'Halo-halo', 85.00, '4', '2020-01-17', 'nonstock', 136, 'serve'),
(192, 40, 'Shake Mango', 60.00, '2', '2020-01-17', 'nonstock', 137, 'serving'),
(193, 40, 'Ngohiong', 12.00, '5', '2020-01-17', 'instock', 239, 'pc'),
(194, 40, 'C2', 15.00, '3', '2020-01-17', 'instock', 58, 'bottle'),
(195, 40, 'Brewed Coffee', 55.00, '1', '2020-01-17', 'instock', 168, 'cup'),
(196, 40, 'Mineral', 15.00, '5', '2020-01-17', 'instock', 56, 'bottle'),
(197, 40, 'Coke Swakto', 12.00, '5', '2020-01-17', 'instock', 26, 'bottle'),
(198, 40, 'Shake Guyavano', 60.00, '1', '2020-01-17', 'nonstock', 141, 'serving'),
(199, 40, 'Chicken Salad', 90.00, '1', '2020-01-17', 'instock', 150, 'pack'),
(200, 40, 'Black Tea', 15.00, '1', '2020-01-17', 'instock', 160, 'pc'),
(201, 40, 'Leche Plan', 120.00, '1', '2020-01-17', 'instock', 21, 'pack'),
(202, 40, 'Box SP Big 6', 20.00, '3', '2020-01-17', 'instock', 129, 'pc'),
(203, 40, 'Peañato', 40.00, '2', '2020-01-17', 'instock', 16, 'pack'),
(204, 40, 'Sampaloc', 35.00, '3', '2020-01-17', 'instock', 19, 'pack'),
(205, 40, 'Coated Peanut', 80.00, '1', '2020-01-17', 'instock', 44, 'container'),
(206, 40, 'Bam-i', 75.00, '1', '2020-01-17', 'instock', 214, 'pack'),
(207, 42, 'Torta S', 30.00, '1', '2020-01-17', 'instock', 6, 'pcs'),
(208, 42, 'Bake Polvoron', 38.00, '1', '2020-01-17', 'instock', 11, 'pack'),
(209, 42, 'Mismo', 17.00, '1', '2020-01-17', 'instock', 25, 'bottle'),
(210, 43, 'Chicken Salad', 90.00, '1', '2020-01-17', 'instock', 150, 'pack'),
(211, 44, 'Torta B', 40.00, '239', '2020-01-17', 'instock', 7, 'pcs'),
(212, 44, 'Macaroons', 45.00, '4', '2020-01-17', 'instock', 13, 'pack'),
(213, 44, 'Box SP Big 12', 20.00, '3', '2020-01-17', 'instock', 130, 'pc'),
(214, 44, 'Suncake', 45.00, '57', '2020-01-17', 'instock', 10, 'pack'),
(215, 44, 'Torta De Ube', 35.00, '124', '2020-01-17', 'instock', 8, 'pcs'),
(216, 44, 'Mango Float', 120.00, '12', '2020-01-17', 'instock', 22, 'pack'),
(217, 44, 'BudBud', 25.00, '12', '2020-01-17', 'instock', 167, '3pcs'),
(218, 44, 'Box SP Big 6', 20.00, '13', '2020-01-17', 'instock', 129, 'pc'),
(219, 44, 'Bake Polvoron', 38.00, '35', '2020-01-17', 'instock', 11, 'pack'),
(220, 44, 'Browas', 80.00, '44', '2020-01-17', 'instock', 17, 'pack'),
(221, 44, 'Black Sambo', 120.00, '2', '2020-01-17', 'instock', 50, 'serve'),
(222, 44, 'Mineral', 15.00, '10', '2020-01-17', 'instock', 56, 'bottle'),
(223, 44, 'Puto', 25.00, '9', '2020-01-17', 'instock', 144, 'set'),
(224, 44, 'Calamansi Juice', 30.00, '7', '2020-01-17', 'instock', 24, 'bottle'),
(225, 44, 'Box Fab Big', 20.00, '6', '2020-01-17', 'instock', 131, 'pc'),
(226, 44, 'Torta Latte', 35.00, '50', '2020-01-17', 'instock', 9, 'pcs'),
(227, 44, 'Coffee Stick', 15.00, '1', '2020-01-17', 'instock', 28, 'stick'),
(228, 44, '3 In 1 Coffee', 25.00, '2', '2020-01-17', 'instock', 29, 'cup'),
(229, 44, 'Boxes SP Small 4', 20.00, '12', '2020-01-17', 'instock', 46, 'pc'),
(230, 44, 'Hot Choco', 25.00, '5', '2020-01-17', 'nonstock', 27, 'cup'),
(231, 44, 'Torta S', 30.00, '312', '2020-01-17', 'instock', 6, 'pcs'),
(232, 44, 'Leche Plan', 120.00, '1', '2020-01-17', 'instock', 21, 'pack'),
(233, 44, 'Brewed Coffee', 55.00, '1', '2020-01-17', 'instock', 168, 'cup'),
(234, 44, 'Chocolite Big', 30.00, '1', '2020-01-17', 'instock', 33, 'pc'),
(235, 44, 'Minute Pouch', 15.00, '1', '2020-01-17', 'instock', 52, 'pouch'),
(236, 44, 'Sulirap', 75.00, '2', '2020-01-17', 'instock', 38, 'bottle'),
(237, 44, 'Peañato', 40.00, '1', '2020-01-17', 'instock', 16, 'pack'),
(238, 44, 'Cheesecake New', 37.00, '3', '2020-01-17', 'instock', 237, 'pack'),
(239, 44, 'Ice Coffee', 70.00, '2', '2020-01-17', 'nonstock', 229, 'glass'),
(240, 44, 'Matcha Tea', 70.00, '1', '2020-01-17', 'nonstock', 230, 'glass'),
(241, 44, 'Spaghetti', 85.00, '1', '2020-01-17', 'instock', 149, 'pack'),
(242, 44, 'Halo-halo', 85.00, '3', '2020-01-17', 'nonstock', 136, 'serve'),
(243, 44, 'Coated Peanut', 80.00, '1', '2020-01-17', 'instock', 44, 'container'),
(244, 44, 'Bam-i', 75.00, '2', '2020-01-17', 'instock', 214, 'pack'),
(245, 44, 'French Fries', 70.00, '1', '2020-01-17', 'nonstock', 165, 'serve'),
(246, 44, 'Box Fab Small', 20.00, '1', '2020-01-17', 'instock', 132, 'pc'),
(247, 44, 'Coke Swakto', 12.00, '2', '2020-01-17', 'instock', 26, 'bottle'),
(248, 44, 'Chicken Salad', 90.00, '2', '2020-01-17', 'instock', 150, 'pack'),
(249, 44, 'Sampaloc', 35.00, '4', '2020-01-17', 'instock', 19, 'pack'),
(250, 44, 'Mismo', 17.00, '4', '2020-01-17', 'instock', 25, 'bottle'),
(251, 44, 'Siomai', 9.00, '27', '2020-01-17', 'nonstock', 164, 'pc'),
(252, 44, 'C2', 15.00, '1', '2020-01-17', 'instock', 58, 'bottle'),
(253, 44, 'Boxes SP Small 12', 20.00, '4', '2020-01-17', 'instock', 48, 'pc'),
(254, 45, 'Mango Float', 120.00, '3', '2020-01-17', 'instock', 22, 'pack'),
(255, 45, 'Puto', 25.00, '8', '2020-01-17', 'instock', 144, 'set'),
(256, 45, 'Leche Plan', 120.00, '1', '2020-01-17', 'instock', 21, 'pack'),
(257, 45, 'Hot Choco', 25.00, '5', '2020-01-17', 'nonstock', 27, 'cup'),
(258, 45, 'Macaroons', 45.00, '4', '2020-01-17', 'instock', 13, 'pack'),
(259, 45, 'Coke Swakto', 12.00, '1', '2020-01-17', 'instock', 26, 'bottle'),
(260, 45, 'Suncake', 45.00, '7', '2020-01-17', 'instock', 10, 'pack'),
(261, 45, 'Torta B', 40.00, '16', '2020-01-17', 'instock', 7, 'pcs'),
(262, 45, 'Mineral', 15.00, '1', '2020-01-17', 'instock', 56, 'bottle'),
(263, 45, 'Siomai', 9.00, '6', '2020-01-17', 'nonstock', 164, 'pc'),
(264, 45, 'Browas', 80.00, '2', '2020-01-17', 'instock', 17, 'pack'),
(265, 45, 'Mismo', 17.00, '1', '2020-01-17', 'instock', 25, 'bottle'),
(266, 45, 'Cheesecake New', 37.00, '2', '2020-01-17', 'instock', 237, 'pack'),
(267, 45, 'Black Rice', 100.00, '1', '2020-01-17', 'instock', 43, 'kil'),
(268, 45, 'BudBud', 25.00, '2', '2020-01-17', 'instock', 167, '3pcs'),
(269, 45, 'Sampaloc', 35.00, '1', '2020-01-17', 'instock', 19, 'pack'),
(270, 45, 'Torta Latte', 35.00, '6', '2020-01-17', 'instock', 9, 'pcs'),
(271, 45, 'Bake Polvoron', 38.00, '1', '2020-01-17', 'instock', 11, 'pack'),
(272, 45, 'Calamansi Juice', 30.00, '1', '2020-01-17', 'instock', 24, 'bottle'),
(273, 46, 'Torta B', 40.00, '4', '2020-01-17', 'instock', 7, 'pcs'),
(274, 46, 'Torta Latte', 35.00, '4', '2020-01-17', 'instock', 9, 'pcs'),
(276, 48, 'Torta S', 30.00, '120', '2020-01-18', 'instock', 6, 'pcs'),
(277, 48, 'Torta B', 40.00, '120', '2020-01-18', 'instock', 7, 'pcs'),
(278, 49, 'Torta B', 40.00, '2', '2020-01-18', 'instock', 7, 'pcs'),
(279, 49, 'Torta S', 30.00, '6', '2020-01-18', 'instock', 6, 'pcs'),
(280, 50, 'Torta B', 40.00, '36', '2020-01-18', 'instock', 7, 'pcs'),
(281, 50, 'Torta Latte', 35.00, '25', '2020-01-18', 'instock', 9, 'pcs'),
(282, 50, 'Bake Polvoron', 38.00, '8', '2020-01-18', 'instock', 11, 'pack'),
(283, 50, 'Cheesecake New', 37.00, '3', '2020-01-18', 'instock', 237, 'pack'),
(284, 50, 'Suncake', 45.00, '5', '2020-01-18', 'instock', 10, 'pack'),
(285, 50, 'Macaroons', 45.00, '1', '2020-01-18', 'instock', 13, 'pack'),
(286, 50, 'Torta De Ube', 35.00, '20', '2020-01-18', 'instock', 8, 'pcs'),
(287, 50, 'Box Fab Small', 20.00, '2', '2020-01-18', 'instock', 132, 'pc'),
(288, 50, 'Mineral', 15.00, '3', '2020-01-18', 'instock', 56, 'bottle'),
(289, 50, 'BudBud', 25.00, '5', '2020-01-18', 'instock', 167, '3pcs'),
(290, 50, 'C2', 15.00, '1', '2020-01-18', 'instock', 58, 'bottle'),
(291, 50, 'Box SP Big 12', 20.00, '1', '2020-01-18', 'instock', 130, 'pc'),
(292, 51, 'Bam-i', 75.00, '2', '2020-01-18', 'instock', 214, 'pack'),
(293, 51, 'Puto', 25.00, '1', '2020-01-18', 'instock', 144, 'set'),
(294, 51, 'Hot Choco', 25.00, '2', '2020-01-18', 'nonstock', 27, 'cup'),
(295, 51, 'Toron', 40.00, '1', '2020-01-18', 'instock', 20, 'pack'),
(296, 51, 'Torta De Ube', 35.00, '2', '2020-01-18', 'instock', 8, 'pcs'),
(297, 47, 'Suncake', 45.00, '4', '2020-01-18', 'instock', 10, 'pack'),
(298, 52, 'BudBud', 25.00, '3', '2020-01-18', 'instock', 167, '3pcs'),
(299, 52, 'Leche Plan', 120.00, '1', '2020-01-18', 'instock', 21, 'pack'),
(300, 52, 'Mango Float', 120.00, '1', '2020-01-18', 'instock', 22, 'pack'),
(301, 52, 'Black Sambo', 120.00, '1', '2020-01-18', 'instock', 50, 'serve'),
(302, 52, 'Bake Polvoron', 38.00, '1', '2020-01-18', 'instock', 11, 'pack'),
(303, 52, 'Torta De Ube', 35.00, '1', '2020-01-18', 'instock', 8, 'pcs'),
(304, 52, 'Torta Latte', 35.00, '1', '2020-01-18', 'instock', 9, 'pcs'),
(305, 52, 'Torta B', 40.00, '2', '2020-01-18', 'instock', 7, 'pcs'),
(306, 53, 'Torta Latte', 35.00, '2', '2020-01-18', 'instock', 9, 'pcs'),
(307, 53, 'Torta B', 40.00, '1', '2020-01-18', 'instock', 7, 'pcs'),
(308, 53, 'Mismo', 17.00, '3', '2020-01-18', 'instock', 25, 'bottle'),
(309, 54, 'Torta Latte', 35.00, '3', '2020-01-18', 'instock', 9, 'pcs'),
(310, 54, 'Torta De Ube', 35.00, '3', '2020-01-18', 'instock', 8, 'pcs'),
(311, 55, 'Torta Latte', 35.00, '3', '2020-01-18', 'instock', 9, 'pcs'),
(312, 55, 'Torta De Ube', 35.00, '3', '2020-01-18', 'instock', 8, 'pcs'),
(313, 55, 'Torta B', 40.00, '6', '2020-01-18', 'instock', 7, 'pcs'),
(314, 56, 'Torta De Ube', 35.00, '4', '2020-01-18', 'instock', 8, 'pcs'),
(315, 57, 'Torta De Ube', 35.00, '3', '2020-01-18', 'instock', 8, 'pcs'),
(316, 58, 'Torta B', 40.00, '2', '2020-01-18', 'instock', 7, 'pcs'),
(317, 59, 'Torta Latte', 35.00, '2', '2020-01-18', 'instock', 9, 'pcs'),
(318, 59, 'Torta De Ube', 35.00, '1', '2020-01-18', 'instock', 8, 'pcs'),
(319, 60, 'Mango Float', 120.00, '1', '2020-01-18', 'instock', 22, 'pack'),
(320, 61, 'Mineral', 15.00, '1', '2020-01-18', 'instock', 56, 'bottle'),
(321, 62, 'Torta B', 40.00, '8', '2020-01-18', 'instock', 7, 'pcs'),
(322, 62, 'BudBud', 25.00, '1', '2020-01-18', 'instock', 167, '3pcs'),
(323, 63, 'Hot Choco', 25.00, '1', '2020-01-18', 'nonstock', 27, 'cup'),
(324, 63, 'Torta De Ube', 35.00, '1', '2020-01-18', 'instock', 8, 'pcs'),
(325, 64, 'Torta De Ube', 35.00, '4', '2020-01-18', 'instock', 8, 'pcs'),
(326, 64, 'Torta Latte', 35.00, '4', '2020-01-18', 'instock', 9, 'pcs'),
(327, 64, 'Torta B', 40.00, '4', '2020-01-18', 'instock', 7, 'pcs'),
(328, 65, 'Suncake', 45.00, '4', '2020-01-18', 'instock', 10, 'pack'),
(329, 66, 'C2', 15.00, '3', '2020-01-18', 'instock', 58, 'bottle'),
(330, 66, 'Calamansi Juice', 30.00, '1', '2020-01-18', 'instock', 24, 'bottle'),
(331, 67, 'Torta Latte', 35.00, '12', '2020-01-18', 'instock', 9, 'pcs'),
(332, 67, 'Box Fab Small', 20.00, '1', '2020-01-18', 'instock', 132, 'pc'),
(333, 67, 'Mineral', 15.00, '2', '2020-01-18', 'instock', 56, 'bottle'),
(334, 67, 'Calamansi Juice', 30.00, '1', '2020-01-18', 'instock', 24, 'bottle'),
(335, 66, 'Torta Latte', 35.00, '6', '2020-01-18', 'instock', 9, 'pcs'),
(336, 66, 'Torta De Ube', 35.00, '6', '2020-01-18', 'instock', 8, 'pcs'),
(337, 66, 'Box Fab Small', 20.00, '1', '2020-01-18', 'instock', 132, 'pc'),
(338, 68, 'Bake Polvoron', 38.00, '1', '2020-01-18', 'instock', 11, 'pack'),
(339, 68, 'Macaroons', 45.00, '1', '2020-01-18', 'instock', 13, 'pack'),
(340, 69, 'Torta S', 30.00, '6', '2020-01-18', 'instock', 6, 'pcs'),
(341, 69, 'BudBud', 25.00, '1', '2020-01-18', 'instock', 167, '3pcs'),
(342, 69, 'Toron', 40.00, '2', '2020-01-18', 'instock', 20, 'pack'),
(343, 69, 'Suncake', 45.00, '2', '2020-01-18', 'instock', 10, 'pack'),
(344, 70, 'Torta Latte', 35.00, '9', '2020-01-18', 'instock', 9, 'pcs'),
(345, 71, 'Torta B', 40.00, '2', '2020-01-18', 'instock', 7, 'pcs'),
(346, 72, 'Torta B', 40.00, '5', '2020-01-18', 'instock', 7, 'pcs'),
(347, 72, 'Suncake', 45.00, '1', '2020-01-18', 'instock', 10, 'pack'),
(348, 73, 'Torta B', 40.00, '6', '2020-01-18', 'instock', 7, 'pcs'),
(349, 74, 'Torta B', 40.00, '5', '2020-01-18', 'instock', 7, 'pcs'),
(350, 75, 'Suncake', 45.00, '3', '2020-01-18', 'instock', 10, 'pack'),
(351, 76, 'Bake Polvoron', 38.00, '2', '2020-01-18', 'instock', 11, 'pack'),
(352, 76, 'Macaroons', 45.00, '2', '2020-01-18', 'instock', 13, 'pack'),
(353, 76, 'Suncake', 45.00, '2', '2020-01-18', 'instock', 10, 'pack'),
(354, 76, 'Toron', 40.00, '2', '2020-01-18', 'instock', 20, 'pack'),
(355, 77, 'Browas', 80.00, '2', '2020-01-18', 'instock', 17, 'pack'),
(356, 78, 'Bake Polvoron', 38.00, '2', '2020-01-18', 'instock', 11, 'pack'),
(357, 78, 'Suncake', 45.00, '2', '2020-01-18', 'instock', 10, 'pack'),
(358, 78, 'Toron', 40.00, '2', '2020-01-18', 'instock', 20, 'pack'),
(359, 78, 'Macaroons', 45.00, '2', '2020-01-18', 'instock', 13, 'pack'),
(360, 79, 'Puto', 25.00, '4', '2020-01-18', 'instock', 144, 'set'),
(361, 80, 'Brewed Coffee', 55.00, '2', '2020-01-18', 'instock', 168, 'cup'),
(362, 81, 'Shake Mango', 60.00, '2', '2020-01-18', 'nonstock', 137, 'serving'),
(363, 81, 'Halo-halo', 85.00, '1', '2020-01-18', 'nonstock', 136, 'serve'),
(364, 81, 'Squid Roll', 25.00, '2', '2020-01-18', 'nonstock', 162, 'set'),
(365, 81, 'Torta B', 40.00, '1', '2020-01-18', 'instock', 7, 'pcs'),
(366, 82, 'Torta B', 40.00, '3', '2020-01-18', 'instock', 7, 'pcs'),
(367, 82, 'Calamansi Juice', 30.00, '4', '2020-01-18', 'instock', 24, 'bottle'),
(368, 82, 'C2', 15.00, '1', '2020-01-18', 'instock', 58, 'bottle'),
(369, 83, 'Broad Coffee Creamer', 10.00, '2', '2020-01-18', 'nonstock', 169, 'serve'),
(370, 81, 'Puto', 25.00, '1', '2020-01-18', 'instock', 144, 'set'),
(371, 84, 'Puto', 25.00, '3', '2020-01-18', 'instock', 144, 'set'),
(372, 84, 'Hot Choco', 25.00, '2', '2020-01-18', 'nonstock', 27, 'cup'),
(373, 85, 'Torta B', 40.00, '5', '2020-01-18', 'instock', 7, 'pcs'),
(374, 85, 'Suncake', 45.00, '2', '2020-01-18', 'instock', 10, 'pack'),
(375, 85, 'BudBud', 25.00, '1', '2020-01-18', 'instock', 167, '3pcs'),
(376, 84, 'Mineral', 15.00, '1', '2020-01-18', 'instock', 56, 'bottle'),
(377, 86, 'Torta De Ube', 35.00, '1', '2020-01-18', 'instock', 8, 'pcs'),
(378, 86, '3 In 1 Coffee', 25.00, '1', '2020-01-18', 'instock', 29, 'cup'),
(379, 87, 'Torta Latte', 35.00, '5', '2020-01-18', 'instock', 9, 'pcs'),
(380, 87, 'Torta De Ube', 35.00, '5', '2020-01-18', 'instock', 8, 'pcs'),
(381, 88, 'Torta De Ube', 35.00, '6', '2020-01-18', 'instock', 8, 'pcs'),
(382, 88, 'Torta Latte', 35.00, '6', '2020-01-18', 'instock', 9, 'pcs'),
(383, 89, 'Puto', 25.00, '1', '2020-01-18', 'instock', 144, 'set'),
(384, 90, 'Puto', 25.00, '2', '2020-01-18', 'instock', 144, 'set'),
(385, 91, 'Leche Plan', 120.00, '1', '2020-01-18', 'instock', 21, 'pack'),
(386, 92, 'Torta B', 40.00, '1', '2020-01-18', 'instock', 7, 'pcs'),
(388, 93, 'Torta B', 40.00, '3', '2020-01-18', 'instock', 7, 'pcs'),
(389, 93, 'Calamansi Juice', 30.00, '2', '2020-01-18', 'instock', 24, 'bottle'),
(390, 93, 'Mineral', 15.00, '1', '2020-01-18', 'instock', 56, 'bottle'),
(392, 95, 'BudBud', 25.00, '1', '2020-01-18', 'instock', 167, '3pcs'),
(393, 95, 'Torta B', 40.00, '1', '2020-01-18', 'instock', 7, 'pcs'),
(394, 95, 'Calamansi Juice', 30.00, '6', '2020-01-18', 'instock', 24, 'bottle'),
(395, 95, '3 In 1 Coffee', 25.00, '1', '2020-01-18', 'instock', 29, 'cup'),
(396, 95, 'Torta Latte', 35.00, '7', '2020-01-18', 'instock', 9, 'pcs'),
(397, 96, 'Suncake', 45.00, '2', '2020-01-18', 'instock', 10, 'pack'),
(398, 97, 'Suncake', 45.00, '1', '2020-01-18', 'instock', 10, 'pack'),
(399, 97, 'Torta B', 40.00, '2', '2020-01-18', 'instock', 7, 'pcs'),
(400, 98, 'BudBud', 25.00, '2', '2020-01-18', 'instock', 167, '3pcs'),
(401, 99, 'Torta B', 40.00, '12', '2020-01-18', 'instock', 7, 'pcs'),
(402, 99, 'Box Fab Small', 20.00, '1', '2020-01-18', 'instock', 132, 'pc'),
(403, 101, 'Torta Latte', 35.00, '3', '2020-01-18', 'instock', 9, 'pcs'),
(404, 102, 'Bake Polvoron', 38.00, '2', '2020-01-18', 'instock', 11, 'pack'),
(405, 103, 'Torta Latte', 35.00, '3', '2020-01-18', 'instock', 9, 'pcs'),
(406, 103, 'Torta De Ube', 35.00, '3', '2020-01-18', 'instock', 8, 'pcs'),
(407, 104, 'Tablea White M', 180.00, '1', '2020-01-18', 'instock', 154, 'pouch'),
(408, 104, 'Torta B', 40.00, '4', '2020-01-18', 'instock', 7, 'pcs'),
(409, 105, 'Halo-halo', 85.00, '1', '2020-01-18', 'nonstock', 136, 'serve'),
(410, 105, 'Torta Latte', 35.00, '1', '2020-01-18', 'instock', 9, 'pcs'),
(411, 106, 'Torta B', 40.00, '6', '2020-01-18', 'instock', 7, 'pcs'),
(412, 107, 'Halo-halo', 85.00, '2', '2020-01-18', 'nonstock', 136, 'serve'),
(413, 107, 'Torta B', 40.00, '1', '2020-01-18', 'instock', 7, 'pcs'),
(414, 107, 'Torta S', 30.00, '25', '2020-01-18', 'instock', 6, 'pcs'),
(415, 107, 'Box Fab Small', 20.00, '2', '2020-01-18', 'instock', 132, 'pc'),
(416, 108, 'Suncake', 45.00, '60', '2020-01-18', 'instock', 10, 'pack'),
(417, 109, 'Torta B', 40.00, '12', '2020-01-18', 'instock', 7, 'pcs'),
(418, 109, 'Box Fab Small', 20.00, '1', '2020-01-18', 'instock', 132, 'pc'),
(419, 109, 'Tablea White M', 180.00, '2', '2020-01-18', 'instock', 154, 'pouch'),
(420, 109, 'BudBud', 25.00, '1', '2020-01-18', 'instock', 167, '3pcs'),
(421, 109, 'Torta S', 30.00, '5', '2020-01-18', 'instock', 6, 'pcs'),
(422, 110, 'Torta B', 40.00, '2', '2020-01-18', 'instock', 7, 'pcs'),
(423, 111, 'Mango Float', 120.00, '1', '2020-01-18', 'instock', 22, 'pack'),
(424, 112, 'Bam-i', 75.00, '1', '2020-01-18', 'instock', 214, 'pack'),
(425, 112, 'Mango Float', 120.00, '1', '2020-01-18', 'instock', 22, 'pack'),
(426, 113, 'Puto', 25.00, '1', '2020-01-18', 'instock', 144, 'set'),
(427, 114, 'Torta S', 30.00, '6', '2020-01-18', 'instock', 6, 'pcs'),
(428, 114, 'Bake Polvoron', 38.00, '1', '2020-01-18', 'instock', 11, 'pack'),
(429, 114, 'Browas', 80.00, '1', '2020-01-18', 'instock', 17, 'pack'),
(430, 115, 'Torta Latte', 35.00, '6', '2020-01-18', 'instock', 9, 'pcs'),
(431, 115, 'Torta De Ube', 35.00, '6', '2020-01-18', 'instock', 8, 'pcs'),
(432, 115, 'Suncake', 45.00, '2', '2020-01-18', 'instock', 10, 'pack'),
(433, 115, 'Box Fab Small', 20.00, '1', '2020-01-18', 'instock', 132, 'pc'),
(434, 116, 'Squid Roll', 25.00, '1', '2020-01-18', 'nonstock', 162, 'set'),
(435, 116, 'Puto', 25.00, '1', '2020-01-18', 'instock', 144, 'set'),
(436, 116, 'Hot Choco', 25.00, '1', '2020-01-18', 'nonstock', 27, 'cup'),
(437, 117, 'Torta De Ube', 35.00, '2', '2020-01-18', 'instock', 8, 'pcs'),
(438, 117, 'Torta Latte', 35.00, '2', '2020-01-18', 'instock', 9, 'pcs'),
(439, 117, 'Torta B', 40.00, '3', '2020-01-18', 'instock', 7, 'pcs'),
(440, 118, 'Torta De Ube', 35.00, '5', '2020-01-18', 'instock', 8, 'pcs'),
(441, 119, 'Torta S', 30.00, '3', '2020-01-18', 'instock', 6, 'pcs'),
(442, 120, 'Torta S', 30.00, '2', '2020-01-18', 'instock', 6, 'pcs'),
(443, 120, 'BudBud', 25.00, '1', '2020-01-18', 'instock', 167, '3pcs'),
(444, 120, 'French Fries', 70.00, '1', '2020-01-18', 'nonstock', 165, 'serve'),
(445, 121, 'Squid Roll', 25.00, '1', '2020-01-18', 'nonstock', 162, 'set'),
(446, 122, 'Torta S', 30.00, '6', '2020-01-18', 'instock', 6, 'pcs'),
(447, 122, 'C2', 15.00, '1', '2020-01-18', 'instock', 58, 'bottle'),
(448, 122, 'Bake Polvoron', 38.00, '1', '2020-01-18', 'instock', 11, 'pack'),
(449, 123, 'BudBud', 25.00, '2', '2020-01-18', 'instock', 167, '3pcs'),
(450, 123, 'Bam-i', 75.00, '1', '2020-01-18', 'instock', 214, 'pack'),
(451, 123, 'Suncake', 45.00, '1', '2020-01-18', 'instock', 10, 'pack'),
(452, 123, 'C2', 15.00, '1', '2020-01-18', 'instock', 58, 'bottle'),
(453, 124, 'Suncake', 45.00, '1', '2020-01-18', 'instock', 10, 'pack'),
(454, 125, 'Torta S', 30.00, '10', '2020-01-18', 'instock', 6, 'pcs'),
(455, 125, 'Suncake', 45.00, '4', '2020-01-18', 'instock', 10, 'pack'),
(456, 126, 'Spaghetti', 85.00, '1', '2020-01-18', 'instock', 149, 'pack'),
(457, 127, 'Mango Float', 120.00, '1', '2020-01-18', 'instock', 22, 'pack'),
(458, 128, 'Browas', 80.00, '1', '2020-01-18', 'instock', 17, 'pack'),
(459, 129, 'Tempura', 25.00, '1', '2020-01-18', 'nonstock', 163, 'set'),
(460, 129, 'Torta S', 30.00, '2', '2020-01-18', 'instock', 6, 'pcs'),
(461, 129, 'Torta Latte', 35.00, '1', '2020-01-18', 'instock', 9, 'pcs'),
(462, 129, 'Torta De Ube', 35.00, '1', '2020-01-18', 'instock', 8, 'pcs'),
(463, 129, 'Torta B', 40.00, '1', '2020-01-18', 'instock', 7, 'pcs'),
(464, 129, 'BudBud', 25.00, '1', '2020-01-18', 'instock', 167, '3pcs'),
(465, 130, 'Hot Choco', 25.00, '1', '2020-01-18', 'nonstock', 27, 'cup'),
(466, 132, 'Torta B', 40.00, '7', '2020-01-19', 'instock', 7, 'pcs'),
(467, 132, 'Mineral', 15.00, '1', '2020-01-19', 'instock', 56, 'bottle'),
(468, 132, 'Black Sambo', 120.00, '1', '2020-01-19', 'instock', 50, 'serve'),
(469, 133, 'Torta S', 30.00, '79', '2020-01-19', 'instock', 6, 'pcs'),
(470, 133, 'Suncake', 45.00, '6', '2020-01-19', 'instock', 10, 'pack'),
(471, 133, 'Torta Latte', 35.00, '5', '2020-01-19', 'instock', 9, 'pcs'),
(472, 133, 'Browas', 80.00, '3', '2020-01-19', 'instock', 17, 'pack'),
(473, 133, 'Box Fab Small', 20.00, '2', '2020-01-19', 'instock', 132, 'pc'),
(474, 133, 'Torta De Ube', 35.00, '4', '2020-01-19', 'instock', 8, 'pcs'),
(475, 133, 'Boxes SP Small 4', 20.00, '2', '2020-01-19', 'instock', 46, 'pc'),
(476, 133, 'BudBud', 25.00, '6', '2020-01-19', 'instock', 167, '3pcs'),
(477, 133, 'Torta B', 40.00, '17', '2020-01-19', 'instock', 7, 'pcs'),
(478, 133, 'Box Fab Big', 20.00, '1', '2020-01-19', 'instock', 131, 'pc'),
(479, 134, 'Squid Roll', 25.00, '1', '2020-01-19', 'nonstock', 162, 'set'),
(480, 133, 'Mango Float', 120.00, '3', '2020-01-19', 'instock', 22, 'pack'),
(481, 133, 'Puto', 25.00, '3', '2020-01-19', 'instock', 144, 'set'),
(482, 133, 'Coke Swakto', 12.00, '1', '2020-01-19', 'instock', 26, 'bottle'),
(483, 133, 'Mineral', 15.00, '2', '2020-01-19', 'instock', 56, 'bottle'),
(484, 133, 'Chicken Salad', 90.00, '1', '2020-01-19', 'instock', 150, 'pack'),
(485, 133, 'Hot Choco', 25.00, '1', '2020-01-19', 'nonstock', 27, 'cup'),
(486, 135, 'Torta De Ube', 35.00, '10', '2020-01-19', 'instock', 8, 'pcs'),
(487, 135, 'Torta S', 30.00, '10', '2020-01-19', 'instock', 6, 'pcs'),
(488, 135, 'Box Fab Small', 20.00, '1', '2020-01-19', 'instock', 132, 'pc'),
(489, 136, 'Leche Plan', 120.00, '2', '2020-01-19', 'instock', 21, 'pack'),
(490, 136, 'Black Sambo', 120.00, '1', '2020-01-19', 'instock', 50, 'serve'),
(491, 136, 'Bake Polvoron', 38.00, '1', '2020-01-19', 'instock', 11, 'pack'),
(492, 136, 'BudBud', 25.00, '3', '2020-01-19', 'instock', 167, '3pcs'),
(493, 137, 'Torta B', 40.00, '6', '2020-01-19', 'instock', 7, 'pcs'),
(494, 137, 'Torta De Ube', 35.00, '8', '2020-01-19', 'instock', 8, 'pcs'),
(495, 138, 'Torta B', 40.00, '16', '2020-01-19', 'instock', 7, 'pcs'),
(496, 138, 'Suncake', 45.00, '4', '2020-01-19', 'instock', 10, 'pack'),
(497, 138, 'Bake Polvoron', 38.00, '1', '2020-01-19', 'instock', 11, 'pack'),
(498, 138, 'BudBud', 25.00, '1', '2020-01-19', 'instock', 167, '3pcs'),
(499, 139, 'Mineral', 15.00, '1', '2020-01-19', 'instock', 56, 'bottle'),
(500, 140, 'Spaghetti', 85.00, '1', '2020-01-19', 'instock', 149, 'pack');

-- --------------------------------------------------------

--
-- Table structure for table `overtime_type`
--

CREATE TABLE `overtime_type` (
  `ot_type_id` int(10) UNSIGNED NOT NULL,
  `ot_type_name` varchar(45) NOT NULL,
  `ot_type_term` varchar(45) NOT NULL,
  `ot_rate` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `overtime_type`
--

INSERT INTO `overtime_type` (`ot_type_id`, `ot_type_name`, `ot_type_term`, `ot_rate`) VALUES
(5, 'Regular Overtime', 'Hour', 25.00);

-- --------------------------------------------------------

--
-- Table structure for table `property_info`
--

CREATE TABLE `property_info` (
  `property_id` int(10) UNSIGNED NOT NULL,
  `property_name` varchar(45) NOT NULL,
  `street_name` varchar(45) NOT NULL,
  `municipality` varchar(45) NOT NULL,
  `state` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `zipcode` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `fax` varchar(45) NOT NULL,
  `mobile` char(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `logo_name` varchar(45) NOT NULL,
  `logo_location` varchar(45) NOT NULL,
  `admin_username` varchar(45) NOT NULL,
  `admin_password` varchar(45) NOT NULL,
  `tin` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_info`
--

INSERT INTO `property_info` (`property_id`, `property_name`, `street_name`, `municipality`, `state`, `country`, `zipcode`, `phone`, `fax`, `mobile`, `email`, `logo_name`, `logo_location`, `admin_username`, `admin_password`, `tin`) VALUES
(1, 'Ojs Torta', 'Poblacion', 'Argao', 'Cebu', 'Philippines', '6021', '3677572', '3677572', 'none', 'ojstorta@gmail.com', 'logo.png', 'img/', 'adminOjs', 'a31bc5c3901b4c48233c9b8ec6f7df3ebed631dd', '249-854-682-000');

-- --------------------------------------------------------

--
-- Table structure for table `rate_types`
--

CREATE TABLE `rate_types` (
  `rate_type_id` int(10) UNSIGNED NOT NULL,
  `rate_name` varchar(45) NOT NULL,
  `rate_type` varchar(45) NOT NULL,
  `rate_type_num` char(2) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate_types`
--

INSERT INTO `rate_types` (`rate_type_id`, `rate_name`, `rate_type`, `rate_type_num`, `description`) VALUES
(1, 'Daily', 'Day', '1', 'Regular daily rate.');

-- --------------------------------------------------------

--
-- Table structure for table `releaseditem`
--

CREATE TABLE `releaseditem` (
  `release_item_id` int(20) UNSIGNED NOT NULL,
  `releaseitem_unit` varchar(45) NOT NULL,
  `releaseitem_qty` char(6) NOT NULL,
  `stock_id` int(10) UNSIGNED NOT NULL,
  `release_date` char(10) NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `releaseditem`
--

INSERT INTO `releaseditem` (`release_item_id`, `releaseitem_unit`, `releaseitem_qty`, `stock_id`, `release_date`, `emp_id`) VALUES
(1, 'kl', '19.50', 193, '2020-01-17', 34),
(2, 'kl', '19.50', 193, '2020-01-17', 34),
(3, 'kl', '5', 193, '2020-01-17', 34),
(4, 'kl', '4', 193, '2020-01-17', 34),
(6, 'kl', '19.50', 193, '2020-01-17', 34),
(7, 'kl', '1', 193, '2020-01-17', 34),
(8, 'kl', '5', 193, '2020-01-17', 34),
(9, 'bar', '6', 192, '2020-01-17', 34),
(10, 'bar', '6', 192, '2020-01-17', 34),
(11, 'bar', '8', 192, '2020-01-17', 34),
(12, 'kl', '1', 196, '2020-01-17', 34),
(13, 'kl', '2', 196, '2020-01-17', 34),
(14, 'can', '3', 186, '2020-01-17', 34),
(15, 'can', '2', 186, '2020-01-17', 34),
(16, 'can', '4', 186, '2020-01-17', 34),
(17, 'pouch', '1', 191, '2020-01-17', 34),
(18, 'kl.', '1', 195, '2020-01-17', 34),
(19, 'kl', '3', 197, '2020-01-17', 34),
(20, 'kl', '3,75', 197, '2020-01-17', 34),
(21, 'kl', '9', 200, '2020-01-17', 34),
(22, 'kl', '9', 200, '2020-01-17', 34),
(23, 'kl', '3', 200, '2020-01-17', 34),
(24, 'kl', '.75', 200, '2020-01-17', 34),
(25, 'kl', '9', 200, '2020-01-17', 34),
(26, 'kl', '1,5', 200, '2020-01-17', 34),
(27, 'cup', '6', 188, '2020-01-17', 34),
(28, 'cup', '8', 188, '2020-01-17', 34),
(29, 'cup', '2', 188, '2020-01-17', 34),
(30, 'cup', '6', 187, '2020-01-17', 34),
(31, 'cup', '6', 187, '2020-01-17', 34),
(32, 'cup', '18', 187, '2020-01-17', 34),
(33, 'kl', '1.25', 201, '2020-01-17', 34),
(34, 'kl', '1.5', 201, '2020-01-17', 34),
(35, 'kl', '.25', 201, '2020-01-17', 34),
(36, 'kl', '1.5', 201, '2020-01-17', 34),
(37, 'kl', '.25', 201, '2020-01-17', 34),
(38, 'can', '3', 185, '2020-01-17', 34),
(39, 'can', '12', 185, '2020-01-17', 34),
(40, 'can', '12', 185, '2020-01-17', 34),
(41, 'can', '2', 185, '2020-01-17', 34),
(42, 'can', '12', 185, '2020-01-17', 34),
(43, 'can', '2', 185, '2020-01-17', 34),
(44, 'can', '6', 190, '2020-01-17', 34),
(45, 'can', '7', 190, '2020-01-17', 34),
(46, 'can', '7', 190, '2020-01-17', 34),
(47, 'kl', '13.5', 183, '2020-01-17', 34),
(48, 'kl', '3', 183, '2020-01-17', 34),
(49, 'kl', '13.50', 183, '2020-01-17', 34),
(50, 'kl', '3', 183, '2020-01-17', 34),
(51, 'kl', '.25', 183, '2020-01-17', 34),
(52, 'kl', '.75', 183, '2020-01-17', 34),
(53, 'kl', '13.75', 183, '2020-01-17', 34),
(54, 'kl', '.50', 183, '2020-01-17', 34),
(55, 'bar', '1', 198, '2020-01-17', 34),
(56, 'bar', '2', 198, '2020-01-17', 34),
(57, 'bar', '1', 198, '2020-01-17', 34),
(58, 'pc', '362', 205, '2020-01-17', 34),
(59, 'pc', '450', 205, '2020-01-17', 34),
(60, 'pc', '16', 205, '2020-01-17', 34),
(61, 'pc', '417', 205, '2020-01-17', 34);

-- --------------------------------------------------------

--
-- Table structure for table `salary_term`
--

CREATE TABLE `salary_term` (
  `salary_term_id` int(10) UNSIGNED NOT NULL,
  `salary_term_name` varchar(45) NOT NULL,
  `salary_term_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_term`
--

INSERT INTO `salary_term` (`salary_term_id`, `salary_term_name`, `salary_term_description`) VALUES
(1, 'Daily', 'Daily basis.\r\n'),
(2, 'Monthly', 'Monthly Basis'),
(3, 'Weekly', 'Weekly basis');

-- --------------------------------------------------------

--
-- Table structure for table `stockcategory`
--

CREATE TABLE `stockcategory` (
  `stockCat_id` int(10) UNSIGNED NOT NULL,
  `stockCat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockcategory`
--

INSERT INTO `stockcategory` (`stockCat_id`, `stockCat_name`) VALUES
(5, 'Baking Materials'),
(6, 'Snacks'),
(7, 'Drinks'),
(8, 'Meals'),
(9, 'Desserts'),
(10, 'Local Production'),
(11, 'Add-on'),
(12, 'Packings');

-- --------------------------------------------------------

--
-- Table structure for table `stockitem`
--

CREATE TABLE `stockitem` (
  `stock_id` int(10) UNSIGNED NOT NULL,
  `stockCat_id` int(10) UNSIGNED NOT NULL,
  `stock_name` varchar(100) NOT NULL,
  `stock_unit` varchar(85) NOT NULL,
  `stock_qqty` char(10) DEFAULT NULL,
  `stockDispose` char(10) DEFAULT '0',
  `stockCost` double(10,2) NOT NULL,
  `stockclass_id` int(10) UNSIGNED NOT NULL,
  `stock_type` varchar(55) NOT NULL,
  `stock_alert` char(10) NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `stock_damage` char(10) DEFAULT NULL,
  `retail_price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockitem`
--

INSERT INTO `stockitem` (`stock_id`, `stockCat_id`, `stock_name`, `stock_unit`, `stock_qqty`, `stockDispose`, `stockCost`, `stockclass_id`, `stock_type`, `stock_alert`, `supplier_id`, `stock_damage`, `retail_price`) VALUES
(6, 6, 'Torta S', 'pcs', '1197', '0', 0.00, 4, 'instock', '20', 3, NULL, 30.00),
(7, 6, 'Torta B', 'pcs', '706', '0', 0.00, 4, 'instock', '20', 3, NULL, 40.00),
(8, 6, 'Torta De Ube', 'pcs', '145', '20', 0.00, 4, 'instock', '10', 3, NULL, 35.00),
(9, 6, 'Torta Latte', 'pcs', '226', '-7', 0.00, 4, 'instock', '10', 3, NULL, 35.00),
(10, 6, 'Suncake', 'pack', '144', '0', 0.00, 4, 'instock', '10', 3, NULL, 45.00),
(11, 6, 'Bake Polvoron', 'pack', '-3', '3', 0.00, 4, 'instock', '10', 3, NULL, 38.00),
(13, 6, 'Macaroons', 'pack', '35', '0', 0.00, 4, 'instock', '10', 3, NULL, 45.00),
(14, 6, 'Podreda', 'pack', '0', '0', 16.25, 4, 'instock', '10', 14, NULL, 30.00),
(15, 6, 'Tostado', 'pack', '0', '0', 21.60, 4, 'instock', '5', 3, NULL, 45.00),
(16, 6, 'Peañato', 'pack', '2', '-2', 21.00, 4, 'instock', '5', 15, NULL, 40.00),
(17, 6, 'Browas', 'pack', '115', '0', 60.00, 4, 'instock', '5', 16, NULL, 80.00),
(18, 6, 'Banana Chips', 'pack', '0', '0', 0.00, 4, 'instock', '5', 3, NULL, 40.00),
(19, 6, 'Sampaloc', 'pack', '3', '-3', 14.17, 4, 'instock', '5', 3, NULL, 35.00),
(20, 6, 'Toron', 'pack', '16', '0', 0.00, 4, 'instock', '5', 3, NULL, 40.00),
(21, 9, 'Leche Plan', 'pack', '12', '0', 50.00, 4, 'instock', '5', 3, NULL, 120.00),
(22, 9, 'Mango Float', 'pack', '21', '-1', 61.50, 4, 'instock', '5', 3, NULL, 120.00),
(23, 9, 'Buko Pandan', 'pc', '0', '0', 0.00, 4, 'instock', '5', 3, NULL, 70.00),
(24, 7, 'Calamansi Juice', 'bottle', '146', '4', 21.00, 4, 'instock', '10', 6, NULL, 30.00),
(25, 7, 'Mismo', 'bottle', '4', '-4', 12.00, 4, 'instock', '20', 8, NULL, 17.00),
(26, 7, 'Coke Swakto', 'bottle', '5', '-5', 8.00, 4, 'instock', '20', 6, NULL, 12.00),
(27, 7, 'Hot Choco', 'cup', '0', '0', 15.00, 4, 'nonstock', '0', 3, NULL, 25.00),
(28, 7, 'Coffee Stick', 'stick', '0', '0', 2.50, 4, 'instock', '20', 13, NULL, 15.00),
(29, 7, '3 In 1 Coffee', 'cup', '0', '0', 6.00, 4, 'instock', '20', 13, NULL, 25.00),
(32, 7, 'Chocolite Small', 'pc', '0', '0', 0.00, 4, 'instock', '5', 6, NULL, 15.00),
(33, 7, 'Chocolite Big', 'pc', '0', '0', 0.00, 4, 'instock', '5', 6, NULL, 30.00),
(34, 7, 'Litro', 'liter', '0', '0', 27.00, 4, 'instock', '5', 6, NULL, 40.00),
(35, 10, 'Bahal Max', 'bottle', '0', '0', 50.00, 4, 'instock', '10', 5, NULL, 80.00),
(36, 10, 'Mango Nilo', 'bottle', '0', '0', 50.00, 4, 'instock', '10', 5, NULL, 80.00),
(37, 10, 'Sukarap', 'bottle', '1', '-1', 43.00, 4, 'instock', '10', 5, NULL, 65.00),
(38, 10, 'Sulirap', 'bottle', '0', '0', 53.00, 4, 'instock', '10', 5, NULL, 75.00),
(39, 10, 'Turmeric', 'pouch', '0', '0', 100.00, 4, 'instock', '10', 4, NULL, 125.00),
(40, 10, 'Tablea S', 'pouch', '0', '0', 95.00, 4, 'instock', '10', 10, NULL, 150.00),
(41, 10, 'Tablea M', 'pouch', '0', '0', 135.00, 4, 'instock', '10', 10, NULL, 180.00),
(42, 10, 'Chicharon', 'pc', '0', '0', 20.00, 4, 'instock', '20', 5, NULL, 25.00),
(43, 10, 'Black Rice', 'kil', '0', '0', 65.00, 4, 'instock', '20', 7, NULL, 100.00),
(44, 10, 'Coated Peanut', 'container', '1', '-1', 55.00, 4, 'instock', '20', 11, NULL, 80.00),
(45, 10, 'Salted Peanut', 'container', '0', '0', 55.00, 4, 'instock', '20', 11, NULL, 80.00),
(46, 11, 'Boxes SP Small 4', 'pc', '8', '-8', 13.00, 4, 'instock', '50', 23, NULL, 20.00),
(47, 11, 'Boxes SP Small 6', 'pc', '0', '0', 14.00, 4, 'instock', '50', 23, NULL, 20.00),
(48, 11, 'Boxes SP Small 12', 'pc', '12', '-12', 17.00, 4, 'instock', '50', 23, NULL, 20.00),
(49, 11, 'Blue Bag', 'pc', '0', '0', 0.00, 4, 'instock', '50', 3, NULL, 20.00),
(50, 9, 'Black Sambo', 'serve', '0', '0', 0.00, 4, 'instock', '5', 3, NULL, 120.00),
(51, 7, 'Minute Maid', 'bottle', '0', '0', 25.00, 4, 'instock', '10', 8, NULL, 32.00),
(52, 7, 'Minute Pouch', 'pouch', '0', '0', 7.00, 4, 'instock', '10', 8, NULL, 15.00),
(53, 7, 'Pineapple Orange', 'can', '0', '0', 0.00, 4, 'instock', '10', 6, NULL, 44.00),
(54, 7, 'Zest-O Mango Nectar', 'pouch', '0', '0', 0.00, 4, 'instock', '10', 6, NULL, 44.00),
(55, 7, 'Cali', 'can', '0', '0', 0.00, 4, 'instock', '10', 6, NULL, 44.00),
(56, 7, 'Mineral', 'bottle', '-1', '1', 9.00, 4, 'instock', '20', 9, NULL, 15.00),
(57, 10, 'Tablea S Tube', 'tube', '0', '0', 110.00, 4, 'instock', '10', 10, NULL, 175.00),
(58, 7, 'C2', 'bottle', '2', '-2', 10.00, 4, 'instock', '10', 8, NULL, 15.00),
(59, 7, 'Ice Black', 'bottle', '0', '0', 11.00, 4, 'instock', '20', 12, NULL, 20.00),
(60, 7, 'Blanca', 'bottle', '0', '0', 11.00, 4, 'instock', '20', 12, NULL, 20.00),
(61, 7, '78°C', 'bottle', '0', '0', 11.00, 4, 'instock', '20', 12, NULL, 23.00),
(62, 7, 'Ice Brown', 'bottle', '0', '0', 11.00, 4, 'instock', '20', 12, NULL, 20.00),
(63, 7, 'Coke Original', 'cans', '0', '0', 25.30, 4, 'instock', '10', 13, NULL, 44.00),
(64, 7, 'Coke Light', 'cans', '0', '0', 25.30, 4, 'instock', '10', 13, NULL, 44.00),
(65, 7, 'Coke Zero', 'cans', '0', '0', 25.30, 4, 'instock', '10', 13, NULL, 44.00),
(66, 7, 'Coke 1.5', 'bottles', '0', '0', 54.00, 4, 'instock', '10', 13, NULL, 68.00),
(89, 5, 'Plastic 6x10x04', 'kl', '0', '0', 130.00, 3, 'instock', '0', 22, NULL, 0.00),
(90, 5, 'Chelo Sht. Small', 'kl', '0', '0', 200.00, 3, 'instock', '0', 22, NULL, 0.00),
(91, 5, 'Laminated Plastic', 'pc', '0', '0', 1.70, 3, 'instock', '0', 27, NULL, 0.00),
(92, 5, 'Microwaveable Round Plastic Container 200ml', 'pc', '0', '0', 4.00, 3, 'instock', '0', 22, NULL, 0.00),
(93, 5, 'Microwaveable Rectangular Plastic Containerer 500ml', 'pc', '0', '0', 6.10, 3, 'instock', '0', 22, NULL, 0.00),
(106, 5, 'Disposable Spoon', 'pc', '0', '0', 0.50, 3, 'instock', '40', 25, NULL, 0.00),
(128, 11, 'Disposable Styro Cups', 'pc', '0', '0', 2.40, 3, 'instock', '100', 3, NULL, 0.00),
(129, 11, 'Box SP Big 6', 'pc', '7', '0', 18.00, 4, 'instock', '50', 23, NULL, 20.00),
(130, 11, 'Box SP Big 12', 'pc', '3', '0', 21.00, 4, 'instock', '50', 23, NULL, 20.00),
(131, 11, 'Box Fab Big', 'pc', '29', '0', 16.00, 4, 'instock', '10', 24, NULL, 20.00),
(132, 11, 'Box Fab Small', 'pc', '29', '0', 12.00, 4, 'instock', '10', 24, NULL, 20.00),
(133, 11, 'Packaging Tape', 'roll', '0', '0', 0.00, 3, 'instock', '5', 23, NULL, 20.00),
(134, 11, 'Ribbon', 'roll', '0', '0', 0.00, 3, 'instock', '5', 23, NULL, 20.00),
(135, 10, 'Box Strew', 'roll', '0', '0', 0.00, 3, 'instock', '5', 22, NULL, 0.00),
(136, 9, 'Halo-halo', 'serve', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 85.00),
(137, 9, 'Shake Mango', 'serving', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 60.00),
(138, 9, 'Shake Banana', 'serving', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 60.00),
(139, 9, 'Shake Pineapple', 'serving', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 60.00),
(140, 9, 'Shake Strawberry', 'serving', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 70.00),
(141, 9, 'Shake Guyavano', 'serving', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 60.00),
(142, 9, 'Shake Choco', 'serving', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 60.00),
(143, 9, 'Shake Milk', 'serving', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 60.00),
(144, 6, 'Puto', 'set', '11', '0', 15.00, 4, 'instock', '5', 3, NULL, 25.00),
(145, 7, 'Fresh Calamansi Juice', 'serve', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 40.00),
(146, 7, 'Fresh Apple Juice', 'serve', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 80.00),
(147, 7, 'Fresh Orange Juice', 'serve', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 80.00),
(148, 7, 'Fresh Carrot Juice', 'serve', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 110.00),
(149, 6, 'Spaghetti', 'pack', '0', '0', 50.00, 4, 'instock', '0', 3, NULL, 85.00),
(150, 6, 'Chicken Salad', 'pack', '1', '-1', 45.00, 4, 'instock', '0', 3, NULL, 90.00),
(151, 10, 'Goats Milk', 'bottle', '0', '0', 50.00, 4, 'instock', '0', 28, NULL, 75.00),
(152, 10, 'Honey', 'bottle', '0', '0', 250.00, 4, 'instock', '0', 28, NULL, 280.00),
(153, 10, 'Tablea White S', 'pouch', '0', '0', 95.00, 4, 'instock', '10', 10, NULL, 150.00),
(154, 10, 'Tablea White M', 'pouch', '56', '0', 135.00, 4, 'instock', '10', 10, NULL, 180.00),
(155, 10, 'Tablea M Tube', 'tube', '0', '0', 175.00, 4, 'instock', '10', 10, NULL, 225.00),
(156, 10, 'Tablea L Tube', 'tube', '0', '0', 220.00, 4, 'instock', '10', 10, NULL, 270.00),
(158, 6, 'Cheesecake', 'pack', '0', '0', 0.00, 4, 'instock', '10', 3, NULL, 40.00),
(159, 7, 'Tea Green', 'pc', '0', '0', 7.00, 4, 'instock', '5', 13, NULL, 15.00),
(160, 7, 'Black Tea', 'pc', '1', '-1', 7.00, 4, 'instock', '5', 13, NULL, 15.00),
(161, 7, 'Buko Juice', 'glass', '9', '0', 5.00, 4, 'instock', '2', 3, NULL, 10.00),
(162, 6, 'Squid Roll', 'set', '0', '0', 20.00, 4, 'nonstock', '0', 3, NULL, 25.00),
(163, 6, 'Tempura', 'set', '0', '0', 20.00, 4, 'nonstock', '0', 3, NULL, 25.00),
(164, 6, 'Siomai', 'pc', '0', '0', 7.00, 4, 'nonstock', '0', 3, NULL, 9.00),
(165, 6, 'French Fries', 'serve', '0', '0', 40.00, 4, 'nonstock', '0', 3, NULL, 70.00),
(167, 6, 'BudBud', '3pcs', '49', '0', 15.00, 4, 'instock', '1', 3, NULL, 25.00),
(168, 7, 'Brewed Coffee', 'cup', '1', '-1', 14.50, 4, 'instock', '20', 3, NULL, 55.00),
(169, 11, 'Broad Coffee Creamer', 'serve', '0', '0', 7.50, 4, 'nonstock', '0', 3, NULL, 10.00),
(172, 11, 'Buko Juice Dispossable Glass', 'pcs', '0', '0', 1.00, 3, 'instock', '100', 22, NULL, 0.00),
(173, 11, '16 Oz. Disposable Glass', 'pcs.', '0', '0', 6.00, 3, 'instock', '50', 22, NULL, 0.00),
(175, 11, 'French Fries Dispossable Glass Big', 'pcs.', '0', '0', 3.00, 3, 'instock', '50', 22, NULL, 0.00),
(177, 11, '12oz Dispossable Glass', 'pc', '0', '0', 4.00, 3, 'instock', '50', 3, NULL, 0.00),
(181, 7, 'Fresh Milk', 'pouch', '0', '0', 34.75, 4, 'instock', '10', 21, NULL, 40.00),
(183, 5, 'Sugar', 'kl', '0', '0', 0.04, 3, 'instock', '50000', 18, NULL, 0.00),
(185, 5, 'Cowbel Evaporated Milk Big', 'can', '48', '0', 18.96, 3, 'instock', '50', 19, NULL, 0.00),
(186, 5, 'Cowbel Condensed Milk', 'can', '21', '0', 28.87, 3, 'instock', '10', 18, NULL, 0.00),
(187, 5, 'Margarine 100 Gm.', 'cup', '17', '0', 29.10, 3, 'instock', '50', 21, NULL, 0.00),
(188, 5, 'Margarine 250 Gm', 'cup', '0', '0', 65.25, 3, 'instock', '20', 21, NULL, 0.00),
(190, 5, 'Alpine Evaporated Milk Big', 'can', '48', '0', 53.27, 3, 'instock', '20', 21, NULL, 0.00),
(191, 5, 'Bearbrand Powdered Milk 150 Gms', 'pouch', '0', '0', 50.00, 3, 'instock', '3', 18, NULL, 0.00),
(192, 5, 'Cheese', 'bar', '96', '0', 45.50, 3, 'instock', '10', 21, NULL, 0.00),
(193, 5, 'Flour', 'kl', '4', '-4', 0.04, 3, 'instock', '25000', 18, NULL, 0.00),
(194, 5, 'Calumet Baking Powder', 'kl', '0', '0', 0.15, 3, 'instock', '1000', 22, NULL, 0.00),
(195, 5, 'Dessicated Coconut', 'kl.', '0', '0', 250.00, 3, 'instock', '2', 26, NULL, 0.00),
(196, 5, 'Beryl Chocolate', 'kl', '0', '0', 295.00, 3, 'instock', '2', 26, NULL, 0.00),
(197, 5, 'Ube Paste', 'kl', '22.5', '0', 0.12, 3, 'instock', '2500', 26, NULL, 0.00),
(198, 5, 'Butter', 'bar', '0', '0', 37.05, 3, 'instock', '1', 21, NULL, 0.00),
(199, 5, 'Grounded Peanuts', 'kl.', '0', '0', 195.00, 3, 'instock', '1', 26, NULL, 0.00),
(200, 5, 'Corn Oil', 'kl', '165', '0', 0.11, 3, 'instock', '15000', 25, NULL, 0.00),
(201, 5, 'Vanilla', 'kl', '0', '0', 0.03, 3, 'instock', '1000', 22, NULL, 0.00),
(202, 7, 'Cappucino', 'cup', '0', '0', 50.00, 4, 'nonstock', '0', 3, NULL, 85.00),
(203, 5, 'Tuba', 'ltr.', '0', '0', 75.00, 3, 'instock', '0', 3, NULL, 0.00),
(204, 12, 'Coffee Machine Cups', 'pc', '0', '0', 0.00, 4, 'instock', '100', 3, NULL, 0.00),
(205, 5, 'Eggs', 'pc', '2100', '0', 6.00, 3, 'instock', '60', 20, NULL, 0.00),
(206, 7, 'Milo', 'sachet', '0', '0', 7.00, 4, 'instock', '2', 3, NULL, 15.00),
(207, 11, 'Gasul 11kls.', 'kl', '0', '0', 810.00, 3, 'instock', '3', 3, NULL, 0.00),
(208, 5, 'Solane', 'cylinder', '0', '0', 790.00, 3, 'instock', '1', 3, NULL, 0.00),
(209, 5, 'Plastic Bowl 520cc W/ Lid', 'pc', '0', '0', 3.65, 3, 'instock', '10', 22, NULL, 0.00),
(210, 5, 'Iodized Salt', 'bottle', '0', '0', 24.25, 3, 'instock', '1', 3, NULL, 0.00),
(211, 5, 'Black Pepper', 'bottle', '0', '0', 72.05, 3, 'instock', '1', 3, NULL, 0.00),
(212, 8, 'Batchoy Special', 'cup', '0', '0', 35.00, 4, 'nonstock', '0', 3, NULL, 60.00),
(213, 8, 'Batchoy Regular', 'cup', '0', '0', 30.00, 4, 'nonstock', '0', 3, NULL, 50.00),
(214, 8, 'Bam-i', 'pack', '1', '-1', 50.00, 4, 'instock', '2', 3, NULL, 75.00),
(215, 7, 'Classic Coffee', 'cup', '0', '0', 20.00, 4, 'nonstock', '0', 3, NULL, 30.00),
(216, 6, 'Potu Cheese', 'pack', '0', '0', 20.00, 4, 'nonstock', '0', 3, NULL, 30.00),
(217, 6, 'Puto Cheese', 'pack', '0', '0', 20.00, 4, 'instock', '5', 3, NULL, 30.00),
(218, 7, 'Coke Bottle', 'bottle', '0', '0', 6.00, 4, 'instock', '20', 8, NULL, 10.00),
(219, 6, 'Puto Cheese Big', 'pc', '0', '0', 4.00, 4, 'instock', '10', 3, NULL, 6.00),
(220, 9, 'Mixed Fruits Shake', 'cup', '0', '0', 50.00, 4, 'nonstock', '0', 3, NULL, 75.00),
(221, 10, 'Bagoong Sweet And Spicy', 'bottle', '0', '0', 80.00, 4, 'instock', '5', 3, NULL, 120.00),
(222, 10, 'Bagoong Sweet Flavored', 'bottle', '0', '0', 80.00, 4, 'instock', '3', 3, NULL, 120.00),
(223, 10, 'Bagoong Hot Flavored', 'bottle', '0', '0', 80.00, 4, 'instock', '3', 3, NULL, 120.00),
(224, 10, 'Bagoong Extra Hot', 'bottle', '0', '0', 80.00, 4, 'instock', '3', 3, NULL, 120.00),
(225, 9, 'Polvoron Assorted', 'bx', '0', '0', 130.00, 4, 'instock', '5', 3, NULL, 180.00),
(226, 9, 'Durian Shake', 'cup', '0', '0', 40.00, 4, 'nonstock', '0', 3, NULL, 70.00),
(227, 9, 'Polvoron Premiun', 'bx', '0', '0', 120.00, 4, 'instock', '2', 3, NULL, 180.00),
(228, 9, 'Ice Cream Scooping', 'scoop', '0', '0', 40.00, 4, 'nonstock', '0', 3, NULL, 55.00),
(229, 7, 'Ice Coffee', 'glass', '0', '0', 45.00, 4, 'nonstock', '0', 3, NULL, 70.00),
(230, 7, 'Matcha Tea', 'glass', '0', '0', 45.00, 4, 'nonstock', '0', 3, NULL, 70.00),
(231, 7, 'Taro Juice', 'glass', '0', '0', 65.00, 4, 'nonstock', '0', 3, NULL, 80.00),
(232, 7, 'Honey Dew', 'glass', '0', '0', 45.00, 4, 'nonstock', '0', 3, NULL, 70.00),
(234, 9, 'Peanut Butter', 'jar', '0', '0', 130.00, 4, 'instock', '2', 3, NULL, 160.00),
(235, 6, 'Bake Polvoron Big', 'pack', '0', '0', 30.00, 4, 'instock', '2', 3, NULL, 40.00),
(237, 9, 'Cheesecake New', 'pack', '49', '0', 30.00, 4, 'instock', '10', 3, NULL, 37.00),
(239, 8, 'Ngohiong', 'pc', '5', '-5', 7.00, 4, 'instock', '0', 3, NULL, 12.00),
(240, 8, 'Ngohiong  With Rice', 'set', '0', '0', 31.00, 4, 'nonstock', '0', 3, NULL, 50.00),
(241, 9, 'Tapioca', 'cup', '0', '0', 50.00, 4, 'instock', '5', 3, NULL, 65.00);

-- --------------------------------------------------------

--
-- Table structure for table `stock_class`
--

CREATE TABLE `stock_class` (
  `stockclass_id` int(10) UNSIGNED NOT NULL,
  `stockclass_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_class`
--

INSERT INTO `stock_class` (`stockclass_id`, `stockclass_name`) VALUES
(3, 'RAW'),
(4, 'FINISHED');

-- --------------------------------------------------------

--
-- Table structure for table `stock_newlog`
--

CREATE TABLE `stock_newlog` (
  `stock_newid` int(10) UNSIGNED NOT NULL,
  `stock_id` int(10) UNSIGNED NOT NULL,
  `nstock_qqty` char(10) NOT NULL,
  `nstock_unit` varchar(45) NOT NULL,
  `nstock_status` varchar(45) NOT NULL DEFAULT 'ok/damage',
  `delivery_date` char(19) NOT NULL,
  `nstock_pqty` char(10) NOT NULL COMMENT 'stock before update',
  `emp_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_stat` varchar(85) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_newlog`
--

INSERT INTO `stock_newlog` (`stock_newid`, `stock_id`, `nstock_qqty`, `nstock_unit`, `nstock_status`, `delivery_date`, `nstock_pqty`, `emp_id`, `delivery_stat`) VALUES
(1, 6, '253', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(2, 7, '214', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(3, 8, '121', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(4, 9, '178', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(5, 10, '326', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(6, 11, '305', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(7, 13, '22', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(8, 16, '30', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(9, 17, '55', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(10, 19, '42', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(11, 20, '4', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(12, 144, '9', 'set', 'GOOD', '2020-01-15', '0', 8, 'received'),
(13, 149, '12', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(14, 150, '24', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(15, 167, '1', '3pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(16, 24, '61', 'bottle', 'GOOD', '2020-01-15', '0', 8, 'received'),
(17, 25, '81', 'bottle', 'GOOD', '2020-01-15', '0', 8, 'received'),
(18, 26, '35', 'bottle', 'GOOD', '2020-01-15', '0', 8, 'received'),
(19, 28, '16', 'stick', 'GOOD', '2020-01-15', '0', 8, 'received'),
(20, 29, '17', 'cup', 'GOOD', '2020-01-15', '0', 8, 'received'),
(21, 33, '36', 'pc', 'GOOD', '2020-01-15', '0', 8, 'received'),
(22, 52, '64', 'pouch', 'GOOD', '2020-01-15', '0', 8, 'received'),
(23, 56, '138', 'bottle', 'GOOD', '2020-01-15', '0', 8, 'received'),
(24, 58, '44', 'bottle', 'GOOD', '2020-01-15', '0', 8, 'received'),
(25, 60, '9', 'bottle', 'GOOD', '2020-01-15', '0', 8, 'received'),
(26, 63, '4', 'cans', 'GOOD', '2020-01-15', '0', 8, 'received'),
(27, 159, '6', 'pc', 'GOOD', '2020-01-15', '0', 8, 'received'),
(28, 160, '4', 'pc', 'GOOD', '2020-01-15', '0', 8, 'received'),
(29, 168, '411', 'cup', 'GOOD', '2020-01-15', '0', 8, 'received'),
(30, 214, '17', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(31, 239, '75', 'pc', 'GOOD', '2020-01-15', '0', 8, 'received'),
(32, 21, '8', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(33, 22, '8', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(34, 50, '8', 'serve', 'GOOD', '2020-01-15', '0', 8, 'received'),
(35, 237, '37', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(36, 241, '1', 'cup', 'GOOD', '2020-01-15', '0', 8, 'received'),
(37, 35, '7', 'bottle', 'GOOD', '2020-01-15', '0', 8, 'received'),
(38, 36, '15', 'bottle', 'GOOD', '2020-01-15', '0', 8, 'received'),
(39, 37, '39', 'bottle', 'GOOD', '2020-01-15', '0', 8, 'received'),
(40, 38, '38', 'bottle', 'GOOD', '2020-01-15', '0', 8, 'received'),
(41, 39, '38', 'pouch', 'GOOD', '2020-01-15', '0', 8, 'received'),
(42, 44, '22', 'container', 'GOOD', '2020-01-15', '0', 8, 'received'),
(43, 45, '18', 'container', 'GOOD', '2020-01-15', '0', 8, 'received'),
(44, 154, '8', 'pouch', 'GOOD', '2020-01-15', '0', 8, 'received'),
(45, 222, '3', 'bottle', 'GOOD', '2020-01-15', '0', 8, 'received'),
(46, 46, '372', 'pc', 'GOOD', '2020-01-15', '0', 8, 'received'),
(47, 48, '32', 'pc', 'GOOD', '2020-01-15', '0', 8, 'received'),
(48, 129, '14', 'pc', 'GOOD', '2020-01-15', '0', 8, 'received'),
(49, 130, '6', 'pc', 'GOOD', '2020-01-15', '0', 8, 'received'),
(50, 131, '12', 'pc', 'GOOD', '2020-01-15', '0', 8, 'received'),
(51, 132, '13', 'pc', 'GOOD', '2020-01-15', '0', 8, 'received'),
(52, 204, '200', 'pc', 'GOOD', '2020-01-15', '0', 8, 'received'),
(53, 6, '4', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(54, 193, '217.5', 'kl', 'GOOD', '2020-01-15', '0', 8, 'received'),
(55, 167, '9', '3pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(56, 183, '222.25', 'kl', 'GOOD', '2020-01-15', '0', 8, 'received'),
(57, 192, '101', 'bar', 'GOOD', '2020-01-15', '0', 8, 'received'),
(58, 191, '3', 'pouch', 'GOOD', '2020-01-15', '0', 8, 'received'),
(59, 195, '6', 'kl.', 'GOOD', '2020-01-15', '0', 8, 'received'),
(60, 201, '18.25', 'kl', 'GOOD', '2020-01-15', '0', 8, 'received'),
(61, 190, '30', 'can', 'GOOD', '2020-01-15', '0', 8, 'received'),
(62, 186, '4', 'can', 'GOOD', '2020-01-15', '0', 8, 'received'),
(63, 185, '50', 'can', 'GOOD', '2020-01-15', '0', 8, 'received'),
(64, 188, '162', 'cup', 'GOOD', '2020-01-15', '0', 8, 'received'),
(65, 187, '430', 'cup', 'GOOD', '2020-01-15', '0', 8, 'received'),
(66, 196, '8', 'kl', 'GOOD', '2020-01-15', '0', 8, 'received'),
(67, 205, '362', 'pc', 'GOOD', '2020-01-15', '0', 8, 'received'),
(68, 197, '11.25', 'kl', 'GOOD', '2020-01-15', '0', 8, 'received'),
(69, 200, '91', 'kl', 'GOOD', '2020-01-15', '0', 8, 'received'),
(70, 198, '4', 'bar', 'GOOD', '2020-01-15', '0', 8, 'received'),
(71, 144, '30', 'set', 'GOOD', '2020-01-15', '0', 8, 'received'),
(72, 6, '95', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(73, 9, '95', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(74, 7, '34', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(75, 7, '60', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(76, 7, '60', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(77, 8, '66', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(78, 11, '63', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(79, 20, '16', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(80, 43, '13', 'kil', 'GOOD', '2020-01-15', '0', 8, 'received'),
(81, 144, '29', 'set', 'GOOD', '2020-01-15', '0', 8, 'received'),
(82, 6, '68', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(83, 9, '25', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(84, 8, '60', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(85, 6, '36', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(86, 6, '36', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(87, 7, '19', 'pcs', 'GOOD', '2020-01-15', '0', 8, 'received'),
(88, 16, '2', 'pack', 'GOOD', '2020-01-15', '0', 8, 'received'),
(89, 7, '60', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(90, 7, '60', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(91, 7, '24', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(92, 7, '45', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(93, 7, '28', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(94, 13, '32', 'pack', 'GOOD', '2020-01-17', '0', 8, 'received'),
(95, 6, '31', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(96, 6, '85', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(97, 6, '85', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(98, 6, '85', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(99, 22, '20', 'pack', 'GOOD', '2020-01-17', '0', 8, 'received'),
(100, 167, '14', '3pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(101, 17, '50', 'pack', 'GOOD', '2020-01-17', '0', 8, 'received'),
(102, 24, '150', 'bottle', 'GOOD', '2020-01-17', '0', 8, 'received'),
(103, 205, '270', 'pc', 'GOOD', '2020-01-17', '0', 8, 'received'),
(104, 205, '240', 'pc', 'GOOD', '2020-01-17', '0', 8, 'received'),
(105, 197, '22.50', 'kl', 'GOOD', '2020-01-17', '0', 8, 'received'),
(106, 200, '165.00', 'kl', 'GOOD', '2020-01-17', '0', 8, 'received'),
(107, 6, '48', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(108, 7, '60', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(109, 6, '48', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(110, 7, '60', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(111, 7, '28', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(112, 7, '7', 'pcs', 'GOOD', '2020-01-17', '0', 8, 'received'),
(113, 192, '96', 'bar', 'GOOD', '2020-01-17', '0', 8, 'received'),
(114, 186, '6', 'can', 'GOOD', '2020-01-17', '0', 8, 'received'),
(115, 187, '17', 'cup', 'GOOD', '2020-01-17', '0', 8, 'received'),
(116, 205, '990', 'pc', 'GOOD', '2020-01-17', '0', 8, 'received'),
(117, 129, '3', 'pc', 'GOOD', '2020-01-17', '0', 8, 'received'),
(118, 167, '24', '3pcs', 'GOOD', '2020-01-18', '0', 8, 'received'),
(119, 13, '8', 'pack', 'GOOD', '2020-01-18', '0', 8, 'received'),
(120, 237, '4', 'pack', 'GOOD', '2020-01-18', '0', 8, 'received'),
(121, 17, '3', 'pack', 'GOOD', '2020-01-18', '0', 8, 'received'),
(123, 10, '40', 'pack', 'GOOD', '2020-01-18', '0', 8, 'received'),
(124, 10, '21', 'pack', 'GOOD', '2020-01-18', '0', 8, 'received'),
(125, 8, '75', 'pcs', 'GOOD', '2020-01-18', '0', 8, 'received'),
(126, 8, '48', 'pcs', 'GOOD', '2020-01-18', '0', 8, 'received'),
(127, 10, '51', 'pack', 'GOOD', '2020-01-18', '0', 8, 'received'),
(128, 20, '21', 'pack', 'GOOD', '2020-01-18', '0', 8, 'received'),
(129, 237, '3', 'pack', 'GOOD', '2020-01-18', '0', 8, 'received'),
(130, 13, '3', 'pack', 'GOOD', '2020-01-18', '0', 8, 'received'),
(131, 17, '4', 'pack', 'GOOD', '2020-01-18', '0', 8, 'received'),
(132, 17, '50', 'pack', 'GOOD', '2020-01-18', '0', 8, 'received'),
(134, 130, '1', 'pc', 'GOOD', '2020-01-18', '0', 8, 'received'),
(135, 154, '50', 'pouch', 'GOOD', '2020-01-18', '0', 8, 'received'),
(136, 9, '4', 'pcs', 'GOOD', '2020-01-18', '0', 8, 'received'),
(137, 6, '11', 'pcs', 'GOOD', '2020-01-18', '0', 8, 'received'),
(138, 190, '48', 'can', 'GOOD', '2020-01-18', '0', 8, 'received'),
(139, 185, '48', 'can', 'GOOD', '2020-01-18', '0', 8, 'received'),
(140, 6, '95', 'pcs', 'GOOD', '2020-01-18', '0', 8, 'received'),
(141, 6, '95', 'pcs', 'GOOD', '2020-01-18', '0', 8, 'received'),
(142, 6, '70', 'pcs', 'GOOD', '2020-01-18', '0', 8, 'received'),
(143, 9, '95', 'pcs', 'GOOD', '2020-01-18', '0', 8, 'received'),
(144, 9, '38', 'pcs', 'GOOD', '2020-01-18', '0', 8, 'received'),
(145, 7, '63', 'pcs', 'GOOD', '2020-01-18', '0', 8, 'received'),
(146, 7, '60', 'pcs', 'GOOD', '2020-01-18', '0', 8, 'received'),
(147, 7, '36', 'pcs', 'GOOD', '2020-01-18', '0', 8, 'received'),
(148, 7, '8', 'pcs', 'GOOD', '2020-01-18', '0', 8, 'received'),
(149, 21, '12', 'pack', 'GOOD', '2020-01-18', '0', 8, 'received'),
(150, 237, '7', 'pack', 'GOOD', '2020-01-18', '0', 8, 'received'),
(151, 205, '600', 'pc', 'GOOD', '2020-01-18', '0', 8, 'received'),
(152, 186, '15', 'can', 'GOOD', '2020-01-18', '0', 8, 'received'),
(153, 237, '4', 'pack', 'GOOD', '2020-01-19', '0', 8, 'received'),
(154, 167, '11', '3pcs', 'GOOD', '2020-01-19', '0', 8, 'received'),
(155, 237, '40', 'pack', 'GOOD', '2020-01-19', '0', 8, 'received'),
(156, 10, '1', 'pack', 'GOOD', '2020-01-19', '0', 8, 'received'),
(157, 144, '1', 'set', 'GOOD', '2020-01-19', '0', 8, 'received'),
(158, 6, '95', 'pcs', 'GOOD', '2020-01-19', '0', 8, 'received'),
(159, 6, '85', 'pcs', 'GOOD', '2020-01-19', '0', 8, 'received'),
(161, 7, '45', 'pcs', 'GOOD', '2020-01-19', '0', 8, 'received'),
(162, 7, '36', 'pcs', 'GOOD', '2020-01-19', '0', 8, 'received'),
(163, 7, '36', 'pcs', 'GOOD', '2020-01-19', '0', 8, 'received'),
(164, 7, '34', 'pcs', 'GOOD', '2020-01-19', '0', 8, 'received'),
(166, 161, '9', 'glass', 'GOOD', '2020-01-19', '0', 8, 'received'),
(168, 131, '29', 'pc', 'GOOD', '2020-01-19', '0', 8, 'received'),
(169, 132, '29', 'pc', 'GOOD', '2020-01-19', '0', 8, 'received'),
(170, 8, '66', 'pcs', 'GOOD', '2020-01-19', '145', 33, 'received');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_tel` char(11) NOT NULL,
  `supplier_mobile` char(11) NOT NULL,
  `supplier_email` varchar(85) NOT NULL,
  `supplier_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `supplier_tel`, `supplier_mobile`, `supplier_email`, `supplier_desc`) VALUES
(3, 'Ojs Production', '2334635', '09770818583', 'ojsproduction@yahoo.com', 'Ojs Production area'),
(4, 'Miguelita Agua', '', '', '', 'Local Products'),
(5, 'BahalMax', '', '', '', 'bahal max, sulirap, sukarap, mango nilo'),
(6, 'Big City Food Factory', '', '', '', 'Juice, drinks'),
(7, 'Organic Product', '', '', '', 'Black Rice'),
(8, 'New Batch Marketing', '', '', '', 'Mismo / softdrinks'),
(9, 'Natures Spring Purewell', '', '', '', 'Mineral water'),
(10, 'Guilang Tablea', '', '', '', 'Local Products'),
(11, 'Mates', '', '', '', 'Peanuts'),
(12, 'Apex Foods', '', '', '', 'Drinks'),
(13, 'Prince Warehouse', '', '', '', 'General Products'),
(14, 'Joy Duenas', '', '', '', 'Local Products'),
(15, 'Rico', '', '', '', 'Local Products'),
(16, 'Flora Albarracin', '', '', '', 'Local Products'),
(17, 'Analy Villarta', '', '', '', 'Local Products'),
(18, 'Eneria Ruba', '', '', '', 'Baking supplies'),
(19, 'Vismin Adment Traders', '', '', '', 'Can Milk'),
(20, 'Cherry Bacalso', '', '', '', 'eggs'),
(21, 'Arromoni Norio Marketing', '', '', '', 'Ingredients'),
(22, 'OngKin King', '', '', '', 'Productions ingredients and materials'),
(23, 'Philippine Paper Craft', '', '', '', 'Boxes'),
(24, 'Multipak', '', '', '', 'fabricated box'),
(25, 'Ricor Mills', '', '', '', 'Oil'),
(26, 'Caro Ann Marie', '', '', '', 'ingredients'),
(27, 'Ever Green Printing', '', '', '', 'laminated plastic'),
(28, 'Cheche', '', '', '', 'local products'),
(29, 'Landers', '', '', '', 'Coffee'),
(30, 'R @ M', '', '', '', 'mango puree');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_access`
--
ALTER TABLE `assign_access`
  ADD PRIMARY KEY (`assign_access_id`);

--
-- Indexes for table `branch_stocks`
--
ALTER TABLE `branch_stocks`
  ADD PRIMARY KEY (`branch_stocksid`);

--
-- Indexes for table `cashier_logbook`
--
ALTER TABLE `cashier_logbook`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `daily_output`
--
ALTER TABLE `daily_output`
  ADD PRIMARY KEY (`dailyout_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `employee_log`
--
ALTER TABLE `employee_log`
  ADD PRIMARY KEY (`employee_log_id`);

--
-- Indexes for table `emp_accounts`
--
ALTER TABLE `emp_accounts`
  ADD PRIMARY KEY (`emp_account_id`);

--
-- Indexes for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  ADD PRIMARY KEY (`emp_attendance_id`);

--
-- Indexes for table `emp_credits`
--
ALTER TABLE `emp_credits`
  ADD PRIMARY KEY (`emp_credit_id`) USING BTREE;

--
-- Indexes for table `emp_overtime`
--
ALTER TABLE `emp_overtime`
  ADD PRIMARY KEY (`emp_overtime_id`),
  ADD KEY `FK_emp_overtime_1` (`ot_type_id`);

--
-- Indexes for table `emp_salary`
--
ALTER TABLE `emp_salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `expenses_misc`
--
ALTER TABLE `expenses_misc`
  ADD PRIMARY KEY (`misc_id`);

--
-- Indexes for table `expenses_prod`
--
ALTER TABLE `expenses_prod`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `expenses_stocks`
--
ALTER TABLE `expenses_stocks`
  ADD PRIMARY KEY (`expstocks_id`);

--
-- Indexes for table `incomestatement`
--
ALTER TABLE `incomestatement`
  ADD PRIMARY KEY (`statement_id`);

--
-- Indexes for table `job_position`
--
ALTER TABLE `job_position`
  ADD PRIMARY KEY (`job_position_id`) USING BTREE;

--
-- Indexes for table `mishandle_reports`
--
ALTER TABLE `mishandle_reports`
  ADD PRIMARY KEY (`report_id`) USING BTREE;

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_restaurant_order_1` (`cust_name`) USING BTREE;

--
-- Indexes for table `ordered_item`
--
ALTER TABLE `ordered_item`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `FK_restaurant_ordered_item_1` (`order_id`);

--
-- Indexes for table `overtime_type`
--
ALTER TABLE `overtime_type`
  ADD PRIMARY KEY (`ot_type_id`);

--
-- Indexes for table `property_info`
--
ALTER TABLE `property_info`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `rate_types`
--
ALTER TABLE `rate_types`
  ADD PRIMARY KEY (`rate_type_id`);

--
-- Indexes for table `releaseditem`
--
ALTER TABLE `releaseditem`
  ADD PRIMARY KEY (`release_item_id`);

--
-- Indexes for table `salary_term`
--
ALTER TABLE `salary_term`
  ADD PRIMARY KEY (`salary_term_id`);

--
-- Indexes for table `stockcategory`
--
ALTER TABLE `stockcategory`
  ADD PRIMARY KEY (`stockCat_id`);

--
-- Indexes for table `stockitem`
--
ALTER TABLE `stockitem`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `FK_stockitem_1` (`stockCat_id`);

--
-- Indexes for table `stock_class`
--
ALTER TABLE `stock_class`
  ADD PRIMARY KEY (`stockclass_id`);

--
-- Indexes for table `stock_newlog`
--
ALTER TABLE `stock_newlog`
  ADD PRIMARY KEY (`stock_newid`) USING BTREE;

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_access`
--
ALTER TABLE `assign_access`
  MODIFY `assign_access_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `branch_stocks`
--
ALTER TABLE `branch_stocks`
  MODIFY `branch_stocksid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `cashier_logbook`
--
ALTER TABLE `cashier_logbook`
  MODIFY `logid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daily_output`
--
ALTER TABLE `daily_output`
  MODIFY `dailyout_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `employee_log`
--
ALTER TABLE `employee_log`
  MODIFY `employee_log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_accounts`
--
ALTER TABLE `emp_accounts`
  MODIFY `emp_account_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  MODIFY `emp_attendance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `emp_credits`
--
ALTER TABLE `emp_credits`
  MODIFY `emp_credit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_overtime`
--
ALTER TABLE `emp_overtime`
  MODIFY `emp_overtime_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_salary`
--
ALTER TABLE `emp_salary`
  MODIFY `salary_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses_misc`
--
ALTER TABLE `expenses_misc`
  MODIFY `misc_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `expenses_prod`
--
ALTER TABLE `expenses_prod`
  MODIFY `prod_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses_stocks`
--
ALTER TABLE `expenses_stocks`
  MODIFY `expstocks_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `incomestatement`
--
ALTER TABLE `incomestatement`
  MODIFY `statement_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_position`
--
ALTER TABLE `job_position`
  MODIFY `job_position_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mishandle_reports`
--
ALTER TABLE `mishandle_reports`
  MODIFY `report_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `ordered_item`
--
ALTER TABLE `ordered_item`
  MODIFY `order_item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=501;

--
-- AUTO_INCREMENT for table `overtime_type`
--
ALTER TABLE `overtime_type`
  MODIFY `ot_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_info`
--
ALTER TABLE `property_info`
  MODIFY `property_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rate_types`
--
ALTER TABLE `rate_types`
  MODIFY `rate_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `releaseditem`
--
ALTER TABLE `releaseditem`
  MODIFY `release_item_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `salary_term`
--
ALTER TABLE `salary_term`
  MODIFY `salary_term_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stockcategory`
--
ALTER TABLE `stockcategory`
  MODIFY `stockCat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stockitem`
--
ALTER TABLE `stockitem`
  MODIFY `stock_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `stock_class`
--
ALTER TABLE `stock_class`
  MODIFY `stockclass_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock_newlog`
--
ALTER TABLE `stock_newlog`
  MODIFY `stock_newid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
