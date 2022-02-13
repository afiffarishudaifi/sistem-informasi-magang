-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2022 at 07:23 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_magang`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_siswa`, `foto_absen`, `waktu_absen`, `status_absen`, `keterangan`, `konfirmasi_absen`, `created_at`, `updated_at`) VALUES
(6, 5, 'docs/img/img_absen/1643947090_b07e8c4e9703b5255963.jpg', '2022-02-04 10:58:10', 'Sakit', 'hadir', 'Ya', '2022-02-04 10:58:10', '2022-02-04 13:28:42'),
(7, 5, 'docs/img/img_absen/1643948447_78dbd9bb9f83eab04a93.jpg', '2022-02-04 11:20:47', 'Hadir', 'hadir', 'Tidak', '2022-02-04 11:20:47', NULL),
(9, 5, 'docs/img/img_absen/1644415372_b2325aff316c82d4e8c8.jpg', '2022-02-09 21:02:52', 'Hadir', 'hadir', 'Ya', '2022-02-09 21:02:52', '2022-02-09 21:03:06');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_jabatan`, `nama_admin`, `username_admin`, `password_admin`, `no_telp_admin`, `foto_resmi_admin`, `status_admin`, `created_at`, `updated_at`) VALUES
(1, 2, 'admin dua', 'admin1', 'sTwiK+5rVIr1pksX2F5uurWZwnSNgc/Ta/kXLwt5hkfgNJ6g6UO9KhHPhj8yNMTw4KoPlocRsE6IuAvCL9VPPEAtclnVThH6N1XR546sYcJjBbL0P4c=', '089654523651', 'docs/img/img_admin/1643469029_40251cdf006fb1a9c592.png', 'Aktif', '2022-01-29 22:10:29', '2022-02-04 10:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `foto_kegiatan`
--

CREATE TABLE `foto_kegiatan` (
  `id_foto` int(11) NOT NULL,
  `id_jobdesk` int(11) NOT NULL,
  `nama_foto` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `indeks_penilaian`
--

CREATE TABLE `indeks_penilaian` (
  `id_indeks` int(11) NOT NULL,
  `angka_awal` int(11) NOT NULL,
  `angka_akhir` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indeks_penilaian`
--

INSERT INTO `indeks_penilaian` (`id_indeks`, `angka_awal`, `angka_akhir`, `keterangan`) VALUES
(1, 70, 80, 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `created_at`, `updated_at`) VALUES
(2, 'Karyawann', '2022-01-25 14:20:32', NULL),
(4, 'Satpam', '2022-01-25 19:50:51', NULL),
(6, 'Cleaning Service', '2022-01-31 15:11:41', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobdesk`
--

INSERT INTO `jobdesk` (`id_jobdesk`, `id_siswa`, `nama_jobdesk`, `deskripsi`, `waktu_mulai`, `waktu_selesai`, `status_jobdesk`, `created_at`, `updated_at`) VALUES
(1, 5, 'tanggal 1', 'mengerjakan latihan', '2022-02-01 18:06:00', '2022-02-04 18:06:00', 'Selesai', '2022-02-01 18:05:50', '2022-02-01 18:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_sertifikat` int(11) NOT NULL,
  `kedisiplinan` int(11) NOT NULL,
  `tanggung_jawab` int(11) NOT NULL,
  `kerja_sama` int(11) NOT NULL,
  `kerajinan` int(11) NOT NULL,
  `inisiatif` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `rata_rata` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `pengantar` varchar(50) NOT NULL,
  `proposal` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_magang`
--

INSERT INTO `pengajuan_magang` (`id_pengajuan`, `id_siswa`, `id_admin`, `waktu_mulai`, `waktu_selesai`, `status_pengajuan`, `pengantar`, `proposal`, `created_at`, `updated_at`) VALUES
(1, 5, NULL, '2022-01-31 00:00:00', '2022-03-29 00:00:00', 'Pengajuan', 'docs/file_pengantar/1643604281_bca16dca7d2e4dc902f', 'docs/file_proposal/1643604281_acc6eb796b5cbfde8461', '2022-01-31 11:44:41', NULL),
(2, 6, NULL, '2022-01-31 00:00:00', '2022-04-28 00:00:00', 'Pengajuan', 'docs/file_pengantar/1643604398_3f408bae917481a618c', 'docs/file_proposal/1643604398_7f4bc874af890b39f518', '2022-01-31 11:46:38', NULL),
(3, 7, NULL, '2022-01-31 00:00:00', '2022-03-28 00:00:00', 'Pengajuan', 'docs/file_pengantar/1643605099_cbf3472944b2eecd02d', 'docs/file_proposal/1643605099_01187d8fb716a9e79d24', '2022-01-31 11:58:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama`, `alamat`, `no_telp`, `email`, `foto`) VALUES
(1, 'Badan Kesatuan Bangsa dan Politik Dalam Negeri Kabupaten Madiun', 'Jl. Mt. Haryono No.49, Caruban, Krajan, Kec. Mejayan, Kabupaten Madiun, Jawa Timur 63153', '089658745', 'email@gmail.com', 'docs/img/img_logo/1643622777_07e1231c2b3237328d8d.gif');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `username_sekolah` varchar(50) NOT NULL,
  `password_sekolah` varchar(255) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `alamat_sekolah` text NOT NULL,
  `no_telp_sekolah` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `username_sekolah`, `password_sekolah`, `nama_sekolah`, `alamat_sekolah`, `no_telp_sekolah`, `created_at`, `updated_at`) VALUES
