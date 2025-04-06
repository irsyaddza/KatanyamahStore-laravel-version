-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table katanyamah.abouts
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `story` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `story2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `story_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_values1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `values1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_values2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `values2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_values3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `values3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.abouts: ~1 rows (approximately)
INSERT INTO `abouts` (`id`, `story`, `story2`, `story_img`, `title_values1`, `values1`, `title_values2`, `values2`, `title_values3`, `values3`, `created_at`, `updated_at`) VALUES
	(1, 'Starting in 2023, it began with a novice modder who was trying to learn the ins and outs of modding GTA San Andreas, \n            he tried to learn the field of skin modding using YouTube tutorials. After being able to master different ways, he got \n            from YouTube tutorials. This modder intends to open a GTA San Andreas skin editing service, he invites his friend who is \n            also studying GTA San Andreas modding. And thats when Katanyamah Store started to enter the GTA San Andreas skin modding \n            market.', 'Every day, the 2 modders of Katanyamah Store try to learn about modding the environment and vehicles, and to date they are still growing.', 'about-images\\0Gs7amGfErFM3cU8hC5pRMcZ7v6C1nFCiXoIl2BC.jpg', 'mengontol', 'mengontol', 'menggokil', 'menggokil', 'mengpoke', 'mengpoke', '2025-04-04 18:03:45', '2025-04-04 18:03:45');

-- Dumping structure for table katanyamah.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.cache: ~0 rows (approximately)

-- Dumping structure for table katanyamah.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.cache_locks: ~0 rows (approximately)

-- Dumping structure for table katanyamah.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.contacts: ~2 rows (approximately)
INSERT INTO `contacts` (`id`, `email`, `phone`, `created_at`, `updated_at`) VALUES
	(1, 'irsyaddza@katanyamah.my.id', '+6282233965010', '2025-04-04 18:03:45', '2025-04-04 18:03:45'),
	(2, 'nopalk@katanyamah.my.id', '+6282299876666', '2025-04-04 18:03:45', '2025-04-04 18:03:45');

-- Dumping structure for table katanyamah.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table katanyamah.faqs
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.faqs: ~5 rows (approximately)
INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
	(1, 'What payment methods do you accept?', 'We accept payments via Indonesian bank transfer, PayPal, e-wallets such as GoPay and Dana.', '2025-04-04 18:03:45', '2025-04-04 18:03:45'),
	(2, 'For making skins and other things, do you often give discounts?', 'Yes, we sometimes give out discounts on special days, and we even give out free skins to all of you', '2025-04-04 18:03:45', '2025-04-04 18:03:45'),
	(3, 'I want to retexture my skin and also headswap, is the material from the customer or from the modder?', 'For retexture and headswap, the materials are from the customer, modders only apply the materials from the customer to your skin.', '2025-04-04 18:03:45', '2025-04-04 18:03:45'),
	(4, 'What do you think about creating an environment? Can it be less than IDR 20,000? Or could it be more than the initial price?', 'The starting price is IDR 20,000, and the maximum price depends on the difficulty and the number of objects', '2025-04-04 18:03:45', '2025-04-04 18:03:45'),
	(5, 'Also, does the environment mod you create have collisions?', 'The environment we creating doesnt have collisions since we provide mods for roleplay servers, and roleplay servers dont allow environment mods with collisions.', '2025-04-04 18:03:45', '2025-04-04 18:03:45');

-- Dumping structure for table katanyamah.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.jobs: ~0 rows (approximately)

-- Dumping structure for table katanyamah.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.job_batches: ~0 rows (approximately)

-- Dumping structure for table katanyamah.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_04_01_080750_create_faqs_table', 1),
	(5, '2025_04_01_081536_create_contacts_table', 1),
	(6, '2025_04_01_140159_create_skins_table', 1),
	(7, '2025_04_01_162116_create_pricings_table', 1),
	(8, '2025_04_02_045949_create_abouts_table', 1),
	(9, '2025_04_02_053117_create_teams_table', 1);

-- Dumping structure for table katanyamah.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table katanyamah.pricings
CREATE TABLE IF NOT EXISTS `pricings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `price_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_feature1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_feature2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_feature3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_feature4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_feature5` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.pricings: ~3 rows (approximately)
INSERT INTO `pricings` (`id`, `price_title`, `price_desc`, `price`, `price_feature1`, `price_feature2`, `price_feature3`, `price_feature4`, `price_feature5`, `created_at`, `updated_at`) VALUES
	(1, 'Custom Skin', 'Make your own custom skin', '20000', 'Full request', 'Cheap price', 'Good quality', 'Warranty', 'Fast respons', '2025-04-04 18:03:45', '2025-04-04 18:03:45'),
	(2, 'Environtment', 'Make your own custom skin', '20000', 'Full request', 'Cheap price', 'Good quality', 'Warranty', 'Fast respons', '2025-04-04 18:03:45', '2025-04-04 18:03:45'),
	(3, 'Retexture & Headswap', 'Make your own custom skin', '10000', 'Full request', 'Cheap price', 'Good quality', 'Warranty', 'Fast respons', '2025-04-04 18:03:45', '2025-04-04 18:03:45');

