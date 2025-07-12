-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2025 at 06:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id-card-generator`
--

-- --------------------------------------------------------

--
-- Table structure for table `54_form_20240131151458`
--

CREATE TABLE `54_form_20240131151458` (
  `id` int(11) NOT NULL,
  `Photo` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `roll_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `54_form_20240131151458`
--

INSERT INTO `54_form_20240131151458` (`id`, `Photo`, `name`, `roll_no`) VALUES
(1, '20240131151711_GAURAV SHARMA-JIET_CS_20_018.png', 'GAURAV SHARMA', '42'),
(2, '20240131151749_app.setuqr.com_.png', 'Setu', '12345'),
(3, '20240131151815_Toynik Logo final.jpg', 'Toynik', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `54_form_attributes_20240131151458`
--

CREATE TABLE `54_form_attributes_20240131151458` (
  `id` int(11) NOT NULL,
  `input_field_name` varchar(100) DEFAULT NULL,
  `input_type` varchar(50) DEFAULT NULL,
  `input_length` int(11) DEFAULT NULL,
  `required` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `54_form_attributes_20240131151458`
--

INSERT INTO `54_form_attributes_20240131151458` (`id`, `input_field_name`, `input_type`, `input_length`, `required`) VALUES
(1, 'Photo', 'file', 200, 'required'),
(2, 'name', 'text', 45, 'required'),
(3, 'roll no', 'number', 44, 'required');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `mob_no` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `institute` varchar(200) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `mob_no`, `email`, `password`, `institute`, `active`) VALUES
(54, 'Admin', 7014274820, 'admin@gmail.com', 'admin', 'Testing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(11) NOT NULL,
  `form_name` varchar(100) NOT NULL,
  `form_description` varchar(255) NOT NULL,
  `form_table_name` varchar(100) NOT NULL,
  `form_table_attributes` varchar(100) NOT NULL,
  `institute_name` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `form_name`, `form_description`, `form_table_name`, `form_table_attributes`, `institute_name`, `active`, `admin_id`) VALUES
(88, 'Testing', 'id', '54_form_20240131151458', '54_form_attributes_20240131151458', 'Testing', 1, 54);

-- --------------------------------------------------------

--
-- Table structure for table `superadmins`
--

CREATE TABLE `superadmins` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `superadmins`
--

INSERT INTO `superadmins` (`id`, `name`, `email`, `password`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mob_no` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `form_name` varchar(100) NOT NULL,
  `form_table_name` varchar(100) NOT NULL,
  `form_table_attributes` varchar(100) NOT NULL,
  `active` int(11) NOT NULL,
  `form_id` int(10) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mob_no`, `email`, `password`, `form_name`, `form_table_name`, `form_table_attributes`, `active`, `form_id`, `admin_id`) VALUES
(41, 'User', 4444444444, 'user@gmail.com', 'user', 'Testing', '54_form_20240131151458', '54_form_attributes_20240131151458', 1, 88, 54);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `54_form_20240131151458`
--
ALTER TABLE `54_form_20240131151458`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `54_form_attributes_20240131151458`
--
ALTER TABLE `54_form_attributes_20240131151458`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmins`
--
ALTER TABLE `superadmins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `54_form_20240131151458`
--
ALTER TABLE `54_form_20240131151458`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `54_form_attributes_20240131151458`
--
ALTER TABLE `54_form_attributes_20240131151458`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `superadmins`
--
ALTER TABLE `superadmins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
