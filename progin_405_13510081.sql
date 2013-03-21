-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 10. Maret 2013 jam 02:45
-- Versi Server: 5.5.8
-- Versi PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `progin_405_13510081`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `IDKategori` char(15) NOT NULL COMMENT 'Format YYMMDDhhmmssxxx',
  `judul` varchar(30) NOT NULL,
  PRIMARY KEY (`IDKategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `IDTask` char(15) NOT NULL,
  `IDKomentar` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`IDTask`,`IDKomentar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `pelampiran`
--

CREATE TABLE IF NOT EXISTS `pelampiran` (
  `IDTugas` char(15) NOT NULL,
  `lampiran` varchar(256) NOT NULL,
  KEY `IDTugas` (`IDTugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelampiran`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(256) DEFAULT NULL COMMENT 'Ukuran Maks. 256 kB',
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `penugasan`
--

CREATE TABLE IF NOT EXISTS `penugasan` (
  `username` varchar(30) NOT NULL,
  `IDTask` char(15) NOT NULL,
  PRIMARY KEY (`username`,`IDTask`),
  KEY `IDTask` (`IDTask`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penugasan`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE IF NOT EXISTS `tugas` (
  `IDTask` char(15) NOT NULL,
  `IDKategori` char(15) NOT NULL,
  `name` varchar(30) NOT NULL,
  `deadline` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `tag` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`IDTask`),
  KEY `IDKategori` (`IDKategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas`
--


--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`IDTask`) REFERENCES `tugas` (`IDTask`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelampiran`
--
ALTER TABLE `pelampiran`
  ADD CONSTRAINT `pelampiran_ibfk_1` FOREIGN KEY (`IDTugas`) REFERENCES `tugas` (`IDTask`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penugasan`
--
ALTER TABLE `penugasan`
  ADD CONSTRAINT `penugasan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penugasan_ibfk_2` FOREIGN KEY (`IDTask`) REFERENCES `tugas` (`IDTask`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`IDKategori`) REFERENCES `kategori` (`IDKategori`) ON DELETE CASCADE ON UPDATE CASCADE;
