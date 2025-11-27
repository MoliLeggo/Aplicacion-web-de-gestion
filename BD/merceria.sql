-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2025 a las 23:21:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `merceria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `username`, `password_hash`, `fecha_creacion`) VALUES
(1, 'unico', '$2y$10$LD5JwilBa9KuBZU1igbHrOjBIGEx38ZlhT/pyYRpA17YWuuKDgdaC', '2025-11-05 22:50:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `fecha_creacion`) VALUES
(1, 'babero', 'Baberos de varios tamaÃ±os y colores', '2025-11-18 22:10:26'),
(2, 'etiquetas', 'Tus etiquetas resistentes a altas temperaturas', '2025-11-18 22:10:26'),
(3, 'costurero', 'Costureros de viaje, para casa o para llevar tipo bolso', '2025-11-18 22:10:26'),
(4, 'parches', 'Rodilleras y parches termoadhesivos de todo tipo', '2025-11-18 22:10:26'),
(5, 'puntillas', 'Encaje, bolillo, valencie, tira bordada, guipur y mÃ¡s', '2025-11-18 22:10:26'),
(6, 'pasamaneria', 'Gran surtido de pasamanerÃ­a y cintas para tapizar y prendas', '2025-11-18 22:10:26'),
(7, 'hilos', 'Hilos para coser, bordar, crochet, bolillos, tapiz y mÃ¡s', '2025-11-18 22:10:26'),
(8, 'botones', 'Miles de botones de todos los colores y tamaÃ±os', '2025-11-18 22:10:26'),
(13, 'puntillas2', 'Encaje, bolillo, valencie, tira bordada, guipur y mÃ¡s', '2025-11-18 22:47:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `fecha`, `total`) VALUES
(4, 16, '2025-11-12 23:46:04', 164.40),
(5, 16, '2025-11-17 20:31:43', 13.90),
(6, 16, '2025-11-18 23:15:59', 40.75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalles`
--

CREATE TABLE `pedido_detalles` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `pedido_detalles`
--

INSERT INTO `pedido_detalles` (`id`, `pedido_id`, `producto_id`, `cantidad`, `precio_unitario`) VALUES
(4, 4, 1, 2, 6.95),
(5, 4, 3, 1, 16.90),
(6, 4, 4, 1, 13.90),
(7, 4, 6, 1, 39.90),
(8, 4, 7, 2, 39.90),
(9, 4, 8, 1, 0.00),
(10, 4, 9, 1, 0.00),
(11, 4, 10, 1, 0.00),
(12, 4, 11, 1, 0.00),
(13, 4, 12, 1, 0.00),
(14, 5, 1, 2, 6.95),
(15, 6, 3, 2, 16.90),
(16, 6, 1, 1, 6.95);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `categoria` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `categoria`, `precio`, `imagen`, `fecha_creacion`) VALUES
(1, 'Babero infantil', 'Babero para bordar con empapador tamaÃ±o pequeÃ±o.', 'babero', 6.95, 'uploads/babero.png', '2025-11-05 23:16:50'),
(3, 'Babero adulto', 'Babero con empapador de grandes dimensiones.', 'babero', 16.90, 'uploads/baberoAdulto.png', '2025-11-05 23:21:03'),
(4, 'Etiquetas de marcar ropa', 'Encarga tus etiquetas personalizadas, para pegar o coser en la ropa. Ideales tanto para residencias como para campamentos.', 'etiquetas', 13.90, 'uploads/etiquetas.jpg', '2025-11-05 23:38:23'),
(5, 'Costurero madera', 'Costurero de madera plegable gran capacidad.', 'costurero', 49.90, 'uploads/costurero.png', '2025-11-05 23:39:43'),
(6, 'Costurero rigido', 'Costurero rigido forrado grande 19x26cm', 'costurero', 39.90, 'uploads/costureroRijido.png', '2025-11-05 23:41:49'),
(7, 'Costurero portatil', 'Costurero blando gran capacidad ideal para ir a cursos o moverte con comodidad', 'costurero', 39.90, 'uploads/costureroBlando.png', '2025-11-05 23:42:40'),
(8, 'Parches termohadesivos (catalogo)', 'Rodilleras y parches de todo tipo y tamaÃ±o, gran surtido. Aplicaciones para decoracion.', 'parches', 0.00, 'uploads/bolso con parches.png', '2025-11-05 23:44:55'),
(9, 'Puntillas y bordados (catalogo)', 'Puntillas de tira bordada, bolillos, guipour, etc una amplia gama de puntillas para tu dÃ­a a dÃ­a o para tus trajes regionales.', 'puntillas', 0.00, 'uploads/puntillas.png', '2025-11-05 23:46:46'),
(10, 'Pasamaneria cintas y plisados (catalogo)', 'Gran surtido de pasamanerias y cintas. Bien sea para decorar, tapizar tus muebles o para lo que necesites.', 'pasamaneria', 0.00, 'uploads/Cintas y Pasamanerias.png', '2025-11-05 23:48:18'),
(11, 'Hilos y cordones (catalogo)', 'Cualquier hilo que necesites lo encontraras en nuestra merceria especializada en labores, desde punto de cruz, ganchillo hasta tapiz, hilo de coser a maquina o lo que necesites', 'hilos', 0.00, 'uploads/hilos y cordon.jpg', '2025-11-05 23:49:03'),
(12, 'Botones (catalogo)', 'Miles de botones. El surtido mas grande de botones del norte de espaÃ±a. ', 'botones', 0.00, 'uploads/botones.jpg', '2025-11-05 23:50:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `clave` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `clave`) VALUES
(1, 'Mario', 'Molinero', 'leggolass@hotmail.com', '$2y$10$G0key0kk3EhQh0uFqeMQl.hZC6K6JRWFJp5xGgFdjWo5Ncwwdd9Ua'),
(16, 'm', 'm', 'm@m.es', '$2y$10$lAhCBvDsIA3EKLCZB8jBPuKoFVdkFhuRSJSujrSuRgGU8IBDLEZ5e'),
(17, 'b', 'b', 'b@b.es', '$2y$10$r.WXbUL.hemr3AYiMxXiROnAoEwUKaJrXeiwYcVGOw3khEcGCIFOy'),
(20, 'c', 'c', 'c@c.es', '$2y$10$AffZIKdeoKBi9I1Ajvc4Se8YTH5.UIRgoXpkT130.swpZTLcdkYFe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `pedido_detalles`
--
ALTER TABLE `pedido_detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedido_detalles`
--
ALTER TABLE `pedido_detalles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `pedido_detalles`
--
ALTER TABLE `pedido_detalles`
  ADD CONSTRAINT `pedido_detalles_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `pedido_detalles_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
