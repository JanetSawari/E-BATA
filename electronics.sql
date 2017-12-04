-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2014 at 02:42 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `electronics`
--
CREATE DATABASE IF NOT EXISTS `electronics` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `electronics`;

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `employeeNo` int(50) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `secondname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nationalIdNo` varchar(50) NOT NULL,
  `depertment` varchar(50) DEFAULT NULL,
  `dateregistered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `logged` varchar(5) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`employeeNo`),
  UNIQUE KEY `nationalIdNo` (`nationalIdNo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`employeeNo`, `firstname`, `secondname`, `lastname`, `username`, `pass`, `nationalIdNo`, `depertment`, `dateregistered`, `status`, `logged`) VALUES
(11, 'Admin', 'Admin', 'Admin', 'admin', 'admin', '12345678', 'general', '2012-10-30 15:14:54', 1, 'NO'),
(12, 'a', 'a', 'a', 'a', 'a', ' 1', 'general', '2014-03-29 04:41:29', 1, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `messageId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `dateandtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`messageId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`messageId`, `email`, `name`, `message`, `dateandtime`) VALUES
(1, 'danstanbob@gmail.com', 'Danstan', 'Hallo,wossup?', '2012-12-01 15:28:06'),
(2, 'qwewqewqe', 'wqedwqwq', 'qwdewqdewqdwqdq', '2012-12-08 09:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `iorders`
--

CREATE TABLE IF NOT EXISTS `iorders` (
  `order_no` bigint(20) NOT NULL AUTO_INCREMENT,
  `item_no` bigint(20) NOT NULL,
  `item_name` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `buyer_contacts` text NOT NULL,
  `completed` varchar(5) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`order_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `iorders`
--

INSERT INTO `iorders` (`order_no`, `item_no`, `item_name`, `quantity`, `price`, `buyer_contacts`, `completed`) VALUES
(1, 36, 'AppleMac book ', 1, 100000, 'dan obara<BR>ADDRESS: asdsadadasd<BR>PHONE: 2321321331<BR>EMAIL: ad@asdad1', 'NO'),
(2, 36, 'AppleMac book ', 1, 100000, 'dan obara<BR>ADDRESS: asdsadadasd<BR>PHONE: 2321321331<BR>EMAIL: ad@asdad1', 'YES'),
(3, 6, 'Nokia tyryrr', 3, 13698, 'dan obara<BR>ADDRESS: asdsadadasd<BR>PHONE: 2321321331<BR>EMAIL: ad@asdad1', 'NO'),
(4, 0, '', 0, 0, 'dan obara<BR>ADDRESS: asdsadadasd<BR>PHONE: 2321321331<BR>EMAIL: ad@asdad1', 'YES'),
(5, 0, '', 0, 0, 'dan obara<BR>ADDRESS: asdsadadasd<BR>PHONE: 2321321331<BR>EMAIL: ad@asdad1', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `itemnumber` int(255) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `image` text,
  `manufacturer` varchar(100) DEFAULT NULL,
  `model` varchar(200) DEFAULT NULL,
  `description` text,
  `price` int(255) DEFAULT NULL,
  `postingtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hits` bigint(20) NOT NULL DEFAULT '0',
  UNIQUE KEY `itemnumber` (`itemnumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemnumber`, `category`, `image`, `manufacturer`, `model`, `description`, `price`, `postingtime`, `hits`) VALUES
(14, 'phones', '1.jpeg', 'Iphone', '5', 'very cool\r\nThe best smart phone\r\n4 G internet', 20000, '2014-03-29 02:37:20', 3),
(2, 'accessories', '4.jpeg', 'Motorola', 'USB CABLE', 'nice', 100, '2014-03-29 09:50:50', 3),
(3, 'phones', '3.jpeg', 'Tecno', 'T60', 'good', 3000, '2014-03-30 02:36:01', 5),
(6, 'phones', '5.jpeg', 'Nokia', ' tyryrr', 'great', 4566, '2014-03-29 12:58:32', 3),
(7, 'phones', '6.jpeg', 'Nokia', ' rt5667', 'poa', 4567, '2014-03-29 00:04:03', 2),
(10, 'accessories', '7.jpeg', 'Ideos', 'protection case', 'perfect', 200, '2014-03-29 00:04:03', 2),
(11, 'accessories', '8.jpeg', 'Alcatel', 'protection case', 'Clear sound', 200, '2014-03-29 00:04:03', 2),
(12, 'phones', '9.jpeg', 'Blackberry', ' storm', 'cool', 35000, '2014-03-29 10:21:27', 7),
(15, 'phones', '10.jpeg', 'Iphone', '5', 'very cool\r\nThe best smart phone\r\n4 G internet', 20000, '2014-03-29 00:45:28', 5),
(16, 'phones', '3.jpeg', 'MDA', ' 34567', 'will this text be well formatted?\r\nLet me wait to find out.\r\nyes\r\nno\r\n?\r\n', 50000, '2014-03-29 00:04:03', 2),
(18, 'accessories', '7.jpeg', 'MDA', 'protection case', 'touch screen\r\nthe best price you can get', 1000, '2014-03-29 00:04:03', 2),
(19, 'accessories', '2.jpeg', 'MDA', 'touch screen', 'touch screen\r\nthe best price you can get', 1000, '2014-03-29 00:04:03', 2),
(20, 'accessories', '8.jpeg', 'MDA', 'carry case', 'touch screen\r\nthe best price you can get', 1000, '2014-03-29 00:04:03', 2),
(38, 'home', '1396088097doc.jpg', 'Bose', 'I phone doc', 'Amazing sound', 10000, '2014-03-29 10:16:52', 4),
(37, 'home', '1396087880lcd.jpg', 'Samsung', ' lcd', 'Nice flap panel tv', 60000, '2014-03-30 02:35:25', 1),
(35, 'office', '1396087032101.JPG', 'Accer', 'Aspire', 'Nice notebook', 4000, '2014-03-29 09:57:12', 0),
(36, 'office', '1396087425mac.jpg', 'Apple', 'Mac book ', 'fine mac book', 100000, '2014-03-29 12:57:32', 4);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `messageid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `mheading` text NOT NULL,
  `mbody` text NOT NULL,
  `mread` varchar(10) NOT NULL DEFAULT 'NO',
  `senton` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`messageid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageid`, `email`, `fname`, `lastname`, `phone`, `department`, `mheading`, `mbody`, `mread`, `senton`) VALUES
(1, 'danstanbob@gmail.com', 'Danstan', 'Obara', '0724817546', NULL, 'good job', 'keep up the good work', 'NO', '0000-00-00 00:00:00'),
(2, 'danstanbob@gmail.com', 'Danstan', 'Obara', '0724817546', NULL, 'good job', 'keep up the good work', 'NO', '0000-00-00 00:00:00'),
(3, 'danstanbob@gmail.com', 'Danstan', 'Obara', '0724817546', NULL, 'good job', 'keep up the good work', 'NO', '2012-05-15 21:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `new`
--

CREATE TABLE IF NOT EXISTS `new` (
  `itemnumber` bigint(20) DEFAULT NULL,
  `onoroff` int(11) DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `new`
--

INSERT INTO `new` (`itemnumber`, `onoroff`) VALUES
(2, 1),
(1, 1),
(12, 1),
(5, 1),
(4, 1),
(3, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
