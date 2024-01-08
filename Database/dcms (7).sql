-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2024 at 02:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar_event_master`
--

CREATE TABLE `calendar_event_master` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(250) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar_event_master`
--

INSERT INTO `calendar_event_master` (`event_id`, `event_name`, `event_start_date`, `event_end_date`) VALUES
(12, 'Dave', '2023-02-27', '8:00 AM - 9:00 AM'),
(13, 'Nikkie', '2023-03-17', '8:00 AM - 9:00 AM'),
(14, 'Carandang', '2023-03-25', '10:00 AM - 11:00 AM'),
(15, 'qweqwe', '2023-03-22', '1:00 PM - 2:00 PM'),
(16, 'Dentist Two', '2023-03-22', '1:00 PM - 2:00 PM'),
(17, 'Ala', '2023-03-09', '1:00 PM - 2:00 PM'),
(18, '', '1970-01-01', '8:00 AM - 9:00 AM'),
(19, 'Carandang', '2023-03-25', '10:00 AM - 11:00 AM'),
(20, 'Carandang', '2023-03-20', '11:00 AM - 12:00 PM'),
(21, 'Carandang', '2023-03-20', '11:00 AM - 12:00 PM'),
(22, 'Carandang', '2023-03-20', '11:00 AM - 12:00 PM'),
(23, 'Carandang', '2023-03-20', '11:00 AM - 12:00 PM'),
(24, 'Carandang', '2023-03-30', ''),
(25, 'Carandang', '2023-03-30', ''),
(26, 'Carandang', '2023-03-30', ''),
(27, 'Carandang', '2023-03-30', ''),
(28, 'Carandang', '2023-03-30', '');

-- --------------------------------------------------------

--
-- Table structure for table `dentist`
--

CREATE TABLE `dentist` (
  `dentistId` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `birthdate` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dentist`
--

INSERT INTO `dentist` (`dentistId`, `fullname`, `birthdate`, `address`, `gender`, `phone`, `email`, `password`, `position`) VALUES
(9, 'Staff One', '2023-03-01', 'Staff Address', 'Male', '987654', 'staff1@gmail.com', 'cbb9d0bd363a429d6d4bb85cdf509ee9b53e69fd', 'Staff'),
(11, 'Admin One', '2023-03-01', 'Admin One Address', 'Male', '132321321', 'admin1@gmail.com', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 'Admin'),
(12, 'Marc Feir Bauzon', '2023-03-05', 'Binangonan Rizal Tatala', 'Male', '2147483647', 'marcfeirbauzon@gmail.com', 'a397e938cfdcba9c3490743614d375b9fa4876e4', 'Dentist');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `productId` int(11) NOT NULL,
  `products` varchar(250) NOT NULL,
  `stocks` int(11) NOT NULL,
  `last_updated` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`productId`, `products`, `stocks`, `last_updated`) VALUES
(2, 'Syringe', 31, '0000-00-00'),
(3, 'Gloves', 32, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescriptionId` int(11) NOT NULL,
  `reqId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `dentistId` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL,
  `dateToday` varchar(250) NOT NULL,
  `patientName` varchar(250) NOT NULL,
  `dentistName` varchar(250) NOT NULL,
  `medicine` varchar(250) NOT NULL,
  `notes` varchar(250) NOT NULL,
  `date_Submitted` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescriptionId`, `reqId`, `patientId`, `dentistId`, `serviceId`, `dateToday`, `patientName`, `dentistName`, `medicine`, `notes`, `date_Submitted`) VALUES
