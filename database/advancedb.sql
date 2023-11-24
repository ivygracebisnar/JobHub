-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 06:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_acc`
--

INSERT INTO `admin_acc` (`id`, `username`, `pword`) VALUES
(1, 'Jilbert', '$2y$10$rZe3n2Zy4pQdmSFgS7ZY4.rP.F1GQvgruTtA7wq6mFiCiDDiXHcPO'),
(2, 'IvyGraceBisnar', '$2y$10$ra9JFvoejuoYuvXxPBDHS.wYUPakDbCxmZWqF1TVwtjC5vbGiyuMi'),
(3, 'admin', '$2y$10$OTiV/xmj75WMORjyr1Opt.AXuYOxBQSwc1Spl1zmpLHPxFHvqmZXO'),
(4, 'admiin123', '$2y$10$dKbnsRKn4P44E7v2aywgIeLTEtqLSVmF42JzxiyImfT5A0TZwEwDS'),
(5, 'hahaha', '$2y$10$vbZDflQl1ik4JzswO8TAwOVTjRiTbxk5Efz6zLWpYCCLpBxa1vRxu'),
(6, 'marie', '$2y$10$/eo1OvYmKsYlHxH7UrS4XumWxMFMph7ATfzgRr4.ZdnL/W504yLWG'),
(7, 'IvyGrace', '$2y$10$sdsnKBhnWg/ApSDvIOSoQupoWxuWTOboIbF/PABf8YkuNNnO/8.oO'),
(8, 'aybiyang', '$2y$10$xcxKwoujV1EiuzbfYvxQa.1g3h4zTA4pFfUeWtqIrF9r3RLZ8CFoW');

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
(2, 'Aldin Diola', 'Diola JobHiring Corp.', 22, 'Southern Leyte', '09986745345', 'diola@gmail.com', '919fac9656308e61ce7815a23703b311', 'aldin.jpg');

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
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobid` int(11) NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `description` varchar(225) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `requirements` varchar(225) DEFAULT NULL,
  `salary` varchar(225) DEFAULT NULL,
  `posteddate` date DEFAULT NULL,
  `employer_id` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobid` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `requirements` varchar(100) DEFAULT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `posteddate` date DEFAULT NULL,
  `employer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobid`, `title`, `description`, `location`, `requirements`, `salary`, `posteddate`, `employer_id`) VALUES
(1, 'Programmer', 'Programming', 'SLSU-TO', 'PHP, HTML, CSS, etc.', '100 pesos', '2023-11-16', 1),
(2, 'System Analyst', 'Analyst', 'SLSU-TO', 'Can do the job.', '100 pesos', '2023-11-16', 1),
(3, 'Tester', 'For Group 4', 'SLSU-TO', 'Can do the job.', '100 pesos', '2023-11-17', 2);

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
(1, 'Ivy Grace Bisnar', 20, 'Sogod', '09488218674', 'Mag overthink 24/7', 'Group 4 Programmer', 'bisnar@gmail.com', 'c57c2051a6033255bbf57ee4b71b844d', 'ivy.jpg', 'I am a highly motivated and detail-oriented individual with a passion for web development and design. I have experience in front-end technologies such as HTML, CSS, and JavaScript, and I am eager to learn new technologies and frameworks.'),
(2, 'Daisy Decio', 19, 'Libagon', '09976789767', 'Magpuyat', 'Group 4 System Analyst', 'decio@gmail.com', '5c0bff34896b3e873480cd4418d35e1d', 'daisy.jpg', 'I am a highly motivated with a passion for drinking tanduay :)'),
(3, 'Marivic Pieza', 21, 'Malitbog', '09125490738', 'lezgo', 'Group 4 Tester', 'pieza@gmail.com', '19b3f1ec9854fff706c4fff7d9456dbe', 'marivic.jpg', 'No choice');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fileid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobid`),
  ADD KEY `employer_id` (`employer_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobid`),
  ADD KEY `employer_id` (`employer_id`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `fileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jobid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobseeker`
--
ALTER TABLE `jobseeker`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`id`) REFERENCES `jobseeker` (`id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`employer_id`) REFERENCES `employers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
