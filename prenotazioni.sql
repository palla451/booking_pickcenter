-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Giu 05, 2018 alle 15:18
-- Versione del server: 5.7.21-0ubuntu0.16.04.1
-- Versione PHP: 7.2.2-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prenotazioni`
--
CREATE DATABASE IF NOT EXISTS `prenotazioni` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `prenotazioni`;

-- --------------------------------------------------------

--
-- Struttura della tabella `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `booked_by` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `location_id` int(11) NOT NULL,
  `location` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `bookings`
--

INSERT INTO `bookings` (`id`, `booked_by`, `room_id`, `location_id`, `location`, `price`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 1, 1, 'Eur', 35, '2018-06-06 16:00:00', '2018-06-06 17:00:00', 1, '2018-06-05 15:07:31', '2018-06-05 15:07:31', NULL),
(2, 4, 1, 1, 'Eur', 220, '2018-06-20 08:00:00', '2018-06-20 21:00:00', 1, '2018-06-05 15:13:12', '2018-06-05 15:13:12', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `sede` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `locations`
--

INSERT INTO `locations` (`id`, `sede`, `location_id`) VALUES
(1, 'Eur', 1),
(2, 'Boezio', 2),
(3, 'Regolo', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_10_29_105613_create_rooms_table', 1),
(4, '2017_11_05_003439_create_bookings_table', 1),
(5, '2017_11_19_030153_laratrust_setup_tables', 1),
(6, '2017_11_30_104848_create_user_activations_table', 1),
(7, '2018_06_05_132015_create_optionals_table', 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `optionals`
--

CREATE TABLE `optionals` (
  `id` int(10) UNSIGNED NOT NULL,
  `costo_ora` int(11) NOT NULL,
  `costo_giorno` int(11) NOT NULL,
  `qta_min` int(11) NOT NULL,
  `qta_max` int(11) NOT NULL,
  `costo_fisso` float NOT NULL,
  `giorni_prenotazione` int(11) NOT NULL,
  `nome` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `optionals`
--

INSERT INTO `optionals` (`id`, `costo_ora`, `costo_giorno`, `qta_min`, `qta_max`, `costo_fisso`, `giorni_prenotazione`, `nome`) VALUES
(1, 0, 0, 1, 99, 8.5, 1, 'Coffee Break');

-- --------------------------------------------------------

--
-- Struttura della tabella `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-booking', 'Create Booking', 'Create Booking', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(2, 'read-booking', 'Read Booking', 'Read Booking', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(3, 'update-booking', 'Update Booking', 'Update Booking', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(4, 'delete-booking', 'Delete Booking', 'Delete Booking', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(5, 'create-room', 'Create Room', 'Create Room', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(6, 'read-room', 'Read Room', 'Read Room', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(7, 'update-room', 'Update Room', 'Update Room', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(8, 'delete-room', 'Delete Room', 'Delete Room', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(9, 'create-user', 'Create User', 'Create User', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(10, 'read-user', 'Read User', 'Read User', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(11, 'update-user', 'Update User', 'Update User', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(12, 'delete-user', 'Delete User', 'Delete User', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(13, 'create-security', 'Create Security', 'Create Security', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(14, 'read-security', 'Read Security', 'Read Security', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(15, 'update-security', 'Update Security', 'Update Security', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(16, 'delete-security', 'Delete Security', 'Delete Security', '2018-05-29 10:48:28', '2018-05-29 10:48:28');

-- --------------------------------------------------------

--
-- Struttura della tabella `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `permission_role`
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
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(6, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `prices`
--

CREATE TABLE `prices` (
  `id_price` int(11) NOT NULL,
  `price_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `price` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `prices`
--

INSERT INTO `prices` (`id_price`, `price_id`, `room_id`, `price`, `duration`) VALUES
(1, 1, 1, '35', 1),
(2, 1, 1, '65', 2),
(3, 1, 1, '100', 3),
(4, 1, 1, '125', 4),
(5, 1, 1, '220', 8),
(6, 2, 2, '55', 1),
(7, 2, 2, '100', 2),
(8, 2, 2, '150', 3),
(9, 2, 2, '205', 4),
(10, 2, 2, '380', 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Superadmin', 'Superadmin', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(2, 'admin', 'Admin', 'Admin', '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(3, 'user', 'User', 'User', '2018-05-29 10:48:29', '2018-05-29 10:48:29');

-- --------------------------------------------------------

--
-- Struttura della tabella `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(1, 4, 'App\\User'),
(2, 2, 'App\\User'),
(3, 3, 'App\\User');

-- --------------------------------------------------------

--
-- Struttura della tabella `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pax` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `location` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `pax`, `location_id`, `location`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Coworking', 1, 1, 'Eur', 'COWORKING', '2018-05-29 10:48:29', '2018-05-29 10:48:29'),
(2, 'DayOffice', 3, 1, 'Eur', 'DAYOFFICE', '2018-05-29 10:48:29', '2018-05-29 10:48:29'),
(3, 'HotDesking', 3, 1, 'Eur', 'HOTDESKING', NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `room_optional`
--

CREATE TABLE `room_optional` (
  `id` int(11) NOT NULL,
  `optional_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `room_optional`
--

INSERT INTO `room_optional` (`id`, `optional_id`, `room_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'superadmin@pisyek.com', '$2y$10$HLj60zBD/8QZEhv/YYyXZ.Dq66PnYMPbsnsdiLG3i.9hURyoGrnIG', 1, NULL, '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(2, 'Admin', 'admin@pisyek.com', '$2y$10$kjD5zXIb3uUcMQZCBWRHnut7Dpm8pkP30mZldeeyS6qRdnOhUhB2K', 1, NULL, '2018-05-29 10:48:28', '2018-05-29 10:48:28'),
(3, 'User', 'user@pisyek.com', '$2y$10$18DSUMJv3U3tMv5RZMr2eechbIJNh6WEVvUdMNF6dcQC9Ra2bZTGe', 1, NULL, '2018-05-29 10:48:29', '2018-05-29 10:48:29'),
(4, 'Giovanni D\'Apote', 'giovanni_dapote@outlook.it', '$2y$10$R5Tfqi.yc8izWjSrgYtrieDWXOZmynQ6Ly/SVz9MF0GVu8J1y.i7S', 1, 'Fgj6ca81Xqi6OWFBq0TLeMQl17VsUMDpJXzF71l5DO51S3fs8MV4zAl0bt1O', '2018-06-04 06:36:31', '2018-06-04 06:36:31');

-- --------------------------------------------------------

--
-- Struttura della tabella `user_activations`
--

CREATE TABLE `user_activations` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `user_activations`
--

INSERT INTO `user_activations` (`user_id`, `token`, `created_at`) VALUES
(4, 'bH1oeqyNXj2GwLrBM20bAopuLk53IWLJCBDsCOJ0', '2018-06-04 06:36:32');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`),
  ADD KEY `bookings_booked_by_foreign` (`booked_by`);

--
-- Indici per le tabelle `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `optionals`
--
ALTER TABLE `optionals`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indici per le tabelle `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indici per le tabelle `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indici per le tabelle `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indici per le tabelle `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id_price`);

--
-- Indici per le tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indici per le tabelle `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indici per le tabelle `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_name_unique` (`name`);

--
-- Indici per le tabelle `room_optional`
--
ALTER TABLE `room_optional`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indici per le tabelle `user_activations`
--
ALTER TABLE `user_activations`
  ADD KEY `user_activations_token_index` (`token`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `optionals`
--
ALTER TABLE `optionals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `prices`
--
ALTER TABLE `prices`
  MODIFY `id_price` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `room_optional`
--
ALTER TABLE `room_optional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_booked_by_foreign` FOREIGN KEY (`booked_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Limiti per la tabella `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
