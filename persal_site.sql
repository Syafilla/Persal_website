-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2026 at 08:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persal_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `views` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `gambar` varchar(255) DEFAULT NULL,
  `isi` text NOT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `tanggal_publish` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `slug`, `kategori`, `views`, `gambar`, `isi`, `penulis`, `tanggal_publish`, `created_at`, `updated_at`) VALUES
(4, 'Update BNPB: 17 Jasad Ditemukan, Korban Tewas Banjir Sumatera Menjadi 1.129 Jiwa', 'update-bnpb-17-jasad-ditemukan-korban-tewas-banjir-sumatera-menjadi-1129-jiwa-1766591799', 'Terbaru', 0, '1766591799_6947297e7e8d7.jpg', 'JAKARTA, KOMPAS.com - Kepala Pusat Data, Informasi, dan Komunikasi Kebencanaan BNPB Abdul Muhari menyampaikan bahwa jumlah korban tewas akibat banjir bandang dan tanah longsor di Sumatera bertambah 17 jiwa. \"Per hari ini, terdapat penambahan daftar korban meninggal dunia sebanyak 17 jiwa, sehingga total korban jiwa secara keseluruhan kini mencapai 1.129 orang,\" ujar Abdul dalam konferensi pers yang digelar virtual, Rabu (24/12/2025). Rincian penambahan korban tersebut berasal dari Aceh Utara sebanyak 14 jiwa, serta masing-masing satu jiwa di Tapanuli Tengah, Kota Sibolga, dan Sumatera Barat. Pencarian Korban Hilang Saat ini, Tim SAR Gabungan masih mencari keberadaan 174 korban yang belum ditemukan.\r\n\r\nSumber: https://nasional.kompas.com/read/2025/12/24/21341311/update-bnpb-17-jasad-ditemukan-korban-tewas-banjir-sumatera-menjadi-1129?source=headline.\r\n\r\n\"Untuk data korban hilang saat ini mengalami penurunan menjadi 174 jiwa, sedangkan jumlah warga yang masih berada di pengungsian tercatat sebanyak 496.293 jiwa,\" ucapnya. Baca juga: Kapolri Titip Umat Kristen Doakan Korban Banjir Sumatera saat Misa Natal Kemenaker Masih Menunggu Penetapan Upah Minimum 2026 dari Semua Provinsi Artikel Kompas.id Status Kedaruratan Terkait status kedaruratan wilayah, per hari ini tercatat sebanyak 12 kabupaten dan kota telah mengalami pergeseran status dari masa tanggap darurat menuju status transisi darurat. \"Daerah tersebut mencakup masing-masing empat kabupaten dan kota di Provinsi Aceh, Sumatera Utara, dan Sumatera Barat,\" kata dia. Abdul mengatakan, masih ada beberapa daerah yang memutuskan untuk memperpanjang status tanggap darurat hingga tanggal 28 atau 30 Desember mendatang. Pemulihan Infrastruktur Seluruh pekerjaan lapangan saat ini sudah mulai berjalan bertahap. Pemerintah tengah menyiapkan pembangunan hunian sementara maupun hunian tetap. Selain itu, percepatan pemulihan akses jalan dan jembatan juga dilakukan terutama untuk mendukung kelancaran transportasi menjelang libur Natal dan Tahun Baru. Baca juga: SBY Soroti Banjir-Longsor Sumatera: Penanganan Bencana Tak Segampang yang Dibayangkan \"Saat ini, pemulihan di Sumatera Barat sudah hampir mencapai 100 persen, sementara di wilayah Tapanuli Raya, Sumatera Utara, progresnya telah mencapai kisaran 80 hingga 90 persen,\" ucapnya. Untuk wilayah Aceh, jalur Lintas Timur dan Lintas Barat secara umum sudah dapat dilewati, dengan fokus pengerjaan saat ini diarahkan pada titik-titik penghubung Lintas Timur ke arah Tengah melalui pemasangan jembatan Bailey. Jembatan Bailey dibangun sementara di beberapa lokasi kritis agar konektivitas wilayah menuju Aceh Tengah tetap terjaga. Dalam segala situasi, KOMPAS.com berkomitmen memberikan fakta jernih dari lapangan. Kirimkan Apresiasi Spesial untuk mendukung Jurnalisme. Berikan apresiasi sekarang\r\n\r\nSumber: https://nasional.kompas.com/read/2025/12/24/21341311/update-bnpb-17-jasad-ditemukan-korban-tewas-banjir-sumatera-menjadi-1129?source=headline.\r\n\r\n\r\nMembership: https://kmp.im/plus6\r\nDownload aplikasi: https://kmp.im/app6', 'ADMINISTRATOR', '2025-12-24', '2025-12-24 08:56:39', '2025-12-24 08:56:39'),
(5, 'Prabowo ke Jaksa Agung: Mungkin Anda Tak Populer bagi Maling-maling Itu', 'prabowo-ke-jaksa-agung-mungkin-anda-tak-populer-bagi-maling-maling-itu-1766591927', 'terbaru', 0, '1766591927_694bf36b45861.png', 'JAKARTA, KOMPAS.com - Presiden Prabowo Subianto memuji kinerja Jaksa Agung Sanitiar (ST) Burhanuddin dalam menangani kasus korupsi hingga penertiban kawasan hutan, meski akibatnya adalah sosok Burhanuddin menjadi tidak populer atau tidak menyenangkan bagi koruptor. Hal ini dikatakan Prabowo dalam sambutannya saat menghadiri penyerahan hasil penyelamatan keuangan negara di Kompleks Kejaksaan Agung Republik Indonesia, Jakarta Selatan, Rabu (24/12/2025). \"Terima kasih Jaksa Agung, leadership (kepemimpinan) Anda. Mungkin Anda tidak populer tapi tidak populer bagi segelintir maling-maling itu,\" kata Prabowo, Rabu. Baca juga: Banyak Jaksa Kena OTT KPK, Jaksa Agung: Saya Bersyukur Dibantu Kendati tak populer, Prabowo meyakini banyak masyarakat yang mendoakannya. Sebab, Jaksa Agung bersama jajarannya berupaya membasmi kejahatan dan kerugian negara. Nilai Tes Kemampuan Akademik Matematika dan Bahasa Sangat Rendah Artikel Kompas.id \"Anda didoakan oleh seluruh rakyat Indonesia. Terima kasih. Teruskan perjuangan. Merdeka. Merdeka. Merdeka,\" tutur dia. Baca juga: ICW Sebut ST Burhanuddin Gagal Usai Para Jaksa Dicokok KPK, Ini Kata Kejagung Pesan Prabowo untuk para jaksa Adapun dalam momen yang sama, Prabowo juga sempat menulis pesan khusus untuk para jaksa dalam sebuah prasasti. Pesan tersebut berkaitan dengan integritas dan keberanian penegak hukum. “Jadilah Jaksa yang berani dan jujur membela keadilan demi bangsa dan rakyat Indonesia tercinta!” tulis Prabowo dalam prasasti. Baca juga: Kutip Motto Kekaisaran Ottoman, Prabowo: Tak Ada Negara Tanpa Tentara yang Kuat Prabowo menekankan pentingnya keberanian aparat penegak hukum dalam menjaga kekayaan negara dan menegakkan keadilan tanpa pandang bulu. Kepala Negara juga menegaskan komitmennya dalam memberantas korupsi sejak detik pertama menjabat. “Begitu saya menerima mandat, saya sudah bertekad untuk melawan korupsi, melawan perampokan kekayaan negara oleh siapapun, di mana pun,” tandas Prabowo. Lihat Foto Presiden Prabowo Subianto menulis pesan khusus untuk para jaksa dalam sebuah prasasti dalam acara penyerahan uang hasil denda atas pelanggaran administratif kawasan hutan di Gedung Bundar Kejaksaan Agung (Kejagung), Jakarta Selatan, Rabu (24/12/2025). Pesan tersebut berkaitan dengan integritas dan keberanian penegak hukum. (Dok. Biro Pers, Media, dan Informasi Sekretariat Presiden) Dalam segala situasi, KOMPAS.com berkomitmen memberikan fakta jernih dari lapangan. Kirimkan Apresiasi Spesial untuk mendukung Jurnalisme. Berikan apresiasi sekarang', 'ADMINISTRATOR', '2025-12-24', '2025-12-24 08:58:47', '2025-12-24 08:58:47'),
(6, 'Sebulan Pascabanjir, Masih Ada Daerah Terisolasi di Aceh Utara', 'sebulan-pascabanjir-masih-ada-daerah-terisolasi-di-aceh-utara-1766592030', 'Terkini', 2, '1766592030_69490c2ade111.jpg', 'ACEH UTARA, KOMPAS.com - Bupati Aceh Utara, Provinsi Aceh, Ismail A Jalil, yang akrab disapa Ayahwa mengungkapkan, masih ada daerah terisolasi sebulan pascabanjir di kabupaten tersebut, yaitu Dusun Sarah Raja, Desa Buket Linteung, Kecamatan Langkahan. Hal tersebut disampaikan Ayahwa saat jumpa pers terkait penanganan banjir di Aceh Utara, Rabu (24/12/2025), di Oproom Kantor Bupati Aceh Utara, Landing, Kecamatan Lhoksukon. \"Salah satu wilayah yang masih terisolasi adalah Dusun Sarah Raja, yang berada di kawasan pedalaman Aceh Utara. Hingga saat ini, akses darat menuju dusun tersebut belum dapat dilalui, sehingga mobilitas warga dan distribusi bantuan masih sangat terbatas,\" sebutnya. Baca juga: Bupati Ayahwa ke BNPB: Data Rumah Sudah Ada, Kapan Kita Eksekusi? Rakyat Butuh Dia menjelaskan, untuk menuju ke Dusun Sarah Raja, harus melintasi Dusun Seulemak dan Dusun Bidari. Namun, kondisi jalan di kawasan tersebut hancur diterjang banjir dan tertimbun lumpur dengan ketebalan mencapai satu meter. Karena itu, hanya alat berat yang mampu membersihkan dan membuka akses jalan. Perpanjang Masa Tanggap Darurat Bencana di Aceh, Pusat Diminta Lebih Serius Artikel Kompas.id \"Sampai hari ini masih ada kawasan yang terisolasi di Aceh Utara. Kenapa dibilang terisolasi, karena untuk menuju kawasan tersebut harus naik boat menyeberang sungai, sedangkan jalan darat belum bisa dilintasi kendaraan,\" kata Ayahwa. Ia menambahkan, kondisi ini terjadi di tengah upaya penanganan yang sudah berjalan hampir satu bulan, mengingat status tanggap darurat banjir telah tiga kali diperpanjang. Meski berbagai langkah telah dilakukan, realitas di lapangan menunjukkan bahwa pemulihan belum merata di seluruh wilayah terdampak. Baca juga: Bupati Aceh Utara Ayahwa Tegas: Pejabat yang Liburan Akhir Tahun Bisa Disanksi! Kebutuhan Mendesak Pasca-Banjir Di sisi lain, Ayahwa menyebutkan, masih banyak korban banjir yang belum mendapatkan tenda pengungsian yang layak hingga saat ini. \"Kita berharap persoalan-persoalan ini mendapatkan perhatian dan penanganan dari Pemerintah Pusat. Tanpa intervensi pemerintah pusat, dibutuhkan waktu puluhan tahun untuk membangun kembali Aceh Utara,\" tegas Ayahwa. Ayahwa menegaskan, dukungan Pemerintah Pusat sangat dibutuhkan, terutama dalam pembangunan infrastruktur, pembukaan akses wilayah terisolasi, serta penyediaan hunian dan fasilitas dasar bagi masyarakat korban banjir. \"Sejauh ini, Kepala BNPB sudah dua kali ke Aceh Utara. Berkomitmen membantu pemulihan Aceh Utara hingga tuntas,\" pungkasnya. Ulurkan tanganmu membantu korban banjir di Aceh, Sumatera Utara, dan Sumatera Barat. Di situasi seperti ini, sekecil apa pun bentuk dukungan dapat menjadi harapan baru bagi para korban. Salurkan donasi kamu sekarang dengan klik di sini', 'ADMINISTRATOR', '2025-12-24', '2025-12-24 09:00:30', '2025-12-28 18:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-boost.roster.scan', 'a:2:{s:6:\"roster\";O:21:\"Laravel\\Roster\\Roster\":3:{s:13:\"\0*\0approaches\";O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:11:\"\0*\0packages\";O:32:\"Laravel\\Roster\\PackageCollection\":2:{s:8:\"\0*\0items\";a:7:{i:0;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^12.0\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:LARAVEL\";s:14:\"\0*\0packageName\";s:17:\"laravel/framework\";s:10:\"\0*\0version\";s:7:\"12.40.2\";s:6:\"\0*\0dev\";b:0;}i:1;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:6:\"v0.3.8\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:PROMPTS\";s:14:\"\0*\0packageName\";s:15:\"laravel/prompts\";s:10:\"\0*\0version\";s:5:\"0.3.8\";s:6:\"\0*\0dev\";b:0;}i:2;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:6:\"v0.3.4\";s:10:\"\0*\0package\";E:33:\"Laravel\\Roster\\Enums\\Packages:MCP\";s:14:\"\0*\0packageName\";s:11:\"laravel/mcp\";s:10:\"\0*\0version\";s:5:\"0.3.4\";s:6:\"\0*\0dev\";b:1;}i:3;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^1.24\";s:10:\"\0*\0package\";E:34:\"Laravel\\Roster\\Enums\\Packages:PINT\";s:14:\"\0*\0packageName\";s:12:\"laravel/pint\";s:10:\"\0*\0version\";s:6:\"1.26.0\";s:6:\"\0*\0dev\";b:1;}i:4;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:5:\"^1.41\";s:10:\"\0*\0package\";E:34:\"Laravel\\Roster\\Enums\\Packages:SAIL\";s:14:\"\0*\0packageName\";s:12:\"laravel/sail\";s:10:\"\0*\0version\";s:6:\"1.48.1\";s:6:\"\0*\0dev\";b:1;}i:5;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:1;s:13:\"\0*\0constraint\";s:7:\"^11.5.3\";s:10:\"\0*\0package\";E:37:\"Laravel\\Roster\\Enums\\Packages:PHPUNIT\";s:14:\"\0*\0packageName\";s:15:\"phpunit/phpunit\";s:10:\"\0*\0version\";s:7:\"11.5.44\";s:6:\"\0*\0dev\";b:1;}i:6;O:22:\"Laravel\\Roster\\Package\":6:{s:9:\"\0*\0direct\";b:0;s:13:\"\0*\0constraint\";s:0:\"\";s:10:\"\0*\0package\";E:41:\"Laravel\\Roster\\Enums\\Packages:TAILWINDCSS\";s:14:\"\0*\0packageName\";s:11:\"tailwindcss\";s:10:\"\0*\0version\";s:6:\"4.1.17\";s:6:\"\0*\0dev\";b:1;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:21:\"\0*\0nodePackageManager\";E:43:\"Laravel\\Roster\\Enums\\NodePackageManager:NPM\";}s:9:\"timestamp\";i:1768441338;}', 1768527738);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `berita_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `komentar` text NOT NULL,
  `reply_to` bigint(20) UNSIGNED DEFAULT NULL,
  `balasan` text DEFAULT NULL,
  `dibaca` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `galeris`
--

CREATE TABLE `galeris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `angkatan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeris`
--

