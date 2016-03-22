-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2016 at 01:27 PM
-- Server version: 5.5.47
-- PHP Version: 5.6.18-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_hardik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_files`
--

CREATE TABLE IF NOT EXISTS `tbl_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `filepath` varchar(200) NOT NULL,
  UNIQUE KEY `id_2` (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_files`
--

INSERT INTO `tbl_files` (`id`, `users_id`, `filepath`) VALUES
(1, 22, 'uploads/hardy/facebook.png'),
(2, 22, 'uploads/hardy/facebook.png'),
(3, 22, 'uploads/hardy/logo.png'),
(4, 22, 'uploads/hardy/facebook.png'),
(5, 22, 'uploads/hardy/facebook.png'),
(6, 22, 'uploads/hardy/img8.png'),
(7, 22, 'uploads/hardy/post.png'),
(8, 22, 'uploads/hardy/heading-img2.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_files`
--
ALTER TABLE `tbl_files`
  ADD CONSTRAINT `tbl_files_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
