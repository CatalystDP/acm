-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014 �?03 �?25 �?12:11
-- 服务器版本: 5.6.11
-- PHP 版本: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `testinfo`
--
CREATE DATABASE IF NOT EXISTS `testinfo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `testinfo`;

-- --------------------------------------------------------

--
-- 表的结构 `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `school`
--

INSERT INTO `school` (`Id`, `Name`) VALUES
(1, '大连海事大学'),
(2, '大连理工大学'),
(3, '东软信息学院'),
(4, '大连交通大学'),
(5, '辽宁师范大学'),
(6, '沈阳航空航天大学'),
(7, '东北财经大学'),
(8, '大连外国语大学'),
(9, '北京航空航天大学'),
(10, '黑龙江大学'),
(11, '哈尔滨理工大学'),
(12, '南京理工大学'),
(13, '南京大学'),
(14, '东北大学');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `stuname` varchar(50) NOT NULL,
  `picture` varchar(150) NOT NULL,
  `teamid` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
