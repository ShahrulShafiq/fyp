-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2020 at 07:46 PM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evm`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `business_id` int(100) NOT NULL,
  `businessemail` varchar(255) NOT NULL,
  `businessname` varchar(100) NOT NULL,
  `services` varchar(100) NOT NULL,
  `phoneno` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`id`, `username`, `business_id`, `businessemail`, `businessname`, `services`, `phoneno`, `address`, `district`) VALUES
(1, 'Aiman Bazli', 17, 'sshafiq1912@gmail.com', 'Ajwa Kitchen', 'Caterers', '23132', 'Gadong', 'Brunei-Muara'),
(2, 'Shahrul Shafiq', 17, 'sshafiq1912@gmail.com', 'Ajwa Kitchen', 'Caterers', '23132', 'Gadong', 'Brunei-Muara');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `rating` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `feedback` varchar(400) NOT NULL,
  `username` varchar(100) NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT '2020-11-19'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `rating`, `title`, `feedback`, `username`, `vendor_name`, `date`) VALUES
(1, 3, 'Good Services', 'Happy to work with them', 'Aiman Bazli', 'Ajwa Kitchen', '2020-09-12'),
(2, 2, 'Good Services', 'Fabulous to work with ', 'Aiman Bazli', 'Haji Photography', '2020-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`) VALUES
(1, 'aiman.png', '2020-09-03 00:00:00'),
(2, 'aiman.png', '2020-09-12 17:50:17'),
(3, 'jm.jpg', '2020-09-12 17:53:49'),
(4, 'sa.jpg', '2020-09-12 18:03:42');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(16, 9, '2020-08-29 15:02:45', 'no'),
(17, 9, '2020-08-29 15:06:59', 'no'),
(18, 9, '2020-09-12 01:28:53', 'no'),
(19, 9, '2020-09-12 02:29:47', 'no'),
(20, 9, '2020-09-12 03:35:54', 'no'),
(21, 10, '2020-09-12 03:45:21', 'no'),
(22, 11, '2020-09-12 03:49:22', 'no'),
(23, 13, '2020-09-12 05:31:59', 'no'),
(24, 13, '2020-09-12 08:20:28', 'no'),
(25, 9, '2020-09-12 15:07:10', 'no'),
(26, 9, '2020-09-12 16:35:58', 'no'),
(27, 9, '2020-09-12 17:28:09', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `products` varchar(100) NOT NULL,
  `amount_paid` varchar(100) NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `address`, `products`, `amount_paid`, `order_code`, `status`) VALUES
