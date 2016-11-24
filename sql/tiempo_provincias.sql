-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: tiempo
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `url` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (1,'Álava','http://api.tiempo.com/index.php?api_lang=es&provincia=8&affiliate_id=lz92tk47tteo'),(2,'Ávila','http://api.tiempo.com/index.php?api_lang=es&provincia=3&affiliate_id=lz92tk47tteo'),(3,'A Coruña','http://api.tiempo.com/index.php?api_lang=es&provincia=25&affiliate_id=lz92tk47tteo'),(4,'Albacete','http://api.tiempo.com/index.php?api_lang=es&provincia=9&affiliate_id=lz92tk47tteo'),(5,'Alicante','http://api.tiempo.com/index.php?api_lang=es&provincia=4&affiliate_id=lz92tk47tteo'),(6,'Almería','http://api.tiempo.com/index.php?api_lang=es&provincia=6&affiliate_id=lz92tk47tteo'),(7,'Asturias','http://api.tiempo.com/index.php?api_lang=es&provincia=12&affiliate_id=lz92tk47tteo'),(8,'Badajoz','http://api.tiempo.com/index.php?api_lang=es&provincia=5&affiliate_id=lz92tk47tteo'),(9,'Barcelona','http://api.tiempo.com/index.php?api_lang=es&provincia=2&affiliate_id=lz92tk47tteo'),(10,'Burgos','http://api.tiempo.com/index.php?api_lang=es&provincia=19&affiliate_id=lz92tk47tteo'),(11,'Cáceres','http://api.tiempo.com/index.php?api_lang=es&provincia=20&affiliate_id=lz92tk47tteo'),(12,'Cádiz','http://api.tiempo.com/index.php?api_lang=es&provincia=24&affiliate_id=lz92tk47tteo'),(13,'Córdoba','http://api.tiempo.com/index.php?api_lang=es&provincia=29&affiliate_id=lz92tk47tteo'),(14,'Cantabria','http://api.tiempo.com/index.php?api_lang=es&provincia=43&affiliate_id=lz92tk47tteo'),(15,'Castellón','http://api.tiempo.com/index.php?api_lang=es&provincia=22&affiliate_id=lz92tk47tteo'),(16,'Ceuta','http://api.tiempo.com/index.php?api_lang=es&provincia=51&affiliate_id=lz92tk47tteo'),(17,'Ciudad Real','http://api.tiempo.com/index.php?api_lang=es&provincia=23&affiliate_id=lz92tk47tteo'),(18,'Cuenca','http://api.tiempo.com/index.php?api_lang=es&provincia=21&affiliate_id=lz92tk47tteo'),(19,'Girona','http://api.tiempo.com/index.php?api_lang=es&provincia=26&affiliate_id=lz92tk47tteo'),(20,'Granada','http://api.tiempo.com/index.php?api_lang=es&provincia=27&affiliate_id=lz92tk47tteo'),(21,'Guadalajara','http://api.tiempo.com/index.php?api_lang=es&provincia=28&affiliate_id=lz92tk47tteo'),(22,'Guipúzcoa','http://api.tiempo.com/index.php?api_lang=es&provincia=30&affiliate_id=lz92tk47tteo'),(23,'Huelva','http://api.tiempo.com/index.php?api_lang=es&provincia=32&affiliate_id=lz92tk47tteo'),(24,'Huesca','http://api.tiempo.com/index.php?api_lang=es&provincia=31&affiliate_id=lz92tk47tteo'),(25,'Illes Balears','http://api.tiempo.com/index.php?api_lang=es&provincia=18&affiliate_id=lz92tk47tteo'),(26,'Jaén','http://api.tiempo.com/index.php?api_lang=es&provincia=33&affiliate_id=lz92tk47tteo'),(27,'La Rioja','http://api.tiempo.com/index.php?api_lang=es&provincia=36&affiliate_id=lz92tk47tteo'),(28,'Las Palmas','http://api.tiempo.com/index.php?api_lang=es&provincia=15&affiliate_id=lz92tk47tteo'),(29,'León','http://api.tiempo.com/index.php?api_lang=es&provincia=34&affiliate_id=lz92tk47tteo'),(30,'Lleida','http://api.tiempo.com/index.php?api_lang=es&provincia=35&affiliate_id=lz92tk47tteo'),(31,'Lugo','http://api.tiempo.com/index.php?api_lang=es&provincia=13&affiliate_id=lz92tk47tteo'),(32,'Málaga','http://api.tiempo.com/index.php?api_lang=es&provincia=11&affiliate_id=lz92tk47tteo'),(33,'Madrid','http://api.tiempo.com/index.php?api_lang=es&provincia=14&affiliate_id=lz92tk47tteo'),(34,'Melilla','http://api.tiempo.com/index.php?api_lang=es&provincia=52&affiliate_id=lz92tk47tteo'),(35,'Murcia','http://api.tiempo.com/index.php?api_lang=es&provincia=1&affiliate_id=lz92tk47tteo'),(36,'Navarra','http://api.tiempo.com/index.php?api_lang=es&provincia=10&affiliate_id=lz92tk47tteo'),(37,'Ourense','http://api.tiempo.com/index.php?api_lang=es&provincia=17&affiliate_id=lz92tk47tteo'),(38,'Palencia','http://api.tiempo.com/index.php?api_lang=es&provincia=37&affiliate_id=lz92tk47tteo'),(39,'Pontevedra','http://api.tiempo.com/index.php?api_lang=es&provincia=16&affiliate_id=lz92tk47tteo'),(40,'Salamanca','http://api.tiempo.com/index.php?api_lang=es&provincia=38&affiliate_id=lz92tk47tteo'),(41,'Santa Cruz de Tenerife','http://api.tiempo.com/index.php?api_lang=es&provincia=41&affiliate_id=lz92tk47tteo'),(42,'Segovia','http://api.tiempo.com/index.php?api_lang=es&provincia=39&affiliate_id=lz92tk47tteo'),(43,'Sevilla','http://api.tiempo.com/index.php?api_lang=es&provincia=40&affiliate_id=lz92tk47tteo'),(44,'Soria','http://api.tiempo.com/index.php?api_lang=es&provincia=42&affiliate_id=lz92tk47tteo'),(45,'Tarragona','http://api.tiempo.com/index.php?api_lang=es&provincia=44&affiliate_id=lz92tk47tteo'),(46,'Teruel','http://api.tiempo.com/index.php?api_lang=es&provincia=45&affiliate_id=lz92tk47tteo'),(47,'Toledo','http://api.tiempo.com/index.php?api_lang=es&provincia=46&affiliate_id=lz92tk47tteo'),(48,'Valencia','http://api.tiempo.com/index.php?api_lang=es&provincia=7&affiliate_id=lz92tk47tteo'),(49,'Valladolid','http://api.tiempo.com/index.php?api_lang=es&provincia=50&affiliate_id=lz92tk47tteo'),(50,'Vizcaya','http://api.tiempo.com/index.php?api_lang=es&provincia=47&affiliate_id=lz92tk47tteo'),(51,'Zamora','http://api.tiempo.com/index.php?api_lang=es&provincia=48&affiliate_id=lz92tk47tteo'),(52,'Zaragoza','http://api.tiempo.com/index.php?api_lang=es&provincia=49&affiliate_id=lz92tk47tteo');
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-24 23:47:12
