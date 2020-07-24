-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 23, 2020 at 04:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbconfig`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(2, 'admin@admin.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text CHARACTER SET utf8 NOT NULL,
  `ansid` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('5f07c37b63e5b', '5f07c37b6a55a'),
('5f07c37b903e4', '5f07c37ba3140'),
('5f0e70d43bd7d', '5f0e70d4470c7'),
('5f0e70d49c2a0', '5f0e70d4aa3b1'),
('5f0e74d05e2ce', '5f0e74d0645fc'),
('5f0ed692deebd', '5f0ed692e7812'),
('5f0ed6932a333', '5f0ed69348b7b'),
('5f0f3432c8829', '5f0f3432d70db'),
('5f0f37f6cc532', '5f0f37f6df65f'),
('5f0f37f717d78', '5f0f37f7202fb'),
('5f103386081b3', '5f10338619bfc'),
('5f1033864c884', '5f10338656c8c');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `eid` text CHARACTER SET utf8 NOT NULL,
  `category` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` varchar(5) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`eid`, `category`, `sahi`, `wrong`, `total`, `time`, `date`) VALUES
('5f0f379a795ae', 'vehicles', 1, 1, 2, '2', '2020-07-15 17:06:34'),
('5f1031dd9394c', 'dbms', 1, 1, 2, '2', '2020-07-16 10:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `eid` text CHARACTER SET utf8 NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('admin@admin.com', '5f05b21d202fb', 0, 0, 0, 0, '2020-07-14 17:42:18'),
('admin@admin.com', '5f05b21d202fb', 0, 0, 0, 0, '2020-07-14 17:42:18'),
('', '5f0f379a795ae', -2, 2, 0, 2, '2020-07-15 17:09:34'),
('admin@admin.com', '5f1031dd9394c', 3, 2, 3, 0, '2020-07-16 11:03:31'),
('', '5f1031dd9394c', 2, 2, 2, 0, '2020-07-18 08:32:59'),
('admin@admin.com', '5f0f379a795ae', 2, 2, 2, 0, '2020-07-23 12:29:52'),
('admin@admin.com', '5f0f379a795ae', 2, 2, 2, 0, '2020-07-23 12:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) CHARACTER SET utf8 NOT NULL,
  `option` varchar(5000) CHARACTER SET utf8 NOT NULL,
  `optionid` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('5f07c37b63e5b', 'scanner', '5f07c37b699e9'),
('5f07c37b63e5b', 'bufferreader', '5f07c37b69db9'),
('5f07c37b63e5b', 'inputstream', '5f07c37b6a18a'),
('5f07c37b63e5b', 'all', '5f07c37b6a55a'),
('5f07c37b903e4', 'no class', '5f07c37ba2d70'),
('5f07c37b903e4', 'call using class name', '5f07c37ba3140'),
('5f07c37b903e4', 'no definition', '5f07c37ba3511'),
('5f07c37b903e4', 'fixed method', '5f07c37ba38e1'),
('5f0e70d43bd7d', 'all', '5f0e70d4470c7'),
('5f0e70d43bd7d', 'b', '5f0e70d447498'),
('5f0e70d43bd7d', 'c', '5f0e70d447868'),
('5f0e70d43bd7d', 'a', '5f0e70d447c39'),
('5f0e70d49c2a0', 'printf', '5f0e70d4aa3b1'),
('5f0e70d49c2a0', 'a', '5f0e70d4aa782'),
('5f0e70d49c2a0', 'b', '5f0e70d4aab52'),
('5f0e70d49c2a0', 'c', '5f0e70d4aaf23'),
('5f0e74d05e2ce', 'egg', '5f0e74d063a8b'),
('5f0e74d05e2ce', 'fan', '5f0e74d063e5b'),
('5f0e74d05e2ce', 'gun', '5f0e74d06422c'),
('5f0e74d05e2ce', 'hen', '5f0e74d0645fc'),
('5f0ed692deebd', '4', '5f0ed692e7be2'),
('5f0ed692deebd', '21', '5f0ed692e7812'),
('5f0ed692deebd', '5', '5f0ed692e7fb3'),
('5f0ed692deebd', '6', '5f0ed692e8383'),
('5f0ed6932a333', '7', '5f0ed69348f4c'),
('5f0ed6932a333', 'vsp', '5f0ed69348b7b'),
('5f0ed6932a333', '8', '5f0ed6934931c'),
('5f0ed6932a333', '9', '5f0ed693496ed'),
('5f0f3432c8829', 'h1', '5f0f3432d74ab'),
('5f0f3432c8829', 'honda', '5f0f3432d70db'),
('5f0f3432c8829', 'h2', '5f0f3432d787c'),
('5f0f3432c8829', 'h3', '5f0f3432d7c4d'),
('5f0f37f6cc532', 'm1', '5f0f37f6dfa2f'),
('5f0f37f6cc532', 'mahindra', '5f0f37f6df65f'),
('5f0f37f6cc532', 'm2', '5f0f37f6dfe00'),
('5f0f37f6cc532', 'm3', '5f0f37f6e01d0'),
('5f0f37f717d78', 'v1', '5f0f37f7206cc'),
('5f0f37f717d78', 'vespa', '5f0f37f7202fb'),
('5f0f37f717d78', 'v2', '5f0f37f720a9d'),
('5f0f37f717d78', 'v3', '5f0f37f720e6d'),
('5f103386081b3', 'data1', '5f10338619fcd'),
('5f103386081b3', 'database management', '5f10338619bfc'),
('5f103386081b3', 'data2', '5f1033861a39d'),
('5f103386081b3', 'data3', '5f1033861a76e'),
('5f1033864c884', 'create', '5f1033865705d'),
('5f1033864c884', 'cis', '5f10338656c8c'),
('5f1033864c884', 'insert', '5f1033865742d'),
('5f1033864c884', 'select', '5f103386577fe');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text CHARACTER SET utf8 NOT NULL,
  `qid` text CHARACTER SET utf8 NOT NULL,
  `qns` text CHARACTER SET utf8 NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('5f0f379a795ae', '5f0f37f6cc532', 'lorry', 4, 1),
('5f0f379a795ae', '5f0f37f717d78', 'scooty', 4, 2),
('5f1031dd9394c', '5f103386081b3', 'Dbms fullform', 4, 1),
('5f1031dd9394c', '5f1033864c884', 'dbms commands', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('', 2, '2020-07-18 08:32:59'),
('admin@admin.com', 2, '2020-07-23 12:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password2` varchar(50) NOT NULL,
  `mobilenumber` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `password2`, `mobilenumber`, `email`) VALUES
('teja', '12345', '12345', '+919705100850', 'teja@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
