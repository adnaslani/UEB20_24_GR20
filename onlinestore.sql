-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 11:10 AM
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
-- Database: `onlinestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(5, 'Gaming Chairs'),
(6, 'Headphones'),
(7, 'Monitor'),
(8, 'Keyboard'),
(9, 'Laptop'),
(10, 'Holder');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`) VALUES
(1, 'Hello', 'hi', '2024-04-16 15:36:24'),
(2, 'Hello', 'hi', '2024-04-17 01:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_data` text NOT NULL,
  `notes` text DEFAULT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_data`, `notes`, `total`) VALUES
(15, 6, 'Adna Aslani<br />043884561<br />adna.aslani@gmail.com<br />Rečane, 28 septembar', '', 325),
(16, 6, 'Adna Aslani<br />043884561<br />adna.aslani@gmail.com<br />Rečane, 28 septembar', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) DEFAULT NULL,
  `products_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `products_id`) VALUES
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(15, 21);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT 0,
  `description` text DEFAULT NULL,
  `image` varchar(150) DEFAULT 'noimage.png',
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `price`, `qty`, `discount`, `description`, `image`, `category_id`) VALUES
(11, NULL, 'Gaming Chairs', 99.9, 10, 0, 'Gaming Chairs Sense7', '1684243735karrige sense7.jpg', 5),
(12, NULL, 'Headphones', 89.5, 10, 10, 'HyperX Cloud II Headset, Gray Black', '1684247600Kufje HyperX Cloud II, të zeza hirta 89.50 euro.jpg', 6),
(13, NULL, 'Canyon TWS-1 headphones', 78.5, 5, 2, 'Canyon TWS-1 headphones, black', '1684247640Dëgjuese Canyon TWS-1, të zeza 22.504.jpg', 6),
(14, NULL, 'Acer Nitro monitor, black', 99, 12, 10, 'Acer Nitro monitor, black', '1684247666Monitor Acer Nitro ,i zi 639.50.jpg', 7),
(15, NULL, 'SteelSeries Apex 3 TKL Keyboard, US', 120.35, 7, 20, 'SteelSeries Apex 3 TKL Keyboard, US', '1684244752Tastierë SteelSeries Apex 3 TKL, US, e zezë.jpg', 8),
(16, NULL, 'Satechi Dual Vertical Stand for MacBook Pro and iPad', 67, 3, 0, 'Satechi Dual Vertical Stand for MacBook Pro and iPad', '1684247707Mbajtëse Satechi Dual Vertical për MacBook Pro dhe iPad, e hirtë 67 euro.jpg', 10),
(17, NULL, 'Laptop Victus by HP ', 98, 2, -1, 'Laptop Victus by HP 816.50', '1684245088Laptop Victus by HP 816.50.jpg', 9),
(18, NULL, 'Monitor Samsung Odyssey', 135.55, 1, 2, 'Monitor Samsung Odyssey G32AFull HD', '1684247735Monitor Samsung Odyssey G32AFull HD 169.50.jpg', 7),
(19, NULL, 'Laptop Dell G15', 1578, 6, 3, 'Laptop Dell G15 (5525), AMD Ryzen', '1684247768Laptop Dell G15 (5525), AMD Ryzen 7 1,578 euro.jpg', 9),
(20, NULL, 'Laptop Lenovo Legion 5 ', 1461.99, 3, 4, 'Laptop Lenovo Legion 5 17ACH6H, 17.3', '1684247788Laptop Lenovo Legion 5 17ACH6H, 17.3 1,461 euro.jpg', 9),
(21, NULL, 'SENSE7 Spellcaster chair, black', 325, 1, 11, 'SENSE7 Spellcaster chair, black', '1684247813Karrige SENSE7 Spellcaster, e zezë.jpg', 5),
(22, NULL, 'DXRacer Formula Seat, Black', 421.3, 3, 5, 'DXRacer Formula Seat, Black', '1684246952Karrige DXRacer Formula , e zezë gjelbërt.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `subtitle` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `image` varchar(255) NOT NULL DEFAULT 'noimage.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `title`, `subtitle`, `is_active`, `image`) VALUES
(22, 'Samusung HQ TV', 'The real world on your screen', 0, 'promotion1.jpg'),
(23, 'Gaming Chairs', 'Comfortable chair from ASUS', 1, 'promotion2.jpg'),
(26, 'ASUS ROG Strike 500', 'Best gaming laptop of 2023', 0, 'promotion3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` text DEFAULT NULL,
  `answered` tinyint(4) DEFAULT 0,
  `answer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answered`, `answer`) VALUES
