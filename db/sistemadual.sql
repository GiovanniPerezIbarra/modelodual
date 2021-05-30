-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2021 a las 00:15:57
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `heroku_c0bfcd099bb83be`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnoempresa`
--

CREATE TABLE `alumnoempresa` (
  `id` int(100) NOT NULL,
  `matricula` int(10) NOT NULL,
  `nombre_alumno` varchar(100) NOT NULL,
  `empresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnoempresa`
--

INSERT INTO `alumnoempresa` (`id`, `matricula`, `nombre_alumno`, `empresa`) VALUES
(2, 201632333, 'Laura Ramos Gonzalez', 'TESI COATEPEC'),
(3, 201632061, 'Tokihatl Genaro Laguna Castro', 'POR LA VIDA: EDUCACION E INVESTIGACION, A. C.\r\n'),
(4, 201632969, 'Giovanni Perez Ibarra', 'POR LA VIDA: EDUCACION E INVESTIGACION, A. C.\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivosaceptados`
--

CREATE TABLE `archivosaceptados` (
  `id_aceptados` int(11) NOT NULL,
  `matricula` int(10) NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `archivo` mediumblob NOT NULL,
  `extension` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivosaceptados`
--

INSERT INTO `archivosaceptados` (`id_aceptados`, `matricula`, `carrera`, `archivo`, `extension`) VALUES
(13, 201632969, 'ING. EN SISTEMAS', 0x3230313633323936392d3239372d54332d30312d454e2d313730312d31352e706466, 'application/pdf'),
(14, 201632969, 'ING. EN SISTEMAS', 0x3230313633323936392d3331322d54342d30322d4d432d313730312d31352e706466, 'application/pdf'),
(15, 201632915, 'ING. EN SISTEMAS', 0x3230313633323931352d3430392d54332d30312d454e2d313730312d31352e706466, 'application/pdf'),
(16, 201632915, 'ING. EN SISTEMAS', 0x3230313633323931352d3431302d54342d30332d45582d313730312d31352e706466, 'application/pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivosalumnos`
--

CREATE TABLE `archivosalumnos` (
  `id_archivos` int(10) NOT NULL,
  `matricula` int(10) NOT NULL,
  `archivo` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivosalumnos`
--

INSERT INTO `archivosalumnos` (`id_archivos`, `matricula`, `archivo`) VALUES
(67, 201632969, 0x3230313633323936392d3532342d54342d30312d454e2d313730312d31352e706466),
(68, 201632969, 0x3230313633323936392d3931322d54332d30322d4d432d313730312d31352e706466),
(69, 201632969, 0x3230313633323936392d3636372d54332d30312d454e2d313730312d31352e706466),
(70, 201632969, 0x3230313633323936392d3435372d54332d30312d454e2d313730312d31352e706466),
(71, 201632969, 0x3230313633323936392d3830392d54342d30332d45582d313730312d31352e706466),
(72, 201632969, 0x3230313633323936392d3532352d54332d30332d45582d313730312d31352e706466),
(73, 201632969, 0x3230313633323936392d3131312d54332d30312d454e2d313730312d31352e706466),
(74, 201632969, 0x3230313633323936392d3338332d54332d30322d4d432d313730312d31352e706466),
(75, 201632969, 0x3230313633323936392d3931392d54342d30312d454e2d313730312d31352e706466),
(76, 201632969, 0x3230313633323936392d3430342d54342d30332d45582d313730312d31352e706466);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id_asignacion` int(10) NOT NULL,
  `matricula` int(10) NOT NULL,
  `nombre_alumno` varchar(100) NOT NULL,
  `nombre_mentor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id_asignacion`, `matricula`, `nombre_alumno`, `nombre_mentor`) VALUES
(28, 201632914, 'Diana Laura Ramos Gonzalez', 'Kevin Gyovany Ramirez Vite'),
(29, 201632969, 'Giovanni Perez Ibarra', 'Cesar Fabian Reyes Manzano'),
(31, 201632061, 'Tokihatl Genaro Laguna Castro', 'Roberto Carlos Huerta Lopez'),
(35, 201632915, 'Maryana Anaid Martinez Jimenez', 'Bernardo Romero Medina'),
(36, 201732444, 'Gabriela Aislinn Cuevas', 'Cesar Fabian Reyes Manzano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` int(11) NOT NULL,
  `matricula` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `parcial` int(10) NOT NULL,
  `calificacion` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `matricula`, `nombre`, `parcial`, `calificacion`) VALUES
(3, 857343, 'Laura Ramos Gonzalez', 1, 60),
(4, 201632969, 'Giovanni Perez Ibarra', 1, 90),
(5, 201632061, 'Gabriela Aislinn Cuevas', 1, 100),
(6, 201732444, 'Gabriela Aislinn Cuevas', 2, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compemp`
--

CREATE TABLE `compemp` (
  `id_archivo` int(11) NOT NULL,
  `rfc` varchar(100) NOT NULL,
  `archivo` mediumblob NOT NULL,
  `extension` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compemp`
--

INSERT INTO `compemp` (`id_archivo`, `rfc`, `archivo`, `extension`) VALUES
(3, 'TESI201632969', 0x544553493230313633323936392d3832342d54332d30312d454e2d313730312d31352e706466, 'application/pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE `convenios` (
  `id` int(11) NOT NULL,
  `asociacion` varchar(100) NOT NULL,
  `prestacion` varchar(100) NOT NULL,
  `vigencia` varchar(100) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `suscriptor` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `convenios`
--

INSERT INTO `convenios` (`id`, `asociacion`, `prestacion`, `vigencia`, `ubicacion`, `suscriptor`, `cargo`, `carrera`, `correo`) VALUES
(1, 'ASOCIACION PARA EVITAR LA CEGUERA EN MEXICO, I.A.P.\r\n', 'EDUCACION DUAL\r\n', '14/08/2018 \r\nINDEFINIDO\r\n', 'CALLE VICENTE GARCIA TORRES, N.46, COL. BARRIO SAN LUCAS, C.P. 04030, CIUDAD DE MEXICO.\r\n', 'MTRO. JORGE APARICIO ROJAS', 'REPRESENTANTE LEGAL\r\n', 'ING. BIOMEDICA\r\n', 'reclutamiento@apec.com.mx'),
(2, 'FUNDACION NACIONAL CRIMINALISTA Y JURIDICA, A.C. \r\n', 'EDUCACION DUAL', '30/09/2019 al 30/09/2020\r\n', 'CALLE NICOLAS BRAVO, N. 15, COL. SAN FRANCISCO ACUAUTLA, C.P. 56587\r\n', 'LCDO. ORVYL COSSIO MAUEL \r\n', 'REPRESENTANTE LEGAL\r\n', 'ING. INFORMATICA, ING. EN SISTEMAS \r\n', 'toki@gmail.com'),
(3, 'POR LA VIDA: EDUCACION E INVESTIGACION, A. C.\r\n', 'EDUCACION DUAL', '31/05/2019    31/05/2020\r\n', 'CALLE GOMEZ FARIAS, NUMERO 111, COL. DEL CARMEN ALCALDIA DE COYOACAN, CIUDAD DE MEXICO\r\n', 'LCDO. JOSE ANTONIO CARMONA SUAZO\r\n', 'PRESIDENTE DEL CONSEJO DE DIRECTORES\r\n', 'ING. BIOMEDICA\r\n', 'laura-estrella@live.com.mx'),
(4, 'POR UN MUNDO NUEVO E INCLUSION SOCIAL EN PRO DE LOS DERECHOS HUMANOS A.C.\r\n', 'EDUCACION DUAL', '16/10/2019 AL 16/10/2020\r\n', 'CALLE TLALOC, N. 46 COCOTITLAN, C.P. 56580, ESTADO DE MEXICO.\r\n', 'ING. VICTOR MANUEL MOLINA DIAZ \r\n', 'PRESIDENTE\r\n', 'ING. AMBIENTAL, ARQUITECTURA, ADMINISTRACION\r\n', 'porunmundomejor@google.com'),
(5, 'ACTUARIA Y CONSULTORIA EN PREVISION SOCIAL FAINNE, S.A DE C.V.\r\n', ' EDUCACION DUAL\r\n', '10/08/2018 \r\nINDEFINIDO', 'CALLE LUZ AVINION, N. 305D, COL. DEL VALLE, C.P. 03100, CIUDAD DE MEXICO.\r\n', 'C. GERARDO COLOMER GARCIA \r\n', 'REPRESENTANTE LEGAL\r\n', 'ADMINISTRACION\r\n', 'actuariayconsultriogerardo@yohoo.com'),
(6, 'ALMATODO, S. A. DE C. V.\r\n', 'EDUCACION DUAL', '31/05/2019 31/05/2020\r\n', 'AV. MIGUEL HIDALGO, NUMERO 32, COL. SAN ANTONIO, C.P. 56600, MUNICIPIO DE CHALCO, ESTADO DE MEXICO\r\n', 'C. RAMON NAVARRO ZEPEDA\r\n', 'ADMINISTRADOR UNICO\r\n', 'ADMINISTRACION\r\n', 'almatodo@hotmail.com'),
(7, 'ARMAV INGENIERIA Y CONSTRUCCION, S.A DE C.V.\r\n', 'EDUCACION DUAL\r\n', '13/09/2018\r\nINDEFINIDO', ' CALLE SUR  111, NUMERO 702, COL. SECTOR POPULAR, C.P. 09060, CIUDAD DE MEXICO.\r\n', 'LCDO. MARCOS VARGAS VALENCIA\r\n', 'REPRESENTANTE LEGAL\r\n', 'ARQUITECTURA \r\n', 'construccion_arquitectos@live.com.mx'),
(8, 'ASIENTOS PRESTIGE & COMFOT\r\n', 'EDUCACION DUAL\r\n', '22/08/2018 \r\nINDEFINIDO\r\n', 'CALLE MORELOS, MZ-2 LT-4, COL. EJIDAL EL PINO, C.P. 56507, LOS REYES LA PAZ, ESTADO DE MEXICO.\r\n', 'LCDO. VICTOR CRUZ ANTONIO \r\n', 'REPRESENTANTE LEGAL\r\n', 'ADMINISTRACION, ING. AMBIENTAL, ING. ELECTRONICA\r\n', 'comfot192@yohoo.com'),
(9, 'KRISTAL SOFTWARE HOUSE, S.A DE C.V.\r\n', 'EDUCACION DUAL', '13/09/2019 AL 13/09/2020\r\n', 'CALLE VICENTE GUERRERO, NUM-1, COL. AYOTLA CENTRO, C.P.56560, IXTAPALUCA ESTADO DE MEXICO.\r\n', 'LIC. EDGAR HOMAR HERNANDEZ MAYORGA\r\n', 'DIRECTOR GENERAL\r\n', 'ING. INFORMATICA, ING. EN SISTEMAS ', 'ehm@ksh.com.mx'),
(10, 'CONPROINS, S. A. DE. C. V.\r\n', 'EDUCACION DUAL', '31/05/2019 31/05/2020\r\n', 'CALLE FELIPE TEJEDA, MZ 1810 LT 38 COL. AMPLIACION EMILIANO ZAPATA, C.P. 56550 IXTAPALUCA, ESTADO DE MEXICO\r\n', 'C. GERARDO MORENO BORJA\r\n', 'ADMINISTRADOR UNICO\r\n', 'ARQUITECTURA\r\n', 'conproins_op@hotmail.com'),
(11, 'CONSTRUCTORA CORINTO, S. A. DE C. V.\r\n', 'EDUCACION DUAL', '09/05/2019      09/05/2020', 'AV. REVOLUCION NUM. 1600 DES 1 COL. SAN ANGEL, C.P. 01000, ALCALDIA ALVARO OBREGON, CIUDAD DE MEXICO\r\n', 'ING. OSCAR LUIS SANCHEZ FONTAN\r\n', 'ADMINISTRADOR UNICO\r\n', 'ARQUITECTURA\r\n', 'arq.contruccion@hotmail.com'),
(15, 'INDUSTRIA DE CRISTAL TEMPLADO S.A. DE C.V.', 'EDUCACION DUAL', '31/05/2019 - 31/05/2020', 'CLZ. ACOZAC, NUMERO 13, COL. IXTAPALUCA CENTRO, C.P. 56530,  IXTAPALUCA ESTADO DE MEXICO', 'LIC. ALFONSO COLIN GONZALEZ', 'REPRESENTANTE LEGAL', 'LIC. ADMINISTRACION, ING. AMBIENTAL, ING. INFORMATICA, ING. SISTEMAS COMPUTACIONALES, ING. ELECTRONICA', 'renechavezmontes@yahoo.com.mx'),
(17, 'TESOEM', 'EDUCACION DUAL', '12-09-2020 AL 12-09-2021', 'IXTAPALUCA', 'GIOVANNI', 'JEFE DE AREA', '[\"ING. EN SISTEMAS\",\"ING. BIOMEDICA\"]', 'tokihatl@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosalumnos`
--

CREATE TABLE `datosalumnos` (
  `id_alumno` int(10) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `matricula` int(15) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contra` varchar(100) NOT NULL,
  `confirmar` varchar(100) NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `estatus` varchar(20) NOT NULL,
  `semestre` varchar(20) NOT NULL,
  `grupo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datosalumnos`
--

INSERT INTO `datosalumnos` (`id_alumno`, `nombre_completo`, `matricula`, `correo`, `contra`, `confirmar`, `carrera`, `estatus`, `semestre`, `grupo`) VALUES
(1, 'Tokihatl Genaro Laguna castro', 201632061, 'tokihatlgenaro19@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Sistemas Computacionales', 'Regular', 'Sexto', 1801),
(2, 'Giovanni Perez Ibarra', 201632969, 'giorapni@gmail.com', 'SG9sYW11bmRvMQ==', 'SG9sYW11bmRvMQ==', 'Ing. Biomedica', 'Regular', 'Octavo', 1951),
(3, 'Laura Ramos Gonzalez', 201632914, 'lauraaa1375@gmail.com', 'SG9sYW11bmRvMQ==', 'SG9sYW11bmRvMQ==', 'Ing. Informatica', 'Regular', 'Octavo', 1751),
(5, 'Mariana Anaid Martinez Jimenez', 201632915, 'marianacolin@live.com.mx', 'YmVyZXQ=', 'YmVyZXQ=', 'Lic. Arquitectura', 'Regular', 'Sexto', 6151),
(10, 'Gabriela Aislinn Cuevas', 201732444, '1gabycuervas@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Lic. Administracion', 'Regular', 'Octavo', 1801),
(11, 'Javier Pintor Alarcon', 201632456, 'javier@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Electronica', 'Regular', 'Septimo', 1601),
(12, 'Karina Lopez Galeana', 201832199, 'karina123@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Ambiental', 'Regular', 'Septimo', 1701),
(13, 'Uriel Alan Pineda Rodriguez', 201632546, 'alanuriel@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Sistemas Computacionales', 'Regular', 'Septimo', 1701),
(14, 'Raji Bryan Sanchez Macias', 201832541, 'rajibryan@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Lic. Administracion', 'Regular', 'Octavo', 1801),
(15, 'Jaime Ivan Ramirez Osorio', 201732243, 'jaimeivan@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Lic. Arquitectura', 'Regular', 'Octavo', 1801),
(16, 'Brayan Alexis Ceron Torres', 201732231, 'cerontorres@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Biomedica', 'Regular', 'Sexto', 1651),
(17, 'Nancy Elisabeth Tapia Aragon', 201632256, 'nancytapia@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Electronica', 'Regular', 'Sexto', 6151),
(18, 'Francisco Adrian Arroyo Ponce', 201832219, 'franciscoa@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Ambiental', 'Regular', 'Septimo', 4751),
(19, 'Brayan Enrique Manjarrez Gomez', 201732457, 'brayanmanja@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Informatica', 'Regular', 'Octavo', 5851),
(20, 'Teresa Barrera Marquina', 201532456, 'teresa@gmail.com', 'aG9saXMyMzI=', 'aG9saXMyMzI=', 'Ing. Sistemas Computacionales', 'Regular', 'Octavo', 1851);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosdivision`
--

CREATE TABLE `datosdivision` (
  `id_division` int(10) NOT NULL,
  `id_empleado` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datosdivision`
--

INSERT INTO `datosdivision` (`id_division`, `id_empleado`, `nombre`, `carrera`, `correo`, `contra`) VALUES
(1, '123456789', 'Division de Sistemas', 'INGENIERIA EN SISTEMAS COMPUTACIONALES', 'lauraaa1375@gmail.com', 'aG9sYQ==');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosempresas`
--

CREATE TABLE `datosempresas` (
  `id_due` int(10) NOT NULL,
  `razonsocial` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rfc` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `domicilio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `contacto` int(15) NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `empleados` int(10) NOT NULL,
  `contra` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `confirmar` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `datosempresas`
--

INSERT INTO `datosempresas` (`id_due`, `razonsocial`, `rfc`, `domicilio`, `nombre`, `cargo`, `contacto`, `correo`, `empleados`, `contra`, `confirmar`) VALUES
(5, 'TESI', 'TESI201632969', 'Coatepec', 'Giovanni PÃ©rez Ibarra', 'Alumno', 59760513, 'giorapni@gmail.com', 56, 'aG9sYQ==', 'aG9sYQ==');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datostutores`
--

CREATE TABLE `datostutores` (
  `id_dtutor` int(10) NOT NULL,
  `id_trabajador` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contra` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `confirmar` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `carrera` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `perfil` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `datostutores`
--

INSERT INTO `datostutores` (`id_dtutor`, `id_trabajador`, `nombre_completo`, `correo`, `contra`, `confirmar`, `carrera`, `perfil`) VALUES
(1, '049578133462940', 'Kevin Gyovany Ramirez Vite', 'toki@gmail.com', 'c9b733a6fe5d39c3197a5b4f7db13641', 'aG9sYQ==', 'Lic. Administracion', 'Si'),
(2, '123456789', 'Cesar Fabian Reyes Manzano', 'tokihatlgenaro19@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Sistemas Computacionales', 'Si'),
(4, '123', 'Salvador Becerra Garcia', 'giorapni@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Sistemas Computacionales', 'Si'),
(27, '8347257575892', 'Roberto Carlos Huerta Lopez', 'robertohuerta@hotmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Lic. Arquitectura', 'Si'),
(28, '834756345', 'Miriam Laura Juarez Hernandez', 'miriamlaura@hotmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Biomedica', 'Si'),
(29, '5683434912', 'Juan Antonio Granados Hernandez', 'granados@hotmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Electronica', 'Si'),
(30, '5323489063434', 'Ebner Juarez Elias', 'ebner@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Ambiental', 'Si'),
(31, '5683434912632', 'Francisco Rivero Briseno', 'rivero@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Informatica', 'Si'),
(32, '1029384756', 'Bernardo Romero Medina', 'berni@gmail.com', 'aG9sYQ==', 'aG9sYQ==', 'Ing. Sistemas Computacionales', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosvinculacion`
--

CREATE TABLE `datosvinculacion` (
  `id_vinculacion` int(10) NOT NULL,
  `id_empleado` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datosvinculacion`
--

INSERT INTO `datosvinculacion` (`id_vinculacion`, `id_empleado`, `correo`, `contra`) VALUES
(1, '123456789', 'lauraaa1375@gmail.com', 'aG9sYQ==');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentosconvenio`
--

CREATE TABLE `documentosconvenio` (
  `id` int(11) NOT NULL,
  `rfc` varchar(100) NOT NULL,
  `archivo` mediumblob NOT NULL,
  `mime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentosconvenio`
--

INSERT INTO `documentosconvenio` (`id`, `rfc`, `archivo`, `mime`) VALUES
(1, 'techa20163234', 0x3137352d707261637469636120322e706466, 'application/pdf'),
(16, 'TESI201632969', 0x3239322d4449534b504152542e706466, 'application/pdf'),
(17, 'TESI201632969', 0x3437322d4449534b504152542e706466, 'application/pdf'),
(18, 'TESI201632969', 0x3639372d4449534b504152542e706466, 'application/pdf'),
(19, 'TESI201632969', 0x3730342d4449534b504152542e706466, 'application/pdf'),
(20, 'TESI201632969', 0x3432352d4449534b504152542e706466, 'application/pdf'),
(21, 'TESI201632969', 0x3239382d4449534b504152542e706466, 'application/pdf'),
(22, 'TESI201632969', 0x3838312d4449534b504152542e706466, 'application/pdf'),
(23, 'TESI201632969', 0x3331372d, 'application/pdf'),
(24, 'TESI201632969', 0x35302d54342d30312d454e2d313730312d31352e706466, 'application/pdf'),
(25, 'TESI201632969', 0x372d54342d30322d4d432d313730312d31352e706466, 'application/pdf'),
(26, 'TESI201632969', 0x3132362d54332d30312d454e2d313730312d31352e706466, 'application/pdf'),
(27, 'TESI201632969', 0x3635322d54342d30312d454e2d313730312d31352e706466, 'application/pdf'),
(28, 'TESI201632969', 0x3836342d54342d30332d45582d313730312d31352e706466, 'application/pdf'),
(29, 'TESI201632969', 0x35382d54332d30322d4d432d313730312d31352e706466, 'application/pdf'),
(30, 'TESI201632969', 0x3535362d, 'application/pdf'),
(31, 'TESI201632969', 0x3635372d, 'application/pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incoporacion`
--

CREATE TABLE `incoporacion` (
  `id` int(10) NOT NULL,
  `matricula` int(10) NOT NULL,
  `nombre_alumno` varchar(100) NOT NULL,
  `nombre_ue` varchar(100) NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `semestre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incoporacion`
--

INSERT INTO `incoporacion` (`id`, `matricula`, `nombre_alumno`, `nombre_ue`, `carrera`, `fecha`, `semestre`) VALUES
(1, 20163215, 'Laura Ramos Gonzalez', 'Ramiro Huerta', 'Ing. Sistemas Computacionales', '2021-06-11', 'Octavo'),
(3, 201632969, 'Giovanni Perez Martinez', 'Jose Ramirez Ruiz', 'Ing. Sistemas Computacionales', '2021-05-12', 'Septimo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padron`
--

CREATE TABLE `padron` (
  `id` int(10) NOT NULL,
  `matricula` int(10) NOT NULL,
  `Nombre_p` varchar(100) NOT NULL,
  `programa` varchar(100) NOT NULL,
  `resultado` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `estatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `padron`
--

INSERT INTO `padron` (`id`, `matricula`, `Nombre_p`, `programa`, `resultado`, `fecha`, `carrera`, `estatus`) VALUES
(13, 201632969, 'Giovanni Perez Ibarra', 'BIO 111', 'R', '2021-02-26', 'Ing. Biomedica', 'Dual'),
(14, 201632914, 'Laura Ramos Gonzalez', 'INF 111', 'R', '2021-02-26', 'Ing. Informatica', 'Dual'),
(15, 201632061, 'Tokihatl Genaro Laguna Castro', 'ISC 111', 'R', '2021-02-26', 'Ing. Sistemas Computacionales', 'Dual'),
(17, 201632915, 'Maryana Martinez Jimenez', 'ARQ 120', 'AR', '2021-02-27', 'Lic. Arquitectura', 'Dual'),
(18, 201732444, 'Gabriela Aislinn Cuevas', 'ADM 123', 'AR', '2021-02-26', 'Lic. Administracion', 'Egresado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportesaceptados`
--

CREATE TABLE `reportesaceptados` (
  `id_reporte` int(11) NOT NULL,
  `matricula` int(10) NOT NULL,
  `carrera` varchar(100) NOT NULL,
  `archivo` mediumblob NOT NULL,
  `extension` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reportesaceptados`
--

INSERT INTO `reportesaceptados` (`id_reporte`, `matricula`, `carrera`, `archivo`, `extension`) VALUES
(1, 201632333, 'ING. EN SISTEMAS', 0x7265706f7274652d3230313633323333332d3237322d54342d30332d45582d313730312d31352e706466, 'application/pdf'),
(2, 201632333, 'LIC. EN ARQUITECTURA', 0x7265706f7274652d3230313633323333332d3438302d54342d30322d4d432d313730312d31352e706466, 'application/pdf'),
(3, 201732444, 'LIC. EN ADMINISTRACION', 0x7265706f7274652d3230313633323936392d3433342d54332d30312d454e2d313730312d31352e706466, 'application/pdf'),
(4, 201632969, 'ING. AMBIENTAL', 0x7265706f7274652d3230313633323936392d3839362d54332d30322d4d432d313730312d31352e706466, 'application/pdf'),
(5, 201632915, 'ING. BIOMEDICA', 0x7265706f7274652d3230313633323931352d3736392d6b6172646578206e6f76656e6f2e706466, 'application/pdf'),
(6, 201632915, 'ING. EN SISTEMAS', 0x7265706f7274652d3230313633323931352d3737382d6b6172646578206e6f76656e6f2e706466, 'application/pdf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnoempresa`
--
ALTER TABLE `alumnoempresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `archivosaceptados`
--
ALTER TABLE `archivosaceptados`
  ADD PRIMARY KEY (`id_aceptados`);

--
-- Indices de la tabla `archivosalumnos`
--
ALTER TABLE `archivosalumnos`
  ADD PRIMARY KEY (`id_archivos`);

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compemp`
--
ALTER TABLE `compemp`
  ADD PRIMARY KEY (`id_archivo`);

--
-- Indices de la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `asociacion` (`asociacion`);

--
-- Indices de la tabla `datosalumnos`
--
ALTER TABLE `datosalumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `datosdivision`
--
ALTER TABLE `datosdivision`
  ADD PRIMARY KEY (`id_division`);

--
-- Indices de la tabla `datosempresas`
--
ALTER TABLE `datosempresas`
  ADD PRIMARY KEY (`id_due`),
  ADD UNIQUE KEY `rfc` (`rfc`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `datostutores`
--
ALTER TABLE `datostutores`
  ADD PRIMARY KEY (`id_dtutor`),
  ADD UNIQUE KEY `id_trabajador` (`id_trabajador`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `datosvinculacion`
--
ALTER TABLE `datosvinculacion`
  ADD PRIMARY KEY (`id_vinculacion`);

--
-- Indices de la tabla `documentosconvenio`
--
ALTER TABLE `documentosconvenio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incoporacion`
--
ALTER TABLE `incoporacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `padron`
--
ALTER TABLE `padron`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Nombre_p` (`Nombre_p`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- Indices de la tabla `reportesaceptados`
--
ALTER TABLE `reportesaceptados`
  ADD PRIMARY KEY (`id_reporte`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnoempresa`
--
ALTER TABLE `alumnoempresa`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `archivosaceptados`
--
ALTER TABLE `archivosaceptados`
  MODIFY `id_aceptados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `archivosalumnos`
--
ALTER TABLE `archivosalumnos`
  MODIFY `id_archivos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id_asignacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `compemp`
--
ALTER TABLE `compemp`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `convenios`
--
ALTER TABLE `convenios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `datosalumnos`
--
ALTER TABLE `datosalumnos`
  MODIFY `id_alumno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `datosdivision`
--
ALTER TABLE `datosdivision`
  MODIFY `id_division` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `datosempresas`
--
ALTER TABLE `datosempresas`
  MODIFY `id_due` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `datostutores`
--
ALTER TABLE `datostutores`
  MODIFY `id_dtutor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `datosvinculacion`
--
ALTER TABLE `datosvinculacion`
  MODIFY `id_vinculacion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `documentosconvenio`
--
ALTER TABLE `documentosconvenio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `incoporacion`
--
ALTER TABLE `incoporacion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `padron`
--
ALTER TABLE `padron`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `reportesaceptados`
--
ALTER TABLE `reportesaceptados`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
