-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: mfo
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addition_data`
--

DROP TABLE IF EXISTS `addition_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addition_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `add_document` enum('car','foreign','war','snils','inn') NOT NULL,
  `document_number` varchar(255) NOT NULL,
  `is_have_car` int(1) unsigned NOT NULL,
  `credit_amount` int(10) unsigned NOT NULL,
  `credit_period` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addition_data`
--


--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `get_region` varchar(255) NOT NULL,
  `get_city` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `building` varchar(255) NOT NULL,
  `apartment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

--
-- Table structure for table `card_data`
--

DROP TABLE IF EXISTS `card_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `card_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `number` int(10) unsigned NOT NULL,
  `exp_y` int(10) unsigned NOT NULL,
  `exp_m` smallint(5) unsigned NOT NULL,
  `cvv` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_data`
--

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `building` varchar(255) NOT NULL,
  `phone` int(10) unsigned NOT NULL,
  `prof_status` varchar(255) NOT NULL,
  `month_amount` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

--
-- Table structure for table `offer`
--

DROP TABLE IF EXISTS `offer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_active` tinyint(3) unsigned NOT NULL,
  `type` enum('partner','creditor') NOT NULL,
  `sort` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer`
--

LOCK TABLES `offer` WRITE;
/*!40000 ALTER TABLE `offer` DISABLE KEYS */;
INSERT INTO `offer` VALUES (1,'Супер кредитный сайт №1','http://site01.ru?super=1','1.png',1,'creditor',1),(2,'Супер кредитный сайт №22','http://site02.ru?super=22','2.png',1,'partner',22),(3,'Супер кредитный сайт №3','http://site03.ru?super=3','3.png',1,'creditor',3),(4,'Супер кредитный сайт №4','http://site04.ru?super=4','img_04.jpg',1,'partner',4),(5,'Супер кредитный сайт №5','http://site05.ru?super=5','img_05.jpg',1,'creditor',5),(6,'Супер кредитный сайт №6','http://site06.ru?super=6','img_06.jpg',1,'partner',6),(7,'Супер кредитный сайт №7','http://site07.ru?super=7','img_07.jpg',1,'partner',7),(8,'Супер кредитный сайт №8','http://site08.ru?super=8','img_08.jpg',1,'partner',8),(9,'Супер кредитный сайт №9','http://site09.ru?super=9','img_09.jpg',1,'creditor',9),(10,'Супер кредитный сайт №10','http://site10.ru?super=10','img_10.jpg',1,'partner',10),(11,'Супер кредитный сайт №11','http://site11.ru?super=11','img_11.jpg',1,'partner',11),(21,'новый сайт 1','а это линк 1','21.png',1,'creditor',2);
/*!40000 ALTER TABLE `offer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passport_data`
--

DROP TABLE IF EXISTS `passport_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passport_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `serial` int(10) unsigned NOT NULL,
  `number` int(10) unsigned NOT NULL,
  `code` varchar(255) NOT NULL,
  `organ` varchar(255) NOT NULL,
  `year` int(10) unsigned NOT NULL,
  `month` smallint(5) unsigned NOT NULL,
  `day` smallint(5) unsigned NOT NULL,
  `marital_status` enum('married','not_married') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passport_data`
--


--
-- Table structure for table `personal_data`
--

DROP TABLE IF EXISTS `personal_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name_1` varchar(255) NOT NULL,
  `name_2` varchar(255) NOT NULL,
  `name_3` varchar(255) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `b_year` int(10) unsigned NOT NULL,
  `b_month` smallint(5) unsigned NOT NULL,
  `b_day` smallint(5) unsigned NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `is_accept_email` int(1) unsigned NOT NULL,
  `password_hash` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_data`
--

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `type` enum('int','text') NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  `group` enum('yandex','payeer','pay_data','karma','undefined') NOT NULL DEFAULT 'undefined',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,'cur_payment','payeer','text','Текущий процессинг',0,'pay_data'),(3,'payeer_shop_id','207499305','text','Идентификатор магазина',0,'payeer'),(4,'payeer_shop_secret_key','8SpyZh1OQGlRLvKT','text','Секретный ключ магазина',0,'payeer'),(5,'pay_sum_activation','10','int','Сумма платежа за активацию',0,'pay_data'),(6,'pay_sum_karma','99','int','Сумма платежа за кредитную карму (отдельно от активации)',0,'pay_data'),(7,'is_make_a_gift_karma','0','int','Кредитная карма в подарок при активации',0,'pay_data'),(8,'ya_http_notice_secret','kHz46EyzrrhtGDLh82db5ftn','text','Секретное слово для http яндекс уведомлений ( брать здесь: https://money.yandex.ru/myservices/online.xml ) ',0,'yandex'),(9,'ya_money_account','41001421183988','int','Номер аккаунта Яндекс.Деньги для приёма платежей',0,'yandex'),(10,'gift_karma_message','При активации сервиса кредитный отчёт в подарок','text','Сообщение о предоставлении кредитного рейтинга в подарок',0,'pay_data'),(11,'from_email','webmaster@devzy.ru','text','Обратный e-mail при уведомлениях',0,'undefined'),(12,'site_title','SUPER ZAIM','text','Название сайта',0,'undefined'),(13,'site_url','http://devzy.ru','text','URL сайта',0,'undefined'),(14,'is_disable_show_karma','1','text','Скрыть раздел кредитного рейтинга',0,'undefined'),(15,'offers_description','Ваш рейтинг недостаточно хорошь для получения кредита, но Вы можете попробывать получить кредит тут','text','Текст, который выводится перед кредитными предложениями, если не нужен - можно просто отсавить пустым',0,'undefined');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trans_log`
--

DROP TABLE IF EXISTS `trans_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trans_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tstamp` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `body` text NOT NULL,
  `type` enum('to_ya','to_payeer','from_ya','from_payeer') NOT NULL,
  `attribute` enum('notice','success','fail','status') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trans_log`
--

LOCK TABLES `trans_log` WRITE;
/*!40000 ALTER TABLE `trans_log` DISABLE KEYS */;
INSERT INTO `trans_log` VALUES (1,111222333,1,'this is body 1','to_ya','notice'),(2,111222334,1,'this is body 2','from_ya','notice'),(3,111222335,2,'this is body 3','to_payeer','notice'),(4,111222336,2,'this is body 4','from_payeer','status'),(5,111222437,3,'this is body 5','to_ya','fail'),(6,111222438,3,'this is body 6','from_ya','fail'),(7,111222339,4,'this is body 7','to_payeer','success'),(8,111222340,4,'this is body 8','from_payeer','status'),(9,111222451,5,'this is body 9','to_payeer','fail'),(10,111222452,5,'this is body 10','from_payeer','fail'),(11,111222361,7,'this is body 11','to_ya','notice'),(12,111222362,7,'this is body 12','from_ya','notice'),(13,111222363,8,'this is body 13','to_payeer','notice'),(14,111222364,8,'this is body 14','from_payeer','status'),(15,111222475,9,'this is body 15','to_ya','fail'),(16,111222476,9,'this is body 16','from_ya','fail'),(17,111222377,10,'this is body 17','to_payeer','success'),(18,111222378,10,'this is body 18','from_payeer','status'),(19,111222490,11,'this is body 19','to_payeer','fail'),(20,111222491,11,'this is body 20','from_payeer','fail');
/*!40000 ALTER TABLE `trans_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('in_progress','reg_complete','active','banned') NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `is_pay_activation` int(1) unsigned NOT NULL,
  `is_pay_karma` int(1) unsigned NOT NULL,
  `delay` varchar(32) NOT NULL,
  `total_overdue` varchar(32) NOT NULL,
  `max_deleay` varchar(32) NOT NULL,
  `closed_negative` varchar(32) NOT NULL,
  `user_type` enum('admin','user') NOT NULL DEFAULT 'user',
  `is_ajax_offer_list` int(1) NOT NULL DEFAULT '1',
  `pay_status` enum('no_pay','try_pay','payed_full','payed_karma') NOT NULL DEFAULT 'no_pay',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'active',1468828384,0,0,'','','','','admin',1,'no_pay'),(2,'active',1468828979,0,0,'','','','','user',1,'no_pay'),(3,'active',1468940025,0,0,'','','','','user',1,'no_pay');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-21  2:16:22
