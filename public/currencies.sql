-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: laraoffice
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acrm_currencies`
--

DROP TABLE IF EXISTS `acrm_currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acrm_currencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_default` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  PRIMARY KEY (`id`),
  KEY `currencies_deleted_at_index` (`deleted_at`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acrm_currencies`
--

LOCK TABLES `acrm_currencies` WRITE;
/*!40000 ALTER TABLE `acrm_currencies` DISABLE KEYS */;
INSERT INTO `acrm_currencies` VALUES (1,'USD','$','USD','1','Active',NULL,'2023-02-14 04:57:02',NULL,'no'),(2,'Isle of Man','COP','GHS','77','','2019-09-28 20:45:01','2019-10-03 11:36:43','2019-10-03 11:36:43','no'),(3,'Poland Zloty','zł','PLN','3.81','Inactive','2019-09-28 20:47:14','2019-12-18 13:10:46',NULL,'no'),(4,'Indonesia Rupiah','Rp','IDR','14116.05','Inactive','2019-09-28 20:57:15','2019-10-11 05:35:43',NULL,'no'),(5,'Burundi','GHS','SGD','47','','2019-09-28 20:59:15','2019-10-03 11:34:55','2019-10-03 11:34:55','no'),(6,'Zambia','MGA','TTD','38','Inactive','2019-09-28 21:01:36','2019-10-03 11:35:03','2019-10-03 11:35:03','no'),(7,'Cayman Islands Dollar','$','KYD','0.83328','Inactive','2019-09-28 21:06:42','2019-10-11 05:35:43',NULL,'no'),(8,'Kazakhstan Tenge','лв','KZT','390.179788','Inactive','2019-09-28 21:13:37','2019-10-11 05:35:43',NULL,'no'),(9,'Albania Lek','Lek','ALL','111.795167','Inactive','2019-10-03 10:46:08','2019-10-11 05:35:43',NULL,'no'),(10,'Afghanistan Afghani','؋','AFN','78.302631','Inactive','2019-10-03 10:50:57','2019-10-11 05:35:43',NULL,'no'),(11,'Argentina Peso','$','ARS','57.9847','Inactive','2019-10-03 10:51:36','2019-10-11 05:35:43',NULL,'no'),(12,'Aruba Guilder','ƒ','AWG','1.8','Inactive','2019-10-03 10:52:32','2019-10-03 12:14:28',NULL,'no'),(13,'Australia Dollar','$','AUD','1.477705','Inactive','2019-10-03 10:53:21','2019-10-11 05:35:43',NULL,'no'),(14,'Azerbaijan Manat','₼','AZN','1.703419','Inactive','2019-10-03 10:54:07','2019-10-11 05:35:43',NULL,'no'),(15,'Bahamas Dollar','$','BSD','0.99996','Inactive','2019-10-03 10:54:43','2019-10-11 05:35:43',NULL,'no'),(16,'Barbados Dollar','$','BBD','2.01905','Inactive','2019-10-03 10:55:22','2019-10-11 05:35:43',NULL,'no'),(17,'Belarus Ruble','Br','BYN','2.060804','Inactive','2019-10-03 10:57:15','2019-10-11 05:35:43',NULL,'no'),(18,'Belize Dollar','BZ$','BZD','2.01565','Inactive','2019-10-03 10:58:05','2019-10-11 05:35:43',NULL,'no'),(19,'Bermuda Dollar','$','BMD','1','Inactive','2019-10-03 10:59:00','2019-10-03 12:14:28',NULL,'no'),(20,'Bolivia Bolíviano','$b','BOB','6.914899','Inactive','2019-10-03 11:00:07','2019-10-11 05:35:43',NULL,'no'),(21,'Bosnia and Herzegovina Convertible Mark','KM','BAM','1.77375','Inactive','2019-10-03 11:00:44','2019-10-11 05:35:43',NULL,'no'),(22,'Botswana Pula','P','BWP','11.043497','Inactive','2019-10-03 11:01:24','2019-10-11 05:35:43',NULL,'no'),(23,'Bulgaria Lev','лв','BGN','1.775803','Inactive','2019-10-03 11:02:06','2019-10-11 05:35:43',NULL,'no'),(24,'Brazil Real','R$','BRL','4.107905','Inactive','2019-10-03 11:02:45','2019-10-11 05:35:43',NULL,'no'),(25,'Brunei Darussalam Dollar','$','BND','1.37705','Inactive','2019-10-03 11:03:31','2019-10-11 05:35:43',NULL,'no'),(26,'Cambodia Riel','៛','KHR','4075.00044','Inactive','2019-10-03 11:04:10','2019-10-11 05:35:43',NULL,'no'),(27,'Canada Dollar','$','CAD','1.32719','Inactive','2019-10-03 11:04:50','2019-10-11 05:35:43',NULL,'no'),(28,'Cayman Islands Dollar','$','KYD','0.83328','Inactive','2019-10-03 11:05:27','2019-10-11 05:35:43',NULL,'no'),(29,'Chile Peso','$','CLP','717.698945','Inactive','2019-10-03 11:06:10','2019-10-11 05:35:43',NULL,'no'),(30,'China Yuan Renminbi','¥','CNY','7.116297','Inactive','2019-10-03 11:06:52','2019-10-11 05:35:43',NULL,'no'),(31,'Colombia Peso','$','COP','3467','Inactive','2019-10-03 11:07:29','2019-10-11 05:35:43',NULL,'no'),(32,'Costa Rica Colon','₡','CRC','581.584996','Inactive','2019-10-03 11:08:05','2019-10-11 05:35:43',NULL,'no'),(33,'Croatia Kuna','kn','HRK','6.73935','Inactive','2019-10-03 11:09:00','2019-10-11 05:35:43',NULL,'no'),(34,'Cuba Peso','₱','CUP','26.5','Inactive','2019-10-03 11:09:30','2019-10-03 12:14:28',NULL,'no'),(35,'Czech Republic Koruna','Kč','CZK','23.437504','Inactive','2019-10-03 11:10:03','2019-10-11 05:35:43',NULL,'no'),(36,'Denmark Krone','kr','DKK','6.77621','Inactive','2019-10-03 11:10:42','2019-10-11 05:35:43',NULL,'no'),(37,'Dominican Republic Peso','RD$','DOP','52.985035','Inactive','2019-10-03 11:11:14','2019-10-11 05:35:43',NULL,'no'),(38,'East Caribbean Dollar','$','XCD','2.70255','Inactive','2019-10-03 11:11:50','2019-10-03 12:14:28',NULL,'no'),(39,'Egypt Pound','£','EGP','16.279797','Inactive','2019-10-03 11:12:20','2019-10-11 05:35:43',NULL,'no'),(40,'El Salvador Colon','$','SVC','8.750291','Inactive','2019-10-03 11:12:55','2019-10-11 05:35:43',NULL,'no'),(41,'Euro Member Countries','€','EUR','0.90736','Inactive','2019-10-03 11:13:28','2019-10-11 05:35:43',NULL,'no'),(42,'Falkland Islands (Malvinas) Pound','£','FKP','0.81288','Inactive','2019-10-03 11:14:03','2019-10-03 12:14:28',NULL,'no'),(43,'Fiji Dollar','$','FJD','2.2075','Inactive','2019-10-03 11:14:36','2019-10-11 05:35:43',NULL,'no'),(44,'Ghana Cedi','¢','GHS','5.444978','Inactive','2019-10-03 11:15:03','2019-10-11 05:35:43',NULL,'no'),(45,'Gibraltar Pound','£','GIP','0.81288','Inactive','2019-10-03 11:15:35','2019-10-03 12:14:28',NULL,'no'),(46,'Guatemala Quetzal','Q','GTQ','7.764898','Inactive','2019-10-03 11:16:23','2019-10-11 05:35:43',NULL,'no'),(47,'Guernsey Pound','Q','GTQ','7.764898','Inactive','2019-10-03 11:38:11','2019-10-11 05:35:43',NULL,'no'),(48,'Guyana Dollar','$','GYD','208.654991','Inactive','2019-10-03 11:39:01','2019-10-11 05:35:43',NULL,'no'),(49,'Honduras Lempira','L','HNL','24.764961','Inactive','2019-10-03 11:39:35','2019-10-11 05:35:43',NULL,'no'),(50,'Hong Kong Dollar','$','HKD','7.84145','Inactive','2019-10-03 11:40:13','2019-10-11 05:35:43',NULL,'no'),(51,'Hungary Forint','Ft','HUF','301.605959','Inactive','2019-10-03 11:40:50','2019-10-11 05:35:43',NULL,'no'),(52,'Iceland Krona','kr','ISK','124.940205','Inactive','2019-10-03 11:42:07','2019-10-11 05:35:43',NULL,'no'),(53,'India Rupee','₹','INR','1','Active','2019-10-03 11:43:22','2023-05-13 03:08:58',NULL,'no'),(54,'Indonesia Rupiah','Rp','IDR','14116.05','Inactive','2019-10-03 11:43:50','2019-10-11 05:35:43',NULL,'no'),(55,'Iran Rial','﷼','IRR','42104.999747','Inactive','2019-10-03 11:44:15','2019-10-11 05:35:43',NULL,'no'),(56,'Isle of Man Pound','£','IMP','0.808541','Inactive','2019-10-03 11:44:44','2019-10-11 05:35:43',NULL,'no'),(57,'Israel Shekel','₪','ILS','3.508899','Inactive','2019-10-03 11:45:12','2019-10-11 05:35:43',NULL,'no'),(58,'Jamaica Dollar','J$','JMD','134.000112','Inactive','2019-10-03 11:45:39','2019-10-11 05:35:43',NULL,'no'),(59,'Japan Yen','¥','JPY','130.56804','Active','2019-10-03 11:46:05','2022-05-08 14:49:21',NULL,'no'),(60,'Jersey Pound','£','JEP','0.808541','Inactive','2019-10-03 11:46:39','2019-10-11 05:35:43',NULL,'no'),(61,'Kazakhstan Tenge','лв','KZT','390.179788','Inactive','2019-10-03 11:47:16','2019-10-11 05:35:43',NULL,'no'),(62,'Korea (North) Won','₩','KPW','900.084541','Inactive','2019-10-03 11:47:50','2019-10-11 05:35:43',NULL,'no'),(63,'Korea (South) Won','₩','KRW','1189.729687','Inactive','2019-10-03 11:48:13','2019-10-11 05:35:43',NULL,'no'),(64,'Kyrgyzstan Som','лв','KGS','69.849923','Inactive','2019-10-03 11:48:37','2019-10-11 05:35:43',NULL,'no'),(65,'Laos Kip','₭','LAK','8822.496299','Inactive','2019-10-03 11:49:01','2019-10-11 05:35:43',NULL,'no'),(66,'Lebanon Pound','£','LBP','1504.650356','Inactive','2019-10-03 11:49:25','2019-10-11 05:35:43',NULL,'no'),(67,'Liberia Dollar','$','LRD','210.999983','Inactive','2019-10-03 11:49:54','2019-10-11 05:35:43',NULL,'no'),(68,'Macedonia Denar','ден','MKD','55.800497','Inactive','2019-10-03 11:50:17','2019-10-11 05:35:43',NULL,'no'),(69,'Malaysia Ringgit','RM','MYR','4.189005','Inactive','2019-10-03 11:50:44','2019-10-11 05:35:43',NULL,'no'),(70,'Mauritius Rupee','₨','MUR','36.494975','Inactive','2019-10-03 11:51:10','2019-10-11 05:35:43',NULL,'no'),(71,'Mexico Peso','$','MXN','19.45858','Inactive','2019-10-03 11:51:42','2019-10-11 05:35:43',NULL,'no'),(72,'Mongolia Tughrik','₮','MNT','2668.932375','Inactive','2019-10-03 11:52:09','2019-10-11 05:35:43',NULL,'no'),(73,'Mozambique Metical','MT','MZN','62.124963','Inactive','2019-10-03 11:52:30','2019-10-11 05:35:43',NULL,'no'),(74,'Namibia Dollar','$','NAD','15.169795','Inactive','2019-10-03 11:52:56','2019-10-11 05:35:43',NULL,'no'),(75,'Nepal Rupee','₨','NPR','113.714973','Inactive','2019-10-03 11:53:24','2019-10-11 05:35:43',NULL,'no'),(76,'Netherlands Antilles Guilder','ƒ','ANG','1.75495','Inactive','2019-10-03 11:53:52','2019-10-11 05:35:43',NULL,'no'),(77,'New Zealand Dollar','$','NZD','1.58129','Inactive','2019-10-03 11:54:14','2019-10-11 05:35:43',NULL,'no'),(78,'Nicaragua Cordoba','C$','NIO','33.649962','Inactive','2019-10-03 11:54:44','2019-10-11 05:35:43',NULL,'no'),(79,'Nigeria Naira','₦','NGN','361.999876','Inactive','2019-10-03 11:55:17','2019-10-11 05:35:43',NULL,'no'),(80,'Norway Krone','kr','NOK','9.11604','Inactive','2019-10-03 11:55:43','2019-10-11 05:35:43',NULL,'no'),(81,'Oman Rial','﷼','OMR','0.38504','Inactive','2019-10-03 11:57:14','2019-10-11 05:35:43',NULL,'no'),(82,'Pakistan Rupee','₨','PKR','156.508627','Inactive','2019-10-03 11:57:44','2019-10-11 05:35:43',NULL,'no'),(83,'Panama Balboa','B/.','PAB','0.99995','Inactive','2019-10-03 11:58:13','2019-10-11 05:35:43',NULL,'no'),(84,'Paraguay Guarani','Gs','PYG','6405.399248','Inactive','2019-10-03 11:58:37','2019-10-11 05:35:43',NULL,'no'),(85,'Peru Sol','S/.','PEN','3.354939','Inactive','2019-10-03 11:59:00','2019-10-11 05:35:43',NULL,'no'),(86,'Philippines Peso','₱','PHP','51.550502','Inactive','2019-10-03 11:59:28','2019-10-11 05:35:43',NULL,'no'),(87,'Poland Zloty','zł','PLN','3.913797','Inactive','2019-10-03 11:59:53','2019-10-11 05:35:43',NULL,'no'),(88,'Qatar Riyal','﷼','QAR','3.641018','Inactive','2019-10-03 12:00:18','2019-10-11 05:35:43',NULL,'no'),(89,'Romania Leu','lei','RON','4.315798','Inactive','2019-10-03 12:00:46','2019-10-11 05:35:43',NULL,'no'),(90,'Russia Ruble','₽','RUB','64.466697','Inactive','2019-10-03 12:01:15','2019-10-11 05:35:43',NULL,'no'),(91,'Saint Helena Pound','£','SHP','1.320902','Inactive','2019-10-03 12:01:41','2019-10-11 05:35:43',NULL,'no'),(92,'Saudi Arabia Riyal','﷼','SAR','3.75065','Inactive','2019-10-03 12:02:10','2019-10-11 05:35:43',NULL,'no'),(93,'Serbia Dinar','Дин.','RSD','106.624975','Inactive','2019-10-03 12:02:39','2019-10-11 05:35:43',NULL,'no'),(94,'Seychelles Rupee','₨','SCR','13.700974','Inactive','2019-10-03 12:03:06','2019-10-11 05:35:43',NULL,'no'),(95,'Singapore Dollar','$','SGD','1.37498','Inactive','2019-10-03 12:03:33','2019-10-11 05:35:43',NULL,'no'),(96,'Solomon Islands Dollar','$','SBD','8.23545','Inactive','2019-10-03 12:03:59','2019-10-11 05:35:43',NULL,'no'),(97,'Somalia Shilling','S','SOS','579.999749','Inactive','2019-10-03 12:04:24','2019-10-11 05:35:43',NULL,'no'),(98,'South Africa Rand','R','ZAR','15.022401','Inactive','2019-10-03 12:04:47','2019-10-11 05:35:43',NULL,'no'),(99,'Sri Lanka Rupee','₨','LKR','180.594992','Inactive','2019-10-03 12:05:13','2019-10-11 05:35:43',NULL,'no'),(100,'Sweden Krona','kr','SEK','9.83567','Inactive','2019-10-03 12:05:40','2019-10-11 05:35:43',NULL,'no'),(101,'Switzerland Franc','CHF','CHF','0.995025','Inactive','2019-10-03 12:06:08','2019-10-11 05:35:43',NULL,'no'),(102,'Suriname Dollar','$','SRD','7.458035','Inactive','2019-10-03 12:06:31','2019-10-11 05:35:43',NULL,'no'),(103,'Syria Pound','£','SYP','515.000187','Inactive','2019-10-03 12:07:01','2019-10-11 05:35:43',NULL,'no'),(104,'Taiwan New Dollar','NT$','TWD','30.643032','Inactive','2019-10-03 12:07:25','2019-10-11 05:35:43',NULL,'no'),(105,'Thailand Baht','฿','THB','30.382503','Inactive','2019-10-03 12:08:00','2019-10-11 05:35:43',NULL,'no'),(106,'Trinidad and Tobago Dollar','TT$','TTD','6.77655','Inactive','2019-10-03 12:08:23','2019-10-11 05:35:43',NULL,'no'),(107,'Turkey Lira','₺','TRY','5.83466','Inactive','2019-10-03 12:09:15','2019-10-11 05:35:43',NULL,'no'),(108,'Tuvalu Dollar','$','TVD','23','Inactive','2019-10-03 12:09:53','2019-10-03 12:09:53',NULL,'no'),(109,'Ukraine Hryvnia','₴','UAH','24.525984','Inactive','2019-10-03 12:10:18','2019-10-11 05:35:43',NULL,'no'),(110,'United Kingdom Pound','£','GBP','0.810406','Active','2019-10-03 12:10:44','2022-05-08 14:49:21',NULL,'no'),(111,'Uruguay Peso','$U','UYU','37.224499','Inactive','2019-10-03 12:11:25','2019-10-11 05:35:43',NULL,'no'),(112,'Uzbekistan Som','лв','UZS','9420.000417','Inactive','2019-10-03 12:11:48','2019-10-11 05:35:43',NULL,'no'),(113,'Venezuela Bolívar','Bs','VEF','9.987501','Inactive','2019-10-03 12:12:13','2019-10-11 05:35:43',NULL,'no'),(114,'Viet Nam Dong','₫','VND','23208.5','Inactive','2019-10-03 12:12:42','2019-10-05 05:27:42',NULL,'no'),(115,'Yemen Rial','﷼','YER','250.350071','Inactive','2019-10-03 12:13:05','2019-10-11 05:35:43',NULL,'no'),(116,'Zimbabwe Dollar','Z$','ZWD','85','Inactive','2019-10-03 12:13:38','2019-10-28 05:05:44','2019-10-28 05:05:44','no'),(118,'Euro','€','EU','1','Active','2019-10-13 13:02:32','2019-10-28 05:05:34','2019-10-28 05:05:34','no'),(119,'dfg','frg','rdf','452','Active','2019-10-31 03:54:30','2019-10-31 03:54:46','2019-10-31 03:54:46','no'),(120,'Stella Shepherd','Eius suscipit occaec','Alias praesentium qu','50.021','Inactive','2022-07-13 12:08:46','2022-07-13 12:08:46',NULL,'no'),(121,'اختبار','اختبار','اختبار','1','Active','2022-07-13 12:14:57','2022-07-14 07:21:29',NULL,'no');
/*!40000 ALTER TABLE `acrm_currencies` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-09 16:18:00