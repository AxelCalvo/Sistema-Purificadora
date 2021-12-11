-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2021 a las 18:12:14
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nissaya`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id_Cliente` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `calle` varchar(60) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `Municipio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_Cliente`, `nombres`, `apellidos`, `telefono`, `calle`, `numero`, `colonia`, `Municipio`) VALUES
(1, 'AXEL ', 'GARCIA RUIZ', '9511117662', 'Benito Juarez', '49', 'Lomas de santa rosa', 'Santa Rosa'),
(2, 'CARLOS ROBERT', 'GARCIA RUIZ', '9511117662', '5 de Mayo', '103', 'Nazareno', 'Santa Cruz Xoxocotlan'),
(3, 'CARMEN DE JESUS', 'CARREÑO CRUZ', '9511234567', 'Arteaga', '201', 'Centro', 'Oaxaca de Juárez'),
(4, 'juan ', 'cruz', '1231424323', 'benito juarez', '23', 'santa cruz xoxocotlan', 'santa cruz xoxocotlan'),
(5, 'Javier', 'Lopez', '951119704', 'La paz', '23', 'sanjuan', 'santa rosa'),
(6, 'juan ', 'del diablo', '1231424323', 'abigail', '23', 'san juan de las peras', 'tlahuitoltepec mixe'),
(7, 'CARLOS ', 'CARREÑO CRUZ', '9511117662', 'Amapolas', '123', 'Rufino Tamayo', 'Oaxaca de Juárez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `Id_Empleado` int(11) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `Telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`Id_Empleado`, `curp`, `nombres`, `apellidos`, `Telefono`) VALUES
(1, 'AOYA981213HQRRHL00', 'CARLOS ', 'BALAM LEONARDO', '9514567890');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garrafon`
--

CREATE TABLE `garrafon` (
  `Id_Garrafon` int(11) NOT NULL,
  `costo` double NOT NULL,
  `precio_venta` double NOT NULL,
  `color` varchar(20) NOT NULL,
  `caducidad` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `garrafon`
--

INSERT INTO `garrafon` (`Id_Garrafon`, `costo`, `precio_venta`, `color`, `caducidad`, `cantidad`) VALUES
(1, 10, 21, 'Azul', '20/11/2021', 1000),
(2, 5, 12, 'Rosa', '22/12/2021', 50),
(3, 7, 14, 'Azul', '20/11/2021', 100),
(4, 10, 21, 'Morado', '20/11/2021', 200),
(5, 25, 35, 'Transparente', '23/12/2021', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `clave` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `nombre`, `clave`) VALUES
(1, 'Admin', '12345678'),
(2, 'Empleado', '12345678'),
(3, 'Docente', '12345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `folio` int(11) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `Id_Garrafon` int(11) NOT NULL,
  `Id_Empleado` int(11) NOT NULL,
  `Id_Cliente` int(11) NOT NULL,
  `importe_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`folio`, `fecha`, `cantidad`, `Id_Garrafon`, `Id_Empleado`, `Id_Cliente`, `importe_total`) VALUES
(5, '27/11/2021', 2, 1, 1, 2, 42);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_Cliente`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Id_Empleado`);

--
-- Indices de la tabla `garrafon`
--
ALTER TABLE `garrafon`
  ADD PRIMARY KEY (`Id_Garrafon`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `fkid_garrafon` (`Id_Garrafon`),
  ADD KEY `fkid_empleado` (`Id_Empleado`),
  ADD KEY `fkid_cliente` (`Id_Cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `Id_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `garrafon`
--
ALTER TABLE `garrafon`
  MODIFY `Id_Garrafon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`Id_Garrafon`) REFERENCES `garrafon` (`Id_Garrafon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`Id_Empleado`) REFERENCES `empleado` (`Id_Empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`Id_Cliente`) REFERENCES `cliente` (`Id_Cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
