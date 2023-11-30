-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 01:35 PM
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
-- Database: `wsp`
--

-- --------------------------------------------------------

--
-- Table structure for table `auto_responders`
--

CREATE TABLE `auto_responders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL DEFAULT 100,
  `response` varchar(255) DEFAULT NULL,
  `response_file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auto_responders`
--

INSERT INTO `auto_responders` (`id`, `session`, `keyword`, `percentage`, `response`, `response_file`, `created_at`, `updated_at`) VALUES
(4, 'general', 'Helio, olá, Halio', 81, 'ra exibir o nome do usuário', 'http://127.0.0.1:8000/storage/75683b92-27ea-4bbd-9733-2fcde2a8a575_.png', '2023-11-13 08:22:12', '2023-11-13 08:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_favorites`
--

INSERT INTO `ch_favorites` (`id`, `user_id`, `favorite_id`, `created_at`, `updated_at`) VALUES
('32f59e15-ed8f-4e73-b6f7-8654db89f5f5', 1, 2, '2023-09-18 08:45:28', '2023-09-18 08:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('0e12a20b-c82d-49ce-9fca-196bf9c8d6f4', 1, 2, 'Hey Ishan.. Tell me... do you like her??', '{\"new_name\":\"298f0b76-e7b4-432c-aefc-9c4c826aad5a.jpg\",\"old_name\":\"164825390_293288535783505_7399122740729901967_n.jpg\"}', 1, '2023-09-18 07:24:46', '2023-09-18 07:24:59'),
('24622f49-ae2b-4da7-a9c8-35a5b14ee697', 2, 1, '🥰🥰🥰she is my love', NULL, 1, '2023-09-18 07:36:40', '2023-09-18 07:36:42'),
('50dba559-2140-45b9-b5d4-178506d5c477', 2, 1, 'I can here you', NULL, 1, '2023-09-26 08:42:33', '2023-09-26 08:42:46'),
('85a638be-8a40-4303-b240-d1a4a9025d52', 1, 2, 'okay then..talk to you later', NULL, 1, '2023-09-18 07:44:18', '2023-09-18 07:44:31'),
('9ff1cc57-7953-4e5b-953f-9dcb3784bbb5', 1, 2, 'so you rockzz', NULL, 1, '2023-09-26 08:39:22', '2023-09-26 08:42:04'),
('a5721390-605d-4cf6-b042-57153c96f437', 1, 2, 'One-to-one users chat system.\r\nReal-time contact list updates.\r\nFavorite users system (Like stories style).\r\nSaved Messages to save your messages online like Telegram messenger app.\r\nSearch functionality.\r\nContact item&#039;s last message indicator (e.g. You: ....).\r\nReal-time user&#039;s active status.\r\nReal-time typing indicator.\r\nReal-time message seen indicator.\r\nReal-time internet connection status.\r\nUpload attachments (Photo/File).\r\nSend Emoji&#039;s.\r\nUser details panel (Shared photos, delete conversation..).\r\nResponsive design with all devices.\r\nUser settings and chat customization : user&#039;s profile photo, dark mode and chat color. with simple and wonderful UI design.\r\n...and much more you have to discover it yourself.\r\n\r\nDemo\r\nDemo app - Click Here.\r\nOfficial Documentation\r\nThe official documentation can be found here\r\n\r\nChange log\r\nCHANGELOG.md', NULL, 1, '2023-09-18 08:36:49', '2023-09-18 08:37:08'),
('b657bbcf-7da9-439b-a7f1-fb006be83ffa', 1, 2, 'Hey there', NULL, 1, '2023-09-26 08:42:19', '2023-09-26 08:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `integrations`
--

CREATE TABLE `integrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `instances` varchar(255) NOT NULL,
  `ignore_duplicates` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `integrations`
--

INSERT INTO `integrations` (`id`, `name`, `platform`, `instances`, `ignore_duplicates`, `created_at`, `updated_at`) VALUES
(1, 'Too Rapidinha Nao Mocher', 'Eduzz', '13,14', 0, '2023-11-14 02:53:40', '2023-11-14 03:50:52'),
(2, 'Mensagens Clientes Únicos', 'Abmex', '15', 1, '2023-11-14 02:57:52', '2023-11-14 02:57:52'),
(4, 'Rapidinha', 'DigitalManagerGuru', '14', 0, '2023-11-14 03:48:59', '2023-11-14 03:50:04'),
(5, 'WooCommerce Pedido Atualizado', 'WooCommerce', '13,14,15', 1, '2023-11-14 03:49:25', '2023-11-14 03:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_09_100456_create_whatsapp_contacts_table', 1),
(6, '2014_10_12_000001_create_users_table', 2),
(7, '2023_09_09_100556_create_whatsapp_messages_table', 3),
(8, '2023_09_09_100458_create_whatsapp_contacts_table', 4),
(9, '2023_09_09_100557_create_whatsapp_messages_table', 5),
(10, '2014_10_12_000010_create_users_table', 6),
(11, '2023_09_09_100558_create_whatsapp_messages_table', 7),
(12, '2023_09_18_999999_add_active_status_to_users', 8),
(13, '2023_09_18_999999_add_avatar_to_users', 8),
(14, '2023_09_18_999999_add_dark_mode_to_users', 8),
(15, '2023_09_18_999999_add_messenger_color_to_users', 8),
(16, '2023_09_18_999999_create_chatify_favorites_table', 8),
(17, '2023_09_18_999999_create_chatify_messages_table', 8),
(18, '2023_09_09_100459_create_whatsapp_contacts_table', 9),
(19, '2023_09_09_100460_create_whatsapp_contacts_table', 10),
(20, '2023_09_09_100461_create_whatsapp_contacts_table', 11),
(21, '2023_09_09_100471_create_whatsapp_contacts_table', 12),
(22, '2023_09_09_100470_create_whatsapp_contacts_table', 13),
(23, '2023_09_09_100480_create_whatsapp_contacts_table', 14),
(24, '2023_09_09_100480_create_whatsapp_contact_table', 15),
(25, '2023_09_09_100500_create_whatsapp_contact_table', 16),
(26, '2023_09_09_100510_create_whatsapp_contact_table', 17),
(27, '2023_09_09_100610_create_whatsapp_messages_table', 17),
(28, '2014_10_12_000100_create_users_table', 18),
(29, '2023_09_09_100600_create_whatsapp_contact_table', 18),
(30, '2023_09_09_100700_create_whatsapp_messages_table', 18),
(31, '2023_09_09_100800_create_whatsapp_messages_table', 19),
(32, '2023_09_09_100599_create_whatsapp_contact_table', 20),
(33, '2023_09_09_100799_create_whatsapp_messages_table', 20),
(34, '2023_09_09_032048_create_instances_table', 21),
(35, '2023_09_09_100600_create_whatsapp_contacts_table', 21),
(36, '2023_09_09_032050_create_instances_table', 22),
(37, '2023_09_09_100650_create_whatsapp_contacts_table', 22),
(38, '2023_09_09_100850_create_whatsapp_messages_table', 22),
(39, '2023_09_09_032050_create_whatsapp_instances_table', 23),
(40, '2023_09_09_031050_create_whatsapp_instances_table', 24),
(41, '2023_09_09_103050_create_whatsapp_contacts_table', 24),
(42, '2023_09_09_105050_create_whatsapp_messages_table', 24),
(43, '2023_09_09_031051_create_whatsapp_instances_table', 25),
(44, '2023_09_09_103051_create_whatsapp_contacts_table', 25),
(45, '2023_09_09_105051_create_whatsapp_messages_table', 25),
(46, '2023_09_09_031052_create_whatsapp_instances_table', 26),
(47, '2023_09_09_103052_create_whatsapp_contacts_table', 26),
(48, '2023_09_09_105052_create_whatsapp_messages_table', 26),
(49, '2023_10_12_070615_create_auto_responders_table', 27),
(50, '2023_10_12_070620_create_auto_responders_table', 28),
(51, '2023_09_09_031053_create_whatsapp_instances_table', 29),
(52, '2023_09_09_103053_create_whatsapp_contacts_table', 29),
(53, '2023_09_09_105053_create_whatsapp_messages_table', 29),
(54, '2023_10_12_070630_create_auto_responders_table', 29),
(55, '2023_10_12_070631_create_auto_responders_table', 30),
(56, '2023_11_13_151051_create_operators_table', 31),
(57, '2023_11_14_072320_create_integrations_table', 32),
(58, '2023_11_14_115823_create_payments_table', 33);

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`id`, `name`, `login`, `password`, `department`, `is_admin`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Og3', '12345678', 'América Móvil', 1, 1, '2023-11-13 09:45:22', '2023-11-13 09:45:22'),
(2, 'General', 'Po3', '12345678', 'Telecom Italia', 0, 0, '2023-11-13 09:47:05', '2023-11-13 09:47:05'),
(3, 'Atendente', 'Gm2', '12345678', 'Algar', 0, 1, '2023-11-13 09:47:48', '2023-11-13 09:47:48'),
(4, 'Poliana', 'Po4', '12345678', 'América Móvil', 1, 0, '2023-11-13 09:48:46', '2023-11-13 09:48:46'),
(5, 'Atendente', 'At3', '12345678', 'Delaware', 1, 0, '2023-11-13 09:49:13', '2023-11-13 09:49:13'),
(6, 'Poliana', 'Po4', '12345678', 'América Móvil', 1, 1, '2023-11-13 09:49:41', '2023-11-13 09:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `amount`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 100.00, 1, 'Pagamento único', NULL, NULL),
(2, 2, 200.00, 1, 'Pagamento trimestral', NULL, NULL),
(3, 2, 20.00, 0, 'Pagamento mensal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL DEFAULT 'https://i.ibb.co/6WgZryJ/default.png',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vladimir V', 'vchachi@gmail.com', NULL, '$2y$10$JhcV8vBUOvGNd26Nds/sqeROOui38qoQhOAg/GOoJ2CVplI6lUYra', 'https://i.ibb.co/fvwyFZJ/Admin-LTELogo.png', NULL, '2023-09-26 08:29:45', '2023-09-26 08:29:45'),
(2, 'Griselda', 'griselda@gmail.com', NULL, '$2y$10$qhiZqG6BahDCUYt6FpKi3Ob0R2hOGXbTE90JFw7ckxK7C35MFqXHW', 'https://i.ibb.co/6WgZryJ/default.png', NULL, '2023-09-26 08:32:15', '2023-09-26 08:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp_contacts`
--

CREATE TABLE `whatsapp_contacts` (
  `id` varchar(36) NOT NULL,
  `instance_id` bigint(20) UNSIGNED NOT NULL,
  `phone` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL DEFAULT 'https://i.ibb.co/6WgZryJ/default.png',
  `lastMessageTime` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp_instances`
--

CREATE TABLE `whatsapp_instances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `session_name` varchar(255) NOT NULL,
  `instance_phone` bigint(20) UNSIGNED DEFAULT NULL,
  `instance_username` varchar(255) DEFAULT NULL,
  `instance_profile` varchar(255) NOT NULL DEFAULT 'https://i.ibb.co/fvwyFZJ/Admin-LTELogo.png',
  `qr_code` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `speed` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whatsapp_instances`
--

INSERT INTO `whatsapp_instances` (`id`, `user_id`, `session_name`, `instance_phone`, `instance_username`, `instance_profile`, `qr_code`, `status`, `speed`, `created_at`, `updated_at`) VALUES
(12, 1, 'general', NULL, NULL, 'https://i.ibb.co/fvwyFZJ/Admin-LTELogo.png', NULL, 0, 1, '2023-11-13 07:55:20', '2023-11-13 07:55:20'),
(13, 1, 'complex', NULL, NULL, 'https://i.ibb.co/fvwyFZJ/Admin-LTELogo.png', NULL, 1, 2, '2023-11-13 08:29:03', '2023-11-13 08:29:03'),
(14, 1, 'G-Organaization', NULL, NULL, 'https://i.ibb.co/fvwyFZJ/Admin-LTELogo.png', NULL, 1, 0, '2023-11-14 00:48:40', '2023-11-14 00:48:40'),
(15, 1, 'Prime-Team', NULL, NULL, 'https://i.ibb.co/fvwyFZJ/Admin-LTELogo.png', NULL, 1, 0, '2023-11-14 00:48:56', '2023-11-14 00:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `whatsapp_messages`
--

CREATE TABLE `whatsapp_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `whatsapp_user_id` varchar(36) NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `messageText` varchar(255) DEFAULT NULL,
  `messageMedia` varchar(255) DEFAULT NULL,
  `messageDocument` varchar(255) DEFAULT NULL,
  `messageRecording` varchar(255) DEFAULT NULL,
  `messageTime` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auto_responders`
--
ALTER TABLE `auto_responders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auto_responders_session_foreign` (`session`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `integrations`
--
ALTER TABLE `integrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `whatsapp_contacts`
--
ALTER TABLE `whatsapp_contacts`
  ADD UNIQUE KEY `whatsapp_contacts_id_unique` (`id`),
  ADD KEY `whatsapp_contacts_instance_id_foreign` (`instance_id`);

--
-- Indexes for table `whatsapp_instances`
--
ALTER TABLE `whatsapp_instances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `whatsapp_instances_session_name_unique` (`session_name`),
  ADD KEY `whatsapp_instances_user_id_foreign` (`user_id`);

--
-- Indexes for table `whatsapp_messages`
--
ALTER TABLE `whatsapp_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `whatsapp_messages_whatsapp_user_id_foreign` (`whatsapp_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auto_responders`
--
ALTER TABLE `auto_responders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `integrations`
--
ALTER TABLE `integrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `operators`
--
ALTER TABLE `operators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `whatsapp_instances`
--
ALTER TABLE `whatsapp_instances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `whatsapp_messages`
--
ALTER TABLE `whatsapp_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auto_responders`
--
ALTER TABLE `auto_responders`
  ADD CONSTRAINT `auto_responders_session_foreign` FOREIGN KEY (`session`) REFERENCES `whatsapp_instances` (`session_name`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `whatsapp_contacts`
--
ALTER TABLE `whatsapp_contacts`
  ADD CONSTRAINT `whatsapp_contacts_instance_id_foreign` FOREIGN KEY (`instance_id`) REFERENCES `whatsapp_instances` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `whatsapp_instances`
--
ALTER TABLE `whatsapp_instances`
  ADD CONSTRAINT `whatsapp_instances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `whatsapp_messages`
--
ALTER TABLE `whatsapp_messages`
  ADD CONSTRAINT `whatsapp_messages_whatsapp_user_id_foreign` FOREIGN KEY (`whatsapp_user_id`) REFERENCES `whatsapp_contacts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
