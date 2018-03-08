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
  `email` varchar(45) NOT NULL,
  `acc_name` varchar(100) NOT NULL,
  `acc_cv` mediumblob NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `fac_name_UNIQUE` (`acc_name`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acc_data`
--

LOCK TABLES `acc_data` WRITE;
/*!40000 ALTER TABLE `acc_data` DISABLE KEYS */;
INSERT INTO `acc_data` VALUES ('2160819@slu.edu.ph','Nikki Ganotan','2160819@slu.edu.ph.doc'),('2162253@slu.edu.ph','Jerome Francis Salazar','2162253@slu.edu.ph.doc'),('2162752@slu.edu.ph','Mitch Ainslie Galatcha','test.docx'),('2163907@slu.edu.ph','Dean Christian Baguisi','2163907@slu.edu.ph.doc'),('test@test.com','test','test@test.com.docx');
/*!40000 ALTER TABLE `acc_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`email`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  CONSTRAINT `email` FOREIGN KEY (`email`) REFERENCES `acc_data` (`email`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES ('2160819@slu.edu.ph','$2y$10$GujrwUvZMt8joSJXbTZKYOeVEguJ6t.EJJEKwTpVleuUGv/k6psia','0'),('2162253@slu.edu.ph','$2y$10$R4hKRGFYDiuXUPCYapmvvO4qdhM.G1rJpUHk7Yz3AENFDUnvMj22S','0'),('2162752@slu.edu.ph','$2y$10$I2A8/EXiw.kad4yizOMSRupHsvX7CUNfEnOmPsq883oKGjf1tujr6','0'),('2163907@slu.edu.ph','$2y$10$xPK3JMUEoTub2uRwRtjkuu6.e9G2dnjYk0e7UmZRm4.0Pij/lzlk.','0'),('test@test.com','$2y$10$sFmm4pOXSli9qqc6pIzzPeOxnuXTnxuiXid9y24OU3SvU9XXXU6SO','0');
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

-- Dump completed on 2018-03-08 17:48:25
