-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-04-2014 a las 10:14:08
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
(33, 'AMARILLO'),
(34, 'MOSTAZA'),
(35, 'FLUO'),
(36, 'DORADO'),
(37, 'PLATEADO'),
(67, 'Negro'),
(68, 'uN cOlOr');

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nombreEmpresa`, `dirEmpresa`, `cuitEmpresa`, `telEmpresa`, `emailEmpresa`, `logoEmpresa`) VALUES
(1, 'Eclectica Esperanza1', '', '30699872160', '03496 43-0854', 'eclectica.esperanza@facebook.com', 'CAM00045.jpg');

--
-- Volcado de datos para la tabla `estacion`
--

INSERT INTO `estacion` (`idEstacion`, `detalleEstacion`) VALUES
(1, 'Verano 2014'),
(2, 'Otoño 2014'),
(3, 'Invierno 2014'),
(4, 'Primavera 2014');

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
(14, 'animal');

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
(15, 'a');

--
-- Volcado de datos para la tabla `prenda`
--

INSERT INTO `prenda` (`idPrenda`, `codigoPrenda`, `detallePrenda`, `cantidadPrenda`, `idColorPrenda`, `idEstampadoPrenda`, `idTelaPrenda`, `idTallePrenda`, `idEstacionPrenda`, `idEmpresaPrenda`, `idProveedorPrenda`, `idMarcaPrenda`) VALUES
(1, '100100800001', 'asdasda[2]', 1, 20, 4, 3, 14, 1, 1, 1, 8),
(2, '100100800002', 'asdasda', 1, 20, 4, 3, 14, 1, 1, 1, 8),
(3, '100100800003', 'asdasda[2][2][2]', 1, 20, 4, 3, 14, 1, 1, 1, 8),
(4, '100100800004', 'asdasda[2][2][2][2]', 1, 20, 4, 3, 14, 1, 1, 1, 8),
(5, '100100800005', 'asdasda[2][2][2][2][2]', 12, 20, 4, 3, 14, 1, 1, 1, 8),
(6, '100100800006', 'asdasda[2][2][2][2][2][2]', 7, 20, 4, 3, 14, 1, 1, 1, 8),
(7, '100100800007', 'asdasda[2][2][2][2][2][2][2]', 7, 20, 4, 3, 14, 1, 1, 1, 8),
(8, '100100800008', 'p1234', 12, 20, 4, 3, 14, 1, 1, 1, 8);

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombreProveedor`, `cuitProveedor`, `condIvaProveedor`, `direccionProveedor`, `localidadProveedor`, `telefonoProveedor`, `contactoProveedor`, `bancoProveedor`, `cbuProveedor`) VALUES
(1, 'Proveedor', '20296359685', 'Inscripto', 'Domicilio 1234', 'Localidad 1', '03156958', 'Contacto 1', 'Banco 1', '335232168'),
(2, 'Ropa al Costo', '30258147363', 'Inscripto', 'Una Calle 2659', 'NO se', '0342-154426340', 'Augusto', 'Macro', '64231326875643'),
(3, 'Otro pro', '20296359685', 'Inscripto', 'Domicilio 1234', 'Localidad 1', '03156958', 'Contacto 1', 'Banco 1', '335232168'),
(4, 'Ropa al Costo123', '30258147363', 'Inscripto', 'Una Calle 2659', 'NO se', '0342-154426340', 'Augusto', 'Macro', '64231326875643'),
(5, 'Proveedor33333', '20296359685', 'Inscripto', 'Domicilio 1234', 'Localidad 1', '03156958', 'Contacto 1', 'Banco 1', '335232168');

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
(32, 'XXXXL');

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
(34, 'POPLIN');

--
-- Volcado de datos para la tabla `tipoventa`
--

INSERT INTO `tipoventa` (`idTipoVenta`, `detalleTipoVenta`, `grupoTipoVenta`) VALUES
(1, 'Precio 11111', 1),
(2, 'Precio 2', 3),
(3, 'Precio 3', 1),
(4, 'Precio 4', 2),
(5, 'Precio 5', 1),
(6, 'Precio 6', 2);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
