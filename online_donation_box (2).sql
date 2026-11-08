-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 08, 2026 at 06:58 PM
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
-- Database: `online_donation_box`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin'),
(2, 'staff', '827ccb0eea8a706c4c34a16891f84e7b', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_goals`
--

CREATE TABLE `campaign_goals` (
  `id` int(11) NOT NULL,
  `cause` varchar(100) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaign_goals`
--

INSERT INTO `campaign_goals` (`id`, `cause`, `goal`) VALUES
(1, 'Education Fund', 800000),
(2, 'Palestine Relief', 500000),
(3, 'Pakistan Flood', 600000);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `full_name`, `email`, `message`, `created_at`, `status`) VALUES
(17, 'munazza', 'khan@gmail', 'Assalam alikum', '2026-02-06 12:50:10', 'seen'),
(20, 'Rabia BiBi', 'Rabia@gmail.com', 'I am sending Donation thankyou.', '2026-02-10 07:11:26', 'seen'),
(21, 'Munazza Nazir', 'munazzakhan200413@gmail.com', 'Assalam alikum', '2026-04-05 16:04:46', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `cause` varchar(50) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reference_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `full_name`, `email`, `amount`, `cause`, `payment_method`, `status`, `created_at`, `reference_id`) VALUES
(218, 'Muhammad', 'khan@gmail', 3000.00, 'Pakistan Flood', 'PayPal', 'rejected', '2026-03-17 19:38:33', 'REF29773'),
(220, 'Muhammad', 'munazakhan@gmail.com', 3000.00, 'Palestine Relief', 'PayPal', 'approved', '2026-03-17 21:05:58', 'REF1773781558'),
(229, 'munazza', 'osama@gmail', 3000.00, 'Palestine Relief', 'PayPal', 'approved', '2026-04-11 19:49:18', 'REF1775936958'),
(233, 'kinza', 'munazzakhan200413@gmail.com', 3000.00, 'Pakistan Flood', 'PayPal', 'approved', '2026-04-11 20:08:42', 'REF1775938122'),
(242, 'hafsa nazir', 'khan@gmail', 5000.00, 'Education Fund', 'PayPal', 'approved', '2026-04-17 18:48:45', 'REF695623'),
(246, 'kinza', 'kinza@gmail.com', 3000.00, 'Palestine Relief', 'EasyPaisa', 'pending', '2026-04-18 12:27:10', 'REF884308'),
(247, 'kinza', 'kinza@gmail.com', 5000.00, 'Education Fund', 'PayPal', 'approved', '2026-04-18 12:28:39', 'REF210812'),
(249, 'kinza', 'kinza@gmail.com', 3000.00, 'Education Fund', 'Card', 'approved', '2026-04-18 13:56:59', 'REF124803'),
(250, 'munazza', 'munazzakhan200413@gmail.com', 5000.00, 'Pakistan Flood', 'PayPal', 'pending', '2026-04-18 13:57:55', 'REF957729'),
(254, 'Osama Khan', 'osama@gmail', 3000.00, 'Palestine Relief', 'PayPal', 'pending', '2026-04-18 19:48:00', 'REF391919'),
(255, 'Osama Khan', 'khan@gmail', 400000.00, 'Palestine Relief', 'PayPal', 'pending', '2026-04-18 19:59:23', 'REF596817'),
(256, 'Osama Khan', 'munazzakhan200413@gmail.com', 3000.00, 'Palestine Relief', 'PayPal', 'pending', '2026-04-18 20:50:14', 'REF262393'),
(257, 'Osama Khan', 'khan@gmail', 3000.00, 'Palestine Relief', 'EasyPaisa', 'pending', '2026-04-18 20:55:44', 'REF104189'),
(260, 'Osama Khan', 'osama@gmail', 3000.00, 'Palestine Relief', 'PayPal', 'pending', '2026-04-19 16:38:54', 'REF410695'),
(263, 'Osama Khan', 'khan@gmail', 3000.00, 'Pakistan Flood', 'EasyPaisa', 'pending', '2026-04-19 19:09:15', 'REF514602'),
(266, 'Osama Khan', 'osama@gmail', 5000.00, 'Palestine Relief', 'PayPal', 'pending', '2026-04-20 07:17:34', 'REF858592'),
(267, 'Osama Khan', 'osama@gmail', 3000.00, 'Palestine Relief', 'PayPal', 'pending', '2026-04-20 20:17:45', 'REF317065'),
(268, 'munazza', 'munazzakhan200413@gmail.com', 3000.00, 'Palestine Relief', 'EasyPaisa', 'pending', '2026-04-20 20:20:29', 'REF669960'),
(269, 'Osama Khan', 'khan@gmail', 3000.00, 'Palestine Relief', 'PayPal', 'pending', '2026-04-20 20:28:31', 'REF631285'),
(270, 'Osama Khan', 'osama@gmail', 3000.00, 'Palestine Relief', 'PayPal', 'pending', '2026-04-20 20:29:25', 'REF690636'),
(271, 'Osama Khan', 'munazzakhan200413@gmail.com', 3000.00, 'Palestine Relief', 'PayPal', 'pending', '2026-04-20 20:32:46', 'REF247285'),
(272, 'Osama Khan', 'osama@gmail', 3000.00, 'Pakistan Flood', 'PayPal', 'pending', '2026-04-20 20:59:49', 'REF264230'),
(273, 'Rabia BiBi', 'Rabia@gmail.com', 5000.00, 'Palestine Relief', 'PayPal', 'pending', '2026-04-22 07:04:19', 'REF953208'),
(274, 'Osama Khan', 'munazzakhan200413@gmail.com', 3000.00, 'Education Fund', 'PayPal', 'pending', '2026-04-22 07:05:44', 'REF102698'),
(275, 'Osama Khan', 'munazzakhan200413@gmail.com', 3000.00, 'Education Fund', 'PayPal', 'pending', '2026-04-22 07:06:29', 'REF172188'),
(276, 'Osama Khan', 'osama@gmail', 3000.00, 'Education Fund', 'PayPal', 'approved', '2026-04-23 05:47:26', 'REF935516'),
(277, 'Osama Khan', 'khan@gmail', 3000.00, 'Palestine Relief', 'PayPal', 'rejected', '2026-05-01 21:34:26', 'REF635411'),
(278, 'Osama Khan', 'osama@gmail', 3000.00, 'Pakistan Flood', 'EasyPaisa', 'approved', '2026-06-09 20:53:02', 'REF853354'),
(279, 'Osama Khan', 'osama@gmail', 3000.00, 'Palestine Relief', 'EasyPaisa', 'pending', '2026-06-10 05:07:39', 'REF638983');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_goals`
--
ALTER TABLE `campaign_goals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cause` (`cause`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_id` (`reference_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `campaign_goals`
--
ALTER TABLE `campaign_goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
