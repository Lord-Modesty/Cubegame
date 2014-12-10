SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema leabergermaturaarbeit
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `leabergermaturaarbeit` ;
CREATE SCHEMA IF NOT EXISTS `leabergermaturaarbeit` DEFAULT CHARACTER SET latin1 ;
USE `leabergermaturaarbeit` ;

-- -----------------------------------------------------
-- Table `leabergermaturaarbeit`.`players`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `leabergermaturaarbeit`.`players` (
  `player_id` INT(11) NOT NULL AUTO_INCREMENT,
  `vorname` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `klasse` VARCHAR(50) NOT NULL,
  `geschlecht` VARCHAR(50) NOT NULL,
  `age` INT NOT NULL,
  `gewicht` INT NOT NULL,
  `groesse` INT NOT NULL,
  `hunger` INT NOT NULL,
  `zeitpunkt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`player_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `leabergermaturaarbeit`.`games`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `leabergermaturaarbeit`.`games` (
  `game_id` INT NOT NULL AUTO_INCREMENT,
  `player_id` INT NOT NULL,
  `runde` INT NOT NULL,
  `guthaben` INT NOT NULL,
  `gesetzt` INT NOT NULL,
  `gewinn_zahl` INT NOT NULL,
  `gewinn_farbe` INT NOT NULL,
  `gewinn_gerade` INT NOT NULL,
  `verloren` INT NOT NULL,
  `gewonnen` INT NOT NULL,
  PRIMARY KEY (`game_id`),
  INDEX `fk_games_players_idx` (`player_id` ASC),
  CONSTRAINT `fk_games_players`
    FOREIGN KEY (`player_id`)
    REFERENCES `leabergermaturaarbeit`.`players` (`player_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
