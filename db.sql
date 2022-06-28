-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server Version:               5.7.33 - MySQL Community Server (GPL)
-- Server Betriebssystem:        Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Exportiere Datenbank Struktur für binary
CREATE DATABASE IF NOT EXISTS `binary` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `binary`;

-- Exportiere Struktur von Tabelle binary.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle binary.cart: ~3 rows (ungefähr)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`cid`, `uid`) VALUES
	(32, 19),
	(33, 20),
	(34, 21);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle binary.cart_item
CREATE TABLE IF NOT EXISTS `cart_item` (
  `ciid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `psku` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`ciid`),
  KEY `cid` (`cid`),
  KEY `pid` (`pid`),
  KEY `psku` (`psku`),
  CONSTRAINT `cid` FOREIGN KEY (`cid`) REFERENCES `cart` (`cid`),
  CONSTRAINT `pid` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`),
  CONSTRAINT `psku` FOREIGN KEY (`psku`) REFERENCES `product_attributes` (`psku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle binary.cart_item: ~0 rows (ungefähr)
/*!40000 ALTER TABLE `cart_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_item` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle binary.order
CREATE TABLE IF NOT EXISTS `order` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle binary.order: ~0 rows (ungefähr)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle binary.order_item
CREATE TABLE IF NOT EXISTS `order_item` (
  `oid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle binary.order_item: ~0 rows (ungefähr)
/*!40000 ALTER TABLE `order_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_item` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle binary.order_status
CREATE TABLE IF NOT EXISTS `order_status` (
  `osid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`osid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle binary.order_status: ~0 rows (ungefähr)
/*!40000 ALTER TABLE `order_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_status` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle binary.product
CREATE TABLE IF NOT EXISTS `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle binary.product: ~4 rows (ungefähr)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`pid`, `name`, `type`, `img`, `description`) VALUES
	(1, 'Binary-Tee', 'T-Shirt', 'files/media/shirt.png', 'Sexy shirt'),
	(2, 'Binary Hoodie', 'Hoodie', 'files/media/shirt.png', 'Sexy Hoodie'),
	(3, 'Binary Jogger', 'Joggers', 'files/media/shirt.png', 'Sexy Joggers'),
	(4, 'Binary Cap', 'Cap', 'files/media/shirt.png', 'Sexy Cap');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle binary.product_attributes
CREATE TABLE IF NOT EXISTS `product_attributes` (
  `psku` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `size` varchar(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`psku`),
  KEY `UQ_product_pid` (`pid`),
  CONSTRAINT `UQ_product_pid` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle binary.product_attributes: ~16 rows (ungefähr)
/*!40000 ALTER TABLE `product_attributes` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `product_attributes` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle binary.rating
CREATE TABLE IF NOT EXISTS `rating` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `rating` varchar(200) DEFAULT NULL,
  `stars` int(1) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rid`),
  KEY `UQ_rating_pid` (`pid`),
  CONSTRAINT `UQ_rating_pid` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle binary.rating: ~1 rows (ungefähr)
/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
INSERT INTO `rating` (`rid`, `pid`, `rating`, `stars`, `user`) VALUES
	(1, 1, 'Cool', 5, 'Jonathan Heeb');
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;

-- Exportiere Struktur von Tabelle binary.user
CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `street` varchar(60) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `zip` int(10) DEFAULT NULL,
  `country` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Exportiere Daten aus Tabelle binary.user: ~1 rows (ungefähr)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`uid`, `firstname`, `lastname`, `email`, `password`, `street`, `city`, `zip`, `country`) VALUES
	(20, 'jonathan', 'heeb', 'jonathan.heeb02@gmail.com', '$2y$10$Zw/eR9ASQ3iX7lCr7Yl2me1ekjD9sSK1azO60o4naqegj/lC4MXL.', '<b>bold</b>', '', 0, 'asdf');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
