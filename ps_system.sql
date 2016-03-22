-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 22, 2016 at 05:52 PM
-- Server version: 5.5.47
-- PHP Version: 5.6.18-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ps_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_records`
--

CREATE TABLE IF NOT EXISTS `student_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` varchar(250) NOT NULL,
  `branch_id` varchar(250) NOT NULL,
  `semester` varchar(250) NOT NULL,
  `student_name` varchar(250) NOT NULL,
  `subject_id` varchar(250) NOT NULL,
  `student_mark` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_img_path`
--

CREATE TABLE IF NOT EXISTS `tbl_img_path` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `img_path` varchar(200) NOT NULL,
  UNIQUE KEY `id_2` (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `add1` varchar(20) NOT NULL,
  `add2` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `zipcode` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `user_role` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `email`, `password`, `fname`, `lname`, `add1`, `add2`, `city`, `zipcode`, `state`, `country`, `user_role`) VALUES
(1, 'admin', 'admin@admin.com', 'cb8ec9242139da6b09c5dfb978b6895c', '', '', '', '', '', '', '', '', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_img_path`
--
ALTER TABLE `tbl_img_path`
  ADD CONSTRAINT `tbl_img_path_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
