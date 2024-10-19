-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 10:22 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin` int(11) NOT NULL,
  `UserAccount_id` int(11) NOT NULL,
  `registration_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `student_id` int(5) NOT NULL,
  `gender` enum('Male','Female','Other','') NOT NULL,
  `year` char(4) NOT NULL,
  `course` varchar(45) NOT NULL,
  `image` text NOT NULL,
  `status` enum('Accept','Decline','Confidential') NOT NULL,
  `registration_id` int(5) NOT NULL,
  `notif_id` bigint(20) NOT NULL,
  `scholarship_code` int(5) NOT NULL,
  `form_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_form`
--

CREATE TABLE `applicant_form` (
  `form_id` int(5) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `MiddleName` varchar(45) NOT NULL,
  `Student_id` int(5) NOT NULL,
  `Program&Year` varchar(10) NOT NULL,
  `Gender` enum('Male','Female','Other','') NOT NULL,
  `Age` int(2) NOT NULL,
  `Contact` int(11) NOT NULL,
  `Birthdate` date NOT NULL,
  `Scholarship_program` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `current_address` varchar(50) NOT NULL,
  `requirements` text NOT NULL,
  `scholarship_code` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_registration`
--

CREATE TABLE `applicant_registration` (
  `registration_id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `MiddleName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Birthdate` date NOT NULL,
  `Age` int(2) NOT NULL,
  `Contact` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(5) NOT NULL,
  `Merit` enum('Academic Scholar (Dean’s Lister)','Academic Scholar (Dean’s Lister)','','') NOT NULL,
  `Non-Merit` enum('Gazette Scholarship Program','School Band Scholarship Program','DWCC Philharmonics Scholarship Program','Entrance Scholarship Program(From other schools)','Special College Scholarship Program for The Children of DWCC Security Force','Scholarship Program for Indigenous People(Members of Cultural minority Group)','Student Assistant /Parish Stipendiary Scholarship Grant Program','Sports Scholarship Program','Scholarship for Persons with Disability','ROTC/NSTP/ CWTS Scholarship Program','Religious Education Scholarship program','Cash/ Brother/ Sister Discounts','FEC/ Employees Privilege Discount','Faculty/ Employee Development Program','Loyalty Scholarship','Cultural Scholarship Program') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `final-list`
--

CREATE TABLE `final-list` (
  `final_id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `username` varchar(45) NOT NULL,
  `scholarship_program` varchar(50) NOT NULL,
  `Status` enum('Accept','Reject','Conditional','') NOT NULL,
  `Discount` decimal(3,2) NOT NULL,
  `Shortlist_id` int(5) NOT NULL,
  `scholarship_code` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notif_id` bigint(5) NOT NULL,
  `Message` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `coordinator_id` int(11) NOT NULL,
  `twc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sc`
--

CREATE TABLE `sc` (
  `coordinator_id` int(11) NOT NULL,
  `UserAccount_id` int(11) NOT NULL,
  `form_id` int(5) NOT NULL,
  `twc_id` int(11) NOT NULL,
  `scholarship_code` int(5) NOT NULL,
  `sem_id` int(8) NOT NULL,
  `Shortlist_id` int(5) NOT NULL,
  `final_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `scholarship_program`
--

CREATE TABLE `scholarship_program` (
  `scholarship_code` int(5) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `requirements` varchar(1000) NOT NULL,
  `qualification` varchar(1000) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Due_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category_id` int(5) NOT NULL,
  `sem_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `school_department`
--

CREATE TABLE `school_department` (
  `dept_id` int(5) NOT NULL,
  `School_Dept` enum('JHS/ELEM','SHS','COLLEGE','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `sem_id` int(8) NOT NULL,
  `Year` varchar(10) NOT NULL,
  `dept_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shortlist`
--

CREATE TABLE `shortlist` (
  `Shortlist_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Contact` int(11) NOT NULL,
  `scholarship_Program` varchar(50) NOT NULL,
  `Discount` decimal(3,2) NOT NULL,
  `Status` enum('Approved','Not Approved','Conditional','') NOT NULL,
  `scholarship_code` int(5) NOT NULL,
  `student_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `twc`
--

CREATE TABLE `twc` (
  `twc_id` int(11) NOT NULL,
  `UserAccount_id` int(11) NOT NULL,
  `form_id` int(5) NOT NULL,
  `student_id` int(5) NOT NULL,
  `scholarship_code` int(5) NOT NULL,
  `shortlist_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `useraccount`
--

CREATE TABLE `useraccount` (
  `useraccount_id` int(11) NOT NULL,
  `LasName` varchar(45) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `MiddleName` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Birthdate` date NOT NULL,
  `contact` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `usertype` enum('scholarship Coordinator','Technical Working Committee','','') NOT NULL,
  `scholarship_program` enum('Academic Scholar(Dean''s Lister)','Academic Scholar(BE)','Gazette Scholarship','School Band Scholarship','DWCC Philharmonics Scholarship','Entrance Scholarship(From other School)','Special College Scholarship for the Children of DWCC Security Force','Scholarship for Indigenous People','Student Assistant/Parish Stipendiary Scholarship Grant','Sports Scholarship','Scholarship for persons with Disability','ROTC/NSTP/CWTS Scholarship','Religious Education Scholarship','Cash/Brother/Sister Discounts','FEC/Employee Development Program','Loyalty Scholarship','Cultural Scholarship') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `UserAccount_id` (`UserAccount_id`),
  ADD KEY `registration_id` (`registration_id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `registration_id` (`registration_id`),
  ADD KEY `notif_id` (`notif_id`),
  ADD KEY `scholarship_code` (`scholarship_code`),
  ADD KEY `form_id` (`form_id`);

--
-- Indexes for table `applicant_form`
--
ALTER TABLE `applicant_form`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `scholarship_code` (`scholarship_code`);

--
-- Indexes for table `applicant_registration`
--
ALTER TABLE `applicant_registration`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `final-list`
--
ALTER TABLE `final-list`
  ADD PRIMARY KEY (`final_id`),
  ADD KEY `Shortlist_id` (`Shortlist_id`),
  ADD KEY `scholarship_code` (`scholarship_code`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notif_id`),
  ADD KEY `coordinator_id` (`coordinator_id`),
  ADD KEY `twc_id` (`twc_id`);

--
-- Indexes for table `sc`
--
ALTER TABLE `sc`
  ADD PRIMARY KEY (`coordinator_id`),
  ADD KEY `UserAccount_id` (`UserAccount_id`),
  ADD KEY `form_id` (`form_id`),
  ADD KEY `scholarship_code` (`scholarship_code`),
  ADD KEY `sem_id` (`sem_id`),
  ADD KEY `twc_id` (`twc_id`),
  ADD KEY `Shortlist_id` (`Shortlist_id`),
  ADD KEY `final_id` (`final_id`);

--
-- Indexes for table `scholarship_program`
--
ALTER TABLE `scholarship_program`
  ADD PRIMARY KEY (`scholarship_code`),
  ADD KEY `sem_id` (`sem_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `school_department`
--
ALTER TABLE `school_department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`sem_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `shortlist`
--
ALTER TABLE `shortlist`
  ADD PRIMARY KEY (`Shortlist_id`),
  ADD KEY `scholarship_code` (`scholarship_code`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `twc`
--
ALTER TABLE `twc`
  ADD PRIMARY KEY (`twc_id`),
  ADD KEY `UserAccount_id` (`UserAccount_id`),
  ADD KEY `form_id` (`form_id`),
  ADD KEY `scholarship_code` (`scholarship_code`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `shortlist_id` (`shortlist_id`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`useraccount_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_form`
--
ALTER TABLE `applicant_form`
  MODIFY `form_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant_registration`
--
ALTER TABLE `applicant_registration`
  MODIFY `registration_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final-list`
--
ALTER TABLE `final-list`
  MODIFY `final_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notif_id` bigint(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholarship_program`
--
ALTER TABLE `scholarship_program`
  MODIFY `scholarship_code` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_department`
--
ALTER TABLE `school_department`
  MODIFY `dept_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `sem_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shortlist`
--
ALTER TABLE `shortlist`
  MODIFY `Shortlist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`UserAccount_id`) REFERENCES `useraccount` (`useraccount_id`),
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`registration_id`) REFERENCES `applicant_registration` (`registration_id`);

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_ibfk_1` FOREIGN KEY (`registration_id`) REFERENCES `applicant_registration` (`registration_id`),
  ADD CONSTRAINT `applicant_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `applicant_registration` (`registration_id`),
  ADD CONSTRAINT `applicant_ibfk_3` FOREIGN KEY (`notif_id`) REFERENCES `notification` (`notif_id`),
  ADD CONSTRAINT `applicant_ibfk_4` FOREIGN KEY (`scholarship_code`) REFERENCES `scholarship_program` (`scholarship_code`),
  ADD CONSTRAINT `applicant_ibfk_5` FOREIGN KEY (`form_id`) REFERENCES `applicant_form` (`form_id`);

--
-- Constraints for table `applicant_form`
--
ALTER TABLE `applicant_form`
  ADD CONSTRAINT `applicant_form_ibfk_1` FOREIGN KEY (`scholarship_code`) REFERENCES `scholarship_program` (`scholarship_code`);

--
-- Constraints for table `final-list`
--
ALTER TABLE `final-list`
  ADD CONSTRAINT `final-list_ibfk_1` FOREIGN KEY (`Shortlist_id`) REFERENCES `shortlist` (`Shortlist_id`),
  ADD CONSTRAINT `final-list_ibfk_2` FOREIGN KEY (`scholarship_code`) REFERENCES `scholarship_program` (`scholarship_code`),
  ADD CONSTRAINT `final-list_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `applicant` (`student_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`coordinator_id`) REFERENCES `sc` (`coordinator_id`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`twc_id`) REFERENCES `twc` (`twc_id`);

--
-- Constraints for table `sc`
--
ALTER TABLE `sc`
  ADD CONSTRAINT `sc_ibfk_1` FOREIGN KEY (`UserAccount_id`) REFERENCES `useraccount` (`useraccount_id`),
  ADD CONSTRAINT `sc_ibfk_2` FOREIGN KEY (`form_id`) REFERENCES `applicant_form` (`form_id`),
  ADD CONSTRAINT `sc_ibfk_3` FOREIGN KEY (`scholarship_code`) REFERENCES `scholarship_program` (`scholarship_code`),
  ADD CONSTRAINT `sc_ibfk_4` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`),
  ADD CONSTRAINT `sc_ibfk_5` FOREIGN KEY (`twc_id`) REFERENCES `twc` (`twc_id`),
  ADD CONSTRAINT `sc_ibfk_6` FOREIGN KEY (`Shortlist_id`) REFERENCES `shortlist` (`Shortlist_id`),
  ADD CONSTRAINT `sc_ibfk_7` FOREIGN KEY (`final_id`) REFERENCES `final-list` (`final_id`);

--
-- Constraints for table `scholarship_program`
--
ALTER TABLE `scholarship_program`
  ADD CONSTRAINT `scholarship_program_ibfk_1` FOREIGN KEY (`sem_id`) REFERENCES `semester` (`sem_id`),
  ADD CONSTRAINT `scholarship_program_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `school_department` (`dept_id`);

--
-- Constraints for table `shortlist`
--
ALTER TABLE `shortlist`
  ADD CONSTRAINT `shortlist_ibfk_1` FOREIGN KEY (`scholarship_code`) REFERENCES `scholarship_program` (`scholarship_code`),
  ADD CONSTRAINT `shortlist_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `applicant` (`student_id`);

--
-- Constraints for table `twc`
--
ALTER TABLE `twc`
  ADD CONSTRAINT `twc_ibfk_1` FOREIGN KEY (`UserAccount_id`) REFERENCES `useraccount` (`useraccount_id`),
  ADD CONSTRAINT `twc_ibfk_2` FOREIGN KEY (`form_id`) REFERENCES `applicant_form` (`form_id`),
  ADD CONSTRAINT `twc_ibfk_3` FOREIGN KEY (`scholarship_code`) REFERENCES `scholarship_program` (`scholarship_code`),
  ADD CONSTRAINT `twc_ibfk_4` FOREIGN KEY (`student_id`) REFERENCES `applicant` (`student_id`),
  ADD CONSTRAINT `twc_ibfk_5` FOREIGN KEY (`shortlist_id`) REFERENCES `shortlist` (`Shortlist_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
