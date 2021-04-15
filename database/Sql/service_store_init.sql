-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 14, 2021 at 09:26 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service_store_init`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_types`
--

DROP TABLE IF EXISTS `activity_types`;
CREATE TABLE IF NOT EXISTS `activity_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_types_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `activity_types_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `activity_types_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2021-02-12 20:54:59', '2021-02-12 20:54:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ad_categories`
--

DROP TABLE IF EXISTS `ad_categories`;
CREATE TABLE IF NOT EXISTS `ad_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ad_categories_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `ad_categories_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `ad_categories_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `max_price_new` int(11) DEFAULT NULL,
  `min_price_new` int(11) DEFAULT NULL,
  `max_price_old` int(11) DEFAULT NULL,
  `min_price_old` int(11) DEFAULT NULL,
  `is_verified_from_us` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_pages` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `categories_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `categories_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_2_category`
--

DROP TABLE IF EXISTS `category_2_category`;
CREATE TABLE IF NOT EXISTS `category_2_category` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `son_id` bigint(20) UNSIGNED NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_2_category_parent_id_foreign` (`parent_id`),
  KEY `category_2_category_son_id_foreign` (`son_id`),
  KEY `category_2_category_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `category_2_category_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `category_2_category_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_pages`
--

DROP TABLE IF EXISTS `category_pages`;
CREATE TABLE IF NOT EXISTS `category_pages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_pages_category_id_foreign` (`category_id`),
  KEY `category_pages_page_id_foreign` (`page_id`),
  KEY `category_pages_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `category_pages_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `category_pages_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_photos`
--

DROP TABLE IF EXISTS `category_photos`;
CREATE TABLE IF NOT EXISTS `category_photos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `photo_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_size` double NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `device_id` bigint(20) UNSIGNED NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_photos_category_id_foreign` (`category_id`),
  KEY `category_photos_device_id_foreign` (`device_id`),
  KEY `category_photos_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `category_photos_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `category_photos_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_region`
--

DROP TABLE IF EXISTS `category_region`;
CREATE TABLE IF NOT EXISTS `category_region` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_region_region_id_foreign` (`region_id`),
  KEY `category_region_category_id_foreign` (`category_id`),
  KEY `category_region_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `category_region_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `category_region_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

DROP TABLE IF EXISTS `category_translations`;
CREATE TABLE IF NOT EXISTS `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `translation_lang_id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_translations_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `category_translations_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `category_translations_deleted_by_user_id_foreign` (`deleted_by_user_id`),
  KEY `category_translations_translation_lang_id_foreign` (`translation_lang_id`),
  KEY `category_translations_category_id_foreign` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
CREATE TABLE IF NOT EXISTS `configs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `configs_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `configs_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `configs_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `manager_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `customer_type_id` bigint(20) UNSIGNED NOT NULL,
  `customer_status_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `customers_manager_id_foreign` (`manager_id`),
  KEY `customers_customer_type_id_foreign` (`customer_type_id`),
  KEY `customers_customer_status_id_foreign` (`customer_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_labels`
--

DROP TABLE IF EXISTS `customer_labels`;
CREATE TABLE IF NOT EXISTS `customer_labels` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_labels_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `customer_labels_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `customer_labels_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_statuses`
--

DROP TABLE IF EXISTS `customer_statuses`;
CREATE TABLE IF NOT EXISTS `customer_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_statuses_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `customer_statuses_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `customer_statuses_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_types`
--

DROP TABLE IF EXISTS `customer_types`;
CREATE TABLE IF NOT EXISTS `customer_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_types_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `customer_types_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `customer_types_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_vs_labels`
--

