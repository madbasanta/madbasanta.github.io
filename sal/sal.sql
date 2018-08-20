/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.1.73-community : Database - sal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sal` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `sal`;

/*Table structure for table `chats` */

DROP TABLE IF EXISTS `chats`;

CREATE TABLE `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chats_user_id_foreign_key` (`user_id`),
  CONSTRAINT `chats_user_id_foreign_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `chats` */

insert  into `chats`(`id`,`message`,`user_id`,`created_at`) values (16,'hey guys i want to discuss about sal',5,NULL),(18,'ok sure i will do that',5,NULL),(20,'thanks man',5,NULL),(21,'wher is forum i cant find it',5,NULL),(23,'got you',5,NULL),(24,'hey ho to donate this site?',11,NULL);

/*Table structure for table `donors` */

DROP TABLE IF EXISTS `donors`;

CREATE TABLE `donors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pay_amt` int(11) DEFAULT '0',
  `pay_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `donors_user_id_foreign_key` (`user_id`),
  CONSTRAINT `donors_user_id_foreign_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `donors` */

insert  into `donors`(`id`,`user_id`,`pay_amt`,`pay_date`) values (3,5,10,'2018-07-18'),(4,5,10,'2018-07-18'),(5,6,5,NULL),(6,11,100,'2018-07-19');

/*Table structure for table `forum` */

DROP TABLE IF EXISTS `forum`;

CREATE TABLE `forum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `forum` */

insert  into `forum`(`id`,`title`) values (1,'why is this colabery d?'),(2,'birko ma lako chini ma kasari pasyo kamilo?');

/*Table structure for table `newsletter` */

DROP TABLE IF EXISTS `newsletter`;

CREATE TABLE `newsletter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `newsletter` */

insert  into `newsletter`(`id`,`email`) values (1,'basanta@gmail.com'),(2,'kabadi@gmail.com');

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `forum_id` int(10) unsigned DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `forum_id` (`forum_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `posts` */

insert  into `posts`(`id`,`body`,`forum_id`,`user_name`,`created_at`) values (1,'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',2,'Basanta Tajpuriya','2018-07-16'),(2,'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',2,'Suresh Saithwar','2018-07-16'),(3,'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.',1,'Suresh Saithwar','2018-07-16'),(4,'i dont have my image',1,'Lenora Wilkerson','2018-07-16'),(5,'It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.It was popularised in the 1960s with the release of Letraset.',2,'Pratik Tajpuriya','2018-07-18');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `addopted` tinyint(1) DEFAULT '0',
  `adp_start_date` date DEFAULT NULL,
  `adp_end_date` date DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `locality` varchar(255) DEFAULT NULL,
  `region` varchar(255) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `postbox_no` varchar(50) DEFAULT NULL,
  `street_add` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`dob`,`gender`,`addopted`,`adp_start_date`,`adp_end_date`,`country`,`locality`,`region`,`postal_code`,`postbox_no`,`street_add`,`image`) values (2,'aaa','se@gmail.com','dc468c70fb574ebd07287b38d0d0676d','0000-00-00',NULL,0,NULL,NULL,'',NULL,'','',NULL,'',NULL),(5,'Suresh Saithwar','suresh@host.com','0f359740bd1cda994f8b55330c86d845','1995-07-26','Male',1,'2016-03-03','2019-01-10','Nepal','Kathmandu','Central','44600','088012','Gwarko, Imadol','public/images/users/1531480855suresh.jpg'),(6,'Lenora Wilkerson','izupado@host.test','0f359740bd1cda994f8b55330c86d845','1990-07-25','Male',1,'2000-01-01','2005-01-01','3','heb','di','eto','hur','ipsen',NULL),(7,'Jeffery Beck','zelfugiz@host.invalid','0f359740bd1cda994f8b55330c86d845','1990-07-25','Female',1,'2000-01-01','2005-01-01','63','abmoado','pe','ihcugiru','une','icamowot',NULL),(11,'Basanta Tajpuriya','basanta@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99','1999-02-25','Male',1,'2017-05-01','2017-08-03','Nepal','Jhapa','Estern','6464',NULL,'Sivasatakshi','public/images/users/1531483984me.jpg');

/*Table structure for table `visitors` */

DROP TABLE IF EXISTS `visitors`;

CREATE TABLE `visitors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `visitors` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

/*Data for the table `visitors` */

insert  into `visitors`(`id`,`visitors`) values (3,115),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
