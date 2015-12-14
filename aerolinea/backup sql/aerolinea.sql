-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2015 a las 18:18:50
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aerolinea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `nombre`) VALUES
(1, 'Manizales'),
(2, 'Neiva'),
(3, 'Pereira'),
(4, 'Pasto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `edad` int(10) NOT NULL,
  `origen` varchar(20) NOT NULL,
  `destino` varchar(20) NOT NULL,
  `clase` varchar(20) NOT NULL,
  `tarifa` decimal(10,0) NOT NULL,
  `incremento` decimal(10,0) NOT NULL,
  `totalti` decimal(10,0) NOT NULL,
  `descuento` decimal(10,0) NOT NULL,
  `totalpasaje` decimal(10,0) NOT NULL,
  `servicios` decimal(10,0) NOT NULL,
  `totalpagar` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `nombre`, `edad`, `origen`, `destino`, `clase`, `tarifa`, `incremento`, `totalti`, `descuento`, `totalpasaje`, `servicios`, `totalpagar`) VALUES
(1, 'pedro', 23, 'Pereira', 'Pasto', 'turista', '408000', '0', '408000', '61200', '346800', '34000', '380800'),
(2, 'pedro', 23, 'Neiva', 'Pereira', 'ejecutiva', '375000', '187500', '562500', '84375', '478125', '9000', '487125'),
(3, 'Michel Martinez', 24, 'Pereira', 'Pasto', 'ejecutiva', '408000', '204000', '612000', '91800', '520200', '9000', '529200'),
(9, 'juan mendez', 43, 'Pasto', 'Manizales', 'turista', '382000', '0', '382000', '38200', '343800', '30000', '373800');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `nombre` varchar(20) NOT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`nombre`, `valor`) VALUES
('alimentacion', '25000'),
('internet', '5000'),
('maletero', '4000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `origen` varchar(20) NOT NULL,
  `destino` varchar(20) NOT NULL,
  `valor` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`origen`, `destino`, `valor`) VALUES
('Manizales', 'Neiva', '347000'),
('Neiva', 'Manizales', '347000'),
('Manizales', 'Pereira', '360000'),
('Pereira', 'Manizales', '360000'),
('Manizales', 'Pasto', '382000'),
('Pasto', 'Manizales', '382000'),
('Neiva', 'Pereira', '375000'),
('Pereira', 'Neiva', '375000'),
('Neiva', 'Pasto', '392000'),
('Pasto', 'Neiva', '392000'),
('Pereira', 'Pasto', '408000'),
('Pasto', 'Pereira', '408000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
