-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 01:18 PM
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
-- Database: `project_management_db`
--
CREATE DATABASE IF NOT EXISTS `project_management_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project_management_db`;

-- --------------------------------------------------------

--
-- Table structure for table `currentuser`
--

CREATE TABLE `currentuser` (
  `UserId` int(11) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currentuser`
--

INSERT INTO `currentuser` (`UserId`, `FName`, `username`, `email`, `admin`) VALUES
(1, '', 'kyle', 'kyle@example.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('Not Started','In Progress','Completed') NOT NULL DEFAULT 'Not Started'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `description`, `start_date`, `end_date`, `status`) VALUES
(1, 'Project A', 'Description for Project A', '2024-01-01', '2024-06-30', 'Completed'),
(2, 'Project B', 'Description for Project B', '2024-02-15', '2024-07-31', 'Not Started'),
(4, 'minecraft', 'mining', '2024-06-05', '2024-06-06', 'In Progress'),
(5, 'Farming artifacts', 'need to get some good artifacts', '2024-06-04', '2024-06-05', 'Not Started'),
(6, 'Farming Materials ', 'farming some materials to get level up', '2024-06-20', '2024-06-20', 'Not Started'),
(7, 'make a new game', 'get some info to get new game ideas', '2024-06-04', '2024-06-29', 'In Progress'),
(8, 'project 6', 'project 6', '2024-06-11', '2024-06-22', 'In Progress');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `status` enum('In Progress','Completed') NOT NULL DEFAULT 'In Progress',
  `file` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `project_id` int(11) NOT NULL,
  `comment` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_name`, `description`, `assigned_to`, `status`, `file`, `deadline`, `project_id`, `comment`) VALUES
(1, 'Task 1', 'Description for Task 1', 1, 'In Progress', '', '2024-05-01', 1, '\ntest\nd'),
(2, 'Task 2', 'Description for Task 2', 1, 'In Progress', '', '2024-05-15', 2, ''),
(3, 'Task 3', 'Description for Task 3', 1, 'In Progress', '', '2024-04-01', 2, ''),
(8, 'farming artifacts ', 'to get some new artifacts', 18, 'In Progress', 'Work Immersion KUYA J Batch 1.docx', '2024-06-14', 5, '\n\nneed pa mag pa lvl up'),
(9, 'farming meterials', 'farming some materials to get level up', 13, 'In Progress', '', '2024-06-13', 6, ''),
(10, 'project 6', 'project', 18, 'In Progress', '', '2024-06-21', 8, ''),
(11, 'minecraft', 'mining', 18, 'In Progress', '', '2024-06-19', 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `member_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`member_id`, `name`, `email`, `user_id`) VALUES
(1, 'james', 'alice@example.com', 1),
(3, 'Charlie', 'charlie@example.com', 3),
(4, 'David', 'david@example.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Admin','Project Manager','Team Member') NOT NULL DEFAULT 'Team Member',
  `verified` int(11) NOT NULL,
  `verification_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `verified`, `verification_code`) VALUES
(1, 'james', '$2y$10$4ddrsgFR0y/KWWBRkqzwhuXjH.HQuvJxwgyX9fqW3gjwwMEjoDUYq', 'jamesraillesitchon76@gmail.com', 'Admin', 1, 93802),
(3, 'rai', '$2y$10$ThtYUYYMAMkMhlVcwkygD.BamLWOP6ObPm7Ls2wNPX/WiS.laDUKa', 'rai@example.com', 'Team Member', 1, 0),
(4, 'kyle', '$2y$10$ThtYUYYMAMkMhlVcwkygD.BamLWOP6ObPm7Ls2wNPX/WiS.laDUKa', 'kyle@example.com', 'Team Member', 1, 0),
(13, 'keqing', '$2y$10$8D7SCoftOEJJCrQrG6qcuus4Ac1XHAGX05EerJKj3pWw/nFrurlPG', 'keqing@gmail.com', 'Team Member', 0, 0),
(14, 'benneth', '$2y$10$AYVx.FJrOet8jnsfqM7CV.aeC.aWS6Y6XhMA4JUkKUtj4Y2ivCvSe', 'benny@gmail.com', 'Team Member', 0, 0),
(15, 'josh', '$2y$10$yZker0P8SIMFHpns9BnuiOni/E7SJlvczbJ1uANJAwmIZ1UEE.5mK', 'josh@gmail.com', 'Team Member', 0, 0),
(16, 'lisa', '$2y$10$XhC3Yb37/BMATv1uTVDltOsNBkP363w3gJEXZFupFFRxXzv0sL/p.', 'lisa@gmail.com', 'Team Member', 0, 0),
(17, 'zhongli', '$2y$10$/YFv/w1I8sHn98yQ03EwNucWHrgCLGln7keuKsJC6iboJxX0uMJyS', 'zhongli@gmail.com', 'Team Member', 0, 0),
(18, 'laylie', '$2y$10$VwO73q.lszRIwLA7ZewKxei7kzap7CG06kLzP4vwbbb.wdA0F809u', 'sitchonjames071@gmail.com', 'Team Member', 1, 25705),
(19, 'lilim', '$2y$10$fwIkILEawBFTEH6Vv0tzJuaokO9ow60RA9Myl3n/daFT0HZtgQeFS', 'jamesraillesitchon76@gmail.com', 'Team Member', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `UserID` int(11) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`UserID`, `Fname`, `username`, `password`, `email`) VALUES
(1, 'jaimes haha', 'rai', '$2y$10$dbB2ID5r7mt.x8q5o95opeN0O0wd2lZWZLeV.Ab4rWPKfXjTSVprW', ''),
(2, 'Lance Grayson Musngi', 'lance', '$2y$10$ThtYUYYMAMkMhlVcwkygD.BamLWOP6ObPm7Ls2wNPX/WiS.laDUKa', 'lance.musngi@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `assigned_to` (`assigned_to`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE;

--
-- Constraints for table `team_members`
--
ALTER TABLE `team_members`
  ADD CONSTRAINT `team_members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
