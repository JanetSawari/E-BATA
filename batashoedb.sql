-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2014 at 09:16 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `batashoedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `5a88d5c5ed0e43cbd860f2fafff6074d`
--

CREATE TABLE IF NOT EXISTS `5a88d5c5ed0e43cbd860f2fafff6074d` (
  `itemnumber` bigint(20) NOT NULL,
  `itemname` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `5a88d5c5ed0e43cbd860f2fafff6074d`
--

INSERT INTO `5a88d5c5ed0e43cbd860f2fafff6074d` (`itemnumber`, `itemname`, `quantity`, `cost`, `createtime`) VALUES
(15, 'SANDALS ', 15, 11985, '2014-10-21 07:01:54'),
(0, NULL, NULL, NULL, '2014-10-21 07:05:07'),
(0, NULL, NULL, NULL, '2014-10-21 07:05:12'),
(0, NULL, NULL, NULL, '2014-10-21 07:05:17'),
(0, NULL, NULL, NULL, '2014-10-21 07:05:20'),
(0, NULL, NULL, NULL, '2014-10-21 07:05:25'),
(0, NULL, NULL, NULL, '2014-10-21 07:10:50'),
(0, NULL, NULL, NULL, '2014-10-21 07:11:06'),
(0, NULL, NULL, NULL, '2014-10-21 07:11:26'),
(0, NULL, NULL, NULL, '2014-10-21 07:14:31'),
(0, NULL, NULL, NULL, '2014-10-21 07:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `7a886cd0edde1ec6b67fe4cb54c693a2`
--

CREATE TABLE IF NOT EXISTS `7a886cd0edde1ec6b67fe4cb54c693a2` (
  `itemnumber` bigint(20) NOT NULL,
  `itemname` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `7a886cd0edde1ec6b67fe4cb54c693a2`
--

INSERT INTO `7a886cd0edde1ec6b67fe4cb54c693a2` (`itemnumber`, `itemname`, `quantity`, `cost`, `createtime`) VALUES
(0, NULL, NULL, NULL, '2014-10-21 06:28:55');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`employeeNo`, `firstname`, `secondname`, `lastname`, `username`, `pass`, `nationalIdNo`, `depertment`, `dateregistered`, `status`, `logged`) VALUES
(11, 'Admin', 'Admin', 'Admin', 'admin', 'admin', '12345678', 'general', '2012-10-30 15:14:54', 1, 'NO'),
(12, 'a', 'a', 'a', 'a', 'a', ' 1', 'general', '2014-03-29 04:41:29', 1, 'YES'),
(13, 'Mutiso', 'Jacinta', 'Kavindu', 'jacinta', 'jacinta', ' 12345678', '', '2014-08-21 19:15:29', 1, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `b2eba9ce9b08f098471dc806cb22abdb`
--

CREATE TABLE IF NOT EXISTS `b2eba9ce9b08f098471dc806cb22abdb` (
  `itemnumber` bigint(20) NOT NULL,
  `itemname` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `b2eba9ce9b08f098471dc806cb22abdb`
--

INSERT INTO `b2eba9ce9b08f098471dc806cb22abdb` (`itemnumber`, `itemname`, `quantity`, `cost`, `createtime`) VALUES
(15, 'SANDALS ', 6, 4794, '2014-10-21 06:28:08'),
(0, NULL, NULL, NULL, '2014-10-21 06:28:13'),
(0, NULL, NULL, NULL, '2014-10-21 06:28:21');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`messageId`, `email`, `name`, `message`, `dateandtime`) VALUES
(1, 'DAINA@GMAIL.COM', 'DAINA', 'JKAJA', '2014-08-21 19:10:47');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `iorders`
--

INSERT INTO `iorders` (`order_no`, `item_no`, `item_name`, `quantity`, `price`, `buyer_contacts`, `completed`) VALUES
(1, 15, 'SANDALS ', 6, 4794, ' <BR>ADDRESS: <BR>PHONE: <BR>EMAIL: ', 'NO'),
(2, 0, '', 0, 0, ' <BR>ADDRESS: <BR>PHONE: <BR>EMAIL: ', 'NO'),
(3, 0, '', 0, 0, ' <BR>ADDRESS: <BR>PHONE: <BR>EMAIL: ', 'NO');

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
  `total` int(11) DEFAULT '20',
  `description` text,
  `price` int(255) DEFAULT NULL,
  `postingtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hits` bigint(20) NOT NULL DEFAULT '0',
  UNIQUE KEY `itemnumber` (`itemnumber`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemnumber`, `category`, `image`, `manufacturer`, `model`, `total`, `description`, `price`, `postingtime`, `hits`) VALUES
