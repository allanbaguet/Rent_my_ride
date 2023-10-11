CREATE DATABASE IF NOT EXISTS `rent_my_ride` CHARACTER SET 'utf8';

USE `rent_my_ride`;

DROP TABLE IF EXISTS `clients`, `types`, `vehicles`, `rents`;


CREATE TABLE clients(
   `id_clients` INT AUTO_INCREMENT,
   `lastname` VARCHAR(50)  NOT NULL,
   `firstname` VARCHAR(50)  NOT NULL,
   `email` VARCHAR(120)  NOT NULL,
   `birthday` DATE NOT NULL,
   `phone` VARCHAR(12)  NOT NULL,
   `city` VARCHAR(50)  NOT NULL,
   `zipcode` VARCHAR(5)  NOT NULL,
   `created_at` DATETIME NOT NULL,
   `updated_at` DATETIME NOT NULL,
   PRIMARY KEY(`id_clients`)
);

CREATE TABLE types(
   `id_types` INT AUTO_INCREMENT,
   type VARCHAR(50)  NOT NULL,
   PRIMARY KEY(`id_types`)
);

CREATE TABLE vehicles(
   `id_vehicles` INT AUTO_INCREMENT,
   `brand` VARCHAR(50)  NOT NULL,
   `model` VARCHAR(50)  NOT NULL,
   `registration` VARCHAR(10)  NOT NULL,
   `mileage` INT NOT NULL,
   `created_at` DATETIME NOT NULL,
   `updated_at` DATETIME NOT NULL,
   `deleted_at` DATETIME,
   `id_types` INT NOT NULL,
   PRIMARY KEY(`id_vehicles`),
   FOREIGN KEY(`id_types`) REFERENCES `types`(`id_types`)
);

CREATE TABLE rents(
   `id_rents` INT AUTO_INCREMENT,
   `startdate` DATETIME NOT NULL,
   `enddate` DATETIME NOT NULL,
   `created_at` DATETIME NOT NULL,
   `confirmed_at` DATETIME,
   `id_vehicles` INT,
   `id_clients` INT,
   PRIMARY KEY(`id_rents`),
   FOREIGN KEY(`id_vehicles`) REFERENCES `vehicles`(`id_vehicles`),
   FOREIGN KEY(`id_clients`) REFERENCES `clients`(`id_clients`)
   ON DELETE SET NULL
   ON UPDATE CASCADE
);
