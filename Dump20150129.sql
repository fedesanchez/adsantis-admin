CREATE DATABASE  IF NOT EXISTS `santis` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `santis`;
-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: santis
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.12.10.1

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
  `img_fondo` varchar(255) DEFAULT NULL,
  `img_producto` varchar(255) DEFAULT NULL,
  `nombre_producto` varchar(255) DEFAULT NULL,
  `desc_sup_prod` varchar(255) DEFAULT NULL,
  `desc_inf_prod` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT '#',
  `orden` int(10) unsigned DEFAULT NULL,
  `habilitado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider`
--

LOCK TABLES `slider` WRITE;
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider_ta`
--

DROP TABLE IF EXISTS `slider_ta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider_ta` (
  `id_slider_ta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img_producto` varchar(255) NOT NULL,
  `tit_producto` varchar(255) NOT NULL,
  `tit_prop_1` varchar(255) DEFAULT NULL,
  `desc_prop_1` varchar(255) DEFAULT NULL,
  `tit_prop_2` varchar(255) DEFAULT NULL,
  `desc_prop_2` varchar(255) DEFAULT NULL,
  `tit_prop_3` varchar(255) DEFAULT NULL,
  `desc_prop_3` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `orden` int(10) unsigned DEFAULT NULL,
  `habilitado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_slider_ta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider_ta`
--

LOCK TABLES `slider_ta` WRITE;
/*!40000 ALTER TABLE `slider_ta` DISABLE KEYS */;
/*!40000 ALTER TABLE `slider_ta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consejo`
--

DROP TABLE IF EXISTS `consejo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consejo` (
  `id_consejo` int(11) NOT NULL AUTO_INCREMENT,
  `html` text NOT NULL,
  `titulo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_consejo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consejo`
--

LOCK TABLES `consejo` WRITE;
/*!40000 ALTER TABLE `consejo` DISABLE KEYS */;
INSERT INTO `consejo` VALUES (1,'aaaaa','aaaa');
/*!40000 ALTER TABLE `consejo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linea`
--

DROP TABLE IF EXISTS `linea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linea` (
  `id_linea` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `atributos` text,
  PRIMARY KEY (`id_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linea`
--

LOCK TABLES `linea` WRITE;
/*!40000 ALTER TABLE `linea` DISABLE KEYS */;
/*!40000 ALTER TABLE `linea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonio`
--

DROP TABLE IF EXISTS `testimonio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonio` (
  `id_testimonio` int(11) NOT NULL AUTO_INCREMENT,
  `texto` longtext NOT NULL,
  `autor` varchar(255) NOT NULL,
  `profesion` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_testimonio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonio`
--

LOCK TABLES `testimonio` WRITE;
/*!40000 ALTER TABLE `testimonio` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonio` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-29 15:10:07
