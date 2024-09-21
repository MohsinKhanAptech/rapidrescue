-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 07:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rapidrescue`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ambulances`
--

CREATE TABLE `ambulances` (
  `ambulance_id` int(11) NOT NULL,
  `vehicle_number` varchar(255) NOT NULL,
  `equipment_level` varchar(255) NOT NULL,
  `current_advance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `first_name`, `last_name`, `contact`, `password`) VALUES
(1, 'saad', 'saad', '0987654321', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_requests`
--

CREATE TABLE `emergency_requests` (
  `request_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `hospital_name` varchar(255) NOT NULL,
  `hospital_address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `pickup_address` varchar(255) NOT NULL,
  `requst_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_requests`
--

INSERT INTO `emergency_requests` (`request_id`, `user_id`, `request_time`, `hospital_name`, `hospital_address`, `contact`, `pickup_address`, `requst_type`) VALUES
(1, 12, '2024-09-21 04:50:07', 'jinnah', 'sadar', '03123456789', 'sadar', 'emergency'),
(2, 12, '2024-09-21 05:26:41', 'jinnah', 'sadar', '03123456789', 'sadar', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `emt`
--

CREATE TABLE `emt` (
  `EMT_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `subject`, `feedback`) VALUES
(1, 'adnan', 'adnanabid@gmail.com', 'rapid rescue', 'exellent service');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `Images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `contact`, `password`, `date_of_birth`, `gender`, `address`, `Images`) VALUES
(4, 'bilal', 'bilal', 'bilal@gmail.com', '03131234567', '123', '2024-09-19', 'male', '123', ''),
(5, 'adnan', 'abid', 'adnanabid@gmail.com', '032171733302', '$2y$10$WTgHHuW0v5a4ucVYwcgcKOnx3kwQoWGAx0.bw6vGFMPLe.ZAZKu4u', '2024-09-20', 'male', 'karachi', ''),
(11, 'mohsin', 'khan', 'mohsin@gmail.com', '09173969', '$2y$10$jmpnKVgY73yM4astz4XQyeOvOBTNT/QhW.Hsbs2KWl8epgS4l7aoq', '2024-09-20', 'Male', 'karachi', 'download.jfif'),
(12, 'mohsin', 'khan', 'm@gmail.com', '03123456789', '$2y$10$pbJ9GGrwbfO4pyg74J09puwbUWzv9XnmZHOIp7IV7TCEKeWXzUNYO', '2024-09-24', 'Male', 'abc', 'laravel command.PNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ambulances`
--
ALTER TABLE `ambulances`
  ADD PRIMARY KEY (`ambulance_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `emergency_requests`
--
ALTER TABLE `emergency_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `emt`
--
ALTER TABLE `emt`
  ADD PRIMARY KEY (`EMT_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ambulances`
--
ALTER TABLE `ambulances`
  MODIFY `ambulance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emergency_requests`
--
ALTER TABLE `emergency_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emt`
--
ALTER TABLE `emt`
  MODIFY `EMT_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emergency_requests`
--
ALTER TABLE `emergency_requests`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
