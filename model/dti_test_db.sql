-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 05:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dti_test_db`
--
CREATE DATABASE IF NOT EXISTS `dti_test_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dti_test_db`;

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

CREATE TABLE `category_tb` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`categoryId`, `categoryName`) VALUES
(1, 'Coffee'),
(2, 'Tea'),
(3, 'Light'),
(4, 'Milk/chocolate'),
(5, 'Juice&smoothies');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `customerId` int(11) NOT NULL,
  `customerName` varchar(150) NOT NULL,
  `customerPhone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer_tb`
--

INSERT INTO `customer_tb` (`customerId`, `customerName`, `customerPhone`) VALUES
(1, 'สมบัติ ใจดี', '021111111'),
(2, 'สมหมาย มากมิตร', '0911111111');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail_tb`
--

CREATE TABLE `orderdetail_tb` (
  `orderdetailId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `orderQuantity` int(11) NOT NULL,
  `orderPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orderdetail_tb`
--

INSERT INTO `orderdetail_tb` (`orderdetailId`, `orderId`, `productId`, `orderQuantity`, `orderPrice`) VALUES
(1, 1, 4, 2, 70),
(2, 1, 6, 1, 40),
(3, 2, 2, 3, 165),
(4, 2, 4, 1, 35),
(5, 2, 12, 2, 90);

-- --------------------------------------------------------

--
-- Table structure for table `order_tb`
--

CREATE TABLE `order_tb` (
  `orderId` int(11) NOT NULL,
  `orderTotalPrice` float NOT NULL,
  `orderDate` date NOT NULL,
  `customerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_tb`
--

INSERT INTO `order_tb` (`orderId`, `orderTotalPrice`, `orderDate`, `customerId`) VALUES
(1, 110, '2022-03-01', 1),
(2, 290, '2022-03-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_tb`
--

CREATE TABLE `product_tb` (
  `productId` int(11) NOT NULL,
  `productName` varchar(150) NOT NULL,
  `productPrice` float NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_tb`
--

INSERT INTO `product_tb` (`productId`, `productName`, `productPrice`, `categoryId`) VALUES
(1, 'เอสเปรสโซ (ร้อน)', 35, 1),
(2, 'เอสเปรสโซ (เย็น)', 55, 1),
(3, 'เอสเปรสโซ (ปั่น)', 65, 1),
(4, 'อเมริกาโน่ (ร้อน)', 35, 1),
(5, 'อเมริกาโน่ (เย็น)', 45, 1),
(6, 'ชา (ร้อน)', 40, 2),
(7, 'ชาเขียว (ร้อน)', 45, 2),
(8, 'ชาเขียว (เย็น)', 50, 2),
(9, 'ไลท์คอฟฟี่ฮันนี่ (เย็น)', 55, 3),
(10, 'มัทฉะลาเต้ (เย็น)', 55, 3),
(11, 'นมสด (ร้อน)', 35, 4),
(12, 'นมสด (เย็น)', 45, 4),
(13, 'น้ำแตงโม (เย็น)', 40, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `orderdetail_tb`
--
ALTER TABLE `orderdetail_tb`
  ADD PRIMARY KEY (`orderdetailId`);

--
-- Indexes for table `order_tb`
--
ALTER TABLE `order_tb`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_tb`
--
ALTER TABLE `category_tb`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderdetail_tb`
--
ALTER TABLE `orderdetail_tb`
  MODIFY `orderdetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_tb`
--
ALTER TABLE `order_tb`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_tb`
--
ALTER TABLE `product_tb`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
