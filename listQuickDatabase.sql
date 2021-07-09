/*
SQLyog Ultimate v8.61 
MySQL - 5.5.5-10.4.13-MariaDB : Database - listQuickDatabase
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`listQuickDatabase` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `listQuickDatabase`;

/*Table structure for table `activity_log` */

DROP TABLE IF EXISTS `activity_log`;

CREATE TABLE `activity_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` int(11) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `activity_log` */

/*Table structure for table `assign_estimates` */

DROP TABLE IF EXISTS `assign_estimates`;

CREATE TABLE `assign_estimates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `estimate_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `assign_estimates` */

/*Table structure for table `assign_leads` */

DROP TABLE IF EXISTS `assign_leads`;

CREATE TABLE `assign_leads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `buy_sale_property_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `assign_leads` */

insert  into `assign_leads`(`id`,`created_at`,`updated_at`,`deleted_at`,`buy_sale_property_id`,`agent_id`,`status`) values (9,'2021-07-02 10:18:38','2021-07-02 10:18:38',NULL,16,212,NULL);

/*Table structure for table `buy_sale_properties` */

DROP TABLE IF EXISTS `buy_sale_properties`;

CREATE TABLE `buy_sale_properties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `confirm_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type_id` int(11) DEFAULT NULL,
  `worth_id` int(11) DEFAULT NULL,
  `sale_time_id` int(11) DEFAULT NULL,
  `heard_source_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `requester_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requester_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requester_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `buy_sale_properties` */

insert  into `buy_sale_properties`(`id`,`created_at`,`updated_at`,`deleted_at`,`location`,`lat`,`lng`,`confirm_location`,`unit_number`,`property_type_id`,`worth_id`,`sale_time_id`,`heard_source_id`,`agent_id`,`requester_name`,`requester_phone`,`requester_email`,`request_type`,`country`,`state`,`zip`,`status`) values (1,'2021-05-14 13:31:47','2021-05-14 13:31:47',NULL,'4 Christopher Street, New York, NY, USA',40.7339,-73.9998,'YES','00123',1,6,9,7,NULL,'Walter','000111000','walter@yopmail.com','sale',' USA',' NY',NULL,NULL),(2,'2021-05-14 13:33:58','2021-05-14 13:33:58',NULL,'Tree Drive Northwest, Palmyra, IN, USA',38.4042,-86.1415,NULL,NULL,3,3,8,1,NULL,'Orton','000111001','orton@yopmail.com','buy',' USA',' IN',NULL,NULL),(3,'2021-05-14 13:35:10','2021-05-14 13:35:10',NULL,'New York Avenue Northwest, Washington, DC, USA',38.9032,-77.0211,NULL,NULL,7,14,12,1,NULL,'James Lee','000222001','lee@yopmail.com','buy',' USA',' DC',NULL,NULL),(4,'2021-05-14 13:36:31','2021-05-14 13:36:31',NULL,'New Jersey Turnpike, Woodbridge Township, NJ, USA',40.5557,-74.2681,'YES','1230',1,2,7,9,NULL,'Roman','0000112230','roman@yopmail.com','sale',' USA',' NJ',NULL,NULL),(5,'2021-05-18 09:31:03','2021-05-18 09:31:03',NULL,'Seaside, FL, USA',30.3216,-86.1429,NULL,NULL,3,1,8,3,NULL,'Orton','0001110011','orton@yopmail.com','buy',' USA',' FL',NULL,NULL),(6,'2021-06-11 11:46:37','2021-06-11 11:46:37',NULL,'333 South Alameda Street, Los Angeles, CA, USA',34.0445,-118.239,'YES',NULL,1,5,11,8,NULL,'Sam Rodgers','63455577788','sam@yahoo.com','sale',' USA',' CA',NULL,NULL),(7,'2021-06-11 11:50:23','2021-06-11 11:50:23',NULL,'San Fernando, CA, USA',34.2819,-118.439,NULL,NULL,2,13,12,2,NULL,'Payton Morrow','7768889977','payton@yahoo.com','buy',' USA',' CA',NULL,NULL),(8,'2021-06-17 09:50:10','2021-06-17 09:50:10',NULL,'Japan, Tokyo, Chuo City, Nihonbashi-Bakurochō2 Chome−2−1 DDD HOTEL',35.6952,139.783,'YES','4',1,2,7,9,NULL,'bbbb','12345678','abc@ddd.com','sale',' Nihonbashi-Bakurochō2 Chome−2−1 DDD HOTEL',' Chuo City',NULL,NULL),(9,'2021-06-17 17:09:10','2021-06-17 17:09:10',NULL,'New York, NY, USA',40.7128,-74.006,'YES',NULL,4,2,7,8,NULL,'riti','202-555-0144','ritisharma.2009@gmail.com','sale',' USA',' NY',NULL,NULL),(10,'2021-06-17 17:14:31','2021-06-17 17:14:31',NULL,'New York, NY, USA',40.7128,-74.006,NULL,NULL,3,10,8,3,NULL,'riti','+1-202-555-0169','ritisharma','buy',' USA',' NY',NULL,NULL),(11,'2021-06-18 05:40:40','2021-06-18 05:40:40',NULL,'Lilburn, GA 30047, USA',33.8681,-84.1118,NULL,NULL,2,3,13,10,NULL,'Lisaa wilson','4048972368','hotgirl@gmail.com','buy',' USA',' GA 30047',NULL,NULL),(12,'2021-06-21 18:29:34','2021-06-21 18:29:34',NULL,'3333 Bristol St, Costa Mesa, CA, USA',33.6918,-117.889,'YES',NULL,1,7,7,6,NULL,'Tom Johnson','6543337788','tom@gmail.com','sale',' USA',' CA',NULL,NULL),(13,'2021-07-01 07:53:00','2021-07-01 07:53:00',NULL,'Florence, Metropolitan City of Florence, Italy',43.7696,11.2558,NULL,NULL,2,1,8,1,NULL,'testing','044440055','testing@gmail.com','buy',' Italy',' Metropolitan City of Florence',NULL,NULL),(14,'2021-07-01 07:56:07','2021-07-01 07:56:07',NULL,'Uşak, Uşak Merkez/Uşak, Turkey',38.6742,29.4059,NULL,NULL,7,14,8,4,NULL,'testing','66232562365','testing @gmail.com','buy',' Turkey',' Uşak Merkez/Uşak',NULL,NULL),(15,'2021-07-02 07:40:03','2021-07-02 07:40:03',NULL,'28201 Franklin Parkway, Valencia, CA, USA',34.435,-118.631,'YES',NULL,1,6,9,6,NULL,'Kyle York','5435432334','kyle@yahoo.com','sale',' USA',' CA',NULL,NULL),(16,'2021-07-02 07:50:59','2021-07-02 07:50:59',NULL,'Santa Fe, NM, USA',35.687,-105.938,NULL,NULL,2,1,8,1,NULL,'jade johnson','3432221144','jade@gmail.com','buy',' USA',' NM',NULL,NULL);

/*Table structure for table `chatter_categories` */

DROP TABLE IF EXISTS `chatter_categories`;

CREATE TABLE `chatter_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `chatter_categories` */

insert  into `chatter_categories`(`id`,`parent_id`,`order`,`name`,`color`,`slug`,`status`,`created_at`,`updated_at`) values (11,NULL,1,'General','#5c0700','general','0','2020-12-18 16:41:28','2021-05-04 19:35:47'),(12,NULL,2,'Weekly Poll','#831100','weekly_poll','1','2020-12-18 16:41:37','2021-03-19 22:14:40'),(13,NULL,3,'Industry','#791a3e','industry','1','2020-12-18 16:42:05','2021-03-19 22:14:51'),(14,NULL,4,'Agent Spotlight','#ff2600','agent_spotlight','1','2020-12-18 16:42:16','2021-03-19 22:15:07');

/*Table structure for table `chatter_discussion` */

DROP TABLE IF EXISTS `chatter_discussion`;

CREATE TABLE `chatter_discussion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chatter_category_id` int(10) unsigned NOT NULL DEFAULT 1,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `sticky` tinyint(1) NOT NULL DEFAULT 0,
  `views` int(10) unsigned NOT NULL DEFAULT 0,
  `answered` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT '#232629',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chatter_discussion_slug_unique` (`slug`),
  KEY `chatter_discussion_chatter_category_id_foreign` (`chatter_category_id`),
  KEY `chatter_discussion_user_id_foreign` (`user_id`),
  CONSTRAINT `chatter_discussion_chatter_category_id_foreign` FOREIGN KEY (`chatter_category_id`) REFERENCES `chatter_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `chatter_discussion_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `chatter_discussion` */

insert  into `chatter_discussion`(`id`,`chatter_category_id`,`title`,`user_id`,`sticky`,`views`,`answered`,`created_at`,`updated_at`,`slug`,`color`,`image`) values (1,12,'Where do most of your referrals come from?',2,0,0,0,'2021-05-24 15:44:36','2021-05-24 15:44:36','where-do-most-of-your-referrals-come-from',NULL,'discussion/2b7pXvNcJBdTITnaNDJjk2Q1I7XHy23J03hffEWE.png'),(3,13,'Pandemic Migration - What have you noticed?',2,0,0,0,'2021-05-24 15:47:33','2021-05-24 15:47:33','pandemic-migration-what-have-you-noticed',NULL,'discussion/4duZk0MmYwsrwZiUzeZkxIoEhWMHPMUd3DkVJnRy.png'),(4,14,'Neal Weichel - Santa Clarita, CA',2,0,0,0,'2021-05-24 15:49:43','2021-05-24 15:49:43','neal-weichel-santa-clarita-ca',NULL,'discussion/oWNkVFRm7Bpl4XcLhfrZcob3JQcAmphibzBMcMdW.png');

/*Table structure for table `chatter_post` */

DROP TABLE IF EXISTS `chatter_post`;

CREATE TABLE `chatter_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `chatter_discussion_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `markdown` tinyint(1) NOT NULL DEFAULT 0,
  `locked` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chatter_post_chatter_discussion_id_foreign` (`chatter_discussion_id`),
  KEY `chatter_post_user_id_foreign` (`user_id`),
  CONSTRAINT `chatter_post_chatter_discussion_id_foreign` FOREIGN KEY (`chatter_discussion_id`) REFERENCES `chatter_discussion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `chatter_post_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `chatter_post` */

insert  into `chatter_post`(`id`,`chatter_discussion_id`,`user_id`,`body`,`created_at`,`updated_at`,`markdown`,`locked`,`image`) values (1,1,2,'<p>&nbsp;</p>\r\n<p>&nbsp;</p>','2021-05-24 15:44:36','2021-05-24 15:44:36',0,0,'discussion/2b7pXvNcJBdTITnaNDJjk2Q1I7XHy23J03hffEWE.png'),(3,3,2,'<p>People are relocating more than ever. What have you seen in your area?&nbsp;</p>\r\n<p>(National Association of Realtors)&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Click Here For Details&nbsp;</p>\r\n<p>(https://www.nar.realtor)&nbsp;</p>','2021-05-24 15:47:33','2021-05-24 15:47:33',0,0,'discussion/4duZk0MmYwsrwZiUzeZkxIoEhWMHPMUd3DkVJnRy.png'),(4,4,2,'<p>Neal Weichel</p>','2021-05-24 15:49:43','2021-05-24 15:49:43',0,0,'discussion/oWNkVFRm7Bpl4XcLhfrZcob3JQcAmphibzBMcMdW.png'),(6,1,214,'<p>test</p>\r\n<p>&nbsp;</p>','2021-06-25 08:33:27','2021-06-25 08:33:27',0,0,'no');

/*Table structure for table `chatter_topics` */

DROP TABLE IF EXISTS `chatter_topics`;

CREATE TABLE `chatter_topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `chatter_topics` */

/*Table structure for table `chatter_user_discussion` */

DROP TABLE IF EXISTS `chatter_user_discussion`;

CREATE TABLE `chatter_user_discussion` (
  `user_id` int(10) unsigned NOT NULL,
  `discussion_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`discussion_id`),
  KEY `chatter_user_discussion_user_id_index` (`user_id`),
  KEY `chatter_user_discussion_discussion_id_index` (`discussion_id`),
  CONSTRAINT `chatter_user_discussion_discussion_id_foreign` FOREIGN KEY (`discussion_id`) REFERENCES `chatter_discussion` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chatter_user_discussion_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `chatter_user_discussion` */

