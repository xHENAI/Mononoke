-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2022 at 05:54 PM
-- Server version: 5.7.37-0ubuntu0.18.04.1
-- PHP Version: 7.3.33-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mononoke`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET latin1 NOT NULL,
  `alternates` longblob,
  `year` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(4) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL,
  `description` text CHARACTER SET latin1,
  `anisearch` int(11) DEFAULT NULL,
  `9anime` text CHARACTER SET latin1,
  `animixplay` text COLLATE utf8mb4_unicode_ci,
  `gogoanime` text COLLATE utf8mb4_unicode_ci,
  `twist` int(11) DEFAULT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `public` int(11) NOT NULL,
  `closed` int(11) NOT NULL,
  `sort` int(11) NOT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `forum` int(11) NOT NULL,
  `thread` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forum_threads`
--

CREATE TABLE `forum_threads` (
  `id` int(11) NOT NULL,
  `forum` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `closed` int(11) NOT NULL,
  `sticky` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `anime` int(11) NOT NULL,
  `release` time NOT NULL,
  `tleft` datetime DEFAULT NULL,
  `added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `image` varchar(255) NOT NULL,
  `theme` int(11) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `public_profile` int(11) NOT NULL,
  `public_watchlist` int(11) NOT NULL,
  `read_announce` int(11) NOT NULL,
  `forum_signature` varchar(500) DEFAULT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `banned_reason` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_forgot`
--

CREATE TABLE `user_forgot` (
  `user` varchar(250) NOT NULL,
  `token` text NOT NULL,
  `from` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE `user_tokens` (
  `token` text NOT NULL,
  `user` varchar(250) NOT NULL,
  `from` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_verification`
--

CREATE TABLE `user_verification` (
  `user` varchar(250) NOT NULL,
  `token` text NOT NULL,
  `from` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_threads`
--
ALTER TABLE `forum_threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum_threads`
--
ALTER TABLE `forum_threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

