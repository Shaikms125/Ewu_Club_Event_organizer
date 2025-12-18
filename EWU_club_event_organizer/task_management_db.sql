-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2025 at 04:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `created_at`) VALUES
(1, 'Programming club', '2025-12-10 17:33:34'),
(2, 'Dance club', '2025-12-11 19:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `club_admins`
--

CREATE TABLE `club_admins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `club_admins`
--

INSERT INTO `club_admins` (`id`, `user_id`, `club_id`) VALUES
(3, 16, 1),
(4, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `club_members`
--

CREATE TABLE `club_members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `club_members`
--

INSERT INTO `club_members` (`id`, `user_id`, `club_id`) VALUES
(4, 13, 1),
(5, 17, 1),
(6, 18, 2),
(7, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `recipient` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `recipient`, `type`, `date`, `is_read`) VALUES
(1, '\'test\' has been assigned to you. Please review and start working on it', 17, 'New Task Assigned', '2025-12-12', 1),
(2, 'Task \'test\' has been updated/assigned to you.', 13, 'Task Updated', '2025-12-12', 1),
(3, '\'test\' has been assigned to you. Please review and start working on it', 17, 'New Task Assigned', '2025-12-12', 1),
(4, '\'test\' has been assigned to you. Please review and start working on it', 17, 'New Task Assigned', '2025-12-12', 1),
(5, '\'dance\' has been assigned to you. Please review and start working on it', 18, 'New Task Assigned', '2025-12-12', 1),
(6, '\'test event\' has been assigned to you. Please review and start working on it', 21, 'New Task Assigned', '2025-12-13', 0),
(7, '\'dada\' has been assigned to you. Please review and start working on it', 23, 'New Task Assigned', '2025-12-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` enum('pending','in_progress','completed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `club_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `due_date`, `status`, `created_at`, `club_id`) VALUES
(30, 'test', 'test', '2025-12-13', 'pending', '2025-12-12 09:57:09', 1),
(31, 'dance', 'dance', '2025-12-14', 'completed', '2025-12-12 09:58:20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `task_assignments`
--

CREATE TABLE `task_assignments` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_assignments`
--

INSERT INTO `task_assignments` (`id`, `task_id`, `user_id`) VALUES
(83, 30, 17),
(84, 31, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','club_member','authority','club_admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `password`, `role`, `created_at`) VALUES
(12, 'Authority Admin', 'authority', '$2y$10$QHbgQTHz3kC0KgvJTFlg6ONdwhS3YlVcMHtEqUeSmQIIocUkae3ru', 'authority', '2025-12-11 13:16:31'),
(13, 'shakur', 'shakur', '$2y$10$gyVQs3Dm0oH2BaOsOV80T.cDMzjnrJn3PYjdqHIHYvBcbsty7MMQu', 'club_member', '2025-12-11 15:12:16'),
(14, 'John', 'john', '$2y$10$hwt6KHzmzJiCGfSGn5wsx.HQZoJbrsaakod2X6c4A8uYReXZkxNnS', 'club_member', '2025-12-11 15:12:24'),
(15, 'baka1', 'baka', '$2y$10$ThNkOQdl97bJ2j5Jm.OqWeAkdF/391JPOpNFYIIrwm1mAMh4JRIEG', 'club_admin', '2025-12-11 15:12:36'),
(16, 'Admin', 'admin', '$2y$10$PWJE5slTuisRfI.vd57o4Og4ub9PIqq1wJY2ZONcjP9UpdXwS/PFO', 'club_admin', '2025-12-11 15:12:47'),
(17, 'shaik ms', 'shaik', '$2y$10$gkmtfMUjT58D5EqlmrnRKeIU8TaS/njLuQIWiP7OHXrODaP2Da21W', 'club_member', '2025-12-11 19:23:37'),
(18, 'dance', 'dance', '$2y$10$QQZqxs5mJBaTMEiY24RLRuIYibn1QSPKKm6ECHsCTfif3o/CcLieu', 'club_member', '2025-12-12 09:57:44'),
(19, 'Introvert', 'introvert', '$2y$10$nKx1UGzuLxxYD3OEIXKJi.5Zy7S0CgUeXwlGygLE6YTqTxFYT1oX2', 'club_member', '2025-12-12 14:09:05'),
(20, 'Test admin', 'testa', '$2y$10$kV87x6R7PgXLcm9miESviulpVQIhY2kDhlR.nm5C.tBra6qtuL30C', 'club_member', '2025-12-13 13:46:06'),
(21, 'Test user', 'testu', '$2y$10$9T66zqRQFX3FJt6lKUNkBev8TmHwFqUEfCyWwzgiaFehJxH9W6gL2', 'club_member', '2025-12-13 13:46:17'),
(22, 'test admin 2', 'testa2', '$2y$10$cOFvqLZeHJ7HK4YeawU./eTBY93DH2PZ3HLapXwhLBMAJSQOch/zu', 'club_member', '2025-12-13 13:56:23'),
(23, 'vola', 'vola', '$2y$10$kPW./tM2ZAEazFcXDm9a3eKNElGZWzSDkbLOM3w7b.3q.aEU3Kv2.', 'club_member', '2025-12-13 13:58:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_admins`
--
ALTER TABLE `club_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `club_members`
--
ALTER TABLE `club_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipient` (`recipient`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tasks_club` (`club_id`);

--
-- Indexes for table `task_assignments`
--
ALTER TABLE `task_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_id` (`task_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `club_admins`
--
ALTER TABLE `club_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `club_members`
--
ALTER TABLE `club_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `task_assignments`
--
ALTER TABLE `task_assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `club_admins`
--
ALTER TABLE `club_admins`
  ADD CONSTRAINT `club_admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `club_admins_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `club_members`
--
ALTER TABLE `club_members`
  ADD CONSTRAINT `club_members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `club_members_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_tasks_club` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_assignments`
--
ALTER TABLE `task_assignments`
  ADD CONSTRAINT `task_assignments_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_assignments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`recipient`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
