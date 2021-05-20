-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 01:41 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airtime-dis`
--

-- --------------------------------------------------------

--
-- Table structure for table `airtime_history`
--

CREATE TABLE `airtime_history` (
  `sn` int(11) NOT NULL,
  `phone_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `success` int(11) NOT NULL,
  `attempt` int(11) NOT NULL,
  `last_attempt` int(11) NOT NULL,
  `sms_sent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `countryCode` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `countryName` varchar(44) CHARACTER SET utf8 DEFAULT NULL,
  `currencyCode` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `capital` varchar(19) CHARACTER SET utf8 DEFAULT NULL,
  `continentName` varchar(13) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countryCode`, `countryName`, `currencyCode`, `population`, `capital`, `continentName`) VALUES
('AD', 'Andorra', 'EUR', 84000, 'Andorra la Vella', 'Europe'),
('AE', 'United Arab Emirates', 'AED', 4975593, 'Abu Dhabi', 'Asia'),
('AF', 'Afghanistan', 'AFN', 29121286, 'Kabul', 'Asia'),
('AG', 'Antigua and Barbuda', 'XCD', 86754, 'St. John\'s', 'North America'),
('AI', 'Anguilla', 'XCD', 13254, 'The Valley', 'North America'),
('AL', 'Albania', 'ALL', 2986952, 'Tirana', 'Europe'),
('AM', 'Armenia', 'AMD', 2968000, 'Yerevan', 'Asia'),
('AO', 'Angola', 'AOA', 13068161, 'Luanda', 'Africa'),
('AQ', 'Antarctica', NULL, 0, NULL, 'Antarctica'),
('AR', 'Argentina', 'ARS', 41343201, 'Buenos Aires', 'South America'),
('AS', 'American Samoa', 'USD', 57881, 'Pago Pago', 'Oceania'),
('AT', 'Austria', 'EUR', 8205000, 'Vienna', 'Europe'),
('AU', 'Australia', 'AUD', 21515754, 'Canberra', 'Oceania'),
('AW', 'Aruba', 'AWG', 71566, 'Oranjestad', 'North America'),
('AX', 'Åland', 'EUR', 26711, 'Mariehamn', 'Europe'),
('AZ', 'Azerbaijan', 'AZN', 8303512, 'Baku', 'Asia'),
('BA', 'Bosnia and Herzegovina', 'BAM', 4590000, 'Sarajevo', 'Europe'),
('BB', 'Barbados', 'BBD', 285653, 'Bridgetown', 'North America'),
('BD', 'Bangladesh', 'BDT', 156118464, 'Dhaka', 'Asia'),
('BE', 'Belgium', 'EUR', 10403000, 'Brussels', 'Europe'),
('BF', 'Burkina Faso', 'XOF', 16241811, 'Ouagadougou', 'Africa'),
('BG', 'Bulgaria', 'BGN', 7148785, 'Sofia', 'Europe'),
('BH', 'Bahrain', 'BHD', 738004, 'Manama', 'Asia'),
('BI', 'Burundi', 'BIF', 9863117, 'Bujumbura', 'Africa'),
('BJ', 'Benin', 'XOF', 9056010, 'Porto-Novo', 'Africa'),
('BL', 'Saint Barthélemy', 'EUR', 8450, 'Gustavia', 'North America'),
('BM', 'Bermuda', 'BMD', 65365, 'Hamilton', 'North America'),
('BN', 'Brunei', 'BND', 395027, 'Bandar Seri Begawan', 'Asia'),
('BO', 'Bolivia', 'BOB', 9947418, 'Sucre', 'South America'),
('BQ', 'Bonaire', 'USD', 18012, 'Kralendijk', 'North America'),
('BR', 'Brazil', 'BRL', 201103330, 'Brasília', 'South America'),
('BS', 'Bahamas', 'BSD', 301790, 'Nassau', 'North America'),
('BT', 'Bhutan', 'BTN', 699847, 'Thimphu', 'Asia'),
('BV', 'Bouvet Island', 'NOK', 0, NULL, 'Antarctica'),
('BW', 'Botswana', 'BWP', 2029307, 'Gaborone', 'Africa'),
('BY', 'Belarus', 'BYR', 9685000, 'Minsk', 'Europe'),
('BZ', 'Belize', 'BZD', 314522, 'Belmopan', 'North America'),
('CA', 'Canada', 'CAD', 33679000, 'Ottawa', 'North America'),
('CC', 'Cocos [Keeling] Islands', 'AUD', 628, 'West Island', 'Asia'),
('CD', 'Democratic Republic of the Congo', 'CDF', 70916439, 'Kinshasa', 'Africa'),
('CF', 'Central African Republic', 'XAF', 4844927, 'Bangui', 'Africa'),
('CG', 'Republic of the Congo', 'XAF', 3039126, 'Brazzaville', 'Africa'),
('CH', 'Switzerland', 'CHF', 7581000, 'Bern', 'Europe'),
('CI', 'Ivory Coast', 'XOF', 21058798, 'Yamoussoukro', 'Africa'),
('CK', 'Cook Islands', 'NZD', 21388, 'Avarua', 'Oceania'),
('CL', 'Chile', 'CLP', 16746491, 'Santiago', 'South America'),
('CM', 'Cameroon', 'XAF', 19294149, 'Yaoundé', 'Africa'),
('CN', 'China', 'CNY', 1330044000, 'Beijing', 'Asia'),
('CO', 'Colombia', 'COP', 47790000, 'Bogotá', 'South America'),
('CR', 'Costa Rica', 'CRC', 4516220, 'San José', 'North America'),
('CU', 'Cuba', 'CUP', 11423000, 'Havana', 'North America'),
('CV', 'Cape Verde', 'CVE', 508659, 'Praia', 'Africa'),
('CW', 'Curacao', 'ANG', 141766, 'Willemstad', 'North America'),
('CX', 'Christmas Island', 'AUD', 1500, 'Flying Fish Cove', 'Asia'),
('CY', 'Cyprus', 'EUR', 1102677, 'Nicosia', 'Europe'),
('CZ', 'Czechia', 'CZK', 10476000, 'Prague', 'Europe'),
('DE', 'Germany', 'EUR', 81802257, 'Berlin', 'Europe'),
('DJ', 'Djibouti', 'DJF', 740528, 'Djibouti', 'Africa'),
('DK', 'Denmark', 'DKK', 5484000, 'Copenhagen', 'Europe'),
('DM', 'Dominica', 'XCD', 72813, 'Roseau', 'North America'),
('DO', 'Dominican Republic', 'DOP', 9823821, 'Santo Domingo', 'North America'),
('DZ', 'Algeria', 'DZD', 34586184, 'Algiers', 'Africa'),
('EC', 'Ecuador', 'USD', 14790608, 'Quito', 'South America'),
('EE', 'Estonia', 'EUR', 1291170, 'Tallinn', 'Europe'),
('EG', 'Egypt', 'EGP', 80471869, 'Cairo', 'Africa'),
('EH', 'Western Sahara', 'MAD', 273008, 'Laâyoune / El Aaiún', 'Africa'),
('ER', 'Eritrea', 'ERN', 5792984, 'Asmara', 'Africa'),
('ES', 'Spain', 'EUR', 46505963, 'Madrid', 'Europe'),
('ET', 'Ethiopia', 'ETB', 88013491, 'Addis Ababa', 'Africa'),
('FI', 'Finland', 'EUR', 5244000, 'Helsinki', 'Europe'),
('FJ', 'Fiji', 'FJD', 875983, 'Suva', 'Oceania'),
('FK', 'Falkland Islands', 'FKP', 2638, 'Stanley', 'South America'),
('FM', 'Micronesia', 'USD', 107708, 'Palikir', 'Oceania'),
('FO', 'Faroe Islands', 'DKK', 48228, 'Tórshavn', 'Europe'),
('FR', 'France', 'EUR', 64768389, 'Paris', 'Europe'),
('GA', 'Gabon', 'XAF', 1545255, 'Libreville', 'Africa'),
('GB', 'United Kingdom', 'GBP', 62348447, 'London', 'Europe'),
('GD', 'Grenada', 'XCD', 107818, 'St. George\'s', 'North America'),
('GE', 'Georgia', 'GEL', 4630000, 'Tbilisi', 'Asia'),
('GF', 'French Guiana', 'EUR', 195506, 'Cayenne', 'South America'),
('GG', 'Guernsey', 'GBP', 65228, 'St Peter Port', 'Europe'),
('GH', 'Ghana', 'GHS', 24339838, 'Accra', 'Africa'),
('GI', 'Gibraltar', 'GIP', 27884, 'Gibraltar', 'Europe'),
('GL', 'Greenland', 'DKK', 56375, 'Nuuk', 'North America'),
('GM', 'Gambia', 'GMD', 1593256, 'Bathurst', 'Africa'),
('GN', 'Guinea', 'GNF', 10324025, 'Conakry', 'Africa'),
('GP', 'Guadeloupe', 'EUR', 443000, 'Basse-Terre', 'North America'),
('GQ', 'Equatorial Guinea', 'XAF', 1014999, 'Malabo', 'Africa'),
('GR', 'Greece', 'EUR', 11000000, 'Athens', 'Europe'),
('GS', 'South Georgia and the South Sandwich Islands', 'GBP', 30, 'Grytviken', 'Antarctica'),
('GT', 'Guatemala', 'GTQ', 13550440, 'Guatemala City', 'North America'),
('GU', 'Guam', 'USD', 159358, 'Hagåtña', 'Oceania'),
('GW', 'Guinea-Bissau', 'XOF', 1565126, 'Bissau', 'Africa'),
('GY', 'Guyana', 'GYD', 748486, 'Georgetown', 'South America'),
('HK', 'Hong Kong', 'HKD', 6898686, 'Hong Kong', 'Asia'),
('HM', 'Heard Island and McDonald Islands', 'AUD', 0, NULL, 'Antarctica'),
('HN', 'Honduras', 'HNL', 7989415, 'Tegucigalpa', 'North America'),
('HR', 'Croatia', 'HRK', 4284889, 'Zagreb', 'Europe'),
('HT', 'Haiti', 'HTG', 9648924, 'Port-au-Prince', 'North America'),
('HU', 'Hungary', 'HUF', 9982000, 'Budapest', 'Europe'),
('ID', 'Indonesia', 'IDR', 242968342, 'Jakarta', 'Asia'),
('IE', 'Ireland', 'EUR', 4622917, 'Dublin', 'Europe'),
('IL', 'Israel', 'ILS', 7353985, NULL, 'Asia'),
('IM', 'Isle of Man', 'GBP', 75049, 'Douglas', 'Europe'),
('IN', 'India', 'INR', 1173108018, 'New Delhi', 'Asia'),
('IO', 'British Indian Ocean Territory', 'USD', 4000, NULL, 'Asia'),
('IQ', 'Iraq', 'IQD', 29671605, 'Baghdad', 'Asia'),
('IR', 'Iran', 'IRR', 76923300, 'Tehran', 'Asia'),
('IS', 'Iceland', 'ISK', 308910, 'Reykjavik', 'Europe'),
('IT', 'Italy', 'EUR', 60340328, 'Rome', 'Europe'),
('JE', 'Jersey', 'GBP', 90812, 'Saint Helier', 'Europe'),
('JM', 'Jamaica', 'JMD', 2847232, 'Kingston', 'North America'),
('JO', 'Jordan', 'JOD', 6407085, 'Amman', 'Asia'),
('JP', 'Japan', 'JPY', 127288000, 'Tokyo', 'Asia'),
('KE', 'Kenya', 'KES', 40046566, 'Nairobi', 'Africa'),
('KG', 'Kyrgyzstan', 'KGS', 5776500, 'Bishkek', 'Asia'),
('KH', 'Cambodia', 'KHR', 14453680, 'Phnom Penh', 'Asia'),
('KI', 'Kiribati', 'AUD', 92533, 'Tarawa', 'Oceania'),
('KM', 'Comoros', 'KMF', 773407, 'Moroni', 'Africa'),
('KN', 'Saint Kitts and Nevis', 'XCD', 51134, 'Basseterre', 'North America'),
('KP', 'North Korea', 'KPW', 22912177, 'Pyongyang', 'Asia'),
('KR', 'South Korea', 'KRW', 48422644, 'Seoul', 'Asia'),
('KW', 'Kuwait', 'KWD', 2789132, 'Kuwait City', 'Asia'),
('KY', 'Cayman Islands', 'KYD', 44270, 'George Town', 'North America'),
('KZ', 'Kazakhstan', 'KZT', 15340000, 'Astana', 'Asia'),
('LA', 'Laos', 'LAK', 6368162, 'Vientiane', 'Asia'),
('LB', 'Lebanon', 'LBP', 4125247, 'Beirut', 'Asia'),
('LC', 'Saint Lucia', 'XCD', 160922, 'Castries', 'North America'),
('LI', 'Liechtenstein', 'CHF', 35000, 'Vaduz', 'Europe'),
('LK', 'Sri Lanka', 'LKR', 21513990, 'Colombo', 'Asia'),
('LR', 'Liberia', 'LRD', 3685076, 'Monrovia', 'Africa'),
('LS', 'Lesotho', 'LSL', 1919552, 'Maseru', 'Africa'),
('LT', 'Lithuania', 'EUR', 2944459, 'Vilnius', 'Europe'),
('LU', 'Luxembourg', 'EUR', 497538, 'Luxembourg', 'Europe'),
('LV', 'Latvia', 'EUR', 2217969, 'Riga', 'Europe'),
('LY', 'Libya', 'LYD', 6461454, 'Tripoli', 'Africa'),
('MA', 'Morocco', 'MAD', 33848242, 'Rabat', 'Africa'),
('MC', 'Monaco', 'EUR', 32965, 'Monaco', 'Europe'),
('MD', 'Moldova', 'MDL', 4324000, 'Chişinău', 'Europe'),
('ME', 'Montenegro', 'EUR', 666730, 'Podgorica', 'Europe'),
('MF', 'Saint Martin', 'EUR', 35925, 'Marigot', 'North America'),
('MG', 'Madagascar', 'MGA', 21281844, 'Antananarivo', 'Africa'),
('MH', 'Marshall Islands', 'USD', 65859, 'Majuro', 'Oceania'),
('MK', 'Macedonia', 'MKD', 2062294, 'Skopje', 'Europe'),
('ML', 'Mali', 'XOF', 13796354, 'Bamako', 'Africa'),
('MM', 'Myanmar [Burma]', 'MMK', 53414374, 'Naypyitaw', 'Asia'),
('MN', 'Mongolia', 'MNT', 3086918, 'Ulan Bator', 'Asia'),
('MO', 'Macao', 'MOP', 449198, 'Macao', 'Asia'),
('MP', 'Northern Mariana Islands', 'USD', 53883, 'Saipan', 'Oceania'),
('MQ', 'Martinique', 'EUR', 432900, 'Fort-de-France', 'North America'),
('MR', 'Mauritania', 'MRO', 3205060, 'Nouakchott', 'Africa'),
('MS', 'Montserrat', 'XCD', 9341, 'Plymouth', 'North America'),
('MT', 'Malta', 'EUR', 403000, 'Valletta', 'Europe'),
('MU', 'Mauritius', 'MUR', 1294104, 'Port Louis', 'Africa'),
('MV', 'Maldives', 'MVR', 395650, 'Malé', 'Asia'),
('MW', 'Malawi', 'MWK', 15447500, 'Lilongwe', 'Africa'),
('MX', 'Mexico', 'MXN', 112468855, 'Mexico City', 'North America'),
('MY', 'Malaysia', 'MYR', 28274729, 'Kuala Lumpur', 'Asia'),
('MZ', 'Mozambique', 'MZN', 22061451, 'Maputo', 'Africa'),
('NA', 'Namibia', 'NAD', 2128471, 'Windhoek', 'Africa'),
('NC', 'New Caledonia', 'XPF', 216494, 'Noumea', 'Oceania'),
('NE', 'Niger', 'XOF', 15878271, 'Niamey', 'Africa'),
('NF', 'Norfolk Island', 'AUD', 1828, 'Kingston', 'Oceania'),
('NG', 'Nigeria', 'NGN', 154000000, 'Abuja', 'Africa'),
('NI', 'Nicaragua', 'NIO', 5995928, 'Managua', 'North America'),
('NL', 'Netherlands', 'EUR', 16645000, 'Amsterdam', 'Europe'),
('NO', 'Norway', 'NOK', 5009150, 'Oslo', 'Europe'),
('NP', 'Nepal', 'NPR', 28951852, 'Kathmandu', 'Asia'),
('NR', 'Nauru', 'AUD', 10065, 'Yaren', 'Oceania'),
('NU', 'Niue', 'NZD', 2166, 'Alofi', 'Oceania'),
('NZ', 'New Zealand', 'NZD', 4252277, 'Wellington', 'Oceania'),
('OM', 'Oman', 'OMR', 2967717, 'Muscat', 'Asia'),
('PA', 'Panama', 'PAB', 3410676, 'Panama City', 'North America'),
('PE', 'Peru', 'PEN', 29907003, 'Lima', 'South America'),
('PF', 'French Polynesia', 'XPF', 270485, 'Papeete', 'Oceania'),
('PG', 'Papua New Guinea', 'PGK', 6064515, 'Port Moresby', 'Oceania'),
('PH', 'Philippines', 'PHP', 99900177, 'Manila', 'Asia'),
('PK', 'Pakistan', 'PKR', 184404791, 'Islamabad', 'Asia'),
('PL', 'Poland', 'PLN', 38500000, 'Warsaw', 'Europe'),
('PM', 'Saint Pierre and Miquelon', 'EUR', 7012, 'Saint-Pierre', 'North America'),
('PN', 'Pitcairn Islands', 'NZD', 46, 'Adamstown', 'Oceania'),
('PR', 'Puerto Rico', 'USD', 3916632, 'San Juan', 'North America'),
('PS', 'Palestine', 'ILS', 3800000, NULL, 'Asia'),
('PT', 'Portugal', 'EUR', 10676000, 'Lisbon', 'Europe'),
('PW', 'Palau', 'USD', 19907, 'Melekeok', 'Oceania'),
('PY', 'Paraguay', 'PYG', 6375830, 'Asunción', 'South America'),
('QA', 'Qatar', 'QAR', 840926, 'Doha', 'Asia'),
('RE', 'Réunion', 'EUR', 776948, 'Saint-Denis', 'Africa'),
('RO', 'Romania', 'RON', 21959278, 'Bucharest', 'Europe'),
('RS', 'Serbia', 'RSD', 7344847, 'Belgrade', 'Europe'),
('RU', 'Russia', 'RUB', 140702000, 'Moscow', 'Europe'),
('RW', 'Rwanda', 'RWF', 11055976, 'Kigali', 'Africa'),
('SA', 'Saudi Arabia', 'SAR', 25731776, 'Riyadh', 'Asia'),
('SB', 'Solomon Islands', 'SBD', 559198, 'Honiara', 'Oceania'),
('SC', 'Seychelles', 'SCR', 88340, 'Victoria', 'Africa'),
('SD', 'Sudan', 'SDG', 35000000, 'Khartoum', 'Africa'),
('SE', 'Sweden', 'SEK', 9828655, 'Stockholm', 'Europe'),
('SG', 'Singapore', 'SGD', 4701069, 'Singapore', 'Asia'),
('SH', 'Saint Helena', 'SHP', 7460, 'Jamestown', 'Africa'),
('SI', 'Slovenia', 'EUR', 2007000, 'Ljubljana', 'Europe'),
('SJ', 'Svalbard and Jan Mayen', 'NOK', 2550, 'Longyearbyen', 'Europe'),
('SK', 'Slovakia', 'EUR', 5455000, 'Bratislava', 'Europe'),
('SL', 'Sierra Leone', 'SLL', 5245695, 'Freetown', 'Africa'),
('SM', 'San Marino', 'EUR', 31477, 'San Marino', 'Europe'),
('SN', 'Senegal', 'XOF', 12323252, 'Dakar', 'Africa'),
('SO', 'Somalia', 'SOS', 10112453, 'Mogadishu', 'Africa'),
('SR', 'Suriname', 'SRD', 492829, 'Paramaribo', 'South America'),
('SS', 'South Sudan', 'SSP', 8260490, 'Juba', 'Africa'),
('ST', 'São Tomé and Príncipe', 'STD', 175808, 'São Tomé', 'Africa'),
('SV', 'El Salvador', 'USD', 6052064, 'San Salvador', 'North America'),
('SX', 'Sint Maarten', 'ANG', 37429, 'Philipsburg', 'North America'),
('SY', 'Syria', 'SYP', 22198110, 'Damascus', 'Asia'),
('SZ', 'Swaziland', 'SZL', 1354051, 'Mbabane', 'Africa'),
('TC', 'Turks and Caicos Islands', 'USD', 20556, 'Cockburn Town', 'North America'),
('TD', 'Chad', 'XAF', 10543464, 'N\'Djamena', 'Africa'),
('TF', 'French Southern Territories', 'EUR', 140, 'Port-aux-Français', 'Antarctica'),
('TG', 'Togo', 'XOF', 6587239, 'Lomé', 'Africa'),
('TH', 'Thailand', 'THB', 67089500, 'Bangkok', 'Asia'),
('TJ', 'Tajikistan', 'TJS', 7487489, 'Dushanbe', 'Asia'),
('TK', 'Tokelau', 'NZD', 1466, NULL, 'Oceania'),
('TL', 'East Timor', 'USD', 1154625, 'Dili', 'Oceania'),
('TM', 'Turkmenistan', 'TMT', 4940916, 'Ashgabat', 'Asia'),
('TN', 'Tunisia', 'TND', 10589025, 'Tunis', 'Africa'),
('TO', 'Tonga', 'TOP', 122580, 'Nuku\'alofa', 'Oceania'),
('TR', 'Turkey', 'TRY', 77804122, 'Ankara', 'Asia'),
('TT', 'Trinidad and Tobago', 'TTD', 1228691, 'Port of Spain', 'North America'),
('TV', 'Tuvalu', 'AUD', 10472, 'Funafuti', 'Oceania'),
('TW', 'Taiwan', 'TWD', 22894384, 'Taipei', 'Asia'),
('TZ', 'Tanzania', 'TZS', 41892895, 'Dodoma', 'Africa'),
('UA', 'Ukraine', 'UAH', 45415596, 'Kiev', 'Europe'),
('UG', 'Uganda', 'UGX', 33398682, 'Kampala', 'Africa'),
('UM', 'U.S. Minor Outlying Islands', 'USD', 0, NULL, 'Oceania'),
('US', 'United States', 'USD', 310232863, 'Washington', 'North America'),
('UY', 'Uruguay', 'UYU', 3477000, 'Montevideo', 'South America'),
('UZ', 'Uzbekistan', 'UZS', 27865738, 'Tashkent', 'Asia'),
('VA', 'Vatican City', 'EUR', 921, 'Vatican City', 'Europe'),
('VC', 'Saint Vincent and the Grenadines', 'XCD', 104217, 'Kingstown', 'North America'),
('VE', 'Venezuela', 'VEF', 27223228, 'Caracas', 'South America'),
('VG', 'British Virgin Islands', 'USD', 21730, 'Road Town', 'North America'),
('VI', 'U.S. Virgin Islands', 'USD', 108708, 'Charlotte Amalie', 'North America'),
('VN', 'Vietnam', 'VND', 89571130, 'Hanoi', 'Asia'),
('VU', 'Vanuatu', 'VUV', 221552, 'Port Vila', 'Oceania'),
('WF', 'Wallis and Futuna', 'XPF', 16025, 'Mata-Utu', 'Oceania'),
('WS', 'Samoa', 'WST', 192001, 'Apia', 'Oceania'),
('XK', 'Kosovo', 'EUR', 1800000, 'Pristina', 'Europe'),
('YE', 'Yemen', 'YER', 23495361, 'Sanaa', 'Asia'),
('YT', 'Mayotte', 'EUR', 159042, 'Mamoudzou', 'Africa'),
('ZA', 'South Africa', 'ZAR', 49000000, 'Pretoria', 'Africa'),
('ZM', 'Zambia', 'ZMW', 13460305, 'Lusaka', 'Africa'),
('ZW', 'Zimbabwe', 'ZWL', 13061000, 'Harare', 'Africa');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `sn` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`sn`, `tag_id`, `msg`) VALUES
(1, 1, 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `phone_number`
--

CREATE TABLE `phone_number` (
  `sn` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `country` varchar(50) NOT NULL,
  `carrier` varchar(50) NOT NULL,
  `currency_code` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone_number`
--

INSERT INTO `phone_number` (`sn`, `tag_id`, `first_name`, `last_name`, `phone_number`, `country_code`, `country`, `carrier`, `currency_code`, `date_created`) VALUES
(36, 0, 'Micheal', '', '2348160317744', 'NG', '', 'MTN Nigeria Communications Ltd', '', '2021-05-20 00:34:12'),
(37, 0, 'Peter', '', '2348154657799', 'NG', '', 'Globacom Ltd', '', '2021-05-20 00:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `sn` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `apikey` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`sn`, `username`, `apikey`) VALUES
(1, 'sandbox', '2a448d4071ed3bd8311dbac114b5625a7cb00968b35b185a3a29e80efb77e356');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `sn` int(11) NOT NULL,
  `event` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sn` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sn`, `username`, `name`, `email`, `password`) VALUES
(1, 'test1', 'micheal', 'test@gmail.com', 'test1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airtime_history`
--
ALTER TABLE `airtime_history`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `phone_number`
--
ALTER TABLE `phone_number`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airtime_history`
--
ALTER TABLE `airtime_history`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phone_number`
--
ALTER TABLE `phone_number`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
