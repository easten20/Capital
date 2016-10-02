-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Okt 2016 pada 13.09
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capital`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brandtype`
--

DROP TABLE IF EXISTS `brandtype`;
CREATE TABLE IF NOT EXISTS `brandtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brandName` varchar(255) NOT NULL,
  `description` text,
  `image_1` varchar(256) DEFAULT NULL,
  `logo` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `brandtype`
--

INSERT INTO `brandtype` (`id`, `brandName`, `description`, `image_1`, `logo`) VALUES
(1, 'KWT', 'Description for KWT here 11', '/backend/web/uploads/brand/kwt/kwt_1.jpg', '/backend/web/uploads/brand/kwt/kwt_1.png'),
(2, 'Crescent', 'Description for Crescent here 1', '/backend/web/uploads/brand/crescent/crescent_1.jpg', '/backend/web/uploads/brand/crescent/crescent_1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parentId` (`parentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
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
-- Struktur dari tabel `categoryproduct`
--

DROP TABLE IF EXISTS `categoryproduct`;
CREATE TABLE IF NOT EXISTS `categoryproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__product` (`productId`),
  KEY `FK__category` (`categoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cofounder`
--

DROP TABLE IF EXISTS `cofounder`;
CREATE TABLE IF NOT EXISTS `cofounder` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(256) NOT NULL,
  `description` text,
  `image_1` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cofounder`
--

INSERT INTO `cofounder` (`id`, `name`, `description`, `image_1`) VALUES
(1, 'ivan', 'NUS Business School', '/backend/web/uploads/cofounder//ivan_1.png'),
(2, 'Widyson', 'Graduated in NUS Business School with finance specialization', '/backend/web/uploads/cofounder//widison_1.png'),
(3, 'IKA', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/backend/web/uploads/cofounder//ika_1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(516) DEFAULT NULL,
  `body` text,
  `is_readed` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `body`, `is_readed`) VALUES
(2, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'edwdfwfw', '0'),
(3, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'kampret', '0'),
(4, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah', '0'),
(5, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah', '0'),
(6, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah', '0'),
(7, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah', '0'),
(8, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah', '0'),
(9, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah', '0'),
(10, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah', '0'),
(11, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah 2', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1455164843),
('m130524_201442_init', 1455164940);

-- --------------------------------------------------------

--
-- Struktur dari tabel `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` text,
  `image_1` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `page`
--

INSERT INTO `page` (`id`, `name`, `title`, `description`, `image_1`) VALUES
(1, 'aboutus', 'About Us', 'Capital was established in 2009, which started as an electrical supplies wholesaler based in Jakarta. We serve commercial, industrial and residential contractors as well as retail customers throughout Indonesia. In 2012, we embarked on an LED Lighting journey, committed to providing an extensive range of energy efficient , environmentally friendly lighting. Today, Capital has grown to be an innovative provider of LED architectural lighting solutions serving a wide variety of project applications. Our core market segments include lighting solutions for shopping centres, Multi-Chain Fashion & Speciality Retail, Supermarkets, Hotels, Restaurants & Bars, Commercial Offices and Residential Luxury & Multi-Dwelling. We have partnered with some of the worldï¿½s leading LED manufacturers to ensure the design and integration of high quality products, with competitive pricing, with up to a 5-year warranty. Out stores and showrooms are conveniently located in Central, South, West Jakarta and Alam Sutera. Customers can drop by one of our stores and showrooms to inquire about our products and services.', ''),
(2, 'slider_1', 'WELCOME TO CAPITAL', 'fine architecture lighting', '/backend/web/uploads/page/slider_1/slider_1_1.jpg'),
(3, 'slider_2', 'BEAUTIFULLY FLEXIBLE', '', '/backend/web/uploads/page/slider_2/slider_2_1.jpg'),
(4, 'slider_3', 'GREAT PERFORMANCE', 'The perfect choice for grandious performance', '/backend/web/uploads/page/slider_3/slider_3_1.jpg'),
(5, 'home_1', 'CAPITAL ARCHITECTURAL LIGHTING', 'for highest feasible architecture', '/backend/web/uploads/page/home_1/home_1_1.png'),
(6, 'home_2', 'Light Redefined', 'Light Designers, Light Scientists', '/backend/web/uploads/page/home_2/home_2_1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `portfolio`
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
-- Struktur dari tabel `product`
--

DROP TABLE IF EXISTS `product`;
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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
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
-- Struktur dari tabel `tree`
--

DROP TABLE IF EXISTS `tree`;
CREATE TABLE IF NOT EXISTS `tree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `root` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `lvl` smallint(5) NOT NULL,
  `name` varchar(60) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `icon_type` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `selected` tinyint(1) NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `readonly` tinyint(1) NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `collapsed` tinyint(1) NOT NULL DEFAULT '0',
  `movable_u` tinyint(1) NOT NULL DEFAULT '1',
  `movable_d` tinyint(1) NOT NULL DEFAULT '1',
  `movable_l` tinyint(1) NOT NULL DEFAULT '1',
  `movable_r` tinyint(1) NOT NULL DEFAULT '1',
  `removable` tinyint(1) NOT NULL DEFAULT '1',
  `removable_all` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `tbl_product_NK1` (`root`),
  KEY `tbl_product_NK2` (`lft`),
  KEY `tbl_product_NK3` (`rgt`),
  KEY `tbl_product_NK4` (`lvl`),
  KEY `tbl_product_NK5` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tree`
--

INSERT INTO `tree` (`id`, `root`, `lft`, `rgt`, `lvl`, `name`, `icon`, `icon_type`, `active`, `selected`, `disabled`, `readonly`, `visible`, `collapsed`, `movable_u`, `movable_d`, `movable_l`, `movable_r`, `removable`, `removable_all`) VALUES
(1, 1, 1, 10, 0, 'Indoor', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(2, 2, 1, 16, 0, 'Outdoor', '', 2, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(3, 1, 2, 3, 1, 'Downlight', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(4, 1, 4, 5, 1, 'Tracklight', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(5, 1, 6, 7, 1, 'Retrofit', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(6, 2, 2, 9, 1, 'Landscape', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(7, 2, 10, 15, 1, 'Industrial', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(8, 2, 3, 4, 2, 'Ceiling', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(9, 2, 5, 6, 2, 'Wall', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(10, 2, 7, 8, 2, 'Inground', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(11, 2, 11, 12, 2, 'Roadlight', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(12, 2, 13, 14, 2, 'Floodlight', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(13, 1, 8, 9, 1, 'High Bay', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'easten', '2hcB6AnuwyCMbu3xS91bnXQNSr--nodl', '$2y$13$Vir0rG4szFKxZRWzsORUTeZjkQizQqnrqNJoSDSHU7rYo.i8qAsuy', 'T8TeybwVZp52l3HrtIVY1X2M6ldEtOpv_1475312662', 'priya.nugraha91@gmail.com', 10, 1455166562, 1475312662),
(2, 'administrator', 'BdNjGbRs_0wA6JPJlEKjP_yX3i7b9qNt', '$2y$13$MJrgXTMENd8NQkPZy/tuEumJGPj47gGgyfTFPI/URewedQ9aHgX7K', NULL, 'priya_nugraha91@yahoo.com', 10, 1462119141, 1475405057);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_parentid_id` FOREIGN KEY (`parentId`) REFERENCES `category` (`id`);

--
-- Ketidakleluasaan untuk tabel `categoryproduct`
--
ALTER TABLE `categoryproduct`
  ADD CONSTRAINT `FK__category` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK__product` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_brandType_product` FOREIGN KEY (`brandTypeId`) REFERENCES `brandtype` (`id`),
  ADD CONSTRAINT `fk_category_produćt` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
