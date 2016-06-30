-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 27 Jun 2016 pada 04.46
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank_transfer`
--

INSERT INTO `bank_transfer` (`bank_transfer_id`, `bank_transfer_name`, `bank_transfer_account`, `bank_transfer_text`) VALUES
(7, 'BNI', '022515', 'BNI - 022515'),
(8, 'Mandiri', '148952405', 'Mandiri - 148952405'),
(9, 'BCA', '4555184000415', 'BCA - 4555184000415');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_options_id` int(11) DEFAULT NULL,
  `product_options_name` varchar(64) DEFAULT 'default',
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
  `deal_sum_threeshold` int(11) DEFAULT NULL,
  `cart_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `city_name` varchar(64) NOT NULL,
  `shipping_cost` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9472 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `city`
--

INSERT INTO `city` (`city_id`, `province_id`, `city_name`, `shipping_cost`) VALUES
(1101, 11, 'KABUPATEN SIMEULUE', 96000),
(1102, 11, 'KABUPATEN ACEH SINGKIL', 64000),
(1103, 11, 'KABUPATEN ACEH SELATAN', 64000),
(1104, 11, 'KABUPATEN ACEH TENGGARA', 64000),
(1105, 11, 'KABUPATEN ACEH TIMUR', 64000),
(1106, 11, 'KABUPATEN ACEH TENGAH', 64000),
(1107, 11, 'KABUPATEN ACEH BARAT', 64000),
(1108, 11, 'KABUPATEN ACEH BESAR', 64000),
(1109, 11, 'KABUPATEN PIDIE', 64000),
(1110, 11, 'KABUPATEN BIREUEN', 64000),
(1111, 11, 'KABUPATEN ACEH UTARA', 64000),
(1112, 11, 'KABUPATEN ACEH BARAT DAYA', 64000),
(1113, 11, 'KABUPATEN GAYO LUES', 64000),
(1114, 11, 'KABUPATEN ACEH TAMIANG', 64000),
(1115, 11, 'KABUPATEN NAGAN RAYA', 64000),
(1116, 11, 'KABUPATEN ACEH JAYA', 64000),
(1117, 11, 'KABUPATEN BENER MERIAH', 64000),
(1118, 11, 'KABUPATEN PIDIE JAYA', 64000),
(1171, 11, 'KOTA BANDA ACEH', 37000),
(1172, 11, 'KOTA SABANG', 51000),
(1173, 11, 'KOTA LANGSA', 51000),
(1174, 11, 'KOTA LHOKSEUMAWE', 51000),
(1175, 11, 'KOTA SUBULUSSALAM', 51000),
(1201, 12, 'KABUPATEN NIAS', 30000),
(1202, 12, 'KABUPATEN MANDAILING NATAL', 30000),
(1203, 12, 'KABUPATEN TAPANULI SELATAN', 30000),
(1204, 12, 'KABUPATEN TAPANULI TENGAH', 30000),
(1205, 12, 'KABUPATEN TAPANULI UTARA', 30000),
(1206, 12, 'KABUPATEN TOBA SAMOSIR', 30000),
(1207, 12, 'KABUPATEN LABUHAN BATU', 30000),
(1208, 12, 'KABUPATEN ASAHAN', 30000),
(1209, 12, 'KABUPATEN SIMALUNGUN', 30000),
(1210, 12, 'KABUPATEN DAIRI', 30000),
(1211, 12, 'KABUPATEN KARO', 30000),
(1212, 12, 'KABUPATEN DELI SERDANG', 30000),
(1213, 12, 'KABUPATEN LANGKAT', 30000),
(1214, 12, 'KABUPATEN NIAS SELATAN', 30000),
(1215, 12, 'KABUPATEN HUMBANG HASUNDUTAN', 30000),
(1216, 12, 'KABUPATEN PAKPAK BHARAT', 30000),
(1217, 12, 'KABUPATEN SAMOSIR', 30000),
(1218, 12, 'KABUPATEN SERDANG BEDAGAI', 30000),
(1219, 12, 'KABUPATEN BATU BARA', 30000),
(1220, 12, 'KABUPATEN PADANG LAWAS UTARA', 30000),
(1221, 12, 'KABUPATEN PADANG LAWAS', 30000),
(1222, 12, 'KABUPATEN LABUHAN BATU SELATAN', 30000),
(1223, 12, 'KABUPATEN LABUHAN BATU UTARA', 30000),
(1224, 12, 'KABUPATEN NIAS UTARA', 30000),
(1225, 12, 'KABUPATEN NIAS BARAT', 30000),
(1271, 12, 'KOTA SIBOLGA', 30000),
(1272, 12, 'KOTA TANJUNG BALAI', 30000),
(1273, 12, 'KOTA PEMATANG SIANTAR', 30000),
(1274, 12, 'KOTA TEBING TINGGI', 30000),
(1275, 12, 'KOTA MEDAN', 30000),
(1276, 12, 'KOTA BINJAI', 30000),
(1277, 12, 'KOTA PADANGSIDIMPUAN', 30000),
(1278, 12, 'KOTA GUNUNGSITOLI', 30000),
(1301, 13, 'KABUPATEN KEPULAUAN MENTAWAI', 33000),
(1302, 13, 'KABUPATEN PESISIR SELATAN', 33000),
(1303, 13, 'KABUPATEN SOLOK', 33000),
(1304, 13, 'KABUPATEN SIJUNJUNG', 33000),
(1305, 13, 'KABUPATEN TANAH DATAR', 33000),
(1306, 13, 'KABUPATEN PADANG PARIAMAN', 33000),
(1307, 13, 'KABUPATEN AGAM', 33000),
(1308, 13, 'KABUPATEN LIMA PULUH KOTA', 33000),
(1309, 13, 'KABUPATEN PASAMAN', 33000),
(1310, 13, 'KABUPATEN SOLOK SELATAN', 33000),
(1311, 13, 'KABUPATEN DHARMASRAYA', 33000),
(1312, 13, 'KABUPATEN PASAMAN BARAT', 33000),
(1371, 13, 'KOTA PADANG', 33000),
(1372, 13, 'KOTA SOLOK', 33000),
(1373, 13, 'KOTA SAWAH LUNTO', 33000),
(1374, 13, 'KOTA PADANG PANJANG', 33000),
(1375, 13, 'KOTA BUKITTINGGI', 33000),
(1376, 13, 'KOTA PAYAKUMBUH', 33000),
(1377, 13, 'KOTA PARIAMAN', 33000),
(1401, 14, 'KABUPATEN KUANTAN SINGINGI', 28000),
(1402, 14, 'KABUPATEN INDRAGIRI HULU', 28000),
(1403, 14, 'KABUPATEN INDRAGIRI HILIR', 28000),
(1404, 14, 'KABUPATEN PELALAWAN', 28000),
(1405, 14, 'KABUPATEN S I A K', 28000),
(1406, 14, 'KABUPATEN KAMPAR', 28000),
(1407, 14, 'KABUPATEN ROKAN HULU', 28000),
(1408, 14, 'KABUPATEN BENGKALIS', 28000),
(1409, 14, 'KABUPATEN ROKAN HILIR', 28000),
(1410, 14, 'KABUPATEN KEPULAUAN MERANTI', 28000),
(1471, 14, 'KOTA PEKANBARU', 28000),
(1473, 14, 'KOTA D U M A I', 28000),
(1501, 15, 'KABUPATEN KERINCI', 22000),
(1502, 15, 'KABUPATEN MERANGIN', 22000),
(1503, 15, 'KABUPATEN SAROLANGUN', 22000),
(1504, 15, 'KABUPATEN BATANG HARI', 22000),
(1505, 15, 'KABUPATEN MUARO JAMBI', 22000),
(1506, 15, 'KABUPATEN TANJUNG JABUNG TIMUR', 22000),
(1507, 15, 'KABUPATEN TANJUNG JABUNG BARAT', 22000),
(1508, 15, 'KABUPATEN TEBO', 22000),
(1509, 15, 'KABUPATEN BUNGO', 22000),
(1571, 15, 'KOTA JAMBI', 22000),
(1572, 15, 'KOTA SUNGAI PENUH', 22000),
(1601, 16, 'KABUPATEN OGAN KOMERING ULU', 22000),
(1602, 16, 'KABUPATEN OGAN KOMERING ILIR', 22000),
(1603, 16, 'KABUPATEN MUARA ENIM', 22000),
(1604, 16, 'KABUPATEN LAHAT', 22000),
(1605, 16, 'KABUPATEN MUSI RAWAS', 22000),
(1606, 16, 'KABUPATEN MUSI BANYUASIN', 22000),
(1607, 16, 'KABUPATEN BANYU ASIN', 22000),
(1608, 16, 'KABUPATEN OGAN KOMERING ULU SELATAN', 22000),
(1609, 16, 'KABUPATEN OGAN KOMERING ULU TIMUR', 22000),
(1610, 16, 'KABUPATEN OGAN ILIR', 22000),
(1611, 16, 'KABUPATEN EMPAT LAWANG', 22000),
(1612, 16, 'KABUPATEN PENUKAL ABAB LEMATANG ILIR', 22000),
(1613, 16, 'KABUPATEN MUSI RAWAS UTARA', 22000),
(1671, 16, 'KOTA PALEMBANG', 22000),
(1672, 16, 'KOTA PRABUMULIH', 22000),
(1673, 16, 'KOTA PAGAR ALAM', 22000),
(1674, 16, 'KOTA LUBUKLINGGAU', 22000),
(1701, 17, 'KABUPATEN BENGKULU SELATAN', 25000),
(1702, 17, 'KABUPATEN REJANG LEBONG', 25000),
(1703, 17, 'KABUPATEN BENGKULU UTARA', 25000),
(1704, 17, 'KABUPATEN KAUR', 25000),
(1705, 17, 'KABUPATEN SELUMA', 25000),
(1706, 17, 'KABUPATEN MUKOMUKO', 25000),
(1707, 17, 'KABUPATEN LEBONG', 25000),
(1708, 17, 'KABUPATEN KEPAHIANG', 25000),
(1709, 17, 'KABUPATEN BENGKULU TENGAH', 25000),
(1771, 17, 'KOTA BENGKULU', 25000),
(1801, 18, 'KABUPATEN LAMPUNG BARAT', 19000),
(1802, 18, 'KABUPATEN TANGGAMUS', 19000),
(1803, 18, 'KABUPATEN LAMPUNG SELATAN', 19000),
(1804, 18, 'KABUPATEN LAMPUNG TIMUR', 19000),
(1805, 18, 'KABUPATEN LAMPUNG TENGAH', 19000),
(1806, 18, 'KABUPATEN LAMPUNG UTARA', 19000),
(1807, 18, 'KABUPATEN WAY KANAN', 19000),
(1808, 18, 'KABUPATEN TULANGBAWANG', 19000),
(1809, 18, 'KABUPATEN PESAWARAN', 19000),
(1810, 18, 'KABUPATEN PRINGSEWU', 19000),
(1811, 18, 'KABUPATEN MESUJI', 19000),
(1812, 18, 'KABUPATEN TULANG BAWANG BARAT', 19000),
(1813, 18, 'KABUPATEN PESISIR BARAT', 19000),
(1871, 18, 'KOTA BANDAR LAMPUNG', 19000),
(1872, 18, 'KOTA METRO', 19000),
(1901, 19, 'KABUPATEN BANGKA', 34000),
(1902, 19, 'KABUPATEN BELITUNG', 34000),
(1903, 19, 'KABUPATEN BANGKA BARAT', 34000),
(1904, 19, 'KABUPATEN BANGKA TENGAH', 34000),
(1905, 19, 'KABUPATEN BANGKA SELATAN', 34000),
(1906, 19, 'KABUPATEN BELITUNG TIMUR', 34000),
(1971, 19, 'KOTA PANGKAL PINANG', 34000),
(2101, 21, 'KABUPATEN KARIMUN', 53000),
(2102, 21, 'KABUPATEN BINTAN', 53000),
(2103, 21, 'KABUPATEN NATUNA', 53000),
(2104, 21, 'KABUPATEN LINGGA', 53000),
(2105, 21, 'KABUPATEN KEPULAUAN ANAMBAS', 53000),
(2171, 21, 'KOTA B A T A M', 28000),
(2172, 21, 'KOTA TANJUNG PINANG', 28000),
(3101, 31, 'KABUPATEN KEPULAUAN SERIBU', 9000),
(3171, 31, 'KOTA JAKARTA SELATAN', 9000),
(3172, 31, 'KOTA JAKARTA TIMUR', 9000),
(3173, 31, 'KOTA JAKARTA PUSAT', 9000),
(3174, 31, 'KOTA JAKARTA BARAT', 9000),
(3175, 31, 'KOTA JAKARTA UTARA', 9000),
(3201, 32, 'KABUPATEN BOGOR', 9000),
(3202, 32, 'KABUPATEN SUKABUMI', 10000),
(3203, 32, 'KABUPATEN CIANJUR', 30000),
(3204, 32, 'KABUPATEN BANDUNG', 30000),
(3205, 32, 'KABUPATEN GARUT', 30000),
(3206, 32, 'KABUPATEN TASIKMALAYA', 30000),
(3207, 32, 'KABUPATEN CIAMIS', 30000),
(3208, 32, 'KABUPATEN KUNINGAN', 30000),
(3209, 32, 'KABUPATEN CIREBON', 11000),
(3210, 32, 'KABUPATEN MAJALENGKA', 11000),
(3211, 32, 'KABUPATEN SUMEDANG', 11000),
(3212, 32, 'KABUPATEN INDRAMAYU', 11000),
(3213, 32, 'KABUPATEN SUBANG', 11000),
(3214, 32, 'KABUPATEN PURWAKARTA', 11000),
(3215, 32, 'KABUPATEN KARAWANG', 11000),
(3216, 32, 'KABUPATEN BEKASI', 11000),
(3217, 32, 'KABUPATEN BANDUNG BARAT', 11000),
(3218, 32, 'KABUPATEN PANGANDARAN', 11000),
(3271, 32, 'KOTA BOGOR', 11000),
(3272, 32, 'KOTA SUKABUMI', 11000),
(3273, 32, 'KOTA BANDUNG', 11000),
(3274, 32, 'KOTA CIREBON', 11000),
(3275, 32, 'KOTA BEKASI', 11000),
(3276, 32, 'KOTA DEPOK', 11000),
(3277, 32, 'KOTA CIMAHI', 11000),
(3278, 32, 'KOTA TASIKMALAYA', 11000),
(3279, 32, 'KOTA BANJAR', 11000),
(3301, 33, 'KABUPATEN CILACAP', 11000),
(3302, 33, 'KABUPATEN BANYUMAS', 21000),
(3303, 33, 'KABUPATEN PURBALINGGA', 21000),
(3304, 33, 'KABUPATEN BANJARNEGARA', 21000),
(3305, 33, 'KABUPATEN KEBUMEN', 21000),
(3306, 33, 'KABUPATEN PURWOREJO', 21000),
(3307, 33, 'KABUPATEN WONOSOBO', 21000),
(3308, 33, 'KABUPATEN MAGELANG', 21000),
(3309, 33, 'KABUPATEN BOYOLALI', 21000),
(3310, 33, 'KABUPATEN KLATEN', 21000),
(3311, 33, 'KABUPATEN SUKOHARJO', 21000),
(3312, 33, 'KABUPATEN WONOGIRI', 21000),
(3313, 33, 'KABUPATEN KARANGANYAR', 21000),
(3314, 33, 'KABUPATEN SRAGEN', 21000),
(3315, 33, 'KABUPATEN GROBOGAN', 21000),
(3316, 33, 'KABUPATEN BLORA', 21000),
(3317, 33, 'KABUPATEN REMBANG', 21000),
(3318, 33, 'KABUPATEN PATI', 21000),
(3319, 33, 'KABUPATEN KUDUS', 21000),
(3320, 33, 'KABUPATEN JEPARA', 21000),
(3321, 33, 'KABUPATEN DEMAK', 21000),
(3322, 33, 'KABUPATEN SEMARANG', 27000),
(3323, 33, 'KABUPATEN TEMANGGUNG', 27000),
(3324, 33, 'KABUPATEN KENDAL', 27000),
(3325, 33, 'KABUPATEN BATANG', 27000),
(3326, 33, 'KABUPATEN PEKALONGAN', 27000),
(3327, 33, 'KABUPATEN PEMALANG', 27000),
(3328, 33, 'KABUPATEN TEGAL', 27000),
(3329, 33, 'KABUPATEN BREBES', 27000),
(3371, 33, 'KOTA MAGELANG', 27000),
(3372, 33, 'KOTA SURAKARTA', 27000),
(3373, 33, 'KOTA SALATIGA', 27000),
(3374, 33, 'KOTA SEMARANG', 27000),
(3375, 33, 'KOTA PEKALONGAN', 27000),
(3376, 33, 'KOTA TEGAL', 27000),
(3401, 34, 'KABUPATEN KULON PROGO', 27000),
(3402, 34, 'KABUPATEN BANTUL', 27000),
(3403, 34, 'KABUPATEN GUNUNG KIDUL', 27000),
(3404, 34, 'KABUPATEN SLEMAN', 27000),
(3471, 34, 'KOTA YOGYAKARTA', 18000),
(3501, 35, 'KABUPATEN PACITAN', 18000),
(3502, 35, 'KABUPATEN PONOROGO', 18000),
(3503, 35, 'KABUPATEN TRENGGALEK', 18000),
(3504, 35, 'KABUPATEN TULUNGAGUNG', 18000),
(3505, 35, 'KABUPATEN BLITAR', 18000),
(3506, 35, 'KABUPATEN KEDIRI', 18000),
(3507, 35, 'KABUPATEN MALANG', 18000),
(3508, 35, 'KABUPATEN LUMAJANG', 18000),
(3509, 35, 'KABUPATEN JEMBER', 18000),
(3510, 35, 'KABUPATEN BANYUWANGI', 18000),
(3511, 35, 'KABUPATEN BONDOWOSO', 18000),
(3512, 35, 'KABUPATEN SITUBONDO', 18000),
(3513, 35, 'KABUPATEN PROBOLINGGO', 18000),
(3514, 35, 'KABUPATEN PASURUAN', 18000),
(3515, 35, 'KABUPATEN SIDOARJO', 18000),
(3516, 35, 'KABUPATEN MOJOKERTO', 18000),
(3517, 35, 'KABUPATEN JOMBANG', 18000),
(3518, 35, 'KABUPATEN NGANJUK', 18000),
(3519, 35, 'KABUPATEN MADIUN', 18000),
(3520, 35, 'KABUPATEN MAGETAN', 18000),
(3521, 35, 'KABUPATEN NGAWI', 18000),
(3522, 35, 'KABUPATEN BOJONEGORO', 18000),
(3523, 35, 'KABUPATEN TUBAN', 18000),
(3524, 35, 'KABUPATEN LAMONGAN', 18000),
(3525, 35, 'KABUPATEN GRESIK', 18000),
(3526, 35, 'KABUPATEN BANGKALAN', 18000),
(3527, 35, 'KABUPATEN SAMPANG', 18000),
(3528, 35, 'KABUPATEN PAMEKASAN', 18000),
(3529, 35, 'KABUPATEN SUMENEP', 18000),
(3571, 35, 'KOTA KEDIRI', 18000),
(3572, 35, 'KOTA BLITAR', 18000),
(3573, 35, 'KOTA MALANG', 18000),
(3574, 35, 'KOTA PROBOLINGGO', 18000),
(3575, 35, 'KOTA PASURUAN', 18000),
(3576, 35, 'KOTA MOJOKERTO', 18000),
(3577, 35, 'KOTA MADIUN', 18000),
(3578, 35, 'KOTA SURABAYA', 18000),
(3579, 35, 'KOTA BATU', 18000),
(3601, 36, 'KABUPATEN PANDEGLANG', 9000),
(3602, 36, 'KABUPATEN LEBAK', 9000),
(3603, 36, 'KABUPATEN TANGERANG', 9000),
(3604, 36, 'KABUPATEN SERANG', 9000),
(3671, 36, 'KOTA TANGERANG', 9000),
(3672, 36, 'KOTA CILEGON', 9000),
(3673, 36, 'KOTA SERANG', 9000),
(3674, 36, 'KOTA TANGERANG SELATAN', 9000),
(5101, 51, 'KABUPATEN JEMBRANA', 22000),
(5102, 51, 'KABUPATEN TABANAN', 22000),
(5103, 51, 'KABUPATEN BADUNG', 22000),
(5104, 51, 'KABUPATEN GIANYAR', 22000),
(5105, 51, 'KABUPATEN KLUNGKUNG', 22000),
(5106, 51, 'KABUPATEN BANGLI', 22000),
(5107, 51, 'KABUPATEN KARANG ASEM', 22000),
(5108, 51, 'KABUPATEN BULELENG', 22000),
(5171, 51, 'KOTA DENPASAR', 22000),
(5201, 52, 'KABUPATEN LOMBOK BARAT', 37000),
(5202, 52, 'KABUPATEN LOMBOK TENGAH', 37000),
(5203, 52, 'KABUPATEN LOMBOK TIMUR', 37000),
(5204, 52, 'KABUPATEN SUMBAWA', 37000),
(5205, 52, 'KABUPATEN DOMPU', 37000),
(5206, 52, 'KABUPATEN BIMA', 37000),
(5207, 52, 'KABUPATEN SUMBAWA BARAT', 37000),
(5208, 52, 'KABUPATEN LOMBOK UTARA', 37000),
(5271, 52, 'KOTA MATARAM', 37000),
(5272, 52, 'KOTA BIMA', 37000),
(5301, 53, 'KABUPATEN SUMBA BARAT', 55000),
(5302, 53, 'KABUPATEN SUMBA TIMUR', 55000),
(5303, 53, 'KABUPATEN KUPANG', 55000),
(5304, 53, 'KABUPATEN TIMOR TENGAH SELATAN', 55000),
(5305, 53, 'KABUPATEN TIMOR TENGAH UTARA', 55000),
(5306, 53, 'KABUPATEN BELU', 55000),
(5307, 53, 'KABUPATEN ALOR', 55000),
(5308, 53, 'KABUPATEN LEMBATA', 55000),
(5309, 53, 'KABUPATEN FLORES TIMUR', 55000),
(5310, 53, 'KABUPATEN SIKKA', 55000),
(5311, 53, 'KABUPATEN ENDE', 55000),
(5312, 53, 'KABUPATEN NGADA', 55000),
(5313, 53, 'KABUPATEN MANGGARAI', 55000),
(5314, 53, 'KABUPATEN ROTE NDAO', 55000),
(5315, 53, 'KABUPATEN MANGGARAI BARAT', 55000),
(5316, 53, 'KABUPATEN SUMBA TENGAH', 55000),
(5317, 53, 'KABUPATEN SUMBA BARAT DAYA', 55000),
(5318, 53, 'KABUPATEN NAGEKEO', 55000),
(5319, 53, 'KABUPATEN MANGGARAI TIMUR', 55000),
(5320, 53, 'KABUPATEN SABU RAIJUA', 55000),
(5321, 53, 'KABUPATEN MALAKA', 55000),
(5371, 53, 'KOTA KUPANG', 55000),
(6101, 61, 'KABUPATEN SAMBAS', 65000),
(6102, 61, 'KABUPATEN BENGKAYANG', 65000),
(6103, 61, 'KABUPATEN LANDAK', 65000),
(6104, 61, 'KABUPATEN MEMPAWAH', 65000),
(6105, 61, 'KABUPATEN SANGGAU', 65000),
(6106, 61, 'KABUPATEN KETAPANG', 65000),
(6107, 61, 'KABUPATEN SINTANG', 65000),
(6108, 61, 'KABUPATEN KAPUAS HULU', 65000),
(6109, 61, 'KABUPATEN SEKADAU', 65000),
(6110, 61, 'KABUPATEN MELAWI', 65000),
(6111, 61, 'KABUPATEN KAYONG UTARA', 65000),
(6112, 61, 'KABUPATEN KUBU RAYA', 65000),
(6171, 61, 'KOTA PONTIANAK', 65000),
(6172, 61, 'KOTA SINGKAWANG', 65000),
(6201, 62, 'KABUPATEN KOTAWARINGIN BARAT', 65000),
(6202, 62, 'KABUPATEN KOTAWARINGIN TIMUR', 65000),
(6203, 62, 'KABUPATEN KAPUAS', 65000),
(6204, 62, 'KABUPATEN BARITO SELATAN', 65000),
(6205, 62, 'KABUPATEN BARITO UTARA', 65000),
(6206, 62, 'KABUPATEN SUKAMARA', 65000),
(6207, 62, 'KABUPATEN LAMANDAU', 65000),
(6208, 62, 'KABUPATEN SERUYAN', 65000),
(6209, 62, 'KABUPATEN KATINGAN', 65000),
(6210, 62, 'KABUPATEN PULANG PISAU', 65000),
(6211, 62, 'KABUPATEN GUNUNG MAS', 65000),
(6212, 62, 'KABUPATEN BARITO TIMUR', 65000),
(6213, 62, 'KABUPATEN MURUNG RAYA', 65000),
(6271, 62, 'KOTA PALANGKA RAYA', 33000),
(6301, 63, 'KABUPATEN TANAH LAUT', 33000),
(6302, 63, 'KABUPATEN KOTA BARU', 33000),
(6303, 63, 'KABUPATEN BANJAR', 33000),
(6304, 63, 'KABUPATEN BARITO KUALA', 33000),
(6305, 63, 'KABUPATEN TAPIN', 33000),
(6306, 63, 'KABUPATEN HULU SUNGAI SELATAN', 33000),
(6307, 63, 'KABUPATEN HULU SUNGAI TENGAH', 33000),
(6308, 63, 'KABUPATEN HULU SUNGAI UTARA', 33000),
(6309, 63, 'KABUPATEN TABALONG', 33000),
(6310, 63, 'KABUPATEN TANAH BUMBU', 33000),
(6311, 63, 'KABUPATEN BALANGAN', 33000),
(6371, 63, 'KOTA BANJARMASIN', 33000),
(6372, 63, 'KOTA BANJAR BARU', 33000),
(6401, 64, 'KABUPATEN PASER', 40000),
(6402, 64, 'KABUPATEN KUTAI BARAT', 40000),
(6403, 64, 'KABUPATEN KUTAI KARTANEGARA', 40000),
(6404, 64, 'KABUPATEN KUTAI TIMUR', 40000),
(6405, 64, 'KABUPATEN BERAU', 40000),
(6409, 64, 'KABUPATEN PENAJAM PASER UTARA', 40000),
(6411, 64, 'KABUPATEN MAHAKAM HULU', 40000),
(6471, 64, 'KOTA BALIKPAPAN', 40000),
(6472, 64, 'KOTA SAMARINDA', 40000),
(6474, 64, 'KOTA BONTANG', 40000),
(6501, 65, 'KABUPATEN MALINAU', 40000),
(6502, 65, 'KABUPATEN BULUNGAN', 40000),
(6503, 65, 'KABUPATEN TANA TIDUNG', 40000),
(6504, 65, 'KABUPATEN NUNUKAN', 40000),
(6571, 65, 'KOTA TARAKAN', 40000),
(7101, 71, 'KABUPATEN BOLAANG MONGONDOW', 47000),
(7102, 71, 'KABUPATEN MINAHASA', 47000),
(7103, 71, 'KABUPATEN KEPULAUAN SANGIHE', 47000),
(7104, 71, 'KABUPATEN KEPULAUAN TALAUD', 47000),
(7105, 71, 'KABUPATEN MINAHASA SELATAN', 47000),
(7106, 71, 'KABUPATEN MINAHASA UTARA', 47000),
(7107, 71, 'KABUPATEN BOLAANG MONGONDOW UTARA', 47000),
(7108, 71, 'KABUPATEN SIAU TAGULANDANG BIARO', 47000),
(7109, 71, 'KABUPATEN MINAHASA TENGGARA', 47000),
(7110, 71, 'KABUPATEN BOLAANG MONGONDOW SELATAN', 47000),
(7111, 71, 'KABUPATEN BOLAANG MONGONDOW TIMUR', 47000),
(7171, 71, 'KOTA MANADO', 47000),
(7172, 71, 'KOTA BITUNG', 47000),
(7173, 71, 'KOTA TOMOHON', 47000),
(7174, 71, 'KOTA KOTAMOBAGU', 47000),
(7201, 72, 'KABUPATEN BANGGAI KEPULAUAN', 44000),
(7202, 72, 'KABUPATEN BANGGAI', 44000),
(7203, 72, 'KABUPATEN MOROWALI', 44000),
(7204, 72, 'KABUPATEN POSO', 44000),
(7205, 72, 'KABUPATEN DONGGALA', 44000),
(7206, 72, 'KABUPATEN TOLI-TOLI', 44000),
(7207, 72, 'KABUPATEN BUOL', 44000),
(7208, 72, 'KABUPATEN PARIGI MOUTONG', 44000),
(7209, 72, 'KABUPATEN TOJO UNA-UNA', 44000),
(7210, 72, 'KABUPATEN SIGI', 44000),
(7211, 72, 'KABUPATEN BANGGAI LAUT', 44000),
(7212, 72, 'KABUPATEN MOROWALI UTARA', 44000),
(7271, 72, 'KOTA PALU', 44000),
(7301, 73, 'KABUPATEN KEPULAUAN SELAYAR', 44000),
(7302, 73, 'KABUPATEN BULUKUMBA', 44000),
(7303, 73, 'KABUPATEN BANTAENG', 44000),
(7304, 73, 'KABUPATEN JENEPONTO', 44000),
(7305, 73, 'KABUPATEN TAKALAR', 44000),
(7306, 73, 'KABUPATEN GOWA', 44000),
(7307, 73, 'KABUPATEN SINJAI', 44000),
(7308, 73, 'KABUPATEN MAROS', 44000),
(7309, 73, 'KABUPATEN PANGKAJENE DAN KEPULAUAN', 44000),
(7310, 73, 'KABUPATEN BARRU', 44000),
(7311, 73, 'KABUPATEN BONE', 44000),
(7312, 73, 'KABUPATEN SOPPENG', 44000),
(7313, 73, 'KABUPATEN WAJO', 44000),
(7314, 73, 'KABUPATEN SIDENRENG RAPPANG', 44000),
(7315, 73, 'KABUPATEN PINRANG', 44000),
(7316, 73, 'KABUPATEN ENREKANG', 44000),
(7317, 73, 'KABUPATEN LUWU', 36000),
(7318, 73, 'KABUPATEN TANA TORAJA', 36000),
(7322, 73, 'KABUPATEN LUWU UTARA', 36000),
(7325, 73, 'KABUPATEN LUWU TIMUR', 36000),
(7326, 73, 'KABUPATEN TORAJA UTARA', 36000),
(7371, 73, 'KOTA MAKASSAR', 36000),
(7372, 73, 'KOTA PAREPARE', 36000),
(7373, 73, 'KOTA PALOPO', 36000),
(7401, 74, 'KABUPATEN BUTON', 36000),
(7402, 74, 'KABUPATEN MUNA', 36000),
(7403, 74, 'KABUPATEN KONAWE', 36000),
(7404, 74, 'KABUPATEN KOLAKA', 36000),
(7405, 74, 'KABUPATEN KONAWE SELATAN', 36000),
(7406, 74, 'KABUPATEN BOMBANA', 36000),
(7407, 74, 'KABUPATEN WAKATOBI', 36000),
(7408, 74, 'KABUPATEN KOLAKA UTARA', 36000),
(7409, 74, 'KABUPATEN BUTON UTARA', 36000),
(7410, 74, 'KABUPATEN KONAWE UTARA', 36000),
(7411, 74, 'KABUPATEN KOLAKA TIMUR', 36000),
(7412, 74, 'KABUPATEN KONAWE KEPULAUAN', 36000),
(7413, 74, 'KABUPATEN MUNA BARAT', 36000),
(7414, 74, 'KABUPATEN BUTON TENGAH', 36000),
(7415, 74, 'KABUPATEN BUTON SELATAN', 36000),
(7471, 74, 'KOTA KENDARI', 36000),
(7472, 74, 'KOTA BAUBAU', 36000),
(7501, 75, 'KABUPATEN BOALEMO', 36000),
(7502, 75, 'KABUPATEN GORONTALO', 36000),
(7503, 75, 'KABUPATEN POHUWATO', 36000),
(7504, 75, 'KABUPATEN BONE BOLANGO', 36000),
(7505, 75, 'KABUPATEN GORONTALO UTARA', 36000),
(7571, 75, 'KOTA GORONTALO', 36000),
(7601, 76, 'KABUPATEN MAJENE', 36000),
(7602, 76, 'KABUPATEN POLEWALI MANDAR', 36000),
(7603, 76, 'KABUPATEN MAMASA', 36000),
(7604, 76, 'KABUPATEN MAMUJU', 36000),
(7605, 76, 'KABUPATEN MAMUJU UTARA', 36000),
(7606, 76, 'KABUPATEN MAMUJU TENGAH', 36000),
(8101, 81, 'KABUPATEN MALUKU TENGGARA BARAT', 36000),
(8102, 81, 'KABUPATEN MALUKU TENGGARA', 36000),
(8103, 81, 'KABUPATEN MALUKU TENGAH', 36000),
(8104, 81, 'KABUPATEN BURU', 36000),
(8105, 81, 'KABUPATEN KEPULAUAN ARU', 36000),
(8106, 81, 'KABUPATEN SERAM BAGIAN BARAT', 36000),
(8107, 81, 'KABUPATEN SERAM BAGIAN TIMUR', 36000),
(8108, 81, 'KABUPATEN MALUKU BARAT DAYA', 36000),
(8109, 81, 'KABUPATEN BURU SELATAN', 36000),
(8171, 81, 'KOTA AMBON', 58000),
(8172, 81, 'KOTA TUAL', 58000),
(8201, 82, 'KABUPATEN HALMAHERA BARAT', 58000),
(8202, 82, 'KABUPATEN HALMAHERA TENGAH', 58000),
(8203, 82, 'KABUPATEN KEPULAUAN SULA', 58000),
(8204, 82, 'KABUPATEN HALMAHERA SELATAN', 58000),
(8205, 82, 'KABUPATEN HALMAHERA UTARA', 58000),
(8206, 82, 'KABUPATEN HALMAHERA TIMUR', 58000),
(8207, 82, 'KABUPATEN PULAU MOROTAI', 58000),
(8208, 82, 'KABUPATEN PULAU TALIABU', 58000),
(8271, 82, 'KOTA TERNATE', 58000),
(8272, 82, 'KOTA TIDORE KEPULAUAN', 58000),
(9101, 91, 'KABUPATEN FAKFAK', 58000),
(9102, 91, 'KABUPATEN KAIMANA', 58000),
(9103, 91, 'KABUPATEN TELUK WONDAMA', 58000),
(9104, 91, 'KABUPATEN TELUK BINTUNI', 58000),
(9105, 91, 'KABUPATEN MANOKWARI', 58000),
(9106, 91, 'KABUPATEN SORONG SELATAN', 58000),
(9107, 91, 'KABUPATEN SORONG', 58000),
(9108, 91, 'KABUPATEN RAJA AMPAT', 58000),
(9109, 91, 'KABUPATEN TAMBRAUW', 58000),
(9110, 91, 'KABUPATEN MAYBRAT', 58000),
(9111, 91, 'KABUPATEN MANOKWARI SELATAN', 58000),
(9112, 91, 'KABUPATEN PEGUNUNGAN ARFAK', 58000),
(9171, 91, 'KOTA SORONG', 58000),
(9401, 94, 'KABUPATEN MERAUKE', 58000),
(9402, 94, 'KABUPATEN JAYAWIJAYA', 58000),
(9403, 94, 'KABUPATEN JAYAPURA', 58000),
(9404, 94, 'KABUPATEN NABIRE', 58000),
(9408, 94, 'KABUPATEN KEPULAUAN YAPEN', 58000),
(9409, 94, 'KABUPATEN BIAK NUMFOR', 58000),
(9410, 94, 'KABUPATEN PANIAI', 58000),
(9411, 94, 'KABUPATEN PUNCAK JAYA', 58000),
(9412, 94, 'KABUPATEN MIMIKA', 58000),
(9413, 94, 'KABUPATEN BOVEN DIGOEL', 58000),
(9414, 94, 'KABUPATEN MAPPI', 58000),
(9415, 94, 'KABUPATEN ASMAT', 58000),
(9416, 94, 'KABUPATEN YAHUKIMO', 58000),
(9417, 94, 'KABUPATEN PEGUNUNGAN BINTANG', 58000),
(9418, 94, 'KABUPATEN TOLIKARA', 58000),
(9419, 94, 'KABUPATEN SARMI', 58000),
(9420, 94, 'KABUPATEN KEEROM', 58000),
(9426, 94, 'KABUPATEN WAROPEN', 58000),
(9427, 94, 'KABUPATEN SUPIORI', 58000),
(9428, 94, 'KABUPATEN MAMBERAMO RAYA', 58000),
(9429, 94, 'KABUPATEN NDUGA', 58000),
(9430, 94, 'KABUPATEN LANNY JAYA', 58000),
(9431, 94, 'KABUPATEN MAMBERAMO TENGAH', 58000),
(9432, 94, 'KABUPATEN YALIMO', 58000),
(9433, 94, 'KABUPATEN PUNCAK', 58000),
(9434, 94, 'KABUPATEN DOGIYAI', 58000),
(9435, 94, 'KABUPATEN INTAN JAYA', 58000),
(9436, 94, 'KABUPATEN DEIYAI', 58000),
(9471, 94, 'KOTA JAYAPURA', 58000);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_name`, `coupon_discount`, `coupon_total`, `coupon_used`, `redeem_point`, `coupon_date_start`, `coupon_date_end`, `coupon_status`) VALUES
(5, 'Ramadhan Ceria', 25, 100, 0, 20, '2016-06-06 00:00:00', '2016-06-30 00:00:00', 10),
(6, 'Grand Opening', 15, 100, 0, 15, '2016-06-01 00:00:00', '2016-06-30 00:00:00', 10),
(7, 'Ecommerce day', 30, 700, 1, 30, '2016-06-02 00:00:00', '2016-06-30 00:00:00', 10);

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
(7, 5, 'NGl0', 10);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_dob`, `customer_gender`, `customer_telephone`, `customer_address`, `customer_reward_point`, `username`, `email`, `auth_key`, `password_hash`, `password_reset_token`, `created_at`, `updated_at`, `status`, `newsletter`) VALUES
(5, 'Eko Radityo Leonan', '1993-07-06', 10, '0123456789', 'Jl. Cendrawasih No.16', 70, 'ekoradityo', 'tierous@gmail.com', 'dECexoylIuUgB8nu6hCXeqwaSyNRSeXw', '$2y$13$slDYgUB7dmFAmEetg.gkOu72MhzldxtkcYWz.otf2CifzttEjEmSW', NULL, 1466961694, 1466977275, 10, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `deal`
--

CREATE TABLE IF NOT EXISTS `deal` (
  `deal_id` int(11) NOT NULL,
  `deal_name` varchar(64) NOT NULL,
  `deal_date_start` date DEFAULT NULL,
  `deal_date_end` date DEFAULT NULL,
  `deal_category_id` int(11) NOT NULL,
  `discount_value` int(11) DEFAULT NULL,
  `get_quantity` int(11) DEFAULT NULL,
  `quantity_threeshold` int(11) DEFAULT NULL,
  `sum_threeshold` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `deal`
--

INSERT INTO `deal` (`deal_id`, `deal_name`, `deal_date_start`, `deal_date_end`, `deal_category_id`, `discount_value`, `get_quantity`, `quantity_threeshold`, `sum_threeshold`) VALUES
(4, 'Back to School', '2016-06-01', '2016-06-30', 1, 15, NULL, NULL, NULL),
(5, 'Smartphone Vaganza', '2016-06-01', '2016-06-30', 2, NULL, 2, 1, NULL),
(6, 'Notebook Day', '2016-06-01', '2016-06-30', 3, 20, NULL, 2, NULL),
(7, 'Apparel Mania', '2016-06-01', '2016-06-30', 4, 30, NULL, NULL, 500000);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `delivery_address`
--

INSERT INTO `delivery_address` (`delivery_address_id`, `customer_id`, `city_id`, `delivery_address_name`, `delivery_address_address`) VALUES
(25, 5, 3274, 'Eko Radityo Leonan', 'Jl. Cendrawasih No.16 - KOTA CIREBON');

-- --------------------------------------------------------

--
-- Struktur dari tabel `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `manufacturer_id` int(11) NOT NULL,
  `manufacturer_name` varchar(64) NOT NULL,
  `manufacturer_address` text NOT NULL,
  `manufacturer_telephone` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `manufacturer_name`, `manufacturer_address`, `manufacturer_telephone`) VALUES
