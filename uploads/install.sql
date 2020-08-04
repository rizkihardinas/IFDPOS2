-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2019 at 09:51 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_easypos`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `apply_date` datetime NOT NULL,
  `status_application_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applicationsstatus`
--

CREATE TABLE `applicationsstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` char(3) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `name`, `code`, `status`) VALUES
(1, 'AMERICAN EXPRESS BANK LTD', '030', '1'),
(2, 'ANGLOMAS INTERNASIONAL BANK', '531', '1'),
(3, 'ANZ PANIN BANK', '061', '1'),
(4, 'BANK ABN AMRO', '052', '1'),
(5, 'BANK AGRO NIAGA', '494', '1'),
(6, 'BANK AKITA', '525', '1'),
(7, 'BANK ALFINDO', '503', '1'),
(8, 'BANK ANTARDAERAH', '088', '1'),
(9, 'BANK ARTA NIAGA KENCANA', '020', '1'),
(10, 'BANK ARTHA GRAHA', '037', '1'),
(11, 'BANK ARTOS IND', '542', '1'),
(12, 'BANK BCA', '014', '1'),
(13, 'BANK BENGKULU', '133', '1'),
(14, 'BANK BII', '016', '1'),
(15, 'BANK BINTANG MANUNGGAL', '484', '1'),
(16, 'BANK BISNIS INTERNASIONAL', '459', '1'),
(17, 'BANK BNI', '009', '1'),
(18, 'BANK BNP PARIBAS INDONESIA', '057', '1'),
(19, 'BANK BRI', '002', '1'),
(20, 'BANK BUANA IND', '023', '1'),
(21, 'BANK BUKOPIN', '441', '1'),
(22, 'BANK BUMI ARTA', '076', '1'),
(23, 'BANK BUMIPUTERA', '485', '1'),
(24, 'BANK CAPITAL INDONESIA, TBK.', '054', '1'),
(25, 'BANK CENTURY, TBK.', '095', '1'),
(26, 'BANK CHINA TRUST INDONESIA', '949', '1'),
(27, 'BANK COMMONWEALTH', '950', '1'),
(28, 'BANK CREDIT AGRICOLE INDOSUEZ', '039', '1'),
(29, 'BANK DANAMON', '011', '1'),
(30, 'BANK DBS INDONESIA', '046', '1'),
(31, 'BANK DIPO INTERNATIONAL', '523', '1'),
(32, 'BANK DKI', '111', '1'),
(33, 'BANK EKONOMI', '087', '1'),
(34, 'BANK EKSEKUTIF', '558', '1'),
(35, 'BANK EKSPOR INDONESIA', '003', '1'),
(36, 'BANK FAMA INTERNASIONAL', '562', '1'),
(37, 'BANK FINCONESIA', '945', '1'),
(38, 'BANK GANESHA', '161', '1'),
(39, 'BANK HAGA', '089', '1'),
(40, 'BANK HAGAKITA', '159', '1'),
(41, 'BANK HARDA', '567', '1'),
(42, 'BANK HARFA', '517', '1'),
(43, 'BANK HARMONI INTERNATIONAL', '166', '1'),
(44, 'BANK HIMPUNAN SAUDARA 1906, TBK .', '212', '1'),
(45, 'BANK IFI', '093', '1'),
(46, 'BANK INA PERDANA', '513', '1'),
(47, 'BANK INDEX SELINDO', '555', '1'),
(48, 'BANK INDOMONEX', '498', '1'),
(49, 'BANK JABAR', '110', '1'),
(50, 'BANK JASA ARTA', '422', '1'),
(51, 'BANK JASA JAKARTA', '472', '1'),
(52, 'BANK JATENG', '113', '1'),
(53, 'BANK JATIM', '114', '1'),
(54, 'BANK KEPPEL TATLEE BUANA', '053', '1'),
(55, 'BANK KESAWAN', '167', '1'),
(56, 'BANK KESEJAHTERAAN EKONOMI', '535', '1'),
(57, 'BANK LAMPUNG', '121', '1'),
(58, 'BANK LIPPO', '026', '1'),
(59, 'BANK MALUKU', '131', '1'),
(60, 'BANK MANDIRI', '008', '1'),
(61, 'BANK MASPION', '157', '1'),
(62, 'BANK MAYAPADA', '097', '1'),
(63, 'BANK MAYBANK INDOCORP', '947', '1'),
(64, 'BANK MAYORA', '553', '1'),
(65, 'BANK MEGA', '426', '1'),
(66, 'BANK MERINCORP', '946', '1'),
(67, 'BANK MESTIKA', '151', '1'),
(68, 'BANK METRO EXPRESS', '152', '1'),
(69, 'BANK MITRANIAGA', '491', '1'),
(70, 'BANK MIZUHO INDONESIA', '048', '1'),
(71, 'BANK MUAMALAT', '147', '1'),
(72, 'BANK MULTI ARTA SENTOSA', '548', '1'),
(73, 'BANK MULTICOR TBK.', '036', '1'),
(74, 'BANK NAGARI', '118', '1'),
(75, 'BANK NIAGA', '022', '1'),
(76, 'BANK NISP', '028', '1'),
(77, 'BANK NTT', '130', '1'),
(78, 'BANK NUSANTARA PARAHYANGAN', '145', '1'),
(79, 'BANK OCBC – INDONESIA', '948', '1'),
(80, 'BANK OF AMERICA, N.A', '033', '1'),
(81, 'BANK OF CHINA LIMITED', '069', '1'),
(82, 'BANK PANIN', '019', '1'),
(83, 'BANK PERSYARIKATAN INDONESIA', '521', '1'),
(84, 'BANK PURBA DANARTA', '547', '1'),
(85, 'BANK RESONA PERDANIA', '047', '1'),
(86, 'BANK RIAU', '119', '1'),
(87, 'BANK ROYAL INDONESIA', '501', '1'),
(88, 'BANK SHINTA INDONESIA', '153', '1'),
(89, 'BANK SINAR HARAPAN BALI', '564', '1'),
(90, 'BANK SRI PARTHA', '466', '1'),
(91, 'BANK SULTRA', '135', '1'),
(92, 'BANK SULUT', '127', '1'),
(93, 'BANK SUMITOMO MITSUI INDONESIA', '045', '1'),
(94, 'BANK SUMSEL', '120', '1'),
(95, 'BANK SUMUT', '117', '1'),
(96, 'BANK SWADESI', '146', '1'),
(97, 'BANK SWAGUNA', '405', '1'),
(98, 'BANK SYARIAH MANDIRI', '451', '1'),
(99, 'BANK SYARIAH MEGA', '506', '1'),
(100, 'BANK TABUNGAN NEGARA (PERSERO)', '200', '1'),
(101, 'BANK TABUNGAN PENSIUNAN NASIONAL', '213', '1'),
(102, 'BANK UIB', '536', '1'),
(103, 'BANK UOB INDONESIA', '058', '1'),
(104, 'BANK VICTORIA INTERNATIONAL', '566', '1'),
(105, 'BANK WINDU KENTJANA', '162', '1'),
(106, 'BANK WOORI INDONESIA', '068', '1'),
(107, 'BANK YUDHA BHAKTI', '490', '1'),
(108, 'BPD ACEH', '116', '1'),
(109, 'BPD BALI', '129', '1'),
(110, 'BPD DIY', '112', '1'),
(111, 'BPD JAMBI', '115', '1'),
(112, 'BPD KALIMANTAN BARAT', '123', '1'),
(113, 'BPD KALSEL', '122', '1'),
(114, 'BPD KALTENG', '125', '1'),
(115, 'BPD KALTIM', '124', '1'),
(116, 'BPD NTB', '128', '1'),
(117, 'BPD PAPUA', '132', '1'),
(118, 'BPD SULAWESI TENGAH', '134', '1'),
(119, 'BPD SULSEL', '126', '1'),
(120, 'CENTRATAMA NASIONAL BANK', '559', '1'),
(121, 'CITIBANK N.A.', '031', '1'),
(122, 'DEUTSCHE BANK AG.', '067', '1'),
(123, 'HALIM INDONESIA BANK', '164', '1'),
(124, 'ING INDONESIA BANK', '034', '1'),
(125, 'JP. MORGAN CHASE BANK, N.A.', '032', '1'),
(126, 'KOREA EXCHANGE BANK DANAMON', '059', '1'),
(127, 'LIMAN INTERNATIONAL BANK', '526', '1'),
(128, 'PERMATA BANK', '013', '1'),
(129, 'PRIMA MASTER BANK', '520', '1'),
(130, 'RABOBANK INTERNASIONAL INDONESIA', '060', '1'),
(131, 'STANDARD CHARTERED BANK', '050', '1'),
(132, 'THE BANGKOK BANK COMP. LTD', '040', '1'),
(133, 'THE BANK OF TOKYO MITSUBISHI UFJ LTD', '042', '1'),
(134, 'THE HONGKONG & SHANGHAI B.C.', '041', '1');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categoryproduct`
--

