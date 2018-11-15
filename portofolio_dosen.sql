-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Nov 2018 pada 16.08
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

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
-- Struktur dari tabel `bahan_ajar`
--

CREATE TABLE `bahan_ajar` (
  `MATA_KULIAH` varchar(50) DEFAULT NULL,
  `PROGRAM` varchar(50) DEFAULT NULL,
  `JENIS` varchar(9) DEFAULT NULL,
  `SEMESTER` varchar(5) DEFAULT NULL,
  `TAHUN` int(4) DEFAULT NULL,
  `PENUGASAN` varchar(50) DEFAULT NULL,
  `BUKTI_KINERJA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas_diri`
--

CREATE TABLE `identitas_diri` (
  `NAMA` varchar(50) DEFAULT NULL,
  `NIDN` char(9) DEFAULT NULL,
  `NIP_NIK` varchar(20) DEFAULT NULL,
  `TEMPAT_LAHIR` varchar(30) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `JENIS_KELAMIN` char(1) DEFAULT NULL,
  `STATUS_PERKAWINAN` varchar(5) DEFAULT NULL,
  `AGAMA` varchar(20) DEFAULT NULL,
  `GOLONGAN` varchar(30) DEFAULT NULL,
  `JABATAN_AKADEMIK` varchar(2) DEFAULT NULL,
  `PERGURUAN_TINGGI` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_kemahasiswaan`
--

CREATE TABLE `kegiatan_kemahasiswaan` (
  `PERAN_JABATAN` varchar(100) DEFAULT NULL,
  `TANGGAL_MULAI` date DEFAULT NULL,
  `TANGGAL_AKHIR` date DEFAULT NULL,
  `INSTITUSI` varchar(200) DEFAULT NULL,
  `PENUGASAN` varchar(50) DEFAULT NULL,
  `BUKTI_KINERJA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `organisasi_profesi`
--

CREATE TABLE `organisasi_profesi` (
  `TANGGAL_MULAI` date DEFAULT NULL,
  `TANGGAL_AKHIR` date DEFAULT NULL,
  `JENIS_NAMA` varchar(200) DEFAULT NULL,
  `JABATAN` varchar(100) DEFAULT NULL,
  `NOMOR` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing`
--

CREATE TABLE `pembimbing` (
  `NAMA` varchar(50) DEFAULT NULL,
  `NIM` varchar(15) DEFAULT NULL,
  `SEMESTER` varchar(5) DEFAULT NULL,
  `TAHUN` int(4) DEFAULT NULL,
  `PROGRAM` varchar(50) DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `PERANAN` varchar(7) DEFAULT NULL,
  `SK` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penelitian`
--

CREATE TABLE `penelitian` (
  `TAHUN` int(4) DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `PERANAN` varchar(7) DEFAULT NULL,
  `SUMBER_DANA` varchar(100) DEFAULT NULL,
  `SURAT_TUGAS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajaran`
--

CREATE TABLE `pengajaran` (
  `MATA_KULIAH` varchar(50) DEFAULT NULL,
  `PROGRAM_PENDIDIKAN` varchar(50) DEFAULT NULL,
  `INSTITUSI` varchar(50) DEFAULT NULL,
  `JURUSAN` varchar(50) DEFAULT NULL,
  `PROGRAM_STUDI` varchar(50) DEFAULT NULL,
  `SEMESTER` char(5) DEFAULT NULL,
  `TAHUN_AKADEMIK` int(4) DEFAULT NULL,
  `SK` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelolaan_institusi`
--

CREATE TABLE `pengelolaan_institusi` (
  `PERAN_JABATAN` varchar(100) DEFAULT NULL,
  `TANGGAL_MULAI` date DEFAULT NULL,
  `TANGGAL_AKHIR` date DEFAULT NULL,
  `INSTITUSI` varchar(200) DEFAULT NULL,
  `SK` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghargaan`
--

CREATE TABLE `penghargaan` (
  `TANGGAL` date DEFAULT NULL,
  `BENTUK` varchar(200) DEFAULT NULL,
  `PEMBERI` varchar(200) DEFAULT NULL,
  `SERTIFIKAT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penguji`
--

CREATE TABLE `penguji` (
  `NAMA` varchar(50) DEFAULT NULL,
  `NIM` varchar(15) DEFAULT NULL,
  `SEMESTER` varchar(5) DEFAULT NULL,
  `TAHUN` int(4) DEFAULT NULL,
  `PROGRAM` varchar(50) DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `PERANAN` varchar(7) DEFAULT NULL,
  `SK` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pkm`
--

CREATE TABLE `pkm` (
  `TANGGAL` date DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `MITRA` varchar(100) DEFAULT NULL,
  `TEMPAT` varchar(100) DEFAULT NULL,
  `PERANAN` varchar(7) DEFAULT NULL,
  `PENUGASAN` varchar(50) DEFAULT NULL,
  `BUKTI_KINERJA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `publikasi`
--

CREATE TABLE `publikasi` (
  `TANGGAL` date DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `JENIS` varchar(9) DEFAULT NULL,
  `JURNAL` varchar(50) DEFAULT NULL,
  `PENERBIT` varchar(50) DEFAULT NULL,
  `NOMOR` varchar(10) DEFAULT NULL,
  `VOLUME` varchar(10) DEFAULT NULL,
  `ISSN` varchar(15) DEFAULT NULL,
  `ISBN` varchar(15) DEFAULT NULL,
  `KONFERENSI` varchar(200) DEFAULT NULL,
  `TEMPAT` varchar(100) DEFAULT NULL,
  `PENANAN` varchar(7) DEFAULT NULL,
  `PENUGASAN` varchar(50) DEFAULT NULL,
  `BUKTI_KINERJA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `PROGRAM` varchar(19) DEFAULT NULL,
  `TAHUN` int(4) DEFAULT NULL,
  `PERGURUAN_TINGGI` varchar(50) DEFAULT NULL,
  `JURUSAN` varchar(50) DEFAULT NULL,
  `IJASAH` varchar(20) DEFAULT NULL,
  `TRANSKRIP` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `seminar_workshop`
--

CREATE TABLE `seminar_workshop` (
  `TANGGAL` date DEFAULT NULL,
  `JENIS` varchar(10) DEFAULT NULL,
  `JUDUL` varchar(200) DEFAULT NULL,
  `PENYELENGGARA` varchar(200) DEFAULT NULL,
  `PERANAN` varchar(9) DEFAULT NULL,
  `PENUGASAN` varchar(50) DEFAULT NULL,
  `BUKTI_KINERJA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
