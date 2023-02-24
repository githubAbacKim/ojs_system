-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 08, 2019 at 10:21 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `possys_db`
--
CREATE DATABASE IF NOT EXISTS `possys_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `possys_db`;

-- --------------------------------------------------------

--
-- Table structure for table `assign_access`
--

CREATE TABLE IF NOT EXISTS `assign_access` (
  `assign_access_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_type` varchar(45) NOT NULL COMMENT 'Admin or Frontdesk',
  `mac_address` varchar(85) NOT NULL,
  PRIMARY KEY (`assign_access_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `assign_access`
--

INSERT INTO `assign_access` (`assign_access_id`, `account_type`, `mac_address`) VALUES
(7, 'frontdesk', '38-2C-4A-E8-84-88'),
(8, 'frontdesk', '1C-87-2C-72-D4-54'),
(9, 'admin', '1C-87-2C-72-D4-54'),
(10, 'frontdesk', 'D0-17-C2-1B-EF-E9'),
(11, 'admin', 'D0-17-C2-1B-EF-E9');

-- --------------------------------------------------------

--
-- Table structure for table `cashier_logbook`
--

CREATE TABLE IF NOT EXISTS `cashier_logbook` (
  `logid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) unsigned NOT NULL,
  `log_date` char(10) NOT NULL,
  `log_time` char(8) NOT NULL,
  `op_money` double(10,2) NOT NULL,
  `clo_money` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cashier_logbook`
--

INSERT INTO `cashier_logbook` (`logid`, `emp_id`, `log_date`, `log_time`, `op_money`, `clo_money`) VALUES
(1, 4, '2019-03-22', '07:13 AM', 7000.00, NULL),
(2, 4, '2019-03-23', '04:02 AM', 7000.00, NULL),
(3, 4, '2019-03-24', '04:06 AM', 7000.00, NULL),
(4, 4, '2019-03-27', '02:48 PM', 7000.00, NULL),
(5, 4, '2019-04-06', '02:08 AM', 7000.00, NULL),
(6, 4, '2019-04-07', '02:59 AM', 7000.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_code` char(20) DEFAULT NULL,
  `emp_lname` varchar(45) DEFAULT NULL,
  `emp_mname` varchar(45) DEFAULT NULL,
  `emp_fname` varchar(45) DEFAULT NULL,
  `emp_bday` char(15) NOT NULL,
  `emp_contact` char(11) NOT NULL,
  `emp_address` varchar(85) DEFAULT NULL,
  `emp_email` varchar(45) NOT NULL,
  `job_position_id` int(10) unsigned NOT NULL,
  `emp_status` varchar(45) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_code`, `emp_lname`, `emp_mname`, `emp_fname`, `emp_bday`, `emp_contact`, `emp_address`, `emp_email`, `job_position_id`, `emp_status`) VALUES
(4, '1506904', 'Abac', 'Villahermosa', 'Kim', '1990-06-21', '09434469561', 'Argao, Cebu', 'abackim1990@yahoo.com', 4, 'active'),
(7, '1805856', 'Veloso', 'Mamalias', 'Joseph', '1985-05-20', '09239087110', 'Talaytay, Argao, Cebu', 'j0seph_2k8@yahoo.com', 2, 'active'),
(8, '1805956', 'Daragosa', 'Cap', 'Lyle', '1995-05-02', 'none', 'Argao, Cebu, Philippines', 'lyle@gmail.com', 5, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `employee_log`
--

CREATE TABLE IF NOT EXISTS `employee_log` (
  `employee_log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) unsigned NOT NULL,
  `date` char(15) NOT NULL,
  PRIMARY KEY (`employee_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_accounts`
--

CREATE TABLE IF NOT EXISTS `emp_accounts` (
  `emp_account_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) unsigned NOT NULL,
  `emp_username` varchar(55) NOT NULL,
  `emp_password` varchar(85) NOT NULL,
  `emp_dept` varchar(85) NOT NULL,
  PRIMARY KEY (`emp_account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `emp_accounts`
--

INSERT INTO `emp_accounts` (`emp_account_id`, `emp_id`, `emp_username`, `emp_password`, `emp_dept`) VALUES
(1, 1, 'aiza_receptionist', '0920e216162a2da98881caa8abc4192abf501ea6', ''),
(2, 2, 'clara_receptionist', 'a991f77280a9f0b577d8f90d9bf2fca9320ece23', ''),
(3, 3, 'faith_receptionest', '08df9c147558947c6bddee4ce85b0193caf1eec3', ''),
(4, 4, 'programmer_account', '01992dd2dfad9dbabb6710e1bd6ffa85faca1276', 'cashier'),
(5, 5, 'robgloria', '4e89701f7bce01e90b21f3a34b436b52eeb6fead', ''),
(7, 6, 'cindy_receptionist', 'd16e15156c37854e7fc9c7bdef47061d8b39c3f5', ''),
(8, 7, 'joseph_veloso', 'c8ec1cfebb00d857b54daf2b805ecf1755629082', 'production');

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE IF NOT EXISTS `emp_attendance` (
  `emp_attendance_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) unsigned NOT NULL,
  `time_in` char(10) NOT NULL,
  `time_out` char(10) DEFAULT NULL,
  `punch_by` int(10) unsigned NOT NULL,
  `attend_date` char(11) NOT NULL,
  PRIMARY KEY (`emp_attendance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_credits`
--

CREATE TABLE IF NOT EXISTS `emp_credits` (
  `emp_credit_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `credit_item_name` varchar(45) NOT NULL,
  `credit_item_amount` double(10,2) NOT NULL,
  `credit_item_qty` char(3) NOT NULL,
  `emp_id` int(10) unsigned NOT NULL,
  `credit_date` char(10) NOT NULL,
  `credit_status` varchar(45) DEFAULT 'not_paid',
  PRIMARY KEY (`emp_credit_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_overtime`
--

CREATE TABLE IF NOT EXISTS `emp_overtime` (
  `emp_overtime_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) unsigned NOT NULL,
  `date` char(15) NOT NULL,
  `num_hours` char(3) DEFAULT NULL,
  `from` char(20) NOT NULL,
  `to` char(20) DEFAULT NULL,
  `ot_type_id` int(10) unsigned NOT NULL,
  `punch_by` int(10) unsigned NOT NULL,
  PRIMARY KEY (`emp_overtime_id`),
  KEY `FK_emp_overtime_1` (`ot_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emp_salary`
--

CREATE TABLE IF NOT EXISTS `emp_salary` (
  `salary_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) unsigned NOT NULL,
  `salary_amount` double(10,2) NOT NULL,
  `salary_date_start` char(22) NOT NULL,
  `salary_date_end` char(22) NOT NULL,
  `credit_amount` double(10,2) NOT NULL,
  `overtime_thours` char(3) NOT NULL,
  `overtime_tamount` double(10,2) NOT NULL,
  `num_days` char(3) NOT NULL,
  PRIMARY KEY (`salary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_equip`
--

CREATE TABLE IF NOT EXISTS `expenses_equip` (
  `expequip_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `expequip_desc` varchar(100) NOT NULL,
  `expequip_qty` char(5) NOT NULL,
  `expequip_unit` varchar(85) NOT NULL,
  `expequip_price` double(10,2) NOT NULL,
  `expequip_note` text NOT NULL,
  `expequip_date` char(11) NOT NULL,
  `expequip_mon` char(2) NOT NULL,
  PRIMARY KEY (`expequip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_misc`
--

CREATE TABLE IF NOT EXISTS `expenses_misc` (
  `misc_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `misc_desc` varchar(100) NOT NULL,
  `misc_qty` char(10) NOT NULL,
  `misc_unit` varchar(85) NOT NULL,
  `misc_price` double(10,2) NOT NULL,
  `misc_note` text NOT NULL,
  `misc_date` char(11) NOT NULL,
  `misc_mon` char(2) NOT NULL,
  PRIMARY KEY (`misc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_prod`
--

CREATE TABLE IF NOT EXISTS `expenses_prod` (
  `prod_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `prod_desc` varchar(100) NOT NULL,
  `prod_qty` char(5) NOT NULL,
  `prod_unit` varchar(85) NOT NULL,
  `prod_price` double(10,2) NOT NULL,
  `prod_note` text NOT NULL,
  `prod_date` char(11) NOT NULL,
  `prod_mon` char(2) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_returns`
--

CREATE TABLE IF NOT EXISTS `expenses_returns` (
  `returns_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `returns_desc` varchar(100) NOT NULL,
  `returns_qty` char(5) NOT NULL,
  `returns_unit` varchar(85) NOT NULL,
  `returns_price` double(10,2) NOT NULL,
  `returns_note` text NOT NULL,
  `returns_date` char(11) NOT NULL,
  `returns_mon` char(2) NOT NULL,
  `return_type` varchar(85) DEFAULT NULL,
  PRIMARY KEY (`returns_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expenses_stocks`
--

CREATE TABLE IF NOT EXISTS `expenses_stocks` (
  `expstocks_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `expstocks_desc` varchar(100) NOT NULL,
  `expstocks_qty` char(5) NOT NULL,
  `expstocks_unit` varchar(85) NOT NULL,
  `expstocks_price` double(10,2) NOT NULL,
  `expstocks_note` text NOT NULL,
  `expstocks_date` char(11) NOT NULL,
  `expstocks_mon` char(2) NOT NULL,
  PRIMARY KEY (`expstocks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `incomestatement`
--

CREATE TABLE IF NOT EXISTS `incomestatement` (
  `statement_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `total_sales` double(10,2) NOT NULL,
  `total_taxexp` double(10,2) NOT NULL,
  `total_miscexp` double(10,2) NOT NULL,
  `total_prodexp` double(10,2) NOT NULL,
  `total_stocksexp` double(10,2) NOT NULL,
  `total_salexp` double(10,2) NOT NULL,
  `statement_date` char(11) NOT NULL,
  `net_profit` double(10,2) NOT NULL,
  `shop_share` double(10,2) NOT NULL,
  `kim_share` double(10,2) NOT NULL,
  `bank_balance` double(20,2) NOT NULL,
  `deposit_amount` double(20,2) NOT NULL,
  `total_arefund` double(10,2) NOT NULL,
  `total_orefund` double(10,2) NOT NULL,
  `total_equipexp` double(10,2) NOT NULL,
  PRIMARY KEY (`statement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_position`
--

CREATE TABLE IF NOT EXISTS `job_position` (
  `job_position_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `job_position_name` varchar(45) NOT NULL,
  `salary_rate` double(10,2) NOT NULL,
  `salary_term_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`job_position_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `job_position`
--

INSERT INTO `job_position` (`job_position_id`, `job_position_name`, `salary_rate`, `salary_term_id`) VALUES
(2, 'Shop Personnel', 350.00, 1),
(4, 'Owner', 0.00, 1),
(5, 'Printing Assistant', 250.00, 1),
(6, 'Test', 100.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_code` char(20) NOT NULL,
  `cust_name` varchar(80) DEFAULT NULL,
  `order_date` char(20) NOT NULL,
  `emp_id` int(10) unsigned NOT NULL,
  `order_bill_amount` double(10,2) DEFAULT '0.00',
  `order_cash_amount` double(10,2) DEFAULT '0.00',
  `order_type` varchar(20) NOT NULL,
  `order_status` char(10) DEFAULT 'not_paid',
  `order_discount` double(10,2) DEFAULT '0.00',
  `check_in_id` int(10) unsigned DEFAULT NULL,
  `sub_order_type` varchar(20) DEFAULT NULL,
  `order_downpayment` double(10,2) DEFAULT '0.00',
  `tax_rate` double(10,2) DEFAULT '0.00',
  `tax_amount` double(10,2) DEFAULT '0.00',
  `pickup_date` char(16) DEFAULT NULL,
  `or_num` char(5) DEFAULT NULL,
  `pickup_time` char(8) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `FK_restaurant_order_1` (`cust_name`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_code`, `cust_name`, `order_date`, `emp_id`, `order_bill_amount`, `order_cash_amount`, `order_type`, `order_status`, `order_discount`, `check_in_id`, `sub_order_type`, `order_downpayment`, `tax_rate`, `tax_amount`, `pickup_date`, `or_num`, `pickup_time`) VALUES
(1, 'OC0328-1', 'CASH', '2019-03-28 06:24 AM', 4, 1000.00, 1000.00, 'purchace', 'paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, '000', NULL),
(2, 'OC0329-2', 'CASH', '2019-03-29 08:18 AM', 4, 0.00, 0.00, 'purchace', 'not_paid', 0.00, NULL, NULL, 0.00, 0.00, 0.00, NULL, '000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_item`
--

CREATE TABLE IF NOT EXISTS `ordered_item` (
  `order_item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `order_price` double(10,2) NOT NULL,
  `order_qty` char(4) NOT NULL,
  `order_date` char(22) NOT NULL,
  `order_stock_type` char(25) NOT NULL,
  `stock_id` int(10) unsigned NOT NULL,
  `order_unit` varchar(45) NOT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `FK_restaurant_ordered_item_1` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ordered_item`
--

INSERT INTO `ordered_item` (`order_item_id`, `order_id`, `order_name`, `order_price`, `order_qty`, `order_date`, `order_stock_type`, `stock_id`, `order_unit`) VALUES
(2, 1, 'CAR PLATE', 1000.00, '1', '2019-03-28', 'instock', 1, 'set');

-- --------------------------------------------------------

--
-- Table structure for table `overtime_type`
--

CREATE TABLE IF NOT EXISTS `overtime_type` (
  `ot_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ot_type_name` varchar(45) NOT NULL,
  `ot_type_term` varchar(45) NOT NULL,
  `ot_rate` double(10,2) NOT NULL,
  PRIMARY KEY (`ot_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `overtime_type`
--

INSERT INTO `overtime_type` (`ot_type_id`, `ot_type_name`, `ot_type_term`, `ot_rate`) VALUES
(1, 'Regular Overtime', 'night', 250.00),
(2, 'Screen Set-Up Overtime', 'Daily', 250.00),
(3, 'Attendant Duty', 'Daily', 150.00),
(4, 'Printing Assist', 'daily', 150.00);

-- --------------------------------------------------------

--
-- Table structure for table `property_info`
--

CREATE TABLE IF NOT EXISTS `property_info` (
  `property_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`property_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `property_info`
--

INSERT INTO `property_info` (`property_id`, `property_name`, `street_name`, `municipality`, `state`, `country`, `zipcode`, `phone`, `fax`, `mobile`, `email`, `logo_name`, `logo_location`, `admin_username`, `admin_password`) VALUES
(1, 'Five-N Printing Services', 'T.S Kintanar Street, Canbanua', 'Argao', 'Cebu', 'Philippines', '6021', '3677211', 'none', '09770818583', 'abackim9087@gmail.com', 'logo.png', 'img/', 'admin_5nprinting', '950b8a15c8452a88f52b9398fb0cd8c5a81fd6fa');

-- --------------------------------------------------------

--
-- Table structure for table `rate_types`
--

CREATE TABLE IF NOT EXISTS `rate_types` (
  `rate_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rate_name` varchar(45) NOT NULL,
  `rate_type` varchar(45) NOT NULL,
  `rate_type_num` char(2) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`rate_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rate_types`
--

INSERT INTO `rate_types` (`rate_type_id`, `rate_name`, `rate_type`, `rate_type_num`, `description`) VALUES
(1, 'Daily', 'Day', '1', 'Regular daily rate.');

-- --------------------------------------------------------

--
-- Table structure for table `releasecart`
--

CREATE TABLE IF NOT EXISTS `releasecart` (
  `releaseCart_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `channel_id` int(20) unsigned NOT NULL,
  `release_date` char(10) NOT NULL,
  `release_code` char(10) NOT NULL,
  `releasing_status` varchar(45) NOT NULL DEFAULT 'releasing',
  `order_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`releaseCart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `releaseditem`
--

CREATE TABLE IF NOT EXISTS `releaseditem` (
  `release_item_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `releaseCart_id` int(20) unsigned NOT NULL,
  `releaseitem_name` varchar(85) NOT NULL,
  `releaseitem_unit` varchar(45) NOT NULL,
  `releaseitem_qty` char(6) NOT NULL,
  `releaseitem_cost` double(10,2) NOT NULL,
  `stockCat_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`release_item_id`),
  KEY `FK_releaseditem_1` (`releaseCart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salary_term`
--

CREATE TABLE IF NOT EXISTS `salary_term` (
  `salary_term_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `salary_term_name` varchar(45) NOT NULL,
  `salary_term_description` text NOT NULL,
  PRIMARY KEY (`salary_term_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `salary_term`
--

INSERT INTO `salary_term` (`salary_term_id`, `salary_term_name`, `salary_term_description`) VALUES
(1, 'Daily', 'Daily basis.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `stockarrival_log`
--

CREATE TABLE IF NOT EXISTS `stockarrival_log` (
  `idarrival_log` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stock_id` int(10) unsigned NOT NULL,
  `stock_qqty` char(3) NOT NULL,
  `stock_unit` varchar(45) NOT NULL,
  `stock_rate` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`idarrival_log`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stockcategory`
--

CREATE TABLE IF NOT EXISTS `stockcategory` (
  `stockCat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stockCat_name` varchar(100) NOT NULL,
  PRIMARY KEY (`stockCat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stockcategory`
--

INSERT INTO `stockcategory` (`stockCat_id`, `stockCat_name`) VALUES
(1, 'Vehicle Plates'),
(2, 'Vinyl Stickers'),
(3, 'T-shirt Printing'),
(4, 'Siser Materials');

-- --------------------------------------------------------

--
-- Table structure for table `stockitem`
--

CREATE TABLE IF NOT EXISTS `stockitem` (
  `stock_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stockCat_id` int(10) unsigned NOT NULL,
  `stock_name` varchar(100) NOT NULL,
  `stock_unit` varchar(85) NOT NULL,
  `stock_qqty` char(6) NOT NULL,
  `stockDispose` char(6) NOT NULL DEFAULT '0',
  `stockCost` double(10,2) NOT NULL,
  `stockclass_id` int(10) unsigned NOT NULL,
  `stock_type` varchar(55) NOT NULL,
  PRIMARY KEY (`stock_id`),
  KEY `FK_stockitem_1` (`stockCat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stockitem`
--

INSERT INTO `stockitem` (`stock_id`, `stockCat_id`, `stock_name`, `stock_unit`, `stock_qqty`, `stockDispose`, `stockCost`, `stockclass_id`, `stock_type`) VALUES
(1, 1, 'CAR PLATE', 'set', '0', '0', 1000.00, 4, 'instock'),
(2, 1, 'MOTOR PLATE', 'pc', '10', '0', 300.00, 4, 'instock');

-- --------------------------------------------------------

--
-- Table structure for table `stock_class`
--

CREATE TABLE IF NOT EXISTS `stock_class` (
  `stockclass_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stockclass_name` varchar(45) NOT NULL,
  PRIMARY KEY (`stockclass_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `stock_class`
--

INSERT INTO `stock_class` (`stockclass_id`, `stockclass_name`) VALUES
(3, 'RAW'),
(4, 'FINISHED'),
(5, 'CONSUMABLE');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
