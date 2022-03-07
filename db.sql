/*
SQLyog Enterprise - MySQL GUI v5.29
Host - 5.5.5-10.4.21-MariaDB : Database - backlink
*********************************************************************
Server version : 5.5.5-10.4.21-MariaDB
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `backlink`;

USE `backlink`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `tblcontact` */

DROP TABLE IF EXISTS `tblcontact`;

CREATE TABLE `tblcontact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_payment_email` varchar(100) DEFAULT NULL,
  `skype` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(100) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblcontact` */

insert  into `tblcontact`(`id`,`customer_name`,`customer_email`,`customer_payment_email`,`skype`,`whatsapp`,`note`,`created_at`,`updated_at`) values (1,'test121','test@test.com','test@test.com','efsdfdsf','222222222222','fsf s fsf s fsf s fsf s fsf s fsf s fsf s fsf s fsf s fsf s fsf s fsf s fsf s fsf s fsf s fsf s fsf s','2022-03-07 06:08:33','2022-03-07 06:08:33');

/*Table structure for table `tblproject` */

DROP TABLE IF EXISTS `tblproject`;

CREATE TABLE `tblproject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) DEFAULT NULL,
  `project_name` varchar(100) DEFAULT NULL,
  `project_url` varchar(100) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblproject` */

insert  into `tblproject`(`id`,`cust_id`,`project_name`,`project_url`,`note`,`created_at`,`updated_at`) values (1,1,'sa dsadad sad asd','adsadsa d','sad asd asd','2022-03-07 06:08:46','2022-03-07 06:08:46');

/*Table structure for table `tbltransaction` */

DROP TABLE IF EXISTS `tbltransaction`;

CREATE TABLE `tbltransaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_id` int(11) DEFAULT NULL,
  `proj_id` int(11) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `transaction_expire_date` date DEFAULT NULL,
  `price` float DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbltransaction` */

insert  into `tbltransaction`(`id`,`cust_id`,`proj_id`,`transaction_date`,`transaction_expire_date`,`price`,`note`,`created_at`,`updated_at`) values (1,1,1,'2022-03-23','2022-03-30',100,'f gdg dg dfg fd g','2022-03-07 06:09:17','2022-03-07 06:09:17');

/*Table structure for table `tbluser` */

DROP TABLE IF EXISTS `tbluser`;

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_address` varchar(100) DEFAULT NULL,
  `user_pass` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbluser` */

insert  into `tbluser`(`id`,`email_address`,`user_pass`,`created_at`,`updated_at`) values (1,'admin@ultrapurelife.com','$2y$10$MXWR.epd5skzrY0K3ftlMOWGllS9homUL364dtiiKoS3Dwi3QqI/K','2022-02-28 22:06:54','2022-02-28 16:36:54'),(3,'test@test.com','$2y$10$sH25YYi.LiomngyadsJZ4Ou5xzkFSWbgbZBtIJvhVFu0x6UEW9Y..','2022-03-01 18:01:23','2022-03-01 18:01:23');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
