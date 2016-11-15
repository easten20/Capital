-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Nov 2016 pada 18.12
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

CREATE TABLE `brandtype` (
  `id` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL,
  `description` text,
  `logo` varchar(255) DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `brandtype`
--

INSERT INTO `brandtype` (`id`, `brandName`, `description`, `logo`, `image_1`) VALUES
(1, 'KWT', 'Description for KWT here 11', '4676520160817_132454.jpg', '90337Pasted image at 2016_10_15 02_01 PM.png'),
(2, 'Crescent', 'Description for Crescent here 1', 'crescent_1.png', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
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
  `removable_all` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `root`, `lft`, `rgt`, `lvl`, `name`, `icon`, `icon_type`, `active`, `selected`, `disabled`, `readonly`, `visible`, `collapsed`, `movable_u`, `movable_d`, `movable_l`, `movable_r`, `removable`, `removable_all`) VALUES
(1, 1, 1, 10, 0, 'Indoor', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(2, 2, 1, 16, 0, 'Outdoor', '', 2, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(3, 1, 2, 3, 1, 'Downlight', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(4, 1, 6, 7, 1, 'Tracklight', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(5, 1, 8, 9, 1, 'Retrofit', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(6, 2, 2, 9, 1, 'Landscape', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(7, 2, 10, 15, 1, 'Industrial', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(8, 2, 3, 4, 2, 'Ceiling', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(9, 2, 7, 8, 2, 'Wall', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(10, 2, 5, 6, 2, 'Inground', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(11, 2, 13, 14, 2, 'Roadlight', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(12, 2, 11, 12, 2, 'Floodlight', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(13, 1, 4, 5, 1, 'High Bay', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categoryproduct`
--

CREATE TABLE `categoryproduct` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `categoryproduct`
--

INSERT INTO `categoryproduct` (`id`, `productId`, `categoryId`) VALUES
(1, 2, 3),
(2, 2, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cofounder`
--

CREATE TABLE `cofounder` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text,
  `image_1` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cofounder`
--

INSERT INTO `cofounder` (`id`, `name`, `description`, `image_1`) VALUES
(1, 'ivan', 'NUS Business School', '/backend/web/uploads/cofounder//ivan_1.png'),
(2, 'Widyson', 'Graduated in NUS Business School with finance specialization', '/backend/web/uploads/cofounder//widison_1.png'),
(3, 'IKA', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '/backend/web/uploads/cofounder//ika_1.png'),
(4, 'Piyo', 'aaaaaa', '8194320160329_121438.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(516) DEFAULT NULL,
  `body` text,
  `is_readed` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `body`, `is_readed`) VALUES
(3, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'kampret', '1'),
(4, 'Priya Nugraha 333', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah', '1'),
(5, 'Priya Nugraha 8', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah', '1'),
(6, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah', '0'),
(7, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah', '1'),
(8, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah', '0'),
(9, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah', '1'),
(10, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah', '0'),
(11, 'Priya Nugraha', 'piyo@tonjoo.com', 'Coba', 'Coba, bismilah 2', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `get_info` enum('1','0') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `email`
--

INSERT INTO `email` (`id`, `email`, `get_info`) VALUES
(1, 'priya.nugraha91@gmail.com', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
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

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` text,
  `image_1` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `page`
--

INSERT INTO `page` (`id`, `name`, `title`, `description`, `image_1`) VALUES
(1, 'aboutus', 'About Us', 'Capital was established in 2009, which started as an electrical supplies wholesaler based in Jakarta. We serve commercial, industrial and residential contractors as well as retail customers throughout Indonesia. In 2012, we embarked on an LED Lighting journey, committed to providing an extensive range of energy efficient , environmentally friendly lighting. Today, Capital has grown to be an innovative provider of LED architectural lighting solutions serving a wide variety of project applications. Our core market segments include lighting solutions for shopping centres, Multi-Chain Fashion & Speciality Retail, Supermarkets, Hotels, Restaurants & Bars, Commercial Offices and Residential Luxury & Multi-Dwelling. We have partnered with some of the worldï¿½s leading LED manufacturers to ensure the design and integration of high quality products, with competitive pricing, with up to a 5-year warranty. Out stores and showrooms are conveniently located in Central, South, West Jakarta and Alam Sutera. Customers can drop by one of our stores and showrooms to inquire about our products and services.', '9483320160329_111658.jpg'),
(2, 'slider_1', 'WELCOME TO CAPITAL', 'fine architecture lighting', '/backend/web/uploads/page/slider_1/slider_1_1.jpg'),
(3, 'slider_2', 'BEAUTIFULLY FLEXIBLE', '', '/backend/web/uploads/page/slider_2/slider_2_1.jpg'),
(4, 'slider_3', 'GREAT PERFORMANCE', 'The perfect choice for grandious performance', '/backend/web/uploads/page/slider_3/slider_3_1.jpg'),
(5, 'home_1', 'CAPITAL ARCHITECTURAL LIGHTING', 'for highest feasible architecture', '/backend/web/uploads/page/home_1/home_1_1.png'),
(6, 'home_2', 'Light Redefined', 'Light Designers, Light Scientists', '/backend/web/uploads/page/home_2/home_2_1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `portfolio`
--

INSERT INTO `portfolio` (`id`, `name`, `location`, `thumbnail`) VALUES
(1, 'Crematology', 'Px Pavilion', '4872920160329_121429.jpg'),
(2, 'Kay Collection', 'Lippo Mall Puri', '/backend/web/uploads/portfolio/kaycollection/kaycollection_thumbnail.jpg'),
(3, 'NUM8EREIGHT', 'Plaza Indonesia', '/backend/web/uploads/portfolio/num8ereight/num8ereight_thumbnail.jpg'),
(4, 'Gereja SLCC', 'Jakarta', '/backend/web/uploads/portfolio/gerejaslcc/gerejaslcc_thumbnail.jpg'),
(5, 'Prodotti Showroom', 'Duren Tiga', '/backend/web/uploads/portfolio/prodottishowroom/prodottishowroom_thumbnail.jpg'),
(6, 'Beatrice Quarters', 'Bandung', '/backend/web/uploads/portfolio/beatricequarters/beatricequarters_thumbnail.jpg'),
(7, 'Hachimaki', 'PIK', '/backend/web/uploads/portfolio/hachimaki/hachimaki_thumbnail.jpg'),
(8, 'Advance', 'Karawaci', '/backend/web/uploads/portfolio/advanced/advanced_thumbnail.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfoliogalery`
--

CREATE TABLE `portfoliogalery` (
  `id` int(11) NOT NULL,
  `portfolioId` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `information` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `portfoliogalery`
--

INSERT INTO `portfoliogalery` (`id`, `portfolioId`, `image`, `information`) VALUES
(1, 1, '4173620160817_144317.jpg', 'narsis 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `brandTypeId` int(11) NOT NULL,
  `itemNo` varchar(50) NOT NULL,
  `description` text,
  `power` varchar(50) DEFAULT NULL,
  `luminous` varchar(100) DEFAULT NULL,
  `cri` varchar(50) DEFAULT NULL,
  `pfc` varchar(50) DEFAULT NULL,
  `cutout` varchar(50) DEFAULT NULL,
  `angle` varchar(50) DEFAULT NULL,
  `ledChip` varchar(50) DEFAULT NULL,
  `dimension` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `brandTypeId`, `itemNo`, `description`, `power`, `luminous`, `cri`, `pfc`, `cutout`, `angle`, `ledChip`, `dimension`) VALUES
(2, 1, 'RC8415DF', '<p><strong>The series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, superior Citizen LED Chip, with high quality driver</strong> </p><p>Applications: <br> Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions </p>3-Year Warranty', '15', '1050-1190lm', '90', '0.95', '75', '15ï¿½/36ï¿½', 'Bridgelux', ''),
(3, 1, 'RC13625DF', '<p><strong>The series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, superior Citizen LED Chip, with high quality driver</strong> </p><p>Applications: <br> Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions </p>3-Year Warranty', '25', '', '82', '0.95', '125', '15°', 'Bridgelux', NULL),
(4, 1, 'RC9007', '<p><strong>The series are superior quality ceiling spot lights, pure-alumunium housing, baking finished, total glare-free design, superior Citizen LED chips and high quality driver.</strong>\r\n</p><p>Applications<br>\r\nHotel &amp; wall wash\r\n</p><p>3-Year warranty<br><strong></strong>\r\n</p>', '7', '', '90', '0.95', '75', '15°/24°', 'Citizen', NULL),
(5, 1, 'RC9010', '<p><strong>The series are superior quality ceiling spot lights, pure-alumunium housing, baking finished, total glare-free design, superior Citizen LED chips and high quality driver.</strong> </p><p>Applications<br> Hotel &amp; wall wash </p><p>3-Year warranty</p><p><br><strong></strong> </p>', '10', '470-620lm', '90', '0.95', '75', '15°/24°', 'Citizen', NULL),
(6, 1, 'RC9015', '<p><strong>The series are superior quality ceiling spot lights, pure-alumunium housing, baking finished, total glare-free design, superior Citizen LED chips and high quality driver.</strong> </p><p>Applications<br> Hotel &amp; wall wash </p><p>3-Year warranty<br><strong></strong> </p>', '15', '820-930lm', '90', '0.95', '75', '15°/24°', 'Citizen', NULL),
(7, 1, 'DLC0628', '<p><strong>The ballroom series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, long life performance Citizen LED chip, with high quality driver.</strong> </p><p>Applications<br>Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions<br></p><p>3-Year warranty<br><strong></strong> </p>', '28', '1750-1805lm', '83', '0.95', '175', '45°', 'Citizen', NULL),
(8, 1, 'DLC0638', '<p><strong>The ballroom series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, long life performance Citizen LED chip, with high quality driver.</strong> </p><p>Applications<br>Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions<br></p>3-Year warranty', '38', '2950-3050lm', '83', '1', '175', '45°', 'Citizen', NULL),
(9, 1, 'DLC0650', '<p><strong>The ballroom series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, long life performance Citizen LED chip, with high quality driver.</strong> </p><p>Applications<br>Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions<br></p>3-Year warranty', '50', '3800-3950lm', '83', '0.95', '175', '30°', 'Citizen', NULL),
(10, 1, 'DLC0670', '<p><strong>The ballroom series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, long life performance Citizen LED chip, with high quality driver.</strong> </p><p>Applications<br>Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions<br></p>3-Year warranty', '70', '5250-5450lm', '83', '0.95', '175', '30°', 'Citizen', NULL),
(11, 1, 'FR1031L', '<p><strong>The 360° series are made of long life performance Citizen or Sharp LED chips, and die casting alumunium allow body. The surface is treated by powder coating. The reflector is heat resistant, anti glare and will not discolor for long time.</strong>\r\n</p><p>Applications:<br>\r\nShopping malls, retail stores, supermarkets, cabinets, exhibitions, etc.\r\n</p><p>3-Year Warranty<br>\r\n</p>', '10', '710lm', '82', '1', '83', '15°', 'Sharp', NULL),
(16, 1, 'DLE0525', '<p><strong>The ballroom series are ceiling spot lights with fixed head, unique die-cast alumunium heat sink, baking finished surface, fashionable and special appearance, long life performance Citizen LED chip, with high quality driver.</strong> </p><p>Applications<br>Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions<br></p>3-Year warranty', '25', '2200-2300lm', '83', '0.95', '160', '25°', 'Citizen', NULL),
(17, 1, 'FR1206', '<p>The cabinet series is made of long life performance Sharp LED chip and die casting aluminum allow body. The surface is treated by powder coating. The reflector is heat resistant, anti glare and will not discolor for long time.<br></p>', '32', '120lm', '82', '0.7', '45', '25°', 'Sharp', NULL),
(18, 1, 'RC9815PG', '<p><strong>The gimbal series are made of high CRI long life performance Citizen or Sharp LED chips, and die casting aluminum allow body. The surface is treated by powder coating. The reflector is heat resistant, anti glare and will not discolor for long time</strong>.</p><p>Applications:</p><p>Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions.<br></p>', '15', '620-670lm', '90', '0.95', '75', '24°', 'Citizen', ''),
(19, 1, 'RT6210', '<p><strong>The 3 wire tracklight series are made of long life performance Cree or Citizen Led chips. The glare-free design, perfect light spot and accurate beam angle.</strong>\r\n</p><p>Applications:<br>\r\nShopping malls, fashion stores, clothes stores, retailer stores, supermarkets, exhibitions.\r\n</p><p>3-Year Warranty<br>\r\n</p>', '10', '700-800lm', '80', '0.95', NULL, '24°', 'Cree', '62x129mm'),
(20, 1, 'RT6915', '<p><strong>The 3 wire tracklight series are made of long life performance Cree or Citizen Led chips. The glare-free design, perfect light spot and accurate beam angle.</strong> </p><p>Applications:<br> Shopping malls, fashion stores, clothes stores, retailer stores, supermarkets, exhibitions. </p><p>3-Year Warranty<br> </p>', '15', '1090-1230lm', '83', '0.95', NULL, '24°', 'Citizen', '69x150mm'),
(21, 1, 'RT8535', '<p><strong>The 3 wire tracklight series are made of long life performance Cree or Citizen Led chips. The glare-free design, perfect light spot and accurate beam angle.</strong> </p><p>Applications:<br> Shopping malls, fashion stores, clothes stores, retailer stores, supermarkets, exhibitions. </p><p>3-Year Warranty<br> </p>', '35', '2330-2910lm', '90', '0.95', NULL, '24°', 'Citizen', '85x196mm'),
(22, 1, 'FR1026', '<p><strong>The IP44 series is made of long life performance Sharp LED chip and die casting aluminum allow body. The surface is treated by powder coating. The reflector is heat resistant, anti glare and will not discolor for long time.</strong>\r\n</p>\r\n<p>Applications:<br>\r\nLuxurius hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibtions\r\n</p>\r\n<p>3-Year Warranty.\r\n</p>\r\n<br>', '7', '475lm', '82', '0.7', '70', '25°', 'Sharp', ''),
(23, 1, 'FR1229', '<p><strong>The trimless series is made of deep recessed reflector, long life performance Sharp LED chips, and die casting aluminum allow body. The surface is treated by powder coating.</strong> <strong>The reflector is heat resistant, anti glare and will not discolor for long time.</strong>\r\n</p>\r\n<p>Applications:<br>\r\nLuxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions.\r\n</p>\r\n<p>3-Year Warranty<br>\r\n</p>', '10', '654lm', '82', '0.7', '83', '24°', 'Sharp', ''),
(24, 1, 'FR1020', '<p><strong>The gimbal series are made of high CRI long life performance Citizen or Sharp LED chips, and die casting aluminum allow body. The surface is treated by powder coating. The reflector is heat resistant, anti glare and will not discolor for long time</strong>.</p><p>Applications:</p><p>Luxurious hotels, clubs, offices, shopping malls, retail stores, stations, supermarkets, exhibitions.<br></p>', '25', '1985lm', '90', '0.7', '137', '24°', 'Sharp', ''),
(25, 1, 'FR1156', '<p><strong>The razor series is made of high CRI long life performance Citizen or Sharp LED chips and die casting aluminum allow body. The surface is treated by powder coating. The reflector is heat resistant, anti glare and will not discolor for long time.</strong></p><p>Applications:</p><p>Luxurious hotels, club, offices, shopping malls, retail stores, stations, supermarkets, exhibitions</p><p>3-Year Warranty<br></p>', '5', '1200lm', '82', '0.7', '165', '24°', 'Sharp', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `productgalery`
--

CREATE TABLE `productgalery` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `information` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `productgalery`
--

INSERT INTO `productgalery` (`id`, `productId`, `image`, `information`) VALUES
(1, 2, '2702820160817_130810.jpg', 'narsis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'easten', '2hcB6AnuwyCMbu3xS91bnXQNSr--nodl', '$2y$13$Vir0rG4szFKxZRWzsORUTeZjkQizQqnrqNJoSDSHU7rYo.i8qAsuy', 'T8TeybwVZp52l3HrtIVY1X2M6ldEtOpv_1475312662', 'priya.nugraha91@gmail.com', 10, 1455166562, 1475312662),
(2, 'administrator', 'BdNjGbRs_0wA6JPJlEKjP_yX3i7b9qNt', '$2y$13$MJrgXTMENd8NQkPZy/tuEumJGPj47gGgyfTFPI/URewedQ9aHgX7K', NULL, 'priya_nugraha91@yahoo.com', 10, 1462119141, 1475405057);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brandtype`
--
ALTER TABLE `brandtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_product_NK1` (`root`),
  ADD KEY `tbl_product_NK2` (`lft`),
  ADD KEY `tbl_product_NK3` (`rgt`),
  ADD KEY `tbl_product_NK4` (`lvl`),
  ADD KEY `tbl_product_NK5` (`active`);

--
-- Indexes for table `categoryproduct`
--
ALTER TABLE `categoryproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__product` (`productId`),
  ADD KEY `FK__category` (`categoryId`);

--
-- Indexes for table `cofounder`
--
ALTER TABLE `cofounder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfoliogalery`
--
ALTER TABLE `portfoliogalery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__product` (`portfolioId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `itemNo` (`itemNo`),
  ADD KEY `brandTypeId` (`brandTypeId`);

--
-- Indexes for table `productgalery`
--
ALTER TABLE `productgalery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__product` (`productId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brandtype`
--
ALTER TABLE `brandtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `categoryproduct`
--
ALTER TABLE `categoryproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cofounder`
--
ALTER TABLE `cofounder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `portfoliogalery`
--
ALTER TABLE `portfoliogalery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `productgalery`
--
ALTER TABLE `productgalery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `categoryproduct`
--
ALTER TABLE `categoryproduct`
  ADD CONSTRAINT `FK__product` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `portfoliogalery`
--
ALTER TABLE `portfoliogalery`
  ADD CONSTRAINT `FK_portfoliogalery_portfolio` FOREIGN KEY (`portfolioId`) REFERENCES `portfolio` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_brandType_product` FOREIGN KEY (`brandTypeId`) REFERENCES `brandtype` (`id`);

--
-- Ketidakleluasaan untuk tabel `productgalery`
--
ALTER TABLE `productgalery`
  ADD CONSTRAINT `productgalery_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
