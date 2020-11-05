-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2020 a las 19:53:39
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursoguitarra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progreso`
--

CREATE TABLE `progreso` (
  `ID_usuario` int(11) NOT NULL,
  `ID_tema` int(11) NOT NULL,
  `completado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de progreso';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `ID_tema` int(11) NOT NULL COMMENT 'Id de tema',
  `visitas` int(11) NOT NULL COMMENT 'Numero de visitas de ese tema'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla de temas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(11) NOT NULL COMMENT 'Llave primaria',
  `nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nombre de usuario',
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email de usuario',
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Contraseña de usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla Usuario';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `nombre`, `email`, `password`) VALUES
(1, 'Edgar Daniel Reyes Valdivia', 'edgardaniel_reyes@hotmail.com', 'contraseña'),
(19, 'luis', 'Luis@hotmail.com', '1234'),
(20, 'oscar', 'oscar@o.com', 'oscar1'),
(21, 'fulano', 'test@hotmail.com', 'contra'),
(22, 'manganito', 'mangano@gmail.com', '$2y$10$OuTGQnhysH/OioSoXZArBuBhCGTAgAvTagsyqv0kVbmdOTZTGI6si'),
(23, 'Daniel', 'test@gmail.com', '$2y$10$puC8/B9ujyfWvUJ2akx9i.hS/H99ogexZZYAx28KAZImwGHsqrd3y'),
(24, 'Mario', 'mario@hotmail.com', '$2y$10$m3GvyMYT2se.2AP132u3V.sfdD9et1L4JugO/udHhA1SjihQ1eftC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `progreso`
--
ALTER TABLE `progreso`
  ADD KEY `ID_usuario` (`ID_usuario`),
  ADD KEY `ID_tema` (`ID_tema`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`ID_tema`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `ID_tema` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de tema';

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Llave primaria', AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `progreso`
--
ALTER TABLE `progreso`
  ADD CONSTRAINT `progreso_ibfk_1` FOREIGN KEY (`ID_tema`) REFERENCES `temas` (`ID_tema`) ON UPDATE CASCADE,
  ADD CONSTRAINT `progreso_ibfk_2` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
