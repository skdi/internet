-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2017 a las 04:23:07
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `id_aula` int(11) NOT NULL,
  `facultad` varchar(100) NOT NULL,
  `id_escuela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_participante`
--

CREATE TABLE `detalle_participante` (
  `id_detalle_participante` int(11) NOT NULL,
  `facultad` varchar(100) NOT NULL,
  `regimen` varchar(100) NOT NULL,
  `dependencia` varchar(100) NOT NULL,
  `id_participante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

CREATE TABLE `escuela` (
  `id_escuela` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `area_nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE `participante` (
  `id_participante` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `tipo_nombre` varchar(100) NOT NULL,
  `veces_participo` int(4) NOT NULL,
  `tipo_participacion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`id_participante`, `dni`, `nombre`, `apellido`, `telefono`, `correo`, `tipo_nombre`, `veces_participo`, `tipo_participacion`) VALUES
(2, 1231231, 'Franco Duilmarc', 'Chavez Ponce', '1231231', 'asdasd', 'Administrativo', 0, 'Conserje'),
(3, 12312311, 'asdasda', 'fasfa', '1123123', 'asfafasf', 'Administrativo', 0, 'Contador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id_pregunta` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `respuesta` varchar(1) NOT NULL,
  `respuesta_imagen` varchar(500) NOT NULL,
  `id_participante` int(11) DEFAULT NULL,
  `id_proceso` int(11) NOT NULL,
  `a` varchar(1) NOT NULL,
  `b` varchar(1) NOT NULL,
  `c` varchar(1) NOT NULL,
  `d` varchar(1) NOT NULL,
  `e` varchar(1) NOT NULL,
  `estado` char(1) NOT NULL,
  `area` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `id_proceso` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_participante`
--

CREATE TABLE `proceso_participante` (
  `id_proceso_participante` int(11) NOT NULL,
  `id_proceso` int(11) NOT NULL,
  `id_participante` int(11) NOT NULL,
  `area` varchar(20) NOT NULL,
  `id_aula` int(11) DEFAULT NULL,
  `id_escuela` int(11) DEFAULT NULL,
  `participacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_participacion`
--

CREATE TABLE `tipo_participacion` (
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_participacion`
--

INSERT INTO `tipo_participacion` (`nombre`) VALUES
('Conserje'),
('Contador'),
('Controlador'),
('Controlador Puerta'),
('Formulador'),
('Portero'),
('Tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_participante`
--

CREATE TABLE `tipo_participante` (
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_participante`
--

INSERT INTO `tipo_participante` (`nombre`) VALUES
('Administrativo'),
('Docente'),
('Estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`id_aula`),
  ADD KEY `escuela_aula_fk` (`id_escuela`);

--
-- Indices de la tabla `detalle_participante`
--
ALTER TABLE `detalle_participante`
  ADD PRIMARY KEY (`id_detalle_participante`),
  ADD KEY `participante_detalle_participante_fk` (`id_participante`);

--
-- Indices de la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD PRIMARY KEY (`id_escuela`),
  ADD KEY `area_escuela_fk` (`area_nombre`);

--
-- Indices de la tabla `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`id_participante`),
  ADD KEY `participante_tipo` (`tipo_nombre`),
  ADD KEY `participante_participacion` (`tipo_participacion`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `pregunta_participante_fk` (`id_participante`),
  ADD KEY `pregunta_proceso_fk` (`id_proceso`),
  ADD KEY `pregunta_area_fk` (`area`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`id_proceso`);

--
-- Indices de la tabla `proceso_participante`
--
ALTER TABLE `proceso_participante`
  ADD PRIMARY KEY (`id_proceso_participante`),
  ADD KEY `participacion_fk` (`participacion`),
  ADD KEY `escuela_fk` (`id_escuela`),
  ADD KEY `aula__fk` (`id_aula`),
  ADD KEY `area__fk` (`area`),
  ADD KEY `id_proceso_fk` (`id_proceso`),
  ADD KEY `id_participante_fk` (`id_participante`);

--
-- Indices de la tabla `tipo_participacion`
--
ALTER TABLE `tipo_participacion`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `tipo_participante`
--
ALTER TABLE `tipo_participante`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_participante`
--
ALTER TABLE `detalle_participante`
  MODIFY `id_detalle_participante` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `id_escuela` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `participante`
--
ALTER TABLE `participante`
  MODIFY `id_participante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `id_proceso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proceso_participante`
--
ALTER TABLE `proceso_participante`
  MODIFY `id_proceso_participante` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `escuela_aula_fk` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_participante`
--
ALTER TABLE `detalle_participante`
  ADD CONSTRAINT `participante_detalle_participante_fk` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD CONSTRAINT `area_escuela_fk` FOREIGN KEY (`area_nombre`) REFERENCES `area` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `participante_participacion` FOREIGN KEY (`tipo_participacion`) REFERENCES `tipo_participacion` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participante_tipo` FOREIGN KEY (`tipo_nombre`) REFERENCES `tipo_participante` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_area_fk` FOREIGN KEY (`area`) REFERENCES `area` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pregunta_participante_fk` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pregunta_proceso_fk` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id_proceso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proceso_participante`
--
ALTER TABLE `proceso_participante`
  ADD CONSTRAINT `area__fk` FOREIGN KEY (`area`) REFERENCES `area` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aula__fk` FOREIGN KEY (`id_aula`) REFERENCES `aula` (`id_aula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `escuela_fk` FOREIGN KEY (`id_escuela`) REFERENCES `escuela` (`id_escuela`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_participante_fk` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_proceso_fk` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id_proceso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participacion_fk` FOREIGN KEY (`participacion`) REFERENCES `tipo_participacion` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
