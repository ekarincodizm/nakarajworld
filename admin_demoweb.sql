-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2017 at 02:36 PM
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
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `mlm_account`
--

INSERT INTO `mlm_account` (`account_id`, `account_team`, `account_level`, `account_code`, `member_id`, `account_upline_id`, `account_adviser_id`, `bookbank_id`, `account_status`) VALUES
(1, 'N', 1, 1, 1, 0, 0, 1, 1),
(2, 'N', 2, 2, 1, 1, 1, 0, 1),
(3, 'N', 2, 3, 1, 1, 1, 0, 1),
(4, 'N', 2, 4, 1, 1, 1, 0, 1),
(5, 'A', 3, 1, 33, 2, 2, 1, 1),
(6, 'A', 4, 2, 5, 5, 5, 0, 1),
(7, 'A', 4, 3, 5, 5, 5, 0, 1),
(8, 'A', 4, 4, 5, 5, 5, 0, 1),
(9, 'B', 3, 1, 2, 2, 2, 0, 1),
(10, 'B', 4, 2, 2, 9, 9, 0, 1),
(11, 'B', 4, 3, 2, 9, 9, 0, 1),
(12, 'B', 4, 4, 2, 9, 9, 0, 1),
(13, 'C', 3, 1, 3, 2, 2, 0, 1),
(14, 'C', 4, 2, 3, 13, 13, 0, 1),
(15, 'C', 4, 3, 3, 13, 13, 0, 1),
(16, 'C', 4, 4, 3, 13, 13, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mlm_accounting`
--

CREATE TABLE IF NOT EXISTS `mlm_accounting` (
  `accounting_id` int(11) NOT NULL AUTO_INCREMENT,
  `journals_id` int(11) NOT NULL,
  `accounting_amount` int(11) NOT NULL,
  `accounting_tax` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `accounting_status` int(11) NOT NULL DEFAULT '0',
  `accounting_source_id` int(11) NOT NULL COMMENT 'id ในรายการที่ต้องเปลี่ยนสถานะ',
  `accounting_date` date NOT NULL,
  `accounting_no` int(11) NOT NULL,
  `accounting_system_note` varchar(1000) NOT NULL,
  PRIMARY KEY (`accounting_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `mlm_accounting`
--

INSERT INTO `mlm_accounting` (`accounting_id`, `journals_id`, `accounting_amount`, `accounting_tax`, `member_id`, `accounting_status`, `accounting_source_id`, `accounting_date`, `accounting_no`, `accounting_system_note`) VALUES
(1, 4, 510, 0, 1, 0, 1, '2017-01-05', 0, 'ค่าการตลาด ครบ 3 รหัส '),
(2, 4, 510, 0, 5, 0, 5, '2017-01-05', 0, 'ค่าการตลาด ครบ 3 รหัส '),
(3, 4, 510, 0, 2, 0, 9, '2017-01-05', 0, 'ค่าการตลาด ครบ 3 รหัส '),
(4, 4, 510, 0, 1, 0, 2, '2017-01-05', 0, 'ค่าการตลาด ครบ 3 รหัส '),
(5, 4, 510, 0, 3, 0, 13, '2017-01-05', 0, 'ค่าการตลาด ครบ 3 รหัส '),
(6, 4, 270, 0, 1, 0, 2, '2017-01-05', 0, 'ค่าการตลาด ครบ 9 รหัส '),
(7, 1, 300, 0, 1, 0, 0, '2017-01-05', 0, ''),
(8, 1, 300, 0, 10, 0, 0, '2017-01-06', 0, ''),
(9, 1, 300, 0, 10, 0, 0, '2017-01-06', 0, ''),
(10, 1, 300, 0, 10, 0, 0, '2017-01-06', 0, ''),
(11, 1, 300, 0, 10, 1, 0, '2017-01-06', 0, ''),
(12, 1, 300, 0, 11, 1, 0, '2017-01-06', 0, ''),
(13, 1, 300, 0, 12, 1, 0, '2017-01-06', 0, ''),
(14, 1, 300, 0, 13, 1, 0, '2017-01-06', 0, ''),
(15, 1, 300, 0, 14, 1, 0, '2017-01-06', 0, ''),
(16, 1, 300, 0, 15, 1, 0, '2017-01-06', 0, ''),
(17, 1, 300, 0, 16, 1, 0, '2017-01-06', 0, ''),
(18, 1, 300, 0, 17, 1, 0, '2017-01-06', 0, ''),
(19, 1, 300, 0, 19, 1, 0, '2017-01-06', 0, ''),
(20, 1, 300, 0, 20, 1, 0, '2017-01-06', 0, ''),
(21, 1, 300, 0, 23, 1, 0, '2017-01-06', 0, ''),
(22, 1, 300, 0, 32, 1, 0, '2017-01-09', 0, ''),
(23, 1, 300, 0, 32, 1, 0, '2017-01-09', 0, ''),
(24, 1, 300, 0, 33, 0, 0, '2017-01-09', 0, ''),
(25, 1, 300, 0, 33, 1, 0, '2017-01-09', 0, ''),
(26, 1, 300, 0, 34, 0, 0, '2017-01-18', 0, ''),
(27, 1, 300, 0, 34, 0, 0, '2017-01-18', 0, ''),
(28, 1, 300, 0, 34, 1, 0, '2017-01-18', 0, ''),
(29, 1, 300, 0, 33, 0, 0, '2017-01-18', 0, ''),
(30, 1, 300, 0, 33, 1, 0, '2017-01-18', 0, ''),
(31, 1, 300, 0, 34, 1, 0, '2017-01-22', 0, ''),
(32, 1, 300, 0, 35, 0, 0, '2017-01-22', 0, ''),
(33, 1, 300, 0, 35, 0, 0, '2017-01-22', 0, ''),
(34, 1, 300, 0, 36, 0, 0, '2017-01-22', 0, ''),
(35, 1, 300, 0, 36, 1, 0, '2017-01-22', 0, ''),
(36, 1, 300, 0, 21, 0, 0, '2017-01-22', 0, ''),
(37, 1, 300, 0, 21, 0, 0, '2017-01-22', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_account_history`
--

CREATE TABLE IF NOT EXISTS `mlm_account_history` (
  `account_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `account_history_status` int(1) NOT NULL DEFAULT '1',
  `account_history_register_date` date NOT NULL,
  `account_history_expired_date` date NOT NULL,
  PRIMARY KEY (`account_history_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `mlm_account_history`
--

INSERT INTO `mlm_account_history` (`account_history_id`, `account_id`, `account_history_status`, `account_history_register_date`, `account_history_expired_date`) VALUES
(1, 2, 1, '2017-01-05', '2018-01-05'),
(2, 3, 1, '2017-01-05', '2018-01-05'),
(3, 4, 1, '2017-01-05', '2018-01-05'),
(4, 5, 1, '2017-01-05', '2018-01-05'),
(5, 6, 1, '2017-01-05', '2018-01-05'),
(6, 7, 1, '2017-01-05', '2018-01-05'),
(7, 8, 1, '2017-01-05', '2018-01-05'),
(8, 9, 1, '2017-01-05', '2018-01-05'),
(9, 10, 1, '2017-01-05', '2018-01-05'),
(10, 11, 1, '2017-01-05', '2018-01-05'),
(11, 12, 1, '2017-01-05', '2018-01-05'),
(12, 13, 1, '2017-01-05', '2018-01-05'),
(13, 14, 1, '2017-01-05', '2018-01-05'),
(14, 15, 1, '2017-01-05', '2018-01-05'),
(15, 16, 1, '2017-01-05', '2018-01-05');

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
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`bookbank_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mlm_bookbank`
--

INSERT INTO `mlm_bookbank` (`bookbank_id`, `bank_id`, `bookbank_account`, `bookbank_number`, `bookbank_bank_branch`, `member_id`) VALUES
(1, 1, 'พิคโกโร่', '55555555555', 'ดาวนาเม็ก', 5);

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
  PRIMARY KEY (`mlm_config_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mlm_config`
--

INSERT INTO `mlm_config` (`mlm_config_id`, `mlm_config_logo`, `mlm_config_email`, `mlm_config_tel`, `mlm_config_name`, `mlm_config_detail`, `mlm_config_address`) VALUES
(1, 'logo.png', 'yaimanthai@yahoo.com', '099 462 5955', 'นว ดรากอน เวลท์ เน็ตเวิร์ค', '<p>กรมพัฒนาธุรกิจการค้า ได้ออกใบสำคัญตาม พรบ.ทะเบียนพาณิชย์ พ.ศ. 2499 ให้ภาคอีสานพืชผล ใช้สื่ออีเล็คทรอนิกส์ผ่านระบบเครือข่ายอินเตอร์เน็ต ในการเป็นตัวแทนจำหน่าย อาหารเสริมพืช ปุ๋ยและเคมีภัณฑ์ทางการเกษตร พืชผลทางการเกษตร เครื่องมืออิเลคทรอนิกส์ วัตถุมงคล และสินค้าเบ็ดเตล็ด ซึ่งปัจจุบัน จดทะเบียนเป็น บริษัท นว ดรากอน เวลท์ เน็ตเวิร์ค จำกัด : NAVA DRAGON WEALTH NETWORK COMPANY LIMITED.<br />\r\nเรายินดีทำข้อตกลงให้แก่บุคคลทั่วไป เข้าเป็นสมาชิกของ ภาคอีสานพืชผล เพื่อแนะนำผลิตภัณฑ์ และรับค่าสินน้ำใจ เมื่อมีสมาชิกเพิ่มเข้ามาสั่งจอง หรือซื้อสินค้า และยินดีให้คำแนะนำทางธุรกิจ เพื่อเสริมสร้างรายได้แก่สมาชิก<br />\r\nWe encourage our guests to access the opportunities created by a low investment, less work.But getting a greater return<br />\r\nFacebook facebook.com/NAVA DRAGON WEALTH NETWORK</p>\r\n', 'บ้านเลขที่ 132/2 หมู่บ้านบะขาม หมู่ที่ 4 ซอยชาตะผดุง 7 ตำบลในเมือง อำเภอเมืองขอนแก่น จังหวัดขอนแก่น 40000');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_downline_count`
--

CREATE TABLE IF NOT EXISTS `mlm_downline_count` (
  `downline_count_id` int(11) NOT NULL AUTO_INCREMENT,
  `downline_count_upline_id` int(11) NOT NULL,
  `downline_count_downline_id` int(11) NOT NULL,
  PRIMARY KEY (`downline_count_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `mlm_downline_count`
--

INSERT INTO `mlm_downline_count` (`downline_count_id`, `downline_count_upline_id`, `downline_count_downline_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 2, 5),
(5, 1, 5),
(6, 5, 6),
(7, 2, 6),
(8, 1, 6),
(9, 5, 7),
(10, 2, 7),
(11, 1, 7),
(12, 5, 8),
(13, 2, 8),
(14, 1, 8),
(15, 2, 9),
(16, 1, 9),
(17, 9, 10),
(18, 2, 10),
(19, 1, 10),
(20, 9, 11),
(21, 2, 11),
(22, 1, 11),
(23, 9, 12),
(24, 2, 12),
(25, 1, 12),
(26, 2, 13),
(27, 1, 13),
(28, 13, 14),
(29, 2, 14),
(30, 1, 14),
(31, 13, 15),
(32, 2, 15),
(33, 1, 15),
(34, 13, 16),
(35, 2, 16),
(36, 1, 16);

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
(1, '2017-01-22 17:00:00', 300, 101, 150);

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
  `income_percent_amount` float NOT NULL,
  `income_percent_plan` int(11) NOT NULL,
  `income_percent_level` int(11) NOT NULL,
  `income_percent_point` int(11) NOT NULL,
  `income_percent_date` date NOT NULL,
  PRIMARY KEY (`income_percent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mlm_income_percent_setting`
--

INSERT INTO `mlm_income_percent_setting` (`income_percent_id`, `income_percent_amount`, `income_percent_plan`, `income_percent_level`, `income_percent_point`, `income_percent_date`) VALUES
(1, 33, 1, 1, 1500, '2017-01-09'),
(2, 6, 1, 2, 4500, '2016-12-28'),
(3, 5, 1, 3, 13500, '2016-12-28'),
(4, 4, 1, 4, 40500, '2016-12-28'),
(5, 4, 1, 5, 121500, '2016-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_journals`
--

CREATE TABLE IF NOT EXISTS `mlm_journals` (
  `journals_id` int(11) NOT NULL AUTO_INCREMENT,
  `journals_name` varchar(200) NOT NULL,
  `journals_type` int(11) NOT NULL,
  PRIMARY KEY (`journals_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mlm_journals`
--

INSERT INTO `mlm_journals` (`journals_id`, `journals_name`, `journals_type`) VALUES
(1, 'ค่าธรรมเนียม สมาชิกใหม่', 4),
(2, 'ค่าธรรมเนียม ต่ออายุบัญชีนักธุรกิจอิสระ', 4),
(3, 'ผู้แนะนำ', 5),
(4, 'สมาชิกครบแผน', 5),
(5, 'ขายสินค้า', 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `mlm_member`
--

INSERT INTO `mlm_member` (`member_id`, `member_id_card_type`, `member_citizen_id`, `member_prefix`, `member_firstname`, `member_lastname`, `member_prefix_eng`, `member_firstname_eng`, `member_lastname_eng`, `member_born`, `member_age`, `member_address`, `member_address2`, `member_phone`, `member_career`, `member_email`, `member_line_id`, `member_skype`, `member_whatapp`, `member_contact_etc`, `member_status`, `member_photo`) VALUES
(1, 1, '0405559003422', '', 'NAVA DRAGON WEALTH NETWORK', '', '', '', '', '2016-10-20', 0, '', '', '08080808', '', '', '', '', '', '', 1, ''),
(2, 1, '3409900783663', 'นาย', 'ธนัฐตรัยภพ', 'ลางคุลานนท์', '', '', '', '1963-07-08', 20, '', '', '0994625955', '', 'yaimanthai@yahoo.com', '', '', '', '', 1, ''),
(3, 1, '3500700447482', 'นาย', 'ณัฐวัฒน์', 'ขอดแก้ว', '', '', '', '1967-02-27', 49, '72 หมู่ 6 ต.ขี้เหล็ก อ.แม่ริม จ.เชียงใหม่ 560180', '', '088-251379', '', 'nkhodkaeo198@gmail.com', '0882513798', '', '', '', 1, ''),
(4, 1, '3401200013892', 'นาย', 'พัทธรินทร์', 'นารินทร์', '', '', '', '1966-12-25', 0, '', '', '0856438271', '', '', '', '', '', '', 1, ''),
(5, 1, '3550600287475', 'นาย', 'ภานุพงศ์', 'ชินเทพ', '', '', '', '1966-09-07', 0, '', '', '0624471664', '', '', '', '', '', '', 1, ''),
(6, 1, '3730600438021', 'นาง', 'วรรณธนมนย์', 'รัตนนวราฐธิบดี', '', '', '', '0000-00-00', 0, '', '', '0818916547', '', '', '', '', '', '', 1, ''),
(7, 1, '', 'นาย', 'บารเมษฐ์', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', 2, ''),
(8, 1, '', 'นาย', 'บารเมษฐ์', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', 2, ''),
(9, 1, '', 'นาย', 'บารเมษฐ์', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', 2, ''),
(20, 1, '1479900104204', 'นาย', 'ddd', 'ddd', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', 1, 'photo_20.jpg'),
(21, 1, '1479900104203', '? undefined:undefine', '', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', 2, 'photo_21.jpg'),
(22, 1, '1479900104202', '? undefined:undefine', '', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', 2, 'photo_22.jpg'),
(30, 1, '', 'นาย', '', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', 2, ''),
(31, 1, '', 'นาย', '', '', '', '', '', '0000-00-00', 0, '', '', '', '', '', '', '', '', '', 2, ''),
(33, 1, '1409901128442', 'นาย', 'ธีรเดช', 'บุญนภา', 'Mr.', 'Teeradesh', 'Bunapa', '1994-02-19', 22, '30/8 หมู่5 ต.ในเมือง อ.เมือง', 'หน้า 7-', '0804805243', '', 'tuna_sang@hotmail.comaa', 'test line', 'test skype', 'test whatapp', 'test www', 1, 'photo_33.jpg'),
(34, 1, '112312931293', 'นาย', 'สมชาย', 'สมทรง', 'Mr.', 'Somchay', 'Somsung', '2013-01-29', 0, 'aaaaaaaa', 'bbbbbb', '0000', '', 'aaaaaa@aa', 'aaaaa', 'sssss', 'ddddd', 'ffffff', 1, 'photo_34.png'),
(35, 1, '12312423523', 'นาย', 'สมคุง', 'สมควร', 'Mr.', 'dddddddddddddd', 'ffffffffffffffff', '1958-06-10', 0, 'aaaaaaaaaaaaaaa', 'sssssssssssssssss', '0909', '', '????????@gmail.com', '-', '-', '-', '-', 2, 'photo_35.png'),
(36, 1, '1111111111', 'นาง', 'สมจริง', 'นะ', 'Mr.', 'ฟฟฟ', 'หฟฟห', '1405-06-13', 0, 'ฟหกฟหกดยนหด', 'ฟกฟหกฟหก', '987908789', '', 'tuna@gmail.com', '-', '-', '-', '-', 1, 'photo_36.png');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mlm_products`
--

INSERT INTO `mlm_products` (`products_id`, `products_name`, `products_price_narmal`, `products_price_discount`, `products_update_date`, `products_stock`, `products_image`, `products_code`, `products_unit`, `products_status`, `products_detail`, `products_pv`) VALUES
(1, 'แคปซูลธาตุอาหารเสริมพืช', 1000, 50, '2017-01-22 18:03:16', 100, 'imgP0001.jpg', 'P0001', 'แผง', 1, 'ทดสอบสินค้า', '110'),
(2, 'หมา', 100, 10, '2017-01-09 18:09:04', 1, 'img0002.jpg', 'P0002', 'ตัว', 1, 'หมามี4ขา', '200');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_shop_detail`
--

CREATE TABLE IF NOT EXISTS `mlm_shop_detail` (
  `shop_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_detail_date` datetime NOT NULL,
  `shop_detail_status` int(11) NOT NULL DEFAULT '2',
  `shop_detail_code` varchar(10) NOT NULL,
  `member_id` int(11) NOT NULL,
  `shop_detail_slip` varchar(100) NOT NULL,
  PRIMARY KEY (`shop_detail_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `mlm_shop_detail`
--

INSERT INTO `mlm_shop_detail` (`shop_detail_id`, `shop_detail_date`, `shop_detail_status`, `shop_detail_code`, `member_id`, `shop_detail_slip`) VALUES
(14, '2017-01-02 14:00:36', 1, 'SO0001', 61, 'slipSO0001.jpg'),
(15, '2017-01-03 17:42:04', 1, 'SO0002', 63, 'slipSO0002.jpg'),
(16, '2017-01-03 18:27:42', 1, 'SO0003', 64, 'slipSO0003.jpg'),
(17, '2017-01-09 16:57:58', 1, 'SO0004', 32, ''),
(18, '2017-01-09 18:09:26', 1, 'SO0005', 33, ''),
(19, '2017-01-18 20:26:23', 0, 'SO0006', 33, ''),
(20, '2017-01-22 18:08:25', 2, 'SO0007', 33, 'slipSO0007.jpg'),
(21, '2017-01-22 18:14:38', 0, 'SO0008', 33, ''),
(22, '2017-01-22 18:34:06', 1, 'SO0009', 33, '');

-- --------------------------------------------------------

--
-- Table structure for table `mlm_shop_items`
--

CREATE TABLE IF NOT EXISTS `mlm_shop_items` (
  `shop_items_id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_items_quantity` int(11) NOT NULL,
  `shop_items_price` int(11) NOT NULL,
  `shop_items_pv` int(11) NOT NULL,
  `shop_detail_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  PRIMARY KEY (`shop_items_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `mlm_shop_items`
--

INSERT INTO `mlm_shop_items` (`shop_items_id`, `shop_items_quantity`, `shop_items_price`, `shop_items_pv`, `shop_detail_id`, `products_id`) VALUES
(13, 3, 500, 0, 14, 1),
(14, 1, 500, 0, 15, 1),
(15, 1, 500, 0, 16, 1),
(16, 6, 500, 0, 17, 1),
(17, 1, 90, 0, 18, 2),
(18, 2, 500, 0, 19, 1),
(19, 3, 90, 0, 20, 2),
(20, 3, 90, 0, 21, 2),
(21, 4, 500, 110, 22, 1),
(22, 1, 90, 200, 22, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `mlm_user`
--

INSERT INTO `mlm_user` (`user_id`, `user_name`, `user_pass`, `user_group`, `member_id`, `user_admin_team`) VALUES
(1, '3500700447482', '', 'member', 1, ''),
(2, '0405559003421', '', 'member', 2, ''),
(3, '3401200013892', '', 'member', 3, ''),
(4, '3550600287475', '', 'member', 4, ''),
(5, '3730600438021', '', 'member', 5, ''),
(43, '', '', 'member', 7, ''),
(44, '', '', 'member', 8, ''),
(45, '', '', 'member', 9, ''),
(56, '1479900104204', '', 'member', 20, ''),
(57, '1479900104203', '', 'member', 21, ''),
(58, '1479900104202', '', 'member', 22, ''),
(59, '', '', 'member', 23, ''),
(60, '', '', 'member', 24, ''),
(61, '5555555', '', 'member', 25, ''),
(62, '5555555', '', 'member', 26, ''),
(63, '', '', 'member', 27, ''),
(64, '', '', 'member', 28, ''),
(65, '', '', 'member', 29, ''),
(66, '', '', 'member', 30, ''),
(67, '', '', 'member', 31, ''),
(69, '1409901128442', '', 'member', 33, ''),
(70, '1409901128443', '', 'member', 34, ''),
(71, '1409901128444', '', 'member', 35, ''),
(73, '1409901128888', 'NDQ0NA==', 'member', 34, ''),
(74, '112312931293', 'MDAwMA==', 'member', 34, ''),
(75, '12312423523', 'MDkwOQ==', 'member', 35, ''),
(76, '1111111111', 'MDAwMA==', 'member', 36, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
