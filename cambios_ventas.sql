/* TABLA VENTA */
DROP TABLE venta;
CREATE TABLE IF NOT EXISTS `venta` (
  `idVenta` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `idVendedor` int(11) NOT NULL,
  `precioVenta` double NOT NULL,
  `entregaCliente` double NOT NULL,
  `fechaVenta` timestamp NOT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `fk_Venta_Persona1_idx` (`idCliente`),
  KEY `fk_Venta_Persona2_idx` (`idVendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `venta`
  ADD CONSTRAINT `fk_Venta_Persona1` FOREIGN KEY (`idCliente`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_Persona2` FOREIGN KEY (`idVendedor`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;


/* TABLA VENTA RENGLON */  
DROP TABLE venta_renglon;  
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

ALTER TABLE `venta_renglon`
  ADD CONSTRAINT `fk_Venta_Renglon1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_Renglon2` FOREIGN KEY (`idPrenda`) REFERENCES `prenda` (`idPrenda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Venta_Renglon3` FOREIGN KEY (`idTipoVenta`) REFERENCES `tipoventa` (`idTipoVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;


/* TABLA ENTREGA */
CREATE TABLE IF NOT EXISTS `entrega` (
  `idEntrega` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) NOT NULL,
  `idVendedor` int(11) NOT NULL,
  `valorEntrega` double NOT NULL,
  `fechaEntrega` timestamp NOT NULL,
  PRIMARY KEY (`idEntrega`),
  KEY `fk_Entrega_Persona1_idx` (`idCliente`),
  KEY `fk_Entrega_Persona2_idx` (`idVendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `entrega`
  ADD CONSTRAINT `fk_Entrega_Persona1` FOREIGN KEY (`idCliente`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Entrega_Persona2` FOREIGN KEY (`idVendedor`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;
