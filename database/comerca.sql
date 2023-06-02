-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2023 a las 16:38:25
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
-- Base de datos: `comerca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `limite` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `limite`) VALUES
(1, 'Bebidas', 10),
(6, 'Frutas', 10),
(7, 'Aderesos', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descartar`
--

CREATE TABLE `descartar` (
  `id` int(11) NOT NULL,
  `motivo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_producto` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `descartar`
--

INSERT INTO `descartar` (`id`, `motivo`, `codigo_producto`) VALUES
(2, 'Estan vencidos', 'gfr543');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `accion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `ci_usuario` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `accion`, `fecha`, `ci_usuario`) VALUES
(3, 'agregó nuevo usuario', '2023-03-29', 24715376),
(8, 'agregó nuevo usuario', '2023-03-30', 24715376),
(9, 'agregó nuevo usuario', '2023-03-30', 24715376),
(10, 'agregó nuevo usuario', '2023-04-03', 24715376),
(12, 'actualizó datos de usuario', '2023-04-06', 24715376),
(13, 'actualizó datos de usuario', '2023-04-06', 24715376),
(14, 'cambió el estado de usuario', '2023-04-06', 24715376),
(15, 'cambió el estado de usuario', '2023-04-06', 24715376),
(16, 'cambió el estado de usuario', '2023-04-06', 24715376),
(17, 'agregó nuevo usuario', '2023-04-07', 24715376),
(18, 'actualizó datos de usuario', '2023-04-07', 24715376),
(19, 'actualizó datos de usuario', '2023-04-07', 24715376),
(20, 'agregó nuevo proveedor', '2023-04-23', 24715376),
(21, 'Eliminó un proveedor', '2023-04-23', 24715376),
(22, 'agregó nuevo producto', '2023-04-23', 24715376),
(23, 'agregó nuevo producto', '2023-04-23', 24715376),
(24, 'agregó nuevo producto', '2023-04-23', 24715376),
(25, 'agregó nuevo producto', '2023-04-23', 24715376),
(26, 'agregó nuevo producto', '2023-04-23', 24715376),
(27, 'agregó nuevo producto', '2023-04-23', 24715376),
(28, 'agregó nuevo producto', '2023-04-23', 24715376),
(29, 'agregó nuevo producto', '2023-04-23', 24715376),
(30, 'agregó nuevo producto', '2023-04-23', 24715376),
(31, 'Eliminó un producto', '2023-04-23', 24715376),
(32, 'Eliminó un producto', '2023-04-23', 24715376),
(33, 'Eliminó un producto', '2023-04-23', 24715376),
(34, 'Se registro una nueva venta', '2023-04-26', 24715376),
(35, 'agregó nuevo producto', '2023-04-27', 24715376),
(36, 'actualizó datos de usuario', '2023-05-07', 24715376),
(37, 'actualizó datos de usuario', '2023-05-07', 24715376),
(38, 'actualizó datos del proveedor', '2023-05-07', 24715376),
(39, 'agregó nuevo categoría', '2023-05-07', 24715376),
(40, 'actualizó una categoría', '2023-05-07', 24715376),
(41, 'actualizó una categoría', '2023-05-07', 24715376),
(42, 'Eliminó una categoría', '2023-05-07', 24715376),
(43, 'agregó nuevo marca', '2023-05-07', 24715376),
(44, 'actualizó una marca', '2023-05-07', 24715376),
(45, 'Eliminó una marca', '2023-05-07', 24715376),
(46, 'actualizó datos del proveedor', '2023-05-07', 24715376),
(47, 'agregó nuevo marca', '2023-05-07', 24715376),
(48, 'agregó nuevo producto', '2023-05-07', 24715376),
(49, 'actualizó datos de usuario', '2023-05-07', 24715376),
(50, 'actualizó datos de usuario', '2023-05-07', 24715376),
(51, 'Se registro una nueva venta', '2023-05-07', 24715376),
(52, 'Se registro una nueva venta', '2023-05-07', 24715376),
(53, 'Se registro una nueva venta', '2023-05-07', 24715376),
(54, 'Se registro una nueva venta', '2023-05-07', 24715376),
(55, 'Se registro una nueva venta', '2023-05-07', 24715376),
(56, 'Se registro una nueva venta', '2023-05-07', 24715376),
(57, 'Se registro una nueva venta', '2023-05-07', 24715376),
(58, 'agregó nuevo producto', '2023-05-08', 24715376),
(59, 'Se registro una nueva venta', '2023-05-09', 24715376),
(60, 'agregó nuevo categoría', '2023-05-12', 24715376),
(61, 'Eliminó una categoría', '2023-05-12', 24715376),
(62, 'agregó nuevo producto', '2023-05-13', 24715376),
(63, 'agregó nuevo producto', '2023-05-13', 24715376),
(64, 'Se registro una nueva venta', '2023-05-13', 24715376),
(65, 'Se registro una nueva venta', '2023-05-13', 24715376),
(66, 'Se registro una nueva venta', '2023-05-13', 24715376),
(67, 'Se registro una nueva venta', '2023-05-13', 24715376),
(68, 'Se registro una nueva venta', '2023-05-14', 24715376),
(69, 'Se registro una nueva venta', '2023-05-14', 24715376),
(70, 'Se registro una nueva venta', '2023-05-14', 24715376),
(71, 'Se registro una nueva venta', '2023-05-14', 24715376),
(72, 'Se registro una nueva venta', '2023-05-14', 24715376),
(73, 'Se registro una nueva venta', '2023-05-14', 24715376),
(74, 'Se registro una nueva venta', '2023-05-14', 24715376),
(75, 'Se registro una nueva venta', '2023-05-14', 24715376),
(76, 'Se registro una nueva venta', '2023-05-14', 24715376),
(77, 'Se registro una nueva venta', '2023-05-14', 24715376),
(78, 'Se registro una nueva venta', '2023-05-14', 24715376),
(79, 'Se registro una nueva venta', '2023-05-14', 24715376),
(80, 'Se registro una nueva venta', '2023-05-14', 24715376),
(81, 'Se registro una nueva venta', '2023-11-25', 24715376),
(82, 'Se registro una nueva venta', '2023-11-25', 24715376),
(83, 'agregó nuevo usuario', '2023-05-16', 24715376),
(84, 'actualizó datos de usuario', '2023-05-16', 24715376),
(85, 'actualizó datos de usuario', '2023-05-16', 24715376),
(86, 'actualizó datos de usuario', '2023-05-16', 24715376),
(87, 'actualizó datos de usuario', '2023-05-16', 24715376),
(88, 'cambió el estado de usuario', '2023-05-16', 24715376),
(89, 'agregó nuevo categoría', '2023-05-16', 24715376),
(90, 'actualizó una categoría', '2023-05-16', 24715376),
(91, 'Eliminó una categoría', '2023-05-16', 24715376),
(92, 'agregó nuevo marca', '2023-05-16', 24715376),
(93, 'actualizó una marca', '2023-05-16', 24715376),
(94, 'Eliminó una marca', '2023-05-16', 24715376),
(95, 'agregó nuevo proveedor', '2023-05-16', 24715376),
(96, 'agregó nuevo proveedor', '2023-05-16', 24715376),
(97, 'Eliminó un proveedor', '2023-05-16', 24715376),
(98, 'agregó nuevo proveedor', '2023-05-16', 24715376),
(99, 'actualizó datos del proveedor', '2023-05-16', 24715376),
(100, 'actualizó una categoría', '2023-05-16', 24715376),
(101, 'actualizó datos de un producto', '2023-05-16', 24715376),
(102, 'Se registro una nueva venta', '2023-05-16', 24715376),
(103, 'agregó nuevo categoría', '2023-05-22', 24715376),
(104, 'agregó nuevo categoría', '2023-05-22', 24715376),
(105, 'actualizó una categoría', '2023-05-22', 24715376),
(106, 'agregó nuevo marca', '2023-05-22', 24715376),
(107, 'Eliminó una marca', '2023-05-22', 24715376),
(108, 'actualizó datos del proveedor', '2023-05-27', 24715376),
(109, 'agregó nuevo producto', '2023-05-27', 24715376),
(110, 'descarto un producto', '2023-05-27', 24715376),
(111, 'descarto un producto', '2023-05-27', 24715376),
(112, 'agregó nuevo producto', '2023-05-27', 24715376),
(113, 'Se registro una nueva venta', '2023-05-27', 24715376),
(114, 'Se registro una nueva venta', '2023-05-27', 24715376),
(115, 'Se registro una nueva venta', '2023-05-27', 24715376),
(116, 'agregó nuevo categoría', '2023-05-27', 24715376),
(117, 'actualizó una categoría', '2023-05-27', 24715376),
(118, 'actualizó una categoría', '2023-05-27', 24715376),
(119, 'Se registro una nueva venta', '2023-05-28', 24715376),
(120, 'Se registro una nueva venta', '2023-05-28', 24715376),
(121, 'actualizó datos de un producto', '2023-05-28', 24715376);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`) VALUES
(2, 'polar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `rif` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `ci` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `nombre`, `cantidad`, `fecha`, `fecha_vencimiento`, `rif`, `id_marca`, `id_categoria`, `ci`) VALUES
('cdc3243', 'Mayonesa', 12, '2022-11-25', '2025-10-08', 'vbg57463', 2, 7, 24715376),
('frt45', 'Mantequilla', 20, '2023-04-12', '2023-12-03', 'vbg57463', 2, 7, 24715376),
('gfr543', 'Coca-cola', 12, '2022-10-12', '2025-10-08', '312dsds', 2, 1, 24715376),
('gvfgfr3', 'Mayonesa', 15, '2022-09-21', '2023-12-20', 'vbg57463', 2, 7, 24715376);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `rif` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`rif`, `nombre`, `telefono`) VALUES
('312dsds', 'Flamers', '123213123'),
('ds2323', 'Mair', '04121856963'),
('vbg57463', 'heizz', '04145256985');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`id`, `nombre`, `cantidad`, `fecha`, `codigo`) VALUES
(17, 'Mantequilla', 2, '2023-05-14', 'frt45'),
(18, 'Mantequilla', 1, '2023-05-14', 'frt45'),
(19, 'Mantequilla', 2, '2023-05-14', 'frt45'),
(20, 'Mantequilla', 1, '2023-05-14', 'frt45'),
(21, 'Mantequilla', 1, '2023-05-14', 'frt45'),
(22, 'Mantequilla', 1, '2023-05-14', 'frt45'),
(23, 'Mantequilla', 1, '2023-05-14', 'frt45'),
(24, 'Mantequilla', 2, '2023-05-14', 'frt45'),
(25, 'Mantequilla', 1, '2023-05-14', 'frt45'),
(26, 'Mantequilla', 1, '2023-05-14', 'frt45'),
(28, 'Mantequilla', 6, '2023-05-14', 'frt45'),
(29, 'Mayonesa', 2, '2023-11-25', 'gvfgfr3'),
(30, 'Mayonesa', 4, '2023-11-25', 'gvfgfr3'),
(31, 'Mantequilla', 1, '2023-05-16', 'frt45'),
(32, 'Mayonesa', 5, '2023-05-27', 'gvfgfr3'),
(33, 'Mayonesa', 10, '2023-05-27', 'cdc3243'),
(34, 'Mayonesa', 2, '2023-05-27', 'gvfgfr3'),
(36, 'Mayonesa', 1, '2023-05-28', 'gvfgfr3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ci` int(8) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `rol` int(8) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ci`, `nombre`, `apellido`, `username`, `password`, `rol`, `estado`) VALUES
(1231231, 'Marco', 'Scscs', 'sdasd', 'b992d350573feb3e62d2d9afb198ad91', 1, 1),
(24715376, 'Rafael', 'Lea', 'Admin', '7488e331b8b64e5794da3fa4eb10ad5d', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `descartar`
--
ALTER TABLE `descartar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_usuario` (`ci_usuario`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `rif` (`rif`),
  ADD KEY `ci` (`ci`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`rif`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ci`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `descartar`
--
ALTER TABLE `descartar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `descartar`
--
ALTER TABLE `descartar`
  ADD CONSTRAINT `descartar_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `productos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`ci_usuario`) REFERENCES `usuarios` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`rif`) REFERENCES `proveedor` (`rif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`ci`) REFERENCES `usuarios` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `salida`
--
ALTER TABLE `salida`
  ADD CONSTRAINT `salida_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `productos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
