-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2020 at 07:09 PM
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
(26, 'ojs', '4C-ED-FB-73-AD-3F', 'store admin');

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
(1, 8, '2020-01-11', '09:56 AM', NULL, 0.00, 0.00, 0.00, 'open'),
(2, 4, '2020-01-11', '01:38 PM', NULL, 0.00, 0.00, 0.00, 'open'),
(3, 4, '2020-01-12', '11:06 PM', NULL, 0.00, 0.00, 0.00, 'open'),
(4, 4, '2020-01-15', '02:04 AM', NULL, 0.00, 0.00, 0.00, 'open');

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
(2, '2020-01-13', 'Torta S', 'pc', '1', '100', '100', 4);

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
(31, '196', 'De La Torre', 'N', 'Elsa', NULL, '', 'Looc', '', 13, 'active'),
(32, '196', 'Mamac', 'S', 'Divina', NULL, '', '', '', 13, 'active');

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
(9, 10, 'tiwtiw_cashier@ojs', '5ca43669e677f362e1cef6d0c50399ac915c3729', 'cashier'),
(10, 11, 'jennylou_prod@ojs', '6ab61f1153c32647338fb064ffa600624579f603', 'production'),
(11, 12, 'sheila_cashier@ojs', '12e66cbf3e2c8980c372b42b5618a405671ad717', 'cashier'),
(12, 8, 'gemma_cashier@ojs', '6c8cbb2118fa4df82d2c30c38f4b83dcc08affa0', 'cashier'),
(13, 8, 'gemma_prod@ojs', '8f044c295197d648fcba620b0c5cb455c22af219', 'production'),
(15, 9, 'edgar_prod@ojs', '1acf7ba2a245ce633e9f1a1cca1eb2da0845d407', 'production'),
(16, 9, 'tiwtiw_prod@ojs', '21cac00fb06973096f4bdaae8e2607c03a8bc632', 'production'),
(17, 9, 'edgar_cashier@ojs', '1acf7ba2a245ce633e9f1a1cca1eb2da0845d407', 'cashier'),
(20, 22, 'jojo_cashier@ojs', 'fbe55300cb74ab8b7fc84daf8e15b7265207cff7', 'cashier'),
(21, 22, 'jojo_prod@ojs', 'fbb5825baec7378af570c5b48952766313a579da', 'production'),
(22, 4, 'prog_prod', '2a5f2873392366df3aa862cdcfa05a7aa22d8d13', 'back_room'),
(23, 4, 'kimabac', 'f60722685fcc25f78b04b237e7a8c8b1bf60e082', 'cashier');

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
(1, 4, 0.00, '5', 125.00, '2020-01-07'),
(2, 4, 0.00, '2', 50.00, '2020-01-06'),
(3, 4, 0.00, '0', 0.00, '2020-01-12'),
(4, 4, 0.00, '0', 0.00, '2020-01-13'),
(5, 4, 0.00, '2', 25.00, '2020-01-14'),
(6, 10, 0.00, '0', 0.00, '2020-01-05'),
(7, 10, 0.00, '0', 0.00, '2020-01-06'),
(8, 10, 0.00, '2', 50.00, '2020-01-10'),
(9, 10, 0.00, '0', 0.00, '2020-01-12'),
(10, 10, 0.00, '0', 0.00, '2020-01-15'),
(11, 10, 0.00, '2', 50.00, '2020-01-16');

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

--
-- Dumping data for table `emp_credits`
--

INSERT INTO `emp_credits` (`emp_credit_id`, `credit_item_name`, `credit_item_amount`, `credit_item_qty`, `emp_id`, `credit_date`, `credit_status`) VALUES
(1, 'SSS', 200.00, '1', 4, '2020-01-07', 'paid'),
(2, 'PHILH', 200.00, '1', 4, '2020-01-07', 'paid'),
(3, 'CA', 500.00, '1', 4, '2020-01-12', 'not_paid'),
(4, 'OTHERS', 40.00, '3', 4, '2020-01-13', 'not_paid'),
(5, 'OTHERS', 25.00, '1', 4, '2020-01-10', 'not_paid'),
(6, 'SSS', 200.00, '1', 10, '2020-01-10', 'not_paid'),
(7, 'PHILH', 200.00, '1', 10, '2020-01-10', 'not_paid');

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

