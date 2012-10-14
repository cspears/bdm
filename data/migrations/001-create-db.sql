SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`battery`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`battery` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `serial_number` INT NULL ,
  `model` VARCHAR(45) NULL ,
  `pwr` INT NULL ,
  `build_date` DATE NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `SN_UNIQUE` (`serial_number` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`battery_test`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`battery_test` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(45) NULL ,
  `number` INT NULL ,
  `start_time` DATETIME NULL ,
  `end_time` DATETIME NULL ,
  `battery_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_battery_idx` (`battery_id` ASC) ,
  CONSTRAINT `fk_battery`
    FOREIGN KEY (`battery_id` )
    REFERENCES `mydb`.`battery` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`test_data`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`test_data` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `record` DOUBLE NULL ,
  `cycle` DOUBLE NULL ,
  `step` DOUBLE NULL ,
  `test_time` DOUBLE NULL ,
  `step_time` DOUBLE NULL ,
  `capacity` DOUBLE NULL ,
  `energy` DOUBLE NULL ,
  `voltage` DOUBLE NULL ,
  `current` DOUBLE NULL ,
  `battery_test_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_battery_test_idx` (`battery_test_id` ASC) ,
  CONSTRAINT `fk_battery_test`
    FOREIGN KEY (`battery_test_id` )
    REFERENCES `mydb`.`battery_test` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
