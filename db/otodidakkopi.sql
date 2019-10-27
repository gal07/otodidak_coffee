/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.1.30-MariaDB : Database - otodidakkopi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`u4412647_otodidak` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `u4412647_otodidak`;

/*Table structure for table `antrian` */

DROP TABLE IF EXISTS `antrian`;

CREATE TABLE `antrian` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_order_detail` int(5) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `id_order_detail` (`id_order_detail`),
  CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`id_order_detail`) REFERENCES `order_detail` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `antrian` */

/*Table structure for table `cart_sessions` */

DROP TABLE IF EXISTS `cart_sessions`;

CREATE TABLE `cart_sessions` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `id_user` int(6) DEFAULT NULL,
  `id_produk` int(10) DEFAULT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `harga` decimal(18,0) DEFAULT NULL,
  `total` decimal(18,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `cart_sessions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cart_sessions` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(128) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`kategori`) values 
(6,'Espreso Based'),
(7,'Bukan Kopi'),
(8,'Manual Brew');

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id_order` int(10) NOT NULL,
  `id_user` int(2) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `total_harga` decimal(18,0) DEFAULT NULL,
  `bayar` decimal(18,0) DEFAULT NULL,
  `kembalian` decimal(18,0) DEFAULT NULL,
  `note` text,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id_order`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `order` */

/*Table structure for table `order_detail` */

DROP TABLE IF EXISTS `order_detail`;

CREATE TABLE `order_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_order` int(10) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(3) DEFAULT NULL,
  `harga` decimal(18,0) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_order` (`id_order`),
  KEY `order_detail_ibfk_2` (`id_produk`),
  CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `order_detail` */

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `produk` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `id_kategori` (`id_kategori`),
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `produk` */

insert  into `produk`(`id_produk`,`id_kategori`,`produk`,`harga`,`foto`,`status`) values 
(445779501,6,'Kopi Anti Ngantuk',12000,'20191020051321.jpg',1),
(716278598,8,'Kopi Sianida',40000,'20191020034654.jpg',1),
(1071787943,8,'Kopi Luwak',20000,'20191020012619.jpg',1),
(2070696533,8,'Kopi Item',30000,'20191020051341.jpg',1);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `aktif` int(1) NOT NULL,
  `role` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`nama`,`email`,`username`,`password`,`aktif`,`role`) values 
(1,'Amer','amer@gmail.com','amer','amer',1,1),
(2,'Kasir','kasir@gmail.com','kasir','kasir',1,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