CREATE TABLE `categoryproduct` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `division_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `hex` char(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `iso` char(3) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `iso`, `name`, `status`) VALUES
(1, 'KRW', '(South) Korean Won', '1'),
(2, 'AFA', 'Afghanistan Afghani', '1'),
(3, 'ALL', 'Albanian Lek', '1'),
(4, 'DZD', 'Algerian Dinar', '1'),
(5, 'ADP', 'Andorran Peseta', '1'),
(6, 'AOK', 'Angolan Kwanza', '1'),
(7, 'ARS', 'Argentine Peso', '1'),
(8, 'AMD', 'Armenian Dram', '1'),
(9, 'AWG', 'Aruban Florin', '1'),
(10, 'AUD', 'Australian Dollar', '1'),
(11, 'BSD', 'Bahamian Dollar', '1'),
(12, 'BHD', 'Bahraini Dinar', '1'),
(13, 'BDT', 'Bangladeshi Taka', '1'),
(14, 'BBD', 'Barbados Dollar', '1'),
(15, 'BZD', 'Belize Dollar', '1'),
(16, 'BMD', 'Bermudian Dollar', '1'),
(17, 'BTN', 'Bhutan Ngultrum', '1'),
(18, 'BOB', 'Bolivian Boliviano', '1'),
(19, 'BWP', 'Botswanian Pula', '1'),
(20, 'BRL', 'Brazilian Real', '1'),
(21, 'GBP', 'British Pound', '1'),
(22, 'BND', 'Brunei Dollar', '1'),
(23, 'BGN', 'Bulgarian Lev', '1'),
(24, 'BUK', 'Burma Kyat', '1'),
(25, 'BIF', 'Burundi Franc', '1'),
(26, 'CAD', 'Canadian Dollar', '1'),
(27, 'CVE', 'Cape Verde Escudo', '1'),
(28, 'KYD', 'Cayman Islands Dollar', '1'),
(29, 'CLP', 'Chilean Peso', '1'),
(30, 'CLF', 'Chilean Unidades de Fomento', '1'),
(31, 'COP', 'Colombian Peso', '1'),
(32, 'XOF', 'Communauté Financière Africaine BCEAO - Francs', '1'),
(33, 'XAF', 'Communauté Financière Africaine BEAC, Francs', '1'),
(34, 'KMF', 'Comoros Franc', '1'),
(35, 'XPF', 'Comptoirs Français du Pacifique Francs', '1'),
(36, 'CRC', 'Costa Rican Colon', '1'),
(37, 'CUP', 'Cuban Peso', '1'),
(38, 'CYP', 'Cyprus Pound', '1'),
(39, 'CZK', 'Czech Republic Koruna', '1'),
(40, 'DKK', 'Danish Krone', '1'),
(41, 'YDD', 'Democratic Yemeni Dinar', '1'),
(42, 'DOP', 'Dominican Peso', '1'),
(43, 'XCD', 'East Caribbean Dollar', '1'),
(44, 'TPE', 'East Timor Escudo', '1'),
(45, 'ECS', 'Ecuador Sucre', '1'),
(46, 'EGP', 'Egyptian Pound', '1'),
(47, 'SVC', 'El Salvador Colon', '1'),
(48, 'EEK', 'Estonian Kroon (EEK)', '1'),
(49, 'ETB', 'Ethiopian Birr', '1'),
(50, 'EUR', 'Euro', '1'),
(51, 'FKP', 'Falkland Islands Pound', '1'),
(52, 'FJD', 'Fiji Dollar', '1'),
(53, 'GMD', 'Gambian Dalasi', '1'),
(54, 'GHC', 'Ghanaian Cedi', '1'),
(55, 'GIP', 'Gibraltar Pound', '1'),
(56, 'XAU', 'Gold, Ounces', '1'),
(57, 'GTQ', 'Guatemalan Quetzal', '1'),
(58, 'GNF', 'Guinea Franc', '1'),
(59, 'GWP', 'Guinea-Bissau Peso', '1'),
(60, 'GYD', 'Guyanan Dollar', '1'),
(61, 'HTG', 'Haitian Gourde', '1'),
(62, 'HNL', 'Honduran Lempira', '1'),
(63, 'HKD', 'Hong Kong Dollar', '1'),
(64, 'HUF', 'Hungarian Forint', '1'),
(65, 'INR', 'Indian Rupee', '1'),
(66, 'IDR', 'Indonesian Rupiah', '1'),
(67, 'XDR', 'International Monetary Fund (IMF) Special Drawing Rights', '1'),
(68, 'IRR', 'Iranian Rial', '1'),
(69, 'IQD', 'Iraqi Dinar', '1'),
(70, 'IEP', 'Irish Punt', '1'),
(71, 'ILS', 'Israeli Shekel', '1'),
(72, 'JMD', 'Jamaican Dollar', '1'),
(73, 'JPY', 'Japanese Yen', '1'),
(74, 'JOD', 'Jordanian Dinar', '1'),
(75, 'KHR', 'Kampuchean (Cambodian) Riel', '1'),
(76, 'KES', 'Kenyan Schilling', '1'),
(77, 'KWD', 'Kuwaiti Dinar', '1'),
(78, 'LAK', 'Lao Kip', '1'),
(79, 'LBP', 'Lebanese Pound', '1'),
(80, 'LSL', 'Lesotho Loti', '1'),
(81, 'LRD', 'Liberian Dollar', '1'),
(82, 'LYD', 'Libyan Dinar', '1'),
(83, 'MOP', 'Macau Pataca', '1'),
(84, 'MGF', 'Malagasy Franc', '1'),
(85, 'MWK', 'Malawi Kwacha', '1'),
(86, 'MYR', 'Malaysian Ringgit', '1'),
(87, 'MVR', 'Maldive Rufiyaa', '1'),
(88, 'MTL', 'Maltese Lira', '1'),
(89, 'MRO', 'Mauritanian Ouguiya', '1'),
(90, 'MUR', 'Mauritius Rupee', '1'),
(91, 'MXP', 'Mexican Peso', '1'),
(92, 'MNT', 'Mongolian Tugrik', '1'),
(93, 'MAD', 'Moroccan Dirham', '1'),
(94, 'MZM', 'Mozambique Metical', '1'),
(95, 'NAD', 'Namibian Dollar', '1'),
(96, 'NPR', 'Nepalese Rupee', '1'),
(97, 'ANG', 'Netherlands Antillian Guilder', '1'),
(98, 'YUD', 'New Yugoslavia Dinar', '1'),
(99, 'NZD', 'New Zealand Dollar', '1'),
(100, 'NIO', 'Nicaraguan Cordoba', '1'),
(101, 'NGN', 'Nigerian Naira', '1'),
(102, 'KPW', 'North Korean Won', '1'),
(103, 'NOK', 'Norwegian Kroner', '1'),
(104, 'OMR', 'Omani Rial', '1'),
(105, 'PKR', 'Pakistan Rupee', '1'),
(106, 'XPD', 'Palladium Ounces', '1'),
(107, 'PAB', 'Panamanian Balboa', '1'),
(108, 'PGK', 'Papua New Guinea Kina', '1'),
(109, 'PYG', 'Paraguay Guarani', '1'),
(110, 'PEN', 'Peruvian Nuevo Sol', '1'),
(111, 'PHP', 'Philippine Peso', '1'),
(112, 'XPT', 'Platinum, Ounces', '1'),
(113, 'PLN', 'Polish Zloty', '1'),
(114, 'QAR', 'Qatari Rial', '1'),
(115, 'RON', 'Romanian Leu', '1'),
(116, 'RUB', 'Russian Ruble', '1'),
(117, 'RWF', 'Rwanda Franc', '1'),
(118, 'WST', 'Samoan Tala', '1'),
(119, 'STD', 'Sao Tome and Principe Dobra', '1'),
(120, 'SAR', 'Saudi Arabian Riyal', '1'),
(121, 'SCR', 'Seychelles Rupee', '1'),
(122, 'SLL', 'Sierra Leone Leone', '1'),
(123, 'XAG', 'Silver, Ounces', '1'),
(124, 'SGD', 'Singapore Dollar', '1'),
(125, 'SKK', 'Slovak Koruna', '1'),
(126, 'SBD', 'Solomon Islands Dollar', '1'),
(127, 'SOS', 'Somali Schilling', '1'),
(128, 'ZAR', 'South African Rand', '1'),
(129, 'LKR', 'Sri Lanka Rupee', '1'),
(130, 'SHP', 'St. Helena Pound', '1'),
(131, 'SDP', 'Sudanese Pound', '1'),
(132, 'SRG', 'Suriname Guilder', '1'),
(133, 'SZL', 'Swaziland Lilangeni', '1'),
(134, 'SEK', 'Swedish Krona', '1'),
(135, 'CHF', 'Swiss Franc', '1'),
(136, 'SYP', 'Syrian Potmd', '1'),
(137, 'TWD', 'Taiwan Dollar', '1'),
(138, 'TZS', 'Tanzanian Schilling', '1'),
(139, 'THB', 'Thai Baht', '1'),
(140, 'TOP', 'Tongan Paanga', '1'),
(141, 'TTD', 'Trinidad and Tobago Dollar', '1'),
(142, 'TND', 'Tunisian Dinar', '1'),
(143, 'TRY', 'Turkish Lira', '1'),
(144, 'UGX', 'Uganda Shilling', '1'),
(145, 'AED', 'United Arab Emirates Dirham', '1'),
(146, 'UYU', 'Uruguayan Peso', '1'),
(147, 'USD', 'US Dollar', '1'),
(148, 'VUV', 'Vanuatu Vatu', '1'),
(149, 'VEF', 'Venezualan Bolivar', '1'),
(150, 'VND', 'Vietnamese Dong', '1'),
(151, 'YER', 'Yemeni Rial', '1'),
(152, 'CNY', 'Yuan (Chinese) Renminbi', '1'),
(153, 'ZRZ', 'Zaire Zaire', '1'),
(154, 'ZMK', 'Zambian Kwacha', '1'),
(155, 'ZWD', 'Zimbabwe Dollar', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `province_id` int(11) NOT NULL,
  `disctrict_id` int(11) NOT NULL,
  `subdisctrict_id` int(11) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `status` enum('1','0') DEFAULT '1',
  `created_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `last_update` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `divisionproduct`