-- Dumping structure for table katanyamah.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('AYwNGwxC3zkZYgDOtUFbTZRAuKL9Kwo21k7BV12b', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQlNVRHZBWE9nMWZTSXdEd0FQQUJxcHFlamcxaU5LSkRXMldGU1RBWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb250YWN0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1743820065);

-- Dumping structure for table katanyamah.skins
CREATE TABLE IF NOT EXISTS `skins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.skins: ~6 rows (approximately)
INSERT INTO `skins` (`id`, `name`, `img_url`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Varsity LA Dodgers', 'skin-images/Hos6bLxqzSSatxNzCuY2U9iqkl9gWLZaWSnMHVNJ.png', 0, '2025-04-04 19:20:23', '2025-04-04 19:20:23'),
	(2, 'Motorcycle Club', 'skin-images/st8YB4BPIkrDuNymstZ2BgKssebWTDgUURPzUWMu.png', 1, '2025-04-04 19:21:06', '2025-04-04 19:21:06'),
	(3, 'Street Gang', 'skin-images/uo7ZX6iDB57dLNOHDjHF9mMDkACAdJLLgBNDkySP.png', 1, '2025-04-04 19:21:20', '2025-04-04 19:21:20'),
	(4, 'Hoodie Street Gang', 'skin-images/lexln86l3gwrhoGTj5EEG5HeBgT6axcKdsg0RBov.png', 1, '2025-04-04 19:21:33', '2025-04-04 19:21:33'),
	(5, 'Black Man With Crips Vest', 'skin-images/R06Z2s8gZUqSSfmG76hNhw3lj4Y5V0DvtciQIy8F.png', 1, '2025-04-04 19:21:53', '2025-04-04 19:21:53'),
	(6, 'Japanese Boy JDM Hoodie', 'skin-images/znW7242AMHpnKC1Z7aTgbOCjAbKcemmKMaq4un8A.png', 0, '2025-04-04 19:22:13', '2025-04-04 19:22:13');

-- Dumping structure for table katanyamah.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_rank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_bio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.teams: ~2 rows (approximately)
INSERT INTO `teams` (`id`, `team_name`, `team_rank`, `team_img`, `team_bio`, `team_instagram`, `created_at`, `updated_at`) VALUES
	(3, 'Enoz', 'Administrator', 'team-images/482E1UV77CpAbujHhGPvE1oPAYDw6G01mAkOGAIt.png', 'Admin boy', 'admin', '2025-04-04 19:00:01', '2025-04-04 19:00:01'),
	(4, 'Abidin', 'Senior Modder', 'team-images/z8W3DRtoQvbzdpUsFfHMkKOrldN1Oc0cdcQv8PtV.png', 'Aku adalah raja meksiko', '_irsyad.za', '2025-04-04 19:08:16', '2025-04-04 19:13:49');

-- Dumping structure for table katanyamah.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table katanyamah.users: ~3 rows (approximately)
INSERT INTO `users` (`id`, `username`, `email`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'irsyaddza', 'irsyadza04@gmail.com', 1, NULL, '$2y$12$5xCRVECIXcJAWkrataqz1ODr8.SK1eHq4N3nxGX9yAsqswws7pyY2', NULL, '2025-04-04 18:03:45', '2025-04-04 18:03:45'),
	(2, 'noadmin', 'irsyadzainul4@gmail.com', 0, NULL, '$2y$12$8lpAOs3Pk1A4GE5kLw7QGutbx2FNPFkRn3NQU51sAIrl8sPVEYRKO', NULL, '2025-04-04 18:03:45', '2025-04-04 18:03:45'),
	(3, 'admin', 'admin@gmail.com', 1, NULL, '$2y$12$3j/kJ8du8cCEdmJG4CnTKOER5aMvew0k0WcA4qzBpJE4A6AQyR0o6', NULL, '2025-04-04 18:03:46', '2025-04-04 18:03:46');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
