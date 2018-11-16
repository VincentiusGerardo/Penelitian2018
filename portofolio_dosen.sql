-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2018 at 12:11 PM
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
  `MATA_KULIAH` varchar(50) DEFAULT NULL,
  `PROGRAM` varchar(50) DEFAULT NULL,
  `JENIS` enum('CETAK','NON CETAK') DEFAULT NULL,
  `SEMESTER` enum('GANJIL','GENAP') DEFAULT NULL,
  `TAHUN` int(4) DEFAULT NULL,
  `PENUGASAN` varchar(50) DEFAULT NULL,
  `BUKTI_KINERJA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `STATUS_PERKAWINAN` enum('KAWIN','BELUM KAWIN','DUDA','JANDA') DEFAULT NULL,
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
('0000', NULL, 'Jullend Gatc', '$2y$10$1xLuG8FOa13cFGj33Qs5TuZFyhWJW43gElc3IIXbniONgOSf8CVXm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('L15333', NULL, 'Ivanne Hilda Sionita Simanjuntak', '$2y$10$AGuHHbMDr599VeN8MMRJo.yFvme9sLlp0KUqGJ5wr4WoOpSEhQdv.', NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('L15360', NULL, 'Jullend Gatc', '$2y$10$2KM2YdqT2eJWGbdhWebU9OdfvCqt9TPviajN5ODYbXaLE5UGzPaYO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `PENUGASAN` varchar(50) DEFAULT NULL,
  `BUKTI_KINERJA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `NOMOR` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `ID_PEMBIMBING` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `NIM` varchar(15) DEFAULT NULL,
  `SEMESTER` enum('GANJIL','GENAP') DEFAULT NULL,
  `TAHUN` int(4) DEFAULT NULL,
  `PROGRAM` varchar(50) DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `PERANAN` enum('KETUA','ANGGOTA') DEFAULT NULL,
  `SK` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penelitian`
--

CREATE TABLE `penelitian` (
  `ID_PENELITIAN` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `TAHUN` int(4) DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `PERANAN` enum('KETUA','ANGGOTA') DEFAULT NULL,
  `SUMBER_DANA` varchar(100) DEFAULT NULL,
  `SURAT_TUGAS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajaran`
--

CREATE TABLE `pengajaran` (
  `ID_PENGAJARAN` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `MATA_KULIAH` varchar(50) DEFAULT NULL,
  `PROGRAM_PENDIDIKAN` varchar(50) DEFAULT NULL,
  `INSTITUSI` varchar(50) DEFAULT NULL,
  `JURUSAN` varchar(50) DEFAULT NULL,
  `PROGRAM_STUDI` varchar(50) DEFAULT NULL,
  `SEMESTER` enum('GANJIL','GENAP') DEFAULT NULL,
  `TAHUN_AKADEMIK` int(4) DEFAULT NULL,
  `SK` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `SK` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `SERTIFIKAT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penguji`
--

CREATE TABLE `penguji` (
  `ID_PENGUJI` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `NIM` varchar(15) DEFAULT NULL,
  `SEMESTER` enum('GANJIL','GENAP') DEFAULT NULL,
  `TAHUN` int(4) DEFAULT NULL,
  `PROGRAM` varchar(50) DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `PERANAN` enum('KETUA','ANGGOTA') DEFAULT NULL,
  `SK` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `PERANAN` enum('KETUA','ANGGOTA') DEFAULT NULL,
  `PENUGASAN` varchar(50) DEFAULT NULL,
  `BUKTI_KINERJA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `ID_PUBLIKASI` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `TANGGAL` date DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `JENIS` enum('JURNAL','PROSIDING','HAKI') DEFAULT NULL,
  `JURNAL` varchar(50) DEFAULT NULL,
  `PENERBIT` varchar(50) DEFAULT NULL,
  `NOMOR` varchar(10) DEFAULT NULL,
  `VOLUME` varchar(10) DEFAULT NULL,
  `ISSN` varchar(15) DEFAULT NULL,
  `ISBN` varchar(15) DEFAULT NULL,
  `KONFERENSI` varchar(200) DEFAULT NULL,
  `TEMPAT` varchar(100) DEFAULT NULL,
  `PENANAN` enum('KETUA','ANGGOTA') DEFAULT NULL,
  `PENUGASAN` varchar(50) DEFAULT NULL,
  `BUKTI_KINERJA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `ID_PENDIDIKAN` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `PROGRAM` enum('DIPLOMA','SARJANA','MAGISTER','SPESIALIS','DOKTOR') DEFAULT NULL,
  `TAHUN` int(4) DEFAULT NULL,
  `PERGURUAN_TINGGI` varchar(50) DEFAULT NULL,
  `JURUSAN` varchar(50) DEFAULT NULL,
  `IJASAH` text,
  `TRANSKRIP` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seminar_workshop`
--

CREATE TABLE `seminar_workshop` (
  `ID_SEMINAR` int(11) NOT NULL,
  `NIP_NIK` varchar(20) NOT NULL,
  `TANGGAL` date DEFAULT NULL,
  `JENIS` enum('SEMINAR','KONFERENSI','LOKAKARYA','SIMPOSIUM') DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `PENYELENGGARA` varchar(200) DEFAULT NULL,
  `PERANAN` enum('PANITIA','PESERTA','PEMBICARA') DEFAULT NULL,
  `PENUGASAN` varchar(50) DEFAULT NULL,
  `BUKTI_KINERJA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `ID_BAHAN_AJAR` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan_kemahasiswaan`
--
ALTER TABLE `kegiatan_kemahasiswaan`
  MODIFY `ID_KEGIATAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organisasi_profesi`
--
ALTER TABLE `organisasi_profesi`
  MODIFY `ID_ORGANISASI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `ID_PEMBIMBING` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penelitian`
--
ALTER TABLE `penelitian`
  MODIFY `ID_PENELITIAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajaran`
--
ALTER TABLE `pengajaran`
  MODIFY `ID_PENGAJARAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengelolaan_institusi`
--
ALTER TABLE `pengelolaan_institusi`
  MODIFY `ID_PENGELOLAAN_INSTITUSI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penghargaan`
--
ALTER TABLE `penghargaan`
  MODIFY `ID_PENGHARGAAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penguji`
--
ALTER TABLE `penguji`
  MODIFY `ID_PENGUJI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pkm`
--
ALTER TABLE `pkm`
  MODIFY `ID_PKM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `ID_PUBLIKASI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  MODIFY `ID_PENDIDIKAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seminar_workshop`
--
ALTER TABLE `seminar_workshop`
  MODIFY `ID_SEMINAR` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
