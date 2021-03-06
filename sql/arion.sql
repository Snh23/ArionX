CREATE DATABASE arion
    DEFAULT CHARACTER SET utf8;

USE arion;

CREATE TABLE usuarios (
	id INT NOT NULL UNIQUE AUTO_INCREMENT,
	nombre VARCHAR(25) NOT NULL UNIQUE,
	apellidos VARCHAR (255) NOT NULL,
    usuario VARCHAR (25) NOT NULL UNIQUE,
	email VARCHAR(150) NOT NULL,
	password VARCHAR(255) NOT NULL,
	fecha_reg DATETIME NOT NULL,
	activo TINYINT NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE entradas (
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    autor_id INT NOT NULL,
    url VARCHAR(255) NOT NULL UNIQUE,
    titulo  VARCHAR (255) NOT NULL UNIQUE,
    texto TEXT CHARACTER SET utf8 NOT NULL,
    fecha DATETIME NOT NULL,
    activa TINYINT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (autor_id)
        REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);

CREATE TABLE comentarios(
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    autor_id INT NOT NULL,
    entrada_id INT NOT NULL,
    titulo  VARCHAR (255) NOT NULL,
    texto TEXT CHARACTER SET utf8 NOT NULL,
    fecha DATETIME NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (autor_id)
        REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT,
    FOREIGN KEY (entrada_id)
        REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);
CREATE TABLE recupera_clave(
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    usuario_id INT NOT NULL,
    url_secreta VARCHAR(255) NOT NULL,
    fecha DATETIME NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (usuario_id)
        REFERENCES usuarios(id)
        ON UPDATE CASCADE
        ON DELETE RESTRICT
);