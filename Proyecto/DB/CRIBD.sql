SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `CentralRevelados` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `CentralRevelados` ;

-- -----------------------------------------------------
-- Table `CentralRevelados`.`usuario_estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CentralRevelados`.`usuario_estado` (
  `usuario_estado_id` TINYINT NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`usuario_estado_id`),
  UNIQUE INDEX `estado_UNIQUE` (`estado` ASC));


-- -----------------------------------------------------
-- Table `CentralRevelados`.`usuario_tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CentralRevelados`.`usuario_tipo` (
  `usuario_tipo_id` TINYINT NOT NULL,
  `nombre` VARCHAR(13) NOT NULL,
  PRIMARY KEY (`usuario_tipo_id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC));


-- -----------------------------------------------------
-- Table `CentralRevelados`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CentralRevelados`.`usuario` (
  `usuario_id` VARCHAR(25) NOT NULL,
  `clave` VARCHAR(8) BINARY NOT NULL,
  `usuario_estado_id` TINYINT NOT NULL,
  `usuario_tipo_id` TINYINT NOT NULL,
  PRIMARY KEY (`usuario_id`, `usuario_estado_id`, `usuario_tipo_id`),
  INDEX `fk_usuario_estado1_idx` (`usuario_estado_id` ASC),
  INDEX `fk_usuario_tipo1_idx` (`usuario_tipo_id` ASC),
  CONSTRAINT `fk_usuario_estado1`
    FOREIGN KEY (`usuario_estado_id`)
    REFERENCES `CentralRevelados`.`usuario_estado` (`usuario_estado_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_tipo1`
    FOREIGN KEY (`usuario_tipo_id`)
    REFERENCES `CentralRevelados`.`usuario_tipo` (`usuario_tipo_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `CentralRevelados`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CentralRevelados`.`persona` (
  `cedula` INT NOT NULL,
  `usuario_id` VARCHAR(25) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido1` VARCHAR(45) NOT NULL,
  `apellido2` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL,
  `dob` DATE NOT NULL,
  PRIMARY KEY (`cedula`, `usuario_id`),
  INDEX `fk_persona_usuario1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_persona_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `CentralRevelados`.`usuario` (`usuario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `CentralRevelados`.`telefono`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CentralRevelados`.`telefono` (
  `cedula` INT NOT NULL,
  `tipo_telefono` VARCHAR(25) NOT NULL,
  `telefono` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`cedula`, `tipo_telefono`),
  INDEX `fk_telefono_persona1_idx` (`cedula` ASC),
  CONSTRAINT `fk_telefono_persona1`
    FOREIGN KEY (`cedula`)
    REFERENCES `CentralRevelados`.`persona` (`cedula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `CentralRevelados`.`respaldo_estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CentralRevelados`.`respaldo_estado` (
  `respaldo_estado_id` TINYINT NOT NULL,
  `estado` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`respaldo_estado_id`),
  UNIQUE INDEX `estado_UNIQUE` (`estado` ASC));


-- -----------------------------------------------------
-- Table `CentralRevelados`.`respaldo_tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CentralRevelados`.`respaldo_tipo` (
  `respaldo_tipo_id` TINYINT NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`respaldo_tipo_id`),
  UNIQUE INDEX `tipo_UNIQUE` (`tipo` ASC));


-- -----------------------------------------------------
-- Table `CentralRevelados`.`sistema_tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CentralRevelados`.`sistema_tipo` (
  `sistema_tipo_id` TINYINT NOT NULL,
  `categoria` VARCHAR(13) NOT NULL,
  PRIMARY KEY (`sistema_tipo_id`),
  UNIQUE INDEX `categoria_UNIQUE` (`categoria` ASC));


-- -----------------------------------------------------
-- Table `CentralRevelados`.`sistema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CentralRevelados`.`sistema` (
  `sistema_id` INT NOT NULL,
  `sistema_tipo_id` TINYINT NOT NULL,
  `ubicacion` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`sistema_id`, `sistema_tipo_id`),
  INDEX `fk_sistemas_tipo_sistemas1_idx` (`sistema_tipo_id` ASC),
  CONSTRAINT `fk_sistemas_tipo_sistemas1`
    FOREIGN KEY (`sistema_tipo_id`)
    REFERENCES `CentralRevelados`.`sistema_tipo` (`sistema_tipo_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `CentralRevelados`.`respaldo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CentralRevelados`.`respaldo` (
  `respaldo_id` INT NOT NULL AUTO_INCREMENT,
  `fecha_creado` DATE NOT NULL,
  `fecha_ultima_restauracion` DATE NULL,
  `respaldo_estado_id` TINYINT NOT NULL,
  `respaldo_tipo_id` TINYINT NOT NULL,
  `sistema_sistema_id` INT NOT NULL,
  PRIMARY KEY (`respaldo_id`, `respaldo_estado_id`, `respaldo_tipo_id`, `sistema_sistema_id`),
  INDEX `fk_respaldo_respaldo_estado1_idx` (`respaldo_estado_id` ASC),
  INDEX `fk_respaldo_respaldo_tipo1_idx` (`respaldo_tipo_id` ASC),
  INDEX `fk_respaldo_sistema1_idx` (`sistema_sistema_id` ASC),
  CONSTRAINT `fk_respaldo_respaldo_estado1`
    FOREIGN KEY (`respaldo_estado_id`)
    REFERENCES `CentralRevelados`.`respaldo_estado` (`respaldo_estado_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_respaldo_respaldo_tipo1`
    FOREIGN KEY (`respaldo_tipo_id`)
    REFERENCES `CentralRevelados`.`respaldo_tipo` (`respaldo_tipo_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_respaldo_sistema1`
    FOREIGN KEY (`sistema_sistema_id`)
    REFERENCES `CentralRevelados`.`sistema` (`sistema_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `CentralRevelados`.`usuario_sistema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CentralRevelados`.`usuario_sistema` (
  `usuario_id` VARCHAR(25) NOT NULL,
  `sistema_id` INT NOT NULL,
  PRIMARY KEY (`usuario_id`, `sistema_id`),
  INDEX `fk_usuario_sistema_usuario1_idx` (`usuario_id` ASC),
  INDEX `fk_usuario_sistema_sistema1_idx` (`sistema_id` ASC),
  CONSTRAINT `fk_usuario_sistema_usuario1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `CentralRevelados`.`usuario` (`usuario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_sistema_sistema1`
    FOREIGN KEY (`sistema_id`)
    REFERENCES `CentralRevelados`.`sistema` (`sistema_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

