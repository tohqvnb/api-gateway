CREATE TABLE `login` (
	`email` varchar(50) NOT NULL UNIQUE,
	`password` varchar(50) NOT NULL
);

CREATE TABLE `register` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`username` varchar(255) NOT NULL,
	`email` varchar(50) NOT NULL UNIQUE,
	`password` varchar(50) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `customer` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `address` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`customer_id` INT NOT NULL,
	`address_line` varchar(255) NOT NULL,
	`address_line2` varchar(255) NOT NULL,
	`city` varchar(255) NOT NULL,
	`state` varchar(255) NOT NULL,
	`country` varchar(255) NOT NULL,
	`zip_code` varchar(255) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `address` ADD CONSTRAINT `address_fk0` FOREIGN KEY (`customer_id`) REFERENCES `customer`(`id`);