--

CREATE TABLE `divisionproduct` (
  `id` int(11) NOT NULL,
  `name` int(50) NOT NULL,
  `created_date` date NOT NULL,
  `last_update` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documentemployee`
--

CREATE TABLE `documentemployee` (
  `id` int(11) NOT NULL,
  `resume` text NOT NULL,
  `offer_letter` text NOT NULL,
  `contract_aggrement` text NOT NULL,
  `joining_letter` text NOT NULL,
  `other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` char(15) NOT NULL,
  `date_of_birth` datetime NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `address` text NOT NULL,
  `married_status` enum('married','single') NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `date_of_leaving` datetime NOT NULL,
  `bank_id` int(11) NOT NULL,
  `account_number` int(15) NOT NULL,
  `document_id` int(11) NOT NULL,
  `date_of_joining` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeestatus`
--

CREATE TABLE `employeestatus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goodreceiveitems`
--

CREATE TABLE `goodreceiveitems` (
  `id` int(11) NOT NULL,
  `good_receive_id` int(11) NOT NULL,
  `qty_order` double NOT NULL,
  `qty_receive` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `goodreceives`
--

CREATE TABLE `goodreceives` (
  `id` int(11) NOT NULL,
  `code` char(15) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `outlets_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `outlets_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobhistory`
--

CREATE TABLE `jobhistory` (
  `id_kategori` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `department` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `reason_leaving` text NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` text NOT NULL,
  `description` text NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `parent_menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` char(15) NOT NULL,
  `reciept_header` int(11) NOT NULL,
  `receipt_footer` int(11) NOT NULL,
  `logo` text NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parentmenu`
--

CREATE TABLE `parentmenu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` text NOT NULL,
  `description` text NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `code` char(15) NOT NULL,
  `total` double NOT NULL,
  `payroll_date` datetime NOT NULL,
  `employee_id` int(11) NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payrolldetail`
--

CREATE TABLE `payrolldetail` (
  `id` int(11) NOT NULL,
  `payroll_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE `productimage` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `path` text NOT NULL,
  `priority` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `barcode` char(13) NOT NULL,
  `name` varchar(50) NOT NULL,
  `short_name` varchar(25) NOT NULL,
  `purchase_price` double NOT NULL,
  `retail_price` double NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `brand_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `suppliers_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `type_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE `purchaseorder` (
  `id` int(11) NOT NULL,
  `code` char(15) NOT NULL,
  `due_date` datetime NOT NULL,
  `po_date` datetime NOT NULL,
  `total` double NOT NULL,
  `tax` double NOT NULL,
  `suppliers_id` int(11) NOT NULL,
  `outlets_id` int(11) NOT NULL,
  `po_status_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `id_user_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorderitems`
--

CREATE TABLE `purchaseorderitems` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `purchase_order_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `purchase_price` double NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorderstatus`
--

CREATE TABLE `purchaseorderstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `code` char(15) NOT NULL,
  `total` double NOT NULL,
  `discount_percent` double NOT NULL,
  `discount_amount` double NOT NULL,
  `customers_id` int(11) NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `status` enum('paid','unpaid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salesitems`
--

CREATE TABLE `salesitems` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `outlets_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `retail_price` double NOT NULL,
  `purchase_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salesorder`
--

CREATE TABLE `salesorder` (
  `id` int(11) NOT NULL,
  `code` char(15) NOT NULL,
  `total` double NOT NULL,
  `discount_percent` double NOT NULL,
  `discount_amount` double NOT NULL,
  `customers_id` int(11) NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `status` enum('paid','unpaid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salesorderitems`
--

CREATE TABLE `salesorderitems` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `outlets_id` int(11) NOT NULL,
  `qty` double NOT NULL,
  `retail_price` double NOT NULL,
  `purchase_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategoryproduct`
--

CREATE TABLE `subcategoryproduct` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `category_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `province_id` int(11) NOT NULL,
  `disctrict_id` int(11) NOT NULL,
  `subdisctrict_id` int(11) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `tax` double NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transferstock`
--

CREATE TABLE `transferstock` (
  `id` int(11) NOT NULL,
  `code` char(15) NOT NULL,
  `note` text NOT NULL,
  `from_outlets_id` int(11) NOT NULL,
  `to_outlets_id` int(11) NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transferstockitems`
--

CREATE TABLE `transferstockitems` (
  `id` int(11) NOT NULL,
  `transfer_stock_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `typesalary`
--

CREATE TABLE `typesalary` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `range_salary` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `user_id_created` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `user_last_update` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_application_id` (`status_application_id`),
  ADD KEY `employee_id` (`employee_id`,`vacancy_id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `applicationsstatus`
--
ALTER TABLE `applicationsstatus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `categoryproduct`
--
ALTER TABLE `categoryproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`),
  ADD KEY `division_product_id` (`division_product_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `disctrict_id` (`disctrict_id`),
  ADD KEY `subdisctrict_id` (`subdisctrict_id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `divisionproduct`
--
ALTER TABLE `divisionproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `documentemployee`
--
ALTER TABLE `documentemployee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `employeestatus`
--
ALTER TABLE `employeestatus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `goodreceiveitems`
--
ALTER TABLE `goodreceiveitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `good_receive_id` (`good_receive_id`);

--
-- Indexes for table `goodreceives`
--
ALTER TABLE `goodreceives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outlets_id` (`outlets_id`),
  ADD KEY `purchase_order_id` (`purchase_order_id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `outlets_id` (`outlets_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `jobhistory`
--
ALTER TABLE `jobhistory`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_menu_id` (`parent_menu_id`),
  ADD KEY `user_last_update` (`user_last_update`),
  ADD KEY `user_id_created` (`user_id_created`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `parentmenu`
--
ALTER TABLE `parentmenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `payrolldetail`
--
ALTER TABLE `payrolldetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payroll_id` (`payroll_id`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `sub_category_id` (`sub_category_id`),
  ADD KEY `suppliers_id` (`suppliers_id`),
  ADD KEY `unit_id` (`unit_id`),
  ADD KEY `type_product_id` (`type_product_id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_last_update` (`user_last_update`),
  ADD KEY `id_user_created` (`id_user_created`),
  ADD KEY `po_status_id` (`po_status_id`),
  ADD KEY `outlets_id` (`outlets_id`),
  ADD KEY `suppliers_id` (`suppliers_id`);

--
-- Indexes for table `purchaseorderitems`
--
ALTER TABLE `purchaseorderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `purchase_order_id` (`purchase_order_id`);

--
-- Indexes for table `purchaseorderstatus`
--
ALTER TABLE `purchaseorderstatus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`),
  ADD KEY `color_id` (`color_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_id` (`customers_id`,`user_id_created`,`user_last_update`,`payment_method_id`);

--
-- Indexes for table `salesitems`
--
ALTER TABLE `salesitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `outlets_id` (`outlets_id`);

--
-- Indexes for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_id` (`customers_id`,`user_id_created`,`user_last_update`,`payment_method_id`);

--
-- Indexes for table `salesorderitems`
--
ALTER TABLE `salesorderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `outlets_id` (`outlets_id`);

--
-- Indexes for table `subcategoryproduct`
--
ALTER TABLE `subcategoryproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`),
  ADD KEY `category_product_id` (`category_product_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `province_id` (`province_id`),
  ADD KEY `disctrict_id` (`disctrict_id`),
  ADD KEY `subdisctrict_id` (`subdisctrict_id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `transferstock`
--
ALTER TABLE `transferstock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_outlets_id` (`from_outlets_id`),
  ADD KEY `to_outlets_id` (`to_outlets_id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `transferstockitems`
--
ALTER TABLE `transferstockitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transfer_stock_id` (`transfer_stock_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `typesalary`
--
ALTER TABLE `typesalary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_created` (`user_id_created`),
  ADD KEY `user_last_update` (`user_last_update`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`,`designation_id`,`user_id_created`,`user_last_update`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicationsstatus`
--
ALTER TABLE `applicationsstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoryproduct`
--
ALTER TABLE `categoryproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `divisionproduct`
--
ALTER TABLE `divisionproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documentemployee`
--
ALTER TABLE `documentemployee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employeestatus`
--
ALTER TABLE `employeestatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goodreceiveitems`
--
ALTER TABLE `goodreceiveitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goodreceives`
--
ALTER TABLE `goodreceives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hakakses`
--
ALTER TABLE `hakakses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parentmenu`
--
ALTER TABLE `parentmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payrolldetail`
--
ALTER TABLE `payrolldetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseorderitems`
--
ALTER TABLE `purchaseorderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchaseorderstatus`
--
ALTER TABLE `purchaseorderstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesitems`
--
ALTER TABLE `salesitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesorder`
--
ALTER TABLE `salesorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salesorderitems`
--
ALTER TABLE `salesorderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategoryproduct`
--
ALTER TABLE `subcategoryproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transferstock`
--
ALTER TABLE `transferstock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transferstockitems`
--
ALTER TABLE `transferstockitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `typesalary`
--
ALTER TABLE `typesalary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
