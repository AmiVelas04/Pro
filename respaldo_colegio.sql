-- MySQL dump 10.17  Distrib 10.3.16-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: colegio
-- ------------------------------------------------------
-- Server version	10.3.16-MariaDB

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
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `cod_al` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `edad` int(3) DEFAULT NULL,
  `fofografia` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cod_al`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES ('','Jose',21,NULL),('az123','Huio',21,NULL),('qw123','KIO',14,NULL),('zx321','Jose',21,NULL);
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asign_aviso`
--

DROP TABLE IF EXISTS `asign_aviso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asign_aviso` (
  `id_aviso` int(10) NOT NULL,
  `id_cat` int(10) NOT NULL,
  PRIMARY KEY (`id_aviso`,`id_cat`),
  KEY `asignaavis2` (`id_cat`),
  CONSTRAINT `asignaavis1` FOREIGN KEY (`id_aviso`) REFERENCES `aviso` (`id_aviso`),
  CONSTRAINT `asignaavis2` FOREIGN KEY (`id_cat`) REFERENCES `catedratico` (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asign_aviso`
--

LOCK TABLES `asign_aviso` WRITE;
/*!40000 ALTER TABLE `asign_aviso` DISABLE KEYS */;
/*!40000 ALTER TABLE `asign_aviso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asigna_alum`
--

DROP TABLE IF EXISTS `asigna_alum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asigna_alum` (
  `cod_al` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_carr` int(10) NOT NULL,
  `id_grado` int(10) NOT NULL,
  PRIMARY KEY (`cod_al`,`id_carr`,`id_grado`),
  KEY `asigna_al2` (`id_carr`),
  KEY `asigna_al3` (`id_grado`),
  CONSTRAINT `asigna_al1` FOREIGN KEY (`cod_al`) REFERENCES `alumno` (`cod_al`),
  CONSTRAINT `asigna_al2` FOREIGN KEY (`id_carr`) REFERENCES `carrera` (`id_carr`),
  CONSTRAINT `asigna_al3` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asigna_alum`
--

LOCK TABLES `asigna_alum` WRITE;
/*!40000 ALTER TABLE `asigna_alum` DISABLE KEYS */;
/*!40000 ALTER TABLE `asigna_alum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asigna_cur_cat`
--

DROP TABLE IF EXISTS `asigna_cur_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asigna_cur_cat` (
  `id_curso` int(10) NOT NULL,
  `id_cat` int(10) NOT NULL,
  PRIMARY KEY (`id_curso`,`id_cat`),
  KEY `asigcurcat2` (`id_cat`),
  CONSTRAINT `asigcurcat1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  CONSTRAINT `asigcurcat2` FOREIGN KEY (`id_cat`) REFERENCES `catedratico` (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asigna_cur_cat`
--

LOCK TABLES `asigna_cur_cat` WRITE;
/*!40000 ALTER TABLE `asigna_cur_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `asigna_cur_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asigna_dir_al`
--

DROP TABLE IF EXISTS `asigna_dir_al`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asigna_dir_al` (
  `cod_al` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_dir` int(10) NOT NULL,
  PRIMARY KEY (`cod_al`,`id_dir`),
  KEY `A_dir` (`id_dir`),
  CONSTRAINT `A_alum` FOREIGN KEY (`cod_al`) REFERENCES `alumno` (`cod_al`),
  CONSTRAINT `A_dir` FOREIGN KEY (`id_dir`) REFERENCES `direccion` (`id_dir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asigna_dir_al`
--

LOCK TABLES `asigna_dir_al` WRITE;
/*!40000 ALTER TABLE `asigna_dir_al` DISABLE KEYS */;
/*!40000 ALTER TABLE `asigna_dir_al` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asigna_encar`
--

DROP TABLE IF EXISTS `asigna_encar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asigna_encar` (
  `id_enc` int(10) NOT NULL,
  `cod_al` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_enc`,`cod_al`),
  KEY `a_enc_alu2` (`cod_al`),
  CONSTRAINT `a_enc_alu1` FOREIGN KEY (`id_enc`) REFERENCES `encargado` (`id_enc`),
  CONSTRAINT `a_enc_alu2` FOREIGN KEY (`cod_al`) REFERENCES `alumno` (`cod_al`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asigna_encar`
--

LOCK TABLES `asigna_encar` WRITE;
/*!40000 ALTER TABLE `asigna_encar` DISABLE KEYS */;
INSERT INTO `asigna_encar` VALUES (4,'qw123');
/*!40000 ALTER TABLE `asigna_encar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asigna_tel_cat`
--

DROP TABLE IF EXISTS `asigna_tel_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asigna_tel_cat` (
  `id_tel` int(10) NOT NULL,
  `id_cat` int(10) NOT NULL,
  PRIMARY KEY (`id_tel`,`id_cat`),
  KEY `asignacattel2` (`id_cat`),
  CONSTRAINT `asignacattel1` FOREIGN KEY (`id_tel`) REFERENCES `telefono` (`id_tel`),
  CONSTRAINT `asignacattel2` FOREIGN KEY (`id_cat`) REFERENCES `catedratico` (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asigna_tel_cat`
--

LOCK TABLES `asigna_tel_cat` WRITE;
/*!40000 ALTER TABLE `asigna_tel_cat` DISABLE KEYS */;
/*!40000 ALTER TABLE `asigna_tel_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asigna_tel_enc`
--

DROP TABLE IF EXISTS `asigna_tel_enc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asigna_tel_enc` (
  `id_enc` int(10) NOT NULL,
  `id_tel` int(10) NOT NULL,
  PRIMARY KEY (`id_enc`,`id_tel`),
  KEY `a_tel_enc2` (`id_tel`),
  CONSTRAINT `a_tel_enc1` FOREIGN KEY (`id_enc`) REFERENCES `encargado` (`id_enc`),
  CONSTRAINT `a_tel_enc2` FOREIGN KEY (`id_tel`) REFERENCES `telefono` (`id_tel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asigna_tel_enc`
--

LOCK TABLES `asigna_tel_enc` WRITE;
/*!40000 ALTER TABLE `asigna_tel_enc` DISABLE KEYS */;
INSERT INTO `asigna_tel_enc` VALUES (3,3),(4,4);
/*!40000 ALTER TABLE `asigna_tel_enc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aviso`
--

DROP TABLE IF EXISTS `aviso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aviso` (
  `id_aviso` int(10) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` mediumtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_aviso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aviso`
--

LOCK TABLES `aviso` WRITE;
/*!40000 ALTER TABLE `aviso` DISABLE KEYS */;
/*!40000 ALTER TABLE `aviso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificacion`
--

DROP TABLE IF EXISTS `calificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calificacion` (
  `id_cali` int(20) NOT NULL AUTO_INCREMENT,
  `id_curso` int(10) DEFAULT NULL,
  `cod_al` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_cali`),
  KEY `cali_cur` (`id_curso`),
  KEY `cali_al` (`cod_al`),
  CONSTRAINT `cali_al` FOREIGN KEY (`cod_al`) REFERENCES `alumno` (`cod_al`),
  CONSTRAINT `cali_cur` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificacion`
--

LOCK TABLES `calificacion` WRITE;
/*!40000 ALTER TABLE `calificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `calificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrera`
--

DROP TABLE IF EXISTS `carrera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrera` (
  `id_carr` int(10) NOT NULL AUTO_INCREMENT,
  `carrera` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_carr`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrera`
--

LOCK TABLES `carrera` WRITE;
/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
INSERT INTO `carrera` VALUES (1,'Perito Contador'),(2,'Secretariado Bilingüe'),(3,'Secretariado Oficinista');
/*!40000 ALTER TABLE `carrera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catedratico`
--

DROP TABLE IF EXISTS `catedratico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catedratico` (
  `id_cat` int(10) NOT NULL AUTO_INCREMENT,
  `id_usu` int(10) DEFAULT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `dpi` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `profesion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fotografia` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catedratico`
--

LOCK TABLES `catedratico` WRITE;
/*!40000 ALTER TABLE `catedratico` DISABLE KEYS */;
INSERT INTO `catedratico` VALUES (13,2,'Jose','LOLO','1234','allsa',NULL,NULL),(14,3,'yo','yo','1234','alla',NULL,NULL);
/*!40000 ALTER TABLE `catedratico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `id_curso` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_carr` int(10) DEFAULT NULL,
  `id_grado` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_curso`),
  KEY `curso_carr` (`id_carr`),
  KEY `FK_REFERENCE_21` (`id_grado`),
  CONSTRAINT `FK_REFERENCE_21` FOREIGN KEY (`id_grado`) REFERENCES `grado` (`id_grado`),
  CONSTRAINT `curso_carr` FOREIGN KEY (`id_carr`) REFERENCES `carrera` (`id_carr`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,'Matematica',1,1),(2,'Sociales',1,1),(3,'Matematica',2,2),(4,'Etica',2,2),(5,'Computacion',3,2),(6,'Computacion',3,3),(7,'Taquigrafia',3,3),(8,'Matematica',3,3),(9,'Etica',3,3);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_cali`
--

DROP TABLE IF EXISTS `detalle_cali`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_cali` (
  `id_detalle` int(30) NOT NULL AUTO_INCREMENT,
  `id_cali` int(20) NOT NULL,
  `id_peri` int(10) DEFAULT NULL,
  `t1` int(2) DEFAULT NULL,
  `t2` int(2) DEFAULT NULL,
  `t3` int(2) DEFAULT NULL,
  `pc1` int(2) DEFAULT NULL,
  `pc2` int(2) DEFAULT NULL,
  `examen` int(2) DEFAULT NULL,
  `total` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `detcali` (`id_cali`),
  KEY `detperi` (`id_peri`),
  CONSTRAINT `detcali` FOREIGN KEY (`id_cali`) REFERENCES `calificacion` (`id_cali`),
  CONSTRAINT `detperi` FOREIGN KEY (`id_peri`) REFERENCES `periodo` (`id_peri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_cali`
--

LOCK TABLES `detalle_cali` WRITE;
/*!40000 ALTER TABLE `detalle_cali` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_cali` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccion`
--

DROP TABLE IF EXISTS `direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direccion` (
  `id_dir` int(10) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_dir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion`
--

LOCK TABLES `direccion` WRITE;
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encargado`
--

DROP TABLE IF EXISTS `encargado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encargado` (
  `id_enc` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dpi` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_enc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encargado`
--

LOCK TABLES `encargado` WRITE;
/*!40000 ALTER TABLE `encargado` DISABLE KEYS */;
INSERT INTO `encargado` VALUES (1,'MArio','1234567891231'),(2,'MArio','1234567891231'),(3,'Manuel','1234567891230'),(4,'Ruin','1111111111111');
/*!40000 ALTER TABLE `encargado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grado`
--

DROP TABLE IF EXISTS `grado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grado` (
  `id_grado` int(10) NOT NULL AUTO_INCREMENT,
  `grado` varchar(512) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_grado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grado`
--

LOCK TABLES `grado` WRITE;
/*!40000 ALTER TABLE `grado` DISABLE KEYS */;
INSERT INTO `grado` VALUES (1,'4to'),(2,'5to'),(3,'6to');
/*!40000 ALTER TABLE `grado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodo`
--

DROP TABLE IF EXISTS `periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodo` (
  `id_peri` int(10) NOT NULL AUTO_INCREMENT,
  `periodo` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_peri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodo`
--

LOCK TABLES `periodo` WRITE;
/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
/*!40000 ALTER TABLE `periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefono`
--

DROP TABLE IF EXISTS `telefono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefono` (
  `id_tel` int(10) NOT NULL AUTO_INCREMENT,
  `telefono` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_tel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefono`
--

LOCK TABLES `telefono` WRITE;
/*!40000 ALTER TABLE `telefono` DISABLE KEYS */;
INSERT INTO `telefono` VALUES (1,'5555555'),(2,'12345678'),(3,'99999999'),(4,'77777777');
/*!40000 ALTER TABLE `telefono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usu` int(10) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pass` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` int(1) DEFAULT NULL,
  `Estado` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','1532',1,'Activa'),(2,'asdfasdf','1111',1,'Activa'),(3,'yo','1111',1,'Activa');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-06 19:18:25
