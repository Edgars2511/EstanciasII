-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2024 a las 01:41:15
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
-- Base de datos: `estanciasii`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(11) NOT NULL,
  `actividad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `actividad`) VALUES
(1, 'Futbol Varonil'),
(2, 'Voleibol Varonil'),
(3, 'Basquetbol Varonil'),
(4, 'Futbol Femenil'),
(5, 'Voleibol Femenil'),
(6, 'Basquetbol Femenil'),
(7, 'Grupo de Artes'),
(8, 'Fotografia'),
(9, 'Canto'),
(10, 'Teatro'),
(11, 'Porristas'),
(12, 'Escolta'),
(13, 'Danza'),
(14, 'Ajedrez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) DEFAULT NULL,
  `especialidad` varchar(50) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `turno` varchar(15) NOT NULL,
  `numero_control` varchar(20) NOT NULL,
  `correo_institucional` varchar(50) NOT NULL,
  `id_rol` int(11) DEFAULT 3,
  `id_actividad` int(11) NOT NULL,
  `contraseña` varchar(50) DEFAULT NULL,
  `estatus` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `paterno`, `materno`, `especialidad`, `curp`, `turno`, `numero_control`, `correo_institucional`, `id_rol`, `id_actividad`, `contraseña`, `estatus`) VALUES
(1, 'Edgar', 'Hernandez', 'Rodriguez', 'Programacion', '1205164865451542', 'Matutino', '100000001', 'edgar@gmail.com', 3, 3, 'edgar25', 0),
(3, 'Juanito', 'Pistolas', NULL, 'Mas Programacion', 'GUGJ970826HDGTRS0', 'Matutino', '1503150258', 'josue_sgg@hotmail.com', 3, 3, 'juanis', 0),
(4, 'Juanito', 'Pistolas', '2', 'Mas Programacion', 'GUGJ970826HDGTRSas', 'Matutino', '2151151', 'sgffe@gmail.com', 3, 3, NULL, 1),
(7, 'Juanito', 'Pistolas3', NULL, 'Mas Programacion', 'ijijoim8h9', 'Vespertino', '132154564', 'hernandez@gmail.com', 3, 3, '132154564', 1),
(8, 'Juanito', 'PistolasVoli', NULL, 'Mas Programacion', 'ijijoim8h7', 'Vespertino', '132154564', 'hernandez@gmail.com', 3, 2, '132154564', 1),
(9, 'Miguel Angel', 'Martinez', 'Ibarra', 'Programacion', 'MAIM031126HDGRBGA5', 'Matutino', '1503150258', 'miguel.angelmi@2611gmail.com', 3, 3, '1503150258', 0),
(10, 'Juanito', 'Pistolas', 'Ibarra', 'Programacion', 'GUGJ970826HDGTRS03', 'Matutino', '1503150258', 'pq.gutierrez@gmail.com', 3, 3, '1503150258', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_informacion`
--