(3, 'Samsung', 'Samsung Street, Industrial Disctrict, Singapore', '+4698744415'),
(5, 'LG', 'LG Street, Korea', '+8946781155'),
(6, 'Sony', 'Sony Street, Japan', '+4769778250'),
(7, 'Apple', 'Apple Street, California US', '+33755009855'),
(8, 'Mircrosoft', 'Microsoft Street, California', '+475547940'),
(9, 'Xiaomi', 'Xiaomi Street, Beijing China', '+69218122215'),
(10, 'Acer', 'Acer Street, Guangzou China', '+6911112522'),
(11, 'Lenovo', 'Lenovo Street, Beijing China', '+6978454541'),
(12, 'Asus', 'Asus Street, China', '+697884455'),
(13, 'Dell', 'Dell Street, USA', '+775468516100'),
(14, 'Nike', 'Nike Street, USA', '+7754681561561'),
(15, 'Enam Saudara', 'Enam Saudara Street, Yogyakarta', '+8135484156');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `newsletter`
--

INSERT INTO `newsletter` (`newsletter_id`, `product_id`, `newsletter_title`, `newsletter_message`) VALUES
(5, 38, 'New Product', 'New Product From Apple, buy at our store');

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
('cG-1', '2016-06-27 04:45:10', 0, 0, NULL, 'NGl0', 25, 5, NULL, 13000000),
('uAaj', '2016-06-27 04:31:59', 20, 10, NULL, NULL, 25, 5, 1, 742000);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order_list`
--

INSERT INTO `order_list` (`order_list_id`, `order_code`, `product_id`, `product_options_id`, `product_options_name`, `product_options_price`, `quantity`, `subtotal`, `deal_id`, `deal_category_id`, `deal_discount`, `deal_quantity`, `deal_quantity_threeshold`, `coupon_id`, `coupon_code`, `coupon_discount`) VALUES
(4, 'uAaj', 52, 37, 'default', 0, 1, 90000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'uAaj', 51, 36, 'default', 0, 1, 260000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'uAaj', 50, 35, 'default', 0, 2, 560000, 7, 4, 30, NULL, NULL, NULL, NULL, NULL),
(7, 'cG-1', 38, 38, '32GB Internal', 2000000, 1, 11000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payment_conf`
--