(1, 'Hello how are you ', 1, 'Hello good '),
(2, 'hellp', 1, 'hi good '),
(3, 'hello how are you ', 1, 'good'),
(4, 'Hej si po kaloni ', 1, 'Mire'),
(5, 'How can I order', 1, 'You can order when you select products'),
(6, 'How can i see what i order?', 0, NULL),
(7, 'Can i have 2 or 3 products in my cart?', 0, NULL),
(8, 'How to  return products ', 0, NULL),
(9, 'Can i see product?', 1, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT 'avatar.png',
  `role` varchar(45) DEFAULT ' customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `address`, `phone`, `avatar`, `role`) VALUES
(6, 'Adna', 'Aslani', 'adna.aslani@gmail.com', '$2y$10$1dQk9oyZ.3RotcbipA50gOF3bZQiEwXOTeuvINmLZoKExCSASglMS', NULL, NULL, 'avatar.png', ' customer'),
(7, 'Adna', 'Aslani', 'adna.aslani@student.uni-pr.edu', '$2y$10$IVdOYpa8eYAI4kzy4OX29u/e9Spu4DNl5StzcthQeTxJHx.NXKlge', NULL, NULL, 'avatar.png', ' customer'),
(8, 'Adna', 'Aslani', 'adna.aslani@student.uni-pr.edu', '$2y$10$7SjspiCH/nQFp3rd1GMsL.DPmq.ZX/fOsUZNjmoIbmm4PcGZ83KD.', NULL, NULL, 'avatar.png', ' customer'),
(9, 'Adna', 'Aslani', 'adna.aslani@student.uni-pr.edu', '$2y$10$MOPFTvGzfB1JQ5mbYwLDv.VHHs4vAc.3qrY9VOnfT8EATJZQ1/ete', NULL, NULL, 'avatar.png', ' customer'),
(10, 'Adna', 'Aslani', 'adna.aslani@student.uni-pr.edu', '$2y$10$pr8aTpt63Sqg34APaJjtl.l9rUQSjK6nSkPD0xbab2lWwL.sK3E0q', NULL, NULL, 'avatar.png', ' customer'),
(11, 'Adna', 'Aslani', 'adna.aslani@student.uni-pr.edu', '$2y$10$sobHWdTm17bxtn6/AXdqsuq4p2qTPF857u8coZFWQxrjurwMwaiQS', NULL, NULL, 'avatar.png', ' customer'),
(12, 'Adna', 'Aslani', 'adna.aslani@student.uni-pr.edu', '$2y$10$UYmxcl.G0nDVeGHLt7vB0uHRtUMFofEwrolA8DkM.qL2SlxgqzH0u', NULL, NULL, 'avatar.png', ' customer'),
(13, 'Adna', 'Aslani', 'adna.aslani@student.uni-pr.edu', '$2y$10$0Dbl/QRwz9FhTjXH6io0b.ozK6cJAFoy2qzphx6tHwNUoscTVzVSu', NULL, NULL, 'avatar.png', ' customer'),
(14, 'Adna', 'Aslani', 'adna.aslani@student.uni-pr.edu', '$2y$10$9owAUZX9J2OfU05H2Y2zPeL0tDoyX5x8cWWnayDMCkfg/uCJ6FpBW', NULL, NULL, 'avatar.png', ' customer'),
(15, 'Adna', 'Aslani', 'adna.aslani@student.uni-pr.edu', '$2y$10$azzCJlRI/WUXHE7QvLntnOq7sLLedIptyXb40t9ivyXcqJtolTZYG', NULL, NULL, 'avatar.png', ' customer'),
(16, 'Adna', 'Aslani', 'adna.aslani@student.uni-pr.edu', '$2y$10$rg7LICps0Dm7I2DYWD6GHuKGmfXGXSbtSs9i5p0xFTMzE29rZNBa2', NULL, NULL, 'avatar.png', ' customer'),
(17, 'Adna', 'Aslani', 'adna.aslani@student.uni-pr.edu', '$2y$10$b5.XquW9/22SznDVa..AWOxMPwlJmtpn9yqoKj7POMHtw0/1q.W5O', NULL, NULL, 'avatar.png', ' customer'),
(18, 'Adna', 'Aslani', 'adna.aslani@student.uni-pr.edu', '$2y$10$.gjjMZvUY8StK1evv5aOEusLUxQGnXcyJL0weB0wklyDPrqRw6rwS', NULL, NULL, 'avatar.png', ' customer'),
(19, 'Adna', 'Aslani', 'adna.aslani@student.uni-pr.edu', '$2y$10$RrO8nQecVqrRgL584483seo9Rxo.wPk999zSZQaSqlvHrvcXvgAuC', NULL, NULL, 'avatar.png', ' customer'),
(20, 'Adna', 'Aslani', 'adna.aslani@student.uni-pr.edu', '$2y$10$4B7xktfuQ82asMQIgxTqeeTgK6Uu.bNPlRYHDQ6fGpxzLq4FJQW/m', NULL, NULL, 'avatar.png', ' customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_users_idx` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `fk_op_orders_idx` (`order_id`),
  ADD KEY `fk_op_products_idx` (`products_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_products_user_idx` (`user_id`),
  ADD KEY `fk_products_categories_idx` (`category_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `fk_op_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_op_products` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_products_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
