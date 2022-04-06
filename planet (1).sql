-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 06:21 PM
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
  `sub_title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '0:image, 1:video',
  `auther_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_blog`
--

INSERT INTO `phtv_blog` (`id`, `title`, `sub_title`, `description`, `image`, `video`, `type`, `auther_id`, `category_id`, `likes`, `dislikes`, `created_at`, `updated_at`) VALUES
(5, 'VANESSA BRYANT AND', 'Michael Jordan Reminiscence on Kobe Bryant', '<p>Today, at the Staples Center, Los Angeles, the Kobe Bryant Memorial took place. Vanessa Bryant took the stand,and delivered an emotional, strong speech, speaking on her husband and daughter, Kobe and Gianna Bryant. Following the passing of Gigi Bryant and Kobe Bryant, the memorial was decorated in purple and yellow flowers. In the beginning of the ceremony, Beyoncé lead</p>', '663265blog_imagesG.jpg', NULL, 0, 4, 1, 1, 1, '2022-03-27 05:17:56', '2022-03-29 20:53:04'),
(6, 'NEW ALBUM DROP!', 'KIKI – KIANA LEDE’S DEBUT ALBUM!', '<p>(image: www.kianalede.com) So remember Kidz Bop? Well one of those voices has grown up and today we know her as Kiana Lede! She won the competition Kidz Star USA 2011, but eventually evolved to partnering with Mike Woods putting a series of videos</p>', '610530Game3.png', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:20:05', '2022-03-28 22:29:26'),
(7, '10 THINGS TO DO', 'Under Quarantine!', '<p>photo via opencolleges.edu. au So far, 2020 has been quite a year, and we’re only 3 months in! I know it seems hectic rightnow, with everything going on, due to the coronavirus. However, while we are in quarantine, there are things that we can do to keep ourselves busy, in this chaotic time. Here are a list of things</p>', '329171blog_imagesB.jpg', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:20:55', NULL),
(8, 'COOL THINGS', 'to Do Before 30', '<p>If you’re still in your 20’s, the best thing to do is live your life to the fullest. I’m sure you’ve probably heard this before, but it’s true. You’re only 20-29 one time in your life, so why not create some memories. Being in your 20’s is the time to make mistakes, go crazy, create memories, and be</p>', '638460blog_imagesC.jpg', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:21:44', '2022-03-28 22:29:49'),
(9, '7 SIMPLE WAYS', 'to Get Over a Crush', '<p>We’ve all had a crush sometime in our life, like Molly Ringwald in “16 Candles .” Like Samantha Baker, we all have a Jake Ryan in our life, who we want to be with, but for some reason, he doesn’t seem to notice us. Having a crush isn’t easy, and sometimes leads to heartbreak. Not to worry, my friends. We will</p>', '408280blogA.jpg', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:22:34', NULL),
(10, '10 GREAT REASONS', '10 Great Reasons Not to Give a', '<p>photo via dumblittleman. com Have you ever been criticized by people, to the point that it messes with your head? You start to think you’re crazy, because everyone is against you. You start believing what people are saying, and think that maybe something’s wrong with you. Trust me, I’ve been there before. Not only does it become an easier</p>', '170481blog_imagesE.jpg', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:23:16', NULL),
(11, 'WHY YOU SHOULD STOP', 'Comparing Yourself to Others', '<p>photo via casnocha.com Comparing yourself to others might sounds easier said than done, but I get it. I’ve been there before. As a matter of fact, I’m still here. This past week, I’ve struggled with insecurities, becauseI felt like I wasn’t as pretty or curvy as the young woman who works with me. Guys like her, and I’m</p>', '947928blog_imagesF.jpg', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:24:02', NULL),
(12, 'POP SMOKE WAS', 'Brooklyn’s Hero', '<p>photo via StereoGum Today, around the time of 4:30 am, rapper Pop Smoke was killed in his Hollywood Hills home. The funny thing is, rappers usually get killed in their own hometown, not in another. Pop is from Brooklyn, New York, and happened to be killed in Los Angeles. It get’s tiring to say, “Rest in peace,” to these young</p>', '406602blog_imagesS.jpg', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:24:38', NULL),
(13, 'NEW ALBUM DROP!', 'KIKI – KIANA LEDE’S DEBUT ALBUM!', '<p>(image: www.kianalede.com) So remember Kidz Bop? Well one of those voices has grown up and today we know her as Kiana Lede! She won the competition Kidz Star USA 2011, but eventually evolved to partnering with Mike Woods putting a series of videos</p>', '775076blog_images.jpg', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:25:57', NULL),
(14, '10 THINGS TO DO', 'Under Quarantine!', '<p>photo via opencolleges.edu. au So far, 2020 has been quite a year, and we’re only 3 months in! I know it seems hectic rightnow, with everything going on, due to the coronavirus. However, while we are in quarantine, there are things that we can do to keep ourselves busy, in this chaotic time. Here are a list of things</p>', '644950blog_imagesB.jpg', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:26:34', NULL),
(15, 'COOL THINGS', 'to Do Before 30', '<p>If you’re still in your 20’s, the best thing to do is live your life to the fullest. I’m sure you’ve probably heard this before, but it’s true. You’re only 20-29 one time in your life, so why not create some memories. Being in your 20’s is the time to make mistakes, go crazy, create memories, and be</p>', '67215blog_imagesC.jpg', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:27:04', NULL),
(16, '7 SIMPLE WAYS', 'to Get Over a Crush', '<p>We’ve all had a crush sometime in our life, like Molly Ringwald in “16 Candles .” Like Samantha Baker, we all have a Jake Ryan in our life, who we want to be with, but for some reason, he doesn’t seem to notice us. Having a crush isn’t easy, and sometimes leads to heartbreak. Not to worry, my friends. We will</p>', '583239blog_imagesD.jpg', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:27:35', NULL),
(17, '10 GREAT REASONS', '10 Great Reasons Not to Give a', '<p>photo via dumblittleman. com Have you ever been criticized by people, to the point that it messes with your head? You start to think you’re crazy, because everyone is against you. You start believing what people are saying, and think that maybe something’s wrong with you. Trust me, I’ve been there before. Not only does it become an easier</p>', '496016blog_imagesE.jpg', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:28:06', NULL),
(18, 'WHY YOU SHOULD STOP', 'Comparing Yourself to Others', '<p>photo via casnocha.com Comparing yourself to others might sounds easier said than done, but I get it. I’ve been there before. As a matter of fact, I’m still here. This past week, I’ve struggled with insecurities, becauseI felt like I wasn’t as pretty or curvy as the young woman who works with me. Guys like her, and I’m</p>', '97451blog_imagesF.jpg', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:28:33', NULL),
(19, 'VANESSA BRYANT AND', 'Michael Jordan Reminiscence on Kobe Bryant', '<p>Today, at the Staples Center, Los Angeles, the Kobe Bryant Memorial took place. Vanessa Bryant took the stand,and delivered an emotional, strong speech, speaking on her husband and daughter, Kobe and Gianna Bryant. Following the passing of Gigi Bryant and Kobe Bryant, the memorial was decorated in purple and yellow flowers. In the beginning of the ceremony, Beyoncé lead</p>', '561704blog_imagesG.jpg', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:29:18', NULL),
(20, 'POP SMOKE WAS', 'Brooklyn’s Hero', '<p>photo via StereoGum Today, around the time of 4:30 am, rapper Pop Smoke was killed in his Hollywood Hills home. The funny thing is, rappers usually get killed in their own hometown, not in another. Pop is from Brooklyn, New York, and happened to be killed in Los Angeles. It get’s tiring to say, “Rest in peace,” to these young</p>', '753679blog_imagesS.jpg', NULL, 0, 4, 1, 0, 0, '2022-03-27 05:29:53', NULL),
(52, 'VANESSA BRYANT AND', 'Michael Jordan Reminiscence on Kobe Bryant', '<p>Today, at the Staples Center, Los Angeles, the Kobe Bryant Memorial took place. Vanessa Bryant took the stand,and delivered an emotional, strong speech, speaking on her husband and daughter, Kobe and Gianna Bryant. Following the passing of Gigi Bryant and Kobe Bryant, the memorial was decorated in purple and yellow flowers. In the beginning of the ceremony, Beyoncé lead</p>', '202062hot_deal_B.png', '', 0, 4, 1, 1, 0, '2022-03-31 18:17:17', '2022-04-05 20:56:26'),
(54, 'VANESSA BRYANT AND', 'Michael Jordan Reminiscence on Kobe Bryant', '<p>Today, at the Staples Center, Los Angeles, the Kobe Bryant Memorial took place. Vanessa Bryant took the stand,and delivered an emotional, strong speech, speaking on her husband and daughter, Kobe and Gianna Bryant. Following the passing of Gigi Bryant and Kobe Bryant, the memorial was decorated in purple and yellow flowers. In the beginning of the ceremony, Beyoncé lead</p>', '883533hot_deal.png', '892365file_example_MP4_480_1_5MG.mp4', 0, 4, 1, 0, 0, '2022-04-05 17:18:29', '2022-04-05 20:52:43');

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

--
-- Dumping data for table `phtv_blog_auther`
--

INSERT INTO `phtv_blog_auther` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(4, 'N. Ingeram', '554325img_avatar.png', '0000-00-00 00:00:00', NULL),
(6, 'Sponsor/s: Apollo Music, Space Times', '442837avatar2.png', '0000-00-00 00:00:00', NULL),
(7, 'Creat By: Apollo Music', '334680img_avatar2.png', '0000-00-00 00:00:00', NULL);

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

--
-- Dumping data for table `phtv_blog_category`
--

INSERT INTO `phtv_blog_category` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Music Nebula', '2022-03-25 22:55:40', '2022-03-27 10:39:51');

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

--
-- Dumping data for table `phtv_blog_comment`
--

INSERT INTO `phtv_blog_comment` (`id`, `blog_id`, `name`, `email`, `comment`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 5, 'John Dao', 'john.dao@yopmail.com', 'Today, at the Staples Center, Los Angeles, the Kobe Bryant Memorial took place. Vanessa Bryant took the stand,and delivered an emotional, strong speech, speaking on her husband and daughter, Kobe and Gianna Bryant. Following the passing of Gigi Bryant and Kobe Bryant, the memorial was decorated in purple and yellow flowers. In the beginning of the ceremony, Beyoncé lead', 13, '2022-03-27 13:16:57', NULL),
(2, 5, 'Celina Hawkins', 'celina.hawkins@yopmail.com', 'Today, at the Staples Center, Los Angeles, the Kobe Bryant Memorial took place. Vanessa Bryant took the stand,and delivered an emotional, strong speech, speaking on her husband and daughter, Kobe and Gianna Bryant.', 13, '2022-03-27 13:18:22', NULL),
(3, 6, 'John Dao', 'john.dao@yopmail.com', 'Testing', 13, '2022-03-28 21:48:44', NULL),
(4, 5, 'Celina Hawkins', 'celina.hawkins@yopmail.com', 'oday, at the Staples Center, Los Angeles, the Kobe Bryant Memorial took place. Vanessa Bryant took the stand,and delivered an emotional, strong speech, speaking on her husband and daughter, Kobe and Gianna Bryant.', 0, '2022-03-29 20:49:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_blog_likes`
--

