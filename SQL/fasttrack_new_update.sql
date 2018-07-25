-- --------------------------------------------------------
-- Host:                         localhost
-- Server Version:               10.1.26-MariaDB-0+deb9u1 - Debian 9.1
-- Server Betriebssystem:        debian-linux-gnu
-- HeidiSQL Version:             9.5.0.5249
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Exportiere Struktur von Tabelle laravel.fahrlehrer_verwaltungs
CREATE TABLE IF NOT EXISTS `fahrlehrer_verwaltungs` (
  `fahrlehrer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fahrlehrer_vorname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fahrlehrer_nachname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fahrlehrer_geburtsjahr` int(11) NOT NULL,
  `auto_marke` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `auto_baujahr` int(11) NOT NULL,
  `kennzeichen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fahrlehrer_seit` int(11) NOT NULL,
  `beschreibung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`fahrlehrer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle laravel.fragenkatalogs
CREATE TABLE IF NOT EXISTS `fragenkatalogs` (
  `fragen_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Kategorie` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `frage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `antworten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `richtig` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`fragen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle laravel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle laravel.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle laravel.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle laravel.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle laravel.stammdatens
CREATE TABLE IF NOT EXISTS `stammdatens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle laravel.statistiken
CREATE TABLE IF NOT EXISTS `statistiken` (
  `statistik_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `kategorie` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `anzahl_test` int(11) NOT NULL,
  `anzahl_antworten` int(11) NOT NULL,
  `anzahl_richtig` int(11) NOT NULL,
  PRIMARY KEY (`statistik_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `statistiken_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle laravel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Daten Export vom Benutzer nicht ausgewählt
-- Exportiere Struktur von Tabelle laravel.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `video_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `video_url` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `video_title` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Daten Export vom Benutzer nicht ausgewählt
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
