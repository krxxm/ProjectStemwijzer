-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: stemwijzer
-- ------------------------------------------------------
-- Server version	8.0.41

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
-- Table structure for table `election`
--

DROP TABLE IF EXISTS `election`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `election` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `discription` text,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `election`
--

LOCK TABLES `election` WRITE;
/*!40000 ALTER TABLE `election` DISABLE KEYS */;
INSERT INTO `election` VALUES (1,'Tweede Kamerverkiezingen','Verkiezingen voor de volksvertegenwoordigers in de Tweede Kamer der Staten-Generaal.','2024-01-01 00:00:00','2024-01-10 00:00:00','2025-11-12 00:00:00','2025-11-12 00:00:00'),(2,'Eerste Kamerverkiezingen','Indirecte verkiezingen voor de leden van de Eerste Kamer via Provinciale Staten.','2024-02-01 00:00:00','2024-02-15 00:00:00','2023-05-30 00:00:00','2023-05-30 00:00:00'),(3,'Provinciale Statenverkiezingen','Verkiezingen voor de leden van de Provinciale Staten van de twaalf provincies.','2024-03-01 00:00:00','2024-03-05 00:00:00','2023-03-15 00:00:00','2023-03-15 00:00:00'),(4,'Gemeenteraadsverkiezingen','Verkiezingen voor de gemeenteraden van alle Nederlandse gemeenten.','2024-04-01 00:00:00','2024-04-10 00:00:00','2022-03-16 00:00:00','2022-03-16 00:00:00'),(5,'Waterschapsverkiezingen','Verkiezingen voor de leden van de waterschapsbesturen.','2024-05-01 00:00:00','2024-05-20 00:00:00','2023-03-15 00:00:00','2023-03-15 00:00:00'),(6,'Europees Parlementsverkiezingen','Verkiezingen voor de Nederlandse vertegenwoordiging in het Europees Parlement.','2024-06-01 00:00:00','2024-06-10 00:00:00','2024-06-06 00:00:00','2024-06-06 00:00:00');
/*!40000 ALTER TABLE `election` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-04 11:07:33
