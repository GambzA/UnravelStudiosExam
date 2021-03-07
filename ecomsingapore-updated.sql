-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 06:20 AM
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
  `customerAddress` text NOT NULL,
  `customerPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecom_customer`
--

INSERT INTO `ecom_customer` (`customerID`, `customerFirstName`, `customerLastName`, `customerEmail`, `customerContact`, `customerAddress`, `customerPassword`) VALUES
(1, 'Roi Mark', 'Gamba', 'gambaroimark@gmail.com', '09667440536', 'B29 L46 PH6 SOMEWHERE STREET, NEAR CITY, PHILIPPINES', 'bfd59291e825b5f2bbf1eb76569f8fe7'),
(14, 'Roi', 'Gamba', 'test@gmail.com', '09667440536', 'Block 29 Lot 46 Ph6, Carmona E', 'bfd59291e825b5f2bbf1eb76569f8fe7');

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
  `date_updated` datetime DEFAULT NULL,
  `itemDescription` text NOT NULL,
  `itemImage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ecom_product`
--

INSERT INTO `ecom_product` (`itemID`, `itemName`, `itemPrice`, `itemStock`, `enabled`, `deleted`, `date_created`, `date_updated`, `itemDescription`, `itemImage`) VALUES
(7, 'Cardigan Dress', '1500.00', 10, 0, 0, '2021-03-06 16:51:24', '2021-03-07 06:14:00', '', 'ezgif.com-gif-maker.jpg'),
(8, 'Dress', '1200.00', 10, 1, 0, '2021-03-07 04:36:14', '2021-03-07 06:14:11', '<p>Exotica meets artisanal in the Spring 2021 collection. A harmony of exotic and artisanal influences for a polished, relaxed, and comfortable look.</p>\r\n<p>36\" long from center back neck</p>\r\n<p>Wrinkle resistant</p>\r\n<p>Relaxed fit</p>\r\n<p>*Exclusive to natori.com</p>\r\n<ul>\r\n<li>100% polyester</li>\r\n<li>Machine wash cold, with similar colors, gentle cycle, do not bleach, tumble dry low remove promptly, cool iron</li>\r\n<li>Made at our own factories in the Philippines</li>\r\n</ul>', 'ezgif.com-gif-maker.jpg');

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
(1, 2, 1, 2),
(2, 6, 1, 5);

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
  MODIFY `customerID` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ecom_product`
--
ALTER TABLE `ecom_product`
  MODIFY `itemID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ecom_transaction`
--
ALTER TABLE `ecom_transaction`
  MODIFY `transactionID` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ecom_transaction_item`
--
ALTER TABLE `ecom_transaction_item`
  MODIFY `transactionItemID` mediumint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ecom_user`
--
ALTER TABLE `ecom_user`
  MODIFY `userID` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
