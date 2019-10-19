-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.19-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5144
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para abtmtorneos
CREATE DATABASE IF NOT EXISTS `abtmtorneos` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `abtmtorneos`;

-- Volcando estructura para tabla abtmtorneos.inscripcion
CREATE TABLE IF NOT EXISTS `inscripcion` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jugador` bigint(20) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `torneo` int(11) DEFAULT NULL,
  `fechahora` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abtmtorneos.inscripcion: ~25 rows (aproximadamente)
/*!40000 ALTER TABLE `inscripcion` DISABLE KEYS */;
INSERT INTO `inscripcion` (`id`, `jugador`, `categoria`, `torneo`, `fechahora`) VALUES
	(16, 1, 1, 3, '2017-10-04 21:12:05'),
	(17, 2, 1, 3, '2017-10-04 21:12:05'),
	(18, 3, 1, 3, '2017-10-04 21:12:05'),
	(19, 4, 1, 3, '2017-10-04 21:12:05'),
	(20, 5, 1, 3, '2017-10-04 21:12:05'),
	(21, 6, 1, 3, '2017-10-04 21:12:05'),
	(22, 7, 1, 3, '2017-10-04 21:12:05'),
	(23, 8, 1, 3, '2017-10-04 21:12:05'),
	(24, 9, 1, 3, '2017-10-04 21:12:05'),
	(25, 10, 1, 3, '2017-10-04 21:12:05'),
	(26, 11, 1, 3, '2017-10-04 21:12:05'),
	(27, 12, 1, 3, '2017-10-04 21:12:05'),
	(28, 13, 1, 3, '2017-10-04 21:12:05'),
	(29, 14, 1, 3, '2017-10-04 21:12:05'),
	(30, 15, 1, 3, '2017-10-04 21:12:05'),
	(31, 16, 1, 3, '2017-10-04 21:12:05'),
	(32, 1, 0, 3, '2017-10-09 21:36:02'),
	(33, 2, 0, 3, '2017-10-09 21:36:02'),
	(34, 3, 0, 3, '2017-10-09 21:44:44'),
	(35, 4, 0, 3, '2017-10-09 22:21:40'),
	(36, 5, 0, 3, '2017-10-09 22:21:45'),
	(37, 6, 0, 3, '2017-10-09 22:21:50'),
	(38, 7, 0, 3, '2017-10-11 16:33:27'),
	(46, 8, 0, 3, '2017-10-11 22:02:26'),
	(47, 9, 0, 3, '2017-10-11 22:07:32'),
	(48, 10, 0, 3, '2017-10-11 22:13:10'),
	(49, 11, 0, 3, '2017-10-11 22:25:48'),
	(50, 12, 0, 3, '2017-10-11 22:28:37');
/*!40000 ALTER TABLE `inscripcion` ENABLE KEYS */;

-- Volcando estructura para tabla abtmtorneos.jugador
CREATE TABLE IF NOT EXISTS `jugador` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abtmtorneos.jugador: ~16 rows (aproximadamente)
/*!40000 ALTER TABLE `jugador` DISABLE KEYS */;
INSERT INTO `jugador` (`id`, `nombre`, `edad`, `categoria`) VALUES
	(1, 'facundo carignano', 28, 1),
	(2, 'pepe lopez', 30, 1),
	(3, 'cacho ramirez', 25, 1),
	(4, 'luis garcia', 22, 1),
	(5, 'ale sergi', 44, 1),
	(6, 'leo fraga', 33, 1),
	(7, 'brian lima', 22, 1),
	(8, 'beto habi', 44, 1),
	(9, 'franco menem', 55, 1),
	(10, 'bety sanchez', 33, 1),
	(11, 'angelito', 33, 1),
	(12, 'bibi', 11, 1),
	(13, 'galgo', 22, 1),
	(14, 'pipa', 33, 1),
	(15, 'tolo', 44, 1),
	(16, 'nico', 22, 1);
/*!40000 ALTER TABLE `jugador` ENABLE KEYS */;

-- Volcando estructura para tabla abtmtorneos.llave
CREATE TABLE IF NOT EXISTS `llave` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jugador` bigint(20) DEFAULT NULL,
  `resultado` varchar(200) DEFAULT NULL,
  `torneo` bigint(20) DEFAULT NULL,
  `instancia` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `fechahora` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abtmtorneos.llave: ~31 rows (aproximadamente)
