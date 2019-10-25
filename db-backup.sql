/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.7.21 : Database - ecommerce
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ecommerce` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_persian_ci */;

USE `ecommerce`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `admin_id` int(22) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(233) COLLATE utf8_persian_ci DEFAULT NULL,
  `admin_pass` varchar(233) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `admin` */

insert  into `admin`(`admin_id`,`admin_email`,`admin_pass`) values 
(1,'amin@gmail.com','1234');

/*Table structure for table `brands` */

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `brand_id` int(111) NOT NULL AUTO_INCREMENT,
  `brand_title` text COLLATE utf8_persian_ci,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `brands` */

insert  into `brands`(`brand_id`,`brand_title`) values 
(1,'سامسونگ'),
(2,'سونی'),
(3,'ایسوز'),
(4,'ال جی');

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id_cart` int(22) NOT NULL AUTO_INCREMENT,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(555) COLLATE utf8_persian_ci DEFAULT NULL,
  `qty` int(111) DEFAULT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `cart` */

insert  into `cart`(`id_cart`,`p_id`,`ip_add`,`qty`) values 
(26,7,'198.16.66.197',1);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `cat_id` int(111) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(333) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `categories` */

insert  into `categories`(`cat_id`,`cat_title`) values 
(1,'گوشی'),
(2,'اینه'),
(3,'یخچال'),
(4,'کمد'),
(5,'لبتاب'),
(6,'تبلت');

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_ip` varchar(233) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_name` text COLLATE utf8_persian_ci,
  `customer_lastname` text COLLATE utf8_persian_ci,
  `customer_gender` varchar(77) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_image` text COLLATE utf8_persian_ci,
  `customer_email` varchar(66) COLLATE utf8_persian_ci DEFAULT NULL,
  `customer_province` text COLLATE utf8_persian_ci,
  `customer_city` text COLLATE utf8_persian_ci,
  `customer_address` text COLLATE utf8_persian_ci,
  `customer_phone` text COLLATE utf8_persian_ci,
  `customer_pass` varchar(99) COLLATE utf8_persian_ci DEFAULT NULL,
  `confirmed` int(122) DEFAULT NULL,
  `confirm_code` int(122) DEFAULT NULL,
  `lost` varchar(111) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `customers` */

insert  into `customers`(`customer_id`,`customer_ip`,`customer_name`,`customer_lastname`,`customer_gender`,`customer_image`,`customer_email`,`customer_province`,`customer_city`,`customer_address`,`customer_phone`,`customer_pass`,`confirmed`,`confirm_code`,`lost`) values 
(58,'198.16.66.197','حامی','زارع','مرد','customer/customers_images/1899961_782068991821360_659874944_n.jpg','arsanjanamin@gmail.com','تهران','احمدآبادمستوفي','خورشید صحرا .ک 5','09392707791','Amin@1414',1,0,NULL);

/*Table structure for table `order` */

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `order_id` int(111) NOT NULL AUTO_INCREMENT,
  `order_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `order_total_price` decimal(10,0) DEFAULT NULL,
  `order_is_verified` text COLLATE utf8_persian_ci,
  `order_email_customer` varchar(444) COLLATE utf8_persian_ci DEFAULT NULL,
  `Authority` varchar(333) COLLATE utf8_persian_ci DEFAULT NULL,
  `refid` varchar(222) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `order` */

insert  into `order`(`order_id`,`order_time`,`order_total_price`,`order_is_verified`,`order_email_customer`,`Authority`,`refid`) values 
(36,'2019-10-18 16:56:17',126960250,'false','arsanjanamin@gmail.com',NULL,NULL),
(35,'2019-10-18 16:54:51',126960000,'false','arsanjanamin@gmail.com',NULL,NULL),
(33,'2019-10-18 16:52:54',0,'false','arsanjanamin@gmail.com','zarinpal_',NULL),
(34,'2019-10-18 16:53:47',863800000,'true','arsanjanamin@gmail.com','zarinpal_000000000000000000000000000000068356','1');

/*Table structure for table `pay_cart` */

DROP TABLE IF EXISTS `pay_cart`;

