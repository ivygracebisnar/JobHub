-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 07:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advancedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'Ivy Grace Bisnar', 'bisnar@gmail.com', 'c57c2051a6033255bbf57ee4b71b844d', 'ivy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_activity_log`
--

CREATE TABLE `admin_activity_log` (
  `log_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `activity_type` varchar(50) DEFAULT NULL,
  `activity_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` int(100) NOT NULL,
  `emp_name` varchar(100) DEFAULT NULL,
  `comp_name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `emp_name`, `comp_name`, `age`, `address`, `phone`, `email`, `password`, `image`) VALUES
(1, 'Jilbert Bati-on', 'Jiloooo', 22, 'Matalom', '09785678890', 'jilo@gmail.com', 'cee1ac444f27c1ce9dcc76690a43ff9d', 'jilo.jpg'),
(2, 'Aldin Diola', 'Diola JobHiring Corp.', 22, 'Southern Leyte', '09986745345', 'diola@gmail.com', '919fac9656308e61ce7815a23703b311', 'aldin.jpg'),
(3, 'Daniel Padilla', 'Padilla Inc.', 28, 'Sogod', '09098978989', 'daniel@gmail.com', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 'daniel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employers_activity_log`
--

CREATE TABLE `employers_activity_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity_type` varchar(50) DEFAULT NULL,
  `activity_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employers_activity_log`
--

INSERT INTO `employers_activity_log` (`log_id`, `user_id`, `activity_type`, `activity_timestamp`) VALUES
(1, 3, 'Login Successfully', '2023-12-05 04:14:09'),
(2, 3, 'Job Posted Successfully', '2023-12-05 04:42:09'),
(3, 3, 'Job Posted Successfully', '2023-12-05 04:44:09'),
(12, 3, 'Login Successfully', '2023-12-05 06:25:30');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `fileid` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `file_path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fileid`, `id`, `file_name`, `file_path`) VALUES
(1, 2, 'daisy.pdf', '../uploads/'),
(2, 1, 'ivy.pdf', '../uploads/'),
(3, 3, 'pieza.pdf', '../uploads/');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `jobid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `posteddate` date DEFAULT NULL,
  `employer_id` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`jobid`, `title`, `description`, `location`, `requirements`, `salary`, `posteddate`, `employer_id`, `active`) VALUES
(1, 'Programmer', 'Hiring Programmer for our group project.', 'SLSU-TO', 'Programming Skills', '30 pesos per hour', '2023-12-05', 3, 1),
(2, 'Atang sa Gate', 'Atangan sa gate job, atang ra gud', 'SNHS', 'Fighting Skills', '500 pesos', '2023-12-05', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `skills` varchar(100) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `summary` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`id`, `name`, `age`, `address`, `phone`, `skills`, `experience`, `email`, `password`, `image`, `summary`) VALUES
(1, 'Ivy Grace Bisnar', 20, 'Olisihan, Sogod, Southern Leyte', '09488218674', 'Mag overthink 24/7', 'Group 4 Programmer', 'bisnar@gmail.com', 'c57c2051a6033255bbf57ee4b71b844d', 'ivy.jpg', 'Ako\'y pagod na, thank you.'),
(2, 'Daisy Decio', 19, 'Otikon, Libagon, Southern Leyte', '09976789767', 'Magpuyat', 'Group 4 System Analyst', 'decio@gmail.com', '5c0bff34896b3e873480cd4418d35e1d', 'daisy.jpg', 'I am a highly motivated with a passion for drinking tanduay :)'),
(3, 'Marivic Pieza', 21, 'Maujo, Malitbog, Southern Leyte', '09125490738', 'lezgo', 'Group 4 Tester', 'pieza@gmail.com', '19b3f1ec9854fff706c4fff7d9456dbe', 'marivic.jpg', 'No choice'),
(4, 'Charlyn Borong', 21, 'Sta. Paz, Matalom, Leyte', '09983456767', 'Good Communication Skills', 'Tester', 'borong@gmail.com', 'f5b44af9079086fbb2a1ab9be7632d70', 'charlyn.jpg', 'Hello, it\'s me.'),
(5, 'Ann Kristil Concillado', 22, 'Candayuman, Liloan, Southern Leyte', '09965676424', 'Cooking Skills', 'Cooking', 'concillado@gmail.com', '528367dd1c321e29b390611ad8d0af77', 'annkristil.jpeg', 'Mapagmahal'),
(6, 'Cathy Rose Arco', 21, 'Olisihan, Sogod, Southern Leyte', '09357612809', 'Watching BL all day', 'Umiyak sa thai series', 'arco@gmail.com', 'afe832c166f4903465406aaa39350779', 'cathy.jpg', 'BL Series'),
(7, 'Cherry Mae Revilla', 20, 'Olisihan, Sogod, Southern Leyte', '09127068001', 'Bumalik sa ex', 'Umiyak', 'mae@gmail.com', '00580efdf9d27a169d296a4b5de7a735', 'mae.jpg', 'Can work under pressure.'),
(8, 'Thirdy Arco', 14, 'Olisihan, Sogod, Southern Leyte', '09751232435', 'ML Player', 'Mythic Rank', 'thirdy@gmail.com', '3bf3afb73e2b807361e1d37215849de0', 'thirdy.jpg', 'Kaya kang buhatin papuntang Mythical Glory'),
(9, 'Lovely Magallano', 19, 'Olisihan, Sogod, Southern Leyte', '09751212343', 'Tagay', 'Tagay 24/7', 'lovely@gmail.com', 'cac833d2935427f349ac26abffd1639e', 'lovely.webp', 'What a nice'),
(10, 'Kim Arco', 20, 'Olisihan, Sogod, Southern Leyte', '09987656345', 'Pianist', 'NTB Pianist', 'kim@gmail.com', '78a6d0196786eab5feea8b32094cce6e', 'kim.webp', 'Future Nurse'),
(11, 'Bea Ignacio', 17, 'Rizal, Sogod, Southern Leyte', '09057005234', 'Pianist', 'JIA Pianist', 'bea@gmail.com', '371b3ac948d5928e52206be791de78f3', 'bea.jpg', 'Grade 12 STEM Student at SNHS'),
(12, 'Kathryn Bernardo', 27, 'Sogod', '09063498101', 'Forgiving', '11 years', 'kath@gmail.com', '6095c9e151f8d59cf6b2ee83a386e0bb', 'kathryn.jpeg', 'KathNiel no more');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_activity_log`
--

