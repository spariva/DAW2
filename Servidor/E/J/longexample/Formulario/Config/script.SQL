-- DROP TABLE PracticaExamen;
CREATE TABLE PracticaExamen (
	id INT NOT NULL AUTO_INCREMENT,
    Nombre varchar(20) NOT NULL,
    Apellidos varchar(30) NOT NULL,
    Genero varchar(10) NOT NULL,
    Edad INT NOT NULL,
    FechaNacimiento DATE NOT NULL,
    Localidad varchar(30) NOT NULL,
    Usuario varchar(20) NOT NULL UNIQUE,
    Email varchar(40) NOT NULL UNIQUE,
    Contrasenya varchar(60) NOT NULL,
    Cursos varchar(60),
    SobreTi varchar(120),
    PRIMARY KEY (id)
);