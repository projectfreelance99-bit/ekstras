-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Apr 2026 pada 02.18
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekstra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_pembina`
--

CREATE TABLE `absen_pembina` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembina_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `status_absensi` enum('Hadir','Izin','Sakit') NOT NULL,
  `status_verifikasi` varchar(255) NOT NULL DEFAULT 'Belum Diverifikasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absen_pembina`
--

INSERT INTO `absen_pembina` (`id`, `pembina_id`, `tanggal`, `status_absensi`, `status_verifikasi`, `created_at`, `updated_at`) VALUES
(2, 2, '2025-06-06', 'Hadir', 'Terverifikasi', '2025-06-05 19:03:33', '2026-04-19 01:47:24'),
(3, 2, '2025-06-08', 'Hadir', 'Belum Diverifikasi', '2025-06-06 11:26:11', '2025-06-06 11:26:11'),
(4, 4, '2025-06-16', 'Hadir', 'Terverifikasi', '2025-06-15 23:45:16', '2025-06-15 23:45:44'),
(5, 5, '2026-04-19', 'Hadir', 'Terverifikasi', '2026-04-19 01:47:12', '2026-04-19 01:47:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_siswa`
--

CREATE TABLE `absen_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `masuk` varchar(1) DEFAULT NULL,
  `izin` varchar(1) DEFAULT NULL,
  `sakit` varchar(1) DEFAULT NULL,
  `ekstrakurikuler_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_absensi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absen_siswa`
--

INSERT INTO `absen_siswa` (`id`, `siswa_id`, `masuk`, `izin`, `sakit`, `ekstrakurikuler_id`, `tanggal_absensi`, `created_at`, `updated_at`) VALUES
(3, 5, NULL, 'Y', NULL, 3, '2025-06-06', '2025-06-05 10:28:27', '2025-06-05 10:28:27'),
(6, 7, 'Y', NULL, NULL, 4, '2025-06-06', '2025-06-05 20:06:30', '2025-06-05 20:06:30'),
(7, 8, 'Y', NULL, NULL, 4, '2026-04-19', '2026-04-19 01:47:00', '2026-04-19 01:47:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekskul`
--

CREATE TABLE `ekskul` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pembina_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id`, `nama`, `created_at`, `updated_at`, `pembina_id`) VALUES
(3, 'pramukaa', '2025-06-04 21:01:11', '2026-04-19 01:45:17', 3),
(4, 'Voli', '2025-06-05 05:44:38', '2025-06-05 05:44:38', 2),
(5, 'Tenis Meja', '2025-06-15 23:44:47', '2025-06-15 23:44:47', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id` int(11) NOT NULL,
  `ekstrakurikuler_id` int(11) DEFAULT NULL,
  `hari` varchar(50) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwals`
--

INSERT INTO `jadwals` (`id`, `ekstrakurikuler_id`, `hari`, `jam`, `created_at`, `updated_at`) VALUES
(1, 1, 'Senin', '11:52:00', '2025-06-04 21:54:31', '2025-06-04 21:54:31'),
(7, 3, 'Rabu', '05:36:00', '2025-06-06 10:31:51', '2025-06-06 10:31:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_21_create_absen_pembina_table', 1),
(6, '2024_03_21_create_ekstrakurikuler_table', 1),
(7, '2024_03_21_create_pendaftarans_table', 1),
(8, '2024_03_21_create_siswa_table', 1),
(9, '2025_06_03_202602_create_ekskul_table', 1),
(10, '2025_06_03_205716_add_role_to_users_table', 1),
(11, '2024_03_21_create_pembina_table', 2),
(12, '2025_06_05_051324_create_absen_siswa_table', 3),
(13, '2025_06_05_081847_create_nilai_siswas_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_siswas`
--

CREATE TABLE `nilai_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `ekstrakurikuler` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilai_siswas`
--

INSERT INTO `nilai_siswas` (`id`, `siswa_id`, `ekstrakurikuler`, `nilai`, `created_at`, `updated_at`) VALUES
(4, 5, 'bela diri', 95, '2025-06-05 19:37:10', '2026-04-19 01:47:57'),
(5, 8, 'voli', 85, '2026-04-19 01:47:47', '2026-04-19 01:47:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembina`
--

CREATE TABLE `pembina` (
  `id` int(11) NOT NULL,
  `nama_pembina` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembina`
--

INSERT INTO `pembina` (`id`, `nama_pembina`, `jenis_kelamin`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'muhammat', 'Laki-Laki', '089765432234', 'bondowoso', '2025-06-05 05:43:42', '2026-04-19 01:44:55'),
(3, 'siti nur azizah', 'Perempuan', '089765432234', 'Jember', '2025-06-05 05:44:01', '2025-06-05 05:44:11'),
(4, 'nurul mustofa', 'Perempuan', '089765432234', 'Jember', '2025-06-15 23:44:26', '2025-06-15 23:44:26'),
(5, 'nurazizah', 'Perempuan', '083495092590', 'situbondo', '2026-04-19 01:44:46', '2026-04-19 01:44:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftarans`
--

CREATE TABLE `pendaftarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `hobby` varchar(255) DEFAULT NULL,
  `ekstrakurikuler` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendaftarans`
--

INSERT INTO `pendaftarans` (`id`, `nama_lengkap`, `ttl`, `alamat`, `kelas`, `hobby`, `ekstrakurikuler`, `created_at`, `updated_at`) VALUES
(2, 'muhammad farhan', 'bondowoso 09 september 2015', 'bondowoso', 'VII', 'sepak bola', 'Sepak Bola', '2025-06-04 21:27:32', '2025-06-04 21:28:36'),
(3, 'ahmad wahyudi', 'Jember 09 september 2002', 'Jember', 'VIII', 'buat onar', 'Bela Diri', '2025-06-05 06:12:35', '2025-06-05 06:12:35'),
(4, 'siti fatimah', 'bondowoso 09 september 2014', 'situbondo', 'VII', 'Main game', 'Basket', '2025-06-24 22:22:30', '2025-06-24 22:22:30'),
(5, 'siti nur', 'situbondo 31 april 2003', 'situbondo', 'VI', 'bulu tangkis', 'Voli', '2026-04-19 01:46:43', '2026-04-19 01:46:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ekstrakurikuler_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nis`, `kelas`, `created_at`, `updated_at`, `ekstrakurikuler_id`) VALUES
(5, 'muhammad farhan', '2015011347', 'VII', '2025-06-04 21:21:18', '2025-06-05 06:18:49', 3),
(7, 'siti nur azizah', '123456789987', 'VII', '2025-06-05 20:06:03', '2025-06-05 20:06:03', 3),
(8, 'wilda', '2021500', 'VI', '2026-04-19 01:44:07', '2026-04-19 01:45:26', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('siswa','pembina','kesiswaan','kepala_sekolah') NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` tinyint(4) DEFAULT 1 COMMENT '1:admin, 2:siswa, 3:pembina ,4:kasekolah\r\n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'mts2bondowoso@gmail.com', '', NULL, '$2y$10$lvX4c5Ta5Xd.qm6FZugUZuFVcaznr9gUJuTIcFaTovNiOek.3Xlji', NULL, 1, '2025-06-04 15:58:02', '2025-06-04 15:58:02'),
(2, 'ahmad', 'ahmad@gmail.com', 'siswa', NULL, '$2y$12$9EIP1CQKdkTAmeIKI/o.Wu2f45mHT1SkK9gwaz/N9gItYPXqOCZjG', NULL, 2, '2025-06-05 02:30:28', '2025-06-05 02:30:28'),
(3, 'rayhan', 'rayhan@gmail.com', 'siswa', NULL, '$2y$12$wQRNgCJ3Ms63VEmask835uj8VWyVxFr/HtU4YSCa9s7xCtez.XAqS', NULL, 2, '2025-06-05 02:31:50', '2025-06-05 02:31:50'),
(4, 'pembina', 'sitinurazizah@gmail.com', 'pembina', NULL, '$2y$12$9EIP1CQKdkTAmeIKI/o.Wu2f45mHT1SkK9gwaz/N9gItYPXqOCZjG', NULL, 3, NULL, NULL),
(5, 'kepala sekolah', 'nurazizah@gmail.com', 'kepala_sekolah', NULL, '$2y$12$9EIP1CQKdkTAmeIKI/o.Wu2f45mHT1SkK9gwaz/N9gItYPXqOCZjG', NULL, 4, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_pembina`
--
ALTER TABLE `absen_pembina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absen_pembina_pembina_id_foreign` (`pembina_id`);

--
-- Indeks untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_siswas`
--
ALTER TABLE `nilai_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_siswas_siswa_id_foreign` (`siswa_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pembina`
--
ALTER TABLE `pembina`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftarans`
--
ALTER TABLE `pendaftarans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_pembina`
--
ALTER TABLE `absen_pembina`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `absen_siswa`
--
ALTER TABLE `absen_siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `nilai_siswas`
--
ALTER TABLE `nilai_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembina`
--
ALTER TABLE `pembina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pendaftarans`
--
ALTER TABLE `pendaftarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen_pembina`
--
ALTER TABLE `absen_pembina`
  ADD CONSTRAINT `absen_pembina_pembina_id_foreign` FOREIGN KEY (`pembina_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai_siswas`
--
ALTER TABLE `nilai_siswas`
  ADD CONSTRAINT `nilai_siswas_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
