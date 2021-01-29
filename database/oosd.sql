-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 10:18 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oosd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `phone`, `email`, `password`) VALUES
(1, 'Mohammad Imran', '+601124104432', 'imran@gmail.com', 'imranhasan'),
(2, 'John Doe', '+601124104433', 'john@gmail.com', 'john1234');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `ticket_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `email`, `address`, `ticket_number`) VALUES
(1, 'Mohammad Imran', 'mdhasan007799@gmail.com', '55, lorong uni-garden 10, 94300, kota samarahan', '5f152b732caa9'),
(2, 'Mohammad Imran', 'mdhasan007799@gmail.com', '55, lorong uni-garden 10, 94300, kota samarahan', '5f152b7f7198d'),
(3, 'Mohammad Imran', 'mdhasan007799@gmail.com', '55, lorong uni-garden 10, 94300, kota samarahan', '5f152ba26b39e'),
(4, 'Mohammad Imran', 'mdhasan007799@gmail.com', '55, lorong uni-garden 10, 94300, kota samarahan', '5f152bb613dfd');

-- --------------------------------------------------------

--
-- Table structure for table `cancel`
--

CREATE TABLE `cancel` (
  `id` int(11) NOT NULL,
  `ticket_number` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `cancel_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cancel`
--

INSERT INTO `cancel` (`id`, `ticket_number`, `amount`, `cancel_by`) VALUES
(1, '5f152021f1dc7', '5', 'mdhasan007799@gmail.com'),
(2, '5f1521417abc2', '5', 'mdhasan007799@gmail.com'),
(3, '5f1521417abc2', '5', 'mdhasan007799@gmail.com'),
(4, '5f1521417abc2', '5', 'mdhasan007799@gmail.com'),
(5, '5f1521417abc2', '5', 'mdhasan007799@gmail.com'),
(6, '5f1521417abc2', '5', 'mdhasan007799@gmail.com'),
(7, '5f1521417abc2', '5', 'mdhasan007799@gmail.com'),
(8, '5f1521417abc2', '5', 'mdhasan007799@gmail.com'),
(9, '5f152bb613dfd', '5', 'mdhasan007799@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `card_type` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `amount` double NOT NULL,
  `ticket_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `card_number`, `card_type`, `date`, `amount`, `ticket_number`) VALUES
(1, '1122-3344-5566-8899', 'visa', '2020-07-20', 10, '5f152b732caa9'),
(2, '1122-3344-5566-8899', 'visa', '2020-07-20', 10, '5f152b7f7198d'),
(3, '1122-3344-5566-8899', 'visa', '2020-07-20', 10, '5f152ba26b39e'),
(4, '1122-3344-5566-8899', 'visa', '2020-07-20', 10, '5f152bb613dfd');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `ticket_number` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `depart` varchar(100) NOT NULL,
  `dest` varchar(100) NOT NULL,
  `time` text NOT NULL,
  `date` date NOT NULL,
  `amount` double NOT NULL,
  `booked_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `ticket_number`, `quantity`, `depart`, `dest`, `time`, `date`, `amount`, `booked_by`) VALUES
(1, '5f152b732caa9', '1', 'kuching', 'bintulu', '12:10', '2020-07-20', 10, 'mdhasan007799@gmail.com'),
(2, '5f152b7f7198d', '1', 'kuching', 'bintulu', '12:10', '2020-07-20', 10, 'mdhasan007799@gmail.com'),
(3, '5f152ba26b39e', '1', 'kuching', 'bintulu', '12:10', '2020-07-20', 10, 'mdhasan007799@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `depart` varchar(100) NOT NULL,
  `dest` varchar(100) NOT NULL,
  `distance` int(11) NOT NULL,
  `depart_time` varchar(100) NOT NULL,
  `arr_time` varchar(100) NOT NULL,
  `journey_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `name`, `depart`, `dest`, `distance`, `depart_time`, `arr_time`, `journey_date`) VALUES
(2, 'KALIA4567', 'samarahan', 'tabuan', 16, '2:10 PM', '4:10 PM', '2020-07-20'),
(8, 'kalia12345', 'kuching', 'miri', 40, '12:20PM', '2:20PM', '2020-07-21'),
(9, 'kalia000', 'kuching', 'samarahan', 40, '12:20PM', '2:20PM', '2020-07-21'),
(10, 'KALIA1234', 'kuching', 'bintulu', 10, '12:10', '2:10', '2020-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `travel_class`
--

CREATE TABLE `travel_class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `fare` varchar(100) NOT NULL,
  `number_of_seats` varchar(100) NOT NULL,
  `train_no` varchar(100) NOT NULL,
  `train_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_class`
--

INSERT INTO `travel_class` (`class_id`, `class_name`, `fare`, `number_of_seats`, `train_no`, `train_name`) VALUES
(2, 'premium class', '12', '12', '8', 'kalia12345'),
(3, 'premium class', '12', '12', '8', 'kalia12345'),
(4, 'premium class', '50', '11', '8', 'kalia12345');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `password`) VALUES
(1, 'Mohammad Imran', '+601124104435', 'mdhasan007799@gmail.com', 'imranhasan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancel`
--
ALTER TABLE `cancel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_class`
--
ALTER TABLE `travel_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cancel`
--
ALTER TABLE `cancel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `travel_class`
--
ALTER TABLE `travel_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
