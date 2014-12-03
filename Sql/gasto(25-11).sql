-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-11-2014 a las 20:18:11
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto`
--

CREATE TABLE IF NOT EXISTS `gasto` (
  `idGasto` int(11) NOT NULL AUTO_INCREMENT,
  `fechaGasto` date NOT NULL,
  `idProveedorGasto` int(11) NOT NULL,
  `detalleGasto` varchar(200) NOT NULL,
  `importeGasto` decimal(7,2) NOT NULL,
  `formaPagoGasto` int(11) NOT NULL,
  `idEmpresaGasto` int(11) NOT NULL,
  PRIMARY KEY (`idGasto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


ALTER TABLE  `gasto` ADD FOREIGN KEY (  `idEmpresaGasto` ) REFERENCES  `eclectica`.`empresa` (
`idEmpresa`
) ON DELETE RESTRICT ON UPDATE RESTRICT ;

ALTER TABLE  `gasto` ADD FOREIGN KEY (  `idProveedorGasto` ) REFERENCES  `eclectica`.`proveedor` (
`idProveedor`
) ON DELETE RESTRICT ON UPDATE RESTRICT ;
ALTER TABLE  `gasto` CHANGE  `formaPagoGasto`  `idFormaPagoGasto` INT( 11 ) NOT NULL ;
ALTER TABLE `gasto` DROP FOREIGN KEY `gasto_ibfk_2`;
ALTER TABLE `gasto` ADD  CONSTRAINT `fk_Gasto_Proveedor` FOREIGN KEY (`idProveedorGasto`) REFERENCES `eclectica`.`proveedor`(`idProveedor`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `gasto` ADD  CONSTRAINT `fk_Gasto_FormaPago` FOREIGN KEY (`idFormaPagoGasto`) REFERENCES `eclectica`.`formapago`(`idFormaPago`) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE `gasto` DROP FOREIGN KEY `gasto_ibfk_1`;
ALTER TABLE `gasto` ADD  CONSTRAINT `fk_Gasto_Empresa` FOREIGN KEY (`idEmpresaGasto`) REFERENCES `eclectica`.`empresa`(`idEmpresa`) ON DELETE RESTRICT ON UPDATE RESTRICT;
