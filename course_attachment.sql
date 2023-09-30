-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 07:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_edu`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_attachment`
--

CREATE TABLE `course_attachment` (
  `id` int(6) UNSIGNED NOT NULL,
  `course_id` int(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `ch_name` varchar(255) NOT NULL,
  `ch_description` varchar(255) NOT NULL,
  `store` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `tutor_id` int(255) NOT NULL,
  `status` int(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_attachment`
--

INSERT INTO `course_attachment` (`id`, `course_id`, `course_name`, `ch_name`, `ch_description`, `store`, `filename`, `link`, `tutor_id`, `status`) VALUES
(2, 1, 'PHP', 'Introduction', 'PHP', 0, 'Data mining.pdf', '', 3, 1),
(3, 4, 'Data Structure', 'Introduction', 'Data Structure', 0, 'Data mining.pdf', '', 2, 1),
(4, 4, 'Data Structure', 'Details', 'Data Structure', 0, 'database connectivity.pdf', '', 2, 1),
(5, 1, 'PHP', 'Introduction', 'php', 1, '', 'https://www.youtube.com/embed/aPUVUrS2oC0', 3, 1),
(6, 1, 'PHP', 'What is php?', 'open source scripting language', 1, '', 'https://www.youtube.com/embed/aPUVUrS2oC0', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_attachment`
--
ALTER TABLE `course_attachment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_attachment`
--
ALTER TABLE `course_attachment`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
