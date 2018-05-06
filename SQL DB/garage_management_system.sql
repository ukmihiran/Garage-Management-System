-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2017 at 06:17 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `garage_management_system`
--
CREATE DATABASE IF NOT EXISTS `garage_management_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `garage_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `slot_start` time NOT NULL,
  `slot_end` time NOT NULL,
  `cid` int(11) NOT NULL,
  `plateNo` varchar(30) NOT NULL,
  `eid` int(11) NOT NULL,
  `APPID` varchar(30) NOT NULL,
  PRIMARY KEY (`aid`,`APPID`),
  KEY `plateNo` (`plateNo`),
  KEY `cid` (`cid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`aid`, `time`, `date`, `slot_start`, `slot_end`, `cid`, `plateNo`, `eid`, `APPID`) VALUES
(1, '09:00:00', '2017-07-12', '09:00:00', '10:00:00', 1, 'HH4502', 4, 'A001'),
(2, '09:48:00', '2017-07-27', '11:00:00', '12:00:00', 2, 'LL5896', 4, 'A002'),
(3, '09:00:00', '2017-08-22', '13:00:00', '14:00:00', 3, 'AB2545', 5, 'A003'),
(4, '12:48:00', '2017-08-24', '10:00:00', '11:00:00', 4, 'XZ4796', 6, 'A004'),
(5, '12:50:00', '2017-08-25', '09:00:00', '10:00:00', 5, 'QR7863', 6, 'A005'),
(6, '11:50:00', '2017-08-26', '09:00:00', '10:00:00', 6, 'QWE123', 7, 'A006'),
(7, '10:24:00', '2017-09-01', '13:00:00', '14:00:00', 7, 'SS4545', 8, 'A007'),
(8, '13:24:00', '2017-09-01', '14:00:00', '15:00:00', 1, 'HH4502', 10, 'A008'),
(9, '10:24:00', '2017-09-05', '14:00:00', '15:00:00', 8, 'AQ9878', 4, 'A009'),
(10, '10:25:00', '2017-09-25', '10:00:00', '11:00:00', 10, 'ER7896', 5, 'A0010');

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE IF NOT EXISTS `attendence` (
  `attId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `eid` int(11) NOT NULL,
  `AID` varchar(30) NOT NULL,
  PRIMARY KEY (`attId`,`AID`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`attId`, `date`, `status`, `eid`, `AID`) VALUES
(1, '2017-09-25', 'present', 3, 'AT001'),
(2, '2017-09-25', 'absent', 4, 'AT002'),
(3, '2017-09-25', 'present', 5, 'AT003'),
(4, '2017-09-25', 'present', 6, 'AT004'),
(5, '2017-09-25', 'present', 7, 'AT005'),
(6, '2017-09-25', 'absent', 8, 'AT006'),
(7, '2017-09-25', 'present', 9, 'AT007'),
(8, '2017-09-25', 'absent', 10, 'AT008');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `plateNo` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `moblie` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `CUSID` varchar(30) NOT NULL,
  PRIMARY KEY (`cid`,`plateNo`,`CUSID`),
  KEY `plateNo` (`plateNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `plateNo`, `address`, `name`, `moblie`, `email`, `password`, `CUSID`) VALUES
(1, 'HH4502', '15/5 Kandy', 'Kamal', '0778956412', 'kamal@gmail.com', '7f58341b9dceb1f1edca80dae10b92bc', 'C001'),
(2, 'LL5896', '15 Colombo', 'Amal', '0718947451', 'amal@gmail.com', 'd62d41cf17704ddd6cb22c9688130f73', 'C002'),
(3, 'AB2545', '98 Malabe', 'Wimal', '0769874125', 'wimal@yahoo.com', '9b654326a8831da2dad819812d68d0d1', 'C003'),
(4, 'XZ4796', '17 katugasthota, kandy', 'Saman', '0759874326', 'saman@gmail.com', 'ce5d68981471ae0ee9dcf1e6b654ae98', 'C004'),
(5, 'QR7863', '23 Kandy', 'Nimal', '071547832', 'nimal@gmail.com', '8e238955d8926765a95329a6635bcd42', 'C005'),
(6, 'QWE123', '18/7 Penideniya', 'Suresh', '0778957845', 'suresh@gmail.com', '3e6a0966890c85a8ca932302ad6a2405', 'C006'),
(7, 'SS4545', '87/9A Peradeniya', 'Hashan', '077-9897456', 'hashan@gmail.com', 'fafa95f803fe32076bb46b9f0f1cd408', 'C007'),
(8, 'AQ9878', '7/9 Katugasthota', 'Ashoka', '0709874562', 'ashoka@yahoo.com', '4b722ff5e55312625f8dda2200ccfe5f', 'C008'),
(9, 'AQ6845', '10/9D Katugasthota', 'Nuwan', '0705674562', 'nuwan@yahoo.com', '30e02acd16df6c6eb5e3a3d19f34a636', 'C009'),
(10, 'ER7896', '8A Pallekele', 'Pradeep', '94779313101', 'pradeep@gmail.com', '657047263c96362700718f6768437139', 'C0010'),
(19, 'TY1234', '154AB Kandy', 'Nelson', '0718945612', 'nelson@yahoo.com', '40d6eaac15c132a4bdbebd6cbc1ef2d3', 'C0019');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `NIC` varchar(10) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `DOB` date NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'Mechanic',
  `OThours` double NOT NULL,
  `address` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(30) NOT NULL,
  `EMPID` varchar(30) NOT NULL,
  PRIMARY KEY (`eid`,`EMPID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `NIC`, `mobile`, `DOB`, `type`, `OThours`, `address`, `username`, `password`, `name`, `EMPID`) VALUES
(1, '891236547V', '0752489652', '1989-02-04', 'Manager', 0, 'abc', 'manager', '0795151defba7a4b5dfa89170de46277', 'Vasantha', 'E001'),
(2, '859678451V', '9477337393', '1985-03-06', 'Supervisor', 0, '15 Peradeniya', 'supervisor', '1425d5d3160aa6bd140605cc75e63ce0', 'kumal', 'E002'),
(3, '901234567V', '0716987451', '1990-05-08', 'Security', 9, '147 Katugasthota', 'security', '83af648e6d9712795f2cb32ad6c77592', 'Perera', 'E003'),
(4, '847854652V', '94773373937', '1984-02-04', 'Mechanic', 0, '169 Penedeniya', 'kalum', '8cba8fdf86c572ed30afe07f74a0e6e8', 'kalum', 'E004'),
(5, '887415498V', '94779313101', '1988-02-01', 'Mechanic', 7, '124 Kandy', 'himal', 'eb34f78aff557f3cb0291b0a921fbf27', 'himal', 'E005'),
(6, '877452369V', '0778956471', '1987-05-06', 'Mechanic', 10, '178D Kandy', 'perera', '668b79d7862bc1e13acbc7e19b900869', 'Perera', 'E006'),
(7, '901236457V', '0778423659', '1990-05-01', 'Mechanic', 10, '178D Mulgampola', 'roshan', '4534344e975e9af0132fcad81a550b27', 'Roshan', 'E007'),
(8, '791254789V', '0714569871', '1979-02-04', 'Mechanic', 5, '132A Kundasale', 'janith', '2c553de2ba4cdb62051fa8ad2cd3fdea', 'Janith', 'E008'),
(9, '789654123V', '0712546874', '1978-03-02', 'Mechanic', 2, '78 Kandy', 'sirimal', 'c57803b9cb27c1db807712b06639765b', 'Sirimal', 'E009'),
(10, '921456987V', '0729621458', '1992-02-08', 'Mechanic', 5, '6/7 Peradeniya', 'dinesh', '72ea9b10ad081b41a57c4982649ee7fd', 'Dinesh', 'E0010'),
(11, '123456789v', '0779314103', '1996-05-03', 'Mechanic', 0, '15AH kandy', 'kushan', '648b5f330536312054dae4089c966dc8', 'kushan', 'E0011');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `jobId` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(300) NOT NULL,
  `timeEstimated` int(11) NOT NULL,
  `totalTimeSpent` double NOT NULL DEFAULT '0',
  `status` varchar(300) NOT NULL DEFAULT 'in progress',
  `aid` varchar(30) NOT NULL,
  `eid` varchar(30) NOT NULL,
  `vehicle_model` varchar(30) NOT NULL,
  `vehicle_type` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `pay` varchar(30) NOT NULL DEFAULT 'undone',
  `plateNo` varchar(30) NOT NULL,
  `JID` varchar(30) NOT NULL,
  PRIMARY KEY (`jobId`,`JID`),
  KEY `eid` (`eid`),
  KEY `aid` (`aid`),
  KEY `plateNo` (`plateNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobId`, `description`, `timeEstimated`, `totalTimeSpent`, `status`, `aid`, `eid`, `vehicle_model`, `vehicle_type`, `date`, `pay`, `plateNo`, `JID`) VALUES
(1, 'Break pads worn', 3, 3, 'completed', 'A001', 'E004', 'Toyota', 'Car', '2017-07-12', 'done', 'HH4502', 'J001'),
(2, 'Stucked Clutch', 5, 5, 'completed', 'A002', 'E004', 'Toyota', 'Car', '2017-07-27', 'done', 'LL5896', 'J002'),
(3, 'Gearbox change', 2, 2, 'completed', 'A003', 'E005', 'Toyota', 'Car', '2017-08-22', 'done', 'AB2545', 'J003'),
(4, 'Engine tuneup', 2, 2, 'completed', 'A004', 'E006', 'Toyota', 'Car', '2017-08-24', 'done', 'XZ4796', 'J004'),
(5, 'Gearbox change', 2, 2, 'completed', 'A005', 'E006', 'Toyota', 'Car', '2017-08-25', 'done', 'QR7863', 'J005'),
(6, 'Engine tuneup', 3, 3, 'completed', 'A006', 'E007', 'Toyota', 'Car', '2017-08-26', 'done', 'QWE123', 'J006'),
(7, 'Clutch replace', 3, 3, 'completed', 'A007', 'E008', 'Toyota', 'Car', '2017-09-01', 'done', 'SS4545', 'J007'),
(8, 'Break replace', 4, 3, 'completed', 'A008', 'E0010', 'Toyota', 'Car', '2017-09-01', 'done', 'HH4502', 'J008'),
(9, 'Clutch replace', 3, 3, 'completed', 'A009', 'E004', 'Toyota', 'Car', '2017-09-05', 'undone', 'AQ9878', 'J009'),
(10, 'Break replace', 4, 4, 'completed', 'A0010', 'E005', 'Toyota', 'Car', '2017-09-25', 'undone', 'ER7896', 'J0010');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE IF NOT EXISTS `leave` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(300) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'in progress',
  `eid` int(11) NOT NULL,
  `LEAVEID` varchar(30) NOT NULL,
  PRIMARY KEY (`lid`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`lid`, `description`, `sdate`, `edate`, `status`, `eid`, `LEAVEID`) VALUES
(1, 'Therapy', '2017-01-02', '2017-01-02', 'approved', 1, 'LE001'),
(2, 'Operation', '2017-02-08', '2017-08-15', 'approved', 2, 'LE002'),
(3, 'Operation', '2017-05-03', '2017-05-04', 'approved', 3, 'LE003'),
(4, 'Wedding', '2017-06-02', '2017-06-03', 'declined', 4, 'LE004'),
(5, 'Wedding\r\n\r\n', '2017-06-09', '2017-06-12', 'approved', 5, 'LE005'),
(6, 'Wedding\r\n', '2017-06-10', '2017-06-12', 'declined', 6, 'LE006'),
(7, 'Alms giving', '2017-06-11', '2017-06-13', 'approved', 7, 'LE006'),
(8, 'Alms giving', '2017-06-11', '2017-06-14', 'approved', 8, 'LE007'),
(9, 'Operation', '2017-06-14', '2017-06-25', 'approved', 3, 'LE009'),
(10, 'Alms giving', '2017-09-29', '2017-09-30', 'in progress', 4, 'LE0010'),
(11, 'afasfafas', '2017-11-23', '2017-12-01', 'in progress', 1, 'LE0011');

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_points`
--

CREATE TABLE IF NOT EXISTS `loyalty_points` (
  `loyaltyId` int(11) NOT NULL AUTO_INCREMENT,
  `totalPoints` int(11) DEFAULT NULL,
  `cid` int(11) NOT NULL,
  `LID` varchar(30) NOT NULL,
  PRIMARY KEY (`loyaltyId`,`LID`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `loyalty_points`
--

INSERT INTO `loyalty_points` (`loyaltyId`, `totalPoints`, `cid`, `LID`) VALUES
(1, 112, 1, 'L001'),
(2, 0, 2, 'L002'),
(3, 10, 3, 'L003'),
(4, 50, 4, 'L004'),
(5, 5, 5, 'L005'),
(6, 0, 6, 'L006'),
(7, 10, 7, 'L007'),
(8, 93, 8, 'L008'),
(9, 6, 9, 'L009'),
(10, 34, 10, 'L0010'),
(19, 0, 19, 'L0019');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `subtotal` double NOT NULL,
  `discount` double NOT NULL,
  `total` double NOT NULL,
  `cid` int(11) NOT NULL,
  `plateNo` varchar(30) NOT NULL,
  `security` varchar(30) NOT NULL DEFAULT 'unclear',
  `time` time NOT NULL,
  `PID` varchar(30) NOT NULL,
  PRIMARY KEY (`payId`,`PID`),
  KEY `cid` (`cid`),
  KEY `plateNo` (`plateNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payId`, `date`, `subtotal`, `discount`, `total`, `cid`, `plateNo`, `security`, `time`, `PID`) VALUES
(1, '2017-07-02', 4000, 0, 4000, 10, 'ER7896', 'clear', '10:03:17', 'P001'),
(3, '2017-07-28', 29600, 0, 29600, 2, 'LL5896', 'clear', '10:00:00', 'P003'),
(4, '2017-08-23', 12000, 100, 11900, 3, 'AB2545', 'clear', '09:00:00', 'P004'),
(5, '2017-08-25', 1200, 0, 1200, 4, 'XZ4796', 'clear', '09:48:00', 'P005'),
(6, '2017-08-25', 4500, 0, 4500, 5, 'QR7863', 'clear', '10:00:00', 'P006'),
(7, '2017-08-27', 30000, 5000, 25000, 6, 'QWE123', 'clear', '11:00:00', 'P007'),
(8, '2017-09-03', 1000, 0, 1000, 7, 'SS4545', 'unclear', '11:00:00', 'P008');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `salId` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `bonus` float NOT NULL,
  `eid` varchar(30) NOT NULL,
  `ETF` float NOT NULL,
  `EPF` float NOT NULL,
  `OT` float NOT NULL,
  `SALARYID` varchar(30) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`salId`,`SALARYID`),
  KEY `eid` (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salId`, `amount`, `bonus`, `eid`, `ETF`, `EPF`, `OT`, `SALARYID`, `date`) VALUES