CREATE TABLE `phtv_blog_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `system_user_id` varchar(20) DEFAULT NULL,
  `blog_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_blog_likes`
--

INSERT INTO `phtv_blog_likes` (`id`, `user_id`, `system_user_id`, `blog_id`, `created_at`) VALUES
(26, NULL, '6241ee1b7caad', 5, '2022-03-29 20:53:04'),
(27, NULL, '624c5fa2d08b3', 52, '2022-04-05 20:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_blog_unlike`
--

CREATE TABLE `phtv_blog_unlike` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `system_user_id` varchar(20) DEFAULT NULL,
  `blog_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_blog_unlike`
--

INSERT INTO `phtv_blog_unlike` (`id`, `user_id`, `system_user_id`, `blog_id`, `created_at`) VALUES
(10, 13, NULL, 5, '2022-03-28 22:48:06');

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
  `image` varchar(255) DEFAULT NULL,
  `auther_id` int(11) NOT NULL,
  `description` longtext DEFAULT NULL,
  `fb_link` varchar(255) DEFAULT NULL,
  `twiter_link` varchar(255) DEFAULT NULL,
  `google_link` varchar(255) DEFAULT NULL,
  `insta_link` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_podcast`
--

INSERT INTO `phtv_podcast` (`id`, `title`, `image`, `auther_id`, `description`, `fb_link`, `twiter_link`, `google_link`, `insta_link`, `created_at`, `updated_at`) VALUES
(1, 'Happy Holidays for You', '705518ssa.jpg', 6, '<p>The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of personal digital assistants. Facebook and Microsoft announced major investments into conversational user interfaces, and Slack launched a fund to capitalize on the bots hoping to build on its platform. But when bots became available the public, the public largely shrugged. The advantages of conversational interfaces paled next to their drawbacks.</p>', '', '', '', '', '2022-03-29 18:37:58', '2022-03-29 22:23:49'),
(2, 'Happy Holidays for You', '896173hot_deal.png', 7, '<p>The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of personal digital assistants. Facebook and Microsoft announced major investments into conversational user interfaces, and Slack launched a fund to capitalize on the bots hoping to build on its platform. But when bots became available the public, the public largely shrugged. The advantages of conversational interfaces paled next to their drawbacks.</p>', '', '', '', '', '2022-03-29 18:54:47', NULL),
(4, 'Happy Holidays for You', '49764hot_deal_B.png', 7, '<p>The hype cycle for bots exploded in 2016 as developers poured time and money into the dream of personal digital assistants. Facebook and Microsoft announced major investments into conversational user interfaces, and Slack launched a fund to capitalize on the bots hoping to build on its platform. But when bots became available the public, the public largely shrugged. The advantages of conversational interfaces paled next to their drawbacks.</p>', '', '', '', '', '2022-03-29 18:59:14', NULL);

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
-- Table structure for table `phtv_podcast_episode`
--

CREATE TABLE `phtv_podcast_episode` (
  `id` int(11) NOT NULL,
  `podcast_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `mp3_file` varchar(255) DEFAULT NULL,
  `length` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_podcast_episode`
--

INSERT INTO `phtv_podcast_episode` (`id`, `podcast_id`, `title`, `mp3_file`, `length`, `created_at`, `updated_at`) VALUES
(3, 1, 'I’m Begining To See The Light', '648955file_example_MP3_700KB.mp3', '00:00:27', '2022-04-06 16:36:23', NULL);

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
(5, 2, 5, 'ASIAN Men\'s Bouncer-01 Sports Latest Stylish Casual Sneakers', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '39.99', 30, 8, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 21:18:33', '2022-03-08 22:20:39'),
(6, 5, 5, 'ASIAN Men\'s Bouncer-01 Sports Latest Stylish Casual Sneakers', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '39.99', 39, 9, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 21:22:29', '2022-03-31 19:23:58'),
(7, 6, 5, 'ASIAN Men\'s Bouncer-01 Sports Latest Stylish Casual Sneakers', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '39.99', 39, 10, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 1, NULL, '2022-02-09 21:35:03', '2022-02-09 21:59:11'),
(8, 1, 10, 'Cuffed Beanie Planet Hopper TV', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '42.00', 42, 10, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 21:56:32', '2022-02-09 21:59:33'),
(9, 1, 10, 'Cuffed Beanie Planet Hopper TV', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '59.99', 59, 10, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 0, NULL, '2022-02-09 22:03:15', NULL),
(10, 1, 10, 'Cuffed Beanie Planet Hopper TV', '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', '69.99', 60, 4, '<p>For this special capsule, Common Ace co-founders and sneaker connoisseurs Sophia Chang and Romy Samuel curated a selection of women’s, men’s, and unisex sneakers from the Complex SHOP.</p>', NULL, NULL, 1, NULL, '2022-02-09 22:05:01', '2022-03-31 19:23:58'),
(11, 1, 9, 'Cuffed Beanie Planet Hopper TV', '<p>Sed id interdum urna. Nam ac elit a ante commodo tristique. condimentum vehicula a hendrerit ac nisi. hendrerit ac nisi Lorem ipsum dolor sit amet Vestibulum imperdiet nibh vel magna lacinia ultrices. Sed id interdum urna. Nullam lacinia faucibus risus, a euismod lorem tincidunt id. Donec maximus placerat tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse faucibus sed dolor eget posuere.Sed id interdum urna. Nam ac elit a ante commodo tristique. Duis lacus urna, condimentum a vehicula a, hendrerit ac nisi Lorem ipsum dolor sit amet.</p><h4>SIZE &amp; FIT</h4><ul><li>Our Model wears a UK 8/ EU 36/ Us 4</li><li>Model is 170/ 5’7” Tall</li><li>Shoulder seam to hem measures appox 58”/ 147 cm in lenght</li></ul><p>Sed id interdum urna. Nam ac elit a ante commodo tristique. condimentum vehicula a hendrerit ac nisi. hendrerit ac nisi Lorem ipsum dolor sit amet Vestibulum imperdiet nibh vel magna lacinia ultrices. Sed id interdum urna.</p><p>Nullam lacinia faucibus risus, a euismod lorem tincidunt id. Donec maximus placerat tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse faucibus sed dolor eget posuere.Sed id interdum urna. Nam ac elit a ante commodo tristique. Duis lacus urna, condimentum a vehicula a, hendrerit ac nisi Lorem ipsum dolor sit amet.</p>', '79.99', 70, 7, '<p>Sed id interdum urna. Nam ac elit a ante commodo tristique. condimentum vehicula a hendrerit ac nisi. hendrerit ac nisi Lorem ipsum dolor sit amet Vestibulum imperdiet nibh vel magna lacinia ultrices. Sed id interdum urna. Nullam lacinia faucibus risus, a euismod lorem tincidunt id. Donec maximus placerat tempor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse faucibus sed dolor eget posuere.Sed id interdum urna. Nam ac elit a ante commodo tristique. Duis lacus urna, condimentum a vehicula a, hendrerit ac nisi Lorem ipsum dolor sit amet.</p>', '4.50', NULL, 1, NULL, '2022-02-09 22:06:36', '2022-03-31 19:23:58'),
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
(1, 'Holiister', '956753hollister.svg', '2022-02-06 16:03:45', '2022-03-31 20:59:16'),
(2, 'Nike', '874554nike.svg', '2022-02-06 16:06:59', '2022-03-31 20:59:28'),
(4, 'OLD NAVY', '27181old-navy.svg', '2022-02-07 21:17:58', '2022-03-31 20:59:02'),
(5, 'GAP', '869798gap.svg', '2022-02-09 20:54:31', '2022-03-31 20:59:40'),
(6, 'VITTA', '667108vitta.svg', '2022-02-09 20:55:57', '2022-03-31 20:59:52'),
(7, 'ADIDAS', '344543adidas.svg', '2022-02-09 20:56:23', '2022-03-31 20:58:13'),
(8, 'WOODLAND', '626026wppdland.svg', '2022-02-09 20:56:54', '2022-03-31 20:58:27'),
(9, 'NAVY BLUE', '409376old-navy.svg', '2022-02-09 20:57:50', '2022-03-31 20:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_cart`
--

