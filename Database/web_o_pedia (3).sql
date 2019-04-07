-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 23, 2018 at 05:05 AM
-- Server version: 5.5.11
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_o_pedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

DROP TABLE IF EXISTS `social`;
CREATE TABLE IF NOT EXISTS `social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `signupdate` varchar(100) NOT NULL,
  `profilepic` varchar(100) NOT NULL,
  `user_closed` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `signupdate`, `profilepic`, `user_closed`) VALUES
(12, 'Shivam', 'Chauhan', 'shivam_chauhan', 'Shivamchauhanksp@gmail.com', '3354045a397621cd92406f1f98cde292', 'May-07-2018 15:09:35', 'profile/head_red.png', 'NO'),
(14, 'Aman', 'Negi', 'aman_negi', 'Amannegi227@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'May-08-2018 10:59:55', 'profile/head_red.png', 'NO'),
(15, 'Anon', 'Anon', 'anon_anon', 'Amannegi111@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'May-08-2018 11:16:03', 'profile/head_red.png', 'NO'),
(16, 'Aman', 'Negi', 'aman_negi_1', 'Asdf@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'May-15-2018 09:18:21', 'profile/head_red.png', 'NO'),
(17, 'Jagpreet', 'Singh', 'jagpreet_singh', 'Jagpreet0127@gmail.com', 'd54d1702ad0f8326224b817c796763c9', 'May-17-2018 10:08:34', 'profile/head_red.png', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

DROP TABLE IF EXISTS `visitor`;
CREATE TABLE IF NOT EXISTS `visitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `secondname` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `datetime` varchar(100) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `register_id` int(11) NOT NULL,
  `valid_date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `register_id` (`register_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `firstname`, `secondname`, `contact`, `city`, `address`, `datetime`, `profile`, `register_id`, `valid_date`) VALUES
(11, 'thrn', 'dra', '987654345', 'ddn', 'fgkfgfk', 'May-08-2018 10:08:19', 'albert-einstein-creativity-secret-hd-1080P-wallpaper-middle-size.jpg', 12, '2018-05-24'),
(12, 'himanshu', 'aggarwal', '876543456', 'ddn', '56/ clement town dehradun', 'May-08-2018 10:27:27', 'albert-einstein-creativity-secret-hd-1080P-wallpaper-middle-size.jpg', 12, '2018-05-15'),
(13, 'aman', 'negi', '987654345', 'dehradun', 'dfdkje', 'May-08-2018 11:05:56', 'amannegi.jpg', 14, '2018-05-10'),
(15, 'aman ', 'negi', '98765435', 'ddn', 'ddddddkddkfffi', 'May-08-2018 11:35:34', 'amannegi.jpg', 15, '2018-05-16'),
(17, 'dhirendra singh', 'baffallow', '9876545673', 'ddn', 'cuttiya nager ki basti mai', 'May-17-2018 10:12:28', 'c724ea4ce57df889c42353a00f169187.jpg', 17, '2018-05-17');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `visitor`
--
ALTER TABLE `visitor`
  ADD CONSTRAINT `visitor_ibfk_1` FOREIGN KEY (`register_id`) REFERENCES `social` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
