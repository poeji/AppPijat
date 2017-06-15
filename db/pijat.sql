/*
SQLyog Job Agent v11.11 (32 bit) Copyright(c) Webyog Inc. All Rights Reserved.


MySQL - 5.5.5-10.1.21-MariaDB : Database - pijat
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pijat` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pijat`;

/*Table structure for table `banks` */

DROP TABLE IF EXISTS `banks`;

CREATE TABLE `banks` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(100) NOT NULL,
  `bank_account_number` varchar(100) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `banks` */

insert  into `banks` values (1,'Mandiri',''),(2,'BCA',''),(3,'BRI','');

/*Table structure for table `branches` */

DROP TABLE IF EXISTS `branches`;

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(200) NOT NULL,
  `branch_desc` text NOT NULL,
  `branch_address` text NOT NULL,
  `branch_phone` varchar(100) NOT NULL,
  `branch_city` varchar(100) NOT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `branches` */

insert  into `branches` values (3,'Bakmi Gili 1','','Delta Mall','0315926983','Surabaya'),(4,'Bakmi Gili 2','Cabang Baru Balkpapan','Tunjungan Plaza','08123120398','Surabaya'),(5,'asdasdsa','acacddcc','3edsad','3133','qeddsx'),(6,'spa sby','afgfavg','jasjfajk','04105891','surabaya');

/*Table structure for table `buildings` */

DROP TABLE IF EXISTS `buildings`;

