-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2017 at 11:57 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `admin_demoweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `mlm_account`
--

CREATE TABLE IF NOT EXISTS `mlm_account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_team` varchar(10) NOT NULL,
  `account_level` int(11) NOT NULL,
  `account_code` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `account_upline_id` int(11) NOT NULL,
  `account_adviser_id` int(11) NOT NULL,
  `bookbank_id` int(11) NOT NULL,
  `account_status` int(11) NOT NULL DEFAULT '1',
  `account_class_id` int(1) NOT NULL DEFAULT '1',
  `account_class_round` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `mlm_account`
--

INSERT INTO `mlm_account` (`account_id`, `account_team`, `account_level`, `account_code`, `member_id`, `account_upline_id`, `account_adviser_id`, `bookbank_id`, `account_status`, `account_class_id`, `account_class_round`) VALUES
(1, 'N', 1, 1, 1, 0, 0, 0, 1, 1, 0),
(2, 'N', 2, 2, 1, 1, 1, 0, 1, 1, 0),
(3, 'N', 2, 3, 1, 1, 1, 0, 1, 1, 0),
(4, 'N', 2, 4, 1, 1, 1, 0, 1, 1, 0),
(5, 'A', 3, 1, 1, 2, 1, 0, 1, 1, 0),
(6, 'B', 3, 1, 1, 2, 1, 0, 1, 1, 0),
(7, 'C', 3, 1, 1, 2, 1, 0, 1, 1, 0),
(8, 'D', 3, 1, 1, 3, 1, 0, 1, 1, 0),
(9, 'E', 3, 1, 1, 3, 1, 0, 1, 1, 0),
(10, 'F', 3, 1, 1, 3, 1, 0, 1, 1, 0),
(11, 'G', 3, 1, 1, 4, 1, 0, 1, 1, 0),
(12, 'H', 3, 1, 1, 4, 1, 0, 1, 1, 0),
(13, 'I', 3, 1, 1, 4, 1, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_accounting`
--

