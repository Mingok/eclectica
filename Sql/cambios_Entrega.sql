ALTER TABLE  `entrega` ADD  `Inicial` BOOLEAN NOT NULL AFTER  `fechaEntrega` ;
ALTER TABLE  `entrega` CHANGE  `Inicial`  `inicial` VARCHAR( 1 ) NOT NULL ;
ALTER TABLE  `entrega` CHANGE  `idVendedor`  `idVendedor` INT( 11 ) NULL ;
ALTER TABLE  `entrega` CHANGE  `inicial`  `inicial` VARCHAR( 2 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ;