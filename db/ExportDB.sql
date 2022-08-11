CREATE DATABASE  IF NOT EXISTS `my_crownsatelier` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `my_crownsatelier`;
-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: my_crownsatelier
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `carrelli`
--

DROP TABLE IF EXISTS `carrelli`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrelli` (
  `idCliente` int NOT NULL,
  `idProdotto` int NOT NULL,
  `idFornitore` int NOT NULL,
  `qnt` int NOT NULL,
  PRIMARY KEY (`idCliente`,`idProdotto`,`idFornitore`),
  KEY `fk_carrelli_cliente_idx` (`idCliente`),
  KEY `fk_carrelli_fornitore_idx` (`idFornitore`),
  KEY `fk_carrelli_idProdotto_idx` (`idProdotto`),
  CONSTRAINT `fk_carrelli_cliente` FOREIGN KEY (`idCliente`) REFERENCES `utenti` (`idUtente`),
  CONSTRAINT `fk_carrelli_fornitore` FOREIGN KEY (`idFornitore`) REFERENCES `prodotti_forniti` (`idFornitore`),
  CONSTRAINT `fk_carrelli_idProdotto` FOREIGN KEY (`idProdotto`) REFERENCES `prodotti_forniti` (`idProdotto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrelli`
--

LOCK TABLES `carrelli` WRITE;
/*!40000 ALTER TABLE `carrelli` DISABLE KEYS */;
INSERT INTO `carrelli` VALUES (1,1,1,1);
/*!40000 ALTER TABLE `carrelli` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  `idCategoria` int NOT NULL AUTO_INCREMENT,
  `nomeCategoria` varchar(100) DEFAULT NULL,
  `descrizione` varchar(512) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Corone','Corone d’alloro relative ad ogni corso di laurea','tag/corona.png'),(2,'Vestiti','Travestimenti per rendere tutto più divertente','tag/vestito.jpeg'),(3,'Festoni','Addobbi per rendere la tua festa indimenticabile','tag/festoni.png'),(4,'Bouquet','Per dare un tocco delicato a questa giornata','tag/bouquet.jpeg');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liste_prodotti_ordine`
--

DROP TABLE IF EXISTS `liste_prodotti_ordine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `liste_prodotti_ordine` (
  `nOrdine` int NOT NULL,
  `idProdotto` int NOT NULL,
  `idFornitore` int NOT NULL,
  `qnt` int NOT NULL,
  `spedito` tinyint DEFAULT '0',
  PRIMARY KEY (`nOrdine`,`idProdotto`,`idFornitore`),
  KEY `fk_liste_prodotti_ordine_nOrdine_idx` (`nOrdine`),
  KEY `fk_liste_prodotti_ordine_fornitore_idx` (`idFornitore`),
  KEY `fk_liste_prodotti_ordine_idProdotto_idx` (`idProdotto`),
  CONSTRAINT `fk_liste_prodotti_ordine_fornitore` FOREIGN KEY (`idFornitore`) REFERENCES `prodotti_forniti` (`idFornitore`),
  CONSTRAINT `fk_liste_prodotti_ordine_idProdotto` FOREIGN KEY (`idProdotto`) REFERENCES `prodotti_forniti` (`idProdotto`),
  CONSTRAINT `fk_liste_prodotti_ordine_nOrdine` FOREIGN KEY (`nOrdine`) REFERENCES `ordini` (`nOrdine`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liste_prodotti_ordine`
--

