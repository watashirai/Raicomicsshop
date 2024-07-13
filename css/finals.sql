-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 06:04 PM
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
-- Database: `finals`
--
CREATE DATABASE IF NOT EXISTS `finals` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `finals`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BookID` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `Publisher` varchar(200) NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `BookImage` varchar(200) NOT NULL,
  `Forsale` int(1) NOT NULL,
  `Price` decimal(11,2) DEFAULT NULL,
  `Solds` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `borrow_date` date NOT NULL,
  `due_date` date NOT NULL,
  `penalty_paid` int(11) NOT NULL,
  `returned` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currentuser`
--

CREATE TABLE `currentuser` (
  `UserId` int(11) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `profile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currentuser`
--

INSERT INTO `currentuser` (`UserId`, `FName`, `LName`, `username`, `email`, `address`, `phone`, `profile`) VALUES
(1, 'Lance', 'Musngi', 'lance', 'lance.musngi@gmail.com', '', '', 'upload/currentuser/new.png');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `GenreID` int(11) NOT NULL,
  `BookGenre` varchar(200) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`GenreID`, `BookGenre`, `img`) VALUES
(2, 'Comics', 'upload\\Personal care\\1.jpg'),
(3, 'Karikatur', 'upload\\Prescription Medicines\\1.png'),
(1, 'Manga', 'upload\\Baby Diapers and Kids Products\\1.jpg'),
(4, 'Webcomics', 'upload\\Vitamins and Supplements\\1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_quantity` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `ItemID` int(11) NOT NULL,
  `Itemname` varchar(50) NOT NULL,
  `value` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`ItemID`, `Itemname`, `value`) VALUES
(1, 'Logo', 'upload/page/online-comic.png'),
(2, 'Company Name', 'Rai\'s Book Shop'),
(3, 'Background Image', 'upload/page/3281bbb916dc95b8bef4e52e24a8cc8b.jpg'),
(4, 'Background Color', '#ffffff'),
(5, 'Text Color', '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount_paid` decimal(10,2) NOT NULL,
  `payment_mode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE `slideshow` (
  `SlideID` int(11) NOT NULL,
  `imagename` varchar(50) NOT NULL,
  `imagelocation` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`SlideID`, `imagename`, `imagelocation`) VALUES
(1, 'slide1', 'upload/slideshow/1.png'),
(2, 'slide2', 'upload/slideshow/2.png'),
(3, 'slide3', 'upload/slideshow/3.png'),
(4, 'slide4', 'upload/slideshow/4.png'),
(5, 'slide5', 'upload/slideshow/5.png'),
(6, 'slide6', 'upload/slideshow/6.png'),
(7, 'slide7', 'upload/slideshow/7.png'),
(8, 'slide8', 'upload/slideshow/8.png'),
(9, 'slide9', 'upload/slideshow/9.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `attempt` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `admin` int(1) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `verification` varchar(10) NOT NULL,
  `verification_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FName`, `LName`, `username`, `password`, `email`, `phone`, `address`, `attempt`, `block`, `admin`, `profile`, `verification`, `verification_code`) VALUES
(1, 'Rai', 'book shop', 'admin', '$2y$10$n6M7sVBsd.d0pea504SDgecSM0dimSJdKsEiXCkY8IQ1yVwVLNyJ6', 'lance.musngi@gmail.com', '09911180759', '300 sampaguita st.', 0, 0, 1, 'upload/currentuser/online-comic.png', '1', '45927'),
(12, 'Lance', 'Musngi', 'lance', '$2y$10$n6M7sVBsd.d0pea504SDgecSM0dimSJdKsEiXCkY8IQ1yVwVLNyJ6', 'lance.musngi@gmail.com', NULL, NULL, 0, 0, 0, 'upload/currentuser/new.png', '1', '45927');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookID`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`BookID`),
  ADD KEY `cart_ibfk_1` (`customer_id`);

--
-- Indexes for table `currentuser`
--
ALTER TABLE `currentuser`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`BookGenre`),
  ADD UNIQUE KEY `GenreID` (`GenreID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`ItemID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`SlideID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `currentuser`
--
ALTER TABLE `currentuser`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `GenreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `ItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435368;

--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `SlideID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`BookID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
