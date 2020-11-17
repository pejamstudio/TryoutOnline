-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 17 Nov 2020 pada 10.41
-- Versi server: 5.7.23
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tryout_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

DROP TABLE IF EXISTS `guru`;
CREATE TABLE IF NOT EXISTS `guru` (
  `id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` bigint(20) NOT NULL,
  `id_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nip`, `id_user`, `created_at`, `updated_at`) VALUES
('5f0e8d0542f3c', 123456789012345678, '5f0e8d0542f35', '2020-07-14 21:58:45', '2020-07-20 00:17:50'),
('5f180b3c0edd1', 123456789012345696, '5f180b3c0edc4', '2020-07-22 02:47:40', '2020-07-22 02:47:40'),
('5f1f8539ba5f9', 123456789012345678, '5f1f8539ba5ec', '2020-07-27 18:54:02', '2020-07-27 18:54:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE IF NOT EXISTS `jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `tanggal`, `waktu`, `id_mapel`, `created_at`, `updated_at`) VALUES
(3, '2020-07-22', '10:32:00', 66, '2020-07-18 06:19:11', '2020-07-21 18:42:30'),
(4, '2020-07-27', '11:00:00', 67, '2020-07-19 22:09:19', '2020-07-26 21:25:51'),
(5, '2020-07-28', '17:09:00', 71, '2020-07-28 02:09:28', '2020-07-28 02:09:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE IF NOT EXISTS `jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama_jurusan`, `created_at`, `updated_at`) VALUES
(1, 'IPA', '2020-07-10 09:03:16', '2020-07-27 18:47:56'),
(3, 'IPS', '2020-07-10 09:51:51', '2020-07-10 09:51:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_jurusan` int(11) NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `id_jurusan`, `nama_kelas`, `created_at`, `updated_at`) VALUES
(1, 1, 'X IPA I', '2018-05-09 00:23:43', '2020-07-27 18:50:18'),
(2, 3, 'X IPS I', '2020-07-10 17:00:00', '2020-07-27 18:49:24'),
(9, 1, 'X IPA II', '2020-07-14 15:48:52', '2020-07-27 18:50:01'),
(10, 1, 'X IPA III', '2020-07-17 08:15:46', '2020-07-27 18:49:40'),
(11, 3, 'X IPS II', '2020-07-17 08:16:44', '2020-07-27 18:49:12'),
(12, 3, 'X IPS lll', '2020-07-27 18:48:56', '2020-07-27 18:48:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_siswa`
--

DROP TABLE IF EXISTS `kelas_siswa`;
CREATE TABLE IF NOT EXISTS `kelas_siswa` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `id_kelas`, `id_siswa`, `created_at`, `updated_at`) VALUES
(1, 9, 2, '2020-07-10 17:00:00', '2020-07-11 08:26:50'),
(5, 1, 11, '2020-07-19 23:36:33', '2020-07-19 23:36:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

DROP TABLE IF EXISTS `mapel`;
CREATE TABLE IF NOT EXISTS `mapel` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `kkm` double NOT NULL,
  `durasi` bigint(100) NOT NULL,
  `jumlah_soal` int(100) NOT NULL DEFAULT '0',
  `id_kelas` int(200) DEFAULT NULL,
  `id_guru` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `nama_mapel`, `deskripsi`, `kkm`, `durasi`, `jumlah_soal`, `id_kelas`, `id_guru`, `created_at`, `updated_at`) VALUES
(74, 'Kimia', 'wkwkwkwk', 85, 120, 40, 1, NULL, '2020-07-28 00:32:36', '2020-07-28 00:32:36'),
(75, 'Kimia', 'wkwkwkwk', 85, 120, 40, 10, NULL, '2020-07-28 00:32:36', '2020-07-28 00:32:36'),
(73, 'Biologi', 'wkwkwkwk', 75, 60, 10, 10, '5f0e8d0542f3c', '2020-07-28 00:31:05', '2020-07-28 00:31:05'),
(70, 'Fisika Dasar', 'wkwkwkwk', 75, 60, 10, 10, NULL, '2020-07-27 19:12:57', '2020-07-27 19:12:57'),
(72, 'Biologi', 'wkwkwkwk', 75, 60, 10, 9, NULL, '2020-07-28 00:31:05', '2020-07-28 00:31:05'),
(71, 'Biologi', 'wkwkwkwk', 75, 60, 10, 1, NULL, '2020-07-28 00:31:05', '2020-07-28 00:31:05'),
(69, 'Fisika Dasar', 'wkwkwkwk', 75, 60, 10, 9, '5f1f8539ba5f9', '2020-07-27 19:12:57', '2020-07-27 19:24:41'),
(68, 'Fisika Dasar', 'wkwkwkwk', 75, 60, 10, 1, '5f180b3c0edd1', '2020-07-27 19:12:57', '2020-07-27 19:24:23'),
(67, 'Matematika', 'wkwkwkwk', 75, 60, 10, 9, '5f0e8d0542f3c', '2020-07-18 05:54:52', '2020-07-27 18:54:50'),
(66, 'Matematika', 'wkwkwkwk', 75, 60, 10, 1, '5f0e8d0542f3c', '2020-07-18 05:54:52', '2020-07-27 18:54:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2020_07_07_040702_create_users_table', 1),
(7, '2020_07_08_015922_create_gurus_table', 1),
(8, '2020_07_08_020218_create_siswas_table', 1),
(9, '2020_07_08_020338_create_kelass_table', 1),
(10, '2020_07_08_020759_create_kelas_siswas_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

DROP TABLE IF EXISTS `nilai`;
CREATE TABLE IF NOT EXISTS `nilai` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(200) NOT NULL,
  `id_guru` varchar(200) NOT NULL,
  `id_mapel` int(100) NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `id_siswa`, `id_guru`, `id_mapel`, `nilai`, `created_at`, `updated_at`) VALUES
(10, 2, '5f0e8d0542f3c', 67, 100, '2020-07-26 21:30:38', '2020-07-26 21:30:38'),
(9, 11, '5f0e8d0542f3c', 66, 50, '2020-07-26 21:07:17', '2020-07-26 21:07:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

DROP TABLE IF EXISTS `siswa`;
CREATE TABLE IF NOT EXISTS `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nisn` bigint(20) NOT NULL,
  `id_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 17051204020, '5f0837ecbc532', '2020-07-10 02:42:05', '2020-07-10 02:42:05'),
(11, 1234567890, '5f153b708250b', '2020-07-19 23:36:33', '2020-07-19 23:36:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_jawab`
--

DROP TABLE IF EXISTS `siswa_jawab`;
CREATE TABLE IF NOT EXISTS `siswa_jawab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(200) NOT NULL,
  `id_soal` int(200) NOT NULL,
  `jawab` char(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa_jawab`
--

INSERT INTO `siswa_jawab` (`id`, `id_siswa`, `id_soal`, `jawab`, `created_at`, `updated_at`) VALUES
(36, 2, 6, 'A', '2020-07-26 21:30:38', '2020-07-26 21:30:38'),
(34, 11, 5, 'C', '2020-07-26 21:07:17', '2020-07-26 21:07:17'),
(33, 11, 4, 'E', '2020-07-26 21:07:17', '2020-07-26 21:07:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

DROP TABLE IF EXISTS `soal`;
CREATE TABLE IF NOT EXISTS `soal` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `id_mapel` int(11) NOT NULL,
  `soal` text NOT NULL,
  `jawab_a` text NOT NULL,
  `jawab_b` text NOT NULL,
  `jawab_c` text NOT NULL,
  `jawab_d` text NOT NULL,
  `jawab_e` text NOT NULL,
  `kunci` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id`, `id_mapel`, `soal`, `jawab_a`, `jawab_b`, `jawab_c`, `jawab_d`, `jawab_e`, `kunci`, `created_at`, `updated_at`) VALUES
(4, 66, 'apa soalnya ?', 'asda', 'fghjk', 'jiio', 'tyui', 'fghjk', 'E', '2020-07-13 00:34:27', '2020-07-18 05:54:52'),
(5, 66, 'apa jawabanya ?', 'fdghjk', 'dddfghjk', 'tyuio', 'dfghj', 'rrtyu', 'B', '2020-07-14 21:11:28', '2020-07-18 05:54:52'),
(6, 67, 'where ?', 'qwe', 'adasd', 'ffsds', 'ghjk', 'bbb', 'A', '2020-07-18 05:13:33', '2020-07-18 05:54:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(200) NOT NULL,
  `nama` text NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telp` bigint(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL,
  `level_user` varchar(1) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `telp`, `alamat`, `email`, `username`, `password`, `foto`, `level_user`, `created_at`, `updated_at`) VALUES
('admin', 'admin', 'Laki - laki', 'Surabaya', '2020-07-10', 85853858559, 'Surabaya', 'admin@tryoutonline.com', 'admin', '$2y$12$T/OIx/K.QU1eZBi0M04YrePra1Ee3ehJ5fUQ66/U2DCut1oGBPvN6', '-', 'A', '2020-07-09 17:00:00', '2020-07-09 17:00:00'),
('5f180b3c0edc4', 'Rian', 'Laki - laki', 'Kampar', '1998-01-27', 85853858559, 'Ponorogo', 'riandwisusanto1903@gmail.com', 'rian03', '$2y$10$DmPfbCzOj/nkEA.UN6KqnuRYAkXlWbdmGCRRvY/LAyEPufJ9UyVDa', '379042266_guru.jpg', 'G', '2020-07-22 02:47:40', '2020-07-22 02:47:40'),
('5f0837ecbc532', 'Rian Dwi Susanto', 'Laki - Laki', 'Riau', '1998-01-28', 85853858559, 'Sooko Ponorogo', 'riandwisusanto@gmail.com', 'Rian', '$2y$10$/Yx/PseSfgGpILIJwvLvye4MPWJ4dtpfIK1ocuhYP0z1YypovtEuS', '989430846_siswa.jpg', 'S', '2020-07-10 02:42:05', '2020-07-27 18:33:31'),
('5f153b708250b', 'iqbal', 'Laki - laki', 'sidoarjo', '2020-07-01', 85853858559, 'sidoarjo', 'iqbalulh@gmail.com', 'iqbal', '$2y$10$92MMSDiuxmDX9lUn3eEYUOXF6gwfDpJ6jVqZ7waG3r4sBYeXTUaHa', '931129745_siswa.png', 'S', '2020-07-19 23:36:32', '2020-07-20 20:52:09'),
('5f0e8d0542f35', 'hilmi', 'Laki - laki', 'kediri', '2020-07-01', 85853858559, 'nganjuk', 'hilmi@gmail.com', 'hilmi', '$2y$12$0QSC6oOj64dFPXX6WbxBtuPwAdB23P14ARj65SityKHkNms8yxMIK', '39103096_guru.png', 'G', '2020-07-14 21:58:45', '2020-07-19 19:27:39'),
('5f1f8539ba5ec', 'yoga', 'Laki - laki', 'surabaya', '2020-07-14', 85853858559, 'surabaya', 'yoga@mail.com', 'yoga', '$2y$10$NQkKlJS76gR2np0YFipN0OYCQ7beJ35lxIC4XIRxQkgrucHVqXsXe', '799309522_guru.png', 'G', '2020-07-27 18:54:02', '2020-07-27 18:54:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
