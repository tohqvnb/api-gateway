CREATE TABLE `customer` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	`phone_number` INT(50) NOT NULL,
	`gender` tinyint(50) NOT NULL DEFAULT '0: male , 1: female',
	`date_of_birth` TIME NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	`deleted_at` tinyint(50) NOT NULL DEFAULT '0: male , 1: female',
	PRIMARY KEY (`id`)
);

CREATE TABLE `address` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`address_line` varchar(255) NOT NULL,
	`address_line2` varchar(255),
	`address_line3` varchar(255),
	`city` varchar(255) NOT NULL,
	`street` varchar(255),
	`state` varchar(255) NOT NULL,
	`country` varchar(255) NOT NULL,
	`potal_code` varchar(255) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	`deleted_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `customer_address` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`customer_id` INT(11) NOT NULL,
	`address_id` INT(11) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `customer_address` ADD CONSTRAINT `customer_address_fk0` FOREIGN KEY (`customer_id`) REFERENCES `customer`(`id`);

ALTER TABLE `customer_address` ADD CONSTRAINT `customer_address_fk1` FOREIGN KEY (`address_id`) REFERENCES `address`(`id`);




