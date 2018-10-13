-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2018 at 03:47 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mssmartstore`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`mssmartstore`@`localhost` PROCEDURE `report` (IN `p_type` VARCHAR(300), IN `p_fromDate` DATE, IN `p_toDate` DATE, IN `p_month` INT, IN `p_year` INT)  NO SQL
case p_type
when 'all' THEN
 select * from store;
when 'today' THEN
 select * from store where cast(store_ondate as date)=
 cast(now() as date);
 when 'weekly' THEN
 select * from store where 
 (cast(store_ondate as date)
 between
 cast(date_add(p_fromDate ,INTERVAL -7 day) as date) and
 cast(p_fromDate as date));
 when 'month' THEN
 select * from store where 
 (MONTH(cast(store_ondate as date)) = p_month and
 YEAR(cast(store_ondate as date)) = p_year);
 when 'year' THEN
 select * from store where 
 YEAR(cast(store_ondate as date)) = p_year;
 when 'betDate' THEN
 select * from store where 
 (cast(store_ondate as date)
 between
 cast(p_fromDate as date) and cast(p_toDate as date));
 
end case$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `application_setting`
--

CREATE TABLE `application_setting` (
  `setting_id` int(255) NOT NULL,
  `setting_key` varchar(50) NOT NULL,
  `setting_value` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_setting`
--

INSERT INTO `application_setting` (`setting_id`, `setting_key`, `setting_value`) VALUES
(1, 'Setting 1 ', 'Setting 2');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(255) NOT NULL,
  `area_name` varchar(100) NOT NULL,
  `area_city_id` int(255) NOT NULL,
  `area_pincode` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`, `area_city_id`, `area_pincode`) VALUES
(1, 'collegecroad', 1, 422210),
(2, 'SINNAR', 6, 422103),
(3, 'OZAR', 6, 422202);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(255) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'YES'),
(2, 'CLASSIC'),
(3, 'GLORY'),
(4, 'BEUTIFY'),
(5, 'DOLBY'),
(6, 'SHANAYA'),
(7, 'LION'),
(8, 'LIFE TIME'),
(9, 'STRANGER'),
(10, 'RAINBOW'),
(11, 'POKEMAN'),
(12, 'KINDER JOY'),
(13, 'DOLL');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_banner` varchar(100) NOT NULL,
  `category_supercategory_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_banner`, `category_supercategory_id`) VALUES
