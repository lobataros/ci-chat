-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2017 at 06:21 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `pengirim` varchar(15) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `teks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `pengirim`, `waktu`, `teks`) VALUES
(1, 'admin', '2017-05-22 15:53:30', 'Tes chat Admin'),
(2, 'moderator', '2017-05-22 15:53:39', 'Tes chat Moderator'),
(3, 'user', '2017-05-22 15:53:47', 'Hello World !'),
(4, 'admin', '2017-05-22 15:53:58', 'Hello Juga user :)'),
(5, 'moderator', '2017-05-13 18:47:34', 'HELLOW JUGA BROW'),
(7, 'admin', '2017-05-19 04:28:27', 'Hai gaes'),
(16, 'operator', '2017-05-22 16:01:41', 'tes hai :)'),
(17, 'admin', '2017-05-22 16:03:55', 'Halo juga operator'),
(18, 'operator', '2017-05-22 16:04:31', 'apa kabar ?'),
(19, 'reza', '2017-05-22 16:42:38', 'Halo'),
(20, 'admin', '2017-05-22 16:58:27', 'HALO SAYA ADMIN!'),
(21, 'tes', '2017-05-22 16:59:01', 'Halo ADMIN'),
(22, 'admin', '2017-05-22 17:12:54', 'HALO SALAM KENAL :)'),
(23, 'coba', '2017-05-22 17:13:19', 'Halo juga admin :)'),
(24, 'admin', '2017-05-22 17:25:12', 'Halo GOGO!'),
(25, 'gogo', '2017-05-22 17:25:42', 'Halo Juga Admin :)'),
(26, 'admin', '2017-05-23 22:49:44', 'HALO ROZI!'),
(27, 'rozi', '2017-05-23 22:50:14', 'Halo juga admin :)');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `akses` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user`, `nama`, `pass`, `status`, `akses`) VALUES
('admin', 'Administrator', 'admin', 1, 'ADMIN'),
('coba', 'coba', 'coba', 1, 'USER'),
('dimas', 'Dimas', 'dimas', 1, 'USER'),
('gogo', 'gogo', 'gogo', 1, 'USER'),
('moderator', 'Moderator', 'moderator', 1, 'USER'),
('operator', 'operator', 'operator', 1, 'USER'),
('reza', 'Reza', 'reza', 1, 'USER'),
('rozi', 'rozi', 'rozi', 1, 'USER'),
('tes', 'Tes', 'tes', 1, 'USER'),
('user', 'User', 'user', 0, 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `chat_ibfk_1` (`pengirim`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`pengirim`) REFERENCES `users` (`user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
