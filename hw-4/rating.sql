-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 07:36 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homework`
--

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `title`, `user`, `rate`) VALUES
(1, 'Shutter Island', 'mire', 10),
(2, 'Wonder Woman', 'mire', 9.5),
(3, 'Wonder Woman', 'nciric99', 8),
(4, 'Split', 'nciric99', 5),
(5, 'Soul', 'nciric99', 8.7),
(6, 'Split', 'pera93', 10),
(7, 'Pulp Fiction', 'pera93', 8),
(8, 'Tenet', 'pera93', 9.5),
(9, 'Soul', 'pera93', 7.7),
(10, 'Side Effects', 'pera93', 6.4),
(11, 'Home Alone 2: Lost in New York', 'pera93', 9),
(12, 'Wonder Woman', 'mare', 9.7),
(13, 'Shutter Island', 'mare', 9.2),
(14, 'Avengers: Endgame', 'mare', 9.8),
(15, 'Home Alone 2: Lost in New York', 'mare', 8.8),
(16, 'Tenet', 'mare', 7),
(17, 'Karate Kid', 'mare', 7.8),
(18, 'Pulp Fiction', 'mare', 9.2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
