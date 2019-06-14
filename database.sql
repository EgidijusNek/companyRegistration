-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2019 m. Bir 14 d. 16:56
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kompanijos`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE
IF NOT EXISTS `companies`
(
  `id` int
(11) NOT NULL AUTO_INCREMENT,
  `name` varchar
(30) CHARACTER
SET latin1
NOT NULL,
  `registration_code` varchar
(100) COLLATE utf16_lithuanian_ci NOT NULL,
  `email` varchar
(30) CHARACTER
SET latin1
NOT NULL,
  `phone` int
(50) NOT NULL,
  `comment` varchar
(500) CHARACTER
SET utf32
COLLATE utf32_lithuanian_ci NOT NULL,
  PRIMARY KEY
(`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `companies`
--

INSERT INTO `companies` (`
id`,
`name
`, `registration_code`, `email`, `phone`, `comment`) VALUES
(3, 'denis', 'dfdf5852', 'tdaf@dafdaf.lt', 5128, 'kaÅ¾kas naujo'),
(4, 'sfgsh', 'sfgg', 'sdfg@dff.lt', 43281, 'naujas komentaras'),
(5, 'egis', 'adf', 'adf@df.lt', 85, 'komentaras');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
