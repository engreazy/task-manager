-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 08:51 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `permissions` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `permissions`) VALUES
(1, 'admin', 'israel4sng@yahoo.com', 'admin', 0),
(2, 'zee', 'admin@admin.com', 'zee', 0),
(3, 'zee', 'admin@admin.com', 'zee', 0),
(4, 'mike', 'manchesterunited@man.com', 'mike', 0),
(5, 'mike', 'manchesterunited@man.com', 'mike', 0),
(6, 'mike', 'manchesterunited@man.com', 'mike', 0),
(7, 'zeeocci', 'admin@admin.com', 'zeeocci', 0),
(8, 'zeeocci', 'example.com', 'mike', 0),
(9, 'amazingdeal', 'admin@yahoo.com', '$2y$10$asaIopD4QEuFXHqRWUOEb.1wVihga3FQ.yygoPhDCUDirJx6ln62.', 0),
(10, 'mike', 'gg@yahoo.com', '$2y$10$8b2ZyUyOb/gBN029yegu7eaahej6Jt.uqGTv7t/ThVAy0R9543mQu', 0),
(11, 'easy', 'easy@easy.com', '$2y$10$CFQksKIO7GF5d.Z0KP9fCOe9iryeQLeCUlOOdQcik550pueCDKM1m', 63),
(12, 'hello', 'hello@hello.com', '$2y$10$j6ZWX.vsQtV8mSnO1d7mYOQOCF9ze0NpFS99xzgZpm12cmRQZYH7C', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
