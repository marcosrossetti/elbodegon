-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2022 a las 22:12:31
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pozo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `nombre` varchar(50) NOT NULL COMMENT 'nombre de la categoria',
  `id_cat` int(2) NOT NULL COMMENT 'clave rel entre la herramienta y la categoria'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `nombre` text NOT NULL COMMENT 'nombre de la herramienta ',
  `cant` int(11) NOT NULL COMMENT 'conteo de cantidad de stock',
  `estado` tinyint(1) NOT NULL COMMENT 'habilitado o deshabilitado',
  `foto` varchar(11) NOT NULL COMMENT 'imagen desmostrativa',
  `devolucion` int(1) NOT NULL COMMENT 'estado de la devolucion del elemento prestado',
  `id` int(11) NOT NULL COMMENT 'identificador de elemento unico',
  `id_cat` int(2) NOT NULL COMMENT 'identificador de categoria primaria del elemento unico'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retiros`
--

CREATE TABLE `retiros` (
  `id` int(11) NOT NULL COMMENT 'identificador de retiro',
  `dni` varchar(12) NOT NULL COMMENT 'dni del alumno que retira',
  `nom_ape` text NOT NULL COMMENT 'nombre y apellido del beneficiario del prestamo del elemento',
  `grupo` int(11) NOT NULL COMMENT 'grupo del alumno al que se presta',
  `curso` varchar(11) NOT NULL COMMENT 'curso del alumno al que se presta',
  `id_herramienta` varchar(11) NOT NULL COMMENT 'identificador de herramienta u elemento unico',
  `tipo` text NOT NULL COMMENT 'tipo de elemento a retirar',
  `cant_ret` int(11) NOT NULL COMMENT 'cantidad de elementos retirados',
  `estado` tinyint(1) NOT NULL COMMENT 'estado del prestado',
  `fecha_ret` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'fecha del retiro del prestado',
  `fecha_dev` date NOT NULL COMMENT 'fecha de devolucion del prestado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `dni` varchar(12) NOT NULL COMMENT 'dni del administrador',
  `password` text NOT NULL COMMENT 'contraseña del administrador (credencial)',
  `nom_ape` text NOT NULL COMMENT 'nombre y apellido del administrador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`dni`, `password`, `nom_ape`) VALUES
('45320176', '12345678', 'jose perez'),
('45320178', '0014080825', 'Andres Schiro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`id_cat`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `retiros`
--
ALTER TABLE `retiros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `retiros`
--
ALTER TABLE `retiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de retiro';

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD CONSTRAINT `herramientas_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categorias` (`id_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