CREATE TABLE `phtv_product_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `system_user_id` varchar(20) DEFAULT NULL,
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

INSERT INTO `phtv_product_cart` (`id`, `product_id`, `user_id`, `system_user_id`, `color_id`, `size_id`, `qty`, `amount`, `coin_amount`, `total_amount`, `total_coin_amount`, `shipping_charge`, `created_at`, `updated_at`) VALUES
(4, 5, 10, NULL, 1, 11, 2, '39.99', '30.00', '79.98', '60.00', '0.00', '2022-02-16 23:47:06', '2022-02-18 22:51:57'),
(5, 6, 10, NULL, 2, 14, 2, '39.99', '39.00', '79.98', '78.00', '0.00', '2022-02-16 23:47:34', '2022-02-18 23:09:35'),
(6, 11, 10, NULL, 1, 1, 1, '79.99', '70.00', '79.99', '70.00', '0.00', '2022-02-19 17:36:06', '2022-02-20 15:34:08'),
(7, 9, 10, NULL, 1, 2, 1, '59.99', '59.00', '59.99', '59.00', '0.00', '2022-02-19 17:36:15', NULL);

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
(76, 11, 6, '2022-02-12 23:20:11', NULL),
(79, 5, 1, '2022-02-22 21:08:58', NULL),
(80, 5, 4, '2022-02-22 21:08:58', NULL);

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
(151, 11, 5, '2022-02-12 23:20:11', NULL),
(161, 5, 11, '2022-02-22 21:08:58', NULL),
(162, 5, 12, '2022-02-22 21:08:58', NULL),
(163, 5, 13, '2022-02-22 21:08:58', NULL),
(164, 5, 14, '2022-02-22 21:08:58', NULL),
(165, 5, 15, '2022-02-22 21:08:58', NULL),
(166, 5, 16, '2022-02-22 21:08:58', NULL),
(167, 5, 17, '2022-02-22 21:08:58', NULL),
(168, 5, 18, '2022-02-22 21:08:58', NULL),
(169, 5, 19, '2022-02-22 21:08:58', NULL);

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
  `confirm_date` datetime DEFAULT NULL,
  `shipped_date` datetime DEFAULT NULL,
  `out_for_delivery_date` datetime DEFAULT NULL,
  `delivered_date` datetime DEFAULT NULL,
  `completed_date` datetime DEFAULT NULL,
  `cancelled_date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_order`
--

INSERT INTO `phtv_product_order` (`id`, `invoice_no`, `user_id`, `full_name`, `email`, `mobile`, `address`, `city`, `zip`, `state`, `payment_type`, `transaction_id`, `total_amount`, `total_product`, `total_used_coin`, `final_amount`, `status`, `confirm_date`, `shipped_date`, `out_for_delivery_date`, `delivered_date`, `completed_date`, `cancelled_date`, `created_at`, `updated_at`) VALUES
(3, '6RU66218TX1930616', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'OH', 'PayPal', '2PM55797T6212763H', '584.00', 11, 56, '639.89', 1, '2022-03-30 16:14:27', NULL, NULL, NULL, NULL, NULL, '2022-03-03 23:06:52', '2022-03-30 19:44:27'),
(4, '1WN377079M726933S', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'OH', 'PayPal', '4LS250755D147045N', '584.00', 11, 56, '639.89', 2, NULL, '2022-03-30 16:14:38', NULL, NULL, NULL, NULL, '2022-03-04 22:08:18', '2022-03-30 19:44:38'),
(5, '99F4491646338060X', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'OH', 'PayPal', '3EN26476YV9031517', '584.00', 11, 56, '639.89', 3, NULL, NULL, NULL, '2022-03-30 16:14:44', NULL, NULL, '2022-03-04 22:11:02', '2022-03-30 19:44:44'),
(6, '4MS593721E5463417', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'OH', 'PayPal', '3LR22671T9841260B', '199.97', 3, 56, '255.86', 4, NULL, NULL, NULL, NULL, '2022-03-30 16:14:53', NULL, '2022-03-05 20:48:18', '2022-03-30 19:44:53'),
(7, '5UL77421D0322345N', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'OH', 'PayPal', '4DR9959807798434L', '763.00', 14, 56, '818.89', 5, NULL, NULL, NULL, NULL, NULL, '2022-03-30 16:14:58', '2022-03-05 21:19:26', '2022-03-30 19:44:58'),
(8, '202203070456049129', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'Ohio', 'Stripe', 'txn_3KajqpHxLeXMwQtE0Qx8Tdp7', '454.00', 0, 26, '479.92', 6, NULL, NULL, '2022-03-31 15:17:20', NULL, NULL, NULL, '2022-03-07 22:26:04', '2022-03-31 18:47:20'),
(10, '202203070512471638', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'Ohio', 'Stripe', 'txn_3Kak70HxLeXMwQtE0uPki6zw', '60.00', 2, 20, '79.98', 4, '2022-03-31 16:21:01', '2022-03-31 16:21:07', '2022-03-31 16:21:12', '2022-03-31 16:21:17', '2022-03-31 16:21:21', NULL, '2022-03-07 22:42:47', '2022-03-31 19:51:21'),
(11, '202203070515532980', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'Ohio', 'Stripe', 'txn_3KakA0HxLeXMwQtE1rSBP8pi', '200.00', 3, 30, '229.97', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-07 22:45:53', NULL),
(12, '202203070518178121', 13, 'Marcia Fields', 'sanghanichirag1412@gmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'Ohio', 'Stripe', 'txn_3KakCKHxLeXMwQtE0XgcSgGQ', '129.00', 3, 21, '149.97', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-07 22:48:17', NULL),
(13, '202203080359333909', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'Ohio', 'Stripe', 'txn_3Kb5RgHxLeXMwQtE1lAhRw4q', '100.00', 2, 20, '119.98', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-08 21:29:33', NULL),
(14, '202203080421465889', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'Ohio', 'Stripe', 'txn_3Kb5nAHxLeXMwQtE1bIGvwib', '100.00', 2, 20, '119.98', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-08 21:51:46', NULL),
(15, '202203080447449030', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'Ohio', 'Stripe', 'txn_3Kb6CJHxLeXMwQtE1xqLLdOF', '170.00', 3, 30, '199.97', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-08 22:17:44', NULL),
(16, '202203080450381247', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'Ohio', 'Stripe', 'txn_3Kb6F7HxLeXMwQtE1WYChiwh', '200.00', 4, 40, '239.96', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-08 22:20:38', NULL),
(17, '202203310353589523', 13, 'Marcia Fields', 'john.dao@yopmail.com', NULL, '1515, Hunters Creek Dr', 'Inglewood', 43001, 'Ohio', 'Stripe', 'txn_3KjORmHxLeXMwQtE0TTTxtS9', '169.00', 3, 21, '189.97', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-03-31 19:23:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phtv_product_order_items`
--