CREATE TABLE `pay_cart` (
  `id_cart` int(22) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) DEFAULT NULL,
  `ip_add` varchar(333) COLLATE utf8_persian_ci DEFAULT NULL,
  `qty` int(222) DEFAULT NULL,
  `order_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `order_id` int(22) DEFAULT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `pay_cart` */

insert  into `pay_cart`(`id_cart`,`p_id`,`ip_add`,`qty`,`order_time`,`order_id`) values 
(11,2,'198.46.46.197',1,'2019-10-18 16:56:26',34),
(7,7,'194.16.46.197',7,'2019-10-18 16:54:05',34);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(333) COLLATE utf8_persian_ci DEFAULT NULL,
  `product_cat` int(100) DEFAULT NULL,
  `product_brand` int(100) DEFAULT NULL,
  `product_desc` text COLLATE utf8_persian_ci,
  `product_image` text COLLATE utf8_persian_ci,
  `product_keywords` text COLLATE utf8_persian_ci,
  `product_price` int(100) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `products` */

insert  into `products`(`product_id`,`product_title`,`product_cat`,`product_brand`,`product_desc`,`product_image`,`product_keywords`,`product_price`) values 
(1,'سامسونگ 1112',1,2,'گوشی بسیار زیبا و شکیل گوشی بسیار زیبا و شکیل گوشی بسیار زیبا و شکیل گوشی بسیار زیبا و شکیل گوشی بسیار زیبا و شکیل \r\nگوشی بسیار زیبا و شکیل گوشی بسیار زیبا و شکیل گوشی بسیار زیبا و شکیل \r\nگوشی بسیار زیبا و شکیل گوشی بسیار زیبا و شکیل گوشی بسیار زیبا و شکیل ','product_images/c1.jpg','lkjlklkjlkj',1200000),
(2,'Samsung Galaxy Tab S5e 10.5 LTE T725',1,1,'<p dir=\"auto\" style=\"box-sizing: inherit; margin: 0px 0px 1em; color: rgba(0, 0, 0, 0.87); font-family: IRANSans, Tahoma, Helvetica, sans-serif; font-size: 14.3px; text-align: justify; line-height: 2.2em !important;\">سینا به تازگی شروع به برنامه نویسی کرده و اخیرا مشغول بازبینی کدهای نوشته شده توسط احمد بود و نحوه نام&zwnj;گذاری متغیرهای او برای سینا جالب بود. احمد متغیرهای خود را به صورت&nbsp;<em style=\"box-sizing: inherit;\">camelCase</em>&nbsp;نام&zwnj;گذاری می&zwnj;کرد. به عنوان مثال نام یکی از متغیرهای احمد&nbsp;<code dir=\"ltr\" style=\"box-sizing: inherit; font-family: monospace, monospace; font-size: 12.87px; padding: 0.2em 0.4em; border-radius: 3px; background-color: #f3f6f7;\">counterVariable</code>&nbsp;بود.</p>\r\n<p dir=\"auto\" style=\"box-sizing: inherit; margin: 0px 0px 1em; color: rgba(0, 0, 0, 0.87); font-family: IRANSans, Tahoma, Helvetica, sans-serif; font-size: 14.3px; text-align: justify; line-height: 2.2em !important;\">حالا سینا قصد دارد قطعه کدی بنویسد که یک جمله را به عنوان ورودی دریافت کرده و آن را به صورت&nbsp;<code dir=\"ltr\" style=\"box-sizing: inherit; font-family: monospace, monospace; font-size: 12.87px; padding: 0.2em 0.4em; border-radius: 3px; background-color: #f3f6f7;\">camelCase</code>&nbsp;در خروجی نمایش دهد، اما چون تازه شروع به برنامه نویسی کرده از شما می&zwnj;خواهد تا این برنامه را برای او بنویسید</p>','product_images/c2.jpg','ال سی دی 14 اینچ',1780000),
(3,'لنوو مدل 653',5,3,'<p>چرااااااااااااااااااااااااااااااااااااااااا</p>','product_images/Mobile-Alcatel-OneTouch-Pixi-4007D979ecf.jpg','لبتاب جدید،کامپیوتر،گوشی',250),
(4,'ال سی دی 14 اینچ',3,2,'<p>&nbsp;jjjjjjjjjjjjjjjlkl</p>\r\n<p style=\"text-align: center;\">oppppppp</p>','product_images/c4.jpg','ساعت ، مچی ، زیبا، ششکیل ، ساعت فروشی ',1780000),
(5,' موبایل ویوو Y7s',4,3,'<p>kkkkkkkkkkkkk</p>','product_images/c5.jpg','فشارسنج',88907),
(7,'گوشی موتورولا جدید1243',1,1,'<p>بسیار پیچیده و</p>\r\n<p style=\"margin: 0px 0px 17px; color: #222222; text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: iransans; font-size: 15px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: #ffffff; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">حالا وقت آن رسیده است که یک بار به صورت عملی، صفحه &ldquo;وارد کردن محصول جدید&rdquo; را تست کنیم. به همین خاطر، ابتدا لازم است که به پایگاه داده ecommerce برویم و رکوردهای موجود در جدول داده ای products را، با دقت نگاه کنید.</p>\r\n<p>&nbsp;</p>\r\n<p style=\"margin: 0px 0px 17px; color: #222222; text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: iransans; font-size: 15px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; box-sizing: border-box; orphans: 2; widows: 2; background-color: #ffffff; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">حالا وقت آن رسیده است که یک بار به صورت عملی، صفحه &ldquo;وارد کردن محصول جدید&rdquo; را تست کنیم. به همین خاطر، ابتدا لازم است که به پایگاه داده ecommerce برویم و رکوردهای موجود در جدول داده ای products را، با دقت نگاه کنید.</p>\r\n<p>&nbsp;</p>','product_images/Mobile-Phone-Samsung-Galaxy-A3-20169bd638.jpg','موبایل، گوشی',123400000);

/*Table structure for table `total` */

DROP TABLE IF EXISTS `total`;

CREATE TABLE `total` (
  `t_id` int(111) NOT NULL AUTO_INCREMENT,
  `ip` varchar(222) COLLATE utf8_persian_ci DEFAULT NULL,
  `price_total_purchase` decimal(20,0) DEFAULT NULL,
  KEY `t_id` (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

/*Data for the table `total` */

insert  into `total`(`t_id`,`ip`,`price_total_purchase`) values 
(9,'198.44.78.197',141448);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
