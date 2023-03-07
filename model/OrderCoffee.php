<?php
// เป็น Class ที่ทำงานกับ table ใน Database
// เกี่ยวกับการสั่งซื้อสเมนูกาแฟ และมีการเชื่อมโยงกับ Table อื่นๆ ด้วย
// คือ Table-> order_tb, orderdetail_tb, customer_tb, product_tb, category_tb
// -- phpMyAdmin SQL Dump
// -- version 5.2.0
// -- https://www.phpmyadmin.net/
// --
// -- Host: 127.0.0.1
// -- Generation Time: Mar 07, 2023 at 05:12 AM
// -- Server version: 10.4.27-MariaDB
// -- PHP Version: 8.2.0

// SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
// START TRANSACTION;
// SET time_zone = "+00:00";


// /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
// /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
// /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
// /*!40101 SET NAMES utf8mb4 */;

// --
// -- Database: `dti_test_db`
// --
// CREATE DATABASE IF NOT EXISTS `dti_test_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
// USE `dti_test_db`;

// -- --------------------------------------------------------

// --
// -- Table structure for table `category_tb`
// --

// CREATE TABLE `category_tb` (
//   `categoryId` int(11) NOT NULL,
//   `categoryName` varchar(150) NOT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

// --
// -- Dumping data for table `category_tb`
// --

// INSERT INTO `category_tb` (`categoryId`, `categoryName`) VALUES
// (1, 'Coffee'),
// (2, 'Tea'),
// (3, 'Light'),
// (4, 'Milk/chocolate'),
// (5, 'Juice&smoothies');

// -- --------------------------------------------------------

// --
// -- Table structure for table `customer_tb`
// --

// CREATE TABLE `customer_tb` (
//   `customerId` int(11) NOT NULL,
//   `customerName` varchar(150) NOT NULL,
//   `customerPhone` varchar(20) NOT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

// --
// -- Dumping data for table `customer_tb`
// --

// INSERT INTO `customer_tb` (`customerId`, `customerName`, `customerPhone`) VALUES
// (1, 'สมบัติ ใจดี', '021111111'),
// (2, 'สมหมาย มากมิตร', '0911111111');

// -- --------------------------------------------------------

// --
// -- Table structure for table `orderdetail_tb`
// --

// CREATE TABLE `orderdetail_tb` (
//   `orderdetailId` int(11) NOT NULL,
//   `orderId` int(11) NOT NULL,
//   `productId` int(11) NOT NULL,
//   `orderQuantity` int(11) NOT NULL,
//   `orderPrice` int(11) NOT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

// --
// -- Dumping data for table `orderdetail_tb`
// --

// INSERT INTO `orderdetail_tb` (`orderdetailId`, `orderId`, `productId`, `orderQuantity`, `orderPrice`) VALUES
// (1, 1, 4, 2, 70),
// (2, 1, 6, 1, 40),
// (3, 2, 2, 3, 165),
// (4, 2, 4, 1, 35),
// (5, 2, 12, 2, 90);

// -- --------------------------------------------------------

// --
// -- Table structure for table `order_tb`
// --

// CREATE TABLE `order_tb` (
//   `orderId` int(11) NOT NULL,
//   `orderTotalPrice` float NOT NULL,
//   `orderDate` date NOT NULL,
//   `customerId` int(11) NOT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

// --
// -- Dumping data for table `order_tb`
// --

// INSERT INTO `order_tb` (`orderId`, `orderTotalPrice`, `orderDate`, `customerId`) VALUES
// (1, 110, '2022-03-01', 1),
// (2, 290, '2022-03-03', 1);

// -- --------------------------------------------------------

// --
// -- Table structure for table `product_tb`
// --

// CREATE TABLE `product_tb` (
//   `productId` int(11) NOT NULL,
//   `productName` varchar(150) NOT NULL,
//   `productPrice` float NOT NULL,
//   `categoryId` int(11) NOT NULL
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

// --
// -- Dumping data for table `product_tb`
// --

// INSERT INTO `product_tb` (`productId`, `productName`, `productPrice`, `categoryId`) VALUES
// (1, 'เอสเปรสโซ (ร้อน)', 35, 1),
// (2, 'เอสเปรสโซ (เย็น)', 55, 1),
// (3, 'เอสเปรสโซ (ปั่น)', 65, 1),
// (4, 'อเมริกาโน่ (ร้อน)', 35, 1),
// (5, 'อเมริกาโน่ (เย็น)', 45, 1),
// (6, 'ชา (ร้อน)', 40, 2),
// (7, 'ชาเขียว (ร้อน)', 45, 2),
// (8, 'ชาเขียว (เย็น)', 50, 2),
// (9, 'ไลท์คอฟฟี่ฮันนี่ (เย็น)', 55, 3),
// (10, 'มัทฉะลาเต้ (เย็น)', 55, 3),
// (11, 'นมสด (ร้อน)', 35, 4),
// (12, 'นมสด (เย็น)', 45, 4),
// (13, 'น้ำแตงโม (เย็น)', 40, 5);

// --
// -- Indexes for dumped tables
// --

// --
// -- Indexes for table `category_tb`
// --
// ALTER TABLE `category_tb`
//   ADD PRIMARY KEY (`categoryId`);

// --
// -- Indexes for table `customer_tb`
// --
// ALTER TABLE `customer_tb`
//   ADD PRIMARY KEY (`customerId`);

// --
// -- Indexes for table `orderdetail_tb`
// --
// ALTER TABLE `orderdetail_tb`
//   ADD PRIMARY KEY (`orderdetailId`);

// --
// -- Indexes for table `order_tb`
// --
// ALTER TABLE `order_tb`
//   ADD PRIMARY KEY (`orderId`);

