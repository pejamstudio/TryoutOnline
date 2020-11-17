/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 5.7.23 : Database - tryout_online
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tryout_online` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tryout_online`;

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` bigint(20) NOT NULL,
  `id_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `guru` */

insert  into `guru`(`id`,`nip`,`id_user`,`created_at`,`updated_at`) values 
('5f0e8d0542f3c',123456789012345678,'5f0e8d0542f35','2020-07-15 04:58:45','2020-07-20 07:17:50'),
('5f180b3c0edd1',123456789012345696,'5f180b3c0edc4','2020-07-22 09:47:40','2020-07-22 09:47:40'),
('5f1f8539ba5f9',123456789012345678,'5f1f8539ba5ec','2020-07-28 01:54:02','2020-07-28 01:54:02');

/*Table structure for table `jadwal` */

DROP TABLE IF EXISTS `jadwal`;

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `jadwal` */

insert  into `jadwal`(`id`,`tanggal`,`waktu`,`id_mapel`,`created_at`,`updated_at`) values 
(3,'2020-07-22','10:32:00',66,'2020-07-18 13:19:11','2020-07-22 01:42:30'),
(4,'2020-07-27','11:00:00',67,'2020-07-20 05:09:19','2020-07-27 04:25:51'),
(5,'2020-07-28','17:09:00',71,'2020-07-28 09:09:28','2020-07-28 09:09:28');

/*Table structure for table `jurusan` */

DROP TABLE IF EXISTS `jurusan`;

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `jurusan` */

insert  into `jurusan`(`id`,`nama_jurusan`,`created_at`,`updated_at`) values 
(1,'IPA','2020-07-10 16:03:16','2020-07-28 01:47:56'),
(3,'IPS','2020-07-10 16:51:51','2020-07-10 16:51:51');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_jurusan` int(11) NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kelas` */

insert  into `kelas`(`id`,`id_jurusan`,`nama_kelas`,`created_at`,`updated_at`) values 
(1,1,'X IPA I','2018-05-09 07:23:43','2020-07-28 01:50:18'),
(2,3,'X IPS I','2020-07-11 00:00:00','2020-07-28 01:49:24'),
(9,1,'X IPA II','2020-07-14 22:48:52','2020-07-28 01:50:01'),
(10,1,'X IPA III','2020-07-17 15:15:46','2020-07-28 01:49:40'),
(11,3,'X IPS II','2020-07-17 15:16:44','2020-07-28 01:49:12'),
(12,3,'X IPS lll','2020-07-28 01:48:56','2020-07-28 01:48:56');

/*Table structure for table `kelas_siswa` */

DROP TABLE IF EXISTS `kelas_siswa`;

CREATE TABLE `kelas_siswa` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kelas_siswa` */

insert  into `kelas_siswa`(`id`,`id_kelas`,`id_siswa`,`created_at`,`updated_at`) values 
(1,9,2,'2020-07-11 00:00:00','2020-07-11 15:26:50'),
(5,1,11,'2020-07-20 06:36:33','2020-07-20 06:36:33');

/*Table structure for table `mapel` */

DROP TABLE IF EXISTS `mapel`;

CREATE TABLE `mapel` (
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

/*Data for the table `mapel` */

insert  into `mapel`(`id`,`nama_mapel`,`deskripsi`,`kkm`,`durasi`,`jumlah_soal`,`id_kelas`,`id_guru`,`created_at`,`updated_at`) values 
(74,'Kimia','wkwkwkwk',85,120,40,1,NULL,'2020-07-28 07:32:36','2020-07-28 07:32:36'),
(75,'Kimia','wkwkwkwk',85,120,40,10,NULL,'2020-07-28 07:32:36','2020-07-28 07:32:36'),
(73,'Biologi','wkwkwkwk',75,60,10,10,'5f0e8d0542f3c','2020-07-28 07:31:05','2020-07-28 07:31:05'),
(70,'Fisika Dasar','wkwkwkwk',75,60,10,10,NULL,'2020-07-28 02:12:57','2020-07-28 02:12:57'),
(72,'Biologi','wkwkwkwk',75,60,10,9,NULL,'2020-07-28 07:31:05','2020-07-28 07:31:05'),
(71,'Biologi','wkwkwkwk',75,60,10,1,NULL,'2020-07-28 07:31:05','2020-07-28 07:31:05'),
(69,'Fisika Dasar','wkwkwkwk',75,60,10,9,'5f1f8539ba5f9','2020-07-28 02:12:57','2020-07-28 02:24:41'),
(68,'Fisika Dasar','wkwkwkwk',75,60,10,1,'5f180b3c0edd1','2020-07-28 02:12:57','2020-07-28 02:24:23'),
(67,'Matematika','wkwkwkwk',75,60,10,9,'5f0e8d0542f3c','2020-07-18 12:54:52','2020-07-28 01:54:50'),
(66,'Matematika','wkwkwkwk',75,60,10,1,'5f0e8d0542f3c','2020-07-18 12:54:52','2020-07-28 01:54:50');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(6,'2020_07_07_040702_create_users_table',1),
(7,'2020_07_08_015922_create_gurus_table',1),
(8,'2020_07_08_020218_create_siswas_table',1),
(9,'2020_07_08_020338_create_kelass_table',1),
(10,'2020_07_08_020759_create_kelas_siswas_table',1);

/*Table structure for table `nilai` */

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(200) NOT NULL,
  `id_guru` varchar(200) NOT NULL,
  `id_mapel` int(100) NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `nilai` */

insert  into `nilai`(`id`,`id_siswa`,`id_guru`,`id_mapel`,`nilai`,`created_at`,`updated_at`) values 
(10,2,'5f0e8d0542f3c',67,100,'2020-07-27 04:30:38','2020-07-27 04:30:38'),
(9,11,'5f0e8d0542f3c',66,50,'2020-07-27 04:07:17','2020-07-27 04:07:17');

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nisn` bigint(20) NOT NULL,
  `id_user` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `siswa` */

