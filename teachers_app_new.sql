-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 06:57 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teachers_app_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(10) UNSIGNED NOT NULL,
  `country` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `state`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Trivandrum', 1, 1, 1, NULL, NULL),
(2, 'Kollam', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_landline` varchar(20) NOT NULL,
  `contact_mobile` varchar(20) NOT NULL,
  `contact_message` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `contact_name`, `contact_email`, `contact_landline`, `contact_mobile`, `contact_message`, `updated_at`, `created_at`) VALUES
(1, 'contact name', 'email@email.com', '0471 299200', '98387727', 'Hiiiiii', '2020-05-01 07:04:59', '2020-05-01 07:04:59'),
(2, 'contact name', 'email@email.com', '0471 299200', '98387727', 'Hiiiiii', '2020-05-01 07:06:28', '2020-05-01 07:06:28'),
(8, 'SUJITH KUMAR.S', 'ssujithkumar44@gmail.com', '09578382036', '09578382036', 'adffdafda', '2020-05-01 07:27:44', '2020-05-01 07:27:44'),
(7, 'SUJITH KUMAR.S', 'ssujithkumar44@gmail.com', '09578382036', '09578382036', 'adffdafda', '2020-05-01 07:26:04', '2020-05-01 07:26:04'),
(6, 'SUJITH KUMAR.S', 'ssujithkumar44@gmail.com', '09578382036', '09578382036', 'adffdafda', '2020-05-01 07:15:44', '2020-05-01 07:15:44'),
(9, 'SUJITH KUMAR.S', 'ssujithkumar44@gmail.com', '09578382036', '09578382036', 'adffdafda', '2020-05-01 07:28:13', '2020-05-01 07:28:13'),
(10, 'SUJITH KUMAR.S', 'ssujithkumar44@gmail.com', '09578382036', '09578382036', 'adffdafda', '2020-05-01 07:29:17', '2020-05-01 07:29:17'),
(11, 'SUJITH KUMAR.S', 'ssujithkumar44@gmail.com', '09578382036', '09578382036', 'adffdafda', '2020-05-01 07:32:29', '2020-05-01 07:32:29'),
(12, 'SUJITH KUMAR.S', 'ssujithkumar44@gmail.com', '09578382036', '09578382036', 'adffdafda', '2020-05-01 07:34:38', '2020-05-01 07:34:38'),
(13, 'SUJITH KUMAR.S', 'ssujithkumar44@gmail.com', 'India', '09578382036', 'fvxxc', '2020-05-26 14:29:44', '2020-05-26 14:29:44'),
(14, 'a', 'kane@mailinator.com', '2', '222', '2asds a', '2020-05-27 05:47:32', '2020-05-27 05:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'India', 1, NULL, NULL),
(2, 'UAE', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_basic_infos`
--

CREATE TABLE `event_basic_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `event_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE `event_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_cms`
--

CREATE TABLE `event_cms` (
  `id` int(10) UNSIGNED NOT NULL,
  `key_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_basic_info_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `menu_description` varchar(100) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `is_active`, `parent_id`, `menu_description`, `menu_order`, `url`) VALUES
(1, 'HOME', 1, 0, '', 1, 'listing'),
(2, 'MISSION AIMS & OBJECTIVES', 1, 0, '', 2, 'aims'),
(3, 'ABOUT US', 1, 0, '', 3, 'aboutUs'),
(4, 'CONTACT US', 1, 0, '', 4, 'contactUs');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_21_131507_entrust_setup_tables', 1),
(4, '2019_12_28_081745_create_event_categories_table', 1),
(5, '2019_12_28_082406_create_event_basic_infos_table', 1),
(6, '2019_12_30_041940_create_event_cms_table', 1),
(7, '2020_02_23_050929_create_user_basic_details_table', 1),
(8, '2020_02_23_052400_create_user_secondary_details_table', 1),
(9, '2020_02_29_133605_create_qualification_table', 1),
(10, '2020_02_29_145548_create_qualification_subject_table', 1),
(11, '2020_03_01_051936_create_country_table', 1),
(12, '2020_03_01_052145_create_state_table', 1),
(13, '2020_03_01_052204_create_city_tale', 1),
(14, '2020_03_01_052228_create_panchayath_table', 1),
(15, '2020_03_01_052251_create_pincode_table', 1),
(16, '2020_03_01_062449_create_user_qualifications_table', 1),
(17, '2020_03_01_064338_user_search_view', 1),
(19, '2020_03_10_110340_create_viewers_details_table', 2),
(20, '2020_03_15_093234_user_alter_query', 3);

-- --------------------------------------------------------

--
-- Table structure for table `panchayath`
--

CREATE TABLE `panchayath` (
  `id` int(10) UNSIGNED NOT NULL,
  `panchayath` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(10) UNSIGNED NOT NULL,
  `city` int(10) UNSIGNED NOT NULL,
  `country` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `panchayath`
--

INSERT INTO `panchayath` (`id`, `panchayath`, `state`, `city`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Aryanadu', 1, 1, 1, 1, NULL, NULL),
(2, 'Kanjiramkulam', 1, 1, 1, 1, NULL, NULL),
(3, 'Kilimanoor', 1, 1, 1, 1, NULL, NULL),
(4, 'Parassala', 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin.home', 'Admin Home Page', 'done', NULL, NULL),
(2, 'acl.role.view', 'Acl Role view', 'Acl Role view', NULL, NULL),
(3, 'acl.role.manage', 'Acl Role Manage', 'done', NULL, NULL),
(4, 'assign.role.permission', 'assign.role.permission', NULL, NULL, NULL),
(5, 'acl.perms.view', 'acl.perms.view', NULL, NULL, NULL),
(6, 'acl.perms.manage', 'acl.perms.manage', NULL, NULL, NULL),
(7, 'acl.perms.edit', 'acl.perms.edit', NULL, NULL, NULL),
(8, 'acl.perms.delete', 'acl.perms.delete', NULL, NULL, NULL),
(9, 'admin.viewer', 'adminviewer', 'adminviewer', '2020-03-10 08:51:38', '2020-03-10 08:59:05'),
(10, 'admin.user.listing', 'admin.user.listing', 'admin.user.listing', '2020-03-15 08:24:40', '2020-03-15 08:24:40'),
(11, 'edit_account', 'edit_account', 'edit_account', '2020-03-16 09:15:07', '2020-03-16 09:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 2),
(11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pincode`
--

CREATE TABLE `pincode` (
  `id` int(10) UNSIGNED NOT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panchayath` int(10) UNSIGNED NOT NULL,
  `state` int(10) UNSIGNED NOT NULL,
  `city` int(10) UNSIGNED NOT NULL,
  `country` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pincode`
--

INSERT INTO `pincode` (`id`, `pincode`, `panchayath`, `state`, `city`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '695542', 1, 1, 1, 1, 1, NULL, NULL),
(2, '695524', 2, 1, 1, 1, 1, NULL, NULL),
(3, '695601', 3, 1, 1, 1, 1, NULL, NULL),
(4, '695502', 4, 1, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id` int(10) UNSIGNED NOT NULL,
  `qualification_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualification_subject`
--

CREATE TABLE `qualification_subject` (
  `id` int(10) UNSIGNED NOT NULL,
  `qualification_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, NULL, NULL),
(2, 'teacher', 'Teacher', NULL, NULL, NULL),
(3, 'resource_person', 'Resource Person', NULL, NULL, NULL),
(5, 'user', 'Institution/Organization', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(6, 2),
(7, 2),
(13, 2),
(14, 2),
(15, 1),
(16, 5),
(19, 5),
(20, 5),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 5),
(26, 3),
(27, 2),
(28, 2),
(29, 3),
(30, 2),
(33, 5),
(34, 5),
(35, 2),
(36, 2),
(37, 2),
(38, 3),
(39, 5),
(40, 3),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 3),
(48, 2),
(49, 3),
(50, 2),
(53, 2),
(56, 5);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_id`, `state`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kerala', 1, NULL, NULL),
(2, 1, 'Tamilnadu', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_numer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone_numer`) VALUES
(6, 'asdfsf', 'hg@dfg.dfg', NULL, '$2y$10$02.tWfok5sLtfwFk6bZdv.XQ.KuDlsk3yXbqEIN0xse7D8dUqJ.ie', NULL, '2020-03-08 00:16:42', '2020-03-08 00:16:42', NULL),
(7, 'asdfasd', 'dfgdf@fghfgh.fghfgh', NULL, '$2y$10$gU2txEJsMf6WHdnwjEqCM.TVkCNgRjRRWyGPubniErAlpl/quAiQW', NULL, '2020-03-08 05:19:16', '2020-03-08 05:19:16', NULL),
(13, 'Bergin', 'ger@fgfg.fg', NULL, '$2y$10$ZAEkqBQ2R0Rf0/yAnS1SH.7Bu4VSklvBw.pVYpyiRylxdN5XSdPV2', NULL, '2020-03-08 09:39:18', '2020-03-08 09:39:18', NULL),
(14, 'Sharma', 'rubinmon92@gmail.com', NULL, '$2y$10$EjewmfZz3Mfvgg3vdfL2s.gLZtdEJOlmDQvLDXkuUMDMUBeZrwsse', 'IydFE6xdYOpJzlfrN7r6pN3CKZlwbdGvK2sncgD0brqpVHpio3erzWLQG11K', '2020-03-10 01:51:24', '2020-03-10 01:51:24', NULL),
(15, 'rubin mon', 'admin@mailinator.com', NULL, '$2y$10$EjewmfZz3Mfvgg3vdfL2s.gLZtdEJOlmDQvLDXkuUMDMUBeZrwsse', '451wjiI5SFGYVUuiTRfoBprjSPHpHfOwUZWngYNRe6DmMO2heS6qnCXtft1Y', '2020-03-10 01:57:42', '2020-03-10 01:57:42', NULL),
(16, 'sharma', 'rubinmon93@gmail.com', NULL, '$2y$10$TFRprM6455HahpZQY2cQ8eEaRPJFTVQx7WYdCrkQ3iTJ3Rc.N62nu', 'yKziihwtHaA2LfyB3s1fa85g1Ji6lee27MzmhVQSWesgc2UALET9noEGBIox', '2020-03-10 08:03:08', '2020-03-10 08:03:08', NULL),
(17, 'prathap', 'prathap@gmail.com', NULL, '$2y$10$HJfnH3Lb3f46nqhtz2fWjurZTz3Ft/oIQiQxw4GqOwtHa9XOAYaLC', NULL, '2020-03-10 08:10:21', '2020-03-10 08:10:21', NULL),
(19, 'rubin mon', 'rubinmon94@gmail.com', NULL, '$2y$10$u6UrGUlXq11WMJ8yJ0Rcl.jOqDLkDknlDRDciaqGZ40BW8q3mYy7W', 'VLdMXLtb8p64KowutBAjDVcyIZalapHeAmmF0n5eoUXtXTsxgxhYBZnH8dsF', '2020-03-10 08:16:55', '2020-03-10 08:16:55', NULL),
(20, 'rubin mon67', 'rubinmon67@gmail.com', NULL, '$2y$10$vhwPPmGeM8iP0wvY21ZdK.2/Xf6I5lIuWpA0v/BKlFv2bUeSfdTA6', 'M3Iji5BjiCv1YTszL4ok6wsYA5EZ6anDVWTJXw45AoXPLEXE3NSx1j1z0lwR', '2020-03-10 08:19:25', '2020-03-10 08:19:25', NULL),
(21, 'SreeKanth', 'sreekanth@gmaiol.com', NULL, '$2y$10$GliD0VXkoeWuzjZaOgqyu.BR9JBQdCo7uz/ubkBFfAFXYJpNeyc36', NULL, '2020-03-14 02:16:57', '2020-03-14 02:16:57', NULL),
(22, 'sreekanth', 'sreekanth@gmail.com', NULL, '$2y$10$5AiklbcuP6ytIDP.ojaI1ufrb.VGS5bFYsoOEfvFDSWpz95aagZXq', NULL, '2020-03-14 02:48:49', '2020-03-14 02:48:49', NULL),
(23, 'A', 'hsg@hdd.df', NULL, '$2y$10$D2wYBoDXCtscV1cn.rrvxeaeWI7fjreoVjEsfMa.E5hIhxGp03jbW', NULL, '2020-04-16 08:40:42', '2020-04-16 08:40:42', NULL),
(24, 'Charles', 'charles@mailinator.com', NULL, '$2y$10$.VXLQ4qynocQeZ0hVQfwe.oMbVA94sgwLDfgsyQryVHZRmM7N0OyK', NULL, '2020-04-17 03:47:01', '2020-04-17 03:47:01', NULL),
(25, 's', 'ss@sas.hh', NULL, '$2y$10$yDp1cBX3dTeyUae.kLvj3.qImTVYmBNBhsDCtdHMnv.AatZAenHpa', NULL, '2020-04-18 09:16:03', '2020-04-18 09:16:03', NULL),
(26, 'q', 'sass@ssss.gf', NULL, '$2y$10$s8xKqrWaPlCSpiv1poDnduT7nxENntsqkR1K0RLnXsHtSK1P49oL2', NULL, '2020-04-18 09:19:07', '2020-04-18 09:19:07', NULL),
(27, 'Hari', 'hari@mailinator.com', NULL, '$2y$10$zNhZZi1rTSonJaCWtFuk7.DIkj80iAU13yNsjtPzK1Eem09AVxZfK', NULL, '2020-04-18 13:23:33', '2020-04-18 13:23:33', NULL),
(28, 'Hari', 'rama@mailinator.com', NULL, '$2y$10$FcMwGe2rwu/2tQWBgeDuQO95ubieFyC6XHD9uBoCqFodOvNk4FC..', NULL, '2020-04-18 13:28:36', '2020-04-18 13:28:36', NULL),
(29, 'Lal', 'ha@mailinator.com', NULL, '$2y$10$H063h7Wn7hAEbgZP6R1X7OTdVlfyzvbiFJ3yH4b9A3L6BmgpyUimW', NULL, '2020-04-18 13:34:09', '2020-04-18 13:34:09', NULL),
(30, 'Jai', 'jai@mailinator.com', NULL, '$2y$10$Q4PHnLsZOiD8rJKNFUx/6.CGi.vkfZeilwhVr3kodJ4zv6Lxyj.uy', NULL, '2020-04-18 13:37:06', '2020-04-18 13:37:06', NULL),
(33, 'rubin mon', 'rubinmon@gmail.com', NULL, '$2y$10$NwSPwLNSRiCxaylX1fjAV.EZMYtuTZF9ssFh/eCsTvoIRi8iIZQx6', 'bGLE9DnLJY54QjdGq69uOLDvoMgdRv0aaczu6rx5wpAZoc77taKl1rreiCJb', '2020-04-19 02:18:23', '2020-04-19 02:18:23', NULL),
(34, 'Ghh', 'ghjj@bnmmdft.ggg', NULL, '$2y$10$sLr6rtYwtl./zptVLJGRwe./25sclrmU1PAdF1oNiCambY/iirG/.', NULL, '2020-04-19 03:08:10', '2020-04-19 03:08:10', NULL),
(35, 'Yiiuu', 'igf@fgj.ffyu', NULL, '$2y$10$cOmeDh7vDdQL2ttB2Y4.Qeuo3CesAkMVOmpxCUTbExqafyjsJgULS', NULL, '2020-04-19 03:11:56', '2020-04-19 03:11:56', NULL),
(36, 'tu', 'sharmaabina@mailinator.com', NULL, '$2y$10$AlnRzGVlVcnxexY1/qtFK.ruGBZihgW8SSVNr0IqjKTUmasVokEuO', NULL, '2020-04-19 03:26:16', '2020-04-19 03:26:16', NULL),
(37, 'Alex', 'alex@mailinator.com', NULL, '$2y$10$682E7AwoIAh3FT8NLbKoVuBiM4CepYSXC4SrhdIDbh4.sb5qFMMF.', 'LWDczElTwhqT9KCYPYMuePasCcm7jibzmhvv9c8mW6kTqIdKaphRJt3k1IYL', '2020-04-19 03:38:12', '2020-04-19 03:38:12', NULL),
(38, 'Albin', 'albin@mailinator.com', NULL, '$2y$10$cbrCDWNwwUqO7ITo0tFWeeKA9Gg9KNAI4ShjHvwcd5XEYSpC0852e', 'Y8ezGHOvGQp2GaYqoQ9ZTyXrLByzUrmFwUvgXsBCAOYHEjTWVmBptBGhOCGU', '2020-04-19 03:46:47', '2020-04-19 03:46:47', NULL),
(39, 'Abu', 'abu@mailinator.com', NULL, '$2y$10$VeDFBCJ/39.9lBHHXNEHi.QupQj8x.ZT8UAE5Jf1G/kkcqLdimP42', NULL, '2020-04-19 03:50:33', '2020-04-19 03:50:33', NULL),
(40, 'dob', 'vcbbcv@dffd.hjj', NULL, '$2y$10$e67GRX2QN73HZxAR4wERp.05Wz6cnJoDZ4HjNd7ga2W1JT8kUCXT2', '32WxL1OukjW2gZMtj4SSkJzQVBDvnusGfG3a2xVeUB0681t036doDroDHvGq', '2020-04-19 11:57:49', '2020-04-19 11:57:49', NULL),
(41, 'Lala', 'lala@mailinator.com', NULL, '$2y$10$XK4eeAj/5wSNXLLXbvddIuk6HtO4kwMEkvg.Epb4RXiUNuF5xVz6C', NULL, '2020-04-19 12:09:35', '2020-04-19 12:09:35', NULL),
(42, 'anoop', 'sree@gmail.com', NULL, '$2y$10$ONxDSK5.xUpthGiRPdAV5e8z1d/6kGuWNsCSBppyWVi6cSue5xntu', NULL, '2020-04-29 09:19:00', '2020-04-29 09:19:00', NULL),
(43, 'teac', 'teach@email.com', NULL, '$2y$10$OlHoJYeASfJIh.QpeGNoV.cxjZ/WsQWukMnwHvLrfZzyQoKPLbYGm', NULL, '2020-04-30 04:31:50', '2020-04-30 04:31:50', NULL),
(44, 'Tech', 'dddfgffs@fssd.dgfd', NULL, '$2y$10$jJBNe/NAOGkijpkVAfXH4u8s5PXqNiJiXYxcVcrZ1hHNrDg.ei1DS', NULL, '2020-05-01 05:44:06', '2020-05-01 05:44:06', NULL),
(45, 'Tech', 'dddfgffs@fssd.dgfds', NULL, '$2y$10$XbQrihfJKMKk6Wqki7/BiOiEox/2L4RoaTtIHa0HHQrDxSwd1wRUm', NULL, '2020-05-01 05:48:50', '2020-05-01 05:48:50', NULL),
(46, 'Tech', 'eddfgffs@fssd.dgfds', NULL, '$2y$10$LHW9pXYV1WTu9Jxj12DiVOIMUN.uWinGy991qqFFaFkM/4biN3M5O', NULL, '2020-05-01 05:52:45', '2020-05-01 05:52:45', NULL),
(47, 'Teacher', 'email@email.com', NULL, '$2y$10$aW4jFXyPdlvUdPSBIjdlEOwppsNb4MWcgEIRzCjUZLKJEeOlZUPI.', NULL, '2020-05-26 14:47:13', '2020-05-26 14:47:13', NULL),
(48, 'Aravind', 'aravind@mailinator.com', NULL, '$2y$10$pmN9Hfa.Yf7v9EKMAEfaHuk/aHpS4omVEXyyPzDoz1N0AtOzYN0ue', 'hHG9xHL1CHDeQ9HAKB92e2Opge0wIpXrHw10wUzWYR3vmFsVZMrew6ya3nNq', '2020-05-27 06:15:50', '2020-05-27 06:15:50', NULL),
(49, 'Q', 'q@mailinator.com', NULL, '$2y$10$gSXKjqePQNoa5TxJTNMLBuCNE1fJKki.bgPunY2UjZhG9TI.tdBoK', NULL, '2020-05-27 06:26:58', '2020-05-27 06:26:58', NULL),
(50, 'Rubin', 'rubinmon1234@mailinator.com', NULL, '$2y$10$yQ7Pd/8BXh1XF6P/tuID0OfuNLpP0l10/APIMTAVmeaIbotJIIlZK', 'L6ZwlShWIUgkkPQIntyBkWTyytQsJeTLmktP41h9UifFUnAzbixfa8ziwqHR', '2020-05-30 04:37:26', '2020-05-30 04:37:26', NULL),
(51, 'Rubin', 'rubin12345@mailinator.com', NULL, '$2y$10$3D.DQ.KP28OGk/gNpv5yK.yYp/3kk1GqeVtOr0PabBbfdqThOCNFC', NULL, '2020-05-30 05:08:27', '2020-05-30 05:08:27', NULL),
(53, 'sfdg', 'rubinmon82@gmail.com', NULL, '$2y$10$2JhXMM8nz1bXK2vHJWkime5yMPTz8xOB2VZ5nT8eIO1YHtzcWslPa', 'E0UpPAPNXzMhjrdhejdaqUVV341uO0R5fXLNi3TQxkVM943mUc3grRRNgtff', '2020-05-30 05:13:26', '2020-05-30 05:13:26', NULL),
(54, 'sha', 'sha@mailinator.com', NULL, '$2y$10$o5euEzrR6kNJPslsB6SE1ua4JwGX5J7EwKsftiInkkLmiXfVYQZ5u', NULL, '2020-05-30 07:05:05', '2020-05-30 07:05:05', NULL),
(56, 'sha', 'sha1@mailinator.com', NULL, '$2y$10$N9J8jas1t0yWVBxdpZV1jetXhJfckI0oj5t71kkc1RQ7swGv9ne5K', '5tUvE5VJdZ2HGPJiXOwpO4xyMTqwb5c26iCpDa7bbt93ESVBO2O39JdTSCZY', '2020-05-30 07:06:22', '2020-05-30 07:06:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_basic_details`
--

CREATE TABLE `user_basic_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educational_qualifications` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_house_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_house_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_landmark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_village` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_postoffice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_block` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_panchayath` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_or_spouse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_or_spouse_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_or_spouse_relation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_or_spouse_contact_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_or_spouse_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `expected_salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` int(10) UNSIGNED NOT NULL,
  `state` int(10) UNSIGNED NOT NULL,
  `city` int(10) UNSIGNED NOT NULL,
  `panchayath` int(10) UNSIGNED NOT NULL,
  `pincode` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userImages` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_basic_details`
--

INSERT INTO `user_basic_details` (`id`, `name`, `user_id`, `subject`, `educational_qualifications`, `address`, `address_house_name`, `address_house_no`, `address_landmark`, `address_village`, `address_postoffice`, `address_block`, `address_panchayath`, `address_district`, `address_state`, `address_pincode`, `age`, `date_of_birth`, `sex`, `father_or_spouse`, `father_or_spouse_name`, `father_or_spouse_relation`, `father_or_spouse_contact_no`, `father_or_spouse_email`, `religion`, `community`, `status`, `expected_salary`, `country`, `state`, `city`, `panchayath`, `pincode`, `created_at`, `updated_at`, `userImages`) VALUES
(2, 'asdfsf', 6, NULL, NULL, NULL, 'sdf', 'sdf', 'hfgf', 'hgfgh', 'fhg', 'f', NULL, NULL, NULL, NULL, '234', '03/08/2020', 'Male', NULL, NULL, 'fdsf', '123123', 'jgjg@dfg.dsfg', 'sadfds', 'fsdf', 1, '123k', 1, 1, 1, 1, 1, '2020-03-08 00:16:42', '2020-03-08 00:16:42', NULL),
(3, 'asdfasd', 7, NULL, NULL, NULL, 'dfgjhkjdh', 'gjhg', 'jhgjh', 'gjh', 'ghj', 'g', NULL, NULL, NULL, NULL, '55', '03/08/2020', 'Male', NULL, NULL, 'hhg', 'hfhg', 'hgjhg@gfhgf.hfgh', 'gfdhfgh', 'fdgdfg', 1, '45', 1, 1, 1, 1, 1, '2020-03-08 05:19:16', '2020-03-08 05:19:16', NULL),
(7, 'Bergin', 13, NULL, NULL, NULL, 'tet', 'h', 'h', 'fhg', 'fg', 'h', NULL, NULL, NULL, NULL, '12', '03/11/2020', 'Male', NULL, NULL, 'dsfsdf', '2323432', 'ggdf@dfgdf.csdc', 'jfhgfhg', 'gfhfhf', 1, '2423', 1, 1, 1, 1, 1, '2020-03-08 09:39:18', '2020-03-08 09:39:18', NULL),
(8, 'Sharma', 14, NULL, NULL, NULL, 'sd', '123', 'sss', 'sss', 'sss', 'sss', NULL, NULL, NULL, NULL, '34', '03/17/2020', 'Male', NULL, NULL, 'ss', '8220509953', 'rubinmon92@gmail.com', 'ss', 'ss', 1, '250000', 2, 1, 1, 1, 1, '2020-03-10 01:51:24', '2020-05-31 00:08:01', '[\"Henryjona.jpg\",\"83.jpg\"]'),
(9, 'SreeKanth', 21, NULL, NULL, NULL, 'test', '123', '123', 'test', '123456', '123456', NULL, NULL, NULL, NULL, '12', '02/11/2020', 'Male', NULL, NULL, 'test', 'test', 'test', 'test', 'test', 1, '120000', 1, 1, 1, 1, 1, '2020-03-14 02:16:58', '2020-03-14 02:16:58', '[\"11523731-vintage-vector-card-design-royal-gold-ornament-luxury-border-background-page-for-text-victorian-style-rich-element-for-wedding-decoration-and-invitation-creative-design.jpg\"]'),
(10, 'sreekanth', 22, NULL, NULL, NULL, 'testing', '123456', 'testing', 'testing', 'testing', 'testing', NULL, NULL, NULL, NULL, '20', '02/04/2020', 'Male', NULL, NULL, 'sreekanth', 'sreekanth', 'sreekanth@gmail.com', 'sreekanth', 'sreekanth', 1, '20000', 1, 1, 1, 1, 1, '2020-03-14 02:48:49', '2020-03-14 02:48:49', '[\"ub_logo5.png\"]'),
(11, 'A', 23, NULL, NULL, NULL, 'N', 'N', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, '56', '04/01/2020', 'Male', NULL, NULL, 'H', '7', 'Vv@hh.dd', 'Hh', 'Bb', 1, '55', 1, 1, 1, 1, 1, '2020-04-16 08:40:42', '2020-04-16 08:40:42', '[\"1587026419103-132219017.jpg\"]'),
(12, 'Charles', 24, NULL, NULL, NULL, 'Charles House', '789', 'Technopark', 'Kazhakuttom', 'Karyavattom', 'Pothencode', NULL, NULL, NULL, NULL, '42', '12/10/2019', 'Male', NULL, NULL, 'Father', '23424', 'sini@mailinator.com', 'No', 'Christain', 1, '4', 1, 1, 1, 1, 1, '2020-04-17 03:47:01', '2020-04-17 03:47:01', '[\"Charles.jpg\"]'),
(13, 'q', 26, NULL, NULL, NULL, 'Mariya House', '1213', 'Tech mart', 'Kattakkada', 'Killy', 'Amachal', NULL, NULL, NULL, NULL, '12', '03/18/2020', 'Male', NULL, NULL, 'Father', '3', 'df@eee.gg', 'Christain', 'Christain', 1, '22', 1, 1, 1, 1, 1, '2020-04-18 09:19:07', '2020-04-18 09:19:07', '[\"download.jpg\"]'),
(14, 'Hari', 27, NULL, NULL, NULL, 'Mariya House', '1213', 'Tech mart', 'Kattakkada', 'Killy', 'Amachal', NULL, NULL, NULL, NULL, '40', '03/11/2020', 'Male', NULL, NULL, 'Father', '4455445544', 'albsert@gmail.com', 'No', 'Christain', 1, '15000', 1, 1, 1, 1, 1, '2020-04-18 13:23:33', '2020-04-18 13:23:33', '[\"download.jpg\"]'),
(15, 'Hari', 28, NULL, NULL, NULL, 'Mariya House', '1213', 'Tech mart', 'Kattakkada', 'Karyavattom', 'Amachal', NULL, NULL, NULL, NULL, '40', '03/18/2020', 'Male', NULL, NULL, 'Father', '4455445544', 'albwert@gmail.com', 'Christain', 'Christain', 1, '15000', 1, 1, 1, 1, 1, '2020-04-18 13:28:36', '2020-04-18 13:28:36', '[\"download.jpg\"]'),
(16, 'Lal', 29, NULL, NULL, NULL, 'f', 'f', 'f', 'f', 'f', 'f', NULL, NULL, NULL, NULL, '11', '02/11/2020', 'Male', NULL, NULL, 'Father', '4455445544', 'jofchn@gmail.com', 'Christain', 'Christain', 1, '28000', 1, 1, 1, 1, 1, '2020-04-18 13:34:09', '2020-04-18 13:34:09', '[\"download.jpg\"]'),
(17, 'Jai', 30, NULL, NULL, NULL, 'Mariya House', '1213', 'Tech mart', 'Kattakkada', 'Karyavattom', 'Amachal', NULL, NULL, NULL, NULL, '35', '02/12/2020', 'Male', NULL, NULL, 'Father', '333', 'jofc2hn@gmail.com', 'Christain', 'Christain', 1, '30000', 1, 1, 1, 1, 1, '2020-04-18 13:37:06', '2020-04-18 13:37:06', '[\"Charles.jpg\"]'),
(18, 'Yiiuu', 35, NULL, NULL, NULL, 'Hyhh', 'Ghjjj', 'Jjjg', 'Ggggg', 'Fffgh', 'Ffghh', NULL, NULL, NULL, NULL, '35', '03/30/2020', 'Male', NULL, NULL, 'Ggjj', '47897423', 'Vbjjh@fhk.dffg', 'Hhggg', 'Fghj', 1, '35k', 1, 1, 1, 1, 1, '2020-04-19 03:11:56', '2020-04-19 03:11:56', '[\"400012200018_149041.jpg\"]'),
(19, 'tu', 36, NULL, NULL, NULL, 'dfg', 'dg', 'sdfg', 'sdg', 'dsfg', 'sdfg', NULL, NULL, NULL, NULL, '5', '04/08/2020', 'Male', NULL, NULL, 'sdg', '54654634', '9944234774', 'erty', 'rty', 1, '20000', 1, 1, 1, 1, 1, '2020-04-19 03:26:16', '2020-04-19 03:26:16', '[\"83.jpg\"]'),
(20, 'Alex', 37, NULL, NULL, NULL, 'a', 'a', 'a', 'a', 'a', 'a', NULL, NULL, NULL, NULL, '2', '02/11/2020', 'Male', NULL, NULL, 's', 's', 'jofc2hwn@gmail.com', 'Christain', 'Christain', 1, '28000', 1, 1, 1, 1, 1, '2020-04-19 03:38:12', '2020-04-19 03:38:12', '[\"download.jpg\"]'),
(21, 'Albin', 38, NULL, NULL, NULL, 's', 's', 's', 's', 's', 's', NULL, NULL, NULL, NULL, '3', '04/13/2020', 'Male', NULL, NULL, 'Father', '333', 'jofc2shn@gmail.com', 'No', 'Christain', 1, '30000', 1, 1, 1, 1, 1, '2020-04-19 03:46:47', '2020-04-19 03:46:47', '[\"images.jpg\"]'),
(22, 'dob', 40, NULL, NULL, NULL, 'dfsdfd', 'fsdfsd', 'fdfds', 'fsdfdsf', 'ffdsfdsf', 'fsdffdfd', NULL, NULL, NULL, NULL, '30', '07/10/1990', 'Male', NULL, NULL, 'fgdfgd', '765657556', 'fgfbbf@dgf.hf', 'dddb', 'vbxbb', 1, '100000', 1, 1, 1, 1, 1, '2020-04-19 11:57:49', '2020-04-19 11:57:49', '[\"about-phil-side-banner--photo.jpg\"]'),
(23, 'Lala', 41, NULL, NULL, NULL, 'H', 'H', 'B', 'B', 'N', 'N', NULL, NULL, NULL, NULL, '58', '04/13/2020', 'Male', NULL, NULL, 'B', '8', 'Gg@gv.dd', 'H', 'B', 1, '266', 1, 1, 1, 1, 1, '2020-04-19 12:09:35', '2020-04-19 12:09:35', '[\"1587297787275396173738.jpg\"]'),
(24, 'anoop', 42, NULL, NULL, NULL, 'jammmu', 'as14', 'a temp', 'neyyattinkara', '695501', 'nemom', NULL, NULL, NULL, NULL, '25', '06/06/1994', 'Male', NULL, NULL, 'father', '555546545564', 'hdcfjhdh@gmail.com', 'dfgg', 'gfdsg', 1, '30000', 1, 1, 1, 2, 2, '2020-04-29 09:19:00', '2020-04-29 09:19:00', '[\"Chrysanthemum.jpg\"]'),
(25, 'teac', 43, NULL, NULL, NULL, 'hse', '1234', 'land', 'village', 'post', 'block', NULL, NULL, NULL, NULL, '29', '06/12/1991', 'Male', NULL, NULL, 'father', '9876543256', 'teach@email.com', 'religion', 'community', 1, '100000', 1, 1, 1, 1, 1, '2020-04-30 04:31:50', '2020-04-30 04:31:50', '[\"download.jpg\"]'),
(26, 'Tech', 44, NULL, NULL, NULL, 'bdfb', 'gdbd', 'dbd', 'bdbd', 'dfbdfdf', 'bfdbfdb', NULL, NULL, NULL, NULL, '29', '06/12/1991', 'Male', NULL, NULL, 'fadsf', '545', 'dfdfvxz@sfdgfdg.fdss', 'fadsaf', 'fasfas', 1, '100000', 1, 1, 1, 1, 1, '2020-05-01 05:44:06', '2020-05-01 05:44:06', '[\"download.jpg\"]'),
(27, 'Tech', 45, NULL, NULL, NULL, 'bdfb', 'gdbd', 'dbd', 'bdbd', 'dfbdfdf', 'bfdbfdb', NULL, NULL, NULL, NULL, '29', '06/12/1991', 'Male', NULL, NULL, 'fadsf', '545', 'dfdfvxz@sfdgfdg.fdsss', 'fadsaf', 'fasfas', 1, '100000', 1, 1, 1, 1, 1, '2020-05-01 05:48:50', '2020-05-01 05:48:50', '[\"download.jpg\"]'),
(28, 'Tech', 46, NULL, NULL, NULL, 'bdfb', 'gdbd', 'dbd', 'bdbd', 'dfbdfdf', 'bfdbfdb', NULL, NULL, NULL, NULL, '29', '06/12/1991', 'Male', NULL, NULL, 'fadsf', '545', 'dfdfvxz@sfdgfdg.fdsss', 'fadsaf', 'fasfas', 1, '100000', 1, 1, 1, 1, 1, '2020-05-01 05:52:45', '2020-05-01 05:52:45', '[\"download.jpg\"]'),
(29, 'Teacher', 47, NULL, NULL, NULL, 'House', '123', 'Land', 'Village', 'Po', 'Block', NULL, NULL, NULL, NULL, '29', '05/14/2020', 'Male', NULL, NULL, 'Father', '743456', 'Email@email.com', 'Religion', 'Community', 1, '30000', 1, 1, 1, 4, 4, '2020-05-26 14:47:13', '2020-05-26 14:47:13', '[\"IMG-20200521-WA0019.jpg\"]'),
(30, 'Aravind', 48, NULL, NULL, NULL, 'q', 'q', 'q', 'q', 'q', 'q', NULL, NULL, NULL, NULL, '40', '05/04/2020', 'Male', NULL, NULL, 'Father', '21342', 'john@gmail.com', 'Christain', 'Christain', 1, '15000', 2, 1, 1, 1, 1, '2020-05-27 06:15:50', '2020-05-27 06:19:57', '[\"download.jpg\",\"download.jpg\"]'),
(31, 'Q', 49, NULL, NULL, NULL, 'q', 'q', 'q', 'q', 'q', 'q', NULL, NULL, NULL, NULL, '22', '05/10/2020', 'FeMale', NULL, NULL, 'q', 'q', 'qWs@sdafg.gj', 'Christain', 'Christain', 1, '11', 1, 1, 1, 3, 3, '2020-05-27 06:26:58', '2020-05-27 06:26:58', '[\"Charles.jpg\"]'),
(32, 'Rubin', 50, NULL, NULL, NULL, 'Test', '456789', 'd', 'd', 'd', 'd', NULL, NULL, NULL, NULL, '45', '05/30/2020', 'Male', NULL, NULL, 'ss', '65634563546', 'text@mailinator.com', 'nnn', 'dd', 1, '200000', 2, 1, 1, 4, 4, '2020-05-30 04:37:26', '2020-05-30 07:03:58', '[\"Image0044.jpg\",\"83.jpg\"]'),
(33, 'sfdg', 53, NULL, NULL, NULL, 'sdf', '4645', 'fert', 'dfg', 'sdf', 'asf', NULL, NULL, NULL, NULL, '45', '05/18/2020', 'Male', NULL, NULL, 'sdfasdf', '456346', 'rubinmon82@gmail.com', 'sss', 'sdfas', 1, '45000', 1, 1, 1, 1, 1, '2020-05-30 05:13:26', '2020-05-30 05:13:26', '[\"signsinduja.jpg\",\"rtshysr.jpg\"]');

-- --------------------------------------------------------

--
-- Table structure for table `user_qualifications`
--

CREATE TABLE `user_qualifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `qualification` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_passout` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_qualifications`
--

INSERT INTO `user_qualifications` (`id`, `user`, `qualification`, `year_passout`, `subject`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 13, 'BSC', '2012', 'computer science', 1, '2020-03-08 09:39:18', '2020-03-08 09:39:18'),
(2, 13, 'MCA', '2015', 'Computer Application', 1, '2020-03-08 09:39:18', '2020-03-08 09:39:18'),
(5, 21, 'BE', '2', 'Computer Science', 1, '2020-03-14 02:16:58', '2020-03-14 02:16:58'),
(6, 21, 'tech', '3', 'Comp', 1, '2020-03-14 02:16:58', '2020-03-14 02:16:58'),
(7, 22, 'BE', '2', 'Eelectronics', 1, '2020-03-14 02:48:49', '2020-03-14 02:48:49'),
(8, 23, 'B', 'B', 'B', 1, '2020-04-16 08:40:42', '2020-04-16 08:40:42'),
(9, 24, 'Bsc', '1', 'Hindi', 1, '2020-04-17 03:47:01', '2020-04-17 03:47:01'),
(10, 26, 'Msc', '22', 'Physics', 1, '2020-04-18 09:19:07', '2020-04-18 09:19:07'),
(11, 27, 'MPhil', '15', 'Computer Science', 1, '2020-04-18 13:23:33', '2020-04-18 13:23:33'),
(12, 28, 'MPhil', '10', 'Physics', 1, '2020-04-18 13:28:36', '2020-04-18 13:28:36'),
(13, 29, 'MPhil', '1', 'Physics', 1, '2020-04-18 13:34:09', '2020-04-18 13:34:09'),
(14, 30, 'Msc', '22', 'Physics', 1, '2020-04-18 13:37:06', '2020-04-18 13:37:06'),
(15, 35, 'Test', '5ys', 'Test', 1, '2020-04-19 03:11:56', '2020-04-19 03:11:56'),
(16, 36, 'MA', '2', 'English', 1, '2020-04-19 03:26:16', '2020-04-19 03:26:16'),
(17, 37, 'Bsc', '15', 'Physics', 1, '2020-04-19 03:38:12', '2020-04-19 03:38:12'),
(18, 38, 'Msc', '3', 'Physics', 1, '2020-04-19 03:46:47', '2020-04-19 03:46:47'),
(19, 40, 'bcbzbzb', '3', 'bzcbb', 1, '2020-04-19 11:57:49', '2020-04-19 11:57:49'),
(20, 41, 'B', 'G', 'N', 1, '2020-04-19 12:09:35', '2020-04-19 12:09:35'),
(21, 42, 'bsc', '2', 'chemistry', 1, '2020-04-29 09:19:00', '2020-04-29 09:19:00'),
(22, 42, 'msc', '2', 'chemistry', 1, '2020-04-29 09:19:00', '2020-04-29 09:19:00'),
(23, 42, 'mphil', '1', 'chemistry', 1, '2020-04-29 09:19:00', '2020-04-29 09:19:00'),
(24, 43, 'quali', '3', 'sub', 1, '2020-04-30 04:31:50', '2020-04-30 04:31:50'),
(25, 44, 'bcbzbzb', '3', 'bzcbb', 1, '2020-05-01 05:44:06', '2020-05-01 05:44:06'),
(26, 45, 'bcbzbzb', '3', 'bzcbb', 1, '2020-05-01 05:48:50', '2020-05-01 05:48:50'),
(27, 46, 'bcbzbzb', '3', 'bzcbb', 1, '2020-05-01 05:52:45', '2020-05-01 05:52:45'),
(28, 47, 'Quali', '4', 'Sub', 1, '2020-05-26 14:47:13', '2020-05-26 14:47:13'),
(30, 48, 'MPhil', '12', 'Physics', 1, '2020-05-27 06:19:57', '2020-05-27 06:19:57'),
(31, 49, 'MPhil', '1', 'Physics', 1, '2020-05-27 06:26:58', '2020-05-27 06:26:58'),
(34, 53, 'BA', '5', 'English', 1, '2020-05-30 05:13:26', '2020-05-30 05:13:26'),
(37, 50, 'MCA', '15', 'Computer Science', 1, '2020-05-30 07:03:58', '2020-05-30 07:03:58'),
(38, 50, 'Bsc', '2', 'Computer Science', 1, '2020-05-30 07:03:58', '2020-05-30 07:03:58'),
(55, 14, 'BA', '2', 'English', 1, '2020-05-31 00:23:42', '2020-05-31 00:23:42'),
(56, 14, 'MA', '2', 'English', 1, '2020-05-31 00:23:42', '2020-05-31 00:23:42');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_qualification_search`
-- (See below for the actual view)
--
CREATE TABLE `user_qualification_search` (
`id` int(10) unsigned
,`userImages` varchar(191)
,`name` varchar(191)
,`email` varchar(191)
,`qualification` text
,`subject` text
,`year_passout` text
,`country` varchar(100)
,`state` varchar(100)
,`city` varchar(100)
,`panchayath` varchar(100)
,`pincode` varchar(100)
,`age` varchar(191)
,`sex` varchar(191)
,`working_exp` varchar(191)
,`intrested_to_work` varchar(191)
,`expected_salary` varchar(191)
,`other_facilities_accomodation` varchar(191)
,`other_facilities_spouce_stay` varchar(191)
,`other_facilities_transportation` varchar(191)
,`marital_status` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `user_secondary_details`
--

CREATE TABLE `user_secondary_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_basic_id` int(10) UNSIGNED NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsup_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `physically_challanged` tinyint(4) NOT NULL DEFAULT '1',
  `working_exp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presently_working` tinyint(4) NOT NULL DEFAULT '1',
  `presently_working_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `done_any_course` tinyint(4) NOT NULL DEFAULT '1',
  `done_any_course_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intrested_to_work` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_working` tinyint(4) NOT NULL DEFAULT '1',
  `last_working_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_working_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_working_duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_vacate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_facilities` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_facilities_accomodation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_facilities_spouce_stay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_facilities_transportation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `landPhone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_secondary_details`
--

INSERT INTO `user_secondary_details` (`id`, `name`, `user_basic_id`, `mobile_number`, `alt_number`, `whatsup_number`, `email`, `physically_challanged`, `working_exp`, `presently_working`, `presently_working_description`, `done_any_course`, `done_any_course_description`, `intrested_to_work`, `last_working`, `last_working_name`, `last_working_address`, `last_working_duration`, `reason_vacate`, `other_facilities`, `other_facilities_accomodation`, `other_facilities_spouce_stay`, `other_facilities_transportation`, `created_at`, `updated_at`, `landPhone`, `marital_status`) VALUES
(2, 'asdfsf', 2, '6576', '576', '76876', 'hg@dfg.dfg', 2, '12', 1, 'dsaf', 2, NULL, 'Block', 1, 'sdfsdf', 'sdf', 'sdf', 'sdf', NULL, 'sdfsdf', 'sdfsdf', 'sdfsdf', '2020-03-08 00:16:42', '2020-03-08 00:16:42', '6757', 'Married'),
(3, 'asdfasd', 3, 'fdg', 'fdg', 'fgdfg', 'dfgdf@fghfgh.fghfgh', 2, '345', 2, NULL, 2, NULL, 'Anywhere in India', 1, 'dfgfd', 'dfgfd', '23', 'dfg', NULL, 'dfggdf', 'fdgd', 'gfhfgh', '2020-03-08 05:19:16', '2020-03-08 05:19:16', 'fdsgfdg', 'Married'),
(4, 'Bergin', 7, '644555454', '4654hg', '546454', 'ger@fgfg.fg', 2, '12', 2, NULL, 2, NULL, 'State', 1, 'wer', 'werwer', 'werwer', 'werewr', NULL, 'sdfsdfds', 'sdfsdf', 'sdfsdf', '2020-03-08 09:39:18', '2020-03-08 09:39:18', 'jgfahgfhg', 'Unmarried'),
(5, 'Sharma', 8, '8220509953', '8220509953', '8220509953', 'rubinmon92@gmail.com', 2, 'sd', 1, 'sds', 1, 'sd', 'Anywhere in India', 1, 's', 'sd', 's', 'sd', NULL, 'sds', 'sdd', 'sdds', '2020-03-10 01:51:24', '2020-03-10 01:51:24', '123456', 'Married'),
(6, 'SreeKanth', 9, '8220509953', '8220509953', '8220509954', 'sreekanth@gmaiol.com', 2, '12', 2, NULL, 2, NULL, 'State', 2, NULL, NULL, NULL, NULL, NULL, '5000', '1500', 'test', '2020-03-14 02:16:58', '2020-03-14 02:16:58', '123', 'Married'),
(7, 'sreekanth', 10, '123456', '123456', '123456', 'sreekanth@gmail.com', 2, '2', 1, 'sd', 2, NULL, 'Abroad', 2, NULL, NULL, NULL, NULL, NULL, 'sreekanth', 'sreekanth', 'sreekanth', '2020-03-14 02:48:50', '2020-03-14 02:48:50', '123456', 'Married'),
(8, 'A', 11, '7', '7', '7', 'hsg@hdd.df', 1, 'H', 1, 'B', 1, 'H', 'Abroad', 1, 'H', 'B', 'B', 'N', NULL, 'Hh', 'B', 'B', '2020-04-16 08:40:42', '2020-04-16 08:40:42', 'Bb', 'Married'),
(9, 'Charles', 12, '7744557744', '88554455', '99556655', 'charles@mailinator.com', 2, '8', 1, 'Yes', 2, NULL, 'State', 2, NULL, NULL, NULL, NULL, NULL, 'Yes', 'no', 'Yes', '2020-04-17 03:47:01', '2020-04-17 03:47:01', '047122895', 'Married'),
(10, 'q', 13, '1122111', '7788778877', '11212221', 'sass@ssss.gf', 1, '8', 2, NULL, 1, '5', 'Anywhere in India', 2, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '2020-04-18 09:19:07', '2020-04-18 09:19:07', '111', 'Married'),
(11, 'Hari', 14, '4477447744', '7788778877', '8877557788', 'hari@mailinator.com', 2, '8', 2, NULL, 2, NULL, 'District', 2, NULL, NULL, NULL, NULL, NULL, 'Yes', 'no', 'Yes', '2020-04-18 13:23:33', '2020-04-18 13:23:33', '8899889988', 'Married'),
(12, 'Hari', 15, '4477447744', '9955995599', '8877557788', 'rama@mailinator.com', 1, '8', 2, NULL, 2, NULL, 'Abroad', 2, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '2020-04-18 13:28:36', '2020-04-18 13:28:36', '7744774477', 'Married'),
(13, 'Lal', 16, '5', '3', '6', 'ha@mailinator.com', 2, '8', 2, NULL, 2, NULL, 'Anywhere in India', 2, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '2020-04-18 13:34:09', '2020-04-18 13:34:09', '5', 'Married'),
(14, 'Jai', 17, '4477447744', '7788778877', '9988779988', 'jai@mailinator.com', 2, '8', 2, NULL, 2, '5', 'State', 2, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '2020-04-18 13:37:06', '2020-04-18 13:37:06', '7744774477', 'Married'),
(15, 'Yiiuu', 18, '97646890', '97657890', '4679974333', 'igf@fgj.ffyu', 2, 'Ghhh', 2, NULL, 2, NULL, 'District', 1, 'Gghh', 'Ghjff', '4yrs', 'Gghhj', NULL, 'Gghhj', 'Ghhj', 'Fgjkk', '2020-04-19 03:11:56', '2020-04-19 03:11:56', 'Ghhhj', 'Married'),
(16, 'tu', 19, '546456456', '456546546', '456546546456', 'sharmaabina@mailinator.com', 2, '12', 1, 'hsdh', 2, NULL, 'Anywhere in India', 1, 'hdfh', 'dgfhdfgh', '67', 'gsdfg', NULL, 'sdfg', 'sdfg', 'sdfg', '2020-04-19 03:26:16', '2020-04-19 03:26:16', '546456464', 'Unmarried'),
(17, 'Alex', 20, '1', '1', '1', 'alex@mailinator.com', 1, '8', 2, NULL, 2, NULL, 'Abroad', 2, NULL, NULL, NULL, NULL, NULL, 'Yes', 'no', 'Yes', '2020-04-19 03:38:12', '2020-04-19 03:38:12', '1', 'Married'),
(18, 'Albin', 21, '2', '2', '2', 'albin@mailinator.com', 2, '10', 2, NULL, 2, NULL, 'State', 2, NULL, NULL, NULL, NULL, NULL, 's', 'no', 's', '2020-04-19 03:46:47', '2020-04-19 03:46:47', '2', 'Married'),
(19, 'dob', 22, '9877655455', '656465564', '64565464566', 'vcbbcv@dffd.hjj', 2, '4', 1, 'zfdafdzf', 2, NULL, 'Anywhere in India', 2, NULL, NULL, NULL, NULL, NULL, 'ffnf', 'bxbfx', 'vxcv', '2020-04-19 11:57:49', '2020-04-19 11:57:49', '645656', 'Married'),
(20, 'Lala', 23, '9', '8', '8', 'lala@mailinator.com', 2, '66', 2, NULL, 2, NULL, 'District', 2, NULL, NULL, NULL, NULL, NULL, 'Hh', 'B', 'B', '2020-04-19 12:09:35', '2020-04-19 12:09:35', '8', 'Married'),
(21, 'anoop', 24, '1234567890', '789456123', '321654987', 'sree@gmail.com', 2, '2', 2, NULL, 2, NULL, 'Anywhere in India', 2, NULL, NULL, NULL, NULL, NULL, 'gdsg', 'fgs', 'sgfsd', '2020-04-29 09:19:00', '2020-04-29 09:19:00', '0471222222', 'Married'),
(22, 'teac', 25, '9876543256', '9876543256', '9876543256', 'teach@email.com', 2, '5', 2, NULL, 2, NULL, 'Anywhere in India', 2, NULL, NULL, NULL, NULL, NULL, 'acc', 'spouce', 'trans', '2020-04-30 04:31:50', '2020-04-30 04:31:50', '0471234567', 'Unmarried'),
(23, 'Tech', 26, '432324', '432234', '4234332', 'dddfgffs@fssd.dgfd', 2, '5', 2, NULL, 2, NULL, 'Anywhere in India', 2, NULL, NULL, NULL, NULL, NULL, 'ffnf', 'bxbfx', 'vxcv', '2020-05-01 05:44:06', '2020-05-01 05:44:06', '24334', 'Married'),
(24, 'Tech', 27, '432324', '432234', '4234332', 'dddfgffs@fssd.dgfds', 2, '5', 2, NULL, 2, NULL, 'Anywhere in India', 2, NULL, NULL, NULL, NULL, NULL, 'ffnf', 'bxbfx', 'vxcv', '2020-05-01 05:48:50', '2020-05-01 05:48:50', '24334', 'Married'),
(25, 'Tech', 28, '432324', '432234', '4234332', 'eddfgffs@fssd.dgfds', 2, '5', 2, NULL, 2, NULL, 'Anywhere in India', 2, NULL, NULL, NULL, NULL, NULL, 'ffnf', 'bxbfx', 'vxcv', '2020-05-01 05:52:45', '2020-05-01 05:52:45', '24334', 'Married'),
(26, 'Teacher', 29, '457788', '3456778', '887654', 'email@email.com', 2, '5', 2, NULL, 2, NULL, 'Anywhere in India', 2, NULL, NULL, NULL, NULL, NULL, 'Acco', 'Stay', 'Trans', '2020-05-26 14:47:13', '2020-05-26 14:47:13', '08665', 'Unmarried'),
(27, 'Aravind', 30, '1', '1', '1', 'aravind@mailinator.com', 1, '8', 1, 'Yes', 1, '5', 'District', 2, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 'Yes', '2020-05-27 06:15:50', '2020-05-27 06:15:50', '1', 'Married'),
(28, 'Q', 31, '1', '1', '1', 'q@mailinator.com', 1, '8', 1, 'Yes', 2, NULL, 'Anywhere in India', 2, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 's', '2020-05-27 06:26:58', '2020-05-27 06:26:58', '22', 'Married'),
(29, 'Rubin', 32, '457845125', '78512525', '45852585', 'rubinmon1234@mailinator.com', 2, '12', 2, NULL, 1, 'Chemistry', 'Anywhere in India', 2, NULL, NULL, NULL, NULL, NULL, 'cxvxc', 'sdfsd', 'sdf', '2020-05-30 04:37:26', '2020-05-30 04:37:26', '7852653', 'Married'),
(30, 'sfdg', 33, '334534', '34563456', '45634563', 'rubinmon82@gmail.com', 1, '12', 2, NULL, 2, NULL, 'State', 2, NULL, NULL, NULL, NULL, NULL, 'sg', 'fsdf', 'ss', '2020-05-30 05:13:26', '2020-05-30 05:13:26', 'sdfgsdfg', 'Married');

-- --------------------------------------------------------

--
-- Table structure for table `viewers_details`
--

CREATE TABLE `viewers_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `viewed_by` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL,
  `contacted` tinyint(4) NOT NULL DEFAULT '0',
  `mail_status` tinyint(4) NOT NULL DEFAULT '0',
  `view_count` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `viewers_details`
--

INSERT INTO `viewers_details` (`id`, `viewed_by`, `profile_id`, `contacted`, `mail_status`, `view_count`, `created_at`, `updated_at`) VALUES
(1, 14, 13, 0, 0, 1, '2020-03-10 05:49:03', '2020-03-10 05:51:10'),
(2, 19, 14, 0, 0, 0, '2020-03-10 08:17:25', '2020-03-10 08:17:25'),
(3, 19, 16, 0, 0, 0, '2020-03-10 08:18:17', '2020-03-10 08:18:17'),
(4, 20, 14, 1, 0, 0, '2020-03-10 08:40:53', '2020-03-10 08:41:00'),
(5, 14, 20, 0, 0, 1, '2020-03-15 11:58:06', '2020-03-16 09:09:51'),
(6, 14, 14, 0, 0, 1, '2020-03-15 11:59:21', '2020-03-16 09:06:19'),
(7, 14, 7, 0, 0, 1, '2020-03-15 12:05:08', '2020-03-16 09:04:52'),
(8, 14, 19, 0, 0, 0, '2020-03-16 09:07:27', '2020-03-16 09:07:27'),
(9, 33, 14, 0, 0, 0, '2020-04-19 02:19:43', '2020-04-19 02:19:43'),
(10, 36, 36, 1, 0, 0, '2020-04-19 03:27:20', '2020-04-19 03:27:38'),
(11, 36, 13, 0, 0, 0, '2020-04-19 03:35:17', '2020-04-19 03:35:17'),
(12, 36, 14, 0, 0, 1, '2020-04-19 03:48:03', '2020-04-19 03:48:25'),
(13, 40, 40, 0, 0, 0, '2020-04-19 12:00:43', '2020-04-19 12:00:43'),
(14, 40, 29, 0, 0, 0, '2020-04-19 12:00:54', '2020-04-19 12:00:54'),
(15, 41, 41, 1, 0, 0, '2020-04-19 12:15:58', '2020-04-19 12:16:33'),
(16, 47, 47, 0, 0, 0, '2020-05-26 14:48:20', '2020-05-26 14:48:20'),
(17, 48, 48, 1, 0, 0, '2020-05-27 06:16:55', '2020-05-27 06:17:07'),
(18, 49, 49, 0, 0, 0, '2020-05-27 06:27:45', '2020-05-27 06:27:45'),
(19, 14, 48, 0, 0, 0, '2020-05-30 09:02:23', '2020-05-30 09:02:23'),
(20, 50, 50, 0, 0, 1, '2020-05-30 04:38:34', '2020-05-30 04:40:09'),
(21, 53, 53, 0, 0, 1, '2020-05-30 05:14:09', '2020-05-30 05:14:42');

-- --------------------------------------------------------

--
-- Structure for view `user_qualification_search`
--
DROP TABLE IF EXISTS `user_qualification_search`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_qualification_search`  AS  select distinct `users`.`id` AS `id`,`user_basic_details`.`userImages` AS `userImages`,`users`.`name` AS `name`,`users`.`email` AS `email`,(select group_concat(`user_qualifications`.`qualification` separator ',') from `user_qualifications` where (`user_qualifications`.`user` = `users`.`id`)) AS `qualification`,(select group_concat(`user_qualifications`.`subject` separator ',') from `user_qualifications` where (`user_qualifications`.`user` = `users`.`id`)) AS `subject`,(select group_concat(`user_qualifications`.`year_passout` separator ',') from `user_qualifications` where (`user_qualifications`.`user` = `users`.`id`)) AS `year_passout`,`country`.`country` AS `country`,`state`.`state` AS `state`,`city`.`city` AS `city`,`panchayath`.`panchayath` AS `panchayath`,`pincode`.`pincode` AS `pincode`,`user_basic_details`.`age` AS `age`,`user_basic_details`.`sex` AS `sex`,`user_secondary_details`.`working_exp` AS `working_exp`,`user_secondary_details`.`intrested_to_work` AS `intrested_to_work`,`user_basic_details`.`expected_salary` AS `expected_salary`,`user_secondary_details`.`other_facilities_accomodation` AS `other_facilities_accomodation`,`user_secondary_details`.`other_facilities_spouce_stay` AS `other_facilities_spouce_stay`,`user_secondary_details`.`other_facilities_transportation` AS `other_facilities_transportation`,`user_secondary_details`.`marital_status` AS `marital_status` from (((((((((`users` left join `user_basic_details` on((`user_basic_details`.`user_id` = `users`.`id`))) left join `user_secondary_details` on((`user_secondary_details`.`user_basic_id` = `user_basic_details`.`id`))) left join `country` on((`country`.`id` = `user_basic_details`.`country`))) left join `state` on((`state`.`id` = `user_basic_details`.`state`))) left join `city` on((`city`.`id` = `user_basic_details`.`city`))) left join `panchayath` on((`panchayath`.`id` = `user_basic_details`.`panchayath`))) left join `pincode` on((`pincode`.`id` = `user_basic_details`.`pincode`))) left join `role_user` on((`role_user`.`user_id` = `users`.`id`))) join `roles` on((`roles`.`id` = `role_user`.`role_id`))) where (`roles`.`name` not in ('admin','user')) having (`qualification` <> '') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_state_foreign` (`state`),
  ADD KEY `city_country_foreign` (`country`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_basic_infos`
--
ALTER TABLE `event_basic_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_basic_infos_event_id_foreign` (`event_id`);

--
-- Indexes for table `event_categories`
--
ALTER TABLE `event_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_cms`
--
ALTER TABLE `event_cms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_cms_event_basic_info_id_foreign` (`event_basic_info_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panchayath`
--
ALTER TABLE `panchayath`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panchayath_state_foreign` (`state`),
  ADD KEY `panchayath_city_foreign` (`city`),
  ADD KEY `panchayath_country_foreign` (`country`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `pincode`
--
ALTER TABLE `pincode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pincode_panchayath_foreign` (`panchayath`),
  ADD KEY `pincode_state_foreign` (`state`),
  ADD KEY `pincode_city_foreign` (`city`),
  ADD KEY `pincode_country_foreign` (`country`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualification_subject`
--
ALTER TABLE `qualification_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qualification_subject_qualification_id_foreign` (`qualification_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_country_id_foreign` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_basic_details`
--
ALTER TABLE `user_basic_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_basic_details_user_id_foreign` (`user_id`),
  ADD KEY `user_basic_details_country_foreign` (`country`),
  ADD KEY `user_basic_details_state_foreign` (`state`),
  ADD KEY `user_basic_details_city_foreign` (`city`),
  ADD KEY `user_basic_details_panchayath_foreign` (`panchayath`),
  ADD KEY `user_basic_details_pincode_foreign` (`pincode`);

--
-- Indexes for table `user_qualifications`
--
ALTER TABLE `user_qualifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_qualifications_user_foreign` (`user`);

--
-- Indexes for table `user_secondary_details`
--
ALTER TABLE `user_secondary_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_secondary_details_user_basic_id_foreign` (`user_basic_id`);

--
-- Indexes for table `viewers_details`
--
ALTER TABLE `viewers_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `viewers_details_viewed_by_foreign` (`viewed_by`),
  ADD KEY `viewers_details_profile_id_foreign` (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_basic_infos`
--
ALTER TABLE `event_basic_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_categories`
--
ALTER TABLE `event_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_cms`
--
ALTER TABLE `event_cms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `panchayath`
--
ALTER TABLE `panchayath`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pincode`
--
ALTER TABLE `pincode`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualification_subject`
--
ALTER TABLE `qualification_subject`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_basic_details`
--
ALTER TABLE `user_basic_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_qualifications`
--
ALTER TABLE `user_qualifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_secondary_details`
--
ALTER TABLE `user_secondary_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `viewers_details`
--
ALTER TABLE `viewers_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_country_foreign` FOREIGN KEY (`country`) REFERENCES `country` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `city_state_foreign` FOREIGN KEY (`state`) REFERENCES `state` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_basic_infos`
--
ALTER TABLE `event_basic_infos`
  ADD CONSTRAINT `event_basic_infos_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_cms`
--
ALTER TABLE `event_cms`
  ADD CONSTRAINT `event_cms_event_basic_info_id_foreign` FOREIGN KEY (`event_basic_info_id`) REFERENCES `event_basic_infos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `panchayath`
--
ALTER TABLE `panchayath`
  ADD CONSTRAINT `panchayath_city_foreign` FOREIGN KEY (`city`) REFERENCES `city` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `panchayath_country_foreign` FOREIGN KEY (`country`) REFERENCES `country` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `panchayath_state_foreign` FOREIGN KEY (`state`) REFERENCES `state` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pincode`
--
ALTER TABLE `pincode`
  ADD CONSTRAINT `pincode_city_foreign` FOREIGN KEY (`city`) REFERENCES `city` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pincode_country_foreign` FOREIGN KEY (`country`) REFERENCES `country` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pincode_panchayath_foreign` FOREIGN KEY (`panchayath`) REFERENCES `panchayath` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pincode_state_foreign` FOREIGN KEY (`state`) REFERENCES `state` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qualification_subject`
--
ALTER TABLE `qualification_subject`
  ADD CONSTRAINT `qualification_subject_qualification_id_foreign` FOREIGN KEY (`qualification_id`) REFERENCES `qualification` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_basic_details`
--
ALTER TABLE `user_basic_details`
  ADD CONSTRAINT `user_basic_details_city_foreign` FOREIGN KEY (`city`) REFERENCES `city` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_basic_details_country_foreign` FOREIGN KEY (`country`) REFERENCES `country` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_basic_details_panchayath_foreign` FOREIGN KEY (`panchayath`) REFERENCES `panchayath` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_basic_details_pincode_foreign` FOREIGN KEY (`pincode`) REFERENCES `pincode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_basic_details_state_foreign` FOREIGN KEY (`state`) REFERENCES `state` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_basic_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_qualifications`
--
ALTER TABLE `user_qualifications`
  ADD CONSTRAINT `user_qualifications_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_secondary_details`
--
ALTER TABLE `user_secondary_details`
  ADD CONSTRAINT `user_secondary_details_user_basic_id_foreign` FOREIGN KEY (`user_basic_id`) REFERENCES `user_basic_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `viewers_details`
--
ALTER TABLE `viewers_details`
  ADD CONSTRAINT `viewers_details_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `viewers_details_viewed_by_foreign` FOREIGN KEY (`viewed_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
