-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 03:06 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `pass`) VALUES
(1, 'admin@gmail.com', 'admin123', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `message`, `created_date`) VALUES
(1, 'shreya', 'shreya@yahoo.com', 'join', '2023-03-25'),
(3, 'krisha', 'krisha@gmail.com', 'i want to join', '2023-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `course_list`
--

CREATE TABLE `course_list` (
  `id` int(30) NOT NULL,
  `tutor_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `experience` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`id`, `tutor_id`, `name`, `logo`, `description`, `experience`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 3, 'PHP', 'php.png', 'Learn all PHP Fundamental and building blocks-Complete php course.Make web pages dynamic with variety of concepts including form validation.', '5 Years', 1, 0, '2022-05-17', '2023-03-23'),
(2, 1, 'MySQL', 'mysql.png', 'Introduction to Structured Query language. Learn about the basic syntax of the SQL language, as well as database design with multiple table,etc  ', '5 Years', 1, 0, '2022-05-17', '2023-03-23'),
(3, 3, 'DBMS', 'dbms.jpeg', 'Learn database management system(DBMS).Gain DBMS skills such as data creation ,queryingand manipulation and many more concepts.', '5 Years', 1, 0, '2023-03-08', '2023-03-23'),
(4, 2, 'Data Structure', 'ds.png', 'Learn basics of Data Structure , You will learn how these data structures are implemented in different programming languages and will practice implementing them in our programming assignments.', '4 years', 1, 0, '2023-03-08', '2023-03-23'),
(5, 3, 'C++', 'c++.jfif', 'C++ is an object-oriented programming (OOP) language that is viewed by many as the best language for creating large-scale applications.', '1 Year', 1, 0, '2023-03-24', '2023-03-24'),
(6, 2, 'Data Mining', 'dm.png', 'Data mining is the process of sorting through large data sets to identify patterns and relationships that can help solve business problems through data analysis.', '3 Year', 1, 0, '2023-03-24', '2023-03-24'),
(7, 2, 'Machine Learning', 'pic-3.jpg', 'anything', 'More than 5 Year', 0, 1, '2023-04-07', '2023-04-07'),
(8, 1, 'Machine Learning', 'pic-2.jpg', 'anything', '3 Year', 1, 0, '2023-04-07', '2023-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `course_request`
--

CREATE TABLE `course_request` (
  `id` int(6) UNSIGNED NOT NULL,
  `tutor_id` int(6) NOT NULL,
  `course_id` int(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `student_userName` varchar(255) NOT NULL,
  `status` int(4) NOT NULL,
  `delete_flag` int(6) NOT NULL,
  `delete_courses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_request`
--

INSERT INTO `course_request` (`id`, `tutor_id`, `course_id`, `course_name`, `student_id`, `student_userName`, `status`, `delete_flag`, `delete_courses`) VALUES
(1, 3, 1, 'PHP', 1, 'maulik7332', 0, 0, 0),
(2, 1, 2, 'MySQL', 1, 'maulik7332', 0, 0, 0),
(3, 3, 1, 'PHP', 3, 'vidhi54', 0, 0, 0),
(5, 3, 3, 'DBMS', 1, 'maulik7332', 0, 0, 0),
(6, 3, 5, 'C++', 3, 'vidhi54', 1, 0, 0),
(7, 3, 1, 'PHP', 2, 'vrujal30', 0, 0, 0),
(8, 1, 2, 'MySQL', 2, 'vrujal30', 0, 0, 0),
(9, 2, 4, 'Data Structure', 1, 'maulik7332', 1, 0, 0),
(10, 1, 2, 'MySQL', 3, 'vidhi54', 1, 0, 0),
(11, 3, 5, 'C++', 1, 'maulik7332', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `delete_flag` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `student_id`, `username`, `email`, `course_id`, `course_name`, `tutor_id`, `message`, `delete_flag`, `date_created`, `status`) VALUES
(1, '', 'vidhi', 'vidhi54@gmail.com', 1, 'php', 3, '123', 0, '2023-04-04', 1),
(2, '3 ', 'vidhi54', 'vidhi54@gmail.com', 1, 'php', 3, 'hello', 0, '2023-04-05', 0),
(4, '3 ', 'vidhi54', 'vidhi54@gmail.com', 6, 'data mining', 2, 'i have a doubt', 0, '2023-04-05', 0),
(5, '3 ', 'vidhi54', 'vidhi54@gmail.com', 1, 'php', 3, '123', 0, '2023-04-06', 0),
(6, '3 ', 'vidhi54', 'vidhi54@gmail.com', 5, 'C++', 3, 't6527', 0, '2023-04-08', 0),
(7, '3 ', 'vidhi54', 'vidhi54@gmail.com', 2, 'MySQL', 1, 'mysql', 0, '2023-04-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `cardnumber` varchar(255) NOT NULL,
  `expiry` date NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `course_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `tutor_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `cardnumber`, `expiry`, `cvv`, `address`, `city`, `state`, `pincode`, `course_id`, `student_id`, `tutor_id`) VALUES
(1, ' vidhi', ' 98398', '0000-00-00', ' 8787', ' 878997', ' surat', ' gujarat', ' 395006', 3, 3, 3),
(2, ' vidhi', ' 2-02309090', '2002-09-25', ' 989', ' gujarat', ' surat', ' india', ' 495006', 3, 3, 3),
(3, ' vidhi', ' 3232', '0231-03-21', ' 322', ' 987', ' 878', ' 787', ' 87', 8, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(6) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `qualify` varchar(255) NOT NULL,
  `dob` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `username`, `email`, `phonenumber`, `pass`, `gender`, `filename`, `qualify`, `dob`) VALUES
(1, 'Maulik Vastarpara', 'maulik7332', 'maulik@gmail.com', '9737277332', '123', 'Male', '', '', '2023-03-23'),
(2, 'Vrujal Laheri', 'vrujal30', 'vrujal30@gmail.com', '9074628476', '123', 'Female', '', '', '2023-03-23'),
(3, 'Vidhi Thummar', 'vidhi54', 'vidhi54@gmail.com', '9737465789', '123', 'Female', 'pic-2.jpg', 'Btech', '2023-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_list`
--

CREATE TABLE `tutor_list` (
  `id` int(30) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `avtar` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = inactive,\\r\\n1 = active,\\r\\n2 = Blocked\r\n',
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_list`
--

INSERT INTO `tutor_list` (`id`, `firstname`, `middlename`, `lastname`, `email`, `avtar`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Mark', 'D', 'Cooper', 'mcooper@gmail.com', '1.png', 1, 0, '2022-05-17', '2023-03-23'),
(2, 'Claire', 'C', 'Blake', 'cblake@sample.com', '2.png', 1, 0, '2022-05-17', '2023-03-23'),
(3, 'Samantha Jane', 'C', 'Miller', 'sam23@gmail.com', '3.png', 1, 0, '2022-05-18', '2023-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `tutor_meta`
--

CREATE TABLE `tutor_meta` (
  `meta_id` int(40) NOT NULL,
  `tutor_id` int(40) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor_meta`
--

INSERT INTO `tutor_meta` (`meta_id`, `tutor_id`, `dob`, `gender`, `contact`, `address`, `speciality`, `description`) VALUES
(1, 1, '1997-06-23', 'Male', '09123456789', '518 Evangelista, Manila, Metro Manila', 'HTML, CSS, JS, Python, PHP, MYSQL, SQLite, AngularJS, and Node.JS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean blandit leo vel quam ultricies ultrices. Nam sit amet arcu diam. Cras in augue tempor, imperdiet ligula scelerisque, aliquet dolor. Nulla interdum mi at justo condimentum, ac euismod tellus s'),
(2, 2, '1997-06-23', 'Female', '09789654123', '26,shukan bunglows b/h setu residency,surat', 'PHP, HTML, CSS, JS, and Python.', 'This is a sample description about myself.\r\n'),
(3, 3, '1997-10-14', 'female', '09654789123 / 098785466', ' 469 Gen. Luna St., Hulong Duhat, Malabon, Metro Manila', 'Grammar, English, Science, and Mathematics', 'Integer a mi quam. Vivamus et purus sed velit laoreet maximus. Suspendisse erat metus, efficitur sit amet blandit a, imperdiet sed sapien. Praesent lacinia, metus vitae mollis pharetra, enim ex laoreet erat, sit amet egestas nisi diam quis nisi. Praesent ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_request`
--
ALTER TABLE `course_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tutor_list`
--
ALTER TABLE `tutor_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutor_meta`
--
ALTER TABLE `tutor_meta`
  ADD UNIQUE KEY `meta_id` (`meta_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_list`
--
ALTER TABLE `course_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_request`
--
ALTER TABLE `course_request`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutor_list`
--
ALTER TABLE `tutor_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
