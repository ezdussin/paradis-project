CREATE DATABASE IF NOT EXISTS paradis;

USE paradis;
CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    avatar longblob NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS product (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL,
    description varchar(255) NULL,
    price decimal(10, 2) NOT NULL,
    amount INT NOT NULL,
    thumbnail longblob NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS event (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL,
    description varchar(255) NULL,
    price decimal(10, 2) NOT NULL,
    amount INT NOT NULL,
    thumbnail longblob NOT NULL,
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
    amount INT NOT NULL,
    unit_price decimal(10, 2) NOT NULL,
    total_price decimal(10, 2) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS prov_prod (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_prov INT NOT NULL,
    id_prod INT NOT NULL,
    FOREIGN KEY (id_prov) REFERENCES provider (ID),
    FOREIGN KEY (id_prod) REFERENCES product (ID),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS message (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    telephone varchar(15) NOT NULL,
    subject varchar(255) NOT NULL,
    message varchar(255) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);