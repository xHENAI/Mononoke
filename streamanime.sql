-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 26. Mai 2022 um 20:35
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
  `released` int(11) NOT NULL,
  `duration` text NOT NULL,
  `season_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `type_id` int(11) NOT NULL DEFAULT 1,
  `sub` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`sub`)),
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

CREATE TABLE `bookmark` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `anime_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `director`
--

CREATE TABLE `director` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `episode`
--

CREATE TABLE `episode` (
  `id` int(11) NOT NULL,
  `anime_id` int(11) NOT NULL,
  `sub` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `genre`
--

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
(2, 'adventure/', 'Adventure'),
(3, 'adult-cast/', 'Adult Cast'),
(4, 'anti-hero/', 'Anti-Hero'),
(5, 'anthropomorphic/', 'Anthropomorphic'),
(6, 'avant-garde/', 'Avant Garde'),
(7, 'award-winning/', 'Award Winning'),
(8, 'boys-love/', 'Boys Love'),
(9, 'college/', 'College'),
(10, 'comedy/', 'Comedy'),
(11, 'cgdct/', 'CGDCT'),
(12, 'childcare/', 'Childcare'),
(13, 'combat-sports/', 'Combat Sports'),
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
(24, 'gourmet/', 'Gourmet'),
(25, 'gore/', 'Gore'),
(26, 'harem/', 'Harem'),
(27, 'hentai/', 'Hentai'),
(28, 'historical/', 'Historical'),
(29, 'high-stakes-game/', 'High Stakes Game '),
(30, 'horror/', 'Horror'),
(31, 'idols/', 'Idols'),
(32, 'isekai/', 'Isekai'),
(33, 'iyashikei/', 'Iyashikei'),
(34, 'josei/', 'Josei'),
(35, 'kids/', 'Kids'),
(36, 'love-polygon/', 'Love Polygon'),
(37, 'magic/', 'Magic'),
(38, 'magical-sex-shift/', 'Magical Sex Shift'),
(39, 'martial-arts/', 'Martial Arts'),
(40, 'mahou-shoujo/', 'Mahou Shoujo'),
(41, 'mecha/', 'Mecha'),
(42, 'medical/', 'Medical'),
(43, 'military/', 'Military'),
(44, 'music/', 'Music'),
(45, 'mythology/', 'Mythology'),
(46, 'mystery/', 'Mystery'),
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
(70, 'samurai/', 'Samurai'),
(71, 'school/', 'School'),
(72, 'sci-fi/', 'Sci-Fi'),
(73, 'seinen/', 'Seinen'),
(74, 'showbiz/', 'Showbiz'),
(75, 'shoujo/', 'Shoujo'),
(76, 'shounen/', 'Shounen'),
(77, 'slice-of-life/', 'Slice of Life'),
(78, 'space/', 'Space'),
(79, 'sports/', 'Sports'),
(80, 'super-power/', 'Super Power'),
(81, 'supernatural/', 'Supernatural'),
(82, 'survival/', 'Survival'),
(83, 'suspense/', 'Suspense'),
(84, 'strategy-game/', 'Strategy Game'),
(85, 'team-sports/', 'Team Sports'),
(86, 'time-travel/', 'Time Travel'),
(87, 'vampire/', 'Vampire'),
(88, 'video-games/', 'Video Games'),
(89, 'visual-arts/', 'Visual Arts'),
(90, 'workplace/', 'Workplace');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `season`
--

CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_token` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `studio`
--

CREATE TABLE `studio` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tracked`
--

CREATE TABLE `tracked` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `anime_id` int(11) NOT NULL,
  `episode_number` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `type`
--

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

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` text NOT NULL,
  `image` text DEFAULT NULL,
  `level` int(11) NOT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `discord` varchar(50) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `banned` int(11) NOT NULL DEFAULT 0,
  `joined` datetime NOT NULL DEFAULT current_timestamp()
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
-- Indizes für die Tabelle `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8656;

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
-- AUTO_INCREMENT für Tabelle `studio`
--
ALTER TABLE `studio`
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