/*!40000 ALTER TABLE `llave` DISABLE KEYS */;
INSERT INTO `llave` (`id`, `jugador`, `resultado`, `torneo`, `instancia`, `categoria`, `orden`, `fechahora`) VALUES
	(1, 1, '11-11-11', 3, 32, 1, 1, NULL),
	(2, 2, '0-0-0', 3, 32, 1, 2, NULL),
	(9, 3, '11-0-11', 3, 32, 1, 3, NULL),
	(10, 4, '0-0-0', 3, 32, 1, 4, NULL),
	(15, 1, '11-11-11-11-11', 3, 16, 1, 1, NULL),
	(16, 4, '11-11-11-11-11', 3, 16, 1, 2, NULL),
	(17, 5, '11-11-11', 3, 32, 1, 5, NULL),
	(18, 6, '0-0-0', 3, 32, 1, 6, NULL),
	(23, 5, '11-11-11-11-11', 3, 16, 1, 3, NULL),
	(24, 7, '1-1-1', 3, 32, 1, 7, NULL),
	(25, 8, '1-1-1', 3, 32, 1, 8, NULL),
	(33, 7, '11-11-11-11-11', 3, 16, 1, 4, NULL),
	(34, 1, '11-11-11-11-11', 3, 8, 1, 1, NULL),
	(35, 5, '11-11-11-11-11', 3, 8, 1, 2, NULL),
	(36, 1, '11-11-11-11-11', 3, 4, 1, 1, NULL),
	(37, 10, NULL, 3, 16, 1, 1, NULL),
	(38, 5, NULL, 3, 16, 1, 2, NULL),
	(39, 1, NULL, 3, 16, 1, 3, NULL),
	(40, 10, NULL, 3, 16, 1, NULL, '2017-10-04 19:36:35'),
	(41, 5, NULL, 3, 16, 1, NULL, '2017-10-04 19:36:35'),
	(42, 1, NULL, 3, 16, 1, NULL, '2017-10-04 19:36:35'),
	(43, 10, NULL, 3, 16, 1, 1, '2017-10-04 19:37:34'),
	(44, 5, NULL, 3, 16, 1, 12, '2017-10-04 19:37:34'),
	(45, 1, NULL, 3, 16, 1, 7, '2017-10-04 19:37:34'),
	(46, 9, NULL, 3, 16, 1, 16, '2017-10-04 19:39:39'),
	(47, 2, NULL, 3, 16, 1, 6, '2017-10-04 19:39:39'),
	(48, 6, NULL, 3, 16, 1, 10, '2017-10-04 19:39:39'),
	(49, 8, NULL, 3, 16, 1, 9, '2017-10-04 20:21:54'),
	(50, 3, NULL, 3, 16, 1, 3, '2017-10-04 20:21:54'),
	(51, 7, NULL, 3, 16, 1, 15, '2017-10-04 20:21:54');
/*!40000 ALTER TABLE `llave` ENABLE KEYS */;

-- Volcando estructura para tabla abtmtorneos.partido
CREATE TABLE IF NOT EXISTS `partido` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jugador1` bigint(20) DEFAULT NULL,
  `jugador2` bigint(20) DEFAULT NULL,
  `cant_sets` int(11) DEFAULT NULL,
  `set11` int(11) DEFAULT NULL,
  `set12` int(11) DEFAULT NULL,
  `set13` int(11) DEFAULT NULL,
  `set14` int(11) DEFAULT NULL,
  `set15` int(11) DEFAULT NULL,
  `set21` int(11) DEFAULT NULL,
  `set22` int(11) DEFAULT NULL,
  `set23` int(11) DEFAULT NULL,
  `set24` int(11) DEFAULT NULL,
  `set25` int(11) DEFAULT NULL,
  `resultado1` int(11) DEFAULT NULL,
  `resultado2` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `torneo` bigint(20) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `id_zona` bigint(20) DEFAULT NULL,
  `id_llave1` bigint(20) DEFAULT NULL,
  `id_llave2` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1548 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abtmtorneos.partido: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `partido` DISABLE KEYS */;
INSERT INTO `partido` (`id`, `jugador1`, `jugador2`, `cant_sets`, `set11`, `set12`, `set13`, `set14`, `set15`, `set21`, `set22`, `set23`, `set24`, `set25`, `resultado1`, `resultado2`, `estado`, `torneo`, `categoria`, `tipo`, `id_zona`, `id_llave1`, `id_llave2`) VALUES
	(1530, 1, 5, 5, 11, 11, 11, 11, 11, 5, 5, 5, 5, 5, 5, 0, 'FINALIZADO', 3, 0, 'ZONA', 235, NULL, NULL),
	(1531, 1, 7, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 235, NULL, NULL),
	(1532, 1, 10, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 235, NULL, NULL),
	(1533, 5, 7, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 235, NULL, NULL),
	(1534, 5, 10, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 235, NULL, NULL),
	(1535, 7, 10, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 235, NULL, NULL),
	(1536, 2, 6, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 236, NULL, NULL),
	(1537, 2, 9, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 236, NULL, NULL),
	(1538, 2, 12, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 236, NULL, NULL),
	(1539, 6, 9, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 236, NULL, NULL),
	(1540, 6, 12, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 236, NULL, NULL),
	(1541, 9, 12, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 236, NULL, NULL),
	(1542, 3, 4, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 237, NULL, NULL),
	(1543, 3, 8, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 237, NULL, NULL),
	(1544, 3, 11, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 237, NULL, NULL),
	(1545, 4, 8, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 237, NULL, NULL),
	(1546, 4, 11, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 237, NULL, NULL),
	(1547, 8, 11, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', 3, 0, 'ZONA', 237, NULL, NULL);
/*!40000 ALTER TABLE `partido` ENABLE KEYS */;

-- Volcando estructura para tabla abtmtorneos.ranking_cuarta
CREATE TABLE IF NOT EXISTS `ranking_cuarta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jugador` bigint(20) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abtmtorneos.ranking_cuarta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ranking_cuarta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ranking_cuarta` ENABLE KEYS */;

