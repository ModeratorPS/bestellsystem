SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `achievement` (
  `achievement` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `count` int NOT NULL,
  `type` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `icon_glitch` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `icon_normal` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `br` tinyint(1) NOT NULL DEFAULT '0',
  `id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

INSERT INTO `achievement` (`achievement`, `count`, `type`, `icon_glitch`, `icon_normal`, `br`, `id`) VALUES
('Bewerter Level 1', 5, 'Bewerten', 'rate0_glitch.png', 'rate0.png', 0, 1),
('Bewerter Level 2', 10, 'Bewerten', 'rate1_glitch.png', 'rate1.png', 0, 2),
('Bewerter Level 3', 15, 'Bewerten', 'rate2_glitch.png', 'rate2.png', 0, 3),
('Bewerter Level 4', 20, 'Bewerten', 'rate3_glitch.png', 'rate3.png', 1, 4),
('Besteller Level 1', 5, 'Bestellen', 'order0_glitch.png', 'order0.png', 0, 5),
('Besteller Level 2', 10, 'Bestellen', 'order1_glitch.png', 'order1.png', 0, 6),
('Besteller Level 3', 15, 'Bestellen', 'order2_glitch.png', 'order2.png', 0, 7),
('Besteller Level 4', 20, 'Bestellen', 'order3_glitch.png', 'order3.png', 1, 8);

CREATE TABLE `alert` (
  `name` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `time` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `last_active` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `status` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

CREATE TABLE `Artikelliste` (
  `id` int NOT NULL,
  `status` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `artikel` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `bild` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `Gruppe` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `preis` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `lager` mediumtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

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

CREATE TABLE `bewertungen` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `text` varchar(9999) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `id` int NOT NULL,
  `stars` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

CREATE TABLE `checkout` (
  `name` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `Euro` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

CREATE TABLE `mail_verify` (
  `mail` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `code` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `confirmed` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

CREATE TABLE `module` (
  `name` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `information` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `status` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `error` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `settings` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `abhaengig` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

INSERT INTO `module` (`name`, `information`, `status`, `error`, `settings`, `abhaengig`, `id`) VALUES
('Alert', 'Ein Modul, welches dich Informiert, zeitlich etwas zu tun!', 'off', '', 'alert.php', '', 1),
('Account', 'Ein Modul, welches daf&uuml;r sorgt, dass User einen Account erstellen k&ouml;nnen und besondere Features nutzen zu k&ouml;nnen!', 'off', '', '', '', 2),
('Bewerten', 'Durch dieses Modul, k&ouml;nnen User das Restaurant bewerten!', 'error', 'Folgendes Modul muss aktiviert sein: Account', '', 'Account', 3),
('Achievements', 'Durch dieses Modul, k&ouml;nnen User Achievements erledigen und Belohnungen freischalten!', 'error', 'Folgendes Modul muss aktiviert sein: Bewerten', 'achievement.php', 'Bewerten', 4),
('Tischnummer', 'F&uuml;ge zu den Bestellungen und den Checkout die Eingabe Tischnummer hinzu!', 'off', '', 'tischnummer.php', '', 5),
('E-Mail verify', 'Der User muss seine E-Mail beim ersten login bestätigen mit einem zugesendeten PIN', 'error', 'Folgendes Modul muss aktiviert sein: Account', '', 'Account', 6),
('Schneeflocken', 'Dieses Modul erlaubt dir, Schneeflocken auf der Website schneien zu lassen.', 'off', '', '', '', 8);

CREATE TABLE `rabattcodes` (
  `code` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `rabatt` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

CREATE TABLE `status_rst` (
  `Status` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

INSERT INTO `status_rst` (`Status`) VALUES
('Geschlossen');

CREATE TABLE `tische` (
  `nummer` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `status` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `mail` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL,
  `rememberToken` longtext CHARACTER SET latin1 COLLATE latin1_german2_ci,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `bewerten_rang` varchar(999) CHARACTER SET latin1 COLLATE latin1_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;


ALTER TABLE `achievement`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Artikelliste`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `bestellungen`
  ADD PRIMARY KEY (`atd`);

ALTER TABLE `bewertungen`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);


ALTER TABLE `achievement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `Artikelliste`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `bestellungen`
  MODIFY `atd` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `bewertungen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `module`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
