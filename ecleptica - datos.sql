-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-04-2014 a las 02:16:42
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
(37, 'PLATEADO');

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nombreEmpresa`, `dirEmpresa`, `cuitEmpresa`, `telEmpresa`, `emailEmpresa`, `logoEmpresa`) VALUES
(1, 'Eclectica Esperanza1', '', '30699872160', '03496 43-0854', 'eclectica.esperanza@facebook.com', 'CAM00045.jpg');

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
(13, 'FLECOS');

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
(2, 'Precio 2', 2),
(3, 'Precio 3', 1),
(4, 'Precio 4', 2),
(5, 'Precio 5', 1),
(6, 'Precio 6', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
