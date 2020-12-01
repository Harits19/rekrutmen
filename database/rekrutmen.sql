-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 27 Nov 2020 pada 09.27
-- Versi server: 5.7.24
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekrutmen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Pendaftaran Staf Muda K-Risma', NULL, NULL),
(2, 'Pendaftaran Staf Muda K-Risma 2', NULL, NULL),
(3, 'Pendaftaran Staf Muda K-Risma 3', NULL, NULL),
(4, 'Pendaftaran Staf Muda K-Risma 4', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `forms`
--

CREATE TABLE `forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `forms`
--

INSERT INTO `forms` (`id`, `nama`, `token`, `data`, `created_at`, `updated_at`) VALUES
(28, 'Uji Coba', '1601905391', '{\"data\":[\"Uji\",\"Coba\"]}', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gammu`
--

CREATE TABLE `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  `Status` int(11) NOT NULL DEFAULT '-1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pendaftar_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id`, `pendaftar_id`, `kode`, `created_at`, `updated_at`) VALUES
(72, 1, '5f38be84e857498c1c4995b46fd8e2439c8a4d9726ded8ee60470f1ca8bc7d5c', '2020-11-26 08:54:01', '2020-11-26 08:54:01'),
(73, 3, '3d15dee26dc4a79baebdd918d32b676c68735655e4ecad93ff5741fe595e2231', '2020-11-26 08:54:04', '2020-11-26 08:54:04'),
(74, 6, '1094ab8dc91a29bfa9d1c48c70e7abad0c3924ee647789b3365130b1a1a38bb6', '2020-11-26 09:24:52', '2020-11-26 09:24:52'),
(75, 8, '046cb98f522cfce6a1640e7e7db7ca7d862db9aedff97e2f1ccb3c0498fe1a0c', '2020-11-26 09:25:00', '2020-11-26 09:25:00'),
(76, 1, '6f8a83ecbea84b19ecbd4ceb6dfe6e55ab8cb9186084face2d08020c4936a4a3', '2020-11-26 09:45:40', '2020-11-26 09:45:40'),
(77, 1, '24effebbf127aff53fcf3aaf562f60f32f5a0f30f4e42d4ea136e07c9182c2a2', '2020-11-26 15:44:42', '2020-11-26 15:44:42'),
(78, 1, '60f9f9c0f7913ca23f53b8cd5f6226e4102cc211f1024bc50b3d4e12fe82391e', '2020-11-26 15:46:32', '2020-11-26 15:46:32'),
(79, 1, 'eb00bd1f344aba62c168024c760639b5ac4903d1cf0419db249e279e8fbb48c0', '2020-11-26 15:48:58', '2020-11-26 15:48:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_09_14_102433_create_sessions_table', 1),
(7, '2020_09_14_102522_create_cache_table', 2),
(8, '2020_09_14_144442_create_jobs_table', 3),
(10, '2020_09_15_123740_create_form_table', 4),
(11, '2020_09_17_143620_create_blog_table', 5),
(13, '2020_09_18_180513_create_pendaftar_table', 6),
(14, '2020_11_04_061735_create_rekrutmen_table', 7),
(15, '2020_11_07_153923_create_pendaftar2_table', 8),
(16, '2020_11_08_155255_create_pendaftar_rekrutmen_table', 9),
(17, '2020_11_11_093850_create_konfirmasi_table', 10),
(18, '2020_11_11_111050_create_alterpendaftar_table', 11),
(19, '2020_11_11_112052_create_pendaftar3_table', 12),
(20, '2020_11_17_092404_create_pendaftar4_table', 13),
(21, '2020_11_19_055618_create_pemberitahuan_table', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `organisasi`
--

CREATE TABLE `organisasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `organisasi`
--

INSERT INTO `organisasi` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(23, 'abdullah harits', 'ruwucucak@gmail.com', NULL, '$2y$10$UJrxTBTyxAaUXX97RMEiXuxkpEs/KEtGQt5eUf5/vAT7HMMJ1nHyO', NULL, NULL, 'oAChd01c6Z8TDn36PNX3FTc1DlFC2rYb80RKtEwAjZG02Sn0GvWsjBqKfnCJ', NULL, NULL, '2020-11-02 03:51:24', '2020-11-02 05:15:17'),
(24, 'abdullah test', 'admin@mail.com', NULL, '$2y$10$8kDhqyngw5iHaLyWXyWO5.fbb5lh9yHiQ7z0Gx15hnBkuTiZsPcuy', NULL, NULL, 'hmnRqnpmecKZj8FYwsPAesDpkrmN3SlbCI6wpl6mW8rFcUin6kxtOZactIQP', NULL, NULL, '2020-11-02 05:53:14', '2020-11-03 22:06:07'),
(25, 'abdullah harits', 'rkimubofficial@gmail.com', NULL, '$2y$10$/JgR.eNGdPW3nARMikBAZuLXxOqjsGzQTeEg/4C2d1HdP9O2QHNry', NULL, NULL, NULL, NULL, NULL, '2020-11-03 23:12:18', '2020-11-03 23:12:18'),
(26, 'aa', 'asdad@sadad.com4', NULL, '$2y$10$PHP6QcTcIe0PTLWYJnyAle5pwNXZoS1uPjo305avKPTKziVU3ls76', NULL, NULL, NULL, NULL, NULL, '2020-11-03 23:12:59', '2020-11-03 23:12:59'),
(27, 'Baru', 'baru@gmail.com', NULL, '$2y$10$7Xfm.VfHvrtKZ6oLUy74UebM6.2EkMiNfyol6COCC7Bp1raoAeL16', NULL, NULL, 'YIbjwoJltC3hidmhlNoHcwwO1Ku8SiXM6s6qeejn6aQm62eywi9jjSrA6pcl', NULL, NULL, '2020-11-09 20:25:22', '2020-11-09 20:58:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox`
--

CREATE TABLE `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SendingDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  `Retries` int(3) DEFAULT '0',
  `Priority` int(11) DEFAULT '0',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved') NOT NULL DEFAULT 'Reserved',
  `StatusCode` int(11) NOT NULL DEFAULT '-1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox_multipart`
--

CREATE TABLE `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved') NOT NULL DEFAULT 'Reserved',
  `StatusCode` int(11) NOT NULL DEFAULT '-1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('harits.abdullah19@gmail.com', '$2y$10$RhEk3Yh8CccRFVIVgKH4DuUP4n1KKtrqTpn94D39ttlmY50futcli', '2020-09-26 09:21:27'),
('member@mail.com', '$2y$10$9KSeBqiG.LFYFAvA2cIUiuWzvdgsIk2VLWUeeZBCIXtUEjdhLcKd2', '2020-09-26 09:22:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rekrutmen_id` bigint(20) UNSIGNED NOT NULL,
  `penerima` json NOT NULL,
  `layanan` json NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id`, `rekrutmen_id`, `penerima`, `layanan`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 84, '[\"member\"]', '[\"sms\"]', 'Tes', '2020-11-26 09:45:40', '2020-11-26 09:45:40'),
(2, 84, '[\"member\"]', '[\"whatsapp\", \"email\"]', 'Ini tes', '2020-11-26 15:44:43', '2020-11-26 15:44:43'),
(3, 84, '[\"member\"]', '[\"whatsapp\", \"email\"]', 'INi halo test', '2020-11-26 15:46:32', '2020-11-26 15:46:32'),
(4, 84, '[\"member\"]', '[\"whatsapp\"]', 'test', '2020-11-26 15:48:58', '2020-11-26 15:48:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rekrutmen_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_formulir` json NOT NULL,
  `status` enum('-','Proses Konfirmasi','Hadir') COLLATE utf8mb4_unicode_ci NOT NULL,
  `seleksi` enum('-','Diterima','Tidak Diterima') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `rekrutmen_id`, `nama`, `no_hp`, `email`, `foto`, `data_formulir`, `status`, `seleksi`, `created_at`, `updated_at`) VALUES
