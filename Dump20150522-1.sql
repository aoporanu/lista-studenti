CREATE DATABASE  IF NOT EXISTS `c9` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `c9`;
-- MySQL dump 10.13  Distrib 5.6.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: c9
-- ------------------------------------------------------
-- Server version	5.6.24-0ubuntu2

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
-- Table structure for table `cursuri`
--

DROP TABLE IF EXISTS `cursuri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursuri` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `semestru` int(1) NOT NULL,
  `an` int(1) NOT NULL,
  `domeniu` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursuri`
--

LOCK TABLES `cursuri` WRITE;
/*!40000 ALTER TABLE `cursuri` DISABLE KEYS */;
INSERT INTO `cursuri` VALUES (1,'Utilizarea sistemelor de operare (Seria: 1CA, 1CB, CC)',NULL,NULL,NULL,1,1,'licenta'),(2,'Psihologia educaÅ£iei (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(3,'Proiectare logicÄƒ (Seria: CC)',NULL,NULL,NULL,1,1,'licenta'),(4,'Proiectare logicÄƒ (Seria: CB)',NULL,NULL,NULL,1,1,'licenta'),(5,'Proiectare logicÄƒ (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(6,'Programarea calculatoarelor (Seria: CC)',NULL,NULL,NULL,1,1,'licenta'),(7,'Programarea calculatoarelor (Seria: CB)',NULL,NULL,NULL,1,1,'licenta'),(8,'Programarea calculatoarelor (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(9,'MecanicÄƒ (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(10,'MatematicÄƒ 2 (Seria: CC)',NULL,NULL,NULL,1,1,'licenta'),(11,'MatematicÄƒ 2 (Seria: CB)',NULL,NULL,NULL,1,1,'licenta'),(12,'MatematicÄƒ 2 (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(13,'MatematicÄƒ 1 (Seria: CC)',NULL,NULL,NULL,1,1,'licenta'),(14,'MatematicÄƒ 1 (Seria: CB)',NULL,NULL,NULL,1,1,'licenta'),(15,'MatematicÄƒ 1 (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(16,'Limba strÄƒinÄƒ 1 (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(17,'LogicÄƒ (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(18,'Istoria religiilor (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(19,'Introducere Ã®n informaticÄƒ (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(20,'Istoria filosofiei (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(21,'GraficÄƒ inginereascÄƒ (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(22,'EducaÅ£ie fizicÄƒ ÅŸi sport 1 (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(23,'Doctrine politice (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(24,'CulturÄƒ ÅŸi civilizaÅ£ie (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(25,'Biochimie (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(26,'Proiectare logicÄƒ (Seria: CC)',NULL,NULL,NULL,1,1,'licenta'),(27,'Proiectare logicÄƒ (Seria: CB)',NULL,NULL,NULL,1,1,'licenta'),(28,'Proiectare logicÄƒ (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(29,'Programarea calculatoarelor (Seria: CC)',NULL,NULL,NULL,1,1,'licenta'),(30,'Programarea calculatoarelor (Seria: CB)',NULL,NULL,NULL,1,1,'licenta'),(31,'Programarea calculatoarelor (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(32,'MatematicÄƒ 2 (Seria: CC)',NULL,NULL,NULL,1,1,'licenta'),(33,'MatematicÄƒ 2 (Seria: CB)',NULL,NULL,NULL,1,1,'licenta'),(34,'MatematicÄƒ 2 (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(35,'MatematicÄƒ 1 (Seria: CB)',NULL,NULL,NULL,1,1,'licenta'),(36,'MatematicÄƒ 1 (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(37,'Introducere Ã®n informaticÄƒ (Seria: CA)',NULL,NULL,NULL,1,1,'licenta'),(38,'Tehnici de comunicare',NULL,NULL,NULL,2,1,'licenta'),(39,'Structuri de date (Seria: CC)',NULL,NULL,NULL,2,1,'licenta'),(40,'Structuri de date (Seria: CB)',NULL,NULL,NULL,2,1,'licenta'),(41,'Structuri de date (Seria: CA)',NULL,NULL,NULL,2,1,'licenta'),(42,'Metode numerice (CA-CB-CC)',NULL,NULL,NULL,2,1,'licenta'),(43,'MatematicÄƒ 3 (Seria: CA)',NULL,NULL,NULL,2,1,'licenta'),(44,'Instrumente informatice (Seria: CA)',NULL,NULL,NULL,2,1,'licenta'),(45,'FizicÄƒ computaÅ£ionalÄƒ (Seria: CA)',NULL,NULL,NULL,2,1,'licenta'),(46,'FizicÄƒ (Seria: CC)',NULL,NULL,NULL,2,1,'licenta'),(47,'FizicÄƒ (Seria: CB)',NULL,NULL,NULL,2,1,'licenta'),(48,'FizicÄƒ (Seria: CA)',NULL,NULL,NULL,2,1,'licenta'),(49,'Bazele electrotehnicii (Seria: CC)',NULL,NULL,NULL,2,1,'licenta'),(50,'Bazele electrotehnicii (Seria: CB)',NULL,NULL,NULL,2,1,'licenta'),(51,'Teoria sistemelor (Seria: CC)',NULL,NULL,NULL,1,2,'licenta'),(52,'Teoria sistemelor (Seria: CB)',NULL,NULL,NULL,1,2,'licenta'),(53,'Teoria sistemelor (Seria: CA)',NULL,NULL,NULL,1,2,'licenta'),(54,'Programare orientatÄƒ pe obiecte (Seria: CC)',NULL,NULL,NULL,1,2,'licenta'),(55,'Programare orientatÄƒ pe obiecte (Seria: CB)',NULL,NULL,NULL,1,2,'licenta'),(56,'Programare orientatÄƒ pe obiecte (Seria: CA)',NULL,NULL,NULL,1,2,'licenta'),(57,'Introducere Ã®n organizarea calculatoarelor ÅŸi limbaje de asamblare (Seria: 2CA, 2CB, 2CC)',NULL,NULL,NULL,1,2,'licenta'),(58,'Elemente de electronicÄƒ analogicÄƒ (CA, CB, CC)',NULL,NULL,NULL,1,2,'licenta'),(59,'Analiza algoritmilor (Seria: CC)',NULL,NULL,NULL,1,2,'licenta'),(60,'Analiza algoritmilor (Seria: CB)',NULL,NULL,NULL,1,2,'licenta'),(61,'Analiza algoritmilor (Seria: CA)',NULL,NULL,NULL,1,2,'licenta'),(62,'Paradigme de programare (Seria: CB)',NULL,NULL,NULL,2,2,'licenta'),(63,'Paradigme de programare (CA &amp; CC)',NULL,NULL,NULL,2,2,'licenta'),(64,'Protocoale de comunicaÅ£ii (CA-CB-CC)',NULL,NULL,NULL,2,2,'licenta'),(65,'Proiectarea algoritmilor (Seriile: CA-CB-CC)',NULL,NULL,NULL,2,2,'licenta'),(66,'ElectronicÄƒ digitalÄƒ (Seria: CC)',NULL,NULL,NULL,2,2,'licenta'),(67,'ElectronicÄƒ digitalÄƒ (Seria: CB, CC)',NULL,NULL,NULL,2,2,'licenta'),(68,'ElectronicÄƒ digitalÄƒ (Seria: CA)',NULL,NULL,NULL,2,2,'licenta'),(69,'Calculatoare numerice I (Seria: CC)',NULL,NULL,NULL,2,2,'licenta'),(70,'Calculatoare numerice I (Seria: CB)',NULL,NULL,NULL,2,2,'licenta'),(71,'Calculatoare numerice I (Seria: CA)',NULL,NULL,NULL,2,2,'licenta'),(72,'AchiziÅ£ii de date (Seria: CA)',NULL,NULL,NULL,2,2,'licenta'),(73,'ReÅ£ele locale (Seria: CA)',NULL,NULL,NULL,1,3,'licenta'),(74,'ReÅ£ele locale (Serii multiple)',NULL,NULL,NULL,1,3,'licenta'),(75,'Limbaje formale si automate (Seria: CC)',NULL,NULL,NULL,1,3,'licenta'),(76,'Limbaje formale si automate (Seria: CA &amp; CB)',NULL,NULL,NULL,1,3,'licenta'),(77,'Elemente de graficÄƒ pe calculator (Seria: CC)',NULL,NULL,NULL,1,3,'licenta'),(78,'Elemente de graficÄƒ pe calculator (Seria: CB)',NULL,NULL,NULL,1,3,'licenta'),(79,'Elemente de graficÄƒ pe calculator (Seria: CA)',NULL,NULL,NULL,1,3,'licenta'),(80,'Calculatoare numerice II (Seria: CC)',NULL,NULL,NULL,1,3,'licenta'),(81,'Calculatoare numerice II (Seria: CB)',NULL,NULL,NULL,1,3,'licenta'),(82,'Calculatoare numerice II (Seria: CA)',NULL,NULL,NULL,1,3,'licenta'),(83,'Algoritmi paraleli ÅŸi distribuiÅ£i (Seria: CA, CB, CC)',NULL,NULL,NULL,1,3,'licenta'),(84,'Baze de date I (Seria: CC)',NULL,NULL,NULL,2,3,'licenta'),(85,'Sisteme de operare (Seria: 3CA, 3CB, 3CC)',NULL,NULL,NULL,2,3,'licenta'),(86,'Proiectarea cu microprocesoare',NULL,NULL,NULL,2,3,'licenta'),(87,'Marketing strategic (Seria: CA)',NULL,NULL,NULL,2,3,'licenta'),(88,'Marketing industrial (Seria: CA)',NULL,NULL,NULL,2,3,'licenta'),(89,'Ingineria programelor',NULL,NULL,NULL,2,3,'licenta'),(90,'Ingineria calculatoarelor',NULL,NULL,NULL,2,3,'licenta'),(91,'Baze de date I (Seria: CB)',NULL,NULL,NULL,2,3,'licenta'),(92,'Baze de date I (Seria: CA)',NULL,NULL,NULL,2,3,'licenta'),(93,'Arhitectura sistemelor de calcul',NULL,NULL,NULL,2,3,'licenta'),(94,'Utilizarea bazelor de date (Seria: C5)',NULL,NULL,NULL,1,4,'licenta'),(95,'Sisteme de programe pentru reÅ£ele de calculatoare (Seria: C3)',NULL,NULL,NULL,1,4,'licenta'),(96,'Sisteme de prelucrare graficÄƒ (Seria: C4)',NULL,NULL,NULL,1,4,'licenta'),(97,'Structuri multiprocesor (Seria: C1)',NULL,NULL,NULL,1,4,'licenta'),(98,'Sisteme cu microprocesoare (Seria: C1)',NULL,NULL,NULL,1,4,'licenta'),(99,'Sisteme incorporate (Seria: C2)',NULL,NULL,NULL,1,4,'licenta'),(100,'Procesarea semnalelor (Seria: C1)',NULL,NULL,NULL,1,4,'licenta'),(101,'Proiectarea reÅ£elelor (Seria: C1)',NULL,NULL,NULL,1,4,'licenta'),(102,'Managementul proiectelor software (Seria: C5)',NULL,NULL,NULL,1,4,'licenta'),(103,'Integrarea sistemelor informatice (Seria: C5)',NULL,NULL,NULL,1,4,'licenta'),(104,'InteracÅ£iunea om-calculator (Seria: C1)',NULL,NULL,NULL,1,4,'licenta'),(105,'InteligenÅ£Äƒ artificialÄƒ (Seria: C3,C4)',NULL,NULL,NULL,1,4,'licenta'),(106,'Evaluarea performanÅ£elor (Seria: C1)',NULL,NULL,NULL,1,4,'licenta'),(107,'Compilatoare (Seria: C3)',NULL,NULL,NULL,1,4,'licenta'),(108,'Baze de date II (Seria: C1)',NULL,NULL,NULL,1,4,'licenta'),(109,'Arhitecturi ÅŸi prelucrÄƒri paralele (C1)',NULL,NULL,NULL,1,4,'licenta'),(110,'AplicaÅ£ii integrate pentru intreprinderi (Seria: C1)',NULL,NULL,NULL,1,4,'licenta'),(111,'Lucrare Licenta 2015',NULL,NULL,NULL,2,4,'licenta'),(112,'VLSI I (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(113,'Testarea sistemelor (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(114,'Sisteme tolerante la defecte (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(115,'Sisteme de operare II (Seria: C3)',NULL,NULL,NULL,2,4,'licenta'),(116,'Sisteme CAD/CASE (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(117,'Programare web (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(118,'Proiectarea si dezvoltarea serviciilor distribuite (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(119,'Instrumente pentru dezvoltarea programelor (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(120,'ÃŽnvÄƒÅ£are automatÄƒ (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(121,'E-commerce (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(122,'VLSI I (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(123,'Testarea sistemelor (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(124,'Sisteme tolerante la defecte (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(125,'Sisteme de operare II (Seria: C3)',NULL,NULL,NULL,2,4,'licenta'),(126,'Sisteme CAD/CASE (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(127,'Programare web (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(128,'Proiectarea si dezvoltarea serviciilor distribuite (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(129,'Instrumente pentru dezvoltarea programelor (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(130,'ÃŽnvÄƒÅ£are automatÄƒ (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(131,'E-commerce (Seria: C1)',NULL,NULL,NULL,2,4,'licenta'),(132,'Tehnici de Modelare 3D',NULL,NULL,NULL,1,1,'master'),(133,'Introducere in Realitatea Virtuala',NULL,NULL,NULL,1,1,'master'),(134,'InfrastructurÄƒ È™i servicii pentru reÈ›ele mobile (Seria: SRIC)',NULL,NULL,NULL,1,1,'master'),(135,'Computer Vision (Grupul G)',NULL,NULL,NULL,1,1,'master'),(136,'Tehnici de comunicare ÅŸi scriere tehnicÄƒ (Grupul G)',NULL,NULL,NULL,1,1,'master'),(137,'Type Systems and Functional Programming (Seria: AI)',NULL,NULL,NULL,1,1,'master'),(138,'Tehnici de programare pentru prelucrÄƒri grafice de (Seria: AAC)',NULL,NULL,NULL,1,1,'master'),(139,'Securitatea sistemelor informatice (Seria: ABD)',NULL,NULL,NULL,1,1,'master'),(140,'Sisteme de operare (practic) (SCPD)',NULL,NULL,NULL,1,1,'master'),(141,'Computer and Network Security (SCPD)',NULL,NULL,NULL,1,1,'master'),(142,'Securitatea calculatoarelor ÅŸi a reÅ£elelor (SRIC)',NULL,NULL,NULL,1,1,'master'),(143,'Structuri avansate vlsi (Seria: AAC)',NULL,NULL,NULL,1,1,'master'),(144,'Sisteme avansate pentru baze de date (Seria: ABD)',NULL,NULL,NULL,1,1,'master'),(145,'Sisteme adaptive ÅŸi colaborative (Seria: AAC)',NULL,NULL,NULL,1,1,'master'),(146,'Sisteme avansate de analizÄƒ ÅŸi prelucrare a imagin (Seria: AAC)',NULL,NULL,NULL,1,1,'master'),(147,'Reprezentarea cunostintelor (Seria: AAC)',NULL,NULL,NULL,1,1,'master'),(148,'Parallel Programming (SCPD)',NULL,NULL,NULL,1,1,'master'),(149,'Managementul resurselor umane (Seria: AAC)',NULL,NULL,NULL,1,1,'master'),(150,'Management financiar (Seria: AAC)',NULL,NULL,NULL,1,1,'master'),(151,'Metode ÅŸi algoritmi de planificare (Seria: SCPD)',NULL,NULL,NULL,1,1,'master'),(152,'Knowledge Representation and Reasoning (Master AI &amp; ISI)',NULL,NULL,NULL,1,1,'master'),(153,'Implementarea sistemelor de baze de date (Seria: ABD)',NULL,NULL,NULL,1,1,'master'),(154,'Gestiunea serviciilor de reÅ£ea (SRIC)',NULL,NULL,NULL,1,1,'master'),(155,'Geometrie computationalÄƒ (Seria: AAC)',NULL,NULL,NULL,1,1,'master'),(156,'E-government (Seria: AAC)',NULL,NULL,NULL,1,1,'master'),(157,'Data mining (Seria: AI, SEM, DMKM)',NULL,NULL,NULL,1,1,'master'),(158,'Dezvoltarea aplicaÅ£iilor pentru Internet (Java EE)',NULL,NULL,NULL,1,1,'master'),(159,'Cloud computing (Seria: AAC)',NULL,NULL,NULL,1,1,'master'),(160,'Circuite inteligente bazate pe logicÄƒ fuzzy (Seria: AAC)',NULL,NULL,NULL,1,1,'master'),(161,'Cercetare (Seria: SSA1)',NULL,NULL,NULL,1,1,'master'),(162,'Cercetare (Seria: SRIC1)',NULL,NULL,NULL,1,1,'master'),(163,'Cercetare (Seria: SCPD1)',NULL,NULL,NULL,1,1,'master'),(164,'Cercetare (Seria: MTI1)',NULL,NULL,NULL,1,1,'master'),(165,'Cercetare (Seria: ISI1)',NULL,NULL,NULL,1,1,'master'),(166,'Cercetare (Seria: IA1)',NULL,NULL,NULL,1,1,'master'),(167,'Cercetare (Seria: GMRV1)',NULL,NULL,NULL,1,1,'master'),(168,'Cercetare (Seria: EGOV1)',NULL,NULL,NULL,1,1,'master'),(169,'Cercetare (Seria: ABD1)',NULL,NULL,NULL,1,1,'master'),(170,'Cercetare (Seria: AAC1)',NULL,NULL,NULL,1,1,'master'),(171,'Architecture of Service Oriented Information Systems(Seria: ABD)',NULL,NULL,NULL,1,1,'master'),(172,'CATEGORII SI COMPUTER SCIENCE',NULL,NULL,NULL,1,1,'master'),(173,'Introduction to robotics',NULL,NULL,NULL,2,1,'master'),(174,'Securizarea avansata a sistemelor de calcul',NULL,NULL,NULL,2,1,'master'),(175,'Administrarea bazelor de date',NULL,NULL,NULL,2,1,'master'),(176,'Algoritmi distribuiÅ£i (Seria: AAC)',NULL,NULL,NULL,2,1,'master'),(177,'Antreprenoriat ÅŸi management tehnologic (Serii Multiple)',NULL,NULL,NULL,2,1,'master'),(178,'AplicaÅ£ii web semantice (Seria: AAC)',NULL,NULL,NULL,2,1,'master'),(179,'Calcul cluster ÅŸi grid',NULL,NULL,NULL,2,1,'master'),(180,'Curs avansat de ingineria programelor (Seria: MTI)',NULL,NULL,NULL,2,1,'master'),(181,'Data mining ÅŸi data warehousing (Seria: ABD, MTI, SSA)',NULL,NULL,NULL,2,1,'master'),(182,'Fundamentele Stiintei Serviciului (Seria: SSA)',NULL,NULL,NULL,2,1,'master'),(183,'Instrumente case pentru proiectarea aplicaÅ£iilor c (Seria: AAC)',NULL,NULL,NULL,2,1,'master'),(184,'Managementul proiectelor de e-guvernare (Seria: AAC)',NULL,NULL,NULL,2,1,'master'),(185,'Metodologia pentru consultanta serviciilor informa (Seria: AAC)',NULL,NULL,NULL,2,1,'master'),(186,'Modelarea informaticÄƒ a proceselor complexe de afaceri',NULL,NULL,NULL,2,1,'master'),(187,'Multi-agent Systems (Seria: AI)',NULL,NULL,NULL,2,1,'master'),(188,'Natural Language Processing (Seria: AAC)',NULL,NULL,NULL,2,1,'master'),(189,'NDK Android',NULL,NULL,NULL,2,1,'master'),(190,'NoÅ£iuni avansate de baze de date (Seria: ABD)',NULL,NULL,NULL,2,1,'master'),(191,'Prelucrari distribuite in Internet (Seria: ISI)',NULL,NULL,NULL,2,1,'master'),(192,'Psihologia utilizatorului de e-servicii (Seria: AAC)',NULL,NULL,NULL,2,1,'master'),(193,'Securizarea reÅ£elelor cu echipamente dedicate (SRIC)',NULL,NULL,NULL,2,1,'master'),(194,'Servicii Avansate pentru ISP (Seria: SRIC)',NULL,NULL,NULL,2,1,'master'),(195,'Sisteme cu microprocesoare avansate (Seria: AAC)',NULL,NULL,NULL,2,1,'master'),(196,'Sisteme de procesare Ã®n timp real cu microprocesoa (Seria: AAC)',NULL,NULL,NULL,2,1,'master'),(197,'Sisteme distribuite (Seria: SCPD)',NULL,NULL,NULL,2,1,'master'),(198,'Sisteme multi-agent (Master: ISI)',NULL,NULL,NULL,2,1,'master'),(199,'Sisteme ÅŸi tehnici multimedia (Seria: AAC)',NULL,NULL,NULL,2,1,'master'),(200,'Symbolic and Statistical Learning (Seria: AI)',NULL,NULL,NULL,2,1,'master'),(201,'Tehnici de vizualizare a datelor volumetrice si animatie pe calculator (Seria: GMRV)',NULL,NULL,NULL,2,1,'master'),(202,'Transmisia datelor multimedia Ã®n reÅ£ele de calculatoare (Seria: GMRV)',NULL,NULL,NULL,2,1,'master'),(203,'Securitatea informaticÄƒ (Seria: eGov)',NULL,NULL,NULL,1,2,'master'),(204,'Sisteme de Ã®ncredere (Seria: AAC)',NULL,NULL,NULL,1,2,'master'),(205,'Dezvoltarea Sistemelor de Realitate VirtualÄƒ (Seria: GMRV)',NULL,NULL,NULL,1,2,'master'),(206,'Politici ÅŸi strategii (Seria: AAC)',NULL,NULL,NULL,1,2,'master'),(207,'Politici Ã®n sisteme distribuite (Seria: AAC)',NULL,NULL,NULL,1,2,'master'),(208,'Proiectarea aplicaÅ£iilor j2ee (Seria: AAC)',NULL,NULL,NULL,1,2,'master'),(209,'Neural Networks (Seria: AAC)',NULL,NULL,NULL,1,2,'master'),(210,'Metode ÅŸi tehnici de programare Ã®n High Performance Computing (AAC)',NULL,NULL,NULL,1,2,'master'),(211,'Managementul marketingului (Seria: AAC)',NULL,NULL,NULL,1,2,'master'),(212,'Motoare de graficÄƒ 3d Ã®n timp real (Seria: GMRV)',NULL,NULL,NULL,1,2,'master'),(213,'Metode avansate Ã®n sisteme distribuite (Seria: AAC)',NULL,NULL,NULL,1,2,'master'),(214,'Luarea deciziilor in e-guvernare (Seria: eGOV)',NULL,NULL,NULL,1,2,'master'),(215,'Knowledge Engineering and Services Ecosystem (Seria: AAC)',NULL,NULL,NULL,1,2,'master'),(216,'Integrarea ÅŸi managementul serviciilor (Seria: AAC)',NULL,NULL,NULL,1,2,'master'),(217,'Criptografie (Seria: AAC)',NULL,NULL,NULL,1,2,'master'),(218,'Cercetare (Seria: SSA2)',NULL,NULL,NULL,1,2,'master'),(219,'Cercetare (Seria: SRIC2)',NULL,NULL,NULL,1,2,'master'),(220,'Cercetare (Seria: SCPD2)',NULL,NULL,NULL,1,2,'master'),(221,'Cercetare (Seria: MTI2)',NULL,NULL,NULL,1,2,'master'),(222,'Cercetare (Seria: ISI2)',NULL,NULL,NULL,1,2,'master'),(223,'Cercetare (Seria: IA2)',NULL,NULL,NULL,1,2,'master'),(224,'Cercetare (Seria: GMRV2)',NULL,NULL,NULL,1,2,'master'),(225,'Cercetare (Seria: EGOV2)',NULL,NULL,NULL,1,2,'master'),(226,'Cercetare (Seria: ABD2)',NULL,NULL,NULL,1,2,'master'),(227,'Cercetare (Seria: AAC2)',NULL,NULL,NULL,1,2,'master'),(228,'Advanced Topics in Computer and Network Security (Seria: AAC)',NULL,NULL,NULL,1,2,'master'),(229,'Auditarea securitÄƒÅ£ii reÅ£elelor (Seria: SRIC)',NULL,NULL,NULL,1,2,'master'),(230,'Arhitectura sistemelor cluster si grid / Sisteme paralele si distribuite',NULL,NULL,NULL,1,2,'master'),(231,'Antreprenoriat, protecÅ£ia proprietÄƒÅ£ii intelectual (Seria: AAC)',NULL,NULL,NULL,1,2,'master'),(232,'Retele Wireless de Senzori (Seria AAC)',NULL,NULL,NULL,1,2,'master'),(233,'Dezvoltarea aplicatiilor grafice pentru dispozitive mobile (Seria: GMRV)',NULL,NULL,NULL,1,2,'master'),(234,'Analiza si Extragerea Automata a Continutului Documentelor (Seria: GMRV)',NULL,NULL,NULL,1,2,'master'),(235,'Software Verification and Validation (Seria: AAC)',NULL,NULL,NULL,1,2,'master'),(236,'Self-organizing Systems (Master AI)',NULL,NULL,NULL,1,2,'master'),(237,'Sisteme de regÄƒsire a informaÅ£iei (Seria: AAC)',NULL,NULL,NULL,1,2,'master'),(238,'Securitatea informaticÄƒ (Seria: SSA, ISI)',NULL,NULL,NULL,1,2,'master');
/*!40000 ALTER TABLE `cursuri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examene`
--

DROP TABLE IF EXISTS `examene`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examene` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prof` int(4) NOT NULL,
  `id_curs` int(4) NOT NULL,
  `id_sala` int(4) NOT NULL,
  `created` datetime DEFAULT NULL,
  `start` time DEFAULT NULL,
  `data` date DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `finis` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examene`
