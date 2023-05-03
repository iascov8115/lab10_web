-- MariaDB dump 10.19  Distrib 10.5.18-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: crafti_iascov
-- ------------------------------------------------------
-- Server version	10.10.2-MariaDB-1:10.10.2+maria~ubu2204

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
-- Table structure for table `child`
--

DROP TABLE IF EXISTS `child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `child` (
  `child_id` int(11) NOT NULL AUTO_INCREMENT,
  `child_name` varchar(255) NOT NULL,
  `child_year_of_birth` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`child_id`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `child_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `child`
--

LOCK TABLES `child` WRITE;
/*!40000 ALTER TABLE `child` DISABLE KEYS */;
INSERT INTO `child` VALUES (1,'Нурмагомед',2012,2),(2,'Богдан',2016,3);
/*!40000 ALTER TABLE `child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_address` varchar(255) NOT NULL,
  `department_phone` varchar(15) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES (1,'бул. Д. Кантемир, 6','0796 99 812'),(2,'бул. Дечебал, 139','0786 99 877'),(3,'Московский бул., 2','0796 99 875'),(4,'ул. Алба Юлия, 77/18','0796 99 876'),(5,'бул. Дачия, 49/14','0796 99 881'),(6,'ул. Алеку Руссо, 61/6','0796 99 878'),(7,'ул. Соколень, 7','0796 99 873'),(8,'ул. М. Витязул, 10/1','0796 99 879'),(9,'ул. Ион Крянгэ, 78','0796 99 889');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department_event`
--

DROP TABLE IF EXISTS `department_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_event` (
  `de_id` int(11) NOT NULL AUTO_INCREMENT,
  `de_date` date NOT NULL,
  `de_time` time NOT NULL,
  `department_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`de_id`),
  KEY `department_id` (`department_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `department_event_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`)  ON DELETE CASCADE ,
  CONSTRAINT `department_event_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`)  ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_event`
--

LOCK TABLES `department_event` WRITE;
/*!40000 ALTER TABLE `department_event` DISABLE KEYS */;
INSERT INTO `department_event` VALUES (1,'2023-05-26','09:10:00',1,9),(2,'2023-05-21','09:50:00',7,4),(3,'2023-06-05','15:30:00',2,5),(4,'2023-05-14','15:00:00',7,3),(5,'2023-05-31','13:15:00',4,8),(6,'2023-05-17','09:45:00',6,3),(7,'2023-05-22','12:20:00',9,9),(8,'2023-05-05','17:10:00',8,2),(9,'2023-06-25','18:00:00',2,2),(10,'2023-05-29','11:30:00',7,8);
/*!40000 ALTER TABLE `department_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `available_places` int(11) NOT NULL,
  `event_price` float NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `manager_id` (`manager_id`),
  CONSTRAINT `event_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `manager` (`manager_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (2,'Лепка из глины',1,5,110),(3,'Роспись пряников',1,30,50),(4,'Гелевые свечи',1,5,75),(5,'Мыловарение',1,6,70),(6,'Эбру',1,20,30),(7,'Картины из цветного песка',1,5,45),(8,'Создание слаймов',1,15,30),(9,'Роспись деревянных значков и моделей',1,20,50);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_record`
--

DROP TABLE IF EXISTS `event_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_record` (
  `er_id` int(11) NOT NULL AUTO_INCREMENT,
  `er_date` date NOT NULL,
  `de_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  PRIMARY KEY (`er_id`),
  KEY `de_id` (`de_id`),
  KEY `child_id` (`child_id`),
  CONSTRAINT `event_record_ibfk_1` FOREIGN KEY (`de_id`) REFERENCES `department_event` (`de_id`)  ON DELETE CASCADE ,
  CONSTRAINT `event_record_ibfk_2` FOREIGN KEY (`child_id`) REFERENCES `child` (`child_id`)  ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_record`
--

LOCK TABLES `event_record` WRITE;
/*!40000 ALTER TABLE `event_record` DISABLE KEYS */;
INSERT INTO `event_record` VALUES (1,'2023-01-31',1,1),(2,'2023-04-30',2,2),(3,'2023-05-01',1,2);
/*!40000 ALTER TABLE `event_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `manager` (
  `manager_id` int(11) NOT NULL AUTO_INCREMENT,
  `manager_login` varchar(255) NOT NULL,
  `manager_password` varchar(255) NOT NULL,
  PRIMARY KEY (`manager_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES (1,'danilaaskov1@gmail.com','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parent`
--

DROP TABLE IF EXISTS `parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_name` varchar(255) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  PRIMARY KEY (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parent`
--

LOCK TABLES `parent` WRITE;
/*!40000 ALTER TABLE `parent` DISABLE KEYS */;
INSERT INTO `parent` VALUES (1,'Ivan Ivanov','ivanov@gmail.com'),(2,'Александр Шпак','shpak@mail.ru'),(3,'Валерий Жмышенко','jma@mail.com');
/*!40000 ALTER TABLE `parent` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-01 20:27:39
