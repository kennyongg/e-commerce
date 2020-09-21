-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2018 at 04:10 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hnmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`firstname`, `lastname`, `email`, `username`, `password`, `gender`, `address`) VALUES
('admin', 'admin', 'admin@hnm.com', 'admin', '$2y$10$r/iG.MxtzcMzzIdhoWYGLebJZHq6Ot/smdS49pz/mcnFmVpvFqw6y', 'M', 'Harry &amp; Mione Subang 57000 Kuala Lumpur Selangor'),
('Chun', 'Ho', 'engchunho90@gmail.com', 'baladuki', '$2y$10$P9TBFJwR.LyRlyIRLrSbi.LdZCPVBbZugDUsgFOKGzVWO1tXc4vjy', 'M', 'Dunno SS15 30000 Subang Jaya Selangor'),
('Alvin', 'Cheah', 'firemon4@hotmail.com', 'firemon4', '$2y$10$fIP.FWIAgHWkya7LW/mR2eos9sW6IDqkEMJA0Ry/SH/6hLqJSurcW', 'M', 'SMR Subang 48300 KL Selangor'),
('Hao', 'Yin', 'haoyinisgay@gmail.my', 'haoyinisgay', '$2y$10$m/pEFDNg3YJrqsd8q16dye0eZudaqDBU0GveqcKQsvpbsmrevnB/W', 'M', 'Lagoon View Subang 34566 KL Selangor'),
('Yung', 'Jien', 'yungjien1116@gmail.com', 'yungjien1116', '$2y$10$wSQy0oib5wPx/M0a6Alpq.jRSS65Yso1BSkcTtOsJa2h6W5ZsGSVO', 'M', 'SMR Subang 47500 KL Selangor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
