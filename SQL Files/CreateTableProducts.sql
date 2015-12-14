CREATE TABLE `store`.`products` 
( 
`product_id` INT NOT NULL AUTO_INCREMENT ,
 `name` VARCHAR(15) NOT NULL , 
`stock` INT NOT NULL , 
`value` INT NOT NULL , 
`category` VARCHAR(30) NOT NULL ,
 `sub-category` VARCHAR(30) NOT NULL , 
PRIMARY KEY (`product_id`), 
UNIQUE (`name`)
) 
ENGINE = InnoDB;