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
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consulta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_consulta` date DEFAULT NULL,
  `horario_consulta` time DEFAULT NULL,
  `nivel_sintomas` varchar(50) DEFAULT NULL,
  `sintomas` text,
  `outros_sintomas` text,
  `historia_medica` varchar(50) DEFAULT NULL,
  `medicamentos` varchar(50) DEFAULT NULL,
  `historico_familiar` varchar(50) DEFAULT NULL,
  `estilo_vida` varchar(50) DEFAULT NULL,
  `vacinas` varchar(50) DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `id_medico` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_medico` (`id_medico`),
  CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (1,'2023-12-01','10:00:00','leve','Dor, Febre','xfsdff','cirurgia','sem_prescricao','doenca_cardiaca','ativo','incompleta',NULL,NULL),(2,'2023-12-01','10:00:00','leve','Dor, Febre','xfsdff','cirurgia','sem_prescricao','doenca_cardiaca','ativo','incompleta',NULL,NULL),(3,'2023-12-01','10:00:00','leve','Dor, Febre','xfsdff','cirurgia','sem_prescricao','doenca_cardiaca','ativo','incompleta',NULL,NULL),(4,'2023-12-01','10:00:00','leve','Dor, Febre','xfsdff','cirurgia','sem_prescricao','doenca_cardiaca','ativo','incompleta',NULL,NULL),(5,'2023-12-01','10:00:00','leve','Dor, Febre','xfsdff','cirurgia','sem_prescricao','doenca_cardiaca','ativo','incompleta',NULL,NULL),(6,'2023-12-05','11:00:00','moderado','Dor, Febre, Náuseas e Vômitos','dor nos olhos','cirurgia','sem_prescricao','doenca_cardiaca','ativo','incompleta',NULL,NULL),(7,'2023-12-05','11:00:00','moderado','Dor, Febre, Náuseas e Vômitos','dor nos olhos','cirurgia','sem_prescricao','doenca_cardiaca','ativo','incompleta',NULL,NULL),(8,'2023-12-01','10:00:00','nenhum','Perda de Peso Inexplicada','','nenhuma','nenhum','nenhum','sedentario','completa',NULL,NULL),(9,'2023-12-01','10:00:00','nenhum','Perda de Peso Inexplicada','','nenhuma','nenhum','nenhum','sedentario','completa',NULL,NULL),(10,'2023-12-01','10:00:00','nenhum','Perda de Peso Inexplicada','','nenhuma','nenhum','nenhum','sedentario','completa',NULL,NULL),(28,'2023-12-01','10:00:00','moderado','Tosse, Sintomas Gastrointestinais','','nenhuma','nenhum','nenhum','sedentario','completa',1,1),(30,'2023-12-01','10:00:00','leve','Dificuldade Respiratória, Tosse','','nenhuma','nenhum','nenhum','sedentario','completa',1,1),(33,'2023-12-01','10:00:00','leve','Perda de Peso Inexplicada, Alterações no Apetite','','nenhuma','nenhum','nenhum','sedentario','completa',1,1),(34,'2023-12-01','10:00:00','leve','Perda de Peso Inexplicada, Alterações no Apetite','','nenhuma','nenhum','nenhum','sedentario','completa',1,1),(35,'2023-12-01','10:00:00','moderado','Febre, Náuseas e Vômitos','','nenhuma','nenhum','nenhum','sedentario','completa',1,1),(36,'2023-12-01','10:00:00','moderado','Perda de Peso Inexplicada, Dificuldade Respiratória, Tosse','','cirurgia','prescricao','doenca_cardiaca','sedentario','incompleta',1,1),(37,'2023-12-01','10:00:00','moderado','Perda de Peso Inexplicada, Dificuldade Respiratória, Tosse','','cirurgia','prescricao','doenca_cardiaca','sedentario','incompleta',1,1),(38,'2023-12-01','11:00:00','moderado','Dor, Fadiga, Febre, Tontura ou Vertigem, Náuseas e Vômitos, Alterações no Apetite','Dor nos olhos','cirurgia','prescricao','doenca_cardiaca','ativo','incompleta',1,5),(39,'2023-12-01','11:00:00','grave','Dor, Perda de Peso Inexplicada, Sangramento Anormal, Dor nas Articulações ou Músculos','hemorragia no na cabeça do pênis','cirurgia','suplementos','diabetes','ativo','completa',1,25),(40,'2023-12-08','16:52:00','leve','Dor, Fadiga, Febre','xfvxgv','cirurgia','prescricao','doenca_cardiaca','ativo','incompleta',1,1),(41,'2023-12-01','16:52:00','leve','Dor, Fadiga, Febre','xfvxgv','cirurgia','prescricao','doenca_cardiaca','ativo','incompleta',1,1),(42,'2023-12-01','16:52:00','leve','Dor, Fadiga, Febre','xfvxgv','cirurgia','prescricao','doenca_cardiaca','ativo','incompleta',1,1),(43,'2023-12-01','16:52:00','moderado','Dor, Fadiga, Febre','12212','cirurgia','prescricao','nenhum','sedentario','completa',1,1),(44,'2023-12-01','16:52:00','leve','Náuseas e Vômitos, Perda de Peso Inexplicada, Alterações no Apetite','','nenhuma','nenhum','nenhum','sedentario','completa',1,1),(45,'2023-12-01','16:52:00','leve','Náuseas e Vômitos, Perda de Peso Inexplicada, Alterações no Apetite','','nenhuma','nenhum','nenhum','sedentario','completa',1,1),(46,'2023-12-01','16:52:00','leve','Dor, Fadiga, Febre, Tontura ou Vertigem','','hospitalizacao','prescricao','doenca_cardiaca','ativo','incompleta',1,1),(48,'2023-12-01','21:15:00','moderado','Alterações no Apetite, Tosse','','cirurgia','sem_prescricao','doenca_cardiaca','ativo','incompleta',1,24),(49,'2023-12-01','01:29:00','leve','Fadiga, Febre, Tontura ou Vertigem','','cirurgia','sem_prescricao','doenca_cardiaca','ativo','incompleta',1,24),(50,'2023-12-02','21:15:00','leve','Dor, Fadiga, Febre, Tontura ou Vertigem','','cirurgia','prescricao','doenca_cardiaca','ativo','completa',2,24),(51,'2023-12-02','01:29:00','leve','Dor, Fadiga, Febre, Náuseas e Vômitos','tessat','cirurgia','prescricao','doenca_cardiaca','ativo','incompleta',3,24),(52,'2023-12-03','21:15:00','leve','Dor, Fadiga, Febre','teste','cirurgia','sem_prescricao','doenca_cardiaca','ativo','incompleta',4,24);
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
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
