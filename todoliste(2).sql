-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Jan 2023 um 16:09
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `todoliste`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aufgaben`
--

CREATE TABLE `aufgaben` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `beschreibung` varchar(500) NOT NULL,
  `erstellungsdatum` date NOT NULL DEFAULT current_timestamp(),
  `faelligkeitsdatum` date NOT NULL,
  `ersteller` int(11) NOT NULL,
  `reiterid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `aufgaben`
--

INSERT INTO `aufgaben` (`id`, `name`, `beschreibung`, `erstellungsdatum`, `faelligkeitsdatum`, `ersteller`, `reiterid`) VALUES
(1, 'HTML', 'HTML Dateien erstellen', '2022-12-11', '2022-12-12', 2, 1),
(2, 'CSS', 'CSS Dateien', '2022-12-11', '2022-12-12', 2, 1),
(3, 'Kaffee', 'Kaffee trinken', '2022-12-11', '2022-12-12', 1, 1),
(4, 'test', '123', '2023-01-17', '0000-00-00', 1, 1),
(6, 'erledigte Aufgabe', 'Diese Aufgabe ist erledigt.', '2023-01-17', '2023-01-16', 1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitglieder`
--

CREATE TABLE `mitglieder` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT '$2y$10$P.Kvqw6ZEOxX/8Hp2V9z9ezZ6UVmItVIAl79P9eznUPbMMa78qyzO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `mitglieder`
--

INSERT INTO `mitglieder` (`id`, `username`, `email`, `password`) VALUES
(1, 'testi12345', 'test@test.de', '$2y$10$CA2ozW10LptmiieVKAilUuUSJ2pfIuFIp81tJpyQknCJIplZl/0xq'),
(2, 'max', 'musterman@asdf.de', '$2y$10$P.Kvqw6ZEOxX/8Hp2V9z9ezZ6UVmItVIAl79P9eznUPbMMa78qyzO');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mitgliederaufgaben`
--

CREATE TABLE `mitgliederaufgaben` (
  `mitgliederid` int(11) NOT NULL,
  `aufgabenid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `mitgliederaufgaben`
--

INSERT INTO `mitgliederaufgaben` (`mitgliederid`, `aufgabenid`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 3),
(2, 6);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projekte`
--

CREATE TABLE `projekte` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `beschreibung` varchar(500) NOT NULL,
  `ersteller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `projekte`
--

INSERT INTO `projekte` (`id`, `name`, `beschreibung`, `ersteller`) VALUES
(1, 'Testprojekt', 'Test12345', 2),
(5, 'Neues Projekt', 'asdf', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `projektemitglieder`
--

CREATE TABLE `projektemitglieder` (
  `projektid` int(11) NOT NULL,
  `mitgliederid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `projektemitglieder`
--

INSERT INTO `projektemitglieder` (`projektid`, `mitgliederid`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reiter`
--

CREATE TABLE `reiter` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `beschreibung` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `reiter`
--

INSERT INTO `reiter` (`id`, `name`, `beschreibung`) VALUES
(1, 'Todo Aufgaben', 'Aktuelles'),
(2, 'Erledigt', 'Erledigte Aufgaben');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `aufgaben`
--
ALTER TABLE `aufgaben`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ersteller` (`ersteller`),
  ADD KEY `reiterid` (`reiterid`);

--
-- Indizes für die Tabelle `mitglieder`
--
ALTER TABLE `mitglieder`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `mitgliederaufgaben`
--
ALTER TABLE `mitgliederaufgaben`
  ADD PRIMARY KEY (`mitgliederid`,`aufgabenid`),
  ADD KEY `mitgliederaufgaben_ibfk_1` (`aufgabenid`);

--
-- Indizes für die Tabelle `projekte`
--
ALTER TABLE `projekte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ersteller` (`ersteller`);

--
-- Indizes für die Tabelle `projektemitglieder`
--
ALTER TABLE `projektemitglieder`
  ADD PRIMARY KEY (`projektid`,`mitgliederid`),
  ADD KEY `mitgliederid` (`mitgliederid`);

--
-- Indizes für die Tabelle `reiter`
--
ALTER TABLE `reiter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `aufgaben`
--
ALTER TABLE `aufgaben`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `mitglieder`
--
ALTER TABLE `mitglieder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `projekte`
--
ALTER TABLE `projekte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `reiter`
--
ALTER TABLE `reiter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `aufgaben`
--
ALTER TABLE `aufgaben`
  ADD CONSTRAINT `aufgaben_ibfk_1` FOREIGN KEY (`ersteller`) REFERENCES `mitglieder` (`id`),
  ADD CONSTRAINT `aufgaben_ibfk_2` FOREIGN KEY (`reiterid`) REFERENCES `reiter` (`id`);

--
-- Constraints der Tabelle `mitgliederaufgaben`
--
ALTER TABLE `mitgliederaufgaben`
  ADD CONSTRAINT `mitgliederaufgaben_ibfk_1` FOREIGN KEY (`aufgabenid`) REFERENCES `aufgaben` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mitgliederaufgaben_ibfk_2` FOREIGN KEY (`mitgliederid`) REFERENCES `mitglieder` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `projekte`
--
ALTER TABLE `projekte`
  ADD CONSTRAINT `projekte_ibfk_1` FOREIGN KEY (`ersteller`) REFERENCES `mitglieder` (`id`);

--
-- Constraints der Tabelle `projektemitglieder`
--
ALTER TABLE `projektemitglieder`
  ADD CONSTRAINT `projektemitglieder_ibfk_1` FOREIGN KEY (`mitgliederid`) REFERENCES `mitglieder` (`id`),
  ADD CONSTRAINT `projektemitglieder_ibfk_2` FOREIGN KEY (`projektid`) REFERENCES `projekte` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
