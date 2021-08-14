-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2021 at 11:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pamansa`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_siswa`
--

CREATE TABLE `calon_siswa` (
  `id_siswabaru` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `jenis_kelamin` enum('perempuan','laki-laki','','') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat_lengkap` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` varchar(100) NOT NULL,
  `tahun_lulus` int(11) NOT NULL,
  `no_ijazah` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nilai_unmatematika` float NOT NULL,
  `nilai_unbinggris` float NOT NULL,
  `nilai_unbindonesia` float NOT NULL,
  `upload_kk` varchar(100) NOT NULL,
  `upload_aktekelahiran` varchar(100) NOT NULL,
  `upload_skl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calon_siswa`
--

INSERT INTO `calon_siswa` (`id_siswabaru`, `id_user`, `nama_siswa`, `tempat_lahir`, `tanggal`, `bulan`, `tahun`, `jenis_kelamin`, `agama`, `alamat_lengkap`, `kode_pos`, `asal_sekolah`, `alamat_sekolah`, `tahun_lulus`, `no_ijazah`, `nisn`, `no_telp`, `email`, `nilai_unmatematika`, `nilai_unbinggris`, `nilai_unbindonesia`, `upload_kk`, `upload_aktekelahiran`, `upload_skl`) VALUES
('10', 55, 'Raihan Dinata', 'Nagan Raya', 25, 'Januari', 2003, 'laki-laki', 'Islam', 'Perumahan Jaksa Nagan Raya', 12120, 'SMP 2 Nagan Raya', 'Jl. Pembangunan Nagan Raya', 2021, 2147483647, 112233, 2147483647, 'raihan@dinata.com', 9.1, 8.7, 7.9, '2193021-ZsaZsaSabilla20.pdf', '2193021-ZsaZsaSabilla21.pdf', '2193021-ZsaZsaSabilla22.pdf'),
('1122334455', 56, 'caca', 'caca', 6, '06', 2006, 'laki-laki', 'islam', 'caca', 45678, 'caca', 'caca', 2021, 2147483647, 1122334455, 2147483647, 'cacacaca', 7.6, 8.9, 9.1, '2193021-ZsaZsaSabilla32.pdf', '2193021-ZsaZsaSabilla33.pdf', '2193021-ZsaZsaSabilla34.pdf'),
('7', 52, 'Shinta Sin', 'Pekan Baru', 1, 'Juli', 2002, 'perempuan', 'Islam', 'Jl. Danau Poso', 121234, 'SMP Pekan Baru', 'Jl.Pekan Baru', 2021, 2147483647, 55648, 2147483647, 'shinta@sin.com', 8.6, 9, 7.8, '2193021-ZsaZsaSabilla8.pdf', '2193021-ZsaZsaSabilla9.pdf', '2193021-ZsaZsaSabilla10.pdf'),
('8', 53, 'Zsa Zsa Sabilla', 'Binjai', 6, 'Mei', 2001, 'perempuan', 'Islam', 'Asrama  Korem 012', 23615, 'MTsN MODEL MEULABOH-1', 'Jl. Manek Roo', 2021, 2147483647, 112233, 2147483647, 'zsazsa@sabilla.com', 8.5, 8.9, 8.7, '2193021-ZsaZsaSabilla12.pdf', '2193021-ZsaZsaSabilla13.pdf', '2193021-ZsaZsaSabilla14.pdf'),
('9', 54, 'M.Ezsra Pawdi', 'Binjai', 24, 'Desember', 2003, 'laki-laki', 'Islam', 'Asrama Korem 012', 23615, 'Mtsn Meureubo', 'Jl. Simpang Meureubo', 2021, 2147483647, 112233, 2147483647, 'ezsra@pawdi.com', 8.8, 8.5, 8.6, '2193021-ZsaZsaSabilla16.pdf', '2193021-ZsaZsaSabilla17.pdf', '2193021-ZsaZsaSabilla18.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'Administrator'),
(2, 'calonsiswa', 'Calon Siswa'),
(33, 'stafftu', 'Staff TU');

-- --------------------------------------------------------

--
-- Table structure for table `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id_groups` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups_menu`
--

INSERT INTO `groups_menu` (`id_groups`, `id_menu`) VALUES
(1, 8),
(1, 89),
(1, 91),
(4, 91),
(1, 93),
(1, 94),
(1, 43),
(1, 44),
(1, 42),
(1, 118),
(5, 118),
(6, 118),
(7, 118),
(8, 118),
(9, 118),
(10, 118),
(11, 118),
(12, 118),
(13, 118),
(14, 118),
(15, 118),
(16, 118),
(17, 118),
(18, 118),
(19, 118),
(20, 118),
(21, 118),
(22, 118),
(23, 118),
(24, 118),
(25, 118),
(26, 118),
(27, 118),
(28, 118),
(29, 118),
(1, 117),
(2, 117),
(5, 117),
(6, 117),
(7, 117),
(8, 117),
(9, 117),
(10, 117),
(11, 117),
(12, 117),
(13, 117),
(14, 117),
(15, 117),
(16, 117),
(17, 117),
(18, 117),
(19, 117),
(20, 117),
(21, 117),
(22, 117),
(23, 117),
(24, 117),
(25, 117),
(26, 117),
(27, 117),
(28, 117),
(29, 117),
(1, 125),
(2, 125),
(7, 125),
(8, 125),
(17, 125),
(18, 125),
(24, 125),
(26, 125),
(28, 125),
(29, 125),
(1, 127),
(2, 127),
(1, 1),
(2, 1),
(33, 1),
(1, 3),
(2, 3),
(33, 3),
(1, 92),
(33, 92),
(2, 115),
(33, 114),
(0, 40),
(1, 116);

-- --------------------------------------------------------

--
-- Table structure for table `list_session_token`
--

CREATE TABLE `list_session_token` (
  `session_id` int(11) NOT NULL,
  `session_token` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `active_time` datetime NOT NULL,
  `expire_time` datetime NOT NULL,
  `is_login` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_session_token`
--

INSERT INTO `list_session_token` (`session_id`, `session_token`, `admin_id`, `active_time`, `expire_time`, `is_login`) VALUES
(12, 'mFu6GqJ9laWV3G9pwgch9pETdg', 1, '2021-01-07 12:35:04', '2021-01-07 12:50:04', 0),
(13, 'S7oAgkk63Xm8n2MGzXIdnJsXho', 1, '2021-01-07 12:41:35', '2021-01-07 12:56:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 99,
  `level` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(125) NOT NULL,
  `label` varchar(25) NOT NULL,
  `link` varchar(125) NOT NULL,
  `id` varchar(25) NOT NULL DEFAULT '#',
  `id_menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `sort`, `level`, `parent_id`, `icon`, `label`, `link`, `id`, `id_menu_type`) VALUES
(1, 0, 1, 0, 'empty', 'MAIN NAVIGATION', '#', '#', 1),
(3, 1, 2, 1, 'fas fa-tachometer-alt', 'Dashboard', 'dashboard', '#', 1),
(4, 10, 2, 40, 'fas fa-table', 'CRUD Generator', 'crudbuilder', '1', 1),
(8, 8, 2, 40, 'fas fa-bars', 'Menu', 'cms/menu/side-menu', 'navMenu', 1),
(40, 6, 1, 0, 'empty', 'DEV', '#', '#', 1),
(42, 11, 2, 40, 'fas fa-users-cog', 'User', '#', '1', 1),
(43, 5, 2, 92, 'fas fa-angle-double-right', 'Users', 'users', '1', 1),
(44, 12, 3, 42, 'fas fa-angle-double-right', 'Groups', 'groups', '2', 1),
(89, 9, 2, 40, 'fas fa-th-list', 'Menu Type', 'menu_type', 'menu_type', 1),
(92, 3, 1, 0, 'empty', 'MASTER DATA', '#', 'masterdata', 1),
(107, 7, 2, 40, 'fas fa-cog', 'Setting', 'setting', 'setting', 1),
(114, 4, 2, 92, 'fas fa-crown', 'Kelola Pendaftaran', 'calon_siswa', '#', 1),
(115, 2, 2, 1, 'far fa-address-book', 'Pendaftaran', 'calon_siswa/create', '#', 1),
(116, 1, 2, 92, 'fas fa-angle-double-right', 'Admin', 'users/admin', 'id_admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `id_menu_type` int(11) NOT NULL,
  `type` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_type`
--

INSERT INTO `menu_type` (`id_menu_type`, `type`) VALUES
(1, 'Side menu');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nilai_unmatematika` int(11) NOT NULL,
  `nilai_unbinggris` int(11) NOT NULL,
  `nilai_unbindonesia` int(11) NOT NULL,
  `id_calonsiswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nilai_unmatematika`, `nilai_unbinggris`, `nilai_unbindonesia`, `id_calonsiswa`) VALUES
(9, 9, 9, '12345678910'),
(8, 9, 9, '1122334455');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `status_pembayaran` enum('Belum Bayar','Lunas','','') NOT NULL,
  `id_siswabaru` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `status_validasi_berkas` enum('Berkas Sedang Di Tinjau','Berkas Diterima','Berkas Ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `status_pembayaran`, `id_siswabaru`, `bukti_pembayaran`, `status_validasi_berkas`) VALUES
(4, 'Lunas', '7', '2193021-ZsaZsaSabilla11.pdf', 'Berkas Diterima'),
(5, 'Lunas', '8', '2193021-ZsaZsaSabilla15.pdf', 'Berkas Diterima'),
(6, 'Lunas', '9', '2193021-ZsaZsaSabilla19.pdf', 'Berkas Diterima'),
(7, 'Lunas', '10', '2193021-ZsaZsaSabilla23.pdf', 'Berkas Diterima'),
(9, 'Lunas', '1122334455', '2193021-ZsaZsaSabilla35.pdf', 'Berkas Sedang Di Tinjau');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `kode`, `nama`, `nilai`) VALUES
(1, 'man.jpg', 'PAMANSA ABAR', 'www.zsabill.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(254) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `image` varchar(128) NOT NULL DEFAULT 'default.jpg',
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `first_name`, `last_name`, `password`, `active`, `image`, `phone`) VALUES
(1, '', 'budi@tabuti.com', 'Budi', 'Tabuti', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', 1, 'bear.jpg', 0),
(47, 'mawarm@gmail.com', 'mawarm@gmail.com', 'mariati', 'mawar', '$2y$08$7r0FvDqBEW7/AzxcfLNFeuEDMakI9w162noQw5pehYWRMgGl0oc2m', 1, 'm.jpg', 0),
(52, 'shinta@sin.com', 'shinta@sin.com', 'Shinta', 'Sin', '$2y$08$...EUCshzNGgtS9pa/VPYelQUhE6ATFTUbnP4f7iGqMlvoENQoE.2', 1, 'udzYgK6.jpg', 2147483647),
(53, 'zsazsa@sabilla.com', 'zsazsa@sabilla.com', 'Zsa Zsa', 'Sabilla', '$2y$08$8hsqKYzjBhS.8pIygcWI.epx6Rr0z15uzoGwfow78zLMi21fVthHe', 1, 'default.jpg', 0),
(54, 'ezsra@pawdi.com', 'ezsra@pawdi.com', 'M.Ezsra', 'Pawdi', '$2y$08$IUS0qGLJyfpNXQJRY4PLGuzwwc6/KrvZup0CQ4o3/9NKj.lJAlt.m', 1, 'default.jpg', 0),
(55, 'raihan@dinata.com', 'raihan@dinata.com', 'Raihan', 'Dinata', '$2y$08$xwopl90tlDtQp8hdtFAXnOOAOX8IkBxa52m5iCRqRvCci6sF.Kz12', 1, 'bear1.jpg', 0),
(56, 'adji@ps.com', 'adji@ps.com', 'Adji Pribadi', 'Sukma', '$2y$08$KPVBDmMr5whaFun3HT76kOuQoDh/sc7F03x1HpJWekzBeJQiY2tCq', 1, 'default.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(24, 1, 1),
(25, 2, 2),
(11, 3, 2),
(10, 4, 2),
(13, 5, 8),
(17, 6, 5),
(19, 7, 6),
(21, 8, 7),
(1, 9, 17),
(90, 12, 2),
(67, 12, 8),
(127, 47, 33),
(132, 52, 2),
(133, 53, 2),
(134, 54, 2),
(135, 55, 2),
(136, 56, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_siswa`
--
ALTER TABLE `calon_siswa`
  ADD PRIMARY KEY (`id_siswabaru`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_session_token`
--
ALTER TABLE `list_session_token`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `FK__list_admin` (`admin_id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id_menu_type`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `list_session_token`
--
ALTER TABLE `list_session_token`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
