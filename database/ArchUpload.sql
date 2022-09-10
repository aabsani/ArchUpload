-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 28, 2019 at 01:08 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ArchUpload`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_project`
--

CREATE TABLE `add_project` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `student_user_name` varchar(100) NOT NULL,
  `project_title` varchar(256) NOT NULL,
  `project_file` text NOT NULL,
  `project_description` text NOT NULL,
  `submit_time` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_project`
--

INSERT INTO `add_project` (`id`, `student_id`, `student_user_name`, `project_title`, `project_file`, `project_description`, `submit_time`) VALUES
(17, 3, 'dametime', 'Web Application', 'project_file/bf2bbd27dbbfe8b95a2cc3815b0ae0d0fusion-web_Free06-10-2018_1026578226.zip', 'web project using php', '17, April '),
(22, 4, 'Sgt123', 'Pillars', 'project_file/50157de7a074104daf7947c7eb065e78CSE101_mindset.xlsx', 'Testing1234', '9, May 2019, 3:27 pm'),
(23, 3, 'dametime', 'Ajnjnjn', 'project_file/b383dbfa36d09cb89c0d9ba5e8abd3245575_1_2018-2019_BAHAR_LISANS_FINAL_PROGRAMI_SILE_08.05.2019-2.xlsx', 'dkdkmdkme', '9, May 2019, 4:26 pm'),
(24, 2, 'joel.embiid@isik.edu.tr', 'OOP', 'project_file/85984e7082c449c5a0d0f01100ac353aHSS220 grades.pdf', 'This is another test', '24, May 2019, 3:33 pm');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `contact` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `user_name`, `password`, `email`, `contact`) VALUES
(1, 'Abdulwahab', 'Sani', 'abdul', '123456', 'abdulwahab.sani@isik.edu.tr', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `assign_student`
--

CREATE TABLE `assign_student` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date_line` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_student`
--

INSERT INTO `assign_student` (`id`, `student_id`, `teacher_id`, `date_line`) VALUES
(18, 3, 1, '2019-04-30'),
(20, 4, 1, ''),
(22, 2, 1, ''),
(28, 0, 1, ''),
(24, 7, 2, '15-11-2019');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `student_id` varchar(200) NOT NULL,
  `project_id` varchar(200) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`id`, `teacher_id`, `student_id`, `project_id`, `mark`, `comment`) VALUES
(2, '1', '3', '17', '80', 'You need to improve your project.\r\nThank you.'),
(3, '1', '4', '22', '55', 'Come to my office to improve this.'),
(4, '1', '3', '17', '70', 'Good job.'),
(6, '1', '3', '23', '44', 'Upload Again'),
(7, '1', '2', '24', '60', 'sijifjfijfiejef');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(5) NOT NULL,
  `suser_name` varchar(100) NOT NULL,
  `duser_name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `message_read` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `suser_name`, `duser_name`, `title`, `message`, `message_read`) VALUES
(8, 'abdul', 'jojo', 'Project', 'Upload your project!', 'y'),
(9, 'abdul', 'jojo', 'Deadline', 'Deadline is approaching', 'n'),
(18, 'jane', 'Sgt123', 'Deadline', 'Deadline is approaching.', 'y'),
(19, 'abdul', 'dametime', 'kjkjkjkj', 'gghghghg', 'y'),
(20, 'jane.poison@isik.edu.tr', 'dametime', '', '', 'n'),
(21, 'abdulwahab.sani@isik.edu.tr', 'jojo', 'Grades', 'Check your grades.', 'n'),
(22, 'abdulwahab.sani@isik.edu.tr', 'dametime', 'Grades', 'Check your grades.', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `id` int(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `student_num` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_registration`
--

INSERT INTO `student_registration` (`id`, `first_name`, `last_name`, `user_name`, `password`, `email`, `student_num`, `status`) VALUES
(2, 'Joel', 'Embiid', 'jojo', '123456', 'joel.embiid@isik.edu.tr', '212cs1341', 'Active'),
(3, 'Damian', 'Lillard', 'dametime', '123456', 'dame.lillard@isik.edu.tr', '214cs2312', 'Active'),
(4, 'Skol', 'Garret', 'Sgt123', 'pass123', 'Sgt.garret@isik.edu.tr', '213ce2356', 'Active'),
(5, 'Kolo', 'Toure', 'kolo', '123456', 'jajbjdabjdabj@gmail.com', '21827Cs272', 'Active'),
(7, 'Nikola', 'Jokic', 'joker', '123456', 'nikola.jokic@isik.edu.tr', '217BM1234', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_registration`
--

CREATE TABLE `teacher_registration` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `isjury` tinyint(4) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_registration`
--

INSERT INTO `teacher_registration` (`id`, `first_name`, `last_name`, `user_name`, `password`, `email`, `isjury`, `status`) VALUES
(1, 'Jane', 'Poison', 'jane', '123456', 'jane.poison@isik.edu.tr', 1, 'Active'),
(2, 'Payne', 'Helsinki', 'pain', '123456', 'payne.helsinki@isik.edu.tr', 0, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_project`
--
ALTER TABLE `add_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_student`
--
ALTER TABLE `assign_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_registration`
--
ALTER TABLE `teacher_registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_project`
--
ALTER TABLE `add_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assign_student`
--
ALTER TABLE `assign_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `student_registration`
--
ALTER TABLE `student_registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teacher_registration`
--
ALTER TABLE `teacher_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