insert  into `chatter_user_discussion`(`user_id`,`discussion_id`) values (2,1),(2,3),(2,4);

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contacts` */

insert  into `contacts`(`id`,`created_at`,`updated_at`,`deleted_at`,`name`,`email`,`phone`,`message`,`status`) values (14,'2021-05-29 02:46:01','2021-05-29 02:46:01',NULL,NULL,'aftab@yopmail.com','03001234567','scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently wi',NULL),(15,'2021-05-29 02:46:29','2021-05-29 02:46:29',NULL,NULL,'imcs@yopmail.com','03001234567','Testing. scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently wi',NULL),(16,'2021-05-30 00:43:05','2021-05-30 00:43:05',NULL,NULL,'first@yahoo.com',NULL,'Testing...',NULL),(17,'2021-05-30 09:12:48','2021-05-30 09:12:48',NULL,NULL,'eric.jones.z.mail@gmail.com','555-555-1212','My name’s Eric and I just came across your website - listquick.net - in the search results.\r\n\r\nHere’s what that means to me…\r\n\r\nYour SEO’s working.\r\n\r\nYou’re getting eyeballs – mine at least.\r\n\r\nYour content’s pretty good, wouldn’t change a thing.\r\n\r\nBUT…\r\n\r\nEyeballs don’t pay the bills.\r\n\r\nCUSTOMERS do.\r\n\r\nAnd studies show that 7 out of 10 visitors to a site like listquick.net will drop by, take a gander, and then head for the hills without doing anything else.\r\n\r\nIt’s like they never were even there.\r\n\r\nYou can fix this.\r\n\r\nYou can make it super-simple for them to raise their hand, say, “okay, let’s talk” without requiring them to even pull their cell phone from their pocket… thanks to Talk With Web Visitor.\r\n\r\nTalk With Web Visitor is a software widget that sits on your site, ready and waiting to capture any visitor’s Name, Email address and Phone Number.  It lets you know immediately – so you can talk to that lead immediately… without delay… BEFORE they head for those hills.\r\n  \r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nNow it’s also true that when reaching out to hot leads, you MUST act fast – the difference between contacting someone within 5 minutes versus 30 minutes later is huge – like 100 times better!\r\n\r\nThat’s what makes our new SMS Text With Lead feature so powerful… you’ve got their phone number, so now you can start a text message (SMS) conversation with them… so even if they don’t take you up on your offer right away, you continue to text them new offers, new content, and new reasons to do business with you.\r\n\r\nThis could change everything for you and your business.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to learn more about everything Talk With Web Visitor can do and start turing eyeballs into money.\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – you could be converting up to 100x more leads immediately!   \r\nIt even includes International Long Distance Calling. \r\nPaying customers are out there waiting. \r\nStarting connecting today by CLICKING HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=listquick.net',NULL),(18,'2021-06-03 20:46:41','2021-06-03 20:46:41',NULL,NULL,'viscardi1982firewa@gmail.com','8207007956','AbUKSJeMwulDPh',NULL),(19,'2021-06-03 20:46:58','2021-06-03 20:46:58',NULL,NULL,'viscardi1982firewa@gmail.com','4257222474','BCZOTgsVidMPqHtl',NULL),(20,'2021-06-04 12:44:07','2021-06-04 12:44:07',NULL,NULL,'eric.jones.z.mail@gmail.com','555-555-1212','Hey, this is Eric and I ran across listquick.net a few minutes ago.\r\n\r\nLooks great… but now what?\r\n\r\nBy that I mean, when someone like me finds your website – either through Search or just bouncing around – what happens next?  Do you get a lot of leads from your site, or at least enough to make you happy?\r\n\r\nHonestly, most business websites fall a bit short when it comes to generating paying customers. Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment.\r\n\r\nHere’s an idea…\r\n \r\nHow about making it really EASY for every visitor who shows up to get a personal phone call you as soon as they hit your site…\r\n \r\nYou can –\r\n  \r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nCLICK HERE http://talkwithcustomer.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nYou’ll be amazed - the difference between contacting someone within 5 minutes versus a half-hour or more later could increase your results 100-fold.\r\n\r\nIt gets even better… once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation.\r\n  \r\nThat way, even if you don’t close a deal right away, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nPretty sweet – AND effective.\r\n\r\nCLICK HERE http://talkwithcustomer.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE http://talkwithcustomer.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithcustomer.com/unsubscribe.aspx?d=listquick.net',NULL),(21,'2021-06-05 02:04:52','2021-06-05 02:04:52',NULL,NULL,'eric.jones.z.mail@gmail.com','555-555-1212','My name’s Eric and I just found your site listquick.net.\r\n\r\nIt’s got a lot going for it, but here’s an idea to make it even MORE effective.\r\n\r\nTalk With Web Visitor – CLICK HERE https://talkwithwebvisitors.com for a live demo now.\r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It signals you the moment they let you know they’re interested – so that you can talk to that lead while they’re literally looking over your site.\r\n\r\nAnd once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation… and if they don’t take you up on your offer then, you can follow up with text messages for new offers, content links, even just “how you doing?” notes to build a relationship.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nThe difference between contacting someone within 5 minutes versus a half-hour means you could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Studies show that 70% of a site’s visitors disappear and are gone forever after just a moment. Don’t keep losing them. \r\nTalk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=listquick.net',NULL),(22,'2021-06-05 15:42:40','2021-06-05 15:42:40',NULL,NULL,'kuban.video@bk.ru','84194539836','<a href=https://kuban.video/video/8-panorama-raevskoj.html>станица раевская</a>',NULL),(23,'2021-06-07 18:27:51','2021-06-07 18:27:51',NULL,NULL,'donny.phelan@gmail.com','313-441-9370','Stats show that people are spending too much on ads online. Some sites are paying as much as $50 per click! This happens because there are too many sites all advertising at the same places. For example, Google is one of the oldest online advertisers around and they have literally billions of websites advertising with them. This creates a level of ad saturation that can only be fixed with higher bids for clicks. You see, the more they charge for clicks the less ads they have to show and that\'s good for them. Now it\'s time to do what\'s good for you! We can generate niche targeted clicks for you using ads that appear on news websites like cnn.com for less than a penny each! Money back guarantee if you\'re not satisfied: http://bit.ly/boost-web-traffic-now',NULL),(24,'2021-06-10 13:42:06','2021-06-10 13:42:06',NULL,NULL,'gonzalo.conti@gmail.com',NULL,'Don\'t buy traffic for your website until you\'ve seen this first:  http://bit.ly/boost-web-traffic-now',NULL),(25,'2021-06-14 13:37:54','2021-06-14 13:37:54',NULL,NULL,'mansour.dann@gmail.com','06-57518827','Don\'t buy traffic for your website until you\'ve seen this first:  http://bit.ly/boost-web-traffic-now',NULL),(26,'2021-06-14 21:24:48','2021-06-14 21:24:48',NULL,NULL,'no-reply@google.com','88641233927','Greetings \r\n \r\nI have just took an in depth look on your  listquick.net for the ranking keywords and saw that your website could use a push. \r\n \r\nWe will improve your SEO metrics and ranks organically and safely, using only whitehat methods, while providing monthly reports and outstanding support. \r\n \r\nPlease check our pricelist here, we offer SEO at cheap rates. \r\nhttps://www.hilkom-digital.de/cheap-seo-packages/ \r\n \r\nStart improving your sales and leads with us, today! \r\n \r\nregards \r\nMike Stephen\r\n \r\nHilkom Digital Team \r\nsupport@hilkom-digital.de',NULL),(27,'2021-06-17 05:04:27','2021-06-17 05:04:27',NULL,NULL,'mmxx0684@gmail.com','88747254598','Dear Partner; \r\n \r\nI came across your email contact on Database; Where i was searching for a competent Partner who can handle a lucrative business for me as trustee and manager. I anticipate to read from you soon so I can provide you with more details. \r\n \r\nYours Sincerely, \r\nAlh. Sambo Dasuki \r\nmmxx0684@gmail.com',NULL),(28,'2021-06-17 20:53:20','2021-06-17 20:53:20',NULL,NULL,'abdulahad@rightpathrecruiting.com','18012102116','Hi, We saw your job post on Upwork related to website conversion to an iOS App. We are Right Path Recruiting based in USA  and wanted to connect with you to provide our app development services. We are an outsource company that provide resources and also work on IT related projects.\r\n\r\nPlease review our website: https://rightpathrecruiting.com/',NULL),(29,'2021-06-17 21:28:33','2021-06-17 21:28:33',NULL,NULL,'nick.arora@scrolnext.com','09779944889','Hi,\r\n\r\nMy name is Nick and I have 10+ years of experience in Mobile App development for iOS, Android, React Native & Hybrid cross-platform app using different web technologies.\r\n\r\nI have gone through your website/Application -https://www.listquick.net/ in detail and I feel I am a perfect fit for this job.  Based on the industry standards I am on top-notch hybrid technologies as, Google native script with angular2, Facebook react-native and Microsoft Xamarin. My range of development services includes creating rich web applications or add features to existing ones, web scraping, converting UX designs to fully working responsive apps. \r\nI have worked with many clients including startups, small businesses, and large enterprise-level organizations. My top priorities are quality work, respect for deadlines, and budget. \r\n\r\nHere are my expertise : \r\n\r\nProgramming language: \r\n-- React Native, AngularJS, Angular 2+, JQuery\r\n-- NodeJS (MEAN stack, schedulers/cron jobs, web scraping)\r\n-- Cordova / Phonegap (Ionic framework/ OnsenUI)\r\n-- Java (J2EE/Hibernate/Spring MVC)\r\n-- Websockets (Socket.io)\r\n\r\nDatabase solutions :\r\n- MySQL / MongoDB / Redis / ElasticSearch\r\n\r\nMessaging and marketing solutions:\r\n-- Push notification, In-app purchases\r\n-- Social network including Facebook, Twitter, G+, Instagram, Pinterest, LinkedIn\r\n\r\nPayment gateways:\r\n-- Any Payment gateway (Plaid, Stripe, etc)\r\n\r\nCloud backend services:\r\n-- AWS / Heroku / Parse / Firebase / Google Cloud\r\n\r\nChat service:\r\n-- firebase\r\n-- socket.io\r\n\r\nAds SDKs:\r\n-- iAd\r\n-- Admob\r\n\r\nRepository systems:\r\n-- Github\r\n-- Bitbucket\r\n-- GitLab\r\n\r\nAnalytics & Crash Analytics\r\n-- Google Analytics\r\n-- Firebase\r\n\r\nI can accept design in\r\n-- Sketch\r\n-- Adobe Photoshop\r\n-- Adobe XD\r\n-- Zeplin\r\n\r\nI have worked in different domains with the kind of applications mentioned below:\r\n\r\nArtificial Intelligence\r\n-- Chat Bot, Instagram Bot, Facebook Bot, Face/Voice Recognition\r\n\r\nSocial Apps\r\n-- Dating, Social Networking, Matrimonial, Forums\r\n\r\nWellness & Care \r\n-- Fitness apps, Saloon Booking, Medical Apps, Online consultation\r\n\r\nWealth\r\n-- Finance Apps, Expense Management, Trading apps, Wallets\r\n\r\nTravel\r\n-- Booking flights, hotels, buses & trains, Car rental like Uber\r\n\r\nService Providers\r\n-- Restaurants, Cleaning, Home Delivery apps, Childcare\r\n\r\nEducational\r\n-- Learning apps, Exam preparation\r\n\r\nMarketplace\r\n-- Retail Businesses, Wholesalers, Multi-Vendor apps, Classified\r\n\r\nEntertainment\r\n-- Audio/Video Streaming, Movie Bookings, Event-based apps\r\n\r\nUtility Apps\r\n-- IMs, Calculators, SOS, To-do’s, Calendars, Alarm, GPS\r\n\r\nArt & Design\r\n-- Photo/Video editing, DIY Apps\r\n\r\n\r\nHere is the link for the portfolio: \r\nhttps://scrollnext.com/#mobie_app\r\n\r\nMy recent work:\r\n\r\nhttps://play.google.com/store/apps/details?id=janvikalp.io.jv\r\n\r\nhttps://play.google.com/store/apps/details?id=com.jas.ulove\r\n\r\nhttps://play.google.com/store/apps/details?id=xaviers.connect.io\r\n\r\nMy core abilities are to develop hybrid mobile applications and their integration with back-end services and I am very much committed to collaborating, problem-solving, sophisticated design, and creating essential quality products.\r\n\r\nI am available on Skype/hangouts for communication for more than 16 hours a day. Here are my communication details:\r\n\r\nSkype- nicksanman@gmail.com\r\nHangouts- nick.arora@scrollnext.com\r\n\r\nLooking forward to hearing from you soon.\r\n\r\nRegards,\r\nNick',NULL),(30,'2021-06-18 09:52:31','2021-06-18 09:52:31',NULL,NULL,'cleveland.coon@gmail.com','439 8241','Don\'t buy traffic for your website until you\'ve seen this first:  http://bit.ly/boost-web-traffic-now',NULL),(31,'2021-06-21 09:03:11','2021-06-21 09:03:11',NULL,NULL,'sophie.durr@googlemail.com','(19) 8873-2927','Don\'t buy traffic for your website until you\'ve seen this first:  http://bit.ly/boost-web-traffic-now',NULL),(32,'2021-06-22 16:21:47','2021-06-22 16:21:47',NULL,NULL,'winston@gomail777.com','708-320-3171','Hey guys, Winston here from Iowa.  I just wanted to see if you need anything in the way of site editing/code fixing/programming, unique blog post material, extra traffic by getting others to start sharing your site across their own social media accounts, social media management, optimizing the site, monetizing the site, etc.  I have quite a few ways I can set all of this and do this for you.  Don\'t mean to impose, was just curious, I\'ve been doing this for some time and was just curious if you needed an extra hand. I can even do Wordpress and other related tasks (you name it).\r\n\r\nStay Safe,\r\n\r\nWinston\r\ntel:1-319-382-0597',NULL),(33,'2021-06-23 06:27:53','2021-06-23 06:27:53',NULL,NULL,'nickyxxx@alice.it','82242415369','Hello, \r\n \r\nDownload Music Private FTP: http://0daymusic.org/premium.php \r\nLabel, LIVESETS, Music Videos, TV Series. \r\nDownload Dance, Electro, House, Techno, Trance, Pop, Rock, Rap... \r\n \r\nBest regards, \r\n0day MP3s',NULL),(34,'2021-06-24 16:45:05','2021-06-24 16:45:05',NULL,NULL,'pam.cropper64@msn.com','02602 11 30 39','Don\'t buy traffic for your website until you\'ve seen this first:  http://bit.ly/boost-web-traffic-now',NULL),(35,'2021-06-24 20:28:40','2021-06-24 20:28:40',NULL,NULL,'baasiminvestment@gmail.com','84885846826','We have business partners who are willing to invest any amount into your business. \r\nFor more information contact: info@baasim.com',NULL),(36,'2021-06-25 23:14:10','2021-06-25 23:14:10',NULL,NULL,'evelynngravley103@gmail.com','6070499867','IZNzCkeM',NULL),(37,'2021-06-25 23:14:12','2021-06-25 23:14:12',NULL,NULL,'evelynngravley103@gmail.com','9963612896','NWZtTYhfVDCnFJlQ',NULL),(38,'2021-06-27 17:37:00','2021-06-27 17:37:00',NULL,NULL,'hammack.rodolfo@gmail.com','01.03.46.20.28','Don\'t buy traffic for your website until you\'ve seen this first:  http://bit.ly/boost-web-traffic-now',NULL),(39,'2021-06-30 23:30:21','2021-06-30 23:30:21',NULL,NULL,'mike@digital-x-press.com','88415275593','Hi \r\n \r\nI have just analyzed  listquick.net for  the current search visibility and saw that your website could use an upgrade. \r\n \r\nWe will improve your Ranks organically and safely, using only whitehat methods, \r\n \r\nIf interested, kindly hit reply \r\n \r\nregards \r\nMike Richards\r\n \r\nSEO X Press Digital Agency \r\nsupport@digital-x-press.com',NULL),(40,'2021-07-02 19:28:59','2021-07-02 19:28:59',NULL,NULL,'gironlisabe32@gmail.com','88683142432','Hi there \r\n \r\nIncrease your listquick.net Moz DA Score with us and get more visibility and exposure for your website. \r\nWe have tons of client`s feedbacks that this simple boost doubled their sales in a matter of weeks. \r\n \r\nMore info: \r\nhttps://www.monkeydigital.org/product/moz-da50-seo-plan/ \r\n \r\nNEW: \r\nhttps://www.monkeydigital.org/product/ahrefs-dr50-ur70-seo-plan/ \r\nhttps://www.monkeydigital.org/product/trust-flow-seo-package/ \r\n \r\n \r\nthank you \r\nMike Anderson',NULL),(41,'2021-07-03 11:21:27','2021-07-03 11:21:27',NULL,NULL,'hclicks@rambler.ru','1234567890','Hello! \r\nThis is Greg an I am owner of https://hClicks.com \r\nI just noticed that your site listquick.net does not contain push notifications and I would like to offer you the highest rates for this type of ad! \r\nOnly one step and you will start to get profit. \r\nDo you want to know our advantages? \r\n-> Anti-AdBlock Domains \r\n-> Personal approach \r\n-> Daily payments \r\nTo get the maximum rates, please send your request with a personal code to our support team hClicks-listquick.net-2021. \r\nWe are waiting for you \r\nhttps://hClicks.com',NULL),(42,'2021-07-05 02:14:09','2021-07-05 02:14:09',NULL,NULL,'mozelle.yuen@gmail.com','0480 58 58 73','Boost web traffic quick with this:  http://bit.ly/boost-web-traffic-now',NULL),(43,'2021-07-05 16:33:19','2021-07-05 16:33:19',NULL,NULL,'OlenOn@hotmail.com',NULL,'Here is a list of 18 free traffic sources that you should be using: http://bit.ly/18freetrafficsources',NULL),(44,'2021-07-07 01:47:57','2021-07-07 01:47:57',NULL,NULL,'2vampirorh@ottappmail.com','0328 9526834','You should check this out before you spend another dime advertising your site:  https://bit.ly/dont-pay-for-ads',NULL),(45,'2021-07-08 01:12:30','2021-07-08 01:12:30',NULL,NULL,'estelalaber32@gmail.com','81392286667','Hi \r\n \r\nWe will enhance your Local Ranks organically and safely, using only whitehat methods, while providing Google maps and website offsite work at the same time. \r\n \r\nPlease check our services below, we offer Local SEO at cheap rates. \r\nhttps://speed-seo.net/product/local-seo-package/ \r\n \r\nNEW: \r\nhttps://www.speed-seo.net/product/zip-codes-gmaps-citations/ \r\n \r\nregards \r\nMike Livingston\r\n \r\nSpeed SEO Digital Agency',NULL),(46,'2021-07-08 03:34:59','2021-07-08 03:34:59',NULL,NULL,'truman.dario@googlemail.com','(03) 8317 2576','Boost web traffic quick with this:  http://bit.ly/boost-web-traffic-now',NULL),(47,'2021-07-08 14:50:02','2021-07-08 14:50:02',NULL,NULL,'info.rohtopharmaceutical@gmail.com','87946444624','Hello, \r\n \r\n \r\nWith all due respect. If you are based in United States or Canada, I write to inform you that we need you to serve as our Spokesperson/Financial Coordinator for our company ROHTO PHARMACEUTICAL CO., LTD. and its clients in the United States and Canada. It\'s a part-time job and will only take few minutes of your time daily and it will not bring any conflict of interest in case you are working with another company. If interested reply me using this email address: admin@rohtopharmaceutical.jp \r\n \r\n \r\nYasuhiro Yamada \r\nSenior Executive Officer, \r\nROHTO Pharmaceutical Co.,Ltd. \r\n1-8-1 Tatsumi-nishi, \r\nIkuno-Ku, Osaka, 544-8666, \r\nJapan.',NULL),(48,'2021-07-09 14:27:55','2021-07-09 14:27:55',NULL,NULL,'amira966@protonmail.com','87294276198','Hello Dear,  \r\nAs-salamu alaykum \r\nHope this email meets you at your best, My name is Basmah Amira Bint Saud Bin Abdulaziz Al-Saud from Jeddah, Saudi Arabia,  I have not done business in your country before, I want to invest through you as am not allowed to venture into business as a lady. After Covid-19 Pandemic am not allowed to travel outside my country. \r\n \r\nI need your help to invest a total of USD $25.5 M deposited in a vaults with Euroclear with my names ready to  be invested. \r\n \r\nIf you are interested, kindly contact me to send all proof of funds to you for your consideration. I cannot say everything here. Kindly get back to me if you\'re interested and need more details. \r\nReach me on amira@helasaud.live or helinamoha7@gmail.com. \r\n \r\nBest Regards,  \r\nBasmah Amira Bint Saud Bin Abdulaziz Al-Saud \r\nSaudi Arabia',NULL),(49,'2021-07-09 23:00:18','2021-07-09 23:00:18',NULL,NULL,'loyd.gwendolyn@yahoo.com','01.79.87.08.07','50 Ways To Advertise Your Business For Free On The Internet : https://bit.ly/50-ways-to-advertise-free',NULL);

/*Table structure for table `elites` */

DROP TABLE IF EXISTS `elites`;

CREATE TABLE `elites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `elites` */

insert  into `elites`(`id`,`created_at`,`updated_at`,`deleted_at`,`heading`,`description`,`image`,`status`) values (1,'2021-01-01 07:26:29','2021-04-22 20:03:38',NULL,'Your Talent. Our Tech.','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>','','0'),(2,'2021-01-01 07:27:15','2021-04-22 20:03:44',NULL,'Only The Best Agents.','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it</p>','','0');

/*Table structure for table `emoji` */

DROP TABLE IF EXISTS `emoji`;

CREATE TABLE `emoji` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `emoji` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `emoji` */

insert  into `emoji`(`id`,`created_at`,`updated_at`,`deleted_at`,`user_id`,`post_id`,`emoji`,`status`) values (1,'2021-06-25 08:33:38','2021-06-25 08:33:38',NULL,214,1,'128077;',NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `faqs` */

DROP TABLE IF EXISTS `faqs`;

CREATE TABLE `faqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `faqs` */

insert  into `faqs`(`id`,`created_at`,`updated_at`,`deleted_at`,`type_id`,`title`,`description`,`image`,`status`) values (2,'2020-12-18 16:53:42','2021-04-14 22:20:17',NULL,1,'How Does ListQuick Work?','<p>If you are a top agent in your area, click the sign up button above to create a profile and start your free trial. &nbsp;Once you&#39;re apart of the network you&#39;ll be able to send and recieve referrals to other top agents.</p>','1','1'),(3,'2020-12-18 16:54:10','2021-04-14 22:28:33',NULL,1,'What Does It Cost?','<p>ListQuick is always free a free services to home buyers and home sellers. &nbsp;&nbsp;Becuase of the&nbsp;limited number of agents we accept, ListQuick&nbsp;charges agents a &nbsp;monthly subscription fee to run the community. &nbsp;Call or Email our&nbsp;team for additional details.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>','1','1'),(4,'2021-04-14 22:14:02','2021-04-14 22:30:40',NULL,1,'What else can I expect to see other than referrals?','<p>We are constantly working on features that add value for our agents. Other than referrals, a ListQuick Dashboard offers leads, a mastermind forum, and more.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>','','1'),(5,'2021-04-14 22:16:16','2021-04-14 22:33:39',NULL,1,'Why should I spend time on this instead of Facebook & LinkedIn?','<p>Social media sites are primarily news and entertainment based, even a site like LinkedIn delivers mostly content unrelated to real estate. ListQuick is the first community platform focused solely on your profession. Loging into ListQuick is equvilant to working.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>','','1'),(6,'2021-04-14 22:16:48','2021-04-14 22:35:51',NULL,1,'Why do I have to pay unless I give a referral?','<p>ListQuick is deisnged by agents, for agents. &nbsp;We created this platform to reward the rare individuals who established an impeccable reputation. Those that contribute to the network (by giving a referral) are rewarded with a free month.&nbsp;</p>','','1'),(7,'2021-04-14 22:17:25','2021-04-14 22:22:48','2021-04-14 22:22:48',1,'I get solicited all the time, why is ListQuick worth it?','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>','','1');

/*Table structure for table `heard_sources` */

DROP TABLE IF EXISTS `heard_sources`;

