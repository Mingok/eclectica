-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-04-2014 a las 16:41:49
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
CREATE DATABASE IF NOT EXISTS `ecleptica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`idColor`, `detalleColor`) VALUES
(1, 'Negro');

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

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nombreEmpresa`, `dirEmpresa`, `cuitEmpresa`, `telEmpresa`, `emailEmpresa`, `logoEmpresa`) VALUES
(1, 'Eclectica Esperanza1', '', '30699872160', '03496 43-0854', 'eclectica.esperanza@facebook.com', '148125_4987416854210_1949215653_n.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion`
--

CREATE TABLE IF NOT EXISTS `estacion` (
  `idEstacion` int(11) NOT NULL AUTO_INCREMENT,
  `detalleEstacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `estacion`
--

INSERT INTO `estacion` (`idEstacion`, `detalleEstacion`) VALUES
(1, 'Otoño 2014');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estampado`
--

CREATE TABLE IF NOT EXISTS `estampado` (
  `idEstampado` int(11) NOT NULL AUTO_INCREMENT,
  `detalleEstampado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstampado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estampado`
--

INSERT INTO `estampado` (`idEstampado`, `detalleEstampado`) VALUES
(1, 'Flores'),
(2, 'RAYADO'),
(3, 'LUNARES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `detalleMarca` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `detalleMarca`) VALUES
(1, 'Mi MARca'),
(2, 'Mi otra MArca');

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
  `codigoPrenda` varchar(9) NOT NULL,
  `detallePrenda` varchar(100) NOT NULL,
  `idColorPrenda` int(11) NOT NULL,
  `idEstampadoPrenda` int(11) NOT NULL,
  `idTelaPrenda` int(11) NOT NULL,
  `idTallePrenda` int(11) NOT NULL,
  `idEstacionPrenda` int(11) NOT NULL,
  `idEmpresaPrenda` int(11) NOT NULL,
  `idProveedorPrenda` int(11) NOT NULL,
  `idMarcaPrenda` int(11) NOT NULL,
  `cantidadPrenda` int(10) NOT NULL,
  PRIMARY KEY (`idPrenda`),
  KEY `fk_Prenda_Color_idx` (`idColorPrenda`),
  KEY `fk_Prenda_Estampado1_idx` (`idEstampadoPrenda`),
  KEY `fk_Prenda_Tela1_idx` (`idTelaPrenda`),
  KEY `fk_Prenda_Talle1_idx` (`idTallePrenda`),
  KEY `fk_Prenda_Estacion1_idx` (`idEstacionPrenda`),
  KEY `fk_Prenda_Empresa1_idx` (`idEmpresaPrenda`),
  KEY `fk_Prenda_Proveedor1_idx` (`idProveedorPrenda`),
  KEY `fk_Prenda_Marca1_idx` (`idMarcaPrenda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `prenda`
--

INSERT INTO `prenda` (`idPrenda`, `codigoPrenda`, `detallePrenda`, `idColorPrenda`, `idEstampadoPrenda`, `idTelaPrenda`, `idTallePrenda`, `idEstacionPrenda`, `idEmpresaPrenda`, `idProveedorPrenda`, `idMarcaPrenda`, `cantidadPrenda`) VALUES
(11, '', 'Prenda', 1, 2, 8, 1, 1, 1, 2, 2, 10);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombreProveedor`, `cuitProveedor`, `condIvaProveedor`, `direccionProveedor`, `localidadProveedor`, `telefonoProveedor`, `contactoProveedor`, `bancoProveedor`, `cbuProveedor`) VALUES
(1, 'Proveedor 1 ', '30699872160', 'Inscripto', 'una calle me separa 1234', 'Bs As', '0342 - 154426340', 'Chin Chu lin Su', 'Macro', '258965832215993'),
(2, 'Proveedor 1 ', '2147483647', 'Inscripto', 'una calle me separa 1234', 'Bs As', '0342 - 154426340', 'Chin Chu lin Su', 'Macro', '258965832215993');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talle`
--

CREATE TABLE IF NOT EXISTS `talle` (
  `idTalle` int(11) NOT NULL AUTO_INCREMENT,
  `detalleTalle` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `talle`
--

INSERT INTO `talle` (`idTalle`, `detalleTalle`) VALUES
(1, 'xxxL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tela`
--

CREATE TABLE IF NOT EXISTS `tela` (
  `idTela` int(11) NOT NULL AUTO_INCREMENT,
  `detalleTela` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTela`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tela`
--

INSERT INTO `tela` (`idTela`, `detalleTela`) VALUES
(1, 'JEANS'),
(2, 'GABARDINA'),
(3, 'LANA FRIA'),
(4, 'SEDA FRIA'),
(5, 'CLOQUE'),
(6, 'GASA'),
(7, 'RASO'),
(8, 'LANA  ');

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

--
-- Volcado de datos para la tabla `tipoventa`
--

INSERT INTO `tipoventa` (`idTipoVenta`, `detalleTipoVenta`, `grupoTipoVenta`) VALUES
(1, 'Precio 11111', 1),
(2, 'Precio 2', 2),
(3, 'Precio 3', 1),
(4, 'Precio 4', 2),
(5, 'Precio 5', 1),
(6, 'Precio 6', 2);

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
