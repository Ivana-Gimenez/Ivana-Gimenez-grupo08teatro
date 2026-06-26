/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.7.2-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: teatro_grupo08
-- ------------------------------------------------------
-- Server version	12.2.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
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
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
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
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `taller_id` bigint(20) unsigned DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `evento_id` bigint(20) unsigned DEFAULT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carrito_user_id_foreign` (`user_id`),
  KEY `carrito_evento_id_foreign` (`evento_id`),
  KEY `carrito_taller_id_foreign` (`taller_id`),
  CONSTRAINT `carrito_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carrito_taller_id_foreign` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carrito_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `metodo_pago_id` bigint(20) unsigned DEFAULT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `estado` enum('en_proceso','abonado','cancelado') NOT NULL DEFAULT 'en_proceso',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `compras_user_id_foreign` (`user_id`),
  KEY `compras_metodo_pago_id_foreign` (`metodo_pago_id`),
  CONSTRAINT `compras_metodo_pago_id_foreign` FOREIGN KEY (`metodo_pago_id`) REFERENCES `metodo_pagos` (`id`) ON DELETE SET NULL,
  CONSTRAINT `compras_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES
(3,2,1,15000.00,'en_proceso','2026-06-17 19:21:31','2026-06-17 19:21:31'),
(4,2,1,15500.00,'en_proceso','2026-06-17 19:22:00','2026-06-17 19:22:00'),
(5,2,1,15500.00,'en_proceso','2026-06-17 21:15:16','2026-06-17 21:15:16'),
(6,2,1,15500.00,'en_proceso','2026-06-17 21:20:13','2026-06-17 21:20:13'),
(7,2,1,15500.00,'en_proceso','2026-06-17 21:30:24','2026-06-17 21:30:24'),
(8,2,NULL,0.00,'en_proceso','2026-06-17 21:33:30','2026-06-17 21:33:30'),
(9,2,NULL,0.00,'en_proceso','2026-06-17 21:34:36','2026-06-17 21:34:36'),
(10,2,NULL,0.00,'en_proceso','2026-06-17 21:38:03','2026-06-17 21:38:03'),
(11,2,NULL,0.00,'en_proceso','2026-06-17 21:38:59','2026-06-17 21:38:59'),
(12,2,NULL,0.00,'en_proceso','2026-06-17 21:39:11','2026-06-17 21:39:11'),
(13,2,NULL,0.00,'abonado','2026-06-17 21:41:11','2026-06-17 21:41:11'),
(14,2,NULL,20500.00,'abonado','2026-06-17 22:35:52','2026-06-17 22:35:52'),
(15,2,NULL,6000.00,'abonado','2026-06-17 22:42:51','2026-06-17 22:42:51'),
(16,2,NULL,15000.00,'abonado','2026-06-18 03:51:52','2026-06-18 03:51:52'),
(17,2,NULL,8500.00,'abonado','2026-06-18 03:58:07','2026-06-18 03:58:07'),
(18,2,NULL,8500.00,'abonado','2026-06-18 04:01:01','2026-06-18 04:01:01'),
(19,2,3,6500.00,'abonado','2026-06-18 04:05:30','2026-06-18 04:05:30'),
(20,2,3,8500.00,'abonado','2026-06-18 04:10:34','2026-06-18 04:10:34'),
(21,38,3,0.00,'en_proceso','2026-06-18 23:02:14','2026-06-18 23:02:14'),
(22,38,3,17000.00,'abonado','2026-06-18 23:11:33','2026-06-19 00:09:21'),
(23,38,2,14000.00,'en_proceso','2026-06-18 23:29:47','2026-06-18 23:29:47'),
(24,38,1,24000.00,'en_proceso','2026-06-19 00:43:24','2026-06-19 00:43:24');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `consultas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipo_consulta` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `mensaje` text NOT NULL,
  `leido` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
