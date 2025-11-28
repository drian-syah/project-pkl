-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 28, 2025 at 09:00 AM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_pengajuan_pkl_magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidangs`
--

CREATE TABLE `bidangs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `created_id` bigint UNSIGNED DEFAULT NULL,
  `updated_id` bigint UNSIGNED DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `deleted_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidangs`
--

INSERT INTO `bidangs` (`id`, `nama`, `kode`, `created_date`, `created_id`, `updated_id`, `updated_date`, `deleted_id`, `deleted_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Sekretariat', 'sekre', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-11-27 23:30:26', '2025-11-27 23:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daily_report`
--

CREATE TABLE `daily_report` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `ringkasan` text COLLATE utf8mb4_unicode_ci,
  `kendala` text COLLATE utf8mb4_unicode_ci,
  `screenshot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` bigint UNSIGNED DEFAULT NULL,
  `updated_id` bigint UNSIGNED DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `deleted_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_jabatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_id` bigint UNSIGNED DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_id` bigint UNSIGNED DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `nama_jabatan`, `created_id`, `created_date`, `updated_id`, `updated_date`, `created_at`, `updated_at`) VALUES
(1, 'Sekretariat', 1, '2025-11-28 06:30:41', NULL, NULL, '2025-11-27 23:30:41', '2025-11-27 23:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0000_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000000_create_bidangs_table', 1),
(3, '0001_01_01_000001_create_cache_table', 1),
(4, '0001_01_01_000002_create_jobs_table', 1),
(5, '0001_01_02_000000_create_sekolahs_table', 1),
(6, '2025_10_13_010000_create_pengajuan_pklmagangs_table', 1),
(7, '2025_10_13_015000_create_pegawais_table', 1),
(8, '2025_10_13_020000_create_pembimbings_table', 1),
(9, '2025_10_13_025000_create_tugas_table', 1),
(10, '2025_10_13_044618_create_penempatans_table', 1),
(11, '2025_10_13_044640_create_siswa_profiles_table', 1),
(12, '2025_10_13_044715_create_presensis_table', 1),
(13, '2025_10_13_044727_create_daily_reports_table', 1),
(14, '2025_10_13_044826_create_tugas_assignees_table', 1),
(15, '2025_10_13_044835_create_tugas_submits_table', 1),
(16, '2025_10_23_044850_add_user_id_to_sekolahs_table', 1),
(17, '2025_10_23_071519_add_timestamps_to_pengajuan_pklmagang_table', 1),
(18, '2025_11_05_071016_add_foreign_key_id_bidang_to_users_table', 1),
(19, '2025_11_10_041718_create_jabatans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `nip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidang_id` bigint UNSIGNED DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` bigint UNSIGNED DEFAULT NULL,
  `updated_id` bigint UNSIGNED DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `deleted_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `user_id`, `nip`, `nama`, `jabatan_id`, `bidang_id`, `created_date`, `created_id`, `updated_id`, `updated_date`, `deleted_id`, `deleted_date`, `is_active`) VALUES
(5, 2, '6372', 'Tono', '1', 1, '2025-11-28 06:54:56', NULL, NULL, NULL, NULL, NULL, 1),
(6, 1, '7484', 'ProLight', '1', 1, '2025-11-28 07:59:06', NULL, NULL, NULL, NULL, NULL, 1),
(7, 4, '7382', 'Mohammad Teguh Adriansyah', '1', 1, '2025-11-28 08:49:14', NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `id` bigint UNSIGNED NOT NULL,
  `pengajuan_id` bigint UNSIGNED DEFAULT NULL,
  `pegawai_id` bigint UNSIGNED DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `created_id` bigint UNSIGNED DEFAULT NULL,
  `updated_id` bigint UNSIGNED DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `deleted_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penempatan`
--

CREATE TABLE `penempatan` (
  `id` bigint UNSIGNED NOT NULL,
  `pengajuan_id` bigint UNSIGNED DEFAULT NULL,
  `bidang_id` bigint UNSIGNED DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `created_id` bigint UNSIGNED DEFAULT NULL,
  `updated_id` bigint UNSIGNED DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `deleted_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penempatan`
--

INSERT INTO `penempatan` (`id`, `pengajuan_id`, `bidang_id`, `created_date`, `created_id`, `updated_id`, `updated_date`, `deleted_id`, `deleted_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_pklmagang`
--

CREATE TABLE `pengajuan_pklmagang` (
  `id` bigint UNSIGNED NOT NULL,
  `no_surat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_surat` date DEFAULT NULL,
  `sekolah_id` bigint UNSIGNED DEFAULT NULL,
  `jumlah_siswa` int DEFAULT NULL,
  `periode_mulai` date DEFAULT NULL,
  `periode_selesai` date DEFAULT NULL,
  `status` enum('draft','diproses','diterima','ditolak','selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `file_surat_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by_role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sekolah',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` bigint UNSIGNED DEFAULT NULL,
  `updated_id` bigint UNSIGNED DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `deleted_id` bigint UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan_pklmagang`
--

INSERT INTO `pengajuan_pklmagang` (`id`, `no_surat`, `tgl_surat`, `sekolah_id`, `jumlah_siswa`, `periode_mulai`, `periode_selesai`, `status`, `file_surat_path`, `created_by_role`, `created_date`, `created_id`, `updated_id`, `updated_date`, `deleted_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '87637', '2025-11-28', 1, 2, '2025-11-28', '2025-11-28', 'diterima', 'surat/zZz6MD58n8q1fvtIl9hXiO8IXARfFMBUMqNnbdcX.pdf', 'Admin', '2025-11-28 08:00:37', 1, NULL, NULL, NULL, 1, '2025-11-28 01:00:37', '2025-11-28 01:00:43');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `status` enum('hadir','absen','sakit') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hadir',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` bigint UNSIGNED DEFAULT NULL,
  `updated_id` bigint UNSIGNED DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `deleted_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sekolahs`
