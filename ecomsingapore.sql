-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 05:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomsingapore`
--

-- --------------------------------------------------------

--
-- Table structure for table `ecom_customer`
--

CREATE TABLE `ecom_customer` (
  `customerID` smallint(3) NOT NULL,
  `customerFirstName` varchar(50) NOT NULL,
  `customerLastName` varchar(50) NOT NULL,
  `customerEmail` varchar(50) NOT NULL,
  `customerContact` varchar(50) NOT NULL,
  `customerAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecom_customer`
--

INSERT INTO `ecom_customer` (`customerID`, `customerFirstName`, `customerLastName`, `customerEmail`, `customerContact`, `customerAddress`) VALUES
(1, 'Roi Mark', 'Gamba', 'gambaroimark@gmail.com', '09667440536', 'B29 L46 PH6 SOMEWHERE STREET, NEAR CITY, PHILIPPINES');

-- --------------------------------------------------------

--
-- Table structure for table `ecom_product`
--

CREATE TABLE `ecom_product` (
  `itemID` int(5) NOT NULL,
  `itemName` varchar(30) NOT NULL,
  `itemPrice` decimal(11,2) NOT NULL,
  `itemStock` smallint(3) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecom_product`
--

INSERT INTO `ecom_product` (`itemID`, `itemName`, `itemPrice`, `itemStock`, `enabled`, `deleted`, `date_created`, `date_updated`) VALUES
(1, 'Specialized Mug', '125.00', 10, 0, 1, NULL, NULL),
(2, 'Christmas Tumblers', '110.00', 5, 1, 0, NULL, '2021-03-01 04:41:21'),
(3, 'Frosted Glass', '200.00', 200, 1, 0, '2021-03-01 04:39:16', '2021-03-01 04:39:16'),
(4, 'TEST', '100.00', 10, 0, 1, '2021-03-01 04:40:41', '2021-03-01 04:40:41'),
(5, 'TEST', '100.00', 10, 0, 1, '2021-03-01 04:40:56', '2021-03-01 04:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `ecom_transaction`
--

CREATE TABLE `ecom_transaction` (
  `transactionID` smallint(3) NOT NULL,
  `transactionNumber` varchar(5) NOT NULL,
  `transactionDate` datetime NOT NULL,
  `customerID` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecom_transaction`
--

INSERT INTO `ecom_transaction` (`transactionID`, `transactionNumber`, `transactionDate`, `customerID`) VALUES
(1, 'X123A', '2021-03-01 11:56:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ecom_transaction_item`
--

CREATE TABLE `ecom_transaction_item` (
  `transactionItemID` mediumint(3) NOT NULL,
  `productID` smallint(3) NOT NULL,
  `transactionID` mediumint(3) NOT NULL,
  `transactionQty` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecom_transaction_item`
--

INSERT INTO `ecom_transaction_item` (`transactionItemID`, `productID`, `transactionID`, `transactionQty`) VALUES
(1, 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ecom_user`
--

CREATE TABLE `ecom_user` (
  `userID` smallint(2) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userFullName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecom_user`
--

INSERT INTO `ecom_user` (`userID`, `userName`, `userPass`, `userFullName`) VALUES
(2, 'admin', '34c64d23b35d617dfe432b5979a1b3e1', 'ADMIN ACCOUNT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ecom_customer`
--
ALTER TABLE `ecom_customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `ecom_product`
--
ALTER TABLE `ecom_product`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `ecom_transaction`
--
ALTER TABLE `ecom_transaction`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `ecom_transaction_item`
--
ALTER TABLE `ecom_transaction_item`
  ADD PRIMARY KEY (`transactionItemID`);

--
-- Indexes for table `ecom_user`
--
ALTER TABLE `ecom_user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ecom_customer`
--
ALTER TABLE `ecom_customer`
  MODIFY `customerID` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ecom_product`
--
ALTER TABLE `ecom_product`
  MODIFY `itemID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ecom_transaction`
--
ALTER TABLE `ecom_transaction`
  MODIFY `transactionID` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ecom_transaction_item`
--
ALTER TABLE `ecom_transaction_item`
  MODIFY `transactionItemID` mediumint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ecom_user`
--
ALTER TABLE `ecom_user`
  MODIFY `userID` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