CREATE TABLE `heard_sources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `heard_sources` */

insert  into `heard_sources`(`id`,`created_at`,`updated_at`,`deleted_at`,`name`,`status`,`property_type`) values (1,NULL,'2021-02-17 00:44:59',NULL,'Google','1','buy'),(2,NULL,'2021-02-26 20:40:01',NULL,'Facebook','1','buy'),(3,'2021-02-26 20:40:13','2021-02-26 20:40:13',NULL,'Instagram','1','buy'),(4,'2021-02-26 20:40:24','2021-04-22 22:02:52',NULL,'Friend/Relative','1','buy'),(5,'2021-02-26 20:40:49','2021-02-26 20:40:49',NULL,'Google','1','sale'),(6,'2021-02-26 20:41:07','2021-02-26 20:41:07',NULL,'Facebook','1','sale'),(7,'2021-02-26 20:41:29','2021-04-22 21:55:14',NULL,'Instagram','1','sale'),(8,'2021-02-26 20:43:12','2021-04-22 21:55:03',NULL,'Friend/Relative','1','sale'),(9,'2021-03-09 23:51:09','2021-03-09 23:51:09',NULL,'Other','1','sale'),(10,'2021-04-22 22:03:00','2021-04-22 22:03:00',NULL,'Other','1','buy');

/*Table structure for table `home_conditions` */

DROP TABLE IF EXISTS `home_conditions`;

CREATE TABLE `home_conditions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `home_conditions` */

insert  into `home_conditions`(`id`,`created_at`,`updated_at`,`deleted_at`,`title`,`status`) values (1,NULL,NULL,NULL,'Needs nothing','1'),(2,NULL,NULL,NULL,'Needs a little work','1'),(3,NULL,NULL,NULL,'Needs a lot of work','1'),(4,NULL,NULL,NULL,'Tear down/Remodel','1');

/*Table structure for table `home_extimates` */

DROP TABLE IF EXISTS `home_extimates`;

CREATE TABLE `home_extimates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_condition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double(8,2) DEFAULT NULL,
  `lng` double(8,2) DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `home_extimates` */

insert  into `home_extimates`(`id`,`created_at`,`updated_at`,`deleted_at`,`state`,`location`,`confirm_location`,`selling_time`,`home_condition`,`contract`,`other`,`name`,`email`,`phone`,`lat`,`lng`,`status`) values (1,'2021-05-22 03:43:00','2021-05-22 03:43:00',NULL,' CA','Sens, Embarcadero Center, San Francisco, CA, USA','YES','yes','2','no','Nothing else needed.','smith','smith@yopmail.com','000123456',37.79,-122.40,NULL),(2,'2021-06-11 11:52:33','2021-06-11 11:52:33',NULL,' CA','3990 Heritage Oak Court, Simi Valley, CA, USA','YES','maybe','3','no','no','Dodge Myers','dodge@yahoo.com','7773334422',34.27,-118.72,NULL),(3,'2021-06-17 09:51:43','2021-06-17 09:51:43',NULL,' CA','California City, CA, USA','YES','yes','1','no',NULL,'m','abc@def.ghi','12345678',35.13,-117.99,NULL),(4,'2021-06-17 15:41:56','2021-06-17 15:41:56',NULL,' WV','557 Shadowmar Drive, Clarksburg, WV, USA','YES','yes','1','no','jlkkj','riti','riti.sharma@smartdatainc.net','504-915-3699',39.19,-80.38,NULL),(5,'2021-06-17 17:19:56','2021-06-17 17:19:56',NULL,' LA','New Orleans, LA, USA','YES','yes','3','yes','no',NULL,NULL,NULL,29.95,-90.07,NULL),(6,'2021-06-21 18:38:01','2021-06-21 18:38:01',NULL,'Ustka','Ustka, Poland','YES','yes','1','yes','trt rtg','tr','rt','dgdgf',54.58,16.86,NULL),(7,'2021-06-21 19:00:01','2021-06-21 19:00:01',NULL,' CA','7777 Milliken Avenue, Rancho Cucamonga, CA, USA','YES','maybe','2','no',NULL,'Jamie Jordan','jamie@yahoo.com','5553332233',34.11,-117.56,NULL),(8,'2021-06-22 09:42:48','2021-06-22 09:42:48',NULL,' GA 30080','Smyrna, GA 30080, USA','YES','maybe','1','no',NULL,NULL,NULL,NULL,33.88,-84.51,NULL),(9,'2021-07-01 07:39:53','2021-07-01 07:39:53',NULL,' Florida','Florida Keys, Florida, USA','YES','yes','2','no',NULL,'testing','testing@gmail.com','04440000',24.67,-81.63,NULL);

/*Table structure for table `leaderships` */

DROP TABLE IF EXISTS `leaderships`;

CREATE TABLE `leaderships` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `leaderships` */

insert  into `leaderships`(`id`,`created_at`,`updated_at`,`deleted_at`,`type_id`,`name`,`description`,`image`,`status`) values (1,'2021-01-01 04:38:29','2021-02-25 23:17:05','2021-02-25 23:17:05',2,'JOHN',NULL,'leadership/KkkRGtgunjfddZK9z74SnEnDc82KSS9NuMFb75Tg.png','1'),(2,'2021-01-01 04:39:03','2021-02-25 23:17:11','2021-02-25 23:17:11',2,'Monty',NULL,'leadership/D796YlsdGsKud3YaO4fw8zgdDEblhpubqidsLRNC.png','1'),(3,'2021-01-01 04:39:31','2021-02-25 23:17:15','2021-02-25 23:17:15',1,'Anderson',NULL,'leadership/aTDs9x97dnX0CXFeeodHpKpYt9XOJhAu93oj719F.png','1');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_01_193651_create_roles_permissions_tables',1),(4,'2018_06_15_045804_create_profiles_table',1),(5,'2018_06_15_092930_create_social_accounts_table',1),(6,'2018_06_16_054705_create_activity_log_table',1),(7,'2020_03_20_050141_create_failed_jobs_table',1),(8,'2020_12_07_205636_create_buy_sale_properties_table',2),(9,'2020_12_07_210419_create_property_types_table',3),(10,'2020_12_07_210543_create_worths_table',4),(11,'2020_12_07_210744_create_times_table',5),(12,'2020_12_07_210918_create_heard_sources_table',6),(13,'2016_07_29_171118_create_chatter_categories_table',7),(14,'2016_07_29_171118_create_chatter_discussion_table',7),(15,'2016_07_29_171118_create_chatter_post_table',7),(16,'2016_07_29_171128_create_foreign_keys',7),(17,'2016_08_02_183143_add_slug_field_for_discussions',7),(18,'2016_08_03_121747_add_color_row_to_chatter_discussions',7),(19,'2017_01_16_121747_add_markdown_and_lock_to_chatter_posts',7),(20,'2017_01_16_121747_create_chatter_user_discussion_pivot_table',7),(22,'2020_12_08_011448_create_chatter_topics_table',8),(23,'2020_12_08_191224_create_types_table',9),(24,'2020_12_11_204759_create_leaderships_table',10),(25,'2020_12_11_204953_create_contacts_table',11),(26,'2020_12_11_205401_create_offices_table',12),(27,'2020_12_11_210124_create_reviews_table',13),(28,'2020_12_11_210811_create_faqs_table',14),(29,'2020_12_16_194023_create_testimonials_table',15),(30,'2020_12_16_214229_create_tip_and_tools_table',16),(31,'2020_12_16_215539_create_pages_table',17),(32,'2020_12_23_181627_create_packages_table',18),(33,'2020_12_23_212049_create_user_payments_table',19),(34,'2020_12_25_003107_create_ratings_table',20),(35,'2020_12_30_193240_create_elites_table',21),(36,'2020_12_30_193435_create_presses_table',22),(37,'2021_01_08_222702_create_referals_table',23),(38,'2021_03_01_191207_create_home_conditions_table',24),(39,'2021_03_01_222042_create_home_extimates_table',25),(40,'2021_04_12_204301_create_payment_details_table',26),(41,'2021_05_11_172556_create_assign_leads_table',27),(42,'2021_05_16_041155_create_subscribers_table',28),(43,'2021_05_21_165804_create_assign_estimates_table',29);

/*Table structure for table `offices` */

DROP TABLE IF EXISTS `offices`;

CREATE TABLE `offices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `offices` */

insert  into `offices`(`id`,`created_at`,`updated_at`,`deleted_at`,`name`,`location`,`description`,`lat`,`lng`,`image`,`status`) values (1,'2021-01-01 04:41:28','2021-02-25 23:20:19','2021-02-25 23:20:19','XYZ COMPANY','USA US STATE','Office#A-20,USA Street, USA.','78.767555','-94.6500004','office/UYGMYyqGXot075j2CTYqfgn3yY46XejXdNaLjvQp.png','1'),(2,'2021-01-01 04:42:55','2021-04-30 23:55:37',NULL,'ListQuick, Inc.©','Los Angeles, CA','<p>Santa Monica Blvd Ste 8 PMB 391 Los Angeles ,CA 90029</p>','34.090850','-118.294830','office/OeBHQbrGag3xhl6LlGIs2imYjCRyBZyz6lhRCSxa.png','1');

/*Table structure for table `packages` */

DROP TABLE IF EXISTS `packages`;

CREATE TABLE `packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `packages` */

insert  into `packages`(`id`,`created_at`,`updated_at`,`deleted_at`,`name`,`description`,`price`,`image`,`status`) values (1,'2020-12-25 07:13:00','2021-02-26 00:58:23',NULL,'Silver','Limited Property Requests Access','99',NULL,'1'),(2,'2020-12-25 07:16:08','2021-02-26 00:59:10',NULL,'ListQuick Certified Agent',NULL,'149','1','1');

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pages` */

