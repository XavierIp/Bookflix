-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2023 a las 06:45:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registrose`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_co` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `comentarios` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_co`, `id_libro`, `comentarios`, `id_usuario`, `fecha`) VALUES
(1, 3, 'hjtyfyjghklñ,{.', 14, '2023-07-01 18:15:29'),
(5, 3, 'gdfgdfg', 14, '2023-07-01 18:30:06'),
(6, 3, 'gdfgdfg', 14, '2023-07-01 18:30:14'),
(7, 3, 'gdfgdfg', 14, '2023-07-01 18:30:35'),
(18, 1, 'hola\r\n', 4, '2023-07-05 02:14:47'),
(19, 1, 'hola', 16, '2023-07-11 19:34:37'),
(20, 3, 'hcgjvhgkbhlñ', 4, '2023-07-13 01:36:44'),
(21, 1, 'dfghjk', 4, '2023-07-18 19:49:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `descripcion` varchar(225) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `pdf` varchar(250) NOT NULL,
  `id_suscripcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `nombre`, `genero`, `descripcion`, `foto`, `pdf`, `id_suscripcion`) VALUES
(1, 'Harry Potter', 'Fantasia', 'Harry Potter es una serie de novelas fantásticas escrita por la autora británica J. K. Rowling, en la que se describen las aventuras del joven aprendiz de magia y hechicería Harry Potter y sus amigos Hermione Granger y Ron We', 'img/imagen1.jpg', 'pdf/harry.pdf', 3),
(18, 'Pinocho', 'Accion', 'Las aventuras de Pinocho es una obra literaria escrita por el autor italiano Carlo Collodi. Se publicó en Italia en el periódico Giornale per i bambini, desde 1881 hasta 1883, con el título Storia di un Burattino, acompañada ', 'img/imagen8.jpg', 'pdf/Pinocho.pdf', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `id_suscripcion` int(11) NOT NULL,
  `suscripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`id_suscripcion`, `suscripcion`) VALUES
(1, 'Básico'),
(3, 'Regular'),
(4, 'Premium');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_suscripcion` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `email`, `clave`, `estado`, `id_suscripcion`) VALUES
(19, 'usuario', 'usuario@usuario.com', '$2y$10$jf2xlxBqriamymc8.x4Ftuabbohh.mrv0mpUu5WJhF9r.Pok6OHBq', 0, 4),
(14, 'hades2003', 'hades2003@gmail.com', '$2y$10$Ux105NiKfnuRvDtGw0xkUe8glXRMgfJE6JpZejbBeWpA1xNyZSiCe', 0, 1),
(4, 'admin', 'xibarraprieto2003@gmail.com', '$2y$10$zxiiEi8PsRZp4G2uUQuJ2ulPkqpe/DdEMctN8/TqcAYASescEMI7i', 1, 3),
(20, 'user1', 'use1@gmail.com', '$2y$10$hT4OGSMezxmVCE7hhMPFceTO.i2/Ja6mtx3K1RLbUPK3FXRdETl4u', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_co`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`id_suscripcion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_co` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id_suscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