CREATE TABLE IF NOT EXISTS `mlm_accounting` (
  `accounting_id` int(11) NOT NULL AUTO_INCREMENT,
  `accounting_date` date NOT NULL,
  `accounting_no` varchar(100) NOT NULL,
  `accounting_source_id` int(11) NOT NULL COMMENT 'id ในรายการที่ต้องเปลี่ยนสถานะ',
  `accounting_tax` int(11) NOT NULL,
  `accounting_status` int(11) NOT NULL DEFAULT '0',
  `journals_id` int(11) NOT NULL,
  `accounting_note` varchar(100) NOT NULL,
  PRIMARY KEY (`accounting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `mlm_accounting`
--

INSERT INTO `mlm_accounting` (`accounting_id`, `accounting_date`, `accounting_no`, `accounting_source_id`, `accounting_tax`, `accounting_status`, `journals_id`, `accounting_note`) VALUES
(1, '2017-02-21', 'IN00001', 1, 0, 1, 2, 'ฟรีค่าธรรมเนียม บัญชีนักธุระกิจใหม่'),
(2, '2017-02-21', 'IN00002', 2, 0, 1, 2, 'ฟรีค่าธรรมเนียม บัญชีนักธุระกิจใหม่'),
(3, '2017-02-21', 'IN00003', 3, 0, 1, 2, 'ฟรีค่าธรรมเนียม บัญชีนักธุระกิจใหม่'),
(4, '2017-02-21', 'DR065120475100', 1, 0, 2, 4, 'ค่าการตลาด ตามแผน'),
(5, '2017-02-21', 'IN00004', 4, 0, 1, 2, 'ฟรีค่าธรรมเนียม บัญชีนักธุระกิจใหม่'),
(6, '2017-02-21', 'IN00005', 5, 0, 1, 2, 'ฟรีค่าธรรมเนียม บัญชีนักธุระกิจใหม่'),
(7, '2017-02-21', 'IN00006', 6, 0, 1, 2, 'ฟรีค่าธรรมเนียม บัญชีนักธุระกิจใหม่'),
(8, '2017-02-21', 'DR065128833900', 2, 0, 2, 3, 'ค่าการตลาด ผู้แนะนำ'),
(9, '2017-02-21', 'DR065128883700', 3, 0, 2, 3, 'ค่าการตลาด ผู้แนะนำ'),
(10, '2017-02-21', 'DR065128942500', 4, 0, 2, 3, 'ค่าการตลาด ผู้แนะนำ'),
(11, '2017-02-21', 'DR065128992300', 5, 0, 2, 4, 'ค่าการตลาด ตามแผน'),
(12, '2017-02-21', 'IN00007', 7, 0, 1, 2, 'ฟรีค่าธรรมเนียม บัญชีนักธุระกิจใหม่'),
(13, '2017-02-21', 'IN00008', 8, 0, 1, 2, 'ฟรีค่าธรรมเนียม บัญชีนักธุระกิจใหม่'),
(14, '2017-02-21', 'IN00009', 9, 0, 1, 2, 'ฟรีค่าธรรมเนียม บัญชีนักธุระกิจใหม่'),
(15, '2017-02-21', 'DR065139097400', 6, 0, 2, 3, 'ค่าการตลาด ผู้แนะนำ'),
(16, '2017-02-21', 'DR065139143800', 7, 0, 2, 3, 'ค่าการตลาด ผู้แนะนำ'),
(17, '2017-02-21', 'DR065139223000', 8, 0, 2, 3, 'ค่าการตลาด ผู้แนะนำ'),
(18, '2017-02-21', 'DR065139301700', 9, 0, 2, 4, 'ค่าการตลาด ตามแผน'),
(19, '2017-02-21', 'IN00010', 10, 0, 1, 2, 'ฟรีค่าธรรมเนียม บัญชีนักธุระกิจใหม่'),
(20, '2017-02-21', 'IN00011', 11, 0, 1, 2, 'ฟรีค่าธรรมเนียม บัญชีนักธุระกิจใหม่'),
(21, '2017-02-21', 'IN00012', 12, 0, 1, 2, 'ฟรีค่าธรรมเนียม บัญชีนักธุระกิจใหม่'),
(22, '2017-02-21', 'DR065148793800', 10, 0, 2, 3, 'ค่าการตลาด ผู้แนะนำ'),
(23, '2017-02-21', 'DR065148843900', 11, 0, 2, 3, 'ค่าการตลาด ผู้แนะนำ'),
(24, '2017-02-21', 'DR065148893900', 12, 0, 2, 3, 'ค่าการตลาด ผู้แนะนำ'),
(25, '2017-02-21', 'DR065148944400', 13, 0, 2, 4, 'ค่าการตลาด ตามแผน'),
(26, '2017-02-21', 'DR065148993800', 14, 0, 2, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_account_class`
--

CREATE TABLE IF NOT EXISTS `mlm_account_class` (
  `account_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_class` varchar(100) NOT NULL,
  `account_class_pv` int(11) NOT NULL,
  `account_class_max_row` int(11) NOT NULL,
  PRIMARY KEY (`account_class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mlm_account_class`
--

INSERT INTO `mlm_account_class` (`account_class_id`, `account_class`, `account_class_pv`, `account_class_max_row`) VALUES
(1, 'NORMAL', 0, 243),
(2, 'GENERAL', 4000, 243),
(3, 'BRONZ', 8000, 729),
(4, 'SILVER', 20000, 2187),
(5, 'GOLD', 40000, 6561),
(6, 'DIAMOND', 120000, 19683),
(7, 'STAR', 400000, 59049);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_account_repeat`
--

CREATE TABLE IF NOT EXISTS `mlm_account_repeat` (
  `account_repeat_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_repeat_date` date NOT NULL,
  `account_repeat_class` int(11) NOT NULL,
  `account_repeat_round` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  PRIMARY KEY (`account_repeat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_admin`
--

CREATE TABLE IF NOT EXISTS `mlm_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_type` int(11) NOT NULL COMMENT '1=Super Admin 2= Team Admin',
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_team` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mlm_admin`
--

INSERT INTO `mlm_admin` (`admin_id`, `admin_type`, `admin_username`, `admin_password`, `admin_team`) VALUES
(1, 1, 'SuperAdmins', 'MTIzNDU2Nzg5MA==', 'SuperAdmin'),
(2, 2, 'AdminTeamA', 'MTEx', 'A'),
(3, 2, 'AdminTeamB', '77+9be+/vQ==', 'B'),
(4, 2, 'AdminTeamC', '77+9be+/vQ==', 'C'),
(5, 2, 'AdminTeamD', '77+9be+/vQ==', 'D'),
(6, 2, 'AdminTeamE', '77+9be+/vQ==', 'E'),
(7, 2, 'AdminTeamF', '77+9be+/vQ==', 'F'),
(8, 2, 'AdminTeamG', '77+9be+/vQ==', 'G'),
(9, 2, 'AdminTeamH', '77+9be+/vQ==', 'H'),
(10, 2, 'AdminTeamI', '77+9be+/vQ==', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_bank`
--

CREATE TABLE IF NOT EXISTS `mlm_bank` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(200) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `mlm_bank`
--

INSERT INTO `mlm_bank` (`bank_id`, `bank_name`) VALUES
(1, 'ธนาคารกรุงเทพ'),
(2, 'ธนาคารกรุงศรีอยุธยา'),
(3, 'ธนาคารกสิกรไทย'),
(4, 'ธนาคารเกียรตินาคิน'),
(5, 'ธนาคารซีไอเอ็มบีไทย'),
(6, 'ธนาคารทหารไทย'),
(7, 'ธนาคารทิสโก้'),
(8, 'ธนาคารไทยพาณิชย์'),
(9, 'ธนาคารไทยเครดิตเพื่อรายย่อย'),
(10, 'ธนาคารธนชาต'),
(11, 'ธนาคารยูโอบี'),
(12, 'ธนาคารสแตนดาร์ดชาร์เตอร์ด (ไทย)'),
(13, 'ธนาคารกรุงไทย'),
(14, 'ธนาคารพัฒนาวิสาหกิจขนาดกลางและขนาดย่อมแห่งประเทศไทย'),
(15, 'ธนาคารเพื่อการเกษตรและสหกรณ์การเกษตร'),
(16, 'ธนาคารเพื่อการส่งออกและนำเข้าแห่งประเทศไทย'),
(17, 'ธนาคารออมสิน'),
(18, 'ธนาคารอาคารสงเคราะห์'),
(19, 'ธนาคารอิสลามแห่งประเทศไทย');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_bookbank`
--

CREATE TABLE IF NOT EXISTS `mlm_bookbank` (
  `bookbank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) NOT NULL,
  `bookbank_account` varchar(100) NOT NULL,
  `bookbank_number` varchar(100) NOT NULL,
  `bookbank_bank_branch` varchar(200) NOT NULL,
  `bookbank_status` int(11) NOT NULL DEFAULT '1',
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`bookbank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `mlm_bookbank`
--

INSERT INTO `mlm_bookbank` (`bookbank_id`, `bank_id`, `bookbank_account`, `bookbank_number`, `bookbank_bank_branch`, `bookbank_status`, `member_id`) VALUES
(20, 1, 'สมมุติ', '00000', 'สมมุติ', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_config`
--

CREATE TABLE IF NOT EXISTS `mlm_config` (
  `mlm_config_id` int(11) NOT NULL AUTO_INCREMENT,
  `mlm_config_logo` varchar(200) NOT NULL,
  `mlm_config_email` varchar(200) NOT NULL,
  `mlm_config_tel` varchar(20) NOT NULL,
  `mlm_config_name` varchar(500) NOT NULL,
  `mlm_config_detail` varchar(5000) NOT NULL,
  `mlm_config_address` varchar(1000) NOT NULL,
  `shop_config` varchar(500) NOT NULL,
  `mlm_config_bg` varchar(200) NOT NULL,
  PRIMARY KEY (`mlm_config_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mlm_config`
--

INSERT INTO `mlm_config` (`mlm_config_id`, `mlm_config_logo`, `mlm_config_email`, `mlm_config_tel`, `mlm_config_name`, `mlm_config_detail`, `mlm_config_address`, `shop_config`, `mlm_config_bg`) VALUES
(1, 'logo.png', 'yaimanthai@yahoo.com', '099 462 5955', 'นว ดรากอน เวลท์ เน็ตเวิร์ค', '<p>กรมพัฒนาธุรกิจการค้า ได้ออกใบสำคัญตาม พรบ.ทะเบียนพาณิชย์ พ.ศ. 2499 ให้ภาคอีสานพืชผล ใช้สื่ออีเล็คทรอนิกส์ผ่านระบบเครือข่ายอินเตอร์เน็ต ในการเป็นตัวแทนจำหน่าย อาหารเสริมพืช ปุ๋ยและเคมีภัณฑ์ทางการเกษตร พืชผลทางการเกษตร เครื่องมืออิเลคทรอนิกส์ วัตถุมงคล และสินค้าเบ็ดเตล็ด ซึ่งปัจจุบัน จดทะเบียนเป็น บริษัท นว ดรากอน เวลท์ เน็ตเวิร์ค จำกัด : NAVA DRAGON WEALTH NETWORK COMPANY LIMITED.<br />\nเรายินดีทำข้อตกลงให้แก่บุคคลทั่วไป เข้าเป็นสมาชิกของ ภาคอีสานพืชผล เพื่อแนะนำผลิตภัณฑ์ และรับค่าสินน้ำใจ เมื่อมีสมาชิกเพิ่มเข้ามาสั่งจอง หรือซื้อสินค้า และยินดีให้คำแนะนำทางธุรกิจ เพื่อเสริมสร้างรายได้แก่สมาชิก<br />\nWe encourage our guests to access the opportunities created by a low investment, less work.But getting a greater return<br />\nFacebook facebook.com/NAVA DRAGON WEALTH NETWORK</p>\n', 'บ้านเลขที่ 132/2 หมู่บ้านบะขาม หมู่ที่ 4 ซอยชาตะผดุง 7 ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000', '<p>ส่วนท้ายของใบเสร็จ ทดสอบ</p>\n', 'bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_downline_count`
--

CREATE TABLE IF NOT EXISTS `mlm_downline_count` (
  `downline_count_id` int(11) NOT NULL AUTO_INCREMENT,
  `downline_count_upline_id` int(11) NOT NULL,
  `downline_count_downline_id` int(11) NOT NULL,
  PRIMARY KEY (`downline_count_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `mlm_downline_count`
--

INSERT INTO `mlm_downline_count` (`downline_count_id`, `downline_count_upline_id`, `downline_count_downline_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 2, 5),
(5, 1, 5),
(6, 2, 6),
(7, 1, 6),
(8, 2, 7),
(9, 1, 7),
(10, 3, 8),
(11, 1, 8),
(12, 3, 9),
(13, 1, 9),
(14, 3, 10),
(15, 1, 10),
(16, 4, 11),
(17, 1, 11),
(18, 4, 12),
(19, 1, 12),
(20, 4, 13),
(21, 1, 13);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_fee_setting`
--

CREATE TABLE IF NOT EXISTS `mlm_fee_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `setting_register_fee` int(11) NOT NULL,
  `setting_adviser_income` int(11) NOT NULL,
  `setting_extend_fee` int(11) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mlm_fee_setting`
--

INSERT INTO `mlm_fee_setting` (`setting_id`, `setting_date`, `setting_register_fee`, `setting_adviser_income`, `setting_extend_fee`) VALUES
(1, '2017-02-04 17:00:00', 300, 100, 150);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_frontend_setting`
--

CREATE TABLE IF NOT EXISTS `mlm_frontend_setting` (
  `frontend_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `frontend_setting_website_name` varchar(200) NOT NULL,
  PRIMARY KEY (`frontend_setting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mlm_frontend_setting`
--

INSERT INTO `mlm_frontend_setting` (`frontend_setting_id`, `frontend_setting_website_name`) VALUES
(1, 'นว ดรากอน');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_income_percent_setting`
--

CREATE TABLE IF NOT EXISTS `mlm_income_percent_setting` (
  `income_percent_id` int(11) NOT NULL AUTO_INCREMENT,
  `income_percent_date` date NOT NULL,
  `income_percent_point` int(11) NOT NULL,
  `income_percent_amount` double NOT NULL,
  `income_percent_level` int(11) NOT NULL,
  `account_class_id` int(11) NOT NULL,
  `income_percent_goal` int(11) NOT NULL,
  `income_percent_lot` int(11) NOT NULL,
  PRIMARY KEY (`income_percent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `mlm_income_percent_setting`
--

INSERT INTO `mlm_income_percent_setting` (`income_percent_id`, `income_percent_date`, `income_percent_point`, `income_percent_amount`, `income_percent_level`, `account_class_id`, `income_percent_goal`, `income_percent_lot`) VALUES
(1, '2017-01-09', 1500, 34, 1, 1, 3, 1),
(2, '2016-12-28', 4500, 6, 2, 1, 9, 1),
(3, '2016-12-28', 13500, 5, 3, 1, 9, 3),
(4, '2016-12-28', 40500, 4, 4, 1, 27, 3),
(5, '2016-12-28', 121500, 4, 5, 1, 27, 9),
(6, '2017-01-31', 60000, 5, 1, 2, 3, 1),
(7, '2017-01-31', 180000, 5, 2, 2, 3, 3),
(8, '2017-01-31', 540000, 5, 3, 2, 3, 9),
(9, '2017-01-31', 1620000, 5, 4, 2, 3, 27),
(10, '2017-01-31', 4860000, 3, 5, 2, 9, 27),
(11, '2017-01-31', 14580000, 3, 6, 3, 9, 81),
(12, '2017-01-31', 43740000, 3, 7, 4, 9, 243),
(13, '2017-01-31', 131220000, 3, 8, 5, 9, 729),
(14, '2017-01-31', 393660000, 3, 9, 6, 9, 2187),
(15, '2017-01-31', 1180980000, 23.8986435, 10, 7, 9, 6561);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_journals`
--

CREATE TABLE IF NOT EXISTS `mlm_journals` (
  `journals_id` int(11) NOT NULL AUTO_INCREMENT,
  `journals_name` varchar(200) NOT NULL,
  `journals_type` int(11) NOT NULL,
  `journals_detail` varchar(100) NOT NULL,
  PRIMARY KEY (`journals_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mlm_journals`
--

INSERT INTO `mlm_journals` (`journals_id`, `journals_name`, `journals_type`, `journals_detail`) VALUES
(1, 'fee', 4, 'ค่าธรรมเนียม สมาชิกใหม่'),
(2, 'extend', 4, 'ค่าธรรมเนียม ต่ออายุบัญชีนักธุรกิจอิสระ'),
(3, 'dividend adviser', 5, 'ค่าการตลาด ผู้แนะนำ'),
(4, 'dividend upline', 5, 'ค่าการตลาด ตามแผน'),
(5, 'dividend company', 4, 'ค่าการตลาด บริษัท'),
(6, 'dividend company wallet', 4, 'ค่าการตลาด บริษัท กระเป๋าเล็ก'),
(7, 'sale', 4, 'ขายสินค้า');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_journal_dividend`
--

CREATE TABLE IF NOT EXISTS `mlm_journal_dividend` (
  `journal_dividend_id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_dividend_amount` int(11) NOT NULL,
  `journal_dividend_type` int(11) NOT NULL,
  `journal_dividend_code` varchar(20) NOT NULL,
  `account_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `journal_dividend_note` varchar(500) NOT NULL,
  `journal_dividend_class` int(11) NOT NULL,
  `journal_dividend_round` int(11) NOT NULL DEFAULT '0',
  `journal_dividend_lvl` int(11) NOT NULL,
  PRIMARY KEY (`journal_dividend_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `mlm_journal_dividend`
--

INSERT INTO `mlm_journal_dividend` (`journal_dividend_id`, `journal_dividend_amount`, `journal_dividend_type`, `journal_dividend_code`, `account_id`, `member_id`, `journal_dividend_note`, `journal_dividend_class`, `journal_dividend_round`, `journal_dividend_lvl`) VALUES
(1, 510, 2, 'DI00001', 1, 1, '', 1, 0, 1),
(2, 100, 1, 'DI00002', 1, 1, '', 0, 0, 1),
(3, 100, 1, 'DI00003', 1, 1, '', 0, 0, 1),
(4, 100, 1, 'DI00004', 1, 1, '', 0, 0, 1),
(5, 210, 2, 'DI00005', 2, 1, '', 1, 0, 1),
(6, 100, 1, 'DI00006', 1, 1, '', 0, 0, 1),
(7, 100, 1, 'DI00007', 1, 1, '', 0, 0, 1),
(8, 100, 1, 'DI00008', 1, 1, '', 0, 0, 1),
(9, 210, 2, 'DI00009', 3, 1, '', 1, 0, 1),
(10, 100, 1, 'DI00010', 1, 1, '', 0, 0, 1),
(11, 100, 1, 'DI00011', 1, 1, '', 0, 0, 1),
(12, 100, 1, 'DI00012', 1, 1, '', 0, 0, 1),
(13, 210, 2, 'DI00013', 4, 1, '', 1, 0, 1),
(14, 270, 2, 'DI00014', 1, 1, '', 1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_journal_extend`
--

CREATE TABLE IF NOT EXISTS `mlm_journal_extend` (
  `journal_extend_id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_extend_start_date` date NOT NULL,
  `journal_extend_expired_date` date NOT NULL,
  `journal_extend_amount` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `journal_extend_code` varchar(20) NOT NULL,
  PRIMARY KEY (`journal_extend_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `mlm_journal_extend`
--

INSERT INTO `mlm_journal_extend` (`journal_extend_id`, `journal_extend_start_date`, `journal_extend_expired_date`, `journal_extend_amount`, `account_id`, `member_id`, `journal_extend_code`) VALUES
(1, '2017-02-21', '2018-02-21', 0, 2, 1, 'EX00001'),
(2, '2017-02-21', '2018-02-21', 0, 3, 1, 'EX00002'),
(3, '2017-02-21', '2018-02-21', 0, 4, 1, 'EX00003'),
(4, '2017-02-21', '2018-02-21', 0, 5, 1, 'EX00004'),
(5, '2017-02-21', '2018-02-21', 0, 6, 1, 'EX00005'),
(6, '2017-02-21', '2018-02-21', 0, 7, 1, 'EX00006'),
(7, '2017-02-21', '2018-02-21', 0, 8, 1, 'EX00007'),
(8, '2017-02-21', '2018-02-21', 0, 9, 1, 'EX00008'),
(9, '2017-02-21', '2018-02-21', 0, 10, 1, 'EX00009'),
(10, '2017-02-21', '2018-02-21', 0, 11, 1, 'EX00010'),
(11, '2017-02-21', '2018-02-21', 0, 12, 1, 'EX00011'),
(12, '2017-02-21', '2018-02-21', 0, 13, 1, 'EX00012');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_journal_fee`
--

CREATE TABLE IF NOT EXISTS `mlm_journal_fee` (
  `journal_fee_id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_fee_amount` int(11) NOT NULL,
  `journal_fee_type` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `journal_fee_code` varchar(20) NOT NULL,
  PRIMARY KEY (`journal_fee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_journal_sale_order_detail`
--

CREATE TABLE IF NOT EXISTS `mlm_journal_sale_order_detail` (
  `journal_sale_order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_sale_order_detail_date` datetime NOT NULL,
  `journal_sale_order_detail_code` varchar(20) NOT NULL,
  `journal_sale_order_detail_slip` varchar(100) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`journal_sale_order_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_journal_sale_order_item`
--

CREATE TABLE IF NOT EXISTS `mlm_journal_sale_order_item` (
  `journal_sale_order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_sale_order_item_quantity` int(11) NOT NULL,
  `journal_sale_order_item_price` int(11) NOT NULL,
  `journal_sale_order_item_pv` int(11) NOT NULL,
  `journal_sale_order_detail_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`journal_sale_order_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_member`
--

CREATE TABLE IF NOT EXISTS `mlm_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id_card_type` int(11) NOT NULL COMMENT '1 เลขประชาชน',
  `member_citizen_id` varchar(13) CHARACTER SET utf8 NOT NULL,
  `member_prefix` varchar(20) CHARACTER SET utf8 NOT NULL,
  `member_firstname` varchar(200) CHARACTER SET utf8 NOT NULL,
  `member_lastname` varchar(200) CHARACTER SET utf8 NOT NULL,
  `member_prefix_eng` varchar(20) CHARACTER SET utf8 NOT NULL,
  `member_firstname_eng` varchar(200) CHARACTER SET utf8 NOT NULL,
  `member_lastname_eng` varchar(200) CHARACTER SET utf8 NOT NULL,
  `member_born` date NOT NULL,
  `member_age` int(11) NOT NULL,
  `member_address` varchar(500) CHARACTER SET utf8 NOT NULL,
  `member_address2` varchar(500) CHARACTER SET utf8 NOT NULL,
  `member_phone` varchar(10) CHARACTER SET utf8 NOT NULL,
  `member_career` varchar(100) CHARACTER SET utf8 NOT NULL,
  `member_email` varchar(200) NOT NULL,
  `member_line_id` varchar(50) NOT NULL,
  `member_skype` varchar(100) NOT NULL,
  `member_whatapp` varchar(100) NOT NULL,
  `member_contact_etc` varchar(100) NOT NULL,
  `member_status` int(2) NOT NULL DEFAULT '2',
  `member_photo` varchar(100) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mlm_member`
--

INSERT INTO `mlm_member` (`member_id`, `member_id_card_type`, `member_citizen_id`, `member_prefix`, `member_firstname`, `member_lastname`, `member_prefix_eng`, `member_firstname_eng`, `member_lastname_eng`, `member_born`, `member_age`, `member_address`, `member_address2`, `member_phone`, `member_career`, `member_email`, `member_line_id`, `member_skype`, `member_whatapp`, `member_contact_etc`, `member_status`, `member_photo`) VALUES
(1, 1, 'Superadmins', 'บริษัท', 'นว ดรากอน', 'จำกัด', '', 'NAVA DRAGON', 'Company', '2017-02-05', 0, '', '', '', '', '', '', '', '', '', 1, ''),
(2, 1, '1234', 'นาย', 'สมชาย', 'ทดสอบ', 'Mr.', 'Somchai', 'Test', '2017-02-22', 0, 'ทดสอบ', 'ทดสอบ2', '0000', '', 'test@hotmail.com', '-', '-', '-', '-', 2, 'photo_2.png'),
(4, 1, '3409700019366', 'นาย', 'วีรวัฒน์', 'สิริลักขณาภรณ์', 'Mr.', 'Virawat', 'siriluknaporn', '1970-06-17', 0, '99/171 ม.16 ถ.มะลิวัลย์ ต.บ้านเป็ด อ.เมืองขอนแก่น จ.ขอนแก่น', '99/171 ม.16 ถ.มะลิวัลย์ ต.บ้านเป็ด อ.เมืองขอนแก่น จ.ขอนแก่น', '0877234553', '', 'somwat@yahoo.co.th', '-', '-', '-', '-', 2, 'no_profile.png'),
(5, 1, '1739900396555', 'นาย', 'ธณณัฏฐ์', 'ปัณสิริวงส์', 'Mr.', 'Tananut', 'Panasiriwong', '2017-02-13', 0, '99/188 ม.16 ถ.มะลิวัลย์ ต.บ้านเป็ด อ.เมืองขอนแก่น จ.ขอนแก่น', '99/188 ม.16 ถ.มะลิวัลย์ ต.บ้านเป็ด อ.เมืองขอนแก่น จ.ขอนแก่น', '0830889074', '', 'mtananut@hotmail.com', '-', '-', '-', '-', 2, 'no_profile.png'),
(6, 1, '3409900871139', 'นาย', 'ชัยราชา', 'ราชวงศ์', 'Mr.', 'Chairacha', 'Rachawong', '2017-02-13', 0, '150 มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน วิทยาเขตขอนแก่น ถ.ศรีจันทร์ ต.ในเมือง อ.เมือง จ.ขอนแก่น 40000', '150 มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน วิทยาเขตขอนแก่น ถ.ศรีจันทร์ ต.ในเมือง อ.เมือง จ.ขอนแก่น 40000', '0868762882', '', 'tontan10@gmail.com', '-', '-', '-', '-', 2, 'no_profile.png'),
(7, 1, '3101400008500', 'นาย', 'พิสิษฐ์', 'เหล่าอนันต์ชัย', 'Mr.', 'Pisis', 'Laoanutchai', '2017-02-13', 0, '66/107 ม.พระปิ่น 3 ถ.กาญจนาภิเษก ต.บางแม่นาง อ.บางใหญ่ จ.นนทบุรี 11140', '66/107 ม.พระปิ่น 3 ถ.กาญจนาภิเษก ต.บางแม่นาง อ.บางใหญ่ จ.นนทบุรี 11140', '0819459069', '', 'kittichok2516@gmail.com', '-', '-', '-', '-', 2, 'no_profile.png'),
(8, 1, '3100201650952', 'นาย', 'จิรพัฒน์', 'สมสกล', 'Mr.', 'Jirapat', 'Somsakol', '2017-02-13', 0, '33/6 ม.4 แขวงกระทุ่มราย เขตหนองจอก กทม 10530', '33/6 ม.4 แขวงกระทุ่มราย เขตหนองจอก กทม 10530', '0817267151', '', 'chaosein@gmail.com', '-', '-', '-', '-', 2, 'no_profile.png'),
(9, 1, '1179900087701', 'นางสาว', 'ธิดาพร', 'รุ่งสุข', 'Miss', 'Tidaporn', 'Rungsuk', '2017-02-13', 0, '72/36 ม.10 ต.ต้นโพธิ์ อ.เมือง จ.สิงห์บุรี 16000', '72/36 ม.10 ต.ต้นโพธิ์ อ.เมือง จ.สิงห์บุรี 16000', '0819416070', '', 'nitnotenan@gmail.com', '-', '-', '-', '-', 2, 'no_profile.png'),
(10, 1, '3470100328530', 'นาง', 'บุษกร', 'มูลไชยสุข', 'Mrs.', 'Budsakorn', 'Molchayasuk', '2017-02-13', 0, 'อบต. สะพือ ม.8 ตะสะพือ อ.ตระการพืชพล จ.อุบลราชธานี', 'อบต. สะพือ ม.8 ตะสะพือ อ.ตระการพืชพล จ.อุบลราชธานี', '0858796599', '', 'budsakorn000001@gmail.com', '-', '-', '-', '-', 2, 'no_profile.png'),
(11, 1, '1480500136411', 'นาย', 'ชัยวัฒน์', 'ชยพาณิชย์สกุล', 'Mr.', 'Chaiwat', 'Chayapanitsakul', '1989-12-26', 0, '989/121 พิมานคอนโดปาร์ค เฟส 2', '989/121 พิมานคอนโดปาร์ค เฟส 2', '0856081615', '', 'amoolras@gmail.com', '', '', '', '', 2, 'no_profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_point_value`
--

CREATE TABLE IF NOT EXISTS `mlm_point_value` (
  `point_value_id` int(11) NOT NULL AUTO_INCREMENT,
  `point_value` int(11) NOT NULL,
  `point_detail` varchar(500) NOT NULL,
  `point_date` date NOT NULL,
  `point_type` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  PRIMARY KEY (`point_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_products`
--

CREATE TABLE IF NOT EXISTS `mlm_products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `products_name` varchar(300) NOT NULL,
  `products_price_narmal` int(11) NOT NULL,
  `products_price_discount` float NOT NULL,
  `products_update_date` datetime NOT NULL,
  `products_stock` int(11) NOT NULL,
  `products_image` varchar(100) NOT NULL,
  `products_code` varchar(10) NOT NULL,
  `products_unit` varchar(100) NOT NULL,
  `products_status` int(11) NOT NULL DEFAULT '1',
  `products_detail` varchar(500) NOT NULL,
  `products_pv` varchar(100) NOT NULL,
  PRIMARY KEY (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mlm_products`
--

INSERT INTO `mlm_products` (`products_id`, `products_name`, `products_price_narmal`, `products_price_discount`, `products_update_date`, `products_stock`, `products_image`, `products_code`, `products_unit`, `products_status`, `products_detail`, `products_pv`) VALUES
(1, 'แคปซูลธาตุอาหารเสริมพืช', 1000, 50, '2017-02-05 15:56:02', 0, 'img0001.jpg', 'P0001', 'แผง', 1, 'เป็นแคปซูลธาตุอาหารเสริมพืช ใช้ประกอบกับการให้ปุ๋ยและธาตุอาหารอื่นๆ ช่วยเพิ่มเสริมการเจริญของพืช\n\n', '100');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_shop_temp`
--

CREATE TABLE IF NOT EXISTS `mlm_shop_temp` (
  `shop_temp_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `shop_temp_quantity` int(11) NOT NULL,
  `shop_temp_pv` int(11) NOT NULL,
  PRIMARY KEY (`shop_temp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mlm_user`
--

CREATE TABLE IF NOT EXISTS `mlm_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_group` varchar(20) DEFAULT 'member',
  `member_id` int(11) NOT NULL,
  `user_admin_team` varchar(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mlm_user`
--

INSERT INTO `mlm_user` (`user_id`, `user_name`, `user_pass`, `user_group`, `member_id`, `user_admin_team`) VALUES
(1, '0050542912', 'MDAwMA==', 'member', 1, ''),
(2, '00505429', 'MTExMQ==', 'member', 2, ''),
(3, '1409901128441', 'MDEyMzQ=', 'member', 3, ''),
(4, '3409700019366', 'MDg3NzIzNDU1Mw==', 'member', 4, ''),
(5, '1739900396555', 'MDgzMDg4OTA3NA==', 'member', 5, ''),
(6, '3409900871139', 'MDg2ODc2Mjg4Mg==', 'member', 6, ''),
(7, '3101400008500', 'MDgxOTQ1OTA2OQ==', 'member', 7, ''),
(8, '3100201650952', 'MDgxNzI2NzE1MQ==', 'member', 8, ''),
(9, '1179900087701', 'MDgxOTQxNjA3MA==', 'member', 9, ''),
(10, '3470100328530', 'MDg1ODc5NjU5OQ==', 'member', 10, ''),
(11, '1480500136411', 'MXEydzNlNHI1dA==', 'member', 11, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
