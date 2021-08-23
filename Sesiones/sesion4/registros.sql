CREATE DATABASE registro_usuarios;

USE registro_usuarios;

CREATE TABLE registros(
	rut VARCHAR(50) NOT NULL, 
	nombre VARCHAR(50) NOT NULL,
	apellido VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	contraseña VARCHAR(50) NOT NULL,
	PRIMARY KEY(rut)
)charset=latin1;

INSERT INTO registros(rut, nombre, apellido, email, contraseña) VALUES
("180332403", "Juanito", "Pérez", "jperez@gmail.com", "JP2016"),
("153204209", "Blanca", "Ríos", "brios@hotmail.com", "BR2016");