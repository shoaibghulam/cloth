-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 02:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutuses`
--

CREATE TABLE `aboutuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutuses`
--

INSERT INTO `aboutuses` (`id`, `about`, `created_at`, `updated_at`) VALUES
(4, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.', '2020-12-14 18:43:06', '2020-12-18 19:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `name`, `email`, `password`, `phone`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'khalid', 'khalid@gmail.com', '$2y$10$kI9uKhrLC4R0yd20XZwduOEHx1wmB9.mim2WSzbwODfG56qPVYlwG', '12345678', '', NULL, '2020-12-15 21:25:21'),
(2, 1, 'khalidmeer', 'meerkhalid482@gmail.com', '$2y$10$VAPAWW28lVGHDjcmzL9fq.6ig3RrVKvpnUktlGfMDMSlomPr0OqnK', '12345678', '', NULL, '2020-11-27 23:41:22'),
(3, 1, 'Haris', 'harisahmedshaikh12@gmail.com', '$2y$10$2xeHAf/i7FyrhDvX23x7XuQPYlFaePGAGNuGu8Vl7fJKW3m9lBu4m', '12345678', '16098586530d6cd2e9a0-out.gif', NULL, '2021-01-05 22:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `firstName`, `lastName`, `created_at`, `updated_at`) VALUES
(1, 'Derek', 'Medge', '2020-12-01 21:16:41', '2020-12-01 21:16:41'),
(2, 'Kylynn', 'Audra', '2020-12-01 21:16:47', '2020-12-01 21:16:47'),
(3, 'Meghan', 'Rigel', '2020-12-01 21:16:53', '2020-12-01 21:16:53'),
(4, 'Amir', 'Mughal', '2020-12-01 21:59:20', '2020-12-01 21:59:20'),
(5, 'Imran', 'Bhai', '2020-12-09 18:11:05', '2020-12-09 18:11:39'),
(8, 'Nafees', 'Haider', '2020-12-09 20:17:23', '2020-12-09 20:18:13'),
(9, 'abcdef', 'abcdef', '2020-12-12 20:18:58', '2020-12-12 20:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `authorsses`
--

CREATE TABLE `authorsses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authorsses`
--

INSERT INTO `authorsses` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Haris', 'haris@gmail.com', '$2y$10$akdYzeIoxZZdNKiR6VU8Ke/UEsZGd/5vyVNmfjUGD4zIa6wFneQTu', '2021-01-13 18:46:31', '2021-01-13 18:46:31'),
(2, 'Turabi', 'turabi@gmail.com', '$2y$10$c4.hrG0W3sQMfNaCpVnGkuWkgVikkw9Evvw3NKAjk5Fz55i4QwB9G', '2021-01-13 21:39:57', '2021-01-13 21:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `publisher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_date` date DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `price` double(15,2) NOT NULL,
  `demo_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `demo_pages` int(11) DEFAULT NULL,
  `status` enum('pending','published','declined') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discounted_price` double GENERATED ALWAYS AS (round(`price` - `discount` / 100 * `price`,2)) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `vendor_id`, `author_id`, `sub_category_id`, `publisher_id`, `language_id`, `name`, `title`, `isbn`, `description`, `published_date`, `image`, `discount`, `price`, `demo_file`, `attachment`, `demo_pages`, `status`, `created_at`, `updated_at`) VALUES
(21, 15, NULL, 20, 7, 8, 'Rudyard Pacheco', 'Qui incidunt eum qu', 'Voluptatem Labore n', 'Est dolorem nulla ut', '2009-11-18', '6058eaa0a7356_1616439968.jpg', 10, 1500.00, NULL, '6058eaa0d6279_1616439968.pdf', 1, NULL, '2021-03-23 02:06:09', '2021-03-23 02:06:09'),
(22, 15, NULL, 20, NULL, NULL, 'Zane Alvarado', 'Praesentium incidunt', NULL, 'Sunt enim mollit aut', NULL, '605c33295f8ab_1616655145.jpg', 10, 1500.00, NULL, NULL, NULL, NULL, '2021-03-25 13:52:25', '2021-03-25 13:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(17, 'Women Fashion', '2021-03-23 02:01:03', '2021-03-23 02:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `book_id` bigint(20) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `book_id`, `comment`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'hello', 1, '2020-12-02', '2020-12-02 18:19:11', '2020-12-02 18:19:11'),
(2, 3, 2, 'sdad', 1, '2020-12-03', '2020-12-03 23:10:12', '2020-12-03 23:10:12'),
(3, 3, 2, 'saS', 1, '2020-12-03', '2020-12-03 23:10:32', '2020-12-03 23:10:32'),
(4, 3, 2, 'sad', 1, '2020-12-03', '2020-12-03 23:12:53', '2020-12-03 23:12:53'),
(5, 3, 4, 'sd f, am,f', 1, '2020-12-04', '2020-12-04 18:34:29', '2020-12-04 18:34:29'),
(6, 46, 1, 'kllklkk', 1, '2020-12-16', '2020-12-16 19:20:09', '2020-12-16 21:20:20'),
(7, 53, 1, 'best book', 1, '2020-12-28', '2020-12-28 23:53:28', '2020-12-28 23:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Haris', 'ha5840999@gmail.com', 'Help me !', '2020-12-19 17:39:09', '2020-12-19 17:39:09'),
(2, 'khalid', 'khalid@gmail.com', 'sds', '2020-12-19 17:40:43', '2020-12-19 17:40:43'),
(3, 'Sohail', 'sohail@gmail.com', 'asdashdkaskdhk', '2020-12-19 18:39:02', '2020-12-19 18:39:02'),
(4, 'khalid', 'hr@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', '2020-12-20 20:35:22', '2020-12-20 20:35:22'),
(5, 'Piper Ratliff', 'nomygubuf@mailinator.com', 'Debitis eligendi ame', '2020-12-26 17:44:11', '2020-12-26 17:44:11'),
(6, 'Shelby Carson', 'hodym@mailinator.com', 'Et est id in impedit', '2020-12-29 15:19:51', '2020-12-29 15:19:51'),
(7, 'Nafees', 'nfshaider512@gmail.com', 'Aut inventore conseq', '2021-01-02 19:51:27', '2021-01-02 19:51:27'),
(8, 'Nafees', 'nfshaider512@gmail.com', 'Hello how r u ?', '2021-01-02 20:18:13', '2021-01-02 20:18:13'),
(9, 'HARIS AHMED SHAIKH', 'admin1@gmail.com', 'Dss', '2021-01-04 00:34:22', '2021-01-04 00:34:22'),
(10, 'Nafees haider', 'nfshaider512@gmail.com', 'Hey! want to order some new books!', '2021-01-05 22:08:35', '2021-01-05 22:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `cookies`
--

CREATE TABLE `cookies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `pageno` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cookies`
--

INSERT INTO `cookies` (`id`, `user_id`, `book_id`, `pageno`, `created_at`, `updated_at`) VALUES
(1, 46, 19, 5, '2021-02-05 15:09:40', '2021-02-05 15:35:09'),
(2, 46, 19, 5, '2021-02-05 15:17:26', '2021-02-05 15:17:26'),
(3, 46, 1, 1, '2021-02-05 15:33:23', '2021-02-05 15:33:23'),
(4, 46, 16, 1, '2021-02-05 15:37:11', '2021-02-05 15:37:11'),
(5, 46, 2, 5, '2021-02-05 15:37:44', '2021-02-05 15:44:23'),
(6, 46, 19, 6, '2021-02-05 17:47:18', '2021-02-05 17:47:18'),
(7, 46, 19, 15, '2021-02-05 18:23:39', '2021-02-05 18:23:39'),
(8, 46, 19, 17, '2021-02-05 18:36:03', '2021-02-05 18:36:03'),
(9, 46, 18, 6, '2021-02-05 19:42:25', '2021-02-05 19:42:25'),
(10, 46, 18, 6, '2021-02-05 19:42:25', '2021-02-05 19:42:25'),
(11, 46, 18, 1, '2021-02-05 19:43:30', '2021-02-05 19:43:30'),
(12, 46, 18, 3, '2021-02-05 19:45:21', '2021-02-05 19:45:21'),
(13, 46, 18, 4, '2021-02-05 20:22:31', '2021-02-05 20:22:31'),
(14, 46, 18, 14, '2021-02-05 21:17:07', '2021-02-05 21:17:07'),
(15, 60, 19, 5, '2021-02-08 14:23:18', '2021-02-08 14:23:18'),
(16, 46, 18, 1, '2021-02-12 21:40:55', '2021-02-12 21:40:55'),
(17, 46, 18, 4, '2021-02-15 20:09:37', '2021-02-15 20:09:37'),
(18, 46, 18, 6, '2021-03-09 15:08:11', '2021-03-09 15:08:11'),
(19, 46, 18, 7, '2021-03-21 18:53:23', '2021-03-21 18:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postedby` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `image`, `eventname`, `postedby`, `description`, `created_at`, `updated_at`) VALUES
(3, '1611651709book.jpg', 'Carter', 'Haris', 'Non quisquam ut itaq', '2021-01-26 17:01:49', '2021-01-26 20:42:12'),
(7, '161166490622.jpg', 'Ori', 'Haris', 'Voluptate sint est m', '2021-01-26 20:41:46', '2021-01-26 20:41:46'),
(8, '161166494933.jpg', 'Upton', 'Haris', 'Facilis eum deserunt', '2021-01-26 20:42:29', '2021-01-26 20:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forgets`
--

CREATE TABLE `forgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Amir Ali', '2020-12-01 22:02:09', '2020-12-01 22:02:09'),
(3, 'fun', '2020-12-09 18:14:02', '2020-12-09 18:14:02'),
(4, 'ali', '2020-12-09 18:33:39', '2020-12-09 18:33:39'),
(5, 'Nafees', '2020-12-09 20:23:44', '2020-12-09 20:23:44'),
(6, 'abcd', '2020-12-12 20:21:00', '2020-12-12 20:21:00'),
(7, 'Lorem Ipsum is simply dummy text of the printing and typesetting', '2020-12-12 20:21:29', '2020-12-12 20:21:29'),
(8, 'Histroy', '2020-12-14 19:37:23', '2020-12-14 19:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_code` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `language_code`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', '2020-12-01 21:05:41', '2020-12-01 21:05:41'),
(2, 'Swedish', 'sw', '2020-12-01 21:05:53', '2020-12-01 21:05:53'),
(3, 'Afrikaans', 'afr', '2020-12-01 21:06:09', '2020-12-01 21:06:09'),
(4, 'German', 'ger', '2020-12-01 21:06:28', '2020-12-01 21:06:28'),
(5, 'Greek', 'gre', '2020-12-01 21:07:04', '2020-12-01 21:07:04'),
(6, 'Spainish', 'Spn', '2020-12-02 00:13:58', '2020-12-02 00:13:58'),
(8, 'new lang', 'p0o1', '2020-12-09 18:13:11', '2020-12-09 18:13:11'),
(9, 'Urdu', 'UR', '2020-12-09 18:13:35', '2020-12-09 18:13:49'),
(10, 'Persian', 'per', '2020-12-09 20:21:14', '2020-12-09 20:21:32'),
(12, 'Sindhi', 'Sdh', '2020-12-14 19:17:18', '2020-12-14 19:17:18'),
(15, 'test languages', 't12', '2020-12-26 18:20:39', '2020-12-26 18:21:33'),
(16, 'Bristish English', 'BRE', '2021-01-02 17:36:19', '2021-01-02 17:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '1616403265Attachment_1615715407.png', '2021-03-09 14:10:37', '2021-03-22 15:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_11_16_104217_create_categories_table', 1),
(5, '2020_11_16_104705_create_genres_table', 1),
(6, '2020_11_13_113432_create_admins_table', 2),
(7, '2020_11_13_114019_create_roles_table', 2),
(8, '2020_11_16_105102_create_sub_categories_table', 2),
(9, '2020_11_16_121438_create_authors_table', 3),
(10, '2020_11_16_135156_create_languages_table', 4),
(11, '2020_11_17_123128_create_publishers_table', 5),
(13, '2020_11_19_111304_create_vendors_table', 7),
(18, '2020_11_23_105943_create_books_table', 8),
(19, '2020_11_20_122117_create_registers_table', 9),
(20, '2020_11_27_124446_create_forgets_table', 9),
(21, '2020_11_30_122711_create_comments_table', 10),
(22, '2020_12_01_093324_create_rating_tables', 11),
(23, '2020_12_01_110901_create_ratings_table', 12),
(24, '2020_12_03_075024_create_wishlists_table', 13),
(26, '2020_12_04_134116_add_facebook_id_to_users', 14),
(28, '2020_12_07_113039_create_cart_details_table', 16),
(29, '2020_12_05_132637_create_cart_table', 17),
(30, '2020_12_08_104237_create_store_information_table', 18),
(31, '2020_12_11_145753_create_order_table', 19),
(32, '2020_12_11_150134_create_order_details_table', 19),
(33, '2020_12_14_093341_create_aboutuses_table', 20),
(34, '2020_12_14_123216_create_terms_table', 21),
(35, '2020_12_16_132553_create_promotions_table', 22),
(36, '2020_12_18_113710_create_sliders_table', 23),
(37, '2020_12_19_080054_create_contacts_table', 24),
(38, '2020_12_19_094237_create_notifications_table', 25),
(39, '2020_12_30_123906_add_image_to_admins_table', 26),
(40, '2020_12_30_141643_add_image_to_vendors_table', 27),
(41, '2021_01_04_160214_create_wallets_table', 27),
(42, '2021_01_09_080205_drop_min_stock_column_from_books', 28),
(43, '2021_01_09_080759_drop_max_stock_column_from_books', 28),
(44, '2021_01_13_091539_create_authorsses_table', 29),
(45, '2021_01_13_143855_add_bio_to_vendors_table', 30),
(46, '2021_01_13_153043_drop_bio_to_vendors_table', 31),
(47, '2021_01_13_153417_add_bios_to_vendors_table', 32),
(48, '2021_01_15_102204_create_videos_table', 33),
(49, '2021_01_16_115352_add_vendor_id_to_videos_table', 34),
(50, '2021_01_26_060529_create_events_table', 35),
(51, '2017_06_16_140051_create_nikolag_customers_table', 36),
(52, '2017_06_16_140942_create_nikolag_customer_user_table', 36),
(53, '2017_06_16_140943_create_nikolag_transactions_table', 36),
(54, '2018_02_07_140944_create_nikolag_taxes_table', 36),
(55, '2018_02_07_140945_create_nikolag_discounts_table', 36),
(56, '2018_02_07_140946_create_nikolag_deductible_table', 36),
(57, '2018_02_07_140947_create_nikolag_products_table', 36),
(58, '2018_02_07_140948_create_nikolag_orders_table', 36),
(59, '2018_02_07_140949_create_nikolag_product_order_table', 36),
(60, '2021_02_05_061359_create_cookies_table', 37),
(61, '2021_03_09_053233_create_logos_table', 38),
(62, '2021_03_09_072019_create_titles_table', 39);

-- --------------------------------------------------------

--
-- Table structure for table `nikolag_customers`
--

CREATE TABLE `nikolag_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_service_type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nikolag_customer_user`
--

CREATE TABLE `nikolag_customer_user` (
  `owner_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nikolag_deductibles`
--

CREATE TABLE `nikolag_deductibles` (
  `deductible_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deductible_id` bigint(20) UNSIGNED NOT NULL,
  `featurable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `featurable_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nikolag_discounts`
--

CREATE TABLE `nikolag_discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` double(8,2) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `reference_id` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nikolag_orders`
--

CREATE TABLE `nikolag_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_service_type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nikolag_products`
--

CREATE TABLE `nikolag_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variation_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `reference_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_id` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nikolag_products`
--

INSERT INTO `nikolag_products` (`id`, `name`, `variation_name`, `note`, `price`, `reference_type`, `reference_id`, `created_at`, `updated_at`) VALUES
(1, 'book', NULL, NULL, 200000.00, NULL, NULL, '2021-02-03 20:55:43', '2021-02-03 20:55:43'),
(2, 'book', NULL, NULL, 200000.00, NULL, NULL, '2021-02-03 20:58:45', '2021-02-03 20:58:45'),
(3, 'book', NULL, NULL, 200000.00, NULL, NULL, '2021-02-03 20:59:53', '2021-02-03 20:59:53'),
(4, 'book', NULL, NULL, 200000.00, NULL, NULL, '2021-02-03 21:00:42', '2021-02-03 21:00:42'),
(5, 'book', NULL, NULL, 200000.00, NULL, NULL, '2021-02-04 16:16:26', '2021-02-04 16:16:26'),
(6, 'book', NULL, NULL, 200000.00, NULL, NULL, '2021-02-04 16:19:13', '2021-02-04 16:19:13'),
(7, 'book', NULL, NULL, 200000.00, NULL, NULL, '2021-02-04 16:59:05', '2021-02-04 16:59:05'),
(8, 'book', NULL, NULL, 200000.00, NULL, NULL, '2021-02-04 17:45:16', '2021-02-04 17:45:16'),
(9, 'book', NULL, NULL, 200000.00, NULL, NULL, '2021-02-04 20:22:05', '2021-02-04 20:22:05'),
(10, 'book', NULL, NULL, 300000.00, NULL, NULL, '2021-02-04 20:29:24', '2021-02-04 20:29:24'),
(11, 'book', NULL, NULL, 41400.00, NULL, NULL, '2021-02-05 19:41:36', '2021-02-05 19:41:36'),
(12, 'book', NULL, NULL, 18300.00, NULL, NULL, '2021-02-08 14:22:38', '2021-02-08 14:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `nikolag_product_order`
--

CREATE TABLE `nikolag_product_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nikolag_product_order`
--

INSERT INTO `nikolag_product_order` (`id`, `product_id`, `order_id`, `quantity`) VALUES
(1, 1, '84', 1),
(2, 2, '86', 1),
(3, 3, '87', 1),
(4, 4, '88', 1),
(5, 5, '90', 1),
(6, 6, '91', 1),
(7, 7, '92', 1),
(8, 8, '93', 1),
(9, 9, '94', 1),
(10, 10, '95', 1),
(11, 11, '96', 1),
(12, 12, '97', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nikolag_taxes`
--

CREATE TABLE `nikolag_taxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` double(8,2) NOT NULL,
  `reference_id` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nikolag_transactions`
--

CREATE TABLE `nikolag_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_service_type` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchant_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nikolag_transactions`
--

INSERT INTO `nikolag_transactions` (`id`, `status`, `amount`, `currency`, `customer_id`, `payment_service_id`, `payment_service_type`, `merchant_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'PAID', '200000', 'USD', NULL, '5aFd3HXsCmfxR7AngH9HXnqgtrXZY', 'square', NULL, '88', '2021-02-03 21:00:46', '2021-02-03 21:00:48'),
(2, 'PAID', '200000', 'USD', NULL, '7JQlyfNw9WuZoyJbkHnHDCzeo1QZY', 'square', NULL, '90', '2021-02-04 16:16:29', '2021-02-04 16:16:31'),
(3, 'PAID', '200000', 'USD', NULL, 'RA6no2st3z988pueQT93FwDTGrQZY', 'square', NULL, '91', '2021-02-04 16:19:17', '2021-02-04 16:19:18'),
(4, 'PAID', '200000', 'USD', NULL, 'rZMzJt1w2Cqs1tT8o5LEF7o8VySZY', 'square', NULL, '92', '2021-02-04 16:59:08', '2021-02-04 16:59:10'),
(5, 'PAID', '200000', 'USD', NULL, 'NOetM60kuHqddvNUR5AhCnDk4gbZY', 'square', NULL, '93', '2021-02-04 17:45:20', '2021-02-04 17:45:22'),
(6, 'PAID', '200000', 'USD', NULL, 'FUnp7bq280kNoAO7l5wuIZj7FQYZY', 'square', NULL, '94', '2021-02-04 20:22:06', '2021-02-04 20:22:07'),
(7, 'PAID', '300000', 'USD', NULL, 'nxb60TMTGPRPXkUffhO5pvwMu7fZY', 'square', NULL, '95', '2021-02-04 20:29:24', '2021-02-04 20:29:25'),
(8, 'PAID', '41400', 'USD', NULL, 'rF0SWYE0ZdoGHQDOB7p3qN7EQeEZY', 'square', NULL, '96', '2021-02-05 19:41:36', '2021-02-05 19:41:37'),
(9, 'PAID', '18300', 'USD', NULL, 'L1O5VL7Afd2EohnLqRe1wKmO5daZY', 'square', NULL, '97', '2021-02-08 14:22:39', '2021-02-08 14:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` bigint(20) NOT NULL,
  `reciever_id` bigint(20) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_name`, `sender_id`, `reciever_id`, `message`, `type`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 'khalid', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-21 18:23:07', '2021-01-05 22:41:32'),
(2, 'khalid', 46, 1, 'New Order', 'order', NULL, '2020-12-21 19:03:18', '2020-12-21 19:03:18'),
(3, 'khalid', 46, 1, 'New Order', 'order', NULL, '2020-12-22 23:22:52', '2020-12-22 23:22:52'),
(4, 'khalid', 46, 2, 'New Order', 'order', NULL, '2020-12-23 15:41:18', '2020-12-23 15:41:18'),
(5, 'khalid', 46, 1, 'New Order', 'order', NULL, '2020-12-23 15:45:25', '2020-12-23 15:45:25'),
(6, 'khalid', 46, 5, 'New Order', 'order', NULL, '2020-12-23 15:47:33', '2020-12-23 15:47:33'),
(7, 'khalid', 46, 6, 'New Order', 'order', NULL, '2020-12-23 15:47:33', '2020-12-23 15:47:33'),
(8, 'khalid', 46, 7, 'New Order', 'order', NULL, '2020-12-23 15:47:34', '2020-12-23 15:47:34'),
(9, 'khalid', 46, 1, 'New Order', 'order', NULL, '2020-12-23 15:58:17', '2020-12-23 15:58:17'),
(10, 'khalid', 46, 2, 'New Order', 'order', NULL, '2020-12-23 15:58:17', '2020-12-23 15:58:17'),
(11, 'khalid', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-23 16:11:24', '2021-01-05 22:41:32'),
(12, 'khalid', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-23 16:55:16', '2021-01-05 22:41:32'),
(13, 'khalid', 46, 2, 'New Order', 'order', NULL, '2020-12-24 20:48:26', '2020-12-24 20:48:26'),
(14, 'khalid', 46, 4, 'New Order', 'order', NULL, '2020-12-24 20:53:12', '2020-12-24 20:53:12'),
(15, 'khalid', 46, 2, 'New Order', 'order', NULL, '2020-12-24 20:55:15', '2020-12-24 20:55:15'),
(16, 'khalid', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-24 21:00:36', '2021-01-05 22:41:32'),
(17, 'khalid', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-24 21:29:15', '2021-01-05 22:41:32'),
(18, 'khalid', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-24 21:32:02', '2021-01-05 22:41:32'),
(19, 'khalid', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-24 21:34:41', '2021-01-05 22:41:32'),
(20, 'khalid', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-24 21:37:42', '2021-01-05 22:41:32'),
(21, 'khalid', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-24 22:13:58', '2021-01-05 22:41:32'),
(22, 'khalid', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-24 22:22:12', '2021-01-05 22:41:32'),
(23, 'khalid', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-24 22:43:57', '2021-01-05 22:41:32'),
(24, 'haris', 53, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-28 23:36:52', '2021-01-05 22:41:32'),
(25, 'haris', 53, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-28 23:44:02', '2021-01-05 22:41:32'),
(26, 'haris', 53, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-28 23:47:06', '2021-01-05 22:41:32'),
(27, 'Muhammad imran', 55, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-29 14:56:40', '2021-01-05 22:41:32'),
(28, 'Shah G', 56, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-29 16:04:19', '2021-01-05 22:41:32'),
(29, 'khalid', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-29 17:57:47', '2021-01-05 22:41:32'),
(30, 'Muhammad imran', 55, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2020-12-29 18:52:56', '2021-01-05 22:41:32'),
(31, 'khalid', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2021-01-01 22:15:59', '2021-01-05 22:41:32'),
(32, 'khalu', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2021-01-05 15:51:06', '2021-01-05 22:41:32'),
(33, 'khalu', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2021-01-05 16:17:27', '2021-01-05 22:41:32'),
(34, 'khalu', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2021-01-05 17:05:19', '2021-01-05 22:41:32'),
(35, 'khalu', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2021-01-05 17:37:25', '2021-01-05 22:41:32'),
(36, 'khalu', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2021-01-05 17:39:55', '2021-01-05 22:41:32'),
(37, 'khalu', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2021-01-05 17:49:08', '2021-01-05 22:41:32'),
(38, 'khalu', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2021-01-05 18:17:08', '2021-01-05 22:41:32'),
(39, 'khalu', 46, 28, 'New Order', 'order', NULL, '2021-01-05 18:17:09', '2021-01-05 18:17:09'),
(40, 'khalu', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2021-01-05 18:56:31', '2021-01-05 22:41:32'),
(41, 'khalu', 46, 28, 'New Order', 'order', NULL, '2021-01-05 18:56:42', '2021-01-05 18:56:42'),
(42, 'khalu', 46, 15, 'New Order', 'order', '2021-01-05 14:41:32', '2021-01-05 19:06:36', '2021-01-05 22:41:32'),
(43, 'khalu', 46, 28, 'New Order', 'order', NULL, '2021-01-05 19:06:37', '2021-01-05 19:06:37'),
(44, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-01-22 00:21:48', '2021-01-22 00:21:48'),
(45, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-01-22 00:23:59', '2021-01-22 00:23:59'),
(46, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-01-22 00:37:31', '2021-01-22 00:37:31'),
(47, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-01-22 17:18:39', '2021-01-22 17:18:39'),
(48, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-01-22 19:23:07', '2021-01-22 19:23:07'),
(49, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-01-22 19:29:21', '2021-01-22 19:29:21'),
(50, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-01-22 23:49:09', '2021-01-22 23:49:09'),
(51, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-01-23 18:36:50', '2021-01-23 18:36:50'),
(52, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-02-03 21:00:48', '2021-02-03 21:00:48'),
(53, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-02-04 16:16:31', '2021-02-04 16:16:31'),
(54, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-02-04 16:19:19', '2021-02-04 16:19:19'),
(55, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-02-04 16:59:10', '2021-02-04 16:59:10'),
(56, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-02-04 17:45:22', '2021-02-04 17:45:22'),
(57, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-02-04 20:22:07', '2021-02-04 20:22:07'),
(58, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-02-04 20:29:25', '2021-02-04 20:29:25'),
(59, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-02-05 19:41:37', '2021-02-05 19:41:37'),
(60, 'raheel', 60, 15, 'New Order', 'order', NULL, '2021-02-08 14:22:40', '2021-02-08 14:22:40'),
(61, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-03-25 03:06:43', '2021-03-25 03:06:43'),
(62, 'khalu', 46, 15, 'New Order', 'order', NULL, '2021-03-25 03:13:08', '2021-03-25 03:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `total` double DEFAULT NULL,
  `amount` bigint(20) NOT NULL,
  `status` bigint(20) NOT NULL,
  `payment_service_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_id`, `total`, `amount`, `status`, `payment_service_type`, `payment_service_id`, `created_at`, `updated_at`) VALUES
(1, 3, 0, 216600, 1, NULL, NULL, '2020-12-11 23:44:09', '2020-12-11 23:44:09'),
(2, 3, 0, 216600, 1, NULL, NULL, '2020-12-11 23:59:55', '2020-12-11 23:59:55'),
(3, 3, 0, 125500, 1, NULL, NULL, '2020-12-12 15:23:59', '2020-12-12 15:23:59'),
(4, 3, 0, 125500, 1, NULL, NULL, '2020-12-12 15:31:39', '2020-12-12 15:31:39'),
(5, 3, 0, 125500, 1, NULL, NULL, '2020-12-12 15:36:20', '2020-12-12 15:36:20'),
(6, 3, 0, 1400, 1, NULL, NULL, '2020-12-12 18:19:10', '2020-12-12 18:19:10'),
(7, 49, 0, 10520, 1, NULL, NULL, '2020-12-12 21:57:32', '2020-12-12 21:57:32'),
(8, 46, 0, 1255, 1, NULL, NULL, '2020-12-16 00:12:27', '2020-12-16 00:12:27'),
(9, 46, 0, 1035, 1, NULL, NULL, '2020-12-16 15:49:18', '2020-12-16 15:49:18'),
(10, 46, 0, 1304, 1, NULL, NULL, '2020-12-16 18:50:03', '2020-12-16 18:50:03'),
(11, 52, 0, 931, 1, NULL, NULL, '2020-12-18 20:56:56', '2020-12-18 20:56:56'),
(12, 46, 0, 1129, 1, NULL, NULL, '2020-12-21 18:23:06', '2020-12-21 18:23:06'),
(13, 46, 0, 1129, 1, NULL, NULL, '2020-12-21 19:03:18', '2020-12-21 19:03:18'),
(14, 46, 0, 1129, 1, NULL, NULL, '2020-12-22 23:22:52', '2020-12-22 23:22:52'),
(15, 46, 0, 828, 1, NULL, NULL, '2020-12-23 15:41:17', '2020-12-23 15:41:17'),
(16, 46, 0, 1129, 1, NULL, NULL, '2020-12-23 15:45:24', '2020-12-23 15:45:24'),
(17, 46, 0, 555, 1, NULL, NULL, '2020-12-23 15:47:32', '2020-12-23 15:47:32'),
(18, 46, 0, 1957, 1, NULL, NULL, '2020-12-23 15:58:15', '2020-12-23 15:58:15'),
(19, 46, 0, 1957, 1, NULL, NULL, '2020-12-23 16:11:23', '2020-12-23 16:11:23'),
(20, 46, 0, 1129, 1, NULL, NULL, '2020-12-23 16:55:16', '2020-12-23 16:55:16'),
(21, 46, 0, 828, 1, NULL, NULL, '2020-12-24 20:48:25', '2020-12-24 20:48:25'),
(22, 46, 0, 384, 1, NULL, NULL, '2020-12-24 20:53:11', '2020-12-24 20:53:11'),
(23, 46, 0, 828, 1, NULL, NULL, '2020-12-24 20:55:14', '2020-12-24 20:55:14'),
(24, 46, 0, 1129, 1, NULL, NULL, '2020-12-24 21:00:36', '2020-12-24 21:00:36'),
(25, 46, 0, 1129, 1, NULL, NULL, '2020-12-24 21:29:15', '2020-12-24 21:29:15'),
(26, 46, 0, 1129, 1, NULL, NULL, '2020-12-24 21:32:02', '2020-12-24 21:32:02'),
(27, 46, 0, 1129, 1, NULL, NULL, '2020-12-24 21:34:41', '2020-12-24 21:34:41'),
(28, 46, 0, 1129, 1, NULL, NULL, '2020-12-24 21:37:42', '2020-12-24 21:37:42'),
(29, 46, 0, 1130, 1, NULL, NULL, '2020-12-24 22:13:57', '2020-12-24 22:13:57'),
(30, 46, 0, 0, 1, NULL, NULL, '2020-12-24 22:14:53', '2020-12-24 22:14:53'),
(31, 46, 0, 0, 1, NULL, NULL, '2020-12-24 22:16:31', '2020-12-24 22:16:31'),
(32, 46, 0, 1130, 1, NULL, NULL, '2020-12-24 22:22:11', '2020-12-24 22:22:11'),
(33, 46, 0, 1129, 1, NULL, NULL, '2020-12-24 22:43:57', '2020-12-24 22:43:57'),
(34, 53, 0, 1129, 1, NULL, NULL, '2020-12-28 23:36:52', '2020-12-28 23:36:52'),
(35, 53, 0, 1129, 1, NULL, NULL, '2020-12-28 23:44:02', '2020-12-28 23:44:02'),
(36, 53, 0, 1129, 1, NULL, NULL, '2020-12-28 23:47:06', '2020-12-28 23:47:06'),
(37, 55, 0, 600, 1, NULL, NULL, '2020-12-29 14:56:40', '2020-12-29 14:56:40'),
(38, 56, 0, 1718, 1, NULL, NULL, '2020-12-29 16:04:19', '2020-12-29 16:04:19'),
(39, 46, 0, 1129, 1, NULL, NULL, '2020-12-29 17:57:47', '2020-12-29 17:57:47'),
(40, 55, 0, 2546, 1, NULL, NULL, '2020-12-29 18:52:56', '2020-12-29 18:52:56'),
(41, 46, 0, 1129, 1, NULL, NULL, '2021-01-01 22:15:59', '2021-01-01 22:15:59'),
(42, 46, 0, 3600, 1, NULL, NULL, '2021-01-05 04:03:38', '2021-01-05 04:03:38'),
(43, 46, 0, 3600, 1, NULL, NULL, '2021-01-05 04:08:01', '2021-01-05 04:08:01'),
(44, 46, 0, 3600, 1, NULL, NULL, '2021-01-05 04:12:37', '2021-01-05 04:12:37'),
(45, 46, 0, 3600, 1, NULL, NULL, '2021-01-05 15:36:33', '2021-01-05 15:36:33'),
(46, 46, 0, 4500, 1, NULL, NULL, '2021-01-05 15:38:59', '2021-01-05 15:38:59'),
(47, 46, 0, 540, 1, NULL, NULL, '2021-01-05 15:44:27', '2021-01-05 15:44:27'),
(48, 46, 0, 4500, 1, NULL, NULL, '2021-01-05 15:51:05', '2021-01-05 15:51:05'),
(49, 46, 0, 540, 1, NULL, NULL, '2021-01-05 15:58:38', '2021-01-05 15:58:38'),
(50, 46, 0, 1600, 1, NULL, NULL, '2021-01-05 16:02:19', '2021-01-05 16:02:19'),
(51, 46, 0, 1600, 1, NULL, NULL, '2021-01-05 16:13:06', '2021-01-05 16:13:06'),
(52, 46, 0, 1600, 1, NULL, NULL, '2021-01-05 16:17:26', '2021-01-05 16:17:26'),
(53, 46, 0, 1800, 1, NULL, NULL, '2021-01-05 16:24:02', '2021-01-05 16:24:02'),
(54, 46, 0, 1800, 1, NULL, NULL, '2021-01-05 17:05:19', '2021-01-05 17:05:19'),
(55, 46, 0, 1800, 1, NULL, NULL, '2021-01-05 17:37:24', '2021-01-05 17:37:24'),
(56, 46, 0, 1600, 1, NULL, NULL, '2021-01-05 17:39:55', '2021-01-05 17:39:55'),
(57, 46, 0, 4500, 1, NULL, NULL, '2021-01-05 17:49:07', '2021-01-05 17:49:07'),
(58, 46, 0, 5031, 1, NULL, NULL, '2021-01-05 18:17:06', '2021-01-05 18:17:06'),
(59, 46, 0, 5931, 1, NULL, NULL, '2021-01-05 18:56:13', '2021-01-05 18:56:13'),
(60, 46, 0, 2331, 1, NULL, NULL, '2021-01-05 19:06:35', '2021-01-05 19:06:35'),
(61, 46, 0, 1600, 1, NULL, NULL, '2021-01-22 00:21:48', '2021-01-22 00:21:48'),
(62, 46, 0, 2700, 1, NULL, NULL, '2021-01-22 00:23:59', '2021-01-22 00:23:59'),
(63, 46, 0, 36, 1, NULL, NULL, '2021-01-22 00:37:31', '2021-01-22 00:37:31'),
(64, 46, 0, 36, 1, NULL, NULL, '2021-01-22 17:18:39', '2021-01-22 17:18:39'),
(65, 46, 0, 1600, 1, NULL, NULL, '2021-01-22 19:23:06', '2021-01-22 19:23:06'),
(66, 46, 0, 36, 1, NULL, NULL, '2021-01-22 19:29:21', '2021-01-22 19:29:21'),
(67, 46, 0, 1600, 1, NULL, NULL, '2021-01-22 23:49:09', '2021-01-22 23:49:09'),
(68, 46, 0, 36, 1, NULL, NULL, '2021-01-23 18:36:50', '2021-01-23 18:36:50'),
(69, 46, 0, 20, 1, NULL, NULL, '2021-02-03 20:23:35', '2021-02-03 20:23:35'),
(70, 46, 0, 20, 1, NULL, NULL, '2021-02-03 20:24:51', '2021-02-03 20:24:51'),
(71, 46, 0, 20, 1, NULL, NULL, '2021-02-03 20:25:18', '2021-02-03 20:25:18'),
(72, 46, 0, 2000, 1, NULL, NULL, '2021-02-03 20:26:07', '2021-02-03 20:26:07'),
(73, 46, 0, 200000, 1, NULL, NULL, '2021-02-03 20:27:44', '2021-02-03 20:27:44'),
(74, 46, 0, 200000, 1, NULL, NULL, '2021-02-03 20:28:31', '2021-02-03 20:28:31'),
(75, 46, 200000, 200000, 1, NULL, NULL, '2021-02-03 20:38:04', '2021-02-03 20:38:04'),
(76, 46, 200000, 200000, 1, NULL, NULL, '2021-02-03 20:39:51', '2021-02-03 20:39:51'),
(77, 46, 200000, 200000, 1, NULL, NULL, '2021-02-03 20:44:32', '2021-02-03 20:44:32'),
(78, 46, 100, 200000, 1, NULL, NULL, '2021-02-03 20:44:50', '2021-02-03 20:44:50'),
(79, 46, 200000, 200000, 1, NULL, NULL, '2021-02-03 20:45:35', '2021-02-03 20:45:35'),
(80, 46, 200000, 200000, 1, NULL, NULL, '2021-02-03 20:46:12', '2021-02-03 20:46:12'),
(81, 46, 200000, 200000, 1, NULL, NULL, '2021-02-03 20:53:45', '2021-02-03 20:53:45'),
(82, 46, 200000, 200000, 1, NULL, NULL, '2021-02-03 20:54:37', '2021-02-03 20:54:37'),
(83, 46, 200000, 200000, 1, 'square', NULL, '2021-02-03 20:55:05', '2021-02-03 20:55:06'),
(84, 46, 200000, 200000, 1, 'square', NULL, '2021-02-03 20:55:41', '2021-02-03 20:55:42'),
(85, 46, 200000, 200000, 1, 'square', NULL, '2021-02-03 20:57:29', '2021-02-03 20:57:32'),
(86, 46, 200000, 200000, 1, 'square', NULL, '2021-02-03 20:58:42', '2021-02-03 20:58:44'),
(87, 46, 200000, 200000, 1, 'square', NULL, '2021-02-03 20:59:51', '2021-02-03 20:59:52'),
(88, 46, 2000, 200000, 1, 'square', 'yBVckdcRLt77CEZHyW5U9BM0mVNZY', '2021-02-03 21:00:39', '2021-02-03 21:00:48'),
(89, 46, 0, 0, 1, 'square', NULL, '2021-02-04 16:14:55', '2021-02-04 16:14:56'),
(90, 46, 2000, 200000, 1, 'square', 'aZZBUmKjbSOy7T8lykTC3urFo4bZY', '2021-02-04 16:16:23', '2021-02-04 16:16:31'),
(91, 46, 2000, 200000, 1, 'square', 'gkl92zCOfh72KWsZ9lqMdFB5VKBZY', '2021-02-04 16:19:11', '2021-02-04 16:19:19'),
(92, 46, 2000, 200000, 1, 'square', 'ix7DR30mYJbsfcstkHy6nGvUPrSZY', '2021-02-04 16:59:02', '2021-02-04 16:59:10'),
(93, 46, 2000, 200000, 1, 'square', '4uUH1ak5i7c0o5eerAsA1hCkVHMZY', '2021-02-04 17:45:14', '2021-02-04 17:45:22'),
(94, 46, 2000, 200000, 1, 'square', 'OnNopup7wYS8k2lxtVLpeAOKl7YZY', '2021-02-04 20:22:05', '2021-02-04 20:22:07'),
(95, 46, 3000, 300000, 1, 'square', 'mrNqlEx3gsCA5rDa0FpALGbO9LLZY', '2021-02-04 20:29:24', '2021-02-04 20:29:25'),
(96, 46, 414, 41400, 1, 'square', 'CDIHozZMXWlYL7Uit4EQ9FnDjDUZY', '2021-02-05 19:41:36', '2021-02-05 19:41:37'),
(97, 60, 183, 18300, 1, 'square', 'OzNNLf86YsP2yBDoBPLrPeKurUIZY', '2021-02-08 14:22:38', '2021-02-08 14:22:40'),
(98, 46, NULL, 1350, 1, NULL, NULL, '2021-03-25 03:06:42', '2021-03-25 03:06:42'),
(99, 46, NULL, 1350, 1, NULL, NULL, '2021-03-25 03:13:08', '2021-03-25 03:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `discount` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `book_id`, `qty`, `discount`, `price`, `created_at`, `updated_at`) VALUES
(91, 99, 21, 1, 10, 1500, '2021-03-25 03:13:08', '2021-03-25 03:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('haris@gmail.com', 'dOqhsizdbfP3ZJQIuKcLNkEX7mTnNcPlwQcAhDuxh0gnpbVlanXXfOr0IKxq', '2020-11-30 15:58:13'),
('tyfajomy@mailinator.com', 'vT7kKr62ZAAE3S6XmzOFbeMST3ObyvAShMurvv7yxrVpVAzBlQnuJHaa7LN2', '2020-12-12 21:11:04'),
('imran78098@gmail.com', 'Y15xoUF8t6ghQvUlvHk1ynuEtmJEfKitrZCGODYwluznTe9rTgsYjyToVJkF', '2020-12-12 21:19:41'),
('imran78098@gmail.com', 'X5f2ncg99rju7hMMOzS4rEzCujo8z3PavLAguMQFCm2Ron29WwP4LPxmtUpU', '2020-12-12 21:39:24'),
('haris@gmail.com', 'P2MnzpFpcyIv2viNoUi49nj32hoKIWkr5Ddc5o04IggK3d3NvzPSJr9i1F1c', '2020-12-14 15:36:35'),
('harisahmedshaikh12@gmail.com', 'QauSKoB8mO72ipZ4I1GTarM3eBi3S1YqZPj67MZ43v12TXvz0z7kGx1dlCGP', '2020-12-26 16:58:00'),
('harisahmedshaikh12@gmail.com', 'nFKnJwlyqZaARD4IEFOLIJroRMvmOaQbnpLmzCVA9Y8R0cwRHvAHF7hCYcbZ', '2020-12-28 20:15:05'),
('harisahmedshaikh12@gmail.com', 'Vecoa3n6OBl2DNNVfRP3dn0qvqnhpEWglgNytdkldQ5Ucu4V0XewlfmWjkwg', '2020-12-28 20:18:39'),
('harisahmedshaikh12@gmail.com', 'Lu7JRmb00tlO2Yw1aVfDRubTLQ1Gj4Uo7J0Z3NbfcDXvv6TEuTXkoe2uzaGs', '2020-12-28 20:28:31'),
('harisahmedshaikh12@gmail.com', 'NDlLflDf6QropH2QFvEXpLE4AVwaBdG3aoK8Ap3FQjvqCEe4mQkJfQj1JaJ1', '2020-12-28 20:32:44'),
('harisahmedshaikh12@gmail.com', 'b5U8hawXeWoLR2VjJn5OUbKfku9epWLoxGHqCje8RMSuU3uuIj0kkKDwC2Zo', '2020-12-28 20:38:45'),
('harisahmedshaikh12@gmail.com', 'DTQYBnlvKeaLTibvAsPLc3IyDgKzTEiVqKuFemlHo4aVHBF0BR4IgYKXreSW', '2020-12-28 20:40:13'),
('harisahmedshaikh12@gmail.com', 'tLdjgB14M0e6eYqmgjRbzhBc8l9H1sWBtOtiC0iAAuW466qbrTLUR637Iz2e', '2020-12-28 20:42:48'),
('shabih_haider1@outlook.com', 'sI9hkxlhoW5PIG3I3i89kBxl7m5ljHU8gsTnn3PGPDUmEr2HFcNAtQ6OpU7X', '2020-12-28 23:30:09'),
('shah020492@gmail.com', 'd9FwoG2JNmhadwwvRSxUS39oXN4SdnHqxWNj2UBfndNOL5hR2qxzij0rh19i', '2020-12-29 14:13:31'),
('shah020492@gmail.com', '2FB2XBQuK0WiBBNUXn1gIFBYU7B41GeaJEmiPOQBfQ3OFQSuJLbxpP4t7vBM', '2020-12-29 14:20:19'),
('john@gmail.com', '4hXlUjcnA0yG61YG1cOx3DOuNOqfIzvZFUuNKFuoJ6jKpTj9SW63tyuru1Mq', '2021-01-02 17:17:12'),
('nfshaider512@gmail.com', 'ESvZyWJEPIYPuxbVTII3fANSwxdK51sifN3sajB3w7gWS1XckiuonRfz8Qo7', '2021-01-02 17:17:54'),
('nfs@gmail.com', 'z5OvgZtS9MyTimMjaCOG03picDDAfLQmxmHWnVGbIwz4PzQAo9NPtXGQJap7', '2021-01-05 21:59:46'),
('raheelqazi326@gmail.com', 'IdPy0rsg8iF53leav8Sa8JhkHPz9236MhEBMHlHAtL0kQxbrLFWRRctP0xkr', '2021-02-08 14:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promotioncode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `discount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `promotioncode`, `startdate`, `enddate`, `discount`, `created_at`, `updated_at`) VALUES
(4, '1234As@', '2020-12-18', '2020-12-25', 10, '2021-01-02 20:18:52', '2021-01-02 20:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `company`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad ali jinnah', 'Spectrum Publishers shabih', '2020-12-01 21:10:32', '2021-03-06 02:28:58'),
(2, 'Muhammad umair khan', 'Paramount book', '2020-12-01 21:10:55', '2020-12-01 21:10:55'),
(3, 'Amir Ali Nawaz', 'Mughal Books', '2020-12-02 00:15:32', '2020-12-02 00:15:32'),
(5, 'imran', 'hnh', '2020-12-09 18:14:58', '2020-12-09 18:14:58'),
(6, 'Imran Book Depot', 'Imran Hnh', '2020-12-09 18:45:23', '2020-12-09 18:45:23'),
(7, 'Haider', 'Hnhtech', '2020-12-09 18:50:34', '2021-01-02 20:12:36'),
(13, 'Test Publisher', 'Test Company', '2020-12-26 18:23:43', '2020-12-26 18:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `book_id`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 13, 4, 1, '2020-12-01 20:26:53', '2020-12-01 20:26:53'),
(2, 3, 1, 5, 1, '2020-12-02 21:37:33', '2020-12-02 21:37:33'),
(3, 2, 1, 1, 1, '2020-12-02 21:38:50', '2020-12-02 21:38:50'),
(4, 4, 1, 2, 1, '2020-12-02 21:40:20', '2020-12-02 21:40:20'),
(5, 5, 1, 3, 1, '2020-12-02 21:43:07', '2020-12-02 21:43:07'),
(6, 46, 1, 5, 1, '2020-12-16 21:19:09', '2020-12-16 21:24:28'),
(7, 53, 1, 5, 1, '2020-12-28 23:53:28', '2020-12-28 23:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `rating_tables`
--

CREATE TABLE `rating_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subheading` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `heading`, `subheading`, `description`, `file`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Mollit qui modi vel', 'Qui et dolore doloru', 'Ullamco est quaerat', '5ff46cdc4c6f8_1609854172.jpg', 'active', '2020-12-18 21:43:38', '2021-01-05 21:42:52'),
(3, 'Maxime aut aut repre', 'Nulla sint laborios', 'Ratione ut consectet', '5fe70494d68a7_1608975508.jpg', 'active', '2020-12-26 17:38:28', '2020-12-26 17:38:28'),
(5, 'Stars', 'starss', 'astronomy', '5ff46ceec5518_1609854190.png', 'active', '2021-01-02 20:08:49', '2021-01-07 23:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `store_information`
--

CREATE TABLE `store_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `store_information`
--

INSERT INTO `store_information` (`id`, `email`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(7, 'hodebifa@mailinator.co', '+1 (462) 363-474', 'Dolor perferendis', 'yes', '2020-12-18 19:13:57', '2020-12-18 19:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(20, 17, 'Cloths', '2021-03-23 02:01:52', '2021-03-23 02:01:52');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `term` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `term`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.', '2020-12-14 20:48:30', '2020-12-18 19:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'E-Commerce', '2021-03-09 15:37:27', '2021-03-23 02:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `social_id`, `social_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Haris', 'haris@gmail.com', NULL, '$2y$10$YN/hSJg17e.p02GpQGMcrOAm39Y.yQ0jPjtPGCjSBlBfI.c9/OxU2', '', '', NULL, '2020-11-21 16:02:55', '2020-11-24 15:49:24'),
(2, 'Haris', 'harisahmed@gmail.com', NULL, '$2y$10$byoltS8Km6PSW/zGdbUgCewOoZU9CtPDyXeVr9aDusLYA9wLa/wwO', '', '', NULL, '2020-11-24 15:53:43', '2020-11-24 15:56:02'),
(3, 'khalid', 'khalid@gmail.com', NULL, '$2y$10$HqGKLCIY0bRuo6ZFZ8Zt6.kkhdoW6Qbm2ubIyjypWkcv.M6TML8NC', '', '', NULL, '2020-11-24 18:08:10', '2020-11-24 20:27:55'),
(4, 'Hariss Ahmed', 'haris2@gmail.com', NULL, '$2y$10$lRURZDMCeHGfvid/uDDwQeYUWEDeFerz.p7gGqz8rcmGP70NQplC6', '', '', NULL, '2020-11-24 22:10:58', '2020-11-24 22:10:58'),
(5, 'Haris Ahmed', 'haris1@gmail.com', NULL, '$2y$10$NCQNwPZjwRiWpWPKakNoo.fYVeRa844OhG4OTBbSyFP7/vijcoKtu', '', '', NULL, '2020-11-24 22:11:19', '2020-11-24 22:11:19'),
(41, 'Haris Ahmed', 'haris_shaikh@live.com', NULL, NULL, '3485280081588014', 'facebook', NULL, '2020-12-07 15:45:34', '2020-12-07 15:45:34'),
(43, 'Muhammad a imran', 'kokuty@mailinator.com', NULL, '$2y$10$v27/0EkumrIuCIfqTf1BYugjvlksovXwjreTG3iC6A1.r8sDhfC3.', NULL, NULL, '9Lxk5nZo4Mcj1zooPyVvMQzE5X3oDtgJwUdC8QuhSBtyXU8d2brHtOSReRMg', '2020-12-09 18:56:00', NULL),
(44, 'Leilani Tiger Carlson Gates', 'xyguxazaj@mailinator.com', NULL, '$2y$10$ae7LqTTbgcibSvZL80JAyOelMoO5Brr7tUjOiclnRFbENJm92y/.y', NULL, NULL, 'vdaQsBHmhdvfN2E0uEdhtE85agp31HXeb0Q8kq3n85SsPVZDAmkHC5aT3Uhc', '2020-12-09 19:31:49', NULL),
(45, 'Subhan Shah', 'emailforhnh@gmail.com', NULL, '$2y$10$iwrUmO7BPrJhiTYukjw8tOuFhgTqS08HO2VCsiAlSbX8Ub98spdcq', NULL, NULL, 'ESuRvHDOOFITvjQgqAmC4Rcx5DeU1oEH4wMkIGZZb5gsu5qSI2gqVUrbKLXW', '2020-12-11 01:11:18', NULL),
(46, 'khalu', 'meerkhalid482@gmail.com', '2020-12-11 20:45:40', '$2y$10$Aua5ndtzS8qa1dVq//ael.D8/MFpUwZhkPw4iwVki5j/lRUyDkaMu', NULL, NULL, 'jNCbEOmzHZERpZb3nTvhi6QSD40yGUcIcN4deFBHhcm6YqYuc7pt54GqaDAw', '2020-12-11 19:07:44', '2021-01-02 23:39:20'),
(47, 'Galena Drake Maggie Burke', 'tyfajomy@mailinator.com', NULL, '$2y$10$1c9CUkY6hHPhDtLisyYWWeBkZRtYem7hMMhZUviMYt7RxPpCzg3Pe', NULL, NULL, 'vT7kKr62ZAAE3S6XmzOFbeMST3ObyvAShMurvv7yxrVpVAzBlQnuJHaa7LN2', '2020-12-12 21:11:04', NULL),
(49, 'imran78098@gmail.com', 'imran78098@gmail.com', '2020-12-12 21:40:12', '$2y$10$13HtNb5eUShTfRpBwMwYHOJxstSSXPIzlku/25btYKkA6uMLaR1/2', NULL, NULL, 'X5f2ncg99rju7hMMOzS4rEzCujo8z3PavLAguMQFCm2Ron29WwP4LPxmtUpU', '2020-12-12 21:39:24', '2020-12-12 21:40:12'),
(52, 'Haris Ahmed', 'ha5840999@gmail.com', '2020-12-18 18:48:34', '$2y$10$w1/0m4QDQ.hRuvlsV9QpMudUT4rji/Xddad5TQ08VOScEi/8Fm7Bm', NULL, NULL, 'NngkN8gg6ia5GJRddQqqPkO3TqZAaKyTkS1WAZxcTEZ0Pxc24iiIr00E82C2', '2020-12-18 18:47:57', '2020-12-18 18:56:07'),
(53, 'haris', 'harisahmedshaikh12@gmail.com', '2020-12-26 15:36:41', '$2y$10$qcdbkybDxWF.Ys8WnZYi3Ox8mr8za1kY3rA6lWern6jJHm2NqCjQa', NULL, NULL, 'Vp4zJqWd3VovkMgORdFhQe7UjsW1cK8rf2n01hP2KhBrYpLeZgIhaywRvsfx', '2020-12-26 15:34:51', '2020-12-31 19:24:21'),
(54, 'shabih', 'shabih_haider1@outlook.com', NULL, '$2y$10$m/T19usMW1jZhcVx3.09nOhllRf5EJxVBu7sO07DS9bOV88JwMSHq', NULL, NULL, 'sI9hkxlhoW5PIG3I3i89kBxl7m5ljHU8gsTnn3PGPDUmEr2HFcNAtQ6OpU7X', '2020-12-28 23:30:09', NULL),
(55, 'Muhammad imran', 'imran129988@GMAIL.COM', '2020-12-29 14:16:26', '$2y$10$OEqLc.Xbuj.5s7h9shJNsuPUrqlN.AtIFfAQ1wQ.Gu9QC2dCgVbvG', NULL, NULL, 'pe52Sw7cE8NDMA5Ldb1FIwSvsTHXl8hfZRMK9Sj0OgZpoVqnNjADZ72Am6ZC', '2020-12-29 14:11:41', '2020-12-29 14:35:49'),
(56, 'Shah G', 'shah020492@gmail.com', '2020-12-29 14:14:51', '$2y$10$m0ptvIImq2foV9y2y/cYQObDNNLPahAkRg65wqoHVSXb/Cir3jsT6', NULL, NULL, 'QZOB3ER79RKQIJBFtXu97BZhg7eOyxuXsp7OTAeZKrQU7Sh1Rcn3UOxvoY72', '2020-12-29 14:13:31', '2020-12-29 14:37:06'),
(57, 'john', 'john@gmail.com', NULL, '$2y$10$IgbYH.4FDqPkqPUceLZ.hOVp1ZJQhmTLs95jo85Rv6aRwbeJ0D0Ty', NULL, NULL, '4hXlUjcnA0yG61YG1cOx3DOuNOqfIzvZFUuNKFuoJ6jKpTj9SW63tyuru1Mq', '2021-01-02 17:17:12', NULL),
(58, 'nafees', 'nfs12@gmail.com', '2021-01-02 17:20:13', '$2y$10$8XeMDSpOAoEDMQI3THuAFei02Zb7WXfCrS/zyOLd08nKcasZR9N.W', NULL, NULL, '3Jqh5D6r89n5BcAOCGlk4raXkPv43lW5Xea1kIyARO48k387kEijMKrVXbfc', '2021-01-02 17:17:54', '2021-01-05 22:01:51'),
(59, 'Nafees Haider', 'nfs@gmail.com', NULL, '$2y$10$8APjVN6cnL3RyZuZFp0Q8eOA/7XoN/HH/D8lEXcyqTXcmbjYQtknK', NULL, NULL, 'z5OvgZtS9MyTimMjaCOG03picDDAfLQmxmHWnVGbIwz4PzQAo9NPtXGQJap7', '2021-01-05 21:59:46', NULL),
(60, 'raheel', 'raheelqazi326@gmail.com', '2021-02-08 14:19:16', '$2y$10$5O885OyH1Ge9YfsPB1obp.LOlYEtTUSQr0AvLNTCGaNeE4HrQLQ4i', NULL, NULL, '3RKu84IhMb9tl32CnOYIYLAYoWtejfUN7wHHdzYSeJa4cIJmrlFEZQ55S7yu', '2021-02-08 14:16:38', '2021-02-08 14:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bios` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `role_id`, `firstname`, `lastname`, `shopname`, `email`, `password`, `phoneno`, `image`, `status`, `created_at`, `updated_at`, `bios`) VALUES
(9, 3, 'John', 'John', 'Dukankhkojh', 'john@gmail.com', '$2y$10$yggl.OuLgR7Jkl1QhFTorOYJ3XdgzU4B2elvU6rmf3n/zRZ7kVT16', '12345678', '1610696321men 3.jpg', 1, '2020-11-21 17:58:06', '2021-01-15 15:38:41', 'Hello there ...'),
(15, 3, 'Rashad Sheppard', 'Melyssa Lowery', 'Steel Hopkins', 'vendor@gmail.com', '$2y$10$iUipesOU4lmCOf/wk7ntOeQh1YyQ1v4ywJuCqmafYqcYtpXFmeoyW', '729834728', '1610695886men 1.jpg', 1, '2020-12-01 21:08:57', '2021-01-15 15:32:13', 'Hello  I have 5 year experience ...'),
(28, 3, 'Yuli Bender', 'Iola Gillespie', 'Jasper Love', 'vendor1@gmail.com', '$2y$10$2NAPsbf1HvCj9N038qmtJurJMs6aoiN5XqxNWnS9tyNZ4BE9evIwu', '123456789', '1610696133men 2.jpg', 1, '2021-01-05 18:10:12', '2021-01-15 15:35:33', 'Hello there...'),
(31, 3, 'Cadman Torres', 'Drew Duffy', 'Xantha Head', 'joy@gmail.com', '$2y$10$MKK.YdFMceu3AEjsSc42GO4utjSl/CIVPgvWqMHMBZNJCP4Rfaqh6', '1234567890', '161115060812.jpg', 1, '2021-01-20 21:50:08', '2021-01-20 21:50:08', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vendor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video`, `status`, `created_at`, `updated_at`, `vendor_id`) VALUES
(22, '1611140789video2.mp4', 1, '2021-01-20 19:06:29', '2021-01-20 19:06:29', 15),
(24, '1611143797yt1scom-study-whatsapp-status-videobooks-lovers-motivational-video_RxRhoFXc_IrWu.mp4', 1, '2021-01-20 19:56:37', '2021-01-20 19:56:37', 15),
(25, '1611144158study-whatsapp-status-video-for-book-lovers_4MgWRXl8_ELEP.mp4', 1, '2021-01-20 20:02:38', '2021-01-20 20:02:38', 15),
(26, '1611150852video2.mp4', 1, '2021-01-20 21:54:12', '2021-01-20 21:54:12', 31);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `vendor_id`, `total`, `created_at`, `updated_at`) VALUES
(3, 15, '4500', '2021-01-05 17:49:08', '2021-01-05 17:49:08'),
(4, 15, '5031', '2021-01-05 18:17:07', '2021-01-05 18:17:07'),
(5, 28, '5031', '2021-01-05 18:17:07', '2021-01-05 18:17:07'),
(6, 15, '5931', '2021-01-05 18:56:25', '2021-01-05 18:56:25'),
(7, 15, '5931', '2021-01-05 18:56:28', '2021-01-05 18:56:28'),
(8, 28, '5931', '2021-01-05 18:56:29', '2021-01-05 18:56:29'),
(9, 15, '2331', '2021-01-05 19:06:36', '2021-01-05 19:06:36'),
(10, 28, '2331', '2021-01-05 19:06:36', '2021-01-05 19:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `book_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `book_id`, `created_at`, `updated_at`) VALUES
(4, 3, 1, '2020-12-04 17:40:42', '2020-12-04 17:40:42'),
(6, 3, 4, '2020-12-04 18:58:07', '2020-12-04 18:58:07'),
(7, 3, 4, '2020-12-04 20:11:54', '2020-12-04 20:11:54'),
(8, 3, 5, '2020-12-04 22:03:31', '2020-12-04 22:03:31'),
(9, 3, 24, '2020-12-04 23:00:44', '2020-12-04 23:00:44'),
(10, 3, 4, '2020-12-05 15:18:54', '2020-12-05 15:18:54'),
(11, 3, 6, '2020-12-05 15:19:04', '2020-12-05 15:19:04'),
(12, 3, 1, '2020-12-07 18:26:03', '2020-12-07 18:26:03'),
(13, 3, 1, '2020-12-07 18:26:10', '2020-12-07 18:26:10'),
(14, 3, 4, '2020-12-07 19:04:23', '2020-12-07 19:04:23'),
(15, 3, 9, '2020-12-07 19:23:31', '2020-12-07 19:23:31'),
(16, 3, 18, '2020-12-07 20:42:13', '2020-12-07 20:42:13'),
(17, 3, 18, '2020-12-07 23:32:20', '2020-12-07 23:32:20'),
(18, 3, 4, '2020-12-07 23:33:42', '2020-12-07 23:33:42'),
(19, 3, 6, '2020-12-07 23:33:46', '2020-12-07 23:33:46'),
(20, 3, 8, '2020-12-07 23:33:49', '2020-12-07 23:33:49'),
(21, 3, 4, '2020-12-09 16:13:19', '2020-12-09 16:13:19'),
(22, 3, 1, '2020-12-09 17:46:17', '2020-12-09 17:46:17'),
(23, 3, 1, '2020-12-09 17:52:07', '2020-12-09 17:52:07'),
(24, 3, 4, '2020-12-09 18:34:37', '2020-12-09 18:34:37'),
(25, 3, 4, '2020-12-09 18:34:39', '2020-12-09 18:34:39'),
(26, 43, 25, '2020-12-09 19:01:12', '2020-12-09 19:01:12'),
(28, 43, 25, '2020-12-09 19:01:37', '2020-12-09 19:01:37'),
(29, 43, 25, '2020-12-09 19:01:38', '2020-12-09 19:01:38'),
(30, 43, 25, '2020-12-09 19:01:38', '2020-12-09 19:01:38'),
(31, 43, 25, '2020-12-09 19:01:38', '2020-12-09 19:01:38'),
(32, 43, 25, '2020-12-09 19:01:39', '2020-12-09 19:01:39'),
(34, 49, 26, '2020-12-12 21:46:12', '2020-12-12 21:46:12'),
(35, 49, 26, '2020-12-12 21:46:17', '2020-12-12 21:46:17'),
(42, 55, 32, '2020-12-29 15:57:43', '2020-12-29 15:57:43'),
(43, 56, 17, '2020-12-29 16:58:13', '2020-12-29 16:58:13'),
(44, 55, 1, '2020-12-29 17:21:25', '2020-12-29 17:21:25'),
(48, 56, 32, '2020-12-29 19:26:46', '2020-12-29 19:26:46'),
(50, 56, 2, '2020-12-29 20:11:41', '2020-12-29 20:11:41'),
(51, 56, 4, '2020-12-29 20:11:44', '2020-12-29 20:11:44'),
(52, 56, 5, '2020-12-29 20:11:55', '2020-12-29 20:11:55'),
(54, 53, 4, '2020-12-29 21:02:14', '2020-12-29 21:02:14'),
(55, 53, 11, '2020-12-29 21:03:04', '2020-12-29 21:03:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutuses`
--
ALTER TABLE `aboutuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authorsses`
--
ALTER TABLE `authorsses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cookies`
--
ALTER TABLE `cookies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forgets`
--
ALTER TABLE `forgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nikolag_customers`
--
ALTER TABLE `nikolag_customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nikolag_customers_email_unique` (`email`),
  ADD UNIQUE KEY `pstype_psid` (`payment_service_type`,`payment_service_id`),
  ADD KEY `nikolag_customers_email_index` (`email`);

--
-- Indexes for table `nikolag_customer_user`
--
ALTER TABLE `nikolag_customer_user`
  ADD UNIQUE KEY `oid_cid` (`owner_id`,`customer_id`);

--
-- Indexes for table `nikolag_deductibles`
--
ALTER TABLE `nikolag_deductibles`
  ADD KEY `nikolag_deductibles_index` (`deductible_type`,`deductible_id`),
  ADD KEY `nikolag_featurables_index` (`featurable_type`,`featurable_id`);

--
-- Indexes for table `nikolag_discounts`
--
ALTER TABLE `nikolag_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nikolag_discounts_name_index` (`name`);

--
-- Indexes for table `nikolag_orders`
--
ALTER TABLE `nikolag_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nikolag_products`
--
ALTER TABLE `nikolag_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vname_name` (`name`,`variation_name`),
  ADD KEY `nikolag_products_name_index` (`name`),
  ADD KEY `nikolag_products_reference_id_index` (`reference_id`);

--
-- Indexes for table `nikolag_product_order`
--
ALTER TABLE `nikolag_product_order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prodid_ordid` (`product_id`,`order_id`);

--
-- Indexes for table `nikolag_taxes`
--
ALTER TABLE `nikolag_taxes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_type` (`name`,`type`),
  ADD KEY `nikolag_taxes_name_index` (`name`),
  ADD KEY `nikolag_taxes_type_index` (`type`);

--
-- Indexes for table `nikolag_transactions`
--
ALTER TABLE `nikolag_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nikolag_transactions_status_index` (`status`),
  ADD KEY `nikolag_transactions_payment_service_type_index` (`payment_service_type`),
  ADD KEY `cus_id` (`customer_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_tables`
--
ALTER TABLE `rating_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_information`
--
ALTER TABLE `store_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutuses`
--
ALTER TABLE `aboutuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `authorsses`
--
ALTER TABLE `authorsses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cookies`
--
ALTER TABLE `cookies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forgets`
--
ALTER TABLE `forgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `nikolag_customers`
--
ALTER TABLE `nikolag_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nikolag_discounts`
--
ALTER TABLE `nikolag_discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nikolag_orders`
--
ALTER TABLE `nikolag_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nikolag_products`
--
ALTER TABLE `nikolag_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nikolag_product_order`
--
ALTER TABLE `nikolag_product_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nikolag_taxes`
--
ALTER TABLE `nikolag_taxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nikolag_transactions`
--
ALTER TABLE `nikolag_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rating_tables`
--
ALTER TABLE `rating_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `store_information`
--
ALTER TABLE `store_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nikolag_product_order`
--
ALTER TABLE `nikolag_product_order`
  ADD CONSTRAINT `prod_id` FOREIGN KEY (`product_id`) REFERENCES `nikolag_products` (`id`);

--
-- Constraints for table `nikolag_transactions`
--
ALTER TABLE `nikolag_transactions`
  ADD CONSTRAINT `cus_id` FOREIGN KEY (`customer_id`) REFERENCES `nikolag_customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