(1, 30000, 4000, 'E004', 5000, 2000, 2, 'SA001', '2017-09-25'),
(2, 20000, 5000, 'E005', 10000, 2000, 3, 'SA002', '2017-09-25'),
(3, 10000, 1000, 'E006', 10000, 2000, 3, 'SA003', '2017-09-25'),
(4, 30000, 2000, 'E007', 10000, 2000, 1, 'SA004', '2017-09-25'),
(5, 30000, 2000, 'E008', 10000, 2000, 1, 'SA005', '2017-09-25'),
(6, 20000, 2000, 'E009', 1000, 20, 1, 'SA006', '2017-09-25'),
(7, 45000, 2000, 'E0010', 10000, 2000, 0, 'SA007', '2017-09-25'),
(8, 15000, 2000, 'E002', 10000, 2000, 0, 'SA008', '2017-09-25'),
(9, 25000, 2000, 'E003', 10000, 2000, 5, 'SA009', '2017-09-25'),
(10, 10000, 1000, 'E001', 50, 49.75, 2, 'SA0010', '2017-11-20'),
(14, 35000, 0, 'E002', 175, 174.125, 4, 'SA0014', '2017-11-20'),
(16, 10000, 0, 'E003', 50, 49.75, 0, 'SA0016', '2017-11-20'),
(19, 65000, 2000, 'E005', 325, 323.375, 2, 'SA0019', '2017-11-20'),
(20, 30000, 0, 'E005', 150, 149.25, 0, 'SA0020', '2017-11-22'),
(21, 35000, 0, 'E006', 175, 174.125, 0, 'SA0021', '2017-11-22'),
(22, 40000, 0, 'E007', 200, 199, 2, 'SA0022', '2017-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `qty` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `supplierName` varchar(30) NOT NULL,
  `supplierEmail` varchar(60) NOT NULL,
  `part_mileage` int(11) NOT NULL,
  `price` float NOT NULL,
  `stockid` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`,`stockid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`sid`, `qty`, `name`, `model`, `type`, `supplierName`, `supplierEmail`, `part_mileage`, `price`, `stockid`) VALUES
