-- MySQL dump 10.13  Distrib 8.0.40, for macos14 (arm64)
--
-- Host: localhost    Database: mtto_ceca
-- ------------------------------------------------------
-- Server version	9.1.0

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
-- Table structure for table `cg_academic_areas`
--

DROP TABLE IF EXISTS `cg_academic_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cg_academic_areas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `area_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cg_dependency_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cg_academic_areas_cg_dependency_id_foreign` (`cg_dependency_id`),
  CONSTRAINT `cg_academic_areas_cg_dependency_id_foreign` FOREIGN KEY (`cg_dependency_id`) REFERENCES `cg_dependencies` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cg_academic_areas`
--

LOCK TABLES `cg_academic_areas` WRITE;
/*!40000 ALTER TABLE `cg_academic_areas` DISABLE KEYS */;
INSERT INTO `cg_academic_areas` VALUES (1,'Área Académica de Ingeniería Agroindustrial e Ingeniería en Alimentos',83,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(2,'Área Académica de Medicina Veterinaria y Zootecnia',83,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(3,'Área Académica de Ciencias Agrícolas y Forestales',83,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(4,'Área Académica de Biología (AAB)',84,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(5,'Área Académica de Ciencias de la Tierra y Materiales (AACTyM)',84,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(6,'Área Académica de Computación y Electrónica (AACyE)',84,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(7,'Área Académica de Ingeniería y Arquitectura (AAIyA)',84,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(8,'Área Académica de Matemáticas y Física (AAMyF)',84,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(9,'Área Académica de Química (AAQ)',84,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(10,'Área Académica de Medicina',85,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(11,'Área Académica de Enfermería',85,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(12,'Área Académica de Odontología',85,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(13,'Área Académica de Farmacia',85,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(14,'Área Académica de Nutrición',85,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(15,'Área Académica de Psicología',85,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(16,'Área Académica de Contaduría',86,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(17,'Área Académica de Administración',86,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(18,'Área Académica de Economía',86,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(19,'Área Académica de Comercio Exterior',86,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(20,'Área Académica de Turismo',86,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(21,'Área Académica de Mercadotecnia',86,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(22,'Área Académica de Derecho y Jurisprudencia',87,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(23,'Área Académica de Ciencias Políticas y Administración Pública (AA de CP y AP)',87,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(24,'Área Académica de Ciencias de la Comunicación',87,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(25,'Área Academia de Trabajo Social',87,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(26,'Área Académica de Ciencias de la Educación',87,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(27,'Área Académica de Historia y Antropología (AAHA)',87,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(28,'Área Académica de Sociología y Demografía',87,'2025-05-21 02:39:37','2025-05-21 02:39:37'),(29,'Área Académica de Lingüística',87,'2025-05-21 02:39:37','2025-05-21 02:39:37');
/*!40000 ALTER TABLE `cg_academic_areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cg_brands`
--

DROP TABLE IF EXISTS `cg_brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cg_brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cg_brands`
--

LOCK TABLES `cg_brands` WRITE;
/*!40000 ALTER TABLE `cg_brands` DISABLE KEYS */;
INSERT INTO `cg_brands` VALUES (1,'3Com','2025-05-21 02:39:37','2025-05-21 02:39:37'),(2,'Acer','2025-05-21 02:39:37','2025-05-21 02:39:37'),(3,'Acteck','2025-05-21 02:39:37','2025-05-21 02:39:37'),(4,'ADATA','2025-05-21 02:39:37','2025-05-21 02:39:37'),(5,'Akita','2025-05-21 02:39:37','2025-05-21 02:39:37'),(6,'Alaska','2025-05-21 02:39:37','2025-05-21 02:39:37'),(7,'Alienware','2025-05-21 02:39:37','2025-05-21 02:39:37'),(8,'Alton','2025-05-21 02:39:37','2025-05-21 02:39:37'),(9,'American Power Conversion','2025-05-21 02:39:37','2025-05-21 02:39:37'),(10,'AOpen','2025-05-21 02:39:37','2025-05-21 02:39:37'),(11,'APC','2025-05-21 02:39:37','2025-05-21 02:39:37'),(12,'Apolo','2025-05-21 02:39:37','2025-05-21 02:39:37'),(13,'Apple','2025-05-21 02:39:37','2025-05-21 02:39:37'),(14,'Artec','2025-05-21 02:39:37','2025-05-21 02:39:37'),(15,'Asaji','2025-05-21 02:39:37','2025-05-21 02:39:37'),(16,'ASUS','2025-05-21 02:39:37','2025-05-21 02:39:37'),(17,'AT&T','2025-05-21 02:39:37','2025-05-21 02:39:37'),(18,'Avaya','2025-05-21 02:39:37','2025-05-21 02:39:37'),(19,'AVC','2025-05-21 02:39:37','2025-05-21 02:39:37'),(20,'BenQ','2025-05-21 02:39:37','2025-05-21 02:39:37'),(21,'Belkin','2025-05-21 02:39:37','2025-05-21 02:39:37'),(22,'Best Power','2025-05-21 02:39:37','2025-05-21 02:39:37'),(23,'Bestec','2025-05-21 02:39:37','2025-05-21 02:39:37'),(24,'Blue Code','2025-05-21 02:39:37','2025-05-21 02:39:37'),(25,'Bose','2025-05-21 02:39:37','2025-05-21 02:39:37'),(26,'Boxlight','2025-05-21 02:39:37','2025-05-21 02:39:37'),(27,'Brother','2025-05-21 02:39:37','2025-05-21 02:39:37'),(28,'BTC','2025-05-21 02:39:37','2025-05-21 02:39:37'),(29,'Callcomp','2025-05-21 02:39:37','2025-05-21 02:39:37'),(30,'Canon','2025-05-21 02:39:37','2025-05-21 02:39:37'),(31,'Celmi','2025-05-21 02:39:37','2025-05-21 02:39:37'),(32,'Centra','2025-05-21 02:39:37','2025-05-21 02:39:37'),(33,'Cisco','2025-05-21 02:39:37','2025-05-21 02:39:37'),(34,'CNB','2025-05-21 02:39:37','2025-05-21 02:39:37'),(35,'Coin','2025-05-21 02:39:37','2025-05-21 02:39:37'),(36,'Compaq','2025-05-21 02:39:37','2025-05-21 02:39:37'),(37,'Creative','2025-05-21 02:39:37','2025-05-21 02:39:37'),(38,'Daewoo','2025-05-21 02:39:37','2025-05-21 02:39:37'),(39,'Data Shield','2025-05-21 02:39:37','2025-05-21 02:39:37'),(40,'Dell','2025-05-21 02:39:37','2025-05-21 02:39:37'),(41,'Delta','2025-05-21 02:39:37','2025-05-21 02:39:37'),(42,'Digital','2025-05-21 02:39:37','2025-05-21 02:39:37'),(43,'DSP','2025-05-21 02:39:37','2025-05-21 02:39:37'),(44,'Ecoin','2025-05-21 02:39:37','2025-05-21 02:39:37'),(45,'ECS','2025-05-21 02:39:37','2025-05-21 02:39:37'),(46,'Edge Systems','2025-05-21 02:39:37','2025-05-21 02:39:37'),(47,'EEE','2025-05-21 02:39:37','2025-05-21 02:39:37'),(48,'E-Geforce','2025-05-21 02:39:37','2025-05-21 02:39:37'),(49,'EMachines','2025-05-21 02:39:37','2025-05-21 02:39:37'),(50,'Epson','2025-05-21 02:39:37','2025-05-21 02:39:37'),(51,'Eti Palca','2025-05-21 02:39:37','2025-05-21 02:39:37'),(52,'Evotec','2025-05-21 02:39:37','2025-05-21 02:39:37'),(53,'Fabrireal','2025-05-21 02:39:37','2025-05-21 02:39:37'),(54,'Forza Power Technologies','2025-05-21 02:39:37','2025-05-21 02:39:37'),(55,'Gateway','2025-05-21 02:39:37','2025-05-21 02:39:37'),(56,'Genérico','2025-05-21 02:39:37','2025-05-21 02:39:37'),(57,'Genesis','2025-05-21 02:39:37','2025-05-21 02:39:37'),(58,'Genicom','2025-05-21 02:39:37','2025-05-21 02:39:37'),(59,'Genius','2025-05-21 02:39:37','2025-05-21 02:39:37'),(60,'Gigabyte','2025-05-21 02:39:37','2025-05-21 02:39:37'),(61,'Gigaware','2025-05-21 02:39:37','2025-05-21 02:39:37'),(62,'Green','2025-05-21 02:39:37','2025-05-21 02:39:37'),(63,'HGST','2025-05-21 02:39:37','2025-05-21 02:39:37'),(64,'Hipro','2025-05-21 02:39:37','2025-05-21 02:39:37'),(65,'Hitachi','2025-05-21 02:39:37','2025-05-21 02:39:37'),(66,'HP','2025-05-21 02:39:37','2025-05-21 02:39:37'),(67,'HS','2025-05-21 02:39:37','2025-05-21 02:39:37'),(68,'IBM','2025-05-21 02:39:37','2025-05-21 02:39:37'),(69,'IEMEX','2025-05-21 02:39:37','2025-05-21 02:39:37'),(70,'Intel','2025-05-21 02:39:37','2025-05-21 02:39:37'),(71,'ISB','2025-05-21 02:39:37','2025-05-21 02:39:37'),(72,'JBL','2025-05-21 02:39:37','2025-05-21 02:39:37'),(73,'Kingston','2025-05-21 02:39:37','2025-05-21 02:39:37'),(74,'Koblenz','2025-05-21 02:39:37','2025-05-21 02:39:37'),(75,'Kodak','2025-05-21 02:39:37','2025-05-21 02:39:37'),(76,'Lenovo','2025-05-21 02:39:37','2025-05-21 02:39:37'),(77,'LG','2025-05-21 02:39:37','2025-05-21 02:39:37'),(78,'Microsoft','2025-05-21 02:39:37','2025-05-21 02:39:37'),(79,'NVIDIA GeForce','2025-05-21 02:39:37','2025-05-21 02:39:37'),(80,'Panasonic','2025-05-21 02:39:37','2025-05-21 02:39:37'),(81,'Philips','2025-05-21 02:39:37','2025-05-21 02:39:37'),(82,'Pioneer','2025-05-21 02:39:37','2025-05-21 02:39:37'),(83,'Polaroid','2025-05-21 02:39:37','2025-05-21 02:39:37'),(84,'Samsung','2025-05-21 02:39:37','2025-05-21 02:39:37'),(85,'Steren','2025-05-21 02:39:37','2025-05-21 02:39:37'),(86,'Toshiba','2025-05-21 02:39:37','2025-05-21 02:39:37'),(87,'TP-Link','2025-05-21 02:39:37','2025-05-21 02:39:37'),(88,'Xerox','2025-05-21 02:39:37','2025-05-21 02:39:37');
/*!40000 ALTER TABLE `cg_brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cg_dependencies`
--

DROP TABLE IF EXISTS `cg_dependencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cg_dependencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dependency_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cg_dependencies`
--

LOCK TABLES `cg_dependencies` WRITE;
/*!40000 ALTER TABLE `cg_dependencies` DISABLE KEYS */;
INSERT INTO `cg_dependencies` VALUES (1,'Administración de Ciudad del Conocimiento','2025-05-21 02:39:37','2025-05-21 02:39:37'),(2,'Administración de Edificio Central','2025-05-21 02:39:37','2025-05-21 02:39:37'),(3,'Administración de Torres de Rectoría','2025-05-21 02:39:37','2025-05-21 02:39:37'),(4,'Centro de Educación Continua y a Distancia','2025-05-21 02:39:37','2025-05-21 02:39:37'),(5,'Centro de Innovación para el Desarrollo y la Capacitación en Materiales Educativos','2025-05-21 02:39:37','2025-05-21 02:39:37'),(6,'Centro de Lenguas','2025-05-21 02:39:37','2025-05-21 02:39:37'),(7,'Contraloría General','2025-05-21 02:39:37','2025-05-21 02:39:37'),(8,'Coordinación de Administración y Finanzas','2025-05-21 02:39:37','2025-05-21 02:39:37'),(9,'Defensor Universitario','2025-05-21 02:39:37','2025-05-21 02:39:37'),(10,'Dirección de Administración de Personal','2025-05-21 02:39:37','2025-05-21 02:39:37'),(11,'Dirección de Administración Escolar','2025-05-21 02:39:37','2025-05-21 02:39:37'),(12,'Dirección de Ahorro para el Retiro','2025-05-21 02:39:37','2025-05-21 02:39:37'),(13,'Dirección de Archivo General','2025-05-21 02:39:37','2025-05-21 02:39:37'),(14,'Dirección de Autoaprendizaje de Idiomas','2025-05-21 02:39:37','2025-05-21 02:39:37'),(15,'Dirección de Becas','2025-05-21 02:39:37','2025-05-21 02:39:37'),(16,'Dirección de Bibliotecas y Centros de Información','2025-05-21 02:39:37','2025-05-21 02:39:37'),(17,'Dirección de Bioterio','2025-05-21 02:39:37','2025-05-21 02:39:37'),(18,'Dirección de Centro de Cómputo Académico','2025-05-21 02:39:37','2025-05-21 02:39:37'),(19,'Dirección de Comunicación Social','2025-05-21 02:39:37','2025-05-21 02:39:37'),(20,'Dirección de Control Presupuestal','2025-05-21 02:39:37','2025-05-21 02:39:37'),(21,'Dirección de Desarrollo de Capital Humano para la Investigación','2025-05-21 02:39:37','2025-05-21 02:39:37'),(22,'Dirección de Desarrollo e Innovación','2025-05-21 02:39:37','2025-05-21 02:39:37'),(23,'Dirección de Ediciones y Publicaciones','2025-05-21 02:39:37','2025-05-21 02:39:37'),(24,'Dirección de Educación Media Superior','2025-05-21 02:39:37','2025-05-21 02:39:37'),(25,'Dirección de Educación Superior','2025-05-21 02:39:37','2025-05-21 02:39:37'),(26,'Dirección de Enlace Institucional','2025-05-21 02:39:37','2025-05-21 02:39:37'),(27,'Dirección de Estudios de Pertinencia, Factibilidad y Viabilidad','2025-05-21 02:39:37','2025-05-21 02:39:37'),(28,'Dirección de Estudios Estratégicos y Desarrollo Institucional','2025-05-21 02:39:37','2025-05-21 02:39:37'),(29,'Dirección de Eventos Especiales','2025-05-21 02:39:37','2025-05-21 02:39:37'),(30,'Dirección de Fomento a la Lectura','2025-05-21 02:39:37','2025-05-21 02:39:37'),(31,'Dirección de Gestión de la Calidad','2025-05-21 02:39:37','2025-05-21 02:39:37'),(32,'Dirección de Imagen y Mercadotecnia','2025-05-21 02:39:37','2025-05-21 02:39:37'),(33,'Dirección de Información y Sistemas','2025-05-21 02:39:37','2025-05-21 02:39:37'),(34,'Dirección de Internacionalización','2025-05-21 02:39:37','2025-05-21 02:39:37'),(35,'Dirección de Investigación','2025-05-21 02:39:37','2025-05-21 02:39:37'),(36,'Dirección de la Divulgación de la Ciencia','2025-05-21 02:39:37','2025-05-21 02:39:37'),(37,'Dirección de Laboratorios','2025-05-21 02:39:37','2025-05-21 02:39:37'),(38,'Dirección de Mantenimiento','2025-05-21 02:39:37','2025-05-21 02:39:37'),(39,'Dirección de Promoción Cultural','2025-05-21 02:39:37','2025-05-21 02:39:37'),(40,'Dirección de Promoción Deportiva','2025-05-21 02:39:37','2025-05-21 02:39:37'),(41,'Dirección de Protección Civil','2025-05-21 02:39:37','2025-05-21 02:39:37'),(42,'Dirección de Proyectos y Obras','2025-05-21 02:39:37','2025-05-21 02:39:37'),(43,'Dirección de Recursos Financieros','2025-05-21 02:39:37','2025-05-21 02:39:37'),(44,'Dirección de Recursos Materiales, Adquisiciones, Arrendamientos y Servicios','2025-05-21 02:39:37','2025-05-21 02:39:37'),(45,'Dirección de Relaciones Interinstitucionales','2025-05-21 02:39:37','2025-05-21 02:39:37'),(46,'Dirección de Relaciones Internacionales e Intercambio Académico','2025-05-21 02:39:37','2025-05-21 02:39:37'),(47,'Dirección de Relaciones Públicas','2025-05-21 02:39:37','2025-05-21 02:39:37'),(48,'Dirección de Servicio Social, Prácticas Profesionales y Vinculación Laboral','2025-05-21 02:39:37','2025-05-21 02:39:37'),(49,'Dirección de Servicios Académicos','2025-05-21 02:39:37','2025-05-21 02:39:37'),(50,'Dirección de Superación Académica','2025-05-21 02:39:37','2025-05-21 02:39:37'),(51,'Dirección de Tecnologías Web y Webometría','2025-05-21 02:39:37','2025-05-21 02:39:37'),(52,'Dirección de Tesorería','2025-05-21 02:39:37','2025-05-21 02:39:37'),(53,'Dirección de Transferencia de Tecnología','2025-05-21 02:39:37','2025-05-21 02:39:37'),(54,'Dirección de Tutorías','2025-05-21 02:39:37','2025-05-21 02:39:37'),(55,'Dirección de Vinculación con Egresados','2025-05-21 02:39:37','2025-05-21 02:39:37'),(56,'Dirección General de Comunicación Social','2025-05-21 02:39:37','2025-05-21 02:39:37'),(57,'Dirección General de Evaluación','2025-05-21 02:39:37','2025-05-21 02:39:37'),(58,'Dirección General de Planeación','2025-05-21 02:39:37','2025-05-21 02:39:37'),(59,'Dirección General Jurídica','2025-05-21 02:39:37','2025-05-21 02:39:37'),(60,'División Académica','2025-05-21 02:39:37','2025-05-21 02:39:37'),(61,'División de Extensión de la Cultura','2025-05-21 02:39:37','2025-05-21 02:39:37'),(62,'División de Investigación, Desarrollo e Innovación','2025-05-21 02:39:37','2025-05-21 02:39:37'),(63,'División de Vinculación e Internacionalización','2025-05-21 02:39:37','2025-05-21 02:39:37'),(64,'Escuela Preparatoria Número 1','2025-05-21 02:39:37','2025-05-21 02:39:37'),(65,'Escuela Preparatoria Número 2','2025-05-21 02:39:37','2025-05-21 02:39:37'),(66,'Escuela Preparatoria Número 3','2025-05-21 02:39:37','2025-05-21 02:39:37'),(67,'Escuela Preparatoria Número 4','2025-05-21 02:39:37','2025-05-21 02:39:37'),(68,'Escuela Preparatoria Número 5','2025-05-21 02:39:37','2025-05-21 02:39:37'),(69,'Escuela Preparatoria Número 6','2025-05-21 02:39:37','2025-05-21 02:39:37'),(70,'Escuela Preparatoria Número 7','2025-05-21 02:39:37','2025-05-21 02:39:37'),(71,'Escuela Preparatoria Número 8','2025-05-21 02:39:37','2025-05-21 02:39:37'),(72,'Escuela Superior de Actopan','2025-05-21 02:39:37','2025-05-21 02:39:37'),(73,'Escuela Superior de Apan','2025-05-21 02:39:37','2025-05-21 02:39:37'),(74,'Escuela Superior de Atotonilco de Tula','2025-05-21 02:39:37','2025-05-21 02:39:37'),(75,'Escuela Superior de Ciudad Sahagún','2025-05-21 02:39:37','2025-05-21 02:39:37'),(76,'Escuela Superior de Huejutla','2025-05-21 02:39:37','2025-05-21 02:39:37'),(77,'Escuela Superior de Tepeji del Río','2025-05-21 02:39:37','2025-05-21 02:39:37'),(78,'Escuela Superior de Tizayuca','2025-05-21 02:39:37','2025-05-21 02:39:37'),(79,'Escuela Superior de Tlahuelilpan','2025-05-21 02:39:37','2025-05-21 02:39:37'),(80,'Escuela Superior de Zimapán','2025-05-21 02:39:37','2025-05-21 02:39:37'),(81,'Externo','2025-05-21 02:39:37','2025-05-21 02:39:37'),(82,'Instituto de Artes (IA)','2025-05-21 02:39:37','2025-05-21 02:39:37'),(83,'Instituto de Ciencias Agropecuarias (ICAp)','2025-05-21 02:39:37','2025-05-21 02:39:37'),(84,'Instituto de Ciencias Básicas e Ingeniería (ICBI)','2025-05-21 02:39:37','2025-05-21 02:39:37'),(85,'Instituto de Ciencias de la Salud (ICSa)','2025-05-21 02:39:37','2025-05-21 02:39:37'),(86,'Instituto de Ciencias Económico Administrativas (ICEA)','2025-05-21 02:39:37','2025-05-21 02:39:37'),(87,'Instituto de Ciencias Sociales y Humanidades (ICSHu)','2025-05-21 02:39:37','2025-05-21 02:39:37'),(88,'Museo Casa Grande','2025-05-21 02:39:37','2025-05-21 02:39:37'),(89,'Parque Científico y Tecnológico','2025-05-21 02:39:37','2025-05-21 02:39:37'),(90,'Patronato','2025-05-21 02:39:37','2025-05-21 02:39:37'),(91,'Radio Universidad Actopan','2025-05-21 02:39:37','2025-05-21 02:39:37'),(92,'Radio Universidad Huejutla','2025-05-21 02:39:37','2025-05-21 02:39:37'),(93,'Radio Universidad Pachuca','2025-05-21 02:39:37','2025-05-21 02:39:37'),(94,'Radio Universidad San Bartolo Tutotepec','2025-05-21 02:39:37','2025-05-21 02:39:37'),(95,'Radio Universidad Tulancingo','2025-05-21 02:39:37','2025-05-21 02:39:37'),(96,'Radio Universidad Zimapán','2025-05-21 02:39:37','2025-05-21 02:39:37'),(97,'Rectoría','2025-05-21 02:39:37','2025-05-21 02:39:37'),(98,'Secretaría General','2025-05-21 02:39:37','2025-05-21 02:39:37'),(99,'Sindicato de Personal Académico UAEH (SPAUAEH)','2025-05-21 02:39:37','2025-05-21 02:39:37'),(100,'Sindicato Único de Trabajadores y Empleados de la Universidad Autónoma del Estado de Hidalgo (SUTEUAEH)','2025-05-21 02:39:37','2025-05-21 02:39:37'),(101,'Sistema Universitario de Medios Autónomos','2025-05-21 02:39:37','2025-05-21 02:39:37'),(102,'Transparencia y Acceso a la Información','2025-05-21 02:39:37','2025-05-21 02:39:37'),(103,'Voluntariado Universitario','2025-05-21 02:39:37','2025-05-21 02:39:37');
/*!40000 ALTER TABLE `cg_dependencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cg_kind_failures`
--

DROP TABLE IF EXISTS `cg_kind_failures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cg_kind_failures` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `failure` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cg_kind_failures`
--

LOCK TABLES `cg_kind_failures` WRITE;
/*!40000 ALTER TABLE `cg_kind_failures` DISABLE KEYS */;
INSERT INTO `cg_kind_failures` VALUES (1,'Actualizar software básico','2025-05-21 02:39:37','2025-05-21 02:39:37'),(2,'Ampliar memoria','2025-05-21 02:39:37','2025-05-21 02:39:37'),(3,'Atasco de cassette','2025-05-21 02:39:37','2025-05-21 02:39:37'),(4,'Atasco de papel','2025-05-21 02:39:37','2025-05-21 02:39:37'),(5,'Batería de BIOS agotada','2025-05-21 02:39:37','2025-05-21 02:39:37'),(6,'Botón de encendido dañado','2025-05-21 02:39:37','2025-05-21 02:39:37'),(7,'Cable con falso contacto','2025-05-21 02:39:37','2025-05-21 02:39:37'),(8,'Cabezales de impresión obstruidos','2025-05-21 02:39:37','2025-05-21 02:39:37'),(9,'Carga de tóner','2025-05-21 02:39:37','2025-05-21 02:39:37'),(10,'CPU no reconocida','2025-05-21 02:39:37','2025-05-21 02:39:37'),(11,'Daño en disco duro','2025-05-21 02:39:37','2025-05-21 02:39:37'),(12,'Desgaste de gomas','2025-05-21 02:39:37','2025-05-21 02:39:37'),(13,'Disco duro no reconocido','2025-05-21 02:39:37','2025-05-21 02:39:37'),(14,'Error en la tarjeta de red','2025-05-21 02:39:37','2025-05-21 02:39:37'),(15,'Error en la tarjeta de video','2025-05-21 02:39:37','2025-05-21 02:39:37'),(16,'Equipo mojado','2025-05-21 02:39:37','2025-05-21 02:39:37'),(17,'Falla en la proyección de color','2025-05-21 02:39:37','2025-05-21 02:39:37'),(18,'Falla en unidad CD-RW/DVD','2025-05-21 02:39:37','2025-05-21 02:39:37'),(19,'Falla en USB no detectado','2025-05-21 02:39:37','2025-05-21 02:39:37'),(20,'Fallo en el respaldo de datos','2025-05-21 02:39:37','2025-05-21 02:39:37'),(21,'Formatear equipo','2025-05-21 02:39:37','2025-05-21 02:39:37'),(22,'Fuente de poder dañada','2025-05-21 02:39:37','2025-05-21 02:39:37'),(23,'Imagen borrosa o distorsionada','2025-05-21 02:39:37','2025-05-21 02:39:37'),(24,'Impresión incompleta','2025-05-21 02:39:37','2025-05-21 02:39:37'),(25,'Infección por virus','2025-05-21 02:39:37','2025-05-21 02:39:37'),(26,'Instalar software','2025-05-21 02:39:37','2025-05-21 02:39:37'),(27,'Limpieza y mantenimiento','2025-05-21 02:39:37','2025-05-21 02:39:37'),(28,'No arranca el sistema operativo','2025-05-21 02:39:37','2025-05-21 02:39:37'),(29,'No despliega imagen','2025-05-21 02:39:37','2025-05-21 02:39:37'),(30,'No enciende','2025-05-21 02:39:37','2025-05-21 02:39:37'),(31,'No enciende la pantalla','2025-05-21 02:39:37','2025-05-21 02:39:37'),(32,'No imprime','2025-05-21 02:39:37','2025-05-21 02:39:37'),(33,'No jala las hojas','2025-05-21 02:39:37','2025-05-21 02:39:37'),(34,'No proyecta imagen','2025-05-21 02:39:37','2025-05-21 02:39:37'),(35,'Problema con desplazamiento','2025-05-21 02:39:37','2025-05-21 02:39:37'),(36,'Recarga de tóner','2025-05-21 02:39:37','2025-05-21 02:39:37'),(37,'Revisión general','2025-05-21 02:39:37','2025-05-21 02:39:37'),(38,'Ruidos extraños en el equipo','2025-05-21 02:39:37','2025-05-21 02:39:37'),(39,'Sistema operativo corrupto','2025-05-21 02:39:37','2025-05-21 02:39:37'),(40,'Tapa rota','2025-05-21 02:39:37','2025-05-21 02:39:37'),(41,'Teflón de impresora dañado','2025-05-21 02:39:37','2025-05-21 02:39:37');
/*!40000 ALTER TABLE `cg_kind_failures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cg_kind_objects`
--

DROP TABLE IF EXISTS `cg_kind_objects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cg_kind_objects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `object` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cg_kind_objects`
--

LOCK TABLES `cg_kind_objects` WRITE;
/*!40000 ALTER TABLE `cg_kind_objects` DISABLE KEYS */;
INSERT INTO `cg_kind_objects` VALUES (1,'Access Point','2025-05-21 02:39:37','2025-05-21 02:39:37'),(2,'Amplificador de sonido','2025-05-21 02:39:37','2025-05-21 02:39:37'),(3,'Aspiradora','2025-05-21 02:39:37','2025-05-21 02:39:37'),(4,'Audífonos','2025-05-21 02:39:37','2025-05-21 02:39:37'),(5,'Bocina','2025-05-21 02:39:37','2025-05-21 02:39:37'),(6,'CPU','2025-05-21 02:39:37','2025-05-21 02:39:37'),(7,'Cable de video','2025-05-21 02:39:37','2025-05-21 02:39:37'),(8,'Cafetera','2025-05-21 02:39:37','2025-05-21 02:39:37'),(9,'Cámara fotográfica','2025-05-21 02:39:37','2025-05-21 02:39:37'),(10,'Cámara de video','2025-05-21 02:39:37','2025-05-21 02:39:37'),(11,'Cargador','2025-05-21 02:39:37','2025-05-21 02:39:37'),(12,'CD-ROM','2025-05-21 02:39:37','2025-05-21 02:39:37'),(13,'CD-RW','2025-05-21 02:39:37','2025-05-21 02:39:37'),(14,'Celular','2025-05-21 02:39:37','2025-05-21 02:39:37'),(15,'Disco duro','2025-05-21 02:39:37','2025-05-21 02:39:37'),(16,'DVD','2025-05-21 02:39:37','2025-05-21 02:39:37'),(17,'Fax','2025-05-21 02:39:37','2025-05-21 02:39:37'),(18,'Fotocopiadora','2025-05-21 02:39:37','2025-05-21 02:39:37'),(19,'Fuente de poder','2025-05-21 02:39:37','2025-05-21 02:39:37'),(20,'Grabadora','2025-05-21 02:39:37','2025-05-21 02:39:37'),(21,'Hub de red','2025-05-21 02:39:37','2025-05-21 02:39:37'),(22,'Impresora','2025-05-21 02:39:37','2025-05-21 02:39:37'),(23,'Impresora de inyección','2025-05-21 02:39:37','2025-05-21 02:39:37'),(24,'Impresora de matriz de puntos','2025-05-21 02:39:37','2025-05-21 02:39:37'),(25,'Impresora láser','2025-05-21 02:39:37','2025-05-21 02:39:37'),(26,'Impresora multifuncional','2025-05-21 02:39:37','2025-05-21 02:39:37'),(27,'Juego de bocinas','2025-05-21 02:39:37','2025-05-21 02:39:37'),(28,'Lámpara','2025-05-21 02:39:37','2025-05-21 02:39:37'),(29,'Laptop','2025-05-21 02:39:37','2025-05-21 02:39:37'),(30,'Máquina de escribir','2025-05-21 02:39:37','2025-05-21 02:39:37'),(31,'Máquina fotocopiadora','2025-05-21 02:39:37','2025-05-21 02:39:37'),(32,'Memoria RAM','2025-05-21 02:39:37','2025-05-21 02:39:37'),(33,'Micrófono','2025-05-21 02:39:37','2025-05-21 02:39:37'),(34,'Monitor','2025-05-21 02:39:37','2025-05-21 02:39:37'),(35,'Mouse','2025-05-21 02:39:37','2025-05-21 02:39:37'),(36,'Plotter','2025-05-21 02:39:37','2025-05-21 02:39:37'),(37,'Proyector','2025-05-21 02:39:37','2025-05-21 02:39:37'),(38,'Radio grabadora','2025-05-21 02:39:37','2025-05-21 02:39:37'),(39,'Regulador de voltaje','2025-05-21 02:39:37','2025-05-21 02:39:37'),(40,'Escáner a color','2025-05-21 02:39:37','2025-05-21 02:39:37'),(41,'Escáner monocromático','2025-05-21 02:39:37','2025-05-21 02:39:37'),(42,'Servidor','2025-05-21 02:39:37','2025-05-21 02:39:37'),(43,'Tableta digitalizadora','2025-05-21 02:39:37','2025-05-21 02:39:37'),(44,'Tablet','2025-05-21 02:39:37','2025-05-21 02:39:37'),(45,'Tarjeta de video','2025-05-21 02:39:37','2025-05-21 02:39:37'),(46,'Teclado','2025-05-21 02:39:37','2025-05-21 02:39:37'),(47,'Teléfono','2025-05-21 02:39:37','2025-05-21 02:39:37'),(48,'Televisor','2025-05-21 02:39:37','2025-05-21 02:39:37'),(49,'Terminal de computadora','2025-05-21 02:39:37','2025-05-21 02:39:37'),(50,'Unidad de cintas','2025-05-21 02:39:37','2025-05-21 02:39:37'),(51,'Unidad de respaldo','2025-05-21 02:39:37','2025-05-21 02:39:37'),(52,'UPS','2025-05-21 02:39:37','2025-05-21 02:39:37'),(53,'Reproductor de video','2025-05-21 02:39:37','2025-05-21 02:39:37'),(54,'Videocasetera','2025-05-21 02:39:37','2025-05-21 02:39:37');
/*!40000 ALTER TABLE `cg_kind_objects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cg_kind_people`
--

DROP TABLE IF EXISTS `cg_kind_people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cg_kind_people` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kind_person` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cg_kind_people`
--

LOCK TABLES `cg_kind_people` WRITE;
/*!40000 ALTER TABLE `cg_kind_people` DISABLE KEYS */;
INSERT INTO `cg_kind_people` VALUES (1,'Alumno','2025-05-21 02:39:37','2025-05-21 02:39:37'),(2,'Académico','2025-05-21 02:39:37','2025-05-21 02:39:37'),(3,'Administrativo','2025-05-21 02:39:37','2025-05-21 02:39:37'),(4,'Externo','2025-05-21 02:39:37','2025-05-21 02:39:37'),(5,'Proveedor','2025-05-21 02:39:37','2025-05-21 02:39:37'),(6,'Otro','2025-05-21 02:39:37','2025-05-21 02:39:37');
/*!40000 ALTER TABLE `cg_kind_people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `computers`
--

DROP TABLE IF EXISTS `computers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `computers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_device_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `computers_order_device_id_foreign` (`order_device_id`),
  CONSTRAINT `computers_order_device_id_foreign` FOREIGN KEY (`order_device_id`) REFERENCES `order_devices` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `computers`
--

LOCK TABLES `computers` WRITE;
/*!40000 ALTER TABLE `computers` DISABLE KEYS */;
/*!40000 ALTER TABLE `computers` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'2025_01_14_191151_create_cg_dependencies_table',2),(3,'2025_01_13_202352_create_cg_academic_areas_table',3),(4,'2025_01_13_202440_create_cg_brands_table',4),(5,'2025_01_13_202514_create_cg_kind_failures_table',5),(6,'2025_01_13_202535_create_cg_kind_objects_table',6),(7,'2025_01_13_202547_create_cg_kind_people_table',7),(8,'2025_01_13_202655_create_orders_table',8),(9,'2025_01_14_193241_create_order_devices_table',9),(10,'0001_01_01_000001_create_cache_table',10),(11,'0001_01_01_000002_create_jobs_table',10),(12,'2025_01_13_200917_add_two_factor_columns_to_users_table',10),(13,'2025_01_13_200929_create_personal_access_tokens_table',10),(14,'2025_01_13_202611_create_computers_table',10),(15,'2025_01_13_203607_create_u_community_table',10),(16,'2025_01_16_175235_create_permission_tables',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (3,'App\\Models\\User',1),(1,'App\\Models\\User',2),(2,'App\\Models\\User',3),(2,'App\\Models\\User',4),(2,'App\\Models\\User',5);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_devices`
--

DROP TABLE IF EXISTS `order_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_devices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_observations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnostic` text COLLATE utf8mb4_unicode_ci,
  `ceca_observations` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computer` tinyint(1) NOT NULL DEFAULT '0',
  `serial_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cg_brand_id` bigint unsigned NOT NULL,
  `order_id` bigint unsigned NOT NULL,
  `cg_kind_failure_id` bigint unsigned NOT NULL,
  `cg_kind_object_id` bigint unsigned NOT NULL,
  `ceca_repairs` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_devices_cg_brand_id_foreign` (`cg_brand_id`),
  KEY `order_devices_order_id_foreign` (`order_id`),
  KEY `order_devices_cg_kind_object_id_foreign` (`cg_kind_object_id`),
  KEY `order_devices_cg_kind_failure_id_foreign` (`cg_kind_failure_id`),
  KEY `order_devices_ceca_repairs_foreign` (`ceca_repairs`),
  CONSTRAINT `order_devices_ceca_repairs_foreign` FOREIGN KEY (`ceca_repairs`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `order_devices_cg_brand_id_foreign` FOREIGN KEY (`cg_brand_id`) REFERENCES `cg_brands` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `order_devices_cg_kind_failure_id_foreign` FOREIGN KEY (`cg_kind_failure_id`) REFERENCES `cg_kind_failures` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `order_devices_cg_kind_object_id_foreign` FOREIGN KEY (`cg_kind_object_id`) REFERENCES `cg_kind_objects` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `order_devices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_devices`
--

LOCK TABLES `order_devices` WRITE;
/*!40000 ALTER TABLE `order_devices` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_generation` date NOT NULL,
  `date_reception` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_delivered` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_received` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ext` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kperson_delivery` bigint unsigned NOT NULL,
  `cg_dependency_id` bigint unsigned NOT NULL,
  `cg_academic_area_id` bigint unsigned DEFAULT NULL,
  `ceca_received` bigint unsigned DEFAULT NULL,
  `ceca_delivered` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_kperson_delivery_foreign` (`kperson_delivery`),
  KEY `orders_cg_dependency_id_foreign` (`cg_dependency_id`),
  KEY `orders_cg_academic_area_id_foreign` (`cg_academic_area_id`),
  KEY `orders_ceca_received_foreign` (`ceca_received`),
  KEY `orders_ceca_delivered_foreign` (`ceca_delivered`),
  CONSTRAINT `orders_ceca_delivered_foreign` FOREIGN KEY (`ceca_delivered`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `orders_ceca_received_foreign` FOREIGN KEY (`ceca_received`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `orders_cg_academic_area_id_foreign` FOREIGN KEY (`cg_academic_area_id`) REFERENCES `cg_academic_areas` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `orders_cg_dependency_id_foreign` FOREIGN KEY (`cg_dependency_id`) REFERENCES `cg_dependencies` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `orders_kperson_delivery_foreign` FOREIGN KEY (`kperson_delivery`) REFERENCES `cg_kind_people` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `generate_order_number` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
                DECLARE last_order_number INT DEFAULT 0;

                SELECT COALESCE(MAX(CAST(SUBSTRING_INDEX(order_number, "-", -1) AS UNSIGNED)), 0)
                INTO last_order_number
                FROM orders;

                SET NEW.order_number = CONCAT("AM-", last_order_number + 1);
            END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create roles','web','2025-05-21 02:39:34','2025-05-21 02:39:34'),(2,'read roles','web','2025-05-21 02:39:34','2025-05-21 02:39:34'),(3,'update roles','web','2025-05-21 02:39:34','2025-05-21 02:39:34'),(4,'delete roles','web','2025-05-21 02:39:34','2025-05-21 02:39:34'),(5,'create academic areas','web','2025-05-21 02:39:34','2025-05-21 02:39:34'),(6,'read academic areas','web','2025-05-21 02:39:34','2025-05-21 02:39:34'),(7,'update academic areas','web','2025-05-21 02:39:34','2025-05-21 02:39:34'),(8,'delete academic areas','web','2025-05-21 02:39:34','2025-05-21 02:39:34'),(9,'create brands','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(10,'read brands','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(11,'update brands','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(12,'delete brands','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(13,'create dependencies','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(14,'read dependencies','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(15,'update dependencies','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(16,'delete dependencies','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(17,'create failures','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(18,'read failures','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(19,'update failures','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(20,'delete failures','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(21,'create objects','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(22,'read objects','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(23,'update objects','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(24,'delete objects','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(25,'create persons','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(26,'read persons','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(27,'update persons','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(28,'delete persons','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(29,'create users','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(30,'read users','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(31,'update users','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(32,'delete users','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(33,'create order devices','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(34,'read order devices','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(35,'update order devices','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(36,'delete order devices','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(37,'create orders','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(38,'read orders','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(39,'update orders','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(40,'delete orders','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(41,'create computers','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(42,'read computers','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(43,'update computers','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(44,'delete computers','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(45,'create admin','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(46,'read admin','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(47,'update admin','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(48,'delete admin','web','2025-05-21 02:39:35','2025-05-21 02:39:35'),(49,'create excel','web','2025-05-21 02:39:35','2025-05-21 02:39:35');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(49,1),(5,2),(6,2),(7,2),(8,2),(9,2),(10,2),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2),(17,2),(18,2),(19,2),(20,2),(21,2),(22,2),(23,2),(24,2),(25,2),(26,2),(27,2),(28,2),(33,2),(34,2),(35,2),(36,2),(37,2),(38,2),(39,2),(40,2),(41,2),(42,2),(43,2),(44,2),(1,3),(2,3),(3,3),(4,3),(5,3),(6,3),(7,3),(8,3),(9,3),(10,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(18,3),(19,3),(20,3),(21,3),(22,3),(23,3),(24,3),(25,3),(26,3),(27,3),(28,3),(29,3),(30,3),(31,3),(32,3),(33,3),(34,3),(35,3),(36,3),(37,3),(38,3),(39,3),(40,3),(41,3),(42,3),(43,3),(44,3),(45,3),(46,3),(47,3),(48,3),(49,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2025-05-21 02:39:34','2025-05-21 02:39:34'),(2,'editor','web','2025-05-21 02:39:34','2025-05-21 02:39:34'),(3,'superuser','web','2025-05-21 02:39:34','2025-05-21 02:39:34');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
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
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_community`
--

DROP TABLE IF EXISTS `u_community`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `u_community` (
  `no_cuenta` int NOT NULL,
  `nip` int NOT NULL,
  `nombres` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_paterno` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_materno` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`no_cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_community`
--

LOCK TABLES `u_community` WRITE;
/*!40000 ALTER TABLE `u_community` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_community` ENABLE KEYS */;
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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `user_number` int NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_user_number_unique` (`user_number`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Superusuario Administración CECA','editar@uaeh.edu.mx',NULL,'$2y$12$CKGxKHuOCtdNmWnpBwgct.Y.k7lebC3hbJkO0bQCdPQWj5xD2m6PS',NULL,NULL,NULL,1111,1,NULL,NULL,'2025-05-21 02:39:35','2025-05-21 02:39:35'),(2,'María Guadalupe Badillo Domínguez','badillom@uaeh.edu.mx',NULL,'$2y$12$uw8Ch7.iReq42QQIOhGwTOM.ph8rPB267L71EEFisbPuJfwXVQhSy',NULL,NULL,NULL,5373,1,NULL,NULL,'2025-05-21 02:39:35','2025-05-21 02:39:35'),(3,'Omar González Luna','omargluna@hotmail.com',NULL,'$2y$12$QZdK1BAIg4.8.GlGUoTE7eM9KfAkcWVDesMtw5kzKnfVOJw0legTC',NULL,NULL,NULL,8219,1,NULL,NULL,'2025-05-21 02:39:36','2025-05-21 02:39:36'),(4,'Gabriela Alejandra Cabrera Martínez','gaby__am@hotmail.com',NULL,'$2y$12$n7EmiQrX0s4Cz2CZDY8JrebPf4v1VhjalSc5cC4SnTsL/OXBzFby6',NULL,NULL,NULL,3848,1,NULL,NULL,'2025-05-21 02:39:36','2025-05-21 02:39:36'),(5,'Davy Roberto Garrido Olivera','davy@uaeh.edu.mx',NULL,'$2y$12$m1BrK1/wsJRA9k/fAw.z4umPsKQoqW2OyxvTGKLGqm2KRzVb.eHJS',NULL,NULL,NULL,8021,1,NULL,NULL,'2025-05-21 02:39:37','2025-05-21 02:39:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'mtto_ceca'
--

--
-- Dumping routines for database 'mtto_ceca'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-20 14:40:18