(10, 13, 'Aiman Bazli', 'sshafiq1911@gmail.com', '1St Floor Kompleks Kotaraya Jln Cheng Lock 50000 W', 'Haji Photography(1),Flower Bouquet(1)', '200', '5f5c89ee62058', 'Paid'),
(11, 9, 'Shahrul Shafiq', 'sshafiq1912@gmail.com', '1St Floor Kompleks Kotaraya Jln Cheng Lock 50000 W', 'Milo BN (1),Flower Bouquet(1)', '150', '5f5d248621cf3', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `payer_id`, `payer_email`, `amount`, `currency`, `payment_status`) VALUES
(2, 'PAYID-L5OH4GA99T26307B3080161G', 'VMG2WGCY6NABQ', 'sb-w43bze3179741@personal.example.com', 150.00, 'SGD', 'approved'),
(3, 'PAYID-L5OH5SY6GW20566ET890561G', 'VMG2WGCY6NABQ', 'sb-w43bze3179741@personal.example.com', 150.00, 'SGD', 'approved'),
(4, 'PAYID-L5OH7GQ6TL11782FL668212A', 'VMG2WGCY6NABQ', 'sb-w43bze3179741@personal.example.com', 200.00, 'SGD', 'approved'),
(5, 'PAYID-L5OIA4Y7UJ184936E106923P', 'VMG2WGCY6NABQ', 'sb-w43bze3179741@personal.example.com', 400.00, 'SGD', 'approved'),
(6, 'PAYID-L5OIQXQ5HN79854AP479254J', 'VMG2WGCY6NABQ', 'sb-w43bze3179741@personal.example.com', 250.00, 'SGD', 'approved'),
(7, 'PAYID-L5OIT4I0LT44164JM4953415', 'VMG2WGCY6NABQ', 'sb-w43bze3179741@personal.example.com', 200.00, 'SGD', 'approved'),
(8, 'PAYID-L5OSJDA0ME004037X7123254', 'VB68EEV2Z3G8J', 'aimanbazli3@gmail.com', 150.00, 'SGD', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `event_type` varchar(100) NOT NULL,
  `services_type` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_image`, `product_code`, `event_type`, `services_type`, `district`) VALUES
(1, 'Flower Bouquet', '100', 'wedding1.jpg', 'p001', 'Wedding', 'Decoration', 'Tutong'),
(2, 'Milo BN ', '50', 'milo.jpg', 'p002', 'Any', 'Caterer', 'Belait'),
(3, 'Haji Photography', '100', 'photography.jpg', 'p003', 'Any', 'Photography', 'Brunei-Muara');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `phoneno` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `status` varchar(12) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT '2020-11-11'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `cpassword`, `phoneno`, `address`, `token`, `status`, `user_profile`, `date_created`) VALUES
(9, 'Shahrul Shafiq', 'sshafiq1912@gmail.com', '$2y$10$g4.k/Ijc8BKjXpohsuJkXO7Lt6g1zNPv.QT3ochOnxVr6dX4qCk.m', '$2y$10$GyFL.Au/R6xg89APlT2LpesnASX/lpJ85qFrDnT/Wx1itXazoafYq', 8170685, 'Gadong', '599318630daf555f207c6d58c00745', 'active', 'images/aiman.png', '2020-11-11'),
(13, 'Aiman Bazli', 'sshafiq1911@gmail.com', '$2y$10$TFMq8.ks/SZ7JIGbcFqA6e6g3HvCdK97afSbD3lZNKrZpfgIHpH.6', '$2y$10$FhNLW5l2hq4MyvIuT0zjZ.56kP2mVt.VUY0369so5OqCzEvJjC4Hq', 8170685, '1St Floor Kompleks Kotarayi', '6a3292b5d37844cc57a163ecb9f8f4', 'active', 'images/profile.jpg', '2020-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `businessname` varchar(255) NOT NULL,
  `services` varchar(100) NOT NULL,
  `phoneno` bigint(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `district` varchar(30) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qrcode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `username`, `password`, `cpassword`, `email`, `businessname`, `services`, `phoneno`, `address`, `district`, `token`, `status`, `qrcode`) VALUES
(17, 'sshafiq', '$2y$10$DS4Aoo8SqUSp.96H7kMo4.PzZhi7O6uvhvdLNbs3TdAK8P7Ue7n8O', '$2y$10$F9kYBe7T57MDXeHY00TmPux3pVpz9mI5bbppnS9T1T4qTmpJmgsua', 'sshafiq1912@gmail.com', 'Ajwa Kitchen', 'Caterers', 23132, 'Gadong', 'Brunei-Muara', 'f5c5b13b1d34ef3f7437529e7c88a8', 'active', 'sshafiq.png'),
(18, 'Aiman2', '$2y$10$uDud/BOmtwzKpbpS9mW7buDnIe96MSuMShyvmiBgwqaIfbhXSCkei', '$2y$10$wS.uXPX47NhbhmB0bbXAgeg0vofJykqN/X9H8Ox8FMSVSmI/c36RC', 'sshafiq1911@gmail.com', 'Haji Photography', 'Printing', 231312, 'Tutong', 'Tutong', 'bf73690ba6eb3d1ccd12ac74341b93', 'active', 'Haji Photography.png'),
(19, 'Izzad Salleh', '$2y$10$ElzZ8CpclFjE98jYo.m9uO.mvhGTpv83DVjacgp7azO9dTt2xqqiS', '$2y$10$Jpm6AqGsxZMNvqk1n4hb0er4vhDPMptXO8SQqfgL9YhsQgZY5mwFS', 'sshafiq1913@gmail.com', 'Decoration ', 'Caterers', 231312, 'adwda', 'Brunei-Muara', '89e526aa83addcf83d979d6a569e30', 'active', 'Decoration .png'),
(20, 'MuizM', '$2y$10$0A3Pt0mrofFTHehEpTioO.yu3wgcGeMAZXu.Ay3.v0Ac6yf2zSY1q', '$2y$10$7LfK0idX5iT7w27zwCuAFu3hJxL0LwFEsnMNR3EHio/KVEp8f70pq', 'sexy@420.gmail.com', 'Sihat Sejahtera', 'Caterers', 2313231, 'Gadong', 'Brunei-Muara', '193651d34ee066bfdcee402e32d971', 'active', 'Sihat Sejahtera.png'),
(21, 'Airul Nasrul', '$2y$10$Qq7fQOq2wdRB3gj5tdVOueX67I4I086UhrblyajgUyIy7PPCTIDCq', '$2y$10$x94THjJhA1XoNDTC7Jrd3eYauzUro7WnLTvw/HGcnSPLXslk.Nvi2', 'airulnasrul@gmail.com', 'AirulBride', 'Caterers', 21313231, 'Gadong', 'Brunei-Muara', 'be013e0785ee28ed71484a4dda57be', 'active', 'AirulBride.png'),
(22, 'Najib Kadir', '$2y$10$UFt4RJvfR47ALLzTPhAkmOPOELbrsMJG2BCNq832q0Bjb9CO4.RB2', '$2y$10$j74cmBjvsYoLL.qglY9M5ODzAqc9mZJv2Zod6rXRLwRMMXYRQtA0e', 'najib@gmail.com', 'Najib Enterprise', 'Decoration', 8676765, 'Tutong', 'Brunei-Muara', 'de685e1144e3b927f20e01125cf4c6', 'active', 'Najib Enterprise.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
