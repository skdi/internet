CREATE TABLE `area` (
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `aula` (
  `id_aula` int(11) NOT NULL,
  `facultad` varchar(100) NOT NULL,
  `id_escuela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `detalle_participante` (
  `id_detalle_participante` int(11) NOT NULL,
  `facultad` varchar(100) NOT NULL,
  `regimen` varchar(100) NOT NULL,
  `dependencia` varchar(100) NOT NULL,
  `id_participante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `escuela` (
  `id_escuela` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `area_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `participante` (
  `id_participante` int(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `tipo_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `pregunta` (
  `id_pregunta` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `respuesta` varchar(1) NOT NULL,
  `respuesta_imagen` varchar(500) NOT NULL,
  `id_participante` int(11) NOT NULL,
  `id_proceso` varchar(100) DEFAULT NULL,
  `a` varchar(150) NOT NULL,
  `b` varchar(150) NOT NULL,
  `c` varchar(150) NOT NULL,
  `d` varchar(150) NOT NULL,
  `e` varchar(150) NOT NULL,
  `estado` char(1) NOT NULL,
  `area` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `proceso` (
  `id_proceso` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `proceso_participante` (
  `id_proceso_participante` int(11) NOT NULL,
  `id_proceso` varchar(100) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_participante` int(11) NOT NULL,
  `id_aula` int(11) DEFAULT NULL,
  `id_escuela` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tipo_participacion` (
  `id_tipo_participacion` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_participante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tipo_participante` (
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `usuario` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `area`
  ADD PRIMARY KEY (`nombre`);

ALTER TABLE `aula`
  ADD PRIMARY KEY (`id_aula`),
  ADD KEY `escuela_aula_fk` (`id_escuela`);

ALTER TABLE `detalle_participante`
  ADD PRIMARY KEY (`id_detalle_participante`),
  ADD KEY `participante_detalle_participante_fk` (`id_participante`);

ALTER TABLE `escuela`
  ADD PRIMARY KEY (`id_escuela`),
  ADD KEY `area_escuela_fk` (`area_nombre`);

ALTER TABLE `participante`
  ADD PRIMARY KEY (`id_participante`),
  ADD KEY `nombre_tipo_fk` (`tipo_nombre`);

ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `id_participante_fk` (`id_participante`),
  ADD KEY `id_proceso_fk` (`id_proceso`),
  ADD KEY `area_fk` (`area`);

ALTER TABLE `proceso`
  ADD PRIMARY KEY (`id_proceso`);

ALTER TABLE `proceso_participante`
  ADD PRIMARY KEY (`id_proceso_participante`),
  ADD KEY `area_proceso_participante_fk` (`nombre`),
  ADD KEY `proceso_proceso_participante_fk` (`id_proceso`),
  ADD KEY `participante_proceso_participante_fk` (`id_participante`),
  ADD KEY `id_aula_fk` (`id_aula`),
  ADD KEY `id_escuela_fka` (`id_escuela`);

ALTER TABLE `tipo_participacion`
  ADD PRIMARY KEY (`id_tipo_participacion`),
  ADD KEY `participante_tipo_participacion_fk` (`id_participante`);

ALTER TABLE `tipo_participante`
  ADD PRIMARY KEY (`nombre`);


ALTER TABLE `aula`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `detalle_participante`
  MODIFY `id_detalle_participante` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `escuela`
  MODIFY `id_escuela` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `aula`
  ADD CONSTRAINT `escuela_aula_fk` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `detalle_participante`
  ADD CONSTRAINT `participante_detalle_participante_fk` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `escuela`
  ADD CONSTRAINT `area_escuela_fk` FOREIGN KEY (`area_nombre`) REFERENCES `area` (`nombre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `participante`
  ADD CONSTRAINT `nombre_tipo_fk` FOREIGN KEY (`tipo_nombre`) REFERENCES `tipo_participante` (`nombre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `pregunta`
  ADD CONSTRAINT `area_fk` FOREIGN KEY (`area`) REFERENCES `area` (`nombre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_participante_fk` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_proceso_fk` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id_proceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `proceso_participante`
  ADD CONSTRAINT `area_proceso_participante_fk` FOREIGN KEY (`nombre`) REFERENCES `area` (`nombre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_aula_fk` FOREIGN KEY (`id_aula`) REFERENCES `aula` (`id_aula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_escuela_fka` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `participante_proceso_participante_fk` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `proceso_proceso_participante_fk` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id_proceso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `tipo_participacion`
  ADD CONSTRAINT `participante_tipo_participacion_fk` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE NO ACTION ON UPDATE NO ACTION;
