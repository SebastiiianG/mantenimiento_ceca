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
INSERT INTO `cache` VALUES ('da09e8e17c3278c252c189011215d4c5','i:4;',1737397674),('da09e8e17c3278c252c189011215d4c5:timer','i:1737397674;',1737397674),('e561af1b5b9ab9cb9667f77d281e0701','i:2;',1737396718),('e561af1b5b9ab9cb9667f77d281e0701:timer','i:1737396718;',1737396718);
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
  `cg_academic_area_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `area_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cg_dependency_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cg_academic_area_id`),
  KEY `cg_academic_areas` (`cg_dependency_id`),
  CONSTRAINT `cg_academic_areas` FOREIGN KEY (`cg_dependency_id`) REFERENCES `cg_dependencies` (`cg_dependency_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cg_academic_areas`
--

LOCK TABLES `cg_academic_areas` WRITE;
/*!40000 ALTER TABLE `cg_academic_areas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cg_academic_areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cg_brands`
--

DROP TABLE IF EXISTS `cg_brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cg_brands` (
  `cg_brand_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cg_brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cg_brands`
--

LOCK TABLES `cg_brands` WRITE;
/*!40000 ALTER TABLE `cg_brands` DISABLE KEYS */;
/*!40000 ALTER TABLE `cg_brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cg_dependencies`
--

DROP TABLE IF EXISTS `cg_dependencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cg_dependencies` (
  `cg_dependency_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dependency_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cg_dependency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cg_dependencies`
--

LOCK TABLES `cg_dependencies` WRITE;
/*!40000 ALTER TABLE `cg_dependencies` DISABLE KEYS */;
/*!40000 ALTER TABLE `cg_dependencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cg_kind_failures`
--

DROP TABLE IF EXISTS `cg_kind_failures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cg_kind_failures` (
  `cg_kind_failure_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `failure` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cg_kind_failure_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cg_kind_failures`
--

LOCK TABLES `cg_kind_failures` WRITE;
/*!40000 ALTER TABLE `cg_kind_failures` DISABLE KEYS */;
/*!40000 ALTER TABLE `cg_kind_failures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cg_kind_objects`
--

DROP TABLE IF EXISTS `cg_kind_objects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cg_kind_objects` (
  `cg_kind_object_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `object` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cg_kind_object_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cg_kind_objects`
--

LOCK TABLES `cg_kind_objects` WRITE;
/*!40000 ALTER TABLE `cg_kind_objects` DISABLE KEYS */;
/*!40000 ALTER TABLE `cg_kind_objects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cg_kind_people`
--

DROP TABLE IF EXISTS `cg_kind_people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cg_kind_people` (
  `cg_kind_person_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kind_person` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cg_kind_person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cg_kind_people`
--