(1, 84, 'member', '0895614730905', 'ruwucucak@gmail.com', '1.jpg', '[\"Malang\", \"Malang\", \"213123\"]', 'Proses Konfirmasi', '-', '2020-11-26 09:45:00', '2020-11-26 15:48:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `phones`
--

CREATE TABLE `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TimeOut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `IMSI` varchar(35) NOT NULL,
  `NetCode` varchar(10) DEFAULT 'ERROR',
  `NetName` varchar(35) DEFAULT 'ERROR',
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '-1',
  `Signal` int(11) NOT NULL DEFAULT '-1',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekrutmen`
--

CREATE TABLE `rekrutmen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `organisasi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `poster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_formulir` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` enum('tersedia','tutup') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekrutmen`
--

INSERT INTO `rekrutmen` (`id`, `organisasi_id`, `nama`, `deskripsi`, `poster`, `data_formulir`, `status`, `created_at`, `updated_at`) VALUES
(84, 24, 'hafid', 'akakaka', '84.jpg', '[\"Haloo\",\"Test\",\"nilai\"]', 'tersedia', '2020-11-09 07:13:12', '2020-11-09 07:13:12'),
(86, 24, '1', 'Halo Bandunf', '86.jpg', '[\"1\",\"3\",\"5\"]', 'tersedia', '2020-11-09 07:16:28', '2020-11-09 07:16:28'),
(87, 24, 'Test', 'test', '87.jpg', 'null', 'tersedia', '2020-11-14 08:39:04', '2020-11-14 08:39:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sentitems`
--

CREATE TABLE `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `SendingDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL,
  `StatusCode` int(11) NOT NULL DEFAULT '-1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5T9URgsZoA9lS7Tv27PcPTyYB6GYeV0MpRstlPMz', 24, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiUEtRSzQ4Z1h6QzBIcnJIbHh4R2tKSU5pUjNpTk5PV1U0djZtRTh0WCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9yZWtydXRtZW4uZmlhL2FkbWluL3BlbmRhZnRhci9saXN0L2Zhdmljb24uaWNvIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjQ7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCQ4a0RocXluZ3c1aUhhTHlXWHlXTzUuZmJiNWxoOXlIaVE3ejBHeDE1aG5Ca3VUaVpzUGN1eSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkOGtEaHF5bmd3NWlIYUx5V1h5V081LmZiYjVsaDl5SGlRN3owR3gxNWhuQmt1VGlac1BjdXkiO30=', 1606409140),
('9q0PXaJfLSqZ5I5PUjzhNkDh2wThBA7uV5nmx3I5', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 10; M2004J19C) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.99 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ0JaRVFKQW5GcG5SMnRiUW1wdGVpSFFTeGdxU3VqcnJhWWN5TGh1eCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9mMTk4YzM1NzE5ZmUuYXAubmdyb2suaW8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606426415),
('d1tCtDcNTqcITPOkxWl9RO53cxSeg4fV55yYsEuR', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoialNhdWdkR0F4eWUxOFlLRTBtSTg5YVNOdWdCT0w2WG1zQkhkMHd4diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly81ZGMzNjU3NWE1MTcubmdyb2suaW8vcmVrcnV0bWVuL3B1YmxpYyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1606425337),
('ESbGLn25hbFLxDzXGqQQUeeRboQVB5wv6lkZNh6n', NULL, '127.0.0.1', 'WhatsApp/2.20.205.16 A', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidXdtZjR1T3oxcFFRNWFxVGhpZDU4Smt3M1pqQ0w2NEhmaXRNZ0JRZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9hMTQ4ODU3MDEzODkuYXAubmdyb2suaW8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606426540),
('hCKwKHlujt9ReiUFeCozkzgXEmnQgjlD9O6R4UJr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMHFpZTFqUmcyNWkzZnlFcVNXdHNzeXlkYkp4Njh0SzQzZHNkMkRKQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly81MWY4YjVjMjgxYWIuYXAubmdyb2suaW8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606426272),
('HENZ0ZDeRd2h6qLyjGXI7uFK3FzWCIdvYiZz5lGj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidU9ONGp5QnhkdFp0eFFDQnhDUE9SVjZkY2lXdFpXVE5kaU1IdW14QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9yZWtydXRtZW4uZmlhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1606425738),
('Khn4Nn9L4PrJIJSrEJ3D5gRkJ72utmmMzVDN9B6Q', 24, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZktoVzZPeGxWZmkwNlk4RDFiN3FaRzFpR2xHRnpSZXVwVU85SDZVcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9lYjc4YTQzMGMxZmYuYXAubmdyb2suaW8vYWRtaW4vcGVuZGFmdGFyL2xpc3QvODQvdW5kdWgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyNDtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDhrRGhxeW5ndzVpSGFMeVdYeVdPNS5mYmI1bGg5eUhpUTd6MEd4MTVobkJrdVRpWnNQY3V5IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ4a0RocXluZ3c1aUhhTHlXWHlXTzUuZmJiNWxoOXlIaVE3ejBHeDE1aG5Ca3VUaVpzUGN1eSI7fQ==', 1606431216),
('leRcYSJuDteo2f6D1BrQjOgvwNwkdfWODlwLpgUP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUG4zSU1QR3dGWkdkaTFKT3JGb3NHU1I2bVhBaURWQ3FNbUphc3U3MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9lYTc5ZTQxNzhkMzQubmdyb2suaW8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606425845),
('MhiBUJ3ooH36XOg8DC28H5NwU62QsVjXaPDIscBa', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 7.0; Moto C Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWhzdU5JaVpkZThlbmJZbnQ0QnpoMXIwemJ5QzNVNktLNEZldU5LNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9mMTk4YzM1NzE5ZmUuYXAubmdyb2suaW8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606426419),
('P5oEQhqLZqouTNjrL2oq7NiSUIdftBWw5RHLOFE1', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 10; M2004J19C) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.99 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib21jN2Y3TDVCdTF2ZTBsQTllM05heEloZnFhY1dWcEd2TDlqeVkyaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly81MWY4YjVjMjgxYWIuYXAubmdyb2suaW8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606426308),
('pYMmQHsqnv44tfVqVa8c3QaIUzLXTlPBZVPWPgT4', NULL, '127.0.0.1', 'WhatsApp/2.20.205.16 A', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVTBjbVQ0ZmNYMDhXOGtzd1lCRThyM0ZvSGlGWUVtQWpaT0YydmdoOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly81MWY4YjVjMjgxYWIuYXAubmdyb2suaW8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606426304),
('sdECEIvmwsOrVXWi78QK4Jp2UoFHAbzM7jUoo4NZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHdreTJVMGIxY3dWSXFFcDBBT3JVMHF0UlFoenhhdWprT2tPZHNTQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9yZWtydXRtZW4uZmlhL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1606462862),
('sRClFTCSl6seBupOYoYD7x72V1iLygod5fLnBenJ', NULL, '127.0.0.1', 'WhatsApp/2.20.205.16 A', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTRhZmRqQjBiSG01ZlFIenlnOHZFQXRWeTdzQkFvZWJGWkM0SlVneCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9mMTk4YzM1NzE5ZmUuYXAubmdyb2suaW8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606426401),
('vNjuVeffH7HwDQFmlYaO3ofQ86h8GdcpiBEr7FF8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.66 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOG5IRW9yaThlano0TWhTV0lrNm5qZklqNjNGZm5mQ1BXTzVoa3NacyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1606425499),
('z9cXW95lA9eZhdjXPHe3fPqV9qw8xEhwa4AgBVMG', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 7.0; Moto C Plus) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS2loNmk2MUZ0U2ZkTDhLNHRYS3NhMmI5Y2NySVpXRW5qcjBTUkpuUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9hMTQ4ODU3MDEzODkuYXAubmdyb2suaW8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1606426666);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gammu`
--
ALTER TABLE `gammu`
  ADD PRIMARY KEY (`Version`);

--
-- Indeks untuk tabel `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  ADD KEY `outbox_sender` (`SenderID`(250));

--
-- Indeks untuk tabel `outbox_multipart`
--
ALTER TABLE `outbox_multipart`
  ADD PRIMARY KEY (`ID`,`SequencePosition`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`IMEI`);

--
-- Indeks untuk tabel `rekrutmen`
--
ALTER TABLE `rekrutmen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sentitems`
--
ALTER TABLE `sentitems`
  ADD PRIMARY KEY (`ID`,`SequencePosition`),
  ADD KEY `sentitems_date` (`DeliveryDateTime`),
  ADD KEY `sentitems_tpmr` (`TPMR`),
  ADD KEY `sentitems_dest` (`DestinationNumber`),
  ADD KEY `sentitems_sender` (`SenderID`(250));

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `inbox`
--
ALTER TABLE `inbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `outbox`
--
ALTER TABLE `outbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rekrutmen`
--
ALTER TABLE `rekrutmen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
