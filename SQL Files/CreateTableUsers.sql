CREATE TABLE `store`.`users` 
( 
`user_id` INT NOT NULL AUTO_INCREMENT ,
 `first_name` VARCHAR(12) NOT NULL , 
`last_name` VARCHAR(24) NOT NULL , 
`age` VARCHAR(3) NOT NULL , 
`username` VARCHAR(15) NOT NULL , 
`password` VARCHAR(15) NOT NULL , 
PRIMARY KEY (`user_id`), 
UNIQUE (`username`)
) 
ENGINE = InnoDB;