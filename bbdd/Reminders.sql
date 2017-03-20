DROP DATABASE IF EXISTS Reminders;
CREATE DATABASE Reminders;
USE Reminders;

DROP TABLE IF EXISTS Usuario;
CREATE TABLE Usuario(
DNI VARCHAR(9) PRIMARY KEY,
Nombre VARCHAR(32) NOT NULL,
Apellido VARCHAR(64) NOT NULL,
Email VARCHAR(128) UNIQUE KEY,
NombreUsuario VARCHAR(32) UNIQUE KEY,
Pwd VARCHAR(32) NOT NULL,
FechaNacimiento DATE NOT NULL
);

INSERT INTO Usuario VALUES
('00000000A','Juan','Pérez López','juanperezlopez@gmail.com','jperlop25','1234','1990-02-04'),
('00000001B','Manuel','Sánchez García','manusangar3@hotmail.com','manu31993','1234','1993-03-03'),
('00000002C','Francisco','Giménez Martos','francisco1982@gmail.com','fran198224','1234','1982-10-24'),
('00000003D','Ana','López Rivas','analopriv@gmail.com','analopriv','1234','1993-09-23'),
('00000004E','Isabel','Martínez Luengo','isabelmarlu@gmail.com','isamarlu22','1234','1989-12-22'),
('00000005F','Pedro','Manso Miranda','pedmanmir@yahoo.es','pedro1990','1234','1990-05-12');

DROP TABLE IF EXISTS Recordatorio;
CREATE TABLE Recordatorio(
ID INT(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
IDUsuario VARCHAR(9) NOT NULL,
Asunto VARCHAR(256) NOT NULL,
Ubicacion VARCHAR(128) NOT NULL,
Completo BOOL DEFAULT FALSE,
FechaCreacion DATETIME DEFAULT CURRENT_TIMESTAMP,
FechaVencimiento DATETIME NOT NULL,
FOREIGN KEY (IDUsuario) REFERENCES Usuario (DNI) ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO Recordatorio (IDUsuario, Asunto, Ubicacion, FechaVencimiento) VALUES
('00000000A','Recordatorio de prueba numero 1','Madrid','2017-08-09 10:00:00'),
('00000000A','Recordatorio de prueba numero 2','Madrid','2017-08-09 10:00:00'),
('00000001B','Recordatorio de prueba numero 1','Madrid','2017-08-09 10:00:00'),
('00000001B','Recordatorio de prueba numero 2','Madrid','2017-08-09 10:00:00'),
('00000002C','Recordatorio de prueba numero 1','Madrid','2017-08-09 10:00:00'),
('00000003D','Recordatorio de prueba numero 1','Madrid','2017-08-09 10:00:00'),
('00000004E','Recordatorio de prueba numero 1','Madrid','2017-08-09 10:00:00'),
('00000005F','Recordatorio de prueba numero 1','Madrid','2017-08-09 10:00:00');