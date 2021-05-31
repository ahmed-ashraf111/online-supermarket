-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 11:55 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(60) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `qty`, `price`, `category`, `img`) VALUES
(1, 'El Maleka Stripy Penne Pasta', 20, 4, 'pasta', '1.jpg'),
(2, 'Queen Penne Pasta', 20, 3, 'pasta', '2.jpg'),
(3, 'Regina Vermicelli', 15, 11, 'pasta', '3.jpg'),
(4, 'El Mizan Rice', 10, 6, 'rice', '4.jpg'),
(5, 'Al Suhagy Rice', 5, 14, 'rice', '5.jpg'),
(6, 'Vitrac Raspberry Jam', 7, 20, 'jam', '6.jpg'),
(7, 'Vitrac Orange Jam', 30, 20, 'jam', '7.jpg'),
(8, 'CRYSTAL SUNFLOWER OIL 2.2 L', 50, 70, 'oil', '8.jpg'),
(9, 'Afia Sunflower Oil - 1.6 Liter', 20, 50, 'oil', '9.jpg'),
(10, 'Rawaby Vegetable Ghee - 1.5Kg', 14, 45, 'chee', '10.jpg'),
(11, 'Ganna Wegetables Ghee - 1.5 kg', 13, 45, 'chee', '11.jpg'),
(12, 'Crystal Vegetable Ghee Gold 1.5 k', 17, 40, 'chee', '12.jpg'),
(13, 'Oreo Chocolate Filled Biscuits - 28.5gm - Pack of 12', 50, 24, 'Biscuits & Cakes', '13.jpg'),
(14, 'BISKREM COOKIES W CHOCO CHIPS 2P*12', 30, 24, 'Biscuits & Cakes', '14.jpg'),
(15, 'Hohos Jumbo Swiss Roll Cake - 40gm', 100, 2, 'Biscuits & Cakes', '15.jpg'),
(16, 'Twinkies Chocolate Cake With Chocolate Cream - 1 Piece', 200, 2, 'Biscuits & Cakes', '16.jpg'),
(17, 'Cadbury Moro Chocolate - Pack of 4+1', 50, 19, 'Chocolate', '17.jpg'),
(18, 'Cadbury Dairy Milk Chocolate, 37 gm - Pack of 5', 20, 38, 'Chocolate', '18.jpg'),
(19, 'Twix Chocolate - 4+1 Fingers', 30, 40, 'Chocolate', '19.jpg'),
(20, 'Galaxy Milk Chocolate - 36gm', 30, 9, 'Chocolate', '20.jpg'),
(35, 'makrona', 20, 20, 'pasta', 'icon2.jpg'),
(36, 'pasta', 20, 20, 'pasta', 'icon2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `role`, `address`, `phone_number`, `email`, `password`, `created_at`) VALUES
(1, 'ahmed', 'ashraf', 1, '3 aa street', '123456789', 'medomody400@gmail.com', '123', '2021-05-30 18:40:59'),
(2, 'mahmoud', 'khaled', 1, '15 bb street', '132456789', 'mkmensh@gmail.com', '123', '2021-05-28 13:45:49'),
(3, 'yossef', 'magdy', 0, 'pp street ', '12345698', 'oo@gmail.com', '123', '2021-05-26 22:21:35'),
(4, 'ali', 'ali', 0, 'yy street', '12345679', 'mm@gmail.com', '123', '2021-05-26 22:21:35'),
(5, 'Hoda', 'Alaa', 1, '', '', 'AH@gmail.com', '123', '2021-05-30 17:14:46'),
(6, 'Ragab', 'Hossam', 1, '', '', 'rh@gmail.com', '12345678', '2021-05-30 17:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_history`
--

CREATE TABLE `user_history` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_product`
--

CREATE TABLE `user_product` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_history`
--
ALTER TABLE `user_history`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_history`
--
ALTER TABLE `user_history`
  ADD CONSTRAINT `user_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_history_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
