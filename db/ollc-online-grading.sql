-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2022 at 05:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ollc-online-grading`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `f_1` varchar(11) NOT NULL,
  `f_2` int(11) NOT NULL,
  `f_3` int(11) NOT NULL,
  `f_4` int(11) NOT NULL,
  `e_1` int(11) NOT NULL,
  `e_2` int(11) NOT NULL,
  `e_3` int(11) NOT NULL,
  `e_4` int(11) NOT NULL,
  `s_1` int(11) NOT NULL,
  `s_2` int(11) NOT NULL,
  `s_3` int(11) NOT NULL,
  `s_4` int(11) NOT NULL,
  `m_1` int(11) NOT NULL,
  `m_2` int(11) NOT NULL,
  `m_3` int(11) NOT NULL,
  `m_4` int(11) NOT NULL,
  `h_1` int(11) NOT NULL,
  `h_2` int(11) NOT NULL,
  `h_3` int(11) NOT NULL,
  `h_4` int(11) NOT NULL,
  `p_1` int(11) NOT NULL,
  `p_2` int(11) NOT NULL,
  `p_3` int(11) NOT NULL,
  `p_4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `user_id`, `f_1`, `f_2`, `f_3`, `f_4`, `e_1`, `e_2`, `e_3`, `e_4`, `s_1`, `s_2`, `s_3`, `s_4`, `m_1`, `m_2`, `m_3`, `m_4`, `h_1`, `h_2`, `h_3`, `h_4`, `p_1`, `p_2`, `p_3`, `p_4`) VALUES
(20, '78', '78', 0, 0, 0, 80, 0, 0, 0, 91, 0, 0, 0, 76, 0, 0, 0, 85, 0, 0, 0, 84, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(11) NOT NULL,
  `student_email` varchar(150) NOT NULL,
  `from` varchar(150) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `student_email`, `from`, `message`) VALUES
(3, 'renz@yahoo.com', 'teacher@yahoo.com', '70 grade mo'),
(4, 'Cart@Yahoo.Com', 'teacher@yahoo.com', 'Nice student');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `f_name` varchar(250) NOT NULL,
  `l_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `grade` varchar(150) NOT NULL,
  `status` varchar(100) NOT NULL,
  `card` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `f_name`, `l_name`, `email`, `password`, `grade`, `status`, `card`) VALUES
(78, 'cart', 'zy', 'cart@yahoo.com', 'cart', 'Grade 2', 'student', 'RECORDED');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `f_name` varchar(250) NOT NULL,
  `l_name` varchar(250) NOT NULL,
  `email_teacher` varchar(250) NOT NULL,
  `password_teacher` varchar(250) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `f_name`, `l_name`, `email_teacher`, `password_teacher`, `status`) VALUES
(48, 'felix', 'delacruz', 'felix@yahoo.com', 'felix123', 'teacher'),
(49, 'saitama', 'jun', 'teacher@yahoo.com', 'teacher', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `status` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `status`, `email`, `password`) VALUES
(6, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
