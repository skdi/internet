-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2017 a las 08:54:11
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `numero` int(11) NOT NULL,
  `escuela` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

CREATE TABLE `escuela` (
  `nombre` varchar(255) NOT NULL,
  `area` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE `participante` (
  `id` int(11) NOT NULL,
  `tipo` char(1) NOT NULL,
  `dni` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `dependencia` varchar(100) DEFAULT NULL,
  `facultad` varchar(100) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `regimen` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `enunciado` tinytext NOT NULL,
  `respuesta` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `id` int(15) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_participante`
--

CREATE TABLE `proceso_participante` (
  `id` int(11) NOT NULL,
  `id_participante` int(11) NOT NULL,
  `id_proceso` int(15) NOT NULL,
  `area` varchar(50) NOT NULL,
  `escuela` varchar(250) DEFAULT NULL,
  `aula` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_pregunta`
--

CREATE TABLE `proceso_pregunta` (
  `id` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_participante` int(11) NOT NULL,
  `id_proceso` int(15) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_participante`
--

CREATE TABLE `tipo_participante` (
  `cargo` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `funcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `con` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `correo`, `usuario`, `con`) VALUES
(11111, 'franco', 'franco@gmail.com', 'dui', 'dui');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `escuela` (`escuela`);

--
-- Indices de la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD PRIMARY KEY (`nombre`),
  ADD KEY `area` (`area`);

--
-- Indices de la tabla `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cargo` (`cargo`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proceso_participante`
--
ALTER TABLE `proceso_participante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area` (`area`),
  ADD KEY `aula` (`aula`),
  ADD KEY `escuela` (`escuela`),
  ADD KEY `id_proceso` (`id_proceso`),
  ADD KEY `id_participante` (`id_participante`);

--
-- Indices de la tabla `proceso_pregunta`
--
ALTER TABLE `proceso_pregunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pregunta` (`id_pregunta`),
  ADD KEY `id_participante` (`id_participante`),
  ADD KEY `id_proceso` (`id_proceso`);

--
-- Indices de la tabla `tipo_participante`
--
ALTER TABLE `tipo_participante`
  ADD PRIMARY KEY (`cargo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `participante`
--
ALTER TABLE `participante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proceso_participante`
--
ALTER TABLE `proceso_participante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proceso_pregunta`
--
ALTER TABLE `proceso_pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `aula_ibfk_1` FOREIGN KEY (`escuela`) REFERENCES `escuela` (`nombre`);

--
-- Filtros para la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD CONSTRAINT `escuela_ibfk_1` FOREIGN KEY (`area`) REFERENCES `area` (`area`);

--
-- Filtros para la tabla `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `participante_ibfk_1` FOREIGN KEY (`cargo`) REFERENCES `tipo_participante` (`cargo`);

--
-- Filtros para la tabla `proceso_participante`
--
ALTER TABLE `proceso_participante`
  ADD CONSTRAINT `proceso_participante_ibfk_1` FOREIGN KEY (`area`) REFERENCES `area` (`area`),
  ADD CONSTRAINT `proceso_participante_ibfk_2` FOREIGN KEY (`aula`) REFERENCES `aula` (`numero`),
  ADD CONSTRAINT `proceso_participante_ibfk_3` FOREIGN KEY (`escuela`) REFERENCES `escuela` (`nombre`),
  ADD CONSTRAINT `proceso_participante_ibfk_4` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id`),
  ADD CONSTRAINT `proceso_participante_ibfk_5` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id`);

--
-- Filtros para la tabla `proceso_pregunta`
--
ALTER TABLE `proceso_pregunta`
  ADD CONSTRAINT `proceso_pregunta_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`id`),
  ADD CONSTRAINT `proceso_pregunta_ibfk_2` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id`),
  ADD CONSTRAINT `proceso_pregunta_ibfk_3` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
