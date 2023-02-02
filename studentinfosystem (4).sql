-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2022 a las 18:34:25
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
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `adminName`, `password`, `firstname`, `lastname`, `course`, `date_joined`) VALUES
(15, 'testuser', 'testuser', 'Test', 'User', 'BSIT', '2017-05-28'),
(16, 'johndoe', 'johndoe', 'John', 'Doe', 'BSBA', '2017-05-28'),
(17, 'harryden', 'harry', 'Harry', 'Den', 'BSIT', '2018-12-24'),
(19, '48032675', '123', 'Augusto', 'Antenucci', '1A', '2022-07-09'),
(20, 'test1', '3', 'A', 'A', '', '2022-10-15'),
(21, 't', 'T', 'T', 'T', '1', '2022-10-15');

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
(4, 48032675, ' Prueba Apercibimiento 2', 1, '0000-00-00'),
(21, 48032675, ' prueba', 3, '2022-10-20'),
(22, 48032675, ' RRR', 4, '2022-11-27');

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
-- Estructura de tabla para la tabla `boletines`
--

CREATE TABLE `boletines` (
  `id` int(11) NOT NULL,
  `dni` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `signed` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `boletines`
--

INSERT INTO `boletines` (`id`, `dni`, `url`, `signed`) VALUES
(7, '48032675', 'uploads/boletines/TutorialUBA.pdf', ''),
(8, '49537116', 'uploads/boletinesDocumento_sin_titulo_2.pdf', ''),
(9, '5004275', 'uploads/boletinesDocumento_sin_titulo_2.pdf', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bono`
--

CREATE TABLE `bono` (
  `id` int(11) NOT NULL,
  `dni` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `cuota1` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cuota2` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cuota3` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cuota4` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cuota5` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cuota6` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `bono`
--

INSERT INTO `bono` (`id`, `dni`, `cuota1`, `cuota2`, `cuota3`, `cuota4`, `cuota5`, `cuota6`) VALUES
(1, '48', 'on', '', '', '', '', ''),
(2, '48', '', '', '', 'on', '', ''),
(3, '48032675', 'on', 'on', '', 'on', 'on', ''),
(4, '48032675', '', 'on', 'on', '', '', ''),
(5, '23448593', 'on', 'on', 'on', 'on', '', ''),
(6, '63468645', 'on', 'on', '', '', 'on', 'on');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `dni` int(8) NOT NULL,
  `course` varchar(2) NOT NULL,
  `materia` varchar(50) NOT NULL,
  `test` varchar(50) NOT NULL,
  `mark` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `firstname`, `lastname`, `dni`, `course`, `materia`, `test`, `mark`) VALUES
(10, 'Paull', 'Roveda', 0, '4A', 'Matematica', 'Evaluación 1', '7'),
(17, 'Paul', 'Roveda', 0, '4A', 'Matematica', 'Evaluación 2', '6'),
(18, 'Augusto', 'Antenucci', 48032675, '4A', 'Matematica', 'Evaluación 2', '6'),
(19, 'Paul', 'Roveda', 0, '4A', 'Psicología', 'Evaluación 1', '7'),
(20, 'Augusto', 'Antenucci', 48032675, '4A', 'Psicología', 'Evaluación 1', '4'),
(21, 'Paul', 'Roveda', 0, '4A', 'Matematica', 'Evaluación 2', '7'),
(22, 'Augusto', 'Antenucci', 48032675, '4A', 'Matematica', 'Evaluación 2', '7'),
(23, 'John', 'Doe', 0, '1A', 'Matematica', 'Evaluación 1', '10'),
(24, 'Samuel Nicolas', 'Samuel Nicolas', 49537116, '1A', 'Matematica', 'Evaluación 1', '5'),
(25, 'Kiara Valentina', 'Kiara Valentina', 50266396, '1A', 'Matematica', 'Evaluación 1', '5'),
(26, 'Nicolas Gabriel', 'Nicolas Gabriel', 49761158, '1A', 'Matematica', 'Evaluación 1', '890'),
(27, 'Camila Anahí', 'Camila Anahí', 49929341, '1A', 'Matematica', 'Evaluación 1', '5'),
(28, 'Lucas Gustavo', 'Lucas Gustavo', 5004275, '1A', 'Matematica', 'Evaluación 1', '2'),
(29, 'Julian Mateo', 'Julian Mateo', 50154582, '1A', 'Matematica', 'Evaluación 1', '9'),
(30, 'Ayrton', 'Ayrton', 49811794, '1A', 'Matematica', 'Evaluación 1', '5'),
(31, 'Catalina', 'Catalina', 49875104, '1A', 'Matematica', 'Evaluación 1', '6'),
(32, 'John', 'Doe', 47502751, '1A', 'Matematica', 'Evaluación 1', '89'),
(33, 'Bautista', 'Bautista', 50031550, '1A', 'Matematica', 'Evaluación 1', '6'),
(34, 'Catalina', 'Catalina', 49960413, '1A', 'Matematica', 'Evaluación 1', '4'),
(35, 'Katia', 'Katia', 50043292, '1A', 'Matematica', 'Evaluación 1', '3'),
(36, 'Agustin Sergio', 'Agustin Sergio', 49932657, '1A', 'Matematica', 'Evaluación 1', '3'),
(37, 'Josefina', 'Josefina', 49811843, '1A', 'Matematica', 'Evaluación 1', '3');

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
  `reply` int(11) DEFAULT 0,
  `image_url` text NOT NULL DEFAULT '0'
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
(108, 'respuesta 2', '48032675', '1A', '2022-08-23 21:20:29', 106, ''),
(111, 'hola', '48032675', '1A', '2022-10-17 01:44:52', 110, '0'),
(112, 'chau puttop', '48032675', '1A', '2022-10-17 01:45:02', 110, '0'),
(116, 'recibido\r\n', '48032675', '', '2022-10-27 22:39:57', 106, '0'),
(122, ' style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px; style=\"width:650px;', '48032675', '1A', '2022-10-30 03:01:52', 115, '0'),
(123, 'x\r\n\r\n\r\n', '48032675', '1A', '2022-11-26 00:28:53', 106, '0');

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
  `tipo` varchar(20) NOT NULL,
  `curso` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `faltas`
--

INSERT INTO `faltas` (`id`, `fullname`, `dni`, `dia`, `tipo`, `curso`) VALUES
(1, 'Augusto Antenucci', 48032675, '2022-08-17', 'Ausente', '4A'),
(2, 'Augusto Antenucci', 48032675, '2022-08-05', 'Falta Justificada', '4A'),
(9, 'Augusto Antenucci', 48032675, '2022-07-13', '1/2 Falta', ''),
(64, 'Samuel Nicolas', 49537116, '2022-12-14', 'Ausente', ''),
(65, 'Joaquín Santiago', 49811764, '2022-12-14', 'Ausente', ''),
(66, 'Kiara Valentina', 50266396, '2022-12-14', 'Ausente', ''),
(67, 'Nicolas Gabriel', 49761158, '2022-12-14', 'Ausente', ''),
(68, 'Camila Anahí', 49929341, '2022-12-14', 'Falta Justificada', '4A'),
(69, 'Lucas Gustavo', 5004275, '2022-12-14', 'Ausente', ''),
(70, 'Julian Mateo', 50154582, '2022-12-14', 'Ausente', ''),
(71, 'Ayrton', 49811794, '2022-12-14', 'Ausente', ''),
(72, 'Catalina', 49875104, '2022-12-14', 'Ausente', ''),
(73, 'John', 47502751, '2022-12-14', 'Ausente', ''),
(74, 'Lucas Juan', 0, '2022-12-14', 'Ausente', ''),
(75, 'Bautista', 50031550, '2022-12-14', 'Ausente', ''),
(76, 'Catalina', 49960413, '2022-12-14', 'Ausente', ''),
(77, 'Micaela', 0, '2022-12-14', 'Ausente', ''),
(78, 'Katia', 50043292, '2022-12-14', 'Ausente', ''),
(79, 'Agustin Sergio', 49932657, '2022-12-14', 'Ausente', ''),
(80, 'Josefina', 49811843, '2022-12-14', 'Ausente', ''),
(97, 'Paul Roveda', 63468645, '2022-12-15', 'Ausente', ''),
(98, 'Augusto Antenucci', 48032675, '2022-12-15', 'Ausente', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(10) NOT NULL,
  `dni` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `date_joined` date NOT NULL,
  `obs` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `dni`, `password`, `firstname`, `lastname`, `course`, `date_joined`, `obs`) VALUES
(1, '49537116', '111', 'Samuel Nicolas', 'Samuel Nicolas', '1a', '2022-10-14', ''),
(2, '49811764', '111', 'Joaquín Santiago', 'Joaquín Santiago', '1a', '2022-10-14', ''),
(3, '50266396', '111', 'Kiara Valentina', 'Kiara Valentina', '1a', '2022-10-14', ''),
(4, '49761158', '111', 'Nicolas Gabriel', 'Nicolas Gabriel', '1a', '2022-10-14', ''),
(5, '49929341', '111', 'Camila Anahí', 'Camila Anahí', '1a', '2022-10-14', ''),
(6, '5004275', '111', 'Lucas Gustavo', 'Lucas Gustavo', '1a', '2022-10-14', ''),
(7, '50154582', '111', 'Julian Mateo', 'Julian Mateo', '1a', '2022-10-14', ''),
(8, '49811794', '111', 'Ayrton', 'Ayrton', '1a', '2022-10-14', ''),
(9, '49875104', '111', 'Catalina', 'Catalina', '1a', '2022-10-14', ''),
(15, '47646439', 'testuserrr', 'Test', 'User', '5A', '2022-05-28', ''),
(16, '47502751', 'johndoe', 'John', 'Doe', '1A', '2022-05-09', ''),
(17, '63468645', 'harry', 'Paul', 'Roveda', '4A', '2022-07-24', ''),
(19, '48032675', '111', 'Augusto', 'Antenucci', '4A', '2022-07-09', ''),
(20, '33', '33', '33', '33', '1', '2022-10-01', '33'),
(21, '3', 'r', '3', '3', '1', '2022-10-02', '3'),
(33, '49 929 975', '111', 'Lucas Juan', 'Lucas Juan', '1a', '2022-10-14', ''),
(37, '50031550', '111', 'Bautista', 'Bautista', '1a', '2022-10-14', ''),
(44, '49960413', '111', 'Catalina', 'Catalina', '1a', '2022-10-14', ''),
(55, '49 961 435', '111', 'Micaela', 'Micaela', '1a', '2022-10-14', ''),
(66, '50043292', '111', 'Katia', 'Katia', '1a', '2022-10-14', ''),
(88, '49932657', '111', 'Agustin Sergio', 'Agustin Sergio', '1a', '2022-10-14', ''),
(99, '49811843', '111', 'Josefina', 'Josefina', '1a', '2022-10-14', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `dni`, `image_url`) VALUES
(13, 48032675, 'uploads/Certificado-Aptitud-Fisica.jpg'),
(14, 48032675, 'uploads/apto.png');

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
(5, 'Psicología'),
(6, 'Literatura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `dni` varchar(8) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `course` varchar(2) NOT NULL,
  `fecha` datetime NOT NULL,
  `reply` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `mensaje`, `dni`, `fullname`, `course`, `fecha`, `reply`) VALUES
(12, 'Pregunta gato', '48032675', 'Augusto Antenucci', '4A', '2022-11-26 01:09:49', 0),
(13, 'forro', '48032675', '', '4A', '2022-11-26 01:12:53', 12),
(14, 'hola', '48032675', '', '', '2022-11-27 15:04:42', 12);

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
  `end_datetime` datetime DEFAULT NULL,
  `course` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `title`, `description`, `start_datetime`, `end_datetime`, `course`) VALUES