CREATE TABLE `alumno_informacion` (
  `id` int(11) NOT NULL,
  `imagen` varchar(50) DEFAULT 'Public/imagenes/sin-foto.png',
  `telefono` varchar(10) NOT NULL,
  `nombre_papa` varchar(60) NOT NULL,
  `telefono_papa` varchar(10) NOT NULL,
  `nombre_mama` varchar(60) NOT NULL,
  `telefono_mama` varchar(10) NOT NULL,
  `talla_camisa` varchar(50) NOT NULL,
  `talla_pantalon` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `alumno_informacion`
--

INSERT INTO `alumno_informacion` (`id`, `imagen`, `telefono`, `nombre_papa`, `telefono_papa`, `nombre_mama`, `telefono_mama`, `talla_camisa`, `talla_pantalon`, `id_alumno`) VALUES
(1, 'Public/imagenes/859575005756.png', '6183311222', 'Juanito perez sote', '2147483647', 'Rosalia Bjork de la Mora', '2147483647', 'XS', 28, 1),
(2, 'Public/imagenes/723849813081.jpg', '6182211570', 'Juan Pistola', '2147483647', 'Juana ', '2147483647', '', 32, 3),
(3, 'Public/imagenes/1183004.jpg', '6181571304', 'Miguel Angel Martinez Domine', '6181224084', 'Maria Irene Ibarra Valles', '6188381366', 'L', 34, 9),
(4, 'Public/imagenes/859575005756.png', '6182211570', 'Miguel Angel Martinez Domine', '6181234567', 'Juana ', '6181234568', 'XS', 28, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT 'vacio',
  `documento` varchar(50) DEFAULT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `nombre`, `documento`, `tipo`) VALUES
(1, 'U2 Axios y Fetch.pdf', 'public/pdf/U2 Axios y Fetch.pdf', 1),
(2, 'prueba3', 'documento2', 3),
(3, 'prueba5', 'dsds', 5),
(4, 'vacio', NULL, 6),
(5, 'U1. Diseño de Interfaz.pdf', 'public/pdf/U1. Diseño de Interfaz.pdf', 2),
(6, 'prueba4', 'prueba4.pdf', 4),
(7, 'vacio', NULL, 6),
(8, 'vacio', NULL, 1),
(9, 'vacio', NULL, 2),
(10, 'vacio', NULL, 3),
(11, 'vacio', NULL, 4),
(12, 'vacio', NULL, 5),
(150, 'vacio', NULL, 1),
(151, 'vacio', NULL, 2),
(152, 'vacio', NULL, 3),
(153, 'vacio', NULL, 4),
(154, 'vacio', NULL, 5),
(155, 'vacio', NULL, 6),
(156, 'vacio', NULL, 1),
(157, 'vacio', NULL, 2),
(158, 'vacio', NULL, 3),
(159, 'vacio', NULL, 4),
(160, 'vacio', NULL, 5),
(161, 'vacio', NULL, 6),
(162, 'U2 EC. Ensayo.pdf', 'public/pdf/U2 EC. Ensayo.pdf', 1),
(163, 'ejemplo1.pdf', 'public/pdf/ejemplo1.pdf', 2),
(164, 'Rubrica ensayo 40%.pdf', 'public/pdf/Rubrica ensayo 40%.pdf', 3),
(165, 'ejemplo1.pdf', 'public/pdf/ejemplo1.pdf', 4),
(166, 'U1. Diagramas UML.pdf', 'public/pdf/U1. Diagramas UML.pdf', 5),
(167, 'U1. Diseño de Interfaz.pdf', 'public/pdf/U1. Diseño de Interfaz.pdf', 6),
(168, 'ejemplo1.pdf', 'public/pdf/ejemplo1.pdf', 1),
(169, 'U1. Diagramas UML.pdf', 'public/pdf/U1. Diagramas UML.pdf', 2),
(170, 'vacio', NULL, 3),
(171, 'vacio', NULL, 4),
(172, 'vacio', NULL, 5),
(173, 'vacio', NULL, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos_alumnos`
--

CREATE TABLE `documentos_alumnos` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `documentos_alumnos`
--

INSERT INTO `documentos_alumnos` (`id`, `id_alumno`, `id_documento`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 4),
(4, 1, 3),
(5, 1, 5),
(6, 1, 6),
(74, 7, 150),
(75, 7, 151),
(76, 7, 152),
(77, 7, 153),
(78, 7, 154),
(79, 7, 155),
(80, 8, 156),
(81, 8, 157),
(82, 8, 158),
(83, 8, 159),
(84, 8, 160),
(85, 8, 161),
(86, 9, 162),
(87, 9, 163),
(88, 9, 164),
(89, 9, 165),
(90, 9, 166),
(91, 9, 167),
(93, 10, 169),
(94, 10, 170),
(95, 10, 171),
(96, 10, 172),
(97, 10, 173);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL,
  `materno` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `ultimo_acceso` varchar(50) DEFAULT current_timestamp(),
  `id_rol` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `imagen` varchar(50) DEFAULT 'Public/imagenes/sin-foto.png',
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `entrenadores`
--

INSERT INTO `entrenadores` (`id`, `nombre`, `paterno`, `materno`, `usuario`, `contraseña`, `ultimo_acceso`, `id_rol`, `descripcion`, `telefono`, `imagen`, `correo`) VALUES
(1, 'Pedro', 'Sifuentes', NULL, 'MiguelitoFri', '123456', '2023-11-28 11:33:42', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com'),
(2, 'Juan Carlos', 'Lopez', NULL, 'edgarin12', '123456', NULL, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com'),
(3, 'Martin', 'Galarza', NULL, 'MartinGalarza', '123456', NULL, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com'),
(4, 'Jose', 'Leal ', 'Alvarado', 'jose', '123456', 'current_timestamp()', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com'),
(7, 'Nallely', 'Troncoso', NULL, 'nallely', '123456', 'current_timestamp()', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com'),
(8, 'Patricia', 'Calderon', NULL, 'patricia', '123456', NULL, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com'),
(11, 'Gilberto', 'Covarrubias', NULL, 'gilberto', '123456', NULL, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com'),
(12, 'Pablo', 'Dominguez', NULL, 'pablo', '123456', NULL, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com'),
(16, 'Jesus', 'Morones', NULL, 'jesusm', '123456', NULL, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com'),
(17, 'Club', 'Fotografia', NULL, 'fotografia', '123456', NULL, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com'),
(18, 'Grupo de', 'Canto', NULL, 'canto', '123456', NULL, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com'),
(19, 'Fercho', 'Porristas', NULL, 'fercho', '123456', NULL, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com'),
(20, 'Pedro', 'Villa', NULL, 'pedriVilla', '123456', NULL, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com'),
(23, 'Eduardo', 'Danza', NULL, 'danza', '123456', NULL, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com'),
(24, 'Club de', 'Ajedrez', NULL, 'ajedrez', '123456', NULL, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverr', '6181234567', 'Public/imagenes/sin-foto.png', 'usuario@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores_actividad`
--

CREATE TABLE `entrenadores_actividad` (
  `id` int(11) NOT NULL,
  `id_entrenador` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `entrenadores_actividad`
--

INSERT INTO `entrenadores_actividad` (`id`, `id_entrenador`, `id_actividad`) VALUES
(1, 1, 3),
(2, 1, 6),
(4, 3, 2),
(5, 3, 5),
(6, 2, 1),
(7, 2, 4),
(8, 7, 7),
(18, 8, 7),
(19, 11, 7),
(20, 12, 7),
(21, 16, 7),
(22, 17, 8),
(23, 18, 9),
(24, 19, 11),
(25, 20, 12),
(26, 23, 13),
(27, 24, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `id_actividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `horario`, `id_actividad`) VALUES
(1, 'Public/imagenes/horario.png', 1),
(2, 'Public/imagenes/horario2.jpeg', 2),
(3, 'Public/imagenes/horario3.jpeg', 3),
(4, 'Public/imagenes/horario4.jpeg', 4),
(5, 'Public/imagenes/horario5.png', 5),
(6, 'Public/imagenes/horario6.png', 6),
(7, 'Public/imagenes/horario7.jpeg', 7),
(8, 'Public/imagenes/horario8.jpeg', 8),
(9, 'Public/imagenes/horario9.png', 9),
(10, 'Public/imagenes/horario10.png', 10),
(11, 'Public/imagenes/horario11.png', 11),
(12, 'Public/imagenes/horario12.jpeg', 12),
(13, 'Public/imagenes/horario13.jpeg', 13),
(14, 'Public/imagenes/horario1.jpeg', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `titular` varchar(150) NOT NULL,
  `fecha` varchar(11) NOT NULL,
  `cuerpo` text NOT NULL,
  `imagen1` varchar(100) NOT NULL,
  `imagen2` varchar(100) NOT NULL,
  `imagen3` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `titular`, `fecha`, `cuerpo`, `imagen1`, `imagen2`, `imagen3`, `id_usuario`, `id_actividad`) VALUES
(1, 'Lorem ipsum dolor sit amet', '05/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', '', '', 2, 1),
(3, 'Lorem ipsum dolor sit amet', '07/11/2023', 'fawfdawf', 'Public/imagenes/actividad11.jpeg', '', '', 2, 1),
(4, 'Lorem ipsum dolor sit amet', '07/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, ultricies tellus nunc et lorem.\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', '', '', 2, 2),
(5, 'Lorem ipsum dolor sit amet', '07/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, ultricies tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', 'Public/imagenes/actividad12.jpeg', 'Public/imagenes/actividad13.jpeg', 2, 1),
(6, 'Lorem ipsum dolor sit amet', '26/11/2023', 'adasdasdfasf', 'Public/imagenes/actividad11.jpeg', '', '', 1, 5),
(7, 'Lorem ipsum dolor sit amet', '07/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, ultricies tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', 'Public/imagenes/actividad12.jpeg', '', 2, 6),
(8, 'Lorem ipsum dolor sit amet', '07/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, ultricies tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', 'Public/imagenes/actividad12.jpeg', '', 2, 7),
(9, 'Lorem ipsum dolor sit amet', '07/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, ultricies tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', 'Public/imagenes/actividad12.jpeg', '', 2, 8),
(10, 'Lorem ipsum dolor sit amet', '07/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, ultricies tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', 'Public/imagenes/actividad12.jpeg', '', 2, 9),
(11, 'Lorem ipsum dolor sit amet', '07/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, ultricies tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', 'Public/imagenes/actividad12.jpeg', '', 2, 10),
(12, 'Lorem ipsum dolor sit amet', '07/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, ultricies tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', 'Public/imagenes/actividad12.jpeg', 'Public/imagenes/actividad13.jpeg', 2, 11),
(13, 'Lorem ipsum dolor sit amet', '07/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, ultricies tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', 'Public/imagenes/actividad12.jpeg', 'Public/imagenes/actividad13.jpeg', 2, 12),
(14, 'Lorem ipsum dolor sit amet', '07/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, ultricies tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', 'Public/imagenes/actividad12.jpeg', 'Public/imagenes/actividad13.jpeg', 2, 13),
(15, 'Lorem ipsum dolor sit amet', '07/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, ultricies tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', 'Public/imagenes/actividad12.jpeg', 'Public/imagenes/actividad13.jpeg', 2, 14),
(16, 'Lorem ipsum dolor sit amet', '07/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, ultricies tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', 'Public/imagenes/actividad12.jpeg', '', 2, 6),
(17, 'Lorem ipsum dolor sit amet', '07/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, ultricies tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', 'Public/imagenes/actividad12.jpeg', 'Public/imagenes/actividad13.jpeg', 2, 2),
(18, 'Lorem ipsum dolor sit amet', '07/11/2023', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, ultricies tellus nunc et lorem.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent a lorem in ante accumsan fringilla. Mauris feugiat dui purus, vel maximus sem viverra non. Nulla sit amet orci nec nunc laoreet ornare. Nulla ut euismod diam. Sed et est congue, dictum est ac, venenatis massa. Pellentesque pharetra, lectus sit amet fermentum euismod, nisi ligula posuere arcu, lacinia ultricies tellus nunc et lorem.', 'Public/imagenes/actividad11.jpeg', '', 'Public/imagenes/actividad13.jpeg', 2, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Usuario Entrenador'),
(2, 'Usuario admin'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `tipo`) VALUES
(1, 'Permiso'),
(2, 'CURP'),
(3, 'Acta de Nacimiento'),
(4, 'Constancia'),
(5, 'INE Mamá'),
(6, 'INE Papá');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `curp` (`curp`);

--
-- Indices de la tabla `alumno_informacion`
--
ALTER TABLE `alumno_informacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `documentos_alumnos`
--
ALTER TABLE `documentos_alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_documento` (`id_documento`);

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_act` (`id_rol`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `entrenadores_actividad`
--
ALTER TABLE `entrenadores_actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_entrenador` (`id_entrenador`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`,`id_actividad`),
  ADD KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `alumno_informacion`
--
ALTER TABLE `alumno_informacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT de la tabla `documentos_alumnos`
--
ALTER TABLE `documentos_alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `entrenadores_actividad`
--
ALTER TABLE `entrenadores_actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno_informacion`
--
ALTER TABLE `alumno_informacion`
  ADD CONSTRAINT `alumno_informacion_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_documento` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `documentos_alumnos`
--
ALTER TABLE `documentos_alumnos`
  ADD CONSTRAINT `documentos_alumnos_ibfk_1` FOREIGN KEY (`id_documento`) REFERENCES `documentos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documentos_alumnos_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
  ADD CONSTRAINT `entrenadores_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `entrenadores_actividad`
--
ALTER TABLE `entrenadores_actividad`
  ADD CONSTRAINT `entrenadores_actividad_ibfk_1` FOREIGN KEY (`id_entrenador`) REFERENCES `entrenadores` (`id`),
  ADD CONSTRAINT `entrenadores_actividad_ibfk_2` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `publicaciones_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `entrenadores` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
