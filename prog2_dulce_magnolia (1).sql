-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2023 a las 17:35:22
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prog2_dulce_magnolia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bombones`
--

CREATE TABLE `bombones` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `tipo_bombones_id` int(10) UNSIGNED NOT NULL,
  `chocolate_id` int(10) UNSIGNED NOT NULL,
  `ingredientes_destacados_id` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(256) NOT NULL,
  `precio` decimal(10,2) UNSIGNED NOT NULL,
  `vencimiento` date NOT NULL,
  `peso` decimal(6,2) NOT NULL,
  `detalle` varchar(256) NOT NULL,
  `calorias` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bombones`
--

INSERT INTO `bombones` (`id`, `nombre`, `tipo_bombones_id`, `chocolate_id`, `ingredientes_destacados_id`, `imagen`, `precio`, `vencimiento`, `peso`, `detalle`, `calorias`) VALUES
(2, 'Bombón de chocolate con relleno de caramelo salado.', 1, 5, 3, 'bomboncaramelo.jpg', 205.00, '2023-12-10', 30.00, 'Delicioso bombón de chocolate con un suave y dulce relleno de caramelo salado, que combina a la perfección el contraste de sabores.', 40),
(3, 'Trufa de frambuesa', 2, 4, 1, 'trufaframbuesa-2.jpg', 300.00, '2023-11-07', 30.00, 'Una tentación para los amantes de los sabores frutales. Estas trufas están rellenas de una exquisita mezcla de chocolate y frambuesa, creando una explosión de sabor en cada mordisco.', 18),
(4, 'Praliné de avellana', 3, 3, 0, 'pralineavellana.jpg', 240.00, '2023-07-08', 26.00, 'Una combinación clásica que nunca pasa de moda. Este praliné de avellana está hecho con ingredientes de alta calidad y tiene un sabor cremoso y delicado que te cautivará.', 90),
(5, 'Bombón de chocolate blanco con fresas liofilizadas', 1, 2, 1, 'bombonblanco.jpg', 320.00, '2024-01-15', 30.00, 'Una verdadera joya para los amantes del chocolate blanco. Estos bombones están rellenos de fresas liofilizadas que le aportan un toque afrutado y crujiente.', 140),
(6, 'Trufa de café', 2, 5, 1, 'trufacafe.jpg', 180.00, '2023-10-09', 40.00, 'Si eres amante del café, esta trufa te encantará. Con un intenso sabor a café y una textura suave y sedosa, es el regalo perfecto para los amantes de esta bebida aromática.', 90),
(7, 'Bombón de chocolate negro con almendras caramelizadas', 1, 6, 1, 'bombonalmendra.jpg', 200.00, '2023-09-09', 30.00, 'Una combinación irresistible de chocolate negro de alta calidad y almendras caramelizadas crujientes. Este bombón es un verdadero placer para los sentidos.', 103),
(8, 'Trufa de chocolate blanco con coco', 2, 1, 1, 'trufacoco.jpg', 205.00, '2023-12-20', 30.00, 'Sumérgete en el paraíso tropical con estas trufas de chocolate blanco y coco. Cada bocado te transportará a una playa paradisíaca con su exquisito sabor y textura suave.', 110),
(9, 'Bombón de chocolate con licor de naranja', 1, 7, 1, 'bombonlicornaranja.jpg', 300.00, '2024-02-04', 36.00, 'Un capricho para los paladares más sofisticados. Este bombón combina el intenso sabor del chocolate con un toque de licor de naranja, creando una experiencia deliciosa y lujosa.', 150),
(10, 'Praliné de pistacho', 3, 1, 1, 'pralinepistachos.jpg', 260.00, '2023-08-07', 29.00, 'Si eres amante de los sabores más refinados, no puedes dejar de probar este praliné de pistacho. El sabor suave y ligeramente dulce del pistacho se combina perfectamente con el chocolate.', 100),
(11, 'Bombón de chocolate negro con relleno de frutos del bosque', 1, 3, 1, 'trufaframbuesa.jpg', 405.00, '2023-07-08', 30.00, 'Una combinación de sabores intensos y frutales en cada bocado. Estos bombones de chocolate negro están rellenos de una mezcla de frutos del bosque que te sorprenderá.', 90),
(12, 'Trufa de caramelo y chocolate', 2, 5, 1, 'trufacaramelo.jpg', 200.00, '2023-09-17', 25.00, 'La combinación perfecta entre el caramelo y el chocolate en una trufa suave y cremosa. Cada mordisco te hará desear más.', 115),
(13, 'Bombón de chocolate blanco con maracuyá', 1, 1, 1, 'bombonmaracuya.jpg', 305.00, '2023-11-10', 38.00, 'Déjate seducir por la frescura y acidez del maracuyá en estos deliciosos bombones de chocolate blanco. Una combinación tropical que te transportará a lugares exóticos.', 120),
(14, 'Praliné de nueces pecanas', 3, 2, 1, 'pralinenueses.jpg', 190.00, '2023-08-19', 36.00, 'El sabor suave y mantecoso de las nueces pecanas se fusiona con el chocolate en este praliné irresistible. Un regalo perfecto para los amantes de los frutos secos.', 115),
(15, 'Bombón de chocolate negro con naranja confitada', 1, 5, 1, 'bombonmazapan.jpg', 300.00, '2023-12-20', 36.00, 'Una combinación clásica y sofisticada de chocolate negro con trozos de naranja confitada. Cada bocado es una explosión de sabores.', 90),
(16, 'Trufa de chocolate con almendras', 2, 2, 1, 'bombonturron.jpg', 200.00, '2023-10-18', 25.00, 'Una deliciosa trufa de chocolate rellena de almendras crocantes. Disfruta de la combinación perfecta de texturas y sabores.', 130);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chocolate`
--

CREATE TABLE `chocolate` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `origen_id` int(10) UNSIGNED NOT NULL,
  `tipo_chocolate_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chocolate`
--

INSERT INTO `chocolate` (`id`, `nombre`, `origen_id`, `tipo_chocolate_id`) VALUES
(1, 'Ghirardelli White Chocolate.', 6, 1),
(2, 'Lindt Swiss White Chocolate.', 7, 1),
(3, 'Marou Milk Chocolate.', 1, 2),
(4, 'Côte d\'Or Milk Chocolate.', 3, 2),
(5, 'Green & Black\'s Organic Dark Chocolate', 2, 5),
(6, 'Endangered Species Dark Chocolate.', 3, 4),
(7, 'Valrhona Guanaja Dark Chocolate.', 4, 3),
(27, 'Caramelo', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `importe` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `id_usuario`, `fecha`, `importe`) VALUES
(1, 3, '0000-00-00', 2625.00),
(2, 3, '2023-07-21', 2625.00),
(3, 3, '2023-07-21', 2625.00),
(4, 3, '2023-07-21', 2625.00),
(5, 3, '2023-07-21', 2625.00),
(6, 3, '2023-07-22', 320.00),
(7, 3, '2023-07-22', 320.00),
(8, 3, '2023-07-22', 320.00),
(9, 3, '2023-07-22', 320.00),
(10, 3, '2023-07-22', 320.00),
(11, 3, '2023-07-22', 320.00),
(12, 3, '2023-07-22', 960.00),
(13, 3, '2023-07-22', 1920.00),
(14, 3, '2023-07-22', 1920.00),
(15, 3, '2023-07-22', 1920.00),
(16, 3, '2023-07-22', 1920.00),
(17, 3, '2023-07-22', 1920.00),
(18, 3, '2023-07-22', 1920.00),
(19, 3, '2023-07-22', 2520.00),
(20, 3, '2023-07-22', 2520.00),
(21, 3, '2023-07-22', 2520.00),
(22, 3, '2023-07-22', 905.00),
(23, 3, '2023-07-22', 320.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `nombre`) VALUES
(1, 'Caramelo.'),
(2, 'Nueces.'),
(3, 'Crema de leche.'),
(4, 'Almendras.'),
(5, 'Avellanas.'),
(6, 'Pistachos.'),
(7, 'Pasas.'),
(8, 'Arándanos.'),
(9, 'Cerezas.'),
(10, 'Licor de naranja.'),
(11, 'Mantequilla.'),
(12, 'Fresas.'),
(13, 'Maracuyá.'),
(14, 'Naranja.'),
(15, 'Coco.'),
(16, 'Café.'),
(17, 'Frambuesa.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes_x_bombones`
--

