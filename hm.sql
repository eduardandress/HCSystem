-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-04-2015 a las 02:21:30
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE IF NOT EXISTS `bitacora` (
`idBitacora` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idTipoAccion` int(11) NOT NULL,
  `tabla` int(11) NOT NULL,
  `idTupla` int(11) NOT NULL,
  `descripcion` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE IF NOT EXISTS `cita` (
`idCita` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fechaProgramada` date NOT NULL,
  `horaProgramada` varchar(20) NOT NULL,
  `motivo` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idCita`, `idUsuario`, `idPaciente`, `fechaCreacion`, `fechaProgramada`, `horaProgramada`, `motivo`) VALUES
(1, 7, 22, '2015-04-06 00:20:07', '2015-03-22', '08:15 AM', 'nose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE IF NOT EXISTS `diagnostico` (
`idDiagnostico` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text NOT NULL,
  `idNotaCita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticoMedico`
--

CREATE TABLE IF NOT EXISTS `diagnosticoMedico` (
`idDiagnosticoMed` int(11) NOT NULL,
  `idDiagnostico` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hci`
--

CREATE TABLE IF NOT EXISTS `hci` (
`idHci` int(11) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idPaciente` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hci`
--

INSERT INTO `hci` (`idHci`, `fechaCreacion`, `idPaciente`) VALUES
(11, '2015-04-05 17:36:20', 21),
(12, '2015-04-05 20:07:37', 21),
(13, '2015-04-05 20:38:28', 21),
(14, '2015-04-05 20:49:00', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notaCita`
--

CREATE TABLE IF NOT EXISTS `notaCita` (
`idNotaCita` int(11) NOT NULL,
  `presionArterial` float NOT NULL,
  `alturaPaciente` float NOT NULL,
  `pesoPaciente` float NOT NULL,
  `frecuenciaCardiaca` float NOT NULL,
  `temperatura` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notasCitaGenerada`
--

CREATE TABLE IF NOT EXISTS `notasCitaGenerada` (
`idNotaCitaGen` int(11) NOT NULL,
  `idNotaCita` int(11) NOT NULL,
  `idCita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notasCitaHci`
--

CREATE TABLE IF NOT EXISTS `notasCitaHci` (
`idNotasCHci` int(11) NOT NULL,
  `idNotaCita` int(11) NOT NULL,
  `idHci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
`idPaciente` int(11) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` text NOT NULL,
  `fechaNac` varchar(50) NOT NULL,
  `numSS` varchar(50) NOT NULL,
  `medicoPref` varchar(150) NOT NULL,
  `telfmedico` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `cedula`, `nombre`, `apellido`, `direccion`, `fechaNac`, `numSS`, `medicoPref`, `telfmedico`) VALUES
(21, '24571582', 'Javier Alejandro', 'Carvallo', 'asd', 'asdf', 'asfd', 'af', 'asdf33'),
(22, 'asdffff', 'df', 'af', 'sdf', 'sdf', 'sdf', 'sd', 'sdf'),
(23, 'jhu', 'yyh', 'g', 'fghgh', 'thjjh', 'fgghg', 'fgh', 'fggh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacNumContacto`
--

CREATE TABLE IF NOT EXISTS `pacNumContacto` (
`idPacNumContacto` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `nombreContacto` varchar(100) NOT NULL,
  `apellidoContacto` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `relacion` varchar(50) NOT NULL,
  `fechaAgregado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacNumContacto`
--

INSERT INTO `pacNumContacto` (`idPacNumContacto`, `idPaciente`, `nombreContacto`, `apellidoContacto`, `numero`, `relacion`, `fechaAgregado`) VALUES
(14, 21, 'asd', 'asd', 'asd', 'asd', '2015-03-30 15:03:52'),
(15, 22, 'sdf', 'sdf', 'af', 's', '2015-04-04 23:50:04'),
(16, 23, 'jkhg', 'gf', 'yg', 'ug', '2015-04-05 00:07:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacTelf`
--

CREATE TABLE IF NOT EXISTS `pacTelf` (
`idPacTelf` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idTipoTel` int(11) NOT NULL,
  `numero` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacTelf`
--

INSERT INTO `pacTelf` (`idPacTelf`, `idPaciente`, `idTipoTel`, `numero`) VALUES
(8, 22, 1, 'sdf'),
(9, 22, 1, 'sdfsdf'),
(10, 23, 1, 'hjg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phciAlergia`
--

CREATE TABLE IF NOT EXISTS `phciAlergia` (
`idPhciAlergia` int(11) NOT NULL,
  `idHci` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fechaActualizacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phciCondicion`
--

CREATE TABLE IF NOT EXISTS `phciCondicion` (
`idPhciCondicion` int(11) NOT NULL,
  `idHci` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fechaActualizacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phciConsumo`
--

CREATE TABLE IF NOT EXISTS `phciConsumo` (
`idPhciConsumo` int(11) NOT NULL,
  `idHci` int(11) NOT NULL,
  `idTipoConsumo` int(11) NOT NULL,
  `fechaActualizacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `idTipoEstado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phciMedicamento`
--

CREATE TABLE IF NOT EXISTS `phciMedicamento` (
`idPhciMedicamento` int(11) NOT NULL,
  `idHci` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fechaActualizacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prescripcion`
--

CREATE TABLE IF NOT EXISTS `prescripcion` (
`idPrescripcion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `instrucciones` text NOT NULL,
  `idNotaCita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prescripcionMedico`
--

CREATE TABLE IF NOT EXISTS `prescripcionMedico` (
`idPresMedico` int(11) NOT NULL,
  `idPrescripcion` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio`
--

CREATE TABLE IF NOT EXISTS `privilegio` (
`idPrivilegio` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencia`
--

CREATE TABLE IF NOT EXISTS `referencia` (
`idReferencia` int(11) NOT NULL,
  `nombreDoctor` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `idNotaCita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referenciaMedico`
--

CREATE TABLE IF NOT EXISTS `referenciaMedico` (
`idRefMedico` int(11) NOT NULL,
  `idMedico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
`idRol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`) VALUES
(1, 'Admin-Medico'),
(2, 'Medico'),
(3, 'Enfermera'),
(4, 'Personal Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolPrivilegio`
--

CREATE TABLE IF NOT EXISTS `rolPrivilegio` (
`idRolPrivilegio` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `idPrivilegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoAccion`
--

CREATE TABLE IF NOT EXISTS `tipoAccion` (
`idTipoAccion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoConsumo`
--

CREATE TABLE IF NOT EXISTS `tipoConsumo` (
`idTipoConsumo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoConsumo`
--

INSERT INTO `tipoConsumo` (`idTipoConsumo`, `nombre`) VALUES
(1, 'Alcohol'),
(2, 'Tabaco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoEstado`
--

CREATE TABLE IF NOT EXISTS `tipoEstado` (
`idTipoEstado` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoEstado`
--

INSERT INTO `tipoEstado` (`idTipoEstado`, `nombre`) VALUES
(3, 'Activo'),
(4, 'No activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoTel`
--

CREATE TABLE IF NOT EXISTS `tipoTel` (
`idTipoTel` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoTel`
--

INSERT INTO `tipoTel` (`idTipoTel`, `nombre`) VALUES
(1, 'Personal'),
(2, 'Trabajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idUsuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fechaNac` date NOT NULL,
  `numSS` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `fechaInicio` date NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `clave`, `nombre`, `fechaNac`, `numSS`, `direccion`, `telefono`, `fechaInicio`, `idRol`) VALUES
(4, 'JavierAlej', '24571582', 'Javier', '2010-01-01', '518418', 'asfdhsh', '414-4980383', '2010-01-01', 1),
(5, 'f', 'asf', 'afs', '2010-04-01', 'asd', 'asf', 'asf', '2010-01-01', 2),
(6, 'asd', 'sdg', 'sdg', '2010-09-01', 'wg', 'sdg', 'sdag', '2010-09-01', 1),
(7, 'ecarvallo', 'eduardandress', 'Eduardo Carvallo', '1994-01-15', '24571581rtg', 'Urb Malave Villalba', '04144963763', '2015-04-01', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
`idVisita` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitaPaciente`
--

CREATE TABLE IF NOT EXISTS `visitaPaciente` (
`idVisitaPaciente` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL,
  `idCita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
 ADD PRIMARY KEY (`idBitacora`), ADD KEY `idUsuario` (`idUsuario`), ADD KEY `idTipoAccion` (`idTipoAccion`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
 ADD PRIMARY KEY (`idCita`), ADD KEY `idUsuario` (`idUsuario`), ADD KEY `idPaciente` (`idPaciente`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
 ADD PRIMARY KEY (`idDiagnostico`), ADD KEY `idNotaCita` (`idNotaCita`);

--
-- Indices de la tabla `diagnosticoMedico`
--
ALTER TABLE `diagnosticoMedico`
 ADD PRIMARY KEY (`idDiagnosticoMed`), ADD KEY `idMedico` (`idMedico`);

--
-- Indices de la tabla `hci`
--
ALTER TABLE `hci`
 ADD PRIMARY KEY (`idHci`), ADD KEY `idPaciente` (`idPaciente`);

--
-- Indices de la tabla `notaCita`
--
ALTER TABLE `notaCita`
 ADD PRIMARY KEY (`idNotaCita`);

--
-- Indices de la tabla `notasCitaGenerada`
--
ALTER TABLE `notasCitaGenerada`
 ADD PRIMARY KEY (`idNotaCitaGen`), ADD KEY `idCita` (`idCita`);

--
-- Indices de la tabla `notasCitaHci`
--
ALTER TABLE `notasCitaHci`
 ADD PRIMARY KEY (`idNotasCHci`), ADD KEY `idNotaCita` (`idNotaCita`), ADD KEY `idHci` (`idHci`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
 ADD PRIMARY KEY (`idPaciente`), ADD UNIQUE KEY `cedula` (`cedula`);

--
-- Indices de la tabla `pacNumContacto`
--
ALTER TABLE `pacNumContacto`
 ADD PRIMARY KEY (`idPacNumContacto`), ADD KEY `idPaciente` (`idPaciente`);

--
-- Indices de la tabla `pacTelf`
--
ALTER TABLE `pacTelf`
 ADD PRIMARY KEY (`idPacTelf`), ADD KEY `cedulaPaciente` (`idPaciente`), ADD KEY `idTipoTel` (`idTipoTel`);

--
-- Indices de la tabla `phciAlergia`
--
ALTER TABLE `phciAlergia`
 ADD PRIMARY KEY (`idPhciAlergia`), ADD KEY `idHci` (`idHci`);

--
-- Indices de la tabla `phciCondicion`
--
ALTER TABLE `phciCondicion`
 ADD PRIMARY KEY (`idPhciCondicion`), ADD KEY `idHci` (`idHci`);

--
-- Indices de la tabla `phciConsumo`
--
ALTER TABLE `phciConsumo`
 ADD PRIMARY KEY (`idPhciConsumo`), ADD KEY `idHci` (`idHci`), ADD KEY `idTipoConsumo` (`idTipoConsumo`), ADD KEY `idTipoEstado` (`idTipoEstado`);

--
-- Indices de la tabla `phciMedicamento`
--
ALTER TABLE `phciMedicamento`
 ADD PRIMARY KEY (`idPhciMedicamento`), ADD KEY `idHci` (`idHci`);

--
-- Indices de la tabla `prescripcion`
--
ALTER TABLE `prescripcion`
 ADD PRIMARY KEY (`idPrescripcion`), ADD KEY `idNotaCita` (`idNotaCita`);

--
-- Indices de la tabla `prescripcionMedico`
--
ALTER TABLE `prescripcionMedico`
 ADD PRIMARY KEY (`idPresMedico`), ADD KEY `idMedico` (`idMedico`);

--
-- Indices de la tabla `privilegio`
--
ALTER TABLE `privilegio`
 ADD PRIMARY KEY (`idPrivilegio`);

--
-- Indices de la tabla `referencia`
--
ALTER TABLE `referencia`
 ADD PRIMARY KEY (`idReferencia`), ADD KEY `idNotaCita` (`idNotaCita`);

--
-- Indices de la tabla `referenciaMedico`
--
ALTER TABLE `referenciaMedico`
 ADD PRIMARY KEY (`idRefMedico`), ADD KEY `idMedico` (`idMedico`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
 ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `rolPrivilegio`
--
ALTER TABLE `rolPrivilegio`
 ADD PRIMARY KEY (`idRolPrivilegio`), ADD KEY `idRol` (`idRol`), ADD KEY `idPrivilegio` (`idPrivilegio`);

--
-- Indices de la tabla `tipoAccion`
--
ALTER TABLE `tipoAccion`
 ADD PRIMARY KEY (`idTipoAccion`);

--
-- Indices de la tabla `tipoConsumo`
--
ALTER TABLE `tipoConsumo`
 ADD PRIMARY KEY (`idTipoConsumo`);

--
-- Indices de la tabla `tipoEstado`
--
ALTER TABLE `tipoEstado`
 ADD PRIMARY KEY (`idTipoEstado`);

--
-- Indices de la tabla `tipoTel`
--
ALTER TABLE `tipoTel`
 ADD PRIMARY KEY (`idTipoTel`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idUsuario`), ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
 ADD PRIMARY KEY (`idVisita`);

--
-- Indices de la tabla `visitaPaciente`
--
ALTER TABLE `visitaPaciente`
 ADD PRIMARY KEY (`idVisitaPaciente`), ADD KEY `idCita` (`idCita`), ADD KEY `idPaciente` (`idPaciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
MODIFY `idBitacora` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
MODIFY `idDiagnostico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `diagnosticoMedico`
--
ALTER TABLE `diagnosticoMedico`
MODIFY `idDiagnosticoMed` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `hci`
--
ALTER TABLE `hci`
MODIFY `idHci` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `notaCita`
--
ALTER TABLE `notaCita`
MODIFY `idNotaCita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notasCitaGenerada`
--
ALTER TABLE `notasCitaGenerada`
MODIFY `idNotaCitaGen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notasCitaHci`
--
ALTER TABLE `notasCitaHci`
MODIFY `idNotasCHci` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `pacNumContacto`
--
ALTER TABLE `pacNumContacto`
MODIFY `idPacNumContacto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `pacTelf`
--
ALTER TABLE `pacTelf`
MODIFY `idPacTelf` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `phciAlergia`
--
ALTER TABLE `phciAlergia`
MODIFY `idPhciAlergia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `phciCondicion`
--
ALTER TABLE `phciCondicion`
MODIFY `idPhciCondicion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `phciConsumo`
--
ALTER TABLE `phciConsumo`
MODIFY `idPhciConsumo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `phciMedicamento`
--
ALTER TABLE `phciMedicamento`
MODIFY `idPhciMedicamento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `prescripcion`
--
ALTER TABLE `prescripcion`
MODIFY `idPrescripcion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prescripcionMedico`
--
ALTER TABLE `prescripcionMedico`
MODIFY `idPresMedico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `privilegio`
--
ALTER TABLE `privilegio`
MODIFY `idPrivilegio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `referencia`
--
ALTER TABLE `referencia`
MODIFY `idReferencia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `referenciaMedico`
--
ALTER TABLE `referenciaMedico`
MODIFY `idRefMedico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `rolPrivilegio`
--
ALTER TABLE `rolPrivilegio`
MODIFY `idRolPrivilegio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipoAccion`
--
ALTER TABLE `tipoAccion`
MODIFY `idTipoAccion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipoConsumo`
--
ALTER TABLE `tipoConsumo`
MODIFY `idTipoConsumo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipoEstado`
--
ALTER TABLE `tipoEstado`
MODIFY `idTipoEstado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipoTel`
--
ALTER TABLE `tipoTel`
MODIFY `idTipoTel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
MODIFY `idVisita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `visitaPaciente`
--
ALTER TABLE `visitaPaciente`
MODIFY `idVisitaPaciente` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `bitacora_ibfk_2` FOREIGN KEY (`idTipoAccion`) REFERENCES `tipoAccion` (`idTipoAccion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
ADD CONSTRAINT `diagnostico_ibfk_1` FOREIGN KEY (`idNotaCita`) REFERENCES `notaCita` (`idNotaCita`);

--
-- Filtros para la tabla `diagnosticoMedico`
--
ALTER TABLE `diagnosticoMedico`
ADD CONSTRAINT `diagnosticoMedico_ibfk_1` FOREIGN KEY (`idMedico`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `hci`
--
ALTER TABLE `hci`
ADD CONSTRAINT `hci_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notasCitaGenerada`
--
ALTER TABLE `notasCitaGenerada`
ADD CONSTRAINT `notasCitaGenerada_ibfk_1` FOREIGN KEY (`idCita`) REFERENCES `cita` (`idCita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notasCitaHci`
--
ALTER TABLE `notasCitaHci`
ADD CONSTRAINT `notasCitaHci_ibfk_1` FOREIGN KEY (`idNotaCita`) REFERENCES `notaCita` (`idNotaCita`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `notasCitaHci_ibfk_2` FOREIGN KEY (`idHci`) REFERENCES `hci` (`idHci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pacNumContacto`
--
ALTER TABLE `pacNumContacto`
ADD CONSTRAINT `pacNumContacto_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pacTelf`
--
ALTER TABLE `pacTelf`
ADD CONSTRAINT `pacTelf_ibfk_1` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pacTelf_ibfk_2` FOREIGN KEY (`idTipoTel`) REFERENCES `tipoTel` (`idTipoTel`);

--
-- Filtros para la tabla `phciAlergia`
--
ALTER TABLE `phciAlergia`
ADD CONSTRAINT `phciAlergia_ibfk_1` FOREIGN KEY (`idHci`) REFERENCES `hci` (`idHci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `phciCondicion`
--
ALTER TABLE `phciCondicion`
ADD CONSTRAINT `phciCondicion_ibfk_1` FOREIGN KEY (`idHci`) REFERENCES `hci` (`idHci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `phciConsumo`
--
ALTER TABLE `phciConsumo`
ADD CONSTRAINT `phciConsumo_ibfk_1` FOREIGN KEY (`idHci`) REFERENCES `hci` (`idHci`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `phciConsumo_ibfk_2` FOREIGN KEY (`idTipoConsumo`) REFERENCES `tipoConsumo` (`idTipoConsumo`),
ADD CONSTRAINT `phciConsumo_ibfk_3` FOREIGN KEY (`idTipoEstado`) REFERENCES `tipoEstado` (`idTipoEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `phciMedicamento`
--
ALTER TABLE `phciMedicamento`
ADD CONSTRAINT `phciMedicamento_ibfk_1` FOREIGN KEY (`idHci`) REFERENCES `hci` (`idHci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prescripcion`
--
ALTER TABLE `prescripcion`
ADD CONSTRAINT `prescripcion_ibfk_1` FOREIGN KEY (`idNotaCita`) REFERENCES `notaCita` (`idNotaCita`);

--
-- Filtros para la tabla `prescripcionMedico`
--
ALTER TABLE `prescripcionMedico`
ADD CONSTRAINT `prescripcionMedico_ibfk_1` FOREIGN KEY (`idMedico`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `referencia`
--
ALTER TABLE `referencia`
ADD CONSTRAINT `referencia_ibfk_1` FOREIGN KEY (`idNotaCita`) REFERENCES `notaCita` (`idNotaCita`);

--
-- Filtros para la tabla `referenciaMedico`
--
ALTER TABLE `referenciaMedico`
ADD CONSTRAINT `referenciaMedico_ibfk_1` FOREIGN KEY (`idMedico`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `rolPrivilegio`
--
ALTER TABLE `rolPrivilegio`
ADD CONSTRAINT `rolPrivilegio_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`),
ADD CONSTRAINT `rolPrivilegio_ibfk_2` FOREIGN KEY (`idPrivilegio`) REFERENCES `privilegio` (`idPrivilegio`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);

--
-- Filtros para la tabla `visitaPaciente`
--
ALTER TABLE `visitaPaciente`
ADD CONSTRAINT `visitaPaciente_ibfk_2` FOREIGN KEY (`idCita`) REFERENCES `cita` (`idCita`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `visitaPaciente_ibfk_3` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
