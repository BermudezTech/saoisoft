-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2019 a las 19:12:26
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `saoisoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` longtext,
  `tipo` int(11) DEFAULT NULL,
  `adjunto` varchar(255) DEFAULT NULL,
  `cursos` int(11) DEFAULT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `respuesta` varchar(1000) DEFAULT NULL,
  `question` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `estudiante` int(11) DEFAULT NULL,
  `curso` int(11) DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  `actividad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `materia` int(11) DEFAULT NULL,
  `salon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `materia`, `salon`) VALUES
(1, 'Ingles Once A', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_institucion`
--

CREATE TABLE `datos_institucion` (
  `id` int(11) NOT NULL,
  `escudo` longblob,
  `nombre` varchar(255) DEFAULT NULL,
  `color1` varchar(255) DEFAULT NULL,
  `color2` varchar(255) DEFAULT NULL,
  `color3` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `main` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_institucion`
--

INSERT INTO `datos_institucion` (`id`, `escudo`, `nombre`, `color1`, `color2`, `color3`, `email`, `telefono`, `main`) VALUES

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `curso` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `intentos` int(11) NOT NULL,
  `horas` int(11) NOT NULL,
  `minutos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `exam`
--

INSERT INTO `exam` (`id`, `nombre`, `curso`, `fecha`, `intentos`, `horas`, `minutos`) VALUES
(1, 'Quiz 1', 1, '2018-08-15', 1, 1, 0),
(2, 'Quiz 2', 1, '2019-09-25', 2, 0, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id`, `nombre`) VALUES
(1, 'Primero'),
(2, 'Segundo'),
(3, 'Tercero'),
(4, 'Cuarto'),
(5, 'Quinto'),
(6, 'Sexto'),
(7, 'Septimo'),
(8, 'Octavo'),
(9, 'Noveno'),
(10, 'Decimo'),
(11, 'Once'),
(12, 'Pre-jardin'),
(13, 'Jardin'),
(14, 'Transicion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `salon` int(11) DEFAULT NULL,
  `hora` varchar(255) DEFAULT NULL,
  `h` int(11) DEFAULT NULL,
  `lunes` int(11) DEFAULT NULL,
  `martes` int(11) DEFAULT NULL,
  `miercoles` int(11) DEFAULT NULL,
  `jueves` int(11) DEFAULT NULL,
  `viernes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`) VALUES
