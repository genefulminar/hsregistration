-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 05:08 AM
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
-- Database: `herosystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_ip_info`
--

CREATE TABLE `area_ip_info` (
  `ID` int(11) NOT NULL,
  `ipaddress` varchar(100) NOT NULL,
  `AssignArea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area_ip_info`
--

INSERT INTO `area_ip_info` (`ID`, `ipaddress`, `AssignArea`) VALUES
(1, '172.18.124.43', 1),
(2, '1.1.1', 2),
(3, '1.1.2', 2),
(4, '1.1.3', 2),
(5, '2.2.1', 3),
(6, '2.2.2', 3),
(7, '3.3.1', 4),
(8, '3.3.2', 4),
(9, '3.3.3', 4),
(10, '4.4.1', 5),
(11, '4.4.2', 5),
(12, '4.4.3', 5),
(13, '5.5.1', 6),
(14, '5.5.2', 6);

-- --------------------------------------------------------

--
-- Table structure for table `area_name_info`
--

CREATE TABLE `area_name_info` (
  `id` int(11) NOT NULL,
  `area_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area_name_info`
--

INSERT INTO `area_name_info` (`id`, `area_name`) VALUES
(1, 'Main Server'),
(2, 'Hero Selection'),
(3, 'Ark Area'),
(4, 'Officer Exhibit'),
(5, 'Infront of Ark'),
(6, 'Printing Area');

-- --------------------------------------------------------

--
-- Table structure for table `armordetails`
--

CREATE TABLE `armordetails` (
  `ArmorID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL,
  `ArmorIndex` int(11) NOT NULL,
  `ArmorName` varchar(50) NOT NULL,
  `ArmorDescription` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `armordetails`
--

INSERT INTO `armordetails` (`ArmorID`, `RoomID`, `ArmorIndex`, `ArmorName`, `ArmorDescription`) VALUES
(1, 1, 1, 'Control_Sword', 'Sword'),
(2, 2, 2, 'Control_Belt', 'Belt'),
(5, 3, 3, 'Control_Boots', 'Boots'),
(7, 4, 4, 'Control_BreastPlate', 'BreastPlate'),
(8, 5, 5, 'Control_Helmet', 'Helmet'),
(9, 6, 6, 'Control_Shield', 'Shield');

-- --------------------------------------------------------

--
-- Table structure for table `armorinfo`
--

CREATE TABLE `armorinfo` (
  `ID` int(11) NOT NULL,
  `ArmorID` int(11) NOT NULL,
  `QRCode` varchar(50) NOT NULL,
  `HeroID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `armorinfo`
--

INSERT INTO `armorinfo` (`ID`, `ArmorID`, `QRCode`, `HeroID`, `RoomID`) VALUES
(40, 1, '00001', 1, 1),
(41, 7, '00001', 1, 4),
(42, 2, '00001', 1, 2),
(43, 8, '00001', 1, 5),
(44, 9, '00001', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `guestinfo`
--

CREATE TABLE `guestinfo` (
  `ID` int(11) NOT NULL,
  `ControlNo` varchar(25) DEFAULT NULL,
  `Firstname` varchar(50) DEFAULT NULL,
  `Secondname` varchar(50) DEFAULT NULL,
  `Lastname` varchar(50) DEFAULT NULL,
  `Middlename` varchar(50) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `DateOfBirth` datetime DEFAULT NULL,
  `Gender` varchar(7) DEFAULT NULL,
  `Nickname` varchar(25) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `MothersName` varchar(50) DEFAULT NULL,
  `FathersName` varchar(50) DEFAULT NULL,
  `Locale` varchar(50) DEFAULT NULL,
  `District` varchar(50) DEFAULT NULL,
  `ChurchOffice` varchar(50) DEFAULT NULL,
  `INCMember` int(11) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `reservationdate` date DEFAULT NULL,
  `guesttype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guestinfo`
--

INSERT INTO `guestinfo` (`ID`, `ControlNo`, `Firstname`, `Secondname`, `Lastname`, `Middlename`, `Address`, `DateOfBirth`, `Gender`, `Nickname`, `Age`, `Email`, `MothersName`, `FathersName`, `Locale`, `District`, `ChurchOffice`, `INCMember`, `Image`, `DateCreated`, `reservationdate`, `guesttype`) VALUES
(1, '00001', 'Felix', NULL, 'Pareja', 'Morales', NULL, NULL, 'Male', NULL, 32, 'felixpareja07@gmail.com', NULL, NULL, 'Bagong Silang 1', 'Caloocan North', NULL, NULL, NULL, '2023-06-28 15:43:36', '2023-06-28', 0),
(2, '00002', 'Lizbeth', NULL, 'Flores', 'Pareja', NULL, NULL, 'Female', NULL, 28, NULL, NULL, NULL, 'Tandang Sora', 'Central', NULL, NULL, NULL, '2023-06-28 15:43:36', '2023-06-28', 0),
(3, '00003', 'Christopher', NULL, 'Pareja', NULL, NULL, NULL, 'Male', NULL, 31, NULL, NULL, NULL, NULL, 'Central', NULL, NULL, NULL, '2023-06-28 15:43:36', '2023-06-28', 0),
(4, '00004', 'Aldrin', 'James', 'Salvador', NULL, NULL, NULL, 'Male', NULL, 23, NULL, NULL, NULL, 'Brixtonville', 'Caloocan North', NULL, NULL, NULL, '2023-06-28 15:43:36', '2023-06-28', 0),
(5, '00001', 'Felix', NULL, 'Pareja', 'Morales', NULL, NULL, 'Male', NULL, 32, 'felixpareja07@gmail.com', NULL, NULL, 'Bagong Silang 1', 'Caloocan North', NULL, NULL, NULL, '2023-06-29 12:07:04', '2023-06-29', 0),
(6, '00002', 'Lizbeth', NULL, 'Flores', 'Pareja', NULL, NULL, 'Female', NULL, 28, NULL, NULL, NULL, 'Tandang Sora', 'Central', NULL, NULL, NULL, '2023-06-29 12:07:04', '2023-06-29', 0),
(7, '00003', 'Christopher', NULL, 'Pareja', NULL, NULL, NULL, 'Male', NULL, 31, NULL, NULL, NULL, NULL, 'Central', NULL, NULL, NULL, '2023-06-29 12:07:04', '2023-06-29', 0),
(8, '00004', 'Aldrin', 'James', 'Salvador', NULL, NULL, NULL, 'Male', NULL, 23, NULL, NULL, NULL, 'Brixtonville', 'Caloocan North', NULL, NULL, NULL, '2023-06-29 12:07:04', '2023-06-29', 0),
(9, '00001', 'Felix123', NULL, 'Pareja', 'Morales', NULL, NULL, 'Male', NULL, 32, 'felixpareja07@gmail.com', NULL, NULL, 'Bagong Silang 1', 'Caloocan North', NULL, NULL, NULL, '2023-08-11 13:25:39', '2023-08-11', 0),
(10, '00002', 'Lizbeth', NULL, 'Flores', 'Pareja', NULL, NULL, 'Female', NULL, 28, NULL, NULL, NULL, 'Tandang Sora', NULL, NULL, NULL, NULL, '2023-08-11 13:25:39', '2023-08-11', 0),
(11, '00001', 'Felix123', NULL, 'Pareja', 'Morales', NULL, NULL, 'Male', NULL, 32, 'felixpareja07@gmail.com', NULL, NULL, 'Bagong Silang 1', 'Caloocan North', NULL, NULL, NULL, '2023-08-11 13:44:20', '2023-08-12', 0),
(12, '00002', 'Lizbeth', NULL, 'Flores', 'Pareja', NULL, NULL, 'Female', NULL, 28, NULL, NULL, NULL, 'Tandang Sora', NULL, NULL, NULL, NULL, '2023-08-11 13:44:20', '2023-08-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `heroinfo`
--

CREATE TABLE `heroinfo` (
  `HeroID` int(11) NOT NULL,
  `HeroName` varchar(25) NOT NULL,
  `Age` int(11) NOT NULL,
  `Nationality` varchar(25) NOT NULL,
  `Specialty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `heroinfo`
--

INSERT INTO `heroinfo` (`HeroID`, `HeroName`, `Age`, `Nationality`, `Specialty`) VALUES
(1, 'David', 8, 'Americal', 'Church History fanatic'),
(2, 'Shaun', 10, 'African American', 'Church Architecture fanatic'),
(3, 'Navin', 9, 'Indian', 'Technology fanatic'),
(4, 'Tomas', 7, 'Filipino', 'Visual Arts Fanatic, Design by heart'),
(5, 'Gina', 9, 'Australian', 'Sports, Unity Games fanatic'),
(6, 'Kachiko', 6, 'Japanese', 'News and Current events, Church News fanatic'),
(7, 'Chanel', 4, 'American', 'Asking questions, Inquisitive and curios mind'),
(8, 'Isabela', 11, 'Italian', 'Music fanatic');

-- --------------------------------------------------------

--
-- Table structure for table `heromaininfo`
--

CREATE TABLE `heromaininfo` (
  `ID` int(11) NOT NULL,
  `HeroID` int(11) NOT NULL,
  `HeroGender` int(11) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `QRCode` varchar(75) NOT NULL,
  `GuestID` int(11) NOT NULL,
  `HeroStatusID` int(11) NOT NULL,
  `DateCreated` varchar(25) NOT NULL,
  `DateFinished` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `heromaininfo`
--

INSERT INTO `heromaininfo` (`ID`, `HeroID`, `HeroGender`, `Image`, `QRCode`, `GuestID`, `HeroStatusID`, `DateCreated`, `DateFinished`) VALUES
(2, 1, 1, '', '00001', 11, 3, '2023/08/11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `herostatusinfo`
--

CREATE TABLE `herostatusinfo` (
  `StatusID` int(11) NOT NULL,
  `StatusName` varchar(25) NOT NULL,
  `StatusDescription` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hsnavigationlist`
--

CREATE TABLE `hsnavigationlist` (
  `ID` int(11) NOT NULL,
  `NavigationName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PageName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NavType` int(11) NOT NULL,
  `ParentID` int(11) NOT NULL,
  `Icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hsnavigationlist`
--

INSERT INTO `hsnavigationlist` (`ID`, `NavigationName`, `PageName`, `NavType`, `ParentID`, `Icon`) VALUES
(1, 'Transaction Pages', '', 0, 0, ''),
(2, 'Report Pages', '', 0, 0, ''),
(3, 'Account Pages', '', 0, 0, ''),
(4, 'Registration', 'registration', 1, 1, 'event'),
(5, 'Guests', 'guestlist', 1, 2, 'person'),
(6, 'Profile', 'profile', 1, 3, 'person'),
(7, 'Users', 'users', 1, 3, 'groups'),
(8, 'Completion', 'completion', 1, 2, 'verified_user'),
(9, 'Settings', 'settings', 1, 3, 'location_on');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Id`, `Name`, `Type`, `Cost`) VALUES
(1, 'Health Potion', 'Consumables', 50),
(2, 'Iron Sword', 'Equipment', 75),
(3, 'Skull Type', 'Misc', 25);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `username` varchar(191) NOT NULL,
  `remote_ip` varchar(45) DEFAULT NULL,
  `user_agent` varchar(191) DEFAULT NULL,
  `successful` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `username`, `remote_ip`, `user_agent`, `successful`, `created_at`, `updated_at`) VALUES
(1, 'admin', '192.168.1.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, '2023-02-04 20:24:55', NULL),
(2, 'admin', '192.168.1.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, '2023-02-05 01:54:09', NULL),
(3, 'admin', '192.168.1.7', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, '2023-02-05 04:12:06', NULL),
(4, 'admin', '172.18.124.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, '2023-02-05 17:55:48', NULL),
(5, 'admin', '172.18.124.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, '2023-02-06 20:35:43', NULL),
(6, 'admin', '172.18.124.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, '2023-02-06 21:04:46', NULL),
(7, 'admin', '172.18.124.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, '2023-02-07 17:04:55', NULL),
(8, 'admin', '172.18.124.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, '2023-02-08 19:34:42', NULL),
(9, 'admin', '172.18.124.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, '2023-02-08 19:38:28', NULL),
(10, 'admin', '172.18.124.93', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, '2023-02-09 19:36:25', NULL),
(11, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, '2023-02-10 03:52:31', NULL),
(12, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, '2023-02-10 07:56:00', NULL),
(13, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, '2023-02-10 08:03:55', NULL),
(14, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 Edg/109.0.1518.78', 1, '2023-02-10 08:09:24', NULL),
(15, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, '2023-02-13 02:39:23', NULL),
(16, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 1, '2023-02-14 06:26:43', NULL),
(17, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, '2023-02-28 00:33:14', NULL),
(18, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, '2023-02-28 07:04:08', NULL),
(19, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, '2023-03-01 04:50:20', NULL),
(20, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, '2023-03-03 02:05:49', NULL),
(21, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, '2023-03-05 00:37:56', NULL),
(22, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, '2023-03-05 00:50:53', NULL),
(23, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, '2023-03-07 07:45:19', NULL),
(24, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, '2023-03-07 07:58:16', NULL),
(25, 'admin', '172.18.121.144', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 1, '2023-03-08 00:14:31', NULL),
(26, 'admin', '10.173.192.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, '2023-03-16 00:57:15', NULL),
(27, 'admin', '10.173.192.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, '2023-03-22 19:14:54', NULL),
(28, 'admin', '10.173.192.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, '2023-03-22 19:15:13', NULL),
(29, 'admin', '10.173.192.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, '2023-03-26 01:17:58', NULL),
(30, 'admin', '10.173.192.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, '2023-03-26 02:39:48', NULL),
(31, 'admin', '10.173.192.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, '2023-03-29 23:39:00', NULL),
(32, 'admin', '10.173.192.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, '2023-03-31 22:58:28', NULL),
(33, 'admin', '10.173.192.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, '2023-04-01 02:21:48', NULL),
(34, 'admin', '10.173.192.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, '2023-04-05 22:57:43', NULL),
(35, 'admin', '10.173.192.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, '2023-04-06 02:30:00', NULL),
(36, 'admin', '10.173.192.107', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 1, '2023-04-06 02:42:31', NULL),
(37, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 1, '2023-04-21 23:56:30', NULL),
(38, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 1, '2023-04-22 00:09:12', NULL),
(39, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 1, '2023-04-25 21:12:38', NULL),
(40, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 1, '2023-04-26 01:36:55', NULL),
(41, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 1, '2023-05-03 21:51:55', NULL),
(42, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 1, '2023-05-04 17:15:37', NULL),
(43, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 1, '2023-05-08 01:43:30', NULL),
(44, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 1, '2023-05-08 01:51:26', NULL),
(45, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 1, '2023-05-10 20:16:51', NULL),
(46, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 1, '2023-05-10 20:29:18', NULL),
(47, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 1, '2023-05-10 20:33:23', NULL),
(48, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 1, '2023-05-20 22:06:12', NULL),
(49, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 1, '2023-05-24 10:48:35', NULL),
(50, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 1, '2023-05-24 10:53:05', NULL),
(51, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 1, '2023-05-24 11:09:18', NULL),
(52, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 1, '2023-05-24 11:17:01', NULL),
(53, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 1, '2023-05-24 11:49:50', NULL),
(54, 'fmpareja', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 1, '2023-06-21 20:44:33', NULL),
(55, 'fmpareja', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 1, '2023-06-22 18:49:15', NULL),
(56, 'fmpareja', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 1, '2023-06-27 20:27:33', NULL),
(57, 'fmpareja', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 1, '2023-06-28 22:06:52', NULL),
(58, 'fmpareja', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 1, '2023-07-02 21:26:53', NULL),
(59, 'fmpareja', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 1, '2023-07-05 20:01:56', NULL),
(60, 'fmpareja', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 1, '2023-07-08 21:59:24', NULL),
(61, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1, '2023-08-10 23:25:04', NULL),
(62, 'admin', '192.168.56.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 1, '2023-08-10 23:43:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', '{\"superuser\":\"0\",\"admin\":\"1\",\"import\":\"0\",\"reports.view\":\"0\",\"assets.view\":\"0\",\"assets.create\":\"0\",\"assets.edit\":\"0\",\"assets.delete\":\"0\",\"assets.checkin\":\"0\",\"assets.checkout\":\"0\",\"assets.audit\":\"0\",\"assets.view.requestable\":\"0\",\"accessories.view\":\"1\",\"accessories.create\":\"1\",\"accessories.edit\":\"1\",\"accessories.delete\":\"1\",\"accessories.checkout\":\"1\",\"accessories.checkin\":\"1\",\"consumables.view\":\"1\",\"consumables.create\":\"1\",\"consumables.edit\":\"1\",\"consumables.delete\":\"1\",\"consumables.checkout\":\"1\",\"licenses.view\":\"1\",\"licenses.create\":\"1\",\"licenses.edit\":\"1\",\"licenses.delete\":\"1\",\"licenses.checkout\":\"1\",\"licenses.keys\":\"1\",\"licenses.files\":\"1\",\"components.view\":\"1\",\"components.create\":\"1\",\"components.edit\":\"1\",\"components.delete\":\"1\",\"components.checkout\":\"1\",\"components.checkin\":\"1\",\"kits.view\":\"1\",\"kits.create\":\"1\",\"kits.edit\":\"1\",\"kits.delete\":\"1\",\"users.view\":\"1\",\"users.create\":\"1\",\"users.edit\":\"1\",\"users.delete\":\"1\",\"models.view\":\"1\",\"models.create\":\"1\",\"models.edit\":\"1\",\"models.delete\":\"1\",\"categories.view\":\"1\",\"categories.create\":\"1\",\"categories.edit\":\"1\",\"categories.delete\":\"1\",\"departments.view\":\"1\",\"departments.create\":\"1\",\"departments.edit\":\"1\",\"departments.delete\":\"1\",\"statuslabels.view\":\"1\",\"statuslabels.create\":\"1\",\"statuslabels.edit\":\"1\",\"statuslabels.delete\":\"1\",\"customfields.view\":\"1\",\"customfields.create\":\"1\",\"customfields.edit\":\"1\",\"customfields.delete\":\"1\",\"suppliers.view\":\"1\",\"suppliers.create\":\"1\",\"suppliers.edit\":\"1\",\"suppliers.delete\":\"1\",\"manufacturers.view\":\"1\",\"manufacturers.create\":\"1\",\"manufacturers.edit\":\"1\",\"manufacturers.delete\":\"1\",\"depreciations.view\":\"1\",\"depreciations.create\":\"1\",\"depreciations.edit\":\"1\",\"depreciations.delete\":\"1\",\"locations.view\":\"1\",\"locations.create\":\"1\",\"locations.edit\":\"1\",\"locations.delete\":\"1\",\"companies.view\":\"1\",\"companies.create\":\"1\",\"companies.edit\":\"1\",\"companies.delete\":\"1\",\"self.two_factor\":\"1\",\"self.api\":\"1\",\"self.edit_location\":\"1\",\"self.checkout_assets\":\"1\"}', '2023-02-22 16:00:00', '2023-02-22 16:00:00'),
(2, 'USER', NULL, '2023-02-22 16:00:00', '2023-02-22 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `printheroimage`
--

CREATE TABLE `printheroimage` (
  `QRCode` varchar(75) NOT NULL,
  `UserFullname` varchar(100) NOT NULL,
  `ImageName` varchar(100) NOT NULL,
  `Image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `printheroimage`
--

INSERT INTO `printheroimage` (`QRCode`, `UserFullname`, `ImageName`, `Image`) VALUES
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', ''),
('ABC123', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `roominfo`
--

CREATE TABLE `roominfo` (
  `RoomID` int(11) NOT NULL,
  `RoomName` varchar(50) NOT NULL,
  `RoomDescription` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roominfo`
--

INSERT INTO `roominfo` (`RoomID`, `RoomName`, `RoomDescription`) VALUES
(1, 'Room 1', 'Room 1'),
(2, 'Room 2', 'Room 2'),
(3, 'Room 3', 'Room 3'),
(4, 'Room 4', 'Room 4'),
(5, 'Room 5', 'Room 5'),
(6, 'Room 6', 'Room 6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `groupid` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `OnlineStatus` int(11) NOT NULL,
  `DateCreated` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `avatar`, `username`, `email`, `password`, `fullname`, `Department`, `Section`, `Designation`, `groupid`, `StatusID`, `OnlineStatus`, `DateCreated`) VALUES
(1, 'imgDash.jpg', 'admin', 'hsregistration@sample.com', 'e10adc3949ba59abbe56e057f20f883e', 'ADMINISTRATOR', 'PMD', 'Information Technology', 'Programmer', 1, 1, 1, '2023-03-08'),
(3, 'imgDash.jpg', 'fmpareja', 'felixpareja.pmdit07@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Felix Pareja', 'PMD', 'IT', 'Programmer', 2, 1, 0, '2023-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(1, 2),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_navlist`
--

CREATE TABLE `user_navlist` (
  `ID` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `NavID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_navlist`
--

INSERT INTO `user_navlist` (`ID`, `groupid`, `NavID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(11, 5, 5),
(10, 5, 2),
(15, 1, 8),
(16, 1, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_ip_info`
--
ALTER TABLE `area_ip_info`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `area_name_info`
--
ALTER TABLE `area_name_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `armordetails`
--
ALTER TABLE `armordetails`
  ADD PRIMARY KEY (`ArmorID`);

--
-- Indexes for table `armorinfo`
--
ALTER TABLE `armorinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `guestinfo`
--
ALTER TABLE `guestinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `heroinfo`
--
ALTER TABLE `heroinfo`
  ADD PRIMARY KEY (`HeroID`);

--
-- Indexes for table `heromaininfo`
--
ALTER TABLE `heromaininfo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `herostatusinfo`
--
ALTER TABLE `herostatusinfo`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `hsnavigationlist`
--
ALTER TABLE `hsnavigationlist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roominfo`
--
ALTER TABLE `roominfo`
  ADD PRIMARY KEY (`RoomID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- Indexes for table `user_navlist`
--
ALTER TABLE `user_navlist`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_ip_info`
--
ALTER TABLE `area_ip_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `area_name_info`
--
ALTER TABLE `area_name_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `armordetails`
--
ALTER TABLE `armordetails`
  MODIFY `ArmorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `armorinfo`
--
ALTER TABLE `armorinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `guestinfo`
--
ALTER TABLE `guestinfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `heroinfo`
--
ALTER TABLE `heroinfo`
  MODIFY `HeroID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `heromaininfo`
--
ALTER TABLE `heromaininfo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `herostatusinfo`
--
ALTER TABLE `herostatusinfo`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hsnavigationlist`
--
ALTER TABLE `hsnavigationlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roominfo`
--
ALTER TABLE `roominfo`
  MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_navlist`
--
ALTER TABLE `user_navlist`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
