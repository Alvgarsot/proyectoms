-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2016 a las 02:05:56
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `msalvaro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE IF NOT EXISTS `cancion` (
`id_cancion` int(11) NOT NULL,
  `nombre_cancion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `album` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `anio_salida` year(4) DEFAULT NULL,
  `autor` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `duracion` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`id_cancion`, `nombre_cancion`, `album`, `anio_salida`, `autor`, `genero`, `duracion`) VALUES
(1, '01 So What.mp3', 'Kind of Blue', 1959, 'Miles Davis', 'Jazz', '00:09:25'),
(2, '02 Freddie Freeloader.mp3', 'Kind of Blue', 1959, 'Miles Davis', 'Jazz', '00:09:48'),
(3, '03 Blue in Green.mp3', 'Kind of Blue', 1959, 'Miles Davis', 'Jazz', '00:05:39'),
(4, '04 All Blues.mp3', 'Kind of Blue', 1959, 'Miles Davis', 'Jazz', '00:11:35'),
(5, '05 Flamenco Sketches.mp3', 'Kind of Blue', 1959, 'Miles Davis', 'Jazz', '00:09:27'),
(6, 'Perfect Makeout Music.mp3', 'Wake', 2005, 'Trio Toykeat', 'Jazz', '00:06:38'),
(7, 'Voyage.mp3', 'Wake', 2005, 'Trio Toykeat', 'Jazz', '00:04:56'),
(8, 'End of the First Set.mp3', 'Wake', 2005, 'Trio Toykeat', 'Jazz', '00:03:48'),
(9, 'Final Fantasy.mp3', 'Wake', 2005, 'Trio Toykeat', 'Jazz', '00:05:44'),
(10, 'In a Sentimental Mood.mp3', 'Wake', 2005, 'Trio Toykeat', 'Jazz', '00:04:55'),
(11, 'Almost.mp3', 'Wake', 2005, 'Trio Toykeat', 'Jazz', '00:05:54'),
(12, 'Beba.mp3', 'Wake', 2005, 'Trio Toykeat', 'Jazz', '00:05:50'),
(13, 'You and Me.mp3', 'Wake', 2005, 'Trio Toykeat', 'Jazz', '00:07:52'),
(14, 'Third Ball.mp3', 'Wake', 2005, 'Trio Toykeat', 'Jazz', '00:06:09'),
(15, 'Sir Vival.mp3', 'Wake', 2005, 'Trio Toykeat', 'Jazz', '00:05:25'),
(16, 'Insane in Seine.mp3', 'Wake', 2005, 'Trio Toykeat', 'Jazz', '00:07:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
`id_comentario` int(11) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `contenido` varchar(300) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_cancionfk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma`
--

CREATE TABLE IF NOT EXISTS `forma` (
  `id_listafk` int(11) NOT NULL,
  `id_cancionfk2` int(11) NOT NULL,
  `num_cancion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `forma`
--

INSERT INTO `forma` (`id_listafk`, `id_cancionfk2`, `num_cancion`) VALUES
(3, 2, 2),
(3, 3, 3),
(3, 4, 4),
(3, 5, 5),
(3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE IF NOT EXISTS `lista` (
`id_lista` int(11) NOT NULL,
  `nombre_usuariofk` varchar(20) NOT NULL,
  `nombre_lista` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_crea` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lista`
--

INSERT INTO `lista` (`id_lista`, `nombre_usuariofk`, `nombre_lista`, `fecha_crea`) VALUES
(1, 'dani', 'Vasilems', '2016-01-15'),
(2, 'Alvaro', 'Rap OG', '2016-02-07'),
(3, 'Alvaro', 'Jazz', '2016-02-07'),
(4, 'Alvaro', 'Musica clasica', '2016-01-15'),
(5, 'antonio', 'La Luz', '2016-02-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre_usuario` varchar(20) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `nivel_adm` tinyint(1) NOT NULL,
  `fecha_registro` date NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre_usuario`, `pass`, `nivel_adm`, `fecha_registro`, `correo`) VALUES
('Alvaro', '98db6b79acb71383b5a83e0bbc1cadd4', 0, '2016-01-15', 'alvgarsot92@gmail.com'),
('antonio', '039b1c691a81135e6dd931584aeb3e85', 0, '2016-02-10', 'anto_gs88@hotmail.com'),
('dani', '55b7e8b895d047537e672250dd781555', 1, '2016-01-15', 'daniel_martin91@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
 ADD PRIMARY KEY (`id_cancion`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
 ADD PRIMARY KEY (`id_comentario`), ADD KEY `id_cancionfk` (`id_cancionfk`);

--
-- Indices de la tabla `forma`
--
ALTER TABLE `forma`
 ADD KEY `id_cancionfk2` (`id_cancionfk2`), ADD KEY `id_listafk` (`id_listafk`);

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
 ADD PRIMARY KEY (`id_lista`), ADD KEY `nombre_usuariofk` (`nombre_usuariofk`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`nombre_usuario`), ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
MODIFY `id_cancion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `lista`
--
ALTER TABLE `lista`
MODIFY `id_lista` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_cancionfk`) REFERENCES `cancion` (`id_cancion`);

--
-- Filtros para la tabla `forma`
--
ALTER TABLE `forma`
ADD CONSTRAINT `forma_ibfk_1` FOREIGN KEY (`id_cancionfk2`) REFERENCES `cancion` (`id_cancion`),
ADD CONSTRAINT `forma_ibfk_2` FOREIGN KEY (`id_listafk`) REFERENCES `lista` (`id_lista`);

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
ADD CONSTRAINT `lista_ibfk_1` FOREIGN KEY (`nombre_usuariofk`) REFERENCES `usuario` (`nombre_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
