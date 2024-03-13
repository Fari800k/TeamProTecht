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
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Location_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Shelf` int(11) DEFAULT NULL,
  `Row` varchar(255) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Location_ID`, `Shelf`, `Row`) VALUES
(1, 1, 'A'),
(2, 2, 'A'),
(3, 3, 'A'),
(4, 4, 'A'),
(5, 5, 'A'),
(6, 6, 'A'),
(7, 7, 'A'),
(8, 8, 'A'),
(9, 9, 'A'),
(10, 1, 'B'),
(11, 2, 'B'),
(12, 3, 'B'),
(13, 4, 'B'),
(14, 5, 'B'),
(15, 6, 'B'),
(16, 7, 'B'),
(17, 8, 'B'),
(18, 9, 'B'),
(19, 1, 'C'),
(20, 2, 'C'),
(21, 3, 'C'),
(22, 4, 'C'),
(23, 5, 'C'),
(24, 6, 'C'),
(25, 7, 'C'),
(26, 8, 'C'),
(27, 9, 'C'),
(28, 1, 'D'),
(29, 2, 'D'),
(30, 3, 'D'),
(31, 4, 'D'),
(32, 5, 'D'),
(33, 6, 'D'),
(34, 7, 'D'),
(35, 8, 'D'),
(36, 9, 'D'),
(37, 1, 'E'),
(38, 2, 'E'),
(39, 3, 'E'),
(40, 4, 'E'),
(41, 5, 'E'),
(42, 6, 'E'),
(43, 7, 'E'),
(44, 8, 'E'),
(45, 9, 'E'),
(46, 3, 'A'),
(47, 7, 'C'),
(48, 7, 'C'),
(49, 7, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Item_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemName` varchar(255) NOT NULL,
  `Stock` int(11) DEFAULT NULL,
  `ItemDesc` text NOT NULL,
  `Price` decimal(7,2) NOT NULL,
  `Img` text NOT NULL,
  `Location_ID` int(11) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `OperatingSystem` varchar(50) NOT NULL,
  `DisplaySize` varchar(50) NOT NULL,
  `DisplayResolution` varchar(50) NOT NULL,
  `BatteryLife` varchar(50) NOT NULL,
  `CameraMegapixels` varchar(50) NOT NULL,
  `BiometricAuthentication` varchar(50) NOT NULL,
  `colour` varchar(50) NOT NULL,
  `storage` varchar(50) NOT NULL,
  PRIMARY KEY (`Item_ID`),
  FOREIGN KEY (`Location_ID`) REFERENCES `location`(`Location_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_ID`, `ItemName`, `Stock`, `ItemDesc`, `Price`, `Img`, `Location_ID`, `OperatingSystem`, `DisplaySize`, `DisplayResolution`, `BatteryLife`, `CameraMegapixels`, `BiometricAuthentication`, `colour`, `storage`) VALUES
(1, 'iPhone 15', 146, 'The new iPhone 15 from Apple', '999.99', 'iPhone15.jpg', 1, 'iOS', '6.7 inches', 'Full HD', '12', '12 MP', 'Face ID', 'Space Gray', '128GB'),
(2, 'iPhone 15+', 146, 'The new iPhone 15+ from Apple', '1199.99', 'iPhone15+.jpg', 2, 'iOS', '6.7 inches', 'Quad HD', '14', '12 MP', 'Face ID', 'Silver', '256GB'),
(3, 'iPhone 15 Pro', 146, 'The new iPhone 15 Pro from Apple', '1199.99', 'iPhone15Pro.jpg', 3, 'iOS', '6.1 inches', 'Quad HD', '14', '12 MP', 'Face ID', 'Gold', '512GB'),
(4, 'iPhone 15 Pro Max', 146, 'The new iPhone 15 Pro Max from Apple', '1299.99', 'iPhone15ProMax.jpg', 4, 'iOS', '6.7 inches', 'Quad HD', '16', '12 MP', 'Face ID', 'Midnight Green', '1TB'),
(5, 'Pixel 8', 146, 'The new Pixel 8 by Google', '699.99', 'Pixel8.jpg', 5, 'Android', '6.0 inches', 'Full HD', '12', '16 MP', 'Fingerprint', 'Black', '128GB'),
(6, 'Honor Pro 5', 12, 'This is a Honor Pro 5', '12.00', 'huawei p40 pro 50s.jpeg', 25, 'Android', '5.5 inches', 'HD', '10', '8 MP', 'Fingerprint', 'Blue', '64GB'),
(7, 'Pixel 7', 100, 'This is the new Google Pixel', '100.00', 'huwawei mate 60 pro 5.jpeg', 16, 'Android', '5.8 inches', 'Full HD', '14', '12 MP', 'Fingerprint', 'White', '256GB');


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Fore_name` varchar(255) DEFAULT NULL,
  `Second_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Address_User` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `Password`, `Fore_name`, `Second_Name`, `Last_Name`, `Address_User`) VALUES
