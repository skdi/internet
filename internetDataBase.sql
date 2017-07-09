
CREATE TABLE proceso (
                fecha DATE NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                PRIMARY KEY (fecha)
);


CREATE TABLE detalle_participante (
                id_detalle_participante INT NOT NULL,
                facultad VARCHAR(100) NOT NULL,
                regimen VARCHAR(100) NOT NULL,
                dependencia VARCHAR(100) NOT NULL,
                PRIMARY KEY (id_detalle_participante)
);


CREATE TABLE tipo_participante (
                id_tipo_participante INT NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                funcion VARCHAR(100) NOT NULL,
                PRIMARY KEY (id_tipo_participante)
);


CREATE TABLE participante (
                dni VARCHAR(8) NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                apellido VARCHAR(100) NOT NULL,
                id_tipo_participante INT NOT NULL,
                id_detalle_participante INT NOT NULL,
                id_participante_proceso INT NOT NULL,
                fecha DATE NOT NULL,
                PRIMARY KEY (dni)
);


CREATE TABLE proceso_pregunta (
                id_proceso_pregunta INT NOT NULL,
                estado BOOLEAN NOT NULL,
                dni VARCHAR(8) NOT NULL,
                fecha DATE NOT NULL,
                PRIMARY KEY (id_proceso_pregunta)
);


CREATE TABLE area (
                nombre VARCHAR(20) NOT NULL,
                id_proceso_pregunta INT NOT NULL,
                PRIMARY KEY (nombre)
);


CREATE TABLE participante_proceso (
                id_participante_proceso INT NOT NULL,
                escuela VARCHAR NOT NULL,
                area VARCHAR NOT NULL,
                aula INT NOT NULL,
                fecha DATE NOT NULL,
                nombre VARCHAR(20) NOT NULL,
                PRIMARY KEY (id_participante_proceso)
);


CREATE TABLE escuela (
                id_escuela INT NOT NULL,
                nombre VARCHAR(30) NOT NULL,
                area_nombre VARCHAR(20) NOT NULL,
                PRIMARY KEY (id_escuela)
);


CREATE TABLE aula (
                id_aula INT NOT NULL,
                facultad VARCHAR(100) NOT NULL,
                id_escuela INT NOT NULL,
                PRIMARY KEY (id_aula)
);


CREATE TABLE pregunta (
                id_pregunta INT NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                titulo VARCHAR(100) NOT NULL,
                descripcion VARCHAR(100) NOT NULL,
                respuesta VARCHAR(1) NOT NULL,
                respuesta_imagen OTHER NOT NULL,
                examen_id INT NOT NULL,
                fecha DATE NOT NULL,
                area_nombre VARCHAR(20) NOT NULL,
                id_proceso_pregunta INT NOT NULL,
                PRIMARY KEY (id_pregunta)
);


ALTER TABLE participante_proceso ADD CONSTRAINT proceso_participante_proceso_fk
FOREIGN KEY (fecha)
REFERENCES proceso (fecha)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE proceso_pregunta ADD CONSTRAINT proceso_proceso_pregunta_fk
FOREIGN KEY (fecha)
REFERENCES proceso (fecha)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pregunta ADD CONSTRAINT proceso_pregunta_fk
FOREIGN KEY (fecha)
REFERENCES proceso (fecha)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE participante ADD CONSTRAINT proceso_participante_fk
FOREIGN KEY (fecha)
REFERENCES proceso (fecha)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE participante ADD CONSTRAINT detalle_participante_participante_fk
FOREIGN KEY (id_detalle_participante)
REFERENCES detalle_participante (id_detalle_participante)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE participante ADD CONSTRAINT tipo_participante_participante_fk
FOREIGN KEY (id_tipo_participante)
REFERENCES tipo_participante (id_tipo_participante)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE proceso_pregunta ADD CONSTRAINT participante_proceso_pregunta_fk
FOREIGN KEY (dni)
REFERENCES participante (dni)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pregunta ADD CONSTRAINT proceso_pregunta_pregunta_fk
FOREIGN KEY (id_proceso_pregunta)
REFERENCES proceso_pregunta (id_proceso_pregunta)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE area ADD CONSTRAINT proceso_pregunta_area_fk
FOREIGN KEY (id_proceso_pregunta)
REFERENCES proceso_pregunta (id_proceso_pregunta)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pregunta ADD CONSTRAINT area_pregunta_fk
FOREIGN KEY (area_nombre)
REFERENCES area (nombre)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE escuela ADD CONSTRAINT area_escuela_fk
FOREIGN KEY (area_nombre)
REFERENCES area (nombre)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE participante_proceso ADD CONSTRAINT area_participante_proceso_fk
FOREIGN KEY (nombre)
REFERENCES area (nombre)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE participante ADD CONSTRAINT participante_proceso_participante_fk
FOREIGN KEY (id_participante_proceso)
REFERENCES participante_proceso (id_participante_proceso)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE aula ADD CONSTRAINT escuela_aula_fk
FOREIGN KEY (id_escuela)
REFERENCES escuela (id_escuela)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
