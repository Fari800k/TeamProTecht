-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 05:05 PM
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
-- Database: `cs2tp`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `Basket_ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Basket_ID`),
  KEY `User_ID` (`User_ID`),
  CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`Basket_ID`, `User_ID`, `Updated_at`, `Created_at`) VALUES
(1, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 4, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `basketitem`
--

CREATE TABLE `basketitem` (
  `BasketItem_ID` int(11) NOT NULL,
  `Basket_ID` int(11) DEFAULT NULL,
  `Item_ID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`BasketItem_ID`),
  KEY `Basket_ID` (`Basket_ID`),
  KEY `Item_ID` (`Item_ID`),
  CONSTRAINT `basketitem_ibfk_1` FOREIGN KEY (`Basket_ID`) REFERENCES `basket` (`Basket_ID`),
  CONSTRAINT `basketitem_ibfk_2` FOREIGN KEY (`Item_ID`) REFERENCES `item` (`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `basketitem`
--

INSERT INTO `basketitem` (`BasketItem_ID`, `Basket_ID`, `Item_ID`, `Quantity`, `Updated_at`, `Created_at`) VALUES
(1, 1, 1, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 1, 2, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 1, 5, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 2, 1, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 2, 3, 4, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 2, 2, 5, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(7, 3, 1, 10, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `Brand_ID` int(11) NOT NULL,
  `