LOCK TABLES `cg_kind_people` WRITE;
/*!40000 ALTER TABLE `cg_kind_people` DISABLE KEYS */;
/*!40000 ALTER TABLE `cg_kind_people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `computers`
--

DROP TABLE IF EXISTS `computers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `computers` (
  `computer_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `password` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_device_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`computer_id`),
  KEY `computers_order_device_id_foreign` (`order_device_id`),
  CONSTRAINT `computers_order_device_id_foreign` FOREIGN KEY (`order_device_id`) REFERENCES `order_devices` (`order_device_id`) ON DELETE RESTRICT ON UPDATE CASCADE
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (2,'2025_01_14_191151_create_cg_dependencies_table',2),(3,'2025_01_13_202352_create_cg_academic_areas_table',3),(4,'2025_01_13_202440_create_cg_brands_table',4),(5,'2025_01_13_202514_create_cg_kind_failures_table',5),(6,'2025_01_13_202535_create_cg_kind_objects_table',6),(7,'2025_01_13_202547_create_cg_kind_people_table',7),(8,'2025_01_13_203607_create_u_community_table',8),(10,'0001_01_01_000000_create_users_table',9),(11,'2025_01_13_202655_create_orders_table',10),(12,'2025_01_14_193241_create_order_devices_table',11),(13,'2025_01_13_202611_create_computers_table',12),(14,'0001_01_01_000001_create_cache_table',13),(15,'0001_01_01_000002_create_jobs_table',13),(16,'2025_01_13_200917_add_two_factor_columns_to_users_table',13),(17,'2025_01_13_200929_create_personal_access_tokens_table',13),(18,'2025_01_16_175235_create_permission_tables',14);
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
INSERT INTO `model_has_roles` VALUES (3,'App\\Models\\User',1),(4,'App\\Models\\User',2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_devices`
--

DROP TABLE IF EXISTS `order_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_devices` (
  `order_device_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_observations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnostic` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ceca_observations` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `computer` tinyint(1) DEFAULT '0',
  `serial_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cg_brand_id` bigint unsigned NOT NULL,
  `order_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cg_kind_failure_id` bigint unsigned NOT NULL,
  `cg_kind_object_id` bigint unsigned NOT NULL,
  `ceca_repairs` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_device_id`),
  KEY `order_devices_cg_brand_id_foreign` (`cg_brand_id`),
  KEY `order_devices_order_number_foreign` (`order_number`),
  KEY `order_devices_cg_kind_object_id_foreign` (`cg_kind_object_id`),
  KEY `order_devices_cg_kind_failure_id_foreign` (`cg_kind_failure_id`),
  KEY `order_devices_ceca_repairs_foreign` (`ceca_repairs`),
  CONSTRAINT `order_devices_ceca_repairs_foreign` FOREIGN KEY (`ceca_repairs`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `order_devices_cg_brand_id_foreign` FOREIGN KEY (`cg_brand_id`) REFERENCES `cg_brands` (`cg_brand_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `order_devices_cg_kind_failure_id_foreign` FOREIGN KEY (`cg_kind_failure_id`) REFERENCES `cg_kind_failures` (`cg_kind_failure_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `order_devices_cg_kind_object_id_foreign` FOREIGN KEY (`cg_kind_object_id`) REFERENCES `cg_kind_objects` (`cg_kind_object_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `order_devices_order_number_foreign` FOREIGN KEY (`order_number`) REFERENCES `orders` (`order_number`) ON DELETE RESTRICT ON UPDATE CASCADE
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
  `order_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_generation` datetime NOT NULL,
  `date_reception` datetime DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_deliveries` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_receives` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ext` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_number` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kperson_delivery` bigint unsigned NOT NULL,
  `cg_academic_area_id` bigint unsigned NOT NULL,
  `ceca_receives` bigint unsigned NOT NULL,
  `ceca_deliveries` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_number`),
  KEY `orders_kperson_delivery_foreign` (`kperson_delivery`),
  KEY `orders_cg_academic_area_id_foreign` (`cg_academic_area_id`),
  KEY `orders_ceca_receives_foreign` (`ceca_receives`),
  KEY `orders_ceca_deliveries_foreign` (`ceca_deliveries`),
  CONSTRAINT `orders_ceca_deliveries_foreign` FOREIGN KEY (`ceca_deliveries`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `orders_ceca_receives_foreign` FOREIGN KEY (`ceca_receives`) REFERENCES `users` (`user_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `orders_cg_academic_area_id_foreign` FOREIGN KEY (`cg_academic_area_id`) REFERENCES `cg_academic_areas` (`cg_academic_area_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `orders_kperson_delivery_foreign` FOREIGN KEY (`kperson_delivery`) REFERENCES `cg_kind_people` (`cg_kind_person_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create roles','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(2,'read roles','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(3,'update roles','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(4,'delete roles','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(5,'create academic areas','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(6,'read academic areas','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(7,'update academic areas','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(8,'delete academic areas','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(9,'create brands','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(10,'read brands','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(11,'update brands','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(12,'delete brands','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(13,'create dependencies','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(14,'read dependencies','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(15,'update dependencies','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(16,'delete dependencies','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(17,'create failures','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(18,'read failures','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(19,'update failures','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(20,'delete failures','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(21,'create objects','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(22,'read objects','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(23,'update objects','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(24,'delete objects','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(25,'create persons','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(26,'read persons','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(27,'update persons','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(28,'delete persons','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(29,'create users','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(30,'read users','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(31,'update users','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(32,'delete users','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(33,'create order devices','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(34,'read order devices','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(35,'update order devices','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(36,'delete order devices','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(37,'create orders','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(38,'read orders','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(39,'update orders','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(40,'delete orders','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(41,'create computers','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(42,'read computers','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(43,'update computers','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(44,'delete computers','web','2025-01-17 01:43:32','2025-01-17 01:43:32');
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
INSERT INTO `role_has_permissions` VALUES (1,3),(2,3),(3,3),(4,3),(5,3),(6,3),(7,3),(8,3),(9,3),(10,3),(11,3),(12,3),(13,3),(14,3),(15,3),(16,3),(17,3),(18,3),(19,3),(20,3),(21,3),(22,3),(23,3),(24,3),(25,3),(26,3),(27,3),(28,3),(29,3),(30,3),(31,3),(32,3),(33,3),(34,3),(35,3),(36,3),(37,3),(38,3),(39,3),(40,3),(41,3),(42,3),(43,3),(44,3),(5,4),(6,4),(7,4),(8,4),(9,4),(10,4),(11,4),(12,4),(13,4),(14,4),(15,4),(16,4),(17,4),(18,4),(19,4),(20,4),(21,4),(22,4),(23,4),(24,4),(25,4),(26,4),(27,4),(28,4),(33,4),(34,4),(35,4),(36,4),(37,4),(38,4),(39,4),(40,4),(41,4),(42,4),(43,4),(44,4);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (3,'admin','web','2025-01-17 01:43:32','2025-01-17 01:43:32'),(4,'editor','web','2025-01-17 01:43:32','2025-01-17 01:43:32');
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
INSERT INTO `sessions` VALUES ('CiFYTThW8TsvGI2IUhYyrmxgmPgYKo5Exriv4zHQ',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.2 Safari/605.1.15','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSUphNHFEQ3F5c0laVU5CcXhyb3Z3V1ByMFlqMVJaTVZOODhjM2RuVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtOO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO319',1737397629);
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
  `user_id` bigint unsigned NOT NULL AUTO_INCREMENT,
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
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_user_number_unique` (`user_number`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','fareynoso207@gmail.com',NULL,'$2y$12$R.FeVSRsDXvmLFBk5aaf7OpL.J6r/HeC4xMhjGXQ3Iwt34XXDlK8e',NULL,NULL,NULL,464396,1,NULL,NULL,NULL,'2025-01-17 01:43:32','2025-01-17 01:43:32'),(2,'editor','ulsegaga03@gmail.com',NULL,'$2y$12$Sx27us3GNyxxG5YKxqp0tO/9EJ2TcTJd20PN7ImyS.G0UPmYK4wM2',NULL,NULL,NULL,401420,1,NULL,NULL,NULL,'2025-01-17 01:43:32','2025-01-17 01:43:32');
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

-- Dump completed on 2025-01-20 12:27:55
