-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 04:45 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emsdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `EmpId` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `SSN` int(11) NOT NULL,
  `EmpType` varchar(255) NOT NULL,
  `Salary` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `Supervisor` varchar(255) NOT NULL,
  `SectionCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`EmpId`, `Email`, `FirstName`, `LastName`, `Password`, `Address`, `DOB`, `SSN`, `EmpType`, `Salary`, `StartDate`, `Supervisor`, `SectionCode`) VALUES
(7, 'testworker1@gmail.com', 'Stephen', 'McEvers', '$2y$10$Orzf/d4Y6t89RaPwldyLPeAW1piTwnMLknZfJ2iXie7hSKRC0GL4y', '219 3rd St.', '0000-00-00', 123121234, 'Regular', 40000, '0000-00-00', 'no', 'IT'),
(8, 'testadmin@gmail.com', 'Admin', 'Worker', '$2y$10$HlIMpWs570y4zgJWpTlVHOlygliwARuJ2LADmU5IfKNLBlgG2m3Ym', '100 1st Street', '0000-00-00', 123211234, 'Admin', 50000, '0000-00-00', 'no', 'HR'),
(9, 'newworker@gmail.com', 'New', 'Worker', '$2y$10$cHvhugjuNUX4bJlDWsGFkOsN2LZ6crasjWlC293XcDGHJnc8yLyHm', '111 1st Street', '0000-00-00', 123121234, 'Regular', 50000, '0000-00-00', 'No', 'Sales'),
(10, 'newguy@email.com', 'New', 'Guy', '$2y$10$0TtSqWnmtAHSpUkWoEJsAuTCF34kSJ5WKZ5i1yXwga31fXTPs.PeK', '1234 Main Street', '0000-00-00', 123121234, 'Regular', 80000, '0000-00-00', 'Yes', 'Sales'),
(11, 'itguy@gmail.com', 'IT', 'Guy', '$2y$10$.TKIaOA0v9G7qjsovGyRCuyhFuvWi2e0GCxn6.mQzTzsOFkUtVCjK', '123 Street Boulevard', '0000-00-00', 123121234, 'Regular', 90000, '0000-00-00', 'Yes', 'IT'),
(12, 'newhr@gmail.com', 'HR', 'Worker', '$2y$10$M6VYIOw2EhQQqmkmpHaWiOFprTzReNugFEXCeKhk4uAPswG.4cIgC', '111 West Street', '0000-00-00', 123121234, 'Admin', 75000, '0000-00-00', 'Yes', 'HR'),
(13, 'salesguru@gmail.com', 'Sales', 'Person', '$2y$10$8OfPJnHciwLUeeSxc.cGI.b0x6hNiuiiU2uqaHOk2DxtPLhRmqDZy', '100 1st Street', '0000-00-00', 123121234, 'Regular', 60000, '0000-00-00', 'No', 'Sales'),
(14, 'johndoe@gmail.com', 'John', 'Doe', '$2y$10$ZGCf4duzviUJWmL/iPjUrORfFvBRltBtx8aKAy95OAnitwZNacTHu', '500 Broadway', '0000-00-00', 123121234, 'Regular', 60000, '0000-00-00', 'No', 'IT'),
(15, 'janedoe@gmail.com', 'Jane', 'Doe', '$2y$10$4Q30SVqPIF8QdhYn4nr02OoVnVohIWcBA7Abamao17Psz4rSU0jbu', '451 Main Street', '0000-00-00', 123121234, 'Regular', 60000, '0000-00-00', 'No', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `vacation`
--

CREATE TABLE `vacation` (
  `RequestID` int(11) NOT NULL,
  `Days` int(11) NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `StartingDate` datetime NOT NULL,
  `Approved` varchar(255) DEFAULT NULL,
  `EmployeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacation`
--

INSERT INTO `vacation` (`RequestID`, `Days`, `Reason`, `StartingDate`, `Approved`, `EmployeeID`) VALUES
(1, 2, ' Because', '2022-12-29 00:00:00', 'deny', 7),
(2, 2, ' Good Reasons', '2023-01-04 00:00:00', 'Approved', 8),
(3, 1, ' Sick day', '2023-03-20 00:00:00', 'Approved', 8),
(4, 2, ' new reason', '2022-12-07 00:00:00', 'Denied', 8),
(5, 5, ' Fireworks', '2023-07-04 00:00:00', 'Denied', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`EmpId`);

--
-- Indexes for table `vacation`
--
ALTER TABLE `vacation`
  ADD PRIMARY KEY (`RequestID`),
  ADD KEY `FOREIGN_KEY_VACA` (`EmployeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `EmpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vacation`
--
ALTER TABLE `vacation`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vacation`
--
ALTER TABLE `vacation`
  ADD CONSTRAINT `FOREIGN_KEY_VACA` FOREIGN KEY (`EmployeeID`) REFERENCES `users` (`EmpId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
