-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 01:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auraduks`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(200) DEFAULT NULL,
  `admin_password` varchar(200) DEFAULT NULL,
  `admin_email` varchar(200) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `admin_email`, `last_login`) VALUES
(2, 'testadmin', '$2y$10$0mjsr/1oq8ET11jouocxuehnQuocEh8uOKP/htkzCTBZwmqKImmPS', 'admin@gmail.com', '2024-07-21 21:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(5, 'Perfumes'),
(6, 'Perfume Oil'),
(7, 'Body Mist'),
(8, 'Diffusers/Atomizers'),
(9, 'Scented Candles'),
(10, 'Combo Deals');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `product_image` varchar(200) DEFAULT NULL,
  `product_details` text DEFAULT NULL,
  `product_price1` float NOT NULL,
  `product_price` float NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `product_details`, `product_price1`, `product_price`, `category_id`) VALUES
(10, '15 ml Vanilla Lavender Oil', '1722016223317708316.jpg', '15 ml roll on perfume. Vanilla Lavender reveals are more sensual and euphoric side to lavender. This perfume oil is sweet, warm and resinous with a burst of fresh lavender with a hint of rose.', 15000, 12500, 6),
(11, 'Madagascar Vanilla Perfume Oil', '17220165831951520919.jpg', 'Madagascar Vanilla Perfume Oil', 20000, 18000, 6),
(12, 'Aurora', '1722016775623362403.jpg', 'Masculine and Feminine', 50000, 45000, 5),
(13, 'Pure Wonder Body Mist X Narciso Rodriguez', '17220171141331223181.jpg', 'Narciso Rodriguez Eau De Parfum for Her, 50ml', 150000, 135000, 10),
(14, 'Vanilla Diorama', '1722017288922953192.jpg', 'Christian Dior X Pastry Scent', 120000, 110000, 5),
(15, 'Amber Fragrance Oil', '17220174301793162291.jpg', 'A classic and timeless fragrance that is a Groovy\'s fan-favourite!', 120000, 8000, 6),
(16, '50ml Milk and Honey Body Oil', '1722017612926469405.jpg', 'Milk + Honey body oil works deep to nourish your skin and protect it from harsh Winter conditions', 45000, 37000, 6),
(17, 'Sana Jardin Oil', '17220179091351611569.jpg', '4 in 1 combo deals.  Flavours consist Revolution De La Fleur, Tiger By Her Side, Berber Blonde and Sandalwood Temple', 100000, 87000, 6),
(18, '10ml Buttercream Frosting Perfume Oil', '1722018123731095285.jpg', 'Buttercream oil comes in a convenient purse-sized glass bottle and packaged in a giftable bakery-style box, Made with Natural oils', 25000, 22000, 6),
(19, 'Coconut Rice Milk', '1722018492719709100.jpg', 'Indulge in the irresistible aroma of Coconut Rice milk Perfume Oil. Inspired by the classic Thai Dessert,  this gourmand fragrance features creamy coconut milk, honey and vanilla.', 20000, 15000, 6),
(20, 'Maison Kurkdjian Baccarat Rouge 540', '17220188212008694206.jpg', 'Signature Fragrance. Both Masculine and Feminine.', 150000, 145000, 5),
(21, 'Coco Mademoiselle', '17220192201390256478.jpg', 'You can never wear this and remain unnoticed. You need to add this in your fragrance collection if you are a lover of sweet scents.', 120000, 110000, 5),
(22, 'Hypnotic Poison Dior', '17220194161626676117.jpg', 'It is very long lasting and has a good projection.', 200000, 180000, 5),
(23, '  Victoria Secrets Body Mist', '1722019988875933135.jpg', '    Victoria\'s Secret Love Spell body mist is a  luxurious and alluring soft perfume that will leave you feeling confident and irresistible.', 65000, 50000, 7),
(24, 'Irresistible Givenchy', '1722020104844028883.jpg', 'Givenchy Irresistible', 55000, 52000, 5),
(25, '5 in 1 Victoria Secrets Body Mist', '1722020541704175181.jpg', 'Flavours: Rush, Love Spell Shimmer, Velvet Petals, Romantic and Temptation ', 250000, 230000, 10),
(26, 'Victoria Secrets Body Mist Coconut Milk and Rose', '17220207162069190846.jpg', ' Victoria\'s Secret Love Spell body mist is a luxurious and alluring soft perfume that will leave you feeling confident and irresistible.', 65000, 50000, 7),
(27, '250ml Victoria Secret Romantic', '1722020976941506181.jpg', ' Victoria\'s Secret Love Spell body mist is a luxurious and alluring soft perfume that will leave you feeling confident and irresistible.', 65000, 50000, 7),
(28, '250ml Victoria Secret Melon Drench', '17220211151881778379.jpg', 'Victoria\'s Secret Love Spell body mist is a luxurious and alluring soft perfume that will leave you feeling confident and irresistible.', 65000, 50000, 7),
(29, 'Butterfly Fine Fragrane Mist', '17220212091870028670.jpg', 'It is a luxurious and alluring soft perfume that will leave you feeling confident and irresistible.', 50000, 45000, 7),
(30, 'Luxury Atomizer', '17220214422109184755.jpg', 'Aluminium  perfume atomizer, portable size.', 15000, 12000, 8),
(31, '10ml Mini Atomizer(4 pcs)', '1722021772524574765.jpg', 'Mini Perfume Refillable Atomizer Container', 48000, 40000, 8),
(32, 'Coconut Moon Candle', '1722021979118655159.jpg', 'Coconut Soy Candle Iridescent Holographic Jars Coconut Amber Scented Candle', 45000, 42000, 9),
(33, 'Lavender Rose Scented Candle ', '1722022181137516555.jpg', 'Lavender Rose Scented Candle made with essential oils', 42000, 35000, 9);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_costs`
--

