-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-05-2014 a las 10:36:54
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`idColor`, `detalleColor`) VALUES
(1, 'Blanco'),
(2, 'Gris'),
(3, 'GRIS OSCURO'),
(4, 'AZUL FRANCIA'),
(5, 'AZUL MARINO'),
(6, 'ROJO'),
(7, 'BORDO'),
(8, 'VERDE ESMERALDA'),
(9, 'VERDE SECO'),
(10, 'VERDE MUSGO'),
(11, 'VERDE MANZANA'),
(12, 'VERDE AGUA'),
(13, 'VERDE PETROLEO'),
(14, 'AZUL PETROLEO'),
(15, 'ROSA'),
(16, 'NARANJA'),
(17, 'CORAL'),
(18, 'SALMON'),
(19, 'FUXIA'),
(20, 'LACRE'),
(21, 'LADRILLO'),
(22, 'CELESTE'),
(23, 'AZUL OSCURO'),
(24, 'TURQUESA'),
(25, 'CAMEL'),
(26, 'CHOCOLATE'),
(27, 'VISON'),
(28, 'MANTECA'),
(29, 'BEIGE'),
(30, 'TOSTADO'),
(31, 'LILA'),
(32, 'VIOLETA'),
(33, 'AMARILLOo'),
(34, 'MOSTAZA'),
(35, 'FLUO'),
(36, 'DORADO'),
(37, 'PLATEADO'),
(67, 'Negro'),
(68, 'uN cOlOr'),
(69, 'gggg'),
(70, 'a'),
(71, 'z'),
(72, 'zz'),
(73, '2'),
(74, 's'),
(75, 'a'),
(76, 'a'),
(77, '6549');

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
(1, 'Eclectica Esperanza', '', '30699872160', '03496 43-0854', 'asdasdasd', 'logo_nuevo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion`
--

CREATE TABLE IF NOT EXISTS `estacion` (
  `idEstacion` int(11) NOT NULL AUTO_INCREMENT,
  `detalleEstacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `estacion`
--

INSERT INTO `estacion` (`idEstacion`, `detalleEstacion`) VALUES
(1, 'Verano 2014'),
(2, 'Otoño 2014'),
(3, 'Invierno 20142'),
(4, 'Primavera 201422'),
(5, NULL),
(6, NULL),
(7, NULL),
(8, NULL),
(9, NULL),
(10, NULL),
(11, NULL),
(12, NULL),
(13, NULL),
(14, NULL),
(15, NULL),
(16, NULL),
(17, NULL),
(18, NULL),
(19, NULL),
(20, NULL),
(21, NULL),
(22, NULL),
(23, NULL),
(24, NULL),
(25, 'Emma'),
(26, 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estampado`
--

CREATE TABLE IF NOT EXISTS `estampado` (
  `idEstampado` int(11) NOT NULL AUTO_INCREMENT,
  `detalleEstampado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstampado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `estampado`
--

INSERT INTO `estampado` (`idEstampado`, `detalleEstampado`) VALUES
(1, 'RAYADO'),
(2, 'LUNARES'),
(3, 'ANIMAL PRINT'),
(4, 'FLORES'),
(5, 'INCAICO'),
(6, 'BULGARO'),
(7, 'ESCOSES'),
(8, 'BATIK'),
(9, 'DEGRADE'),
(10, 'SUBLIMADO'),
(11, 'BORDADO'),
(12, 'TACHAS'),
(13, 'FLECOS'),
(14, 'animal'),
(15, 'eeee'),
(16, 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `detalleMarca` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `detalleMarca`) VALUES
(1, 'Awada '),
(2, 'Wanama '),
(3, 'Solido'),
(4, 'Nahana'),
(5, 'Cocot'),
(6, 'Selu'),
(7, 'Sweet Victorian'),
(8, 'Peter Pan'),
(9, 'Papillon'),
(10, 'Marcela Koury'),
(11, 'Caro Cuore'),
(12, 'Ag'),
(13, 'Sol y Oro'),
(14, 'Aretha'),
(15, 'a'),
(16, 's'),
(17, 'a'),
(18, 'a'),
(19, '654654');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `apellidoPersona`, `nombrePersona`, `direccionPersona`, `localidadPersona`, `telefonoPersona`, `celuPersona`, `fechaNacPersona`, `facebookPersona`, `dniPersona`, `trabajoPersona`, `telTrabajoPersona`, `cuentaCorrientePersona`, `codigoVendedor`) VALUES
(1, 'Pighin', 'Emmanuel', 'San Martin 998', 'Esperanza', '0396 422709', '0342 154426340', '1982-10-06', 'emmanuel.pighin@facebook.com', '', '', '', 1686.00, NULL),
(2, 'asdasd', 'asdasd', 'asdasd', 'aaaa', 'asdasd', 'asdasd', '2014-05-12', 'asdasd@asdasd.com.ar', '14397643', 'Trabajo!', '032659', 0.00, NULL),
(3, 'Pepe', 'Argento', NULL, '', NULL, '', '0000-00-00', '', '29606595', '', '', 2.00, NULL),
(4, 'Ceruti', 'Andrea', 'Av córdoba 2589', 'Esperanza', '03496 428569', '03496 15442634', '2014-05-28', 'inf@sdasd.com', '36987632', 'Trabajo 1', '654654654', 0.00, NULL),
(5, 'Muller', 'Pamela', 'San Martin 998', 'Esperanza', '03496 422709', '03496 15498563', '1983-05-11', 'pmuller@lalalalala.com.ar', '29996589', 'UNL-Posgrado', '03496 425965', 0.00, NULL),
(6, 'Rosso', 'Cristina', 'denner 737', 'Esperanza', '03496436598', '034215889685', '1990-01-05', 'midireccion@undominio.com.ar', '32589745', '', '', 0.00, '123456');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `prenda`
--

INSERT INTO `prenda` (`idPrenda`, `codigoPrenda`, `detallePrenda`, `cantidadPrenda`, `idColorPrenda`, `idEstampadoPrenda`, `idTelaPrenda`, `idTallePrenda`, `idEstacionPrenda`, `idEmpresaPrenda`, `idProveedorPrenda`, `idMarcaPrenda`) VALUES
(1, '100100800001', 'asdasda[2]', 1, 20, 4, 3, 14, 1, 1, 1, 8),
(2, '100100800002', 'asdasda', 1, 20, 4, 3, 14, 1, 1, 1, 8),
(3, '100100800003', 'asdasda[2][2][2]', 1, 20, 4, 3, 14, 1, 1, 1, 8),
(4, '100100800004', 'asdasda[2][2][2][2]', 1, 20, 4, 3, 14, 1, 1, 1, 8),
(5, '100100800005', 'asdasda[2][2][2][2][2]', 4, 20, 4, 3, 14, 1, 1, 1, 8),
(6, '100100800006', 'asdasda[2][2][2][2][2][2]', 7, 20, 4, 3, 14, 1, 1, 1, 8),
(7, '100100800007', 'asdasda[2][2][2][2][2][2][2]', 19, 20, 4, 3, 14, 1, 1, 1, 8),
(8, '100100800008', 'p1234', 0, 20, 4, 3, 14, 1, 1, 1, 8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombreProveedor`, `cuitProveedor`, `condIvaProveedor`, `direccionProveedor`, `localidadProveedor`, `telefonoProveedor`, `contactoProveedor`, `bancoProveedor`, `cbuProveedor`, `emailProveedor`) VALUES
(1, 'Proveedor', '20296359685', 'Inscripto', 'Domicilio 1234', 'Localidad 1', '03156958', 'Contacto 1', 'Banco 1', '335232168', ''),
(2, 'Ropa al Costo', '30258147363', 'Inscripto', 'Una Calle 2659', 'NO se', '0342-154426340', 'Augusto', 'Macro', '64231326875643', ''),
(3, 'Otro pro', '20296359685', 'Inscripto', 'Domicilio 1234', 'Localidad 1', '03156958', 'Contacto 1', 'Banco 1', '335232168', ''),
(4, 'Ropa al Costo123', '30258147363', 'Inscripto', 'Una Calle 2659', 'NO se', '0342-154426340', 'Augusto', 'Macro', '64231326875643', ''),
(5, '01', '20296359685', 'Inscripto', 'Domicilio 1234', 'Localidad 1', '03156958', 'Contacto 1', 'Banco 1', '335232168', 'eclectica.esperanza@facebook.com'),
(6, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd@mail.com'),
(7, '01', '20296359685', 'Inscripto', 'Domicilio 1234', 'Localidad 1', '03156958', 'Contacto 1', 'Banco 1', '335232168', 'eclectica.esperanza@facebook.com'),
(8, '01', '20296359685', 'Inscripto', 'Domicilio 1234', 'Localidad 1', '03156958', 'Contacto 1', 'Banco 1', '335232168', 'eclectica.esperanza@facebook.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talle`
--

CREATE TABLE IF NOT EXISTS `talle` (
  `idTalle` int(11) NOT NULL AUTO_INCREMENT,
  `detalleTalle` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTalle`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `talle`
--

INSERT INTO `talle` (`idTalle`, `detalleTalle`) VALUES
(1, '34'),
(2, '36'),
(3, '38'),
(4, '40'),
(5, '42'),
(6, '44'),
(7, '46'),
(8, '48'),
(9, '50'),
(10, '52'),
(11, '54'),
(12, '56'),
(13, '58'),
(14, '60'),
(15, '62'),
(16, '64'),
(17, '66'),
(18, '68'),
(19, '70'),
(20, '72'),
(21, '74'),
(22, '76'),
(23, '78'),
(24, '80'),
(25, 'XS'),
(26, 'S'),
(27, 'M'),
(28, 'L'),
(29, 'XL'),
(30, 'XXL'),
(31, 'XXXL'),
(32, 'XXXXL'),
(33, 'd'),
(34, 's'),
(35, 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tela`
--

CREATE TABLE IF NOT EXISTS `tela` (
  `idTela` int(11) NOT NULL AUTO_INCREMENT,
  `detalleTela` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTela`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

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
(8, 'LANA'),
(9, 'HILO'),
(10, 'ENCAJE'),
(11, 'BRODERI'),
(12, 'MODAL'),
(13, 'FLAME'),
(14, 'ACETATO'),
(15, 'FRIZA'),
(16, 'SEDA  '),
(17, 'CHIFON'),
(18, 'TUL'),
(19, 'MECANICA'),
(20, 'BAMBULA'),
(21, 'SARGA'),
(22, 'PAÑO'),
(23, 'VELOUR'),
(24, 'FIBRANA'),
(25, 'ALGODÓN'),
(26, 'PIE DE POOL'),
(27, 'POLIESTER'),
(28, 'TERCIOPELO'),
(29, 'LENTEJUELAS'),
(30, 'ESCOSES'),
(31, 'LINO'),
(32, 'RAYON'),
(33, 'TWOWAY'),
(34, 'POPLIN'),
(35, 'a'),
(36, '2');

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

--
-- Volcado de datos para la tabla `tipoventa`
--

INSERT INTO `tipoventa` (`idTipoVenta`, `detalleTipoVenta`, `grupoTipoVenta`, `porcentajeTipoVenta`, `operacionTipoVenta`) VALUES
(1, 'venta Contado 10 descuento', 1, 10, 1),
(2, 'Precio 2', 3, 5, 2),
(3, 'Precio 3', 1, 10, 2),
(4, 'Venta Contado', 2, 6, 1),
(5, 'Precio 5', 1, 10, 1),
(6, 'Precio 6', 2, 20, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Volcado de datos para la tabla `tipoventa_prenda`
--

INSERT INTO `tipoventa_prenda` (`idTipoVenta_Prenda`, `valor`, `idTipoVenta`, `idPrenda`) VALUES
(1, '2.00', 1, 1),
(2, '2.00', 2, 1),
(3, '2.00', 3, 1),
(4, '2.00', 4, 1),
(5, '2.00', 5, 1),
(6, '2.00', 6, 1),
(7, '5.00', 1, 2),
(8, '5.00', 2, 2),
(9, '5.00', 3, 2),
(10, '5.00', 4, 2),
(11, '5.00', 5, 2),
(12, '5.00', 6, 2),
(13, '3.00', 1, 3),
(14, '3.00', 2, 3),
(15, '3.00', 3, 3),
(16, '3.00', 4, 3),
(17, '3.00', 5, 3),
(18, '3.00', 6, 3),
(19, '3.00', 1, 4),
(20, '3.00', 2, 4),
(21, '3.00', 3, 4),
(22, '3.00', 4, 4),
(23, '3.00', 5, 4),
(24, '3.00', 6, 4),
(25, '6958.55', 1, 5),
(26, '3.00', 2, 5),
(27, '3.00', 3, 5),
(28, '3.00', 4, 5),
(29, '3.00', 5, 5),
(30, '3.00', 6, 5),
(31, '99.99', 1, 6),
(32, '3.00', 2, 6),
(33, '3.00', 3, 6),
(34, '3.00', 4, 6),
(35, '3.00', 5, 6),
(36, '3.00', 6, 6),
(37, '99.99', 1, 7),
(38, '3.00', 2, 7),
(39, '3.00', 3, 7),
(40, '3.00', 4, 7),
(41, '3.00', 5, 7),
(42, '3.00', 6, 7),
(43, '6958.55', 1, 8),
(44, '3.00', 2, 8),
(45, '3.00', 3, 8),
(46, '3.00', 4, 8),
(47, '3.00', 5, 8),
(48, '3.00', 6, 8);

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