INSERT INTO `galeris` (`id`, `kategori_id`, `foto`, `angkatan`, `created_at`, `updated_at`) VALUES
(2, 2, 'galeri/1766592168964.jpg', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48'),
(3, 2, 'galeri/1766592168671.jpg', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48'),
(4, 2, 'galeri/1766592168386.jpg', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48'),
(5, 2, 'galeri/17665921685.jpg', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48'),
(6, 2, 'galeri/1766592168472.jpg', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48'),
(7, 2, 'galeri/1766592168904.jpg', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48'),
(8, 2, 'galeri/1766592168229.jpg', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48'),
(9, 2, 'galeri/1766592168214.jpg', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48'),
(10, 2, 'galeri/1766592168301.jpg', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48'),
(11, 2, 'galeri/1766592168639.jpg', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48'),
(12, 2, 'galeri/176659216850.jpg', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48'),
(13, 2, 'galeri/1766592168691.jpg', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48'),
(14, 2, 'galeri/176659216846.jpg', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48'),
(15, 2, 'galeri/1766592168886.png', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48'),
(16, 2, 'galeri/176659216850.jpg', '2025', '2025-12-24 09:02:48', '2025-12-24 09:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(2, 'terbaru', '2025-12-24 09:00:56', '2025-12-24 09:00:56');

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
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_11_27_011307_create_user_table', 1),
(4, '2025_11_27_031841_add_tempat_lahir_to_users_table', 1),
(5, '2025_11_29_005154_add_foto_to_users_table', 1),
(6, '2025_12_06_090619_add_status_to_users_table', 1),
(7, '2025_12_09_015836_create_kategoris_table', 1),
(8, '2025_12_09_015857_create_galeris_table', 1),
(9, '2025_12_10_042303_create_beritas_table', 1),
(10, '2025_12_10_073648_create_comments_table', 2),
(11, '2025_12_10_073648_create_notifications_table', 3),
(12, '2025_12_11_022057_add_views_to_beritas_table', 4),
(13, '2025_12_11_034107_add_fields_to_notifications_table', 5),
(14, '2025_12_11_232451_add_register_fields_to_users_table', 6),
(15, '2025_12_11_235414_make_password_nullable_on_users_table', 7),
(16, '2025_12_12_001759_create_reset_otps_table', 8),
(17, '2025_12_12_070030_add_alamat_to_users_table', 9),
(18, '2025_12_13_010100_add_otp_to_users_table', 10),
(19, '2025_12_28_033619_create_permissions_table', 11),
(20, '2025_12_28_033653_create_permission_jabatan_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `berita_id` bigint(20) UNSIGNED DEFAULT NULL,
  `komentar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pesan` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `tipe`, `berita_id`, `komentar_id`, `pesan`, `link`, `status`, `created_at`, `updated_at`) VALUES
(2, 'komentar', 3, 3, 'kiki mengomentari berita: pu', '#comment-3', 1, '2025-12-10 20:55:47', '2025-12-28 18:49:38'),
(3, 'komentar', 3, 4, 'admin mengomentari berita: pu', '#comment-4', 1, '2025-12-10 21:14:03', '2025-12-10 21:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `nia` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `kode`, `nama`) VALUES
(1, 'kelola-user', 'Kelola Data Anggota'),
(2, 'kelola-berita', 'Kelola Berita'),
(3, 'lihat-user', 'Lihat Data Anggota'),
(4, 'lihat-galeri', 'lihat data galeri'),
(5, 'lihat-dashboard', 'Lihat Dashboard');

-- --------------------------------------------------------

--
-- Table structure for table `permission_jabatan`
--

CREATE TABLE `permission_jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_jabatan`
--

INSERT INTO `permission_jabatan` (`id`, `jabatan`, `permission_id`) VALUES
(1, 'Pengurus', 1),
(2, 'Pengurus', 2),
(3, 'Anggota', 3),
(4, 'Anggota', 4),
(5, 'Anggota', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `nia` varchar(255) NOT NULL,
  `nia_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `hak_akses` enum('admin','anggota') NOT NULL DEFAULT 'anggota',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tahun_masuk` varchar(255) DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `jabatan` enum('Pengurus','Anggota') DEFAULT NULL,
  `pendidikan` enum('SLTP','SLTA','PT','Pasca Sarjana') DEFAULT NULL,
  `status` enum('Aktif','Alumni') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `foto`, `name`, `alamat`, `email`, `is_active`, `nia`, `nia_verified_at`, `password`, `tempat_lahir`, `hak_akses`, `remember_token`, `created_at`, `updated_at`, `tanggal_lahir`, `tahun_masuk`, `nama_ayah`, `nama_ibu`, `jabatan`, `pendidikan`, `status`) VALUES
(1, '1765358200_unnamed.jpg', 'ADMINISTRATOR', 'private', 'ahmadjawwadialkhair@gmail.com', 1, '0101010101', NULL, '$2y$12$IxuofJ8d9tO/EhAVB9UIf.TeGw48A2czPidFyJwasf0I/oHO8nBHW', 'private', 'admin', NULL, NULL, '2026-01-18 20:22:56', '1111-11-11', '2024', 'private', 'private', 'Pengurus', 'Pasca Sarjana', 'Aktif'),
(20, NULL, 'Wildan Ali Roziqin', NULL, NULL, 0, '00000', NULL, NULL, 'private', 'anggota', NULL, '2026-01-18 20:27:33', '2026-01-18 20:27:33', '2025-12-30', '2015', 'private', 'private', 'Anggota', NULL, 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beritas_slug_unique` (`slug`);

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_berita_id_foreign` (`berita_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galeris`
--
ALTER TABLE `galeris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeris_kategori_id_foreign` (`kategori_id`);

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
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`nia`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_kode_unique` (`kode`);

--
-- Indexes for table `permission_jabatan`
--
ALTER TABLE `permission_jabatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_jabatan_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nia_unique` (`nia`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeris`
--
ALTER TABLE `galeris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permission_jabatan`
--
ALTER TABLE `permission_jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_berita_id_foreign` FOREIGN KEY (`berita_id`) REFERENCES `beritas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galeris`
--
ALTER TABLE `galeris`
  ADD CONSTRAINT `galeris_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_jabatan`
--
ALTER TABLE `permission_jabatan`
  ADD CONSTRAINT `permission_jabatan_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