--

LOCK TABLES `examene` WRITE;
/*!40000 ALTER TABLE `examene` DISABLE KEYS */;
INSERT INTO `examene` VALUES (1,9,1,2,'2015-05-14 13:10:52','19:37:00','2015-05-20','2015-05-14 13:10:52','21:38:00'),(2,9,1,1,'2015-05-14 13:12:05','17:00:51','2015-05-14','2015-05-14 13:12:05',NULL),(3,130,1,0,'2015-05-14 14:02:00','17:01:57','2015-05-14','2015-05-14 14:02:00',NULL),(4,9,1,4,'2015-05-15 05:34:11','08:34:09','2015-05-15','2015-05-15 05:34:11',NULL),(5,9,1,6,'2015-05-15 16:18:18','00:00:11','0000-00-00','2015-05-15 16:18:18',NULL),(6,9,85,5,'2015-05-17 12:32:37','12:30:30','2015-05-18','2015-05-17 12:32:37',NULL),(7,9,2,7,'2015-05-17 23:55:17','23:55:04','2015-05-17','2015-05-17 23:55:17',NULL),(8,9,1,8,'2015-05-21 09:57:59','10:00:00','0000-00-00','2015-05-21 09:57:59','12:00:00'),(9,132,6,9,'2015-05-22 16:52:17','17:00:00','0000-00-00','2015-05-22 16:52:17','19:00:00'),(10,132,6,0,'2015-05-22 16:54:19','00:00:00','0000-00-00','2015-05-22 16:54:19','00:00:00');
/*!40000 ALTER TABLE `examene` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupe`
--

DROP TABLE IF EXISTS `grupe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupe` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nume` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupe`
--

LOCK TABLES `grupe` WRITE;
/*!40000 ALTER TABLE `grupe` DISABLE KEYS */;
INSERT INTO `grupe` VALUES (1,'341C5'),(2,'342CC');
/*!40000 ALTER TABLE `grupe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupe_curs`
--

DROP TABLE IF EXISTS `grupe_curs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupe_curs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `grupa` varchar(10) NOT NULL,
  `id_curs` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupe_curs`
--

LOCK TABLES `grupe_curs` WRITE;
/*!40000 ALTER TABLE `grupe_curs` DISABLE KEYS */;
INSERT INTO `grupe_curs` VALUES (3,'0',85),(4,'0',2),(5,'0',1),(6,'0',1),(8,'0',1),(9,'1',1),(10,'2',1),(11,'1',6),(12,'2',6);
/*!40000 ALTER TABLE `grupe_curs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preferinte_student`
--

DROP TABLE IF EXISTS `preferinte_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preferinte_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `examen_id` int(4) DEFAULT NULL,
  `preferinte` text,
  `user_id` int(4) NOT NULL,
  `ora` time DEFAULT NULL,
  `data` date DEFAULT NULL,
  `observatii` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preferinte_student`
--

LOCK TABLES `preferinte_student` WRITE;
/*!40000 ALTER TABLE `preferinte_student` DISABLE KEYS */;
INSERT INTO `preferinte_student` VALUES (1,1,NULL,4,'10:22:05','2015-05-19','                                                                                    asdasd                                                                        ');
/*!40000 ALTER TABLE `preferinte_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profii_curs`
--

DROP TABLE IF EXISTS `profii_curs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profii_curs` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `id_prof` int(4) NOT NULL,
  `id_curs` int(4) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `sala_curs` int(4) DEFAULT NULL,
  `grupe` varchar(4) DEFAULT NULL,
  `preferinte_data` date DEFAULT NULL,
  `preferinte_ora` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=358 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profii_curs`
--

LOCK TABLES `profii_curs` WRITE;
/*!40000 ALTER TABLE `profii_curs` DISABLE KEYS */;
INSERT INTO `profii_curs` VALUES (357,132,6,'2015-05-22 15:56:58','2015-05-22 15:56:58',NULL,'',NULL,NULL);
/*!40000 ALTER TABLE `profii_curs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sali`
--

DROP TABLE IF EXISTS `sali`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sali` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nume` varchar(200) NOT NULL,
  `capacitate` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sali`
--

LOCK TABLES `sali` WRITE;
/*!40000 ALTER TABLE `sali` DISABLE KEYS */;
INSERT INTO `sali` VALUES (1,'Leu',200),(2,'C30',240),(3,'',0),(4,'A02Leu',218),(5,'A04Leu',84),(6,'EC105',171),(7,'EC004',124),(8,'EC101',98),(9,'EC002',48),(10,'EC102',46),(11,'AN030',124),(12,'AN034',70),(13,'AN205',24),(14,'AN210',24),(15,'AN213',24),(16,'AN217',24),(17,'BN212',0),(18,'BN026',0);
/*!40000 ALTER TABLE `sali` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studenti_curs`
--

DROP TABLE IF EXISTS `studenti_curs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studenti_curs` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `id_student` int(4) NOT NULL,
  `id_prof` int(4) NOT NULL,
  `id_curs` int(4) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studenti_curs`
--

LOCK TABLES `studenti_curs` WRITE;
/*!40000 ALTER TABLE `studenti_curs` DISABLE KEYS */;
/*!40000 ALTER TABLE `studenti_curs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `role_id` int(1) NOT NULL,
  `password` varchar(200) NOT NULL,
  `grupa` varchar(10) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'alice','',NULL,'2015-05-20 08:42:04',0,'efd8568d8a591a2db0b48cb7428b025d','',NULL),(2,'prof1','prof1@profi.com','2015-05-01 12:31:05','2015-05-01 12:31:05',1,'a3dcb4d229de6fde0db5686dee47145d',NULL,NULL),(3,'acodev','laur@acodev.com',NULL,NULL,1,'a8f5f167f44f4964e6c998dee827110c','230A',NULL),(4,'laur.acodev','laur@acodev.com','2015-05-04 19:30:25','2015-05-18 00:56:45',2,'a3dcb4d229de6fde0db5686dee47145d','1',NULL),(5,'vladimir_cretu','','2015-05-12 12:54:53','2015-05-12 12:54:53',1,'05ea259151631c6eeaca1de3cde975f3',NULL,'Vladimir Cretu'),(6,'adrian-razvan_deaconescu','','2015-05-12 12:54:53','2015-05-12 12:54:53',1,'92459e1c5976222844c15ce9d3fdd682',NULL,'Adrian-Razvan Deaconescu'),(7,'alexandru_-_nicolae_heriÅžanu','','2015-05-12 12:54:53','2015-05-12 12:54:53',1,'dc4038b10cbb5da2cd586413e603137b',NULL,'Alexandru - Nicolae HERIÅžANU'),(8,'george_dumitru_cristian_milescu','','2015-05-12 12:54:53','2015-05-12 12:54:53',1,'1c9aeb9e35421276a0bd4cc23c650c62',NULL,'George Dumitru Cristian MILESCU'),(9,'marian_neagul','','2015-05-12 12:54:53','2015-05-12 12:54:53',1,'e80e8f67c85dd64a979cc146fcf04457',NULL,'Marian Neagul'),(10,'elearning_profesor','','2015-05-12 12:54:53','2015-05-12 12:54:53',1,'a35be411a508ba9adc3980ca72fa38a8',NULL,'Elearning PROFESOR'),(11,'razvan_victor_rughinis','','2015-05-12 12:54:53','2015-05-12 12:54:53',1,'1788417b686338b8a99ffcb14ac737d8',NULL,'Razvan Victor Rughinis'),(12,'laura-mihaela_vasilescu','','2015-05-12 12:54:53','2015-05-12 12:54:53',1,'c49b1c95c95f41357f4ff3dfb42555bb',NULL,'Laura-Mihaela VASILESCU'),(13,'adriana_beatrice_balgiu','','2015-05-12 14:46:07','2015-05-12 14:46:07',1,'02eab817f2cdccf25cb7c832e6c6555f',NULL,'Adriana Beatrice Balgiu'),(14,'serban_radu','','2015-05-12 14:46:08','2015-05-12 14:46:08',1,'b20b6daecebfecf7e1ecd12e00b0fe47',NULL,'Serban Radu'),(15,'irina_georgiana_mocanu','','2015-05-12 14:46:09','2015-05-12 14:46:09',1,'e86bafb57a99341cc6a5f7e3dbf452b3',NULL,'Irina Georgiana Mocanu'),(16,'vlad-valentin_posea','','2015-05-12 14:46:09','2015-05-12 14:46:09',1,'ee468f2afc45f8c9e39cff2cd343b628',NULL,'Vlad-Valentin Posea'),(17,'mugurel_andreica','','2015-05-12 14:46:09','2015-05-12 14:46:09',1,'ec893e24ff1b2b05d9c88ed28b6f73e9',NULL,'Mugurel Andreica'),(18,'alexandru_corneliu_olteanu','','2015-05-12 14:46:09','2015-05-12 14:46:09',1,'49fcb574818e043f9b860032202a138b',NULL,'Alexandru Corneliu OLTEANU'),(19,'catalin_chera','','2015-05-12 15:25:30','2015-05-12 15:25:30',1,'5fbcc53af67f1f55788b1de04ab03f60',NULL,'Catalin Chera'),(20,'serban_petrescu','','2015-05-12 15:25:30','2015-05-12 15:25:30',1,'b839097643a5489f87428a2b2cd39d6b',NULL,'Serban Petrescu'),(21,'mariana_ionela_mocanu','','2015-05-12 15:25:31','2015-05-12 15:25:31',1,'2fc40d24421847c49ab342033f18b520',NULL,'Mariana Ionela Mocanu'),(22,'ion_bucur','','2015-05-12 15:25:32','2015-05-12 15:25:32',1,'5023a0b24baff1803435153398bb66ab',NULL,'Ion Bucur'),(23,'traian-eugen_rebedea','','2015-05-12 15:25:32','2015-05-12 15:25:32',1,'9d6982d2aa36e9db2393026e9f9396e3',NULL,'Traian-Eugen Rebedea'),(24,'carmen_odubasteanu','','2015-05-12 15:25:32','2015-05-12 15:25:32',1,'39241ce4963ab1f90dabdf5f85a2856f',NULL,'Carmen Odubasteanu'),(25,'eugenia_kalisz','','2015-05-12 15:25:33','2015-05-12 15:25:33',1,'1fdca8c5466d2476c3a7718fb63a1ed8',NULL,'Eugenia Kalisz'),(26,'ion_jurca','','2015-05-12 15:25:34','2015-05-12 15:25:34',1,'d88070f2d098db4a715fa5f99c863363',NULL,'Ion Jurca'),(27,'florin_pop','','2015-05-12 15:25:34','2015-05-12 15:25:34',1,'519b0f969171e7a765f1d4c5054db59f',NULL,'Florin POP'),(28,'rodica_potolea','','2015-05-12 15:25:34','2015-05-12 15:25:34',1,'2351d5558e7c63490b15901453c88d7f',NULL,'Rodica Potolea'),(29,'adriana_ioana_balan','','2015-05-12 15:25:34','2015-05-12 15:25:34',1,'eb3df6947b82db6339cd99242b13449e',NULL,'Adriana Ioana Balan'),(30,'iulian_duca','','2015-05-12 15:25:35','2015-05-12 15:25:35',1,'f6e00c3bb6befa0fa381859b7a842a74',NULL,'Iulian Duca'),(31,'ana_nita','','2015-05-12 15:25:35','2015-05-12 15:25:35',1,'f3849acdd663640d39268e16dd40a3c9',NULL,'Ana Nita'),(32,'mircea_sularia','','2015-05-12 15:25:35','2015-05-12 15:25:35',1,'91e77581d7b432b49ff1834cd39b785e',NULL,'Mircea Sularia'),(33,'paul_flondor','','2015-05-12 15:25:36','2015-05-12 15:25:36',1,'a2e03b98e1f77d879cf2e83034bfc792',NULL,'Paul Flondor'),(34,'radu_nicolae_gologan','','2015-05-12 15:25:37','2015-05-12 15:25:37',1,'7c4c2884914b729af894fc6575114140',NULL,'Radu Nicolae Gologan'),(35,'francisc_iacob','','2015-05-12 15:25:38','2015-05-12 15:25:38',1,'efe617ea520cfbca5deb4fe91f77bb50',NULL,'Francisc Iacob'),(36,'george_popescu','','2015-05-12 18:45:57','2015-05-12 18:45:57',1,'cb64e7a6002749f542dc375e7a7b5860',NULL,'George Popescu'),(37,'gheorghe_simion','','2015-05-12 18:45:58','2015-05-12 18:45:58',1,'ed603b11fa24082ab0b16a27d14dbd9c',NULL,'Gheorghe Simion'),(38,'adriana_olteanu','','2015-05-12 18:45:59','2015-05-12 18:45:59',1,'38c3290823ee04537a2cc85f7011cd9f',NULL,'Adriana OLTEANU'),(39,'adrian_radu','','2015-05-12 18:45:59','2015-05-12 18:45:59',1,'7421b62734a16991b2b8eaa5fae8cb06',NULL,'Adrian Radu'),(40,'alexandrina_nenciu','','2015-05-12 18:46:00','2015-05-12 18:46:00',1,'c6b4775c16d118b7eefd319da88b2c7a',NULL,'Alexandrina Nenciu'),(41,'viorel_paun','','2015-05-12 18:46:01','2015-05-12 18:46:01',1,'571e7474ad1df48a25fc0c0a4f79969c',NULL,'Viorel Paun'),(42,'dorina_popovici','','2015-05-12 18:46:02','2015-05-12 18:46:02',1,'d28b79c8981dbcc12b4bbdbe3212ff69',NULL,'Dorina Popovici'),(43,'mihai_iordache','','2015-05-12 18:46:02','2015-05-12 18:46:02',1,'3606ba49176e398f204b63bc80e731ae',NULL,'Mihai Iordache'),(44,'ioan_cezar_coraci','','2015-05-12 18:46:05','2015-05-12 18:46:05',1,'34ab4daeab2dcea182c5eca1563857e6',NULL,'Ioan Cezar Coraci'),(45,'florin_stratulat','','2015-05-12 18:46:05','2015-05-12 18:46:05',1,'9892439dcfb00951f3090708e8a7addc',NULL,'Florin Stratulat'),(46,'serban_sever','','2015-05-12 18:46:06','2015-05-12 18:46:06',1,'f7079f21d2d11e506cb4c462f04b0852',NULL,'Serban SEVER'),(47,'mihai_dascalu','','2015-05-12 18:53:14','2015-05-12 18:53:14',1,'eac297acbe65ff085330a21b1283579d',NULL,'Mihai DASCALU'),(48,'lorina_cristina_negreanu','','2015-05-12 18:53:14','2015-05-12 18:53:14',1,'29a03afc22f3cd728fa5b40e2f14f184',NULL,'Lorina Cristina Negreanu'),(49,'vasile_lungu','','2015-05-12 18:53:15','2015-05-12 18:53:15',1,'f4f6287ba06c717c4811ec4056a76df7',NULL,'Vasile Lungu'),(50,'constantin_ilas','','2015-05-12 18:53:16','2015-05-12 18:53:16',1,'5f7e9a1a67bc4ab5eb21513892ed75d1',NULL,'Constantin Ilas'),(51,'daniel_rosner','','2015-05-12 18:53:16','2015-05-12 18:53:16',1,'dc6af71dda75c794d3ef61d23c5f00c4',NULL,'Daniel ROSNER'),(52,'adrian_surpateanu','','2015-05-12 18:53:16','2015-05-12 18:53:16',1,'0ffbfb41c75b3db34929e09520d6dd45',NULL,'Adrian Surpateanu'),(53,'corneliu_trisca-rusu','','2015-05-12 18:53:16','2015-05-12 18:53:16',1,'599e3996c212a8b7793b7761f6c8a93c',NULL,'Corneliu Trisca-Rusu'),(54,'andrei-horia_mogos','','2015-05-12 18:53:16','2015-05-12 18:53:16',1,'b7131780d929ce59f1d6a5c38d2a8380',NULL,'Andrei-Horia Mogos'),(55,'matei_popovici','','2015-05-12 18:53:17','2015-05-12 18:53:17',1,'db427bf78a066c061b2d16512b5aaa99',NULL,'Matei Popovici'),(56,'stefan_trausan-matu','','2015-05-12 18:53:17','2015-05-12 18:53:17',1,'cc70f3e8b6901a8b4cf4d4cba4c9a79f',NULL,'Stefan TRAUSAN-MATU'),(57,'cristian_giumale','','2015-05-12 18:53:17','2015-05-12 18:53:17',1,'1036a0d2bb75afdf0eab49dee43a13f3',NULL,'Cristian Giumale'),(58,'mihnea_cosmin_muraru','','2015-05-12 18:53:19','2015-05-12 18:53:19',1,'8c1defa4717dbacfd46a72d30da81407',NULL,'Mihnea Cosmin MURARU'),(59,'andrei_olaru','','2015-05-12 18:53:19','2015-05-12 18:53:19',1,'0c52456fbb5a0d0c6b2c94314655e67d',NULL,'Andrei Olaru'),(60,'valentin_cristea','','2015-05-12 18:53:20','2015-05-12 18:53:20',1,'b193bcff019ed2b7783532ea11b2df85',NULL,'Valentin Cristea'),(61,'gavril_godza','','2015-05-12 18:53:20','2015-05-12 18:53:20',1,'694e9a925dc261b7ffb6f7ba7567738d',NULL,'Gavril Godza'),(62,'costin-gabriel_chiru','','2015-05-12 18:53:21','2015-05-12 18:53:21',1,'020f79401e80959bc1afc0f6ef74445e',NULL,'Costin-Gabriel Chiru'),(63,'nicolae_cupcea','','2015-05-12 18:53:21','2015-05-12 18:53:21',1,'bd8f4bc48c75d25b610b9be0e9456415',NULL,'Nicolae Cupcea'),(64,'alina_nirvana_popescu','','2015-05-12 18:53:23','2015-05-12 18:53:23',1,'d86a0297b8f99194c898c7eec8bdc592',NULL,'Alina Nirvana Popescu'),(65,'cornel_popescu','','2015-05-12 18:53:24','2015-05-12 18:53:24',1,'4ee0b7ad9122069637c917a092cf7d2f',NULL,'Cornel Popescu'),(66,'adrian_petrescu','','2015-05-12 18:53:25','2015-05-12 18:53:25',1,'25ac614f16d04460ede8154f7a94487b',NULL,'Adrian Petrescu'),(67,'dan_stefan_tudose','','2015-05-12 18:53:25','2015-05-12 18:53:25',1,'a28144e4d4d96bfae72338cf3d7c08de',NULL,'Dan Stefan TUDOSE'),(68,'costin_stefanescu','','2015-05-12 18:53:25','2015-05-12 18:53:25',1,'e3d2f10a2fd6e26a861c9625afdea76f',NULL,'Costin Stefanescu'),(69,'nicolae_tapus','','2015-05-12 18:53:27','2015-05-12 18:53:27',1,'d2dc016f90da1a32eb9db044db3479b8',NULL,'Nicolae Tapus'),(70,'mihai_daniel_bucicoiu','','2015-05-12 18:53:28','2015-05-12 18:53:28',1,'e75ef05100b247f9d3c3d2895bbe9cc7',NULL,'Mihai Daniel BUCICOIU'),(71,'alexandru_gheorghiu','','2015-05-12 18:53:29','2015-05-12 18:53:29',1,'b9f9b57ef3c99057ef2575a354a67da2',NULL,'Alexandru GHEORGHIU'),(72,'marius_zaharia','','2015-05-12 18:53:30','2015-05-12 18:53:30',1,'0fc5e7b11d849a3d6368d360a7672236',NULL,'Marius Zaharia'),(73,'florica_moldoveanu','','2015-05-12 18:53:31','2015-05-12 18:53:31',1,'88726a8e35104d84aa721639c0766529',NULL,'Florica Moldoveanu'),(74,'gheorghe_decebal_popescu','','2015-05-12 18:53:32','2015-05-12 18:53:32',1,'371c972b933811265e03813e1c50b142',NULL,'Gheorghe Decebal Popescu'),(75,'ciprian_-_mihai_dobre','','2015-05-12 18:53:33','2015-05-12 18:53:33',1,'3260caf21a652cff50fdee77c70439dd',NULL,'Ciprian - Mihai DOBRE'),(76,'mihail_nicolae_ionescu','','2015-05-12 18:53:33','2015-05-12 18:53:33',1,'1989a8fe422467ab6c639b0a70c349a2',NULL,'MIHAIL NICOLAE IONESCU'),(77,'catalin_leordeanu','','2015-05-12 18:53:33','2015-05-12 18:53:33',1,'ad6ab1b08023417c5fd6d4ea7fc64203',NULL,'Catalin LEORDEANU'),(78,'alecsandru_pÄ‚traÅžcu','','2015-05-12 18:53:33','2015-05-12 18:53:33',1,'7f1df847852b72e8dd32a5adf9dab665',NULL,'Alecsandru PÄ‚TRAÅžCU'),(79,'alexandru_boicea','','2015-05-12 18:53:35','2015-05-12 18:53:35',1,'3707054185c0e359b592a157d9ee2894',NULL,'Alexandru Boicea'),(80,'alin_anton','','2015-05-12 18:53:36','2015-05-12 18:53:36',1,'39a535af8bb8215c31bec5c9569de271',NULL,'Alin Anton'),(81,'viorel_negru','','2015-05-12 18:53:36','2015-05-12 18:53:36',1,'3239c5b0812d49260b05d9f082d50499',NULL,'Viorel Negru'),(82,'costin_raiciu','','2015-05-12 18:53:36','2015-05-12 18:53:36',1,'1307e78cdc2b7d8e40db3b72ff6311f9',NULL,'Costin Raiciu'),(83,'lucian_vintan','','2015-05-12 18:53:36','2015-05-12 18:53:36',1,'0086b7450b20f59e81b83d1706477fbc',NULL,'Lucian Vintan'),(84,'elena_fleaca','','2015-05-12 18:53:37','2015-05-12 18:53:37',1,'9da3c4206f04e038b117cf30debcd804',NULL,'Elena Fleaca'),(85,'alin_dragos_moldoveanu','','2015-05-12 18:53:38','2015-05-12 18:53:38',1,'5d2eddbd2b5ce8f83a4bd683ba0a661c',NULL,'Alin Dragos Moldoveanu'),(86,'florin_radulescu','','2015-05-12 18:53:40','2015-05-12 18:53:40',1,'6e1e8da5cd505b2f63000226c4705c88',NULL,'Florin Radulescu'),(87,'mircea_petrescu','','2015-05-12 18:53:40','2015-05-12 18:53:40',1,'be80de67db5cf544e123cc087644600d',NULL,'Mircea Petrescu'),(88,'voichita_iancu','','2015-05-12 18:53:41','2015-05-12 18:53:41',1,'76195c273936a006e5f020a0a606957d',NULL,'Voichita Iancu'),(89,'emil_slusanschi','','2015-05-12 18:53:41','2015-05-12 18:53:41',1,'9ae06247ed3524e6408754f911a17883',NULL,'Emil Slusanschi'),(90,'costin_anton_boiangiu','','2015-05-12 18:53:48','2015-05-12 18:53:48',1,'e9be285c40039890d32aa986ffc5022e',NULL,'COSTIN ANTON BOIANGIU'),(91,'adina_florea','','2015-05-12 18:53:50','2015-05-12 18:53:50',1,'1c2893782f3cf92aac1fc3b09357e549',NULL,'Adina Florea'),(92,'dorin_irimescu','','2015-05-12 18:53:50','2015-05-12 18:53:50',1,'bd31a91ae51fe16cac6178f8fae45ca6',NULL,'Dorin Irimescu'),(93,'bogdan_nitulescu','','2015-05-12 18:53:51','2015-05-12 18:53:51',1,'e52943530eac16f4144fe3c716d89dc0',NULL,'Bogdan Nitulescu'),(94,'octavian_purdila','','2015-05-12 18:53:56','2015-05-12 18:53:56',1,'4423134e2aa5b0adb1f54231e990f0d4',NULL,'Octavian Purdila'),(95,'dragos_stefan_niculescu','','2015-05-12 18:53:58','2015-05-12 18:53:58',1,'05f63fca7f4da7fc2df619cab2dc9966',NULL,'Dragos Stefan Niculescu'),(96,'marius_leordeanu','','2015-05-12 18:54:05','2015-05-12 18:54:05',1,'59a0b5c78b85dcde6f88e87de4ec4348',NULL,'Marius Leordeanu'),(97,'adrian_curaj','','2015-05-12 18:54:07','2015-05-12 18:54:07',1,'177e40a9389f784757d5d6faf546d99e',NULL,'Adrian Curaj'),(98,'laura-cristina_gheorghe','','2015-05-12 18:54:08','2015-05-12 18:54:08',1,'ef08d422cbba925aa813cf9a979c23b4',NULL,'Laura-Cristina GHEORGHE'),(99,'andrei_pitis','','2015-05-12 18:54:08','2015-05-12 18:54:08',1,'63b97b276dc77da83e15682739d57208',NULL,'Andrei Pitis'),(100,'florin_danalache','','2015-05-12 18:58:43','2015-05-12 18:58:43',1,'53fbe7a2b82e1561a66bf4432a5dddd3',NULL,'Florin Danalache'),(101,'gheorghe_militaru','','2015-05-12 18:58:44','2015-05-12 18:58:44',1,'eb1fb693f6343d153d5c6158ae7dc436',NULL,'Gheorghe Militaru'),(102,'alexandru-mihai_carp','','2015-05-12 18:58:47','2015-05-12 18:58:47',1,'3f9725cdf0a941d1b88c362efcb3f21b',NULL,'Alexandru-Mihai CARP'),(103,'traian-andrei_popeea','','2015-05-12 18:58:47','2015-05-12 18:58:47',1,'bd2e8322cd346981ce2cabb83da4159a',NULL,'Traian-Andrei POPEEA'),(104,'mihai_vasilescu','','2015-05-12 18:58:47','2015-05-12 18:58:47',1,'447e005255cbf2823ce88e379e739e5f',NULL,'Mihai VASILESCU'),(105,'elena_simona_apostol','','2015-05-12 18:58:51','2015-05-12 18:58:51',1,'7577199e659f86d6b5168ed135c6bbf9',NULL,'Elena Simona APOSTOL'),(106,'rÄƒzvan_dobre','','2015-05-12 18:58:52','2015-05-12 18:58:52',1,'45c24f5ef2da50a31c74f889ac7bd744',NULL,'RÄƒzvan DOBRE'),(107,'alexandru-ionu?_egner','','2015-05-12 18:58:53','2015-05-12 18:58:53',1,'002054b3cc9019f229ac159201fa9b4c',NULL,'Alexandru-Ionu? EGNER'),(108,'victor_asavei','','2015-05-12 18:58:55','2015-05-12 18:58:55',1,'c30814c6eff2b2204a0c0f98d6c9d6a7',NULL,'Victor Asavei'),(109,'mihai_francu','','2015-05-12 18:58:55','2015-05-12 18:58:55',1,'ae80bd81121294f31385c88d54023076',NULL,'Mihai Francu'),(110,'mihai__francu','','2015-05-12 18:58:55','2015-05-12 18:58:55',1,'8614639e803125a53357981a1d789a33',NULL,'Mihai  Francu'),(111,'alex_radovici','','2015-05-12 18:58:57','2015-05-12 18:58:57',1,'659a0e7c1d69635e560b24da653d67e8',NULL,'Alex Radovici'),(112,'marios_choudary','','2015-05-12 18:59:00','2015-05-12 18:59:00',1,'ed5ab77cb2cb2e29ef4befefcdda2fe6',NULL,'Marios Choudary'),(113,'monica_dragoicea','','2015-05-12 18:59:05','2015-05-12 18:59:05',1,'b844f0475a3114e5f84adf7a6984565e',NULL,'Monica Dragoicea'),(114,'iulia-lidia_iacob','','2015-05-12 18:59:05','2015-05-12 18:59:05',1,'dae1aaf7a5fc20ec08c162804bc72a4e',NULL,'Iulia-Lidia IACOB'),(115,'ana-maria_marhan','','2015-05-12 18:59:12','2015-05-12 18:59:12',1,'0228b947f5cace259399a6fddde87a3e',NULL,'Ana-Maria Marhan'),(116,'anca_morar','','2015-05-12 18:59:17','2015-05-12 18:59:17',1,'e658870340ddb461db9be10ed36a994a',NULL,'Anca Morar'),(117,'cristian_-_aurelian_popescu','','2015-05-12 18:59:22','2015-05-12 18:59:22',1,'795d49070f081068e43e2e44b22b8939',NULL,'Cristian - Aurelian POPESCU'),(118,'tudor_berariu','','2015-05-12 18:59:24','2015-05-12 18:59:24',1,'53b8b00ffda4fa5b4fe13ba40379b49f',NULL,'Tudor BERARIU'),(119,'liliana_dobrica','','2015-05-12 18:59:28','2015-05-12 18:59:28',1,'716f2dc033448581f94cfb9d9d907ecd',NULL,'Liliana Dobrica'),(120,'anca_daniela_ionita','','2015-05-12 18:59:29','2015-05-12 18:59:29',1,'2b064801f9eb39cce27087d69ecbf7c8',NULL,'Anca Daniela Ionita'),(121,'emil_simion','','2015-05-12 18:59:29','2015-05-12 18:59:29',1,'197e1a531979fbaf83021cb1dd0c1138',NULL,'Emil Simion'),(122,'anca_purcarea','','2015-05-12 18:59:32','2015-05-12 18:59:32',1,'649aa5c061b34ec6b26105742b776345',NULL,'Anca Purcarea'),(123,'cezar_scarlat','','2015-05-12 18:59:32','2015-05-12 18:59:32',1,'02fc918e05baf6b5d26ebb9ecc2140eb',NULL,'Cezar Scarlat'),(124,'ion_bica','','2015-05-12 18:59:37','2015-05-12 18:59:37',1,'9ddb5052492f657e97222e3dffe7d15b',NULL,'Ion Bica'),(125,'paul_chirita','','2015-05-12 18:59:42','2015-05-12 18:59:42',1,'345666b7d21079f631e06e307c37d07f',NULL,'Paul Chirita'),(126,'test_prof_1','test_prof_1@home.ro','2015-05-13 16:02:05','2015-05-13 16:02:05',1,'a3dcb4d229de6fde0db5686dee47145d',NULL,NULL),(127,'test_prof_2','test_prof_1@home.ro','2015-05-13 16:02:52','2015-05-13 16:02:52',1,'a3dcb4d229de6fde0db5686dee47145d',NULL,NULL),(128,'Ionescu George','ionescu.george@yahoo.com','2015-05-13 20:12:43','2015-05-13 20:12:43',2,'e10adc3949ba59abbe56e057f20f883e',NULL,NULL),(129,'a.b','a.b@yahoo.com','2015-05-13 20:13:16','2015-05-13 20:13:16',1,'e32b629f658481c8aa169aa08acc0625',NULL,NULL),(130,'alice.pasare','alice.pasare@exemplu.com','2015-05-14 08:08:38','2015-05-14 08:08:38',1,'8a6e3c5691901de9bfa2cc16e6ec8ef2',NULL,NULL),(131,'ana','ana@y','2015-05-17 22:51:00','2015-05-17 22:51:00',1,'276b6c4692e78d4799c12ada515bc3e4',NULL,NULL),(132,'test.acodev','',NULL,NULL,1,'a3dcb4d229de6fde0db5686dee47145d',NULL,NULL),(134,'nadgob','',NULL,NULL,1,'a3dcb4d229de6fde0db5686dee47145d',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-22 17:21:07