(2, 'MENS CLOTHING', '437b21z8.jpg', 3),
(3, 'WOMEN CLOTHING', 'q2iru3fw.jpg', 4),
(4, 'BOY CLOTHING', '492wryhd.jpg', 5),
(5, 'GIRL CLOTHING', 'e1f8qk8e.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(255) NOT NULL,
  `city_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'SATANA'),
(2, 'DEOLA'),
(3, 'CHANDAWAD'),
(4, 'DINDORI'),
(5, 'VANI'),
(6, 'NASHIK'),
(7, 'MALEGAON');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int(255) NOT NULL,
  `color_name` varchar(100) NOT NULL,
  `color_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color_name`, `color_code`) VALUES
(1, 'Red', '#FF0000'),
(2, 'Green', '#008000'),
(3, 'Yellow', '#FFFF00'),
(4, 'Pink', '#FFC0CB'),
(5, 'Aqua ', '#00FFFF'),
(6, 'Deep Sky Blue ', '#00BFFF'),
(7, 'Blue', '#000080'),
(8, 'Grey', '#efefef'),
(9, 'Black', '#000000'),
(11, 'white', '#FFFFFF'),
(12, 'VIOLET', ''),
(13, 'PURPLE', '#800080'),
(14, 'ORANGE', '#FF4500'),
(15, 'orange', '#FFA500'),
(16, 'drakred', '#8B0000'),
(17, 'MAROON', '#800000'),
(18, 'pink', '#ff797f');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(255) NOT NULL,
  `store_id` int(255) NOT NULL,
  `comment_cust_id` int(255) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `comment_rating` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contact_id` int(255) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_subject` varchar(100) NOT NULL,
  `contact_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_enquiry`
--

CREATE TABLE `customer_enquiry` (
  `customer_id` int(255) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_contact` varchar(100) NOT NULL,
  `customer_product_id` int(255) NOT NULL,
  `customer_store_id` int(255) NOT NULL,
  `customer_ondate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mainsliders`
--

CREATE TABLE `mainsliders` (
  `mainslider_id` int(255) NOT NULL,
  `mainslider_image` varchar(200) NOT NULL,
  `mainslider_url` varchar(200) NOT NULL,
  `mainslider_status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainsliders`
--

INSERT INTO `mainsliders` (`mainslider_id`, `mainslider_image`, `mainslider_url`, `mainslider_status`) VALUES
(1, 'edhmklyw.jpg', '', 'INACTIVE'),
(2, 'izbu3dru.jpg', '', 'INACTIVE'),
(3, 'yv6znjxr.jpg', '', 'INACTIVE'),
(4, 'w7sjei7l.png', '', 'ACTIVE'),
(6, 'kjbi5x7a.png', '', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(255) NOT NULL,
  `social_id` varchar(255) NOT NULL,
  `member_fname` varchar(100) NOT NULL,
  `member_lname` varchar(100) NOT NULL,
  `member_gender` varchar(40) NOT NULL,
  `member_contact` varchar(40) NOT NULL,
  `member_email` varchar(100) NOT NULL,
  `member_address` varchar(200) NOT NULL,
  `member_city` varchar(50) NOT NULL,
  `member_pincode` varchar(40) NOT NULL,
  `member_password` varchar(20) NOT NULL DEFAULT '123456'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `social_id`, `member_fname`, `member_lname`, `member_gender`, `member_contact`, `member_email`, `member_address`, `member_city`, `member_pincode`, `member_password`) VALUES
(1, '', 'Auto', 'San', '', '9960313794', '', '', '', '', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `member_wishlist`
--

CREATE TABLE `member_wishlist` (
  `wishlist_id` int(255) NOT NULL,
  `wishlist_member_id` int(255) NOT NULL,
  `wishlist_product_id` int(255) NOT NULL,
  `wishlist_size` varchar(10) NOT NULL,
  `wishlist_color` varchar(50) NOT NULL,
  `images` varchar(80) NOT NULL,
  `wishlist_date` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_wishlist`
--

INSERT INTO `member_wishlist` (`wishlist_id`, `wishlist_member_id`, `wishlist_product_id`, `wishlist_size`, `wishlist_color`, `images`, `wishlist_date`) VALUES
(9, 1, 1, 'M', 'Yellow', 'p1main-product01.jpg,p1thumb-product01.jpg', '2018-09-25 12:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `n_id` int(255) NOT NULL,
  `n_ref_id` int(255) NOT NULL,
  `n_type` varchar(50) NOT NULL,
  `n_msg` varchar(255) NOT NULL,
  `n_status` int(2) NOT NULL,
  `n_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`n_id`, `n_ref_id`, `n_type`, `n_msg`, `n_status`, `n_date`) VALUES
(9, 9, 'wishlist', 'Wishlist add by <b>Auto San</b>', 1, '2018-09-25 12:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_category` int(255) NOT NULL,
  `product_brand` int(255) NOT NULL,
  `product_size` varchar(50) NOT NULL,
  `product_color` varchar(50) NOT NULL,
  `product_mrp` double NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `product_highlights` text NOT NULL,
  `product_barcode` varchar(100) NOT NULL,
  `product_img1` varchar(200) NOT NULL,
  `product_img2` varchar(200) NOT NULL,
  `product_img3` varchar(200) NOT NULL,
  `product_img4` varchar(200) NOT NULL,
  `product_img5` varchar(200) NOT NULL,
  `same_products` varchar(100) NOT NULL,
  `similar_products` varchar(100) NOT NULL,
  `product_priority` int(1) NOT NULL DEFAULT '0',
  `product_last_date` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `product_special` varchar(10) NOT NULL DEFAULT 'false',
  `is_new` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_code`, `product_category`, `product_brand`, `product_size`, `product_color`, `product_mrp`, `product_desc`, `product_highlights`, `product_barcode`, `product_img1`, `product_img2`, `product_img3`, `product_img4`, `product_img5`, `same_products`, `similar_products`, `product_priority`, `product_last_date`, `status`, `product_special`, `is_new`) VALUES
(1, 'product 1 ', 'p1', 1, 1, '', '', 500, 'product 1', 'product 1', '', '', '', '', '', '', '', '', 1, '2018-09-22 13:56:39', 'ACTIVE', 'false', 'TRUE'),
(2, 'product 2', 'product 2', 2, 1, '', '', 400, 'product 2', 'product 2', '', '', '', '', '', '', '', '', 0, '2018-09-22 14:24:14', 'ACTIVE', 'true', 'FALSE'),
(3, 'Demo', 'Dmow123', 3, 3, '', '', 79888, 'Demo Description', 'Demo DescriptionDemo DescriptionDemo Description', '', '', '', '', '', '', '', '', 0, '2018-09-25 10:48:40', 'ACTIVE', 'true', 'FALSE'),
(4, 'Bags', 'bags2323', 19, 4, '', '', 345, 'BagsBags', 'BagsBagsBagsBagsBagsBags', '', '', '', '', '', '', '', '', 0, '2018-09-26 15:30:06', 'ACTIVE', 'true', 'FALSE');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`id`, `product_id`, `color`, `size`, `image`) VALUES
(1, 1, 'Blue', 'S,M', 'p11.jpg,p12.jpg,p13.jpg'),
(2, 1, 'Yellow', 'S,M,L', 'p1main-product01.jpg,p1thumb-product01.jpg'),
(3, 2, 'Green', 'S,M', 'product 2p1banner02.jpg,product 2p1banner11.jpg'),
(4, 3, 'Aqua ', 'M', 'Dmow123Screenshotfrom2018-09-1515-27-07.png'),
(5, 4, 'Blue', '6M', 'bags2323banner01.jpg'),
(6, 4, 'PURPLE', '6M', 'bags2323banner15.jpg'),
(7, 4, 'PURPLE', '6M', 'bags2323product06.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_mapping`
--

CREATE TABLE `product_mapping` (
  `mapping_id` int(255) NOT NULL,
  `mapping_store_id` int(255) NOT NULL,
  `mapping_product_id` int(55) NOT NULL,
  `mapping_product_offerprice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_mapping`
--

INSERT INTO `product_mapping` (`mapping_id`, `mapping_store_id`, `mapping_product_id`, `mapping_product_offerprice`) VALUES
(1, 8, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `review_id` int(255) NOT NULL,
  `review_member_id` int(255) NOT NULL,
  `review_product_id` int(255) NOT NULL,
  `review_text` varchar(500) NOT NULL,
  `review_rating` int(255) NOT NULL,
  `review_ondate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `review_status` enum('VERIFIED','UNVERIFIED') NOT NULL DEFAULT 'VERIFIED'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`review_id`, `review_member_id`, `review_product_id`, `review_text`, `review_rating`, `review_ondate`, `review_status`) VALUES
(1, 1, 1, '', 3, '2018-09-24 08:45:28', 'VERIFIED');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(255) NOT NULL,
  `size_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL'),
(6, 'XXXL'),
(7, '28'),
(8, '30'),
(9, '32'),
(10, '34'),
(11, '36'),
(12, '38'),
(13, '120m'),
(14, '6.3M'),
(15, ''),
(16, '5.5M'),
(17, '6M');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(255) NOT NULL,
  `store_name` varchar(200) NOT NULL,
  `store_code` varchar(30) NOT NULL,
  `store_contact1` varchar(50) NOT NULL,
  `store_contact2` varchar(50) NOT NULL,
  `store_email` varchar(50) NOT NULL,
  `store_address1` varchar(200) NOT NULL,
  `store_address2` varchar(100) NOT NULL,
  `store_address3` varchar(100) NOT NULL,
  `store_city` int(255) NOT NULL,
  `store_area` varchar(200) NOT NULL,
  `store_landmark` varchar(100) NOT NULL,
  `store_description` varchar(500) NOT NULL,
  `store_logo` varchar(200) NOT NULL,
  `store_banner` varchar(100) NOT NULL,
  `store_intro_video` varchar(100) NOT NULL,
  `store_contact_person` varchar(50) NOT NULL,
  `store_ondate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `store_eshtablish_year` varchar(20) NOT NULL,
  `store_serving_pincode` varchar(300) NOT NULL,
  `store_weekoff` varchar(100) NOT NULL,
  `store_opening_hours` varchar(50) NOT NULL,
  `store_password` varchar(50) NOT NULL,
  `store_location_url` varchar(5000) NOT NULL,
  `store_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `store_code`, `store_contact1`, `store_contact2`, `store_email`, `store_address1`, `store_address2`, `store_address3`, `store_city`, `store_area`, `store_landmark`, `store_description`, `store_logo`, `store_banner`, `store_intro_video`, `store_contact_person`, `store_ondate`, `store_eshtablish_year`, `store_serving_pincode`, `store_weekoff`, `store_opening_hours`, `store_password`, `store_location_url`, `store_status`) VALUES
(8, 'abc', '', '9876543210', '', 'abc@gmail.com', 'Nashik', '', '', 6, '', '', '', '', '', '', '', '2018-09-18 19:33:28', '', '422101', 'Sunday', '', '368491', 'http://mssmartstore.com/newweb/product.php?pid=452', '1');

-- --------------------------------------------------------

--
-- Table structure for table `store_rating`
--

CREATE TABLE `store_rating` (
  `rating_id` int(255) NOT NULL,
  `member_id` int(255) NOT NULL,
  `store_id` int(255) NOT NULL,
  `rating_star` int(2) NOT NULL,
  `rating_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(255) NOT NULL,
  `subcategory_category_id` int(255) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `subcategory_banner` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `subcategory_category_id`, `subcategory_name`, `subcategory_banner`) VALUES
(1, 2, 'T-SHIRT', '57ub43px.jpg'),
(2, 2, 'SHIRT', 'sa8pkslq.jpg'),
(3, 2, 'JEANS MEN', ''),
(4, 2, 'TROUSER', ''),
(5, 3, 'SAREES', ''),
(6, 3, 'DRESS MATERIAL', ''),
(7, 3, 'KURTI', ''),
(8, 3, 'LEGGINGS & PANTS', ''),
(9, 3, 'JEANS WOMEN', ''),
(10, 3, 'TOP & T-SHIRT', ''),
(11, 4, '0-2 YEAR', ''),
(12, 4, '3-7 YEAR', ''),
(13, 4, '8-12 YEAR', ''),
(14, 5, '0-2 YEAR', ''),
(15, 5, '3-7 YEAR', ''),
(16, 5, '8-12 YEAR', ''),
(17, 2, 'TRACK PANTS', ''),
(19, 3, 'HANDBAGS ', '');

-- --------------------------------------------------------

--
-- Table structure for table `superbanner`
--

CREATE TABLE `superbanner` (
  `superbanner_id` int(11) NOT NULL,
  `supercategory_id` int(11) NOT NULL,
  `superbanner_name` varchar(100) NOT NULL,
  `superbanner_image` varchar(255) NOT NULL,
  `superbanner_status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `superbanner`
--

INSERT INTO `superbanner` (`superbanner_id`, `supercategory_id`, `superbanner_name`, `superbanner_image`, `superbanner_status`) VALUES
(1, 19, 'Bags flat 20% off', '', 'ACTIVE'),
(2, 3, 'Jeans upto 50% off', 'c5zyp6z7.jpg', 'ACTIVE'),
(3, 1, 'T-Shirts', 'v4rqxaan.jpg', 'ACTIVE'),
(4, 7, 'Kurti', 'cnix669r.jpg', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `supercategories`
--

CREATE TABLE `supercategories` (
  `supercategory_id` int(255) NOT NULL,
  `supercategory_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supercategories`
--

INSERT INTO `supercategories` (`supercategory_id`, `supercategory_name`) VALUES
(3, 'MEN'),
(4, 'WOMEN'),
(5, 'KIDS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `application_setting`
--
ALTER TABLE `application_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer_enquiry`
--
ALTER TABLE `customer_enquiry`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `mainsliders`
--
ALTER TABLE `mainsliders`
  ADD PRIMARY KEY (`mainslider_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `member_wishlist`
--
ALTER TABLE `member_wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_mapping`
--
ALTER TABLE `product_mapping`
  ADD PRIMARY KEY (`mapping_id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `store_rating`
--
ALTER TABLE `store_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `superbanner`
--
ALTER TABLE `superbanner`
  ADD PRIMARY KEY (`superbanner_id`);

--
-- Indexes for table `supercategories`
--
ALTER TABLE `supercategories`
  ADD PRIMARY KEY (`supercategory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_setting`
--
ALTER TABLE `application_setting`
  MODIFY `setting_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contact_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_enquiry`
--
ALTER TABLE `customer_enquiry`
  MODIFY `customer_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mainsliders`
--
ALTER TABLE `mainsliders`
  MODIFY `mainslider_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_wishlist`
--
ALTER TABLE `member_wishlist`
  MODIFY `wishlist_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `n_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_mapping`
--
ALTER TABLE `product_mapping`
  MODIFY `mapping_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `review_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `store_rating`
--
ALTER TABLE `store_rating`
  MODIFY `rating_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `superbanner`
--
ALTER TABLE `superbanner`
  MODIFY `superbanner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supercategories`
--
ALTER TABLE `supercategories`
  MODIFY `supercategory_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