CREATE TABLE `jobseeker_activity_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `activity_type` varchar(50) DEFAULT NULL,
  `activity_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker_activity_log`
--

INSERT INTO `jobseeker_activity_log` (`log_id`, `user_id`, `activity_type`, `activity_timestamp`) VALUES
(4, 12, 'Login', '2023-12-05 05:15:17'),
(5, 12, 'Login', '2023-12-05 06:27:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers_activity_log`
--
ALTER TABLE `employers_activity_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fileid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`jobid`),
  ADD KEY `employer_id` (`employer_id`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseeker_activity_log`
--
ALTER TABLE `jobseeker_activity_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employers_activity_log`
--
ALTER TABLE `employers_activity_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `fileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `jobid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobseeker`
--
ALTER TABLE `jobseeker`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobseeker_activity_log`
--
ALTER TABLE `jobseeker_activity_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  ADD CONSTRAINT `admin_activity_log_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `employers_activity_log`
--
ALTER TABLE `employers_activity_log`
  ADD CONSTRAINT `employers_activity_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `employers` (`id`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`id`) REFERENCES `jobseeker` (`id`);

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`);

--
-- Constraints for table `jobseeker_activity_log`
--
ALTER TABLE `jobseeker_activity_log`
  ADD CONSTRAINT `jobseeker_activity_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `jobseeker` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
