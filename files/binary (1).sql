-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 27. Jun 2022 um 19:37
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

--
-- Daten für Tabelle `cart`
--

INSERT INTO `cart` (`cid`, `uid`) VALUES
(32, 19);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cart_item`
--

CREATE TABLE `cart_item` (
  `ciid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `psku` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
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
  `type` varchar(50) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`pid`, `name`, `type`, `img`, `description`) VALUES
(1, 'Binary-Tee', 'T-Shirt', 'files/media/shirt.png', 'Sexy shirt'),
(2, 'Binary Hoodie', 'Hoodie', 'files/media/shirt.png', 'Sexy Hoodie'),
(3, 'Binary Jogger', 'Joggers', 'files/media/shirt.png', 'Sexy Joggers'),
(4, 'Binary Cap', 'Cap', 'files/media/shirt.png', 'Sexy Cap');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product_attributes`
--

CREATE TABLE `product_attributes` (
  `psku` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `size` varchar(11) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `product_attributes`
--

INSERT INTO `product_attributes` (`psku`, `pid`, `size`, `price`) VALUES
(1, 1, 'S', 100),
(2, 1, 'M', 100),
(3, 1, 'L', 100),
(4, 1, 'XL', 100),
(5, 2, 'S', 200),
(6, 2, 'M', 200),
(7, 2, 'L', 200),
(8, 2, 'XL', 200),
(9, 3, 'S', 150),
(10, 3, 'M', 150),
(11, 3, 'L', 150),
(12, 3, 'XL', 150),
(13, 4, 'S', 50),
(14, 4, 'M', 50),
(15, 4, 'L', 50),
(16, 4, 'XL', 50);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rating`
--

CREATE TABLE `rating` (
  `rid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `rating` varchar(200) DEFAULT NULL,
  `stars` int(1) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL
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
(19, 'jonathan', 'heeb', 'jonathan.heeb02@gmail.com', '$2y$10$qkEVm3gf.Xh0uYS3HBMHNuiQNWb3vS4N7/4MrVxaY43n7drdEqEw2', NULL, NULL, NULL, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indizes für die Tabelle `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`ciid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `psku` (`psku`);

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
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT für Tabelle `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `ciid` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `psku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT für Tabelle `rating`
--
ALTER TABLE `rating`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cid` FOREIGN KEY (`cid`) REFERENCES `cart` (`cid`),
  ADD CONSTRAINT `pid` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`),
  ADD CONSTRAINT `psku` FOREIGN KEY (`psku`) REFERENCES `product_attributes` (`psku`);

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