--

CREATE TABLE `sekolahs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npsn` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `created_id` bigint UNSIGNED DEFAULT NULL,
  `updated_id` bigint UNSIGNED DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `deleted_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolahs`
--

INSERT INTO `sekolahs` (`id`, `nama`, `npsn`, `alamat`, `kontak`, `created_date`, `created_id`, `updated_id`, `updated_date`, `deleted_id`, `deleted_date`, `is_active`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'SMKN 4 KUNINGAN', '9372', 'Cikeusik', '08283920373', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-11-27 18:47:55', '2025-11-27 18:47:55', 6);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9v5YtTY4sulgixeExeui3e8FbDDlXU7MJRuzOGnU', 2, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUFR0Slhvc002eWlWY2Y5eHZ0dk1nd2sxaDRwNGN2NE5sNVlPb0lLUSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly9tYW5hamVtZW50dWdhcy50ZXN0L3BlbWJpbWJpbmciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1764319839),
('Kvq2FrOMSGWb5oGqvYqhx6GObAxJjMD7DXwWKJrk', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib3I0QVlCNkZJdG9UaHRCc3RXN1Y5dE04WnNkVmM4SDJyeFVZRUFuayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly9tYW5hamVtZW50dWdhcy50ZXN0L2FkbWluL3VzZXIvcGVnYXdhaS9pbmRleCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1764320155);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_profile`
--

CREATE TABLE `siswa_profile` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `pengajuan_id` bigint UNSIGNED DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` bigint UNSIGNED DEFAULT NULL,
  `updated_id` bigint UNSIGNED DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `deleted_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa_profile`
--