// --
// -- Indexes for table `product_tb`
// --
// ALTER TABLE `product_tb`
//   ADD PRIMARY KEY (`productId`);

// --
// -- AUTO_INCREMENT for dumped tables
// --

// --
// -- AUTO_INCREMENT for table `category_tb`
// --
// ALTER TABLE `category_tb`
//   MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

// --
// -- AUTO_INCREMENT for table `customer_tb`
// --
// ALTER TABLE `customer_tb`
//   MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

// --
// -- AUTO_INCREMENT for table `orderdetail_tb`
// --
// ALTER TABLE `orderdetail_tb`
//   MODIFY `orderdetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

// --
// -- AUTO_INCREMENT for table `order_tb`
// --
// ALTER TABLE `order_tb`
//   MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

// --
// -- AUTO_INCREMENT for table `product_tb`
// --
// ALTER TABLE `product_tb`
//   MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
// COMMIT;

// /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
// /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
// /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


class OrderCoffee
{

    public $productId;
    public $productName;
    public $productPrice;
    public $categoryId;
    // category_tb
    public $categoryName;
    // customer_tb
    public $customerId;
    public $customerName;
    public $customerPhone;
    // order_tb
    public $orderId;
    public $orderTotalPrice;
    public $orderDate;
    // orderdetail_tb
    public $orderdetailId;
    // public $orderId; // ซ้ำกับ order_tb
    // public $productId; // ซ้ำกับ product_tb
    public $orderQuantity;
    public $orderPrice;

    private $conn_db;

    public function __construct($conn_db)
    {
        $this->conn_db = $conn_db;
    }

    // ฟังชั่นบันทึกข้อมูลการสั่งซื้อกาแฟของลูกค้า
    // ทำงาน 2 ตาราง order_tb และ orderdetail_tb
    public function insertOrderCoffee()
    {
        // คำสั่ง SQL บันทึกข้อมูลลงในตาราง order_tb
        $strSQL1 = "INSERT INTO order_tb (orderTotalPrice, orderDate, customerId) VALUES (:orderTotalPrice, :orderDate, :customerId)";

        $stat1 = $this->conn_db->prepare($strSQL1);

        $this->orderTotalPrice = floatval(htmlspecialchars(stripcslashes(strip_tags($this->orderTotalPrice))));
        $this->orderDate = date('Y-m-d H:i:s');
        $this->customerId = intval(htmlspecialchars(stripcslashes(strip_tags($this->customerId))));

        $stat1->bindParam(":orderTotalPrice", $this->orderTotalPrice);
        $stat1->bindParam(":orderDate", $this->orderDate);
        $stat1->bindParam(":customerId", $this->customerId);

        if ($stat1->execute()) {
            // บันทึกข้อมูลลงในตาราง order_tb สำเร็จ จึงจะบันทึกข้อมูลลงในตาราง orderdetail_tb
            // แบ่งเป็นสองขั้นตอน คือ 
            // 1. ค้นหาข้อมูล orderId ที่เพิ่งบันทึกลงในตาราง order_tb แล้ว
            // คำสั่ง SQL ค้นหาข้อมูล orderId ที่เพิ่งบันทึกลงในตาราง order_tb
            $strSQL2 = "SELECT orderId FROM order_tb WHERE customerId=" . $this->customerId . " AND orderDate=" . $this->orderDate;
            // สร้างตัวแปร $stat2
            $stat2 = $this->conn_db->prepare($strSQL2);

            $stat2->execute();
            // เข้าถึงข้อมูลที่ได้จากการค้นหา(select) แล้วคือ orderId
            $dataRow = $stat2->fetch(PDO::FETCH_ASSOC);
            extract($dataRow); //จะได้ตัวแปร $orderId โดยอัตโนมัติ
            // 2. บันทึกข้อมูลลงในตาราง orderdetail_tb
            // คำสั่ง SQL บันทึกข้อมูลลงในตาราง orderdetail_tb
            $strSQL3 = "INSERT INTO orderdetail_tb (orderId, productId, orderQuantity, orderPrice) VALUES (:orderId, :productId, :orderQuantity, :orderPrice)";

            $stat3 = $this->conn_db->prepare($strSQL3);

            $this->orderId = $orderId;
            $this->productId = intval(htmlspecialchars(stripcslashes(strip_tags($this->productId))));
            $this->orderQuantity = intval(htmlspecialchars(stripcslashes(strip_tags($this->orderQuantity))));
            $this->orderPrice = floatval(htmlspecialchars(stripcslashes(strip_tags($this->orderPrice))));

            $stat3->bindParam(":orderId", $this->orderId);
            $stat3->bindParam(":productId", $this->productId);
            $stat3->bindParam(":orderQuantity", $this->orderQuantity);
            $stat3->bindParam(":orderPrice", $this->orderPrice);

            if ($stat3->execute()) {
                // บันทึกข้อมูลลงในตาราง orderdetail_tb สำเร็จ
                return 1;
            } else {
                // บันทึกข้อมูลลงในตาราง orderdetail_tb ไม่สำเร็จ
                return -2;
            }
        } else {
            // บันทึกข้อมูลลงในตาราง order_tb ไม่สำเร็จ
            return -1;
        }
    }

    // ฟังชั่นแสดงข้อมูลการสั่งซื้อทั้งหมด

    // ฟังชั่นแสดงข้อมูลการสั่งซื้อรายวัน

    // ฟังชั่นแสดงข้อมูลการสั่งซื้อรายเดือน

    // ฟังชั่นแสดงข้อมูลการสั่งซื้อรายบุคคล
}

// push this folder to github
// git init
// git add .
// git commit -m "first commit"
// git branch -M main
// git remote add origin
// git push -u origin main