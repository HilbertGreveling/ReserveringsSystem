-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 05 nov 2015 om 15:33
-- Serverversie: 5.6.16
-- PHP-versie: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `reserveringsysteem`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Administrator', '{"admin": 1} ');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ov` varchar(10) NOT NULL,
  `workplace_id` int(11) NOT NULL,
  `classroom` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`workplace_id`,`classroom`,`date`,`time_id`),
  UNIQUE KEY `date` (`date`,`time_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Gegevens worden uitgevoerd voor tabel `reservations`
--

INSERT INTO `reservations` (`id`, `ov`, `workplace_id`, `classroom`, `date`, `time_id`) VALUES
(1, '103858', 1, 130, '2015-10-17', 3),
(1, '103858', 1, 130, '2015-10-20', 2),
(2, '103858', 1, 130, '2015-10-21', 2),
(3, '103858', 1, 130, '2015-10-28', 3),
(4, '103858', 1, 130, '2015-10-29', 1),
(5, '103858', 1, 130, '2015-10-29', 2),
(6, '103858', 1, 130, '2015-10-29', 3),
(7, '103858', 1, 215, '2015-10-31', 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `start` time NOT NULL,
  `end` time NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `time`
--

INSERT INTO `time` (`time_id`, `start`, `end`) VALUES
(1, '08:30:00', '11:45:00'),
(2, '12:30:00', '16:30:00'),
(3, '08:30:00', '16:30:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `group` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `salt`, `firstname`, `lastname`, `group`) VALUES
(3, 'swag123', 'swag123', 'e93b9393ce2f1adad7c2de429a6a44b183f9bf44c9da4b04a3babda8da557a46', 'ÿl7ýz+Qöª¡7\0’Ãt·/¿tÇÄÆ•B>Ì\Z¨o', 'swag123', 'swag123', 1),
(4, '123456test', '123456', 'cd0a4c16730723ad3e582bfc0ce2cd805bf12133bfb18d89150cc6c40774b773', 'B•©	¹èªþˆÛDLšrvítÒ5u7ÊPw“åüd', '123456', '123456', 1),
(5, 'hilbert123', 'hilbert123', 'eefedabb663a436b0e1a0b2e3250cc476ff79bf7a7957b4a6ab947d1984b1ab8', 'H†¾ÚXè¾I^	£Ç×ÂHš{¡àiÄ¨Zñén©×æ0', 'hilbert123', 'hilbert123', 1),
(7, '654321', '654321', '898339914952d3958feec6d90327f848b8a96a62a65f1b249820ad3321d20896', '8Í¨Z\0¯K‘Õ^¡Ø	B\n&ht>EÃúã5ØqL', '654321', '654321', 1),
(9, 'hilbert', 'hilbertgreveling@live.nl', '0541f377754cd7745bc26a0206c76088563961e9c4bf7e305675a9765d8657da', 'ÿ’!À9G©¨kÕ{[wI[1®ö°ÚÊ¡ˆé''Gi', 'Hilbert', 'Greveling', 1),
(10, '098765', '098765', 'f478d74e01b5a756e7cdb53ac19280cc19cfe77de0f6f33c7cca0691c15dbfe6', 'ÈHÍ`ÐáùAû1üGô²e¨®‹øŽº‹SPÉä}s:', '098765', '098765', 1),
(11, '123456', '123456', 'e846d1eb290b8d32f6a3ab191adf1ed88cdd818a20253390a5f209b8217d8f01', 'šÆª\n„¯9jÍÛê¾{°Ö 0Z°žºy”(P(', '123456', '123456', 1),
(12, '123456789', '123456789', 'ecdbb00df79b852dc3b5b1568f7426d90b0cce69126ef67ceab0a5c128c53c76', '˜tó“ f¦8ªšõôï¬”.òÑ¦°ªNIô€', '123456789', '123456789', 1),
(103858, 'Michael', 'michaelvanjelgerhuis@gmail.com', '49b26dfab912731e9cf9fa7247cf806ce2c55dd00b8e3149f036778584ed5f4c', 'cìo+ÌpmœÅuKF ðì}PæªÅ³“‹8ç³4', 'Michael', 'van Jelgerhuis', 1),
(103859, '123098', 'meme@meme.meme', '4db31e4971d2d641a27dc09bae3df517561d9b194370212af0ec2ef3c23c5b17', '§Nß’ß\\-å¿×¨P¶PäXS¥t-¾Ñ9''që', 'Michael', 'neger', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `workplace`
--

CREATE TABLE IF NOT EXISTS `workplace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workplace_id` int(11) NOT NULL,
  `classroom` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Gegevens worden uitgevoerd voor tabel `workplace`
--

INSERT INTO `workplace` (`id`, `workplace_id`, `classroom`) VALUES
(1, 1, 130),
(2, 1, 215),
(3, 2, 130),
(4, 2, 215),
(5, 3, 130),
(6, 3, 215),
(7, 4, 130),
(8, 4, 215),
(9, 5, 130),
(10, 5, 215),
(11, 6, 130),
(12, 6, 215),
(13, 7, 130),
(14, 7, 215),
(15, 8, 130),
(16, 8, 215);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
