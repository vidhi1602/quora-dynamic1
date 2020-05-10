-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 09:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quora`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` varchar(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(20) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `gender`, `age`, `user_name`, `email`, `password`, `createdate`) VALUES
(1, 'nilay', 'gajjar', 'male', '23', 'nil110', 'nil.it@outlook.com', 'admin', '2020-04-26 17:43:32'),
(2, 'darshal', 'mandaviya', 'male', '18', 'dm007', 'dm96mistry@gmail.com', 'darshal12', '2020-04-26 17:58:16'),
(3, 'vidhi', 'gajjar', 'female', '22', 'vidhi123', 'vidhigajjar16@gmail.com', 'vidhi123', '2020-04-26 17:59:34'),
(4, 'jagdish', 'prajapati', 'male', '24', 'jd110', 'jagdishprajapati2020@gmail.com', 'jd123456', '2020-04-26 18:00:53'),
(5, 'niyati', 'mandaviya', 'female', '20', 'ny121', 'niyati.m.704@gmail.com', 'niyati123', '2020-04-26 18:06:25'),
(6, 'abhi', 'shah', 'male', '20', 'abhi1', 'abhi110@gmail.com', 'abhi123', '2020-04-26 18:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `createdate`) VALUES
(1, 'Feed', '2020-04-19 13:28:10'),
(2, 'Health', '2020-04-19 13:28:14'),
(3, 'Books', '2020-04-19 13:29:26'),
(4, 'Food', '2020-04-19 13:29:26'),
(5, 'Education', '2020-04-19 13:29:30'),
(6, 'Music', '2020-04-19 13:29:30'),
(7, 'Business', '2020-04-19 13:30:33'),
(8, 'Movies', '2020-04-19 13:30:33'),
(9, 'Science', '2020-04-19 13:30:37'),
(10, 'Technology', '2020-04-19 13:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category_id` int(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `category_id`, `title`, `content`, `user_id`, `createdat`) VALUES
(1, 6, 'This is Music Category.!', 'Music is good for our health, so keep calm & listen the music..!', 1, '2020-04-27 16:54:13'),
(2, 3, 'Mathematics', 'is the boring subject', 2, '2020-04-27 17:30:04'),
(3, 8, 'ESCAPE PLAN 2 HADES', 'Ray Breslin continues to operate his security company to some success, with senior members Hush and Abigail and newcomers Shu Ren, Jasper Kimbral, and Luke Graves as field operators. During a hostage rescue mission in Chechnya, Kimbral, trusting his computer algorithms, deviates from the mission objectives. This results in one of the hostages being shot, later dying of her wounds, and Breslin fires Kimbral.', 2, '2020-04-27 17:42:14'),
(4, 3, 'THE INVESTER', 'The thing that I have been emphasizing in my own work for the last few years has been the group approach. To try to buy groups of stocks that meet some simple criterion for being undervalued -- regardless of the industry and with very little attention to the individual company... I found the results were very good for 50 years. They certainly did twice as well as the Dow Jones. And so my enthusiasm has been transferred from the selective to the group approach', 5, '2020-04-27 17:46:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
