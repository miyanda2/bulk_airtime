-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 12:08 AM
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
  `country_count` int(100) NOT NULL,
  `currencyCode` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `capital` varchar(19) CHARACTER SET utf8 DEFAULT NULL,
  `continentName` varchar(13) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countryCode`, `countryName`, `country_count`, `currencyCode`, `population`, `capital`, `continentName`) VALUES
('AD', 'Andorra', 0, 'EUR', 84000, 'Andorra la Vella', 'Europe'),
('AE', 'United Arab Emirates', 0, 'AED', 4975593, 'Abu Dhabi', 'Asia'),
('AF', 'Afghanistan', 0, 'AFN', 29121286, 'Kabul', 'Asia'),
('AG', 'Antigua and Barbuda', 0, 'XCD', 86754, 'St. John\'s', 'North America'),
('AI', 'Anguilla', 0, 'XCD', 13254, 'The Valley', 'North America'),
('AL', 'Albania', 0, 'ALL', 2986952, 'Tirana', 'Europe'),
('AM', 'Armenia', 0, 'AMD', 2968000, 'Yerevan', 'Asia'),
('AO', 'Angola', 0, 'AOA', 13068161, 'Luanda', 'Africa'),
('AQ', 'Antarctica', 0, NULL, 0, NULL, 'Antarctica'),
('AR', 'Argentina', 0, 'ARS', 41343201, 'Buenos Aires', 'South America'),
('AS', 'American Samoa', 0, 'USD', 57881, 'Pago Pago', 'Oceania'),
('AT', 'Austria', 0, 'EUR', 8205000, 'Vienna', 'Europe'),
('AU', 'Australia', 0, 'AUD', 21515754, 'Canberra', 'Oceania'),
('AW', 'Aruba', 0, 'AWG', 71566, 'Oranjestad', 'North America'),
('AX', 'Åland', 0, 'EUR', 26711, 'Mariehamn', 'Europe'),
('AZ', 'Azerbaijan', 0, 'AZN', 8303512, 'Baku', 'Asia'),
('BA', 'Bosnia and Herzegovina', 0, 'BAM', 4590000, 'Sarajevo', 'Europe'),
('BB', 'Barbados', 0, 'BBD', 285653, 'Bridgetown', 'North America'),
('BD', 'Bangladesh', 0, 'BDT', 156118464, 'Dhaka', 'Asia'),
('BE', 'Belgium', 0, 'EUR', 10403000, 'Brussels', 'Europe'),
('BF', 'Burkina Faso', 0, 'XOF', 16241811, 'Ouagadougou', 'Africa'),
('BG', 'Bulgaria', 0, 'BGN', 7148785, 'Sofia', 'Europe'),
('BH', 'Bahrain', 0, 'BHD', 738004, 'Manama', 'Asia'),
('BI', 'Burundi', 0, 'BIF', 9863117, 'Bujumbura', 'Africa'),
('BJ', 'Benin', 0, 'XOF', 9056010, 'Porto-Novo', 'Africa'),
('BL', 'Saint Barthélemy', 0, 'EUR', 8450, 'Gustavia', 'North America'),
('BM', 'Bermuda', 0, 'BMD', 65365, 'Hamilton', 'North America'),
('BN', 'Brunei', 0, 'BND', 395027, 'Bandar Seri Begawan', 'Asia'),
('BO', 'Bolivia', 0, 'BOB', 9947418, 'Sucre', 'South America'),
('BQ', 'Bonaire', 0, 'USD', 18012, 'Kralendijk', 'North America'),
('BR', 'Brazil', 0, 'BRL', 201103330, 'Brasília', 'South America'),
('BS', 'Bahamas', 0, 'BSD', 301790, 'Nassau', 'North America'),
('BT', 'Bhutan', 0, 'BTN', 699847, 'Thimphu', 'Asia'),
('BV', 'Bouvet Island', 0, 'NOK', 0, NULL, 'Antarctica'),
('BW', 'Botswana', 0, 'BWP', 2029307, 'Gaborone', 'Africa'),
('BY', 'Belarus', 0, 'BYR', 9685000, 'Minsk', 'Europe'),
('BZ', 'Belize', 0, 'BZD', 314522, 'Belmopan', 'North America'),
('CA', 'Canada', 0, 'CAD', 33679000, 'Ottawa', 'North America'),
('CC', 'Cocos [Keeling] Islands', 0, 'AUD', 628, 'West Island', 'Asia'),
('CD', 'Democratic Republic of the Congo', 0, 'CDF', 70916439, 'Kinshasa', 'Africa'),
('CF', 'Central African Republic', 0, 'XAF', 4844927, 'Bangui', 'Africa'),
('CG', 'Republic of the Congo', 0, 'XAF', 3039126, 'Brazzaville', 'Africa'),
('CH', 'Switzerland', 0, 'CHF', 7581000, 'Bern', 'Europe'),
('CI', 'Ivory Coast', 0, 'XOF', 21058798, 'Yamoussoukro', 'Africa'),
('CK', 'Cook Islands', 0, 'NZD', 21388, 'Avarua', 'Oceania'),
('CL', 'Chile', 0, 'CLP', 16746491, 'Santiago', 'South America'),
('CM', 'Cameroon', 0, 'XAF', 19294149, 'Yaoundé', 'Africa'),
('CN', 'China', 0, 'CNY', 1330044000, 'Beijing', 'Asia'),
('CO', 'Colombia', 0, 'COP', 47790000, 'Bogotá', 'South America'),
('CR', 'Costa Rica', 0, 'CRC', 4516220, 'San José', 'North America'),
('CU', 'Cuba', 0, 'CUP', 11423000, 'Havana', 'North America'),
('CV', 'Cape Verde', 0, 'CVE', 508659, 'Praia', 'Africa'),
('CW', 'Curacao', 0, 'ANG', 141766, 'Willemstad', 'North America'),
('CX', 'Christmas Island', 0, 'AUD', 1500, 'Flying Fish Cove', 'Asia'),
('CY', 'Cyprus', 0, 'EUR', 1102677, 'Nicosia', 'Europe'),
('CZ', 'Czechia', 0, 'CZK', 10476000, 'Prague', 'Europe'),
('DE', 'Germany', 0, 'EUR', 81802257, 'Berlin', 'Europe'),
('DJ', 'Djibouti', 0, 'DJF', 740528, 'Djibouti', 'Africa'),
('DK', 'Denmark', 0, 'DKK', 5484000, 'Copenhagen', 'Europe'),
('DM', 'Dominica', 0, 'XCD', 72813, 'Roseau', 'North America'),
('DO', 'Dominican Republic', 0, 'DOP', 9823821, 'Santo Domingo', 'North America'),
('DZ', 'Algeria', 0, 'DZD', 34586184, 'Algiers', 'Africa'),
('EC', 'Ecuador', 0, 'USD', 14790608, 'Quito', 'South America'),
('EE', 'Estonia', 0, 'EUR', 1291170, 'Tallinn', 'Europe'),
('EG', 'Egypt', 0, 'EGP', 80471869, 'Cairo', 'Africa'),
('EH', 'Western Sahara', 0, 'MAD', 273008, 'Laâyoune / El Aaiún', 'Africa'),
('ER', 'Eritrea', 0, 'ERN', 5792984, 'Asmara', 'Africa'),
('ES', 'Spain', 0, 'EUR', 46505963, 'Madrid', 'Europe'),
('ET', 'Ethiopia', 0, 'ETB', 88013491, 'Addis Ababa', 'Africa'),
('FI', 'Finland', 0, 'EUR', 5244000, 'Helsinki', 'Europe'),
('FJ', 'Fiji', 0, 'FJD', 875983, 'Suva', 'Oceania'),
('FK', 'Falkland Islands', 0, 'FKP', 2638, 'Stanley', 'South America'),
('FM', 'Micronesia', 0, 'USD', 107708, 'Palikir', 'Oceania'),
('FO', 'Faroe Islands', 0, 'DKK', 48228, 'Tórshavn', 'Europe'),
('FR', 'France', 0, 'EUR', 64768389, 'Paris', 'Europe'),
('GA', 'Gabon', 0, 'XAF', 1545255, 'Libreville', 'Africa'),
('GB', 'United Kingdom', 0, 'GBP', 62348447, 'London', 'Europe'),
('GD', 'Grenada', 0, 'XCD', 107818, 'St. George\'s', 'North America'),
('GE', 'Georgia', 0, 'GEL', 4630000, 'Tbilisi', 'Asia'),
('GF', 'French Guiana', 0, 'EUR', 195506, 'Cayenne', 'South America'),
('GG', 'Guernsey', 0, 'GBP', 65228, 'St Peter Port', 'Europe'),
('GH', 'Ghana', 0, 'GHS', 24339838, 'Accra', 'Africa'),
('GI', 'Gibraltar', 0, 'GIP', 27884, 'Gibraltar', 'Europe'),
('GL', 'Greenland', 0, 'DKK', 56375, 'Nuuk', 'North America'),
('GM', 'Gambia', 0, 'GMD', 1593256, 'Bathurst', 'Africa'),
('GN', 'Guinea', 0, 'GNF', 10324025, 'Conakry', 'Africa'),
('GP', 'Guadeloupe', 0, 'EUR', 443000, 'Basse-Terre', 'North America'),
('GQ', 'Equatorial Guinea', 0, 'XAF', 1014999, 'Malabo', 'Africa'),
('GR', 'Greece', 0, 'EUR', 11000000, 'Athens', 'Europe'),
('GS', 'South Georgia and the South Sandwich Islands', 0, 'GBP', 30, 'Grytviken', 'Antarctica'),
('GT', 'Guatemala', 0, 'GTQ', 13550440, 'Guatemala City', 'North America'),
('GU', 'Guam', 0, 'USD', 159358, 'Hagåtña', 'Oceania'),
('GW', 'Guinea-Bissau', 0, 'XOF', 1565126, 'Bissau', 'Africa'),
('GY', 'Guyana', 0, 'GYD', 748486, 'Georgetown', 'South America'),
('HK', 'Hong Kong', 0, 'HKD', 6898686, 'Hong Kong', 'Asia'),
('HM', 'Heard Island and McDonald Islands', 0, 'AUD', 0, NULL, 'Antarctica'),
('HN', 'Honduras', 0, 'HNL', 7989415, 'Tegucigalpa', 'North America'),
('HR', 'Croatia', 0, 'HRK', 4284889, 'Zagreb', 'Europe'),
('HT', 'Haiti', 0, 'HTG', 9648924, 'Port-au-Prince', 'North America'),
('HU', 'Hungary', 0, 'HUF', 9982000, 'Budapest', 'Europe'),
('ID', 'Indonesia', 0, 'IDR', 242968342, 'Jakarta', 'Asia'),
('IE', 'Ireland', 0, 'EUR', 4622917, 'Dublin', 'Europe'),
('IL', 'Israel', 0, 'ILS', 7353985, NULL, 'Asia'),
('IM', 'Isle of Man', 0, 'GBP', 75049, 'Douglas', 'Europe'),
('IN', 'India', 0, 'INR', 1173108018, 'New Delhi', 'Asia'),
('IO', 'British Indian Ocean Territory', 0, 'USD', 4000, NULL, 'Asia'),
('IQ', 'Iraq', 0, 'IQD', 29671605, 'Baghdad', 'Asia'),
('IR', 'Iran', 0, 'IRR', 76923300, 'Tehran', 'Asia'),
('IS', 'Iceland', 0, 'ISK', 308910, 'Reykjavik', 'Europe'),
('IT', 'Italy', 0, 'EUR', 60340328, 'Rome', 'Europe'),
('JE', 'Jersey', 0, 'GBP', 90812, 'Saint Helier', 'Europe'),
('JM', 'Jamaica', 0, 'JMD', 2847232, 'Kingston', 'North America'),
('JO', 'Jordan', 0, 'JOD', 6407085, 'Amman', 'Asia'),
('JP', 'Japan', 0, 'JPY', 127288000, 'Tokyo', 'Asia'),
('KE', 'Kenya', 0, 'KES', 40046566, 'Nairobi', 'Africa'),
('KG', 'Kyrgyzstan', 0, 'KGS', 5776500, 'Bishkek', 'Asia'),
('KH', 'Cambodia', 0, 'KHR', 14453680, 'Phnom Penh', 'Asia'),
('KI', 'Kiribati', 0, 'AUD', 92533, 'Tarawa', 'Oceania'),
('KM', 'Comoros', 0, 'KMF', 773407, 'Moroni', 'Africa'),
('KN', 'Saint Kitts and Nevis', 0, 'XCD', 51134, 'Basseterre', 'North America'),
('KP', 'North Korea', 0, 'KPW', 22912177, 'Pyongyang', 'Asia'),
('KR', 'South Korea', 0, 'KRW', 48422644, 'Seoul', 'Asia'),
('KW', 'Kuwait', 0, 'KWD', 2789132, 'Kuwait City', 'Asia'),
('KY', 'Cayman Islands', 0, 'KYD', 44270, 'George Town', 'North America'),
('KZ', 'Kazakhstan', 0, 'KZT', 15340000, 'Astana', 'Asia'),
('LA', 'Laos', 0, 'LAK', 6368162, 'Vientiane', 'Asia'),
('LB', 'Lebanon', 0, 'LBP', 4125247, 'Beirut', 'Asia'),
('LC', 'Saint Lucia', 0, 'XCD', 160922, 'Castries', 'North America'),
('LI', 'Liechtenstein', 0, 'CHF', 35000, 'Vaduz', 'Europe'),
('LK', 'Sri Lanka', 0, 'LKR', 21513990, 'Colombo', 'Asia'),
('LR', 'Liberia', 0, 'LRD', 3685076, 'Monrovia', 'Africa'),
('LS', 'Lesotho', 0, 'LSL', 1919552, 'Maseru', 'Africa'),
('LT', 'Lithuania', 0, 'EUR', 2944459, 'Vilnius', 'Europe'),
('LU', 'Luxembourg', 0, 'EUR', 497538, 'Luxembourg', 'Europe'),
('LV', 'Latvia', 0, 'EUR', 2217969, 'Riga', 'Europe'),
('LY', 'Libya', 0, 'LYD', 6461454, 'Tripoli', 'Africa'),
('MA', 'Morocco', 0, 'MAD', 33848242, 'Rabat', 'Africa'),
('MC', 'Monaco', 0, 'EUR', 32965, 'Monaco', 'Europe'),
('MD', 'Moldova', 0, 'MDL', 4324000, 'Chişinău', 'Europe'),
('ME', 'Montenegro', 0, 'EUR', 666730, 'Podgorica', 'Europe'),
('MF', 'Saint Martin', 0, 'EUR', 35925, 'Marigot', 'North America'),
('MG', 'Madagascar', 0, 'MGA', 21281844, 'Antananarivo', 'Africa'),
('MH', 'Marshall Islands', 0, 'USD', 65859, 'Majuro', 'Oceania'),
('MK', 'Macedonia', 0, 'MKD', 2062294, 'Skopje', 'Europe'),
('ML', 'Mali', 0, 'XOF', 13796354, 'Bamako', 'Africa'),
('MM', 'Myanmar [Burma]', 0, 'MMK', 53414374, 'Naypyitaw', 'Asia'),
('MN', 'Mongolia', 0, 'MNT', 3086918, 'Ulan Bator', 'Asia'),
('MO', 'Macao', 0, 'MOP', 449198, 'Macao', 'Asia'),
('MP', 'Northern Mariana Islands', 0, 'USD', 53883, 'Saipan', 'Oceania'),
('MQ', 'Martinique', 0, 'EUR', 432900, 'Fort-de-France', 'North America'),
('MR', 'Mauritania', 0, 'MRO', 3205060, 'Nouakchott', 'Africa'),
('MS', 'Montserrat', 0, 'XCD', 9341, 'Plymouth', 'North America'),
('MT', 'Malta', 0, 'EUR', 403000, 'Valletta', 'Europe'),
('MU', 'Mauritius', 0, 'MUR', 1294104, 'Port Louis', 'Africa'),
('MV', 'Maldives', 0, 'MVR', 395650, 'Malé', 'Asia'),
('MW', 'Malawi', 0, 'MWK', 15447500, 'Lilongwe', 'Africa'),
('MX', 'Mexico', 0, 'MXN', 112468855, 'Mexico City', 'North America'),
('MY', 'Malaysia', 0, 'MYR', 28274729, 'Kuala Lumpur', 'Asia'),
('MZ', 'Mozambique', 0, 'MZN', 22061451, 'Maputo', 'Africa'),
('NA', 'Namibia', 0, 'NAD', 2128471, 'Windhoek', 'Africa'),
('NC', 'New Caledonia', 0, 'XPF', 216494, 'Noumea', 'Oceania'),
('NE', 'Niger', 0, 'XOF', 15878271, 'Niamey', 'Africa'),
('NF', 'Norfolk Island', 0, 'AUD', 1828, 'Kingston', 'Oceania'),
('NG', 'Nigeria', 0, 'NGN', 154000000, 'Abuja', 'Africa'),
('NI', 'Nicaragua', 0, 'NIO', 5995928, 'Managua', 'North America'),
('NL', 'Netherlands', 0, 'EUR', 16645000, 'Amsterdam', 'Europe'),
('NO', 'Norway', 0, 'NOK', 5009150, 'Oslo', 'Europe'),
('NP', 'Nepal', 0, 'NPR', 28951852, 'Kathmandu', 'Asia'),
('NR', 'Nauru', 0, 'AUD', 10065, 'Yaren', 'Oceania'),
('NU', 'Niue', 0, 'NZD', 2166, 'Alofi', 'Oceania'),
('NZ', 'New Zealand', 0, 'NZD', 4252277, 'Wellington', 'Oceania'),
('OM', 'Oman', 0, 'OMR', 2967717, 'Muscat', 'Asia'),
('PA', 'Panama', 0, 'PAB', 3410676, 'Panama City', 'North America'),
('PE', 'Peru', 0, 'PEN', 29907003, 'Lima', 'South America'),
('PF', 'French Polynesia', 0, 'XPF', 270485, 'Papeete', 'Oceania'),
('PG', 'Papua New Guinea', 0, 'PGK', 6064515, 'Port Moresby', 'Oceania'),
('PH', 'Philippines', 0, 'PHP', 99900177, 'Manila', 'Asia'),
('PK', 'Pakistan', 0, 'PKR', 184404791, 'Islamabad', 'Asia'),
('PL', 'Poland', 0, 'PLN', 38500000, 'Warsaw', 'Europe'),
('PM', 'Saint Pierre and Miquelon', 0, 'EUR', 7012, 'Saint-Pierre', 'North America'),
('PN', 'Pitcairn Islands', 0, 'NZD', 46, 'Adamstown', 'Oceania'),
('PR', 'Puerto Rico', 0, 'USD', 3916632, 'San Juan', 'North America'),
('PS', 'Palestine', 0, 'ILS', 3800000, NULL, 'Asia'),
('PT', 'Portugal', 0, 'EUR', 10676000, 'Lisbon', 'Europe'),
('PW', 'Palau', 0, 'USD', 19907, 'Melekeok', 'Oceania'),
('PY', 'Paraguay', 0, 'PYG', 6375830, 'Asunción', 'South America'),
('QA', 'Qatar', 0, 'QAR', 840926, 'Doha', 'Asia'),
('RE', 'Réunion', 0, 'EUR', 776948, 'Saint-Denis', 'Africa'),
('RO', 'Romania', 0, 'RON', 21959278, 'Bucharest', 'Europe'),
('RS', 'Serbia', 0, 'RSD', 7344847, 'Belgrade', 'Europe'),
('RU', 'Russia', 0, 'RUB', 140702000, 'Moscow', 'Europe'),
('RW', 'Rwanda', 0, 'RWF', 11055976, 'Kigali', 'Africa'),
('SA', 'Saudi Arabia', 0, 'SAR', 25731776, 'Riyadh', 'Asia'),
('SB', 'Solomon Islands', 0, 'SBD', 559198, 'Honiara', 'Oceania'),
('SC', 'Seychelles', 0, 'SCR', 88340, 'Victoria', 'Africa'),
('SD', 'Sudan', 0, 'SDG', 35000000, 'Khartoum', 'Africa'),
('SE', 'Sweden', 0, 'SEK', 9828655, 'Stockholm', 'Europe'),
('SG', 'Singapore', 0, 'SGD', 4701069, 'Singapore', 'Asia'),
('SH', 'Saint Helena', 0, 'SHP', 7460, 'Jamestown', 'Africa'),
('SI', 'Slovenia', 0, 'EUR', 2007000, 'Ljubljana', 'Europe'),
('SJ', 'Svalbard and Jan Mayen', 0, 'NOK', 2550, 'Longyearbyen', 'Europe'),
('SK', 'Slovakia', 0, 'EUR', 5455000, 'Bratislava', 'Europe'),
('SL', 'Sierra Leone', 0, 'SLL', 5245695, 'Freetown', 'Africa'),
('SM', 'San Marino', 0, 'EUR', 31477, 'San Marino', 'Europe'),
('SN', 'Senegal', 0, 'XOF', 12323252, 'Dakar', 'Africa'),
('SO', 'Somalia', 0, 'SOS', 10112453, 'Mogadishu', 'Africa'),
('SR', 'Suriname', 0, 'SRD', 492829, 'Paramaribo', 'South America'),
('SS', 'South Sudan', 0, 'SSP', 8260490, 'Juba', 'Africa'),
('ST', 'São Tomé and Príncipe', 0, 'STD', 175808, 'São Tomé', 'Africa'),
('SV', 'El Salvador', 0, 'USD', 6052064, 'San Salvador', 'North America'),
('SX', 'Sint Maarten', 0, 'ANG', 37429, 'Philipsburg', 'North America'),
('SY', 'Syria', 0, 'SYP', 22198110, 'Damascus', 'Asia'),
('SZ', 'Swaziland', 0, 'SZL', 1354051, 'Mbabane', 'Africa'),
('TC', 'Turks and Caicos Islands', 0, 'USD', 20556, 'Cockburn Town', 'North America'),
('TD', 'Chad', 0, 'XAF', 10543464, 'N\'Djamena', 'Africa'),
('TF', 'French Southern Territories', 0, 'EUR', 140, 'Port-aux-Français', 'Antarctica'),
('TG', 'Togo', 0, 'XOF', 6587239, 'Lomé', 'Africa'),
('TH', 'Thailand', 0, 'THB', 67089500, 'Bangkok', 'Asia'),
('TJ', 'Tajikistan', 0, 'TJS', 7487489, 'Dushanbe', 'Asia'),
('TK', 'Tokelau', 0, 'NZD', 1466, NULL, 'Oceania'),
('TL', 'East Timor', 0, 'USD', 1154625, 'Dili', 'Oceania'),
('TM', 'Turkmenistan', 0, 'TMT', 4940916, 'Ashgabat', 'Asia'),
('TN', 'Tunisia', 0, 'TND', 10589025, 'Tunis', 'Africa'),
('TO', 'Tonga', 0, 'TOP', 122580, 'Nuku\'alofa', 'Oceania'),
('TR', 'Turkey', 0, 'TRY', 77804122, 'Ankara', 'Asia'),
('TT', 'Trinidad and Tobago', 0, 'TTD', 1228691, 'Port of Spain', 'North America'),
('TV', 'Tuvalu', 0, 'AUD', 10472, 'Funafuti', 'Oceania'),
('TW', 'Taiwan', 0, 'TWD', 22894384, 'Taipei', 'Asia'),
('TZ', 'Tanzania', 0, 'TZS', 41892895, 'Dodoma', 'Africa'),
('UA', 'Ukraine', 0, 'UAH', 45415596, 'Kiev', 'Europe'),
('UG', 'Uganda', 0, 'UGX', 33398682, 'Kampala', 'Africa'),
('UM', 'U.S. Minor Outlying Islands', 0, 'USD', 0, NULL, 'Oceania'),
('US', 'United States', 0, 'USD', 310232863, 'Washington', 'North America'),
('UY', 'Uruguay', 0, 'UYU', 3477000, 'Montevideo', 'South America'),
('UZ', 'Uzbekistan', 0, 'UZS', 27865738, 'Tashkent', 'Asia'),
('VA', 'Vatican City', 0, 'EUR', 921, 'Vatican City', 'Europe'),
('VC', 'Saint Vincent and the Grenadines', 0, 'XCD', 104217, 'Kingstown', 'North America'),
('VE', 'Venezuela', 0, 'VEF', 27223228, 'Caracas', 'South America'),
('VG', 'British Virgin Islands', 0, 'USD', 21730, 'Road Town', 'North America'),
('VI', 'U.S. Virgin Islands', 0, 'USD', 108708, 'Charlotte Amalie', 'North America'),
('VN', 'Vietnam', 0, 'VND', 89571130, 'Hanoi', 'Asia'),
('VU', 'Vanuatu', 0, 'VUV', 221552, 'Port Vila', 'Oceania'),
('WF', 'Wallis and Futuna', 0, 'XPF', 16025, 'Mata-Utu', 'Oceania'),
('WS', 'Samoa', 0, 'WST', 192001, 'Apia', 'Oceania'),
('XK', 'Kosovo', 0, 'EUR', 1800000, 'Pristina', 'Europe'),
('YE', 'Yemen', 0, 'YER', 23495361, 'Sanaa', 'Asia'),
('YT', 'Mayotte', 0, 'EUR', 159042, 'Mamoudzou', 'Africa'),
('ZA', 'South Africa', 0, 'ZAR', 49000000, 'Pretoria', 'Africa'),
('ZM', 'Zambia', 0, 'ZMW', 13460305, 'Lusaka', 'Africa'),
('ZW', 'Zimbabwe', 0, 'ZWL', 13061000, 'Harare', 'Africa');

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
(1, 1, 'Testsdd');

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
(1, 3, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 09:44:53'),
(2, 3, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 09:51:32'),
(3, 3, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 09:51:34'),
(4, 3, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 09:51:37'),
(5, 3, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 09:51:38'),
(6, 3, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 09:51:41'),
(7, 3, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 09:51:43'),
(8, 3, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 09:51:44'),
(9, 3, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 09:51:46'),
(10, 3, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 09:51:49'),
(11, 3, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 09:51:50'),
(12, 3, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 09:51:53'),
(13, 6, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 10:17:16'),
(14, 6, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 10:19:16'),
(15, 6, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 10:50:13'),
(16, 6, 'Boss test', 'Boss', '2348160317744', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 10:50:16'),
(17, 6, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 10:50:52'),
(18, 6, 'Boss test', 'Boss', '31638734411', 'NL', 'Netherlands', 'T-Mobile Netherlands BV', 'EUR', '2021-05-28 10:50:54'),
(19, 6, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 10:51:16'),
(20, 6, 'Boss test', 'Boss', '31638734411', 'NL', 'Netherlands', 'T-Mobile Netherlands BV', 'EUR', '2021-05-28 10:51:18'),
(21, 6, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 10:51:48'),
(22, 6, 'Micheal', 'Iyanda', '2348160317722', 'NG', 'Nigeria', 'MTN Nigeria Communications Ltd', 'NGN', '2021-05-28 10:52:05'),
(23, 6, 'Boss test', 'Boss', '31638734411', 'NL', 'Netherlands', 'T-Mobile Netherlands BV', 'EUR', '2021-05-28 10:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `sn` int(11) NOT NULL,
  `af_username` varchar(50) NOT NULL,
  `af_apikey` varchar(150) NOT NULL,
  `nv_accesskey` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`sn`, `af_username`, `af_apikey`, `nv_accesskey`) VALUES
(1, 'sandbox', '5eaf04cdee69c7f56474f2ddc9b30edcabe7f8a4ee1f70f4b0859ceaab8501d6', '7e66b30bcfed5b29742be83d2ecc7cb8');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `sn` int(11) NOT NULL,
  `event` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`sn`, `event`) VALUES
(1, 'test1'),
(2, 'test2'),
(3, 'hello1'),
(4, 'hello2'),
(5, 'testnn'),
(6, 'peter');

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
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