CREATE TABLE `buildings` (
  `building_id` int(11) NOT NULL AUTO_INCREMENT,
  `building_name` varchar(100) NOT NULL,
  `building_img` text NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`building_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `buildings` */

insert  into `buildings` values (7,'Utama Delta','1487748710_room.png',3),(8,'Utama TP ','1487748733_room.png',4),(9,'Utama','',5);

/*Table structure for table `infrastruktur` */

DROP TABLE IF EXISTS `infrastruktur`;

CREATE TABLE `infrastruktur` (
  `infrastruktur_id` int(11) NOT NULL AUTO_INCREMENT,
  `infrastruktur_name` varchar(200) NOT NULL,
  `infrastruktur_warna` varchar(200) NOT NULL,
  `ruangan` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  PRIMARY KEY (`infrastruktur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `infrastruktur` */

/*Table structure for table `item_stocks` */

DROP TABLE IF EXISTS `item_stocks`;

CREATE TABLE `item_stocks` (
  `item_stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `item` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  PRIMARY KEY (`item_stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `item_stocks` */

/*Table structure for table `items` */

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(200) NOT NULL,
  `item_hpp` int(11) NOT NULL,
  `item_harga` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `items` */

/*Table structure for table `journal_types` */

DROP TABLE IF EXISTS `journal_types`;

CREATE TABLE `journal_types` (
  `journal_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_type_name` varchar(200) NOT NULL,
  PRIMARY KEY (`journal_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `journal_types` */

insert  into `journal_types` values (1,'Penjualan'),(2,'Pembelian'),(3,'Pemasukan lainnya'),(4,'Pengeluaran lainnya');

/*Table structure for table `journals` */

DROP TABLE IF EXISTS `journals`;

CREATE TABLE `journals` (
  `journal_id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_type_id` int(11) NOT NULL,
  `data_id` int(11) NOT NULL,
  `data_url` text NOT NULL,
  `journal_debit` int(11) NOT NULL,
  `journal_credit` int(11) NOT NULL,
  `journal_piutang` int(11) NOT NULL,
  `journal_hutang` int(11) NOT NULL,
  `journal_date` date NOT NULL,
  `journal_desc` text NOT NULL,
  `bank_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`journal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `journals` */

insert  into `journals` values (1,1,2,'',24000,0,0,0,'2017-02-28','Meja Meja 4',0,11,3),(2,1,0,'',53000,0,0,0,'2017-03-01','Meja Meja 2',0,11,3),(3,1,0,'',55000,0,0,0,'2017-03-01','Meja Meja 2',0,11,3),(4,1,0,'',55000,0,0,0,'2017-03-01','Meja Meja 4',0,11,3),(5,1,0,'',55000,0,0,0,'2017-03-01','Meja Meja 4',0,11,3),(6,1,0,'',55000,0,0,0,'2017-03-01','Meja Meja 4',0,11,3),(7,1,0,'',55000,0,0,0,'2017-03-01','Meja Meja 4',0,11,3),(8,1,0,'',55000,0,0,0,'2017-03-01','Meja Meja 4',0,11,3),(9,1,0,'',55000,0,0,0,'2017-03-01','Meja Meja 4',0,11,3),(10,1,0,'',55000,0,0,0,'2017-03-01','Meja Meja 4',0,11,3),(11,1,0,'',55000,0,0,0,'2017-03-01','Meja Meja 4',0,11,3),(12,1,0,'',55000,0,0,0,'2017-03-01','Meja Meja 4',0,11,3),(13,1,0,'',55000,0,0,0,'2017-03-01','Meja Meja 4',0,11,3),(14,1,15,'',55000,0,0,0,'2017-03-01','Meja Meja 4',0,11,3),(15,1,16,'',55000,0,0,0,'2017-03-01','Meja Meja 4',0,11,3),(16,1,17,'',110000,0,0,0,'2017-03-01','Meja Meja 4',0,11,3);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_name` varbinary(30) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori` values (1,'Bakmie'),(2,'Nasi'),(3,'Kwetiauw'),(4,'Minuman'),(5,'Paket'),(11,'Go Food');

/*Table structure for table `kategori_paket_pijat` */

DROP TABLE IF EXISTS `kategori_paket_pijat`;

CREATE TABLE `kategori_paket_pijat` (
  `kategori_paket_pijat_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_paket_pijat_name` varchar(200) NOT NULL,
  PRIMARY KEY (`kategori_paket_pijat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori_paket_pijat` */

/*Table structure for table `member_items` */

DROP TABLE IF EXISTS `member_items`;

CREATE TABLE `member_items` (
  `member_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`member_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `member_items` */

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(100) NOT NULL,
  `member_phone` varchar(100) NOT NULL,
  `member_alamat` varchar(30) NOT NULL,
  `member_email` varchar(200) NOT NULL,
  `member_settlement` int(11) NOT NULL,
  `member_discount` int(11) NOT NULL,
  `member_discount_type` int(11) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;

/*Data for the table `members` */

insert  into `members` values (250,'Tirta Rachmandiri','085821364004','Simo Sidomulyo 5 No. 46 B','racodex@gmail.com',0,2,0);

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` datetime NOT NULL,
  `branch` int(11) NOT NULL,
  `member` int(11) NOT NULL,
  `order_sub_total` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `order_total` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `change` int(11) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `bank` int(11) NOT NULL,
  `bank_account_number` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `order` */

/*Table structure for table `order_tmp` */

DROP TABLE IF EXISTS `order_tmp`;

CREATE TABLE `order_tmp` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `member` int(11) NOT NULL,
  `reservasi` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `order_tmp` */

/*Table structure for table `paket_pijat` */

DROP TABLE IF EXISTS `paket_pijat`;

CREATE TABLE `paket_pijat` (
  `paket_pijat_id` int(11) NOT NULL AUTO_INCREMENT,
  `paket_pijat_name` varchar(200) NOT NULL,
  `paket_pijat_harga` int(11) NOT NULL,
  `ruangan` int(11) NOT NULL,
  `infrakstruktur` int(11) NOT NULL,
  PRIMARY KEY (`paket_pijat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paket_pijat` */

/*Table structure for table `paket_pijat_details` */

DROP TABLE IF EXISTS `paket_pijat_details`;

CREATE TABLE `paket_pijat_details` (
  `paket_pijat_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `paket_pijat` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  PRIMARY KEY (`paket_pijat_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paket_pijat_details` */

/*Table structure for table `partners` */

DROP TABLE IF EXISTS `partners`;

CREATE TABLE `partners` (
  `partner_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(100) NOT NULL,
  PRIMARY KEY (`partner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `partners` */

insert  into `partners` values (1,'Bakmi Gili');

/*Table structure for table `payment_methods` */

DROP TABLE IF EXISTS `payment_methods`;

CREATE TABLE `payment_methods` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method_name` varchar(100) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `payment_methods` */

insert  into `payment_methods` values (1,'Cash'),(2,'Debit'),(3,'Credit');

/*Table structure for table `payments` */

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_jumlah` int(11) NOT NULL,
  `payment_sisa` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `payments` */

/*Table structure for table `permits` */

DROP TABLE IF EXISTS `permits`;

CREATE TABLE `permits` (
  `permit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL,
  `side_menu_id` int(11) NOT NULL,
  `permit_acces` varchar(10) NOT NULL,
  PRIMARY KEY (`permit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=812 DEFAULT CHARSET=latin1;

/*Data for the table `permits` */

insert  into `permits` values (241,4,1,'0'),(242,4,2,'c,r,u,d'),(243,4,3,'0'),(244,4,4,'0'),(245,4,5,'0'),(246,4,6,'0'),(247,4,7,''),(248,4,8,''),(249,4,9,'c,r,u,d'),(250,4,10,'c,r,u,d'),(251,4,11,''),(252,4,12,'c,r,u,d'),(253,4,13,''),(254,4,14,''),(255,4,15,'c,r,u,d'),(256,4,16,''),(257,4,17,''),(258,4,18,''),(259,4,19,''),(260,4,20,''),(261,4,21,''),(262,4,22,'c,r,u,d'),(263,4,23,''),(264,4,24,''),(699,1,1,'0'),(700,1,2,'c,r,u,d'),(701,1,3,'0'),(702,1,4,'0'),(703,1,5,'0'),(704,1,6,'0'),(705,1,7,'c,r,u,d'),(706,1,8,'c,r,u,d'),(707,1,9,'c,r,u,d'),(708,1,10,'c,r,u,d'),(709,1,11,'c,r,u,d'),(710,1,12,'c,r,u,d'),(711,1,13,'c,r,u,d'),(712,1,14,'c,r,u,d'),(713,1,15,'c,r,u,d'),(714,1,16,'c,r,u,d'),(715,1,17,'c,r,u,d'),(716,1,18,'c,r,u,d'),(717,1,19,'c,r,u,d'),(718,1,20,'c,r,u,d'),(719,1,21,'c,r,u,d'),(720,1,22,'c,r,u,d'),(721,1,23,'c,r,u,d'),(722,1,24,'c,r,u,d'),(723,1,25,'c,r,u,d'),(724,1,26,'c,r,u,d'),(725,1,27,'c,r,u,d'),(726,1,28,'c,r,u,d'),(727,1,30,'c,r,u,d'),(728,3,1,'0'),(729,3,2,'c,r,u,d'),(730,3,3,'0'),(731,3,4,'0'),(732,3,5,'0'),(733,3,6,'0'),(734,3,7,'c,r,u,d'),(735,3,8,'c,r,u,d'),(736,3,9,'c,r,u,d'),(737,3,10,'c,r,u,d'),(738,3,11,'c,r,u,d'),(739,3,12,'c,r,u,d'),(740,3,13,'c,r,u,d'),(741,3,14,'c,r,u,d'),(742,3,15,'c,r,u,d'),(743,3,16,'c,r,u,d'),(744,3,17,'c,r,u,d'),(745,3,18,'c,r,u,d'),(746,3,19,'c,r,u,d'),(747,3,20,'c,r,u,d'),(748,3,21,'c,r,u,d'),(749,3,22,'c,r,u,d'),(750,3,23,'c,r,u,d'),(751,3,24,'c,r,u,d'),(752,3,25,'c,r,u,d'),(753,3,26,'c,r,u,d'),(754,3,27,'c,r,u,d'),(755,3,28,'c,r,u,d'),(784,2,1,'0'),(785,2,2,'c,r,u,d'),(786,2,3,'0'),(787,2,4,'0'),(788,2,5,'0'),(789,2,6,'0'),(790,2,7,''),(791,2,8,'c,r,u,d'),(792,2,9,'c,r,u,d'),(793,2,10,'c,r,u,d'),(794,2,11,''),(795,2,12,'c,r,u,d'),(796,2,13,'c,r,u,d'),(797,2,14,'c,r,u,d'),(798,2,15,'c,r,u,d'),(799,2,16,'c,r,u,d'),(800,2,17,'c,r,u,d'),(801,2,18,'c,r,u,d'),(802,2,19,'c,r,u,d'),(803,2,20,'c,r,u,d'),(804,2,21,'c,r,u,d'),(805,2,22,'c,r,u,d'),(806,2,23,''),(807,2,24,''),(808,2,25,''),(809,2,26,''),(810,2,27,''),(811,2,28,'c,r,u,d');

/*Table structure for table `purchases` */

DROP TABLE IF EXISTS `purchases`;

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `purchase_qty` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `purchase_total` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

/*Data for the table `purchases` */

/*Table structure for table `reservasi` */

DROP TABLE IF EXISTS `reservasi`;

CREATE TABLE `reservasi` (
  `reservasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservasi_code` varchar(200) NOT NULL,
  `reservasi_date1` datetime NOT NULL,
  `reservasi_date2` datetime NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`reservasi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reservasi` */

/*Table structure for table `ruangan_infrastruktur` */

DROP TABLE IF EXISTS `ruangan_infrastruktur`;

CREATE TABLE `ruangan_infrastruktur` (
  `ruangan_infrastruktur_id` int(10) unsigned NOT NULL,
  `ruangan` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `infrastruktur` int(11) NOT NULL,
  `koordinat_x` int(11) NOT NULL,
  `koordinat_y` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`ruangan_infrastruktur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ruangan_infrastruktur` */

/*Table structure for table `ruangs` */

DROP TABLE IF EXISTS `ruangs`;

CREATE TABLE `ruangs` (
  `ruangan_id` int(100) NOT NULL,
  `ruangan_name` varchar(200) NOT NULL,
  `branch` int(100) NOT NULL,
  PRIMARY KEY (`ruangan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ruangs` */

/*Table structure for table `side_menus` */

DROP TABLE IF EXISTS `side_menus`;

CREATE TABLE `side_menus` (
  `side_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `side_menu_name` varchar(100) NOT NULL,
  `side_menu_url` varchar(100) NOT NULL,
  `side_menu_parent` int(11) NOT NULL,
  `side_menu_icon` varchar(100) NOT NULL,
  `side_menu_level` int(11) NOT NULL,
  `side_menu_type_parent` int(11) NOT NULL,
  PRIMARY KEY (`side_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `side_menus` */

insert  into `side_menus` values (1,'Master','#',0,'fa fa-edit',1,0),(2,'Order','order.php',0,'fa fa-cutlery',1,1),(3,'Transaksi','#',0,'fa fa-shopping-cart',1,0),(4,'Accounting','#',0,'fa fa-list-alt',1,0),(5,'Laporan','#',0,'fa fa-list-alt',1,0),(6,'Setting','#',0,'fa fa-cog',1,0),(7,'Cabang','branch.php',1,'',2,1),(8,'Ruangan','building.php',1,'',2,1),(9,'Meja','master_table.php',1,'',2,1),(10,'Menu','menu.php',1,'',2,1),(11,'Partner','partner.php',1,'',2,1),(12,'Member','member.php',1,'',2,1),(13,'Supplier','supplier.php',1,'',2,1),(14,'Voucher','voucher.php',1,'',2,1),(15,'Reservasi','reserved.php',3,'',2,1),(16,'Pembelian','purchase.php',3,'',2,1),(17,'Stok','stock.php',3,'',2,1),(18,'Arus Kas','arus_kas.php',4,'',2,1),(19,'Pemasukan Dan Pengeluaran Lainnya','jurnal_umum.php',4,'',2,1),(20,'Laporan Detail','report_detail.php',5,'',2,1),(21,'Laporan Harian','report_harian.php',5,'',2,1),(22,'Meja','table.php',6,'',2,1),(23,'User','user.php',6,'',2,1),(24,'Type User','user_type.php',6,'',2,1),(25,'Penyesuaian Stock','penyesuaian_stock.php',1,'',2,1),(26,'Laporan Penyesuaian Stock','report_penyesuaian_stock.php',5,'',2,1),(27,'Kategori Menu','kategori_menu.php',1,'',2,1);

/*Table structure for table `suppliers` */

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_phone` int(11) NOT NULL,
  `supplier_email` varchar(100) NOT NULL,
  `supplier_addres` varchar(100) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `suppliers` */

insert  into `suppliers` values (6,'Bakmi Gili Pusat',315484702,'bakmie.gili@gmail.com','MT. Haryono No. 42');

/*Table structure for table `user_types` */

DROP TABLE IF EXISTS `user_types`;

CREATE TABLE `user_types` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(200) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user_types` */

insert  into `user_types` values (1,'Administrator'),(2,'Kasir'),(3,'Owner'),(4,'Waitress');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) DEFAULT NULL,
  `user_login` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_code` varchar(100) DEFAULT NULL,
  `user_phone` varchar(100) DEFAULT NULL,
  `user_img` text NOT NULL,
  `user_active_status` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users` values (11,3,'admin','21232f297a57a5a743894a0e4a801fc3','admin','A0001','03125435432','',1,3),(32,3,'maria','fe01ce2a7fbac8fafaed7c982a04e229','maria','','1111','',1,4),(34,1,'budi','101eb6ad45137d043a8e3f8fb3990135','budi','','3232','',1,3),(39,2,'dita','fe01ce2a7fbac8fafaed7c982a04e229','Dita','','085731404513','',1,3),(40,4,'elina','fe01ce2a7fbac8fafaed7c982a04e229','Lina','','085852731314','',1,4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
