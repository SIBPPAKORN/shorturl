-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 01:11 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shorturl`
--

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `id` int(11) NOT NULL,
  `long_url` varchar(255) NOT NULL,
  `short_code` varchar(10) NOT NULL,
  `click_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `urls`
--

INSERT INTO `urls` (`id`, `long_url`, `short_code`, `click_time`) VALUES
(37, 'https://reg.kbu.ac.th/registrar/login.asp?avs462269514=1', 'xRVrRV', '2023-08-22 10:33:58'),
(38, 'https://reg.kbu.ac.th/registrar/login.asp?avs462269514=1', 'OIGnsE', '2023-08-22 10:48:42'),
(39, 'https://reg.kbu.ac.th/registrar/login.asp?avs462269514=1', 'hDaPli', '2023-08-22 10:51:55'),
(40, 'https://reg.kbu.ac.th/registrar/login.asp?avs462269514=1', '0vYn0Z', '2023-08-22 10:52:00'),
(41, 'https://reg.kbu.ac.th/registrar/login.asp?avs462269514=1', 'Fu3pSm', '2023-08-22 10:54:19'),
(42, 'https://reg.kbu.ac.th/registrar/login.asp?avs462269514=1', 'r0Se0L', '2023-08-22 10:54:34'),
(43, 'https://liquipedia.net/valorant/Main_Page', 'SMg3R0', '2023-08-22 10:54:48'),
(44, 'https://github.com/SIBPPAKORN/lab.github.git', 'RwgmSX', '2023-08-22 10:55:22'),
(45, 'https://github.com/SIBPPAKORN/lab.github.git', 'tYNV9D', '2023-08-22 10:55:50'),
(46, 'https://reg.kbu.ac.th/registrar/login.asp?avs462269514=1', 'qFyU8B', '2023-08-22 10:57:26'),
(47, 'https://reg.kbu.ac.th/registrar/login.asp?avs462269514=1', 'U4KZIa', '2023-08-22 10:58:41'),
(48, 'https://reg.kbu.ac.th/registrar/login.asp?avs462269514=1', 'yNZhpE', '2023-08-22 11:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `url_statistics`
--

CREATE TABLE `url_statistics` (
  `id` int(11) NOT NULL,
  `short_code` varchar(10) NOT NULL,
  `click_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `short_code` (`short_code`);

--
-- Indexes for table `url_statistics`
--
ALTER TABLE `url_statistics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `url_statistics`
--
ALTER TABLE `url_statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `url_statistics`
--
ALTER TABLE `url_statistics`
  ADD CONSTRAINT `url_statistics_ibfk_1` FOREIGN KEY (`id`) REFERENCES `urls` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
