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

