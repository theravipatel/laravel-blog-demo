-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 01:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Shoes'),
(2, 'Shirts'),
(3, 'Jeans'),
(4, 'Jewellery'),
(5, 'Apparel');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `email`) VALUES
(1, 'google', 'CA', 'test@test.com'),
(2, 'apple', 'CA', 'test2@teest.com'),
(3, 'Reliance Ltd.', 'Mumbai, India', 'ril@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cid`, `name`) VALUES
(1, 1, 'Test Shoes 1'),
(2, 1, 'Test Shoes 2'),
(3, 2, 'Test Shirt 1'),
(4, 2, 'Test Shirt 2'),
(5, 2, 'Test Shirt 3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `company_id`, `username`, `first_name`, `last_name`, `email`, `phone`, `city`, `password`) VALUES
(1, 1, 'ravipatel', 'Ravi', 'Patel', 'rjpatel2290@gmail.com', '88994 45566', 'Rajkot', 'e20f517179e9cd52ae29dae43c121b95'),
(2, 2, 'jane_doe', 'Jane', 'Doe', 'jane@gmail.com', '4192847464', '', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 1, 'john_doe', 'John', 'Doe', 'john@gmail.com', '+44 1234567890', '', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 2, 'sandra', 'Sandra', 'Anderson', 'sandra@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 1, 'devpatel', 'Dev', 'Patel', 'dev.rjpatel2290@gmail.com', '1234 567 890', '', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 1, 'user4741904277', 'Donald', 'Trump', 'trump@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 1, 'user8411205294', 'Narendra', 'Modi', 'narendramodi@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 1, 'user6651602753', 'Ramesh', 'Patel', 'ramesh@gmail.com', '', '', 'f925916e2754e5e03f75dd58a5733251'),
(11, 1, 'user6880405568', 'Anil', 'Ambani', 'anil@gmail.com', '', '', 'f925916e2754e5e03f75dd58a5733251'),
(13, 1, 'joeroot', 'Jeo', 'Root', 'joe@test.com', NULL, NULL, '52f1867ec65b505d91433f5829d14471'),
(14, 2, 'jasonroy', 'Jason', 'Roy', 'jason@test.com', NULL, NULL, 'd2c0f02f38b8a1309df3fbee299482c5'),
(16, 1, 'uQjOI', 'i4T6u', '9FRwb', '7j6Re@gmail.com', '9974783784', 'JZuNKxE4', 'f18a819f90d19c7d3b53be201c00a8f2'),
(17, 1, 'mukesh007', 'Mukesh', 'Ambani', 'mukesh@gmail.com', '0987674341', 'Mumbai', '79cfeb94595de33b3326c06ab1c7dbda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
