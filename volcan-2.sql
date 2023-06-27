-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-06-2023 a las 01:07:51
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `volcan-2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

DROP TABLE IF EXISTS `alerta`;
CREATE TABLE IF NOT EXISTS `alerta` (
  `id_alert_dn` int NOT NULL AUTO_INCREMENT,
  `nombre_alert_dn` varchar(500) DEFAULT NULL,
  `impacto_alert_dn` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_alert_dn`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `alerta`
--

INSERT INTO `alerta` (`id_alert_dn`, `nombre_alert_dn`, `impacto_alert_dn`) VALUES
(7, 'Alerta 12', 'Alto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
CREATE TABLE IF NOT EXISTS `configuracion` (
  `id_con_dn` int NOT NULL AUTO_INCREMENT,
  `nombre_con_dn` varchar(500) DEFAULT NULL,
  `ruc_con_dn` int DEFAULT NULL,
  `telefono_con_dn` int DEFAULT NULL,
  `direccion_con_dn` varchar(500) DEFAULT NULL,
  `representante_con_dn` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_con_dn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

DROP TABLE IF EXISTS `insumos`;
CREATE TABLE IF NOT EXISTS `insumos` (
  `id_in_dn` int NOT NULL AUTO_INCREMENT,
  `nombre_in_dn` varchar(100) DEFAULT NULL,
  `tipo_in_dn` varchar(100) DEFAULT NULL,
  `cantidad_in_dn` float DEFAULT NULL,
  PRIMARY KEY (`id_in_dn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomvol`
--

DROP TABLE IF EXISTS `nomvol`;
CREATE TABLE IF NOT EXISTS `nomvol` (
  `id_vol_dn` int NOT NULL AUTO_INCREMENT,
  `nombre_vol_dn` varchar(100) DEFAULT NULL,
  `provincia_vol_dn` varchar(100) DEFAULT NULL,
  `ultimo_vol_dn` datetime DEFAULT NULL,
  PRIMARY KEY (`id_vol_dn`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `nomvol`
--

INSERT INTO `nomvol` (`id_vol_dn`, `nombre_vol_dn`, `provincia_vol_dn`, `ultimo_vol_dn`) VALUES
(9, 'Tungurahuaedited', 'Tungu', '0000-00-00 00:00:00'),
(10, 'bnjkl', 'njkl', '2023-01-07 00:00:00'),
(11, 'Cotopaxi', 'Cotopaxi', '2023-06-16 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

DROP TABLE IF EXISTS `parroquia`;
CREATE TABLE IF NOT EXISTS `parroquia` (
  `id_parro_dn` int NOT NULL AUTO_INCREMENT,
  `nombre_parro_dn` varchar(500) DEFAULT NULL,
  `ubicacion_parro_dn` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_parro_dn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE IF NOT EXISTS `provincia` (
  `id_pro_dn` int NOT NULL AUTO_INCREMENT,
  `nombre_pro_dn` varchar(500) DEFAULT NULL,
  `porcentaje_pro_dn` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_pro_dn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

DROP TABLE IF EXISTS `reporte`;
CREATE TABLE IF NOT EXISTS `reporte` (
  `id_re_dn` int NOT NULL AUTO_INCREMENT,
  `nombre_re_dn` varchar(100) DEFAULT NULL,
  `alerta_re_dn` varchar(100) DEFAULT NULL,
  `situacion_re_dn` varchar(100) DEFAULT NULL,
  `temperatura_re_dn` float DEFAULT NULL,
  PRIMARY KEY (`id_re_dn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio`
--

DROP TABLE IF EXISTS `sitio`;
CREATE TABLE IF NOT EXISTS `sitio` (
  `id_ss_dn` int NOT NULL AUTO_INCREMENT,
  `nombre_ss_dn` varchar(500) DEFAULT NULL,
  `ubicacion_ss_dn` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_ss_dn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situacion`
--

DROP TABLE IF EXISTS `situacion`;
CREATE TABLE IF NOT EXISTS `situacion` (
  `id_si_dn` int NOT NULL AUTO_INCREMENT,
  `nombre_si_dn` varchar(100) DEFAULT NULL,
  `alerta_si_dn` varchar(100) DEFAULT NULL,
  `actividad_si_dn` varchar(100) DEFAULT NULL,
  `fk_id_nomvol_dn` int NOT NULL,
  `fk_id_alerta_dn` int NOT NULL,
  PRIMARY KEY (`id_si_dn`),
  KEY `fk_id_alert_dn` (`fk_id_nomvol_dn`),
  KEY `fk_id_alerta_dn` (`fk_id_alerta_dn`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `situacion`
--

INSERT INTO `situacion` (`id_si_dn`, `nombre_si_dn`, `alerta_si_dn`, `actividad_si_dn`, `fk_id_nomvol_dn`, `fk_id_alerta_dn`) VALUES
(9, 'Tungurahua', 'asd', 'gsrg', 9, 7),
(10, 'dwad', 'sdwd', 'sdawd', 11, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `id_suc_dn` int NOT NULL AUTO_INCREMENT,
  `provincia_suc_dn` varchar(500) DEFAULT NULL,
  `ciudad_suc_dn` varchar(500) DEFAULT NULL,
  `estado_suc_dn` varchar(500) DEFAULT NULL,
  `direcccion_suc_dn` varchar(500) DEFAULT NULL,
  `email_suc_dn` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_suc_dn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temperatura`
--

DROP TABLE IF EXISTS `temperatura`;
CREATE TABLE IF NOT EXISTS `temperatura` (
  `id_temp_dn` int NOT NULL AUTO_INCREMENT,
  `nombre_temp_dn` varchar(100) DEFAULT NULL,
  `max_temp_dn` float DEFAULT NULL,
  `min_temp_dn` float DEFAULT NULL,
  `fecha_temp_dn` datetime DEFAULT NULL,
  PRIMARY KEY (`id_temp_dn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usu_dn` int NOT NULL AUTO_INCREMENT,
  `email_usu_dn` varchar(500) DEFAULT NULL,
  `passwor_usu_dn` varchar(500) DEFAULT NULL,
  `apellido_usu_dn` varchar(500) DEFAULT NULL,
  `nombre_usu_dn` varchar(500) DEFAULT NULL,
  `perfil_usu_dn` varchar(500) DEFAULT NULL,
  `creacion_usu_dn` datetime DEFAULT CURRENT_TIMESTAMP,
  `actualizacion_usu_dn` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usu_dn`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu_dn`, `email_usu_dn`, `passwor_usu_dn`, `apellido_usu_dn`, `nombre_usu_dn`, `perfil_usu_dn`, `creacion_usu_dn`, `actualizacion_usu_dn`) VALUES
(1, 'dayana27@hotmail.com', '123456', 'Tarco', 'Dayana', 'Administradora', '2023-01-17 22:22:11', '2023-01-17 22:22:11'),
(2, 'natalia21@hotmail.com', '1234', 'espin', 'natalia', 'vulcanologa', '2023-01-17 22:23:03', '2023-01-17 22:23:03');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `situacion`
--
ALTER TABLE `situacion`
  ADD CONSTRAINT `situacion_ibfk_1` FOREIGN KEY (`fk_id_nomvol_dn`) REFERENCES `nomvol` (`id_vol_dn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `situacion_ibfk_2` FOREIGN KEY (`fk_id_alerta_dn`) REFERENCES `alerta` (`id_alert_dn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
