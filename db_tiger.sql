-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2019 at 06:30 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiger`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `folder` varchar(128) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `name`, `folder`, `description`) VALUES
(1, 'Tsukumizu', 'tkmiz', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_image`
--

CREATE TABLE `tb_image` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `filename` varchar(128) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_image`
--

INSERT INTO `tb_image` (`id`, `category_id`, `filename`, `description`) VALUES
(1, 1, '1546664239703.jpg', 'USS Montpelier'),
(2, 1, '1546664460607.gif', ''),
(3, 1, '1546664805409.jpg', ''),
(4, 1, '1546671750335.png', ''),
(5, 1, '1546682021232.jpg', ''),
(6, 1, '1546688846684.jpg', ''),
(7, 1, '1546688984744.jpg', ''),
(8, 1, '1546689056952.png', ''),
(9, 1, '1546694860417.jpg', ''),
(10, 1, '1546699168332.jpg', ''),
(11, 1, '1546711399452.jpg', ''),
(12, 1, '1546717464899.gif', ''),
(13, 1, '1546721597026.jpg', ''),
(14, 1, '1546722152621.jpg', ''),
(15, 1, '1546722391447.jpg', ''),
(16, 1, '1546723842007.jpg', ''),
(17, 1, '1546726369610.gif', ''),
(18, 1, '1546726484625.jpg', ''),
(19, 1, '1546726963318.gif', ''),
(20, 1, '1546729431802.jpg', ''),
(21, 1, '1546729939816.jpg', ''),
(22, 1, '1546733076054.jpg', ''),
(23, 1, '1546734102729.jpg', ''),
(24, 1, '1546734240275.jpg', ''),
(25, 1, '1546734322302.jpg', ''),
(26, 1, '1546734334070.jpg', ''),
(27, 1, '1546734379478.jpg', ''),
(28, 1, '1546734522640.jpg', ''),
(29, 1, '1546734526123.jpg', ''),
(30, 1, '1546734785664.jpg', ''),
(31, 1, '1546734851616.jpg', ''),
(32, 1, '1546735507171.jpg', ''),
(33, 1, '1546736339995.jpg', ''),
(34, 1, '1546737335420.jpg', ''),
(35, 1, '1546738774746.gif', ''),
(36, 1, '1546739571433.jpg', ''),
(37, 1, '1546740127619.jpg', ''),
(38, 1, '1546740195774.jpg', ''),
(39, 1, '1546740199213.jpg', ''),
(40, 1, '1546747062961.jpg', ''),
(41, 1, '1546750043475.jpg', ''),
(42, 1, '1546755022554.jpg', ''),
(43, 1, '1546757089612.jpg', ''),
(44, 1, '1546762895510.jpg', ''),
(45, 1, '1546763859272.jpg', ''),
(46, 1, '1546771504989.png', ''),
(47, 1, '1546773005850.jpg', ''),
(48, 1, '1546788573453.jpg', ''),
(49, 1, '1546792732311.gif', ''),
(50, 1, '1546800300408.jpg', ''),
(51, 1, '1546802969186.jpg', ''),
(52, 1, '1546805172448.png', ''),
(53, 1, '1546809218976.jpg', ''),
(54, 1, '1546821193112.jpg', ''),
(55, 1, '1546821818566.jpg', ''),
(56, 1, '1546831165931.jpg', ''),
(57, 1, '1546837951011.jpg', ''),
(58, 1, '1546843198743.jpg', ''),
(59, 1, '1546893422680.jpg', ''),
(60, 1, '1546895846600.jpg', ''),
(61, 1, '1547051616978.jpg', ''),
(62, 1, '1547076651380.jpg', ''),
(63, 1, '1551556037227.jpg', ''),
(64, 1, '1551722253382.jpg', ''),
(65, 1, '1551747714166.jpg', ''),
(66, 1, '1551974044811.jpg', ''),
(67, 1, '1551975087817.jpg', ''),
(68, 1, '1552024406054.jpg', ''),
(69, 1, '1552173440648.png', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_image_detail`
-- (See below for the actual view)
--
CREATE TABLE `v_image_detail` (
`id` int(11)
,`folder` varchar(128)
,`filename` varchar(128)
,`description` text
);

-- --------------------------------------------------------

--
-- Structure for view `v_image_detail`
--
DROP TABLE IF EXISTS `v_image_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_image_detail`  AS  select `b`.`id` AS `id`,`a`.`folder` AS `folder`,`b`.`filename` AS `filename`,`b`.`description` AS `description` from (`tb_category` `a` join `tb_image` `b`) where (`a`.`id` = `b`.`category_id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD CONSTRAINT `tb_image_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
