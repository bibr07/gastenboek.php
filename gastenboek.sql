-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: localhost    Database: gastenboek
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.14-MariaDB

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
-- Table structure for table `gasten`
--

DROP TABLE IF EXISTS `gasten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gasten` (
  `gebruikersId` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikersnaam` varchar(10) NOT NULL,
  `emailadres` varchar(40) NOT NULL,
  `wachtwoord` varchar(10) NOT NULL,
  PRIMARY KEY (`gebruikersId`),
  UNIQUE KEY `emailadres` (`emailadres`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gasten`
--

LOCK TABLES `gasten` WRITE;
/*!40000 ALTER TABLE `gasten` DISABLE KEYS */;
INSERT INTO `gasten` VALUES (1,'bibr','biekebruneel@hotmail.com','test'),(2,'Sofietjuuh','ikbensofie@gmail.com','sofie'),(21,'regina','regina@onceuponatime.be','sprookje'),(22,'bigDD','dieter.declerck@roeselare.be','dieter');
/*!40000 ALTER TABLE `gasten` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reacties`
--

DROP TABLE IF EXISTS `reacties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reacties` (
  `reactienummer` int(11) NOT NULL AUTO_INCREMENT,
  `reactie` varchar(400) NOT NULL,
  `gebruikersnaam` varchar(10) NOT NULL,
  `geposteDatum` date NOT NULL,
  `rating` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`reactienummer`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reacties`
--

LOCK TABLES `reacties` WRITE;
/*!40000 ALTER TABLE `reacties` DISABLE KEYS */;
INSERT INTO `reacties` VALUES (1,'Ik vond het hotel niet zo proper','Sofietjuuh','2008-12-24',2),(2,'Het was een geweldig hotel met zeer lekker eten!','bibr07','2002-02-01',5),(3,'Na een tweede bezoek opnieuw zeer overtuigd van de kwaliteit van het eten','bibr07','2019-05-05',5),(4,'Ik snap niet waarom ik hier nog eens naar toe ben gekomen ...','Sofietjuuh','2019-05-05',1),(6,'Spijtig dat ze er geen rode appels serveerden','regina','2019-05-05',4),(8,'Het hotel was wel ok. Het personeel was vriendelijk, maar als je langer dan 2 weken blijft, is het eten wel niet zo lekker (elke dag hetzelfde)','bigDD','2019-05-05',3);
/*!40000 ALTER TABLE `reacties` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-08 14:15:37
