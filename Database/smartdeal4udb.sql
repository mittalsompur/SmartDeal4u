-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2016 at 11:02 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smartdeal4udb`
--
CREATE DATABASE `smartdeal4udb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `smartdeal4udb`;

-- --------------------------------------------------------

--
-- Table structure for table `addposttbl`
--

CREATE TABLE IF NOT EXISTS `addposttbl` (
  `postid` int(50) NOT NULL AUTO_INCREMENT,
  `cid` int(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `subcategoryid` int(50) NOT NULL,
  `city` varchar(200) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `itemtype` varchar(50) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `mobileno` int(12) NOT NULL,
  `price` int(30) NOT NULL,
  `postdate` date NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `addposttbl`
--

INSERT INTO `addposttbl` (`postid`, `cid`, `userid`, `subcategoryid`, `city`, `locality`, `title`, `description`, `photo`, `itemtype`, `keyword`, `mobileno`, `price`, `postdate`, `status`) VALUES
(5, 13, 2, 18, 'Surat', 'C.G.Road', 'Drivering mobile class', 'xbigtuiksbguis', '1456301873_72775_Img.jpg', 'new', 'driving cars class', 2147483647, 10000, '0000-00-00', 1),
(6, 10, 2, 16, 'Surat', 'Maninagar', 'Mobile post', 'awesome mobile', '1456908077_75827_Img.png', 'used', 'mobile', 2147483647, 15000, '2016-03-02', 1),
(7, 10, 2, 15, 'Ahmedabad', 'Vadaj', 'Micromax A34', 'Awesome post', '1456912627_21530_Img.png', 'used', 'mobile', 2147483647, 15000, '2016-03-02', 1),
(8, 14, 2, 25, 'Baroda', 'Chani Jkat naka', 'Acer leptop', 'This is very super leptop company. ', '1457025536_74830_Img.jpg', 'new', 'leptop', 2147483647, 30000, '2016-03-03', 1),
(9, 14, 2, 24, 'Ahmedabad', 'Vastral', 'Dell leptop', 'This leptop is very nice and we have to easily used to with this leptop.', '1457025740_99112_Img.jpg', 'used', 'leptop', 2147483647, 35000, '2016-03-03', 0),
(10, 10, 2, 14, 'Ahmedabad', 'Naroda', 'fvgrfv', 'dxsadad', '1457087354_25748_Img.jpg', 'used', 'rfgvrf', 2147483647, 15000, '2016-03-04', 0),
(11, 10, 2, 14, 'Surat', 'Vedavad', 'SmartPhone', 'This is Smaert phone.', '1457089026_90801_Img.jpg', 'used', 'mobile', 2147483647, 15000, '2016-03-04', 0),
(12, 10, 2, 14, 'Surat', 'Greencity', 'SmartPhone', 'This is Smaert phone.', '1457089201_64599_Img.jpg', 'used', 'mobile', 2147483647, 15000, '2016-03-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `uid` int(3) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`uid`, `uname`, `pwd`) VALUES
(1, 'madlanisnehal@gmail.com', '123'),
(2, 'tejalsolanki794@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cid` int(3) NOT NULL AUTO_INCREMENT,
  `cname` varchar(30) NOT NULL,
  `imagename` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `imagename`, `status`) VALUES
(10, 'Mobiles', '1457024557_18687_Img.png', 1),
(12, 'Tablets', '1457024809_53055_Img.jpg', 1),
(13, 'Services', '1457024628_15907_Img.jpg', 1),
(14, 'Leptop', '1457024677_36773_Img.png', 1),
(15, 'Entertainment', '1457024730_41618_Img.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `query` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `query`, `status`) VALUES
(2, 'tejal solankii', 'tejalsolanki794@gmail.com', 'hsdgfsssagdhtryury\r\nfturhjftryutyrt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registertbl`
--

CREATE TABLE IF NOT EXISTS `registertbl` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `contactno` int(12) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `registertbl`
--

INSERT INTO `registertbl` (`id`, `name`, `email`, `password`, `address`, `city`, `state`, `country`, `contactno`, `status`) VALUES
(2, 'tejal solanki', 'tejalsolanki794@gmail.com', '123', 'Naroda', 'Ahmedabad', 'Texas', 'Brazil', 2147483647, 1),
(3, 'Zala gopi', 'zalagopi@gmail.com', '9876', 'Narol', 'Morbi', 'Texas', 'Brazil', 987952666, 1),
(4, 'Snehal Madlani', 'test@gmail.com', '123', 'test', 'test', 'Narnia', 'France', 1234567890, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `subcategoryid` int(3) NOT NULL AUTO_INCREMENT,
  `cid` int(3) NOT NULL,
  `subcategoryname` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`subcategoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategoryid`, `cid`, `subcategoryname`, `status`) VALUES
(10, 5, 'samsung', 1),
(13, 3, 'Lenovo', 1),
(14, 10, 'Nokia', 1),
(15, 10, 'micromax', 1),
(16, 10, 'Lava', 1),
(17, 10, 'Apple', 1),
(18, 13, 'Driving cars', 1),
(19, 12, 'Apple Tablet', 1),
(20, 12, 'Samsung Tablet', 1),
(21, 12, 'Micromax Tablet', 1),
(22, 13, 'Garage service', 1),
(23, 13, 'Newspaper Service', 1),
(24, 14, 'Dell leptop', 1),
(25, 14, 'Acer leptop', 1),
(26, 15, 'songs', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
