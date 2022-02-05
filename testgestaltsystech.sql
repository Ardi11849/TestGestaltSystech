-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 06:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testgestaltsystech`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `Book_id` bigint(20) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Author` varchar(100) DEFAULT NULL,
  `Price_rent` bigint(20) DEFAULT NULL,
  `Book_Category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`Book_id`, `Title`, `Author`, `Price_rent`, `Book_Category`) VALUES
(1, 'testing', 'test', 100000, 'MANGGA'),
(2, 'test2', '', 5000, 'MANGGA'),
(3, 'One Piece', 'Eiichiro Oda', 15000, 'MANGGA'),
(4, 'Harry Potter', 'J.K.Rowling', 20000, 'NOVEL');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_id` bigint(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Identity_card_number` varchar(50) NOT NULL,
  `Address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_id`, `Name`, `Identity_card_number`, `Address`) VALUES
(1, 'Ardi', 'ABC123', 'test address'),
(2, 'Testing', 'ABCD12354617', '');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `Rent_id` bigint(20) NOT NULL,
  `Customer_id` bigint(20) NOT NULL,
  `Book_id` bigint(20) NOT NULL,
  `Date_rent` date NOT NULL,
  `Date_return` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`Rent_id`, `Customer_id`, `Book_id`, `Date_rent`, `Date_return`) VALUES
(1, 1, 3, '2022-02-05', '2022-02-17'),
(2, 1, 3, '2022-02-05', '2022-02-15'),
(3, 1, 4, '2022-02-05', '2022-02-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`Book_id`),
  ADD KEY `Book_id` (`Book_id`,`Title`,`Author`,`Price_rent`,`Book_Category`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_id`),
  ADD KEY `Customer_id` (`Customer_id`,`Name`,`Identity_card_number`,`Address`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`Rent_id`),
  ADD KEY `Rent_id` (`Rent_id`,`Customer_id`,`Book_id`,`Date_rent`,`Date_return`),
  ADD KEY `Customer_id` (`Customer_id`),
  ADD KEY `Book_id` (`Book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `Book_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `Rent_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customer` (`Customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rent_ibfk_2` FOREIGN KEY (`Book_id`) REFERENCES `buku` (`Book_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
