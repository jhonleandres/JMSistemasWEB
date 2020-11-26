-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: jmsistemas
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `billsToPay`
--

DROP TABLE IF EXISTS `billsToPay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `billsToPay` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descrition` varchar(255) COLLATE utf8_bin NOT NULL,
  `providerId` int(10) unsigned DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `releaseDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dueDate` datetime NOT NULL,
  `status` enum('ABERTO','PAGO','VENCIDO') COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `billstopay_providerid_foreign` (`providerId`),
  CONSTRAINT `billstopay_providerid_foreign` FOREIGN KEY (`providerId`) REFERENCES `providers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billsToPay`
--

LOCK TABLES `billsToPay` WRITE;
/*!40000 ALTER TABLE `billsToPay` DISABLE KEYS */;
INSERT INTO `billsToPay` VALUES (1,'Pagamento Conta de Agua',1,240.00,'2020-11-25 00:00:00','2020-11-27 00:00:00','PAGO','2020-11-25 02:18:59','2020-11-25 02:18:59'),(2,'Pagamento Conta de Energia',2,500.49,'2020-11-20 00:00:00','2020-11-19 00:00:00','VENCIDO','2020-11-25 02:18:59','2020-11-25 02:18:59'),(3,'Pagamento Conta de Supermercado',3,999.00,'2020-11-21 00:00:00','2020-11-30 00:00:00','ABERTO','2020-11-25 02:18:59','2020-11-25 02:18:59');
/*!40000 ALTER TABLE `billsToPay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `providers`
--

DROP TABLE IF EXISTS `providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `providers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `providers_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `providers`
--

LOCK TABLES `providers` WRITE;
/*!40000 ALTER TABLE `providers` DISABLE KEYS */;
INSERT INTO `providers` VALUES (1,'Saneago','2020-11-25 02:18:59','2020-11-25 02:18:59'),(2,'Enel Goiás','2020-11-25 02:18:59','2020-11-25 02:18:59'),(3,'Braga Supermercado','2020-11-25 02:18:59','2020-11-25 02:18:59');
/*!40000 ALTER TABLE `providers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-25 22:19:40
