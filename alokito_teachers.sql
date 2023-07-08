-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2022 at 03:19 PM
-- Server version: 10.3.20-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alokito_teachers`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `image`, `email`, `active`, `password`, `admin_level`, `created_at`, `updated_at`) VALUES
(1, 'Alokito Teachers', NULL, 'su@alokitoteachers.com', 1, '$2y$10$D9GrE3Bx4wy9KLaVXwKJoOCGSUhrsebWvMpC613okU9pAwa8iMDvW', '0', '2022-10-19 05:13:00', '2022-10-19 05:13:00'),
(5, 'Kyoko', NULL, 'kyoko@alokitoteachers.com', 1, '$2y$10$yLoo1lAyLeFluhhXa5yUXe/eyfUj3wXXEyinieEUTLqDELvhwylYy', '1', '2022-10-30 01:36:13', '2022-10-30 03:35:00'),
(4, 'Fahim Bakhtiar', 'JkWEvRxao4wMYJQNji4KY2zi3FOualZdrUO4iolx.jpg', 'fahim@alokitoteachers.com', 1, '$2y$10$i4QlddGH62mDsQakUAqF7O.GlfucE30iC3xXpdw0QcYaVMVqs9rMu', '1', '2022-10-27 02:57:00', '2022-10-31 02:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Class 1', 'grade_level', '2022-11-30 04:07:05', '2022-11-30 04:43:52'),
(2, 'Bangla', 'subject', '2022-11-30 04:07:47', '2022-11-30 04:07:47'),
(3, 'English', 'subject', '2022-12-22 03:02:05', '2022-12-22 03:02:43'),
(4, 'Math', 'subject', '2022-12-22 03:02:21', '2022-12-22 03:02:53'),
(5, 'Class 5', 'grade_level', '2022-12-22 03:02:33', '2022-12-22 03:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `learning_objective` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `certificate_price` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview_video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `details`, `learning_objective`, `price`, `sale_price`, `certificate_price`, `status`, `preview_video`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Basic English Course', '<p>Great Course!</p><h4><b>BUY!</b></h4>', '<p>Great Course!</p><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><span style=\"font-weight: bolder;\">BUY!</span></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><span style=\"font-weight: bolder;\">NOW!</span></h4>', 500, 300, 200, 'active', 'https://www.youtube.com/watch?v=F3awrSFQQMI', '8YzQgC4neEyivHTWJDGuUEYkQFwlGTpywvLiZpVU.png', '2022-11-15 06:05:14', '2022-11-17 05:55:54'),
(2, 'Math Pedagogy', '<p>cwec</p>', '<p>cwecwe</p>', 500, NULL, 200, 'inactive', 'https://www.youtube.com/watch?v=F3awrSFQQMI', NULL, '2022-11-16 03:24:39', '2022-11-17 05:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `course_videos`
--

DROP TABLE IF EXISTS `course_videos`;
CREATE TABLE IF NOT EXISTS `course_videos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_videos_course_id_foreign` (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_videos`
--

