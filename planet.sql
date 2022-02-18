-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2022 at 06:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `planet`
--

-- --------------------------------------------------------

--
-- Table structure for table `phtv_admin`
--

CREATE TABLE `phtv_admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_avatar` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_phone_number` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phtv_admin`
--

INSERT INTO `phtv_admin` (`id`, `admin_name`, `admin_email`, `admin_avatar`, `admin_password`, `admin_phone_number`, `created`, `updated`) VALUES
(1, 'PlanetTV', 'admin@gmail.com', '220431like.png', 'e10adc3949ba59abbe56e057f20f883e', '9876543211', '2022-01-06 10:13:09', '2022-02-09 20:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_banner`
--

CREATE TABLE `phtv_banner` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `link_type` int(11) NOT NULL DEFAULT 0 COMMENT '1:Image, 2:Video, 3:Pdf, 4:url',
  `banner_type` int(11) NOT NULL DEFAULT 0 COMMENT '1:Header, 2:Footer',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_blog`
--

CREATE TABLE `phtv_blog` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `auther_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_blog_auther`
--

CREATE TABLE `phtv_blog_auther` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_blog_category`
--

CREATE TABLE `phtv_blog_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_blog_comment`
--

CREATE TABLE `phtv_blog_comment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_chatting_group`
--

CREATE TABLE `phtv_chatting_group` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_chatting_history`
--

CREATE TABLE `phtv_chatting_history` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `sender_user_id` int(11) NOT NULL,
  `receiver_user_id` int(11) NOT NULL,
  `message` longtext DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0 COMMENT '0:Unread, 1:read',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_cinematic_home`
--

CREATE TABLE `phtv_cinematic_home` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `title_link` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_coin_balance_history`
--

CREATE TABLE `phtv_coin_balance_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `used_coin` int(11) DEFAULT NULL,
  `received_coin` int(11) DEFAULT NULL,
  `activity` longtext DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_crew_pick_home`
--

CREATE TABLE `phtv_crew_pick_home` (
  `id` int(11) NOT NULL,
  `selected_crew_id` int(11) DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `module_name` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_earning_coin_info`
--

CREATE TABLE `phtv_earning_coin_info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_featured_home`
--

CREATE TABLE `phtv_featured_home` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT 0 COMMENT '0:Blog, 1:thumbnail, 2:video',
  `video_type` int(11) NOT NULL DEFAULT 0 COMMENT '0:uploade, 1:link',
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_header`
--

CREATE TABLE `phtv_header` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logo2` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_live_event_home_category`
--

CREATE TABLE `phtv_live_event_home_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_live_tv_page`
--

CREATE TABLE `phtv_live_tv_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `youtube link` varchar(255) DEFAULT NULL,
  `is_recomended` int(11) NOT NULL DEFAULT 0 COMMENT '0:No, 1:Yes',
  `view` int(11) NOT NULL DEFAULT 0,
  `length` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_newslettr`
--

CREATE TABLE `phtv_newslettr` (
  `id` int(11) NOT NULL,
  `email` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_nft_categories`
--

CREATE TABLE `phtv_nft_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_nft_collection`
--

CREATE TABLE `phtv_nft_collection` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_nft_drops_home`
--

CREATE TABLE `phtv_nft_drops_home` (
  `id` int(11) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_link` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_nft_info`
--

CREATE TABLE `phtv_nft_info` (
  `id` int(11) NOT NULL,
  `collection_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `sale_id` varchar(50) DEFAULT NULL,
  `assets_name` varchar(50) DEFAULT NULL,
  `assets_id` varchar(50) DEFAULT NULL,
  `meant_no` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `attribute_name` varchar(255) DEFAULT NULL,
  `attribute_image` varchar(255) DEFAULT NULL,
  `attribute_bg_image` varchar(255) DEFAULT NULL,
  `attribute_object` varchar(255) DEFAULT NULL,
  `attribute_object_collection` varchar(255) DEFAULT NULL,
  `attribute_object_no` varchar(255) DEFAULT NULL,
  `attribute_border_color` varchar(50) DEFAULT NULL,
  `attribute_border_type` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_nft_listiong`
--

CREATE TABLE `phtv_nft_listiong` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_nft_logos`
--

CREATE TABLE `phtv_nft_logos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_pages`
--

CREATE TABLE `phtv_pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_podcast`
--

CREATE TABLE `phtv_podcast` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `auther_id` int(11) NOT NULL,
  `description` longtext DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `twiter_link` varchar(255) DEFAULT NULL,
  `google_link` varchar(255) DEFAULT NULL,
  `insta_link` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_podcast_auther`
--

CREATE TABLE `phtv_podcast_auther` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_podcast_episoad`
--

CREATE TABLE `phtv_podcast_episoad` (
  `id` int(11) NOT NULL,
  `podcast_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `mp3_file` varchar(255) DEFAULT NULL,
  `length` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product`
--

CREATE TABLE `phtv_product` (
  `id` int(11) NOT NULL,
  `product_brand_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `coin_price` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `additional_info` longtext DEFAULT NULL,
  `avg_rating` decimal(10,2) DEFAULT NULL,
  `coin` int(11) DEFAULT NULL,
  `is_preorder` int(11) NOT NULL DEFAULT 0 COMMENT '0: No, 1:Yes',
  `offer_price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product`
--

INSERT INTO `phtv_product` (`id`, `product_brand_id`, `product_category_id`, `name`, `description`, `price`, `coin_price`, `stock`, `additional_info`, `avg_rating`, `coin`, `is_preorder`, `offer_price`, `created_at`, `updated_at`) VALUES
(5, 2, 5, 'ASIAN Men\'s Bouncer-01 Sports Latest Stylish Casual Sneakers', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '39.99', 30, 10, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 21:18:33', '2022-02-18 22:47:52'),
(6, 5, 5, 'ASIAN Men\'s Bouncer-01 Sports Latest Stylish Casual Sneakers', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '39.99', 39, 10, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 21:22:29', '2022-02-09 21:58:59'),
(7, 6, 5, 'ASIAN Men\'s Bouncer-01 Sports Latest Stylish Casual Sneakers', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '39.99', 39, 10, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 1, NULL, '2022-02-09 21:35:03', '2022-02-09 21:59:11'),
(8, 1, 10, 'Cuffed Beanie Planet Hopper TV', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '42.00', 42, 10, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 21:56:32', '2022-02-09 21:59:33'),
(9, 1, 10, 'Cuffed Beanie Planet Hopper TV', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '59.99', 59, 10, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 22:03:15', NULL),
(10, 1, 10, 'Cuffed Beanie Planet Hopper TV', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '69.99', 60, 5, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 1, NULL, '2022-02-09 22:05:01', '2022-02-18 22:29:01'),
(11, 1, 9, 'Cuffed Beanie Planet Hopper TV', '<p>Sed id interdum urna. Nam ac elit a ante commodo tristique. condimentum vehicula a hendrerit ac nisi. hendrerit ac nisi Lorem ipsum dolor sit amet Vestibulum imperdiet nibh vel magna lacinia ultrices. Sed id interdum urna. Nullam lacinia faucibus risus, a euismod lorem tincidunt id. Donec maximus placerat tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse faucibus sed dolor eget posuere.Sed id interdum urna. Nam ac elit a ante commodo tristique. Duis lacus urna, condimentum a vehicula a, hendrerit ac nisi Lorem ipsum dolor sit amet.</p><h4>SIZE &amp; FIT</h4><ul><li>Our Model wears a UK 8/ EU 36/ Us 4</li><li>Model is 170/ 5’7” Tall</li><li>Shoulder seam to hem measures appox 58”/ 147 cm in lenght</li></ul><p>Sed id interdum urna. Nam ac elit a ante commodo tristique. condimentum vehicula a hendrerit ac nisi. hendrerit ac nisi Lorem ipsum dolor sit amet Vestibulum imperdiet nibh vel magna lacinia ultrices. Sed id interdum urna.</p><p>Nullam lacinia faucibus risus, a euismod lorem tincidunt id. Donec maximus placerat tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse faucibus sed dolor eget posuere.Sed id interdum urna. Nam ac elit a ante commodo tristique. Duis lacus urna, condimentum a vehicula a, hendrerit ac nisi Lorem ipsum dolor sit amet.</p>', '79.99', 70, 10, '<p>Sed id interdum urna. Nam ac elit a ante commodo tristique. condimentum vehicula a hendrerit ac nisi. hendrerit ac nisi Lorem ipsum dolor sit amet Vestibulum imperdiet nibh vel magna lacinia ultrices. Sed id interdum urna. Nullam lacinia faucibus risus, a euismod lorem tincidunt id. Donec maximus placerat tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse faucibus sed dolor eget posuere.Sed id interdum urna. Nam ac elit a ante commodo tristique. Duis lacus urna, condimentum a vehicula a, hendrerit ac nisi Lorem ipsum dolor sit amet.</p>', '4.50', NULL, 1, NULL, '2022-02-09 22:06:36', '2022-02-18 22:28:10'),
(12, 1, 10, 'Cuffed Beanie Planet Hopper TV', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '79.99', 79, 5, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 22:08:43', NULL),
(13, 1, 10, 'Cuffed Beanie Planet Hopper TV', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '99.99', 99, 5, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 22:11:10', NULL),
(14, 5, 10, 'Cuffed Beanie Planet Hopper TV', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '59.99', 59, 5, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 22:13:02', NULL),
(15, 6, 10, 'Cuffed Beanie Planet Hopper TV', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '99.99', 99, 5, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 22:15:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_brand`
--

CREATE TABLE `phtv_product_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_brand`
--

INSERT INTO `phtv_product_brand` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Holiister', '533846holiister.svg', '2022-02-06 16:03:45', '2022-02-06 16:06:18'),
(2, 'Nike', '132205nike.svg', '2022-02-06 16:06:59', NULL),
(4, 'OLD NAVY', '353819681361.jpg', '2022-02-07 21:17:58', '2022-02-09 20:53:38'),
(5, 'GAP', '442961wrc-logo.png', '2022-02-09 20:54:31', NULL),
(6, 'VITTA', '641476vitta.svg', '2022-02-09 20:55:57', NULL),
(7, 'ADIDAS', '314642vitta.svg', '2022-02-09 20:56:23', NULL),
(8, 'WOODLAND', '916582vitta.svg', '2022-02-09 20:56:54', NULL),
(9, 'NAVY BLUE', '51184vitta.svg', '2022-02-09 20:57:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_cart`
--

CREATE TABLE `phtv_product_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `coin_amount` decimal(10,2) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `total_coin_amount` decimal(10,2) DEFAULT NULL,
  `shipping_charge` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_cart`
--

INSERT INTO `phtv_product_cart` (`id`, `product_id`, `user_id`, `color_id`, `size_id`, `qty`, `amount`, `coin_amount`, `total_amount`, `total_coin_amount`, `shipping_charge`, `created_at`, `updated_at`) VALUES
(1, 11, 10, 1, 1, 2, '79.99', '70.00', '159.98', '140.00', '0.00', '2022-02-16 23:15:24', '2022-02-18 22:47:13'),
(3, 10, 10, 2, 2, 1, '69.99', '60.00', '69.99', '60.00', '0.00', '2022-02-16 23:28:36', '2022-02-18 22:48:18'),
(4, 5, 10, 1, 11, 2, '39.99', '30.00', '79.98', '60.00', '0.00', '2022-02-16 23:47:06', '2022-02-18 22:51:57'),
(5, 6, 10, 2, 14, 2, '39.99', '39.00', '79.98', '78.00', '0.00', '2022-02-16 23:47:34', '2022-02-18 23:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_category`
--

CREATE TABLE `phtv_product_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_category`
--

INSERT INTO `phtv_product_category` (`id`, `category_name`, `category_image`, `created_at`, `updated_at`) VALUES
(5, 'Accessories', '823355ss_experiences_categoryA.png', '2022-02-09 21:03:12', NULL),
(6, 'Art Gallery', '234959ss_experiences_categoryB.png', '2022-02-09 21:03:47', NULL),
(7, 'T Shirts', '857187noun_t-shirt_2237575.svg', '2022-02-09 21:04:54', NULL),
(8, 'Hoodies', '523864ss_experiences_categoryE.png', '2022-02-09 21:05:38', NULL),
(9, 'Star Outpost Brand', '69056556_3x.png', '2022-02-09 21:06:11', NULL),
(10, 'Hats', '209545noun_hat_2790985.svg', '2022-02-09 21:06:58', NULL),
(11, 'Pins', '848793pin.svg', '2022-02-09 21:07:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_color`
--

CREATE TABLE `phtv_product_color` (
  `id` int(11) NOT NULL,
  `color_code` varchar(255) DEFAULT NULL,
  `color_name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_color`
--

INSERT INTO `phtv_product_color` (`id`, `color_code`, `color_name`, `created_at`, `updated_at`) VALUES
(1, '#000000', 'Black', '2022-02-03 22:30:34', NULL),
(2, '#ffffff', 'White', '2022-02-03 22:33:32', '2022-02-03 22:35:21'),
(4, '#f9ad81', 'Broun', '2022-02-07 21:18:31', '2022-02-12 21:13:46'),
(5, '#3fa9f5', 'Sky Blue', '2022-02-07 21:18:51', '2022-02-12 21:14:39'),
(6, '#39DA8A', 'Green', '2022-02-07 21:19:16', '2022-02-12 21:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_hot_deals`
--

CREATE TABLE `phtv_product_hot_deals` (
  `id` int(11) NOT NULL,
  `offer_tag` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_images`
--

CREATE TABLE `phtv_product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_images`
--

INSERT INTO `phtv_product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(19, 5, '669440banner_pro.png', '2022-02-09 21:20:40', NULL),
(21, 7, '373315banner_pro.png', '2022-02-09 21:35:03', NULL),
(22, 6, '177107product-imagesE.png', '2022-02-09 21:47:48', NULL),
(23, 8, '458848product-imagesA.png', '2022-02-09 21:56:32', NULL),
(24, 9, '799146product-imagesB.png', '2022-02-09 22:03:15', NULL),
(25, 10, '572302product-imagesC.png', '2022-02-09 22:05:01', NULL),
(26, 11, '281604product-imagesD.png', '2022-02-09 22:06:36', NULL),
(27, 12, '452890product-imagesA.png', '2022-02-09 22:08:43', NULL),
(28, 13, '782831product-imagesC.png', '2022-02-09 22:11:10', NULL),
(29, 14, '197876product-imagesE.png', '2022-02-09 22:13:02', NULL),
(30, 15, '92258product-imagesF.png', '2022-02-09 22:15:33', NULL),
(31, 11, '386468product-imagesC.png', '2022-02-12 23:07:01', NULL),
(32, 11, '225835product-imagesE.png', '2022-02-12 23:07:01', NULL),
(33, 11, '109922product-imagesF.png', '2022-02-12 23:07:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_multi_color`
--

CREATE TABLE `phtv_product_multi_color` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_multi_color`
--

INSERT INTO `phtv_product_multi_color` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(41, 5, 1, '2022-02-09 21:58:46', NULL),
(42, 5, 4, '2022-02-09 21:58:46', NULL),
(43, 6, 1, '2022-02-09 21:58:59', NULL),
(44, 6, 2, '2022-02-09 21:58:59', NULL),
(45, 7, 1, '2022-02-09 21:59:11', NULL),
(46, 7, 2, '2022-02-09 21:59:11', NULL),
(47, 8, 2, '2022-02-09 21:59:33', NULL),
(48, 9, 1, '2022-02-09 22:03:16', NULL),
(49, 10, 1, '2022-02-09 22:05:01', NULL),
(50, 10, 2, '2022-02-09 22:05:01', NULL),
(51, 10, 4, '2022-02-09 22:05:01', NULL),
(53, 12, 2, '2022-02-09 22:08:43', NULL),
(54, 13, 2, '2022-02-09 22:11:10', NULL),
(55, 14, 2, '2022-02-09 22:13:02', NULL),
(56, 15, 2, '2022-02-09 22:15:33', NULL),
(72, 11, 1, '2022-02-12 23:20:11', NULL),
(73, 11, 2, '2022-02-12 23:20:11', NULL),
(74, 11, 4, '2022-02-12 23:20:11', NULL),
(75, 11, 5, '2022-02-12 23:20:11', NULL),
(76, 11, 6, '2022-02-12 23:20:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_multi_size`
--

CREATE TABLE `phtv_product_multi_size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_multi_size`
--

INSERT INTO `phtv_product_multi_size` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(79, 5, 11, '2022-02-09 21:58:46', NULL),
(80, 5, 12, '2022-02-09 21:58:46', NULL),
(81, 5, 13, '2022-02-09 21:58:46', NULL),
(82, 5, 14, '2022-02-09 21:58:46', NULL),
(83, 5, 15, '2022-02-09 21:58:46', NULL),
(84, 5, 16, '2022-02-09 21:58:46', NULL),
(85, 5, 17, '2022-02-09 21:58:46', NULL),
(86, 5, 18, '2022-02-09 21:58:46', NULL),
(87, 5, 19, '2022-02-09 21:58:46', NULL),
(88, 6, 11, '2022-02-09 21:58:59', NULL),
(89, 6, 12, '2022-02-09 21:58:59', NULL),
(90, 6, 14, '2022-02-09 21:58:59', NULL),
(91, 6, 16, '2022-02-09 21:58:59', NULL),
(92, 6, 18, '2022-02-09 21:58:59', NULL),
(93, 7, 14, '2022-02-09 21:59:11', NULL),
(94, 7, 15, '2022-02-09 21:59:11', NULL),
(95, 7, 17, '2022-02-09 21:59:11', NULL),
(96, 7, 18, '2022-02-09 21:59:11', NULL),
(97, 8, 1, '2022-02-09 21:59:33', NULL),
(98, 8, 2, '2022-02-09 21:59:33', NULL),
(99, 8, 3, '2022-02-09 21:59:33', NULL),
(100, 8, 4, '2022-02-09 21:59:33', NULL),
(101, 9, 1, '2022-02-09 22:03:16', NULL),
(102, 9, 2, '2022-02-09 22:03:16', NULL),
(103, 9, 3, '2022-02-09 22:03:16', NULL),
(104, 9, 4, '2022-02-09 22:03:16', NULL),
(105, 9, 5, '2022-02-09 22:03:16', NULL),
(106, 10, 1, '2022-02-09 22:05:01', NULL),
(107, 10, 2, '2022-02-09 22:05:01', NULL),
(108, 10, 3, '2022-02-09 22:05:01', NULL),
(109, 10, 4, '2022-02-09 22:05:01', NULL),
(115, 12, 1, '2022-02-09 22:08:43', NULL),
(116, 12, 2, '2022-02-09 22:08:43', NULL),
(117, 12, 3, '2022-02-09 22:08:43', NULL),
(118, 12, 4, '2022-02-09 22:08:43', NULL),
(119, 12, 5, '2022-02-09 22:08:43', NULL),
(120, 13, 2, '2022-02-09 22:11:10', NULL),
(121, 13, 3, '2022-02-09 22:11:10', NULL),
(122, 13, 4, '2022-02-09 22:11:10', NULL),
(123, 14, 1, '2022-02-09 22:13:02', NULL),
(124, 14, 2, '2022-02-09 22:13:02', NULL),
(125, 14, 3, '2022-02-09 22:13:02', NULL),
(126, 14, 4, '2022-02-09 22:13:02', NULL),
(127, 15, 1, '2022-02-09 22:15:33', NULL),
(128, 15, 2, '2022-02-09 22:15:33', NULL),
(129, 15, 3, '2022-02-09 22:15:33', NULL),
(130, 15, 4, '2022-02-09 22:15:33', NULL),
(131, 15, 5, '2022-02-09 22:15:33', NULL),
(147, 11, 1, '2022-02-12 23:20:11', NULL),
(148, 11, 2, '2022-02-12 23:20:11', NULL),
(149, 11, 3, '2022-02-12 23:20:11', NULL),
(150, 11, 4, '2022-02-12 23:20:11', NULL),
(151, 11, 5, '2022-02-12 23:20:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_order`
--

CREATE TABLE `phtv_product_order` (
  `id` int(11) NOT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` int(10) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `total_product` int(11) DEFAULT NULL,
  `total_used_coin` int(11) DEFAULT NULL,
  `final_amount` decimal(10,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_order_items`
--

CREATE TABLE `phtv_product_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `couns_used` int(11) DEFAULT NULL,
  `is_preorder` int(11) NOT NULL DEFAULT 0 COMMENT '0: No, 1:Yes',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_order_payment`
--

CREATE TABLE `phtv_product_order_payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `trans_id` varchar(50) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `total_coin` int(11) DEFAULT NULL,
  `is_success` int(11) NOT NULL DEFAULT 0 COMMENT '0:No, 1:Yes',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_review`
--

CREATE TABLE `phtv_product_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` varchar(255) DEFAULT NULL,
  `rating` double(10,2) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_review`
--

INSERT INTO `phtv_product_review` (`id`, `product_id`, `user_id`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(1, 11, 10, 'expected thick cloth T-Shirt and got it. Looks nice and hope will last longer. I bought slightly a bigger size to have more comfort.', 5.00, '2022-02-14 21:06:44', '2022-02-14 16:35:43'),
(2, 11, 13, 'expected thick cloth T-Shirt and got it. Looks nice and hope will last longer. I bought slightly a bigger size to have more comfort.', 4.00, '2022-02-14 21:06:44', '2022-02-14 16:35:43'),
(3, 5, 13, 'expected thick cloth T-Shirt and got it. Looks nice and hope will last longer. I bought slightly a bigger size to have more comfort.', 4.00, '2022-02-14 21:06:44', '2022-02-14 16:35:43'),
(4, 6, 13, 'expected thick cloth T-Shirt and got it. Looks nice and hope will last longer. I bought slightly a bigger size to have more comfort.', 4.00, '2022-02-14 21:06:44', '2022-02-14 16:35:43'),
(5, 8, 13, 'expected thick cloth T-Shirt and got it. Looks nice and hope will last longer. I bought slightly a bigger size to have more comfort.', 4.00, '2022-02-14 21:06:44', '2022-02-14 16:35:43'),
(6, 9, 13, 'expected thick cloth T-Shirt and got it. Looks nice and hope will last longer. I bought slightly a bigger size to have more comfort.', 4.00, '2022-02-14 21:06:44', '2022-02-14 16:35:43'),
(7, 12, 10, 'expected thick cloth T-Shirt and got it. Looks nice and hope will last longer. I bought slightly a bigger size to have more comfort.', 5.00, '2022-02-14 21:06:44', '2022-02-14 16:35:43'),
(8, 10, 10, 'expected thick cloth T-Shirt and got it. Looks nice and hope will last longer. I bought slightly a bigger size to have more comfort.', 5.00, '2022-02-14 21:06:44', '2022-02-14 16:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_size`
--

CREATE TABLE `phtv_product_size` (
  `id` int(11) NOT NULL,
  `size_name` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_size`
--

INSERT INTO `phtv_product_size` (`id`, `size_name`, `created_at`, `updated_at`) VALUES
(1, 'XS', '2022-02-06 17:22:12', '2022-02-06 17:23:40'),
(2, 'S', '2022-02-06 17:22:25', '2022-02-06 17:23:51'),
(3, 'M', '2022-02-06 17:24:01', NULL),
(4, 'L', '2022-02-06 17:24:10', NULL),
(5, 'XL', '2022-02-06 17:24:23', NULL),
(6, 'XXL', '2022-02-06 17:24:36', NULL),
(11, '4', '2022-02-09 21:14:35', NULL),
(12, '5', '2022-02-09 21:14:45', NULL),
(13, '6', '2022-02-09 21:14:55', NULL),
(14, '7', '2022-02-09 21:15:04', NULL),
(15, '8', '2022-02-09 21:15:15', NULL),
(16, '9', '2022-02-09 21:15:34', NULL),
(17, '10', '2022-02-09 21:15:44', NULL),
(18, '11', '2022-02-09 21:15:57', NULL),
(19, '12', '2022-02-09 21:16:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_recommended_home`
--

CREATE TABLE `phtv_recommended_home` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '0:Blog, 1:Thumbnail, 2:video',
  `video_type` int(11) NOT NULL DEFAULT 0 COMMENT '0:Uploade, 1:Link',
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updatd_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_reword`
--

CREATE TABLE `phtv_reword` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description1` longtext DEFAULT NULL,
  `description2` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_reword_faq`
--

CREATE TABLE `phtv_reword_faq` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_trend_matrix_home`
--

CREATE TABLE `phtv_trend_matrix_home` (
  `id` int(11) NOT NULL,
  `selected_trend_id` int(11) DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updatd_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_users`
--

CREATE TABLE `phtv_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `coin_balance` int(11) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_users`
--

INSERT INTO `phtv_users` (`id`, `full_name`, `email`, `mobile`, `image`, `password`, `coin_balance`, `is_active`, `is_verified`, `created_at`, `updated_at`) VALUES
(10, 'Herry Terry', 'herry.terry@yopmail.com', '9874563211', '80039rbkckelxiyag63zowcbj.webp', 'e10adc3949ba59abbe56e057f20f883e', 55, 1, 1, '2022-01-30 20:24:47', '2022-02-18 22:54:18'),
(13, 'John Dao', 'john.dao@yopmail.com', '7418529630', '142311profilesA.jpg', 'e10adc3949ba59abbe56e057f20f883e', 0, 1, 1, '2022-02-06 13:20:04', '2022-02-14 21:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_voltage_category`
--

CREATE TABLE `phtv_voltage_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_voltage_episode`
--

CREATE TABLE `phtv_voltage_episode` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL COMMENT 'link/uplode',
  `video_type` int(11) NOT NULL DEFAULT 0 COMMENT '0: Link,1: Video',
  `admin_id` int(11) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislike` int(11) NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0,
  `description` longtext DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `voltage_title_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_voltage_logo`
--

CREATE TABLE `phtv_voltage_logo` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phtv_voltage_title`
--

CREATE TABLE `phtv_voltage_title` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phtv_admin`
--
ALTER TABLE `phtv_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_banner`
--
ALTER TABLE `phtv_banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `phtv_blog`
--
ALTER TABLE `phtv_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auther_id` (`auther_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `phtv_blog_auther`
--
ALTER TABLE `phtv_blog_auther`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_blog_category`
--
ALTER TABLE `phtv_blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_blog_comment`
--
ALTER TABLE `phtv_blog_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`);

--
-- Indexes for table `phtv_chatting_group`
--
ALTER TABLE `phtv_chatting_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id2` (`user_id2`);

--
-- Indexes for table `phtv_chatting_history`
--
ALTER TABLE `phtv_chatting_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `receiver_user_id` (`receiver_user_id`),
  ADD KEY `sender_user_id` (`sender_user_id`);

--
-- Indexes for table `phtv_cinematic_home`
--
ALTER TABLE `phtv_cinematic_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_coin_balance_history`
--
ALTER TABLE `phtv_coin_balance_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phtv_crew_pick_home`
--
ALTER TABLE `phtv_crew_pick_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_earning_coin_info`
--
ALTER TABLE `phtv_earning_coin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_featured_home`
--
ALTER TABLE `phtv_featured_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_header`
--
ALTER TABLE `phtv_header`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `phtv_live_event_home_category`
--
ALTER TABLE `phtv_live_event_home_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_live_tv_page`
--
ALTER TABLE `phtv_live_tv_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_newslettr`
--
ALTER TABLE `phtv_newslettr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_nft_categories`
--
ALTER TABLE `phtv_nft_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_nft_collection`
--
ALTER TABLE `phtv_nft_collection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_nft_drops_home`
--
ALTER TABLE `phtv_nft_drops_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_nft_info`
--
ALTER TABLE `phtv_nft_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `collection_id` (`collection_id`);

--
-- Indexes for table `phtv_nft_listiong`
--
ALTER TABLE `phtv_nft_listiong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_nft_logos`
--
ALTER TABLE `phtv_nft_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_pages`
--
ALTER TABLE `phtv_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_podcast`
--
ALTER TABLE `phtv_podcast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_podcast_auther`
--
ALTER TABLE `phtv_podcast_auther`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_podcast_episoad`
--
ALTER TABLE `phtv_podcast_episoad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `podcast_id` (`podcast_id`);

--
-- Indexes for table `phtv_product`
--
ALTER TABLE `phtv_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_brand_id` (`product_brand_id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `phtv_product_brand`
--
ALTER TABLE `phtv_product_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_product_cart`
--
ALTER TABLE `phtv_product_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `phtv_product_category`
--
ALTER TABLE `phtv_product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_product_color`
--
ALTER TABLE `phtv_product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_product_hot_deals`
--
ALTER TABLE `phtv_product_hot_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_product_images`
--
ALTER TABLE `phtv_product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `phtv_product_multi_color`
--
ALTER TABLE `phtv_product_multi_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `phtv_product_multi_size`
--
ALTER TABLE `phtv_product_multi_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `phtv_product_order`
--
ALTER TABLE `phtv_product_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phtv_product_order_items`
--
ALTER TABLE `phtv_product_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `phtv_product_order_payment`
--
ALTER TABLE `phtv_product_order_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `phtv_product_review`
--
ALTER TABLE `phtv_product_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phtv_product_size`
--
ALTER TABLE `phtv_product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_recommended_home`
--
ALTER TABLE `phtv_recommended_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_reword`
--
ALTER TABLE `phtv_reword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_reword_faq`
--
ALTER TABLE `phtv_reword_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_users`
--
ALTER TABLE `phtv_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_voltage_category`
--
ALTER TABLE `phtv_voltage_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_voltage_episode`
--
ALTER TABLE `phtv_voltage_episode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `voltage_title_id` (`voltage_title_id`);

--
-- Indexes for table `phtv_voltage_logo`
--
ALTER TABLE `phtv_voltage_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_voltage_title`
--
ALTER TABLE `phtv_voltage_title`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phtv_admin`
--
ALTER TABLE `phtv_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phtv_banner`
--
ALTER TABLE `phtv_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_blog`
--
ALTER TABLE `phtv_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_blog_auther`
--
ALTER TABLE `phtv_blog_auther`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_blog_category`
--
ALTER TABLE `phtv_blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_blog_comment`
--
ALTER TABLE `phtv_blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_chatting_group`
--
ALTER TABLE `phtv_chatting_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_chatting_history`
--
ALTER TABLE `phtv_chatting_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_cinematic_home`
--
ALTER TABLE `phtv_cinematic_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_coin_balance_history`
--
ALTER TABLE `phtv_coin_balance_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_crew_pick_home`
--
ALTER TABLE `phtv_crew_pick_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_earning_coin_info`
--
ALTER TABLE `phtv_earning_coin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_featured_home`
--
ALTER TABLE `phtv_featured_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_header`
--
ALTER TABLE `phtv_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_live_event_home_category`
--
ALTER TABLE `phtv_live_event_home_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_live_tv_page`
--
ALTER TABLE `phtv_live_tv_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_newslettr`
--
ALTER TABLE `phtv_newslettr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_nft_categories`
--
ALTER TABLE `phtv_nft_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_nft_collection`
--
ALTER TABLE `phtv_nft_collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_nft_drops_home`
--
ALTER TABLE `phtv_nft_drops_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_nft_info`
--
ALTER TABLE `phtv_nft_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_nft_listiong`
--
ALTER TABLE `phtv_nft_listiong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_nft_logos`
--
ALTER TABLE `phtv_nft_logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_pages`
--
ALTER TABLE `phtv_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_podcast`
--
ALTER TABLE `phtv_podcast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_podcast_auther`
--
ALTER TABLE `phtv_podcast_auther`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_podcast_episoad`
--
ALTER TABLE `phtv_podcast_episoad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product`
--
ALTER TABLE `phtv_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `phtv_product_brand`
--
ALTER TABLE `phtv_product_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `phtv_product_cart`
--
ALTER TABLE `phtv_product_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phtv_product_category`
--
ALTER TABLE `phtv_product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `phtv_product_color`
--
ALTER TABLE `phtv_product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `phtv_product_hot_deals`
--
ALTER TABLE `phtv_product_hot_deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_images`
--
ALTER TABLE `phtv_product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `phtv_product_multi_color`
--
ALTER TABLE `phtv_product_multi_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `phtv_product_multi_size`
--
ALTER TABLE `phtv_product_multi_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `phtv_product_order`
--
ALTER TABLE `phtv_product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_order_items`
--
ALTER TABLE `phtv_product_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_order_payment`
--
ALTER TABLE `phtv_product_order_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_review`
--
ALTER TABLE `phtv_product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `phtv_product_size`
--
ALTER TABLE `phtv_product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `phtv_recommended_home`
--
ALTER TABLE `phtv_recommended_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_reword`
--
ALTER TABLE `phtv_reword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_reword_faq`
--
ALTER TABLE `phtv_reword_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_users`
--
ALTER TABLE `phtv_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `phtv_voltage_category`
--
ALTER TABLE `phtv_voltage_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_voltage_episode`
--
ALTER TABLE `phtv_voltage_episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_voltage_logo`
--
ALTER TABLE `phtv_voltage_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_voltage_title`
--
ALTER TABLE `phtv_voltage_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `phtv_banner`
--
ALTER TABLE `phtv_banner`
  ADD CONSTRAINT `phtv_banner_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `phtv_pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_blog`
--
ALTER TABLE `phtv_blog`
  ADD CONSTRAINT `phtv_blog_ibfk_1` FOREIGN KEY (`auther_id`) REFERENCES `phtv_blog_auther` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_blog_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `phtv_blog_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_blog_comment`
--
ALTER TABLE `phtv_blog_comment`
  ADD CONSTRAINT `phtv_blog_comment_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `phtv_blog` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_chatting_group`
--
ALTER TABLE `phtv_chatting_group`
  ADD CONSTRAINT `phtv_chatting_group_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_chatting_group_ibfk_2` FOREIGN KEY (`user_id2`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_chatting_history`
--
ALTER TABLE `phtv_chatting_history`
  ADD CONSTRAINT `phtv_chatting_history_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `phtv_chatting_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_chatting_history_ibfk_2` FOREIGN KEY (`receiver_user_id`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_chatting_history_ibfk_3` FOREIGN KEY (`sender_user_id`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_coin_balance_history`
--
ALTER TABLE `phtv_coin_balance_history`
  ADD CONSTRAINT `phtv_coin_balance_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_header`
--
ALTER TABLE `phtv_header`
  ADD CONSTRAINT `phtv_header_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `phtv_header` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_nft_info`
--
ALTER TABLE `phtv_nft_info`
  ADD CONSTRAINT `phtv_nft_info_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `phtv_nft_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_nft_info_ibfk_2` FOREIGN KEY (`collection_id`) REFERENCES `phtv_nft_collection` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_podcast_episoad`
--
ALTER TABLE `phtv_podcast_episoad`
  ADD CONSTRAINT `phtv_podcast_episoad_ibfk_1` FOREIGN KEY (`podcast_id`) REFERENCES `phtv_podcast` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product`
--
ALTER TABLE `phtv_product`
  ADD CONSTRAINT `phtv_product_ibfk_1` FOREIGN KEY (`product_brand_id`) REFERENCES `phtv_product_brand` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_ibfk_2` FOREIGN KEY (`product_category_id`) REFERENCES `phtv_product_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_cart`
--
ALTER TABLE `phtv_product_cart`
  ADD CONSTRAINT `phtv_product_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `phtv_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_cart_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `phtv_product_color` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_cart_ibfk_4` FOREIGN KEY (`size_id`) REFERENCES `phtv_product_size` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_images`
--
ALTER TABLE `phtv_product_images`
  ADD CONSTRAINT `phtv_product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `phtv_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_multi_color`
--
ALTER TABLE `phtv_product_multi_color`
  ADD CONSTRAINT `phtv_product_multi_color_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `phtv_product_color` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_multi_color_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `phtv_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_multi_size`
--
ALTER TABLE `phtv_product_multi_size`
  ADD CONSTRAINT `phtv_product_multi_size_ibfk_1` FOREIGN KEY (`size_id`) REFERENCES `phtv_product_size` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_multi_size_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `phtv_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_order`
--
ALTER TABLE `phtv_product_order`
  ADD CONSTRAINT `phtv_product_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_order_items`
--
ALTER TABLE `phtv_product_order_items`
  ADD CONSTRAINT `phtv_product_order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `phtv_product_order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `phtv_product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_order_payment`
--
ALTER TABLE `phtv_product_order_payment`
  ADD CONSTRAINT `phtv_product_order_payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `phtv_product_order` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_product_review`
--
ALTER TABLE `phtv_product_review`
  ADD CONSTRAINT `phtv_product_review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `phtv_product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_product_review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `phtv_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phtv_voltage_episode`
--
ALTER TABLE `phtv_voltage_episode`
  ADD CONSTRAINT `phtv_voltage_episode_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `phtv_voltage_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_voltage_episode_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `phtv_admin` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `phtv_voltage_episode_ibfk_3` FOREIGN KEY (`voltage_title_id`) REFERENCES `phtv_voltage_title` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
