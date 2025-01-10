-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 10, 2025 at 11:53 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Incla`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_departments`
--

CREATE TABLE `academic_departments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `college_id` int(11) UNSIGNED NOT NULL,
  `status` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` blob,
  `imageExt` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_departments`
--

CREATE TABLE `admin_departments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent_id` int(11) UNSIGNED DEFAULT NULL,
  `hod_id` int(20) NOT NULL,
  `academic_department_id` int(11) NOT NULL,
  `status` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admission_sessions`
--

CREATE TABLE `admission_sessions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admission_sessions`
--

INSERT INTO `admission_sessions` (`id`, `name`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '2024/2025', '2025-01-02', '2026-01-01', 1, '2025-01-10 11:48:03', '2025-01-10 11:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `admission_types`
--

CREATE TABLE `admission_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `route` varchar(25) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_type`
--

CREATE TABLE `applicant_type` (
  `id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `approved_applicants`
--

CREATE TABLE `approved_applicants` (
  `user_id` int(11) NOT NULL,
  `approval_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved_by` int(11) NOT NULL,
  `comment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) UNSIGNED NOT NULL,
  `old_values` longtext COLLATE utf8mb4_unicode_ci,
  `new_values` longtext COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bank_id` int(20) NOT NULL,
  `bank_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `bank_name`) VALUES
(1, 'Access Bank'),
(2, 'Afribank'),
(3, 'Diamond Bank'),
(4, 'EcoBank'),
(5, 'Equitorial Trust Bank'),
(6, 'First City Monument Bank'),
(7, 'Fidelity Bank'),
(8, 'First Bank Plc'),
(9, 'First Inland Bank'),
(10, 'Guaranty Trust Bank'),
(11, 'IBTC-Chartered Bank'),
(12, 'Intercontinental Bank'),
(13, 'Nigeria International Bank'),
(14, 'Oceanic Bank'),
(15, 'Platinum Bank'),
(16, 'Skye Bank'),
(17, 'Spring Bank'),
(18, 'Stanbic Bank'),
(19, 'Standard Chartered Bank'),
(20, 'United Bank of Africa'),
(21, 'Sterling Bank'),
(22, 'Union Bank'),
(23, 'Unity Bank'),
(24, 'Wema Bank'),
(25, 'Zenith Bank Plc');

-- --------------------------------------------------------

--
-- Table structure for table `bursary_sessions`
--

CREATE TABLE `bursary_sessions` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_slider`
--

CREATE TABLE `cms_slider` (
  `id` int(10) NOT NULL,
  `image` longblob NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `dean_id` int(20) NOT NULL,
  `status` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `code`, `name`, `dean_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MSAT', 'Management ,Science, Arts and Technology', 6, 1, NULL, NULL),
(2, 'NAS', 'Natural and Applied Science', 2, 1, NULL, NULL),
(3, 'EDU', 'Faculty of Education', 11, 1, NULL, '2022-11-17 14:00:43'),
(4, 'HUM', 'Humanities', 0, 1, NULL, NULL),
(5, 'MAS', 'MANAGEMENT SCIENCES', 0, 1, NULL, NULL),
(6, 'SOS', 'SOCIAL SCIENCES ', 0, 1, NULL, NULL),
(7, 'ENG', 'Engineering', 345, 1, NULL, '2023-03-03 15:23:20'),
(8, 'LAW ', 'LAW FACULTY', 11, 1, '2021-11-17 06:50:33', '2021-11-17 06:50:33'),
(9, 'ETH', 'Ecclesiastical  Faculty of Theology', 191, 1, '2023-04-20 08:46:54', '2023-04-20 08:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `fphone` varchar(20) DEFAULT NULL,
  `foccupation` varchar(100) DEFAULT NULL,
  `faddress` varchar(255) DEFAULT NULL,
  `mname` varchar(100) DEFAULT NULL,
  `mphone` varchar(20) DEFAULT NULL,
  `moccupation` varchar(100) DEFAULT NULL,
  `maddress` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `status`) VALUES
(1, 'Afghanistan', 1),
(2, 'Aland', 1),
(3, 'Albania', 1),
(4, 'Algeria', 1),
(5, 'American Samoa', 1),
(6, 'Andorra', 1),
(7, 'Angola', 1),
(8, 'Anguilla', 1),
(9, 'Antarctica', 1),
(10, 'Antigua and Barbuda', 1),
(11, 'Argentina', 1),
(12, 'Armenia ', 1),
(13, 'Aruba', 1),
(14, 'Ashmore and CartierIslands', 1),
(15, 'Australia', 1),
(16, 'Austria', 1),
(17, 'Azerbaijan', 1),
(18, 'The Bahamas', 1),
(19, 'Bahrain', 1),
(20, 'BakerI sland', 1),
(21, 'Bangladesh', 1),
(22, 'Barbados', 1),
(23, 'Bassas da India', 1),
(24, 'Belarus', 1),
(25, 'Belgium', 1),
(26, 'Belize', 1),
(27, 'Benin', 1),
(28, 'Bermuda', 1),
(29, 'Bhutan', 1),
(30, 'Bolivia', 1),
(31, 'Bosnia and Herzegovina', 1),
(32, 'Botswana', 1),
(33, 'Bouvet Island', 1),
(34, 'Brazil', 1),
(35, 'British Indian Ocean Territory', 1),
(36, 'British Virgin Islands', 1),
(37, 'Brunei', 1),
(38, 'Bulgaria', 1),
(39, 'Burkina Faso', 1),
(40, 'Burundi', 1),
(41, 'Cambodia', 1),
(42, 'Cameroon', 1),
(43, 'Canada', 1),
(44, 'Cape Verde', 1),
(45, 'Cayman Islands', 1),
(46, 'Central African Republic', 1),
(47, 'Chad', 1),
(48, 'Chile', 1),
(49, 'China', 1),
(50, 'Christmas Island', 1),
(51, 'Clipperton Island', 1),
(52, 'Cocos (Keeling) Islands', 1),
(53, 'Colombia', 1),
(54, 'Comoros', 1),
(55, 'Congo', 1),
(56, 'Cook Islands', 1),
(57, 'Coral Sea Islands', 1),
(58, 'Costa Rica', 1),
(59, 'Cote d Ivoire', 1),
(60, 'Croatia', 1),
(61, 'Cuba', 1),
(62, 'Cyprus', 1),
(63, 'Czech Republic', 1),
(64, 'Democratic Republic of the Congo', 1),
(65, 'Denmark', 1),
(66, 'Djibouti', 1),
(67, 'Dominica', 1),
(68, 'Dominican Republic', 1),
(69, 'Ecuador', 1),
(70, 'Egypt', 1),
(71, 'El Salvador', 1),
(72, 'Equatorial Guinea', 1),
(73, 'Eritrea', 1),
(74, 'Estonia', 1),
(75, 'Ethiopia', 1),
(76, 'Europa Island', 1),
(77, 'Falkland Islands (Islas Malvinas)', 1),
(78, 'Faroe Islands', 1),
(79, 'Fiji', 1),
(80, 'Finland', 1),
(81, 'France', 1),
(82, 'French Guiana', 1),
(83, 'French Polynesia', 1),
(84, 'French Southern and Antarctic Lands', 1),
(85, 'Gabon', 1),
(86, 'The Gambia', 1),
(87, 'Gaza Strip', 1),
(88, 'Georgia', 1),
(89, 'Germany', 1),
(90, 'Ghana', 1),
(91, 'Gibraltar', 1),
(92, 'Glorioso Islands', 1),
(93, 'Greece', 1),
(94, 'Greenland', 1),
(95, 'Grenada', 1),
(96, 'Guadeloupe', 1),
(97, 'Guam', 1),
(98, 'Guatemala', 1),
(99, 'Guernsey', 1),
(100, 'Guinea', 1),
(101, 'Guinea-Bissau', 1),
(102, 'Guyana', 1),
(103, 'Haiti', 1),
(104, 'Heard Island and McDonald Islands', 1),
(105, 'Holy See (Vatican City)', 1),
(106, 'Honduras', 1),
(107, 'Hong Kong', 1),
(108, 'Howland Island', 1),
(109, 'Hungary', 1),
(110, 'Iceland', 1),
(111, 'India', 1),
(112, 'Indonesia', 1),
(113, 'Iran', 1),
(114, 'Iraq', 1),
(115, 'Ireland', 1),
(116, 'Isle of Man', 1),
(117, 'Israel', 1),
(118, 'Italy', 1),
(119, 'Jamaica', 1),
(120, 'Jan Mayen', 1),
(121, 'Japan', 1),
(122, 'Jarvis Island', 1),
(123, 'Jersey', 1),
(124, 'Johnston Atoll', 1),
(125, 'Jordan', 1),
(126, 'Juan de Nova Island', 1),
(127, 'Kazakhstan', 1),
(128, 'Kenya', 1),
(129, 'Kingman Reef', 1),
(130, 'Kiribati', 1),
(131, 'Kuwait', 1),
(132, 'Kyrgyzstan', 1),
(133, 'Laos', 1),
(134, 'Latvia', 1),
(135, 'Lebanon', 1),
(136, 'Lesotho', 1),
(137, 'Liberia', 1),
(138, 'Libya', 1),
(139, 'Liechtenstein', 1),
(140, 'Lithuania', 1),
(141, 'Luxembourg', 1),
(142, 'Macau', 1),
(143, 'Macedonia', 1),
(144, 'Madagascar', 1),
(145, 'Malawi', 1),
(146, 'Malaysia', 1),
(147, 'Maldives', 1),
(148, 'Mali', 1),
(149, 'Malta', 1),
(150, 'Marshall Islands', 1),
(151, 'Martinique', 1),
(152, 'Mauritania', 1),
(153, 'Mauritius', 1),
(154, 'Mayotte', 1),
(155, 'Mexico', 1),
(156, 'Micronesia', 1),
(157, 'Midway Islands', 1),
(158, 'Moldova', 1),
(159, 'Monaco', 1),
(160, 'Mongolia', 1),
(161, 'Montenegro', 1),
(162, 'Montserrat', 1),
(163, 'Morocco', 1),
(164, 'Mozambique', 1),
(165, 'Myanmar (Burma)', 1),
(166, 'Namibia', 1),
(167, 'Nauru', 1),
(168, 'Nepal', 1),
(169, 'Netherlands', 1),
(170, 'Netherlands Antilles', 1),
(171, 'New Caledonia', 1),
(172, 'New Zealand', 1),
(173, 'Nicaragua', 1),
(174, 'Niger', 1),
(175, 'Nigeria', 1),
(176, 'Niue', 1),
(177, 'Norfolk Island', 1),
(178, 'North Korea', 1),
(179, 'Northern Mariana Islands', 1),
(180, 'Norway', 1),
(181, 'Oman', 1),
(182, 'Pakistan', 1),
(183, 'Palau', 1),
(184, 'Palmyra Atoll', 1),
(185, 'Panama', 1),
(186, 'Papua New Guinea', 1),
(187, 'Paraguay', 1),
(188, 'Peru', 1),
(189, 'Philippines', 1),
(190, 'Pitcairn Islands', 1),
(191, 'Poland', 1),
(192, 'Portugal', 1),
(193, 'Puerto Rico', 1),
(194, 'Qatar', 1),
(195, 'Reunion', 1),
(196, 'Romania', 1),
(197, 'Russia', 1),
(198, 'Rwanda', 1),
(199, 'Saint Helena', 1),
(200, 'Saint Kitts and Nevis', 1),
(201, 'Saint Lucia', 1),
(202, 'Saint Martin', 1),
(203, 'Saint Pierre and Miquelon', 1),
(204, 'Saint Vincent and the Grenadines', 1),
(205, 'Samoa', 1),
(206, 'San Marino', 1),
(207, 'SaoTomePrincipe', 1),
(208, 'Saudi Arabia', 1),
(209, 'Senegal', 1),
(210, 'Serbia', 1),
(211, 'Seychelles', 1),
(212, 'Sierra Leone', 1),
(213, 'Singapore', 1),
(214, 'Slovakia', 1),
(215, 'Slovenia', 1),
(216, 'Solomon Islands', 1),
(217, 'Somalia', 1),
(218, 'South Africa', 1),
(219, 'South Georgia and the South Sandwich Islands', 1),
(220, 'South Korea', 1),
(221, 'Spain', 1),
(222, 'Sri Lanka', 1),
(223, 'Sudan', 1),
(224, 'Suriname', 1),
(225, 'Svalbard', 1),
(226, 'Swaziland', 1),
(227, 'Sweden', 1),
(228, 'Switzerland', 1),
(229, 'Syria', 1),
(230, 'Taiwan', 1),
(231, 'Tajikistan', 1),
(232, 'Tanzania', 1),
(233, 'Thailand', 1),
(234, 'Timor-Leste', 1),
(235, 'Togo', 1),
(236, 'Tokelau', 1),
(237, 'Tonga', 1),
(238, 'Trinidad and Tobago', 1),
(239, 'Tromelin Island', 1),
(240, 'Tunisia', 1),
(241, 'Turkey', 1),
(242, 'Turkmenistan', 1),
(243, 'Turks and Caicos Islands', 1),
(244, 'Tuvalu', 1),
(245, 'Uganda', 1),
(246, 'Ukraine', 1),
(247, 'United Arab Emirates', 1),
(248, 'United Kingdom', 1),
(249, 'United States', 1),
(250, 'Uruguay', 1),
(251, 'Uzbekistan', 1),
(252, 'Vanuatu', 1),
(253, 'Venezuela', 1),
(254, 'Vietnam', 1),
(255, 'Virgin Islands', 1),
(256, 'Wake Island', 1),
(257, 'Wallis and Futuna', 1),
(258, 'West Bank', 1),
(259, 'Western Sahara', 1),
(260, 'Yemen', 1),
(261, 'Zambia', 1),
(262, 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country_codes`
--

CREATE TABLE `country_codes` (
  `countrycode` char(3) NOT NULL,
  `countryname` varchar(200) NOT NULL,
  `code` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country_codes`
--

INSERT INTO `country_codes` (`countrycode`, `countryname`, `code`) VALUES
('ABW', 'Aruba', 'AW'),
('AFG', 'Afghanistan', 'AF'),
('AGO', 'Angola', 'AO'),
('AIA', 'Anguilla', 'AI'),
('ALA', 'Åland', 'AX'),
('ALB', 'Albania', 'AL'),
('AND', 'Andorra', 'AD'),
('ARE', 'United Arab Emirates', 'AE'),
('ARG', 'Argentina', 'AR'),
('ARM', 'Armenia', 'AM'),
('ASM', 'American Samoa', 'AS'),
('ATA', 'Antarctica', 'AQ'),
('ATF', 'French Southern Territories', 'TF'),
('ATG', 'Antigua and Barbuda', 'AG'),
('AUS', 'Australia', 'AU'),
('AUT', 'Austria', 'AT'),
('AZE', 'Azerbaijan', 'AZ'),
('BDI', 'Burundi', 'BI'),
('BEL', 'Belgium', 'BE'),
('BEN', 'Benin', 'BJ'),
('BES', 'Bonaire', 'BQ'),
('BFA', 'Burkina Faso', 'BF'),
('BGD', 'Bangladesh', 'BD'),
('BGR', 'Bulgaria', 'BG'),
('BHR', 'Bahrain', 'BH'),
('BHS', 'Bahamas', 'BS'),
('BIH', 'Bosnia and Herzegovina', 'BA'),
('BLM', 'Saint Barthélemy', 'BL'),
('BLR', 'Belarus', 'BY'),
('BLZ', 'Belize', 'BZ'),
('BMU', 'Bermuda', 'BM'),
('BOL', 'Bolivia', 'BO'),
('BRA', 'Brazil', 'BR'),
('BRB', 'Barbados', 'BB'),
('BRN', 'Brunei', 'BN'),
('BTN', 'Bhutan', 'BT'),
('BVT', 'Bouvet Island', 'BV'),
('BWA', 'Botswana', 'BW'),
('CAF', 'Central African Republic', 'CF'),
('CAN', 'Canada', 'CA'),
('CCK', 'Cocos [Keeling] Islands', 'CC'),
('CHE', 'Switzerland', 'CH'),
('CHL', 'Chile', 'CL'),
('CHN', 'China', 'CN'),
('CIV', 'Ivory Coast', 'CI'),
('CMR', 'Cameroon', 'CM'),
('COD', 'Democratic Republic of the Congo', 'CD'),
('COG', 'Republic of the Congo', 'CG'),
('COK', 'Cook Islands', 'CK'),
('COL', 'Colombia', 'CO'),
('COM', 'Comoros', 'KM'),
('CPV', 'Cape Verde', 'CV'),
('CRI', 'Costa Rica', 'CR'),
('CUB', 'Cuba', 'CU'),
('CUW', 'Curacao', 'CW'),
('CXR', 'Christmas Island', 'CX'),
('CYM', 'Cayman Islands', 'KY'),
('CYP', 'Cyprus', 'CY'),
('CZE', 'Czech Republic', 'CZ'),
('DEU', 'Germany', 'DE'),
('DJI', 'Djibouti', 'DJ'),
('DMA', 'Dominica', 'DM'),
('DNK', 'Denmark', 'DK'),
('DOM', 'Dominican Republic', 'DO'),
('DZA', 'Algeria', 'DZ'),
('ECU', 'Ecuador', 'EC'),
('EGY', 'Egypt', 'EG'),
('ERI', 'Eritrea', 'ER'),
('ESH', 'Western Sahara', 'EH'),
('ESP', 'Spain', 'ES'),
('EST', 'Estonia', 'EE'),
('ETH', 'Ethiopia', 'ET'),
('FIN', 'Finland', 'FI'),
('FJI', 'Fiji', 'FJ'),
('FLK', 'Falkland Islands', 'FK'),
('FRA', 'France', 'FR'),
('FRO', 'Faroe Islands', 'FO'),
('FSM', 'Micronesia', 'FM'),
('GAB', 'Gabon', 'GA'),
('GBR', 'United Kingdom', 'GB'),
('GEO', 'Georgia', 'GE'),
('GGY', 'Guernsey', 'GG'),
('GHA', 'Ghana', 'GH'),
('GIB', 'Gibraltar', 'GI'),
('GIN', 'Guinea', 'GN'),
('GLP', 'Guadeloupe', 'GP'),
('GMB', 'Gambia', 'GM'),
('GNB', 'Guinea-Bissau', 'GW'),
('GNQ', 'Equatorial Guinea', 'GQ'),
('GRC', 'Greece', 'GR'),
('GRD', 'Grenada', 'GD'),
('GRL', 'Greenland', 'GL'),
('GTM', 'Guatemala', 'GT'),
('GUF', 'French Guiana', 'GF'),
('GUM', 'Guam', 'GU'),
('GUY', 'Guyana', 'GY'),
('HKG', 'Hong Kong', 'HK'),
('HMD', 'Heard Island and McDonald Islands', 'HM'),
('HND', 'Honduras', 'HN'),
('HRV', 'Croatia', 'HR'),
('HTI', 'Haiti', 'HT'),
('HUN', 'Hungary', 'HU'),
('IDN', 'Indonesia', 'ID'),
('IMN', 'Isle of Man', 'IM'),
('IND', 'India', 'IN'),
('IOT', 'British Indian Ocean Territory', 'IO'),
('IRL', 'Ireland', 'IE'),
('IRN', 'Iran', 'IR'),
('IRQ', 'Iraq', 'IQ'),
('ISL', 'Iceland', 'IS'),
('ISR', 'Israel', 'IL'),
('ITA', 'Italy', 'IT'),
('JAM', 'Jamaica', 'JM'),
('JEY', 'Jersey', 'JE'),
('JOR', 'Jordan', 'JO'),
('JPN', 'Japan', 'JP'),
('KAZ', 'Kazakhstan', 'KZ'),
('KEN', 'Kenya', 'KE'),
('KGZ', 'Kyrgyzstan', 'KG'),
('KHM', 'Cambodia', 'KH'),
('KIR', 'Kiribati', 'KI'),
('KNA', 'Saint Kitts and Nevis', 'KN'),
('KOR', 'South Korea', 'KR'),
('KWT', 'Kuwait', 'KW'),
('LAO', 'Laos', 'LA'),
('LBN', 'Lebanon', 'LB'),
('LBR', 'Liberia', 'LR'),
('LBY', 'Libya', 'LY'),
('LCA', 'Saint Lucia', 'LC'),
('LIE', 'Liechtenstein', 'LI'),
('LKA', 'Sri Lanka', 'LK'),
('LSO', 'Lesotho', 'LS'),
('LTU', 'Lithuania', 'LT'),
('LUX', 'Luxembourg', 'LU'),
('LVA', 'Latvia', 'LV'),
('MAC', 'Macao', 'MO'),
('MAF', 'Saint Martin', 'MF'),
('MAR', 'Morocco', 'MA'),
('MCO', 'Monaco', 'MC'),
('MDA', 'Moldova', 'MD'),
('MDG', 'Madagascar', 'MG'),
('MDV', 'Maldives', 'MV'),
('MEX', 'Mexico', 'MX'),
('MHL', 'Marshall Islands', 'MH'),
('MKD', 'Macedonia', 'MK'),
('MLI', 'Mali', 'ML'),
('MLT', 'Malta', 'MT'),
('MMR', 'Myanmar [Burma]', 'MM'),
('MNE', 'Montenegro', 'ME'),
('MNG', 'Mongolia', 'MN'),
('MNP', 'Northern Mariana Islands', 'MP'),
('MOZ', 'Mozambique', 'MZ'),
('MRT', 'Mauritania', 'MR'),
('MSR', 'Montserrat', 'MS'),
('MTQ', 'Martinique', 'MQ'),
('MUS', 'Mauritius', 'MU'),
('MWI', 'Malawi', 'MW'),
('MYS', 'Malaysia', 'MY'),
('MYT', 'Mayotte', 'YT'),
('NAM', 'Namibia', 'NA'),
('NCL', 'New Caledonia', 'NC'),
('NER', 'Niger', 'NE'),
('NFK', 'Norfolk Island', 'NF'),
('NGA', 'Nigeria', 'NG'),
('NIC', 'Nicaragua', 'NI'),
('NIU', 'Niue', 'NU'),
('NLD', 'Netherlands', 'NL'),
('NOR', 'Norway', 'NO'),
('NPL', 'Nepal', 'NP'),
('NRU', 'Nauru', 'NR'),
('NZL', 'New Zealand', 'NZ'),
('OMN', 'Oman', 'OM'),
('PAK', 'Pakistan', 'PK'),
('PAN', 'Panama', 'PA'),
('PCN', 'Pitcairn Islands', 'PN'),
('PER', 'Peru', 'PE'),
('PHL', 'Philippines', 'PH'),
('PLW', 'Palau', 'PW'),
('PNG', 'Papua New Guinea', 'PG'),
('POL', 'Poland', 'PL'),
('PRI', 'Puerto Rico', 'PR'),
('PRK', 'North Korea', 'KP'),
('PRT', 'Portugal', 'PT'),
('PRY', 'Paraguay', 'PY'),
('PSE', 'Palestine', 'PS'),
('PYF', 'French Polynesia', 'PF'),
('QAT', 'Qatar', 'QA'),
('REU', 'Réunion', 'RE'),
('ROU', 'Romania', 'RO'),
('RUS', 'Russia', 'RU'),
('RWA', 'Rwanda', 'RW'),
('SAU', 'Saudi Arabia', 'SA'),
('SDN', 'Sudan', 'SD'),
('SEN', 'Senegal', 'SN'),
('SGP', 'Singapore', 'SG'),
('SGS', 'South Georgia and the South Sandwich Islands', 'GS'),
('SHN', 'Saint Helena', 'SH'),
('SJM', 'Svalbard and Jan Mayen', 'SJ'),
('SLB', 'Solomon Islands', 'SB'),
('SLE', 'Sierra Leone', 'SL'),
('SLV', 'El Salvador', 'SV'),
('SMR', 'San Marino', 'SM'),
('SOM', 'Somalia', 'SO'),
('SPM', 'Saint Pierre and Miquelon', 'PM'),
('SRB', 'Serbia', 'RS'),
('SSD', 'South Sudan', 'SS'),
('STP', 'São Tomé and Príncipe', 'ST'),
('SUR', 'Suriname', 'SR'),
('SVK', 'Slovakia', 'SK'),
('SVN', 'Slovenia', 'SI'),
('SWE', 'Sweden', 'SE'),
('SWZ', 'Swaziland', 'SZ'),
('SXM', 'Sint Maarten', 'SX'),
('SYC', 'Seychelles', 'SC'),
('SYR', 'Syria', 'SY'),
('TCA', 'Turks and Caicos Islands', 'TC'),
('TCD', 'Chad', 'TD'),
('TGO', 'Togo', 'TG'),
('THA', 'Thailand', 'TH'),
('TJK', 'Tajikistan', 'TJ'),
('TKL', 'Tokelau', 'TK'),
('TKM', 'Turkmenistan', 'TM'),
('TLS', 'East Timor', 'TL'),
('TON', 'Tonga', 'TO'),
('TTO', 'Trinidad and Tobago', 'TT'),
('TUN', 'Tunisia', 'TN'),
('TUR', 'Turkey', 'TR'),
('TUV', 'Tuvalu', 'TV'),
('TWN', 'Taiwan', 'TW'),
('TZA', 'Tanzania', 'TZ'),
('UGA', 'Uganda', 'UG'),
('UKR', 'Ukraine', 'UA'),
('UMI', 'U.S. Minor Outlying Islands', 'UM'),
('URY', 'Uruguay', 'UY'),
('USA', 'United States', 'US'),
('UZB', 'Uzbekistan', 'UZ'),
('VAT', 'Vatican City', 'VA'),
('VCT', 'Saint Vincent and the Grenadines', 'VC'),
('VEN', 'Venezuela', 'VE'),
('VGB', 'British Virgin Islands', 'VG'),
('VIR', 'U.S. Virgin Islands', 'VI'),
('VNM', 'Vietnam', 'VN'),
('VUT', 'Vanuatu', 'VU'),
('WLF', 'Wallis and Futuna', 'WF'),
('WSM', 'Samoa', 'WS'),
('XKX', 'Kosovo', 'XK'),
('YEM', 'Yemen', 'YE'),
('ZAF', 'South Africa', 'ZA'),
('ZMB', 'Zambia', 'ZM'),
('ZWE', 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `credit_unit` int(11) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `description` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_registrations`
--

CREATE TABLE `course_registrations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `route` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_registrations`
--

INSERT INTO `course_registrations` (`id`, `name`, `status`, `route`, `created_at`, `updated_at`) VALUES
(1, 'OPEN COURSE REGISTRATION', 1, '/course-registration', '2023-06-06 22:26:53', '2023-09-20 20:59:15'),
(2, 'CLOSE COURSE REGISTRATION ', 0, '/students/closed-course-registration', '2023-06-06 22:26:53', '2023-09-20 20:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `de`
--

CREATE TABLE `de` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `jamb_de_no` varchar(20) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `qualification_year` varchar(100) NOT NULL,
  `qualification_number` varchar(100) NOT NULL,
  `course_applied` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employment_types`
--

CREATE TABLE `employment_types` (
  `id` int(20) NOT NULL,
  `name` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employment_types`
--

INSERT INTO `employment_types` (`id`, `name`) VALUES
(1, 'Full-Time'),
(2, 'Part-Time'),
(3, 'Contract'),
(4, 'Temporary'),
(5, 'Permanent'),
(6, 'Visiting'),
(7, 'Probationary'),
(8, 'Adjunct'),
(9, 'Sabbatical'),
(10, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_questions`
--

CREATE TABLE `evaluation_questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `evaluation_response_type_id` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_question_response`
--

CREATE TABLE `evaluation_question_response` (
  `id` int(11) NOT NULL,
  `evaluation_question_id` int(11) NOT NULL,
  `evaluation_response_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_responses`
--

CREATE TABLE `evaluation_responses` (
  `id` int(11) NOT NULL,
  `response_option` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_response_types`
--

CREATE TABLE `evaluation_response_types` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_results`
--

CREATE TABLE `evaluation_results` (
  `id` int(11) NOT NULL,
  `student_result_id` bigint(20) NOT NULL,
  `evaluation_question_id` int(11) NOT NULL,
  `evaluation_response_id` int(11) NOT NULL,
  `evaluation_answer` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_types`
--

CREATE TABLE `fee_types` (
  `id` bigint(20) NOT NULL,
  `name` varchar(500) NOT NULL,
  `amount` double NOT NULL,
  `provider` varchar(100) NOT NULL,
  `delivery_code` int(11) NOT NULL,
  `gender_code` int(11) NOT NULL,
  `provider_code` bigint(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `category` int(11) NOT NULL,
  `college_id` int(5) DEFAULT NULL,
  `installment` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `percentage` varchar(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fee_types`
--

INSERT INTO `fee_types` (`id`, `name`, `amount`, `provider`, `delivery_code`, `gender_code`, `provider_code`, `status`, `category`, `college_id`, `installment`, `created_at`, `percentage`, `updated_at`) VALUES
(1, 'Application Fee (Under Graduate)  (₦7000)', 7000, ' Remita ', 1, 1, 8377164038, 2, 1, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(2, 'Acceptance fees (Undergraduate ) (₦100000)', 100000, ' Remita ', 1, 1, 8377259824, 2, 2, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(3, 'Application Fees (Postgraduate) (₦10000)', 10000, ' Remita ', 1, 1, 8377188928, 2, 1, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(4, 'Acceptance Fees (Postgraduate) (₦50000)', 50000, ' Remita ', 1, 1, 8377183434, 2, 2, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(5, ' Carry Over Courses (₦10000) ', 10000, ' Remita ', 1, 1, 8994193791, 2, 4, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(6, ' Late Course Registration (₦10000) ', 10000, ' Remita ', 1, 1, 8377181032, 2, 4, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(7, ' Lost ID Card (₦5000) ', 5000, ' Remita ', 1, 1, 8377179660, 2, 4, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(8, 'Summer Program (₦20000)', 20000, ' Remita ', 1, 1, 9655528976, 2, 4, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(9, 'Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel A-J - Full Payment (₦ 833000 )', 833000, ' Remita ', 1, 1, 9069938494, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(10, 'Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel K - Full Payment (₦ 863000 )', 863000, ' Remita ', 1, 1, 9069764165, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(11, 'Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel L - Full Payment (₦ 883000 )', 883000, ' Remita ', 1, 1, 9069720384, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(12, 'Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel M - Full Payment (₦ 903000 )', 903000, ' Remita ', 1, 1, 9069772581, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(13, 'Faculty of Education - Management Sci - Humanities & Social Science students in Female Stanzal Hostel - Full Payment  (₦ 863000 )', 863000, ' Remita ', 1, 2, 9069757251, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(14, 'Faculty of Education - Management Sci - Humanities & Social Science students in Female CICL Hostel - Full Payment (₦ 893000 )', 893000, ' Remita ', 1, 2, 9069526383, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(15, 'Faculty of Education - Management Sci - Humanities & Social Science students without hostel accommodation (PA Etos Female Hostel & Religious) - Full Payment (₦ 693000)', 693000, ' Remita ', 1, 2, 9069768845, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(16, ' Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel A-J – Part Payment  (₦370000)  ', 370000, ' Remita ', 1, 1, 9069739882, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(17, ' Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel K - Part Payment  (₦385000)  ', 385000, ' Remita ', 1, 1, 9069304704, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(18, ' Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel L - Part Payment (₦395000)  ', 395000, ' Remita ', 1, 1, 9069735639, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(19, ' Faculty of Education - Management Sci - Humanities & Social Science students in Male Hostel M - Part Payment  (₦420000)  ', 420000, ' Remita ', 1, 1, 9069741856, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(20, ' Faculty of Education - Management Sci - Humanities & Social Science students in Female Stanzal Hostel - Part Payment (₦385000) ', 385000, ' Remita ', 1, 2, 9069306102, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(21, ' Faculty of Education - Management Sci - Humanities & Social Science students in Female CICL Hostel - Part Payment  (₦395000) ', 395000, ' Remita ', 1, 2, 9069839864, 2, 3, 0, 2, '2022-12-01 11:17:53', '50', '2022-12-01 11:17:53'),
(22, ' Faculty of Education - Management Sci - Humanities & Social Science students without hostel accommodation (PA Etos Female Hostel & Religious) - Part Payment   (₦305000) ', 305000, ' Remita ', 1, 2, 9069842114, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(23, ' Nursing and Pharmacy Students in Male Hostel A-J - Full Payment  (₦1535000) ', 1535000, ' Remita ', 1, 1, 9069529874, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(24, ' Nursing and Pharmacy Students in Male Hostel K - Full Payment (₦1565000) ', 1565000, ' Remita ', 1, 1, 9069766510, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(25, ' Nursing and Pharmacy Students in Male Hostel L - Full Payment (₦1585000) ', 1585000, ' Remita ', 1, 1, 9069310464, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(26, ' Nursing and Pharmacy Students in Male Hostel M - Full Payment  (₦1635000)  ', 1635000, ' Remita ', 1, 1, 9069988826, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(27, ' Nursing and Pharmacy Students in Female Stanzal Hostel - Full Payment Payment (₦1565000) ', 1565000, ' Remita ', 1, 2, 9069983680, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(28, ' Nursing and Pharmacy Students in Female CICL Hostel - Full Payment  (₦1585000) ', 1585000, ' Remita ', 1, 2, 9069816050, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(29, ' Nursing and Pharmacy Students without hostel accommodation (PA Etos Female Hostel & Religious) - Full Payment (₦1405000) ', 1405000, ' Remita ', 1, 2, 9069943897, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(30, ' Nursing and Pharmacy Students in Male Hostel A-J - Part Payment  (₦767500) ', 767500, ' Remita ', 1, 1, 9069805362, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(31, ' Nursing and Pharmacy Students in Male Hostel K - Part Payment (₦782500)  ', 782500, ' Remita ', 1, 1, 9069942646, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(32, ' Nursing and Pharmacy Students in Male Hostel L - Part Payment  (₦792500)  ', 792500, ' Remita ', 1, 1, 9069973436, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(33, ' Nursing and Pharmacy Students in Male Hostel M - Part Payment     (₦817500)  ', 817500, ' Remita ', 1, 1, 9069799320, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(34, ' Nursing and Pharmacy Students in Female Stanzal Hostel - Part Payment  (₦782500)  ', 782500, ' Remita ', 1, 2, 9069940226, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(35, ' Nursing and Pharmacy Students in Female CICL Hostel - Part Payment   (₦792500) ', 792500, ' Remita ', 1, 2, 9070077300, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(36, ' Nursing and Pharmacy Students without hostel accommodation (PA Etos Female Hostel & Religious)  - Part Payment  (₦702500) ', 702500, ' Remita ', 1, 2, 9069801537, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(37, ' Natural and Applied Science Students in Male Hostel A-J - Full Payment  (₦810000) ', 810000, ' Remita ', 1, 1, 9069941106000, 2, 3, 2, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(38, 'Natural and Applied Science Students in Male Hostel L - Full Payment  (₦860000)', 860000, ' Remita ', 1, 1, 9069810194000, 2, 3, 0, 0, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(39, 'Natural and Applied Science Students in Male Hostel K - Part Payment  (₦840000)', 840000, ' Remita ', 1, 1, 9070060459000, 2, 3, 0, 0, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(40, ' Natural and Applied Science Students in Male Hostel M - Full Payment  (₦910000) ', 910000, ' Remita ', 1, 1, 9069789251000, 2, 3, 2, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(41, ' Natural and Applied Science Students in Female Stanzal Hostel - Full Payment  (₦840000)  ', 840000, ' Remita ', 1, 2, 9070096986000, 2, 3, 2, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(42, ' Natural and Applied Science Students in Female CICL Hostel - Full Payment  (₦860000)  ', 860000, ' Remita ', 1, 2, 8421590073000, 2, 3, 2, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(43, 'Natural and Applied Science Students without hostel accommodation (PA Etos Female Hostel & Religious) - Full Payment  (₦680000)', 680000, ' Remita ', 1, 2, 8421570357000, 2, 3, 0, 0, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(44, ' Natural and Applied Science Students in Male Hostel A-J - Part Payment (₦405000) ', 405000, ' Remita ', 1, 1, 8421327529000, 2, 3, 2, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(45, 'Natural and Applied Science Students in Male Hostel K - Part Payment  (₦420000)', 420000, ' Remita ', 1, 1, 9069887808000, 2, 3, 0, 0, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(46, ' Natural and Applied Science Students in Male Hostel L - Part Payment  (₦430000)  ', 430000, ' Remita ', 1, 1, 9069944805000, 2, 3, 2, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(47, ' Natural and Applied Science Students in Male Hostel M - Part Payment  (₦455000)  ', 455000, ' Remita ', 1, 1, 8990825967000, 2, 3, 2, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(48, ' Natural and Applied Science Students in Female Stanzal Hostel - Part Payment (₦420000)  ', 420000, ' Remita ', 1, 2, 8991248934000, 2, 3, 2, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(49, ' Natural and Applied Science Students in Female CICL Hostel - Part Payment  (₦430000)  ', 430000, ' Remita ', 1, 2, 8422118299000, 2, 3, 2, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(50, ' Natural and Applied Science Students without hostel accommodation (PA Etos Female Hostel & Religious) - Part Payment  (₦340000)  ', 340000, ' Remita ', 1, 2, 8993970141000, 2, 3, 2, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(51, ' Faculty of Engineering and Software Engineering Students in Male Hostel A-J - Full Payment (₦830000) ', 830000, ' Remita ', 1, 1, 8994581013, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(52, ' Faculty of Engineering and Software Engineering Students in Male Hostel K - Full Payment (₦860000)  ', 860000, ' Remita ', 1, 1, 8995790202, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(53, ' Faculty of Engineering and Software Engineering Students in Male Hostel L - Full Payment (₦880000)  ', 880000, ' Remita ', 1, 1, 9055054245, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(54, ' Faculty of Engineering and Software Engineering Students in Male Hostel M - Full Payment (₦930000)  ', 930000, ' Remita ', 1, 1, 9053482945, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(55, ' Faculty of Engineering and Software Engineering Students in Female Stanzal Hostel - Full Payment (₦860000)  ', 860000, ' Remita ', 1, 2, 9053537726, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(56, ' Faculty of Engineering and Software Engineering Students in Female CICL Hostel - Full Payment (₦880000)  ', 880000, ' Remita ', 1, 2, 8421404003, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(57, ' Faculty of Engineering and Software Engineering Students without hostel accommodation (PA Etos Female Hostel & Religious) - Full Payment  (₦700000) ', 700000, ' Remita ', 1, 2, 8421512655, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(58, ' Faculty of Engineering and Software Engineering Students in Male Hostel A-J - Part Payment (₦415000)  ', 415000, ' Remita ', 1, 1, 8421230556, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(59, ' Faculty of Engineering and Software Engineering Students in Male Hostel K - Part Payment  (₦430000)  ', 430000, ' Remita ', 1, 1, 8421591493, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(60, ' Faculty of Engineering and Software Engineering Students in Male Hostel L - Part Payment (₦440000)  ', 440000, ' Remita ', 1, 1, 8421572216, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(61, ' Faculty of Engineering and Software Engineering Students in Male Hostel M - Part Payment  (₦465000)  ', 465000, ' Remita ', 1, 1, 8421233726, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(62, ' Faculty of Engineering and Software Engineering Students in Female Stanzal Hostel - Part Payment  (₦430000)  ', 430000, ' Remita ', 1, 2, 8421189407, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(63, ' Faculty of Engineering and Software Engineering Students in Female CICL Hostel - Part Payment  (₦440000)  ', 440000, ' Remita ', 1, 2, 8421154685, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(64, ' Faculty of Engineering and Software Engineering Students without hostel accommodation (PA Etos Female Hostel & Religious) - Part Payment (₦350000) ', 350000, ' Remita ', 1, 2, 8420975639, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(65, ' Law Students in Male Hostel A-J - Full Payment (₦1490000)  ', 1490000, ' Remita ', 1, 1, 8994595215, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(66, ' Law Students in Male Hostel K - Full Payment (₦1520000)  ', 1520000, ' Remita ', 1, 1, 8993960779, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(67, ' Law Students in Male Hostel L - Full Payment (₦1540000)  ', 1540000, ' Remita ', 1, 1, 8993869055, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(68, ' Law Students in Male Hostel M - Full Payment (₦1590000)  ', 1590000, ' Remita ', 1, 1, 8991149470, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(69, ' Law Students in Female Stanzal Hostel - Full Payment (₦1520000) ', 1520000, ' Remita ', 1, 2, 8994802879, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(70, ' Law Students Female CICL Hostel - Full Payment (₦1540000)  ', 1540000, ' Remita ', 1, 2, 8422574399, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(71, ' Law Students without hostel accommodation (PA Etos Female Hostel & Religious) - Full Payment (₦1360000)  ', 1360000, ' Remita ', 1, 2, 9053300854, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(72, ' Law Students in Male Hostel A-J - Part Payment (₦745000)  ', 745000, ' Remita ', 1, 1, 9053214155, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(73, ' Law Students in Male Hostel K - Part Payment  (₦760000)  ', 760000, ' Remita ', 1, 1, 9050530715, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(74, ' Law Students in Male Hostel L - Part Payment  (₦770000)  ', 770000, ' Remita ', 1, 1, 8421176219, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(75, ' Law Students in Male Hostel M - Part Payment  (₦795000)  ', 795000, ' Remita ', 1, 1, 8421094891, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(76, ' Law Students in Female Stanzal Hostel - Part Payment  (₦760000) ', 760000, ' Remita ', 1, 2, 8420911481, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(77, ' Law Students Female CICL Hostel - Part Payment (₦770000)  ', 770000, ' Remita ', 1, 2, 8420644357, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(78, 'Law Students without hostel accommodation (PA Etos Female Hostel & Religious) - Part Payment (₦680000)', 680000, ' Remita ', 1, 2, 8421099877, 2, 3, 0, 0, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(79, ' Medical Lab Science Students in Male Hostel A-J - Full Payment    (₦1165000) ', 1165000, ' Remita ', 1, 1, 8421259037, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(80, 'Medical Lab Science Students in Male Hostel K - Full Payment  (₦1195000)', 1195000, ' Remita ', 1, 1, 8420892953, 2, 3, 0, 0, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(81, ' Medical Lab Science Students in Male Hostel L - Full Payment  (₦1215000)  ', 1215000, ' Remita ', 1, 1, 8421597269, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(82, ' Medical Lab Science Students in Male Hostel M - Full Payment (₦1265000)  ', 1265000, ' Remita ', 1, 1, 8421540639, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(83, ' Medical Lab Science Students in Female Stanzal Hostel - Full Payment  (₦1195000) ', 1195000, ' Remita ', 1, 2, 8421347894, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(84, ' Medical Lab Science Students Female CICL Hostel - Full Payment   (₦1215000)  ', 1215000, ' Remita ', 1, 2, 9003023467, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(85, ' Medical Lab Science Students without hostel accommodation (PA Etos Female Hostel & Religious) - Full Payment (₦1035000)  ', 1035000, ' Remita ', 1, 2, 8994244743, 2, 3, 0, 1, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(86, ' Medical Lab Science Students in Male Hostel A-J - Part Payment (₦582500)  ', 582500, ' Remita ', 1, 1, 8993890029, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(87, ' Medical Lab Science Students in Male Hostel K - Part Payment (₦597500) ', 597500, ' Remita ', 1, 1, 8994999774, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(88, ' Medical Lab Science Students in Male Hostel L - Part Payment  (₦607500)  ', 607500, ' Remita ', 1, 1, 8995002414, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(89, ' Medical Lab Science Students in Male Hostel M - Part Payment    (₦632500)  ', 632500, ' Remita ', 1, 1, 8995803791, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(90, ' Medical Lab Science Students in Female Stanzal Hostel - Part Payment (₦597500)  ', 597500, ' Remita ', 1, 2, 9054969036, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(91, ' Medical Lab Science Students Female CICL Hostel - Part Payment (₦607500) ', 607500, ' Remita ', 1, 2, 9053849931, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(92, ' Medical Lab Science Students without hostel accommodation (PA Etos Female Hostel & Religious) - Part Payment (₦517500)  ', 517500, ' Remita ', 1, 2, 9053569426, 2, 3, 0, 2, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(93, 'Natural and Applied Science Students in Male Hostel K - Part Payment (₦420000)', 420000, 'Remita', 1, 1, 9942788163000, 2, 3, 0, 0, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(94, 'Natural and Applied Science Students in Male Hostel K - Part Payment (₦840000)', 840000, 'Remita', 1, 1, 9905386604000, 2, 3, 0, 0, '2022-12-01 11:17:53', '100', '2022-12-01 11:17:53'),
(95, 'ALL PHDs Fees - First Instalment -50% (₦385000)', 385000, 'Remita', 1, 1, 9070239896, 2, 5, 0, 2, '2023-01-18 15:54:29', '50', '2023-01-18 15:54:29'),
(96, 'ALL PHDs - Second Instalment -50% (₦385000)', 385000, 'Remita', 1, 1, 9070321579, 2, 5, 0, 2, '2023-01-18 16:05:57', '50', '2023-01-18 16:05:57'),
(97, 'ALL PHDs - FULL PAYMENT -100% (₦770000)', 770000, 'Remita', 1, 1, 9070161262, 2, 5, 0, 1, '2023-01-18 16:07:26', '100', '2023-01-18 16:07:26'),
(98, 'Non-Science Postgraduate Diploma (PGD) - First Instalment -50% (₦175000)', 175000, 'Remita', 1, 1, 9070230730, 2, 5, 0, 2, '2023-01-18 16:08:35', '50', '2023-01-18 16:08:35'),
(99, 'Non-Science Academic Masters (M.A - M.SC. - M.ED) Per Session - FULL PAYMENT -100% (₦605000)', 605000, 'Remita', 1, 1, 9070115311, 2, 5, 0, 2, '2023-01-18 16:47:51', '100', '2023-01-18 16:47:51'),
(100, 'Non-Science Postgraduate Diploma (PGD)  - FULL PAYMENT - 100% (₦350000)', 350000, 'Remita', 1, 1, 9070172950, 2, 5, 0, 1, '2023-01-18 16:48:29', '100', '2023-01-18 16:48:29'),
(101, 'Non-Science Academic Masters (M.A - M.SC. - M.ED) - Second Instalment -50% (₦302500)', 302500, 'Remita', 1, 1, 9070232764, 2, 5, 0, 2, '2023-01-18 16:50:44', '50', '2023-01-18 16:50:44'),
(102, 'Non-Science Postgraduate Diploma (PGD) - Second Instalment -50% (₦175000)', 175000, 'Remita', 1, 1, 9070562076, 2, 5, 0, 2, '2023-01-18 16:52:09', '50', '2023-01-18 16:52:09'),
(103, 'Non-Science Academic Masters (M.A - M.SC. - M.ED) - First Instalment -50% (₦302500)', 302500, 'Remita', 1, 1, 9069931708, 2, 5, 0, 2, '2023-01-18 16:52:49', '50', '2023-01-18 16:52:49'),
(104, 'Professional Masters (MBA - MPA) - First Instalment -50% (₦425000)', 425000, 'Remita', 1, 1, 9070204407, 2, 5, 0, 2, '2023-01-18 16:58:02', '50', '2023-01-18 16:58:02'),
(105, 'Professional Masters (MBA - MPA) - Second Instalment -50% (₦425000)', 425000, 'Remita', 1, 1, 9070530742, 2, 5, 0, 2, '2023-01-18 16:59:37', '50', '2023-01-18 16:59:37'),
(106, 'Professional Masters (MBA - MPA) Per Session - FULL PAYMENT -100% (₦850000)', 850000, 'Remita', 1, 1, 9070141372, 2, 5, 0, 1, '2023-01-18 17:00:53', '100', '2023-01-18 17:00:53'),
(107, 'Science Academic Masters (M.SC) - Second Instalment -50% (₦317500)', 317500, 'Remita', 1, 1, 9070234659, 2, 5, 0, 2, '2023-01-18 17:02:12', '50', '2023-01-18 17:02:12'),
(108, 'Science Academic Masters (M.SC) - First Instalment -50% (₦317500)', 317500, 'Remita', 1, 1, 9070194070, 2, 5, 0, 2, '2023-01-18 17:03:10', '50', '2023-01-18 17:03:10'),
(109, 'Science Postgraduate Diploma (PGD) - First Instalment -50% (₦180000)', 180000, 'Remita', 1, 1, 9070227648, 2, 5, 0, 2, '2023-01-18 17:03:56', '50', '2023-01-18 17:03:56'),
(110, 'Science Postgraduate Diploma (PGD) - FULL PAYMENT -100% (₦360000)', 360000, 'Remita', 1, 1, 9070186308, 2, 5, 0, 1, '2023-01-18 17:04:34', '100', '2023-01-18 17:04:34'),
(111, 'Science Postgraduate Diploma (PGD) - Second Instalment -50% (₦180000)', 180000, 'Remita', 1, 1, 9070649251, 2, 5, 0, 2, '2023-01-18 17:05:51', '50', '2023-01-18 17:05:51'),
(112, 'Science Academic Masters (M.SC)  - FULL PAYMENT  -100% (₦635000)', 635000, 'Remita', 1, 1, 9070139350, 2, 5, 0, 1, '2023-01-18 17:10:05', '100', '2023-01-18 17:10:05'),
(113, 'Extra Fees for Professional Masters (MBA - MPA) Per Semester -50% (₦425000)', 425000, 'Remita', 1, 1, 9070668743, 2, 5, 0, 2, '2023-01-18 17:11:37', '50', '2023-01-18 17:11:37'),
(114, 'Extra Fees for Non-Science Academic Masters (M.A - M.SC. - M.ED) Per Semester -50% (₦302500)', 302500, 'Remita', 1, 1, 9070579158, 2, 5, 0, 2, '2023-01-18 17:12:28', '50', '2023-01-18 17:12:28'),
(115, 'Extra Fees for Science Postgraduate Diploma (PGD) Per Semester -50% (₦180000)', 180000, 'Remita', 1, 1, 9070673201, 2, 5, 0, 2, '2023-01-18 17:13:00', '50', '2023-01-18 17:13:00'),
(116, 'Extra Fees for Science Academic Masters (M.SC) Per Semester -50% (₦317500)', 317500, 'Remita', 1, 1, 9070666656, 2, 5, 0, 2, '2023-01-18 17:14:06', '50', '2023-01-18 17:14:06'),
(117, 'Extra Fees for Non-Science Postgraduate Diploma (PGD) Per Semester -50% (₦175000)', 175000, 'Remita', 1, 1, 9070757697, 2, 5, 0, 2, '2023-01-18 17:14:35', '50', '2023-01-18 17:14:35'),
(118, 'Acceptance Fee Postgraduate Diploma (PGD) - 30000', 30000, 'Remita', 1, 1, 10908324043, 2, 2, NULL, 1, '2023-03-28 13:20:47', '100', '2023-03-28 13:20:47'),
(119, 'SCHOOL FEES ', 480800, 'Remita', 1, 1, 8421108178, 2, 3, NULL, 1, '2023-05-22 16:28:08', NULL, '2023-05-22 16:28:08'),
(120, 'TESTING MALE HOSTEL A-J', 821000, 'Remita', 1, 1, 11772993238, 2, 4, 1, 1, '2023-08-02 08:49:42', '100', '2023-08-02 08:49:42'),
(121, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTELS (C, D, E, F) 100%', 940000, 'Remita', 1, 1, 11780779094, 2, 3, 7, 1, '2023-08-03 11:04:41', '100', '2023-08-03 11:04:41'),
(122, 'FACULTY OF PHARMACY: MALE HOSTELS (C, D, E, F) RETURNING STUDENTS 100%', 1926000, 'Remita', 1, 1, 11780766212, 2, 3, 8, 1, '2023-08-03 11:04:49', '100', '2023-08-03 11:04:49'),
(123, 'FACULTY OF PHARMACY: MALE HOSTELS (C, D, E, F) RETURNING STUDENTS 75%', 1444500, 'Remita', 1, 1, 11780791309, 2, 3, 8, 2, '2023-08-03 11:11:43', '75', '2023-08-03 11:11:43'),
(124, 'FACULTY OF EDUCATION (NEW & RETURNING STUDENTS): MALE HOSTEL(C, D, E, F) 100% = 833000', 833000, 'Remita', 1, 1, 11782182492, 2, 3, 3, 1, '2023-08-03 15:06:43', '100', '2023-08-03 15:06:43'),
(125, 'FACULTY OF EDUCATION (NEW & RETURNING STUDENTS) MALE HOSTEL (A, B, G, H, I, J, K) 100% = ₦863000', 863000, 'Remita', 1, 1, 11782412040, 2, 3, 3, 1, '2023-08-03 15:07:45', '100', '2023-08-03 15:07:45'),
(126, 'FACULTY OF EDUCATION: MALE HOSTEL (L)  100% = ₦883000', 883000, 'Remita', 1, 1, 11782291089, 1, 3, 3, 1, '2023-08-03 15:08:14', '100', '2023-08-03 15:08:14'),
(127, 'FACULTY OF EDUCATION: MALE HOSTEL(M) 100% =  ₦903000', 903000, 'Remita', 1, 1, 11782531841, 1, 3, 3, 1, '2023-08-03 15:15:39', '100', '2023-08-03 15:15:39'),
(128, 'FACULTY OF EDUCATION: MALE HOSTEL(N) 100%  =  ₦903000', 903000, 'Remita', 1, 1, 11782541095, 1, 3, 3, 1, '2023-08-03 15:17:18', '100', '2023-08-03 15:17:18'),
(129, 'FACULTY OF EDUCATION: STANZEL FEMALE  100% = ₦863000', 863000, 'Remita', 1, 2, 11782705983, 1, 3, 3, 1, '2023-08-03 15:19:09', '100', '2023-08-03 15:19:09'),
(130, 'FACULTY OF EDUCATION: CICL FEMALE  100%  = ₦893000', 893000, 'Remita', 1, 2, 11782701593, 1, 3, 3, 1, '2023-08-03 15:19:33', '100', '2023-08-03 15:19:33'),
(131, 'FACULTY OF EDUCATION: PA-ETO FEMALE  100% = ₦693000', 693000, 'Remita', 1, 2, 11782570301, 1, 3, 3, 1, '2023-08-03 15:20:14', '100', '2023-08-03 15:20:14'),
(133, 'FACULTY OF EDUCATION: KELSON FEMALE 100% =  ₦963000', 963000, 'Remita', 1, 2, 11782901659, 1, 3, 3, 1, '2023-08-03 15:26:47', '100', '2023-08-03 15:26:47'),
(134, 'FACULTY OF EDUCATION (NEW & RETURNING STUDENTS): MALE HOSTEL(C, D, E, F)  75%  = ₦583100', 583100, 'Remita', 1, 1, 11782193505, 1, 3, 3, 2, '2023-08-03 15:28:52', '75', '2023-08-03 15:28:52'),
(135, 'FACULTY OF EDUCATION (NEW & RETURNING STUDENTS): MALE HOSTEL (C, D, E, F)  50% = ₦416500', 416500, 'Remita', 1, 1, 11782279114, 1, 3, 3, 2, '2023-08-03 15:28:54', '50', '2023-08-03 15:28:54'),
(136, 'FACULTY OF EDUCATION (NEW & RETURNING STUDENTS): MALE HOSTEL (C, D, E, F) 25% = ₦208250', 208250, 'Remita', 1, 1, 11782290350, 1, 3, 3, 2, '2023-08-03 15:28:59', '25', '2023-08-03 15:28:59'),
(137, 'FACULTY OF EDUCATION (NEW & RETURNING STUDENTS) MALE HOSTEL (A, B, G, H, I, J, K) 75% = ₦604100', 604100, 'Remita', 1, 1, 11782290817, 1, 3, 3, 2, '2023-08-03 15:29:55', '75', '2023-08-03 15:29:55'),
(138, 'FACULTY OF EDUCATION (NEW & RETURNING STUDENTS) MALE HOSTEL (A, B, G, H, I, J, K) 50% = ₦422870', 422870, 'Remita', 1, 1, 11782290966, 1, 3, 3, 2, '2023-08-03 15:30:04', '50', '2023-08-03 15:30:04'),
(139, 'FACULTY OF EDUCATION (NEW & RETURNING STUDENTS) MALE HOSTEL (A, B, G, H, I, J, K) 25% =  ₦215750', 215750, 'Remita', 1, 1, 11782323044, 1, 3, 3, 2, '2023-08-03 15:30:15', '25', '2023-08-03 15:30:15'),
(140, 'FACULTY OF EDUCATION: MALE HOSTEL (L) 75% = ₦618100', 618100, 'Remita', 1, 1, 11782532791, 1, 3, 3, 2, '2023-08-03 15:44:07', '75', '2023-08-03 15:44:07'),
(141, 'FACULTY OF EDUCATION: MALE HOSTEL (L) 50%  = ₦441500', 441500, 'Remita', 1, 1, 11782531682, 1, 3, 3, 2, '2023-08-03 15:44:37', '50', '2023-08-03 15:44:37'),
(142, 'FACULTY OF EDUCATION: MALE HOSTEL (L) 25% = ₦220750', 220750, 'Remita', 1, 1, 11782531683, 1, 3, 3, 2, '2023-08-03 15:44:46', '25', '2023-08-03 15:44:46'),
(143, 'FACULTY OF EDUCATION: MALE HOSTEL (M) 25% = ₦225750', 225750, 'Remita', 1, 1, 11782461780, 1, 3, 3, 2, '2023-08-03 16:00:40', '25', '2023-08-03 16:00:40'),
(144, 'FACULTY OF EDUCATION: MALE HOSTEL (M) 50% = ₦451500', 451500, 'Remita', 1, 1, 11782676365, 1, 3, 3, 2, '2023-08-03 16:00:42', '50', '2023-08-03 16:00:42'),
(145, 'FACULTY OF EDUCATION: MALE HOSTEL (M) 75% = ₦632100', 632100, 'Remita', 1, 1, 11782533158, 1, 3, 3, 2, '2023-08-03 16:00:45', '75', '2023-08-03 16:00:45'),
(146, 'FACULTY OF EDUCATION: MALE HOSTEL (N) 25% = ₦225750', 225750, 'Remita', 1, 1, 11782495182, 1, 3, 3, 2, '2023-08-03 16:03:24', '25', '2023-08-03 16:03:24'),
(147, 'FACULTY OF EDUCATION: MALE HOSTEL (N) 50% = ₦451500', 451500, 'Remita', 1, 1, 11782532728, 1, 3, 3, 2, '2023-08-03 16:03:34', '50', '2023-08-03 16:03:34'),
(148, 'FACULTY OF EDUCATION: MALE HOSTEL (N)  75% = ₦632100', 632100, 'Remita', 1, 1, 11782452820, 1, 3, 3, 2, '2023-08-03 16:05:43', '75', '2023-08-03 16:05:43'),
(149, 'FACULTY OF EDUCATION: STANZEL FEMALE  HOSTEL 75% =₦604100', 604100, 'Remita', 1, 2, 11782710279, 1, 3, 3, 2, '2023-08-03 16:45:57', '75', '2023-08-03 16:45:57'),
(150, 'FACULTY OF EDUCATION: STANZEL FEMALE  HOSTEL 50% = ₦431500', 431500, 'Remita', 1, 2, 11782567807, 1, 3, 3, 2, '2023-08-03 16:45:58', '50', '2023-08-03 16:45:58'),
(151, 'FACULTY OF EDUCATION: STANZEL FEMALE  25%  = ₦215750', 215750, 'Remita', 1, 2, 11782573160, 2, 3, 3, 2, '2023-08-03 16:46:00', '25', '2023-08-03 16:46:00'),
(152, 'FACULTY OF EDUCATION: CICL FEMALE  70% = ₦625100', 625100, 'Remita', 1, 2, 11782708660, 2, 3, 3, 2, '2023-08-03 16:54:18', NULL, '2023-08-03 16:54:18'),
(153, 'FACULTY OF EDUCATION: CICL FEMALE  50% = ₦446500', 446500, 'Remita', 1, 2, 11782497134, 2, 3, 3, 2, '2023-08-03 16:54:21', '50', '2023-08-03 16:54:21'),
(154, 'FACULTY OF EDUCATION: CICL FEMALE  25% = ₦223250', 223250, 'Remita', 1, 2, 11782706631, 2, 3, 3, 2, '2023-08-03 16:54:25', '25', '2023-08-03 16:54:25'),
(155, 'FACULTY OF EDUCATION: PA-ETO FEMALE  25% = ₦173250', 173250, 'Remita', 1, 2, 11782599394, 2, 3, 3, 2, '2023-08-03 16:57:23', '25', '2023-08-03 16:57:23'),
(156, 'FACULTY OF EDUCATION: PA-ETO FEMALE  50% = ₦346500', 346500, 'Remita', 1, 2, 11782599034, 2, 3, 3, 2, '2023-08-03 16:57:24', '50', '2023-08-03 16:57:24'),
(157, 'FACULTY OF EDUCATION: PA-ETO FEMALE  75% = ₦485100', 485100, 'Remita', 1, 2, 11782598508, 2, 3, 3, 2, '2023-08-03 16:57:28', '75', '2023-08-03 16:57:28'),
(158, 'FACULTY OF EDUCATION: KELSON FEMALE  75% = ₦674100', 674100, 'Remita', 1, 2, 11782901094, 2, 3, 3, 2, '2023-08-03 16:59:29', '75', '2023-08-03 16:59:29'),
(159, 'FACULTY OF EDUCATION: KELSON FEMALE  25% = ₦240750', 240750, 'Remita', 1, 2, 11782819420, 2, 3, 3, 2, '2023-08-03 16:59:44', '25', '2023-08-03 16:59:44'),
(160, 'FACULTY OF EDUCATION: KELSON FEMALE  50% = ₦481500', 481500, 'Remita', 1, 2, 11782728462, 2, 3, 3, 2, '2023-08-03 17:13:49', '50', '2023-08-03 17:13:49'),
(161, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTELS (C, D, E, F) 75%', 705000, 'Remita', 1, 1, 11793698501, 2, 3, 7, 2, '2023-08-05 13:09:42', '75', '2023-08-05 13:09:42'),
(162, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTELS (C, D, E, F) 50%', 470000, 'Remita', 1, 1, 11793760534, 2, 3, 7, 2, '2023-08-05 13:13:22', '50', '2023-08-05 13:13:22'),
(163, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTELS (C, D, E, F) 25%', 235000, 'Remita', 1, 1, 11793914123, 2, 3, 7, 2, '2023-08-05 13:16:10', '25', '2023-08-05 13:16:10'),
(164, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTELS (A, B, G, I, J, K)  100%', 970000, 'Remita', 1, 1, 11794102503, 2, 3, 7, 1, '2023-08-05 13:19:46', '100', '2023-08-05 13:19:46'),
(165, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTELS (A, B, G, I, J, K)  75%', 727500, 'Remita', 1, 1, 11793919855, 2, 3, 7, 2, '2023-08-05 13:22:15', '75', '2023-08-05 13:22:15'),
(166, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTELS (A, B, G, I, J, K)  50%', 485000, 'Remita', 1, 1, 11793922324, 2, 3, 7, 2, '2023-08-05 13:23:55', '50', '2023-08-05 13:23:55'),
(167, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTELS (A, B, G, I, J, K)  25%', 242500, 'Remita', 1, 1, 11793923263, 2, 3, 7, 2, '2023-08-05 13:25:15', '25', '2023-08-05 13:25:15'),
(168, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTEL L 100%', 990000, 'Remita', 1, 1, 11794109670, 2, 3, 7, 1, '2023-08-05 13:26:53', '100', '2023-08-05 13:26:53'),
(169, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTEL L 75%', 742500, 'Remita', 1, 1, 11793925561, 2, 3, 7, 2, '2023-08-05 13:28:30', '75', '2023-08-05 13:28:30'),
(170, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTEL L 50%', 495000, 'Remita', 1, 1, 11793928530, 2, 3, 7, 2, '2023-08-05 13:30:45', '50', '2023-08-05 13:30:45'),
(171, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTEL L 25%', 247500, 'Remita', 1, 1, 11793930818, 2, 3, 7, 2, '2023-08-05 13:32:23', '25', '2023-08-05 13:32:23'),
(172, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTEL M & N 100%', 1010000, 'Remita', 1, 1, 11793933159, 2, 3, 7, 1, '2023-08-05 13:35:20', '100', '2023-08-05 13:35:20'),
(173, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTEL M & N 75%', 757500, 'Remita', 1, 1, 11794117262, 2, 3, 7, 2, '2023-08-05 13:37:17', '75', '2023-08-05 13:37:17'),
(174, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTEL M & N 50%', 505000, 'Remita', 1, 1, 11793937690, 2, 3, 7, 2, '2023-08-05 13:38:34', '50', '2023-08-05 13:38:34'),
(175, 'FACULTY OF ENGINEERING: RETURNING STUDENTS MALE HOSTEL M & N 25%', 252500, 'Remita', 1, 1, 11794119644, 2, 3, 7, 2, '2023-08-05 13:39:51', '25', '2023-08-05 13:39:51'),
(176, 'FACULTY OF ENGINEERING: RETURNING STUDENTS FEMALE HOSTEL STANZEL 100%', 950000, 'Remita', 1, 2, 11793941537, 2, 3, 7, 2, '2023-08-05 13:43:01', '100', '2023-08-05 13:43:01'),
(177, 'FACULTY OF ENGINEERING: RETURNING STUDENTS FEMALE HOSTEL STANZEL 75%', 712500, 'Remita', 1, 2, 11794122950, 2, 3, 7, 2, '2023-08-05 13:44:59', '75', '2023-08-05 13:44:59'),
(178, 'FACULTY OF ENGINEERING: RETURNING STUDENTS FEMALE HOSTEL STANZEL 50%', 475000, 'Remita', 1, 2, 11793945205, 2, 3, 7, 2, '2023-08-05 13:47:26', '50', '2023-08-05 13:47:26'),
(179, 'FACULTY OF ENGINEERING: RETURNING STUDENTS FEMALE HOSTEL STANZEL 25%', 237500, 'Remita', 1, 2, 11794126194, 2, 3, 7, 2, '2023-08-05 13:49:15', '25', '2023-08-05 13:49:15'),
(180, 'FACULTY OF ENGINEERING: RETURNING STUDENTS FEMALE HOSTEL CICL 100%', 980000, 'Remita', 1, 2, 11793953054, 2, 3, 7, 1, '2023-08-05 13:53:16', '100', '2023-08-05 13:53:16'),
(181, 'FACULTY OF ENGINEERING: RETURNING STUDENTS FEMALE HOSTEL CICL 75%', 735000, 'Remita', 1, 2, 11793954925, 2, 3, 7, 2, '2023-08-05 13:54:34', '75', '2023-08-05 13:54:34'),
(182, 'FACULTY OF ENGINEERING: RETURNING STUDENTS FEMALE HOSTEL CICL 50%', 490000, 'Remita', 1, 2, 11793868715, 2, 3, 7, 2, '2023-08-05 13:55:44', '50', '2023-08-05 13:55:44'),
(183, 'FACULTY OF ENGINEERING: RETURNING STUDENTS FEMALE HOSTEL CICL 25%', 245000, 'Remita', 1, 2, 11793957260, 2, 3, 7, 2, '2023-08-05 13:56:46', '25', '2023-08-05 13:56:46'),
(184, 'FACULTY OF ENGINEERING: RETURNING STUDENTS WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE HOSTEL & RELIGIOUS) 100%', 800000, 'Remita', 1, 2, 11794136039, 2, 3, 7, 1, '2023-08-05 14:03:00', '100', '2023-08-05 14:03:00'),
(185, 'FACULTY OF ENGINEERING: RETURNING STUDENTS WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE HOSTEL & RELIGIOUS) 75%', 600000, 'Remita', 1, 2, 11793876015, 2, 3, 7, 2, '2023-08-05 14:04:00', '75', '2023-08-05 14:04:00'),
(186, 'FACULTY OF ENGINEERING: RETURNING STUDENTS WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE HOSTEL & RELIGIOUS) 50%', 400000, 'Remita', 1, 2, 11793967651, 2, 3, 7, 2, '2023-08-05 14:06:56', '50', '2023-08-05 14:06:56'),
(187, 'FACULTY OF ENGINEERING: RETURNING STUDENTS WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE HOSTEL & RELIGIOUS) 25%', 200000, 'Remita', 1, 2, 11793968605, 2, 3, 7, 2, '2023-08-05 14:07:53', '25', '2023-08-05 14:07:53'),
(188, 'FACULTY OF ENGINEERING: RETURNING STUDENTS FEMALE HOSTELS (A, B, G, I, J, K) ELSON 100%', 1070000, 'Remita', 1, 1, 11793970754, 2, 3, 7, 1, '2023-08-05 14:10:49', '100', '2023-08-05 14:10:49'),
(189, 'FACULTY OF ENGINEERING: RETURNING STUDENTS FEMALE HOSTELS (A, B, G, I, J, K) ELSON 75%', 802500, 'Remita', 1, 1, 11793971549, 2, 3, 7, 2, '2023-08-05 14:11:59', '75', '2023-08-05 14:11:59'),
(190, 'FACULTY OF ENGINEERING: RETURNING STUDENTS FEMALE HOSTELS (A, B, G, I, J, K) ELSON 50%', 535000, 'Remita', 1, 1, 11793972282, 2, 3, 7, 2, '2023-08-05 14:13:12', '50', '2023-08-05 14:13:12'),
(191, 'FACULTY OF ENGINEERING: RETURNING STUDENTS FEMALE HOSTELS (A, B, G, I, J, K) ELSON 25%', 267500, 'Remita', 1, 1, 11793973409, 2, 3, 7, 2, '2023-08-05 14:14:23', '25', '2023-08-05 14:14:23'),
(192, 'FACULTY OF LAW MALE HOSTELS (C, D, E, F) RETURNING STUDENT 100%', 1788800, 'Remita', 1, 1, 11793992954, 2, 3, 8, 1, '2023-08-05 14:38:20', '100', '2023-08-05 14:38:20'),
(193, 'FACULTY OF LAW MALE HOSTELS (C, D, E, F) RETURNING STUDENT 75%', 1341600, 'Remita', 1, 1, 11793994630, 2, 3, 8, 2, '2023-08-05 14:39:39', '75', '2023-08-05 14:39:39'),
(194, 'FACULTY OF LAW MALE HOSTELS (C, D, E, F) RETURNING STUDENT 50%', 894400, 'Remita', 1, 1, 11794170490, 2, 3, 8, 2, '2023-08-05 14:40:56', '50', '2023-08-05 14:40:56'),
(195, 'FACULTY OF LAW MALE HOSTELS (C, D, E, F) RETURNING STUDENT 25%', 447200, 'Remita', 1, 1, 11793997013, 2, 3, 8, 2, '2023-08-05 14:43:04', '25', '2023-08-05 14:43:04'),
(196, 'FACULTY OF LAW MALE HOSTELS (C, D, E, F) NEW STUDENT 100%', 1986656, 'Remita', 1, 1, 11794173847, 2, 3, 8, 1, '2023-08-05 14:44:52', '100', '2023-08-05 14:44:52'),
(197, 'FACULTY OF LAW MALE HOSTELS (C, D, E, F) STUDENT 75%', 1489992, 'Remita', 1, 1, 11794215702, 2, 3, 8, 2, '2023-08-05 14:46:09', '75', '2023-08-05 14:46:09'),
(198, 'FACULTY OF LAW MALE HOSTELS (C, D, E, F) STUDENT 50%', 993328, 'Remita', 1, 1, 11794300318, 2, 3, 8, 2, '2023-08-05 14:47:48', '50', '2023-08-05 14:47:48'),
(199, 'FACULTY OF LAW MALE HOSTELS (C, D, E, F) STUDENT 25%', 496664, 'Remita', 1, 1, 11794301132, 2, 3, 8, 2, '2023-08-05 14:48:58', '25', '2023-08-05 14:48:58'),
(200, 'FACULTY OF LAW MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENT 100%', 1818800, 'Remita', 1, 1, 11794303355, 2, 3, 8, 1, '2023-08-05 14:52:04', '100', '2023-08-05 14:52:04'),
(201, 'FACULTY OF LAW MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENT 75%', 1341600, 'Remita', 1, 1, 11794181790, 2, 3, 8, 2, '2023-08-05 14:53:14', '75', '2023-08-05 14:53:14'),
(202, 'FACULTY OF LAW MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENT 50%', 909400, 'Remita', 1, 1, 11794182601, 2, 3, 8, 2, '2023-08-05 14:54:22', '50', '2023-08-05 14:54:22'),
(203, 'FACULTY OF LAW MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENT 25%', 454700, 'Remita', 1, 1, 11794305081, 2, 3, 8, 2, '2023-08-05 14:57:17', '25', '2023-08-05 14:57:17'),
(204, 'FACULTY OF LAW MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT 100%', 2016656, 'Remita', 1, 1, 11794307326, 2, 3, 8, 1, '2023-08-05 15:00:04', '100', '2023-08-05 15:00:04'),
(205, 'FACULTY OF LAW MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT 75%', 1512492, 'Remita', 1, 1, 11794229379, 2, 3, 8, 2, '2023-08-05 15:01:18', '75', '2023-08-05 15:01:18'),
(206, 'FACULTY OF LAW MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT 50%', 1008328, 'Remita', 1, 1, 11794309925, 2, 3, 8, 2, '2023-08-05 15:02:36', '50', '2023-08-05 15:02:36'),
(207, 'FACULTY OF LAW MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT 25%', 504164, 'Remita', 1, 1, 11794231724, 2, 3, 8, 2, '2023-08-05 15:04:17', '25', '2023-08-05 15:04:17'),
(208, 'FACULTY OF LAW MALE HOSTEL L RETURNING STUDENT 100%', 1838800, 'Remita', 1, 1, 11794317770, 2, 3, 8, 1, '2023-08-05 15:12:01', '100', '2023-08-05 15:12:01'),
(209, 'FACULTY OF LAW MALE HOSTEL L RETURNING STUDENT 75%', 1379100, 'Remita', 1, 1, 11794319169, 2, 3, 8, 2, '2023-08-05 15:13:04', '75', '2023-08-05 15:13:04'),
(210, 'FACULTY OF LAW MALE HOSTEL L RETURNING STUDENT 50%', 919400, 'Remita', 1, 1, 11794319824, 2, 3, 8, 2, '2023-08-05 15:14:11', '50', '2023-08-05 15:14:11'),
(211, 'FACULTY OF LAW MALE HOSTEL L RETURNING STUDENT 25%', 459700, 'Remita', 1, 1, 11794320371, 2, 3, 8, 2, '2023-08-05 15:15:14', '25', '2023-08-05 15:15:14'),
(212, 'FACULTY OF LAW MALE HOSTEL L NEW STUDENT 100%', 2036656, 'Remita', 1, 1, 11794321930, 2, 3, 8, 1, '2023-08-05 15:17:33', '100', '2023-08-05 15:17:33'),
(213, 'FACULTY OF LAW MALE HOSTEL L NEW STUDENT 75%', 1527492, 'Remita', 1, 1, 11794323308, 2, 3, 8, 2, '2023-08-05 15:18:43', '75', '2023-08-05 15:18:43'),
(214, 'FACULTY OF LAW MALE HOSTEL L STUDENT 50%', 1018328, 'Remita', 1, 1, 11794324217, 2, 3, 8, 2, '2023-08-05 15:20:06', '50', '2023-08-05 15:20:06'),
(215, 'FACULTY OF LAW MALE HOSTEL L NEW STUDENT 25%', 509164, 'Remita', 1, 1, 11794325152, 2, 3, 8, 2, '2023-08-05 15:21:40', '25', '2023-08-05 15:21:40'),
(216, 'FACULTY OF LAW MALE HOSTEL M & N RETURNING STUDENT 100%', 1858800, 'Remita', 1, 1, 11794510547, 2, 3, 8, 1, '2023-08-05 15:27:33', '100', '2023-08-05 15:27:33'),
(217, 'FACULTY OF LAW MALE HOSTEL M & N RETURNING STUDENT 75%', 1394100, 'Remita', 1, 1, 11794330972, 2, 3, 8, 2, '2023-08-05 15:28:34', '75', '2023-08-05 15:28:34'),
(218, 'FACULTY OF LAW MALE HOSTEL M & N RETURNING STUDENT 50%', 929400, 'Remita', 1, 1, 11794599535, 2, 3, 8, 2, '2023-08-05 15:29:55', '50', '2023-08-05 15:29:55'),
(219, 'FACULTY OF LAW MALE HOSTEL M & N RETURNING STUDENT 25%', 464700, 'Remita', 1, 1, 11794333195, 2, 3, 8, 2, '2023-08-05 15:31:12', '25', '2023-08-05 15:31:12'),
(220, 'FACULTY OF LAW MALE HOSTEL M & N NEW STUDENT 100%', 2056656, 'Remita', 1, 1, 11794334355, 2, 3, 8, 1, '2023-08-05 15:32:45', '100', '2023-08-05 15:32:45'),
(221, 'FACULTY OF LAW MALE HOSTEL M & N STUDENT 75%', 1542492, 'Remita', 1, 1, 11794514836, 2, 3, 8, 2, '2023-08-05 15:33:46', '75', '2023-08-05 15:33:46'),
(222, 'FACULTY OF LAW MALE HOSTEL M & N NEW STUDENT 50%', 1028328, 'Remita', 1, 1, 11794336853, 2, 3, 8, 2, '2023-08-05 15:35:11', '50', '2023-08-05 15:35:11'),
(223, 'FACULTY OF LAW MALE HOSTEL M & N NEW STUDENT 25%', 514164, 'Remita', 1, 1, 11794338089, 2, 3, 8, 2, '2023-08-05 15:36:08', '25', '2023-08-05 15:36:08'),
(224, 'FACULTY OF LAW FEMALE STANZEL HOSTEL RETURNING STUDENT 100%', 1747600, 'Remita', 1, 2, 11794346122, 2, 3, 8, 1, '2023-08-05 15:45:43', '100', '2023-08-05 15:45:43'),
(225, 'FACULTY OF LAW FEMALE STANZEL HOSTEL RETURNING STUDENT 75%', 1310700, 'Remita', 1, 2, 11794612837, 2, 3, 8, 2, '2023-08-05 15:47:44', '75', '2023-08-05 15:47:44'),
(226, 'FACULTY OF LAW FEMALE STANZEL HOSTEL RETURNING STUDENT 50%', 873800, 'Remita', 1, 2, 11794351255, 2, 3, 8, 2, '2023-08-05 15:49:06', '50', '2023-08-05 15:49:06'),
(227, 'FACULTY OF LAW FEMALE STANZEL HOSTEL RETURNING STUDENT 25%', 436900, 'Remita', 1, 2, 11794352809, 2, 3, 8, 2, '2023-08-05 15:50:37', '25', '2023-08-05 15:50:37'),
(228, 'FACULTY OF LAW FEMALE STANZEL HOSTEL NEW STUDENT 100%', 2016656, 'Remita', 1, 2, 11794354157, 2, 3, 8, 1, '2023-08-05 15:51:51', '100', '2023-08-05 15:51:51'),
(229, 'FACULTY OF LAW FEMALE STANZEL HOSTEL STUDENT 75%', 1512492, 'Remita', 1, 2, 11794356041, 2, 3, 8, 2, '2023-08-05 15:52:52', '75', '2023-08-05 15:52:52'),
(230, 'FACULTY OF LAW FEMALE STANZEL HOSTEL NEW STUDENT 50%', 1008328, 'Remita', 1, 2, 11794357462, 2, 3, 8, 2, '2023-08-05 15:54:46', '50', '2023-08-05 15:54:46'),
(231, 'FACULTY OF LAW FEMALE STANZEL HOSTEL NEW STUDENT 25%', 504164, 'Remita', 1, 2, 11794360094, 2, 3, 8, 2, '2023-08-05 15:56:33', '25', '2023-08-05 15:56:33'),
(232, 'FACULTY OF LAW FEMALE CICL HOSTEL RETURNING STUDENT 100%', 1848800, 'Remita', 1, 2, 11794366340, 2, 3, 8, 1, '2023-08-05 16:01:56', '100', '2023-08-05 16:01:56'),
(233, 'FACULTY OF LAW FEMALE CICL HOSTEL RETURNING STUDENT 75%', 1386600, 'Remita', 1, 2, 11794544709, 2, 3, 8, 2, '2023-08-05 16:03:05', '75', '2023-08-05 16:03:05'),
(234, 'FACULTY OF LAW FEMALE CICL HOSTEL RETURNING STUDENT 50%', 924400, 'Remita', 1, 2, 11794370157, 2, 3, 8, 2, '2023-08-05 16:04:11', '50', '2023-08-05 16:04:11'),
(235, 'FACULTY OF LAW FEMALE CICL HOSTEL RETURNING STUDENT 25%', 462200, 'Remita', 1, 2, 11794546849, 2, 3, 8, 2, '2023-08-05 16:05:21', '25', '2023-08-05 16:05:21'),
(236, 'FACULTY OF LAW FEMALE CICL HOSTEL NEW STUDENT 100%', 2046656, 'Remita', 1, 2, 11794547895, 2, 3, 8, 1, '2023-08-05 16:06:45', '100', '2023-08-05 16:06:45'),
(237, 'FACULTY OF LAW FEMALE CICL HOSTEL NEW STUDENT 75%', 1534992, 'Remita', 1, 2, 11794631665, 2, 3, 8, 2, '2023-08-05 16:08:00', '75', '2023-08-05 16:08:00'),
(238, 'FACULTY OF LAW FEMALE CICL HOSTEL NEW STUDENT 50%', 1023328, 'Remita', 1, 2, 11794375045, 2, 3, 8, 2, '2023-08-05 16:09:04', '50', '2023-08-05 16:09:04'),
(239, 'FACULTY OF LAW FEMALE CICL HOSTEL NEW STUDENT 25%', 511664, 'Remita', 1, 2, 11794375783, 2, 3, 8, 2, '2023-08-05 16:10:20', '25', '2023-08-05 16:10:20'),
(240, 'FACULTY OF LAW FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL RETURNING STUDENT 100%', 1918800, 'Remita', 1, 1, 11794378971, 2, 3, 8, 1, '2023-08-05 16:14:20', '100', '2023-08-05 16:14:20'),
(241, 'FACULTY OF LAW FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL RETURNING STUDENT 75%', 1439100, 'Remita', 1, 1, 11794563148, 2, 3, 8, 2, '2023-08-05 16:15:17', '75', '2023-08-05 16:15:17'),
(242, 'FACULTY OF LAW FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL RETURNING STUDENT 50%', 959400, 'Remita', 1, 1, 11794380062, 2, 3, 8, 2, '2023-08-05 16:16:18', '50', '2023-08-05 16:16:18'),
(243, 'FACULTY OF LAW FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL RETURNING STUDENT 25%', 479700, 'Remita', 1, 1, 11794566113, 2, 3, 8, 2, '2023-08-05 16:17:28', '25', '2023-08-05 16:17:28'),
(244, 'FACULTY OF LAW FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL NEW STUDENT 100%', 2116656, 'Remita', 1, 1, 11794381513, 2, 3, 8, 1, '2023-08-05 16:19:02', '100', '2023-08-05 16:19:02'),
(245, 'FACULTY OF LAW FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL NEW STUDENT 75%', 1587492, 'Remita', 1, 1, 11794382711, 2, 3, 8, 2, '2023-08-05 16:20:09', '75', '2023-08-05 16:20:09'),
(246, 'FACULTY OF LAW FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL NEW STUDENT 50%', 1058328, 'Remita', 1, 1, 11794384217, 2, 3, 8, 2, '2023-08-05 16:21:14', '50', '2023-08-05 16:21:14'),
(247, 'FACULTY OF LAW FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL NEW STUDENT 25%', 529164, 'Remita', 1, 1, 11794385945, 2, 3, 8, 2, '2023-08-05 16:22:29', '25', '2023-08-05 16:22:29'),
(248, 'FACULTY OF LAW WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) RETURNING STUDENT 100%', 1648800, 'Remita', 1, 2, 11794652255, 2, 3, 8, 1, '2023-08-05 16:31:23', '100', '2023-08-05 16:31:23'),
(249, 'FACULTY OF LAW WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) RETURNING STUDENT 75%', 1236600, 'Remita', 1, 2, 11794399401, 2, 3, 8, 2, '2023-08-05 16:32:22', '75', '2023-08-05 16:32:22'),
(250, 'FACULTY OF LAW WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) RETURNING STUDENT STUDENT 50%', 824400, 'Remita', 1, 2, 11794701123, 2, 3, 8, 2, '2023-08-05 16:33:45', '50', '2023-08-05 16:33:45'),
(251, 'FACULTY OF LAW WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) RETURNING STUDENT 25%', 412200, 'Remita', 1, 2, 11794584872, 2, 3, 8, 2, '2023-08-05 16:34:40', '25', '2023-08-05 16:34:40'),
(252, 'FACULTY OF LAW WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) STUDENT 100%', 1813680, 'Remita', 1, 2, 11794704093, 2, 3, 8, 1, '2023-08-05 16:36:30', '100', '2023-08-05 16:36:30'),
(253, 'FACULTY OF LAW WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) STUDENT 75%', 1360260, 'Remita', 1, 2, 11794658708, 2, 3, 8, 2, '2023-08-05 16:37:25', '75', '2023-08-05 16:37:25'),
(254, 'FACULTY OF LAW WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) STUDENT 50%', 906840, 'Remita', 1, 2, 11794706463, 2, 3, 8, 2, '2023-08-05 16:38:40', '50', '2023-08-05 16:38:40'),
(255, 'FACULTY OF LAW WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) STUDENT 25%', 453420, 'Remita', 1, 2, 11794708496, 2, 3, 8, 2, '2023-08-05 16:39:52', '25', '2023-08-05 16:39:52'),
(256, 'FACULTY OF PHARMACY: MALE HOSTELS (C, D, E, F) RETURNING STUDENTS 50%', 963000, 'Remita', 1, 1, 11795079653, 2, 3, 10, 2, '2023-08-05 19:18:50', '50', '2023-08-05 19:18:50'),
(257, 'FACULTY OF PHARMACY: MALE HOSTELS (C, D, E, F) RETURNING STUDENTS 25%', 481500, 'Remita', 1, 1, 11795085338, 2, 3, 10, 2, '2023-08-05 19:22:26', '25', '2023-08-05 19:22:26'),
(258, 'FACULTY OF PHARMACY: MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENTS 100%', 1956000, 'Remita', 1, 1, 11795088529, 2, 3, 10, 1, '2023-08-05 19:26:28', '100', '2023-08-05 19:26:28'),
(259, 'FACULTY OF PHARMACY: MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENTS 75%', 1467000, 'Remita', 1, 1, 11795090355, 2, 3, 10, 2, '2023-08-05 19:30:30', '75', '2023-08-05 19:30:30'),
(260, 'FACULTY OF PHARMACY: MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENTS 50%', 978000, 'Remita', 1, 1, 11795090922, 2, 3, 10, 2, '2023-08-05 19:33:50', '50', '2023-08-05 19:33:50'),
(261, 'FACULTY OF PHARMACY: MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENTS 25%', 489000, 'Remita', 1, 1, 11795092611, 2, 3, 10, 2, '2023-08-05 19:36:23', '25', '2023-08-05 19:36:23'),
(262, 'FACULTY OF PHARMACY: MALE HOSTEL L RETURNING STUDENTS 100%', 1976000, 'Remita', 1, 1, 11794997738, 2, 3, 10, 1, '2023-08-05 19:48:36', '100', '2023-08-05 19:48:36'),
(263, 'FACULTY OF PHARMACY: MALE HOSTEL L RETURNING STUDENTS 75%', 1482000, 'Remita', 1, 1, 11795304032, 2, 3, 10, 2, '2023-08-05 19:54:38', '75', '2023-08-05 19:54:38'),
(264, 'FACULTY OF PHARMACY: MALE HOSTEL L RETURNING STUDENTS 50%', 988000, 'Remita', 1, 1, 11795305563, 2, 3, 10, 2, '2023-08-05 19:57:55', '50', '2023-08-05 19:57:55'),
(265, 'FACULTY OF PHARMACY: MALE HOSTEL L RETURNING STUDENTS 25%', 494000, 'Remita', 1, 1, 11795411290, 2, 3, 10, 2, '2023-08-05 20:06:34', '25', '2023-08-05 20:06:34'),
(266, 'FACULTY OF PHARMACY: MALE HOSTEL M RETURNING STUDENTS 100%', 1996000, 'Remita', 1, 1, 11795314198, 2, 3, 10, 1, '2023-08-05 20:09:53', '100', '2023-08-05 20:09:53'),
(267, 'FACULTY OF PHARMACY: MALE HOSTEL M RETURNING STUDENTS 75%', 1497000, 'Remita', 1, 1, 11795318869, 2, 3, 10, 2, '2023-08-05 20:13:07', '75', '2023-08-05 20:13:07'),
(268, 'FACULTY OF PHARMACY: MALE HOSTEL M RETURNING STUDENTS 50%', 998000, 'Remita', 1, 1, 11795327301, 2, 3, 10, 2, '2023-08-05 20:17:56', '50', '2023-08-05 20:17:56'),
(269, 'FACULTY OF PHARMACY: MALE HOSTEL M RETURNING STUDENTS 25%', 499000, 'Remita', 1, 1, 11795329331, 2, 3, 10, 2, '2023-08-05 20:20:45', '25', '2023-08-05 20:20:45'),
(270, 'FACULTY OF PHARMACY: MALE HOSTEL N RETURNING STUDENTS 100%', 1996000, 'Remita', 1, 1, 11795334895, 2, 3, 10, 1, '2023-08-05 20:29:23', '100', '2023-08-05 20:29:23'),
(271, 'FACULTY OF PHARMACY: MALE HOSTEL N RETURNING STUDENTS 75%', 1497000, 'Remita', 1, 1, 11795336651, 2, 3, 10, 2, '2023-08-05 20:32:32', '75', '2023-08-05 20:32:32');
INSERT INTO `fee_types` (`id`, `name`, `amount`, `provider`, `delivery_code`, `gender_code`, `provider_code`, `status`, `category`, `college_id`, `installment`, `created_at`, `percentage`, `updated_at`) VALUES
(272, 'FACULTY OF PHARMACY: MALE HOSTEL N RETURNING STUDENTS 50%', 998000, 'Remita', 1, 1, 11795599901, 2, 3, 10, 2, '2023-08-05 20:35:21', '50', '2023-08-05 20:35:21'),
(273, 'FACULTY OF PHARMACY: MALE HOSTEL N RETURNING STUDENTS 25%', 499000, 'Remita', 1, 1, 11795433263, 2, 3, 10, 2, '2023-08-05 20:37:38', '25', '2023-08-05 20:37:38'),
(274, 'FACULTY OF PHARMACY: STANZEL FEMALE HOSTEL RETURNING STUDENTS 100%', 1956000, 'Remita', 1, 2, 11800214865, 2, 3, 10, 1, '2023-08-06 06:44:17', '100', '2023-08-06 06:44:17'),
(275, 'FACULTY OF PHARMACY: STANZEL FEMALE HOSTEL RETURNING STUDENTS 75%', 1467000, 'Remita', 1, 2, 11800316362, 2, 3, 10, 2, '2023-08-06 06:50:07', '75', '2023-08-06 06:50:07'),
(276, 'FACULTY OF PHARMACY: STANZEL FEMALE HOSTEL RETURNING STUDENTS 50%', 978000, 'Remita', 1, 2, 11800317385, 2, 3, 10, 2, '2023-08-06 06:52:57', '50', '2023-08-06 06:52:57'),
(277, 'FACULTY OF PHARMACY: STANZEL FEMALE HOSTEL RETURNING STUDENTS 25%', 489000, 'Remita', 1, 2, 11796667606, 2, 3, 10, 2, '2023-08-06 06:55:37', '25', '2023-08-06 06:55:37'),
(278, 'FACULTY OF PHARMACY: CICL FEMALE HOSTEL RETURNING STUDENTS 100%', 1986000, 'Remita', 1, 2, 11796669471, 2, 3, 10, 1, '2023-08-06 06:59:48', '100', '2023-08-06 06:59:48'),
(279, 'FACULTY OF PHARMACY: CICL FEMALE HOSTEL RETURNING STUDENTS 75%', 1489500, 'Remita', 1, 2, 11796671172, 2, 3, 10, 2, '2023-08-06 07:02:52', '75', '2023-08-06 07:02:52'),
(280, 'FACULTY OF PHARMACY: CICL FEMALE HOSTEL RETURNING STUDENTS 50%', 993000, 'Remita', 1, 2, 11800329269, 2, 3, 10, 2, '2023-08-06 07:05:00', '50', '2023-08-06 07:05:00'),
(281, 'FACULTY OF PHARMACY: CICL FEMALE HOSTEL RETURNING STUDENTS 25%', 496500, 'Remita', 1, 2, 11800338497, 2, 3, 10, 2, '2023-08-06 07:12:54', '25', '2023-08-06 07:12:54'),
(282, 'FACULTY OF PHARMACY: PA-ETO FEMALE HOSTEL RETURNING STUDENTS 100%', 1786000, 'Remita', 1, 2, 11800342318, 2, 3, 10, 1, '2023-08-06 07:16:44', '100', '2023-08-06 07:16:44'),
(283, 'FACULTY OF PHARMACY: PA-ETO FEMALE HOSTEL RETURNING STUDENTS 75%', 1339500, 'Remita', 1, 2, 11800345212, 2, 3, 10, 2, '2023-08-06 07:19:40', '75', '2023-08-06 07:19:40'),
(284, 'FACULTY OF PHARMACY: PA-ETO FEMALE HOSTEL RETURNING STUDENTS 50%', 893000, 'Remita', 1, 2, 11796684483, 2, 3, 10, 2, '2023-08-06 07:41:58', '50', '2023-08-06 07:41:58'),
(285, 'FACULTY OF PHARMACY: PA-ETO FEMALE HOSTEL RETURNING STUDENTS 25%', 446500, 'Remita', 1, 2, 11796695270, 2, 3, 10, 2, '2023-08-06 07:44:10', '25', '2023-08-06 07:44:10'),
(286, 'FACULTY OF PHARMACY: KELSON HOSTEL RETURNING STUDENTS 100%', 2056000, 'Remita', 1, 2, 11796697052, 2, 3, 10, 1, '2023-08-06 07:48:20', '100', '2023-08-06 07:48:20'),
(287, 'FACULTY OF PHARMACY: KELSON HOSTEL RETURNING STUDENTS 75%', 1542000, 'Remita', 1, 2, 11800398905, 2, 3, 10, 2, '2023-08-06 10:21:01', '75', '2023-08-06 10:21:01'),
(288, 'FACULTY OF PHARMACY: KELSON HOSTEL RETURNING STUDENTS 50%', 1028000, 'Remita', 1, 2, 11800701155, 2, 3, 10, 2, '2023-08-06 10:23:05', '50', '2023-08-06 10:23:05'),
(289, 'FACULTY OF PHARMACY: KELSON HOSTEL RETURNING STUDENTS 25%', 514000, 'Remita', 1, 2, 11800590572, 2, 3, 10, 2, '2023-08-06 10:25:08', '25', '2023-08-06 10:25:08'),
(290, 'FACULTY OF PHARMACY: MALE HOSTELS (C, D, E, F) NEW STUDENTS 100%', 2140320, 'Remita', 1, 1, 11800598913, 2, 3, 10, 1, '2023-08-06 10:45:13', '100', '2023-08-06 10:45:13'),
(291, 'FACULTY OF PHARMACY: MALE HOSTELS (C, D, E, F) NEW STUDENTS SEVENT-FIVE PERCENT', 1605240, 'Remita', 1, 1, 11800693546, 2, 3, 10, 2, '2023-08-06 10:50:42', NULL, '2023-08-06 10:50:42'),
(292, 'FACULTY OF PHARMACY: MALE HOSTELS (C, D, E, F) NEW STUDENTS 50%', 1070160, 'Remita', 1, 1, 11800805455, 2, 3, 10, 2, '2023-08-06 10:53:17', '50', '2023-08-06 10:53:17'),
(293, 'FACULTY OF PHARMACY: MALE HOSTELS (C, D, E, F) NEW STUDENTS 25%', 535080, 'Remita', 1, 1, 11800806769, 2, 3, 10, 2, '2023-08-06 10:56:03', '25', '2023-08-06 10:56:03'),
(294, 'FACULTY OF PHARMACY: MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENTS 100%', 2170320, 'Remita', 1, 1, 11800722836, 2, 3, 10, 1, '2023-08-06 10:58:17', '100', '2023-08-06 10:58:17'),
(295, 'FACULTY OF PHARMACY: MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENTS 75%', 1627740, 'Remita', 1, 1, 11800807939, 2, 3, 10, 2, '2023-08-06 11:00:04', '75', '2023-08-06 11:00:04'),
(296, 'FACULTY OF PHARMACY: MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENTS 50%', 1085160, 'Remita', 1, 1, 11800724677, 2, 3, 10, 2, '2023-08-06 11:01:40', '50', '2023-08-06 11:01:40'),
(297, 'FACULTY OF PHARMACY: MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENTS 25%', 542580, 'Remita', 1, 1, 11800810098, 2, 3, 10, 2, '2023-08-06 11:03:19', '25', '2023-08-06 11:03:19'),
(298, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTELS (C, D, E, F)  100%', 810000, 'Remita', 1, 1, 11800808274, 2, 3, 10, 1, '2023-08-06 11:03:38', '100', '2023-08-06 11:03:38'),
(299, 'FACULTY OF PHARMACY: MALE HOSTEL L NEW STUDENTS 100%', 2190320, 'Remita', 1, 1, 11800811557, 2, 3, 10, 1, '2023-08-06 11:05:15', '100', '2023-08-06 11:05:15'),
(300, 'FACULTY OF PHARMACY: MALE HOSTEL L NEW STUDENTS 75%', 1642740, 'Remita', 1, 1, 11800727671, 2, 3, 10, 2, '2023-08-06 11:07:41', '75', '2023-08-06 11:07:41'),
(301, 'FACULTY OF PHARMACY: MALE HOSTEL L NEW STUDENTS 50%', 1095160, 'Remita', 1, 1, 11800813115, 2, 3, 10, 2, '2023-08-06 11:10:20', '50', '2023-08-06 11:10:20'),
(302, 'FACULTY OF PHARMACY: MALE HOSTEL L NEW STUDENTS 25%', 547580, 'Remita', 1, 1, 11800814093, 2, 3, 10, 2, '2023-08-06 11:12:03', '25', '2023-08-06 11:12:03'),
(303, 'FACULTY OF PHARMACY: MALE HOSTEL M NEW STUDENTS 100%', 2210320, 'Remita', 1, 1, 11800815293, 2, 3, 10, 1, '2023-08-06 11:14:06', '100', '2023-08-06 11:14:06'),
(304, 'FACULTY OF PHARMACY: MALE HOSTEL M NEW STUDENTS 75%', 1657740, 'Remita', 1, 1, 11800733089, 2, 3, 10, 2, '2023-08-06 11:16:08', '75', '2023-08-06 11:16:08'),
(305, 'FACULTY OF PHARMACY: MALE HOSTEL M NEW STUDENTS 50%', 1105160, 'Remita', 1, 1, 11800734764, 2, 3, 10, 2, '2023-08-06 11:18:44', '50', '2023-08-06 11:18:44'),
(306, 'FACULTY OF PHARMACY: MALE HOSTEL M NEW STUDENTS 25%', 552580, 'Remita', 1, 1, 11800819819, 2, 3, 10, 2, '2023-08-06 11:21:43', '25', '2023-08-06 11:21:43'),
(307, 'FACULTY OF PHARMACY: MALE HOSTEL N NEW STUDENTS 100%', 2210320, 'Remita', 1, 1, 11800737099, 2, 3, 10, 1, '2023-08-06 11:24:11', '100', '2023-08-06 11:24:11'),
(308, 'FACULTY OF PHARMACY: MALE HOSTEL N NEW STUDENTS 75%', 1657740, 'Remita', 1, 1, 11800909298, 2, 3, 10, 2, '2023-08-06 11:26:07', '75', '2023-08-06 11:26:07'),
(309, 'FACULTY OF PHARMACY: MALE HOSTEL N NEW STUDENTS 50%', 1105160, 'Remita', 1, 1, 11800824717, 2, 3, 10, 2, '2023-08-06 11:28:11', '50', '2023-08-06 11:28:11'),
(310, 'FACULTY OF PHARMACY: MALE HOSTEL N NEW STUDENTS 25%', 552580, 'Remita', 1, 1, 11800910600, 2, 3, 10, 2, '2023-08-06 11:29:50', '25', '2023-08-06 11:29:50'),
(311, 'FACULTY OF PHARMACY: STANZEL FEMALE HOSTEL NEW STUDENTS 100%', 2170320, 'Remita', 1, 2, 11800828957, 2, 3, 10, 1, '2023-08-06 11:33:05', '100', '2023-08-06 11:33:05'),
(312, 'FACULTY OF PHARMACY: STANZEL FEMALE HOSTEL NEW STUDENTS 75%', 1627740, 'Remita', 1, 2, 11800913651, 2, 3, 10, 2, '2023-08-06 11:34:59', '75', '2023-08-06 11:34:59'),
(313, 'FACULTY OF PHARMACY: STANZEL FEMALE HOSTEL NEW STUDENTS 50%', 1085160, 'Remita', 1, 2, 11800914623, 2, 3, 10, 2, '2023-08-06 11:36:35', '50', '2023-08-06 11:36:35'),
(314, 'FACULTY OF PHARMACY: STANZEL FEMALE HOSTEL NEW STUDENTS 25%', 542580, 'Remita', 1, 2, 11800831697, 2, 3, 10, 2, '2023-08-06 11:38:22', '25', '2023-08-06 11:38:22'),
(315, 'FACULTY OF PHARMACY: CICL FEMALE HOSTEL NEW STUDENTS 100%', 2200320, 'Remita', 1, 2, 11800833374, 2, 3, 10, 1, '2023-08-06 11:40:39', '100', '2023-08-06 11:40:39'),
(316, 'FACULTY OF PHARMACY: CICL FEMALE HOSTEL NEW STUDENTS 75%', 1650240, 'Remita', 1, 2, 11800917445, 2, 3, 10, 2, '2023-08-06 11:42:24', '75', '2023-08-06 11:42:24'),
(317, 'FACULTY OF PHARMACY: CICL FEMALE HOSTEL NEW STUDENTS 50%', 1100160, 'Remita', 1, 2, 11800835285, 2, 3, 10, 2, '2023-08-06 11:44:04', '50', '2023-08-06 11:44:04'),
(318, 'FACULTY OF PHARMACY: CICL FEMALE HOSTEL NEW STUDENTS 25%', 550080, 'Remita', 1, 2, 11800836620, 2, 3, 10, 2, '2023-08-06 11:46:05', '25', '2023-08-06 11:46:05'),
(319, 'FACULTY OF PHARMACY: PA-ETO FEMALE HOSTEL NEW STUDENTS 100%', 2000320, 'Remita', 1, 2, 11800837859, 2, 3, 10, 1, '2023-08-06 11:48:22', '100', '2023-08-06 11:48:22'),
(320, 'FACULTY OF PHARMACY: PA-ETO FEMALE HOSTEL NEW STUDENTS 75%', 1500240, 'Remita', 1, 2, 11800839004, 2, 3, 10, 2, '2023-08-06 11:50:10', '75', '2023-08-06 11:50:10'),
(321, 'FACULTY OF PHARMACY: PA-ETO FEMALE HOSTEL NEW STUDENTS 50%', 1000160, 'Remita', 1, 2, 11800840071, 2, 3, 10, 2, '2023-08-06 11:51:54', '50', '2023-08-06 11:51:54'),
(322, 'FACULTY OF PHARMACY: PA-ETO FEMALE HOSTEL NEW STUDENTS 25%', 500080, 'Remita', 1, 2, 11800841342, 2, 3, 10, 2, '2023-08-06 11:53:29', '25', '2023-08-06 11:53:29'),
(323, 'FACULTY OF PHARMACY: KELSON HOSTEL NEW STUDENTS 100%', 2270320, 'Remita', 1, 2, 11800842104, 2, 3, 10, 1, '2023-08-06 11:55:28', '100', '2023-08-06 11:55:28'),
(324, 'FACULTY OF PHARMACY: KELSON HOSTEL NEW STUDENTS 75%', 1702740, 'Remita', 1, 2, 11800842903, 2, 3, 10, 2, '2023-08-06 11:57:32', '75', '2023-08-06 11:57:32'),
(325, 'FACULTY OF PHARMACY: KELSON HOSTEL NEW STUDENTS 50%', 1135160, 'Remita', 1, 2, 11800844000, 2, 3, 10, 2, '2023-08-06 11:59:16', '50', '2023-08-06 11:59:16'),
(326, 'FACULTY OF PHARMACY: KELSON HOSTEL NEW STUDENTS 25%', 567580, 'Remita', 1, 2, 11800844372, 2, 3, 10, 2, '2023-08-06 12:01:04', '25', '2023-08-06 12:01:04'),
(327, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTELS (C, D, E, F) 75%', 607500, 'Remita', 1, 1, 11803988675, 2, 3, 4, 2, '2023-08-07 07:43:57', '75', '2023-08-07 07:43:57'),
(328, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTELS (C, D, E, F) 50%', 405000, 'Remita', 1, 1, 11804077689, 2, 3, 4, 2, '2023-08-07 07:45:30', '50', '2023-08-07 07:45:30'),
(329, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTELS (C, D, E, F) 25%', 202500, 'Remita', 1, 1, 11804079235, 2, 3, 4, 2, '2023-08-07 07:46:46', '25', '2023-08-07 07:46:46'),
(330, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTELS (A, B, G, I, J, K)  100%', 840000, 'Remita', 1, 1, 11804080977, 2, 3, 4, 1, '2023-08-07 07:48:19', '100', '2023-08-07 07:48:19'),
(331, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTELS (A, B, G, I, J, K)  75%', 630000, 'Remita', 1, 1, 11804082793, 2, 3, 4, 2, '2023-08-07 07:49:42', '75', '2023-08-07 07:49:42'),
(332, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTELS (A, B, G, I, J, K)  50%', 420000, 'Remita', 1, 1, 11804200453, 2, 3, 4, 2, '2023-08-07 07:50:40', '50', '2023-08-07 07:50:40'),
(333, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTELS (A, B, G, I, J, K)  25%', 210000, 'Remita', 1, 1, 11804202270, 2, 3, 4, 2, '2023-08-07 07:51:40', '25', '2023-08-07 07:51:40'),
(334, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTEL L 100%', 860000, 'Remita', 1, 1, 11804088956, 2, 3, 4, 1, '2023-08-07 07:53:52', '100', '2023-08-07 07:53:52'),
(335, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTEL L 75%', 645000, 'Remita', 1, 1, 11804091337, 2, 3, 4, 2, '2023-08-07 07:55:21', '75', '2023-08-07 07:55:21'),
(336, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTEL L 50%', 430000, 'Remita', 1, 1, 11804095108, 2, 3, 4, 2, '2023-08-07 07:57:45', '50', '2023-08-07 07:57:45'),
(337, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTEL L 25%', 215000, 'Remita', 1, 1, 11804098365, 2, 3, 4, 2, '2023-08-07 07:58:42', '25', '2023-08-07 07:58:42'),
(338, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTEL M & N 100%', 880000, 'Remita', 1, 1, 11804303061, 2, 3, 4, 1, '2023-08-07 08:01:50', '100', '2023-08-07 08:01:50'),
(339, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTEL M & N 75%', 660000, 'Remita', 1, 1, 11804308193, 2, 3, 4, 2, '2023-08-07 08:02:48', '75', '2023-08-07 08:02:48'),
(340, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTEL M & N 50%', 440000, 'Remita', 1, 1, 11804310468, 2, 3, 4, 2, '2023-08-07 08:04:09', '50', '2023-08-07 08:04:09'),
(341, 'FACULTIES OF HUMANITIES & SOC SCIENCES MALE HOSTEL M & N 25%', 220000, 'Remita', 1, 1, 11804311824, 2, 3, 4, 2, '2023-08-07 08:05:02', '25', '2023-08-07 08:05:02'),
(342, 'FACULTIES OF HUMANITIES & SOC SCIENCES FEMALE STANZEL HOSTEL 100%', 840000, 'Remita', 1, 2, 11804233429, 2, 3, 4, 1, '2023-08-07 08:10:56', '100', '2023-08-07 08:10:56'),
(343, 'FACULTIES OF HUMANITIES & SOC SCIENCES FEMALE STANZEL HOSTEL 75%', 630000, 'Remita', 1, 2, 11804321748, 2, 3, 4, 2, '2023-08-07 08:15:39', '75', '2023-08-07 08:15:39'),
(344, 'FACULTIES OF HUMANITIES & SOC SCIENCES FEMALE STANZEL HOSTEL 50%', 420000, 'Remita', 1, 2, 11804329512, 2, 3, 4, 2, '2023-08-07 08:16:50', '50', '2023-08-07 08:16:50'),
(345, 'FACULTIES OF HUMANITIES & SOC SCIENCES FEMALE STANZEL HOSTEL 25%', 210000, 'Remita', 1, 2, 11804331134, 2, 3, 4, 2, '2023-08-07 08:17:45', '25', '2023-08-07 08:17:45'),
(346, 'FACULTIES OF HUMANITIES & SOC SCIENCES FEMALE CICL HOSTEL 100%', 870000, 'Remita', 1, 2, 11804334762, 2, 3, 4, 1, '2023-08-07 08:19:34', '100', '2023-08-07 08:19:34'),
(347, 'FACULTIES OF HUMANITIES & SOC SCIENCES FEMALE CICL HOSTEL 75%', 652500, 'Remita', 1, 2, 11804336484, 2, 3, 4, 2, '2023-08-07 08:20:27', '75', '2023-08-07 08:20:27'),
(348, 'FACULTIES OF HUMANITIES & SOC SCIENCES FEMALE CICL HOSTEL 50%', 435000, 'Remita', 1, 2, 11804268073, 2, 3, 4, 2, '2023-08-07 08:28:08', '50', '2023-08-07 08:28:08'),
(349, 'FACULTIES OF HUMANITIES & SOC SCIENCES FEMALE CICL HOSTEL 25%', 217500, 'Remita', 1, 2, 11804355718, 2, 3, 4, 2, '2023-08-07 08:29:12', '25', '2023-08-07 08:29:12'),
(350, 'FACULTIES OF HUMANITIES & SOC SCIENCES FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL 100%', 940000, 'Remita', 1, 1, 11804278989, 2, 3, 4, 1, '2023-08-07 08:32:17', '100', '2023-08-07 08:32:17'),
(351, 'FACULTIES OF HUMANITIES & SOC SCIENCES FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL 75%', 705000, 'Remita', 1, 1, 11804293413, 2, 3, 4, 2, '2023-08-07 08:33:12', '75', '2023-08-07 08:33:12'),
(352, 'FACULTIES OF HUMANITIES & SOC SCIENCES FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL 50%', 470000, 'Remita', 1, 1, 11804364664, 2, 3, 4, 2, '2023-08-07 08:34:02', '50', '2023-08-07 08:34:02'),
(353, 'FACULTIES OF HUMANITIES & SOC SCIENCES FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL 25%', 235000, 'Remita', 1, 1, 11804366131, 2, 3, 4, 2, '2023-08-07 08:35:07', '25', '2023-08-07 08:35:07'),
(354, 'FACULTIES OF HUMANITIES & SOC SCIENCES WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) 100%', 670000, 'Remita', 1, 2, 11804371930, 2, 3, 4, 1, '2023-08-07 08:39:03', '100', '2023-08-07 08:39:03'),
(355, 'FACULTIES OF HUMANITIES & SOC SCIENCES WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) 75%', 502500, 'Remita', 1, 2, 11804469848, 2, 3, 4, 2, '2023-08-07 08:40:00', '75', '2023-08-07 08:40:00'),
(356, 'FACULTIES OF HUMANITIES & SOC SCIENCES WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) 50%', 335000, 'Remita', 1, 2, 11804472566, 2, 3, 4, 2, '2023-08-07 08:41:04', '50', '2023-08-07 08:41:04'),
(357, 'FACULTIES OF HUMANITIES & SOC SCIENCES WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) 25%', 167500, 'Remita', 1, 2, 11804377239, 2, 3, 4, 2, '2023-08-07 08:41:59', '25', '2023-08-07 08:41:59'),
(358, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTELS (C, D, E, F)  100% =  ₦890000', 890000, 'Remita', 1, 1, 9069941106, 2, 3, 2, 1, '2023-08-07 13:36:57', '100', '2023-08-07 13:36:57'),
(359, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTELS (C, D, E, F)  75% = ₦667500', 667500, 'Remita', 1, 1, 8421327529, 2, 3, 2, 2, '2023-08-07 13:37:00', '75', '2023-08-07 13:37:00'),
(360, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTELS (C, D, E, F)  50% = ₦445000', 445000, 'Remita', 1, 1, 9971870546, 2, 3, 2, 2, '2023-08-07 13:37:03', '50', '2023-08-07 13:37:03'),
(361, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTELS (C, D, E, F)  25% = ₦222500', 222500, 'Remita', 1, 1, 9967998553, 2, 3, 2, 2, '2023-08-07 13:37:05', '25', '2023-08-07 13:37:05'),
(362, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTELS (A, B, G, I, J, K)  100% = ₦920000', 920000, 'Remita', 1, 1, 11714369539, 2, 3, 2, 1, '2023-08-07 13:37:06', '100', '2023-08-07 13:37:06'),
(363, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTELS (A, B, G, I, J, K)   75% = ₦690000', 690000, 'Remita', 1, 1, 11714377541, 2, 3, 2, 2, '2023-08-07 13:37:08', '75', '2023-08-07 13:37:08'),
(364, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTELS (A, B, G, I, J, K)   50% = ₦460000', 460000, 'Remita', 1, 1, 11714397471, 2, 3, 2, 2, '2023-08-07 13:37:10', '50', '2023-08-07 13:37:10'),
(365, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTELS (A, B, G, I, J, K)   25%  =  ₦230000', 230000, 'Remita', 1, 1, 11714685734, 2, 3, 2, 2, '2023-08-07 13:37:12', '25', '2023-08-07 13:37:12'),
(366, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTEL (L) 100% = ₦940000', 940000, 'Remita', 1, 1, 9069810194, 2, 3, 2, 1, '2023-08-07 14:01:12', '100', '2023-08-07 14:01:12'),
(367, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTEL (L) 75% = ₦705000', 705000, 'Remita', 1, 1, 9069944805, 2, 3, 2, 2, '2023-08-07 14:01:14', '75', '2023-08-07 14:01:14'),
(368, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTEL (L) 50% = ₦470000', 470000, 'Remita', 1, 1, 9971926860, 2, 3, 2, 2, '2023-08-07 14:01:16', '50', '2023-08-07 14:01:16'),
(369, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTEL (L) 25% = ₦235000', 235000, 'Remita', 1, 1, 9968161310, 2, 3, 2, 2, '2023-08-07 14:01:18', '25', '2023-08-07 14:01:18'),
(370, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTEL (M) 100% = ₦960000', 960000, 'Remita', 1, 1, 9069789251, 2, 3, 2, 1, '2023-08-07 14:01:20', '100', '2023-08-07 14:01:20'),
(371, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTEL (M) 75% = ₦720000', 720000, 'Remita', 1, 1, 8990825967, 2, 3, 2, 2, '2023-08-07 14:01:22', '75', '2023-08-07 14:01:22'),
(372, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTEL (M) 50% = ₦480000', 480000, 'Remita', 1, 1, 9971564005, 2, 3, 2, 2, '2023-08-07 14:01:24', '50', '2023-08-07 14:01:24'),
(373, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTEL (M) 25% = ₦240000', 240000, 'Remita', 1, 1, 11801235896, 2, 3, 2, 2, '2023-08-07 14:01:26', '25', '2023-08-07 14:01:26'),
(374, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTEL(N) 100% = ₦960000', 960000, 'Remita', 1, 1, 11801244478, 2, 3, 2, 1, '2023-08-07 14:32:50', '100', '2023-08-07 14:32:50'),
(375, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTEL (N) 75% = ₦720000', 720000, 'Remita', 1, 1, 11801244634, 2, 3, 2, 2, '2023-08-07 14:32:55', '75', '2023-08-07 14:32:55'),
(376, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTEL (N) 50% = ₦480000', 480000, 'Remita', 1, 1, 11801244872, 2, 3, 2, 2, '2023-08-07 14:33:01', '50', '2023-08-07 14:33:01'),
(377, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT MALE HOSTEL (N) 25% = ₦240000', 240000, 'Remita', 1, 1, 11801245244, 2, 3, 2, 2, '2023-08-07 14:33:06', '25', '2023-08-07 14:33:06'),
(378, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT STANZEL FEMALE HOSTEL 100% = ₦920000', 920000, 'Remita', 1, 2, 9070096986, 2, 3, 2, 1, '2023-08-07 14:33:11', '100', '2023-08-07 14:33:11'),
(379, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT STANZEL FEMALE HOSTEL 75% = ₦690000', 690000, 'Remita', 1, 2, 8991248934, 2, 3, 2, 2, '2023-08-07 14:33:15', '75', '2023-08-07 14:33:15'),
(380, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT STANZEL FEMALE HOSTEL 50% = ₦460000', 460000, 'Remita', 1, 2, 9971856939, 2, 3, 2, 2, '2023-08-07 14:33:21', '50', '2023-08-07 14:33:21'),
(381, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT STANZEL FEMALE HOSTEL 25% = ₦230000', 230000, 'Remita', 1, 2, 11801116339, 2, 3, 2, 2, '2023-08-07 14:33:30', '25', '2023-08-07 14:33:30'),
(382, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT CICL FEMALE HOSTEL  100% = ₦950000', 950000, 'Remita', 1, 2, 8421590073, 2, 3, 2, 1, '2023-08-07 14:33:34', '100', '2023-08-07 14:33:34'),
(383, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT CICL FEMALE HOSTEL 75% = ₦712500', 712500, 'Remita', 1, 2, 8422118299, 2, 3, 2, 2, '2023-08-07 14:33:37', '75', '2023-08-07 14:33:37'),
(384, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT CICL FEMALE HOSTEL  50% = ₦475000', 475000, 'Remita', 1, 2, 9971860244, 2, 3, 2, 2, '2023-08-07 14:33:44', '50', '2023-08-07 14:33:44'),
(385, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT CICL FEMALE HOSTEL 25% = ₦237500', 237500, 'Remita', 1, 2, 11801021723, 2, 3, 2, 2, '2023-08-07 14:33:48', '25', '2023-08-07 14:33:48'),
(386, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT PA-ETO FEMALE HOSTEL (WITHOUT HOSTEL FEE)   100% = ₦750000', 750000, 'Remita', 1, 2, 8421570357, 2, 3, 2, 1, '2023-08-07 14:43:51', '100', '2023-08-07 14:43:51'),
(387, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT PA-ETO FEMALE HOSTEL (WITHOUT HOSTEL FEE)   75% = ₦562500', 562500, 'Remita', 1, 2, 8993970141, 2, 3, 2, 2, '2023-08-07 14:43:54', '75', '2023-08-07 14:43:54'),
(388, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT PA-ETO FEMALE HOSTEL (WITHOUT HOSTEL FEE)   50% = ₦375000', 375000, 'Remita', 1, 2, 9971749283, 2, 3, 2, 2, '2023-08-07 14:43:56', '50', '2023-08-07 14:43:56'),
(389, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT PA-ETO FEMALE HOSTEL (WITHOUT HOSTEL FEE)   25% = ₦187500', 187500, 'Remita', 1, 2, 11801239208, 2, 3, 2, 2, '2023-08-07 14:43:58', '25', '2023-08-07 14:43:58'),
(390, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT KELSON FEMALE HOSTEL  100% = ₦1020000', 1020000, 'Remita', 1, 2, 11801404111, 2, 3, 2, 1, '2023-08-07 14:44:00', '100', '2023-08-07 14:44:00'),
(391, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT KELSON FEMALE HOSTEL   75% = ₦765000', 765000, 'Remita', 1, 2, 11801245638, 2, 3, 2, 2, '2023-08-07 14:44:02', '75', '2023-08-07 14:44:02'),
(392, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT KELSON FEMALE HOSTEL  50%  = ₦510000', 510000, 'Remita', 1, 2, 11801245684, 2, 3, 2, 2, '2023-08-07 14:44:05', '50', '2023-08-07 14:44:05'),
(393, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT KELSON FEMALE HOSTEL  25% = ₦255000', 255000, 'Remita', 1, 2, 11801245738, 2, 3, 2, 2, '2023-08-07 14:44:07', '25', '2023-08-07 14:44:07'),
(394, 'FACULTY OF MANAGEMENT SCIENCES: EXCLUDING ACCOUNTING (NEW AND RETURNING STUDENTS) MALE HOSTEL (C, D, E, F) 75%', 615750, 'Remita', 1, 1, 11773261390, 2, 3, 5, 2, '2023-08-08 09:07:47', '75', '2023-08-08 09:07:47'),
(395, 'FACULTY OF MANAGEMENT SCIENCES, EXCLUDING ACCOUNTING (NEW AND RETURNING STUDENTS) MALE HOSTEL (C, D, E, F) 25%', 214500, 'Remita', 1, 1, 11773275296, 2, 3, 5, 2, '2023-08-08 09:34:49', '25', '2023-08-08 09:34:49'),
(396, 'FACULTY OF MANAGEMENT SCIENCES, EXCLUDING ACCOUNTING (NEW AND RETURNING STUDENTS) MALE HOSTEL (C, D, E, F) 50%', 429000, 'Remita', 1, 1, 11773269644, 2, 3, 5, 2, '2023-08-08 09:36:25', '50', '2023-08-08 09:36:25'),
(397, 'FACULTY OF MANAGEMENT SCIENCES: EXCLUDING ACCOUNTING (NEW AND RETURNING STUDENTS) MALE HOSTEL (A, B, G, H, I, J, K)  100%', 851000, 'Remita', 1, 1, 11773284079, 2, 3, 5, 1, '2023-08-08 09:43:32', '100', '2023-08-08 09:43:32'),
(398, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (C, D, E, F)  RETURNING STUDENT 100%', 1926000, 'Remita', 1, 1, 1177410909700, 2, 3, 9, 1, '2023-08-08 14:00:42', '100', '2023-08-08 14:00:42'),
(399, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (C, D, E, F)  RETURNING STUDENT 75%', 1444500, 'Remita', 1, 1, 11774110094, 2, 3, 9, 1, '2023-08-08 14:00:42', '75', '2023-08-08 14:00:42'),
(400, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (C, D, E, F)  RETURNING STUDENT 50%', 963000, 'Remita', 1, 1, 11773954782, 2, 3, 9, 1, '2023-08-08 14:00:42', '50', '2023-08-08 14:00:42'),
(401, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (C, D, E, F)  RETURNING STUDENT 25%', 481500, 'Remita', 1, 1, 11774112956, 2, 3, 9, 1, '2023-08-08 14:00:42', '25', '2023-08-08 14:00:42'),
(402, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (C, D, E, F)  NEW STUDENT 100% = N2140320', 2140320, 'Remita', 1, 1, 11774071382, 2, 3, 9, 1, '2023-08-08 14:00:42', '100', '2023-08-08 14:00:42'),
(403, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (C, D, E, F)  NEW STUDENT 75% = N1605240', 1605240, 'Remita', 1, 1, 11774120104, 2, 3, 9, 1, '2023-08-08 14:00:42', '75', '2023-08-08 14:00:42'),
(404, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (C, D, E, F)  NEW STUDENT 50% = N1070160', 1070160, 'Remita', 1, 1, 11773973145, 2, 3, 9, 1, '2023-08-08 14:00:42', '50', '2023-08-08 14:00:42'),
(405, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (C, D, E, F)  NEW STUDENT 25% = N535080', 535080, 'Remita', 1, 1, 11774121504, 2, 3, 9, 1, '2023-08-08 14:00:42', '25', '2023-08-08 14:00:42'),
(406, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENT 100%', 1956000, 'Remita', 1, 1, 11773984391, 2, 3, 9, 1, '2023-08-08 14:00:42', '100', '2023-08-08 14:00:42'),
(407, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENT 75%', 1467000, 'Remita', 1, 1, 11774129541, 2, 3, 9, 1, '2023-08-08 14:00:42', '75', '2023-08-08 14:00:42'),
(408, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENT 50%', 978000, 'Remita', 1, 1, 11774086734, 2, 3, 9, 1, '2023-08-08 14:00:42', '50', '2023-08-08 14:00:42'),
(409, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENT 25%', 489000, 'Remita', 1, 1, 11774179264, 2, 3, 9, 1, '2023-08-08 14:00:42', '25', '2023-08-08 14:00:42'),
(410, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT 100% = N2170320', 2170320, 'Remita', 1, 1, 11774214884, 2, 3, 9, 1, '2023-08-08 14:00:42', '100', '2023-08-08 14:00:42'),
(411, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT 75% = N1627740', 1627740, 'Remita', 1, 1, 11774215505, 2, 3, 9, 1, '2023-08-08 14:00:42', '75', '2023-08-08 14:00:42'),
(412, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT 50%=N1085160', 1085160, 'Remita', 1, 1, 11774392584, 2, 3, 9, 1, '2023-08-08 14:00:42', '50', '2023-08-08 14:00:42'),
(413, 'FACULTY OF HEALTH SCIENCES: NURSING MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT 25% = N542580', 542580, 'Remita', 1, 1, 11774252554, 2, 3, 9, 1, '2023-08-08 14:00:42', '25', '2023-08-08 14:00:42'),
(414, 'FACULTY OF HEALTH SCIENCES: NURSING MALE L RETURNING STUDENT 100%', 1976000, 'Remita', 1, 1, 11774517314, 2, 3, 9, 1, '2023-08-08 14:00:42', '100', '2023-08-08 14:00:42'),
(415, 'FACULTY OF HEALTH SCIENCES: NURSING MALE L RETURNING STUDENT 75%', 1482000, 'Remita', 1, 1, 11774266994, 2, 3, 9, 1, '2023-08-08 14:00:42', '75', '2023-08-08 14:00:42'),
(416, 'FACULTY OF HEALTH SCIENCES: NURSING MALE L RETURNING STUDENT 50%', 988000, 'Remita', 1, 1, 11774418905, 2, 3, 9, 1, '2023-08-08 14:00:42', '50', '2023-08-08 14:00:42'),
(417, 'FACULTY OF HEALTH SCIENCES: NURSING MALE L STUDENT 25%', 543400, 'Remita', 1, 1, 11774284001, 2, 3, 9, 1, '2023-08-08 14:00:42', '25', '2023-08-08 14:00:42'),
(418, 'FACULTY OF HEALTH SCIENCES: NURSING MALE M RETURNING STUDENT 100%', 1996000, 'Remita', 1, 1, 11774296299, 2, 3, 9, 1, '2023-08-08 14:00:42', '100', '2023-08-08 14:00:42'),
(419, 'FACULTY OF HEALTH SCIENCES: NURSING MALE M RETURNING STUDENT 75%', 1497000, 'Remita', 1, 1, 11774297058, 2, 3, 9, 1, '2023-08-08 14:00:42', '75', '2023-08-08 14:00:42'),
(420, 'FACULTY OF HEALTH SCIENCES: NURSING MALE M RETURNING STUDENT 50%', 998000, 'Remita', 1, 1, 11774297715, 2, 3, 9, 1, '2023-08-08 14:00:42', '50', '2023-08-08 14:00:42'),
(421, 'FACULTY OF HEALTH SCIENCES: NURSING MALE M RETURNING STUDENT 25%', 499000, 'Remita', 1, 1, 11774298379, 2, 3, 9, 1, '2023-08-08 14:00:42', '25', '2023-08-08 14:00:42'),
(422, 'FACULTY OF HEALTH SCIENCES: NURSING MALE M NEW STUDENT 100% =N2210320', 2210320, 'Remita', 1, 1, 11774949508, 2, 3, 9, 1, '2023-08-08 14:00:42', '100', '2023-08-08 14:00:42'),
(423, 'FACULTY OF HEALTH SCIENCES: NURSING MALE M NEW STUDENT 75% =N1657740', 1657740, 'Remita', 1, 1, 11775004227, 2, 3, 9, 1, '2023-08-08 14:00:42', '75', '2023-08-08 14:00:42'),
(424, 'FACULTY OF HEALTH SCIENCES: NURSING MALE M NEW STUDENT 50% = N1105160', 1105160, 'Remita', 1, 1, 11775004947, 2, 3, 9, 1, '2023-08-08 14:00:42', '50', '2023-08-08 14:00:42'),
(425, 'FACULTY OF HEALTH SCIENCES: NURSING MALE M NEW STUDENT 25% =N552580', 552580, 'Remita', 1, 1, 11775005771, 2, 3, 9, 1, '2023-08-08 14:00:42', '25', '2023-08-08 14:00:42'),
(426, 'FACULTY OF HEALTH SCIENCES: NURSING MALE N RETURNING STUDENT 100%', 1996000, 'Remita', 1, 1, 11774838438, 2, 3, 9, 1, '2023-08-08 14:00:42', '100', '2023-08-08 14:00:42'),
(427, 'FACULTY OF HEALTH SCIENCES: NURSING MALE N RETURNING STUDENT 75%', 1497000, 'Remita', 1, 1, 11774839488, 2, 3, 9, 1, '2023-08-08 14:00:42', '75', '2023-08-08 14:00:42'),
(428, 'FACULTY OF HEALTH SCIENCES: NURSING MALE N RETURNING STUDENT 50%', 998000, 'Remita', 1, 1, 11774840462, 2, 3, 9, 1, '2023-08-08 14:00:42', '50', '2023-08-08 14:00:42'),
(429, 'FACULTY OF HEALTH SCIENCES: NURSING MALE N RETURNING STUDENT 25%', 499000, 'Remita', 1, 1, 11774841258, 2, 3, 9, 1, '2023-08-08 14:00:42', '25', '2023-08-08 14:00:42'),
(430, 'FACULTY OF HEALTH SCIENCES: NURSING MALE N NEW STUDENT 100% = N2210320', 2210320, 'Remita', 1, 1, 11774847626, 2, 3, 9, 1, '2023-08-08 14:00:42', '100', '2023-08-08 14:00:42'),
(431, 'FACULTY OF HEALTH SCIENCES: NURSING MALE N NEW STUDENT 75%=N1657740', 1657740, 'Remita', 1, 1, 11774969670, 2, 3, 9, 1, '2023-08-08 14:00:42', '75', '2023-08-08 14:00:42'),
(432, 'FACULTY OF HEALTH SCIENCES: NURSING MALE N NEW STUDENT 50% =N1105160', 1105160, 'Remita', 1, 1, 11774849273, 2, 3, 9, 1, '2023-08-08 14:00:42', '50', '2023-08-08 14:00:42'),
(433, 'FACULTY OF HEALTH SCIENCES: NURSING MALE N NEW STUDENT 25%=N552580', 552580, 'Remita', 1, 1, 11774850253, 2, 3, 9, 1, '2023-08-08 14:00:42', '25', '2023-08-08 14:00:42'),
(434, 'FACULTY OF HEALTH SCIENCES: NURSING STANZEL FEMALE RETURNING STUDENT 100%', 1956000, 'Remita', 1, 2, 11775088617, 2, 3, 9, 1, '2023-08-08 14:00:42', '100', '2023-08-08 14:00:42'),
(435, 'FACULTY OF HEALTH SCIENCES: NURSING STANZEL FEMALE RETURNING STUDENT 75%', 1467000, 'Remita', 1, 2, 11774859963, 2, 3, 9, 1, '2023-08-08 14:00:42', '75', '2023-08-08 14:00:42'),
(436, 'FACULTY OF HEALTH SCIENCES: NURSING STANZEL FEMALE RETURNING STUDENT 50%', 978000, 'Remita', 1, 2, 11774861308, 2, 3, 9, 1, '2023-08-08 14:00:42', '50', '2023-08-08 14:00:42'),
(437, 'FACULTY OF HEALTH SCIENCES: NURSING STANZEL FEMALE RETURNING STUDENT 25%', 489000, 'Remita', 1, 2, 11774862869, 2, 3, 9, 1, '2023-08-08 14:00:42', '25', '2023-08-08 14:00:42'),
(438, 'FACULTY OF HEALTH SCIENCES: NURSING STANZEL FEMALE NEW STUDENT 100% = N2,170,320', 2170320, 'Remita', 1, 2, 11775125747, 2, 3, 9, 1, '2023-08-08 14:00:42', '100', '2023-08-08 14:00:42'),
(439, 'FACULTY OF HEALTH SCIENCES: NURSING STANZEL FEMALE NEW STUDENT 75% = N1,627,740', 1627740, 'Remita', 1, 2, 11774886059, 2, 3, 9, 1, '2023-08-08 14:00:42', '75', '2023-08-08 14:00:42'),
(440, 'FACULTY OF HEALTH SCIENCES: NURSING STANZEL FEMALE NEW STUDENT 50%=N1,085,160', 1085160, 'Remita', 1, 2, 11774886435, 2, 3, 9, 1, '2023-08-08 14:00:42', '50', '2023-08-08 14:00:42'),
(441, 'FACULTY OF HEALTH SCIENCES: NURSING STANZEL FEMALE NEW STUDENT 25%=N542,580', 542580, 'Remita', 1, 2, 11775128109, 2, 3, 9, 1, '2023-08-08 14:00:42', '25', '2023-08-08 14:00:42'),
(442, 'FACULTY OF HEALTH SCIENCES: NURSING CICL FEMALE RETURNING STUDENT 100%', 1986000, 'Remita', 1, 2, 11775319964, 2, 3, 9, 1, '2023-08-09 07:09:48', '100', '2023-08-09 07:09:48'),
(443, 'FACULTY OF HEALTH SCIENCES: NURSING CICL FEMALE RETURNING STUDENT 75%', 1489500, 'Remita', 1, 2, 11775277479, 2, 3, 9, 1, '2023-08-09 07:09:48', '75', '2023-08-09 07:09:48'),
(444, 'FACULTY OF HEALTH SCIENCES: NURSING CICL FEMALE RETURNING STUDENT 50%', 993000, 'Remita', 1, 2, 11775327359, 2, 3, 9, 1, '2023-08-09 07:09:48', '50', '2023-08-09 07:09:48'),
(445, 'FACULTY OF HEALTH SCIENCES: NURSING CICL FEMALE RETURNING STUDENT 25%', 496500, 'Remita', 1, 2, 11775327997, 2, 3, 9, 1, '2023-08-09 07:09:48', '25', '2023-08-09 07:09:48'),
(446, 'FACULTY OF HEALTH SCIENCES: NURSING CICL FEMALE NEWSTUDENT 100% =N2200320', 2200320, 'Remita', 1, 2, 11775338351, 2, 3, 9, 1, '2023-08-09 07:09:48', '100', '2023-08-09 07:09:48'),
(447, 'FACULTY OF HEALTH SCIENCES: NURSING CICL FEMALE NEW STUDENT 75% =N1650240', 1650240, 'Remita', 1, 2, 11775413952, 2, 3, 9, 1, '2023-08-09 07:09:48', '75', '2023-08-09 07:09:48'),
(448, 'FACULTY OF HEALTH SCIENCES: NURSING CICL FEMALE NEW STUDENT 50% =N1100160', 1100160, 'Remita', 1, 2, 11775339457, 2, 3, 9, 1, '2023-08-09 07:09:48', '50', '2023-08-09 07:09:48'),
(449, 'FACULTY OF HEALTH SCIENCES: NURSING CICL FEMALE NEW STUDENT 25%=N550080', 550080, 'Remita', 1, 2, 11775339997, 2, 3, 9, 1, '2023-08-09 07:09:48', '25', '2023-08-09 07:09:48'),
(450, 'FACULTY OF HEALTH SCIENCES: NURSING PA-ETO FEMALE RETURNING STUDENT 100%', 1786000, 'Remita', 1, 2, 11775358590, 2, 3, 9, 1, '2023-08-09 07:10:08', '100', '2023-08-09 07:10:08'),
(451, 'FACULTY OF HEALTH SCIENCES: NURSING PA-ETO FEMALE RETURNING STUDENT 75%', 1339500, 'Remita', 1, 2, 11775359038, 2, 3, 9, 1, '2023-08-09 07:10:08', '75', '2023-08-09 07:10:08'),
(452, 'FACULTY OF HEALTH SCIENCES: NURSING PA-ETO FEMALE RETURNING STUDENT 50%', 893000, 'Remita', 1, 2, 11775359425, 2, 3, 9, 1, '2023-08-09 07:10:08', '50', '2023-08-09 07:10:08'),
(453, 'FACULTY OF HEALTH SCIENCES: NURSING PA-ETO FEMALE RETURNING STUDENT 25%', 446500, 'Remita', 1, 2, 11775553391, 2, 3, 9, 1, '2023-08-09 07:10:08', '25', '2023-08-09 07:10:08'),
(454, 'FACULTY OF HEALTH SCIENCES: NURSING PA-ETO FEMALE NEW STUDENT 100%=N2000320', 2000320, 'Remita', 1, 2, 11775370908, 2, 3, 9, 1, '2023-08-09 07:10:08', '100', '2023-08-09 07:10:08'),
(455, 'FACULTY OF HEALTH SCIENCES: NURSING PA-ETO FEMALE NEW STUDENT 75%=N1500240', 1500240, 'Remita', 1, 2, 11775584309, 2, 3, 9, 1, '2023-08-09 07:10:08', '75', '2023-08-09 07:10:08'),
(456, 'FACULTY OF HEALTH SCIENCES: NURSING PA-ETO FEMALE NEW STUDENT 50%=N1000,160', 1000160, 'Remita', 1, 2, 11775611591, 2, 3, 9, 1, '2023-08-09 07:10:08', '50', '2023-08-09 07:10:08'),
(457, 'FACULTY OF HEALTH SCIENCES: NURSING PA-ETO FEMALE NEW STUDENT 25%=N500080', 500080, 'Remita', 1, 2, 11775372387, 2, 3, 9, 1, '2023-08-09 07:10:08', '25', '2023-08-09 07:10:08'),
(458, 'FACULTY OF HEALTH SCIENCES: NURSING KELSON FEMALE RETURNING STUDENT 100%', 2056000, 'Remita', 1, 2, 11775377014, 2, 3, 9, 1, '2023-08-09 07:10:08', '100', '2023-08-09 07:10:08'),
(459, 'FACULTY OF HEALTH SCIENCES: NURSING KELSON FEMALE RETURNING STUDENT 75%', 1542000, 'Remita', 1, 2, 11775377257, 2, 3, 9, 1, '2023-08-09 07:10:08', '75', '2023-08-09 07:10:08'),
(460, 'FACULTY OF HEALTH SCIENCES: NURSING KELSON FEMALE RETURNING STUDENT 50%', 1028000, 'Remita', 1, 2, 11775702506, 2, 3, 9, 1, '2023-08-09 07:10:08', '50', '2023-08-09 07:10:08'),
(461, 'FACULTY OF HEALTH SCIENCES: NURSING KELSON FEMALE RETURNING STUDENT 25%', 514000, 'Remita', 1, 2, 11775634121, 2, 3, 9, 1, '2023-08-09 07:10:08', '25', '2023-08-09 07:10:08'),
(462, 'FACULTY OF HEALTH SCIENCES: NURSING KELSON FEMALE NEW STUDENT 100% = N2270320', 2270320, 'Remita', 1, 2, 11775377014000, 2, 3, 9, 1, '2023-08-09 07:10:08', '100', '2023-08-09 07:10:08'),
(463, 'FACULTY OF HEALTH SCIENCES: NURSING KELSON FEMALE NEW STUDENT 75%=N1702740', 1702740, 'Remita', 1, 2, 11775377257000, 2, 3, 9, 1, '2023-08-09 07:10:08', '75', '2023-08-09 07:10:08'),
(464, 'FACULTY OF HEALTH SCIENCES: NURSING KELSON FEMALE NEW STUDENT 50%=N1135160', 1135160, 'Remita', 1, 2, 11775702506000, 2, 3, 9, 1, '2023-08-09 07:10:08', '50', '2023-08-09 07:10:08'),
(465, 'FACULTY OF HEALTH SCIENCES: NURSING KELSON FEMALE NEW STUDENT 25% =N567580', 567580, 'Remita', 1, 2, 11775634121000, 2, 3, 9, 1, '2023-08-09 07:10:08', '25', '2023-08-09 07:10:08'),
(466, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) MALE HOSTEL L 100%', 871000, 'Remita', 1, 1, 11773485664, 2, 3, 5, 1, '2023-08-09 09:21:27', '100', '2023-08-09 09:21:27'),
(467, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) MALE HOSTEL L  75%', 653250, 'Remita', 1, 1, 11773587511, 2, 3, 5, 2, '2023-08-09 09:22:53', '75', '2023-08-09 09:22:53'),
(468, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) MALE HOSTEL L  50%', 435500, 'Remita', 1, 1, 11773776441, 2, 3, 5, 2, '2023-08-09 09:24:14', '50', '2023-08-09 09:24:14'),
(469, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) MALE HOSTEL L 25%', 217750, 'Remita', 1, 1, 11773683320, 2, 3, 5, 2, '2023-08-09 09:25:48', '25', '2023-08-09 09:25:48'),
(470, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) MALE HOSTEL M  100%', 891000, 'Remita', 1, 1, 11773885685, 2, 3, 5, 1, '2023-08-09 09:27:28', '100', '2023-08-09 09:27:28'),
(471, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) MALE HOSTEL M  75%', 668250, 'Remita', 1, 1, 11774010937, 2, 3, 5, 2, '2023-08-09 09:28:45', '75', '2023-08-09 09:28:45'),
(472, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) MALE HOSTEL M  50%', 445500, 'Remita', 1, 1, 11773928781, 2, 3, 5, 2, '2023-08-09 09:29:55', '50', '2023-08-09 09:29:55'),
(473, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) MALE HOSTEL M 25%', 222750, 'Remita', 1, 1, 11774100472, 2, 3, 5, 2, '2023-08-09 09:31:56', '25', '2023-08-09 09:31:56'),
(474, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) MALE HOSTEL N 100%', 891000, 'Remita', 1, 1, 11774106007, 2, 3, 5, 1, '2023-08-09 09:35:35', '100', '2023-08-09 09:35:35'),
(475, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) MALE HOSTEL N  75%', 668250, 'Remita', 1, 1, 11774110426, 2, 3, 5, 2, '2023-08-09 09:36:29', '75', '2023-08-09 09:36:29'),
(476, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) MALE HOSTEL N 50%', 445500, 'Remita', 1, 1, 11774115741, 2, 3, 5, 2, '2023-08-09 09:37:52', '50', '2023-08-09 09:37:52'),
(477, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) STANZEL FEMALE HOSTEL 100%', 851000, 'Remita', 1, 2, 11774124357, 2, 3, 5, 1, '2023-08-09 09:45:06', '100', '2023-08-09 09:45:06'),
(478, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) STANZEL FEMALE HOSTEL 75%', 638250, 'Remita', 1, 2, 11774207700, 2, 3, 5, 2, '2023-08-09 09:47:00', '75', '2023-08-09 09:47:00'),
(479, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) STANZEL FEMALE HOSTEL 50%', 425500, 'Remita', 1, 2, 11774509303, 2, 3, 5, 2, '2023-08-09 09:49:03', '50', '2023-08-09 09:49:03'),
(480, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) STANZEL FEMALE  HOSTEL 25%', 212750, 'Remita', 1, 2, 11774262456, 2, 3, 5, 2, '2023-08-09 09:50:26', '25', '2023-08-09 09:50:26'),
(481, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and New Students) CICL FEMALE HOSTEL  100%', 881000, 'Remita', 1, 2, 11774523082, 2, 3, 5, 1, '2023-08-09 09:51:26', '100', '2023-08-09 09:51:26'),
(482, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) CICL FEMALE  HOSTEL  75%', 660750, 'Remita', 1, 2, 11774536362, 2, 3, 5, 2, '2023-08-09 09:54:56', '75', '2023-08-09 09:54:56'),
(483, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) CICL FEMALE HOSTEL  50%', 440500, 'Remita', 1, 2, 11774288498, 2, 3, 5, 2, '2023-08-09 09:56:01', '50', '2023-08-09 09:56:01'),
(484, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) CICL  FEMALE  HOSTEL 25%', 220250, 'Remita', 1, 2, 11774291212, 2, 3, 5, 2, '2023-08-09 09:57:15', '25', '2023-08-09 09:57:15'),
(485, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) PA-ETO FEMALE  HOSTEL,  100%', 681000, 'Remita', 1, 2, 11774298352, 2, 3, 5, 1, '2023-08-09 09:59:36', '100', '2023-08-09 09:59:36'),
(486, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) PA-ETO FEMALE HOSTEL  75%', 510750, 'Remita', 1, 2, 11774805143, 2, 3, 5, 2, '2023-08-09 10:01:00', '75', '2023-08-09 10:01:00'),
(487, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) PA-ETO FEMALE  HOSTEL 50%', 340500, 'Remita', 1, 2, 11774786509, 2, 3, 5, 2, '2023-08-09 10:02:04', '50', '2023-08-09 10:02:04'),
(488, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) PA-ETO  FEMALE HOSTEL  25%', 170250, 'Remita', 1, 2, 11774900086, 2, 3, 5, 2, '2023-08-09 10:04:01', '25', '2023-08-09 10:04:01'),
(489, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) KELSON FEMALE HOSTEL 100%', 951000, 'Remita', 1, 2, 11774823267, 2, 3, 5, 1, '2023-08-09 10:05:16', '100', '2023-08-09 10:05:16'),
(490, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) KELSON FEMALE HOSTEL 75%', 713250, 'Remita', 1, 2, 11774850013, 2, 3, 5, 2, '2023-08-09 10:06:26', '75', '2023-08-09 10:06:26'),
(491, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) KELSON FEMALE HOSTEL 50%', 475500, 'Remita', 1, 2, 11775084403, 2, 3, 5, 2, '2023-08-09 10:08:38', '50', '2023-08-09 10:08:38'),
(492, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) KELSON FEMALE HOSTEL 25%', 237750, 'Remita', 1, 2, 11774859978, 2, 3, 5, 2, '2023-08-09 10:10:05', '25', '2023-08-09 10:10:05'),
(493, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTELS (C, D, E, F)  100%', 858000, 'Remita', 1, 1, 11775862667, 2, 3, 5, 1, '2023-08-09 10:11:39', '100', '2023-08-09 10:11:39'),
(494, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTELS (C, D, E, F)- 75%', 643500, 'Remita', 1, 1, 11776186608, 2, 3, 5, 2, '2023-08-09 10:13:41', '75', '2023-08-09 10:13:41'),
(495, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTELS (C, D, E, F)  50%', 429000, 'Remita', 1, 1, 11775876598, 2, 3, 5, 2, '2023-08-09 10:15:14', '50', '2023-08-09 10:15:14'),
(496, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTELS (C, D, E, F)  25%', 214500, 'Remita', 1, 1, 11775879105, 2, 3, 5, 2, '2023-08-09 10:16:30', '25', '2023-08-09 10:16:30'),
(497, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTELS (A, B, G, I, J, K) ,  100%', 888000, 'Remita', 1, 1, 11775888901, 2, 3, 5, 1, '2023-08-09 10:17:47', '100', '2023-08-09 10:17:47'),
(498, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTELS (A, B, G, I, J, K)   75%', 666000, 'Remita', 1, 1, 11775893738, 2, 3, 5, 2, '2023-08-09 10:19:07', '75', '2023-08-09 10:19:07'),
(499, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTELS (A, B, G, I, J, K)   50%', 444000, 'Remita', 1, 1, 11776272400, 2, 3, 5, 2, '2023-08-09 10:20:10', '50', '2023-08-09 10:20:10'),
(500, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTELS (A, B, G, I, J, K)   25%', 222000, 'Remita', 1, 1, 11776404785, 2, 3, 5, 2, '2023-08-09 10:21:29', '25', '2023-08-09 10:21:29'),
(501, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTEL L,  100%', 908000, 'Remita', 1, 1, 11779398915, 2, 3, 5, 1, '2023-08-09 10:22:37', '100', '2023-08-09 10:22:37'),
(502, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTEL L  75%', 681000, 'Remita', 1, 1, 11779498002, 2, 3, 5, 2, '2023-08-09 10:23:39', '75', '2023-08-09 10:23:39'),
(503, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTEL L  50%', 454000, 'Remita', 1, 1, 11779614369, 2, 3, 5, 2, '2023-08-09 10:24:37', '50', '2023-08-09 10:24:37'),
(504, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTEL L  25%', 227000, 'Remita', 1, 1, 11779700670, 2, 3, 5, 2, '2023-08-09 10:25:49', '25', '2023-08-09 10:25:49'),
(505, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTEL M,  100%', 928000, 'Remita', 1, 1, 11779619230, 2, 3, 5, 1, '2023-08-09 10:26:49', '100', '2023-08-09 10:26:49'),
(506, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTEL M  75%', 928000, 'Remita', 1, 1, 11779626808, 2, 3, 5, 1, '2023-08-09 10:27:44', '75', '2023-08-09 10:27:44'),
(507, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTEL M 50%', 464000, 'Remita', 1, 1, 11779628898, 2, 3, 5, 2, '2023-08-09 10:29:47', '50', '2023-08-09 10:29:47'),
(508, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTEL M  25%', 232000, 'Remita', 1, 1, 11779630878, 2, 3, 5, 2, '2023-08-09 10:31:01', '25', '2023-08-09 10:31:01'),
(509, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTEL N,  100%', 928000, 'Remita', 1, 1, 11779633013, 2, 3, 5, 1, '2023-08-09 10:32:03', '100', '2023-08-09 10:32:03'),
(510, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTEL N  75%', 696000, 'Remita', 1, 1, 11779809511, 2, 3, 5, 2, '2023-08-09 10:33:20', '75', '2023-08-09 10:33:20'),
(511, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTEL N 50%', 464000, 'Remita', 1, 1, 11779641297, 2, 3, 5, 2, '2023-08-09 10:35:17', '50', '2023-08-09 10:35:17'),
(512, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) MALE HOSTEL N  25%', 232000, 'Remita', 1, 1, 11779725062, 2, 3, 5, 2, '2023-08-09 10:36:27', '25', '2023-08-09 10:36:27'),
(513, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) STANZEL FEMALE HOSTEL 100%', 888000, 'Remita', 1, 2, 11779644117, 2, 3, 5, 1, '2023-08-09 10:37:44', '100', '2023-08-09 10:37:44'),
(514, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) STANZEL FEMALE HOSTEL 75%', 666000, 'Remita', 1, 2, 11779656490, 2, 3, 5, 2, '2023-08-09 10:38:41', '75', '2023-08-09 10:38:41'),
(515, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) STANZEL FEMALE HOSTEL 50%', 444000, 'Remita', 1, 2, 11779830729, 2, 3, 5, 2, '2023-08-09 10:39:34', '50', '2023-08-09 10:39:34'),
(516, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) STANZEL HOSTEL,  25%', 222000, 'Remita', 1, 2, 11779662414, 2, 3, 5, 2, '2023-08-09 10:40:27', '25', '2023-08-09 10:40:27'),
(517, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) CICL FEMALE HOSTEL,  100%', 918000, 'Remita', 1, 2, 11779666747, 2, 3, 5, 1, '2023-08-09 10:41:20', '100', '2023-08-09 10:41:20'),
(518, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) CICL FEMALE HOSTEL,  75%', 688500, 'Remita', 1, 2, 11779999691, 2, 3, 5, 2, '2023-08-09 10:42:12', '75', '2023-08-09 10:42:12'),
(519, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) CICL FEMALE HOSTEL,  50%', 459000, 'Remita', 1, 2, 11780002487, 2, 3, 5, 2, '2023-08-09 10:43:01', '50', '2023-08-09 10:43:01'),
(520, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) CICL  FEMALE HOSTEL,  25%', 229500, 'Remita', 1, 2, 11780006570, 2, 3, 5, 2, '2023-08-09 10:45:13', '25', '2023-08-09 10:45:13'),
(521, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) PA-ETO FEMALE HOSTEL,  100%', 718000, 'Remita', 1, 2, 11780015297, 2, 3, 5, 1, '2023-08-09 10:46:28', '100', '2023-08-09 10:46:28'),
(522, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) PA-ETO FEMALE HOSTEL 75%', 538500, 'Remita', 1, 2, 11780145529, 2, 3, 5, 2, '2023-08-09 10:47:22', '75', '2023-08-09 10:47:22'),
(523, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) PA-ETO FEMALE HOSTEL  50%', 359000, 'Remita', 1, 2, 11780184889, 2, 3, 5, 2, '2023-08-09 10:48:17', '50', '2023-08-09 10:48:17'),
(524, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) PA-ETO FEMALE HOSTEL 25%', 179500, 'Remita', 1, 2, 11780192441, 2, 3, 5, 2, '2023-08-09 10:49:08', '25', '2023-08-09 10:49:08'),
(525, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) KELSON FEMALE HOSTEL,  100%', 988000, 'Remita', 1, 2, 11780205362, 2, 3, 5, 1, '2023-08-09 10:50:01', '100', '2023-08-09 10:50:01'),
(526, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) KELSON FEMALE HOSTEL,  75%', 741000, 'Remita', 1, 2, 11780198381, 2, 3, 5, 2, '2023-08-09 10:50:49', '75', '2023-08-09 10:50:49'),
(527, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) KELSON FEMALE  HOSTEL 50%', 494000, 'Remita', 1, 2, 11780300023, 2, 3, 5, 2, '2023-08-09 10:51:40', '50', '2023-08-09 10:51:40'),
(528, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) KELSON FEMALE HOSTEL, 25%', 247000, 'Remita', 1, 2, 11780303758, 2, 3, 5, 2, '2023-08-09 10:52:32', '25', '2023-08-09 10:52:32'),
(529, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (C, D, E, F)  RETURNING STUDENT 100%', 1410000, 'Remita', 1, 1, 11775392874, 2, 3, 9, 1, '2023-08-09 13:00:51', '100', '2023-08-09 13:00:51'),
(530, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (C, D, E, F)  RETURNING STUDENT 75%', 1057500, 'Remita', 1, 1, 11775393107, 2, 3, 9, 1, '2023-08-09 13:00:51', '75', '2023-08-09 13:00:51'),
(531, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (C, D, E, F)  RETURNING STUDENT 50%', 705000, 'Remita', 1, 1, 11775679593, 2, 3, 9, 1, '2023-08-09 13:00:51', '50', '2023-08-09 13:00:51');
INSERT INTO `fee_types` (`id`, `name`, `amount`, `provider`, `delivery_code`, `gender_code`, `provider_code`, `status`, `category`, `college_id`, `installment`, `created_at`, `percentage`, `updated_at`) VALUES
(532, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (C, D, E, F)  RETURNING STUDENT 25%', 352500, 'Remita', 1, 1, 11775393973, 2, 3, 9, 1, '2023-08-09 13:00:51', '25', '2023-08-09 13:00:51'),
(533, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (C, D, E, F)  STUDENT 100%', 1562400, 'Remita', 1, 1, 11775801132, 2, 3, 9, 1, '2023-08-09 13:00:51', '100', '2023-08-09 13:00:51'),
(534, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (C, D, E, F)  STUDENT 75%', 1171800, 'Remita', 1, 1, 11775801935, 2, 3, 9, 1, '2023-08-09 13:00:51', '75', '2023-08-09 13:00:51'),
(535, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (C, D, E, F)  STUDENT 50%', 781200, 'Remita', 1, 1, 11775807605, 2, 3, 9, 1, '2023-08-09 13:00:51', '50', '2023-08-09 13:00:51'),
(536, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (C, D, E, F)  STUDENT 25%', 390600, 'Remita', 1, 1, 11775771746, 2, 3, 9, 1, '2023-08-09 13:00:51', '25', '2023-08-09 13:00:51'),
(537, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENT 100%', 1440000, 'Remita', 1, 1, 11776334526, 2, 3, 9, 1, '2023-08-09 13:01:12', '100', '2023-08-09 13:01:12'),
(538, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENT 75%', 1080000, 'Remita', 1, 1, 11776335511, 2, 3, 9, 1, '2023-08-09 13:01:12', '75', '2023-08-09 13:01:12'),
(539, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENT 50%', 720000, 'Remita', 1, 1, 11775890613, 2, 3, 9, 1, '2023-08-09 13:01:12', '50', '2023-08-09 13:01:12'),
(540, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (A, B, G, I, J, K)  RETURNING STUDENT 25%', 360000, 'Remita', 1, 1, 11776259638, 2, 3, 9, 1, '2023-08-09 13:01:12', '25', '2023-08-09 13:01:12'),
(541, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (A, B, G, I, J, K)  STUDENT 100%', 1592400, 'Remita', 1, 1, 11776353552, 2, 3, 9, 1, '2023-08-09 13:01:12', '100', '2023-08-09 13:01:12'),
(542, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (A, B, G, I, J, K)  STUDENT 75%', 1194300, 'Remita', 1, 1, 11776354572, 2, 3, 9, 1, '2023-08-09 13:01:12', '75', '2023-08-09 13:01:12'),
(543, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (A, B, G, I, J, K)  STUDENT 50%', 796200, 'Remita', 1, 1, 11776401133, 2, 3, 9, 1, '2023-08-09 13:01:12', '50', '2023-08-09 13:01:12'),
(544, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE HOSTELS (A, B, G, I, J, K)  STUDENT 25%', 398100, 'Remita', 1, 1, 11776280904, 2, 3, 9, 1, '2023-08-09 13:01:12', '25', '2023-08-09 13:01:12'),
(545, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE L RETURNING STUDENT 100%', 1460000, 'Remita', 1, 1, 11776414164, 2, 3, 9, 1, '2023-08-09 13:01:12', '100', '2023-08-09 13:01:12'),
(546, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE L RETURNING STUDENT 75%', 1095000, 'Remita', 1, 1, 11776414587, 2, 3, 9, 1, '2023-08-09 13:01:12', '75', '2023-08-09 13:01:12'),
(547, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE L RETURNING STUDENT 50%', 730000, 'Remita', 1, 1, 11776519898, 2, 3, 9, 1, '2023-08-09 13:01:12', '50', '2023-08-09 13:01:12'),
(548, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE L RETURNING STUDENT 25%', 365000, 'Remita', 1, 1, 11776415201, 2, 3, 9, 1, '2023-08-09 13:01:12', '25', '2023-08-09 13:01:12'),
(549, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE L STUDENT 100%', 1612400, 'Remita', 1, 1, 11776614438, 2, 3, 9, 1, '2023-08-09 13:01:12', '100', '2023-08-09 13:01:12'),
(550, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE L STUDENT 75%', 1209300, 'Remita', 1, 1, 11776435083, 2, 3, 9, 1, '2023-08-09 13:01:12', '75', '2023-08-09 13:01:12'),
(551, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE L STUDENT 50%', 806200, 'Remita', 1, 1, 11776615976, 2, 3, 9, 1, '2023-08-09 13:01:12', '50', '2023-08-09 13:01:12'),
(552, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE L STUDENT 25%', 403100, 'Remita', 1, 1, 11776436973, 2, 3, 9, 1, '2023-08-09 13:01:12', '25', '2023-08-09 13:01:12'),
(553, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE M RETURNING STUDENT 100%', 1480000, 'Remita', 1, 1, 11776448584, 2, 3, 9, 1, '2023-08-09 13:01:31', '100', '2023-08-09 13:01:31'),
(554, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE M RETURNING STUDENT 75%', 1110000, 'Remita', 1, 1, 11776553972, 2, 3, 9, 1, '2023-08-09 13:01:31', '75', '2023-08-09 13:01:31'),
(555, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE M RETURNING STUDENT 50%', 740000, 'Remita', 1, 1, 11776449846, 2, 3, 9, 1, '2023-08-09 13:01:31', '50', '2023-08-09 13:01:31'),
(556, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE M RETURNING STUDENT 25%', 370000, 'Remita', 1, 1, 11776450274, 2, 3, 9, 1, '2023-08-09 13:01:31', '25', '2023-08-09 13:01:31'),
(557, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE M STUDENT 100%', 1632400, 'Remita', 1, 1, 11776455177, 2, 3, 9, 1, '2023-08-09 13:01:31', '100', '2023-08-09 13:01:31'),
(558, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE M STUDENT 75%', 1224300, 'Remita', 1, 1, 11776455723, 2, 3, 9, 1, '2023-08-09 13:01:31', '75', '2023-08-09 13:01:31'),
(559, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE M STUDENT 50%', 816200, 'Remita', 1, 1, 11776456393, 2, 3, 9, 1, '2023-08-09 13:01:31', '50', '2023-08-09 13:01:31'),
(560, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE M STUDENT 25%', 408100, 'Remita', 1, 1, 11776457770, 2, 3, 9, 1, '2023-08-09 13:01:31', '25', '2023-08-09 13:01:31'),
(561, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE N RETURNING STUDENT 100%', 1480000, 'Remita', 1, 1, 11776473427, 2, 3, 9, 1, '2023-08-09 13:01:31', '100', '2023-08-09 13:01:31'),
(562, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE N RETURNING STUDENT 75%', 1110000, 'Remita', 1, 1, 11776474929, 2, 3, 9, 1, '2023-08-09 13:01:31', '75', '2023-08-09 13:01:31'),
(563, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE N RETURNING STUDENT 50%', 740000, 'Remita', 1, 1, 11776476379, 2, 3, 9, 1, '2023-08-09 13:01:31', '50', '2023-08-09 13:01:31'),
(564, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE N RETURNING STUDENT 25%', 370000, 'Remita', 1, 1, 11776476828, 2, 3, 9, 1, '2023-08-09 13:01:31', '25', '2023-08-09 13:01:31'),
(565, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE N STUDENT 100%', 1632400, 'Remita', 1, 1, 11776677688, 2, 3, 9, 1, '2023-08-09 13:01:31', '100', '2023-08-09 13:01:31'),
(566, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE N STUDENT 75%', 1224300, 'Remita', 1, 1, 11776678096, 2, 3, 9, 1, '2023-08-09 13:01:31', '75', '2023-08-09 13:01:31'),
(567, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE N STUDENT 50%', 816200, 'Remita', 1, 1, 11776485455, 2, 3, 9, 1, '2023-08-09 13:01:31', '50', '2023-08-09 13:01:31'),
(568, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE MALE N STUDENT 25%', 408100, 'Remita', 1, 1, 11776486039, 2, 3, 9, 1, '2023-08-09 13:01:31', '25', '2023-08-09 13:01:31'),
(569, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE STANZEL FEMALE RETURNING STUDENT 100%', 1440000, 'Remita', 1, 2, 11776491196, 2, 3, 9, 1, '2023-08-09 13:01:51', '100', '2023-08-09 13:01:51'),
(570, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE STANZEL FEMALE RETURNING STUDENT 75%', 1080000, 'Remita', 1, 2, 11776685962, 2, 3, 9, 1, '2023-08-09 13:01:51', '75', '2023-08-09 13:01:51'),
(571, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE STANZEL FEMALE RETURNING STUDENT 50%', 720000, 'Remita', 1, 2, 11776492539, 2, 3, 9, 1, '2023-08-09 13:01:51', '50', '2023-08-09 13:01:51'),
(572, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE STANZEL FEMALE RETURNING STUDENT 25%', 360000, 'Remita', 1, 2, 11776687770, 2, 3, 9, 1, '2023-08-09 13:01:51', '25', '2023-08-09 13:01:51'),
(573, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE STANZEL FEMALE STUDENT 100%', 1592400, 'Remita', 1, 2, 11776708861, 2, 3, 9, 1, '2023-08-09 13:01:51', '100', '2023-08-09 13:01:51'),
(574, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE STANZEL FEMALE STUDENT 75%', 1194300, 'Remita', 1, 2, 11776702907, 2, 3, 9, 1, '2023-08-09 13:01:51', '75', '2023-08-09 13:01:51'),
(575, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE STANZEL FEMALE STUDENT 50%', 796200, 'Remita', 1, 2, 11776695542, 2, 3, 9, 1, '2023-08-09 13:01:51', '50', '2023-08-09 13:01:51'),
(576, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE STANZEL FEMALE STUDENT 25%', 398100, 'Remita', 1, 2, 11776704838, 2, 3, 9, 1, '2023-08-09 13:01:51', '25', '2023-08-09 13:01:51'),
(577, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE CICL FEMALE RETURNING STUDENT 100%', 1470000, 'Remita', 1, 2, 11776711874, 2, 3, 9, 1, '2023-08-09 13:01:51', '100', '2023-08-09 13:01:51'),
(578, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE CICL FEMALE RETURNING STUDENT 75%', 1102500, 'Remita', 1, 2, 11776901804, 2, 3, 9, 1, '2023-08-09 13:01:51', '75', '2023-08-09 13:01:51'),
(579, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE CICL FEMALE RETURNING STUDENT 50%', 735000, 'Remita', 1, 2, 11776712663, 2, 3, 9, 1, '2023-08-09 13:01:51', '50', '2023-08-09 13:01:51'),
(580, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE CICL FEMALE RETURNING STUDENT 25%', 405600, 'Remita', 1, 2, 11776713125, 2, 3, 9, 1, '2023-08-09 13:01:51', '25', '2023-08-09 13:01:51'),
(581, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE CICL FEMALE STUDENT 100%', 1622400, 'Remita', 1, 2, 11776796169, 2, 3, 9, 1, '2023-08-09 13:01:51', '100', '2023-08-09 13:01:51'),
(582, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE CICL FEMALE STUDENT 75%', 1216800, 'Remita', 1, 2, 11776797847, 2, 3, 9, 1, '2023-08-09 13:01:51', '75', '2023-08-09 13:01:51'),
(583, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE CICL FEMALE STUDENT 50%', 811200, 'Remita', 1, 2, 11776798522, 2, 3, 9, 1, '2023-08-09 13:01:51', '50', '2023-08-09 13:01:51'),
(584, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE CICL FEMALE STUDENT 25%', 404250, 'Remita', 1, 2, 11777000111, 2, 3, 9, 1, '2023-08-09 13:01:51', '25', '2023-08-09 13:01:51'),
(585, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE PA-ETO FEMALE RETURNING STUDENT 100%', 1270000, 'Remita', 1, 2, 11777021157, 2, 3, 9, 1, '2023-08-09 13:01:51', '100', '2023-08-09 13:01:51'),
(586, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE PA-ETO FEMALE RETURNING STUDENT 75%', 952500, 'Remita', 1, 2, 11776842341, 2, 3, 9, 1, '2023-08-09 13:01:51', '75', '2023-08-09 13:01:51'),
(587, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE PA-ETO FEMALE RETURNING STUDENT 50%', 635000, 'Remita', 1, 2, 11777023184, 2, 3, 9, 1, '2023-08-09 13:01:51', '50', '2023-08-09 13:01:51'),
(588, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE PA-ETO FEMALE RETURNING STUDENT 25%', 317500, 'Remita', 1, 2, 11777025093, 2, 3, 9, 1, '2023-08-09 13:01:51', '25', '2023-08-09 13:01:51'),
(589, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE PA-ETO FEMALE STUDENT 100%', 1422400, 'Remita', 1, 2, 11777039563, 2, 3, 9, 1, '2023-08-09 13:01:51', '100', '2023-08-09 13:01:51'),
(590, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE PA-ETO FEMALE STUDENT 75%', 1066800, 'Remita', 1, 2, 11777040998, 2, 3, 9, 1, '2023-08-09 13:01:51', '75', '2023-08-09 13:01:51'),
(591, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE PA-ETO FEMALE STUDENT 50%', 711200, 'Remita', 1, 2, 11777042453, 2, 3, 9, 1, '2023-08-09 13:01:51', '50', '2023-08-09 13:01:51'),
(592, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE PA-ETO FEMALE STUDENT 25%', 355600, 'Remita', 1, 2, 1177697030, 2, 3, 9, 1, '2023-08-09 13:01:51', '25', '2023-08-09 13:01:51'),
(593, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE KELSON FEMALE RETURNING STUDENT 100%', 1540000, 'Remita', 1, 2, 11777051687, 2, 3, 9, 1, '2023-08-09 13:01:51', '100', '2023-08-09 13:01:51'),
(594, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE KELSON FEMALE RETURNING STUDENT 75%', 1155000, 'Remita', 1, 2, 11777052421, 2, 3, 9, 1, '2023-08-09 13:01:51', '75', '2023-08-09 13:01:51'),
(595, 'FACULTY OF HEALTH SCIENCES: NURSING KELSON FEMALE RETURNING STUDENT 50%', 770000, 'Remita', 1, 2, 11776864607, 2, 3, 9, 1, '2023-08-09 13:01:51', '50', '2023-08-09 13:01:51'),
(596, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE KELSON FEMALE RETURNING STUDENT 25%', 385000, 'Remita', 1, 2, 11777090556, 2, 3, 9, 1, '2023-08-09 13:01:51', '25', '2023-08-09 13:01:51'),
(597, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE KELSON FEMALE STUDENT 100%', 1692400, 'Remita', 1, 2, 11777100531, 2, 3, 9, 1, '2023-08-09 13:01:51', '100', '2023-08-09 13:01:51'),
(598, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE KELSON FEMALE STUDENT 75%', 1269300, 'Remita', 1, 2, 11777101933, 2, 3, 9, 1, '2023-08-09 13:01:51', '75', '2023-08-09 13:01:51'),
(599, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE KELSON FEMALE STUDENT 50%', 846200, 'Remita', 1, 2, 11777104458, 2, 3, 9, 1, '2023-08-09 13:01:51', '50', '2023-08-09 13:01:51'),
(600, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE KELSON FEMALE STUDENT 25%', 423100, 'Remita', 1, 2, 11777105254, 2, 3, 9, 1, '2023-08-09 13:01:51', '25', '2023-08-09 13:01:51'),
(601, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTELS (C, D, E, F) 100%', 940000, 'Remita', 1, 1, 11780779094, 2, 3, 2, 1, '2023-08-09 14:49:37', '100', '2023-08-09 14:49:37'),
(602, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTELS (C, D, E, F) 75%', 705000, 'Remita', 1, 1, 11793698501, 2, 3, 2, 2, '2023-08-09 14:49:37', '75', '2023-08-09 14:49:37'),
(603, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTELS (C, D, E, F) 50%', 470000, 'Remita', 1, 1, 11793760534, 2, 3, 2, 2, '2023-08-09 14:49:37', '50', '2023-08-09 14:49:37'),
(604, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTELS (C, D, E, F) 25%', 235000, 'Remita', 1, 1, 11793914123, 2, 3, 2, 2, '2023-08-09 14:49:37', '25', '2023-08-09 14:49:37'),
(605, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTELS (A, B, G, I, J, K)  100%', 970000, 'Remita', 1, 1, 11794102503, 2, 3, 2, 1, '2023-08-09 14:49:37', '100', '2023-08-09 14:49:37'),
(606, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTELS (A, B, G, I, J, K)  75%', 727500, 'Remita', 1, 1, 11793919855, 2, 3, 2, 2, '2023-08-09 14:49:37', '75', '2023-08-09 14:49:37'),
(607, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTELS (A, B, G, I, J, K)  50%', 485000, 'Remita', 1, 1, 11793922324, 2, 3, 2, 2, '2023-08-09 14:49:37', '50', '2023-08-09 14:49:37'),
(608, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTELS (A, B, G, I, J, K)  25%', 242500, 'Remita', 1, 1, 11793923263, 2, 3, 2, 2, '2023-08-09 14:49:37', '25', '2023-08-09 14:49:37'),
(609, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTEL L 100%', 990000, 'Remita', 1, 1, 11794109670, 2, 3, 2, 1, '2023-08-09 14:49:37', '100', '2023-08-09 14:49:37'),
(610, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTEL L 75%', 742500, 'Remita', 1, 1, 11793925561, 2, 3, 2, 2, '2023-08-09 14:49:37', '75', '2023-08-09 14:49:37'),
(611, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTEL L 50%', 495000, 'Remita', 1, 1, 11793928530, 2, 3, 2, 2, '2023-08-09 14:49:37', '50', '2023-08-09 14:49:37'),
(612, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTEL L 25%', 247500, 'Remita', 1, 1, 11793930818, 2, 3, 2, 2, '2023-08-09 14:49:37', '25', '2023-08-09 14:49:37'),
(613, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTEL M & N 100%', 1010000, 'Remita', 1, 1, 11793933159, 2, 3, 2, 1, '2023-08-09 14:49:37', '100', '2023-08-09 14:49:37'),
(614, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTEL M & N 75%', 757500, 'Remita', 1, 1, 11794117262, 2, 3, 2, 2, '2023-08-09 14:49:37', '75', '2023-08-09 14:49:37'),
(615, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTEL M & N 50%', 505000, 'Remita', 1, 1, 11793937690, 2, 3, 2, 2, '2023-08-09 14:49:37', '50', '2023-08-09 14:49:37'),
(616, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS MALE HOSTEL M & N 25%', 252500, 'Remita', 1, 1, 11794119644, 2, 3, 2, 2, '2023-08-09 14:49:37', '25', '2023-08-09 14:49:37'),
(617, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS FEMALE HOSTEL STANZEL 100%', 950000, 'Remita', 1, 2, 11793941537, 2, 3, 2, 2, '2023-08-09 14:49:37', '100', '2023-08-09 14:49:37'),
(618, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS FEMALE HOSTEL STANZEL 75%', 712500, 'Remita', 1, 2, 11794122950, 2, 3, 2, 2, '2023-08-09 14:49:37', '75', '2023-08-09 14:49:37'),
(619, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS FEMALE HOSTEL STANZEL 50%', 475000, 'Remita', 1, 2, 11793945205, 2, 3, 2, 2, '2023-08-09 14:49:37', '50', '2023-08-09 14:49:37'),
(620, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS FEMALE HOSTEL STANZEL 25%', 237500, 'Remita', 1, 2, 11794126194, 2, 3, 2, 2, '2023-08-09 14:49:37', '25', '2023-08-09 14:49:37'),
(621, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS FEMALE HOSTEL CICL 100%', 980000, 'Remita', 1, 2, 11793953054, 2, 3, 2, 1, '2023-08-09 14:49:37', '100', '2023-08-09 14:49:37'),
(622, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS FEMALE HOSTEL CICL 75%', 735000, 'Remita', 1, 2, 11793954925, 2, 3, 2, 2, '2023-08-09 14:49:37', '75', '2023-08-09 14:49:37'),
(623, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS FEMALE HOSTEL CICL 50%', 490000, 'Remita', 1, 2, 11793868715, 2, 3, 2, 2, '2023-08-09 14:49:37', '50', '2023-08-09 14:49:37'),
(624, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS FEMALE HOSTEL CICL 25%', 245000, 'Remita', 1, 2, 11793957260, 2, 3, 2, 2, '2023-08-09 14:49:37', '25', '2023-08-09 14:49:37'),
(625, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE HOSTEL & RELIGIOUS) 100%', 800000, 'Remita', 1, 2, 11794136039, 2, 3, 2, 1, '2023-08-09 14:49:37', '100', '2023-08-09 14:49:37'),
(626, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE HOSTEL & RELIGIOUS) 75%', 600000, 'Remita', 1, 2, 11793876015, 2, 3, 2, 2, '2023-08-09 14:49:37', '75', '2023-08-09 14:49:37'),
(627, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE HOSTEL & RELIGIOUS) 50%', 400000, 'Remita', 1, 2, 11793967651, 2, 3, 2, 2, '2023-08-09 14:49:37', '50', '2023-08-09 14:49:37'),
(628, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE HOSTEL & RELIGIOUS) 25%', 200000, 'Remita', 1, 2, 11793968605, 2, 3, 2, 2, '2023-08-09 14:49:37', '25', '2023-08-09 14:49:37'),
(629, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS FEMALE HOSTELS (A, B, G, I, J, K) ELSON 100%', 1070000, 'Remita', 1, 1, 11793970754, 2, 3, 2, 1, '2023-08-09 14:49:37', '100', '2023-08-09 14:49:37'),
(630, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS FEMALE HOSTELS (A, B, G, I, J, K) ELSON 75%', 802500, 'Remita', 1, 1, 11793971549, 2, 3, 2, 2, '2023-08-09 14:49:37', '75', '2023-08-09 14:49:37'),
(631, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS FEMALE HOSTELS (A, B, G, I, J, K) ELSON 50%', 535000, 'Remita', 1, 1, 11793972282, 2, 3, 2, 2, '2023-08-09 14:49:37', '50', '2023-08-09 14:49:37'),
(632, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS FEMALE HOSTELS (A, B, G, I, J, K) ELSON 25%', 267500, 'Remita', 1, 1, 11793973409, 2, 3, 2, 2, '2023-08-09 14:49:37', '25', '2023-08-09 14:49:37'),
(633, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY MALE HOSTELS (C, D, E, F)  hundred percent', 470000, 'Remita', 1, 1, 11780988012, 2, 3, 9, 1, '2023-08-09 20:43:07', '100', '2023-08-09 20:43:07'),
(634, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY MALE HOSTELS (C, D, E, F)  SEVENTY-FIVE PERCENT', 352500, 'Remita', 1, 1, 11824083685, 2, 3, 9, 2, '2023-08-09 20:49:16', '75', '2023-08-09 20:49:16'),
(635, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY MALE HOSTELS (C, D, E, F)  FIFTY PERCENT', 235000, 'Remita', 1, 1, 11824086352, 2, 3, 9, 2, '2023-08-09 20:51:24', '50', '2023-08-09 20:51:24'),
(636, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY MALE HOSTELS (C, D, E, F)  TWENTY-FIVE PERCENT', 117500, 'Remita', 1, 1, 11824087994, 2, 3, 9, 2, '2023-08-09 20:54:11', '25', '2023-08-09 20:54:11'),
(637, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY -MALE HOSTELS (A, B, G, I, J, K)  HUNDRED PERCENT', 500000, 'Remita', 1, 1, 11824090027, 2, 3, 9, 1, '2023-08-09 20:57:52', '100', '2023-08-09 20:57:52'),
(638, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY -MALE HOSTELS (A, B, G, I, J, K)  SEVENTY-FIVE PERCENT', 375000, 'Remita', 1, 1, 11824093241, 2, 3, 9, 2, '2023-08-09 21:00:13', '75', '2023-08-09 21:00:13'),
(639, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY -MALE HOSTELS (A, B, G, I, J, K)  FIFTY PERCENT', 250000, 'Remita', 1, 1, 11824094749, 2, 3, 9, 2, '2023-08-09 21:01:59', '50', '2023-08-09 21:01:59'),
(640, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY -MALE HOSTELS (A, B, G, I, J, K)  TWENTY-FIVE PERCENT', 125000, 'Remita', 1, 1, 11824095724, 2, 3, 9, 2, '2023-08-09 21:04:30', '25', '2023-08-09 21:04:30'),
(641, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY -MALE HOSTEL L HUNDRED PERCENT', 520000, 'Remita', 1, 1, 11824481022, 2, 3, 9, 1, '2023-08-09 21:06:49', '100', '2023-08-09 21:06:49'),
(642, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY -MALE HOSTEL L SEVENTY-FIVE PERCENT', 390000, 'Remita', 1, 1, 11824483489, 2, 3, 9, 2, '2023-08-09 21:10:56', '75', '2023-08-09 21:10:56'),
(643, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY -MALE HOSTEL L FIFTY PERCENT', 260000, 'Remita', 1, 1, 11824700662, 2, 3, 9, 2, '2023-08-09 21:13:16', '50', '2023-08-09 21:13:16'),
(644, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY -MALE HOSTEL L TWENTY-FIVE PERCENT', 130000, 'Remita', 1, 1, 11824701895, 2, 3, 9, 2, '2023-08-09 21:16:11', '25', '2023-08-09 21:16:11'),
(645, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY -MALE HOSTEL M HUNDRED PERCENT', 540000, 'Remita', 1, 1, 11824490603, 2, 3, 9, 1, '2023-08-09 21:19:35', '100', '2023-08-09 21:19:35'),
(646, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY -MALE HOSTEL M SEVENTY-FIVE PERCENT', 405000, 'Remita', 1, 1, 11824705479, 2, 3, 9, 2, '2023-08-09 21:22:03', '75', '2023-08-09 21:22:03'),
(647, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY -MALE HOSTEL M FIFTY PERCENT', 270000, 'Remita', 1, 1, 11824654423, 2, 3, 0, 2, '2023-08-09 21:24:41', '50', '2023-08-09 21:24:41'),
(648, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY -MALE HOSTEL M TWENTY-FIVE PERCENT', 135000, 'Remita', 1, 1, 11824709207, 2, 3, 9, 2, '2023-08-09 21:27:56', '25', '2023-08-09 21:27:56'),
(649, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY -MALE HOSTEL N HUNDRED PERCENT', 540000, 'Remita', 1, 1, 11830453365, 2, 3, 9, 1, '2023-08-10 18:25:46', '100', '2023-08-10 18:25:46'),
(650, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - MALE HOSTEL N SEVENTY-FIVE PERCENT', 405000, 'Remita', 1, 1, 11830392329, 2, 3, 9, 2, '2023-08-10 18:30:03', '75', '2023-08-10 18:30:03'),
(651, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - MALE HOSTEL N FIFTY PERCENT', 270000, 'Remita', 1, 1, 11830457111, 2, 3, 9, 2, '2023-08-10 18:32:54', '50', '2023-08-10 18:32:54'),
(652, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - MALE HOSTEL N TWENTY-FIVE PERCENT', 135000, 'Remita', 1, 1, 11830459273, 2, 3, 9, 2, '2023-08-10 18:34:57', '25', '2023-08-10 18:34:57'),
(653, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - STANZEL FEMALE HOSTEL HUNDRED PERCENT', 500000, 'Remita', 1, 2, 11833186175, 2, 3, 9, 1, '2023-08-11 02:38:01', '100', '2023-08-11 02:38:01'),
(654, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - STANZEL FEMALE HOSTEL SEVENTY-FIVE PERCENT', 375000, 'Remita', 1, 2, 11833187571, 2, 3, 9, 2, '2023-08-11 02:39:58', '75', '2023-08-11 02:39:58'),
(655, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - STANZEL FEMALE HOSTEL FIFTY PERCENT', 250000, 'Remita', 1, 2, 11832548982, 2, 3, 9, 2, '2023-08-11 02:41:53', '50', '2023-08-11 02:41:53'),
(656, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - STANZEL FEMALE HOSTEL TWENTY-FIVE PERCENT', 125000, 'Remita', 1, 2, 11833188302, 2, 3, 9, 2, '2023-08-11 02:43:44', '25', '2023-08-11 02:43:44'),
(657, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - CICL FEMALE HOSTEL HUNDRED PERCENT', 530000, 'Remita', 1, 2, 11833188719, 2, 3, 9, 1, '2023-08-11 02:46:58', '100', '2023-08-11 02:46:58'),
(658, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - CICL FEMALE HOSTEL SEVENTY-FIVE PERCENT', 397500, 'Remita', 1, 2, 11833206624, 2, 3, 9, 2, '2023-08-11 02:48:50', '75', '2023-08-11 02:48:50'),
(659, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - CICL FEMALE HOSTEL FIFTY PERCENT', 265000, 'Remita', 1, 2, 11833207907, 2, 3, 9, 2, '2023-08-11 02:51:03', '50', '2023-08-11 02:51:03'),
(660, 'FACULTY OF SOCIAL SCIENCES MALE HOSTELS (C, D, E, F)  100%', 810000, 'Remita', 1, 1, 11800808274, 2, 3, 6, 1, '2023-08-06 11:03:38', '100', '2023-08-06 11:03:38'),
(661, 'FACULTY OF SOCIAL SCIENCES MALE HOSTELS (C, D, E, F) 75%', 607500, 'Remita', 1, 1, 11803988675, 2, 3, 6, 2, '2023-08-07 07:43:57', '75', '2023-08-07 07:43:57'),
(662, 'FACULTY OF SOCIAL SCIENCES MALE HOSTELS (C, D, E, F) 50%', 405000, 'Remita', 1, 1, 11804077689, 2, 3, 6, 2, '2023-08-07 07:45:30', '50', '2023-08-07 07:45:30'),
(663, 'FACULTY OF SOCIAL SCIENCES MALE HOSTELS (C, D, E, F) 25%', 202500, 'Remita', 1, 1, 11804079235, 2, 3, 6, 2, '2023-08-07 07:46:46', '25', '2023-08-07 07:46:46'),
(664, 'FACULTY OF SOCIAL SCIENCES MALE HOSTELS (A, B, G, I, J, K)  100%', 840000, 'Remita', 1, 1, 11804080977, 2, 3, 6, 1, '2023-08-07 07:48:19', '100', '2023-08-07 07:48:19'),
(665, 'FACULTY OF SOCIAL SCIENCES MALE HOSTELS (A, B, G, I, J, K)  75%', 630000, 'Remita', 1, 1, 11804082793, 2, 3, 6, 2, '2023-08-07 07:49:42', '75', '2023-08-07 07:49:42'),
(666, 'FACULTY OF SOCIAL SCIENCES MALE HOSTELS (A, B, G, I, J, K)  50%', 420000, 'Remita', 1, 1, 11804200453, 2, 3, 6, 2, '2023-08-07 07:50:40', '50', '2023-08-07 07:50:40'),
(667, 'FACULTY OF SOCIAL SCIENCES MALE HOSTELS (A, B, G, I, J, K)  25%', 210000, 'Remita', 1, 1, 11804202270, 2, 3, 6, 2, '2023-08-07 07:51:40', '25', '2023-08-07 07:51:40'),
(668, 'FACULTY OF SOCIAL SCIENCES MALE HOSTEL L 100%', 860000, 'Remita', 1, 1, 11804088956, 2, 3, 6, 1, '2023-08-07 07:53:52', '100', '2023-08-07 07:53:52'),
(669, 'FACULTY OF SOCIAL SCIENCES MALE HOSTEL L 75%', 645000, 'Remita', 1, 1, 11804091337, 2, 3, 6, 2, '2023-08-07 07:55:21', '75', '2023-08-07 07:55:21'),
(670, 'FACULTY OF SOCIAL SCIENCES MALE HOSTEL L 50%', 430000, 'Remita', 1, 1, 11804095108, 2, 3, 6, 2, '2023-08-07 07:57:45', '50', '2023-08-07 07:57:45'),
(671, 'FACULTY OF SOCIAL SCIENCES MALE HOSTEL L 25%', 215000, 'Remita', 1, 1, 11804098365, 2, 3, 6, 2, '2023-08-07 07:58:42', '25', '2023-08-07 07:58:42'),
(672, 'FACULTY OF SOCIAL SCIENCES MALE HOSTEL M & N 100%', 880000, 'Remita', 1, 1, 11804303061, 2, 3, 6, 1, '2023-08-07 08:01:50', '100', '2023-08-07 08:01:50'),
(673, 'FACULTY OF SOCIAL SCIENCES MALE HOSTEL M & N 75%', 660000, 'Remita', 1, 1, 11804308193, 2, 3, 6, 2, '2023-08-07 08:02:48', '75', '2023-08-07 08:02:48'),
(674, 'FACULTY OF SOCIAL SCIENCES MALE HOSTEL M  & N 50%', 440000, 'Remita', 1, 1, 11804310468, 2, 3, 6, 2, '2023-08-07 08:04:09', '50', '2023-08-07 08:04:09'),
(675, 'FACULTY OF SOCIAL SCIENCES MALE HOSTEL M & N 25%', 220000, 'Remita', 1, 1, 11804311824, 2, 3, 6, 2, '2023-08-07 08:05:02', '25', '2023-08-07 08:05:02'),
(676, 'FACULTY OF SOCIAL SCIENCES FEMALE STANZEL HOSTEL 100%', 840000, 'Remita', 1, 2, 11804233429, 2, 3, 6, 1, '2023-08-07 08:10:56', '100', '2023-08-07 08:10:56'),
(677, 'FACULTY OF SOCIAL SCIENCES FEMALE STANZEL HOSTEL 75%', 630000, 'Remita', 1, 2, 11804321748, 2, 3, 6, 2, '2023-08-07 08:15:39', '75', '2023-08-07 08:15:39'),
(678, 'FACULTY OF SOCIAL SCIENCES FEMALE STANZEL HOSTEL 50%', 420000, 'Remita', 1, 2, 11804329512, 2, 3, 6, 2, '2023-08-07 08:16:50', '50', '2023-08-07 08:16:50'),
(679, 'FACULTY OF SOCIAL SCIENCES FEMALE STANZEL HOSTEL 25%', 210000, 'Remita', 1, 2, 11804331134, 2, 3, 6, 2, '2023-08-07 08:17:45', '25', '2023-08-07 08:17:45'),
(680, 'FACULTY OF SOCIAL SCIENCES FEMALE CICL HOSTEL 100%', 870000, 'Remita', 1, 2, 11804334762, 2, 3, 6, 1, '2023-08-07 08:19:34', '100', '2023-08-07 08:19:34'),
(681, 'FACULTY OF SOCIAL SCIENCES FEMALE CICL HOSTEL 75%', 652500, 'Remita', 1, 2, 11804336484, 2, 3, 6, 2, '2023-08-07 08:20:27', '75', '2023-08-07 08:20:27'),
(682, 'FACULTY OF SOCIAL SCIENCES FEMALE CICL HOSTEL 50%', 435000, 'Remita', 1, 2, 11804268073, 2, 3, 6, 2, '2023-08-07 08:28:08', '50', '2023-08-07 08:28:08'),
(683, 'FACULTY OF SOCIAL SCIENCES FEMALE CICL HOSTEL 25%', 217500, 'Remita', 1, 2, 11804355718, 2, 3, 6, 2, '2023-08-07 08:29:12', '25', '2023-08-07 08:29:12'),
(684, 'FACULTY OF SOCIAL SCIENCES FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL 100%', 940000, 'Remita', 1, 1, 11804278989, 2, 3, 6, 1, '2023-08-07 08:32:17', '100', '2023-08-07 08:32:17'),
(685, 'FACULTY OF SOCIAL SCIENCES FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL 75%', 705000, 'Remita', 1, 1, 11804293413, 2, 3, 6, 2, '2023-08-07 08:33:12', '75', '2023-08-07 08:33:12'),
(686, 'FACULTY OF SOCIAL SCIENCES FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL 50%', 470000, 'Remita', 1, 1, 11804364664, 2, 3, 6, 2, '2023-08-07 08:34:02', '50', '2023-08-07 08:34:02'),
(687, 'FACULTY OF SOCIAL SCIENCES FEMALE HOSTELS (A, B, G, I, J, K) ELSON HOSTEL 25%', 235000, 'Remita', 1, 1, 11804366131, 2, 3, 6, 2, '2023-08-07 08:35:07', '25', '2023-08-07 08:35:07'),
(688, 'FACULTY OF SOCIAL SCIENCES WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) 100%', 670000, 'Remita', 1, 2, 11804371930, 2, 3, 6, 1, '2023-08-07 08:39:03', '100', '2023-08-07 08:39:03'),
(689, 'FACULTY OF SOCIAL SCIENCES WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) 75%', 502500, 'Remita', 1, 2, 11804469848, 2, 3, 6, 2, '2023-08-07 08:40:00', '75', '2023-08-07 08:40:00'),
(690, 'FACULTY OF SOCIAL SCIENCES WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) 50%', 335000, 'Remita', 1, 2, 11804472566, 2, 3, 6, 2, '2023-08-07 08:41:04', '50', '2023-08-07 08:41:04'),
(691, 'FACULTY OF SOCIAL SCIENCES WITHOUT HOSTEL ACCOMMODATION (PA-ETOS FEMALE & RELIGIOUS) 25%', 167500, 'Remita', 1, 2, 11804377239, 2, 3, 6, 2, '2023-08-07 08:41:59', '25', '2023-08-07 08:41:59'),
(692, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - CICL FEMALE HOSTEL FIFTY PERCENT', 265000, 'Remita', 1, 2, 11833207907, 2, 3, 9, 2, '2023-08-12 20:29:56', '50', '2023-08-12 20:29:56'),
(693, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (C, D, E, F)  NEW STUDENT HUNDRED PERCENTAGE', 927500, 'Remita', 1, 1, 11884413689, 2, 3, 2, 1, '2023-08-23 01:09:15', '100', '2023-08-23 01:09:15'),
(694, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (C, D, E, F)  NEW STUDENT SEVENTY FIVE PERCENTAGE', 695625, 'Remita', 1, 1, 11884416154, 2, 3, 2, 1, '2023-08-23 01:09:15', '75', '2023-08-23 01:09:15'),
(695, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (C, D, E, F)  NEW STUDENT FIFTY PERCENTAGE', 463750, 'Remita', 1, 1, 11884416524, 2, 3, 2, 1, '2023-08-23 01:09:15', '50', '2023-08-23 01:09:15'),
(696, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (C, D, E, F)  NEW STUDENT TWENTY FIVE PERCENTAGE', 231875, 'Remita', 1, 1, 11884416826, 2, 3, 2, 1, '2023-08-23 01:09:15', '25', '2023-08-23 01:09:15'),
(697, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT HUNDRED PERCENTAGE', 957500, 'Remita', 1, 1, 11884417950, 2, 3, 2, 1, '2023-08-23 01:09:15', '100', '2023-08-23 01:09:15'),
(698, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT SEVENTY FIVE PERCENTAGE', 718125, 'Remita', 1, 1, 11884418107, 2, 3, 2, 1, '2023-08-23 01:09:15', '75', '2023-08-23 01:09:15'),
(699, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT FIFTY PERCENTAGE', 478750, 'Remita', 1, 1, 11884418181, 2, 3, 2, 1, '2023-08-23 01:09:15', '50', '2023-08-23 01:09:15'),
(700, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT TWENTY FIVE PERCENTAGE', 239375, 'Remita', 1, 1, 11884418370, 2, 3, 2, 1, '2023-08-23 01:09:15', '25', '2023-08-23 01:09:15'),
(701, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE L NEW STUDENT HUNDRED PERCENTAGE', 977500, 'Remita', 1, 1, 11884419766, 2, 3, 2, 1, '2023-08-23 01:09:15', '100', '2023-08-23 01:09:15'),
(702, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE L NEW STUDENT SEVENTY FIVE PERCENTAGE', 733125, 'Remita', 1, 1, 11884419860, 2, 3, 2, 1, '2023-08-23 01:09:15', '75', '2023-08-23 01:09:15'),
(703, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE L NEW STUDENT FIFTY PERCENTAGE', 488750, 'Remita', 1, 1, 11884420158, 2, 3, 2, 1, '2023-08-23 01:09:15', '50', '2023-08-23 01:09:15'),
(704, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE L NEW STUDENT TWENTY FIVE PERCENTAGE', 244375, 'Remita', 1, 1, 11884357000, 2, 3, 2, 1, '2023-08-23 01:09:15', '25', '2023-08-23 01:09:15'),
(705, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE M & N NEW STUDENT HUNDRED PERCENTAGE', 997500, 'Remita', 1, 1, 11884359068, 2, 3, 2, 1, '2023-08-23 01:09:15', '100', '2023-08-23 01:09:15'),
(706, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE M & N NEW STUDENT SEVENTY FIVE PERCENTAGE', 748125, 'Remita', 1, 1, 11884424061, 2, 3, 2, 1, '2023-08-23 01:09:15', '75', '2023-08-23 01:09:15'),
(707, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE M & N NEW STUDENT FIFTY PERCENTAGE', 498750, 'Remita', 1, 1, 11884424061, 2, 3, 2, 1, '2023-08-23 01:09:15', '50', '2023-08-23 01:09:15'),
(708, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) MALE M & N NEW STUDENT TWENTY FIVE PERCENTAGE', 249375, 'Remita', 1, 1, 11884424122, 2, 3, 2, 1, '2023-08-23 01:09:15', '25', '2023-08-23 01:09:15'),
(709, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) STANZEL FEMALE NEW STUDENT HUNDRED PERCENTAGE', 957500, 'Remita', 1, 2, 11884523452, 2, 3, 2, 1, '2023-08-23 01:09:15', '100', '2023-08-23 01:09:15'),
(710, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) STANZEL FEMALE NEW STUDENT SEVENTY FIVE PERCENTAGE', 718125, 'Remita', 1, 2, 11884425491, 2, 3, 2, 1, '2023-08-23 01:09:15', '75', '2023-08-23 01:09:15'),
(711, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) STANZEL FEMALE NEW STUDENT FIFTY PERCENTAGE', 478750, 'Remita', 1, 2, 11884363647, 2, 3, 2, 1, '2023-08-23 01:09:15', '50', '2023-08-23 01:09:15'),
(712, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) STANZEL FEMALE NEW STUDENT TWENTY FIVE PERCENTAGE', 239375, 'Remita', 1, 2, 11884525018, 2, 3, 2, 1, '2023-08-23 01:09:15', '25', '2023-08-23 01:09:15'),
(713, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) CICL FEMALE NEW STUDENT HUNDRED PERCENTAGE', 987500, 'Remita', 1, 2, 11884425898, 2, 3, 2, 1, '2023-08-23 01:09:15', '100', '2023-08-23 01:09:15'),
(714, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) CICL FEMALE NEW STUDENT SEVENTY FIVE PERCENTAGE', 740625, 'Remita', 1, 2, 11884426173, 2, 3, 2, 1, '2023-08-23 01:09:15', '75', '2023-08-23 01:09:15'),
(715, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) CICL FEMALE NEW STUDENT FIFTY PERCENTAGE', 493750, 'Remita', 1, 2, 11884426440, 2, 3, 2, 1, '2023-08-23 01:09:15', '50', '2023-08-23 01:09:15'),
(716, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) CICL FEMALE NEW STUDENT TWENTY FIVE PERCENTAGE', 246875, 'Remita', 1, 2, 11884364780, 2, 3, 2, 1, '2023-08-23 01:09:15', '25', '2023-08-23 01:09:15'),
(717, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) PA-ETO FEMALE NEW STUDENT HUNDRED PERCENTAGE', 787500, 'Remita', 1, 2, 11884426826, 2, 3, 2, 1, '2023-08-23 01:09:15', '100', '2023-08-23 01:09:15'),
(718, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) PA-ETO FEMALE NEW STUDENT SEVENTY FIVE PERCENTAGE', 590625, 'Remita', 1, 2, 11884426873, 2, 3, 2, 1, '2023-08-23 01:09:15', '75', '2023-08-23 01:09:15'),
(719, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) PA-ETO FEMALE NEW STUDENT FIFTY PERCENTAGE', 393750, 'Remita', 1, 2, 11884426961, 2, 3, 2, 1, '2023-08-23 01:09:15', '50', '2023-08-23 01:09:15'),
(720, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) PA-ETO FEMALE NEW STUDENT TWENTY FIVE PERCENTAGE', 196875, 'Remita', 1, 2, 11884427059, 2, 3, 2, 1, '2023-08-23 01:09:15', '25', '2023-08-23 01:09:15'),
(721, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) KELSON FEMALE NEW STUDENT HUNDRED PERCENTAGE', 1057500, 'Remita', 1, 2, 11884427152, 2, 3, 2, 1, '2023-08-23 01:09:15', '100', '2023-08-23 01:09:15'),
(722, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) KELSON FEMALE NEW STUDENT SEVENTY FIVE PERCENTAGE', 793125, 'Remita', 1, 2, 11884427281, 2, 3, 2, 1, '2023-08-23 01:09:15', '75', '2023-08-23 01:09:15'),
(723, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) KELSON FEMALE NEW STUDENT FIFTY PERCENTAGE', 528750, 'Remita', 1, 2, 11884427341, 2, 3, 2, 1, '2023-08-23 01:09:15', '50', '2023-08-23 01:09:15'),
(724, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) KELSON FEMALE NEW STUDENT TWENTY FIVE PERCENTAGE', 264375, 'Remita', 1, 2, 11884427418, 2, 3, 2, 1, '2023-08-23 01:09:15', '25', '2023-08-23 01:09:15'),
(725, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (C, D, E, F)  NEW STUDENT HUNDRED PERCENTAGE', 980000, 'Remita', 1, 1, 11887232177, 2, 3, 2, 1, '2023-08-23 01:09:40', '100', '2023-08-23 01:09:40'),
(726, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (C, D, E, F)  NEW STUDENT SEVENTY FIVE PERCENTAGE', 735000, 'Remita', 1, 1, 11887233357, 2, 3, 2, 1, '2023-08-23 01:09:40', '75', '2023-08-23 01:09:40'),
(727, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (C, D, E, F)  NEW STUDENT FIFTY PERCENTAGE', 490000, 'Remita', 1, 1, 11887234447, 2, 3, 2, 1, '2023-08-23 01:09:40', '50', '2023-08-23 01:09:40'),
(728, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (C, D, E, F)  NEW STUDENT TWENTY FIVE PERCENTAGE', 245000, 'Remita', 1, 1, 11887312092, 2, 3, 2, 1, '2023-08-23 01:09:40', '25', '2023-08-23 01:09:40'),
(729, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT HUNDRED PERCENTAGE', 1010000, 'Remita', 1, 1, 11887631824, 2, 3, 2, 1, '2023-08-23 01:09:40', '100', '2023-08-23 01:09:40'),
(730, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT SEVENTY FIVE PERCENTAGE', 757500, 'Remita', 1, 1, 11887455313, 2, 3, 2, 1, '2023-08-23 01:09:40', '75', '2023-08-23 01:09:40'),
(731, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT FIFTY PERCENTAGE', 505000, 'Remita', 1, 1, 11887456747, 2, 3, 2, 1, '2023-08-23 01:09:40', '50', '2023-08-23 01:09:40'),
(732, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT TWENTY FIVE PERCENTAGE', 252500, 'Remita', 1, 1, 11887460760, 2, 3, 2, 1, '2023-08-23 01:09:40', '25', '2023-08-23 01:09:40'),
(733, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE L NEW STUDENT HUNDRED PERCENTAGE', 1030000, 'Remita', 1, 1, 11887647957, 2, 3, 2, 1, '2023-08-23 01:09:40', '100', '2023-08-23 01:09:40'),
(734, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE L NEW STUDENT SEVENTY FIVE PERCENTAGE', 772500, 'Remita', 1, 1, 11887590994, 2, 3, 2, 1, '2023-08-23 01:09:40', '75', '2023-08-23 01:09:40'),
(735, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE L NEW STUDENT FIFTY PERCENTAGE', 515000, 'Remita', 1, 1, 11887650776, 2, 3, 2, 1, '2023-08-23 01:09:40', '50', '2023-08-23 01:09:40'),
(736, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE L NEW STUDENT TWENTY FIVE PERCENTAGE', 257500, 'Remita', 1, 1, 11887593009, 2, 3, 2, 1, '2023-08-23 01:09:40', '25', '2023-08-23 01:09:40'),
(737, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE M & N NEW STUDENT HUNDRED PERCENTAGE', 1050000, 'Remita', 1, 1, 11887471485, 2, 3, 2, 1, '2023-08-23 01:09:40', '100', '2023-08-23 01:09:40'),
(738, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE M & N NEW STUDENT SEVENTY FIVE PERCENTAGE', 787500, 'Remita', 1, 1, 11887594819, 2, 3, 2, 1, '2023-08-23 01:09:40', '75', '2023-08-23 01:09:40'),
(739, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE M & N NEW STUDENT FIFTY PERCENTAGE', 525000, 'Remita', 1, 1, 11887595600, 2, 3, 2, 1, '2023-08-23 01:09:40', '50', '2023-08-23 01:09:40'),
(740, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) MALE M & N NEW STUDENT TWENTY FIVE PERCENTAGE', 262500, 'Remita', 1, 1, 11887596517, 2, 3, 2, 1, '2023-08-23 01:09:40', '25', '2023-08-23 01:09:40'),
(741, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) STANZEL FEMALE NEW STUDENT HUNDRED PERCENTAGE', 1010000, 'Remita', 1, 2, 11887661621, 2, 3, 2, 1, '2023-08-23 01:09:40', '100', '2023-08-23 01:09:40'),
(742, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) STANZEL FEMALE NEW STUDENT SEVENTY FIVE PERCENTAGE', 757500, 'Remita', 1, 2, 11887484089, 2, 3, 2, 1, '2023-08-23 01:09:40', '75', '2023-08-23 01:09:40'),
(743, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) STANZEL FEMALE NEW STUDENT FIFTY PERCENTAGE', 505000, 'Remita', 1, 2, 11887663500, 2, 3, 2, 1, '2023-08-23 01:09:40', '50', '2023-08-23 01:09:40'),
(744, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) STANZEL FEMALE NEW STUDENT TWENTY FIVE PERCENTAGE', 252500, 'Remita', 1, 2, 11887487487, 2, 3, 2, 1, '2023-08-23 01:09:40', '25', '2023-08-23 01:09:40'),
(745, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) CICL FEMALE NEW STUDENT HUNDRED PERCENTAGE', 1040000, 'Remita', 1, 2, 11887489338, 2, 3, 2, 1, '2023-08-23 01:09:40', '100', '2023-08-23 01:09:40'),
(746, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) CICL FEMALE NEW STUDENT SEVENTY FIVE PERCENTAGE', 780000, 'Remita', 1, 2, 11887490680, 2, 3, 2, 1, '2023-08-23 01:09:40', '75', '2023-08-23 01:09:40'),
(747, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) CICL FEMALE NEW STUDENT FIFTY PERCENTAGE', 520000, 'Remita', 1, 2, 11887491820, 2, 3, 2, 1, '2023-08-23 01:09:40', '50', '2023-08-23 01:09:40'),
(748, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) CICL FEMALE NEW STUDENT TWENTY FIVE PERCENTAGE', 260000, 'Remita', 1, 2, 11887691488, 2, 3, 2, 1, '2023-08-23 01:09:40', '25', '2023-08-23 01:09:40'),
(749, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) PA-ETO FEMALE NEW STUDENT HUNDRED PERCENTAGE', 840000, 'Remita', 1, 2, 11887672048, 2, 3, 2, 1, '2023-08-23 01:09:40', '100', '2023-08-23 01:09:40'),
(750, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) PA-ETO FEMALE NEW STUDENT SEVENTY FIVE PERCENTAGE', 630000, 'Remita', 1, 2, 11887495075, 2, 3, 2, 1, '2023-08-23 01:09:40', '75', '2023-08-23 01:09:40'),
(751, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) PA-ETO FEMALE NEW STUDENT FIFTY PERCENTAGE', 420000, 'Remita', 1, 2, 11887496427, 2, 3, 2, 1, '2023-08-23 01:09:40', '50', '2023-08-23 01:09:40'),
(752, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) PA-ETO FEMALE NEW STUDENT TWENTY FIVE PERCENTAGE', 210000, 'Remita', 1, 2, 11887678370, 2, 3, 2, 1, '2023-08-23 01:09:40', '25', '2023-08-23 01:09:40'),
(753, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) KELSON FEMALE NEW STUDENT HUNDRED PERCENTAGE', 1110000, 'Remita', 1, 2, 11887683346, 2, 3, 2, 1, '2023-08-23 01:09:40', '100', '2023-08-23 01:09:40'),
(754, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) KELSON FEMALE NEW STUDENT SEVENTY FIVE PERCENTAGE', 832500, 'Remita', 1, 2, 11887686110, 2, 3, 2, 1, '2023-08-23 01:09:40', '75', '2023-08-23 01:09:40'),
(755, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) KELSON FEMALE NEW STUDENT FIFTY PERCENTAGE', 555000, 'Remita', 1, 2, 11887688595, 2, 3, 2, 1, '2023-08-23 01:09:40', '50', '2023-08-23 01:09:40'),
(756, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) KELSON FEMALE NEW STUDENT TWENTY FIVE PERCENTAGE', 277500, 'Remita', 1, 2, 11887691488, 2, 3, 2, 1, '2023-08-23 01:09:40', '25', '2023-08-23 01:09:40'),
(757, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (C, D, E, F)  NEW STUDENT HUNDRED PERCENTAGE', 980000, 'Remita', 1, 1, 11887232177, 2, 3, 7, 1, '2023-08-23 01:10:00', '100', '2023-08-23 01:10:00'),
(758, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (C, D, E, F)  NEW STUDENT SEVENTY FIVE PERCENTAGE', 735000, 'Remita', 1, 1, 11887233357, 2, 3, 7, 1, '2023-08-23 01:10:00', '75', '2023-08-23 01:10:00'),
(759, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (C, D, E, F)  NEW STUDENT FIFTY PERCENTAGE', 490000, 'Remita', 1, 1, 11887234447, 2, 3, 7, 1, '2023-08-23 01:10:00', '50', '2023-08-23 01:10:00'),
(760, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (C, D, E, F)  NEW STUDENT TWENTY FIVE PERCENTAGE', 245000, 'Remita', 1, 1, 11887312092, 2, 3, 7, 1, '2023-08-23 01:10:00', '25', '2023-08-23 01:10:00'),
(761, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT HUNDRED PERCENTAGE', 1010000, 'Remita', 1, 1, 11887631824, 2, 3, 7, 1, '2023-08-23 01:10:00', '100', '2023-08-23 01:10:00'),
(762, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT SEVENTY FIVE PERCENTAGE', 757500, 'Remita', 1, 1, 11887455313, 2, 3, 7, 1, '2023-08-23 01:10:00', '75', '2023-08-23 01:10:00'),
(763, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT FIFTY PERCENTAGE', 505000, 'Remita', 1, 1, 11887456747, 2, 3, 7, 1, '2023-08-23 01:10:00', '50', '2023-08-23 01:10:00'),
(764, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE HOSTELS (A, B, G, I, J, K)  NEW STUDENT TWENTY FIVE PERCENTAGE', 252500, 'Remita', 1, 1, 11887460760, 2, 3, 7, 1, '2023-08-23 01:10:00', '25', '2023-08-23 01:10:00'),
(765, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE L NEW STUDENT HUNDRED PERCENTAGE', 1030000, 'Remita', 1, 1, 11887647957, 2, 3, 7, 1, '2023-08-23 01:10:00', '100', '2023-08-23 01:10:00'),
(766, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE L NEW STUDENT SEVENTY FIVE PERCENTAGE', 772500, 'Remita', 1, 1, 11887590994, 2, 3, 7, 1, '2023-08-23 01:10:00', '75', '2023-08-23 01:10:00'),
(767, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE L NEW STUDENT FIFTY PERCENTAGE', 515000, 'Remita', 1, 1, 11887650776, 2, 3, 7, 1, '2023-08-23 01:10:00', '50', '2023-08-23 01:10:00'),
(768, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE L NEW STUDENT TWENTY FIVE PERCENTAGE', 257500, 'Remita', 1, 1, 11887593009, 2, 3, 7, 1, '2023-08-23 01:10:00', '25', '2023-08-23 01:10:00'),
(769, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE M & N NEW STUDENT HUNDRED PERCENTAGE', 1050000, 'Remita', 1, 1, 11887471485, 2, 3, 7, 1, '2023-08-23 01:10:00', '100', '2023-08-23 01:10:00'),
(770, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE M & N NEW STUDENT SEVENTY FIVE PERCENTAGE', 787500, 'Remita', 1, 1, 11887594819, 2, 3, 7, 1, '2023-08-23 01:10:00', '75', '2023-08-23 01:10:00'),
(771, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE M & N NEW STUDENT FIFTY PERCENTAGE', 525000, 'Remita', 1, 1, 11887595600, 2, 3, 7, 1, '2023-08-23 01:10:00', '50', '2023-08-23 01:10:00'),
(772, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) MALE M & N NEW STUDENT TWENTY FIVE PERCENTAGE', 262500, 'Remita', 1, 1, 11887596517, 2, 3, 7, 1, '2023-08-23 01:10:00', '25', '2023-08-23 01:10:00'),
(773, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) STANZEL FEMALE NEW STUDENT HUNDRED PERCENTAGE', 1010000, 'Remita', 1, 2, 11887661621, 2, 3, 7, 1, '2023-08-23 01:10:00', '100', '2023-08-23 01:10:00'),
(774, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) STANZEL FEMALE NEW STUDENT SEVENTY FIVE PERCENTAGE', 757500, 'Remita', 1, 2, 11887484089, 2, 3, 7, 1, '2023-08-23 01:10:00', '75', '2023-08-23 01:10:00'),
(775, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) STANZEL FEMALE NEW STUDENT FIFTY PERCENTAGE', 505000, 'Remita', 1, 2, 11887663500, 2, 3, 7, 1, '2023-08-23 01:10:00', '50', '2023-08-23 01:10:00'),
(776, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) STANZEL FEMALE NEW STUDENT TWENTY FIVE PERCENTAGE', 252500, 'Remita', 1, 2, 11887487487, 2, 3, 7, 1, '2023-08-23 01:10:00', '25', '2023-08-23 01:10:00');
INSERT INTO `fee_types` (`id`, `name`, `amount`, `provider`, `delivery_code`, `gender_code`, `provider_code`, `status`, `category`, `college_id`, `installment`, `created_at`, `percentage`, `updated_at`) VALUES
(777, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) CICL FEMALE NEW STUDENT HUNDRED PERCENTAGE', 1040000, 'Remita', 1, 2, 11887489338, 2, 3, 7, 1, '2023-08-23 01:10:00', '100', '2023-08-23 01:10:00'),
(778, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) CICL FEMALE NEW STUDENT SEVENTY FIVE PERCENTAGE', 780000, 'Remita', 1, 2, 11887490680, 2, 3, 7, 1, '2023-08-23 01:10:00', '75', '2023-08-23 01:10:00'),
(779, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) CICL FEMALE NEW STUDENT FIFTY PERCENTAGE', 520000, 'Remita', 1, 2, 11887491820, 2, 3, 7, 1, '2023-08-23 01:10:00', '50', '2023-08-23 01:10:00'),
(780, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) CICL FEMALE NEW STUDENT TWENTY FIVE PERCENTAGE', 260000, 'Remita', 1, 2, 11887691488, 2, 3, 7, 1, '2023-08-23 01:10:00', '25', '2023-08-23 01:10:00'),
(781, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) PA-ETO FEMALE NEW STUDENT HUNDRED PERCENTAGE', 840000, 'Remita', 1, 2, 11887672048, 2, 3, 7, 1, '2023-08-23 01:10:00', '100', '2023-08-23 01:10:00'),
(782, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) PA-ETO FEMALE NEW STUDENT SEVENTY FIVE PERCENTAGE', 630000, 'Remita', 1, 2, 11887495075, 2, 3, 7, 1, '2023-08-23 01:10:00', '75', '2023-08-23 01:10:00'),
(783, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) PA-ETO FEMALE NEW STUDENT FIFTY PERCENTAGE', 420000, 'Remita', 1, 2, 11887496427, 2, 3, 7, 1, '2023-08-23 01:10:00', '50', '2023-08-23 01:10:00'),
(784, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) PA-ETO FEMALE NEW STUDENT TWENTY FIVE PERCENTAGE', 210000, 'Remita', 1, 2, 11887678370, 2, 3, 7, 1, '2023-08-23 01:10:00', '25', '2023-08-23 01:10:00'),
(785, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) KELSON FEMALE NEW STUDENT HUNDRED PERCENTAGE', 1110000, 'Remita', 1, 2, 11887683346, 2, 3, 7, 1, '2023-08-23 01:10:00', '100', '2023-08-23 01:10:00'),
(786, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) KELSON FEMALE NEW STUDENT SEVENTY FIVE PERCENTAGE', 832500, 'Remita', 1, 2, 11887686110, 2, 3, 7, 1, '2023-08-23 01:10:00', '75', '2023-08-23 01:10:00'),
(787, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) KELSON FEMALE NEW STUDENT FIFTY PERCENTAGE', 555000, 'Remita', 1, 2, 11887688595, 2, 3, 7, 1, '2023-08-23 01:10:00', '50', '2023-08-23 01:10:00'),
(788, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) KELSON FEMALE NEW STUDENT TWENTY FIVE PERCENTAGE', 277500, 'Remita', 1, 2, 11887691488, 2, 3, 7, 1, '2023-08-23 01:10:00', '25', '2023-08-23 01:10:00'),
(789, 'FACULTY OF HEALTH SCIENCE : NEW STUDENT MALE HOSTEL L 100%', 2190320, 'Remita', 1, 1, 11774527354, 2, 3, 9, 1, '2023-08-23 12:42:30', '100', '2023-08-23 12:42:30'),
(790, 'FACULTY OF HEALTH SCIENCE : NEW STUDENT MALE HOSTEL L 75%', 1642740, 'Remita', 1, 1, 11774280491, 2, 3, 9, 2, '2023-08-23 12:43:47', '75', '2023-08-23 12:43:47'),
(791, 'FACULTY OF HEALTH SCIENCE : NEW STUDENT MALE HOSTEL L 50%', 1105160, 'Remita', 1, 1, 11774283592, 2, 3, 9, 2, '2023-08-23 12:44:32', '50', '2023-08-23 12:44:32'),
(792, 'FACULTY OF HEALTH SCIENCE : NEW STUDENT MALE HOSTEL L 25%', 547580, 'Remita', 1, 1, 11774284001, 2, 3, 9, 2, '2023-08-23 12:45:07', '25', '2023-08-23 12:45:07'),
(793, 'FACULTY OF MANAGEMENT SCIENCES, EXCLUDING ACCOUNTING (NEW & RETURNING STUDENTS) MALE HOSTEL (A, B, G, H, I, J, K) 50%', 425500, 'Remita', 1, 1, 11773292446, 2, 3, 5, 2, '2023-08-31 11:41:49', '50', '2023-08-31 11:41:49'),
(794, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - CICL FEMALE HOSTEL TWENTY-FIVE PERCENT', 132500, 'Remita', 1, 2, 11833190626, 2, 3, 9, 2, '2023-09-04 10:21:41', '25', '2023-09-04 10:21:41'),
(795, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - PA-ETO FEMALE HOSTEL HUNDRED PERCENT', 330000, 'Remita', 1, 2, 11968943267, 2, 3, 9, 1, '2023-09-04 10:23:41', '100', '2023-09-04 10:23:41'),
(796, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - PA-ETO FEMALE HOSTEL SEVENTY-FIVE PERCENT', 247500, 'Remita', 1, 2, 11969046172, 2, 3, 9, 2, '2023-09-04 10:25:08', '75', '2023-09-04 10:25:08'),
(797, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - PA-ETO FEMALE HOSTEL FIFTY PERCENT', 165000, 'Remita', 1, 2, 11969049366, 2, 3, 0, 2, '2023-09-04 10:26:36', '50', '2023-09-04 10:26:36'),
(798, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - PA-ETO FEMALE HOSTEL TWENTY-FIVE PERCENT', 82500, 'Remita', 1, 2, 11969054354, 2, 3, 9, 2, '2023-09-04 10:29:04', '25', '2023-09-04 10:29:04'),
(799, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - KELSON FEMALE HOSTEL HUNDRED PERCENT', 600000, 'Remita', 1, 2, 11969308733, 2, 3, 9, 1, '2023-09-04 11:00:08', '100', '2023-09-04 11:00:08'),
(800, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - KELSON FEMALE HOSTEL SEVENTY-FIVE PERCENT', 450000, 'Remita', 1, 2, 11969312253, 2, 3, 9, 2, '2023-09-04 11:01:49', '75', '2023-09-04 11:01:49'),
(801, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - KELSON FEMALE HOSTEL FIFTY PERCENT', 300000, 'Remita', 1, 2, 11969250108, 2, 3, 9, 2, '2023-09-04 11:03:37', '50', '2023-09-04 11:03:37'),
(802, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - KELSON FEMALE HOSTEL TWENTY-FIVE PERCENT', 150000, 'Remita', 1, 2, 11969419119, 2, 3, 9, 2, '2023-09-04 11:21:27', '25', '2023-09-04 11:21:27'),
(803, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) WITHOUT ACCOMMODATION NEW STUDENT HUNDRED PERCENTAGE', 840000, 'Remita', 1, 1, 11887672048, 2, 3, 7, 1, '2023-08-23 01:10:00', NULL, '2023-08-23 01:10:00'),
(804, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) WITHOUT ACCOMMODATION NEW STUDENT SEVENTY FIVE PERCENTAGE', 630000, 'Remita', 1, 1, 11887495075, 2, 3, 7, 1, '2023-08-23 01:10:00', NULL, '2023-08-23 01:10:00'),
(805, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) WITHOUT ACCOMMODATION NEW STUDENT FIFTY PERCENTAGE', 420000, 'Remita', 1, 1, 11887496427, 2, 3, 7, 1, '2023-08-23 01:10:00', NULL, '2023-08-23 01:10:00'),
(806, 'FACULTY OF ENGINEERING NEW STUDENTS(+ LAB DEV FEE) WITHOUT ACCOMMODATION NEW STUDENT TWENTY FIVE PERCENTAGE', 210000, 'Remita', 1, 1, 11887678370, 2, 3, 7, 1, '2023-08-23 01:10:00', NULL, '2023-08-23 01:10:00'),
(807, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - WITHOUT ACCOMMODATION  HUNDRED PERCENT', 330000, 'Remita', 1, 1, 11968943267, 2, 3, 9, 1, '2023-09-04 10:23:41', NULL, '2023-09-04 10:23:41'),
(808, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - WITHOUT ACCOMMODATION  SEVENTY-FIVE PERCENT', 247500, 'Remita', 1, 1, 11969046172, 2, 3, 9, 2, '2023-09-04 10:25:08', NULL, '2023-09-04 10:25:08'),
(809, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - WITHOUT ACCOMMODATION  FIFTY PERCENT', 165000, 'Remita', 1, 1, 11969049366, 2, 3, 0, 2, '2023-09-04 10:26:36', NULL, '2023-09-04 10:26:36'),
(810, 'ECCLESSIASTICAL FACULTIES OF PHILOSOPHY AND THEEOLOGY - WITHOUT ACCOMMODATION  TWENTY-FIVE PERCENT', 82500, 'Remita', 1, 1, 11969054354, 2, 3, 9, 2, '2023-09-04 10:29:04', NULL, '2023-09-04 10:29:04'),
(811, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) WITHOUT ACCOMMODATION NEW STUDENT HUNDRED PERCENTAGE', 840000, 'Remita', 1, 1, 11887672048, 2, 3, 2, 1, '2023-08-23 01:09:40', NULL, '2023-08-23 01:09:40'),
(812, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) WITHOUT ACCOMMODATION NEW STUDENT SEVENTY FIVE PERCENTAGE', 630000, 'Remita', 1, 1, 11887495075, 2, 3, 2, 1, '2023-08-23 01:09:40', NULL, '2023-08-23 01:09:40'),
(813, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) WITHOUT ACCOMMODATION NEW STUDENT FIFTY PERCENTAGE', 420000, 'Remita', 1, 1, 11887496427, 2, 3, 2, 1, '2023-08-23 01:09:40', NULL, '2023-08-23 01:09:40'),
(814, 'FACULTY OF NATURAL SCIENCES (INCLUDING SOFTWARE ENGINEEERING) NEW STUDENTS(+ LAB DEV FEE) WITHOUT ACCOMMODATION NEW STUDENT TWENTY FIVE PERCENTAGE', 210000, 'Remita', 1, 1, 11887678370, 2, 3, 2, 1, '2023-08-23 01:09:40', NULL, '2023-08-23 01:09:40'),
(815, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) WITHOUT ACCOMMODATION NEW STUDENT HUNDRED PERCENTAGE', 787500, 'Remita', 1, 1, 11884426826, 2, 3, 2, 1, '2023-08-23 01:09:15', NULL, '2023-08-23 01:09:15'),
(816, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) WITHOUT ACCOMMODATION NEW STUDENT SEVENTY FIVE PERCENTAGE', 590625, 'Remita', 1, 1, 11884426873, 2, 3, 2, 1, '2023-08-23 01:09:15', NULL, '2023-08-23 01:09:15'),
(817, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) WITHOUT ACCOMMODATION NEW STUDENT FIFTY PERCENTAGE', 393750, 'Remita', 1, 1, 11884426961, 2, 3, 2, 1, '2023-08-23 01:09:15', NULL, '2023-08-23 01:09:15'),
(818, 'FACULTY OF NATURAL SCIENCES: NEW STUDENTS(+ LAB DEV FEE) WITHOUT ACCOMMODATION NEW STUDENT TWENTY FIVE PERCENTAGE', 196875, 'Remita', 1, 1, 11884427059, 2, 3, 2, 1, '2023-08-23 01:09:15', NULL, '2023-08-23 01:09:15'),
(819, 'FACULTY OF SOCIAL SCIENCES WITHOUT  ACCOMMODATION  100%', 670000, 'Remita', 1, 1, 11804371930, 2, 3, 6, 1, '2023-08-07 08:39:03', NULL, '2023-08-07 08:39:03'),
(820, 'FACULTY OF SOCIAL SCIENCES WITHOUT  ACCOMMODATION  75%', 502500, 'Remita', 1, 1, 11804469848, 2, 3, 6, 2, '2023-08-07 08:40:00', NULL, '2023-08-07 08:40:00'),
(821, 'FACULTY OF SOCIAL SCIENCES WITHOUT  ACCOMMODATION  50%', 335000, 'Remita', 1, 1, 11804472566, 2, 3, 6, 2, '2023-08-07 08:41:04', NULL, '2023-08-07 08:41:04'),
(822, 'FACULTY OF SOCIAL SCIENCES WITHOUT  ACCOMMODATION  25%', 167500, 'Remita', 1, 1, 11804377239, 2, 3, 6, 2, '2023-08-07 08:41:59', NULL, '2023-08-07 08:41:59'),
(823, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS WITHOUT  ACCOMMODATION 100%', 800000, 'Remita', 1, 1, 11794136039, 2, 3, 2, 1, '2023-08-09 14:49:37', NULL, '2023-08-09 14:49:37'),
(824, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS WITHOUT  ACCOMMODATION 75%', 600000, 'Remita', 1, 1, 11793876015, 2, 3, 2, 2, '2023-08-09 14:49:37', NULL, '2023-08-09 14:49:37'),
(825, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS WITHOUT  ACCOMMODATION 50%', 400000, 'Remita', 1, 1, 11793967651, 2, 3, 2, 2, '2023-08-09 14:49:37', NULL, '2023-08-09 14:49:37'),
(826, 'SOFTWARE ENGINEERING (NATURAL SCIENCES): RETURNIG STUDENTS WITHOUT  ACCOMMODATION 25%', 200000, 'Remita', 1, 1, 11793968605, 2, 3, 2, 2, '2023-08-09 14:49:37', NULL, '2023-08-09 14:49:37'),
(827, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE WITHOUT ACCOMMODATION RETURNING STUDENT 100%', 1270000, 'Remita', 1, 1, 11777021157, 2, 3, 9, 1, '2023-08-09 13:01:51', NULL, '2023-08-09 13:01:51'),
(828, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE WITHOUT ACCOMMODATION RETURNING STUDENT 75%', 952500, 'Remita', 1, 1, 11776842341, 2, 3, 9, 1, '2023-08-09 13:01:51', NULL, '2023-08-09 13:01:51'),
(829, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE WITHOUT ACCOMMODATION RETURNING STUDENT 50%', 635000, 'Remita', 1, 1, 11777023184, 2, 3, 9, 1, '2023-08-09 13:01:51', NULL, '2023-08-09 13:01:51'),
(830, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE WITHOUT ACCOMMODATION RETURNING STUDENT 25%', 317500, 'Remita', 1, 1, 11777025093, 2, 3, 9, 1, '2023-08-09 13:01:51', NULL, '2023-08-09 13:01:51'),
(831, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE WITHOUT ACCOMMODATION STUDENT 100%', 1422400, 'Remita', 1, 1, 11777039563, 2, 3, 9, 1, '2023-08-09 13:01:51', NULL, '2023-08-09 13:01:51'),
(832, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE WITHOUT ACCOMMODATION STUDENT 75%', 1066800, 'Remita', 1, 1, 11777040998, 2, 3, 9, 1, '2023-08-09 13:01:51', NULL, '2023-08-09 13:01:51'),
(833, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE WITHOUT ACCOMMODATION STUDENT 50%', 711200, 'Remita', 1, 1, 11777042453, 2, 3, 9, 1, '2023-08-09 13:01:51', NULL, '2023-08-09 13:01:51'),
(834, 'FACULTY OF HEALTH SCIENCES: MEDICAL LAB SCIENCE WITHOUT ACCOMMODATION STUDENT 25%', 355600, 'Remita', 1, 1, 1177697030, 2, 3, 9, 1, '2023-08-09 13:01:51', NULL, '2023-08-09 13:01:51'),
(835, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) WITHOUT ACCOMMODATION 100%', 718000, 'Remita', 1, 1, 11780015297, 2, 3, 5, 1, '2023-08-09 10:46:28', NULL, '2023-08-09 10:46:28'),
(836, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) WITHOUT ACCOMMODATION 75%', 538500, 'Remita', 1, 1, 11780145529, 2, 3, 5, 2, '2023-08-09 10:47:22', NULL, '2023-08-09 10:47:22'),
(837, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) WITHOUT ACCOMMODATION 50%', 359000, 'Remita', 1, 1, 11780184889, 2, 3, 5, 2, '2023-08-09 10:48:17', NULL, '2023-08-09 10:48:17'),
(838, 'FACULTY OF MANMENT SCIENCES, ACCOUNTING (Returning and NEW Students) WITHOUT ACCOMMODATION 25%', 179500, 'Remita', 1, 1, 11780192441, 2, 3, 5, 2, '2023-08-09 10:49:08', NULL, '2023-08-09 10:49:08'),
(839, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) WITHOUT ACCOMMODATION 100%', 681000, 'Remita', 1, 1, 11774298352, 2, 3, 5, 1, '2023-08-09 09:59:36', NULL, '2023-08-09 09:59:36'),
(840, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) WITHOUT ACCOMMODATION 75%', 510750, 'Remita', 1, 1, 11774805143, 2, 3, 5, 2, '2023-08-09 10:01:00', NULL, '2023-08-09 10:01:00'),
(841, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) WITHOUT ACCOMMODATION 50%', 340500, 'Remita', 1, 1, 11774786509, 2, 3, 5, 2, '2023-08-09 10:02:04', NULL, '2023-08-09 10:02:04'),
(842, 'FACULTY OF MANMENT SCIENCES,EXCLUDING ACCOUNTING ( Returning and NEW Students) WITHOUT ACCOMMODATION 25%', 170250, 'Remita', 1, 1, 11774900086, 2, 3, 5, 2, '2023-08-09 10:04:01', NULL, '2023-08-09 10:04:01'),
(843, 'FACULTY OF HEALTH SCIENCES: NURSING WITHOUT ACCOMMODATION RETURNING STUDENT 100%', 1786000, 'Remita', 1, 1, 11775358590, 2, 3, 9, 1, '2023-08-09 07:10:08', NULL, '2023-08-09 07:10:08'),
(844, 'FACULTY OF HEALTH SCIENCES: NURSING WITHOUT ACCOMMODATION RETURNING STUDENT 75%', 1339500, 'Remita', 1, 1, 11775359038, 2, 3, 9, 1, '2023-08-09 07:10:08', NULL, '2023-08-09 07:10:08'),
(845, 'FACULTY OF HEALTH SCIENCES: NURSING WITHOUT ACCOMMODATION RETURNING STUDENT 50%', 893000, 'Remita', 1, 1, 11775359425, 2, 3, 9, 1, '2023-08-09 07:10:08', NULL, '2023-08-09 07:10:08'),
(846, 'FACULTY OF HEALTH SCIENCES: NURSING WITHOUT ACCOMMODATION RETURNING STUDENT 25%', 446500, 'Remita', 1, 1, 11775553391, 2, 3, 9, 1, '2023-08-09 07:10:08', NULL, '2023-08-09 07:10:08'),
(847, 'FACULTY OF HEALTH SCIENCES: NURSING WITHOUT ACCOMMODATION NEW STUDENT 100%=N2000320', 2000320, 'Remita', 1, 1, 11775370908, 2, 3, 9, 1, '2023-08-09 07:10:08', NULL, '2023-08-09 07:10:08'),
(848, 'FACULTY OF HEALTH SCIENCES: NURSING WITHOUT ACCOMMODATION NEW STUDENT 75%=N1500240', 1500240, 'Remita', 1, 1, 11775584309, 2, 3, 9, 1, '2023-08-09 07:10:08', NULL, '2023-08-09 07:10:08'),
(849, 'FACULTY OF HEALTH SCIENCES: NURSING WITHOUT ACCOMMODATION NEW STUDENT 50%=N1000,160', 1000160, 'Remita', 1, 1, 11775611591, 2, 3, 9, 1, '2023-08-09 07:10:08', NULL, '2023-08-09 07:10:08'),
(850, 'FACULTY OF HEALTH SCIENCES: NURSING WITHOUT ACCOMMODATION NEW STUDENT 25%=N500080', 500080, 'Remita', 1, 1, 11775372387, 2, 3, 9, 1, '2023-08-09 07:10:08', NULL, '2023-08-09 07:10:08'),
(851, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT WITHOUT ACCOMMODATION  100% = ₦750000', 750000, 'Remita', 1, 1, 8421570357, 2, 3, 2, 1, '2023-08-07 14:43:51', NULL, '2023-08-07 14:43:51'),
(852, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT WITHOUT ACCOMMODATION  75% = ₦562500', 562500, 'Remita', 1, 1, 8993970141, 2, 3, 2, 2, '2023-08-07 14:43:54', NULL, '2023-08-07 14:43:54'),
(853, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT WITHOUT ACCOMMODATION  50% = ₦375000', 375000, 'Remita', 1, 1, 9971749283, 2, 3, 2, 2, '2023-08-07 14:43:56', NULL, '2023-08-07 14:43:56'),
(854, 'FACULTY OF NATURAL AND APPLIED SCIENCES: RETURNING STUDENT WITHOUT ACCOMMODATION  25% = ₦187500', 187500, 'Remita', 1, 1, 11801239208, 2, 3, 2, 2, '2023-08-07 14:43:58', NULL, '2023-08-07 14:43:58'),
(855, 'FACULTIES OF HUMANITIES: WITHOUT  ACCOMMODATION  100%', 670000, 'Remita', 1, 1, 11804371930, 2, 3, 4, 1, '2023-08-07 08:39:03', NULL, '2023-08-07 08:39:03'),
(856, 'FACULTIES OF HUMANITIES: WITHOUT  ACCOMMODATION  75%', 502500, 'Remita', 1, 1, 11804469848, 2, 3, 4, 2, '2023-08-07 08:40:00', NULL, '2023-08-07 08:40:00'),
(857, 'FACULTIES OF HUMANITIES: WITHOUT  ACCOMMODATION  50%', 335000, 'Remita', 1, 1, 11804472566, 2, 3, 4, 2, '2023-08-07 08:41:04', NULL, '2023-08-07 08:41:04'),
(858, 'FACULTIES OF HUMANITIES: WITHOUT  ACCOMMODATION  25%', 167500, 'Remita', 1, 1, 11804377239, 2, 3, 4, 2, '2023-08-07 08:41:59', NULL, '2023-08-07 08:41:59'),
(859, 'FACULTY OF PHARMACY: WITHOUT ACCOMMODATION  NEW STUDENTS 100%', 2000320, 'Remita', 1, 1, 11800837859, 2, 3, 10, 1, '2023-08-06 11:48:22', NULL, '2023-08-06 11:48:22'),
(860, 'FACULTY OF PHARMACY: WITHOUT ACCOMMODATION  NEW STUDENTS 75%', 1500240, 'Remita', 1, 1, 11800839004, 2, 3, 10, 2, '2023-08-06 11:50:10', NULL, '2023-08-06 11:50:10'),
(861, 'FACULTY OF PHARMACY: WITHOUT ACCOMMODATION  NEW STUDENTS 50%', 1000160, 'Remita', 1, 1, 11800840071, 2, 3, 10, 2, '2023-08-06 11:51:54', NULL, '2023-08-06 11:51:54'),
(862, 'FACULTY OF PHARMACY: WITHOUT ACCOMMODATION  NEW STUDENTS 25%', 500080, 'Remita', 1, 1, 11800841342, 2, 3, 10, 2, '2023-08-06 11:53:29', NULL, '2023-08-06 11:53:29'),
(863, 'FACULTY OF PHARMACY: WITHOUT ACCOMMODATION  RETURNING STUDENTS 100%', 1786000, 'Remita', 1, 1, 11800342318, 2, 3, 10, 1, '2023-08-06 07:16:44', NULL, '2023-08-06 07:16:44'),
(864, 'FACULTY OF PHARMACY: WITHOUT ACCOMMODATION  RETURNING STUDENTS 75%', 1339500, 'Remita', 1, 1, 11800345212, 2, 3, 10, 2, '2023-08-06 07:19:40', NULL, '2023-08-06 07:19:40'),
(865, 'FACULTY OF PHARMACY: WITHOUT ACCOMMODATION  RETURNING STUDENTS 50%', 893000, 'Remita', 1, 1, 11796684483, 2, 3, 10, 2, '2023-08-06 07:41:58', NULL, '2023-08-06 07:41:58'),
(866, 'FACULTY OF PHARMACY: WITHOUT ACCOMMODATION  RETURNING STUDENTS 25%', 446500, 'Remita', 1, 1, 11796695270, 2, 3, 10, 2, '2023-08-06 07:44:10', NULL, '2023-08-06 07:44:10'),
(867, 'FACULTY OF LAW: WITHOUT ACCOMMODATION  RETURNING STUDENT 100%', 1648800, 'Remita', 1, 1, 11794652255, 2, 3, 8, 1, '2023-08-05 16:31:23', NULL, '2023-08-05 16:31:23'),
(868, 'FACULTY OF LAW: WITHOUT ACCOMMODATION  RETURNING STUDENT 75%', 1236600, 'Remita', 1, 1, 11794399401, 2, 3, 8, 2, '2023-08-05 16:32:22', NULL, '2023-08-05 16:32:22'),
(869, 'FACULTY OF LAW: WITHOUT ACCOMMODATION  RETURNING STUDENT STUDENT 50%', 824400, 'Remita', 1, 1, 11794701123, 2, 3, 8, 2, '2023-08-05 16:33:45', NULL, '2023-08-05 16:33:45'),
(870, 'FACULTY OF LAW: WITHOUT ACCOMMODATION  RETURNING STUDENT 25%', 412200, 'Remita', 1, 1, 11794584872, 2, 3, 8, 2, '2023-08-05 16:34:40', NULL, '2023-08-05 16:34:40'),
(871, 'FACULTY OF LAW: WITHOUT ACCOMMODATION  STUDENT 100%', 1813680, 'Remita', 1, 1, 11794704093, 2, 3, 8, 1, '2023-08-05 16:36:30', NULL, '2023-08-05 16:36:30'),
(872, 'FACULTY OF LAW: WITHOUT ACCOMMODATION  STUDENT 75%', 1360260, 'Remita', 1, 1, 11794658708, 2, 3, 8, 2, '2023-08-05 16:37:25', NULL, '2023-08-05 16:37:25'),
(873, 'FACULTY OF LAW: WITHOUT ACCOMMODATION  STUDENT 50%', 906840, 'Remita', 1, 1, 11794706463, 2, 3, 8, 2, '2023-08-05 16:38:40', NULL, '2023-08-05 16:38:40'),
(874, 'FACULTY OF LAW: WITHOUT ACCOMMODATION  STUDENT 25%', 453420, 'Remita', 1, 1, 11794708496, 2, 3, 8, 2, '2023-08-05 16:39:52', NULL, '2023-08-05 16:39:52'),
(875, 'FACULTY OF ENGINEERING: RETURNING STUDENTS WITHOUT  ACCOMMODATION 100%', 800000, 'Remita', 1, 1, 11794136039, 2, 3, 7, 1, '2023-08-05 14:03:00', NULL, '2023-08-05 14:03:00'),
(876, 'FACULTY OF ENGINEERING: RETURNING STUDENTS WITHOUT  ACCOMMODATION 75%', 600000, 'Remita', 1, 1, 11793876015, 2, 3, 7, 2, '2023-08-05 14:04:00', NULL, '2023-08-05 14:04:00'),
(877, 'FACULTY OF ENGINEERING: RETURNING STUDENTS WITHOUT  ACCOMMODATION 50%', 400000, 'Remita', 1, 1, 11793967651, 2, 3, 7, 2, '2023-08-05 14:06:56', NULL, '2023-08-05 14:06:56'),
(878, 'FACULTY OF ENGINEERING: RETURNING STUDENTS WITHOUT  ACCOMMODATION 25%', 200000, 'Remita', 1, 1, 11793968605, 2, 3, 7, 2, '2023-08-05 14:07:53', NULL, '2023-08-05 14:07:53'),
(879, 'FACULTY OF EDUCATION: WITHOUT ACCOMMODATION  100% = ₦693000', 693000, 'Remita', 1, 1, 11782570301, 2, 3, 3, 1, '2023-08-03 15:20:14', NULL, '2023-08-03 15:20:14'),
(880, 'FACULTY OF EDUCATION: WITHOUT ACCOMMODATION  25% = ₦173250', 173250, 'Remita', 1, 1, 11782599394, 2, 3, 3, 2, '2023-08-03 16:57:23', NULL, '2023-08-03 16:57:23'),
(881, 'FACULTY OF EDUCATION: WITHOUT ACCOMMODATION  50% = ₦346500', 346500, 'Remita', 1, 1, 11782599034, 2, 3, 3, 2, '2023-08-03 16:57:24', NULL, '2023-08-03 16:57:24'),
(882, 'FACULTY OF EDUCATION: WITHOUT ACCOMMODATION  75% = ₦485100', 485100, 'Remita', 1, 1, 11782598508, 2, 3, 3, 2, '2023-08-03 16:57:28', NULL, '2023-08-03 16:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `grade_scales`
--

CREATE TABLE `grade_scales` (
  `id` int(20) UNSIGNED NOT NULL,
  `code` varchar(20) NOT NULL,
  `description` varchar(20) DEFAULT NULL,
  `salary` float(10,2) NOT NULL,
  `rent` float(10,2) NOT NULL,
  `annual_leave` int(5) UNSIGNED NOT NULL,
  `casual_leave` int(5) UNSIGNED NOT NULL,
  `exam_leave` int(5) UNSIGNED NOT NULL,
  `sick_leave` int(5) UNSIGNED NOT NULL,
  `maternity_leave` int(5) UNSIGNED NOT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_scales`
--

INSERT INTO `grade_scales` (`id`, `code`, `description`, `salary`, `rent`, `annual_leave`, `casual_leave`, `exam_leave`, `sick_leave`, `maternity_leave`, `status`) VALUES
(1, 'CVUUSS-9-4', '   ', 1284758.50, 284.50, 30, 8, 5, 8, 60, 0);

-- --------------------------------------------------------

--
-- Table structure for table `grade_settings`
--

CREATE TABLE `grade_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `min_score` double(8,2) NOT NULL,
  `max_score` double(8,2) NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` double(8,2) NOT NULL,
  `status` enum('pass','fail') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_settings`
--

INSERT INTO `grade_settings` (`id`, `min_score`, `max_score`, `grade`, `point`, `status`, `created_at`, `updated_at`) VALUES
(1, 0.00, 44.00, 'F', 0.00, 'fail', '2022-11-16 18:44:27', '2022-11-16 18:44:27'),
(2, 45.00, 49.00, 'D', 2.00, 'pass', '2022-11-16 18:44:27', '2022-11-16 18:44:27'),
(3, 50.00, 59.00, 'C', 3.00, 'pass', '2022-11-16 18:44:27', '2022-11-16 18:44:27'),
(4, 60.00, 69.00, 'B', 4.00, 'pass', '2022-11-16 18:44:27', '2022-11-16 18:44:27'),
(5, 70.00, 100.00, 'A', 5.00, 'pass', '2022-11-16 18:44:27', '2022-11-16 18:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` enum('1','2','3','4','5','6','7','8','9','spill') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matric_counts`
--

CREATE TABLE `matric_counts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `program_type` varchar(15) DEFAULT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `count` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `olevel`
--

CREATE TABLE `olevel` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `olevel_result` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `sitting` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `olevel`
--

INSERT INTO `olevel` (`id`, `user_id`, `olevel_result`, `sitting`) VALUES
(47, 2, '[{\"subject\":\"General Mathematics\",\"exam\":null,\"grade\":null},{\"subject\":\"English Language\",\"exam\":null,\"grade\":null}]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `pin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `staff_id`, `pin`) VALUES
(1, 506, '$2y$10$vLapj1YSW3sYMbIPgUUR/Omfg6juX7UPL9XwQvZ3rRMg/nCviBp1O');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('lawrencechrisojor@gmail.com', 'welcome', NULL),
('gshockchris@gmail.com', 'welcome', NULL),
('jenny@gmail.com', 'welcome', NULL),
('rita@gmail.com', 'welcome', NULL),
('puis@gmail.com', 'welcome', NULL),
('ike@gmail.com', 'welcome', NULL),
('joy@gmail.com', 'welcome', NULL),
('joe@gmail.com', 'welcome', '2022-06-22 17:42:22'),
('light@gmail.com', '1658337688', '2022-07-04 12:25:07'),
('light@gmail.com', '1658337688', '2022-07-20 10:09:55'),
('lifeofrence@gmail.com', 'welcome', '2023-06-20 22:21:55'),
('lifeofrence@gmail.com', 'welcome', '2023-06-21 07:19:24'),
('lifoefrence@gmail.com', 'welcome', '2023-06-21 07:22:28'),
('lifeofrence@gmail.com', 'welcome', '2023-06-21 07:28:37'),
('lifeofrence@gmail.com', 'welcome', '2023-06-21 09:10:39'),
('lifeofrence@gmail.com', 'welcome', '2023-06-21 09:35:40'),
('t@gmail.com', 'welcome', '2025-01-10 11:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `student_id` int(10) NOT NULL,
  `bank_id` int(5) NOT NULL,
  `transaction_id` int(200) NOT NULL,
  `transaction_date` varchar(50) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `confirm_date` varchar(200) NOT NULL,
  `channel` varchar(200) NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'RBAC Permission Test', 'RBAC testing permission setting', '2021-02-22 18:02:09', '2021-02-22 18:07:21'),
(2, 'List Academic Department', 'List details of academic departments', '2021-02-22 18:07:24', '2021-02-22 18:07:24'),
(3, 'Edit Academic Department', 'Edit Academic Department', '2021-02-22 18:15:24', '2021-02-22 18:15:24'),
(4, 'Delete Academic Department', 'Permanently delete an academic department', '2021-02-22 18:21:13', '2021-02-22 18:21:13'),
(5, 'Create Academic Department', 'create new academic department', '2021-02-22 18:25:28', '2021-02-22 18:25:28'),
(6, 'Departmental Programs', 'View programs under departments', '2021-02-22 18:31:19', '2021-02-22 18:31:19'),
(7, 'Manage Departmental Programs', 'Manage Departmental Programs', '2021-02-22 18:33:39', '2021-02-22 18:33:39'),
(8, 'View and Manage Departmental Program Level Student', 'View and Manage Departmental Program Level Students', '2021-02-22 18:35:25', '2021-02-22 18:35:25'),
(9, 'View and Manage Departmental Program Level Courses', 'View and Manage Departmental Program Level Courses', '2021-02-22 18:36:54', '2021-02-22 18:36:54'),
(10, 'Create Students', 'Create new students', '2021-02-25 07:23:15', '2021-02-25 07:23:15'),
(11, 'View Students', 'Show Detailed Students Information', '2021-02-25 07:25:26', '2021-02-25 07:25:26'),
(12, 'Show Students Editable Information', 'Show Students Editable Information', '2021-02-25 07:26:55', '2021-02-25 07:26:55'),
(13, 'List Students', 'List Students', '2021-02-25 07:28:01', '2021-02-25 07:28:01'),
(14, 'Search for Students', 'Search for Students', '2021-02-25 07:28:23', '2021-02-25 07:28:23'),
(15, 'Edit Students Information', 'Edit Students Information', '2021-02-25 07:35:06', '2021-02-25 07:35:06'),
(16, 'Reset Students Password', 'Reset Students Password', '2021-02-25 07:36:22', '2021-02-25 07:36:22'),
(17, 'View Students Transcript', 'View Students Transcript', '2021-02-25 07:37:09', '2021-02-25 07:37:09'),
(18, 'Create Admin Departments', 'Create Admin Departments', '2021-02-25 08:40:58', '2021-02-25 08:40:58'),
(19, 'List Admin Departments', 'List Admin Departments', '2021-02-25 08:41:34', '2021-02-25 08:41:34'),
(20, 'Edit Admin Departments', 'Edit Admin Departments', '2021-02-25 08:45:36', '2021-02-25 08:45:36'),
(21, 'Delete Admin Departments', 'Delete Admin Departments', '2021-02-25 08:46:38', '2021-02-25 08:46:38'),
(22, 'Manage Students Results', 'Manage Students Results for any student or session', '2021-02-25 08:50:20', '2021-02-25 08:50:20'),
(23, 'Update Students Old Result', 'Update Students Old Result', '2021-02-25 08:51:54', '2021-02-25 08:51:54'),
(24, 'Program Student search for result upload', 'Program Student search for result upload by departmental examination officers', '2021-02-25 08:53:08', '2021-02-25 08:53:08'),
(25, 'Register Students Old courses', 'Register Students Old courses', '2021-02-25 08:54:27', '2021-02-25 08:54:27'),
(26, 'Create new Faculty', 'Create new Faculty', '2021-02-25 18:04:14', '2021-02-25 18:04:14'),
(27, 'List Faculties', 'List Faculties', '2021-02-25 18:04:40', '2021-02-25 18:07:26'),
(28, 'Edit Faculty Information', 'Edit Faculty Information', '2021-02-25 18:05:20', '2021-02-25 18:07:02'),
(29, 'List Faculty Programs', 'List Faculty Programs', '2021-02-25 18:06:19', '2021-02-25 18:06:49'),
(30, 'Faculty Program Management', 'Faculty Program Management', '2021-02-25 18:07:59', '2021-02-25 18:07:59'),
(31, 'Faculty Program Students', 'Faculty Program Students', '2021-02-25 18:09:13', '2021-02-25 18:09:13'),
(32, 'Faculty Program Courses', 'Faculty Program Courses', '2021-02-25 18:09:29', '2021-02-25 18:09:29'),
(33, 'Bursary Debt Upload', 'Bursary Debt Upload', '2021-02-25 18:12:41', '2021-02-25 18:12:41'),
(34, 'List Courses', 'List Courses', '2021-02-25 18:21:03', '2021-02-25 18:21:03'),
(35, 'Create Courses', 'Create Courses', '2021-02-25 18:21:42', '2021-02-25 18:21:42'),
(36, 'Edit Course Details', 'Edit Course Details', '2021-02-25 18:22:22', '2021-02-25 18:22:22'),
(37, 'Delete Courses', 'Permanently delete course information', '2021-02-25 18:22:56', '2021-02-25 18:22:56'),
(38, 'Search Courses', 'Search Courses', '2021-02-25 18:23:51', '2021-02-25 18:23:51'),
(39, 'List Courses in a Program', 'List Courses in a Program', '2021-02-25 18:25:51', '2021-02-25 18:25:51'),
(40, 'List Semester Program Courses', 'List Semester Program Courses', '2021-02-27 15:06:03', '2021-02-27 15:06:03'),
(41, 'Create Program Course', 'Create Program Course', '2021-02-27 15:12:57', '2021-02-27 15:12:57'),
(42, 'Edit Program Course', 'Edit Program Course', '2021-02-27 15:13:39', '2021-02-27 15:13:39'),
(43, 'Delete Program Course', 'Delete Program Course', '2021-02-27 15:14:20', '2021-02-27 15:14:20'),
(44, 'Search for Program Course', 'Search for Program Course', '2021-02-27 15:14:44', '2021-02-27 15:14:44'),
(45, 'Create Programs', 'Create Academic Programs', '2021-02-27 15:26:23', '2021-02-27 15:26:23'),
(46, 'List Programs', 'List Programs', '2021-02-27 15:27:18', '2021-02-27 15:27:18'),
(47, 'Edit Programs', 'Edit Programs', '2021-02-27 15:28:28', '2021-02-27 15:28:28'),
(48, 'Delete Programs', 'Delete Programs', '2021-02-27 15:28:43', '2021-02-27 15:28:43'),
(49, 'List Sessions', 'List Sessions', '2021-02-27 16:01:14', '2021-02-27 16:01:14'),
(50, 'Create New Session', 'Create New Session', '2021-02-27 16:02:00', '2021-02-27 16:02:00'),
(51, 'Edit Session', 'Edit Session', '2021-02-27 16:02:49', '2021-02-27 16:02:49'),
(52, 'Delete Session', 'Delete Session', '2021-02-27 16:03:39', '2021-02-27 16:03:39'),
(53, 'Set Current Session', 'Set Current Session', '2021-02-27 16:03:57', '2021-02-27 16:03:57'),
(54, 'Move Session', 'Move Session', '2021-02-27 16:04:13', '2021-02-27 16:04:13'),
(55, 'List Staff', 'List Staff', '2021-02-27 16:35:05', '2021-02-27 16:35:05'),
(56, 'Create Staff', 'Create new Staff', '2021-02-27 16:35:27', '2021-02-27 16:35:27'),
(57, 'Edit Staff', 'Edit Staff Details', '2021-02-27 16:35:45', '2021-02-27 16:35:45'),
(58, 'Delete Staff', 'Permanently delete Staff record', '2021-02-27 16:36:44', '2021-02-27 16:36:44'),
(59, 'View Staff', 'View Staff Information', '2021-02-27 16:37:06', '2021-02-27 16:37:06'),
(60, 'Reset Staff Password', 'Reset Staff Password', '2021-02-27 16:37:28', '2021-02-27 16:37:28'),
(61, 'Disable Staff', 'Disable Staff', '2021-02-27 16:37:50', '2021-02-27 16:37:50'),
(62, 'RBAC', 'Role Based Access Control', '2021-02-27 16:38:27', '2021-02-27 16:38:27'),
(63, 'Search Staff', 'Search for Staff', '2021-02-27 16:38:55', '2021-02-27 16:38:55'),
(64, 'CBT Staff User', 'Allows a staff access to CBT Portal', '2021-05-07 02:26:20', '2021-05-07 02:26:20'),
(65, 'Change Program Course Lecturer', 'Change the lecturer a program course was allocated to.', '2021-05-29 15:31:22', '2021-05-29 15:31:22'),
(66, 'Network Optimizer User', 'Access to add and edit Network devices', '2021-07-01 15:55:35', '2021-07-01 15:55:35'),
(67, 'Sotera Admin', 'Add IP address and group id', '2021-07-01 15:57:07', '2021-07-01 15:57:07'),
(68, 'Bursary Students Search', 'Bursary Students Search', '2021-07-04 11:46:00', '2021-07-04 11:46:00'),
(69, 'Senate Result Approval', 'Senate Result Approval', '2021-08-03 12:47:48', '2021-08-03 12:47:48'),
(70, 'Ntinso', 'optimizer', '2021-10-02 04:42:47', '2021-10-07 07:21:38'),
(71, 'emmanuel', 'download DHCP', '2021-10-07 07:19:15', '2021-10-07 07:19:15'),
(72, 'ICT Result Upload', 'Enable Staff to Modify old Result and Upload new APPROVED results.', '2021-12-14 02:07:24', '2021-12-14 02:07:24'),
(73, 'Remita Search', 'Search Remita information', '2022-03-21 05:15:44', '2022-03-21 05:15:44'),
(74, 'Disable Students', 'Disable or enable students login', '2022-04-08 23:23:10', '2022-04-08 23:23:10'),
(75, 'Approve Scores', 'To Approve Scores uploaded by Lecturers', NULL, NULL),
(76, 'Login', 'Enable admins login', NULL, NULL),
(77, 'Admin Signup', 'Allow an admin to Signup Another admin', NULL, NULL),
(78, 'Recommend', 'Recommends applicants for approval ', NULL, NULL),
(79, 'View all Applicant', 'Allow an admin to View all applicant ', NULL, NULL),
(80, 'Logout Admin', 'Logs out admins', NULL, NULL),
(81, 'View All RRR Generated ', 'Views all Generated RRR payments made by applicants', NULL, NULL),
(82, 'View all approved applicants', 'Views all approved applicants', NULL, NULL),
(83, 'View all Direct Entry Applicants', 'View all direct entry applicants', NULL, NULL),
(84, 'View all Post Graduate Applicants', 'View all post graduate applicants', NULL, NULL),
(85, 'View all Transfer Applicants', 'View all transfer applicants', NULL, NULL),
(86, 'View all UTME Applicants', 'View all utme applicants', NULL, NULL),
(87, 'UTME Payment', 'View all payments made by UTME Applicants', NULL, NULL),
(88, 'Direct Entry Payments', 'View all payments made by Direct Entry Applicants', NULL, NULL),
(89, 'Transfer Payments', 'View all payments made by Transfer Applicants', NULL, NULL),
(90, 'Post Graduate Payments', 'View all payments made by post graduate applicants', NULL, NULL),
(91, 'Approval of Applicants', 'Allows approval of applicants', NULL, NULL),
(92, 'Force Approval', 'Allows force approval of applicants', NULL, NULL),
(93, 'Rejection of Applicants', 'Allows admin reject unqualified applicants', NULL, NULL),
(94, 'View Applicant\'s details', 'Allows admin view the full details of an applicant..', NULL, NULL),
(95, 'View Qualified Applicants', 'Allows admin view all qualified applicants', NULL, NULL),
(96, 'Approve Qualified Applicants', 'Allows admin approve all qualified applicants in batches', NULL, NULL),
(97, 'View Unqualified Applicants', 'Allows admin view all unqualified applicants', NULL, NULL),
(98, 'Reject Unqualified Applicants', 'Allows admin reject all unqualified applicants in batches', NULL, NULL),
(99, 'Filter Post Graduate Applicants', 'Allows admin filter post graduate applicants', NULL, NULL),
(100, 'Filter Direct Entry Applicants', 'Allows admin filter direct entry applicants', NULL, NULL),
(101, 'Filter UTME Applicants', 'Allows admin filter UTME applicants', NULL, NULL),
(102, 'Filter Transfer Applicants', 'Allows admin filter transfer applicants', NULL, NULL),
(103, 'Add Roles', 'Allows admin assign roles', NULL, NULL),
(104, 'Add Tasks to Roles', 'Adds tasks to roles for admins', NULL, NULL),
(105, 'Submit tasks to roles', 'Submits the selected tasks to roles', NULL, NULL),
(106, 'Get tasks in role', 'Gets all the tasks that belongs to a particular roles', NULL, NULL),
(107, 'Gets tasks to role', 'Shows only the tasks that belongs to a role', NULL, NULL),
(108, 'Remove task from role', 'Removes tasks from a selected role', NULL, NULL),
(109, 'Role to admin', 'Assigns Role to admin', NULL, NULL),
(110, 'Assign roles to admin', 'Get roles and add to admin', NULL, NULL),
(111, 'Selects roles to admin', 'Submit selected roles to admin', NULL, NULL),
(112, 'Remove role from admin', 'Removes selected roles from admin', NULL, NULL),
(113, 'Submits removal of roles from admin', 'Submits Removal of selected roles from admin', NULL, NULL),
(114, 'Get roles in Admin', 'Gets roles assigned to a particular admin', NULL, NULL),
(115, 'View Admins', 'View all administrators', NULL, NULL),
(116, 'Delete Admin', 'Deletes selected Admin', NULL, NULL),
(117, 'Verify RRR Payment ', 'To allow admin verify payment after remita issues ', NULL, NULL),
(118, 'Change Applicant Course of Study', 'to be able to change the applicant choice of study ', NULL, NULL),
(119, 'Reset User Password', 'resetuserpassword', NULL, NULL),
(120, 'Reset Admin Password', 'resetadminpassword', NULL, NULL),
(121, 'Edit Users Info', 'editusersinfo', NULL, NULL),
(122, 'Add Remita Serice Type', 'addRemitaServiceType', NULL, NULL),
(123, 'View Remita Service Type', 'viewRemitaServiceType', NULL, NULL),
(124, 'View show FeeType', 'showFeeType', NULL, NULL),
(125, 'Edit Remita Service Type', 'editRemitaServiceType', NULL, NULL),
(126, 'Suspend Remita Service Type', 'suspendRemitaServiceType', NULL, NULL),
(127, 'Activate Remita Service Type', 'activeRemitaServiceType', NULL, NULL),
(128, 'PG verify Payment', 'pgverifypayment', NULL, NULL),
(129, 'GST Allocate Courses', 'To enable GST unit to allow courses', NULL, NULL),
(130, 'SBC Result Approval', 'To enable SBC approve result', NULL, NULL),
(131, 'ICT View  Result', 'Enable ICT Staff to view Result of all department and know approval progress', '2023-03-17 00:54:46', '2023-03-17 00:54:46'),
(132, 'ICT Officers', 'ICT Officers', NULL, NULL),
(133, 'view student course form', 'view student course form', '2023-04-16 17:27:32', '2023-04-16 17:27:32'),
(135, 'list all Applicant', 'list all Applicant', NULL, NULL),
(136, 'list all user', 'list all user', NULL, NULL),
(137, 'all approved applicant', 'all approved applicant', NULL, NULL),
(138, 'view undergraduate applicant', 'view undergraduate applicant', NULL, NULL),
(139, 'view postgraduateapplicant', 'view postgraduateapplicant', NULL, NULL),
(140, 'approvea pplicant', 'approvea pplicant', NULL, NULL),
(141, 'force approve applicant', 'force approve applicant', NULL, NULL),
(142, 'recommend applicant', 'recommend applicant', NULL, NULL),
(143, 'reject applicant', 'reject applicant', NULL, NULL),
(144, 'view applicant', 'view applicant', NULL, NULL),
(145, 'change applicant course of study', 'change applicant course of study', NULL, NULL),
(146, 'view qualified applicant', 'view qualified applicant', NULL, NULL),
(147, 'edit applicant', 'edit applicant', NULL, NULL),
(148, 'reset applicant password', 'reset applicant password', NULL, NULL),
(149, 'view remita service type', 'view remita service type', NULL, NULL),
(150, 'active-suspend remita servicetype', 'active-suspend remita servicetype', NULL, NULL),
(151, 'add remita servicetype', 'add remita servicetype', NULL, NULL),
(152, 'search applicant', 'search applicant', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissionstest`
--

CREATE TABLE `permissionstest` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissionstest`
--

INSERT INTO `permissionstest` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'RBAC Permission Test', 'RBAC testing permission setting', '2021-02-22 19:02:09', '2021-02-22 19:07:21'),
(2, 'List Academic Department', 'List details of academic departments', '2021-02-22 19:07:24', '2021-02-22 19:07:24'),
(3, 'Edit Academic Department', 'Edit Academic Department', '2021-02-22 19:15:24', '2021-02-22 19:15:24'),
(4, 'Delete Academic Department', 'Permanently delete an academic department', '2021-02-22 19:21:13', '2021-02-22 19:21:13'),
(5, 'Create Academic Department', 'create new academic department', '2021-02-22 19:25:28', '2021-02-22 19:25:28'),
(6, 'Departmental Programs', 'View programs under departments', '2021-02-22 19:31:19', '2021-02-22 19:31:19'),
(7, 'Manage Departmental Programs', 'Manage Departmental Programs', '2021-02-22 19:33:39', '2021-02-22 19:33:39'),
(8, 'View and Manage Departmental Program Level Students', 'View and Manage Departmental Program Level Students', '2021-02-22 19:35:25', '2021-02-22 19:35:25'),
(9, 'View and Manage Departmental Program Level Courses', 'View and Manage Departmental Program Level Courses', '2021-02-22 19:36:54', '2021-02-22 19:36:54'),
(10, 'Create Students', 'Create new students', '2021-02-25 08:23:15', '2021-02-25 08:23:15'),
(11, 'View Students', 'Show Detailed Students Information', '2021-02-25 08:25:26', '2021-02-25 08:25:26'),
(12, 'Show Students Editable Information', 'Show Students Editable Information', '2021-02-25 08:26:55', '2021-02-25 08:26:55'),
(13, 'List Students', 'List Students', '2021-02-25 08:28:01', '2021-02-25 08:28:01'),
(14, 'Search for Students', 'Search for Students', '2021-02-25 08:28:23', '2021-02-25 08:28:23'),
(15, 'Edit Students Information', 'Edit Students Information', '2021-02-25 08:35:06', '2021-02-25 08:35:06'),
(16, 'Reset Students Password', 'Reset Students Password', '2021-02-25 08:36:22', '2021-02-25 08:36:22'),
(17, 'View Students Transcript', 'View Students Transcript', '2021-02-25 08:37:09', '2021-02-25 08:37:09'),
(18, 'Create Admin Departments', 'Create Admin Departments', '2021-02-25 09:40:58', '2021-02-25 09:40:58'),
(19, 'List Admin Departments', 'List Admin Departments', '2021-02-25 09:41:34', '2021-02-25 09:41:34'),
(20, 'Edit Admin Departments', 'Edit Admin Departments', '2021-02-25 09:45:36', '2021-02-25 09:45:36'),
(21, 'Delete Admin Departments', 'Delete Admin Departments', '2021-02-25 09:46:38', '2021-02-25 09:46:38'),
(22, 'Manage Students Results', 'Manage Students Results for any student or session', '2021-02-25 09:50:20', '2021-02-25 09:50:20'),
(23, 'Update Students Old Result', 'Update Students Old Result', '2021-02-25 09:51:54', '2021-02-25 09:51:54'),
(24, 'Program Student search for result upload', 'Program Student search for result upload by departmental examination officers', '2021-02-25 09:53:08', '2021-02-25 09:53:08'),
(25, 'Register Students Old courses', 'Register Students Old courses', '2021-02-25 09:54:27', '2021-02-25 09:54:27'),
(26, 'Create new Faculty', 'Create new Faculty', '2021-02-25 19:04:14', '2021-02-25 19:04:14'),
(27, 'List Faculties', 'List Faculties', '2021-02-25 19:04:40', '2021-02-25 19:07:26'),
(28, 'Edit Faculty Information', 'Edit Faculty Information', '2021-02-25 19:05:20', '2021-02-25 19:07:02'),
(29, 'List Faculty Programs', 'List Faculty Programs', '2021-02-25 19:06:19', '2021-02-25 19:06:49'),
(30, 'Faculty Program Management', 'Faculty Program Management', '2021-02-25 19:07:59', '2021-02-25 19:07:59'),
(31, 'Faculty Program Students', 'Faculty Program Students', '2021-02-25 19:09:13', '2021-02-25 19:09:13'),
(32, 'Faculty Program Courses', 'Faculty Program Courses', '2021-02-25 19:09:29', '2021-02-25 19:09:29'),
(33, 'Bursary Debt Upload', 'Bursary Debt Upload', '2021-02-25 19:12:41', '2021-02-25 19:12:41'),
(34, 'List Courses', 'List Courses', '2021-02-25 19:21:03', '2021-02-25 19:21:03'),
(35, 'Create Courses', 'Create Courses', '2021-02-25 19:21:42', '2021-02-25 19:21:42'),
(36, 'Edit Course Details', 'Edit Course Details', '2021-02-25 19:22:22', '2021-02-25 19:22:22'),
(37, 'Delete Courses', 'Permanently delete course information', '2021-02-25 19:22:56', '2021-02-25 19:22:56'),
(38, 'Search Courses', 'Search Courses', '2021-02-25 19:23:51', '2021-02-25 19:23:51'),
(39, 'List Courses in a Program', 'List Courses in a Program', '2021-02-25 19:25:51', '2021-02-25 19:25:51'),
(40, 'List Semester Program Courses', 'List Semester Program Courses', '2021-02-27 16:06:03', '2021-02-27 16:06:03'),
(41, 'Create Program Course', 'Create Program Course', '2021-02-27 16:12:57', '2021-02-27 16:12:57'),
(42, 'Edit Program Course', 'Edit Program Course', '2021-02-27 16:13:39', '2021-02-27 16:13:39'),
(43, 'Delete Program Course', 'Delete Program Course', '2021-02-27 16:14:20', '2021-02-27 16:14:20'),
(44, 'Search for Program Course', 'Search for Program Course', '2021-02-27 16:14:44', '2021-02-27 16:14:44'),
(45, 'Create Programs', 'Create Academic Programs', '2021-02-27 16:26:23', '2021-02-27 16:26:23'),
(46, 'List Programs', 'List Programs', '2021-02-27 16:27:18', '2021-02-27 16:27:18'),
(47, 'Edit Programs', 'Edit Programs', '2021-02-27 16:28:28', '2021-02-27 16:28:28'),
(48, 'Delete Programs', 'Delete Programs', '2021-02-27 16:28:43', '2021-02-27 16:28:43'),
(49, 'List Sessions', 'List Sessions', '2021-02-27 17:01:14', '2021-02-27 17:01:14'),
(50, 'Create New Session', 'Create New Session', '2021-02-27 17:02:00', '2021-02-27 17:02:00'),
(51, 'Edit Session', 'Edit Session', '2021-02-27 17:02:49', '2021-02-27 17:02:49'),
(52, 'Delete Session', 'Delete Session', '2021-02-27 17:03:39', '2021-02-27 17:03:39'),
(53, 'Set Current Session', 'Set Current Session', '2021-02-27 17:03:57', '2021-02-27 17:03:57'),
(54, 'Move Session', 'Move Session', '2021-02-27 17:04:13', '2021-02-27 17:04:13'),
(55, 'List Staff', 'List Staff', '2021-02-27 17:35:05', '2021-02-27 17:35:05'),
(56, 'Create Staff', 'Create new Staff', '2021-02-27 17:35:27', '2021-02-27 17:35:27'),
(57, 'Edit Staff', 'Edit Staff Details', '2021-02-27 17:35:45', '2021-02-27 17:35:45'),
(58, 'Delete Staff', 'Permanently delete Staff record', '2021-02-27 17:36:44', '2021-02-27 17:36:44'),
(59, 'View Staff', 'View Staff Information', '2021-02-27 17:37:06', '2021-02-27 17:37:06'),
(60, 'Reset Staff Password', 'Reset Staff Password', '2021-02-27 17:37:28', '2021-02-27 17:37:28'),
(61, 'Disable Staff', 'Disable Staff', '2021-02-27 17:37:50', '2021-02-27 17:37:50'),
(62, 'RBAC', 'Role Based Access Control', '2021-02-27 17:38:27', '2021-02-27 17:38:27'),
(63, 'Search Staff', 'Search for Staff', '2021-02-27 17:38:55', '2021-02-27 17:38:55'),
(64, 'CBT Staff User', 'Allows a staff access to CBT Portal', '2021-05-07 03:26:20', '2021-05-07 03:26:20'),
(65, 'Change Program Course Lecturer', 'Change the lecturer a program course was allocated to.', '2021-05-29 16:31:22', '2021-05-29 16:31:22'),
(66, 'Network Optimizer User', 'Access to add and edit Network devices', '2021-07-01 16:55:35', '2021-07-01 16:55:35'),
(67, 'Sotera Admin', 'Add IP address and group id', '2021-07-01 16:57:07', '2021-07-01 16:57:07'),
(68, 'Bursary Students Search', 'Bursary Students Search', '2021-07-04 12:46:00', '2021-07-04 12:46:00'),
(69, 'Senate Result Approval', 'Senate Result Approval', '2021-08-03 13:47:48', '2021-08-03 13:47:48'),
(70, 'Ntinso', 'optimizer', '2021-10-02 05:42:47', '2021-10-07 08:21:38'),
(71, 'emmanuel', 'download DHCP', '2021-10-07 08:19:15', '2021-10-07 08:19:15'),
(72, 'ICT Result Upload', 'Enable Staff to Modify old Result and Upload new APPROVED results.', '2021-12-14 03:07:24', '2021-12-14 03:07:24'),
(73, 'Remita Search', 'Search Remita information', '2022-03-21 06:15:44', '2022-03-21 06:15:44'),
(74, 'Disable Students', 'Disable or enable students login', '2022-04-09 00:23:10', '2022-04-09 00:23:10'),
(75, 'Approve Scores', 'To Approve Scores uploaded by Lecturers', NULL, NULL),
(76, 'Login', 'Enable admins login', NULL, NULL),
(77, 'Admin Signup', 'Allow an admin to Signup Another admin', NULL, NULL),
(78, 'Recommend', 'Recommends applicants for approval ', NULL, NULL),
(79, 'View all Applicant', 'Allow an admin to View all applicant ', NULL, NULL),
(80, 'Logout Admin', 'Logs out admins', NULL, NULL),
(81, 'View All RRR Generated ', 'Views all Generated RRR payments made by applicants', NULL, NULL),
(82, 'View all approved applicants', 'Views all approved applicants', NULL, NULL),
(83, 'View all Direct Entry Applicants', 'View all direct entry applicants', NULL, NULL),
(84, 'View all Post Graduate Applicants', 'View all post graduate applicants', NULL, NULL),
(85, 'View all Transfer Applicants', 'View all transfer applicants', NULL, NULL),
(86, 'View all UTME Applicants', 'View all utme applicants', NULL, NULL),
(87, 'UTME Payment', 'View all payments made by UTME Applicants', NULL, NULL),
(88, 'Direct Entry Payments', 'View all payments made by Direct Entry Applicants', NULL, NULL),
(89, 'Transfer Payments', 'View all payments made by Transfer Applicants', NULL, NULL),
(90, 'Post Graduate Payments', 'View all payments made by post graduate applicants', NULL, NULL),
(91, 'Approval of Applicants', 'Allows approval of applicants', NULL, NULL),
(92, 'Force Approval', 'Allows force approval of applicants', NULL, NULL),
(93, 'Rejection of Applicants', 'Allows admin reject unqualified applicants', NULL, NULL),
(94, 'View Applicant\'s details', 'Allows admin view the full details of an applicant..', NULL, NULL),
(95, 'View Qualified Applicants', 'Allows admin view all qualified applicants', NULL, NULL),
(96, 'Approve Qualified Applicants', 'Allows admin approve all qualified applicants in batches', NULL, NULL),
(97, 'View Unqualified Applicants', 'Allows admin view all unqualified applicants', NULL, NULL),
(98, 'Reject Unqualified Applicants', 'Allows admin reject all unqualified applicants in batches', NULL, NULL),
(99, 'Filter Post Graduate Applicants', 'Allows admin filter post graduate applicants', NULL, NULL),
(100, 'Filter Direct Entry Applicants', 'Allows admin filter direct entry applicants', NULL, NULL),
(101, 'Filter UTME Applicants', 'Allows admin filter UTME applicants', NULL, NULL),
(102, 'Filter Transfer Applicants', 'Allows admin filter transfer applicants', NULL, NULL),
(103, 'Add Roles', 'Allows admin assign roles', NULL, NULL),
(104, 'Add Tasks to Roles', 'Adds tasks to roles for admins', NULL, NULL),
(105, 'Submit tasks to roles', 'Submits the selected tasks to roles', NULL, NULL),
(106, 'Get tasks in role', 'Gets all the tasks that belongs to a particular roles', NULL, NULL),
(107, 'Gets tasks to role', 'Shows only the tasks that belongs to a role', NULL, NULL),
(108, 'Remove task from role', 'Removes tasks from a selected role', NULL, NULL),
(109, 'Role to admin', 'Assigns Role to admin', NULL, NULL),
(110, 'Assign roles to admin', 'Get roles and add to admin', NULL, NULL),
(111, 'Selects roles to admin', 'Submit selected roles to admin', NULL, NULL),
(112, 'Remove role from admin', 'Removes selected roles from admin', NULL, NULL),
(113, 'Submits removal of roles from admin', 'Submits Removal of selected roles from admin', NULL, NULL),
(114, 'Get roles in Admin', 'Gets roles assigned to a particular admin', NULL, NULL),
(115, 'View Admins', 'View all administrators', NULL, NULL),
(116, 'Delete Admin', 'Deletes selected Admin', NULL, NULL),
(117, 'Verify RRR Payment ', 'To allow admin verify payment after remita issues ', NULL, NULL),
(118, 'Change Applicant Course of Study', 'to be able to change the applicant choice of study ', NULL, NULL),
(119, 'Reset User Password', 'resetuserpassword', NULL, NULL),
(120, 'Reset Admin Password', 'resetadminpassword', NULL, NULL),
(121, 'Edit Users Info', 'editusersinfo', NULL, NULL),
(122, 'Add Remita Serice Type', 'addRemitaServiceType', NULL, NULL),
(123, 'View Remita Service Type', 'viewRemitaServiceType', NULL, NULL),
(124, 'View show FeeType', 'showFeeType', NULL, NULL),
(125, 'Edit Remita Service Type', 'editRemitaServiceType', NULL, NULL),
(126, 'Suspend Remita Service Type', 'suspendRemitaServiceType', NULL, NULL),
(127, 'Activate Remita Service Type', 'activeRemitaServiceType', NULL, NULL),
(128, 'PG verify Payment', 'pgverifypayment', NULL, NULL),
(129, 'GST Allocate Courses', 'To enable GST unit to allow courses', NULL, NULL),
(130, 'SBC result Approval', 'To enable SBC approve result', '2023-03-03 22:51:00', '2023-03-03 22:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2021-02-22 17:08:50', '2021-02-22 17:08:50'),
(2, 3, 1, '2021-02-22 17:16:02', '2021-02-22 17:16:02'),
(3, 4, 1, '2021-02-22 17:21:25', '2021-02-22 17:21:25'),
(4, 5, 1, '2021-02-22 17:26:02', '2021-02-22 17:26:02'),
(5, 6, 1, '2021-02-22 17:31:59', '2021-02-22 17:31:59'),
(6, 7, 1, '2021-02-22 17:33:51', '2021-02-22 17:33:51'),
(7, 8, 1, '2021-02-22 17:36:11', '2021-02-22 17:36:11'),
(8, 9, 1, '2021-02-22 17:37:18', '2021-02-22 17:37:18'),
(10, 10, 1, '2021-02-25 06:26:39', '2021-02-25 06:26:39'),
(11, 11, 1, '2021-02-25 06:27:45', '2021-02-25 06:27:45'),
(12, 12, 1, '2021-02-25 06:28:06', '2021-02-25 06:28:06'),
(13, 13, 1, '2021-02-25 06:28:32', '2021-02-25 06:28:32'),
(14, 14, 1, '2021-02-25 06:28:38', '2021-02-25 06:28:38'),
(15, 10, 2, '2021-02-25 06:44:10', '2021-02-25 06:44:10'),
(16, 11, 2, '2021-02-25 06:44:18', '2021-02-25 06:44:18'),
(17, 12, 2, '2021-02-25 06:44:26', '2021-02-25 06:44:26'),
(18, 13, 2, '2021-02-25 06:44:45', '2021-02-25 06:44:45'),
(19, 14, 2, '2021-02-25 06:44:56', '2021-02-25 06:44:56'),
(20, 15, 2, '2021-02-25 06:45:02', '2021-02-25 06:45:02'),
(21, 16, 2, '2021-02-25 06:45:09', '2021-02-25 06:45:09'),
(22, 15, 1, '2021-02-25 06:45:27', '2021-02-25 06:45:27'),
(23, 16, 1, '2021-02-25 06:45:33', '2021-02-25 06:45:33'),
(24, 17, 1, '2021-02-25 06:45:38', '2021-02-25 06:45:38'),
(26, 24, 3, '2021-02-25 07:55:41', '2021-02-25 07:55:41'),
(27, 23, 3, '2021-02-25 07:57:02', '2021-02-25 07:57:02'),
(28, 18, 1, '2021-02-25 07:58:28', '2021-02-25 07:58:28'),
(29, 19, 1, '2021-02-25 07:58:41', '2021-02-25 07:58:41'),
(30, 20, 1, '2021-02-25 07:58:49', '2021-02-25 07:58:49'),
(31, 21, 1, '2021-02-25 07:58:57', '2021-02-25 07:58:57'),
(32, 22, 1, '2021-02-25 07:59:12', '2021-02-25 07:59:12'),
(33, 23, 1, '2021-02-25 07:59:18', '2021-02-25 07:59:18'),
(34, 24, 1, '2021-02-25 07:59:25', '2021-02-25 07:59:25'),
(35, 25, 1, '2021-02-25 07:59:33', '2021-02-25 07:59:33'),
(36, 33, 1, '2021-02-25 17:13:24', '2021-02-25 17:13:24'),
(37, 26, 1, '2021-02-25 17:13:58', '2021-02-25 17:13:58'),
(39, 27, 1, '2021-02-25 17:14:20', '2021-02-25 17:14:20'),
(40, 32, 1, '2021-02-25 17:14:53', '2021-02-25 17:14:53'),
(41, 31, 1, '2021-02-25 17:15:01', '2021-02-25 17:15:01'),
(42, 30, 1, '2021-02-25 17:15:07', '2021-02-25 17:15:07'),
(43, 29, 1, '2021-02-25 17:15:28', '2021-02-25 17:15:28'),
(44, 28, 1, '2021-02-25 17:15:37', '2021-02-25 17:15:37'),
(45, 34, 1, '2021-02-25 17:30:26', '2021-02-25 17:30:26'),
(46, 35, 1, '2021-02-25 17:30:36', '2021-02-25 17:30:36'),
(47, 36, 1, '2021-02-25 17:31:09', '2021-02-25 17:31:09'),
(48, 37, 1, '2021-02-25 17:31:18', '2021-02-25 17:31:18'),
(49, 38, 1, '2021-02-25 17:31:26', '2021-02-25 17:31:26'),
(50, 39, 1, '2021-02-25 17:31:33', '2021-02-25 17:31:33'),
(51, 40, 1, '2021-02-27 14:23:45', '2021-02-27 14:23:45'),
(52, 41, 1, '2021-02-27 14:23:52', '2021-02-27 14:23:52'),
(53, 42, 1, '2021-02-27 14:24:09', '2021-02-27 14:24:09'),
(54, 43, 1, '2021-02-27 14:24:16', '2021-02-27 14:24:16'),
(55, 44, 1, '2021-02-27 14:24:23', '2021-02-27 14:24:23'),
(56, 45, 1, '2021-02-27 15:05:06', '2021-02-27 15:05:06'),
(57, 46, 1, '2021-02-27 15:05:16', '2021-02-27 15:05:16'),
(58, 47, 1, '2021-02-27 15:05:23', '2021-02-27 15:05:23'),
(59, 48, 1, '2021-02-27 15:05:32', '2021-02-27 15:05:32'),
(60, 49, 1, '2021-02-27 15:05:41', '2021-02-27 15:05:41'),
(61, 50, 1, '2021-02-27 15:05:48', '2021-02-27 15:05:48'),
(62, 51, 1, '2021-02-27 15:05:55', '2021-02-27 15:05:55'),
(63, 52, 1, '2021-02-27 15:06:02', '2021-02-27 15:06:02'),
(64, 53, 1, '2021-02-27 15:06:08', '2021-02-27 15:06:08'),
(65, 54, 1, '2021-02-27 15:06:14', '2021-02-27 15:06:14'),
(66, 63, 1, '2021-02-27 15:41:06', '2021-02-27 15:41:06'),
(67, 55, 1, '2021-02-27 15:44:09', '2021-02-27 15:44:09'),
(68, 56, 1, '2021-02-27 15:44:19', '2021-02-27 15:44:19'),
(69, 57, 1, '2021-02-27 15:44:25', '2021-02-27 15:44:25'),
(70, 58, 1, '2021-02-27 15:44:38', '2021-02-27 15:44:38'),
(71, 59, 1, '2021-02-27 15:44:45', '2021-02-27 15:44:45'),
(72, 60, 1, '2021-02-27 15:44:51', '2021-02-27 15:44:51'),
(73, 61, 1, '2021-02-27 15:44:57', '2021-02-27 15:44:57'),
(74, 62, 1, '2021-02-27 15:45:04', '2021-02-27 15:45:04'),
(75, 11, 5, '2021-02-27 15:58:49', '2021-02-27 15:58:49'),
(76, 13, 5, '2021-02-27 15:58:56', '2021-02-27 15:58:56'),
(77, 14, 5, '2021-02-27 15:59:05', '2021-02-27 15:59:05'),
(78, 63, 4, '2021-02-27 15:59:26', '2021-02-27 15:59:26'),
(79, 59, 4, '2021-02-27 15:59:41', '2021-02-27 15:59:41'),
(80, 55, 4, '2021-02-27 15:59:56', '2021-02-27 15:59:56'),
(81, 2, 6, '2021-03-01 12:09:04', '2021-03-01 12:09:04'),
(82, 11, 6, '2021-03-01 12:09:18', '2021-03-01 12:09:18'),
(83, 13, 6, '2021-03-01 12:09:27', '2021-03-01 12:09:27'),
(84, 14, 6, '2021-03-01 12:09:59', '2021-03-01 12:09:59'),
(85, 27, 6, '2021-03-01 12:10:27', '2021-03-01 12:10:27'),
(86, 17, 6, '2021-03-01 12:10:37', '2021-03-01 12:10:37'),
(87, 34, 6, '2021-03-01 12:11:06', '2021-03-01 12:11:06'),
(88, 38, 6, '2021-03-01 12:11:21', '2021-03-01 12:11:21'),
(89, 49, 6, '2021-03-01 12:11:34', '2021-03-01 12:11:34'),
(90, 46, 6, '2021-03-01 12:11:48', '2021-03-01 12:11:48'),
(91, 41, 7, '2021-03-02 11:37:49', '2021-03-02 11:37:49'),
(92, 22, 8, '2021-03-02 11:38:08', '2021-03-02 11:38:08'),
(93, 23, 8, '2021-03-02 11:38:34', '2021-03-02 11:38:34'),
(94, 25, 8, '2021-03-02 11:38:44', '2021-03-02 11:38:44'),
(95, 34, 7, '2021-03-02 11:39:33', '2021-03-02 11:39:33'),
(96, 35, 7, '2021-03-02 11:41:11', '2021-03-02 11:41:11'),
(97, 36, 7, '2021-03-02 11:41:28', '2021-03-02 11:41:28'),
(98, 38, 7, '2021-03-02 11:41:44', '2021-03-02 11:41:44'),
(99, 39, 7, '2021-03-02 11:42:00', '2021-03-02 11:42:00'),
(100, 40, 7, '2021-03-02 11:42:59', '2021-03-02 11:42:59'),
(101, 42, 7, '2021-03-02 11:44:13', '2021-03-02 11:44:13'),
(102, 43, 7, '2021-03-02 11:45:03', '2021-03-02 11:45:03'),
(103, 44, 7, '2021-03-02 11:45:57', '2021-03-02 11:45:57'),
(104, 63, 9, '2021-03-02 18:33:37', '2021-03-02 18:33:37'),
(105, 61, 9, '2021-03-02 18:33:49', '2021-03-02 18:33:49'),
(106, 60, 9, '2021-03-02 18:34:06', '2021-03-02 18:34:06'),
(107, 59, 9, '2021-03-02 18:34:17', '2021-03-02 18:34:17'),
(108, 57, 9, '2021-03-02 18:37:09', '2021-03-02 18:37:09'),
(109, 56, 9, '2021-03-02 18:37:27', '2021-03-02 18:37:27'),
(110, 55, 9, '2021-03-02 18:37:38', '2021-03-02 18:37:38'),
(111, 39, 10, '2021-03-19 13:11:53', '2021-03-19 13:11:53'),
(112, 40, 10, '2021-03-19 13:12:17', '2021-03-19 13:12:17'),
(113, 6, 10, '2021-03-19 13:12:37', '2021-03-19 13:12:37'),
(114, 6, 10, '2021-03-19 13:12:55', '2021-03-19 13:12:55'),
(115, 7, 10, '2021-03-19 13:13:18', '2021-03-19 13:13:18'),
(116, 8, 10, '2021-03-19 13:13:32', '2021-03-19 13:13:32'),
(117, 9, 10, '2021-03-19 13:13:53', '2021-03-19 13:13:53'),
(118, 17, 10, '2021-03-19 13:15:02', '2021-03-19 13:15:02'),
(119, 30, 11, '2021-03-19 13:19:44', '2021-03-19 13:19:44'),
(120, 29, 11, '2021-03-19 13:20:24', '2021-03-19 13:20:24'),
(121, 31, 11, '2021-03-19 13:20:55', '2021-03-19 13:20:55'),
(122, 32, 11, '2021-03-19 13:21:43', '2021-03-19 13:21:43'),
(123, 11, 10, '2021-03-23 16:07:23', '2021-03-23 16:07:23'),
(124, 16, 5, '2021-05-05 10:04:30', '2021-05-05 10:04:30'),
(125, 64, 1, '2021-05-07 01:33:50', '2021-05-07 01:33:50'),
(126, 64, 12, '2021-05-07 01:34:58', '2021-05-07 01:34:58'),
(127, 64, 10, '2021-05-07 01:39:54', '2021-05-07 01:39:54'),
(128, 65, 1, '2021-05-29 14:32:47', '2021-05-29 14:32:47'),
(129, 65, 10, '2021-05-29 14:41:10', '2021-05-29 14:41:10'),
(130, 11, 13, '2021-06-12 14:23:22', '2021-06-12 14:23:22'),
(131, 13, 13, '2021-06-12 14:24:03', '2021-06-12 14:24:03'),
(132, 14, 13, '2021-06-12 14:24:18', '2021-06-12 14:24:18'),
(133, 66, 1, '2021-07-01 16:47:06', '2021-07-01 16:47:06'),
(134, 66, 14, '2021-07-01 17:19:25', '2021-07-01 17:19:25'),
(135, 68, 13, '2021-07-04 10:46:30', '2021-07-04 10:46:30'),
(136, 68, 1, '2021-07-04 10:47:50', '2021-07-04 10:47:50'),
(138, 67, 1, '2021-07-04 11:05:35', '2021-07-04 11:05:35'),
(139, 69, 1, '2021-08-03 11:49:16', '2021-08-03 11:49:16'),
(140, 66, 16, '2021-09-01 06:51:23', '2021-09-01 06:51:23'),
(141, 67, 16, '2021-09-01 06:51:32', '2021-09-01 06:51:32'),
(142, 56, 2, '2021-09-18 12:40:48', '2021-09-18 12:40:48'),
(143, 57, 2, '2021-09-18 12:41:47', '2021-09-18 12:41:47'),
(144, 60, 2, '2021-09-18 12:42:22', '2021-09-18 12:42:22'),
(146, 72, 1, '2021-12-14 01:35:49', '2021-12-14 01:35:49'),
(147, 72, 18, '2021-12-14 01:41:17', '2021-12-14 01:41:17'),
(148, 73, 1, '2022-03-21 04:25:25', '2022-03-21 04:25:25'),
(149, 73, 13, '2022-03-21 04:25:49', '2022-03-21 04:25:49'),
(150, 74, 1, '2022-04-08 22:23:30', '2022-04-08 22:23:30'),
(151, 75, 1, NULL, NULL),
(152, 76, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(153, 77, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(154, 78, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(155, 79, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(157, 81, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(158, 82, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(159, 83, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(160, 84, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(161, 85, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(162, 86, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(163, 87, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(164, 88, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(165, 89, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(166, 90, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(167, 91, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(168, 92, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(169, 93, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(170, 94, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(171, 95, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(172, 96, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(173, 97, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(174, 98, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(175, 99, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(176, 100, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(177, 101, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(178, 102, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(179, 103, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(180, 104, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(181, 105, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(182, 106, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(183, 107, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(184, 108, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(185, 109, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(186, 110, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(187, 111, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(188, 112, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(189, 113, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(190, 114, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(191, 115, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(192, 116, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(193, 117, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(194, 118, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(195, 119, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(196, 120, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(197, 121, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(198, 122, 1, '2023-01-12 12:37:34', '2023-01-12 12:37:34'),
(200, 1, 1, NULL, NULL),
(203, 130, 1, NULL, NULL),
(204, 2, 8, '2023-03-04 13:43:47', '2023-03-04 13:43:47'),
(205, 129, 1, '2023-03-04 17:33:45', '2023-03-04 17:33:45'),
(207, 131, 1, '2023-03-17 01:01:57', '2023-03-17 01:01:57'),
(208, 133, 24, '2023-04-16 17:29:21', '2023-04-16 17:29:21'),
(209, 133, 1, '2023-04-16 17:42:34', '2023-04-16 17:42:34'),
(210, 126, 1, '2023-04-16 17:42:50', '2023-04-16 17:42:50'),
(211, 123, 1, '2023-04-16 17:42:55', '2023-04-16 17:42:55'),
(212, 124, 1, '2023-04-16 17:43:01', '2023-04-16 17:43:01'),
(213, 125, 1, '2023-04-16 17:43:06', '2023-04-16 17:43:06'),
(214, 127, 1, '2023-04-16 17:43:11', '2023-04-16 17:43:11'),
(216, 132, 1, NULL, NULL),
(217, 152, 1, '2023-06-10 11:36:45', '2023-06-10 11:36:45'),
(218, 135, 1, '2023-06-10 20:17:56', '2023-06-10 20:17:56'),
(219, 137, 1, '2023-06-10 20:18:05', '2023-06-10 20:18:05'),
(220, 151, 1, '2023-06-10 20:18:14', '2023-06-10 20:18:14'),
(221, 150, 1, '2023-06-10 20:18:19', '2023-06-10 20:18:19'),
(222, 149, 1, '2023-06-10 20:18:24', '2023-06-10 20:18:24'),
(223, 148, 1, '2023-06-10 20:18:28', '2023-06-10 20:18:28'),
(224, 147, 1, '2023-06-10 20:18:33', '2023-06-10 20:18:33'),
(225, 145, 1, '2023-06-10 20:18:37', '2023-06-10 20:18:37'),
(226, 140, 1, '2023-06-10 20:18:41', '2023-06-10 20:18:41'),
(227, 138, 1, '2023-06-10 20:18:45', '2023-06-10 20:18:45'),
(228, 139, 1, '2023-06-10 20:18:50', '2023-06-10 20:18:50'),
(229, 128, 1, '2023-06-10 20:18:56', '2023-06-10 20:18:56'),
(230, 136, 1, '2023-06-10 20:19:03', '2023-06-10 20:19:03'),
(231, 71, 1, '2023-06-10 20:19:08', '2023-06-10 20:19:08'),
(232, 141, 1, '2023-06-10 20:19:13', '2023-06-10 20:19:13'),
(233, 142, 1, '2023-06-10 20:19:19', '2023-06-10 20:19:19'),
(234, 143, 1, '2023-06-10 20:19:24', '2023-06-10 20:19:24'),
(235, 70, 1, '2023-06-10 20:19:29', '2023-06-10 20:19:29'),
(236, 144, 1, '2023-06-10 20:19:33', '2023-06-10 20:19:33'),
(237, 146, 1, '2023-06-10 20:19:38', '2023-06-10 20:19:38'),
(238, 2, 10, '2023-06-10 21:20:42', '2023-06-10 21:20:42'),
(239, 129, 20, '2023-06-10 21:29:50', '2023-06-10 21:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pgs`
--

CREATE TABLE `pgs` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `mode` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `research_topic` varchar(200) DEFAULT NULL,
  `status` int(5) NOT NULL DEFAULT '1',
  `course_applied` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pg_educations`
--

CREATE TABLE `pg_educations` (
  `id` bigint(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `institution` varchar(60) NOT NULL,
  `period` varchar(60) NOT NULL,
  `course` varchar(60) NOT NULL,
  `certificate_name` varchar(60) NOT NULL,
  `certificate_type` varchar(60) NOT NULL,
  `class_honour` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pg_referees`
--

CREATE TABLE `pg_referees` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `name1` varchar(60) NOT NULL,
  `position1` varchar(60) NOT NULL,
  `institution1` varchar(255) NOT NULL,
  `email1` varchar(60) NOT NULL,
  `name2` varchar(60) NOT NULL,
  `position2` varchar(60) NOT NULL,
  `institution2` varchar(255) NOT NULL,
  `email2` varchar(60) NOT NULL,
  `name3` varchar(60) NOT NULL,
  `position3` varchar(60) NOT NULL,
  `institution3` varchar(255) NOT NULL,
  `email3` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `degree` varchar(10) DEFAULT NULL,
  `masters` varchar(10) DEFAULT NULL,
  `jamb_cutoff` int(11) NOT NULL DEFAULT '180',
  `academic_department_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '4',
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `code`, `degree`, `masters`, `jamb_cutoff`, `academic_department_id`, `duration`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Political Science and Diplomacy', 'POL', 'B.Sc', 'M.Sc', 170, 12, 4, 1, NULL, NULL),
(2, 'Economics', 'ECO', 'B.Sc', 'M.Sc', 170, 2, 4, 1, NULL, NULL),
(3, 'Industrial Chemistry', 'CHM', 'B.Sc', 'M.Sc', 170, 5, 4, 1, NULL, NULL),
(4, 'Physics with Electronics', 'PHY', 'B.Sc', 'M.Sc', 170, 6, 4, 1, NULL, NULL),
(5, 'Applied Mathematics', 'MTH', 'B.Sc', 'M.Sc', 170, 6, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_courses`
--

CREATE TABLE `program_courses` (
  `id` int(11) NOT NULL,
  `course_id` int(11) UNSIGNED NOT NULL,
  `program_id` int(11) NOT NULL,
  `level` int(5) NOT NULL,
  `session_id` int(5) NOT NULL,
  `semester` int(5) NOT NULL,
  `credit_unit` int(5) NOT NULL,
  `course_category` int(5) NOT NULL,
  `has_perequisite` enum('yes','no') NOT NULL DEFAULT 'no',
  `perequisite_id` int(11) DEFAULT NULL,
  `lecturer_id` int(11) DEFAULT NULL,
  `approval` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recommended_applicants`
--

CREATE TABLE `recommended_applicants` (
  `user_id` int(11) NOT NULL,
  `recommended_by` int(11) NOT NULL,
  `recommendation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registered_courses`
--

CREATE TABLE `registered_courses` (
  `id` int(11) NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(11) NOT NULL,
  `level` varchar(255) DEFAULT NULL,
  `semester` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` varchar(10) NOT NULL,
  `ca2_score` float DEFAULT '0',
  `ca3_score` float DEFAULT '0',
  `ca1_score` float DEFAULT '0',
  `exam_score` float DEFAULT '0',
  `total` float DEFAULT '0',
  `old_total` float DEFAULT NULL,
  `grade_id` bigint(20) UNSIGNED DEFAULT NULL,
  `grade_status` enum('pass','fail') NOT NULL DEFAULT 'pass',
  `result_id` varchar(255) DEFAULT NULL,
  `status` enum('published','unpublished') NOT NULL DEFAULT 'unpublished',
  `staff_id` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rejected_applicants`
--

CREATE TABLE `rejected_applicants` (
  `user_id` int(20) NOT NULL,
  `rejection_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rejected_by` int(15) NOT NULL,
  `comment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rejected_applicants`
--

INSERT INTO `rejected_applicants` (`user_id`, `rejection_date`, `rejected_by`, `comment`) VALUES
(2850, '2022-10-04 13:09:04', 18, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `remitas`
--

CREATE TABLE `remitas` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `rrr` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `fee_type` varchar(500) NOT NULL,
  `fee_type_id` int(11) NOT NULL,
  `service_type_id` bigint(20) NOT NULL,
  `amount` double NOT NULL,
  `status_code` varchar(5) NOT NULL,
  `status` varchar(70) DEFAULT NULL,
  `request_ip` varchar(20) DEFAULT NULL,
  `order_ref` varchar(100) DEFAULT NULL,
  `bank_code` int(11) DEFAULT NULL,
  `branch_code` int(11) DEFAULT NULL,
  `debit_date` date DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `channel` varchar(70) DEFAULT NULL,
  `verify_by` int(10) DEFAULT NULL,
  `authenticate` varchar(11) DEFAULT 'not_confrim',
  `authenticate_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `remitas_verifications`
--

CREATE TABLE `remitas_verifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `rrr` bigint(25) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `percentage` varchar(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `remitas_verifications`
--

INSERT INTO `remitas_verifications` (`id`, `user_id`, `student_id`, `rrr`, `amount`, `percentage`, `session_id`, `staff_id`, `created_at`, `updated_at`) VALUES
(12, 14, 2031, 120707793149, '430000', '100', 1, 506, '2023-09-22 23:35:24', '2023-09-22 23:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `result_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `level` bigint(20) NOT NULL,
  `semester` int(11) NOT NULL,
  `tcu` double(8,2) NOT NULL,
  `tgp` double(8,2) NOT NULL,
  `gpa` double(8,2) NOT NULL,
  `cgpa` double(8,2) NOT NULL,
  `status` enum('published','unpublished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpublished',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `result_id`, `student_id`, `program_id`, `session_id`, `level`, `semester`, `tcu`, `tgp`, `gpa`, `cgpa`, `status`, `created_at`, `updated_at`) VALUES
(1, '2031151001', 2031, 22, 15, 100, 1, 2.00, 8.00, 4.00, 4.00, 'published', '2022-11-17 19:49:23', '2022-11-18 06:29:11'),
(2, '2033151001', 2033, 22, 15, 100, 1, 2.00, 10.00, 5.00, 5.00, 'published', '2022-11-17 19:49:23', '2022-11-18 06:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `role`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Master Admin', 'Master Admin', 'Universal access to all data and functions', '2021-02-22 18:04:06', '2021-02-22 18:04:06'),
(2, 'Student Admin', 'Student Admin', 'Manage Students Information', '2021-02-25 07:21:39', '2021-02-25 07:21:39'),
(3, 'Exam Officers', 'Exam Officers', 'Exam Officers', '2021-02-25 08:49:56', '2021-02-25 08:50:42'),
(4, 'Staff Support', 'Staff Support', 'View Staff Information', '2021-02-27 16:58:04', '2021-02-27 16:58:04'),
(5, 'Student Support', 'Student Support', 'View Student Information', '2021-02-27 16:58:27', '2021-02-27 16:58:27'),
(6, 'Academic Affairs', 'Academic Affairs', 'Academic Affairs', '2021-03-01 13:08:46', '2021-03-01 13:08:46'),
(7, 'Course Admin', 'Course Admin', 'Management of Courses and Program Courses', '2021-03-02 12:36:27', '2021-03-02 12:36:27'),
(8, 'Result Admin', 'Result Admin', 'Manage all Old and New Students Results', '2021-03-02 12:37:21', '2021-03-02 12:37:21'),
(9, 'Staff Admin', 'Staff Admin', 'Create, Edit and Manage Staff details', '2021-03-02 19:32:11', '2021-03-02 19:32:11'),
(10, 'Academic HoD', 'Staff Admin', 'Permissions for Heads of Academic Departments', '2021-03-19 14:10:14', '2021-03-19 14:10:14'),
(11, 'Faculty Dean', 'Faculty Dean', 'Faculty Dean', '2021-03-19 14:17:14', '2021-03-19 14:17:14'),
(12, 'CBT Staff', 'CBT Staff', 'For CBT Roles and Exam Nominee', '2021-05-07 01:26:53', '2021-05-07 01:26:53'),
(13, 'Bursary Student Support', 'Bursary Student Support', 'Access to required students information for Bursary staff', '2021-06-12 14:20:52', '2021-06-12 14:20:52'),
(14, 'Network Support', 'Network Support', 'Add users to the network', '2021-07-01 17:19:11', '2021-09-01 06:49:58'),
(15, 'Vice Chancellor', 'Vice Chancellor', 'Actions and pages accessible by the Vice Chancellor', '2021-08-03 11:49:58', '2021-08-03 11:49:58'),
(16, 'Network Administrator', 'Network Administrator', 'Manage and Update Network firewall', '2021-09-01 06:50:53', '2021-09-01 06:50:53'),
(18, 'ICT Result Approved Upload', 'ICT Result Approved Upload', 'Enable ICT Staff to upload APPROVED results.', '2021-12-14 02:41:00', '2021-12-14 02:41:00'),
(19, 'testing', 'testing', 'testing', '2022-11-16 12:18:13', '2022-11-16 12:18:13'),
(20, 'GST allocate course', 'GST allocate course', 'GST allocate course', '2022-11-27 13:51:24', '2022-11-27 13:51:24'),
(21, 'SBC Result Approval', 'SBCResultApproval', 'To enable SBC Approval Result', NULL, NULL),
(22, 'ICT View Result', 'ICT View Result', 'Enable ICT Staff to view Result of all department and know approval progress', '2023-03-17 00:57:37', '2023-03-17 00:57:37'),
(23, 'testing this', 'testing this', 'this', '2023-03-17 06:42:29', '2023-03-17 06:42:29'),
(24, 'ICT Officers', 'ICT Officers', 'ICT Officers', '2023-04-16 17:27:02', '2023-04-16 17:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `role_staff`
--

CREATE TABLE `role_staff` (
  `id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_staff`
--

INSERT INTO `role_staff` (`id`, `role_id`, `staff_id`, `created_at`, `updated_at`) VALUES
(256, 1, 506, '2023-03-22 16:56:19', '2023-03-22 16:56:19'),
(257, 2, 506, '2023-04-25 15:36:16', '2023-04-25 15:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `role_to_admin`
--

CREATE TABLE `role_to_admin` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_to_admin`
--

INSERT INTO `role_to_admin` (`id`, `admin_id`, `staff_id`, `role_id`) VALUES
(12, NULL, 506, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester_registrations`
--

CREATE TABLE `semester_registrations` (
  `id` int(11) NOT NULL,
  `student_id` int(20) NOT NULL,
  `session_id` int(11) UNSIGNED NOT NULL,
  `semester` int(20) NOT NULL,
  `level` int(11) NOT NULL,
  `excess_credit` int(11) NOT NULL DEFAULT '0',
  `status` int(20) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester_remark_courses`
--

CREATE TABLE `semester_remark_courses` (
  `id` int(11) NOT NULL,
  `registered_course_id` int(11) DEFAULT NULL,
  `course_id` varchar(10) NOT NULL,
  `student_id` int(11) NOT NULL,
  `type` enum('co','out') NOT NULL DEFAULT 'co',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester_result_outstandings`
--

CREATE TABLE `semester_result_outstandings` (
  `id` int(11) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `semester_registration_id` bigint(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `semester` int(20) NOT NULL DEFAULT '1',
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `start_date`, `end_date`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(15, '2021/2022', '2021-10-15', '2022-07-29', 1, '0', NULL, '2023-03-18 11:14:40'),
(16, '2022/2023', '2022-09-07', '2023-07-20', 1, '1', NULL, '2023-06-10 22:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `sessions_admission`
--

CREATE TABLE `sessions_admission` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions_admission`
--

INSERT INTO `sessions_admission` (`id`, `name`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022/2023', '2022-03-01', '2022-12-31', 1, '2023-03-18 17:08:58', '2023-03-18 17:08:58'),
(2, '2023/2024', '2023-03-01', '2023-12-30', 0, '2023-03-18 17:09:40', '2023-03-18 17:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `some`
--

CREATE TABLE `some` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soteria_devices`
--

CREATE TABLE `soteria_devices` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `device_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `os` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `antivirus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `av_expire` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` bigint(200) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soteria_officials`
--

CREATE TABLE `soteria_officials` (
  `id` int(10) UNSIGNED NOT NULL,
  `device_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_department_id` bigint(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `memory` int(11) NOT NULL,
  `os` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `antivirus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `av_expire` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mac_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sponsor_title` varchar(20) DEFAULT NULL,
  `sponsor_relationship` varchar(50) DEFAULT NULL,
  `sponsors_phone` varchar(20) DEFAULT NULL,
  `sponsors_email` varchar(100) DEFAULT NULL,
  `sponsors_address` varchar(255) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `maiden_name` varchar(50) DEFAULT NULL,
  `dob` varchar(20) NOT NULL,
  `title` varchar(10) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `lga_name` varchar(30) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `marital_status` varchar(20) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `passport` longblob NOT NULL,
  `signature` longblob NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `first_name`, `surname`, `middle_name`, `maiden_name`, `dob`, `title`, `nationality`, `state`, `lga_name`, `address`, `city`, `religion`, `phone`, `email`, `marital_status`, `gender`, `passport`, `signature`, `username`, `password`, `status`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'OBUMNEME', 'OFOR', 'GODWIN', NULL, '1983-07-25', 'Engr', 'Nigeria', 'Enugu', 'Ezeagu', '30 Kings Drive', 'Abuja', 'Catholic', '08037749053', 'ojor@yahoo.com', 'Married', 'Male', 0x2f396a2f34414151536b5a4a5267414241514541594142674141442f2f67413751314a4651565250556a6f675a325174616e426c5a7942324d5334774943683163326c755a79424a536b6367536c4246527942324f4441704c4342786457467361585235494430674f54414b2f39734151774144416749444167494441774d4442414d4442415549425155454241554b427763474341774b4441774c4367734c445134534541304f4551344c437841574542455446425556465177504678675746426753464255552f39734151774544424151464241554a4251554a4641304c44525155464251554642515546425155464251554642515546425155464251554642515546425155464251554642515546425155464251554642515546425155464251552f384141455167424c414573417745524141495241514d5241662f454142384141414546415145424151454241414141414141414141414241674d454251594843416b4b432f2f45414c55514141494241774d4342414d4642515145414141426651454341774145455155534954464242684e525951636963525179675a476843434e4373634556557448774a444e69636f494a4368595847426b614a53596e4b436b714e4455324e7a67354f6b4e4552555a4853456c4b55315256566c64595756706a5a47566d5a326870616e4e3064585a3365486c3667345346686f6549695971536b3553566c7065596d5a71696f36536c7071656f716171797337533174726534756272437738544678736649796372533039545631746659326472683475506b3565626e364f6e7138664c7a39505832392f6a352b762f454142384241414d42415145424151454241514541414141414141414241674d454251594843416b4b432f2f45414c555241414942416751454177514842515145414145436477414241674d52424155684d5159535156454859584554496a4b42434252436b61477877516b6a4d314c7746574a7930516f574a4454684a66455847426b614a69636f4b536f314e6a63344f547044524556475230684a536c4e5556565a5857466c615932526c5a6d646f6157707a6448563264336835656f4b44684957476834694a69704b546c4a57576c35695a6d714b6a704b576d7036697071724b7a744c57327437693575734c44784d584778386a4a79744c54314e585731396a5a32754c6a354f586d352b6a7036764c7a39505832392f6a352b762f61414177444151414345514d52414438412f5649644b41466f414b414367416f414b414367416f414b414367416f414b4143674343347559375746355a7045696951466d643243716f48636b394b4150426669542b3344384a7668744d39744a72343136395664336b6149426444506f584232412b32615679314273384338532f384656644f686b43364a3446754a563542652f7641683638664b696e5048624e527a47716f733535502b437265734c4f444a3444735867485552337268767a4b2f77424b584f5637426e59654550384167716e3462764c68592f4558672b2b3079466e5654635764777336714f35326b4b542b46484f53364c50662f41496466746b664366346c356a7376465672706c32446a374c724443306b4f546759336e427a36416d72556b7a4a776150616f4a34376d4a5a496e57534e686c585273676a324e555154554146414251415541464142514155414641425141554146414251415541464142514155414641425141673655414c514155414641425141554146414251415541464142514257757271477774354c69346c5347434a53386b6b6a425652514d6b6b6e6f42514238652f48372f676f373453384169545450424553654c4e584756612b4f356247416a723833426c507370412f7742716c63316a54636a34422b4c3337556e78432b4e63706a385165495a376e54743239644c6855513279486e42324c77635a36746b2b395a755230517070486c6b6c39492b334b674e2f65365a7144596a4d7a4d57543776707537443234343656417233476661477a6b6734417775543950782f7961545271704238354a473568786a4b392f792f3841313830696c37784c6271354f3543776c33646a324136314e2b554f53353652384d6632682f6948384933522f4333694f38302b324c354e6d48387933596b6a724532563764635a392b6174544d70556c492b3550674c2f77557530377844644a7033784874496447636e6175723245626d44502f414530546c687a3347666f426b316f716e3878787a6f74624833426f506944546646476c77616c704e3962366a59547276697562615153493439694b36446e4e4b67416f414b414367416f414b414367416f414b414367416f414b414367416f414b4143674242306f415767416f414b414367416f414b414367416f414b414f613866664544512f686c345676764558694b2b6a302f53724e43386b726e6c6a3256522f4578504141363041666b352b31442b3233346d2b4e3271584f6e36504c646148344d55376266546b634b3979426e35357976336966376d646f34366e4a714849366f55376645664e674c546e456a594250332f58735077724e73366b724447684d62416c51796e6e48723170585163724a456845784947647167734e7748413548512b354835316b3669696177704f52616930377a707a476d4d6f4f7671423759397a5754716d3861485175546166457472356a786b6735442b77492f6d5036566e3754553164465747773662444a415669526f324b4c7433484f35746f7a7a365a357837304f6f52476c3247546155317372474d675342657836676a6b556339782b7a73552f734c72486a61666e50556763482f504e5866556a6c6156796d726d79446f354977337935505134395279656e3631567a4e71323537662b7a642b3148346d2b4133694f4736737271347539436e64526561544b784d63712b6f427a74622f61485054747857735a325a7a7a704b6150312b2b46587857304434772b454c5478463465756850617a4444786b2f764958376f34374556314a33504d6c4678646d647056434367416f414b414367416f414b414367416f414b414367416f414b414367416f4151644b41466f414b414367416f414b414367416f414b414d62785434703033775a3465763962316535533030327868616565647a674b716a6e3866616744386550327476326f74582f4147692f47496a67576177384c57544d746870346672302f6579446f584f6677484139546c4a6e62547057504335624667335041433533487030484836316735324f7855376c57643549593133677942636a48504e527a477649614f6d614e397265454669484c354f357551426b6d734a314c48525470584f7162777359315a306c3379424f454b392b762b52586e7574646e704b68706f46686f553972495a6c6a566968327571747867396366687a2b645a7971706d6b614c524e4a5a4455316a74746d4939343234364e7a68695431372f705652715764795a557236453133614a35714b59782f6f376c4a5150342b63442b70343961464e76554854556443424e444539743870627a63676b5a7a6a383865745437577a4432504d6a6f3744776461795378724e626b6c41427555343348492b624946523959614f68595a5330614d7278663446736a4842466177545179716d342b6279716e6b67672b68342f4375696c57756364624457527764376f2f396d536d4e6f74364534795735422f4b7578564c6e6e756c79487333374e2f7837316e34412b4e344e56745a5775644a6b62797236774c62556d687a676b442b3876554831423954585454714848576f33522b78336862785070336a4c772f702b746154634c64616266774a63573879394752686b66512b316436647a786d72477854454641425141554146414251415541464142514155414641425141554146414344705141744142514155414641425141554146414251422b61662f425362396f71665739645434593642656a2b7a6248624c717868626d57343672456655494370782f65502b7a5553646a6f6f7775376e783734573849704a70386c39634a6b625349343350553841456a4f635a4f6638416749726871564c487430714e79356636582b35594e48477249434e7359786a417a365a3648362f5375503270332b784d3150446b73784257426f7752754962722b574d39366e3271425558665937507737344a6e76417235574e55427743767a632b6e6638363461746449394b6c686d7a716b384558617778346a4449725a2b555978373472672b7351324f2f7743724f78623076775a63624857534c644d546c686e673537666c36566c55724c6f61306144366d772f773768646f6d636c4170444256556465522f49316b73557a643456464336384253537a4f375242354a57592b594678744662724549776546592b782b48317a444a357170676b6a4c48356a78332b7566365565335442595778765750676935676a69566546427a6e756335352f4f755a31586336565356696e3467304b6546446a6c453442595a42377277422f54394f75394b72715956615768354c7250674b57366d4d6f51786a617a4d764a445a35786e2f36783731366b635259386165467559327061484c62504336517979713857304d5268315966336833474f32663631325536683531576c6178393066384535766a5a4a62543333777531566d574a5665393068704a5151754d4761416669533441394872314b46532b68344f4c6f3872356b66664e6470356f554146414251415541464142514155414641425141554146414251415541494f6c4143304146414251415541464142514155416564664833346d77664348345465497646456a624c6931746d5331474d377268766c69474f2f7a45483641304469755a325078526d6a7576464775584f7036684e4a4e63334d786b6c6c6b4a4c794f78334d54337a79613471737248765965696577576d672f5a6257425345645167435958706a2f3639654e5771483057487043532b4642657a435256434f324d6a743078584136746a306f30457a613072775461323067643138325431626d7557646562324f714747676a72374c54496f52386b514765764857764f6e4e794f2b4549784e4a624c45654e67786a705748326a52714c4a6f62544444413436644f74456e6349717859574449344848616c596479396136655a75414d38394b7452757a4b5537477461364e7569436c5153665556315170584f4f70574a5a6448387465564239794b30396b7a4a566b7a4d315052493768434a464258765538706f706e6d2f696252566931454c732b514465536563635948466170364579584d635671476d5332326e33553777496a7a2f414f715a7839334a366a6e72786a317274707a7565665670324f5138506174662f44377858706e694f4355706661646478336b536a37775a5744416366776e617749376731374e4366592b62784e4c644d2f61727774346774664633686e537462736a7573395274597275456e756a6f4748364776635475726e7937584b37477656434367416f414b414367416f414b414367416f414b414367416f414b41454853674261414367416f414b414367416f414b41507a302f344b656645472b6c312f7768344774706a485a4a433272584d5162416c6b4c4649632b793748502f41414b73355051367350446d6d664866682f52526336726271726c315a306371546768516566356670586b56616a507171464a4939306b74304c44414141474d5635453957653954566b54326d6e622b65337255657a756448744c473761614f30773646656366577064457056624776467052684879726b59786b317753703870314b707a452f3241675941726a614e7559524c49394b7973446d576f62446667347a57696951356d39704f6a6d5352574977434f4f2f394b3771564c6d5a785661764b6a72626251674951536f4f4f396574436b654e5572616b567a6f793479446a5058464470324346573568616a705245546337756547787a584a556764644f6f63423472306379534b55554568537265707a36482f41443372424c6c4f7854756342724e6f626d337849796e61716f716b66784837702f4f745961474654336b6564654c394b4d6c70455a496d444c48383078494977426b5978366b456a384b3947684d386a4651756a39482f414e6737786c4e34732f5a38307531756e44336569545361592b446b68457759786e32526c483456394a526434487865496a793144364c726335776f414b414367416f414b414367416f414b414367416f414b4143674242306f415767416f414b414367416f414b41436744387176322b623174512f616d76493530334c5957466e444763446f79622b4f2f57512b3372584c562b45395442376e6d766772536b653953584a566f334b6a637655446a6a6e484e6554553250714b4f35366c4462744e497666307269554f59395735304f6d366343564a424849344936632f354e644549476335324f793069776a654d71646736486a6e6b6a2f503656314b476877756f376c6d35303478733231666c78786d764978464939476a5675556e67494a7a77514d382b6c654e79487163784549766e475076484e54375073567a6d686257777941522f6857696a7159536b64566f364a4756334c303942587155556b655657647a6344675a414141485944474f656c65676561527967534c31714a467263794c3943695a50356e765848554f754a782b7657496b676b504f345a2f50482f312f77426178736445577a7a4457677473323949775533457370783033416b446e30795070534e7462486d336a476552374a6b5649304c7377514d6342467770786e366654384b374b4f72504d784e306a36302f344a6c366d386e683378375975576279622b435842505174477777422f77456635466653304e6a3476462f4766626c6452784251415541464142514155414641425141554146414251415541464143447051417441425141554146414251415541464148356d2f74392b4778592f744677586f4a42315053626555636342677a78484f65447769352b76353831583454314d453962486c586866543572532b4c545a624f3342342b62746e466550555a395852566a306e536d445468534d6a4851393677702f4564382f684f6b735643536b594158726e762f414a3631314c33546e66764855614e4c3552394d385a4830712b644744706d7779426c48494f654f525842576b6d644e4e4f4a556d745172453437486976496b7454306f543930725257516b6b35786a36564e6d69334c5130496f6843796e506568376d54314e4b41747874354a373130776b6373346d6862733568414f564a4850666d75744e6e464f4b75537137746a7170374874576c794c4764715578366b46575538672f7a726d724e485253527a326f746c636c766c4f632f586e2f47755735314a486d48694f7964546352714334326b6f4d34372f644f6168794f704c51386d385a517862433178497a494d3456654e34365a2f41667a3936394c44486a59767a5072542f676d664358306e7835646a5930636c7a624c7541473474746b593578374d7466535966592b4e78623152397531316e4146414251415541464142514155414641425141554146414251415541494f6c4143304146414251415541464142514155416647762f42526e774a3975384f65452f474543494a644d76667356784a30506c796b464d2b775a542f3333576331644856687063737a356b3061774a69676b44683145592b6273654d6e2f5076586756456662304863366a54313233436b5a4134364775645055372b68316c6861504f56626b5a5050482b6657756a6d75632f776e57615859715279636364635644314d726d6f746f4647427a394b344b694f716e496139746b444a37347a57466a5a4d61747171746b63487230714756636d4d49366e3871524e7935614746414153507a36315544476f7a594457336b376849434d5a2b6e657652676b3065644b5454494a37794343427074363752317a6a4171755270456530567a6e4c2f5637572f5670495a412b4f4f4f334e636456486653646a43756276644751726367382f6a32726a5a33784f573165325762656a646a2b4e52716d617832506e2f346d49384771536b4e7970774279414634342f4d4531376d4758756378382f6a482b38355437612f344a7236414e5038416864346d3146597a456c3571336c6f705047324f4a52782b4c486e7669766f4d50384a3868692f346839673131484546414251415541464142514155414641425141554146414251415541494f6c414330414641425141554146414251415541655966744a6644392f6958384666464f68514c75764a4c517a326f357a35305a446f426a314b342f47676348797975666e70344a68622f6845744d6c6466336a785962384356372f414572773636315a3976684a38314e476c65362f613641697a584c37537a425655416b6b2b77484e635049323944305855555637785070337873385057555a4678665278376d324464787550636679727668515a35745445774e71332f6148384d573538744c324573656475385948746e4f507972543254526b7171665531744d2b4e326c36764b73634c786e4a7763742f4c497279362f756e6f306254366e59322f695730754555695253635a344e655855714b783378705342396368584944446b635678757362657a6b596d75654b487437526d6a32345872337176617234536c535049664676786f75644975572b7a794f5a56584f41446a2f41442b5853765177384f6671636d496269746a6a442b316e3468676d4e74396a4b534137647754636e582f44362f6e785874517737364d384f6462756a66305434702b4c50455566323078785232685935535351497a4c39434d2f68394b71564f532b797852642b714f6f744e55764e4f75595a4958593230704c4e4753704566505471654f61382b72546c62574a36564763626e5a5765706661494e2b537264436532653965547263395646653475556b6e323577442f41447a54354a535970546a46486d66693734512b4b2f476e69347961546f30386c73496c4975705a45686a4a7952742b6338392b51443136635a72364c44555a716e3779506c6358694b63717675732b34663246764430766837396e2b7757614a3458756236366d32536665474a43687a2b4b4776586f4c6c69664e34703831526e304e5853636f55414641425141554146414251415541464142514155414641425141673655414c514155414641425141554146414251426d367472656e614a4373756f5874745978736342726d565977543954557470446a47552f68522b66477436446266626462757261347462485234645476764c416379757166614a4343514d4448707a52395439752b613537564c472f566f636a57707776696a34567a3674706b5771333056796b414c4244637a4345734d39664a434f6348336b552b77704b68526f39326554577a364d35636c7a69312b413058696152336d3032786c357a357378754378392b5a535079412b6c53385443473054334b464832304f6562334b31392b7a2f70396753707472464376476472726a38642b61354a5a696b2f675236634d7670746273352b58776f5043736d624f534b494539495a57782b705956693675487848385348334e6d306350556f6677356e59654550456d756d2f747259332b79426941386b38572f4339794d4666317161655434544633396c4e70396d61547a4c455956587152545232336972784e636547645453784d304e79306967704d67494834726e2b744e634c4b31355650772f344a7a4c694276616e2b4a7a557576367634696b6e6974517a4a466c5a487a736a41375a787a6e6a736164584b63466c39705645354e2b5a7252782b4a787261673146493839757235594e594556334975564f4d4a476f4a502b3851572f57694e52722b4646523945614f69762b586b6d2f566e6f47673658465062683330793752414d2b64497849503574557a71316e315a554b644a6445647a6f46746f333261627a744d686b534d626e6b4d51646c4871534d6e72584a47745833356e3934353061585a484f616c716d675831334a4659466f5a46344a676e59676638424a782b6c583964725265345277644b6131516e687a784e4c6f7479306b73467665665a35465a6f706f664d576453514e70415a634535786b486a723656374d616c4376686e566c42616236486a56614e656c58564b45337274716464346538583674426f735671756b61666154687379586a376e64386e50544f6662723072352b654f68422f7534487078797964542b4c4d356e347132336a4478356336646f2b6d654b4e51306131756f797a6a54705073355171774a62636d474935417753527856724853634f637a2f73326d717167665147672f4833572f6831706d6836532b7036616b567443734332526a56664e32675a4a4a4f3473546b6b673965316363737a7151736272493656532b2f716656336748786a612b5050444e7072466f4e697a4444786b354b4f4f434b2b6d77316459696d706f2b4d7857486e6861727054364854563148494641425141554146414251415541464142514155414641425141673655414c514155414641425141554146414251422b62583759587879754c443434792b4837697a6e76566a6462613274392b3145586745343979536670587a574d7845766174646a3945796641786547552b3546705268696874345a49314542654f34654871437973472f6d41443631373241784c6e52666f664f5a706856375433657273646434382b492f68323830427a654d397648443878596f65425364546d39302b4d725a4669495335344a4f7834564e38615a64633168394d3849576c7871717247485a59523557426b6a356d59636651444e6333734a66615074634a586c436976615131504f727a343358383274576c7665576469717a496674437952544f625a777a4479327a6a63666c5535475238337361322f732b6e626d75612f326e56576b59455878446655376166547674656b70703830364356425a75574441386e49363179714d6455646b617370726d4f69745a687066677439546d62354934586b646a7874413936364d4575544571665a4d7646766d6f7453386a7a337772384d50465078572b32654e6871576f785149503943743175587a4a74484a7830782b4865764d784f6231497a657030306371704f4b6c5939362b4358694f3038512b466f7450614d7833636b386b4d75376a453671666b786a4f534935443946487258626a35504659656e69492f4d35634b6c684d524f6c4c35486e507871384f33586876785261765a526c586d4f394764437971526a30366e4a36567730616973643957484d376e625165466f376a3452586438747a4872506977726b5757727a73694b705267775241792f4d4d676a3358766d752b6c5868422b2b655669614e6162744138682b4766776c385936394944645258576c574e6d5a4a356236486574784b536743786a6e35686b5a36592b397a565671314b6139784846536f59696e5033325365472f424869794478504f30786b59712f7953794f4249526e6f534f763431354e61564f316a3648447871702b38376e7558687a51723036375a4a636f735447507a4447347a7634494a2f504272616d2b584231505647645258784d506d647871466e35524848413769766d573954333437476539306c6c71576e7a794e73424478427651746739662b413176666b704e6e4c626e72496e2b4d33674c772f343330527275337378625062774f304d3062626d4c716862377839535031727a4f62326c524e614a2f6d657668334b697553627566566e37464e744c6166413354556c5973537759466a6b38787058326d554a72442f4144507a6e69467236374b7837395876487a49554146414251415541464142514155414641425141554146414344705141744142514155414641425141554146414835726674772b42726a5476326f76444f744a43736b4f716f426b6a494749396e353556763072356e4d4b64716a66644836506b566454776e4a325a52314b55575a745a64343252536f355941746a617735774f6f343548666b5633344271466f643159346366427a556e32647970346c384c52616a464c424f4e347a68746f44416b4872577a664a4949577152544f512b48766865773048577269346a5753796d527a68347a734a48706e7069736e557539545255306c61785938626547394576746447727661524e6541687a4e68666e627353414d452b395a566138375767565277744e65394a47484e344631543469367842645863627732454a4265356d797a4d505263394d6a30774b797074323570477371644e4f30544e2b4e756c4455394a306a775870444e62334774336132797245344779325435356e4f4f54774150516c73567654712b7a7054712f4a4746656c375370436a38326652667737384e7765486445734e50746f784662776f73614b42304134723471747a4f706152394c70796536634c342b38424c385076696646713968462f784c50454e7a444945624378323270527372786b6e6a617377556f7a48414754314c415639586c3957394e34616658592b5a78744e793561306434372b68364a347a384136563852394275494a734c67623472674c683432374e7a7a3952586d786d34796c4873656774464758633868663463654a6644636f74324b36765a526e354853586e4765366d6c4b717039547370744c6f6448593374395957725266326265497a414167536f712f7a71497a7431464f5050304c48685453586d316435477477736a48707479667a4a4e457033456f63714f6d5454317576484c6a2b4854624c35696f34456b683447663931656c64386e3750423873767450386a7a462b3878463439454c7175504e59446b4470587a32386a326c70453433786a6f4a3852614c4e597249306274794858714341545858502b457a4b684a4c4551636a412b464e357247706166716d673362506377694d68474a35566743436566624e654c53767a3869506f38576f513561682b6750374c46696244344b6146473358622f4c412f7058364a6c736554447850782f4f5a382b4d6d7a3136765750454367416f414b414367416f414b414367416f414b414367416f4151644b41466f414b414367416f414b414367416f412b6176327a76447356357048684c575447444a59366759672b4f5276586a6e2f674a2f57764c78304f614b5a394c6b6c546c7153683352386d574c6d383064764e506d465a35596e7a33352f774e6554536b3451356c756d665431344c32726a30614e63654b6c697462654855626165526c51524e65774948567344686e41355534774f4d35497a3372324c78784d65654c732b783545597a777375575375756867365a717668656557527072354970437878356974475350583568586e54772b4b543931487078784e435878476f50454867375373544e653273724b63686a38354836484654476a6976744948566f665a5a672b4a506a7a6f7273756d36576c7a716435494d5277326b584c653254674c3957774b37505a71455033736b76784f6453626c2b3767332b425238422b474c363838577a2b4a7464574a4e55654557317261524d57533067344f4d6e377a7351437a5948494148413535616c654530724b30567376315a3230734d3664357a6435502b7249393130464a6c434144493667646858795749665055764539645755445238563650592b4b764474337065735169657a754632734d3459487147556a6b4d43415152794341525856547154696c4b2b714f506b6a50335478654c78643433384353535739785a522b4b37474562553143475479376c304741504f516a617a416457586c7553526b313669784747784c765639796664625035484d3848586f71314a336a32665435693233786c5364664d6b305735556e2f414a5a7875726b6668312f536f654577306e645676775a704370694972576e2b4b4e4744346f7064785968384d33397734364232575050353158314f677436792b356939726948744438556233686e537647486961384e7a5a5738506879334b6e4d306969346c54334134583961364b564c44776675336c2b434f4f74557257355a3258347336496150626546626161335357613575706e38326536755833797974794157503036662f5879655447314a56445443556c4661485058556d574f3776586a772b49395a72517a4c725559394c6961366b2b346835474d35375972304a365532634e4663315a4654774a704d2b6a53333272532f757062674d7346756f3559746b5a5059446d76496f51744c326837754c71716356412b2f506778704a3058345a61446173506d46767650475076456e2b74667047436a7955496f2f4838776e7a346d63764d376b644b375467466f414b414367416f414b414367416f414b414367416f414b41454853674261414367416f414b414367416f414b41504c2f414e6f3377664c34312b452b72576c734362713332336357305a4f35446e6a33786d756176486e7074486f594374374445526d7a344a743159366557387351794e4b7a536851634d2b414366624f4b384a4c335766647a6c656f6a58384f334174726d495363726e6b56687a714c4c6c486e576833722b464e427637595433567062796c786a6379416d7578754b686334317a382f4b655865503758772f34666a32773664626d346b2b564171444e65544b704b6375574a374e47437465524434493845784e63713657306133636f354f41447a6a705774534c736f6f6650466173374c2f684670394a756f316c7847376b415a50307146536d6c715336385a76513953734e4b744e487562474b65654f5643423570513541724774517030616b4f5a6e4a47744f70476649692f346f384b7953795343335a444177796a4b775046466644387a7644596e44346e6c5876376e4d792b454c48543746354a727941536865554a354e6358315a51584e4a6e66384157334f584b6b65582b495041466e714a754c32324377796f35506d4c304a36306f4c6d6a633650626372355374344f31614f316b61336d56444b6a6257794f6c57704f31687a6a7a616e73656b2b4c764a745173515651514267567248467542356454437154314f57385458715864316b384d3376584c557275624f756a5435456374644d57492b74464e6538584e2b364c5a514a6358455353496b69427478522b5163563645316544504f7075303159394e38496547543435385336565a57366f72462f6e4b4c6752494f5366774766784e4c43304856714b4a474e785031656a4b5a396d326c70485a57305676454e7355534246583041474258334b6a797179507a5754636e7a4d733159676f414b414367416f414b414367416f414b414367416f414b41454853674261414367416f414b414367416f414b4147504773696c57415a534d4548754b4150694c34396643533938443631665864705a53506f4e77356c676e69584b52456e6d4e7651676e6a314834313474616a4b44625778396667735a477242526b2f655234716276794a554763494163347278366950707152314f6d617556746e6375546865467a554a36465357703533667876726669337a35766e6a6735436b3546613061566e7a53484b7070796f326465312b333066547062747274724c3750487638414d6a595a4148745851343837324f5a795546717a7a655034355861616a4d74397158323633743554456b69526b4f58786e626a7363642f592b6c4a345631466f7a6e574e684237486f4f6a2f41427474705934794a576d4a48624a492b75656c654c577764575431505570347167316f592b732f7447586c3766773275694e4e4a3834523564704b6a31774f7259414a34346f6f344f616435733571324b705774424558684b51654c39635455746338513669795275564e757431355550422f69555948546e72302f4776526e68314662484844454e7651393467754e4a7539483869326d5157777a48786e74776566582b7463726a396c4851716c7665504566464e68652b412f464b616d5a44643646634d49326c51354e75784f4148396a774d2b2b44564f6a646148565478463947656a5765716c725a5a4933506c7341636735787858424f6b644e797250666d346c44627477365a4a726e3562477947435863765072314e64464c6335717578367838435068627066784b31652f69315a72694f4730675756477470646a4669324f65446b5942347236504359654665366d6649343747564d4d3036653539552b446668706f48674b4e7870466d495a4a42683570474c794d5054636533745875306350546f66416a356d766936754a2f694d3679756b35516f414b414367416f414b414367416f414b414367416f414b4143674242306f415767416f414b414367416f414b414367416f413558346d3647504566674c58645078756161306661503841614179503141724f61356f74477447584a55556a38317456684c4352546e6370794d6574664b314e4766704e435850485170615a6454466a48755944484f617a7364584e64574f6338522b4b2f77446847374f387541724d374d774250667341442b665375326a54637a7a385457564e48445151363134356e565246506368774e77624955634867666e3150745855306f48436e4f6f644e6f2f774531532b6e573665474379594f573253795a424f4e764f4d3536442b6741716c4a726f4a306b33377875572f77423154525a6e7572625834576d6b7948516768546b59774f7550777269713158657a6964564c433959736e672f5a312f7445787250726b4e754f5377676859354a363449494934724347496439496c314d4a70717a7574442b414d4f6b36593974626174436759446377747472735072313434783659474b32626e553152797051703642714867752f77424874597262543549747351494f3179437848494f50584f6566663861346d6e422b2b6436744f5075484133657033326e58326f324f713475394f755947686146312b566b3262534436666e36313077616d6a6e61615a3076776f5337667770505a33786b615378755a62547a4a4f73696f3556572b7241412f6a58425830656836744a33696d62384d425677443047613836534f784d6d43354f33714b30704c336a4b71394436542f4147526f7775702b495343446947454544367458317558395434484e6568394e5637523838464142514155414641425141554146414251415541464142514155414641434470514174414251415541464142514155414641425142484a474a464b734156497751653941483578664637776e4a345038656178706a6f45574f5974474f7852766d556a38434b2b6278644f307a394179367237536b6d636c704e736a467477336574636c744430376e6e507862384f474f6254326a586376326e4c4a6e6a6e4a422b7561394b684c537835574c6865616b59612b4f2f45576a616a425a57666853396c68334b50744675463245452f654a4a7a373161703633754371744b796765322b453963317a554931694b57304d68546366506c4b6e36644f746461563945305a314c77316347623276614e346b7450446f316b7832747a6174626d364267756b596c41755478334f423046633153684b5770644c485534766b4b58682f522f454f73364e61367046505a576476635736584d586e542f4d566464792f4b4f687832726a3968335a76504758664c4344592f536f66474e35613230682f635258454f2b514e77306651686348427a7a2b6c4c5348554a526c5065466a6d452b475878413150574a5a377678585a36667032357352576b4c7953344234795759416365315a5646542b304f6e4b704451307233773162517978513345306c314a46672b624c39353248494a774d64526e41394b3556502b55364772376e56773666466f326b72456f43504b7a53747833596b2f31726c71506d5a3130317971786b5279454f2f774178503944584e554f6c616b79754663487036316442586d59596d566f483066384173664b5a4c76784c4c32574f42543953585038415376713876335a384e6d7530506d6654646579665042514155414641425141554146414251415541464142514155414641425141673655414c51415541464142514155414641425141554146414879782b325434434d6b46683473746f74796f4261586855644231526a2b62445038417569764e786c4c6d6a7a492b68796a45714533546b664c4e70637044507932426b5a7278462f4b6658746b2b74364662363746484b59424b796e49506454782f682b6c6130335979714b2b67787446617974496f6d4f38446b456a70375676476f52593648772b74725073686b55426a675a413663317134715a6f71736f374865572b6e324d5553345062386857546a793753467a4a37784a72577a7349334156465a5634775038394b35374a6645553579596d73367662576342514d69394f4d6a70554f53675a4a546d7a49734c744c316d5a4e32776e72324e6566557175624f705537496c764c4330756268584d616c787a6a47546e4858387331436c5a427973356e5864514832686b774d4b63436b6445546d704a6a47354f3437535079726e6b373647386443654336336e47527a5866683666497559387a457a3533796e315a2b7833626c6244784c4f6675753975672f414f66363139426c33326d66495a78704b4554365272325477416f414b414367416f414b414367416f414b414367416f414b414367416f4151644b41466f414b414367416f414b414367416f414b414367444738556548725478586f476f6152664c76746279466f6e474d6b5a4842487544795063564c6a7a4b7a4b684e776b70492f4e37346a654364512b486e69713830612f5444777564726a3773692f7773443645597277616c486b6d66645962464b7454544d7a524e585a44736b3963636e714b796c543748617033334f676d4b33536b6e356830782f6e363147786f6a687647552b732b4749546636646965416337534d4548363172546c72597a6e462f456a796a5576327150453968632f5a59744b6a63416853785a75766366683631326579552b703573735a4f48324372706e3754336a3378464b4c6532734c53334d68436f56446c6a6e307963567a564b564f4f374c70346d7456305544323334632b48764558697034722f5862795756443877695435526b5978794f765376447131467a637354334b644a786a7a5450614c62547a61774b75776f6737597858505947786b317a4862787953534544355477616c70765152356a7275704a4c4f356a593848424f61315a716a6d626a5665646f66767857744f6c66336d5a5661747664527265476c652b6c4c6677396331314e3870794a585a39666673352b4b4e4d38442f41413575395231562f7374706461306c6d3132334563525a45574d7565796c3243353746786e41795237325852745375664a5a752b664557386a3655427a5871486843304146414251415541464142514155414641425141554146414251415541494f6c414330414641425141554146414251415541464142514155416553664876344b322f785a385068344373477557614d625759394a4f2f6c743745392b7872437254565248626863544b684f2f512f4f7678476b2f68795738687545614765334c5279495279475534782b6465616f32664b66566531556f63794c767770386172347174376d4735777338636a4b4353426c63412f70302f4375657454733944716f56656448724f6e2b48374c554c55777a756e7a396a6a3852554a584e33557365592b4c50325964473169392b3057313038523341454138597a7942536461564d6a32644f6f74546f2f4266375038413458384d2b56356b547a5841555a65527965324f76304a726771315a7a6570325531434339784873656e574f6e36646170484149306a6a47414649774d56794b6c727a436c56624f48386666456254664473416a6166457368324b3447564235725a5537736a6d737279504a2f7744685a6365705433634c334a6372744b2f4e6c584235786e38503171705537425471497764543130794d5157794f335061694e4a76566a6c565357673353726158553767496f4a424e61765451786a65577250567447306b6162594b75503368484a78554d3054506f66786234434b6673572b4a624766354a70744f6c31552b7555784d76342f753146665759536e79556b6a345447566661596c74432f734f6674457038562f414d4f676178644c4a346d30694d516b75666e755946474666334978672f67653962376148484f50326a366a716a494b414367416f414b414367416f414b414367416f414b414367416f4151644b41466f414b414367416f414b414367416f414b414367416f414b41507a6f2f61323846727050784f317434514653365a626b68656e7a41453866584e65645530715750704d4b334f696d6649673161362b4850694f3475466b4b3230687a7549776f79536475656e632f694b7156503269304e4b64615647577578326d6e6674416d31426b38774e6171526c533533484a787548746b39445850374e7852322f5749535a756a396f67744f7a4756566834356a59633550622f41443239363461394b63316578325571314f4c746372366c2b306e457732726370387036426a67644f2f352f72584d734c4f35743962706c4666326b5a5937596235315345767a74625047662f722f7051384c4e4d6a3631546d726e6e586a4c347a542b4b6278496f705767676a4a7a317a676b6450556e63666669756d6a684a4c575278567362435875784974443169665968473553703455486c76632b2b5366797265704745647a476e556d396a762f44756c3357727a713878626b3942307267715655766469656e54704e3679506166435068754f796a58354d4d4f35726e75644c57683744384d5068374c34333854326c6f305a4f6e784d4a62742b77516337667836666a5862686148744a3336486b3433464b6a5473747a317a39736a78584634482f4147647646486c794c464a633236366443682f6a3830684755652f6c2b5966777236754778385a483370585079552b4658785431583461654c7254576449756d744c32316d387848485138387152334248474b796c7564487848366c2f447a397672345a654a724377545839532f34526e553530554d4c794e767337506a6b4c496f49417a2f6578516d594f6d3066526d693631596549644e6876394d767266554c4b5a6430567a6179724a47343951793847714d6a516f414b414367416f414b414367416f414b414367416f414b41454853674261414367416f414b414367416f414b414367416f414b414d2f57645468305853376d396d4f324f474d7566664134464e4b3773422b6476785038414855667843386236314b7a717a787545774f754f522b57526765324b382f4674633673665834436c7930374d3862385665446f4e547435496e517570424242363472436e5674716131614b6c6f65422b492f672f714e764d2f77426975576969336b685175546a3050346a2f4144786a746a57543350496e684a4c5a6e4761686f50694454704247387274456d4147436e475066756638415053746277614f563036715a556b304f396c6944794d5a435143554b4541386b3834507636647678724e7a684570554b6b39626c3230384a36686675724d7857526957354277773434475439656e2f36734a313447304d485565374f78384d66444b653375424d366d575849494a39434f6343754f7069744430714f447471657465466668354f5a456b4b664b447a78586b566178376c48446661505966443368746242452b5435674b3475653536504b6a30447733706b756f583174615730526d755a334352527231646a30466456476d366b2b5648426961697051357048326a384d76417358674c77346c757757532f6c486d584d712f7741542b673968304666585561536f77736a382b784e6431366c7a34652f344b646646754b6134307677505a7a65594c466674313846594565624975496c4936677168592f535156324a6147564e64543836396a6765626e48663961686f324a35645a6137736d733543534d457152314239616978445a314877432f613238652f7338654c6f76374c316952394d6b63656259584a33323034394754312f3268676a73614c4330366e374b66733566745065462f77426f7277304c765370425a617a41674e37704d72356b694a2f69552f784a6e7550787853544d3347783752564542514155414641425141554146414251415541464143447051417441425141554146414251415541464142514257764c7944543761533475706f3761336a425a355a5743716f48636b38415541664a483751482f42534c346666436c4a74503841445569654d4e655849786250693169622f616b2f692b692f6d4b7452754f786b5758786138592b4a7632656250785234737555585650454f2f55726530696a38754f3374534173434b4f2b5269544a354f2f32725a576842794f696a543536716966455068727877362f4751324473536c376253414850526c494948355a4e654e6931616d70483157466e61727948733131414a6472626331354d4a6e725370334d54556441696c6d44474d3765707766382b3964436d7a6e6345633765654334627a3730414a4841794165766568317555587345797648384e37646d416b67424277647834507430726a6e6947625177364e61792b487474764732415a7867636476617556316d622f5630645a706e677543336b563255414c3241484a726e6c557564456153523031727063635941524142394b357457644778646a5276744d467061777664587477346a68743456334f37486f414b3270553554664c4578715659306f6338396a36312b4248775766774862663276726753545835307749312b5a6252442f43443359397a2b48312b76776d46564258653538426d4750654b6e7977324f312b4b507845735068663449316a785071544157756d7747554a6e426c5938496739325968523961394e4938632f466a3478654b72377876346876395a3147557a58312f635064544e7952756335326a304136416467414b30657031705752786476707875624c474166537041784c62544a687170685a434474596a365971624557314f5038553249383347517371506b6338314e6947656a2f4141302b49577365417457744e57305455726a543736486c5a3761556f772f45556d69307a39417667392f77556d763069747262786a595236704541466535746749352b6d4d342b363336566e646963463050755034642f452f773538564e416a3166773571556439624d506d5148456b522f75757655482f4971376d4c566a723659676f414b414367416f414b414367416f4151644b41466f414b414367416f414b414367446d6647507845384e2f44375432766645577332656c5167456a37544d465a386633563673666f4b417366482f786a2f344b63654850433864786265454e4c62555a6c424333643864715a3951673550346b5537463876632f5072343666746c2f455034307a797861727230363663547859577a655641422f75727766787a577168334b2f776e452f41543459336e787a2b4d50686e776c477a37645175674c6d5566387334462b6556767752574939385673315a456e36336648547737456e684f4f7930364a4c65307449566a6768515952496f314b6f712b334a2f4b70717139506c4f764353537158507962385561374a34572b4e4f6933556a4d7132756f65564c6a305937572f51313531654850525a3663616e733854426e326c61596c744932484f51434b2b585450734769526f41385a444c6b477465597835534a62614c4f534275392b617871535a72464430746b596a41397135446f4c384561494146474433724e6c6d6a436f34504a397a575946793074727656623633302f54376437712b75474563554d59797a6b2b6e395432727070555a315879784d6131614647446e4e36483172384576675061664469456170715a532f7744453836596534367062716638416c6e482f414662716670785831654777734b43387a382f7832506e6970572b7965737a79592b6d634e586f49386f2f4f443975333432763431386570344a3032636e527644376272746b62355a377648512b6f5163665574364374566f623031396f2b4d5045436d53526963476b616f6a3069426878514976793662483973696c432f50744f666f614150432f487049385836676e384b4f716a502b364b4763374a64486e654c6f782b6c56596f37485374584d544c3832317657736d69307a316e34582f4776582f687a7138562f6f6d72584f6e58436b664e452f796e324936456578724a6f30306b66653377612f344b47576570706232586a61316a527a6854714e6d4e76347447663648384b4c397a4a302f7743552b77664448697a536647656d52366a6f326f572b7057556742457476494841506f6364443747724d5772473151494b414367416f414b4143674242306f415767416f414b414f5838566645767770344851747233694454744c4947664c754c685249666f6d64782f41554435577a777278332f7755442b475067394a5673337674647546487969336938744750755849492b75326e59705532664a5878642f344b57654d6645596c67384f69447774594e6b44374e2b38755748764b7734502b364256387058496f6e783134352b4e6d742b4b74516d753952314b36767271552f504e637a4752322b704e556b5663387a3148584c692f6b4a64326250766d74456a4d723263456c374b493431334d61315541756671562f7753342b416f384f654639592b497439434465366d5470756e794d764b784b63797576624259415a2f77436d6265744b587845732b7550482f6873366c5a504673444b2f796b487067566d6d61553379732f4762397544775a4a344c2b4b6c2b79715568754d584d54644d48504f50784659746537796e5a566c644b5a394e2f4250784b6e6a503464364c714f647a793279627a6e6e654141333667313868576879546c452b327739543274474d2b3532387471565432724e4d324b48325751795a414a7054614e596c7147786b494847665956797332526553793876357043464876576469726c33524e4e7666456571322b6c614e6150653330783271694470376e3041376d75716a516456325279346976436a486e6d394437482b44767758736668705969346e325875767a722b2f764376334165714a36446a386366685831464444776f4c54632b4278754e6e695a2b5236644933424866475258616a7a54784839716e343552664250346133463941797472756f687254546f54314568484d68486f674f6672743961744b3553567a38735a493558686b6e754a476d755a69306b736a6b6c6d596e4a4a4a376b6b2f6e567336456a6c372b33615362474365616b5a6473624655436b44414641456a7144666763414c476576316f412b635045306e32767848716332515131354b4166594f51503041713063374c5669754f333178566c4776472b4d45486d7332426574723534474142795053733744544e37546458434d764f473944554f4a6f6d65792f4366342f654a766868717364356f57717a5762634230445a5278364d7034492b6f724b78576b747a394376674c2b3350346338667042706e69706f64433164674657367a74747054376b2f6350314a48754b616663786c542f6c50715747644c6d4e5a496d57534e674756314f515165344e61474a4e51415541464142514167365541527953724568647946525153574a77415057674438392f3272662b436b5a30625737727752384970494c7256596d4d6433346b6c565a494c664858796c4f513548544a47505148725473576b664a387637532f6a7777334b366a342f774445476f53584a33584453616a4b466b506f454232717673414256574e624a486e6d762f466d37756d6b4d6372426e2b3949546c6d50756574556b467a674e533857537a4d7a504b586636303069477a6e4c335635626c6a6c7550544e5673426c79544d78783371794778396e5a793330776a6955736535374155306954316a345466446d66786a34763058773559625464366e645232346b626f4378414a5073426b2f6858517663567930667437384c5a76444867335274463844364f57686a3036314676457178345669415378507553474a50636b31684b6c4e4c6e4d75665536362b732f6d645841636263666a332f414b566a7555666d422f77566b2b482f41505a576c614c7238555243655a396d615252786875526e3876316f6c746336656233476a782f39686278583972384f61726f4d6b6d58744a68504547503841413435412b6a416e38612b6278306665356a36724b71764e52354f7839584f774149596356356c6a326f376c63336b556266367348465a4e4738525831714f4a63496d507057664b786c76776c34573176346e613948706d6a77744b784f5a4a574f49345537737837663172736f595a31485a484c6973565477304c79507462345366422f532f68626f3652774b4c6e565a562f30712b623730683942364c3644386574665455614d614d62492b4378654c7159716433736568795362426e76365630574f456f5839394470316e635856314b734e76416a53764935774655444a4a5059415653412f4a54396f763433483437664636363147466e47695767386a54596e3665577656736469783550666b656c64443931574e36614f493142634a6b4435574854307245304d5a724d4e4a6e304f44514a457267527267636355444d795334574e37715a6838714c6b6e32417a514a6e7a4d6861654346796373354c456e755479613157786761396d634b4d55796a546a4a786a504e51774a6c662f38415653734259686e7752556761316a713732324d6e49465130576d64527048695949364d4a436a665869733341305450707a344666746d654a76685530466f313032726149434e326e33543551442f59504a54384f5055476f31516e46535030512b444837512f684c343336594a6446757846714b4c6d66545a32416d6a39782f6548754b744f357a796730657031524155414641434470514238452f3846525032724c6a345765446f50683934647532747462317141793338385459614b304a4b694d4564444951326638415a482b31567064526f2f4b6253726f32466b57646962716337355750556e735077713069694f35316c6a6b5a774d5656696a4e7564515a386a4a2f413159464f53596b6e6e386330453349533558747a3630436248515265615353662f72303075595358633250442b714c70302f32576456574f56766b6c487236482b6c584232646d4778366e384d2f476b7677383861364e3468672f31326d335564306f2f76685343562f455a4834313076596f2f566a775a346a737458545476466567586776645076677433625466374a2b3870783342444b5236676975794c56576e59354775526e305470743744724f6c78336b44376f5835492f6955385a422f482b6c65484a4f452b553645376e79312f7755582b46747a38542f77426d66784644707475626e55745043366843696a4c487933566e4139396d2b6a6536476a386e7632587645456e6737783759584c4d5674376f6d326c394d4e302f55437646784d656448302b58506b73666f4b62704a34565a546e497a58694e6370394b5a6431495133484e51624937723459664176586669565046645341365a6f4962393571457734594138694d6678483942363133554d4c4f712f49386a46356c547736355936732b6764463863654866673750626548394530354a744f6a5547356e42784f386e6432626f543766797236716c6846436e614a385657727a727a3535733972384f2b4a4c4478567063562f70386f6c686b484765437037676a7361796c4277646d6336647a5259626a6b394f6a55686e79522f7755492b4d7838472b414c587756707337523678722b66504b48356f374d4835762b2b79417630445674545832686f2f4f59576868676a6c6a346c694f3466352b6d61316175614c5133686552333168484b702b56686b5a376531633573565a4843486b6339547a5142536d6e34346272774f4b414f623853334452654639646d424b45573877552f52447a2b6c42443250416251453246756659567444345449303752756e4661676a5554706d7357554f333562304653774a464a4247633141574a5935506567437846634647344e466775616c6c7163735a556869516531513061706e6f507739386661763457317931314453373257797634484452545150745a54396636566b3056632f526a3448667434327570325546683437745774376b414c2f616c6f6d55622f665163672b342f4b684d786c543748316834593858364c347a3038587569616c62616e62482b4f42773250596a715078717a4a7078334e79675254314c556266534e50756236386c574331746f6d6d6d6c63345645554573783967415451422f504c2b302f3857627634322f4737582f4531307a6d4f39764865474e7a6e7934462b574a502b416f46483456736b576565764d5749357a576f4665526965314c6372596949495967394456574a474e67594f4f54327045444f44336f494c634557454848577157786f69614b41542f753235336363306570544e46377961326a534270576b436a4735757072522b5a4e7a36382f59562f614f69384a3669766744784e6565586f6d6f7a62744f75706e2b53307547344d5a4a2b366b687837427639346b62305a386d684653504e71666f4e616135346738502b4b744874744c6d574f3275357774306b7946304d592f6b65764e644e536e547151636e755970754c736577337a57757332706a644e6b724b517966776e6a6d764935584532545079672f62462f5a685434492b5078722b67326278654739596c4d30506c72386c72635a4a614c32422b3876546a63503463313574656e5a33506f73445755317939556444344d38574736734949356e792b30636b3961384771725350727162764539332b4176674b443468654e6b462f4835756c32555a755a304a77484934565437456b5a39676132776c4656616d757835325a346834656a376d375074513650357472464771434f33387279343459766c56467830414841474b2b6c58752f43664250337669504366696634433871583762474143707779494f4f766576526f7a766f517a443841654f702f414e2b4a476e44577a7468344d3859395237313056716171496d4e3066544676347830716277764c346761376a54533462647269615a6a3871496f4a5a6a39414458697967347973616e354866474c346a586e786c2b4b4774654b4c7775495a7044485a777566395462716352723763636e314a4e644e7558517449346d37595241674472365546484f4458546f39334b726b4331636b6b6e6f703731456b4e4d6a6d3858327242746a79546530535a2f58705570466335566257377135795972466c55672f4e504a74483656584978584d335570626a55374735735a48746f6f37694d78736b514a624441673435393670553768633874385132432b486456476c6867797245736d6338726b64443730583566644d7874706b734d446d7253413167506b394f4b6d7742775072556c41707831714141793746346f73535269647565652f725142647437706c77516566536c5970473359616863423431524d6b394f4b6d78664f64337051766c69334765534c4979646a4566796f7369726e5761443438317277646551586d6d363165574e314551797a5739773862443851615469677566585867722f6770652b6e2b47724f31385265476a7247717772736c766f4c305143624852696d33672b754f4b7a737a4c6b5063503841676f4e38537050687a2b7a587279323034687664624930714c2b38566b42387a482f4141772f3446567756325a6f2f436d3951796177374d4d6c56796678502f414e61756d32705138706b566f546361305a78696c755663685a4f654d5557416a5a5332654f4b6b6d7767544c6744317852596f76716f414734304d43395a524b354c42634b5057716842377347556275546463746a317869726b77467547663747794a6e644a684678337a576c4a6379495031482f344a382f476a78583431744c627764346f7457314358544c5153573273794e6d55784c68516b7050336d4751413358413579656133714c6b675a50566e32315a535a314b516b5978786d75563741747a4b2b4a2f674454766952344f3150524e53743175626136694b4644314464565a53656a41674548314663306f6332683055366a707a5530666c3134323850582f77713858336d683332364f61316b3271784741362f7773505969766d38525435485a6e337546724b7054553066596e3742477657327479654962646e52722f7741754630422f353567747550356c6630727077466c63386e4f655a3876592b7a6c73695977724f654f6d4b39546d506c547a6a34775351574f6b744245415a704147786e6f423372706f50573457506c7554524c7a574e573247467353767833343966797232497533556876517766326c5048317834412b486366676e546271574b353139674a34527547323351376e4f6338466d43726a6f5158394b3571716a626d653471653538726742454746375678733655595774336d773455344e4341353661314e7a484a4c4d34434b4f4236304e41596356376533557a5232797777784b44756c4364767255753447644e4a633339346c7446504a4b78503369667a704d6b735846785a364f7339354b774e6c5972792b3735705a50623135344643304b5a3567727a3668647a333930643178644f5a47396765672f77412b31536c314a4e53306a2b596531624161574274782b526f41463542486674554d4c69593938564945626e64304248316f415743456e42363041584541516a412f65483771342f553046486465464e435a6c4538363450484a3756444176654966464e726f56734644677959365646797a7a585750694850634d51726e414a36564459726d5950477477523939716d354a2b6e762f41415676313235467634463056572f30566863585a5164337971352f41667a4e64464a47615079346c674c6176646567414839663631304c3469687a516b6a474b307554596a654d413450576d4969644d6a506272696c59704d6a4b3479653951304d5a437536584f44526255433069623243697058764d4458326943314941786b567342686c664d6e3639367a6b434f302b4833686f61333478303243565131764144637968752b4f422b70466457486a646f683748367a6673552b416266526644392f72517431575334784372416337527966312f6c57754b6e396b7953506f614165547145592b3776624a4248343178376f456448417065645267597a6d7564327355664b3337652f774662786c344462786a6f397076317a526b38795a59526b7a3233385978334b2f652b6d36755374536a5568356f395841597030616e4b396d66485037496e784c3133777838584e474f6a5154586c7a4a4a35543273514c47574d2f65556a3078333759466556546a4b453944365045386c616931492f594f383156494c4a5a7348637967374431475258724b4e7a346f38643855687457755a486c334f58504f66537652702b36515a4e70704f6e364c6158476f335246764847685979534843716f4753536651597a2b4662387a65674d2f4f72346d654f7050696638524e5938524574396b6b6c386d795275715736634a78372f65507578724f704b374e594c6c527a7431494959433237486573537a68395a766439786b6e5050537241794c2b366c6b5171574958754251535153336353326f67686c574e572b385231503172506d52517931742f73567673672b613775766c526a315650346d714c416a6a664639774e587531303233596e5437452f7647485353542b6f482b4e536c646b73796c6878786a384258534265746f3976493656414673644f4f6c41437143614146786b5a4651413051353663696977457274396d694445636e37713979665367446f2f422f687158554a786353386a4f5361686c49327647486a43323043796132672b384267316b42346a724f7633577233444f7a4d325432724a7343684462584e79634b6a48365641467a2b774c7a2f414a35754b734437332f344b432f472f54766a4e38563757323053515436526f6354576356774f6b7a6c69586366374f634165777a3372746f514a3250693432344f71366b5350757942655039305676334159324636633067494a4939344a787a5354453056354474474b70736b684934724d7364456f564762337854364161656b32766d4e356a394230707851466e5535416945443078576a417a644a746674643469396561772b4b5148702f6741705961314c4b714d383872704447716735344f636669663556364e48334c73796c726f6674503841416a7761336844345a614a7030783258496756702b2f377875574766624a4834567731716e4e4d5232476f5752573545677734536f693941614c3967642b3139704a3235775057706b425a315377746454302b657a6e5574464c455933526963454559492f4b7356334138692b416e374c4868443447573076396b517264367663466a507164776f4d78556e68462f75714f4f4231376b314b6a4747715231314b38366d37505376456c7774706269425847356a6b2b75427750363163567a4d354469354c4f53396d3433597a3141375632664367506e62397337346c74345638444c3459302b3448396f613254616b4b5275533347504e6267385a47453666784e5771393246775772506979326753434a5642343234786a32726e5a735a75755868574d71507839366c496f344f2b6c4d7335786b6568394b324a4d3937563541532b426b597a7a6b566879397968384e6e442f724a4d694b4d5a636a6a6a302f476b3069554d316e554a4c47782b305943333932504b7459782f79795564783741642f55314a527944327132555168555a41366e315063316f6c796b6c5a5533487078564d4333457546774f337653416d56647550626d67435a492b324b41482b56786e47654b414a306956415834436a6b353755414d30697a4f72587179734d77716349505833714743505672533262544e416b387052356858417765633472466c486c6572654339573851586a4f323556647541353936687134476c70487770744c4d7139322f6d4847646736557246574e30365a6f75695134654f474a52787566412f725663704a5366585044797352396f6734347153726b4c53476537334d53574a7a6b31366b565a4761315a794e777754556456376676686a2f766861796a314a5a5233475638486e33706c443552735155415547504e4e6b445847464a6f73434a664c49685159366e4e5a6c6d725968676d4636644b704d4372716a597776656d42722b447250353562686c3469516e4e5454412b7450324a2f6748642b5076696259367665784f326b614d793363704b2f4b38326378726e362f4d663933337271357556454d2f5733546258374c61787871423871357830782f6e6d764d6b37746b45463471756a5a474378786d7169557874726c4351704f41426a703631556954526767615a3133455a504a4874574637466c30783445684b6a4a474237566e634441754e4c2b32544e4932416e52632b6e7257365a426e363030576b36664b386249434267453942373174443333714450796b2b4d336a3576697038574e5a3167536d5454625a7a5a57474364766c6f546c782f764e75626a3146623148304e594c6c52794e7a4973615a78774f525761476366726c3339346c75636e4171674f5744356b50623171674a47486d5074555a7a7869704b4873734c45704d79783264722b39755a5436676450772f6e55416377392f4c7246342b705470356537354c65452f38736f683048315055314556314a4b4e3432356a6b6a72566756346b7837633041576b5545452f35363041547048757a6a6a48745142616974383867652f537241734332786b3072415a2b724f5a4a5962474d3561626c794f79556d423176686254784755776f4155416344465a54304b527536743476744e4474796b684d68586e616f7241446774522b4d4d6a7a4d6c725946786a4150507236564e79726d4c66654e2f46477353434330743268642b30616e503530584a3148327677763172574a504d31692b654c647a74335a502b46477241622f77714b5a535248656a5a6e6a63765038414f7073466a716f795074527a5873497a2b30634c66334737563953582f7073502f5146724662734c6952484277422b4e4251546e504761534169524e783571726b5747334364715a5a61386b764c46463343444a2b764e53427552517242423077636461305373674f62765a6674463574422b5547735a41657066446277314a724a73624f4643306c334f4d67442b426554567756675032412f5a6238413276676a345761657151376269364c547a4e6a6b6b6e412f5143706b32325a532b49396d4e3573445955396857504b49574569376d564275486270306f61354542744c5a4255554144727963567a63785a4a4647717378787a307157416c357a624d713542595979506568415a7337694e5468416365763656747551664c5037636e7856627752384d5a4e4a7370664c31625853326e3234556a637145447a6e2f424474794f686b55397137616569754e4b37507a39734c6357646d73613846527a55794e536c716478735276616d4277757258426e6b4b67354870564155523871394d2b76355541444d595977796a64504a387359786e6e702b6e577332426a36356365593636504353384d54655a65794135337631564d2b32636e337837316e753741565a506c413975315742516c6a485438614148704563714d55415746682b5849474d30415731697952387646574263696a492b6771674a79466a5175337968655363346f41786644634c616c6433476f4f50396132325049343244676634316e663751493732796c673079454e4f7754324e637a647968747a72336832622f6a34654574302b5a4d3971674c6c6144557644694d42444a616a487048526f46783538513656424954484943636459593866686d674255385272654d46743764796e5465334761436c714b7954357a74323535787a5153593865444f57397139596e7165615353623966315141644a7638413255567972346d426f526a414a36556749325863324256675472435548387a537342566c554e4d46485850537241316263424c32516e424b2f4c2b51715675424e714e313556757878676e6f4b3062304177644e694e7863676a6e4a774b356e724944374f2f5a513844432f315337314a30426873596b746b4a47666e62356d2f4962667a7263443951506878483566672b776a474643726763566a4c637a5a30637651355964665368456d6c6f4d444f7a7a4e6767634373617236466f33534d6a466377434b6f51597a51426e3346386a7953527163374f47774f2b4b306969444776626b594c484f426c6a6e30726f67675079302f616b2b4a662f4330766a5a716a3238752f5239447a707470676b71377154357367354935666341526a4b716c64473268716c6f65587a79346a4f4f434f6e4e4973357656726f6e646730456e4c546a644954796565347167496c54717a4d416967354a5053704170582b7066325a612f62464165366d7a46597774313366337a374471632f537332774d7932745073734151755a474a4c4f37645759386b6e334a7a56705751455532546e7153616b4346596933754b414c4d4e7557626e70307a5451466f5137654430505771416e565354302b6c414671474539716f455a33692b356533307062654e763339303468514472673966307a554e676175675769324d4d4367417247422b6e2f366a55533273434f7275725377316d4835796338384a325030726c4b4d5276414f6a452f4e4c4d7836394d5656674c316a344b3047317869457366566a553241317a6f756d7044386c71696759486171734131354c577a58436f716e483850623071514d2b5856506e4f46326a30785142793044385a505846657569547a4f334a66784c71696b352b66645848744e6b6f3177704364434b4369785a322b547534503146574261754978476e505848616e61774758416f6c763048624e4d44547456445353794875782f6e5453314179396375647a6251616d5441302f426c6a35312f45534f463550303731464e6133412f5262396e4c515939462b48476c4f595435313857765a5379675a336e35662f4142304c57767a49653539766542497a443458735638766b726e74334e5a766367365a375a6f6f41374b415750487457563773446530694c793752546a42626d75576f37794c4c315141795137564a37554163746253735664324f476c5975543745352f6c69757452524234332b31563856572b46587766316a564c4f665a7139356977302f61634d4a704d2f4d4f4479696833394474783372614331412f4c3754345461323649635a50552b394e73324758382b3063634539716b6f356a555a6d334833365671535a54707541474d6e50426f41727a494a706843584563534c356b306a484731527950386169514850517a2f414e7433373669564b77343875316a492b374744312b72486e387155566633674c62723878347a6e7257674444446b35504e41446c6736647169774538554f54774d66685667544a48763638476743534f493548483538304158376533794237346f4135432b6e62562f47757a72447038654144303877386e394d566c75774f7730746971723867503465315a794b52707857322b56585664722b6f505773374162746d6a7175484162413950656f41734245593443714439505966346d67434f36674d735a2b6662786d6744496b73565663376d7a3635785142542b57503564716e2f41486a7a5153637576454a2b6c6575694f703578622f4c3475314944707333666a6b5678532f6941624d584946616f4761646f6f412f7a365655437944555749585065695146445268753142632b3948556c476a45666c6636314b4b4d43375979586d47352b616f71416a742f41734b7648634535427765523944567832412f535077345073734f6e5773524b5178704847716a7376796a2b56624b4b4d54375738486166434c4731584249574d597961343678534e6a5649776f6a786b645035566c545a4a72774462456f485441726d5a5a4c51426e36717858545a694f766c742f4b726a7542684d6f696962614d625634397574645449507a312f774343687669712b752f695a34643043526c4f6d324f6e4338696947655a5a575a575a756565496c7836632b746278324c52387a7a6e62774f6d514b7a4e544b7535574f376e7456496b77723569563364383159464a47496a61582b49412f5367446c74656d662b7762564e78786658477963393255416e483050663272466757725a46433751414146474d5673424956475478514137614d4559375541537878726e70336f4173524b4e763469674279674542696f7a6e306f416c69554c3034352f7051427045434f463255444b71574831724e6765636543535a32314b35666d6153366663333431454e6d423374716f565749344b6e6a4831724a6c4569336373525a6c62427157426f3257707a7a67623242353950725567626144676e766e2f41422f7746424a506366632f4f67444475334f542f6e765155555758356a796143542f2f32513d3d, 0x2f396a2f34414151536b5a4a5267414241514541594142674141442f2f67413751314a4651565250556a6f675a325174616e426c5a7942324d5334774943683163326c755a79424a536b6367536c4246527942324e6a49704c4342786457467361585235494430674f54414b2f39734151774144416749444167494441774d4442414d4442415549425155454241554b427763474341774b4441774c4367734c445134534541304f4551344c437841574542455446425556465177504678675746426753464255552f39734151774544424151464241554a4251554a4641304c44525155464251554642515546425155464251554642515546425155464251554642515546425155464251554642515546425155464251554642515546425155464251552f3841414551674134514573417745524141495241514d5241662f454142384141414546415145424151454241414141414141414141414241674d454251594843416b4b432f2f45414c55514141494241774d4342414d4642515145414141426651454341774145455155534954464242684e525951636963525179675a476843434e4373634556557448774a444e69636f494a4368595847426b614a53596e4b436b714e4455324e7a67354f6b4e4552555a4853456c4b55315256566c64595756706a5a47566d5a326870616e4e3064585a3365486c3667345346686f6549695971536b3553566c7065596d5a71696f36536c7071656f716171797337533174726534756272437738544678736649796372533039545631746659326472683475506b3565626e364f6e7138664c7a39505832392f6a352b762f454142384241414d42415145424151454241514541414141414141414241674d454251594843416b4b432f2f45414c555241414942416751454177514842515145414145436477414241674d52424155684d5159535156454859584554496a4b42434252436b61477877516b6a4d314c7746574a7930516f574a4454684a66455847426b614a69636f4b536f314e6a63344f547044524556475230684a536c4e5556565a5857466c615932526c5a6d646f6157707a6448563264336835656f4b44684957476834694a69704b546c4a57576c35695a6d714b6a704b576d7036697071724b7a744c57327437693575734c44784d584778386a4a79744c54314e585731396a5a32754c6a354f586d352b6a7036764c7a39505832392f6a352b762f61414177444151414345514d52414438412f552b67416f414b41446d67424f614146356f415767416f414b414367416f414b414367417a514155414641426d67416f414b41444e4142514155414761414367424b414367416f414b414367416f414b414367416f414b414367416f414b414367416f414b41467851416c414251415541464142514174414355414641433041464142514155414641425141554146414251415541464142514155414a5141554146414251415541464142514155414641425141554146414251417441435541416f415767424b414367416f414b414367416f414b414367416f415767416f414b414367416f414b414367416f414b414367416f414b41456f415038394b414367416f41503841505367416f414b41442f505367416f414b41442f4144306f414b414367412f7a306f414f39414251415541464142514155414c51415541464142514155414641425141554146414251415541464142514155414641425141554146414251415541464142514155414641425141554146414251415541464142514155414a336f414b414367416f414b4143674261414367416f414b414367416f414b414367416f414b414367416f414b414367416f414b414367416f414b414367416f414b414367416f414b414367416f414b414367416f414b414367424f39414330414a5141554146414251417441425141554146414251415541464142514155414641425141554146414251415541464142514155414641425141554146414251415541464142514155414641425141554146414251416c414251415541482b656c4142514155414c514155414641425141554146414355414641422f6e72514155414641422f6e72514155414641422f6e72514155414641422f6e7251417441425141554146414251415541464142514155414641425141554146414251416c414251415541464142514155414c5141554146414251415541464142514155414641425141554146414251415541464142514155414641425141554146414251415541464142514155414641425141554146414251416e2b656c4142514155414641425141554146414330414641425141554146414251416c4142514166353655414641425141663536554146414251416635365541464142514166353655414c5141554146414251415541464142514155414641425141554146414251416e2b65744142514155414641422f6e705141554146414330414641425141554146414251416c4142514166353630414641425141663536304146414251416635363041464142514166353630414c51415541464142514155414641425141554146414251415541464142514155414a51415541464142514155414641433041464142514155414641425141554146414251415541464142514155414641425141554146414251415541464142514155414641425141554146414251415541464142514155414a2f6e70514155414641425141554146414251417441425141554147514f744143626c396141462f484e414355414641422f6e70514155414641422f6e70514155414641422f6e70514155414842365541482b656c41433041464142514155414641425141554146414251415541464142514155414a2f6e725141706f414b414367416f414b414367425038396141442f505767413644503961414f613863654f6450384661514c7537456b3038726943317337644e3831314d3333593431376b2f6b4143535141545142354e71702b4d66696a56676c7642426f635371736f686975466974346433524a4a69727954754f346a4561447075616744557664652b4d766769796b315056394f384c2b4d4e4d74314c7a326d6752584670657167354a5153794f7372597a3876795a374874536273423248676e34792b4666482b756e536443766d76626f615862367553496d4343336e4c434d37694d5a4f78737231486571743145746a75733570444367416f41503841505767416f414b41442f50576741356f413454783138515a744631473338503642596632333471756f2f4f69736a4a356355454f63476165542b424f4341426c6d494955486e4142353170646a38624e623146372b472f3036774b4d79714e5751706148422f6774596a357058304d6b775939646f7a6967445a50784838632f446e55724350346961666f6c336f6c2f634a614a727668337a596b74707044694d54515373374b6a4e3875384d5143526b444f61563775775775656d615034333058583964316e5272432b53353150526d69532f6752577a6274496d39415352676b727a67453437346f76707a64414e776330774367416f414b414367416f414b414367416f414b414367416f414b414130414641425141554146414251416c414251414e397967447950776f592f476e78303859336c306f4b65464574394b73596d3545636b30496e6e6d4137466c6b6a54506f7039534b467167656836327353715061674368726573325868375372765574527545744c4730696161616556734a4769676b6b2f674b69586d4e4b35386b2f736333326c654278346e3166785271566c6f4637712b6f77615a70397071647848424c7345516e53425178424a48327344614f68347171616168795063565271552b654f78396477616c62334162797034704e726d4d3748427734367239523664614537366f624c426b326a4a474b596867756c5a7975527641795637342b6c41454e317174725a517979334678444246466a664a4c4946564d394d6b394d6b30505152685848784f384d326e6a577a38497a36786152654a4c75497a786163582f654d674763394d416b416b41386b4b534f6c4331567775644f5a414f5352514d782f456e692f5366434f69336d7236766632396870746b753634755a7041466a4839546e67447154774f615051422f68337856706e697a5162505774487649722f533775495451584d4a797271653437396a51394150506632644a4538532b4347385a7a346b3150785063533330306a63736b59646b6969422f756f696741644d6c6a6a4a4e433156785831736572716d335050353044504950327043743538497453304f4968745331795748544c4242393433456b673273503930426e506f454a34785577733668534b66374c396b747a345338512b4c6e4a6135385636376561715a5736744348386d415a394248456848317164665a6f684f363050527258346c2b46377a5139573169323851365a65615670416c2f7443387462704a6f375578676d51534653647055413548583272547a41314e413854615a347030324c554e4a76726655624b515a5765326c4471652b4d6a6f655278316f47616c414251415541464142514155414641425141554146414366353655414b61414367416f414b414367416f415367412f7a306f414f324b4150472f4758686e785a34472b49743334363847616248346874645474347266572f44356d5747655a6f73694f653364766c336854744b73564442527a6d6a5942342f614475334168692b47486a32532f5048325a744d695264336f5a576d38763864324b424e3249762b454f385866467136743566486472426f5068614b515470345773702f506d756d58473337584d41464b67382b556d51654d73324d55726133476e315234625a2f432f7862652b5066695470742f3451767272552f4557756a2b7a4e64756b513666702b6c6834354a4a4662646b5374744b37517553524879414457555733536244794e62777634482b4c5867337848704f703366686c745630727733724771584d7472703139463971317557386b6372636f485a55565555714e6a6b48356d783930567464637147572f4633676a34732b4d6647747844647266324e723473306953473953797654396b30614b4f554649565945487a6e55414631484a6b666e43725130375757346c754d2b476d6d66454834552b4b4c50784a346b384c61373469315057664430476d693130365a4a30744a34473270484d78634b7535634d5a4f6553314356304a757a4d4c78373841766974347131447862623346764264574f757832577433786a76746b63393141376c6450694241327267714e35774345556e6b6e454e572b387536614c75676546766963767871317678744a3850626f707154724a6f554e2f6657797832457632654f336153385a4a4762434c472b7859772f457245344a3431547448516c576372454f7566445034737a3350696653344a645931524e49316d31313631764a7237794531616369323352782f4d416b5337626c696e3351536f35714c376a65356a2b4b76687a38537447384d363334543076772f716d75654a726a784642346d477179624a4e4f6e6279316558356e63425753594d556a49775369646961696e384e696570394266412f7733346f736250532f3753302b6677783465307178466a702b69547a704a637a4e7876754c6b6f57514d63486169737747346b6e50545148755a5768322f692f38415a2f754c33544c4c777a642b4e504155317a4c64574c614d305a314454664d5973304c517946524a4748596c5756736745676a675a4174314e6c766a6a7265734c354767664448786464337a664b7031613369303632513969386a755778363756592b314137324d50785234653172773134563854664572783365323139722b6b6150647a616470396944396830764562483933754161535273414752686e6b6851416563612b6c4a6c51316b6b6556364c34393857337637506d6e2f4448777634483851615034747474416957615855764b685672525655537932376f3769535278755652775153433232743633765463554b6c614c54663961453377612f5a7738537a326669717753357550445877313132613374526f577457494f7153575549624d624f723456583373685a77306855416b3057535246377535312f77782b48766a6634623232742f4433772f34636a385036526336356461682f776c4d453051743073705a4e36704445506e38384b664c77796852744c5a504171555566546365514d59347067506f414b414367416f414b414367416f414b41436742503841505767425451415541464142514155414641436635363041482b657441422f6e7251416635363041482b657441422f6e7255674655416635363041464142514166353630414641445175446d7041642f6e72564146414251416635363041654f6674646d5676326550476b55592f31317173446e305235465669666f4361786c724a4a6a4c66697868622f4733346132747141726944556a4b71397263516f415070763875746572497470453959417742544b466f414b414367416f414b414367416f414b414367416f414b414367414e414251415541464142514155414a514155414641425141554146414251415541482b656c414251415541482b656c414251415541482b656c4142514155415a48697a777659654e504465703648717351754e4f31433365326e69365a566751667835714a4c573448472f44763453336e68585835646331377852642b4c74575731476e326c7a643236512f5a72634863564154377a4d51437a6e6b375254656d6f487058616d67436d4155414641425141554146414251415541464142514155414a2f6e705141706f414b414367416f414b414367424b41442f505367416f414b41442f505367416f414b414367416f414b414367416f414b414367416f414b414367413755414c53656f4254414b414367416f414b414367416f414b414367416f414b41436742503841505767425451415541464142514155414641436635363041482b657441422f6e7251416635363041482b657441422f6e7251415541482b6574414251415541482b6574414251415541482b6574414251415541482b6574414251417441425141554146414251415541464142514155414641425141554146414251414767416f414b414367416f414b41456f414b414367416f414b414367416f414b41442f505367416f414b41442f505367416f414b41442f505367416f414b41442f5053674261414367416f414b414367416f414b414367416f414b414367416f414b41452f7741394b41464e414251415541464142514155414a5141663536554146414251416635365541464142514155414641425141554146414251415541464142514155414641433041464142514155414641425141554146414251415541464142514155414a2f6e725141706f414b414367416f414b41436742503841505767412f7741396141442f4144316f41503841505767412f7741396141442f4144316f414b41442f505767416f414b41442f505767416f414b41442f505767416f414b41442f505767416f415767416f414b414367416f414b414367416f414b414367416f414b414367416f41445141554146414251415541464143554146414251415541464142514155414641422f6e70514155414641422f6e70514155414641422f6e70514155414641422f6e7051417441425141554146414251415541464142514155414641425141554146414366353655414b61414367416f414b414367416f415367412f7a306f414b414367412f7a306f414b414367416f414b414367416f414b414367416f414b414367416f414b41466f414b414367416f414b414367416f414b414367416f414b414367416f41542f505767416f414b41466f414b414367416f414b414367416f414b414367416f414b414367416f414b414367416f414b414367416f414b414367416f415367412f7a316f414b414367412f77413961414367416f4150383961414367416f41503841505767416f414b41442f505767416f415767424b41466f414b414367424b41442f505367416f414b41442f505367416f415767416f414b414367416f414b414367416f414b414367416f414b41456f414b414367416f414b414367416f414b414367416f414b414367416f414b414367416f414b41466f414b414367424b41442f505767416f414b41442f505767416f415767416f414b414367416f414b414367416f414b414367416f414b41456f414b414367416f414b414367416f414b414367416f414b414367416f415038394b414367416f415767416f414b414367416f414b414367416f414b414367416f414b414367416f414b414367416f414b414367416f414b414367424b41442f505767416f414b41442f4144316f414b414367412f7a316f414b414367412f77413961414367416f4150383961414155414c3655414a5141744142514155414e6f414f31414251415541486167416f41587651415541464142336f414b4143674137304146414251416436414367416f414b41447651415541464142336f414b4143674137304146414251416436414367416f4158316f412f2f32513d3d, 'oforo@veritas.edu.ng', '$2y$10$edPrM8ZcqR5xv1wfoAKgo.eKyXAreB3leBtkWoLqsj6wSeMBCKrTG', 1, NULL, '2023-03-22 17:03:50', 'f95sx0ilqo4rRQgKZzn0yJGwzkT3sQOyZsZQfkoRm5iI33haehdbreaVxIJN');
INSERT INTO `staff` (`id`, `first_name`, `surname`, `middle_name`, `maiden_name`, `dob`, `title`, `nationality`, `state`, `lga_name`, `address`, `city`, `religion`, `phone`, `email`, `marital_status`, `gender`, `passport`, `signature`, `username`, `password`, `status`, `created_at`, `updated_at`, `remember_token`) VALUES
(3, 'ICT', 'VERITAS ', 'UNIT', '', '1992-08-24', 'Miss', 'Nigeria', 'Anambra', 'Anaocha', '#16 Bestbrain Close, Bwari Abuja', 'Bwari', 'Catholic', '07081593481', 'darlingtinaoduson@yahoo.com', 'Single', 'Female', 0x2f396a2f34414151536b5a4a5267414241514141415141424141442f2f67413751314a4651565250556a6f675a325174616e426c5a7942324d5334774943683163326c755a79424a536b6367536c4246527942324e6a49704c4342786457467361585235494430674e7a554b2f3973415177414942675948426755494277634843516b49436777554451774c4377775a45684d50464230614878346447687763494351754a7941694c434d63484367334b5377774d5451304e42386e4f5430344d6a77754d7a51792f3973415177454a43516b4d43777759445130594d694563495449794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49792f384141455167416c674357417745694141495241514d5241662f454142384141414546415145424151454241414141414141414141414241674d454251594843416b4b432f2f45414c55514141494241774d4342414d4642515145414141426651454341774145455155534954464242684e525951636963525179675a476843434e4373634556557448774a444e69636f494a4368595847426b614a53596e4b436b714e4455324e7a67354f6b4e4552555a4853456c4b55315256566c64595756706a5a47566d5a326870616e4e3064585a3365486c3667345346686f6549695971536b3553566c7065596d5a71696f36536c7071656f716171797337533174726534756272437738544678736649796372533039545631746659326472683475506b3565626e364f6e7138664c7a39505832392f6a352b762f454142384241414d42415145424151454241514541414141414141414241674d454251594843416b4b432f2f45414c555241414942416751454177514842515145414145436477414241674d52424155684d5159535156454859584554496a4b42434252436b61477877516b6a4d314c7746574a7930516f574a4454684a66455847426b614a69636f4b536f314e6a63344f547044524556475230684a536c4e5556565a5857466c615932526c5a6d646f6157707a6448563264336835656f4b44684957476834694a69704b546c4a57576c35695a6d714b6a704b576d7036697071724b7a744c57327437693575734c44784d584778386a4a79744c54314e585731396a5a32754c6a354f586d352b6a7036764c7a39505832392f6a352b762f61414177444151414345514d5241443841346e7862716d6f433563704a62786d56436b6f744a4749645163596250305057754b383931596c6a6b6e7436566f3678713575645375475573305a59375335797848624a373169354c4776566f552b5743544f52526262624a642b564a4c456e36564365615667564f4b537437467043696e456b4e3135706d6165646f4849353963303175426468766f316856484f3748554d4b6a75626f504a694559587478564939654b6d74544573774d756344706a31705749396e475076476c506443433368326f767a444a34704c57394c427432414d316e5845706c6348743271537a64596d6152786e4841487161584b5a756b75547a4e2b63704e456b68794548385148576f6e55624130556e796b672b6c5266326f7345516a564377417a3034704250384161434a414175305a4941344e53307a6d554a4c3050632f686271317865324d6c76633354536d4a52735268397766346369765252587a723459385544534a3464385739413356574b7430365a4862323971393330545659745674504f69624b4541726b3549423966794e654669364c68506d746f7a31734857556f4b44335271556f70744c584b64593447696b6f7a514174464a6d69674434787542474534553739334c56577a6738566f586d333577785863442f4430724f7236694f78356b486441547a6d6c7a785454526e4655615748385947567761523845344854317052756b504a79636355303866576d49414d564e4461797a4562464a7a563753394b6c76577a742b577533306a514668786c52584c57784561667158474535753054696f664432707a6a354963723136315a68384f3345626753716433706976574c53775544376f725674744868756e415a65656d61356c6a5a6453716d47664c6f7a796c64436e45486e6d4443446a4a344a2f436f48736c38703969676576474b39707564416a6a41493534774e3353764f7464306f3256775732474e546d75696c575539447971394b645057357756784f305372734f4d4e6a3372316e3452367a496c394c5a7a7a2f4a4d6f324b6537442f3631655253726d367559794f2b514458536547373254543952743568316a494a48745634696d7030334531552f5a4f4d3066542b614d31557362706279796875454f5664413261733572357871783761643163646d6c7a5565614d3041535a6f71504e46414878744a4638374135474b726c5347494e646a3468384f485357324f3463446b75434f632f6a58497a6e4c35483431394e536d707136504d6733657a497a3070443170364e74594e674842373073764d7245395363316f5866556a795230717861514736754658726b3079574a456a526c6b334d335541644b733662634e5a334379474d7375656c524f397442717a505139487346676756514237313074744546413472453065654f3674306c6a7a67396a327263446846427277716a626c716572536a4652566a55685a56584846612b6c6b4a4a6e31726a473175797433437a584b4b66544f5457705a654b4e4c3368566c6b5a7638415a53716a546b31735931616b466f32647a4b466b58474d3177486a64764c69654e746a4965506c487a4c5857366671747265414b7368566a30446a4761356e7868434c69326e777557414a794b306f74776d726e4856677077646a784234784c713767486a317253747969546d54667a67697369655551587333636e6a365665737759345977366c58633579337058737659383672463871506f727742666d39384b57704c626a466d4c3841655030785855357269766870624732384a784f3344544f30682f50412f5156325261766d36397661797433505977392f5a527632485a6f33564757464e33316b62574a6431465267305542592b576465765a3779386d624c4e47704b42696177415279482f4d56325069335358734e54615a70593545754d7945496d77416e7267456e485775544d5362674e32302b396653554a4a77566a79563772615a464a47717170527732667a46525a7931537047586c435a414f653571534b336153527775506c725a757975614a324744644a49717247543243714d6d74757a75625a6f776a7068687751616b304334545239514d317a4130317649686a665a6a636d653471617a62536b754a6b65467062636f566a5a492f6e4a374e6b394458504f584e66516d56744c472f6f6430694c356359774d394b3335354359754b345052704a49373552676741347761394c57784d326d655a6a424e656258676f7a50547731533950586f6357326e577a58547a54536b376a6e485446644270693664457732694d65704e5946686151336d766d313147394674457259775467743943654b76654739466b6b3858793238373361774b572f654c4c74574d5a47435365434d666e78577a6932724f57794f50326b5979756f376e6f3863396c396847466a62492b386836566c7a6233744a306337766c4a566a36565373394a767637576c2b7a33454e78616c69706c556243514f684b6a676e334664424c5947477a62662f6435726e6c377274633661647078357257506d32364c66624a4333586363317442704a3743322b544c456e44453834724976322f77434a6c6359366559772f577448545a4a444874646751682b55656e74587476613535566465366e3250567668667156366c36396a4b7a6d487969323039464f51522b68723149793135663447316578737252625a6a69366c664a415535596442586f36746b5a72774d5a2f4662745939444266776c72637362386e725467395677314c76726b4f71785944305641474a6f6f456555654d764231316436314c4a444b4f54776a386e4874586d4f7336645070312f506233525864483930394e77374556395758434a4c45364d4d38644b38442b4c61774458346f6f6f7846736a794432624a2f537656774e6555704b444f4b74536a463879366e6e5259506b6e7236317465476f6b6e6c755932414a414246594a3631702b48726f57757378626a684a663362666a302f5846656c5754644e324a676c64584f7469736b694255714758334653693355495248474539774b306f34317a55736f56496a67444e65507a73394b4e4b46746a46734c4d433951594142617656724f3256744c524d64526d75423079795a727753534563484f4b39467357696c736c69456733455977546a46524f56354435456f3252786c2f3463697670582b5542736e6e765270666842595a41307a767448596d7461316e654f396c676d355a484b3539613334796a4944785237616130544a64436d3753614a744f676a7434566968554b67724d38613633466f33682b346d5a766e326c5548717836566565385742546731354a3855645a4e7a5062575162675a6b596679717145506156456d5457664a4451382b6b69634f4e334c4e7a2b64614e757952624979774c5a33636574514a664f6b41556857794d71534f6e745434595a48764935484141623568672f774171393572513865643276655057764264764b784d39744845366a61766d4f3247584139503172306444685077727a72346458692b5a63577878765a417739654f442f4d563643474146664f597076326a75656c685970556c596e333075384371706c556436686b756665756178304d766565463730566a76636b6e7252526f545a6e6a312f347831752f4c66614e537543702f6856396f2f49635667584d7875422b382b662f653571704c4977596a4e514e4d6339612b6d685369746b65496f79627532517a78424777446d6f4d6b4849504e574a5a4134365643454c6e414754573175683078656d7036466f327066626450696c4a792b4e722f55566f5354664c7961345051745162543777785348393149634832505931316334754a5445626431436b674e6b5a3472793639446c6e35486454726536584c4a70667452614e69426a4a7a3372724e49734a62706674636b307175443871673441726d374e57547a476e686550792b564f30734a50706a7057397074786574634b6d6e78504b784763594f33486f6331684b4230387372616d6c396a32507548584f5366577057757a46786d7334367a635358556b55316d625a6f7a74507a5a425074566165344c746e4e59754454314847664d692f5065426c5a6977414179536531654a613771523166584c6936482b724c62597765796a7058572b4d664551677457307932664d306f2f657350345639507161344f4a515341652f70587034476a79726e5a77346d6f6d37496d6a557a4d49737268636b4556636838794d4b5862495673415936315367627932336a71707a396661726c74716932392b306a52655a625077596e35474b373558746f634d6f75547364353441754e6e69565541412f63506e4866705871443346655636433846764532733662467664515665456e4c4b70362f55566f4e3437327a726b52655554676a424443764c72344f70586e7a51314e61474a703059386b72334f39653434363141307859315369755675496c6c513552686b476e6c363871635846754c335236554a4b53556c7354462f6569713566336f724f785234566363416e484e55306a6b6d6b435271575939414b364a375347535279564c626a6e423756454942627133326643736576466658516737616e6771736c6f69674e4f6a687839706b2b624764712f3431444b364a6c4931326a326f75704a6a4a69555950714b6956642b632f6572614d4c626c704e3679597a4753545857654837373754622b51352f65526a4831466379496d55386a67315a73326b7472704a596d777750352b3154586f65316879395457465651647a30573131473874313246504e583178794b314c585837387035554b434c4a3559446d756573645668654d4354355737316f4c71746e41417a53722b6465444f6e4f4473346e715172786c485357687279426e426552697a6e6b6b39363566584e5a2b79626f4c6337702b68505a6172367634744d716d477979673647516a6e384b3557613541566d7a6b6e7565396130634f322b615a79317352396d6d554c3335726b6b6b733535596e7154554a494242546a412f4f6c52793870627163302b537a6c51416c53632b6c65764344746f637261576a597a7a5145494751654b6c597833434c6b625a42786b64785547336b676a42465357366e7a6c7a3042724f544c5556613573614264586c6c636a795a436d534d6a3148705865583368657931757969757266624265455a4f5075736663567838515352596e417777344f4b362f5272356f5656435356727a366c57555a63304e47615571616d6d70497661514c6e536251576c38684256734268304e62416c56686c534350617443325333314b32454d3444416a672b6c596c2f597a614e644b53533044644739714a51703476796e2b5a7975646242533131702f696930577a52555163454167384769764a63476e5a6e71716161756a7a426c59484331435935416338566f4a486b644b6b386f656c665a52523873366c6a4a65487a5632794a6b56516b73486963442b4676754e372b6872707649444470546b746c4a4d55696771656d6174524b6a696555784c6149545777334c683062613450616d54327251506b44356131587452444d585138353253412f6d702f7a3631616c74684a4741523171724136396e64624d796261366a6a475a47776f475361704e4c4337764e62717754504b6e7437315065324c53576f6c677a74796371527a6b5651744745636f7a794f344e524f6d704b7a4f6d6d6f32636b523345706b66413656464f6633594171573455525844706a6748492b683656464a38793135376a5a324f2b4f79734c614930624a495633416e70562b34767a486346664b4741426e503070756d4247473576344f3152335a2b30543773594a4742586446506c584b7a6c6b314b7061534b73736f6c5976747763315059674d536356464461797a6d5245517379446352337856757a496954707a6e70584c58356d7274473934714e6b61647467594853743230754643674138317a385567626f4b30626249493478586c5646334f7169374c5137665264524b6b5273666f6137574f4748564e506143635a42474b387473324b757241394b377a5264534c4b7135726e6430376f327152556f325a69334e704c70563039764d5355366f33714b4b376a55744c68314b33694c7143516330563165316f565065714c5538785571315033616230504534314248424248745579706d6f3052633578672b6f7130673759334439612b685350426e494569715272634f6d4f683748306f592b574e2f575075665436314d47474b444674376d624c417775673766646b58592f3148656e736d4e724430354870576738617a5237652f5566577175334b4d7036376a2f6a2f4146716b796c4f3555534942355938635038342b7665734456645045442f6149783875666d48396136466e4353776b3932322f6d4b697534773862717779434d557a7070564843535a796b364e504748586c6b47443769716d6369744461595a576a5055477452645830617a7459556b306f58643148454543792f4c4572626d4c4e77666d4a794f7654466566692b6148765256376e75345a71587574324f65746d4d633250377736565a644371712b4f6871473575327664566b753252497a4c4a7532494d4b756577397131444476744839514d31726832334855787844555a45336c6930767265395166493441663647724e397038556e7a6762587a6a634f395232355735307445626e47564e58595738327a554e79792f4b66714b36374b53737a7a4a546c463354315768684b7a57303553547144577a5a584353344765616f36316267776d5144356741632f53736d30756e694f643353764e784f447572785055773249626a7a486f467268694d56306d6d495932552b6c635470743664717354586236644972524b3261384b635846325058684e536a644864576430736c717554794f7446596c6c64424650492f4f696f7359744938736a78785671506969697673456648544c4b4947396a2f4f6f4a453867594833656f4870375555554c637957354e432b534b6a6e77727945656f50365555554c63612b49784e536b5a4652782f4449702f57726478312b74464657646632592f503944423147494268494f7651316c3369417869516452785252574e5658697a30734f335a465a426b5a394b36653347364541394746464659554f70654e325257303179766e5265687a5768433278354232507a555556324934617939356a622f415065577a4c3671522b6c636c6b346f6f71616d7830344c345762746c644e48626734375a72583062567237564e52747450696c38705a5a416d667252525867315971306d64735a4f39726e74646c6f6c727055574a6c3838766a476531464646665038386e7132656d306b7a2f2f5a, 0x2f396a2f34414151536b5a4a5267414241514141415141424141442f2f67413751314a4651565250556a6f675a325174616e426c5a7942324d5334774943683163326c755a79424a536b6367536c4246527942324e6a49704c4342786457467361585235494430674e7a554b2f3973415177414942675948426755494277634843516b49436777554451774c4377775a45684d50464230614878346447687763494351754a7941694c434d63484367334b5377774d5451304e42386e4f5430344d6a77754d7a51792f3973415177454a43516b4d43777759445130594d694563495449794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49794d6a49792f3841414551674153514357417745694141495241514d5241662f454142384141414546415145424151454241414141414141414141414241674d454251594843416b4b432f2f45414c55514141494241774d4342414d4642515145414141426651454341774145455155534954464242684e525951636963525179675a476843434e4373634556557448774a444e69636f494a4368595847426b614a53596e4b436b714e4455324e7a67354f6b4e4552555a4853456c4b55315256566c64595756706a5a47566d5a326870616e4e3064585a3365486c3667345346686f6549695971536b3553566c7065596d5a71696f36536c7071656f716171797337533174726534756272437738544678736649796372533039545631746659326472683475506b3565626e364f6e7138664c7a39505832392f6a352b762f454142384241414d42415145424151454241514541414141414141414241674d454251594843416b4b432f2f45414c555241414942416751454177514842515145414145436477414241674d52424155684d5159535156454859584554496a4b42434252436b61477877516b6a4d314c7746574a7930516f574a4454684a66455847426b614a69636f4b536f314e6a63344f547044524556475230684a536c4e5556565a5857466c615932526c5a6d646f6157707a6448563264336835656f4b44684957476834694a69704b546c4a57576c35695a6d714b6a704b576d7036697071724b7a744c57327437693575734c44784d584778386a4a79744c54314e585731396a5a32754c6a354f586d352b6a7036764c7a39505832392f6a352b762f61414177444151414345514d52414438417a5073326658464c396d77654b326a6159504b3539714261444a2b584f4b3870556a307563787673787a6e6b696e665a39784943394b3231732f51666c54685a3435483871705567356b59695770376a3961634c593844466253325a394f394c4a6272456d35787837302f5a4538364d67577542546c74652f6174654b3345716868794f3153726165783571765a6f6c7a4d6c4c6364685569327a5a3458697464624c4a3663564d746e7a303472534e4d7a6c497868624564653950467152394b3135496b6851764956436a7153614c6449726864385244703249504661657a4d2b5a47594c567364445569326e413647746c62624841465352326e7150794655715a4c6b5a433235485563314e4862483072574671754f42557774666c77522b6c57715a6b325a53577672553678593759466149742b67413471526264754f4f61305543577a4f454236342f53697455573362464656794533527a67746339732f6a532f5a442f414865505374635770343435702f3262417833465965794f766e4d6b57784a35474b5557754479613152616e4f63484f4b6b537a4235497a56716b4a31444c57304234414a466346385564527674473032464c596849707a745a75347231704c5047654f506575442b4d656a666150424c334b6a3572647733345666737443484e6b33684f4e376a77335a764932352f4c2b592b7462795733413478574c384f4d58506779786c427a387544585a4a62676e70554b6d4e7a4d314c586f4174534c615a62424661386473536f78785752727433656161304974624a376e65634848617456545349636a45385a3662396f384c586b617947496c667641394b35373462515332634c36644a4b5a51463371785076585261784e7175706146665179574169587979636b31672f444b5437564f4d48353430614e683944543545513265676932396855693278507455477358386d6b784c4c396d655a5365646e617039483153333153496d4c63727239354847434b705251756251656c75523656494c6642774b752b566c67616647493932774d4e33706e6d6e796b4f5255467438764139716b6a742f6236566f72423630766c446478326f304a624d396264735a464661596948706d6969364671592f324d6a746e307066736d66725779304134474b515777394b584d6a704d6f576e7935323830394c5a522f44576d59423042705667395254356b4a6e4e612f71735769574458446f58626f694b4f5361383738523650347538566546373665367546744c5479793657366a6c674f65613969754e49746279534f53654d4f554f51443071784e5a787a576b7475564152304b2f705135784a31506d6234644478466165464c6e56744d765139766153487a6252786e41485776576642586a7253664673596a674a6a756775586963593548584663563443734830693538612b4835426c6c4c504767376730485378344e305052764563634a6a387375733441775343636330526730506d50594c7139733743324d38383652786873466965395a657550647a78323430793468444f51375a4f63703756354e4a702b74367a716161564c396f6b303756435a45666b68434d592f7254763742385a32383978634a352b644b444a434d6e4571647174524a62523750615062366a5975694f7367775933783634357279767762627034592b4a32713654504b6f57352f655135504766536f4e423066783762514c646157635233626d57534f54676f66542b646456702f67433638514a4c714f76413232716b3457534939506568704c566b2b67377878346a6d307256394a30354e6e6c33636f567965315a6e6a3972757a317253375853626a374e63546e473552393769756b6b2b474e726357704e356553334e32764d637a6e37746135384857393150706c31667947613473507576362f576c7a523769314f5273504565765365486236314d516b3161796c45626b44717037315674394a764c66556d316949616c6458477a4d697378434431774b39517474477337572b754c794b454c4e635938772b745868476f474d44487055757046624279795a7a6569654a6f6459384e79617042627a466f647950446a357479395257787039783975736f726e795869336a4f7878676a36315974374f3374497a4862777047724573516f786b6d70676f41786973334a6442716d2b6f7a5a52556d4b4b69356649673230626157696c637577675848616c785253304259536c6f6f6f476562663257326e2f41426f2b314c476649767255686a6a6a49727564543061783166543273627933575333622b416a69727069527042495555757641624849703961536d3361784b6956626177747257434747474656534a647163644256676f704242414f65744f6f71473278325131555652685641486f42533470614b5157456f78533055444369696967416f6f6f6f414b4b4b4b41456f70615367417061536c6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967442f32513d3d, 'ict@veritas.edu.ng', '$2y$10$yRlgzl.obIeK9YxkZ7g9n.jrzkIE3.Rzh4FkscjkrxO4r8bBvERfe', 1, NULL, '2023-11-01 10:29:33', NULL);
INSERT INTO `staff` (`id`, `first_name`, `surname`, `middle_name`, `maiden_name`, `dob`, `title`, `nationality`, `state`, `lga_name`, `address`, `city`, `religion`, `phone`, `email`, `marital_status`, `gender`, `passport`, `signature`, `username`, `password`, `status`, `created_at`, `updated_at`, `remember_token`) VALUES
(506, 'LAWRENCE', 'CHRISTOPHER', 'OJOR', 'LAMI', '1995-02-05', 'MR', 'Nigeria', 'EDO', 'ESTAKO-EAST', 'NO 12 OGBANNA ABUJA', 'ABUJA', 'Catholic', '08101012201', 'gshockchris@gmail.com', 'Married', 'Male', 0x2f396a2f34414151536b5a4a5267414241514541594142674141442f2f67413751314a4651565250556a6f675a325174616e426c5a7942324d5334774943683163326c755a79424a536b6367536c4246527942324f4441704c4342786457467361585235494430674f54414b2f39734151774144416749444167494441774d4442414d4442415549425155454241554b427763474341774b4441774c4367734c445134534541304f4551344c437841574542455446425556465177504678675746426753464255552f39734151774544424151464241554a4251554a4641304c44525155464251554642515546425155464251554642515546425155464251554642515546425155464251554642515546425155464251554642515546425155464251552f3841414551674252674573417745694141495241514d5241662f454142384141414546415145424151454241414141414141414141414241674d454251594843416b4b432f2f45414c55514141494241774d4342414d4642515145414141426651454341774145455155534954464242684e525951636963525179675a476843434e4373634556557448774a444e69636f494a4368595847426b614a53596e4b436b714e4455324e7a67354f6b4e4552555a4853456c4b55315256566c64595756706a5a47566d5a326870616e4e3064585a3365486c3667345346686f6549695971536b3553566c7065596d5a71696f36536c7071656f716171797337533174726534756272437738544678736649796372533039545631746659326472683475506b3565626e364f6e7138664c7a39505832392f6a352b762f454142384241414d42415145424151454241514541414141414141414241674d454251594843416b4b432f2f45414c555241414942416751454177514842515145414145436477414241674d52424155684d5159535156454859584554496a4b42434252436b61477877516b6a4d314c7746574a7930516f574a4454684a66455847426b614a69636f4b536f314e6a63344f547044524556475230684a536c4e5556565a5857466c615932526c5a6d646f6157707a6448563264336835656f4b44684957476834694a69704b546c4a57576c35695a6d714b6a704b576d7036697071724b7a744c57327437693575734c44784d584778386a4a79744c54314e585731396a5a32754c6a354f586d352b6a7036764c7a39505832392f6a352b762f61414177444151414345514d52414438412b474f2f536c786738696c58306f78383346656765414c6e4a343470777a3170716a723370323348396143626959344e47435454696d303570634367517772536763306f464c7744306f41516a4236306f4178516576464f413961594341663546474454687a696a504f4b6577684150383470667165615565314c6a4a356f534334337653396854674f5251634c6a4a7832357037626a53766f6841516f6f786b394d56473133436f4c42787851747a46366b6363385a7855383856314e6659564f784a74776561436e3456474c7549743937415053704136534943726a423665394e5469396d51365534376f4f673966656b375a705742586a2f3956496331572b786d496570785465516672547359505367636e3370494276576c326e4170514b5564616f5678414f546d6a75616352365a4e4b4635362f6c51413347662f414b394d596b4530396a54443833656751336f66725368526e504e5049794f39497041794d4767414f434b686b2b3663564f34786b3157633767636672514d724f633143777832715351633147656e4e5a4771473470774848544e41483170774742514e733046474d6d6a474b64747750656a474f4f314d686941633034443134704648727761636f7853414d64714d5a47525237556f343630434577507a6f41342f777063644b587254414b43505767436730375741423170514d6d6a3070774242465356734a6a464b7a4b677978774b4a4a42457036452b6d65745a4e78646d344a554d41546a4735733448302f4846524b6f6f4854526f4f70713969334e714955736f345564474a71744a4f386f795756674f4d62683832507a2f794b6a5731664367786d52584f6541654d48676b2b3949337937534343796e6c5759595075542f5375567a3574326574476b7161736b52746342347874444134474e7650616e4632434f7553526b5947655143633865702b744b5969384a5466735a42777a636b2b6f2f58696d434c506d41754372632f4c386f4937382f6c36394b526468437a734d6c647971543135482b6565315252586b7354684654414339656d4f6e35392b31435a487a4c744b6b67342b396e6e6e76362b394d6b42696e51343275447442624f442f536b497652616e4c4355336e7a466270376574614e7664783361426f3255354753416552584b7958514c4f3241536344414a7a79656662386153777551376a59366f6f5033536561306a5563546e7159654d2f4a6e583954526735716c70756f43394449343279723279446b65745867507872756a4a535630654e4f447079355a427a54687853596f46555a696b675566797056362b314733676e4e4d6b59656e49704d5a62696e6e7232704e754b4144746a7253597761646a414872534e53475275636a333961676b6271656c54536a304e56704251786f7279484a714a75446d70577a6e2f436d455a724a6d713046555a4761654267662f4146365256474f324b6c483070694c597a51546d6e5a4e49656c4e335a4941416e6d6c41704f4b63414d64614541597a53675a2b744861674830703767474b42306f396157684c754159397151446d6c36476c7963314c5930414855394b5576356135362b673961636f49394b6f586b755a646f4249322f4c6a6e6e387169556c46584f696a5439704c794970355a7268684647444c634d4d4246366a2f4f61374877333446326d4b3531413770433237796830465465426643365232357535596d562b507638413369657639656c6472466241456e47536539664f59724575376a466e327545776953557049793550434e6e634c7456417159414731526e3631566b2b484e6849636857336e6e6575426a3850787272596b485472327135466173777a6a41727a34317169325a366371464f5736504e7076686644493746486b323579426741666c56476234597a517776684d674b4d635a7836642f61765955734433414a395451396b77544f3035375935726f574a71484f384c535041726e774c64786856525169357a6b444842716d664131342b41375a544f51434f422b46653333316b69352b586a337247755956516e6a413961627856516a36705452356750414143667647793366485373335650416d32507a4c55455372307a30507458714d6f414a3434716a4f71763147507255787845303733435748707457736553526934302b55456a37504e486a43352f725852366665693867444134636665577258696a534e3669346a4731304f572f3268584c6166644e5a5873664f5566673863415a344e653968362f4e71664d343343364e64567364554f6c4c6a6e3270464f65653358696a71654b395a487a596f363045452b314b4161554c6e503555434979744a2b6c50494761593335557745782f38417270445477744e62676d67434f512f4c5657516e6e4e574a47394f667256575135353643704c52455344786e3861614d415572653943674d66657332586365414b6c415071615967794b6b414f4b74495261413470534d64714d3855446e726b314f3478414b58464c696c555651684150576a476158426f48587652594149356f493655704f4d5543705949427a31785368514f3942484e4b4b6b597965514a41357946794d445072552f686e526a7146307534664b434351784850346a2b565a2b705365573049326c383549394f316474344a74664b324f77413344634632344750793961382f46564f564f7839426c314c6d7466716476623271775779526f4d4b6f774b6e6a5463514f31476430492b745332674f396653766c374f543150744c704c5130374853764e414f44375972704c4c52436f4752672f586d6f4e4a554652314f654b362b77746c4b35783734486575366e545279564b6a4d5561494e756476747a3071746336546854386f4a7877414f4350386975796b74464335497a3645444e5a312f42747a304f65764853756830306a4256477a7a66564e4d777a44702f504663746657596a44484f4258663634764232726a6b3966722f415071726a645542524344776670584e4f434e34794f55765235525057737153584a4e6147704d427a307a574c4932447857484b4f556953654e62694a6c4942794b3879385157503253396b514b646a746e6a47422b64656c704b4174635a347752486c6b596b634c7a33466465476b34797363474a6970527554364c644e63366645354f5342744f666172366b382f30726e50426a73305677684f5655673130684733766976716162356f4a6e773165504a556b6854394b54504e4c6e314a6f492f5774546e47747966616a627a53394d38556f7752544159654f5231706a6b453578697043447a55556e484e494343593435375655664f4f6c575859456338436f4848754b6b744565636e6d6c6a484e4147443961656e583271644368386657704d666a2b4e49414d656c4f48796a465553574478514b64775230704d666961534b45366e2b744f5872515267696764656c4d425350536a627a53352b576767696f665942425364654b55696c426f737745782b4e4b4d55415a504a7079352b6c477747647161733178626f462b556e6b354742794f7465682b4770646952717847344b426a4e656536756f45734c664d4479464b38383132506869646e69684f636b44722f41452f4c46654e6a5436764c48377150516f6d3352394f6173574f444b446e7636316e326a2f75514d38665372396e78497042436b393638524c552b6b766f646c70524337546e67653361757a3079554b677a7a675a362f3072694e486d5673633867675a4136487430726f4675475741484a49486f6344382f36563277646a6d6d726e574e6552676853796b48482b46593272796f5a583276314751426a2b6561774a74564a34446a484a79426766687a6a4e565a74536b5a5364784948414a36662f41462b61707a4a564d6731613441686362786b67594135507566384150705841617a4e6c6e334d4f436552394b366a5548336f515154317a6e6b48722f7744712f43755731477a5a697a4653446e394b7763726d79566a6b62386e4a7a6e366d736d51382f57743639737943637166624e5956776869624a794d5646695a454a6c326a384b355478476378796664487458537a76756a5941485076584b2b4a66334d49664f53654f6131702f45636456364650775570433358544734443372712b334e6376344a6a4b3239772f5253777858554167644b2b6f6f2f416a346e46613170434870363064736471646a493535706474644279434144486f4b556a6e6a70514d3550616c5048616752473477656c563544557231424a776151794a77434432714268553735795278554c4c556c6f597657704658766e6d6d71755469706c546a316f4b7550555948576e44413630314f744b365a62675545584c48464c2b74494f65314b464872514d4f394335393647427a5367656c41436b632b314b4d6b59782b4e4976576e64423730414e3235356f78376330345a364564614f6d614243625166616851667254774e7778526a4641376c48566f393175726c647752756c6448344a526d7463592b36514d35702b6e6548593952387147613767686d75415446464b77426238367a39427548385061314a7074346e6c6779374659446774365a727873584b4e533669396a366641526e525363315a4d394874706a3565425737704e7235345274324642357a584d4a4b59314c4b514344783371337039383830777a644b7167345a5279632b67782b48556976465375374830726c5a4872326836445a6d4c4b7a493234646d4761324a4e4c7434596d4c79723876516273482b6465433676713661626c6f32764a6c586765564971442f766e61656e343179563734356d5a77665076506c50334c695850345a78302f413132526a706f7a6c6c55643955665244434f636b524835446e3569633535362f774366536f4a625065636e4a354948504f61386d384c66454b4d787062355a626a47464235336575507a2b764e644a66654f786252465a35526241644e2b46503441317a5362767364554c4f4e376e567670473845453458715342565337306d41495358514539736a69754275766952484f7745647770556a2f5746766c48484f542f414956784775664551504a4973486d584c59783530375978394642342b684c4436644b75454f637971564f51394d314b4b7743486463784c36674f50382f38413671344c56307458637246634a6b48755230396134693631796536516965574b4a5736736f436b2f393834714e4a7261584b4736594b6546644833456655487150706974585353366e503764766f62624c74456d53447436383179766a5a676c7568505574386f396130596a654a4962614b497a796b34474477666348303735394b775045467663587169356d4945635a43424f324d636d6c434e70585a6a556c64575272654659466930744147566e59376d326e4f50725733676345666e58422b4839556b6831574b33696a43573333656e4a3472766c2b5556394468366e504733592b547874463070387a6437696a705454536b3835365a707655384446645a35346f4a394f6155746a3378523270474978376967524337666e566479633976787165527364367253594f636d707556596a4a373578545175652f464f5535366a464974496f55446d70514d6a41344e4d412b626a494e534159373041494678366b314933427041536165704f4f744d524b426d6c787a6a336f786e36557167476b416848536c5841576c32385535564146414146704e75633971503476536e592f4b6d495a7a7853675a48576c343639364d413966317044416466576e5268586c5253634b534d6d6c414766576772672b3948514539546648684b7a6d3854335770584b62624e4a504b68444d54674b71386a303630314262617063337171776c686b634b70556b6c6344673550636574645a6f396f6c2f6f55426467444a61534f47596362312b552f6f7463586f534c464c4e476f77336d626d4937357235687078636a3941764763494e624d6c4f707a61616774723231765a30546a375a6170356d376e6a494a4850727961624e6f7575513230623665736b3844446475556f72766e6b6e6b6e6e76307270424235714b7654766b567565474e416c31437a2b7978584d6b4e7862346a4b4d6f646475506c4f4f7649353639636a7457616b75786f6f5061353578635732713245554a754e4d75626753717864534a586b5448544b686c484f657653735344517454314c533574526b6b6974646b6d77577a584732516a476368584a7a587670384a65494c5a5169583863536e75564b6a2f414c353571753367304a4a356c39645064545a2b374445497754376e6b2f6c69746c565356724745714d6d3947654c32476a61684c6f39314c48635332736274484337626967624d696a4237454850307271644f2b453831376f56314d4a516b74736472716b66414f4f682f4f75323148534a396475497445744c614b4b4d3762696373782b5651666c7a376c75526e2b36613947307a5352346438495432754d7649506e62504a3936777156457454717055577a342b75504431397037334a614e7563717241594441455a2f496c667a7258384b664436353165777562746e6d5338455965336957466a75625033533233433541366a31484e64353469384f584538386a5249504c5351542b57654e784855443349396534465161636c746332364c6258426a6b593945664744376a314876565172704a4d35366d47664d306366662b474e614f704354554a567337594a786277336d344134342b387a4872796135302b4635477543546352534e6e676f765035385636664e344c6c7670444a4c6458456d6535624a71653238475764684538306d594945775875482b592f5251657248427742395467416b4e31755a3645724438713150504e56304f4f4674506b6552336b6967584b68766c33626d50492b6d4b782f454468644b6b4141786c6341384375703136362b31337373697035614534564163375641776f7a337741426e7658482b4a5a41746756376c68696e4675556b524e63714b326b3236793345456d7a61374c75774f4d59727338594146637a34657a504d72343271694256397965702f6e585474794f425874594f4e6c4a6e7a325a797534495167636672534263645254733859365533504f6356364a3467685035436f354438744f632b6c517533464145556a643669626b3548656e4d636e427a696d6e72362b394965776d33337a3655685070537541546a5035554263556833484c7952556754504e496c53414530784341636355486967354842705267646a2b4649436363436e5948536b5435752f464f55635544416a67553448314e4e4f615430785149666e4248464744394b41744b526b38554347676e464f37556736306f47426967594467347a536b644f314e50427a516554365557456435344f315a4c765135394d6c4f7961416d57467334345055666e69756368645964626b695669366f6f47346443636b316d3231354e59796957427973673645642f616f644e76336e3147526e6b42597277543635466554694b504b3553577a50703846695655684744336a2b52364e7037493869664d4176657654624f5054344e4a6775374f55516172434d4c49526c53503772722f4570352f6f5161385730362b4f4679634876375630326e58374b4f5363647836313431724d2b6b545469647a71667859744934514e5774703747534d66367943507a5953665849496238435078726a6a38514c6258395368677350746b6b557375433830586b514a6e717877785a2f706c4f65755255347442716b49686c4f557a6b6c756343757930587764595236624b76377373363447356341442f4144333756705a574a355866794f67304c773761574e6c3971676b57587a483379797577337532414d6e3034786744414177414269756e45476e336469593533432b684e664d47722f77444355366271556c74702b734a4a43474945544c7659416576497a5333767846317a773743467641306749346d6842495034444f4b353555366a5637584f315671653278364a3471736f556d4369514b724e79665556354a3851594959645a736e307078446475534a575447474148556a706e6a72584936393853646531325a2f7336744247502b576b765839656c5666446b476f582b707063336c7a356a4c3042703036557165724d4b6c61465638695236623464315457356f664b6135746f77713438786f64782f55342f4d557a784b5a6953626e554a6231686e47634b713979465563416577347162614c4f7a4d6b5a446c523879392f72584a6174716a5844486b6b6539614e6332786d6d6f626d5a667941736563317948695752584b7835362f6c6d74725572345271636e673179326f792b613664474f63415a373130306f575a3574616568302f686130614f7a57566c4b3768786e2b677264786971756c786c62434863636e614f4d3571333149373139445367716362492b5078465756576f32787048464d4c46525578774d2b3151766a484662484d51733535714b512f4c556a6a4e51503177615144436155487467304b5058705177493655466244647566384b65454a787853726b66583170795a4a3630417856544874542b527a6d6d347054387441674a2f4f6d6b2b357052696d736f5939542b464943316a6b592f6c54686e6b63306f484a464866316f415134783630716a497077556b635567347a326f4158726a2f4141707741394b544f4b58655650484e41684d3450536c366b385533427a6b306f7a54414d5a4e4b56394f6151636d6e642f365577446143762f31367a504d6144564e3447336b44647541362f553446616c5a4776776b6d43645238366b4439662f31317a316f33677a75776b2b5370366e54576b35696443546a4a77537034363130316c4f5167494a77665469764e724456544d794679493359344148355a782b4664353464756c76725a426e6b453866725867314948324647706374617a346f5852725559594c49666d782f6e36667257373461386333467a70596537755567562b426e3737593739613466785834556c317552416b72496d34627348484657644f2b446c395a3668597969386539307649387933633459446a706a7232347063713555726d69632b6475317a302f544c2f414d4c504c396f754a326c756932346c434535783944556572335068432b6b615357356b6a67424a38734a6e4a2f32534f50355664384d66447677624e44432b70366664325a2b7a79426f7a4338684442734c6e7939334a48503071787276674c34644a64364c5a576958546d516f313149495a6773616253546e50664f4f46422f4371354e4c58467a7a5431672f75504939657576437169534f434479343835425a2f6d50755232726c7276577446556732784d446f4d4267636b313639346738412b45347062695051744d753951566b58624b59476a544f546b62704e75654d644d31354a34312b476f6d6e6535754a4937614c65646b635279534f414d6e73654f67704f4564327754714e615173764d79597647647a3568565a466d6a794f65636e3278576849752b326135595956756561753644384f62613269682b544a42445a62715439616234346c6730717a4676476345446e6e2b583531646b394559617875327a67623663334e79634571696e6b347176613268764e5167535067635a7a2b427a396163354563444538687572416a2f4a394b30504239724a505038416247343267714d6a6a385038397a585653686470486d3469707978624f746a6a4d6361726e4a4178533578546a7a5341396331374a38754e4f61686b50722b56544d514f764e565a48394f6c41445766696f584f6165467a327072436b4d51636b636330346a4849357064754f6c4f4b344f44514248747a67306f427a5473556e51307843673863696e44474b5a336f7a7837556d4d556e48656d4667443937487361475076696d486b39534b513061523470324d644b62313450656a47473470694642774f34394b5563436a4858756151644b5943675a70534b544f5236554d2b665530434449503070514f6c4a3150496f44633067486344417051636e696d376853377367557748386b564665326f753756347a6b5a4855564a6e4e4b387178497a75634b4f707050564652625454527844504e5a796d4972736549395430504f4b366a777672333253366a586467456339665564507257664e70467a346853397649496954416f59376634526e412f4d6b566b51536d4b64493432777934504935794d63662f717279616b46646f2b6f70796c464a732b67644f6c6a76346b6d6a594e3637543072736253566d7468734f79566568782f503172782f774e346865327646686e58616a59415850516e6f6554303976543656375462514959566b5444526e6f514b345a77636444317156546d31524e70587849667778495466576b56776d4342356f2b5838365a4c38657444627a5a4a494c644a446e43704d4e6f4e4e7574416a31434d2b34394b35445566686c43574a574c6363386b6f44554c6178336533714a3354472b4e2f6a704871304b51365a62515237526a4d49334d6672584161663841612f45476f4335765353696e496a7a3339613743342b483678526b374477636745644f6c574e4f385069306a4c734146515a50306f3075597a6e4f66784d7a4e5676563062545a4a6e495679446a50622f774376586976695856477674514d6a4d5344775636397137763467363268646f773555446b465467635a347a2b503631356671786352434e58565156787433647a672f5375754330757a79617337766c525465475337755937634d695a494266504142376e6d76517243305454724f4f336a36494d4534366d75447464496c6e306d53574a6b585a4a48764d6a594242794f7039385666737646563370662b6a3345506e694c355747634f6f2f72585251717754647a7a635868366c534b6366754f32445a50576c7a78575a706d765765724c6d4355462b3862634d5077712b447a6a5046656f6d6e716a775a5263585a6f4a4d633831585a4d6e6a6b564d526e3655304c7a51535268546a416f5a5151506170434d436d486e7451416d3370336f497966616a5072526e3844544161527a5363554d6344725451773763554144486e30704f6f3470447542794b5466327a6a4e534d51383839615165344a6f2b38657634306f516d6b4f78705a79615138647166696a484e574951446967643655436b43393642433067487a5a70635978696c366d674275536565744148353037474f63554138394d5541415767436a484e547a78725a4b766e41764d334b32366e6e2f675237665472394f744b3570436e4b6f3752517856586775776a544f43787a2f6b31523130494c7957433375467562614e734c4b716c524a373450503531504c484c4b70655167766a6f5075715051564c6f33686537316e7a5a414667736f76384158586b2f797852443350632b77354e53376e72306350476c377a3350517632662f44555069646645656b7946564e355962456b5052584435516e32334b7465622b492f43736c6e667a6272637063516b787572484255676b45666e6a387139312f5a33757443683859505a365a4664435132626f62696478693477366e495448793954786b3864613776347a2f426d58784f4831725234314f704266394967504175414277792f3765507a2b76587a363058666d6a7564394f53753479325a3867326372326b59324f456e554568534d444a344f5366723072314477483852743071575632564b46536f7878744941787a5846366834664e7465535253776d4356572f654a4970566c4950636461353433686975575a5274596b354448767a7a6e6a5062386a574e6c5552726430706148303962654b4c4f32655243374d5143515577526a492f787a6d6f35764639754d677946786e675a4874587a3142723931636f736253737a49776a5573324f654d67443634483035714f4c7865365768547a514d506e35754378786a6a31504f632f57732f5a4e472f7742597565326137343267614b56597952496e4a7867635a376657754638522f45534b53476133686c324d654d446e6e7165667837656c6565613972676a75486a63694b5579626544754b2f584236413154744c5761654a5a376c754663346a6b48556b394f76512f38417370396170556b6a4b646554566b5333556b4c32625358436961567564374e74474f684836477563314f475064764a556c6a6c75635950506238756176366e716775556b53516766764f515267456b5a36354f4f352f45317565436668394c715677742f714b6c5963686b6859632f6a537153555659696e46746b4a304a3762345a6172645367787450355a6a556a6b4b726a422f4775506831706b52456d74344c744141415a567777486f474242723254346d524c6265444c714d414b4743496f4851664d4b384d32394d38566c526a644e7332714f7a535262756d736c5a5a374d584674635a423273775944364d4d48394b364c5376467252787174346863446a7a55362f694b355246336b6630713761676a4b386531656a5462577a4f43725468552b4a486f4546396258534b3055794d47366338314978433936347933676d694a614754595431485548366a6f61324c535759774d37373764554944534653384f543042377230507239425854375272346b6562504266794d316a4a6e6b6d6f2f4e353436553754374b3975376435357266374e5a7168663759376a7957412f756e7566595a4e55344c2b316e62355a6747394734503631616b6e7363637146534f364c652f4a396151766e7653684351534453464d41565a694d5a7364545362756550316f6345734b414d3839365130414a36352f436d354444705475445146507453416176795a4971515a2f796161427a37552f38414f6d426f34774b55644d5a2f536a7451507269714a4467662f5770505963557665674476316f414f683961555948504270475949506d49412b746275692b45722f774152515148536d74372b366c6b38735755636f5763483132746a4939786d6c6449306a546e503455596f414937302b31744a727a6530534178702f724a58626248482f764e304830366e745776507074686f4c5048714c692f766b4f445a57373469526765524a4950766652502b2b717a723355726e566e5247325257735a2b533368514a476e3055642f63386e75545271396a75705958724d595a343764677473544c4b4f74777777422f754c322f336a7a37436f345657475a5a575579664d44676e727a2f77447271614b485952775236566f6549644b5852354c5333646d467930437a53722f7a7a332f4d712f5862744a2f33736471646b6a30597052566b626c393437307554664976684c532f7444632b5a4a4a4e494d2b70557667317957742b4a4c2f583355584d6f5747502f4146647445676a696a2f335548412f6e56615a384b6544555546715a6e41414f65357157696b6b6a7476672f72482f4350654e3947757932794958486c53735467424847302f7a7a58336261494c6d31586a35756e46666e6c4368672b56435678794458336c384b50454938522b454e4c766d2b597a514958506f3447472f554773716973524c633576346c66435853664755447663577970654159467767327550784839612b55504833776a31487731504b78744875375444424a34304f56505537674f6e73612f514f2b73316c6849376e74586e76697277344a6f6e41514d57794370475152584c4b4365714c6a4e72512f50786f575464475a416f433552782f44366748382b6e65733639752f4b4d6149416b53446274484942794d6335363965612b6d5048587764303638696135685a644a6e5135452f473350594d4f6835373961384638522f436e784a62584c787777785879376d627a4c575264726667634831726e637052304f694b6a49354552744d4a5a7a746b444d4357376a6739543963666d42546f4c756255763945746f58754a4758614536716d426a646e734d31763658384939666e6d32337a725a57716a4c4173486366374948762b566478702f686933304f33454e7644733953772b596e314a3961776e5735646a6146464e366e4b2b466641304e6c494c693749754c6a6737534d71683968362b39656c57567274692b586a3046553747774734664c697436435079346d5938414375614b6c4a336b62536169724938752b4c313666735672596738795362322b67482f414f71764a4a4979474949776139422b4a732f326a586f317a397843783539542f77445746636b6251547267384e3142723134553751534f467975376d5844482b3941366668577870734544586341754352427641637231436e676b6539554a6252375a3133416a6e72366972666e4a62524d386a694e52314a72574b746f795762756f3650506f656f7a325677414869624752305a547947487352673131487738614b54566e3075354f4c5056496a61754432592f6362366873666e584d33586956764645576e532f5a6e694e7462433265647a7a4e744a326b443248465864506b6547614f534d375a45594d7039434f63317448336b5a765966726b2b6f32393339687657456932576263327a6f42486854676a614d632b2f583371434c7737707573416d787530734c6b2f38414c70664e685366396958702b44592b7072756669687036584f70326574517269445672564c6e4137506a61342f416a39613446725a6b66494278527939527033516c3934663172773241626d316e74347a79724f75364e766f33495034476f6f74584a2b57644e683956354662326a2b497453305a57537a7535496f3347476862356f322b716e4b6e3852564c56646d707a65593174426279667847336a32426a3637527750774170705336474d364d4b6e78496853565a666d6a634d50616e675a35724e61796149376c50547069707257346c4c4f4a446c45584a4a37476e667563557347302f645a634f61467a6971316e64433969334b4d4d43564971774479526a3871704f36756a676c46776b34736136536e6c485663646479357a2b6f706f69754f38306634526e2f77434b7162474f4f6c4f435a485555374533614e4c714b51556f3546616b4676623275687a58636b516e755a5a504b7431596b4b6f5541757877526b2f4d6f48627236557936644e314a63714d6c6e43666559436d4c4a3576335467657046553764576d7875475850586e69765248736f50436e7737686d6b68696c3158573359787336416d433358676c665173334766515572746e70777773496179315a774630327a376f7978377431712f706c356557316e4a436b70686a6d4f5a416e444f5052694f535062703756566974695a6437566f7878636a41347071506337744e694c6152776f2f7256694733774d342b74537062394d676e4874566c5642484a347252495255664b4c7832717672466c346776394c3166784d397a39766a686b6956316d58444f7a6359795051415663752f6c5134364469746554784862522b41596441676963334531346275356c504334433756516576726e36564d3164453639446766442b6f584774795a6578653152636a633741676e304664614c614f33682b54424a484a7172416978785a56646f36565a55744b69714d6e6e417052566c71614d68544a6b795057767172396c625866746668613530356a6c7253344948734735727737532f6832624b7854552f4531794e443035686d4f4a686d356e396b54715071656e706976527667463477306144346974702b6d61612b6e61646451474e6e6c6d4c764932346258596441636e474236314654566147556d665636326e6e4a6a72364773665862653373374b34757279564c65326851764a4a49634b6f48556b313056704738614648507a64712b54663274766a39445a617750426d6e6862694b48353734712b41306e56554f4f6f48556a364375533632596b72757835313852766958503841454878464b39685935384e615a494745557378694e317a674f5171733243666267633864613444577669586636684f4c4536696444534d4462466167434831494471534778396570475477616b307253354e516c6a625559343765427a355a6c6b6c774e78556b45734e32526b66727a696f66464f72576261496e326c5264586266493679495562474d4267362f65474d41413950777a585371564e51764a57666e312b5768756d3436484b6d37385279337432382b6f72444c6234654a373251706b66776c54794d34375a347230377752346750693353347864424974536a514752455045696e6f34396a33486176436e6c382b396147376e6c4674493234356b4a473441685363357a6a702f55567257657072346338545731787056764c62756e2b72426e334b344f4f7648513867313548493276655833645058727164616b72585239475161566a42787855576f782b54455555456c754d43722f6862576f6645656c525830612b57534d535248724733636634476f4e554c784b30696f4a5a32506c7778394e7a45642f59446b2b774e58546871597a6e6f6650586a4a2f4f3854583537492f6c6a2f6749412f6e6d73324f4c616d51446b31324465464c5478504c4a4e704f724a5065794d586b744c776555374d6554745051383572483144514c2f5258386d39744a6264383865597541666f656872305559706d504c614e64577855484737703377617a4950446a4e636953396c61346454777034556668585457715964633844366436764c456a784d724b47334863443371755250554c6d62464546776f4746484830712f416744447457334234514d76684f3631704a734a426372622b55563562497a77666230724a685548424743434f746170496d397a305079313176345368385a754e4776646f396f70522f38582f4b75456541503147416653752b2b46672f744b323852364b6554653663377872367952345a66356d754b4b596273505165744e614d6c62744765625861636e6e6e7453655753755277425769564250536f2f4a556e474b4c4647624e455344783072536830473031547770635432636b6f314b327a4c63323867473134733433706a6e35654d672b75653156626853716e706e4664525965444e65384f58466a66795277575152417a7858633670765268387973756334494a474436316e4d447a6a53683556784f693844414f4b303179546a765271506875397350463135396b4554366544386b727a4b464d5a35586b6e72676970414147494f4d6a754f6c5a30704a72513872475163616e4d2b6f67586e6b30384b5037784649534e33624e4842366e466248436b614f5436564f626c6e69746f5439315559726e2f666250394b667074714c362f74375a6e38745a58436c695277436665756e31483466613565334d5273644a5272654a646b597472684a6d32354a7935427a6b6b6b6b3441394b48756568673436755279656e616139357155554d497a4a4b3452526e484a4f422f5375332b4b72716646736d6e77344e7270634d646845414f6751664e2f7743504671335042507774312f5466452b6a616871476d744859323133484c4d346c5269696739536f624f4d34726939557557316255377938635a61356d65556b3963737850396174617651394c715a456475514d6e723656626a694370312f4f7030742b526c534f4d553871526a67315979487363666e51536338666b4b6579483336646161774b6a4f434f314d526d36684b56516a6b67594e4e692b6261636452314658726177612f75456856537a7a4f45413953546975357550432f68727742716c366d727a7672467a444f3632326c3235326a594749557a50327a6a376f35714a4f776b37614746345638446168346e337a78374c54546f655a372b354f7943496535376e32484e644f664665686543597a42345974467639515868745a7634386e507246476546487565613572785234333150784b496f5a576a747450692f7742545957713749496832776f366e334e594e7563795a3549365572583348612b3559316257623357627837752f755a4c7135632f4e4a4b32542b486f505956722f446257426f336a545370334f496d6d3869516a30636266356b567a38672b66622b744d594e456a4f6e456959645436456369683757486253783973336e375163566a38486233565856662b456b744439695749384753513543796765684133665545563859367034613150784a6358756f2f504a4c74335453395862633257623350745875736e68787645326861664a617772496b385379426832794d31312b6e2f446d4c773534497662693454447a44614d6a302f7744723177754c54756d5247616966492f67765537572b754c617731612b4b78577a79784c6237504b5935513748336b59475741427a7a7a555878445733534f5356476d6b32755930457a6838494f464738486e676567487058592b4c7668644a642b4a644f314346726143336d3369645a5a4e70667939704f46487a456b4e6a676475617966462b6b2f326f57736d4e71747647724750794c59687963486f51325748417757395478326f396a556c4631707a3330533944647a5453566a78653469327a6c57584c676a354363676a726a497230587762345a6a314855625953487a6c514273424d4b67374254334241484a2f7257444634596b7337323369756f7a4c444d683868786b5a632f337565434d5978394b2b6776682f774344455330686349413742636b44486175666b66506178557063735764566f33677679744961357352746d56666d6a37534c334831394b344f3931572f75453852616d3173626533734c61573269575467376d474333353448302b74652b654772583745556966694d2f4c586c6678357348384d364271554d616a374e714d7359556a7332647848354c58576f4b364f546d766f664d69776b53416a67357271394a386461747073586b537970714e706a42747235664e5448707a7950774e594351354a4271627954315072572f4b61757a4e2f564a39423174496e74625239457573356c43755a595350396b5979446e73534256585474457672705162653361355179434950434e3433486f446a6f54364872327a564733693663566f61565a5458477057304e755845386b697048734a423345386450656c79744f3646736a72504755557668583462364e703931464a61334e784a4e667a525371564b67664b6d5166556679727a5877305a5a4e4c696559355a7552587076787a3862584e3566792b48727255486d30714259744f527034784b305955664d773735424a373152306a5466424e6a61784a4e714f71335731527842624a486e2f766f306f743331456e5a4476686e715038415a586a725270324f324e70784535787874664b482f7742437170346e30722b795045657057514742426353497648384f34342f5446644644346c384a61557950702f6832347535304f556d3143374977633848617642727276696c38527451735045554e39706c6e70756e77366e5a7733697442614b54387934504a7a7a6c613075376976716550786166504d523563456b675048796f5456754477787139796351365865535a50384675352f7057356366466e78544e3937567052374c47696a3942575664664554784a4e773274336f482b784d562f6c54314b31494e5838416549625054354c7562544a7261464d466e6d4951714d396345352f5375563853584d6c336679476552355a47355a3547334d54366b6d7447373165373154557263584e314e4f5378636d575176304250632b754b35587844654d387378553835326a4e524a32577053387935716433706b47695158647348462b4746744d703556734c3872723663444248714d39366c736e575332694b6e494b446d71656c654868662b453775635a61347337685a5a46372b573432352f4267422f774143706d6c74396c6c46757a5a3367736f394436566842745055356358446e6864644457344237476766536b41354e4c674476585365496139766279334d6853465357436c69522f43414d6b2f67425763526461513676446d65327a38305a507a4c39445853323868737644736852634e657a655557372b584741785836466d582f414c34724e6431484c6344365a6f746339724451555958376d687065704f6e6c3356764b336d4b5134797837646a58663233784a7362694a446365447441634544694b426f7a2b5961764d724a347753596d55676e4732724e704930625352673549622b664e585a4d36576b7a30772b4f6644446b656234487379662b6d64374b6e50307155654d664369726b2b424c663648554a71382f67517046356a6443654d39445671316b44466e63344947526b64614c49584b6a7335664750684c6750344769554475756f7a437173336948775064345362777664324a504f2b31314179456667347858487a54686d596e6e50504861714f34764b543039416145686370367a3446735041576f2b4d64466974705045434f6270483253527773506c4959386a3656772f784f767447765047393365615263586b77764c6956356674614b75447534323753636a466266776678622b4a376a55582b3570326e334e30654d3949796f2f567138313155755a493575574d625a50303730726133456c71584a414f677a37305734496250576b512b596d34597733497a5530436857494a7a3630584e516d473254702b644d586d5141347766355558307537616363597761722b6357417a326f754239532f7334336936723461734c65584261324c5145452f33574f50307858717678546b582b783761776941586552774b38412f5a68315978332b6f3270626753704d7566396f59502f414b425872766a2f414635625a622f55477756734c5753347765684b7153422b4a414663386c61357976346a3555385961694e512b4b4e35627879787877576b76325154584138794e64674734424f2f7a622f584a78542f4142546f3063326e7878535869517373666d51504641717a5343544a566d4839336772675a323768574c346330753431692f5a6970754a705761566c484c4f334a4a7a7837386335347252385433613644424e4264694f35763251515773547946797a5941514b796e4177414231782f4d4371716c526c4b634c6f366f78636d6b6564584f72327472724e6e4f6b526d687333514f54752b5139487a6e3950544e66562f77766d68764c597745417647526a6e4f5232497234316557533365534b57304d647a4849466b57546764636e70324f50317236552b43666941434454376d5a764c5948794a4d4849342b372b684835566c7a4b545572376856566c6273665273476d4a4a624168634d443072784839716937786f6d673267507a795379536e33327141502f51362b68724b456d336a6b51626b5964612b59763271626750347430327a422b574779333439326476364b4b326a717a6b683852344773594747417152492b2b4f5035552f7977434d6b6e504e614f6c61506561735a526157387430596b4d6b6e6b6f5732714f72484851652f537457306c646e5755456a4c5a4a48543372747668645a52487849645175415774744d74354c32512f37692f4b507a492f4b7064462b46756f36356f6d72586c74497075744f7430764a4c4568764d65334b676d52546a6163426b347a33703968494e422b474f70586a48624c71317974716e723555667a4f666f5478575561734b6c2b56334a6b6d6c59386e385333736d762b4c4978496478444e637a48315a6a2f774472726445537142672f6858506548674c7a554c2b39622b4f516f703968782f6a58524b324f2f4a4e6152376c65524a4838754d394f316431347650384161767735384b61687958746a4e59534e36594f35422b5761344d45644d3133756866384145312b4666694b79504d6c6a6377583066306235472f515532532b3535367a42426c736b39756172794d4e32534d43704c6b347a786a30724f755a7770487454627355543230674f6f53487155686239534b35375553676e2b624247374f4257705a796b6d2f66706845555a2f452f3072486b515433423348474b79597a6f2f412b725277613746444d6f577a7641625363486f556635632f6763483842584f3631464e707572504534327a573068512f5545672f774171746f7957714135326b4449497178342b6e462f722f774274774239737434726c7366336d5162763133566c4961525a676d5765424a46364f4d303471543248346d736e772f63373435495366756e63763072565a4d6e72697459766d567a35367254644f6269646c346a5662575454395041326932745557512b72762b386250303337662b41316e52786a4a55344f446738314a7239384e54316d397567666b6d6d6552526a6f435351503171764775344d564f4f667972574a3779566b4a396c524a64366a4236315045516c36446a486d4c775063565659794953574f5252506362544533634e6a38366f5a74504f664a43415a37306d3867636e674371734d6f595a7763597156355346366e48595577456c6c4a4956654b5263446e743739616a55466d4a50503430355351777867436d684866384167556d7a3846654e74513645576b566f7050667a5a4d482f414e42727a795749534d775054484972304c54694c62344e61732f6536316147416e48554c47582f414a34727a3665554b53422b5a50577058556c61746b45467759625a4636474e69687a54784f5151517859453535725065667935794d2f4c4b4d2f69502f726679715a5a4f50355a715330585a6e4c786e424763354876554b766e4a4a3630337a427336344a3971616d51754f44336f47657166416255327366475449536354577a666d72416a394361396e2b4a4b2f626641656f514268484a714e78445a4935794d6b75474936487145492f4874587a6c384b373032766a62544430444f305a2f474e682f504665362f484b364e70384f394569514d7a5461675a47434f554a41686b485836754b796b3070586b726f35354c33306551325869464c477a5a4c4f4b326731433742457257344746586533384a474637634159774163357a574838564e59752f4565752b484e5431704a446152323677724f4a50336b6a4c75416b626151523833503048657539304477724870756e4c7266694169384832634e465a52532f4f71787367335a494b624e6d37673963593634727a6e786e6837795954526f676a473857685a6a456d65663365477750765a776651386e4e63644763613970536a6451756b2b6c3736727a3748644a53703776666f636e46594455623756766e467a617945626d504a445a78363963647877654f61372f774347444c5933313159444b69574554524450644735417a33772b6677726b504475772b61537246754142742b5870317a5858364472486b2b4b744e6437633230636369514f3432375a4e354b666c68732b7561326c4e535353566b6a46766d54625a396366446a5876375230654b4b51355a4267456d766d58397044555074337855314a44796c744844434d66396377782f566a587348674b2b66544e554d424f454a497754587a70385874582b312f4554583563354a765a4542396c4f332b5331764463356f4c336a6c4a7830505156336e775a38573276673378504c506652576232747a5a543272766537776b5964434d356a5575756362666c77666d354f4d3538324f704b7a5950366d7263647948474467676a464b704256594f4c366e517444366673496276346e65446452766642476757556e6b5357646f5a64526c78665353757759744770506c434d73726a4141474850796741437642666937726e324851394e303955386b57466c76654964707054356a645071746448344b313358395a304e4c45617a65746236646472396e696b6c4c694a7267655757516b5a526c4362686739514d447152354e38564e595855745a756c5239363346317451357a386750482f6a7169764c77744a30705476304e4a744f3169447737436250536f67667646636b34366d744c7a5351546e4e563467496f4931414741744e3877446a2b5665777446597a4c7133485072586f50776b6d57373154564e4a622f414a69576e543236352f76376477502f41493661387952695736397136763466616f644c385a364e636269464679694567396d4f302f6f54513955544c59774c776762732f774171353239755168392f5775753864576f307a784a7174734f4669755a465874387534342f544665636170654247627361695473696c716a5a73487a7074784a6e68356776354c2f384158717438714f636d6f37615178614a5a6738467930682f4538666f42564933426c6c3249533330714c6a524c66334a6e6259507539363266454d6176705767546a414c57526a592b705352782f4c46596a526557506d7a6e3072663161507a5042756879442b4757356a5035713339617a6c3347594f6d7a2b526678485044664b523961365a6d4b3844466361354d625a4765446b477576696b4530534f447779673961644a376f387a4778316a4932305863636970396a527077754b70517a414d713549353472545439346d4d31316f394972534c31717063674e627341666d786b437264774d446b3435724e6d6e574a766d4a774f2f57686758375734446f426e3050317130725a77632f68584c365a7149456a49546e4278585132317770555a366672516e6352634462516535504f61514841362b2f46512b666a67486d6d504b4363357a564350515a35664a2b444e73762f5054575862386f514b38386d6c42423961375456726a792f684e6f7139504d3143655472364b42584154543966513143596c314b6c3478636230507a7164792f555661733767584d43796a48504f414f6c5a30732b4749504e4e302b5a6f35336741346b2b5a4d2f72536273556a5a44467367644f3161466870317a71393346625763443346784b647170474f5366384b3364412b484e303175756f613763706f576d6366766267487a4a4f2b455471542f414a35713772486a5730306a5435644f384d577a574674494e7331394c7a637a6a7638414e2f435059667055703332432f59762b48426f76686a573950302f79503754316f3363516c76556e4968746d4a77555144687a7a676b2f68587276786830756678427076682b43316a616472614f34753269412b5571766c5a4c456b59786e366e74587a6634536c387657394d6b7a6e4637442f414f686976647669666657352f7743455857396b58374f3063376c4742494c5a6a55452b7744452f3050537336696230693164393976774953584f7559346b616a2f776c6c7863472b4d6b6e6b735a4674624f446c31786e797732666b6a584751414d444a726b6455736e3852366c7473346f72557a53625242463931453663645478676b352b764f61374f393161787466436a4a595346626e554863796e59464b78377546394d5a55455978315062712f52744b306d4b4b57653245576f52326153726475715343535653546a626a6341537534376752776f36636b33566c52772f73714d74744c74624c742f586d61786a4b6262756372632b4762665162454e4538724d4a54464a357141664e6a646b594a3477522b7634565a596f6b733535556c696b6d585936686c495a5433436e50555947546a743139647258767456394e484c4e47496f47525a5652574d68554d6f494c597953534d48327942584e58737977777966764130616773575041364850487277422f774471724847556b366e3776335576787436696a4b33512b694e4c6e57655743366a4f424d6979726a3347663631387a2b503748554c66784266584e335a33454b3345386b715353526b4b345a795151656c6651666847344d3368505135312b384c5345352f34417466507a2b4e395a307a55707848654e63514632445739312b396a497a307765672b6d4b306a657868486535785567506d4673594654775842485449375632543631345631736638545452704e4d6d4a35754e4d66432f585965507971752f772f673151462f442b74326d70456a69326c506b5466514b6576365562476c7a5a384661744a70766848784c65497248794774704136672f4b774d6d336b652f727878307a6a486b63786256504538535a796b43376a395458744d4868713538502f423778454e52745a4c613775484538596b55595a59397779436544676c75563577547a31423864384b52452f614c35786b7a4d6366377651567930337a565a727a583549302b796d62317977525142774256467042757754317153356d33486731577a6b64652f577578694c55625941376339717577335432386b63694568304f344564694b7978495648576e504e7347632b39566579456464385a5a3150696d3475312b574f3767697546394d4641503567313472714679626d342b586b6b3446656766464c565464614634667531507a4e5969412b704d6262613838384d4a426361724562737a43335537334d4b677478304142393856787a6c647149523069626d6f7a4d727732554133474e46692f484661317259783656624b7a44644f5233375676614f2f68625359546458476d586c396373632f76376752676639383074373854394f74474a732f44326d77734f6a544b5a6d2f4d31736e62566866736a6d6b73727139632b56444a4b782f686a55736630727257384a617466654364506a537a6b5630765a39336d2f753841704831335669743852764532744c3564764c396c683659676a564150787857707163386f2b48746e4c633363733073656f53492b2b516e4a4d616e2b6c5132324f35683358672f3743663841547457736259353551536232483443724671734d63434a44634c64526f4e6f6c55455a2f43754e6d754463534d342b37304661326c3359747262613355746e6b2b77724f4c744f356a695963394f7950545a2f41757562537a6154646a76756a694c41666c6d732b35307657644d47587337674266764b3854412f714b7366323772656c346c744e5576466a37717337386672562b312b4c5869665473464e576e4b64397756763569757a564732707a796136736d556c51704a2f6459594e564e52644a554c4b427a31494e6456712f6a7a557646454b2f61623247575265564d74724565663841766d734336386276705132366c345a30792b6a37543230506c452b354338556e4a7061694f536c456c7537335344393070554f52324a7a7a2b6c644270656f724c434d4e6e48707857686f2f6950512f464433656e51614642624e66573778426f7270775663596454676a4856656c63336f4436544a7170746674302b6e51396e7559764d35372f4148534d566b703259626e5369347a7a3755336557492b626a3272667466444f67737557385957772f774333567a2f577253654750444367627647555a2f3364506b5039613335305463762b4970646e7775384b4a6e687037743866384441727a79377544497836443241723248784e6f7668622f68412f434d542b4b6e56514c7067773036546e4d67393634702f443368416a502f4357762f344c354b6c53516b634b774c4d4f70507656335464546d30532b67763756554e7a627475546575345a786a70585670345a384a6e2f6d626d48742f5a306e2b4e574538482b46334879654d6f2b65506e302b51592f5771756d68334d3266566237584a5074743965795873723837335054505944735059566e334d75543139717658646a61364c4b39745a366c4471634371434c694a436f352f6877617951786b6469447831716c746f4e47336f4f5576394f49362f6134662f41454d5636333857645761332f73654f4f535248466f3862425741526b5a6c4a4248666c562f4c38764a4e4a625a653661332f5433482b6a5a7271666a4c664e6e53703262616a524d68623236342f6c2b56633961327a463152753678345853373847323275366345537a67693233456b72346b6c666a6438767332345a372f414a5a7a66447a797070734574764b4c4b774d717464583079715373694d5346515a7952744b3864795432347267492f472b7033476d4a6f6b6432387470497743775a47437849787a39543634725a62516c6a30575351583863643761664e4e4330714545394e76427770424247636e4978307271707431704f6359624c70702f587974637470616370325770332b6d332b6a74716a73397066576857473361504b2b6534636e6439336768546e4f376a414741434b34432b733564627470764c645552474373672b615167353556657041787a365a4872576e34616d2b303662354f7152534e615063672b56464c73624a47774f636e4241336359354a7a3271706f7669614c5364624d4d55386243326e6c53465a4373617949326337334235484147306b6735345050504e55703158617258646c4a2f63753972465754745a48736e7734756f37727752705156326459375a4977784743646f323578323656382b7a57647a714f75765a326b456c3164537a4d6b634d4b466e63376a7746484a4e65792f437a55413368694251784933532f65474d5a6b592f3146654e6168494c58784c63534670497846657564304c625841446e3770357766656f69326f36616d4d6432614d487738317938384d3375764454626d5053725a6477756d676279354347437371746a47526b6b6a3042394b3561434c6563483732656f72364e3048783544384c37524c4f57323144584c573973304f6e3355702b794335696b5a684a4849674c4e4c4758473445594a42554f323335613858746b6a3166346d4e4339696d6e78535869764a616f757849317a75634b765a654467656c636d487850745a754d7655336c4278584e304f373856472b547778717567666170626932307a5334565a4a4742564a6e696d64694332665148414f654f426e6b6553364e6f4f7158566c476c7070747a4b6f58414b524e742f50474b39467376456b30773855366f6a6b726558563148484b4e7a48393361536c656749364e6e6e4866714d3438796e3864363565786e7a4e5575514f346a6b32412f67754b64463371314836666b5272796f33562b48586947586d577a573355386270356b582b75616b4877376c6755666164623061322f77426c377346682b4146634f5a377a557073447a626d544763444c486a71613637536641636a784366564e5269302b443778437235726c654d6b414873436576393039613943454a5648614a4c76334e665466683361366c647262572f6957776e75474756534657636e4135724f762f42734f6e3354785874356351525252764c4e4b74726e596f594b725933636738386a4f4f4b76705a3654345a753778576c53533374795932755a7777615a736368514343414231776339426738317833694c78644c42645433727250703136792b584662524571726f325353774a2b5562575868514163353470566c374652353937765257322f34667a4b6972334b337843754c50544e43736f4c4b533761347435335466637868414177567546505049506631726a72485641674e316362566b595941525175667937302f5762673357676b6b42572b3135774363444b39426e74785234653074486b535758446e73473643754b46355375553944526874745738514652464759495056754361365054764246745a4b737432336d74314f5478566d4f384e7245436a4b414230465a3133714e786374676238437531526974587153584e5431574379517877714541394231724d3157376e7576446d6e51456c595a5a70626b2b2f52422f7743676d71545763313149636f333431302f6966536d54772f34624d654e723273677a324245725a724b6435626a4f4a53507a5a6c6954706d703778504c6d32357867415673574e6844703854794d513067485830726d7271647271346b6b55664b5478574e526371387934376e705573642f705a4c77663662624872455438362f5431724f477557307a4648426862756a2f41436b55543633632b48722b617a766b4e7a61785374476c7a482f45416341316f37394e317949455042506e74494d45666a5862666d325a6d5a447a51453553584834696b61356c5653465953726a377035702b702b484e4b7351486e6a6b56547a6d4573772f4d566b54792b484c5a666b764c6b4d4f6d306b2f7a7148646267562f4b4d4f7357317a464139704b73716e7a49754f2f4e5a2f69525a74463853335563784f354a79785972676e4a7a2f5770353965432f4c5a78335579396a49754b623439317535766239457672497758617752704b37645a47432f652f4559724354573464546f4c5336334b7544317135484f5352584d365a634d3845545a7a6c564f5365764661384d6f347a32725a4d44304c78684f5638482b4545476639524d33586e6d5156786f626353415343652b613654786c5038413855333456586e497447362b3731796b637135484f617045725974717058484a7156546c68786b565765345543703752742b42795256706a4c64746e6334354149484653526a4448754361464245675544743271534a526b39636b6a70566761454567696e30302f3950436b697466346c775365496276514c464c684c645a466b2b647a774341442f5869734e6a7475644e586a2f5848384d4b6171664671343833547242746d374259622b666b35586e2b6e5072584a58764a4e4a32304847334d726e465279684c38525333436f697962586c55626c4142786b5936697531766449736e6c6b4c616f6c6968746d6c6a556448794f514d2f77414f50546b2b67726c744a5632384c334d6f5742346f35437a786c7353536f507659394d5a4858366a6b6334312f614e46626935524a5243635a337142734a4751427953526a4743635a724a7239793478336474626266356d7953693774584f69693862665a74486a744949524463714e686e7a32445a42323478754757414f4d6a3135724553386d754355695753556f4d735977577750583248536f3958314f776d306978687459504a6e6847486c64634f344a4a774344676a4a376a505448476175614a7145566c70376f756e68723475506d6c6c33413953643857514e6f556e7150787243654a6e55533530394e4c614455453361353770384772713362773162706279435a5559683356536f4c484250586e71635a37347a5841654c4546743468315a53442f414d66637244364669663631314877556e553666654b70582f6a344d685641416f334b70344136444f63443078575a38524c52597646326f3434456d79556669677a2b6f4e64644a4e4a4a6e4c39746e4e51367a65323247444e647247684357386b6d316563343577654f656e3871377277686f73384f71364234676c756e752f7453334a6c6b663558566c6a593765707a7448566a7953656d4d452b655a4374376a74586f6e77763143354f6f533247556b686c7435586a575a54496b627175537758494849425535344950505145633157696f5032314e6172667a52767a74726b6b39444b3048545a763745306d4f5349784c65793339777539416368725a306a786e75664b626f4d2f4d4d5a4f4b3877695544494e65346546626d6158784c355772576a432b41654a457434397343426264305652475370413238636b5a7a387879633134337142307a546c69664e7a4f574c42776a4b4172412f6436452f384136365644343335712f7743596e35477034634a744e4d75372f6355614e696b534571454c6263376953506f5061716d68576d70616a716a4737757a4570694c704b7a35593838416a4f4d344e6148693254536266777848706b596c6a766b6a4679695a44426d4f506c50636e427a2b465a2f68545572585239446539752f334561456f56626c704855634b507a503078327265484d3637393679576a2f77434157306f78314b6157396c7031314a50716b725365572b4674312b5a3558353450746b632f57736a786a72386d76796661626f6862727048474364715241634b4d6e314a50363936623467787131334665504941303533465142746a54484259394378366e314f654b7839516c45714b75664d322f3874434f542b5030774b786e7975563130765a67727856686b7265626f6b793773487a347a2b59622f43744c51744d6c6d3237626771665131697563324c6f44676d52442b6a56753644656941716b2f797432507256557258314d326454613644664b41567556623259552b366e757252647246436661704138747a4376325677324f774e5a64785a616d3745655157352f76437535364c516b5a507155374844455939713239596d7562337731345a74346d79324c676a413666764b78596644312f6345655930634b2f584a2f4956326d7350596142344230433542445863636c784378592f4d666d424848596634316b3039336f684e6e4761385530757a45426b7a4b777778726d42654251414278547279366c316d3861523837536173497474456f57756554353558364769305055727178697649634d6f50486676584c582f685552536c72647a456575304869756938535444775a347176394a6b667a724f475570464a6e4a55656d652b4b74527a51616a454447797a4c365a35466433757a494f4a536657644d34535154522f335835706a613562794d546561576f663841766f4d56326b6d6d5275754e7a4a3641696f47306977746b4d733479672f76444761584a4a624d446c304f6e3669666b4678467830484971393469302f537455304b6657536b7a584675384e744a457a6267773873674d446a67355538552f5564577459595a557337626277514732315034653850586d702b45645a4a58435253573038756575774677534239534b68712b684c4f4e30755953784c694c79526a41546e67567178756334783663566d79336b4d6d755332385743455867316651344f51507236564b37466e592b4d5a7750442f41495a4250537a502f6f56636439724f547a6b6a3850384150537437786c506a512f4475542f7936486e2f6756637262516d3563656d614c6b7046364734653463446e72327271644e747a48456a4e7a6d71476b3655495557575435514f6d654d31744b43527763415676426477415a4d35432b6c414f47774f6e48577266396c58467044446479786c494c6f4e354c482b506163456a386550774e5336546f6c3772743674745951506354486e436a674475536577397a5665596b564a72685531445451334f47592f38416a7072502b4a2b5a375853413769474b566e79375a774268656f4172734e62384a616670563970796e58626539314a5759505a3230624f69384850377a706b63386531596e78633232656936544d45334b4a5855706e41594650384145437561646e4c58594539556562364c6f37334e777158426e696a5a433863635335615164385a34707572365a4c4c5049316c357435626f717235784752776f347a303442417837556b5a4e7a622f326a66584b3951416779724d5156425050424f50513570645a313162714e30303943794951714f6f62393275434231353666794236314d58536e42706450765a76627552615864547761584962707774677a466c6a6463377a33774d67343664507a46517672555451434b544568387870316b414c6c6a7a6858425066334a4942373033534c35593779463769597a7a452b58484765566a42474d3963644f3250784653366e6f74757476506378744b6a6f347a484b45586475353443395058465965394e326a736c33587a4b2b79656c2f41445649317537793159344d6a7133747944302f4b756f2b4a39733050694b4e6d4833375a52395347622b6d4b386f2b4746323172713037516e612b785a4142374848396139662b493271526133613648654a67536d4f534b566663625350356d74714c36484b2f6975655a3342325459375a787858532b484c78724f48574c674d466148533767726e6f537968422f774368567a4634324a426e313643724631654731304456794d626e743434786a727a4e486e394161326c73787376336d7058455564757133546c5945327844635355474f514d394279655063306542594c57383859574b584674617a70495855724e416a44376a593449396135555433453243496d487557555a2f4d317465436b756d385736575243707a4f4f4450474d2f6d31545a4c5a465059796453754a426479655949704a56597276654a57626a6a7269734c566456754a4350336747442f4169722f495674613562733271336d5a4949514a35506c6b664a487a486a355161776269316753544d7434724566777849572f6e696f6b3359614d7439306a626d4a59397978714677546b3449583139617679334e74474435554c534e2f656c4f66304846554c6d566e4757503663567a4d73724f766d4f694b53704c5a4248742f77447272714e506543514c42656f455939487838707241302b306d7637364e49597a49362f4d414b394c306e7742712b73573667616138696e2f6155482b646130313149624d2b507736384f4a4c6565614c2f41476f6d42483631667437585549794e2b6f5345442b39454f6e3531702f38414376504647674150425954795139544875567366544272477666446c7a716b7a3568766261342f696a4d625a7a394d563071793246653475733636756e4c35556379797a456373414269736a56744e75727a5374496b6d754e38457953534b6d656a6279442b67464a632b416451746d4c5048506a4856343248387857723472304b66544e4f385078717a504739694a5278305a6d4f373952575537796676494c6f356965434f325461705565394a62615731784676475344375665303777767157727a4b736474504c6b394551742f4b76524e4f2b4765737857694c2f5a724c37534f694e2b54484e45595833487a574e6e34732b48626154787066784563716b49632b7265556d535078727a6138307158527047653175436f422b36614b4b33635679706b52324c466a347275314f3251682b334e624d5772783377486e78466832786969696c47544b4c6147445947534d4263644e6771726365494a644d747459696779424e5953524e6e304a576969744a2f434c633876744c50375065787968747a4e6b48506669743252697172394d3055567a5232476a5438514f6276525044784f414443362f6b3958744830714f33696a64734d7a636764714b4b756e71774e35594146566d2b625054326f436272684558677364755452525852304a5051722f5362665850486435706b303073476d614a6147425569554632574c41624765415759733266657564312f77416137374e394d3053322f736e537a797755356d6e393547362f6852525750577752324f49547852486f312f6258456b44544c464a6a41504f4343442f4f75692b4b743146646547394b6e614d7447317776796b6748444b66725252574652757a483970486c6d6c537957327358634b5342346f4e79497379373844646a314744376a33714b46726a546266556d4c4b3065462b516444754a39756e5838364b4b644345565456524c336e66384149364a4e37457038487a6164704e76716f755544544546555145466334372f6a562f54644266576e454e784d7351743451792b57756367383550766e6e2f436969696a4653717767396e6639525353544e66777a64336348694f303036646f6e67746f6d6a555272742b38752f503841343758706b7575706f467242634a70746c666c334d586c3338586d6f4d676e4947527a7852525552696f53635937584d4a7474366d4a485a365a343531413239725a2f3250714a425947456c7264783771546c667772682f4756764c70646c65574d6a4465747a444778516b67384f652f77424252525773746d43334f62472f63506d364450577450772f644e44722b6d746b6e46784765762b304b4b4b686453694c784d67693851366d6f7a6758456d4f65323431674d4e2f6d45396a5252576242465a68676e31363155754a4d416d69697369696252517a744d7973566b566c415948703937503871375852622b35584465664a743659336d696974365778423041754c7951664a65334d665467544e6a2b645a6b2b71367a70386e6d57327258555435362b61786f6f72706d6c59534b622f456678456b323262564c6d5448704d772f6c5864654566484639712f6872576f7269656153577a68467a62537535597848643877476338456476786f6f726e54594e497a3566484f7133454442722b37326a2b425a536f2f4959726c723757356e754332546b3965614b4b306d3749704a482f32513d3d, 0x2f396a2f34414151536b5a4a5267414241514541594142674141442f2f67413751314a4651565250556a6f675a325174616e426c5a7942324d5334774943683163326c755a79424a536b6367536c4246527942324f4441704c4342786457467361585235494430674f54414b2f39734151774144416749444167494441774d4442414d4442415549425155454241554b427763474341774b4441774c4367734c445134534541304f4551344c437841574542455446425556465177504678675746426753464255552f39734151774544424151464241554a4251554a4641304c44525155464251554642515546425155464251554642515546425155464251554642515546425155464251554642515546425155464251554642515546425155464251552f3841414551674169774573417745694141495241514d5241662f454142384141414546415145424151454241414141414141414141414241674d454251594843416b4b432f2f45414c55514141494241774d4342414d4642515145414141426651454341774145455155534954464242684e525951636963525179675a476843434e4373634556557448774a444e69636f494a4368595847426b614a53596e4b436b714e4455324e7a67354f6b4e4552555a4853456c4b55315256566c64595756706a5a47566d5a326870616e4e3064585a3365486c3667345346686f6549695971536b3553566c7065596d5a71696f36536c7071656f716171797337533174726534756272437738544678736649796372533039545631746659326472683475506b3565626e364f6e7138664c7a39505832392f6a352b762f454142384241414d42415145424151454241514541414141414141414241674d454251594843416b4b432f2f45414c555241414942416751454177514842515145414145436477414241674d52424155684d5159535156454859584554496a4b42434252436b61477877516b6a4d314c7746574a7930516f574a4454684a66455847426b614a69636f4b536f314e6a63344f547044524556475230684a536c4e5556565a5857466c615932526c5a6d646f6157707a6448563264336835656f4b44684957476834694a69704b546c4a57576c35695a6d714b6a704b576d7036697071724b7a744c57327437693575734c44784d584778386a4a79744c54314e585731396a5a32754c6a354f586d352b6a7036764c7a39505832392f6a352b762f61414177444151414345514d52414438412f564f69696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696d37686a4f654b414855556d526e48656c6f414b4b4b4b4143764a2f774270763476532f4133344f61373476746f59726d3874504c6a68686c2b367a764945584f5072587246664e50375a656a3233784354346566446d356c6c6a6738532b49452b3043453459775149306a2f686b4a2b64414875666748785a4434343846614672397341596453744972706364427558503836364f7648763254353150774c385057716b6b61655a39504734386752544e47422b536976594e7750656742614b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967424735552f53764550326b5032676a38426e38454f316a4865513635724d576e334c7948486b776e47393139786b6461397650513138542f3841425150772f66664576784c34443846615751743662545574564c6430454d4f3848385754483430416661634c6954444b63717779443249716175462b42336968664766776a3849367972695133576d51466e4236734643742b6f4e64315141555555554146664f6e69395434702f6267384461657962376277763457764e575939684a63792b514d2b3445575239612b695332446a46665066776463654c50326e766a56346b552b626236642f5a2f6832423863426f6f6d6b6d55665270467a5142652f592f6452384d645a526374476e695456516f50504175583665314d3852664737564e502f414775664233777a7442414e477674487562322b5a6f7835686c41646f67703759455a2b752b7233374a3973317238506461566b3874762b456b3152746e596636552f5438712b642f4356317166692f2f676f6c2f77414a484f336d364c6258756f614c617542774874374546682b636d667a6f412b39614b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696b4a77506567415048624e41494f666269715637715332307363433461655837692f774266705332737637732b57776b353559394d3938554158436356437437453872527134387865536d656366537647766a442b314c34612b43327552366471352b33584d385a61477a30304761354a48596f4d347a586e7476346e2b4f5878372b793676345630375476686e6f446b744665366f507446354d6e596d4d59436a324e4148315748336442543638427464572b4c76776b7456766646643970666a37516c4b2f615a745074546158647543514e77584a456747526b5942723371336d5735743470567a746b554d4d6a4277526d6742376664503072356b6b74492f4676376357704f3444786548664278675a63354165346c7a302b696d767073394b2b5a7667644d4e612f61552b4f2b744144793765537a30304d66574f4973332f6f564148552f735933676e2b41476857774141735a37757a47426a415364384438694b397872776e3969316433774b734a77753162692f7670686a767575583572336167416f6f6f6f4171583931485a573039784b32324b474e7048506f4647536630727766396969306b7576684c71586969594d62727858722b6f367a4b7a63626738786a512f38416645536e38613766397044785933676e3448654e645754623530576d7a52784b66346e646467483574577238466643712b4466684a345030554459624c5337654a6750373277626a2b4a4a6f41355834465852305434662b4a37693558616c7072657254482f6457346b593134422b7a576b6b6d6f2f426e574c68534c6a784672586962566935586c6b654a74684a373547336e324665733631346a48684c34412f462f5555664a73627a57446875506d4c7351502f4871772f412f68772b44376a396d47785a697874394f7672636b6a717a32473750312b576744366a6f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f4154705654564e5374394c734a7271366b454d4d536c324a505956616637707278765866465466454c34774877565a6c76375030614e4c765535414d717a483773564148632b48466b38524c5071393547397648636a6262524d634d49757a48304a3631347638552f32673956762f47442f4141782b45326e7836763473436262725535442f414b4870536e71306a447177353439615a3864506931722f4149743858512f435834575452663841435254722f7741546656783830656b322f5135782f4752774258716e77562b4332672f426277734e4a3071497a336368387939314b66357269386c504c53534e376b6e41375541633738452f32624e422b4639732b70616b773855654d7231764f7638415872396438736a6b63684d3532494d384156367270756a7761556268626362497058387a79683931443378365a3634725143676442696a46414748346e306954584e4d6130686459784a4c45584c726b4641344c4c3953416133464731514230417852744763343570614147757756474a4f41426b6d766b443441654b5974492b47663751486a2b516751796131716c796a76787557434d716f7a376c514239612b7050484774782b477642757436724d32324f797370726832394171466a2f41437234763844365250714837496e77363844344d65712f456256306b7567682b63577a7a6d65346b2b6e6c706a386141507066396c7677374e34572b415067697875502b506b36636c784c786a35706379662b7a56367458694878572f6145306a344c2b4f5068743446687350747439346c765937434f4e4a516f74494d6842497737386b41437662453738356f41665252525142344a2b312b6a6131344e384e65466f766d6b385165497247304b39637872494a4a4f5054617072336132685733746f6f6b47455241716a3041474b38462b4973636e6a5439717634666145684c576e687a54376e7842644b4f7a762b35672f587a4f506176666c2b364b41506a58342b61702f774159356646437968494d326f2b4d6e30304c6e715a62794e4d48384d31367038524c564e462b4a767742735477596232377438446f4e756e735036437647764831786236786161466f4d597964612b4c3777334364666c6a6b61516e386c5376632f6a4975666a4a3845384a6b2f32786648646a6f5073556c4148744e46464641425252525141555555554146464646414252525251415555555541464646464142525252514155556d615767416f704d305a6f41472b366531664c76784d313166326574453855612f70763841784e50486e6a6e55664a306d7a362f4f666c6a582f6455664d545831424977564353634156386f664436315078322f6171312f785a4d504f384c2b42422f5a576c465475696b757a2f724a41527753756363644b4150542f414e6d6e3446772f4266776a4962366336703475315a2f746d746170494d764e4f334a55482b367563416531657841416442696d7277783663392f576e5a413730414c52535a4872526b656f6f41576b6f79505776462f484837532b6a2b472f696e6f7677363053777550464869792f6b48326d307369416c6a422f464c4b352b55593434363041502f624331755477392b7a4638534c36416b534c6f3830532f7744625445662f414c50586c66374830712f45765374473865334e67326e364a346430534c524e476a6d364e736a483269344870754932672b6d61354c2f676f562b304e706236422f777037523546757454317935746f4e567546507957554a6c5667705038416662614f4f774f6139622b4e2f692f773538412f32574e633033527453736261613030622b7a4e50696a6c554d3873692b55724263357a6c74787032412b636646656e2f4150435a7a326637514f71427053336a7a544c4c517735495748546f726f52376750384162626d7630586a4935783272354a2b4c2b67654674442f596c752f4238506948536f722f4145665249627132333363595a726d44624e6b4450566d56675063313664384b50326e2f41414434762b4750686e583953385a364470393966574555743162334f6f777876485074486d4b564c5a47477a51423758554e77346a47356d32716f79543643764e3576326d766850426e7a5069503461554430314f492f7961764b2f77426f6639744c34616547766846346d6d38502b4e744731665870624a344c473073376b535350493432673864686e503455674e5038415a683132483474654f50696438556f484d6d6d616871533646704c4f4d4557746f67444d505a354864767772364f4851562b65503746333752506748344357577366447a784a34353071665451734f73574772787578686557614e546377453434645a42307a7a6b313949742b33663843596c502f46774c56736345705a334c4439493659486958683077654a763274504375674b2b39644938552b4a6461756f452f355a73466757466d2f457469766f33346e425a766a623847344d67754c76553539703946736d42503575763531384c664176342f66447a5350323476694834793162784c48616547376933752f7346394a444b566c6553614d6e35646d34664b665376657647503759667769314c396f50346536696e6a53316c306a534c4855764f755674726772464e4d73534a6e393333436b5a3644497041665a74466549722b326c3845354974342b494f6e42522f455970676631537156332b33503844375863473864775446526e45466864535a2b6d3249304165393056383133482f425162344e4b47466e71757361704b42387356706f563457623247364d44387a58536644503971625350697a346f743947306e77623430736b6d526e2f414c523154527a6232694144504c6c2b2f6167443343696d526a43302b67416f6f6f6f414b4b4b4b41436969696741704351427a533031314c415978514279586a583475654450687a4e61772b4a76456d6e364a4c644b586853376c434e496f4f43515053756650375476776e57447a54385164413266396671352f4c725851654f50684e34522b4a53524c346e3850574774474546596e7534677a5271546b68543141727962552f7742676a344d366f376b2b47587477787a747437703156666f4d6d6d7264514e62566632312f6770704f2f7a66486c684d562f68746c6b6b50364c584e7a2f415042516a344d7863526131714634543057333079596b2f5449465964332f7754532b456b7a4d59503757744366376c316b44387855476b6673425265436235627a776a3438314853356c50417562574b64636568794b48626f4270796638414251723466797555307a51764657724f54685674744a596b6e3836644c2b323364586b5a476a6642337839714d6d506c56744c6441667277617666384b702b50576758494f6b65507644392f41446b4c66615545503572576b6c7a2b306270713466542f414158716f55637373387352622f78303067504d766a562b325a38517643487739754c372f68545775614774347632574339763531776b726a432f496f336454575a2b7a68652f4833345766435053744573766844613355386b7233557439663674464330786b4f3873364135423537317a663756336937347965492f45487731384a3674345630765331763961686c68573376533864314e4777594978774d4c786e474b2b6d5976474878757956506744514d6865474f724d426e2f766967446d7076455037542b6f4f444434523845615968357850714d736a4436375678557936622b30356578676e562f41756e4f66376c764e4c6a2b5664484234742b4e386b4a332b427644715339696457664835624b49764648787a56423533677277777a35367271306e2f784641484a542f446239704f2f6b456a2f464877355a6a7574766f78503832714f6234492f486538492b322f48464c574c71545a365169484866715458512b4a66695a385876434f67337572366c3452384c77576c7047306b724e72446a414850644f767458686573654d50326766327366416b68304c5374502b4858685279566e764c75366b696d76592f3474683235564d5a2b62696743505676685238576647667841747442384a2f4737586457306d46574773363135614a62327a5a346a6a5a426835447a6b6471347678642b7931446f766a3632384e66432f78743469316a346f58556d2f5864654e32524659327a66664d72722f473347457a6e31785854654250485878642b4a50684455766835384a7643756a2b45394830686d73626e784f4c707a464933527a432b333533596a373244587466776e38412f456e344c2b4549744c30667762345a7537325439356533386d71796d61376c377649786a795366306f412b64506a352b785234452b48712f44464c72554e5a316a5776455869717a3033564e527572786931796a6c6a49337366543072706669392b7954384c59666a4a384b76416d69654870705a39517535622f414664704c6d53566a5a52495351354a34444e387662726a76566a3972337852385434372f7743454e397276685052744f466c3476745a4c5a6f4e5361564a4a734861726b714e716b413831302f776a30373476654d50693734722b4b4d6d672b48334d7349306254344c79396b437852524f537a526b4b6548504a50664171756c77505a522b7948384859552f354a376f37736f4b715a493262743035593134622b7a76384466686e34452b4c6e6a3734632b495043656b334f71775868315852626e556264586165776b475169467544355a79746537582b722f414277614e667333687a776772592b5979616c4f3350742b3772792f347566415434756647445666446e694a622f7731344b38563642495a624c55394f4d3037746b664e452b514d786e3070584139763144344f66444b78736e75727a77643462747261466437797a32454b49716a7553514142376d766a3233384d654350326f7632724e4e307677683461307050683934455133576f36685a32535278366a636e684542414739415278324f43656c5976697634472f7455664762586e305878724e6270705163413363643873656e375163622f4b543535446a6e446356397066414c3445614c384250416c726f4f6b4154584c596c7672396c4376647a597757624851446f42324649446d2f6a582b796c34532b4b33685343313037544e4f385061335954726561647146725a527149356c3642314141644430495055567776683734782b47666871716142385a2f41396e344a316933784775747070416b30692f485150484f69454b546a4a5273455a723672515955412f70554635595133384477334555633854634d6b69686c4939434451422b623377502b4a2f7737303739717634326178427053654b5265793239746f4f6e615070687576744a4a6b4c624d4a745166496f4c4e67563756384a50684c347a316a39714f2b3863655050412b6b61506f743734636133736247336a6a6d5730635472694f56674e706c4b4d784a47527a6a50466133374d566a5a36662b30762b30646157747062326f683148533254375045464368345a687434484833656e7258314d497a6b48306f4178443443384e45592f34527a5363656e32474c2f346d706f5043576a576a41322b6a6164446a2b35616f7638414956733055415178577355484555535244305251422b6c50326e4f63632b31506f6f415263343570614b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f41536c6f6f6f414b61527455392b50536e5568365541664b2f3763734e7a3463732f6831342b696a3879447776346768754c6f656b54345269663839362b6e7243366931433268755947456b45714c4c4736394755674545566c654f7642576b2f4548776e716e6837584c5a627a533951686147614a683250636534366a3656386f365238537669442b783272364634313062555047587738745838765476454669504f754c61482b464a56366e41774d3041665a546649667258422f467a347965472f6735346654557464754d7a544e3564705951664e6358556834435270314a72357338582f38414251573438575778307634542f442f582f4575747a4c74576135736d5347426a304c44766a7279514b3837384166736a2f4854346a65506f50472f6a377848486f562b7a6561733745584e7841442f444768797365427878306f74356765722b49372b30315132666a6a343136312f5a396b68382f522f414e752b39334a2b35356b612f4e4b35394d594661317234542b4958375473734c654934376a3464664442647068304341374c3755342b776d492f316145592b5563313666384c66325a2f422f777a76354e5a454d2b763841696d59356d312f57704463336265797332516736384c69765751674139543630415a58687a777070666848524c50534e48736f745030363051527757384b674b696759342f7161316470413766674b554441774b57674435722f62732b44666950343166422f54744b384b572f774270316d7a316d3275316a3368506b415a574f543662382f68587366776e38485034422b4833682f514a70686333466a6170464e506a42655144356a2b5a7272764c48484a3470516d434f65677854767059426151726e7654714b5145666c414e6b41416e7163636d6e675970614b41436969696744773334562f412b392b487678382b4b2f6a425a5950374638584e5a53777749784d69797868784b5748624a657663715a356649354f4232703941425252525141555555554146464646414252525251415555555541464646464142525252514155555555414646464641425252525141684752696d4e416a67683144673951334f616b6f6f41686a73345952694f4a59782f73444838716b45616738444830347031464b7743557446464d416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967416f6f6f6f414b4b4b4b414369696967442f396b3d, 'christopherl@veritas.edu.ng', '$2y$10$GetgByUcFlpcNfQijXYP6.kR9cn8jHp7BPU6l9ioI4v1NA6eIKJmi', 1, '2021-11-10 07:53:39', '2023-11-20 08:40:02', 'PgA7FOnacR0DtCvpb7honT6MIay9RACMOMHlfs6BJrsvvNtRePZLXXtIpKii');

-- --------------------------------------------------------

--
-- Table structure for table `staff_contacts`
--

CREATE TABLE `staff_contacts` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `relationship` varchar(20) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `state` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `phone_2` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `staff_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_contacts`
--

INSERT INTO `staff_contacts` (`id`, `name`, `relationship`, `address`, `state`, `phone`, `phone_2`, `email`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, 'Ofor Nneka', 'Wife', '30 Kings Drive Abuja', 'Abuja', '08032748919', '789790809080', 'nneka@yahoo.com', 1, NULL, '2022-01-19 04:18:38'),
(2, 'MARTINS GAIYA', 'Husband', 'No.28 Adara Street, Romi New Extension, Kaduna, Kaduna State.', 'KADUNA', '08033894069', '08033894069', 'martinsgu@yahoo.com', 2, NULL, NULL),
(506, 'CHRISTOPHER LAWRENCE OMOR', 'SISTER', 'D 5 FEDERAL HOUSING ESTATE, GIWA GORA KADUNA', 'kaduna', '08136337718', NULL, 'lilichris@gmail.com', 506, '2021-11-10 07:53:39', '2021-11-10 07:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `staff_courses`
--

CREATE TABLE `staff_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `program_id` int(15) DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `level` bigint(20) DEFAULT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `upload_status` enum('uploaded','not uploaded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not uploaded',
  `hod_approval` enum('pending','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `dean_approval` enum('pending','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `sbc_approval` enum('pending','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `vc_senate_approval` enum('pending','approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `approval_status` enum('pending','approved','declined') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_positions`
--

CREATE TABLE `staff_positions` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_positions`
--

INSERT INTO `staff_positions` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vice Chancellor', 1, NULL, NULL),
(2, 'Registrar', 1, NULL, NULL),
(3, 'Bursar', 1, NULL, NULL),
(4, 'Librarian', 1, NULL, NULL),
(5, 'Deputy Vice Chancellor', 1, NULL, NULL),
(6, 'Deputy Registrar', 1, NULL, NULL),
(7, 'Deputy Bursar', 1, NULL, NULL),
(8, 'Deputy Librarian', 1, NULL, NULL),
(9, 'College Dean', 1, NULL, NULL),
(10, 'HOD', 1, NULL, NULL),
(11, 'Senior Lecturer', 1, NULL, NULL),
(12, 'Lecturer 1', 1, NULL, NULL),
(13, 'Lecturer 2', 1, NULL, NULL),
(14, 'Academic Officer', 1, NULL, NULL),
(15, 'Assistant Registrar', 1, NULL, NULL),
(16, 'Personal Assistant', 1, NULL, NULL),
(17, 'Senior Accountant', 1, NULL, NULL),
(18, 'Auditor', 1, NULL, NULL),
(19, 'Messenger', 1, NULL, NULL),
(20, 'Assistant Lecturer', 1, NULL, NULL),
(21, 'Front Desk Officer', 1, NULL, NULL),
(22, 'Assistant Front Desk Officer', 1, NULL, NULL),
(23, 'Accountant', 1, NULL, NULL),
(24, 'Director of Internal Audit', 1, NULL, NULL),
(25, 'Auditor 2', 1, NULL, NULL),
(26, 'Office Assistant', 1, NULL, NULL),
(27, 'Office Attendant', 1, NULL, NULL),
(28, 'Sports Coach', 1, NULL, NULL),
(29, 'Chaplain', 1, NULL, NULL),
(30, 'Principal Security Officer', 1, NULL, NULL),
(31, 'Engineer I', 1, NULL, NULL),
(32, 'Engineer II', 1, NULL, NULL),
(33, 'Director of Works', 1, NULL, NULL),
(34, 'Systems Administrator', 1, NULL, NULL),
(35, 'System Programmer', 1, NULL, NULL),
(36, 'Library Assistant', 1, NULL, NULL),
(37, 'Library Officer', 1, NULL, NULL),
(38, 'Technologist', 1, NULL, NULL),
(39, 'Senior Medical Officer', 1, NULL, NULL),
(40, 'Medical Officer', 1, NULL, NULL),
(41, 'Nurse', 1, NULL, NULL),
(42, 'Medical Lab Scientist', 1, NULL, NULL),
(43, 'Pharmacist', 1, NULL, NULL),
(44, 'Midwife', 1, NULL, NULL),
(45, 'Medical Records Officer', 1, NULL, NULL),
(46, 'Graduate Assistant', 1, NULL, NULL),
(47, 'Human Resource/Legal', 1, NULL, NULL),
(48, 'Senior System Programmer', 1, NULL, NULL),
(49, 'Senior System Programmer', 1, NULL, NULL),
(50, 'System Engineer', 1, NULL, NULL),
(51, 'Senior Assistant Registrar', 1, NULL, NULL),
(52, 'Chief Clerical Officer', 1, NULL, NULL),
(53, 'Administrative Officer II', 1, NULL, NULL),
(54, 'System Data Analyst', 1, NULL, NULL),
(55, 'Principal Assistant Registrar', 1, NULL, NULL),
(56, 'Driver', 1, NULL, NULL),
(57, 'SENIOR CLERICAL OFFICER', 1, NULL, NULL),
(58, 'CLERICAL OFFICER', 1, NULL, NULL),
(59, 'Lab. Technologist', 1, NULL, NULL),
(60, 'Counselor', 1, NULL, NULL),
(61, 'Computer Lab. Technologist 2', 1, NULL, NULL),
(62, 'Auditor 1', 1, NULL, NULL),
(63, 'Administrative Officer I', 1, NULL, NULL),
(64, 'Executive Officer', 1, NULL, NULL),
(65, 'Liasion Officer', 1, NULL, NULL),
(66, 'Lab Attendant', 1, NULL, NULL),
(67, 'Secretary', 1, NULL, NULL),
(68, 'System Analyst', 1, NULL, NULL),
(69, 'Assistant Librarian', 1, NULL, NULL),
(70, 'Higher Executive Officer', 1, NULL, NULL),
(71, 'Professor', 1, NULL, NULL),
(72, 'Hostel Administrator', 1, NULL, NULL),
(73, 'Pharmacologist', 1, NULL, NULL),
(74, 'Medical Doctor', 1, NULL, NULL),
(75, 'Personal Secretary', 1, NULL, NULL),
(76, 'Tutorial Assistant', 1, NULL, NULL),
(77, 'Chief Security Officer', 1, NULL, NULL),
(78, 'Health Super-intendant', 1, NULL, NULL),
(79, 'Plumber', 1, NULL, NULL),
(80, 'Senior Law Library Officer', 1, NULL, NULL),
(81, 'Higher Technical Officer', 1, NULL, NULL),
(82, 'Technical Officer', 1, NULL, NULL),
(83, 'Audio/Visual Technician', 1, NULL, NULL),
(84, 'Higher Transport Supervisor', 1, NULL, NULL),
(85, 'Studio Demonstator', 1, NULL, NULL),
(86, 'Associate Professor', 1, NULL, NULL),
(87, 'Chief Matron', 1, NULL, NULL),
(88, 'Assistant Executive Officer', 1, NULL, NULL),
(89, 'Catechist', 1, NULL, NULL),
(90, 'Supervisor Cleaner', 1, NULL, NULL),
(91, 'Experimental Officer 1', 1, NULL, NULL),
(92, 'College Officer', 1, NULL, NULL),
(93, 'Health Attendant', 1, NULL, NULL),
(94, 'Head Internal Audit', 1, NULL, NULL),
(95, 'Domestic Steward', 1, NULL, NULL),
(96, 'Carpenter', 1, NULL, NULL),
(97, 'Hall Administrator', 1, NULL, NULL),
(98, 'SENIOR TECHNICAL ASSISTANT', 1, NULL, NULL),
(99, 'Assistant Graphic Editor', 1, NULL, NULL),
(100, 'Water Operator', 1, NULL, NULL),
(101, 'Craft Man', 1, NULL, NULL),
(102, 'Generator Operator', 1, NULL, NULL),
(103, 'Accountant II', 1, NULL, NULL),
(104, 'Senior Technical Officer', 1, NULL, NULL),
(105, 'Architect II', 1, NULL, NULL),
(106, 'Editor', 1, NULL, NULL),
(107, 'Principal Engineer', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_role_assignment_logs`
--

CREATE TABLE `staff_role_assignment_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `assigned_by` int(10) UNSIGNED DEFAULT NULL,
  `removed_by` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_types`
--

CREATE TABLE `staff_types` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_types`
--

INSERT INTO `staff_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Teaching', 0, NULL, NULL),
(2, 'Non-Teaching', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_work_profiles`
--

CREATE TABLE `staff_work_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `staff_id` int(10) UNSIGNED NOT NULL,
  `staff_no` varchar(20) NOT NULL,
  `staff_type_id` int(5) NOT NULL,
  `admin_department_id` int(11) UNSIGNED NOT NULL,
  `staff_position_id` int(5) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `assumption_date` date DEFAULT NULL,
  `last_promotion_date` date DEFAULT NULL,
  `employment_expiration` date DEFAULT NULL,
  `employment_type_id` int(5) DEFAULT NULL,
  `grade_id` varchar(20) DEFAULT NULL,
  `cbt_code` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_work_profiles`
--

INSERT INTO `staff_work_profiles` (`id`, `staff_id`, `staff_no`, `staff_type_id`, `admin_department_id`, `staff_position_id`, `appointment_date`, `assumption_date`, `last_promotion_date`, `employment_expiration`, `employment_type_id`, `grade_id`, `cbt_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ST103', 2, 14, 9, '2010-04-19', '2010-04-19', '2010-04-19', NULL, 5, 'CVUSS15-1', NULL, 1, NULL, '2023-03-19 15:18:50'),
(2, 2, 'ST121', 1, 3, 35, '2008-08-13', '2001-08-09', '2001-08-09', NULL, 8, 'CVUSS15-1', '5172101', 1, NULL, '2021-11-06 12:25:33'),
(506, 506, '01', 2, 14, 9, '2021-10-29', '2021-10-29', '2021-10-29', NULL, 4, 'CVUASS 1 STEP 2', NULL, NULL, '2021-11-10 07:53:39', '2023-10-24 08:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(5) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `state_capital` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `state_capital`) VALUES
(1, 'Abia', 'Umuahia '),
(2, 'Adamawa', 'Yola'),
(3, 'Akwa Ibom', 'Uyo'),
(4, 'Anambra', 'Awka'),
(5, 'Bauchi', 'Bauchi'),
(6, 'Bayelsa', 'Yenagoa'),
(7, 'Benue', 'Makurdi'),
(8, 'Bornu', 'Maiduguri'),
(9, 'Cross River', 'Calabar'),
(10, 'Delta', 'Asaba'),
(11, 'Ebonyi', 'Abakaliki'),
(12, 'Edo', 'Benin City'),
(13, 'Ekiti', 'Ado Ekiti'),
(14, 'Enugu', 'Enugu'),
(15, 'Gombe', 'Gombe'),
(16, 'Imo', 'Owerri'),
(17, 'Jigawa', 'Dutse'),
(18, 'Kaduna', 'Kaduna'),
(19, 'Kano', 'Kano'),
(20, 'Katsina', 'Katsina'),
(21, 'Kebbi', 'Birni Kebbi'),
(22, 'Kogi', 'Lokoja'),
(23, 'Kwara', 'Ilorin'),
(24, 'Lagos', 'Ikeja'),
(25, 'Nasarawa', 'Lafia'),
(26, 'Niger', 'Minna'),
(27, 'Ogun', 'Abeokuta'),
(28, 'Ondo', 'Akure'),
(29, 'Osun', 'Oshogbo'),
(31, 'Oyo', 'Ibadan'),
(32, 'Plateau', 'Jos'),
(33, 'Rivers', 'Port Harcourt'),
(34, 'Sokoto', 'Sokoto'),
(35, 'Taraba', 'Jalingo'),
(36, 'Yobe', 'Damaturu'),
(37, 'Zamfara', 'Gusau'),
(38, 'FCT', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `surname` varchar(70) NOT NULL,
  `first_name` varchar(70) NOT NULL,
  `middle_name` varchar(70) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `state` varchar(50) NOT NULL,
  `lga_name` varchar(50) NOT NULL,
  `city` varchar(30) DEFAULT NULL,
  `religion` varchar(40) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passport` longblob,
  `signature` longblob NOT NULL,
  `hobbies` varchar(300) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_academics`
--

CREATE TABLE `student_academics` (
  `id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `mode_of_entry` varchar(10) NOT NULL,
  `mode_of_study` varchar(10) NOT NULL,
  `mat_no` varchar(200) DEFAULT NULL,
  `old_mat_no` varchar(200) DEFAULT NULL,
  `program_id` int(11) UNSIGNED NOT NULL,
  `level` int(20) DEFAULT NULL,
  `entry_session_id` int(11) UNSIGNED NOT NULL,
  `semester` int(20) DEFAULT NULL,
  `first_semester_load` float NOT NULL DEFAULT '24',
  `second_semester_load` float NOT NULL DEFAULT '24',
  `program_type` varchar(50) DEFAULT NULL,
  `TC` int(10) NOT NULL DEFAULT '0',
  `TGP` int(10) NOT NULL DEFAULT '0',
  `jamb_no` varchar(50) DEFAULT NULL,
  `jamb_score` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_billings`
--

CREATE TABLE `student_billings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `rrr` bigint(20) NOT NULL,
  `amount_paid` float NOT NULL DEFAULT '0',
  `debt` float NOT NULL DEFAULT '0',
  `modify_by` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_contacts`
--

CREATE TABLE `student_contacts` (
  `id` int(11) NOT NULL,
  `student_id` int(20) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `surname` varchar(70) DEFAULT NULL,
  `other_names` varchar(70) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_2` varchar(20) DEFAULT NULL,
  `email_2` varchar(50) DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_credit_loads`
--

CREATE TABLE `student_credit_loads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_load` bigint(20) NOT NULL DEFAULT '24',
  `semester` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_debts`
--

CREATE TABLE `student_debts` (
  `id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `debt` int(10) DEFAULT NULL,
  `modified_by` int(20) DEFAULT NULL,
  `passcode` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_medicals`
--

CREATE TABLE `student_medicals` (
  `id` int(11) NOT NULL,
  `student_id` int(20) NOT NULL,
  `physical` varchar(50) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  `condition` varchar(100) NOT NULL,
  `allergies` varchar(200) NOT NULL,
  `genotype` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_results`
--

CREATE TABLE `student_results` (
  `id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `program_course_id` int(11) UNSIGNED NOT NULL,
  `session_id` int(20) NOT NULL,
  `semester` int(20) NOT NULL,
  `CA1` int(20) NOT NULL DEFAULT '0',
  `CA2` int(20) NOT NULL DEFAULT '0',
  `CA3` int(20) NOT NULL DEFAULT '0',
  `CA4` int(20) NOT NULL DEFAULT '0',
  `exam` int(20) NOT NULL DEFAULT '0',
  `total` int(20) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `modified_by` int(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`) VALUES
(1, 'Civil and Mechanical'),
(2, 'Air Conditioning/Refrigeration'),
(3, 'Auto Body Repair & Spray Painting'),
(4, 'Auto Mechanics'),
(5, '\r\nAuto Mechanical Work'),
(6, 'Block Laying, Brick Laying and Concrete Works'),
(7, 'Building Construction'),
(8, 'Carpentry & Joinery'),
(9, 'Furniture Making'),
(10, 'Metal Work'),
(11, 'Machine Woodworking'),
(12, 'Plumbing & Pipe Fitting'),
(13, 'Printing Craft Practice'),
(14, 'Technical Drawing'),
(15, 'Upholstery'),
(16, 'Welding & Fabricating Eng. Craft Practice'),
(17, 'Wood Work'),
(18, 'Auto Electrical Work'),
(19, 'Basic Electricity'),
(20, 'Basic Electronics'),
(21, 'Computer Studies'),
(22, 'Data Processing'),
(23, 'Further Mathematics'),
(24, 'GSM Phone Maintenance & Repair'),
(25, 'General Mathematics'),
(26, 'Radio, Tv & Electr. Work'),
(27, 'Arabic'),
(28, 'Edo'),
(29, 'Efik'),
(30, 'English Language'),
(31, 'French'),
(32, 'Hausa'),
(33, 'Ibibio'),
(34, 'Igbo'),
(35, 'Literature'),
(36, 'Yoruba'),
(37, 'Agricultural Science'),
(38, 'Animal Husbandry'),
(39, 'Biology'),
(40, 'Chemistry'),
(41, 'Elect Installation & Maintenance Work'),
(42, 'Health Education'),
(43, 'Physics'),
(44, 'Physical Education'),
(45, 'Fisheries'),
(46, 'Automobile Parts Merchandising'),
(47, 'Book keeping'),
(48, 'Commerce'),
(49, 'Financial Accounting'),
(50, 'Insurance'),
(51, 'Marketing'),
(52, 'Office Practice'),
(53, 'Salesmanship'),
(54, 'Sternography'),
(55, 'Store Keeping'),
(56, 'Store Management'),
(57, 'Type Writing'),
(58, 'Civic Education'),
(59, 'C.R.K'),
(60, 'Dyeing & Bleaching'),
(61, 'Economics'),
(62, 'Geography'),
(63, 'Goverment'),
(64, 'History'),
(65, 'Islamic Studies'),
(66, 'Leather Goods Manufacturing & Repairs'),
(67, 'Mining'),
(68, 'Music'),
(69, 'Photography'),
(70, 'Painting & Decorating'),
(71, 'Tourism'),
(72, 'Visual Art'),
(73, 'Catering Craft Practice'),
(74, 'Clothing & Texture'),
(75, 'Cosmetology'),
(76, 'Food & Nutrition'),
(77, 'Garment Making'),
(78, 'Home Management');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task` varchar(50) NOT NULL,
  `task_description` varchar(100) NOT NULL,
  `task_function` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `task_description`, `task_function`) VALUES
(1, 'Login', 'Enable admins login', 'login'),
(2, 'Admin Signup', 'Allow an admin to Signup Another admin', 'register'),
(3, 'Recommend', 'Recommends applicants for approval ', 'recommend'),
(5, 'View all Applicant', 'Allow an admin to View all applicant ', 'allApplicants'),
(6, 'Logout Admin', 'Logs out admins', 'logoutAdmin'),
(7, 'View All RRR Generated ', 'Views all Generated RRR payments made by applicants', 'adminAllPayments'),
(8, 'View all approved applicants', 'Views all approved applicants', 'allApprovedApplicants'),
(9, 'View all Direct Entry Applicants', 'View all direct entry applicants', 'DE'),
(10, 'View all Post Graduate Applicants', 'View all post graduate applicants', 'PG'),
(11, 'View all Transfer Applicants', 'View all transfer applicants', 'transfer'),
(12, 'View all UTME Applicants', 'View all utme applicants', 'utme'),
(13, 'UTME Payment', 'View all payments made by UTME Applicants', 'utmePayment'),
(14, 'Direct Entry Payments', 'View all payments made by Direct Entry Applicants', 'dePayment'),
(15, 'Transfer Payments', 'View all payments made by Transfer Applicants', 'transferPayment'),
(16, 'Post Graduate Payments', 'View all payments made by post graduate applicants', 'pgPayment'),
(17, 'Approval of Applicants', 'Allows approval of applicants', 'approved'),
(18, 'Force Approval', 'Allows force approval of applicants', 'forceApproved'),
(19, 'Rejection of Applicants', 'Allows admin reject unqualified applicants', 'rejection'),
(20, 'View Applicant\'s details', 'Allows admin view the full details of an applicant..', 'viewApplicants'),
(21, 'View Qualified Applicants', 'Allows admin view all qualified applicants', 'viewQualifiedApplicants'),
(22, 'Approve Qualified Applicants', 'Allows admin approve all qualified applicants in batches', 'approveAllQualifiedApplicants'),
(23, 'View Unqualified Applicants', 'Allows admin view all unqualified applicants', 'viewAllUnqualifiedApplicants'),
(24, 'Reject Unqualified Applicants', 'Allows admin reject all unqualified applicants in batches', 'rejectAllUnqualifiedApplicants'),
(25, 'Filter Post Graduate Applicants', 'Allows admin filter post graduate applicants', 'filterPgApplicants'),
(26, 'Filter Direct Entry Applicants', 'Allows admin filter direct entry applicants', 'filterDeApplicants'),
(27, 'Filter UTME Applicants', 'Allows admin filter UTME applicants', 'filterUtmeApplicants'),
(28, 'Filter Transfer Applicants', 'Allows admin filter transfer applicants', 'filterTransferApplicants'),
(29, 'Add Roles', 'Allows admin assign roles', 'adminRole'),
(31, 'Add Tasks to Roles', 'Adds tasks to roles for admins', 'adminTaskToRole'),
(32, 'Submit tasks to roles', 'Submits the selected tasks to roles', 'submitTaskToRole'),
(33, 'Get tasks in role', 'Gets all the tasks that belongs to a particular roles', 'getRoleTasks'),
(34, 'Remove task from role', 'Removes the selected tasks from a particular role', 'adminRemoveTaskFromRole'),
(35, 'Gets tasks to role', 'Shows only the tasks that belongs to a role', 'getTaskToRole'),
(36, 'Remove task from role', 'Removes tasks from a selected role', 'submitRemoveTaskFromRole'),
(37, 'Role to admin', 'Assigns Role to admin', 'roleToAdmin'),
(38, 'Assign roles to admin', 'Get roles and add to admin', 'getRoleAdmin'),
(39, 'Selects roles to admin', 'Submit selected roles to admin', 'submitRoleToAdmin'),
(40, 'Remove role from admin', 'Removes selected roles from admin', 'removeRoleFromAdmin'),
(41, 'Submits removal of roles from admin', 'Submits Removal of selected roles from admin', 'submitRemoveRoleFromAdmin'),
(42, 'Get roles in Admin', 'Gets roles assigned to a particular admin', 'getRoleToAdmin'),
(43, 'View Admins', 'View all administrators', 'viewAdmins'),
(44, 'Delete Admin', 'Deletes selected Admin', 'deleteAdmin'),
(45, 'Verify RRR Payment ', 'To allow admin verify payment after remita issues ', 'verifyPayment'),
(46, 'Change Applicant Course of Study', 'to be able to change the applicant choice of study ', 'changecourse'),
(47, 'Reset User Password', 'resetuserpassword', 'resetuserpassword'),
(48, 'Reset Admin Password', 'resetadminpassword', 'resetadminpassword'),
(49, 'Edit Users Info', 'editusersinfo', 'editusersinfo'),
(50, 'Add Remita Serice Type', 'addRemitaServiceType', 'addRemitaServiceType'),
(51, 'View Remita Service Type', 'viewRemitaServiceType', 'viewRemitaServiceType'),
(52, 'View show FeeType', 'showFeeType', 'showFeeType'),
(53, 'Edit Remita Service Type', 'editRemitaServiceType', 'editRemitaServiceType'),
(54, 'Suspend Remita Service Type', 'suspendRemitaServiceType', 'suspendRemitaServiceType'),
(55, 'Activate Remita Service Type', 'activeRemitaServiceType', 'activeRemitaServiceType'),
(56, 'pgverifypayment', 'pgverifypayment', 'pgverifypayment'),
(57, 'approveScores', 'approveScores', 'approveScores');

-- --------------------------------------------------------

--
-- Table structure for table `task_to_role`
--

CREATE TABLE `task_to_role` (
  `id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_to_role`
--

INSERT INTO `task_to_role` (`id`, `task_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 23, 1),
(24, 24, 1),
(25, 25, 1),
(26, 26, 1),
(27, 27, 1),
(28, 28, 1),
(29, 29, 1),
(30, 30, 1),
(31, 31, 1),
(32, 32, 1),
(33, 33, 1),
(34, 34, 1),
(35, 35, 1),
(36, 36, 1),
(37, 37, 1),
(38, 38, 1),
(39, 39, 1),
(40, 40, 1),
(41, 41, 1),
(42, 42, 1),
(43, 43, 1),
(44, 44, 1),
(45, 45, 1),
(46, 45, 1),
(47, 1, 2),
(49, 5, 2),
(50, 7, 2),
(51, 13, 2),
(52, 14, 2),
(53, 15, 2),
(54, 16, 2),
(59, 20, 3),
(60, 21, 3),
(61, 22, 3),
(62, 46, 3),
(66, 10, 3),
(67, 11, 3),
(68, 12, 3),
(69, 13, 3),
(70, 15, 3),
(71, 17, 3),
(72, 23, 3),
(73, 24, 3),
(74, 46, 1),
(75, 1, 1),
(76, 2, 1),
(77, 3, 1),
(78, 5, 1),
(79, 6, 1),
(80, 7, 1),
(81, 8, 1),
(82, 9, 1),
(83, 10, 1),
(84, 11, 1),
(85, 12, 1),
(86, 13, 1),
(87, 14, 1),
(88, 15, 1),
(89, 16, 1),
(90, 17, 1),
(91, 18, 1),
(92, 19, 1),
(93, 1, 1),
(94, 2, 1),
(95, 3, 1),
(96, 5, 1),
(97, 6, 1),
(98, 7, 1),
(99, 8, 1),
(100, 9, 1),
(101, 10, 1),
(102, 11, 1),
(103, 12, 1),
(104, 13, 1),
(105, 14, 1),
(106, 15, 1),
(107, 16, 1),
(108, 17, 1),
(109, 18, 1),
(110, 19, 1),
(111, 1, 1),
(112, 2, 1),
(113, 3, 1),
(114, 5, 1),
(115, 6, 1),
(116, 7, 1),
(117, 8, 1),
(118, 9, 1),
(119, 10, 1),
(120, 11, 1),
(121, 12, 1),
(122, 13, 1),
(123, 14, 1),
(124, 15, 1),
(125, 16, 1),
(126, 17, 1),
(127, 18, 1),
(128, 19, 1),
(129, 1, 1),
(130, 2, 1),
(131, 3, 1),
(132, 5, 1),
(133, 6, 1),
(134, 7, 1),
(135, 8, 1),
(136, 9, 1),
(137, 10, 1),
(138, 11, 1),
(139, 12, 1),
(140, 13, 1),
(141, 14, 1),
(142, 15, 1),
(143, 16, 1),
(144, 17, 1),
(145, 18, 1),
(146, 19, 1),
(147, 1, 1),
(148, 1, 1),
(149, 1, 1),
(150, 45, 1),
(151, 46, 1),
(152, 50, 1),
(153, 50, 1),
(154, 51, 1),
(155, 52, 1),
(156, 53, 1),
(157, 54, 1),
(158, 55, 1),
(159, 56, 1),
(160, 49, 1),
(161, 49, 1),
(162, 47, 1),
(163, 48, 1),
(164, 49, 1),
(166, 57, 1),
(167, 47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `matric_no` varchar(100) NOT NULL,
  `entry_year` int(6) NOT NULL,
  `level` int(5) NOT NULL,
  `course` varchar(100) NOT NULL,
  `cgpa` varchar(5) NOT NULL,
  `course_applied` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `jamb` longblob,
  `jamb_type` varchar(4) DEFAULT NULL,
  `olevel1` longblob,
  `olevel1_type` varchar(4) DEFAULT NULL,
  `olevel2` longblob,
  `olevel2_type` varchar(4) DEFAULT NULL,
  `olevel_awaiting` varchar(25) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status_logout` int(11) NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_type` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `surname`, `first_name`, `middle_name`, `phone`, `email`, `email_verified_at`, `status_logout`, `password`, `applicant_type`, `remember_token`, `session_id`, `created_at`, `updated_at`) VALUES
(33, 'qwert', 'qwer', 'qwe', '12345678', 't@gmail.com', '2025-01-10 11:48:53', 1, '$2y$10$ZP24r3WObEyWKD/x4nTt1u5K1w.7qDQMh7bZ29Z.H/jd1hNjcLDBG', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usersbiodata`
--

CREATE TABLE `usersbiodata` (
  `id` int(11) NOT NULL,
  `user_id` bigint(11) NOT NULL,
  `middle_name` varchar(70) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `religion` varchar(25) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `lga` varchar(50) DEFAULT NULL,
  `state_origin` varchar(50) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `passport` longblob,
  `passport_type` varchar(4) DEFAULT NULL,
  `status` int(5) DEFAULT '0',
  `session_id` int(11) DEFAULT NULL,
  `referral` varchar(100) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `utme`
--

CREATE TABLE `utme` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `jamb_reg_no` varchar(15) NOT NULL,
  `score` int(5) NOT NULL,
  `course_applied` varchar(255) NOT NULL,
  `first_choice` varchar(100) NOT NULL,
  `second_choice` varchar(100) NOT NULL,
  `subject_1` varchar(100) NOT NULL,
  `subject_2` varchar(100) NOT NULL,
  `subject_3` varchar(100) NOT NULL,
  `subject_4` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_departments`
--
ALTER TABLE `academic_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `admin_departments`
--
ALTER TABLE `admin_departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acad_dept_id` (`academic_department_id`);

--
-- Indexes for table `admission_sessions`
--
ALTER TABLE `admission_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_types`
--
ALTER TABLE `admission_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applicant_type`
--
ALTER TABLE `applicant_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approved_applicants`
--
ALTER TABLE `approved_applicants`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  ADD KEY `audits_user_id_user_type_index` (`staff_id`,`staff_type`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `bursary_sessions`
--
ALTER TABLE `bursary_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_slider`
--
ALTER TABLE `cms_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `country_codes`
--
ALTER TABLE `country_codes`
  ADD PRIMARY KEY (`countrycode`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_registrations`
--
ALTER TABLE `course_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `de`
--
ALTER TABLE `de`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `employment_types`
--
ALTER TABLE `employment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_questions`
--
ALTER TABLE `evaluation_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_question_response`
--
ALTER TABLE `evaluation_question_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_responses`
--
ALTER TABLE `evaluation_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_response_types`
--
ALTER TABLE `evaluation_response_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_results`
--
ALTER TABLE `evaluation_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_types`
--
ALTER TABLE `fee_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_scales`
--
ALTER TABLE `grade_scales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_settings`
--
ALTER TABLE `grade_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matric_counts`
--
ALTER TABLE `matric_counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `olevel`
--
ALTER TABLE `olevel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissionstest`
--
ALTER TABLE `permissionstest`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pgs`
--
ALTER TABLE `pgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pg_educations`
--
ALTER TABLE `pg_educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pg_referees`
--
ALTER TABLE `pg_referees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_courses`
--
ALTER TABLE `program_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `recommended_applicants`
--
ALTER TABLE `recommended_applicants`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `registered_courses`
--
ALTER TABLE `registered_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `session` (`session`),
  ADD KEY `level` (`level`),
  ADD KEY `semester` (`semester`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `remitas`
--
ALTER TABLE `remitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remitas_verifications`
--
ALTER TABLE `remitas_verifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rrr` (`rrr`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `result_id` (`result_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_staff`
--
ALTER TABLE `role_staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `perm_type_id` (`role_id`);

--
-- Indexes for table `role_to_admin`
--
ALTER TABLE `role_to_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester_registrations`
--
ALTER TABLE `semester_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester_remark_courses`
--
ALTER TABLE `semester_remark_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester_result_outstandings`
--
ALTER TABLE `semester_result_outstandings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `sessions_admission`
--
ALTER TABLE `sessions_admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soteria_devices`
--
ALTER TABLE `soteria_devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `devices_mac_address_unique` (`mac_address`);

--
-- Indexes for table `soteria_officials`
--
ALTER TABLE `soteria_officials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `officials_mac_address_unique` (`mac_address`),
  ADD UNIQUE KEY `serial_no_2` (`serial_no`),
  ADD KEY `serial_no` (`serial_no`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_contacts`
--
ALTER TABLE `staff_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staff_courses`
--
ALTER TABLE `staff_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_positions`
--
ALTER TABLE `staff_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_role_assignment_logs`
--
ALTER TABLE `staff_role_assignment_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_role_assignment_logs_staff_id_foreign` (`staff_id`),
  ADD KEY `staff_role_assignment_logs_role_id_foreign` (`role_id`),
  ADD KEY `staff_role_assignment_logs_assigned_by_foreign` (`assigned_by`),
  ADD KEY `remove_by` (`removed_by`);

--
-- Indexes for table `staff_types`
--
ALTER TABLE `staff_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_work_profiles`
--
ALTER TABLE `staff_work_profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_id` (`staff_id`),
  ADD KEY `staff_id_2` (`staff_id`),
  ADD KEY `admin_dept_id` (`admin_department_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surname` (`surname`),
  ADD KEY `surname_2` (`surname`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `middle_name` (`middle_name`),
  ADD KEY `phone` (`phone`);

--
-- Indexes for table `student_academics`
--
ALTER TABLE `student_academics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mat_no` (`mat_no`);

--
-- Indexes for table `student_billings`
--
ALTER TABLE `student_billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_contacts`
--
ALTER TABLE `student_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surname` (`surname`),
  ADD KEY `other_names` (`other_names`),
  ADD KEY `phone` (`phone`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `student_credit_loads`
--
ALTER TABLE `student_credit_loads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_debts`
--
ALTER TABLE `student_debts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_medicals`
--
ALTER TABLE `student_medicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_results`
--
ALTER TABLE `student_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `program_course_id` (`program_course_id`),
  ADD KEY `semester` (`semester`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_to_role`
--
ALTER TABLE `task_to_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersbiodata`
--
ALTER TABLE `usersbiodata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `utme`
--
ALTER TABLE `utme`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_departments`
--
ALTER TABLE `academic_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `admin_departments`
--
ALTER TABLE `admin_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `admission_sessions`
--
ALTER TABLE `admission_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admission_types`
--
ALTER TABLE `admission_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=887;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bank_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `bursary_sessions`
--
ALTER TABLE `bursary_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cms_slider`
--
ALTER TABLE `cms_slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4305;

--
-- AUTO_INCREMENT for table `course_registrations`
--
ALTER TABLE `course_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `de`
--
ALTER TABLE `de`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employment_types`
--
ALTER TABLE `employment_types`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `evaluation_questions`
--
ALTER TABLE `evaluation_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `evaluation_question_response`
--
ALTER TABLE `evaluation_question_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `evaluation_responses`
--
ALTER TABLE `evaluation_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `evaluation_response_types`
--
ALTER TABLE `evaluation_response_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `evaluation_results`
--
ALTER TABLE `evaluation_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=518874;

--
-- AUTO_INCREMENT for table `fee_types`
--
ALTER TABLE `fee_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=883;

--
-- AUTO_INCREMENT for table `grade_scales`
--
ALTER TABLE `grade_scales`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grade_settings`
--
ALTER TABLE `grade_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matric_counts`
--
ALTER TABLE `matric_counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `permissionstest`
--
ALTER TABLE `permissionstest`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `pgs`
--
ALTER TABLE `pgs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pg_educations`
--
ALTER TABLE `pg_educations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `pg_referees`
--
ALTER TABLE `pg_referees`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `program_courses`
--
ALTER TABLE `program_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24630;

--
-- AUTO_INCREMENT for table `registered_courses`
--
ALTER TABLE `registered_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=408036;

--
-- AUTO_INCREMENT for table `remitas`
--
ALTER TABLE `remitas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100002;

--
-- AUTO_INCREMENT for table `remitas_verifications`
--
ALTER TABLE `remitas_verifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `role_staff`
--
ALTER TABLE `role_staff`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `role_to_admin`
--
ALTER TABLE `role_to_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `semester_registrations`
--
ALTER TABLE `semester_registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40323;

--
-- AUTO_INCREMENT for table `semester_remark_courses`
--
ALTER TABLE `semester_remark_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111664;

--
-- AUTO_INCREMENT for table `semester_result_outstandings`
--
ALTER TABLE `semester_result_outstandings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8217;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sessions_admission`
--
ALTER TABLE `sessions_admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soteria_devices`
--
ALTER TABLE `soteria_devices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=677;

--
-- AUTO_INCREMENT for table `soteria_officials`
--
ALTER TABLE `soteria_officials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=543;

--
-- AUTO_INCREMENT for table `staff_contacts`
--
ALTER TABLE `staff_contacts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=543;

--
-- AUTO_INCREMENT for table `staff_courses`
--
ALTER TABLE `staff_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23981;

--
-- AUTO_INCREMENT for table `staff_positions`
--
ALTER TABLE `staff_positions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `staff_role_assignment_logs`
--
ALTER TABLE `staff_role_assignment_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_types`
--
ALTER TABLE `staff_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_work_profiles`
--
ALTER TABLE `staff_work_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=543;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5634;

--
-- AUTO_INCREMENT for table `student_academics`
--
ALTER TABLE `student_academics`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8239;

--
-- AUTO_INCREMENT for table `student_billings`
--
ALTER TABLE `student_billings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `student_contacts`
--
ALTER TABLE `student_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5628;

--
-- AUTO_INCREMENT for table `student_credit_loads`
--
ALTER TABLE `student_credit_loads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;

--
-- AUTO_INCREMENT for table `student_debts`
--
ALTER TABLE `student_debts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5123;

--
-- AUTO_INCREMENT for table `student_medicals`
--
ALTER TABLE `student_medicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5594;

--
-- AUTO_INCREMENT for table `student_results`
--
ALTER TABLE `student_results`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314728;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `task_to_role`
--
ALTER TABLE `task_to_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `usersbiodata`
--
ALTER TABLE `usersbiodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `utme`
--
ALTER TABLE `utme`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff_role_assignment_logs`
--
ALTER TABLE `staff_role_assignment_logs`
  ADD CONSTRAINT `staff_role_assignment_logs_assigned_by_foreign` FOREIGN KEY (`assigned_by`) REFERENCES `staff` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `staff_role_assignment_logs_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `staff_role_assignment_logs_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
