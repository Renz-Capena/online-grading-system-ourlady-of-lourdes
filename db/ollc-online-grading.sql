-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 11:19 AM
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
(4, '2', '75', 0, 0, 0, 75, 0, 0, 0, 75, 0, 0, 0, 75, 0, 0, 0, 75, 0, 0, 0, 75, 0, 0, 0);

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
(1, 'Susanna', 'Tampin', 'stampin0@shinystat.com', 'KDlfzUf6RM4a', 'Grade 3', 'student', 'RECORDED'),
(2, 'Mischa', 'Ulrik', 'mulrik1@psu.edu', 'SyJd5gM', 'Grade 2', 'student', 'RECORDED'),
(3, 'Rowland', 'Linn', 'rlinn2@ovh.net', 'oo5bd7VUG', 'Grade 1', 'student', 'NO RECORD'),
(4, 'Calley', 'Christophe', 'cchristophe3@bloglovin.com', 'rwHIrs8ypgYV', 'Grade 3', 'student', 'RECORDED'),
(5, 'Tim', 'Catonne', 'tcatonne4@java.com', 'mSVx5IAlEF4m', 'Grade 2', 'student', 'NO RECORD'),
(6, 'Finlay', 'Rishman', 'frishman5@nsw.gov.au', 'BJrQruKft4', 'Grade 4', 'student', 'NO RECORD'),
(7, 'Nestor', 'Brownbridge', 'nbrownbridge6@ameblo.jp', 'FiWtH9dxherG', 'Grade 1', 'student', 'NO RECORD'),
(8, 'Nora', 'Mariault', 'nmariault7@cbslocal.com', '2mJZHUc', 'Grade 1', 'student', 'NO RECORD'),
(9, 'Maureene', 'Herrero', 'mherrero8@mozilla.com', 'dXPhmaLd', 'Grade 1', 'student', 'NO RECORD'),
(10, 'Rabbi', 'Itter', 'ritter9@wix.com', 'Xmtaw7n', 'Grade 6', 'student', 'NO RECORD'),
(11, 'Boris', 'Baal', 'bbaala@comcast.net', 'dAPyfHxuDS21', 'Grade 3', 'student', 'NO RECORD'),
(12, 'Gilemette', 'Kevis', 'gkevisb@imgur.com', 'xA3z3rrVTF', 'Grade 1', 'student', 'NO RECORD'),
(13, 'Freddi', 'McKinney', 'fmckinneyc@posterous.com', 'cRocIc89Sw', 'Grade 3', 'student', 'RECORDED'),
(14, 'Kassia', 'Dionisi', 'kdionisid@ycombinator.com', 'O9E75eyqXDB', 'Grade 3', 'student', 'RECORDED'),
(15, 'Freedman', 'Spriggen', 'fspriggene@si.edu', 'DrxEksy1', 'Grade 4', 'student', 'NO RECORD'),
(16, 'Nataline', 'Bangle', 'nbanglef@so-net.ne.jp', '80kRqi6j', 'Grade 3', 'student', 'NO RECORD'),
(17, 'Allyson', 'Haseman', 'ahasemang@ow.ly', '55Y3bDK1oF', 'Grade 2', 'student', 'RECORDED'),
(18, 'Maxine', 'Kirkebye', 'mkirkebyeh@census.gov', 'Zmzra17el', 'Grade 4', 'student', 'RECORDED'),
(19, 'Baron', 'Dunsmuir', 'bdunsmuiri@npr.org', 'M7SDsL6T', 'Grade 5', 'student', 'NO RECORD'),
(20, 'Glenna', 'Kensitt', 'gkensittj@archive.org', '4rUC6zbgyVh', 'Grade 4', 'student', 'RECORDED'),
(21, 'Nananne', 'Stuehmeyer', 'nstuehmeyerk@nhs.uk', '6W5zEBsnA', 'Grade 2', 'student', 'RECORDED'),
(22, 'Tirrell', 'Bagworth', 'tbagworthl@symantec.com', 'RBO9q6', 'Grade 1', 'student', 'NO RECORD'),
(23, 'Leoline', 'Dozdill', 'ldozdillm@businessinsider.com', 'yX0Xgu5NjTOr', 'Grade 3', 'student', 'RECORDED'),
(24, 'Leeland', 'Offener', 'loffenern@house.gov', 'iuZfMitj', 'Grade 1', 'student', 'NO RECORD'),
(25, 'Ameline', 'Geertsen', 'ageertseno@hao123.com', 'x3q0BY', 'Grade 4', 'student', 'NO RECORD'),
(26, 'Sara-ann', 'Sumshon', 'ssumshonp@google.cn', 'WPBDbwuh5FD0', 'Grade 4', 'student', 'RECORDED'),
(27, 'Lorenzo', 'Danton', 'ldantonq@linkedin.com', 'djv2lp', 'Grade 1', 'student', 'RECORDED'),
(28, 'Avie', 'Tiddeman', 'atiddemanr@technorati.com', 'rINxzTg', 'Grade 3', 'student', 'NO RECORD'),
(29, 'Caspar', 'Vallow', 'cvallows@illinois.edu', 'jp06cTiD', 'Grade 1', 'student', 'NO RECORD'),
(30, 'Aili', 'Jakaway', 'ajakawayt@smugmug.com', 'S5MxbQTX3UAP', 'Grade 4', 'student', 'NO RECORD'),
(31, 'Xymenes', 'Boyer', 'xboyeru@umich.edu', 'ER44KZwuXRBD', 'Grade 6', 'student', 'NO RECORD'),
(32, 'Mikel', 'Fowlie', 'mfowliev@histats.com', 'sMPLRwb26', 'Grade 3', 'student', 'RECORDED'),
(33, 'Reginauld', 'Cornu', 'rcornuw@uiuc.edu', '8rlkTZpo', 'Grade 5', 'student', 'RECORDED'),
(34, 'Gretal', 'Sidlow', 'gsidlowx@baidu.com', 'HjmNFKRW', 'Grade 1', 'student', 'NO RECORD'),
(35, 'Elva', 'Alentyev', 'ealentyevy@fema.gov', 'vWAVCU82VD', 'Grade 3', 'student', 'NO RECORD'),
(36, 'Cleve', 'Roswarn', 'croswarnz@geocities.com', '9Bs7Qh', 'Grade 1', 'student', 'RECORDED'),
(37, 'Aimee', 'Doe', 'adoe10@nps.gov', 'JAqUGA', 'Grade 5', 'student', 'RECORDED'),
(38, 'Sasha', 'De Bischop', 'sdebischop11@sourceforge.net', 'nlt7Odeiv9gS', 'Grade 1', 'student', 'NO RECORD'),
(39, 'Barby', 'Ronchka', 'bronchka12@sitemeter.com', 'MfGdwYM0W', 'Grade 4', 'student', 'NO RECORD'),
(40, 'Catha', 'Jurick', 'cjurick13@delicious.com', 'U2W1sZ', 'Grade 3', 'student', 'NO RECORD'),
(41, 'Alvy', 'Kruse', 'akruse14@yahoo.co.jp', 'ArYQwf', 'Grade 1', 'student', 'NO RECORD'),
(42, 'Katie', 'Tinson', 'ktinson15@berkeley.edu', 'KvKOHvkrKqN', 'Grade 5', 'student', 'RECORDED'),
(43, 'Nikki', 'Pinnion', 'npinnion16@google.nl', 'J7QufUeG', 'Grade 5', 'student', 'NO RECORD'),
(44, 'Hillier', 'Pullar', 'hpullar17@ycombinator.com', 'Xuf3CQF', 'Grade 6', 'student', 'NO RECORD'),
(45, 'Maible', 'Nodin', 'mnodin18@trellian.com', 'QjKBld5O', 'Grade 4', 'student', 'RECORDED'),
(46, 'Tamra', 'Thing', 'tthing19@nba.com', 'xPGMBu', 'Grade 5', 'student', 'NO RECORD'),
(47, 'Libbie', 'Haslum', 'lhaslum1a@reverbnation.com', '9j6Zl0HN9K4w', 'Grade 6', 'student', 'RECORDED'),
(48, 'Lavinie', 'Ennever', 'lennever1b@list-manage.com', 'EPoXcRh7F9', 'Grade 5', 'student', 'RECORDED'),
(49, 'Davidson', 'Bessell', 'dbessell1c@usda.gov', 'tyRbZDx', 'Grade 2', 'student', 'NO RECORD'),
(50, 'Arty', 'Cann', 'acann1d@drupal.org', 'RQVPOOdDVx0', 'Grade 1', 'student', 'NO RECORD'),
(52, 'John', 'Put', 'student@yahoo.com', 'student', 'Grade 1', 'student', 'RECORDED');

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
(34, 'David', 'Sample', 'teacher@yahoo.com', 'teacher', 'teacher'),
(37, 'James', 'dela cruz', 'juan@yahoo.com', 'juan1234', 'teacher'),
(38, 'kahit', 'ano', 'kahitano@yahoo.com', 'kahitano', 'teacher');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
