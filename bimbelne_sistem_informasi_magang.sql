-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2023 at 10:23 AM
-- Server version: 10.3.37-MariaDB-cll-lve
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbelne_sistem_informasi_magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `foto_absen` text NOT NULL,
  `waktu_absen` datetime NOT NULL DEFAULT current_timestamp(),
  `status_absen` enum('Hadir','Izin','Sakit','Bolos') NOT NULL DEFAULT 'Hadir',
  `keterangan` text NOT NULL,
  `konfirmasi_absen` enum('Ya','Tidak','Menunggu') NOT NULL DEFAULT 'Menunggu',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_siswa`, `foto_absen`, `waktu_absen`, `status_absen`, `keterangan`, `konfirmasi_absen`, `created_at`, `updated_at`) VALUES
(12, 12, 'docs/img/img_absen/1657278539_a73d06ce730124a7c1b4.jpeg', '2022-07-08 18:08:59', 'Hadir', 'Masuk tepat waktu', 'Menunggu', '2022-07-08 18:08:59', NULL),
(13, 15, 'docs/img/img_absen/1657681687_7a884b410b655888f336.png', '2022-07-13 10:08:07', 'Hadir', 'datang tepat waktu', 'Ya', '2022-07-13 10:08:07', '2022-07-13 10:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `no_telp_admin` varchar(20) NOT NULL,
  `foto_resmi_admin` varchar(100) NOT NULL,
  `status_admin` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Tidak Aktif',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_jabatan`, `nama_admin`, `username_admin`, `password_admin`, `no_telp_admin`, `foto_resmi_admin`, `status_admin`, `created_at`, `updated_at`) VALUES
