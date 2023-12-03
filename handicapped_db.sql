-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 01:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handicapped_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `image` text DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `image`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ادمن', '5.jpg', 'admin@gmail.com', '$2y$10$248U.XDqN2TMJVfhxLZcUOTMs1hiWeQoYiFso83I4ZvHe0ay0wZbu', '2023-11-18 00:38:52', '2023-12-02 19:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `assistants`
--

CREATE TABLE `assistants` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `gender` varchar(191) NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assistants`
--

INSERT INTO `assistants` (`id`, `name`, `phone`, `gender`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'فجر سعد هاشم', '96546463', 'أنثى', 1, '2023-11-18 02:10:19', '2023-11-18 02:16:48'),
(2, 'فدوي محمد', '96555555', 'أنثى', 2, '2023-11-18 02:20:16', '2023-11-18 02:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `name`, `location`, `description`, `keywords`, `image`, `created_at`, `updated_at`) VALUES
(1, 'الصيدلة ', ' Fourth Ring Rd, الجابرية، الكويت', 'كلية الصيدلة - مركز العلوم الطبية - جامعة الكويت', 'صيدلة', '2021-07-26.jpg', '2023-11-18 00:56:29', '2023-11-18 00:56:29'),
(2, ' كلية التربية - جامعة الكويت', '28 شارع السويس، الكويت', 'كلية التربية - جامعة الكويت', 'التربية', '2018-04-16.jpg', '2023-11-18 01:07:55', '2023-11-18 01:07:55'),
(3, 'كلية الطب - جامعة الكويت', 'الجابرية، الكويت', 'كلية الطب - جامعة الكويت الجابرية، الكويت', 'الطب', '2021-07-26.jpg', '2023-11-18 01:09:43', '2023-11-18 01:09:43'),
(4, 'هندسة الكمبيوتر', 'شارع الفردوس، الكويت', 'قسم هندسة الكمبيوتر شارع الفردوس، الكويت', 'هندسة الكمبيوتر', '2016-11-02.jpg', '2023-11-18 01:11:31', '2023-11-18 01:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) DEFAULT NULL,
  `content` text NOT NULL,
  `review` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `professor_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`id`, `status`, `content`, `review`, `date`, `professor_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'بيانات مقابلة الألتحاق بكلية الصيدلة', NULL, '2023-11-21 22:05:00', 1, 3, '2023-11-19 21:05:09', '2023-11-19 22:13:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_15_053119_create_admins_table', 1),
(6, '2023_11_13_131857_create_students_table', 1),
(7, '2023_11_13_134013_create_colleges_table', 1),
(8, '2023_11_13_134014_create_professors_table', 1),
(9, '2023_11_13_163936_create_requests_table', 1),
(10, '2023_11_13_163949_create_interviews_table', 1),
(11, '2023_11_13_163959_create_assistants_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `image` text DEFAULT NULL,
  `gender` varchar(191) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `college_id` int(10) UNSIGNED NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `name`, `email`, `image`, `gender`, `phone`, `college_id`, `password`, `created_at`, `updated_at`) VALUES
(1, 'سالم السعداوي سعد', 'salem@gmail.com', NULL, 'ذكر', '96555533', 1, '$2y$10$xcMupgJVuuNqibA1Ovx0FOE6WdCv88RfINaD606R8Ev2IU2.emI4C', '2023-11-18 01:16:14', '2023-11-18 01:56:16'),
(3, 'احمد طلال', 'ahmed@gmail.com', NULL, 'ذكر', '96544533', 4, '$2y$10$sMBBiwLuePwgkTQCn35QNeSPuCKsZfrO13w3pYrBzsmFp/YGMAXhi', '2023-11-18 01:35:18', '2023-11-18 01:56:23'),
(4, 'محمد سليماني ', 'mohamed@gmail.com', NULL, 'ذكر', '96544555', 3, '$2y$10$r2nw6IPNAvCIluZ03XfMqu/ZTwi3OOyr40vKsSn0l5WjUAhS20zMy', '2023-11-18 01:58:45', '2023-11-18 01:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `acceptable` varchar(191) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `content` text NOT NULL,
  `file` text DEFAULT NULL,
  `special_needs` text NOT NULL,
  `college_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `acceptable`, `review`, `content`, `file`, `special_needs`, `college_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'تم الرفض', 'عدم توافر الرعاية الازمة', 'طلب التحاق بالكلية', 'file.pdf', 'متطلبات حالة تلعثم الكلام ', 1, 1, '2023-11-18 02:05:43', '2023-11-19 03:33:24'),
(2, NULL, NULL, 'طلب التحاق بكلية تربية', 'file.pdf', 'كرسي متحرك ', 2, 2, '2023-11-18 02:21:54', '2023-11-18 02:21:54'),
(3, NULL, NULL, 'طلب التحاق بكلية الطب', 'file.pdf', 'مساعد شخصى', 3, 3, '2023-11-18 02:25:56', '2023-11-18 02:25:56'),
(4, 'تمت الموافقة', NULL, 'طلب التحاق بكلية الصيدلة', 'file.pdf', 'مساعد شخصى', 1, 3, '2023-11-18 02:28:23', '2023-11-19 21:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `image` text DEFAULT NULL,
  `status` text NOT NULL,
  `address` text NOT NULL,
  `disability_type` varchar(191) NOT NULL,
  `gender` varchar(191) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `image`, `status`, `address`, `disability_type`, `gender`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(1, 'ريتاج محمد سعدوني', 'retaj@mail.com', NULL, 'اضطرابات بالكلام والنطق ', 'الكويت السالمية', 'اضطرابات النطق والكلام', 'أنثى', '69555533', '$2y$10$uXABNavzIM4HZoVxYZoLce2Tx7hN6IIr8nJtCRizBHiLU.hRsoVBi', '2023-11-18 00:42:18', '2023-11-18 02:16:18'),
(2, 'روضة سعيد حسن', 'rawda@gmail.com', NULL, 'اعاقة جسدية', 'الكويت الجابرية', 'الإعاقة الجسدية والحركية', 'أنثى', '69599933', '$2y$10$gvtIEUH7exZdt32zsoaVFuis9UtHWFySgQXT.sekTffZoyF.yboxG', '2023-11-18 02:19:44', '2023-11-18 02:19:44'),
(3, 'فجر زهران سالم', 'fagr@gmail.com', NULL, 'اعاقة سمعية', 'الكويت السالمية', 'الإعاقة السمعية', 'أنثى', '69555544', '$2y$10$2vQDIcAF/MnqEboPrzCnVOMDHMRp.alT2BcF53JOFDBAMgKXNx2xm', '2023-11-18 02:23:47', '2023-11-18 02:23:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `assistants`
--
ALTER TABLE `assistants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assistants_student_id_foreign` (`student_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `interviews_professor_id_foreign` (`professor_id`),
  ADD KEY `interviews_student_id_foreign` (`student_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `professors_email_unique` (`email`),
  ADD KEY `professors_college_id_foreign` (`college_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_college_id_foreign` (`college_id`),
  ADD KEY `requests_student_id_foreign` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assistants`
--
ALTER TABLE `assistants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assistants`
--
ALTER TABLE `assistants`
  ADD CONSTRAINT `assistants_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interviews`
--
ALTER TABLE `interviews`
  ADD CONSTRAINT `interviews_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interviews_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professors`
--
ALTER TABLE `professors`
  ADD CONSTRAINT `professors_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_college_id_foreign` FOREIGN KEY (`college_id`) REFERENCES `colleges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
