ALTER TABLE `eclectica`.`venta_renglon`   
  ADD COLUMN `estado` VARCHAR(1) DEFAULT 'V'   NOT NULL AFTER `precioVendido`;
ALTER TABLE `eclectica`.`venta`   
  CHANGE `estado` `estado` VARCHAR(1) CHARSET utf8 COLLATE utf8_general_ci NULL;