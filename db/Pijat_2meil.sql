/*
SQLyog Ultimate v11.11 (32 bit)
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

insert  into `banks`(`bank_id`,`bank_name`,`bank_account_number`) values (1,'Mandiri',''),(2,'BCA',''),(3,'BRI','');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `branches` */

insert  into `branches`(`branch_id`,`branch_name`,`branch_desc`,`branch_address`,`branch_phone`,`branch_city`) values (5,'SPA Pijat Majapahit','Pijat','Jl Majapahit','083938191981','Surabaya'),(6,'SPA Pijat Sudirman','Pijat','Jl.Panglima Sudirman','024819411939','Surabaya'),(7,'SPA Pahlawan','Pijat','Jl Pahlawan','089379397947','Jakarta');

/*Table structure for table `infrastruktur` */

DROP TABLE IF EXISTS `infrastruktur`;

CREATE TABLE `infrastruktur` (
  `infrastruktur_id` int(11) NOT NULL AUTO_INCREMENT,
  `infrastruktur_name` varchar(200) NOT NULL,
  `infrastruktur_warna` varchar(200) NOT NULL,
  `infrastruktur_img` text NOT NULL,
  PRIMARY KEY (`infrastruktur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `infrastruktur` */

insert  into `infrastruktur`(`infrastruktur_id`,`infrastruktur_name`,`infrastruktur_warna`,`infrastruktur_img`) values (1,'infrastruktur 1','warna 1','1491202890_1490933442_kursi_relax2.png'),(4,'infrastruktur 2','warna 2','1492756114_unnamed(3).png'),(5,'Infrastruktur 3','warna 3','1492756124_1492756114_unnamed(3).png');

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(200) NOT NULL,
  `item_hpp` int(11) NOT NULL,
  `item_margin` int(11) NOT NULL,
  `item_harga_jual` int(11) NOT NULL,
  `item_limit` int(11) NOT NULL,
  `item_satuan` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `item` */

insert  into `item`(`item_id`,`item_name`,`item_hpp`,`item_margin`,`item_harga_jual`,`item_limit`,`item_satuan`) values (1,'ITEM A',12000,3000,15000,40,6),(2,'ITEM B',20000,5000,30000,12,6),(3,'ITEM C',30000,5000,40000,13,5),(4,'ITEM D',20000,10000,30000,53,6),(31,'ITEM E',30000,5000,35000,24,6),(32,'ITEM F',10000,10000,20000,23,7),(33,'ITEM G',3000,5000,35000,65,5),(34,'ITEM H',5000,2000,7000,20,6),(35,'ITEM I',4000,2000,6000,40,7),(36,'ITEM J',5000,2000,7000,32,6),(37,'ITEM K',6000,3000,9000,22,5);

/*Table structure for table `item_stocks` */

DROP TABLE IF EXISTS `item_stocks`;

CREATE TABLE `item_stocks` (
  `item_stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `item` int(11) NOT NULL,
  `item_stock_qty` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  PRIMARY KEY (`item_stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `item_stocks` */

insert  into `item_stocks`(`item_stock_id`,`item`,`item_stock_qty`,`branch`) values (1,1,100,5),(2,4,2,5),(3,1,3,5);

/*Table structure for table `journal_types` */

DROP TABLE IF EXISTS `journal_types`;

CREATE TABLE `journal_types` (
  `journal_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_type_name` varchar(200) NOT NULL,
  PRIMARY KEY (`journal_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `journal_types` */

insert  into `journal_types`(`journal_type_id`,`journal_type_name`) values (1,'Penjualan'),(2,'Pembelian'),(3,'Pemasukan lainnya'),(4,'Pengeluaran lainnya');

/*Table structure for table `journals` */

DROP TABLE IF EXISTS `journals`;

CREATE TABLE `journals` (
  `journal_id` int(11) NOT NULL AUTO_INCREMENT,
  `journal_type_id` int(11) NOT NULL,
  `data_id` varchar(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `journals` */

insert  into `journals`(`journal_id`,`journal_type_id`,`data_id`,`data_url`,`journal_debit`,`journal_credit`,`journal_piutang`,`journal_hutang`,`journal_date`,`journal_desc`,`bank_id`,`user_id`,`branch_id`) values (13,2,'64','purchase.php?page=form&id=',0,214,0,0,'2017-04-10','',5,11,0),(14,2,'2147483647','purchase.php?page=form&id=',0,2000,0,0,'2017-04-10','',5,11,0),(15,2,'2147483647','purchase.php?page=form&id=',0,3000,0,0,'2017-04-10','',6,11,0),(16,2,'2147483647','purchase.php?page=form&id=',0,10000,0,0,'2017-04-10','',5,11,0),(17,2,'21491817647','purchase.php?page=form&id=',0,5000,0,0,'2017-04-10','',5,11,0),(18,2,'21491817760','purchase.php?page=form&id=',0,50000,0,0,'2017-04-10','',5,11,0),(19,2,'21491818353','purchase.php?page=form&id=',0,2000,0,0,'2017-04-10','',6,11,0),(20,2,'21491877231','purchase.php?page=form&id=',0,8000,0,0,'2017-04-11','',5,11,0),(21,2,'21492583046','purchase.php?page=form&id=',0,20000,0,0,'2017-04-19','',5,11,0),(22,2,'21492756818','purchase.php?page=form&id=',0,10000,0,0,'2017-04-21','',5,11,0),(23,2,'21492756883','purchase.php?page=form&id=',0,10000,0,0,'2017-04-21','',5,11,0);

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_name` varbinary(30) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `kategori` */

insert  into `kategori`(`kategori_id`,`kategori_name`) values (1,'Bakmie'),(2,'Nasi'),(3,'Kwetiauw'),(4,'Minuman'),(5,'Paket'),(11,'Go Food');

/*Table structure for table `kategori_paket_pijat` */

DROP TABLE IF EXISTS `kategori_paket_pijat`;

CREATE TABLE `kategori_paket_pijat` (
  `kategori_paket_pijat_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_paket_pijat_name` varchar(200) NOT NULL,
  PRIMARY KEY (`kategori_paket_pijat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kategori_paket_pijat` */

/*Table structure for table `konversi_item` */

DROP TABLE IF EXISTS `konversi_item`;

CREATE TABLE `konversi_item` (
  `konversi_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `satuan_utama` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan_konversi` int(11) NOT NULL,
  `jumlah_satuan_konversi` int(11) NOT NULL,
  PRIMARY KEY (`konversi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `konversi_item` */

insert  into `konversi_item`(`konversi_id`,`item_id`,`satuan_utama`,`jumlah`,`satuan_konversi`,`jumlah_satuan_konversi`) values (1,1,6,1,5,10),(3,1,6,1,7,2),(4,1,6,1,8,5);

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
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `members` */

insert  into `members`(`member_id`,`member_name`,`member_phone`,`member_alamat`,`member_email`) values (1,'member 1','089657345765','jl lontar','member1@gmail.com'),(2,'member 2','088329134198','jl lontar ','member2@gmail.com'),(3,'member 3','085467234756','jl lontar','member3@gmail.com'),(5,'nama','089494593231','jl malang','nama@gmail.com');

/*Table structure for table `office` */

DROP TABLE IF EXISTS `office`;

CREATE TABLE `office` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(200) NOT NULL,
  `office_img` text NOT NULL,
  `office_desc` text NOT NULL,
  `office_address` text NOT NULL,
  `office_phone` varchar(100) NOT NULL,
  `office_email` varchar(300) NOT NULL,
  `office_city` varchar(100) NOT NULL,
  `office_owner` varchar(100) NOT NULL,
  `office_owner_phone` varchar(100) NOT NULL,
  `office_owner_address` varchar(100) NOT NULL,
  `office_owner_email` varchar(100) NOT NULL,
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `office` */

insert  into `office`(`office_id`,`office_name`,`office_img`,`office_desc`,`office_address`,`office_phone`,`office_email`,`office_city`,`office_owner`,`office_owner_phone`,`office_owner_address`,`office_owner_email`) values (1,'ZEE HOLISTIC LIVING','1491902225_1491894433_spa 6.jpg','','																																																																																																																																																																																																																																																																				JL. RAYA LONTAR 226 SURABAYA																																																																																																																																																																																																																																																																								','(031)-04408-0-02','zeeholistic@gmail.com','SURABAYA','Danu Ariska','0856-3435-4233','Surabaya','pemilik@gmail.com');

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
  PRIMARY KEY (`paket_pijat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `paket_pijat` */

insert  into `paket_pijat`(`paket_pijat_id`,`paket_pijat_name`,`paket_pijat_harga`) values (1,'Pijat Enak',1500000),(3,'Pijat Ples Ples',2500000);

/*Table structure for table `paket_pijat_details` */

DROP TABLE IF EXISTS `paket_pijat_details`;

CREATE TABLE `paket_pijat_details` (
  `paket_pijat_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `paket_pijat` int(11) NOT NULL,
  `pijat` int(11) NOT NULL,
  PRIMARY KEY (`paket_pijat_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `paket_pijat_details` */

insert  into `paket_pijat_details`(`paket_pijat_detail_id`,`paket_pijat`,`pijat`) values (2,1,3);

/*Table structure for table `partners` */

DROP TABLE IF EXISTS `partners`;

CREATE TABLE `partners` (
  `partner_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(100) NOT NULL,
  PRIMARY KEY (`partner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `partners` */

insert  into `partners`(`partner_id`,`partner_name`) values (1,'Bakmi Gili');

/*Table structure for table `payment_methods` */

DROP TABLE IF EXISTS `payment_methods`;

CREATE TABLE `payment_methods` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method_name` varchar(100) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `payment_methods` */

insert  into `payment_methods`(`payment_method_id`,`payment_method_name`) values (1,'Cash'),(2,'Debit'),(3,'Credit');

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
) ENGINE=InnoDB AUTO_INCREMENT=706 DEFAULT CHARSET=latin1;

/*Data for the table `permits` */

insert  into `permits`(`permit_id`,`user_type_id`,`side_menu_id`,`permit_acces`) values (676,1,1,'0'),(677,1,2,'c,r,u,d'),(678,1,3,'0'),(679,1,4,'0'),(680,1,5,'0'),(681,1,6,'0'),(682,1,7,'c,r,u,d'),(683,1,8,'c,r,u,d'),(684,1,9,'c,r,u,d'),(685,1,10,'c,r,u,d'),(686,1,11,'0'),(687,1,12,'0'),(688,1,13,'c,r,u,d'),(689,1,14,'c,r,u,d'),(690,1,16,'c,r,u,d'),(691,1,17,'c,r,u,d'),(692,1,18,'c,r,u,d'),(693,1,19,''),(694,1,20,''),(695,1,21,''),(696,1,22,''),(697,1,23,'c,r,u,d'),(698,1,24,'c,r,u,d'),(699,1,25,'c,r,u,d'),(700,1,26,''),(701,1,27,''),(702,1,28,''),(703,1,30,'c,r,u,d'),(704,1,31,'c,r,u,d'),(705,1,32,'c,r,u,d');

/*Table structure for table `pijat` */

DROP TABLE IF EXISTS `pijat`;

CREATE TABLE `pijat` (
  `pijat_id` int(11) NOT NULL AUTO_INCREMENT,
  `pijat_name` varchar(200) NOT NULL,
  `pijat_waktu` int(11) NOT NULL,
  `pijat_harga` int(11) NOT NULL,
  `infrastruktur` int(11) NOT NULL,
  PRIMARY KEY (`pijat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `pijat` */

insert  into `pijat`(`pijat_id`,`pijat_name`,`pijat_waktu`,`pijat_harga`,`infrastruktur`) values (1,'Pijat Tungkak',60,32000,1),(2,'Pijat Jempol',30,32000,0),(3,'Pijat Geger',45,23000,0),(4,'Pijat Geger 2',35,23500,0),(5,'pijat kepala',45,400000,4);

/*Table structure for table `pijat_details` */

DROP TABLE IF EXISTS `pijat_details`;

CREATE TABLE `pijat_details` (
  `pijat_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `pijat` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `satuan` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  PRIMARY KEY (`pijat_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pijat_details` */

/*Table structure for table `purchases` */

DROP TABLE IF EXISTS `purchases`;

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_code` varchar(200) NOT NULL,
  `purchase_date` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `purchase_qty` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `purchase_total` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `purchases` */

insert  into `purchases`(`purchase_id`,`purchase_code`,`purchase_date`,`item_id`,`purchase_qty`,`purchase_price`,`purchase_total`,`supplier_id`,`branch_id`,`satuan_id`) values (1,'21492756883','2017-04-21',1,3,10000,30000,9,5,5);

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

/*Table structure for table `reserved` */

DROP TABLE IF EXISTS `reserved`;

CREATE TABLE `reserved` (
  `reserved_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` varchar(200) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `hour` time DEFAULT NULL,
  `pijat` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`reserved_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `reserved` */

insert  into `reserved`(`reserved_id`,`member_id`,`phone`,`address`,`date`,`hour`,`pijat`,`status`) values (27,'3','085467234756','jl lontar','2017-04-27','05:00:00',2,0);

/*Table structure for table `ruangan` */

DROP TABLE IF EXISTS `ruangan`;

CREATE TABLE `ruangan` (
  `ruangan_id` int(11) NOT NULL AUTO_INCREMENT,
  `ruangan_name` varchar(100) NOT NULL,
  `branch_id` int(11) NOT NULL,
  PRIMARY KEY (`ruangan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `ruangan` */

insert  into `ruangan`(`ruangan_id`,`ruangan_name`,`branch_id`) values (9,'Ruang 1',6),(10,'Ruang 2',5),(12,'Ruang 3',7),(14,'Ruang 1',8);

/*Table structure for table `ruangan_infrastruktur` */

DROP TABLE IF EXISTS `ruangan_infrastruktur`;

CREATE TABLE `ruangan_infrastruktur` (
  `ruangan_infrastruktur_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ruangan` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `infrastruktur` int(11) NOT NULL,
  `infrastruktur_name` varchar(200) NOT NULL,
  `koordinat_x` int(11) NOT NULL,
  `koordinat_y` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`ruangan_infrastruktur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `ruangan_infrastruktur` */

insert  into `ruangan_infrastruktur`(`ruangan_infrastruktur_id`,`ruangan`,`branch`,`infrastruktur`,`infrastruktur_name`,`koordinat_x`,`koordinat_y`,`status`) values (11,9,7,1,'Kursi Pijat 2',518,205,0),(12,9,7,1,'Kursi Pijat 1',443,206,0);

/*Table structure for table `satuan` */

DROP TABLE IF EXISTS `satuan`;

CREATE TABLE `satuan` (
  `satuan_id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan_name` varchar(100) NOT NULL,
  PRIMARY KEY (`satuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `satuan` */

insert  into `satuan`(`satuan_id`,`satuan_name`) values (5,'ml'),(6,'liter'),(7,'Botol Besar'),(8,'Botol Kecil ');

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `side_menus` */

insert  into `side_menus`(`side_menu_id`,`side_menu_name`,`side_menu_url`,`side_menu_parent`,`side_menu_icon`,`side_menu_level`,`side_menu_type_parent`) values (1,'Master','#',0,'fa fa-edit',1,0),(2,'Order','transaction.php',0,'fa fa-leaf',1,1),(3,'Transaksi','#',0,'fa fa-shopping-cart',1,0),(4,'Accounting','#',0,'fa fa-list-alt',1,0),(5,'Laporan','#',0,'fa fa-list-alt',1,0),(6,'Setting','#',0,'fa fa-cog',1,0),(7,'Cabang','branch.php',1,'',2,1),(8,'Ruangan','building.php',1,'',2,1),(9,'Infrastruktur','infrastruktur.php',1,'',2,1),(10,'Pijat','pijat.php',1,'',2,1),(11,'Paket Pijat','paket_pijat.php',0,'',0,0),(12,'Partner','partner.php',0,'',0,0),(13,'Member','member.php',1,'',2,1),(14,'Supplier','supplier.php',1,'',2,1),(16,'Reservasi','reserved.php',3,'',2,1),(17,'Pembelian','purchase.php',3,'',2,1),(18,'Stok','stock.php',3,'',2,1),(19,'Arus Kas','arus_kas.php',4,'',2,1),(20,'Pemasukan Dan Pengeluaran Lainnya','jurnal_umum.php',4,'',2,1),(21,'Laporan Detail','report_detail.php',5,'',2,1),(22,'Laporan Harian','report_harian.php',5,'',2,1),(23,'Infrastruktur','infrastruktur_setting.php',6,'',2,1),(24,'User','user.php',6,'',2,1),(25,'Type User','user_type.php',6,'',2,1),(26,'Penyesuaian Stock','penyesuaian_stock.php',0,'',0,1),(27,'Laporan Penyesuaian Stock','report_penyesuaian_stock.php',5,'',2,1),(28,'Kategori Menu','kategori_menu.php',0,'',0,1),(30,'Profil','office.php',6,'',2,1),(31,'Item','item.php',3,'',2,1),(32,'Satuan','satuan.php',1,'',2,1);

/*Table structure for table `statement` */

DROP TABLE IF EXISTS `statement`;

CREATE TABLE `statement` (
  `statement_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `tekanan` int(11) NOT NULL,
  `asma` int(11) NOT NULL,
  `inhaler` int(11) NOT NULL,
  `leher` int(11) NOT NULL,
  `kulit` int(11) NOT NULL,
  `kulit_jabarkan` varchar(100) NOT NULL,
  `selain_diatas` int(11) NOT NULL,
  `selain_jabarkan` varchar(100) NOT NULL,
  `alergi` int(11) NOT NULL,
  `alergi_jabarkan` varchar(100) NOT NULL,
  `hamil` int(11) NOT NULL,
  `usia_kandungan` varchar(100) NOT NULL,
  `kontak_lens` int(11) NOT NULL,
  `melepas_lens` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `spesial` int(11) NOT NULL,
  `jawaban` int(11) NOT NULL,
  `tidak_menyembunyikan` int(11) NOT NULL,
  `tanggung_jawab` int(11) NOT NULL,
  PRIMARY KEY (`statement_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `statement` */

insert  into `statement`(`statement_id`,`member_id`,`tekanan`,`asma`,`inhaler`,`leher`,`kulit`,`kulit_jabarkan`,`selain_diatas`,`selain_jabarkan`,`alergi`,`alergi_jabarkan`,`hamil`,`usia_kandungan`,`kontak_lens`,`melepas_lens`,`level`,`spesial`,`jawaban`,`tidak_menyembunyikan`,`tanggung_jawab`) values (1,1,2,2,2,2,2,'',2,'',2,'',2,'',1,1,3,1,1,1,1),(2,3,2,2,2,2,2,'',2,'',2,'',2,'',2,2,3,2,1,1,1);

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(100) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status` */

/*Table structure for table `suppliers` */

DROP TABLE IF EXISTS `suppliers`;

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_phone` int(11) NOT NULL,
  `supplier_email` varchar(100) NOT NULL,
  `supplier_addres` varchar(100) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `suppliers` */

insert  into `suppliers`(`supplier_id`,`supplier_name`,`supplier_phone`,`supplier_email`,`supplier_addres`) values (10,'Supplier 3',2147483647,'supplier3@gmail.com','Jl.Embong Malang'),(7,'Supplier 1',2147483647,'supplier1@gmail.com','Jl.majapahit'),(9,'Supplier 2',2147483647,'suppliler2@gmail.com','Jl.Sudirman\r\n');

/*Table structure for table `transaction_bills` */

DROP TABLE IF EXISTS `transaction_bills`;

CREATE TABLE `transaction_bills` (
  `transaction_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `tot_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_code` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaction_bills` */

/*Table structure for table `transaction_details` */

DROP TABLE IF EXISTS `transaction_details`;

CREATE TABLE `transaction_details` (
  `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `transaction_detail_original_price` int(11) NOT NULL,
  `transaction_detail_margin_price` int(11) NOT NULL,
  `transaction_detail_price` int(11) NOT NULL,
  `transaction_detail_price_discount` int(11) NOT NULL,
  `transaction_detail_grand_price` int(11) NOT NULL,
  `transaction_detail_qty` int(11) NOT NULL,
  `transaction_detail_total` int(11) NOT NULL,
  PRIMARY KEY (`transaction_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaction_details` */

/*Table structure for table `transaction_histories` */

DROP TABLE IF EXISTS `transaction_histories`;

CREATE TABLE `transaction_histories` (
  `transaction_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_total` int(11) NOT NULL,
  `transaction_discount` int(11) NOT NULL,
  `transaction_grand_total` int(11) NOT NULL,
  `transaction_payment` int(11) NOT NULL,
  `transaction_change` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_account_number` varchar(100) NOT NULL,
  `transaction_code` int(11) NOT NULL,
  `user_delete` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaction_histories` */

/*Table structure for table `transaction_order_types` */

DROP TABLE IF EXISTS `transaction_order_types`;

CREATE TABLE `transaction_order_types` (
  `tot_id` int(11) NOT NULL AUTO_INCREMENT,
  `tot_name` varchar(100) NOT NULL,
  PRIMARY KEY (`tot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `transaction_order_types` */

insert  into `transaction_order_types`(`tot_id`,`tot_name`) values (1,'Dining'),(2,'Take away'),(3,'Delivery');

/*Table structure for table `transaction_summary` */

DROP TABLE IF EXISTS `transaction_summary`;

CREATE TABLE `transaction_summary` (
  `id_transaction_summary` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_grtotal_summary` varchar(45) NOT NULL,
  `transaction_summarycol` varchar(45) NOT NULL,
  `transaction_total` varchar(45) NOT NULL,
  PRIMARY KEY (`id_transaction_summary`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaction_summary` */

/*Table structure for table `transaction_tmp_details` */

DROP TABLE IF EXISTS `transaction_tmp_details`;

CREATE TABLE `transaction_tmp_details` (
  `transaction_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` int(11) NOT NULL,
  `pijat_id` int(11) NOT NULL,
  `transaction_detail_item_qty` int(11) NOT NULL,
  `transaction_detail_original_price` int(11) NOT NULL,
  `transaction_detail_margin_price` int(11) NOT NULL,
  `transaction_detail_price` int(11) NOT NULL,
  `transaction_detail_price_discount` int(11) NOT NULL,
  `transaction_detail_grand_price` int(11) NOT NULL,
  `transaction_detail_qty` int(11) NOT NULL,
  `transaction_detail_total` int(11) NOT NULL,
  `transaction_detail_status` int(11) NOT NULL,
  PRIMARY KEY (`transaction_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `transaction_tmp_details` */

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_total` int(11) NOT NULL,
  `transaction_discount` int(11) NOT NULL,
  `disc_member` int(11) NOT NULL,
  `transaction_grand_total` int(11) NOT NULL,
  `transaction_payment` int(11) NOT NULL,
  `transaction_change` int(11) NOT NULL,
  `transaction_disc_nominal` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_account_number` varchar(100) NOT NULL,
  `transaction_code` int(11) NOT NULL,
  `flag_code` int(1) DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `transactions` */

/*Table structure for table `transactions_tmp` */

DROP TABLE IF EXISTS `transactions_tmp`;

CREATE TABLE `transactions_tmp` (
  `transaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `pijat` int(11) NOT NULL,
  `pijat_price` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `transaction_code` int(11) NOT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `transactions_tmp` */

insert  into `transactions_tmp`(`transaction_id`,`member_id`,`branch_id`,`pijat`,`pijat_price`,`transaction_date`,`transaction_code`) values (1,26,7,0,0,'2017-04-17 00:00:00',0),(2,26,7,0,0,'2017-04-17 00:00:00',0),(3,26,7,0,0,'2017-04-17 00:00:00',0),(4,26,7,0,0,'2017-04-17 00:00:00',0),(5,26,7,0,0,'2017-04-17 00:00:00',0),(6,26,7,0,0,'2017-04-17 00:00:00',0),(7,26,7,0,0,'2017-04-17 00:00:00',0),(8,26,7,2,32,'2017-04-17 00:00:00',0),(9,26,7,2,32,'2017-04-17 00:00:00',0),(10,1,7,4,24,'2017-04-17 00:00:00',0),(11,2,7,4,24,'2017-04-17 00:00:00',0),(12,3,7,3,23,'2017-04-17 00:00:00',0),(13,2,7,2,32,'2017-04-17 00:00:00',0),(14,1,7,2,32,'2017-04-17 00:00:00',0),(15,2,7,2,32,'2017-04-17 00:00:00',0),(16,2,7,2,32,'2017-04-17 00:00:00',0),(17,3,7,3,23,'2017-04-17 00:00:00',0),(18,2,7,1,32,'2017-04-17 00:00:00',0),(19,2,7,1,32,'2017-04-17 00:00:00',0),(20,3,7,2,32,'2017-04-17 00:00:00',0),(21,1,7,2,32,'2017-04-17 00:00:00',0),(22,1,7,3,23,'2017-04-18 00:00:00',0),(23,1,7,3,23,'2017-04-18 00:00:00',0),(24,1,7,3,23,'2017-04-18 00:00:00',0),(25,1,7,3,23,'2017-04-18 00:00:00',0),(26,2,6,4,24,'2017-04-18 00:00:00',0),(27,2,6,4,24,'2017-04-18 00:00:00',0),(28,3,7,2,32,'2017-04-18 00:00:00',0),(29,0,7,2,32,'2017-04-18 00:00:00',0),(30,2,7,2,32,'2017-04-18 00:00:00',0),(31,1,5,3,23,'2017-04-18 00:00:00',0),(32,3,7,2,32,'2017-04-18 00:00:00',0),(33,3,7,2,32,'2017-04-18 00:00:00',0),(34,1,7,3,23,'2017-04-18 00:00:00',0),(35,0,7,2,32,'2017-04-18 00:00:00',0);

/*Table structure for table `user_types` */

DROP TABLE IF EXISTS `user_types`;

CREATE TABLE `user_types` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_name` varchar(200) NOT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user_types` */

insert  into `user_types`(`user_type_id`,`user_type_name`) values (1,'Administrator'),(2,'Kasir'),(3,'Owner'),(4,'Waitress');

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`user_id`,`user_type_id`,`user_login`,`user_password`,`user_name`,`user_code`,`user_phone`,`user_img`,`user_active_status`,`branch_id`) values (11,1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','','03125435432','',1,7),(32,3,'maria','fe01ce2a7fbac8fafaed7c982a04e229','maria','','1111','',1,4),(34,1,'budi','101eb6ad45137d043a8e3f8fb3990135','budi','','3232','',1,3),(39,2,'dita','fe01ce2a7fbac8fafaed7c982a04e229','Dita','','085731404513','',1,3),(40,4,'elina','fe01ce2a7fbac8fafaed7c982a04e229','Lina','','085852731314','',1,4),(41,1,'admin12','21232f297a57a5a743894a0e4a801fc3','admin','','01491241','',1,6);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