(8, 'Test', 'Preuevaaa!', '2022-07-25 13:01:00', '2022-07-26 13:01:00', ''),
(10, 'Prueba', 'Pruebaa!', '2022-08-08 21:19:00', '2022-08-08 22:20:00', ''),
(18, '55', 'tr', '2022-10-14 10:38:00', '2022-10-15 10:38:00', '');

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
  `date_joined` date NOT NULL,
  `obs` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `dni`, `password`, `firstname`, `lastname`, `course`, `date_joined`, `obs`) VALUES
(1, '49537116', '111', 'Samuel Nicolas', 'Samuel Nicolas', '1a', '2022-10-14', ''),
(2, '49811764', '111', 'Joaquín Santiago', 'Joaquín Santiago', '1a', '2022-10-14', ''),
(3, '50266396', '111', 'Kiara Valentina', 'Kiara Valentina', '1a', '2022-10-14', ''),
(4, '49761158', '111', 'Nicolas Gabriel', 'Nicolas Gabriel', '1a', '2022-10-14', ''),
(5, '49929341', '111', 'Camila Anahí', 'Camila Anahí', '1a', '2022-10-14', ''),
(6, '5004275', '111', 'Lucas Gustavo', 'Lucas Gustavo', '1a', '2022-10-14', ''),
(7, '50154582', '111', 'Julian Mateo', 'Julian Mateo', '1a', '2022-10-14', ''),
(8, '49811794', '111', 'Ayrton', 'Ayrton', '1a', '2022-10-14', ''),
(9, '49875104', '111', 'Catalina', 'Catalina', '1a', '2022-10-14', ''),
(15, '47646439', 'testuserrr', 'Test', 'User', '5A', '2022-05-28', ''),
(16, '47502751', 'johndoe', 'John', 'Doe', '1A', '2022-05-09', ''),
(17, '63468645', 'harry', 'Paul', 'Roveda', '4A', '2022-07-24', ''),
(19, '48032675', '111', 'Augusto', 'Antenucci', '4A', '2022-07-09', ''),
(20, '33', '33', '33', '33', '1b', '2022-10-01', '33'),
(21, '3', 'r', '3', '3', '1', '2022-10-02', '3'),
(33, '49 929 975', '111', 'Lucas Juan', 'Lucas Juan', '1a', '2022-10-14', ''),
(37, '50031550', '111', 'Bautista', 'Bautista', '1a', '2022-10-14', ''),
(44, '49960413', '111', 'Catalina', 'Catalina', '1a', '2022-10-14', ''),
(55, '49 961 435', '111', 'Micaela', 'Micaela', '1a', '2022-10-14', ''),
(66, '50043292', '111', 'Katia', 'Katia', '1a', '2022-10-14', ''),
(88, '49932657', '111', 'Agustin Sergio', 'Agustin Sergio', '1a', '2022-10-14', ''),
(99, '49811843', '111', 'Josefina', 'Josefina', '1a', '2022-10-14', ''),
(103, '23453454', 'prueba', 'don', 'self', '2A', '1899-11-01', 'test'),
(104, '23453454', 'prueba', 'don', 'self', '2A', '2012-01-01', 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student_info`
--

CREATE TABLE `student_info` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `roll` int(6) NOT NULL,
  `class` varchar(3) NOT NULL,
  `city` varchar(15) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `roll`, `class`, `city`, `pcontact`, `photo`, `datetime`) VALUES
(41, 'Josh, Love', 444433, '1st', 'House#15, Ward#', '01944444444', '4444332020-06-06-06-58.jpg', '2020-06-06 16:17:58'),
(43, 'Martin, Konlin', 444439, '2nd', 'House#1eww', '01812888858', '4444392020-06-06-06-53.jpg', '2020-06-06 16:18:53'),
(44, 'kutub ussin', 443322, '4th', 'Dhaka, Banglade', '01797159600', '4433222020-06-06-06-28.jpg', '2020-06-06 16:19:28'),
(45, 'Edward, Chou', 443342, '2nd', 'Dhaka, Banglade', '01797159600', '4433422020-06-06-06-51.jpg', '2020-06-06 16:19:51'),
(47, 'Bob, Law', 443353, '2nd', 'Dhaka, Banglade', '01814270541', '4433532020-06-06-06-32.jpg', '2020-06-06 16:21:32'),
(48, 'Kin Jings', 123456, '2nd', 'Z.D.S.', '01797159605', '1234562020-07-01-07-18.jpg', '2020-07-01 05:54:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `teacherName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `course` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `date_joined` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `teachers`
--

INSERT INTO `teachers` (`id`, `teacherName`, `password`, `firstname`, `lastname`, `course`, `date_joined`) VALUES
(1, 'donself', '111', '3', '1', '4A', '2022-10-15'),
(2, 'donself2', '111', 'Augusto', 'Antenucci', '12', '2022-12-04');

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
  `id` int(5) NOT NULL,
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
-- Indices de la tabla `boletines`
--
ALTER TABLE `boletines`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bono`
--
ALTER TABLE `bono`
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
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
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
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
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
-- Indices de la tabla `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- Indices de la tabla `teachers`
--
ALTER TABLE `teachers`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `apercibimientos`
--
ALTER TABLE `apercibimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `autorized`
--
ALTER TABLE `autorized`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `boletines`
--
ALTER TABLE `boletines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `bono`
--
ALTER TABLE `bono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `faltas`
--
ALTER TABLE `faltas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `retiros`
--
ALTER TABLE `retiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
