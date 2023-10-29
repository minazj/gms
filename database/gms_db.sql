-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 13, 2023 at 07:57 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `donatorapp_list`
--

DROP TABLE IF EXISTS `donatorapp_list`;
CREATE TABLE IF NOT EXISTS `donatorapp_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `goodsneeded_id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `quantity` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `remark` varchar(250) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0=pending,\r\n1=Confirmed,\r\n2=Arrived,\r\n3=No Show,\r\n4=Done,\r\n5=Cancelled',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `goodsneeded_id` (`goodsneeded_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donatorapp_list`
--

INSERT INTO `donatorapp_list` (`id`, `goodsneeded_id`, `code`, `quantity`, `name`, `contact`, `email`, `address`, `date`, `remark`, `status`, `date_created`, `date_updated`) VALUES
(5, 10, '20230400001', 2, 'Hanis', '09123456789', 'hanis@sample.com', 'Sample Address', '2023-04-21 15:30:00', 'tiada', 0, '2023-05-20 14:30:04', '2023-05-20 15:21:47'),
(6, 10, '20230400002', 1, 'Amanina', '09654789123', 'amanian@sample.com', 'Sample Address', '2023-04-20 18:00:00', 'takada', 4, '2023-06-20 15:23:41', '2023-06-12 07:35:26'),
(7, 10, '20230600001', 1, 'NUR AZMINA BINTI MUZLI', '0173865703', 'azminamuzli90@gmail.com', 'Shah Alam', '2023-06-15 16:17:00', 'L', 0, '2023-06-15 15:17:45', '2023-06-15 15:17:45'),
(8, 11, '20230600002', 2, 'Rogayah', '01222222222', 'rogayah@tmks.uitm.edu.my', '', '2023-06-22 12:30:00', '', 0, '2023-06-22 12:31:56', '2023-06-22 12:31:56'),
(9, 10, '20230600003', 2, 'Rogayah', '10111111111', 'rogayah@tmks.uitm.edu.my', 'shah alam', '2023-06-22 12:33:00', '', 0, '2023-06-22 12:34:12', '2023-06-22 12:34:12'),
(10, 10, '20230600004', 2, 'Rogayah', '01222222222', 'rogayah@yahoo.com', 'shah alam', '2023-06-22 12:35:00', '', 0, '2023-06-22 12:36:03', '2023-06-22 12:36:03'),
(11, 11, '20230600005', 1, 'Nurhaiza Kamaruzzaman', '0122468910', 'haiza@gmail.com', 'Kulai, Kedah', '2023-06-27 01:06:00', '', 0, '2023-06-27 01:06:54', '2023-06-27 01:06:54'),
(12, 13, '20230600006', 1, 'NUR AZMINA BINTI MUZLI', '0173865703', 'azminamuzli90@gmail.com', 'Shah Alam', '2023-06-27 01:09:00', '', 0, '2023-06-27 01:09:32', '2023-06-27 01:09:32'),
(13, 13, '20230600007', 2, 'Ashilah Alias', '012345678', 'shila@gmail.com', 'terengganu', '2023-06-27 01:24:00', 'a', 0, '2023-06-27 01:24:39', '2023-06-27 01:24:39'),
(14, 11, '20230700001', 1, 'NUR AZMINA BINTI MUZLI', '0173865703', 'azminamuzli90@gmail.com', 'Shah Alam', '2023-07-07 10:07:00', 'a', 0, '2023-07-07 10:07:51', '2023-07-07 10:07:51'),
(15, 11, '20230700002', 1, 'NUR AZMINA BINTI MUZLI', '0173865703', 'azminamuzli90@gmail.com', 'Shah Alam', '2023-07-07 10:07:00', 'a', 0, '2023-07-07 10:08:04', '2023-07-07 10:08:04'),
(16, 12, '20230700003', 1, 'Nur Azmina', '173865703', 'azminamuzli90@gmail.com', 'banting', '2023-07-10 17:50:00', '1', 0, '2023-07-10 17:51:04', '2023-07-10 17:51:04'),
(17, 13, '20230700004', 1, 'Mustamin ', '178344307', 'mustamin@gmail', 'Sabah', '2023-07-10 18:35:00', '', 0, '2023-07-10 18:36:19', '2023-07-10 18:36:19'),
(18, 12, '20230700005', 2, 'Siti nurhafizah bt ibrahim', '0173417765', 'ctnurhafizah@gmail.com', 'Banting, selangor', '2023-07-11 19:37:00', '', 5, '2023-07-10 19:38:00', '2023-07-18 15:46:05'),
(19, 13, '20230700006', 2, 'An', '01222222222', 'an@yahoo.com', 'Sem', '2023-07-11 10:47:00', '', 4, '2023-07-11 10:47:01', '2023-07-18 15:45:47'),
(20, 17, '20230700007', 5, 'Nor aqilah bt mohd zainuddin', '01151403528', 'qilazeck19@gmail.com', 'Taman tasik tambahan', '2023-07-18 14:36:00', '', 1, '2023-07-18 14:36:12', '2023-07-18 15:45:15'),
(21, 15, '20230700008', 3, 'Nur Azmina', '0173865703', 'azminamuzli90@gmail.com', 'Banting', '2023-07-18 14:51:00', 's', 3, '2023-07-18 14:51:36', '2023-07-18 15:45:33'),
(23, 11, '20230700010', 3, 'NUR HIDAYAH BINTI TAMRIN @ LAJUDIN ', '0178110930 ', 'nurhidayahlajudintamrin@gmail.com', 'Lorong Imam Haji Said Batu 4 Jalan Apas Tawau Saba', '2023-07-18 15:13:00', '', 2, '2023-07-18 15:13:22', '2023-07-18 15:45:24'),
(24, 14, '20230700009', 50, 'Wibie Syahedzan', '0185647832', 'ahtahlah@gmail.com', '', '2023-07-31 12:14:00', 'Banyak lagi', 2, '2023-07-19 12:14:49', '2023-07-19 20:12:58'),
(25, 17, '20230700011', 2, 'Aina Fariha Fariha', '0195872696', 'ainafarrhussaini@gmail.com', 'dadasd', '2023-07-24 20:50:00', '', 0, '2023-07-19 20:50:41', '2023-07-19 20:50:41'),
(26, 12, '20230700012', 9, 'Aina Fariha binti Mohamad Hussaini', '0195872696', 'ainafarrhussaini@gmail.com', 'No 1841 Jalan A63, Taman Warisan Puteri, Precint 6', '2023-07-07 20:52:00', '', 0, '2023-07-19 20:52:50', '2023-07-19 20:52:50'),
(27, 15, '20230700013', 3, 'Aizat Bin Mohd Arshad', '0173476527', 'aiarsh83@gmail.com', 'Taman Damai simpang Morib', '2023-07-21 10:29:00', 'Preloved', 0, '2023-07-21 10:29:31', '2023-07-21 10:29:31'),
(28, 17, '20230700014', 200, 'Nurul Nabila Abd Razak', '0137961408', 'nurulnabila411@gmail.com', 'SBB 193 Sungai Balang Besar Laut 83600 Muar Johor', '2023-07-21 16:23:00', '', 0, '2023-07-21 16:23:03', '2023-07-21 16:23:03'),
(29, 14, '20230700015', 10, 'ANISSA AFRINA BINTI JULIAZMIN ', '0139066378', '2020477212@student.uitm.edu.my', 'NO 70 KAMPUNG BATU MASJID, 35350, TEMOH, PERAK', '2023-07-21 16:23:00', '', 0, '2023-07-21 16:24:39', '2023-07-21 16:24:39'),
(30, 18, '20230700016', 30, 'NURHAIZA BINTI KAMARUZAMAN', '0198082293', 'haizakamaruzaman83@gmail.com', 'No 10, Jalan Keris 5, Perumahan Awam ', '2023-07-21 23:11:00', 'Keperluan untuk para wanita', 0, '2023-07-21 23:11:42', '2023-07-21 23:11:42'),
(31, 12, '20230700017', 5, 'Nur Azmina', '0173865703', 'azminamuzli90@gmail.com', 'Shah Alam, Sleangor', '2023-07-23 15:19:00', '', 5, '2023-07-23 15:19:46', '2023-07-23 16:45:43'),
(32, 17, '20230700018', 5, 'Dr Emma', '0173865703', 'emma90@gmail.com', 'Shah Alam, Sleangor', '2023-07-23 15:50:00', '', 1, '2023-07-23 15:50:21', '2023-07-23 15:53:26'),
(33, 17, '20230700019', 5, 'Dr Rogayah', '0122465372', 'rogayah@gmail.com', 'Shah Alam, Sleangor', '2023-07-23 16:07:00', '', 4, '2023-07-23 16:07:26', '2023-07-23 16:08:03'),
(34, 18, '20230700020', 5, 'Khris', '0122365897', 'khris@gmail.com', 'Shah Alam, Sleangor', '2023-07-23 16:43:00', '', 4, '2023-07-23 16:43:26', '2023-07-23 16:43:57'),
(35, 17, '20230700021', 5, 'Nur Elisa', '0175698426', 'elisa@gmail.com', 'Banting, Selangor', '2023-07-23 16:56:00', 'none', 1, '2023-07-23 16:57:18', '2023-07-23 16:57:43'),
(36, 11, '20230800001', 5, 'Dr Rogayah', '173865708', 'drrogayah@gmail.com', 'Shah Alam, Selangor', '2023-08-07 09:31:00', '', 2, '2023-08-07 09:32:00', '2023-08-07 10:13:42'),
(37, 11, '20230800002', 4, 'Dr Emma', '0123456789', 'dremma@gmail.com', 'Shah Alam, Selangor', '2023-08-07 10:37:00', '', 0, '2023-08-07 10:37:25', '2023-08-07 10:37:25'),
(38, 20, '20230800003', 5, 'AMIR', '01125165715', 'mir21hamzah04@gmail.com', '39,Jalan muar,Tuaran', '2023-08-07 10:56:00', 'Tq', 0, '2023-08-07 10:57:03', '2023-08-07 10:57:03'),
(39, 11, '20230800004', 500, 'MOHAMED HAFETZ IZWAN BIN MOHAMED JAMSARI', '0197110700', 'mohamedhafetzizwan@gmail.com', 'Teratai 4, UiTM Shah Alam, 40450, Selangor.', '2023-08-07 10:56:00', '', 0, '2023-08-07 10:57:19', '2023-08-07 10:57:19'),
(40, 18, '20230800005', 20, 'Zulaika', '28789497', 'zulaikaidrus93@gmail.com', 'Gombak', '2023-08-08 11:11:00', '', 1, '2023-08-07 11:11:55', '2023-08-07 11:12:43'),
(41, 12, '20230800006', 2, 'Zameer Reeza Zaini', '0173525275', 'zameer.reeza@gmail.com', 'no 87, Jalan BRP 7/3, Bukit Rahman Putra, Sungai B', '2023-08-07 11:49:00', 'Semoga bermanfaat', 4, '2023-08-07 11:50:04', '2023-08-07 11:51:03'),
(42, 12, '20230800007', 10, 'Haiqal', '0172793749', 'muzzakirhaiqal@gmail.com', 'Shah alam', '2023-08-07 12:44:00', 'Sedekah anak soleh', 2, '2023-08-07 12:45:51', '2023-08-07 12:46:43'),
(43, 11, '20230800008', 8, 'ANIS SYAMIMI BINTI ABDUL RAHIM', '0194645211', 'anissyamimi385@gmail.com', 'MiKu Point By Mili Express, Universiti Teknologi M', '2023-08-07 12:53:00', 'Hello', 0, '2023-08-07 12:53:51', '2023-08-07 12:53:51'),
(44, 18, '20230800009', 50, 'iman', '0189884588', 'iman@gmail.com', '', '2023-08-07 13:28:00', '', 0, '2023-08-07 13:29:03', '2023-08-07 13:29:03'),
(45, 14, '20230800010', 3, 'Zameer Reeza Zaini', '0173525275', 'zameer.reeza@gmail.com', 'no 87, Jalan BRP 7/3, Bukit Rahman Putra, Sungai B', '2023-08-07 13:44:00', '-', 1, '2023-08-07 13:44:35', '2023-08-07 15:01:12'),
(46, 12, '20230800011', 1, 'Maisarah', '01140352432', 'mai@gmail.com', '', '2023-08-08 15:00:00', 'Sjs', 0, '2023-08-07 15:00:57', '2023-08-07 15:00:57'),
(47, 11, '20230800012', 50, 'Muhammad Nabil Akmal Bin Kamaruzaman', '0192633774', 'muhammadnabilakmal@gmail.com', 'dengkil selangor', '2023-08-07 16:07:00', '', 1, '2023-08-07 16:08:15', '2023-08-07 16:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `goodsavailable_list`
--

DROP TABLE IF EXISTS `goodsavailable_list`;
CREATE TABLE IF NOT EXISTS `goodsavailable_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `available` int(110) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goodsavailable_list`
--

INSERT INTO `goodsavailable_list` (`id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`, `available`) VALUES
(21, 'Kain Pelikat', '', 1, 0, '2023-07-18 13:58:54', '2023-07-18 13:58:54', 5),
(22, 'Kain Batik', '', 1, 0, '2023-07-18 13:59:09', '2023-07-18 13:59:09', 10),
(23, 'Tikar', '', 1, 0, '2023-07-18 13:59:24', '2023-07-18 13:59:24', 10),
(24, 'Tuala', '', 1, 0, '2023-07-18 14:09:06', '2023-07-18 14:09:06', 8),
(25, 'Selimut', '', 1, 0, '2023-07-18 14:09:20', '2023-07-18 14:21:41', 20),
(26, 'Hygiene Kit', '- Ubat gigi, Berus gigi, Sabun, Syampu, Sikat rambut', 1, 0, '2023-07-18 14:10:06', '2023-07-18 14:11:36', 30),
(27, 'Air Mineral', '', 0, 0, '2023-07-18 14:12:57', '2023-07-23 16:10:04', 50),
(28, 'Air kotak', 'Variety', 0, 0, '2023-07-18 14:13:08', '2023-08-07 15:03:00', 100),
(29, 'Biskut', 'Biskut Kering, Marrie, Lexus', 1, 0, '2023-07-18 14:13:33', '2023-08-07 10:40:35', 54),
(30, 'Roti', '', 1, 0, '2023-07-18 14:14:11', '2023-07-18 14:14:11', 80),
(31, 'Pampers Kanak-kanak', '', 1, 0, '2023-07-18 14:15:21', '2023-07-18 14:15:21', 20),
(32, 'Pampers Dewasa', '', 1, 0, '2023-07-18 14:15:39', '2023-07-18 14:15:39', 20),
(33, 'Tuala Wanita', 'Malam dan Siang', 1, 0, '2023-07-18 14:16:07', '2023-07-18 14:16:07', 25),
(34, 'Pakain dalam wanita', 'Baju dan, Seluar dalam', 1, 0, '2023-07-18 14:17:13', '2023-07-18 14:17:13', 50),
(35, 'Pakaian dalam lelaki', 'Seluar dalam', 1, 0, '2023-07-18 14:17:32', '2023-07-18 14:17:32', 25),
(36, 'Bantal', '', 1, 0, '2023-07-18 14:17:51', '2023-07-23 15:53:59', 75),
(37, 'Baju dewasa wanita', '', 1, 0, '2023-07-18 14:18:10', '2023-07-18 14:20:17', 50),
(38, 'Baju dewasa lelaki', 'lengan pendek', 0, 0, '2023-07-18 14:18:27', '2023-08-07 13:35:27', 50),
(39, 'Track Bottom', '', 1, 0, '2023-07-11 14:19:05', '2023-07-11 14:19:05', 50),
(40, 'test', '', 1, 0, '2023-07-18 19:18:13', '2023-07-18 19:18:13', 1),
(41, 'Body Care', 'Shampooo', 1, 0, '2023-07-19 20:11:57', '2023-07-19 20:42:37', 2),
(42, 'Inhaler', '', 1, 0, '2023-07-23 15:54:32', '2023-07-23 17:01:39', 15),
(43, 'Tissue', '', 1, 0, '2023-07-23 16:46:36', '2023-07-23 16:46:36', 50),
(44, 'Gula gula', 'strawberry', 1, 0, '2023-07-23 17:02:08', '2023-07-23 17:02:08', 5),
(45, 'Selipar', 'none', 1, 0, '2023-08-07 10:15:03', '2023-08-07 10:15:03', 10),
(46, 'stokin', 'stokin baru', 0, 0, '2023-08-07 16:10:26', '2023-08-07 16:10:57', 60);

-- --------------------------------------------------------

--
-- Table structure for table `goodsneeded_list`
--

DROP TABLE IF EXISTS `goodsneeded_list`;
CREATE TABLE IF NOT EXISTS `goodsneeded_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `needed` int(110) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goodsneeded_list`
--

INSERT INTO `goodsneeded_list` (`id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`, `needed`) VALUES
(10, 'Clothing', 'pants, shirt', 1, 1, '2023-06-11 01:23:35', '2023-07-18 14:20:57', 0),
(11, 'Biskut', 'Hup Seng, Jagung', 1, 0, '2023-06-19 10:54:41', '2023-07-23 16:48:22', 10),
(12, 'Selimut', 'Good Condition', 1, 0, '2023-06-22 12:52:47', '2023-07-18 14:23:54', 15),
(13, 'Baju dewasa lelaki', 'lengan pendek', 0, 0, '2023-06-27 01:09:04', '2023-08-07 10:16:01', 15),
(14, 'Pakaian dalam wanita', 'Baju dan, Seluar dalam', 1, 0, '2023-07-18 14:22:28', '2023-07-29 08:10:59', 10),
(15, 'Kain Pelikat', 'Prefer yang baru', 1, 0, '2023-07-18 14:22:58', '2023-07-18 14:23:33', 20),
(16, 'Kain Batik', 'Prefer yang baru', 0, 1, '2023-07-18 14:23:20', '2023-07-23 16:13:55', 20),
(17, 'Tuala', 'Prefer yang baru', 1, 0, '2023-07-18 14:24:59', '2023-07-18 14:24:59', 20),
(18, 'Tudung', 'Prefer yang senang untuk mangsa guna', 1, 0, '2023-07-19 13:30:13', '2023-07-19 13:30:57', 15),
(19, 'Inhaler', '', 1, 0, '2023-07-23 16:10:33', '2023-07-23 16:10:33', 5),
(20, 'Tissue', '', 1, 0, '2023-07-23 16:47:49', '2023-07-23 16:47:49', 5);

-- --------------------------------------------------------

--
-- Table structure for table `goods_list`
--

DROP TABLE IF EXISTS `goods_list`;
CREATE TABLE IF NOT EXISTS `goods_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goods_list`
--

INSERT INTO `goods_list` (`id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(9, 'Food', 'Mencukupi', 1, 0, '2023-05-26 13:41:55', '2023-06-09 22:16:13'),
(10, 'Clothing', 'Berlebihan', 0, 0, '2023-05-26 13:45:47', '2023-06-11 03:09:32'),
(11, 'Medicine', 'Inhaler perlukan 2', 1, 0, '2023-05-26 13:46:23', '2023-06-09 22:17:06'),
(12, 'Hygiene', 'Mencukupi', 1, 0, '2023-05-26 13:46:59', '2023-06-09 22:16:36'),
(13, 'Sleeping', 'none', 1, 0, '2023-05-26 13:47:31', '2023-06-09 22:17:27'),
(15, 'Other', 'Shoes\r\nSlipper', 1, 1, '2023-05-26 13:54:16', '2023-05-26 13:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

DROP TABLE IF EXISTS `system_info`;
CREATE TABLE IF NOT EXISTS `system_info` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Goods Monitoring System for Flood Shelter'),
(6, 'short_name', 'iCare '),
(11, 'logo', 'uploads/logo.png?v=1685062681'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover.png?v=1685198320');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Administrator', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatars/1.png?v=1685434707', NULL, 1, '2021-01-20 14:02:37', '2023-05-30 16:18:27'),
(9, 'Ashilah', 'Alias', 'Shila', 'a8ba0b9f8304f4645f9c81c32856498b', 'uploads/avatars/9.png?v=1689656744', NULL, 1, '2023-07-18 13:02:13', '2023-07-18 13:44:53'),
(11, 'Haiza', 'Kamaruzzaman', 'Haiza', '9b30ee3000003ad69749ceb2a294dc64', 'uploads/avatars/11.png?v=1689659130', NULL, 1, '2023-07-18 13:45:19', '2023-07-18 13:45:30'),
(12, 'Aina', 'Fariha', 'Aina', 'cae0662fb206748b69532cc090c1714f', 'uploads/avatars/12.png?v=1689659661', NULL, 1, '2023-07-18 13:51:08', '2023-07-18 13:55:12'),
(13, 'Fahmi', 'Adzha', 'Fahmi', '60ea4ce81f531c0fd46f028bd6ba363c', 'uploads/avatars/13.png?v=1689664638', NULL, 1, '2023-07-18 15:17:18', '2023-07-18 15:17:18'),
(14, 'Afiq ', 'Ramlee', 'afiqramlee', 'c622c630f5884266d35fb745f733dd09', NULL, NULL, 1, '2023-07-19 11:53:08', '2023-07-19 11:53:08'),
(15, 'Arif', 'Daniel', 'arifdaniel', 'bdcf0e3a1f8a895d2ff6e5769c09cc51', NULL, NULL, 1, '2023-07-19 11:53:35', '2023-07-19 11:55:02'),
(16, 'Zikrun', 'Naim', 'zikrunnaim', 'a764efa66fb51fe72e9792ab265b9df7', NULL, NULL, 1, '2023-07-19 11:54:23', '2023-07-19 11:54:23'),
(17, 'Bukhari', 'Nordin', 'bukhari', '3b36d630aee7da0cb8ca51c11f1606e6', NULL, NULL, 1, '2023-07-19 11:55:28', '2023-07-19 11:55:28'),
(18, 'Nadhirah', 'Tahir', 'Nadhirah', '5800b691bed2a376979ea90d1b8656dc', 'uploads/avatars/18.png?v=1689742961', NULL, 1, '2023-07-19 13:02:41', '2023-07-19 13:02:41'),
(19, 'Asrin', 'Awang Selan', 'Asrin', '63e3e08f39b13596e774be418b2465c8', 'uploads/avatars/19.png?v=1689776747', NULL, 1, '2023-07-19 22:25:47', '2023-07-19 22:25:47'),
(20, 'Ahmad', 'Seyz', 'seyz', '173d55eaaa477ec734a68a026521cd35', NULL, NULL, 1, '2023-08-07 12:19:59', '2023-08-07 12:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `victimapp_list`
--

DROP TABLE IF EXISTS `victimapp_list`;
CREATE TABLE IF NOT EXISTS `victimapp_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `goodsavailable_id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `quantity` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '0=pending,\r\n2=Approved,\r\n4=Completed,\r\n5=Cancelled',
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `suggestion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `goodsavailable_id` (`goodsavailable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `victimapp_list`
--

INSERT INTO `victimapp_list` (`id`, `goodsavailable_id`, `code`, `quantity`, `name`, `contact`, `email`, `address`, `date`, `status`, `date_created`, `date_updated`, `suggestion`) VALUES
(14, 27, '20230700001', 4, 'Nuraliah', '0193329009', 'nuraliahnasir@yahoo.com', 'No.99, Fasa 3J', '2023-07-18 14:31:00', 0, '2023-07-18 14:32:19', '2023-07-18 14:32:19', '-'),
(15, 23, '20230700002', 2, 'HANIS AQILAH BINTI SALIM', '0137147946', 'hanisaqilah2120@gmail.com', '', '2023-07-18 14:41:00', 0, '2023-07-18 14:41:04', '2023-07-18 14:41:04', ''),
(17, 27, '20230700004', 12, 'Haikal bin Mohammad Pilus', '0194592803', 'pilushaikal@gmail.com', 'LOT 186,JALAN BATU BATA,SUNGAI PELONG,47000,SUNGAI', '2023-07-19 15:00:00', 0, '2023-07-18 14:50:17', '2023-07-18 14:50:17', ''),
(18, 25, '20230700005', 2, 'Nur Azmina', '0173865703', 'azminamuzli90@gmail.com', 'Banting', '2023-07-18 14:50:00', 0, '2023-07-18 14:50:50', '2023-07-18 14:50:50', 'none'),
(19, 27, '20230700003', 1, 'Nooratasha Binti Ayob ', '0174752308', 'nooratasha01@gmail.com', 'UiTM Shah Alam, 40450 Shah Alam, Selangor ', '2023-07-18 15:05:00', 0, '2023-07-18 15:06:07', '2023-07-18 15:06:07', 'None'),
(20, 36, '20230700006', 10, 'NUR ELISA BINTI NORAZMAN', '0173543919', 'lisaazman000@gmail.com', 'Banting', '2023-07-18 15:07:00', 5, '2023-07-18 15:07:48', '2023-07-18 15:43:50', 'minta sponsor dari YB'),
(21, 27, '20230700007', 200, 'Nurul Nabila Abd Razak', '0137961408', 'nurulnabila411@gmail.com', 'SBB193 SUNGAI BALANG BESAR LAUT', '2023-07-18 15:08:00', 4, '2023-07-18 15:09:51', '2023-07-18 15:43:34', ''),
(22, 23, '20230700008', 1, 'Amanina binti Mohd Sadli', '0126621405', 'amaninams00@gmail.com', 'no 20 Jalan semilang 12 taman sri putra 42700 bant', '2023-07-18 03:50:00', 0, '2023-07-18 17:51:04', '2023-07-18 17:51:04', 'Kelengkapan solat juga diperlukan'),
(23, 37, '20230700009', 2, 'Siti Banun binti Ayob', '0176868660', 'sitibanun@gmail.com', 'Banting selangor', '2023-07-18 03:51:00', 2, '2023-07-18 17:52:08', '2023-07-20 08:43:29', 'Memerlukan ubatan'),
(25, 33, '20230700010', 2, 'Siti Hawa Yahya', '0193402207 ', 'hawayahya03@gmail.com', 'Kanchong Darat, Banting', '2023-07-18 22:02:00', 4, '2023-07-18 22:03:04', '2023-07-19 20:13:54', ''),
(26, 24, '20230700011', 10, 'Alia Natasha binti Mohammed Noor', '0177317948', 'natashanoor2000@gmail.com', 'Banting', '2023-07-18 22:52:00', 2, '2023-07-18 22:53:15', '2023-07-20 08:38:11', ''),
(27, 22, '20230700012', 10, 'Muhammad Afiq Bin Ramlee', '0184645926', 'afiqranlee@gmail.com', 'Hulu langat', '2023-07-30 12:11:00', 4, '2023-07-19 12:12:20', '2023-07-19 12:18:07', 'Saya mangsa banjir'),
(28, 24, '20230700013', 5, 'Hidayah', '01139424294', 'pepias.info@gmail.com', 'Lot 1690-8, Jalan Dato HJ Kaharuddin Bt 6 Kg Chang', '2023-07-19 12:22:00', 0, '2023-07-19 12:22:47', '2023-07-19 12:22:47', 'Tuala Kecil'),
(29, 41, '20230700014', 3, 'Faa', '01111111111', 'asas@gmail.com', 'selangor', '2023-06-28 20:41:00', 5, '2023-07-19 20:41:32', '2023-07-20 08:37:59', ''),
(30, 26, '20230700015', 3, 'Yana', '01110109164', 'lovezana8@gmail.com', 'Taman Seroja', '2023-07-21 16:05:00', 0, '2023-07-21 16:05:43', '2023-07-21 16:05:43', ''),
(31, 41, '20230700016', 1, 'Hanis Aqilah', '137147946', 'hanisaqilah2120@gmail.com', 'shah alam', '2023-07-21 16:14:00', 0, '2023-07-21 16:15:27', '2023-07-21 16:15:27', ''),
(32, 29, '20230700017', 100, 'Mohamad Hafiz Maskaza', '0179383346', 'shilaalias04@gmail.com', 'Jalan pegaga u12 Shah Alam', '2023-07-21 21:32:00', 0, '2023-07-21 21:34:02', '2023-07-21 21:34:02', 'Loose pack biscuits '),
(33, 25, '20230700018', 1, 'Nur Azmina', '0173865703', 'azminamuzli90@gmail.com', 'Banting, Selangor', '2023-07-23 15:17:00', 0, '2023-07-23 15:18:22', '2023-07-23 15:18:22', 'i want inhaler'),
(34, 25, '20230700019', 2, 'Dr Emma', '0173865703', 'emma90@gmail.com', 'Shah Alam, Sleangor', '2023-07-23 15:47:00', 4, '2023-07-23 15:47:58', '2023-07-23 16:45:17', ''),
(35, 25, '20230700020', 2, 'Dr Emma', '0173865703', 'emma90@gmail.com', 'Shah Alam, Sleangor', '2023-07-23 16:04:00', 4, '2023-07-23 16:04:54', '2023-07-23 16:05:49', ''),
(36, 25, '20230700021', 5, 'Dr Iqbal', '0175685936', 'iqbal@gmail.com', 'Shah Alam, Sleangor', '2023-07-23 16:30:00', 0, '2023-07-23 16:31:05', '2023-07-23 16:31:05', ''),
(37, 29, '20230700022', 2, 'Ahmad Kassim', '0122465896', 'kassim@gmail.com', 'Shah Alam, Sleangor', '2023-07-23 16:40:00', 2, '2023-07-23 16:41:18', '2023-07-23 16:41:58', ''),
(38, 29, '20230700023', 2, 'amanina sadli', '012345678', 'amanina@gmail.com', 'Shah Alam, Sleangor', '2023-07-23 16:55:00', 2, '2023-07-23 16:55:35', '2023-07-23 16:56:08', ''),
(39, 22, '20230800001', 2, 'Nur Azmina', '173865703', 'azminamuzli90@gmail.com', 'Shah Alam, Selangor', '2023-08-07 09:30:00', 4, '2023-08-07 09:30:55', '2023-08-07 10:13:00', ''),
(40, 21, '20230800002', 2, 'Dr Emma', '0123456789', 'dremma@gmail.com', 'Shah Alam, Selangor', '2023-08-07 10:38:00', 0, '2023-08-07 10:38:47', '2023-08-07 10:38:47', 'i want inhaler'),
(41, 22, '20230800003', 2, 'Amira Aliya', '0133002132', 'miraleamin@gmail.com', 'Shah alam', '2023-08-07 11:50:00', 5, '2023-08-07 11:50:14', '2023-08-07 12:21:05', ''),
(42, 22, '20230800004', 2, 'Anis Syamimi ', '0194645211', 'anissyamimi385@gmail.com', 'MiKu Point By Mili Express, Universiti Teknologi M', '2023-08-07 12:53:00', 0, '2023-08-07 12:53:26', '2023-08-07 12:53:26', 'Hello');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donatorapp_list`
--
ALTER TABLE `donatorapp_list`
  ADD CONSTRAINT `goodsneeded_id_fk_booking` FOREIGN KEY (`goodsneeded_id`) REFERENCES `goodsneeded_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `victimapp_list`
--
ALTER TABLE `victimapp_list`
  ADD CONSTRAINT `victimapp_list_ibfk_1` FOREIGN KEY (`goodsavailable_id`) REFERENCES `goodsavailable_list` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
