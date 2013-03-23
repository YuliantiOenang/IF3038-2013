-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2013 at 03:51 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `progin_405_13510081`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `IDKategori` int(3) NOT NULL AUTO_INCREMENT,
  `judul` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`IDKategori`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`IDKategori`, `judul`, `username`) VALUES
(1, 'apapun', 'doraemon'),
(2, 'kalkulus', 'devin'),
(3, 'kamu', 'raymond'),
(4, 'putih', 'yuli');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `IDTask` int(3) NOT NULL,
  `IDKomentar` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `waktu` datetime NOT NULL,
  PRIMARY KEY (`IDKomentar`),
  KEY `IDTask` (`IDTask`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pelampiran`
--

CREATE TABLE IF NOT EXISTS `pelampiran` (
  `IDTugas` int(3) NOT NULL AUTO_INCREMENT,
  `lampiran` varchar(256) NOT NULL,
  KEY `IDTugas` (`IDTugas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pelampiran`
--

INSERT INTO `pelampiran` (`IDTugas`, `lampiran`) VALUES
(2, 'datetimepicker_css.js');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(256) NOT NULL DEFAULT 'avatar/0.jpg' COMMENT 'Ukuran Maks. 256 kB',
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `fullname`, `birthday`, `email`, `avatar`) VALUES
('devin', 'devin', 'devin hoesen', '2013-03-11', 'devin@hotmail.com', 'avatar/0.jpg'),
('doraemon', 'doraemon', 'doraemon', '2013-03-19', 'doraemon@dorem.com', 'avatar/0.jpg'),
('raymond', 'raymond', 'raymond lukanta', '2013-03-10', 'raymond@hotmail.com', 'avatar/0.jpg'),
('yuli', 'yuli', 'yulianti oenang', '2013-03-19', 'yuli@hotmail.com', 'avatar/0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penugasan`
--

CREATE TABLE IF NOT EXISTS `penugasan` (
  `username` varchar(30) NOT NULL,
  `IDTask` int(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`username`,`IDTask`),
  KEY `IDTask` (`IDTask`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `penugasan`
--

INSERT INTO `penugasan` (`username`, `IDTask`) VALUES
('raymond', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE IF NOT EXISTS `tugas` (
  `IDTask` int(3) NOT NULL AUTO_INCREMENT,
  `IDKategori` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `deadline` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `tag` varchar(256) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`IDTask`),
  KEY `IDKategori` (`IDKategori`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`IDTask`, `IDKategori`, `name`, `deadline`, `status`, `tag`, `username`) VALUES
(2, 1, 'a', '2013-03-12', 0, 'ku, mau', 'yuli');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`IDTask`) REFERENCES `tugas` (`IDTask`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelampiran`
--
ALTER TABLE `pelampiran`
  ADD CONSTRAINT `pelampiran_ibfk_1` FOREIGN KEY (`IDTugas`) REFERENCES `tugas` (`IDTask`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD CONSTRAINT `penugasan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penugasan_ibfk_2` FOREIGN KEY (`IDTask`) REFERENCES `tugas` (`IDTask`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`IDKategori`) REFERENCES `kategori` (`IDKategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tugas_ibfk_2` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
