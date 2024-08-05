-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 04:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `Fname` varchar(200) NOT NULL,
  `Lname` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Fname`, `Lname`, `Email`, `Username`, `Password`) VALUES
(2, 'Kartabya ', 'nepali', 'kartabya6673@gmail.com', 'kartus6673', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Booking_id` int(11) NOT NULL,
  `booking_date` datetime NOT NULL DEFAULT current_timestamp(),
  `No_of_seats` int(11) NOT NULL,
  `Total_fare` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Booking_id`, `booking_date`, `No_of_seats`, `Total_fare`, `UserId`, `Id`) VALUES
(41, '2021-07-18 14:36:44', 2, 400, 28, 52);

-- --------------------------------------------------------

--
-- Table structure for table `bus_owner`
--

CREATE TABLE `bus_owner` (
  `oid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `country_code` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `noof_vechile` int(11) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `security` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_owner`
--

INSERT INTO `bus_owner` (`oid`, `firstname`, `lastname`, `country_code`, `phone`, `email`, `username`, `password`, `noof_vechile`, `account_no`, `account_name`, `bank_name`, `security`) VALUES
(20, 'Saksham', 'Raj', 977, '9862991450', 'kartabya6673@gmail.com', 'saksham456', '1234', 4, '12345656', 'saksham travels', 'Nic', 'deadpool');

-- --------------------------------------------------------

--
-- Table structure for table `bus_registeration`
--

CREATE TABLE `bus_registeration` (
  `bid` int(255) NOT NULL,
  `oid` int(255) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `bus_no` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_registeration`
--

INSERT INTO `bus_registeration` (`bid`, `oid`, `bus_name`, `bus_no`, `origin`, `destination`) VALUES
(64, 20, 'saksham travels', 'Ba1Kha6673', 'Gaighat', 'Kathmandu'),
(65, 20, 'saksham travels', 'Ba1Kha6673', 'Kathmandu', 'Gaighat');

-- --------------------------------------------------------

--
-- Table structure for table `bus_schedule`
--

CREATE TABLE `bus_schedule` (
  `Id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `no_of_seats` int(11) NOT NULL,
  `date` date NOT NULL,
  `fare` int(11) NOT NULL,
  `arrival_time` time NOT NULL,
  `departure_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_schedule`
--

INSERT INTO `bus_schedule` (`Id`, `bid`, `origin`, `destination`, `no_of_seats`, `date`, `fare`, `arrival_time`, `departure_time`) VALUES
(52, 64, 'Gaighat', 'Kathmandu', 28, '2021-07-24', 200, '17:43:00', '19:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `delete_booking`
--

CREATE TABLE `delete_booking` (
  `dbid` int(11) NOT NULL,
  `booking_date` datetime NOT NULL,
  `No_of_seats` int(11) NOT NULL,
  `Total_fare` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Fname` varchar(200) DEFAULT NULL,
  `Lname` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Security` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Fname`, `Lname`, `Email`, `Username`, `Password`, `Security`) VALUES
(28, 'kartabya', 'raj', 'kartabya6673@gmail.com', 'kartabya123', '6673', 'udayasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Booking_id`),
  ADD KEY `uid` (`UserId`),
  ADD KEY `booking_ibfk_2` (`Id`);

--
-- Indexes for table `bus_owner`
--
ALTER TABLE `bus_owner`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `bus_registeration`
--
ALTER TABLE `bus_registeration`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `bus_schedule`
--
ALTER TABLE `bus_schedule`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `bus_schedule_ibfk_1` (`bid`);

--
-- Indexes for table `delete_booking`
--
ALTER TABLE `delete_booking`
  ADD PRIMARY KEY (`dbid`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `delete_booking_ibfk_2` (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `bus_owner`
--
ALTER TABLE `bus_owner`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bus_registeration`
--
ALTER TABLE `bus_registeration`
  MODIFY `bid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `bus_schedule`
--
ALTER TABLE `bus_schedule`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `delete_booking`
--
ALTER TABLE `delete_booking`
  MODIFY `dbid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`Id`) REFERENCES `bus_schedule` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bus_registeration`
--
ALTER TABLE `bus_registeration`
  ADD CONSTRAINT `bus_registeration_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `bus_owner` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bus_schedule`
--
ALTER TABLE `bus_schedule`
  ADD CONSTRAINT `bus_schedule_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `bus_registeration` (`bid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delete_booking`
--
ALTER TABLE `delete_booking`
  ADD CONSTRAINT `delete_booking_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `delete_booking_ibfk_2` FOREIGN KEY (`Id`) REFERENCES `bus_schedule` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