CREATE TABLE `phtv_product_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `couns_used` int(11) DEFAULT NULL,
  `is_preorder` int(11) NOT NULL DEFAULT 0 COMMENT '0: No, 1:Yes',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phtv_product_order_items`
--

INSERT INTO `phtv_product_order_items` (`id`, `order_id`, `product_id`, `color_id`, `size_id`, `amount`, `qty`, `total_amount`, `couns_used`, `is_preorder`, `created_at`, `updated_at`) VALUES
(1, 3, 11, 1, 1, '70.00', 2, '140.00', 20, 1, '2022-03-03 23:06:52', '2022-03-31 19:19:11'),
(2, 3, 12, 1, 1, '79.00', 3, '237.00', 3, 0, '2022-03-03 23:06:52', '2022-03-31 19:19:19'),
(3, 3, 5, 1, 1, '30.00', 3, '90.00', 30, 0, '2022-03-03 23:06:52', '2022-03-31 19:19:19'),
(4, 3, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-03 23:06:52', '2022-03-31 19:19:19'),
(5, 4, 11, 1, 1, '70.00', 2, '140.00', 20, 1, '2022-03-04 22:08:18', '2022-03-31 19:19:19'),
(6, 4, 12, 1, 1, '79.00', 3, '237.00', 3, 0, '2022-03-04 22:08:19', '2022-03-31 19:19:19'),
(7, 4, 5, 1, 1, '30.00', 3, '90.00', 30, 0, '2022-03-04 22:08:19', '2022-03-31 19:19:19'),
(8, 4, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-04 22:08:19', '2022-03-31 19:19:19'),
(9, 5, 11, 1, 1, '70.00', 2, '140.00', 20, 1, '2022-03-04 22:11:02', '2022-03-31 19:19:19'),
(10, 5, 12, 1, 1, '79.00', 3, '237.00', 3, 0, '2022-03-04 22:11:02', '2022-03-31 19:19:19'),
(11, 5, 5, 1, 1, '30.00', 3, '90.00', 30, 0, '2022-03-04 22:11:02', '2022-03-31 19:19:19'),
(12, 5, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-04 22:11:02', '2022-03-31 19:19:19'),
(13, 6, 11, 1, 1, '70.00', 2, '140.00', 20, 1, '2022-03-05 20:48:18', '2022-03-31 19:19:19'),
(14, 6, 12, 1, 1, '79.00', 3, '237.00', 3, 0, '2022-03-05 20:48:18', '2022-03-31 19:19:19'),
(15, 6, 5, 1, 1, '30.00', 3, '90.00', 30, 0, '2022-03-05 20:48:18', '2022-03-31 19:19:19'),
(16, 6, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-05 20:48:18', '2022-03-31 19:19:19'),
(17, 7, 11, 1, 1, '70.00', 2, '140.00', 20, 1, '2022-03-05 21:19:27', '2022-03-31 19:19:19'),
(18, 7, 12, 1, 1, '79.00', 3, '237.00', 3, 0, '2022-03-05 21:19:27', '2022-03-31 19:19:19'),
(19, 7, 5, 1, 1, '30.00', 3, '90.00', 30, 0, '2022-03-05 21:19:27', '2022-03-31 19:19:19'),
(20, 7, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-05 21:19:27', '2022-03-31 19:19:19'),
(21, 8, 11, 1, 1, '70.00', 1, '70.00', 10, 1, '2022-03-07 22:26:04', '2022-03-31 19:19:19'),
(22, 8, 12, 1, 1, '79.00', 3, '237.00', 3, 0, '2022-03-07 22:26:04', '2022-03-31 19:19:19'),
(23, 8, 5, 1, 1, '30.00', 1, '30.00', 10, 0, '2022-03-07 22:26:04', '2022-03-31 19:19:19'),
(24, 8, 6, 1, 1, '39.00', 3, '117.00', 3, 0, '2022-03-07 22:26:04', '2022-03-31 19:19:19'),
(25, 10, 5, 1, 1, '30.00', 2, '60.00', 20, 0, '2022-03-07 22:42:47', '2022-03-31 19:19:19'),
(26, 11, 11, 1, 1, '70.00', 2, '140.00', 20, 1, '2022-03-07 22:45:53', '2022-03-31 19:19:19'),
(27, 11, 10, 1, 1, '60.00', 1, '60.00', 10, 1, '2022-03-07 22:45:53', '2022-03-31 19:19:19'),
(28, 12, 10, 1, 1, '60.00', 1, '60.00', 10, 1, '2022-03-07 22:48:17', '2022-03-31 19:19:19'),
(29, 12, 5, 1, 1, '30.00', 1, '30.00', 10, 0, '2022-03-07 22:48:17', '2022-03-31 19:19:19'),
(30, 12, 6, 1, 1, '39.00', 1, '39.00', 1, 0, '2022-03-07 22:48:17', '2022-03-31 19:19:19'),
(31, 13, 5, 1, 1, '30.00', 1, '30.00', 10, 0, '2022-03-08 21:29:34', '2022-03-31 19:19:19'),
(32, 13, 11, 1, 1, '70.00', 1, '70.00', 10, 1, '2022-03-08 21:29:34', '2022-03-31 19:19:19'),
(33, 14, 11, 1, 1, '70.00', 1, '70.00', 10, 1, '2022-03-08 21:51:46', '2022-03-31 19:19:19'),
(34, 14, 5, 1, 1, '30.00', 1, '30.00', 10, 0, '2022-03-08 21:51:46', '2022-03-31 19:19:19'),
(35, 15, 5, 1, 1, '30.00', 1, '30.00', 10, 0, '2022-03-08 22:17:44', '2022-03-31 19:19:19'),
(36, 15, 11, 1, 1, '70.00', 2, '140.00', 20, 1, '2022-03-08 22:17:44', '2022-03-31 19:19:19'),
(37, 16, 11, 1, 1, '70.00', 2, '140.00', 20, 1, '2022-03-08 22:20:38', '2022-03-31 19:19:19'),
(38, 16, 5, 1, 1, '30.00', 2, '60.00', 20, 0, '2022-03-08 22:20:38', '2022-03-31 19:19:19'),
(39, 17, 11, 1, 1, '70.00', 1, '70.00', 10, 1, '2022-03-31 19:23:58', NULL),
(40, 17, 10, 1, 1, '60.00', 1, '60.00', 10, 1, '2022-03-31 19:23:58', NULL),
(41, 17, 6, 1, 11, '39.00', 1, '39.00', 1, 0, '2022-03-31 19:23:58', NULL);

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
(13, 'John Dao', 'john.dao@yopmail.com', '7418529630', '142311profilesA.jpg', 'e10adc3949ba59abbe56e057f20f883e', 492, 1, 1, '2022-02-06 13:20:04', '2022-03-31 19:23:59');

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
-- Indexes for table `phtv_blog_likes`
--
ALTER TABLE `phtv_blog_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phtv_blog_unlike`
--
ALTER TABLE `phtv_blog_unlike`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `phtv_podcast_episode`
--
ALTER TABLE `phtv_podcast_episode`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `phtv_blog_auther`
--
ALTER TABLE `phtv_blog_auther`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `phtv_blog_category`
--
ALTER TABLE `phtv_blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phtv_blog_comment`
--
ALTER TABLE `phtv_blog_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phtv_blog_likes`
--
ALTER TABLE `phtv_blog_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `phtv_blog_unlike`
--
ALTER TABLE `phtv_blog_unlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phtv_podcast_auther`
--
ALTER TABLE `phtv_podcast_auther`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phtv_podcast_episode`
--
ALTER TABLE `phtv_podcast_episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `phtv_product_multi_color`
--
ALTER TABLE `phtv_product_multi_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `phtv_product_multi_size`
--
ALTER TABLE `phtv_product_multi_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `phtv_product_order`
--
ALTER TABLE `phtv_product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `phtv_product_order_items`
--
ALTER TABLE `phtv_product_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
-- Constraints for table `phtv_podcast_episode`
--
ALTER TABLE `phtv_podcast_episode`
  ADD CONSTRAINT `phtv_podcast_episode_ibfk_1` FOREIGN KEY (`podcast_id`) REFERENCES `phtv_podcast` (`id`) ON DELETE CASCADE;

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