INSERT INTO `payment_conf` (`payment_conf_id`, `order_code`, `bank_transfer_id`, `payment_conf_name`, `payment_conf_account`, `payment_conf_nominal`) VALUES
(4, 'uAaj', 9, 'Eko Radityo Leonan', '0124464746', 753000);

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `product_category_id`, `manufacturer_id`, `product_name`, `product_model`, `product_price`, `product_description`, `product_image`, `product_reward_point`, `deal_deal_id`, `deal_category_id`, `product_status`) VALUES
(38, 4, 7, 'APPLE iPhone 6', 'SKU00115610', 11000000, '4.7 inch Multi-Touch display (Retina HD Display)\r\nGSM/HSDPA/LTE Wi-Fi/Bluetooth\r\n8MP + 1.2MP Camera\r\niOS 8\r\nApple A8 Dual-core 1.4 GHz Cyclone (ARM v8-based)\r\n8GB Internal\r\n', 'Iphone 6.jpg', 110, NULL, NULL, 10),
(39, 4, 8, 'Microsoft Lumia 535', 'SKU00015006', 6300000, 'Qualcomm Snapdragon 200 Quad-core 1.2 GHz\r\n5.0" IPS LCD capacitive touchscreen\r\nGSM\r\nBluetooth\r\nAudio\r\n8 GB\r\nWi-Fi\r\nQuad Band\r\n16M colors\r\nHSPA\r\nCamera\r\nVideo\r\n1 GB RAM\r\nWindows Phone 8.1', 'Microsoft Lumia 535.jpg', 63, NULL, NULL, 10),
(40, 4, 9, 'XIAOMI Mi4i LTE', 'SKU03715799', 2500000, 'Snapdragon™ 615 Octa-core 1.7GHz\r\n5.0 inch\r\n16GB Storage\r\n2GB RAM\r\nCamera 13MP+5MP\r\nBattery 3120mAh\r\nDual SIM\r\nWifi\r\nBluetooth\r\n4G LTE\r\nAndroid OS v5.0.2 Lollipop', 'XIAOMI Mi4i LTE.jpg', 25, 5, 2, 10),
(41, 4, 6, 'SONY Xperia Z3+', 'SKU04215009', 9500000, 'Qualcomm Snapdragon 810 (MSM8994)\r\n5.2 inch\r\n32GB Storage\r\n3GB RAM\r\nCamera 20.7MP+5MP\r\nWifi\r\nBluetooth v4.1\r\nNFC\r\nLTE\r\nBattery 2930mAh\r\nDual SIM\r\nAndroid OS 5.0 Lollipop\r\n', 'SONY Xperia Z3+.jpg', 95, NULL, NULL, 10),
(42, 4, 10, 'ACER Liquid X1 LTE', 'SKU01115712', 2400000, 'Mediatek MT6592\r\nOcta-core 1.7 GHz Cortex-A7 \r\n5.7 inch\r\n16GB Storag\r\n 2GB RAM\r\nCamera 13MP+2MP\r\nBattery 2700 mAh\r\nWi-Fi\r\nFM radio\r\nCorning Gorilla Glass 3\r\nLTE\r\nAndroid OS v4.4.2 KitKat', 'ACER Liquid X1 LTE.jpg', 24, NULL, NULL, 10),
(43, 5, 11, 'LENOVO IdeaPad G40-80', 'SKU01616210', 10500000, 'Intel Core i7-5500U\r\n4GB DDR3\r\n1TB HDD\r\nDVD±RW\r\nBluetooth\r\nWifi\r\nNIC\r\nVGA\r\nAMD Radeon R5-M330 2GB\r\nCamera\r\n14"', 'LENOVO IdeaPad G40-80.jpg', 105, NULL, NULL, 10),
(44, 5, 12, 'ASUS Notebook X200MA', 'SKU07315911', 2900000, 'Intel Celeron N2840\r\n2GB DDR3\r\n500GB HDD\r\nWiFi\r\nVGA Intel HD Graphics \r\nCamera\r\n11.6" WXGA', 'ASUS Notebook X200MA-KX636D.jpg', 29, 4, 1, 10),
(45, 5, 13, 'DELL Inspiron 14 7447', 'SKU01116574', 13400000, 'Intel Core i7-4720HQ\r\n8GB (2x4GB)DDR3\r\n1TB HDD\r\nDVD±RW\r\nNIC\r\nWiFi\r\nBluetooth\r\nVGA Nvidia GeForce GTX950M 4GB\r\nCamera 14" HD', 'DELL Inspiron 14 7447.jpg', 134, NULL, NULL, 10),
(46, 5, 12, 'ASUS Chromebook C201PA', 'SKU02316571', 3000000, 'Rockchip Quad-Core RK3288C\r\n4GB DDR3\r\n16GB EMMC\r\nVGA Integrated Rockchip® Mali T764\r\nWifi\r\nBluetooth\r\nNIC\r\nLAN\r\n11.6" WXGA\r\nChrome OS', 'ASUS Chromebook C201PA.jpg', 30, 6, 3, 10),
(47, 5, 13, 'DELL Vostro 14 5480', 'SKU09715689', 7000000, 'Intel Core i3-4005U\r\n4GB DDR3\r\n500GB HDD\r\nWifi\r\nBluetooth\r\nVGA Nvidia GeForce 830M\r\nNIC\r\n14 inch\r\nNon OS\r\n', 'DELL Vostro 14 5480.jpg', 70, NULL, NULL, 10),
(48, 3, 14, 'NIKE Cruiser V-NK  Women', 'SKU00414432', 300000, 'Womens Running Jersey\r\nShort Sleve\r\nPolyesther\r\nSize S', 'NIKE Cruiser V-NK SS Run Swoosh Women.jpg', 3, NULL, NULL, 10),
(49, 3, 14, 'NIKE Cruiser V-NK SS Women', 'SKU00414427', 300000, 'Running Jersey\r\nShort Sleve\r\nPolyesther\r\nSize S', 'NIKE Cruiser V-NK SS Women.jpg', 3, NULL, NULL, 10),
(50, 3, 14, 'NIKE Pro SS V-Neck Women', 'SKU00415134', 280000, 'Woman Running Jersey\r\nShort Sleve V Neck\r\n84% Polyester\r\n16% Elastane\r\nTop', 'NIKE Pro SS V-Neck Women.jpg', 3, 7, 4, 10),
(51, 2, 14, 'NIKE CBF Core Crest', 'SKU01215062', 260000, 'Polyster\r\nSize M\r\n', 'NIKE CBF Core Crest.jpg', 3, NULL, NULL, 10),
(52, 2, 15, 'ENAM SAUDARA Batik Halus Ely Natural', 'SKU06315004', 90000, 'Baju Batik Bahan: Katun\r\nLingkar Dada: 56 cm (diukur secara datar)\r\nPanjang: 75 cm', 'ENAM SAUDARA Batik Halus Ely Natural.jpg', 1, NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `product_category_id` int(11) NOT NULL,
  `product_category_name` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `product_category_name`) VALUES
