-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2025 at 04:10 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `buku_id` int NOT NULL,
  `id_kategori` int NOT NULL,
  `img` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL,
  `judul` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `penulis` varchar(25) NOT NULL,
  `penerbit` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `code` varchar(50) NOT NULL,
  `tahun_terbit` year NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `id_kategori`, `img`, `created_at`, `updated_at`, `deleted_at`, `judul`, `penulis`, `penerbit`, `description`, `code`, `tahun_terbit`, `jumlah`) VALUES
(3, 1, 'https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/picture_meta/2024/6/6/wbkuehwjbhu6w5cddj8ats.png', '2025-02-28 03:46:38', '2025-02-28 03:46:38', '2025-02-28 03:46:38', 'Aku Kalah, Aku Merindukanmu!', 'Coretan Lena', 'Gradien Mediatama', '“Aku merindukanmu.', '9786022083719', 2024, 25),
(4, 1, 'https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/da1cb55e-12a4-4abe-bc6b-cbdb2b77f8b7.jpg', '2025-02-28 03:50:19', '2025-02-28 03:50:19', '2025-02-28 03:50:19', 'Aku Titip Dia, Ya!', 'Rafi Ibadi ', 'Kawah Media', 'Aku adalah rumah kosong yang lega udara. Di mana pintuku lama tertutup, banyak orang yang mengetuk dan hanya kau yang aku persilakan masuk.Layaknya rumah yang menanti lama tuannya pulang. Aku sangat bahagia ketika kau datang. Hatiku telah berdebu, kaulah yang berhasil membuatnya kembali menggebu. Bersamamu antusiasku jadi tak karuan, merasa kau yang selama ini aku cari. - Sebelum ternyata, tujuanmu sebenarnya bukanlah aku.Teruntuk diriku, menyerah dan sadarlah, mundur secara perlahan. Karena dia yang kini sedang kau perjuangkan dan harapankan, lebih memilih memperjuangkan dan mengharapkan seseorang yang lain. Biarkan dia bahagia, meski harus tersiksa karena bukan dirimu penyebabnya. Jatuh cinta lah secara dewasa, tanpa memaksa untuk bersama, tanpa perlu diketahuinya.', '9786022082286', 2022, 36),
(5, 1, 'https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/picture_meta/2023/12/15/5qe58dpavfxubrg3nxtt4a.jpg', '2025-02-28 03:53:32', '2025-02-28 03:53:32', '2025-02-28 03:53:32', 'Kita Perlu Jeda untuk Sembuh dari Luka', 'Ismaul Ahmad', 'C Klik Media', 'Luka bisa datang dari mana saja. Dari orang-orang terdekat, dari orang yang kamu cintai, bahkan dari dalam dirimu sendiri. Untuk menyembuhkannya, tentu tidak mudah. Pergilah ke suatu tempat di mana kamu merasa dihargai, lalu berceritalah. Kamu akan mendapat satu sudut pandang baru untuk belajar memaafkan, belajar sabar, dan ikhlas. Serta yang terpenting, belajar untuk tidak berhenti berdoa kepada Sang Maha Pemberi Kesembuhan. Kamu akan mengerti bahwa kamu tidak pernah sendiri(an).\r\n\r\nSemoga kamu lekas pulih dan terus bertumbuh menjadi lebih dewasa setelah perjalanan panjang yang kamu lalui. Namun, jika pada akhirnya, luka itu tak kunjung pulih dan justru memperparah keadaaanmu, mungkin inilah saat yang tepat. Saat untukmu berani memilih, mengambil ruang dan waktu untuk berhenti sejenak dari segala apa yang memenuhi isi kepalamu. Sebab, kamu perlu jeda, untuk sembuh dari luka.', '9786233571166', 2023, 19),
(6, 2, 'https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/Patahtumbuh.jpg', '2025-02-28 03:56:38', '2025-02-28 03:56:38', '2025-02-28 03:56:38', 'Patah, Tumbuh, Sembuh', 'Reza Mustopa', 'Kawah Media', 'Aku berhak atas bahagiaku dan aku berhak memperjuangkan itu.\r\nTerima kasih atas luka kemarin, itu sudah cukup jadi alasan kuatku. Putus? Aku cari lagi! Gagal? Aku coba lagi! Patah? Aku rangkai lagi! Dan kalau aku harus jatuh lagi, aku pasti akan bangkit kembali! Ternyata memang benar, tidak ada yang mudah untuk mencapai yang indah.\r\nAku percaya bahwa yang patah akan tumbuh dan kembali sembuh.', '9786022082255', 2022, 17),
(7, 2, 'https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/products/narrimyna2.png', '2025-02-28 04:01:22', '2025-02-28 04:01:22', '2025-02-28 04:01:22', 'Ayah, Ini Arahnya ke Mana, ya?', 'Khoirul Trian', 'Gradien Mediatama', 'Ayah, ternyata benar ya. Setelah dewasa kita semua harus punya banyak uang. Harus bekerja lebih keras lagi, harus bertarung dengan isi kepala sendiri. Harus menyampingkan banyak keinginan untuk sekadar tetap bertahan hidup sampai bertemu pagi lagi.\r\n\r\nAyah, setelah dewasa aku bertemu banyak orang yang menyakitkan dalam hidup dan kali ini aku gak punya banyak keberanian untuk melawannya. Ayah, kadang aku kalah, kadang aku kuat, kadang semuanya terjadi begitu saja dengan penuh pura-pura yang aku coba kesampingkan rasa sakitnya.\r\n\r\nAyah, hari ini aku kesepian dan gak tahu harus lari kemana lagi. Ayah, ini arahnya ke mana, ya? Anak kecil ini kehilangan jalan pulangnya.', '9786022083795', 2024, 30),
(8, 2, 'https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/Merayakan_Kehilangan_Special_5_Tahun.jpg', '2025-02-28 04:09:18', '2025-02-28 04:09:18', '2025-02-28 04:09:18', 'Merayakan Kehilangan', 'Brian Khrisna', 'Kawah Media', 'Aku sudah bahagia sekarang. Tak perlu kau cemaskan aku lagi.\r\nAku sudah ditemukan oleh seseorang. Yang seperti doamu dulu sebelum pergi meninggalkanku; yang akan benar-benar menyayangiku. Yang akan benar-benar mencintaiku.\r\n\r\nKini aku telah ditemukannya, seseorang yang mencintai aku sebesar cintaku kepadamu dulu; atau bahkan lebih.\r\nAku sudah bahagia sekarang. Tak perlu lagi kau khawatirkan kabarku.\r\n\r\nSalahmu telah kumaafkan, luka olehmu telah tersembuhkan. Tak perlu lagi merasa bersalah karena meninggalkan aku, tak perlu lagi kau kasihani keadaanku. Hujan di kelopak mataku tak lagi memanggil namamu. Di dalam doaku namamu telah digantikan oleh nama yang baru.\r\nAku sudah bahagia sekarang.\r\n\r\nTerima kasih telah memutuskan untuk pergi. Caramu menyakitiku kemarin, adalah cara Tuhan mempertemukan aku dengannya;', '9789797946340', 2021, 35),
(9, 2, 'https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9786022202943_senjakala.jpg', '2025-02-28 04:13:00', '2025-02-28 04:13:00', '2025-02-28 04:13:00', 'Senjakala', 'Risa Saraswati', 'Kawah Media', 'Senja kala.\r\nSetiap orang punya perasaan yang berbeda tentang gurat merah yang menghiasi langit senja itu. Ada yang menganggapnya indah, tenang, bahkan romantis seperti yang sekarang kian populer disajakkan para penyair.\r\n\r\nNamun, bagiku, Peter, Hans, Hendrick, William, dan Janshen, saat itu artinya tidak boleh ke mana-mana. Kami akan berada di kamar dan aku bercerita tentang hal mengerikan apa saja yang bisa muncul di waktu senja.\r\n\r\n', '9786022202943', 2018, 19),
(10, 2, 'https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/36462529.jpg', '2025-02-28 05:07:52', '2025-02-28 05:07:52', '2025-02-28 05:07:52', 'Asih', 'Risa Saraswati', 'Kawah Media', 'Namanya Kasih.\r\n\r\nKedua orang tuanya berharap dia akan tumbuh dewasa dengan hati yang kaya kasih sayang. Bisa saja awalnya begitu, sebelum dirinya menjadi sosok yang seolah tak punya hati.\r\n\r\n‘Kasih’ menjadi nama yang terlalu indah untuk si wajah kaku tanpa senyuman itu. Wajah yang lebih baik tak usah tersenyum, ketimbang bermalam-malam dihantui oleh bayangan mengerikan. Entah sejak kapan panggilan ‘Asih’ tersemat pada dirinya.\r\n\r\nSaat kali pertama bertemu, aku mengira hanya aku yang ditemui dengan cara seperti itu. Namun, nyatanya tidak. Cerita demi cerita dari mulut orang tua dan saudara-saudaraku bergulir. Ternyata, jauh sebelum aku lahir, dia sudah sering mencoba mendatangi banyak manusia.', '9786022202363', 2017, 37),
(11, 3, 'https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/picture_meta/2024/5/11/chuapgpganzdsznjnqcbcv.jpg', '2025-02-28 05:10:13', '2025-02-28 05:10:13', '2025-02-28 05:10:13', 'Bandit Bandit Berkelas', 'Tere Liye', 'PENERBIT SABAK GRIP', 'Mereka memang adalah bedebah. Bandit-bandit. Tapi mereka bukan pengkhianat, orang-orang bermuka dua, penjilat dan tabiat murahan lainnya. Mereka adalah bandit-bandit dengan kehormatan. Setia kawan. Pemegang janji terbaik. Mereka adalah bandit-bandit berkelas.\r\n\r\nBAGAIMANA keluarga shadow economy melindungi rahasia mereka berpuluh tahun, bahkan ratusan tahun, tanpa diketahui orang banyak? Ternyata sederhana. Ada dua triknya. Yang pertama adalah: membaur. Keluarga shadow economy adalah ahli membaur. Tidak terlihat mencolok, tidak menarik perhatian, mereka melakukan aktivitas seperti orang kebanyakan. Menjadi bagian dari penduduk kebanyakan, termasuk bangunan milik mereka seolah hanyalah tempat biasa, orang-orang biasa. Seperti pagi itu, mobil hitam metalik yang dikendarai Bujang meluncur ke salah satu kawasan perumahan besar. Selintas lalu, tidak ada yang aneh dari perumahan itu. Ada banyak kota satelit baru, sebuah tempat yang awalnya tanah kosong, sawah, atau semak belukar, yang disulap menjadi kota baru, di pinggiran megapolitan. Dengan belasan klaster, ribuan rumah, gedung gedung tinggi. Jalan-jalan luas yang rapi, fasilitas publik yang bagus. Pengembang berlomba-lomba memasarkan perumahannya, tahap satu, tahap dua, dan seterusnya. Kawasan itu menjadi pusat keramaian baru.', '9786238882267', 2024, 45),
(12, 3, 'https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/products/xkva-ra4-n.png', '2025-02-28 05:13:21', '2025-02-28 05:13:21', '2025-02-28 05:13:21', 'Rasa yang Tak Pernah Usai', 'Nimas Rassa', 'Penerbit Buku Abadi', 'Apakah kamu pernah merasa cemas dan takut yang berlebihan sampai kehilangan rasa percaya diri? Pernahkah kamu merasa takut tidur malam untuk menghindari mimpi buruk yang kerap datang dan bahkan terkadang menjadi kenyataan? Semua itu pernah aku rasakan sehingga aku mengalami depresi yang berakibat fatal pada kondisi kesehatanku.\r\n\r\nBeragam penyakit kronis akhirnya harus aku derita. Semua berawal dari overthinking. Aku menjadi ketergantungan pada obat penenang. Aku juga merasa menjadi orang paling menderita di dunia. Di dalam pikiranku selalu terlintas untuk mengakhiri hidup. Anugerah Tuhan yang begitu besar seolah tertutup oleh berbagai penderitaan yang aku rasakan sehingga aku menjadi pribadi yang mengingkari nikmat-Nya. Beruntung, Tuhan Yang Maha Penyayang menuntunku dengan memberikan pengalaman dalam perjalanan spiritual yang menyadarkanku agar aku lebih kuat, sabar, dan tawakal dalam menghadapi setiap ujian yang mendera.', '9786231049971', 2024, 50);

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `denda_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL,
  `peminjaman_id` int NOT NULL,
  `tanggal_dikembalikan` date NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `status` enum('belum_dibayar','sudah_dibayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`denda_id`, `created_at`, `updated_at`, `deleted_at`, `peminjaman_id`, `tanggal_dikembalikan`, `nominal`, `status`) VALUES
(4, '2025-03-19 10:35:27', '2025-03-19 10:35:27', '2025-03-01 17:00:00', 8, '2025-03-19', '5000', 'sudah_dibayar'),
(7, '2025-03-19 18:25:52', '2025-03-19 18:25:52', '0000-00-00 00:00:00', 14, '2025-03-20', '5000', 'sudah_dibayar'),
(8, '2025-03-19 18:49:43', '2025-03-19 18:49:43', '0000-00-00 00:00:00', 14, '2025-03-20', '5000', 'sudah_dibayar'),
(9, '2025-03-19 19:23:06', '2025-03-19 19:23:06', '0000-00-00 00:00:00', 4, '2025-03-20', '5000', 'sudah_dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori`, `created_at`, `updated_at`, `deleted_at`, `nama_kategori`) VALUES
(1, '2025-03-04 05:52:46', '2025-03-04 05:52:46', '2025-03-04 05:52:46', 'buku fiksi'),
(2, '2025-03-04 05:53:17', '2025-03-04 05:53:17', '2025-03-04 05:53:17', 'buku nonfiksi'),
(3, '2025-03-04 05:53:52', '2025-03-04 05:53:52', '2025-03-04 05:53:52', 'buku pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi_buku`
--

CREATE TABLE `koleksi_buku` (
  `id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL,
  `peminjaman_id` int NOT NULL,
  `buku_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `list_kategori`
--

CREATE TABLE `list_kategori` (
  `id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL,
  `kategori_buku_id` int NOT NULL,
  `buku_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `list_pinjaman`
--

CREATE TABLE `list_pinjaman` (
  `id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL,
  `buku_id` int NOT NULL,
  `peminjaman_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `peminjam_id` int NOT NULL,
  `uid` int NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `phone` varchar(70) NOT NULL,
  `image` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`peminjam_id`, `uid`, `nama_lengkap`, `email`, `password`, `alamat`, `phone`, `image`) VALUES
(1, 0, 'tes', 'tes@gmail.com', '$2y$10$QP1VQwRVqJnHm.pz35', 'tes', '0987654321', 'f4da9b8a719546a18bc626b542ae6224.jpeg'),
(2, 0, 'linda', 'linda@gmail.com', '$2y$10$FEjkPYd26OjvbLh2OF', 'tes', '098763456789', 'toy_story.jpeg'),
(3, 0, 'linda', 'linda@gmail.com', '$2y$10$/OpV3OHhLBsWgAtLwq', 'tes', '098763456789', 'toy_story1.jpeg'),
(4, 0, 'tes1', 'tes1@gmail.com', '$2y$10$8jZCoyzu9tjI4T1z8WMvk.Dyd439hqfYHLIQqFnvTgS7qCOgYfOIS', 'tess', '1234567890', 'toy_story2.jpeg'),
(5, 0, 'khoirotun nisa', 'khoirotun@gmail.com', '$2y$10$dGWenBQkPeoM2GT3YhUT8OyUdvYW4F1VzUXgZdeA38cJmVZEoFy2K', 'tesss', '09876543221', 'toy_story3.jpeg'),
(6, 0, 'zakiyyyw', 'zaki@gmail.com', '$2y$10$GxpBhFJPirU2CBydeoKaPO7EHMq6naxYZhOhnGDt8xE2dP1R3Ylh6', 'tess', '01234567890', 'toy_story4.jpeg'),
(7, 0, 'zaki', 'zakiy@gmail.com', '$2y$10$vgkEEuzih6.4jvYHG3C.I.FTofTqwz4ASUBObXGp5K81xYPIhZ6.G', 'tes', '098765432', 'toy_story6.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL,
  `petugas_id` int NOT NULL,
  `peminjam_id` int NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `status` enum('pending','dipinjam','dikembalikan') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `buku_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `created_at`, `updated_at`, `deleted_at`, `petugas_id`, `peminjam_id`, `tanggal_pengembalian`, `tanggal_peminjaman`, `status`, `buku_id`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 4, '2025-03-16', '2025-03-09', 'dikembalikan', 1),
(2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 4, '2025-03-16', '2025-03-09', 'dikembalikan', 1),
(3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 4, '2025-03-04', '2025-03-10', 'dipinjam', 2),
(4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 7, '2025-03-04', '2025-03-11', 'dikembalikan', 6),
(5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 7, '2025-03-16', '2025-03-15', 'dikembalikan', 1),
(6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 7, '2025-03-02', '2025-03-15', 'dipinjam', 1),
(7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 7, '2025-03-02', '2025-03-15', 'dikembalikan', 1),
(8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 7, '1900-01-02', '2025-03-15', 'dikembalikan', 2),
(9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 7, '2025-03-02', '2025-03-15', 'dikembalikan', 3),
(10, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 7, '2025-03-02', '2025-03-15', 'dipinjam', 4),
(11, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 7, '2025-03-28', '2025-03-19', 'pending', 1),
(12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 7, '2025-03-20', '2025-03-19', 'dipinjam', 5),
(13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 7, '2025-03-20', '2025-03-19', 'pending', 1),
(14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 7, '2025-03-09', '2025-03-05', 'dikembalikan', 6);

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `kurangi_stok_buku` AFTER UPDATE ON `peminjaman` FOR EACH ROW BEGIN
    -- Kurangi stok buku jika status awal adalah 'dipinjam'
    IF NEW.status = 'dipinjam' THEN
        UPDATE buku
        SET jumlah = jumlah - 1
        WHERE buku_id = NEW.buku_id;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_stok_buku` AFTER UPDATE ON `peminjaman` FOR EACH ROW BEGIN
    -- Tambah stok buku jika status berubah menjadi 'dikembalikan'
    IF OLD.status = 'dipinjam' AND NEW.status = 'dikembalikan' THEN
        UPDATE buku
        SET jumlah = jumlah + 1
        WHERE buku_id = NEW.buku_id;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `petugas_id` int NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `uid` varchar(25) NOT NULL,
  `photo` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL,
  `phone` int NOT NULL,
  `alamat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `ulasan_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `buku_id` int NOT NULL,
  `rating` int NOT NULL,
  `review_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`ulasan_id`, `created_at`, `updated_at`, `deleted_at`, `buku_id`, `rating`, `review_text`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3, 'tessss'),
(2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3, 'tessss'),
(3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3, 'tess'),
(4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3, 'tesss'),
(5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3, 'tesss'),
(6, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 3, 'okeehh'),
(7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 3, 'okee'),
(8, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 3, 'baagus banget');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama_lengkap` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `role` enum('Administrator','Petugas') NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `img`, `password`, `role`, `date_created`) VALUES
(1, 'Ferra Damayanti', 'ferra@gmail.com', 'https://tse3.mm.bing.net/th?id=OIP.lBAXjubnBc_B49N6kXsyXAHaIa&pid=Api&P=0&h=180', '$2y$10$vgkEEuzih6.4jvYHG3C.I.FTofTqwz4ASUBObXGp5K81xYPIhZ6.G', 'Administrator', '2025-03-15'),
(6, 'Alfi Miftah', 'alfi@gmail.com', 'https://tse4.mm.bing.net/th?id=OIP.fEbk0W_xbs13fnKrIhI-BQHaHH&pid=Api&P=0&h=180', '$2y$10$WLNhGCwHPZwPReMjH6n4l.d1MnTzTO.XhWT/SCVP6dChdIkq0DkG.', 'Petugas', '2025-03-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`denda_id`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `koleksi_buku`
--
ALTER TABLE `koleksi_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_kategori`
--
ALTER TABLE `list_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`peminjam_id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`ulasan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `denda_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `koleksi_buku`
--
ALTER TABLE `koleksi_buku`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `list_kategori`
--
ALTER TABLE `list_kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `peminjam_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugas_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `ulasan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
