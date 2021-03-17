-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: warehouse
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
INSERT INTO `box` VALUES (1,'运行物资',0),(2,'运行物资',0),(3,'运行物资',0),(4,'运行物资',0),(5,'运行物资',0),(6,'运行物资',0),(7,'运行物资',0),(8,'运行物资',0),(9,'运行物资',0),(10,'运行物资',0),(11,'运行物资',0),(12,'运行物资',0),(13,'运行物资',0),(14,'运行物资',0),(15,'运行物资',0),(16,'运行物资',0),(17,'运行物资',0),(18,'运行物资',0),(19,'运行物资',0),(20,'运行物资',0),(21,'运行物资',0),(22,'运行物资',0),(23,'运行物资',0),(24,'运行物资',0),(25,'运行物资',0),(26,'运行物资',0),(27,'运行物资',0),(28,'运行物资',0),(29,'运行物资',0),(30,'运行物资',0),(31,'运行物资',0),(32,'运行物资',0),(33,'运行物资',0),(34,'运行物资',0),(35,'运行物资',0),(36,'运行物资',0),(37,'运行物资',0),(38,'运行物资',0),(39,'运行物资',0),(40,'运行物资',0),(41,'运行物资',0),(42,'运行物资',0),(43,'运行物资',0),(44,'运行物资',0),(45,'运行物资',0),(46,'运行物资',0),(47,'运行物资',0),(48,'运行物资',0),(49,'运行物资',0),(50,'运行物资',0),(51,'运行物资',0),(52,'运行物资',0),(53,'运行物资',0),(54,'运行物资',0),(55,'运行物资',0),(56,'运行物资',0),(57,'运行物资',0),(58,'运行物资',0),(59,'运行物资',0),(60,'运行物资',0),(61,'运行物资',0),(62,'运行物资',0),(63,'运行物资',0),(64,'运行物资',0),(65,'运行物资',0),(66,'运行物资',0),(67,'运行物资',0),(68,'运行物资',0),(69,'运行物资',0),(70,'运行物资',0);
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
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210309084108','2021-03-17 01:08:51',136),('DoctrineMigrations\\Version20210309195626','2021-03-17 01:08:51',98),('DoctrineMigrations\\Version20210309200014','2021-03-17 01:08:51',23),('DoctrineMigrations\\Version20210309200304','2021-03-17 01:08:51',21),('DoctrineMigrations\\Version20210309200451','2021-03-17 01:08:51',19),('DoctrineMigrations\\Version20210309200904','2021-03-17 01:08:51',18),('DoctrineMigrations\\Version20210309201632','2021-03-17 01:08:51',133),('DoctrineMigrations\\Version20210309204047','2021-03-17 01:08:51',91),('DoctrineMigrations\\Version20210309205217','2021-03-17 01:08:52',326),('DoctrineMigrations\\Version20210309205654','2021-03-17 01:08:52',290),('DoctrineMigrations\\Version20210309213444','2021-03-17 01:08:52',71),('DoctrineMigrations\\Version20210309213828','2021-03-17 01:08:52',75),('DoctrineMigrations\\Version20210309221952','2021-03-17 01:08:52',10),('DoctrineMigrations\\Version20210309222210','2021-03-17 01:08:52',9),('DoctrineMigrations\\Version20210309223332','2021-03-17 01:08:52',10),('DoctrineMigrations\\Version20210309223647','2021-03-17 01:08:52',40),('DoctrineMigrations\\Version20210309224253','2021-03-17 01:08:52',9),('DoctrineMigrations\\Version20210309231742','2021-03-17 01:08:52',109),('DoctrineMigrations\\Version20210309232050','2021-03-17 01:08:53',208),('DoctrineMigrations\\Version20210317122045','2021-03-17 12:23:03',325),('DoctrineMigrations\\Version20210317130744','2021-03-17 13:07:54',1751),('DoctrineMigrations\\Version20210317133226','2021-03-17 13:32:32',162),('DoctrineMigrations\\Version20210317193753','2021-03-17 19:37:59',109),('DoctrineMigrations\\Version20210317200549','2021-03-17 20:05:55',250);
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
INSERT INTO `entry` VALUES (1,1,4,8),(3,2,11,13),(4,3,5,2),(5,3,6,2),(6,3,7,2),(7,4,5,2),(8,4,6,2),(9,4,7,2),(10,5,8,1),(11,6,8,1),(12,7,9,20),(13,7,10,60),(14,8,12,30),(15,9,11,32),(16,9,12,2),(17,9,14,4),(18,9,15,1),(19,10,14,9),(20,11,5,3),(21,11,6,3),(22,11,7,3),(23,12,5,3),(24,12,6,3),(25,12,7,3),(26,13,16,7),(27,13,17,13),(28,13,18,3),(29,13,19,8),(30,13,20,1),(31,14,21,10),(32,14,22,10),(33,14,5,10),(34,15,5,3),(35,15,6,3),(36,15,7,3),(37,16,23,15),(38,16,24,3),(39,16,24,3),(40,17,23,15),(41,17,10,40),(42,17,22,30),(43,18,25,24),(44,19,26,1),(45,20,27,3),(46,21,28,3),(47,22,12,30),(48,23,29,3),(49,23,30,1),(50,24,21,10),(51,24,5,30),(52,25,21,20),(53,26,31,10),(54,27,12,30),(55,28,32,4),(56,28,33,8),(57,29,34,1),(58,30,9,30),(59,30,10,30),(60,31,35,5),(61,32,36,30),(62,33,31,10),(64,35,37,15),(65,35,38,15),(66,36,37,15),(67,36,38,15),(68,37,36,30),(69,38,12,30),(70,39,1,30),(71,39,10,40),(72,34,31,10),(73,40,2,15),(74,40,39,15),(75,41,2,15),(76,41,39,15),(77,42,40,3),(78,42,41,3),(79,43,42,3),(80,44,44,30),(81,45,45,3),(82,45,46,1),(83,46,47,3),(84,46,48,3),(85,47,49,4),(86,48,49,3),(87,48,50,30),(88,49,51,10),(89,50,51,5),(90,50,52,50),(91,51,51,10),(92,52,51,10),(93,53,51,10),(94,54,51,6),(95,54,53,10),(96,55,34,1),(97,56,54,1),(98,57,55,30),(99,57,56,3),(100,57,57,15),(101,58,58,1),(102,58,59,30),(103,58,71,10),(104,58,60,80),(105,58,61,10),(106,58,72,30),(107,58,62,1),(108,58,63,3),(109,58,64,8),(110,58,65,1),(111,59,51,10),(112,60,51,10),(113,61,51,10),(114,62,51,10),(115,63,66,7),(116,63,67,10),(117,63,68,1),(118,63,69,3),(119,63,70,120);
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
  PRIMARY KEY (`id`),
  KEY `IDX_1F1B251E9F2C3FAB` (`zone_id`),
  CONSTRAINT `FK_1F1B251E9F2C3FAB` FOREIGN KEY (`zone_id`) REFERENCES `zone` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'森林灭火防护服',NULL,0),(2,'防火头盔',NULL,0),(4,'参谋作业箱',NULL,0),(5,'头盔',NULL,0),(6,'指挥箱',NULL,0),(7,'挎包及生活用品',NULL,0),(8,'排用野战给养器材单元',NULL,0),(9,'单兵应急照明灯',NULL,0),(10,'“湖北民兵”标识背心',NULL,0),(11,'褥子',NULL,0),(12,'防毒面具',NULL,0),(14,'睡袋',NULL,0),(15,'伪装网',NULL,0),(16,'行军床',NULL,0),(17,'竹席',NULL,0),(18,'望远镜',NULL,0),(19,'文具盒',NULL,0),(20,'行军桌',NULL,0),(21,'盾牌',NULL,0),(22,'警棍',NULL,0),(23,'防刺服',NULL,0),(24,'枪发抓捕网',NULL,0),(25,'防爆钢叉',NULL,0),(26,'阻隔网',NULL,0),(27,'安检工具',NULL,0),(28,'爆炸物探测器',NULL,0),(29,'手提式金属探测器',NULL,0),(30,'阻车器',NULL,0),(31,'救生背心',NULL,0),(32,'行军椅',NULL,0),(33,'写字板',NULL,0),(34,'帐篷',NULL,0),(35,'救生搜索器',NULL,0),(36,'大军镐',NULL,0),(37,'雨衣',NULL,0),(38,'雨靴',NULL,0),(39,'消防斧',NULL,0),(40,'单兵背负式水枪',NULL,0),(41,'高压细水雾灭火器',NULL,0),(42,'割灌机',NULL,0),(44,'消防锹',NULL,0),(45,'接力水泵',NULL,0),(46,'森林灭火组合工具',NULL,0),(47,'摩托锯',NULL,0),(48,'灭火弹',NULL,0),(49,'风力灭火机',NULL,0),(50,'二号扑火工具',NULL,0),(51,'救生衣',NULL,0),(52,'湖北民兵标识工种',NULL,0),(53,'消防手套',NULL,0),(54,'班用帐篷',NULL,0),(55,'充气救生圈',NULL,0),(56,'水衣',NULL,0),(57,'水鞋',NULL,0),(58,'防爆毯',NULL,0),(59,'迷彩湖北民兵背心',NULL,0),(60,'普通手套',NULL,0),(61,'防割手套',NULL,0),(62,'钢丝钳',NULL,0),(63,'伸缩棍',NULL,0),(64,'催泪喷射器',NULL,0),(65,'防爆警棍',NULL,0),(66,'各种灯',NULL,0),(67,'新对讲机',NULL,0),(68,'喇叭',NULL,0),(69,'消防油壶',NULL,0),(70,'民兵标识装备',NULL,0),(71,'救生绳',NULL,0),(72,'橡胶手套',NULL,0);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (2,'2021-03-18 04:11:05','编号2'),(3,'2021-03-18 04:12:19','编号2'),(4,'2021-03-18 04:13:51','编号2'),(5,'2021-03-18 04:14:22','1'),(6,'2021-03-18 04:14:32','1');
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

-- Dump completed on 2021-03-18  4:16:29
