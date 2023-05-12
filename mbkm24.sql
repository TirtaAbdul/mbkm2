-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 03:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbkm24`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_formulir` int(11) NOT NULL,
  `nim_anggota` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_formulir`, `nim_anggota`) VALUES
(30, 4, '4444444444'),
(31, 4, '3333333333'),
(32, 10, '2222222222'),
(33, 10, '4444444444'),
(35, 11, '3333333333'),
(36, 11, '5555555555'),
(37, 10, '3333333333'),
(39, 13, '5555555555'),
(40, 14, '2222222222');

-- --------------------------------------------------------

--
-- Table structure for table `assign_dospem`
--

CREATE TABLE `assign_dospem` (
  `id_formulir` int(11) NOT NULL,
  `nik_dospem` char(20) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `formulir`
--

CREATE TABLE `formulir` (
  `id_formulir` int(11) NOT NULL,
  `nim` char(20) NOT NULL,
  `prodi_asal` varchar(255) NOT NULL,
  `jenis_program` varchar(255) NOT NULL,
  `alasan` text NOT NULL,
  `judul_program` varchar(255) NOT NULL,
  `nama_mitra` varchar(255) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `rincian_kegiatan` text NOT NULL,
  `sumber_pendanaan` varchar(255) NOT NULL,
  `jenis_pertukaran_pelajar` varchar(255) NOT NULL,
  `prodi_tujuan` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `jenis_dokumen` varchar(255) NOT NULL,
  `tautan_skj` varchar(255) NOT NULL,
  `tautan_sksehat` varchar(255) NOT NULL,
  `tautan_suratortu` varchar(255) NOT NULL,
  `tautan_suratpakta` varchar(255) NOT NULL,
  `tautan_transkipnilai` varchar(255) NOT NULL,
  `tautan_cv` varchar(255) NOT NULL,
  `tautan_pelatihan` varchar(255) NOT NULL,
  `tautan_produk` varchar(255) NOT NULL,
  `tautan_dokumen_lain` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formulir`
--