(1, 'Ingles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE `multimedia` (
  `id` int(11) NOT NULL,
  `curso` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `usuario` int(11) DEFAULT NULL,
  `publicacion` longtext,
  `materia` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(1000) DEFAULT NULL,
  `examen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relestudiantepadre`
--

CREATE TABLE `relestudiantepadre` (
  `id` int(11) NOT NULL,
  `estudiante` int(11) DEFAULT NULL,
  `padre` int(11) DEFAULT NULL,
  `madre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relestudiantesalon`
--

CREATE TABLE `relestudiantesalon` (
  `id` int(11) NOT NULL,
  `estudiante` int(11) DEFAULT NULL,
  `salon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relprofesorcursos`
--

CREATE TABLE `relprofesorcursos` (
  `id` int(11) NOT NULL,
  `profesor` int(11) DEFAULT NULL,
  `cursos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `relprofesorcursos`
--

INSERT INTO `relprofesorcursos` (`id`, `profesor`, `cursos`) VALUES
(1, 889889889, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resp_actividad`
--

CREATE TABLE `resp_actividad` (
  `id` int(11) NOT NULL,
  `actividades` int(11) DEFAULT NULL,
  `estudiante` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `texto` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE `salon` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `grado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`id`, `nombre`, `grado`) VALUES
(1, 'Once A', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nombre`) VALUES
(0, 'Administrador'),
(1, 'Estudiante'),
(2, 'Profesor'),
(3, 'Padre de familia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tipo_usuario` int(11) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `lugar_nacimiento` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tipo_documento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombres`, `apellidos`, `email`, `tipo_usuario`, `pass`, `lugar_nacimiento`, `fecha_nacimiento`, `direccion`, `telefono`, `foto`, `tipo_documento`) VALUES
(123456789, 'El', 'Administrador', 'saoisoft@gmail.com', 0, '$2y$10$bRwnFeYFjeazJj0jx1JAF.PUULKfZ1IanHdkVltkBlT6PXNOBL.QW', NULL, '2014-04-14', 'Calle 24', '3127654321', 'usuarios/fotos/123456789.jpg', 'TI'),
(889889889, 'Daniel', 'Ochoa', 'dochoa8b9@gmail.com', 2, '$2y$10$n94DwV74xicJTKbB60in5udLSMHYYclTMeZC7AwnzP6spR8BiK6n2', 'Bogotá D.C.', '2018-08-15', 'Calle 24 Sur # 24A – 16', '1234565667', 'usuarios/fotos/889889889.jpg', 'CC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursos` (`cursos`);

--
-- Indices de la tabla `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question` (`question`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiante` (`estudiante`),
  ADD KEY `curso` (`curso`),
  ADD KEY `actividad` (`actividad`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materia` (`materia`),
  ADD KEY `salon` (`salon`);

--
-- Indices de la tabla `datos_institucion`
--
ALTER TABLE `datos_institucion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso` (`curso`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salon` (`salon`),
  ADD KEY `lunes` (`lunes`),
  ADD KEY `martes` (`martes`),
  ADD KEY `miercoles` (`miercoles`),
  ADD KEY `jueves` (`jueves`),
  ADD KEY `viernes` (`viernes`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso` (`curso`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `materia` (`materia`);

--
-- Indices de la tabla `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examen` (`examen`);

--
-- Indices de la tabla `relestudiantepadre`
--
ALTER TABLE `relestudiantepadre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiante` (`estudiante`),
  ADD KEY `padre` (`padre`),
  ADD KEY `madre` (`madre`);

--
-- Indices de la tabla `relestudiantesalon`
--
ALTER TABLE `relestudiantesalon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estudiante` (`estudiante`),
  ADD KEY `salon` (`salon`);

--
-- Indices de la tabla `relprofesorcursos`
--
ALTER TABLE `relprofesorcursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profesor` (`profesor`),
  ADD KEY `cursos` (`cursos`);

--
-- Indices de la tabla `resp_actividad`
--
ALTER TABLE `resp_actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividades` (`actividades`),
  ADD KEY `estudiante` (`estudiante`);

--
-- Indices de la tabla `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grado` (`grado`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_usuario` (`tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datos_institucion`
--
ALTER TABLE `datos_institucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `multimedia`
--
ALTER TABLE `multimedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `relestudiantepadre`
--
ALTER TABLE `relestudiantepadre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `relestudiantesalon`
--
ALTER TABLE `relestudiantesalon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `relprofesorcursos`
--
ALTER TABLE `relprofesorcursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `resp_actividad`
--
ALTER TABLE `resp_actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salon`
--
ALTER TABLE `salon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`cursos`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question`) REFERENCES `question` (`id`);

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`estudiante`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`curso`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `calificaciones_ibfk_3` FOREIGN KEY (`actividad`) REFERENCES `actividades` (`id`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`materia`) REFERENCES `materias` (`id`),
  ADD CONSTRAINT `cursos_ibfk_2` FOREIGN KEY (`salon`) REFERENCES `salon` (`id`);

--
-- Filtros para la tabla `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`salon`) REFERENCES `salon` (`id`),
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`lunes`) REFERENCES `materias` (`id`),
  ADD CONSTRAINT `horario_ibfk_3` FOREIGN KEY (`martes`) REFERENCES `materias` (`id`),
  ADD CONSTRAINT `horario_ibfk_4` FOREIGN KEY (`miercoles`) REFERENCES `materias` (`id`),
  ADD CONSTRAINT `horario_ibfk_5` FOREIGN KEY (`jueves`) REFERENCES `materias` (`id`),
  ADD CONSTRAINT `horario_ibfk_6` FOREIGN KEY (`viernes`) REFERENCES `materias` (`id`);

--
-- Filtros para la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD CONSTRAINT `multimedia_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `publicaciones_ibfk_2` FOREIGN KEY (`materia`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`examen`) REFERENCES `exam` (`id`);

--
-- Filtros para la tabla `relestudiantepadre`
--
ALTER TABLE `relestudiantepadre`
  ADD CONSTRAINT `relestudiantepadre_ibfk_1` FOREIGN KEY (`estudiante`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `relestudiantepadre_ibfk_2` FOREIGN KEY (`padre`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `relestudiantepadre_ibfk_3` FOREIGN KEY (`madre`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `relestudiantesalon`
--
ALTER TABLE `relestudiantesalon`
  ADD CONSTRAINT `relestudiantesalon_ibfk_1` FOREIGN KEY (`estudiante`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `relestudiantesalon_ibfk_2` FOREIGN KEY (`salon`) REFERENCES `salon` (`id`);

--
-- Filtros para la tabla `relprofesorcursos`
--
ALTER TABLE `relprofesorcursos`
  ADD CONSTRAINT `relprofesorcursos_ibfk_1` FOREIGN KEY (`profesor`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `relprofesorcursos_ibfk_2` FOREIGN KEY (`cursos`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `resp_actividad`
--
ALTER TABLE `resp_actividad`
  ADD CONSTRAINT `resp_actividad_ibfk_1` FOREIGN KEY (`actividades`) REFERENCES `actividades` (`id`),
  ADD CONSTRAINT `resp_actividad_ibfk_2` FOREIGN KEY (`estudiante`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `salon`
--
ALTER TABLE `salon`
  ADD CONSTRAINT `salon_ibfk_1` FOREIGN KEY (`grado`) REFERENCES `grado` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;