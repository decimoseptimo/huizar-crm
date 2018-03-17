-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2017 a las 23:41:53
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `huizar_pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `email_unsuscribed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `email`, `email_unsuscribed`, `created_at`, `updated_at`) VALUES
(1, 'Angel', 'Arteaga', 'angelito@hotmail.com', 0, '2016-05-24 01:11:10', '2016-05-24 01:11:10'),
(2, 'Braulio', 'Boga', 'braulio.voga@gmail.com', 0, '2016-05-24 02:36:53', '2016-05-24 02:36:53'),
(3, 'Carlos', 'Corral', 'carlos_2000@yahoo.com.mx', 0, '2016-05-24 02:36:53', '2016-05-24 02:36:53'),
(4, 'Dora', 'Dorantes', 'dorantes_dora@hotmail.com', 0, '2016-05-28 00:57:44', '2016-05-28 00:57:44'),
(5, 'Ernesto', 'Esparza', 'ernesto_e@hotmail.com', 0, '2016-05-28 01:40:10', '2016-05-28 01:40:10'),
(6, 'Jose', 'Perez', 'jobsmxli@gmail.com', 0, '2017-01-30 00:10:04', '2017-01-30 00:10:04'),
(7, 'Fernando', 'Fimbres', 'fernan2008@hotmail.com', 0, '2017-02-06 01:22:08', '2017-02-06 01:22:08'),
(8, 'Gerardo', 'Gonzales Arteaga', 'gerardo_gonzales@yahoo.com.mx', 0, '2017-02-07 01:05:34', '2017-02-07 01:05:34'),
(9, 'Hector', 'Hilario', 'hector.hilario@gmail.com', 0, '2017-02-07 07:01:33', '2017-02-07 07:01:33'),
(11, 'Irma', 'Iriarte', 'irma_iriarte@yahoo.com.mx', 0, '2017-02-10 06:19:55', '2017-02-10 06:20:14'),
(12, 'Juan', 'Jacales', 'jjacales@hotmail.com', 0, '2017-02-10 06:21:18', '2017-02-10 06:21:18'),
(13, 'Karla', 'Kron', 'karla@kron.mx', 0, '2017-02-10 06:22:29', '2017-02-10 06:22:29'),
(14, 'Lisbeth', 'Linares', 'lisbeth.l@gmail.com', 0, '2017-02-11 00:47:02', '2017-02-11 00:47:02'),
(15, 'Mario', 'Martinez', 'mmartinez@yahoo.com.mx', 0, '2017-02-11 00:47:48', '2017-02-11 00:47:48'),
(16, 'Norma', 'Nadro', 'norma@nadro.mx', 0, '2017-02-11 00:55:33', '2017-02-11 00:55:33'),
(17, 'Omar', 'Osuna', 'omar2012@hotmail.com', 0, '2017-02-11 23:35:49', '2017-02-11 23:35:49'),
(18, 'Pedro', 'Parra', 'pedro.parra@gmail.com', 0, '2017-02-12 00:33:48', '2017-02-12 00:33:48'),
(19, 'Quetzal', 'Quesada', 'quetzal.quezada@gmail.com', 0, '2017-02-12 00:35:38', '2017-02-12 00:36:04'),
(20, 'Raul', 'Ramirez', 'raulram@hotmail.com', 0, '2017-02-12 05:48:49', '2017-02-12 05:48:49'),
(21, 'Sergio', 'Sosa', 's_sosa@yahoo.com.mx', 0, '2017-02-12 19:02:53', '2017-02-12 19:02:53'),
(22, 'Tamara', 'Torres', 'tamtom@hotmail.com', 0, '2017-02-12 19:10:22', '2017-02-12 19:10:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer3`
--

CREATE TABLE `customer3` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `email_unsuscribed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `customer3`
--

INSERT INTO `customer3` (`id`, `first_name`, `last_name`, `email`, `email_unsuscribed`, `created_at`, `updated_at`) VALUES
(13, 'Jose', 'Jimenez', 'jose.jimenez@gmail.com', 0, '2016-05-24 01:11:10', '2017-01-16 02:04:12'),
(14, 'Angel', 'Arteaga', 'angelito15@hotmail.com', 0, '2016-05-24 01:38:30', NULL),
(15, 'Manuel', 'Miranda', 'miranda_337@yahoo.com.mx', 0, '2016-05-24 02:36:53', NULL),
(16, 'Nestor', 'Nieto', 'nertor_mx@hotmail.com', 0, '2016-05-28 00:57:44', NULL),
(17, 'Oscar', 'Osuna', 'dr.oscar.osuna@gmail.com', 0, '2016-05-28 01:40:10', NULL),
(18, 'Pedro', 'Parra', 'el_mejor_del_barrio@yahoo.com.mx', 0, '2016-05-28 03:01:58', NULL),
(19, 'Quinton', 'Quintana', 'quinton@quintanainc.com', 0, '2016-05-28 03:32:31', NULL),
(20, 'Raul', 'Rodriguez', 'camaleon_rrr@hotmail.com', 0, '2016-05-29 01:40:08', NULL),
(21, 'Sergio', 'Sosa', 'sergio.sosa@jumexmexicali.com', 0, '2016-05-30 02:59:16', NULL),
(22, 'Teodoro', 'Talamantes', 'eltala@gmail.com', 0, '2016-06-02 00:29:29', NULL),
(23, 'Ursula', ' Ureta', 'ursula_pink@hotmail.com', 0, '2016-06-02 01:50:43', NULL),
(24, 'Vladimir', 'Vega', 'vladimir@vega.mx', 0, '2016-06-02 01:57:27', NULL),
(25, 'Walter', 'Wallace', 'wall2000@hotmail.com', 0, '2016-06-08 22:38:28', NULL),
(26, 'Ximena', 'Xomelt', 'ximena.xomelt@gmail.com', 0, '2016-06-09 22:01:49', NULL),
(27, 'Yesenia', 'YaÃ±ez', 'yeya2001@yahoo.com.mx', 0, '2016-06-14 17:43:06', NULL),
(28, 'Zara', 'ZuÃ±iga', 'zuniga@zara.mx', 0, '2016-06-14 17:47:18', NULL),
(29, 'Armando', 'Aranda', 'nando2015@yahoo.com.mx', 0, '2016-06-14 18:01:10', NULL),
(30, 'Bernardo', 'Betancourt', 'beto_betancourt@yahoo.com.mx', 0, '2016-06-16 17:04:04', '2016-06-16 18:31:33'),
(31, 'Carlos', 'Castro', 'almacenes-castro@hotmail.com', 0, '2016-06-16 18:26:39', NULL),
(32, 'David', 'Diaz', 'david.diaz@gmail.com', 0, '2016-06-16 18:34:58', NULL),
(33, 'Ernesto', 'Esparza', 'netoneto@gmail.com', 0, '2016-06-17 03:23:50', NULL),
(34, 'Fernando', 'Fimbres', 'ffimbres@utech.us', 0, '2016-06-17 18:22:10', '2016-06-21 02:14:55'),
(35, 'Gerardo', 'Gonzales', 'gerardito2004@gmail.com', 0, '2016-06-23 20:16:44', NULL),
(36, 'Hugo', 'Hilario', 'hh_mxli@gmail.com', 0, '2016-06-25 18:03:05', NULL),
(37, 'Irma', 'Iriarte', 'irma_iriarte@gmail.com', 0, '2016-06-29 19:10:46', NULL),
(38, 'Jose', 'Jimenez', 'jose.jimenez@hotmail.com', 0, '2016-06-30 18:38:35', NULL),
(39, 'Karla', 'Kron', 'karla@kron.mx', 0, '2017-01-14 03:32:12', NULL),
(47, 'hjghjhj', 'hgjhgj', 'gjghghj', 0, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1485721177),
('m170129_195219_create_customer_table', 1485730565),
('m170129_205129_create_order_table', 1485731760);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `ready_at` datetime DEFAULT NULL,
  `user_notified_at` datetime DEFAULT NULL,
  `finished_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `order`
--

INSERT INTO `order` (`id`, `status`, `created_at`, `ready_at`, `user_notified_at`, `finished_at`, `updated_at`, `customer_id`) VALUES
(1, 0, '2016-05-24 03:30:25', NULL, NULL, NULL, '2016-05-24 03:30:25', 5),
(2, 0, '2016-05-26 01:34:04', NULL, NULL, NULL, '2016-05-26 01:34:04', 5),
(3, 0, '2016-05-26 06:42:05', NULL, NULL, NULL, '2016-05-26 06:42:05', 1),
(4, 1, '2016-06-16 19:22:51', '2016-06-16 22:12:19', NULL, NULL, '2016-06-16 22:12:19', 2),
(5, 1, '2017-01-13 03:33:14', '2017-01-16 08:01:42', NULL, NULL, '2017-01-16 08:01:42', 3),
(6, 0, '2017-01-13 03:33:33', NULL, NULL, NULL, '2017-01-13 03:33:33', 1),
(7, 1, '2017-01-14 03:33:22', '2017-01-14 06:24:41', NULL, NULL, '2017-01-14 06:24:41', 4),
(8, 2, '2017-01-16 21:30:53', '2017-01-18 01:18:30', NULL, '2017-01-18 01:19:10', '2017-01-18 01:19:10', 1),
(9, 2, '2017-01-18 01:28:27', '2017-01-18 01:48:13', NULL, '2017-01-31 08:26:48', '2017-01-31 08:26:48', 2),
(10, 2, '2017-01-18 07:19:49', '2017-01-20 05:13:09', NULL, '2017-01-20 05:14:14', '2017-01-20 05:14:14', 2),
(11, 2, '2017-01-30 00:10:29', '2017-01-30 00:23:36', NULL, '2017-01-30 00:25:35', '2017-01-30 00:25:35', 6),
(12, 1, '2017-01-30 00:19:16', '2017-01-30 00:26:05', NULL, NULL, '2017-02-10 22:21:17', 6),
(13, 0, '2017-01-30 00:27:25', NULL, NULL, NULL, '2017-01-30 00:27:25', 6),
(14, 1, '2017-01-30 01:18:28', '2017-01-30 01:21:28', NULL, NULL, '2017-01-30 01:21:28', 6),
(15, 0, '2017-02-06 01:24:36', NULL, NULL, NULL, '2017-02-06 01:24:36', 7),
(16, 0, '2017-02-07 07:01:56', NULL, NULL, NULL, '2017-02-07 07:01:56', 9),
(17, 1, '2017-02-08 00:32:51', '2017-02-12 19:12:54', NULL, NULL, '2017-02-12 19:12:54', 9),
(18, 0, '2017-02-08 02:24:32', NULL, NULL, NULL, '2017-02-08 02:24:32', 9),
(21, 1, '2017-02-12 00:38:38', '2017-02-12 05:44:40', NULL, NULL, '2017-02-12 05:44:40', 13),
(22, 0, '2017-02-12 00:39:13', NULL, NULL, NULL, '2017-02-12 00:39:13', 16),
(23, 0, '2017-02-12 00:39:34', NULL, NULL, NULL, '2017-02-12 00:39:34', 18),
(24, 0, '2017-02-12 05:44:33', NULL, NULL, NULL, '2017-02-12 05:44:33', 13),
(25, 0, '2017-02-12 05:45:29', NULL, NULL, NULL, '2017-02-12 05:45:29', 15),
(26, 1, '2017-02-12 05:47:34', '2017-02-12 19:13:28', NULL, NULL, '2017-02-12 19:13:28', 19),
(27, 0, '2017-02-12 19:11:15', NULL, NULL, NULL, '2017-02-12 19:11:15', 16),
(28, 0, '2017-02-12 19:11:35', NULL, NULL, NULL, '2017-02-12 19:11:35', 21),
(29, 0, '2017-02-12 19:12:02', NULL, NULL, NULL, '2017-02-12 19:12:02', 19),
(30, 0, '2017-02-12 19:12:29', NULL, NULL, NULL, '2017-02-12 19:12:29', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order3`
--

CREATE TABLE `order3` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `user_notified_at` datetime DEFAULT NULL,
  `finished_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `order3`
--

INSERT INTO `order3` (`id`, `status`, `created_at`, `user_notified_at`, `finished_at`, `updated_at`, `customer_id`) VALUES
(1, 0, '2017-01-13 03:33:14', '2017-01-16 08:01:42', NULL, '2017-01-18 06:04:32', 13),
(2, 1, '2017-01-13 01:07:49', NULL, NULL, NULL, 13),
(3, 2, '2017-01-13 01:08:54', NULL, NULL, NULL, 13),
(4, 1, '2017-01-13 01:12:36', NULL, NULL, NULL, 13),
(5, 0, '2016-05-24 03:30:25', NULL, NULL, NULL, 13),
(6, 0, '2016-05-24 03:30:51', NULL, NULL, NULL, 13),
(8, 1, '2016-05-24 03:31:37', NULL, '2016-05-30 02:57:19', NULL, 13),
(10, 1, '2016-05-24 20:03:40', NULL, '2016-06-03 02:26:36', NULL, 13),
(11, 0, '2016-05-26 01:34:04', NULL, NULL, NULL, 15),
(12, 0, '2016-05-26 06:42:05', NULL, NULL, NULL, 15),
(13, 0, '2016-05-27 05:54:26', NULL, NULL, NULL, 13),
(14, 0, '2016-05-28 03:03:54', NULL, NULL, NULL, 18),
(15, 1, '2016-05-28 03:32:53', NULL, '2016-05-30 02:57:31', NULL, 19),
(16, 0, '2016-05-29 00:23:16', NULL, NULL, NULL, 20),
(17, 1, '2016-05-29 01:43:51', NULL, '2016-05-29 22:47:05', NULL, 20),
(18, 0, '2016-05-29 02:10:57', NULL, NULL, NULL, 18),
(19, 1, '2016-05-29 03:37:04', NULL, '2016-05-29 22:47:15', NULL, 20),
(20, 0, '2016-05-29 03:41:56', NULL, NULL, NULL, 20),
(21, 0, '2016-05-29 03:42:23', NULL, NULL, NULL, 20),
(22, 1, '2016-05-29 03:42:29', NULL, '2016-05-31 02:11:06', NULL, 20),
(23, 1, '2016-05-30 03:00:25', NULL, '2016-05-30 03:00:44', NULL, 21),
(24, 0, '2016-06-02 00:31:32', NULL, NULL, NULL, 22),
(25, 0, '2016-06-02 01:56:06', NULL, NULL, NULL, 23),
(26, 1, '2016-06-02 01:59:13', NULL, '2016-06-03 00:23:56', NULL, 23),
(27, 0, '2016-06-03 00:23:53', NULL, NULL, NULL, 23),
(28, 0, '2016-06-03 02:30:16', NULL, NULL, NULL, 23),
(29, 1, '2016-06-09 03:57:09', NULL, '2016-06-09 03:57:21', NULL, 25),
(30, 1, '2016-06-09 03:57:13', NULL, '2016-06-09 04:26:33', NULL, 25),
(31, 0, '2016-06-09 22:02:11', NULL, NULL, NULL, 26),
(32, 0, '2016-06-14 17:48:22', NULL, NULL, NULL, 28),
(33, 1, '2016-06-14 18:10:00', NULL, '2016-06-14 18:29:05', NULL, 28),
(34, 0, '2016-06-14 18:14:07', NULL, NULL, NULL, 29),
(35, 0, '2016-06-14 18:29:20', NULL, NULL, NULL, 28),
(36, 1, '2016-06-16 18:27:10', NULL, '2016-06-16 19:38:26', NULL, 31),
(37, 1, '2016-06-16 19:22:51', NULL, '2016-06-16 20:05:21', NULL, 31),
(38, 0, '2016-06-16 19:38:19', NULL, NULL, NULL, 31),
(39, 1, '2016-06-17 18:22:43', NULL, '2016-06-17 22:54:14', NULL, 33),
(40, 1, '2016-06-17 19:52:19', NULL, '2016-06-17 23:25:03', NULL, 34),
(41, 2, '2016-06-17 22:23:59', NULL, '2017-01-11 06:48:23', NULL, 33),
(43, 1, '2016-06-23 20:21:24', NULL, '2016-06-23 20:21:49', NULL, 35),
(44, 1, '2017-01-14 03:33:22', NULL, NULL, '2017-01-14 03:35:23', 39),
(45, 2, '2017-01-16 21:30:53', '2017-01-18 01:18:30', '2017-01-18 01:19:10', '2017-01-18 01:19:10', 39),
(46, 0, '2017-01-18 01:28:04', NULL, NULL, NULL, 13),
(47, 1, '2017-01-18 01:28:27', '2017-01-18 01:28:27', NULL, NULL, 13),
(48, 2, '2017-01-18 01:28:41', NULL, '2017-01-18 01:28:41', NULL, 13),
(49, 0, '2017-01-18 07:19:34', NULL, NULL, NULL, 39),
(50, 2, '2017-01-18 07:19:49', '2017-01-20 05:13:09', '2017-01-20 05:14:14', '2017-01-20 05:14:14', 39),
(51, 0, '2017-01-18 07:19:49', NULL, NULL, NULL, 39),
(52, 0, '2017-01-18 07:20:00', NULL, NULL, NULL, 39),
(53, 0, '2017-01-18 07:20:33', NULL, NULL, NULL, 39),
(54, 0, '2017-01-18 07:44:35', NULL, NULL, NULL, 39),
(55, 0, '2017-01-19 20:37:20', NULL, NULL, '2017-01-19 20:37:20', 22),
(56, 1, '2017-01-19 20:38:14', '2017-01-19 20:38:14', NULL, '2017-01-19 20:38:14', 22),
(57, 2, '2017-01-19 20:38:49', NULL, '2017-01-19 20:38:49', '2017-01-19 20:38:49', 22),
(60, 2, '2017-01-23 21:47:14', NULL, '2017-01-23 21:47:14', '2017-01-23 21:47:14', 33);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `customer3`
--
ALTER TABLE `customer3`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix-customer_id` (`customer_id`);

--
-- Indices de la tabla `order3`
--
ALTER TABLE `order3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix_user_id` (`customer_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `customer3`
--
ALTER TABLE `customer3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `order3`
--
ALTER TABLE `order3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk-order-customer_id-customer-id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `order3`
--
ALTER TABLE `order3`
  ADD CONSTRAINT `fk_customer$order` FOREIGN KEY (`customer_id`) REFERENCES `customer3` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
