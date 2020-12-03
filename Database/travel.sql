/*
SQLyog Professional v12.09 (64 bit)
MySQL - 10.1.19-MariaDB : Database - travel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`travel` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `travel`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `Cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `Cat_name` varchar(2000) NOT NULL,
  PRIMARY KEY (`Cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`Cat_id`,`Cat_name`) values (21,'International'),(22,'National');

/*Table structure for table `contactus` */

DROP TABLE IF EXISTS `contactus`;

CREATE TABLE `contactus` (
  `contactid` int(50) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Phno` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` varchar(5000) NOT NULL,
  PRIMARY KEY (`contactid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `contactus` */

insert  into `contactus`(`contactid`,`Name`,`Phno`,`Email`,`Message`) values (11,'anjit','98455555551','anjit.basnet.1@gmail.com','hgfdsdxcvbn');

/*Table structure for table `enquiry` */

DROP TABLE IF EXISTS `enquiry`;

CREATE TABLE `enquiry` (
  `Enquiryid` int(50) NOT NULL AUTO_INCREMENT,
  `Packageid` int(50) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Mobileno` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `NoofDays` int(50) NOT NULL,
  `Child` int(50) NOT NULL,
  `Adults` int(50) NOT NULL,
  `Message` varchar(900) NOT NULL,
  `Statusfield` varchar(200) NOT NULL,
  PRIMARY KEY (`Enquiryid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `enquiry` */

insert  into `enquiry`(`Enquiryid`,`Packageid`,`Name`,`Gender`,`Mobileno`,`Email`,`NoofDays`,`Child`,`Adults`,`Message`,`Statusfield`) values (32,35,'anjit','Male','9845555551','anjit.basnet.1@gmail.com',4,0,0,'gvrsgre','Pending');

/*Table structure for table `package` */

DROP TABLE IF EXISTS `package`;

CREATE TABLE `package` (
  `Packid` int(200) NOT NULL AUTO_INCREMENT,
  `Packname` varchar(1000) NOT NULL,
  `Category` int(200) NOT NULL,
  `Subcategory` int(200) NOT NULL,
  `Packprice` int(200) NOT NULL,
  `Pic1` varchar(8000) NOT NULL,
  `Pic2` varchar(8000) NOT NULL,
  `Pic3` varchar(8000) NOT NULL,
  `Detail` varchar(8000) NOT NULL,
  PRIMARY KEY (`Packid`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `package` */

insert  into `package`(`Packid`,`Packname`,`Category`,`Subcategory`,`Packprice`,`Pic1`,`Pic2`,`Pic3`,`Detail`) values (35,'7 days package   ',22,35,15000,'back.png','dashain-swing-1290x540.jpg','boy.jpg','dfscvfgd');

/*Table structure for table `subcategory` */

DROP TABLE IF EXISTS `subcategory`;

CREATE TABLE `subcategory` (
  `Subcatid` int(200) NOT NULL AUTO_INCREMENT,
  `Subcatname` varchar(1000) NOT NULL,
  `Catid` int(200) NOT NULL,
  `Pic` varchar(8000) NOT NULL,
  `Detail` varchar(8000) NOT NULL,
  PRIMARY KEY (`Subcatid`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `subcategory` */

insert  into `subcategory`(`Subcatid`,`Subcatname`,`Catid`,`Pic`,`Detail`) values (35,'ABC',22,'lions.jpg','										i know that								'),(36,'mardi',22,'images.jpg','rdfdewf');

/*Table structure for table `tbl_admin` */

DROP TABLE IF EXISTS `tbl_admin`;

CREATE TABLE `tbl_admin` (
  `adm_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `adm_username` varchar(50) DEFAULT NULL,
  `adm_password` varchar(255) DEFAULT NULL,
  `adm_role` enum('admin','general') DEFAULT NULL,
  `adm_status` enum('active','inactive') DEFAULT NULL,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_admin` */

insert  into `tbl_admin`(`adm_id`,`adm_username`,`adm_password`,`adm_role`,`adm_status`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','active'),(3,'anjit','21232f297a57a5a743894a0e4a801fc3','admin','active');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
