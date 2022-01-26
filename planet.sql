-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 06:15 PM
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
(1, 'PlanetTV', 'admin@gmail.com', '220431like.png', 'e10adc3949ba59abbe56e057f20f883e', '9876543211', '2022-01-06 10:13:09', '2022-01-06 10:52:47');

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
-- Indexes for table `phtv_coin_balance_history`
--
ALTER TABLE `phtv_coin_balance_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phtv_earning_coin_info`
--
ALTER TABLE `phtv_earning_coin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_header`
--
ALTER TABLE `phtv_header`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`);

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
-- AUTO_INCREMENT for table `phtv_coin_balance_history`
--
ALTER TABLE `phtv_coin_balance_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_earning_coin_info`
--
ALTER TABLE `phtv_earning_coin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_header`
--
ALTER TABLE `phtv_header`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_brand`
--
ALTER TABLE `phtv_product_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_category`
--
ALTER TABLE `phtv_product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_color`
--
ALTER TABLE `phtv_product_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_hot_deals`
--
ALTER TABLE `phtv_product_hot_deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_images`
--
ALTER TABLE `phtv_product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_multi_color`
--
ALTER TABLE `phtv_product_multi_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_multi_size`
--
ALTER TABLE `phtv_product_multi_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_review`
--
ALTER TABLE `phtv_product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_product_size`
--
ALTER TABLE `phtv_product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_users`
--
ALTER TABLE `phtv_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
