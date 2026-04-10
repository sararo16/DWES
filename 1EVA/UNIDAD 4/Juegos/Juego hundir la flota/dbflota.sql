DROP DATABASE IF EXISTS dbflota;
CREATE DATABASE dbflota;
USE dbflota;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) UNIQUE,
    clave VARCHAR(255) NOT NULL
);

CREATE TABLE partidas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    puntos INT, -- Calcularemos: 50 - número de disparos
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);

INSERT INTO usuarios (nombre, clave) VALUES ('alumno', '1234');