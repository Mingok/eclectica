SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `ecleptica` ;
CREATE SCHEMA IF NOT EXISTS `ecleptica` DEFAULT CHARACTER SET latin1 ;
USE `ecleptica` ;

-- -----------------------------------------------------
-- Table `ecleptica`.`color`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`color` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`color` (
  `idColor` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleColor` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idColor`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecleptica`.`empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`empresa` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`empresa` (
  `idEmpresa` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreEmpresa` VARCHAR(45) NULL DEFAULT NULL,
  `dirEmpresa` VARCHAR(50) NOT NULL,
  `cuitEmpresa` VARCHAR(13) NOT NULL,
  `telEmpresa` VARCHAR(20) NOT NULL,
  `emailEmpresa` VARCHAR(100) NOT NULL,
  `logoEmpresa` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idEmpresa`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecleptica`.`estacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`estacion` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`estacion` (
  `idEstacion` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleEstacion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idEstacion`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecleptica`.`estampado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`estampado` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`estampado` (
  `idEstampado` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleEstampado` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idEstampado`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecleptica`.`marca`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`marca` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`marca` (
  `idMarca` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleMarca` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idMarca`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecleptica`.`persona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`persona` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`persona` (
  `idPersona` INT(11) NOT NULL AUTO_INCREMENT,
  `apellido` VARCHAR(100) NULL DEFAULT NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `direccion` VARCHAR(45) NULL DEFAULT NULL,
  `telefono` VARCHAR(45) NULL DEFAULT NULL,
  `codigoVendedor` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idPersona`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecleptica`.`proveedor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`proveedor` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`proveedor` (
  `idProveedor` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreProveedor` VARCHAR(45) NULL DEFAULT NULL,
  `cuitProveedor` VARCHAR(13) NOT NULL,
  `condIvaProveedor` VARCHAR(50) NOT NULL,
  `direccionProveedor` VARCHAR(150) NULL DEFAULT NULL,
  `localidadProveedor` VARCHAR(11) NOT NULL,
  `telefonoProveedor` VARCHAR(45) NULL DEFAULT NULL,
  `contactoProveedor` VARCHAR(100) NOT NULL,
  `bancoProveedor` VARCHAR(100) NOT NULL,
  `cbuProveedor` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idProveedor`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecleptica`.`talle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`talle` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`talle` (
  `idTalle` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleTalle` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idTalle`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecleptica`.`tela`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`tela` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`tela` (
  `idTela` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleTela` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idTela`))
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecleptica`.`prenda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`prenda` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`prenda` (
  `idPrenda` INT(11) NOT NULL AUTO_INCREMENT,
  `codigoPrenda` VARCHAR(9) NOT NULL,
  `detallePrenda` VARCHAR(100) NOT NULL,
  `idColorPrenda` INT(11) NOT NULL,
  `idEstampadoPrenda` INT(11) NOT NULL,
  `idTelaPrenda` INT(11) NOT NULL,
  `idTallePrenda` INT(11) NOT NULL,
  `idEstacionPrenda` INT(11) NOT NULL,
  `idEmpresaPrenda` INT(11) NOT NULL,
  `idProveedorPrenda` INT(11) NOT NULL,
  `idMarcaPrenda` INT(11) NOT NULL,
  `cantidadPrenda` INT(10) NOT NULL,
  PRIMARY KEY (`idPrenda`),
  INDEX `fk_Prenda_Color_idx` (`idColorPrenda` ASC),
  INDEX `fk_Prenda_Estampado1_idx` (`idEstampadoPrenda` ASC),
  INDEX `fk_Prenda_Tela1_idx` (`idTelaPrenda` ASC),
  INDEX `fk_Prenda_Talle1_idx` (`idTallePrenda` ASC),
  INDEX `fk_Prenda_Estacion1_idx` (`idEstacionPrenda` ASC),
  INDEX `fk_Prenda_Empresa1_idx` (`idEmpresaPrenda` ASC),
  INDEX `fk_Prenda_Proveedor1_idx` (`idProveedorPrenda` ASC),
  INDEX `fk_Prenda_Marca1_idx` (`idMarcaPrenda` ASC),
  INDEX `idEstacionPrenda` (`idEstacionPrenda` ASC),
  INDEX `idEstacionPrenda_2` (`idEstacionPrenda` ASC),
  CONSTRAINT `fk_Prenda_Color`
    FOREIGN KEY (`idColorPrenda`)
    REFERENCES `ecleptica`.`color` (`idColor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenda_Empresa1`
    FOREIGN KEY (`idEmpresaPrenda`)
    REFERENCES `ecleptica`.`empresa` (`idEmpresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenda_Estacion1`
    FOREIGN KEY (`idEstacionPrenda`)
    REFERENCES `ecleptica`.`estacion` (`idEstacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenda_Estampado1`
    FOREIGN KEY (`idEstampadoPrenda`)
    REFERENCES `ecleptica`.`estampado` (`idEstampado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenda_Marca1`
    FOREIGN KEY (`idMarcaPrenda`)
    REFERENCES `ecleptica`.`marca` (`idMarca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenda_Proveedor1`
    FOREIGN KEY (`idProveedorPrenda`)
    REFERENCES `ecleptica`.`proveedor` (`idProveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenda_Talle1`
    FOREIGN KEY (`idTallePrenda`)
    REFERENCES `ecleptica`.`talle` (`idTalle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenda_Tela1`
    FOREIGN KEY (`idTelaPrenda`)
    REFERENCES `ecleptica`.`tela` (`idTela`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecleptica`.`tipoventa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`tipoventa` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`tipoventa` (
  `idTipoVenta` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleTipoVenta` VARCHAR(45) NULL DEFAULT NULL,
  `grupoTipoVenta` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idTipoVenta`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecleptica`.`tipoventa_prenda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`tipoventa_prenda` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`tipoventa_prenda` (
  `idTipoVenta_Prenda` INT(11) NOT NULL AUTO_INCREMENT,
  `detalleTipoVenta_Prenda` VARCHAR(45) NOT NULL,
  `valor` DECIMAL(2,0) NOT NULL,
  `idTipoVenta` INT(11) NOT NULL,
  `idPrenda` INT(11) NOT NULL,
  PRIMARY KEY (`idTipoVenta_Prenda`, `idTipoVenta`, `idPrenda`),
  INDEX `fk_TipoVent_TipoVenta1_idx` (`idTipoVenta` ASC),
  INDEX `fk_TipoVent_Prenda1_idx` (`idPrenda` ASC),
  CONSTRAINT `fk_TipoVent_Prenda1`
    FOREIGN KEY (`idPrenda`)
    REFERENCES `ecleptica`.`prenda` (`idPrenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TipoVent_TipoVenta1`
    FOREIGN KEY (`idTipoVenta`)
    REFERENCES `ecleptica`.`tipoventa` (`idTipoVenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `ecleptica`.`venta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`venta` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`venta` (
  `idVenta` INT(11) NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NULL DEFAULT NULL,
  `cliente` INT(11) NOT NULL,
  `vendedor` INT(11) NOT NULL,
  `idPrenda` INT(11) NOT NULL,
  `precioVenta` DOUBLE NOT NULL,
  `idTipoVenta` INT(11) NOT NULL,
  PRIMARY KEY (`idVenta`),
  INDEX `fk_Venta_Persona1_idx` (`cliente` ASC),
  INDEX `fk_Venta_Persona2_idx` (`vendedor` ASC),
  INDEX `fk_Venta_Prenda1_idx` (`idPrenda` ASC),
  INDEX `fk_Venta_TipoVenta_Prenda1_idx` (`idTipoVenta` ASC),
  CONSTRAINT `fk_Venta_Persona1`
    FOREIGN KEY (`cliente`)
    REFERENCES `ecleptica`.`persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_Persona2`
    FOREIGN KEY (`vendedor`)
    REFERENCES `ecleptica`.`persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_Prenda1`
    FOREIGN KEY (`idPrenda`)
    REFERENCES `ecleptica`.`prenda` (`idPrenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_TipoVenta_Prenda1`
    FOREIGN KEY (`idTipoVenta`)
    REFERENCES `ecleptica`.`tipoventa_prenda` (`idTipoVenta_Prenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
