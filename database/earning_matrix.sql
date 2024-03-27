-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 06:13 PM
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
-- Database: `earning_matrix`
--

-- --------------------------------------------------------

--
-- Table structure for table `active`
--

CREATE TABLE `active` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `method` varchar(20) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `number` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `img` varchar(225) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buy_plan`
--

CREATE TABLE `buy_plan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(5) NOT NULL,
  `validity` int(3) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `b_number` varchar(20) NOT NULL,
  `n_number` varchar(20) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `password_wa_num` varchar(20) NOT NULL,
  `payment_wa_num` varchar(20) NOT NULL,
  `telegram_link` varchar(225) NOT NULL,
  `contact_email` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `method` varchar(20) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `number` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `img` varchar(225) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lot_ticket`
--

CREATE TABLE `lot_ticket` (
  `id` int(11) NOT NULL,
  `lottary` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(225) NOT NULL,
  `t_token` varchar(5) NOT NULL,
  `result` varchar(10) NOT NULL DEFAULT 'Pending',
  `amount` int(11) NOT NULL DEFAULT 10,
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(5) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `premium`
--

CREATE TABLE `premium` (
  `id` int(5) NOT NULL,
  `vip_name` varchar(50) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `price` varchar(5) NOT NULL,
  `num_of_task` varchar(3) NOT NULL,
  `task_earning` varchar(3) NOT NULL,
  `1st` varchar(3) NOT NULL,
  `2nd` varchar(3) NOT NULL,
  `3rd` varchar(3) NOT NULL,
  `4th` varchar(3) NOT NULL,
  `5th` varchar(3) NOT NULL,
  `validity` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `seller_id` varchar(11) NOT NULL DEFAULT '000',
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `img` varchar(225) NOT NULL,
  `current_price` int(10) NOT NULL,
  `dis_price` int(10) NOT NULL,
  `buy_click` int(11) NOT NULL DEFAULT 0,
  `update_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submit_task`
--

CREATE TABLE `submit_task` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `taka` int(4) NOT NULL,
  `screenshot` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(225) NOT NULL,
  `taka` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE `topup` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `amount` int(20) NOT NULL,
  `commission` int(11) NOT NULL DEFAULT 0,
  `oparetor` varchar(20) NOT NULL,
  `number` int(50) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE `total` (
  `id` int(1) NOT NULL,
  `t_user` varchar(10) NOT NULL,
  `t_new_user` varchar(10) NOT NULL,
  `t_active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trx_history`
--

CREATE TABLE `trx_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` varchar(225) NOT NULL,
  `amount` int(20) NOT NULL,
  `is_add` int(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0,
  `bonus` int(5) NOT NULL DEFAULT 0,
  `my_ref_code` int(11) NOT NULL,
  `ot_ref_code` int(11) NOT NULL DEFAULT 12345678,
  `t_a_refer` int(11) NOT NULL DEFAULT 0,
  `t_ref_for_withdraw` int(11) NOT NULL DEFAULT 0,
  `t_refer` int(11) NOT NULL DEFAULT 0,
  `t_withdraw` int(11) NOT NULL DEFAULT 0,
  `t_deposite` int(11) NOT NULL DEFAULT 0,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `join_time` date NOT NULL DEFAULT current_timestamp(),
  `last_spin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `email_verify` varchar(10) NOT NULL DEFAULT 'Pending',
  `image` varchar(225) NOT NULL DEFAULT 'noprofil.jpg',
  `verification_code` int(6) NOT NULL DEFAULT 0,
  `password` text NOT NULL,
  `jela` varchar(225) NOT NULL,
  `daily_task` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `amount` int(20) NOT NULL,
  `commission` int(11) NOT NULL DEFAULT 0,
  `method` varchar(20) NOT NULL,
  `number` int(20) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `active`
--
ALTER TABLE `active`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buy_plan`
--
ALTER TABLE `buy_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lot_ticket`
--
ALTER TABLE `lot_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `premium`
--
ALTER TABLE `premium`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submit_task`
--
ALTER TABLE `submit_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trx_history`
--
ALTER TABLE `trx_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_constraint_name` (`email`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `active`
--
ALTER TABLE `active`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buy_plan`
--
ALTER TABLE `buy_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lot_ticket`
--
ALTER TABLE `lot_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `premium`
--
ALTER TABLE `premium`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submit_task`
--
ALTER TABLE `submit_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trx_history`
--
ALTER TABLE `trx_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
