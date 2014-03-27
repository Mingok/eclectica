SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `ecleptica` ;
CREATE SCHEMA IF NOT EXISTS `ecleptica` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ecleptica` ;

-- -----------------------------------------------------
-- Table `ecleptica`.`Persona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`Persona` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`Persona` (
  `idPersona` INT NOT NULL AUTO_INCREMENT,
  `apellido` VARCHAR(100) NULL,
  `nombre` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NULL,
  `codigoVendedor` VARCHAR(45) NULL,
  PRIMARY KEY (`idPersona`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecleptica`.`Proveedor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`Proveedor` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`Proveedor` (
  `idProveedor` INT NOT NULL AUTO_INCREMENT,
  `nombreProveedor` VARCHAR(45) NULL,
  `direccion` VARCHAR(150) NULL,
  `telefono` VARCHAR(45) NULL,
  PRIMARY KEY (`idProveedor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecleptica`.`Color`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`Color` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`Color` (
  `idColor` INT NOT NULL AUTO_INCREMENT,
  `detalleColor` VARCHAR(45) NULL,
  PRIMARY KEY (`idColor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecleptica`.`Estampado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`Estampado` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`Estampado` (
  `idEstampado` INT NOT NULL AUTO_INCREMENT,
  `detalleEstampado` VARCHAR(45) NULL,
  PRIMARY KEY (`idEstampado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecleptica`.`Tela`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`Tela` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`Tela` (
  `idTela` INT NOT NULL AUTO_INCREMENT,
  `detalleTela` VARCHAR(45) NULL,
  PRIMARY KEY (`idTela`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecleptica`.`Talle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`Talle` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`Talle` (
  `idTalle` INT NOT NULL AUTO_INCREMENT,
  `detalleTalle` VARCHAR(45) NULL,
  PRIMARY KEY (`idTalle`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecleptica`.`Estacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`Estacion` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`Estacion` (
  `idEstacion` INT NOT NULL AUTO_INCREMENT,
  `detalleEstacion` VARCHAR(45) NULL,
  PRIMARY KEY (`idEstacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecleptica`.`Empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`Empresa` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`Empresa` (
  `idEmpresa` INT NOT NULL AUTO_INCREMENT,
  `detalleEmpresa` VARCHAR(45) NULL,
  PRIMARY KEY (`idEmpresa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecleptica`.`TipoVenta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`TipoVenta` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`TipoVenta` (
  `idTipoVenta` INT NOT NULL AUTO_INCREMENT,
  `detalleTipoVenta` VARCHAR(45) NULL,
  `grupoTipoVenta` INT NULL,
  PRIMARY KEY (`idTipoVenta`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecleptica`.`Marca`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`Marca` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`Marca` (
  `idMarca` INT NOT NULL AUTO_INCREMENT,
  `detalleMarca` VARCHAR(45) NULL,
  PRIMARY KEY (`idMarca`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecleptica`.`Prenda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`Prenda` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`Prenda` (
  `idPrenda` INT NOT NULL AUTO_INCREMENT,
  `detallePrenda` VARCHAR(100) NOT NULL,
  `idColor` INT NOT NULL,
  `idEstampado` INT NOT NULL,
  `idTela` INT NOT NULL,
  `idTalle` INT NOT NULL,
  `idEstacion` INT NOT NULL,
  `idEmpresa` INT NOT NULL,
  `idProveedor` INT NOT NULL,
  `idMarca` INT NOT NULL,
  PRIMARY KEY (`idPrenda`),
  INDEX `fk_Prenda_Color_idx` (`idColor` ASC),
  INDEX `fk_Prenda_Estampado1_idx` (`idEstampado` ASC),
  INDEX `fk_Prenda_Tela1_idx` (`idTela` ASC),
  INDEX `fk_Prenda_Talle1_idx` (`idTalle` ASC),
  INDEX `fk_Prenda_Estacion1_idx` (`idEstacion` ASC),
  INDEX `fk_Prenda_Empresa1_idx` (`idEmpresa` ASC),
  INDEX `fk_Prenda_Proveedor1_idx` (`idProveedor` ASC),
  INDEX `fk_Prenda_Marca1_idx` (`idMarca` ASC),
  CONSTRAINT `fk_Prenda_Color`
    FOREIGN KEY (`idColor`)
    REFERENCES `ecleptica`.`Color` (`idColor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenda_Estampado1`
    FOREIGN KEY (`idEstampado`)
    REFERENCES `ecleptica`.`Estampado` (`idEstampado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenda_Tela1`
    FOREIGN KEY (`idTela`)
    REFERENCES `ecleptica`.`Tela` (`idTela`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenda_Talle1`
    FOREIGN KEY (`idTalle`)
    REFERENCES `ecleptica`.`Talle` (`idTalle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenda_Estacion1`
    FOREIGN KEY (`idEstacion`)
    REFERENCES `ecleptica`.`Estacion` (`idEstacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenda_Empresa1`
    FOREIGN KEY (`idEmpresa`)
    REFERENCES `ecleptica`.`Empresa` (`idEmpresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenda_Proveedor1`
    FOREIGN KEY (`idProveedor`)
    REFERENCES `ecleptica`.`Proveedor` (`idProveedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prenda_Marca1`
    FOREIGN KEY (`idMarca`)
    REFERENCES `ecleptica`.`Marca` (`idMarca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecleptica`.`TipoVenta_Prenda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`TipoVenta_Prenda` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`TipoVenta_Prenda` (
  `idTipoVenta_Prenda` INT NOT NULL AUTO_INCREMENT,
  `detalleTipoVenta_Prenda` VARCHAR(45) NOT NULL,
  `valor` DECIMAL(2) NOT NULL,
  `idTipoVenta` INT NOT NULL,
  `idPrenda` INT NOT NULL,
  PRIMARY KEY (`idTipoVenta_Prenda`, `idTipoVenta`, `idPrenda`),
  INDEX `fk_TipoVent_TipoVenta1_idx` (`idTipoVenta` ASC),
  INDEX `fk_TipoVent_Prenda1_idx` (`idPrenda` ASC),
  CONSTRAINT `fk_TipoVent_TipoVenta1`
    FOREIGN KEY (`idTipoVenta`)
    REFERENCES `ecleptica`.`TipoVenta` (`idTipoVenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TipoVent_Prenda1`
    FOREIGN KEY (`idPrenda`)
    REFERENCES `ecleptica`.`Prenda` (`idPrenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecleptica`.`Venta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecleptica`.`Venta` ;

CREATE TABLE IF NOT EXISTS `ecleptica`.`Venta` (
  `idVenta` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NULL,
  `cliente` INT NOT NULL,
  `vendedor` INT NOT NULL,
  `idPrenda` INT NOT NULL,
  `idTipoVenta` INT NOT NULL,
  PRIMARY KEY (`idVenta`),
  INDEX `fk_Venta_Persona1_idx` (`cliente` ASC),
  INDEX `fk_Venta_Persona2_idx` (`vendedor` ASC),
  INDEX `fk_Venta_Prenda1_idx` (`idPrenda` ASC),
  INDEX `fk_Venta_TipoVenta_Prenda1_idx` (`idTipoVenta` ASC),
  CONSTRAINT `fk_Venta_Persona1`
    FOREIGN KEY (`cliente`)
    REFERENCES `ecleptica`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_Persona2`
    FOREIGN KEY (`vendedor`)
    REFERENCES `ecleptica`.`Persona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_Prenda1`
    FOREIGN KEY (`idPrenda`)
    REFERENCES `ecleptica`.`Prenda` (`idPrenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_TipoVenta_Prenda1`
    FOREIGN KEY (`idTipoVenta`)
    REFERENCES `ecleptica`.`TipoVenta_Prenda` (`idTipoVenta_Prenda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
