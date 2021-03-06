/*
SQLyog Community Edition- MySQL GUI v7.1 
MySQL - 5.0.67-community-nt : Database - pentagonclt
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`pentagonclt` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pentagonclt`;

/*Table structure for table `hitcounter` */

DROP TABLE IF EXISTS `hitcounter`;

CREATE TABLE `hitcounter` (
  `counter` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hitcounter` */

insert  into `hitcounter`(`counter`) values (903);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
