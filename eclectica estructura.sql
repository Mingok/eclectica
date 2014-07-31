-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-07-2014 a las 22:34:41
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

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
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE IF NOT EXISTS `entrega` (
  `idEntrega` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `idVendedor` int(11) DEFAULT NULL,
  `valorEntrega` double NOT NULL,
  `fechaEntrega` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `inicial` varchar(1) NOT NULL,
  PRIMARY KEY (`idEntrega`),
  KEY `fk_Entrega_Persona1_idx` (`idCliente`),
  KEY `fk_Entrega_Persona2_idx` (`idVendedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `detalleMarca` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `apellidoPersona` varchar(100) DEFAULT NULL,
  `nombrePersona` varchar(45) DEFAULT NULL,
  `direccionPersona` varchar(45) DEFAULT NULL,
  `localidadPersona` varchar(45) NOT NULL,
  `telefonoPersona` varchar(45) DEFAULT NULL,
  `celuPersona` varchar(45) NOT NULL,
  `fechaNacPersona` date NOT NULL,
  `facebookPersona` varchar(100) NOT NULL,
  `dniPersona` varchar(10) NOT NULL,
  `trabajoPersona` varchar(100) NOT NULL,
  `telTrabajoPersona` varchar(20) NOT NULL,
  `cuentaCorrientePersona` float(6,2) NOT NULL,
  `codigoVendedor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=184 ;

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
  `emailProveedor` varchar(100) NOT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talle`
--

CREATE TABLE IF NOT EXISTS `talle` (
  `idTalle` int(11) NOT NULL AUTO_INCREMENT,
  `detalleTalle` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tela`
--

CREATE TABLE IF NOT EXISTS `tela` (
  `idTela` int(11) NOT NULL AUTO_INCREMENT,
  `detalleTela` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTela`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoventa`
--

CREATE TABLE IF NOT EXISTS `tipoventa` (
  `idTipoVenta` int(11) NOT NULL AUTO_INCREMENT,
  `detalleTipoVenta` varchar(45) DEFAULT NULL,
  `grupoTipoVenta` int(11) DEFAULT NULL,
  `porcentajeTipoVenta` int(2) NOT NULL,
  `operacionTipoVenta` int(1) NOT NULL,
  PRIMARY KEY (`idTipoVenta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoventa_prenda`
--

CREATE TABLE IF NOT EXISTS `tipoventa_prenda` (
  `idTipoVenta_Prenda` int(11) NOT NULL AUTO_INCREMENT,
  `valor` decimal(6,2) NOT NULL,
  `idTipoVenta` int(11) NOT NULL,
  `idPrenda` int(11) NOT NULL,
  PRIMARY KEY (`idTipoVenta_Prenda`,`idTipoVenta`,`idPrenda`),
  KEY `fk_TipoVent_TipoVenta1_idx` (`idTipoVenta`),
  KEY `fk_TipoVent_Prenda1_idx` (`idPrenda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1099 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `idVendedor` int(11) NOT NULL,
  `precioVenta` double NOT NULL,
  `entregaCliente` double NOT NULL,
  `fechaVenta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idVenta`),
  KEY `fk_Venta_Persona1_idx` (`idCliente`),
  KEY `fk_Venta_Persona2_idx` (`idVendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_renglon`
--

CREATE TABLE IF NOT EXISTS `venta_renglon` (
  `idVentaRenglon` int(11) NOT NULL AUTO_INCREMENT,
  `idVenta` int(11) NOT NULL,
  `idPrenda` int(11) NOT NULL,
  `cantidadPrenda` int(11) NOT NULL,
  `idTipoVenta` int(11) NOT NULL,
  `precioVendido` double NOT NULL,
  PRIMARY KEY (`idVentaRenglon`),
  KEY `fk_Venta_Renglon1_idx` (`idVenta`),
  KEY `fk_Venta_Renglon2_idx` (`idPrenda`),
  KEY `fk_Venta_Renglon3_idx` (`idTipoVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `fk_Entrega_Persona1` FOREIGN KEY (`idCliente`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Entrega_Persona2` FOREIGN KEY (`idVendedor`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_Venta_Persona1` FOREIGN KEY (`idCliente`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_Persona2` FOREIGN KEY (`idVendedor`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `venta_renglon`
--
ALTER TABLE `venta_renglon`
  ADD CONSTRAINT `fk_Venta_Renglon1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_Renglon2` FOREIGN KEY (`idPrenda`) REFERENCES `prenda` (`idPrenda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_Renglon3` FOREIGN KEY (`idTipoVenta`) REFERENCES `tipoventa` (`idTipoVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
