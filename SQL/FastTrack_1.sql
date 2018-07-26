-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Jul 2018 um 15:30
-- Server-Version: 10.1.33-MariaDB
-- PHP-Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `fasttrack`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrlehrer_verwaltungs`
--

CREATE TABLE `fahrlehrer_verwaltungs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `einsatzgebiet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `automarke` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auto_baujahr` int(11) DEFAULT NULL,
  `kennzeichen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fahrlehrer_seit` int(11) DEFAULT NULL,
  `beschreibung` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `fahrlehrer_verwaltungs`
--

INSERT INTO `fahrlehrer_verwaltungs` (`id`, `user_id`, `einsatzgebiet`, `automarke`, `auto_baujahr`, `kennzeichen`, `fahrlehrer_seit`, `beschreibung`) VALUES
(12, 12, 'Mannheim', 'ds', 1221, 'wwww', 12, 'wwww');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fragenkatalogs`
--

CREATE TABLE `fragenkatalogs` (
  `fragen_id` int(10) UNSIGNED NOT NULL,
  `Kategorie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `frage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `antworten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `richtig` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `fragenkatalogs`
--

INSERT INTO `fragenkatalogs` (`fragen_id`, `Kategorie`, `frage`, `antworten`, `richtig`) VALUES
(5, 'Vorfahrt', 'Was ist 3', 'Test', 'Test'),
(6, 'Vorfahrt', 'Was ist groß', 'Afffe, Elefant, Giraffe', 'Giraffe'),
(7, 'Vorfahrt', 'Wer hat Vorfahrt', 'Gelb, Grün, Rot', 'Rot');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_25_022831_create_roles_table', 1),
(4, '2018_06_25_025331_create_role_user_table', 1),
(5, '2018_07_05_091356_create_stammdaten_table', 1),
(6, '2018_07_13_145305_create_fragenkatalogs_table', 1),
(7, '2018_07_16_195907_create_fahrlehrer_verwaltungs_table', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@example.com', '$2y$10$KI.GpJQ6Y8IL6yuh3hdQBOTt7aryslbbRhOHsK7onVmOmtJepI/4u', '2018-07-26 01:39:48');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stammdatens`
--

CREATE TABLE `stammdatens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `Vorname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nachname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Strasse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Hausnummer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Postleitzahl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ort` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Geburtsdatum` date NOT NULL,
  `Telefonnummer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IBAN` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BIC` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `stammdatens`
--

INSERT INTO `stammdatens` (`id`, `user_id`, `Vorname`, `Nachname`, `Strasse`, `Hausnummer`, `Postleitzahl`, `Ort`, `Geburtsdatum`, `Telefonnummer`, `IBAN`, `BIC`, `created_at`, `updated_at`) VALUES
(1, 1, 'Klaus', 'Klaus', 'Straße', 'S', 'S', 'S', '1990-11-11', '11', '!!', '11', '2018-07-20 09:06:59', '2018-07-25 11:53:37'),
(2, 2, 'Kevin', 'Schroeteler', 'August-Bebel-Str. 70,', '7', '68199', 'Mannheim', '1990-11-11', '1', '1', '1', '2018-07-22 19:41:35', '2018-07-22 19:41:35'),
(4, 4, 'User', 'User', 'll', 'll', 'll', 'll', '1990-11-11', '111', '111', '111', '2018-07-25 07:45:19', '2018-07-25 07:45:19'),
(5, 5, '123', 'Schroeteler', 'ewee', '11', 'wqewe', 'eeee', '1990-11-11', '1111', '111', '111', '2018-07-25 11:20:18', '2018-07-25 11:20:18'),
(6, 6, 'AAA', 'AAA', 'AAA', '1', '2222', '222', '1990-11-11', '111', '111', '111', '2018-07-25 11:25:24', '2018-07-25 11:25:24'),
(7, 7, 'Test', 'Test2', 'Test, 2', '2', '55555', 'Test', '1990-11-11', '11', '1', '1', '2018-07-26 06:33:46', '2018-07-26 06:33:46'),
(12, 12, 'Test123', 'Test2', 'Test, 2, 2', '2', '55555', 'Test', '1990-11-11', '111', '111', '111', '2018-07-26 11:10:02', '2018-07-26 11:10:02');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `statistiken`
--

CREATE TABLE `statistiken` (
  `statistik_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `kategorie` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `anzahl_test` int(11) NOT NULL,
  `anzahl_antworten` int(11) NOT NULL,
  `anzahl_richtig` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `statistiken`
--

INSERT INTO `statistiken` (`statistik_id`, `user_id`, `kategorie`, `anzahl_test`, `anzahl_antworten`, `anzahl_richtig`) VALUES
(7, 4, 'vorfahrt', 2, 6, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', '$2y$10$cS6VVlAGzFvdagxWUa7FWe03zb9n1z/ITtKOK1Q.0YTT4GKVWrIWW', 'gIl4XvR0JqdKuYpvtW8yx1iSDArMHUL9gM6B7dvqY61jHyahPUAAhv7CbMF5', '2018-07-20 09:06:59', '2018-07-20 09:06:59'),
(2, 'fahrschueler', 'user@outlook.de', '$2y$10$HPoewJ9XKiG.MtDiUEwDceRPvtSa5sh1OhniY84Z4SuttPcmP5a8u', NULL, '2018-07-22 19:41:35', '2018-07-22 19:41:35'),
(4, 'fahrschueler', 'user@example.com', '$2y$10$y1YDU1SUJBvvYH63nQKLR.nDHZhHAHp4WsMyvOdApLTpBqT/R3cNy', 'UvO1CfuhgxG9LlhEtedEra20UkJfC4mB8Iqih0SszTiWkyK7satTRH4c8uAq', '2018-07-25 07:45:19', '2018-07-25 07:45:19'),
(5, 'admin', 'Test@test.com', '$2y$10$RZTe1fmH9u.lNMfYwHpynuoUxpzleTH3G6lieiQ0DCF3pD6QaXwSa', '1q1fkREsD4SqBUPTxi0QRvdHiOJPuA7WT2uJCEeHido2YqpqojkRAkFTJIOh', '2018-07-25 11:20:18', '2018-07-26 06:33:13'),
(6, 'fahrschueler', 'User44r@outlook.de', '$2y$10$SjVjbxeKLl2nHfMfznOJxOtMSdjo5YNmaKYFMJMEzvY6zDHanc/OK', 'wgvkTzHdnQqOTND20xmvzB1zpapJHjeXHtuwcjsdBfGIyAcvC2bsoRZfsJiU', '2018-07-25 11:25:24', '2018-07-25 11:25:24'),
(7, 'fahrschueler', '2x34@mail.com', '$2y$10$wjfAuvt.v4RqffqFLuOeMeu0eUZap9i3SmqVKcoszfP4iOi91tAXy', '3boDmDpIRouBDaDo3gB8zA7rvXmuqgmiuzKfqX8EIkdYcB8o9riMecOCcg7b', '2018-07-26 06:33:46', '2018-07-26 06:33:46'),
(12, 'fahrlehrer', '2xsssss34@mail.com', '$2y$10$MEzE55YjaN8CHtjIIuoLoeG5JXHlqyVrLbTI/dlRaSQL1ig2FX/X6', NULL, '2018-07-26 11:10:02', '2018-07-26 11:10:02');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `videos`
--

CREATE TABLE `videos` (
  `video_id` int(10) UNSIGNED NOT NULL,
  `video_url` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `video_title` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `videos`
--

INSERT INTO `videos` (`video_id`, `video_url`, `video_title`) VALUES
(5, 'https://www.youtube.com/watch?v=5mGZYy5JnEc', 'TEst'),
(6, 'https://www.youtube.com/watch?v=5mGZYy5JnEc', 'Test3'),
(7, 'https://www.youtube.com/watch?v=5mGZYy5JnEc', 'Test4'),
(8, 'https://www.youtube.com/watch?v=5mGZYy5JnEc', 'Test5'),
(9, 'https://www.youtube.com/watch?v=5mGZYy5JnEc', '123'),
(10, 'https://www.youtube.com/watch?v=5mGZYy5JnEc', 'hdjshdj');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `fahrlehrer_verwaltungs`
--
ALTER TABLE `fahrlehrer_verwaltungs`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `fragenkatalogs`
--
ALTER TABLE `fragenkatalogs`
  ADD PRIMARY KEY (`fragen_id`);

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indizes für die Tabelle `stammdatens`
--
ALTER TABLE `stammdatens`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `statistiken`
--
ALTER TABLE `statistiken`
  ADD PRIMARY KEY (`statistik_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indizes für die Tabelle `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `fahrlehrer_verwaltungs`
--
ALTER TABLE `fahrlehrer_verwaltungs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `fragenkatalogs`
--
ALTER TABLE `fragenkatalogs`
  MODIFY `fragen_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `stammdatens`
--
ALTER TABLE `stammdatens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `statistiken`
--
ALTER TABLE `statistiken`
  MODIFY `statistik_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `statistiken`
--
ALTER TABLE `statistiken`
  ADD CONSTRAINT `statistiken_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
