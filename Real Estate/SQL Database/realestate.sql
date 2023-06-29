-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 07:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

CREATE TABLE `appoinments` (
  `srno` int(10) NOT NULL,
  `pid` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `cno` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appoinments`
--

INSERT INTO `appoinments` (`srno`, `pid`, `name`, `cno`, `email`, `address`, `datetime`) VALUES
(1, 0, 'Komal', '7843789994', 'komal28@gmail.com', 'pune', '2023-06-21 17:36:25'),
(2, 24, 'Komal Jagdale', '7843789994', 's@gmail.com', 'pune', '2023-06-21 17:39:24'),
(3, 23, '', '', '', '', '2023-06-23 13:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `srno` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`srno`, `name`, `email`, `contact_no`, `message`, `datetime`) VALUES
(1, 'shubham', 'shubham@gmail.com', '7774882080', 'message', '2023-04-12 02:07:05'),
(2, 'shubham', 'shubham@gmail.com', '7774882080', 'message', '2023-04-12 02:08:25'),
(3, 'shubham', 'shubham@gmail.com', '7774882080', 'message', '2023-04-12 02:08:49'),
(4, 'shubham', 'shubham@gmail.com', '7774882080', 'message', '2023-04-12 02:10:06'),
(5, 'sakshi', 'sakshi@gmail.com', '111111111', 'na', '2023-04-12 02:12:45'),
(6, 'shubham', 'shubhamshinde9530@gmail.com', '9999999999', 'na', '2023-04-12 23:59:19'),
(7, 'abc', 'abc@gmail.com', '2222', 'na', '2023-04-20 10:44:11'),
(8, 'abc', 'abc@gmail.com', '2222', 'na', '2023-04-20 10:44:40'),
(9, 'abc', 'abc@gmail.com', '2222', 'na', '2023-04-20 10:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `fev`
--

CREATE TABLE `fev` (
  `id` int(20) NOT NULL,
  `srno` int(20) NOT NULL,
  `userid` int(20) NOT NULL,
  `sellername` varbinary(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `ptype` varchar(20) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `plocation` varchar(30) NOT NULL,
  `sqft` float NOT NULL,
  `bhk` int(10) NOT NULL,
  `age` varchar(20) NOT NULL,
  `furnishing` varchar(20) NOT NULL,
  `floor` int(20) NOT NULL,
  `tfloor` int(20) NOT NULL,
  `pdescribe` text NOT NULL,
  `prise` varchar(50) NOT NULL,
  `available` date NOT NULL,
  `img` varchar(50) NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fev`
--

INSERT INTO `fev` (`id`, `srno`, `userid`, `sellername`, `city`, `ptype`, `pname`, `plocation`, `sqft`, `bhk`, `age`, `furnishing`, `floor`, `tfloor`, `pdescribe`, `prise`, `available`, `img`, `addedon`) VALUES
(6, 25, 21, 0x536f6e616d204b61707572, 'Gaziabad', 'Land/Plot', 'Aspen Ridge Estate', 'satara', 50000, 3, 'Less than a Year', 'Fully Furnishing', 4, 5, 'Experience the epitome of luxury living in this prestigious estate set atop Aspen Ridge, commanding breathtaking views of the surrounding landscape.', '60000', '0000-00-00', '', '2023-06-28 06:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `srno` int(10) NOT NULL,
  `sellername` varchar(30) NOT NULL,
  `userid` int(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  `ptype` varchar(20) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `plocation` varchar(50) NOT NULL,
  `sqft` float NOT NULL,
  `bhk` varchar(20) NOT NULL,
  `age` varchar(20) NOT NULL,
  `furnishing` varchar(20) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `tfloor` int(50) NOT NULL,
  `pdescribe` text NOT NULL,
  `prise` int(11) NOT NULL,
  `available` date NOT NULL,
  `img` varchar(250) NOT NULL,
  `addedon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`srno`, `sellername`, `userid`, `city`, `ptype`, `pname`, `plocation`, `sqft`, `bhk`, `age`, `furnishing`, `floor`, `tfloor`, `pdescribe`, `prise`, `available`, `img`, `addedon`) VALUES
(11, 'S Dubey', 0, 'Pune', 'Residential', 'Tej Elevia ', 'pune', 2000, '2 BHK', 'Under Construction', 'Fully Furnishing', '2', 3, 'Discover modern living at its finest at Tej Elevia, where contemporary design and upscale amenities combine to offer a stylish and comfortable lifestyle.', 3000000, '2023-04-11', '', '2023-04-25 20:43:56'),
(12, 'Ashutosh Sigh', 0, 'Delhi', 'Commercial', 'Kalpataru Residences ', 'pune', 40000, '3 BHK', '1 to 5 Year', 'Semi Furnishing', '12', 22, ' Indulge in the splendor of Kalpataru Jade Residences, a haven of serenity and comfort that offers a perfect balance between luxury and tranquility.', 2000000, '2023-04-05', '', '2023-04-25 20:45:13'),
(13, 'jon sigh', 0, 'Mumbai', 'Commercial', 'SK Estate', 'satara', 3000, '2 BHK', '1 to 5 Year', 'Semi Furnishing', '2', 7, ' Experience the epitome of opulence at SK Estate, where luxury and sophistication seamlessly blend to create a haven of refined living.', 1500000, '2023-04-12', '', '2023-04-25 20:46:07'),
(14, 'Komal Shinde', 0, 'Gurgaon', 'Land/Plot', 'Elmwood Estate', 'pune', 5000, '4 BHK', '1 to 5 Year', 'Fully Furnishing', '2', 6, ' Immerse yourself in the timeless beauty of Elmwood Estate, a sprawling property adorned with majestic elm trees and elegant architecture.', 200000, '2023-04-22', '', '2023-04-25 20:46:54'),
(15, 'Rohan Shinde', 0, 'Gurgaon', 'Commercial', 'Rosewood Estate', 'satara', 20000, '1 BHK', 'Less than a Year', 'Fully Furnishing', '3', 13, 'Experience luxury and elegance at its finest in this grand estate surrounded by beautiful rosewood trees.', 1200000, '2023-04-11', '', '2023-04-25 20:48:11'),
(22, 'shubham shinde', 21, 'Noida', 'Land/Plot', 'Balmoral Riverside ', 'pune', 40004, '2 BHK', 'Less than a Year', 'UnFurnishingt', '4', 13, 'Immerse yourself in riverside luxury at Kasturi The Balmoral Riverside, an exclusive property that showcases breathtaking views and unparalleled elegance.', 8888777, '2023-04-22', '', '2023-04-26 18:34:41'),
(23, 'Komal Jagdale', 21, 'Noida', 'Residential', 'Redwood Haven', 'pune', 3000, '2 BHK', 'Less than a Year', 'Semi Furnishing', '5', 8, 'Find tranquility in this secluded haven nestled among majestic redwood trees, providing a serene retreat away from the bustling world.', 400333, '2023-04-21', '', '2023-04-27 04:38:27'),
(24, 'Balram Rathod', 21, 'Mumbai', 'Residential', 'Lakeshore Villa', 'satara', 3003, '3 BHK', 'Less than a Year', 'Fully Furnishing', '3', 3, ' Indulge in waterfront luxury at Lakeshore Villa, where breathtaking lake views and luxurious amenities create an unforgettable experience.', 500000, '2023-04-14', '', '2023-04-27 04:39:16'),
(25, 'Sonam Kapur', 21, 'Gaziabad', 'Land/Plot', 'Aspen Ridge Estate', 'satara', 50000, '3 BHK', 'Less than a Year', 'Fully Furnishing', '4', 5, 'Experience the epitome of luxury living in this prestigious estate set atop Aspen Ridge, commanding breathtaking views of the surrounding landscape.', 60000, '2023-04-14', '', '2023-04-27 04:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cno` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `addedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `cno`, `email`, `pass`, `addedat`) VALUES
(21, 'Ashok Shinde', '555555', 'ashok@gmail.com', 'a', '2023-04-13 01:50:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoinments`
--
ALTER TABLE `appoinments`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `fev`
--
ALTER TABLE `fev`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`srno`);
ALTER TABLE `property` ADD FULLTEXT KEY `city` (`city`,`ptype`,`plocation`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoinments`
--
ALTER TABLE `appoinments`
  MODIFY `srno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `srno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fev`
--
ALTER TABLE `fev`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `srno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
