CREATE DATABASE `bd_exemple`
DEFAULT CHARACTER SET `utf8mb4`
COLLATE `utf8mb4_0900_ai_ci`;
USE `bd_exemple`;
SET default_storage_engine=InnoDB;
CREATE TABLE `films` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `titre` nvarchar(255) NOT NULL,
    PRIMARY KEY (`id`)
);

INSERT INTO `films` (`id`, `titre`) VALUES 
    (1, "Top-Gun"),
    (2, "K-Pop"),
    (3, "Opennheimer")