-- Volcando estructura para tabla abtmtorneos.ranking_primera
CREATE TABLE IF NOT EXISTS `ranking_primera` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jugador` bigint(20) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abtmtorneos.ranking_primera: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `ranking_primera` DISABLE KEYS */;
INSERT INTO `ranking_primera` (`id`, `jugador`, `posicion`, `puntos`) VALUES
	(1, 1, 1, 10),
	(2, 2, 2, 20),
	(3, 3, 3, 30),
	(4, 4, 4, 40),
	(5, 5, 5, 50),
	(6, 6, 6, 60),
	(7, 7, 7, 70),
	(8, 8, 8, 80),
	(9, 9, 9, 90),
	(10, 10, 10, 100);
/*!40000 ALTER TABLE `ranking_primera` ENABLE KEYS */;

-- Volcando estructura para tabla abtmtorneos.ranking_sd
CREATE TABLE IF NOT EXISTS `ranking_sd` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jugador` bigint(20) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abtmtorneos.ranking_sd: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `ranking_sd` DISABLE KEYS */;
INSERT INTO `ranking_sd` (`id`, `jugador`, `puntos`, `posicion`) VALUES
	(1, 1, 100, 1),
	(2, 2, 90, 2),
	(3, 3, 80, 3),
	(4, 4, 70, 4),
	(5, 5, 60, 5),
	(6, 6, 50, 6),
	(7, 7, 40, 7),
	(8, 8, 30, 8),
	(9, 9, 20, 9),
	(10, 10, 10, 10),
	(11, 11, 8, 11),
	(12, 12, 5, 12);
/*!40000 ALTER TABLE `ranking_sd` ENABLE KEYS */;

-- Volcando estructura para tabla abtmtorneos.ranking_segunda
CREATE TABLE IF NOT EXISTS `ranking_segunda` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jugador` bigint(20) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abtmtorneos.ranking_segunda: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ranking_segunda` DISABLE KEYS */;
/*!40000 ALTER TABLE `ranking_segunda` ENABLE KEYS */;

