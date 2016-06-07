-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 08 Jun 2016 pada 02.17
-- Versi Server: 5.6.30-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm_v2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_transfer`
--

CREATE TABLE IF NOT EXISTS `bank_transfer` (
  `bank_transfer_id` int(11) NOT NULL,
  `bank_transfer_name` varchar(64) NOT NULL,
  `bank_transfer_account` varchar(32) NOT NULL,
  `bank_transfer_text` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank_transfer`
--

INSERT INTO `bank_transfer` (`bank_transfer_id`, `bank_transfer_name`, `bank_transfer_account`, `bank_transfer_text`) VALUES
(7, 'BNI', '022515', 'BNI - 022515'),
(8, 'Mandiri', '148952405', 'Mandiri - 148952405');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL,
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
  `cart_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_options_id`, `product_options_name`, `product_options_price`, `qty`, `coupon_id`, `coupon_code`, `coupon_discount`, `deal_id`, `deal_category_id`, `deal_discount`, `deal_quantity`, `deal_quantity_threeshold`, `cart_code`) VALUES
(1, 31, 10, NULL, 0, 1, NULL, NULL, NULL, 1, 1, 25, 0, NULL, '2QTTUD9U-TYYRFPGU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `city_name` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `city`
--

INSERT INTO `city` (`city_id`, `province_id`, `city_name`) VALUES
(1, 1, 'Bandungg'),
(2, 1, 'Sumedang'),
(4, 1, 'Cirebon'),
(5, 2, 'Purwokertoo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_date_added` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`product_id`, `customer_id`, `comment_id`, `comment_text`, `comment_date_added`) VALUES
(31, 4, 1, 'Barang sesuai dengan spesifikasi di web, recomended seller!', '2016-05-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(64) NOT NULL,
  `coupon_discount` float NOT NULL,
  `coupon_total` int(11) NOT NULL,
  `coupon_used` int(11) DEFAULT '0',
  `redeem_point` int(11) NOT NULL DEFAULT '0',
  `coupon_date_start` datetime DEFAULT NULL,
  `coupon_date_end` datetime DEFAULT NULL,
  `coupon_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_name`, `coupon_discount`, `coupon_total`, `coupon_used`, `redeem_point`, `coupon_date_start`, `coupon_date_end`, `coupon_status`) VALUES
(1, 'Christmas Coupon', 20, 100, 12, 25, '2016-04-03 00:00:00', '2016-05-29 00:00:00', 10),
(2, 'New Year Coupon', 30, 100, 6, 30, '2016-04-03 00:00:00', '2012-05-25 00:00:00', 10),
(3, 'Friday Sale', 15, 50, 2, 20, '2016-05-13 00:00:00', '2016-05-27 00:00:00', 10),
(4, 'Thursday Sale', 15, 50, 2, 20, '2016-05-13 00:00:00', '2016-05-27 00:00:00', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `coupon_list`
--

CREATE TABLE IF NOT EXISTS `coupon_list` (
  `coupon_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `coupon_list_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `coupon_list`
--

INSERT INTO `coupon_list` (`coupon_id`, `customer_id`, `coupon_code`, `coupon_list_status`) VALUES
(1, 4, 'YygX', 10),
(2, 4, 'e3WV', 0),
(3, 4, 'b9MN', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL,
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
  `newsletter` smallint(6) NOT NULL DEFAULT '10'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_dob`, `customer_gender`, `customer_telephone`, `customer_address`, `customer_reward_point`, `username`, `email`, `auth_key`, `password_hash`, `password_reset_token`, `created_at`, `updated_at`, `status`, `newsletter`) VALUES
(4, 'Eko Radityo Leonan', '1993-07-06', 10, '12345678910', 'teeseststse', 80, 'ekoradityo', 'tierous@gmail.com', 'bsd3tPFCCmed6AapFlczmv4BJj5OO_sV', '$2y$13$Kf5/NLZTaxjxIvmbx9XRJe31QAm3oAd7LMSuSfOI7JWN4i30Zwmau', NULL, 1458293407, 1464456209, 10, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `deal`
--

CREATE TABLE IF NOT EXISTS `deal` (
  `deal_id` int(11) NOT NULL,
  `deal_name` varchar(64) NOT NULL,
  `deal_date_start` datetime DEFAULT NULL,
  `deal_date_end` datetime DEFAULT NULL,
  `deal_category_id` int(11) NOT NULL,
  `discount_value` int(11) DEFAULT NULL,
  `get_quantity` int(11) DEFAULT NULL,
  `quantity_threeshold` int(11) DEFAULT NULL,
  `sum_threeshold` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `deal`
--

INSERT INTO `deal` (`deal_id`, `deal_name`, `deal_date_start`, `deal_date_end`, `deal_category_id`, `discount_value`, `get_quantity`, `quantity_threeshold`, `sum_threeshold`) VALUES
(1, 'Sunday Special', '2016-04-14 00:00:00', '2016-04-14 00:00:00', 1, 25, NULL, NULL, NULL),
(2, 'Weekend Deal', '2016-04-14 00:00:00', '2016-04-14 00:00:00', 2, NULL, 2, 1, NULL),
(3, 'Back to School', '2016-04-14 00:00:00', '2016-04-14 00:00:00', 3, 20, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `deal_category`
--

CREATE TABLE IF NOT EXISTS `deal_category` (
  `deal_category_id` int(11) NOT NULL,
  `deal_category_name` varchar(64) NOT NULL,
  `deal_category_description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `deal_category`
--

INSERT INTO `deal_category` (`deal_category_id`, `deal_category_name`, `deal_category_description`) VALUES
(1, 'fixed discount', 'fixed discount'),
(2, 'Buy X Get Y', 'Buy X Get Y'),
(3, 'Buy X Discount Y', 'Buy X Discount Y'),
(4, 'Sum X Discount Y', 'Sum X Discount Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivery_address`
--

CREATE TABLE IF NOT EXISTS `delivery_address` (
  `delivery_address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `delivery_address_name` varchar(64) NOT NULL,
  `delivery_address_address` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `delivery_address`
--

INSERT INTO `delivery_address` (`delivery_address_id`, `customer_id`, `city_id`, `delivery_address_name`, `delivery_address_address`) VALUES
(24, 4, 4, 'Eko Radityo', 'Jalan Cendrawasih no.16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_name` varchar(64) NOT NULL,
  `manufacturer_address` text NOT NULL,
  `manufacturer_telephone` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `manufacturer_name`, `manufacturer_address`, `manufacturer_telephone`) VALUES
(1, 'Nike', 'Jalan Sudirman 88', '12345678'),
(2, 'Adidas', 'jl adidas', '123456'),
(3, 'Samsung', 'Samsung Street, Industrial Disctrict, Singapore', '+4698744415'),
(4, 'Nokia', 'Nokia Street, Sweden', '+7764782225'),
(5, 'LG', 'LG Street, Korea', '+8946781155'),
(6, 'Sony', 'Sony Street, Japan', '+4769778250'),
(7, 'Apple', 'Apple Street, California US', '+33755009855');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1455943858),
('m130524_201442_init', 1455943863),
('m160104_073803_create_newsletter_template_table', 1463176483),
('m160104_073815_create_event_template_table', 1463176484),
('m160104_073828_create_event_newsletter_template_table', 1463176484);

-- --------------------------------------------------------

--
-- Struktur dari tabel `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `newsletter_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `newsletter_title` varchar(128) NOT NULL,
  `newsletter_message` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `newsletter`
--

INSERT INTO `newsletter` (`newsletter_id`, `product_id`, `newsletter_title`, `newsletter_message`) VALUES
(3, 32, '', 'Halo ada produk yang cocok sekali dengan kamu'),
(4, 33, '', 'baruuuu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `omset`
--

CREATE TABLE IF NOT EXISTS `omset` (
  `omset_id` bigint(20) unsigned NOT NULL,
  `omset_site_code` varchar(20) NOT NULL,
  `omset_date` date NOT NULL,
  `omset_shift` varchar(50) NOT NULL,
  `omset_nama` varchar(50) NOT NULL,
  `omset_nominal` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `omset`
--

INSERT INTO `omset` (`omset_id`, `omset_site_code`, `omset_date`, `omset_shift`, `omset_nama`, `omset_nominal`) VALUES
(1, 'P01', '2015-12-02', 'Shift1', 'Suhendra Y Putra', 600000),
(2, 'P02', '2015-12-02', 'Shift2', 'Arief Hermawan', 650000),
(3, 'P03', '2015-12-02', 'Shift3', 'Willy Budiman', 550000),
(4, 'P01', '2015-11-04', 'Shift1', 'Suhendra', 400000),
(5, 'P01', '2015-11-04', 'Shift2', 'Arief', 350000),
(6, 'P03', '2015-11-04', 'Shift3', 'Willy', 450000),
(7, 'P01', '2015-10-04', 'Shift1', 'Suhendra', 700000),
(8, 'P02', '2015-10-04', 'Shift2', 'Arief', 250000),
(9, 'P03', '2015-10-04', 'Shift3', 'Willy', 550000),
(10, 'P01', '2015-09-04', 'Shift1', 'Suhendra', 200000),
(11, 'P02', '2015-09-04', 'Shift2', 'Arief', 600000),
(12, 'P03', '2015-09-04', 'Shift3', 'Willy', 350000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_code` varchar(17) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `payment_status` int(11) DEFAULT '0',
  `order_status` int(11) DEFAULT '0',
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_code` varchar(20) DEFAULT NULL,
  `delivery_address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `order_sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`order_code`, `order_date`, `payment_status`, `order_status`, `coupon_id`, `coupon_code`, `delivery_address_id`, `customer_id`, `approved_by`, `order_sum`) VALUES
('B8cq', '2016-05-26 19:49:26', 0, 0, NULL, NULL, 24, 4, NULL, 4200000),
('klhu', '2016-06-26 19:49:26', 0, 0, NULL, NULL, 24, 4, NULL, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_list`
--

CREATE TABLE IF NOT EXISTS `order_list` (
  `order_list_id` int(11) NOT NULL,
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
  `coupon_discount` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_list`
--

INSERT INTO `order_list` (`order_list_id`, `order_code`, `product_id`, `product_options_id`, `product_options_name`, `product_options_price`, `quantity`, `subtotal`, `deal_id`, `deal_category_id`, `deal_discount`, `deal_quantity`, `deal_quantity_threeshold`, `coupon_id`, `coupon_code`, `coupon_discount`) VALUES
(12, 'B8cq', 31, 10, '', 0, 1, 5600000, 1, 1, 25, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_conf`
--

CREATE TABLE IF NOT EXISTS `payment_conf` (
  `payment_conf_id` int(11) NOT NULL,
  `order_code` varchar(17) NOT NULL,
  `bank_transfer_id` int(11) NOT NULL,
  `payment_conf_name` varchar(64) NOT NULL,
  `payment_conf_account` varchar(32) NOT NULL,
  `payment_conf_nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL,
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
  `product_status` int(11) DEFAULT '10'
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `product_category_id`, `manufacturer_id`, `product_name`, `product_model`, `product_price`, `product_description`, `product_image`, `product_reward_point`, `deal_deal_id`, `deal_category_id`, `product_status`) VALUES
(31, 4, 3, 'Samsung Galaxy S5', 'SGH-7700', 5600000, 'Samsung Galaxy S5\r\n- Quad Core\r\n- 1GB RAM\r\n- 8GB/16GB HDD', 'product-1.jpg', 50, 1, 1, 10),
(32, 4, 4, 'Nokia Lumia 870', 'NKA-870', 4500000, 'Nokia Lumia 870\r\n-Processor : Dual Core 64Bit\r\n-Ram : 512MB\r\n-HDD : 1GB\r\n*Additional OneDrive Premium', 'product-2.jpg', 25, NULL, NULL, 10),
(33, 4, 5, 'LG G2', 'LG-G2089', 2700000, 'LG G2\r\nQuadcore Processor\r\n512 MB RAM\r\n2GB HDD\r\n*Flip Case Add-On', 'product-3.jpg', 15, NULL, NULL, 10),
(34, 4, 6, 'Sony Xperia J', 'SNY-XPR-J', 5300000, 'Sony Xperia J\r\nQuadcore Snapdragon\r\nMALI GPU\r\nRAM 1GB\r\nHDD 2GB', 'product-4.jpg', 20, NULL, NULL, 10),
(35, 4, 7, 'Apple i-Phone 5', 'i-Phone5', 7800000, 'Apple i-Phone 5\r\n64 Bit Processor\r\n1GB RAM\r\n8GB/16GB\r\n', 'product-5.jpg', 40, NULL, NULL, 10),
(36, 4, 3, 'Samsung Galaxy Note', 'IP-2000', 8400000, 'Samsung Galaxy Note\r\nQuadCore Snapdragon\r\nRAM 2GB\r\nHDD 8GB/16GB/32GB', 'product-6.jpg', 60, NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `product_category_id` int(11) NOT NULL,
  `product_category_name` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `product_category_name`) VALUES
(1, 'Sport Shoes'),
(2, 'Men Clothes'),
(3, 'Women Clothes'),
(4, 'Smartphone');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_options`
--

CREATE TABLE IF NOT EXISTS `product_options` (
  `product_options_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_options_name` varchar(64) NOT NULL,
  `product_options_description` text NOT NULL,
  `product_options_price` int(11) NOT NULL,
  `product_options_tier` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_options`
--

INSERT INTO `product_options` (`product_options_id`, `product_id`, `product_options_name`, `product_options_description`, `product_options_price`, `product_options_tier`) VALUES
(10, 31, 'default', 'default', 0, 0),
(11, 32, 'default', 'default', 0, 0),
(12, 33, 'default', 'default', 0, 0),
(13, 34, 'default', 'default', 0, 0),
(14, 35, 'default', 'default', 0, 0),
(15, 36, 'default', 'default', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(1, 'Jawa Barat'),
(2, 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `support_ticket`
--

CREATE TABLE IF NOT EXISTS `support_ticket` (
  `support_ticket_id` int(11) NOT NULL,
  `support_ticket_category_id` int(11) NOT NULL,
  `issue` varchar(64) NOT NULL,
  `date_submit` datetime DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `support_ticket_status` int(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `support_ticket`
--

INSERT INTO `support_ticket` (`support_ticket_id`, `support_ticket_category_id`, `issue`, `date_submit`, `customer_id`, `support_ticket_status`) VALUES
(3, 1, 'tetaste', '2016-04-19 23:41:13', 4, 10),
(4, 1, 'Gabisa ganti password', '2016-05-10 03:48:28', 4, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `support_ticket_category`
--

CREATE TABLE IF NOT EXISTS `support_ticket_category` (
  `support_ticket_category_id` int(11) NOT NULL,
  `support_ticket_category_name` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `support_ticket_category`
--

INSERT INTO `support_ticket_category` (`support_ticket_category_id`, `support_ticket_category_name`) VALUES
(1, 'General');

-- --------------------------------------------------------

--
-- Struktur dari tabel `support_ticket_message`
--

CREATE TABLE IF NOT EXISTS `support_ticket_message` (
  `support_ticket_message_id` int(11) NOT NULL,
  `support_ticket_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `message` text NOT NULL,
  `date_submit` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `support_ticket_message`
--

INSERT INTO `support_ticket_message` (`support_ticket_message_id`, `support_ticket_id`, `customer_id`, `admin_id`, `message`, `date_submit`) VALUES
(1, 3, 4, NULL, 'asteastset', '2016-04-19 23:41:13'),
(2, 3, 4, NULL, 'sdgsgre', '2016-04-20 01:53:56'),
(3, 3, 4, NULL, 'Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda Keluhan anda ', '2016-04-27 02:49:51'),
(4, 3, NULL, 1, 'Jawaban Admin', '2016-05-05 00:12:16'),
(5, 4, 4, NULL, 'test test test', '2016-05-10 03:48:28'),
(6, 4, NULL, 1, 'test admin', '2016-05-10 03:50:48'),
(7, 4, 4, NULL, 'test2', '2016-05-10 03:51:45'),
(8, 3, NULL, 1, 'test', '2016-05-30 20:50:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `role`) VALUES
(1, 'eco', 'xxtEgdK4z7HbBtTGUy7p3kPWO1-IxdrN', '$2y$13$B.ADlENq1w22mhfpYwCU9OIZ2VspPMjJZAgRggR6xQml5EvJhyLRC', NULL, 'tierous@gmail.com', 10, 1455944144, 1463636858, 30),
(5, 'admin2', '3268fV8YVhh957okL2GPHZNmY8wJ0p7G', '$2y$13$JuEtEZkB4iuOa.GEZNtelOsM6Sa73U4/bpj60idDWdCTpS1JP/YJu', NULL, 'admin2@admin2.com', 10, 1463647602, 1463647602, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_transfer`
--
ALTER TABLE `bank_transfer`
  ADD PRIMARY KEY (`bank_transfer_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `fk_city_province1_idx` (`province_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_product_has_customer_customer1_idx` (`customer_id`),
  ADD KEY `fk_product_has_customer_product1_idx` (`product_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `coupon_list`
--
ALTER TABLE `coupon_list`
  ADD PRIMARY KEY (`customer_id`,`coupon_id`),
  ADD KEY `fk_coupon_has_customer_customer1_idx` (`customer_id`),
  ADD KEY `fk_coupon_has_customer_coupon1_idx` (`coupon_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`deal_id`),
  ADD KEY `fk_deal_deal_category1_idx` (`deal_category_id`);

--
-- Indexes for table `deal_category`
--
ALTER TABLE `deal_category`
  ADD PRIMARY KEY (`deal_category_id`);

--
-- Indexes for table `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`delivery_address_id`),
  ADD KEY `fk_delivery_address_city1_idx` (`city_id`),
  ADD KEY `fk_delivery_address_customer1_idx` (`customer_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`newsletter_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `omset`
--
ALTER TABLE `omset`
  ADD PRIMARY KEY (`omset_id`),
  ADD KEY `FK_omset_parking_site` (`omset_site_code`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_code`),
  ADD KEY `fk_order_coupon1_idx` (`coupon_id`),
  ADD KEY `fk_order_delivery_address1` (`delivery_address_id`),
  ADD KEY `fk_order_customer1` (`customer_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_list_id`),
  ADD KEY `fk_product_has_order_order1_idx` (`order_code`),
  ADD KEY `fk_product_has_order_product1_idx` (`product_id`);

--
-- Indexes for table `payment_conf`
--
ALTER TABLE `payment_conf`
  ADD PRIMARY KEY (`payment_conf_id`),
  ADD KEY `fk_payment_conf_order1_idx` (`order_code`),
  ADD KEY `fk_payment_conf_bank_transfer1_idx` (`bank_transfer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_product_category_idx` (`product_category_id`),
  ADD KEY `fk_product_manufacturer1_idx` (`manufacturer_id`),
  ADD KEY `fk_product_deal1_idx` (`deal_deal_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `product_options`
--
ALTER TABLE `product_options`
  ADD PRIMARY KEY (`product_options_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `support_ticket`
--
ALTER TABLE `support_ticket`
  ADD PRIMARY KEY (`support_ticket_id`),
  ADD KEY `fk_support_ticket_support_ticket_category1_idx` (`support_ticket_category_id`),
  ADD KEY `fk_support_ticket_customer1_idx` (`customer_id`);

--
-- Indexes for table `support_ticket_category`
--
ALTER TABLE `support_ticket_category`
  ADD PRIMARY KEY (`support_ticket_category_id`);

--
-- Indexes for table `support_ticket_message`
--
ALTER TABLE `support_ticket_message`
  ADD PRIMARY KEY (`support_ticket_message_id`),
  ADD KEY `support_ticket_id` (`support_ticket_id`,`customer_id`,`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_transfer`
--
ALTER TABLE `bank_transfer`
  MODIFY `bank_transfer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `deal`
--
ALTER TABLE `deal`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `deal_category`
--
ALTER TABLE `deal_category`
  MODIFY `deal_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `delivery_address_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `newsletter_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `omset`
--
ALTER TABLE `omset`
  MODIFY `omset_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_list_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `payment_conf`
--
ALTER TABLE `payment_conf`
  MODIFY `payment_conf_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `product_options_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `support_ticket`
--
ALTER TABLE `support_ticket`
  MODIFY `support_ticket_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `support_ticket_category`
--
ALTER TABLE `support_ticket_category`
  MODIFY `support_ticket_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `support_ticket_message`
--
ALTER TABLE `support_ticket_message`
  MODIFY `support_ticket_message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_city_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_product_has_customer_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_has_customer_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `coupon_list`
--
ALTER TABLE `coupon_list`
  ADD CONSTRAINT `fk_coupon_has_customer_coupon1` FOREIGN KEY (`coupon_id`) REFERENCES `coupon` (`coupon_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_coupon_has_customer_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `deal`
--
ALTER TABLE `deal`
  ADD CONSTRAINT `fk_deal_deal_category1` FOREIGN KEY (`deal_category_id`) REFERENCES `deal_category` (`deal_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD CONSTRAINT `fk_delivery_address_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_delivery_address_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `newsletter`
--
ALTER TABLE `newsletter`
  ADD CONSTRAINT `fk_newsletter_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_coupon1` FOREIGN KEY (`coupon_id`) REFERENCES `coupon` (`coupon_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_delivery_address1` FOREIGN KEY (`delivery_address_id`) REFERENCES `delivery_address` (`delivery_address_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `fk_product_has_order_order1` FOREIGN KEY (`order_code`) REFERENCES `order` (`order_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_has_order_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payment_conf`
--
ALTER TABLE `payment_conf`
  ADD CONSTRAINT `fk_payment_conf_bank_transfer1` FOREIGN KEY (`bank_transfer_id`) REFERENCES `bank_transfer` (`bank_transfer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payment_conf_order1` FOREIGN KEY (`order_code`) REFERENCES `order` (`order_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_deal1` FOREIGN KEY (`deal_deal_id`) REFERENCES `deal` (`deal_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_manufacturer1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer` (`manufacturer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_product_category` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`product_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `product_options`
--
ALTER TABLE `product_options`
  ADD CONSTRAINT `product_options_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `support_ticket`
--
ALTER TABLE `support_ticket`
  ADD CONSTRAINT `fk_support_ticket_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_support_ticket_support_ticket_category1` FOREIGN KEY (`support_ticket_category_id`) REFERENCES `support_ticket_category` (`support_ticket_category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `support_ticket_message`
--
ALTER TABLE `support_ticket_message`
  ADD CONSTRAINT `support_ticket_message_ibfk_1` FOREIGN KEY (`support_ticket_id`) REFERENCES `support_ticket` (`support_ticket_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