CREATE TABLE `shipping_costs` (
  `id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_costs`
--

INSERT INTO `shipping_costs` (`id`, `option_name`, `cost`) VALUES
(1, 'Lagos', 4000.00),
(2, 'Customer Pick-up', 0.00),
(3, 'Abuja Doorstep', 5000.00),
(4, 'East', 5000.00),
(5, 'Other States', 4000.00);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `trans_ref` varchar(45) DEFAULT NULL,
  `trans_date` timestamp NULL DEFAULT current_timestamp(),
  `trans_totamt` float DEFAULT NULL,
  `trans_by` int(11) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_phone` varchar(20) DEFAULT NULL,
  `shipping_method` varchar(50) DEFAULT NULL,
  `shipping_fee` decimal(10,2) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `user_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `trans_ref`, `trans_date`, `trans_totamt`, `trans_by`, `shipping_address`, `shipping_state`, `shipping_phone`, `shipping_method`, `shipping_fee`, `deleted`, `user_deleted`) VALUES
(65, '17220243451775730875', '2024-07-26 20:05:45', 170000, 1, '15, Ikoyi Johnson Avenue', 'Lagos', '08134765234', NULL, NULL, 1, 1),
(66, '17220263251468458118', '2024-07-26 20:38:45', 54000, 1, '20 Festac Estate', 'Lagos', '09165423896', NULL, NULL, 1, 1),
(67, '1722030073427657663', '2024-07-26 21:41:13', 42000, 1, '15, adeboye street ikeja', 'Lagos', '08064923976', NULL, NULL, 1, 1),
(68, '172203307795053258', '2024-07-26 22:31:17', 12000, 1, '13, Boulevard Lekki', 'Lagos', '09178654321', NULL, NULL, 1, 1),
(69, '17223629081459361230', '2024-07-30 18:08:28', 50000, 1, '35, odofin street', 'Lagos', '08056423671', NULL, NULL, 1, 1),
(70, '17223629981240607718', '2024-07-30 18:09:58', 50000, 1, '20 Festac Estate', 'Lagos', '08056423671', NULL, NULL, 1, 1),
(71, '1722369576773891243', '2024-07-30 19:59:36', 135000, 1, '12, Olalekan street, Palmgrove', 'Lagos', '08056423671', NULL, NULL, 0, 0),
(72, '1722372693289295154', '2024-07-30 20:51:33', 18000, 1, '15, Ikoyi Johnson Avenue', 'Lagos', '08134765234', NULL, NULL, 0, 0),
(73, '1722373731678910840', '2024-07-30 21:08:51', 12500, 1, '12, Olalekan street, Palmgrove', 'Lagos', '08134765234', NULL, NULL, 0, 0),
(74, '1723376797520343840', '2024-08-11 11:46:37', 90000, 9, 'Morgan Estate Phase 2, Ojodu-Berger Lagos.', 'Oyo', '08064923986', NULL, NULL, 1, 0),
(75, '1723376831514191885', '2024-08-11 11:47:11', 90000, 9, 'Morgan Estate Phase 2, Ojodu-Berger Lagos.', 'Oyo', '08064923986', NULL, NULL, 1, 0),
(76, '1723376904277293390', '2024-08-11 11:48:24', 90000, 1, 'Morgan Estate Phase 2, Ojodu-Berger Lagos.', 'Oyo', '08056423671', NULL, NULL, 0, 1),
(77, '17233769941110925253', '2024-08-11 11:49:54', 90000, 1, 'Morgan Estate Phase 2, Ojodu-Berger Lagos.', 'Oyo', '08134765234', NULL, NULL, 0, 1),
(78, '1723656347826806841', '2024-08-14 17:25:47', 8000, 1, '15, Ikoyi Johnson Avenue', 'Lagos', '08067654324', NULL, NULL, 0, 1),
(79, '17236582731262424964', '2024-08-14 17:57:53', 45000, 1, '20 Festac Estate', 'Lagos', '08056423671', NULL, NULL, 0, 1),
(80, '17237175931012420396', '2024-08-15 10:26:33', 180000, 1, '20 Festac Estate', 'Lagos', '08056423671', NULL, NULL, 0, 1),
(81, '17237338431057221317', '2024-08-15 14:57:23', 18000, 1, '20, Coker Estate, Ado Ekiti', 'Ekiti', '09165423896', NULL, NULL, 0, 0),
(82, '1723735590769111124', '2024-08-15 15:26:30', 18000, 1, '20 Festac Estate', 'Lagos', '08056423671', NULL, NULL, 0, 0),
(83, '1723737725140657922', '2024-08-15 16:02:05', 50000, 2, '7, Blessed street Challenge, Ibadan', 'Oyo', '09165423678', NULL, NULL, 0, 1),
(84, '17242396181243707609', '2024-08-21 11:26:58', 135000, 2, '15, adeboye street ikeja', 'Lagos', '09165423896', NULL, NULL, 0, 1),
(85, '17242404681599465322', '2024-08-21 11:41:08', 135000, 2, '15, adeboye street ikeja', 'Lagos', '08134765234', NULL, NULL, 0, 1),
(86, '1724241641994053442', '2024-08-21 12:00:41', 135000, 2, '20, Coker Estate, Ado Ekiti', 'Ekiti', '09165423896', NULL, NULL, 0, 1),
(87, '17242418811380004804', '2024-08-21 12:04:41', 135000, 2, '20, Coker Estate, Ado Ekiti', 'Ekiti', '09165423896', NULL, NULL, 0, 1),
(88, '1724242067528838409', '2024-08-21 12:07:47', 135000, 2, '20, Coker Estate, Ado Ekiti', 'Ekiti', '09165423896', NULL, NULL, 0, 1),
(89, '17242429021566510577', '2024-08-21 12:21:42', 135000, 2, '20, Coker Estate, Ado Ekiti', 'Ekiti', '08056423671', NULL, NULL, 0, 1),
(107, '17243406452025149039', '2024-08-22 15:30:45', 500000, 2, '20 Festac Estate', 'Lagos', '08056423671', NULL, NULL, 0, 1),
(108, '17243445251995952923', '2024-08-22 16:35:25', 500000, 2, '15, adeboye street ikeja', 'Lagos', '09165423896', NULL, NULL, 0, 1),
(109, '1724348124101357812', '2024-08-22 17:35:24', 8000, 1, '12, Olalekan street, Palmgrove', 'Lagos', '08134765234', NULL, NULL, 0, 0),
(110, '17243485071428059383', '2024-08-22 17:41:47', 53000, 1, '13, Sanya street Oshodi', 'Lagos', '08056423671', NULL, NULL, 0, 0),
(111, '17243496512124947289', '2024-08-22 18:00:51', 110000, 1, '12, Olalekan street, Palmgrove', 'Lagos', '09165423896', NULL, NULL, 0, 0),
(112, '17243500631374289880', '2024-08-22 18:07:43', 42000, 1, '20, Coker Estate, Ado Ekiti', 'Ekiti', '09165423896', NULL, NULL, 0, 0),
(113, '17243545161161551135', '2024-08-22 19:21:56', 22000, 1, '15, adeboye street ikeja', 'Lagos', '09165423896', NULL, NULL, 0, 0),
(114, '1724363572528213107', '2024-08-22 21:52:52', 45000, 3, 'Morgan Estate Phase 2, Ojodu-Berger Lagos.', 'Lagos', '08156212134', NULL, NULL, 0, 0),
(115, '1724364269493915762', '2024-08-22 22:04:29', 57500, 3, 'Morgan Estate Phase 2, Ojodu-Berger Lagos.', 'Lagos', '08156212134', NULL, NULL, 0, 0),
(116, '17243657171562478394', '2024-08-22 22:28:37', 8000, 3, '13, Boulevard Lekki', 'Lagos', '08156212134', NULL, NULL, 0, 0),
(117, '17243683772117591749', '2024-08-22 23:12:57', 16000, 3, 'Morgan Estate Phase 2, Ojodu-Berger Lagos.', 'Lagos', '08156212134', NULL, NULL, 0, 0),
(118, '17243695311038430611', '2024-08-22 23:32:11', 12000, 3, 'Morgan Estate Phase 2, Ojodu-Berger Lagos.', 'Lagos', '08156212134', NULL, NULL, 0, 0),
(119, '17243699271795434721', '2024-08-22 23:38:47', 12000, 3, 'Morgan Estate Phase 2, Ojodu-Berger Lagos.', 'Lagos', '08156212134', NULL, NULL, 0, 0),
(120, '1724370687934218128', '2024-08-22 23:51:27', 12000, 3, 'Morgan Estate Phase 2, Ojodu-Berger Lagos.', 'Lagos', '08156212134', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trans_details`
--

CREATE TABLE `trans_details` (
  `det_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `det_amt` float DEFAULT NULL,
  `det_transid` int(11) DEFAULT NULL,
  `det_qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trans_details`
--

INSERT INTO `trans_details` (`det_id`, `product_id`, `det_amt`, `det_transid`, `det_qty`) VALUES
(173, 13, 135000, 71, 1),
(174, 11, 18000, 72, 1),
(175, 10, 12500, 73, 1),
(176, 12, 45000, 74, 2),
(177, 12, 45000, 75, 2),
(184, 11, 18000, 81, 1),
(185, 11, 18000, 82, 1),
(193, 13, 135000, 90, 1),
(194, 13, 135000, 91, 1),
(195, 13, 135000, 92, 1),
(196, 13, 135000, 93, 1),
(197, 13, 135000, 94, 1),
(198, 13, 135000, 95, 1),
(199, 13, 135000, 96, 1),
(200, 13, 135000, 97, 1),
(201, 13, 135000, 98, 1),
(202, 13, 135000, 99, 1),
(203, 13, 135000, 100, 1),
(204, 25, 230000, 100, 1),
(205, 13, 135000, 101, 1),
(206, 25, 230000, 101, 1),
(207, 13, 135000, 102, 1),
(208, 25, 230000, 102, 1),
(209, 13, 135000, 103, 1),
(210, 25, 230000, 103, 1),
(211, 13, 135000, 104, 1),
(212, 25, 230000, 104, 1),
(213, 13, 135000, 105, 2),
(214, 25, 230000, 105, 1),
(215, 13, 135000, 106, 2),
(216, 25, 230000, 106, 1),
(221, 15, 8000, 109, 1),
(222, 15, 8000, 110, 1),
(223, 29, 45000, 110, 1),
(224, 21, 110000, 111, 1),
(225, 32, 42000, 112, 1),
(226, 18, 22000, 113, 1),
(227, 12, 45000, 114, 1),
(228, 12, 45000, 115, 1),
(229, 10, 12500, 115, 1),
(230, 15, 8000, 116, 1),
(231, 15, 8000, 117, 2),
(232, 30, 12000, 118, 1),
(233, 30, 12000, 119, 1),
(234, 30, 12000, 120, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(100) DEFAULT NULL,
  `user_lname` varchar(100) DEFAULT NULL,
  `user_email` varchar(200) DEFAULT NULL,
  `user_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_password`) VALUES
(1, 'Bola', 'Pepper', 'bolapepper@gmail.com', '$2y$10$VtCAgUusCqMvlIilFFQb8uANde9F/mw.wKwZfG3oyztRe2ZuJMsGC'),
(2, 'Temmy', 'Jones', 'temmy@gmail.com', '$2y$10$UJ1iCgXpe/jEPJSYPAwRe.VzFJkinlIqXgTeC/19ThL1.3TKhTuq2'),
(3, 'Dorcas', 'Adeniji', 'adenijiololadeh@gmail.com', '$2y$10$p672YKzF8f.HVagrmVNOteNWfkgJRpl1z3OpbHFOgtWgqqtdEqrom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shipping_costs`
--
ALTER TABLE `shipping_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `trans_details`
--
ALTER TABLE `trans_details`
  ADD PRIMARY KEY (`det_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `shipping_costs`
--
ALTER TABLE `shipping_costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `trans_details`
--
ALTER TABLE `trans_details`
  MODIFY `det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
