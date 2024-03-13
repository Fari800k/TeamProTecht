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
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Item_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `ItemName` VARCHAR(255) NOT NULL,
  `Quantity` INT(11) NOT NULL,
  `ItemDesc` TEXT NOT NULL,
  `Price` DECIMAL(10,2) NOT NULL,
  `Img` VARCHAR(255) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Item_ID`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_ID`, `ItemName`, `Quantity`, `ItemDesc`, `Price`, `Img`, `Updated_at`, `Created_at`) 
VALUES 
(1, 'iPhone 15', 146, 'The new iPhone 15 from Apple', 999.99, 'iPhone15.jpg', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 'iPhone 15+', 146, 'The new iPhone 15+ from Apple', 1199.99, 'iPhone15+.jpg', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 'iPhone 15 Pro', 146, 'The new iPhone 15 Pro from Apple', 1199.99, 'iPhone15Pro.jpg', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 'iPhone 15 Pro Max', 146, 'The new iPhone 15 Pro Max from Apple', 1299.99, 'iPhone15ProMax.jpg', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 'Pixel 8', 146, 'The new Pixel 8 by Google', 699.99, 'Pixel8.jpg', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 'Honor Pro 5', 12, 'This is a Honor Pro 5', 12.00, 'pro5.png', '2024-02-12 21:37:02', '2024-02-12 21:37:02'),
(7, 'Pixel 7', 100, 'This is the new Google Pixel', 100.00, 'pixel7.png', '2024-02-15 16:04:24', '2024-02-15 16:04:24');

-- --------------------------------------------------------


--
-- Table structure for table `os`
--

