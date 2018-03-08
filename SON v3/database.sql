CREATE DATABASE  IF NOT EXISTS `son` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `son`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: son
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `acc_data`
--

DROP TABLE IF EXISTS `acc_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acc_data` (
  `idno` varchar(6) NOT NULL,
  `acc_name` varchar(100) NOT NULL,
  `acc_cv` mediumblob NOT NULL,
  PRIMARY KEY (`idno`),
  UNIQUE KEY `idno_UNIQUE` (`idno`),
  UNIQUE KEY `fac_name_UNIQUE` (`acc_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acc_data`
--

LOCK TABLES `acc_data` WRITE;
/*!40000 ALTER TABLE `acc_data` DISABLE KEYS */;
INSERT INTO `acc_data` VALUES ('FC0000','Mitch Ainslie V. Galatcha','Doc1.docx'),('FC0001','Another Testing V. User','xD.docx'),('FC0002','Hisname is HisorHer','FC0002.docx'),('FC0003','This is My Name','FC0003.pdf'),('FC0004','MyName is Mitch','FC0004.docx'),('fc0005','This is Example1','fc0005.docx'),('FC0006','This is an Example2','FC0006.docx'),('test','test','test.docx');
/*!40000 ALTER TABLE `acc_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `idno` varchar(6) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`idno`),
  UNIQUE KEY `idaccounts_UNIQUE` (`idno`),
  CONSTRAINT `idno` FOREIGN KEY (`idno`) REFERENCES `acc_data` (`idno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES ('FC0000','$2y$10$YTIfH4Fy48qQh7j3JrZXdu8fw5LK5JlvtVfWuaowWQIwF6dn5Zb3C','0'),('FC0001','$2y$10$n4krlJdi3AZnvTdd9DVhveZzRJy4eAuyqR2yifGugD4VG6jCcyWHO','1'),('FC0002','$2y$10$A/vIqWP1lH2JwcqWaoXJk.ooorOc0aLRWMXD4uLpwi0.4ePu.sw/C','1'),('FC0003','$2y$10$wGcxzeLmoIGli6b6mmB1cOyLyRgRQ6voSLI4vhBEj8k1ol/ZSXYDm','1'),('FC0004','$2y$10$pAlHKpws0CpFc8OrNAX5huS3NFfLRB.pm8Ogebw0m1ZhyRhYkjXd2','0'),('fc0005','$2y$10$e3cT4QHBfEK25VqgSOuc7u7TM0sYUmYkJqYOYv8AOXYLdrcPYO9AW','0'),('FC0006','$2y$10$KGwELcMrNO9aov4avQHIwu0sL0/YExDRghqXyjHrozpNf37ISbj8a','1'),('test','$2y$10$ZcGcgTNYbQvnz.8Hp2aiNOC3/b48qZon3o2iyXvhKjgNMvf2xzyG6','0');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-08  8:48:24
