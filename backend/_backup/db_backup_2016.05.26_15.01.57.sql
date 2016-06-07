-- -------------------------------------------
SET AUTOCOMMIT=0;
START TRANSACTION;
SET SQL_QUOTE_SHOW_CREATE = 1;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- -------------------------------------------
-- -------------------------------------------
-- START BACKUP
-- -------------------------------------------
-- -------------------------------------------
-- TABLE `bank_transfer`
-- -------------------------------------------
DROP TABLE IF EXISTS `bank_transfer`;
CREATE TABLE IF NOT EXISTS `bank_transfer` (
  `bank_transfer_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_transfer_name` varchar(64) NOT NULL,
  `bank_transfer_account` varchar(32) NOT NULL,
  `bank_transfer_text` varchar(128) NOT NULL,
  PRIMARY KEY (`bank_transfer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `cart`
-- -------------------------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `product_options_id` int(11) DEFAULT NULL,
  `product_options_name` varchar(64) DEFAULT NULL,
  `product_options_price` int(11) DEFAULT '0',
  `qty` int(11) DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_code` varchar(20) DEFAULT NULL,
  `coupon_discount` int(11) DEFAULT NULL,
  `deal_id` int(11) DEFAULT NULL,
  `deal_category_id` int(11) DEFAULT NULL,
  `deal_discount` int(11) DEFAULT NULL,
  `deal_quantity` int(11) DEFAULT NULL,
  `deal_quantity_threeshold` int(11) DEFAULT NULL,
  `cart_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `city`
-- -------------------------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL,
  `city_name` varchar(64) NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `fk_city_province1_idx` (`province_id`),
  CONSTRAINT `fk_city_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `comment`
-- -------------------------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_text` text NOT NULL,
  `comment_date_added` date DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `fk_product_has_customer_customer1_idx` (`customer_id`),
  KEY `fk_product_has_customer_product1_idx` (`product_id`),
  CONSTRAINT `fk_product_has_customer_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_has_customer_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `coupon`
-- -------------------------------------------
DROP TABLE IF EXISTS `coupon`;
CREATE TABLE IF NOT EXISTS `coupon` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(64) NOT NULL,
  `coupon_discount` float NOT NULL,
  `coupon_total` int(11) NOT NULL,
  `coupon_used` int(11) DEFAULT '0',
  `redeem_point` int(11) NOT NULL DEFAULT '0',
  `coupon_date_start` datetime DEFAULT NULL,
  `coupon_date_end` datetime DEFAULT NULL,
  `coupon_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`coupon_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `coupon_list`
-- -------------------------------------------
DROP TABLE IF EXISTS `coupon_list`;
CREATE TABLE IF NOT EXISTS `coupon_list` (
  `coupon_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `coupon_list_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`customer_id`,`coupon_id`),
  KEY `fk_coupon_has_customer_customer1_idx` (`customer_id`),
  KEY `fk_coupon_has_customer_coupon1_idx` (`coupon_id`),
  CONSTRAINT `fk_coupon_has_customer_coupon1` FOREIGN KEY (`coupon_id`) REFERENCES `coupon` (`coupon_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coupon_has_customer_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `customer`
-- -------------------------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(64) DEFAULT NULL,
  `customer_dob` date DEFAULT NULL,
  `customer_gender` int(11) DEFAULT NULL,
  `customer_telephone` varchar(20) DEFAULT NULL,
  `customer_address` text,
  `customer_reward_point` int(11) DEFAULT '0',
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `newsletter` smallint(6) NOT NULL DEFAULT '10',
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `deal`
-- -------------------------------------------
DROP TABLE IF EXISTS `deal`;
CREATE TABLE IF NOT EXISTS `deal` (
  `deal_id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_name` varchar(64) NOT NULL,
  `deal_date_start` datetime DEFAULT NULL,
  `deal_date_end` datetime DEFAULT NULL,
  `deal_category_id` int(11) NOT NULL,
  `discount_value` int(11) DEFAULT NULL,
  `get_quantity` int(11) DEFAULT NULL,
  `quantity_threeshold` int(11) DEFAULT NULL,
  `sum_threeshold` int(11) DEFAULT NULL,
  PRIMARY KEY (`deal_id`),
  KEY `fk_deal_deal_category1_idx` (`deal_category_id`),
  CONSTRAINT `fk_deal_deal_category1` FOREIGN KEY (`deal_category_id`) REFERENCES `deal_category` (`deal_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `deal_category`
-- -------------------------------------------
DROP TABLE IF EXISTS `deal_category`;
CREATE TABLE IF NOT EXISTS `deal_category` (
  `deal_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `deal_category_name` varchar(64) NOT NULL,
  `deal_category_description` text NOT NULL,
  PRIMARY KEY (`deal_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `delivery_address`
-- -------------------------------------------
DROP TABLE IF EXISTS `delivery_address`;
CREATE TABLE IF NOT EXISTS `delivery_address` (
  `delivery_address_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `delivery_address_name` varchar(64) NOT NULL,
  `delivery_address_address` text NOT NULL,
  PRIMARY KEY (`delivery_address_id`),
  KEY `fk_delivery_address_city1_idx` (`city_id`),
  KEY `fk_delivery_address_customer1_idx` (`customer_id`),
  CONSTRAINT `fk_delivery_address_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_delivery_address_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `manufacturer`
-- -------------------------------------------
DROP TABLE IF EXISTS `manufacturer`;
CREATE TABLE IF NOT EXISTS `manufacturer` (
  `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer_name` varchar(64) NOT NULL,
  `manufacturer_address` text NOT NULL,
  `manufacturer_telephone` varchar(20) NOT NULL,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `migration`
-- -------------------------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `newsletter`
-- -------------------------------------------
DROP TABLE IF EXISTS `newsletter`;
CREATE TABLE IF NOT EXISTS `newsletter` (
  `newsletter_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `newsletter_title` varchar(128) NOT NULL,
  `newsletter_message` text NOT NULL,
  PRIMARY KEY (`newsletter_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `fk_newsletter_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `omset`
-- -------------------------------------------
DROP TABLE IF EXISTS `omset`;
CREATE TABLE IF NOT EXISTS `omset` (
  `omset_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `omset_site_code` varchar(20) NOT NULL,
  `omset_date` date NOT NULL,
  `omset_shift` varchar(50) NOT NULL,
  `omset_nama` varchar(50) NOT NULL,
  `omset_nominal` double NOT NULL,
  PRIMARY KEY (`omset_id`),
  KEY `FK_omset_parking_site` (`omset_site_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `order_list`
-- -------------------------------------------
DROP TABLE IF EXISTS `order_list`;
CREATE TABLE IF NOT EXISTS `order_list` (
  `order_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(17) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_options_id` int(11) DEFAULT NULL,
  `product_options_name` varchar(64) NOT NULL,
  `product_options_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `deal_id` int(11) DEFAULT NULL,
  `deal_category_id` int(11) DEFAULT NULL,
  `deal_discount` int(11) DEFAULT NULL,
  `deal_quantity` int(11) DEFAULT NULL,
  `deal_quantity_threeshold` int(11) DEFAULT NULL,
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_code` varchar(20) DEFAULT NULL,
  `coupon_discount` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_list_id`),
  KEY `fk_product_has_order_order1_idx` (`order_code`),
  KEY `fk_product_has_order_product1_idx` (`product_id`),
  CONSTRAINT `fk_product_has_order_order1` FOREIGN KEY (`order_code`) REFERENCES `order_t` (`order_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_product_has_order_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `order_t`
-- -------------------------------------------
DROP TABLE IF EXISTS `order_t`;
CREATE TABLE IF NOT EXISTS `order_t` (
  `order_code` varchar(17) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `payment_status` int(11) DEFAULT '0',
  `order_status` int(11) DEFAULT '0',
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_code` varchar(20) DEFAULT NULL,
  `delivery_address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `order_sum` int(11) NOT NULL,
  PRIMARY KEY (`order_code`),
  KEY `fk_order_coupon1_idx` (`coupon_id`),
  KEY `fk_order_delivery_address1` (`delivery_address_id`),
  KEY `fk_order_customer1` (`customer_id`),
  CONSTRAINT `fk_order_coupon1` FOREIGN KEY (`coupon_id`) REFERENCES `coupon` (`coupon_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_delivery_address1` FOREIGN KEY (`delivery_address_id`) REFERENCES `delivery_address` (`delivery_address_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `payment_conf`
-- -------------------------------------------
DROP TABLE IF EXISTS `payment_conf`;
CREATE TABLE IF NOT EXISTS `payment_conf` (
  `payment_conf_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(17) NOT NULL,
  `bank_transfer_id` int(11) NOT NULL,
  `payment_conf_name` varchar(64) NOT NULL,
  `payment_conf_account` varchar(32) NOT NULL,
  `payment_conf_nominal` int(11) NOT NULL,
  PRIMARY KEY (`payment_conf_id`),
  KEY `fk_payment_conf_order1_idx` (`order_code`),
  KEY `fk_payment_conf_bank_transfer1_idx` (`bank_transfer_id`),
  CONSTRAINT `fk_payment_conf_bank_transfer1` FOREIGN KEY (`bank_transfer_id`) REFERENCES `bank_transfer` (`bank_transfer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_payment_conf_order1` FOREIGN KEY (`order_code`) REFERENCES `order_t` (`order_code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `product`
-- -------------------------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `product_model` varchar(64) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_reward_point` int(11) DEFAULT NULL,
  `deal_deal_id` int(11) DEFAULT NULL,
  `deal_category_id` int(11) DEFAULT NULL,
  `product_status` int(11) DEFAULT '10',
  PRIMARY KEY (`product_id`),
  KEY `fk_product_product_category_idx` (`product_category_id`),
  KEY `fk_product_manufacturer1_idx` (`manufacturer_id`),
  KEY `fk_product_deal1_idx` (`deal_deal_id`),
  CONSTRAINT `fk_product_deal1` FOREIGN KEY (`deal_deal_id`) REFERENCES `deal` (`deal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_manufacturer1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_product_category` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `product_category`
-- -------------------------------------------
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_name` varchar(64) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `product_options`
-- -------------------------------------------
DROP TABLE IF EXISTS `product_options`;
CREATE TABLE IF NOT EXISTS `product_options` (
  `product_options_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_options_name` varchar(64) NOT NULL,
  `product_options_description` text NOT NULL,
  `product_options_price` int(11) NOT NULL,
  `product_options_tier` int(11) NOT NULL,
  PRIMARY KEY (`product_options_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_options_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `province`
-- -------------------------------------------
DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_name` varchar(64) NOT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `support_ticket`
-- -------------------------------------------
DROP TABLE IF EXISTS `support_ticket`;
CREATE TABLE IF NOT EXISTS `support_ticket` (
  `support_ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `support_ticket_category_id` int(11) NOT NULL,
  `issue` varchar(64) NOT NULL,
  `date_submit` datetime DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `support_ticket_status` int(11) NOT NULL DEFAULT '10',
  PRIMARY KEY (`support_ticket_id`),
  KEY `fk_support_ticket_support_ticket_category1_idx` (`support_ticket_category_id`),
  KEY `fk_support_ticket_customer1_idx` (`customer_id`),
  CONSTRAINT `fk_support_ticket_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_support_ticket_support_ticket_category1` FOREIGN KEY (`support_ticket_category_id`) REFERENCES `support_ticket_category` (`support_ticket_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `support_ticket_category`
-- -------------------------------------------
DROP TABLE IF EXISTS `support_ticket_category`;
CREATE TABLE IF NOT EXISTS `support_ticket_category` (
  `support_ticket_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `support_ticket_category_name` varchar(64) NOT NULL,
  PRIMARY KEY (`support_ticket_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `support_ticket_message`
-- -------------------------------------------
DROP TABLE IF EXISTS `support_ticket_message`;
CREATE TABLE IF NOT EXISTS `support_ticket_message` (
  `support_ticket_message_id` int(11) NOT NULL AUTO_INCREMENT,
  `support_ticket_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `date_submit` datetime NOT NULL,
  PRIMARY KEY (`support_ticket_message_id`),
  KEY `support_ticket_id` (`support_ticket_id`,`customer_id`,`admin_id`),
  CONSTRAINT `support_ticket_message_ibfk_1` FOREIGN KEY (`support_ticket_id`) REFERENCES `support_ticket` (`support_ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `user`
-- -------------------------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE DATA bank_transfer
-- -------------------------------------------
INSERT INTO `bank_transfer` (`bank_transfer_id`,`bank_transfer_name`,`bank_transfer_account`,`bank_transfer_text`) VALUES
('7','BNI','022515','BNI - 022515');
INSERT INTO `bank_transfer` (`bank_transfer_id`,`bank_transfer_name`,`bank_transfer_account`,`bank_transfer_text`) VALUES
('8','Mandiri','148952405','Mandiri - 148952405');



-- -------------------------------------------
-- TABLE DATA city
-- -------------------------------------------
INSERT INTO `city` (`city_id`,`province_id`,`city_name`) VALUES
('1','1','Bandungg');
INSERT INTO `city` (`city_id`,`province_id`,`city_name`) VALUES
('2','1','Sumedang');
INSERT INTO `city` (`city_id`,`province_id`,`city_name`) VALUES
('4','1','Cirebon');
INSERT INTO `city` (`city_id`,`province_id`,`city_name`) VALUES
('5','2','Purwokertoo');



-- -------------------------------------------
-- TABLE DATA coupon
-- -------------------------------------------
INSERT INTO `coupon` (`coupon_id`,`coupon_name`,`coupon_discount`,`coupon_total`,`coupon_used`,`redeem_point`,`coupon_date_start`,`coupon_date_end`,`coupon_status`) VALUES
('1','Christmas Coupon','20','100','12','25','2016-04-03 00:00:00','2016-04-30 00:00:00','10');
INSERT INTO `coupon` (`coupon_id`,`coupon_name`,`coupon_discount`,`coupon_total`,`coupon_used`,`redeem_point`,`coupon_date_start`,`coupon_date_end`,`coupon_status`) VALUES
('2','New Year Coupon','30','100','6','30','2016-04-03 00:00:00','2017-04-30 00:00:00','10');
INSERT INTO `coupon` (`coupon_id`,`coupon_name`,`coupon_discount`,`coupon_total`,`coupon_used`,`redeem_point`,`coupon_date_start`,`coupon_date_end`,`coupon_status`) VALUES
('3','Friday Sale','15','50','0','20','2016-05-13 00:00:00','2016-05-27 00:00:00','10');



-- -------------------------------------------
-- TABLE DATA coupon_list
-- -------------------------------------------
INSERT INTO `coupon_list` (`coupon_id`,`customer_id`,`coupon_code`,`coupon_list_status`) VALUES
('1','4','YygX','10');
INSERT INTO `coupon_list` (`coupon_id`,`customer_id`,`coupon_code`,`coupon_list_status`) VALUES
('2','4','e3WV','0');



-- -------------------------------------------
-- TABLE DATA customer
-- -------------------------------------------
INSERT INTO `customer` (`customer_id`,`customer_name`,`customer_dob`,`customer_gender`,`customer_telephone`,`customer_address`,`customer_reward_point`,`username`,`email`,`auth_key`,`password_hash`,`password_reset_token`,`created_at`,`updated_at`,`status`,`newsletter`) VALUES
('4','Eko Radityo Leonan','1993-07-06','10','12345678910','teeseststse','40','ekoradityo','tierous@gmail.com','bsd3tPFCCmed6AapFlczmv4BJj5OO_sV','$2y$13$Kf5/NLZTaxjxIvmbx9XRJe31QAm3oAd7LMSuSfOI7JWN4i30Zwmau','','1458293407','1463649840','10','10');



-- -------------------------------------------
-- TABLE DATA deal
-- -------------------------------------------
INSERT INTO `deal` (`deal_id`,`deal_name`,`deal_date_start`,`deal_date_end`,`deal_category_id`,`discount_value`,`get_quantity`,`quantity_threeshold`,`sum_threeshold`) VALUES
('1','Sunday Special','2016-04-14 00:00:00','2016-04-14 00:00:00','1','25','','','');
INSERT INTO `deal` (`deal_id`,`deal_name`,`deal_date_start`,`deal_date_end`,`deal_category_id`,`discount_value`,`get_quantity`,`quantity_threeshold`,`sum_threeshold`) VALUES
('2','Weekend Deal','2016-04-14 00:00:00','2016-04-14 00:00:00','2','','2','1','');
INSERT INTO `deal` (`deal_id`,`deal_name`,`deal_date_start`,`deal_date_end`,`deal_category_id`,`discount_value`,`get_quantity`,`quantity_threeshold`,`sum_threeshold`) VALUES
('3','Back to School','2016-04-14 00:00:00','2016-04-14 00:00:00','3','20','','2','');



-- -------------------------------------------
-- TABLE DATA deal_category
-- -------------------------------------------
INSERT INTO `deal_category` (`deal_category_id`,`deal_category_name`,`deal_category_description`) VALUES
('1','fixed discount','fixed discount');
INSERT INTO `deal_category` (`deal_category_id`,`deal_category_name`,`deal_category_description`) VALUES
('2','Buy X Get Y','Buy X Get Y');
INSERT INTO `deal_category` (`deal_category_id`,`deal_category_name`,`deal_category_description`) VALUES
('3','Buy X Discount Y','Buy X Discount Y');
INSERT INTO `deal_category` (`deal_category_id`,`deal_category_name`,`deal_category_description`) VALUES
('4','Sum X Discount Y','Sum X Discount Y');



-- -------------------------------------------
-- TABLE DATA delivery_address
-- -------------------------------------------
INSERT INTO `delivery_address` (`delivery_address_id`,`customer_id`,`city_id`,`delivery_address_name`,`delivery_address_address`) VALUES
('24','4','4','Eko Radityo','Jalan Cendrawasih no.16');



-- -------------------------------------------
-- TABLE DATA manufacturer
-- -------------------------------------------
INSERT INTO `manufacturer` (`manufacturer_id`,`manufacturer_name`,`manufacturer_address`,`manufacturer_telephone`) VALUES
('1','Nike','Jalan Sudirman 88','12345678');
INSERT INTO `manufacturer` (`manufacturer_id`,`manufacturer_name`,`manufacturer_address`,`manufacturer_telephone`) VALUES
('2','Adidas','jl adidas','123456');
INSERT INTO `manufacturer` (`manufacturer_id`,`manufacturer_name`,`manufacturer_address`,`manufacturer_telephone`) VALUES
('3','Samsung','Samsung Street, Industrial Disctrict, Singapore','+4698744415');
INSERT INTO `manufacturer` (`manufacturer_id`,`manufacturer_name`,`manufacturer_address`,`manufacturer_telephone`) VALUES
('4','Nokia','Nokia Street, Sweden','+7764782225');
INSERT INTO `manufacturer` (`manufacturer_id`,`manufacturer_name`,`manufacturer_address`,`manufacturer_telephone`) VALUES
('5','LG','LG Street, Korea','+8946781155');
INSERT INTO `manufacturer` (`manufacturer_id`,`manufacturer_name`,`manufacturer_address`,`manufacturer_telephone`) VALUES
('6','Sony','Sony Street, Japan','+4769778250');
INSERT INTO `manufacturer` (`manufacturer_id`,`manufacturer_name`,`manufacturer_address`,`manufacturer_telephone`) VALUES
('7','Apple','Apple Street, California US','+33755009855');



-- -------------------------------------------
-- TABLE DATA migration
-- -------------------------------------------
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m000000_000000_base','1455943858');
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m130524_201442_init','1455943863');
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m160104_073803_create_newsletter_template_table','1463176483');
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m160104_073815_create_event_template_table','1463176484');
INSERT INTO `migration` (`version`,`apply_time`) VALUES
('m160104_073828_create_event_newsletter_template_table','1463176484');



-- -------------------------------------------
-- TABLE DATA newsletter
-- -------------------------------------------
INSERT INTO `newsletter` (`newsletter_id`,`product_id`,`newsletter_title`,`newsletter_message`) VALUES
('3','32','','Halo ada produk yang cocok sekali dengan kamu');
INSERT INTO `newsletter` (`newsletter_id`,`product_id`,`newsletter_title`,`newsletter_message`) VALUES
('4','33','','baruuuu');



-- -------------------------------------------
-- TABLE DATA omset
-- -------------------------------------------
INSERT INTO `omset` (`omset_id`,`omset_site_code`,`omset_date`,`omset_shift`,`omset_nama`,`omset_nominal`) VALUES
('1','P01','2015-12-02','Shift1','Suhendra Y Putra','600000');
INSERT INTO `omset` (`omset_id`,`omset_site_code`,`omset_date`,`omset_shift`,`omset_nama`,`omset_nominal`) VALUES
('2','P02','2015-12-02','Shift2','Arief Hermawan','650000');
INSERT INTO `omset` (`omset_id`,`omset_site_code`,`omset_date`,`omset_shift`,`omset_nama`,`omset_nominal`) VALUES
('3','P03','2015-12-02','Shift3','Willy Budiman','550000');
INSERT INTO `omset` (`omset_id`,`omset_site_code`,`omset_date`,`omset_shift`,`omset_nama`,`omset_nominal`) VALUES
('4','P01','2015-11-04','Shift1','Suhendra','400000');
INSERT INTO `omset` (`omset_id`,`omset_site_code`,`omset_date`,`omset_shift`,`omset_nama`,`omset_nominal`) VALUES
('5','P01','2015-11-04','Shift2','Arief','350000');
INSERT INTO `omset` (`omset_id`,`omset_site_code`,`omset_date`,`omset_shift`,`omset_nama`,`omset_nominal`) VALUES
('6','P03','2015-11-04','Shift3','Willy','450000');
INSERT INTO `omset` (`omset_id`,`omset_site_code`,`omset_date`,`omset_shift`,`omset_nama`,`omset_nominal`) VALUES
('7','P01','2015-10-04','Shift1','Suhendra','700000');
INSERT INTO `omset` (`omset_id`,`omset_site_code`,`omset_date`,`omset_shift`,`omset_nama`,`omset_nominal`) VALUES
('8','P02','2015-10-04','Shift2','Arief','250000');
INSERT INTO `omset` (`omset_id`,`omset_site_code`,`omset_date`,`omset_shift`,`omset_nama`,`omset_nominal`) VALUES
('9','P03','2015-10-04','Shift3','Willy','550000');
INSERT INTO `omset` (`omset_id`,`omset_site_code`,`omset_date`,`omset_shift`,`omset_nama`,`omset_nominal`) VALUES
('10','P01','2015-09-04','Shift1','Suhendra','200000');
INSERT INTO `omset` (`omset_id`,`omset_site_code`,`omset_date`,`omset_shift`,`omset_nama`,`omset_nominal`) VALUES
('11','P02','2015-09-04','Shift2','Arief','600000');
INSERT INTO `omset` (`omset_id`,`omset_site_code`,`omset_date`,`omset_shift`,`omset_nama`,`omset_nominal`) VALUES
('12','P03','2015-09-04','Shift3','Willy','350000');



-- -------------------------------------------
-- TABLE DATA order_list
-- -------------------------------------------
INSERT INTO `order_list` (`order_list_id`,`order_code`,`product_id`,`product_options_id`,`product_options_name`,`product_options_price`,`quantity`,`subtotal`,`deal_id`,`deal_category_id`,`deal_discount`,`deal_quantity`,`deal_quantity_threeshold`,`coupon_id`,`coupon_code`,`coupon_discount`) VALUES
('12','B8cq','31','10','','0','1','5600000','1','1','25','0','','','','');



-- -------------------------------------------
-- TABLE DATA order_t
-- -------------------------------------------
INSERT INTO `order_t` (`order_code`,`order_date`,`payment_status`,`order_status`,`coupon_id`,`coupon_code`,`delivery_address_id`,`customer_id`,`approved_by`,`order_sum`) VALUES
('B8cq','2016-05-26 19:49:26','0','0','','','24','4','','4200000');
INSERT INTO `order_t` (`order_code`,`order_date`,`payment_status`,`order_status`,`coupon_id`,`coupon_code`,`delivery_address_id`,`customer_id`,`approved_by`,`order_sum`) VALUES
('klhu','2016-06-26 19:49:26','0','0','','','24','4','','500000');



-- -------------------------------------------
-- TABLE DATA product
-- -------------------------------------------
INSERT INTO `product` (`product_id`,`product_category_id`,`manufacturer_id`,`product_name`,`product_model`,`product_price`,`product_description`,`product_image`,`product_reward_point`,`deal_deal_id`,`deal_category_id`,`product_status`) VALUES
('31','4','3','Samsung Galaxy S5','SGH-7700','5600000','Samsung Galaxy S5
- Quad Core
- 1GB RAM
- 8GB/16GB HDD','product-1.jpg','50','1','1','10');
INSERT INTO `product` (`product_id`,`product_category_id`,`manufacturer_id`,`product_name`,`product_model`,`product_price`,`product_description`,`product_image`,`product_reward_point`,`deal_deal_id`,`deal_category_id`,`product_status`) VALUES
('32','4','4','Nokia Lumia 870','NKA-870','4500000','Nokia Lumia 870
-Processor : Dual Core 64Bit
-Ram : 512MB
-HDD : 1GB
*Additional OneDrive Premium','product-2.jpg','25','','','10');
INSERT INTO `product` (`product_id`,`product_category_id`,`manufacturer_id`,`product_name`,`product_model`,`product_price`,`product_description`,`product_image`,`product_reward_point`,`deal_deal_id`,`deal_category_id`,`product_status`) VALUES
('33','4','5','LG G2','LG-G2089','2700000','LG G2
Quadcore Processor
512 MB RAM
2GB HDD
*Flip Case Add-On','product-3.jpg','15','','','10');
INSERT INTO `product` (`product_id`,`product_category_id`,`manufacturer_id`,`product_name`,`product_model`,`product_price`,`product_description`,`product_image`,`product_reward_point`,`deal_deal_id`,`deal_category_id`,`product_status`) VALUES
('34','4','6','Sony Xperia J','SNY-XPR-J','5300000','Sony Xperia J
Quadcore Snapdragon
MALI GPU
RAM 1GB
HDD 2GB','product-4.jpg','20','','','10');
INSERT INTO `product` (`product_id`,`product_category_id`,`manufacturer_id`,`product_name`,`product_model`,`product_price`,`product_description`,`product_image`,`product_reward_point`,`deal_deal_id`,`deal_category_id`,`product_status`) VALUES
('35','4','7','Apple i-Phone 5','i-Phone5','7800000','Apple i-Phone 5
64 Bit Processor
1GB RAM
8GB/16GB
','product-5.jpg','40','','','10');
INSERT INTO `product` (`product_id`,`product_category_id`,`manufacturer_id`,`product_name`,`product_model`,`product_price`,`product_description`,`product_image`,`product_reward_point`,`deal_deal_id`,`deal_category_id`,`product_status`) VALUES
('36','4','3','Samsung Galaxy Note','IP-2000','8400000','Samsung Galaxy Note
QuadCore Snapdragon
RAM 2GB
HDD 8GB/16GB/32GB','product-6.jpg','60','','','10');



-- -------------------------------------------
-- TABLE DATA product_category
-- -------------------------------------------
INSERT INTO `product_category` (`product_category_id`,`product_category_name`) VALUES
('1','Sport Shoes');
INSERT INTO `product_category` (`product_category_id`,`product_category_name`) VALUES
('2','Men Clothes');
INSERT INTO `product_category` (`product_category_id`,`product_category_name`) VALUES
('3','Women Clothes');
INSERT INTO `product_category` (`product_category_id`,`product_category_name`) VALUES
('4','Smartphone');



-- -------------------------------------------
-- TABLE DATA product_options
-- -------------------------------------------
INSERT INTO `product_options` (`product_options_id`,`product_id`,`product_options_name`,`product_options_description`,`product_options_price`,`product_options_tier`) VALUES
('10','31','default','default','0','0');
INSERT INTO `product_options` (`product_options_id`,`product_id`,`product_options_name`,`product_options_description`,`product_options_price`,`product_options_tier`) VALUES
('11','32','default','default','0','0');
INSERT INTO `product_options` (`product_options_id`,`product_id`,`product_options_name`,`product_options_description`,`product_options_price`,`product_options_tier`) VALUES
('12','33','default','default','0','0');
INSERT INTO `product_options` (`product_options_id`,`product_id`,`product_options_name`,`product_options_description`,`product_options_price`,`product_options_tier`) VALUES
('13','34','default','default','0','0');
INSERT INTO `product_options` (`product_options_id`,`product_id`,`product_options_name`,`product_options_description`,`product_options_price`,`product_options_tier`) VALUES
('14','35','default','default','0','0');
INSERT INTO `product_options` (`product_options_id`,`product_id`,`product_options_name`,`product_options_description`,`product_options_price`,`product_options_tier`) VALUES
('15','36','default','default','0','0');



-- -------------------------------------------
-- TABLE DATA province
-- -------------------------------------------
INSERT INTO `province` (`province_id`,`province_name`) VALUES
('1','Jawa Barat');
INSERT INTO `province` (`province_id`,`province_name`) VALUES
('2','Jawa Tengah');



-- -------------------------------------------
-- TABLE DATA support_ticket
-- -------------------------------------------
INSERT INTO `support_ticket` (`support_ticket_id`,`support_ticket_category_id`,`issue`,`date_submit`,`customer_id`,`support_ticket_status`) VALUES
('3','1','tetaste','2016-04-19 23:41:13','4','10');
INSERT INTO `support_ticket` (`support_ticket_id`,`support_ticket_category_id`,`issue`,`date_submit`,`customer_id`,`support_ticket_status`) VALUES
('4','1','Gabisa ganti password','2016-05-10 03:48:28','4','0');



-- -------------------------------------------
-- TABLE DATA support_ticket_category
-- -------------------------------------------
INSERT INTO `support_ticket_category` (`support_ticket_category_id`,`support_ticket_category_name`) VALUES
('1','General');



-- -------------------------------------------
-- TABLE DATA support_ticket_message
-- -------------------------------------------
INSERT INTO `support_ticket_message` (`support_ticket_message_id`,`support_ticket_id`,`customer_id`,`admin_id`,`message`,`date_submit`) VALUES
('1','3','4','','asteastset','2016-04-19 23:41:13');
INSERT INTO `support_ticket_message` (`support_ticket_message_id`,`support_ticket_id`,`customer_id`,`admin_id`,`message`,`date_submit`) VALUES
('2','3','4','','sdgsgre','2016-04-20 01:53:56');
INSERT INTO `support_ticket_message` (`support_ticket_message_id`,`support_ticket_id`,`customer_id`,`admin_id`,`message`,`date_submit`) VALUES
('3','3','4','','Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda ','2016-04-27 02:49:51');
INSERT INTO `support_ticket_message` (`support_ticket_message_id`,`support_ticket_id`,`customer_id`,`admin_id`,`message`,`date_submit`) VALUES
('4','3','','1','Jawaban Admin','2016-05-05 00:12:16');
INSERT INTO `support_ticket_message` (`support_ticket_message_id`,`support_ticket_id`,`customer_id`,`admin_id`,`message`,`date_submit`) VALUES
('5','4','4','','test test test','2016-05-10 03:48:28');
INSERT INTO `support_ticket_message` (`support_ticket_message_id`,`support_ticket_id`,`customer_id`,`admin_id`,`message`,`date_submit`) VALUES
('6','4','','1','test admin','2016-05-10 03:50:48');
INSERT INTO `support_ticket_message` (`support_ticket_message_id`,`support_ticket_id`,`customer_id`,`admin_id`,`message`,`date_submit`) VALUES
('7','4','4','','test2','2016-05-10 03:51:45');



-- -------------------------------------------
-- TABLE DATA user
-- -------------------------------------------
INSERT INTO `user` (`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`role`) VALUES
('1','eco','xxtEgdK4z7HbBtTGUy7p3kPWO1-IxdrN','$2y$13$B.ADlENq1w22mhfpYwCU9OIZ2VspPMjJZAgRggR6xQml5EvJhyLRC','','tierous@gmail.com','10','1455944144','1463636858','30');
INSERT INTO `user` (`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created_at`,`updated_at`,`role`) VALUES
('5','admin2','3268fV8YVhh957okL2GPHZNmY8wJ0p7G','$2y$13$JuEtEZkB4iuOa.GEZNtelOsM6Sa73U4/bpj60idDWdCTpS1JP/YJu','','admin2@admin2.com','10','1463647602','1463647602','20');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