INSERT INTO `consultas` VALUES
(1,'Juan Pérez','juan@test.com','Eventos','379123456','Quiero saber horarios de funciones',0,'2026-06-19 01:01:16','2026-06-19 01:01:16'),
(2,'María López','maria@test.com','Entradas','379888888','¿Cómo compro entradas online?',0,'2026-06-19 01:01:16','2026-06-19 01:01:16'),
(3,'Carlos Gómez','carlos@test.com','Reclamos',NULL,'No recibí mi comprobante de compra',1,'2026-06-19 01:01:21','2026-06-19 01:01:21'),
(4,'Lucía Fernández','lucia1@test.com','Eventos','379100001','¿Hay funciones este fin de semana?',0,'2026-06-19 01:01:56','2026-06-19 01:01:56'),
(5,'Diego Martínez','diego2@test.com','Entradas','379100002','No puedo comprar entradas, me da error',0,'2026-06-19 01:01:57','2026-06-19 01:01:57'),
(6,'Sofía Ramírez','sofia3@test.com','Talleres','379100003','Quiero inscribirme en el taller de teatro',1,'2026-06-19 01:01:58','2026-06-19 01:01:58'),
(7,'Martín Silva','martin4@test.com','Reclamos','379100004','El sistema me cobró dos veces',0,'2026-06-19 01:01:59','2026-06-19 01:01:59'),
(8,'Valentina Gómez','valen5@test.com','Eventos','379100005','¿A qué hora empieza la función de hoy?',1,'2026-06-19 01:01:59','2026-06-19 01:01:59'),
(9,'Federico Acosta','fede6@test.com','Entradas','379100006','¿Puedo cancelar una compra?',0,'2026-06-19 01:02:00','2026-06-19 01:02:00'),
(10,'Camila Ruiz','cami7@test.com','Talleres','379100007','¿Hay cupos disponibles?',0,'2026-06-19 01:02:00','2026-06-19 01:02:00'),
(11,'Joaquín Torres','joa8@test.com','Reclamos','379100008','No me llega el mail de confirmación',1,'2026-06-19 01:02:01','2026-06-19 01:02:01'),
(12,'Agustina Díaz','agus9@test.com','Eventos','379100009','¿Hay descuentos para estudiantes?',0,'2026-06-19 01:02:01','2026-06-19 01:02:01'),
(13,'Tomás Benítez','tomas10@test.com','Entradas','379100010','¿Dónde veo mis compras?',1,'2026-06-19 01:02:03','2026-06-19 01:02:03');
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_compras`
--

DROP TABLE IF EXISTS `detalle_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_compras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `compra_id` bigint(20) unsigned NOT NULL,
  `taller_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `evento_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_compras_compra_id_foreign` (`compra_id`),
  KEY `detalle_compras_taller_id_foreign` (`taller_id`),
  CONSTRAINT `detalle_compras_compra_id_foreign` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_compras_taller_id_foreign` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_compras`
--

LOCK TABLES `detalle_compras` WRITE;
/*!40000 ALTER TABLE `detalle_compras` DISABLE KEYS */;
INSERT INTO `detalle_compras` VALUES
(1,3,5,1,7000.00,7000.00,'2026-06-17 19:21:31','2026-06-17 19:21:31',NULL),
(2,3,2,1,6000.00,6000.00,'2026-06-17 19:21:31','2026-06-17 19:21:31',NULL),
(3,4,3,1,6500.00,6500.00,'2026-06-17 19:22:00','2026-06-17 19:22:00',NULL),
(4,4,5,1,7000.00,7000.00,'2026-06-17 19:22:00','2026-06-17 19:22:00',NULL),
(5,5,3,1,6500.00,6500.00,'2026-06-17 21:15:16','2026-06-17 21:15:16',NULL),
(6,5,5,1,7000.00,7000.00,'2026-06-17 21:15:16','2026-06-17 21:15:16',NULL),
(7,6,3,1,6500.00,6500.00,'2026-06-17 21:20:13','2026-06-17 21:20:13',NULL),
(8,6,5,1,7000.00,7000.00,'2026-06-17 21:20:13','2026-06-17 21:20:13',NULL),
(9,7,3,1,6500.00,6500.00,'2026-06-17 21:30:24','2026-06-17 21:30:24',NULL),
(10,7,5,1,7000.00,7000.00,'2026-06-17 21:30:24','2026-06-17 21:30:24',NULL),
(11,13,5,3,7000.00,21000.00,'2026-06-17 21:41:11','2026-06-17 21:41:11',NULL),
(12,13,3,1,6500.00,6500.00,'2026-06-17 21:41:11','2026-06-17 21:41:11',NULL),
(13,14,5,2,7000.00,14000.00,'2026-06-17 22:35:52','2026-06-17 22:35:52',NULL),
(14,14,3,1,6500.00,6500.00,'2026-06-17 22:35:52','2026-06-17 22:35:52',NULL),
(15,15,7,1,6000.00,6000.00,'2026-06-17 22:42:51','2026-06-17 22:42:51',NULL),
(16,16,3,1,6500.00,6500.00,'2026-06-18 03:51:52','2026-06-18 03:51:52',NULL),
(17,16,67,1,8500.00,8500.00,'2026-06-18 03:51:52','2026-06-18 03:51:52',NULL),
(18,17,67,1,8500.00,8500.00,'2026-06-18 03:58:07','2026-06-18 03:58:07',NULL),
(19,18,67,1,8500.00,8500.00,'2026-06-18 04:01:01','2026-06-18 04:01:01',NULL),
(20,19,3,1,6500.00,6500.00,'2026-06-18 04:05:30','2026-06-18 04:05:30',NULL),
(21,20,67,1,8500.00,8500.00,'2026-06-18 04:10:34','2026-06-18 04:10:34',NULL),
(22,22,67,2,8500.00,17000.00,'2026-06-18 23:11:33','2026-06-18 23:11:33',NULL),
(23,23,52,2,7000.00,14000.00,'2026-06-18 23:29:47','2026-06-18 23:29:47',NULL),
(24,24,64,3,8000.00,24000.00,'2026-06-19 00:43:24','2026-06-19 00:43:24',NULL);
/*!40000 ALTER TABLE `detalle_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entradas`
--

DROP TABLE IF EXISTS `entradas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `entradas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `compra_id` bigint(20) unsigned NOT NULL,
  `evento_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entradas_compra_id_foreign` (`compra_id`),
  KEY `entradas_evento_id_foreign` (`evento_id`),
  CONSTRAINT `entradas_compra_id_foreign` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON DELETE CASCADE,
  CONSTRAINT `entradas_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entradas`
--

LOCK TABLES `entradas` WRITE;
/*!40000 ALTER TABLE `entradas` DISABLE KEYS */;
/*!40000 ALTER TABLE `entradas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `eventos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock_total` int(11) NOT NULL,
  `stock_disponible` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES
