-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2013 at 12:46 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cerp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `type` varchar(25) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `type`, `description`) VALUES
(1, 'Cash', 'Asset Account', ''),
(2, 'Bank', 'Asset Account', ''),
(3, 'Accounts Receivable', 'Asset Account', ''),
(4, 'Inventory', 'Asset Account', ''),
(5, 'Buildings', 'Asset Account', ''),
(6, 'Vehicles and Equipment', 'Asset Account', ''),
(7, 'Other Assets', 'Asset Account', ''),
(8, 'Accounts Payable', 'Liability Account', ''),
(9, 'Accrued Expense', 'Liability Account', ''),
(10, 'Employment Expenses Payable', 'Liability Account', ''),
(11, 'Depreciation Expense', 'Expense Account', ''),
(12, 'Training Expense', 'Expense Account', ''),
(13, 'Payroll Expense', 'Expense Account', ''),
(14, 'Wages', 'Expense Account', ''),
(15, 'Utilities Expense', 'Expense Account', ''),
(16, 'Fixed Asset', 'Fixed Asset Account', ''),
(17, 'Pledges', 'Income Account', ''),
(18, 'Offerings', 'Income Account', ''),
(19, 'General Income', 'Income Account', ''),
(20, 'General Expense', 'Expense Account', '');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_class` bigint(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `model` varchar(40) NOT NULL,
  `serial_number` varchar(40) NOT NULL,
  `location` varchar(40) NOT NULL,
  `asset_cost` bigint(20) NOT NULL,
  `date_purchased` varchar(15) NOT NULL,
  `user` varchar(40) NOT NULL,
  `supplier_name` varchar(40) NOT NULL,
  `supplier_phone` varchar(15) NOT NULL,
  `asset_number` bigint(20) NOT NULL,
  `useful_life` bigint(20) NOT NULL,
  `salvage_value` bigint(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `asset_types`
--

CREATE TABLE IF NOT EXISTS `asset_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(40) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `asset_types`
--

INSERT INTO `asset_types` (`id`, `type`, `description`) VALUES
(1, 'Electronics', ''),
(2, 'Furniture', '');

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE IF NOT EXISTS `balances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier` bigint(20) NOT NULL,
  `balance_due` varchar(15) NOT NULL,
  `date_created` date NOT NULL,
  `date_due` date NOT NULL,
  `transaction_id` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_idx` (`supplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE IF NOT EXISTS `banks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`) VALUES
(1, 'ABC Bank (Kenya)'),
(2, 'Bank of Africa'),
(3, 'Bank of Baroda'),
(4, 'Bank of India'),
(5, 'Barclays Bank'),
(6, 'Brighton Kalekye Bank'),
(7, 'CFC Stanbic Bank'),
(8, 'Chase Bank (Kenya)'),
(9, 'Citibank'),
(10, 'Commercial Bank of Africa'),
(11, 'Consolidated Bank of Kenya'),
(12, 'Cooperative Bank of Kenya'),
(13, 'Credit Bank'),
(14, 'Development Bank of Kenya'),
(15, 'Diamond Trust Bank'),
(16, 'Dubai Bank Kenya'),
(17, 'Ecobank'),
(18, 'Equatorial Commercial Bank'),
(19, 'Equity Bank'),
(20, 'Family Bank'),
(21, 'Fidelity Commercial Bank Limited'),
(22, 'Fina Bank'),
(23, 'First Community Bank'),
(24, 'Giro Commercial Bank'),
(25, 'Guardian Bank'),
(26, 'Gulf African Bank'),
(27, 'Habib Bank'),
(28, 'Habib Bank AG Zurich'),
(29, 'I&M Bank'),
(30, 'Imperial Bank Kenya'),
(31, 'Jamii Bora Bank'),
(32, 'Kenya Commercial Bank'),
(33, 'K-Rep Bank'),
(34, 'Middle East Bank Kenya'),
(35, 'National Bank of Kenya'),
(36, 'NIC Bank'),
(37, 'Oriental Commercial Bank'),
(38, 'Paramount Universal Bank'),
(39, 'Prime Bank (Kenya)'),
(40, 'Standard Chartered Kenya'),
(41, 'Trans National Bank Kenya'),
(42, 'United Bank for Africa[2]'),
(43, 'Victoria Commercial Bank');

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE IF NOT EXISTS `benefits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `rate` varchar(15) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `name`, `rate`, `description`) VALUES
(1, 'Housing', '', ''),
(3, 'Dental', '', ''),
(4, 'Disability', '', ''),
(5, 'Sick Leave', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE IF NOT EXISTS `causes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `description` varchar(250) NOT NULL,
  `target` bigint(20) NOT NULL,
  `date_created` date NOT NULL,
  `deadline` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`id`, `name`, `description`, `target`, `date_created`, `deadline`) VALUES
