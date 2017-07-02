
CREATE TABLE Estudiante (
                id INT NOT NULL,
                dni VARCHAR(8) NOT NULL,
                Nombre VARCHAR(100) NOT NULL,
                Apellido VARCHAR(100) NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE Docente (
                id INT NOT NULL,
                dni VARCHAR(8) NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                Apellido VARCHAR(100) NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE respuestas (
                id INT NOT NULL,
                descripcion VARCHAR(100) NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE examenes (
                id INT NOT NULL,
                fecha DATE NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE areas (
                id INT NOT NULL,
                descripcion VARCHAR(100) NOT NULL
);


CREATE TABLE procesos (
                id INT AUTO_INCREMENT NOT NULL,
                descripcion VARCHAR(100) NOT NULL,
                fecha DATE NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE preguntas (
                id INT NOT NULL,
                titulo VARCHAR(100) NOT NULL,
                descripcion VARCHAR(500) NOT NULL,
                examen_id INT NOT NULL
);


CREATE TABLE porteros (
                id INT NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                apellido VARCHAR(100) NOT NULL,
                participaciones INT NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE Administrativo (
                id INT NOT NULL,
                dni VARCHAR(8) NOT NULL,
                Nombre VARCHAR(100) NOT NULL,
                Apellido VARCHAR(100) NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE controladorespuerta (
                id INT NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                apellido VARCHAR NOT NULL,
                participaciones INT NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE conserjes (
                id INT NOT NULL,
                nombre VARCHAR(100) AUTO_INCREMENT NOT NULL,
                apellido VARCHAR(100) NOT NULL,
                participaciones INT NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE contadores (
                id INT NOT NULL,
                dni VARCHAR(8) NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                apellido VARCHAR(100) NOT NULL,
                participaciones INT NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE controladores (
                id INT NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                apellidos VARCHAR(100) NOT NULL,
                participaciones INT NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE tecnicos (
                id INT NOT NULL,
                dni CHAR(8) NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                apellido VARCHAR(100) NOT NULL,
                participaciones INT NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE formuladores (
                id INT NOT NULL,
                dni VARCHAR(8) NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                apellido VARCHAR(100) NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE participantes (
                id INT NOT NULL,
                dni VARCHAR(8) NOT NULL,
                nombres VARCHAR(100) NOT NULL,
                apellidos VARCHAR(100) NOT NULL,
                codigopostulante VARCHAR(100) NOT NULL
);


CREATE TABLE participantes_procesos (
                id INT NOT NULL,
                proceso_id INT NOT NULL,
                ingresante BOOLEAN AUTO_INCREMENT NOT NULL,
                puntajealcanzado DOUBLE PRECISIONS NOT NULL,
                Escuela VARCHAR(100) NOT NULL,
                codigo INT NOT NULL,
                area VARCHAR(20) NOT NULL,
                PRIMARY KEY (id)
);


ALTER TABLE controladores ADD CONSTRAINT estudiante_controladores_fk
FOREIGN KEY (id)
REFERENCES Estudiante (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE contadores ADD CONSTRAINT estudiante_contadores_fk
FOREIGN KEY (id)
REFERENCES Estudiante (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE formuladores ADD CONSTRAINT docente_formuladores_fk
FOREIGN KEY (id)
REFERENCES Docente (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Column types mismatch in the following column mapping(s):
        id: INTEGER -- titulo: VARCHAR(100)
*/
ALTER TABLE preguntas ADD CONSTRAINT respuestas_preguntas_fk
FOREIGN KEY (titulo)
REFERENCES respuestas (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Column types mismatch in the following column mapping(s):
        id: INTEGER -- titulo: VARCHAR(100)
*/
ALTER TABLE preguntas ADD CONSTRAINT examenes_preguntas_fk
FOREIGN KEY (titulo)
REFERENCES examenes (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Column types mismatch in the following column mapping(s):
        id: INTEGER -- descripcion: VARCHAR(100)
*/
ALTER TABLE areas ADD CONSTRAINT examenes_areas_fk
FOREIGN KEY (descripcion)
REFERENCES examenes (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE participantes_procesos ADD CONSTRAINT procesos_participantes_procesos_fk
FOREIGN KEY (proceso_id)
REFERENCES procesos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE preguntas ADD CONSTRAINT procesos_preguntas_fk
FOREIGN KEY (id)
REFERENCES procesos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Column types mismatch in the following column mapping(s):
        id: INTEGER -- dni: VARCHAR(8)
*/
ALTER TABLE participantes ADD CONSTRAINT porteros_participantes_fk
FOREIGN KEY (dni)
REFERENCES porteros (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE Administrativo ADD CONSTRAINT porteros_administrativo_fk
FOREIGN KEY (id)
REFERENCES porteros (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE conserjes ADD CONSTRAINT administrativo_conserjes_fk
FOREIGN KEY (id)
REFERENCES Administrativo (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE controladorespuerta ADD CONSTRAINT administrativo_controladorespuerta_fk
FOREIGN KEY (id)
REFERENCES Administrativo (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tecnicos ADD CONSTRAINT administrativo_tecnicos_fk
FOREIGN KEY (id)
REFERENCES Administrativo (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Relationship has no columns to map:
*/
ALTER TABLE participantes ADD CONSTRAINT controladorespuerta_participantes_fk
FOREIGN KEY ()
REFERENCES controladorespuerta ()
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Column types mismatch in the following column mapping(s):
        id: INTEGER -- dni: VARCHAR(8)
*/
ALTER TABLE participantes ADD CONSTRAINT conserjes_participantes_fk
FOREIGN KEY (dni)
REFERENCES conserjes (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Column types mismatch in the following column mapping(s):
        id: INTEGER -- dni: VARCHAR(8)
*/
ALTER TABLE participantes ADD CONSTRAINT contadores_participantes_fk
FOREIGN KEY (dni)
REFERENCES contadores (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Column types mismatch in the following column mapping(s):
        id: INTEGER -- dni: VARCHAR(8)
*/
ALTER TABLE participantes ADD CONSTRAINT controladores_participantes_fk
FOREIGN KEY (dni)
REFERENCES controladores (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Column types mismatch in the following column mapping(s):
        id: INTEGER -- dni: VARCHAR(8)
*/
ALTER TABLE participantes ADD CONSTRAINT tecnicos_participantes_fk
FOREIGN KEY (dni)
REFERENCES tecnicos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE participantes ADD CONSTRAINT formuladores_participantes_fk
FOREIGN KEY (id)
REFERENCES formuladores (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Relationship has no columns to map:
*/
ALTER TABLE participantes_procesos ADD CONSTRAINT participantes_participantes_procesos_fk
FOREIGN KEY ()
REFERENCES participantes ()
ON DELETE NO ACTION
ON UPDATE NO ACTION;