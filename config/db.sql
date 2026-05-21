CREATE DATABASE tasks;
USE tasks;

CREATE TABLE categories  (
categoryId TINYINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
categoryName VARCHAR(100) UNIQUE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET= utf8;

CREATE TABLE tasks  (
taskId BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
categoryId TINYINT NOT NULL,
title VARCHAR(100) NOT NULL,
description VARCHAR(255) NOT NULL,
start DATETIME NOT NULL DEFAULT CURDATE(),
finish DATETIME NULL,
priority TINYINT NOT NULL DEFAULT 1,
state ENUM('Pendiente', 'Finalizada', 'Vencida', 'Inconclusa'),
 FOREIGN KEY (categoryId) REFERENCES categories(categoryId)
) ENGINE=InnoDB DEFAULT CHARSET= utf8;


INSERT INTO categories (categoryName) VALUES
('Trabajo / Proyectos'),
('Personal / Salud'),
('Estudios / Aprendizaje'),
('Hogar / Tareas Domésticas'),
('Finanzas / Trámites');
