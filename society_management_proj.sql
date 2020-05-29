-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2018 at 06:02 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `society_management_proj`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `BILL ADC`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `BILL ADC` (IN `ACTION` INT, OUT `RESULT` INT, IN `MID` INT, IN `MAMOUNT` DOUBLE)  NO SQL
IF ACTION=1 THEN
SELECT a.BILL_ID, b.MEMBER_FLAT_NO, a.BILL_DATE, a.BILL_FROM_DATE, a.BILL_TO_DATE, a.BILL_DUE_DATE, a.BILL_DUE_AMT, a.BILL_STATUS FROM society_billdisplay as a INNER JOIN society_membermaster as b on a.MEMBER_ID= b.MEMBER_ID
WHERE MONTH(BILL_DATE)=MONTH(NOW()) AND YEAR(BILL_DATE)=YEAR(NOW());

   SET RESULT=0;
ELSEIF ACTION=2 THEN
SELECT * FROM (
SELECT c.M_ID, c.M_DESC, c.M_AMOUNT, a.BILL_STATUS as M_STATUS
from society_billdisplay as a INNER JOIN society_billgenerate as b on a.BILL_ID = b.BILL_ID INNER join society_maintaiancemaster as c on b.M_ID = c.M_ID WHERE a.BILL_ID = MID 

) AS AB ORDER BY AB.M_ID;

SET RESULT=1;
ELSEIF ACTION=3 THEN 
INSERT into aud_society_billdisplay
select * from society_billdisplay WHERE BILL_ID=MID;

UPDATE society_billdisplay AS A1
INNER JOIN (
SELECT A.BILL_ID, SUM(C.M_AMOUNT) AS M_AMOUNT
from society_billdisplay as a INNER JOIN society_billgenerate as b on a.BILL_ID = b.BILL_ID INNER join society_maintaiancemaster as c on b.M_ID = c.M_ID WHERE a.BILL_ID = MID
) AS B1 ON A1.BILL_ID=B1.BILL_ID
set A1.BILL_DUE_AMT = A1.BILL_DUE_AMT - B1.M_AMOUNT + MAMOUNT, A1.BILL_STATUS = 1;
   SET RESULT=2;
END IF$$

DROP PROCEDURE IF EXISTS `GENERATEBILL`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GENERATEBILL` (OUT `resultado` INT)  BEGIN 

    if exists (SELECT 1 FROM society_billdisplay WHERE MONTH(BILL_DATE)=MONTH(NOW()) AND YEAR(BILL_DATE)=YEAR(NOW())) then
        set resultado = -1;
   
    else 
    
    INSERT INTO society_billdisplay (MEMBER_ID,BILL_DATE,BILL_FROM_DATE,BILL_TO_DATE,BILL_DUE_DATE,BILL_DUE_AMT,BILL_STATUS)
select MEMBER_ID, CONCAT(YEAR(NOW()),'-',RIGHT(CONCAT('00',MONTH(NOW())),2),'-','05'), 
CONCAT(YEAR(NOW()),'-',RIGHT(CONCAT('00',MONTH(NOW())),2),'-','01'), 
DATE_ADD(CONCAT(YEAR(NOW()),'-',RIGHT(CONCAT('00',MONTH(NOW())+1),2),'-','01'),INTERVAL -1 DAY), 
CONCAT(YEAR(NOW()),'-',RIGHT(CONCAT('00',MONTH(NOW())),2),'-','20'), 
0, 0 
FROM society_membermaster WHERE MEMBER_ID <> 1;

INSERT INTO society_billgenerate(BILL_ID,MEMBER_ID,M_ID)
SELECT BILL_ID,MEMBER_ID,M_ID
FROM society_billdisplay as a,society_maintaiancemaster as b
where MONTH(BILL_DATE)=MONTH(NOW()) AND YEAR(BILL_DATE)=YEAR(NOW());

UPDATE society_billdisplay LEFT JOIN (SELECT B.BILL_ID,IFNULL(A.BILL_DUE_AMT,0)+IFNULL(B.BILL_DUE_AMT,0) AS FINALAMT FROM 
    (
SELECT MEMBER_ID,BILL_DUE_AMT FROM society_billdisplay WHERE MONTH(BILL_DATE)=MONTH(NOW())-1 AND YEAR(BILL_DATE)=YEAR(NOW())
) AS A INNER JOIN (
SELECT BILL_ID,MEMBER_ID, BILL_DUE_AMT FROM society_billdisplay WHERE MONTH(BILL_DATE)=MONTH(NOW()) AND YEAR(BILL_DATE)=YEAR(NOW())
    ) AS B ON A.MEMBER_ID=B.MEMBER_ID) AS SD ON society_billdisplay.BILL_ID=SD.BILL_ID
   SET society_billdisplay.BILL_DUE_AMT=SD.FINALAMT 
   WHERE MONTH(society_billdisplay.BILL_DATE)=MONTH(NOW()) AND YEAR(society_billdisplay.BILL_DATE)=YEAR(NOW()) AND SD.BILL_ID IS NOT NULL;
    
    
    
        set resultado = 0;
        
    end if;
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `aud_society_billdisplay`
--

DROP TABLE IF EXISTS `aud_society_billdisplay`;
CREATE TABLE IF NOT EXISTS `aud_society_billdisplay` (
  `BILL_ID` int(11) NOT NULL,
  `MEMBER_ID` int(11) NOT NULL,
  `BILL_DATE` date DEFAULT NULL,
  `BILL_FROM_DATE` date DEFAULT NULL,
  `BILL_TO_DATE` date DEFAULT NULL,
  `BILL_DUE_DATE` date DEFAULT NULL,
  `BILL_DUE_AMT` double DEFAULT NULL,
  `BILL_STATUS` bit(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aud_society_billdisplay`
