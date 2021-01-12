-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 11:01 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` int(50) NOT NULL,
  `license` varchar(100) NOT NULL,
  `engine` int(100) NOT NULL,
  `date` date NOT NULL,
  `mechanic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `address`, `phone`, `license`, `engine`, `date`, `mechanic`) VALUES
(1, 'Tajmim Hossain Purnata', '26 bekham road', 12345, '33', 12, '2020-12-17', 'Yoongi'),
(2, 'Clara', '46th street', 986257, '128w', 212, '2020-12-16', 'Taehyung'),
(3, 'Anamika Mashiyat', 'green road', 208937, '21jjk', 1298, '2020-12-14', 'Jimin'),
(4, 'Tajmim ', 'green road', 87732, 'ef', 3, '2020-12-09', 'Namjoon'),
(16, 'Purnata', 'Banani', 878695, 'hys8csjb99', 976659, '2020-12-25', 'Hobi'),
(17, 'Taylor', 'Banani', 87869588, 'hs897', 89976, '2020-12-16', 'Jungkook'),
(18, 'Sayeem', 'Mohammedpur', 89473, 'jnd9834', 817398, '2020-12-17', 'Namjoon'),
(19, 'Dara', 'gram', 927644, 'jnehrf974', 78346436, '2020-12-31', 'Yoongi'),
(20, 'Aerasol', 'aci', 93674, 'i34jdph08', 29892, '2020-12-27', 'Jin'),
(21, 'iu', 'korea', 893746, 'tg46g5', 45545456, '2020-12-26', 'Hobi');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic`
--

CREATE TABLE `mechanic` (
  `name` varchar(100) NOT NULL,
  `seat` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mechanic`
--

INSERT INTO `mechanic` (`name`, `seat`) VALUES
('Hobi', 8),
('Jimin', 9),
('Jin', 9),
('Jungkook', 9),
('Namjoon', 8),
('Taehyung', 9),
('Yoongi', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mechanic`
--
ALTER TABLE `mechanic`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
