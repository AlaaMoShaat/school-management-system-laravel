-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2024 at 02:41 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school2`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
CREATE TABLE IF NOT EXISTS `attendances` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint UNSIGNED NOT NULL,
  `grade_id` bigint UNSIGNED NOT NULL,
  `classroom_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `teacher_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attendances_student_id_foreign` (`student_id`),
  KEY `attendances_grade_id_foreign` (`grade_id`),
  KEY `attendances_classroom_id_foreign` (`classroom_id`),
  KEY `attendances_section_id_foreign` (`section_id`),
  KEY `attendances_teacher_id_foreign` (`teacher_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bloods`
--

DROP TABLE IF EXISTS `bloods`;
CREATE TABLE IF NOT EXISTS `bloods` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bloods`
--

INSERT INTO `bloods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'O+', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(2, 'O-', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(3, 'A+', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(4, 'A-', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(5, 'B+', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(6, 'B-', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(7, 'AB+', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(8, 'AB-', '2024-05-18 10:58:34', '2024-05-18 10:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

DROP TABLE IF EXISTS `classrooms`;
CREATE TABLE IF NOT EXISTS `classrooms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `classrooms_grade_id_foreign` (`grade_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `grade_id`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"first class\",\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u0627\\u0648\\u0644\"}', 1, '2024-05-18 10:56:32', '2024-05-18 10:56:32'),
(2, '{\"en\":\"sec class\",\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\"}', 1, '2024-05-18 10:56:32', '2024-05-18 10:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

DROP TABLE IF EXISTS `degrees`;
CREATE TABLE IF NOT EXISTS `degrees` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint UNSIGNED NOT NULL,
  `quiz_id` bigint UNSIGNED NOT NULL,
  `score` double(8,2) NOT NULL,
  `mark` double(8,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `degrees_student_id_foreign` (`student_id`),
  KEY `degrees_quiz_id_foreign` (`quiz_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

DROP TABLE IF EXISTS `fees`;
CREATE TABLE IF NOT EXISTS `fees` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_id` bigint UNSIGNED NOT NULL,
  `grade_id` bigint UNSIGNED NOT NULL,
  `classroom_id` bigint UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fees_type_id_foreign` (`type_id`),
  KEY `fees_grade_id_foreign` (`grade_id`),
  KEY `fees_classroom_id_foreign` (`classroom_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `type_id`, `grade_id`, `classroom_id`, `year`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2024', '5000.00', '2024-05-18 11:25:05', '2024-05-18 11:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `fee_invoices`
--

DROP TABLE IF EXISTS `fee_invoices`;
CREATE TABLE IF NOT EXISTS `fee_invoices` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint UNSIGNED NOT NULL,
  `fee_id` bigint UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fee_invoices_student_id_foreign` (`student_id`),
  KEY `fee_invoices_fee_id_foreign` (`fee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_invoices`
--

INSERT INTO `fee_invoices` (`id`, `student_id`, `fee_id`, `invoice_date`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-05-18', 'Description', '2024-05-18 11:26:27', '2024-05-18 11:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `fee_types`
--

DROP TABLE IF EXISTS `fee_types`;
CREATE TABLE IF NOT EXISTS `fee_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_types`
--

INSERT INTO `fee_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Academic year registration fees\",\"ar\":\"\\u0631\\u0633\\u0648\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u0633\\u0646\\u0629 \\u0627\\u0644\\u062f\\u0631\\u0627\\u0633\\u064a\\u0629\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(2, '{\"en\":\"Single line bus fees\",\"ar\":\"\\u0631\\u0633\\u0648\\u0645 \\u0628\\u0627\\u0635 \\u062e\\u0637 \\u0648\\u0627\\u062d\\u062f\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(3, '{\"en\":\"Two-line bus fees\",\"ar\":\"\\u0631\\u0633\\u0648\\u0645 \\u0628\\u0627\\u0635 \\u062e\\u0637\\u064a\\u0646\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `fund_accounts`
--

DROP TABLE IF EXISTS `fund_accounts`;
CREATE TABLE IF NOT EXISTS `fund_accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `receipt_id` bigint UNSIGNED DEFAULT NULL,
  `payment_id` bigint UNSIGNED DEFAULT NULL,
  `debit` decimal(8,2) DEFAULT NULL,
  `credit` decimal(8,2) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fund_accounts_receipt_id_foreign` (`receipt_id`),
  KEY `fund_accounts_payment_id_foreign` (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fund_accounts`
--

INSERT INTO `fund_accounts` (`id`, `receipt_id`, `payment_id`, `debit`, `credit`, `date`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '1000.00', '0.00', '2024-05-18', '2024-05-18 11:29:00', '2024-05-18 11:29:00'),
(2, 2, NULL, '4000.00', '0.00', '2024-05-18', '2024-05-18 11:30:37', '2024-05-18 11:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
CREATE TABLE IF NOT EXISTS `genders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Male\",\"ar\":\"\\u0630\\u0643\\u0631\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(2, '{\"en\":\"Female\",\"ar\":\"\\u0627\\u0646\\u062b\\u0649\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
CREATE TABLE IF NOT EXISTS `grades` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `grades_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `note`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"prime satge\",\"ar\":\"\\u0627\\u0644\\u0645\\u0631\\u062d\\u0644\\u0629 \\u0627\\u0644\\u0627\\u0628\\u062a\\u062f\\u0627\\u0626\\u064a\\u0629\"}', 'note', '2024-05-18 10:55:04', '2024-05-18 10:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` int NOT NULL,
  `imageable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(1, 'ss.jpg', 1, 'App\\Models\\MyParent', '2024-05-18 11:05:39', '2024-05-18 11:05:39'),
(2, 'ss.jpg', 1, 'App\\Models\\Student', '2024-05-18 11:07:58', '2024-05-18 11:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

DROP TABLE IF EXISTS `library`;
CREATE TABLE IF NOT EXISTS `library` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` bigint UNSIGNED NOT NULL,
  `classroom_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `subject_id` bigint UNSIGNED NOT NULL,
  `teacher_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `library_grade_id_foreign` (`grade_id`),
  KEY `library_classroom_id_foreign` (`classroom_id`),
  KEY `library_section_id_foreign` (`section_id`),
  KEY `library_subject_id_foreign` (`subject_id`),
  KEY `library_teacher_id_foreign` (`teacher_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_22_045416_create_grades_table', 1),
(6, '2024_03_24_004616_create_classrooms_table', 1),
(7, '2024_03_28_033644_create_sections_table', 1),
(8, '2024_03_29_234934_create_bloods_table', 1),
(9, '2024_03_30_000014_create_nationalities_table', 1),
(10, '2024_03_30_022246_create_religions_table', 1),
(11, '2024_03_30_025331_create_my_parents_table', 1),
(12, '2024_04_01_022709_create_genders_table', 1),
(13, '2024_04_01_022843_create_specializations_table', 1),
(14, '2024_04_01_023720_create_teachers_table', 1),
(15, '2024_04_02_025838_create_teacher_section_table', 1),
(16, '2024_04_02_204507_create_students_table', 1),
(17, '2024_04_04_121750_create_images_table', 1),
(18, '2024_04_05_213135_create_promotions_table', 1),
(19, '2024_04_09_133022_create_fees_table', 1),
(20, '2024_04_11_190836_create_fee_types_table', 1),
(21, '2024_04_11_210801_create_fee_invoices_table', 1),
(22, '2024_04_12_003408_create_student_accounts_table', 1),
(23, '2024_04_13_115259_create_receipt_students_table', 1),
(24, '2024_04_13_121752_create_fund_accounts_table', 1),
(25, '2024_04_14_234035_create_processing_fees_table', 1),
(26, '2024_04_15_032803_create_payment_students_table', 1),
(27, '2024_04_15_183938_create_attendances_table', 1),
(28, '2024_04_17_105610_create_subjects_table', 1),
(29, '2024_04_18_004709_create_quizzes_table', 1),
(30, '2024_04_20_164854_create_questions_table', 1),
(31, '2024_04_21_164912_create_library_table', 1),
(32, '2024_04_23_151339_create_settings_table', 1),
(33, '2024_05_01_212210_create_online_meetings_table', 1),
(34, '2024_05_07_194408_create_degrees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `my_parents`
--

DROP TABLE IF EXISTS `my_parents`;
CREATE TABLE IF NOT EXISTS `my_parents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name_Father` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `National_ID_Father` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Passport_ID_Father` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone_Father` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Job_Father` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nationality_Father_id` bigint UNSIGNED NOT NULL,
  `Blood_Father_id` bigint UNSIGNED NOT NULL,
  `Religion_Father_id` bigint UNSIGNED NOT NULL,
  `Address_Father` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name_Mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `National_ID_Mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Passport_ID_Mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone_Mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Job_Mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nationality_Mother_id` bigint UNSIGNED NOT NULL,
  `Blood_Mother_id` bigint UNSIGNED NOT NULL,
  `Religion_Mother_id` bigint UNSIGNED NOT NULL,
  `Address_Mother` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `my_parents_email_unique` (`email`),
  KEY `my_parents_nationality_father_id_foreign` (`Nationality_Father_id`),
  KEY `my_parents_blood_father_id_foreign` (`Blood_Father_id`),
  KEY `my_parents_religion_father_id_foreign` (`Religion_Father_id`),
  KEY `my_parents_nationality_mother_id_foreign` (`Nationality_Mother_id`),
  KEY `my_parents_blood_mother_id_foreign` (`Blood_Mother_id`),
  KEY `my_parents_religion_mother_id_foreign` (`Religion_Mother_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_parents`
--

INSERT INTO `my_parents` (`id`, `email`, `password`, `Name_Father`, `National_ID_Father`, `Passport_ID_Father`, `Phone_Father`, `Job_Father`, `Nationality_Father_id`, `Blood_Father_id`, `Religion_Father_id`, `Address_Father`, `Name_Mother`, `National_ID_Mother`, `Passport_ID_Mother`, `Phone_Mother`, `Job_Mother`, `Nationality_Mother_id`, `Blood_Mother_id`, `Religion_Mother_id`, `Address_Mother`, `created_at`, `updated_at`) VALUES
(1, 'parent@parent.com', '$2y$10$A67N3RItIlzDFI4sdqektevKkUJ5OCyfEhILqRTFcXNrUjalr3VW.', '{\"en\":\"mohamed\",\"ar\":\"\\u0645\\u062d\\u0645\\u062f\"}', '5555555555', '5555555555', '5555555555', '{\"en\":\"maneger\",\"ar\":\"\\u0645\\u062f\\u064a\\u0631\"}', 9, 4, 1, '{\"en\":\"gaza\",\"ar\":\"\\u063a\\u0632\\u0629\"}', '{\"en\":\"noha\",\"ar\":\"\\u0646\\u0647\\u0627\"}', '5555555555', '5555555555', '5555555555', '{\"en\":\"\\u0645\\u062f\\u064a\\u0631\\u0629\",\"ar\":\"maneger\"}', 10, 5, 1, '{\"en\":\"gaza\",\"ar\":\"\\u063a\\u0632\\u0629\"}', '2024-05-18 11:05:39', '2024-05-18 11:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

DROP TABLE IF EXISTS `nationalities`;
CREATE TABLE IF NOT EXISTS `nationalities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Afghan\",\"ar\":\"\\u0623\\u0641\\u063a\\u0627\\u0646\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(2, '{\"en\":\"Albanian\",\"ar\":\"\\u0623\\u0644\\u0628\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(3, '{\"en\":\"Aland Islander\",\"ar\":\"\\u0622\\u0644\\u0627\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(4, '{\"en\":\"Algerian\",\"ar\":\"\\u062c\\u0632\\u0627\\u0626\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(5, '{\"en\":\"American Samoan\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a \\u0633\\u0627\\u0645\\u0648\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(6, '{\"en\":\"Andorran\",\"ar\":\"\\u0623\\u0646\\u062f\\u0648\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(7, '{\"en\":\"Angolan\",\"ar\":\"\\u0623\\u0646\\u0642\\u0648\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(8, '{\"en\":\"Anguillan\",\"ar\":\"\\u0623\\u0646\\u063a\\u0648\\u064a\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(9, '{\"en\":\"Antarctican\",\"ar\":\"\\u0623\\u0646\\u062a\\u0627\\u0631\\u0643\\u062a\\u064a\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(10, '{\"en\":\"Antiguan\",\"ar\":\"\\u0628\\u0631\\u0628\\u0648\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(11, '{\"en\":\"Argentinian\",\"ar\":\"\\u0623\\u0631\\u062c\\u0646\\u062a\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(12, '{\"en\":\"Armenian\",\"ar\":\"\\u0623\\u0631\\u0645\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(13, '{\"en\":\"Aruban\",\"ar\":\"\\u0623\\u0648\\u0631\\u0648\\u0628\\u0647\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(14, '{\"en\":\"Australian\",\"ar\":\"\\u0623\\u0633\\u062a\\u0631\\u0627\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(15, '{\"en\":\"Austrian\",\"ar\":\"\\u0646\\u0645\\u0633\\u0627\\u0648\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(16, '{\"en\":\"Azerbaijani\",\"ar\":\"\\u0623\\u0630\\u0631\\u0628\\u064a\\u062c\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(17, '{\"en\":\"Bahamian\",\"ar\":\"\\u0628\\u0627\\u0647\\u0627\\u0645\\u064a\\u0633\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(18, '{\"en\":\"Bahraini\",\"ar\":\"\\u0628\\u062d\\u0631\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(19, '{\"en\":\"Bangladeshi\",\"ar\":\"\\u0628\\u0646\\u063a\\u0644\\u0627\\u062f\\u064a\\u0634\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(20, '{\"en\":\"Barbadian\",\"ar\":\"\\u0628\\u0631\\u0628\\u0627\\u062f\\u0648\\u0633\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(21, '{\"en\":\"Belarusian\",\"ar\":\"\\u0631\\u0648\\u0633\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(22, '{\"en\":\"Belgian\",\"ar\":\"\\u0628\\u0644\\u062c\\u064a\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(23, '{\"en\":\"Belizean\",\"ar\":\"\\u0628\\u064a\\u0644\\u064a\\u0632\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(24, '{\"en\":\"Beninese\",\"ar\":\"\\u0628\\u0646\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(25, '{\"en\":\"Saint Barthelmian\",\"ar\":\"\\u0633\\u0627\\u0646 \\u0628\\u0627\\u0631\\u062a\\u064a\\u0644\\u0645\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(26, '{\"en\":\"Bermudan\",\"ar\":\"\\u0628\\u0631\\u0645\\u0648\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(27, '{\"en\":\"Bhutanese\",\"ar\":\"\\u0628\\u0648\\u062a\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(28, '{\"en\":\"Bolivian\",\"ar\":\"\\u0628\\u0648\\u0644\\u064a\\u0641\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(29, '{\"en\":\"Bosnian \\/ Herzegovinian\",\"ar\":\"\\u0628\\u0648\\u0633\\u0646\\u064a\\/\\u0647\\u0631\\u0633\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(30, '{\"en\":\"Botswanan\",\"ar\":\"\\u0628\\u0648\\u062a\\u0633\\u0648\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(31, '{\"en\":\"Bouvetian\",\"ar\":\"\\u0628\\u0648\\u0641\\u064a\\u0647\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(32, '{\"en\":\"Brazilian\",\"ar\":\"\\u0628\\u0631\\u0627\\u0632\\u064a\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(33, '{\"en\":\"British Indian Ocean Territory\",\"ar\":\"\\u0625\\u0642\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0645\\u062d\\u064a\\u0637 \\u0627\\u0644\\u0647\\u0646\\u062f\\u064a \\u0627\\u0644\\u0628\\u0631\\u064a\\u0637\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(34, '{\"en\":\"Bruneian\",\"ar\":\"\\u0628\\u0631\\u0648\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(35, '{\"en\":\"Bulgarian\",\"ar\":\"\\u0628\\u0644\\u063a\\u0627\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(36, '{\"en\":\"Burkinabe\",\"ar\":\"\\u0628\\u0648\\u0631\\u0643\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(37, '{\"en\":\"Burundian\",\"ar\":\"\\u0628\\u0648\\u0631\\u0648\\u0646\\u064a\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(38, '{\"en\":\"Cambodian\",\"ar\":\"\\u0643\\u0645\\u0628\\u0648\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(39, '{\"en\":\"Cameroonian\",\"ar\":\"\\u0643\\u0627\\u0645\\u064a\\u0631\\u0648\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(40, '{\"en\":\"Canadian\",\"ar\":\"\\u0643\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(41, '{\"en\":\"Cape Verdean\",\"ar\":\"\\u0627\\u0644\\u0631\\u0623\\u0633 \\u0627\\u0644\\u0623\\u062e\\u0636\\u0631\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(42, '{\"en\":\"Caymanian\",\"ar\":\"\\u0643\\u0627\\u064a\\u0645\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(43, '{\"en\":\"Central African\",\"ar\":\"\\u0623\\u0641\\u0631\\u064a\\u0642\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(44, '{\"en\":\"Chadian\",\"ar\":\"\\u062a\\u0634\\u0627\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(45, '{\"en\":\"Chilean\",\"ar\":\"\\u0634\\u064a\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(46, '{\"en\":\"Chinese\",\"ar\":\"\\u0635\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(47, '{\"en\":\"Christmas Islander\",\"ar\":\"\\u062c\\u0632\\u064a\\u0631\\u0629 \\u0639\\u064a\\u062f \\u0627\\u0644\\u0645\\u064a\\u0644\\u0627\\u062f\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(48, '{\"en\":\"Cocos Islander\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0643\\u0648\\u0643\\u0648\\u0633\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(49, '{\"en\":\"Colombian\",\"ar\":\"\\u0643\\u0648\\u0644\\u0648\\u0645\\u0628\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(50, '{\"en\":\"Comorian\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0627\\u0644\\u0642\\u0645\\u0631\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(51, '{\"en\":\"Congolese\",\"ar\":\"\\u0643\\u0648\\u0646\\u063a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(52, '{\"en\":\"Cook Islander\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0643\\u0648\\u0643\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(53, '{\"en\":\"Costa Rican\",\"ar\":\"\\u0643\\u0648\\u0633\\u062a\\u0627\\u0631\\u064a\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(54, '{\"en\":\"Croatian\",\"ar\":\"\\u0643\\u0648\\u0631\\u0627\\u062a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(55, '{\"en\":\"Cuban\",\"ar\":\"\\u0643\\u0648\\u0628\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(56, '{\"en\":\"Cypriot\",\"ar\":\"\\u0642\\u0628\\u0631\\u0635\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(57, '{\"en\":\"Curacian\",\"ar\":\"\\u0643\\u0648\\u0631\\u0627\\u0633\\u0627\\u0648\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(58, '{\"en\":\"Czech\",\"ar\":\"\\u062a\\u0634\\u064a\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(59, '{\"en\":\"Danish\",\"ar\":\"\\u062f\\u0646\\u0645\\u0627\\u0631\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(60, '{\"en\":\"Djiboutian\",\"ar\":\"\\u062c\\u064a\\u0628\\u0648\\u062a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(61, '{\"en\":\"Dominican\",\"ar\":\"\\u062f\\u0648\\u0645\\u064a\\u0646\\u064a\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(62, '{\"en\":\"Dominican\",\"ar\":\"\\u062f\\u0648\\u0645\\u064a\\u0646\\u064a\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(63, '{\"en\":\"Ecuadorian\",\"ar\":\"\\u0625\\u0643\\u0648\\u0627\\u062f\\u0648\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(64, '{\"en\":\"Egyptian\",\"ar\":\"\\u0645\\u0635\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(65, '{\"en\":\"Salvadoran\",\"ar\":\"\\u0633\\u0644\\u0641\\u0627\\u062f\\u0648\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(66, '{\"en\":\"Equatorial Guinean\",\"ar\":\"\\u063a\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(67, '{\"en\":\"Eritrean\",\"ar\":\"\\u0625\\u0631\\u064a\\u062a\\u064a\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(68, '{\"en\":\"Estonian\",\"ar\":\"\\u0627\\u0633\\u062a\\u0648\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(69, '{\"en\":\"Ethiopian\",\"ar\":\"\\u0623\\u062b\\u064a\\u0648\\u0628\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(70, '{\"en\":\"Falkland Islander\",\"ar\":\"\\u0641\\u0648\\u0643\\u0644\\u0627\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(71, '{\"en\":\"Faroese\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0641\\u0627\\u0631\\u0648\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(72, '{\"en\":\"Fijian\",\"ar\":\"\\u0641\\u064a\\u062c\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(73, '{\"en\":\"Finnish\",\"ar\":\"\\u0641\\u0646\\u0644\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(74, '{\"en\":\"French\",\"ar\":\"\\u0641\\u0631\\u0646\\u0633\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(75, '{\"en\":\"French Guianese\",\"ar\":\"\\u063a\\u0648\\u064a\\u0627\\u0646\\u0627 \\u0627\\u0644\\u0641\\u0631\\u0646\\u0633\\u064a\\u0629\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(76, '{\"en\":\"French Polynesian\",\"ar\":\"\\u0628\\u0648\\u0644\\u064a\\u0646\\u064a\\u0632\\u064a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(77, '{\"en\":\"French\",\"ar\":\"\\u0623\\u0631\\u0627\\u0636 \\u0641\\u0631\\u0646\\u0633\\u064a\\u0629 \\u062c\\u0646\\u0648\\u0628\\u064a\\u0629 \\u0648\\u0623\\u0646\\u062a\\u0627\\u0631\\u062a\\u064a\\u0643\\u064a\\u0629\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(78, '{\"en\":\"Gabonese\",\"ar\":\"\\u063a\\u0627\\u0628\\u0648\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(79, '{\"en\":\"Gambian\",\"ar\":\"\\u063a\\u0627\\u0645\\u0628\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(80, '{\"en\":\"Georgian\",\"ar\":\"\\u062c\\u064a\\u0648\\u0631\\u062c\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(81, '{\"en\":\"German\",\"ar\":\"\\u0623\\u0644\\u0645\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(82, '{\"en\":\"Ghanaian\",\"ar\":\"\\u063a\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(83, '{\"en\":\"Gibraltar\",\"ar\":\"\\u062c\\u0628\\u0644 \\u0637\\u0627\\u0631\\u0642\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(84, '{\"en\":\"Guernsian\",\"ar\":\"\\u063a\\u064a\\u0631\\u0646\\u0632\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(85, '{\"en\":\"Greek\",\"ar\":\"\\u064a\\u0648\\u0646\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(86, '{\"en\":\"Greenlandic\",\"ar\":\"\\u062c\\u0631\\u064a\\u0646\\u0644\\u0627\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(87, '{\"en\":\"Grenadian\",\"ar\":\"\\u063a\\u0631\\u064a\\u0646\\u0627\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(88, '{\"en\":\"Guadeloupe\",\"ar\":\"\\u062c\\u0632\\u0631 \\u062c\\u0648\\u0627\\u062f\\u0644\\u0648\\u0628\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(89, '{\"en\":\"Guamanian\",\"ar\":\"\\u062c\\u0648\\u0627\\u0645\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(90, '{\"en\":\"Guatemalan\",\"ar\":\"\\u063a\\u0648\\u0627\\u062a\\u064a\\u0645\\u0627\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(91, '{\"en\":\"Guinean\",\"ar\":\"\\u063a\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(92, '{\"en\":\"Guinea-Bissauan\",\"ar\":\"\\u063a\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(93, '{\"en\":\"Guyanese\",\"ar\":\"\\u063a\\u064a\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(94, '{\"en\":\"Haitian\",\"ar\":\"\\u0647\\u0627\\u064a\\u062a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(95, '{\"en\":\"Heard and Mc Donald Islanders\",\"ar\":\"\\u062c\\u0632\\u064a\\u0631\\u0629 \\u0647\\u064a\\u0631\\u062f \\u0648\\u062c\\u0632\\u0631 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(96, '{\"en\":\"Honduran\",\"ar\":\"\\u0647\\u0646\\u062f\\u0648\\u0631\\u0627\\u0633\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(97, '{\"en\":\"Hongkongese\",\"ar\":\"\\u0647\\u0648\\u0646\\u063a \\u0643\\u0648\\u0646\\u063a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(98, '{\"en\":\"Hungarian\",\"ar\":\"\\u0645\\u062c\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(99, '{\"en\":\"Icelandic\",\"ar\":\"\\u0622\\u064a\\u0633\\u0644\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(100, '{\"en\":\"Indian\",\"ar\":\"\\u0647\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(101, '{\"en\":\"Manx\",\"ar\":\"\\u0645\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(102, '{\"en\":\"Indonesian\",\"ar\":\"\\u0623\\u0646\\u062f\\u0648\\u0646\\u064a\\u0633\\u064a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(103, '{\"en\":\"Iranian\",\"ar\":\"\\u0625\\u064a\\u0631\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(104, '{\"en\":\"Iraqi\",\"ar\":\"\\u0639\\u0631\\u0627\\u0642\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(105, '{\"en\":\"Irish\",\"ar\":\"\\u0625\\u064a\\u0631\\u0644\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(106, '{\"en\":\"Italian\",\"ar\":\"\\u0625\\u064a\\u0637\\u0627\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(107, '{\"en\":\"Ivory Coastian\",\"ar\":\"\\u0633\\u0627\\u062d\\u0644 \\u0627\\u0644\\u0639\\u0627\\u062c\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(108, '{\"en\":\"Jersian\",\"ar\":\"\\u062c\\u064a\\u0631\\u0632\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(109, '{\"en\":\"Jamaican\",\"ar\":\"\\u062c\\u0645\\u0627\\u064a\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(110, '{\"en\":\"Japanese\",\"ar\":\"\\u064a\\u0627\\u0628\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(111, '{\"en\":\"Jordanian\",\"ar\":\"\\u0623\\u0631\\u062f\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(112, '{\"en\":\"Kazakh\",\"ar\":\"\\u0643\\u0627\\u0632\\u0627\\u062e\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(113, '{\"en\":\"Kenyan\",\"ar\":\"\\u0643\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(114, '{\"en\":\"I-Kiribati\",\"ar\":\"\\u0643\\u064a\\u0631\\u064a\\u0628\\u0627\\u062a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(115, '{\"en\":\"North Korean\",\"ar\":\"\\u0643\\u0648\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(116, '{\"en\":\"South Korean\",\"ar\":\"\\u0643\\u0648\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(117, '{\"en\":\"Kosovar\",\"ar\":\"\\u0643\\u0648\\u0633\\u064a\\u0641\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(118, '{\"en\":\"Kuwaiti\",\"ar\":\"\\u0643\\u0648\\u064a\\u062a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(119, '{\"en\":\"Kyrgyzstani\",\"ar\":\"\\u0642\\u064a\\u0631\\u063a\\u064a\\u0632\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(120, '{\"en\":\"Laotian\",\"ar\":\"\\u0644\\u0627\\u0648\\u0633\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(121, '{\"en\":\"Latvian\",\"ar\":\"\\u0644\\u0627\\u062a\\u064a\\u0641\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(122, '{\"en\":\"Lebanese\",\"ar\":\"\\u0644\\u0628\\u0646\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(123, '{\"en\":\"Basotho\",\"ar\":\"\\u0644\\u064a\\u0648\\u0633\\u064a\\u062a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(124, '{\"en\":\"Liberian\",\"ar\":\"\\u0644\\u064a\\u0628\\u064a\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(125, '{\"en\":\"Libyan\",\"ar\":\"\\u0644\\u064a\\u0628\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(126, '{\"en\":\"Liechtenstein\",\"ar\":\"\\u0644\\u064a\\u062e\\u062a\\u0646\\u0634\\u062a\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(127, '{\"en\":\"Lithuanian\",\"ar\":\"\\u0644\\u062a\\u0648\\u0627\\u0646\\u064a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(128, '{\"en\":\"Luxembourger\",\"ar\":\"\\u0644\\u0648\\u0643\\u0633\\u0645\\u0628\\u0648\\u0631\\u063a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(129, '{\"en\":\"Sri Lankian\",\"ar\":\"\\u0633\\u0631\\u064a\\u0644\\u0627\\u0646\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(130, '{\"en\":\"Macanese\",\"ar\":\"\\u0645\\u0627\\u0643\\u0627\\u0648\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(131, '{\"en\":\"Macedonian\",\"ar\":\"\\u0645\\u0642\\u062f\\u0648\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(132, '{\"en\":\"Malagasy\",\"ar\":\"\\u0645\\u062f\\u063a\\u0634\\u0642\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(133, '{\"en\":\"Malawian\",\"ar\":\"\\u0645\\u0627\\u0644\\u0627\\u0648\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(134, '{\"en\":\"Malaysian\",\"ar\":\"\\u0645\\u0627\\u0644\\u064a\\u0632\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(135, '{\"en\":\"Maldivian\",\"ar\":\"\\u0645\\u0627\\u0644\\u062f\\u064a\\u0641\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(136, '{\"en\":\"Malian\",\"ar\":\"\\u0645\\u0627\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(137, '{\"en\":\"Maltese\",\"ar\":\"\\u0645\\u0627\\u0644\\u0637\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(138, '{\"en\":\"Marshallese\",\"ar\":\"\\u0645\\u0627\\u0631\\u0634\\u0627\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(139, '{\"en\":\"Martiniquais\",\"ar\":\"\\u0645\\u0627\\u0631\\u062a\\u064a\\u0646\\u064a\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(140, '{\"en\":\"Mauritanian\",\"ar\":\"\\u0645\\u0648\\u0631\\u064a\\u062a\\u0627\\u0646\\u064a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(141, '{\"en\":\"Mauritian\",\"ar\":\"\\u0645\\u0648\\u0631\\u064a\\u0634\\u064a\\u0648\\u0633\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(142, '{\"en\":\"Mahoran\",\"ar\":\"\\u0645\\u0627\\u064a\\u0648\\u062a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(143, '{\"en\":\"Mexican\",\"ar\":\"\\u0645\\u0643\\u0633\\u064a\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(144, '{\"en\":\"Micronesian\",\"ar\":\"\\u0645\\u0627\\u064a\\u0643\\u0631\\u0648\\u0646\\u064a\\u0632\\u064a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(145, '{\"en\":\"Moldovan\",\"ar\":\"\\u0645\\u0648\\u0644\\u062f\\u064a\\u0641\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(146, '{\"en\":\"Monacan\",\"ar\":\"\\u0645\\u0648\\u0646\\u064a\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(147, '{\"en\":\"Mongolian\",\"ar\":\"\\u0645\\u0646\\u063a\\u0648\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(148, '{\"en\":\"Montenegrin\",\"ar\":\"\\u0627\\u0644\\u062c\\u0628\\u0644 \\u0627\\u0644\\u0623\\u0633\\u0648\\u062f\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(149, '{\"en\":\"Montserratian\",\"ar\":\"\\u0645\\u0648\\u0646\\u062a\\u0633\\u064a\\u0631\\u0627\\u062a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(150, '{\"en\":\"Moroccan\",\"ar\":\"\\u0645\\u063a\\u0631\\u0628\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(151, '{\"en\":\"Mozambican\",\"ar\":\"\\u0645\\u0648\\u0632\\u0645\\u0628\\u064a\\u0642\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(152, '{\"en\":\"Myanmarian\",\"ar\":\"\\u0645\\u064a\\u0627\\u0646\\u0645\\u0627\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(153, '{\"en\":\"Namibian\",\"ar\":\"\\u0646\\u0627\\u0645\\u064a\\u0628\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(154, '{\"en\":\"Nauruan\",\"ar\":\"\\u0646\\u0648\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(155, '{\"en\":\"Nepalese\",\"ar\":\"\\u0646\\u064a\\u0628\\u0627\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(156, '{\"en\":\"Dutch\",\"ar\":\"\\u0647\\u0648\\u0644\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(157, '{\"en\":\"Dutch Antilier\",\"ar\":\"\\u0647\\u0648\\u0644\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(158, '{\"en\":\"New Caledonian\",\"ar\":\"\\u0643\\u0627\\u0644\\u064a\\u062f\\u0648\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(159, '{\"en\":\"New Zealander\",\"ar\":\"\\u0646\\u064a\\u0648\\u0632\\u064a\\u0644\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(160, '{\"en\":\"Nicaraguan\",\"ar\":\"\\u0646\\u064a\\u0643\\u0627\\u0631\\u0627\\u062c\\u0648\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(161, '{\"en\":\"Nigerien\",\"ar\":\"\\u0646\\u064a\\u062c\\u064a\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(162, '{\"en\":\"Nigerian\",\"ar\":\"\\u0646\\u064a\\u062c\\u064a\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(163, '{\"en\":\"Niuean\",\"ar\":\"\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(164, '{\"en\":\"Norfolk Islander\",\"ar\":\"\\u0646\\u0648\\u0631\\u0641\\u0648\\u0644\\u064a\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(165, '{\"en\":\"Northern Marianan\",\"ar\":\"\\u0645\\u0627\\u0631\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(166, '{\"en\":\"Norwegian\",\"ar\":\"\\u0646\\u0631\\u0648\\u064a\\u062c\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(167, '{\"en\":\"Omani\",\"ar\":\"\\u0639\\u0645\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(168, '{\"en\":\"Pakistani\",\"ar\":\"\\u0628\\u0627\\u0643\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(169, '{\"en\":\"Palauan\",\"ar\":\"\\u0628\\u0627\\u0644\\u0627\\u0648\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(170, '{\"en\":\"Palestinian\",\"ar\":\"\\u0641\\u0644\\u0633\\u0637\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(171, '{\"en\":\"Panamanian\",\"ar\":\"\\u0628\\u0646\\u0645\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(172, '{\"en\":\"Papua New Guinean\",\"ar\":\"\\u0628\\u0627\\u0628\\u0648\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(173, '{\"en\":\"Paraguayan\",\"ar\":\"\\u0628\\u0627\\u0631\\u063a\\u0627\\u0648\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(174, '{\"en\":\"Peruvian\",\"ar\":\"\\u0628\\u064a\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(175, '{\"en\":\"Filipino\",\"ar\":\"\\u0641\\u0644\\u0628\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(176, '{\"en\":\"Pitcairn Islander\",\"ar\":\"\\u0628\\u064a\\u062a\\u0643\\u064a\\u0631\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(177, '{\"en\":\"Polish\",\"ar\":\"\\u0628\\u0648\\u0644\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(178, '{\"en\":\"Portuguese\",\"ar\":\"\\u0628\\u0631\\u062a\\u063a\\u0627\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(179, '{\"en\":\"Puerto Rican\",\"ar\":\"\\u0628\\u0648\\u0631\\u062a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(180, '{\"en\":\"Qatari\",\"ar\":\"\\u0642\\u0637\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(181, '{\"en\":\"Reunionese\",\"ar\":\"\\u0631\\u064a\\u0648\\u0646\\u064a\\u0648\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(182, '{\"en\":\"Romanian\",\"ar\":\"\\u0631\\u0648\\u0645\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(183, '{\"en\":\"Russian\",\"ar\":\"\\u0631\\u0648\\u0633\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(184, '{\"en\":\"Rwandan\",\"ar\":\"\\u0631\\u0648\\u0627\\u0646\\u062f\\u0627\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(185, '{\"ar\":\"Kittitian\\/Nevisian\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(186, '{\"en\":\"St. Martian(French)\",\"ar\":\"\\u0633\\u0627\\u064a\\u0646\\u062a \\u0645\\u0627\\u0631\\u062a\\u0646\\u064a \\u0641\\u0631\\u0646\\u0633\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(187, '{\"en\":\"St. Martian(Dutch)\",\"ar\":\"\\u0633\\u0627\\u064a\\u0646\\u062a \\u0645\\u0627\\u0631\\u062a\\u0646\\u064a \\u0647\\u0648\\u0644\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(188, '{\"en\":\"St. Pierre and Miquelon\",\"ar\":\"\\u0633\\u0627\\u0646 \\u0628\\u064a\\u064a\\u0631 \\u0648\\u0645\\u064a\\u0643\\u0644\\u0648\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(189, '{\"en\":\"Saint Vincent and the Grenadines\",\"ar\":\"\\u0633\\u0627\\u0646\\u062a \\u0641\\u0646\\u0633\\u0646\\u062a \\u0648\\u062c\\u0632\\u0631 \\u063a\\u0631\\u064a\\u0646\\u0627\\u062f\\u064a\\u0646\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(190, '{\"en\":\"Samoan\",\"ar\":\"\\u0633\\u0627\\u0645\\u0648\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(191, '{\"en\":\"Sammarinese\",\"ar\":\"\\u0645\\u0627\\u0631\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(192, '{\"en\":\"Sao Tomean\",\"ar\":\"\\u0633\\u0627\\u0648 \\u062a\\u0648\\u0645\\u064a \\u0648\\u0628\\u0631\\u064a\\u0646\\u0633\\u064a\\u0628\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(193, '{\"en\":\"Saudi Arabian\",\"ar\":\"\\u0633\\u0639\\u0648\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(194, '{\"en\":\"Senegalese\",\"ar\":\"\\u0633\\u0646\\u063a\\u0627\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(195, '{\"en\":\"Serbian\",\"ar\":\"\\u0635\\u0631\\u0628\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(196, '{\"en\":\"Seychellois\",\"ar\":\"\\u0633\\u064a\\u0634\\u064a\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(197, '{\"en\":\"Sierra Leonean\",\"ar\":\"\\u0633\\u064a\\u0631\\u0627\\u0644\\u064a\\u0648\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(198, '{\"en\":\"Singaporean\",\"ar\":\"\\u0633\\u0646\\u063a\\u0627\\u0641\\u0648\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(199, '{\"en\":\"Slovak\",\"ar\":\"\\u0633\\u0648\\u0644\\u0641\\u0627\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(200, '{\"en\":\"Slovenian\",\"ar\":\"\\u0633\\u0648\\u0644\\u0641\\u064a\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(201, '{\"en\":\"Solomon Island\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0633\\u0644\\u064a\\u0645\\u0627\\u0646\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(202, '{\"en\":\"Somali\",\"ar\":\"\\u0635\\u0648\\u0645\\u0627\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(203, '{\"en\":\"South African\",\"ar\":\"\\u0623\\u0641\\u0631\\u064a\\u0642\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(204, '{\"en\":\"South Georgia and the South Sandwich\",\"ar\":\"\\u0644\\u0645\\u0646\\u0637\\u0642\\u0629 \\u0627\\u0644\\u0642\\u0637\\u0628\\u064a\\u0629 \\u0627\\u0644\\u062c\\u0646\\u0648\\u0628\\u064a\\u0629\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(205, '{\"en\":\"South Sudanese\",\"ar\":\"\\u0633\\u0648\\u0627\\u062f\\u0646\\u064a \\u062c\\u0646\\u0648\\u0628\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(206, '{\"en\":\"Spanish\",\"ar\":\"\\u0625\\u0633\\u0628\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(207, '{\"en\":\"St. Helenian\",\"ar\":\"\\u0647\\u064a\\u0644\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(208, '{\"en\":\"Sudanese\",\"ar\":\"\\u0633\\u0648\\u062f\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(209, '{\"en\":\"Surinamese\",\"ar\":\"\\u0633\\u0648\\u0631\\u064a\\u0646\\u0627\\u0645\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(210, '{\"en\":\"Svalbardian\\/Jan Mayenian\",\"ar\":\"\\u0633\\u0641\\u0627\\u0644\\u0628\\u0627\\u0631\\u062f \\u0648\\u064a\\u0627\\u0646 \\u0645\\u0627\\u064a\\u0646\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(211, '{\"en\":\"Swazi\",\"ar\":\"\\u0633\\u0648\\u0627\\u0632\\u064a\\u0644\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(212, '{\"en\":\"Swedish\",\"ar\":\"\\u0633\\u0648\\u064a\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(213, '{\"en\":\"Swiss\",\"ar\":\"\\u0633\\u0648\\u064a\\u0633\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(214, '{\"en\":\"Syrian\",\"ar\":\"\\u0633\\u0648\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(215, '{\"en\":\"Taiwanese\",\"ar\":\"\\u062a\\u0627\\u064a\\u0648\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(216, '{\"en\":\"Tajikistani\",\"ar\":\"\\u0637\\u0627\\u062c\\u064a\\u0643\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(217, '{\"en\":\"Tanzanian\",\"ar\":\"\\u062a\\u0646\\u0632\\u0627\\u0646\\u064a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(218, '{\"en\":\"Thai\",\"ar\":\"\\u062a\\u0627\\u064a\\u0644\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(219, '{\"en\":\"Timor-Lestian\",\"ar\":\"\\u062a\\u064a\\u0645\\u0648\\u0631\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(220, '{\"en\":\"Togolese\",\"ar\":\"\\u062a\\u0648\\u063a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(221, '{\"en\":\"Tokelaian\",\"ar\":\"\\u062a\\u0648\\u0643\\u064a\\u0644\\u0627\\u0648\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(222, '{\"en\":\"Tongan\",\"ar\":\"\\u062a\\u0648\\u0646\\u063a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(223, '{\"en\":\"Trinidadian\\/Tobagonian\",\"ar\":\"\\u062a\\u0631\\u064a\\u0646\\u064a\\u062f\\u0627\\u062f \\u0648\\u062a\\u0648\\u0628\\u0627\\u063a\\u0648\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(224, '{\"en\":\"Tunisian\",\"ar\":\"\\u062a\\u0648\\u0646\\u0633\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(225, '{\"en\":\"Turkish\",\"ar\":\"\\u062a\\u0631\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(226, '{\"en\":\"Turkmen\",\"ar\":\"\\u062a\\u0631\\u0643\\u0645\\u0627\\u0646\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(227, '{\"en\":\"Turks and Caicos Islands\",\"ar\":\"\\u062c\\u0632\\u0631 \\u062a\\u0648\\u0631\\u0643\\u0633 \\u0648\\u0643\\u0627\\u064a\\u0643\\u0648\\u0633\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(228, '{\"en\":\"Tuvaluan\",\"ar\":\"\\u062a\\u0648\\u0641\\u0627\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(229, '{\"en\":\"Ugandan\",\"ar\":\"\\u0623\\u0648\\u063a\\u0646\\u062f\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(230, '{\"en\":\"Ukrainian\",\"ar\":\"\\u0623\\u0648\\u0643\\u0631\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(231, '{\"en\":\"Emirati\",\"ar\":\"\\u0625\\u0645\\u0627\\u0631\\u0627\\u062a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(232, '{\"en\":\"British\",\"ar\":\"\\u0628\\u0631\\u064a\\u0637\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(233, '{\"en\":\"American\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(234, '{\"en\":\"US Minor Outlying Islander\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(235, '{\"en\":\"Uruguayan\",\"ar\":\"\\u0623\\u0648\\u0631\\u063a\\u0648\\u0627\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(236, '{\"en\":\"Uzbek\",\"ar\":\"\\u0623\\u0648\\u0632\\u0628\\u0627\\u0643\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(237, '{\"en\":\"Vanuatuan\",\"ar\":\"\\u0641\\u0627\\u0646\\u0648\\u0627\\u062a\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(238, '{\"en\":\"Venezuelan\",\"ar\":\"\\u0641\\u0646\\u0632\\u0648\\u064a\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(239, '{\"en\":\"Vietnamese\",\"ar\":\"\\u0641\\u064a\\u062a\\u0646\\u0627\\u0645\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(240, '{\"en\":\"American Virgin Islander\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(241, '{\"en\":\"Vatican\",\"ar\":\"\\u0641\\u0627\\u062a\\u064a\\u0643\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(242, '{\"en\":\"Wallisian\\/Futunan\",\"ar\":\"\\u0641\\u0648\\u062a\\u0648\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(243, '{\"en\":\"Sahrawian\",\"ar\":\"\\u0635\\u062d\\u0631\\u0627\\u0648\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(244, '{\"en\":\"Yemeni\",\"ar\":\"\\u064a\\u0645\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(245, '{\"en\":\"Zambian\",\"ar\":\"\\u0632\\u0627\\u0645\\u0628\\u064a\\u0627\\u0646\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(246, '{\"en\":\"Zimbabwean\",\"ar\":\"\\u0632\\u0645\\u0628\\u0627\\u0628\\u0648\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `online_meetings`
--

DROP TABLE IF EXISTS `online_meetings`;
CREATE TABLE IF NOT EXISTS `online_meetings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `grade_id` bigint UNSIGNED NOT NULL,
  `classroom_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `subject_id` bigint UNSIGNED NOT NULL,
  `teacher_id` bigint UNSIGNED NOT NULL,
  `meeting_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` datetime NOT NULL,
  `duration` int NOT NULL COMMENT 'minutes',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'meeting password',
  `start_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `online_meetings_grade_id_foreign` (`grade_id`),
  KEY `online_meetings_classroom_id_foreign` (`classroom_id`),
  KEY `online_meetings_section_id_foreign` (`section_id`),
  KEY `online_meetings_subject_id_foreign` (`subject_id`),
  KEY `online_meetings_teacher_id_foreign` (`teacher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_meetings`
--

INSERT INTO `online_meetings` (`id`, `grade_id`, `classroom_id`, `section_id`, `subject_id`, `teacher_id`, `meeting_id`, `topic`, `start_at`, `duration`, `password`, `start_url`, `join_url`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, 1, '55555', 'arabic', '2024-05-11 17:13:00', 50, '123123123', 'meet@meet', 'meet@meet', '2024-05-18 11:14:20', '2024-05-18 11:14:20');

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
-- Table structure for table `payment_students`
--

DROP TABLE IF EXISTS `payment_students`;
CREATE TABLE IF NOT EXISTS `payment_students` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_students_student_id_foreign` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `processing_fees`
--

DROP TABLE IF EXISTS `processing_fees`;
CREATE TABLE IF NOT EXISTS `processing_fees` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint UNSIGNED NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `processing_fees_student_id_foreign` (`student_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint UNSIGNED NOT NULL,
  `from_grade` bigint UNSIGNED NOT NULL,
  `from_classroom` bigint UNSIGNED NOT NULL,
  `from_section` bigint UNSIGNED NOT NULL,
  `from_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_grade` bigint UNSIGNED NOT NULL,
  `to_classroom` bigint UNSIGNED NOT NULL,
  `to_section` bigint UNSIGNED NOT NULL,
  `to_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `promotions_student_id_foreign` (`student_id`),
  KEY `promotions_from_grade_foreign` (`from_grade`),
  KEY `promotions_from_classroom_foreign` (`from_classroom`),
  KEY `promotions_from_section_foreign` (`from_section`),
  KEY `promotions_to_grade_foreign` (`to_grade`),
  KEY `promotions_to_classroom_foreign` (`to_classroom`),
  KEY `promotions_to_section_foreign` (`to_section`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quiz_id` bigint UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `choices` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_quiz_id_foreign` (`quiz_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `title`, `choices`, `right_answer`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"en\":\"do you now\",\"ar\":\"\\u0647\\u0644 \\u062a\\u0639\\u0644\\u0645\"}', '{\"en\":\"yes - no\",\"ar\":\"\\u0646\\u0639\\u0645 - \\u0644\\u0627\"}', '{\"en\":\"yes\",\"ar\":\"\\u0646\\u0639\\u0645\"}', 1, '2024-05-18 11:18:39', '2024-05-18 11:18:39'),
(2, 1, '{\"en\":\"do you know\",\"ar\":\"\\u0647\\u0644 \\u062a\\u0639\\u0644\\u0645\"}', '{\"en\":\"yes - no\",\"ar\":\"\\u0646\\u0639\\u0645 - \\u0644\\u0627\"}', '{\"en\":\"no\",\"ar\":\"\\u0644\\u0627\"}', 4, '2024-05-18 11:19:42', '2024-05-18 11:19:42');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
CREATE TABLE IF NOT EXISTS `quizzes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint UNSIGNED NOT NULL,
  `grade_id` bigint UNSIGNED NOT NULL,
  `classroom_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `teacher_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quizzes_subject_id_foreign` (`subject_id`),
  KEY `quizzes_grade_id_foreign` (`grade_id`),
  KEY `quizzes_classroom_id_foreign` (`classroom_id`),
  KEY `quizzes_section_id_foreign` (`section_id`),
  KEY `quizzes_teacher_id_foreign` (`teacher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `name`, `subject_id`, `grade_id`, `classroom_id`, `section_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"quiz 1\",\"ar\":\"\\u0643\\u0648\\u064a\\u0632 1\"}', 1, 1, 2, 1, 1, '2024-05-18 11:16:19', '2024-05-18 11:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_students`
--

DROP TABLE IF EXISTS `receipt_students`;
CREATE TABLE IF NOT EXISTS `receipt_students` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint UNSIGNED NOT NULL,
  `fee_invoice_id` bigint UNSIGNED NOT NULL,
  `debit` decimal(8,2) DEFAULT NULL,
  `date` date NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `receipt_students_student_id_foreign` (`student_id`),
  KEY `receipt_students_fee_invoice_id_foreign` (`fee_invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipt_students`
--

INSERT INTO `receipt_students` (`id`, `student_id`, `fee_invoice_id`, `debit`, `date`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1000.00', '2024-05-18', 'Description', '2024-05-18 11:29:00', '2024-05-18 11:29:00'),
(2, 1, 1, '4000.00', '2024-05-18', 'Description', '2024-05-18 11:30:37', '2024-05-18 11:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

DROP TABLE IF EXISTS `religions`;
CREATE TABLE IF NOT EXISTS `religions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Muslim\",\"ar\":\"\\u0645\\u0633\\u0644\\u0645\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(2, '{\"en\":\"Christian\",\"ar\":\"\\u0645\\u0633\\u064a\\u062d\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(3, '{\"en\":\"Other\",\"ar\":\"\\u063a\\u064a\\u0631\\u0630\\u0644\\u0643\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `grade_id` bigint UNSIGNED NOT NULL,
  `classroom_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sections_grade_id_foreign` (`grade_id`),
  KEY `sections_classroom_id_foreign` (`classroom_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `grade_id`, `classroom_id`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"sec a\",\"ar\":\"\\u0634\\u0639\\u0628\\u0629 \\u0627\"}', 1, 1, 2, '2024-05-18 11:01:11', '2024-05-18 11:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'academic_year', '2024-2025', NULL, NULL),
(2, 'school_title', 'MS', NULL, NULL),
(3, 'school_name', 'Mohammed Shublaq International Schools', NULL, NULL),
(4, 'end_first_term', '01-12-2024', NULL, NULL),
(5, 'end_second_term', '01-03-2025', NULL, NULL),
(6, 'phone', '0123456789', NULL, NULL),
(7, 'address', 'cairo', NULL, NULL),
(8, 'school_email', 'medo@medo.com', NULL, NULL),
(9, 'logo', '1.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

DROP TABLE IF EXISTS `specializations`;
CREATE TABLE IF NOT EXISTS `specializations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Arabic\",\"ar\":\"\\u0639\\u0631\\u0628\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(2, '{\"en\":\"Science\",\"ar\":\"\\u0639\\u0644\\u0648\\u0645\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(3, '{\"en\":\"Computer\",\"ar\":\"\\u062d\\u0627\\u0633\\u0628 \\u0627\\u0644\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34'),
(4, '{\"en\":\"English\",\"ar\":\"\\u0627\\u0646\\u062c\\u0644\\u064a\\u0632\\u064a\"}', '2024-05-18 10:58:34', '2024-05-18 10:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `academic_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED NOT NULL,
  `gender_id` bigint UNSIGNED NOT NULL,
  `religion_id` bigint UNSIGNED NOT NULL,
  `nationality_id` bigint UNSIGNED NOT NULL,
  `blood_id` bigint UNSIGNED NOT NULL,
  `grade_id` bigint UNSIGNED NOT NULL,
  `classroom_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_email_unique` (`email`),
  KEY `students_parent_id_foreign` (`parent_id`),
  KEY `students_gender_id_foreign` (`gender_id`),
  KEY `students_religion_id_foreign` (`religion_id`),
  KEY `students_nationality_id_foreign` (`nationality_id`),
  KEY `students_blood_id_foreign` (`blood_id`),
  KEY `students_grade_id_foreign` (`grade_id`),
  KEY `students_classroom_id_foreign` (`classroom_id`),
  KEY `students_section_id_foreign` (`section_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `date_birth`, `academic_year`, `parent_id`, `gender_id`, `religion_id`, `nationality_id`, `blood_id`, `grade_id`, `classroom_id`, `section_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"awni\",\"ar\":\"\\u0639\\u0648\\u0646\\u064a\"}', 'student@student.com', '$2y$10$VpvVKwnVyc6unHAPllNCcOAXkLW5oB426fsy02WoSr/98X9704bWK', '2024-05-05', '2024', 1, 1, 1, 16, 5, 1, 2, 1, NULL, '2024-05-18 11:07:58', '2024-05-18 11:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `student_accounts`
--

DROP TABLE IF EXISTS `student_accounts`;
CREATE TABLE IF NOT EXISTS `student_accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `fee_invoice_id` bigint UNSIGNED DEFAULT NULL,
  `receipt_id` bigint UNSIGNED DEFAULT NULL,
  `processing_fee_id` bigint UNSIGNED DEFAULT NULL,
  `payment_id` bigint UNSIGNED DEFAULT NULL,
  `debit` decimal(8,2) DEFAULT NULL,
  `credit` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_accounts_student_id_foreign` (`student_id`),
  KEY `student_accounts_fee_invoice_id_foreign` (`fee_invoice_id`),
  KEY `student_accounts_receipt_id_foreign` (`receipt_id`),
  KEY `student_accounts_processing_fee_id_foreign` (`processing_fee_id`),
  KEY `student_accounts_payment_id_foreign` (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_accounts`
--

INSERT INTO `student_accounts` (`id`, `type`, `student_id`, `fee_invoice_id`, `receipt_id`, `processing_fee_id`, `payment_id`, `debit`, `credit`, `created_at`, `updated_at`) VALUES
(1, 'invoice', 1, 1, NULL, NULL, NULL, '5000.00', '0.00', '2024-05-18 11:26:27', '2024-05-18 11:26:27'),
(2, 'receipt', 1, NULL, 1, NULL, NULL, '0.00', '1000.00', '2024-05-18 11:29:00', '2024-05-18 11:29:00'),
(3, 'receipt', 1, NULL, 2, NULL, NULL, '0.00', '4000.00', '2024-05-18 11:30:37', '2024-05-18 11:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` bigint UNSIGNED NOT NULL,
  `classroom_id` bigint UNSIGNED NOT NULL,
  `teacher_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subjects_grade_id_foreign` (`grade_id`),
  KEY `subjects_classroom_id_foreign` (`classroom_id`),
  KEY `subjects_teacher_id_foreign` (`teacher_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `grade_id`, `classroom_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Arabic\",\"ar\":\"\\u0639\\u0631\\u0628\\u064a\"}', 1, 2, 1, '2024-05-18 11:09:11', '2024-05-18 11:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Specialization_id` bigint UNSIGNED NOT NULL,
  `Gender_id` bigint UNSIGNED NOT NULL,
  `Joining_Date` date NOT NULL,
  `Address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachers_email_unique` (`email`),
  KEY `teachers_specialization_id_foreign` (`Specialization_id`),
  KEY `teachers_gender_id_foreign` (`Gender_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `email`, `password`, `Name`, `Specialization_id`, `Gender_id`, `Joining_Date`, `Address`, `created_at`, `updated_at`) VALUES
(1, 'teacher@teacher.com', '$2y$10$c7WFGYnRWbp/xuRgEu8cJuxa89gQmF/RDvTArKamGtmR8F8BR0ZPm', '{\"en\":\"alaa\",\"ar\":\"\\u0639\\u0644\\u0627\\u0621\"}', 1, 1, '2024-05-02', '{\"en\":\"gaza\",\"ar\":\"\\u063a\\u0632\\u0629\"}', '2024-05-18 10:59:47', '2024-05-18 10:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_section`
--

DROP TABLE IF EXISTS `teacher_section`;
CREATE TABLE IF NOT EXISTS `teacher_section` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `teacher_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_section_teacher_id_foreign` (`teacher_id`),
  KEY `teacher_section_section_id_foreign` (`section_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_section`
--

INSERT INTO `teacher_section` (`id`, `teacher_id`, `section_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Admin1\",\"ar\":\"Admin1\"}', 'alaa@alaa.com', NULL, '$2y$10$43aLnIFcLCosVAzSb.5CM.5PrVm4fWum.ZUUb9P0l.iVmGAY2/7TK', NULL, '2024-05-18 10:52:47', '2024-05-18 10:52:47'),
(2, 'walid', 'walid@walid.com', '2024-05-29 14:38:24', '$2y$10$43aLnIFcLCosVAzSb.5CM.5PrVm4fWum.ZUUb9P0l.iVmGAY2/7TK', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