(2, 'Men Clothes'),
(3, 'Women Clothes'),
(4, 'Smartphone'),
(5, 'Notebook');

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
  `product_options_tier` int(11) NOT NULL,
  `product_options_text` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_options`
--

INSERT INTO `product_options` (`product_options_id`, `product_id`, `product_options_name`, `product_options_description`, `product_options_price`, `product_options_tier`, `product_options_text`) VALUES
(22, 38, 'default', 'default', 0, 0, NULL),
(23, 38, '16GB Internal', 'Iphone 6 with 16Gb Internal', 1000000, 1, '16GB Internal | 1000000'),
(24, 39, 'default', 'default', 0, 0, NULL),
(25, 40, 'default', 'default', 0, 0, NULL),
(26, 41, 'default', 'default', 0, 0, NULL),
(27, 42, 'default', 'default', 0, 0, NULL),
(28, 43, 'default', 'default', 0, 0, NULL),
(29, 44, 'default', 'default', 0, 0, NULL),
(30, 45, 'default', 'default', 0, 0, NULL),
(31, 46, 'default', 'default', 0, 0, NULL),
(32, 47, 'default', 'default', 0, 0, NULL),
(33, 48, 'default', 'default', 0, 0, NULL),
(34, 49, 'default', 'default', 0, 0, NULL),
(35, 50, 'default', 'default', 0, 0, NULL),
(36, 51, 'default', 'default', 0, 0, NULL),
(37, 52, 'default', 'default', 0, 0, NULL),
(38, 38, '32GB Internal', '32 Gb Internal', 2000000, 2, '32GB Internal | 2000000'),
(39, 39, 'ScreenGuard', 'ScreenGuard', 150000, 1, 'ScreenGuard | 150000'),
(40, 43, '8GB RAM', '8GB RAM', 1000000, 1, '8GB RAM | 1000000'),
(41, 43, '16GB RAM', '16GB RAM', 1500000, 2, '16GB RAM | 1500000'),
(42, 47, 'Windows 8.1', 'Windows 8.1', 3700000, 1, 'Windows 8.1 | 3700000'),
(43, 48, 'Size M', 'Size M', 5000, 0, 'Size M | 5000'),
(44, 48, 'Size L', 'Size L', 10000, 0, 'Size L | 10000'),
(45, 49, 'Size M', 'Size M', 5000, 0, 'Size M | 5000'),
(46, 49, 'Size L', 'Size M', 10000, 0, 'Size L | 10000'),
(47, 51, 'Size L', 'Size L', 10000, 0, 'Size L | 10000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `province`
--

INSERT INTO `province` (`province_id`, `province_name`) VALUES
(11, 'ACEH'),
(12, 'SUMATERA UTARA'),
(13, 'SUMATERA BARAT'),
(14, 'RIAU'),
(15, 'JAMBI'),
(16, 'SUMATERA SELATAN'),
(17, 'BENGKULU'),
(18, 'LAMPUNG'),
(19, 'KEPULAUAN BANGKA BELITUNG'),
(21, 'KEPULAUAN RIAU'),
(31, 'DKI JAKARTA'),
(32, 'JAWA BARAT'),
(33, 'JAWA TENGAH'),
(34, 'DI YOGYAKARTA'),
(35, 'JAWA TIMUR'),
(36, 'BANTEN'),
(51, 'BALI'),
(52, 'NUSA TENGGARA BARAT'),
(53, 'NUSA TENGGARA TIMUR'),
(61, 'KALIMANTAN BARAT'),
(62, 'KALIMANTAN TENGAH'),
(63, 'KALIMANTAN SELATAN'),
(64, 'KALIMANTAN TIMUR'),
(65, 'KALIMANTAN UTARA'),
(71, 'SULAWESI UTARA'),
(72, 'SULAWESI TENGAH'),
(73, 'SULAWESI SELATAN'),
(74, 'SULAWESI TENGGARA'),
(75, 'GORONTALO'),
(76, 'SULAWESI BARAT'),
(81, 'MALUKU'),
(82, 'MALUKU UTARA'),
(91, 'PAPUA BARAT'),
(94, 'PAPUA');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `support_ticket_category`
--

CREATE TABLE IF NOT EXISTS `support_ticket_category` (
  `support_ticket_category_id` int(11) NOT NULL,
  `support_ticket_category_name` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `support_ticket_category`
--

INSERT INTO `support_ticket_category` (`support_ticket_category_id`, `support_ticket_category_name`) VALUES
(1, 'General'),
(2, 'Account'),
(3, 'Complain'),
(4, 'Payment');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `role`) VALUES
(1, 'eco', 'xxtEgdK4z7HbBtTGUy7p3kPWO1-IxdrN', '$2y$13$B.ADlENq1w22mhfpYwCU9OIZ2VspPMjJZAgRggR6xQml5EvJhyLRC', NULL, 'tierous@gmail.com', 10, 1455944144, 1463636858, 30),
(6, 'admin', 'dHOyMjQShh6h9s70Un9Cc2nj38IUvsq7', '$2y$13$U/ZauBBdszrp600yhpxeueTeicRZi3MtxBNbEAjZCX96LV081y5XS', NULL, 'admin@admin.com', 10, 1466935675, 1466935675, 20),
(7, 'admin2', 'PeNF5hQKqfM2tUHQIHrcbS4ytei_wJPg', '$2y$13$SPmwb6.fdubw.famnX9.VeRYngxC2m6ZKusifcpMd62/QI3s5tksm', NULL, 'admin2@admin2.com', 10, 1466935766, 1466935766, 20),
(8, 'admin3', 'fsIZoBGMUNEiR6R02EpyNSKvjSS5sBA6', '$2y$13$LxzMRyyp4enxaNO6f/9MKuZkc5icvMhW.hQJHaVeRZbpkCLIIjJ4q', NULL, 'admin3@admin3.com', 10, 1466935813, 1466935813, 20);

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
  MODIFY `bank_transfer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9472;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `deal`
--
ALTER TABLE `deal`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `deal_category`
--
ALTER TABLE `deal_category`
  MODIFY `deal_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `delivery_address`
--
ALTER TABLE `delivery_address`
  MODIFY `delivery_address_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `newsletter_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `omset`
--
ALTER TABLE `omset`
  MODIFY `omset_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_list_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payment_conf`
--
ALTER TABLE `payment_conf`
  MODIFY `payment_conf_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_options`
--
ALTER TABLE `product_options`
  MODIFY `product_options_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `support_ticket`
--
ALTER TABLE `support_ticket`
  MODIFY `support_ticket_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `support_ticket_category`
--
ALTER TABLE `support_ticket_category`
  MODIFY `support_ticket_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `support_ticket_message`
--
ALTER TABLE `support_ticket_message`
  MODIFY `support_ticket_message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
