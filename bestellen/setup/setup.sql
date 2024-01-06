-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Erstellungszeit: 06. Jan 2024 um 12:29
-- Server-Version: 8.0.34-26
-- PHP-Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `alert`
--

CREATE TABLE `alert` (
  `name` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `time` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `last_active` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `status` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Artikelliste`
--

CREATE TABLE `Artikelliste` (
  `artikel` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `bild` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `width` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `height` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `beschreibung` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `Gruppe` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `Kidsmode` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `TG` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `preis` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `lager` mediumtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `time` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `tp` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aufgaben`
--

CREATE TABLE `aufgaben` (
  `aufgabe` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `count` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `nr` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellungen`
--

CREATE TABLE `bestellungen` (
  `Bestellzeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Name` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `Bestellung` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `total` int NOT NULL,
  `ID` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `Status` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `cart` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `atd` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bewertungen`
--

CREATE TABLE `bewertungen` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `text` varchar(9999) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `id` int NOT NULL,
  `stars` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `checkout`
--

CREATE TABLE `checkout` (
  `name` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `Euro` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mail_verify`
--

CREATE TABLE `mail_verify` (
  `mail` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `code` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `confirmed` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `module`
--

CREATE TABLE `module` (
  `name` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `information` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `status` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `error` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `settings` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `abhaengig` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Daten für Tabelle `module`
--

INSERT INTO `module` (`name`, `information`, `status`, `error`, `settings`, `abhaengig`, `id`) VALUES
('Alert', 'Ein Modul, welches dich Informiert, zeitlich etwas zu tun!', 'off', '', 'alert.php', '', 1),
('Account', 'Ein Modul, welches daf&uuml;r sorgt, dass User einen Account erstellen k&ouml;nnen und besondere Features nutzen zu k&ouml;nnen!', 'off', '', '', '', 2),
('Bewerten', 'Durch dieses Modul, k&ouml;nnen User das Restaurant bewerten!', 'error', 'Folgendes Modul muss aktiviert sein: Account', '', 'Account', 3),
('Aufgaben', 'Durch dieses Modul, k&ouml;nnen User Aufgaben bewerten, um den Bewerten Rang zu erh&ouml;hen!', 'error', 'Folgendes Modul muss aktiviert sein: Bewerten', 'aufgabe-add.php', 'Bewerten', 4),
('Tischnummer', 'F&uuml;ge zu den Bestellungen und den Checkout die Eingabe Tischnummer hinzu!', 'off', '', 'tischnummer.php', '', 5),
('E-Mail verify', 'Der User muss seine E-Mail beim ersten login bestätigen mit einem zugesendeten PIN', 'error', 'Folgendes Modul muss aktiviert sein: Account', '', 'Account', 6),
('Schneeflocken', 'Dieses Modul erlaubt dir, Schneeflocken auf der Website schneien zu lassen.', 'off', '', '', '', 8);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news-mails`
--

CREATE TABLE `news-mails` (
  `mails` mediumtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rabattcodes`
--

CREATE TABLE `rabattcodes` (
  `code` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `rabatt` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `status_rst`
--

CREATE TABLE `status_rst` (
  `Status` varchar(9999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Daten für Tabelle `status_rst`
--

INSERT INTO `status_rst` (`Status`) VALUES
('Geschlossen');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tische`
--

CREATE TABLE `tische` (
  `nummer` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `status` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `mail` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `rememberToken` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `bewerten_rang` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_1` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_2` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_3` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_4` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_5` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_6` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_7` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_8` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_9` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_10` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_11` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Artikelliste`
--
ALTER TABLE `Artikelliste`
  ADD PRIMARY KEY (`tp`);

--
-- Indizes für die Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD PRIMARY KEY (`atd`);

--
-- Indizes für die Tabelle `bewertungen`
--
ALTER TABLE `bewertungen`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Artikelliste`
--
ALTER TABLE `Artikelliste`
  MODIFY `tp` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  MODIFY `atd` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `bewertungen`
--
ALTER TABLE `bewertungen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `module`
--
ALTER TABLE `module`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;