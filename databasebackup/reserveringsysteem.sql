-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2015 at 12:40 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reserveringsysteem`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Administrator', '{"admin": 1} ');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(9) NOT NULL,
  `ov` varchar(10) NOT NULL,
  `workplace_id` int(11) NOT NULL,
  `classroom` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `ov`, `workplace_id`, `classroom`, `date`, `time_id`) VALUES
(1, '103858', 1, 215, '2015-10-02', 2),
(2, '103858', 1, 130, '2015-10-04', 2),
(3, '103858', 1, 130, '2015-10-08', 1),
(4, '103858', 1, 215, '2015-10-21', 2),
(5, '103858', 1, 130, '2015-10-23', 2),
(6, '103858', 1, 215, '2015-11-26', 1),
(7, '103858', 1, 215, '2015-11-26', 2),
(8, '103858', 1, 215, '2015-11-27', 2),
(9, '103858', 1, 215, '2015-11-27', 1),
(11, '103858', 1, 215, '2015-11-27', 3);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `time_id` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `start`, `end`) VALUES
(1, '08:30:00', '11:45:00'),
(2, '12:30:00', '16:30:00'),
(3, '08:30:00', '16:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `group` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=103860 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `salt`, `firstname`, `lastname`, `group`) VALUES
(3, '0', 'swag123', 'e93b9393ce2f1adad7c2de429a6a44b183f9bf44c9da4b04a3babda8da557a46', 'ÿl7ýz+Qöª¡7\0’Ãt·/¿tÇÄÆ•B>Ì\Z¨o', 'swag123', 'swag123', 1),
(4, '123456', '123456', 'cd0a4c16730723ad3e582bfc0ce2cd805bf12133bfb18d89150cc6c40774b773', 'B•©	¹èªþˆÛDLšrvítÒ5u7ÊPw“åüd', '123456', '123456', 1),
(5, '0', 'hilbert123', 'eefedabb663a436b0e1a0b2e3250cc476ff79bf7a7957b4a6ab947d1984b1ab8', 'H†¾ÚXè¾I^	£Ç×ÂHš{¡àiÄ¨Zñén©×æ0', 'hilbert123', 'hilbert123', 1),
(7, '654321', '654321', '898339914952d3958feec6d90327f848b8a96a62a65f1b249820ad3321d20896', '8Í¨Z\0¯K‘Õ^¡Ø	B\n&ht>EÃúã5ØqL', '654321', '654321', 1),
(9, 'Hilbert', 'hilbertgreveling@live.nl', '0541f377754cd7745bc26a0206c76088563961e9c4bf7e305675a9765d8657da', 'ÿ’!À9G©¨kÕ{[wI[1®ö°ÚÊ¡ˆé''Gi', 'Hilbert', 'Greveling', 1),
(10, '98765', '098765', 'f478d74e01b5a756e7cdb53ac19280cc19cfe77de0f6f33c7cca0691c15dbfe6', 'ÈHÍ`ÐáùAû1üGô²e¨®‹øŽº‹SPÉä}s:', '098765', '098765', 1),
(11, '123456', '123456', 'e846d1eb290b8d32f6a3ab191adf1ed88cdd818a20253390a5f209b8217d8f01', 'šÆª\n„¯9jÍÛê¾{°Ö 0Z°žºy”(P(', '123456', '123456', 1),
(12, '123456789', '123456789', 'ecdbb00df79b852dc3b5b1568f7426d90b0cce69126ef67ceab0a5c128c53c76', '˜tó“ f¦8ªšõôï¬”.òÑ¦°ªNIô€', '123456789', '123456789', 1),
(16, 'Memelord', 'asd@asd.com', 'e042713d0c2b5ef82b5ebcffe6c9437abc654a969beecf8de4bb622793ce25ad', '–ü9i©~Ö¼ÖôžÁZd{õufÃâVàX€×Ôâ®­@', 'Michael', 'asdsad', 1),
(103858, 'Michael', 'michaelvanjelgerhuis@gmail.com', '14bd635441c18a71d34fc87d90f5ecb59df2a3b900416fee49214e26531d9406', ',s]H¡€]*±v(®(gRÂ`¬wû´²LSI¦HÐ', 'Michael', 'van Jelgerhuis', 1),
(103859, '234512', 'memer@hotmail.com', 'e81c8a51909d8215d58c4cb426c4e611dc54f3a1372078b3b3b380988918e67d', '·Föú%æ7X¹…Ó€z€ÊRSpaÈZ\Zçƒc©È', 'Me', 'Mer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `workplace`
--

CREATE TABLE IF NOT EXISTS `workplace` (
  `workplace_id` int(11) NOT NULL,
  `classroom` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workplace`
--

INSERT INTO `workplace` (`workplace_id`, `classroom`) VALUES
(1, 130);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`,`date`,`time_id`),
  ADD UNIQUE KEY `date` (`date`,`time_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workplace`
--
ALTER TABLE `workplace`
  ADD PRIMARY KEY (`workplace_id`),
  ADD UNIQUE KEY `classroom` (`classroom`),
  ADD UNIQUE KEY `classroom_2` (`classroom`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103860;
--
-- AUTO_INCREMENT for table `workplace`
--
ALTER TABLE `workplace`
  MODIFY `workplace_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
