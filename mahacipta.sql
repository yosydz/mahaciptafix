-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2022 pada 05.58
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahacipta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `updater` varchar(32) NOT NULL,
  `slug_blog` varchar(255) NOT NULL,
  `judul_blog` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `status_blog` varchar(20) NOT NULL,
  `jenis_blog` varchar(20) NOT NULL,
  `keywords` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_publish` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id_blog`, `id_user`, `id_kategori`, `updater`, `slug_blog`, `judul_blog`, `isi`, `status_blog`, `jenis_blog`, `keywords`, `gambar`, `icon`, `hits`, `urutan`, `tanggal_mulai`, `tanggal_selesai`, `tanggal_post`, `tanggal_publish`, `tanggal`) VALUES
(13, 4, 5, '', 'paket-wisata-malang-batu-rafting-3-hari-2-malam', 'Paket Wisata Malang Batu Rafting 3 hari 2 malam', '<p>Kami menyiapkan jadwal standar kegiatan wisata di Malang untuk Paket Wisata Malang &ndash; Batu &ndash; Rafting 3 hari 2 malam yang bisa dimodifikasi sesuai kebutuhan wisata Anda, misalnya untuk keperluan liburan keluarga, gathering perusahaan, acara fun games, seminar, dan lain-lain. Jadi rundown ini bersifat fleksibel dan tidak mengikat.</p>\r\n<p><strong>&ldquo;Kami menampilkan harga yang sesuai dengan fasilitas tanpa ada yang ditutupi. Be smart customer..&rdquo;</strong></p>\r\n<p>Tour dapat berjalan dengan minimal : 4 peserta.<br />**Untuk info harga hubungi kami lebih lanjut via kontak person yang sudah ada</p>', 'Publish', 'Keunggulan', 'Kami menyiapkan jadwal standar kegiatan wisata di Malang untuk Paket Wisata Malang – Batu – Rafting 3 hari 2 malam', 'cover-paket-malang-batu-rafting-3h2m-1655016721.jpg', 'fa fa-users', 0, 5, NULL, NULL, '2020-02-18 14:00:35', '2020-02-18 13:58:00', '2022-06-12 06:52:01'),
(14, 4, 5, '', 'paket-wisata-malang-batu-4-hari-3-malam', 'Paket Wisata Malang – Batu 4 hari 3 malam', '<p>Kami menyiapkan jadwal standar kegiatan wisata di Malang untuk Paket Wisata Malang &ndash; Batu 4 hari 3 malam yang bisa dimodifikasi sesuai kebutuhan wisata Anda, misalnya untuk keperluan liburan keluarga, gathering perusahaan, acara fun games, seminar, dan lain-lain. Jadi rundown ini bersifat fleksibel dan tidak mengikat.</p>\r\n<p><strong>&ldquo;Kami menampilkan harga yang sesuai dengan fasilitas tanpa ada yang ditutupi. Be smart customer..&rdquo;</strong></p>\r\n<p>Tour dapat berjalan dengan minimal : 2 peserta.<br />**Untuk info harga hubungi kami lebih lanjut via kontak person yang sudah ada</p>', 'Publish', 'Keunggulan', 'Kami menyiapkan jadwal standar kegiatan wisata di Malang untuk Paket Wisata Malang – Batu 4 hari 3 malam', '7432147270-272c49ddd-f5ce-43a6-9e9a-06f70e212f32-1655016658.jpg', 'fa fa-home', 0, 4, NULL, NULL, '2020-02-18 14:06:26', '2020-02-18 14:04:18', '2022-06-12 06:51:00'),
(15, 4, 5, '', 'open-trip-bromo-explore', 'Open Trip Bromo Explore', '<p><strong>Open Trip Bromo Explore 2021 New Normal</strong>&nbsp;ini adalah paket tour ke Bromo dengan harga yang sangat terjangkau. Bisa berangkat setiap hari. 1 orang pun kami berangkatkan. Open Trip Bromo Explore 2021 sangat cocok bagi anda yang menginginkan liburan di gunung Bromo singkat tanpa cuti dengan harga ekonomis namun tetap nyaman, aman dan menyenangkan.</p>\r\n<p><strong>&ldquo;Kami menampilkan harga yang sesuai dengan fasilitas tanpa ada yang ditutupi. Be smart customer..&rdquo;</strong></p>\r\n<p>**Untuk info harga silakan baca artikel ini sampai selesai dan hubungi kami lebih lanjut via kontak person</p>', 'Publish', 'Keunggulan', 'Open Trip Bromo Explore 2021 New Normal', 'cover-paket-wisata-bromo-jointrip-1655016583.jpg', 'fab fa-whatsapp', 0, 3, NULL, NULL, '2020-02-18 14:09:08', '2020-02-18 14:07:31', '2022-06-12 06:49:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_kategori_galeri` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_galeri` varchar(200) DEFAULT NULL,
  `jenis_galeri` varchar(20) NOT NULL,
  `isi` text DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `popup_status` enum('Publish','Draft','','') NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `status_text` enum('Ya','Tidak','','') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_kategori_galeri`, `id_user`, `judul_galeri`, `jenis_galeri`, `isi`, `gambar`, `website`, `popup_status`, `urutan`, `status_text`, `tanggal`) VALUES
(13, 7, 19, 'Healing Ke Lombok', 'Homepage', '<h3>Kunjungi lebih banyak destinasi wisata di Lombok dengan paket&nbsp;wisata Lombok.</h3>\r\n<p>Paket tour lombok&nbsp;3D2N ini cocok untuk anda yang ingin menikmati keindahan alam dan pantai serta mengenal adat maupun budaya di lombok lebih lama bersama keluarga, teman dan rombongan.</p>', 'healing-lombok-1657372009.png', 'https://api.whatsapp.com/send?phone=6282257526332&text=&source=&data=', 'Publish', 2, 'Ya', '2022-07-09 13:06:50'),
(14, 7, 19, 'Kangen Yogyakarta', 'Homepage', '<h4>Nikmati keindahan Yogyakarta dengan 12 pilihan&nbsp;paket wisata jogja&nbsp;dari matawisata.</h4>\r\n<p>Paket tour yang telah kami sediakan sudah termasuk penginapan yang nyaman, cocok untuk liburan Anda bersama keluarga, teman ataupun pasangan ke&nbsp;tempat wisata Jogja&nbsp;favorit.</p>', 'kangen-yogyakarta-1657371996.png', 'https://api.whatsapp.com/send?phone=6282257526332&text=&source=&data=', 'Publish', 3, 'Ya', '2022-07-09 13:06:37'),
(15, 7, 19, 'Kembali Ke Bali', 'Homepage', '<h3>Cuma punya waktu liburan singkat?</h3>\r\n<p>Paket wisata bali&nbsp; yang telah kami siapkan cocok untuk memaksimalkan waktu liburan Anda selama 1 Hari&nbsp; bersama keluarga atau pasangan. Kami akan mengajak Anda tour mengunjungi berbagai&nbsp;tempat wisata populer di Bali&nbsp;seperti Tanah Lot, Tanjung Benoa, dan Garuda Wisnu Kencana dengan biaya murah</p>', 'kembalikebali-min-1657371976.png', 'https://api.whatsapp.com/send?phone=6282257526332&text=&source=&data=', 'Publish', 5, 'Ya', '2022-07-09 13:06:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_produk`
--

CREATE TABLE `gambar_produk` (
  `id_gambar_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_gambar_produk` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gambar_produk`
--

INSERT INTO `gambar_produk` (`id_gambar_produk`, `id_user`, `id_produk`, `nama_gambar_produk`, `gambar`, `keterangan`, `urutan`, `tanggal`) VALUES
(12, 4, 28, 'hotel-7.jpg', 'hotel-7-1654864061.jpg', NULL, NULL, '2022-06-10 05:27:41'),
(11, 4, 28, 'hotel-4.jpg', 'hotel-4-1654864061.jpg', NULL, NULL, '2022-06-10 05:27:41'),
(10, 4, 26, 'hotel-1.jpg', 'hotel-1-1654851466.jpg', NULL, NULL, '2022-06-10 01:57:46'),
(9, 4, 26, 'hotel-7.jpg', 'hotel-7-1654851466.jpg', NULL, NULL, '2022-06-10 01:57:46'),
(8, 4, 26, 'hotel-4.jpg', 'hotel-4-1654851466.jpg', NULL, NULL, '2022-06-10 01:57:46'),
(13, 4, 28, 'hotel-1.jpg', 'hotel-1-1654864061.jpg', NULL, NULL, '2022-06-10 05:27:42'),
(14, 4, 30, 'hotel-4.jpg', 'hotel-4-1654867113.jpg', NULL, NULL, '2022-06-10 06:18:33'),
(15, 4, 30, 'hotel-7.jpg', 'hotel-7-1654867113.jpg', NULL, NULL, '2022-06-10 06:18:33'),
(16, 4, 30, 'hotel-1.jpg', 'hotel-1-1654867113.jpg', NULL, NULL, '2022-06-10 06:18:34'),
(17, 4, 31, 'hotel-4.jpg', 'hotel-4-1654867164.jpg', NULL, NULL, '2022-06-10 06:19:24'),
(18, 4, 32, 'hotel-7.jpg', 'hotel-7-1654867290.jpg', NULL, NULL, '2022-06-10 06:21:30'),
(19, 4, 33, 'hotel-4.jpg', 'hotel-4-1654867379.jpg', NULL, NULL, '2022-06-10 06:22:59'),
(20, 4, 34, 'Hotel indah kapuk', '10000461-9f64bb8bc11e5fcdcf9d869e34ea49d7-1654914444.webp', 'asda', 4, '2022-06-10 19:27:25'),
(21, 4, 34, 'Maaarina Bay', 'lelewatu-resort-1350-1654914503.jpg', 'asdad', 6, '2022-06-10 19:28:24'),
(22, 4, 34, 'hotel-1.jpg', 'hotel-1-1654867405.jpg', NULL, NULL, '2022-06-10 06:23:25'),
(23, 4, 34, 'hotel-2.jpg', 'hotel-2-1654867405.jpg', NULL, NULL, '2022-06-10 06:23:25'),
(24, 4, 34, 'hotel-5.jpg', 'hotel-5-1654867405.jpg', NULL, NULL, '2022-06-10 06:23:25'),
(30, 19, 35, 'swisbell.jpg', '6-1657200731.png', NULL, NULL, '2022-07-07 06:32:12'),
(29, 4, 34, 'asdasd', '10000461-9f64bb8bc11e5fcdcf9d869e34ea49d7-1654913593.webp', 'xzdad', 2, '2022-06-10 19:13:13'),
(31, 19, 35, 'Swissbell', '7-1657200749.png', NULL, NULL, '2022-07-07 06:32:29'),
(35, 4, 36, 'a011d6e3597dca8d7dac3f5451da3348.jpg', 'a011d6e3597dca8d7dac3f5451da3348-1655191884.jpg', NULL, NULL, '2022-06-14 07:31:24'),
(43, 19, 37, 'Whiz Front', '4-1657199676.png', NULL, NULL, '2022-07-07 06:14:37'),
(37, 4, 38, '16566819626761448758080.jpg', '16566819626761448758080-1656682152.jpg', NULL, NULL, '2022-07-01 13:29:13'),
(38, 4, 39, 'IMG-20220701-WA0013.jpg', 'img-20220701-wa0013-1656682563.jpg', NULL, NULL, '2022-07-01 13:36:03'),
(40, 19, 40, 'nirwana', '8-1657199266.png', NULL, NULL, '2022-07-07 06:08:01'),
(44, 19, 37, 'Whiz Resto', '5-1657199695.png', NULL, NULL, '2022-07-07 06:14:56'),
(42, 19, 41, 'nirwana.png', '8-1657199606.png', NULL, NULL, '2022-07-07 06:13:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `hits` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `id_user`, `slug_kategori`, `nama_kategori`, `urutan`, `hits`, `tanggal`) VALUES
(4, 1, 'hotel', 'Hotel', 4, 0, '2022-06-12 16:00:57'),
(5, 1, 'kegiatan-organisasi', 'Kegiatan Organisasi', 5, 0, '2020-06-10 22:08:31'),
(6, 0, 'tempat-wisata', 'Tempat Wisata', 3, 0, '2022-06-12 16:00:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_download`
--

CREATE TABLE `kategori_download` (
  `id_kategori_download` int(11) NOT NULL,
  `slug_kategori_download` varchar(255) NOT NULL,
  `nama_kategori_download` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_download`
--

INSERT INTO `kategori_download` (`id_kategori_download`, `slug_kategori_download`, `nama_kategori_download`, `urutan`) VALUES
(1, 'product-pricelist', 'Product Pricelist', 1),
(2, 'informasi-nitrico', 'Informasi Nitrico', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_galeri`
--

CREATE TABLE `kategori_galeri` (
  `id_kategori_galeri` int(11) NOT NULL,
  `slug_kategori_galeri` varchar(255) NOT NULL,
  `nama_kategori_galeri` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_galeri`
--

INSERT INTO `kategori_galeri` (`id_kategori_galeri`, `slug_kategori_galeri`, `nama_kategori_galeri`, `urutan`) VALUES
(7, 'pariwisata', 'Pariwisata', 1),
(8, 'hotel', 'Hotel', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori_produk` int(11) NOT NULL,
  `nama_kategori_produk` varchar(200) NOT NULL,
  `slug_kategori_produk` varchar(200) NOT NULL,
  `urutan` int(11) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori_produk`, `nama_kategori_produk`, `slug_kategori_produk`, `urutan`, `keterangan`, `gambar`, `tanggal`) VALUES
(6, 'Paket Pariwisata', 'paket-pariwisata', 1, '<p>PAket Pariwisata</p>', 'tempat-wisata-di-indonesia-bali-1654785342.jpg', '2022-06-09 14:35:43'),
(7, 'Paket Hotel', 'paket-hotel', 2, '<p>Paket hotel</p>', 'hotel-1-1654785406.jpg', '2022-06-09 14:36:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(200) NOT NULL,
  `nama_singkat` varchar(20) DEFAULT NULL,
  `tagline` varchar(200) DEFAULT NULL,
  `tagline2` varchar(255) DEFAULT NULL,
  `tentang` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_cadangan` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `keywords` varchar(400) DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `google_plus` varchar(255) DEFAULT NULL,
  `nama_facebook` varchar(255) NOT NULL,
  `nama_twitter` varchar(255) NOT NULL,
  `nama_instagram` varchar(255) NOT NULL,
  `nama_google_plus` varchar(255) NOT NULL,
  `singkatan` varchar(255) NOT NULL,
  `google_map` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `link_bawah_peta` varchar(255) DEFAULT NULL,
  `text_bawah_peta` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `nama_singkat`, `tagline`, `tagline2`, `tentang`, `deskripsi`, `website`, `email`, `email_cadangan`, `alamat`, `telepon`, `hp`, `fax`, `logo`, `icon`, `keywords`, `metatext`, `facebook`, `twitter`, `instagram`, `google_plus`, `nama_facebook`, `nama_twitter`, `nama_instagram`, `nama_google_plus`, `singkatan`, `google_map`, `gambar`, `video`, `link_bawah_peta`, `text_bawah_peta`, `id_user`, `tanggal`) VALUES
(1, 'CV. Maha Cipta Wisata', 'Mahacipta', 'Pariwiwsata Tour & Travel', 'Pariwiwsata Tour & Travel', '<p>CV. Maha Cipta Wisata atau lebih di kenal matawisata.id berdiri pada tahun 2016, beralamatkan Gg. Kenanga, Pangklangan, Mandirejo, Kec. Merakurak, Kabupaten Tuban merupakan perusahaan yang bergerak di bidang <em>tour &amp; travel</em>, <em>event</em><em> organizer</em>, dan dokumentasi acara. selain itu CV. Maha Cipta Wisata menyediakan beragam jenis paket pariwisata, kunjungan industri, <em>family gathering</em>, hotel, dan bus.</p>', 'Mahacipta berdiri pada tanggal 26 April 2010, berawal dari garasi rumah ukuran 3x4 meter. Mahacipta awalnya hanya bergerak di bidang pariwiwsata dan s. Awal tahun 2011, perusahaan ini kemudian mulai bergerak di bidang paket wisata dan hotel, khususnya di bidang pariwiwsata.', 'http://mahacipta.com', 'contact@mahacipta.co.id', 'contact@mahacipta.co.id', 'Gg. Kenanga, Pangklangan, Mandirejo, Kec. Merakurak, Kabupaten Tuban', '085732291516', '+6285732291516', '085732291516', 'icon-name-1657352630.png', 'mata-wisata-icon-200px-1657352657.png', NULL, NULL, 'https://www.facebook.com/mahacipta', 'http://twitter.com/mahacipta', 'https://instagram.com/mahacipta', 'https://www.youtube.com/channel/UCmm6mFZXYQ3ZylUMa0Tmc2Q', 'Mahacipta', 'Mahacipta', 'Mahacipta', '', 'MC', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.420416130144!2d111.9920167!3d-6.8780098!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9f33153dfb663adf!2sMaha%20Cipta%20Wisata!5e0!3m2!1sen!2sid!4v1654919251981!5m2!1sen!2sid\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'mata-wisata-icon-200px-1658971100.png', 'fsH_KhUWfho', NULL, '', 19, '2022-07-28 01:18:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `token_transaksi` varchar(255) NOT NULL,
  `tanggal_order` date NOT NULL,
  `nomor_transaksi` int(11) NOT NULL,
  `status_pemesanan` varchar(255) NOT NULL DEFAULT 'Menunggu',
  `nama_pemesan` varchar(255) NOT NULL,
  `telepon_pemesan` varchar(255) NOT NULL,
  `email_pemesan` varchar(255) DEFAULT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `harga_produk` bigint(20) NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `tanggal_pemesanan` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `id_produk`, `kode_transaksi`, `token_transaksi`, `tanggal_order`, `nomor_transaksi`, `status_pemesanan`, `nama_pemesan`, `telepon_pemesan`, `email_pemesan`, `jumlah_produk`, `harga_produk`, `total_harga`, `tanggal_pemesanan`, `tanggal_akhir`, `tanggal_post`, `tanggal_update`) VALUES
(23, 4, 37, 'MHC202206140001', 'ySLiLYXA9PNsNWWPyFEvWjQXqBjSh538', '2022-06-14', 1, 'Konfirmasi', 'Yosy Dzulfiary Ibrahim', '1231233', 'yosydz@gmail.com', 1, 200000, 200000, '2022-06-14', '2022-06-14', '2022-06-14 15:15:45', '2022-06-15 05:55:17'),
(59, 19, 37, 'MHC808/202207230025', '4ZrNdmG6yEzvkVSOeSKalMu6C8KFoTDi', '2022-07-23', 25, 'Konfirmasi', 'admin', '085607802670', 'mahaciptawisata@gmail.com', 1, 450000, 450000, '2022-07-23', '2022-07-23', '2022-07-23 01:50:34', '2022-07-23 01:55:54'),
(60, 19, 37, 'MHC477/202207240026', 'TJMtHlROpX4xIy6al263JUqT9xLn9Rp3', '2022-07-24', 26, 'Dibuat', 'admin', '085607802670', 'mahaciptawisata@gmail.com', 1, 450000, 450000, '2022-07-24', '2022-07-24', '2022-07-24 06:40:19', '2022-07-24 06:40:19'),
(61, 23, 37, 'MHC604/202207280027', 'j3yjDj5PRNrqyjRkgxnU8UJyfdjjz5wg', '2022-07-28', 27, 'Konfirmasi', 'cobamahacipta', '086707802670', 'adimaulana221@gmail.com', 1, 450000, 450000, '2022-07-28', '2022-07-28', '2022-07-28 06:20:39', '2022-07-28 06:21:38'),
(62, 25, 37, 'MHC254/202207290028', 'SYOoYVT9t21YgxA5jR08yxQKybpHzZfe', '2022-07-29', 28, 'Konfirmasi', 'coba1111', '085607802670', 'adimr2628@gmail.com', 1, 450000, 450000, '2022-07-29', '2022-07-29', '2022-07-29 02:19:43', '2022-07-29 02:20:32'),
(56, 19, 35, 'MHC174/202207120022', 'A3cfLldP6qN9APgcNZ3t2ddlACtJ7PjN', '2022-07-12', 22, 'Menunggu', 'admin', '085607802670', 'mahaciptawisata@gmail.com', 1, 470000, 470000, '2022-07-12', '2022-07-12', '2022-07-12 16:46:32', '2022-07-12 16:46:43'),
(57, 21, 35, 'MHC316/202207120023', 'Ye6DrZ6KES9LL8SRTGLEptgD7JHporbk', '2022-07-12', 23, 'Konfirmasi', 'Adi maulana rifa\'i', '085607802670', 'adimaulana221@gmail.com', 1, 470000, 470000, '2022-07-12', '2022-07-12', '2022-07-12 16:49:44', '2022-07-12 16:50:20'),
(58, 19, 35, 'MHC954/202207120024', 'cOs7mRUdtvXNegEu7wctNEK7SjAHYyxP', '2022-07-12', 24, 'Konfirmasi', 'Adi maulana rifa\'i', '085607802670', 'adimaulana221@gmail.com', 1, 470000, 470000, '2022-07-12', '2022-07-12', '2022-07-12 16:50:39', '2022-07-23 01:08:57'),
(47, 21, 35, 'MHC202207090016', 'SRSel6IVrHmbTgJNSsyJzABHMnXZIXhX', '2022-07-09', 16, 'Konfirmasi', 'Adi maulana rifa\'i', '085607802670', 'adimaulana221@gmail.com', 1, 470000, 470000, '2022-07-09', '2022-07-09', '2022-07-09 06:16:55', '2022-07-09 06:23:32'),
(51, 22, 35, 'MHC801/202207090020', '8CxF4Wg6CP25ZassXucZqMHWp7PkS3Dw', '2022-07-09', 20, 'Konfirmasi', 'Adi maulana rifa\'i', '085607802670', 'adimaulana221@gmail.com', 1, 470000, 470000, '2022-07-09', '2022-07-09', '2022-07-09 07:12:19', '2022-07-09 07:13:12'),
(52, 22, 35, 'MHC123/202207090021', '3rAvPmFjr1qySLWl1uZ79qs8NUXDLl17', '2022-07-09', 21, 'Konfirmasi', 'Adi maulana rifa\'i', '085607802670', 'adimaulana221@gmail.com', 1, 470000, 470000, '2022-07-09', '2022-07-09', '2022-07-09 07:13:51', '2022-07-09 07:24:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_client` int(11) DEFAULT NULL,
  `id_kategori_produk` int(11) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `status_produk` varchar(20) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `isi` text NOT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_terendah` int(11) DEFAULT NULL,
  `harga_tertinggi` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `mulai_diskon` date DEFAULT NULL,
  `selesai_diskon` date DEFAULT NULL,
  `besar_diskon` int(12) DEFAULT NULL,
  `jenis_diskon` enum('Potongan','Persentase') DEFAULT NULL,
  `jumlah_order_min` int(11) DEFAULT NULL,
  `jumlah_order_max` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `hits` bigint(20) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal` date DEFAULT NULL,
  `tanggal_end` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_client`, `id_kategori_produk`, `slug_produk`, `kode_produk`, `nama_produk`, `status_produk`, `satuan`, `urutan`, `deskripsi`, `isi`, `harga_jual`, `harga_beli`, `harga_terendah`, `harga_tertinggi`, `gambar`, `keywords`, `mulai_diskon`, `selesai_diskon`, `besar_diskon`, `jenis_diskon`, `jumlah_order_min`, `jumlah_order_max`, `stok`, `berat`, `ukuran`, `hits`, `tanggal_post`, `tanggal`, `tanggal_end`) VALUES
(35, 19, NULL, 7, 'kamar-deluks-single-swissbellin-surabaya', 'SBS', 'Kamar Deluks Single (SwissBellin Surabaya)', 'Publish', NULL, NULL, NULL, '<h4 class=\"label-desc\">HOTEL (Include Breakfast)</h4>\r\n<hr />\r\n<h4>Deluxe Room</h4>\r\n<p>The hotel offers 137 comfortable Deluxe Rooms in 24 sqm with modern and stylish design. Available with twin bed options.</p>\r\n<h4>Room Facilities:</h4>\r\n<p>&bull; Electronic door lock<br />&bull; Individually controlled air-conditioning<br />&bull; Integrated multi-plug<br />&bull; 14&rdquo; laptop size safety deposit box<br />&bull; Coffee and tea-making facilities<br />&bull; 32&rdquo; LED TV with cable/satellite channels<br />&bull; IDD/NDD telephone<br />&bull; High-speed Wi-Fi Internet access<br />&bull; Bathroom with shower</p>', 470000, NULL, NULL, NULL, '2-1657353113.png', NULL, NULL, NULL, NULL, 'Potongan', 1, NULL, 123, NULL, NULL, NULL, '2022-06-11 02:38:56', '2022-06-11', '2022-07-22'),
(37, 19, NULL, 7, 'roomdouble-whiz-prime-malioboro', 'WPM', 'RoomDouble - Whiz Prime Malioboro', 'Publish', NULL, NULL, NULL, '<h4 class=\"label-desc\">HOTEL (Include Breakfast)</h4>\r\n<hr />\r\n<h4>Deluxe Room</h4>\r\n<p>The hotel offers 137 comfortable Deluxe Rooms in 24 sqm with modern and stylish design. Available with twin bed options.</p>\r\n<h4>Room Facilities:</h4>\r\n<p>&bull; Electronic door lock<br />&bull; Individually controlled air-conditioning<br />&bull; Integrated multi-plug<br />&bull; 14&rdquo; laptop size safety deposit box<br />&bull; Coffee and tea-making facilities<br />&bull; 32&rdquo; LED TV with cable/satellite channels<br />&bull; IDD/NDD telephone<br />&bull; High-speed Wi-Fi Internet access<br />&bull; Bathroom with shower</p>', 450000, NULL, NULL, NULL, '3-1657353136.png', NULL, NULL, NULL, NULL, 'Potongan', 1, 5, 5, NULL, NULL, NULL, '2022-06-14 07:33:01', '2022-06-14', '2022-07-31'),
(41, 19, NULL, 7, 'deluxeroom-nirwana-hotel-sarangan', 'NWN', 'DeluxeRoom - Nirwana Hotel Sarangan', 'Publish', NULL, NULL, NULL, '<h4 class=\"label-desc\">HOTEL (Include Breakfast)</h4>\r\n<hr />\r\n<h4>Deluxe Room</h4>\r\n<p>The hotel offers 137 comfortable Deluxe Rooms in 24 sqm with modern and stylish design. Available with twin bed options.</p>\r\n<h4>Room Facilities:</h4>\r\n<p>&bull; Electronic door lock<br />&bull; Individually controlled air-conditioning<br />&bull; Integrated multi-plug<br />&bull; 14&rdquo; laptop size safety deposit box<br />&bull; Coffee and tea-making facilities<br />&bull; 32&rdquo; LED TV with cable/satellite channels<br />&bull; IDD/NDD telephone<br />&bull; High-speed Wi-Fi Internet access<br />&bull; Bathroom with shower</p>', 350000, NULL, NULL, NULL, '1-1657353165.png', NULL, NULL, NULL, NULL, NULL, 1, 3, 3, NULL, NULL, NULL, '2022-07-07 13:11:32', '2022-07-06', '2022-07-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `kode_rahasia` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `kode_rahasia`, `gambar`, `tanggal`) VALUES
(22, 'Adi maulana rifa\'i', 'adimaulana221@gmail.com', 'amr222', 'f62b29624a6be3ade1f18c276d0194c05aabe473', 'Customer', NULL, 'testimonials-1.jpg', '2022-07-09 00:04:10'),
(19, 'admin', 'mahaciptawisata@gmail.com', 'adminmahacipta', 'f99aecef3d12e02dcbb6260bbdd35189c89e6e73', 'Admin', NULL, NULL, '2022-07-06 17:54:57'),
(21, 'Adi maulana rifa\'i', 'adimaulana221@gmail.com', 'adimaulana', 'f99aecef3d12e02dcbb6260bbdd35189c89e6e73', 'Customer', NULL, 'testimonials-1.jpg', '2022-07-06 21:11:43'),
(23, 'cobamahacipta', 'adimaulana221@gmail.com', 'cobates', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Customer', NULL, 'testimonials-1.jpg', '2022-07-27 23:20:04'),
(24, 'coba12344', 'adimaulana221@gmail.com', 'cobates2', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'Customer', NULL, 'testimonials-1.jpg', '2022-07-27 23:29:00'),
(25, 'coba1111', 'adimr2628@gmail.com', 'coba1111', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Customer', NULL, 'testimonials-1.jpg', '2022-07-28 19:19:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id_video` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `video` text NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `bahasa` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id_video`, `judul`, `posisi`, `keterangan`, `video`, `urutan`, `bahasa`, `id_user`, `tanggal`) VALUES
(61, 'Kegiatan Refleksi Bendahara BPOPP SMA & SMK Kabupaten Bojonegoro', 'Homepage', 'Kegiatan Refleksi Bendahara BPOPP SMA & SMK Kabupaten Bojonegoro', 'r5S1GzQgjhw', 61, 'Indonesia', 4, '2022-06-12 07:02:58'),
(64, 'Staf Outing Goes to Jogjakarta Hotel Horison GKB Gresik', 'Homepage', 'Di masa pandemi ini kita beberapa kali menjalankan event mulai dari Sekolah, Dinas, Kantor, maupun Umum\r\n.\r\nYuk Wisata New Normal, jadi kita siap melayani sesuai dengan Protokol Kesehatan', 'y71i-ACBCiw', 64, 'Indonesia', 4, '2022-06-12 06:59:09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`id_gambar_produk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori`);

--
-- Indeks untuk tabel `kategori_download`
--
ALTER TABLE `kategori_download`
  ADD PRIMARY KEY (`id_kategori_download`);

--
-- Indeks untuk tabel `kategori_galeri`
--
ALTER TABLE `kategori_galeri`
  ADD PRIMARY KEY (`id_kategori_galeri`);

--
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`),
  ADD UNIQUE KEY `nama_kategori` (`nama_kategori_produk`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD UNIQUE KEY `token_transaksi` (`token_transaksi`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `id_gambar_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori_download`
--
ALTER TABLE `kategori_download`
  MODIFY `id_kategori_download` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_galeri`
--
ALTER TABLE `kategori_galeri`
  MODIFY `id_kategori_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