--
-- Dumping data for table `emp_salary`
--

INSERT INTO `emp_salary` (`salary_id`, `emp_id`, `salary_amount`, `salary_date_start`, `salary_date_end`, `credit_amount`, `overtime_thours`, `overtime_tamount`, `num_days`) VALUES
(8, 4, 3000.00, '2020-01-05', '2020-01-11', 400.00, '7', 175.00, '2'),
(12, 4, 4500.00, '2020-01-12', '2020-01-18', 620.00, '2', 25.00, '3'),
(13, 10, 900.00, '2020-01-05', '2020-01-11', 400.00, '2', 50.00, '3'),
(14, 10, 900.00, '2020-01-12', '2020-01-18', 0.00, '2', 50.00, '3');

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
(1, 'Flour', '5', '5', 500.00, '2020-01-11', 4),
(2, 'Eggs', '20', 'tray', 230.00, '2020-01-11', 4),
(3, 'Milk', '20', 'gallon', 100.00, '2020-01-11', 4);

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
(21, 'WORKING STUDENT', 200.00, 1);

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
(1, 'OC0111-1', 'CASH', '2020-01-11 09:56 AM', 8, 15850.00, 15850.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, 'none', NULL, NULL, '000-000-000', NULL),
(2, 'OC0111-2', 'CASH', '2020-01-11 01:38 PM', 4, 0.00, 0.00, 'purchace', 'not_paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, '', NULL, NULL, '000-000-000', NULL),
(4, 'OC0112-3', 'CASH', '2020-01-12 11:07 PM', 4, 0.00, 0.00, 'order', 'packed', 0.00, NULL, NULL, 0.00, 0.00, 0.00, '2020-01-14', '', '13:00', NULL, '000-000-000', NULL);

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
(1, 1, 'Torta B', 40.00, '50', '2020-01-11', 'instock', 7, 'pcs'),
(2, 1, 'Torta De Ube', 35.00, '100', '2020-01-11', 'instock', 8, 'pcs'),
(3, 1, 'Torta Latte', 35.00, '150', '2020-01-11', 'instock', 9, 'pcs'),
(4, 1, 'Torta S', 30.00, '170', '2020-01-11', 'instock', 6, 'pcs'),
(5, 2, 'Hot Choco', 25.00, '2', '2020-01-11', 'nonstock', 27, 'cup'),
(8, 4, 'Siomai', 9.00, '10', '2020-01-12', 'nonstock', 164, 'pc'),
(9, 4, 'Potu Cheese', 30.00, '5', '2020-01-12', 'nonstock', 216, 'pack');

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
(1, 'Ojs Torta', 'Poblacion', 'Argao', 'Cebu', 'Philippines', '6021', '3677572', '3677572', 'none', 'ojstorta@gmail.com', 'logo.png', 'img/', 'ojs_admin', '7f87d3d43d2a8313291b3a981f5b3d39dafe3dbb', '249-854-682-000');

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
(3, 'cup', '50', 187, '2020-01-14', 4);

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
  `stock_qqty` char(10) NOT NULL,
  `stockDispose` char(10) NOT NULL DEFAULT '0',
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
(6, 6, 'Torta S', 'pcs', '40781', '0', 0.00, 4, 'instock', '20', 3, NULL, 30.00),
(7, 6, 'Torta B', 'pcs', '34626', '0', 0.00, 4, 'instock', '20', 3, NULL, 40.00),
(8, 6, 'Torta De Ube', 'pcs', '13419', '0', 0.00, 4, 'instock', '10', 3, NULL, 35.00),
(9, 6, 'Torta Latte', 'pcs', '10828', '0', 0.00, 4, 'instock', '10', 3, NULL, 35.00),
(10, 6, 'Suncake', 'pack', '11568', '0', 0.00, 4, 'instock', '10', 3, NULL, 45.00),
(11, 6, 'Bake Polvoron', 'pack', '3809', '0', 0.00, 4, 'instock', '10', 3, NULL, 38.00),
(13, 6, 'Macaroons', 'pack', '1221', '0', 0.00, 4, 'instock', '10', 3, NULL, 45.00),
(14, 6, 'Podreda', 'pack', '56', '0', 16.25, 4, 'instock', '10', 14, NULL, 30.00),
(15, 6, 'Tostado', 'pack', '9', '0', 21.60, 4, 'instock', '5', 3, NULL, 45.00),
(16, 6, 'Peañato', 'pack', '448', '-10', 21.00, 4, 'instock', '5', 15, NULL, 40.00),
(17, 6, 'Browas', 'pack', '2131', '0', 60.00, 4, 'instock', '5', 16, NULL, 80.00),
(18, 6, 'Banana Chips', 'pack', '313', '0', 0.00, 4, 'instock', '5', 3, NULL, 40.00),
(19, 6, 'Sampaloc', 'pack', '488', '24', 14.17, 4, 'instock', '5', 3, NULL, 35.00),
(20, 6, 'Toron', 'pack', '629', '0', 0.00, 4, 'instock', '5', 3, NULL, 40.00),
(21, 9, 'Leche Plan', 'pack', '418', '0', 50.00, 4, 'instock', '5', 3, NULL, 120.00),
(22, 9, 'Mango Float', 'pack', '772', '0', 61.50, 4, 'instock', '5', 3, NULL, 120.00),
(23, 9, 'Buko Pandan', 'pc', '32', '-1', 0.00, 4, 'instock', '5', 3, NULL, 70.00),
(24, 7, 'Calamansi Juice', 'bottle', '1455', '28', 21.00, 4, 'instock', '10', 6, NULL, 30.00),
(25, 7, 'Mismo', 'bottle', '760', '-3', 12.00, 4, 'instock', '20', 8, NULL, 17.00),
(26, 7, 'Coke Swakto', 'bottle', '832', '24', 8.00, 4, 'instock', '20', 6, NULL, 12.00),
(27, 7, 'Hot Choco', 'cup', '0', '0', 15.00, 4, 'nonstock', '0', 3, NULL, 25.00),
(28, 7, 'Coffee Stick', 'stick', '71', '0', 2.50, 4, 'instock', '20', 13, NULL, 15.00),
(29, 7, '3 In 1 Coffee', 'cup', '81', '0', 6.00, 4, 'instock', '20', 13, NULL, 25.00),
(32, 7, 'Chocolite Small', 'pc', '91', '-3', 0.00, 4, 'instock', '5', 6, NULL, 15.00),
(33, 7, 'Chocolite Big', 'pc', '54', '-2', 0.00, 4, 'instock', '5', 6, NULL, 30.00),
(34, 7, 'Litro', 'liter', '46', '-1', 27.00, 4, 'instock', '5', 6, NULL, 40.00),
(35, 10, 'Bahal Max', 'bottle', '38', '7', 50.00, 4, 'instock', '10', 5, NULL, 80.00),
(36, 10, 'Mango Nilo', 'bottle', '19', '0', 50.00, 4, 'instock', '10', 5, NULL, 80.00),
(37, 10, 'Sukarap', 'bottle', '105', '3', 43.00, 4, 'instock', '10', 5, NULL, 65.00),
(38, 10, 'Sulirap', 'bottle', '63', '2', 53.00, 4, 'instock', '10', 5, NULL, 75.00),
(39, 10, 'Turmeric', 'pouch', '129', '0', 100.00, 4, 'instock', '10', 4, NULL, 125.00),
(40, 10, 'Tablea S', 'pouch', '76', '0', 95.00, 4, 'instock', '10', 10, NULL, 150.00),
(41, 10, 'Tablea M', 'pouch', '80', '-1', 135.00, 4, 'instock', '10', 10, NULL, 180.00),
(42, 10, 'Chicharon', 'pc', '0', '0', 20.00, 4, 'instock', '20', 5, NULL, 25.00),
(43, 10, 'Black Rice', 'kil', '57', '0', 65.00, 4, 'instock', '20', 7, NULL, 100.00),
(44, 10, 'Coated Peanut', 'container', '138', '0', 55.00, 4, 'instock', '20', 11, NULL, 80.00),
(45, 10, 'Salted Peanut', 'container', '137', '0', 55.00, 4, 'instock', '20', 11, NULL, 80.00),
(46, 11, 'Boxes SP Small 4', 'pc', '637', '13', 13.00, 4, 'instock', '50', 23, NULL, 20.00),
(47, 11, 'Boxes SP Small 6', 'pc', '553', '4', 14.00, 4, 'instock', '50', 23, NULL, 20.00),
(48, 11, 'Boxes SP Small 12', 'pc', '1071', '-5', 17.00, 4, 'instock', '50', 23, NULL, 20.00),
(49, 11, 'Blue Bag', 'pc', '0', '0', 0.00, 4, 'instock', '50', 3, NULL, 20.00),
(50, 9, 'Black Sambo', 'serve', '152', '0', 0.00, 4, 'instock', '5', 3, NULL, 120.00),
(51, 7, 'Minute Maid', 'bottle', '28', '-4', 25.00, 4, 'instock', '10', 8, NULL, 32.00),
(52, 7, 'Minute Pouch', 'pouch', '136', '0', 7.00, 4, 'instock', '10', 8, NULL, 15.00),
(53, 7, 'Pineapple Orange', 'can', '0', '0', 0.00, 4, 'instock', '10', 6, NULL, 44.00),
(54, 7, 'Zest-O Mango Nectar', 'pouch', '0', '0', 0.00, 4, 'instock', '10', 6, NULL, 44.00),
(55, 7, 'Cali', 'can', '43', '0', 0.00, 4, 'instock', '10', 6, NULL, 44.00),
(56, 7, 'Mineral', 'bottle', '1677', '54', 9.00, 4, 'instock', '20', 9, NULL, 15.00),
(57, 10, 'Tablea S Tube', 'tube', '188', '0', 110.00, 4, 'instock', '10', 10, NULL, 175.00),
(58, 7, 'C2', 'bottle', '438', '17', 10.00, 4, 'instock', '10', 8, NULL, 15.00),
(59, 7, 'Ice Black', 'bottle', '19', '0', 11.00, 4, 'instock', '20', 12, NULL, 20.00),
(60, 7, 'Blanca', 'bottle', '87', '0', 11.00, 4, 'instock', '20', 12, NULL, 20.00),
(61, 7, '78°C', 'bottle', '0', '0', 11.00, 4, 'instock', '20', 12, NULL, 23.00),
(62, 7, 'Ice Brown', 'bottle', '26', '0', 11.00, 4, 'instock', '20', 12, NULL, 20.00),
(63, 7, 'Coke Original', 'cans', '72', '0', 25.30, 4, 'instock', '10', 13, NULL, 44.00),
(64, 7, 'Coke Light', 'cans', '65', '0', 25.30, 4, 'instock', '10', 13, NULL, 44.00),
(65, 7, 'Coke Zero', 'cans', '50', '0', 25.30, 4, 'instock', '10', 13, NULL, 44.00),
(66, 7, 'Coke 1.5', 'bottles', '42', '-6', 54.00, 4, 'instock', '10', 13, NULL, 68.00),
(89, 5, 'Plastic 6x10x04', 'kl', '7', '0', 130.00, 3, 'instock', '0', 22, NULL, 0.00),
(90, 5, 'Chelo Sht. Small', 'kl', '18', '0', 200.00, 3, 'instock', '0', 22, NULL, 0.00),
(91, 5, 'Laminated Plastic', 'pc', '25', '0', 1.70, 3, 'instock', '0', 27, NULL, 0.00),
(92, 5, 'Microwaveable Round Plastic Container 200ml', 'pc', '8', '0', 4.00, 3, 'instock', '0', 22, NULL, 0.00),
(93, 5, 'Microwaveable Rectangular Plastic Containerer 500ml', 'pc', '361', '0', 6.10, 3, 'instock', '0', 22, NULL, 0.00),
(106, 5, 'Disposable Spoon', 'pc', '90', '104', 0.50, 3, 'instock', '40', 25, NULL, 0.00),
(128, 11, 'Disposable Styro Cups', 'pc', '168', '0', 2.40, 3, 'instock', '100', 3, NULL, 0.00),
(129, 11, 'Box SP Big 6', 'pc', '363', '-31', 18.00, 4, 'instock', '50', 23, NULL, 20.00),
(130, 11, 'Box SP Big 12', 'pc', '816', '-11', 21.00, 4, 'instock', '50', 23, NULL, 20.00),
(131, 11, 'Box Fab Big', 'pc', '290', '-1', 16.00, 4, 'instock', '10', 24, NULL, 20.00),
(132, 11, 'Box Fab Small', 'pc', '232', '0', 12.00, 4, 'instock', '10', 24, NULL, 20.00),
(133, 11, 'Packaging Tape', 'roll', '5', '2', 0.00, 3, 'instock', '5', 23, NULL, 20.00),
(134, 11, 'Ribbon', 'roll', '26', '11', 0.00, 3, 'instock', '5', 23, NULL, 20.00),
(135, 10, 'Box Strew', 'roll', '2', '1', 0.00, 3, 'instock', '5', 22, NULL, 0.00),
(136, 9, 'Halo-halo', 'serve', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 85.00),
(137, 9, 'Shake Mango', 'serving', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 60.00),
(138, 9, 'Shake Banana', 'serving', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 60.00),
(139, 9, 'Shake Pineapple', 'serving', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 60.00),
(140, 9, 'Shake Strawberry', 'serving', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 70.00),
(141, 9, 'Shake Guyavano', 'serving', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 60.00),
(142, 9, 'Shake Choco', 'serving', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 60.00),
(143, 9, 'Shake Milk', 'serving', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 60.00),
(144, 6, 'Puto', 'set', '2049', '0', 15.00, 4, 'instock', '5', 3, NULL, 25.00),
(145, 7, 'Fresh Calamansi Juice', 'serve', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 40.00),
(146, 7, 'Fresh Apple Juice', 'serve', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 80.00),
(147, 7, 'Fresh Orange Juice', 'serve', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 80.00),
(148, 7, 'Fresh Carrot Juice', 'serve', '0', '0', 0.00, 4, 'nonstock', '0', 3, NULL, 110.00),
(149, 6, 'Spaghetti', 'pack', '287', '0', 50.00, 4, 'instock', '0', 3, NULL, 85.00),
(150, 6, 'Chicken Salad', 'pack', '268', '-2', 45.00, 4, 'instock', '0', 3, NULL, 90.00),
(151, 10, 'Goats Milk', 'bottle', '0', '0', 50.00, 4, 'instock', '0', 28, NULL, 75.00),
(152, 10, 'Honey', 'bottle', '34', '0', 250.00, 4, 'instock', '0', 28, NULL, 280.00),
(153, 10, 'Tablea White S', 'pouch', '102', '-2', 95.00, 4, 'instock', '10', 10, NULL, 150.00),
(154, 10, 'Tablea White M', 'pouch', '69', '0', 135.00, 4, 'instock', '10', 10, NULL, 180.00),
(155, 10, 'Tablea M Tube', 'tube', '111', '-3', 175.00, 4, 'instock', '10', 10, NULL, 225.00),
(156, 10, 'Tablea L Tube', 'tube', '106', '0', 220.00, 4, 'instock', '10', 10, NULL, 270.00),
(158, 6, 'Cheesecake', 'pack', '982', '0', 0.00, 4, 'instock', '10', 3, NULL, 40.00),
(159, 7, 'Tea Green', 'pc', '24', '-2', 7.00, 4, 'instock', '5', 13, NULL, 15.00),
(160, 7, 'Black Tea', 'pc', '15', '1', 7.00, 4, 'instock', '5', 13, NULL, 15.00),
(161, 7, 'Buko Juice', 'glass', '128', '0', 5.00, 4, 'instock', '2', 3, NULL, 10.00),
(162, 6, 'Squid Roll', 'set', '0', '0', 20.00, 4, 'nonstock', '0', 3, NULL, 25.00),
(163, 6, 'Tempura', 'set', '0', '0', 20.00, 4, 'nonstock', '0', 3, NULL, 25.00),
(164, 6, 'Siomai', 'pc', '0', '0', 7.00, 4, 'nonstock', '0', 3, NULL, 9.00),
(165, 6, 'French Fries', 'serve', '0', '0', 40.00, 4, 'nonstock', '0', 3, NULL, 70.00),
(167, 6, 'BudBud', '3pcs', '616', '-1', 15.00, 4, 'instock', '1', 3, NULL, 25.00),
(168, 7, 'Brewed Coffee', 'cup', '-395', '-17', 14.50, 4, 'instock', '20', 3, NULL, 55.00),
(169, 11, 'Broad Coffee Creamer', 'serve', '0', '0', 7.50, 4, 'nonstock', '0', 3, NULL, 10.00),
(172, 11, 'Buko Juice Dispossable Glass', 'pcs', '358', '43', 1.00, 3, 'instock', '100', 22, NULL, 0.00),
(173, 11, '16 Oz. Disposable Glass', 'pcs.', '124', '2', 6.00, 3, 'instock', '50', 22, NULL, 0.00),
(175, 11, 'French Fries Dispossable Glass Big', 'pcs.', '224', '2', 3.00, 3, 'instock', '50', 22, NULL, 0.00),
(177, 11, '12oz Dispossable Glass', 'pc', '461', '7', 4.00, 3, 'instock', '50', 3, NULL, 0.00),
(181, 7, 'Fresh Milk', 'pouch', '48', '0', 34.75, 4, 'instock', '10', 21, NULL, 40.00),
(183, 5, 'Sugar', 'gm', '250900', '268673', 0.04, 3, 'instock', '50000', 18, NULL, 0.00),
(185, 5, 'Cowbel Evaporated Milk Big', 'can', '410', '0', 18.96, 3, 'instock', '50', 19, NULL, 0.00),
(186, 5, 'Cowbel Condensed Milk', 'can', '204', '7', 28.87, 3, 'instock', '10', 18, NULL, 0.00),
(187, 5, 'Margarine 100 Gm.', 'cup', '1029', '0', 29.10, 3, 'instock', '50', 21, NULL, 0.00),
(188, 5, 'Margarine 250 Gm', 'cup', '277', '61', 65.25, 3, 'instock', '20', 21, NULL, 0.00),
(190, 5, 'Alpine Evaporated Milk Big', 'can', '638', '27', 53.27, 3, 'instock', '20', 21, NULL, 0.00),
(191, 5, 'Bearbrand Powdered Milk 150 Gms', 'pouch', '24', '7', 50.00, 3, 'instock', '3', 18, NULL, 0.00),
(192, 5, 'Cheese', 'bar', '465', '95', 45.50, 3, 'instock', '10', 21, NULL, 0.00),
(193, 5, 'Flour', 'gm', '311950', '119050', 0.04, 3, 'instock', '25000', 18, NULL, 0.00),
(194, 5, 'Calumet Baking Powder', 'gm', '18358', '8946', 0.15, 3, 'instock', '1000', 22, NULL, 0.00),
(195, 5, 'Dessicated Coconut', 'kl.', '15', '1', 250.00, 3, 'instock', '2', 26, NULL, 0.00),
(196, 5, 'Beryl Chocolate', 'kl', '21', '0', 295.00, 3, 'instock', '2', 26, NULL, 0.00),
(197, 5, 'Ube Paste', 'gm', '47570', '0', 0.12, 3, 'instock', '2500', 26, NULL, 0.00),
(198, 5, 'Butter', 'bar', '96', '4', 37.05, 3, 'instock', '1', 21, NULL, 0.00),
(199, 5, 'Grounded Peanuts', 'kl.', '4', '4', 195.00, 3, 'instock', '1', 26, NULL, 0.00),
(200, 5, 'Corn Oil', 'gm', '118315', '110500', 0.11, 3, 'instock', '15000', 25, NULL, 0.00),
(201, 5, 'Vanilla', 'gram', '8075', '6750', 0.03, 3, 'instock', '1000', 22, NULL, 0.00),
(202, 7, 'Cappucino', 'cup', '0', '0', 50.00, 4, 'nonstock', '0', 3, NULL, 85.00),
(203, 5, 'Tuba', 'ltr.', '24', '12', 75.00, 3, 'instock', '0', 3, NULL, 0.00),
(204, 12, 'Coffee Machine Cups', 'pc', '500', '100', 0.00, 4, 'instock', '100', 3, NULL, 0.00),
(205, 5, 'Eggs', 'pc', '1018', '377', 6.00, 3, 'instock', '60', 20, NULL, 0.00),
(206, 7, 'Milo', 'sachet', '3', '0', 7.00, 4, 'instock', '2', 3, NULL, 15.00),
(207, 11, 'Gasul 11kls.', 'kl', '11', '61', 810.00, 3, 'instock', '3', 3, NULL, 0.00),
(208, 5, 'Solane', 'cylinder', '1', '0', 790.00, 3, 'instock', '1', 3, NULL, 0.00),
(209, 5, 'Plastic Bowl 520cc W/ Lid', 'pc', '137', '3', 3.65, 3, 'instock', '10', 22, NULL, 0.00),
(210, 5, 'Iodized Salt', 'bottle', '3', '3', 24.25, 3, 'instock', '1', 3, NULL, 0.00),
(211, 5, 'Black Pepper', 'bottle', '3', '3', 72.05, 3, 'instock', '1', 3, NULL, 0.00),
(212, 8, 'Batchoy Special', 'cup', '0', '0', 35.00, 4, 'nonstock', '0', 3, NULL, 60.00),
(213, 8, 'Batchoy Regular', 'cup', '0', '0', 30.00, 4, 'nonstock', '0', 3, NULL, 50.00),
(214, 8, 'Bam-i', 'pack', '243', '0', 50.00, 4, 'instock', '2', 3, NULL, 75.00),
(215, 7, 'Classic Coffee', 'cup', '0', '0', 20.00, 4, 'nonstock', '0', 3, NULL, 30.00),
(216, 6, 'Potu Cheese', 'pack', '0', '0', 20.00, 4, 'nonstock', '0', 3, NULL, 30.00),
(217, 6, 'Puto Cheese', 'pack', '-35', '0', 20.00, 4, 'instock', '5', 3, NULL, 30.00),
(218, 7, 'Coke Bottle', 'bottle', '144', '144', 6.00, 4, 'instock', '20', 8, NULL, 10.00),
(219, 6, 'Puto Cheese Big', 'pc', '1350', '-2', 4.00, 4, 'instock', '10', 3, NULL, 6.00),
(220, 9, 'Mixed Fruits Shake', 'cup', '0', '0', 50.00, 4, 'nonstock', '0', 3, NULL, 75.00),
(221, 10, 'Bagoong Sweet And Spicy', 'bottle', '31', '5', 80.00, 4, 'instock', '5', 3, NULL, 120.00),
(222, 10, 'Bagoong Sweet Flavored', 'bottle', '13', '1', 80.00, 4, 'instock', '3', 3, NULL, 120.00),
(223, 10, 'Bagoong Hot Flavored', 'bottle', '7', '0', 80.00, 4, 'instock', '3', 3, NULL, 120.00),
(224, 10, 'Bagoong Extra Hot', 'bottle', '24', '2', 80.00, 4, 'instock', '3', 3, NULL, 120.00),
(225, 9, 'Polvoron Assorted', 'bx', '40', '0', 130.00, 4, 'instock', '5', 3, NULL, 180.00),
(226, 9, 'Durian Shake', 'cup', '0', '0', 40.00, 4, 'nonstock', '0', 3, NULL, 70.00),
(227, 9, 'Polvoron Premiun', 'bx', '21', '-1', 120.00, 4, 'instock', '2', 3, NULL, 180.00),
(228, 9, 'Ice Cream Scooping', 'scoop', '0', '0', 40.00, 4, 'nonstock', '0', 3, NULL, 55.00),
(229, 7, 'Ice Coffee', 'glass', '0', '0', 45.00, 4, 'nonstock', '0', 3, NULL, 70.00),
(230, 7, 'Matcha Tea', 'glass', '0', '0', 45.00, 4, 'nonstock', '0', 3, NULL, 70.00),
(231, 7, 'Taro Juice', 'glass', '0', '0', 65.00, 4, 'nonstock', '0', 3, NULL, 80.00),
(232, 7, 'Honey Dew', 'glass', '0', '0', 45.00, 4, 'nonstock', '0', 3, NULL, 70.00),
(234, 9, 'Peanut Butter', 'jar', '21', '0', 130.00, 4, 'instock', '2', 3, NULL, 160.00),
(235, 6, 'Bake Polvoron Big', 'pack', '27', '0', 30.00, 4, 'instock', '2', 3, NULL, 40.00),
(237, 9, 'Cheesecake New', 'pack', '512', '0', 30.00, 4, 'instock', '10', 3, NULL, 37.00),
(239, 8, 'Ngohiong', 'pc', '164', '0', 7.00, 4, 'instock', '0', 3, NULL, 12.00),
(240, 8, 'Ngohiong  With Rice', 'set', '0', '0', 31.00, 4, 'nonstock', '0', 3, NULL, 50.00);

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
(1, 6, '270', 'pcs', 'GOOD', '2020-01-11', '40511', NULL, 'received'),
(2, 7, '270', 'pcs', 'GOOD', '2020-01-11', '34356', NULL, 'received'),
(3, 8, '150', 'pcs', 'GOOD', '2020-01-11', '13269', NULL, 'received'),
(4, 9, '150', 'pcs', 'GOOD', '2020-01-11', '10678', NULL, 'received'),
(5, 10, '100', 'pack', 'GOOD', '2020-01-11', '11468', NULL, 'received'),
(6, 11, '100', 'pack', 'GOOD', '2020-01-11', '3709', NULL, 'received'),
(7, 13, '75', 'pack', 'GOOD', '2020-01-11', '1146', NULL, 'to_receive'),
(8, 17, '100', 'pack', 'GOOD', '2020-01-11', '2031', NULL, 'to_receive'),
(9, 20, '100', 'pack', 'GOOD', '2020-01-11', '529', NULL, 'to_receive'),
(10, 187, '200', 'cup', 'GOOD', '2020-01-14', '829', NULL, 'on_receive');

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
  MODIFY `assign_access_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `branch_stocks`
--
ALTER TABLE `branch_stocks`
  MODIFY `branch_stocksid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashier_logbook`
--
ALTER TABLE `cashier_logbook`
  MODIFY `logid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `daily_output`
--
ALTER TABLE `daily_output`
  MODIFY `dailyout_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `employee_log`
--
ALTER TABLE `employee_log`
  MODIFY `employee_log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_accounts`
--
ALTER TABLE `emp_accounts`
  MODIFY `emp_account_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  MODIFY `emp_attendance_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `emp_credits`
--
ALTER TABLE `emp_credits`
  MODIFY `emp_credit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `emp_overtime`
--
ALTER TABLE `emp_overtime`
  MODIFY `emp_overtime_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_salary`
--
ALTER TABLE `emp_salary`
  MODIFY `salary_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `expenses_misc`
--
ALTER TABLE `expenses_misc`
  MODIFY `misc_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses_prod`
--
ALTER TABLE `expenses_prod`
  MODIFY `prod_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses_stocks`
--
ALTER TABLE `expenses_stocks`
  MODIFY `expstocks_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `incomestatement`
--
ALTER TABLE `incomestatement`
  MODIFY `statement_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_position`
--
ALTER TABLE `job_position`
  MODIFY `job_position_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ordered_item`
--
ALTER TABLE `ordered_item`
  MODIFY `order_item_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `release_item_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `stock_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `stock_class`
--
ALTER TABLE `stock_class`
  MODIFY `stockclass_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock_newlog`
--
ALTER TABLE `stock_newlog`
  MODIFY `stock_newid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
