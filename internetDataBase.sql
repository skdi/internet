
CREATE TABLE procesos (
                id INT AUTO_INCREMENT NOT NULL,
                fecha DATE NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE participantes_procesos (
                id INT NOT NULL,
                proceso_id INT NOT NULL,
                Escuela VARCHAR(100) NOT NULL,
                area VARCHAR(20) NOT NULL,
                id_participante VARCHAR NOT NULL,
                area VARCHAR NOT NULL,
                escuela VARCHAR NOT NULL,
                aula VARCHAR NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE participantes (
                id INT NOT NULL,
                dni VARCHAR(8) NOT NULL,
                nombres VARCHAR(100) NOT NULL,
                apellidos VARCHAR(100) NOT NULL,
                codigopostulante VARCHAR(100) NOT NULL,
                tipo_participante VARCHAR(100) NOT NULL,
                estado BOOLEAN NOT NULL
);


CREATE TABLE proceso_pregunta (
                id INT NOT NULL,
                id_participante VARCHAR NOT NULL,
                id_proceso VARCHAR NOT NULL,
                id_pregunta VARCHAR NOT NULL,
                estado VARCHAR NOT NULL,
                area VARCHAR NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE area (
                id INT NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE pregunta (
                id INT NOT NULL,
                titulo VARCHAR(100) NOT NULL,
                descripcion VARCHAR(500) NOT NULL,
                examen_id INT NOT NULL,
                respuesta VARCHAR(1) NOT NULL,
                respuestaImagen VARCHAR NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE Escuela (
                nombre VARCHAR NOT NULL
);


CREATE TABLE aula (
                id INT NOT NULL,
                facultad VARCHAR NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE Tipo_Participante (
                nombre VARCHAR(100) NOT NULL
);


ALTER TABLE participantes_procesos ADD CONSTRAINT procesos_participantes_procesos_fk
FOREIGN KEY (proceso_id)
REFERENCES procesos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pregunta ADD CONSTRAINT procesos_preguntas_fk
FOREIGN KEY (id)
REFERENCES procesos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE proceso_pregunta ADD CONSTRAINT procesos_proceso_pregunta_fk
FOREIGN KEY (id)
REFERENCES procesos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE participantes ADD CONSTRAINT participantes_procesos_participantes_fk
FOREIGN KEY (id)
REFERENCES participantes_procesos (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Relationship has no columns to map:
*/
ALTER TABLE Tipo_Participante ADD CONSTRAINT participantes_tipo_participante_fk
FOREIGN KEY ()
REFERENCES participantes ()
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Relationship has no columns to map:
*/
ALTER TABLE proceso_pregunta ADD CONSTRAINT participantes_proceso_pregunta_fk
FOREIGN KEY ()
REFERENCES participantes ()
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Relationship has no columns to map:
*/
ALTER TABLE area ADD CONSTRAINT proceso_pregunta_area_fk
FOREIGN KEY ()
REFERENCES proceso_pregunta ()
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pregunta ADD CONSTRAINT proceso_pregunta_pregunta_fk
FOREIGN KEY (id)
REFERENCES proceso_pregunta (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Relationship has no columns to map:
*/
ALTER TABLE Escuela ADD CONSTRAINT area_escuela_fk
FOREIGN KEY ()
REFERENCES area ()
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE participantes_procesos ADD CONSTRAINT area_participantes_procesos_fk
FOREIGN KEY (id)
REFERENCES area (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pregunta ADD CONSTRAINT area_pregunta_fk
FOREIGN KEY (id)
REFERENCES area (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

/*
Warning: Relationship has no columns to map:
*/
ALTER TABLE aula ADD CONSTRAINT escuela_aula_fk
FOREIGN KEY ()
REFERENCES Escuela ()
ON DELETE NO ACTION
ON UPDATE NO ACTION;