LOCK TABLES `liste_prodotti_ordine` WRITE;
/*!40000 ALTER TABLE `liste_prodotti_ordine` DISABLE KEYS */;
INSERT INTO `liste_prodotti_ordine` VALUES (18,1,1,1,0),(18,6,1,1,0),(19,1,1,1,0),(19,6,1,1,0),(20,1,1,2,0),(20,3,1,2,0),(21,1,1,2,0),(21,3,1,2,0),(25,1,1,2,0),(26,1,1,2,0),(27,1,1,2,0),(28,1,1,1,0),(29,1,1,1,0),(30,1,1,1,0),(31,1,1,1,0),(32,1,1,1,0),(33,1,1,1,0),(34,1,1,1,0),(35,1,1,1,0),(36,1,1,1,0),(37,1,1,1,0),(38,1,1,1,0),(39,1,1,1,0),(39,2,1,2,0),(39,2,2,1,0),(40,1,1,1,0),(45,1,1,1,0),(50,2,1,3,0),(51,1,1,1,0),(52,1,1,1,0),(52,1,2,1,0),(53,8,1,1,0),(54,1,12,1,1),(55,1,1,1,0),(56,1,12,1,1),(59,1,1,1,0),(60,1,2,1,0);
/*!40000 ALTER TABLE `liste_prodotti_ordine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifiche`
--

DROP TABLE IF EXISTS `notifiche`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifiche` (
  `tipo` varchar(10) NOT NULL,
  `descrizione` varchar(500) NOT NULL,
  PRIMARY KEY (`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifiche`
--

LOCK TABLES `notifiche` WRITE;
/*!40000 ALTER TABLE `notifiche` DISABLE KEYS */;
INSERT INTO `notifiche` VALUES ('ORDINE_RIC','Un prodotto è stato aggiunto in un ordine'),('ORDINE_SPE','Un prodotto da te ordinato è stato appena spedito'),('OUT_OF_ST','Un tuo prodoto è esaurito');
/*!40000 ALTER TABLE `notifiche` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordini`
--

DROP TABLE IF EXISTS `ordini`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordini` (
  `nOrdine` int NOT NULL AUTO_INCREMENT,
  `dataRichiesta` datetime NOT NULL,
  `stato` varchar(512) NOT NULL,
  `dataEffettuazione` datetime DEFAULT NULL,
  `idCliente` int NOT NULL,
  PRIMARY KEY (`nOrdine`),
  KEY `fk_ordini_email_idx` (`idCliente`),
  CONSTRAINT `fk_ordini_email` FOREIGN KEY (`idCliente`) REFERENCES `utenti` (`idUtente`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordini`
--

LOCK TABLES `ordini` WRITE;
/*!40000 ALTER TABLE `ordini` DISABLE KEYS */;
INSERT INTO `ordini` VALUES (15,'2022-07-17 14:40:10','Ordine effettuato',NULL,10),(16,'2022-07-17 14:46:27','Ordine effettuato',NULL,10),(17,'2022-07-17 14:47:46','Ordine effettuato',NULL,10),(18,'2022-07-17 14:52:56','Ordine effettuato',NULL,10),(19,'2022-07-17 14:56:00','Ordine effettuato',NULL,11),(20,'2022-07-17 14:59:54','Ordine effettuato',NULL,11),(21,'2022-07-17 15:03:40','Ordine effettuato',NULL,11),(22,'2022-07-17 15:05:17','Ordine effettuato',NULL,11),(23,'2022-07-17 15:05:27','Ordine effettuato',NULL,11),(24,'2022-07-17 15:14:53','Ordine effettuato',NULL,11),(25,'2022-07-17 15:15:03','Ordine effettuato',NULL,11),(26,'2022-07-17 15:15:40','Ordine effettuato',NULL,11),(27,'2022-07-17 15:16:58','Ordine effettuato',NULL,11),(28,'2022-07-17 16:00:22','Ordine effettuato',NULL,11),(29,'2022-07-17 16:07:59','Ordine effettuato',NULL,11),(30,'2022-07-17 16:08:24','Ordine effettuato',NULL,11),(31,'2022-07-17 16:09:11','Ordine effettuato',NULL,11),(32,'2022-07-17 16:10:05','Ordine effettuato',NULL,11),(33,'2022-07-17 16:10:23','Ordine effettuato',NULL,11),(34,'2022-07-17 16:12:07','Ordine effettuato',NULL,11),(35,'2022-07-17 16:13:44','Ordine effettuato',NULL,11),(36,'2022-07-17 16:15:00','Ordine effettuato',NULL,11),(37,'2022-07-17 16:15:19','Ordine effettuato',NULL,11),(38,'2022-07-17 16:16:51','Ordine effettuato',NULL,11),(39,'2022-07-17 16:20:38','Ordine effettuato',NULL,11),(40,'2022-07-17 16:22:25','Ordine effettuato',NULL,11),(41,'2022-07-17 16:23:14','Ordine effettuato',NULL,11),(42,'2022-07-17 17:14:35','Ordine effettuato',NULL,11),(43,'2022-07-17 17:16:09','Ordine effettuato',NULL,11),(44,'2022-07-17 17:17:09','Ordine effettuato',NULL,11),(45,'2022-07-17 17:17:46','Ordine effettuato',NULL,11),(46,'2022-07-17 17:18:40','Ordine effettuato',NULL,11),(47,'2022-07-17 17:25:37','Ordine effettuato',NULL,11),(48,'2022-07-17 17:26:57','Ordine effettuato',NULL,11),(49,'2022-07-17 17:27:18','Ordine effettuato',NULL,11),(50,'2022-07-17 18:48:08','Ordine effettuato',NULL,11),(51,'2022-07-17 18:55:23','Ordine effettuato',NULL,11),(52,'2022-07-17 21:39:11','Ordine effettuato',NULL,11),(53,'2022-07-21 18:55:27','Ordine effettuato',NULL,11),(54,'2022-08-02 16:33:59','Ordine effettuato',NULL,10),(55,'2022-08-02 16:57:02','Ordine effettuato',NULL,10),(56,'2022-08-02 16:57:50','Ordine effettuato',NULL,10),(57,'2022-08-02 17:13:27','Ordine effettuato',NULL,10),(58,'2022-08-02 17:15:26','Ordine effettuato',NULL,10),(59,'2022-08-10 19:47:01','Ordine effettuato',NULL,10),(60,'2022-08-10 19:51:27','Ordine effettuato',NULL,10);
/*!40000 ALTER TABLE `ordini` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodotti`
--

DROP TABLE IF EXISTS `prodotti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodotti` (
  `idProdotto` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(512) NOT NULL,
  `descrizione` varchar(512) NOT NULL,
  `imgURL` varchar(150) NOT NULL,
  `categoria` int NOT NULL,
  PRIMARY KEY (`idProdotto`),
  KEY `fk_prodotti_categoria_idx` (`categoria`),
  CONSTRAINT `fk_prodotti_categoria` FOREIGN KEY (`categoria`) REFERENCES `categorie` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodotti`
--

LOCK TABLES `prodotti` WRITE;
/*!40000 ALTER TABLE `prodotti` DISABLE KEYS */;
INSERT INTO `prodotti` VALUES (1,'Corona Azzura','Per i corsi di laurea che ecc...','corone/corona_azzurra.jpg',1),(2,'Corona Bianca','Per i corsi di laurea che ecc...','corone/corona_bianca.jpg',1),(3,'Corona Grigia','Per i corsi di laurea che ecc...','corone/corona_grigia.jpg',1),(4,'Corona Bordeaux','Per i corsi di laurea che ecc...','corone/corona_bordeaux.jpg',1),(5,'Corona Nera','Per i corsi di laurea che ecc...','corone/corona_nera.jpg',1),(6,'Corona Rossa','Per i corsi di laurea che ecc...','corone/corona_rossa.JPG',1),(7,'Corona Verde','Per i corsi di laurea che ecc...','corone/corona_verde.jpg',1),(8,'Corona Viola','Per i corsi di laurea che ecc...','corone/corona_viola.jpg',1);
/*!40000 ALTER TABLE `prodotti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prodotti_forniti`
--

DROP TABLE IF EXISTS `prodotti_forniti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodotti_forniti` (
  `idFornitore` int NOT NULL,
  `idProdotto` int NOT NULL,
  `prezzo` float NOT NULL,
  `qntFornita` int NOT NULL,
  PRIMARY KEY (`idFornitore`,`idProdotto`),
  KEY `fk_prodotti_forniti_email_idx` (`idFornitore`),
  KEY `fk_prodotti_forniti_idProdotto_idx` (`idProdotto`),
  CONSTRAINT `fk_prodotti_forniti_email` FOREIGN KEY (`idFornitore`) REFERENCES `utenti` (`idUtente`),
  CONSTRAINT `fk_prodotti_forniti_idProdotto` FOREIGN KEY (`idProdotto`) REFERENCES `prodotti` (`idProdotto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodotti_forniti`
--

LOCK TABLES `prodotti_forniti` WRITE;
/*!40000 ALTER TABLE `prodotti_forniti` DISABLE KEYS */;
INSERT INTO `prodotti_forniti` VALUES (1,1,1.99,2),(1,2,1.99,6),(1,3,1.99,3),(1,4,1.99,12),(1,5,1.99,8),(1,6,1.99,4),(1,7,1.99,6),(1,8,1.99,2),(2,1,2.29,4),(2,2,2.29,7),(2,3,2.29,10),(12,1,1.59,2);
/*!40000 ALTER TABLE `prodotti_forniti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ricezioni_cliente`
--

DROP TABLE IF EXISTS `ricezioni_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ricezioni_cliente` (
  `idCliente` int NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `data` date NOT NULL,
  `idNotificaCliente` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idNotificaCliente`),
  KEY `fk_ricezioni_cliente_email_idx` (`idCliente`),
  KEY `fk_ricezioni_cliente_tipo_idx` (`tipo`),
  CONSTRAINT `fk_ricezioni_cliente_email` FOREIGN KEY (`idCliente`) REFERENCES `utenti` (`idUtente`),
  CONSTRAINT `fk_ricezioni_cliente_tipo` FOREIGN KEY (`tipo`) REFERENCES `notifiche` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ricezioni_cliente`
--

LOCK TABLES `ricezioni_cliente` WRITE;
/*!40000 ALTER TABLE `ricezioni_cliente` DISABLE KEYS */;
INSERT INTO `ricezioni_cliente` VALUES (10,'ORDINE_SPE','2022-08-01',1),(10,'ORDINE_SPE','2022-08-11',2),(10,'ORDINE_SPE','2022-08-11',3);
/*!40000 ALTER TABLE `ricezioni_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ricezioni_fornitori`
--

DROP TABLE IF EXISTS `ricezioni_fornitori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ricezioni_fornitori` (
  `idFornitore` int NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `data` datetime NOT NULL,
  `idNotificaFornitore` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idNotificaFornitore`),
  KEY `fk_ricezioni_fornitori_email_idx` (`idFornitore`),
  KEY `fk_ricezioni_fornitori_tipo_idx` (`tipo`),
  CONSTRAINT `fk_ricezioni_fornitori_email` FOREIGN KEY (`idFornitore`) REFERENCES `utenti` (`idUtente`),
  CONSTRAINT `fk_ricezioni_fornitori_tipo` FOREIGN KEY (`tipo`) REFERENCES `notifiche` (`tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ricezioni_fornitori`
--

LOCK TABLES `ricezioni_fornitori` WRITE;
/*!40000 ALTER TABLE `ricezioni_fornitori` DISABLE KEYS */;
INSERT INTO `ricezioni_fornitori` VALUES (1,'ORDINE_RIC','2022-07-17 16:20:38',1),(1,'ORDINE_RIC','2022-07-17 16:20:38',2),(2,'ORDINE_RIC','2022-07-17 16:20:38',3),(1,'ORDINE_RIC','2022-07-17 16:22:25',4),(1,'ORDINE_RIC','2022-07-17 17:17:46',5),(1,'ORDINE_RIC','2022-07-17 18:48:08',6),(1,'ORDINE_RIC','2022-07-17 18:55:23',7),(1,'ORDINE_RIC','2022-07-17 21:39:11',8),(2,'ORDINE_RIC','2022-07-17 21:39:11',9),(1,'ORDINE_RIC','2022-07-21 18:55:27',10),(12,'ORDINE_RIC','2022-08-02 16:33:59',11),(1,'ORDINE_RIC','2022-08-02 16:57:02',12),(12,'ORDINE_RIC','2022-08-02 16:57:50',13),(1,'ORDINE_RIC','2022-08-10 19:47:01',14),(2,'ORDINE_RIC','2022-08-10 19:51:27',15);
/*!40000 ALTER TABLE `ricezioni_fornitori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utenti`
--

DROP TABLE IF EXISTS `utenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utenti` (
  `idUtente` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(512) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `nomeAzienda` varchar(75) DEFAULT NULL,
  `indirizzo` varchar(150) DEFAULT NULL,
  `nome` varchar(25) DEFAULT NULL,
  `cognome` varchar(25) DEFAULT NULL,
  `tipo` varchar(25) NOT NULL,
  PRIMARY KEY (`idUtente`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utenti`
--

LOCK TABLES `utenti` WRITE;
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;
INSERT INTO `utenti` VALUES (1,'ciao@gmail.com','ciao','2423','Ciao s.r.l.s',NULL,NULL,NULL,'fornitore'),(2,'prova@gmail.com','ciao','235235','Stiamo fallendo s.n.c',NULL,NULL,NULL,'fornitore'),(8,'signettohotmail.it@gmail.com','$6$rounds=5000$usesomesillystri$ucGIpU91gD.char2IelSbVUZdRFRT3pCNwCNaF9Grv6kVDYgmwtQl0dZBOKADyxCSAAuou5Tg.vtQwfu555MC1','3487894282',NULL,NULL,'Lorenzo','Signoretti','cliente'),(9,'lory4846@hotmail.it','$6$rounds=5000$usesomesillystri$ucGIpU91gD.char2IelSbVUZdRFRT3pCNwCNaF9Grv6kVDYgmwtQl0dZBOKADyxCSAAuou5Tg.vtQwfu555MC1','3487894282','Lorenzo Signoretti','Via Bernale 8',NULL,NULL,'fornitore'),(10,'fornito@ciao.com','$6$rounds=5000$usesomesillystri$luTZDio9NfWXus.LG8h2Ib4CzkE7hXYj9.r1NtoXW35iwkjV/etQ.TouSNj3ogr8bPn2Hi1q5/9BJcmyekREq1','3487523',NULL,NULL,'Lorenzo','Signoretti','cliente'),(11,'cliente@mail.it','$6$rounds=5000$usesomesillystri$luTZDio9NfWXus.LG8h2Ib4CzkE7hXYj9.r1NtoXW35iwkjV/etQ.TouSNj3ogr8bPn2Hi1q5/9BJcmyekREq1','3487894282',NULL,NULL,'Lorenzo','Signoretti','cliente'),(12,'fornitore@mail.com','$6$rounds=5000$usesomesillystri$luTZDio9NfWXus.LG8h2Ib4CzkE7hXYj9.r1NtoXW35iwkjV/etQ.TouSNj3ogr8bPn2Hi1q5/9BJcmyekREq1','23457823452345','Ci si prova','Via prova 3',NULL,NULL,'fornitore');
/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-11 19:08:45
