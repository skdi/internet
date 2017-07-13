
CREATE TABLE escuela (
                id_escuela INT AUTO_INCREMENT NOT NULL,
                nombre VARCHAR(30) NOT NULL,
                PRIMARY KEY (id_escuela)
);


CREATE TABLE proceso (
                id_proceso VARCHAR(100) NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                fecha DATE NOT NULL,
                PRIMARY KEY (id_proceso)
);


CREATE TABLE examen (
                id_examen INT NOT NULL,
                descripcion VARCHAR(100) NOT NULL,
                id_proceso VARCHAR(100) NOT NULL,
                PRIMARY KEY (id_examen)
);


CREATE TABLE pregunta (
                id_pregunta INT AUTO_INCREMENT NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                titulo VARCHAR(100) NOT NULL,
                descripcion VARCHAR(100) NOT NULL,
                respuesta VARCHAR(1) NOT NULL,
                respuesta_imagen VARCHAR(500) NOT NULL,
                examen_id INT NOT NULL,
                id_examen INT NOT NULL,
                a VARCHAR(1) NOT NULL,
                b VARCHAR(1) NOT NULL,
                c VARCHAR(1) NOT NULL,
                d VARCHAR(1) NOT NULL,
                e VARCHAR(1) NOT NULL,
                PRIMARY KEY (id_pregunta)
);


CREATE TABLE detalle_participante (
                id_detalle_participante INT AUTO_INCREMENT NOT NULL,
                facultad VARCHAR(100) NOT NULL,
                regimen VARCHAR(100) NOT NULL,
                dependencia VARCHAR(100) NOT NULL,
                PRIMARY KEY (id_detalle_participante)
);


CREATE TABLE tipo_participacion (
                id_tipo_participacion INT NOT NULL,
                nombre VARCHAR(20) NOT NULL,
                id_detalle_participante INT NOT NULL,
                PRIMARY KEY (id_tipo_participacion)
);


CREATE TABLE tipo_participante (
                id_tipo_participante INT AUTO_INCREMENT NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                PRIMARY KEY (id_tipo_participante)
);


CREATE TABLE participante (
                dni VARCHAR(8) NOT NULL,
                nombre VARCHAR(100) NOT NULL,
                apellido VARCHAR(100) NOT NULL,
                id_tipo_participante INT NOT NULL,
                id_detalle_participante INT NOT NULL,
                telefono VARCHAR(10) NOT NULL,
                correo VARCHAR(30) NOT NULL,
                PRIMARY KEY (dni)
);


CREATE TABLE proceso_participante (
                id_proceso_participante INT NOT NULL,
                dni VARCHAR(8) NOT NULL,
                id_proceso VARCHAR(100) NOT NULL,
                PRIMARY KEY (id_proceso_participante)
);


CREATE TABLE area (
                nombre VARCHAR(20) NOT NULL,
                id_proceso_participante INT NOT NULL,
                PRIMARY KEY (nombre)
);


CREATE TABLE aula (
                id_aula INT AUTO_INCREMENT NOT NULL,
                facultad VARCHAR(100) NOT NULL,
                id_escuela INT NOT NULL,
                nombre VARCHAR(20) NOT NULL,
                PRIMARY KEY (id_aula)
);


ALTER TABLE aula ADD CONSTRAINT escuela_aula_fk
FOREIGN KEY (id_escuela)
REFERENCES escuela (id_escuela)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE examen ADD CONSTRAINT proceso_examen_fk
FOREIGN KEY (id_proceso)
REFERENCES proceso (id_proceso)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE proceso_participante ADD CONSTRAINT proceso_proceso_participante_fk
FOREIGN KEY (id_proceso)
REFERENCES proceso (id_proceso)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pregunta ADD CONSTRAINT examen_pregunta_fk
FOREIGN KEY (id_examen)
REFERENCES examen (id_examen)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE participante ADD CONSTRAINT detalle_participante_participante_fk
FOREIGN KEY (id_detalle_participante)
REFERENCES detalle_participante (id_detalle_participante)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE tipo_participacion ADD CONSTRAINT detalle_participante_tipo_participacion_fk
FOREIGN KEY (id_detalle_participante)
REFERENCES detalle_participante (id_detalle_participante)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE participante ADD CONSTRAINT tipo_participante_participante_fk
FOREIGN KEY (id_tipo_participante)
REFERENCES tipo_participante (id_tipo_participante)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE proceso_participante ADD CONSTRAINT participante_proceso_participante_fk
FOREIGN KEY (dni)
REFERENCES participante (dni)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE area ADD CONSTRAINT proceso_participante_area_fk
FOREIGN KEY (id_proceso_participante)
REFERENCES proceso_participante (id_proceso_participante)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE aula ADD CONSTRAINT area_aula_fk
FOREIGN KEY (nombre)
REFERENCES area (nombre)
ON DELETE NO ACTION
ON UPDATE NO ACTION;