insert  into `pages`(`id`,`created_at`,`updated_at`,`deleted_at`,`heading`,`description`,`slug`,`image`,`phone`,`status`) values (1,'2020-12-18 23:35:15','2021-06-08 05:08:18',NULL,'Selling your home starts here.','ListQuick Certified Agents&copy; have been carefully selected based on their outstanding track records. Enter your location&nbsp;below to be connected with the top agents in your area.&nbsp;\r\n\r\n<hr />\r\n<p>&nbsp;</p>','thinking_of_selling','',NULL,'1'),(2,'2020-12-18 23:35:57','2021-04-04 00:33:10',NULL,'Who\'s Really The Best Real Estate Agent In Your Area?','<p>Top real estate agents <strong>sell homes quicker</strong> and for a higher price. Additionally, expert agents can help you navigate much of the tricky contingencies and paperwork of selling your home. We have analyzed agents <strong>across the country</strong> so it&rsquo;s easy to get connected with the <strong>best</strong> near you, for free.</p>','hire_agent','',NULL,'1'),(3,'2020-12-19 15:29:55','2021-06-03 07:32:11',NULL,'Get a Home Estimate that is actually accurate.','<p>Other websites&nbsp;boast about fancy&nbsp;<strong>algorithms</strong> yet often&nbsp;<strong>misvalue</strong> your home. Sometimes by a lot. Some sites even go so far as to tell you what your home is worth AND offer to buy it from you at that price...(conflict of interest!)</p>\r\n\r\n<p>We rely on <strong>experts</strong>&nbsp;that work in your market to give you a <strong>true estimate</strong> on what price your home will most likely sell for.&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>','sell_our_network','page/I1iKRhIcFPkAgoLhyiyJ3oELFHAZrckL4lOVrDSp.png',NULL,'1'),(4,'2020-12-19 15:36:51','2021-04-04 00:38:16',NULL,'Interact the way you want.','<p>Some people prefer emailing at their leisure, others want to talk to a <strong>real person </strong>right now. <strong>We&#39;re Here For You</strong>, no matter what your preference. If you&#39;d prefer to speak with someone now, <strong>reach us anytime</strong> at our toll-free number.</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>','lets_talk','page/bA5fi6zve49too4cJXxNpURImH7lSMTnRiepEoMk.jpg','(800) 588-9612','1'),(5,'2020-12-19 17:59:03','2021-03-20 16:13:48',NULL,'No More Rolling the Dice.','<hr />\r\n<p>Your house is likely the <strong>most valuable</strong> thing you own. Choosing an agent to help you sell your home based on billboards is a risky idea.</p>\r\n\r\n<p>When you choose an agent<em> </em>through <strong>ListQuick</strong>&nbsp;you can rest assured that you have the <strong>best of the best</strong> representing you.</p>\r\n\r\n<p>Additionally, when you work with a <strong>ListQuick Certified Agent&copy;</strong> a portion of the agent&#39;s commission goes to helping end homelessness in your area. We have partnered with<strong> 50 different non-profits</strong> across the country to help make this happen!</p>\r\n\r\n<p><strong>Reach out</strong> to us with any questions or requests below.</p>','real_estate_change','page/e22NNem8oMWi9DtRSabApYxwz0uQVd78niznOvTz.mp4',NULL,'1'),(6,'2020-12-19 18:00:37','2021-06-13 05:45:00',NULL,'Vetted-Out Objectively','<p>We personally hand-picked each agent in our network based on hours of research and specific criteria.</p>','data_driven','',NULL,'1'),(7,'2020-12-19 18:01:37','2021-03-20 16:19:12',NULL,'Agents for Everyone','<p>We have identified the best agents that can serve a multitude of languages and personality types.</p>','unparalleled_network','',NULL,'1'),(8,'2020-12-19 18:02:25','2021-03-20 16:19:28',NULL,'Across America','<p>We have agents available in every major city across the country, adding to the list every day.</p>','operating_at_scale','',NULL,'1'),(9,'2021-01-01 05:32:33','2021-05-01 00:01:28',NULL,'Contact Us','<p>If you have questions, need help, or are looking for an agent in a particular area, reach out to us here and we&#39;ll get back to you as soon as humanly possible.</p>','contact_us','',NULL,'1'),(10,'2021-01-01 05:33:13','2021-03-20 16:26:11',NULL,'Meet the Criteria','<p>We have specific standards for who we invite to become a ListQuick Certified Agent&copy;. If you believe you are a top agent in your area, reach out to us today.</p>','upfront_costs','',NULL,'1'),(11,'2021-01-01 05:34:20','2021-03-20 16:31:41',NULL,'Pre-Approved Leads','<p>Referrals from ListQuick are structured to be&nbsp;vetted out and motivated, just like our agents. &nbsp;</p>','transaction_ready_clients','',NULL,'1'),(12,'2021-01-01 05:41:00','2021-02-25 23:48:15',NULL,'Earn More Business','ListQuick is designed to reward the hardest working agents.  Your reviews will translate to more referrals when you join the ListQuick Network.','close_more_deals','',NULL,'1'),(13,'2021-01-01 05:41:59','2021-06-13 05:46:49',NULL,'Apply','<p>Fill out the application form and check your email for our response.</p>\r\n\r\n<p>&nbsp;</p>','create_profile','page/g0Jzdms1yJhskjZ3f2aVnonCuhVH55aJOG8eD3B9.png',NULL,'1'),(14,'2021-01-01 05:43:06','2021-06-13 05:46:12',NULL,'Keep an Eye Out','<p>If we sent you an &quot;approved&quot; email, then you can activate your account and begin using ListQuick.</p>','refferal_agreement','',NULL,'1'),(15,'2021-01-01 05:44:04','2021-02-26 00:10:56',NULL,'Network','Fill out your profile information and start enjoying the benefits of the ListQuick Network.','update_transaction','',NULL,'1'),(16,'2021-01-01 05:44:35','2021-03-20 16:36:38',NULL,'Know someone we don\'t?','<p>If you know an agent that belongs in the ListQuick Network&copy; that has not yet joined, refer&nbsp;them to us below.</p>','how_can_we_help','',NULL,'1'),(17,'2021-01-01 05:47:39','2021-02-27 01:04:57',NULL,'Carlton jack','lie Wyss earned over $1 million in commissions from HomeLight “I\'m 100% dedicated to the ListQuick system.<br><br> This is my absolute number one lead source other than my past clients. ListQuick has really created a system where the consumer trusts that they\'re getting the right agent. And that’s the difference.”','achievement','page/VF2ePgnpBpgPk1x37KppzyGAwYyQw4kFXCWv9iWD.mp4',NULL,'0'),(18,'2021-01-01 05:48:37','2021-06-13 05:53:45',NULL,'Send Referrals','<p>A vetted-out, plug and play referral system has been needed for far too long. Now, it is finally available to the agents that serve clients best. Now when your client is moving out of the area, you know the best agent to refer them to.</p>','customize_profile','',NULL,'1'),(19,'2021-01-01 05:49:24','2021-06-13 05:56:00',NULL,'Receive Referrals','<p>As a top agent, much of your business likely comes from referrals. That being said, there is still a significant amount of referrals you are missing out on. Putting yourself in front of the other top agents across the country maximizes potential for referral based business. Oh, and you&#39;ll be one of 3 agents in your area, not one of 20.</p>','connect_with_clients','',NULL,'1'),(20,'2021-01-01 05:50:50','2021-06-13 05:57:21',NULL,'Mastermind','<p>There are many micro mastermind groups available to top agents. Never before has a complete nationwide network been created and certified for the best real estate agents in America to exchange advice and ideas, until now.</p>','access_to_tools','',NULL,'1'),(21,'2021-01-01 05:53:23','2021-06-13 05:49:13',NULL,'Total Agents','<p><strong>Ready to make your sterling reputation work for you even more? Apply&nbsp;for&nbsp;ListQuick&#39;s exclusive Certified Agent Network today!</strong></p>','total_agents','page/L33upbeeJgFxhp5ASEBOEyVahgLjLLgH8lfKXYOU.png',NULL,'1'),(22,'2021-01-01 05:54:36','2021-01-01 05:54:36',NULL,'Answer 7 simple questions','Most home value algorithms don’t know the little things that make your home different. That’s where you come in. Pair your answers to a few questions with housing market data from multiple trusted sources and we can predict your home’s current value with far greater accuracy.','answer_simple_questions','page/2UlYVxCPtwImg50DWHCNSJ3jjzQKrvAAnIiyi7mv.png',NULL,'1'),(23,'2021-01-01 05:56:12','2021-01-01 05:56:12',NULL,'Detailed analysis and clear next steps','Get all the important parts of a comparative market analysis, throw in a list of the top local real estate agents who are proven to sell homes like yours for more money, and back it all up with your home’s Simple Sale™ price -- typically 90-95% of your home’s full market value -- if you’d rather skip the listing process entirely.<br><br> Kick off your home sale armed with the right information.','detailed_analysis','page/yNhv9DLefWqpwruZxYiPxgClPiPCaHpPHEgf5eUA.png',NULL,'1'),(24,'2021-01-01 05:57:08','2021-01-01 05:57:08',NULL,'How home value estimates are calculated','Online home valuation tools look at millions of transactions to predict what a home is worth but they\'re often missing crucial data, making them inaccurate. By asking a few specific questions about your home, we can add a new layer of information to our estimates and get closer to an accurate value for your home. But even that can only get you so far.<br><br> That’s where our Simple Sale™ price comes in. When you request a home value estimate, we ask our network of buyers to make you a real offer on the home. They compete for your business and you’re presented with the highest bid. Usually, this offer is around 90 - 95% of your home\'s market value.<br><br> If you want to get even closer to your home\'s true value, we’ll connect you with a top real estate agent near you. Local real estate agents can physically view the property, they list homes like yours every day, they know the neighborhoods, they know what\'s trending, and they can call out unique characteristics on the property. No online tool can do all of that.','home_value_estimates','',NULL,'1'),(25,'2021-01-01 05:58:41','2021-01-01 05:58:41',NULL,'Get A Guaranteed Offer','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it','guaranteed_offer','page/GAtGrsi6ObIaQekDRUwJStmNKXzf1POzLTCWbYdy.png',NULL,'1'),(26,'2021-01-01 06:02:17','2021-01-01 06:02:17',NULL,'Make A Strong Offer On Your New Home','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it','strong_offer','page/EovDCN3wsfgGEaP4Yo3mCMguRJLveUbp1pXjqnJc.png',NULL,'1'),(27,'2021-01-01 06:03:19','2021-01-01 06:03:19',NULL,'Move In On Your Schedule','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it','move_on_schedule','page/nX1GazowcRTbaOQmeLAVcJbt654KAtdIHM53Fm1V.png',NULL,'1'),(28,'2021-01-01 06:04:21','2021-01-01 06:04:21',NULL,'Get Full Market Value When We Sell Your Home','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it','full_market_value','page/CcDBPB3Bej9FnZmbjOZ1lxdT6cAm1CdE80csYh7S.png',NULL,'1'),(29,'2021-01-01 06:05:15','2021-01-01 06:05:15',NULL,'Make your strongest offer with ListQuick Cash Offer','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it','strong_cash_offer','page/bZfOuWpHAKmt9SRwP7oAq8QX1Wdj1quUTIcIEzC0.png',NULL,'1'),(30,'2021-01-01 06:06:18','2021-01-01 06:06:18',NULL,'Lorem Ipsum is simply dummy text of the printing','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'sstandard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it<br><br> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry<br><br> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry','why_listquick','',NULL,'1'),(31,'2021-03-03 09:49:42','2021-04-30 23:53:44',NULL,'About us page heading','<h2><strong>Why should ListQuick&nbsp;be your go-to online Real Estate source?</strong></h2>\r\n\r\n<hr />\r\n<p>&nbsp;</p>','about_us_heading','page/D6GJA2fHW8IlocmvVlB15GPTqOoWilb4JMqsmaLB.jpg',NULL,'1'),(32,'2021-03-03 11:07:23','2021-03-03 11:07:23',NULL,'Certified page heading','Here\'s How To Get Started With ListQuick','Certified_page_heading','',NULL,'1'),(33,'2021-03-03 11:29:24','2021-03-03 11:29:24',NULL,'certified Build Your Business heading','Let’s Work Together To Build Your Business','certified_Build','',NULL,'1'),(34,NULL,'2021-06-03 07:37:21',NULL,'ListQuick Resource Center','<hr />\r\n<p>ListQuick not only helps you connect with the best agent&nbsp;in your area, we also strive to <strong>educate the public</strong>&nbsp;about real estate and be<strong> socially responsible</strong>. &nbsp;Explore below for helpful advice and to see how we are partnering with excellent&nbsp;non-profit organizations.</p>\r\n\r\n<p>&nbsp;</p>','Tips_And_Tools','',NULL,'1'),(35,NULL,'2021-04-30 23:56:33',NULL,'Privacy Policy','<p><strong><em>ListQuick, Inc.&copy;&nbsp; &ndash;&nbsp; Privacy Policy </em></strong></p>\r\n\r\n<p><strong>Effective Date:</strong>&nbsp;January 1, 2021</p>\r\n\r\n<p><strong>Last</strong><strong> </strong><strong>Reviewed</strong><strong> </strong><strong>on:</strong>&nbsp;Feburary 23, 2021</p>\r\n\r\n<p>This Privacy Policy (&quot;Policy&quot;) describes how information about you is collected, used, and disclosed by ListQuick, Inc. (&quot;ListQuick &quot;), when you use our websites, mobile applications, and other online products and services (collectively, &quot;Services&quot;) or otherwise interact with us.</p>\r\n\r\n<p>At ListQuick, we are committed to protecting your privacy and creating a safe and secure online environment for anyone who visits or uses our site. All information is confidential and is never sold, rented, or otherwise shared with another business other than to help us provide the Services listed on our website. By visiting (www.listquick.net), you are accepting the practices described in this Privacy Policy.</p>\r\n\r\n<p>If you have questions regarding this Policy or the collection of personal information, you may contact us using the information provided in the contact information section at the end of this Policy.</p>\r\n\r\n<p><strong>Information We Collect</strong></p>\r\n\r\n<p>ListQuick collects information that identifies, relates to, describes, references, is capable of being associated with, or could reasonably be linked, directly or indirectly, with a particular consumer or device (&quot;personal information&quot;). The categories of personal information that ListQuick may collect include:</p>\r\n\r\n<ul>\r\n	<li><strong>Contact</strong><strong> </strong><strong>information</strong>&nbsp;(such as name, email address, mailing address, and phone number)</li>\r\n	<li><strong>Personal</strong><strong> </strong><strong>identifiers</strong>&nbsp;(such as Social Security Number (SSN), date of birth, employee identification number, Taxpayer Identification Number (TIN), other DBA number(s), other government issued identification(s), account name, online identifier, and signature)</li>\r\n	<li><strong>Financial information&nbsp;(</strong>such as bank, credit or debit card number, account type, routing number, bank institution name, account balances, credit history, investment activity, income or source of funds, and payment/transaction history)</li>\r\n	<li><strong>Commercial</strong><strong> </strong><strong>information</strong>&nbsp;(such as primary business address, secondary business address, ownership information, products or services purchased, obtained, or considered, or other purchasing or consuming histories or tendencies, home</li>\r\n</ul>\r\n\r\n<p><strong><em>ListQuick, Inc.&copy;&nbsp; &ndash;&nbsp; Privacy Policy </em></strong></p>\r\n\r\n<p>purchase information, such as the address, type of home, and price range of the home you are interested in buying or selling, records of personal property)</p>\r\n\r\n<ul>\r\n	<li><strong>Professional</strong><strong> or </strong><strong>employment</strong><strong>-</strong><strong>related</strong><strong> </strong><strong>information</strong>&nbsp;(such as occupation, title, performance evaluations, and prior employment history)</li>\r\n	<li><strong>Demographic</strong><strong> </strong><strong>information</strong>&nbsp;(such as age, date of birth, gender, race, color, origin, citizenship, and ethnicity)</li>\r\n	<li><strong>Personal</strong><strong> </strong><strong>characteristics</strong>&nbsp;(such as marital status and familial information)</li>\r\n	<li><strong>Geolocation</strong><strong> </strong><strong>data</strong>&nbsp;(such as city/state, zip code, physical location or movements)</li>\r\n	<li><strong>Internet</strong><strong> or </strong><strong>other</strong><strong> </strong><strong>Electronic</strong><strong> </strong><strong>Network</strong><strong> </strong><strong>Activity</strong><strong> </strong><strong>information</strong>&nbsp;(such as log information, IP address, access times, operating system, browser type and language, Internet service provider, and website interactions and browsing history)</li>\r\n	<li><strong>Inferences</strong><strong> </strong><strong>drawn</strong>&nbsp;from the above categories of personal information reflecting your preferences, characteristics, behaviors, psychological trends, attitudes and abilities</li>\r\n</ul>\r\n\r\n<p>We may combine the above categories of information with other information we collect about you in order to improve our Services. For example, we may combine the information you provide to us, such as the type of home and price range of the home you are interested in buying or selling with other information we have collected about you or from you.</p>\r\n\r\n<p>In addition to the above categories, you may choose to provide us with additional pieces of information when you fill in a form, update or add information to your account, apply for a job, or interact with us in other ways.</p>\r\n\r\n<p><strong>How We Collect Personal Information</strong></p>\r\n\r\n<p>ListQuick collects information from a variety of sources. For example, we may collect information you provide directly to us, such as when you use the Services to compare the relevance of agents in your area of interest, request that we contact you to match you with an agent, provide feedback and rate your experiences using the Services, sign up for our mailing list, or when you call, email or otherwise communicate with us.</p>\r\n\r\n<p>The following are the categories of sources from which we may collect your personal information:</p>\r\n\r\n<p><strong><em>ListQuick, Inc.&copy;&nbsp; &ndash;&nbsp; Privacy Policy </em></strong></p>\r\n\r\n<ul>\r\n	<li>Directly from you and other consumers through your interactions with us, such as when you use our services or purchase our products</li>\r\n	<li>Through our websites, when you send us an email or complete a form requesting personal information</li>\r\n	<li>From government agencies or public records</li>\r\n	<li>Through automated technologies and online browser tools, including the use of cookies</li>\r\n	<li>From third party service providers or business partners</li>\r\n</ul>\r\n\r\n<p>If you choose to submit any personal information relating to other people, you represent that you have the authority to do so and permit us to use the information in accordance with this Policy.</p>\r\n\r\n<p><strong>Use of Personal Information</strong></p>\r\n\r\n<p>We may use the personal information we collect for one or more of the following purposes:</p>\r\n\r\n<ul>\r\n	<li><strong>Perform</strong><strong> </strong><strong>our</strong><strong> </strong><strong>Services</strong><strong> </strong><strong>and</strong><strong> </strong><strong>Respond</strong><strong> to </strong><strong>Requests</strong><strong>.</strong>&nbsp;We may use personal information to fulfill requests, process payments, and perform other services requested by you.</li>\r\n	<li><strong>Protection</strong><strong> </strong><strong>and</strong><strong> </strong><strong>Security</strong><strong>.</strong>&nbsp;We may use personal information to protect the security and integrity of HomeLight our users, and others.</li>\r\n	<li><strong>Administrative</strong><strong> </strong><strong>Communications</strong><strong>.</strong>&nbsp;We may use personal information to send you important information regarding our services, such as changes to our terms, conditions, and policies and/or other administrative information.</li>\r\n	<li><strong>Marketing</strong><strong> </strong><strong>Communications</strong><strong>.</strong>&nbsp;We may use personal information to show you promotions or content based on your interests. You may opt out from receiving marketing communications, as described in the &quot;Your Rights&quot; section.</li>\r\n	<li><strong>Research</strong><strong> </strong><strong>and</strong><strong> </strong><strong>Surveys</strong><strong>.</strong>&nbsp;We may use personal information from you, our service providers, publicly available sources and other third parties to conduct research.</li>\r\n	<li><strong>Internal</strong><strong> </strong><strong>Business</strong><strong> </strong><strong>Purposes</strong><strong>.</strong>&nbsp;We may use personal information collected from the categories mentioned for our internal business purposes, such as data analysis, audits, developing new offerings, and monitoring or improving the use and satisfaction of our services or to evaluate or conduct a merger, divestiture, restructuring, reorganization, dissolution, or other sale or transfer of some or all of</li>\r\n</ul>\r\n\r\n<p><strong><em>ListQuick, Inc.&copy;&nbsp; &ndash;&nbsp; Privacy Policy </em></strong></p>\r\n\r\n<p>ListQuick&rsquo;s assets in which personal information held by ListQuick about our website users is among the assets transferred.</p>\r\n\r\n<ul>\r\n	<li><strong>Testimonials</strong><strong> </strong><strong>and</strong><strong> </strong><strong>Reviews</strong><strong>.</strong>&nbsp;We may display personal testimonials of satisfied customers on our site in addition to other endorsements. By submitting such information, you grant ListQuick the right to post and publish such information at our sole discretion. With your consent we may post your testimonial along with your name.</li>\r\n	<li><strong>Legal</strong><strong> </strong><strong>and</strong><strong> </strong><strong>Regulatory</strong><strong>.</strong>&nbsp;We may use personal information to comply with our legal or regulatory obligations, defend legal claims or cooperate with law enforcement.</li>\r\n</ul>\r\n\r\n<p><strong>Sharing Personal Information</strong></p>\r\n\r\n<p>ListQuick may disclose your personal information as described above to a third party for a business purpose. When we disclose personal information for a business purpose, we enter a contract that describes the purpose and requires the recipient to both keep that personal information confidential and not use it for any purpose except performing the contract.</p>\r\n\r\n<p>We may share your personal information with the following entities:</p>\r\n\r\n<ul>\r\n	<li><strong>Affiliated</strong><strong> </strong><strong>Entities</strong><strong>.</strong>&nbsp;We may share your personal information to our subsidiaries and corporate affiliates, including future subsidiaries and affiliates of ListQuick to use your information consistent with this Policy.</li>\r\n	<li><strong>Third</strong><strong> </strong><strong>Party</strong><strong> </strong><strong>Service</strong><strong> </strong><strong>Providers</strong><strong>.</strong>&nbsp;We may share personal information with third party service providers who provide us with services, such as data analysis, online advertising, payment processing, order fulfillment, IT services, customer service, and other similar services. We grant our service providers access to personal information only to the extent needed for them to perform their functions, and require them to protect the confidentiality and security of such personal information.</li>\r\n	<li><strong>Commercial</strong><strong> </strong><strong>Partners</strong><strong>.</strong>&nbsp;We may share personal information with unaffiliated third parties who partner with us to deliver our services or on our commercial activities. Depending on the choices you have made and the nature of the joint activity, these third parties may contact you regarding products or services of interest. However, we do not sell personal information to unaffiliated third parties for their own marketing purposes.</li>\r\n</ul>\r\n\r\n<p><strong><em>ListQuick, Inc.&copy;&nbsp; &ndash;&nbsp; Privacy Policy </em></strong></p>\r\n\r\n<ul>\r\n	<li><strong>Business</strong><strong> </strong><strong>Transfers</strong><strong> or </strong><strong>Assignments</strong><strong>.</strong>&nbsp;In the event of any reorganization, merger, sale, joint venture, assignment, transfer or other disposition of all or any portion of our business, assets or stock (including without limitation in connection with any bankruptcy or similar proceedings), we may transfer any information that we collect from site users or offline to a third party.</li>\r\n	<li><strong>Law Enforcement; Emergencies; Compliance</strong><strong>.</strong>&nbsp;We may disclose personal information about you to others as we believe to be appropriate: (i) under applicable law including laws outside your country of residence; (ii) to comply with legal process (iii) to respond to requests from public and government authorities including public and government authorities outside your country of residence; (iv) to enforce our terms and conditions; (v) to protect our operations and property interest; (vi) to protect the rights, privacy, safety or property of ListQuick, our employees, users of our service, or others; and (vii) to permit us to pursue available remedies or limit the damages that we may sustain.</li>\r\n	<li><strong>At your direction</strong><strong>.</strong>&nbsp;We may disclose your personal information as you otherwise consent to or request, such as to real estate agents and potential pre-approved cash buyers, as requested by you as part of our matching service.</li>\r\n</ul>\r\n\r\n<p><strong>To date, ListQuick, Inc.&copy; has not sold any personal information for money. However, we may share your personal information with third parties and service providers for the purposes described in this Policy.</strong></p>\r\n\r\n<p>ListQuick does not offer financial incentives for the use or sharing of personal information.</p>\r\n\r\n<p><strong>Your Rights and Choices</strong></p>\r\n\r\n<p>Depending on your jurisdiction, applicable law may entitle you to certain rights and choices as it pertains to your personal information, including the right:</p>\r\n\r\n<ul>\r\n	<li>To know the categories and/or specific pieces of personal information collected about you, including whether your personal information is sold or disclosed and the purpose, and with whom your personal information was shared;</li>\r\n	<li>To request deletion of personal information;</li>\r\n	<li>To access a copy of the personal information we retain about you;</li>\r\n	<li>To opt-out of the sale of personal information; and</li>\r\n</ul>\r\n\r\n<p><strong><em>ListQuick, Inc.&copy;&nbsp; &ndash;&nbsp; Privacy Policy </em></strong></p>\r\n\r\n<ul>\r\n	<li>To non-discrimination based on the exercise of a consumer&rsquo;s privacy rights.</li>\r\n</ul>\r\n\r\n<p>In addition, California&#39;s &quot;Shine the Light&quot; law (Civil Code Section &sect; 1798.83) permits users of our website that are California residents to request certain information regarding our disclosure of personal information to third parties for their direct marketing purposes.</p>\r\n\r\n<p>Please note that a portion of the information collected and processed by ListQuick may be out of scope for certain individual rights as it falls under exemptions for information collected under applicable state or federal laws.</p>\r\n\r\n<p><strong>Exercising Your Rights</strong></p>\r\n\r\n<p>In connection with promotions or other special projects, we may ask you specifically whether you have objections against a certain kind of data use or sharing. If you opt-out under such circumstances, we will respect your decision.</p>\r\n\r\n<p>If personal information you have submitted to us is no longer accurate, current, or complete, and you wish to update it, please contact us and upon appropriate request we will usually be glad to update or amend your information, but we reserve the right to use information obtained previously to verify your identity or take other actions that we believe are appropriate.</p>\r\n\r\n<p>To exercise any other rights as described in this Policy, please submit a request by contacting us using the contact information at the end of this Policy. We reserve the right to verify your identity in connection with any requests regarding personal information to help ensure that we provide the information we maintain to the individuals to whom it pertains, and allow only those individuals or their authorized representatives to exercise rights with respect to that information.</p>\r\n\r\n<p>If you are an authorized agent or parent/guardian making a request on behalf of an individual or your minor child, we may require and request additional information to verify that you are authorized to make that request.</p>\r\n\r\n<p>We reserve the right to deny your request if we cannot verify your identify. Where we deny your request in whole or in part, we will inform you of the denial, provide an explanation of our actions, and the reason(s) for the denial.</p>\r\n\r\n<p>We will not restrict or deny you access to our services because of choices and requests you make in connection with your personal information.</p>\r\n\r\n<p><strong><em>ListQuick, Inc.&copy;&nbsp; &ndash;&nbsp; Privacy Policy </em></strong></p>\r\n\r\n<p><strong>Security and Protection of Personal Information</strong></p>\r\n\r\n<p>The security of your personal information is important to us. Thus, ListQuick has taken reasonable steps to help protect the personal information our users share with us in an effort to prevent loss, misuse, and unauthorized access, disclosure, alteration, and destruction.</p>\r\n\r\n<p>We follow generally accepted standards to protect the personal information submitted to us, both during transmission and once we receive it. No method of transmission over the Internet, or method of electronic storage, is 100% secure. Therefore, we cannot guarantee its absolute security. We urge you to exercise caution when transmitting personal information over the Internet. If you have questions about security on our Web site, you can contact us at (contact@listquick.net).</p>\r\n\r\n<p><strong>Links to Third Party Sites</strong></p>\r\n\r\n<p>Our website includes links to other websites whose privacy practices may differ from those of ListQuick. If you submit personal information to any of those sites, your information is governed by their privacy policies. We encourage you to carefully read the privacy policy of any website you visit.</p>\r\n\r\n<p>Our website also includes Social Media Features, such as the Facebook Like button, the Twitter Tweet button and other social sharing buttons or interactive mini-programs that run on our site. These Features may collect your IP address, which page you are visiting on our site, and may set a cookie to enable the Feature to function properly. Social Media Features and Widgets are either hosted by a third party or hosted directly on our website. Your interactions with these Features are governed by the privacy policy of the company providing it.</p>\r\n\r\n<p><strong>Children and Minors</strong></p>\r\n\r\n<p>ListQuick does not direct services to individuals under the age of sixteen (16) and we do not sell the personal information of minors under 16 years of age. If you are under age 16, please do not submit personal information to us. If you are a parent and become aware that your child has provided us with information, please contact us using one of the methods specified below and we will work with you to address this issue.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>ListQuick, Inc.&copy;&nbsp; &ndash;&nbsp; Privacy Policy </em></strong></p>\r\n\r\n<p><strong>Cookies / Website Usage</strong></p>\r\n\r\n<p>When you access our website, your personal information may be collected by cookies and other similar technologies. Technologies such as: cookies, beacons, tags and scripts are used by ListQuick and our marketing partners and analytics or service providers. These technologies are used in analyzing trends, administering the site, tracking users&#39; movements around the site anonymously and to gather demographic information about our user base as a whole. We may receive reports based on the use of these technologies by these companies on an aggregated basis. If you reject cookies, you may still use our site, but your ability to use some features or areas of our site may be limited.</p>\r\n\r\n<p>Additionally, when you use our website, some browsers have Do Not Track (&quot;DNT&quot;) features that allow you to tell a website not to track you. ListQuick honors the AdChoice DNT signals.</p>\r\n\r\n<p><strong>Behavioral Targeting</strong></p>\r\n\r\n<p>We partner with a third party to either display advertising on our web site or to manage our advertising on other sites. Our third-party partner may use technologies such as cookies to gather information about your activities on this site and other sites in order to provide you advertising based upon your browsing activities and interests. If you wish to not have this information used for the purpose of serving you interest-based ads, you may opt-out by clicking&nbsp;<a href=\"http://preferences.truste.com/\" target=\"_blank\">here</a>. Please note this does not opt you out of being served ads. You will continue to receive generic ads.</p>\r\n\r\n<p><strong>Testimonials and Reviews</strong></p>\r\n\r\n<p>Users may perform ratings and reviews of our lenders and real estate professionals. By submitting such information, you grant ListQuick the right to post and publish such information at our sole discretion. We also display personal testimonials of satisfied customers on our site in addition to other endorsements. With your consent we may post your testimonial along with your name.</p>\r\n\r\n<p><strong>Changes to Our Privacy Policy</strong></p>\r\n\r\n<p>ListQuick reserves the right to amend this Policy at our discretion and at any time. When we make changes to this Policy, we will post the updated Policy on the website and <strong><em>ListQuick, Inc.&copy;&nbsp; &ndash;&nbsp; Privacy Policy </em></strong></p>\r\n\r\n<p>update the Policy effective date.&nbsp;Your continued use of our Services following the posting of changes constitutes your acceptance of such changes.</p>\r\n\r\n<p><strong>Contact Information</strong></p>\r\n\r\n<p>If you have any questions or comments about this Policy, the ways in which ListQuick collects and uses your information described in Policy, your choices and rights regarding such use, or wish to exercise your applicable rights, please do not hesitate to contact us at:</p>\r\n\r\n<p><strong>Email: contact@listquick.net </strong></p>\r\n\r\n<p><strong>Postal Address:&nbsp;</strong></p>\r\n\r\n<p>5101 Santa Monica Blvd Ste 8 PMB 391 Los Angeles ,CA 90029</p>\r\n\r\n<p>&nbsp;</p>','privacy_policy','',NULL,'1'),(36,NULL,'2021-04-30 23:56:54',NULL,'Terms and Conditions','<p><strong><em>ListQuick, Inc.&copy;&nbsp; &ndash;&nbsp; Terms of Services </em></strong></p>\r\n\r\n<p>Terms of Service</p>\r\n\r\n<p><strong>Use of Our Service</strong></p>\r\n\r\n<p>Matchmaking is the core of what we do for real estate. When the time is right, we make a professional introduction between you and one of our Real Estate Agent partners. The service that we provide to both buyers and sellers of real estate and real estate professionals is governed by a few terms that are outlined below.</p>\r\n\r\n<p>Because we are an online service, we don&rsquo;t ask you to deal with and physically sign a lengthy contract. The terms of our contract with you are set forth below in plain language. If you don&rsquo;t agree with the terms, then we ask you please to leave this Web site. If you do use this Web site, then that action will serve as your agreement to be bound by our terms of service.</p>\r\n\r\n<p>ListQuick is operated in compliance with all state and federal housing laws.</p>\r\n\r\n<p><strong>Terms for Broker and Agents</strong></p>\r\n\r\n<p>Real estate professionals who are involved with and use our Web site must agree with the following terms:</p>\r\n\r\n<ol>\r\n	<li>You grant&nbsp;www.listquick.net permission to display on our Web site and elsewhere information that we have gathered or you have supplied related to any of the real estate transactions that you have handled as a real estate professional. This information helps your potential clients better understand your specialties.</li>\r\n	<li>If you choose to accept referrals from ListQuick, and if you subsequently handle a real estate transaction for this referral, then you agree to pay us a Referral Fee of 15% of the gross commission you earn. This is how we earn money and allows us to continue to provide our services to you.</li>\r\n	<li>You are responsible for maintaining your own real estate license and for following all applicable real estate laws regarding disclosures, documentation and other brokerage responsibilities. In addition, you are responsible for the real estate brokerage services provided to your clients and agree to indemnify, defend and hold ListQuick harmless from any claims, costs, and damages incurred by ListQuick arising from claims by your clients regarding the brokerage services you have provided.</li>\r\n	<li>Your participation in our service is voluntary and can be terminated by either of us for any reason at any time with written notice. However, any referrals made prior to such termination are still bound by this agreement, and Referral Fees will be due upon close of any transactions resulting from such referrals.</li>\r\n	<li>In connection with the referrals, you agree to be contacted by ListQuick and its referrals via phone, email, mail or other reasonable means, and you further agree that you will not provide the referrals to any other party without our written consent.</li>\r\n	<li>You may initiate or receive a call from a ListQuick representative or one of our referrals via one of ListQuick&rsquo;s tracked phone numbers. If you do so, ListQuick may create a digital audio recording of the call. You acknowledge and agree that your phone call may be recorded for quality assurance purposes only.</li>\r\n	<li>Any information that you provide to ListQuick shall be accurate, complete and owned by you, and you agree to update any information that is or becomes inaccurate. Of course, if we discover that any information is inaccurate we may correct it ourselves. You hereby grant us permission to e-mail or display your Profile (including your name, likeness, contact information and transaction details) and such other information as may be supplied by you on or from our Web site &ldquo;www.listquick.net&rdquo; and such other partner and affiliate websites as we believe advisable for marketing purposes.</li>\r\n	<li>You agree that we may modify the services provided, these terms of service or the price charged for our services at any time. We will send you an email thirty days in advance of any significant changes of our services, terms of service or prices, and you agree that your continued use of our services after the notice period means that you accept the new terms and any subsequent referrals or services shall be governed by the new terms.</li>\r\n</ol>\r\n\r\n<p><strong>Terms for Buyers and Sellers</strong></p>\r\n\r\n<p>All non-real estate professionals (including prospective Buyers and Sellers and their representatives) who are involved with and use our Web site must agree with the following terms:</p>\r\n\r\n<ol>\r\n	<li>When the time is right, we may make a professional introduction between you and one of our partners, including our real estate agent partners. Of course, this introduction involves sharing the contact information of each party with the other. When you submit information to (www.listquick.net) for a request, you authorize us to use and provide this information to make an introduction. By providing this information to us, you consent to being contacted by us and by our partners via phone, email, mail or other reasonable means.</li>\r\n	<li>For us to help you, we need you to provide information that is accurate and complete, especially your contact information so that our Real Estate Agent partners can contact you quickly and efficiently. We reserve the right to suspend or terminate access to anyone who supplies information that is inaccurate or misleading.</li>\r\n	<li>You understand that while ListQuick may refer real estate professionals, we do not perform real estate brokerage services. Any Real Estate brokerage activities are performed by local Real Estate Professionals that have been referred to you. We do not endorse, recommend or otherwise know the terms of any agreement between you and a real estate professional.</li>\r\n	<li>You understand that for our services we may receive payment (a referral fee) that may be a percentage of the commission received by the professionals involved in the real estate transaction. There is no charge to you. Any payment is due based on a separate agreement between us and the professional involved. Your use of our services constitutes your acknowledgment of, and agreement to, this compensation arrangement.</li>\r\n	<li>Your participation in our service is voluntary and can be terminated by either of us for any reason at any time with written notice. However, any referrals made prior to such termination are still bound by the agreement that we may have with a real estate professional.</li>\r\n	<li>You agree that we may modify the services provided or these terms of service at any time. We will notify you in advance of any significant changes of our services, and you agree that your continued use of our services after the notice period means that you accept the new terms and any subsequent services shall be governed by the new terms.</li>\r\n	<li>You may initiate or receive a call from a ListQuick representative or one of our agent partners via one of ListQuick&rsquo;s tracked phone numbers. If you do so, ListQuick may create a digital audio recording of the call. You acknowledge and agree that your phone call may be recorded for quality assurance purposes only.</li>\r\n</ol>\r\n\r\n<p><strong>Additional Terms</strong></p>\r\n\r\n<p>All who are involved with and use our Web site must agree with the following additional terms:</p>\r\n\r\n<p>&middot;&nbsp; It is the policy of ListQuick to respond to all claims of intellectual property infringement. We will promptly investigate notices of alleged infringement and will take appropriate actions required under the Digital Millennium Copyright Act, Title 17, United States Code, Section 512(c)(2) (&quot;DMCA&quot;) and other applicable intellectual property laws.</p>\r\n\r\n<p>Pursuant to the DMCA, notifications of claimed copyright infringement should be sent to a Service Provider&#39;s Designated Agent. Notification must be submitted to the following Designated Agent for these sites:</p>\r\n\r\n<hr />\r\n<p>ListQuick, Inc.<br />\r\n5101 Santa Monica Blvd Ste 8 PMB 391 Los Angeles ,CA 90029<br />\r\nUSA<br />\r\nPhone: (800) 588 - 9612<br />\r\nEmail: contact@listquick.net</p>\r\n\r\n<hr />\r\n<p>To be effective, the notification must be a written communication that includes the following:</p>\r\n\r\n<ol>\r\n	<li>A physical or electronic signature of a person authorized to act on behalf of the owner of an exclusive right that is allegedly infringed;</li>\r\n	<li>Identification of the copyrighted work claimed to have been infringed, or, if multiple copyrighted works at a single online site are covered by a single notification, a representative list of such works at that site;</li>\r\n	<li>Identification of the material that is claimed to be infringing or to be the subject of infringing activity and that is to be removed or access to which is to be disabled, and information reasonably sufficient to permit the service provider to locate the material;</li>\r\n	<li>Information reasonably sufficient to permit the service provider to contact the complaining party, such as an address, telephone number and, if available, an electronic mail address at which the complaining party may be contacted;</li>\r\n	<li>A statement that the complaining party has a good-faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent or the law;</li>\r\n	<li>A statement that the information in the notification is accurate and, under penalty of perjury, that the complaining party is authorized to act on behalf of the owner of an exclusive right that is allegedly infringed.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>ListQuick intends that the information contained on our Web site be accurate and reliable; however, errors sometimes occur. In addition, we may make changes and improvements to the information provided at any time. Accordingly, we do not guarantee the accuracy of any information available on this Web site, and are not responsible for any errors, omissions, or misrepresentations and any information should be independently verified.</li>\r\n	<li>To protect our service, you agree to refrain from the following prohibited activities: (a) submitting materials that are patently offensive to the online community, such as content that promotes racism, bigotry, hatred or physical harm of any kind against any group or individual; (b) engaging in activities or submitting materials that could be harmful to minors; (c) engaging in activity or submitting materials that harasses or advocates harassment of another person; (d) engaging in activity that involves the transmission of &quot;junk mail&quot; or unsolicited mass mailing or &quot;spam&quot; or harvesting or otherwise collecting personally identifiable information about Web site users, including names, phone numbers, addresses, email addresses, (collectively, &quot;User Data&quot;) without their consent; (e) engaging in activity, or submitting materials, or promoting information that is false, misleading or promotes illegal activities or conduct that is abusive, threatening, obscene, defamatory or libelous; (f) submitting materials that contain restricted or password only access pages, or hidden pages or images; (g) submitting materials that displays pornographic or sexually explicit material of any kind; (h) submitting materials that provide instructional information about illegal activities such as making or buying illegal weapons, violating someone&#39;s privacy, or providing or creating computer viruses; (i) submitting materials that contain viruses, Trojan horses, worms, or any other similar forms of malware, (j) engaging in activities or submitting materials that solicit passwords or personally identifiable information for unlawful purposes from other users; (k) engaging in unauthorized commercial activities and/or sales without our prior written consent such as advertising, solicitations, contests, sweepstakes, barter, and pyramid schemes; (l) using any robot, spider, other automatic device, or manual process to monitor, copy, or &quot;scrape&quot; web pages or the content contained in the Web site or for any other unauthorized purpose without our prior written consent; (m) using any device, software, or routine to interfere or attempt to interfere with the proper working of the Web site; (n) decompiling, reverse engineering, or disassembling the software or attempting to do so; or (o) taking any action that imposes an unreasonable or disproportionately large load on the Web site or our hardware and software infrastructure or that of any of our licensors or suppliers.</li>\r\n	<li>You agree to the following limitation:&nbsp;The web site and the information, software, products and services associated with it are provided &quot;As is.&quot; ListQuick and/or its suppliers, participating lenders, or real estate professionals disclaim any warranty of any kind, whether express or implied, as to any matter whatsoever relating to the web site and any information, software, products and services provided herein, including without limitation the implied warranties of merchantability, fitness for a particular purpose, title, and noninfringement. Use of ListQuick&rsquo;s service is at your own risk. We and/or its suppliers, are not liable for any direct, indirect, punitive, incidental, special or consequential damages or other injury arising out of or in any way connected with the use of our services or with the delay or inability to use the web site, or for any information, software, products and services obtained through the web site, or otherwise arising out of the use of the web site, whether resulting in whole or in part, from breach of contract, tortious behavior, negligence, strict liability or otherwise, even if we and/or its suppliers had been advised of the possibility of damages. Some jurisdictions do not allow the exclusion of implied warranties, so the above exclusion may not apply to you.</li>\r\n	<li>You also agree to the following:&nbsp;In no event shall ListQuick or our suppliers be liable for lost profits or any special, incidental or consequential damages (however arising, including negligence) arising out of or in connection with this agreement. Our liability, and the liability of our suppliers, to you or any third parties in any circumstance, is limited to $100.&nbsp;Some states do not allow the limitation of liability, so the foregoing limitation may not always apply.</li>\r\n	<li>You also agree to the following&nbsp;dispute resolution, arbitration, and class action waiver:&nbsp;Instead of suing in Court, you and ListQuick agree to arbitrate all disputes between you and ListQuick or any of ListQuick&rsquo;s agents, representatives, or partners acting on ListQuick&rsquo;s behalf, on an individual basis, not on a class-wide or consolidated basis. The FAA applies to this agreement, the arbitration provision, and all questions of whether a dispute is subject to arbitration. Unless we each agree otherwise, the Arbitration will be conducted by a single, neutral arbitrator and will take place in the county of your residence.&nbsp;We each agree that we will only pursue arbitration on an individual basis and will not pursue arbitration on a class-wide or consolidated basis.&nbsp;We each agree that any arbitration will be solely between you and ListQuick (or ListQuick&rsquo;s agents, representatives, or partners acting on ListQuick&rsquo;s behalf). We each&nbsp;waive any rights to bring a class action or consolidated action.&nbsp;Exceptions: Either of us may bring qualifying claims in small claims court.</li>\r\n	<li>Finally, you also agree to the following: These Terms of Service shall be subject to and construed in accordance with the laws of the State of California, without regard to its conflict of laws principles. If any part of these Terms of Service are determined to be invalid or unenforceable pursuant to applicable law including, but not limited to, the warranty disclaimers and liability limitations set forth above, then the invalid or unenforceable provision will be deemed superseded by a valid enforceable provision that most closely matches the intent of the original provision, and the remainder of the Agreement shall continue in effect. A printed version of this Agreement and of any notice given in electronic form shall be admissible in judicial or administrative proceedings based upon or relating to this agreement to the same extent and subject to the same conditions as other business documents and records originally generated and maintained in printed form. All rights not expressly granted herein are reserved to ListQuick.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>','terms_and_conditions','',NULL,'1'),(37,'2021-03-03 09:49:42','2021-05-01 01:12:41',NULL,'Professional Page Image','<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>','professional_page_image','page/Kf4aPgfO51AAWrbCViQE3eKPNc9zxZf8wxJ87kZp.png',NULL,'1'),(38,'2021-03-03 09:49:42','2021-04-22 19:59:09',NULL,'Testimonial Page Content','<h3>ListQuick is 100% Free to the Public</h3>\r\n\r\n<h3>See What People Have to Say</h3>\r\n\r\n<p>We want to hear about everyone&#39;s experience using ListQuick, to make sure you are happy and our Certfied Agents&copy; continue to be the best.</p>','testimonial_page_content','page/D6GJA2fHW8IlocmvVlB15GPTqOoWilb4JMqsmaLB.jpg',NULL,'1'),(39,'2021-03-03 09:49:42','2021-05-01 00:03:55',NULL,'Contact Us Page Content','<p>If you have questions, need help, or are looking for an agent in a particular area, reach out to us here and we&#39;ll get back to you as soon as humanly possible.</p>','contact_us_page_content','page/D6GJA2fHW8IlocmvVlB15GPTqOoWilb4JMqsmaLB.jpg','(800) 588 - 9612','1'),(40,'2021-03-03 09:49:42','2021-05-01 17:46:44',NULL,'Office Address Content','<p class=\'text-center\'>&copy;ListQuick,Inc. 5101 Santa Monica Blvd Ste 8 PMB 391 Los Angeles ,CA 90029 - All Rights Reserved 2021.</p>','office_address_page_content','page/D6GJA2fHW8IlocmvVlB15GPTqOoWilb4JMqsmaLB.jpg',NULL,'1');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values ('cocacola@listquick.net','$2y$10$jDeDpZWrVtxVcHUaM4oLm.7Ip.VmlTHZlO.7ZuzlLqSkJRX0SK4va','2021-03-16 16:52:21'),('blogan7@yahoo.com','$2y$10$zoLodfTgJaN8mpgYEHemSOFHHgENfcyPY8pWW94W6/8oosWD1edXq','2021-05-09 18:51:05'),('aftab@yopmail.com','$2y$10$47QHaS9iVNyBclkpcd2x4.NaWdotLvTiiwWWYUJYkXCZssPT1.cxG','2021-06-03 08:37:44'),('blake@listquick.net','$2y$10$bR1dCqDGlKlojSfFTFe.xuEMvoBPZdgilE/EaIHq0u9v4poiSOimO','2021-06-03 08:40:10'),('morgan@yahoo.com','$2y$10$4UcIa/K9ThR/aIgUVXvTP.WX/J9BQnAx4S1QpxcY0E8nQzDITmCY2','2021-06-03 08:42:19'),('drama@yahoo.com','$2y$10$m0NGIvFLkZrctse1w40ODuxoDDMDnqjt8BwU8axbJFpvU5ZDzk8jq','2021-06-10 09:06:09'),('admin@listquick.net','$2y$10$lkBAvkVnPvhzYnIlORMQsejCsjcNxVyNrXDxbov/YwYyCbWsD8CDO','2021-06-12 04:52:15'),('sanket@biz4solutions.com','$2y$10$UJ1.HfOpUZ3YkzvaknnfJOKbcnxcDRiYvaObmYh/OMF/zjR/cn4gi','2021-06-29 22:28:51');