CREATE TABLE `os` (
    `OS_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `OSName` VARCHAR(255) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`OS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `os`
--

INSERT INTO `os` (`OS_ID`, `OSName`, `Updated_at`, `Created_at`)
VALUES
(1, 'iOS', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 'Android', '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `itemos`
--

CREATE TABLE `itemos` (
    `ItemOS_ID`INT(11) NOT NULL AUTO_INCREMENT,
    `Item_ID` INT(11) NOT NULL,
    `OS_ID` INT(11) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`ItemOS_ID`),
    FOREIGN KEY (`Item_ID`) REFERENCES `item`(`Item_ID`),
    FOREIGN KEY (`OS_ID`) REFERENCES `os`(`OS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `itemos`
--

INSERT INTO `itemos` (`ItemOS_ID`, `Item_ID`, `OS_ID`, `Updated_at`, `Created_at`)
VALUES
(1, 1, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 2, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 3, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 4, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 5, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 6, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(7, 7, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
    `Size_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `SizeInches` DECIMAL(11, 1) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`Size_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`Size_ID`, `SizeInches`, `Updated_at`, `Created_at`)
VALUES
(1, 6.7, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 6.1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 6.0, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 5.5, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 5.8, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `resolution`
--

CREATE TABLE `resolution` (
    `Resolution_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Resolution` VARCHAR(255) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`Resolution_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `resolution`
--

INSERT INTO `resolution` (`Resolution_ID`, `Resolution`, `Updated_at`, `Created_at`)
VALUES
(1, 'Full HD', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 'Quad HD', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 'HD', '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `itemdisplay`
--

CREATE TABLE `itemdisplay` (
    `ItemDisplay_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Item_ID` INT(11) NOT NULL,
    `Size_ID` INT(11) NOT NULL,
    `Resolution_ID` int(11) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`ItemDisplay_ID`),
    FOREIGN KEY (`Item_ID`) REFERENCES `item`(`Item_ID`),
    FOREIGN KEY (`Size_ID`) REFERENCES `size`(`Size_ID`),
    FOREIGN KEY (`Resolution_ID`) REFERENCES `resolution` (`Resolution_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `itemdisplay`
--

INSERT INTO `itemdisplay` (`ItemDisplay_ID`, `Item_ID`, `Size_ID`, `Resolution_ID`, `Updated_at`, `Created_at`)
VALUES
(1, 1, 1, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 2, 1, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 3, 2, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 4, 1, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 5, 3, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 6, 4, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(7, 7, 1, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `batterylife`
--

CREATE TABLE `batterylife` (
    `BatteryLife_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Hours` INT(100) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`BatteryLife_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `batterylife`
--

INSERT INTO `batterylife` (`BatteryLife_ID`, `Hours`, `Updated_at`, `Created_at`)
VALUES
(1, 12, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 14, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 16, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 10, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `itembattery`
--

CREATE TABLE `itembattery` (
    `ItemBattery_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Item_ID` INT(11) NOT NULL,
    `BatteryLife_ID` INT(11) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`ItemBattery_ID`),
    FOREIGN KEY (`Item_ID`) REFERENCES `item`(`Item_ID`),
    FOREIGN KEY (`BatteryLife_ID`) REFERENCES `batterylife`(`BatteryLife_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `itembattery`
--

INSERT INTO `itembattery` (`ItemBattery_ID`, `Item_ID`, `BatteryLife_ID`, `Updated_at`, `Created_at`)
VALUES
(1, 1, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 2, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 3, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 4, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 5, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 6, 4, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(7, 7, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `camera`
--

CREATE TABLE `camera` (
    `Camera_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Megapixels` INT(100) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`Camera_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `camera`
--

INSERT INTO `camera` (`Camera_ID`, `Megapixels`, `Updated_at`, `Created_at`)
VALUES
(1, 12, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 16, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 8, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `itemcamera`
--

CREATE TABLE `itemcamera` (
    `ItemCamera_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Item_ID` INT(11) NOT NULL,
    `Camera_ID` INT(11) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`ItemCamera_ID`),
    FOREIGN KEY (`Item_ID`) REFERENCES `item`(`Item_ID`),
    FOREIGN KEY (`Camera_ID`) REFERENCES `camera`(`Camera_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `itemcamera`
--

INSERT INTO `itemcamera` (`ItemCamera_ID`, `Item_ID`, `Camera_ID`, `Updated_at`, `Created_at`)
VALUES
(1, 1, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 2, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 3, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 4, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 5, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 6, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(7, 7, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `biometrics`
--

CREATE TABLE `biometrics` (
    `Biometrics_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `BiometricName` VARCHAR(255) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`Biometrics_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `biometrics`
--

INSERT INTO `biometrics` (`Biometrics_ID`, `BiometricName`, `Updated_at`, `Created_at`)
VALUES
(1, 'Face ID', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 'Fingerprint', '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `itembiometrics`
--

CREATE TABLE `itembiometrics` (
    `ItemBiometrics_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Item_ID` INT(11) NOT NULL,
    `Biometrics_ID` INT(11) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`ItemBiometrics_ID`),
    FOREIGN KEY (`Item_ID`) REFERENCES `item`(`Item_ID`),
    FOREIGN KEY (`Biometrics_ID`) REFERENCES `biometrics`(`Biometrics_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `itembiometrics`
--

INSERT INTO `itembiometrics` (`ItemBiometrics_ID`, `Item_ID`, `Biometrics_ID`, `Updated_at`, `Created_at`)
VALUES
(1, 1, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 2, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 3, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 4, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 5, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 6, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(7, 7, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
    `Color_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `ColorName` VARCHAR(255) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`Color_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`Color_ID`, `ColorName`, `Updated_at`, `Created_at`)
VALUES
(1, 'Black', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 'White', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 'Blue', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 'Gold', '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `itemcolor`
--

CREATE TABLE `itemcolor` (
    `ItemColor_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Item_ID` INT(11) NOT NULL,
    `Color_ID` INT(11) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`ItemColor_ID`),
    FOREIGN KEY (`Item_ID`) REFERENCES `item`(`Item_ID`),
    FOREIGN KEY (`Color_ID`) REFERENCES `colors`(`Color_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `itemcolor`
--

INSERT INTO `itemcolor` (`ItemColor_ID`, `Item_ID`, `Color_ID`, `Updated_at`, `Created_at`)
VALUES
(1, 1, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 2, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 3, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 4, 4, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 5, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 6, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(7, 7, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
    `Storage_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Gigabits` INT NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`Storage_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`Storage_ID`, `Gigabits`, `Updated_at`, `Created_at`)
VALUES
(1, 128, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 256, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 512, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 64, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `itemstorage`
--

CREATE TABLE `itemstorage` (
    `ItemStorage_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Item_ID` INT(11) NOT NULL,
    `Storage_ID` INT(11) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`ItemStorage_ID`),
    FOREIGN KEY (`Item_ID`) REFERENCES `item`(`Item_ID`),
    FOREIGN KEY (`Storage_ID`) REFERENCES `storage`(`Storage_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `itemstorage`
--

INSERT INTO `itemstorage` (`ItemStorage_ID`, `Item_ID`, `Storage_ID`, `Updated_at`, `Created_at`)
VALUES
(1, 1, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 2, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 3, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 4, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 5, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 6, 4, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(7, 7, 4, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
    `Brand_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `BrandName` VARCHAR(255) DEFAULT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`Brand_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`Brand_ID`, `BrandName`, `Updated_at`, `Created_at`)
VALUES
(1, 'Apple', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 'Google', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 'Huawei', '2024-02-12 21:34:31', '2024-02-12 21:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `branditem`
--

CREATE TABLE `branditem` (
    `BrandItem_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Brand_ID` INT(11) NOT NULL,
    `Item_ID` INT(11) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`BrandItem_ID`),
    FOREIGN KEY (`Brand_ID`) REFERENCES `brand`(`Brand_ID`),
    FOREIGN KEY (`Item_ID`) REFERENCES `item`(`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `branditem`
--

INSERT INTO `branditem` (`BrandItem_ID`, `Brand_ID`, `Item_ID`, `Updated_at`, `Created_at`)
VALUES
(1, 1, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 1, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 1, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 1, 4, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 2, 5, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 3, 6, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(7, 2, 7, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

CREATE TABLE `warranty` (
  `Warranty_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `MonthsValid` INT(100) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Warranty_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `warranty`
--

INSERT INTO `warranty` (`Warranty_ID`, `MonthsValid`, `Updated_at`, `Created_at`) VALUES
(1, 12, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 36, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 24, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `itemwarranty`
--

CREATE TABLE `itemwarranty` (
    `ItemWarranty_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Item_ID` INT(11) NOT NULL,
    `Warranty_ID`INT(11) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`ItemWarranty_ID`),
    FOREIGN KEY (`Item_ID`) REFERENCES `item`(`Item_ID`),
    FOREIGN KEY (`Warranty_ID`) REFERENCES `warranty`(`Warranty_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `itemwarranty`
--

INSERT INTO `itemwarranty` (`ItemWarranty_ID`, `Item_ID`, `Warranty_ID`, `Updated_at`, `Created_at`)
VALUES
(1, 1, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 2, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 3, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 4, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 5, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 6, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(7, 7, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

CREATE TABLE `location` (
  `Location_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Shelf` INT(11) DEFAULT NULL,
  `Row` VARCHAR(255) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Location_ID`, `Shelf`, `Row`, `Updated_at`, `Created_at`) VALUES
(1, 1, 'A', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 2, 'A', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 3, 'A', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 4, 'A', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 5, 'A', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 6, 'A', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(7, 7, 'A', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(8, 8, 'A', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(9, 9, 'A', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(10, 1, 'B', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(11, 2, 'B', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(12, 3, 'B', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(13, 4, 'B', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(14, 5, 'B', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(15, 6, 'B', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(16, 7, 'B', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(17, 8, 'B', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(18, 9, 'B', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(19, 1, 'C', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(20, 2, 'C', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(21, 3, 'C', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(22, 4, 'C', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(23, 5, 'C', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(24, 6, 'C', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(25, 7, 'C', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(26, 8, 'C', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(27, 9, 'C', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(28, 1, 'D', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(29, 2, 'D', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(30, 3, 'D', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(31, 4, 'D', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(32, 5, 'D', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(33, 6, 'D', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(34, 7, 'D', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(35, 8, 'D', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(36, 9, 'D', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(37, 1, 'E', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(38, 2, 'E', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(39, 3, 'E', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(40, 4, 'E', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(41, 5, 'E', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(42, 6, 'E', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(43, 7, 'E', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(44, 8, 'E', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(45, 9, 'E', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(46, 3, 'A', '2024-02-12 21:34:31', '2024-02-12 21:34:31'),
(47, 7, 'C', '2024-02-12 21:35:51', '2024-02-12 21:35:51'),
(48, 7, 'C', '2024-02-12 21:37:02', '2024-02-12 21:37:02'),
(49, 7, 'B', '2024-02-15 16:04:24', '2024-02-15 16:04:24');
-- --------------------------------------------------------

--
-- Table structure for table `itemlocation`
--

CREATE TABLE `itemlocation` (
    `ItemLocation_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Item_ID` INT(11) NOT NULL,
    `Location_ID` INT(11) NOT NULL,
    `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`ItemLocation_ID`),
    FOREIGN KEY (`Item_ID`) REFERENCES `item`(`Item_ID`),
    FOREIGN KEY (`Location_ID`) REFERENCES `location`(`Location_ID`),
    UNIQUE (`Location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `itemwarranty`
--

INSERT INTO `itemlocation` (`ItemLocation_ID`, `Item_ID`, `Location_ID`, `Updated_at`, `Created_at`)
VALUES
(1, 1, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 2, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 3, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 4, 4, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 5, 5, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 6, 25, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(7, 7, 16, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--


CREATE TABLE `employee` (
  `Employee_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `LastName` VARCHAR(255) NOT NULL,
  `FirstName` VARCHAR(255) DEFAULT NULL,
  `Password` VARCHAR(255) DEFAULT NULL,
  `EmailAddress` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `LastName`, `FirstName`, `Password`, `EmailAddress`)
VALUES
(3, 'Dawood', 'Husein', 'Password123!', 'h.dawood1360@gmail.com'),
(4, 'man', 'Husein', 'Password123!', 'h.dawood1360@gmail.net'),
(5, 'test', 'iron', 'Password123!', 'h.dawood1360@gmail.biz'),
(6, 'Giakos', 'Alexandros', '$2y$10$eR7OhEK9veJMVsavFDReW.rEtpZDNLRIb.obKNCbjOaoIDA/4PvGK', 'alex123@gmail.com'),
(7, 'sample', 'Alexandros', '$2y$10$75nd547hiuYD7v4Vos8vU.hxj/2AIXNh3sbdvh6TacRZZ9ZguGiPC', 'sample@aston.com'),
(8, 'account', 'sample ', '$2y$10$NgvVzdsvf66N7Ks/10DqHemf6A5QZyQMbrUQwmkV8/4J3bvOvV5LW', 'sample@sample.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(255) DEFAULT NULL,
  `Password` VARCHAR(255) DEFAULT NULL,
  `Forename` VARCHAR(255) DEFAULT NULL,
  `SecondName` VARCHAR(255) DEFAULT NULL,
  `LastName` VARCHAR(255) DEFAULT NULL,
  `Address` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`Customer_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Username`, `Password`, `Forename`, `SecondName`, `LastName`, `Address`)
VALUES
(1, 'john_doe', 'password123', 'John', 'Michael', 'Doe', '123 Main St'),
(2, 'jane_smith', 'password456', 'Jane', 'Elizabeth', 'Smith', '456 Elm St'),
(3, 'will_brown', 'password789', 'William', 'George', 'Brown', '789 Oak St'),
(4, 'emily_white', 'password101', 'Emily', 'Anne', 'White', '101 Maple St'),
(5, 'david_jones', 'password102', 'David', 'Lee', 'Jones', '102 Pine St'),
(6, 'sarah_johnson', 'password103', 'Sarah', 'Marie', 'Johnson', '103 Birch St'),
(7, 'michael_wilson', 'password104', 'Michael', 'Andrew', 'Wilson', '104 Cedar St'),
(8, 'lisa_moore', 'password105', 'Lisa', 'Renee', 'Moore', '105 Spruce St'),
(9, 'robert_taylor', 'password106', 'Robert', 'James', 'Taylor', '106 Ash St'),
(10, 'laura_martin', 'password107', 'Laura', 'Michelle', 'Martin', '107 Cherry St');

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `Basket_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Customer_ID` INT(11) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Basket_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`Basket_ID`, `Customer_ID`, `Updated_at`, `Created_at`)
VALUES
(1, 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 4, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `basketitem`
--

CREATE TABLE `basketitem` (
  `BasketItem_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Basket_ID` INT(11) NOT NULL,
  `Item_ID` INT(11) NOT NULL,
  `Quantity` INT(11) NOT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`BasketItem_ID`),
  FOREIGN KEY (`Basket_ID`) REFERENCES `basket`(`Basket_ID`),
  FOREIGN KEY (`Item_ID`) REFERENCES `item`(`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `basketitem`
--

INSERT INTO `basketitem` (`BasketItem_ID`, `Basket_ID`, `Item_ID`, `Quantity`, `Updated_at`, `Created_at`)
VALUES
(1, 1, 1, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 1, 2, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 1, 5, 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 2, 1, 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 2, 3, 4, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 2, 2, 5, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(7, 3, 1, 10, '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Order_ID` INT(11) NOT NULL AUTO_INCREMENT,
  `Basket_ID` INT(11) NOT NULL,
  `AddressOrder` VARCHAR(255) DEFAULT NULL,
  `OrderStatus` ENUM('Pending', 'Processing', 'Shipped', 'Delivered', 'Completed') NOT NULL DEFAULT 'Pending',
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Order_ID`),
  FOREIGN KEY (`Basket_ID`) REFERENCES `basket`(`Basket_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_ID`, `Basket_ID`, `AddressOrder`, `OrderStatus`, `Updated_at`, `Created_at`)
VALUES
(1, 1, '123 Main St', 'Shipped', '2023-12-08 18:08:09', '2023-12-08 17:46:58'),
(2, 2, '123 Main St', 'Pending', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 3, '456 Elm St', 'Pending', '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE ContactUs (
    `ContactUs_ID` INT NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(255),
    `Email` VARCHAR(255),
    `Message` TEXT,
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`ContactUs_ID`)
);

-- --------------------------------------------------------


COMMIT;