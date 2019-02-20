-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 18, 2019 at 03:29 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ajax_posdb`
--
CREATE DATABASE IF NOT EXISTS `ajax_posdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ajax_posdb`;

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
  PRIMARY KEY (`emp_account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;


-- --------------------------------------------------------

--
-- Table structure for table `emp_shift`
--

CREATE TABLE IF NOT EXISTS `emp_shift` (
  `emp_shift_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emp_id` int(10) unsigned NOT NULL,
  `start_time` char(8) NOT NULL,
  `end_time` char(8) NOT NULL,
  PRIMARY KEY (`emp_shift_id`),
  KEY `FK_emp_shift_1` (`emp_id`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Table structure for table `hotelitems`
--

CREATE TABLE IF NOT EXISTS `hotelitems` (
  `hotelitem_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stockCat_id` int(10) unsigned NOT NULL,
  `hotelitem_name` varchar(85) NOT NULL,
  `hotelitem_unit` varchar(45) NOT NULL,
  `hotelitem_stock` char(5) NOT NULL DEFAULT '0',
  `hotelitem_used` char(5) NOT NULL DEFAULT '0',
  `hotelitem_cost` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`hotelitem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;


-- --------------------------------------------------------

--
-- Table structure for table `kitchenitems`
--

CREATE TABLE IF NOT EXISTS `kitchenitems` (
  `kitchenitem_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stockCat_id` int(10) unsigned NOT NULL,
  `kitchenitem_name` varchar(85) NOT NULL,
  `kitchenitem_unit` varchar(45) NOT NULL,
  `kitchenitem_stock` char(6) NOT NULL,
  `kitchenitem_dispose` char(6) NOT NULL DEFAULT '0',
  `kitchenitem_lastitem` char(6) NOT NULL DEFAULT '0',
  `kitchenitem_cost` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`kitchenitem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE IF NOT EXISTS `menu_item` (
  `menu_item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `stock` char(6) DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `stock_type` char(25) NOT NULL DEFAULT '0',
  `item_desc` text,
  `stock_dispose` char(6) DEFAULT '0',
  `restock_date` char(12) DEFAULT NULL,
  PRIMARY KEY (`menu_item_id`),
  KEY `FK_menu_item_1` (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;


-- --------------------------------------------------------

--
-- Table structure for table `officeitems`
--

CREATE TABLE IF NOT EXISTS `officeitems` (
  `office_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stockCat_id` varchar(45) NOT NULL,
  `offitem_name` varchar(85) NOT NULL,
  `offitem_unit` varchar(45) NOT NULL,
  `offitem_stock` char(6) NOT NULL,
  `offitem_dispose` char(6) NOT NULL,
  `offitem_cost` double(10,2) NOT NULL,
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`order_id`),
  KEY `FK_restaurant_order_1` (`cust_name`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=249 ;

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
  `menu_item_id` int(10) unsigned NOT NULL,
  `order_unit` varchar(45) NOT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `FK_restaurant_ordered_item_1` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=439 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `prodexplist`
--

CREATE TABLE IF NOT EXISTS `prodexplist` (
  `expguide_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `expguide_desc` varchar(100) NOT NULL,
  `expguide_cost` double(10,2) NOT NULL,
  `expguide_note` text NOT NULL,
  `stockCat_id` int(10) unsigned NOT NULL,
  `expguide_unit` varchar(55) NOT NULL,
  PRIMARY KEY (`expguide_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `productionitems`
--

CREATE TABLE IF NOT EXISTS `productionitems` (
  `production_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stockCat_id` int(10) unsigned NOT NULL,
  `proditem_name` varchar(85) NOT NULL,
  `proditem_unit` varchar(45) NOT NULL,
  `proditem_stock` char(6) NOT NULL,
  `proditem_dispose` char(6) NOT NULL,
  `proditem_cost` double(10,2) NOT NULL,
  PRIMARY KEY (`production_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=142 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=405 ;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_section`
--

CREATE TABLE IF NOT EXISTS `restaurant_section` (
  `section_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section_name` varchar(45) NOT NULL,
  `section_desc` text NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


-- --------------------------------------------------------

--
-- Table structure for table `restaurant_table`
--

CREATE TABLE IF NOT EXISTS `restaurant_table` (
  `table_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_number` char(10) NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `table_status` char(9) NOT NULL DEFAULT 'available',
  PRIMARY KEY (`table_id`),
  KEY `FK_restaurant_table_1` (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


-- --------------------------------------------------------

--
-- Table structure for table `restockcart`
--

CREATE TABLE IF NOT EXISTS `restockcart` (
  `restock_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `channel_id` int(10) unsigned NOT NULL,
  `restock_date` char(11) NOT NULL,
  `restock_code` char(20) NOT NULL,
  `restock_status` char(10) NOT NULL DEFAULT 'restocking',
  PRIMARY KEY (`restock_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- Table structure for table `restock_items`
--

CREATE TABLE IF NOT EXISTS `restock_items` (
  `restockitem_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stockCat_id` int(10) unsigned NOT NULL,
  `restockitem_name` varchar(100) NOT NULL,
  `restock_qqty` char(6) NOT NULL,
  `restock_cost` double(10,2) NOT NULL,
  `restock_id` int(10) unsigned NOT NULL,
  `origin_id` int(10) unsigned NOT NULL,
  `left_stock` char(6) NOT NULL,
  `restock_unit` varchar(45) NOT NULL,
  PRIMARY KEY (`restockitem_id`) USING BTREE,
  KEY `FK_stocklog_items_1` (`restock_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

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


-- --------------------------------------------------------

--
-- Table structure for table `stockcategory`
--

CREATE TABLE IF NOT EXISTS `stockcategory` (
  `stockCat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stockCat_name` varchar(100) NOT NULL,
  PRIMARY KEY (`stockCat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `stockchannel`
--

CREATE TABLE IF NOT EXISTS `stockchannel` (
  `channel_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `channel_name` varchar(100) NOT NULL,
  PRIMARY KEY (`channel_id`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
  `lastStock` char(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`stock_id`),
  KEY `FK_stockitem_1` (`stockCat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=305 ;

-- --------------------------------------------------------

--
-- Table structure for table `store_menu`
--

CREATE TABLE IF NOT EXISTS `store_menu` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(45) NOT NULL,
  `menu_desc` text NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `table_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(45) NOT NULL,
  `description` varchar(55) NOT NULL,
  PRIMARY KEY (`table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