--

INSERT INTO `aud_society_billdisplay` (`BILL_ID`, `MEMBER_ID`, `BILL_DATE`, `BILL_FROM_DATE`, `BILL_TO_DATE`, `BILL_DUE_DATE`, `BILL_DUE_AMT`, `BILL_STATUS`) VALUES
(42, 4, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'0'),
(42, 4, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'0'),
(42, 4, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'0'),
(42, 4, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'0'),
(42, 4, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `image` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `society_billdisplay`
--

DROP TABLE IF EXISTS `society_billdisplay`;
CREATE TABLE IF NOT EXISTS `society_billdisplay` (
  `BILL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MEMBER_ID` int(11) NOT NULL,
  `BILL_DATE` date DEFAULT NULL,
  `BILL_FROM_DATE` date DEFAULT NULL,
  `BILL_TO_DATE` date DEFAULT NULL,
  `BILL_DUE_DATE` date DEFAULT NULL,
  `BILL_DUE_AMT` double DEFAULT NULL,
  `BILL_STATUS` bit(1) DEFAULT NULL,
  PRIMARY KEY (`BILL_ID`),
  KEY `MEMBER_ID` (`MEMBER_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `society_billdisplay`
--

INSERT INTO `society_billdisplay` (`BILL_ID`, `MEMBER_ID`, `BILL_DATE`, `BILL_FROM_DATE`, `BILL_TO_DATE`, `BILL_DUE_DATE`, `BILL_DUE_AMT`, `BILL_STATUS`) VALUES
(56, 23, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'1'),
(55, 17, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', 12000, b'1'),
(54, 16, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -7000, b'1'),
(53, 15, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'1'),
(52, 14, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'1'),
(51, 13, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'1'),
(50, 12, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'1'),
(49, 11, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -31000, b'1'),
(48, 10, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -3000, b'1'),
(47, 9, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', 2000, b'1'),
(46, 8, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', 8000, b'1'),
(45, 7, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', 4000, b'1'),
(44, 6, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', 5000, b'1'),
(43, 5, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', 7000, b'1'),
(42, 4, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'0'),
(41, 3, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'0'),
(40, 2, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'0'),
(61, 35, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'0'),
(60, 34, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'0'),
(59, 33, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'0'),
(58, 32, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'0'),
(57, 31, '2018-03-05', '2018-03-01', '2018-03-31', '2018-03-20', -2000, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `society_billgenerate`
--

DROP TABLE IF EXISTS `society_billgenerate`;
CREATE TABLE IF NOT EXISTS `society_billgenerate` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `BILL_ID` int(11) NOT NULL,
  `MEMBER_ID` int(11) NOT NULL,
  `M_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `BILL_ID` (`BILL_ID`),
  KEY `MEMBER_ID` (`MEMBER_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `society_billgenerate`
--

INSERT INTO `society_billgenerate` (`ID`, `BILL_ID`, `MEMBER_ID`, `M_ID`) VALUES
(252, 57, 31, 4),
(251, 57, 31, 3),
(250, 57, 31, 2),
(249, 57, 31, 1),
(248, 58, 32, 4),
(247, 58, 32, 3),
(246, 58, 32, 2),
(245, 58, 32, 1),
(244, 59, 33, 4),
(243, 59, 33, 3),
(242, 59, 33, 2),
(241, 59, 33, 1),
(240, 60, 34, 4),
(239, 60, 34, 3),
(238, 60, 34, 2),
(237, 60, 34, 1),
(236, 61, 35, 4),
(235, 61, 35, 3),
(234, 61, 35, 2),
(233, 61, 35, 1),
(232, 40, 2, 4),
(231, 40, 2, 3),
(230, 40, 2, 2),
(229, 40, 2, 1),
(228, 41, 3, 4),
(227, 41, 3, 3),
(226, 41, 3, 2),
(225, 41, 3, 1),
(224, 42, 4, 4),
(223, 42, 4, 3),
(222, 42, 4, 2),
(221, 42, 4, 1),
(220, 43, 5, 4),
(219, 43, 5, 3),
(218, 43, 5, 2),
(217, 43, 5, 1),
(216, 44, 6, 4),
(215, 44, 6, 3),
(214, 44, 6, 2),
(213, 44, 6, 1),
(212, 45, 7, 4),
(211, 45, 7, 3),
(210, 45, 7, 2),
(209, 45, 7, 1),
(208, 46, 8, 4),
(207, 46, 8, 3),
(206, 46, 8, 2),
(205, 46, 8, 1),
(204, 47, 9, 4),
(203, 47, 9, 3),
(202, 47, 9, 2),
(201, 47, 9, 1),
(200, 48, 10, 4),
(199, 48, 10, 3),
(198, 48, 10, 2),
(197, 48, 10, 1),
(196, 49, 11, 4),
(195, 49, 11, 3),
(194, 49, 11, 2),
(193, 49, 11, 1),
(192, 50, 12, 4),
(191, 50, 12, 3),
(190, 50, 12, 2),
(189, 50, 12, 1),
(188, 51, 13, 4),
(187, 51, 13, 3),
(186, 51, 13, 2),
(185, 51, 13, 1),
(184, 52, 14, 4),
(183, 52, 14, 3),
(182, 52, 14, 2),
(181, 52, 14, 1),
(180, 53, 15, 4),
(179, 53, 15, 3),
(178, 53, 15, 2),
(177, 53, 15, 1),
(176, 54, 16, 4),
(175, 54, 16, 3),
(174, 54, 16, 2),
(173, 54, 16, 1),
(172, 55, 17, 4),
(171, 55, 17, 3),
(170, 55, 17, 2),
(169, 55, 17, 1),
(168, 56, 23, 4),
(167, 56, 23, 3),
(166, 56, 23, 2),
(165, 56, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `society_documentmaster`
--

DROP TABLE IF EXISTS `society_documentmaster`;
CREATE TABLE IF NOT EXISTS `society_documentmaster` (
  `DOCUMENTMASTER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MEMBER_FLAT_NO` varchar(11) DEFAULT NULL,
  `DOCUMENT_ID` int(11) DEFAULT NULL,
  `DOCUMENT_FILE_URL` varchar(50) DEFAULT NULL,
  `DOCUMENT_FILE_NAME` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`DOCUMENTMASTER_ID`),
  UNIQUE KEY `MEMBER_FLAT_NO_2` (`MEMBER_FLAT_NO`),
  KEY `MEMBER_FLAT_NO` (`MEMBER_FLAT_NO`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `society_documentmaster`
--

INSERT INTO `society_documentmaster` (`DOCUMENTMASTER_ID`, `MEMBER_FLAT_NO`, `DOCUMENT_ID`, `DOCUMENT_FILE_URL`, `DOCUMENT_FILE_NAME`) VALUES
(1, 'A102', 1, 'pancard.jpg', 'Pan Card'),
(2, 'A103', 1, 'adharuser.jpg', 'Adhar Card'),
(3, 'B102', 1, 'pan.jpg', 'yatin');

-- --------------------------------------------------------

--
-- Table structure for table `society_eventgallery`
--

DROP TABLE IF EXISTS `society_eventgallery`;
CREATE TABLE IF NOT EXISTS `society_eventgallery` (
  `EVENT_GALLERY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EVENT_ID` int(11) DEFAULT NULL,
  `EVENT_DATE` date DEFAULT NULL,
  `EVENT_FILE_URL` varchar(50) DEFAULT NULL,
  `EVENT_FILE_NAME` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`EVENT_GALLERY_ID`),
  KEY `EVENT_ID` (`EVENT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `society_eventgallery`
--

INSERT INTO `society_eventgallery` (`EVENT_GALLERY_ID`, `EVENT_ID`, `EVENT_DATE`, `EVENT_FILE_URL`, `EVENT_FILE_NAME`) VALUES
(1, NULL, NULL, 'uploads/28-02-2018-19-14-33-diwali1.jpg', 'diwali1.jpg'),
(2, NULL, NULL, 'uploads/28-02-2018-19-14-33-event.jpg', 'event.jpg'),
(3, NULL, NULL, 'uploads/28-02-2018-19-14-33-ganpati.jpg', 'ganpati.jpg'),
(4, NULL, NULL, 'uploads/28-02-2018-19-14-33-ganpati2.jpg', 'ganpati2.jpg'),
(5, NULL, NULL, 'uploads/28-02-2018-19-14-33-holi.jpg', 'holi.jpg'),
(6, NULL, NULL, 'uploads/28-02-2018-19-14-33-holi1.jpg', 'holi1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `society_eventmaster`
--

DROP TABLE IF EXISTS `society_eventmaster`;
CREATE TABLE IF NOT EXISTS `society_eventmaster` (
  `EVENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EVENT_DATE` date DEFAULT NULL,
  `EVENT_DESC` varchar(300) DEFAULT NULL,
  `EVENT_NAME` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`EVENT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `society_eventmaster`
--

INSERT INTO `society_eventmaster` (`EVENT_ID`, `EVENT_DATE`, `EVENT_DESC`, `EVENT_NAME`) VALUES
(1, '2018-09-04', 'Ganesh Chaturthi Celebrations', 'Ganesh Chaturthi Celebrations'),
(2, '2018-09-05', 'Sri Ramnavami Celebrations', 'Sri Ramnavami Celebrations'),
(3, '2018-09-05', 'Annual and Republic Day Celebrations', 'Annual and Republic Day Celebrations'),
(4, '2018-02-28', 'Holi Festival', 'Holi Festival');

-- --------------------------------------------------------

--
-- Table structure for table `society_maintaiancemaster`
--

DROP TABLE IF EXISTS `society_maintaiancemaster`;
CREATE TABLE IF NOT EXISTS `society_maintaiancemaster` (
  `M_ID` int(11) NOT NULL AUTO_INCREMENT,
  `M_DESC` varchar(300) DEFAULT NULL,
  `M_AMOUNT` double DEFAULT NULL,
  `M_STATUS` bit(1) DEFAULT NULL,
  PRIMARY KEY (`M_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `society_maintaiancemaster`
--

INSERT INTO `society_maintaiancemaster` (`M_ID`, `M_DESC`, `M_AMOUNT`, `M_STATUS`) VALUES
(1, 'Maintaiance Charges', 3000, b'1'),
(2, 'Sinking Charges', 1000, b'1'),
(3, 'Events Charges', 500, b'1'),
(4, 'Misc Charges', 500, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `society_membermaster`
--

DROP TABLE IF EXISTS `society_membermaster`;
CREATE TABLE IF NOT EXISTS `society_membermaster` (
  `MEMBER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MEMBER_FLAT_NO` varchar(10) DEFAULT NULL,
  `USERNAME` varchar(40) DEFAULT NULL,
  `PASSWORD` varchar(15) DEFAULT NULL,
  `MEMBER_NAME` varchar(50) DEFAULT NULL,
  `MEMBER_ADDRESS` varchar(100) DEFAULT NULL,
  `MEMBER_GENDER` varchar(15) DEFAULT NULL,
  `EMAIL_ID` varchar(40) DEFAULT NULL,
  `ROLE` varchar(10) DEFAULT NULL,
  `IS_PARKING_ALLOCATE` bit(1) DEFAULT NULL,
  `PARKING_NO` varchar(10) DEFAULT NULL,
  `MEMBER_DOC` varchar(255) DEFAULT NULL,
  `MEMBER_DOC_NAME` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`MEMBER_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `society_membermaster`
--

INSERT INTO `society_membermaster` (`MEMBER_ID`, `MEMBER_FLAT_NO`, `USERNAME`, `PASSWORD`, `MEMBER_NAME`, `MEMBER_ADDRESS`, `MEMBER_GENDER`, `EMAIL_ID`, `ROLE`, `IS_PARKING_ALLOCATE`, `PARKING_NO`, `MEMBER_DOC`, `MEMBER_DOC_NAME`) VALUES
(1, 'A101', 'shwetakanekar', 'shweta123', 'Shweta Kanekar', 'A101 - Near sv road Building no 2 Near navjeevan school Bhandup(w)', 'Female', 'shweta.k@gmail.com', 'user', b'0', 'P-A101', NULL, NULL),
(2, 'A102', 'nehaS1', 'neha123', 'Neha Kanekar', 'A101 - Near sv road Building no 2 Near navjeevan school Bhandup(w)', 'female', 'neha.k@gmail.com', 'user', b'1', 'P-A102', NULL, NULL),
(3, 'A103', 'nishant', 'nishant123', 'Nishant Kanekar', 'A101 - Near sv road Building no 2 Near navjeevan school Bhandup(w)', 'Male', 'nishant.k@gmail.com', 'user', b'1', 'P-A103', NULL, NULL),
(4, 'A104', 'kuldeep', 'kuldeep123', 'Kuldeep Mainkar', 'A101 - Near sv road Building no 2 Near navjeevan school Bhandup(w)', 'male', 'kuldeepmk@gmail.com', 'user', b'1', 'P-A104', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `society_noticemaster`
--

DROP TABLE IF EXISTS `society_noticemaster`;
CREATE TABLE IF NOT EXISTS `society_noticemaster` (
  `NOTICE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOTICE_DATE` date DEFAULT NULL,
  `NOTICE_DESC` varchar(300) DEFAULT NULL,
  `NOTICE_FILE_NAME` varchar(50) DEFAULT NULL,
  `NOTICE_FILE_URL` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NOTICE_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `society_noticemaster`
--

INSERT INTO `society_noticemaster` (`NOTICE_ID`, `NOTICE_DATE`, `NOTICE_DESC`, `NOTICE_FILE_NAME`, `NOTICE_FILE_URL`) VALUES
(1, '2017-09-07', 'It is brought to your notice that in last 6 weeks, Society has to repair the sewage pipe more four times. Each time, we have found things like garments and eatables stuck in the pipe.It is clear that mesh of at least one of the pipe in some flat is open and is creating this problem.', 'Drainage problem in A6 building', 'http://www.kunalicon.com/notices'),
(2, '2018-09-05', 'We would monitor the situation for one more week and if the problem continues, Society office would visit all flats and inspect all opening. Note that erring flats would be fined as per society bye-laws.Your kind co-operation is requested in this matter.', 'Drainage problem in A6 building', 'http://www.kunalicon.com/notices/'),
(3, '2018-02-07', 'It is brought to your notice that in last 6 weeks, Society has to repair the sewage pipe more four times. Each time, we have found things like garments and eatables stuck in the pipe.It is clear that mesh of at least one of the pipe in some flat is open and is creating this problem.', 'General Norice', ''),
(4, '2018-02-02', 'It is brought to your notice that in last 6 weeks, Society has to repair the sewage pipe more four times. Each time, we have found things like garments and eatables stuck in the pipe.It is clear that mesh of at least one of the pipe in some flat is open and is creating this problem.', 'General Norice', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `MEMBER_ID` int(11) NOT NULL,
  `USERNAME` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `ROLE` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `MEMBER_ID` (`MEMBER_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