DROP TABLE IF EXISTS `customer_vs_labels`;
CREATE TABLE IF NOT EXISTS `customer_vs_labels` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_label_id` bigint(20) UNSIGNED NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_vs_labels_customer_id_foreign` (`customer_id`),
  KEY `customer_vs_labels_customer_label_id_foreign` (`customer_label_id`),
  KEY `customer_vs_labels_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `customer_vs_labels_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `customer_vs_labels_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
CREATE TABLE IF NOT EXISTS `devices` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `device_types_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `serial_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `devices_parent_id_foreign` (`parent_id`),
  KEY `devices_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `devices_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `devices_deleted_by_user_id_foreign` (`deleted_by_user_id`),
  KEY `devices_device_types_id_foreign` (`device_types_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `name`, `parent_id`, `created_by_user_id`, `updated_by_user_id`, `deleted_by_user_id`, `created_at`, `updated_at`, `deleted_at`, `device_types_id`, `description`, `region_id`, `serial_number`) VALUES
(1, 'base device', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'base device description', 1, 'xxxxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `device_types`
--

DROP TABLE IF EXISTS `device_types`;
CREATE TABLE IF NOT EXISTS `device_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `device_types_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `device_types_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `device_types_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `device_types`
--

INSERT INTO `device_types` (`id`, `name`, `parent_id`, `created_by_user_id`, `updated_by_user_id`, `deleted_by_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'base device type', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `working_hours` int(11) DEFAULT NULL,
  `start_work_date` timestamp NULL DEFAULT NULL,
  `end_work_date` timestamp NULL DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `employee_status_id` bigint(20) UNSIGNED NOT NULL,
  `standard_cost_by_hour` double DEFAULT NULL,
  `current_timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_labels`
--

DROP TABLE IF EXISTS `employee_labels`;
CREATE TABLE IF NOT EXISTS `employee_labels` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_labels_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `employee_labels_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `employee_labels_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_statuses`
--

DROP TABLE IF EXISTS `employee_statuses`;
CREATE TABLE IF NOT EXISTS `employee_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_statuses_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `employee_statuses_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `employee_statuses_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_vs_labels`
--

DROP TABLE IF EXISTS `employee_vs_labels`;
CREATE TABLE IF NOT EXISTS `employee_vs_labels` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `employee_label_id` bigint(20) UNSIGNED NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_vs_labels_employee_id_foreign` (`employee_id`),
  KEY `employee_vs_labels_employee_label_id_foreign` (`employee_label_id`),
  KEY `employee_vs_labels_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `employee_vs_labels_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `employee_vs_labels_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activity_type_id` bigint(20) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_08_20_000000_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(5, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(6, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(7, '2016_06_01_000004_create_oauth_clients_table', 1),
(8, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(11, '2021_01_13_083913_create_categories_table', 1),
(12, '2021_01_13_084037_create_category_2_category_table', 1),
(13, '2021_01_13_214649_create_region_types_table', 1),
(14, '2021_01_13_215346_create_regions_table', 1),
(17, '2021_01_14_204238_create_category_region_table', 1),
(18, '2021_01_19_094736_create_translation_languages_table', 1),
(19, '2021_01_19_094919_create_category_translations_table', 1),
(21, '2021_01_19_095028_create_customers_table', 1),
(22, '2021_01_19_095136_create_employees_table', 1),
(24, '2021_01_19_153509_create_sitinfos_table', 1),
(31, '2021_01_20_073035_create_region_translations_table', 1),
(32, '2021_01_20_225934_add_user_foreigns', 1),
(33, '2021_01_20_230420_add_roles_foreigns', 1),
(34, '2021_01_21_092808_create_devices_table', 1),
(35, '2021_01_21_093007_create_category_photos_table', 1),
(36, '2021_01_22_213302_create_region_type_translations_table', 1),
(37, '2021_01_22_213757_create_user_regions_table', 1),
(40, '2021_01_24_120114_create_pages_table', 1),
(47, '2021_01_24_140327_create_category_pages_table', 2),
(48, '2021_01_13_220218_create_ad_categories_table', 3),
(49, '2021_01_19_095028_create_employees_table', 4),
(50, '2021_01_19_095136_create_customers_table', 5),
(51, '2021_01_27_071056_create_admins_table', 5),
(52, '2021_01_29_072405_create_device_types_table', 5),
(53, '2021_01_29_072756_convert_tables_into_innoDB', 6),
(54, '2021_01_29_073159_add_region_id_to_devices_table', 7),
(55, '2021_01_29_075240_create_region_latlongs_table', 7),
(56, '2021_01_29_075711_create_project_files_table', 7),
(57, '2021_01_31_160400_create_services_table', 7),
(58, '2021_01_31_160540_create_service_regions_table', 7),
(59, '2021_01_31_161815_add_foreigns_of_services', 7),
(60, '2021_01_31_161856_add_foreigns_of_service_regions', 7),
(61, '2021_01_31_213750_create_service_translations_table', 7),
(62, '2021_01_31_215247_add_foreigns_of_service_translations', 7),
(63, '2021_02_01_114830_create_employee_labels_table', 7),
(64, '2021_02_01_115323_add_foreigns_of_employee_labels', 7),
(65, '2021_02_01_131657_create_employee_vs_labels_table', 7),
(66, '2021_02_01_131854_add_foreigns_of_employee_vs_labels', 7),
(67, '2021_02_01_142635_create_employee_statuses_table', 7),
(68, '2021_02_01_142713_add_foreigns_of_employee_statuses', 7),
(69, '2021_02_01_184003_create_salary_types_table', 7),
(70, '2021_02_01_185412_create_customer_labels_table', 7),
(71, '2021_02_01_232849_add_foreigns_of_customer_labels', 7),
(72, '2021_02_01_233712_create_customer_statuses_table', 7),
(73, '2021_02_01_233721_create_customer_types_table', 7),
(74, '2021_02_01_233741_create_customer_vs_labels_table', 7),
(75, '2021_02_01_234104_add_foreigns_of_customer_vs_labels', 7),
(76, '2021_02_02_061540_add_foreigns_to_customers_table', 7),
(77, '2021_02_03_175213_create_activity_types_table', 7),
(78, '2021_02_03_175226_create_logs_table', 7),
(79, '2021_02_04_074457_create_configs_table', 7),
(80, '2021_02_04_083623_add_base_data_to_tables', 8),
(81, '2021_02_13_205011_add_another_translation_languages', 9);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('02038ebba5dab574ae1bd686c9fae8d842cced3c4ee7d88ab27bd8a2c6cc0834d82f74274c9176a8', 1, 1, 'MyApp', '[\"admin\"]', 0, '2021-02-12 21:00:35', '2021-02-12 21:00:35', '2021-03-12 23:00:35'),
('05037a5ba1dccbba90a91457b77a845efb415aaafa29e9e885a8dc80415f230ce263847d86bae81c', 1, 1, 'MyApp', '[\"admin\"]', 0, '2021-02-12 21:01:49', '2021-02-12 21:01:49', '2021-03-12 23:01:49'),
('054581bd0f085415d2a871c17c1839c2fc4d17787ccb3b4a078379b1eb4690fc79c9adaf402f6924', 10, 1, 'MyApp', '[\"advertising_manager\"]', 0, '2021-01-26 04:44:46', '2021-01-26 04:44:46', '2021-02-26 06:44:41'),
('0d882a3f8552c2f7eee9f7834e05ceaf3b98dbeb95514b27dcddca2e0fca8fbc4f4997d0856dd1c0', 1, 1, 'MyApp', '[\"admin\"]', 0, '2021-02-13 04:53:32', '2021-02-13 04:53:32', '2021-03-13 06:53:31'),
('342c84213311c1cdde98a1dfdfaf4d8f4739135bdb65e088fb5cfdee0f7f617103f562fceaa3e7aa', 1, 1, 'MyApp', '[\"admin\"]', 0, '2021-02-12 20:59:30', '2021-02-12 20:59:30', '2021-03-12 22:59:30'),
('3ae5077bfff1c753fc602fe1e0b0a16bd59642a6ea49681f170fa405cec03f01114508cc4b5373b8', 10, 1, 'MyApp', '[\"advertising_manager\"]', 0, '2021-01-25 16:04:49', '2021-01-25 16:04:49', '2021-02-25 18:04:49'),
('3ebd52423d5d2e1f359e5d7f8aab10c91902782085bde31aab4caaea1ce08fee23a01ca27352944a', 10, 1, 'MyApp', '[\"advertising_manager\"]', 0, '2021-01-25 20:32:51', '2021-01-25 20:32:51', '2021-02-25 22:32:50'),
('4b432eaa381143c7f6338597072390d770050405716f617172b499c77279f3160d200c8ab6290042', 10, 1, 'MyApp', '[\"advertising_manager\"]', 0, '2021-01-25 16:04:37', '2021-01-25 16:04:37', '2021-02-25 18:04:37'),
('53902bc2c5280791260d814584b0c2fb333323b4b340b67a7c8e329adcf28d818ef5ccf5e09e96db', 1, 1, 'MyApp', '[\"admin\"]', 0, '2021-02-13 09:39:11', '2021-02-13 09:39:11', '2021-03-13 11:39:10'),
('5b107bee5a61893dec2287c2d58fbb91c2600368106b030736f9859eab1f8d69e7d8b04e4630ac4a', 10, 1, 'MyApp', '[\"advertising_manager\"]', 0, '2021-01-26 08:31:43', '2021-01-26 08:31:43', '2021-02-26 10:31:43'),
('5c4260764371eee23c10458915d9c3737a7bdf12806b7915439df29ccde4644ba79ba10779107db4', 10, 1, 'MyApp', '[\"advertising_manager\"]', 0, '2021-01-25 16:07:48', '2021-01-25 16:07:48', '2021-02-25 18:07:47'),
('7431f96a98fbc6051baff50af00ae8c6fb556a68be2c3c0178db7e140829608222c8db567ee277ee', 10, 1, 'MyApp', '[\"advertising_manager\"]', 0, '2021-01-26 09:58:50', '2021-01-26 09:58:50', '2021-02-26 11:58:50'),
('75eccd1bc4c5902bbf5bff3a666b66db56158ca444a4d7656e22f3818e2b26bc7ab150cc296a5a05', 10, 1, 'MyApp', '[\"advertising_manager\"]', 0, '2021-01-25 20:19:24', '2021-01-25 20:19:24', '2021-02-25 22:19:20'),
('9dae50b90c8149906465cfc470222ca8d4a3f3e9829f92e85c2edb618580130e9fbb7e91f0640abc', 1, 1, 'MyApp', '[\"admin\"]', 0, '2021-02-13 09:39:33', '2021-02-13 09:39:33', '2021-03-13 11:39:33'),
('a57edfdb5f827a7b72e6273742e0aaeb13f5a0f23444fd17c5f37e7df534e1196e328a2992200609', 1, 1, 'MyApp', '[\"admin\"]', 0, '2021-02-14 06:51:10', '2021-02-14 06:51:10', '2021-03-14 08:51:09'),
('a9f772ee8db829e70c05f0099b42243d834991f1fcc884dc0afd7e4f6cc76795d5b431a759dd2288', 10, 1, 'MyApp', '[\"advertising_manager\"]', 0, '2021-01-25 20:27:36', '2021-01-25 20:27:36', '2021-02-25 22:27:36'),
('b89653bf34dada930546a602a1babce30f81616afe3efc655a681550d88971154b057fd158a8ac30', 1, 1, 'MyApp', '[\"admin\"]', 0, '2021-02-13 09:36:26', '2021-02-13 09:36:26', '2021-03-13 11:36:26'),
('ba4c0801a85630d77102e876e99af68f626b95a34444b7f701ad3f031c905bf1d9881b560677cf71', 10, 1, 'MyApp', '[\"advertising_manager\"]', 0, '2021-01-26 09:49:57', '2021-01-26 09:49:57', '2021-02-26 11:49:57'),
('d309d7968dcaa93577655502f87f54d024a9e69ee1c407bb7d3e932759d87591e90b148698d98014', 1, 1, 'MyApp', '[\"admin\"]', 0, '2021-02-14 05:35:28', '2021-02-14 05:35:28', '2021-03-14 07:35:28'),
('e18ec9187f7d896ad417c5701c52118535455513b2b0173808046d216c5c4dcdebf993accc47c2a6', 1, 1, 'MyApp', '[\"admin\"]', 0, '2021-02-13 06:59:56', '2021-02-13 06:59:56', '2021-03-13 08:59:55'),
('f8496af390a45d19bef6f16f61ce12730cc0e4903bbe0722d904907a053550fac314cd1cf36d7fe9', 1, 1, 'MyApp', '[\"admin\"]', 0, '2021-02-13 07:00:30', '2021-02-13 07:00:30', '2021-03-13 09:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Malls-online Personal Access Client', 'EWHY6PRXpnsYEwrb3yYUoZPZjCqD6StyvnggoPIh', NULL, 'http://localhost', 1, 0, 0, '2021-01-25 16:00:22', '2021-01-25 16:00:22'),
(2, NULL, 'Malls-online Password Grant Client', 'LyEMalv9cEcTF2lawrgwjejn8bpQ7cwMm2ERZdzs', 'users', 'http://localhost', 0, 1, 0, '2021-01-25 16:00:22', '2021-01-25 16:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-01-25 16:00:22', '2021-01-25 16:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endpoint` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `pages_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `pages_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `password_resets_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `password_resets_deleted_by_user_id_foreign` (`deleted_by_user_id`),
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_files`
--

DROP TABLE IF EXISTS `project_files`;
CREATE TABLE IF NOT EXISTS `project_files` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_files_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `project_files_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `project_files_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `is_verified_from_us` tinyint(4) DEFAULT NULL,
  `region_type_id` bigint(20) UNSIGNED NOT NULL,
  `parent_region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regions_region_type_id_foreign` (`region_type_id`),
  KEY `regions_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `regions_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `regions_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `is_verified_from_us`, `region_type_id`, `parent_region_id`, `created_by_user_id`, `updated_by_user_id`, `deleted_by_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `region_latlongs`
--

DROP TABLE IF EXISTS `region_latlongs`;
CREATE TABLE IF NOT EXISTS `region_latlongs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `region_lat` double NOT NULL,
  `region_long` double NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `region_latlongs_region_id_foreign` (`region_id`),
  KEY `region_latlongs_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `region_latlongs_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `region_latlongs_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `region_latlongs`
--

INSERT INTO `region_latlongs` (`id`, `region_lat`, `region_long`, `region_id`, `created_by_user_id`, `updated_by_user_id`, `deleted_by_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `region_translations`
--

DROP TABLE IF EXISTS `region_translations`;
CREATE TABLE IF NOT EXISTS `region_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `translation_lang_id` bigint(20) UNSIGNED NOT NULL,
  `region_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `region_translations_region_id_foreign` (`region_id`),
  KEY `region_translations_translation_lang_id_foreign` (`translation_lang_id`),
  KEY `region_translations_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `region_translations_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `region_translations_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `region_translations`
--

INSERT INTO `region_translations` (`id`, `region_id`, `translation_lang_id`, `region_name`, `region_description`, `created_by_user_id`, `updated_by_user_id`, `deleted_by_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'base region', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `region_types`
--

DROP TABLE IF EXISTS `region_types`;
CREATE TABLE IF NOT EXISTS `region_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `is_verified_from_us` tinyint(4) DEFAULT NULL,
  `verified_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `region_types_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `region_types_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `region_types_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `region_types`
--

INSERT INTO `region_types` (`id`, `is_verified_from_us`, `verified_by_user_id`, `created_by_user_id`, `updated_by_user_id`, `deleted_by_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `region_type_translations`
--

DROP TABLE IF EXISTS `region_type_translations`;
CREATE TABLE IF NOT EXISTS `region_type_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `region_type_id` bigint(20) UNSIGNED NOT NULL,
  `translation_lang_id` bigint(20) UNSIGNED NOT NULL,
  `region_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `region_type_translations_region_type_id_foreign` (`region_type_id`),
  KEY `region_type_translations_translation_lang_id_foreign` (`translation_lang_id`),
  KEY `region_type_translations_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `region_type_translations_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `region_type_translations_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `region_type_translations`
--

INSERT INTO `region_type_translations` (`id`, `region_type_id`, `translation_lang_id`, `region_type_name`, `created_by_user_id`, `updated_by_user_id`, `deleted_by_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'base region type', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `roles_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `roles_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`, `created_by_user_id`, `updated_by_user_id`, `deleted_by_user_id`) VALUES
(1, 'admin', 'base role', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salary_types`
--

DROP TABLE IF EXISTS `salary_types`;
CREATE TABLE IF NOT EXISTS `salary_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `verified_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_verified_by_user_id_foreign` (`verified_by_user_id`),
  KEY `services_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `services_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `services_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_regions`
--

DROP TABLE IF EXISTS `service_regions`;
CREATE TABLE IF NOT EXISTS `service_regions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_regions_service_id_foreign` (`service_id`),
  KEY `service_regions_region_id_foreign` (`region_id`),
  KEY `service_regions_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `service_regions_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `service_regions_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_translations`
--

DROP TABLE IF EXISTS `service_translations`;
CREATE TABLE IF NOT EXISTS `service_translations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `translation_lang_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `service_translations_service_id_foreign` (`service_id`),
  KEY `service_translations_translation_lang_id_foreign` (`translation_lang_id`),
  KEY `service_translations_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `service_translations_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `service_translations_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sitinfos`
--

DROP TABLE IF EXISTS `sitinfos`;
CREATE TABLE IF NOT EXISTS `sitinfos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `one_dinar_in_dollar` double NOT NULL,
  `taxes_in_kuwait_in_dinar` double NOT NULL,
  `taxes_out_kuwait_in_dinar` double NOT NULL,
  `one_dollars_in_QAR` double NOT NULL,
  `one_dollars_in_SAR` double NOT NULL,
  `one_dollars_in_OMR` double NOT NULL,
  `one_dollars_in_AED` double NOT NULL,
  `one_dollars_in_BHD` double NOT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sitinfos_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `sitinfos_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `sitinfos_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translation_languages`
--

DROP TABLE IF EXISTS `translation_languages`;
CREATE TABLE IF NOT EXISTS `translation_languages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_in_native_language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(4) DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `translation_languages_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `translation_languages_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `translation_languages_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translation_languages`
--

INSERT INTO `translation_languages` (`id`, `name`, `name_in_native_language`, `language_code`, `is_default`, `created_by_user_id`, `updated_by_user_id`, `deleted_by_user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'English', 'English', 'EN', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Arabic', 'Arabic', 'AR', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'france', 'français', 'FR', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'spanish', 'Español', 'ES', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'russian', 'русский', 'RU', 0, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `verified` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `verification_token` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` timestamp NULL DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_lang_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  KEY `users_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `users_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `users_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `verified`, `verification_token`, `avatar`, `mobile_phone`, `surname`, `birthdate`, `gender`, `address`, `created_at`, `updated_at`, `deleted_at`, `role_id`, `created_by_user_id`, `updated_by_user_id`, `deleted_by_user_id`, `username`, `default_lang_id`) VALUES
(1, '', 'base_admin@test.com', NULL, '$2y$10$Dg9Z2.OED5znK/FWzycMO.0KoJK0MvZq9xdCWAY.x6fN0gYI4XmYy', NULL, '0', NULL, NULL, '112233445566', NULL, NULL, NULL, NULL, '2021-02-12 20:54:59', '2021-02-12 20:54:59', NULL, 1, NULL, NULL, NULL, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_regions`
--

DROP TABLE IF EXISTS `user_regions`;
CREATE TABLE IF NOT EXISTS `user_regions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_by_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_regions_region_id_foreign` (`region_id`),
  KEY `user_regions_user_id_foreign` (`user_id`),
  KEY `user_regions_created_by_user_id_foreign` (`created_by_user_id`),
  KEY `user_regions_updated_by_user_id_foreign` (`updated_by_user_id`),
  KEY `user_regions_deleted_by_user_id_foreign` (`deleted_by_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_regions`
--

INSERT INTO `user_regions` (`id`, `user_id`, `region_id`, `created_by_user_id`, `updated_by_user_id`, `deleted_by_user_id`, `created_at`, `updated_at`, `deleted_at`, `ip`) VALUES
(1, 1, NULL, NULL, NULL, NULL, '2021-02-12 21:01:49', '2021-02-12 21:01:49', NULL, NULL),
(2, 1, NULL, NULL, NULL, NULL, '2021-02-13 04:53:32', '2021-02-13 04:53:32', NULL, NULL),
(3, 1, NULL, NULL, NULL, NULL, '2021-02-13 06:59:56', '2021-02-13 06:59:56', NULL, NULL),
(4, 1, NULL, NULL, NULL, NULL, '2021-02-13 07:00:30', '2021-02-13 07:00:30', NULL, NULL),
(5, 1, NULL, NULL, NULL, NULL, '2021-02-13 09:36:26', '2021-02-13 09:36:26', NULL, NULL),
(6, 1, NULL, NULL, NULL, NULL, '2021-02-13 09:39:11', '2021-02-13 09:39:11', NULL, NULL),
(7, 1, NULL, NULL, NULL, NULL, '2021-02-13 09:39:34', '2021-02-13 09:39:34', NULL, NULL),
(8, 1, NULL, NULL, NULL, NULL, '2021-02-14 05:35:28', '2021-02-14 05:35:28', NULL, NULL),
(9, 1, NULL, NULL, NULL, NULL, '2021-02-14 06:51:10', '2021-02-14 06:51:10', NULL, '127.0.0.1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_types`
--
ALTER TABLE `activity_types`
  ADD CONSTRAINT `activity_types_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `activity_types_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `activity_types_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_2_category`
--
ALTER TABLE `category_2_category`
  ADD CONSTRAINT `category_2_category_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_2_category_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_2_category_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_2_category_son_id_foreign` FOREIGN KEY (`son_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_2_category_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_pages`
--
ALTER TABLE `category_pages`
  ADD CONSTRAINT `category_pages_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_pages_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_pages_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_pages_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_pages_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_photos`
--
ALTER TABLE `category_photos`
  ADD CONSTRAINT `category_photos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_photos_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_photos_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_photos_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_photos_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_region`
--
ALTER TABLE `category_region`
  ADD CONSTRAINT `category_region_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_region_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_region_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_region_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_region_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_translations_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_translations_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_translations_translation_lang_id_foreign` FOREIGN KEY (`translation_lang_id`) REFERENCES `translation_languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_translations_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `configs`
--
ALTER TABLE `configs`
  ADD CONSTRAINT `configs_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `admins` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `configs_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `admins` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `configs_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `admins` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_customer_status_id_foreign` FOREIGN KEY (`customer_status_id`) REFERENCES `customer_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customers_customer_type_id_foreign` FOREIGN KEY (`customer_type_id`) REFERENCES `customer_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_labels`
--
ALTER TABLE `customer_labels`
  ADD CONSTRAINT `customer_labels_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_labels_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_labels_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_statuses`
--
ALTER TABLE `customer_statuses`
  ADD CONSTRAINT `customer_statuses_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_statuses_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_statuses_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_types`
--
ALTER TABLE `customer_types`
  ADD CONSTRAINT `customer_types_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_types_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_types_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_vs_labels`
--
ALTER TABLE `customer_vs_labels`
  ADD CONSTRAINT `customer_vs_labels_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_vs_labels_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_vs_labels_customer_label_id_foreign` FOREIGN KEY (`customer_label_id`) REFERENCES `customer_labels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_vs_labels_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_vs_labels_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `devices_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `devices_device_types_id_foreign` FOREIGN KEY (`device_types_id`) REFERENCES `device_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `devices_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `devices_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_labels`
--
ALTER TABLE `employee_labels`
  ADD CONSTRAINT `employee_labels_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_labels_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_labels_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_statuses`
--
ALTER TABLE `employee_statuses`
  ADD CONSTRAINT `employee_statuses_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_statuses_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_statuses_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_vs_labels`
--
ALTER TABLE `employee_vs_labels`
  ADD CONSTRAINT `employee_vs_labels_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_vs_labels_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_vs_labels_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_vs_labels_employee_label_id_foreign` FOREIGN KEY (`employee_label_id`) REFERENCES `employee_labels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_vs_labels_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pages_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `password_resets_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `password_resets_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_files`
--
ALTER TABLE `project_files`
  ADD CONSTRAINT `project_files_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_files_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_files_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `regions_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `regions_region_type_id_foreign` FOREIGN KEY (`region_type_id`) REFERENCES `region_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `regions_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `region_latlongs`
--
ALTER TABLE `region_latlongs`
  ADD CONSTRAINT `region_latlongs_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `region_latlongs_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `region_latlongs_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `region_latlongs_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `region_translations`
--
ALTER TABLE `region_translations`
  ADD CONSTRAINT `region_translations_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `region_translations_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `region_translations_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `region_translations_translation_lang_id_foreign` FOREIGN KEY (`translation_lang_id`) REFERENCES `translation_languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `region_translations_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `region_types`
--
ALTER TABLE `region_types`
  ADD CONSTRAINT `region_types_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `region_types_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `region_types_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `region_type_translations`
--
ALTER TABLE `region_type_translations`
  ADD CONSTRAINT `region_type_translations_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `region_type_translations_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `region_type_translations_region_type_id_foreign` FOREIGN KEY (`region_type_id`) REFERENCES `region_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `region_type_translations_translation_lang_id_foreign` FOREIGN KEY (`translation_lang_id`) REFERENCES `translation_languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `region_type_translations_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_verified_by_user_id_foreign` FOREIGN KEY (`verified_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_regions`
--
ALTER TABLE `service_regions`
  ADD CONSTRAINT `service_regions_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_regions_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_regions_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_regions_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_regions_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_translations`
--
ALTER TABLE `service_translations`
  ADD CONSTRAINT `service_translations_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_translations_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_translations_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_translations_translation_lang_id_foreign` FOREIGN KEY (`translation_lang_id`) REFERENCES `translation_languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_translations_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sitinfos`
--
ALTER TABLE `sitinfos`
  ADD CONSTRAINT `sitinfos_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sitinfos_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sitinfos_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `translation_languages`
--
ALTER TABLE `translation_languages`
  ADD CONSTRAINT `translation_languages_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `translation_languages_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `translation_languages_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_regions`
--
ALTER TABLE `user_regions`
  ADD CONSTRAINT `user_regions_created_by_user_id_foreign` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_regions_deleted_by_user_id_foreign` FOREIGN KEY (`deleted_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_regions_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_regions_updated_by_user_id_foreign` FOREIGN KEY (`updated_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_regions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
