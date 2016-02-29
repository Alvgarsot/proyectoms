-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2016 a las 23:17:17
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

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
(16, 'Insane in Seine.mp3', 'Wake', 2005, 'Trio Toykeat', 'Jazz', '00:07:12'),
(17, 'Beatophone.mp3', 'Panic', 2012, 'Caravan Palace', 'Electro Swing', '00:03:51'),
(18, 'Clash.mp3', 'Panic', 2012, 'Caravan Palace', 'Electro Swing', '00:04:12'),
(19, 'Cotton Heads.mp3', 'Panic', 2012, 'Caravan Palace', 'Electro Swing', '00:03:38'),
(20, 'Dramaphone.mp3', 'Panic', 2012, 'Caravan Palace', 'Electro Swing', '00:03:23'),
(21, 'Maniac.mp3', 'Panic', 2012, 'Caravan Palace', 'Electro Swing', '00:04:10'),
(22, 'Newbop.mp3', 'Panic', 2012, 'Caravan Palace', 'Electro Swing', '00:02:49'),
(23, 'Panic.mp3', 'Panic', 2012, 'Caravan Palace', 'Electro Swing', '00:04:04'),
(24, 'Rock it for me.mp3', 'Panic', 2012, 'Caravan Palace', 'Electro Swing', '00:03:10'),
(25, 'The dirty side of the street.mp3', 'Panic', 2012, 'Caravan Palace', 'Electro Swing', '00:03:37'),
(26, 'Keep Ya Head Up.mp3', '2Pac Greatest Hits', 1998, '2Pac', 'Rap', '00:04:24'),
(27, 'Me Against The World.mp3', '2Pac Greatest Hits', 1998, '2Pac', 'Rap', '00:04:39'),
(28, 'How Do U Want It.mp3', '2Pac Greatest Hits', 1998, '2Pac', 'Rap', '00:04:48'),
(29, 'I Ain''t Mad At Cha.mp3', '2Pac Greatest Hits', 1998, '2Pac', 'Rap', '00:04:54'),
(30, 'I Get Around.mp3', '2Pac Greatest Hits', 1998, '2Pac', 'Rap', '00:04:19'),
(31, 'All About U.mp3', '2Pac Greatest Hits', 1998, '2Pac', 'Rap', '00:04:33'),
(32, 'Could You Be Loved.mp3', 'Bob Marley Greatest Hits', 2008, 'Bob Marley', 'Reggae', '00:04:00'),
(33, 'Is This Love.mp3', 'Bob Marley Greatest Hits', 2008, 'Bob Marley', 'Reggae', '00:03:53'),
(34, 'Jamming.mp3', 'Bob Marley Greatest Hits', 2008, 'Bob Marley', 'Reggae', '00:03:53'),
(35, 'One Love.mp3', 'Bob Marley Greatest Hits', 2008, 'Bob Marley', 'Reggae', '00:02:55'),
(36, 'Three Little Birds.mp3', 'Bob Marley Greatest Hits', 2008, 'Bob Marley', 'Reggae', '00:03:03'),
(37, 'Bad Boys.mp3', 'Bob Marley Greatest Hits', 2008, 'Bob Marley', 'Reggae', '00:03:36'),
(38, 'MIX eric the tutor 2PAC.mp3', 'Math class V17', 2010, '2Pac- Eric the tutor', 'Rap-Mix', '01:01:15'),
(39, 'MIX eric the tutor BIGGIE.mp3', 'Math class V15', 2009, 'Biggie Smalls - Eric the tutor', 'Rap-Mix', '01:11:55'),
(40, 'Tesla.mp3', 'You''re Dead!', 2014, 'Flying Lotus', 'Electronic', '00:01:54'),
(41, 'Never Catch Me (feat. Kendrick).mp3', 'You''re Dead!', 2014, 'Flying Lotus', 'Electronic', '00:03:54'),
(42, 'Turkey Dog Coma.mp3', 'You''re Dead!', 2014, 'Flying Lotus', 'Electronic', '00:03:09'),
(43, 'Stella.mp3', 'Program Music I', 2007, 'Kashiwa Daisuke', 'Electronic', '00:35:58'),
(44, 'Write Once, Run Melos.mp3', 'Program Music I', 2007, 'Kashiwa Daisuke', 'Electronic', '00:25:56'),
(45, 'Bitch, Dant Kill My Vibe.mp3', 'Good Kid, M.A.A.D City', 2012, 'Kendrick Lamar', 'Hip-Hop/Rap', '00:05:10'),
(46, 'The Art Of Peer Pressure.mp3', 'Good Kid, M.A.A.D City', 2012, 'Kendrick Lamar', 'Hip-Hop/Rap', '00:05:24'),
(47, 'Money Trees (Feat. Jay Rock).mp3', 'Good Kid, M.A.A.D City', 2012, 'Kendrick Lamar', 'Hip-Hop/Rap', '00:06:26'),
(48, 'Sing About Me, Im Dying Of Thirst.mp3', 'Good Kid, M.A.A.D City', 2012, 'Kendrick Lamar', 'Hip-Hop/Rap', '00:12:03'),
(49, 'The Recipe (Feat. Dr Dre).mp3', 'Good Kid, M.A.A.D City', 2012, 'Kendrick Lamar', 'Hip-Hop/Rap', '00:05:53'),
(50, 'Black Boy Fly.mp3', 'Good Kid, M.A.A.D City', 2012, 'Kendrick Lamar', 'Hip-Hop/Rap', '00:04:39');

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
(3, 1, 1),
(4, 19, 1),
(4, 20, 2),
(4, 21, 3),
(4, 22, 4),
(4, 23, 5),
(4, 24, 6),
(4, 25, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE IF NOT EXISTS `lista` (
`id_lista` int(11) NOT NULL,
  `nombre_usuariofk` varchar(20) NOT NULL,
  `nombre_lista` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_crea` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lista`
--

INSERT INTO `lista` (`id_lista`, `nombre_usuariofk`, `nombre_lista`, `fecha_crea`) VALUES
(3, 'Alvaro', 'Jazz', '2016-02-07'),
(4, 'Alvaro', 'Caravan Palace', '2016-02-28');

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
('daniel', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 1, '2016-02-28', 'dani_martin91@hotmail.com'),
('pekechis', 'b07776334776699c58bf11906daaf469', 1, '2016-02-28', 'pekechis@gmail.com'),
('perico', 'dfe483413e24a5b1506389d36ebfd05c', 1, '2016-02-28', 'perico@hotmail.com');

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
MODIFY `id_cancion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `lista`
--
ALTER TABLE `lista`
MODIFY `id_lista` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
