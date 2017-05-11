-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2017 at 11:13 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `daily_account`
--

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `id_expense` int(11) NOT NULL,
  `expense_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id_expense`, `expense_name`) VALUES
(1, 'Shop rent'),
(2, 'Electricity bill\r\n'),
(3, 'Vat');

-- --------------------------------------------------------

--
-- Table structure for table `expense_transection`
--

CREATE TABLE IF NOT EXISTS `expense_transection` (
  `id_expense_transection` int(11) NOT NULL,
  `id_expense` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `description` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_transection`
--

INSERT INTO `expense_transection` (`id_expense_transection`, `id_expense`, `date_time`, `amount`, `description`, `is_active`) VALUES
(1, 1, '2017-01-15 00:00:00', '100000', 'Shop rent', 1),
(2, 2, '2017-01-15 00:00:00', '200', 'electricity bill', 1),
(3, 3, '2017-01-15 00:00:00', '300', 'vat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `Id_income` int(5) NOT NULL,
  `Income_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`Id_income`, `Income_name`) VALUES
(1, 'Book'),
(2, 'Pen'),
(3, 'Pencil'),
(4, 'Eraser');

-- --------------------------------------------------------

--
-- Table structure for table `income_transection`
--

CREATE TABLE IF NOT EXISTS `income_transection` (
  `Id_income_transection` int(11) NOT NULL,
  `id_income` int(11) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `amount` decimal(10,0) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income_transection`
--

INSERT INTO `income_transection` (`Id_income_transection`, `id_income`, `date_time`, `description`, `is_active`, `amount`) VALUES
(1, 1, '2017-01-03 00:00:00', NULL, 1, '1000'),
(2, 3, '2017-01-04 00:00:00', '2 books sold', 1, '500'),
(3, 1, '2017-01-03 00:00:00', '3 books sold', 1, '12'),
(4, 2, '2017-01-20 00:00:00', 'pen', 1, '5'),
(5, 2, '2017-01-15 00:00:00', '2 pens', 1, '12'),
(6, 4, '2017-01-01 00:00:00', '3 eraser sold', 1, '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id_expense`);

--
-- Indexes for table `expense_transection`
--
ALTER TABLE `expense_transection`
  ADD PRIMARY KEY (`id_expense_transection`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`Id_income`);

--
-- Indexes for table `income_transection`
--
ALTER TABLE `income_transection`
  ADD PRIMARY KEY (`Id_income_transection`), ADD KEY `id_income` (`id_income`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id_expense` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `expense_transection`
--
ALTER TABLE `expense_transection`
  MODIFY `id_expense_transection` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `Id_income` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `income_transection`
--
ALTER TABLE `income_transection`
  MODIFY `Id_income_transection` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
