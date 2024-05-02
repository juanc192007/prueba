-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-06-2023 a las 14:14:14
-- Versión del servidor: 10.6.12-MariaDB-cll-lve-log
-- Versión de PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `artecele_elcomerc_i4961864_wp3`
--
CREATE DATABASE IF NOT EXISTS `artecele_elcomerc_i4961864_wp3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `artecele_elcomerc_i4961864_wp3`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `activa` int(2) NOT NULL,
  `fec_creacion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `descripcion`, `activa`, `fec_creacion`) VALUES
(1, 'Sonido', 1, '2020-07-16'),
(2, 'Ropa Deportiva', 1, '0000-00-00'),
(3, 'jeans', 1, '2020-07-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_marca`
--

DROP TABLE IF EXISTS `categoria_marca`;
CREATE TABLE IF NOT EXISTS `categoria_marca` (
  `id_categoria` int(10) NOT NULL,
  `id_marca` int(10) NOT NULL,
  `activo` int(1) NOT NULL,
  `posicion` int(1) NOT NULL,
  `fec_creacion` date NOT NULL,
  PRIMARY KEY (`id_categoria`,`id_marca`) USING BTREE,
  KEY `id_marca` (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categoria_marca`
--

INSERT INTO `categoria_marca` (`id_categoria`, `id_marca`, `activo`, `posicion`, `fec_creacion`) VALUES
(1, 3, 1, 0, '2020-07-17'),
(2, 1, 1, 0, '2020-07-23'),
(2, 2, 1, 0, '2020-07-17'),
(3, 2, 1, 0, '2020-07-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_comercial`
--

DROP TABLE IF EXISTS `centro_comercial`;
CREATE TABLE IF NOT EXISTS `centro_comercial` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `activo` int(1) NOT NULL,
  `fec_creacion` date NOT NULL,
  `posicion` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `centro_comercial`
--

INSERT INTO `centro_comercial` (`id`, `descripcion`, `direccion`, `activo`, `fec_creacion`, `posicion`) VALUES
(1, 'El pasaje Cali', 'cra 9 #13-91', 1, '2020-07-19', 1),
(2, 'Centro Comercial Taiwan', 'Cra 9 #13A-24', 1, '2020-07-19', 2),
(3, 'Centro Comercial La Fortuna', 'Esquina Calle 14 Carrera 5', 1, '2020-07-17', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `activo` int(1) NOT NULL,
  `fec_creacion` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `descripcion`, `activo`, `fec_creacion`) VALUES
(1, 'hitees', 1, '2020-07-19'),
(2, 'Miila', 1, '2020-07-19'),
(3, 'niatec', 1, '2020-07-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoccali`
--

DROP TABLE IF EXISTS `productoccali`;
CREATE TABLE IF NOT EXISTS `productoccali` (
  `id` int(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` varchar(10) NOT NULL,
  `referencia` varchar(10) NOT NULL,
  `activo` int(2) NOT NULL,
  `palabra_clave` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productoccali`
--

INSERT INTO `productoccali` (`id`, `descripcion`, `precio`, `referencia`, `activo`, `palabra_clave`) VALUES
(1, 'Jean dama', '10000', '041306', 1, 'jeans,jean,pantalon,pantalones,jean dama,pantalon dama,jeans dama,jean mujer,jeans mujeres,pantalon mujer,pantalon dama'),
(2, 'Lycar deportiva', '50000', '310033', 1, 'licra,lycra,deportivo,deporte,ropa deportiva'),
(3, 'Parlante JBK411', '90000', 'JBK411', 1, 'parlante,bafle,sonido,cabina,parlantes,balfles,cabina de sonido'),
(4, 'Jean dama', '79900', '041304', 1, ''),
(5, 'Lycar deportiva', '79900', '310031', 1, ''),
(6, 'Cabina sonido TMAX 1068', '127000', 'TMAX-1068', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_categoria`
--

DROP TABLE IF EXISTS `producto_categoria`;
CREATE TABLE IF NOT EXISTS `producto_categoria` (
  `id_producto` int(10) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `activo` int(1) NOT NULL,
  `fec_creacion` date NOT NULL,
  PRIMARY KEY (`id_producto`,`id_categoria`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `producto_categoria`
--

INSERT INTO `producto_categoria` (`id_producto`, `id_categoria`, `activo`, `fec_creacion`) VALUES
(1, 3, 1, '2020-07-23'),
(2, 2, 1, '2020-07-17'),
(3, 1, 1, '2020-07-17'),
(4, 3, 1, '2020-07-23'),
(5, 2, 1, '2020-07-23'),
(6, 1, 1, '2020-07-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_tienda`
--

DROP TABLE IF EXISTS `producto_tienda`;
CREATE TABLE IF NOT EXISTS `producto_tienda` (
  `id_producto` int(10) NOT NULL,
  `id_tienda` int(10) NOT NULL,
  `activo` int(1) NOT NULL,
  `fec_creacion` date NOT NULL,
  PRIMARY KEY (`id_tienda`,`id_producto`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_tienda`
--

INSERT INTO `producto_tienda` (`id_producto`, `id_tienda`, `activo`, `fec_creacion`) VALUES
(3, 1, 1, '2020-07-17'),
(2, 2, 1, '2020-07-17'),
(1, 9, 1, '2020-07-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendaccali`
--

DROP TABLE IF EXISTS `tiendaccali`;
CREATE TABLE IF NOT EXISTS `tiendaccali` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `posicion` int(10) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `activa` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tiendaccali`
--

INSERT INTO `tiendaccali` (`id`, `descripcion`, `url`, `posicion`, `logo`, `activa`) VALUES
(1, 'Ventas El comercio de Cali', 'https://ventas.elcomerciodecali.com.co', 1, 'https://elcomerciodecali.com.co/img/clients/vCc.png', 1),
(2, 'Hitees', 'https://hitees.co', 2, 'https://elcomerciodecali.com.co/img/clients/hitees.png', 1),
(3, 'Masajes y Spa NB', 'https://masajesyspaNB.elcomerciodecali.com.co/', 4, 'no-imagen.jpg', 1),
(4, 'InFocus', '', 5, 'no-imagen.jpg', 1),
(5, 'GateGroup', '', 6, 'no-imagen.jpg', 1),
(6, 'Cadent', '', 7, 'no-imagen.jpg', 1),
(7, 'Ceph', '', 8, 'no-imagen.jpg', 1),
(8, 'Alitalia', '', 9, 'no-imagen.jpg', 1),
(9, 'Miila', 'https://miilafashion.com.co', 3, 'https://elcomerciodecali.com.co/img/clients/LOGOMIILAWEB.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_categoria`
--

DROP TABLE IF EXISTS `tienda_categoria`;
CREATE TABLE IF NOT EXISTS `tienda_categoria` (
  `id_tienda` int(10) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `activo` int(1) NOT NULL,
  `fec_creacion` date NOT NULL,
  PRIMARY KEY (`id_categoria`,`id_tienda`),
  KEY `id_tienda` (`id_tienda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tienda_categoria`
--

INSERT INTO `tienda_categoria` (`id_tienda`, `id_categoria`, `activo`, `fec_creacion`) VALUES
(1, 1, 1, '2020-07-17'),
(1, 2, 1, '2020-07-17'),
(2, 2, 1, '2020-07-17'),
(9, 3, 1, '2020-07-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_ccomercial`
--

DROP TABLE IF EXISTS `tienda_ccomercial`;
CREATE TABLE IF NOT EXISTS `tienda_ccomercial` (
  `id_tienda` int(10) NOT NULL,
  `id_ccomercial` int(10) NOT NULL,
  `activo` int(1) NOT NULL,
  `posicion` int(1) NOT NULL,
  `fec_creacion` date NOT NULL,
  PRIMARY KEY (`id_tienda`,`id_ccomercial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tienda_ccomercial`
--

INSERT INTO `tienda_ccomercial` (`id_tienda`, `id_ccomercial`, `activo`, `posicion`, `fec_creacion`) VALUES
(1, 1, 1, 1, '2020-07-17'),
(2, 2, 1, 1, '2020-07-23'),
(3, 3, 1, 1, '2020-07-17'),
(9, 2, 1, 1, '2020-07-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_marca`
--

DROP TABLE IF EXISTS `tienda_marca`;
CREATE TABLE IF NOT EXISTS `tienda_marca` (
  `id_tienda` int(10) NOT NULL,
  `id_marca` int(10) NOT NULL,
  `activo` int(10) NOT NULL,
  `fec_creacion` date NOT NULL,
  PRIMARY KEY (`id_tienda`,`id_marca`),
  KEY `id_marca` (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tienda_marca`
--

INSERT INTO `tienda_marca` (`id_tienda`, `id_marca`, `activo`, `fec_creacion`) VALUES
(1, 3, 1, '2020-07-19'),
(2, 1, 1, '2020-07-17'),
(9, 2, 1, '2020-07-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_video`
--

DROP TABLE IF EXISTS `tienda_video`;
CREATE TABLE IF NOT EXISTS `tienda_video` (
  `id` int(10) NOT NULL,
  `id_tienda` int(10) NOT NULL,
  `desc_video` varchar(100) NOT NULL,
  `activo` int(1) NOT NULL,
  `fec_creacion` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tienda` (`id_tienda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tienda_video`
--

INSERT INTO `tienda_video` (`id`, `id_tienda`, `desc_video`, `activo`, `fec_creacion`) VALUES
(1, 1, '1-home.webm', 1, '2020-07-17'),
(2, 2, '2-home.webm', 1, '2020-07-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `usuario`, `password`) VALUES
(1, 'juan', 'zuluaga', 'jczm9680', '25f9e794323b453885f5181f1b624d0b'),
(2, 'pablo', 'gomez', 'pg9680', '25f9e794323b453885f5181f1b624d0b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tiendaccali`
--

DROP TABLE IF EXISTS `usuario_tiendaccali`;
CREATE TABLE IF NOT EXISTS `usuario_tiendaccali` (
  `id_usuario` int(11) NOT NULL,
  `id_tiendaccali` int(10) NOT NULL,
  `activo` int(1) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_tiendaccali`),
  KEY `id_tiendaccali` (`id_tiendaccali`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_tiendaccali`
--

INSERT INTO `usuario_tiendaccali` (`id_usuario`, `id_tiendaccali`, `activo`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(2, 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria_marca`
--
ALTER TABLE `categoria_marca`
  ADD CONSTRAINT `categoria_marca_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `categoria_marca_ibfk_2` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`);

--
-- Filtros para la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  ADD CONSTRAINT `producto_categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `producto_categoria_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productoccali` (`id`);

--
-- Filtros para la tabla `producto_tienda`
--
ALTER TABLE `producto_tienda`
  ADD CONSTRAINT `producto_tienda_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productoccali` (`id`),
  ADD CONSTRAINT `producto_tienda_ibfk_2` FOREIGN KEY (`id_tienda`) REFERENCES `tiendaccali` (`id`),
  ADD CONSTRAINT `producto_tienda_ibfk_3` FOREIGN KEY (`id_tienda`) REFERENCES `tiendaccali` (`id`);

--
-- Filtros para la tabla `tienda_categoria`
--
ALTER TABLE `tienda_categoria`
  ADD CONSTRAINT `tienda_categoria_ibfk_1` FOREIGN KEY (`id_tienda`) REFERENCES `tiendaccali` (`id`),
  ADD CONSTRAINT `tienda_categoria_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `tienda_ccomercial`
--
ALTER TABLE `tienda_ccomercial`
  ADD CONSTRAINT `tienda_ccomercial_ibfk_1` FOREIGN KEY (`id_ccomercial`) REFERENCES `centro_comercial` (`id`),
  ADD CONSTRAINT `tienda_ccomercial_ibfk_2` FOREIGN KEY (`id_tienda`) REFERENCES `tiendaccali` (`id`);

--
-- Filtros para la tabla `tienda_marca`
--
ALTER TABLE `tienda_marca`
  ADD CONSTRAINT `tienda_marca_ibfk_1` FOREIGN KEY (`id_tienda`) REFERENCES `tiendaccali` (`id`),
  ADD CONSTRAINT `tienda_marca_ibfk_2` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`);

--
-- Filtros para la tabla `tienda_video`
--
ALTER TABLE `tienda_video`
  ADD CONSTRAINT `tienda_video_ibfk_1` FOREIGN KEY (`id_tienda`) REFERENCES `tiendaccali` (`id`);

--
-- Filtros para la tabla `usuario_tiendaccali`
--
ALTER TABLE `usuario_tiendaccali`
  ADD CONSTRAINT `usuario_tiendaccali_ibfk_1` FOREIGN KEY (`id_tiendaccali`) REFERENCES `tiendaccali` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

GRANT ALL PRIVILEGES ON *.* TO `root`@`localhost` WITH GRANT OPTION;

GRANT ALL PRIVILEGES ON `artecele\_elcomerc\_i4961864\_wp3`.* TO `root`@`localhost` WITH GRANT OPTION;

-- GRANT ALL PRIVILEGES ON `artecele_elcomerc_i4961864_wp3`.* TO `root`@`localhost` WITH GRANT OPTION;

GRANT PROXY ON ''@'%' TO 'root'@'localhost' WITH GRANT OPTION;