-- Volcando estructura para tabla abtmtorneos.ranking_tercera
CREATE TABLE IF NOT EXISTS `ranking_tercera` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jugador` bigint(20) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `puntos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abtmtorneos.ranking_tercera: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ranking_tercera` DISABLE KEYS */;
/*!40000 ALTER TABLE `ranking_tercera` ENABLE KEYS */;

-- Volcando estructura para tabla abtmtorneos.template_llave
CREATE TABLE IF NOT EXISTS `template_llave` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `posicion` int(11) DEFAULT NULL,
  `cantidad_jugadores` int(11) DEFAULT NULL,
  `posicion_zona` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=593 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abtmtorneos.template_llave: ~561 rows (aproximadamente)
/*!40000 ALTER TABLE `template_llave` DISABLE KEYS */;
INSERT INTO `template_llave` (`id`, `posicion`, `cantidad_jugadores`, `posicion_zona`) VALUES
	(1, 1, 12, '1a'),
	(2, 2, 12, 'bye'),
	(3, 3, 12, '2c'),
	(4, 4, 12, '3b'),
	(5, 5, 12, '3c'),
	(6, 6, 12, '2b'),
	(7, 7, 12, 'bye'),
	(8, 8, 12, '1d'),
	(9, 9, 12, '1c'),
	(10, 10, 12, 'bye'),
	(11, 11, 12, '2a'),
	(12, 12, 12, '3d'),
	(13, 13, 12, '3a'),
	(14, 14, 12, '2d'),
	(15, 15, 12, 'bye'),
	(16, 16, 12, '1b'),
	(17, 1, 13, '1a'),
	(18, 2, 13, 'bye'),
	(19, 3, 13, '2c'),
	(20, 4, 13, '3b'),
	(21, 5, 13, '3c'),
	(22, 6, 13, '2b'),
	(23, 7, 13, 'bye'),
	(24, 8, 13, '1d'),
	(25, 9, 13, '1c'),
	(26, 10, 13, '4d'),
	(27, 11, 13, '2a'),
	(28, 12, 13, '3d'),
	(29, 13, 13, '3a'),
	(30, 14, 13, '2d'),
	(31, 15, 13, 'bye'),
	(32, 16, 13, '1b'),
	(33, 1, 14, '1a'),
	(34, 2, 14, 'bye'),
	(35, 3, 14, '2c'),
	(36, 4, 14, '3b'),
	(37, 5, 14, '3c'),
	(38, 6, 14, '2b'),
	(39, 7, 14, '4c'),
	(40, 8, 14, '1d'),
	(41, 9, 14, '1c'),
	(42, 10, 14, '4d'),
	(43, 11, 14, '2a'),
	(44, 12, 14, '3d'),
	(45, 13, 14, '3a'),
	(46, 14, 14, '2d'),
	(47, 15, 14, 'bye'),
	(48, 16, 14, '1b'),
	(49, 1, 15, '1a'),
	(50, 2, 15, 'bye'),
	(51, 3, 15, '2c'),
	(52, 4, 15, '3b'),
	(53, 5, 15, '1e'),
	(54, 6, 15, '2b'),
	(55, 7, 15, '3a'),
	(56, 8, 15, '1d'),
	(57, 9, 15, '1c'),
	(58, 10, 15, '3e'),
	(59, 11, 15, '2a'),
	(60, 12, 15, '2d'),
	(61, 13, 15, '2e'),
	(62, 14, 15, '3d'),
	(63, 15, 15, '3c'),
	(64, 16, 15, '1b'),
	(65, 1, 16, '1a'),
	(66, 2, 16, '4e'),
	(67, 3, 16, '2c'),
	(68, 4, 16, '3d'),
	(69, 5, 16, '1e'),
	(70, 6, 16, '2b'),
	(71, 7, 16, '3a'),
	(72, 8, 16, '1d'),
	(73, 9, 16, '1c'),
	(74, 10, 16, '3b'),
	(75, 11, 16, '3e'),
	(76, 12, 16, '2a'),
	(77, 13, 16, '2d'),
	(78, 14, 16, '2e'),
	(79, 15, 16, '3c'),
	(80, 16, 16, '1b'),
	(81, 1, 17, '1a'),
	(82, 2, 17, 'bye'),
	(83, 3, 17, '4d'),
	(84, 4, 17, '4e'),
	(85, 5, 17, '2b'),
	(86, 6, 17, 'bye'),
	(87, 7, 17, 'bye'),
	(88, 8, 17, '3d'),
	(89, 9, 17, '1e'),
	(90, 10, 17, 'bye'),
	(91, 11, 17, 'bye'),
	(92, 12, 17, '3a'),
	(93, 13, 17, '2c'),
	(94, 14, 17, 'bye'),
	(95, 15, 17, 'bye'),
	(96, 16, 17, '1d'),
	(97, 17, 17, '1c'),
	(98, 18, 17, 'bye'),
	(99, 19, 17, 'bye'),
	(100, 20, 17, '3b'),
	(101, 21, 17, '2a'),
	(102, 22, 17, 'bye'),
	(103, 23, 17, 'bye'),
	(104, 24, 17, '2e'),
	(105, 25, 17, '3e'),
	(106, 26, 17, 'bye'),
	(107, 27, 17, 'bye'),
	(108, 28, 17, '2d'),
	(109, 29, 17, '3c'),
	(110, 30, 17, 'bye'),
	(111, 31, 17, 'bye'),
	(112, 32, 17, '1b'),
	(113, 1, 18, '1a'),
	(114, 2, 18, 'bye'),
	(115, 3, 18, '3d'),
	(116, 4, 18, '3e'),
	(117, 5, 18, '2f'),
	(118, 6, 18, 'bye'),
	(119, 7, 18, 'bye'),
	(120, 8, 18, '2c'),
	(121, 9, 18, '1e'),
	(122, 10, 18, 'bye'),
	(123, 11, 18, 'bye'),
	(124, 12, 18, '2b'),
	(125, 13, 18, '3a'),
	(126, 14, 18, 'bye'),
	(127, 15, 18, 'bye'),
	(128, 16, 18, '1d'),
	(129, 17, 18, '1c'),
	(130, 18, 18, 'bye'),
	(131, 19, 18, 'bye'),
	(132, 20, 18, '3b'),
	(133, 21, 18, '2a'),
	(134, 22, 18, 'bye'),
	(135, 23, 18, 'bye'),
	(136, 24, 18, '1f'),
	(137, 25, 18, '2d'),
	(138, 26, 18, 'bye'),
	(139, 27, 18, 'bye'),
	(140, 28, 18, '2e'),
	(141, 29, 18, '3c'),
	(142, 30, 18, '3f'),
	(143, 31, 18, 'bye'),
	(144, 32, 18, '1b'),
	(145, 1, 19, '1a'),
	(146, 2, 19, 'bye'),
	(147, 3, 19, '4f'),
	(148, 4, 19, '3e'),
	(149, 5, 19, '2f'),
	(150, 6, 19, 'bye'),
	(151, 7, 19, 'bye'),
	(152, 8, 19, '2b'),
	(153, 9, 19, '1f'),
	(154, 10, 19, 'bye'),
	(155, 11, 19, 'bye'),
	(156, 12, 19, '2c'),
	(157, 13, 19, '2e'),
	(158, 14, 19, 'bye'),
	(159, 15, 19, 'bye'),
	(160, 16, 19, '1d'),
	(161, 17, 19, '1c'),
	(162, 18, 19, 'bye'),
	(163, 19, 19, '3b'),
	(164, 20, 19, '3d'),
	(165, 21, 19, '3a'),
	(166, 22, 19, 'bye'),
	(167, 23, 19, 'bye'),
	(168, 24, 19, '1e'),
	(169, 25, 19, '2a'),
	(170, 26, 19, 'bye'),
	(171, 27, 19, 'bye'),
	(172, 28, 19, '2d'),
	(173, 29, 19, '3c'),
	(174, 30, 19, '3f'),
	(175, 31, 19, 'bye'),
	(176, 32, 19, '1b'),
	(177, 1, 20, '1a'),
	(178, 2, 20, 'bye'),
	(179, 3, 20, '3f'),
	(180, 4, 20, '3c'),
	(181, 5, 20, '2b'),
	(182, 6, 20, 'bye'),
	(183, 7, 20, 'bye'),
	(184, 8, 20, '2e'),
	(185, 9, 20, '1f'),
	(186, 10, 20, 'bye'),
	(187, 11, 20, 'bye'),
	(188, 12, 20, '2c'),
	(189, 13, 20, '3a'),
	(190, 14, 20, '4e'),
	(191, 15, 20, 'bye'),
	(192, 16, 20, '1d'),
	(193, 17, 20, '1c'),
	(194, 18, 20, 'bye'),
	(195, 19, 20, '3b'),
	(196, 20, 20, '3d'),
	(197, 21, 20, '2f'),
	(198, 22, 20, 'bye'),
	(199, 23, 20, 'bye'),
	(200, 24, 20, '1e'),
	(201, 25, 20, '2a'),
	(202, 26, 20, 'bye'),
	(203, 27, 20, 'bye'),
	(204, 28, 20, '2d'),
	(205, 29, 20, '3e'),
	(206, 30, 20, '4f'),
	(207, 31, 20, 'bye'),
	(208, 32, 20, '1b'),
	(209, 1, 21, '1a'),
	(210, 2, 21, 'bye'),
	(211, 3, 21, '3d'),
	(212, 4, 21, '3e'),
	(213, 5, 21, '2f'),
	(214, 6, 21, 'bye'),
	(215, 7, 21, 'bye'),
	(216, 8, 21, '2g'),
	(217, 9, 21, '1e'),
	(218, 10, 21, 'bye'),
	(219, 11, 21, '2b'),
	(220, 12, 21, '3g'),
	(221, 13, 21, '2c'),
	(222, 14, 21, '3a'),
	(223, 15, 21, 'bye'),
	(224, 16, 21, '1d'),
	(225, 17, 21, '1c'),
	(226, 18, 21, 'bye'),
	(227, 19, 21, '2e'),
	(228, 20, 21, '3b'),
	(229, 21, 21, '2a'),
	(230, 22, 21, 'bye'),
	(231, 23, 21, 'bye'),
	(232, 24, 21, '1f'),
	(233, 25, 21, '1g'),
	(234, 26, 21, 'bye'),
	(235, 27, 21, 'bye'),
	(236, 28, 21, '2d'),
	(237, 29, 21, '3f'),
	(238, 30, 21, '3c'),
	(239, 31, 21, 'bye'),
	(240, 32, 21, '1b'),
	(241, 1, 22, '1a'),
	(242, 2, 22, 'bye'),
	(243, 3, 22, '4g'),
	(244, 4, 22, '2f'),
	(245, 5, 22, '2g'),
	(246, 6, 22, '3d'),
	(247, 7, 22, 'bye'),
	(248, 8, 22, '2b'),
	(249, 9, 22, '1e'),
	(250, 10, 22, 'bye'),
	(251, 11, 22, '3a'),
	(252, 12, 22, '3g'),
	(253, 13, 22, '2c'),
	(254, 14, 22, 'bye'),
	(255, 15, 22, 'bye'),
	(256, 16, 22, '1d'),
	(257, 17, 22, '1c'),
	(258, 18, 22, 'bye'),
	(259, 19, 22, 'bye'),
	(260, 20, 22, '2d'),
	(261, 21, 22, '3e'),
	(262, 22, 22, '3b'),
	(263, 23, 22, 'bye'),
	(264, 24, 22, '1f'),
	(265, 25, 22, '1g'),
	(266, 26, 22, 'bye'),
	(267, 27, 22, '2e'),
	(268, 28, 22, '3c'),
	(269, 29, 22, '2a'),
	(270, 30, 22, '3f'),
	(271, 31, 22, 'bye'),
	(272, 32, 22, '1b'),
	(273, 1, 23, '1a'),
	(274, 2, 23, 'bye'),
	(275, 3, 23, '4f'),
	(276, 4, 23, '3g'),
	(277, 5, 23, '2b'),
	(278, 6, 23, 'bye'),
	(279, 7, 23, '2f'),
	(280, 8, 23, '3d'),
	(281, 9, 23, '1e'),
	(282, 10, 23, 'bye'),
	(283, 11, 23, '2d'),
	(284, 12, 23, '3b'),
	(285, 13, 23, '2c'),
	(286, 14, 23, '3a'),
	(287, 15, 23, 'bye'),
	(288, 16, 23, '1d'),
	(289, 17, 23, '1c'),
	(290, 18, 23, 'bye'),
	(291, 19, 23, '2g'),
	(292, 20, 23, '3e'),
	(293, 21, 23, 'bye'),
	(294, 22, 23, '2a'),
	(295, 23, 23, 'bye'),
	(296, 24, 23, '1f'),
	(297, 25, 23, '1g'),
	(298, 26, 23, 'bye'),
	(299, 27, 23, '3c'),
	(300, 28, 23, '2e'),
	(301, 29, 23, '4g'),
	(302, 30, 23, '3f'),
	(303, 31, 23, 'bye'),
	(304, 32, 23, '1b'),
	(305, 1, 24, '1a'),
	(306, 2, 24, 'bye'),
	(307, 3, 24, '2g'),
	(308, 4, 24, '3d'),
	(309, 5, 24, '2f'),
	(310, 6, 24, '3e'),
	(311, 7, 24, 'bye'),
	(312, 8, 24, '1h'),
	(313, 9, 24, '1e'),
	(314, 10, 24, 'bye'),
	(315, 11, 24, '2b'),
	(316, 12, 24, '3h'),
	(317, 13, 24, '2c'),
	(318, 14, 24, '3a'),
	(319, 15, 24, 'bye'),
	(320, 16, 24, '1d'),
	(321, 17, 24, '1c'),
	(322, 18, 24, 'bye'),
	(323, 19, 24, '2e'),
	(324, 20, 24, '3b'),
	(325, 21, 24, '2a'),
	(326, 22, 24, '3g'),
	(327, 23, 24, 'bye'),
	(328, 24, 24, '1f'),
	(329, 25, 24, '1g'),
	(330, 26, 24, 'bye'),
	(331, 27, 24, '2d'),
	(332, 28, 24, '3c'),
	(333, 29, 24, '2h'),
	(334, 30, 24, '3f'),
	(335, 31, 24, 'bye'),
	(336, 32, 24, '1b'),
	(337, 1, 25, '1a'),
	(338, 2, 25, 'bye'),
	(339, 3, 25, '2f'),
	(340, 4, 25, '3g'),
	(341, 5, 25, '2c'),
	(342, 6, 25, '3e'),
	(343, 7, 25, 'bye'),
	(344, 8, 25, '1h'),
	(345, 9, 25, '1e'),
	(346, 10, 25, 'bye'),
	(347, 11, 25, '2b'),
	(348, 12, 25, '3h'),
	(349, 13, 25, '2g'),
	(350, 14, 25, '3a'),
	(351, 15, 25, 'bye'),
	(352, 16, 25, '1d'),
	(353, 17, 25, '1c'),
	(354, 18, 25, 'bye'),
	(355, 19, 25, '2h'),
	(356, 20, 25, '3b'),
	(357, 21, 25, '2a'),
	(358, 22, 25, '3d'),
	(359, 23, 25, '4h'),
	(360, 24, 25, '1g'),
	(361, 25, 25, '1f'),
	(362, 26, 25, 'bye'),
	(363, 27, 25, '2d'),
	(364, 28, 25, '3c'),
	(365, 29, 25, '2e'),
	(366, 30, 25, '3f'),
	(367, 31, 25, 'bye'),
	(368, 32, 25, '1b'),
	(369, 1, 26, '1a'),
	(370, 2, 26, 'bye'),
	(371, 3, 26, '2g'),
	(372, 4, 26, '3e'),
	(373, 5, 26, '2c'),
	(374, 6, 26, '3d'),
	(375, 7, 26, '4g'),
	(376, 8, 26, '1h'),
	(377, 9, 26, '1e'),
	(378, 10, 26, 'bye'),
	(379, 11, 26, '2b'),
	(380, 12, 26, '3a'),
	(381, 13, 26, '2f'),
	(382, 14, 26, '3h'),
	(383, 15, 26, 'bye'),
	(384, 16, 26, '1d'),
	(385, 17, 26, '1c'),
	(386, 18, 26, 'bye'),
	(387, 19, 26, '2a'),
	(388, 20, 26, '3g'),
	(389, 21, 26, '2d'),
	(390, 22, 26, '3b'),
	(391, 23, 26, 'bye'),
	(392, 24, 26, '1f'),
	(393, 25, 26, '1g'),
	(394, 26, 26, '4h'),
	(395, 27, 26, '2e'),
	(396, 28, 26, '3c'),
	(397, 29, 26, '2h'),
	(398, 30, 26, '3f'),
	(399, 31, 26, 'bye'),
	(400, 32, 26, '1b'),
	(401, 1, 27, '1a'),
	(402, 2, 27, 'bye'),
	(403, 3, 27, '2g'),
	(404, 4, 27, '3e'),
	(405, 5, 27, '1i'),
	(406, 6, 27, '3d'),
	(407, 7, 27, '3b'),
	(408, 8, 27, '1h'),
	(409, 9, 27, '1e'),
	(410, 10, 27, 'bye'),
	(411, 11, 27, '2b'),
	(412, 12, 27, '2c'),
	(413, 13, 27, '2f'),
	(414, 14, 27, '3a'),
	(415, 15, 27, 'bye'),
	(416, 16, 27, '1d'),
	(417, 17, 27, '1c'),
	(418, 18, 27, 'bye'),
	(419, 19, 27, '2d'),
	(420, 20, 27, '3i'),
	(421, 21, 27, '2a'),
	(422, 22, 27, '2e'),
	(423, 23, 27, '3h'),
	(424, 24, 27, '1f'),
	(425, 25, 27, '1g'),
	(426, 26, 27, '3c'),
	(427, 27, 27, '2h'),
	(428, 28, 27, '2i'),
	(429, 29, 27, '3f'),
	(430, 30, 27, '3g'),
	(431, 31, 27, 'bye'),
	(432, 32, 27, '1b'),
	(433, 1, 28, '1a'),
	(434, 2, 28, 'bye'),
	(435, 3, 28, '2g'),
	(436, 4, 28, '3e'),
	(437, 5, 28, '1i'),
	(438, 6, 28, '3d'),
	(439, 7, 28, '3b'),
	(440, 8, 28, '1h'),
	(441, 9, 28, '1e'),
	(442, 10, 28, '4i'),
	(443, 11, 28, '2b'),
	(444, 12, 28, '2c'),
	(445, 13, 28, '2f'),
	(446, 14, 28, '3a'),
	(447, 15, 28, 'bye'),
	(448, 16, 28, '1d'),
	(449, 17, 28, '1c'),
	(450, 18, 28, 'bye'),
	(451, 19, 28, '2d'),
	(452, 20, 28, '3i'),
	(453, 21, 28, '2a'),
	(454, 22, 28, '2e'),
	(455, 23, 28, '3h'),
	(456, 24, 28, '1f'),
	(457, 25, 28, '1g'),
	(458, 26, 28, '3c'),
	(459, 27, 28, '2h'),
	(460, 28, 28, '2i'),
	(461, 29, 28, '3f'),
	(462, 30, 28, '3g'),
	(463, 31, 28, 'bye'),
	(464, 32, 28, '1b'),
	(465, 1, 29, '1a'),
	(466, 2, 29, 'bye'),
	(467, 3, 29, '2g'),
	(468, 4, 29, '3e'),
	(469, 5, 29, '1i'),
	(470, 6, 29, '3d'),
	(471, 7, 29, '3b'),
	(472, 8, 29, '1h'),
	(473, 9, 29, '1e'),
	(474, 10, 29, '4i'),
	(475, 11, 29, '2b'),
	(476, 12, 29, '2c'),
	(477, 13, 29, '2f'),
	(478, 14, 29, '3a'),
	(479, 15, 29, '4h'),
	(480, 16, 29, '1d'),
	(481, 17, 29, '1c'),
	(482, 18, 29, 'bye'),
	(483, 19, 29, '2d'),
	(484, 20, 29, '3i'),
	(485, 21, 29, '2a'),
	(486, 22, 29, '2e'),
	(487, 23, 29, '3h'),
	(488, 24, 29, '1f'),
	(489, 25, 29, '1g'),
	(490, 26, 29, '3c'),
	(491, 27, 29, '2h'),
	(492, 28, 29, '2i'),
	(493, 29, 29, '3f'),
	(494, 30, 29, '3g'),
	(495, 31, 29, 'bye'),
	(496, 32, 29, '1b'),
	(497, 1, 30, '1a'),
	(498, 2, 30, 'bye'),
	(499, 3, 30, '2j'),
	(500, 4, 30, '3e'),
	(501, 5, 30, '1i'),
	(502, 6, 30, '3d'),
	(503, 7, 30, '1h'),
	(504, 8, 30, '3g'),
	(505, 9, 30, '1e'),
	(506, 10, 30, '3a'),
	(507, 11, 30, '2b'),
	(508, 12, 30, '2g'),
	(509, 13, 30, '2c'),
	(510, 14, 30, '2f'),
	(511, 15, 30, '3i'),
	(512, 16, 30, '1d'),
	(513, 17, 30, '1c'),
	(514, 18, 30, '3j'),
	(515, 19, 30, '2h'),
	(516, 20, 30, '2e'),
	(517, 21, 30, '2a'),
	(518, 22, 30, '2d'),
	(519, 23, 30, '1f'),
	(520, 24, 30, '3b'),
	(521, 25, 30, '1g'),
	(522, 26, 30, '3f'),
	(523, 27, 30, '1j'),
	(524, 28, 30, '3c'),
	(525, 29, 30, '2i'),
	(526, 30, 30, '3h'),
	(527, 31, 30, 'bye'),
	(528, 32, 30, '1b'),
	(529, 1, 31, '1a'),
	(530, 2, 31, 'bye'),
	(531, 3, 31, '2g'),
	(532, 4, 31, '2b'),
	(533, 5, 31, '1i'),
	(534, 6, 31, '3d'),
	(535, 7, 31, '3e'),
	(536, 8, 31, '1h'),
	(537, 9, 31, '1e'),
	(538, 10, 31, '3a'),
	(539, 11, 31, '2c'),
	(540, 12, 31, '2j'),
	(541, 13, 31, '2f'),
	(542, 14, 31, '3i'),
	(543, 15, 31, '3h'),
	(544, 16, 31, '1d'),
	(545, 17, 31, '1c'),
	(546, 18, 31, '3b'),
	(547, 19, 31, '2h'),
	(548, 20, 31, '3g'),
	(549, 21, 31, '2e'),
	(550, 22, 31, '2a'),
	(551, 23, 31, '3j'),
	(552, 24, 31, '1f'),
	(553, 25, 31, '1g'),
	(554, 26, 31, '3f'),
	(555, 27, 31, '3c'),
	(556, 28, 31, '1j'),
	(557, 29, 31, '2d'),
	(558, 30, 31, '2i'),
	(559, 31, 31, '4j'),
	(560, 32, 31, '1b'),
	(561, 1, 32, '1a'),
	(562, 2, 32, '4i'),
	(563, 3, 32, '2g'),
	(564, 4, 32, '2b'),
	(565, 5, 32, '1i'),
	(566, 6, 32, '3d'),
	(567, 7, 32, '3e'),
	(568, 8, 32, '1h'),
	(569, 9, 32, '1e'),
	(570, 10, 32, '3a'),
	(571, 11, 32, '2c'),
	(572, 12, 32, '2j'),
	(573, 13, 32, '2f'),
	(574, 14, 32, '3i'),
	(575, 15, 32, '3h'),
	(576, 16, 32, '1d'),
	(577, 17, 32, '1c'),
	(578, 18, 32, '3b'),
	(579, 19, 32, '2h'),
	(580, 20, 32, '3g'),
	(581, 21, 32, '2e'),
	(582, 22, 32, '2a'),
	(583, 23, 32, '3j'),
	(584, 24, 32, '1f'),
	(585, 25, 32, '1g'),
	(586, 26, 32, '3f'),
	(587, 27, 32, '3c'),
	(588, 28, 32, '1j'),
	(589, 29, 32, '2d'),
	(590, 30, 32, '2i'),
	(591, 31, 32, '4j'),
	(592, 32, 32, '1b');
/*!40000 ALTER TABLE `template_llave` ENABLE KEYS */;

-- Volcando estructura para tabla abtmtorneos.torneo
CREATE TABLE IF NOT EXISTS `torneo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `superdivision` bit(1) DEFAULT b'0',
  `primera` bit(1) DEFAULT b'0',
  `segunda` bit(1) DEFAULT b'0',
  `tercera` bit(1) DEFAULT b'0',
  `cuarta` bit(1) DEFAULT b'0',
  `lugar` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `activo` bit(1) DEFAULT b'0',
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abtmtorneos.torneo: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `torneo` DISABLE KEYS */;
INSERT INTO `torneo` (`id`, `nombre`, `superdivision`, `primera`, `segunda`, `tercera`, `cuarta`, `lugar`, `fecha`, `activo`, `estado`) VALUES
	(3, 'Primer puntable ABTM', b'0', b'0', b'0', b'0', b'0', 'Polideportivo Municipal Norte', '2017-09-11 20:01:11', b'1', 'EN JUEGO');
