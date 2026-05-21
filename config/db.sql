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

INSERT INTO tasks (categoryId, title, description, start, finish, priority, state) VALUES
(1, 'Revisar logs del servidor', 'Buscar errores 500 en el servidor de producción', CURDATE(), NULL, 8, 'Pendiente'),
(1, 'Diseño de Base de Datos', 'Armar el DER inicial para el nuevo sistema', CURDATE(), NULL, 9, 'Pendiente');

-- Tareas de Personal / Salud (categoryId = 2)
INSERT INTO tasks (categoryId, title, description, start, finish, priority, state) VALUES
(2, 'Turno con el dentista', 'Control anual a las 16:30 hs', CURDATE(), NULL, 5, 'Pendiente'),
(2, 'Rutina de gimnasio', 'Entrenamiento de fuerza - Tren superior', CURDATE(), NULL, 4, 'Pendiente');

-- Tareas de Estudios / Aprendizaje (categoryId = 3)
INSERT INTO tasks (categoryId, title, description, start, finish, priority, state) VALUES
(3, 'Repasar POO en PHP', 'Estudiar herencia, interfaces y namespaces para el parcial', CURDATE(), NULL, 10, 'Pendiente'),
(3, 'Practicar Listening', 'Escuchar 20 minutos de podcast en inglés', CURDATE(), NULL, 6, 'Pendiente');

-- Tareas de Hogar / Tareas Domésticas (categoryId = 4)
INSERT INTO tasks (categoryId, title, description, start, finish, priority, state) VALUES
(4, 'Hacer las compras semanales', 'Comprar verduras, leche y productos de limpieza', CURDATE(), NULL, 6, 'Pendiente'),
(4, 'Cortar el césped', 'Antes de que empiece a llover el fin de semana', CURDATE(), NULL, 3, 'Pendiente');

-- Tareas de Finanzas / Trámites (categoryId = 5)
INSERT INTO tasks (categoryId, title, description, start, finish, priority, state) VALUES
(5, 'Pagar factura de internet', 'Vence el 25 de este mes', CURDATE(), NULL, 7, 'Pendiente'),
(5, 'Enviar comprobante de alquiler', 'Mandarle al dueño el PDF de la transferencia', CURDATE(), NULL, 8, 'Pendiente');
