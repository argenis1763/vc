CREATE DATABASE  IF NOT EXISTS `via-college` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `via-college`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: via-college
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `requirements_fields`
--

DROP TABLE IF EXISTS `requirements_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requirements_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requirements_fields`
--

LOCK TABLES `requirements_fields` WRITE;
/*!40000 ALTER TABLE `requirements_fields` DISABLE KEYS */;
INSERT INTO `requirements_fields` VALUES (1,'Grafico de GPA/SAT'),(3,'Admission Address'),(4,'International Counselor'),(5,'Crear Profile personal o abrir cuenta'),(7,'Writing Supplement'),(8,'Fee de Aplicación'),(9,'Official Translated Transcripts'),(10,'Mid-Year Report with updated transcripts '),(12,'Proof of Graduation'),(13,'Essays'),(14,'Essays Adicionales'),(19,'AP Test Score'),(20,'AP Class Score'),(21,'IB Exams'),(23,'IELTS Score'),(24,'Resume'),(25,'Portfolio'),(33,'Admission Interview necesaria'),(34,'Admission Interview recomendable'),(35,'Off Campus Inteviews'),(36,'Campus Visit necesaria'),(37,'Campus Visit recomendable'),(38,'Financial Form, Certification of Finance, Affidavit'),(39,'Copia del Pasaporte del estudiante'),(40,'Copia de Awards'),(41,'Copia Diplomas'),(42,'Copia o Certificación de Cursos'),(43,'Copia o Certificación de Clases con créditos'),(44,'Copia o Certificación de Clases sin créditos'),(45,'Copia o Certificación de Cursos ON LINE'),(46,'Certificación de Veranos'),(47,'Notas Adicionales'),(48,'Misceláneos'),(49,'Selecciona Escuela o Division '),(53,'Veranos / Summer'),(54,'Early Decision'),(55,'Early Decision I'),(58,'Early Decision II'),(59,'Early Action'),(60,'Single Choice Early Decision'),(61,'Regular Admision'),(62,'Spring Term'),(63,'Summer Term'),(64,'Winter Term'),(66,'Common Application'),(67,'Universal College Application'),(68,'Aplicación Propia de la Institución'),(69,'Aplicación Estatal'),(70,'Final Transcript'),(71,'SAT Subjects'),(72,'ACT con writing section'),(73,'ACT sin writing section'),(74,'Official Toefl Score con campo para score solicitado por la institucion y para codigo'),(75,'Requerimientos especiales con escuelas o programas'),(76,'Counselor or Principal Recommendation Letter con formato de la Institución'),(77,'Counselor or Principal Recommendation Letter sin formato de la Institución'),(78,'Academic Recommendation Letter con formato de la Institución'),(79,'Academic Recommendation Letter sin formato de la Institución'),(80,'Personal Recommendation Letter con formato de la Institución'),(81,'Personal Recommendation Letter sin formato de la Institución');
/*!40000 ALTER TABLE `requirements_fields` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-26  7:47:56
