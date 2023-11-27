-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: webhealth
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `horariosdisponiveis`
--

DROP TABLE IF EXISTS `horariosdisponiveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horariosdisponiveis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_medico` int DEFAULT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `disponivel` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_medico` (`id_medico`),
  CONSTRAINT `horariosdisponiveis_ibfk_1` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horariosdisponiveis`
--

LOCK TABLES `horariosdisponiveis` WRITE;
/*!40000 ALTER TABLE `horariosdisponiveis` DISABLE KEYS */;
INSERT INTO `horariosdisponiveis` VALUES (1,24,'2023-12-01','21:15:00',0),(2,24,'2023-12-02','21:15:00',0),(3,24,'2023-12-03','21:15:00',0),(4,24,'2023-12-04','21:15:00',1),(5,24,'2023-12-05','21:15:00',1),(6,24,'2023-12-06','21:15:00',1),(7,24,'2023-12-07','21:15:00',1),(8,24,'2023-12-08','21:15:00',1),(9,24,'2023-12-09','21:15:00',1),(10,24,'2023-12-10','21:15:00',1),(11,24,'2023-12-11','21:15:00',1),(12,24,'2023-12-12','21:15:00',1),(13,24,'2023-12-13','21:15:00',1),(14,24,'2023-12-14','21:15:00',1),(15,24,'2023-12-15','21:15:00',1),(16,24,'2023-12-16','21:15:00',1),(17,24,'2023-12-17','21:15:00',1),(18,24,'2023-12-18','21:15:00',1),(19,24,'2023-12-19','21:15:00',1),(20,24,'2023-12-20','21:15:00',1),(21,24,'2023-12-01','01:29:00',0),(22,24,'2023-12-02','01:29:00',0),(23,24,'2023-12-03','01:29:00',1),(24,24,'2023-12-04','01:29:00',1),(25,24,'2023-12-05','01:29:00',1),(26,24,'2023-12-06','01:29:00',1),(27,24,'2023-12-07','01:29:00',1),(28,24,'2023-12-08','01:29:00',1),(29,24,'2023-12-09','01:29:00',1),(30,24,'2023-12-10','01:29:00',1),(31,24,'2023-11-23','02:22:00',1),(32,24,'2023-11-24','02:22:00',1),(33,24,'2023-11-25','02:22:00',1);
/*!40000 ALTER TABLE `horariosdisponiveis` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-27 19:11:40
