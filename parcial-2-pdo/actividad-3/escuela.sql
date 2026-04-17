-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2026 a las 06:24:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idAlumnos` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idAlumnos`, `nombre`, `apellido`, `correo`) VALUES
(7, 'mariano', 'berraza', 'berrazamariano@gmail.com'),
(11, 'mariano', 'berraza', 'berrazamariao@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs_alumnos`
--

CREATE TABLE `logs_alumnos` (
  `idLog` int(11) NOT NULL,
  `idAlumnos` int(11) NOT NULL,
  `accion` varchar(30) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `logs_alumnos`
--

INSERT INTO `logs_alumnos` (`idLog`, `idAlumnos`, `accion`, `fecha`) VALUES
(1, 7, 'ALTA_ALUMNO', '2026-04-17 04:19:55'),
(2, 11, 'ALTA_ALUMNO', '2026-04-17 04:23:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idAlumnos`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `logs_alumnos`
--
ALTER TABLE `logs_alumnos`
  ADD PRIMARY KEY (`idLog`),
  ADD KEY `idAlumno` (`idAlumnos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idAlumnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `logs_alumnos`
--
ALTER TABLE `logs_alumnos`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `logs_alumnos`
--
ALTER TABLE `logs_alumnos`
  ADD CONSTRAINT `logs_alumnos_ibfk_1` FOREIGN KEY (`idAlumnos`) REFERENCES `alumnos` (`idAlumnos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
