-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2016 at 06:29 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hogwarts`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `Image` varchar(512) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `ID` char(5) NOT NULL,
  `CGPA` decimal(3,0) NOT NULL,
  `Grad_Year` year(4) NOT NULL,
  `Joining_Date` year(4) NOT NULL,
  `House` char(15) NOT NULL,
  `Contact_No.` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`Image`, `Name`, `ID`, `CGPA`, `Grad_Year`, `Joining_Date`, `House`, `Contact_No.`) VALUES
('hue.jpg', 'Isaba Moazzem', '24556', '3', 2008, 2002, 'Gryffindor', '0167620596'),
('houses.jpg', 'house', '3453', '4', 2008, 2002, 'Slytherin', '0167620596');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Name` varchar(15) NOT NULL,
  `Course_Code` char(5) NOT NULL,
  `WSN_Faculty` char(5) NOT NULL,
  `Grades_Students` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Name`, `Course_Code`, `WSN_Faculty`, `Grades_Students`) VALUES
('Potion', 'PT101', 'W6969', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `current _students`
--

CREATE TABLE `current _students` (
  `ID` char(5) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Gender` char(3) NOT NULL,
  `Course_Code_Taken` char(50) NOT NULL,
  `CGPA` float(3,0) NOT NULL,
  `House` char(10) NOT NULL,
  `Joining_Date` year(4) NOT NULL,
  `Contact_No,` char(11) NOT NULL,
  `Grad_Expectancy` year(4) NOT NULL,
  `Blood_Group` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current _students`
--

INSERT INTO `current _students` (`ID`, `Name`, `Gender`, `Course_Code_Taken`, `CGPA`, `House`, `Joining_Date`, `Contact_No,`, `Grad_Expectancy`, `Blood_Group`) VALUES
('69696', 'The Doctor', 'M', 'PR101', 4, 'Gryffindor', 2002, '01534682303', 2017, 'O+');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Image` varchar(512) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Wizard_Security_Number` char(5) NOT NULL,
  `Gender` char(3) NOT NULL,
  `Course_Code_Taught` char(5) NOT NULL,
  `Contact_No.` char(11) NOT NULL,
  `Qualification` char(30) NOT NULL,
  `Experience` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Image`, `Name`, `Wizard_Security_Number`, `Gender`, `Course_Code_Taught`, `Contact_No.`, `Qualification`, `Experience`) VALUES
('snape.jpg', 'Severus Snape', 'yomom', 'M', 'PO101', '0171moya', 'More qualified than you', 'More experienced than you');

-- --------------------------------------------------------

--
-- Table structure for table `headmaster`
--

CREATE TABLE `headmaster` (
  `Image` varchar(512) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Wizard_Security_Number` char(5) NOT NULL,
  `Gender` char(4) NOT NULL,
  `Contact_No.` char(11) NOT NULL,
  `Qualifications` char(50) NOT NULL,
  `Exprience` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `headmaster`
--

INSERT INTO `headmaster` (`Image`, `Name`, `Wizard_Security_Number`, `Gender`, `Contact_No.`, `Qualifications`, `Exprience`) VALUES
('dumbledore.jpg', 'Dumbledore', 'huehu', 'M', 'komuna', 'meh', 'meh');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `Contact_No.` char(11) NOT NULL,
  `Address` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`Contact_No.`, `Address`) VALUES
('jsdnls', 'ldnnflnflflsf');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Image` varchar(512) NOT NULL,
  `Wizard_Security_Number` char(5) NOT NULL,
  `Type_Of_Work` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Image`, `Wizard_Security_Number`, `Type_Of_Work`) VALUES
('image.jpg', 'lnffn', 'fucking');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`WSN_Faculty`);

--
-- Indexes for table `current _students`
--
ALTER TABLE `current _students`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Wizard_Security_Number`);

--
-- Indexes for table `headmaster`
--
ALTER TABLE `headmaster`
  ADD PRIMARY KEY (`Wizard_Security_Number`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`Contact_No.`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Wizard_Security_Number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
