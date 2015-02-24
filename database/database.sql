-- MySQL dump 10.14  Distrib 5.5.41-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: YetAnotherTodoApp
-- ------------------------------------------------------
-- Server version	5.5.41-MariaDB

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
-- Table structure for table `task_lists`
--

DROP TABLE IF EXISTS `task_lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_task_list_user_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_lists`
--

LOCK TABLES `task_lists` WRITE;
/*!40000 ALTER TABLE `task_lists` DISABLE KEYS */;
INSERT INTO `task_lists` VALUES (1,'La Pulga',1,'2015-02-24 04:55:53',NULL),(2,'La Pulga II',1,'2015-02-24 05:16:23',NULL),(3,'Hola don pepito',1,'2015-02-24 05:42:36',NULL),(4,'LA bomobona',1,'2015-02-24 05:44:03',NULL);
/*!40000 ALTER TABLE `task_lists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` mediumtext,
  `completed` bit(1) DEFAULT b'0',
  `task_list_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'Banhar a la pulguita','\0',1,'2015-02-24 06:32:14',NULL),(2,'Hola don jose.\n\nY vio usted a su abuela?','',3,'2015-02-24 06:53:08',NULL),(3,'Hola don jose.\n\nY vio usted a su abuela?','\0',3,'2015-02-24 06:55:20',NULL),(4,'Una prueba mas','\0',4,'2015-02-24 06:57:21',NULL),(5,'La bombona huele a perro sin banhar. Hola. Wuff','\0',4,'2015-02-24 07:00:04',NULL);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `full_name` varchar(45) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`,`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'nnieto@noenieto.com','$2y$10$CIzXwLk93szXWzgqBJKj7.I3gRFJqG68ebNGqK2pQ4jtzEs3Z6bSu','Noe Nieto','2015-02-18 06:24:21'),(2,'fulano@gmail.com','$2y$10$3yJj/t.Vt9SB9eez9HYJxOc8xy3Ua1Erj8DU2KnPzDQH4mNlw.nxi','Fulano','2015-02-18 06:25:38'),(3,'peps@hotmail.com','$2y$10$hJzMGplO7d9Hr/v2VZZax..cW/689b.l4akWKjlMezCFfOodCqUQy','Pepe','2015-02-18 06:36:12');
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

-- Dump completed on 2015-02-23 23:25:21
