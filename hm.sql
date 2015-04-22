-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-04-2015 a las 23:56:58
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
  `idUsuario` int(11) DEFAULT NULL,
  `idTipoAccion` int(11) DEFAULT NULL,
  `tabla` varchar(50) NOT NULL,
  `idTupla` int(11) NOT NULL,
  `descripcion` text,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`idBitacora`, `idUsuario`, `idTipoAccion`, `tabla`, `idTupla`, `descripcion`, `fecha`) VALUES
(182, 7, 1, 'Paciente', 38, 'ecarvallo agregó  un paciente . Cédula: 65455  dfshg jh', NULL),
(183, 7, 1, 'Pactelf', 59, 'ecarvallo agregó  un nuevo número personal para el paciente dfshg jh. Número: (5555)-5555555', NULL),
(184, 7, 1, 'Pacnumcontacto', 39, 'ecarvallo agregó  un contácto de emergencia  para el paciente dfshg jh. Contacto:  sdfdsf sdfsdf . Número: (5555)-5555555', NULL),
(185, 7, 3, 'Pactelf', 53, 'ecarvallo eliminó en Pactelf 53', NULL),
(186, 7, 3, 'Pactelf', 54, 'ecarvallo eliminó en Pactelf 54', NULL),
(187, 7, 3, 'Pactelf', 55, 'ecarvallo eliminó en Pactelf 55', NULL),
(188, 7, 3, 'Pacnumcontacto', 34, 'ecarvallo eliminó en Pacnumcontacto 34', NULL),
(189, 7, 3, 'Pacnumcontacto', 35, 'ecarvallo eliminó en Pacnumcontacto 35', NULL),
(190, 7, 3, 'Paciente', 36, 'ecarvallo eliminó en Paciente 36', NULL),
(191, 7, 3, 'Pactelf', 59, 'ecarvallo eliminó en Pactelf 59', NULL),
(192, 7, 2, 'Pacnumcontacto', 39, 'ecarvallo actualizó Pacnumcontacto.    Modificaciones en: numero: ( Valor anterior: (5555)-5555555 ), ', NULL),
(193, 7, 3, 'Phciconsumo', 3, 'ecarvallo eliminó en Phciconsumo 3', NULL),
(194, 7, 3, 'Phciconsumo', 4, 'ecarvallo eliminó en Phciconsumo 4', NULL),
(195, 7, 3, 'Phcimedicamento', 2, 'ecarvallo eliminó en Phcimedicamento 2', NULL),
(196, 7, 3, 'Hci', 8, 'ecarvallo eliminó en Hci 8', NULL),
(197, 7, 3, 'Pactelf', 34, 'ecarvallo eliminó en Pactelf 34', NULL),
(198, 7, 3, 'Pactelf', 35, 'ecarvallo eliminó en Pactelf 35', NULL),
(199, 7, 1, 'Hci', 15, 'ecarvallo agregó La Historia Clinica Inical del paciente Glenda BlancoB', NULL),
(200, 7, 3, 'Pactelf', 36, 'ecarvallo eliminó en Pactelf 36', NULL),
(201, 7, 3, 'Pactelf', 39, 'ecarvallo eliminó en Pactelf 39', NULL),
(202, 7, 3, 'Pactelf', 41, 'ecarvallo eliminó en Pactelf 41', NULL),
(203, 7, 3, 'Pactelf', 43, 'ecarvallo eliminó en Pactelf 43', NULL),
(204, 7, 3, 'Pactelf', 44, 'ecarvallo eliminó en Pactelf 44', NULL),
(205, 7, 3, 'Pactelf', 45, 'ecarvallo eliminó en Pactelf 45', NULL),
(206, 7, 3, 'Paciente', 33, 'ecarvallo eliminó en Paciente 33', NULL),
(207, 7, 3, 'Pactelf', 57, 'ecarvallo eliminó en Pactelf 57', NULL),
(208, 7, 3, 'Pactelf', 58, 'ecarvallo eliminó en Pactelf 58', NULL),
(209, 7, 3, 'Pacnumcontacto', 37, 'ecarvallo eliminó en Pacnumcontacto 37', NULL),
(210, 7, 3, 'Pacnumcontacto', 38, 'ecarvallo eliminó en Pacnumcontacto 38', NULL),
(211, 7, 3, 'Paciente', 37, 'ecarvallo eliminó en Paciente 37', NULL),
(212, 7, 1, 'Paciente', 39, 'ecarvallo agregó  un paciente . Cédula: 5  s asdadadsad', NULL),
(213, 7, 1, 'Pactelf', 60, 'ecarvallo agregó  un nuevo número personal para el paciente s asdadadsad. Número: (5555)-5555555', NULL),
(214, 7, 1, 'Pacnumcontacto', 40, 'ecarvallo agregó  un contácto de emergencia  para el paciente s asdadadsad. Contacto:  gh fgfdg . Número: (5555)-5555555', NULL),
(215, 7, 1, 'Pactelf', 61, 'ecarvallo agregó  un nuevo número personal para el paciente s asdadadsad. Número: (5555)-5555555', NULL),
(216, 7, 1, 'Cita', 38, 'ecarvallo agregó  una cita al paciente s asdadadsad para el dia 2015-04-22', NULL),
(217, 7, 1, 'Hci', 16, 'ecarvallo agregó La Historia Clinica Inical del paciente s asdadadsad', NULL),
(218, 7, 1, 'Phciconsumo', 11, 'ecarvallo agregó un consumo del paciente s asdadadsad', NULL),
(219, 7, 1, 'Phciconsumo', 12, 'ecarvallo agregó un consumo del paciente s asdadadsad', NULL),
(220, 7, 1, 'Notacita', 8, 'ecarvallo agregó  una Nota de cita para el paciente s asdadadsad a su cita programada para el dia: 2015-04-22', NULL),
(221, 7, 1, 'Prescripcion', 8, 'ecarvallo agregó  una prescripción para el paciente s asdadadsad a su cita programada para el dia: 2015-04-22', NULL),
(222, 7, 3, 'Prescripcion', 8, 'ecarvallo eliminó en Prescripcion 8', NULL),
(223, 7, 1, 'Prescripcion', 9, 'ecarvallo agregó  una prescripción para el paciente s asdadadsad a su cita programada para el dia: 2015-04-22', NULL),
(224, 7, 1, 'Referencia', 2, 'ecarvallo agregó  una referencia para el paciente s asdadadsad a su cita programada para el dia: 2015-04-22', NULL),
(225, 7, 3, 'Prescripcion', 9, 'ecarvallo eliminó en Prescripcion 9', NULL),
(226, 7, 3, 'Referencia', 2, 'ecarvallo eliminó en Referencia 2', NULL),
(227, 7, 3, 'Notacita', 8, 'ecarvallo eliminó en Notacita 8', NULL),
(228, 7, 1, 'Notacita', 9, 'ecarvallo agregó  una Nota de cita para el paciente s asdadadsad a su cita programada para el dia: 2015-04-22', NULL),
(229, 7, 3, 'Notacita', 9, 'ecarvallo eliminó en Notacita 9', NULL),
(230, 7, 1, 'Usuario', 18, 'ecarvallo agregó  un usuario. Nombre de usuario admin Nombre: admin con rol de Admin-Medico', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE IF NOT EXISTS `cita` (
`idCita` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `fechaProgramada` date NOT NULL,
  `horaProgramada` varchar(20) NOT NULL,
  `motivo` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`idCita`, `idUsuario`, `idPaciente`, `fechaCreacion`, `fechaProgramada`, `horaProgramada`, `motivo`) VALUES
(38, 7, 39, NULL, '2015-04-22', '05:15 PM', 'rqwer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE IF NOT EXISTS `diagnostico` (
`idDiagnostico` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `descripcion` text NOT NULL,
  `idNotaCita` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hci`
--

CREATE TABLE IF NOT EXISTS `hci` (
`idHci` int(11) NOT NULL,
  `fechaCreacion` datetime DEFAULT NULL,
  `idPaciente` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hci`
--

INSERT INTO `hci` (`idHci`, `fechaCreacion`, `idPaciente`) VALUES
(16, NULL, 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notaCita`
--

CREATE TABLE IF NOT EXISTS `notaCita` (
`idNotaCita` int(11) NOT NULL,
  `idCita` int(11) DEFAULT NULL,
  `idHci` int(11) DEFAULT NULL,
  `presionArterial` float NOT NULL,
  `alturaPaciente` float NOT NULL,
  `pesoPaciente` float NOT NULL,
  `frecuenciaCardiaca` float NOT NULL,
  `temperatura` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
  `idmedicoPref` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`idPaciente`, `cedula`, `nombre`, `apellido`, `direccion`, `fechaNac`, `numSS`, `idmedicoPref`) VALUES
(39, '5', 's', 'asdadadsad', 'asasda', '2055-05-05', '5g', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacNumContacto`
--

CREATE TABLE IF NOT EXISTS `pacNumContacto` (
`idPacNumContacto` int(11) NOT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `nombreContacto` varchar(100) NOT NULL,
  `apellidoContacto` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `relacion` varchar(50) NOT NULL,
  `fechaAgregado` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacNumContacto`
--

INSERT INTO `pacNumContacto` (`idPacNumContacto`, `idPaciente`, `nombreContacto`, `apellidoContacto`, `numero`, `relacion`, `fechaAgregado`) VALUES
(40, 39, 'gh', 'fgfdg', '(5555)-5555555', '55hretgret', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacTelf`
--

CREATE TABLE IF NOT EXISTS `pacTelf` (
`idPacTelf` int(11) NOT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `idTipoTel` int(11) DEFAULT NULL,
  `numero` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacTelf`
--

INSERT INTO `pacTelf` (`idPacTelf`, `idPaciente`, `idTipoTel`, `numero`) VALUES
(60, 39, 2, '(5555)-5555555'),
(61, 39, 1, '(5555)-5555555');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phciAlergia`
--

CREATE TABLE IF NOT EXISTS `phciAlergia` (
`idPhciAlergia` int(11) NOT NULL,
  `idHci` int(11) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `fechaActualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phciCondicion`
--

CREATE TABLE IF NOT EXISTS `phciCondicion` (
`idPhciCondicion` int(11) NOT NULL,
  `idHci` int(11) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `fechaActualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phciConsumo`
--

CREATE TABLE IF NOT EXISTS `phciConsumo` (
`idPhciConsumo` int(11) NOT NULL,
  `idHci` int(11) DEFAULT NULL,
  `idTipoConsumo` int(11) DEFAULT NULL,
  `fechaActualizacion` datetime DEFAULT NULL,
  `idTipoEstado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `phciConsumo`
--

INSERT INTO `phciConsumo` (`idPhciConsumo`, `idHci`, `idTipoConsumo`, `fechaActualizacion`, `idTipoEstado`) VALUES
(11, 16, 1, NULL, 3),
(12, 16, 2, NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phciMedicamento`
--

CREATE TABLE IF NOT EXISTS `phciMedicamento` (
`idPhciMedicamento` int(11) NOT NULL,
  `idHci` int(11) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `fechaActualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prescripcion`
--

CREATE TABLE IF NOT EXISTS `prescripcion` (
`idPrescripcion` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `instrucciones` text NOT NULL,
  `idNotaCita` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
  `idUsuario` int(11) DEFAULT NULL,
  `nombreDoctor` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `idNotaCita` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
  `idRol` int(11) DEFAULT NULL,
  `idPrivilegio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoAccion`
--

CREATE TABLE IF NOT EXISTS `tipoAccion` (
`idTipoAccion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoAccion`
--

INSERT INTO `tipoAccion` (`idTipoAccion`, `nombre`) VALUES
(1, 'Insertar'),
(2, 'Ediitar'),
(3, 'Eliminar');

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
  `idRol` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `clave`, `nombre`, `fechaNac`, `numSS`, `direccion`, `telefono`, `fechaInicio`, `idRol`) VALUES
(4, 'javieralej', '24571582', 'Javier Carvallo', '2000-02-22', '518418', 'urbanizacion malave villalba', '(5555)-5555555', '2010-01-02', 4),
(7, 'ecarvallo', 'eduardandress', 'Eduardo Carvallo', '1994-01-15', '24571581rtg', 'Urb Malave Villalba', '(0414)-4963763', '2015-04-01', 1),
(8, 'esanchez', '1234', 'Edilianny Sánchez', '1991-11-11', 'jbjhgbghvfvv', 'San Diego', '(0412)-5555555', '2001-11-11', 3),
(9, 'amota4', '1234', 'Allinson Mota', '1990-03-10', '54545485485', 'Puerto Cabello- Urbanizacion Cumboto II', '(0414)-5555555', '2015-01-11', 2),
(10, 'agarcia', '1234', 'Argenis Garcia', '2015-02-22', '6262', 'dssdfsdf', '(0000)-0000000', '2038-01-13', 1),
(14, 'lperez', '1234', 'Luis Pérez', '2022-02-22', '2s22222222', '2daffffffff', '(3333)-3333333', '2033-03-03', 4),
(16, 'dsg', 'sdg', 'sdfg', '2046-03-05', 'sdfsdf', 'sdfsdf', '(3254)-236436_', '2035-03-04', 2),
(18, 'admin', 'admin', 'admin', '2022-02-22', '222222222', '2222222', '(2222)-2222222', '2022-02-22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
`idVisita` int(11) NOT NULL,
  `idPaciente` int(11) DEFAULT NULL,
  `idCita` int(11) DEFAULT NULL,
  `idMedico` int(11) DEFAULT NULL,
  `idEnfermera` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
 ADD PRIMARY KEY (`idDiagnostico`), ADD UNIQUE KEY `UNIQ_9B91D44832DCDBAF` (`idUsuario`), ADD KEY `idNotaCita` (`idNotaCita`);

--
-- Indices de la tabla `hci`
--
ALTER TABLE `hci`
 ADD PRIMARY KEY (`idHci`), ADD UNIQUE KEY `UNIQ_C33BA21295688305` (`idPaciente`);

--
-- Indices de la tabla `notaCita`
--
ALTER TABLE `notaCita`
 ADD PRIMARY KEY (`idNotaCita`), ADD UNIQUE KEY `UNIQ_561DAA864DCAC4FC` (`idCita`), ADD KEY `idHci` (`idHci`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
 ADD PRIMARY KEY (`idPaciente`), ADD UNIQUE KEY `cedula` (`cedula`), ADD KEY `idmedicoPref` (`idmedicoPref`);

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
 ADD PRIMARY KEY (`idPrescripcion`), ADD UNIQUE KEY `UNIQ_D271D7FF32DCDBAF` (`idUsuario`), ADD KEY `idNotaCita` (`idNotaCita`);

--
-- Indices de la tabla `privilegio`
--
ALTER TABLE `privilegio`
 ADD PRIMARY KEY (`idPrivilegio`);

--
-- Indices de la tabla `referencia`
--
ALTER TABLE `referencia`
 ADD PRIMARY KEY (`idReferencia`), ADD UNIQUE KEY `UNIQ_C01213D832DCDBAF` (`idUsuario`), ADD KEY `idNotaCita` (`idNotaCita`);

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
 ADD PRIMARY KEY (`idVisita`), ADD UNIQUE KEY `UNIQ_B7F148A24DCAC4FC` (`idCita`), ADD KEY `idPaciente` (`idPaciente`), ADD KEY `idMedico` (`idMedico`), ADD KEY `idEnfermera` (`idEnfermera`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
MODIFY `idBitacora` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=231;
--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
MODIFY `idDiagnostico` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `hci`
--
ALTER TABLE `hci`
MODIFY `idHci` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `notaCita`
--
ALTER TABLE `notaCita`
MODIFY `idNotaCita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `pacNumContacto`
--
ALTER TABLE `pacNumContacto`
MODIFY `idPacNumContacto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `pacTelf`
--
ALTER TABLE `pacTelf`
MODIFY `idPacTelf` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT de la tabla `phciAlergia`
--
ALTER TABLE `phciAlergia`
MODIFY `idPhciAlergia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `phciCondicion`
--
ALTER TABLE `phciCondicion`
MODIFY `idPhciCondicion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `phciConsumo`
--
ALTER TABLE `phciConsumo`
MODIFY `idPhciConsumo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `phciMedicamento`
--
ALTER TABLE `phciMedicamento`
MODIFY `idPhciMedicamento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `prescripcion`
--
ALTER TABLE `prescripcion`
MODIFY `idPrescripcion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `privilegio`
--
ALTER TABLE `privilegio`
MODIFY `idPrivilegio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `referencia`
--
ALTER TABLE `referencia`
MODIFY `idReferencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
MODIFY `idTipoAccion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
MODIFY `idVisita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
ADD CONSTRAINT `FK_9087FEF983DE8E3C` FOREIGN KEY (`idTipoAccion`) REFERENCES `tipoAccion` (`idTipoAccion`),
ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
ADD CONSTRAINT `FK_3E379A6295688305` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`),
ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
ADD CONSTRAINT `FK_9B91D44832DCDBAF` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
ADD CONSTRAINT `FK_9B91D4485BE80DD` FOREIGN KEY (`idNotaCita`) REFERENCES `notaCita` (`idNotaCita`);

--
-- Filtros para la tabla `hci`
--
ALTER TABLE `hci`
ADD CONSTRAINT `FK_C33BA21295688305` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`);

--
-- Filtros para la tabla `notaCita`
--
ALTER TABLE `notaCita`
ADD CONSTRAINT `FK_561DAA864DCAC4FC` FOREIGN KEY (`idCita`) REFERENCES `cita` (`idCita`),
ADD CONSTRAINT `FK_561DAA86E273BF95` FOREIGN KEY (`idHci`) REFERENCES `hci` (`idHci`);

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`idmedicoPref`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `pacNumContacto`
--
ALTER TABLE `pacNumContacto`
ADD CONSTRAINT `FK_351A996495688305` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`);

--
-- Filtros para la tabla `pacTelf`
--
ALTER TABLE `pacTelf`
ADD CONSTRAINT `FK_BD4AFCF95688305` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`),
ADD CONSTRAINT `pacTelf_ibfk_2` FOREIGN KEY (`idTipoTel`) REFERENCES `tipoTel` (`idTipoTel`);

--
-- Filtros para la tabla `phciAlergia`
--
ALTER TABLE `phciAlergia`
ADD CONSTRAINT `FK_3363DC29E273BF95` FOREIGN KEY (`idHci`) REFERENCES `hci` (`idHci`);

--
-- Filtros para la tabla `phciCondicion`
--
ALTER TABLE `phciCondicion`
ADD CONSTRAINT `FK_6BFA8E1BE273BF95` FOREIGN KEY (`idHci`) REFERENCES `hci` (`idHci`);

--
-- Filtros para la tabla `phciConsumo`
--
ALTER TABLE `phciConsumo`
ADD CONSTRAINT `FK_717276C7E273BF95` FOREIGN KEY (`idHci`) REFERENCES `hci` (`idHci`),
ADD CONSTRAINT `phciConsumo_ibfk_2` FOREIGN KEY (`idTipoConsumo`) REFERENCES `tipoConsumo` (`idTipoConsumo`),
ADD CONSTRAINT `phciConsumo_ibfk_3` FOREIGN KEY (`idTipoEstado`) REFERENCES `tipoEstado` (`idTipoEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `phciMedicamento`
--
ALTER TABLE `phciMedicamento`
ADD CONSTRAINT `FK_4C4B40E2E273BF95` FOREIGN KEY (`idHci`) REFERENCES `hci` (`idHci`);

--
-- Filtros para la tabla `prescripcion`
--
ALTER TABLE `prescripcion`
ADD CONSTRAINT `FK_D271D7FF32DCDBAF` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
ADD CONSTRAINT `FK_D271D7FF5BE80DD` FOREIGN KEY (`idNotaCita`) REFERENCES `notaCita` (`idNotaCita`);

--
-- Filtros para la tabla `referencia`
--
ALTER TABLE `referencia`
ADD CONSTRAINT `FK_C01213D832DCDBAF` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
ADD CONSTRAINT `FK_C01213D85BE80DD` FOREIGN KEY (`idNotaCita`) REFERENCES `notaCita` (`idNotaCita`);

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
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
ADD CONSTRAINT `FK_B7F148A24DCAC4FC` FOREIGN KEY (`idCita`) REFERENCES `cita` (`idCita`),
ADD CONSTRAINT `FK_B7F148A257F439D6` FOREIGN KEY (`idMedico`) REFERENCES `usuario` (`idUsuario`),
ADD CONSTRAINT `FK_B7F148A25AD771AC` FOREIGN KEY (`idEnfermera`) REFERENCES `usuario` (`idUsuario`),
ADD CONSTRAINT `FK_B7F148A295688305` FOREIGN KEY (`idPaciente`) REFERENCES `paciente` (`idPaciente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
