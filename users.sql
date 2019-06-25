-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 10:54 AM
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
-- Database: `project_approval_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(30) NOT NULL,
  `gender` char(1) NOT NULL,
  `department` varchar(15) NOT NULL,
  `semester` char(1) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` char(10) NOT NULL,
  `registration_no` varchar(20) DEFAULT NULL,
  `password` varchar(40) NOT NULL,
  `role` varchar(7) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `dob`, `address`, `gender`, `department`, `semester`, `email`, `mobile`, `registration_no`, `password`, `role`, `approved`, `group_id`, `created_at`, `updated_at`) VALUES
(3, 'Mohsin Altaf', '1987-01-01', 'Srinagar', 'M', 'COMPUTER', '', 'mohsin@gmail.com', '9906123456', '', 'e10adc3949ba59abbe56e057f20f883e', 'HOD', 1, 0, '2019-06-15 23:30:03', '2019-06-16 01:41:35'),
(4, 'Muneer Mushtaq', '1994-01-02', 'Bijbehara', 'M', 'COMPUTER', '6', 'rahmunir@gmail.com', '7006894302', '16045113002', '00b7691d86d96aebd21dd9e138f90840', 'STUDENT', 1, 9, '2019-06-15 23:31:36', '2019-06-21 21:02:16'),
(6, 'Aamir Mushtaq', '1994-02-02', 'Ashmuqam', 'M', 'COMPUTER', '6', 'khadimaamir@gmail.com', '9697844350', '16045113013', '7b19de6d4d54999531beb27f758f71f6', 'STUDENT', 1, 10, '2019-06-16 00:20:16', '2019-06-21 21:03:37'),
(7, 'Neha Iqbal', '1994-04-02', 'Dialgam', 'F', 'COMPUTER', '6', 'neha@gmail.com', '9900123456', '16045113024', 'c17ed7d7e2d8a60c78c715e165fe3c38', 'STUDENT', 1, 10, '2019-06-16 00:22:39', '2019-06-21 21:03:43'),
(8, 'Zarafshaan Yousf', '1994-05-02', 'Seer-hamdan', 'F', 'COMPUTER', '6', 'zarafshaan@gmail.com', '9900123456', '16045113024', 'eac33da6fb1be3838fe2b18f20ed496b', 'STUDENT', 1, 9, '2019-06-16 00:24:51', '2019-06-21 21:03:21'),
(9, 'Mohammad Mudasir', '1987-05-02', 'Srinagar', 'M', 'COMPUTER', '', 'mudasir@gmail.com', '9900123000', '', '733d7be2196ff70efaf6913fc8bdcabf', 'TEACHER', 0, 0, '2019-06-16 00:43:15', '2019-06-16 01:42:02'),
(10, 'Manzoor Ahamd', '1987-05-02', 'Ashmuqam', 'M', 'COMPUTER', '', 'manzoor@gmail.com', '9900123012', '', 'c8837b23ff8aaa8a2dde915473ce0991', 'TEACHER', 0, 0, '2019-06-16 00:45:49', '2019-06-16 00:45:49'),
(11, 'Iqra', '1994-06-01', 'Pampore', 'F', 'COMPUTER', '6', 'iqra@gmail.com', '9999000000', '16045113009', 'b8fb0ca57132590369346de4494cb296', 'STUDENT', 1, 13, '2019-06-16 01:09:52', '2019-06-21 21:06:21'),
(12, 'Yasir', '1994-07-01', 'Kulgam', 'M', 'COMPUTER', '6', 'yasir@gmail.com', '9999000005', '16045113005', '4aec381049020b69cf1b0286d82dae20', 'STUDENT', 1, 16, '2019-06-16 01:11:37', '2019-06-24 18:24:09'),
(13, 'Rayees', '1994-08-01', 'Anantnag', 'M', 'COMPUTER', '6', 'rayees@gmail.com', '9999000004', '16045113004', 'fb486b56434f22c70ac659ed1ac6cf06', 'STUDENT', 1, 13, '2019-06-16 01:12:35', '2019-06-21 21:17:16'),
(14, 'Arooja', '1994-09-01', 'Sangam', 'F', 'COMPUTER', '6', 'arooja@gmail.com', '9999000003', '16045113003', '160e40d8c289a3b332b4aef83893421c', 'STUDENT', 1, 12, '2019-06-16 01:15:22', '2019-06-22 05:58:04'),
(15, 'Arshee', '1994-01-02', 'Pampore', 'F', 'COMPUTER', '6', 'arshee@gmail.com', '9999000008', '16045113008', '0276cbf4fbfedd53ba48720a58df77e3', 'STUDENT', 1, 14, '2019-06-16 01:17:19', '2019-06-22 05:48:31'),
(16, 'Saqib', '1994-01-03', 'Kupwara', 'M', 'COMPUTER', '6', 'saqib@gmail.com', '9999000017', '16045113017', 'e3ceb5881a0a1fdaad01296d7554868d', 'STUDENT', 1, 0, '2019-06-16 01:18:49', '2019-06-16 01:18:49'),
(17, 'Bazil', '1994-01-04', 'Kupwara', 'M', 'COMPUTER', '6', 'bazil@gmail.com', '9999000016', '16045113016', '731982a033a5cc815ac03c8504abb748', 'STUDENT', 1, 0, '2019-06-16 01:19:49', '2019-06-16 01:19:49'),
(18, 'Waseem', '1994-01-05', 'Kupwara', 'M', 'COMPUTER', '6', 'waseem@gmail.com', '9999000018', '16045113018', 'ce0bbe4d9406b2ecf0a768aed8527f69', 'STUDENT', 1, 0, '2019-06-16 01:21:20', '2019-06-16 01:21:20'),
(19, 'Zahid', '1994-01-06', 'Tral', 'M', 'COMPUTER', '6', 'zahid@gmail.com', '9999000010', '16045113010', 'ec1e7077d02cb3dbd61ab73018c4a319', 'STUDENT', 1, 14, '2019-06-16 01:26:28', '2019-06-22 05:48:43'),
(20, 'Shafia', '1994-01-07', 'Anantnag', 'F', 'COMPUTER', '6', 'shafia@gmail.com', '9999000011', '16045113011', 'df8f1f26fe5bc08f3810c232ab018b32', 'STUDENT', 1, 0, '2019-06-16 01:28:01', '2019-06-16 01:28:01'),
(21, 'Majid', '1994-01-08', 'Kulgam', 'M', 'COMPUTER', '6', 'majid@gmail.com', '9999000015', '16045113015', 'e3750176efac9d842af7439a8e0e3a7e', 'STUDENT', 1, 11, '2019-06-16 01:31:19', '2019-06-22 05:48:55'),
(22, 'Hilal Hyder', '1987-01-08', 'Anantnag', 'M', 'COMPUTER', '', 'hilal@gmail.com', '9999000087', '', '4297f44b13955235245b2497399d7a93', 'TEACHER', 0, 0, '2019-06-16 01:33:29', '2019-06-16 01:33:29'),
(23, 'Abid Hussain', '1987-01-09', 'Srinagar', 'M', 'COMPUTER', '', 'abid@gmail.com', '9999000123', '', '93279e3308bdbbeed946fc965017f67a', 'TEACHER', 0, 0, '2019-06-16 01:38:14', '2019-06-16 01:38:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
