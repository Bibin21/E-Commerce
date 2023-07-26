-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 06:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `accinfo`
--

CREATE TABLE `accinfo` (
  `uid` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(1) NOT NULL,
  `otp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accinfo`
--

INSERT INTO `accinfo` (`uid`, `email`, `password`, `type`, `otp`) VALUES
(1, 'bibin.p.binu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 's', '143815'),
(2, 'ryzengamer00@gmail.com', '202cb962ac59075b964b07152d234b70', 's', ''),
(4, 'bibin@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'b', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `uid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `pid`, `uid`) VALUES
(13, 8, 4),
(14, 9, 4),
(16, 11, 4),
(19, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `description` varchar(300) NOT NULL,
  `source` varchar(200) NOT NULL,
  `category` varchar(30) NOT NULL,
  `sid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `name`, `price`, `description`, `source`, `category`, `sid`) VALUES
(7, 'Nikon Camera', 50000, '48 Megapixels', '..//images//cam1.jpg', 'camera', 1),
(8, 'Canon Camera', 100000, '64 megapixels', '..//images//cam3.jpg', 'camera', 1),
(9, 'SonyCamera', 1500000, '64 megapixels\r\nf=4.6-27.6mm', '..//images//cam4.jpg', 'camera', 2),
(10, 'Nike Jordans', 3000, 'Air Jordans', '..//images//nike.jpg', 'shoe', 2),
(11, 'Adidas shoes', 5000, 'SL 20.2', '..//images//addidas.jpg', 'shoe', 1),
(17, 'watch', 30000, 'Louis Vuitton', '..//images//watch.jpg', 'Watch', 2),
(20, 'shirt', 1500, 'Formal Shirt', '..//images//shirt.jpg', 'shirt', 2),
(21, 'Shirt', 2000, 'casual shirt', '..//images//shirt (3).jpg', 'shirt', 1),
(22, 'watch', 3000, 'Hublot watch', '..//images//watch (4).jpg', 'Watch', 1),
(23, 'Shoes', 1000, 'sneakers', '..//images//shoe.jpg', 'Shoes', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accinfo`
--
ALTER TABLE `accinfo`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accinfo`
--
ALTER TABLE `accinfo`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