(1, 2, 'KESBANGPOLDAGRI', 'admin1', 'EKdxEFQe/eTPRW75kVv9UA9nqYH0CJlQkmmZBZjiLPlW+cPiXDrpv2bWMIbC8TvGvT0/J6dUE1Xf688kb0fA8Jo9jsz9ww4DicelhupQu6om1yRTOFM=', '085736209593', 'docs/img/img_admin/1655883860_8066e2f608affd858b1f.png', 'Aktif', '2022-01-29 22:10:29', '2022-06-22 14:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(2, 'Kepala Kantor', '2022-01-25 14:20:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobdesk`
--

CREATE TABLE `jobdesk` (
  `id_jobdesk` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nama_jobdesk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `status_jobdesk` enum('Selesai','Belum Selesai') NOT NULL DEFAULT 'Belum Selesai',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobdesk`
--

INSERT INTO `jobdesk` (`id_jobdesk`, `id_siswa`, `nama_jobdesk`, `deskripsi`, `waktu_mulai`, `waktu_selesai`, `status_jobdesk`, `created_at`, `updated_at`) VALUES
(2, 12, 'penilaian magang', 'menilai peserta magang', '2022-07-09 00:00:00', '2022-07-10 00:00:00', 'Belum Selesai', '2022-07-09 08:48:44', NULL),
(3, 15, 'tugas', 'mengerjakan tugas', '2022-07-13 00:00:00', '2022-07-14 00:00:00', 'Belum Selesai', '2022-07-13 10:10:42', NULL),
(4, 15, 'tugas', 'mengerjakan tugas', '2022-07-13 00:00:00', '2022-07-14 00:00:00', 'Belum Selesai', '2022-07-13 10:10:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `kedisiplinan` int(11) NOT NULL,
  `tanggung_jawab` int(11) NOT NULL,
  `kerja_sama` int(11) NOT NULL,
  `kerajinan` int(11) NOT NULL,
  `inisiatif` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `rata_rata` double NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `kedisiplinan`, `tanggung_jawab`, `kerja_sama`, `kerajinan`, `inisiatif`, `jumlah`, `rata_rata`, `created_at`, `updated_at`) VALUES
(4, 10, 80, 80, 80, 80, 80, 400, 80, '2022-04-14 07:07:22', NULL),
(5, 12, 90, 90, 90, 90, 90, 450, 90, '2022-07-11 20:24:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_magang`
--

CREATE TABLE `pengajuan_magang` (
  `id_pengajuan` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `status_pengajuan` varchar(20) NOT NULL,
  `pengantar` varchar(255) NOT NULL,
  `proposal` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan_magang`
--

INSERT INTO `pengajuan_magang` (`id_pengajuan`, `id_siswa`, `id_admin`, `waktu_mulai`, `waktu_selesai`, `status_pengajuan`, `pengantar`, `proposal`, `created_at`, `updated_at`) VALUES
(5, 10, 1, '2022-03-27 00:00:00', '2022-04-27 00:00:00', 'Diterima', 'docs/file_pengantar/1647954615_b2fb14202d09a3dec0be.pdf', 'docs/file_proposal/1647954615_67d04e0a7344c1a13c0f.pdf', '2022-03-22 20:10:15', '2022-07-06 18:21:45'),
(6, 11, 1, '2022-04-01 00:00:00', '2022-05-01 00:00:00', 'Ditolak', 'docs/file_pengantar/1648040475_41b22b17a9daae66d593.pdf', 'docs/file_proposal/1648040475_f41a9eb21ecc78907a00.pdf', '2022-03-23 20:01:15', '2022-06-10 10:02:12'),
(7, 12, 1, '2022-06-13 00:00:00', '2022-07-31 00:00:00', 'Diterima', 'docs/file_pengantar/1654828880_b35df2f58644bd609730.pdf', 'docs/file_proposal/1654828880_1c0a2b4507aa642f0287.pdf', '2022-06-10 09:41:20', '2022-06-10 09:52:45'),
(8, 13, 1, '2022-07-11 00:00:00', '2022-08-13 00:00:00', 'Diterima', 'docs/file_pengantar/1656492171_43431c2eddcdd94b9e7a.pdf', 'docs/file_proposal/1656492171_5930cd0fcd31c8f64357.pdf', '2022-06-29 15:42:51', '2022-07-05 10:11:07'),
(10, 15, 1, '2022-07-13 00:00:00', '2022-07-30 00:00:00', 'Diterima', 'docs/file_pengantar/1657681451_839476372e864e5b6e5d.pdf', 'docs/file_proposal/1657681451_37f446d95a1eb364b275.pdf', '2022-07-13 10:04:11', '2022-07-13 10:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `kepala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama`, `alamat`, `no_telp`, `email`, `foto`, `kepala`) VALUES
(1, 'Badan Kesatuan Bangsa dan Politik Dalam Negeri Kabupaten Madiun ', 'Jalan Alun MT. Haryono Telp. (0351) 451295', '089658745', 'bakesbangpoldagrikabmadiun@gmail.com', 'docs/img/img_logo/logokab - Copy.gif', 'Sigit Budiarto, S.Sos., M.Si.');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `username_sekolah` varchar(150) NOT NULL,
  `password_sekolah` varchar(255) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `alamat_sekolah` text DEFAULT NULL,
  `no_telp_sekolah` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `username_sekolah`, `password_sekolah`, `nama_sekolah`, `alamat_sekolah`, `no_telp_sekolah`, `created_at`, `updated_at`) VALUES
(1, 'sekolah1', 'qLH157g/3E/ypDTS0nkEKn8YhY//71Ylhtn0qOW95NoATUbbwZve//Vmg3XhK+yfxQs59cB60ulAH1Lzd9xC6iWd1Be04bYBcvVAVSHKOtGAJ3/t4suD1A==', 'Politeknik Negeri Kediri', 'Kediri', '089657451254', '2022-01-26 21:15:54', '2022-02-22 23:03:17'),
(3, 'userpnm', '/7SZ0Gb1etNnDgBt5f0BPr4XjsxnXtObYhQHD5FO3wJJMvPk1jLAZ5TknYg35ijiQ3MoKT2l7iaU0XEY3SahYZXj2aeX0gG34MeuA703ai42F2iGRe80', 'Politeknik Negeri Madiun', 'Kota Madiun Jawa Timur', '085412536521', '2022-03-22 19:47:19', '2022-03-23 20:32:26'),
(4, 'universitasmerdeka123', 'xmpG0tK9yZL+EyAX3oecdCs87yl+21kPYOhXSoyfrV/4YJcDLQSUB/i8BHaKMwjLsWTg4PIF/G+Qh1OtpJjCPDiln14/K83/NPe8ILbt6N0DC2T75KGzqTOQGEkQuQkSOZkVHEQ=', 'Universitas Merdeka ', 'Jl. Serayu No.79, Pandean, Kec. Taman, Kota Madiun, Jawa Timur', '0351464427', '2022-06-22 14:02:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `nomor_induk` varchar(20) NOT NULL,
  `username_siswa` varchar(50) NOT NULL,
  `password_siswa` varchar(255) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `email_siswa` varchar(50) NOT NULL,
  `no_telp_siswa` varchar(20) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `foto_resmi` varchar(255) NOT NULL,
  `status` enum('Aktif','Tidak Aktif','Selesai') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_sekolah`, `nomor_induk`, `username_siswa`, `password_siswa`, `nama_siswa`, `email_siswa`, `no_telp_siswa`, `alamat_siswa`, `jurusan`, `foto_resmi`, `status`, `created_at`, `updated_at`) VALUES
(10, 1, '321541265', 'jayus', 'HulMQUfyicZZtK+YwUpHjmuCVVyot5KcxTWQTR4Mpsy8DM537Xe33b5Vb85v1WTbozCJxKjMiUhqWvqPVOIdcnKi6AiVd1WoU7BTxIMdmkuDedFK/g==', 'Jayus Hariono', 'afiffaris5@gmail.com', '089654124547', 'Kota Madiun', 'Teknologi Informasi', 'docs/img/img_siswa/1647953410_1fdfd69e1aa12f68da27.png', 'Aktif', '2022-03-22 19:50:10', '2022-07-06 18:21:45'),
(11, 3, '057854125', 'putri', 'LdqdTSOmEwCM8kcRB08DENflc6PtvqIm4OWO1kjDU4zPTM733vMs5Jtla4nK8oxzNAJmWmGYOKbgLr/d4/PnbmU0Re/bh7i1Vcm4eW8zimNG+gGjWg==', 'Putri Hariati', 'afiffaris5@gmail.com', '085658456984', 'Kota Madiun', 'Teknologi Informasi', 'docs/img/img_siswa/1647953475_6c470c50d9e8e0722d8f.png', 'Aktif', '2022-03-22 19:51:15', '2022-06-07 17:50:30'),
(12, 3, '193307023', 'ditamega', 'TSmr9a8XsdPv6lm4Jd3ImefZdq4lVMVKKrq9eDAIr2TNC5OKRbAtrU/EWOS5KIaXPYWSWkt7tNvs0INih00SmERwG5fNgi9HYeeA34oXzi5l0vyHI54idg==', 'Dita Mega Saputri', 'ditamega0411@gmail.com', '085806474360', 'Teguha Jiwan Madiun', 'Teknologi Informasi', 'docs/img/img_siswa/1654828277_1f8b4209afd2d1f03775.jpeg', 'Selesai', '2022-06-10 09:31:17', '2022-07-11 20:24:21'),
(13, 4, '1921010079', 'YESSY PUTRI', 'pno+MPQNrPgyVYIbGlqod+K73xlGKn+xllkbR0GEGXCMGxDAyx45vpCZ+4WhMGf2jgx4qHFvlZWpCbP/WEIOYbRfJtIJh6wY3hf9WwCDvkF7wBHs0rubLF0=', 'YESSY PUTRI WIDYANITA', 'yessyputri621@gmail.com', '087762672377', 'Jln borobudor no60b Rt20 Rw06 ', 'MANAJEMEN', 'docs/img/img_siswa/1655903015_7d55b0845b14a0bbef9f.jpg', 'Aktif', '2022-06-22 20:03:35', '2022-07-05 10:11:07'),
(15, 3, '123', 'dita', 'MxNyXGEz4vjMEJdItTks/bEDjQbZFzykr6Cq+zQ1w4atEZd1AOalKAisxoKleTsaMrUUzAKkfZeTF9HZQdMq4yLDWcaAXd6yRUBvOKdGeh3tJNbWX2ZP', 'dita', 'ditamega0411@gmail.com', '1234', 'madiun', 'teknik', 'docs/img/img_siswa/1657681424_5e0dc69bc2af56b49ae9.jpeg', 'Aktif', '2022-07-13 10:03:45', '2022-07-13 10:05:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jobdesk`
--
ALTER TABLE `jobdesk`
  ADD PRIMARY KEY (`id_jobdesk`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `pengajuan_magang`
--
ALTER TABLE `pengajuan_magang`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_sekolah` (`id_sekolah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobdesk`
--
ALTER TABLE `jobdesk`
  MODIFY `id_jobdesk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengajuan_magang`
--
ALTER TABLE `pengajuan_magang`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Constraints for table `jobdesk`
--
ALTER TABLE `jobdesk`
  ADD CONSTRAINT `jobdesk_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_magang`
--
ALTER TABLE `pengajuan_magang`
  ADD CONSTRAINT `pengajuan_magang_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengajuan_magang_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