(1,'Romeo y Julieta','Clásico de Shakespeare en versión moderna','2026-06-20','20:30:00',5000.00,100,100,'1781566715.jpg',1,'2026-06-15 23:38:35','2026-06-15 23:38:35',NULL),
(2,'El Fantasma de la Ópera','Musical internacional en vivo','2026-06-27','21:00:00',8000.00,80,80,'1781566864.jpg',1,'2026-06-15 23:41:04','2026-06-15 23:41:04',NULL),
(3,'Ballet Clásico','Noche de danza con orquesta en vivo','2026-07-05','21:30:00',6500.00,100,100,'1781567035.jpg',1,'2026-06-15 23:43:55','2026-06-15 23:43:55',NULL),
(4,'Lago de los Cisnes','Ballet clásico de Tchaikovsky, una historia de amor, magia y tragedia interpretada por una compañía de danza internacional.','2026-07-15','20:30:00',9300.00,50,50,'1781567188.jpg',1,'2026-06-15 23:46:28','2026-06-15 23:46:28',NULL),
(5,'Romeo y Julieta','Clásico de Shakespeare en versión moderna','2026-06-20','20:00:00',5000.00,100,100,'1781716793.jpg',1,'2026-06-16 00:18:22','2026-06-17 17:19:53',NULL),
(6,'Ballet Clásico','Noche de danza con orquesta en vivo','2026-07-01','19:30:00',6000.00,100,100,'1781717027.jpg',1,'2026-06-16 00:19:11','2026-06-17 17:23:47',NULL),
(7,'Stand Up Comedy Night','Show de humor con comediantes locales','2026-07-05','21:00:00',3000.00,150,150,'1781717106.jpg',1,'2026-06-16 00:19:20','2026-06-17 17:25:06',NULL),
(8,'Concierto Sinfónico','Orquesta sinfónica en vivo','2026-07-10','20:00:00',8000.00,200,200,'1781717084.jpg',1,'2026-06-16 00:19:28','2026-06-17 17:24:44',NULL),
(9,'Tango Show','Espectáculo de tango argentino','2026-07-15','21:30:00',4500.00,120,120,'1781717061.jpg',1,'2026-06-16 00:19:37','2026-06-17 17:24:21',NULL),
(10,'El Lago de los Cisnes','Ballet clásico de Tchaikovsky','2026-08-01','20:30:00',7500.00,100,100,'1781717005.jpg',1,'2026-06-16 00:19:44','2026-06-17 17:23:25',NULL),
(11,'Noche de Ópera Italiana','Arias clásicas en vivo','2026-08-05','20:00:00',8200.00,90,90,'1781716921.jpg',1,'2026-06-16 00:19:55','2026-06-17 17:22:01',NULL),
(12,'Danza Contemporánea','Show moderno de danza artística','2026-08-10','19:00:00',5500.00,110,110,'1781716904.jpg',1,'2026-06-16 00:20:21','2026-06-17 17:21:44',NULL),
(13,'Magia en el Teatro','Ilusionismo en vivo','2026-08-15','20:00:00',4000.00,130,130,'1781716852.jpg',1,'2026-06-16 00:21:20','2026-06-17 17:20:52',NULL),
(14,'Rock Sinfónico','Fusión de rock y orquesta en vivo','2026-08-20','21:00:00',9000.00,200,200,'1781716810.jpg',1,'2026-06-16 00:23:08','2026-06-17 17:20:10',NULL),
(15,'Comedia Teatral','Obra humorística para toda la familia','2026-08-25','19:30:00',3500.00,1,1,'1781716492.jpg',1,'2026-06-16 00:23:15','2026-06-17 23:21:25',NULL),
(16,'Noche de Flamenco','Danza y música española en vivo','2026-09-01','20:30:00',4800.00,120,120,'1781716516.jpg',1,'2026-06-16 00:23:23','2026-06-17 17:15:16',NULL),
(17,'Teatro Experimental','Obra contemporánea de autor','2026-09-05','21:00:00',4200.00,100,100,'1781716533.jpg',1,'2026-06-16 00:23:31','2026-06-17 17:15:33',NULL),
(18,'Gran Gala del Teatro','Cierre de temporada con múltiples artistas','2026-09-10','20:00:00',10000.00,250,250,'1781716547.jpg',1,'2026-06-16 00:23:39','2026-06-17 17:15:48',NULL),
(19,'Festival de Artes Escénicas','Evento especial con teatro, danza y música en vivo','2026-09-15','19:00:00',8500.00,180,180,'1781716465.jpg',1,'2026-06-16 00:23:48','2026-06-17 17:14:25',NULL),
(20,'Ópera de Verdi','Gran presentación de ópera clásica italiana','2026-09-20','20:00:00',9200.00,160,160,'1781716441.jpg',0,'2026-06-16 00:24:48','2026-06-17 23:30:34',NULL),
(21,'Festival de Jazz Nocturno','Noche de jazz con artistas internacionales','2026-09-25','22:00:00',7800.00,140,140,'1781651060.jpg',1,'2026-06-16 00:24:55','2026-06-16 23:04:20',NULL),
(22,'Teatro Infantil','Obra teatral para toda la familia y niños','2026-10-01','18:00:00',2800.00,200,200,'1781651010.jpg',1,'2026-06-16 00:25:02','2026-06-16 23:03:30',NULL),
(23,'Ballet Moderno','Fusión de danza clásica y contemporánea','2026-10-05','20:30:00',6700.00,110,110,'1781650983.jpg',1,'2026-06-16 00:25:10','2026-06-16 23:03:03',NULL),
(24,'Gala Final de Teatro','Gran cierre anual con múltiples obras en escena','2026-10-10','21:00:00',11000.00,300,300,'1781650956.jpg',1,'2026-06-16 00:25:22','2026-06-17 23:21:43','2026-06-17 23:21:43');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `inscripciones`
--

DROP TABLE IF EXISTS `inscripciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `inscripciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `taller_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inscripciones_user_id_taller_id_unique` (`user_id`,`taller_id`),
  KEY `inscripciones_taller_id_foreign` (`taller_id`),
  CONSTRAINT `inscripciones_taller_id_foreign` FOREIGN KEY (`taller_id`) REFERENCES `talleres` (`id`) ON DELETE CASCADE,
  CONSTRAINT `inscripciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inscripciones`
--

