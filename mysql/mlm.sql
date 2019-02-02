/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 8.0.14 : Database - mlm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mlm` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `mlm`;

/*Data for the table `bonus` */

insert  into `bonus`(`id`,`name`,`percent`,`description`) values 
(1,'Personal Bonus',10.00,'Earn 10% from each first member\'s purchase you invite.'),
(2,'Sliding Bonus',1.00,'if you\'re qualified (at least one left paid and one right paid under you)\r\n Earn 1% from every member\'s paid under your geneology, up to 15 level.'),
(3,'Chain Bonus',40.00,'If ratio left:right or right:left eq 2, then you will get one pay step.'),
(4,'Matching Bonus',10.00,'When our invite member for Chain bonus, we will get 10% of Member Chain Bonus.');

/*Data for the table `category` */

insert  into `category`(`id`,`name`,`description`,`create_date`) values 
(12,'mondextel','mondex tel test','2019-01-29 10:25:55');

/*Data for the table `currency` */

insert  into `currency`(`id`,`name`,`code`) values 
(1,'Bitcoin','BTC');

/*Data for the table `member_log` */

insert  into `member_log`(`id`,`name`,`parent_id`,`isLeft`,`path`,`sponsor_id`,`leftMember`,`rightMember`,`chainLeftMember`,`chainRightMember`) values 
(335,'Hiten Pingolia',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(336,'Ramesh kumar',335,0,NULL,335,NULL,NULL,NULL,NULL),
(337,'Shyam lal',336,1,NULL,335,NULL,NULL,NULL,NULL),
(338,'Chander Prakash',335,1,NULL,335,NULL,NULL,NULL,NULL),
(339,'Rajesh',336,0,NULL,335,NULL,NULL,NULL,NULL),
(340,'Mahesh',339,NULL,NULL,336,NULL,NULL,NULL,NULL),
(341,'Mahendra singh',338,NULL,NULL,335,NULL,NULL,NULL,NULL),
(342,'Rakesh kumar',341,NULL,NULL,336,NULL,NULL,NULL,NULL),
(343,'Sanjay',341,NULL,NULL,336,NULL,NULL,NULL,NULL),
(344,'ryu',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(345,'park',344,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(346,'park1',345,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(347,'park2',345,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(348,'park3',345,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(349,'park4',345,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(350,'park5',345,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Data for the table `orders` */

insert  into `orders`(`id`,`order_id`,`member_id`,`member_name`,`product_id`,`qty`,`is_igst`,`unit_price`,`create_date`) values 
(242,'03351527834133','335','Hiten Pingolia','234263','1','undefined','45000','2018-06-01 08:22:13'),
(243,'03351527834332','335','Hiten Pingolia','234262','1','undefined','20000','2018-06-01 08:25:32'),
(245,'03351527834508','335','Bhawani Singh','234261','1','undefined','15000','2018-06-01 08:28:28'),
(246,'03351527834551','335','Bhawani','234261','1','undefined','15000','2018-06-01 08:29:11'),
(247,'03361527834641','336','Ramesh kumar','234263','1','undefined','45000','2018-06-01 08:30:41'),
(248,'03371527834720','337','Shyam lal','234260','1','undefined','10000','2018-06-01 08:32:00'),
(249,'03381527834813','338','Chander Prakash','234262','1','undefined','20000','2018-06-01 08:33:33'),
(250,'03391527835036','339','Rajesh','234261','1','undefined','15000','2018-06-01 08:37:16'),
(251,'03401527835071','340','Mahesh','234263','1','undefined','45000','2018-06-01 08:37:51'),
(252,'03411527835114','341','Mahendra singh','234260','1','undefined','10000','2018-06-01 08:38:34'),
(253,'03421527835156','342','Rakesh kumar','234262','1','undefined','20000','2018-06-01 08:39:16'),
(254,'03441548735647','344','ryu','234261','1','undefined','1000','2019-01-29 04:20:47'),
(255,'03451548736342','345','park','234263','5','undefined','45000','2019-01-29 04:32:22'),
(256,'03461548737227','346','park1','234266','10','undefined','3000','2019-01-29 04:47:07'),
(257,'03471548737348','347','park2','234266','10','undefined','3000','2019-01-29 04:49:08'),
(258,'03481548737406','348','park3','234266','10','undefined','3000','2019-01-29 04:50:06'),
(259,'03491548737498','349','park4','234266','10','undefined','3000','2019-01-29 04:51:38'),
(260,'03501548737597','350','park5','234266','10','undefined','3000','2019-01-29 04:53:17');

/*Data for the table `products` */

insert  into `products`(`id`,`user_id`,`type`,`ProductName`,`ProductCategory`,`Tax`,`sgst`,`cgst`,`igst`,`Available_qty`,`SKU`,`Price`,`hsn`,`sac`,`SalePrice`,`description`,`productImage`,`company_name`,`company_email`,`company_phone`,`City`,`State`,`Pincode`,`company_address`,`ip_address`,`create_date`) values 
(234260,133,'','B','Category 2','',5,2,1,10,'KJO8754',2000,'','',2000,'product desctrion ','test_-_Copy_(2).png','','','','','','','','124.83.34.158','2019-01-29 04:41:47'),
(234261,133,'','D','Category 3','',5,2,1,10,'KJO8754',1000,'','',1000,'test','test_-_Copy_(2).png','','','','','','','','124.83.34.158','2019-01-29 04:38:37'),
(234262,133,'','C','Category 4','',5,2,1,10,'KJO8755',3000,'','',3000,'product desctrion ','requirement.jpg','','','','','','','','124.83.34.158','2019-01-29 04:41:18'),
(234263,133,'','A','Category 1','',5,2,1,10,'KJO8754',1000,'','',1000,'product desctrion ','test_-_Copy_(2).png','','','','','','','','124.83.34.158','2019-01-29 04:40:22'),
(234265,133,'','E','Category 1','',1,1,1,1,'Unknown',5000,'1','1',5000,'Unknown','','','','','','','','','124.83.34.158','2019-01-29 04:40:42'),
(234266,133,'','CLB','Category 1','',0,0,0,0,'',3000,'','',3000,'coinloanbank test','a.JPG','','','','','','','','124.83.34.158','2019-01-29 03:26:47');

/*Data for the table `purchase_products` */

insert  into `purchase_products`(`id`,`name`,`qty`,`unit_price`,`TaxAmount`,`Tax`,`description`,`company_name`,`company_email`,`company_phone`,`City`,`State`,`Pincode`,`company_address`,`ip_address`,`create_date`) values 
(12,'Producth',80,599,'','','Test test sadlfk','Testing','test@gmail.com','978585834812','','','','tes asdlf asdf ','::1','2018-01-25 11:47:15'),
(15,'Product 1111',5,250,'','','asdfaasfasdf',' asldfk','test@gmail.com','3424234','','','','sdfsadfsdf','::1','2018-01-24 19:01:51'),
(17,'Product 6',5,599,'','','Test test sadlfk','Testing','test@gmail.com','978585834812','','','','tes asdlf asdf ','::1','2018-01-25 09:38:29'),
(18,'Productererre',5,599,'','','Test test sadlfk','Testing','test@gmail.com','978585834812','','','','tes asdlf asdf ','::1','2018-01-25 09:40:10'),
(23,'Product Helo',800,599,'','','Test test sadlfk','Testing','test@gmail.com','978585834812','','','','tes asdlf asdf ','::1','2018-01-25 11:47:24'),
(26,'sari',100,500,'2500','','rffghfhf','bvvb fg','gfg@gdfg','878768768','ggfh','hgfhgfh','4545','ghjgjhgj','157.37.128.110','');

/*Data for the table `settings` */

insert  into `settings`(`id`,`type`,`value`) values 
(1,'tax','10');

/*Data for the table `user_account_btc` */

/*Data for the table `user_account_coin_transaction` */

/*Data for the table `user_balance` */

/*Data for the table `user_bonus` */

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`role`,`status`,`name`,`first_name`,`last_name`,`email`,`alternateEmail`,`mobile_no`,`language`,`website`,`picture_url`,`profile_url`,`dob`,`gender`,`about`,`locale`,`designation`,`address`,`country`,`city`,`pincode`,`vat_number`,`AccountNumber`,`IFSCCode`,`ip_address`,`created`,`lastlogged`,`modified`) values 
(133,'admin@mlm.com','$2y$12$RyMmZVcqPEt9X2lJbHg1PeFJqcpURF2QOrH4vqMEQELe9wDMLfZYe','Admin',1,'Admin MLM','Admin','MLM','admin@mlm.com','','9785834812','','','2.png','','','','MLM','','','VDN Jaipur','india','JAIPUR','332710','','','','124.83.34.158','2018-01-06 13:23:35','02-02-2019 00:04 AM','2019-01-29 04:26:27'),
(335,'test@gmail.com','$2y$12$RyMmZVcqPEt9X2lJbHg1PeLoyYG/tmPfdXxuFRSkC2pxeIfZSJYyq','Customer',1,'Hiten Pingolia','','','test@gmail.com','','9785834812','','','Hiten_Pingolia_n_2.jpg','','','','','','','VDN, Jaipur','','','302039','','','','::1','2018-06-01 08:22:13','',''),
(336,'asdfsdf@gmail.com','$2y$12$RyMmZVcqPEt9X2lJbHg1PevCL1nsTUdkc66kifObY9qjCaoO/7ctu','Customer',0,'Ramesh kumar','','','asdfsdf@gmail.com','','9785834812','','','','','','','','','','VDN, Jaipur, dfdf\r\ndfdf','','','302039','','','','::1','2018-06-01 08:30:41','',''),
(337,'sll@gmail.com','$2y$12$RyMmZVcqPEt9X2lJbHg1PebiuZICwrEHnLNE8ki24QtQGRs/9fgpu','Customer',0,'Shyam lal','','','sll@gmail.com','','9785834812','','','','','','','','','','VDN, Jaipur\r\ndfdf','','','302039','','','','::1','2018-06-01 08:31:59','',''),
(338,'ch@gmail.com','$2y$12$RyMmZVcqPEt9X2lJbHg1PekLINsFq0HfMut2rbzXaD33SZ7WwUth.','Customer',0,'Chander Prakash','','','ch@gmail.com','','9785834812','','','','','','','','','','VDN, Jaipur\r\n','','','302039','','','','::1','2018-06-01 08:33:32','',''),
(339,'hiten0794@gmail.com','$2y$12$RyMmZVcqPEt9X2lJbHg1PeHOnrjOJy5AZjouAQeWcQLb5MOtR9e4S','Customer',0,'Rajesh','','','hiten0794@gmail.com','','9785834812','','','41.png','','','','','','','VDN, Jaipur\r\ndfdf','','','302039','','','','::1','2018-06-01 08:37:16','',''),
(340,'asdf@gmail.com','$2y$12$RyMmZVcqPEt9X2lJbHg1PeSILXXkosyp9DRRxrhmJa81LgvnwZBK6','Customer',0,'Mahesh','','','asdf@gmail.com','','9785834812','','','','','','','','','','VDN, Jaipur\r\ndfdf','','','302039','','','','::1','2018-06-01 08:37:51','',''),
(341,'arer@gmail.com','$2y$12$RyMmZVcqPEt9X2lJbHg1PeZksiurniWOXvt7bdTbXRCw6BtWp8OSO','Customer',0,'Mahendra singh','','','arer@gmail.com','','9785834812','','','','','','','','','','VDN, Jaipur\r\ndfdf','','','302039','','','','::1','2018-06-01 08:38:33','',''),
(342,'adsfasdfsdf@gmail.com','$2y$12$RyMmZVcqPEt9X2lJbHg1Pe6VH8iAAzbIVBPsgkWn.VcyhZwU72KGO','Customer',0,'Rakesh kumar','','','adsfasdfsdf@gmail.com','','9785834812','','','','','','','','','','VDN, Jaipur\r\ndfdf','','','302039','','','','::1','2018-06-01 08:39:15','',''),
(343,'s@gmail.comdfsdfs','$2y$12$RyMmZVcqPEt9X2lJbHg1Pe2DzcekIZBqB3qcGslZEtH5BSg9SLfLK','Customer',0,'Sanjay','','','s@gmail.comdfsdfs','','9785834812','','','','','','','','','','VDN, Jaipur\r\ndfdf','','','302039','','','','::1','2018-06-01 08:39:39','',''),
(344,'sjm0812@gmail.com','$2y$12$RyMmZVcqPEt9X2lJbHg1PeLGKlx95R/ISWcR/FzcE79xxzVEux6hm','Customer',0,'ryu','','','sjm0812@gmail.com','','01036699144','','','','','','','','','','seoul','','','1234','','','','124.83.34.158','2019-01-29 04:20:47','',''),
(345,'pmspsbros@gmail.com','$2y$12$RyMmZVcqPEt9X2lJbHg1PeYpeaQKNZ3uv7a/aNP.yBI9l45UZWNoS','Customer',0,'park','','','pmspsbros@gmail.com','','123456','','','','','','','','','','kor','','','0070','','','','124.83.34.158','2019-01-29 04:32:22','',''),
(346,'pmstarjjang@naver.com','$2y$12$RyMmZVcqPEt9X2lJbHg1Pev5GAVvfdajMxdvM7.SEbBe.f9Cxn5I2','Customer',0,'park1','','','pmstarjjang@naver.com','','1234567','','','','','','','','','','kor','','','0070','','','','124.83.34.158','2019-01-29 04:47:07','',''),
(347,'as@test.com','$2y$12$RyMmZVcqPEt9X2lJbHg1PeotgSBHhG8J0MiY52NfVGNGxHHmOgD/m','Customer',0,'park2','','','as@test.com','','12345678','','','','','','','','','','kor','','','0070','','','','124.83.34.158','2019-01-29 04:49:08','',''),
(348,'qw@test.com','$2y$12$RyMmZVcqPEt9X2lJbHg1PeRB6he8I5xwhCLBz/ud.BRMFtMDfe4G6','Customer',0,'park3','','','qw@test.com','','123456789','','','','','','','','','','kor','','','0070','','','','124.83.34.158','2019-01-29 04:50:06','',''),
(349,'pp@test.com','$2y$12$RyMmZVcqPEt9X2lJbHg1Pe8OhlSi2/Y3Xp2z1IgNJDmoDN7FuBYo6','Customer',0,'park4','','','pp@test.com','','213456','','','','','','','','','','kor','','','0070','','','','124.83.34.158','2019-01-29 04:51:38','',''),
(350,'eee@test.com','$2y$12$RyMmZVcqPEt9X2lJbHg1Pe4eYA3AaMlvfOCgSRzVZ0kAkiq6mdORq','Customer',0,'park5','','','eee@test.com','','345563','','','','','','','','','','kor','','','0070','','','','124.83.34.158','2019-01-29 04:53:17','','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
