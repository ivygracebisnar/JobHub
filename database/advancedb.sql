-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 03:51 PM
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
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `employeeid` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `contactname` varchar(50) DEFAULT NULL,
  `companyname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`employeeid`, `file`, `contactname`, `companyname`, `email`, `phone`, `address`) VALUES
(1, '653b391455a01.jpg', 'Jilbert C. Bati-on', 'Jilooooo', 'jilo@gmail.com', '09984532767', 'Matalom. Leyte'),
(2, '653b39d0b3be8.jpg', 'Aldin Diola', 'Diola Shop', 'diola@gmail.com', '09657845567', 'Southern Leyte');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobid` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `requirements` varchar(255) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `posteddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobid`, `title`, `description`, `location`, `requirements`, `salary`, `posteddate`) VALUES
(1, 'Project Manager', 'For School Purposes', 'SLSU-TO', 'Leadership Skills', '₱5k/month', '2023-10-10'),
(2, 'Programmer', 'For School Purposes', 'SLSU-TO', 'Knows any language', '₱7k/month', '2023-10-10'),
(3, 'System Analyst', 'For School Purposes', 'SLSU-TO', 'Good at analyzing', '₱6k/month', '2023-10-10'),
(4, 'Tester', 'For School Purposes', 'SLSU-TO', 'Good at debugging', '₱6k/month', '2023-10-10'),
(5, 'QA', 'For School Purposes', 'SLSU-TO', 'Good at answering question', '₱5k/month', '2023-10-10');

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
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`id`, `name`, `age`, `address`, `phone`, `skills`, `experience`, `email`, `password`, `image`) VALUES
(1, 'Ivy Grace Bisnar', 20, 'Sogod', '09488218674', 'Mag overthink 24/7', 'Group 4 Programmer', 'bisnar@gmail.com', 'c57c2051a6033255bbf57ee4b71b844d', 'ivy.jpg'),
(2, 'Daisy Decio', 19, 'Libagon', '09976789767', 'Magpuyat', 'Group 4 System Analyst', 'decio@gmail.com', '5c0bff34896b3e873480cd4418d35e1d', 'daisy.jpg'),
(3, 'Marivic Pieza', 21, 'Malitbog', '09125490738', 'lezgo', 'Group 4 Tester', 'pieza@gmail.com', '19b3f1ec9854fff706c4fff7d9456dbe', 'marivic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jobseekers`
--

CREATE TABLE `jobseekers` (
  `userid` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `skills` varchar(50) DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseekers`
--

INSERT INTO `jobseekers` (`userid`, `file`, `name`, `email`, `phone`, `address`, `skills`, `experience`) VALUES
(654, '653b3360c489d.jpg', 'Ivy Grace R. Bisnar', 'acaronar7@gmail.com', '09488218674', 'Sogod, Southern Leyte', 'Programming', 'Programmer'),
(655, '653b353395809.jpg', 'Marivic Pieza', 'piezamarivic@gmail.com', '09348723987', 'Southern Leyte', 'Tester', 'Tester'),
(656, '653b3a5943b0e.jpg', 'Daisy B. Decio', 'decio@gmail.com', '09056787123', 'Libagon, Southern Leyte', 'System Analyst', 'System Analyst');

-- --------------------------------------------------------

--
-- Table structure for table `job_acc`
--

CREATE TABLE `job_acc` (
  `jobid` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `pword` varchar(255) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_acc`
--

INSERT INTO `job_acc` (`jobid`, `username`, `pword`, `userid`) VALUES
(1, 'aybiyang', '$2y$10$nSgTrCshZmnzziVX05qX0.E3jNAosQZAtaj96ZJzx31DXS8Bl4732', 654),
(2, 'pieza', '$2y$10$yHye..khXEIwz/T5lH/5quBd0UiCb86mltMykMSP7Xo33a1Xpe9Em', 655),
(3, 'decio', '$2y$10$6pcEQTs0TT418b2ckR/Mg.hSMAWkGOzvwfyryEx067d7LaMz3opq6', 656);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`employeeid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobid`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobseekers`
--
ALTER TABLE `jobseekers`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `job_acc`
--
ALTER TABLE `job_acc`
  ADD PRIMARY KEY (`jobid`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `employeeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobseeker`
--
ALTER TABLE `jobseeker`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobseekers`
--
ALTER TABLE `jobseekers`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=657;

--
-- AUTO_INCREMENT for table `job_acc`
--
ALTER TABLE `job_acc`
  MODIFY `jobid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_acc`
--
ALTER TABLE `job_acc`
  ADD CONSTRAINT `job_acc_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `jobseekers` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
