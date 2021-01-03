-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 03, 2021 at 08:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magebit_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_subscriptions`
--

CREATE TABLE `email_subscriptions` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `Date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_subscriptions`
--

INSERT INTO `email_subscriptions` (`id`, `email`, `provider`, `Date`) VALUES
(18, 'bekjon_98@mail.ru', '@mail.ru', '2021-01-03'),
(113, 'John@work.us', '@work.us', '2021-01-03'),
(114, 'Joshua@inbox.lv', '@inbox.lv', '2021-01-03'),
(115, 'Issac@newton.uk', '@newton.uk', '2021-01-03'),
(116, 'Robert@veloce.com', '@veloce.com', '2021-01-03'),
(117, 'ALWjdlwja@jalkdwa.com', '@jalkdwa.com', '2021-01-03'),
(134, 'somemail@example.com', '@example.com', '2021-01-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_subscriptions`
--
ALTER TABLE `email_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_subscriptions`
--
ALTER TABLE `email_subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
