-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 04, 2024 at 10:36 PM
-- Server version: 11.0.3-MariaDB-1:11.0.3+maria~ubu2204
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_agency_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodations`
--

CREATE TABLE `accommodations` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `hotel_stars` int(11) NOT NULL,
  `meal_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accommodations`
--

INSERT INTO `accommodations` (`id`, `hotel_name`, `hotel_stars`, `meal_type`) VALUES
(1, 'Marriot', 5, 'All inclusive'),
(2, 'Four Seasons', 5, 'All inclusive'),
(3, 'Kempinski', 4, 'Breakfast'),
(5, 'Hayatt', 5, 'Breakfast - Dinner'),
(6, 'Rosewood', 4, 'Breakfast - Lunch'),
(7, 'De l\'Europe', 4, 'Breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_type`) VALUES
(1, 'Individual'),
(2, 'Group'),
(3, 'Honeymoon'),
(4, 'Family');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `name`, `image_path`) VALUES
(1, 'Europe', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Europe_orthographic_Caucasus_Urals_boundary_%28with_borders%29.svg/220px-Europe_orthographic_Caucasus_Urals_boundary_%28with_borders%29.svg.png'),
(2, 'Asia', 'https://upload.wikimedia.org/wikipedia/commons/b/bd/Asia_%28orthographic_projection%29_without_New_Guinea.svg');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `departure_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  `price` float NOT NULL,
  `available` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `accommodation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `name`, `image_path`, `description`, `departure_date`, `duration`, `price`, `available`, `category_id`, `destination_id`, `accommodation_id`) VALUES
(1, 'Rome', 'https://tourismmedia.italia.it/is/image/mitur/20220127150143-colosseo-roma-lazio-shutterstock-756032350-1?wid=1600&hei=900&fit=constrain,1&fmt=webp', 'afeeeeeeeeeeeeeeeeeeeeedcasvvvvvvvvvvvvvvv', '2024-02-20', 5, 450, 1, 2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodations`
--
ALTER TABLE `accommodations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_id` (`destination_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `accommodation_details_id` (`accommodation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodations`
--
ALTER TABLE `accommodations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_2` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`id`),
  ADD CONSTRAINT `trips_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `trips_ibfk_4` FOREIGN KEY (`accommodation_id`) REFERENCES `accommodations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
