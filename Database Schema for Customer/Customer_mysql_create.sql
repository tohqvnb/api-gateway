CREATE TABLE `customers` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`first_name` varchar(255) NOT NULL,
	`last_name` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	`phone_number` INT(50) NOT NULL,
	`gender` tinyint(50) NOT NULL DEFAULT '0: male , 1: female',
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	`deleted_at` tinyint(50) NOT NULL DEFAULT '0: male , 1: female',
	PRIMARY KEY (`id`)
);

CREATE TABLE `addresses` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`customer_id` INT NOT NULL,
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

CREATE TABLE `orders` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`customer_id` INT(11),
	`order_date` TIMESTAMP(11) NOT NULL,
	`shipping_address` varchar(255) NOT NULL,
	`total_amount` DECIMAL NOT NULL,
	`payment_method` varchar(255) NOT NULL,
	`shipping_address` varchar(255) NOT NULL,
	`status` tinyint NOT NULL DEFAULT '2',
	`created_at` TIMESTAMP NOT NULL,
	`updated_app` varchar(255) NOT NULL,
	`supplier_id` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `order_items` (
	`order_item_id` INT(11) NOT NULL AUTO_INCREMENT,
	`order_id` varchar(255) NOT NULL,
	`product_id` INT(11) NOT NULL,
	`quantity` INT NOT NULL,
	`unit_price` DECIMAL NOT NULL,
	PRIMARY KEY (`order_item_id`)
);

CREATE TABLE `shipping_address` (
	`address_id` INT(11) NOT NULL AUTO_INCREMENT,
	`customer_id` INT(11) NOT NULL AUTO_INCREMENT,
	`address` varchar(255) NOT NULL,
	`city` varchar(255) NOT NULL,
	`state` varchar(255) NOT NULL,
	`country` varchar(255) NOT NULL,
	`postal_code` varchar(255) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`address_id`)
);

CREATE TABLE `products` (
	`id` TIMESTAMP NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`description` TEXT NOT NULL,
	`price` DECIMAL NOT NULL,
	`quantity` int NOT NULL,
	`status` tinyint(1) NOT NULL AUTO_INCREMENT,
	`brand_id` INT(255) NOT NULL,
	`category_id` INT(11) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updatedt_at` TIMESTAMP NOT NULL,
	`supplier_id` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `payment` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`order_id` INT NOT NULL AUTO_INCREMENT,
	`payment_date` TIME NOT NULL,
	`payment_method` varchar(255) NOT NULL,
	`amout` DECIMAL NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `reviews` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`product_id` INT(11),
	`customer_id` INT(11),
	`rating` varchar(255) NOT NULL,
	`comment` TEXT NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	`review_date` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `coupons` (
	`id` bigint NOT NULL AUTO_INCREMENT,
	`customer_id` INT NOT NULL AUTO_INCREMENT,
	`coupon_code` DECIMAL NOT NULL,
	`discount_amount` FLOAT NOT NULL,
	`expiration_date` DATETIME NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `categories` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`category_name` varchar(255) NOT NULL,
	`description` TEXT NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`status` tinyint NOT NULL DEFAULT '1',
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `brands` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`description` TEXT NOT NULL,
	`status` tinyint NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`)
);

CREATE TABLE `suppliers` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`contact_name` varchar(255) NOT NULL,
	`address` varchar(255) NOT NULL,
	`city` varchar(255) NOT NULL,
	`state` varchar(255) NOT NULL,
	`zip_code` varchar(255) NOT NULL,
	`country` varchar(255) NOT NULL,
	`phone_number` varchar(255) NOT NULL,
	`email` varchar(255) NOT NULL,
	`website` varchar(255) NOT NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `addressé` ADD CONSTRAINT `addressé_fk0` FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`);

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`);

ALTER TABLE `orders` ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers`(`id`);

ALTER TABLE `order_items` ADD CONSTRAINT `order_items_fk0` FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`);

ALTER TABLE `order_items` ADD CONSTRAINT `order_items_fk1` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`);

ALTER TABLE `shipping_address` ADD CONSTRAINT `shipping_address_fk0` FOREIGN KEY (`address_id`) REFERENCES `addressé`(`id`);

ALTER TABLE `shipping_address` ADD CONSTRAINT `shipping_address_fk1` FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`);

ALTER TABLE `products` ADD CONSTRAINT `products_fk0` FOREIGN KEY (`brand_id`) REFERENCES `brands`(`id`);

ALTER TABLE `products` ADD CONSTRAINT `products_fk1` FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`);

ALTER TABLE `products` ADD CONSTRAINT `products_fk2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers`(`id`);

ALTER TABLE `payment` ADD CONSTRAINT `payment_fk0` FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`);

ALTER TABLE `reviews` ADD CONSTRAINT `reviews_fk0` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`);

ALTER TABLE `reviews` ADD CONSTRAINT `reviews_fk1` FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`);

ALTER TABLE `coupons` ADD CONSTRAINT `coupons_fk0` FOREIGN KEY (`customer_id`) REFERENCES `customers`(`id`);