/*Table structure for table `payment_details` */

DROP TABLE IF EXISTS `payment_details`;

CREATE TABLE `payment_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_expiration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_expiration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `payment_details` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`permission_id`,`role_id`) values (2,1),(3,1),(4,1),(4,2),(4,3),(5,1),(5,2),(6,1),(6,2),(7,1),(7,2),(8,1),(8,2),(9,1),(9,2),(10,1),(10,2),(11,1),(11,2),(12,1),(12,2),(13,1),(13,2),(14,1),(14,2),(15,1),(15,2),(16,1),(16,2),(17,1),(17,2),(18,1),(18,2),(19,1),(19,2),(20,1),(20,2),(21,1),(21,2),(26,1),(26,2),(27,1),(27,2),(28,1),(28,2),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(34,2),(35,1),(35,2),(36,1),(36,2),(37,1),(37,2),(38,1),(39,1),(40,1),(40,2),(41,1),(41,2),(42,1),(42,2),(43,1),(43,2),(44,1),(44,2),(45,1),(45,2),(46,1),(46,2),(47,1),(47,2),(48,1),(48,2),(49,1),(49,2),(50,1),(50,2),(51,1),(51,2),(52,1),(52,2),(53,1),(53,2),(54,1),(54,2),(55,1),(55,2),(56,1),(56,2),(57,1),(57,2),(58,1),(58,2),(59,1),(59,2),(60,1),(60,2),(61,1),(61,2),(62,1),(63,1),(63,2),(64,1),(64,2),(65,1),(66,1),(67,1),(68,1),(68,2),(69,1),(70,1),(71,1),(72,1),(72,2),(73,1),(74,1),(75,1),(76,1),(76,2),(77,1),(77,2),(78,1),(78,2),(79,1),(79,2),(80,1),(80,2),(81,1),(81,2),(82,1),(82,2),(83,1),(83,2),(84,1),(84,2),(85,1),(85,2),(86,1),(87,1),(88,1),(88,2),(88,3),(89,1),(89,2),(90,1),(90,2),(91,1),(91,2),(92,1),(92,2),(93,1),(93,2),(94,1),(95,1),(96,1),(96,2),(96,3),(97,1),(97,2),(98,1),(99,1),(99,3),(100,1),(100,3),(101,1),(102,1),(103,1),(104,1),(104,2),(105,1),(106,1),(107,1),(108,1),(108,2),(109,1),(110,1),(111,1),(112,1),(112,2),(113,1);

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`label`,`created_at`,`updated_at`) values (1,'All Permission',NULL,'2020-12-10 05:41:00','2020-12-10 05:41:00'),(2,'add-buysaleproperty',NULL,'2020-12-10 05:56:38','2020-12-10 05:56:38'),(3,'edit-buysaleproperty',NULL,'2020-12-10 05:56:38','2020-12-10 05:56:38'),(4,'view-buysaleproperty',NULL,'2020-12-10 05:56:38','2020-12-10 05:56:38'),(5,'delete-buysaleproperty',NULL,'2020-12-10 05:56:38','2020-12-10 05:56:38'),(6,'add-propertytype',NULL,'2020-12-10 06:04:19','2020-12-10 06:04:19'),(7,'edit-propertytype',NULL,'2020-12-10 06:04:20','2020-12-10 06:04:20'),(8,'view-propertytype',NULL,'2020-12-10 06:04:20','2020-12-10 06:04:20'),(9,'delete-propertytype',NULL,'2020-12-10 06:04:20','2020-12-10 06:04:20'),(10,'add-worth',NULL,'2020-12-10 06:05:43','2020-12-10 06:05:43'),(11,'edit-worth',NULL,'2020-12-10 06:05:44','2020-12-10 06:05:44'),(12,'view-worth',NULL,'2020-12-10 06:05:44','2020-12-10 06:05:44'),(13,'delete-worth',NULL,'2020-12-10 06:05:44','2020-12-10 06:05:44'),(14,'add-time',NULL,'2020-12-10 06:07:45','2020-12-10 06:07:45'),(15,'edit-time',NULL,'2020-12-10 06:07:45','2020-12-10 06:07:45'),(16,'view-time',NULL,'2020-12-10 06:07:45','2020-12-10 06:07:45'),(17,'delete-time',NULL,'2020-12-10 06:07:46','2020-12-10 06:07:46'),(18,'add-heardsource',NULL,'2020-12-10 06:09:19','2020-12-10 06:09:19'),(19,'edit-heardsource',NULL,'2020-12-10 06:09:19','2020-12-10 06:09:19'),(20,'view-heardsource',NULL,'2020-12-10 06:09:19','2020-12-10 06:09:19'),(21,'delete-heardsource',NULL,'2020-12-10 06:09:19','2020-12-10 06:09:19'),(22,'add-chartertopic',NULL,'2020-12-10 10:09:57','2020-12-10 10:09:57'),(23,'edit-chartertopic',NULL,'2020-12-10 10:09:58','2020-12-10 10:09:58'),(24,'view-chartertopic',NULL,'2020-12-10 10:09:58','2020-12-10 10:09:58'),(25,'delete-chartertopic',NULL,'2020-12-10 10:09:59','2020-12-10 10:09:59'),(26,'add-chattertopic',NULL,'2020-12-10 10:14:49','2020-12-10 10:14:49'),(27,'edit-chattertopic',NULL,'2020-12-10 10:14:49','2020-12-10 10:14:49'),(28,'view-chattertopic',NULL,'2020-12-10 10:14:50','2020-12-10 10:14:50'),(29,'delete-chattertopic',NULL,'2020-12-10 10:14:50','2020-12-10 10:14:50'),(30,'add-type',NULL,'2020-12-11 04:12:24','2020-12-11 04:12:24'),(31,'edit-type',NULL,'2020-12-11 04:12:24','2020-12-11 04:12:24'),(32,'view-type',NULL,'2020-12-11 04:12:24','2020-12-11 04:12:24'),(33,'delete-type',NULL,'2020-12-11 04:12:24','2020-12-11 04:12:24'),(34,'add-leadership',NULL,'2020-12-14 05:48:00','2020-12-14 05:48:00'),(35,'edit-leadership',NULL,'2020-12-14 05:48:00','2020-12-14 05:48:00'),(36,'view-leadership',NULL,'2020-12-14 05:48:00','2020-12-14 05:48:00'),(37,'delete-leadership',NULL,'2020-12-14 05:48:00','2020-12-14 05:48:00'),(38,'add-contact',NULL,'2020-12-14 05:49:54','2020-12-14 05:49:54'),(39,'edit-contact',NULL,'2020-12-14 05:49:55','2020-12-14 05:49:55'),(40,'view-contact',NULL,'2020-12-14 05:49:55','2020-12-14 05:49:55'),(41,'delete-contact',NULL,'2020-12-14 05:49:55','2020-12-14 05:49:55'),(42,'add-office',NULL,'2020-12-14 05:54:03','2020-12-14 05:54:03'),(43,'edit-office',NULL,'2020-12-14 05:54:03','2020-12-14 05:54:03'),(44,'view-office',NULL,'2020-12-14 05:54:03','2020-12-14 05:54:03'),(45,'delete-office',NULL,'2020-12-14 05:54:03','2020-12-14 05:54:03'),(46,'add-review',NULL,'2020-12-14 06:01:26','2020-12-14 06:01:26'),(47,'edit-review',NULL,'2020-12-14 06:01:26','2020-12-14 06:01:26'),(48,'view-review',NULL,'2020-12-14 06:01:26','2020-12-14 06:01:26'),(49,'delete-review',NULL,'2020-12-14 06:01:27','2020-12-14 06:01:27'),(50,'add-faq',NULL,'2020-12-14 06:08:12','2020-12-14 06:08:12'),(51,'edit-faq',NULL,'2020-12-14 06:08:12','2020-12-14 06:08:12'),(52,'view-faq',NULL,'2020-12-14 06:08:12','2020-12-14 06:08:12'),(53,'delete-faq',NULL,'2020-12-14 06:08:12','2020-12-14 06:08:12'),(54,'add-testimonial',NULL,'2020-12-18 17:40:23','2020-12-18 17:40:23'),(55,'edit-testimonial',NULL,'2020-12-18 17:40:24','2020-12-18 17:40:24'),(56,'view-testimonial',NULL,'2020-12-18 17:40:24','2020-12-18 17:40:24'),(57,'delete-testimonial',NULL,'2020-12-18 17:40:24','2020-12-18 17:40:24'),(58,'add-tipandtool',NULL,'2020-12-18 19:42:30','2020-12-18 19:42:30'),(59,'edit-tipandtool',NULL,'2020-12-18 19:42:30','2020-12-18 19:42:30'),(60,'view-tipandtool',NULL,'2020-12-18 19:42:30','2020-12-18 19:42:30'),(61,'delete-tipandtool',NULL,'2020-12-18 19:42:30','2020-12-18 19:42:30'),(62,'add-page',NULL,'2020-12-18 19:55:39','2020-12-18 19:55:39'),(63,'edit-page',NULL,'2020-12-18 19:55:39','2020-12-18 19:55:39'),(64,'view-page',NULL,'2020-12-18 19:55:39','2020-12-18 19:55:39'),(65,'delete-page',NULL,'2020-12-18 19:55:39','2020-12-18 19:55:39'),(66,'add-package',NULL,'2020-12-25 05:16:28','2020-12-25 05:16:28'),(67,'edit-package',NULL,'2020-12-25 05:16:28','2020-12-25 05:16:28'),(68,'view-package',NULL,'2020-12-25 05:16:28','2020-12-25 05:16:28'),(69,'delete-package',NULL,'2020-12-25 05:16:28','2020-12-25 05:16:28'),(70,'add-userpayment',NULL,'2020-12-25 08:20:50','2020-12-25 08:20:50'),(71,'edit-userpayment',NULL,'2020-12-25 08:20:50','2020-12-25 08:20:50'),(72,'view-userpayment',NULL,'2020-12-25 08:20:50','2020-12-25 08:20:50'),(73,'delete-userpayment',NULL,'2020-12-25 08:20:50','2020-12-25 08:20:50'),(74,'add-rating',NULL,'2020-12-26 11:31:08','2020-12-26 11:31:08'),(75,'edit-rating',NULL,'2020-12-26 11:31:08','2020-12-26 11:31:08'),(76,'view-rating',NULL,'2020-12-26 11:31:08','2020-12-26 11:31:08'),(77,'delete-rating',NULL,'2020-12-26 11:31:08','2020-12-26 11:31:08'),(78,'add-elite',NULL,'2021-01-01 06:32:40','2021-01-01 06:32:40'),(79,'edit-elite',NULL,'2021-01-01 06:32:40','2021-01-01 06:32:40'),(80,'view-elite',NULL,'2021-01-01 06:32:40','2021-01-01 06:32:40'),(81,'delete-elite',NULL,'2021-01-01 06:32:40','2021-01-01 06:32:40'),(82,'add-press',NULL,'2021-01-01 06:34:37','2021-01-01 06:34:37'),(83,'edit-press',NULL,'2021-01-01 06:34:37','2021-01-01 06:34:37'),(84,'view-press',NULL,'2021-01-01 06:34:37','2021-01-01 06:34:37'),(85,'delete-press',NULL,'2021-01-01 06:34:37','2021-01-01 06:34:37'),(86,'add-referal',NULL,'2021-01-09 22:27:03','2021-01-09 22:27:03'),(87,'edit-referal',NULL,'2021-01-09 22:27:03','2021-01-09 22:27:03'),(88,'view-referal',NULL,'2021-01-09 22:27:03','2021-01-09 22:27:03'),(89,'delete-referal',NULL,'2021-01-09 22:27:03','2021-01-09 22:27:03'),(90,'add-homecondition',NULL,'2021-03-02 07:12:08','2021-03-02 07:12:08'),(91,'edit-homecondition',NULL,'2021-03-02 07:12:08','2021-03-02 07:12:08'),(92,'view-homecondition',NULL,'2021-03-02 07:12:08','2021-03-02 07:12:08'),(93,'delete-homecondition',NULL,'2021-03-02 07:12:08','2021-03-02 07:12:08'),(94,'add-homeextimate',NULL,'2021-03-02 10:20:44','2021-03-02 10:20:44'),(95,'edit-homeextimate',NULL,'2021-03-02 10:20:44','2021-03-02 10:20:44'),(96,'view-homeextimate',NULL,'2021-03-02 10:20:44','2021-03-02 10:20:44'),(97,'delete-homeextimate',NULL,'2021-03-02 10:20:44','2021-03-02 10:20:44'),(98,'add-paymentdetail',NULL,'2021-04-13 18:43:01','2021-04-13 18:43:01'),(99,'edit-paymentdetail',NULL,'2021-04-13 18:43:01','2021-04-13 18:43:01'),(100,'view-paymentdetail',NULL,'2021-04-13 18:43:01','2021-04-13 18:43:01'),(101,'delete-paymentdetail',NULL,'2021-04-13 18:43:01','2021-04-13 18:43:01'),(102,'add-assignlead',NULL,'2021-05-12 15:25:56','2021-05-12 15:25:56'),(103,'edit-assignlead',NULL,'2021-05-12 15:25:56','2021-05-12 15:25:56'),(104,'view-assignlead',NULL,'2021-05-12 15:25:56','2021-05-12 15:25:56'),(105,'delete-assignlead',NULL,'2021-05-12 15:25:56','2021-05-12 15:25:56'),(106,'add-subscriber',NULL,'2021-05-16 15:11:55','2021-05-16 15:11:55'),(107,'edit-subscriber',NULL,'2021-05-16 15:11:55','2021-05-16 15:11:55'),(108,'view-subscriber',NULL,'2021-05-16 15:11:55','2021-05-16 15:11:55'),(109,'delete-subscriber',NULL,'2021-05-16 15:11:55','2021-05-16 15:11:55'),(110,'add-assignestimate',NULL,'2021-05-22 03:58:04','2021-05-22 03:58:04'),(111,'edit-assignestimate',NULL,'2021-05-22 03:58:04','2021-05-22 03:58:04'),(112,'view-assignestimate',NULL,'2021-05-22 03:58:04','2021-05-22 03:58:04'),(113,'delete-assignestimate',NULL,'2021-05-22 03:58:04','2021-05-22 03:58:04');

/*Table structure for table `presses` */

DROP TABLE IF EXISTS `presses`;

CREATE TABLE `presses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `presses` */