INSERT INTO `formulir` (`id_formulir`, `nim`, `prodi_asal`, `jenis_program`, `alasan`, `judul_program`, `nama_mitra`, `tgl_mulai`, `tgl_selesai`, `rincian_kegiatan`, `sumber_pendanaan`, `jenis_pertukaran_pelajar`, `prodi_tujuan`, `status`, `jenis_dokumen`, `tautan_skj`, `tautan_sksehat`, `tautan_suratortu`, `tautan_suratpakta`, `tautan_transkipnilai`, `tautan_cv`, `tautan_pelatihan`, `tautan_produk`, `tautan_dokumen_lain`) VALUES
(4, '1111111111', 'Teknik Informatika', 'Pertukaran Pelajar', 'memahami, mengerjakan, menguasai, menjelaskan, mengajarkan', 'pergi tuk kembali', 'mitraku', '2023-05-01', '2023-05-25', 'non-stop belajar', 'mitramu', 'Antar Prodi Pada Perguruan Tinggi Berbeda', 'Teknik Informatika', 'Peserta Kegiatan', 'pdf', '../mahasiswa/berkas_portofolio/5.2.7-packet-tracer---configure-and-modify-standard-ipv4-acls.pdf', '../mahasiswa/berkas_portofolio/alur.png', '../mahasiswa/berkas_portofolio/apa.png', '../mahasiswa/berkas_portofolio/apa2.png', '../mahasiswa/berkas_portofolio/desc.png', '../mahasiswa/berkas_portofolio/topologi.png', '../mahasiswa/berkas_portofolio/WhatsApp Image 2023-04-06 at 12.11.18 (1).jpeg', '../mahasiswa/berkas_portofolio/apa.png', '../mahasiswa/berkas_portofolio/WhatsApp Image 2023-04-06 at 12.11.18 (1).jpeg'),
(10, '1111111111', 'Teknik Informatika', 'Magang Praktik Kerja', 'maaf', 'yayayayaaa', 'tidak', '2023-05-06', '2023-05-25', 'saling bermaaf-maafan', 'kini', 'Antar Prodi Pada Perguruan Tinggi Berbeda', 'Teknik Informatika', 'Diajukan', 'pdf', '../mahasiswa/berkas_portofolio/apa.png', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/'),
(11, '1111111111', 'Teknik Informatika', 'Membangun Desa / Kuliah Kerja Nyata Tematik', 'mengapa yahh?', 'begini dan begitu', 'mitra kita', '2023-05-26', '2023-05-31', 'kita bersama-sama', 'dompet', 'Antar Prodi Pada Perguruan Tinggi Berbeda', 'Teknik Informatika', 'Peserta Kegiatan', 'pdf', '../mahasiswa/berkas_portofolio/alur.png', '../mahasiswa/berkas_portofolio/alur.png', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/WhatsApp Image 2023-04-06 at 12.11.18.jpeg', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/apa.png', '../mahasiswa/berkas_portofolio/'),
(12, '1111111111', '', 'Kegiatan Wirausaha', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, '1111111111', 'Teknik Informatika', 'Pertukaran Pelajar', 'fnalkn', 'klnalk', 'kma', '2023-05-03', '2023-05-03', 'klfa;kajl', 'jfkla;', 'Prodi Sama Pada Perguruan Tinggi Berbeda', 'Teknik Informatika', 'Diajukan', 'pdf', '../mahasiswa/berkas_portofolio/apa.png', '../mahasiswa/berkas_portofolio/alur.png', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/apa.png', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/'),
(14, '1111111111', 'Teknik Informatika', 'Penelitian / Riset', 'flkaj', 'klfajkl', 'flalk', '2023-05-04', '2023-05-26', 'klfmaklsfk', 'kfmalk', 'Antar Prodi di Politeknik Negeri Batam', 'Teknik Informatika', 'Diajukan', 'pdf', '../mahasiswa/berkas_portofolio/apa.png', '../mahasiswa/berkas_portofolio/alur.png', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/apa2.png', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/', '../mahasiswa/berkas_portofolio/');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_akhir`
--

CREATE TABLE `laporan_akhir` (
  `id_laporan_akhir` int(11) NOT NULL,
  `id_formulir` int(11) NOT NULL,
  `file` text NOT NULL,
  `jenis_dokumen` varchar(255) NOT NULL,
  `nama_dokumen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_akhir`
--

INSERT INTO `laporan_akhir` (`id_laporan_akhir`, `id_formulir`, `file`, `jenis_dokumen`, `nama_dokumen`) VALUES
(16, 4, 'alur.png', 'png', '../mahasiswa/berkas_laporanakhir/alur.png'),
(18, 4, 'alur.png', 'png', '../mahasiswa/berkas_laporanakhir/alur.png');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id_logbook` int(11) NOT NULL,
  `id_formulir` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kegiatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id_logbook`, `id_formulir`, `tanggal`, `kegiatan`) VALUES
(25, 4, '2023-06-10', 'inilah'),
(28, 11, '2023-05-26', 'kfmalk');

-- --------------------------------------------------------

--
-- Table structure for table `matkul_prodi`
--

CREATE TABLE `matkul_prodi` (
  `kode_matkul` char(20) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `sks` tinyint(1) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `semester` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matkul_prodi`
--

INSERT INTO `matkul_prodi` (`kode_matkul`, `nama_matkul`, `sks`, `prodi`, `semester`) VALUES
('IF110', 'DASAR PEMROGRAMAN', 4, 'Teknik Informatika', 1),
('IF111', 'ORGANISASI KOMPUTER', 4, 'Teknik Informatika', 1),
('IF112', 'MATEMATIKA', 3, 'Teknik Informatika', 1),
('IF113', 'PENGANTAR TEKNOLOGI INFORMASI', 3, 'Teknik Informatika', 1),
('IF114', 'KESELAMATAN DAN KESEHATAN KERJA', 2, 'Teknik Informatika', 1);

-- --------------------------------------------------------

--
-- Table structure for table `matkul_tujuan`
--

CREATE TABLE `matkul_tujuan` (
  `id_matkul_tujuan` int(11) NOT NULL,
  `id_formulir` int(11) NOT NULL,
  `kode_matkul` char(20) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matkul_tujuan`
--

INSERT INTO `matkul_tujuan` (`id_matkul_tujuan`, `id_formulir`, `kode_matkul`, `status`) VALUES
(2, 4, 'IF112', ''),
(6, 4, 'IF110', ''),
(10, 10, 'IF111', ''),
(11, 11, 'IF110', ''),
(12, 11, 'IF114', ''),
(13, 13, 'IF113', ''),
(16, 14, 'IF114', '');

-- --------------------------------------------------------

--
-- Table structure for table `review_formulir`
--

CREATE TABLE `review_formulir` (
  `id_review_formulir` int(11) NOT NULL,
  `id_formulir` int(11) NOT NULL,
  `formulir` tinyint(1) NOT NULL,
  `skj` tinyint(1) NOT NULL,
  `sksehat` tinyint(1) NOT NULL,
  `suratortu` tinyint(1) NOT NULL,
  `suratpakta` tinyint(1) NOT NULL,
  `transkipnilai` tinyint(1) NOT NULL,
  `cv` tinyint(1) NOT NULL,
  `pelatihan` tinyint(1) NOT NULL,
  `produk` tinyint(1) NOT NULL,
  `dokumen_lain` tinyint(1) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `umpan_balik`
--

CREATE TABLE `umpan_balik` (
  `id_formulir` int(11) NOT NULL,
  `softskill` tinyint(1) NOT NULL,
  `ilmu` tinyint(1) NOT NULL,
  `pengalaman` tinyint(1) NOT NULL,
  `pengelolaan` tinyint(1) NOT NULL,
  `kesan` text NOT NULL,
  `kendala` text NOT NULL,
  `masukan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umpan_balik`
--

INSERT INTO `umpan_balik` (`id_formulir`, `softskill`, `ilmu`, `pengalaman`, `pengelolaan`, `kesan`, `kendala`, `masukan`) VALUES
(4, 4, 4, 4, 4, 'dDKJH', 'UFHKJAH', 'JFAA');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nim_nik` char(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nim_nik`, `nama`, `username`, `password`, `role`, `jurusan`) VALUES
('1111111111', 'Mahasiswa Satu', 'mhs1.1111111111', 'c3ec0f7b054e729c5a716c8125839829', 'Mahasiswa', ''),
('2222222222', 'Mahasiswa Dua', 'mhs2.2222222222', 'c3ec0f7b054e729c5a716c8125839829', 'Mahasiswa', ''),
('3333333333', 'Mahasiswa Tiga', 'mhs3.3333333333', 'c3ec0f7b054e729c5a716c8125839829', 'Mahasiswa', ''),
('4444444444', 'Mahasiswa Empat', 'mhs4.4444444444', 'c3ec0f7b054e729c5a716c8125839829', 'Mahasiswa', ''),
('5555555555', 'Mahasiswa Lima', 'mhs5.5555555555', 'c3ec0f7b054e729c5a716c8125839829', 'Mahasiswa', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_formulir` (`id_formulir`),
  ADD KEY `nim_anggota` (`nim_anggota`);

--
-- Indexes for table `assign_dospem`
--
ALTER TABLE `assign_dospem`
  ADD KEY `id_formulir` (`id_formulir`),
  ADD KEY `nik_dospem` (`nik_dospem`);

--
-- Indexes for table `formulir`
--
ALTER TABLE `formulir`
  ADD PRIMARY KEY (`id_formulir`),
  ADD KEY `nim_mhs` (`nim`);

--
-- Indexes for table `laporan_akhir`
--
ALTER TABLE `laporan_akhir`
  ADD PRIMARY KEY (`id_laporan_akhir`),
  ADD KEY `id_formulir` (`id_formulir`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id_logbook`),
  ADD KEY `id_formulir` (`id_formulir`);

--
-- Indexes for table `matkul_prodi`
--
ALTER TABLE `matkul_prodi`
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `matkul_tujuan`
--
ALTER TABLE `matkul_tujuan`
  ADD PRIMARY KEY (`id_matkul_tujuan`),
  ADD KEY `id_formulir` (`id_formulir`),
  ADD KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `review_formulir`
--
ALTER TABLE `review_formulir`
  ADD PRIMARY KEY (`id_review_formulir`),
  ADD UNIQUE KEY `id_formulir` (`id_formulir`);

--
-- Indexes for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  ADD KEY `id_formulir` (`id_formulir`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nim_nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `formulir`
--
ALTER TABLE `formulir`
  MODIFY `id_formulir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `laporan_akhir`
--
ALTER TABLE `laporan_akhir`
  MODIFY `id_laporan_akhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id_logbook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `matkul_tujuan`
--
ALTER TABLE `matkul_tujuan`
  MODIFY `id_matkul_tujuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_formulir`) REFERENCES `formulir` (`id_formulir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`nim_anggota`) REFERENCES `user` (`nim_nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `formulir`
--
ALTER TABLE `formulir`
  ADD CONSTRAINT `formulir_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `user` (`nim_nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan_akhir`
--
ALTER TABLE `laporan_akhir`
  ADD CONSTRAINT `laporan_akhir_ibfk_1` FOREIGN KEY (`id_formulir`) REFERENCES `formulir` (`id_formulir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logbook`
--
ALTER TABLE `logbook`
  ADD CONSTRAINT `logbook_ibfk_1` FOREIGN KEY (`id_formulir`) REFERENCES `formulir` (`id_formulir`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matkul_tujuan`
--
ALTER TABLE `matkul_tujuan`
  ADD CONSTRAINT `matkul_tujuan_ibfk_1` FOREIGN KEY (`id_formulir`) REFERENCES `formulir` (`id_formulir`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matkul_tujuan_ibfk_2` FOREIGN KEY (`kode_matkul`) REFERENCES `matkul_prodi` (`kode_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `umpan_balik`
--
ALTER TABLE `umpan_balik`
  ADD CONSTRAINT `umpan_balik_ibfk_1` FOREIGN KEY (`id_formulir`) REFERENCES `formulir` (`id_formulir`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
