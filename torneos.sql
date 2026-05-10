-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2026 a las 23:40:56
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
-- Base de datos: `practicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneos`
--

CREATE TABLE `torneos` (
  `id` int(11) NOT NULL,
  `nombre_torneo` varchar(150) NOT NULL,
  `organizador` varchar(100) NOT NULL,
  `patrocinador` varchar(100) DEFAULT NULL,
  `sede` varchar(200) DEFAULT NULL,
  `categoria` enum('1ra fuerza','2da fuerza','Veteranos','Libre','Juvenil','Femenil','Empresarial','Infantil','Minibasket') NOT NULL,
  `premio` decimal(10,2) DEFAULT NULL,
  `premio2` decimal(10,2) DEFAULT NULL,
  `premio3` decimal(10,2) DEFAULT NULL,
  `otro_premio` varchar(255) DEFAULT NULL,
  `usuario` varchar(60) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `torneos`
--

INSERT INTO `torneos` (`id`, `nombre_torneo`, `organizador`, `patrocinador`, `sede`, `categoria`, `premio`, `premio2`, `premio3`, `otro_premio`, `usuario`, `contraseña`) VALUES
(1, 'equipo de basketball', 'nbl', '                                    adidas,nike                                    ', 'new york', 'Juvenil', 500.00, 200.00, 100.00, 'una switch 2', 'lope', '$2y$10$wTX.AqbKmGU/VZkYK0ECE.kWdW0SPEZSgyEMLP605eZU5sK8luaHm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `torneos`
--
ALTER TABLE `torneos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
