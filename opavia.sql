-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-09-2012 a las 02:41:54
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

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `direccion`, `telefono`, `email`, `rfc`, `limite_credito`, `status`, `fecha_suspension`, `causa_suspension`, `vendedor`) VALUES
(1, 'Benito', 'Camelo', '', '1234567890', 'benito@camelo.com', 'PEPL86', 0, 1, '0000-00-00', '', 0);

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
('127.0.0.1', 6, '2012-09-20 19:00:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lentes`
--

CREATE TABLE IF NOT EXISTS `lentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lentes_intensidad`
--

CREATE TABLE IF NOT EXISTS `lentes_intensidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intensidad` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lentes_material`
--

CREATE TABLE IF NOT EXISTS `lentes_material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `material` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lentes_tinte`
--

CREATE TABLE IF NOT EXISTS `lentes_tinte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tinte` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lentes_tipo`
--

CREATE TABLE IF NOT EXISTS `lentes_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `apellidos`, `direccion`, `telefono`, `email`, `rfc`, `limite_credito`, `status`, `fecha_suspension`, `causa_suspension`) VALUES
(1, 'Jorge', 'Tolosa', '', '1234567890', 'info@tolosabates.com', 'TOBJ830630', 0, 1, '0000-00-00', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `usuario`, `pass`, `activo`, `tipo`) VALUES
(3, 'Luis Felipe', 'Pérez', 'luis.perez', '1cc4072b832c8f5e57673db2aece66fcae13dc09', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
