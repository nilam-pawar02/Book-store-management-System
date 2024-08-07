-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 07:58 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `id` int(11) NOT NULL,
  `userId` int(10) NOT NULL,
  `browser` varchar(200) NOT NULL,
  `isLoggedIn` tinyint(1) NOT NULL,
  `LogTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description.` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `language` varchar(50) NOT NULL,
  `publication_date` varchar(20) NOT NULL,
  `author_id` int(10) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(200) NOT NULL,
  `edition` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `stock` int(10) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `language`, `publication_date`, `author_id`, `price`, `image`, `edition`, `status`, `stock`, `genre`, `time`) VALUES
(2, 'abc', '', 'hindi', '2024-01-22', 8, 99, 'assets/bookImages/abc.jpg', 1, 'Available', 100, 'fantacy', '2024-01-31 14:06:58'),
(3, 'abc', '', 'hindi', '2024-01-22', 8, 99, 'assets/bookImages/abc.jpg', 1, 'Available', 100, 'fantacy', '2024-01-31 14:06:58'),
(4, 'abc', '', 'hindi', '2024-01-22', 8, 99, 'assets/bookImages/abc.jpg', 1, 'Available', 100, 'fantacy', '2024-01-31 14:06:58'),
(5, 'abc', '', 'hindi', '2024-01-22', 8, 99, 'assets/bookImages/abc.jpg', 1, 'Available', 100, 'fantacy', '2024-01-31 14:06:58'),
(6, 'guarav kumbhar', '', 'marathi', '2024-01-30', 1, 100000000000, 'assets/bookImages/guarav kumbhar.jpg', 2, 'Available', 23, 'romance', '2024-02-01 03:58:23'),
(7, 'iron', '', 'hindi,english', '2024-02-02', 1, 499, 'assets/bookImages/iron.jpg', 1, 'Available', 23, 'fantacy', '2024-02-01 04:35:40'),
(8, 'bhagwatgeeta', '', 'hindi,english', '2024-02-04', 1, 1, 'assets/bookImages/bhagwatgeeta.jpg', 1, 'Available', 100, 'adveture', '2024-02-04 13:04:04'),
(9, 'bhagwatgeeta', '', 'hindi,english', '2024-02-04', 1, 1, 'assets/bookImages/bhagwatgeeta.jpg', 1, 'Available', 100, 'adveture', '2024-02-04 13:04:50'),
(10, 'painting cats', 'In this follow-up to her hit Painting Happiness, Instagram sensation Terry Runyan shows you how to play with watercolour to create quirky cat portraits – and let go of stress. Perfect for cat lovers and watercolour artists of all skill levels, from absolute beginner to more experienced, Painting Cats teaches you how to go from blob of paint to a beautiful portrait of your fluffy friends. Drawing on art therapy techniques that emphasize fun and freedom in creativity over technical perfection, Runyan guides you step by step through the process of adding details to loosely painted shapes to create your own unique and distinct cats! ', 'english', '2024-02-07', 1, 99, 'assets/bookImages/painting cats.webp', 1, 'Available', 100, 'adventure', '2024-02-07 09:32:34'),
(11, 'The Great Gatsby', '', 'english', '2024-03-22', 1, 233, 'assets/bookImages/The Great Gatsby.jpg', 2, 'Available', 99, 'adveture', '2024-03-22 05:07:25'),
(12, 'To Kill a Mockingbird', '', 'english', '2024-03-22', 1, 799, 'assets/bookImages/To Kill a Mockingbird.jpg', 2, 'Available', 100, 'fantacy', '2024-03-22 05:09:52'),
(13, 'The Great Gatsby', '', 'english', '2024-03-22', 1, 789, 'assets/bookImages/The Great Gatsby.jpg', 3, 'Available', 799, 'adventure', '2024-03-22 05:12:42'),
(14, 'Little Miss Mary', '', 'english', '2024-03-22', 1, 499, 'assets/bookImages/Little Miss Mary.png', 3, 'Available', 50, 'adveture', '2024-03-22 05:16:49'),
(15, 'Teacher Man ', '', 'english', '2024-03-22', 1, 150, 'assets/bookImages/Teacher Man .jpg', 1, 'Available', 56, 'adveture', '2024-03-22 05:19:21'),
(16, 'The Street Lawyer', '', 'hindi,english', '2024-03-22', 1, 800, 'assets/bookImages/The Street Lawyer.jpg', 2, 'Available', 50, 'adveture', '2024-03-22 05:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total_price` float NOT NULL,
  `discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `name` varchar(50) NOT NULL,
  `pincode` int(20) NOT NULL,
  `country` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`name`, `pincode`, `country`) VALUES
('pune', 29, 2),
('abc', 34, 12),
('sdfgh', 123, 3),
('baramati ', 413102, 1),
('satara', 413104, 2);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `dest_address` varchar(100) NOT NULL,
  `status` enum('processing','shipped','out of delivery','delivered','failed delivery attempt','return to sender','in transist','delayed','on hold') NOT NULL,
  `payment` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `status` enum('pending','processing','completed','failed/decline','refunded','cancelled','on hold') NOT NULL,
  `payment_method` enum('cash','credit cards','debit cards','mobile payments') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `profile_pic` varchar(400) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(40) NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone number` int(12) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign key` (`userId`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users Fn` (`user_id`),
  ADD KEY `books Fn` (`book_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`pincode`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
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
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authentication`
--
ALTER TABLE `authentication`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `books Fn` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users Fn` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