(1, 21, 'break pads', 'M001', 'power', 'Mel', 'mal@gmail.com', 20000, 3500, 'S001'),
(2, 24, 'clutch plate', 'M002', 'power', 'Buwaneka', 'buwaneka.s@sliit.lk', 8000, 2000, 'S002'),
(3, 38, 'pedals', 'M003', 'power', 'Dilan', 'dilan@gmail.com', 35000, 1500, 'S003'),
(4, 5, 'clutch pins', 'M004', 'bat', 'Kanchi', 'kanchidiline@gmail.com', 25000, 600, 'S004'),
(5, 40, 'clutch bush', 'M005', 'snoopy', 'chathura', 'chathura123@gmail.com', 50000, 300, 'S005'),
(6, 8, 'sockets', 'M006', 'kd', 'givantha', 'givatha345@gmail.com', 10000, 1000, 'S006'),
(7, 30, 'rings', 'M007', 'dk', 'udesh', 'udesh345@gmail.com', 60000, 3500, 'S007'),
(8, 6, 'cups', 'M008', 'great', 'chamika', 'chamika@gmail.com', 35000, 40000, 'S008'),
(9, 45, 'caborator', 'M009', 'ews', 'vishwani', 'vishwani@ymail.com', 100000, 250, 'S009'),
(10, 56, 'oil can', 'M0010', 'oil', 'prabashi', 'prabashi@gmail.com', 34000, 500, 'S0010'),
(11, 4, 'A/C', 'Cooler', 'A/C', 'Dilan', 'dilanmel74@gmail.com', 20000, 15000, 'S0011'),
(13, 50, 'Crank Shaft', 'Crank', 'Nissan', 'Binura', 'binura@gmail.com', 20000, 154000, 'S0013');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_status`
--

CREATE TABLE IF NOT EXISTS `vehicle_status` (
  `statusId` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `terminal` varchar(5) NOT NULL,
  `decription` varchar(300) NOT NULL,
  `cid` int(11) NOT NULL,
  `plateNo` varchar(30) NOT NULL,
  `sid` int(11) NOT NULL,
  `vehicle_mileage` int(11) NOT NULL,
  `addedTime` time NOT NULL,
  `qty` int(11) NOT NULL,
  `timeToComplete` int(11) NOT NULL,
  `VID` varchar(30) NOT NULL,
  PRIMARY KEY (`statusId`,`VID`),
  KEY `sid` (`sid`),
  KEY `plateNo` (`plateNo`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `vehicle_status`
--

INSERT INTO `vehicle_status` (`statusId`, `date`, `terminal`, `decription`, `cid`, `plateNo`, `sid`, `vehicle_mileage`, `addedTime`, `qty`, `timeToComplete`, `VID`) VALUES
(1, '2017-07-12', '1', 'Break pads added', 1, 'HH4502', 1, 10000, '09:10:00', 4, 1, 'V001'),
(1, '2017-07-12', '1', 'Clutch plate added', 1, 'HH4502', 2, 10000, '09:30:00', 1, 0, 'V002'),
(3, '2017-07-12', '1', 'Pedals attached', 1, 'HH4502', 3, 10000, '09:40:00', 3, 0, 'V003'),
(4, '2017-07-12', '1', 'Clutch pins added', 1, 'HH4502', 4, 10000, '09:50:00', 1, 0, 'V004'),
(5, '2017-07-27', '2', 'Clutch pin added', 2, 'LL5896', 4, 5000, '11:15:00', 4, 1, 'V005'),
(6, '2017-07-27', '2', 'Clutch bushes added', 2, 'LL5896', 5, 5000, '11:20:00', 4, 1, 'V006'),
(7, '2017-07-27', '2', 'Sockets added', 2, 'LL5896', 6, 5000, '11:25:00', 4, 1, 'V006'),
(8, '2017-07-27', '2', 'rings added', 2, 'LL5896', 7, 5000, '11:30:00', 4, 1, 'V008'),
(9, '2017-07-27', '2', 'Cups added', 2, 'LL5896', 8, 5000, '11:45:00', 2, 1, 'V009'),
(10, '2017-09-25', '3', 'Break pads replaces', 10, 'ER7896', 1, 10000, '10:15:00', 1, 1, 'V0010'),
(14, '2017-09-26', '2', 'brake', 10, 'ER7896', 3, 1000, '01:20:50', 2, 2, 'V0014');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendence`
--
ALTER TABLE `attendence`
  ADD CONSTRAINT `att_eid` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`);

--
-- Constraints for table `loyalty_points`
--
ALTER TABLE `loyalty_points`
  ADD CONSTRAINT `loyalty_cid` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_cid` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`),
  ADD CONSTRAINT `payment_pno` FOREIGN KEY (`plateNo`) REFERENCES `customer` (`plateNo`);

--
-- Constraints for table `vehicle_status`
--
ALTER TABLE `vehicle_status`
  ADD CONSTRAINT `j_pno` FOREIGN KEY (`plateNo`) REFERENCES `customer` (`plateNo`),
  ADD CONSTRAINT `c_cid` FOREIGN KEY (`cid`) REFERENCES `customer` (`cid`),
  ADD CONSTRAINT `v_sid` FOREIGN KEY (`sid`) REFERENCES `stock` (`sid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
