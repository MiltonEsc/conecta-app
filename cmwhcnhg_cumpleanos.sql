-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-06-2025 a las 15:22:31
-- Versión del servidor: 10.11.13-MariaDB-cll-lve
-- Versión de PHP: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cmwhcnhg_cumpleanos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ban-correo`
--

CREATE TABLE `ban-correo` (
  `ban-id` int(11) NOT NULL,
  `ban-autor` int(11) NOT NULL,
  `ban-nombre` int(11) NOT NULL,
  `ban-descripcion` int(11) NOT NULL,
  `ban-contenido` int(11) NOT NULL,
  `ban-fecha-creacion` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(111) NOT NULL,
  `nombres` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `cargo` varchar(150) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `exten` varchar(45) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `departamento` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombres`, `fecha_nacimiento`, `cargo`, `correo`, `exten`, `foto`, `departamento`, `fecha_ingreso`, `estado`) VALUES
(1, 'Ingrid Perez Morron', '1961-01-04', 'Director administrativo del Talento Humano', 'ingrid@superbrix.com', '701', 'Ingrid-Perez.png', 'Talento Humano', '0000-00-00', 0),
(2, 'Jennifer Paola Mercado Liduena', '1995-01-07', 'Coordinadora de Abastecimiento', 'jennifer@superbrix.com', '800', 'Jennifer-Mercado.png', 'Abastecimiento', '0000-00-00', 1),
(3, 'Michael Andres Perez Cueto', '1994-01-11', 'Auxiliar de despacho', 'michael.9411@hotmail.com', '', 'Mitchel-Perez.png', 'Logistica y Comercio Exterior', '0000-00-00', 0),
(6, 'Cristian  Gutierrez De La Rosa', '1974-01-17', 'Soldador taller ensamble 1', 'cristiangutierrez1920@gmail.com', '', 'Cristian-Gutierrez.png', 'Manufactura', '0000-00-00', 1),
(7, 'Nicolas  Vicentini Lopez', '2003-01-21', 'Auxiliar Administrativo', 'nicolasv@superbrix.com', '', 'Nicolas-Vicentini-Financiero.png', 'Financiero', '0000-00-00', 1),
(8, 'Hernes Octavio Arevalo Morales', '1969-01-24', 'Jefe de Diseño Gestion Comercial', 'Hernes@superbrix.com', '', 'Hernes Arevalo.png', 'Comercial', '0000-00-00', 1),
(9, 'Fredy Jose De Avila Borrero', '1973-01-28', 'Pintor', 'deavilab@hotmail.com', '', 'Fredy-de-avila.png', 'Manufactura', '0000-00-00', 1),
(10, 'Jorge Luis Charris Guette', '1965-11-11', 'Director de bienestar laboral', 'jorgec@superbrix.com', '702', 'Jorge-Charris.png', 'Talento Humano', '1987-01-10', 1),
(11, 'Ricardo Martin Ghisays Galindo', '1966-02-03', 'Presidente Comercial Y Tecnologia', 'ricardo@superbrix.com', '200', 'Ricardo-Ghisays.png', 'Presidencia', '0000-00-00', 1),
(12, 'Jose Armando Otero Sanchez', '1998-02-08', 'Auxiliar de contabilidad', 'joseot@superbrix.com', '403', 'Jose-Otero.png', 'Financiero', '0000-00-00', 0),
(13, 'Guisselle Rosiris Polo Argel', '1987-02-14', 'Gerente de Diseño e Ingenieria', 'guissellep@superbrix.com', '501', 'Giselle-Polo.png', ' Diseño e Ingenieria', '0000-00-00', 1),
(14, 'Edgardo  Herrera Garcia', '1963-02-16', 'Armador taller ensamble 2', 'edgardoherreragarcia@hotmail.com', '', 'Edgardo-Herrera.png', 'Manufactura', '0000-00-00', 0),
(15, 'Arnoldo Enrique Arnedo Montiel', '1960-02-19', 'Soldador taller ensamble 1', '', '', 'Arnoldo-Arnedo.png', 'Manufactura', '0000-00-00', 0),
(16, 'Jaime  Castrillon Morales', '1965-02-20', 'Director de Manufactura', 'jaime@superbrix.com', '720', 'Jaime-Castrillon.png', 'Manufactura', '0000-00-00', 1),
(17, 'Pablo Andres Jimenez Ferreira', '1990-02-24', 'Coordinador soporte tecnico TIC', 'pablo@superbrix.com', '711', 'Pablo-Jimenez.png', 'TIC', '0000-00-00', 0),
(18, 'Edwin Enrique Acosta Fuentes', '2001-02-27', 'Coordinador de Estandarizacion', 'edwinac@superbrix.com', '500', 'Edwin-Acosta-Diseño.png', 'Diseño e Ingenieria', '2022-06-01', 1),
(19, 'Gertrudis  Jimenez Hernandez', '1968-02-28', 'Auxiliar casino', 'jimenezruizgeltrudis@gmail.com', '', 'Gertrudis.png', 'Talento Humano', '0000-00-00', 1),
(20, 'Jefer David Ortiz Castaneda', '2001-03-06', 'Practicante soldador', '', '', 'Jefer-Ortiz-Manufactura.png', 'Manufactura', '0000-00-00', 0),
(21, 'Arnold Rafael Figueroa Cassiani', '1988-03-07', 'Coor. de mejoras y estandares del producto', 'arnold@superbrix.com', '502', 'Arnold-Figueroa.png', 'Diseño e Ingenieria', '0000-00-00', 0),
(22, 'Yuly Alexsandra Bustos Ruiz', '1974-03-07', 'Gerente Financiero', 'yuly@superbrix.com', '401', 'Yuly-Bustos.png', 'Financiero', '0000-00-00', 1),
(23, 'Juan Carlos Aguilar Manotas', '1978-03-10', 'Jefe de Despacho', 'juan@superbrix.com', '303', 'Juan-Aguilar.png', 'Logistica y Comercio Exterior', '0000-00-00', 1),
(24, 'Orlando Barros Pacheco', '1969-03-10', 'Director de Innovacion', 'orlando@superbrix.com', '', 'Orlando-Barros-Pacheco.png', 'Diseño e Ingenieria', '0000-00-00', 1),
(25, 'Jorge Eliecer De La Hoz Garcia', '1960-03-12', 'Mensajero', 'kendry85@hotmail.com', '', 'Jorge-de-la-Hoz.png', 'Talento Humano', '0000-00-00', 0),
(26, 'Ivan De Jesus Mejia Morron', '1967-03-23', 'Tecnico en Montaje', 'imejia-sb@hotmail.com', '', 'Ivan-Mejia.png', 'Diseño e Ingenieria', '0000-00-00', 1),
(27, 'Norberto Acosta Arzuza', '1977-03-23', 'Conductor Montacarga', 'nolberto.acosta.arzuza@gmail.com', '', 'Norberto-Acosta.png', 'Logistica y Comercio Exterior', '0000-00-00', 1),
(28, 'Marlon  Rodelo Polo', '1989-04-12', 'Pintor', 'marlonrodelo@gmail.com', '', 'Marlon-Rodelo.png', 'Manufactura', '0000-00-00', 0),
(29, 'Manuel Enrique Dominguez Marquez', '1966-04-17', 'Armador taller ensamble 1', 'manueldominguez417@hotmail.com', '', 'Manuel-Dominguez.png', 'Manufactura', '0000-00-00', 1),
(30, 'Johana Cristina Coronado Pimentel', '1986-04-18', 'Auxiliar de oficios varios', 'johanacoronado587@gmail.com', '', 'Johana-Coronado.png', 'Talento Humano', '0000-00-00', 1),
(31, 'Jorge Enrique Duran Barrera', '1965-04-20', 'Auxiliar De Almacen', 'duranbarreraj97@gmail.com', '', 'Jorge-Duran.png', 'Abastecimiento', '0000-00-00', 1),
(32, 'Alexander  Jimenez Marquez', '1989-04-24', 'Dir. De Proyectos, Estandarizacion y mejoras', 'alexander@superbrix.com', '602', 'Alex-Jimenez.png', 'Diseño e Ingenieria', '0000-00-00', 0),
(33, 'Fidel  Castillo Vasquez', '1980-04-24', 'Soldador taller ensamble 2', 'fidelcastillo0011@gmail.com', '', 'Fidel-Castillo.png', 'Manufactura', '0000-00-00', 1),
(34, 'Carlos Andres Olivo Cantillo', '1993-05-02', 'Diseñador de Innovacion', 'carloso@superbrix.com', '', 'Carlos-Olivo-DiseÃ±o.png', 'Diseño e Ingenieria', '0000-00-00', 0),
(35, 'Milton David Escorcia Miranda', '2000-05-04', 'Coordinador TIC', 'milton@superbrix.com', '710', 'Milton Escorcia.png', 'TIC', '2021-07-01', 1),
(36, 'Alvaro Luis Serrano Estrada', '1966-05-18', 'Jefe Taller Pintura', 'alvaros@superbrix.com', '', 'Alvaro-Serrano.png', 'Manufactura', '1993-01-12', 1),
(37, 'Roger Jesus Pinzon Chica', '1984-05-28', 'Gerente General', 'roger@superbrix.com', '300', 'Roger-Pinzon.png', 'Gerencia General', '0000-00-00', 1),
(38, 'Carmen Elena Rebolledo Rudas', '1966-06-09', 'Asistente Administrativo', 'carmen@superbrix.com', '700', 'Carmen-Rebolledo.png', 'Talento Humano', '0000-00-00', 0),
(39, 'Jairo Antonio Rios Ceballos', '1959-06-14', 'Jefe Taller Ensamble 2', 'jairo@superbrix.com', '', 'Jairo-Rios.png', 'Manufactura', '0000-00-00', 1),
(41, 'Andres Felipe Aldana Rico', '1983-06-20', 'Asesor Tecnico', 'tecnologia@superbrix.com', '503', 'Andres-Aldana.png', 'Comercial', '0000-00-00', 0),
(42, 'Walter Vicente Mora Romero', '1968-06-24', 'Auxiliar de oficios varios', 'moraromerowaro@gmail.com', '', 'Walter.png', 'Talento Humano', '0000-00-00', 1),
(43, 'Neiffi De Jesus Diaz Barreto', '1984-06-28', 'Director de atencion de quejas y reclamos PQRS', 'neiffi@superbrix.com', '203', 'Neiffi-Diaz.png', 'Diseño e Ingenieria', '0000-00-00', 0),
(44, 'Jhon Jairo Marin Uribe', '1977-07-03', 'Operador boshert taller CNC', 'jhon-marin04@hotmail.com', '', 'Jhon-Marin.png', 'Manufactura', '0000-00-00', 1),
(45, 'Jaime Antonio Olmos Barros', '1960-07-08', 'Armador taller ensamble 2', 'jaime.olmosbarros@gmail.com', '', 'Jaime-Olmos.png', 'Manufactura', '0000-00-00', 0),
(46, 'Karen Margarita Thomas Babilonia', '1985-07-08', 'Coordinador de operaciones logisticas', 'karen@superbrix.com', '304', 'karen-Thomas.png', 'Logistica y Comercio Exterior', '0000-00-00', 1),
(47, 'Leunam Andres Perez Marin', '1992-07-20', 'Auxiliar De Despacho', 'leunamandres92@hotmail.com', '', 'leunam_perez.jpg', 'Logistica y Comercio Exterior', '0000-00-00', 1),
(48, 'Hernan Manuel Villarreal Viloria', '1961-07-31', 'Soldador taller ensamble 1', 'hevi61@hotmail.com', '', 'Hernan-Villareal.png', 'Manufactura', '0000-00-00', 0),
(49, 'Milton Antonio Lobo Cano', '2000-08-02', 'Pintor', '', '', 'Milton-Lobo.png', 'Manufactura', '0000-00-00', 0),
(50, 'Estifer David Fuentes Zuniga', '1994-08-05', 'Asistente de costos', 'estiferf@superbrix.com', '420', 'Stifer-Fuentes.png', 'Financiero', '0000-00-00', 1),
(51, 'Alvaro Adolfo Moscoso Montes', '1966-08-10', 'Soldador taller ensamble 2', 'alvaromoscoso1966@hotmail.com', '', 'alvaro_moscoso.png', 'Manufactura', '0000-00-00', 1),
(52, 'Sugei Patricia Guette Cantillo', '1989-08-13', 'Asistente de casino', 'sugeycantillo5@gmail.com', '', 'Sugei-Guette.png', 'Talento Humano', '0000-00-00', 1),
(53, 'Gilberto Antonio Perez Granados', '1962-08-14', 'Operador cizalla taller CNC', 'gperezgranados@gmail.com', '', 'Gilberto-Perez.png', 'Manufactura', '0000-00-00', 0),
(54, 'Jorge Antonio Martinez Patino', '1966-08-14', 'Coordinador de ensamble mecanico', 'jorgeantoniomartinezpatino261@gmail.com', '', 'Jorge-martinez.png', 'Manufactura', '0000-00-00', 1),
(55, 'Jorge Antonio Zarco Gutierrez', '1976-08-16', 'Auxiliar de oficios varios', 'jorgezarco027@gmail.com', '', 'Jorge-Zarco.png', 'Talento Humano', '0000-00-00', 1),
(56, 'Luz Helena Pacheco Rodriguez', '1979-08-16', 'Director de comercio exterior', 'luz-elena@superbrix.com', '302', 'Luz-E.-Pacheco.png', 'Logistica y Comercio Exterior', '0000-00-00', 1),
(57, 'David Manuel Ghisays Varela', '1966-08-17', 'Presidente Administrativo Y Financiero', 'david@superbrix.com', '400', 'David-Ghisays_PP.png', 'Presidencia', '0000-00-00', 1),
(58, 'Jorge Alberto Rivera Molinares', '1976-08-27', 'Director de Implementaciones', 'jorgerivera@superbrix.com', '', 'JorgeRivera.png', 'Gerencia Financiera', '0000-00-00', 1),
(59, 'Octavio  Navas Villarreal', '1960-09-05', 'Operador dobladora taller CNC', 'octavionavas1960@hotmail.com', '', 'Octavio-Navas.png', 'Manufactura', '0000-00-00', 0),
(60, 'Leonardo  Carvajal Galindo', '1977-09-06', 'Gerente comercial administrativo', 'leonardo@superbrix.com', '601', 'Leonardo-Carvajal.png', 'Comercial', '0000-00-00', 1),
(61, 'Yhan Carlos Diaz Beleno', '1992-09-07', 'Director de Contabilidad', 'yhan@superbrix.com', '', 'yhan.png', 'Financiero', '0000-00-00', 1),
(62, 'Javier Eduardo Amin Hernandez', '1969-09-08', 'Gerente Logistica Y Comercio Exterior', 'javier@superbrix.com', '301', 'Javier-Amin.png', 'Logistica y Comercio Exterior', '0000-00-00', 1),
(63, 'Jose Inocente Robles Gutierrez', '1962-09-10', 'Soldador Taller Ensamble 1', 'jose_2014gutierrez@hotmail.com', '', 'Jose-Robles.jpeg', 'Manufactura', '0000-00-00', 0),
(64, 'Lisbeth  Meriño Sanjuan', '1987-09-10', 'Gerente de Abastecimiento', 'lisbeth@superbrix.com', '803', 'Lisbeth-Merino.png', 'Abastecimiento', '0000-00-00', 1),
(65, 'Nicolas Florentino Jaraba Trujillo', '1962-09-11', 'Director de Abastecimiento', 'nicolas@superbrix.com', '802', 'Nicolas-Jaraba.png', 'Abastecimiento', '0000-00-00', 1),
(66, 'Lorena Del Carmen Fernandez Mercado', '1989-09-15', 'Directora de Estrategia y Costos', 'lorenaf@Superbrix.com', '420', 'Lorena-Fernandez.png', 'Financiero', '0000-00-00', 1),
(67, 'Adoney  Bravo Feria', '1985-09-16', 'Dir. servicios tecnicos y atencion al cliente', 'adoney@superbrix.com', '504', 'Adoney-Bravo.png', 'Diseño e Ingenieria', '0000-00-00', 0),
(68, 'Jaime Alberto Chegwin Mora', '1969-09-21', 'Jefe taller ensamble 1', 'jaimech@superbrix.com', '', 'Jaime-Chegwin.png', 'Manufactura', '0000-00-00', 1),
(69, 'Antonio Luis Cabrera Monroy', '1968-09-22', 'Operador dobladora taller CNC', 'antoniocabrera1022@gmail.com', '', 'Antonio-Cabrera.png', 'Manufactura', '0000-00-00', 1),
(70, 'Georgio Efren Palma Rodriguez', '1995-09-26', 'Operador boshert taller CNC', 'yoryopalma10@hotmail.com', '', 'Georgio-Palma.png', 'Manufactura', '0000-00-00', 0),
(71, 'Didier Rafael Manga Rosales', '1963-10-03', 'Mensajero', 'didier.mangarosales@gmail.com', '', 'Didier-Manga.png', 'Talento Humano', '0000-00-00', 1),
(72, 'Veronica  Cantillo Jimenez', '1973-10-03', 'Jefe de Casino', 'polijusan@hotmail.com', '', 'Veronica.png', 'Talento Humano', '0000-00-00', 1),
(73, 'Yuranis Maria Barros Nieto', '1982-10-07', 'Director de desarrollo de derramientas TIC', 'yuranis@superbrix.com', '710', 'Yuranis-Barros.png', 'TIC', '2010-12-12', 0),
(74, 'Luis Enrique Coronado Pacheco', '1992-10-20', 'Diseñador de equipos estandares', 'luisc@superbrix.com', '', 'Luis-Carlos-Coronado.png', 'Diseño e Ingenieria', '0000-00-00', 0),
(75, 'Ana Maria Barbosa Barrios', '1970-10-27', 'Director de Impuestos ', 'ana@superbrix.com', '402', 'Ana-Barbosa.png', 'Financiero', '0000-00-00', 1),
(76, 'Oscar Emilio Escobar Ruiz', '1960-11-02', 'Soldador taller ensamble 1', 'oscarescobarruiz60@gmail.com', '', 'Oscar-Escobar.png', 'Manufactura', '0000-00-00', 0),
(77, 'Jose Miguel Osorio Fontalvo', '1961-11-06', 'Soldador taller ensamble 1', 'josemiguelosriof@gmail.com', '', 'Jose-Osorio.png', 'Manufactura', '0000-00-00', 0),
(78, 'Jorge Luis Charris Guitierrez', '1991-02-03', 'Coor. aseguramiento de la calidad del producto', 'acp@superbrix.com', '603', 'Jorge-Charris-jr.png', 'Sistema de gestion de calidad-SGC', '2011-01-17', 1),
(79, 'Jose Miguel Niebles Castro', '1963-11-18', 'Armador taller ensamble 1', 'jnieblesi23@gmail.com', '', 'Jose-Niebles.png', 'Manufactura', '0000-00-00', 1),
(80, 'Jose Antonio Arroyo Aragon', '1975-11-20', 'Jefe de taller CNC', 'jose@superbrix.com', '', 'jose-arroyo.png', 'Manufactura', '0000-00-00', 1),
(82, 'Luis Carlos Avendaño Lambertino', '1986-11-27', 'Pintor', 'avendaoluis@outlook.es', '', 'Leunam-Perez.png', 'Manufactura', '0000-00-00', 1),
(83, 'Marlene  Mozo Orozco', '1965-11-30', 'Asistente de tesoreria', 'tesoreria@superbrix.com', '410', 'Marlene-Mozo.png', 'Financiero', '0000-00-00', 1),
(85, 'Ronald  Vasquez Perez', '1983-12-12', 'Conductor camion', 'ronaldqvas@hotmail.com', '', 'Ronald-Vasquez.png', 'Logistica y Comercio Exterior', '0000-00-00', 0),
(86, 'Edinson De Jesus Zambrano Barrios', '1964-12-17', 'Soldador taller ensamble 2', 'edinsonzambrano189@gmail.com', '', 'Edinson-Zambrano.png', 'Manufactura', '0000-00-00', 1),
(87, 'Clodomiro Antonio Ariza Diaz', '1957-12-20', 'Soldador taller ensamble 1', 'ariza-57@hotmail.com', '', 'Clodomiro-Ariza.png', 'Manufactura', '0000-00-00', 1),
(88, 'Dainer De Jesus Perez Martinez', '1979-12-22', 'Jefe Taller Ensamble 1', 'dainer_22@hotmail.com', '', 'Dainer-Perez.png', 'Manufactura', '0000-00-00', 1),
(89, 'Robinson Carlos Bernal Obregon', '1962-12-29', 'Soldador taller ensamble 1', 'erikariz-2010@outlook.com', '', 'Robinson-Bernal.png', 'Manufactura', '0000-00-00', 1),
(90, 'Jorge Enrique Soto Herrera', '1959-12-31', 'Mecanico taller ensamble 1', '', '', 'Jorge-Soto.png', 'Manufactura', '0000-00-00', 0),
(91, 'Antonio Giacometto Cheij', '1995-01-16', 'Director de gestion tecnica comercial', 'presupuestacion@superbrix.com', '', 'Antonio-Giancometto.png', 'Comercial', '0000-00-00', 0),
(92, 'Sofia Zabala Atehortua', '1999-01-22', 'Aux. costo', 'sofia@superbrix.com', '', 'Sofia-Zabala.png', 'Financiero', '0000-00-00', 0),
(93, 'Yosimar Rene Arcon Potes', '1992-07-06', 'Coordinador operativo de Almacen', 'almacen@superbrix.com', '804', 'Yosimar-Arcon.png', 'Abastecimiento', '0000-00-00', 1),
(106, 'Jesus Manuel Barrios Gutierrez', '2001-03-05', 'Asistente de Marketing', 'practicante_marketing@superbrix.com', '', 'Jesus-Barrios.png', 'Comercial', '0000-00-00', 1),
(107, 'Kevin Francisco Arcon Aguas', '1996-07-20', 'Mecanico taller ensamble 1', 'kevinarcon51@gmail.com', '', 'Kevin-Arcon-Manufactura.png', 'Manufactura', '0000-00-00', 1),
(108, 'Jesus Alfonso Osorio Celis', '1996-07-15', 'Aux. de soldadura taller ensamble 2', 'jesusosoriocelis15@gmail.com', '', 'Jesus-osorio-manufactura.png', 'Manufactura', '0000-00-00', 1),
(109, 'Yoseff Antonio Ghisays Beltran', '1995-01-31', 'Director comercial administrativo', 'yoseff@superbrix.com', '', 'Yoseff-Ghisays.png', 'Comercial', '0000-00-00', 1),
(111, 'SuperBrix', '1960-11-03', 'General', 'info@superbrix.com', '', 'LG-SB.png', 'General', '0000-00-00', 0),
(112, 'Heider Manuel Rivera Acosta', '1994-10-24', 'Operador CNC', '', '', 'Heider-Rivera.png', 'Manufactura', '0000-00-00', 0),
(113, 'Martha Galvan Melendez', '1983-08-18', 'Coordinador de SST', 'saludocupacional@superbrix.com', '', 'Martha-Galvan.png', 'Talento Humano', '0000-00-00', 0),
(114, 'Juan Camilo Gaviria Restrepo', '1976-01-24', 'VP Comercial', 'juancamilo@superbrix.com', '', 'Juan-Gaviria.png', 'Comercial', '0000-00-00', 1),
(115, 'Wilson Zapata Fernandez', '1968-11-09', 'VP Comercial', 'wilson@superbrix.com', '', 'Wilson-Zapata.png', 'Comercial', '0000-00-00', 0),
(116, 'Javier Briceño', '1966-08-19', 'VP Comercial', 'javierb@superbrix.com', '', 'Javier-Briceño.png', 'Comercial', '0000-00-00', 1),
(117, 'Jaime Arango Cardona', '1951-03-28', 'Asesor Tecnico', 'jarango-sb@hotmail.com', '', 'Jaime-Arango.png', 'Diseño e Ingenieria', '0000-00-00', 0),
(118, 'Wiliam Rico', '1970-03-20', 'Coordinador de mantenimiento', 'mantenimiento.superbrix@gmail.com', '', 'William-Rico.png', 'Manufactura', '0000-00-00', 0),
(119, 'Gisell Patricia Pinedo Castro', '1997-07-25', 'Coordinador de Diseño e Ingenieria', 'gisell@superbrix.com', '', 'Giselle-Pinedo.png', 'Diseño e Ingenieria', '0000-00-00', 1),
(120, 'Harold Valverde Menco', '1989-12-02', 'Diseñador', 'haroldv@superbrix.com', '', 'Harold-Valverde.png', 'Diseño e Ingenieria', '0000-00-00', 0),
(121, 'Jennifer Pacheco', '1998-11-10', 'Asistente de diseño grafico', '', '', '', 'Comercial', '0000-00-00', 0),
(122, 'Miguel Gonzalez Jimenez', '1998-05-15', 'Diseñador', 'miguel@superbrix.com', '', 'Miguel-Gonzalez-DiseÃ±o.png', 'Diseño e Ingenieria', '0000-00-00', 0),
(123, 'Hernando Martinez', '1968-04-29', 'VP Comercial', 'hernando@superbrix.com', '', 'Hernando-Martinez.png', 'Comercial', '0000-00-00', 1),
(124, 'Omaira Silva Llanos', '1963-12-02', 'Director de Contabilidad', 'omaira@superbrix.com', '404', 'Omaira-Silva.png', 'Financiero', '0000-00-00', 0),
(125, 'Walter Garizabalo Guatindioy', '1988-11-21', 'Soldador taller ensamble 2', 'walterenriquegg@outlook.com', '', 'Walter-Garizabalo.png', 'Manufactura', '2021-11-18', 1),
(135, 'Miguel Angel Gonzalez Barros', '2002-09-05', 'Diseñador', 'migue0509gonza@gmail.com', '', 'Miguel-Gonzales Barros.png', 'Diseño e Ingenieria', '2021-11-24', 0),
(136, 'COMUNICADO', '2021-12-03', 'COMUNICADO', '', '', '', 'COMUNICADO', '2021-12-03', 0),
(137, 'Julian Jose Zaher Zapata', '1997-06-04', 'Analista de costos', 'julian@superbrix.com', '', 'JULIAN ZAHER ZAPATA.png', 'Financiero', '2021-11-10', 0),
(138, 'Vacante', '2021-12-13', 'vacante', '', '', '', 'vacante', '2021-12-05', 0),
(139, 'Yair Enrique Cabrera Mendoza', '1986-11-20', 'Auxiliar De Pintura', 'jcabrera_8620@hotmail.com', '', 'Yair-Cabrera.png', 'Manufactura', '2021-12-14', 0),
(140, 'Keivy Andres Gomez Gallegos', '2001-05-27', 'Operador Cortadora Laser', 'keyviandresg@gmail.com', '', 'Keivy-Gomez.png', 'MANUFACTURA - TALLER CNC', '2021-12-28', 1),
(141, 'Aldemar Jose Perez Cera', '2000-08-03', 'Soldador', 'perezaldemar402@gmail.com', '', 'Aldemar-Pérez.png', 'MANUFACTURA - ENSAMBLE II', '2021-12-28', 1),
(142, 'Hiran Eloy Guitierrez Acosta', '1998-06-13', 'Soldador', 'gutieloy13@gmail.com', '', 'Hiran-Gutierrez.png', 'MANUFACTURA - ENSAMBLE I', '2021-12-28', 1),
(143, 'Valerie Audeth Vargas Carbo', '1999-10-24', 'Coordinadora de contenido digital', 'valerie@superbrix.com', '', 'Valerie-Vargas.png', 'Comercial', '2022-01-12', 0),
(144, 'Rafael Felipe Diago Palacio', '1998-05-15', 'Coordinador de proyectos', 'rafael@superbrix.com', '', 'Rafael-Diago.png', 'Diseño e Ingenieria', '2022-01-27', 0),
(145, 'Daniella Carolina De Biase Mercado', '1991-10-17', 'Coor. Contenido Digital', 'daniella@superbrix.com', '', 'Daniela-Biase.png', 'Comercial', '2022-03-02', 0),
(146, 'Jeremys Jhoel Barros Catalan', '1998-07-13', 'Auxiliar de Almacén', 'Jeremys@superbrix.com', '', 'Yeremys Barros.png', 'Abastecimiento ', '2022-03-08', 1),
(147, 'Yosmery Ana Garcia Perez', '1987-02-19', 'Auxiliar de contabilidad', 'yosmery@superbrix.com', '', 'Yosmery Ana Garcia Perez.png', 'Financiero', '2022-04-21', 0),
(148, 'Alexander Marquez Padilla', '2001-04-26', 'Analista de costos', 'alexanderm@superbrix.com', '', 'ALEXANDER MARQUEZ PADILLA (1).png', 'Financiero', '2022-11-24', 1),
(149, 'Aldair Jose Ayala Monsalvo', '1992-08-15', 'Practicante De Ingeniera Y Diseño', 'diseno@superbrix.com', '', 'Aldair Ayala.png', 'Diseño e Ingenieria', '2022-06-08', 0),
(150, 'Jose Ricardo Zambrano Miraglia', '1999-06-07', 'Ing. Servicios Tecnicos', 'joser@superbrix.com', '', 'Jose Zambrano.png', 'Diseño e Ingenieria', '2022-07-05', 0),
(151, 'Carlos Manuel Noya Mora', '2001-07-13', 'Aprendiz Electromecanico', 'carlosnoya69@gmail.com', '', 'CARLOS MANUEL NOYA MORA.png', 'Manufactura', '2022-07-11', 0),
(152, 'Jorge Junior Puerta Tirado', '2001-06-16', 'Auxiliar de costos', 'jorgep@superbrix.com', '420', 'JORGE JUNIOR PUERTA TIRADO.png', 'Financiero', '2022-07-11', 0),
(153, 'Milagros Margarita Steel Cabrera', '1990-11-29', 'Coordinadora de SST', 'saludocupacional@superbrix.com', '', 'Milagro Steel Cabrera.png', 'Talento Humano', '2022-08-08', 0),
(154, 'Jhon Jairo sarmiento Fontalvo', '1990-08-25', 'Auxiliar de despacho', 'j.jsarmiento10@hotmail.com', '', 'Jhon Sarmiento.png', 'Logistica y Comercio Exterior', '2022-08-10', 1),
(155, 'Elin Junior Galan Acosta', '1999-04-16', 'Ing de Manufactura', 'elin@superbrix.com', '', 'Elin Galan.png', 'Manufactura', '2022-08-22', 0),
(156, 'Elin Junior Galan Acosta', '1999-04-16', 'Ing de Manufactura', '', '', '', 'Manufactura', '2022-08-22', 0),
(157, 'Sebastian Yadith Villa Lubo', '1999-09-13', 'Diseñador de equipos', 'sebastianv@superbrix.com', '', 'SEBASTIAN YADITH VILLA LUBO.png', 'Diseño e Ingenieria', '2022-09-01', 1),
(158, 'Walter Orlando Perez Crespo', '1993-04-24', 'Jefe de Diseño de Proyectos', 'walter@superbrix.com', '', 'WALTER ORLANDO PEREZ CRESPO.png', 'Gerencia de Proyectos', '2022-09-01', 1),
(159, 'Juan Camilo Sobrino Acosta', '2003-07-02', 'Auxiliar TIC', 'practicantetic@superbrix.com', '', 'JUAN CAMILO SOBRINO ACOSTA.png', 'TIC', '2022-11-16', 0),
(160, 'Yesid Alberto Sarabia Castro', '1977-12-28', 'Pintor', 'ysc.77@hotmail.com', '', 'YESID ALBERTO SARABIA CASTRO.png', 'Manufactura', '2022-12-13', 1),
(161, 'Walter de Jesus Campbell Teran ', '1996-01-07', 'Diseñador Junior', 'diseno@superbrix.com', '', 'WALTER DE JESUS CAMPBELL TERAN.png', 'Diseño e Ingenieria', '2022-01-11', 0),
(162, 'Yefry Manuel Angulo Villero', '2003-08-27', 'Practicate de archivos', 'auxarchivo@superbrix.com', '', 'JEFRY MANUEL ANGULO VILLERO.png', 'Financiero', '2022-12-19', 0),
(163, 'Jennifed Liseth Trigos Muñoz', '1999-09-19', 'Asistente de presupuestación', 'jennifed@superbrix.com', '', 'JENNIFED LISETH TRIGOS MUÑOZ.png', 'Comercial', '2023-07-17', 1),
(164, 'Camilo Andres Mejia Rodriguez', '2000-02-25', 'Aprendiz de Manufactura', 'practicante_manufactura@superbrix.com', '', 'CAMILO ANDRES MEJIA RODRIGUEZ.png', 'Manufactura', '2023-01-24', 0),
(165, 'Alberto Mario Florez Sojo', '1999-04-16', 'Director De Gestion Comercial', 'presupuestacion@superbrix.com', '', 'ALBERTO MARIO FLOREZ SOJO.png', 'Comercial', '2023-02-06', 0),
(166, 'Andres Felipe Saltarin Mareriaga', '2002-09-17', 'Operador CNC', 'asaltarinmarriaga@gmail.com', '', 'ANDRES FELIPE SALTARIN MARERIAGA.png', 'Manufactura', '2023-02-06', 1),
(167, 'Leonardo Acevedo Guerrero', '1983-12-09', 'Pintor', 'leonardoacevedo831209@gmail.com', '', 'LEONARDO ACEVEDO GUERRERO.png', 'Manufactura', '2023-02-06', 0),
(168, 'Richard Rafael Rojano Rodriguez', '1997-11-12', 'Soldador taller ensamble 2', 'richardrodriguez_1112@hotmail.com', '', 'RICHARD RAFAEL ROJANO RODRIGUEZ.png', 'Manufactura', '2023-02-02', 0),
(169, 'Kelly Johanna Robles Martinez', '1999-10-15', 'Profesional de Atención al Cliente', 'kellyr@superbrix.com', '', 'Kelly_Robles.png', 'Comercial', '2023-03-01', 1),
(170, 'Camilo Andres Jaraba Paternita', '2004-08-11', 'Aprendiz de Matenimiento de computo', 'practicantetic@superbrix.com', '', 'CAMILO ANDRES JARABA PATERNINA.png', 'TIC', '2023-05-16', 0),
(171, 'Rene de Jesus Arrieta Perez', '1989-05-07', 'Jefe de innovacion y mejoras del producto', 'rene@superbrix.com', '', 'RENE DE JESUS ARRIETA PEREZ.png', 'Diseño e Ingenieria', '2023-05-23', 1),
(172, 'Jimmy Alexander Amaya Valencia', '1994-11-19', 'Jefe de Aseguramiento de la Calidad', 'jimmy@superbrix.com', '', 'JIMMY ALEXANDER AMAYA VALENCIA.png', 'Calidad', '2023-05-25', 1),
(173, 'Dayler Steven Rodriguez Vides', '1997-09-17', 'Técnico de Servicios', 'dayler@superbrix.com', '', 'DAYLER STEVEN RODRIGUEZ VIDES.png', 'Servicios Técnicos ', '2023-06-07', 1),
(174, 'Shadde Castro Barliss', '1997-03-11', 'Coordinadora SST', 'saludocupacional@superbrix.com', '', 'Shadde Castro_PP.png', 'Talento Humano', '2023-06-14', 1),
(175, 'Rafael Jose Gutierrez Orozco', '2000-03-13', 'Jefe de mtto y Servicios electromecanicos', 'rafael@superbrix.com', '', 'RAFAEL JOSE GUTIERREZ OROZCO.png', 'Diseño e Ingenieria', '2023-06-14', 1),
(176, 'Jose Miguel Sanchez Visbal', '2001-06-09', 'Auxiliar de logistica y comercio exterior', 'joses@superbrix.com', '', 'JOSE MIGUEL SANCHEZ VISBAL.png', 'Logistica y Comercio Exterior', '2023-07-04', 0),
(177, 'Roger Eliecer Vanegas Chavez', '2003-07-22', 'APRENDIZ EN GESTION DE LA PRODUCTIVIDA', 'practicante_manufactura@superbrix.com', '', 'ROGER ELIECER VANEGAS CHAVEZ.png', 'Manufactura', '2023-07-17', 0),
(178, 'Daniel Elias Arce Salgado', '2002-03-04', 'Diseñador de proyectos', 'diseno@superbrix.com', '', 'DAVID ELIAS ARCE SALGADO.png', 'Diseño e Ingenieria', '2023-07-24', 1),
(179, 'Jimmy Augusto Linares Dominguez', '1972-10-22', 'Gerente de Talento Humano', 'jimmyl@superbrix.com', '', 'JIMMY AUGUSTO LINARES DOMINGUEZ.png', 'Talento Humano', '2023-07-25', 1),
(180, 'Randy Ric Ortega Guete', '1981-09-22', 'Pintor', '', '', 'RANDY RIC ORTEGA GUETE.png', 'Manufactura', '2023-08-01', 0),
(181, 'Rodrigo Andres Muños Cubas', '2002-02-27', 'Diseñador de proyectos', 'rodrigo@superbrix.com', '', 'RODRIGO ANDRES MUÑOZ CUBAS.png', 'Diseño e Ingenieria', '2023-08-16', 1),
(182, 'Jesus Junior Barcelo Ballestas', '1991-03-21', 'Soldador taller ensamble 2', '', '', 'JESUS JUNIOR BARCELO BALLESTAS.png', 'Manufactura', '2023-08-16', 0),
(183, 'prueba', '2023-08-24', 'prueba', 'prueba@superbrix.com', '', '', 'prueba', '2023-08-24', 0),
(184, 'Carlos Eduardo Martinez Mejia', '1997-03-11', 'Diseñador de Proyectos', 'carlosm@superbrix.com', '', 'CARLOS EDUARDO MARTINEZ MEJIA.png', 'Ingenieria y Diseño', '2023-08-28', 1),
(185, 'Hebert Enrique Cunna Ojeda', '1997-09-04', 'Coordinador de Proyecto', 'hebert@superbrix.com', '', 'HEBERT CUNNA.png', 'Diseño e Ingenieria', '2023-10-04', 1),
(186, 'Sergio Andres Prada Mendez', '1996-10-16', 'Jefe De Presupuesto', 'presupuestacion@superbrix.com', '', 'SERGIO ANDRES PRADA MENDEZ.png', 'Comercial', '2023-10-19', 1),
(187, 'Mario Alfonso Arteta Consuegra', '1992-09-28', 'Director de Servicio y ATC', 'mario@superbrix.com', '', 'Mario Alfonso Arteta Consuegrea.png', 'Comercial', '2023-11-10', 1),
(188, 'Alfonso Mario Escorcia Carrillo', '1995-12-04', 'Auxiliar De Almacen', 'alfonso@gmail.com', '3001135962', 'Alfonso Mario Escorcia Carrillo.png', 'Abastecimiento ', '2023-11-23', 0),
(189, 'Luz Daniela Rodriguez Meneses', '2004-12-24', 'Aprendiz Sena ', 'luzro03090@gmail.com', '', 'LUZ DANIELA RODRIGUEZ MENESES.png', 'Talento Humano', '2023-12-04', 0),
(190, 'Jorge Isaac Perez Torrez', '1973-02-22', 'Conductor', 'jorgepereztorrez72189@gmail.com', '', 'JORGE ISAAC PEREZ TORREZ.png', 'Despacho', '2024-01-24', 1),
(191, 'Wendy Milagros Rolon Torres', '2004-11-30', 'Aprendiz Abastecimiento', 'practicante_abastecimiento@superbrix.com', '', 'WENDY MILAGROS ROLON TORRES.png', 'Abastecimiento ', '2024-02-01', 0),
(192, 'Luis Fernando Fernandez Mercado', '1998-08-04', 'Auxiliar Tic', 'lfdz98@gmail.com', '', 'LUIS FERNANDO FERNANDEZ MERCADO.png', 'TIC', '2024-02-06', 1),
(193, 'Lyaan Jesus Acosta Alvarez', '2004-09-23', 'APRENDIZ SENA ENSAMBLE II', 'LYAANACOSTAALVAREZ@GMAIL.COM', '', 'LYAAN JESUS ACOSTA ALVAREZ.png', 'Manufactura - Ensamble II', '2024-02-16', 0),
(194, 'Deyana Patricia Chavez Reales', '1992-02-10', 'Ing Asistente Manufactura', 'practicante_manufactura@superbrix.com', '', 'DEYANA PATRICIA CHAVEZ REALES.png', 'Manufactura', '2024-02-16', 1),
(195, 'Jesus Junior Barcelo Ballestas', '1991-03-21', 'Soldador', 'jejubarceloba@gmail.com', '', 'JESUS JUNIOR BARCELO BALLESTAS.png', 'Manufactura - Ensamble II', '2024-03-12', 1),
(196, 'Jesus Manuel Hernandez Serrano', '1996-10-28', 'Auxiliar De Taller De Ensamble', 'jesherserr11@gmail.com', '', 'JESUS MANUEL HERNANDEZ SERRANO.png', 'Manufactura - Ensamble II', '2024-03-18', 1),
(197, 'Roberto Carlos Valencia Patiño\n', '1999-08-15', 'Practicante Universitario', 'auxcostos@superbrix.com', '', 'ROBERTO CARLOS VALENCIA PATIÑO (2).png', 'Financiero', '2024-04-01', 1),
(198, 'Jorgan Rafael Cano De La Rosa', '2000-07-13', 'Aprendiz Sena', 'jorjanc24@gmail.com', '3022651957', 'Jorgan Cano.png', 'Manufactura - Ensamble I', '2024-05-20', 0),
(199, 'Gina Marcela Arroyo Grrido', '2022-09-23', 'Ingeniera de servicios Junior', 'diseno@superbrix.com', '3017072892', 'GINA MARCELA ARROYO GARRIDO.png', 'Servicios Técnicos y Atención al Cliente', '2024-07-02', 1),
(200, 'Mauricio De Jesus Osorio Mercado', '2005-05-07', 'Aprendiz Sena - Soldador', 'mauricioosorio020@gmail.com', '3117085206', 'MAURICIO DE JESUS OSORIO MERCADO.png', 'Taller de ensamble II', '2024-07-02', 0),
(201, 'Deivis Omar Chavez Llorente', '1985-12-23', 'Pintor', 'deivischavez1234@gmail.com', '', 'DEIVIS OMAR CHAVEZ LLORENTE.png', 'Taller de Pintura', '2024-07-16', 1),
(202, 'Camilo Jose Donado Navarro', '2005-10-27', 'Aprendiz Sena ', 'practicante_abastecimiento@superbrix.com', '3244520001', 'ARNOLD RAFAEL FIGUEROA CASSIANI.png', 'Abastecimiento ', '2024-07-24', 0),
(203, 'Arnold Rafael Figueroa Cassiani', '1988-03-07', 'Diseñador De Anteproyectos', 'arnold@superbrix.com', '3045457388', 'ARNOLD RAFAEL FIGUEROA CASSIANI (1).png', 'Gestion Comercial', '2024-07-25', 1),
(204, 'Daniel Ortega Lopez', '1991-04-29', 'Coordinador de Proyecto', 'daniel@superbrix.com', '3205906609', 'DANIEL ORTEGA LOPEZ.png', 'Gerencia Administrativa', '2024-08-06', 1),
(205, 'Hasmed Camelo Perez', '2000-02-29', 'Aprendiz Sena ', 'practicantetic@superbrix.com', '3007618779', 'HASMED CAMELO PEREZ.png', 'TIC', '2024-08-12', 0),
(206, 'Jorge Alberto Torres Mendoza', '1984-01-29', 'Director de Proyectos', 'jorget@superbrix.com', '3006724711', 'JORGE ALBERTO TORRES MENDOZA.png', 'Gerencia de Proyectos', '2024-08-20', 1),
(207, 'Frank David Yepez Arias', '2005-04-20', 'Aprendiz Sena', 'yepezariasf@gmail.com', '3016472355', 'FRANK DAVID YEPEZ ARIAS.png', 'Manufactura - Mantenimiento', '2024-08-20', 0),
(208, 'Jessica Patricia Thomas Babilonia', '1990-07-26', 'Auxiliar de Logistica', 'jessica@superbrix.com', '', 'JESSICA PATRICIA THOMAS BABILONIA.png', 'Logistica y Comercio Exterior', '2024-09-02', 1),
(209, 'Jose David De La Hoz Cabrera', '2005-11-06', 'Aprendiz Sena - Electromecanica', 'jose.j1973@hotmail.com', '3001969456', 'JOSE DAVID DE LA HOZ CABRERA.png', 'Mantenimiento', '2024-09-16', 0),
(210, 'Yuset De Jesus Jimenez Villanueva', '2002-04-18', 'Operario Cizalla', 'yujimenezviz@gmail.com', '3023791358', 'YUSET DE JESUS JIMENEZ VILLANUEVA.png', 'TALLER CNC', '2024-09-16', 1),
(211, 'Enis Arzuza Silvera', '1991-04-28', 'Asistente Administrativo', 'info@superbrix.com', '', 'ENIS ARZUZA SILVERA.png', 'Talento Humano', '0004-10-01', 1),
(212, 'Abraham David Lewis Ghisays', '1997-12-18', 'Director de Proyectos', 'abraham@superbrix.com', '', 'ABRAHAM DAVID LEWIS GHISAYS.png', 'Gerencia de Proyectos y ATC', '2024-10-07', 1),
(213, 'Jose Eduardo Orozco Carrillo', '2005-07-14', 'Aprendiz Sena - Soldador', 'mioses623@gmail.com', '', 'JOSE EDUARDO CARRILLO OROZCO.png', 'Manufactura - Ensamble I', '2024-11-01', 0),
(214, 'Jorgan Rafael Cano De La Rosa', '2000-07-13', 'Soldador', 'jorjanc24@xn--gmail-oua.com', '', 'JORGAN RAFAEL CANO DE LA ROSA.png', 'Manufactura - Ensamble I', '2025-01-16', 1),
(215, 'Jose Noe Carpintero Ariza', '1992-12-09', 'Auxiliar Contable', 'cxp@superbrix.com', '3225358803', 'JOSE NOE CARPINTERO ARIZA.png', 'Gerencia Financiera', '2025-01-21', 0),
(216, 'Jose Manuel Dominguez Diaz', '1999-01-11', 'Operador De Cizalla CNC', 'josedominguezdiaz11@gmail.com', '3143687756', 'JOSE MANUEL DOMINGUEZ DIAZ.png', 'Manufactura', '2025-02-03', 1),
(217, 'Julio Cesar Onate Padilla', '2003-02-28', 'Practicante - Calidad', 'practicante_administrativo@superbrix.com', '3168751805', 'JULIO CESAR OÑATE PADILLA.png', 'Talento Humano', '2025-02-03', 1),
(218, 'Santiago De Jesus Bonette Mejia', '1995-10-24', 'Auxiliar Contable', 'cxp@superbrix.com', '', 'SANTIAGO DE JESUS BONETT MEJIA.png', 'Gerencia Financiera', '2025-02-25', 1),
(219, 'Frank David Yepez Arias', '2005-04-20', 'Auxiliar De Mantenimiento', 'yepezariasf@gmail.com', '3016472355', 'FRANK DAVID YEPEZ ARIAS.png', 'Mantenimiento', '2025-03-17', 1),
(220, 'Andres Felipe Martinez Carranza', '2003-02-24', 'Aprendiz TICS', 'anfemaca2003@gmail.com', '3007015518', 'ANDRES FELIPE MARTINEZ CARRANZA.png', 'TICS', '2025-03-17', 0),
(221, 'Yitson Andrés de la Hoz Rodríguez', '2006-10-04', 'Aprendiz Soldador', 'yitzondelahoz04@gmail.com', '', 'YITSON ANDRES DE LA HOZ RODRIGUEZ (1).png', 'MANUFACTURA - ENSAMBLE II', '2025-02-17', 1),
(222, 'Sebastian David Fontalvo Fruto', '2019-06-20', 'Parcticante Sena', 'sebastiandavidf@hotmail.com', '', 'SEBASTIAN DAVID FONTALVO FRUTO.png', 'Gerencia Financiera', '2025-02-06', 1),
(223, 'Joan Wilman Vargas Basilio', '1978-03-29', 'Tecnico de Servicios', 'jhowvb39@hotmail.com', '3002169099', 'JOAN WILMAN VARGAS BASILIO.png', 'Servicios Tecnicos ', '2025-04-04', 1),
(224, 'Yitzon Andres De La Hoz Rodriguez', '2006-10-04', 'Aprendiz Soldador', 'yitzondelahoz04@gmail.com', '3052726713', '', 'Manufactura', '2025-02-17', 0),
(225, 'Andres Felipe Martinez Carranza', '2003-02-24', 'Aprendiz Tics', 'practicantetic@superbrix.com', '3007015518', 'ANDRES FELIPE MARTINEZ CARRANZA.png', 'Tics', '2025-03-17', 1),
(226, 'Valentina Alvarez Julio', '2004-08-30', 'Aprendiz Abastecimiento', 'practicante_abastecimiento@superbrix.com', '3025440264', 'VALENTINA ALVAREZ JULIO.png', 'Abastecimiento', '2025-02-06', 1),
(227, 'Juan Esteban Lubo Vargas', '2004-04-10', 'Aprendiz De Mantenimiento Electromecanico', 'jlubovargas@gmail.com', '3024301955', 'JUAN ESTEBAN LUBO VARGAS.png', 'Mantenimiento', '2025-04-01', 1),
(228, 'Jose David De La Hoz Cabrera', '2005-11-06', 'Mecanico, Taller Ensamble 1', 'jose.j1973@hotmail.com', '3001969456', 'JOSE DAVID DE LA HOZ CABRERA.png', 'Manufactura', '2025-04-21', 1),
(229, 'Liz Dayanis Arroyo Mora', '2001-09-21', 'Auxiliar Contable ', 'lizd@superbrix.com', '3242651306', 'LIZ DAYANIS ARROYO MORA.png', 'Financiero', '2025-04-29', 1),
(230, 'Elsa Margarita Brito Ghisays', '1989-12-28', 'Asistente De Contabilidad', 'elsab@superbrix.com', '3157947361', 'Elsa-Brito.png', 'Financiero', '2025-05-01', 1),
(231, 'Alvaro Luis Serrano Estrada', '1966-05-18', 'Jefe De Taller De Pintura', 'alvaros@superbrix.com', '3218963686', '', 'Manufactura', '1993-01-12', 0),
(232, 'Marlon Jose Polo Pantoja', '2006-09-12', 'Aprendiz Soldador', '3007741990marlon@gmail.com', '3007741990', 'MARLON JOSE POLO PANTOJA.png', 'MANUFACTURA - ENSAMBLE II', '2025-05-21', 1),
(233, 'Jose Eduardo Orozco Carrillo', '2005-07-14', 'Soldador, Ensamble 1  ', 'jocarrilo17@gmail.com', '3016650528', 'JOSE EDUARDO OROZCO CARRILLO.png', 'Manufactura', '2025-06-30', 1),
(234, 'Pablo Andres Jimenez Ferreira', '1990-02-24', 'Jefe De Ciberseguridad', 'pablo@superbrix.com', '3218951574', 'PABLO ANDRES JIMENEZ FERREIRA.png', 'Tics', '2025-06-16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'milton', 'Cristian-0'),
(2, 'lorenaf', '123456'),
(3, 'administrador', '515t3m45'),
(4, 'jesusb', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
