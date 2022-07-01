-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 01. Jul 2022 um 19:25
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `streamanime`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `anime`
--

DROP TABLE IF EXISTS `anime`;
CREATE TABLE `anime` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `name` text NOT NULL,
  `cover` text NOT NULL,
  `trailer` text DEFAULT NULL,
  `tags` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `genre` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`genre`)),
  `other_names` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `studio_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`studio_id`)),
  `released` int(11) DEFAULT NULL,
  `duration` text NOT NULL,
  `season_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `type_id` int(11) NOT NULL DEFAULT 1,
  `uncensored` int(11) DEFAULT 0,
  `director_id` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp(),
  `synopsis` text DEFAULT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bookmark`
--

DROP TABLE IF EXISTS `bookmark`;
CREATE TABLE `bookmark` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `anime_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `director`
--

DROP TABLE IF EXISTS `director`;
CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `episode`
--

DROP TABLE IF EXISTS `episode`;
CREATE TABLE `episode` (
  `id` int(11) NOT NULL,
  `anime_id` int(11) NOT NULL,
  `episode` int(11) NOT NULL,
  `type` varchar(3) NOT NULL DEFAULT 'sub',
  `title` text DEFAULT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `genre`
--

INSERT INTO `genre` (`id`, `slug`, `name`) VALUES
(1, 'action/', 'Action'),
(2, 'adult-cast/', 'Adult Cast'),
(3, 'adventure/', 'Adventure'),
(4, 'anthropomorphic/', 'Anthropomorphic'),
(5, 'anti-hero/', 'Anti-Hero'),
(6, 'avant-garde/', 'Avant Garde'),
(7, 'award-winning/', 'Award Winning'),
(8, 'boys-love/', 'Boys Love'),
(9, 'cgdct/', 'CGDCT'),
(10, 'childcare/', 'Childcare'),
(11, 'college/', 'College'),
(12, 'combat-sports/', 'Combat Sports'),
(13, 'comedy/', 'Comedy'),
(14, 'crossdressing/', 'Crossdressing'),
(15, 'delinquents/', 'Delinquents'),
(16, 'detective/', 'Detective'),
(17, 'drama/', 'Drama'),
(18, 'ecchi/', 'Ecchi'),
(19, 'educational/', 'Educational'),
(20, 'erotica/', 'Erotica'),
(21, 'fantasy/', 'Fantasy'),
(22, 'gag-humor/', 'Gag Humor'),
(23, 'girls-love/', 'Girls Love'),
(24, 'gore/', 'Gore'),
(25, 'gourmet/', 'Gourmet'),
(26, 'harem/', 'Harem'),
(27, 'hentai/', 'Hentai'),
(28, 'high-stakes-game/', 'High Stakes Game '),
(29, 'historical/', 'Historical'),
(30, 'horror/', 'Horror'),
(31, 'idols/', 'Idols'),
(32, 'isekai/', 'Isekai'),
(33, 'iyashikei/', 'Iyashikei'),
(34, 'josei/', 'Josei'),
(35, 'kids/', 'Kids'),
(36, 'love-polygon/', 'Love Polygon'),
(37, 'magic/', 'Magic'),
(38, 'magical-sex-shift/', 'Magical Sex Shift'),
(39, 'mahou-shoujo/', 'Mahou Shoujo'),
(40, 'martial-arts/', 'Martial Arts'),
(41, 'mecha/', 'Mecha'),
(42, 'medical/', 'Medical'),
(43, 'military/', 'Military'),
(44, 'music/', 'Music'),
(45, 'mystery/', 'Mystery'),
(46, 'mythology/', 'Mythology'),
(47, 'organized-crime/', 'Organized Crime'),
(48, 'otaku-culture/', 'Otaku Culture'),
(49, 'parody/', 'Parody'),
(50, 'performing-arts/', 'Performing Arts'),
(51, 'pets/', 'Pets'),
(52, 'philosophy/', 'Philosophy'),
(53, 'police/', 'Police'),
(54, 'psychological/', 'Psychological'),
(55, 'racing/	', 'Racing'),
(56, 'reincarnation/', 'Reincarnation'),
(57, 'revenge/', 'Revenge'),
(58, 'reverse-harem/', 'Reverse Harem'),
(59, 'romance/', 'Romance'),
(60, 'romantic-subtext/', 'Romantic Subtext'),
(61, 'samurai/', 'Samurai'),
(62, 'school/', 'School'),
(63, 'sci-fi/', 'Sci-Fi'),
(64, 'seinen/', 'Seinen'),
(65, 'shoujo/', 'Shoujo'),
(66, 'shounen/', 'Shounen'),
(67, 'showbiz/', 'Showbiz'),
(68, 'slice-of-life/', 'Slice of Life'),
(69, 'space/', 'Space'),
(70, 'sports/', 'Sports'),
(71, 'strategy-game/', 'Strategy Game'),
(72, 'super-power/', 'Super Power'),
(73, 'supernatural/', 'Supernatural'),
(74, 'survival/', 'Survival'),
(75, 'suspense/', 'Suspense'),
(76, 'team-sports/', 'Team Sports'),
(77, 'time-travel/', 'Time Travel'),
(78, 'vampire/', 'Vampire'),
(79, 'video-games/', 'Video Games'),
(80, 'visual-arts/', 'Visual Arts'),
(81, 'workplace/', 'Workplace');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `status` varchar(6) NOT NULL DEFAULT 'open',
  `type` varchar(10) NOT NULL,
  `url` text DEFAULT NULL,
  `reason` varchar(20) NOT NULL,
  `message` text DEFAULT NULL,
  `user` int(11) NOT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `season`
--

DROP TABLE IF EXISTS `season`;
CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_token` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `streams`
--

DROP TABLE IF EXISTS `streams`;
CREATE TABLE `streams` (
  `id` int(11) NOT NULL,
  `episode_id` int(11) NOT NULL,
  `type` varchar(3) NOT NULL DEFAULT 'sub',
  `host` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `studio`
--

DROP TABLE IF EXISTS `studio`;
CREATE TABLE `studio` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tracked`
--

DROP TABLE IF EXISTS `tracked`;
CREATE TABLE `tracked` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `anime_id` int(11) NOT NULL,
  `episode_number` int(11) NOT NULL,
  `type` varchar(3) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `type`
--

INSERT INTO `type` (`id`, `slug`, `name`) VALUES
(1, 'tv-series/', 'TV Series'),
(2, 'ova/', 'OVA'),
(3, 'movie/', 'Movie'),
(4, 'live-action/', 'Live Action'),
(5, 'special/', 'Special'),
(6, 'bd/', 'BD'),
(7, 'ona/', 'ONA'),
(8, 'music/', 'Music');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` text NOT NULL,
  `image` text DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 40,
  `twitter` varchar(50) DEFAULT NULL,
  `discord` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `perpage` int(11) NOT NULL DEFAULT 25,
  `public` tinyint(1) NOT NULL DEFAULT 1,
  `banned` int(11) NOT NULL DEFAULT 0,
  `joined` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `views`
--

DROP TABLE IF EXISTS `views`;
CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `anime_id` int(11) NOT NULL,
  `viewed` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `tracked`
--
ALTER TABLE `tracked`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indizes für die Tabelle `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `director`
--
ALTER TABLE `director`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `episode`
--
ALTER TABLE `episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8657;

--
-- AUTO_INCREMENT für Tabelle `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `season`
--
ALTER TABLE `season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `streams`
--
ALTER TABLE `streams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `studio`
--
ALTER TABLE `studio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `tracked`
--
ALTER TABLE `tracked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
