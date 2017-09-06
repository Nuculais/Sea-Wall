-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2015 at 05:31 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kommentardb`
--

-- --------------------------------------------------------

--
-- Table structure for table `inloggning`
--

CREATE TABLE IF NOT EXISTS `inloggning` (
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password_hash` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci COMMENT='Hanterar inloggning och lösenord.';

--
-- Dumping data for table `inloggning`
--

INSERT INTO `inloggning` (`username`, `email`, `password_hash`) VALUES
('Abc', 'abc@abc.se', '$2y$10$SK0lPUNO3PjssVa8d0ZNxeNx3l3oZzLq0LIVBKMpwx7NVPLmfgqnC'),
('Jonathan', 'jonte@jonte.com', '$2y$10$HdEt95vpvcgHTB062ENrVuf4sTRU8HS53ueAmVH2LqvrFdoWEgpC.'),
('Malin', 'malin@malin.se', '$2y$10$5VCG55Z1Kgbe2HyW6/wla.iVoZwZSHI6.2mabiwTc9leM065f6vei');

-- --------------------------------------------------------

--
-- Table structure for table `kommentarer`
--

CREATE TABLE IF NOT EXISTS `kommentarer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `kommentar` text NOT NULL,
  `tid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Hanterar kommentarerna' AUTO_INCREMENT=9 ;

--
-- Dumping data for table `kommentarer`
--

INSERT INTO `kommentarer` (`id`, `username`, `kommentar`, `tid`) VALUES
(4, 'Malin', 'Havet Ã¤r fint.', '2015-06-23 00:34:03'),
(8, 'Jonathan', 'kawaii', '2015-06-25 22:21:10');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kommentarer`
--
ALTER TABLE `kommentarer`
  ADD CONSTRAINT `kommentarer_ibfk_1` FOREIGN KEY (`username`) REFERENCES `inloggning` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
