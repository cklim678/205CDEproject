-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2019 at 11:29 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_ID` varchar(14) NOT NULL,
  `A_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_ID`, `A_password`) VALUES
('1', '8cb2237d0679ca88db6464eac60da96345513964');

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `CIC` varchar(14) NOT NULL,
  `CName` varchar(50) NOT NULL,
  `CPhone` int(20) NOT NULL,
  `CDescription` text NOT NULL,
  `CAddress` varchar(150) NOT NULL,
  `CPhoto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE `election` (
  `EID` int(8) NOT NULL,
  `Topic` varchar(200) NOT NULL,
  `E_EndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `election_voters`
--

CREATE TABLE `election_voters` (
  `EID` int(8) NOT NULL,
  `CIC` varchar(14) NOT NULL,
  `CVotes` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `VIC` varchar(14) NOT NULL,
  `VName` varchar(50) NOT NULL,
  `VPhone` int(20) NOT NULL,
  `VAddress` varchar(150) NOT NULL,
  `VPhoto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voter_election`
--

CREATE TABLE `voter_election` (
  `VIC` varchar(14) NOT NULL,
  `EID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`CIC`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
  ADD PRIMARY KEY (`EID`);

--
-- Indexes for table `election_voters`
--
ALTER TABLE `election_voters`
  ADD PRIMARY KEY (`EID`,`CIC`),
  ADD KEY `CIC` (`CIC`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`VIC`);

--
-- Indexes for table `voter_election`
--
ALTER TABLE `voter_election`
  ADD PRIMARY KEY (`VIC`,`EID`),
  ADD KEY `EID` (`EID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
  MODIFY `EID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `election_voters`
--
ALTER TABLE `election_voters`
  MODIFY `EID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `election_voters`
--
ALTER TABLE `election_voters`
  ADD CONSTRAINT `election_voters_ibfk_2` FOREIGN KEY (`CIC`) REFERENCES `candidate` (`CIC`),
  ADD CONSTRAINT `election_voters_ibfk_3` FOREIGN KEY (`EID`) REFERENCES `election` (`EID`);

--
-- Constraints for table `voter_election`
--
ALTER TABLE `voter_election`
  ADD CONSTRAINT `voter_election_ibfk_1` FOREIGN KEY (`VIC`) REFERENCES `voter` (`VIC`),
  ADD CONSTRAINT `voter_election_ibfk_2` FOREIGN KEY (`EID`) REFERENCES `election` (`EID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
