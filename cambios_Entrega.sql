ALTER TABLE  `entrega` ADD  `Inicial` BOOLEAN NOT NULL AFTER  `fechaEntrega` ;
ALTER TABLE  `entrega` CHANGE  `Inicial`  `inicial` VARCHAR( 1 ) NOT NULL ;