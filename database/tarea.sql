-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2022 a las 23:45:08
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto1ev`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id` int(11) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `tlf` int(10) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `poblacion` varchar(15) NOT NULL,
  `cp` int(5) NOT NULL,
  `provincia` varchar(15) NOT NULL,
  `estadoTarea` varchar(30) NOT NULL,
  `fechaC` date DEFAULT NULL,
  `operario` varchar(15) NOT NULL,
  `fechaR` date DEFAULT NULL,
  `anotA` varchar(150) NOT NULL,
  `anotP` varchar(150) NOT NULL,
  `foto` longblob DEFAULT NULL,
  `fichero` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla Usuario';

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id`, `nif`, `nombre`, `apellidos`, `tlf`, `descripcion`, `correo`, `direccion`, `poblacion`, `cp`, `provincia`, `estadoTarea`, `fechaC`, `operario`, `fechaR`, `anotA`, `anotP`, `foto`, `fichero`) VALUES
(2, '45646', 'Manuela', 'Barrionuevo', 625625968, 'recoger troncos', 'manolibmure@gmail.com', 'Plaza del Berrocal, 2', 'Andalucia', 21005, 'Huelva', 'Cancelada', '2022-11-18', 'Luis', '2022-12-08', 'fwshyfgbuewybfluieglr', 'wiureehniuhewniungfviuwre', NULL, NULL),
(12, '35118364D', 'ANA', 'GSASHR', 675681577, 'SHFDRHSR', 'SGGRSE@gmail.com', 'GHDSHGDSG', '2', 21005, '2', 'Realizada', '2022-01-01', 'Jose', '2022-11-11', 'SHSRETHSRTH\r\n', ' AnotaSTHSRHT', '', ''),
(13, '', 'Pedro', 'GSASHR', 675681577, 'cantar el himno de andalucia', 'SGGRSE@gmail.com', 'GHDSHGDSG', '2', 21005, '2', 'Esperando a ser aprobada', '2022-04-25', '', '2022-11-01', 'SHSRETHSRTH\r\n', ' AnotaSTHSRHT', NULL, NULL),
(21, '35118364D', 'Daniel', 'Cordón', 999999999, 'hbibujh', 'demo@baulpfedhp.com', 'fvsdfs', 'fvsv', 2121213, '09', 'Realizada', '2022-12-04', '', '2022-12-22', ' texto que se desee incluir para explicar el trabajo a realizar antes de comenzarlo.\r\n', ' Anotaciones realizadas por los operarios después de realizar la tarea.', NULL, NULL),
(22, '35118364D', 'Daniel', 'Cordón', 999999999, 'hbibujh', 'demo@baulpfedhp.com', 'fvsdfs', 'fvsv', 2121213, '09', 'Realizada', '2022-12-04', '', '2022-12-22', ' texto que se desee incluir para explicar el trabajo a realizar antes de comenzarlo.\r\n', ' Anotaciones realizadas por los operarios después de realizar la tarea.', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
