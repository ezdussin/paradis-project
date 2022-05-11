CREATE DATABASE IF NOT EXISTS paradis;

USE paradis;
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    avatar longblob NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS product (
	id INT AUTO_INCREMENT PRIMARY KEY,
    product_name varchar(255) NOT NULL,
    description varchar(255) NULL,
    price decimal(10, 2) NOT NULL,
    amount INT NOT NULL,
    thumbnail longblob NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS provider (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email varchar(255) NOT NULL,
    name varchar(255) NOT NULL,
    telephone varchar(15) NOT NULL,
    cnpj varchar(14) NOT NULL,
    address varchar(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS purchase_order (
    id INT AUTO_INCREMENT PRIMARY KEY,
    provider_name varchar(255) NOT NULL,
    product_name varchar(255) NOT NULL,
    total decimal(10, 2) NOT NULL,
    unit_price decimal(10, 2) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);