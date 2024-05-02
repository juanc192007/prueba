-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-08-2020 a las 13:21:55
-- Versión del servidor: 10.2.31-MariaDB-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `elcomerc_i4961864_wp3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `activa` int(2) NOT NULL,
  `fec_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `categoria_marca` (
  `id` int(10) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `id_marca` int(10) NOT NULL,
  `activo` int(1) NOT NULL,
  `posicion` int(1) NOT NULL,
  `fec_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_marca`
--

INSERT INTO `categoria_marca` (`id`, `id_categoria`, `id_marca`, `activo`, `posicion`, `fec_creacion`) VALUES
(1, 3, 2, 1, 0, '2020-07-17'),
(2, 2, 1, 1, 0, '2020-07-23'),
(3, 1, 3, 1, 0, '2020-07-17'),
(4, 2, 2, 1, 0, '2020-07-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_comercial`
--

CREATE TABLE `centro_comercial` (
  `id` int(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `activo` int(1) NOT NULL,
  `fec_creacion` date NOT NULL,
  `posicion` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `marca` (
  `id` int(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `activo` int(1) NOT NULL,
  `fec_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `descripcion`, `activo`, `fec_creacion`) VALUES
(1, 'hitees', 1, '2020-07-19'),
(2, 'Miila', 1, '2020-07-19'),
(3, 'niatec', 1, '2020-07-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoCcali`
--

CREATE TABLE `productoCcali` (
  `id` int(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` varchar(10) NOT NULL,
  `referencia` varchar(10) NOT NULL,
  `activo` int(2) NOT NULL,
  `palabra_clave` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productoCcali`
--

INSERT INTO `productoCcali` (`id`, `descripcion`, `precio`, `referencia`, `activo`, `palabra_clave`) VALUES
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

CREATE TABLE `producto_categoria` (
  `id` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `activo` int(1) NOT NULL,
  `fec_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto_categoria`
--

INSERT INTO `producto_categoria` (`id`, `id_producto`, `id_categoria`, `activo`, `fec_creacion`) VALUES
(1, 1, 3, 1, '2020-07-23'),
(2, 4, 3, 1, '2020-07-23'),
(3, 2, 2, 1, '2020-07-17'),
(4, 5, 2, 1, '2020-07-23'),
(5, 3, 1, 1, '2020-07-17'),
(6, 6, 1, 1, '2020-07-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_tienda`
--

CREATE TABLE `producto_tienda` (
  `id` int(10) NOT NULL,
  `id_producto` int(10) NOT NULL,
  `id_tienda` int(10) NOT NULL,
  `activo` int(1) NOT NULL,
  `fec_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto_tienda`
--

INSERT INTO `producto_tienda` (`id`, `id_producto`, `id_tienda`, `activo`, `fec_creacion`) VALUES
(1, 1, 9, 1, '2020-07-17'),
(2, 2, 2, 1, '2020-07-17'),
(3, 3, 1, 1, '2020-07-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendaCcali`
--

CREATE TABLE `tiendaCcali` (
  `id` int(10) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posicion` int(10) DEFAULT NULL,
  `logo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activa` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tiendaCcali`
--

INSERT INTO `tiendaCcali` (`id`, `descripcion`, `url`, `posicion`, `logo`, `activa`) VALUES
(1, 'Ventas El comercio de Cali', 'https://ventas.elcomerciodecali.com.co', 1, 'vCc.png', 1),
(2, 'Hitees', 'https://hitees.co', 2, 'hitees.png', 1),
(3, 'Masajes y Spa NB', 'https://masajesyspaNB.elcomerciodecali.com.co/', 4, 'no-imagen.jpg', 1),
(4, 'InFocus', '', 5, 'no-imagen.jpg', 1),
(5, 'GateGroup', '', 6, 'no-imagen.jpg', 1),
(6, 'Cadent', '', 7, 'no-imagen.jpg', 1),
(7, 'Ceph', '', 8, 'no-imagen.jpg', 1),
(8, 'Alitalia', '', 9, 'no-imagen.jpg', 1),
(9, 'Miila', 'https://miilafashion.com.co', 3, 'LOGOMIILAWEB.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_categoria`
--

CREATE TABLE `tienda_categoria` (
  `id` int(10) NOT NULL,
  `id_tienda` int(10) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `activo` int(1) NOT NULL,
  `fec_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tienda_categoria`
--

INSERT INTO `tienda_categoria` (`id`, `id_tienda`, `id_categoria`, `activo`, `fec_creacion`) VALUES
(1, 1, 1, 1, '2020-07-17'),
(2, 2, 2, 1, '2020-07-17'),
(3, 9, 3, 1, '2020-07-17'),
(4, 1, 2, 1, '2020-07-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_ccomercial`
--

CREATE TABLE `tienda_ccomercial` (
  `id` int(10) NOT NULL,
  `id_tienda` int(10) NOT NULL,
  `id_ccomercial` int(10) NOT NULL,
  `activo` int(1) NOT NULL,
  `posicion` int(1) NOT NULL,
  `fec_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tienda_ccomercial`
--

INSERT INTO `tienda_ccomercial` (`id`, `id_tienda`, `id_ccomercial`, `activo`, `posicion`, `fec_creacion`) VALUES
(1, 1, 1, 1, 1, '2020-07-17'),
(2, 2, 2, 1, 1, '2020-07-23'),
(3, 3, 3, 1, 1, '2020-07-17'),
(4, 9, 2, 1, 1, '2020-07-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_marca`
--

CREATE TABLE `tienda_marca` (
  `id` int(10) NOT NULL,
  `id_tienda` int(10) NOT NULL,
  `id_marca` int(10) NOT NULL,
  `activo` int(10) NOT NULL,
  `fec_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tienda_marca`
--

INSERT INTO `tienda_marca` (`id`, `id_tienda`, `id_marca`, `activo`, `fec_creacion`) VALUES
(1, 1, 3, 1, '2020-07-19'),
(2, 2, 1, 1, '2020-07-17'),
(3, 9, 2, 1, '2020-07-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda_video`
--

CREATE TABLE `tienda_video` (
  `id` int(10) NOT NULL,
  `id_tienda` int(10) NOT NULL,
  `desc_video` varchar(100) NOT NULL,
  `activo` int(1) NOT NULL,
  `fec_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tienda_video`
--

INSERT INTO `tienda_video` (`id`, `id_tienda`, `desc_video`, `activo`, `fec_creacion`) VALUES
(1, 1, '1-home.webm', 1, '2020-07-17'),
(2, 2, '2-home.webm', 1, '2020-07-17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_marca`
--
ALTER TABLE `categoria_marca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `centro_comercial`
--
ALTER TABLE `centro_comercial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productoCcali`
--
ALTER TABLE `productoCcali`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referencia` (`referencia`),
  ADD KEY `descripcion` (`descripcion`);

--
-- Indices de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `producto_tienda`
--
ALTER TABLE `producto_tienda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `producto_tienda_ibfk_2` (`id_tienda`);

--
-- Indices de la tabla `tiendaCcali`
--
ALTER TABLE `tiendaCcali`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tienda_categoria`
--
ALTER TABLE `tienda_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tienda` (`id_tienda`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `tienda_ccomercial`
--
ALTER TABLE `tienda_ccomercial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tienda` (`id_tienda`),
  ADD KEY `id_ccomercial` (`id_ccomercial`);

--
-- Indices de la tabla `tienda_marca`
--
ALTER TABLE `tienda_marca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tienda` (`id_tienda`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `tienda_video`
--
ALTER TABLE `tienda_video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tienda` (`id_tienda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categoria_marca`
--
ALTER TABLE `categoria_marca`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `centro_comercial`
--
ALTER TABLE `centro_comercial`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productoCcali`
--
ALTER TABLE `productoCcali`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto_categoria`
--
ALTER TABLE `producto_categoria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto_tienda`
--
ALTER TABLE `producto_tienda`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tienda_categoria`
--
ALTER TABLE `tienda_categoria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tienda_ccomercial`
--
ALTER TABLE `tienda_ccomercial`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tienda_marca`
--
ALTER TABLE `tienda_marca`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tienda_video`
--
ALTER TABLE `tienda_video`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `producto_categoria_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productoCcali` (`id`),
  ADD CONSTRAINT `producto_categoria_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `producto_tienda`
--
ALTER TABLE `producto_tienda`
  ADD CONSTRAINT `producto_tienda_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productoCcali` (`id`),
  ADD CONSTRAINT `producto_tienda_ibfk_2` FOREIGN KEY (`id_tienda`) REFERENCES `tiendaCcali` (`id`);

--
-- Filtros para la tabla `tienda_categoria`
--
ALTER TABLE `tienda_categoria`
  ADD CONSTRAINT `tienda_categoria_ibfk_1` FOREIGN KEY (`id_tienda`) REFERENCES `tiendaCcali` (`id`),
  ADD CONSTRAINT `tienda_categoria_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `tienda_ccomercial`
--
ALTER TABLE `tienda_ccomercial`
  ADD CONSTRAINT `tienda_ccomercial_ibfk_1` FOREIGN KEY (`id_tienda`) REFERENCES `tiendaCcali` (`id`),
  ADD CONSTRAINT `tienda_ccomercial_ibfk_2` FOREIGN KEY (`id_ccomercial`) REFERENCES `centro_comercial` (`id`);

--
-- Filtros para la tabla `tienda_marca`
--
ALTER TABLE `tienda_marca`
  ADD CONSTRAINT `tienda_marca_ibfk_1` FOREIGN KEY (`id_tienda`) REFERENCES `tiendaCcali` (`id`),
  ADD CONSTRAINT `tienda_marca_ibfk_2` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`);

--
-- Filtros para la tabla `tienda_video`
--
ALTER TABLE `tienda_video`
  ADD CONSTRAINT `tienda_video_ibfk_1` FOREIGN KEY (`id_tienda`) REFERENCES `tiendaCcali` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
