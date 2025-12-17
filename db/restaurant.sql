-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2025 at 08:47 PM
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
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` time DEFAULT NULL,
  `guests` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `paid` tinyint(4) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `booking_date`, `booking_time`, `guests`, `note`, `paid`, `created_at`) VALUES
(1, 1, '2025-12-31', '23:39:00', 13, 'JO', 0, '2025-12-17 18:40:37'),
(2, 1, '2025-12-31', '23:39:00', 13, 'JO', 1, '2025-12-17 18:40:37'),
(3, 1, '2025-12-25', '23:57:00', 3, 'JO', 0, '2025-12-17 18:57:51'),
(4, 1, '2025-12-25', '23:57:00', 3, 'JO', 1, '2025-12-17 18:57:51'),
(5, 2, '2025-12-24', '12:05:00', 3, 'Krwjt djem', 0, '2025-12-17 19:06:06'),
(6, 2, '2025-12-24', '12:05:00', 3, 'Krwjt djem', 1, '2025-12-17 19:06:06'),
(7, 1, '2025-12-24', '23:13:00', 2, 'jo', 0, '2025-12-17 19:13:52'),
(8, 1, '2025-12-24', '23:13:00', 2, 'jo', 1, '2025-12-17 19:13:52'),
(9, 3, '2025-12-19', '22:27:00', 1, 'k', 0, '2025-12-17 19:27:20'),
(10, 3, '2025-12-19', '22:27:00', 1, 'k', 1, '2025-12-17 19:27:20'),
(11, 3, '2025-12-15', '20:38:00', 2, 's', 0, '2025-12-17 19:34:37'),
(12, 3, '2025-12-15', '20:38:00', 2, 's', 1, '2025-12-17 19:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'ama', 'amar@gmail.com', '$2y$10$SsaQw45Icz7aCd8M8m2F0erjD7vJhZm0QR.eblncPuMFhFaLHPLkm', 'user', '2025-12-17 18:39:25'),
(2, 'a', 'a@gmail.com', '$2y$10$R7OcODlKsD3PbtkrLgu/rehVUo/aFq0aSTN71M3K70ixtLuDel7eS', 'user', '2025-12-17 19:05:33'),
(3, 'w', 'w@gmail.com', '$2y$10$yvFI6M7geEgf6HuMEKhjgOfGsH7q.fmApp.S6G9gknS/PfSm8FGLy', 'user', '2025-12-17 19:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `login_time` datetime DEFAULT current_timestamp(),
  `ip_address` varchar(45) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
