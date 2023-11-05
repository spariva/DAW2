-- SET @INT_DAY := 7;

CREATE DATABASE IF NOT EXISTS linkenin ;
CREATE USER IF NOT EXISTS 'linkenin'@'localhost' IDENTIFIED BY 'linkenin';
GRANT ALL PRIVILEGES ON linkenin.* TO 'linkenin'@'localhost' WITH GRANT OPTION;

USE linkenin;
DROP TABLE IF EXISTS token;
DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
    id INT auto_increment PRIMARY KEY,
    nombre VARCHAR(255),
    passwd VARCHAR(255),
    img    VARCHAR(255) DEFAULT './uploads/profile/img/default.jpg',
    correo VARCHAR(255) unique,
    descripcion TEXT,
    verificacion INT DEFAULT 0
);

CREATE TABLE token (
    id INT auto_increment PRIMARY KEY,
    id_usuario INT,
    valor VARCHAR(255),
    tipo INT,
    expiracion DATETIME DEFAULT (NOW() + INTERVAL 7 DAY), -- no consigo que vaya con variable
    CONSTRAINT fk_id_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);

-- ejemplos
INSERT INTO usuarios (nombre, passwd, correo, descripcion)
    VALUES ('admin', '$2y$10$bH6ZpLC3P4hEkCcp5TiHmOgn37KyZZqs9blKaMi8BkeuMwK/7hm7a', 'jorge.duenas@educa.madrid.org', 'Blablablabla');

INSERT INTO usuarios (nombre, passwd, correo, descripcion)
    VALUES ('pepe', '$2y$10$PiLMC2KTlDHeFeZtp/WV7ehhk.Q3T0X2ajqy3DKjrvI01cNimLy6u', 'pepe@educa.madrid.org', 'Blablablabla');