/*!40000 ALTER TABLE `torneo` ENABLE KEYS */;

-- Volcando estructura para tabla abtmtorneos.zona
CREATE TABLE IF NOT EXISTS `zona` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `letra` char(50) DEFAULT NULL,
  `torneo` bigint(20) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `jugador1` bigint(20) DEFAULT NULL,
  `jugador2` bigint(20) DEFAULT NULL,
  `jugador3` bigint(20) DEFAULT NULL,
  `jugador4` bigint(20) DEFAULT NULL,
  `jugador5` bigint(20) DEFAULT NULL,
  `pos1` int(11) DEFAULT NULL,
  `pos2` int(11) DEFAULT NULL,
  `pos3` int(11) DEFAULT NULL,
  `pos4` int(11) DEFAULT NULL,
  `pos5` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fechahora` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abtmtorneos.zona: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `zona` DISABLE KEYS */;
INSERT INTO `zona` (`id`, `letra`, `torneo`, `categoria`, `jugador1`, `jugador2`, `jugador3`, `jugador4`, `jugador5`, `pos1`, `pos2`, `pos3`, `pos4`, `pos5`, `estado`, `fechahora`) VALUES
	(235, 'A', 3, 0, 1, 5, 7, 10, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', '2017-10-11 22:32:00'),
	(236, 'B', 3, 0, 2, 6, 9, 12, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', '2017-10-11 22:32:00'),
	(237, 'C', 3, 0, 3, 4, 8, 11, NULL, NULL, NULL, NULL, NULL, NULL, 'SIN JUGAR', '2017-10-11 22:32:00');
/*!40000 ALTER TABLE `zona` ENABLE KEYS */;

-- Volcando estructura para tabla abtmtorneos.zona_unica_sd
CREATE TABLE IF NOT EXISTS `zona_unica_sd` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jugador1` bigint(20) DEFAULT NULL,
  `jugador2` bigint(20) DEFAULT NULL,
  `jugador3` bigint(20) DEFAULT NULL,
  `jugador4` bigint(20) DEFAULT NULL,
  `jugador5` bigint(20) DEFAULT NULL,
  `jugador6` bigint(20) DEFAULT NULL,
  `cant_jugadores` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `torneo` bigint(20) DEFAULT NULL,
  `fechahora` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla abtmtorneos.zona_unica_sd: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `zona_unica_sd` DISABLE KEYS */;
INSERT INTO `zona_unica_sd` (`id`, `jugador1`, `jugador2`, `jugador3`, `jugador4`, `jugador5`, `jugador6`, `cant_jugadores`, `estado`, `torneo`, `fechahora`) VALUES
	(5, 1, 2, 3, 4, 5, 6, 6, 'SIN JUGAR', 3, '2017-10-11 16:32:32');
/*!40000 ALTER TABLE `zona_unica_sd` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
