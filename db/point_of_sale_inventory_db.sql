-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2018 at 09:19 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `point_of_sale_inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(20) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `total_amount_p` float NOT NULL,
  `amount_paid` float NOT NULL,
  `cash_change` float NOT NULL,
  `date_transaction` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `clerk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`transaction_id`, `invoice_number`, `customer_name`, `total_amount_p`, `amount_paid`, `cash_change`, `date_transaction`, `clerk_id`) VALUES
(1, '0000000001', '', 39.76, 100, 60.24, '2018-11-10 11:33:45.000000', 1),
(2, '0000000002', '', 39.76, 20, 0, '2018-11-10 11:33:56.000000', 1),
(3, '0000000003', '', 39.76, 20, 0, '2018-11-10 11:34:32.000000', 1),
(4, '0000000004', '', 0, 100, 0, '2018-11-10 11:38:32.000000', 1),
(5, '0000000005', '', 0, 100, 0, '2018-11-10 11:40:34.000000', 1),
(6, '0000000006', '', 0, 100, 0, '2018-11-10 11:40:49.000000', 1),
(7, '0000000007', '', 0, 100, 0, '2018-11-10 11:41:03.000000', 1),
(8, '0000000008', '', 39.76, 100, 0, '2018-11-10 11:44:31.000000', 1),
(9, '0000000009', '', 39.76, 100, 60.24, '2018-11-10 13:49:44.000000', 1),
(10, '0000000010', '', 0, 100, 100, '2018-11-10 13:51:25.000000', 1),
(11, '0000000011', '', 0, 100, 100, '2018-11-10 16:16:44.000000', 1),
(12, '0000000011', '', 39.76, 45, 5.24, '2018-11-10 16:17:51.000000', 1),
(13, '0000000012', '', 39.76, 45, 5.24, '2018-11-10 16:18:41.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_unit_price` float NOT NULL,
  `item_amount` float NOT NULL,
  `vat` float NOT NULL,
  `total_price` float NOT NULL,
  `invoice_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `item_id`, `item_quantity`, `item_unit_price`, `item_amount`, `vat`, `total_price`, `invoice_number`) VALUES
(74, 1, 1, 35.5, 35.5, 4.26, 39.76, '0000000001'),
(75, 1, 1, 35.5, 35.5, 4.26, 39.76, '0000000002'),
(76, 1, 1, 35.5, 35.5, 4.26, 39.76, '0000000003'),
(77, 1, 1, 35.5, 35.5, 4.26, 39.76, '0000000008'),
(78, 1, 1, 35.5, 35.5, 4.26, 39.76, '0000000009'),
(80, 1, 1, 35.5, 35.5, 4.26, 39.76, '0000000012'),
(81, 1, 1, 35.5, 35.5, 4.26, 39.76, '0000000011');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `item_id` int(11) NOT NULL,
  `item_code` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`item_id`, `item_code`, `item_name`, `item_quantity`, `item_price`) VALUES
(1, 112345, 'Coke', 16, 35.5),
(124, 112212, 'Sprite', 180, 35.7),
(125, 124578, 'Royal', 95, 34.75);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
