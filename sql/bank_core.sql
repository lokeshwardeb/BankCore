-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 10:53 PM
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
-- Database: `bank_core`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `cus_id` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `cus_id`, `account_number`, `balance`, `account_type`, `status`, `datetime`) VALUES
(1, '1', '1022010080112895', '190', 'savings_account', 'active', '2025-05-19 09:36:00'),
(2, '2', '1022010080112890', '57', 'savings_account', 'active', '2025-05-19 09:38:05'),
(3, '1', '1022010080112889', '0', 'student_account', 'active', '2025-05-19 20:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`user_id`, `username`, `admin_email`, `password`, `datetime`) VALUES
(1, 'Lokeshwar Deb Protik', 'p@p.p', '$2y$10$.scbr4IiFrHYQ2UNxKSM7.0/Eo.I26vKwegdElso0JqVt4QuDKg6W', '2025-05-19 02:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_email` varchar(255) NOT NULL,
  `cus_phone` varchar(255) NOT NULL,
  `cus_image_name` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `cus_name`, `cus_email`, `cus_phone`, `cus_image_name`, `datetime`) VALUES
(1, 'Lipi', 'lp@lp.lp', '12', 'assign_s.png', '2025-05-19 04:18:03'),
(2, 'new', 'n@n.n', '12', '', '2025-05-19 05:42:10'),
(4, 'df', 'd@d.d', '12', 'assign_s.png', '2025-05-20 00:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `kycs`
--

CREATE TABLE `kycs` (
  `kyc_id` int(11) NOT NULL,
  `cus_id` varchar(255) NOT NULL,
  `id_type` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `verified` varchar(255) NOT NULL,
  `verified_by` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp(),
  `reference_id` varchar(255) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `account_number`, `customer_id`, `amount`, `transaction_type`, `status`, `transaction_date`, `reference_id`, `remarks`) VALUES
(1, '1022010080112895', '1', 10, 'deposit', 'success', '2025-05-19 02:00:45', 'TXN_682b572ce23cf3.00117328', ''),
(2, '1022010080112895', '1', 10, 'deposit', 'success', '2025-05-19 02:20:45', 'TXN_682b57567fbbf7.56169425', ''),
(3, '1022010080112895', '1', 10, 'withdraw', 'success', '2025-05-19 02:30:45', 'TXN_682b5c32639b77.05290959', ''),
(4, '1022010080112895', '1', 20, 'transfer_to_1022010080112890', 'success', '2025-05-19 02:40:45', 'TXN_682b6e6fedac05.67738557', ''),
(5, '1022010080112890', '2', 20, 'transfer_from_1022010080112895', 'success', '2025-05-19 02:45:45', 'TXN_682b6e6fedac05.67738557', ''),
(6, '1022010080112895', '1', 5, 'transfer_to_1022010080112890', 'success', '2025-05-19 02:46:45', 'TXN_682b6e9544d265.29201272', ''),
(7, '1022010080112890', '2', 5, 'transfer_from_1022010080112895', 'success', '2025-05-19 02:47:45', 'TXN_682b6e9544d265.29201272', ''),
(8, '1022010080112895', '1', 12, 'transfer_to_1022010080112890', 'success', '2025-05-19 02:48:45', 'TXN_682b739ad40bc9.56094194', ''),
(9, '1022010080112890', '2', 12, 'transfer_from_1022010080112895', 'success', '2025-05-20 00:08:26', 'TXN_682b739ad40bc9.56094194', ''),
(10, '1022010080112895', '1', 20, 'deposit', 'success', '2025-05-20 00:11:06', 'TXN_682b743a24ab43.81156753', ''),
(11, '1022010080112895', '1', 15, 'withdraw', 'success', '2025-05-20 00:11:25', 'TXN_682b744ddc6939.17016336', ''),
(12, '1022010080112895', '1', 15, 'transfer_to_1022010080112890', 'success', '2025-05-20 00:11:58', 'TXN_682b746e143152.96015293', ''),
(13, '1022010080112890', '2', 15, 'transfer_from_1022010080112895', 'success', '2025-05-20 00:11:58', 'TXN_682b746e143152.96015293', ''),
(14, '1022010080112895', '1', 100, 'deposit', 'success', '2025-05-20 01:06:34', 'TXN_682b813a30ddd1.51834702', ''),
(15, '1022010080112895', '1', 23, 'withdraw', 'success', '2025-05-20 02:23:01', 'TXN_682b9325ca1069.07659153', ''),
(16, '1022010080112895', '1', 100, 'deposit', 'success', '2025-05-20 02:26:41', 'TXN_682b9401945683.68020349', ''),
(17, '1022010080112895', '1', 5, 'withdraw', 'success', '2025-05-20 02:27:04', 'TXN_682b9418427050.30867383', ''),
(18, '1022010080112895', '1', 5, 'transfer_to_1022010080112890', 'success', '2025-05-20 02:28:00', 'TXN_682b9450855225.23907257', ''),
(19, '1022010080112890', '2', 5, 'transfer_from_1022010080112895', 'success', '2025-05-20 02:28:00', 'TXN_682b9450855225.23907257', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `kycs`
--
ALTER TABLE `kycs`
  ADD PRIMARY KEY (`kyc_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kycs`
--
ALTER TABLE `kycs`
  MODIFY `kyc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