INSERT INTO `siswa_profile` (`id`, `user_id`, `pengajuan_id`, `nama`, `nisn`, `kelas`, `jurusan`, `foto`, `created_date`, `created_id`, `updated_id`, `updated_date`, `deleted_id`, `deleted_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'Tono', '0087273', '12', 'Pengembangan Perangkat Lunak & Gim', 'foto_siswa/dZ8ONccjIKAy5TrfAYWhO7fDGUStPhgrq7Ra93zk.jpg', '2025-11-28 08:01:04', NULL, NULL, NULL, NULL, NULL, 1, '2025-11-28 01:01:04', '2025-11-28 01:01:04'),
(2, 8, 1, 'Mohammad Teguh Adriansyah', '00838292', '12', 'Pengembangan Perangkat Lunak & Gim', 'foto_siswa/SusIt7MwNZPrsH34imgxRHeQegFzEQMs0l4Ucap3.jpg', '2025-11-28 08:01:20', NULL, NULL, NULL, NULL, NULL, 1, '2025-11-28 01:01:20', '2025-11-28 01:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint UNSIGNED NOT NULL,
  `pembimbing_id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `tenggat` timestamp NULL DEFAULT NULL,
  `status` enum('pending','sudah dinilai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_date` timestamp NULL DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `updated_id` int DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `deleted_id` int DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tugas_assignee`
--

CREATE TABLE `tugas_assignee` (
  `id` bigint UNSIGNED NOT NULL,
  `tugas_id` bigint UNSIGNED DEFAULT NULL,
  `siswa_id` bigint UNSIGNED DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `created_id` bigint UNSIGNED DEFAULT NULL,
  `updated_id` bigint UNSIGNED DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `deleted_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tugas_submits`
--

CREATE TABLE `tugas_submits` (
  `id` bigint UNSIGNED NOT NULL,
  `tugas_id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `jawaban` text COLLATE utf8mb4_unicode_ci,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submitted_at` timestamp NULL DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_id` bigint UNSIGNED DEFAULT NULL,
  `updated_id` bigint UNSIGNED DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `deleted_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Pembimbing','Siswa','Sekolah') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bidang` bigint UNSIGNED DEFAULT NULL,
  `status` enum('diproses','diterima','ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'diproses',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_tugas` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL,
  `created_id` bigint UNSIGNED DEFAULT NULL,
  `updated_id` bigint UNSIGNED DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `deleted_id` bigint UNSIGNED DEFAULT NULL,
  `deleted_date` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `email`, `role`, `id_bidang`, `status`, `password`, `is_tugas`, `remember_token`, `created_date`, `created_id`, `updated_id`, `updated_date`, `deleted_id`, `deleted_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'ProLight', 'ProLight', 'aung@gmail.com', 'Admin', NULL, 'diproses', '$2y$12$zQDq8h9LxZlNLCai9ZUA/.K.fcycmsZqWcjeO2GXpfkvdFw8KYb1a', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-11-27 18:47:19', '2025-11-27 18:47:19'),
(2, 'Tono', 'Tono', 'tonokaryawan@gmail.com', 'Pembimbing', NULL, 'diproses', '$2y$12$B5lx4iR5NyzqC3cG3Mwtf.BHlK6PC4dxgmkjcQwj4xnBBwK1aEdca', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-11-27 18:47:20', '2025-11-27 19:56:41'),
(3, 'Bagus', 'Bagus', 'baguskaryawan@gmail.com', 'Sekolah', NULL, 'diproses', '$2y$12$g0dR7HdvImyJ0idwgA5UWOndAoNtgxUxOzmnKpoSuPxMNAdqmAJCa', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-11-27 18:47:20', '2025-11-27 18:47:20'),
(4, 'Mohammad Teguh Adriansyah', 'Mohammad Teguh Adriansyah', 'teguh@gmail.com', 'Pembimbing', NULL, 'diproses', '$2y$12$u84Sh2VlOc0pYmz2QxeGBuMYaIY8J9sAFonXTeu4E2XZ/4jnieZry', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-11-27 18:47:20', '2025-11-27 18:47:20'),
(5, 'Dhonan', 'Dhonan', 'dhonan@gmail.com', 'Siswa', NULL, 'diproses', '$2y$12$NYbNR.5dBEGcexP6/pe3/.e/WcM9DNTfzKIWDQbpnBKdNOh47rjS6', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-11-27 18:47:20', '2025-11-27 18:47:20'),
(6, 'smkn4kuningan', 'SMKN 4 KUNINGAN', 'smkn4kuningan@gmail.com', 'Sekolah', NULL, 'diproses', '$2y$12$EtqevvGgn2vQSLULnMjDcuXQKwt3nuquIZ7ALTNcfiN0f626w3pqi', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-11-27 18:47:55', '2025-11-27 18:47:55'),
(7, '0087273', 'Tono', 'tono370@gmail.com', 'Siswa', NULL, 'diproses', '$2y$12$rnmdO.J7WEaRy47Gta7T2uXdePp.CMiEOAplLFl6F7U/6aQRW52e2', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-11-28 01:01:04', '2025-11-28 01:01:04'),
(8, '00838292', 'Mohammad Teguh Adriansyah', 'mohammad.teguh.adriansyah210@gmail.com', 'Siswa', NULL, 'diproses', '$2y$12$.7Bq3pE4TdkXm4GIMuLwWehLL1vkRlY3p.UmQc0e8e001mAVP1ZrK', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-11-28 01:01:20', '2025-11-28 01:01:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidangs`
--
ALTER TABLE `bidangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bidangs_created_id_foreign` (`created_id`),
  ADD KEY `bidangs_updated_id_foreign` (`updated_id`),
  ADD KEY `bidangs_deleted_id_foreign` (`deleted_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `daily_report`
--
ALTER TABLE `daily_report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daily_report_siswa_id_foreign` (`siswa_id`),
  ADD KEY `daily_report_created_id_foreign` (`created_id`),
  ADD KEY `daily_report_updated_id_foreign` (`updated_id`),
  ADD KEY `daily_report_deleted_id_foreign` (`deleted_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jabatans_nama_jabatan_unique` (`nama_jabatan`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawai_nip_unique` (`nip`),
  ADD KEY `pegawai_user_id_foreign` (`user_id`),
  ADD KEY `pegawai_bidang_id_foreign` (`bidang_id`),
  ADD KEY `pegawai_created_id_foreign` (`created_id`),
  ADD KEY `pegawai_updated_id_foreign` (`updated_id`),
  ADD KEY `pegawai_deleted_id_foreign` (`deleted_id`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembimbing_pengajuan_id_foreign` (`pengajuan_id`),
  ADD KEY `pembimbing_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `pembimbing_created_id_foreign` (`created_id`),
  ADD KEY `pembimbing_updated_id_foreign` (`updated_id`),
  ADD KEY `pembimbing_deleted_id_foreign` (`deleted_id`);

--
-- Indexes for table `penempatan`
--
ALTER TABLE `penempatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penempatan_pengajuan_id_foreign` (`pengajuan_id`),
  ADD KEY `penempatan_bidang_id_foreign` (`bidang_id`),
  ADD KEY `penempatan_created_id_foreign` (`created_id`),
  ADD KEY `penempatan_updated_id_foreign` (`updated_id`),
  ADD KEY `penempatan_deleted_id_foreign` (`deleted_id`);

--
-- Indexes for table `pengajuan_pklmagang`
--
ALTER TABLE `pengajuan_pklmagang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan_pklmagang_sekolah_id_foreign` (`sekolah_id`),
  ADD KEY `pengajuan_pklmagang_created_id_foreign` (`created_id`),
  ADD KEY `pengajuan_pklmagang_updated_id_foreign` (`updated_id`),
  ADD KEY `pengajuan_pklmagang_deleted_id_foreign` (`deleted_id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presensi_siswa_id_foreign` (`siswa_id`),
  ADD KEY `presensi_created_id_foreign` (`created_id`),
  ADD KEY `presensi_updated_id_foreign` (`updated_id`),
  ADD KEY `presensi_deleted_id_foreign` (`deleted_id`);

--
-- Indexes for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sekolahs_npsn_unique` (`npsn`),
  ADD KEY `sekolahs_updated_id_foreign` (`updated_id`),
  ADD KEY `sekolahs_deleted_id_foreign` (`deleted_id`),
  ADD KEY `sekolahs_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswa_profile`
--
ALTER TABLE `siswa_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_profile_nisn_unique` (`nisn`),
  ADD KEY `siswa_profile_user_id_foreign` (`user_id`),
  ADD KEY `siswa_profile_pengajuan_id_foreign` (`pengajuan_id`),
  ADD KEY `siswa_profile_created_id_foreign` (`created_id`),
  ADD KEY `siswa_profile_updated_id_foreign` (`updated_id`),
  ADD KEY `siswa_profile_deleted_id_foreign` (`deleted_id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_pembimbing_id_foreign` (`pembimbing_id`);

--
-- Indexes for table `tugas_assignee`
--
ALTER TABLE `tugas_assignee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_assignee_tugas_id_foreign` (`tugas_id`),
  ADD KEY `tugas_assignee_siswa_id_foreign` (`siswa_id`),
  ADD KEY `tugas_assignee_created_id_foreign` (`created_id`),
  ADD KEY `tugas_assignee_updated_id_foreign` (`updated_id`),
  ADD KEY `tugas_assignee_deleted_id_foreign` (`deleted_id`);

--
-- Indexes for table `tugas_submits`
--
ALTER TABLE `tugas_submits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_submits_tugas_id_foreign` (`tugas_id`),
  ADD KEY `tugas_submits_siswa_id_foreign` (`siswa_id`),
  ADD KEY `tugas_submits_created_id_foreign` (`created_id`),
  ADD KEY `tugas_submits_updated_id_foreign` (`updated_id`),
  ADD KEY `tugas_submits_deleted_id_foreign` (`deleted_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_bidang_foreign` (`id_bidang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidangs`
--
ALTER TABLE `bidangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daily_report`
--
ALTER TABLE `daily_report`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penempatan`
--
ALTER TABLE `penempatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengajuan_pklmagang`
--
ALTER TABLE `pengajuan_pklmagang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa_profile`
--
ALTER TABLE `siswa_profile`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tugas_assignee`
--
ALTER TABLE `tugas_assignee`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tugas_submits`
--
ALTER TABLE `tugas_submits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidangs`
--
ALTER TABLE `bidangs`
  ADD CONSTRAINT `bidangs_created_id_foreign` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bidangs_deleted_id_foreign` FOREIGN KEY (`deleted_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `bidangs_updated_id_foreign` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `daily_report`
--
ALTER TABLE `daily_report`
  ADD CONSTRAINT `daily_report_created_id_foreign` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `daily_report_deleted_id_foreign` FOREIGN KEY (`deleted_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `daily_report_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa_profile` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `daily_report_updated_id_foreign` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidangs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pegawai_created_id_foreign` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pegawai_deleted_id_foreign` FOREIGN KEY (`deleted_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pegawai_updated_id_foreign` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pegawai_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD CONSTRAINT `pembimbing_created_id_foreign` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pembimbing_deleted_id_foreign` FOREIGN KEY (`deleted_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pembimbing_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembimbing_pengajuan_id_foreign` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan_pklmagang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembimbing_updated_id_foreign` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `penempatan`
--
ALTER TABLE `penempatan`
  ADD CONSTRAINT `penempatan_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penempatan_created_id_foreign` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `penempatan_deleted_id_foreign` FOREIGN KEY (`deleted_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `penempatan_pengajuan_id_foreign` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan_pklmagang` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penempatan_updated_id_foreign` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pengajuan_pklmagang`
--
ALTER TABLE `pengajuan_pklmagang`
  ADD CONSTRAINT `pengajuan_pklmagang_created_id_foreign` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengajuan_pklmagang_deleted_id_foreign` FOREIGN KEY (`deleted_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengajuan_pklmagang_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengajuan_pklmagang_updated_id_foreign` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_created_id_foreign` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `presensi_deleted_id_foreign` FOREIGN KEY (`deleted_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `presensi_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa_profile` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `presensi_updated_id_foreign` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD CONSTRAINT `sekolahs_deleted_id_foreign` FOREIGN KEY (`deleted_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sekolahs_updated_id_foreign` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `sekolahs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa_profile`
--
ALTER TABLE `siswa_profile`
  ADD CONSTRAINT `siswa_profile_created_id_foreign` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `siswa_profile_deleted_id_foreign` FOREIGN KEY (`deleted_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `siswa_profile_pengajuan_id_foreign` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan_pklmagang` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `siswa_profile_updated_id_foreign` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `siswa_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_pembimbing_id_foreign` FOREIGN KEY (`pembimbing_id`) REFERENCES `pembimbing` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tugas_assignee`
--
ALTER TABLE `tugas_assignee`
  ADD CONSTRAINT `tugas_assignee_created_id_foreign` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tugas_assignee_deleted_id_foreign` FOREIGN KEY (`deleted_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tugas_assignee_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa_profile` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tugas_assignee_tugas_id_foreign` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tugas_assignee_updated_id_foreign` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `tugas_submits`
--
ALTER TABLE `tugas_submits`
  ADD CONSTRAINT `tugas_submits_created_id_foreign` FOREIGN KEY (`created_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tugas_submits_deleted_id_foreign` FOREIGN KEY (`deleted_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tugas_submits_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa_profile` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tugas_submits_tugas_id_foreign` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tugas_submits_updated_id_foreign` FOREIGN KEY (`updated_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_bidang_foreign` FOREIGN KEY (`id_bidang`) REFERENCES `bidangs` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
