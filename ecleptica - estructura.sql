-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-04-2014 a las 12:48:45
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `eclectica`
--
CREATE DATABASE IF NOT EXISTS `eclectica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `eclectica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `idColor` int(11) NOT NULL AUTO_INCREMENT,
  `detalleColor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idColor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEmpresa` varchar(45) DEFAULT NULL,
  `dirEmpresa` varchar(50) NOT NULL,
  `cuitEmpresa` varchar(13) NOT NULL,
  `telEmpresa` varchar(20) NOT NULL,
  `emailEmpresa` varchar(100) NOT NULL,
  `logoEmpresa` varchar(200) NOT NULL,
  PRIMARY KEY (`idEmpresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion`
--

CREATE TABLE IF NOT EXISTS `estacion` (
  `idEstacion` int(11) NOT NULL AUTO_INCREMENT,
  `detalleEstacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estampado`
--

CREATE TABLE IF NOT EXISTS `estampado` (
  `idEstampado` int(11) NOT NULL AUTO_INCREMENT,
  `detalleEstampado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstampado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `detalleMarca` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

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
  `codigoPrenda` varchar(12) NOT NULL,
  `detallePrenda` varchar(100) NOT NULL,
  `cantidadPrenda` int(10) NOT NULL,
  `idColorPrenda` int(11) NOT NULL,
  `idEstampadoPrenda` int(11) NOT NULL,
  `idTelaPrenda` int(11) NOT NULL,
  `idTallePrenda` int(11) NOT NULL,
  `idEstacionPrenda` int(11) NOT NULL,
  `idEmpresaPrenda` int(11) NOT NULL,
  `idProveedorPrenda` int(11) NOT NULL,
  `idMarcaPrenda` int(11) NOT NULL,
  PRIMARY KEY (`idPrenda`),
  KEY `fk_Prenda_Color_idx` (`idColorPrenda`),
  KEY `fk_Prenda_Estampado1_idx` (`idEstampadoPrenda`),
  KEY `fk_Prenda_Tela1_idx` (`idTelaPrenda`),
  KEY `fk_Prenda_Talle1_idx` (`idTallePrenda`),
  KEY `fk_Prenda_Estacion1_idx` (`idEstacionPrenda`),
  KEY `fk_Prenda_Empresa1_idx` (`idEmpresaPrenda`),
  KEY `fk_Prenda_Proveedor1_idx` (`idProveedorPrenda`),
  KEY `fk_Prenda_Marca1_idx` (`idMarcaPrenda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `idProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProveedor` varchar(45) DEFAULT NULL,
  `cuitProveedor` varchar(13) NOT NULL,
  `condIvaProveedor` varchar(50) NOT NULL,
  `direccionProveedor` varchar(150) DEFAULT NULL,
  `localidadProveedor` varchar(11) NOT NULL,
  `telefonoProveedor` varchar(45) DEFAULT NULL,
  `contactoProveedor` varchar(100) NOT NULL,
  `bancoProveedor` varchar(100) NOT NULL,
  `cbuProveedor` varchar(100) NOT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talle`
--

CREATE TABLE IF NOT EXISTS `talle` (
  `idTalle` int(11) NOT NULL AUTO_INCREMENT,
  `detalleTalle` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tela`
--

CREATE TABLE IF NOT EXISTS `tela` (
  `idTela` int(11) NOT NULL AUTO_INCREMENT,
  `detalleTela` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTela`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoventa`
--

CREATE TABLE IF NOT EXISTS `tipoventa` (
  `idTipoVenta` int(11) NOT NULL AUTO_INCREMENT,
  `detalleTipoVenta` varchar(45) DEFAULT NULL,
  `grupoTipoVenta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTipoVenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoventa_prenda`
--

CREATE TABLE IF NOT EXISTS `tipoventa_prenda` (
  `idTipoVenta_Prenda` int(11) NOT NULL AUTO_INCREMENT,
  `valor` decimal(2,0) NOT NULL,
  `idTipoVenta` int(11) NOT NULL,
  `idPrenda` int(11) NOT NULL,
  PRIMARY KEY (`idTipoVenta_Prenda`,`idTipoVenta`,`idPrenda`),
  KEY `fk_TipoVent_TipoVenta1_idx` (`idTipoVenta`),
  KEY `fk_TipoVent_Prenda1_idx` (`idPrenda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

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
  ADD CONSTRAINT `fk_Prenda_Color` FOREIGN KEY (`idColorPrenda`) REFERENCES `color` (`idColor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prenda_Empresa1` FOREIGN KEY (`idEmpresaPrenda`) REFERENCES `empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prenda_Estacion1` FOREIGN KEY (`idEstacionPrenda`) REFERENCES `estacion` (`idEstacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prenda_Estampado1` FOREIGN KEY (`idEstampadoPrenda`) REFERENCES `estampado` (`idEstampado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prenda_Marca1` FOREIGN KEY (`idMarcaPrenda`) REFERENCES `marca` (`idMarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prenda_Proveedor1` FOREIGN KEY (`idProveedorPrenda`) REFERENCES `proveedor` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prenda_Talle1` FOREIGN KEY (`idTallePrenda`) REFERENCES `talle` (`idTalle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Prenda_Tela1` FOREIGN KEY (`idTelaPrenda`) REFERENCES `tela` (`idTela`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
