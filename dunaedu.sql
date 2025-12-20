-- MySQL dump 10.13  Distrib 8.0.44, for Linux (x86_64)
--
-- Host: localhost    Database: dunaedu
-- ------------------------------------------------------
-- Server version	8.0.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `apprenants`
--

DROP TABLE IF EXISTS `apprenants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apprenants` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `civilite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'M./Mme/Autre',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `genre` enum('masculin','feminin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'masculin',
  `photo_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pays` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Mali',
  `code_postal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `niveau` enum('debutant','intermediaire','avance','professionnel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'debutant',
  `date_inscription` timestamp NULL DEFAULT NULL,
  `dernier_login_at` timestamp NULL DEFAULT NULL,
  `token_verification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token_verification_expires_at` timestamp NULL DEFAULT NULL,
  `reset_password_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_password_expires_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `apprenants_uuid_unique` (`uuid`),
  UNIQUE KEY `apprenants_email_unique` (`email`),
  KEY `apprenants_telephone_index` (`telephone`),
  KEY `apprenants_token_verification_index` (`token_verification`),
  KEY `apprenants_reset_password_token_index` (`reset_password_token`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apprenants`
--

LOCK TABLES `apprenants` WRITE;
/*!40000 ALTER TABLE `apprenants` DISABLE KEYS */;
INSERT INTO `apprenants` VALUES (1,'c69966aa-b9da-4c41-9cfc-b21fb1702b1c','G├®rard','Gaillard','M.','wmathieu@example.com','2025-12-10 22:45:16','$2y$12$VHr.KG2FeM.KStQO4rTaD.ioAlGwBvzjd4K56glFItTEw4H81uSZy',NULL,NULL,'masculin',NULL,'Aliquid recusandae harum ut odio illo voluptas temporibus. Sed voluptatibus unde ut incidunt necessitatibus iste. Ab adipisci quibusdam tempora. Accusantium magnam beatae culpa laboriosam dolores consequuntur aut.',NULL,NULL,'Mali','21628','intermediaire','2025-09-25 22:45:16','2025-12-06 22:45:16',NULL,NULL,NULL,NULL,'B1ESDPneCW',NULL,'2025-12-10 22:45:16','2025-12-10 22:45:16'),(2,'cb6cedf6-2a12-4e4b-b206-276a55fa03d4','Guy','Devaux','Mme','luce14@example.net','2025-12-10 22:45:16','$2y$12$gnCoEfgwXIHvaowdELcT7.YT4qiqsquTVXjlnd1Wq6ktq7dllAO8S',NULL,NULL,'feminin',NULL,'Velit alias praesentium nihil. Velit sunt aut minus illum non est non quasi. Nihil voluptatem dolorum molestias. Dolores explicabo dicta voluptatem earum occaecati consequatur.','boulevard Aurore Ollivier',NULL,'Mauritanie','60963','intermediaire','2025-11-12 22:45:16','2025-12-02 22:45:16',NULL,NULL,NULL,NULL,'R59x9Af94j',NULL,'2025-12-10 22:45:16','2025-12-10 22:45:16'),(3,'14bc7101-9a65-4230-b905-93808ea93691','Alexandrie','Lebon','Mme','foucher.thierry@example.net','2025-12-10 22:45:16','$2y$12$h.ESMCuyAcpEGDBC4o/BTeg0VaMdssE8M4GfO2IoOAh5MMgaI28eO','0117880287',NULL,'feminin',NULL,NULL,'51, impasse Arthur Pierre','Dijoux-la-For├¬t','Mali',NULL,'intermediaire','2025-12-07 22:45:16','2025-12-07 22:45:16',NULL,NULL,NULL,NULL,'thtpcqwbDr',NULL,'2025-12-10 22:45:16','2025-12-10 22:45:16'),(4,'1efcd533-35e1-4593-a2b9-839c8dd9ad90','Odette','Dupuy','Autre','adele.peron@example.com','2025-12-10 22:45:17','$2y$12$9EuK5yHVtZNMfc7MBOnI4ONX767Cw3hStK3L69xG53uhYAh./lZZm','+33 3 52 01 87 13',NULL,'feminin',NULL,'Consequuntur deleniti rerum minus. Ut modi amet atque. Sint inventore dignissimos distinctio ipsum vel voluptas ab voluptatibus. Excepturi sed reprehenderit minus quia placeat totam quod.',NULL,NULL,'Mauritanie','25935','debutant','2025-12-08 22:45:17','2025-12-03 22:45:17',NULL,NULL,NULL,NULL,'HvCaRYpCOa',NULL,'2025-12-10 22:45:17','2025-12-10 22:45:17'),(5,'2fcb131b-96f4-4180-b6bc-7d39d19bd7b1','Cl├®mence','Pinto','Autre','mbarre@example.org','2025-12-10 22:45:17','$2y$12$4cbuotnYZ5z5rSCOkx1hWO3lQMFGBnWLWbAB71B4w27BG5Z7y3nbm',NULL,NULL,'masculin',NULL,NULL,'607, rue Laurence Mary',NULL,'Mauritanie',NULL,'avance','2025-12-03 22:45:17','2025-12-09 22:45:17',NULL,NULL,NULL,NULL,'QU4tWlLdZC',NULL,'2025-12-10 22:45:17','2025-12-10 22:45:17'),(6,'2caf1f72-a96f-421c-baa6-cc6e5d4de136','Raymond','Gilbert','Mme','navarro.marianne@example.net','2025-12-10 22:45:17','$2y$12$TuXHGYmXQMR7HlK0gH2UXu3.jRHnSkmbhY0iqZWbVerhMyCoNyC0m','+33 (0)5 24 05 71 82',NULL,'feminin',NULL,NULL,'82, rue Blanc','Collin','Mauritanie','36537','avance','2025-10-27 22:45:18','2025-12-06 22:45:18',NULL,NULL,NULL,NULL,'sOrCUfmDRu',NULL,'2025-12-10 22:45:18','2025-12-10 22:45:18'),(7,'033ce84f-52bb-41c4-b5f5-de9f71784086','Cl├®mence','Rodrigues','M.','normand.claude@example.org','2025-12-10 22:45:18','$2y$12$z4kpkbDywM2fHNQkifs.p.0Cup7ivjstSPPlQYi/zdUeKHtXkjjFS',NULL,NULL,'feminin',NULL,NULL,'85, impasse de Dufour',NULL,'Mauritanie',NULL,'debutant','2025-10-10 22:45:18','2025-12-04 22:45:18',NULL,NULL,NULL,NULL,'xoXLwiks5I',NULL,'2025-12-10 22:45:18','2025-12-10 22:45:18'),(8,'d314199a-a035-4947-af0f-c49e64b7ee6b','Alphonse','Marchand','Mme','pparent@example.org','2025-12-10 22:45:18','$2y$12$JfgBHhXEERFFoqG7GIG.WulCxykzEIJpBjfbW4ja/0FdCCHz0l4KK',NULL,NULL,'masculin',NULL,NULL,NULL,'Marion-sur-Michaud','Mauritanie','69876','avance','2025-09-27 22:45:18','2025-11-25 22:45:18',NULL,NULL,NULL,NULL,'CIIgQpkNrj',NULL,'2025-12-10 22:45:18','2025-12-10 22:45:18'),(9,'171f3890-f2ef-401e-9128-2b83a8583240','Bernadette','Gregoire','Mme','ines27@example.com','2025-12-10 22:45:18','$2y$12$598TOV3CYV1KveK9MKGmMezG4xuwY5Y1jBVkUxnuVKhdq1.2LRUDq','+33 1 53 57 47 65','1982-01-26','masculin',NULL,NULL,'rue Julien','Chartier','France','17311','avance','2025-10-05 22:45:18','2025-12-02 22:45:18',NULL,NULL,NULL,NULL,'aK8law8POM',NULL,'2025-12-10 22:45:18','2025-12-10 22:45:18'),(10,'d84b57c7-b6d2-41e5-ac35-52a43db56ef5','Julien','Chauveau','Autre','marcel05@example.com','2025-12-10 22:45:18','$2y$12$DJBHpquDY6fP1vTTCByFcOCCwpjfsFwGL.uLTWFjQQUL9xh4f7nyO',NULL,NULL,'feminin',NULL,'Debitis ea officiis quasi voluptatem quam facilis commodi assumenda. Odit quia perferendis aut non voluptas. Distinctio fuga illo nemo officiis iste.','31, impasse Martineau',NULL,'Mali',NULL,'avance','2025-09-21 22:45:19','2025-12-08 22:45:19',NULL,NULL,NULL,NULL,'ihuMUnO8kM',NULL,'2025-12-10 22:45:19','2025-12-10 22:45:19'),(11,'843c28ff-f94f-405f-857b-3b508dfaa930','Chantal','Grondin','M.','lprevost@example.org','2025-12-10 22:45:19','$2y$12$DN3y.K0YZ3aQRQ07KeVfx.E4fOE7XIpO.B3avx//Tca4wH.RUQ2vS','05 03 26 96 92','2001-01-12','masculin',NULL,NULL,NULL,'Marty','Alg├®rie','69607','professionnel','2025-11-21 22:45:19','2025-12-04 22:45:19',NULL,NULL,NULL,NULL,'AxDrfwoJhN',NULL,'2025-12-10 22:45:19','2025-12-10 22:45:19'),(12,'3b931353-beea-4488-a96e-873cb2a99c51','├ëdouard','Remy','Autre','ajacob@example.org','2025-12-10 22:45:19','$2y$12$OxYn5mqYearFcjWpBMz7l.A1fTh7W0vR4LDKYp9beZ6y.C4DFx8hq',NULL,'2004-08-08','feminin',NULL,'Amet hic non aut commodi hic. Natus cumque consequuntur voluptas sunt ut blanditiis sit. Tempore consequatur eveniet nesciunt rerum eos hic odit.','avenue de Guillot',NULL,'Alg├®rie','55442','intermediaire','2025-11-06 22:45:19','2025-12-07 22:45:19',NULL,NULL,NULL,NULL,'nZz6nnxnUW',NULL,'2025-12-10 22:45:19','2025-12-10 22:45:19'),(13,'523db655-117c-48dd-920f-108936abc6d2','Emmanuel','Lesage','Mme','michelle.fernandez@example.com','2025-12-10 22:45:19','$2y$12$WF9JaYnDhBFV5UN.7ZxXJ..jhFLoBD9dl7EppjfY.bCtBgbLgCw7.',NULL,'1970-11-26','masculin',NULL,'Accusantium sequi molestiae itaque esse rerum error. Perferendis doloremque ea dolores quia. Ad dolores asperiores non beatae explicabo.','22, avenue Seguin','Maillet','Mauritanie',NULL,'intermediaire','2025-10-28 22:45:20','2025-11-27 22:45:20',NULL,NULL,NULL,NULL,'l9gLlVHJrZ',NULL,'2025-12-10 22:45:20','2025-12-10 22:45:20'),(14,'8d477f3e-43da-4f80-9f13-e20f9c709e03','Cl├®mence','Didier','M.','penelope95@example.org','2025-12-10 22:45:20','$2y$12$fqNOxFdove6WplFx4lizHucvYKj3Q9obs96HyobIjlUqz5sw6CAzm','0632357015',NULL,'feminin',NULL,NULL,'15, rue de Sauvage',NULL,'Mali','70369','professionnel','2025-10-26 22:45:20','2025-12-10 22:45:20',NULL,NULL,NULL,NULL,'ARfbEv1C95',NULL,'2025-12-10 22:45:20','2025-12-10 22:45:20'),(15,'e2aa0b24-3fcf-436a-bc24-9f894e14e033','Dominique','Faivre','M.','monnier.benoit@example.org','2025-12-10 22:45:20','$2y$12$11hNitYdzx9eXUPuu8n8YeWRBE9OtERopZ/I0ZFSHyRFsY/Gu4086',NULL,NULL,'feminin',NULL,'Aperiam fugit quia quas. Magnam vel enim animi eius vel. At iste harum quia consequuntur perferendis voluptate.','70, rue Reynaud','Paul','Tunisie','38032','professionnel','2025-11-05 22:45:20','2025-12-06 22:45:20',NULL,NULL,NULL,NULL,'Nvo7In5VHo',NULL,'2025-12-10 22:45:20','2025-12-10 22:45:20'),(16,'eeef00b3-87aa-413b-9cc2-0d1694a1fc98','Mich├¿le','Marques','Autre','louis.besson@example.net','2025-12-10 22:45:20','$2y$12$aTzndbdqhhkDlGnqN1nv9ekS2G7FcIOOb3pEvUbDdyuPQqCNSkDnS','03 91 95 43 25',NULL,'masculin',NULL,'Doloremque quasi incidunt ut quod. Aliquam recusandae est ipsa aut ut. Facilis tenetur et quibusdam autem sit.',NULL,'Meunier-la-For├¬t','Tunisie','56963','debutant','2025-10-20 22:45:20','2025-12-06 22:45:20',NULL,NULL,NULL,NULL,'FhYBf5anxv',NULL,'2025-12-10 22:45:20','2025-12-10 22:45:20'),(17,'3fc15eb1-986b-4630-bfa0-70381a59ebec','Richard','Traore','Mme','dominique.delaunay@example.com','2025-12-10 22:45:20','$2y$12$3PTLgJw/e/4ULXCcMfO5Se2WGD15MBBK.KqHtqWAPUVqZpPv9mZ.G','0271578749','1987-01-05','feminin',NULL,NULL,'impasse de Boulanger',NULL,'Tunisie',NULL,'professionnel','2025-09-30 22:45:21','2025-11-26 22:45:21',NULL,NULL,NULL,NULL,'LdqYBiMe6h',NULL,'2025-12-10 22:45:21','2025-12-10 22:45:21'),(18,'b73eb604-d005-4249-96c1-4b5bde02046a','├ël├®onore','Hardy','M.','adelaide.mathieu@example.com','2025-12-10 22:45:21','$2y$12$Ksvz1GffeGnslqLNoiqQ/ehgpRk9SNiY7mqv7c.C0fa3Ym.z69EpG','+33 (0)5 70 93 44 02','1972-11-16','masculin',NULL,NULL,'6, rue de Baudry','Dupuy','Mali',NULL,'intermediaire','2025-09-30 22:45:21','2025-11-28 22:45:21',NULL,NULL,NULL,NULL,'U0ZcaAAZK9',NULL,'2025-12-10 22:45:21','2025-12-10 22:45:21'),(19,'a20e4d72-051f-49ae-ae76-0a30883fd85f','Doroth├®e','Mathieu','Autre','gabriel66@example.com','2025-12-10 22:45:21','$2y$12$4oLx54iCZQX7ITQlSePE9en2oMWRwQQthexEHINEJKaoFZ7I1w.yu',NULL,NULL,'masculin',NULL,'Officia voluptatibus omnis rerum quo. Dignissimos mollitia aperiam sunt ut dolores laborum ipsum. Qui mollitia reprehenderit eligendi qui est soluta.',NULL,NULL,'France','66588','professionnel','2025-09-23 22:45:21','2025-11-28 22:45:21',NULL,NULL,NULL,NULL,'pWys1YYUsW',NULL,'2025-12-10 22:45:21','2025-12-10 22:45:21'),(20,'744590c3-4262-4ad9-87aa-c04da389e2ae','Maggie','Gallet','M.','paul22@example.net','2025-12-10 22:45:21','$2y$12$YDOtgxKfpCdAeNPs/03/S.fe7Yi9Lt7z68SxrqurvotzTyQ0J7STG','03 96 44 79 10','1975-11-26','masculin',NULL,NULL,'boulevard de Benard','Lefebvre','France','30914','avance','2025-12-04 22:45:21','2025-12-08 22:45:21',NULL,NULL,NULL,NULL,'c4AiLj9Vwy',NULL,'2025-12-10 22:45:21','2025-12-10 22:45:21');
/*!40000 ALTER TABLE `apprenants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `benefices`
--

DROP TABLE IF EXISTS `benefices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `benefices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `text_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `benefices`
--

LOCK TABLES `benefices` WRITE;
/*!40000 ALTER TABLE `benefices` DISABLE KEYS */;
INSERT INTO `benefices` VALUES (1,'Options et horaires d\'apprentissage flexibles','Options et horaires d\'apprentissage flexibles','Options et horaires d\'apprentissage flexibles',0,'2025-12-10 22:45:15','2025-12-10 22:45:15'),(2,'Des formateurs exp├®riment├®s dans le secteur','Des formateurs exp├®riment├®s dans le secteur','Des formateurs exp├®riment├®s dans le secteur',1,'2025-12-10 22:45:15','2025-12-10 22:45:15'),(3,'Contenu de cours interactif et stimulant','Contenu de cours interactif et stimulant','Contenu de cours interactif et stimulant',2,'2025-12-10 22:45:15','2025-12-10 22:45:15'),(4,'Orientation professionnelle et soutien au placement','Orientation professionnelle et soutien au placement','Orientation professionnelle et soutien au placement',3,'2025-12-10 22:45:15','2025-12-10 22:45:15'),(5,'Plateforme d\'apprentissage en ligne de pointe','Plateforme d\'apprentissage en ligne de pointe','Plateforme d\'apprentissage en ligne de pointe',4,'2025-12-10 22:45:15','2025-12-10 22:45:15');
/*!40000 ALTER TABLE `benefices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidatures`
--

DROP TABLE IF EXISTS `candidatures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `candidatures` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidatures`
--

LOCK TABLES `candidatures` WRITE;
/*!40000 ALTER TABLE `candidatures` DISABLE KEYS */;
INSERT INTO `candidatures` VALUES (1,'Elhasen','Ba','elhassen.ba@isimsf.u-sfax.tn','33788795','developpeur','hala halah halah','2025-12-11 23:34:51','2025-12-11 23:34:51'),(2,'Elhasen','Ba','bazeinabou261@gmail.com','33788795','dddddddddddddddddddddd','dddddddddddddddddddddddddddddd','2025-12-12 14:42:54','2025-12-12 14:42:54');
/*!40000 ALTER TABLE `candidatures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Informatique','Computer Science','Ï╣┘ä┘ê┘à Ïº┘äÏ¡ÏºÏ│┘êÏ¿','bi bi-laptop','2025-12-10 22:45:15','2025-12-10 22:45:15'),(2,'Marketing Digital','Digital Marketing','Ïº┘äÏ¬Ï│┘ê┘è┘é Ïº┘äÏ▒┘é┘à┘è','bi bi-graph-up-arrow','2025-12-10 22:45:15','2025-12-10 22:45:15'),(3,'Design UI/UX','UI/UX Design','Ï¬ÏÁ┘à┘è┘à ┘êÏºÏ¼┘çÏ® ┘êÏ¬Ï¼Ï▒Ï¿Ï® Ïº┘ä┘àÏ│Ï¬Ï«Ï»┘à','bi bi-palette','2025-12-10 22:45:15','2025-12-10 22:45:15'),(4,'D├®veloppement Mobile','Mobile Development','Ï¬ÏÀ┘ê┘èÏ▒ Ïº┘äÏ¬ÏÀÏ¿┘è┘éÏºÏ¬ Ïº┘ä┘àÏ¬┘å┘é┘äÏ®','bi bi-phone','2025-12-10 22:45:15','2025-12-10 22:45:15'),(5,'Data Science','Data Science','Ï╣┘ä┘ê┘à Ïº┘äÏ¿┘èÏº┘åÏºÏ¬','bi bi-bar-chart-line','2025-12-10 22:45:15','2025-12-10 22:45:15');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
INSERT INTO `contact_messages` VALUES (1,'Elhasen','Ba','elhassenba00@gmail.com','test','ttttttttttesstttttttttttttttt okkkkkkkkkkkkk','2025-12-11 23:31:09','2025-12-11 23:31:09'),(2,'Elhasen','Ba','elhassenba00@gmail.com','test','fffffffffffffffffffffffffff','2025-12-12 14:43:33','2025-12-12 14:43:33');
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_tags`
--

DROP TABLE IF EXISTS `course_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course_id` bigint unsigned NOT NULL,
  `tag_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_tags_course_id_foreign` (`course_id`),
  KEY `course_tags_tag_id_foreign` (`tag_id`),
  CONSTRAINT `course_tags_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `course_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_tags`
--

LOCK TABLES `course_tags` WRITE;
/*!40000 ALTER TABLE `course_tags` DISABLE KEYS */;
INSERT INTO `course_tags` VALUES (1,14,2,'2025-12-10 22:45:15','2025-12-10 22:45:15'),(2,14,5,'2025-12-10 22:45:15','2025-12-10 22:45:15'),(3,14,4,'2025-12-10 22:45:15','2025-12-10 22:45:15');
/*!40000 ALTER TABLE `course_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_fr` text COLLATE utf8mb4_unicode_ci,
  `summary_en` text COLLATE utf8mb4_unicode_ci,
  `summary_ar` text COLLATE utf8mb4_unicode_ci,
  `description_fr` longtext COLLATE utf8mb4_unicode_ci,
  `description_en` longtext COLLATE utf8mb4_unicode_ci,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci,
  `instructeur_id` bigint unsigned DEFAULT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price_type_fr` enum('gratuit','paiement unique','abonnement') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gratuit',
  `price_type_en` enum('free','one_time','subscription') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free',
  `price_type_ar` enum('┘àÏ¼Ïº┘å┘è','Ï»┘üÏ╣ ┘àÏ▒Ï® ┘êÏºÏ¡Ï»Ï®','ÏºÏ┤Ï¬Ï▒Ïº┘â') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '┘àÏ¼Ïº┘å┘è',
  `duration_minutes_fr` int DEFAULT NULL,
  `duration_minutes_en` int DEFAULT NULL,
  `duration_minutes_ar` int DEFAULT NULL,
  `level_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `courses_slug_fr_unique` (`slug_fr`),
  UNIQUE KEY `courses_slug_en_unique` (`slug_en`),
  UNIQUE KEY `courses_slug_ar_unique` (`slug_ar`),
  KEY `courses_instructeur_id_foreign` (`instructeur_id`),
  KEY `courses_category_id_foreign` (`category_id`),
  CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `courses_instructeur_id_foreign` FOREIGN KEY (`instructeur_id`) REFERENCES `instructeurs` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Advanced JavaScript Development',NULL,NULL,'advanced-javascript-development',NULL,NULL,'Ma├«trisez JavaScript moderne : ES6+, async/await, API REST, POO avanc├®e...',NULL,NULL,NULL,NULL,NULL,1,1,0.00,'gratuit','free','┘àÏ¼Ïº┘å┘è',720,NULL,NULL,'Avanc├®',NULL,NULL,'fr','courses/advanced-js.webp',1,'2025-12-05 22:45:15',1,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL),(2,'Initiation ├á Laravel 11',NULL,NULL,'initiation-a-laravel-11',NULL,NULL,'Dolorum vitae ex doloremque tempora minus. Necessitatibus suscipit provident totam. Et aspernatur in molestias aut. Enim quae ea corporis ut sint.',NULL,NULL,NULL,NULL,NULL,1,1,0.00,'gratuit','free','┘àÏ¼Ïº┘å┘è',1258,NULL,NULL,'D├®butant',NULL,NULL,'fr','courses/course-2.webp',1,'2025-09-11 22:45:15',2,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL),(3,'React & Next.js de A ├á Z',NULL,NULL,'react-nextjs-de-a-a-z',NULL,NULL,'Enim corporis quis vitae non nobis eveniet. Soluta beatae quasi id autem sequi omnis et. Sit animi impedit placeat consequuntur inventore.',NULL,NULL,NULL,NULL,NULL,1,4,45000.00,'paiement unique','free','┘àÏ¼Ïº┘å┘è',504,NULL,NULL,'D├®butant',NULL,NULL,'fr','courses/course-3.webp',1,'2025-11-09 22:45:15',3,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL),(4,'Flutter : Apps iOS & Android',NULL,NULL,'flutter-apps-ios-android',NULL,NULL,'Quo facilis qui modi labore ex. Et et possimus asperiores quas non earum tempora impedit. Molestiae atque nesciunt molestiae qui et vero. Sed et aut id rerum nihil.',NULL,NULL,NULL,NULL,NULL,1,1,89000.00,'gratuit','free','┘àÏ¼Ïº┘å┘è',164,NULL,NULL,'Interm├®diaire',NULL,NULL,'fr','courses/course-4.webp',1,'2025-10-06 22:45:15',4,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL),(5,'UI/UX Design avec Figma',NULL,NULL,'uiux-design-avec-figma',NULL,NULL,'Explicabo velit dolorem omnis et fugit similique. Neque accusantium consequatur omnis id quis corrupti. Quia assumenda sunt quia quo qui.',NULL,NULL,NULL,NULL,NULL,1,2,0.00,'gratuit','free','┘àÏ¼Ïº┘å┘è',532,NULL,NULL,'Interm├®diaire',NULL,NULL,'fr','courses/course-5.webp',1,'2025-12-01 22:45:15',5,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL),(6,'Python pour Data Science',NULL,NULL,'python-pour-data-science',NULL,NULL,'Autem cupiditate odio omnis dolorem quia minus quia facilis. Error repudiandae neque neque magni quam cumque. Mollitia quis laboriosam dignissimos iure voluptatem architecto beatae. Cupiditate rerum nobis dolore aspernatur quam. Est tempora voluptate enim assumenda dolore.',NULL,NULL,NULL,NULL,NULL,1,5,45000.00,'gratuit','free','┘àÏ¼Ïº┘å┘è',1441,NULL,NULL,'Avanc├®',NULL,NULL,'fr','courses/course-6.webp',1,'2025-09-26 22:45:15',6,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL),(7,'SEO & Google Analytics',NULL,NULL,'seo-google-analytics',NULL,NULL,'Eaque dignissimos delectus asperiores sed adipisci magni consequatur. Quibusdam odio impedit laboriosam nam tempora laudantium consequatur aut. Illum voluptatem alias tempora modi laboriosam facere repellendus molestias. Laudantium autem aut tempora similique velit quaerat.',NULL,NULL,NULL,NULL,NULL,1,3,45000.00,'paiement unique','free','┘àÏ¼Ïº┘å┘è',1519,NULL,NULL,'D├®butant',NULL,NULL,'fr','courses/course-7.webp',1,'2025-10-21 22:45:15',7,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL),(8,'WordPress Professionnel',NULL,NULL,'wordpress-professionnel',NULL,NULL,'Laboriosam dignissimos impedit cum rerum ut nisi aut eius. Autem nostrum aut consequatur rerum id accusantium. Quis in dolorum est quis consequatur quo veritatis.',NULL,NULL,NULL,NULL,NULL,1,2,25000.00,'gratuit','free','┘àÏ¼Ïº┘å┘è',492,NULL,NULL,'D├®butant',NULL,NULL,'fr','courses/course-8.webp',1,'2025-10-20 22:45:15',8,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL),(9,'Docker & Kubernetes',NULL,NULL,'docker-kubernetes',NULL,NULL,'Exercitationem nobis laudantium aut. Voluptatem magni eum sit rerum eaque. Nostrum necessitatibus id saepe qui aut. Facilis sunt mollitia natus.',NULL,NULL,NULL,NULL,NULL,1,1,89000.00,'gratuit','free','┘àÏ¼Ïº┘å┘è',696,NULL,NULL,'Avanc├®',NULL,NULL,'fr','courses/course-9.webp',1,'2025-09-30 22:45:15',9,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL),(10,'Cybers├®curit├® ├ëthique',NULL,NULL,'cybersecurite-ethique',NULL,NULL,'Adipisci ut ut quo non aut. Ipsa nulla itaque dolore cum. Aut minima dicta voluptas distinctio nobis et ducimus aspernatur.',NULL,NULL,NULL,NULL,NULL,1,3,89000.00,'gratuit','free','┘àÏ¼Ïº┘å┘è',1288,NULL,NULL,'Avanc├®',NULL,NULL,'fr','courses/course-10.webp',1,'2025-10-14 22:45:15',10,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL),(11,'Machine Learning avec TensorFlow',NULL,NULL,'machine-learning-avec-tensorflow',NULL,NULL,'Vel enim qui hic eaque saepe aut. Esse nulla ullam in perspiciatis.',NULL,NULL,NULL,NULL,NULL,1,5,45000.00,'gratuit','free','┘àÏ¼Ïº┘å┘è',266,NULL,NULL,'Avanc├®',NULL,NULL,'fr','courses/course-11.webp',1,'2025-11-06 22:45:15',11,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL),(12,'Anglais Professionnel',NULL,NULL,'anglais-professionnel',NULL,NULL,'Voluptate magni sit a vero illum. Sequi eligendi est nam dicta. Quo debitis dolor ut numquam voluptatem beatae unde. Asperiores ipsum ut non odit.',NULL,NULL,NULL,NULL,NULL,1,1,0.00,'gratuit','free','┘àÏ¼Ïº┘å┘è',475,NULL,NULL,'D├®butant',NULL,NULL,'fr','courses/course-12.webp',1,'2025-11-14 22:45:15',12,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL),(13,'Entrepreneuriat Digital',NULL,NULL,'entrepreneuriat-digital',NULL,NULL,'Aut sunt non occaecati qui non culpa blanditiis. Totam autem mollitia voluptatem et. Et aut incidunt odit. Odit voluptatem tempora qui error veritatis aliquid.',NULL,NULL,NULL,NULL,NULL,1,2,0.00,'paiement unique','free','┘àÏ¼Ïº┘å┘è',331,NULL,NULL,'D├®butant',NULL,NULL,'fr','courses/course-13.webp',1,'2025-10-01 22:45:15',13,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL),(14,'Fondamentaux du Marketing Digital',NULL,NULL,'fondamentaux-du-marketing-digital',NULL,NULL,'Initiez-vous aux leviers du marketing digital.',NULL,NULL,'Programme structur├® avec projets pratiques.',NULL,NULL,2,2,149.00,'paiement unique','free','┘àÏ¼Ïº┘å┘è',480,NULL,NULL,'D├®butant',NULL,NULL,'fr',NULL,1,'2025-12-10 22:45:15',100,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devis_requests`
--

DROP TABLE IF EXISTS `devis_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `devis_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `budget` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devis_requests`
--

LOCK TABLES `devis_requests` WRITE;
/*!40000 ALTER TABLE `devis_requests` DISABLE KEYS */;
INSERT INTO `devis_requests` VALUES (1,'student','Elhassene','elhassenba00@gmail.com','+222 33788795','formation-equipe','300','nnnnnnnnnnnnn','2025-12-11 22:24:08','2025-12-11 22:24:08'),(2,'student','Elhassene','elhassen.ba@isimsf.u-sfax.tn','33788795','workshop',NULL,'vvvvvvvvvvvvvvvvvvvvvvvvv','2025-12-12 14:44:05','2025-12-12 14:44:05');
/*!40000 ALTER TABLE `devis_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emails` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `emails_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
INSERT INTO `emails` VALUES (1,'elhassenba00@gmail.com','type',NULL,NULL),(2,'baba@gmail.com','newsletter','2025-12-11 23:31:59','2025-12-11 23:31:59'),(3,'baelhassene@gmail.com','newsletter','2025-12-12 14:44:42','2025-12-12 14:44:42');
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formations`
--

DROP TABLE IF EXISTS `formations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary_fr` text COLLATE utf8mb4_unicode_ci,
  `summary_en` text COLLATE utf8mb4_unicode_ci,
  `summary_ar` text COLLATE utf8mb4_unicode_ci,
  `description_fr` longtext COLLATE utf8mb4_unicode_ci,
  `description_en` longtext COLLATE utf8mb4_unicode_ci,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci,
  `instructeur_id` bigint unsigned DEFAULT NULL,
  `cours_id` bigint unsigned DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `price_type_fr` enum('gratuit','paiement unique','abonnement') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gratuit',
  `price_type_en` enum('free','one_time','subscription') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'free',
  `price_type_ar` enum('┘àÏ¼Ïº┘å┘è','Ï»┘üÏ╣ ┘àÏ▒Ï® ┘êÏºÏ¡Ï»Ï®','ÏºÏ┤Ï¬Ï▒Ïº┘â') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '┘àÏ¼Ïº┘å┘è',
  `duration_minutes_fr` int DEFAULT NULL,
  `duration_minutes_en` int DEFAULT NULL,
  `duration_minutes_ar` int DEFAULT NULL,
  `date_debut` timestamp NULL DEFAULT NULL,
  `date_fin` timestamp NULL DEFAULT NULL,
  `level_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `formations_slug_fr_unique` (`slug_fr`),
  UNIQUE KEY `formations_slug_en_unique` (`slug_en`),
  UNIQUE KEY `formations_slug_ar_unique` (`slug_ar`),
  KEY `formations_instructeur_id_foreign` (`instructeur_id`),
  KEY `formations_cours_id_foreign` (`cours_id`),
  CONSTRAINT `formations_cours_id_foreign` FOREIGN KEY (`cours_id`) REFERENCES `courses` (`id`) ON DELETE SET NULL,
  CONSTRAINT `formations_instructeur_id_foreign` FOREIGN KEY (`instructeur_id`) REFERENCES `instructeurs` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formations`
--

LOCK TABLES `formations` WRITE;
/*!40000 ALTER TABLE `formations` DISABLE KEYS */;
/*!40000 ALTER TABLE `formations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inscription_courses`
--

DROP TABLE IF EXISTS `inscription_courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inscription_courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `apprenant_id` bigint unsigned NOT NULL,
  `course_id` bigint unsigned NOT NULL,
  `statut` enum('en_attente','valide','annule') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en_attente',
  `is_paye` tinyint(1) NOT NULL DEFAULT '0',
  `montant` decimal(10,2) DEFAULT NULL,
  `mode_paiement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_paiement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_validation` timestamp NULL DEFAULT NULL,
  `date_annulation` timestamp NULL DEFAULT NULL,
  `progression` decimal(5,2) NOT NULL DEFAULT '0.00',
  `note_finale` decimal(5,2) DEFAULT NULL,
  `certifie` tinyint(1) NOT NULL DEFAULT '0',
  `metadata` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inscription_courses_apprenant_id_foreign` (`apprenant_id`),
  KEY `inscription_courses_course_id_foreign` (`course_id`),
  KEY `inscription_courses_reference_paiement_index` (`reference_paiement`),
  CONSTRAINT `inscription_courses_apprenant_id_foreign` FOREIGN KEY (`apprenant_id`) REFERENCES `apprenants` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inscription_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscription_courses`
--

LOCK TABLES `inscription_courses` WRITE;
/*!40000 ALTER TABLE `inscription_courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `inscription_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructeurs`
--

DROP TABLE IF EXISTS `instructeurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instructeurs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio_fr` text COLLATE utf8mb4_unicode_ci,
  `bio_en` text COLLATE utf8mb4_unicode_ci,
  `bio_ar` text COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_years` int NOT NULL DEFAULT '0',
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `instructeurs_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructeurs`
--

LOCK TABLES `instructeurs` WRITE;
/*!40000 ALTER TABLE `instructeurs` DISABLE KEYS */;
INSERT INTO `instructeurs` VALUES (1,'Harouna',NULL,NULL,'Ongoiba',NULL,NULL,'harouna@dunaedu.com','+223 92 27 86 30','D├®veloppeur Full Stack et formateur passionn├® avec plus de 8 ans dÔÇÖexp├®rience.',NULL,NULL,'instructeurs/avatar/harouna.webp',NULL,NULL,NULL,NULL,NULL,'D├®veloppement Web & Mobile',NULL,NULL,8,NULL,NULL,NULL,NULL,1,'2025-12-10 22:45:15','2025-12-10 22:45:15'),(2,'Sarah',NULL,NULL,'Johnson',NULL,NULL,'sarah.johnson@dunaedu.com',NULL,'Experte en marketing digital.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Marketing Digital',NULL,NULL,8,NULL,NULL,NULL,NULL,1,'2025-12-10 22:45:15','2025-12-10 22:45:15'),(3,'Elhassene',NULL,NULL,'Ba',NULL,NULL,'elhassenba00@gmail.com',NULL,'software engineer and cloud architect',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Software engineer',NULL,NULL,0,NULL,NULL,NULL,NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `instructeurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lessons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `module_id` bigint unsigned NOT NULL,
  `title_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_fr` longtext COLLATE utf8mb4_unicode_ci,
  `content_en` longtext COLLATE utf8mb4_unicode_ci,
  `content_ar` longtext COLLATE utf8mb4_unicode_ci,
  `content_type` enum('video','article','quiz','assignment','resource') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'article',
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration_seconds` int DEFAULT NULL,
  `is_locked` tinyint(1) NOT NULL DEFAULT '0',
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lessons_module_id_foreign` (`module_id`),
  CONSTRAINT `lessons_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lessons`
--

LOCK TABLES `lessons` WRITE;
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` VALUES (1,1,'Pr├®requis du cours',NULL,NULL,'Compr├®hension basique de HTML et CSS\nConnaissance des fondamentaux JavaScript\nOrdinateur avec connexion internet\n├ëditeur de code install├®',NULL,NULL,'article',NULL,'lessons/requirements-dunaedu.pdf',300,0,0,'2025-12-10 22:45:15','2025-12-10 22:45:15',NULL);
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liens_utiles`
--

DROP TABLE IF EXISTS `liens_utiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `liens_utiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liens_utiles`
--

LOCK TABLES `liens_utiles` WRITE;
/*!40000 ALTER TABLE `liens_utiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `liens_utiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2025_11_24_001754_create_societes_table',1),(5,'2025_11_24_011749_create_telephones_table',1),(6,'2025_11_24_021158_create_emails_table',1),(7,'2025_11_24_022652_create_liens_utiles_table',1),(8,'2025_11_24_025722_create_reseau_socials_table',1),(9,'2025_11_24_033838_create_propos_table',1),(10,'2025_11_24_034647_create_benefices_table',1),(11,'2025_11_24_034648_create_instructeurs_table',1),(12,'2025_11_24_190716_create_categories_table',1),(13,'2025_11_26_101408_create_courses_table',1),(14,'2025_11_26_103030_create_tags_table',1),(15,'2025_11_26_103311_create_course_tags_table',1),(16,'2025_11_27_015537_create_modules_table',1),(17,'2025_11_27_035233_create_lessons_table',1),(18,'2025_12_07_161906_create_contact_messages_table',1),(19,'2025_12_07_162030_create_devis_requests_table',1),(20,'2025_12_07_162048_create_candidatures_table',1),(21,'2025_12_10_154151_create_apprenants_table',1),(22,'2025_12_10_154317_create_inscription_courses_table',1),(23,'2025_12_10_160806_create_formations_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `modules` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `course_id` bigint unsigned NOT NULL,
  `title_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_fr` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `modules_course_id_foreign` (`course_id`),
  CONSTRAINT `modules_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,1,'Frontend Development',NULL,NULL,'React, JavaScript ES6+, HTML5 & CSS3',NULL,NULL,0,'2025-12-10 22:45:15','2025-12-10 22:45:15');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propos`
--

DROP TABLE IF EXISTS `propos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `subtitle_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_fr` longtext COLLATE utf8mb4_unicode_ci,
  `years_experience_fr` int NOT NULL DEFAULT '0',
  `expert_instructors_fr` int NOT NULL DEFAULT '0',
  `students_worldwide_fr` int NOT NULL DEFAULT '0',
  `mission_fr` text COLLATE utf8mb4_unicode_ci,
  `vision_fr` text COLLATE utf8mb4_unicode_ci,
  `value_fr` text COLLATE utf8mb4_unicode_ci,
  `subtitle_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci,
  `years_experience_en` int NOT NULL DEFAULT '0',
  `expert_instructors_en` int NOT NULL DEFAULT '0',
  `students_worldwide_en` int NOT NULL DEFAULT '0',
  `mission_en` text COLLATE utf8mb4_unicode_ci,
  `vision_en` text COLLATE utf8mb4_unicode_ci,
  `value_en` text COLLATE utf8mb4_unicode_ci,
  `subtitle_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci,
  `years_experience_ar` int NOT NULL DEFAULT '0',
  `expert_instructors_ar` int NOT NULL DEFAULT '0',
  `students_worldwide_ar` int NOT NULL DEFAULT '0',
  `mission_ar` text COLLATE utf8mb4_unicode_ci,
  `vision_ar` text COLLATE utf8mb4_unicode_ci,
  `value_ar` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propos`
--

LOCK TABLES `propos` WRITE;
/*!40000 ALTER TABLE `propos` DISABLE KEYS */;
INSERT INTO `propos` VALUES (1,'├Ç propos de nous','Former les futurs leaders gr├óce ├á une ├®ducation de qualit├®','D├®couvrez des milliers de formations de haute qualit├® con├ºues par des professionnels du secteur...',10,50,15000,'Permettre ├á chaque apprenant d\'atteindre son plein potentiel gr├óce ├á une ├®ducation moderne et accessible.','Devenir la r├®f├®rence de lÔÇÖ├®ducation en ligne en Afrique francophone dÔÇÖici 2030.',NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,0,0,0,NULL,NULL,NULL,'propos/blog-hero-1.webp','propos/team-1.webp','propos/classroom.webp','propos/certification.webp','2025-12-10 22:45:15','2025-12-10 22:45:15');
/*!40000 ALTER TABLE `propos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reseaux_sociaux`
--

DROP TABLE IF EXISTS `reseaux_sociaux`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reseaux_sociaux` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reseaux_sociaux`
--

LOCK TABLES `reseaux_sociaux` WRITE;
/*!40000 ALTER TABLE `reseaux_sociaux` DISABLE KEYS */;
INSERT INTO `reseaux_sociaux` VALUES (1,'Facebook','https://facebook.com/dunaedu','','2025-12-10 22:45:15','2025-12-10 22:45:15'),(2,'Twitter','https://twitter.com/tonprofil','','2025-12-10 22:45:12','2025-12-10 22:45:12'),(3,'Instagram','https://instagram.com/dunaedu','','2025-12-10 22:45:15','2025-12-10 22:45:15'),(4,'LinkedIn','https://linkedin.com/company/dunaedu','','2025-12-10 22:45:15','2025-12-10 22:45:15'),(6,'YouTube','https://youtube.com/@dunaedu','','2025-12-10 22:45:15','2025-12-10 22:45:15'),(11,'Discord','https://discord.gg/tonserveur','','2025-12-10 22:45:12','2025-12-10 22:45:12');
/*!40000 ALTER TABLE `reseaux_sociaux` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('19lr1sVxChMyme8TVcUepGisvlYBzgneRCYyZGoe',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWVoejRsNXQxeVAxTTA0cjU4QVBWMTJzWVVEbXRPYkFvMkI5dEtRcCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9kdW5hZWR1LW1hc3Rlci50ZXN0L2ZyIjtzOjU6InJvdXRlIjtzOjEzOiJob21lLmluZGV4X2ZyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1765561526),('FQaDJ0D8qqbhjFOmo58FLjqsTEz24qo5KVKDmwnT',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTFBTOU4wbjBTQm8wZ3NzbjJhT3NITHZaczBHc0hSNlVqUElQbEpDciI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9kdW5hZWR1LW1hc3Rlci50ZXN0L2ZyIjtzOjU6InJvdXRlIjtzOjEzOiJob21lLmluZGV4X2ZyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1765561526);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `societes`
--

DROP TABLE IF EXISTS `societes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `societes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogan_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_fr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `societes`
--

LOCK TABLES `societes` WRITE;
/*!40000 ALTER TABLE `societes` DISABLE KEYS */;
INSERT INTO `societes` VALUES (1,'DunaEdu','LÔÇÖ├®ducation centralis├®e, accessible ├á tous.','DunaEdu','Centralized education, accessible to all.','Ï»┘ê┘åÏº ÏÑÏ»┘ê','Ïº┘äÏ¬Ï╣┘ä┘è┘à Ïº┘ä┘àÏ▒┘âÏ▓┘è ┘àÏ¬ÏºÏ¡ ┘ä┘äÏ¼┘à┘èÏ╣.','contact@dunaedu.com',NULL,'+223 92 27 86 30',NULL,NULL,'Hamdallaye ACI 2000','3000','Bamako','Mali',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'societes/logos/logo-dunaedu.webp','societes/covers/cover-dunaedu.webp',NULL,'2025-12-10 22:45:15','2025-12-10 22:45:15');
/*!40000 ALTER TABLE `societes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_fr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_slug_fr_unique` (`slug_fr`),
  UNIQUE KEY `tags_slug_en_unique` (`slug_en`),
  UNIQUE KEY `tags_slug_ar_unique` (`slug_ar`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Programming',NULL,NULL,'programming',NULL,NULL,'2025-12-10 22:45:15','2025-12-10 22:45:15'),(2,'JavaScript',NULL,NULL,'javascript',NULL,NULL,'2025-12-10 22:45:15','2025-12-10 22:45:15'),(3,'React',NULL,NULL,'react',NULL,NULL,'2025-12-10 22:45:15','2025-12-10 22:45:15'),(4,'UX',NULL,NULL,'ux',NULL,NULL,'2025-12-10 22:45:15','2025-12-10 22:45:15'),(5,'SEO',NULL,NULL,'seo',NULL,NULL,'2025-12-10 22:45:15','2025-12-10 22:45:15');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telephones`
--

DROP TABLE IF EXISTS `telephones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `telephones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `numero_tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telephones`
--

LOCK TABLES `telephones` WRITE;
/*!40000 ALTER TABLE `telephones` DISABLE KEYS */;
INSERT INTO `telephones` VALUES (1,'34435667','type',NULL,NULL);
/*!40000 ALTER TABLE `telephones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2025-12-12 18:38:39
