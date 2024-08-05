-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 09:56 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phptest`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor_details`
--

CREATE TABLE `doctor_details` (
  `id` int(11) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `doc_type` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_details`
--

INSERT INTO `doctor_details` (`id`, `First_Name`, `Last_Name`, `Email`, `phone_number`, `doc_type`, `user_id`) VALUES
(10, 'kanhaiya', 'lal', 'kanhaiyalal@gmail.com', '7687686876', 'AMS', 0),
(18, 'DrRahul', 'Sharma', 'rahulsharma1@example.com', '9876543210', 'MBBS', 0),
(19, 'DrPriya', 'Patel', 'priyapatel2@example.com', '9876543201', 'MS', 0),
(20, 'DrSuresh', 'Kumar', 'sureshkumar3@example.com', '9876543202', 'MD', 0),
(21, 'DrNeha', 'Singh', 'nehasingh4@example.com', '9876543203', 'BAMS', 0),
(22, 'DrAmit', 'Jain', 'amitjain5@example.com', '9876543204', 'BAMS', 0),
(23, 'DrPooja', 'Shah', 'poojashah6@example.com', '9876543205', 'MS', 0),
(24, 'DrAnkur', 'Gupta', 'ankurgupta7@example.com', '9876543206', 'MBBS', 0),
(25, 'DrKavita', 'Verma', 'kavitaverma8@example.com', '9876543207', 'MD', 0),
(26, 'DrRajesh', 'Choudhary', 'rajeshchoudhary9@example.com', '9876543208', 'BAMS', 0),
(27, 'DrAnjali', 'Mishra', 'anjalimishra10@example.com', '9876543209', 'MS', 0),
(28, 'DrVinay', 'Kumar', 'vinaykumar11@example.com', '9876543211', 'MBBS', 0),
(29, 'DrSwati', 'Trivedi', 'swatitrivedi12@example.com', '9876543212', 'MD', 0),
(30, 'DrSanjay', 'Singhal', 'sanjaysinghal13@example.com', '9876543213', 'BAMS', 0),
(31, 'DrAarti', 'Sharma', 'aartisharma14@example.com', '9876543214', 'MS', 0),
(32, 'DrAkash', 'Garg', 'akashgarg15@example.com', '9876543215', 'MBBS', 0),
(33, 'DrPreeti', 'Chauhan', 'preetichauhan16@example.com', '9876543216', 'MD', 0),
(34, 'DrRakesh', 'Mehta', 'rakeshmehta17@example.com', '9876543217', 'BAMS', 0),
(35, 'DrAnita', 'Sharma', 'anitasharma18@example.com', '9876543218', 'MS', 0),
(36, 'DrArun', 'Kumar', 'arunkumar19@example.com', '9876543219', 'MBBS', 0),
(37, 'DrNidhi', 'Pandey', 'nidhipandey20@example.com', '9876543220', 'MD', 0),
(38, 'DrManish', 'Srivastava', 'manishsrivastava21@example.com', '9876543221', 'BAMS', 0),
(39, 'DrSunita', 'Yadav', 'sunitayadav22@example.com', '9876543222', 'MS', 0),
(40, 'DrRohit', 'Sharma', 'rohitsharma23@example.com', '9876543223', 'MBBS', 0),
(41, 'DrShikha', 'Gupta', 'shikhagupta24@example.com', '9876543224', 'MD', 0),
(42, 'DrVivek', 'Verma', 'vivekverma25@example.com', '9876543225', 'BAMS', 0),
(43, 'DrDeepika', 'Singh', 'deepikasingh26@example.com', '9876543226', 'MS', 0),
(44, 'DrSunil', 'Kumar', 'sunilkumar27@example.com', '9876543227', 'MBBS', 0),
(45, 'DrAnanya', 'Sharma', 'ananyasharma28@example.com', '9876543228', 'MD', 0),
(46, 'DrRaj', 'Kumar', 'rajkumar29@example.com', '9876543229', 'BAMS', 0),
(47, 'DrShalini', 'Gupta', 'shalinigupta30@example.com', '9876543230', 'MS', 0),
(48, 'DrAlok', 'Singh', 'aloksingh31@example.com', '9876543231', 'MBBS', 0),
(49, 'DrPoonam', 'Choudhary', 'poonamchoudhary32@example.com', '9876543232', 'MD', 0),
(50, 'DrVikas', 'Sharma', 'vikassharma33@example.com', '9876543233', 'BAMS', 0),
(51, 'DrDivya', 'Verma', 'divyaverma34@example.com', '9876543234', 'MS', 0),
(52, 'DrRohini', 'Singh', 'rohinisingh35@example.com', '9876543235', 'MBBS', 0),
(53, 'DrArjun', 'Gupta', 'arjungupta36@example.com', '9876543236', 'MD', 0),
(54, 'DrKomal', 'Patel', 'komalpatel37@example.com', '9876543237', 'BAMS', 0),
(55, 'DrRishi', 'Sharma', 'rishisharma38@example.com', '9876543238', 'MS', 0),
(56, 'DrNisha', 'Kumari', 'nishakumari39@example.com', '9876543239', 'MBBS', 0),
(57, 'DrSachin', 'Kumar', 'sachinkumar40@example.com', '9876543240', 'MD', 0),
(58, 'DrShreya', 'Singh', 'shreyasingh41@example.com', '9876543241', 'BAMS', 0),
(59, 'DrRohit', 'Gupta', 'rohitgupta42@example.com', '9876543242', 'MS', 0),
(60, 'DrAnita', 'Verma', 'anitaverma43@example.com', '9876543243', 'MBBS', 0),
(61, 'DrAmita', 'Pandey', 'amitapandey44@example.com', '9876543244', 'MD', 0),
(64, 'syam', 'pal', 'syampal@gmail.com', '6787699789', 'BNYS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `session_token`) VALUES
(17, 1, '26df318e705bd16be898362468f10fbbf69cfa5e91319cb50e6e0b74d7d62608');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `created_at`) VALUES
(1, 'admin@gmail.com', 'admin@123', 'admin', '2024-08-05 16:59:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor_details`
--
ALTER TABLE `doctor_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `doctor_details`
--
ALTER TABLE `doctor_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
