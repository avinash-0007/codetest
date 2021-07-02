/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.4.6-MariaDB : Database - agendadb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`agendadb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `agendadb`;

/*Table structure for table `agenda` */

DROP TABLE IF EXISTS `agenda`;

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `schedule_date` varchar(255) DEFAULT NULL,
  `status` enum('completed','upcoming','running','cancelled') DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `agenda` */

insert  into `agenda`(`id`,`title`,`description`,`schedule_date`,`status`,`created_date`,`updated_date`) values (2,'Meeting for Software','New project need to be developed','07/16/2021 12:33 PM','upcoming','2021-07-02 09:03:36',NULL),(4,'Meeting for Hardware','New hardware requirement for new employees','7/16/2021 12:33','upcoming','2021-07-02 09:53:46',NULL),(5,'Meeting for Project Schedule','Share the project schedule as per client requirement','07/02/2021 1:34 PM','upcoming','2021-07-02 10:13:21',NULL),(6,'Meeting for New Requirement','New requirement like sms feature','07/03/2021 1:55 PM','upcoming','2021-07-02 10:25:15',NULL),(7,'Meeting for KT','meeting for kt of our employee.','07/02/2021 2:40 PM','upcoming','2021-07-02 11:06:43','2021-07-02 11:10:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
