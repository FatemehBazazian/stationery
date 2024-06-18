-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2024 at 04:06 PM
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
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `orderdate` date NOT NULL,
  `pro_code` int(10) NOT NULL,
  `pro_qty` int(10) NOT NULL,
  `pro_price` float NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(400) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `orderdate`, `pro_code`, `pro_qty`, `pro_price`, `mobile`, `address`) VALUES
(1, 'sara', '2024-06-09', 2, 68, 20000, '09163410272', 'تهران'),
(2, 'sm', '2024-06-14', 12, 2, 10000, '09022222222', 'شیراز'),
(3, 'sm', '2024-06-15', 12, 3, 10000, '09121112211', 'مازندران'),
(4, 'sm', '2024-06-15', 11, 5, 30000, '09112223344', 'اراک'),
(5, 'sm', '2024-06-15', 2, 1, 20000, '09121112211', 'زاهدان'),
(6, 'yas', '2024-06-16', 6, 3, 89000, '09121112211', 'ارومیه'),
(7, 'yas', '2024-06-16', 6, 3, 89000, '09121112211', 'ارومیه'),
(8, 'sara', '2024-06-16', 7, 2, 3900000, '09022222222', 'هرمزگان');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_code` int(10) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `pro_qty` int(10) NOT NULL,
  `pro_price` float NOT NULL,
  `pro_image` varchar(80) NOT NULL,
  `pro_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_code`, `pro_name`, `pro_qty`, `pro_price`, `pro_image`, `pro_detail`) VALUES
(1, 'ماژیک وایت برد', 37, 15000, 'whiteboard.jpg', 'ماژیک وایت برد آبی'),
(2, 'غلط گیر', 66, 20000, 'corrector.jpg', 'غلط گیر 7 میلی لیتری مدل Cc Class'),
(3, 'پاک کن', 230, 80000, 'eraser.jpg', 'پاک کن سفید مدل Stabilo'),
(4, 'ماژیک هایلایتر', 480, 550000, 'highlighter.jpeg', 'ماژیک علامت گذار مدل Panter'),
(5, 'ماژیک رنگی', 60, 900000, 'market.jpg', ' ماژیک رنگ آمیزی 7 رنگ'),
(6, 'دفترچه', 53, 89000, 'notebook.jpg', ' دفترچه سیمی 80 برگ همراه با خودکار آبی'),
(7, 'دفتر', 31, 3900000, 'Notebooks.jpg', ' دفتر سیمی 50 برگ'),
(8, 'خودکار', 87, 7000, 'pen.jpg', ' خودکار کیان نوک 0.7'),
(9, 'خودکار رنگی', 44, 190000, 'pen20.jpg', ' خودکار 12 رنگ مدل pure'),
(10, 'مداد', 67, 10000, 'pencil.jpg', 'مداد طراحی مدل Lyra'),
(11, 'جامدادی', 10, 30000, 'pencilcase.jpg', 'جامدادی صورتی طرح چرم '),
(12, 'مداد تراش', 42, 10000, 'Pencil-Sharpener.jpg', 'مداد تراش قرمز یک کاره'),
(13, 'گیره کاغذ', 230, 35000, 'pin.jpg', ' گیره کاغذ فلزی بسته 100 عددی'),
(16, 'مدادرنگی', 67, 50000, 'colored_pencil.jpg', 'مداد رنگی 12 رنگ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `realname` varchar(80) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`realname`, `username`, `password`, `email`, `type`) VALUES
('fatemeh', 'admin', '123', 'admin@medu.ir', 1),
('sara moradi', 'sara', '123', 'sara@irib.ir', 0),
('sima', 'sm', '345', 'sima@gmail.com', 0),
('yas', 'yas', '345', 'y@ir.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
