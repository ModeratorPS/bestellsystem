-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Host: wp302.webpack.hosteurope.de
-- Erstellungszeit: 01. Mrz 2023 um 15:35
-- Server-Version: 5.7.40-43-log
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
-- Tabellenstruktur für Tabelle `Artikelliste`
--

CREATE TABLE `Artikelliste` (
  `artikel` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `bild` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `width` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `height` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `beschreibung` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `Gruppe` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `Kidsmode` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `TG` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `preis` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `lager` mediumtext COLLATE latin1_german2_ci NOT NULL,
  `time` varchar(999) COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aufgaben`
--

CREATE TABLE `aufgaben` (
  `aufgabe` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `count` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `nr` varchar(999) COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellungen`
--

CREATE TABLE `bestellungen` (
  `Bestellzeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Name` varchar(9999) COLLATE latin1_german2_ci NOT NULL,
  `E-Mail` varchar(9999) COLLATE latin1_german2_ci NOT NULL,
  `Bestellung` varchar(9999) COLLATE latin1_german2_ci NOT NULL,
  `Zusatz` mediumtext COLLATE latin1_german2_ci NOT NULL,
  `ID` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `Status` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `TG` varchar(999) COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bewertungen`
--

CREATE TABLE `bewertungen` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `text` varchar(9999) COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `checkout`
--

CREATE TABLE `checkout` (
  `name` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `Euro` varchar(999) COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news-mails`
--

CREATE TABLE `news-mails` (
  `mails` mediumtext COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `status_rst`
--

CREATE TABLE `status_rst` (
  `Status` varchar(9999) COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Daten für Tabelle `status_rst`
--

INSERT INTO `status_rst` (`Status`) VALUES
('Geschlossen');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `mail` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_german2_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `level` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `proc` varchar(900) COLLATE latin1_german2_ci NOT NULL,
  `bewerten_rang` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_1` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_2` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_3` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_4` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_5` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_6` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_7` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_8` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_9` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_10` varchar(999) COLLATE latin1_german2_ci NOT NULL,
  `aufgabe_11` varchar(999) COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

--
-- Indizes der exportierten Tabellen
--

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
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