(1, 'New Dandora', 'A new and clean version of Dandora, in Westlands', 1000000000000, '2013-04-25', '2030-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `cheques`
--

CREATE TABLE IF NOT EXISTS `cheques` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank` bigint(20) NOT NULL,
  `cheque_number` varchar(45) NOT NULL,
  `drawer` varchar(80) NOT NULL,
  `issued_to` varchar(40) NOT NULL,
  `amount` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_idx` (`bank`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cheques`
--

INSERT INTO `cheques` (`id`, `bank`, `cheque_number`, `drawer`, `issued_to`, `amount`) VALUES
(2, 39, '777777777', 'David Mwathi', 'James Kinyua', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `cheque_contributions`
--

CREATE TABLE IF NOT EXISTS `cheque_contributions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `member_number` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `address` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `cause` int(2) NOT NULL,
  `contribution_made` int(15) NOT NULL,
  `pledge` int(15) NOT NULL,
  `bank` int(10) NOT NULL,
  `cheque_number` int(40) NOT NULL,
  `Date_of_Contribution` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `church_particulars`
--

CREATE TABLE IF NOT EXISTS `church_particulars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_name` varchar(100) NOT NULL,
  `bank` bigint(20) NOT NULL,
  `account_number` varchar(40) NOT NULL,
  `balance` int(40) NOT NULL,
  `opening_balance_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bank_idx` (`bank`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `church_particulars`
--

INSERT INTO `church_particulars` (`id`, `account_name`, `bank`, `account_number`, `balance`, `opening_balance_date`) VALUES
(58, 'Petty Cash', 2, '45632178965', 500000, '2013-01-01'),
(59, 'Test', 9, '45632178985', 600000, '2013-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `contributions`
--

CREATE TABLE IF NOT EXISTS `contributions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_number` bigint(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `address` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `cause` smallint(6) NOT NULL,
  `contribution_made` bigint(20) NOT NULL,
  `pledge` bigint(20) NOT NULL,
  `date_of_contribution` date NOT NULL,
  `cashorcheque` int(15) NOT NULL,
  `bank` int(10) NOT NULL,
  `cheque_number` int(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cause_idx` (`cause`),
  KEY `member_number_idx` (`member_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=245 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Afghanistan'),
(2, 'Aland Islands'),
(3, 'Albania'),
(4, 'Algeria'),
(5, 'American Samoa'),
(6, 'Andorra'),
(7, 'Angola'),
(8, 'Anguilla'),
(9, 'Antarctica'),
(10, 'Antigua And Barbuda'),
(11, 'Argentina'),
(12, 'Armenia'),
(13, 'Aruba'),
(14, 'Australia'),
(15, 'Austria'),
(16, 'Azerbaijan'),
(17, 'Bahamas'),
(18, 'Bahrain'),
(19, 'Bangladesh'),
(20, 'Barbados'),
(21, 'Belarus'),
(22, 'Belgium'),
(23, 'Belize'),
(24, 'Benin'),
(25, 'Bermuda'),
(26, 'Bhutan'),
(27, 'Bolivia'),
(28, 'Bosnia And Herzegovina'),
(29, 'Botswana'),
(30, 'Bouvet Island'),
(31, 'Brazil'),
(32, 'British Indian Ocean Terr'),
(33, 'Brunei Darussalam'),
(34, 'Bulgaria'),
(35, 'Burkina Faso'),
(36, 'Burundi'),
(37, 'Cambodia'),
(38, 'Cameroon'),
(39, 'Canada'),
(40, 'Cape Verde'),
(41, 'Cayman Islands'),
(42, 'Central African Republic'),
(43, 'Chad'),
(44, 'Chile'),
(45, 'China'),
(46, 'Christmas Island'),
(47, 'Cocos (Keeling) Islands'),
(48, 'Colombia'),
(49, 'Comoros'),
(50, 'Congo'),
(51, 'Congo, The Democratic Rep'),
(52, 'Cook Islands'),
(53, 'Costa Rica'),
(54, 'Cote D''Ivoire'),
(55, 'Croatia'),
(56, 'Cuba'),
(57, 'Cyprus'),
(58, 'Czech Republic'),
(59, 'Denmark'),
(60, 'Djibouti'),
(61, 'Dominica'),
(62, 'Dominican Republic'),
(63, 'Ecuador'),
(64, 'Egypt'),
(65, 'El Salvador'),
(66, 'Equatorial Guinea'),
(67, 'Eritrea'),
(68, 'Estonia'),
(69, 'Ethiopia'),
(70, 'Falkland Islands (Malvina'),
(71, 'Faroe Islands'),
(72, 'Fiji'),
(73, 'Finland'),
(74, 'France'),
(75, 'French Guiana'),
(76, 'French Polynesia'),
(77, 'French Southern Territori'),
(78, 'Gabon'),
(79, 'Gambia'),
(80, 'Georgia'),
(81, 'Germany'),
(82, 'Ghana'),
(83, 'Gibraltar'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guernsey'),
(91, 'Guinea'),
(92, 'Guinea-Bissau'),
(93, 'Guyana'),
(94, 'Haiti'),
(95, 'Heard Island And Mcdonald'),
(96, 'Holy See (Vatican City St'),
(97, 'Honduras'),
(98, 'Hong Kong'),
(99, 'Hungary'),
(100, 'Iceland'),
(101, 'India'),
(102, 'Indonesia'),
(103, 'Iran, Islamic Republic Of'),
(104, 'Iraq'),
(105, 'Ireland'),
(106, 'Isle Of Man'),
(107, 'Israel'),
(108, 'Italy'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jersey'),
(112, 'Jordan'),
(113, 'Kazakhstan'),
(114, 'Kenya'),
(115, 'Kiribati'),
(116, 'Korea, Democratic People'''),
(117, 'Korea, Republic Of'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People''S Democratic R'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macao'),
(130, 'Macedonia, The Former Yug'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated Sta'),
(144, 'Moldova, Republic Of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montserrat'),
(148, 'Morocco'),
(149, 'Mozambique'),
(150, 'Myanmar'),
(151, 'Namibia'),
(152, 'Nauru'),
(153, 'Nepal'),
(154, 'Netherlands'),
(155, 'Netherlands Antilles'),
(156, 'New Caledonia'),
(157, 'New Zealand'),
(158, 'Nicaragua'),
(159, 'Niger'),
(160, 'Nigeria'),
(161, 'Niue'),
(162, 'Norfolk Island'),
(163, 'Northern Mariana Islands'),
(164, 'Norway'),
(165, 'Oman'),
(166, 'Pakistan'),
(167, 'Palau'),
(168, 'Palestinian Territory, Oc'),
(169, 'Panama'),
(170, 'Papua New Guinea'),
(171, 'Paraguay'),
(172, 'Peru'),
(173, 'Philippines'),
(174, 'Pitcairn'),
(175, 'Poland'),
(176, 'Portugal'),
(177, 'Puerto Rico'),
(178, 'Qatar'),
(179, 'Reunion'),
(180, 'Romania'),
(181, 'Russian Federation'),
(182, 'Rwanda'),
(183, 'Saint Helena'),
(184, 'Saint Kitts And Nevis'),
(185, 'Saint Lucia'),
(186, 'Saint Pierre And Miquelon'),
(187, 'Saint Vincent And The Gre'),
(188, 'Samoa'),
(189, 'San Marino'),
(190, 'Sao Tome And Principe'),
(191, 'Saudi Arabia'),
(192, 'Senegal'),
(193, 'Serbia And Montenegro'),
(194, 'Seychelles'),
(195, 'Sierra Leone'),
(196, 'Singapore'),
(197, 'Slovakia'),
(198, 'Slovenia'),
(199, 'Solomon Islands'),
(200, 'Somalia'),
(201, 'South Africa'),
(202, 'South Georgia And The Sou'),
(203, 'Spain'),
(204, 'Sri Lanka'),
(205, 'Sudan'),
(206, 'Suriname'),
(207, 'Svalbard And Jan Mayen'),
(208, 'Swaziland'),
(209, 'Sweden'),
(210, 'Switzerland'),
(211, 'Syrian Arab Republic'),
(212, 'Taiwan, Province Of China'),
(213, 'Tajikistan'),
(214, 'Tanzania, United Republic'),
(215, 'Thailand'),
(216, 'Timor-Leste'),
(217, 'Togo'),
(218, 'Tokelau'),
(219, 'Tonga'),
(220, 'Trinidad And Tobago'),
(221, 'Tunisia'),
(222, 'Turkey'),
(223, 'Turkmenistan'),
(224, 'Turks And Caicos Islands'),
(225, 'Tuvalu'),
(226, 'Uganda'),
(227, 'Ukraine'),
(228, 'United Arab Emirates'),
(229, 'United Kingdom'),
(230, 'United States'),
(231, 'United States Minor Outly'),
(232, 'Uruguay'),
(233, 'Uzbekistan'),
(234, 'Vanuatu'),
(235, 'Venezuela'),
(236, 'Viet Nam'),
(237, 'Virgin Islands, British'),
(238, 'Virgin Islands, U.S.'),
(239, 'Wallis And Futuna'),
(240, 'Western Sahara'),
(241, 'Yemen'),
(242, 'Zambia'),
(243, 'Zimbabwe'),
(244, '(Not Specified)');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_number` bigint(20) NOT NULL,
  `employment_status` varchar(15) NOT NULL,
  `marital_status` varchar(9) NOT NULL,
  `nssf_number` varchar(25) NOT NULL,
  `kra_pin` varchar(25) NOT NULL,
  `mailing_address` varchar(20) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `technical_qualifications` varchar(250) NOT NULL,
  `number_of_children` smallint(6) NOT NULL,
  `spouse` varchar(40) NOT NULL,
  `bank` varchar(40) NOT NULL,
  `account_number` varchar(25) NOT NULL,
  `schools_attended` varchar(250) NOT NULL,
  `contact_telephone` varchar(20) NOT NULL,
  `contact_person` varchar(40) NOT NULL,
  `post` varchar(2) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_of_birth` varchar(15) NOT NULL,
  `address` varchar(25) NOT NULL,
  `nhif_number` varchar(25) NOT NULL,
  `job_group` varchar(15) NOT NULL,
  `pension_fund_number` varchar(25) NOT NULL,
  `academic_qualifications` varchar(200) NOT NULL,
  `bank_branch` varchar(40) NOT NULL,
  `date_created` varchar(15) NOT NULL,
  `professional_qualifications` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_number`, `employment_status`, `marital_status`, `nssf_number`, `kra_pin`, `mailing_address`, `religion`, `technical_qualifications`, `number_of_children`, `spouse`, `bank`, `account_number`, `schools_attended`, `contact_telephone`, `contact_person`, `post`, `name`, `phone`, `gender`, `date_of_birth`, `address`, `nhif_number`, `job_group`, `pension_fund_number`, `academic_qualifications`, `bank_branch`, `date_created`, `professional_qualifications`) VALUES
(1, 10000, '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00 00:0', ''),
(2, 10002, 'Permanent', 'Unmarried', '4562', '5563', 'Kitengela', 'Pagan', '', 0, 'N/A', '4', '45223664', 'Strathmore University', 'N/A', 'N/A', '1', 'Jeremiah Rugunya', '0721733117', 'Male', '04/10/1985', 'Kitengela', '5521', 'C', '4412', 'Honors Degree Business and Commerce', 'Nairobi', '0000-00-00 00:0', '2');

-- --------------------------------------------------------

--
-- Table structure for table `employee_benefits`
--

CREATE TABLE IF NOT EXISTS `employee_benefits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee` bigint(20) NOT NULL,
  `benefit` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_idx` (`employee`),
  KEY `benefit_idx` (`benefit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE IF NOT EXISTS `employers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employer_name` varchar(40) NOT NULL,
  `company` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `flock`
--

CREATE TABLE IF NOT EXISTS `flock` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_number` bigint(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `member_group` bigint(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `date_of_birth` date NOT NULL,
  `house` varchar(40) NOT NULL,
  `profession` varchar(40) NOT NULL,
  `other_language` varchar(15) NOT NULL,
  `child_first_name` varchar(20) NOT NULL,
  `child_surname` varchar(20) NOT NULL,
  `child_last_name` varchar(20) NOT NULL,
  `employer` smallint(6) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `disability_status` varchar(20) NOT NULL,
  `level_of_education` varchar(25) NOT NULL,
  `place_of_work` varchar(40) NOT NULL,
  `darasa` varchar(15) NOT NULL,
  `school` varchar(40) NOT NULL,
  `national_id` varchar(15) NOT NULL,
  `passport` varchar(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  `parent` smallint(6) NOT NULL,
  `spouse` varchar(40) NOT NULL,
  `parent_name` varchar(40) NOT NULL,
  `children` varchar(2) NOT NULL,
  `residence` varchar(25) NOT NULL,
  `physical_address` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `date_created` datetime NOT NULL,
  `nationality` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_number_idx` (`member_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `flock`
--

INSERT INTO `flock` (`id`, `member_number`, `first_name`, `surname`, `last_name`, `member_group`, `phone`, `gender`, `date_of_birth`, `house`, `profession`, `other_language`, `child_first_name`, `child_surname`, `child_last_name`, `employer`, `marital_status`, `disability_status`, `level_of_education`, `place_of_work`, `darasa`, `school`, `national_id`, `passport`, `country`, `parent`, `spouse`, `parent_name`, `children`, `residence`, `physical_address`, `email`, `date_created`, `nationality`) VALUES
(1, 10000, '', '', '', 0, '', '', '0000-00-00', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '0000-00-00 00:00:00', 0),
(2, 10001, 'Kennedy', 'Mwathi', 'Gitau', 2, '721333666', 'Male', '1970-02-28', '', '', '', '', '', '', 0, '', '', 'Masters', '', '', 'Strathmore University', '4563217', '', 'English', 0, '', '', '', 'Narok', 'Narok', 'kenmwathi@gmail.com', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(40) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `description`) VALUES
(1, 'Brigade', ''),
(2, 'Kenya Anglican Men''s Association', ''),
(3, 'Kenya Anglican Women''s Association', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_groups`
--

CREATE TABLE IF NOT EXISTS `job_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `job_group` varchar(15) NOT NULL,
  `description` varchar(200) NOT NULL,
  `salary` bigint(20) NOT NULL,
  `benefit` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `450` (`job_group`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `job_groups`
--

INSERT INTO `job_groups` (`id`, `job_group`, `description`, `salary`, `benefit`) VALUES
(1, 'A', '', 10000, 3),
(2, 'A', '', 10000, 4),
(3, 'B', 'Middle Tier', 20000, 3),
(4, 'B', 'Middle Tier', 20000, 4),
(5, 'B', 'Middle Tier', 20000, 5),
(6, 'A', 'Sht Tier', 10000, 0),
(7, 'C', 'Top Tier', 80000, 3),
(8, 'C', 'Top Tier', 80000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `member_groups`
--

CREATE TABLE IF NOT EXISTS `member_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_number` bigint(20) NOT NULL,
  `groupings` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_number_idx` (`member_number`),
  KEY `groupings_idx` (`groupings`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `partakings`
--

CREATE TABLE IF NOT EXISTS `partakings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank_account` int(15) NOT NULL,
  `transaction_value` bigint(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `partakings`
--

INSERT INTO `partakings` (`id`, `bank_account`, `transaction_value`, `date`) VALUES
(97, 2, 500000, '2013-04-26'),
(98, 9, 300000, '2013-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `paygrade`
--

CREATE TABLE IF NOT EXISTS `paygrade` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `days_paid` varchar(15) NOT NULL,
  `sick_leave` varchar(15) NOT NULL,
  `month` varchar(15) NOT NULL,
  `year` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE IF NOT EXISTS `payroll` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_number` bigint(20) NOT NULL,
  `pay_period` varchar(25) NOT NULL,
  `account_number` bigint(20) NOT NULL,
  `bank_name` varchar(40) NOT NULL,
  `earnings` varchar(40) NOT NULL,
  `earnings_amount` bigint(20) NOT NULL,
  `deductions` varchar(40) NOT NULL,
  `gross_earnings` bigint(20) NOT NULL,
  `net_salary` bigint(20) NOT NULL,
  `date_created` date NOT NULL,
  `paye` bigint(20) NOT NULL,
  `total_tax_payable` bigint(20) NOT NULL,
  `personal_relief` bigint(20) NOT NULL,
  `total_deductions` bigint(20) NOT NULL,
  `total_benefits` bigint(20) NOT NULL,
  `taxable_pay` bigint(20) NOT NULL,
  `benefit_name` varchar(40) NOT NULL,
  `benefit_value` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_number_idx` (`employee_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

-- --------------------------------------------------------

--
-- Table structure for table `pledges`
--

CREATE TABLE IF NOT EXISTS `pledges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `member_number` bigint(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `address` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `cause` smallint(6) NOT NULL,
  `pledge` varchar(25) NOT NULL,
  `pledge_plan` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_number_idx` (`member_number`),
  KEY `cause_idx` (`cause`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `pay` varchar(7) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `pay`, `description`) VALUES
(1, 'Gardener', '', 'Weeding...the likes');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE IF NOT EXISTS `qualifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `name`, `description`) VALUES
(1, 'Compound Work', 'General care-taking of environs'),
(2, 'Accounting', 'bean counters'),
(3, 'Information Technology', 'l33t h4xx0r5');

-- --------------------------------------------------------

--
-- Table structure for table `reliefs`
--

CREATE TABLE IF NOT EXISTS `reliefs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `rate` varchar(15) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `service_background`
--

CREATE TABLE IF NOT EXISTS `service_background` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_number` bigint(20) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `office` varchar(40) NOT NULL,
  `designation` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_number_idx` (`employee_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sunday`
--

CREATE TABLE IF NOT EXISTS `sunday` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `thousand_youth` bigint(20) NOT NULL,
  `five_hundred_youth` bigint(20) NOT NULL,
  `two_hundred_youth` bigint(20) NOT NULL,
  `hundred_youth` bigint(20) NOT NULL,
  `fifty_youth` bigint(20) NOT NULL,
  `twenty_youth` bigint(20) NOT NULL,
  `ten_youth` bigint(20) NOT NULL,
  `five_youth` bigint(20) NOT NULL,
  `one_youth` bigint(20) NOT NULL,
  `thousand_teens` bigint(20) NOT NULL,
  `five_hundred_teens` bigint(20) NOT NULL,
  `two_hundred_teens` bigint(20) NOT NULL,
  `hundred_teens` bigint(20) NOT NULL,
  `fifty_teens` bigint(20) NOT NULL,
  `twenty_teens` bigint(20) NOT NULL,
  `ten_teens` bigint(20) NOT NULL,
  `five_teens` bigint(20) NOT NULL,
  `one_teens` bigint(20) NOT NULL,
  `thousand_sunday_school` bigint(20) NOT NULL,
  `five_hundred_sunday_school` bigint(20) NOT NULL,
  `two_hundred_sunday_school` bigint(20) NOT NULL,
  `hundred_sunday_school` bigint(20) NOT NULL,
  `fifty_sunday_school` bigint(20) NOT NULL,
  `twenty_sunday_school` bigint(20) NOT NULL,
  `ten_sunday_school` bigint(20) NOT NULL,
  `five_sunday_school` bigint(20) NOT NULL,
  `one_sunday_school` bigint(20) NOT NULL,
  `thousand_english_service` bigint(20) NOT NULL,
  `five_hundred_english_service` bigint(20) NOT NULL,
  `two_hundred_english_service` bigint(20) NOT NULL,
  `hundred_english_service` bigint(20) NOT NULL,
  `fifty_english_service` bigint(20) NOT NULL,
  `twenty_english_service` bigint(20) NOT NULL,
  `ten_english_service` bigint(20) NOT NULL,
  `five_english_service` bigint(20) NOT NULL,
  `one_english_service` bigint(20) NOT NULL,
  `thousand_swahili_service` bigint(20) NOT NULL,
  `five_hundred_swahili_service` bigint(20) NOT NULL,
  `two_hundred_swahili_service` bigint(20) NOT NULL,
  `hundred_swahili_service` bigint(20) NOT NULL,
  `fifty_swahili_service` bigint(20) NOT NULL,
  `twenty_swahili_service` bigint(20) NOT NULL,
  `ten_swahili_service` bigint(20) NOT NULL,
  `five_swahili_service` bigint(20) NOT NULL,
  `one_swahili_service` bigint(20) NOT NULL,
  `thousand_monthly_pledge` bigint(20) NOT NULL,
  `five_hundred_monthly_pledge` bigint(20) NOT NULL,
  `two_hundred_monthly_pledge` bigint(20) NOT NULL,
  `hundred_monthly_pledge` bigint(20) NOT NULL,
  `fifty_monthly_pledge` bigint(20) NOT NULL,
  `twenty_monthly_pledge` bigint(20) NOT NULL,
  `ten_monthly_pledge` bigint(20) NOT NULL,
  `five_monthly_pledge` bigint(20) NOT NULL,
  `one_monthly_pledge` bigint(20) NOT NULL,
  `thousand_thanksgiving` bigint(20) NOT NULL,
  `five_hundred_thanksgiving` bigint(20) NOT NULL,
  `two_hundred_thanksgiving` bigint(20) NOT NULL,
  `hundred_thanksgiving` bigint(20) NOT NULL,
  `fifty_thanksgiving` bigint(20) NOT NULL,
  `twenty_thanksgiving` bigint(20) NOT NULL,
  `ten_thanksgiving` bigint(20) NOT NULL,
  `five_thanksgiving` bigint(20) NOT NULL,
  `one_thanksgiving` bigint(20) NOT NULL,
  `thousand_tithe` bigint(20) NOT NULL,
  `five_hundred_tithe` bigint(20) NOT NULL,
  `two_hundred_tithe` bigint(20) NOT NULL,
  `hundred_tithe` bigint(20) NOT NULL,
  `fifty_tithe` bigint(20) NOT NULL,
  `twenty_tithe` bigint(20) NOT NULL,
  `ten_tithe` bigint(20) NOT NULL,
  `five_tithe` bigint(20) NOT NULL,
  `one_tithe` bigint(20) NOT NULL,
  `cashorcheque` int(15) NOT NULL,
  `bank` int(15) NOT NULL,
  `cheque_amount` int(15) NOT NULL,
  `cheque_number` varchar(40) NOT NULL,
  `drawer` varchar(40) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(40) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(20) NOT NULL,
  `city` varchar(40) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `contact_name` varchar(40) NOT NULL,
  `contact_phone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `company_name`, `email`, `phone`, `address`, `city`, `zip`, `contact_name`, `contact_phone`) VALUES
(1, 'House of Manji', 'hom@gmail.com', '+254632147', 'Parklands', 'Nairobi', '00456', 'Jagprit Singh', '72635963'),
(2, 'KPLC', 'kplc@go.ke', '380630666671', 'anadiskay 10', 'kharkiv', '6164', 'Mwas Mwas', '380630666');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `transaction` text NOT NULL,
  `account_affected_1` varchar(40) NOT NULL,
  `account_affected_1_amount` bigint(20) NOT NULL,
  `account_affected_1_operation` varchar(15) NOT NULL,
  `account_affected_2` varchar(40) NOT NULL,
  `account_affected_2_amount` bigint(20) NOT NULL,
  `account_affected_2_operation` varchar(15) NOT NULL,
  `ending_balance` bigint(20) NOT NULL,
  `identifier` bigint(20) NOT NULL,
  `transaction_id` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `date`, `transaction`, `account_affected_1`, `account_affected_1_amount`, `account_affected_1_operation`, `account_affected_2`, `account_affected_2_amount`, `account_affected_2_operation`, `ending_balance`, `identifier`, `transaction_id`) VALUES
(197, '2013-04-26', 'Deposit to account: Petty Cash', '2', 500000, 'Debit', 'Cash', 500000, 'Credit', 500000, 0, ''),
(198, '2013-04-26', 'Deposit to account: Test', '9', 600000, 'Debit', 'Cash', 600000, 'Credit', 600000, 0, ''),
(199, '2013-04-26', 'Cheque Payment towards James Kinyua', 'General Expense', 300000, 'Debit', '9', 300000, 'Credit', 300000, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(120) NOT NULL,
  `email` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'David Njoroge', 'dmwathi', '255661921f4ad57d02b1de9062eb6421', 'mwathidavid85@gmail.com'),
(3, 'Matthew Hawi', 'thehawis', 'e790d9373ceea85d29be083dcdb3ac6a', 'matthawi@gmail.com'),
(4, 'Millicent Saina', 'mina', '91b827e257eeae8e5989d961fe3011df', 'mobetsaina@gmail.com'),
(5, 'Emmanuel Mwathi', 'fiasko', '14e1b600b1fd579f47433b88e8d85291', 'killahkillah@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contributions`
--
ALTER TABLE `contributions`
  ADD CONSTRAINT `contributions_member_number_flock_member_number` FOREIGN KEY (`member_number`) REFERENCES `flock` (`member_number`);

--
-- Constraints for table `member_groups`
--
ALTER TABLE `member_groups`
  ADD CONSTRAINT `member_groups_member_number_flock_member_number` FOREIGN KEY (`member_number`) REFERENCES `flock` (`member_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
