-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-03-2014 a las 10:41:04
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ecleptica`
--
CREATE DATABASE IF NOT EXISTS `ecleptica` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ecleptica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `idColor` int(11) NOT NULL AUTO_INCREMENT,
  `detalleColor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idColor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `detalleEmpresa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEmpresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion`
--

CREATE TABLE IF NOT EXISTS `estacion` (
  `idEstacion` int(11) NOT NULL AUTO_INCREMENT,
  `detalleEstacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estampado`
--

CREATE TABLE IF NOT EXISTS `estampado` (
  `idEstampado` int(11) NOT NULL AUTO_INCREMENT,
  `detalleEstampado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstampado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `detalleMarca` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(100) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `codigoVendedor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prenda`
--

CREATE TABLE IF NOT EXISTS `prenda` (
  `idPrenda` int(11) NOT NULL AUTO_INCREMENT,
  `detallePrenda` varchar(100) NOT NULL,
  `idColor` int(11) NOT NULL,
  `idEstampado` int(11) NOT NULL,
  `idTela` int(11) NOT NULL,
  `idTalle` int(11) NOT NULL,
  `idEstacion` int(11) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `idMarca` int(11) NOT NULL,
  PRIMARY KEY (`idPrenda`),
  KEY `fk_Prenda_Color_idx` (`idColor`),
  KEY `fk_Prenda_Estampado1_idx` (`idEstampado`),
  KEY `fk_Prenda_Tela1_idx` (`idTela`),
  KEY `fk_Prenda_Talle1_idx` (`idTalle`),
  KEY `fk_Prenda_Estacion1_idx` (`idEstacion`),
  KEY `fk_Prenda_Empresa1_idx` (`idEmpresa`),
  KEY `fk_Prenda_Proveedor1_idx` (`idProveedor`),
  KEY `fk_Prenda_Marca1_idx` (`idMarca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `idProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProveedor` varchar(45) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talle`
--

CREATE TABLE IF NOT EXISTS `talle` (
  `idTalle` int(11) NOT NULL AUTO_INCREMENT,
  `detalleTalle` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tela`
--

CREATE TABLE IF NOT EXISTS `tela` (
  `idTela` int(11) NOT NULL AUTO_INCREMENT,
  `detalleTela` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTela`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoventa`
--

CREATE TABLE IF NOT EXISTS `tipoventa` (
  `idTipoVenta` int(11) NOT NULL AUTO_INCREMENT,
  `detalleTipoVenta` varchar(45) DEFAULT NULL,
  `grupoTipoVenta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTipoVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoventa_prenda`
--

CREATE TABLE IF NOT EXISTS `tipoventa_prenda` (
  `idTipoVenta_Prenda` int(11) NOT NULL AUTO_INCREMENT,
  `detalleTipoVenta_Prenda` varchar(45) NOT NULL,
  `valor` decimal(2,0) NOT NULL,
  `idTipoVenta` int(11) NOT NULL,
  `idPrenda` int(11) NOT NULL,
  PRIMARY KEY (`idTipoVenta_Prenda`,`idTipoVenta`,`idPrenda`),
  KEY `fk_TipoVent_TipoVenta1_idx` (`idTipoVenta`),
  KEY `fk_TipoVent_Prenda1_idx` (`idPrenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) DEFAULT NULL,
  `cliente` int(11) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `idPrenda` int(11) NOT NULL,
  `precioVenta` double NOT NULL,
  `idTipoVenta` int(11) NOT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `fk_Venta_Persona1_idx` (`cliente`),
  KEY `fk_Venta_Persona2_idx` (`vendedor`),
  KEY `fk_Venta_Prenda1_idx` (`idPrenda`),
  KEY `fk_Venta_TipoVenta_Prenda1_idx` (`idTipoVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prenda`
--
ALTER TABLE `prenda`
  ADD CONSTRAINT `fk_Prenda_Color` FOREIGN KEY (`idColor`) REFERENCES `color` (`idColor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prenda_Empresa1` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prenda_Estacion1` FOREIGN KEY (`idEstacion`) REFERENCES `estacion` (`idEstacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prenda_Estampado1` FOREIGN KEY (`idEstampado`) REFERENCES `estampado` (`idEstampado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prenda_Marca1` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prenda_Proveedor1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prenda_Talle1` FOREIGN KEY (`idTalle`) REFERENCES `talle` (`idTalle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prenda_Tela1` FOREIGN KEY (`idTela`) REFERENCES `tela` (`idTela`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipoventa_prenda`
--
ALTER TABLE `tipoventa_prenda`
  ADD CONSTRAINT `fk_TipoVent_Prenda1` FOREIGN KEY (`idPrenda`) REFERENCES `prenda` (`idPrenda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TipoVent_TipoVenta1` FOREIGN KEY (`idTipoVenta`) REFERENCES `tipoventa` (`idTipoVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `fk_Venta_Persona1` FOREIGN KEY (`cliente`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_Persona2` FOREIGN KEY (`vendedor`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_Prenda1` FOREIGN KEY (`idPrenda`) REFERENCES `prenda` (`idPrenda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_TipoVenta_Prenda1` FOREIGN KEY (`idTipoVenta`) REFERENCES `tipoventa_prenda` (`idTipoVenta_Prenda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
