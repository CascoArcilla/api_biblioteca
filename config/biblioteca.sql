CREATE DATABASE biblioteca;

USE biblioteca;

CREATE TABLE libros (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(255),
    autor VARCHAR(255),
    genero VARCHAR(50),
    fecha_publicacion DATE
);