(10, 119, 41, 8, 1, '2023-03-13', 'Andew Ala', 'Dentist One', 'Amoxicillin', 'Drink 3 times a Day', '2023-04-01'),
(11, 120, 38, 10, 3, '2023-03-14', 'Mae Angelou Caballes', 'Dentist Two', 'Medicine Example', 'Notes Example', '2023-04-03'),
(12, 127, 47, 8, 1, '2023-03-15', 'Geralden  Anain', 'Dentist One', 'Sample Medicine 2', 'Sample Notes 2', '2023-03-29'),
(15, 126, 46, 10, 4, '2023-03-14', 'Dexter  Rodriguez', 'Dentist Two', 'Biogesic', 'Sample Notes', '2023-03-12'),
(16, 132, 43, 8, 4, '2023-03-20', 'Andrea Cabisares', 'Dentist One', 'Bioflu', 'qweqweqwe', '2023-03-05'),
(27, 135, 44, 12, 0, '2023-03-24', 'Ervin Malate', 'Marc Feir Bauzon', 'qwe', 'qwe', '2023-04-08'),
(28, 123, 44, 8, 0, '2023-03-24', 'Ervin Malate', 'Dentist One', 'qwe', 'qwe', '2023-04-11'),
(29, 137, 44, 8, 0, '2023-03-24', 'Ervin Malate', 'Dentist One', 'qweq', 'qwe', '2023-04-10'),
(30, 125, 45, 8, 0, '2023-04-02', 'Paulo Alcantara', 'Dentist One', 'qwe', 'qwe', '2023-04-09'),
(31, 130, 40, 10, 0, '2023-04-05', 'Dave Carandang', 'Dentist Two', 'Yakapsul', 'Sample Notes', '2023-04-04'),
(32, 131, 40, 8, 0, '2023-04-10', 'Dave Carandang', 'Dentist One', 'dqwdq', 'dqwdq', '2023-03-26'),
(33, 124, 39, 8, 0, '2023-03-31', 'Nikkie Bueno', 'Dentist One', 'eqweq', 'qwe', '2023-03-22'),
(34, 140, 40, 12, 0, '2023-04-30', 'Dave Carandang', 'Marc Feir Bauzon', 'QWE', 'qweq', '2023-03-19'),
(35, 149, 50, 12, 0, '2023-04-16', 'Aris Mayorca', 'Marc Feir Bauzon', 'Yakapsul', 'Inumin minu minuto', '2023-04-12'),
(36, 133, 48, 10, 0, '2023-04-07', 'Elg  Bulseco', 'Dentist Two', 'dwada', 'awd', '2023-04-11'),
(37, 129, 40, 10, 0, '2023-04-06', 'Dave Carandang', 'Dentist Two', 'dwadaw', 'awda', '2023-04-11'),
(38, 153, 40, 12, 0, '2023-04-01', 'Dave Carandang', 'Marc Feir Bauzon', 'dwada', 'awd', '2023-04-12'),
(39, 157, 44, 8, 0, '2023-04-13', 'Ervin Malate', 'Dentist One', 'QWEQEQWE', 'QWEQ', '2023-04-13'),
(40, 138, 48, 8, 0, '0000-00-00', 'Elg  Bulseco', 'Dentist One', 'kisspirin', 'qwe', '2023-04-13'),
(41, 139, 44, 8, 0, 'Fri Apr 21 2023', 'Ervin Malate', 'Dentist One', 'dwada', 'dwa', '2023-04-13'),
(42, 158, 49, 8, 0, 'Thu Apr 20 2023', 'Emman Barrameda', 'Dentist One', 'dwadaw', 'dawda', '2023-04-20'),
(43, 141, 49, 12, 0, 'Wed Apr 12 2023', 'Emman Barrameda', 'Marc Feir Bauzon', 'dwad', 'wad', '2023-04-20'),
(44, 162, 49, 12, 0, 'Thu Apr 20 2023', 'Emman Barrameda', 'Marc Feir Bauzon', 'dwadwa', 'dwad', '2023-04-20'),
(45, 169, 52, 12, 0, 'Sun Apr 30 2023', 'John Doe', 'Marc Feir Bauzon', 'Example Medicine', 'Sample Notes', '2023-04-29'),
(46, 182, 38, 12, 0, 'Wed May 10 2023', 'Mae Angelou Caballes', 'Marc Feir Bauzon', '123', '123', '2023-05-10'),
(47, 136, 48, 12, 0, 'Sat Mar 25 2023', 'Elg  Bulseco', 'Marc Feir Bauzon', 'dwada', 'dwa', '2023-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `querymessages`
--

CREATE TABLE `querymessages` (
  `messageId` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `date_submitted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `querymessages`
--

INSERT INTO `querymessages` (`messageId`, `name`, `email`, `phone`, `message`, `date_submitted`) VALUES
(4, 'Dave Carandang', 'davecarandang9@gmail.com', '214748364', 'Hello po sa inyo      ', '2023-04-10'),
(5, 'Andrew Ala', 'andrew@gmail.com', '2147483647', 'qweqweqwqw eqwe qweqweqwe qweqweqw eqwe qweqwe qweqweqeqwe qwe qweqwe qweqweq qweqw eqweqweq qweqwe qweq\r\nqweq qweqweqw qweqwe qweq we qweqwe qweq we qew QWEQEq qweqwe qweq qweqwe                        ', '2023-04-10'),
(6, 'Mae Angelou', 'mae@gmail.com', '12345678909', 'qweqwe qweqwe qweqw\r\n                        ', '2023-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `request_appointment`
--

CREATE TABLE `request_appointment` (
  `reqId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `dentistId` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL,
  `appointment_date` varchar(250) NOT NULL,
  `concerned` varchar(250) NOT NULL,
  `appointment_time` varchar(250) NOT NULL,
  `date_submitted` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `statusTreated` varchar(250) NOT NULL,
  `statusPrescription` varchar(250) NOT NULL,
  `q1` varchar(250) NOT NULL,
  `q2` varchar(250) NOT NULL,
  `q3` varchar(250) NOT NULL,
  `q4` varchar(250) NOT NULL,
  `q5` varchar(250) NOT NULL,
  `q6` varchar(250) NOT NULL,
  `q7` varchar(250) NOT NULL,
  `q8` varchar(250) NOT NULL,
  `q9` varchar(250) NOT NULL,
  `q10` varchar(250) NOT NULL,
  `q11` varchar(250) NOT NULL,
  `q12` varchar(250) NOT NULL,
  `q13` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_appointment`
--

INSERT INTO `request_appointment` (`reqId`, `patientId`, `dentistId`, `serviceId`, `appointment_date`, `concerned`, `appointment_time`, `date_submitted`, `status`, `statusTreated`, `statusPrescription`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`) VALUES
(119, 41, 8, 1, '2023-03-13', '', '8:00 AM - 9:00 AM', 'March 16, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(120, 38, 10, 3, '2023-03-14', '', '1:00 PM - 2:00 PM', 'March 16, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(121, 40, 8, 4, '2023-03-16', '', '1:00 PM - 2:00 PM', 'March 16, 2023', 'No Show', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(122, 43, 10, 3, '2023-03-22', '', '4:00 PM - 5:00 PM', 'March 16, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(123, 44, 8, 3, '2023-03-19', '', '2:00 PM - 3:00 PM', 'March 16, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(124, 39, 8, 4, '2023-03-18', '', '10:00 AM - 11:00 AM', 'March 16, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(125, 45, 8, 4, '2023-03-16', '', '2:00 PM - 3:00 PM', 'March 16, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(126, 46, 10, 4, '2023-03-17', '', '9:00 AM - 10:00 AM', 'March 16, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(127, 47, 8, 1, '2023-03-15', '', '3:00 PM - 4:00 PM', 'March 16, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(128, 48, 10, 3, '2023-03-16', '', '11:00 AM - 12:00 PM', 'March 16, 2023', 'Cancelled', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(129, 40, 10, 3, '2023-03-22', '', '', 'March 21, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(130, 40, 10, 4, '2023-03-25', '', '', 'March 21, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(131, 40, 8, 4, '2023-03-30', '', '', 'March 21, 2023', 'Treated', 'statustreated', 'statusPrescription', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(132, 43, 8, 4, '2023-03-20', '', '', 'March 21, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(133, 48, 10, 3, '2023-03-21', '', '', 'March 21, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(135, 44, 12, 0, '2023-03-24', '', '', 'March 24, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(136, 48, 12, 0, '2023-03-25', '', '', 'March 24, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(137, 44, 8, 0, '2023-03-24', '', '', 'March 24, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(138, 48, 8, 0, '2023-04-20', '', '', 'April 08, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(139, 44, 8, 0, '2023-04-21', '', '', 'April 08, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(140, 40, 12, 0, '2023-04-30', '', '', 'April 11, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(141, 49, 12, 0, '2023-04-12', '', '', 'April 11, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(149, 50, 12, 0, '2023-04-16', '', '', 'April 11, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(150, 50, 10, 0, '2023-04-14', 'Sample Concerne', '', 'April 11, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', 'No', 'No', 'No', 'No'),
(153, 40, 12, 0, '2023-04-11', 'qweqweq\r\n                            ', '', 'April 11, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(154, 40, 12, 0, '2023-04-12', 'qweqweq\r\n                            ', '', 'April 11, 2023', 'Confirmed', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(156, 41, 12, 0, '2023-04-22', 'qwerty            ', '', 'April 11, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No'),
(157, 44, 8, 0, '2023-04-13', 'dwadwa\r\n                            ', '', 'April 13, 2023', 'Treated', '', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(158, 49, 8, 0, '2023-04-20', 'dwadwadawdwa                        ', '', 'April 20, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(159, 49, 12, 0, '2023-04-20', 'dwadadawd', '', 'April 20, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', 'No', 'No', 'No'),
(160, 49, 12, 0, '2023-04-20', 'dwadadawd', '', 'April 20, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', 'No', 'No', 'No'),
(161, 49, 12, 0, '2023-04-20', 'dwadadawd', '', 'April 20, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', '', 'No', 'No', 'No'),
(162, 49, 12, 0, '2023-04-20', 'dwadwa', '', 'April 20, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(163, 49, 10, 0, '2023-04-30', 'dwadaw\r\n                            ', '', 'April 20, 2023', 'Confirmed', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(164, 40, 16, 0, '2023-04-29', 'dwadwa\r\n                            ', '', 'April 22, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(165, 40, 16, 0, '2023-04-28', 'dwadaw', '', 'April 22, 2023', 'Pending', '', '', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(166, 40, 16, 0, '2023-04-27', 'dwadawd\r\n                            ', '', 'April 22, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(167, 52, 12, 0, '2023-04-30', 'Sample Concerned Appointment\r\n                            ', '', 'April 29, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(168, 52, 12, 0, '2023-04-30', 'Sample Concerned Appointment\r\n                            ', '', 'April 29, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(169, 52, 12, 0, '2023-04-30', 'Sample Concerned\r\n                            ', '', 'April 29, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(170, 43, 12, 12, '2023-05-04', '', '', 'May 03, 2023', 'Confirmed', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(171, 47, 12, 0, '2023-05-05', 'sample lang \r\n                                    ', '', 'May 03, 2023', 'Confirmed', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(172, 52, 12, 0, '2023-05-05', 'qweqwe\r\n                                    ', '', 'May 03, 2023', 'Confirmed', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(173, 45, 12, 0, '2023-05-05', 'dwdada\r\n                                    ', '', 'May 03, 2023', 'Confirmed', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(174, 49, 10, 0, '2023-05-06', 'dwadaw\r\n                                    ', '', 'May 03, 2023', 'Treated', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No', 'No'),
(175, 40, 16, 0, '2023-05-07', '123\r\n                            ', '', 'May 03, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(176, 40, 16, 0, '2023-05-18', 'd123\r\n                            ', '', 'May 03, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No'),
(177, 44, 16, 0, '2023-05-31', 'dwadwa ', '', 'May 03, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(178, 40, 16, 0, '2023-05-11', '\r\n                            dwad', '', 'May 09, 2023', 'Pending', '', '', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(179, 40, 12, 0, '2023-05-04', '123\r\n                            ', '', 'May 10, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(180, 40, 16, 0, '2023-05-02', '123\r\n                            ', '', 'May 10, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes'),
(181, 40, 12, 0, '2023-05-11', '123\r\n                            ', '', 'May 10, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(182, 38, 12, 0, '2023-05-10', 'qwerty\r\n                            ', '', 'May 10, 2023', 'Treated', 'statustreated', 'statusPrescription', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(183, 48, 8, 0, '2023-05-10', 'qwe\r\n                            ', '', 'May 10, 2023', 'Treated', 'statustreated', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(184, 40, 12, 0, '2023-07-01', 'Check Up\r\n                            ', '', 'July 01, 2023', 'Confirmed', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(185, 40, 12, 0, '2023-07-14', 'wdada\r\n                            ', '', 'July 03, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(186, 40, 12, 0, '2023-07-05', 'weqeqweqweqweqeqeq\r\n                            ', '', 'July 04, 2023', 'Confirmed', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(187, 40, 16, 0, '2023-07-08', 'Weh\r\n                            ', '', 'July 04, 2023', 'Pending', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'Yes', 'No', 'No'),
(188, 40, 8, 0, '2023-10-03', 'OO\r\n                            ', '', 'October 03, 2023', 'Treated', '', '', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No'),
(189, 40, 12, 0, '2023-10-20', 'QWERTY\r\n                            ', '', 'October 14, 2023', 'Treated', 'statustreated', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(208, 40, 12, 0, '2023-10-22', 'qwe\r\n                            ', '', 'October 14, 2023', 'Treated', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(209, 40, 12, 0, '2023-10-15', 'Magpapacheck up po\r\n                            ', '', 'October 15, 2023', 'Treated', 'statustreated', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(210, 40, 12, 0, '2023-10-23', 'tae\r\n                            ', '', 'October 23, 2023', 'Treated', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `salesId` int(11) NOT NULL,
  `salesToday` varchar(250) NOT NULL,
  `sales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceId` int(11) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `fees` int(11) NOT NULL,
  `article_title` varchar(250) NOT NULL,
  `content` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceId`, `service_name`, `fees`, `article_title`, `content`) VALUES
(1, 'Sample Service 1', 500, 'Sample Article', 'Sample Content dwqdqwdqwdq qwqeqweqwe qweqweqweqwe qweqweq qweq weq weq weqweqweqw eqweqweqweqweq\r\n                                        '),
(3, 'Sample Service 2', 600, 'Sample Article 2', 'qweqwe qweqweqwe qweqwe qweqweqwe qweqweqw qweqweqwe qweqweqwe qweqweqwe qweqwe qweqweqweqwe qweqweqwe qweqweqwe qweqwe qweqweqwe qweqweqwe qweqweqwe qwewew qweqw wqe weqwe qweq qwe qweqwe wqe qwe             '),
(4, 'Sample Service 3', 700, 'Sample Article 3', 'qweqwe qwe qwe qwe QWEQEQ qweqw eqwe qweq we qwe qwe qwe qwe qweqweq we qwe qwe qwe qweqweqweq qweqweqwe qweqw eqwe\r\n                                        '),
(6, 'Oral Examination', 1500, 'Oral Examination Example Article', 'The oral exam, also called a comprehensive dental exam, is the foundation of your oral health. It is the first step a dentist must take in determining the condition of your teeth and gums, and the orientation of your bite and will reveal evidence of '),
(7, 'X - Rays ', 1000, 'X - Rays Sample Article', 'Dental X-rays help dentists visualize diseases of the teeth and surrounding tissue that cannot be seen with a simple oral exam. They also help the dentist find and treat dental problems early on, which can help save you money, unnecessary discomfort,'),
(8, 'Teeth Whitening', 9000, 'Teeth Whitening Sample Article', 'Dental teeth whitening is a cosmetic dental procedure that aims to lighten the colour of the natural teeth by removing stains and discoloration\r\n                                        '),
(9, 'Root Canal Treatment', 18000, 'Root Canal Treatment Article', 'A root canal is a dental procedure that removes the pulp, the soft center of the tooth that contains nerves, blood vessels, and connective tissue.\r\n                                        '),
(10, 'Tooth Extractions', 500, 'Extractions Sample Article', 'Tooth extraction is the complete removal of a tooth, including the roots in the jawbone\r\n                                        '),
(11, 'Veneers', 12000, 'Veneers Sample Article', 'Dental veneers are custom-made shells of tooth-colored materials, such as porcelain or resin-composite, that are bonded to the front surface of teeth to improve their appearance\r\n                                        '),
(12, 'Perform Oral Surgery', 4000, 'Perform Oral Surgery Sample Article', 'Oral surgery dentistry is a specialty that focuses on the health of the mouth, jaw, and related structures.\r\n                                        '),
(13, 'Braces', 30000, 'Braces Sample Article', 'Braces for teeth are devices used to straighten crooked teeth or correct a misaligned bite\r\n                                        '),
(15, 'Check Up', 500, '', 'A dental checkup is a routine visit that consists of an examination and cleaning of your teeth, gums and mouth. It is recommended that you get a dental checkup every six months to prevent or detect any oral health problems. During a dental checkup\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `treatmentId` int(11) NOT NULL,
  `reqId` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `dentistId` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL,
  `date_visit` varchar(250) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `teethNo` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `fees` int(11) NOT NULL,
  `totalFees` int(11) NOT NULL,
  `totalChange` int(11) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `dateTreatment_submitted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`treatmentId`, `reqId`, `patientId`, `dentistId`, `serviceId`, `date_visit`, `service_name`, `teethNo`, `description`, `fees`, `totalFees`, `totalChange`, `remarks`, `dateTreatment_submitted`) VALUES
(45, 119, 41, 8, 1, '2023-03-13', 'Sample Service 1', '25', 'Sample Description', 500, 0, 0, 'Sample ', '2023-03-16'),
(46, 120, 38, 10, 3, '2023-03-14', 'Sample Service 2', '25', 'Sample Description', 600, 0, 0, 'Sample Remarks', '2023-03-16'),
(47, 127, 47, 8, 1, '2023-03-15', 'Sample Service 1', '23', 'Sample Deqwe', 500, 0, 0, 'qweqwe', '2023-03-16'),
(48, 126, 46, 10, 4, '2023-03-17', 'Sample Service 3', '24', 'QWEQWEQ', 700, 0, 0, '', '2023-03-21'),
(49, 132, 43, 8, 4, '2023-03-20', 'Sample Service 3', '20', 'qweqwe', 700, 0, 0, 'qweqwe', '2023-03-21'),
(53, 135, 44, 12, 0, '2023-03-24', 'Sample Service 1,Sample Service 2', '12', 'qwe', 300, 0, 0, 'qwe', '2023-03-24'),
(54, 123, 44, 8, 0, '2023-03-19', 'Sample Service 1,Sample Service 3', '123', 'qweqw', 1000, 0, 0, 'qwe', '2023-03-24'),
(55, 137, 44, 8, 0, '2023-03-24', 'Sample Service 1', '1', 'qwe', 0, 0, 0, 'qwe', '2023-03-24'),
(56, 130, 40, 10, 0, '2023-03-25', 'Sample Service 1,Sample Service 2', '20', 'qwe', 800, 0, 0, 'qwe', '2023-03-25'),
(59, 131, 40, 8, 0, '2023-03-30', 'Sample Service 1,Sample Service 3', '2', 'qwe', 123, 0, 0, 'qwe', '2023-04-01'),
(60, 125, 45, 8, 0, '2023-03-16', 'Sample Service 1,Sample Service 3', '', 'Desc 13', 13, 0, 0, 'Rem 13', '2023-04-02'),
(61, 124, 39, 8, 0, '2023-03-18', 'Sample Service 1', '', 'qweqwe', 300, 0, 0, 'qweqwe', '2023-04-10'),
(62, 129, 40, 10, 0, '2023-03-22', 'Braces', '', 'qweqwe', 5000, 0, 0, 'qweq', '2023-04-10'),
(63, 133, 48, 10, 0, 'Tue Mar 21 2023', 'Sample Service 1,Sample Service 3,Veneers', '', 'qweqwe', 30000, 0, 0, 'qweqweq', '2023-04-10'),
(64, 149, 50, 12, 0, 'Sun Apr 16 2023', 'X - Rays ,Teeth Whitening', '', 'wqeqwewq', 10000, 0, 0, 'qweqweq', '2023-04-11'),
(65, 140, 40, 12, 0, 'Sun Apr 30 2023', 'Sample Service 1,Sample Service 3,Braces', '', 'waea', 35000, 0, 0, 'qwe', '2023-04-11'),
(66, 153, 40, 12, 0, 'Tue Apr 11 2023', 'Root Canal Treatment,Veneers', '', 'dwad', 20000, 0, 0, 'wa', '2023-04-11'),
(67, 157, 44, 8, 0, 'Thu Apr 13 2023', 'Sample Service 1,Veneers,Braces', '', 'dwda', 50000, 0, 0, 'awd', '2023-04-13'),
(68, 138, 48, 8, 0, 'Thu Apr 20 2023', 'Sample Service 1,Sample Service 2', '', 'dwa', 500, 0, 0, 'dwa', '2023-04-13'),
(71, 158, 49, 8, 0, 'Thu Apr 20 2023', 'Oral Examination,Teeth Whitening', '', 'dwadwa', 1000, 1000, 0, '', '2023-04-20'),
(72, 139, 44, 8, 0, 'Fri Apr 21 2023', 'Sample Service 1,Sample Service 3', '', 'dwada', 6000, 5000, 1000, '', '2023-04-20'),
(73, 162, 49, 12, 0, 'Thu Apr 20 2023', 'Sample Service 3,X - Rays ', '', 'dwada', 1000, 550, 450, '', '2023-04-20'),
(74, 136, 48, 12, 0, 'Sat Mar 25 2023', 'Sample Service 1,Sample Service 3', '', 'dwadwa', 1000, 1000, 0, '', '2023-04-20'),
(75, 169, 52, 12, 0, 'Sun Apr 30 2023', 'Teeth Whitening', '', 'dwadawd', 5000, 5000, 0, '', '2023-04-29'),
(76, 182, 38, 12, 0, 'Wed May 10 2023', 'Sample Service 1,Sample Service 3', '', 'sample', 3000, 3000, 0, '', '2023-05-10'),
(77, 183, 48, 8, 0, 'Wed May 10 2023', 'Sample Service 1,Braces', '', '123', 5000, 5000, 0, '', '2023-05-10'),
(78, 209, 40, 12, 0, 'Sun Oct 15 2023', 'Check Up', '', '', 0, 0, 0, '', '2023-10-15'),
(79, 189, 40, 12, 0, 'Fri Oct 20 2023', 'Root Canal Treatment', '', 'dwa', 1233, 123, 1110, '', '2023-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `patientId` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone_no` varchar(250) NOT NULL,
  `position` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass_word` varchar(50) NOT NULL,
  `created` date NOT NULL,
  `token` varchar(100) NOT NULL,
  `token_expire` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `teeth1` varchar(250) NOT NULL,
  `teeth2` varchar(250) NOT NULL,
  `teeth3` varchar(250) NOT NULL,
  `teeth4` varchar(250) NOT NULL,
  `teeth5` varchar(250) NOT NULL,
  `teeth6` varchar(250) NOT NULL,
  `teeth7` varchar(250) NOT NULL,
  `teeth8` varchar(250) NOT NULL,
  `teeth9` varchar(250) NOT NULL,
  `teeth10` varchar(250) NOT NULL,
  `teeth11` varchar(250) NOT NULL,
  `teeth12` varchar(250) NOT NULL,
  `teeth13` varchar(250) NOT NULL,
  `teeth14` varchar(250) NOT NULL,
  `teeth15` varchar(250) NOT NULL,
  `teeth16` varchar(250) NOT NULL,
  `teeth17` varchar(250) NOT NULL,
  `teeth18` varchar(250) NOT NULL,
  `teeth19` varchar(250) NOT NULL,
  `teeth20` varchar(250) NOT NULL,
  `teeth21` varchar(250) NOT NULL,
  `teeth22` varchar(250) NOT NULL,
  `teeth23` varchar(250) NOT NULL,
  `teeth24` varchar(250) NOT NULL,
  `teeth25` varchar(250) NOT NULL,
  `teeth26` varchar(250) NOT NULL,
  `teeth27` varchar(250) NOT NULL,
  `teeth28` varchar(250) NOT NULL,
  `teeth29` varchar(250) NOT NULL,
  `teeth30` varchar(250) NOT NULL,
  `teeth31` varchar(250) NOT NULL,
  `teeth32` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`patientId`, `first_name`, `last_name`, `birth_date`, `gender`, `phone_no`, `position`, `address`, `email`, `pass_word`, `created`, `token`, `token_expire`, `teeth1`, `teeth2`, `teeth3`, `teeth4`, `teeth5`, `teeth6`, `teeth7`, `teeth8`, `teeth9`, `teeth10`, `teeth11`, `teeth12`, `teeth13`, `teeth14`, `teeth15`, `teeth16`, `teeth17`, `teeth18`, `teeth19`, `teeth20`, `teeth21`, `teeth22`, `teeth23`, `teeth24`, `teeth25`, `teeth26`, `teeth27`, `teeth28`, `teeth29`, `teeth30`, `teeth31`, `teeth32`) VALUES
(38, 'Mae Angelou', 'Caballes', '2023-03-11', 'Female', '21474836', 'Patient', 'Dyan lang', 'mae@gmail.com', '60850bde72a1048bba0c75b8d3d927a6614de512', '2023-03-08', '', '2023-04-09 05:58:31.943465', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, 'Nikkie', 'Bueno', '2023-03-08', 'Male', '2147483647', 'Patient', 'Dyan lang', 'nikkie@gmail.com', 'c43a162e85098723929a85d8555fc95671b5667e', '2023-03-08', '', '2023-03-08 21:14:14.282795', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(40, 'Dave', 'Carandang', '2023-03-11', 'Male', '123456789', 'Patient', 'Brgy Example Manila', 'davecarandang9@gmail.com', '760cf0ccbec25b131e84eec5e1190b8ea7bc9f3f', '2023-03-09', '3hcmrnfo5j', '2023-10-23 10:20:09.000000', '', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked'),
(41, 'Andew', 'Ala', '2023-03-09', 'Male', '2147483647', 'Patient', 'Tatala Binangonan Rizal', 'andrewjuanzoala12@gmail.com', '5b4903d7bba8d1efd9e8dcd54606c59ca5e4a6a1', '2023-03-10', '', '2023-04-02 04:38:20.910663', 'isChecked', '', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', '', '', ''),
(43, 'Andrea', 'Cabisares', '2023-03-10', 'Female', '2147483647', 'Patient', 'Dyan lang ', 'andrea@gmail.com', 'fdb87dfd199045af7165780b11640b83768a0d57', '2023-03-11', '', '2023-04-02 04:34:42.389894', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'isChecked', '', '', ''),
(44, 'Ervin', 'Malate', '2008-08-14', 'Male', '2147483647', 'Patient', 'Angono', 'ervin@gmail.com', 'f6ebb8b5f342fb093fa46a1195c6c9fb6deb62d5', '2023-03-14', '', '2023-05-10 12:42:54.064577', '', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', '', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked'),
(45, 'Paulo', 'Alcantara', '2002-07-15', 'Male', '2147483647', 'Patient', 'Tayuman Binangonan Rizal', 'paulo@gmail.com', 'fd077434a7c3095bfe440741787d02f6a7bab07e', '2023-03-16', '', '2023-03-16 05:14:52.012370', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(46, 'Dexter ', 'Rodriguez', '2009-03-15', 'Male', '1111111111', 'Patient', 'Pag Asa Binangonan RIzal', 'dexter@gmail.com', 'efce8cd161897feeaa7979d892dc26a8a8d8eea3', '2023-03-16', '', '2023-03-16 05:17:10.376138', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(47, 'Geralden ', 'Anain', '2010-03-15', 'Female', '2147483647', 'Patient', 'Isla Binangonan RIzal', 'geralden@gmail.com', '6a54db181c20061e6cba0e516f3171845de6d91c', '2023-03-16', '', '2023-04-02 04:37:48.289327', '', '', '', '', '', 'isChecked', '', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, 'Elg ', 'Bulseco', '2011-03-15', 'Male', '987654321', 'Patient', 'Mabuhay Binangonan Rizal', 'elg@gmail.com', '41ba6915bf6c8c585094ac1842d386642c94c555', '2023-03-16', '', '2023-04-10 04:13:12.561996', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(49, 'Emman', 'Barrameda', '2023-04-11', 'Male', '123456789', 'Patient', 'Mabuhay Binangonan Rizal', 'emmanuelbarrameda1@gmail.com', 'b1c09d13fcc9fa06b2ee0c524f5f0ec8fc79bf8e', '2023-04-11', '', '2023-05-10 12:34:56.740491', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked'),
(50, 'Aris', 'Mayorca', '2021-04-02', 'Male', '1234567891', 'Patient', 'URS Binangonan', 'arismayorca@gmail.com', '2c51fc82de54c7589492d64fd0e9505f45cb5812', '2023-04-11', '', '2023-04-11 15:26:10.002517', '', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', 'isChecked', ''),
(51, 'Edward', 'Teologo', '2022-11-10', 'Male', '321456789', 'Patient', 'Sunshine Fiesta Tatala Binangonan Rizal', 'edward@gmail.com', '55b5a0f748d3a82dce10b205ecb0a0d8916c66a1', '2023-04-12', '', '2023-04-12 10:46:07.517411', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, 'John', 'Doe', '2023-04-29', 'Male', '999999999', 'Patient', 'sample address', 'johndoe@gmail.com', '6c074fa94c98638dfe3e3b74240573eb128b3d16', '2023-04-29', 'qskjzb8147', '2023-04-29 05:05:57.000000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(53, '123', '123', '2023-05-01', 'Female', '2214748364722', 'Patient', '123', '123@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-05-11', '', '2023-05-11 16:04:51.179756', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(54, 'zxc', 'zxc', '2023-05-06', 'Male', '09999999990', 'Patient', 'zxc', 'zxc@gmail.com', 'a938dfdfbaa1f25ccbc39e16060f73c44e5ef0dd', '2023-05-11', '', '2023-05-11 16:07:37.946370', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, '3', '3', '2023-05-03', 'Male', '3333333330', 'Patient', '3', '3@gmail.com', '77de68daecd823babbb58edb1c8e14d7106e83bb', '2023-05-11', '', '2023-05-11 16:11:14.394910', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(56, 'asd', 'asd', '2023-05-04', 'Male', '077777777701', 'Patient', 'asd', 'asd@gmail.com', 'f10e2821bbbea527ea02200352313bc059445190', '2023-05-11', '', '2023-05-11 16:14:16.351468', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, 'd', 'd', '2023-10-26', 'Male', '1', 'Patient', 'a', 'dcarandang31@gmail.com', 'bfcdf3e6ca6cef45543bfbb57509c92aec9a39fb', '2023-10-26', '', '2023-10-26 01:51:17.340437', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `dentist`
--
ALTER TABLE `dentist`
  ADD PRIMARY KEY (`dentistId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescriptionId`),
  ADD KEY `reqId` (`reqId`),
  ADD KEY `dentistId` (`dentistId`),
  ADD KEY `serviceId` (`serviceId`),
  ADD KEY `patientId` (`patientId`);

--
-- Indexes for table `querymessages`
--
ALTER TABLE `querymessages`
  ADD PRIMARY KEY (`messageId`);

--
-- Indexes for table `request_appointment`
--
ALTER TABLE `request_appointment`
  ADD PRIMARY KEY (`reqId`),
  ADD KEY `patientId` (`patientId`),
  ADD KEY `dentistId` (`dentistId`),
  ADD KEY `serviceId` (`serviceId`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceId`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`treatmentId`),
  ADD KEY `patientId` (`patientId`),
  ADD KEY `dentistId` (`dentistId`),
  ADD KEY `serviceId` (`serviceId`),
  ADD KEY `reqId` (`reqId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`patientId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `dentist`
--
ALTER TABLE `dentist`
  MODIFY `dentistId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescriptionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `querymessages`
--
ALTER TABLE `querymessages`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `request_appointment`
--
ALTER TABLE `request_appointment`
  MODIFY `reqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `treatmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `patientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`reqId`) REFERENCES `request_appointment` (`reqId`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`dentistId`) REFERENCES `dentist` (`dentistId`),
  ADD CONSTRAINT `prescription_ibfk_4` FOREIGN KEY (`patientId`) REFERENCES `users` (`patientId`);

--
-- Constraints for table `request_appointment`
--
ALTER TABLE `request_appointment`
  ADD CONSTRAINT `request_appointment_ibfk_1` FOREIGN KEY (`patientId`) REFERENCES `users` (`patientId`),
  ADD CONSTRAINT `request_appointment_ibfk_2` FOREIGN KEY (`dentistId`) REFERENCES `dentist` (`dentistId`);

--
-- Constraints for table `treatment`
--
ALTER TABLE `treatment`
  ADD CONSTRAINT `treatment_ibfk_1` FOREIGN KEY (`reqId`) REFERENCES `request_appointment` (`reqId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
