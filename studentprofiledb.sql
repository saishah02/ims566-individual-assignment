-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2024 at 03:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentprofiledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_form`
--

CREATE TABLE `student_form` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `semester` varchar(100) NOT NULL,
  `matrixnumber` varchar(100) NOT NULL,
  `faculty` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cgpa` varchar(100) NOT NULL,
  `residence` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mentor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_form`
--

INSERT INTO `student_form` (`id`, `name`, `semester`, `matrixnumber`, `faculty`, `address`, `cgpa`, `residence`, `mentor`, `username`, `password`, `image`, `status`) VALUES
(67, 'Siti Aishah Binti Ahmad Munif', '2', '2024176165', 'School of Information Science', 'No. 20 Jalan SP3/2 Bandar Saujana Putra', '3.35', 'nonresidence', 'Pn. Nor Azreen', 'aishahmunif', '1234567', NULL, 'ADMIN'),
(68, 'Siti Amirah Binti Ahmad Munif', '2', '2024105165', 'Business Management', 'No. 20 Jalan SP3/2 Bandar Saujana Putra', '3.42', 'residence', 'En. Faiz', 'amirahmunif', '1234567', NULL, 'user'),
(69, 'Jannah Binti Adnan', '3', '2023105165', 'School of Information Science', '123, bukit melut, malaysia', '3.35', 'nonresidence', 'Pn. Nor Azreen', 'jannah', '4f9b8928', NULL, 'user'),
(72, 'Hannani Binti Amin', '5', '2022197864', 'Office management', 'No. 15, Jalan Bukit Damai 2,   Taman Bukit Indah,   81200 Johor Bahru,   Johor, Malaysia.', '3.25', 'residence', 'Pn. Huda', 'hannamin', '1bda1345', NULL, 'user'),
(73, 'Nur Aisyah binti Ahmad Faiz', '5', '2021345657', 'Faculty of Accountancy', 'No. 8, Lorong Kenanga 5,   Taman Sri Mawar,   43000 Kajang,   Selangor, Malaysia.', '3.5', 'nonresidence', 'Pn. Huda', 'aisyahfaiz', 'a88bc800', NULL, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_form`
--
ALTER TABLE `student_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_form`
--
ALTER TABLE `student_form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
