-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 12:20 PM
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
-- Database: `ovs`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `votes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `votes`) VALUES
(3, 'test-work', 18);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` mediumblob DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `date`) VALUES
(3, 'Summer Festival 2024', 'Join us for the annual Summer Festival filled with music, food, and fun activities for the whole family. up', NULL, '2024-07-15'),
(4, 'Art Exhibition Opening', 'Explore the world of art at our grand exhibition opening featuring renowned artists and their masterpieces.', NULL, '2024-08-20'),
(6, 'hiru star up', 'Explore the world of art at our grand exhibition opening featuring renowned artists and their masterpieces.', NULL, '2024-05-18'),
(8, 'hiru star', 'Explore the world of art at our grand exhibition opening featuring renowned artists and their masterpieces.', NULL, '2024-05-22'),
(9, 'jdjdjdjd', 'Explore the world of art at our grand exhibition opening featuring renowned artists and their masterpieces.', NULL, '2024-05-09'),
(10, 'global', 'Explore the world of art at our grand exhibition opening featuring renowned artists and their masterpieces.', NULL, '2024-05-18');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `feedback_type` enum('comment','suggestion','question') NOT NULL,
  `feedback` text NOT NULL,
  `rating` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `country`, `feedback_type`, `feedback`, `rating`, `created_at`) VALUES
(5, 'suranga Prasaddd', 'test@gmail.com', 'Sri Lanka', 'suggestion', 'very good updte\r\n', 4, '2024-05-04 14:26:33'),
(6, 'chamala', 'test@gmail.com', 'Sri Lanka', 'comment', 'good', 3, '2024-05-05 10:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(6) UNSIGNED NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `num_members` int(6) NOT NULL,
  `competition_name` varchar(100) NOT NULL,
  `captains_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `num_members`, `competition_name`, `captains_name`) VALUES
(2, 'vipers up', -4, 'hiru star up', 'smith'),
(6, 'huskers new', -4, 'superstar', 'john');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'voter'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`) VALUES
(2, 'chamala', 'chama@gmail.com', '$2y$10$tycdXT7QIz8RrBC87LUvR.jJTtLlbfVxvT5/ivw7pUFznAoYJqh0y', 'voter'),
(3, 'Admin', 'admin@gmail.com', '$2y$10$w2ieGoMRuLyW./fsaqdEcOiyKexQT8Xl1yDT3UPtdmExjrdeRm/d6', 'admin'),
(4, 'test up', 'test@gmail.com', '$2y$10$FuCSPQNcBYimJUYQL0zbcetctIFbaJdTh/UqxyiZZ0hbpWeUHUgq2', 'voter'),
(5, 'chamala', 'user1@gmail.com', '$2y$10$SHf9DB6da9..ja4hTjqFcurvtcGT3dlitQNuyzswt3RIDDAJqLsYa', 'voter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
