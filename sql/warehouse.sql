-- MySQL dump 10.18  Distrib 10.3.27-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: warehouse
-- ------------------------------------------------------
-- Server version	10.3.27-MariaDB-0+deb10u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `back`
--

DROP TABLE IF EXISTS `back`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `back` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `quantity` int(11) NOT NULL,
  `take_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6DCEC1373DF9AAF6` (`take_id`),
  CONSTRAINT `FK_6DCEC1373DF9AAF6` FOREIGN KEY (`take_id`) REFERENCES `take` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `back`
--

LOCK TABLES `back` WRITE;
/*!40000 ALTER TABLE `back` DISABLE KEYS */;
/*!40000 ALTER TABLE `back` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `box`
--

DROP TABLE IF EXISTS `box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=484 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `box`
--

LOCK TABLES `box` WRITE;
/*!40000 ALTER TABLE `box` DISABLE KEYS */;
INSERT INTO `box` VALUES (1,'运行物资',1),(2,'运行物资',1),(3,'运行物资',1),(4,'运行物资',1),(5,'运行物资',1),(6,'运行物资',1),(7,'运行物资',1),(8,'运行物资',1),(9,'运行物资',1),(10,'运行物资',1),(11,'运行物资',1),(12,'运行物资',1),(13,'运行物资',1),(14,'运行物资',1),(15,'运行物资',1),(16,'运行物资',1),(17,'运行物资',1),(18,'运行物资',1),(19,'运行物资',1),(20,'运行物资',1),(21,'运行物资',1),(22,'运行物资',1),(23,'运行物资',1),(24,'运行物资',1),(25,'运行物资',1),(26,'运行物资',1),(27,'运行物资',1),(28,'运行物资',1),(29,'运行物资',1),(30,'运行物资',1),(31,'运行物资',1),(32,'运行物资',1),(33,'运行物资',1),(34,'运行物资',1),(35,'运行物资',1),(36,'运行物资',1),(37,'运行物资',1),(38,'运行物资',1),(39,'运行物资',1),(40,'运行物资',1),(41,'运行物资',1),(42,'运行物资',1),(43,'运行物资',1),(44,'运行物资',1),(45,'运行物资',1),(46,'运行物资',1),(47,'运行物资',1),(48,'运行物资',1),(49,'后留物资',1),(50,'后留物资',1),(51,'后留物资',1),(52,'后留物资',1),(53,'后留物资',1),(54,'后留物资',1),(55,'后留物资',1),(56,'后留物资',1),(57,'后留物资',1),(58,'后留物资',1),(59,'后留物资',1),(60,'后留物资',1),(61,'后留物资',1),(62,'后留物资',1),(63,'后留物资',1);
/*!40000 ALTER TABLE `box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `box_item`
--

DROP TABLE IF EXISTS `box_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `box_item` (
  `box_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`box_id`,`item_id`),
  KEY `IDX_E97F6917D8177B3F` (`box_id`),
  KEY `IDX_E97F6917126F525E` (`item_id`),
  CONSTRAINT `FK_E97F6917126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_E97F6917D8177B3F` FOREIGN KEY (`box_id`) REFERENCES `box` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `box_item`
--

LOCK TABLES `box_item` WRITE;
/*!40000 ALTER TABLE `box_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `box_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210309084108','2021-03-17 01:08:51',136),('DoctrineMigrations\\Version20210309195626','2021-03-17 01:08:51',98),('DoctrineMigrations\\Version20210309200014','2021-03-17 01:08:51',23),('DoctrineMigrations\\Version20210309200304','2021-03-17 01:08:51',21),('DoctrineMigrations\\Version20210309200451','2021-03-17 01:08:51',19),('DoctrineMigrations\\Version20210309200904','2021-03-17 01:08:51',18),('DoctrineMigrations\\Version20210309201632','2021-03-17 01:08:51',133),('DoctrineMigrations\\Version20210309204047','2021-03-17 01:08:51',91),('DoctrineMigrations\\Version20210309205217','2021-03-17 01:08:52',326),('DoctrineMigrations\\Version20210309205654','2021-03-17 01:08:52',290),('DoctrineMigrations\\Version20210309213444','2021-03-17 01:08:52',71),('DoctrineMigrations\\Version20210309213828','2021-03-17 01:08:52',75),('DoctrineMigrations\\Version20210309221952','2021-03-17 01:08:52',10),('DoctrineMigrations\\Version20210309222210','2021-03-17 01:08:52',9),('DoctrineMigrations\\Version20210309223332','2021-03-17 01:08:52',10),('DoctrineMigrations\\Version20210309223647','2021-03-17 01:08:52',40),('DoctrineMigrations\\Version20210309224253','2021-03-17 01:08:52',9),('DoctrineMigrations\\Version20210309231742','2021-03-17 01:08:52',109),('DoctrineMigrations\\Version20210309232050','2021-03-17 01:08:53',208),('DoctrineMigrations\\Version20210317122045','2021-03-17 12:23:03',325),('DoctrineMigrations\\Version20210317130744','2021-03-17 13:07:54',1751),('DoctrineMigrations\\Version20210317133226','2021-03-17 13:32:32',162),('DoctrineMigrations\\Version20210317193753','2021-03-17 19:37:59',109),('DoctrineMigrations\\Version20210317200549','2021-03-17 20:05:55',250),('DoctrineMigrations\\Version20210318232924','2021-03-19 10:39:23',475),('DoctrineMigrations\\Version20210319041323','2021-03-19 15:36:09',1481),('DoctrineMigrations\\Version20210319044702','2021-03-19 15:39:11',33),('DoctrineMigrations\\Version20210319060324','2021-03-19 15:41:52',58),('DoctrineMigrations\\Version20210319135457','2021-03-20 10:35:15',125),('DoctrineMigrations\\Version20210319141112','2021-03-20 10:36:09',75);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entry`
--

DROP TABLE IF EXISTS `entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `box_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2B219D70D8177B3F` (`box_id`),
  KEY `IDX_2B219D70126F525E` (`item_id`),
  CONSTRAINT `FK_2B219D70126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  CONSTRAINT `FK_2B219D70D8177B3F` FOREIGN KEY (`box_id`) REFERENCES `box` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entry`
--

LOCK TABLES `entry` WRITE;
/*!40000 ALTER TABLE `entry` DISABLE KEYS */;
INSERT INTO `entry` VALUES (1,1,4,8),(3,2,11,13),(4,3,5,2),(5,3,6,2),(6,3,7,2),(7,4,5,2),(8,4,6,2),(9,4,7,2),(10,5,8,1),(11,6,8,1),(12,7,9,20),(13,7,10,60),(14,8,12,30),(15,9,11,32),(16,9,12,2),(17,9,14,4),(18,9,15,1),(19,10,14,9),(20,11,5,3),(21,11,6,3),(22,11,7,3),(23,12,5,3),(24,12,6,3),(25,12,7,3),(26,13,16,7),(27,13,17,13),(28,13,18,3),(29,13,19,8),(30,13,20,1),(31,14,21,10),(32,14,22,10),(33,14,5,10),(34,15,5,3),(35,15,6,3),(36,15,7,3),(37,16,23,15),(38,16,24,3),(40,17,23,15),(41,17,10,40),(42,17,22,30),(43,18,25,24),(44,19,26,1),(45,20,27,3),(46,21,28,3),(47,22,12,30),(48,23,29,3),(49,23,30,1),(50,24,21,10),(51,24,5,30),(52,25,21,20),(53,26,31,10),(54,27,12,30),(55,28,32,4),(56,28,33,8),(57,29,34,1),(58,30,9,30),(59,30,10,30),(60,31,35,5),(61,32,36,30),(62,33,31,10),(64,35,37,15),(65,35,38,15),(66,36,37,15),(67,36,38,15),(68,37,36,30),(69,38,12,30),(70,39,1,30),(71,39,10,40),(72,34,31,10),(73,40,2,15),(74,40,39,15),(75,41,2,15),(76,41,39,15),(77,42,40,3),(78,42,41,3),(79,43,42,3),(80,44,44,30),(81,45,45,3),(82,45,46,1),(83,46,47,3),(84,46,48,3),(85,47,49,4),(86,48,49,3),(87,48,50,30),(88,49,51,10),(89,50,51,5),(90,50,52,50),(91,51,51,10),(92,52,51,10),(93,53,51,10),(94,54,51,6),(95,54,53,10),(96,55,34,1),(97,56,54,1),(98,57,55,30),(99,57,56,3),(100,57,57,15),(101,58,58,1),(102,58,59,30),(103,58,71,10),(104,58,60,80),(105,58,61,10),(106,58,72,30),(107,58,62,1),(108,58,63,3),(109,58,64,8),(110,58,65,1),(111,59,51,10),(112,60,51,10),(113,61,51,10),(114,62,51,10),(115,63,66,7),(116,63,67,10),(117,63,68,1),(118,63,69,3),(119,63,70,120);
/*!40000 ALTER TABLE `entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `stock0` int(11) DEFAULT NULL,
  `unit` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1F1B251E9F2C3FAB` (`zone_id`),
  CONSTRAINT `FK_1F1B251E9F2C3FAB` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'森林灭火防护服',NULL,0,NULL,'套'),(2,'防火头盔',NULL,0,NULL,'顶'),(4,'参谋作业箱',NULL,0,NULL,'个'),(5,'头盔',NULL,0,NULL,'顶'),(6,'指挥箱',NULL,0,NULL,'个'),(7,'挎包及生活用品',NULL,0,NULL,'套'),(8,'排用野战给养器材单元',NULL,0,NULL,'套'),(9,'单兵应急照明灯',NULL,0,NULL,'个'),(10,'“湖北民兵”标识背心',NULL,0,NULL,'个'),(11,'褥子',NULL,0,NULL,'床'),(12,'防毒面具',NULL,0,NULL,'个'),(14,'睡袋',NULL,0,NULL,'个'),(15,'伪装网',NULL,0,NULL,'个'),(16,'行军床',NULL,0,NULL,'个'),(17,'竹席',NULL,0,NULL,'个'),(18,'望远镜',NULL,0,NULL,'副'),(19,'文具盒',NULL,0,NULL,'个'),(20,'行军桌',NULL,0,NULL,'个'),(21,'盾牌',NULL,0,NULL,'面'),(22,'警棍',NULL,0,NULL,'根'),(23,'防刺服',NULL,0,NULL,'件'),(24,'枪发抓捕网',NULL,0,NULL,'件'),(25,'防暴钢叉',NULL,0,NULL,'个'),(26,'阻隔网',NULL,0,NULL,'套'),(27,'安检工具',NULL,0,NULL,'套'),(28,'爆炸物探测器',NULL,0,NULL,'个'),(29,'手提式金属探测器',NULL,0,NULL,'个'),(30,'阻车器',NULL,0,NULL,'副'),(31,'救生背心',NULL,0,NULL,'件'),(32,'行军椅',NULL,0,NULL,'个'),(33,'写字板',NULL,0,NULL,'个'),(34,'帐篷',NULL,0,NULL,'个'),(35,'救生搜索器',NULL,0,NULL,'套'),(36,'大军镐',NULL,0,NULL,'把'),(37,'雨衣',NULL,0,NULL,'件'),(38,'雨靴',NULL,0,NULL,'双'),(39,'消防斧',NULL,0,NULL,'把'),(40,'单兵背负式水枪',NULL,0,NULL,'把'),(41,'高压细水雾灭火器',NULL,0,NULL,'台'),(42,'割灌机',NULL,0,NULL,'台'),(44,'消防锹',NULL,0,NULL,'把'),(45,'接力水泵',NULL,0,NULL,'台'),(46,'森林灭火组合工具',NULL,0,NULL,'套'),(47,'摩托锯',NULL,0,NULL,'台'),(48,'灭火弹',NULL,0,NULL,'枚'),(49,'风力灭火机',NULL,0,NULL,'台'),(50,'二号扑火工具',NULL,0,NULL,'把'),(51,'救生衣',NULL,0,NULL,'件'),(52,'湖北民兵标识工种',NULL,0,NULL,'件'),(53,'消防手套',NULL,0,NULL,'双'),(54,'班用帐篷',NULL,0,NULL,'顶'),(55,'充气救生圈',NULL,0,NULL,'个'),(56,'水衣',NULL,0,NULL,'件'),(57,'水鞋',NULL,0,NULL,'双'),(58,'防爆毯',NULL,0,NULL,'个'),(59,'迷彩湖北民兵背心',NULL,0,NULL,'件'),(60,'普通手套',NULL,0,NULL,'双'),(61,'防割手套',NULL,0,NULL,'双'),(62,'钢丝钳',NULL,0,NULL,'把'),(63,'伸缩棍',NULL,0,NULL,'根'),(64,'催泪喷射器',NULL,0,NULL,'个'),(65,'防暴警棍',NULL,0,NULL,'个'),(66,'各种灯',NULL,0,NULL,'个'),(67,'新对讲机',NULL,0,NULL,'个'),(68,'喇叭',NULL,0,NULL,'个'),(69,'消防油壶',NULL,0,NULL,'个'),(70,'民兵标识装备',NULL,0,NULL,'套'),(71,'救生绳',NULL,0,NULL,'根'),(72,'橡胶手套',NULL,0,NULL,'双');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `box` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` tinyint(1) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2021-03-21 14:51:51','33',0,NULL),(2,'2021-03-21 14:54:01','33',1,NULL),(3,'2021-03-21 14:55:28','34',0,NULL),(4,'2021-03-21 14:57:50','34',1,NULL),(5,'2021-03-21 15:04:08','34',0,NULL),(6,'2021-03-21 15:05:18','33',0,NULL),(7,'2021-03-21 15:06:55','34',1,NULL),(8,'2021-03-21 15:08:37','33',1,NULL),(9,'2021-03-21 15:38:53','33',0,NULL),(10,'2021-03-21 15:41:17','1',0,NULL),(11,'2021-03-21 15:43:41','33',1,NULL),(12,'2021-03-21 15:48:48','1',1,NULL),(13,'2021-03-21 15:50:35','10',0,NULL),(14,'2021-03-21 15:52:48','10',1,NULL),(15,'2021-03-21 15:54:50','23',0,NULL),(16,'2021-03-21 15:58:55','23',1,NULL),(17,'2021-03-21 16:01:38','33',0,NULL),(18,'2021-03-21 16:04:38','33',1,NULL),(19,'2021-03-21 16:07:40','33',0,NULL),(20,'2021-03-21 16:15:02','33',1,NULL),(27,'2021-03-21 17:02:39','20',0,NULL),(28,'2021-03-21 18:46:35','20',1,NULL),(29,'2021-03-21 18:48:26','16',0,NULL),(31,'2021-03-21 18:51:23','16',1,NULL),(32,'2021-03-22 07:33:12','2555',NULL,NULL),(33,'2021-03-22 07:35:33','2555',NULL,NULL),(34,'2021-03-22 07:38:32','2555',NULL,NULL),(35,'2021-03-22 07:40:45','20',0,NULL),(36,'2021-03-22 07:42:01','2555',NULL,NULL),(37,'2021-03-22 07:43:18','20',1,NULL),(38,'2021-03-22 07:44:07','2555',NULL,NULL),(39,'2021-03-22 07:46:27','2555',NULL,NULL),(40,'2021-03-22 07:49:01','2555',NULL,NULL),(41,'2021-03-22 07:52:22','2555',NULL,NULL),(42,'2021-03-22 07:56:03','2555',NULL,NULL),(43,'2021-03-22 07:57:43','53',0,NULL),(44,'2021-03-22 08:00:24','53',1,NULL);
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loss`
--

DROP TABLE IF EXISTS `loss`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `why` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `item_id` int(11) DEFAULT NULL,
  `take_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DE211109126F525E` (`item_id`),
  KEY `IDX_DE2111093DF9AAF6` (`take_id`),
  CONSTRAINT `FK_DE211109126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  CONSTRAINT `FK_DE2111093DF9AAF6` FOREIGN KEY (`take_id`) REFERENCES `take` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loss`
--

LOCK TABLES `loss` WRITE;
/*!40000 ALTER TABLE `loss` DISABLE KEYS */;
/*!40000 ALTER TABLE `loss` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `neo`
--

DROP TABLE IF EXISTS `neo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `neo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `zone_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_788FDC139F2C3FAB` (`zone_id`),
  KEY `IDX_788FDC13126F525E` (`item_id`),
  CONSTRAINT `FK_788FDC13126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  CONSTRAINT `FK_788FDC139F2C3FAB` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `neo`
--

LOCK TABLES `neo` WRITE;
/*!40000 ALTER TABLE `neo` DISABLE KEYS */;
/*!40000 ALTER TABLE `neo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `take`
--

DROP TABLE IF EXISTS `take`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `take` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `date` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `quantity` int(11) NOT NULL,
  `returned` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_37DD6E7B126F525E` (`item_id`),
  CONSTRAINT `FK_37DD6E7B126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `take`
--

LOCK TABLES `take` WRITE;
/*!40000 ALTER TABLE `take` DISABLE KEYS */;
/*!40000 ALTER TABLE `take` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zone`
--

DROP TABLE IF EXISTS `zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zone` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zone`
--

LOCK TABLES `zone` WRITE;
/*!40000 ALTER TABLE `zone` DISABLE KEYS */;
/*!40000 ALTER TABLE `zone` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-22  8:14:43
