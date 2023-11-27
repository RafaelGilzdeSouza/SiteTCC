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
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `sexo` enum('M','F') DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `CRM` varchar(20) NOT NULL,
  `especialidade` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `img_data` varchar(255) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `CRM` (`CRM`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medico`
--

LOCK TABLES `medico` WRITE;
/*!40000 ALTER TABLE `medico` DISABLE KEYS */;
INSERT INTO `medico` VALUES (1,'Jão','Silva','1980-05-15','M','joao.silvas@example.com','(11) 1234-5678','CRM12355-SP','Cardiologista','Rua A, 123','São Paulo','SP','01234-567','img/profile/medico1.jpg','root'),(3,'Maria','Santos','1975-08-22','F','maria.santos@example.com','(21) 9876-5432','CRM54321-RJ','Pediatra','Avenida B, 456','Rio de Janeiro','RJ','21098-765','img/profile/medico1.jpg','root'),(4,'Carlos','Pereira','1990-03-10','M','carlos.pereira@example.com','(31) 2222-3333','CRM98765-MG','Dentista','Rua C, 789','Belo Horizonte','MG','30123-456','img/profile/medico1.jpg','root'),(5,'Ana','Fernandes','1988-11-05','F','ana.fernandes@example.com','(41) 5555-4444','CRM54321-PR','Ortopedista','Avenida D, 101','Curitiba','PR','80001-234','img/profile/medico-2.jpg','root'),(6,'Pedro','Oliveira','1985-12-20','M','pedro.oliveira@example.com','(51) 9876-5432','CRM12346-RS','Ginecologista','Rua E, 246','Porto Alegre','RS','90012-345','img/profile/medico-2.jpg','root'),(7,'Lucia','Rocha','1995-02-14','F','lucia.rocha@example.com','(71) 4444-5555','CRM98765-BA','Neurologista','Avenida F, 789','Salvador','BA','40023-456','img/profile/medico-2.jpg','root'),(8,'Marcos','Carvalho','1983-07-30','M','marcos.carvalho@example.com','(81) 1234-5678','CRM54321-PE','Oftalmologista','Rua G, 123','Recife','PE','50001-234','img/profile/medico-3.jpg','root'),(9,'Isabel','Mendes','1970-09-02','F','isabel.mendes@example.com','(61) 5555-4444','CRM12345-DF','Dermatologista','Avenida H, 456','Brasília','DF','70012-345','img/profile/medico-3.jpg','root'),(10,'Ricardo','Sousa','1982-04-18','M','ricardo.sousa@example.com','(91) 9876-5432','CRM98766-PA','Cirurgião Geral','Rua I, 101','Belém','PA','66001-234','img/profile/medico-3.jpg','root'),(11,'Paula','Ferreira','1978-01-07','F','paula.ferreira@example.com','(98) 1234-5678','CRM54322-MA','Oncologista','Avenida J, 246','São Luís','MA','65023-456','img/profile/medico-4.png','root'),(12,'Gustavo','Vieira','1991-06-25','M','gustavo.vieira@example.com','(35) 5555-4444','CRM12347-MG','Cirurgião Plástico','Rua K, 123','Belo Horizonte','MG','30123-456','img/profile/medico-4.png','root'),(13,'Larissa','Alves','1989-10-12','F','larissa.alves@example.com','(84) 9876-5432','CRM98767-RN','Endocrinologista','Avenida L, 456','Natal','RN','59001-234','img/profile/medico-4.png','root'),(14,'Fernando','Santana','1981-03-27','M','fernando.santana@example.com','(14) 1234-5678','CRM54323-SP','Cirurgião Vascular','Rua M, 101','São Paulo','SP','01234-567','img/profile/medico-5.jpg','root'),(15,'Camila','Oliveira','1993-12-05','F','camila.oliveira@example.com','(45) 5555-4444','CRM12348-PR','Urologista','Rua N, 123','Curitiba','PR','80001-234','img/profile/medico-5.jpg','root'),(16,'Antônio','Ramos','1973-11-18','M','antonio.ramos@example.com','(55) 9876-5432','CRM98768-RS','Médico de Família','Avenida O, 456','Porto Alegre','RS','90012-345','img/profile/medico-5.jpg','root'),(17,'Marta','Ferreira','1987-06-29','F','marta.ferreira@example.com','(66) 1234-5678','CRM54324-MT','Dentista','Rua P, 101','Cuiabá','MT','78001-234','img/profile/medico-6.jpg','root'),(18,'Roberto','Almeida','1974-09-14','M','roberto.almeida@example.com','(15) 5555-4444','CRM12349-SP','Oncologista','Avenida Q, 246','Sorocaba','SP','18001-234','img/profile/medico-6.jpg','root'),(19,'Sandra','Machado','1990-08-07','F','sandra.machado@example.com','(17) 9876-5432','CRM98769-SP','Pneumologista','Rua R, 123','São José do Rio Preto','SP','15001-234','img/profile/medico-6.jpg','root'),(20,'Marcelo','Cavalcante','1986-02-22','M','marcelo.cavalcante@example.com','(12) 1234-5678','CRM54325-SP','Cardiologista','Avenida S, 456','São Paulo','SP','01234-567','img/profile/medico.jpg','root'),(21,'Eduarda','Lima','1984-05-10','F','eduarda.lima@example.com','(23) 5555-4444','CRM12350-ES','Pediatra','Rua T, 123','Vitória','ES','29001-234','img/profile/medico.jpg','root'),(22,'teste','teste','2023-11-02','F','rafa@gmail.com','','12345-JS','tesste','590','gggggg','SC','0000000','img/profile/medicoteste.jfif',''),(23,'roze','da silva','2023-11-01','F','root@gmail.com','444444444444','12345-JF','Cardiologista','590','gggggg','SC','0000000','img/profile/medicaroze.jfif',''),(24,'Rafa teste','teste','2023-11-02','M','zrafa@gmail.com','444444444444','12345-ZP','tesste','590','gggggg','SC','0000000','img/profile/medicoteste.jfif','root'),(25,'Rafa ','sabe','2023-11-04','M','gilza@gmail.com','444444444444','12345-JZ','Cardiologista','590','gggggg','SC','0000000','img/profile/medicaroze.jfif','root'),(26,'Rafael','rtesteasdfasdfas','2023-11-03','M','tesddt@gmail.com','444444444444','12309-JP','tesste','590','gggggg','SC','0000000','img/profile/medico.jpg','root');
/*!40000 ALTER TABLE `medico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-27 19:11:39
