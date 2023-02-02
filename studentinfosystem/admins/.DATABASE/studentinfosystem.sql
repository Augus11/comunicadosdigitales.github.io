-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2022 a las 05:28:55
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
-- Base de datos: `studentinfosystem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `adminName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `test` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `apercibimientos` int(10) NOT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `adminName`, `password`, `test`, `firstname`, `lastname`, `course`, `apercibimientos`, `date_joined`) VALUES
(15, 'testuser', 'testuser', '1', 'Test', 'User', 'BSIT', 1, '2017-05-28'),
(16, 'johndoe', 'johndoe', '403281', 'John', 'Doe', 'BSBA', 3, '2017-05-28'),
(17, 'harryden', 'harry', '12345', 'Harry', 'Den', 'BSIT', 3, '2018-12-24'),
(19, '48032675', '123', '0', 'Augusto', 'Antenucci', '1A', 0, '2022-07-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apercibimientos`
--

CREATE TABLE `apercibimientos` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `reason` text NOT NULL,
  `total` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `apercibimientos`
--

INSERT INTO `apercibimientos` (`id`, `dni`, `reason`, `total`, `fecha`) VALUES
(3, 48032675, 'Prueba apercibimiento 1', 2, '2022-07-20'),
(4, 48032675, ' Prueba Apercibimiento 2', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorized`
--

CREATE TABLE `autorized` (
  `id` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `pdni` int(11) NOT NULL,
  `sdni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autorized`
--

INSERT INTO `autorized` (`id`, `pname`, `pdni`, `sdni`) VALUES
(3, 'Agustin Rossi', 34553045, 48032675),
(5, 'Paul Roveda', 33546376, 6466634);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `course` varchar(2) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `test` varchar(50) NOT NULL,
  `mark` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `firstname`, `lastname`, `course`, `materia`, `test`, `mark`) VALUES
(10, 'Paull', 'Roveda', '4A', 'Matematica', 'Evaluación 1', '7'),
(17, 'Paul', 'Roveda', '4A', 'Matematica', 'Evaluación 2', '6'),
(18, 'Augusto', 'Antenucci', '4A', 'Matematica', 'Evaluación 2', '6'),
(19, 'Paul', 'Roveda', '4A', 'Psicología', 'Evaluación 1', '7'),
(20, 'Augusto', 'Antenucci', '4A', 'Psicología', 'Evaluación 1', '4'),
(21, 'Paul', 'Roveda', '4A', 'Matematica', 'Evaluación 2', '7'),
(22, 'Augusto', 'Antenucci', '4A', 'Matematica', 'Evaluación 2', '7'),
(23, 'John', 'Doe', '1A', 'Matematica', 'Evaluación 1', '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `adminName` varchar(11) NOT NULL,
  `course` varchar(15) NOT NULL,
  `fecha` datetime NOT NULL,
  `reply` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `adminName`, `course`, `fecha`, `reply`, `image_url`) VALUES
(58, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquet varius egestas. Aenean molestie porttitor risus, et gravida dolor auctor a. Nulla ornare tortor ut tellus placerat tincidunt. Proin et hendrerit eros. In semper nisi quis volutpat pretium. Sed sed imperdiet lacus. Donec pulvinar imperdiet efficitur.', '48032675', '', '2022-07-11 00:02:14', 0, ''),
(59, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquet varius egestas. Aenean molestie porttitor risus, et gravida dolor auctor a. Nulla ornare tortor ut tellus placerat tincidunt. Proin et hendrerit eros. In semper nisi quis volutpat pretium. Sed sed imperdiet lacus. Donec pulvinar imperdiet efficitur.', '48032675', '', '2022-07-11 00:02:38', 0, ''),
(60, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce aliquet varius egestas. Aenean molestie porttitor risus, et gravida dolor auctor a. Nulla ornare tortor ut tellus placerat tincidunt. Proin et hendrerit eros. In semper nisi quis volutpat pretium. Sed sed imperdiet lacus. Donec pulvinar imperdiet efficitur.', '48032675', '', '2022-07-11 00:02:40', 0, ''),
(77, 'PRUEBA', '48032675', '', '2022-07-15 19:15:32', 0, ''),
(94, 'Respuesta 1', '48032675', '', '2022-07-28 22:41:48', 85, ''),
(95, 'respuesta 2', '634686462', '', '2022-07-28 22:44:37', 85, ''),
(97, 'Respuesta 3', '4750275', '', '2022-07-28 22:52:26', 85, ''),
(103, 'Hola', '48032675', '', '2022-07-29 16:20:51', 86, ''),
(104, 'prueba', '48032675', '1A', '2022-07-29 16:22:17', 86, ''),
(105, 'respuesta', '48032675', '4A', '2022-08-23 21:18:43', 86, ''),
(106, 'Comunicado 2', '48032675', '4A', '2022-08-23 21:19:59', 0, ''),
(107, 'respuesta 1', '48032675', '4A', '2022-08-23 21:20:08', 106, ''),
(108, 'respuesta 2', '48032675', '1A', '2022-08-23 21:20:29', 106, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id`, `course`) VALUES
(1, '1A'),
(3, '2A'),
(4, '2B'),
(5, '3A'),
(6, '3B'),
(7, '4A'),
(8, '4B'),
(9, '5A'),
(10, '5B'),
(11, '6A'),
(12, '6B'),
(20, '1B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faltas`
--

CREATE TABLE `faltas` (
  `id` int(11) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `dni` int(11) NOT NULL,
  `dia` date NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `faltas`
--

INSERT INTO `faltas` (`id`, `fullname`, `dni`, `dia`, `tipo`) VALUES
(1, 'Augusto Antenucci', 48032675, '2022-08-17', 'Ausente'),
(2, 'Augusto Antenucci', 48032675, '2022-08-05', 'Falta Justificada'),
(9, 'Augusto Antenucci', 48032675, '2022-07-13', '1/2 Falta'),
(12, 'Augusto Antenucci', 4750275, '2022-08-02', '1/4 Falta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `image_url`) VALUES
(1, 'IMG-62ccb8942662d2.85622671.png'),
(2, 'IMG-62ccb8a5685ac8.07259753.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`) VALUES
(1, 'Matematica'),
(2, 'Historia'),
(3, 'Ingles'),
(5, 'Psicología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retiros`
--

CREATE TABLE `retiros` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `dni` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `retiros`
--

INSERT INTO `retiros` (`id`, `fullname`, `dni`, `fecha`) VALUES
(1, 'Augusto Antenucci', 48032675, '2022-07-29'),
(2, 'Augusto Antenucci', 48032675, '2022-07-29'),
(3, 'Augusto Antenucci', 48032675, '2022-07-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`) VALUES
(8, 'Test', 'Preuevaaa!', '2022-07-25 13:01:00', '2022-07-26 13:01:00'),
(10, 'Prueba', 'Pruebaa!', '2022-08-08 21:19:00', '2022-08-08 22:20:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `dni` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `dni`, `password`, `firstname`, `lastname`, `course`, `date_joined`) VALUES
(15, '47646439', 'testuser', 'Test', 'User', '5A', '2022-05-28'),
(16, '47502751', 'johndoe', 'John', 'Doe', '1A', '2022-05-09'),
(17, '63468645', 'harry', 'Paul', 'Roveda', '4A', '2022-07-24'),
(19, '48032675', '111', 'Augusto', 'Antenucci', '4A', '2022-07-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `course` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tests`
--

INSERT INTO `tests` (`id`, `nombre`, `course`) VALUES
(1, 'Evaluación 1', '4A'),
(3, 'Evaluación 2', '1B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mobile`, `city`) VALUES
(7, 'pki-validation', 'user@gmail.com', '8887919632', 'Lucknow'),
(8, 'pki-validation', 'user@gmail.com', '8887919632', 'Lucknow'),
(9, 'Rajs', 'user@gmail.com', '8887919632', 'Lucknow'),
(10, 'Amrendra', 'user@gmail.com', '434334', 'Lucknow'),
(11, 'Bahubalis', 'user@gmail.com', '434334', 'Lucknow'),
(12, 'Alok Kumar bisht', 'user@gmail.com', '434334', 'Lucknow'),
(13, 'admin', 'admin@gmail.com', '9988999999', 'Lucknow'),
(15, 'ninebroadband', 'superadmin@gmail.com', '8127956219', 'Lucknow'),
(16, 'index.html', 'superadmin@gmail.com', '8127956219', 'Lucknow'),
(18, 'index.html', 'user@gmail.com', '8127956219', 'Lucknow'),
(19, 'sfd', 'sfdasf@Gmail.com', 'adsffsaf', 'safdsa'),
(20, 'sfd', 'sfdasf@Gmail.com', 'adsffsaf', 'safdsa'),
(21, 'Augusto Antenucci', 'antenucciaugusto@gmail.com', '01130590924', 'VIlla Bosch');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `apercibimientos`
--
ALTER TABLE `apercibimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `autorized`
--
ALTER TABLE `autorized`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faltas`
--
ALTER TABLE `faltas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `retiros`
--
ALTER TABLE `retiros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `apercibimientos`
--
ALTER TABLE `apercibimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `autorized`
--
ALTER TABLE `autorized`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `faltas`
--
ALTER TABLE `faltas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `retiros`
--
ALTER TABLE `retiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
