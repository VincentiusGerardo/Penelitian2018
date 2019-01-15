-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2019 at 08:15 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portofolio_dosen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_ajar`
--

CREATE TABLE `bahan_ajar` (
  `ID_BAHAN_AJAR` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `MATA_KULIAH` text,
  `PROGRAM` varchar(50) DEFAULT NULL,
  `JENIS` enum('CETAK','NON CETAK') DEFAULT NULL,
  `SEMESTER` enum('GANJIL','GENAP') DEFAULT NULL,
  `TAHUN` year(4) DEFAULT NULL,
  `PENUGASAN` text,
  `BUKTI_KINERJA` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_ajar`
--

INSERT INTO `bahan_ajar` (`ID_BAHAN_AJAR`, `NIP_NIK`, `MATA_KULIAH`, `PROGRAM`, `JENIS`, `SEMESTER`, `TAHUN`, `PENUGASAN`, `BUKTI_KINERJA`) VALUES
(1, 'L15360', 'Database', 'S1', 'CETAK', 'GANJIL', 2018, NULL, NULL),
(2, 'L15360', 'Introduction to Web Programming', 'S1', 'CETAK', 'GANJIL', 2016, 'Peugasan_Introduction to Web Programming_L15360_Ga', 'Bukti_Kinerja_Introduction to Web Programming_L153'),
(3, 'L15360', 'Introduction to Information and Communication Tech', 'S1', 'CETAK', 'GANJIL', 2015, 'Peugasan_Introduction to Information and Communication Technology_L15360_Ganjil_2015', 'Bukti_Kinerja_Introduction to Information and Communication Technology_L15360_Ganjil_2015'),
(4, 'L15360', 'Introduction to Information and Communication Technology', 'S1', 'CETAK', 'GANJIL', 2015, 'Peugasan_Introduction to Information and Communication Technology_L15360_Ganjil_2015', 'Bukti_Kinerja_Introduction to Information and Communication Technology_L15360_Ganjil_2015'),
(5, 'L15360', 'Introduction to Information and Communication Technology', 'S1', 'CETAK', 'GANJIL', 2015, 'Peugasan_Introduction_to_Information_and_Communication_Technology_L15360_Ganjil_2015', 'Bukti_Kinerja_Introduction_to_Information_and_Communication_Technology_L15360_Ganjil_2015');

-- --------------------------------------------------------

--
-- Table structure for table `identitas_diri`
--

