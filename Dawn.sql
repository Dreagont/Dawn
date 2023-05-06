-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 03:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4
CREATE DATABASE IF NOT EXISTS `Dawn` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `Dawn`;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dawn`
--

-- --------------------------------------------------------

--
-- Table structure for table `bogia`
--

CREATE TABLE `bogia` (
  `username` varchar(64) NOT NULL,
  `comment` text NOT NULL,
  `ratescore` int(100) DEFAULT 0,
  `mark` int(100) DEFAULT 0,
  `commentid` int(100) AUTO_INCREMENT PRIMARY KEY
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bogia`
--

INSERT INTO `bogia` (`username`, `comment`) VALUES
('An Nguyen', 'nguyen ne ba'),
('An Nguyen', 'ay yo');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genrename` varchar(64) NOT NULL,
  `genreicon` varchar(64) NOT NULL,
  `displayname` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genrename`, `genreicon`, `displayname`) VALUES
('action', 'car-sport-outline', 'Action'),
('cartoon', 'color-wand-outline', 'Cartoon'),
('love', 'heart-outline', 'Love'),
('horror', 'skull-outline', 'Horror'),
('vietnam', 'star-outline', 'VietNam');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `moviename` varchar(64) NOT NULL,
  `genre` varchar(64) NOT NULL,
  `displayname` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`moviename`, `genre`, `displayname`) VALUES
('spiderman', 'trending', 'Spiderman'),
('deadpool2', 'new', 'Deadpool 2'),
('whatif', 'cartoon', 'What if...?'),
('titanic', 'love', 'Titanic'),
('carbininthewoods', 'horror', 'The carbin in the woods'),
('venom', 'action', 'Venom'),
('bogia', 'vietnam', 'Bo Gia'),
('hemcut', 'vietnam', 'Hem Cut'),
('thecall', 'vietnam', 'The Call');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(64) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `firstname`, `lastname`, `email`, `password`) VALUES
('user0', 'Huynh', 'An Nguyen', 'nguyen@gmail.com', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
