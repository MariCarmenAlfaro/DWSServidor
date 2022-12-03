-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-06-2018 a las 05:11:14
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `torneosgms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(100) NOT NULL,
  `mensaje` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `mensaje`) VALUES
(1, 'Buenos días, ¡comienza el partido!'),
(2, '¡Goooool de Pepe! del equipo de Los profes.'),
(3, 'Final del partido, victoria para el equipo de Los profes.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportes`
--

CREATE TABLE `deportes` (
  `id_deporte` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_torneo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `deportes`
--

INSERT INTO `deportes` (`id_deporte`, `nombre`, `id_torneo`) VALUES
(1, 'Futbol', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `puntos` int(10) DEFAULT '0',
  `id_partido` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nombre`, `puntos`, `id_partido`) VALUES
(1, '1 ESO', 12, NULL),
(2, '2 ESO', 6, NULL),
(4, 'Los lobos', 11, NULL),
(7, 'Angeles guardianes', 5, NULL),
(13, 'Los Cifuentes', 7, NULL),
(14, 'Los Gaviotas', 3, NULL),
(23, 'Los profes', 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id_jugador` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `dorsal` int(3) DEFAULT NULL,
  `id_equipo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id_jugador`, `nombre`, `apellidos`, `email`, `sexo`, `dorsal`, `id_equipo`) VALUES
(10, 'Juana', 'Cortés', '', '', NULL, NULL),
(11, 'Juan', '', '', 'M', NULL, NULL),
(12, 'Maria', 'Juarez', 'msuarez@gmail.com', 'F', NULL, NULL),
(13, 'Eugenia', 'Lopez', 'euge@gmail.com', 'F', 19, NULL),
(15, 'Rafel', 'Amengual', 'ramengual@correo.es', 'M', 7, NULL),
(25, 'Manolo', 'Peralta', 'mp@gmail.com', 'M', 1, 4),
(26, 'Juan', 'Vidal', 'jv@gmail.com', 'M', 2, 1),
(27, 'Ines', 'Lorca', 'Il@gmail.com', 'F', 23, 2),
(30, 'Rafel', 'Amengual', 'rafel@gmail.com', 'M', 7, 7),
(31, 'Manolo', 'Sarria', 'm@sarria.es', 'M', 5, 1),
(32, 'Lucia', 'Gil', 'lgil@gmail.com', 'F', 21, 2),
(33, 'Sonia', 'Monroy', 'monicamonroy@gmail.co', 'F', 12, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `id_partido` int(10) NOT NULL,
  `id_deporte` int(10) NOT NULL DEFAULT '1',
  `goles_local` int(10) DEFAULT '0',
  `goles_visitante` int(10) DEFAULT '0',
  `equipo_local` int(10) DEFAULT NULL,
  `equipo_visitante` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id_partido`, `id_deporte`, `goles_local`, `goles_visitante`, `equipo_local`, `equipo_visitante`) VALUES
(66, 1, 0, 1, 1, 23),
(69, 1, 0, 1, 1, 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneos`
--

CREATE TABLE `torneos` (
  `id_torneo` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `torneos`
--

INSERT INTO `torneos` (`id_torneo`, `nombre`) VALUES
(1, 'liga 1ºESO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`) VALUES
(2, 'admin', 'admin', '$1AKteq..edcc'),
(8, 'lito', 'lito', '$1yIrehyoHhOU'),
(38, 'toni', 'toni', 'en.cRh/XkaNj6'),
(41, 'rafa', 'rafa', 'en2djegHkJ5hE'),
(42, 'Alejandro', 'alex', 'en9sejhKr6Wys');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `deportes`
--
ALTER TABLE `deportes`
  ADD PRIMARY KEY (`id_deporte`),
  ADD KEY `id_torneo` (`id_torneo`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `id_partido` (`id_partido`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id_jugador`),
  ADD KEY `jugadores_ibfk_1` (`id_equipo`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id_partido`),
  ADD KEY `id_deporte` (`id_deporte`),
  ADD KEY `equipo_local` (`equipo_local`),
  ADD KEY `equipo_visitante` (`equipo_visitante`);

--
-- Indices de la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD PRIMARY KEY (`id_torneo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `deportes`
--
ALTER TABLE `deportes`
  MODIFY `id_deporte` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id_jugador` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id_partido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `torneos`
--
ALTER TABLE `torneos`
  MODIFY `id_torneo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `deportes`
--
ALTER TABLE `deportes`
  ADD CONSTRAINT `deportes_ibfk_1` FOREIGN KEY (`id_torneo`) REFERENCES `torneos` (`id_torneo`);

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`id_partido`) REFERENCES `partidos` (`id_partido`);

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`id_deporte`) REFERENCES `deportes` (`id_deporte`),
  ADD CONSTRAINT `partidos_ibfk_2` FOREIGN KEY (`equipo_local`) REFERENCES `equipos` (`id_equipo`),
  ADD CONSTRAINT `partidos_ibfk_3` FOREIGN KEY (`equipo_visitante`) REFERENCES `equipos` (`id_equipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