CREATE TABLE `identitas_diri` (
  `NIP_NIK` varchar(20) NOT NULL,
  `NIDN` char(9) DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `TEMPAT_LAHIR` varchar(30) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `JENIS_KELAMIN` enum('L','P') DEFAULT NULL,
  `STATUS_PERKAWINAN` enum('Kawin','Belum Kawin','Duda','Janda') DEFAULT NULL,
  `AGAMA` varchar(20) DEFAULT NULL,
  `GOLONGAN` varchar(30) DEFAULT NULL,
  `JABATAN_AKADEMIK` enum('TP','AA','L','LK','GB') DEFAULT NULL,
  `PERGURUAN_TINGGI` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas_diri`
--

INSERT INTO `identitas_diri` (`NIP_NIK`, `NIDN`, `NAMA`, `PASSWORD`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `JENIS_KELAMIN`, `STATUS_PERKAWINAN`, `AGAMA`, `GOLONGAN`, `JABATAN_AKADEMIK`, `PERGURUAN_TINGGI`, `ALAMAT`, `EMAIL`) VALUES
('0000', NULL, 'Jullend Gatc', '$2y$10$1xLuG8FOa13cFGj33Qs5TuZFyhWJW43gElc3IIXbniONgOSf8CVXm', NULL, '2018-11-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('L15333', NULL, 'Ivanne Hilda Sionita Simanjuntak', '$2y$10$AGuHHbMDr599VeN8MMRJo.yFvme9sLlp0KUqGJ5wr4WoOpSEhQdv.', NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('L15360', '', 'Jullend Gatc', '$2y$10$2KM2YdqT2eJWGbdhWebU9OdfvCqt9TPviajN5ODYbXaLE5UGzPaYO', 'Palangka Raya', '2018-02-06', 'L', 'Belum Kawin', 'Budha', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_kemahasiswaan`
--

CREATE TABLE `kegiatan_kemahasiswaan` (
  `ID_KEGIATAN` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `PERAN_JABATAN` varchar(100) DEFAULT NULL,
  `TANGGAL_MULAI` date DEFAULT NULL,
  `TANGGAL_AKHIR` date DEFAULT NULL,
  `INSTITUSI` varchar(200) DEFAULT NULL,
  `PENUGASAN` text,
  `BUKTI_KINERJA` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_kemahasiswaan`
--

INSERT INTO `kegiatan_kemahasiswaan` (`ID_KEGIATAN`, `NIP_NIK`, `PERAN_JABATAN`, `TANGGAL_MULAI`, `TANGGAL_AKHIR`, `INSTITUSI`, `PENUGASAN`, `BUKTI_KINERJA`) VALUES
(1, 'L15360', 'Anggota pelaksana', '2018-12-18', '2018-12-22', 'Kalbis', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organisasi_profesi`
--

CREATE TABLE `organisasi_profesi` (
  `ID_ORGANISASI` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `TANGGAL_MULAI` date DEFAULT NULL,
  `TANGGAL_AKHIR` date DEFAULT NULL,
  `JENIS_NAMA` varchar(200) DEFAULT NULL,
  `JABATAN` varchar(100) DEFAULT NULL,
  `NOMOR` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisasi_profesi`
--

INSERT INTO `organisasi_profesi` (`ID_ORGANISASI`, `NIP_NIK`, `TANGGAL_MULAI`, `TANGGAL_AKHIR`, `JENIS_NAMA`, `JABATAN`, `NOMOR`) VALUES
(4, 'L15360', '2018-12-20', '2018-12-21', 'Kalbis Institute keren', 'Rektor', '4_organisasi_L15360');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `ID_PEMBIMBING` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `NIM` varchar(15) DEFAULT NULL,
  `SEMESTER` enum('Ganjil','Genap') DEFAULT NULL,
  `TAHUN` year(4) DEFAULT NULL,
  `PROGRAM` varchar(50) DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `PERANAN` enum('Ketua','Anggota') DEFAULT NULL,
  `SK` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`ID_PEMBIMBING`, `NIP_NIK`, `NAMA`, `NIM`, `SEMESTER`, `TAHUN`, `PROGRAM`, `JUDUL`, `PERANAN`, `SK`) VALUES
(4, 'L15360', 'annisa', '2015019203', 'Genap', 2019, 'Sarjana', 'Hebat', 'Ketua', '4_pembimbing_L15360');

-- --------------------------------------------------------

--
-- Table structure for table `penelitian`
--

CREATE TABLE `penelitian` (
  `ID_PENELITIAN` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `TAHUN` year(4) DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `PERANAN` enum('Ketua','Anggota') DEFAULT NULL,
  `SUMBER_DANA` varchar(100) DEFAULT NULL,
  `SURAT_TUGAS` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penelitian`
--

INSERT INTO `penelitian` (`ID_PENELITIAN`, `NIP_NIK`, `TAHUN`, `JUDUL`, `PERANAN`, `SUMBER_DANA`, `SURAT_TUGAS`) VALUES
(1, 'L15360', 2018, 'hebatsz', 'Anggota', 'DIKTI', 'L15360_2018_hebats');

-- --------------------------------------------------------

--
-- Table structure for table `pengajaran`
--

CREATE TABLE `pengajaran` (
  `ID_PENGAJARAN` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `MATA_KULIAH` text,
  `PROGRAM_PENDIDIKAN` varchar(50) DEFAULT NULL,
  `INSTITUSI` varchar(50) DEFAULT NULL,
  `JURUSAN` varchar(50) DEFAULT NULL,
  `PROGRAM_STUDI` varchar(50) DEFAULT NULL,
  `SEMESTER` enum('GANJIL','GENAP') DEFAULT NULL,
  `TAHUN_AKADEMIK` year(4) DEFAULT NULL,
  `TanggalSK` date NOT NULL,
  `SK` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajaran`
--

INSERT INTO `pengajaran` (`ID_PENGAJARAN`, `NIP_NIK`, `MATA_KULIAH`, `PROGRAM_PENDIDIKAN`, `INSTITUSI`, `JURUSAN`, `PROGRAM_STUDI`, `SEMESTER`, `TAHUN_AKADEMIK`, `TanggalSK`, `SK`) VALUES
(1, 'L15360', 'Programming', 'S1', 'Kalbis', 'Komputer', 'SI', 'GANJIL', 2018, '0000-00-00', NULL),
(3, 'L15360', 'Analisis Data Dasar', 'Sarjana', 'Kalbis Institute', 'asdasdad', 'Sistem Informasi', 'GENAP', 2019, '2019-01-15', 'sk_Sarjana_L15360');

-- --------------------------------------------------------

--
-- Table structure for table `pengelolaan_institusi`
--

CREATE TABLE `pengelolaan_institusi` (
  `ID_PENGELOLAAN_INSTITUSI` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `PERAN_JABATAN` varchar(100) DEFAULT NULL,
  `TANGGAL_MULAI` date DEFAULT NULL,
  `TANGGAL_AKHIR` date DEFAULT NULL,
  `INSTITUSI` varchar(200) DEFAULT NULL,
  `SK` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengelolaan_institusi`
--

INSERT INTO `pengelolaan_institusi` (`ID_PENGELOLAAN_INSTITUSI`, `NIP_NIK`, `PERAN_JABATAN`, `TANGGAL_MULAI`, `TANGGAL_AKHIR`, `INSTITUSI`, `SK`) VALUES
(1, 'L15360', 'Rektor', '2018-12-18', '2018-12-29', 'Kalbis', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penghargaan`
--

CREATE TABLE `penghargaan` (
  `ID_PENGHARGAAN` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `TANGGAL` date DEFAULT NULL,
  `BENTUK` varchar(200) DEFAULT NULL,
  `PEMBERI` varchar(200) DEFAULT NULL,
  `SERTIFIKAT` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghargaan`
--

INSERT INTO `penghargaan` (`ID_PENGHARGAAN`, `NIP_NIK`, `TANGGAL`, `BENTUK`, `PEMBERI`, `SERTIFIKAT`) VALUES
(1, 'L15360', '2018-12-05', 'Sertifikat kerens', 'Kalbis ins', 'L15360_Sertifikat_Kalbis'),
(2, 'L15360', '2012-12-31', 'Sertifikat', 'Kalbis', 'L15360_Sertifikat_Kalbis'),
(3, 'L15360', '2018-11-25', 'Sertifikat', 'Kalbis', 'L15360_Sertifikat_Kalbis');

-- --------------------------------------------------------

--
-- Table structure for table `penguji`
--

CREATE TABLE `penguji` (
  `ID_PENGUJI` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `NIM` varchar(15) DEFAULT NULL,
  `SEMESTER` enum('Ganjil','Genap') DEFAULT NULL,
  `TAHUN` year(4) DEFAULT NULL,
  `PROGRAM` varchar(50) DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `PERANAN` enum('Ketua','Anggota') DEFAULT NULL,
  `SK` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penguji`
--

INSERT INTO `penguji` (`ID_PENGUJI`, `NIP_NIK`, `NAMA`, `NIM`, `SEMESTER`, `TAHUN`, `PROGRAM`, `JUDUL`, `PERANAN`, `SK`) VALUES
(3, 'L15360', 'ANNISAh', '2015101901', 'Genap', 2019, 'Sarjana', 'Penelitian Hebat', 'Ketua', '3_penguji_L15360');

-- --------------------------------------------------------

--
-- Table structure for table `pkm`
--

CREATE TABLE `pkm` (
  `ID_PKM` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `TANGGAL` date DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `MITRA` varchar(100) DEFAULT NULL,
  `TEMPAT` varchar(100) DEFAULT NULL,
  `PERANAN` enum('Ketua','Anggota') DEFAULT NULL,
  `PENUGASAN` text,
  `BUKTI_KINERJA` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pkm`
--

INSERT INTO `pkm` (`ID_PKM`, `NIP_NIK`, `TANGGAL`, `NAMA`, `MITRA`, `TEMPAT`, `PERANAN`, `PENUGASAN`, `BUKTI_KINERJA`) VALUES
(1, 'L15360', '2018-12-18', 'Seminar pakai excel', 'Guru PAUD', 'Bekasi', 'Anggota', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `ID_PUBLIKASI` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `TANGGAL` date DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `JENIS` enum('Jurnal','Prosiding','HAKI') DEFAULT NULL,
  `JURNAL` varchar(50) DEFAULT NULL,
  `PENERBIT` varchar(50) DEFAULT NULL,
  `NOMOR` varchar(10) DEFAULT NULL,
  `VOLUME` varchar(10) DEFAULT NULL,
  `ISSN` varchar(15) DEFAULT NULL,
  `ISBN` varchar(15) DEFAULT NULL,
  `KONFERENSI` varchar(200) DEFAULT NULL,
  `TEMPAT` varchar(100) DEFAULT NULL,
  `PERANAN` enum('Ketua','Anggota') DEFAULT NULL,
  `PENUGASAN` text,
  `BUKTI_KINERJA` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publikasi`
--

INSERT INTO `publikasi` (`ID_PUBLIKASI`, `NIP_NIK`, `TANGGAL`, `JUDUL`, `JENIS`, `JURNAL`, `PENERBIT`, `NOMOR`, `VOLUME`, `ISSN`, `ISBN`, `KONFERENSI`, `TEMPAT`, `PERANAN`, `PENUGASAN`, `BUKTI_KINERJA`) VALUES
(1, 'L15360', '2018-12-18', 'Penelitian Malaria', 'Jurnal', 'Jurnal Malaria', 'Kalbis', 'xxxx-123', '1', 'x-x-x-x', 'x-x-x-x', NULL, NULL, 'Ketua', NULL, NULL),
(2, 'L15360', '2018-12-11', 'Penelitian Padi', 'Prosiding', NULL, NULL, NULL, NULL, NULL, NULL, 'Konferensi Padi', 'Bogor', 'Anggota', NULL, NULL),
(3, 'L15360', '2018-12-05', 'Penelitian Satelit', 'HAKI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ketua', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `ID_PENDIDIKAN` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `PROGRAM` enum('DIPLOMA','SARJANA','MAGISTER','SPESIALIS','DOKTOR') DEFAULT NULL,
  `TAHUN` year(4) DEFAULT NULL,
  `PERGURUAN_TINGGI` varchar(50) DEFAULT NULL,
  `JURUSAN` varchar(50) DEFAULT NULL,
  `IJASAH` text,
  `TRANSKRIP` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_pendidikan`
--

INSERT INTO `riwayat_pendidikan` (`ID_PENDIDIKAN`, `NIP_NIK`, `PROGRAM`, `TAHUN`, `PERGURUAN_TINGGI`, `JURUSAN`, `IJASAH`, `TRANSKRIP`) VALUES
(1, 'L15360', 'DIPLOMA', 2012, 'Kalbis Institute', 'SI', 'Ijazah_Diploma_L15360', 'Transkrip_Diploma_L15360'),
(2, 'L15360', 'SARJANA', 2014, 'UI', 'TI', 'Ijazah_Sarjana_L15360', 'Transkrip_Sarjana_L15360'),
(3, 'L15360', 'MAGISTER', 2015, 'ITB', 'IT', 'Ijazah_Magister_L15360', 'Transkrip_Magister_L15360');

-- --------------------------------------------------------

--
-- Table structure for table `seminar_workshop`
--

CREATE TABLE `seminar_workshop` (
  `ID_SEMINAR` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `TANGGAL` date DEFAULT NULL,
  `JENIS` enum('Seminar','Konferensi','Lokakarya','Simposium') DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `PENYELENGGARA` varchar(200) DEFAULT NULL,
  `PERANAN` enum('Panitia','Peserta','Pembicara') DEFAULT NULL,
  `PENUGASAN` text,
  `BUKTI_KINERJA` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seminar_workshop`
--

INSERT INTO `seminar_workshop` (`ID_SEMINAR`, `NIP_NIK`, `TANGGAL`, `JENIS`, `JUDUL`, `PENYELENGGARA`, `PERANAN`, `PENUGASAN`, `BUKTI_KINERJA`) VALUES
(1, 'L15360', '2018-12-18', 'Seminar', 'Seminar Malaria', 'Kalbis', 'Panitia', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_ajar`
--
ALTER TABLE `bahan_ajar`
  ADD PRIMARY KEY (`ID_BAHAN_AJAR`);

--
-- Indexes for table `identitas_diri`
--
ALTER TABLE `identitas_diri`
  ADD PRIMARY KEY (`NIP_NIK`);

--
-- Indexes for table `kegiatan_kemahasiswaan`
--
ALTER TABLE `kegiatan_kemahasiswaan`
  ADD PRIMARY KEY (`ID_KEGIATAN`);

--
-- Indexes for table `organisasi_profesi`
--
ALTER TABLE `organisasi_profesi`
  ADD PRIMARY KEY (`ID_ORGANISASI`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`ID_PEMBIMBING`);

--
-- Indexes for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD PRIMARY KEY (`ID_PENELITIAN`);

--
-- Indexes for table `pengajaran`
--
ALTER TABLE `pengajaran`
  ADD PRIMARY KEY (`ID_PENGAJARAN`);

--
-- Indexes for table `pengelolaan_institusi`
--
ALTER TABLE `pengelolaan_institusi`
  ADD PRIMARY KEY (`ID_PENGELOLAAN_INSTITUSI`);

--
-- Indexes for table `penghargaan`
--
ALTER TABLE `penghargaan`
  ADD PRIMARY KEY (`ID_PENGHARGAAN`);

--
-- Indexes for table `penguji`
--
ALTER TABLE `penguji`
  ADD PRIMARY KEY (`ID_PENGUJI`);

--
-- Indexes for table `pkm`
--
ALTER TABLE `pkm`
  ADD PRIMARY KEY (`ID_PKM`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`ID_PUBLIKASI`);

--
-- Indexes for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`ID_PENDIDIKAN`);

--
-- Indexes for table `seminar_workshop`
--
ALTER TABLE `seminar_workshop`
  ADD PRIMARY KEY (`ID_SEMINAR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_ajar`
--
ALTER TABLE `bahan_ajar`
  MODIFY `ID_BAHAN_AJAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kegiatan_kemahasiswaan`
--
ALTER TABLE `kegiatan_kemahasiswaan`
  MODIFY `ID_KEGIATAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organisasi_profesi`
--
ALTER TABLE `organisasi_profesi`
  MODIFY `ID_ORGANISASI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `ID_PEMBIMBING` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penelitian`
--
ALTER TABLE `penelitian`
  MODIFY `ID_PENELITIAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengajaran`
--
ALTER TABLE `pengajaran`
  MODIFY `ID_PENGAJARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengelolaan_institusi`
--
ALTER TABLE `pengelolaan_institusi`
  MODIFY `ID_PENGELOLAAN_INSTITUSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penghargaan`
--
ALTER TABLE `penghargaan`
  MODIFY `ID_PENGHARGAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penguji`
--
ALTER TABLE `penguji`
  MODIFY `ID_PENGUJI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pkm`
--
ALTER TABLE `pkm`
  MODIFY `ID_PKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `ID_PUBLIKASI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  MODIFY `ID_PENDIDIKAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seminar_workshop`
--
ALTER TABLE `seminar_workshop`
  MODIFY `ID_SEMINAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
