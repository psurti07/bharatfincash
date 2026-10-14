-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2025 at 05:58 PM
-- Server version: 10.6.20-MariaDB-cll-lve
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indcapit_maindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `rec_date` datetime DEFAULT NULL,
  `fullname` varchar(80) NOT NULL,
  `mobile` varchar(40) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(2) NOT NULL DEFAULT 1 COMMENT '0=Admin, 1=Employee',
  `isActive` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`id`, `rec_date`, `fullname`, `mobile`, `emailid`, `password`, `role`, `isActive`, `isDelete`) VALUES
(1, '2023-03-14 12:47:03', 'Developer', '9904466599', 'info@verloopweb.com', '3fdc2b96e5de6df321152e254d28ddac', 0, 1, 0),
(2, '2023-03-14 12:47:03', 'Arvind Sir', '9023987358', 'admin@kreditbazar.com', '4e58867bdd582123c1f05946346ce097', 0, 1, 0),
(3, '2023-03-14 12:47:03', 'Mahesh Makwana', '7984310891', 'info@indcapital.in', '9d6a133683ec3c3ccf61c7f3ef688ade', 0, 0, 1),
(4, '2023-04-12 13:47:13', 'Dipika Maniya', '9913170623', 'dipikamaniya3008@gmail.com', '3bbc66eb5bab4e986e204d5598536196', 1, 0, 1),
(5, '2023-04-12 13:47:41', 'Monika', '9586935595', 'monugohil1234@gmail.com', 'e7d01688c81768c765831a65a6e0c4e2', 1, 0, 1),
(6, '2023-04-12 13:48:06', 'Bansi Kapadiya', '9313309705', 'bansikapadiya32@gmail.com', 'c87d2d89da0a58e1e1d253b80646b609', 1, 0, 1),
(7, '2023-06-20 12:04:05', 'Drashti vanani', '9106910258', 'Drashtivanani6803@gmail.com', '8209e36666fc8a0cafb07fffba76d654', 1, 1, 0),
(8, '2023-11-07 13:21:47', 'ROMIKA', '7046772049', 'romikakaklotar@gmail.com', '57d663d3213a631ea674a23c89fcbfae', 1, 1, 0),
(9, '2023-11-08 14:55:50', 'Abhishek Navathe', '9409492661', 'abhishek.navathe@gmail.com', '76496277299d2492882a4496ec8b062f', 0, 1, 0),
(10, '2024-03-16 13:42:23', 'MONIKA', '9737356633', 'monidevganiya10@gmail.com', 'c0f0129161427ba4c5dd02550622dd0b', 1, 1, 0),
(11, '2024-03-16 14:36:34', 'DIPIKA', '9913170623', 'dipikamaniya3008@gmail.com', '0b550852cc5de3e60fb6653e1310434f', 1, 1, 0),
(12, '2024-05-22 11:11:43', 'Isha', '9316075036', 'tapaniyaisha12@gmail.com', '482768a762464ad9d5d37e1761eb4242', 1, 0, 1),
(13, '2024-07-17 16:17:35', 'Kreditbazar', '9724157166', 'company@kreditbazar.com', '502da062910b05f0def54d1960ac53d8', 1, 0, 1),
(14, '2024-07-17 16:18:50', 'Kreditbazar', '9724157166', 'company@kreditbazar.com', '38fdf8319a7bd4c0625d108499a2bfd2', 0, 1, 0),
(15, '2024-11-07 17:41:45', 'Mahesh Makwana', '7984310891', 'info@indcapital.in', '8f8473eced671091e0bca41b8ac0b29a', 0, 1, 0),
(16, '2024-12-27 17:45:36', 'Vaibhavi', '6354762484', 'vaibhavibaraiya@375gmali.com', 'a79eb85e6af75759af9f170561b8e304', 1, 0, 1),
(17, '2025-01-06 17:20:30', 'usha', '8238303700', 'ushamiyatra1990@gmail.com', '68a172aaed4809c10b17e4e93f049df0', 1, 0, 1),
(18, '2025-02-06 14:34:52', 'extra', '9898339014', 'extra@indcapital.in', '0b6f779d1cd479127a963a23eb71efb8', 1, 1, 0),
(19, '2025-05-13 13:22:39', 'Nidhi Parmar', '8487840554', 'nidhiparmar120304@gmail.com', '2fb9354553d13e66d580b531bbfc8930', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `administration_log`
--

CREATE TABLE `administration_log` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `login_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL,
  `server_ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adsdata`
--

CREATE TABLE `adsdata` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `partnertype` int(2) NOT NULL DEFAULT 1 COMMENT '1=Channel, 2=Associate',
  `partnerid` int(11) NOT NULL DEFAULT 0,
  `fbpage` varchar(256) NOT NULL,
  `instapage` varchar(256) NOT NULL,
  `businessid` varchar(256) NOT NULL,
  `pixelid` varchar(256) NOT NULL,
  `isVerified` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allremarks`
--

CREATE TABLE `allremarks` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `module` varchar(256) NOT NULL,
  `linkid` int(11) NOT NULL,
  `notetext` varchar(256) NOT NULL,
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allremarks`
--

INSERT INTO `allremarks` (`id`, `rec_date`, `module`, `linkid`, `notetext`, `isDelete`) VALUES
(1, '2024-05-03 12:25:07', 'customerpayout', 18, 'nr', 0),
(2, '2024-05-03 12:33:27', 'customerpayout', 11, 'call back', 0),
(3, '2024-05-04 12:30:55', 'customerpayout', 18, 'nr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bankapplylink`
--

CREATE TABLE `bankapplylink` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `loantype` int(11) NOT NULL,
  `bankid` int(11) NOT NULL,
  `applyurl` varchar(256) NOT NULL,
  `isDelete` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bankapplylink`
--

INSERT INTO `bankapplylink` (`id`, `rec_date`, `loantype`, `bankid`, `applyurl`, `isDelete`) VALUES
(4, '2023-05-17 16:41:45', 11, 31, 'https://application.werize.com/home?partnerId=8abe4067-b783-454d-85da-aaf08e909070', 0),
(5, '2023-05-17 16:42:47', 12, 32, 'https://www.dealsofloan.com/apply-loan?&dsaId=YYYrSBE&retailerId=YYYrSBE&campaignId=r&productId=x&bankId=BBu', 1),
(6, '2024-02-14 13:04:21', 11, 32, 'https://www.dealsofloan.com/apply-loan?entityId=Y&dsaId=YYYrSBE&retailerId=YYYrSBE&campaignId=r&productId=x&bankId=BBu', 1),
(7, '2023-09-13 17:06:33', 12, 32, 'https://d0l.in/B/YYYrSBE/x/BBu', 1),
(8, '2023-09-21 16:52:52', 11, 38, 'https://bit.ly/3rmlSfL', 0),
(9, '2024-02-09 12:02:47', 11, 15, 'https://eezee.faircent.com?utm_source=wl&utm_medium=Mailer&campaign_name=Borrower_Partner&agf=WLA106761', 1),
(10, '2024-02-09 12:17:22', 12, 32, 'https://www.dealsofloan.com/apply-loan?&dsaId=YYYrSBE&retailerId=YYYrSBE&campaignId=r&productId=x&bankId=BBu', 1),
(11, '2024-02-09 12:21:03', 12, 32, ' https://d0l.in/B/YYYrSBE/x/BBu', 1),
(12, '2024-02-13 13:21:59', 12, 32, 'https://d0l.in/B/YYYrSBE/x/BBu', 1),
(13, '2024-02-13 18:17:41', 11, 40, 'https://portal.fibe.in/SignUp?utm_source=Kreditmee', 0),
(14, '2024-02-14 13:02:59', 12, 32, 'https://d0l.in/B/YYYrSBE/x/BBu', 1),
(15, '2024-04-13 10:44:52', 11, 35, 'https://app.upscale.cash/?utm_source=DSA&utm_medium=&utm_campaign=LOAN1&utm_id=&utm_term=maheshmakwana_7486022173&utm_content=', 1),
(16, '2024-04-13 10:45:04', 11, 32, 'https://www.dealsofloan.com/apply-loan?&dsaId=YYYrSBE&retailerId=YYYrSBE&campaignId=r&productId=x&bankId=BBu', 0),
(17, '2024-06-07 17:31:33', 11, 31, 'https://application.werize.com/home?partnerId=8abe4067-b783-454d-85da-aaf08e909070', 1),
(18, '2024-12-31 13:51:54', 11, 34, 'https://www.piramalfinance.com/pc\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `bank_name` varchar(100) NOT NULL,
  `bank_image` varchar(255) NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT 0,
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `rec_date`, `bank_name`, `bank_image`, `order_no`, `isDelete`) VALUES
(1, '2019-12-21 16:57:32', 'Axis Bank', '001.png', 1, 1),
(2, '2019-12-21 16:57:32', 'Yes Bank', '002.png', 2, 1),
(3, '2019-12-21 16:58:04', 'ICICI Bank', '003.png', 3, 1),
(4, '2019-12-21 16:58:04', 'Kotak Mahindra Bank', '004.png', 4, 1),
(5, '2019-12-21 16:58:18', 'HDFC Bank', '005.png', 5, 1),
(6, '2019-12-21 16:59:08', 'TATA Capital', '006.png', 6, 1),
(7, '2019-12-21 16:59:08', 'Indusind Bank', '007.png', 7, 1),
(8, '2021-03-23 12:18:01', 'SBI Bank', '008.png', 8, 1),
(9, '2019-12-21 16:59:38', 'IDBI Bank', '009.png', 9, 1),
(10, '2019-12-21 17:00:10', 'Bandhan Bank', '010.png', 10, 1),
(11, '2019-12-21 17:00:10', 'Union Bank', '011.png', 11, 1),
(12, '2019-12-21 17:00:10', 'RBL Bank', '012.png', 12, 1),
(13, '2019-12-21 17:00:10', 'Aditya Birla Capital', '013.png', 13, 1),
(14, '2020-03-02 20:50:08', 'Indiabulls', '014.png', 14, 1),
(15, '2020-03-02 20:50:08', 'Faircent.com', '015.png', 15, 0),
(16, '2020-03-02 20:50:48', 'Fullertor India', '016.png', 16, 1),
(17, '2020-03-02 20:50:48', 'DCB Bank', '017.png', 17, 1),
(18, '2020-03-02 20:51:27', 'Grihashakti', '018.png', 18, 1),
(19, '2020-03-02 20:51:27', 'PaySense', '019.png', 19, 0),
(20, '2021-03-23 12:17:34', 'Lendingkart', '023.png', 20, 0),
(21, '2020-03-02 20:51:27', 'Indifi', '021.png', 21, 1),
(22, '2024-04-11 17:11:07', 'Money View', 'download-removebg-preview_(1)1.png', 22, 0),
(26, '2021-10-22 13:00:49', 'Moneytap', '024.png', 24, 0),
(27, '2021-10-22 13:01:12', 'IDFC First Bank', '025.png', 25, 1),
(28, '2021-10-22 13:01:51', 'Bajaj Finserv', '026.png', 26, 1),
(29, '2021-10-22 13:01:51', 'Ziploan', '028.png', 28, 0),
(30, '2024-06-11 18:17:02', 'Other Bank', '099.jpg', 52, 1),
(31, '2021-10-22 13:01:51', 'WeRize', '034.png', 34, 0),
(32, '2021-10-22 13:01:51', 'FinBox', '035.png', 35, 0),
(33, '2021-10-22 13:01:51', 'Hero Fincorp', '030.png', 36, 1),
(34, '2024-04-11 17:08:26', 'Piramal', '040.jpg', 40, 0),
(35, '2024-06-11 18:16:30', 'UpScale', '041.png', 46, 1),
(36, '2021-10-22 13:01:51', 'Cashe', '042.png', 42, 0),
(37, '2023-09-15 11:46:12', 'InvestKraft', '0352.png', 43, 0),
(38, '2024-04-11 17:35:32', 'Upwards', 'download__2_-removebg-preview1.png', 44, 0),
(39, '2023-09-25 15:27:01', 'easymoney', '453.png', 45, 1),
(40, '2024-06-11 18:18:32', 'Fibe', 'WhatsApp_Image_2024-06-06_at_17_03_17_(2).jpeg', 1, 0),
(41, '2024-04-11 17:20:59', 'credizy', 'download__1_-removebg-preview.png', 1, 0),
(42, '2024-04-11 17:32:10', 'finnable', 'images-removebg-preview_(6).png', 50, 0),
(43, '2024-06-11 18:16:50', 'L&t finance', 'WhatsApp_Image_2024-04-15_at_17_16_25.jpeg', 51, 0),
(44, '2024-05-09 14:42:00', 'prefr', 'download-removebg-preview_(25).png', 41, 1),
(45, '2024-06-11 18:18:11', 'Faircenteezee', 'WhatsApp_Image_2024-06-06_at_17_03_17.jpeg', 53, 0),
(46, '2024-06-11 18:20:00', 'creditsaison', 'WhatsApp_Image_2024-06-06_at_17_03_17_(3).jpeg', 54, 0),
(47, '2024-06-11 18:22:51', 'Faircentpro', 'WhatsApp_Image_2024-06-11_at_18_22_17.jpeg', 55, 0),
(48, '2024-07-03 16:26:41', 'poonawalla fincorp', 'Frame_4393.png', 56, 1),
(49, '2024-12-10 13:35:31', 'INCRED', 'WhatsApp_Image_2024-12-10_at_13_05_35.jpeg', 46, 1),
(50, '2025-05-17 15:15:11', 'Money Ase', 'Moneyase.png', 47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bulksms`
--

CREATE TABLE `bulksms` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `fullname` varchar(250) DEFAULT NULL,
  `mobileno` varchar(80) NOT NULL,
  `emailid` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cardoffer_order`
--

CREATE TABLE `cardoffer_order` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `offerpage` int(2) NOT NULL DEFAULT 1 COMMENT '1=Cardoffer, 2=Specialoffer',
  `fullname` varchar(256) NOT NULL,
  `mobile` varchar(256) NOT NULL,
  `emailid` varchar(256) NOT NULL,
  `card_number` varchar(256) NOT NULL,
  `registration_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(50) NOT NULL,
  `isCustomer` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isActive` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No. 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_enquiry`
--

CREATE TABLE `career_enquiry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `applyfor` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `qualifications` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `keyskills` longtext NOT NULL,
  `city` varchar(256) DEFAULT NULL,
  `server_ip` varchar(256) DEFAULT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_opening`
--

CREATE TABLE `career_opening` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descriptions` longtext NOT NULL,
  `isActive` int(2) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cashfree_entry`
--

CREATE TABLE `cashfree_entry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `entryfor` int(2) NOT NULL DEFAULT 0 COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiry`
--

CREATE TABLE `contact_enquiry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `fullname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `server_ip` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_log`
--

CREATE TABLE `customer_log` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `login_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL,
  `server_ip` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime DEFAULT current_timestamp(),
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `mobile` varchar(50) NOT NULL,
  `persontype` int(2) NOT NULL DEFAULT 0 COMMENT '0=Salaried; 1=Self Employed',
  `loanamount` int(11) NOT NULL DEFAULT 0,
  `loantype` int(2) DEFAULT NULL,
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `important_update`
--

CREATE TABLE `important_update` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `tags` varchar(256) NOT NULL,
  `descriptions` longtext NOT NULL,
  `isActive` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `important_update`
--

INSERT INTO `important_update` (`id`, `rec_date`, `tags`, `descriptions`, `isActive`, `isDelete`) VALUES
(1, '2024-10-18 16:20:19', '9898339014', '<p>ifydtgtyt</p>\r\n', 1, 1),
(2, '2024-10-18 16:22:41', 'diwali', '<p>happy diwali</p>\r\n', 1, 1),
(3, '2024-10-30 15:40:09', 'Happy Diwali', '<p>Happy Diwali<br />\r\nObserving the Diwali&nbsp;holidays, our office will stay closed from &nbsp;31th October 2024&nbsp;&ndash; we&rsquo;ll resume from 06 November 2024</p>\r\n', 1, 1),
(4, '2024-10-30 15:46:57', 'Happy Diwali', '<p style=\"text-align: center;\">Happy Diwali<br />\r\nObserving the Diwali&nbsp;holidays, our office will stay closed from &nbsp;31th October 2024&nbsp;&ndash; we&rsquo;ll resume from 06 November 2024</p>\r\n', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `rec_date` datetime DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL,
  `cardid` int(11) NOT NULL DEFAULT 0,
  `inv_for` int(11) NOT NULL COMMENT '0=None, 1=PL, 2=BL, 3=Channel',
  `inv_prefix` varchar(50) NOT NULL,
  `inv_number` int(11) NOT NULL,
  `inv_date` date DEFAULT NULL,
  `inv_price` float(11,2) NOT NULL,
  `inv_cgst` float(11,2) NOT NULL,
  `inv_sgst` float(11,2) NOT NULL,
  `inv_igst` float(11,2) NOT NULL,
  `inv_grandtotal` float(11,2) NOT NULL,
  `remarks` varchar(256) DEFAULT NULL,
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jiopay_entry`
--

CREATE TABLE `jiopay_entry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `entryfor` int(2) NOT NULL DEFAULT 0 COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `statuscode` varchar(256) DEFAULT NULL,
  `transactionid` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loanlist`
--

CREATE TABLE `loanlist` (
  `id` int(11) NOT NULL,
  `loanname` varchar(255) NOT NULL,
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `loanlist`
--

INSERT INTO `loanlist` (`id`, `loanname`, `isDelete`) VALUES
(1, 'Personal Loan', 0),
(2, 'Car Loan', 0),
(3, 'Education Loan', 0),
(4, 'Business Loan', 0),
(5, 'Home Loan', 0),
(6, 'Mortgage Loan', 0),
(7, 'Cibil Loan', 0),
(8, 'Franchise Loan', 0),
(9, 'Home Loan B.T. & Top-up', 0),
(10, 'Mortgage Loan B.T. & Top-up', 0),
(11, 'Digital Personal Loan', 0),
(12, 'Digital Business Loan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loanstatus`
--

CREATE TABLE `loanstatus` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `statusname` varchar(256) NOT NULL,
  `priorityno` int(11) NOT NULL DEFAULT 1,
  `colorclass` varchar(50) NOT NULL,
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loanstatus`
--

INSERT INTO `loanstatus` (`id`, `rec_date`, `statusname`, `priorityno`, `colorclass`, `isDelete`) VALUES
(1, '2020-10-13 19:30:40', 'Approved', 2, 'success', 0),
(2, '2020-10-13 19:30:40', 'Rejected', 3, 'danger', 0),
(3, '2020-10-13 19:30:40', 'In Process', 1, 'info', 0),
(4, '2021-08-28 08:03:33', 'Query Process', 4, 'warning', 0),
(5, '2021-10-29 11:04:29', 'File Reopen', 5, 'info', 0),
(6, '2021-10-29 11:04:29', 'Verification', 1, 'success', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loanstatus_remarks`
--

CREATE TABLE `loanstatus_remarks` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `title` varchar(256) NOT NULL,
  `remarks` longtext NOT NULL,
  `statusid` int(11) NOT NULL DEFAULT 0,
  `isDelete` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loanstatus_remarks`
--

INSERT INTO `loanstatus_remarks` (`id`, `rec_date`, `title`, `remarks`, `statusid`, `isDelete`) VALUES
(1, '2023-04-25 20:31:11', '4 days documents pending', 'Dear Customer,\nYou have not submitted the documents yet for the loan process. Kindly submit them in your customer portal in 24-48 hours otherwise your file will be automatically rejected from the system – and the same would be updated in your portal. For more info, you can call us on _____ between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(2, '2023-04-25 20:31:37', 'OTP not given', 'Dear Customer,\r\nOur company requested you to share the OTP for your loan process but you denied sharing it. As per bank rules, OPT is a must for the loan process. So, if you wish to give OTP for your loan process, kindly call us on _____ in the next 24-48 hours otherwise your file will be automatically rejected from our system. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(3, '2023-04-25 20:32:11', 'Customer not in contact – 3 days warning', 'Dear Customer,\r\nOur login department is trying to contact you for the loan process for the last 3 days. But you\'ve not responded or you\'re not coming in contact with the company. If you wish to proceed further with your loan process, kindly call on ___ in the next 24-48 hours (between 10 AM – 5 PM; between Monday and Saturday – only business days); else, your file will be automatically rejected from the system.', 3, 0),
(4, '2023-04-25 20:32:26', 'Language issue – warning', 'Dear Customer,\r\nOur Login Department contacted you but the process couldn\'t go further due to unclear or non-understandable communication/language from your end. We suggest you make a trusted person/third-party call on your behalf within the next 24-48 hours and communicate in an understandable language/manner – failing in doing so would lead to an automatic rejection of your file from the system. You can call us on _____ between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(5, '2023-04-25 20:32:43', 'NR switched off at login time – warning', 'Dear Customer,\r\nOur login department called you at the Customer Login Time but either your contact number was switched off or unreachable. If you are willing to go ahead with your loan process, kindly call us on _______ within the next 24-48 hours else your file will be automatically rejected in the system. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(6, '2023-04-25 20:33:12', 'Customer Not Interested – warning', 'Dear Customer,\r\nAt the time when our login department called you regarding your loan process, you expressed uninterested. If you are willing to take your loan process forward, call us on _______ within the next 24-48 hours else your file will be automatically rejected in the system. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 3, 0),
(7, '2023-04-25 20:33:33', 'Verification', 'Dear Customer, Congratulations!\r\nYour verification has been successful! The Login Department has asked you for the required documents. Kindly submit the documents in your customer portal in the next 24 to 48 hours. Please stay in contact with the company for the next 7 working days. In case you have any doubts or queries, call on _______. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 6, 0),
(8, '2023-04-25 20:33:52', 'Approved', 'Dear Customer, Congratulations!\r\nWe are pleased to inform you that Your Personal Loan of amount ________ has been approved.', 1, 0),
(9, '2023-04-25 20:34:21', '4 days documents pending – documents pending reject', 'Dear Customer,\r\nWe have still not received any documents or information from your side – and due to this, your file has been rejected. You can reapply for a loan after 6 months.', 2, 0),
(10, '2023-04-25 20:35:00', 'OTP not given – reject', 'Dear Customer,\r\nWe regret to inform you that your Personal Loan application in our company is rejected because you didn\'t provide the required OTP for further processes.', 2, 0),
(11, '2023-04-25 20:35:21', 'Customer not in contact – reject', 'Dear Customer,\r\nOur Login Department has tried contacting you regarding the loan process – to which you\'ve not responded or you\'re not coming in contact with us, and due to this your file has been automatically rejected from the system – and the same has been updated and shown in your portal.', 2, 0),
(12, '2023-04-25 20:35:50', 'File rejected – ABP LOW, CIBIL LOW, PL INQUIRY', 'Dear Customer,\r\nWe regret to inform you that your application for a loan in our company is rejected because you do not meet the required criteria (Average Banking, PL inquiries, Obligations, CIBIL low, ABP low, etc.).', 2, 0),
(13, '2023-04-25 20:36:05', 'Language issue – rejected', 'Dear Customer,\r\nWe regret to inform you that your Personal Loan application in our company is rejected due to unclear or non-understandable communication from your end.', 2, 0),
(14, '2023-04-25 20:36:40', 'NR switched off at login time', 'Dear Customer,\r\nWe regret to inform you that your application for a personal loan in our company is rejected because even after many consistent tries of reaching out, you are unreachable or your registered mobile number is switched off. For more info call on _______. You can call us between 10 AM to 5 PM (Monday to Saturday - only business days).', 2, 0),
(15, '2023-04-25 20:36:57', 'Customer not interested – reject', 'Dear Customer,\r\nWe regret to inform you that your Loan application in our company is rejected because of the uninterest shown by you due to any reason(s).', 2, 0),
(16, '2023-04-25 20:37:28', 'On Hold', 'Dear Customer,\r\nAs per your request, we have paused your loan process and put it on hold. Whenever you wish to restart your loan process, kindly call the company on ___ between 10 AM to 5 PM (Monday to Saturday - only business days).', 2, 0),
(17, '2023-04-25 20:37:44', 'Login process through Link', 'Dear Customer,\r\nWe called you for the bank login process but you informed us that you would like to do the process through the link. So, we’re closing your file in our system. If you want any update regarding your file, you’ve to call/contact the bank directly.', 2, 0),
(18, '2023-04-25 20:38:12', 'File Reopen', 'Dear Customer,\r\nYou applied to our company for a loan process but as you were not in contact with our company, your file is closed – the reason could be one of the following: (1) You didn\'t submit your document to the company for the login process; (2) You didn\'t respond to our calls; (3) You didn\'t send any of OTP for the login process, etc. Now, as you contacted us again to reopen your file, we are re-opening your file for the loan process and after that, you have to be in contact with our company for 7 days.', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership_order`
--

CREATE TABLE `membership_order` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL,
  `registration_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `card_number` varchar(256) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(256) NOT NULL,
  `isActive` int(2) NOT NULL DEFAULT 1,
  `isDelete` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meta_keywords`
--

CREATE TABLE `meta_keywords` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `slug` varchar(100) NOT NULL,
  `title` varchar(256) NOT NULL,
  `descriptions` mediumtext NOT NULL,
  `keywords` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meta_keywords`
--

INSERT INTO `meta_keywords` (`id`, `rec_date`, `slug`, `title`, `descriptions`, `keywords`) VALUES
(1, '2021-07-08 19:28:54', 'home', 'Easy Personal Loans & Business Loans on low Interest | Indcapital', 'Get the fastest loan approvals online, Indcapital helps you in applying for Personal Loan & Business Loan through multiple Banks & NBFCs for free, paperless process', 'Instant Personal Loan, Instant Business Loan, Personal loan online, Business Loan Online'),
(2, '2021-07-08 19:28:54', 'company', 'Providing Top-Notch Quick Loan Services Online | Indcapital', 'Quick loan services, Instant personal loan, Instant Business Loan\nMeta: Providing top-notch quick instant personal loans & Business loans through multiple banks along with minimal fees online, Growuplend has served a lot of customers', 'Instant personal loan'),
(3, '2021-07-08 19:30:16', 'contact', 'Indcapital – Apply Instant Loan Online', 'Indcapital offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'Indcapital, personal loan, instant personal loan, Indcapital personal loan, Indcapital india personal loans, instant loan in india, online loan in india, personal loan india'),
(4, '2021-07-08 19:30:16', 'career', 'Indcapital – Apply Instant Loan Online', 'Indcapital offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'Indcapital, personal loan, instant personal loan, Indcapital personal loan, Indcapital india personal loans, instant loan in india, online loan in india, personal loan india'),
(5, '2021-07-08 19:31:43', 'privacy-policy', 'Indcapital – Apply Instant Loan Online', 'Indcapital offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'Indcapital, personal loan, instant personal loan, Indcapital personal loan, Indcapital india personal loans, instant loan in india, online loan in india, personal loan india'),
(6, '2021-07-08 19:31:43', 'terms', 'Indcapital – Apply Instant Loan Online', 'Indcapital offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'Indcapital, personal loan, instant personal loan, Indcapital personal loan, Indcapital india personal loans, instant loan in india, online loan in india, personal loan india'),
(7, '2021-07-08 19:32:28', 'blog', 'Indcapital – Apply Instant Loan Online', 'Indcapital offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'Indcapital, personal loan, instant personal loan, Indcapital personal loan, Indcapital india personal loans, instant loan in india, online loan in india, personal loan india'),
(8, '2021-07-08 19:33:51', 'personal-loan', 'Get Instant Personal Loan online | Low Interest - Indcapital', 'Get Instant Personal Loan online at Indcapital. Guaranteed quick loan offers from multiple banks & NBFCs for free. Get loans up to 25 lakhs at minimal charges.', 'Personal loan online, Instant Personal Loan, Personal loan'),
(9, '2021-07-08 19:33:51', 'business-loan', 'Get Instant Business Loan at lowest interest | Indcapital', 'Get Instant Business Loan online from Indcapital. We let you apply for a loan from multiple banks & NBFCs for free. Get loans up to 50 lakhs at minimal charges.', 'Business loan online, Instant Business Loan, Business loan'),
(12, '2021-07-08 19:36:13', 'digital-personal', 'Get Instant personal loan online at low interest | Indcapital', 'Personal loan, Instant Personal loan, personal loan online\r\nMEta: Apply for an instant personal loan online through multiple NBFCs. Indcapital provides easy loan approval with online paperless process', 'Instant Personal loan'),
(13, '2021-07-08 19:36:13', 'digital-business', 'Indcapital – Apply Instant Loan Online', 'Indcapital offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'Indcapital, personal loan, instant personal loan, Indcapital personal loan, Indcapital india personal loans, instant loan in india, online loan in india, personal loan india'),
(19, '2021-07-09 11:12:01', 'portal-customer', 'Indcapital – Apply Instant Loan Online', 'Indcapital offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'Indcapital, personal loan, instant personal loan, Indcapital personal loan, Indcapital india personal loans, instant loan in india, online loan in india, personal loan india'),
(21, '2021-07-21 14:29:51', 'our-product', 'Indcapital – Apply Instant Loan Online', 'Indcapital offers instant personal loans, business loans, home loan, loan against property and many more at attractive interest rates &amp; easy EMI options. Apply now!', 'Indcapital, personal loan, instant personal loan, Indcapital personal loan, Indcapital india personal loans, instant loan in india, online loan in india, personal loan india'),
(22, '2021-08-03 13:51:12', 'deluxe-membership-card', 'With Royal Membership Card, Getting Personal Loan is a Matter of Minutes!', 'Indcapital Royal Membership Card provides you with an Instant Personal Loan of up to ₹15 Lakhs plus several attractive benefits.', 'Indcapital membership card'),
(23, '2021-08-03 13:51:49', 'marvel-membership-card', 'Get Business Loans online - Imperial Membership Card | Indcapital', 'Instant Business Loan with an easy online process, Indcapital helps customers to apply for a loan from numerous banks. 100% quick paperless process', 'Indcapital membership card');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribe`
--

CREATE TABLE `newsletter_subscribe` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `subscribeemail` varchar(256) NOT NULL,
  `isActive` int(2) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `openmoney_entry`
--

CREATE TABLE `openmoney_entry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `entryfor` int(11) NOT NULL DEFAULT 0 COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otpverification`
--

CREATE TABLE `otpverification` (
  `id` int(11) NOT NULL,
  `rec_date` date DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `otpcode` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paygic_entry`
--

CREATE TABLE `paygic_entry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `entryfor` int(2) NOT NULL DEFAULT 0 COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `transactionid` varchar(256) DEFAULT NULL,
  `statuscode` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paytm_entry`
--

CREATE TABLE `paytm_entry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `entryfor` int(2) NOT NULL DEFAULT 0 COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phonepe_entry`
--

CREATE TABLE `phonepe_entry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `entryfor` int(2) NOT NULL DEFAULT 0 COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `productname` varchar(256) NOT NULL,
  `productslug` varchar(256) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `offeramount` float(11,2) NOT NULL,
  `inOffer` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `rec_date`, `productname`, `productslug`, `amount`, `offeramount`, `inOffer`) VALUES
(1, '2021-12-25 13:09:38', 'Digital Personal Loan', 'digital-personal-loan', 999.00, 299.00, 1),
(2, '2021-12-25 13:09:38', 'Digital Business Loan', 'digital-business-loan', 999.00, 299.00, 1),
(3, '2021-12-25 13:09:38', 'Card Offer', 'card-offer', 999.00, 299.00, 1),
(4, '2021-12-25 13:09:38', 'Special Offer', 'special-offer', 999.00, 299.00, 1),
(5, '2021-12-25 13:09:38', 'Bumper Offer', 'bumper-offer', 999.00, 299.00, 1),
(6, '2021-12-25 13:09:38', 'Flash Offer', 'flash-offer', 999.00, 299.00, 1),
(7, '2021-12-25 13:09:38', 'Quick Offer', 'quick-offer', 999.00, 299.00, 1),
(8, '2025-02-04 16:34:34', 'Mega Offer', 'mega-offer', 999.00, 299.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `razorpay_entry`
--

CREATE TABLE `razorpay_entry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `entryfor` int(2) NOT NULL DEFAULT 0 COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roipackages`
--

CREATE TABLE `roipackages` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `loantype` int(11) NOT NULL,
  `bankid` int(11) NOT NULL,
  `roi` float(11,2) NOT NULL,
  `termsyears` float(11,2) NOT NULL,
  `termsmonths` int(11) NOT NULL,
  `isDelete` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roipackages`
--

INSERT INTO `roipackages` (`id`, `rec_date`, `loantype`, `bankid`, `roi`, `termsyears`, `termsmonths`, `isDelete`) VALUES
(1, '2023-10-26 14:14:14', 11, 6, 10.99, 6.00, 72, 0),
(3, '2023-10-26 14:16:03', 11, 25, 10.49, 5.00, 60, 0),
(5, '2023-10-26 14:17:16', 12, 6, 10.99, 5.00, 72, 0),
(6, '2023-10-26 14:17:16', 12, 21, 10.00, 5.00, 60, 0),
(9, '2023-10-26 14:20:51', 12, 25, 11.50, 5.00, 60, 0),
(10, '2023-10-26 14:20:51', 12, 32, 13.00, 1.50, 18, 0),
(11, '2023-10-26 14:30:22', 11, 33, 14.00, 3.00, 36, 1),
(12, '2023-10-26 14:21:28', 12, 28, 10.00, 5.00, 60, 1),
(13, '2023-10-26 14:11:13', 11, 22, 18.00, 5.00, 60, 0),
(14, '2023-10-26 14:11:43', 11, 16, 14.00, 4.00, 48, 1),
(15, '2023-10-26 14:12:43', 11, 37, 22.50, 2.00, 24, 0),
(16, '2023-10-26 14:13:55', 11, 34, 15.50, 2.00, 24, 0),
(17, '2023-10-26 14:15:17', 11, 19, 16.50, 4.00, 48, 0),
(18, '2023-10-26 14:16:11', 12, 16, 18.00, 4.00, 48, 1),
(19, '2023-10-26 14:17:57', 12, 15, 21.00, 3.00, 36, 0),
(20, '2023-10-26 14:43:11', 11, 15, 12.00, 3.00, 36, 0),
(21, '2023-10-26 14:44:53', 12, 20, 12.00, 3.00, 36, 0),
(22, '2023-10-26 14:45:13', 12, 40, 17.00, 3.00, 36, 0),
(23, '2023-10-26 14:45:51', 12, 26, 15.00, 8.00, 96, 0),
(24, '2023-10-26 14:46:12', 12, 39, 11.75, 5.00, 60, 0),
(25, '2023-10-26 14:46:30', 12, 4, 16.00, 4.00, 48, 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_options`
--

CREATE TABLE `site_options` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `option_key` varchar(255) NOT NULL,
  `option_value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_options`
--

INSERT INTO `site_options` (`id`, `rec_date`, `option_key`, `option_value`) VALUES
(1, '2024-08-09 14:48:25', 'privacy-policy', '<p>The privacy of every user of Indcapital is important for the company. This Privacy Policy mentions the data and information we collect about you, how we treat it, with whom we share it, and how we preserve and protect it.</p>\r\n\r\n<p>In the regular course of our business through this website, we gather your personal information through several sources, including:</p>\r\n\r\n<ul>\r\n	<li>Information from you, such as applications or other sources which includes your name, address, marital status, employment, assets and income; and</li>\r\n	<li>Information about you, your accounts, and your holdings and transactions that we receive from you or others, such as account custodians, brokers, and other financial services firms, banks, etc.</li>\r\n</ul>\r\n\r\n<p>We&#39;re also dedicated to protecting the users of our website by addressing potential privacy concerns. Our privacy guidelines apply to all users globally. This policy applies to all information, in whatever form, relating to Indcapital&rsquo;s business activities across the world, and to all information handled by Indcapital, relating to other companies and organizations with whom it deals. It also covers all IT and information communications facilities operated by Indcapital or on its behalf.</p>\r\n\r\n<p>This Privacy Policy covers the security, information, IT equipment and use of Indcapital, a company incorporated under the laws, presently in force in India and has its registered office at 302-A, heny Arcade , Dabholi Gam , Dabholi, BRTS, Katargam, Surat, Gujarat 395004 and all its affiliates. It also includes the use of email, internet, voice and mobile IT equipment. This policy applies to all Indcapital Users, Clients, and employees (hereafter referred to as &lsquo;individuals&#39;).</p>\r\n\r\n<p>Subject to arbitration, only the courts and tribunals of Surat, Gujarat, shall have exclusive jurisdiction with respect to any suit, action or any other proceedings arising out of or in relation to the Loan Documents. Nothing contained in this clause shall limit any right of the Lender to commence any legal action or proceedings arising in relation to the Loan or the Loan Documents in any other court, tribunal or another appropriate forum, competent jurisdiction and the Borrower and/or the Guarantor hereby consent to that jurisdiction.</p>\r\n\r\n<p><strong>How Indcapital treats, manages, and protects Your Personal Information:</strong></p>\r\n\r\n<p>Indcapital doesn&rsquo;t sell or trade information about current or former clients to third parties. We may disclose your personal information as necessary to:</p>\r\n\r\n<ul>\r\n	<li>Effect, administer, or enforce a transaction that you request or authorize;</li>\r\n	<li>Process or service a financial product or service that you request or authorize; or</li>\r\n	<li>Maintain or service your account with us or with another entity.</li>\r\n</ul>\r\n\r\n<p>Indcapital may also disclose your personal information and data for everyday business purposes to organizations or firms who provide consulting, technology or other services for us and agree to maintain its confidentiality; others, such as attorneys, trustees, family members, or others who are authorized to represent you, your estate, or a joint or co-owner of your account; regulatory agencies; or as we are otherwise permitted or required by law or process of law.</p>\r\n\r\n<p>Indcapital restricts access to your personal information to our employees and to permitted third-parties who need to know that information to provide products or services for us, or to provide, process, or maintain any security, account, or investment product, service or program for you or your benefit. To protect your personal information from unauthorized access and use, we have adopted administrative, technical, and physical security procedures that comply with the Laws in India. These measures include computer safeguards and secured files and buildings.</p>\r\n\r\n<p><strong>What Indcapital can do with your personal information:</strong></p>\r\n\r\n<p>We may use your personal information that we collect, or that is provided to us, for the following reasons:</p>\r\n\r\n<ol>\r\n	<li>Considering any application for an account or service;</li>\r\n	<li>Carrying out our business functions and activities;</li>\r\n	<li>Collecting amounts you owe us, including taking enforcement action;</li>\r\n	<li>Exercising our rights and fulfilling our obligations under any agreement with you;</li>\r\n	<li>Exercising our rights and fulfilling our obligations for the purposes of complying with all applicable laws, including those relating to money laundering, terrorist financing, bribery, corruption, tax evasion, fraud and similar; and managing all economic and trade sanction risks;</li>\r\n	<li>Generally administering and monitoring services provided to you (or any related entity); and</li>\r\n	<li>Providing you with information about our other services, or the services of selected third parties in which we think you may have an interest, including by post, telephone and electronic message &ndash; you can opt-out of receiving information about our other services and/or the services of selected third parties by informing us in writing.</li>\r\n</ol>\r\n\r\n<p><strong>Sharing of Personal Information with Third Parties:</strong></p>\r\n\r\n<p>Indcapital does not sell, trade, or otherwise transfer to outside parties your personally identifiable information. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect our or others&#39; rights, property, or safety. However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.</p>\r\n\r\n<p><strong>Security and Confidentiality:</strong></p>\r\n\r\n<p>The protection and security of your personal information are important to us. We generally follow industry-standard information security tools and measures, as well as internal procedures and strict guidelines to prevent information submitted to us, both during transmission and once we receive it from misuse and data leakage. No method of transmission over the internet, or method of electronic storage, is 100% secure, however. Therefore, while we strive to use commercially acceptable means to protect your personal information, which considerably reduces the risks of data misuse, we cannot guarantee its absolute security. To notify the Company about any security vulnerability or potential data breach, please contact us at: <a href=\"mailto:info@indcapital.in\">info@indcapital.in</a> and we will take the appropriate measures to address such an incident, as deemed necessary.</p>\r\n\r\n<p>Our employees can access the information on a &quot;need-to-know&quot; basis and are subject to confidentiality obligations.</p>\r\n\r\n<h3>DATA ACCURACY</h3>\r\n\r\n<p>Personal Data must be accurate and, where necessary, kept up to date. It must be corrected or deleted without delay when inaccurate. It is advisable that you ensure that the Personal Data we use and hold is accurate, complete, kept up to date and relevant to the purpose for which we collected it. You must check the accuracy of any Personal Data at the point of collection and at regular intervals afterwards. You must take all reasonable steps to destroy or amend inaccurate or out-of-date Personal Data.</p>\r\n\r\n<h3>LIMIT OF LIABILITY</h3>\r\n\r\n<p>We shall not be liable for any confusion caused as a result of any of your actions or omission of any action, anything as a result of your viewing, reading or listening of any content. Although we will do our best to provide constant, uninterrupted access to our website, we accept no responsibility or liability for any interruption or delay.</p>\r\n\r\n<p>In no event will our total liability to you for all damages arising from your use of the service or information, materials or products included on or otherwise made available to you through the service exceed the amount you paid for the service related to your claim.</p>\r\n\r\n<p>We have no liability for any loss, damage or misappropriation of your files under any circumstances or for any consequences related to changes, restrictions, suspension or termination of your service or the agreement. These liabilities shall apply to you even if their remedies shall fail their essential purpose.</p>\r\n\r\n<h3>USAGE OF ADVERTISING ID</h3>\r\n\r\n<p>When you are using our application that incorporates our Services, we may also automatically record your Google and/or any other Advertising ID (if you are using an Android device) or your Advertising Identifier (IDFA - if you are using an IOS device; together with the Google and/or any other Advertising ID-&quot;Mobile Advertising IDs&quot;), for advertising or analytics purposes. The said Advertising ID is an anonymous identifier, provided by Google. If your device has an Advertising ID, we may collect and use it for advertising and user analytics purposes. If your device does not have an Advertising ID, we may use other persistent identifiers. The information collected may also be stored on your device. You can reset your mobile Advertising ID or opt-out of receiving targeted ads through your mobile Advertising IDs which is provided in our settings.</p>\r\n\r\n<h3>COMPLIANCE &amp; COOPERATION WITH REGULATORS</h3>\r\n\r\n<p>We regularly review this Privacy Policy and make sure that we process your personal information in ways that comply with regulations currently in force in India. We firmly comply with legal frameworks including data protection laws relating to the transfer of data.</p>\r\n\r\n<h3>CONSENT</h3>\r\n\r\n<p>By using our website, you consent to our website&#39;s Privacy Policy. The usage of the website shall be construed as an acceptance of the Privacy Policy.</p>\r\n\r\n<h3>GRIEVANCES</h3>\r\n\r\n<p>For any complaints and/or inquiries, you can send us formal written inquiries or complaints at <a href=\"mailto:info@indcapital.in\">info@indcapital.in</a>. All inquiries and/or complaints shall be examined and will be resolved expeditiously. Our team of experts will respond by contacting the person who made such inquiries and/or complaints. We work with the appropriate regulatory authorities, including local data protection authorities, to resolve any complaints regarding the transfer of your data that we cannot resolve with you directly.</p>\r\n\r\n<h3>MODIFICATION OF THE POLICY</h3>\r\n\r\n<p>We reserve the right to modify this Privacy Policy at our own independent decision at any time. If the changes are significant, the Company shall spare no efforts to apprise its clientele and provide a prominent notice (including, for certain services, email notification of Privacy Policy changes). It is pertinent to remember that it shall be the Clients&#39; responsibility to read the Policy as amended every once in a while.</p>\r\n\r\n<h3>USAGE OF COOKIES/COOKIES POLICY</h3>\r\n\r\n<p>Cookies are small files that a site or its service provider transfers to your computer&#39;s hard drive through your web browser with your permission which enables the site or service provider&#39;s systems to recognize your browser and capture and remember certain information. We use cookies to help us understand and save your preferences for future visits, keep track of advertisements and compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.</p>\r\n'),
(2, '2024-08-14 12:00:04', 'terms-conditions', '<p dir=\"ltr\">The following are the terms and conditions for Customers and Employees. So, these will apply as per your role.</p>\r\n\r\n<p dir=\"ltr\">Indcapital wishes to procure the services under the terms and conditions set forth and the user/customer wishes to be associated with these terms and conditions.</p>\r\n\r\n<p dir=\"ltr\">Therefore, in consideration of the agreements contained in this, the parties, intending to be legally bound, agree to the following:</p>\r\n\r\n<ul dir=\"ltr\">\r\n	<li>Information from you, such as applications or other forms (which includes your name, address, marital status, employment, assets and income); and</li>\r\n	<li>Information about you, your accounts, and your holdings and transactions that we receive from you or others, such as account custodians, brokers, and other financial services firms, banks, etc.</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\">If the company by any source comes across by anyone bad-mouthing or defaming the company&#39;s reputation or company&#39;s members then strict legal action will be taken against the individual or group.</p>\r\n\r\n<p dir=\"ltr\">We&#39;re also serious about protecting our users by addressing potential privacy concerns. Our terms and condition guidelines apply to all users across the world. These terms and conditions apply to all information, in whatever form, relating to Indcapital;s business activities worldwide, and to all information handled by Indcapital, relating to other organizations with whom it deals. It also covers all IT and information communications facilities operated by Indcapital or on its behalf.</p>\r\n\r\n<h3 dir=\"ltr\">PLAN&nbsp;TERMS AND CONDITIONS AND RETURN POLICY:</h3>\r\n\r\n<ol dir=\"ltr\">\r\n	<li>The PLAN&nbsp;PAYMENT is refundable only as per the cancellation and refund policy.</li>\r\n	<li>&quot;indcapital.in&quot; Plan&nbsp;is not transferable and is only valid up to its date of expiry and the card may not be used by any person other than the cardholder.</li>\r\n	<li>The &quot;indcapital.in&quot; Plan&nbsp;is not a payment card or credit card.</li>\r\n	<li>Lost, stolen or damaged &quot;indcapital.in&quot; Plan&nbsp;are to be notified immediately to (i) the &quot;indcapital.in&quot; office from which the card was issued or (ii) to the card issuer, who shall be responsible for providing a replacement card (replacement is chargeable).</li>\r\n	<li>Renewal terms and conditions are at the discretion of &quot;indcapital.in&quot;.</li>\r\n</ol>\r\n\r\n<h3 dir=\"ltr\">CUSTOMER TERMS AND CONDITIONS:</h3>\r\n\r\n<ol dir=\"ltr\">\r\n	<li>The PLAN&nbsp;PAYMENT is refundable only as per the cancellation and refund policy.</li>\r\n	<li>The company only takes the cost of the Plan. No other tip of service is charged.</li>\r\n	<li>Buying a Plan&nbsp;lets you apply for a loan and it doesn&rsquo;t guarantee loan approval as the final loan approval depends on the banks and the customer profile. If the loan is rejected, you can still avail other benefits of the Plan.</li>\r\n	<li>If a customer is viewing any advertisement/promotional content of the company and then approaching the company thinking that he/she will get the loan approval based on the advertisement, then it must be noted that loan application will only be submitted once the customer buys Indcapital&rsquo;s Plan. Even after buying the Plan, the final loan approval depends on the bank(s) and customer profile. If the customer&rsquo;s profile doesn&rsquo;t match loan eligibility criteria, he/she won&rsquo;t be able to get a loan. Still, they can avail other benefits of the Plan.</li>\r\n	<li>The documents, cheques, and OTP that the company&#39;s employee asks the customer is for the processing of the loan, the company is not responsible if any problems/disputes arise in the future.</li>\r\n	<li>If you do not give an OTP to the company&#39;s employee for the loan process, then your file will be rejected. (According to the criteria, if your file matches without OTP, your loan will be processed).</li>\r\n	<li>If our company&#39;s executive asks you for any transaction OTP, do not provide that transaction OTP.</li>\r\n	<li>If a customer has any queries regarding the loan process then he/she would have to contact that department where their files are in process.</li>\r\n	<li>We will verify your documents in multiple banks; so whatever documents are submitted by customers in our company that will match with any bank criteria, in that bank only we will proceed with the loan process. (For example, if your file will match in 2 banks then our company&#39;s login department will log in your document only on that 2 banks. The verification is done by the company&#39;s employee. The company or bank will not give any proof for that.</li>\r\n	<li>The document will be verified by the company in multiple banks. If your documents match the criteria of the bank, then the login process will be done in that bank. If your documents do not match the criteria of a bank, the company will give you a solution. You can take the solution and reapply.</li>\r\n	<li>It is not fixed that the customer file will be logged in only certain banks. It may be verified in other banks also, depending on the customer file.</li>\r\n	<li>Our company is not taking extra charges other than Plan&nbsp;charges. If any third-party charges you then our company is not responsible for that.</li>\r\n	<li>There are no processing or file charges for customer loan approval. There is only one charge and that&#39;s only for the Plan&nbsp;- spanning for a lifetime.</li>\r\n	<li>If a customer file is logged in uncoded banks, then the customer has to pay charges separately.</li>\r\n	<li>Our company will log in customer files as per their requirements. (Example: If customer requirement is INR 1 lakh and if some bank criteria are up to INR 50,000 then we will not log in their file in that bank.</li>\r\n	<li>If the customer explains to us their profile and questions us whether the loan will be approved or not, to answer that, the loan approval estimated ratio is 60% and 40% means 60% chances of approval and 40% chances of rejection. So, If your file gets rejected in our company then the customer shouldn&#39;t argue for that. Because the company is not taking any guarantee for the loan.</li>\r\n	<li>Once the customer file is rejected in our company then any bank can reopen that file for processing. But code activation time is dependent on various banks, ranging from 3 to 4 months. If approval will come from that bank within that code activation time then only company reference would be applicable. So, the customer would not have any doubt that the loan has been taken from his/her own or someone else&#39;s reference. After a code deactivation, if the loan is approved by that bank then there is no responsibility of our company.</li>\r\n	<li>Wherever the customer file is logged in by the company, these details will not be given to any customer in written or digital form.</li>\r\n	<li>Whatever documents submitted by the customer are secure in our company. We are using those documents only for loan purposes. If documents are misused by any other sources, then the company will not be responsible for that.</li>\r\n	<li>Loan offers and pre-approval loans process depends only on the bank&#39;s rules and that type of loan will be given only on customer behaviour. So, there is so much difference between that type of process and the company&#39;s process. If that loan is approved by another company then the customer can&#39;t blame our company.</li>\r\n	<li>Loan approval depends on your profile so if your documents are perfect then you will get a loan from our company.</li>\r\n	<li>The loan information is only given to that person who has applied for the loan.</li>\r\n	<li>During the loan processing time, if any customer would not be in contact with us for 3 days, then that file will be rejected by our company.</li>\r\n	<li>If your file is rejected in our company, then the customer has to make sure that they have to re-submit their documents with the solution in our company after 6 months.</li>\r\n	<li>The company is not responsible if the customer loan is rejected by queries.</li>\r\n	<li>If the customer will apply for the first time but his/her loan is rejected in our company then the company will give them reason and solution for that. So at re-applying time if the customer will not re-submit a file with a solution then the file will be again rejected in our company for the same reason.</li>\r\n	<li>The company will provide only the reason for rejection to the customer and it would not be provided in the form of hard or soft copy. Some banks only provide general reasons, they don&#39;t give us any specific reason so the customer should not complain about that.</li>\r\n	<li>The customer has to give correct information about their CIBIL SCORE and PROFILE. If the customer gives wrong information, then the company will not be responsible for loan rejection.</li>\r\n	<li>The company will not be providing any CIBIL REPORT or VALUATION REPORT in digital or hard copy to any customer in any situation.</li>\r\n	<li>Bank charges are applicable as per banks rules and regulations.</li>\r\n	<li>The company will take legal action against the customer who submitted fake documents.</li>\r\n	<li>After logging in your file, the customer has to contact only the login department, not any telecaller or other department.</li>\r\n	<li>The person who has already applied for a loan in the same bank, then our company will not apply in that bank.</li>\r\n	<li>During the loan process if the rules of any bank change, then we have to follow those new rules.</li>\r\n	<li>The person who needs a loan only has to apply for the loan process.</li>\r\n	<li>The customer has to give their registered phone number for being contacted by the login department.</li>\r\n	<li>After completing the loan process, the customer has to cancel their cheque by visiting the concerned bank only.</li>\r\n	<li>During the loan processing time, if the company gets any queries and it is not solving that in the given time, then the company can take more time for that. So, the customer must not complain about the same.</li>\r\n	<li>If the customer wants to reapply in our company after file rejection or approval, then he/she has to re-submit their documents in the customer login menu.</li>\r\n	<li>When you are applying for a loan on our website, we are showing you only your Eligibility for the loan. So whatever details you enter on the website are accepted by software only, and that only shows your pre-approval and not your final approval. Approval only depends on your documents. We are not giving you any guarantee for that.</li>\r\n	<li>&nbsp;Details entered by the customer are accepted by the software and the system shows you the pre-approval depending on the customer details. The customer will get a card after completing the entire process of the loan on our website.</li>\r\n	<li>The company&#39;s privacy policy, terms and conditions are also applicable to marketing and advertising.</li>\r\n	<li>Marketing contains any advertisement, page update, post, video, SMS, E-mails, banners, social media updates or any type of content.</li>\r\n	<li>The customer&#39;s payment is executed by third-party payment sources. So whenever payment would be received by the company then only Package will be generated. If a customer&#39;s payment would be debited from his/her account but we don&#39;t receive any payment in the company&#39;s account then the company will not be responsible for that.</li>\r\n	<li>For any customer&#39;s payout, Account verification is compulsory. If your account is not verified in our company and once payment is credited from the company&#39;s account then the company is not responsible for entertaining any queries.</li>\r\n	<li>Our company is a private limited company and we are tied up with banks so we are providing loans through banks only.</li>\r\n	<li>Multiple banks&#39; logos are shown on our website only for our company&#39;s marketing purpose. That banks&#39; logos only show that our company is tied up with those banks. That&#39;s not any bank&#39;s advertisement.</li>\r\n	<li>If anyone takes any legal action against the company then only our legal advisor would be dealing with that and Surat, Gujarat will only remain the junction for any legal procedure. No one would be able to contact any employee or director of our company.</li>\r\n	<li>A vocal statement would not be acceptable. Only the signed agreements would be acceptable for any customer.</li>\r\n	<li>The detailed terms and conditions are with the head office which is the core baseline to all the above-stated terms and conditions.</li>\r\n	<li>There are no age eligibility criteria for buying a Plan. Banks and NBFCs have their age criteria which everyone has to follow.</li>\r\n	<li>For referral payout, the customer will have to complete the payout agreement with indcapital; without an agreement, no payout will be given to anyone.</li>\r\n</ol>\r\n\r\n<h3 dir=\"ltr\">GENERAL TERMS AND CONDITIONS:</h3>\r\n\r\n<ol dir=\"ltr\">\r\n	<li>If the login department fails to solve the customer queries with accuracy, dedication and responsibility, then the login department agency will be cancelled by the company.</li>\r\n	<li>The Customer&#39;s loan process will take more days due to any festival.</li>\r\n	<li>The Company&#39;s privacy policy, terms and conditions are also applicable to marketing and advertising.</li>\r\n	<li>If anyone has GST then they have to add the GST number in their portal. So Company will provide a GST RETURN to them.</li>\r\n	<li>The Company is using Blogs for their advertising, so that content could be of the third party, so the company doesn&#39;t take guarantee of the information to be correct or incorrect.</li>\r\n	<li>If the customer has any dispute or query regarding the company&#39;s policy, product or service, he/she will have to accept the company&#39;s stated solution only.</li>\r\n	<li>If customers, employees, any other person, or any other party has a problem with the company then they have to inform that problem to our company through notice; so, we can try to give you a solution of that but after that, any of them want to take a legal action then they have to inform the company through notice. Only then, the legal process will be started.</li>\r\n	<li>If customers, employees, any other person, any other third party has a problem with the company, then they have to accept the solutions provided by the company.</li>\r\n	<li>The Company can change terms and conditions at any time and the same would be effectively applied to all the departments.</li>\r\n	<li>&nbsp;If the customer has taken the services of the company, then the company will be able to use customer photos and names for Testimonials on any platform.</li>\r\n	<li>The documents, cheques, and OTP that the company&#39;s employee asks the customer is for the processing of the loan, the company is not responsible if any problems/disputes arise in the future.</li>\r\n	<li>During any process on the website, if there is any kind of mistake that happens due to the software or website technical problems, the final decision on such disputes can only be taken by the company and it has to be accepted by anyone concerned.</li>\r\n	<li>The Company&#39;s authorized person can change any rules and regulations at any time; the concerned person must be regularly updated with the company&rsquo;s terms and conditions and has to accept them unconditionally.</li>\r\n	<li>All the commitments made by the company&rsquo;s employees (any employee/person from the company), telecallers, or salespersons, etc. should be cross-checked by any concerned person (customer) from the Terms &amp; Conditions section of indcapital.in before availing any of the company&rsquo;s services. Only the rules and regulations stated on the company website will be considered official.</li>\r\n	<li>All the detailed criteria, terms, and information behind any of the company&rsquo;s concise promotional content (social media ads, banners, SMS, advertisements, emails, etc.) are stated in the Terms &amp; Conditions and Privacy Policy sections of the website. Any concerned person (customer, employee, etc.) must check and accept all the rules and regulations before availing any of the company&rsquo;s services.</li>\r\n	<li>If any Customer Referral&rsquo;s customer gets a refund (due to any dispute like payment gateway problem or any other issue) then the referral payout will not be provided (if provided, it would be deducted from the next payout of the customer referral).</li>\r\n	<li>While generating the payout for Customer Referrals, the company uses a third-party payment gateway. So, if the payout is stuck and put on hold due to any payment gateway issue (or any other issue), then the payout would be delayed and all the terms and conditions of the third-party payment gateway would be applied. In such cases, the payout will be released only when the third-party payment gateway releases the stuck payment. In case of a payout dispute with any bank, the bank&rsquo;s criteria will be applied and the payout will be released only when the bank approves the payment.</li>\r\n	<li>If there is any dispute that arises between any concerned user (customer, customer referral, etc.) and the company, their account will be disabled immediately by the company. In such a case, the user would be needed to contact the company for any query.</li>\r\n	<li>Though in the company&rsquo;s promotional content it might be communicated that a person can get a personal loan in just 30 minutes or a business loan in just 48 hours, the actual loan processing time depends on the rules and regulations of various banks (or the concerned bank). Every customer or any other user must accept this clause and consider the bank&rsquo;s loan processing time only.</li>\r\n	<li>The loan-related figures, rates, and information used in the promotional content of the company are general and for promotional purposes. The final nature and specifics of the loan in terms of the loan amount, interest rate, repayment tenure, loan processing fees, loan insurance, etc., depends solely on the customer profile and the rules and regulations stated by the concerned bank. The final loan details depend on the criteria set by the concerned bank(s).</li>\r\n	<li>indcapital&#39;s company name, logo, content, business concept, software and system, pattern, website structure and design, and business process and offers are copyrighted with the company. If any individual or organization uses/copy any of the above-mentioned by even 1%, legal action may be taken against them.</li>\r\n	<li>If any person (customer, employee, etc.) is involved in any of the company&#39;s processes then the company is authorized to record the phone calls with that person.</li>\r\n	<li>If any customer applies for a loan in our company and if any other external person/organization commits fraud with that customer in terms of taking money from you or in any other way then, it will not be the company&rsquo;s responsibility for any kind of loss faced by the customer.</li>\r\n	<li>As we provide digital services only, shipping policy or service is not applicable to our company and business.</li>\r\n	<li>Company&#39;s Register Name is GROWQUIK SERVICES PRIVATE LIMITED and Branding Name is indcapital.in</li>\r\n</ol>\r\n\r\n<h3 dir=\"ltr\">CANDIDATE TERMS AND CONDITIONS:</h3>\r\n\r\n<ol dir=\"ltr\">\r\n	<li>The interview time is fixed.</li>\r\n	<li>The interview can&#39;t be taken any other time than the time decided by the company.</li>\r\n	<li>The Company can ask any questions in the interview.</li>\r\n	<li>The candidate will have to appear for the interview as many times as the company asks.</li>\r\n	<li>A resume (Xerox) will be mandatory for the interview. The resume will not be returned. &nbsp;There will be no misuse of the resume.</li>\r\n</ol>\r\n\r\n<h3 dir=\"ltr\">USAGE OF COOKIES / COOKIES POLICY</h3>\r\n\r\n<p>Cookies are small files that a site or its service provider transfers to your computer&#39;s hard drive through your web browser with your permission which enables the site or service provider&#39;s systems to recognize your browser and capture and remember certain information. We use cookies to help us understand and save your preferences for future visits, keep track of advertisements and compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.</p>\r\n'),
(3, '2025-03-15 09:57:37', 'welcome-status', '0'),
(4, '2025-03-13 16:17:27', 'welcome-message', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Happy Dhuleti</p>\r\n\r\n<p>Hello, our Office will remain closed from 14/03/2025 due to Dhuleti. Resuming from 15/03/2025. Our Office Timing 10:00 AM to 5:00 PM<br />\r\nIndcapital<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n'),
(5, '2024-04-15 18:05:25', 'disclaimer', '<p>Indcapital and its customers and employees use and present www.indcapital.in (the &ldquo;Website&rdquo;) for personal and informational purposes only. In addition, we further expressly disclaim any warranties or representations (expressed or implied) in respect of quality, suitability, accuracy, reliability, completeness, timeliness, performance for a particular purpose or legality of the services listed or displayed or transacted or the content on the website. You must not perceive and construe any such information or other material as legal, tax, investment, financial, or other advice. You completely acknowledge and undertake that you are accessing the services on the Indcapital website and transacting at your own risk only and are using your best and prudent judgement before entering into and making any transactions through the website. You alone assume the sole responsibility of evaluating the merits and risks associated with the use of any information or other Content contained on the Indcapital Website before making any decisions based on such information or other Content.</p>\r\n\r\n<p>Nothing contained on our Website constitutes a solicitation, recommendation, endorsement, or offer by Indcapital to buy or sell any securities or other financial instruments in this or in any other jurisdiction in which such solicitation or offer would be unlawful under the securities laws of such jurisdiction. You further acknowledge that at no time shall any right, title or interest in the services sold through or displayed on the website vest with Indcapital nor shall Indcapital have any obligations or liabilities in respect of any transactions on the website.</p>\r\n\r\n<p>After you enter your details on our website for any purpose, the company takes no responsibility in case you come across instances of data misusage of any form.</p>\r\n'),
(6, '2024-11-20 16:27:53', 'facebookpixel', '515427487939179'),
(7, '2023-03-28 12:27:31', 'facebookdomain', 'w30u2e4cvkqdw1u1yihu7xjx6xvqrc'),
(8, '2025-03-15 10:03:53', 'account-msg-customer', '                                                                                                                                                     '),
(9, '2021-07-08 14:26:40', 'account-msg-channel', ''),
(10, '2025-05-22 14:49:06', 'newinvoiceno', '26355'),
(11, '2024-12-04 16:54:06', 'refund-policy', '<p>We&rsquo;re delighted to serve you!</p>\r\n\r\n<p>CANCELLATION &amp; REFUND POLICY</p>\r\n\r\n<p>Is the Plan fee refundable?</p>\r\n\r\n<p>A customer might get a refund of the Plan fee if the company hasn&rsquo;t started the &lsquo;Customer Service Initiation&rsquo; (explained below) within 48 hours of the payment and if payment was made by the customer by mistake and the customer raises a chargeback, we will give a refund to the customer a request for the same has been raised through https://indcapital.in/raise-request within 48 hours of the payment.</p>\r\n\r\n<p>What is meant by Customer Service Initiation?</p>\r\n\r\n<p>It is the first process done by the company that includes calling the customer for verification within 24-48 hours of the Plan payment. Even if the customer does not respond to the verification call, the Customer Service Initiation is considered as started and the update has been shown in the customer portal.</p>\r\n\r\n<p>Mode of Refund: Bank Transfer</p>\r\n\r\n<p>Refund Time: 5-7 working days</p>\r\n\r\n<p>RETURN POLICY</p>\r\n\r\n<p>Return policy is not applicable to our business as we&#39;re into providing digital services only.</p>\r\n\r\n<p>What if you have questions regarding this policy or loan process?</p>\r\n\r\n<p>You can contact us:</p>\r\n\r\n<p>By email: info@indcapital.in<br />\r\nBy call: +91-98730-80345</p>\r\n'),
(12, '2024-08-09 14:56:22', 'customer-legal-agreement', '<ol>\r\n	<li>The PLAN&nbsp;PAYMENT is refundable only as per the cancellation and refund policy.</li>\r\n	<li>The company only takes the cost of the Plan. No other tip of service is charged.</li>\r\n	<li>Buying a Plan&nbsp;lets you apply for a loan and it doesn&rsquo;t guarantee loan approval as the final loan approval depends on the banks and the customer profile. If the loan is rejected, you can still avail other benefits of the Plan.</li>\r\n	<li>If a customer is viewing any advertisement/promotional content of the company and then approaching the company thinking that he/she will get the loan approval based on the advertisement, then it must be noted that loan application will only be submitted once the customer buys Indcapital&rsquo;s Plan. Even after buying the Plan, the final loan approval depends on the bank(s) and customer profile. If the customer&rsquo;s profile doesn&rsquo;t match loan eligibility criteria, he/she won&rsquo;t be able to get a loan. Still, they can avail other benefits of the Plan.</li>\r\n	<li>The documents, cheques, and OTP that the company&#39;s employee asks the customer is for the processing of the loan, the company is not responsible if any problems/disputes arise in the future.</li>\r\n	<li>If you do not give an OTP to the company&#39;s employee for the loan process, then your file will be rejected. (According to the criteria, if your file matches without OTP, your loan will be processed).</li>\r\n	<li>If our company&#39;s executive asks you for any transaction OTP, do not provide that transaction OTP.</li>\r\n	<li>If a customer has any queries regarding the loan process then he/she would have to contact that department where their files are in process.</li>\r\n	<li>We will verify your documents in multiple banks; so whatever documents are submitted by customers in our company that will match with any bank criteria, in that bank only we will proceed with the loan process. (For example, if your file will match in 2 banks then our company&#39;s login department will log in your document only on that 2 banks. The verification is done by the company&#39;s employee. The company or bank will not give any proof for that.</li>\r\n	<li>The document will be verified by the company in multiple banks. If your documents match the criteria of the bank, then the login process will be done in that bank. If your documents do not match the criteria of a bank, the company will give you a solution. You can take the solution and reapply.</li>\r\n	<li>It is not fixed that the customer file will be logged in only certain banks. It may be verified in other banks also, depending on the customer file.</li>\r\n	<li>Our company is not taking extra charges other than Plan&nbsp;charges. If any third-party charges you then our company is not responsible for that.</li>\r\n	<li>There are no processing or file charges for customer loan approval. There is only one charge and that&#39;s only for the Plan&nbsp;- spanning for a lifetime.</li>\r\n	<li>If a customer file is logged in uncoded banks, then the customer has to pay charges separately.</li>\r\n	<li>Our company will log in customer files as per their requirements. (Example: If customer requirement is INR 1 lakh and if some bank criteria are up to INR 50,000 then we will not log in their file in that bank.</li>\r\n	<li>If the customer explains to us their profile and questions us whether the loan will be approved or not, to answer that, the loan approval estimated ratio is 60% and 40% means 60% chances of approval and 40% chances of rejection. So, If your file gets rejected in our company then the customer shouldn&#39;t argue for that. Because the company is not taking any guarantee for the loan.</li>\r\n	<li>Once the customer file is rejected in our company then any bank can reopen that file for processing. But code activation time is dependent on various banks, ranging from 3 to 4 months. If approval will come from that bank within that code activation time then only company reference would be applicable. So, the customer would not have any doubt that the loan has been taken from his/her own or someone else&#39;s reference. After a code deactivation, if the loan is approved by that bank then there is no responsibility of our company.</li>\r\n	<li>Wherever the customer file is logged in by the company, these details will not be given to any customer in written or digital form.</li>\r\n	<li>Whatever documents submitted by the customer are secure in our company. We are using those documents only for loan purposes. If documents are misused by any other sources, then the company will not be responsible for that.</li>\r\n	<li>Loan offers and pre-approval loans process depends only on the bank&#39;s rules and that type of loan will be given only on customer behaviour. So, there is so much difference between that type of process and the company&#39;s process. If that loan is approved by another company then the customer can&#39;t blame our company.</li>\r\n	<li>Loan approval depends on your profile so if your documents are perfect then you will get a loan from our company.</li>\r\n	<li>The loan information is only given to that person who has applied for the loan.</li>\r\n	<li>During the loan processing time, if any customer would not be in contact with us for 3 days, then that file will be rejected by our company.</li>\r\n	<li>If your file is rejected in our company, then the customer has to make sure that they have to re-submit their documents with the solution in our company after 6 months.</li>\r\n	<li>The company is not responsible if the customer loan is rejected by queries.</li>\r\n	<li>If the customer will apply for the first time but his/her loan is rejected in our company then the company will give them reason and solution for that. So at re-applying time if the customer will not re-submit a file with a solution then the file will be again rejected in our company for the same reason.</li>\r\n	<li>The company will provide only the reason for rejection to the customer and it would not be provided in the form of hard or soft copy. Some banks only provide general reasons, they don&#39;t give us any specific reason so the customer should not complain about that.</li>\r\n	<li>The customer has to give correct information about their CIBIL SCORE and PROFILE. If the customer gives wrong information, then the company will not be responsible for loan rejection.</li>\r\n	<li>The company will not be providing any CIBIL REPORT or VALUATION REPORT in digital or hard copy to any customer in any situation.</li>\r\n	<li>Bank charges are applicable as per banks rules and regulations.</li>\r\n	<li>The company will take legal action against the customer who submitted fake documents.</li>\r\n	<li>After logging in your file, the customer has to contact only the login department, not any telecaller or other department.</li>\r\n	<li>The person who has already applied for a loan in the same bank, then our company will not apply in that bank.</li>\r\n	<li>During the loan process if the rules of any bank change, then we have to follow those new rules.</li>\r\n	<li>The person who needs a loan only has to apply for the loan process.</li>\r\n	<li>The customer has to give their registered phone number for being contacted by the login department.</li>\r\n	<li>After completing the loan process, the customer has to cancel their cheque by visiting the concerned bank only.</li>\r\n	<li>During the loan processing time, if the company gets any queries and it is not solving that in the given time, then the company can take more time for that. So, the customer must not complain about the same.</li>\r\n	<li>If the customer wants to reapply in our company after file rejection or approval, then he/she has to re-submit their documents in the customer login menu.</li>\r\n	<li>When you are applying for a loan on our website, we are showing you only your Eligibility for the loan. So whatever details you enter on the website are accepted by software only, and that only shows your pre-approval and not your final approval. Approval only depends on your documents. We are not giving you any guarantee for that.</li>\r\n	<li>&nbsp;Details entered by the customer are accepted by the software and the system shows you the pre-approval depending on the customer details. The customer will get a card after completing the entire process of the loan on our website.</li>\r\n	<li>The company&#39;s privacy policy, terms and conditions are also applicable to marketing and advertising.</li>\r\n	<li>Marketing contains any advertisement, page update, post, video, SMS, E-mails, banners, social media updates or any type of content.</li>\r\n	<li>The customer&#39;s payment is executed by third-party payment sources. So whenever payment would be received by the company then only Package will be generated. If a customer&#39;s payment would be debited from his/her account but we don&#39;t receive any payment in the company&#39;s account then the company will not be responsible for that.</li>\r\n	<li>For any customer&#39;s payout, Account verification is compulsory. If your account is not verified in our company and once payment is credited from the company&#39;s account then the company is not responsible for entertaining any queries.</li>\r\n	<li>Our company is a private limited company and we are tied up with banks so we are providing loans through banks only.</li>\r\n	<li>Multiple banks&#39; logos are shown on our website only for our company&#39;s marketing purpose. That banks&#39; logos only show that our company is tied up with those banks. That&#39;s not any bank&#39;s advertisement.</li>\r\n	<li>If anyone takes any legal action against the company then only our legal advisor would be dealing with that and Surat, Gujarat will only remain the junction for any legal procedure. No one would be able to contact any employee or director of our company.</li>\r\n	<li>A vocal statement would not be acceptable. Only the signed agreements would be acceptable for any customer.</li>\r\n	<li>The detailed terms and conditions are with the head office which is the core baseline to all the above-stated terms and conditions.</li>\r\n	<li>There are no age eligibility criteria for buying a Plan. Banks and NBFCs have their age criteria which everyone has to follow.</li>\r\n	<li>For referral payout, the customer will have to complete the payout agreement with Indcapital; without an agreement, no payout will be given to anyone.</li>\r\n</ol>\r\n'),
(13, '2025-03-29 16:45:14', 'pl-remarketing-sms', 'Good news!\r\n<#cronamount> loan is ready to be credited to your account, Low interest.\r\nCheck eligibility https://indcapital.in/digital/personalLoan\r\n\r\n\r\n'),
(14, '2025-02-20 12:18:52', 'bl-remarketing-sms', 'Instant Loan of Rs. 25,000 to Rs. <#cronamount> in 5 Minutes!\r\nInstant Eligibility Check, lower ROI!\r\nGet Your Loan Offer - https://indcapital.in/digital/personalLoan\r\n\r\n\r\n'),
(15, '2025-03-29 16:46:15', 'pl-offer-sms', 'Congrats User, Rs. <#preamount> personal loan is ready to be credited to your Bank A/C. Check your eligibility https://indcapital.in/digital/personalLoan\r\n'),
(16, '2025-02-20 12:16:21', 'bl-offer-sms', 'Your loan Rs. <#preamount> is soft approved! Enjoy low interest rates & no paperwork. Finalize your application. \r\nhttps://indcapital.in/digital/personalLoan\r\n'),
(17, '2024-10-16 12:01:01', 'account-sms', 'Dear Customer, Congratulations! Your loan application has been successfully submitted. Please check your registered email id and login to the Customer Portal to submit the required documents.\r\nThanks,\r\nINDcapital\r\n'),
(18, '2025-05-10 16:23:56', 'smssenderid', 'INDCTL'),
(19, '2024-11-20 16:27:37', 'fbeventid', '512994361551551'),
(20, '2024-07-31 14:59:35', 'fbeventname', 'Purchase'),
(21, '2024-11-20 16:28:20', 'fbaccesstoken', 'EAAPtv2h3PqIBOxdzmCKU35s8wsr5omfLqV5xKdNQSGWR0La6Xa0kNgoEzL6Krv8WF1g6HCiBoujzXsi4EknykW3ZAiAVRZBZBmmEoesTnfuZAJef4MLZBAkYDGL99H1jL29skCPojOzVPHX54JQSK7qh3Cawj8xYgwHEFXI7Ibo6AsfpGSQmrbvTLyjtpddx5bgZDZD'),
(23, '2025-01-29 11:43:26', 'wpcampaignoffer', '#'),
(24, '2025-01-03 14:58:07', 'wpcampaignsuccess', '#'),
(25, '2025-05-10 10:36:28', 'wpcampaignmain', 'pl_10may_auto'),
(26, '2024-10-16 13:12:57', 'digital-payment-fail', 'Sorry, your payment for Indcapital subscription was not successful. Try Another Payment Method here  https://kbzp.in/lNDCPT/bmxtv INDcapital'),
(27, '2025-01-28 16:49:59', 'pl-process-sms', ''),
(28, '2025-01-28 16:50:13', 'bl-process-sms', '\r\n\r\n'),
(29, '2025-04-15 15:19:21', 'aisency_userwelcomename', 'cred_27aug');
INSERT INTO `site_options` (`id`, `rec_date`, `option_key`, `option_value`) VALUES
(30, '2024-12-18 10:12:50', 'business-payment-fail', 'Sorry, your payment for Indcapital subscription was not successful. Try Another Payment Method here https://indcapital.in/bumperoffer INDcapital\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `sms_log`
--

CREATE TABLE `sms_log` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `crontype` varchar(50) NOT NULL DEFAULT 'company',
  `parentid` int(11) NOT NULL DEFAULT 1,
  `cronname` varchar(256) NOT NULL,
  `msgcount` int(11) NOT NULL,
  `msgresponse` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subpaisa_entry`
--

CREATE TABLE `subpaisa_entry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `entryfor` int(2) NOT NULL DEFAULT 0 COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_query`
--

CREATE TABLE `support_query` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL,
  `ticketnumber` varchar(50) NOT NULL,
  `usertype` tinyint(2) NOT NULL COMMENT '1=CUSTOMER, 0=GUEST',
  `fullname` varchar(256) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cardno` varchar(50) DEFAULT NULL,
  `issuetype` varchar(100) DEFAULT NULL,
  `message` varchar(256) NOT NULL,
  `server_ip` varchar(256) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `isDelete` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_query_chat`
--

CREATE TABLE `support_query_chat` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `requestid` int(11) NOT NULL,
  `remarks` longtext NOT NULL,
  `staffid` int(11) NOT NULL,
  `isDelete` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `reviewpage` int(2) NOT NULL DEFAULT 1 COMMENT '1=Site,2=Customer, 3=Partner',
  `fullname` varchar(256) NOT NULL,
  `ratings` float(11,2) NOT NULL DEFAULT 0.00,
  `photo` varchar(256) NOT NULL DEFAULT 'placeholder.jpg',
  `reviews` longtext NOT NULL,
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `rec_date`, `reviewpage`, `fullname`, `ratings`, `photo`, `reviews`, `isDelete`) VALUES
(1, '2021-07-07 12:01:12', 1, 'Akash Dubey', 4.00, 'placeholder.jpg', 'I had a great experience with Indcapital. And the team was a huge help in my whole loan process.\nThey are incredible, prompt, and very efficient. I highly recommend them to everyone who is looking\nfor a loan.', 0),
(2, '2021-07-07 12:10:49', 1, 'Manish Sahoo', 4.50, 'placeholder.jpg', 'I can’t say thank you enough to Indcapital and the team for how they have helped me to process my\nloan. Their professionalism and promptness have made everything go so well. 100% recommended!', 0),
(3, '2021-07-07 12:11:24', 1, 'Pranav Dagar', 5.00, 'placeholder.jpg', 'I had the amazing pleasure of dealing with Indcapital. The process is completely online, but it&#39;s not at\nall complicated. It&#39;s very quick too. I would strongly recommend them.', 0),
(4, '2021-07-07 12:12:55', 1, 'Prateek Shah', 3.50, 'placeholder.jpg', 'Indcapital is a shining example of outstanding customer service. They made my entire process very\nquick and stress-free. They went above and beyond to assist me. I wouldn&#39;t hesitate even a bit to\nrecommend them to everyone who is looking for a loan.', 0),
(5, '2021-07-07 12:14:38', 1, 'Haqim Khan', 5.00, 'placeholder.jpg', 'My personal loan experience was very good. I had absolutely no problems in availing the service. The company is very cooperative!', 1),
(6, '2021-07-07 12:16:08', 1, 'Hukum Khan', 5.00, 'placeholder.jpg', 'They follow up with customer. I had nothing to worry when taking personal loan. Website is easy and they guide me with loan process. Very great customer service.', 1),
(7, '2021-07-07 12:17:48', 1, 'Lalsingh', 5.00, 'placeholder.jpg', 'Indcapital gave me quick response to query. That was best part of the call. They understood what I wanted and provide me with good service.', 1),
(8, '2021-07-09 11:29:49', 2, 'Sapna Dasharathi', 4.50, 'placeholder.jpg', 'They have a long way to go in this market. They take some time to complete your application and also the support team can take a bit time but they are good and get you best deal in the market.', 0),
(9, '2021-07-09 11:30:43', 2, 'Mahi Manohari', 5.00, 'placeholder.jpg', 'Thank you for instant loan for being supportive in pandemic situation. I would definitely recommend Indcapital.', 0),
(10, '2021-07-09 11:31:48', 2, 'Vijay Pathak', 4.50, 'placeholder.jpg', 'The loan process is very easy and support team is responding on time for issues. Thanks for support.', 0),
(11, '2021-07-09 11:32:21', 2, 'Debanjan Mukherjee', 4.00, 'placeholder.jpg', 'I have had a very good experience with Indcapital where in it gives you good tenure to payback and with less processing fee I strongly suggest Indcapital from my end.', 0),
(12, '2021-07-09 11:33:00', 2, 'Kunal Gohokar', 5.00, 'placeholder.jpg', 'Very quick response and got the loan amount in next 5 days which is very quick. Everything is very systemic followed love the way they do it.', 0),
(13, '2021-07-09 11:33:39', 2, 'Irfan Shaikh', 4.00, 'placeholder.jpg', 'Very Good Experience with Indcapital. Very fast processing and very good cooperation customer support representative.', 0),
(14, '2021-07-09 11:34:14', 2, 'Atish Jamdade', 4.50, 'placeholder.jpg', 'The way the customer support personally handle the issues is wonderful and praise worthy. One can be ensured of customised decisions and resolutions regarding the loan you apply for. The firm is customer-friendly and not just profit-minded.', 0),
(15, '2021-07-09 11:34:40', 2, 'Shabana Begum', 4.50, 'placeholder.jpg', 'Having a great experience with it. It would be much helpfull If the credit amount get increase in repayment of previous loans.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_application`
--

CREATE TABLE `user_application` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL,
  `loantype` int(11) NOT NULL,
  `loanamount` bigint(20) NOT NULL,
  `cibilscore` varchar(256) NOT NULL,
  `loanpurpose` varchar(256) NOT NULL,
  `income` bigint(20) NOT NULL,
  `currentemi` int(11) NOT NULL,
  `emibounce` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `loantenure` int(11) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1 COMMENT '1=New, 2=Approve, 3=Reject',
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_application_status`
--

CREATE TABLE `user_application_status` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `applicationid` int(11) NOT NULL,
  `statusid` int(11) NOT NULL,
  `statusdate` date DEFAULT NULL,
  `bankid` int(11) NOT NULL,
  `loanamount` int(11) NOT NULL,
  `loanroi` varchar(256) NOT NULL,
  `loanterms` varchar(256) NOT NULL,
  `processfees` int(11) NOT NULL,
  `insurance` varchar(256) NOT NULL,
  `monthlyemi` int(11) NOT NULL,
  `remarks` longtext NOT NULL,
  `sanction_letter` longtext NOT NULL,
  `staffid` int(11) NOT NULL,
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE `user_documents` (
  `id` int(11) NOT NULL,
  `rec_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL,
  `profilephoto` varchar(256) DEFAULT NULL,
  `aadharcard` varchar(256) DEFAULT NULL,
  `aadharcard_number` varchar(256) DEFAULT NULL,
  `pancard` varchar(256) DEFAULT NULL,
  `pancard_number` varchar(256) DEFAULT NULL,
  `cancelcheque` varchar(256) DEFAULT NULL,
  `lightbill` varchar(256) DEFAULT NULL,
  `bankstatement` varchar(256) DEFAULT NULL,
  `formsixteen` varchar(256) DEFAULT NULL,
  `salaryslip` varchar(256) DEFAULT NULL,
  `businessproof` varchar(256) DEFAULT NULL,
  `itreturn` varchar(256) DEFAULT NULL,
  `remarks` varchar(256) NOT NULL,
  `isVerified` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp(),
  `fullname` varchar(256) NOT NULL DEFAULT 'noname',
  `mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(256) DEFAULT NULL,
  `usertype` int(2) NOT NULL,
  `cardtype` int(11) DEFAULT NULL COMMENT '11=Premium, 12=Platinum',
  `refcode` varchar(50) DEFAULT NULL,
  `gstno` varchar(256) DEFAULT NULL,
  `process_step` int(2) NOT NULL DEFAULT 1,
  `isUser` int(2) NOT NULL DEFAULT 0 COMMENT '0=None, 1=Steps, 2=Register',
  `iAgree` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isDnd` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isActive` int(2) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `isDelete` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tree`
--

CREATE TABLE `user_tree` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `refferaltype` int(2) NOT NULL DEFAULT 1 COMMENT '1=Customer, 2=Channel',
  `refferaluserid` int(11) NOT NULL,
  `subuserid` int(11) NOT NULL,
  `payout` int(2) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `payout_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worldline_entry`
--

CREATE TABLE `worldline_entry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `entryfor` int(2) NOT NULL DEFAULT 0 COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zaakpay_entry`
--

CREATE TABLE `zaakpay_entry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `entryfor` int(2) NOT NULL DEFAULT 0 COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `statuscode` varchar(256) DEFAULT NULL,
  `transactionid` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administration_log`
--
ALTER TABLE `administration_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adsdata`
--
ALTER TABLE `adsdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allremarks`
--
ALTER TABLE `allremarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankapplylink`
--
ALTER TABLE `bankapplylink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulksms`
--
ALTER TABLE `bulksms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardoffer_order`
--
ALTER TABLE `cardoffer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_enquiry`
--
ALTER TABLE `career_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_opening`
--
ALTER TABLE `career_opening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashfree_entry`
--
ALTER TABLE `cashfree_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_log`
--
ALTER TABLE `customer_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `important_update`
--
ALTER TABLE `important_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jiopay_entry`
--
ALTER TABLE `jiopay_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanlist`
--
ALTER TABLE `loanlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanstatus`
--
ALTER TABLE `loanstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanstatus_remarks`
--
ALTER TABLE `loanstatus_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_order`
--
ALTER TABLE `membership_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_keywords`
--
ALTER TABLE `meta_keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribe`
--
ALTER TABLE `newsletter_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `openmoney_entry`
--
ALTER TABLE `openmoney_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otpverification`
--
ALTER TABLE `otpverification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paygic_entry`
--
ALTER TABLE `paygic_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paytm_entry`
--
ALTER TABLE `paytm_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phonepe_entry`
--
ALTER TABLE `phonepe_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `razorpay_entry`
--
ALTER TABLE `razorpay_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roipackages`
--
ALTER TABLE `roipackages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_options`
--
ALTER TABLE `site_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_log`
--
ALTER TABLE `sms_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subpaisa_entry`
--
ALTER TABLE `subpaisa_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_query`
--
ALTER TABLE `support_query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_query_chat`
--
ALTER TABLE `support_query_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_application`
--
ALTER TABLE `user_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_application_status`
--
ALTER TABLE `user_application_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tree`
--
ALTER TABLE `user_tree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worldline_entry`
--
ALTER TABLE `worldline_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zaakpay_entry`
--
ALTER TABLE `zaakpay_entry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `administration_log`
--
ALTER TABLE `administration_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adsdata`
--
ALTER TABLE `adsdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allremarks`
--
ALTER TABLE `allremarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bankapplylink`
--
ALTER TABLE `bankapplylink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `bulksms`
--
ALTER TABLE `bulksms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cardoffer_order`
--
ALTER TABLE `cardoffer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `career_enquiry`
--
ALTER TABLE `career_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `career_opening`
--
ALTER TABLE `career_opening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashfree_entry`
--
ALTER TABLE `cashfree_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_log`
--
ALTER TABLE `customer_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `important_update`
--
ALTER TABLE `important_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jiopay_entry`
--
ALTER TABLE `jiopay_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loanlist`
--
ALTER TABLE `loanlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `loanstatus`
--
ALTER TABLE `loanstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loanstatus_remarks`
--
ALTER TABLE `loanstatus_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `membership_order`
--
ALTER TABLE `membership_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meta_keywords`
--
ALTER TABLE `meta_keywords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `newsletter_subscribe`
--
ALTER TABLE `newsletter_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `openmoney_entry`
--
ALTER TABLE `openmoney_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otpverification`
--
ALTER TABLE `otpverification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paygic_entry`
--
ALTER TABLE `paygic_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paytm_entry`
--
ALTER TABLE `paytm_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phonepe_entry`
--
ALTER TABLE `phonepe_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `razorpay_entry`
--
ALTER TABLE `razorpay_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roipackages`
--
ALTER TABLE `roipackages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `site_options`
--
ALTER TABLE `site_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sms_log`
--
ALTER TABLE `sms_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subpaisa_entry`
--
ALTER TABLE `subpaisa_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_query`
--
ALTER TABLE `support_query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_query_chat`
--
ALTER TABLE `support_query_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_application`
--
ALTER TABLE `user_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_application_status`
--
ALTER TABLE `user_application_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tree`
--
ALTER TABLE `user_tree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `worldline_entry`
--
ALTER TABLE `worldline_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zaakpay_entry`
--
ALTER TABLE `zaakpay_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
