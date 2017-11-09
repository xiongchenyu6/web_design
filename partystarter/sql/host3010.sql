-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Oct 30, 2017 at 09:00 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `partystarter`
--

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

CREATE TABLE `host` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `description` text,
  `time` datetime DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `place` text,
  `create_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `price` int(11) DEFAULT NULL,
  `maximum` int(11) DEFAULT NULL,
  `theme` varchar(255) DEFAULT NULL,
  `event_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`id`, `user_id`, `description`, `time`, `region`, `place`, `create_at`, `price`, `maximum`, `theme`, `event_name`) VALUES
(1, 1, 'Finals are finally over! Let\'s gather and have fun! Drinks are provided, just bring your masks! Bring your friends too!', '2017-12-10 19:00:00', 'West', '50 Nanyang View, Campus Clubhouse, Singapore 639667', '2017-10-29 23:00:00', 10, 20, 'Masquerade', 'NTU Masquerade '),
(2, 2, 'Let\'s meet for some morning sunshine! I have booked some kayaks for the adventurous! We will have BBQ session in the afternoon!', '2017-12-12 09:00:00', 'East', 'Nicoll Dr, Singapore 498991', '2017-10-30 00:00:00', 20, 20, 'Beach', 'Eastie Beach Party'),
(3, 3, 'It is festive season, let\'s celebrate! Sumptuous dinner and wine included!', '2017-12-24 19:00:00', 'Central', '1 Beach Rd, Singapore 189673', '2017-10-30 02:00:00', 25, 15, 'Christmas', 'HoHoHo Xmas Party');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `host`
--
ALTER TABLE `host`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `host`
--
ALTER TABLE `host`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