insert  into `siswa`(`id`,`nisn`,`id_user`,`created_at`,`updated_at`) values 
(2,17051204020,'5f0837ecbc532','2020-07-10 09:42:05','2020-07-10 09:42:05'),
(11,1234567890,'5f153b708250b','2020-07-20 06:36:33','2020-07-20 06:36:33');

/*Table structure for table `siswa_jawab` */

DROP TABLE IF EXISTS `siswa_jawab`;

CREATE TABLE `siswa_jawab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(200) NOT NULL,
  `id_soal` int(200) NOT NULL,
  `jawab` char(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `siswa_jawab` */

insert  into `siswa_jawab`(`id`,`id_siswa`,`id_soal`,`jawab`,`created_at`,`updated_at`) values 
(36,2,6,'A','2020-07-27 04:30:38','2020-07-27 04:30:38'),
(34,11,5,'C','2020-07-27 04:07:17','2020-07-27 04:07:17'),
(33,11,4,'E','2020-07-27 04:07:17','2020-07-27 04:07:17');

/*Table structure for table `soal` */

DROP TABLE IF EXISTS `soal`;

CREATE TABLE `soal` (
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

/*Data for the table `soal` */

insert  into `soal`(`id`,`id_mapel`,`soal`,`jawab_a`,`jawab_b`,`jawab_c`,`jawab_d`,`jawab_e`,`kunci`,`created_at`,`updated_at`) values 
(4,66,'apa soalnya ?','asda','fghjk','jiio','tyui','fghjk','E','2020-07-13 07:34:27','2020-07-18 12:54:52'),
(5,66,'apa jawabanya ?','fdghjk','dddfghjk','tyuio','dfghj','rrtyu','B','2020-07-15 04:11:28','2020-07-18 12:54:52'),
(6,67,'where ?','qwe','adasd','ffsds','ghjk','bbb','A','2020-07-18 12:13:33','2020-07-18 12:54:52');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
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

/*Data for the table `user` */

insert  into `user`(`id`,`nama`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`telp`,`alamat`,`email`,`username`,`password`,`foto`,`level_user`,`created_at`,`updated_at`) values 
('admin','admin','Laki - laki','Surabaya','2020-07-10',85853858559,'Surabaya','admin@tryoutonline.com','admin','$2y$12$T/OIx/K.QU1eZBi0M04YrePra1Ee3ehJ5fUQ66/U2DCut1oGBPvN6','-','A','2020-07-10 00:00:00','2020-07-10 00:00:00'),
('5f180b3c0edc4','Rian','Laki - laki','Kampar','1998-01-27',85853858559,'Ponorogo','riandwisusanto1903@gmail.com','rian03','$2y$10$DmPfbCzOj/nkEA.UN6KqnuRYAkXlWbdmGCRRvY/LAyEPufJ9UyVDa','379042266_guru.jpg','G','2020-07-22 09:47:40','2020-07-22 09:47:40'),
('5f0837ecbc532','Rian Dwi Susanto','Laki - Laki','Riau','1998-01-28',85853858559,'Sooko Ponorogo','riandwisusanto@gmail.com','Rian','$2y$10$/Yx/PseSfgGpILIJwvLvye4MPWJ4dtpfIK1ocuhYP0z1YypovtEuS','989430846_siswa.jpg','S','2020-07-10 09:42:05','2020-07-28 01:33:31'),
('5f153b708250b','iqbal','Laki - laki','sidoarjo','2020-07-01',85853858559,'sidoarjo','iqbalulh@gmail.com','iqbal','$2y$10$92MMSDiuxmDX9lUn3eEYUOXF6gwfDpJ6jVqZ7waG3r4sBYeXTUaHa','931129745_siswa.png','S','2020-07-20 06:36:32','2020-07-21 03:52:09'),
('5f0e8d0542f35','hilmi','Laki - laki','kediri','2020-07-01',85853858559,'nganjuk','hilmi@gmail.com','hilmi','$2y$12$0QSC6oOj64dFPXX6WbxBtuPwAdB23P14ARj65SityKHkNms8yxMIK','39103096_guru.png','G','2020-07-15 04:58:45','2020-07-20 02:27:39'),
('5f1f8539ba5ec','yoga','Laki - laki','surabaya','2020-07-14',85853858559,'surabaya','yoga@mail.com','yoga','$2y$10$NQkKlJS76gR2np0YFipN0OYCQ7beJ35lxIC4XIRxQkgrucHVqXsXe','799309522_guru.png','G','2020-07-28 01:54:02','2020-07-28 01:54:35');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
