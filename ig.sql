-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 05:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ig`
--

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `url` varchar(1000) NOT NULL,
  `caption` varchar(200) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`url`, `caption`, `likes`) VALUES
('https://scontent-sin6-2.cdninstagram.com/v/t51.2885-15/e35/23596027_336164576856314_6712747228940730368_n.jpg?_nc_ht=scontent-sin6-2.cdninstagram.com&_nc_cat=102&_nc_ohc=RB23ctP1PPUAX_F16kd&oh=7780e7f90902a148633431263c063316&oe=5E913EEE', 'open your mind before your mouth', 15714),
('https://scontent-sin6-2.xx.fbcdn.net/v/t1.0-9/1536688_1428084470758674_431250696_n.jpg?_nc_cat=100&_nc_sid=85a577&_nc_oc=AQkesUwIpk9a23QiKvpHHtfPnXcM3JbhCs8ZKZ8nMuY_jijScMZziDXn5QdsbBVWMX0&_nc_ht=scontent-sin6-2.xx&oh=7933505f31c2185da7e8d62799ed5672&oe=5E942A96', 'candid dulu gaes', 14),
('https://scontent-sin6-2.cdninstagram.com/v/t51.2885-15/e35/26154900_1969816573278460_774384415944998912_n.jpg?_nc_ht=scontent-sin6-2.cdninstagram.com&_nc_cat=104&_nc_ohc=DnOlZ_rjDE4AX_zsmx2&oh=ad3e1abbcccbe9393b6c594f0942eb7b&oe=5E91E644', '🤫', 20924);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `website` varchar(30) NOT NULL,
  `bio` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`name`, `username`, `website`, `bio`, `email`, `phone`, `gender`) VALUES
('Titan Kinan', 'ashyiap', 'https://github.com/Titankinan', 'ashyiap santuy pokoknya mah..', 'ashyiap@gmail.com', '081220627721', 'male'),
('Shinta Naomi', 'tata', 'https://jkt48.com', 'Shinta Naomi\r\nCP : 081295337343 (Tata)\r\nm.youtube.com/channel/UCO8qchKGLqESWm4E95pUUEg', 'tata48@gmail.com', '081295337343', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`) VALUES
('ashyiap', 'santuy', 'ashyiap@gmail.com'),
('tata', 'jkt48', 'tata48@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
