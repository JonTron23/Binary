-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 06. Jun 2022 um 15:11
-- Server-Version: 5.7.34
-- PHP-Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `binary`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cart_item`
--

CREATE TABLE `cart_item` (
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `order`
--

CREATE TABLE `order` (
  `oid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `order_item`
--

CREATE TABLE `order_item` (
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `order_status`
--

CREATE TABLE `order_status` (
  `osid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`pid`, `name`, `type`) VALUES
(1, 'Binary-Tee', 'T-Shirt'),
(2, 'Binary Hoodie', 'Hoodie'),
(3, 'Binary Jogger', 'Joggers'),
(4, 'Binary Cap', 'Cap');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product_attributes`
--

CREATE TABLE `product_attributes` (
  `psku` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `size` varchar(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `img` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `product_attributes`
--

INSERT INTO `product_attributes` (`psku`, `pid`, `size`, `price`, `img`) VALUES
(1, 1, 'S', 200, 'files/media/tee.png'),
(2, 2, 'S', 300, 'files/media/hoodie.png'),
(3, 3, 'S', 100, 'files/media/jogger.png'),
(4, 4, 'S', 200, 'files/media/cap.png');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rating`
--

CREATE TABLE `rating` (
  `rid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `rating` varchar(200) DEFAULT NULL,
  `stars` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `street` varchar(20) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `zip` int(10) DEFAULT NULL,
  `country` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`uid`, `firstname`, `lastname`, `email`, `password`, `street`, `city`, `zip`, `country`) VALUES
(3, NULL, NULL, NULL, '$2y$10$RXU446QFaYr29chCTZpPqeEyI/6t9MdmEvNfOSjU1CX/ynWFL9Gl6', NULL, NULL, NULL, NULL),
(4, 'jonathan', 'heeb', 'jonathan.heeb02@gmail.com', '$2y$10$qh95z34Mq1qr6ESyu7SbvevGPhegu0Jxpk5.996RqJxmNyVIdzl5S', NULL, NULL, NULL, NULL),
(5, 'jonathan', 'heeb', 'jonathan.heeb@supsign.ch', '$2y$10$befz81L.yJnScDgNek/Qs.lsYrxAdIRd.TzbkDacdFMp86PSApDYy', NULL, NULL, NULL, NULL),
(6, 'hallo', 'hh', 'jonathan.heeb02@gmail.com', '$2y$10$Pp4/92KucwQ3S9JHW8tBaeDjUGibnIgBaCc2LD8tPggJx4AtXD8GO', NULL, NULL, NULL, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indizes für die Tabelle `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`oid`);

--
-- Indizes für die Tabelle `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`osid`);

--
-- Indizes für die Tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indizes für die Tabelle `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`psku`),
  ADD KEY `UQ_product_pid` (`pid`);

--
-- Indizes für die Tabelle `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `UQ_rating_pid` (`pid`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `order`
--
ALTER TABLE `order`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `order_status`
--
ALTER TABLE `order_status`
  MODIFY `osid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `psku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `rating`
--
ALTER TABLE `rating`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `UQ_product_pid` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`);

--
-- Constraints der Tabelle `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `UQ_rating_pid` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
