DROP database `my_crownsatelier`;
CREATE DATABASE `my_crownsatelier` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
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
  CONSTRAINT `fk_carrelli_cliente` FOREIGN KEY (`idCliente`) REFERENCES `clienti` (`idCliente`),
  CONSTRAINT `fk_carrelli_fornitore` FOREIGN KEY (`idFornitore`) REFERENCES `prodotti_forniti` (`idFornitore`),
  CONSTRAINT `fk_carrelli_idProdotto` FOREIGN KEY (`idProdotto`) REFERENCES `prodotti_forniti` (`idProdotto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrelli`
--

LOCK TABLES `carrelli` WRITE;
/*!40000 ALTER TABLE `carrelli` DISABLE KEYS */;
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
-- Table structure for table `fornitori`
--

DROP TABLE IF EXISTS `utenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utenti` (
  `idUtente` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(512) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `nomeAzienda` varchar(75),
  `indirizzo` varchar(150),
  `nome` varchar(25),
  `cognome` varchar(25),
  `tipo` varchar(25) NOT NULL,
  PRIMARY KEY (`idUtente`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornitori`
--

LOCK TABLES `utenti` WRITE;
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;
/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;
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
  `dataRichiesta` date NOT NULL,
  `stato` varchar(512) NOT NULL,
  `dataEffettuazione` date DEFAULT NULL,
  `idCliente` int NOT NULL,
  PRIMARY KEY (`nOrdine`),
  KEY `fk_ordini_email_idx` (`idCliente`),
  CONSTRAINT `fk_ordini_email` FOREIGN KEY (`idCliente`) REFERENCES `utente` (`idUtente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordini`
--

LOCK TABLES `ordini` WRITE;
/*!40000 ALTER TABLE `ordini` DISABLE KEYS */;
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
INSERT INTO `prodotti_forniti` VALUES (1,1,1.99,4),(1,2,1.99,6),(1,3,1.99,3),(1,4,1.99,12),(1,5,1.99,8),(1,6,1.99,4),(1,7,1.99,6),(1,8,1.99,2),(2,1,2.29,5),(2,2,2.29,7),(2,3,2.29,10);
/*!40000 ALTER TABLE `prodotti_forniti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ricezioni_cliente`
--

DROP TABLE IF EXISTS `ricezioni_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ricezioni_cliente` (
  `idCLiente` int NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`idCLiente`,`tipo`),
  KEY `fk_ricezioni_cliente_email_idx` (`idCLiente`),
  KEY `fk_ricezioni_cliente_tipo_idx` (`tipo`),
  CONSTRAINT `fk_ricezioni_cliente_email` FOREIGN KEY (`idCLiente`) REFERENCES `utenti` (`idUtente`),
  CONSTRAINT `fk_ricezioni_cliente_tipo` FOREIGN KEY (`tipo`) REFERENCES `notifiche` (`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ricezioni_cliente`
--

LOCK TABLES `ricezioni_cliente` WRITE;
/*!40000 ALTER TABLE `ricezioni_cliente` DISABLE KEYS */;
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
  `data` date NOT NULL,
  PRIMARY KEY (`idFornitore`,`tipo`),
  KEY `fk_ricezioni_fornitori_email_idx` (`idFornitore`),
  KEY `fk_ricezioni_fornitori_tipo_idx` (`tipo`),
  CONSTRAINT `fk_ricezioni_fornitori_email` FOREIGN KEY (`idFornitore`) REFERENCES `utenti` (`idUtente`),
  CONSTRAINT `fk_ricezioni_fornitori_tipo` FOREIGN KEY (`tipo`) REFERENCES `notifiche` (`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ricezioni_fornitori`
--

LOCK TABLES `ricezioni_fornitori` WRITE;
/*!40000 ALTER TABLE `ricezioni_fornitori` DISABLE KEYS */;
/*!40000 ALTER TABLE `ricezioni_fornitori` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-03 21:18:28