(1, 'coba', 'coba', 'Politeknik Negeri Kediri', 'Kediri', '089657451254', '2022-01-26 21:15:54', '2022-01-26 15:15:26'),
(2, 'coba2', 'coba2', 'Politeknik Negeri Malang', 'Malang', '08745412456', '2022-01-26 22:01:17', '2022-01-26 16:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `foto_sertifikat` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id_sertifikat`, `foto_sertifikat`, `created_at`, `updated_at`) VALUES
(3, 'docs/img/img_sertifikat/1643266153_d13a888ba0df555be2df.jpg', '2022-01-27 13:41:37', '2022-01-27 13:49:13');

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
  `status` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_sekolah`, `nomor_induk`, `username_siswa`, `password_siswa`, `nama_siswa`, `email_siswa`, `no_telp_siswa`, `alamat_siswa`, `jurusan`, `foto_resmi`, `status`, `created_at`, `updated_at`) VALUES
(5, 1, '12345678', 'siswa1', 'o7nAREuv5SmeieK4tb2U8MXQCpOz/3B7W47rFBsHc2NPQRb7PbJ++COm4/3vb71ctgw+AMnF+Snh1GLjLYbx/QIaAEcWiY3GIjTz145c90FgjBIHZA==', 'siswa1', 'siswa1@gmail.com', '123456789123', 'Kediri', 'Manajemen Informatika', 'docs/img/img_siswa/1643210204_02029a7a1d8dccdf0212.png', 'Aktif', '2022-01-26 22:13:09', '2022-02-01 15:23:57'),
(6, 1, '454121sad', 'siswa2', 'GgmGNNHraeSetDTGJgKwDJVIGir2aO8iLpdKzlDWdfVdXfnhrBay4DaDGsKhEpLs5ZIMgqEW84uWy63f8w8ZyaMk3gkZ76yNrAjyYM8XOV3ZF2kOrBM=', 'siswa2', 'siswa@gmail.com', '084392348203', 'kediri', 'teknik informatika', 'docs/img/img_siswa/1643521477_5d65b912ab02490dfdcd.png', 'Tidak Aktif', '2022-01-30 12:44:38', '2022-01-31 15:09:01'),
(7, 2, '56564df', 'siswa3', '0eKQ9LSzyTtmpCOdF/80qulkgTKtPy2SqO0rQUKiCo4hXjwi43UTRiIK4kQw6vdy0L9XO80eao/2VdzWrLKpXADxv4GC4pyT2uJGHD8d4BHBIlLhv+Y=', 'siswa3', 'siswa3@gmail.com', '086954124512', 'Kediri', 'Manajemen Informatika', 'docs/img/img_siswa/1643521759_39bcdc106b47742b8499.png', 'Tidak Aktif', '2022-01-30 12:49:19', '2022-02-01 15:21:56'),
(8, 1, '78945654987', 'siswa4', 's+J5+YthrxT+uEnF9VW/0/kjC/3WPnt5janzKBiL7YhInf4ekhZP56yTRbwETqpdK3R/aCCrA21PqWjnG0EZtuDvuH3e683za/iIQxKrYisF/83EEck=', 'siswa4', 'siswa4@gmail.com', '0896544251', 'kediri', 'manajemen informatika', 'docs/img/img_siswa/1643522138_a637f657a0860924dee2.png', 'Tidak Aktif', '2022-01-30 12:55:38', NULL);

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
-- Indexes for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_jobdesk` (`id_jobdesk`);

--
-- Indexes for table `indeks_penilaian`
--
ALTER TABLE `indeks_penilaian`
  ADD PRIMARY KEY (`id_indeks`);

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
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_sertifikat` (`id_sertifikat`);

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
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`);

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
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indeks_penilaian`
--
ALTER TABLE `indeks_penilaian`
  MODIFY `id_indeks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobdesk`
--
ALTER TABLE `jobdesk`
  MODIFY `id_jobdesk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_magang`
--
ALTER TABLE `pengajuan_magang`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Constraints for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  ADD CONSTRAINT `foto_kegiatan_ibfk_1` FOREIGN KEY (`id_jobdesk`) REFERENCES `jobdesk` (`id_jobdesk`);

--
-- Constraints for table `jobdesk`
--
ALTER TABLE `jobdesk`
  ADD CONSTRAINT `jobdesk_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_sertifikat`) REFERENCES `sertifikat` (`id_sertifikat`);

--
-- Constraints for table `pengajuan_magang`
--
ALTER TABLE `pengajuan_magang`
  ADD CONSTRAINT `pengajuan_magang_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `pengajuan_magang_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