INSERT INTO `course_videos` (`id`, `title`, `url`, `detail`, `sequence`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'Introduction To', 'https://www.youtube.com/shorts/MofmUzu8mzI', '<p>sx2effcwecfff</p>', 1, 2, '2022-11-16 03:58:39', '2022-11-17 01:26:00'),
(4, 'What is Math?', 'https://www.youtube.com/shorts/MofmUzu8mzI', '<p>dwqedxcdsc</p>', 4, 2, '2022-11-16 04:13:11', '2022-11-16 06:50:56'),
(5, 'Math Explained', 'https://www.youtube.com/shorts/MofmUzu8mzI', '<p>dwqed</p>', 3, 2, '2022-11-16 04:20:30', '2022-11-16 04:20:30'),
(6, 'Video helo', 'https://www.youtube.com/shorts/MofmUzu8mzI', '<p>dqwede</p>', 1, 1, '2022-11-17 05:53:59', '2022-11-17 05:53:59');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `districts_division_id_foreign` (`division_id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(11, 'Patuakhali', 2, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(10, 'Jhalokati', 2, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(9, 'Bhola', 2, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(8, 'Barisal', 2, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(7, 'Barguna', 2, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(12, 'Pirojpur', 2, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(13, 'Bandarban', 3, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(14, 'Brahmanbaria', 3, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(15, 'Chandpur', 3, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(16, 'Chittagong', 3, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(17, 'Comilla', 3, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(18, 'Coxs Bazar', 3, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(19, 'Feni', 3, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(20, 'Khagrachhari', 3, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(21, 'Lakshmipur', 3, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(22, 'Noakhali', 3, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(23, 'Rangamati', 3, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(24, 'Dhaka', 1, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(25, 'Faridpur', 1, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(26, 'Gazipur', 1, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(27, 'Gopalganj', 1, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(28, 'Comilla', 1, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(29, 'Kishoreganj', 1, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(30, 'Madaripur', 1, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(31, 'Manikganj', 1, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(32, 'Munshiganj', 1, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(33, 'Narayanganj', 1, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(34, 'Narsingdi', 1, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(35, 'Rajbari', 1, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(36, 'Shariatpur', 1, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(37, 'Tangail', 1, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(38, 'Bagerhat', 4, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(39, 'Chuadanga', 4, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(40, 'Jessore', 4, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(41, 'Jhenaidah', 4, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(42, 'Khulna', 4, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(43, 'Kushtia', 4, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(44, 'Magura', 4, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(45, 'Meherpur', 4, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(46, 'Narail', 4, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(47, 'Satkhira', 4, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(48, 'Jamalpur', 6, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(49, 'Mymensingh', 6, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(50, 'Netrokona', 6, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(51, 'Sherpur', 6, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(52, 'Bogra', 5, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(53, 'Joypurhat', 5, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(54, 'Naogaon', 5, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(55, 'Natore', 5, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(56, 'Chapai Nawabganj', 5, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(57, 'Pabna', 5, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(58, 'Rajshahi', 5, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(59, 'Sirajganj', 5, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(60, 'Dinajpur', 7, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(61, 'Gaibandha', 7, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(62, 'Kurigram', 7, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(63, 'Lalmonirhat', 7, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(64, 'Nilphamari', 7, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(65, 'Panchagarh', 7, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(66, 'Rangpur', 7, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(67, 'Thakurgaon', 7, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(68, 'Habiganj', 8, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(69, 'Moulvibazar', 8, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(70, 'Sunamganj', 8, '2022-11-01 05:53:40', '2022-11-01 05:53:40'),
(71, 'Sylhet', 8, '2022-11-01 05:53:40', '2022-11-01 05:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

DROP TABLE IF EXISTS `divisions`;
CREATE TABLE IF NOT EXISTS `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '2022-11-01 05:34:17', '2022-11-01 05:34:17'),
(2, 'Barisal', '2022-11-01 05:34:17', '2022-11-01 05:34:17'),
(3, 'Chittagong', '2022-11-01 05:34:17', '2022-11-01 05:34:17'),
(4, 'Khulna', '2022-11-01 05:34:17', '2022-11-01 05:34:17'),
(5, 'Rajshahi', '2022-11-01 05:34:17', '2022-11-01 05:34:17'),
(6, 'Mymensingh', '2022-11-01 05:34:17', '2022-11-01 05:34:17'),
(7, 'Rangpur', '2022-11-01 05:34:17', '2022-11-01 05:34:17'),
(8, 'Sylhet', '2022-11-01 05:34:17', '2022-11-01 05:34:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tools` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reflection` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence` int(11) NOT NULL,
  `lessonplan_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lessons_lessonplan_id_foreign` (`lessonplan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `duration`, `segment`, `activity`, `method`, `tools`, `reflection`, `sequence`, `lessonplan_id`, `created_at`, `updated_at`) VALUES
(3, '5', 'পাঠের সূচনা', '<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">স্টুডেন্টদের জিজ্ঞেস করে নিবো তারা কেমন আছে? আগের ক্লাসের জড়তা কাটাতে তাদের কিছুক্ষণ জায়গায় দাঁড়িয়ে ফ্রী হ্যান্ড এক্সারসাইজ করিয়ে নিবো।&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">রিভিশন : চলো এবার আমরা পড়ায় ফিরে আসি। তোমাদের গতদিনের পড়া গল্পটার কথা কি মনে আছে? বলো তো-&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">১। নদীপথে কোথায় ভ্রমনে গিয়েছিলো তারা?</span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">২।কে কে ছিলো ভ্রমনে?</span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: 10pt; white-space: pre-wrap;\">৩। কোন স্টিমারে চড়ার মজাই আলাদা? </span></p>', 'রিভিশন', NULL, '<p><span id=\"docs-internal-guid-e09e8cb0-7fff-f64e-c630-2e1cd82d7366\"><span style=\"font-size: 10pt; font-family: &quot;Times New Roman&quot;; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">প্রতিটি অংশে কি কি প্ল্যান মতো ভালো হলো আর কোথায় সংশোধন প্রয়োজন এই রিফ্লেকশন অংশে লিখে রাখুন। </span></span><br></p>', 1, 1, '2022-12-22 09:16:15', '2022-12-22 09:16:15'),
(4, '11', 'পাঠের সাথে পরিচয়', '<p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">১।প্রশ্নগুলোর সাথে মিল রেখে নতুন টপিক সম্পর্কে আইডিয়া দিতে বইয়ের ৮০ পৃষ্ঠায় ‘স্টিমারের সিটি’ গল্পটির’ খুলে তাদেরকে “স্টিমার ক্রমশ থেকে চলে স্টিমার” পর্যন্ত অংশ সুন্দর করে প্রমিত উচ্চারণে পড়ে শোনাবো ।&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">২।পড়ার সময় অপরিচিত শব্দগুলো যেমনঃ ভ্রমণ,প্রশস্ত,শ্যামল ইত্যাদি বোর্ডে লিখে আবার উচ্চারণ করে শোনাবো।&nbsp;&nbsp;&nbsp;</span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:10pt;font-family:\'Times New Roman\';color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">৩। যুক্তবর্ণ থাকা শব্দগুলো যেমন-ঞ্জ,ক্ষ্য,স্ত,চ্ছ,ঞ্চ,শ্ব&nbsp; ইত্যাদি ভেঙ্গে লিখে দিবো এবং জোর দিয়ে উচ্চারণ করে শোনাবো।’</span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"background-color: transparent; color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: 10pt; white-space: pre-wrap;\">৪।তাদেরকে গাঙচিল ও শুশুকের ছবি দেখিয়ে এদের চিনতে সাহায্য করবো।</span></p>', 'লেকচার', '<p><a href=\"https://drive.google.com/file/d/1Ir5wRAWj_YalZm4dYnhEXZ-jakt1e7dF/view?usp=sharing\" target=\"_blank\">https://drive.google.com/file/d/1Ir5wRAWj_YalZm4dYnhEXZ-jakt1e7dF/view?usp=sharing</a><br></p>', NULL, 2, 1, '2022-12-22 09:17:41', '2022-12-22 09:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_plans`
--

DROP TABLE IF EXISTS `lesson_plans`;
CREATE TABLE IF NOT EXISTS `lesson_plans` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `learning_outcomes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lesson_plans`
--

INSERT INTO `lesson_plans` (`id`, `title`, `class`, `subject`, `price`, `status`, `details`, `duration`, `learning_outcomes`, `created_at`, `updated_at`) VALUES
(1, 'বাংলা (আমার বই)  অধ্যায় - ১৮', 1, 2, 250, 0, '<p>বিষয় - বাংলা (আমার বই)&nbsp;</p><p>অধ্যায় - ১৮ লেসন - ২</p><p>টপিক- স্টিমারের সিটি</p><p><br></p>', '40', '<p>এই লেসন শেষে স্টুডে ন্টরা-</p><p>১। সুন্দর ও প্রমিত উচ্চারণে গল্প পড়তে পারবে ও গল্পে যুক্তবর্ণ ও যুক্তব্যঞ্জন পড়তে পারবে ।</p>', '2022-12-01 04:43:47', '2022-12-20 03:41:44'),
(2, 'বাংলা (আমার বই) ভাষা শহিদদের কথা', 1, 4, 200, 0, '<p>বিষয় - বাংলা (আমার বই)</p><p>টপিক- ৫.১ ( ভাষা শহিদদের কথা)</p><div><br></div>', '40', '<p>এই লেসন শেষে স্টুডেন্টরা-</p><p>১। সুন্দর ও প্রমিত উচ্চারণে গল্প পড়তে পারবে ও গল্পে যুক্তবর্ণ ও যুক্তব্যঞ্জন পড়তে পারবে।</p><div><br></div>', '2022-12-20 03:46:40', '2022-12-22 03:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_18_084836_create_admins_table', 1),
(7, '2022_11_01_060526_create_teachers_table', 2),
(8, '2022_11_01_112321_create_divisions_table', 3),
(9, '2022_11_01_112333_create_districts_table', 3),
(10, '2022_11_13_082258_create_packages_table', 4),
(11, '2022_11_15_094620_create_courses_table', 5),
(13, '2022_11_15_103735_create_course_videos_table', 6),
(14, '2022_11_15_104030_create_quizzes_table', 6),
(15, '2022_11_15_104348_create_questions_table', 7),
(18, '2022_11_30_054856_create_categories_table', 8),
(22, '2022_12_01_092525_create_lessons_table', 9),
(21, '2022_12_01_092514_create_lesson_plans_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_course` int(11) NOT NULL,
  `max_resource` int(11) NOT NULL,
  `max_workshop` int(11) NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `price`, `duration`, `status`, `max_course`, `max_resource`, `max_workshop`, `icon`, `created_at`, `updated_at`) VALUES
(8, 'Deluxe', 1000, 5, 'active', 5, 5, 5, NULL, '2022-11-13 04:20:09', '2022-11-15 03:32:32'),
(9, 'Regular', 500, 3, 'active', 3, 3, 3, 'KyOOzY1mP0PtaqRFG3HlzhyFSZh2X7Gp2Jpbdfsc.jpg', '2022-11-13 04:21:53', '2022-11-13 05:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `option_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `quiz_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_quiz_id_foreign` (`quiz_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `sequence`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `points`, `quiz_id`, `created_at`, `updated_at`) VALUES
(1, 'Question no 01', 1, 'csdc', 'csdcw', 'efewfhhhh', 'fwefwe', 4, 10, 2, '2022-11-17 03:55:07', '2022-11-17 04:56:45'),
(2, 'Question 02', 2, 'edwqd', 'asd', 'qwd', 'qad', 2, 5, 2, '2022-11-17 04:20:58', '2022-11-17 04:20:58'),
(3, 'Q1', 1, 'dqd', 'ded', 'ded', 'dew', 2, 10, 4, '2022-11-17 05:55:50', '2022-11-17 05:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quizzes_course_id_foreign` (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `detail`, `sequence`, `course_id`, `created_at`, `updated_at`) VALUES
(2, 'Quiz 01', '<p>ykyukklll</p>', 2, 2, '2022-11-16 05:05:52', '2022-11-17 02:48:50'),
(3, 'Quiz 02', '<p>edewdwed</p>', 5, 2, '2022-11-17 04:05:29', '2022-11-17 04:05:29'),
(4, 'Quiz Hello', '<p>dwede</p>', 2, 1, '2022-11-17 05:54:30', '2022-11-17 05:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_id` int(10) UNSIGNED DEFAULT NULL,
  `school` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `full_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curriculum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualifications` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_history` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachers_user_name_unique` (`username`),
  UNIQUE KEY `teachers_email_unique` (`email`),
  UNIQUE KEY `teachers_phone_unique` (`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `username`, `email`, `phone`, `password`, `district_id`, `school`, `school_address`, `classes`, `experience`, `gender`, `dob`, `full_address`, `dp`, `curriculum`, `qualifications`, `work_history`, `created_at`, `updated_at`) VALUES
(4, 'Nahida', 'Rahman', 'nahid13', 'nahid@gmail.com', '01630287322', '$2y$10$Xn7aSMFjDseUohXlPc.p5e9JDnecYjkXWKYq79Fv0v34/KJHKAuaK', 24, 'Uttara High School', 'Uttara, Dhaka', 'primary', '6', 'female', '2022-11-02', 'Road 3b, sector 09', '', 'bm', NULL, NULL, '2022-11-02 00:36:03', '2022-11-12 03:50:16'),
(3, 'Fahim', 'Hassan', 'fahim13', 'fahimbakhtiar089@gmail.com', '01630287321', '$2y$10$Xn7aSMFjDseUohXlPc.p5e9JDnecYjkXWKYq79Fv0v34/KJHKAuaK', 24, 'Uttara High School', 'Uttara, Dhaka', 'primary', '6', 'male', '2022-11-02', 'Road 3b, sector 09', 'lNVgMNMcfSMwBLEts7VkNWuTv9YZiZ7yJ18rIeCO.jpg', 'bm', NULL, NULL, '2022-11-02 00:36:03', '2022-11-12 03:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