(1, 'john_doe', '$2y$10$OP/4IcTxsnm74SLuzZwkcumFeFd8X8.zDTyFt94Td06fl6nn914Se', 'John', 'Michael', 'Doe', '123 Main St'),
-- Password: Password123!
(2, 'jane_smith', '$2y$10$Ry5UeKbdjvE3fyxBM6gpWuNh4y7g2e3xzkc8nOIEX20sWd4foHsLS', 'Jane', 'Elizabeth', 'Smith', '456 Elm St'),
-- Password: Password456!
(3, 'will_brown', '$2y$10$7XxNg3FzTmlBOTEV2stAGu94tvJaP4FD0WVwLZRswwlOxS6BFWafm', 'William', 'George', 'Brown', '789 Oak St'),
-- Password: Password789%
(4, 'emily_white', '$2y$10$/V25hL8MsiL/tN5Nag00HeNEhBOx6xTudP/gHr2./pDDH5JxqtMA6', 'Emily', 'Anne', 'White', '101 Maple St'),
-- Password: Password101$
(5, 'david_jones', '$2y$10$eKTu0WEySS3NLRsSpbvsu.DmuqhICOy8sElKZo0hEp/EwEAsCok.u', 'David', 'Lee', 'Jones', '102 Pine St'),
-- Password: Password102%
(6, 'sarah_johnson', '$2y$10$BDe5JkDTdnx1VrVa33ehDumvBHSsklH2ds13ri6IFTAM.a8t9RvUS', 'Sarah', 'Marie', 'Johnson', '103 Birch St'),
-- Password: Password103*
(7, 'michael_wilson', '$2y$10$9e5TLvZqsFUfTaWtmnDjO.IymPUfMiqfG5eZqZM95LqnVNtfpey5G', 'Michael', 'Andrew', 'Wilson', '104 Cedar St'),
-- Password: PassWord104!
(8, 'lisa_moore', '$2y$10$2aRPy89idEkdBrdJgFssxOX.lZckHHIQkxw0F0BPvxfvHf4CSuIme', 'Lisa', 'Renee', 'Moore', '105 Spruce St'),
-- Password: PassWord105!
(9, 'robert_taylor', '$2y$10$bdjyH0F3oAGhUCz2s3WrxeleWYo6gcbRD5Z2VbyCE5faggBlomV5m', 'Robert', 'James', 'Taylor', '106 Ash St'),
-- Password: PassWord106%
(10, 'laura_martin', '$2y$10$gsLIi/qoLtsq1vlR9Selcunsk.xyF.EQhdJDeHmEDl8HYJjDWe5pa', 'Laura', 'Michelle', 'Martin', '107 Cherry St'),
-- Password: PassWord106%
(11, 'daniel_cox', '$2y$10$W8531hrY4FwlpvVIM.4v2Ortzh16wdP24kcbTYBEnL7gxx3IDPSxi', 'Daniel', 'Roberts', 'Cox', '56 Mayland Rd');
-- Password: TeamProTecht2024!

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `Basket_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Basket_ID`),
  FOREIGN KEY (`User_ID`) REFERENCES `users`(`User_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`Basket_ID`, `User_ID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `basketitem`
--

CREATE TABLE `basketitem` (
  `BasketItem_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Basket_ID` int(11) DEFAULT NULL,
  `Item_ID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`BasketItem_ID`),
  FOREIGN KEY (`Basket_ID`) REFERENCES `basket`(`Basket_ID`),
  FOREIGN KEY (`Item_ID`) REFERENCES `item`(`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `basketitem`
--

INSERT INTO `basketitem` (`BasketItem_ID`, `Basket_ID`, `Item_ID`, `Quantity`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 3),
(3, 1, 5, 2),
(4, 2, 1, 3),
(5, 2, 3, 4),
(6, 2, 2, 5),
(7, 3, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `Brand_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BrandName` text DEFAULT NULL,
  `Item_ID` int(11) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Brand_ID`),
  FOREIGN KEY (`Item_ID`) REFERENCES `item`(`Item_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`Brand_ID`, `BrandName`, `Item_ID`) VALUES
(1, 'Apple', 1),
(2, 'Apple', 2),
(3, 'Apple', 3),
(4, 'Apple', 4),
(5, 'Google', 5),
(6, 'Huawei', NULL),
(7, 'Huawei', NULL),
(8, 'Huawei', NULL),
(9, 'google', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `employee_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `LastName`, `FirstName`, `password`, `employee_email`) VALUES
(1, 'Dawood', 'Husein', 'Password123!', 'h.dawood1360@gmail.com'),
(2, 'man', 'Husein', 'Password123!', 'h.dawood1360@gmail.net'),
(3, 'test', 'iron', 'Password123!', 'h.dawood1360@gmail.biz'),
(4, 'Giakos', 'Alexandros', '$2y$10$eR7OhEK9veJMVsavFDReW.rEtpZDNLRIb.obKNCbjOaoIDA/4PvGK', 'alex123@gmail.com'),
(5, 'sample', 'Alexandros', '$2y$10$75nd547hiuYD7v4Vos8vU.hxj/2AIXNh3sbdvh6TacRZZ9ZguGiPC', 'sample@aston.com'),
(6, 'account', 'sample ', '$2y$10$NgvVzdsvf66N7Ks/10DqHemf6A5QZyQMbrUQwmkV8/4J3bvOvV5LW', 'sample@sample.com');

-- --------------------------------------------------------



--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Basket_ID` int(11) DEFAULT NULL,
  `Address_Order` varchar(255) DEFAULT NULL,
  `Order_Status` ENUM('Pending', 'Processing', 'Shipped', 'Delivered', 'Completed') NOT NULL DEFAULT 'Pending',
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Order_ID`),
  FOREIGN KEY (`Basket_ID`) REFERENCES `basket`(`Basket_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Basket_ID`, `Address_Order`, `Order_Status`) VALUES
(1, 1, '123 Main St', 'Shipped'),
(2, 2, '123 Main St', 'Pending'),
(3, 3, '456 Elm St', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `Review_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `Item_ID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Description` VARCHAR(255) DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`Review_ID`),
  FOREIGN KEY (`User_ID`) REFERENCES `users`(`User_ID`),
  FOREIGN KEY (`Item_ID`) REFERENCES `item`(`Item_ID`),
  CONSTRAINT `chk_rating_range` CHECK (`Rating` >= 0 AND `Rating` <= 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`Review_ID`, `User_ID`, `Item_ID`, `Rating`, `Description`)
VALUES
(1, 1, 1, 1, 'I give this product 1 star'),
(2, 2, 3, 3, 'I give this product 3 star'),
(3, 3, 2, 2, 'I give this product 2 star'),
(4, 4, 4, 2, 'I give this product 2 star'),
(5, 5, 5, 4, 'I give this product 4 star'),
(6, 6, 6, 5, 'I give this product 5 star'),
(7, 7, 7, 5, 'I give this product 5 star'),
(8, 8, 1, 5, 'I give this product 5 star');

-- --------------------------------------------------------

--
-- Table Structure for table `contactus`
--

CREATE TABLE contactus (
    `ContactUs_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(255) NOT NULL,
    `Email` VARCHAR(255) NOT NULL,
    `Message` VARCHAR(255) NOT NULL,
    `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`ContactUs_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
