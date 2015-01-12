/* CREATE DE TIPO VENTA */
INSERT INTO `eclectica`.`tipoventa` (`idTipoVenta`, `detalleTipoVenta`, `grupoTipoVenta`, `porcentajeTipoVenta`, `operacionTipoVenta`) VALUES ('7', 'Descuento 30%', '2', '30', '1');
INSERT INTO `eclectica`.`tipoventa` (`idTipoVenta`, `detalleTipoVenta`, `grupoTipoVenta`, `porcentajeTipoVenta`, `operacionTipoVenta`) VALUES ('8', 'Cuenta Corriente 15% de Recargo', '3', '15', '2');
INSERT INTO `eclectica`.`tipoventa` (`idTipoVenta`, `detalleTipoVenta`, `grupoTipoVenta`, `porcentajeTipoVenta`, `operacionTipoVenta`) VALUES ('9', 'Tarjeta de Crédito 15% de Recargo', '3', '15', '2');
INSERT INTO `eclectica`.`tipoventa` (`idTipoVenta`, `detalleTipoVenta`, `grupoTipoVenta`, `porcentajeTipoVenta`, `operacionTipoVenta`) VALUES ('10', 'Promo Tarjeta Naranja 5% Recargo', '3', '5', '2');
INSERT INTO `eclectica`.`tipoventa` (`idTipoVenta`, `detalleTipoVenta`, `grupoTipoVenta`, `porcentajeTipoVenta`, `operacionTipoVenta`) VALUES ('11', 'Recargo por mora 5% de Recargo', '3', '5', '2');

/* UPDATE DE TIPO VENTA */
UPDATE `eclectica`.`tipoventa` SET `detalleTipoVenta` = 'Costo' WHERE `tipoventa`.`idTipoVenta` = 1;
UPDATE `eclectica`.`tipoventa` SET `detalleTipoVenta` = 'Contado', `porcentajeTipoVenta` = '0', `operacionTipoVenta` = '0' WHERE `tipoventa`.`idTipoVenta` = 2;
UPDATE `eclectica`.`tipoventa` SET `detalleTipoVenta` = 'Descuento 5%', `grupoTipoVenta` = '2', `porcentajeTipoVenta` = '5' WHERE `tipoventa`.`idTipoVenta` = 3;
UPDATE `eclectica`.`tipoventa` SET `detalleTipoVenta` = 'Descuento 10%', `porcentajeTipoVenta` = '10', `operacionTipoVenta` = '1' WHERE `tipoventa`.`idTipoVenta` = 4;
UPDATE `eclectica`.`tipoventa` SET `detalleTipoVenta` = 'Descuento 15%', `operacionTipoVenta` = '1' WHERE `tipoventa`.`idTipoVenta` = 5;
UPDATE `eclectica`.`tipoventa` SET `detalleTipoVenta` = 'Descuento 20%', `grupoTipoVenta` = '2', `porcentajeTipoVenta` = '20' WHERE `tipoventa`.`idTipoVenta` = 6;



/* UPDATE DE TIPO VENTA PRENDA */
/* Esto es para dejar libre el id 1 y 2*/
UPDATE `eclectica`.`tipoventa_prenda` SET `idTipoVenta` = '8' WHERE `tipoventa_prenda`.`idTipoVenta` = 1;
UPDATE `eclectica`.`tipoventa_prenda` SET `idTipoVenta` = '9' WHERE `tipoventa_prenda`.`idTipoVenta` = 2;
/* Actualizo el el id 6 al 1 */
UPDATE `eclectica`.`tipoventa_prenda` SET `idTipoVenta` = '2' WHERE `tipoventa_prenda`.`idTipoVenta` = 9;
UPDATE `eclectica`.`tipoventa_prenda` SET `idTipoVenta` = '1' WHERE `tipoventa_prenda`.`idTipoVenta` = 6;

/* Borro el resto de los precios viejos ya que los voy a recalcular mas tarde */
DELETE FROM `eclectica`.`tipoventa_prenda` WHERE `tipoventa_prenda`.`idTipoVenta` NOT IN (1,2);