CREATE DATABASE tasks;
USE tasks;

CREATE TABLE categories  (
categoryId TINYINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
categoryName VARCHAR(100) UNIQUE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET= utf8;

CREATE TABLE tasks  (
taskId BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
categoryId TINYINT NOT NULL,
userId BIGINT NOT NULL,
title VARCHAR(100) NOT NULL,
description VARCHAR(255) NOT NULL,
start DATETIME NOT NULL DEFAULT CURDATE(),
finish DATETIME NULL,
priority TINYINT NOT NULL DEFAULT 1,
state ENUM('Pendiente', 'Finalizada', 'Vencida', 'Inconclusa'),
FOREIGN KEY (categoryId) REFERENCES categories(categoryId),
FOREIGN KEY (userId) REFERENCES users(userId)
) ENGINE=InnoDB DEFAULT CHARSET= utf8;

create table users(
userId BIGINT NOT NULL AUTO_INCREMENT PRIMARY key,
username varchar(60) unique not null,
password varchar(250) not null
);

