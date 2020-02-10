-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 03, 2019 at 06:05 AM
-- Server version: 10.2.15-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_laravel_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `remember_token`, `image`, `created_at`, `updated_at`) VALUES
(1, 'System', 'Admin', 'dhavalbharadva@gmail.com', 'admin', '$2y$10$dwEhwoB3HNjcSenfx17y7O5HLrtbbBM6o9Gw0qpD5/2u96i1r3Zh2', 'YgXyGTkSpE9A7wNXZxMHyj63aDIbNmAsGFKjo3QeomtjVWspop4nEEXih00E', 'admin.png', '2017-07-03 01:44:03', '2019-08-03 00:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double(11,2) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `service_id`, `full_name`, `email`, `phone`, `address`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'First user', 'first@user.com', '1234567', 'Rajkot', 300.00, 'confirm', '2017-07-27 07:46:40', '2017-08-18 07:12:52'),
(4, 1, 1, 'John Cena', 'john@cena.com', '9871234560', 'Rajkot', 75.25, 'cancel', '2017-08-04 13:17:54', '2017-09-14 08:16:11'),
(5, 1, 1, 'Justin Mehta', 'justin@gmail.com', '8521479630', 'Rajkot', 75.25, 'cancel', '2017-08-04 13:18:49', '2017-09-14 08:16:11'),
(6, 1, 5, 'Rahul Ghost', 'rahul@gmail.com', '7125896345', 'Rajkot', 120.00, 'cancel', '2017-08-04 13:19:49', '2017-09-14 08:23:16'),
(7, 1, 7, 'Mits Henry', 'mits@gmail.com', '7878123498', 'Uk', 150.00, 'cancel', '2017-08-04 13:53:16', '2017-09-14 08:13:58'),
(8, 1, 1, 'Tony Brown', 'tony@brown.com', '1234567', 'Rajkot from India,\\r\\n360004', 75.25, 'confirm', '2017-08-09 13:37:53', '2017-09-04 06:23:12'),
(9, 20, 1, 'First Patient', 'first@patient.com', '1234567890', '18, Navin Society,\\r\\nMain street,\\r\\nBoston MA,\\r\\nIndia', 225.75, 'pending', '2017-08-28 06:06:55', '2017-09-14 08:20:24'),
(10, 20, 1, 'First Patient', 'first@patient.com', '1234567890', '18, Navin Society,\\r\\nMain street,\\r\\nBoston MA,\\r\\nIndia', 225.75, 'cancel', '2017-08-28 06:16:54', '2017-09-14 08:20:25'),
(11, 20, 1, 'Mits Henry', 'mits@gmail.com', '1234567890', '18, Navin Society,\\r\\nMain street,\\r\\nNYC,\\r\\nUSA', 150.50, 'pending', '2017-08-28 08:07:21', '2017-09-14 08:13:58'),
(12, 20, 1, 'Mits Henry', 'mits@gmail.com', '1234567890', '21, Navin Society,\\r\\nMain street,\\r\\nCanada MA,\\r\\nFrance', 75.25, 'pending', '2017-08-28 08:12:45', '2017-09-14 07:23:41'),
(13, 20, 1, 'Mits Henry', 'mits@gmail.com', '123457890', '18, Navin Society,\\r\\nMela vali Main street,\\r\\nBoston MA,\\r\\nTarnetar', 150.50, 'confirm', '2017-08-28 08:14:19', '2017-09-04 08:18:20'),
(14, 20, 7, 'Sachin Tendulkar', 'sachin@gmail.com', '9871234567', 'India', 150.00, 'cancel', '2017-09-11 10:16:10', '2017-09-14 08:23:16'),
(15, 8, 1, 'Eight User', 'eight@user.com', '1234567890', '12/A, MG street, NY, USA', 75.25, 'confirm', '2017-09-12 12:02:17', '2017-09-14 07:05:20'),
(16, 20, 1, 'Dhaval User', 'dhaval@gmail.com', '12345820', '15/B, SG Street, Canada', 150.50, 'confirm', '2017-09-12 12:05:45', '2017-09-14 10:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_details`
--

CREATE TABLE `bookings_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings_details`
--

INSERT INTO `bookings_details` (`id`, `booking_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-07-30 12:00:00', '2017-07-30 12:30:00', '2017-07-27 07:46:40', '2017-07-27 07:46:40'),
(2, 1, '2017-07-30 14:00:00', '2017-07-30 14:30:00', '2017-07-27 07:46:40', '2017-07-27 07:46:40'),
(3, 1, '2017-07-30 16:00:00', '2017-07-30 16:30:00', '2017-07-27 07:46:40', '2017-07-27 07:46:40'),
(6, 4, '2017-09-06 04:30:00', '2017-09-06 05:00:00', '2017-08-04 13:17:54', '2017-08-04 13:17:54'),
(7, 5, '2017-08-16 05:00:00', '2017-08-16 05:30:00', '2017-08-04 13:18:50', '2017-08-04 13:18:50'),
(8, 6, '2017-08-21 08:30:00', '2017-08-21 10:30:00', '2017-08-04 13:19:49', '2017-08-04 13:19:49'),
(9, 7, '2017-08-22 06:30:00', '2017-08-22 07:30:00', '2017-08-04 13:53:16', '2017-08-04 13:53:16'),
(10, 8, '2017-08-10 04:30:00', '2017-08-10 05:00:00', '2017-08-09 13:37:53', '2017-08-09 13:37:53'),
(11, 9, '2017-09-01 05:30:00', '2017-09-01 06:00:00', '2017-08-28 06:06:55', '2017-08-28 06:06:55'),
(12, 9, '2017-09-01 06:30:00', '2017-09-01 07:00:00', '2017-08-28 06:06:55', '2017-08-28 06:06:55'),
(13, 9, '2017-09-01 12:00:00', '2017-09-01 12:30:00', '2017-08-28 06:06:55', '2017-08-28 06:06:55'),
(14, 10, '2017-08-31 04:30:00', '2017-08-31 05:00:00', '2017-08-28 06:16:54', '2017-08-28 06:16:54'),
(15, 10, '2017-08-31 05:30:00', '2017-08-31 06:00:00', '2017-08-28 06:16:54', '2017-08-28 06:16:54'),
(16, 10, '2017-08-31 06:00:00', '2017-08-31 06:30:00', '2017-08-28 06:16:54', '2017-08-28 06:16:54'),
(17, 11, '2017-09-06 05:30:00', '2017-09-06 06:00:00', '2017-08-28 08:07:21', '2017-08-28 08:07:21'),
(18, 11, '2017-09-06 06:30:00', '2017-09-06 07:00:00', '2017-08-28 08:07:21', '2017-08-28 08:07:21'),
(19, 12, '2017-08-29 04:30:00', '2017-08-29 05:00:00', '2017-08-28 08:12:45', '2017-08-28 08:12:45'),
(20, 13, '2017-08-29 06:30:00', '2017-08-29 07:00:00', '2017-08-28 08:14:19', '2017-08-28 08:14:19'),
(21, 13, '2017-08-29 07:30:00', '2017-08-29 08:00:00', '2017-08-28 08:14:19', '2017-08-28 08:14:19'),
(22, 14, '2017-09-13 06:30:00', '2017-09-13 07:30:00', '2017-09-11 10:16:10', '2017-09-11 10:16:10'),
(23, 15, '2017-09-13 04:30:00', '2017-09-13 05:00:00', '2017-09-12 12:02:17', '2017-09-12 12:02:17'),
(24, 16, '2017-09-13 05:30:00', '2017-09-13 06:00:00', '2017-09-12 12:05:45', '2017-09-12 12:05:45'),
(25, 16, '2017-09-13 06:30:00', '2017-09-13 07:00:00', '2017-09-12 12:05:45', '2017-09-12 12:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Australian dollar', 'AUD', '1', '2017-08-21 10:36:41', '2017-09-12 10:34:24'),
(2, 'Brazilian real', 'BRL', '1', '2017-08-21 10:36:54', '2017-08-21 10:58:40'),
(3, 'Canadian dollar', 'CAD', '1', '2017-08-21 10:37:06', '2017-08-21 10:46:33'),
(4, 'Czech koruna', 'CZK', '0', '2017-08-21 10:37:17', '2017-09-12 10:34:30'),
(5, 'Danish krone', 'DKK', '0', '2017-08-21 10:37:32', '2017-09-12 10:34:33'),
(6, 'Euro', 'EUR', '1', '2017-08-21 10:37:46', '2017-08-21 10:37:46'),
(7, 'Hong Kong dollar', 'HKD', '0', '2017-08-21 10:37:58', '2017-09-12 10:34:38'),
(8, 'Hungarian forint', 'HUF', '1', '2017-08-21 10:38:09', '2017-08-21 10:38:09'),
(9, 'Israeli new shekel', 'ILS', '0', '2017-08-21 10:38:21', '2017-09-12 10:34:50'),
(10, 'Japanese yen', 'JPY', '1', '2017-08-21 10:38:38', '2017-08-21 10:38:38'),
(11, 'Malaysian ringgit', 'MYR', '1', '2017-08-21 10:38:49', '2017-08-21 10:38:49'),
(12, 'Mexican peso', 'MXN', '1', '2017-08-21 10:38:58', '2017-08-21 10:38:58'),
(13, 'New Taiwan dollar', 'TWD', '1', '2017-08-21 10:39:11', '2017-08-21 10:39:11'),
(14, 'New Zealand dollar', 'NZD', '1', '2017-08-21 10:39:22', '2017-08-21 10:39:22'),
(15, 'Norwegian krone', 'NOK', '1', '2017-08-21 10:39:30', '2017-08-21 10:39:30'),
(16, 'Philippine peso', 'PHP', '1', '2017-08-21 10:39:52', '2017-08-21 10:39:52'),
(17, 'Polish złoty', 'PLN', '1', '2017-08-21 10:40:04', '2017-08-21 10:40:04'),
(18, 'Pound sterling', 'GBP', '1', '2017-08-21 10:42:21', '2017-08-21 10:42:21'),
(19, 'Russian ruble', 'RUB', '1', '2017-08-21 10:42:32', '2017-08-21 10:42:32'),
(20, 'Singapore dollar', 'SGD', '1', '2017-08-21 10:42:46', '2017-08-21 10:42:46'),
(21, 'Swedish krona', 'SEK', '1', '2017-08-21 10:43:03', '2017-08-21 10:43:03'),
(22, 'Swiss franc', 'CHF', '1', '2017-08-21 10:43:15', '2017-08-21 10:43:15'),
(23, 'Thai baht', 'THB', '1', '2017-08-21 10:43:25', '2017-08-21 10:43:25'),
(24, 'United States dollar', 'USD', '1', '2017-08-21 10:43:39', '2017-08-21 10:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('pending','answered') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `fullname`, `email`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'First Enquiry', 'first@user.com', 'First enquiry subject', 'Drop me a line. We will be glad to assist you!', 'pending', '2017-09-02 11:37:04', '2017-09-02 11:37:52'),
(2, 'Second Enquiry', 'second@enquiry.com', 'Second enquiry subject', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'answered', '2017-09-08 06:08:31', '2017-09-08 06:21:12'),
(3, 'Third User', 'third@user.com', 'Third Enquiry Subject', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'pending', '2017-09-08 06:10:25', '2017-09-08 06:10:25'),
(4, 'Fourth User', 'fourth@user.com', 'Fourth Enquiry Subject', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'pending', '2017-09-08 06:10:49', '2017-09-08 06:10:49'),
(5, 'Five User', 'five@user.com', 'Five Enquiry Subject', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'pending', '2017-09-08 06:11:11', '2017-09-08 06:11:11'),
(6, 'Six User', 'six@user.com', 'Six Enquiry Subject', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'answered', '2017-09-08 06:11:11', '2017-09-08 06:21:05'),
(7, 'Seven User', 'seven@user.com', 'Seven Enquiry Subject', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'pending', '2017-09-08 06:11:11', '2017-09-08 06:11:11'),
(8, 'Eight User', 'eight@user.com', 'Eight Enquiry Subject', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'answered', '2017-09-08 06:11:11', '2017-09-08 06:13:21'),
(9, 'Nine User', 'nine@user.com', 'Nine Enquiry Subject', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'pending', '2017-09-08 06:11:11', '2017-09-08 06:11:11'),
(10, 'Ten User', 'ten@user.com', 'Ten Enquiry Subject', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'answered', '2017-09-08 06:11:11', '2017-09-08 06:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2015_10_10_104728_create_admin_table', 1),
(2, '2015_10_13_124512_create_password_resets_table', 1),
(3, '2015_11_18_112049_create_settings_table', 1),
(7, '2017_07_03_110311_create_users_table', 2),
(8, '2017_07_04_101042_create_user_chat_messages_table', 3),
(15, '2017_07_13_065710_create_services_table', 4),
(16, '2017_07_13_113430_create_schedule_table', 4),
(17, '2017_07_27_063122_create_bookings_table', 5),
(18, '2017_07_27_063612_create_bookings_details_table', 5),
(19, '2017_08_12_110251_create_transactions_table', 6),
(20, '2017_08_21_104640_create_paypal_settings_table', 7),
(21, '2017_08_21_122213_create_currencies_table', 8),
(22, '2017_08_21_130350_create_payment_settings_table', 9),
(23, '2017_09_02_163231_create_enquiries_table', 10),
(24, '2016_06_01_000001_create_oauth_auth_codes_table', 11),
(25, '2016_06_01_000002_create_oauth_access_tokens_table', 11),
(26, '2016_06_01_000003_create_oauth_refresh_tokens_table', 11),
(27, '2016_06_01_000004_create_oauth_clients_table', 11),
(28, '2016_06_01_000005_create_oauth_personal_access_clients_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Booking Personal Access Client', 'Yub2tAaxeoLNxrL77zjqVHGbpe12U45xyJe0Q4S8', 'http://localhost', 1, 0, 0, '2018-05-25 11:29:45', '2018-05-25 11:29:45'),
(2, NULL, 'Laravel Booking Password Grant Client', 'wILog6wDJ23hFwuDJjpGphugH0dFtzBY5KO2L9wC', 'http://localhost', 0, 1, 0, '2018-05-25 11:29:46', '2018-05-25 11:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-05-25 11:29:46', '2018-05-25 11:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `currency_id` int(10) UNSIGNED DEFAULT NULL,
  `price` double(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_settings`
--

INSERT INTO `payment_settings` (`id`, `currency_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 24, 10.00, '2017-08-21 11:00:08', '2017-09-12 08:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_settings`
--

CREATE TABLE `paypal_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id_sandbox` text COLLATE utf8_unicode_ci NOT NULL,
  `secret_sandbox` text COLLATE utf8_unicode_ci NOT NULL,
  `client_id_live` text COLLATE utf8_unicode_ci NOT NULL,
  `secret_live` text COLLATE utf8_unicode_ci NOT NULL,
  `mode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paypal_settings`
--

INSERT INTO `paypal_settings` (`id`, `client_id_sandbox`, `secret_sandbox`, `client_id_live`, `secret_live`, `mode`, `created_at`, `updated_at`) VALUES
(1, '', '', '', '', 'test', '2017-08-21 06:21:34', '2017-11-16 05:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED DEFAULT NULL,
  `week_number` int(11) DEFAULT NULL COMMENT '0=sunday,1=monday,2=tuesday,3=wednesday,4=thursday,5=friday,6=saturday',
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `service_id`, `week_number`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(49, 7, 1, '10:00:00', '17:00:00', '2019-08-03 00:16:41', '2019-08-03 00:16:41'),
(50, 7, 2, '10:00:00', '17:00:00', '2019-08-03 00:16:41', '2019-08-03 00:16:41'),
(51, 7, 3, '10:00:00', '17:00:00', '2019-08-03 00:16:41', '2019-08-03 00:16:41'),
(52, 7, 4, '10:30:00', '18:30:00', '2019-08-03 00:16:41', '2019-08-03 00:16:41'),
(53, 7, 5, '11:00:00', '19:00:00', '2019-08-03 00:16:41', '2019-08-03 00:16:41'),
(54, 7, 6, '11:00:00', '15:00:00', '2019-08-03 00:16:41', '2019-08-03 00:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double(11,2) NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'in minutes',
  `max_spot_limit` int(11) DEFAULT 1,
  `close_booking_before_time` int(11) DEFAULT NULL COMMENT 'in minutes',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `service_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'daily' COMMENT 'daily, weekly, monthly, yearly',
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `price`, `duration`, `max_spot_limit`, `close_booking_before_time`, `start_date`, `end_date`, `start_time`, `end_time`, `service_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Daily Service', 'Here is the description of the service which is dsiplay to users when booking their spot.<br />\r\nSo user will come to know that what is included in this service and what benefits they will get with the booking of this service.', 75.25, 30, 3, 30, '2019-01-01', '2020-12-31', '10:00:00', '18:00:00', 'daily', '1', '2017-07-17 02:27:57', '2019-08-03 00:17:13'),
(5, 'Monthy service', 'Here is the description of the service which is dsiplay to users when booking their spot.<br />\r\nSo user will come to know that what is included in this service and what benefits they will get with the booking of this service.', 120.00, 120, 1, 60, '2019-07-21', '2020-12-31', '10:00:00', '18:00:00', 'monthly', '1', '2017-07-21 02:42:35', '2019-08-03 00:16:56'),
(6, 'Yearly service', 'Here is the description of the service which is dsiplay to users when booking their spot.<br />\r\nSo user will come to know that what is included in this service and what benefits they will get with the booking of this service.', 500.00, 30, 1, 30, '2019-08-21', '2022-08-22', '10:45:00', '17:30:00', 'yearly', '1', '2017-07-21 06:09:48', '2019-08-03 00:24:53'),
(7, 'Weekly Service', 'Here is the description of the service which is dsiplay to users when booking their spot.<br />\r\nSo user will come to know that what is included in this service and what benefits they will get with the booking of this service.', 150.00, 60, 1, 120, '2019-08-01', '2020-12-31', NULL, NULL, 'weekly', '1', '2017-08-04 13:52:21', '2019-08-03 00:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `language` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `site_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `map` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `googleplus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `language`, `site_title`, `logo`, `email`, `phone`, `address`, `map`, `facebook`, `twitter`, `linkedin`, `googleplus`, `created_at`, `updated_at`) VALUES
(1, 'en', 'Laravel Booking System', 'logo.png', 'dhavalbharadva@gmail.com', '1234567', 'Address line, city, state, country', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.3807659297413!2d70.77194531420803!3d22.301434985323027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959c987bcaf59e9%3A0xee31231d296cd599!2sParishram!5e0!3m2!1sen!2sin!4v1505200344854\" width=\"800\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'http://facebook.com', 'http://twitter.com', 'http://linkedin.com', 'http://google.com', '2017-07-03 02:02:39', '2019-07-24 13:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `trans_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `credit` double(11,2) NOT NULL,
  `amount` double(11,2) NOT NULL,
  `currency` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `trans_id`, `payment_method`, `credit`, `amount`, `currency`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'PAY-4J337633X35578401LGHJWSQ', 'paypal', 1.00, 2.00, 'USD', 'success', '2017-08-12 06:10:47', '2017-08-12 06:10:47'),
(2, 1, 'PAY-18N13744NA9136314LGLOQCY', 'paypal', 1.00, 2.00, 'USD', 'success', '2017-08-18 13:14:52', '2017-08-18 13:14:52'),
(3, 1, 'PAY-1RX99095GR9247137LGNMCTI', 'paypal', 1.00, 2.00, 'AUD', 'success', '2017-08-21 11:18:58', '2017-08-21 11:18:58'),
(4, 1, 'PAY-12M01742699058352LGNMSAQ', 'paypal', 2.00, 2.00, 'EUR', 'success', '2017-08-21 11:51:50', '2017-08-21 11:51:50'),
(5, 20, 'PAY-750423342V909052BLGSPOSI', 'paypal', 1.00, 1.00, 'USD', 'success', '2017-08-29 05:11:19', '2017-08-29 05:11:19'),
(6, 20, 'PAY-38588103PW446510TLGSPSEI', 'paypal', 1.00, 1.00, 'USD', 'success', '2017-08-29 05:19:09', '2017-08-29 05:19:09'),
(7, 20, 'PAY-1YE30117GN2449428LGSPWDQ', 'paypal', 1.00, 1.00, 'USD', 'success', '2017-08-29 05:27:08', '2017-08-29 05:27:08'),
(8, 20, 'PAY-01K34844ST2710711LGSQDZI', 'paypal', 1.00, 1.00, 'USD', 'success', '2017-08-29 05:56:45', '2017-08-29 05:56:45'),
(9, 20, 'PAY-9293588369186893WLG5XGBY', 'paypal', 1.00, 10.00, 'USD', 'success', '2017-09-15 06:30:02', '2017-09-15 06:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fb_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `credit` float NOT NULL DEFAULT 0,
  `online` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fb_id`, `firstname`, `lastname`, `email`, `password`, `remember_token`, `image`, `credit`, `online`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'First', 'User', 'first@user.com', '$2y$10$u3E9Wis.uKhD6GxVr2TGe.Wp.AETzYDzpFglLlsRkdlLJw6nfchyq', 'usOUTLCyX4eqbo9izBoAEIMZVB7hqDQVtdG35b5DfzNtrmeyMpinyW1YrdZf', 'user_1.jpg', 225, '1', '1', '2017-07-03 07:52:39', '2017-09-14 10:31:20'),
(2, NULL, 'Second', 'User', 'second@user.com', '$2y$10$F/UyInBIGB0QD82BRGaXQeMSQgL4JyGY5A.mJnk0fNXbamtn5A4S.', 'OUVmNMfbvKWkbvKAi9B7gzjJLv229UNJa4z8ckoKRsARmGF73z3ncHaDydKV', 'user_2.jpg', 600, '1', '1', '2017-07-03 07:53:03', '2017-09-14 10:32:24'),
(3, NULL, 'Third', 'User', 'third@user.com', '$2y$10$tdeC/7r1y6HxZxEQWgoVpO3XjXBZGeMnN2uKSSx9Wxad.s3N1sVAa', 'IQ6Gj54jHFdIRwwgqVEs3nVllUxDh6OHc1Ud9ocvuhBGrFifeiSTPQ8L8gIT', 'user_3.jpg', 150, '1', '1', '2017-07-03 07:53:03', '2017-09-08 06:01:13'),
(4, NULL, 'Fourth', 'User', 'fourth@user.com', '$2y$10$xZ85g6f8j3Vn2ykj3tdVruQgeu2giIFS311.TV8Hz7S9SC1wUTSnm', 'tz8WlXcG5F7s3zGmkdDfPTSilPcbZJ1bjStly5dfIe0dWPYImh0Cqg164YEr', 'user_4.jpg', 150, '1', '1', '2017-07-03 07:53:03', '2017-09-14 12:12:31'),
(5, NULL, 'Five', 'User', 'five@user.com', '$2y$10$Ljqre81qF9Xc8faB.3y3IOeZnh5t5La..VsvyKZsM3/ej1827WJju', 'L0TyPvpYQw540davPcTCsSZYTT0MNrzRso3S5DNSO59CFsLnSPDyb1pglAEG', 'user_5.jpg', 200, '1', '0', '2017-07-03 07:53:03', '2017-09-12 11:58:43'),
(6, NULL, 'Six', 'User', 'six@user.com', '$2y$10$nEquHaTjKF64viq.dMp50OfDVeC0oEiAKDivOXQQbEAaXstlZfYEC', 'FaSFoqrHFpfol8Mh5Y3V4aEaPMJO2pYjHdZxnwX7GeHvfvWiyt61x2agKYpO', 'user_6.jpg', 255, '0', '1', '2017-07-03 07:53:03', '2017-09-08 05:36:48'),
(7, NULL, 'Seven', 'User', 'seven@user.com', '$2y$10$8bfRVDs3Tof28X3OHLPSC.wrbAXl4HZ9VZqOmC6EeiZFvB8PZ2BK2', NULL, NULL, 268, '0', '1', '2017-07-07 02:31:36', '2017-09-08 05:36:37'),
(8, NULL, 'Eight', 'User', 'eight@user.com', '$2y$10$/vg/LlttHvH9nb8k9lyZX.GRJgB4A6Kvm8UM/yHTtv6SGfJp.JTbK', 'lixGyQuFQiHd1vWOBvHqin7QRnMMS1IQE3zJImkwGnUSUd8iMXmnDiu7h52E', NULL, 454.75, '1', '1', '2017-07-07 02:32:46', '2017-09-12 12:02:56'),
(9, NULL, 'Nine', 'User', 'nine@user.com', '$2y$10$sW.x/5uNMG3KFFUoFwwvl.fvuwYD.DTfQkYlOfj52gDlqCwOEkn2q', NULL, NULL, 15.25, '0', '1', '2017-07-07 02:33:32', '2017-08-09 10:51:36'),
(20, NULL, 'Dhaval', 'PHP', 'dhaval@gmail.com', '$2y$10$CBKm9uiGN3l60vd0kdJCLut1YwIH5HEcUlaBwd03/iY6XAVZ/gZFO', 'XMstH8xFGnf539L2EtCTYrIZtQ5JpKVhjrfnY9Sn9H2Wto7nLKmSmae64ocX', NULL, 880.75, '0', '1', '2017-08-26 10:30:00', '2019-08-03 00:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_chat_messages`
--

CREATE TABLE `user_chat_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `message_content` text COLLATE utf8_unicode_ci NOT NULL,
  `message_read` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `message_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'in-msg=incoming message, out-msg=outgoing message for admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_chat_messages`
--

INSERT INTO `user_chat_messages` (`id`, `user_id`, `message_content`, `message_read`, `message_type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hi', '1', 'in-msg', '2017-07-03 23:55:40', '2017-09-15 01:20:28'),
(2, 1, 'Hello', '1', 'in-msg', '2017-07-03 23:56:27', '2017-09-15 01:20:28'),
(3, 2, 'how are you? :)', '1', 'in-msg', '2017-07-04 00:31:38', '2017-09-08 04:40:19'),
(4, 3, 'are you there?', '1', 'in-msg', '2017-07-04 00:31:47', '2017-08-28 02:26:19'),
(5, 3, 'Yes i am here', '1', 'in-msg', '2017-07-04 00:31:57', '2017-08-28 02:26:19'),
(6, 4, 'What can i help you?', '1', 'in-msg', '2017-07-04 00:32:06', '2017-08-28 01:47:07'),
(7, 5, 'Can you help me?', '1', 'in-msg', '2017-07-04 00:32:12', '2017-08-28 01:47:12'),
(8, 5, 'I am user', '1', 'in-msg', '2017-07-04 00:32:18', '2017-08-28 01:47:12'),
(9, 4, 'I want to buy credit', '1', 'in-msg', '2017-07-04 00:32:28', '2017-08-28 01:47:07'),
(10, 1, 'I want to buy credit', '1', 'in-msg', '2017-07-04 00:32:38', '2017-09-15 01:20:28'),
(11, 1, 'hello', '1', 'in-msg', '2017-07-04 01:31:12', '2017-09-15 01:20:28'),
(12, 1, 'hello', '1', 'in-msg', '2017-07-04 01:31:18', '2017-09-15 01:20:28'),
(13, 1, 'are you there?', '1', 'in-msg', '2017-07-04 01:40:41', '2017-09-15 01:20:28'),
(14, 1, 'hello', '1', 'in-msg', '2017-07-04 01:41:13', '2017-09-15 01:20:28'),
(15, 1, 'i am waiting', '1', 'in-msg', '2017-07-04 01:41:18', '2017-09-15 01:20:28'),
(16, 1, 'please resond me', '1', 'in-msg', '2017-07-04 01:41:30', '2017-09-15 01:20:28'),
(17, 1, 'Hi', '1', 'in-msg', '2017-07-04 02:28:12', '2017-09-15 01:20:28'),
(18, 1, 'Hello', '1', 'in-msg', '2017-07-04 02:28:47', '2017-09-15 01:20:28'),
(19, 1, 'there', '1', 'in-msg', '2017-07-04 02:29:30', '2017-09-15 01:20:28'),
(20, 1, 'Hello', '1', 'in-msg', '2017-07-04 02:39:14', '2017-09-15 01:20:28'),
(21, 1, 'Hi', '1', 'in-msg', '2017-07-04 02:39:29', '2017-09-15 01:20:28'),
(22, 1, 'Hi', '1', 'in-msg', '2017-07-04 02:39:55', '2017-09-15 01:20:28'),
(23, 1, 'are you there?', '1', 'out-msg', '2017-07-04 02:40:29', '2017-09-14 05:01:20'),
(24, 1, 'there?', '1', 'out-msg', '2017-07-04 02:42:04', '2017-09-14 05:01:20'),
(25, 1, 'hello', '1', 'out-msg', '2017-07-04 02:45:45', '2017-09-14 05:01:20'),
(26, 1, 'i am ready', '1', 'out-msg', '2017-07-04 02:45:52', '2017-09-14 05:01:20'),
(27, 1, 'are you there?', '1', 'out-msg', '2017-07-04 02:46:02', '2017-09-14 05:01:20'),
(28, 1, 'Hello sir', '1', 'in-msg', '2017-07-04 02:47:30', '2017-09-15 01:20:28'),
(29, 1, 'Yes please', '1', 'out-msg', '2017-07-04 02:47:43', '2017-09-14 05:01:20'),
(30, 1, 'how may i help you ?', '1', 'out-msg', '2017-07-04 02:47:49', '2017-09-14 05:01:20'),
(31, 3, 'Hello', '0', 'out-msg', '2017-07-12 19:54:01', '2017-07-12 19:54:01'),
(32, 20, 'Hi', '1', 'in-msg', '2017-08-28 01:10:30', '2017-09-15 01:18:21'),
(33, 20, 'Hi Dhaval', '1', 'out-msg', '2017-08-28 01:37:57', '2018-04-27 04:43:29'),
(34, 20, 'how may i help you ?', '1', 'out-msg', '2017-08-28 01:38:20', '2018-04-27 04:43:29'),
(35, 20, 'Thank you for very quick response', '1', 'in-msg', '2017-08-28 01:38:42', '2017-09-15 01:18:21'),
(36, 20, 'I have problem with my credit', '1', 'in-msg', '2017-08-28 01:38:51', '2017-09-15 01:18:21'),
(37, 20, 'I have made booking but it was cancelled and my credit is deducted from account.', '1', 'in-msg', '2017-08-28 01:40:01', '2017-09-15 01:18:21'),
(38, 20, 'So please check and let me know when my credit is deposited back to my account?', '1', 'in-msg', '2017-08-28 01:40:35', '2017-09-15 01:18:21'),
(39, 20, 'Sure i will check that and do necessary action in this regards', '1', 'out-msg', '2017-08-28 01:41:05', '2018-04-27 04:43:29'),
(40, 20, 'Thank you', '1', 'in-msg', '2017-08-28 01:48:42', '2017-09-15 01:18:21'),
(41, 20, 'can you please check it now?', '1', 'in-msg', '2017-08-28 01:59:13', '2017-09-15 01:18:21'),
(42, 20, 'are you there?', '1', 'in-msg', '2017-08-28 02:02:39', '2017-09-15 01:18:21'),
(43, 20, 'i am waiting', '1', 'in-msg', '2017-08-28 02:05:55', '2017-09-15 01:18:21'),
(44, 20, 'Hello are you there?', '1', 'in-msg', '2017-09-08 02:45:41', '2017-09-15 01:18:21'),
(45, 20, 'Yes How may i help you sir?', '1', 'out-msg', '2017-09-08 02:46:42', '2018-04-27 04:43:29'),
(46, 20, 'I want to buy credit with direct payment', '1', 'in-msg', '2017-09-08 02:47:33', '2017-09-15 01:18:21'),
(47, 20, 'Sure i will guide you how to buy credit', '1', 'out-msg', '2017-09-08 02:48:11', '2018-04-27 04:43:29'),
(48, 20, 'I am going to follow step please guide me right now.', '1', 'in-msg', '2017-09-08 02:49:12', '2017-09-15 01:18:21'),
(49, 20, 'How much credits you want to buy?', '1', 'out-msg', '2017-09-08 02:50:26', '2018-04-27 04:43:29'),
(50, 1, 'Hello sir', '0', 'in-msg', '2017-09-14 05:00:51', '2017-09-15 01:20:28'),
(51, 1, 'i want to buy credit', '0', 'in-msg', '2017-09-14 05:01:02', '2017-09-15 01:20:28'),
(52, 2, 'Hello sir', '0', 'in-msg', '2017-09-14 05:01:41', '2017-09-14 05:01:41'),
(53, 2, 'i want to buy credit', '0', 'in-msg', '2017-09-14 05:01:46', '2017-09-14 05:01:46'),
(54, 2, 'please give me details', '0', 'in-msg', '2017-09-14 05:01:59', '2017-09-14 05:01:59'),
(55, 4, 'Hello', '0', 'in-msg', '2017-09-14 05:02:50', '2017-09-14 05:02:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_service_id_foreign` (`service_id`);

--
-- Indexes for table `bookings_details`
--
ALTER TABLE `bookings_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_details_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_settings_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `paypal_settings`
--
ALTER TABLE `paypal_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_service_id_foreign` (`service_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_chat_messages`
--
ALTER TABLE `user_chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_chat_messages_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bookings_details`
--
ALTER TABLE `bookings_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paypal_settings`
--
ALTER TABLE `paypal_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_chat_messages`
--
ALTER TABLE `user_chat_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bookings_details`
--
ALTER TABLE `bookings_details`
  ADD CONSTRAINT `bookings_details_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD CONSTRAINT `payment_settings_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_chat_messages`
--
ALTER TABLE `user_chat_messages`
  ADD CONSTRAINT `user_chat_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