(1, 'men', '1408604059801-7026-a-165.jpg', ' BOOTS', ' BOOTS', 20, '', 1000, '2014-08-21 06:54:19', 0),
(2, 'men', '1408604082803-4003-a-165.jpg', ' BOOTS', ' BOOTS', 20, '', 1200, '2014-08-21 06:54:42', 0),
(3, 'men', '1408604092803-4103-a-165.jpg', ' BOOTS', ' BOOTS', 20, '', 1200, '2014-08-21 06:54:52', 0),
(4, 'men', '1408604103803-6003-a-165.jpg', ' BOOTS', ' BOOTS', 20, '', 1400, '2014-08-21 06:55:03', 0),
(5, 'men', '1408604111804-4078-a-165.jpg', ' BOOTS', ' BOOTS', 20, '', 1400, '2014-08-21 06:55:11', 0),
(6, 'men', '1408604148804-6077-a-165.jpg', ' BOOTS', ' BOOTS', 20, '', 1500, '2014-08-21 06:55:48', 0),
(7, 'men', '1408604162821-2266-a-165.jpg', ' BOOTS', ' BOOTS', 20, '', 2500, '2014-08-21 06:56:02', 0),
(8, 'men', '1408604174821-4090-a-165.jpg', ' BOOTS', ' BOOTS', 20, '', 2600, '2014-08-21 06:56:14', 0),
(9, 'men', '1408604186821-4466-a-165.jpg', ' BOOTS', ' BOOTS', 20, '', 5600, '2014-08-21 06:56:26', 0),
(10, 'men', '1408604195854-6007-a-165.jpg', ' BOOTS', ' BOOTS', 20, '', 5600, '2014-08-21 06:56:35', 0),
(11, 'men', '1408604207839-6061-a-165.jpg', ' BOOTS', ' BOOTS', 20, '', 3600, '2014-08-21 06:56:47', 0),
(12, 'men', '1408604220859-7010-a-165.jpg', ' BOOTS', ' BOOTS', 20, '', 3200, '2014-08-21 06:57:00', 0),
(13, 'men', '1408604237839-6061-a-165.jpg', ' BOOTS', ' BOOTS', 20, '', 3000, '2014-08-21 06:57:17', 0),
(14, 'men', '1408604251839-6060-a-165.jpg', ' BOOTS', ' BOOTS', 20, '', 3000, '2014-08-21 06:57:31', 0),
(15, 'ladies', '1408604390561-1071-a-165.jpg', 'SANDALS', ' ', 20, '', 799, '2014-10-21 07:01:47', 3),
(16, 'ladies', '1408604398561-2081-a-165.jpg', 'SANDALS', ' ', 20, '', 799, '2014-08-21 06:59:58', 0),
(17, 'ladies', '1408604405561-6071-a-165.jpg', 'SANDALS', ' ', 20, '', 799, '2014-08-21 07:00:05', 0),
(18, 'ladies', '1408604411577-0025-a-165.jpg', 'SANDALS', ' ', 20, '', 799, '2014-08-21 07:00:11', 0),
(19, 'ladies', '1408604417577-0527-a-165.jpg', 'SANDALS', ' ', 20, '', 799, '2014-08-21 07:00:17', 0),
(20, 'ladies', '1408604428577-0514-a-165.jpg', 'SANDALS', ' ', 20, '', 599, '2014-08-21 07:00:28', 0),
(21, 'ladies', '1408604435577-0527-a-165.jpg', 'SANDALS', ' ', 20, '', 599, '2014-08-21 07:00:35', 0),
(22, 'ladies', '1408604442577-0527-a-165.jpg', 'SANDALS', ' ', 20, '', 999, '2014-08-21 07:00:42', 0),
(23, 'ladies', '1408604454769-9031-a-165.jpg', 'SANDALS', ' ', 20, '', 1999, '2014-08-21 07:00:54', 0),
(24, 'ladies', '1408604462661-8037-a-165.jpg', 'SANDALS', ' ', 20, '', 1999, '2014-08-21 07:01:02', 0),
(25, 'ladies', '1408604479577-5007-a-165.jpg', 'SANDALS', ' ', 20, '', 899, '2014-08-21 07:01:19', 0),
(26, 'ladies', '1408604532501-2091-a-165.jpg', 'BOOTS', ' ', 20, '', 3999, '2014-08-21 07:02:12', 0),
(27, 'ladies', '1408604538501-4090-a-165.jpg', 'BOOTS', ' ', 20, '', 3999, '2014-08-21 07:02:18', 0),
(28, 'ladies', '1408604544501-6090-a-165.jpg', 'BOOTS', ' ', 20, '', 3999, '2014-08-21 07:02:24', 0),
(29, 'ladies', '1408604551501-6091-a-165.jpg', 'BOOTS', ' ', 20, '', 3999, '2014-08-21 07:02:31', 0),
(30, 'ladies', '1408604558503-4003-a-165.jpg', 'BOOTS', ' ', 20, '', 3999, '2014-08-21 07:02:38', 0),
(31, 'ladies', '1408604600551-1003-a-165.jpg', 'SPORTS', ' ', 20, '', 4999, '2014-08-21 07:03:20', 0),
(32, 'ladies', '1408604608551-2101-a-165.jpg', 'SPORTS', ' ', 20, '', 999, '2014-08-21 07:03:28', 0),
(33, 'ladies', '1408604617551-6201-a-165.jpg', 'SPORTS', ' ', 20, '', 1999, '2014-08-21 07:03:37', 0),
(34, 'ladies', '1408604627581-0560-a-165.jpg', 'SPORTS', ' ', 20, '', 2999, '2014-08-21 07:03:47', 0),
(35, 'ladies', '1408604634581-0904-a-165.jpg', 'SPORTS', ' ', 20, '', 2999, '2014-08-21 07:03:54', 0),
(36, 'ladies', '1408604642581-1005-a-165.jpg', 'SPORTS', ' ', 20, '', 2999, '2014-08-21 07:04:02', 0),
(37, 'ladies', '1408604652581-1040-a-165.jpg', 'SPORTS', ' ', 20, '', 2999, '2014-08-21 07:04:12', 0),
(38, 'ladies', '1408604660581-1042-a-165.jpg', 'SPORTS', ' ', 20, '', 2999, '2014-08-21 07:04:20', 0),
(39, 'ladies', '1408604672581-2505-a-165.jpg', 'SPORTS', ' ', 20, '', 2999, '2014-08-21 07:04:32', 0),
(40, 'ladies', '1408604682581-2504-a-165.jpg', 'SPORTS', ' ', 20, '', 2999, '2014-08-21 07:04:42', 0),
(41, 'ladies', '1408604691581-2033-a-165.jpg', 'SPORTS', ' ', 20, '', 2999, '2014-08-21 07:04:51', 0),
(42, 'ladies', '1408604699581-1139-a-165.jpg', 'SPORTS', ' ', 20, '', 2999, '2014-08-21 07:04:59', 0),
(43, 'ladies', '1408604706ladies sports.jpg', 'SPORTS', ' ', 20, '', 2999, '2014-08-21 07:05:06', 0),
(44, 'ladies', '1408604717581-6121-a-165.jpg', 'SPORTS', ' ', 20, '', 2999, '2014-08-21 07:05:17', 0),
(45, 'ladies', '1408604725581-6020-a-165.jpg', 'SPORTS', ' ', 20, '', 2999, '2014-08-21 07:05:25', 0),
(46, 'ladies', '1408604733581-6012-a-165.jpg', 'SPORTS', ' ', 20, '', 2999, '2014-08-21 07:05:33', 0),
(47, 'men', '1408604814592-6528-a-165.jpg', ' SANDAK', ' ', 20, '', 2899, '2014-08-21 07:06:54', 0),
(48, 'men', '1408604821592-6628-a-165.jpg', ' SANDAK', ' ', 20, '', 2899, '2014-08-21 07:07:01', 0),
(49, 'men', '1408604831sandak.jpg', ' SANDAK', ' ', 20, '', 3899, '2014-08-21 07:07:11', 0),
(50, 'kids', '1408604862131-4013-a-700.jpg', 'SPORTS', ' ', 20, '', 599, '2014-08-21 07:07:42', 0),
(51, 'kids', '1408604870141-0501-a-165.jpg', 'SPORTS', ' ', 20, '', 599, '2014-08-21 07:07:50', 0),
(52, 'kids', '1408604883141-0512-a-700.jpg', '', ' ', 20, '', 599, '2014-08-21 07:08:03', 0),
(53, 'kids', '1408604891151-0502-a-700.jpg', '', ' ', 20, '', 599, '2014-08-21 07:08:11', 0),
(54, 'kids', '1408604898151-9002-a-700.jpg', '', ' ', 20, '', 599, '2014-08-21 07:08:18', 0),
(55, 'kids', '1408604905161-4094-a-700.jpg', '', ' ', 20, '', 599, '2014-08-21 07:08:25', 0),
(56, 'kids', '1408604913161-7017-a-700.jpg', '', ' ', 20, '', 599, '2014-08-21 07:08:33', 0),
(57, 'kids', '1408604920161-9013-a-700.jpg', '', ' ', 20, '', 599, '2014-08-21 07:08:40', 0),
(58, 'kids', '1408604929177-0533-a-700.jpg', '', ' ', 20, '', 599, '2014-08-21 07:08:49', 0),
(59, 'kids', '1408604938359-6030-a-700.jpg', '', ' ', 20, '', 599, '2014-08-21 07:08:58', 0),
(60, 'kids', '1408604951392-5228-a-700.jpg', 'SANDAK', ' ', 20, '', 599, '2014-08-21 07:09:11', 0),
(61, 'kids', '1408604961392-9228-a-700.jpg', 'SANDAK', ' ', 20, '', 599, '2014-08-21 07:09:21', 0),
(62, 'kids', '1408604970392-8928-a-700.jpg', 'SANDAK', ' ', 20, '', 599, '2014-08-21 07:09:30', 0),
(63, 'kids', '1408604979392-6028-a-165.jpg', 'SANDAK', ' ', 20, '', 599, '2014-08-21 07:09:39', 0);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `itemnumber` bigint(20) NOT NULL,
  `itemname` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`itemnumber`, `itemname`, `quantity`, `cost`, `createtime`) VALUES
(6, NULL, NULL, NULL, '2014-07-23 15:25:08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
