-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2016 at 09:55 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(15) NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `city`, `adress`) VALUES
(12, 'name3', 'email3@email.bg', 894898860, 'city3', 'address3'),
(15, 'name5', 'email2@email.bg5', 894898860, 'city5', 'address5'),
(16, 'name6', 'email2@email.b6', 894898860, 'city2', 'o8i7tg'),
(17, 'name7', 'email2@email.bg7', 894898860, 'city2', 'uyf'),
(18, 'name8', 'email2@email.bg8', 894898860, 'city2', 'uyf'),
(19, 'name', 'email@email.bg', 894898860, 'city1', 'address1'),
(20, 'name2', 'email2@email.bg', 894898860, 'city2 werwe', 'address2'),
(21, 'name11', 'email@email.bg11', 0, 'city', 'adress'),
(22, 'name12', 'email@email.bg12', 0, 'city', 'adress'),
(23, 'name13', 'email@email.bg13', 0, 'city', 'adress'),
(24, 'name14', 'email@email.bg14', 0, 'city', 'adress'),
(25, 'name15', 'email@email.bg15', 0, 'city', 'adress'),
(26, 'name16', 'email@email.bg16', 0, 'city', 'adress'),
(27, 'name17', 'email@email.bg17', 0, 'city', 'adress'),
(28, 'name18', 'email@email.bg18', 0, 'city', 'adress'),
(29, 'name19', 'email@email.bg19', 0, 'city', 'adress'),
(30, 'name10', 'email@email.bg10', 0, 'city', 'adress'),
(31, 'name21', 'email@email.bg21', 0, 'city', 'adress'),
(32, 'name22', 'email@email.bg22', 0, 'city', 'adress'),
(33, 'name23', 'email@email.bg23', 0, 'city', 'adress'),
(34, 'name24', 'email@email.bg24', 0, 'city', 'adress'),
(35, 'name25', 'email@email.bg25', 0, 'city', 'adress'),
(36, 'name26', 'email@email.bg26', 0, 'city', 'adress'),
(37, 'name27', 'email@email.bg27', 0, 'city', 'adress'),
(38, 'name28', 'email@email.bg28', 0, 'city', 'adress'),
(39, 'name29', 'email@email.bg29', 0, 'city', 'adress');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
