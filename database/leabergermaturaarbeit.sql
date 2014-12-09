-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Dez 2014 um 20:38
-- Server Version: 5.6.20
-- PHP-Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `leabergermaturaarbeit`
--
CREATE DATABASE IF NOT EXISTS `leabergermaturaarbeit` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `leabergermaturaarbeit`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `game`
--

CREATE TABLE IF NOT EXISTS `game` (
`game_id` int(11) NOT NULL,
  `runde` int(11) NOT NULL,
  `guthaben` int(11) NOT NULL,
  `gesetzt` int(11) NOT NULL,
  `gewinn_zahl` int(11) NOT NULL,
  `gewinn_farbe` int(11) NOT NULL,
  `gewinn_gerade` int(11) NOT NULL,
  `verloren` int(11) NOT NULL,
  `gewonnen` int(11) NOT NULL,
  `player_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `players`
--

CREATE TABLE IF NOT EXISTS `players` (
`player_id` int(11) NOT NULL,
  `vorname` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `klasse` varchar(200) NOT NULL,
  `geschlecht` varchar(200) NOT NULL,
  `age` int(255) NOT NULL,
  `gewicht` int(255) NOT NULL,
  `groesse` int(255) NOT NULL,
  `hunger` int(255) NOT NULL,
  `zeitpunkt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game`
--
ALTER TABLE `game`
 ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
 ADD PRIMARY KEY (`player_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