CREATE TABLE `ingredientes_x_bombones` (
  `id` int(10) UNSIGNED NOT NULL,
  `bombones_id` int(10) UNSIGNED NOT NULL,
  `ingredientes_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingredientes_x_bombones`
--

INSERT INTO `ingredientes_x_bombones` (`id`, `bombones_id`, `ingredientes_id`) VALUES
(3, 5, 12),
(4, 13, 13),
(5, 13, 4),
(6, 9, 10),
(7, 9, 1),
(8, 9, 11),
(9, 2, 1),
(10, 2, 5),
(11, 7, 1),
(12, 7, 4),
(13, 7, 10),
(14, 15, 10),
(15, 15, 1),
(16, 15, 14),
(17, 11, 9),
(18, 11, 12),
(19, 11, 8),
(20, 11, 3),
(21, 4, 5),
(22, 14, 2),
(23, 10, 6),
(24, 6, 16),
(25, 6, 6),
(26, 12, 1),
(27, 12, 16),
(28, 8, 15),
(29, 8, 10),
(30, 16, 4),
(31, 3, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `origen_chocolate`
--

CREATE TABLE `origen_chocolate` (
  `id` int(10) UNSIGNED NOT NULL,
  `pais` varchar(256) NOT NULL,
  `calidad` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `origen_chocolate`
--

INSERT INTO `origen_chocolate` (`id`, `pais`, `calidad`) VALUES
(1, 'Costa de Marfil.', '90%'),
(2, 'Ghana.', '55%'),
(3, 'Indonesia.', '60%'),
(4, 'Ecuador.', '80%'),
(5, 'Brasil.', '89%'),
(6, 'Camerún.', '90%'),
(7, 'Perú.', '70%'),
(8, 'República Dominicana.', '40%');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_x_compra`
--

CREATE TABLE `productos_x_compra` (
  `id` int(11) UNSIGNED NOT NULL,
  `compra_id` int(11) UNSIGNED NOT NULL,
  `productos_id` int(11) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_x_compra`
--

INSERT INTO `productos_x_compra` (`id`, `compra_id`, `productos_id`, `cantidad`) VALUES
(1, 1, 5, 5),
(2, 1, 2, 5),
(3, 2, 5, 5),
(4, 2, 2, 5),
(5, 3, 5, 5),
(6, 3, 2, 5),
(7, 4, 5, 5),
(8, 4, 2, 5),
(9, 5, 5, 5),
(10, 5, 2, 5),
(11, 6, 5, 1),
(12, 7, 5, 1),
(13, 8, 5, 1),
(14, 9, 5, 1),
(15, 10, 5, 1),
(16, 11, 5, 1),
(17, 12, 5, 3),
(18, 13, 5, 6),
(19, 14, 5, 6),
(20, 15, 5, 6),
(21, 16, 5, 6),
(22, 17, 5, 6),
(23, 18, 5, 6),
(24, 19, 5, 1),
(25, 19, 7, 5),
(26, 19, 12, 6),
(27, 20, 5, 1),
(28, 20, 7, 5),
(29, 20, 12, 6),
(30, 21, 5, 1),
(31, 21, 7, 5),
(32, 21, 12, 6),
(33, 22, 11, 1),
(34, 22, 7, 1),
(35, 22, 9, 1),
(36, 23, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_bombones`
--

CREATE TABLE `tipos_bombones` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `proceso` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_bombones`
--

INSERT INTO `tipos_bombones` (`id`, `nombre`, `proceso`) VALUES
(1, 'Bombón.', 'El bombón es una pequeña porción de chocolate que puede llevar en su interior una cierta cantidad de licor o cualquier otro dulce, y que se suele consumir de un único bocado. '),
(2, 'Trufa.', 'La trufa de chocolate es un dulce con aspecto y sabor similar al bombón pero elaborado con una mezcla de chocolate negro fundido (tipo fondant), mantequilla, azúcar glas, yema de huevo y a veces crema de leche. '),
(3, 'Praliné.', 'El praliné es una pasta utilizada en repostería y compuesta tradicionalmente de una mezcla de almendra o avellana confitada en azúcar caramelizado. Se utiliza la misma cantidad de almendras que de azúcar.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_chocolate`
--

CREATE TABLE `tipos_chocolate` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_chocolate`
--

INSERT INTO `tipos_chocolate` (`id`, `nombre`) VALUES
(1, 'Chocolate Blanco.'),
(2, 'Chocolate de Leche.'),
(3, 'Chocolate 50% Cacao.'),
(4, 'Chocolate 70% Cacao.'),
(5, 'Chocolate 90% Cacao.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `rol` enum('superadmin','administrador','usuario','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre_usuario`, `nombre_completo`, `password`, `rol`) VALUES
(1, 'lucia.munoz@davinci.edu.ar', 'Lu_Larreta_', 'Lucia Muñoz Larreta', '$2y$10$4lFYZz6Jf0h1h5THwVnZdey18MhT2iJXiymdJANvewh87/W2rlJaG', 'superadmin'),
(2, 'jorge.perez@davinci.edu.ar', 'Jorge_Perez', 'Jorge Ernesto Perez', '$2y$10$9apmQQEfAbD6cR6Kz/Wx8uVmW6od3PmHeaYtPkEtgwiJFKUCaAfgS', 'administrador'),
(3, 'luchylarreta@gmail.com', 'LuciaLarreta', 'Lucia Muñoz Larreta', '$2y$10$.d9SkbNUjCoypxs/nwYOwO7sVi8JJCcT5/oI23QEbdRJ6oC9OvTNa', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bombones`
--
ALTER TABLE `bombones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_bombones_id` (`tipo_bombones_id`),
  ADD KEY `chocolate_id` (`chocolate_id`),
  ADD KEY `ingredientes_destacados_id` (`ingredientes_destacados_id`);

--
-- Indices de la tabla `chocolate`
--
ALTER TABLE `chocolate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `origen_id` (`origen_id`),
  ADD KEY `tipo_chocolate_id` (`tipo_chocolate_id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingredientes_x_bombones`
--
ALTER TABLE `ingredientes_x_bombones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bombones_id` (`bombones_id`),
  ADD KEY `ingredientes_id` (`ingredientes_id`);

--
-- Indices de la tabla `origen_chocolate`
--
ALTER TABLE `origen_chocolate`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_x_compra`
--
ALTER TABLE `productos_x_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compra_id` (`compra_id`),
  ADD KEY `productos_id` (`productos_id`);

--
-- Indices de la tabla `tipos_bombones`
--
ALTER TABLE `tipos_bombones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_chocolate`
--
ALTER TABLE `tipos_chocolate`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bombones`
--
ALTER TABLE `bombones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `chocolate`
--
ALTER TABLE `chocolate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ingredientes_x_bombones`
--
ALTER TABLE `ingredientes_x_bombones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `origen_chocolate`
--
ALTER TABLE `origen_chocolate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos_x_compra`
--
ALTER TABLE `productos_x_compra`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tipos_bombones`
--
ALTER TABLE `tipos_bombones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipos_chocolate`
--
ALTER TABLE `tipos_chocolate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bombones`
--
ALTER TABLE `bombones`
  ADD CONSTRAINT `bombones_ibfk_1` FOREIGN KEY (`tipo_bombones_id`) REFERENCES `tipos_bombones` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bombones_ibfk_3` FOREIGN KEY (`chocolate_id`) REFERENCES `chocolate` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `chocolate`
--
ALTER TABLE `chocolate`
  ADD CONSTRAINT `chocolate_ibfk_1` FOREIGN KEY (`origen_id`) REFERENCES `origen_chocolate` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `chocolate_ibfk_2` FOREIGN KEY (`tipo_chocolate_id`) REFERENCES `tipos_chocolate` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingredientes_x_bombones`
--
ALTER TABLE `ingredientes_x_bombones`
  ADD CONSTRAINT `ingredientes_x_bombones_ibfk_2` FOREIGN KEY (`ingredientes_id`) REFERENCES `ingredientes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ingredientes_x_bombones_ibfk_3` FOREIGN KEY (`bombones_id`) REFERENCES `bombones` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_x_compra`
--
ALTER TABLE `productos_x_compra`
  ADD CONSTRAINT `productos_x_compra_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_x_compra_ibfk_2` FOREIGN KEY (`productos_id`) REFERENCES `bombones` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
