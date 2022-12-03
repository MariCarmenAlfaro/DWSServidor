-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-11-2017 a las 18:24:12
-- Versión del servidor: 5.7.20-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd13`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_libros`
--

CREATE TABLE `tb_libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(1000) NOT NULL,
  `autor` varchar(1000) NOT NULL,
  `genero` varchar(1000) NOT NULL,
  `precio` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_libros`
--

INSERT INTO `tb_libros` (`id`, `titulo`, `autor`, `genero`, `precio`) VALUES
(7, 'Php avanzado', 'G.Mas', 'ensayo', 20),
(8, 'Matrix', 'Garcia Lopez', 'ficcion', 15),
(24, 'Al campo', 'Mariano Granja', 'infantil', 7),
(25, 'BOE', 'GOB', 'infantil', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`usuario`, `password`) VALUES
('cliente', 'cliente'),
('admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_libros`
--
ALTER TABLE `tb_libros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_libros`
--
ALTER TABLE `tb_libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
