-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2016 at 11:52 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.6.20-1+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `capital`
--

-- --------------------------------------------------------

--
-- Table structure for table `brandType`
--

CREATE TABLE IF NOT EXISTS `brandType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(255) NOT NULL,
  `description` text,
  `image_1` varchar(256) DEFAULT NULL,
  `logo` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `brandType`
--

INSERT INTO `brandType` (`id`, `brandName`, `description`, `image_1`, `logo`) VALUES
(1, 'KWT', 'Description for KWT here 1', '/backend/web/uploads/brand/kwt/kwt_1.jpg', '/backend/web/uploads/brand/kwt/kwt_1.png'),
(2, 'Crescent', 'Description for Crescent here 1', '/backend/web/uploads/brand/crescent/crescent_1.jpg', '/backend/web/uploads/brand/crescent/crescent_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parentId` (`parentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `parentId`, `description`) VALUES
(1, 'Indoor', NULL, ''),
(2, 'Outdoor', NULL, ''),
(3, 'Downlight', 1, ''),
(4, 'Tracklight', 1, ''),
(5, 'Retrofit', 1, ''),
(6, 'Landscape', 2, ''),
(7, 'Industrial', 2, ''),
(8, 'Ceiling', 6, ''),
(9, 'Wall', 6, ''),
(10, 'Inground', 6, ''),
(11, 'Roadlight', 7, ''),
(12, 'Floodlight', 7, ''),
(13, 'High Bay', 7, '');

-- --------------------------------------------------------

--
-- Table structure for table `cofounder`
--

CREATE TABLE IF NOT EXISTS `cofounder` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(256) NOT NULL,
  `description` text,
  `image_1` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cofounder`
--

INSERT INTO `cofounder` (`id`, `name`, `description`, `image_1`) VALUES
(1, 'ivan', 'NUS Business School', '/backend/web/uploads/cofounder//ivan_1.png'),
(2, 'Widyson', 'Graduated in NUS Business School with finance specialization', '/backend/web/uploads/cofounder//widison_1.png'),
(3, 'IKA', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/backend/web/uploads/cofounder//ika_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(516) DEFAULT NULL,
  `body` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `body`) VALUES
(4, 'test', 'test@hotmail.com', 'tset', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1455164843),
('m130524_201442_init', 1455164940);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` text,
  `image_1` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `title`, `description`, `image_1`) VALUES
(1, 'aboutus', 'About Us', 'Capital was established in 2009, which started as an electrical supplies wholesaler based in Jakarta. We serve commercial, industrial and residential contractors as well as retail customers throughout Indonesia. In 2012, we embarked on an LED Lighting journey, committed to providing an extensive range of energy efficient , environmentally friendly lighting. Today, Capital has grown to be an innovative provider of LED architectural lighting solutions serving a wide variety of project applications. Our core market segments include lighting solutions for shopping centres, Multi-Chain Fashion & Speciality Retail, Supermarkets, Hotels, Restaurants & Bars, Commercial Offices and Residential Luxury & Multi-Dwelling. We have partnered with some of the world’s leading LED manufacturers to ensure the design and integration of high quality products, with competitive pricing, with up to a 5-year warranty. Out stores and showrooms are conveniently located in Central, South, West Jakarta and Alam Sutera. Customers can drop by one of our stores and showrooms to inquire about our products and services.', ''),
(2, 'slider_1', 'WELCOME TO CAPITAL', 'fine architecture lighting', '/backend/web/uploads/page/slider_1/slider_1_1.jpg'),
(3, 'slider_2', 'BEAUTIFULLY FLEXIBLE', '', '/backend/web/uploads/page/slider_2/slider_2_1.jpg'),
(4, 'slider_3', 'GREAT PERFORMANCE', 'The perfect choice for grandious performance', '/backend/web/uploads/page/slider_3/slider_3_1.jpg'),
(5, 'home_1', 'CAPITAL ARCHITECTURAL LIGHTING', 'for highest feasible architecture', '/backend/web/uploads/page/home_1/home_1_1.png'),
(6, 'home_2', 'Light Redefined', 'Light Designers, Light Scientists', '/backend/web/uploads/page/home_2/home_2_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `name`, `location`, `thumbnail`, `image_1`, `image_2`, `image_3`) VALUES
(1, 'Crematology', 'Px Pavilion', '/backend/web/uploads/portfolio/crematology/crematology_thumbnail.jpg', '/backend/web/uploads/portfolio/crematology/crematology_1.jpg', '/backend/web/uploads/portfolio/crematology/crematology_2.jpg', NULL),
(2, 'Kay Collection', 'Lippo Mall Puri', '/backend/web/uploads/portfolio/kaycollection/kaycollection_thumbnail.jpg', '/backend/web/uploads/portfolio/kaycollection/kaycollection_1.jpg', '/backend/web/uploads/portfolio/kaycollection/kaycollection_2.jpg', '/backend/web/uploads/portfolio/kaycollection/kaycollection_3.jpg'),
(3, 'NUM8EREIGHT', 'Plaza Indonesia', '/backend/web/uploads/portfolio/num8ereight/num8ereight_thumbnail.jpg', '/backend/web/uploads/portfolio/num8ereight/num8ereight_1.jpg', '/backend/web/uploads/portfolio/num8ereight/num8ereight_2.jpg', NULL),
(4, 'Gereja SLCC', 'Jakarta', '/backend/web/uploads/portfolio/gerejaslcc/gerejaslcc_thumbnail.jpg', '/backend/web/uploads/portfolio/gerejaslcc/gerejaslcc_1.jpg', '/backend/web/uploads/portfolio/gerejaslcc/gerejaslcc_2.jpg', NULL),
(5, 'Prodotti Showroom', 'Duren Tiga', '/backend/web/uploads/portfolio/prodottishowroom/prodottishowroom_thumbnail.jpg', '/backend/web/uploads/portfolio/prodottishowroom/prodottishowroom_1.jpg', '/backend/web/uploads/portfolio/prodottishowroom/prodottishowroom_2.jpg', NULL),
(6, 'Beatrice Quarters', 'Bandung', '/backend/web/uploads/portfolio/beatricequarters/beatricequarters_thumbnail.jpg', '/backend/web/uploads/portfolio/beatricequarters/beatricequarters_1.jpg', '/backend/web/uploads/portfolio/beatricequarters/beatricequarters_2.jpg', '/backend/web/uploads/portfolio/beatricequarters/beatricequarters_3.jpg'),
(7, 'Hachimaki', 'PIK', '/backend/web/uploads/portfolio/hachimaki/hachimaki_thumbnail.jpg', '/backend/web/uploads/portfolio/hachimaki/hachimaki_1.jpg', NULL, NULL),
(8, 'Advance', 'Karawaci', '/backend/web/uploads/portfolio/advanced/advanced_thumbnail.jpg', '/backend/web/uploads/portfolio/advanced/advanced_1.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brandTypeId` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `itemNo` varchar(50) NOT NULL,
  `description` text,
  `power` varchar(50) DEFAULT NULL,
  `luminous` varchar(100) DEFAULT NULL,
  `cri` varchar(50) DEFAULT NULL,
  `pfc` varchar(50) DEFAULT NULL,
  `cutout` varchar(50) DEFAULT NULL,
  `angle` varchar(50) DEFAULT NULL,
  `ledChip` varchar(50) DEFAULT NULL,
  `dimension` varchar(55) DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  `image_4` varchar(255) DEFAULT NULL,
  `image_5` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `itemNo` (`itemNo`),
  KEY `brandTypeId` (`brandTypeId`),
  KEY `brandTypeId_2` (`brandTypeId`),
  KEY `categoryId` (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `brandTypeId`, `categoryId`, `itemNo`, `description`, `power`, `luminous`, `cri`, `pfc`, `cutout`, `angle`, `ledChip`, `dimension`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`) VALUES
(1, 1, 3, 'RC8410DF', '<p><strong>The series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, superior Citizen LED Chip, with high quality driver</strong>\r\n</p><p>Applications: <br>\r\nLuxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions\r\n</p><p>3-Year Warranty<br>\r\n</p>', '10 watt', '590-750lm', '>90', '>0.95', '75mm', '15Â°', 'Bridgelux', '', '/backend/web/uploads/product/rc8410df/rc8410df_1.png', '/backend/web/uploads/product/rc8410df/rc8410df_2.png', '', NULL, NULL),
(2, 1, 3, 'RC8415DF', '<p><strong>The series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, superior Citizen LED Chip, with high quality driver</strong> </p><p>Applications: <br> Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions </p>3-Year Warranty', '15', '1050-1190lm', '90', '0.95', '75', '15ï¿½/36ï¿½', 'Bridgelux', '', '/backend/web/uploads/product/rc8415df/rc8415df_1.png', '/backend/web/uploads/product/rc8415df/rc8415df_2.png', '', NULL, NULL),
(3, 1, 3, 'RC13625DF', '<p><strong>The series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, superior Citizen LED Chip, with high quality driver</strong> </p><p>Applications: <br> Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions </p>3-Year Warranty', '25', '', '82', '0.95', '125', '15°', 'Bridgelux', NULL, '/backend/web/uploads/product/rc13625df/rc13625df_1.png', '/backend/web/uploads/product/rc13625df/rc13625df_2.png', NULL, NULL, NULL),
(4, 1, 3, 'RC9007', '<p><strong>The series are superior quality ceiling spot lights, pure-alumunium housing, baking finished, total glare-free design, superior Citizen LED chips and high quality driver.</strong>\r\n</p><p>Applications<br>\r\nHotel &amp; wall wash\r\n</p><p>3-Year warranty<br><strong></strong>\r\n</p>', '7', '', '90', '0.95', '75', '15°/24°', 'Citizen', NULL, '/backend/web/uploads/product/rc9007/rc9007_1.png', '/backend/web/uploads/product/rc9007/rc9007_2.png', '/backend/web/uploads/product/rc9007/rc9007_3.png', NULL, NULL),
(5, 1, 3, 'RC9010', '<p><strong>The series are superior quality ceiling spot lights, pure-alumunium housing, baking finished, total glare-free design, superior Citizen LED chips and high quality driver.</strong> </p><p>Applications<br> Hotel &amp; wall wash </p><p>3-Year warranty</p><p><br><strong></strong> </p>', '10', '470-620lm', '90', '0.95', '75', '15°/24°', 'Citizen', NULL, '/backend/web/uploads/product/rc9010/rc9010_1.png', '/backend/web/uploads/product/rc9010/rc9010_2.png', '/backend/web/uploads/product/rc9010/rc9010_3.png', NULL, NULL),
(6, 1, 3, 'RC9015', '<p><strong>The series are superior quality ceiling spot lights, pure-alumunium housing, baking finished, total glare-free design, superior Citizen LED chips and high quality driver.</strong> </p><p>Applications<br> Hotel &amp; wall wash </p><p>3-Year warranty<br><strong></strong> </p>', '15', '820-930lm', '90', '0.95', '75', '15°/24°', 'Citizen', NULL, '/backend/web/uploads/product/rc9015/rc9015_1.png', '/backend/web/uploads/product/rc9015/rc9015_2.png', '/backend/web/uploads/product/rc9015/rc9015_3.png', NULL, NULL),
(7, 1, 3, 'DLC0628', '<p><strong>The ballroom series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, long life performance Citizen LED chip, with high quality driver.</strong> </p><p>Applications<br>Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions<br></p><p>3-Year warranty<br><strong></strong> </p>', '28', '1750-1805lm', '83', '0.95', '175', '45°', 'Citizen', NULL, '/backend/web/uploads/product/dlc0628/dlc0628_1.png', '/backend/web/uploads/product/dlc0628/dlc0628_2.png', '/backend/web/uploads/product/dlc0628/dlc0628_3.png', NULL, NULL),
(8, 1, 3, 'DLC0638', '<p><strong>The ballroom series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, long life performance Citizen LED chip, with high quality driver.</strong> </p><p>Applications<br>Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions<br></p>3-Year warranty', '38', '2950-3050lm', '83', '1', '175', '45°', 'Citizen', NULL, '/backend/web/uploads/product/dlc0638/dlc0638_1.png', '/backend/web/uploads/product/dlc0638/dlc0638_2.png', '/backend/web/uploads/product/dlc0638/dlc0638_3.png', NULL, NULL),
(9, 1, 3, 'DLC0650', '<p><strong>The ballroom series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, long life performance Citizen LED chip, with high quality driver.</strong> </p><p>Applications<br>Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions<br></p>3-Year warranty', '50', '3800-3950lm', '83', '0.95', '175', '30°', 'Citizen', NULL, '/backend/web/uploads/product/dlc0650/dlc0650_1.png', '/backend/web/uploads/product/dlc0650/dlc0650_2.png', '/backend/web/uploads/product/dlc0650/dlc0650_3.png', NULL, NULL),
(10, 1, 3, 'DLC0670', '<p><strong>The ballroom series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, long life performance Citizen LED chip, with high quality driver.</strong> </p><p>Applications<br>Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions<br></p>3-Year warranty', '70', '5250-5450lm', '83', '0.95', '175', '30°', 'Citizen', NULL, '/backend/web/uploads/product/dlc0670/dlc0670_1.png', '/backend/web/uploads/product/dlc0670/dlc0670_2.png', '/backend/web/uploads/product/dlc0670/dlc0670_3.png', NULL, NULL),
(11, 1, 3, 'FR1031L', '<p><strong>The 360° series are made of long life performance Citizen or Sharp LED chips, and die casting alumunium allow body. The surface is treated by powder coating. The reflector is heat resistant, anti glare and will not discolor for long time.</strong>\r\n</p><p>Applications:<br>\r\nShopping malls, retail stores, supermarkets, cabinets, exhibitions, etc.\r\n</p><p>3-Year Warranty<br>\r\n</p>', '10', '710lm', '82', '1', '83', '15°', 'Sharp', NULL, '/backend/web/uploads/product/fr1031l/fr1031l_1.png', '/backend/web/uploads/product/fr1031l/fr1031l_2.png', '/backend/web/uploads/product/fr1031l/fr1031l_3.png', NULL, NULL),
(16, 1, 3, 'DLE0525', '<p><strong>The ballroom series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, long life performance Citizen LED chip, with high quality driver.</strong> </p><p>Applications<br>Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions<br></p>3-Year warranty', '25', '2200-2300lm', '83', '0.95', '160', '25°', 'Citizen', NULL, '/backend/web/uploads/product/dle0525/dle0525_1.png', '/backend/web/uploads/product/dle0525/dle0525_2.png', '/backend/web/uploads/product/dle0525/dle0525_3.png', NULL, NULL),
(17, 1, 3, 'FR1206', '<p>The cabinet series is made of long life performance Sharp LED chip and die casting aluminum allow body. The surface is treated by powder coating. The reflector is heat resistant, anti glare and will not discolor for long time.<br></p>', '32', '120lm', '82', '0.7', '45', '25°', 'Sharp', NULL, '/backend/web/uploads/product/fr1206/fr1206_1.png', '/backend/web/uploads/product/fr1206/fr1206_2.png', '/backend/web/uploads/product/fr1206/fr1206_3.png', NULL, NULL),
(18, 1, 3, 'RC9815PG', '<p><strong>The gimbal series are made of high CRI long life performance Citizen or Sharp LED chips, and die casting aluminum allow body. The surface is treated by powder coating. The reflector is heat resistant, anti glare and will not discolor for long time</strong>.</p><p>Applications:</p><p>Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions.<br></p>', '15', '620-670lm', '90', '0.95', '75', '24°', 'Citizen', '', '/backend/web/uploads/product/rc9815pg/rc9815pg_1.png', '/backend/web/uploads/product/rc9815pg/rc9815pg_2.png', '', NULL, NULL),
(19, 1, 4, 'RT6210', '<p><strong>The 3 wire tracklight series are made of long life performance Cree or Citizen Led chips. The glare-free design, perfect light spot and accurate beam angle.</strong>\r\n</p><p>Applications:<br>\r\nShopping malls, fashion stores, clothes stores, retailer stores, supermarkets, exhibitions.\r\n</p><p>3-Year Warranty<br>\r\n</p>', '10', '700-800lm', '80', '0.95', NULL, '24°', 'Cree', '62x129mm', '/backend/web/uploads/product/rt6210/rt6210_1.png', '/backend/web/uploads/product/rt6210/rt6210_2.png', NULL, NULL, NULL),
(20, 1, 4, 'RT6915', '<p><strong>The 3 wire tracklight series are made of long life performance Cree or Citizen Led chips. The glare-free design, perfect light spot and accurate beam angle.</strong> </p><p>Applications:<br> Shopping malls, fashion stores, clothes stores, retailer stores, supermarkets, exhibitions. </p><p>3-Year Warranty<br> </p>', '15', '1090-1230lm', '83', '0.95', NULL, '24°', 'Citizen', '69x150mm', '/backend/web/uploads/product/rt6915/rt6915_1.png', '/backend/web/uploads/product/rt6915/rt6915_2.png', NULL, NULL, NULL),
(21, 1, 4, 'RT8535', '<p><strong>The 3 wire tracklight series are made of long life performance Cree or Citizen Led chips. The glare-free design, perfect light spot and accurate beam angle.</strong> </p><p>Applications:<br> Shopping malls, fashion stores, clothes stores, retailer stores, supermarkets, exhibitions. </p><p>3-Year Warranty<br> </p>', '35', '2330-2910lm', '90', '0.95', NULL, '24°', 'Citizen', '85x196mm', '/backend/web/uploads/product/rt8535/rt8535_1.png', '/backend/web/uploads/product/rt8535/rt8535_2.png', NULL, NULL, NULL),
(22, 1, 3, 'FR1026', '<p><strong>The IP44 series is made of long life performance Sharp LED chip and die casting aluminum allow body. The surface is treated by powder coating. The reflector is heat resistant, anti glare and will not discolor for long time.</strong>\r\n</p>\r\n<p>Applications:<br>\r\nLuxurius hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibtions\r\n</p>\r\n<p>3-Year Warranty.\r\n</p>\r\n<br>', '7', '475lm', '82', '0.7', '70', '25°', 'Sharp', '', '/backend/web/uploads/product/fr1026/fr1026_1.png', '/backend/web/uploads/product/fr1026/fr1026_2.png', '/backend/web/uploads/product/fr1026/fr1026_3.png', NULL, NULL),
(23, 1, 3, 'FR1229', '<p><strong>The trimless series is made of deep recessed reflector, long life performance Sharp LED chips, and die casting aluminum allow body. The surface is treated by powder coating.</strong> <strong>The reflector is heat resistant, anti glare and will not discolor for long time.</strong>\r\n</p>\r\n<p>Applications:<br>\r\nLuxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions.\r\n</p>\r\n<p>3-Year Warranty<br>\r\n</p>', '10', '654lm', '82', '0.7', '83', '24°', 'Sharp', '', '/backend/web/uploads/product/fr1229/fr1229_1.png', '/backend/web/uploads/product/fr1229/fr1229_2.png', '/backend/web/uploads/product/fr1229/fr1229_3.png', NULL, NULL),
(24, 1, 3, 'FR1020', '<p><strong>The gimbal series are made of high CRI long life performance Citizen or Sharp LED chips, and die casting aluminum allow body. The surface is treated by powder coating. The reflector is heat resistant, anti glare and will not discolor for long time</strong>.</p><p>Applications:</p><p>Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions.<br></p>', '25', '1985lm', '90', '0.7', '137', '24°', 'Sharp', '', '/backend/web/uploads/product/fr1020/fr1020_1.png', '/backend/web/uploads/product/fr1020/fr1020_2.png', NULL, NULL, NULL),
(25, 1, 3, 'FR1156', '<p><strong>The razor series is made of high CRI long life performance Citizen or Sharp LED chips and die casting aluminum allow body. The surface is treated by powder coating. The reflector is heat resistant, anti glare and will not discolor for long time.</strong></p><p>Applications:</p><p>Luxurious hotels, club, offices, shopping malls, retail stores, stations, supermarkets, exhibitions</p><p>3-Year Warranty<br></p>', '5', '1200lm', '82', '0.7', '165', '24°', 'Sharp', '', '/backend/web/uploads/product/fr1156/fr1156_1.png', '/backend/web/uploads/product/fr1156/fr1156_2.png', '/backend/web/uploads/product/fr1156/fr1156_3.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'easten', '2hcB6AnuwyCMbu3xS91bnXQNSr--nodl', '$2y$13$tvePnnzib5rSwbizQ1SOeu4qGxrT/CSOi76MkV/vFC8EPNN0mcvZO', NULL, 'timur.wiradarma@outlook.com', 10, 1455166562, 1474303927),
(2, 'administrator', 'BdNjGbRs_0wA6JPJlEKjP_yX3i7b9qNt', '$2y$13$zJePhdfB4NuouNPn6ucAreNnmEMmavTilYNHR8cYWUYl9lWllRpWC', NULL, 'info@capitalelectric.co.id', 10, 1462119141, 1462119141);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_parentid_id` FOREIGN KEY (`parentId`) REFERENCES `category` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_brandType_product` FOREIGN KEY (`brandTypeId`) REFERENCES `brandType` (`id`),
  ADD CONSTRAINT `fk_category_produćt` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
