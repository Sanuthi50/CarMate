-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2025 at 09:52 PM
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
-- Database: `carmate`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Service_Type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Contact_Number` varchar(255) NOT NULL,
  `Vehicle_Model` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Service_Type`, `date`, `time`, `Name`, `Contact_Number`, `Vehicle_Model`, `id`, `c_id`, `p_id`, `status`) VALUES
('oilChange', '2024-09-05', '12:36:00.000000', 'ashinshani wijethunga', '0781271193', 'bens', 1, 0, 0, ''),
('oilChange', '2024-09-11', '08:31:00.000000', 'Taniya', '0714159007', 'BMW', 2, 0, 0, ''),
('car reapir', '2024-10-28', '08:22:00.000000', 'customer', '23456789876543', 'Toyota', 3, 2, 0, ''),
('car reapir', '2024-10-28', '08:22:00.000000', 'customer', '23456789876543', 'Toyota', 4, 2, 0, ''),
('car reapir', '2024-10-28', '08:22:00.000000', 'customer', '23456789876543', 'Toyota', 5, 2, 0, ''),
('car reapir', '2024-10-28', '08:22:00.000000', 'customer', '23456789876543', 'Toyota', 6, 2, 0, ''),
('car reapir', '2024-10-28', '08:22:00.000000', 'customer', '23456789876543', 'Toyota', 7, 2, 0, ''),
('car reapir', '2024-10-28', '08:22:00.000000', 'customer', '23456789876543', 'Toyota', 8, 2, 0, ''),
('car reapir', '2024-10-28', '08:22:00.000000', 'customer', '23456789876543', 'Toyota', 9, 2, 0, ''),
('car reapir', '2024-10-28', '08:22:00.000000', 'customer', '23456789876543', 'Toyota', 10, 2, 0, ''),
('car reapir', '2024-10-01', '12:48:00.000000', 'ashi', '0123456789', 'err', 11, 6, 0, ''),
('car reapir', '2024-10-11', '03:39:00.000000', 'customer', '23456789876543', 'Toyota', 12, 20, 4, 'Delivered'),
('Car wash', '2024-10-17', '00:41:00.000000', 'customer', '98765434567890', 'Toyota', 13, 20, 1, 'ordered'),
('Car wash', '2024-10-16', '07:14:00.000000', 'customer', '9876543234567', 'Toyota', 14, 2, 1, 'ordered');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `active` text NOT NULL,
  `image_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `active`, `image_name`) VALUES
(4, 'Car wash', 'Yes', 'Service_category_27271.jpg'),
(5, 'Car repair', 'Yes', 'Service_category_50318.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `response` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `text`, `response`) VALUES
(1, 'Hello\r\n', 'Hello How can I help you?'),
(2, 'Hi', 'Hi'),
(3, 'Hello', 'Hi How can i help you today?'),
(4, 'How to Add services', 'To Add An Service make sure you logged in as an provider then you can go to manage services and there you can find Add services. If you need more clarification you can always contact our hotline or ask me.'),
(5, 'I need to schedule a car service.', 'Sure! Could you provide the make and model of your car?'),
(6, 'It’s a Toyota Camry, 2019.', 'Got it! What type of service do you need?\r\nHere are a few options:\r\n\r\nOil Change\r\nTire Rotation\r\nBrake Inspection\r\nFull Service'),
(7, 'I’d like a full service', 'Great choice! When would you like to schedule your service?\r\nYou can pick a date and time that works best for you.');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `username`, `password`, `address`, `contact`) VALUES
(1, 'ashi', 'ashinshaniwijethunge@gmail.com', 'tharindudilshan070@gmail.com', '202cb962ac59075b964b07152d234b70', 'colombo', '0987654'),
(2, 'sanuthi liyasika', 'sanuthiliyasika@gmail.com', 'carmate', '202cb962ac59075b964b07152d234b70', 'Colombo', '045425344'),
(4, 'customer1', 'Customer1@gmail.com', 'cus1', 'a9f7e97965d6cf799a529102a973b8b9', 'colombo', '98765432345678'),
(5, 'customer2', 'Customer2@gmail.com', 'c2', '9ab62b5ef34a985438bfdf7ee0102229', 'colombo', '123456787653'),
(6, 'ashi', 'a@gmail.com', 'ashi', '827ccb0eea8a706c4c34a16891f84e7b', 'kottawa', '852741963'),
(9, 'Sannnnn', 'Cus@gmail.com', 'sannn', 'e5841df2166dd424a57127423d276bbe', 'colombo', '7654456789'),
(12, 'ben', '123@gmail.com', 'ben', '7fe4771c008a22eb763df47d19e2c6aa', 'colombo', '9876543456'),
(15, 'henry', 'Henry@gmail.com', 'henry', '027e4180beedb29744413a7ea6b84a42', 'colombo', '98765434'),
(17, 'denis', 'denis@gmail.com', 'denis', 'c3875d07f44c422f3b3bc019c23e16ae', 'colombo', '9876545678'),
(18, 'ria', 'ria@gmail.com', 'ria', 'd42a9ad09e9778b177d409f5716ac621', 'colombo', '3456765432'),
(19, 'Customer6', 'Customer6@gmail.com', 'Customer6', '30344d9eeb4a4a6e0e5edd79911d444c', 'colombo', '098765456'),
(20, 'Customer9', 'Customer9@gmail.com', 'Customer9', '9fe8593a8a330607d76796b35c64c600', 'colombo', '7654567');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_id` int(255) NOT NULL,
  `Feedback` varchar(255) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Feedback_id`, `Feedback`, `Date`) VALUES
(4, '\"I love how user-friendly the interface is! Scheduling a service appointment was quick and straightforward.', '2024-10-01'),
(5, 'The system kept me informed about my car’s status throughout the service process. I appreciated the real-time updates!\"', '2019-10-09'),
(6, 'I really appreciated the flexibility in scheduling appointments. The online booking feature makes it easy to find a time that works for me', '2021-10-01'),
(7, 'Overall, my experience with the unified car service system has been great! I will definitely use it again and recommend it to my friends.', '2022-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`id`, `name`, `email`, `username`, `password`, `address`, `contact`) VALUES
(3, 'provider1', '', 'Provider@gmail.com', '202cb962ac59075b964b07152d234b70', 'Galle', '1876543456789'),
(4, 'sanuthi liyasika', 'sanuthiliyasika@gmail.com', 'carmate', '202cb962ac59075b964b07152d234b70', 'colombo', '12334234232'),
(5, 'Provider1', 'Provider1@gmail.com', 'provider1', '202cb962ac59075b964b07152d234b70', 'Colombo', '098765434567'),
(7, 'Customer', 'Customer@gmail.com', 'cus', 'acf4b89d3d503d8252c9c4ba75ddbf6d', 'colombo', '987654334567890'),
(8, 'wert', '', 'car', 'acf4b89d3d503d8252c9c4ba75ddbf6d', 'colombo', '86543234567'),
(9, 'anna', '', 'anna', '7a53928fa4dd31e82c6ef826f341daec', 'galle', '876543459');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_name` varchar(225) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `active` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `image_name`, `provider_id`, `active`, `category_id`, `price`) VALUES
(4, 'Car wash', 'Regular car wash', 'Service-name57965.jpg', 1, 'Yes', 5, 5000.00),
(5, 'car reapir', 'car repair', 'Service-name31887.jpg', 4, 'Yes', 5, 80000.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Confirm_Password` varchar(255) NOT NULL,
  `Phone_Number` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `Email`, `Password`, `Confirm_Password`, `Phone_Number`, `Address`, `Type`) VALUES
('ashinshani wijethunga', 'Ashi@gmail.com', '0', '0', '781271193', 'kottawa', 'Customer'),
('Lakindu', 'Lakindu@gmail.com', '0', '0', '789100596', 'Monaragala', 'Provider'),
('chathira', 'chathira@gmail.com', '0', '0', '714159007', 'Monaragala', 'Provider'),
('Lahiru', 'Lahiru@gmail.com', '0', '0', '781271193', 'Monaragala', 'Provider'),
('anjana', 'anjana@gmail.com', '$2y$10$ANSHFvNvQMirO805vy6.Q.PZLO4VIMI8jQ7fYwap21H.P6UiSCh1u', '', '123456', 'Monaragala', 'Customer'),
('Ashi', 'tharindudilshan070@gmail.com', '$2y$10$4K85Uwhoc06FVqLngKAqfeTMb/GPLeyUNrPVQOL6ea00KXA7AM3sm', '', '21548787', 'hrfhtedjhtedthde', 'Customer'),
('Ch', 'nethusaara16@gmail.com', '$2y$10$wzXYOcR6ZCkLpEictdvE1unoUB8B2c.8ByJFVDuLj7EXfmbwiyxyi', '', '702816135', '12/Fcvghcf', 'Provider');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`password`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_id`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`password`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