insert  into `presses`(`id`,`created_at`,`updated_at`,`deleted_at`,`title`,`description`,`image`,`status`) values (1,'2021-01-01 07:28:11','2021-03-13 05:10:14',NULL,'A is simply dummy...','A is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','leadership/jU3XQNYLZGDFjcF1ZwkQS6m7SzSTdymbfpRdMZuu.png','1'),(2,'2021-01-01 07:28:44','2021-01-01 07:29:04',NULL,'B is simply dummy...','B is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','','1');

/*Table structure for table `profiles` */

DROP TABLE IF EXISTS `profiles`;

CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brokerage_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_sales` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `out_area_sales` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `condo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dribbble` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `earning` int(11) DEFAULT NULL,
  `zip1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip6` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip7` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip8` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip9` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip10` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `work_with_buyers` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_foreign` (`user_id`),
  CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `profiles` */

insert  into `profiles`(`id`,`user_id`,`bio`,`gender`,`dob`,`pic`,`country`,`state`,`city`,`address`,`long_address`,`lat`,`lng`,`postal`,`zip`,`brokerage_name`,`office_phone`,`mobile_phone`,`license_state`,`license_number`,`area_sales`,`out_area_sales`,`condo`,`facebook`,`twitter`,`dribbble`,`earning`,`zip1`,`zip2`,`zip3`,`zip4`,`zip5`,`zip6`,`zip7`,`zip8`,`zip9`,`zip10`,`created_at`,`work_with_buyers`,`updated_at`) values (1,1,NULL,NULL,NULL,'no_avatar.jpg',NULL,NULL,NULL,NULL,NULL,'40.560001','-74.290001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-10 05:40:59',NULL,'2020-12-10 05:40:59'),(2,2,'Reach us at contact@listquick.net','other',NULL,'lYdMLU6tn4.png',NULL,'CA','Los Angeles','5101 Santa Monica Blvd',NULL,'41.543056	','-90.590836',NULL,NULL,'ListQuick, Inc.',NULL,NULL,'CA',NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-10 05:40:59','yes','2021-07-01 11:00:55'),(177,207,NULL,NULL,NULL,'',' India',' Maharashtra','','Nagpur, Maharashtra, India','Nagpur, Maharashtra, India','21.1458004','79.0881546','',NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-06-22 10:54:33',NULL,'2021-06-22 10:54:33'),(179,211,NULL,'male','','zx3wY9DlMI3prJYmiCJtkgwFVcCuzLnxAWADfSSJ.png','USA','CA',NULL,'2901 Skyline Boulevard, Bakersfield, CA, USA','2901 Skyline Boulevard, Bakersfield, CA, USA','35.4004504','-118.9885446',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-06-23 06:51:19',NULL,'2021-06-24 06:05:19'),(180,212,NULL,'male',NULL,'','USA','CA','Santa Rosa','34532 Market Street #234','Santa Rosa, CA, USA','38.440429','-122.7140548',NULL,NULL,'Keller Williams','6617064686','6618630425','CA','34567890','79','23','44',NULL,NULL,NULL,NULL,'34355','34356','234522','12345678','2345678','123456','123456','123456','12345','234567','2021-06-23 07:07:53','yes','2021-06-24 06:01:13'),(181,213,NULL,'male','Jan-7-1993','','USA','NY','New York Updated','New York Botanical Garden, Southern Boulevard, Bronx, NY, USA','New York Botanical Garden, Southern Boulevard, Bronx, NY, USA','40.86170539999999','-73.8806902',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-06-23 13:20:57','yes','2021-06-24 02:52:40'),(182,214,NULL,'male',NULL,'','USA','CA',NULL,'Pasadena, CA, USA','Pasadena, CA, USA','34.1477849','-118.1445155',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-06-24 06:03:09','yes','2021-06-25 04:04:09'),(183,215,NULL,NULL,NULL,'pda3enZbmTEnISx3cPQRSnln7nnccTVFojd990IG.jpg',' USA',' CA','','25129 The Old Road, Stevenson Ranch, CA, USA','25129 The Old Road, Stevenson Ranch, CA, USA','34.3749711','-118.5645368','',NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-06-25 03:57:30',NULL,'2021-06-25 03:57:30'),(184,216,NULL,NULL,NULL,'','Pakistan','','','Pakistan','Pakistan','30.375321','69.34511599999999','',NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-06-25 10:05:00',NULL,'2021-06-25 10:05:00'),(185,217,NULL,NULL,NULL,'','RKzIHtiYmgyGkCO','','','RKzIHtiYmgyGkCO','RKzIHtiYmgyGkCO',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-06-25 23:15:12',NULL,'2021-06-25 23:15:12'),(186,219,NULL,NULL,NULL,'',' USA',' NY','','New Words, West 27th Street, New York, NY, USA','New Words, West 27th Street, New York, NY, USA','40.7458357','-73.99169239999999','',NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-06-26 02:43:35',NULL,'2021-06-26 02:43:35'),(187,220,NULL,NULL,NULL,'0O6nvaibRfDX9Wze6YlunhU54u0CFPxXYD0EPdRI.jpg',' USA',' PA','','Stroudsburg, PA, USA','Stroudsburg, PA, USA','40.9867609','-75.1946248','',NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-06-29 05:06:51',NULL,'2021-06-29 05:06:51'),(188,226,NULL,'male','','','Italy','Metropolitan City of Florence',NULL,'Florence, Metropolitan City of Florence, Italy','Florence, Metropolitan City of Florence, Italy','43.7695604','11.2558136',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-07-01 07:42:25',NULL,'2021-07-02 09:22:31'),(189,227,NULL,NULL,NULL,'','USA','','','USA','USA','37.09024','-95.712891','',NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-07-02 09:24:55',NULL,'2021-07-02 09:24:55'),(190,228,NULL,NULL,NULL,'',' USA',' CA','','28820 Chase Place, Santa Clarita, CA, USA','28820 Chase Place, Santa Clarita, CA, USA','34.4463173','-118.6445425','',NULL,NULL,NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-07-03 04:47:33',NULL,'2021-07-03 04:47:33'),(191,229,'After countless family vacations to Key West during his childhood, it was only natural that Tommy would eventually make the island his home. He finally made the move in his early 20\'s and hasn\'t looked back since. After years of enjoying the laid back Keys lifestyle, Tommy decided to pursue a career in real estate and found that he was a natural. His easy manner and friendly disposition combined with his perseverance create the perfect combination to provide his clients the real estate transactions they deserve.','male','Jul-2-2021','','USA','CA','Los Feliz','34563 Snowfall Lane #345','Los Feliz, Los Angeles, CA, USA','34.1063307','-118.2848199',NULL,NULL,'ListQuick','6618884445','6617653344','CA','#0989243545','87','24','44',NULL,NULL,NULL,NULL,'34567','34567','3456578','786543','65432','324567','345678','87654','65432','8765432','2021-07-03 04:50:36','yes','2021-07-03 04:55:46');

/*Table structure for table `property_types` */

DROP TABLE IF EXISTS `property_types`;

CREATE TABLE `property_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `property_types` */

insert  into `property_types`(`id`,`created_at`,`updated_at`,`deleted_at`,`title`,`description`,`icon`,`status`,`property_type`) values (1,'2020-12-31 12:02:00','2021-02-26 20:32:34',NULL,'Single Family',NULL,'fa fa-home icon icon-size','1','sale'),(2,'2020-12-31 12:03:06','2021-02-26 20:31:59',NULL,'Single Family',NULL,'fa fa-home icon icon-size','1','buy'),(3,'2021-02-26 20:33:37','2021-02-26 20:33:37',NULL,'Apartment/Condo',NULL,'fa fa-building icon icon-size','1','buy'),(4,'2021-02-26 20:33:59','2021-02-26 20:33:59',NULL,'Apartment/Condo',NULL,'fa fa-building icon icon-size','1','sale'),(5,'2021-03-09 23:33:31','2021-04-22 21:35:43',NULL,'Condominium','<p>Condominium</p>','fa fa-align-left  icon icon-size','0','sale'),(6,'2021-03-09 23:34:12','2021-04-22 21:37:24',NULL,'Townhouse','<p>Townhouse</p>','fa fa-align-left  icon icon-size','1','sale'),(7,'2021-03-09 23:39:02','2021-04-22 21:56:36',NULL,'Town Home','<p>Mobile Home</p>','fa fa-align-left  icon icon-size','1','buy'),(8,'2021-03-09 23:42:54','2021-04-22 21:36:21',NULL,'Commercial','<p>Commercial</p>','fa fa-align-left  icon icon-size','0','sale');

/*Table structure for table `ratings` */

DROP TABLE IF EXISTS `ratings`;

CREATE TABLE `ratings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `rating_by` int(11) DEFAULT NULL,
  `rating_to` int(11) DEFAULT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `ratings` */

insert  into `ratings`(`id`,`created_at`,`updated_at`,`deleted_at`,`rating_by`,`rating_to`,`rating`,`status`) values (2,'2021-06-25 03:03:53','2021-06-25 03:03:53',NULL,212,214,'4',NULL),(3,'2021-06-25 04:00:00','2021-06-25 04:00:00',NULL,214,212,'4',NULL);

/*Table structure for table `referals` */

DROP TABLE IF EXISTS `referals`;

CREATE TABLE `referals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `referal_by` int(11) DEFAULT NULL,
  `referal_to` int(11) DEFAULT NULL,
  `referal_client` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_viewed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `closing_property_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_commission_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `referals` */

insert  into `referals`(`id`,`created_at`,`updated_at`,`deleted_at`,`referal_by`,`referal_to`,`referal_client`,`price`,`fee`,`time`,`note`,`is_viewed`,`status`,`client_name`,`client_email`,`client_phone`,`closing_date`,`closing_price`,`closing_property_address`,`referral_commission_type`,`commission`) values (11,'2021-06-22 10:01:45','2021-06-22 10:01:45',NULL,204,203,'buyer','250,000','25','6Months','2 bed 1 bath','0','pending','Heidi Marina','heidi@gmail.com','555333344455',NULL,NULL,NULL,NULL,NULL),(12,'2021-06-23 06:35:08','2021-06-23 06:35:08',NULL,208,203,'buyer','700,000','25','2Months','Needs 3 beds and 3 baths','0','pending','Lacey Bengals','lb@yahoo.com','5552123345',NULL,NULL,NULL,NULL,NULL),(13,'2021-06-24 06:06:35','2021-06-24 06:07:51',NULL,212,211,'buyer','350,000','25','3Months','2 bed, 2 bath, and pool','1','accepted','Bert Kriecher','blogan7@yahoo.com','6617064686',NULL,NULL,NULL,NULL,NULL),(14,'2021-07-02 08:20:55','2021-07-02 08:23:18',NULL,212,215,'seller','$650,000','25','6Months','2 bed, 3 bath and pool','1','accepted','Frank Rodgers','frank@yahoo.com','8885436764',NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `reviews` */

DROP TABLE IF EXISTS `reviews`;

CREATE TABLE `reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `reviewed_by_id` int(11) DEFAULT NULL,
  `reviewed_to_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revieweer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revieweer_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revieweer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `reviews` */

insert  into `reviews`(`id`,`created_at`,`updated_at`,`deleted_at`,`reviewed_by_id`,`reviewed_to_id`,`revieweer_name`,`message`,`rating`,`status`,`revieweer_location`,`revieweer_email`) values (1,'2021-06-24 09:33:18','2021-06-24 09:33:18',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(2,'2021-06-25 04:00:06','2021-06-25 04:00:06',NULL,214,'212',NULL,'Very Good',NULL,NULL,NULL,NULL),(3,'2021-06-25 09:40:03','2021-06-25 09:40:03',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(4,'2021-06-26 09:33:35','2021-06-26 09:33:35',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(5,'2021-06-27 09:33:49','2021-06-27 09:33:49',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(6,'2021-06-28 09:31:57','2021-06-28 09:31:57',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(7,'2021-06-29 09:38:19','2021-06-29 09:38:19',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(8,'2021-06-30 09:37:16','2021-06-30 09:37:16',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(9,'2021-07-01 09:36:37','2021-07-01 09:36:37',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(10,'2021-07-02 09:34:41','2021-07-02 09:34:41',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(11,'2021-07-03 09:34:24','2021-07-03 09:34:24',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(12,'2021-07-04 09:32:51','2021-07-04 09:32:51',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(13,'2021-07-05 09:33:44','2021-07-05 09:33:44',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(14,'2021-07-06 09:36:14','2021-07-06 09:36:14',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(15,'2021-07-07 09:33:17','2021-07-07 09:33:17',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(16,'2021-07-08 09:34:47','2021-07-08 09:34:47',NULL,NULL,NULL,'1','1',NULL,'1','1','1'),(17,'2021-07-09 09:38:32','2021-07-09 09:38:32',NULL,NULL,NULL,'1','1',NULL,'1','1','1');

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`role_id`,`user_id`) values (1,1),(2,2),(3,207),(3,211),(3,212),(3,213),(3,214),(3,215),(3,216),(3,217),(3,219),(3,220),(3,226),(3,227),(3,228),(3,229);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`label`,`created_at`,`updated_at`) values (1,'admin',NULL,'2020-12-10 05:41:00','2020-12-10 05:41:00'),(2,'user',NULL,'2020-12-10 05:41:00','2020-12-10 05:41:00'),(3,'agent',NULL,'2020-12-11 03:19:01','2020-12-11 03:19:01');

/*Table structure for table `social_accounts` */

DROP TABLE IF EXISTS `social_accounts`;

CREATE TABLE `social_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `social_accounts` */

/*Table structure for table `subscribers` */

DROP TABLE IF EXISTS `subscribers`;

CREATE TABLE `subscribers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `subscribers` */

insert  into `subscribers`(`id`,`created_at`,`updated_at`,`deleted_at`,`first_name`,`last_name`,`email`,`status`) values (1,'2021-05-16 17:15:25','2021-05-16 17:15:25',NULL,'Zuhair','Zuhair','zat@tafsol.coom','subscribed'),(2,'2021-05-18 06:07:47','2021-05-18 06:07:47',NULL,'Afzal Ali','Afzal Ali','aatt@tafsol.com','subscribed'),(3,'2021-05-18 09:31:38','2021-05-18 09:31:38',NULL,'Waqas','Waqas','wkt@tafsol.com','subscribed'),(4,'2021-05-21 06:08:20','2021-05-21 06:08:20',NULL,'Afzal','Afzal','afzkhn@tafsol.com','subscribed'),(5,'2021-05-24 11:01:48','2021-05-24 11:01:48',NULL,'oxtKrThaZBnXuDM','oxtKrThaZBnXuDM','oureadsh@gmail.com','subscribed'),(6,'2021-05-27 08:30:57','2021-05-27 08:30:57',NULL,'Blake Logan','Blake Logan','blake@listquick.net','subscribed'),(7,'2021-05-27 08:35:29','2021-05-27 08:35:29',NULL,'Blake Borrells','Blake Borrells','blogan7@yahoo.com','subscribed'),(8,'2021-06-03 20:44:23','2021-06-03 20:44:23',NULL,'kTcWCshDenI','kTcWCshDenI','viscardi1982firewa@gmail.com','subscribed'),(9,'2021-06-17 00:29:59','2021-06-17 00:29:59',NULL,'YLNMvwkgami','YLNMvwkgami','lawsonp459@gmail.com','subscribed');

/*Table structure for table `testimonials` */

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `testimonials` */

insert  into `testimonials`(`id`,`created_at`,`updated_at`,`deleted_at`,`name`,`description`,`location`,`image`,`status`) values (1,'2021-01-01 04:45:38','2021-06-13 04:40:27','2021-06-13 04:40:27','Peter smith','<p>The service that ListQuik provided was a tremendous help. HomeLight was able to match our specific situation and needs to a selection of local realtors and remove a lot of the legwork from the selection process.</p>','Florida','testimonial/0F5WzEdRb1u56FBPEQwxh0deLieRjoMw7f900WBs.jpg','1'),(2,'2021-01-01 04:46:34','2021-06-13 04:40:31','2021-06-13 04:40:31','James smith','<p>The service that ListQuik provided was a tremendous help. HomeLight was able to match our specific situation and needs to a selection of local realtors and remove a lot of the legwork from the selection process.</p>','California US','testimonial/0gXbCySS3dXIBJOxyp3hrdJ78yO6BlQ9s7Ssts68.jpg','1');

/*Table structure for table `times` */

DROP TABLE IF EXISTS `times`;

CREATE TABLE `times` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `duration` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `times` */

insert  into `times`(`id`,`created_at`,`updated_at`,`deleted_at`,`duration`,`status`,`property_type`) values (7,'2020-12-18 16:24:48','2021-02-17 00:34:30',NULL,'ASAP','1','sale'),(8,'2020-12-18 16:25:06','2021-04-22 22:01:05',NULL,'ASAP','1','buy'),(9,'2020-12-18 16:25:22','2021-04-22 21:50:39',NULL,'2 - 3 Months','1','sale'),(10,'2020-12-18 16:25:33','2021-04-22 22:01:20',NULL,'2 - 3 Months','1','buy'),(11,'2020-12-18 16:25:43','2021-04-22 21:51:14',NULL,'4 - 6 Months','1','sale'),(12,'2021-02-26 20:35:32','2021-04-22 22:01:33',NULL,'4 - 6 Months','1','buy'),(13,'2021-02-26 20:36:06','2021-04-22 22:01:49',NULL,'6 - 12 Months','1','buy'),(14,'2021-02-26 20:38:09','2021-04-22 21:51:30',NULL,'6 - 12 Months','1','sale'),(15,'2021-03-09 23:49:48','2021-04-22 21:52:02',NULL,'12 Months +','1','sale'),(16,'2021-04-22 22:02:02','2021-04-22 22:02:02',NULL,'12 Months +','1','buy');

/*Table structure for table `tip_and_tools` */

DROP TABLE IF EXISTS `tip_and_tools`;

CREATE TABLE `tip_and_tools` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tip_and_tools` */

insert  into `tip_and_tools`(`id`,`created_at`,`updated_at`,`deleted_at`,`title`,`image`,`status`,`description`) values (1,'2021-01-01 04:47:37','2021-05-18 07:29:37',NULL,'<p>First Time Buyer Tips</p>','office/CKWZFROeSc4ucjDmPwnpACkjlpKl7fWMqcfm95HK.png','1','<p>There are two people <strong>critical</strong> to a happy, successful and hopefully profitable first home purchase. The first is&nbsp;a <strong>professional real estate agent </strong>who is knowledgeable, listens well, and always puts their client&rsquo;s needs before their own.</p>\r\n\r\n<p>Next, is a <strong>lender</strong> with the same skills and expertise in structuring the loan so that the buyer can <strong>afford it</strong> now and in the future. What many first-time buyers don&rsquo;t know is that the service and advice of the agent and the lender are <strong>FREE</strong>.</p>\r\n\r\n<p>COVID-19 created a housing market with low inventory and lots of buyers. This means that, depending on where you live, being a buyer can be difficult/stressful right now. Especially if you are working with an incompetent&nbsp;agent, which is why we recommend connecting with a <strong>ListQuick Certified Agent!</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>'),(2,'2021-01-01 04:48:06','2021-05-18 07:30:19',NULL,'<p>When is the Right Time?</p>','office/g2T3x5X6APABsnmKfEljw51uEGamUk8aoz8arJ4H.png','1','<p><strong>Congrats</strong>! Getting ready to buy a home is an exciting moment in one&#39;s life. Knowing when you&#39;re ready to buy (especially for the first time) can be somewhat daunting, so here&#39;s some tips!</p>\r\n\r\n<p><strong>Get Pre-Approved</strong></p>\r\n\r\n<p>Getting pre-approved or pre-qualified means reaching out to a lender or mortgage broker and seeing if you are ready to buy and at what price&nbsp;(based on credit, outstanding debts, income, etc.) Don&#39;t know which lender to reach out to? Connect with a ListQuick Certified Agent and they can connect you with a reputable lender in your area!</p>\r\n\r\n<p><strong>Make Sure You Are Solid</strong></p>\r\n\r\n<p>Once you&#39;re pre-approved for a certain price, start getting familiar with what homes are available in the area you are looking at for that price. Additionally, make&nbsp;sure you are solid in your source of income and that you don&#39;t take on any other sizable debts (like leasing an expensive car).</p>\r\n\r\n<p><strong>Factor In Other Costs</strong></p>\r\n\r\n<p>Buying a home should be a good investment, but it won&#39;t always be a &quot;turn-key&quot; purchase, meaning you&#39;ll need new paint, or new carpet, or new appliances, etc. Be sure to factor in these costs before making an offer.</p>\r\n\r\n<p><strong>Connect With A Great Agent</strong></p>\r\n\r\n<p>Once you&#39;ve done the previous actions, you should be ready to connect with a great buyer&#39;s agent who can help you make an offer on the right home! Of course, we suggest connecting with a ListQuick Certified Agent, because they&#39;re the best in the business (we made sure of it) and a portion of their commission will go to a non-profit in your area! But ultimately, you should work with the agent you are most comfortable with.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>'),(3,'2021-01-01 04:48:25','2021-05-07 16:45:25',NULL,'<p>Why it is Usually Better to Hire an Expert Agent</p>','office/LIJzop7IBlexRr9iVr9v1B6FO4WS09saJBAbWxLH.png','1','<p>Some people (especially first time sellers) can be shocked when, at the end of a listing appointment, an agent states their commission. <strong>Commission</strong> is the percentage of profits you pay the agent for helping sell your home. Usually, a 5-6% commission is standard for top agents.&nbsp;</p>\r\n\r\n<p>Most people understand that the agent they work with is going to coordinate all the nitty gritty actions that come with a home sale. Disclosures, contingencies, showings, staging, the list goes on.</p>\r\n\r\n<p>Furthermore, working with a reliable and professional agent should help you get a higher offer on your home, which helps to offset that 5-6% as well.</p>\r\n\r\n<p>Moving can be both an exciting and stressful endeavor. Enlisting the help of a trained professional should, in all cases, make the process more exciting than stressful!</p>\r\n\r\n<p>Go to our <strong>Sellers</strong> tab and enter your address, or reach out to us at contact@listquick.net to find out who the best agents are in your area.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>'),(4,'2021-01-01 04:48:52','2021-06-10 08:37:02',NULL,'<p>What Does Refinancing Mean?</p>','office/CDrdwwDaihlYIcUEHRYvcSzgN6YfyX2OgdlIyXYM.png','1','<p><strong>Refinancing</strong> your mortgage basically means that you are trading in your old mortgage for a new one, and possibly a new balance. When you refinance your mortgage, your bank or lender pays off your old mortgage with the new one; this is the reason for the term <strong>refinancing</strong>.<em> [via: centralbank.net]</em></p>\r\n\r\n<p><em>*Disclaimer: We aim to help individuals understand real estate more fully, we are not a lending institution and all decision-making advice should come from a trusted professional*</em></p>\r\n\r\n<p>So, when should you refinance? Well ultimately you need a <strong>trusted</strong> lender or mortgage broker to help you answer that question for yourself (depending on your debts, how much of the home is paid off, etc.) A few key things to look for to know when to reach out to that trusted professional entail:</p>\r\n\r\n<p><strong>1. &quot;Low interest rates&quot;</strong></p>\r\n\r\n<p>You may have heard that &quot;the Fed lowered the rate&quot; or &quot;interest rates are crazy low right now&quot;. This typically happens in response to an economic downturn (such as the COVID-19 impact) to stimulate the circulation of money/spending. If interest rates are more than 2% lower than your original mortgage, you should look further into refinancing.</p>\r\n\r\n<p><strong>2. Your credit is much better than before</strong></p>\r\n\r\n<p>If you had an average credit score when agreeing to your mortgage, your rate is probably higher than if you were to get a mortgage today (with significantly better credit). So, in simpler terms, if you know your credit score is much higher today than it was when you bought your home, you may want to look into refinancing for a better rate.</p>\r\n\r\n<p><strong>3. Equity</strong></p>\r\n\r\n<p>If you have a good amount of <strong>equity</strong> (payments made on your overall loan) in your house then refinancing could be in the cards. If, however, you&#39;ve only had your home for 10 months, you may not have built up enough equity to make refinancing worth it (again, you must consult a lender or mortgage broker to help you figure this out).</p>\r\n\r\n<p>If you&#39;ve been reading and thought &quot;yes that&#39;s me&quot; more than &quot;ehhh maybe not&quot; then, congrats, you may be able to refinance and have a lower monthly payment on your house! There are other tools that help like a <a href=\"https://www.nerdwallet.com/mortgages/refinance-calculator\">mortgage calculator</a> and let us know if you need help finding a trusted lender in your area!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p><br />\r\n&nbsp;</p>'),(5,'2021-03-20 17:06:08','2021-05-07 16:28:40',NULL,'<p>Low Cost Improvements to Get the Best Price</p>','office/GuRo649VT5i7i1Lh52LX141tnbVXo6iAgPfB2two.png','1','<p>If you don&#39;t need to sell your home immediately and want to get top dollar, the following low cost upgrades can add significant value to your final sale price.</p>\r\n\r\n<p><strong>New Carpet</strong></p>\r\n\r\n<p>If your home has carpet that hasn&#39;t been replaced in over six years, updating it can more than pay for itself.</p>\r\n\r\n<p><strong>Fresh Paint</strong></p>\r\n\r\n<p>Hiring painters can cost $2,000+ for interior and $3,000+ for exterior, or you can paint yourself and save money. Any of these options should add $5,000+ to your sale price.</p>\r\n\r\n<p><strong>Lights &amp; Fixtures</strong></p>\r\n\r\n<p>Making sure your home is well lit and has modern light fixtures is a simple detail that makes a good impression to buyers.</p>\r\n\r\n<p><strong>Mild Landscaping </strong></p>\r\n\r\n<p>Whether you hire someone or go DIY, making sure your lawn, plants and paths are manicured is an easy way to set the tone for a competitive list price.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>'),(6,'2021-03-20 17:06:40','2021-05-18 07:33:58',NULL,'<p>How We&#39;re Socially Responsible</p>','office/mSWZFlWIgr5hyFeYH5xWDtNdn4Jx1gMB0qgPN1mQ.png','1','<p>ListQuick was founded with the goal of <strong>helping people</strong>. We wanted to not only help people have a great experience&nbsp;when buying or selling their home but also&nbsp;give back to those communities. &nbsp;</p>\r\n\r\n<p>Our founders have travelled across America and met many people that were struck by homelessness. We wanted to help unhoused individuals regain stability. That&#39;s why, whenever a person buys or sells their home with a<strong> ListQuick Certified Agent,</strong> a portion of the agent&#39;s commission&nbsp;goes to a <strong>non-profit </strong>organization fighting homelessness in that state. &nbsp;</p>\r\n\r\n<p>If you want to work with the best and give back to your community, remember&nbsp;to use ListQuick!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>'),(7,'2021-05-24 15:53:10','2021-05-24 15:54:01','2021-05-24 15:54:01','<p>Word of the Week: &nbsp;Contingency</p>','tipandtool/eKKu926ilODtmr0cJ4jIwn387nZE2i82Av2eboio.png','1',NULL);

/*Table structure for table `types` */

DROP TABLE IF EXISTS `types`;

CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `types` */

insert  into `types`(`id`,`created_at`,`updated_at`,`deleted_at`,`name`,`status`) values (1,NULL,NULL,NULL,'agent','1'),(2,'2020-12-14 05:46:00','2020-12-14 05:46:00',NULL,'ceo','1'),(3,'2020-12-14 06:05:50','2020-12-14 06:05:50',NULL,'client','1'),(4,'2020-12-14 06:09:22','2020-12-14 06:09:22',NULL,'other','1');

/*Table structure for table `user_payments` */

DROP TABLE IF EXISTS `user_payments`;

CREATE TABLE `user_payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `amount_captured` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_refunded` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `captured` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outcome` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_expiration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_payments` */

insert  into `user_payments`(`id`,`created_at`,`updated_at`,`deleted_at`,`user_id`,`amount`,`amount_captured`,`amount_refunded`,`captured`,`currency`,`description`,`outcome`,`paid`,`payment_method_details`,`receipt_url`,`card_number`,`cvv`,`card_expiration`,`package_id`,`subscription_status`,`subscription_id`,`status`) values (1,'2021-05-14 13:14:49','2021-05-14 13:14:49',NULL,53,149,'149','','','','','','1','','Not available','4242424242424242','123','12-33','2','active','52957999',NULL),(2,'2021-05-18 08:27:46','2021-05-18 08:27:46',NULL,173,149,'149','','','','','','1','','Not available','4342573997514257','567','04-22','2','active','53005149',NULL),(3,'2021-05-19 17:19:12','2021-05-19 17:19:12',NULL,174,149,'149','','','','','','1','','Not available','4342573997514257','234','02-22','2','active','53023440',NULL),(4,'2021-05-20 03:14:32','2021-05-20 03:14:32',NULL,175,149,'149','','','','','','1','','Not available','4242424242424242','123','12-23','2','active','53027570',NULL),(5,'2021-05-25 06:12:45','2021-05-25 06:12:45',NULL,180,149,'149','','','','','','1','','Not available','4242424242424242','123','02-22','2','active','53086738',NULL),(6,'2021-06-10 09:11:50','2021-06-10 09:11:50',NULL,195,149,'149','','','','','','1','','Not available','4342573997514257','222','02-22','2','active','53285612',NULL),(7,'2021-06-10 12:01:17','2021-06-10 12:01:17',NULL,198,149,'149','','','','','','1','','Not available','4242424242424242','123','12-25','2','active','53287201',NULL),(8,'2021-06-12 01:55:12','2021-06-12 01:55:12',NULL,199,149,'149','','','','','','1','','Not available','4242424242424242','123','12-25','2','active','53305356',NULL),(9,'2021-06-12 03:18:11','2021-06-12 03:18:11',NULL,200,149,'149','','','','','','1','','Not available','4242424242424242','123','12-23','2','active','53306743',NULL),(10,'2021-06-16 05:00:58','2021-06-16 05:00:58',NULL,204,149,'149','','','','','','1','','Not available','4342573997514257','345','02-22','2','active','53349175',NULL),(11,'2021-06-23 07:09:52','2021-06-23 07:09:52',NULL,212,149,'149','','','','','','1','','Not available','5339175925600141','244','02-42','2','active','53429728',NULL),(12,'2021-06-25 06:10:15','2021-06-25 06:10:15',NULL,207,149,'149','','','','','','1','','Not available','4513810813645003','123','01-2024','2','active','53455698',NULL),(13,'2021-06-30 07:07:10','2021-06-30 07:07:10',NULL,216,149,'149','','','','','','1','','Not available','4076146495393243','123','7-22','2','active','53511147',NULL),(14,'2021-07-03 04:51:52','2021-07-03 04:51:52',NULL,229,149,'149','','','','','','1','','Not available','5339175925600141','123','12-34','2','active','53557281',NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1-active,2-banned',
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_expiry_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_expired` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `paid` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `popover_disabled` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `next_disabled` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`type_id`,`package_id`,`first_name`,`last_name`,`name`,`email`,`password`,`provider_id`,`provider`,`status`,`picture`,`trial_expiry_date`,`trial_expired`,`paid`,`popover_disabled`,`next_disabled`,`remember_token`,`created_at`,`updated_at`,`deleted_at`) values (1,NULL,NULL,NULL,NULL,'Admin','admin@developer.com','$2y$10$/8999AITxBoY8EWN4LbqierAEIHNz8VMEz9/mtn/dvwK9ZlcHrZwm',NULL,NULL,1,NULL,'Mon 08-Jan-2022','1','0','1','0',NULL,'2020-12-10 05:40:59','2021-06-12 01:40:27',NULL),(2,NULL,NULL,NULL,NULL,'ListQuick','admin@listquick.net','$2y$10$92eklwKhlf2h4fkpjFAQ/.rs/Teu.hP1yLY7f9QrcCpiiuiA0Vv5G',NULL,NULL,1,NULL,NULL,'1','1','1','1',NULL,'2020-12-10 05:40:59','2021-07-01 11:00:55',NULL),(207,NULL,2,'kishor','Bhojane','kishor Bhojane','kishor@listquick.net','$2y$10$NZQ4p4j3VT.Ru7esDEagrOf.0HrR.9MtvQYh06x3GQ9vStB3tHNKG',NULL,NULL,0,'','Jun-20-2021','1','1','1','0',NULL,'2021-06-22 10:54:33','2021-06-25 09:11:05','2021-06-25 09:11:05'),(211,NULL,NULL,'Blake','Logan','Blake Logan','blogan83@yahoo.com','$2y$10$PeCCM6Z95W.OTii0I9/bkeEayKEM59fl/asu2fXgt/gsV0l/qp3v6',NULL,NULL,1,'zx3wY9DlMI3prJYmiCJtkgwFVcCuzLnxAWADfSSJ.png','Jun-22-2023','0','0','0','0',NULL,'2021-06-23 06:51:19','2021-06-24 06:05:18',NULL),(212,NULL,2,'Mark','Johnson','Mark Johnson','mark@gmail.com','$2y$10$ur68y81YRTXnHYGZnpCbAukkTVN5hVcUP1RWoWQzvTcnJaARXTCcO',NULL,NULL,1,'','Jun-21-2021','1','1','0','1',NULL,'2021-06-23 07:07:53','2021-06-23 07:13:38',NULL),(213,NULL,NULL,'AFtab','Ali','AFtab Ali','aftab@yopmail.com','$2y$10$i5UuuVPOntpOz.zoYBp.nuFD1oM4ZJ1n.iFKEdbl45v7mMlLh10lC',NULL,NULL,1,'','Jun-23-2023','0','0','0','1',NULL,'2021-06-23 13:20:57','2021-06-24 03:05:06',NULL),(214,NULL,NULL,'Tom','Segura','Tom Segura','tom@yahoo.com','$2y$10$NkLDhalyB49V9D5sz7kET.aNZ8/LHq0HRXgBCe8qfKF4ni5K.1R6S',NULL,NULL,1,'','Jun-23-2023','0','0','0','1',NULL,'2021-06-24 06:03:09','2021-06-25 04:04:09',NULL),(215,NULL,NULL,'Neal','Weichel','Neal Weichel','neal@nealweichel.com','$2y$10$9PJXxaIDiMaL6yHK6PCnbeXveR6PD.kKS652rSTVByQUqn3AHt6Xu',NULL,NULL,1,'pda3enZbmTEnISx3cPQRSnln7nnccTVFojd990IG.jpg','Jun-24-2023','0','0','0','0',NULL,'2021-06-25 03:57:30','2021-06-25 03:57:30',NULL),(216,NULL,2,'Shariq','Afridi','Shariq Afridi','shariq@listquick.net','$2y$10$JJcBGNWlProohW7Eqqspo.DsrBF3hXm1OUZMcMrgIEkkjbMvkhIva',NULL,NULL,1,'','Jun-23-2021','1','1','1','0',NULL,'2021-06-25 10:05:00','2021-07-01 07:49:10',NULL),(217,NULL,NULL,'jaORzbQZyVcG','WJXFYUSme','jaORzbQZyVcG WJXFYUSme','evelynngravley103@gmail.com','$2y$10$UJyDjLp9mvBU7qpIIuj6fu3wZmtXoQje9Q1J0ilCQdykqfORfPYKm',NULL,NULL,0,'','Jun-24-2021','1','0','0','0',NULL,'2021-06-25 23:15:12','2021-06-25 23:15:12',NULL),(219,NULL,NULL,'james','lee','james lee','james@yopmail.com','$2y$10$wjP.MKCKP5xkVgkTE21eO.hIIsIr9cQgAy57AM/ZZpjGoSnX/ArFy',NULL,NULL,0,'','Jun-24-2021','1','0','0','0',NULL,'2021-06-26 02:43:35','2021-06-26 02:43:35',NULL),(220,NULL,NULL,'Alex','Camaerei','Alex Camaerei','acamaerei@kw.com','$2y$10$SHhwj3VhHClMc9I9MshKBOJAiBm4OvRI1LQBtbeTpIgaGhrwBFk5u',NULL,NULL,0,'0O6nvaibRfDX9Wze6YlunhU54u0CFPxXYD0EPdRI.jpg','Jun-27-2021','1','0','0','0',NULL,'2021-06-29 05:06:50','2021-06-29 05:06:51',NULL),(222,NULL,NULL,'Sanket','Apte','Sanket Apte','sanket@biz4solutions.com','$2y$10$Nb9dpJdgQSLTscLqW6Evs.8ZpFkiGV8efreRnxLOW9Zy0RtjYg/OW',NULL,NULL,0,'',NULL,'0','0','0','0',NULL,'2021-06-29 22:21:45','2021-06-29 22:21:45',NULL),(226,NULL,NULL,'testing','testing','testing testing','testing@gmail.com','$2y$10$v9PqUR0QguoOJIcDJF2sBuUd9zTKlPMq0Pbv28UVundkcpL7w49IO',NULL,NULL,0,'','Jun-29-2021','1','0','0','0',NULL,'2021-07-01 07:42:25','2021-07-01 07:42:25',NULL),(227,NULL,NULL,'weasdfa','sf','weasdfa sf','sf@gmail.com','$2y$10$ECa4h3adNT6vEDRMoxW1P.nx4vKx828XGGGDpvI/PQ9NNNKfK2Q4a',NULL,NULL,0,'','Jun-30-2021','1','0','0','0',NULL,'2021-07-02 09:24:55','2021-07-02 09:24:55',NULL),(228,NULL,NULL,'Tommy','John','Tommy John','tommy@yahoo.com','$2y$10$PGbQVfgNiH1yupsCRdbIpO4i.ugK1f698StG23BHfNDXw2GZ2tkV6',NULL,NULL,1,'','Jul-02-2023','0','0','0','0',NULL,'2021-07-03 04:47:33','2021-07-03 04:47:33',NULL),(229,NULL,2,'Marco','Rodriguiz','Marco Rodriguiz','marco@gmail.com','$2y$10$c7TC34nm.1qNbGPR43g1Xe5vUeGhrHy4DbnAzIZrbvI9tIi5SsmsW',NULL,NULL,1,'','Jul-01-2021','1','1','1','1',NULL,'2021-07-03 04:50:36','2021-07-03 05:20:43',NULL);

/*Table structure for table `worths` */

DROP TABLE IF EXISTS `worths`;

CREATE TABLE `worths` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `worths` */

insert  into `worths`(`id`,`created_at`,`updated_at`,`deleted_at`,`price`,`currency`,`status`,`property_type`) values (1,'2020-12-31 12:04:11','2021-04-22 21:57:44',NULL,'$10K - $100K','$','1','buy'),(2,'2020-12-31 12:04:21','2021-04-22 21:46:43',NULL,'$10k - $100K','$','1','sale'),(3,'2021-02-27 00:47:50','2021-04-22 21:57:57',NULL,'$100K - $300K','$','1','buy'),(4,'2021-03-09 23:46:19','2021-04-22 21:43:42',NULL,'$100K - $300K','$','1','sale'),(5,'2021-03-09 23:46:37','2021-04-22 21:44:01',NULL,'$300K - $450K','$','1','sale'),(6,'2021-03-09 23:47:08','2021-04-22 21:45:04',NULL,'$450K - $550K','$','1','sale'),(7,'2021-03-09 23:47:20','2021-04-22 21:45:23',NULL,'$500K - $700K','$','1','sale'),(8,'2021-03-09 23:48:05','2021-04-22 21:45:42',NULL,'$700K - $900K','$','1','sale'),(9,'2021-03-09 23:55:42','2021-04-22 21:46:00',NULL,'$1.0M +','$','1','sale'),(10,'2021-04-22 21:58:18','2021-04-22 21:58:18',NULL,'$300K - $450K','$','1','buy'),(11,'2021-04-22 21:58:35','2021-04-22 21:58:35',NULL,'$450K - $550K','$','1','buy'),(12,'2021-04-22 21:59:06','2021-04-22 21:59:42',NULL,'$500K - $700K','$','1','buy'),(13,'2021-04-22 22:00:04','2021-04-22 22:00:18',NULL,'$700K - $900K','$','1','buy'),(14,'2021-04-22 22:00:34','2021-04-22 22:00:34',NULL,'$1.0M +','$','1','buy');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
