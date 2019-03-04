-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: Mar 03, 2019 at 04:22 PM
-- Server version: 5.7.25
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DbWorkExample`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(10) UNSIGNED NOT NULL,
  `pub_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `pub_date`, `img`, `title`, `description`) VALUES
(1, '2019-02-27 07:47:58', '../storage/at193.png', 'Basecamp', 'From 37signals. Basecamp is a unique project collaboration tool. Projects don\'t fail from a lack of charts, graphs, or reports, they fail from a lack of communication and collaboration. Basecamp makes it simple to communicate and collaborate on projects. The Basecamp API is implemented as vanilla XML over HTTP. '),
(2, '2019-02-27 07:47:59', '../storage/at5541.png', 'newasdasdsad', 'Define a description Define a description Define a description Define a description Define a description '),
(3, '2019-02-27 07:47:59', '../storage/icon_intellinote.png', 'Intellinote', 'The Intellinote API allows developers to create, modify, and retrieve their workspaces, notes, tasks, tags, files, forms, and users from the Intellinote platform. Intellinote is a collaboration and project management service for businesses. It can be used to capture and document work items as well as manage task assignments and due dates. A sandbox environment is provided for developing and testing applications that use Intellinote\'s features. '),
(4, '2019-02-27 07:47:59', '../storage/at7450.png', 'Worasasaksnaps', 'The service provides task management and time-tracking functions to improve process management and activity reporting. It allows remote monitoring of task completion via shared screen images and logs of actions measurable against time schedules and objectives. The system generates reports of monitored activities, either undertaken within the service itself or performed by other applications integrated to log their actions in the service. API methods support listing and updating pre-defined projects, definition of tasks and assignment to specific users, and management of user accounts including activity breakdowns over time. In addition to automated tracking, methods support manual time entry as well as generation of reports against tracking data. '),
(5, '2019-02-27 07:47:59', '../storage/at230.png', 'Redbooth', 'Redbooth is a collaboration and communication platform with a publicly available API with the following key features: (1) OAuth support (2) Flat structure, both in the input and output (3) Supports pagination and partial response for enhanced performance (4) Specific error reporting (5) Developer portal with full documentation and a testing console (6) Code snippets to quick-start developers'),
(65, '2019-03-03 12:40:52', 'at230.png', 'new', 'weqwewq'),
(66, '2019-03-03 12:55:45', '/var/www/html/TagBeSill/storage//at5541.png', 'new', 'weqwewq'),
(67, '2019-03-03 12:56:45', '../storage//at5541.png', 'new', 'weqwewq');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(2, 'test', '$2y$10$KJXJ26qfbHpcwy7pfjD7E.Pq.wd54AmSHLRfj/H.xZ1RZVGpbSGTy', '2019-03-02 22:37:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `pub_date` (`pub_date`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
