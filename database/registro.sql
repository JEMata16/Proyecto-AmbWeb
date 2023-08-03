CREATE TABLE `restaurante`.`usuario` (
    `idUsuario` INT(5) NOT NULL AUTO_INCREMENT , 
    `username` VARCHAR(30) NOT NULL , 
    `correo` VARCHAR(30) NOT NULL , 
    `contra` VARCHAR(20) NOT NULL , 
    PRIMARY KEY (`idUsuario`(11))
) ENGINE = InnoDB;