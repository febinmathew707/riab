/*
SQLyog Community Edition- MySQL GUI v7.1 
MySQL - 5.0.67-community-nt : Database - wavesatlive
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`wavesatlive` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `wavesatlive`;

/*Table structure for table `ev_videos` */

DROP TABLE IF EXISTS `ev_videos`;

CREATE TABLE `ev_videos` (
  `video_id` float NOT NULL auto_increment,
  `caption` varchar(250) character set utf8 default NULL,
  `vid_url` varchar(250) character set utf8 default NULL,
  `postdate` datetime default NULL,
  `vid_desc` varchar(5000) character set utf8 default NULL,
  `img_url` varchar(250) character set utf8 default NULL,
  `published` varchar(1) character set utf8 default 'N',
  `views` float default NULL,
  `viewed` float default NULL,
  `commented` float default NULL,
  `recentview` datetime default NULL,
  `category` varchar(25) default NULL,
  `vid_name` varchar(50) default NULL,
  `uid` float NOT NULL,
  PRIMARY KEY  (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `ev_videos` */

insert  into `ev_videos`(`video_id`,`caption`,`vid_url`,`postdate`,`vid_desc`,`img_url`,`published`,`views`,`viewed`,`commented`,`recentview`,`category`,`vid_name`,`uid`) values (2,'kerala -Destination','videos/kerala-Destination.flv','2008-02-21 16:49:57',NULL,'videos/images/destination.gif','N',NULL,333,0,'2009-02-05 10:36:17','Albums','kerala-destination',2),(3,'Indian Tradition - Kadakali','videos/Kathakali.flv','2008-02-21 16:49:57',NULL,'videos/images/kathakali.gif','N',NULL,37,0,'2008-09-29 08:45:01','Albums','kathakali',2),(4,'Chintamani','videos/Chintamani.flv','2008-02-21 16:49:57',NULL,'videos/images/chindamani.gif','N',NULL,25,0,'2008-08-24 10:43:51','Albums','chindamani',2),(5,'Manjeeram','videos/Manjeeram .flv','2008-02-21 16:49:57',NULL,'videos/images/manjeeram.gif','N',NULL,10,0,'2008-07-16 13:33:25','Albums','manjeeram',2),(6,'Poorakkali','videos/Poorakkali.flv','2008-02-21 16:49:57',NULL,'videos/images/poora.gif','N',NULL,9,NULL,'2008-07-23 13:12:08','Albums','poorakkali',2),(7,'Amritha-Vanitha Ratnam','videos/Vanitha.flv','2008-02-21 16:49:57',NULL,'videos/images/amritha.gif','N',NULL,8,NULL,'2008-07-24 10:22:55','Albums','Amritha ',2),(8,'Nehru Trophi- Boat Race','videos/Nehru.flv','2008-02-21 16:49:57',NULL,'videos/images/nehrutrophi.gif','N',NULL,40,0,'2008-07-24 07:40:22','Albums','nehrutrophi',2),(9,'chenmbakam - Malayalam Album','videos/chembakam.flv','2008-02-21 16:49:57',NULL,'videos/images/chembakam.gif','N',NULL,NULL,0,'2008-10-30 14:25:43','Albums','chenmbakam',2),(10,'Malabar Gold Inauguration -Sharja ','videos/malabar.flv','2008-07-23 10:00:29','','videos/images/malabar.gif','N',NULL,NULL,NULL,'2008-11-30 16:39:31','Event',NULL,2),(11,'Mohiniyattam','videos/Mohiniyattam.flv','2008-07-23 11:46:48','','videos/images/Mohiniyattam.jpg','N',NULL,NULL,NULL,'2008-12-19 04:14:32','Stage Shows','Mohiniyattam - Kerala',2),(12,'Skit-Bharatham','videos/Skit.flv','2008-07-23 11:54:45','','videos/images/SKIT.jpg','N',NULL,NULL,NULL,'2008-09-29 08:58:47','Stage Shows','Skit - Bharatham',2),(13,'Olympics 2008- Inauguration Ceremony','videos/olympics1.flv','2008-08-09 05:47:04','','videos/images/olympic1.jpg','N',NULL,NULL,NULL,'2008-09-25 07:37:31','Events','Olympics 2008',2),(14,'Olympics 2008- Inauguration Ceremony','videos/olympics2.flv','2008-08-09 07:35:20','','videos/images/olympic2.jpg','N',NULL,NULL,NULL,'2008-09-15 09:12:26','Events','Olympics 2008',2),(15,'Olympics 2008- Inauguration Ceremony','videos/olympics3.flv','2008-08-09 07:35:41','','videos/images/olympic3.jpg','N',NULL,NULL,NULL,'2008-09-24 06:32:43','Events','Olympics 2008',2),(16,'Olympics 2008- Inauguration Ceremony','videos/olympics4.flv','2008-08-09 08:05:19','','videos/images/olympics4.jpg','N',NULL,NULL,NULL,'2008-09-15 12:57:32','Events','Olympics 2008',2),(17,'Programme on Governance of .....','videos/p1.flv','2008-09-17 10:30:47','																								Programme on Governance of Public Service providers of State owned Enterprises																																				','videos/images/P1.jpg','N',NULL,NULL,NULL,'2009-09-25 06:19:32','Show Reels','R I A B',2),(18,'Programme on Governance of .....','videos/p2.flv','2008-09-17 12:30:10','																		Programme on Governance of Public Service providers of State owned Enterprises																														','videos/images/p2.jpg','N',NULL,NULL,NULL,'2009-09-07 11:03:53','Show Reels','R I A B',2),(19,'Programme on Governance of .....','videos/p3.flv','2008-09-17 13:04:48','																								Programme on Governance of Public Service providers of State owned Enterprises																								','videos/images/p3.jpg','N',NULL,NULL,NULL,'2009-09-18 09:43:30','Show Reels','R I A B',2),(20,'Programme on Governance of .....','videos/p4.flv','2008-09-18 06:08:45','												Programme on Governance of Public Service providers of State owned Enterprises														','videos/images/p4.jpg','N',NULL,NULL,NULL,'2009-09-18 09:50:58','Show Reels','R I A B',2),(22,'PSU Award Ceremony 2007','videos/p5.flv','2008-09-18 06:32:20','												PSU Award Ceremony 2007												','videos/images/p5.jpg','N',NULL,NULL,1,'2009-09-15 16:59:27','Show Reels','PSU Award Ceremony',2),(23,'PSU Award Ceremony 2007','videos/p6.flv','2008-09-18 10:27:41','						PSU Award Ceremony 2007						','videos/images/p6.jpg','N',NULL,NULL,NULL,'2009-09-18 09:40:59','Show Reels','PSU Award Ceremony',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
