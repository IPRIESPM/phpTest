CREATE DATABASE IF NOT EXISTS tpv_cafeteria;
USE tpv_cafeteria;

-- Tabla para gestionar las mesas
CREATE TABLE IF NOT EXISTS mesas (
    numero INT PRIMARY KEY,
    estado ENUM('LIBRE', 'OCUPADA') NOT NULL
);

-- Tabla para gestionar los productos disponibles en la carta
CREATE TABLE IF NOT EXISTS productos (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    precio DECIMAL(10,2) NOT NULL
);

-- Tabla para gestionar las consumiciones asociadas a cada mesa
CREATE TABLE IF NOT EXISTS consumiciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_mesa INT,
    codigo_articulo INT,
    FOREIGN KEY (numero_mesa) REFERENCES mesas(numero),
    FOREIGN KEY (codigo_articulo) REFERENCES productos(codigo)
);
