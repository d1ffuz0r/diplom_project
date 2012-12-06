CREATE DATABASE IF NOT EXISTS `shop` /*!40100 DEFAULT CHARACTER SET cp1251 */;
USE `shop`;


CREATE TABLE IF NOT EXISTS `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(500) NOT NULL,
  `c_rusname` varchar(500) NOT NULL,
  `c_param` varchar(1000) NOT NULL,
  `c_etc` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;


CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `rusname` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;


CREATE TABLE IF NOT EXISTS `kurs` (
  `name` varchar(10) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;


CREATE TABLE IF NOT EXISTS `nds` (
  `value` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;


CREATE TABLE IF NOT EXISTS `orders` (
  `ord_id` int(10) DEFAULT NULL,
  `ord_username` varchar(50) DEFAULT NULL,
  `ord_product` int(10) DEFAULT NULL,
  `ord_realname` varchar(50) DEFAULT NULL,
  `ord_family` varchar(50) DEFAULT NULL,
  `ord_ot4estvo` varchar(50) DEFAULT NULL,
  `ord_email` varchar(50) DEFAULT NULL,
  `ord_telephone` int(20) DEFAULT NULL,
  `ord_country` varchar(50) DEFAULT NULL,
  `ord_region` varchar(50) DEFAULT NULL,
  `ord_city` varchar(50) DEFAULT NULL,
  `ord_postindex` varchar(50) DEFAULT NULL,
  `ord_typebuy` varchar(50) DEFAULT NULL,
  `ord_count` int(3) DEFAULT NULL,
  `ord_status` int(3) DEFAULT NULL,
  `ord_date` varchar(50) DEFAULT NULL,
  `ord_price` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;


CREATE TABLE IF NOT EXISTS `product` (
  `p_id` bigint(11) NOT NULL,
  `p_rusname` varchar(500) NOT NULL,
  `p_desc` varchar(5000) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_category` varchar(50) NOT NULL,
  `p_countsell` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;


CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `rusname` varchar(500) NOT NULL,
  `text` varchar(5000) NOT NULL,
  `image` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;


CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(40) NOT NULL,
  `u_password` varchar(40) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_data` varchar(100) NOT NULL,
  `u_allprice` int(100) NOT NULL,
  `u_rang` int(11) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;