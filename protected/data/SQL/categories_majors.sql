-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2014 a las 23:54:39
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `via-college`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories_majors`
--

CREATE TABLE IF NOT EXISTS `categories_majors` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categories_majors`
--

INSERT INTO `categories_majors` (`id`, `name`) VALUES
(1, 'ENGINEERING TECHNOLOGY'),
(2, 'COMPUTER AND INFORMATION SCIENCES'),
(3, 'SOCIAL SCIENCES'),
(4, 'FAMILY AND CONSUMER SCIENCES'),
(5, 'MULTIDISCIPLINARIOS'),
(6, 'OTROS'),
(7, 'VISUAL AND PERFORMING ARTS'),
(8, 'PUBLIC ADMINISTRATION'),
(9, 'HUMANITIES'),
(10, 'ENGLISH LANGUAGE & LITERATURE'),
(11, 'COMMUNICATIONS'),
(12, 'ARCHITECTURE AND DESIGN'),
(13, 'BUSINESS'),
(14, 'BIOLOGICAL SCIENCES'),
(15, 'AGRICULTURE'),
(16, 'EDUCATION'),
(17, 'HEALTH'),
(18, 'ENGINEERING'),
(19, 'SCIENCE, MATH, AND TECHNOLOGY');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
