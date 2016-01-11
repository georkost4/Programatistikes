CREATE TABLE `store`.`funds` 
( 
`id` BIGINT(100) NOT NULL,
 `balance` BIGINT(100) NOT NULL 
UNIQUE (`id`)
) 
ENGINE = InnoDB;