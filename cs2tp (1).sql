-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 01:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
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
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
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
  `BrandName` text DEFAULT NULL,
  `Item_ID` int(11) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`Brand_ID`, `BrandName`, `Item_ID`, `Updated_at`, `Created_at`) VALUES
(1, 'Apple', 1, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(2, 'Apple', 2, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 'Apple', 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(4, 'Apple', 4, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(5, 'Google', 5, '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(6, 'Huawei', NULL, '2024-02-12 21:34:31', '2024-02-12 21:34:31'),
(7, 'Huawei', NULL, '2024-02-12 21:35:51', '2024-02-12 21:35:51'),
(8, 'Huawei', NULL, '2024-02-12 21:37:02', '2024-02-12 21:37:02'),
(9, 'google', NULL, '2024-02-15 16:04:24', '2024-02-15 16:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `ContactUs_ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Message` text DEFAULT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `employee_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `LastName`, `FirstName`, `password`, `employee_email`) VALUES
(3, 'Dawood', 'Husein', 'Password123!', 'h.dawood1360@gmail.com'),
(4, 'man', 'Husein', 'Password123!', 'h.dawood1360@gmail.net'),
(5, 'test', 'iron', 'Password123!', 'h.dawood1360@gmail.biz'),
(3, 'Dawood', 'Husein', 'Password123!', 'h.dawood1360@gmail.com'),
(4, 'man', 'Husein', 'Password123!', 'h.dawood1360@gmail.net'),
(5, 'test', 'iron', 'Password123!', 'h.dawood1360@gmail.biz'),
(0, 'Giakos', 'Alexandros', '$2y$10$eR7OhEK9veJMVsavFDReW.rEtpZDNLRIb.obKNCbjOaoIDA/4PvGK', 'alex123@gmail.com'),
(0, 'sample', 'Alexandros', '$2y$10$75nd547hiuYD7v4Vos8vU.hxj/2AIXNh3sbdvh6TacRZZ9ZguGiPC', 'sample@aston.com'),
(0, 'account', 'sample ', '$2y$10$NgvVzdsvf66N7Ks/10DqHemf6A5QZyQMbrUQwmkV8/4J3bvOvV5LW', 'sample@sample.com');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Item_ID` int(11) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
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
  `storage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_ID`, `ItemName`, `Quantity`, `ItemDesc`, `Price`, `Img`, `Location_ID`, `Updated_at`, `Created_at`, `OperatingSystem`, `DisplaySize`, `DisplayResolution`, `BatteryLife`, `CameraMegapixels`, `BiometricAuthentication`, `colour`, `storage`) VALUES
(1, 'iPhone 15', 146, 'The new iPhone 15 from Apple', 999.99, 'Apple iphone 15.jpg', 1, '2024-03-03 23:32:39', '2023-12-08 17:46:58', 'iOS', '6.7 inches', 'Full HD', '12', '12 MP', 'Face ID', 'Space Gray', '128GB'),
(2, 'iPhone 15+', 146, 'The new iPhone 15+ from Apple', 1199.99, 'iPhone15+.jpg', 2, '2024-03-03 23:33:57', '2023-12-08 17:46:58', 'iOS', '6.7 inches', 'Quad HD', '14', '12 MP', 'Face ID', 'Silver', '256GB'),
(3, 'iPhone 15 Pro', 146, 'The new iPhone 15 Pro from Apple', 1199.99, 'iPhone15Pro.jpg', 3, '2023-12-08 17:46:58', '2023-12-08 17:46:58', 'iOS', '6.1 inches', 'Quad HD', '14', '12 MP', 'Face ID', 'Gold', '512GB'),
(4, 'iPhone 15 Pro Max', 146, 'The new iPhone 15 Pro Max from Apple', 1299.99, 'iPhone15ProMax.jpg', 4, '2023-12-08 17:46:58', '2023-12-08 17:46:58', 'iOS', '6.7 inches', 'Quad HD', '16', '12 MP', 'Face ID', 'Midnight Green', '1TB'),
(5, 'Pixel 8', 146, 'The new Pixel 8 by Google', 699.99, 'Pixel8.jpg', 5, '2023-12-08 17:46:58', '2023-12-08 17:46:58', 'Android', '6.0 inches', 'Full HD', '12', '16 MP', 'Fingerprint', 'Black', '128GB');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Location_ID` int(11) NOT NULL,
  `Shelf` int(11) DEFAULT NULL,
  `Row` varchar(255) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_ID` int(11) NOT NULL,
  `Basket_ID` int(11) DEFAULT NULL,
  `Address_Order` varchar(255) DEFAULT NULL,
  `Order_Status` varchar(255) DEFAULT NULL,
  `Updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_ID`, `Basket_ID`, `Address_Order`, `Order_Status`, `Updated_at`, `Created_at`) VALUES
(1, 1, '123 Main St', 'Shipped', '2023-12-08 18:08:09', '2023-12-08 17:46:58'),
(2, 2, '123 Main St', 'Pending', '2023-12-08 17:46:58', '2023-12-08 17:46:58'),
(3, 3, '456 Elm St', 'Pending', '2023-12-08 17:46:58', '2023-12-08 17:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Fore_name` varchar(255) DEFAULT NULL,
  `Second_Name` varchar(255) DEFAULT NULL,
  `Last_Name` varchar(255) DEFAULT NULL,
  `Address_User` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `Password`, `Fore_name`, `Second_Name`, `Last_Name`, `Address_User`) VALUES
(1, 'john_doe', 'password123', 'John', 'Michael', 'Doe', '123 Main St'),
(2, 'jane_smith', 'password456', 'Jane', 'Elizabeth', 'Smith', '456 Elm St'),
(3, 'will_brown', 'password789', 'William', 'George', 'Brown', '789 Oak St'),
(4, 'emily_white', 'password101', 'Emily', 'Anne', 'White', '101 Maple St'),
(5, 'david_jones', 'password102', 'David', 'Lee', 'Jones', '102 Pine St'),
(6, 'sarah_johnson', 'password103', 'Sarah', 'Marie', 'Johnson', '103 Birch St'),
(7, 'michael_wilson', 'password104', 'Michael', 'Andrew', 'Wilson', '104 Cedar St'),
(8, 'lisa_moore', 'password105', 'Lisa', 'Renee', 'Moore', '105 Spruce St'),
(9, 'robert_taylor', 'password106', 'Robert', 'James', 'Taylor', '106 Ash St'),
(10, 'laura_martin', 'password107', 'Laura', 'Michelle', 'Martin', '107 Cherry St'),
(11, 'username@customer.com', '$2y$10$v.JRfZC3fcX0wH7nZ.RlyOUqMxuk7Cq70OvrPYQtl01ILa2WRpHEG', 'user', 'name', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`Basket_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `basketitem`
--
ALTER TABLE `basketitem`
  ADD PRIMARY KEY (`BasketItem_ID`),
  ADD KEY `Basket_ID` (`Basket_ID`),
  ADD KEY `Item_ID` (`Item_ID`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`Brand_ID`),
  ADD KEY `Item_ID` (`Item_ID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`ContactUs_ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_ID`),
  ADD KEY `Location_ID` (`Location_ID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Location_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `Basket_ID` (`Basket_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `Basket_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `basketitem`
--
ALTER TABLE `basketitem`
  MODIFY `BasketItem_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `Brand_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `ContactUs_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `Location_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `basketitem`
--
ALTER TABLE `basketitem`
  ADD CONSTRAINT `basketitem_ibfk_1` FOREIGN KEY (`Basket_ID`) REFERENCES `basket` (`Basket_ID`),
  ADD CONSTRAINT `basketitem_ibfk_2` FOREIGN KEY (`Item_ID`) REFERENCES `item` (`Item_ID`);

--
-- Constraints for table `brand`
--
ALTER TABLE `brand`
  ADD CONSTRAINT `brand_ibfk_1` FOREIGN KEY (`Item_ID`) REFERENCES `item` (`Item_ID`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`Location_ID`) REFERENCES `location` (`Location_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Basket_ID`) REFERENCES `basket` (`Basket_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