LOCK TABLES `inscripciones` WRITE;
/*!40000 ALTER TABLE `inscripciones` DISABLE KEYS */;
INSERT INTO `inscripciones` VALUES
(1,2,5,'2026-06-17 19:21:31','2026-06-17 19:21:31'),
(2,2,2,'2026-06-17 19:21:31','2026-06-17 19:21:31'),
(3,2,3,'2026-06-17 19:22:00','2026-06-17 19:22:00');
/*!40000 ALTER TABLE `inscripciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
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
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
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
-- Table structure for table `metodo_pagos`
--

DROP TABLE IF EXISTS `metodo_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `metodo_pagos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metodo_pagos`
--

LOCK TABLES `metodo_pagos` WRITE;
/*!40000 ALTER TABLE `metodo_pagos` DISABLE KEYS */;
INSERT INTO `metodo_pagos` VALUES
(1,'Efectivo',1,'2026-06-17 19:04:16','2026-06-17 19:04:16'),
(2,'Tarjeta de Débito',1,'2026-06-17 19:04:16','2026-06-17 19:04:16'),
(3,'Tarjeta de Crédito',1,'2026-06-17 19:04:17','2026-06-17 19:04:17');
/*!40000 ALTER TABLE `metodo_pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'0001_01_01_000001_create_cache_table',1),
(2,'0001_01_01_000002_create_jobs_table',1),
(3,'2026_05_05_041436_create_roles_table',1),
(4,'2026_05_10_132359_create_users_table',1),
(5,'2026_05_15_185814_create_eventos_table',1),
(6,'2026_05_19_181927_create_sessions_table',1),
(7,'2026_05_20_create_metodo_pagos_table',1),
(8,'2026_05_23_031700_create_compras_table',1),
(9,'2026_05_23_031710_create_entradas_table',1),
(10,'2026_05_23_184912_create_consultas_table',1),
(11,'2026_06_14_215651_create_detalle_compras_table',1),
(12,'2026_06_20_000000_create_carrito_table',1),
(14,'2026_06_16_174255_create_talleres_table',2),
(15,'2026_06_16_191936_create_inscripciones_table',3),
(16,'2026_06_16_214127_add_taller_id_to_carrito_table',4),
(17,'2026_06_16_214949_fix_carrito_evento_nullable',5),
(18,'2026_06_17_160818_modificar_detalle_compras_para_talleres',6),
(19,'2026_06_18_200651_add_evento_id_to_detalle_compras_table',7),
(20,'2026_06_18_215818_add_tipo_consulta_to_consultas_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES
(1,'admin',NULL,'2026-06-15 21:10:06','2026-06-15 21:10:06',NULL),
(2,'cliente',NULL,'2026-06-15 21:10:06','2026-06-15 21:10:06',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
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
INSERT INTO `sessions` VALUES
('2PW4FjCoz9L0IZiDGhBCTcDcNA4BLbEqOXNb5OjH',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36 Edg/149.0.0.0','eyJfdG9rZW4iOiJFRHpXd2xtUzQ5Z0Y0eWVOaGllNFpjdWpCem9XcGVoQnFrOU5zUlZLIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dydXBvMDh0ZWF0cm8ubGFyYXZlbC50ZXN0Iiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1782326408),
('4SunovgKlWooAiiP9YHOoZnWwi0ID8cBSzr4litI',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJYckJrVmZucDZGc2RqNU1OMU0xMVdLOXBIS3hhbzVaSkVHMkZ4NE1yIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvZ3J1cG8wOHRlYXRyby5sYXJhdmVsLnRlc3RcL2NhcnJpdG8iLCJyb3V0ZSI6ImNhcnJpdG8udmVyIn0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyfQ==',1782329771),
('4VGKy4cjB4RpC97pCnd4pypkEnZKFuGged0RZZkW',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36','eyJfdG9rZW4iOiJ4V3RCcDlEQ1VNWFJudXBJc3hHRzdTdzhCTm13b3lWSFR6N1FReDF3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dydXBvMDh0ZWF0cm8ubGFyYXZlbC50ZXN0XC8/aGVyZD1wcmV2aWV3Iiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1782326399);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `talleres`
--

DROP TABLE IF EXISTS `talleres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `talleres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `dias_horarios` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cupos_totales` int(11) NOT NULL,
  `cupos_disponibles` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talleres`
--

LOCK TABLES `talleres` WRITE;
/*!40000 ALTER TABLE `talleres` DISABLE KEYS */;
INSERT INTO `talleres` VALUES
(1,'Taller de Teatro Inicial','Taller artístico de formación y práctica.','A definir',5000.00,10,10,NULL,1,'2026-06-16 23:55:51','2026-06-16 23:55:51',NULL),
(2,'Danza Contemporánea','Taller artístico de formación y práctica.','A definir',6000.00,10,9,'1781739411.jfif',1,'2026-06-16 23:55:51','2026-06-17 23:36:51',NULL),
(3,'Ballet Clásico','Taller artístico de formación y práctica.','A definir',6500.00,10,4,'1781718459.jfif',1,'2026-06-16 23:55:51','2026-06-17 22:35:52',NULL),
(4,'Expresión Corporal','Taller artístico de formación y práctica.','A definir',4500.00,10,10,'1781717212.jpg',1,'2026-06-16 23:55:51','2026-06-17 17:26:52',NULL),
(5,'Actuación Escénica','Taller artístico de formación y práctica.','A definir',7000.00,10,0,'1781716250.jpg',1,'2026-06-16 23:55:51','2026-06-17 22:35:52',NULL),
(6,'Improvisación Teatral','Taller artístico de formación y práctica.','A definir',5500.00,10,10,NULL,1,'2026-06-16 23:55:51','2026-06-16 23:55:51',NULL),
(7,'Canto y Técnica Vocal','Taller artístico de formación y práctica.','A definir',6000.00,10,9,'1781739372.jfif',1,'2026-06-16 23:55:51','2026-06-17 23:36:12',NULL),
(8,'Producción Audiovisual','Taller artístico de formación y práctica.','A definir',8000.00,10,10,NULL,1,'2026-06-16 23:55:51','2026-06-16 23:55:51',NULL),
(9,'Teatro Infantil','Taller artístico de formación y práctica.','A definir',4000.00,10,10,NULL,1,'2026-06-16 23:55:51','2026-06-16 23:55:51',NULL),
(10,'Laboratorio Creativo','Taller artístico de formación y práctica.','A definir',5000.00,10,10,NULL,1,'2026-06-16 23:55:51','2026-06-16 23:55:51',NULL),
(11,'Danza Urbana','Taller artístico de formación y práctica.','A definir',5500.00,10,10,'1781739463.jfif',1,'2026-06-16 23:55:51','2026-06-17 23:37:43',NULL),
(12,'Yoga Expresivo','Taller artístico de formación y práctica.','A definir',4500.00,10,10,NULL,1,'2026-06-16 23:55:51','2026-06-16 23:55:51',NULL),
(13,'Teatro Experimental','Taller artístico de formación y práctica.','A definir',7000.00,10,10,NULL,1,'2026-06-16 23:55:51','2026-06-16 23:55:51',NULL),
(14,'Narración Oral','Taller artístico de formación y práctica.','A definir',3500.00,10,10,NULL,1,'2026-06-16 23:55:51','2026-06-16 23:55:51',NULL),
(15,'Dirección Teatral','Taller artístico de formación y práctica.','A definir',9000.00,10,10,'1781739447.jfif',1,'2026-06-16 23:55:51','2026-06-17 23:37:27',NULL),
(16,'Escenografía y Arte','Taller artístico de formación y práctica.','A definir',7500.00,10,10,'1781739428.jpg',1,'2026-06-16 23:55:51','2026-06-17 23:37:08',NULL),
(17,'Guión y Dramaturgia','Taller artístico de formación y práctica.','A definir',6500.00,10,10,'1781785172.jpg',1,'2026-06-16 23:55:51','2026-06-18 12:19:32',NULL),
(18,'Clown y Humor','Taller artístico de formación y práctica.','A definir',5000.00,10,10,'1781739386.jfif',1,'2026-06-16 23:55:51','2026-06-17 23:36:26',NULL),
(19,'Entrenamiento Actoral','Taller artístico de formación y práctica.','A definir',6800.00,10,10,'1781720269.jpg',1,'2026-06-16 23:55:51','2026-06-17 18:17:49',NULL),
(20,'Teatro Musical','Taller artístico de formación y práctica.','A definir',8500.00,10,10,NULL,1,'2026-06-16 23:55:51','2026-06-16 23:55:51',NULL),
(21,'Taller 1','Descripción del Taller 1','Lunes y Miércoles 18:00',2272.00,20,20,NULL,1,'2026-06-17 23:41:13','2026-06-17 23:41:13',NULL),
(22,'Taller 2','Descripción del Taller 2','Lunes y Miércoles 18:00',3696.00,20,20,NULL,1,'2026-06-17 23:41:13','2026-06-17 23:41:13',NULL),
(23,'Taller 3','Descripción del Taller 3','Lunes y Miércoles 18:00',3097.00,20,20,NULL,1,'2026-06-17 23:41:13','2026-06-17 23:41:13',NULL),
(24,'Taller 4','Descripción del Taller 4','Lunes y Miércoles 18:00',1496.00,20,20,NULL,1,'2026-06-17 23:41:13','2026-06-17 23:41:13',NULL),
(25,'Taller 5','Descripción del Taller 5','Lunes y Miércoles 18:00',4950.00,20,20,NULL,1,'2026-06-17 23:41:13','2026-06-17 23:41:13',NULL),
(26,'Taller 6','Descripción del Taller 6','Lunes y Miércoles 18:00',3101.00,20,20,NULL,1,'2026-06-17 23:41:13','2026-06-17 23:41:13',NULL),
(27,'Taller 7','Descripción del Taller 7','Lunes y Miércoles 18:00',3034.00,20,20,NULL,1,'2026-06-17 23:41:13','2026-06-17 23:41:13',NULL),
(28,'Taller 8','Descripción del Taller 8','Lunes y Miércoles 18:00',4700.00,20,20,NULL,1,'2026-06-17 23:41:13','2026-06-17 23:41:13',NULL),
(29,'Taller 9','Descripción del Taller 9','Lunes y Miércoles 18:00',3535.00,20,20,NULL,1,'2026-06-17 23:41:13','2026-06-17 23:41:13',NULL),
(30,'Taller 10','Descripción del Taller 10','Lunes y Miércoles 18:00',1727.00,20,20,NULL,1,'2026-06-17 23:41:13','2026-06-17 23:41:13',NULL),
(31,'Taller 1','Descripción del Taller 1','Lunes y Miércoles 18:00',3439.00,20,20,NULL,1,'2026-06-17 23:43:18','2026-06-17 23:43:18',NULL),
(32,'Taller 2','Descripción del Taller 2','Lunes y Miércoles 18:00',4933.00,20,20,NULL,1,'2026-06-17 23:43:18','2026-06-17 23:43:18',NULL),
(33,'Taller 3','Descripción del Taller 3','Lunes y Miércoles 18:00',4932.00,20,20,NULL,1,'2026-06-17 23:43:18','2026-06-17 23:43:18',NULL),
(34,'Taller 4','Descripción del Taller 4','Lunes y Miércoles 18:00',2185.00,20,20,NULL,1,'2026-06-17 23:43:18','2026-06-17 23:43:18',NULL),
(35,'Taller 5','Descripción del Taller 5','Lunes y Miércoles 18:00',3949.00,20,20,NULL,1,'2026-06-17 23:43:18','2026-06-17 23:43:18',NULL),
(36,'Taller 6','Descripción del Taller 6','Lunes y Miércoles 18:00',2441.00,20,20,NULL,1,'2026-06-17 23:43:18','2026-06-17 23:43:18',NULL),
(37,'Taller 7','Descripción del Taller 7','Lunes y Miércoles 18:00',1226.00,20,20,NULL,1,'2026-06-17 23:43:18','2026-06-17 23:43:18',NULL),
(38,'Taller 8','Descripción del Taller 8','Lunes y Miércoles 18:00',4665.00,20,20,NULL,1,'2026-06-17 23:43:18','2026-06-17 23:43:18',NULL),
(39,'Taller 9','Descripción del Taller 9','Lunes y Miércoles 18:00',4514.00,20,20,NULL,1,'2026-06-17 23:43:18','2026-06-17 23:43:18',NULL),
(40,'Taller 10','Descripción del Taller 10','Lunes y Miércoles 18:00',3675.00,20,20,NULL,1,'2026-06-17 23:43:18','2026-06-17 23:43:18',NULL),
(41,'Taller 1','Descripción del Taller 1','Lunes y Miércoles 18:00',4418.00,20,20,NULL,1,'2026-06-17 23:45:16','2026-06-17 23:45:16',NULL),
(42,'Taller 2','Descripción del Taller 2','Martes y Jueves 18:00',4281.00,20,20,NULL,1,'2026-06-17 23:45:27','2026-06-17 23:45:27',NULL),
(43,'Taller 3','Descripción del Taller 3','Viernes 18:00',2401.00,20,20,NULL,1,'2026-06-17 23:45:35','2026-06-17 23:45:35',NULL),
(44,'Taller 4','Descripción del Taller 4','Sábados 10:00',4654.00,20,20,NULL,1,'2026-06-17 23:45:44','2026-06-17 23:45:44',NULL),
(45,'Taller 5','Descripción del Taller 5','Domingos 16:00',2280.00,20,20,NULL,1,'2026-06-17 23:45:52','2026-06-17 23:45:52',NULL),
(46,'Taller 6','Descripción del Taller 6','Lunes 20:00',2160.00,20,20,NULL,1,'2026-06-17 23:46:43','2026-06-17 23:46:43',NULL),
(47,'Taller 7','Descripción del Taller 7','Martes 20:00',2777.00,20,20,NULL,1,'2026-06-17 23:46:51','2026-06-17 23:46:51',NULL),
(48,'Taller 8','Descripción del Taller 8','Miércoles 20:00',3101.00,20,20,NULL,1,'2026-06-17 23:47:01','2026-06-17 23:47:01',NULL),
(49,'Taller 9','Descripción del Taller 9','Jueves 20:00',1903.00,20,20,NULL,1,'2026-06-17 23:47:09','2026-06-17 23:47:09',NULL),
(50,'Taller 10','Descripción del Taller 10','Viernes 20:00',3044.00,20,20,NULL,1,'2026-06-17 23:47:17','2026-06-17 23:47:17',NULL),
(51,'Ballet Clásico Inicial','Introducción al ballet clásico para principiantes','Lunes y Miércoles 18:00',6500.00,20,20,'1781783676.jfif',1,'2026-06-18 03:42:25','2026-06-19 01:06:10','2026-06-19 01:06:10'),
(52,'Ballet Intermedio','Técnicas intermedias de ballet','Martes y Jueves 18:00',7000.00,18,16,'1781783694.jfif',1,'2026-06-18 03:42:26','2026-06-18 23:29:47',NULL),
(53,'Teatro Inicial','Actuación básica y expresión corporal','Lunes 19:00',5000.00,25,25,'teatro1.jpg',1,'2026-06-18 03:42:27','2026-06-18 03:42:27',NULL),
(54,'Teatro Avanzado','Interpretación y construcción de personajes','Miércoles 20:00',7500.00,15,15,'teatro2.jpg',1,'2026-06-18 03:42:27','2026-06-18 03:42:27',NULL),
(55,'Improvisación Teatral','Ejercicios de improvisación escénica','Viernes 19:00',5500.00,20,20,'1781785239.jpg',1,'2026-06-18 03:42:30','2026-06-18 12:20:39',NULL),
(56,'Danza Contemporánea','Expresión corporal moderna y fluida','Martes y Jueves 19:00',6800.00,18,18,'1781784715.jfif',1,'2026-06-18 03:43:20','2026-06-18 12:11:55',NULL),
(57,'Expresión Corporal','Movimiento y conciencia corporal','Sábados 10:00',4500.00,25,25,'1781785102.jpg',1,'2026-06-18 03:43:21','2026-06-18 12:18:22',NULL),
(58,'Canto Inicial','Técnicas básicas de canto','Lunes 17:00',6000.00,20,20,'1781784122.jfif',1,'2026-06-18 03:43:21','2026-06-18 12:02:02',NULL),
(59,'Canto Avanzado','Control vocal y proyección','Miércoles 17:00',7500.00,15,15,'1781784111.jfif',1,'2026-06-18 03:43:22','2026-06-18 12:01:51',NULL),
(60,'Guitarra Inicial','Aprendizaje básico de guitarra','Martes 18:00',5000.00,25,25,'1781785224.jfif',1,'2026-06-18 03:43:23','2026-06-18 12:20:24',NULL),
(61,'Guitarra Avanzada','Técnicas de ejecución avanzada','Jueves 18:00',7000.00,18,18,'1781785191.jpg',1,'2026-06-18 03:43:23','2026-06-18 12:19:51',NULL),
(62,'Piano Inicial','Introducción al piano','Lunes 16:00',6500.00,20,20,'1781785156.jfif',1,'2026-06-18 03:43:24','2026-06-18 12:19:16',NULL),
(63,'Piano Intermedio','Lectura de partituras y técnica','Miércoles 16:00',7200.00,18,18,'1781785126.jfif',1,'2026-06-18 03:43:24','2026-06-18 12:18:46',NULL),
(64,'Arte Escénico','Integración de actuación y movimiento','Viernes 20:00',8000.00,15,12,'1781783663.jfif',1,'2026-06-18 03:43:25','2026-06-19 00:43:24',NULL),
(65,'Danza Folklórica','Danzas tradicionales argentinas','Sábados 18:00',5000.00,25,25,'1781784734.jfif',1,'2026-06-18 03:43:25','2026-06-18 12:12:14',NULL),
(66,'Danza Jazz','Estilo jazz y coreografías','Martes 20:00',7000.00,18,18,'1781785073.jpg',1,'2026-06-18 03:43:26','2026-06-18 12:17:53',NULL),
(67,'Actuación frente a cámara','Técnicas para cine y TV','Jueves 20:00',8500.00,15,13,'1781783644.jfif',1,'2026-06-18 03:43:27','2026-06-19 01:07:55','2026-06-19 01:07:55'),
(68,'Lectura Dramática','Interpretación de textos teatrales','Viernes 18:00',4500.00,25,25,'1781785260.jfif',1,'2026-06-18 03:43:27','2026-06-18 12:21:00',NULL),
(69,'Técnica Vocal','Entrenamiento de voz profesional','Miércoles 18:30',6000.00,20,20,'vocal.jpg',1,'2026-06-18 03:43:28','2026-06-18 03:43:28',NULL),
(70,'Producción Escénica','Organización y producción teatral','Sábado 12:00',9000.00,10,10,'produccion.jpg',1,'2026-06-18 03:43:31','2026-06-18 03:43:31',NULL);
/*!40000 ALTER TABLE `talleres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol_id` bigint(20) unsigned NOT NULL DEFAULT 2,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_rol_id_foreign` (`rol_id`),
  CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Ivana','Gimenez','iva.gimenez91@gmail.com','$2y$12$m/X8HeQZ/hVrVccaT9wYnenovEKroCs92uIBV7sZcBCu8L/HhuQia',1,NULL,'2026-06-15 21:11:23','2026-06-15 21:11:23',NULL),
(2,'Rodrigo Sebastián','Cantero','rodricantero@gmail.com','$2y$12$l94dYrz5pa4VsUfiAmma/e2PMWHX5sIFnGLUkeBR4N3/ENPBnJ0wu',2,NULL,'2026-06-15 21:12:32','2026-06-17 10:48:48',NULL),
(3,'Juan','Pérez','juan.perez1@mail.com','$2y$12$rwRkUsmsacw5SoL7aAb5ceOm.nScDzkcHIIYeB5Cu1PWPNICldXfm',2,NULL,'2026-06-15 21:14:15','2026-06-15 21:14:15',NULL),
(4,'María','Gómez','maria.gomez2@mail.com','$2y$12$0Kx6X2yZXI7Yt0aAohTL..WR9A4iZ6xWc/QLF/8f9TKRbqVW6RCee',2,NULL,'2026-06-15 21:14:17','2026-06-15 21:14:17',NULL),
(5,'Carlos','Rodríguez','carlos.rodriguez3@mail.com','$2y$12$VWRpatZsDzqSydHjuCe3I..HcVzpduJxludP87TWO1aWZEhDmxUYq',2,NULL,'2026-06-15 21:14:18','2026-06-15 21:14:18',NULL),
(6,'Lucía','Fernández','lucia.fernandez4@mail.com','$2y$12$KCKrixeCGFZh1LV7tEuKW.mYQeQ4K1XqfOfVUUMMP53nz0InXXZja',2,NULL,'2026-06-15 21:14:19','2026-06-15 21:14:19',NULL),
(7,'Martín','López','martin.lopez5@mail.com','$2y$12$wg2J9wJrKz1kDTuYHOcME.6Y3O.YhPx5rbia3pArv8Bgkzy22.UJi',2,NULL,'2026-06-15 21:14:20','2026-06-15 21:14:20',NULL),
(8,'Sofía','Martínez','sofia.martinez6@mail.com','$2y$12$QvvhL5PGZeiLHI9xon9Cye8Pbnk58Wcy7sQikkrZAmsY7OtURTRQ6',2,NULL,'2026-06-15 21:14:21','2026-06-15 21:14:21',NULL),
(9,'Diego','Sánchez','diego.sanchez7@mail.com','$2y$12$1xTRcSSi5RXFBSdZHB2ui.PHp3BqY8x4fjwU2i9J/LsCdkUWDr0yy',2,NULL,'2026-06-15 21:14:22','2026-06-15 21:14:22',NULL),
(10,'Valentina','Romero','valentina.romero8@mail.com','$2y$12$.OiomC5lJbYXkotqTVBDCuAE1GhjWhLQR7GwUgnHrozYmboqLJipe',2,NULL,'2026-06-15 21:14:23','2026-06-15 21:14:23',NULL),
(11,'Javier','Torres','javier.torres9@mail.com','$2y$12$L5qTGWaOh8CAR5DTV45Dte1gkPcNproQDb0jPtMx2TziWpEFqeIq.',2,NULL,'2026-06-15 21:14:24','2026-06-15 21:14:24',NULL),
(12,'Camila','Vargas','camila.vargas10@mail.com','$2y$12$wXXZW2AjvNoRpr9iUW8IfOp3Ran32UDyIjfsF8JrKU4yRNjHSUq/a',2,NULL,'2026-06-15 21:14:25','2026-06-15 21:14:25',NULL),
(13,'Tomás','Herrera','tomas.herrera11@mail.com','$2y$12$qwXbB6xSX3XENnh3jYhmNeo8g3aEk5SJIypHx9DR4KL.J3sK7l.cK',2,NULL,'2026-06-15 21:14:26','2026-06-15 21:14:26',NULL),
(14,'Florencia','Rojas','florencia.rojas12@mail.com','$2y$12$tk3IgStiL4w7qC4mYZ8fHuw0H6m1at2uQ0ZbqIjIBW.kuJVEeaLmO',2,NULL,'2026-06-15 21:14:27','2026-06-15 21:14:27',NULL),
(15,'Nicolás','Castro','nicolas.castro13@mail.com','$2y$12$KQ1a3gL3qrwm9w6g5nHDfei4PGMcYZESYsuSexfIoR3vPUz0wUmkO',2,NULL,'2026-06-15 21:14:31','2026-06-15 21:14:31',NULL),
(16,'Agustina','Silva','agustina.silva14@mail.com','$2y$12$7cR58uFWBQGzF4HM9ptxqeEoC7rx0O54WPuZhi./jxx./0xhxdmmy',2,NULL,'2026-06-15 21:14:33','2026-06-15 21:14:33',NULL),
(17,'Mateo','Molina','mateo.molina15@mail.com','$2y$12$spLz3W6SGfD/UMZv.UU2n.HP6YFrntoIZjPH6H.TODvhpqE3sOy4q',2,NULL,'2026-06-15 21:14:34','2026-06-15 21:14:34',NULL),
(18,'Julieta','Acosta','julieta.acosta16@mail.com','$2y$12$bwnduxwyjmB1eufoCWmOZOa9qaMw/c3UMo2jYJVqZWxXPb3mzSAE.',2,NULL,'2026-06-15 21:14:35','2026-06-15 21:14:35',NULL),
(19,'Fernando','Méndez','fernando.mendez17@mail.com','$2y$12$MoKUzUJgBt84kHSHBS49se8aC19stNTrIB6TyL0NT1I5EMgFfEN1W',2,NULL,'2026-06-15 21:14:36','2026-06-15 21:14:36',NULL),
(20,'Paula','Cabrera','paula.cabrera18@mail.com','$2y$12$Vo7hBOi/XKzdn643YDhykO.wNjAJSFFmFv.pRAct9NPz1xyOqog1u',2,NULL,'2026-06-15 21:14:39','2026-06-15 21:14:39',NULL),
(21,'Emiliano','Suárez','emiliano.suarez19@mail.com','$2y$12$Lj5twp/5QsaQ9huTseWR3ef05kR3cRcw5XCJ2MBNp5CIgC9FAmZo.',2,NULL,'2026-06-15 21:14:40','2026-06-15 21:14:40',NULL),
(22,'Romina','Ortega','romina.ortega20@mail.com','$2y$12$FXCbTVFlR5dw4P9j.CeXR.gBijkr17QJyiKBC/WNcWiuPrUaDRSTa',2,NULL,'2026-06-15 21:14:53','2026-06-15 21:14:53',NULL),
(23,'Bruno','Alvarez','bruno.alvarez21@mail.com','$2y$12$hcWTgRWb8DnfJ77sOIyDrOYVqVXsMrUsNPDY1KS5fKpphLziYC8wG',2,NULL,'2026-06-15 21:15:48','2026-06-15 21:15:48',NULL),
(24,'Daniela','Benítez','daniela.benitez22@mail.com','$2y$12$dPsV/RflIoM1GruQu..7gOl28qzwiYO.Gb9riiGLL9s8OH3fzTF76',2,NULL,'2026-06-15 21:15:48','2026-06-15 21:15:48',NULL),
(25,'Ezequiel','Navarro','ezequiel.navarro23@mail.com','$2y$12$bnuduELBy7/RrO5NES5x9OOxGjaP53gGV01E.oeHpInu4vTngCO7u',2,NULL,'2026-06-15 21:15:49','2026-06-15 21:15:49',NULL),
(26,'Melina','Vega','melina.vega24@mail.com','$2y$12$Qv/8gx7iiDEsZwPIUlRZwefiEzwOsBYHuwP4v4QWS.uWphCYIdgP2',2,NULL,'2026-06-15 21:15:50','2026-06-15 21:15:50',NULL),
(27,'Gonzalo','Paz','gonzalo.paz25@mail.com','$2y$12$jQPF789Nyz4xtejzcJNlw.2U9vJ7pvj8Q6eLgudKPaJOv4kmQdnni',2,NULL,'2026-06-15 21:15:51','2026-06-15 21:15:51',NULL),
(28,'Carolina Elizabeth','Ibarra','carolina.ibarra26@mail.com','$2y$12$tuKYEdWtjkuS/ECZFCfAiOAs2QRrm6NDdTBjkcnnhMDk.BbNiu1KO',2,NULL,'2026-06-15 21:15:51','2026-06-18 19:51:02',NULL),
(29,'Leandro','Peralta','leandro.peralta27@mail.com','$2y$12$xEx4qARn6BSVNSttpAkQEOuSFdv4DAESdxcqY5snapccjTj62jThi',2,NULL,'2026-06-15 21:15:52','2026-06-15 21:15:52',NULL),
(30,'Agustín','Luna','agustin.luna28@mail.com','$2y$12$1sV0LQiF7uIWQ9hBsaGgO.H8IHTKW6Y.YmFCv9s173rRbrVUAlIIS',2,NULL,'2026-06-15 21:15:53','2026-06-15 21:15:53',NULL),
(31,'Micaela','Reyes','micaela.reyes29@mail.com','$2y$12$EH.WynX3/l2W/1RYBVOJD.H65ajqjbOKda8RgEdmJdIHgeHNoLNcW',2,NULL,'2026-06-15 21:15:54','2026-06-15 21:15:54',NULL),
(32,'Santiago','Domínguez','santiago.dominguez30@mail.com','$2y$12$Q.gJdDGXux0Jqe4mQYv.Hus8y/bOdXBtusPLzxOTd2yIfWJ77IwnS',2,NULL,'2026-06-15 21:15:54','2026-06-15 21:15:54',NULL),
(33,'Valeria','Flores','valeria.flores31@mail.com','$2y$12$I4swVWIn0Kzv2/MDysOxWONiJYM1MD.aE3B6VyH6jEfvtl9S7GJgG',2,NULL,'2026-06-15 21:15:55','2026-06-15 21:15:55',NULL),
(34,'Lucas','Mendoza','lucas.mendoza32@mail.com','$2y$12$Zj0iJXIznF/17jc4ojHYReK8OxxeKc5O7zwBRcDFUBQeB/fwaU7Wq',2,NULL,'2026-06-15 21:15:56','2026-06-15 21:15:56',NULL),
(35,'Antonella','Ríos','antonella.rios33@mail.com','$2y$12$vQ8yRLIy88vO3Sdw9Cfc9O7NHMvwyiNaEGJIAC8ee/gv4yVgz.KFq',2,NULL,'2026-06-15 21:15:57','2026-06-15 21:15:57',NULL),
(36,'Facundo','Campos','facundo.campos34@mail.com','$2y$12$bc6WPjt.wnaK7xzIZ5o/Kuza4Mdb3nkh6NcXaTusTPrut1O/34ACO',1,NULL,'2026-06-15 21:15:57','2026-06-18 20:13:18',NULL),
(37,'Bianca','Sosa','bianca.sosa35@mail.com','$2y$12$vzDsvhJJX9/2ZMbRk4uKwe0Au4mgDlV9ajked8rkGLQK687JLnVqa',2,NULL,'2026-06-15 21:16:00','2026-06-19 01:13:26','2026-06-19 01:13:26'),
(38,'Maria','Cabral','maricabral@gmail.com','$2y$12$TiUbNB50vKCp/zI0z2sfYuYbkfLcpEn5ClFyaFByg4Q1rdW3dgw5y',2,NULL,'2026-06-18 20:36:48','2026-06-19 01:17:05',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'teatro_grupo08'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-06-24 16:45:30
