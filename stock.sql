-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 01:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `staff` text NOT NULL,
  `department` text NOT NULL,
  `designation` text NOT NULL,
  `salery` text NOT NULL,
  `role` text NOT NULL,
  `last_status` varchar(255) NOT NULL,
  `createdate` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `email`, `mobile`, `password`, `staff`, `department`, `designation`, `salery`, `role`, `last_status`, `createdate`, `status`) VALUES
(3, 'Super Admin', 'superadmin@gmail.com', 9990963333, 'superadmin', '', '', 'Super Admin', '20000', 'Super Admin', 'Online', '2023-05-23', '1'),
(5, 'Sachin', 'sachin@gmail.com', 9140920656, '12', '', 'IT', 'Web Developer', '40000', 'User', 'Online', '2023-06-05', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vgi_new_request`
--

CREATE TABLE `vgi_new_request` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `product_name` text NOT NULL,
  `request_date` date NOT NULL,
  `quantity` varchar(55) NOT NULL,
  `reasion` text NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vgi_product`
--

CREATE TABLE `vgi_product` (
  `id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_description` text NOT NULL,
  `product_remark` text NOT NULL,
  `status` varchar(110) NOT NULL,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vgi_product_distribution`
--

CREATE TABLE `vgi_product_distribution` (
  `id` int(11) NOT NULL,
  `staff_name` text NOT NULL,
  `product_name` text NOT NULL,
  `product_code` varchar(55) NOT NULL,
  `remark` text NOT NULL,
  `quantity` varchar(110) NOT NULL,
  `return_quantity` varchar(55) DEFAULT NULL,
  `return_request` varchar(55) DEFAULT NULL,
  `given_date` date NOT NULL,
  `status` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vgi_return_request`
--

CREATE TABLE `vgi_return_request` (
  `id` int(11) NOT NULL,
  `user` varchar(55) NOT NULL,
  `product_name` text NOT NULL,
  `request_date` date NOT NULL,
  `return_quantity` varchar(55) NOT NULL,
  `reasion` text NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vgi_stock`
--

CREATE TABLE `vgi_stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_quantity` varchar(55) NOT NULL,
  `add_date` date NOT NULL,
  `update_date` date NOT NULL,
  `remarks` varchar(110) NOT NULL,
  `product_bill` varchar(55) NOT NULL,
  `status` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vgi_stock_history`
--

CREATE TABLE `vgi_stock_history` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_quantity` varchar(55) NOT NULL,
  `add_date` date NOT NULL,
  `remarks` varchar(110) NOT NULL,
  `product_bill` varchar(55) NOT NULL,
  `status` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vgi_new_request`
--
ALTER TABLE `vgi_new_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vgi_product`
--
ALTER TABLE `vgi_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vgi_product_distribution`
--
ALTER TABLE `vgi_product_distribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vgi_return_request`
--
ALTER TABLE `vgi_return_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vgi_stock`
--
ALTER TABLE `vgi_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vgi_stock_history`
--
ALTER TABLE `vgi_stock_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `vgi_new_request`
--
ALTER TABLE `vgi_new_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vgi_product`
--
ALTER TABLE `vgi_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vgi_product_distribution`
--
ALTER TABLE `vgi_product_distribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vgi_return_request`
--
ALTER TABLE `vgi_return_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vgi_stock`
--
ALTER TABLE `vgi_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vgi_stock_history`
--
ALTER TABLE `vgi_stock_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
