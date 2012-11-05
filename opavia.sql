-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-11-2012 a las 00:43:48
-- Versión del servidor: 5.5.24
-- Versión de PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `opavia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonos`
--

CREATE TABLE IF NOT EXISTS `abonos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `abono` float NOT NULL DEFAULT '0',
  `saldo` float NOT NULL DEFAULT '0',
  `id_venta` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_abonos_ventas1_idx` (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_articulos`
--

CREATE TABLE IF NOT EXISTS `catalogo_articulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `marca` varchar(150) NOT NULL,
  `modelo` varchar(150) NOT NULL,
  `color` varchar(50) NOT NULL,
  `costo_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `existencia` int(11) NOT NULL,
  `id_linea` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_linea`,`id_proveedor`),
  KEY `fk_catalogo_articulos_catalogo_lineas_idx` (`id_linea`),
  KEY `fk_catalogo_articulos_proveedores1_idx` (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_lineas`
--

CREATE TABLE IF NOT EXISTS `catalogo_lineas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('3b1cef27acc5bb7e12a614490e98471c', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1229.94 Safari/537.4', 1352097583, 'a:7:{s:9:"user_data";s:0:"";s:2:"id";s:1:"1";s:6:"nombre";s:11:"Luis Felipe";s:9:"apellidos";s:6:"Pérez";s:7:"usuario";s:10:"luis.perez";s:6:"activo";s:1:"1";s:4:"tipo";s:1:"0";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `rfc` varchar(18) NOT NULL,
  `limite_credito` float NOT NULL,
  `status` tinyint(4) NOT NULL,
  `fecha_suspension` date NOT NULL,
  `causa_suspension` text NOT NULL,
  `vendedor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones_ip`
--

CREATE TABLE IF NOT EXISTS `direcciones_ip` (
  `ip` varchar(20) NOT NULL,
  `intentos` tinyint(1) NOT NULL,
  `bloqueo` datetime NOT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `direcciones_ip`
--

INSERT INTO `direcciones_ip` (`ip`, `intentos`, `bloqueo`) VALUES
('127.0.0.1', 2, '2012-11-05 00:39:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `graduaciones`
--

CREATE TABLE IF NOT EXISTS `graduaciones` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `od_sph` varchar(5) NOT NULL,
  `od_cyl` varchar(5) NOT NULL,
  `od_axis` varchar(5) NOT NULL,
  `od_add` varchar(5) NOT NULL,
  `oi_sph` varchar(5) NOT NULL,
  `oi_cyl` varchar(5) NOT NULL,
  `oi_axis` varchar(5) NOT NULL,
  `oi_add` varchar(5) NOT NULL,
  `id_cliente` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`id_cliente`),
  KEY `fk_graduaciones_clientes1_idx` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_cortes`
--

CREATE TABLE IF NOT EXISTS `historial_cortes` (
  `fecha` date NOT NULL,
  `monto` float NOT NULL DEFAULT '0',
  `entregas` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fecha`),
  UNIQUE KEY `fecha_UNIQUE` (`fecha`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorios`
--

CREATE TABLE IF NOT EXISTS `laboratorios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(150) NOT NULL,
  `contacto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE IF NOT EXISTS `ordenes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `importe` float NOT NULL DEFAULT '0',
  `fecha_entrega` date DEFAULT NULL,
  `id_graduacion` bigint(20) NOT NULL,
  `id_laboratorio` int(11) NOT NULL,
  `id_ventas` bigint(20) NOT NULL,
  PRIMARY KEY (`id`,`id_graduacion`,`id_laboratorio`),
  KEY `fk_ordenes_graduaciones1_idx` (`id_graduacion`),
  KEY `fk_ordenes_laboratorios1_idx` (`id_laboratorio`),
  KEY `fk_ordenes_ventas1_idx` (`id_ventas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `rfc` varchar(18) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `activo` int(1) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `usuario`, `pass`, `activo`, `tipo`) VALUES
(3, 'Luis Felipe', 'Pérez', 'luis.perez', '1cc4072b832c8f5e57673db2aece66fcae13dc09', 1, 0),
(4, 'Abigail', 'Alcocer Sarabia', 'abigail.alcocer', 'cd70cffd31df54e7c2ed37f8a52510818a1f12f7', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `subtotal` float NOT NULL DEFAULT '0',
  `total` float NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `saldado` tinyint(4) NOT NULL DEFAULT '0',
  `id_cliente` bigint(20) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_cliente`,`id_usuario`),
  KEY `fk_ventas_clientes1_idx` (`id_cliente`),
  KEY `fk_ventas_usuarios1_idx` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_articulos`
--

CREATE TABLE IF NOT EXISTS `ventas_articulos` (
  `id` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `unitario` float NOT NULL DEFAULT '0',
  `total` float NOT NULL DEFAULT '0',
  `id_venta` bigint(20) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ventas_articulos_ventas1_idx` (`id_venta`),
  KEY `fk_ventas_articulos_catalogo_articulos1_idx` (`id_articulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abonos`
--
ALTER TABLE `abonos`
  ADD CONSTRAINT `fk_abonos_ventas1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `catalogo_articulos`
--
ALTER TABLE `catalogo_articulos`
  ADD CONSTRAINT `fk_catalogo_articulos_catalogo_lineas` FOREIGN KEY (`id_linea`) REFERENCES `catalogo_lineas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_catalogo_articulos_proveedores1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `graduaciones`
--
ALTER TABLE `graduaciones`
  ADD CONSTRAINT `fk_graduaciones_clientes1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `fk_ordenes_graduaciones` FOREIGN KEY (`id_graduacion`) REFERENCES `graduaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ordenes_laboratorios` FOREIGN KEY (`id_laboratorio`) REFERENCES `laboratorios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ordenes_ventas` FOREIGN KEY (`id_ventas`) REFERENCES `ventas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_ventas_clientes1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas_articulos`
--
ALTER TABLE `ventas_articulos`
  ADD CONSTRAINT `fk_ventas_articulos_ventas1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_articulos_catalogo_articulos1` FOREIGN KEY (`id_articulo`) REFERENCES `catalogo_articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
