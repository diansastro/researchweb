-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2015 at 02:44 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `research`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE IF NOT EXISTS `jurnal` (
  `id_jurnal` int(100) NOT NULL AUTO_INCREMENT,
  `id_dosen` varchar(255) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `feature` longtext NOT NULL,
  `target` longtext NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `reInf` mediumtext NOT NULL,
  `Keywords` varchar(255) NOT NULL,
  `Kategori` int(100) NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jurnal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `id_dosen`, `Judul`, `feature`, `target`, `gambar`, `reInf`, `Keywords`, `Kategori`, `time`) VALUES
(1, '1', 'Drug Delivery System for Retinal Protection', 'Intraviteal injection of some drugs to treat retinal diseases has been success-fully reported. However, there is a possibility of severe side effects, such as infection. So we have developed a transsceral drug delivery system by using non-biodegradable device, we can deliver the multi-drug independently. We have performed our work in collaboration with Department of Bioengineering and Robotics.', 'Using this drug delivery, we may be able to apply our system not only to the retinal diseases but also to other diseases.\r\nFor clinical application, we hope the collaboration with companies and organizations from the points of materials and original drug delivery to the focal regions', '', '', 'retina, device, eye diseases, drug delivery system', 1, '09/09/10  |  11:00 AM'),
(2, '1', 'Drug Delivery System for Retinal Protection (2) ', 'Intraviteal injection of some drugs to treat retinal diseases has been success-fully reported. However, there is a possibility of severe side effects, such as infection. So we have developed a transsceral drug delivery system by using non-biodegradable device, we can deliver the multi-drug independently. We have performed our work in collaboration with Department of Bioengineering and Robotics.  ', ' Using this drug delivery, we may be able to apply our system not only to the retinal diseases but also to other diseases. For clinical application, we hope the collaboration with companies and organizations from the points of materials and original drug delivery to the focal regions ', '2', ' ', 'retina, device, eye diseases, drug delivery system\r\n', 1, '09/09/09  |  08:00 PM ');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kode` int(100) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kode`, `kategori`, `icon`) VALUES
(1, 'Life Science', ''),
(2, 'Information Communication', ''),
(3, 'Environtment', ''),
(4, 'Nanotechnology / Materials', ''),
(5, 'Energy', ''),
(6, 'Manufacturing Technology', ''),
(7, 'Social Infrastructure', ''),
(8, 'Frontier', ''),
(9, 'Liberal Arts', '');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_jurnal` int(100) NOT NULL,
  `id_komentar` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tanggal_waktu` varchar(255) NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `kode` int(4) NOT NULL,
  `id` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `stat` varchar(10) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cp` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kode`, `id`, `name`, `password`, `stat`, `Department`, `title`, `email`, `cp`, `foto`) VALUES
(0, 'admin', 'admin', 'admin', 'Admin', '', '', '', '', ''),
(1, 'D42112009', 'Widyantoko', 'muallim', 'Dosen', 'Hasanuddin University', 'C.ST', 'mhaerul50@gmail.com', '085217822777', '1'),
(2, 'D42112999', 'Yahya Bustaman', 'yahya', 'Dosen', 'Cariuangjatuh.com', 'Boss nya', 'tes@gmail.com', '', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
