-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: psypath
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

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
-- Current Database: `psypath`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `psypath` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `psypath`;

--
-- Table structure for table `chat1`
--

DROP TABLE IF EXISTS `chat1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat1` (
  `id_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(255) NOT NULL,
  `chat` varchar(9) DEFAULT NULL,
  `fk_id` int(9) DEFAULT NULL,
  `fk_nickname` varchar(255) NOT NULL,
  `fk_nome_fotos` varchar(255) NOT NULL,
  PRIMARY KEY (`id_mensagem`),
  KEY `fk_id` (`fk_id`),
  KEY `fk_nickname` (`fk_nickname`),
  KEY `fk_nome_fotos` (`fk_nome_fotos`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat1`
--

LOCK TABLES `chat1` WRITE;
/*!40000 ALTER TABLE `chat1` DISABLE KEYS */;
INSERT INTO `chat1` VALUES (1,'awda','chat 1',1,'Pedrão','pedro@gmail.com_perfil_img.jpg'),(2,'1 - Não ofenda outros usuários!','chat 1',1,'Pedrão','pedro@gmail.com_perfil_img.jpg'),(3,'2 - Não pratique qualquer crime na plataforma!','chat 1',1,'Pedrão','pedro@gmail.com_perfil_img.jpg'),(4,'3 - Não prejudique a experiência de outros usuários!','chat 1',1,'Pedrão','pedro@gmail.com_perfil_img.jpg'),(5,' 4 - Não pratique spam nos chats!','chat 1',1,'Pedrão','pedro@gmail.com_perfil_img.jpg');
/*!40000 ALTER TABLE `chat1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat2`
--

DROP TABLE IF EXISTS `chat2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat2` (
  `id_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(255) NOT NULL,
  `chat` varchar(9) DEFAULT NULL,
  `fk_id` int(9) DEFAULT NULL,
  `fk_nickname` varchar(255) NOT NULL,
  `fk_nome_fotos` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mensagem`),
  KEY `fk_id` (`fk_id`),
  KEY `fk_nickname` (`fk_nickname`),
  KEY `fk_nome_fotos` (`fk_nome_fotos`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat2`
--

LOCK TABLES `chat2` WRITE;
/*!40000 ALTER TABLE `chat2` DISABLE KEYS */;
INSERT INTO `chat2` VALUES (1,'1','chat 1',1,'Pedrão','pedro@gmail.com_perfil_img.jpg');
/*!40000 ALTER TABLE `chat2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat3`
--

DROP TABLE IF EXISTS `chat3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat3` (
  `id_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(255) NOT NULL,
  `chat` varchar(9) DEFAULT NULL,
  `fk_id` int(9) DEFAULT NULL,
  `fk_nickname` varchar(255) NOT NULL,
  `fk_nome_fotos` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mensagem`),
  KEY `fk_id` (`fk_id`),
  KEY `fk_nickname` (`fk_nickname`),
  KEY `fk_nome_fotos` (`fk_nome_fotos`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat3`
--

LOCK TABLES `chat3` WRITE;
/*!40000 ALTER TABLE `chat3` DISABLE KEYS */;
INSERT INTO `chat3` VALUES (1,'1','chat 2',1,'Pedrão','pedro@gmail.com_perfil_img.jpg');
/*!40000 ALTER TABLE `chat3` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat4`
--

DROP TABLE IF EXISTS `chat4`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat4` (
  `id_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(255) NOT NULL,
  `chat` varchar(9) DEFAULT NULL,
  `fk_id` int(9) DEFAULT NULL,
  `fk_nickname` varchar(255) NOT NULL,
  `fk_nome_fotos` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mensagem`),
  KEY `fk_id` (`fk_id`),
  KEY `fk_nickname` (`fk_nickname`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat4`
--

LOCK TABLES `chat4` WRITE;
/*!40000 ALTER TABLE `chat4` DISABLE KEYS */;
INSERT INTO `chat4` VALUES (1,'1','chat 1',1,'Pedrão','pedro@gmail.com_perfil_img.jpg');
/*!40000 ALTER TABLE `chat4` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat5`
--

DROP TABLE IF EXISTS `chat5`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat5` (
  `id_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(255) NOT NULL,
  `chat` varchar(9) DEFAULT NULL,
  `fk_id` int(9) DEFAULT NULL,
  `fk_nickname` varchar(255) NOT NULL,
  `fk_nome_fotos` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mensagem`),
  KEY `fk_id` (`fk_id`),
  KEY `fk_nickname` (`fk_nickname`),
  KEY `fk_nome_fotos` (`fk_nome_fotos`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat5`
--

LOCK TABLES `chat5` WRITE;
/*!40000 ALTER TABLE `chat5` DISABLE KEYS */;
INSERT INTO `chat5` VALUES (1,'1','chat 1',1,'Pedrão','pedro@gmail.com_perfil_img.jpg');
/*!40000 ALTER TABLE `chat5` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat6`
--

DROP TABLE IF EXISTS `chat6`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat6` (
  `id_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `mensagem` varchar(255) NOT NULL,
  `chat` varchar(9) DEFAULT NULL,
  `fk_id` int(9) DEFAULT NULL,
  `fk_nickname` varchar(255) NOT NULL,
  `fk_nome_fotos` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_mensagem`),
  KEY `fk_id` (`fk_id`),
  KEY `fk_nickname` (`fk_nickname`),
  KEY `fk_nome_fotos` (`fk_nome_fotos`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat6`
--

LOCK TABLES `chat6` WRITE;
/*!40000 ALTER TABLE `chat6` DISABLE KEYS */;
INSERT INTO `chat6` VALUES (1,'1','chat 1',1,'Pedrão','pedro@gmail.com_perfil_img.jpg');
/*!40000 ALTER TABLE `chat6` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contas`
--

DROP TABLE IF EXISTS `contas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contas` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `universidade` varchar(255) DEFAULT NULL,
  `semestre` date DEFAULT NULL,
  `crm` varchar(13) DEFAULT NULL,
  `nivel_acesso` int(9) NOT NULL,
  `banimento` int(9) NOT NULL,
  `fk_nome_laudos` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nome_laudos` (`fk_nome_laudos`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contas`
--

LOCK TABLES `contas` WRITE;
/*!40000 ALTER TABLE `contas` DISABLE KEYS */;
INSERT INTO `contas` VALUES (1,'Pedro ','Pedrão','pedro@gmail.com','4de69ee6b12b7fc91070873b71ba6e2929b90619','Eu sou o pedro','631.241.231-24',NULL,NULL,NULL,NULL,2,0,NULL);
/*!40000 ALTER TABLE `contas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos` (
  `id_fotos` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fotos` varchar(255) NOT NULL,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`id_fotos`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos`
--

LOCK TABLES `fotos` WRITE;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
INSERT INTO `fotos` VALUES (1,'pedro@gmail.com_perfil_img.jpg','2022-12-11 22:15:10'),(2,'meire.isaac1@gmail.com_perfil_img.jpg','2022-12-11 22:42:25');
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laudos`
--

DROP TABLE IF EXISTS `laudos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laudos` (
  `id_laudos` int(11) NOT NULL AUTO_INCREMENT,
  `nome_laudos` varchar(255) NOT NULL,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`id_laudos`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laudos`
--

LOCK TABLES `laudos` WRITE;
/*!40000 ALTER TABLE `laudos` DISABLE KEYS */;
INSERT INTO `laudos` VALUES (1,'pedro@gmail.com_laudo.pdf','2022-12-11 22:15:10'),(2,'pdf_inválido_psicologo','2022-11-27 23:21:32');
/*!40000 ALTER TABLE `laudos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-11 23:07:56
