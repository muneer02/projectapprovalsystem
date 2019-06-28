-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2019 at 05:23 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `guide_id` int(10) UNSIGNED NOT NULL,
  `department` varchar(15) NOT NULL,
  `session` char(4) NOT NULL,
  `synopsis` varchar(70) DEFAULT NULL,
  `documentation` varchar(70) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `group_id`, `guide_id`, `department`, `session`, `synopsis`, `documentation`, `approved`, `created_at`, `updated_at`) VALUES
(1, 'synopsis approval', 'online approval system for synopsis', 9, 22, 'COMPUTER', '2016', 'files/synopsis/synopsis approval - 5d11e57b4eb86.pdf', 'files/documentation/synopsis approval - 5d11e57b4f725.pdf', 0, '2019-06-25 09:12:27', '2019-06-25 09:12:27'),
(2, 'smart farming', 'automation of farming system', 10, 10, 'COMPUTER', '2016', 'files/synopsis/smart farming - 5d11e630849f0.pdf', 'files/documentation/smart farming - 5d11e63084d7c.pdf', 0, '2019-06-25 09:15:28', '2019-06-25 09:15:28'),
(3, 'emotion detection system', 'emotions detected by AI', 11, 9, 'COMPUTER', '2016', 'files/synopsis/emotion detection system - 5d11e6dce32af.pdf', 'files/documentation/emotion detection system - 5d11e6dce3c86.pdf', 0, '2019-06-25 09:18:20', '2019-06-25 09:18:20'),
(4, 'website generator', 'website generator for static websites', 12, 23, 'COMPUTER', '2016', 'files/synopsis/website generator - 5d11e74486786.pdf', 'files/documentation/website generator - 5d11e74486b40.pdf', 0, '2019-06-25 09:20:04', '2019-06-25 09:20:04'),
(5, 'text summariazation', 'summarises the similar text', 13, 9, 'COMPUTER', '2016', 'files/synopsis/text summariazation - 5d11e86a00d66.pdf', 'files/documentation/text summariazation - 5d11e86a0111a.pdf', 0, '2019-06-25 09:24:58', '2019-06-25 09:24:58'),
(6, 'tumour detection', 'tumour detected through AI', 14, 10, 'COMPUTER', '2016', 'files/synopsis/tumour detection - 5d11e8cfd9ae9.pdf', 'files/documentation/tumour detection - 5d11e8cfd9e96.pdf', 0, '2019-06-25 09:26:39', '2019-06-25 09:26:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `synopsis` (`synopsis`),
  ADD UNIQUE KEY `documentation` (`documentation`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `guide_id` (`guide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`guide_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
