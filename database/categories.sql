-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2018 at 10:13 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meetmycampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category` varchar(128) DEFAULT NULL,
  `css_style` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`, `css_style`) VALUES
(1, 'Gaming', 'gaming-thumbnail'),
(2, 'Politics', 'politics-thumbnail'),
(3, 'Culture', 'culture-thumbnail'),
(4, 'Startups', 'startups-thumbnail'),
(5, 'Sports', 'sports-thumbnail'),
(6, 'Health + Fitness', 'health-thumbnail'),
(7, 'Spirituality', 'spirituality-thumbnail'),
(8, 'Anime + Comic Books', 'anime-thumbnail'),
(9, 'Business', 'business-thumbnail'),
(10, 'Art', 'art-thumbnail'),
(11, 'Music', 'music-thumbnail'),
(12, 'LGBTQ', 'lgbtq-thumbnail'),
(13, 'Photography', 'photography-thumbnail'),
(14, 'Science + Technology', 'technology-thumbnail'),
(15, 'Travel', 'travel-thumbnail'),
(16, 'General', 'general-thumbnail'),
(17, 'Social Issues', 'social-thumbnail'),
(18, 'Theatre', 'theatre-thumbnail'),
(19, 'Books', 'books-thumbnail'),
(20, 'Tv + Films', 'films-thumbnail'),
(21, 'Campus Stories', 'rants-thumbnail'),
(22, 'Financial Aid', 'financialAid-thumbnail'),
(23, 'Majors', 'majors-thumbnail'),
(24, 'Admissions', 'admissions-thumbnail'),
(25, 'Greek life', 'greek-thumbnail'),
(26, 'Parties', 'parties-thumbnail'),
(27, 'Getting Into', 'gettingIn-thumbnail'),
(28, 'Sexual Orientation', NULL),
(29, 'Ethics', NULL),
(30, 'Campus Life', NULL),
(31, 'Student Debt', NULL),
(32, 'Life after College', NULL),
(33, 'Away from Home', NULL),
(34, 'Prospective Students', NULL),
(35, 'Transfer Students', NULL),
(36, 'Graduate Students', NULL),
(37, 'Alumni', NULL),
(38, 'Weird Dreams', NULL),
(39, 'Environmental Issues ', NULL),
(40, 'Futurism', NULL),
(41, 'Mainstream Media', NULL),
(42, 'Food ', NULL),
(43, 'Jobs', NULL),
(44, 'College Romance', NULL),
(45, 'Peer Pressure', NULL),
(46, 'Getting In', NULL),
(47, 'Freshmen Life', NULL),
(48, 'Student Debt', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
