-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2017 at 06:39 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `globalproducts`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code_name` varchar(355) DEFAULT NULL,
  `dimension` varchar(255) DEFAULT NULL,
  `size` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image_path` varchar(355) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `region_id` int(11) NOT NULL,
  `format_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `finish_id` int(11) NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `name`, `code_name`, `dimension`, `size`, `status`, `description`, `image_path`, `image_name`, `region_id`, `format_id`, `brand_id`, `finish_id`, `is_active`, `material`, `weight`) VALUES
(1, 'Alvalle 250ml', 'N/A', '5.47in x 2.02in x 2.02in<br>5.47mm x 2.02mm x 2.02mm', 250, 'Active', 'Product desc', 'assets/images/products', '1.jpg', 5, 2, 4, 2, 1, '', ''),
(2, 'Naked 10oz', 'N/A', '5.16in X 2.35in x 2.42in', 10, 'Active', 'Product desc', 'assets/images/products', '2.jpg', 2, 2, 5, 2, 1, '', ''),
(3, 'Naked 15.2oz', 'N/A', '7.03in X 2.29in x 2.29in', 15, 'Active', 'Product desc', 'assets/images/products', '3.jpg', 6, 2, 5, 4, 1, '', ''),
(4, 'Trop PP 32oz', 'N/A', '9.08in X 3.05in x 3.05in', 32, 'Active', 'Product desc', 'assets/images/products', '4.jpg', 7, 2, 2, 1, 1, '', ''),
(5, 'Naked 64oz', 'N/A', '10.4in X 4.05in x 4.05in', 64, 'Active', 'Product desc', 'assets/images/products', '5.jpg', 5, 2, 2, 2, 1, '', ''),
(6, 'Pomi 17.64oz', 'N/A', '5.856in X 2.89in x 2.42in', 18, 'Active', 'Product desc', 'assets/images/products', '6.jpg', 6, 4, 3, 5, 1, '', ''),
(7, 'Trop 10oz', 'N/A', '6.9in X 2.25in x 2.25in', 10, 'Active', 'Product desc', 'assets/images/products', '7.jpg', 2, 2, 2, 3, 1, '', ''),
(8, 'Trop 15oz', 'N/A', '7.53in X 2.57in x 2.57in', 15, 'Active', 'Product desc', 'assets/images/products', '8.jpg', 3, 2, 2, 4, 1, '', ''),
(9, 'Trop 32oz', 'N/A', '9.34in X 3.36in x 3.36in', 32, 'Active', 'Product desc', 'assets/images/products', '9.jpg', 6, 2, 2, 2, 1, '', ''),
(10, 'Trop 64oz', 'N/A', '10.5in X 4.4in x 3.5in', 64, 'Active', 'Product desc', 'assets/images/products', '10.jpg', 7, 2, 2, 3, 1, '', ''),
(11, 'Trop 96oz', 'N/A', '11.6in X 5.4in x 5.4in', 96, 'Active', 'Product desc', 'assets/images/products', '11.jpg', 6, 2, 2, 5, 1, '', ''),
(12, 'Trop Farm 46oz', 'N/A', '9.95in X 4.156in x 3.23in', 46, 'Active', 'Product desc', 'assets/images/products', '12.jpg', 4, 2, 2, 2, 1, '', ''),
(13, 'Trop PP 8oz', 'N/A', '4.28in X 2.38in x 2.33in', 8, 'Active', 'Product desc', 'assets/images/products', '13.jpg', 3, 4, 2, 4, 1, '', ''),
(14, 'Trop PP 12oz', 'N/A', '7.29in X 2.34in x 2.34in', 12, 'Active', 'Product desc', 'assets/images/products', '14.jpg', 6, 2, 2, 3, 1, '', ''),
(15, 'Trop PP 59oz', 'N/A', '10in X 4.5in x 4.26in', 59, 'Active', 'Product desc', 'assets/images/products', '15.jpg', 6, 2, 2, 3, 1, '', ''),
(16, 'Trop PP 89oz', 'N/A', '10.35in X 6.44in x 4.183in', 89, 'Active', 'Product desc', 'assets/images/products', '16.jpg', 5, 2, 2, 2, 1, '', ''),
(17, 'Trop PP 118oz', 'N/A', '10.3in X 6.7in x 5.46in', 118, 'Active', 'Product desc', 'assets/images/products', '17.jpg', 5, 2, 2, 4, 1, '', ''),
(18, 'Trop PP 128oz', 'N/A', '9.95in X 6.7in x 5.56in', 128, 'Active', 'Product desc', 'assets/images/products', '18.jpg', 5, 2, 2, 3, 1, '', ''),
(19, 'Trop PP 150ml', 'N/A', '3.9in X 2in x 2in', 150, 'Active', 'Product desc', 'assets/images/products', '19.jpg', 5, 5, 2, 2, 1, '', ''),
(20, 'Trop PP 850ml', 'N/A', '9.2in X 2.7in x 2.7in', 850, 'Active', 'Product desc', 'assets/images/products', '20.jpg', 6, 4, 2, 2, 1, '', ''),
(21, 'Trop Twister 20oz', 'N/A', '8.23in X 2.75in x 2.75in', 20, 'Active', 'Product desc', 'assets/images/products', '21.jpg', 5, 2, 2, 4, 1, '', ''),
(22, 'Trop Twister 59oz', 'N/A', '9.31in X 4.38in x 4.38in', 59, 'Active', 'Product desc', 'assets/images/products', '22.jpg', 3, 4, 2, 3, 1, '', ''),
(23, 'Copella 50oz', 'N/A', '10.3in X 3.7in', 2, 'Active', 'Product desc', 'assets/images/products', '23.jpg', 3, 4, 2, 3, 1, '', ''),
(24, 'Copella 10oz', 'N/A', '6.5in X 2.1in', 300, 'Active', 'Product desc', 'assets/images/products', '24.jpg', 3, 4, 2, 3, 1, '', ''),
(25, 'Copella 900ml', 'N/A', '10.3in X 3.7in', 900, 'Active', 'Product desc', 'assets/images/products', '25.jpg', 3, 4, 2, 3, 1, '', ''),
(26, 'Trop PP 2L', 'N/A', '10.3in X 3.7in', 2, 'Active', 'Product desc', 'assets/images/products', '26.jpg', 3, 4, 2, 3, 1, '', ''),
(27, 'Trop PP 8oz', 'N/A', '5.8in X2.1in', 250, 'Active', 'Product desc', 'assets/images/products', '27.jpg', 3, 4, 2, 3, 1, '', ''),
(28, 'Trop 50 67oz', 'N/A', '9.8in X 4in', 2, 'Active', 'Product desc', 'assets/images/products', '28.jpg', 3, 4, 2, 3, 1, '', ''),
(29, 'Kavita 15oz', 'N/A', '1in x 2in x 3in', 13, 'Active', 'Product Desc', 'assets/images/products', '29.jpg', 4, 2, 5, 2, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
