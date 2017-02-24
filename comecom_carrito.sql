-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-02-2017 a las 00:09:28
-- Versión del servidor: 5.5.54-cll
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `comecom_carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cadena`
--

CREATE TABLE IF NOT EXISTS `cadena` (
  `idCadena` varchar(45) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCadena`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cadena`
--

INSERT INTO `cadena` (`idCadena`, `Nombre`, `url`, `estado`) VALUES
('Bar', 'Bar', '-', 1),
('Bistro', 'Bistro', '-', 1),
('Buffet', 'Buffet', '-', 1),
('Cantina', 'Cantina', '-', 1),
('china', 'china', '-', 1),
('comida', 'comida', '-', 1),
('comida-arabe', ' comida arabe', '-', 1),
('comida-argentina', 'comida argentina', '-', 1),
('comida-brasilena', 'comida brasileña', '-', 1),
('comida-cubana', 'comida brasileña', '-', 1),
('comida-espanola', 'comida española', '-', 1),
('comida-francesa', ' comida francesa', '-', 1),
('comida-indu', 'comida indú', '-', 1),
('comida-italiana', 'comida italiana', '-', 1),
('comida-japonesa', 'comida japonesa', '-', 1),
('comida-mexicana', 'comida mexicana', '-', 1),
('comida-oriental', 'comida oriental', '-', 1),
('Default', 'Default', '-', 1),
('Grill', 'Grill', '-', 1),
('Marisqueria', 'Marisqueria', '-', 1),
('Pizzeria', 'Pizzeria', '-', 1),
('Restaurante', 'Restaurante', '-', 1),
('Snack', 'Snack', '-', 1),
('Taquería', 'Taquería', '-', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE IF NOT EXISTS `calificacion` (
  `idCalificacion` varchar(45) NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `idSucursal` varchar(45) NOT NULL,
  `registro` datetime DEFAULT NULL,
  PRIMARY KEY (`idCalificacion`),
  KEY `fk_Calificacion_Sucursal1_idx` (`idSucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategorias` varchar(45) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(450) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idSucursal` varchar(45) NOT NULL,
  `posicion` int(11) DEFAULT '0',
  PRIMARY KEY (`idCategorias`),
  KEY `fk_Categorias_Sucursal1_idx` (`idSucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategorias`, `Nombre`, `Descripcion`, `url`, `estado`, `idSucursal`, `posicion`) VALUES
('Asian-Kids-Asian-Bistro', 'Asian Kids', '', '45f827b0dac545ac02f41d87634ce9ff.jpg', 1, 'Asian-Bistro', 3),
('Asiatica-Asian-Bistro', 'Asiatica', '', '70cbe4df213cad675585f482dbcb97f6.jpg', 1, 'Asian-Bistro', 1),
('Bebidas-Asian-Bistro', 'Bebidas', '', 'a5184b01688451bda1c6845bf8d80998.jpg', 1, 'Asian-Bistro', 5),
('Extras-Asian-Bistro', 'Extras', '', '1760a85f37c8d9af382c3d98be8b6833.jpg', 1, 'Asian-Bistro', 6),
('Japonesa-Asian-Bistro', 'Japonesa', '', '7a3be37a80d9e67ed3971adf5c5b5aa9.jpg', 1, 'Asian-Bistro', 2),
('Mexicanas-Pizz-Hot', 'Mexicanas', 'Simpre lo mejor', '553bffccc752b92de4b77d021ac2a06d.png', 1, 'Pizz-Hot', 0),
('Para-Compartir-B1-Restobar', 'Para Compartir', 'mas de 2 personas', '5ea663d3362204c4a1ddaeaa06ceaea9.jpg', 1, 'B1-Restobar', 0),
('Pizza-Tropicales-Pizz-Hot', 'Pizza Tropicales', 'Tropicales', '6eea7bf927fac593eda75b8bac64193d.jpg', 1, 'Pizz-Hot', 0),
('Pizzaz-B1-Restobar', 'Pizzaz', 'Calientitas deliciosas', '6828c267f7d09e5994ee5492413af268.jpg', 1, 'B1-Restobar', 0),
('Postres-Asian-Bistro', 'Postres', '', 'def0850b6fa1992406ec54cfc68d71b9.jpg', 1, 'Asian-Bistro', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasubcate`
--

CREATE TABLE IF NOT EXISTS `categoriasubcate` (
  `idCategoriaSubcate` varchar(45) NOT NULL,
  `idCategorias` varchar(45) NOT NULL,
  `idSubcategoria` varchar(45) NOT NULL,
  `posicion` int(11) DEFAULT '0',
  PRIMARY KEY (`idCategoriaSubcate`),
  KEY `fk_CategoriaSubcate_Categorias1_idx` (`idCategorias`),
  KEY `fk_CategoriaSubcate_Subcategoria1_idx` (`idSubcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoriasubcate`
--

INSERT INTO `categoriasubcate` (`idCategoriaSubcate`, `idCategorias`, `idSubcategoria`, `posicion`) VALUES
('Asian-Bistro-Aguas-Exoticas-Bebidas-Asian-Bis', 'Bebidas-Asian-Bistro', 'Aguas-Exoticas', 5),
('Asian-Bistro-Arroz-Asiatica-Asian-Bistro', 'Asiatica-Asian-Bistro', 'Arroz', 6),
('Asian-Bistro-Asian-Kids-Asian-Kids-Asian-Bist', 'Asian-Kids-Asian-Bistro', 'Asian-Kids', 0),
('Asian-Bistro-Aves-Asiatica-Asian-Bistro', 'Asiatica-Asian-Bistro', 'Aves', 11),
('Asian-Bistro-Bebidas-Asian-Kids-Asian-Bistro', 'Asian-Kids-Asian-Bistro', 'Bebidas', 0),
('Asian-Bistro-Cafes-Bebidas-Asian-Bistro', 'Bebidas-Asian-Bistro', 'Cafes', 8),
('Asian-Bistro-Carnes-Asiatica-Asian-Bistro', 'Asiatica-Asian-Bistro', 'Carnes', 9),
('Asian-Bistro-Cerveza-Bebidas-Asian-Bistro', 'Bebidas-Asian-Bistro', 'Cerveza', 9),
('Asian-Bistro-Chirashi-Japonesa-Asian-Bistro', 'Japonesa-Asian-Bistro', 'Chirashi', 6),
('Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro', 'Asiatica-Asian-Bistro', 'Dim-Sum', 1),
('Asian-Bistro-Ensaladas-Asiatica-Asian-Bistro', 'Asiatica-Asian-Bistro', 'Ensaladas', 5),
('Asian-Bistro-Entrada-Japonesa-Asian-Bistro', 'Japonesa-Asian-Bistro', 'Entrada', 1),
('Asian-Bistro-Entradas-Asiatica-Asian-Bistro', 'Asiatica-Asian-Bistro', 'Entradas', 2),
('Asian-Bistro-Especialidades-Asiatica-Asian-Bi', 'Asiatica-Asian-Bistro', 'Especialidades', 8),
('Asian-Bistro-Extras-Extras-Asian-Bistro', 'Extras-Asian-Bistro', 'Asian-Bistro-Extras', 0),
('Asian-Bistro-Niguiri-especial-Japonesa-Asian-', 'Japonesa-Asian-Bistro', 'Niguiri-clasico-y-especial', 5),
('Asian-Bistro-Noodles-Asiatica-Asian-Bistro', 'Asiatica-Asian-Bistro', 'Noodles', 7),
('Asian-Bistro-Pescados-y-mariscos-Asiatica-Asi', 'Asiatica-Asian-Bistro', 'Pescados-y-mariscos', 10),
('Asian-Bistro-Postres-Asian-Kids-Asian-Bistro', 'Asian-Kids-Asian-Bistro', 'Postres', 0),
('Asian-Bistro-Postres-Postres-Asian-Bistro', 'Postres-Asian-Bistro', 'Postres', 0),
('Asian-Bistro-Refrescos-Bebidas-Asian-Bistro', 'Bebidas-Asian-Bistro', 'Refrescos', 3),
('Asian-Bistro-Sashimi-Japonesa-Asian-Bistro', 'Japonesa-Asian-Bistro', 'Sashimi', 3),
('Asian-Bistro-Sopas-Asiatica-Asian-Bistro', 'Asiatica-Asian-Bistro', 'Sopas', 3),
('Asian-Bistro-Sushi-Japonesa-Asian-Bistro', 'Japonesa-Asian-Bistro', 'Sushi', 7),
('Asian-Bistro-Sushi-Oke-Japonesa-Asian-Bistro', 'Japonesa-Asian-Bistro', 'Sushi-Oke', 2),
('Asian-Bistro-Temaki-clasico-Japonesa-Asian-Bi', 'Japonesa-Asian-Bistro', 'Temaki-clasico-y-especial', 4),
('Asian-Bistro-Tes-Bebidas-Asian-Bistro', 'Bebidas-Asian-Bistro', 'Tes', 2),
('Asian-Bistro-The-Berry-Company-Bebidas-Asian-', 'Bebidas-Asian-Bistro', 'The-Berry-Company', 7),
('Asian-Bistro-Veggie-Asiatica-Asian-Bistro', 'Asiatica-Asian-Bistro', 'Veggie', 4),
('Asian-Bistro-Vino-Blanco-Bebidas-Asian-Bistro', 'Bebidas-Asian-Bistro', 'Vino-Blanco', 4),
('Asian-Bistro-Vino-Rosado-Bebidas-Asian-Bistro', 'Bebidas-Asian-Bistro', 'Vino-Rosado', 1),
('Asian-Bistro-Vino-Tinto-Bebidas-Asian-Bistro', 'Bebidas-Asian-Bistro', 'Vino-Tinto', 6),
('B1-Restobar-Pizzaz-Veganas-Pizzaz-B1-Restobar', 'Pizzaz-B1-Restobar', 'B1-Restobar-Pizzaz-Veganas', 0),
('Pizz-Hot-Especiales-Pizza-Tropicales-Pizz-Hot', 'Pizza-Tropicales-Pizz-Hot', 'Pizz-Hot-Especiales', 0),
('Pizz-Hot-Rapidas-Mexicanas-Pizz-Hot', 'Mexicanas-Pizz-Hot', 'Pizz-Hot-Rapidas', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` varchar(45) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `registro` datetime DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `img` varchar(45) DEFAULT NULL,
  `tipo_registro` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `Nombre`, `email`, `sexo`, `registro`, `password`, `edad`, `estado`, `img`, `tipo_registro`) VALUES
('150601103232', 'Israel Ampudia', 'israel.ampudia@eenterprise.mx', '', '2015-06-01 22:32:32', '1234', 0, 'Activo', 'perfil.png', 'rapido'),
('150601110553', 'Israel ', 'israel.ampudia@hotmail.com', '', '2015-06-01 23:05:53', '1234', 0, 'Activo', 'perfil.png', 'rapido'),
('150622021327', 'xx', 'eduard@dada.com', '', '2015-06-22 14:13:27', '1234', 0, 'Activo', 'perfil.png', 'rapido'),
('150622021328', 'xx', 'eduard@dada.com', '', '2015-06-22 14:13:28', '1234', 0, 'Activo', 'perfil.png', 'rapido'),
('150629114030', 'Jkj', 'hhb@hotmail.com', '', '2015-06-29 11:40:30', '1234', 0, 'Activo', 'perfil.png', 'rapido'),
('150703083543', 'Israel Ampudia', 'israel.ampudia@eenterprise.mx', '', '2015-07-03 20:35:43', '1234', 0, 'Activo', 'perfil.png', 'rapido'),
('170209081358', 'Israel Ampudia Ochoa', 'israel.ampudia@hotmail.com', '', '2017-02-09 20:13:58', '1234', 0, 'Activo', 'perfil.png', 'rapido'),
('170221114754', 'RAFAEL', 'rafael.glz.guz@gmail.com', '', '2017-02-21 23:47:54', '1234', 0, 'Activo', 'perfil.png', 'rapido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colonias`
--

CREATE TABLE IF NOT EXISTS `colonias` (
  `idColonias` int(11) NOT NULL AUTO_INCREMENT,
  `Colonia` varchar(45) DEFAULT NULL,
  `CP` varchar(45) DEFAULT NULL,
  `Delegacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idColonias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `colonias`
--

INSERT INTO `colonias` (`idColonias`, `Colonia`, `CP`, `Delegacion`) VALUES
(3, 'San Andres Totoltepec', '14400', 'Tlapan'),
(4, 'San Pedro', '15330', 'Tlalpan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colsucural`
--

CREATE TABLE IF NOT EXISTS `colsucural` (
  `idcolSucural` int(11) NOT NULL AUTO_INCREMENT,
  `idSucursal` varchar(45) NOT NULL,
  `idColonias` int(11) NOT NULL,
  PRIMARY KEY (`idcolSucural`),
  KEY `fk_colSucural_Sucursal1_idx` (`idSucursal`),
  KEY `fk_colSucural_Colonias1_idx` (`idColonias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `colsucural`
--

INSERT INTO `colsucural` (`idcolSucural`, `idSucursal`, `idColonias`) VALUES
(1, 'Asian-Bistro', 3),
(2, 'Pizz-Hot', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `idComentario` varchar(45) NOT NULL,
  `comenario` varchar(550) DEFAULT NULL,
  `idSucursal` varchar(45) NOT NULL,
  `registro` datetime DEFAULT NULL,
  PRIMARY KEY (`idComentario`),
  KEY `fk_Comentario_Sucursal1_idx` (`idSucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diralternavitas`
--

CREATE TABLE IF NOT EXISTS `diralternavitas` (
  `iddiralternavitas` int(11) NOT NULL AUTO_INCREMENT,
  `calle` varchar(45) DEFAULT NULL,
  `numint` varchar(45) DEFAULT NULL,
  `numex` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `idCliente` varchar(45) NOT NULL,
  `idColonias` int(11) NOT NULL,
  PRIMARY KEY (`iddiralternavitas`),
  KEY `fk_diralternavitas_Cliente1_idx` (`idCliente`),
  KEY `fk_diralternavitas_Colonias1_idx` (`idColonias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `diralternavitas`
--

INSERT INTO `diralternavitas` (`iddiralternavitas`, `calle`, `numint`, `numex`, `telefono`, `idCliente`, `idColonias`) VALUES
(1, 'gyhyf', '67', '56', '0155854659', '150601103232', 3),
(2, 'Gjjd', '24', '73', '546164', '150601110553', 3),
(3, 'palsdlad', '2', '2', '55554', '150622021327', 3),
(4, 'palsdlad', '2', '2', '55554', '150622021328', 3),
(5, 'Hjjj', '66667', 'Jug', '5555555555', '150629114030', 3),
(6, 'j', 'hhhg', '777', '0155854659', '150703083543', 3),
(7, 'San Lorenzo 1140 depto 208', '0', '545', '5535412164', '170209081358', 3),
(8, 'Miguel Hidalgo Mz 31', '23', '23', '5554783907', '170221114754', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `idimagenes` bigint(20) NOT NULL AUTO_INCREMENT,
  `url` varchar(45) DEFAULT NULL,
  `idProducto` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idimagenes`),
  KEY `fk_imagenes_Producto1_idx` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=560 ;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`idimagenes`, `url`, `idProducto`, `estado`) VALUES
(255, 'e754f2bc615648272da5eaa9719d5bbc.jpg', '201506011175632', '1'),
(256, 'f3950e523cae04d8133dbb9d7e3ee9e1.jpg', '201506012175747', '1'),
(286, '03f9a3ff8100e324808810675c51a73f.jpg', '20150716226195658', '1'),
(287, 'f5d3ebd54c04a288963540f2c9bdf384.jpg', '20150716227195753', '1'),
(288, 'd9980b1134c09c33909b1f571855a51d.jpg', '20150716228195827', '1'),
(289, 'effa18fe569e90923edbca0b511a35ea.jpg', '20150716229195904', '1'),
(291, '9be5ba4b66c739d0e86498dc37509ffd.jpg', '20150716230195953', '1'),
(292, '45bd37bed75418d2f8be18246433a52a.jpg', '20150716232200107', '1'),
(293, 'e707ebb52f5ef021f57ffce1651010f6.jpg', '20150716231200028', '1'),
(294, '99a491683ae3a41cc86302d3658b3324.jpg', '20150807229154842', '1'),
(295, '41a67bc83fe7c4a45b8e1f4bee5dac6f.jpg', '20150807230155208', '1'),
(296, 'a317522054ad437f8a82e20bf016465e.jpg', '20150807231155354', '1'),
(297, 'c2af9aa61b9f6c5f2428d13fb5c60029.jpg', '20150807232155552', '1'),
(298, '0f672160a22d59c8f14077172224068b.jpg', '20150807233160101', '1'),
(299, 'c3a3722c3486ab3e47cfaf99eb06c79f.jpg', '20150807234160345', '1'),
(300, '8ea74eda540fa96f85085e1e282c9d0d.jpg', '20150807235160446', '1'),
(301, 'e30558a3a6799d40385510b299c491f2.jpg', '20150807236160612', '1'),
(302, 'c0fb4817ece80ba6f11ef3a0e5ffb687.jpg', '20150807237160706', '1'),
(303, '3587bf50e372f48cdc5f1c11f7e3c9cc.jpg', '20150807238160757', '1'),
(304, '2d336f9d4df92a2f24160c3342098561.jpg', '20150807247170524', '1'),
(305, '210d160841af1c8879da71395027c3e8.jpg', '20150807245165847', '1'),
(307, 'ffe95333310e26526c54c2d9b7e04235.jpg', '20150807254171242', '1'),
(308, '87dcfea177ad5419d9c763b8b95f2e24.jpg', '20150807243163222', '1'),
(309, '0face1461b23999c8d7e200a236bba5b.jpg', '2015060110180836', '1'),
(310, 'a1dca4d9aa3cd467b2b2973e79072a6f.jpg', '20150807249170643', '1'),
(311, '32bf5ca10954d5c4176fe5e99314bac1.jpg', '20150807250170710', '1'),
(312, '4f498f1e9d25305d7ec5d22a2e666543.jpg', '20150807248170554', '1'),
(313, '29ad380f8bbcd3a2fd4478a535360c6d.jpg', '20150807256171438', '1'),
(314, '3a445535e22cc3062f93d7f7eccdac6d.jpg', '20150807252171033', '1'),
(315, '54cf21981777be11d5fae2fb2108ae5e.jpg', '20150807251170743', '1'),
(316, 'c0f01cd0aec63b0ed243e6b01a97752d.jpg', '2015060125201035', '1'),
(317, '66f839c3ffcee60412b1265aeb8e5dc9.jpg', '20150807240162800', '1'),
(318, '19d0eee3e6f484a5fb43a0936d69d589.jpg', '20150807242163048', '1'),
(319, 'e110b25ebfae35036365c080ee1665de.jpg', '20150807244163656', '1'),
(320, 'eb0e57c06c74e0d8512abec52a016ea6.jpg', '20150807241162952', '1'),
(321, 'f067d90aff73e51f44a9587f8c03f470.jpg', '2015060116200312', '1'),
(322, 'e22620dc29acaf28a954537ecfe951f4.jpg', '20150807253171120', '1'),
(323, '0e3ca3c39217ee2fd9eb9b037a0cf6ac.jpg', '20150807257171512', '1'),
(324, '4a5463c45d5b7af8bf2dc1303b696a20.jpg', '20150807255171355', '1'),
(325, '07f4be1c32a3ca781e35bdcddff33d90.jpg', '20150807239162739', '1'),
(326, '02ad45a46abe1eeef8a77728144082d3.jpg', '201506013175827', '1'),
(327, '80bf2a7f236037dce60ef62eb9cbaa8b.jpg', '201506014180247', '1'),
(328, '910f6a0802dec5ccbf4ae431ddf658fb.jpg', '201506015180339', '1'),
(329, '91e32cd4054c4ec59625958555df03f2.jpg', '2015060118200418', '1'),
(330, 'c6a3977bfdcaa71b3d9d600a2055a53a.jpg', '201506016180440', '1'),
(331, '87daef00f53bfe21d763203a08972c64.jpg', '2015060111195015', '1'),
(332, '4252634a2886138706e69e6cb5b13701.jpg', '2015060112195058', '1'),
(333, '16d02418839d19758cd0e04db269c7c3.jpg', '2015060113195129', '1'),
(334, '062360a5e7331e05902fbbcb6a400f39.jpg', '2015060114195210', '1'),
(335, '7e8b656654de85e1ef7e93c8282c6ce7.jpg', '2015060115195407', '1'),
(336, '9050e04dcda2881b9d7c02c9705a3453.jpg', '201506017180605', '1'),
(337, '372fbc4b18fad6d9d81c409ddd4d6b1b.jpg', '201506018180720', '1'),
(338, 'c19ff9b52677b9042cbe0017abd8c340.jpg', '2015060117200347', '1'),
(339, '1ff6509956a4b95c0a9760358090623c.jpg', '201506019180759', '1'),
(340, 'e127f7355c86e93b7a8ff5795c66100f.jpg', '2015060119200452', '1'),
(341, 'f0604a4e5f7a7d131ec61aae5d3612e4.jpg', '2015060129203954', '1'),
(342, 'f5a828fdefa355a0642f82fbde8d9d29.jpg', '2015060121200556', '1'),
(343, 'db2d5ad61e9d94992facbe315f565b7b.jpg', '2015060134204344', '1'),
(344, '4043bf76c2fba0fd65dcb0078f97ce2c.jpg', '2015060127201442', '1'),
(345, '9518f1ef9cce61304b37bbbf76e04a2c.jpg', '20150715172220814', '1'),
(346, '5d1a7d4eb74a420ac348dfc21d4cc9ae.jpg', '2015060173212508', '1'),
(347, '573d9f47d9497db89fcc046a7fb370ad.jpg', '2015060163211332', '1'),
(348, '88a21db7a37a15728ba131a1443e7318.jpg', '20150720233202214', '1'),
(349, '0abe65dba71b5cf9f83018c3ef9fbf42.jpg', '2015060122200625', '1'),
(350, 'b481eb30812a66e718a61b611ce6259d.jpg', '20150715170213511', '1'),
(351, '08d05773617322a6c03f5926362faac1.jpg', '2015060164211402', '1'),
(352, '3810775977fa40f7066b39b41c7cb2ef.jpg', '2015060157210831', '1'),
(353, '877c64e0fa4150b42069895e5cc1c8ed.jpg', '2015060154210627', '1'),
(354, '9ed0c478d6ba1a5ef04407bb8b76ff08.jpg', '2015060126201128', '1'),
(355, '7654ce8dc438c96f16e435d38814f992.jpg', '2015060132204216', '1'),
(356, 'af8afccde24f991b416c00f121dba381.jpg', '2015060137204553', '1'),
(357, '4c2440553399fb39c8cf3a780928b1ca.jpg', '2015060120200524', '1'),
(358, '396fc699a0cd702daba9c6411b99ff99.jpg', '2015060139204708', '1'),
(359, '0226e7233b44a14d9e75f09c806ff0f7.jpg', '2015060131204124', '1'),
(360, '92746688c893e00ec711142931b5ff9e.jpg', '2015060155210702', '1'),
(361, '91db2a15709f95fd87c3c5cced45219c.jpg', '2015060130204035', '1'),
(362, '93e1623972f67142b8d405deb71d7499.jpg', '2015060133204303', '1'),
(363, '36825a951859bbf3afdb9b02320b1a6d.jpg', '2015060128201520', '1'),
(364, '5be0b7966ec6897a4c6e16a2fbf100a0.jpg', '2015060135204416', '1'),
(365, 'f49c0d78c2d79f3d39779d5d758bf059.jpg', '2015060123200703', '1'),
(366, '4a4acec09cce3d895194c7fdb0eb44b9.jpg', '20150715158161934', '1'),
(367, '4a07e5f02f4441040da446ad95df5354.jpg', '2015060124200902', '1'),
(368, '4017f0575f2f4d30996bd604b11b7548.jpg', '2015060136204454', '1'),
(369, '2272493c951aedc5d38903046b9a5f68.jpg', '2015060138204629', '1'),
(370, '549fdf160833bb93ff24eb776fa7ceeb.jpg', '2015060148205517', '1'),
(371, '97f2780d36b4f648d012379877f5a818.jpg', '2015060141204815', '1'),
(372, 'fa66805626a32e7f09b54bd3694dbe70.jpg', '2015060140204747', '1'),
(373, 'f94197edfc479167144bb9b4b5c74c86.jpg', '2015060146205358', '1'),
(374, 'c01943446eaa8c49195942773df43f2a.jpg', '2015060147205434', '1'),
(375, '804d4e9ba81e6d984743a279f94dbf3c.jpg', '2015060144205010', '1'),
(376, '08f3395e5d09196fcd251c6801fd3dd0.jpg', '2015060142204902', '1'),
(377, '97cf0b588320424cd3c47c391157c4fb.jpg', '2015060143204944', '1'),
(378, 'eef0480469ebf0b242eafdbbee036c2d.jpg', '2015060145205205', '1'),
(379, 'b967595e9bcf5d32c0db3a66762d8b86.jpg', '2015060152210054', '1'),
(380, '9072bcdba25934b148a9515d9f30a514.jpg', '2015060149205552', '1'),
(381, 'd4ff778b13244e7416e6d4058c741d30.jpg', '2015060150205650', '1'),
(382, '76b79fb2504a7eddf427073bde3cdf5b.jpg', '2015060151205958', '1'),
(383, '330c67950228f14b41506fb81e66c8dc.jpg', '2015060192214656', '1'),
(384, '42922aed636cce81c0747c4a13a7f5af.jpg', '2015060158210859', '1'),
(385, '6c3fe7a56698b51d7194c811a480cec9.jpg', '2015060153210519', '1'),
(386, '862675232685b859d12e0820b5783c64.jpg', '2015060181213811', '1'),
(387, '9f8a0b99d7a3a12c154c4ab8d6ee6bc5.jpg', '2015060186214215', '1'),
(388, 'a392fc403ffcc5e2246119829649b44c.jpg', '2015060156210740', '1'),
(389, '40f468b5e6dfd0491bf1f5fb60910ece.jpg', '2015060176213231', '1'),
(390, '4dc6ccbfa2d2e5f73aa4217fd7024cef.jpg', '2015060159210932', '1'),
(391, '38ee4fd1a8dc4caf86665792ec42cb00.jpg', '2015060160211055', '1'),
(392, 'e361eb1066831564292bd8e64ca84007.jpg', '2015060167211606', '1'),
(393, 'f63446de84e551380358a8e59e8710f2.jpg', '2015060170211808', '1'),
(394, '24ffcd9e730b83a78ca2b3f825141ab6.jpg', '2015060161211227', '1'),
(395, '079bc8a614117b0a305a978909cb3628.jpg', '2015060162211300', '1'),
(396, '0e1332842fdb43ae7f4b83d42c0fdf13.jpg', '2015060165211447', '1'),
(397, '8831bd689a465ffaecf6824d92d07af2.jpg', '2015060171212405', '1'),
(398, '588e885f8ba78d58933c500af282b700.jpg', '2015060172212441', '1'),
(399, '0e8755d5c1c21ea013ddad681f4ef53f.jpg', '2015060169211728', '1'),
(400, '0b3235db9d8c1e04f8eae8d3645d6837.jpg', '2015060191214619', '1'),
(401, 'b9dbf95861acc8315130dd2d5e050ccf.jpg', '2015060166211527', '1'),
(402, '0e35b1ff84eb37758910c0b39f463e80.jpg', '2015060168211644', '1'),
(403, 'd47125a701383ed8be701522a03d1fd5.jpg', '2015060180213621', '1'),
(404, '2ac120282428337119089f20d38d7a8a.jpg', '2015060183213944', '1'),
(405, '00819bb62805644f6db44486153e8091.jpg', '2015060184214018', '1'),
(406, 'd47b8c90a3ca373400894801db500beb.jpg', '2015060187214245', '1'),
(407, '7ffa3edf462e5372e85a51f2775501da.jpg', '2015060174212546', '1'),
(408, '41ba85edcdaf081281453a54e04243dc.jpg', '20150716216194019', '1'),
(409, '34fc4c731ce3b0564eab86224a4a1a5d.jpg', '20150714108153446', '1'),
(410, 'cdece9a228c847e341390bba6b49d2c5.jpg', '20150716224194522', '1'),
(411, '14ff397ab8669e496b2438a7fbb51ac4.jpg', '20150716213193826', '1'),
(412, '25835b0a15708bcb583b2c78b9570fe6.jpg', '20150715174220922', '1'),
(413, 'cf796a1a6c927406cfad0fd4f594d5d2.jpg', '2015060190214547', '1'),
(414, 'd9eea8e3b57b7e941d35588bfa3b9c16.jpg', '20150715204224936', '1'),
(415, '845a5ec77a52e2cef467f83bbf7fad14.jpg', '2015060179213545', '1'),
(416, 'bb031d9deb283b7e369eec8864165ed5.jpg', '20150716219194159', '1'),
(417, '93d964c901dac1415959b745f19536ae.jpg', '2015060188214321', '1'),
(418, '01154a3aad9f5a2028e7b6b28d53b426.jpg', '2015060194214809', '1'),
(419, 'bc5ba04b2e9688a48b219c8c690a218f.jpg', '2015060182213845', '1'),
(420, 'b949d357c9fc921375624c256eb2b8aa.jpg', '2015060185214140', '1'),
(421, 'a548a32c73756bd91a1097ab0c96a196.jpg', '20150715208225352', '1'),
(422, 'e5d1c0ed6dbd5b6af47fe377052f0eea.jpg', '20150715196224248', '1'),
(423, '7df2ddaa03b2df3afc5d5a82a526eece.jpg', '2015060177213338', '1'),
(424, 'f43ca5f8e92126ebcda2c3a35a198341.jpg', '20150716214193920', '1'),
(425, 'abd3a1c6e8b9e8d540e1c83cc7e89447.jpg', '20150716215193952', '1'),
(426, '8fda324d26c3aacf7ec10df9111df279.jpg', '2015060175212631', '1'),
(427, '4218f98410c0ad3f176d7f9b41b36230.jpg', '20150716228195827', '1'),
(428, 'aa3b606f9b9d24496e52a5fa20e57c3c.jpg', '20150716217194053', '1'),
(429, '893025ff31cdc6af3b99186ff0a02606.jpg', '2015060178213422', '1'),
(430, 'f6776a1e700b647cdebb0ac83213f0fa.jpg', '2015060193214730', '1'),
(431, '08f3c9e6364daf764a5778e989336bc0.jpg', '20150715193224008', '1'),
(432, 'd1cf8ecbc59ca277a4f1d765c7144b21.jpg', '20150715171220732', '1'),
(433, '2d2a275b07639fd5e9997ad122a46ff7.jpg', '20150715195224208', '1'),
(434, '602b06133e0463f8875066271dd02fe8.jpg', '20150715150160012', '1'),
(435, '2df45345022c1b948edf2715a966613b.jpg', '20150715190223636', '1'),
(436, 'f681a27e0264ea267ce3721d1fdbcc42.jpg', '20150715202224825', '1'),
(437, '0620f21c82689980b54a0be6c5bc0fe9.jpg', '20150715128152501', '1'),
(438, '2c9ded0f76f982807634363c4ab8f27e.jpg', '20150715191223914', '1'),
(439, '55ab87a25ae46393eb06ae3dce40f329.jpg', '20150715145154648', '1'),
(440, 'e34e750beae70e8fe2e1fd847904c966.jpg', '20150715173220847', '1'),
(441, '5db3fb5390a0cb966d75b1b4f872bef9.jpg', '20150716218194121', '1'),
(442, '75fcbd9ef0d4dfb23fa95175dfd8d38c.jpg', '20150716220194228', '1'),
(443, '9427ce3fc3083057369b4abe282c2762.jpg', '20150716221194256', '1'),
(444, '738f8ae5f40a20b9fddea198224c9fda.jpg', '20150715189223606', '1'),
(445, '8db3de1075d61fab29ff7d53ad8fc2e8.jpg', '2015071496151529', '1'),
(446, 'cb54c1f0bf941bd5930fdd1473adf5ea.jpg', '2015060195220603', '1'),
(447, '372ef175781c162d5e47a9a19ce05e60.jpg', '20150716225194608', '1'),
(448, '2728c54733735132e4670489827f228f.jpg', '20150715179221759', '1'),
(449, '098fc4e1f04c337f23b892bbdc38c3b3.jpg', '20150715192223937', '1'),
(450, '73d12a82d0c297c25f0b7798d40a5513.jpg', '20150714104152438', '1'),
(451, 'd2cd6fda328cb0f9276d919b8b4f87ec.jpg', '20150715129152542', '1'),
(452, 'e30fe44fc171e97a99839b3261b99288.jpg', '20150714109153527', '1'),
(453, 'f4f6d1ae1a5e7f6a91ffd6f080e76cc7.jpg', '20150715205225157', '1'),
(454, '67ff4e3bf4b7cbbeedcb856043fc5887.jpg', '20150715198224404', '1'),
(455, '5677e6f92252d5a6fabeed6e57219177.jpg', '20150716222194350', '1'),
(456, 'f9e2d4994b1258a238f5dfebcb284505.jpg', '20150716223194454', '1'),
(457, '177fb6c9a8a214777631925a74082a01.jpg', '20150715137153941', '1'),
(458, 'd046549a8042d794bdb5c079dbc15696.jpg', '20150715123152211', '1'),
(459, 'b55f4303db45b1cc24a5d63c343aeb76.jpg', '2015071498151656', '1'),
(460, '54169e5dbf7beb80da39e411ee824998.jpg', '20150715181221929', '1'),
(461, '869a312453847b906515323989b1d121.jpg', '20150715177221534', '1'),
(462, '4f6b209771c9e945098d8928cfe57975.jpg', '20150715200224711', '1'),
(463, 'f7ac61de7d1c6471b05985df9fd922a9.jpg', '20150715160162151', '1'),
(464, 'e30ddf026d36c027bd2330316bcd5f3d.jpg', '20150715122152125', '1'),
(465, 'b58abca7c83678905848a56e46bc0ba0.jpg', '20150716212193701', '1'),
(466, '21fab2e561d87e395e33ec5fd40f6b84.jpg', '20150716211193602', '1'),
(467, '8b2836327aa8c2958e52ad6024e0bd90.jpg', '20150715180221834', '1'),
(468, '0279c83f62b3994728e3b46331158241.jpg', '20150715147155549', '1'),
(469, 'aab8b6222f73be80237487fe310610a2.jpg', '20150715130152621', '1'),
(470, 'a4eb3ac22703dc24e5c997bfcf7201c4.jpg', '20150715188223540', '1'),
(471, '5d4f8e97f84793e1df5325616639ed56.jpg', '20150715199224639', '1'),
(472, 'b7ab1bdce5efa8aa4bebf2842797f49e.jpg', '2015071497151618', '1'),
(473, 'ebe3bd5cdaea4f83b00cfcd892911590.jpg', '20150715121152055', '1'),
(474, 'd22a7a0e62600268f0c69f817fd138e7.jpg', '20150714100151849', '1'),
(475, '7090f7ee350e573854f773dd48e5f094.jpg', '20150715178221659', '1'),
(476, '3133181d3dc078d0e0a069af82830141.jpg', '20150715124152246', '1'),
(477, '8b7b5667a2b8b20dffe29db6cec4678d.jpg', '20150715144154519', '1'),
(478, '687ba3b4292f8ff3de6a1a2341e3e88a.jpg', '20150715187223045', '1'),
(479, 'f523eba1ccfa007909c14d0aca9bed05.jpg', '20150715138154020', '1'),
(480, 'e7d643d3de0edfe1d310d0dd77aaa284.jpg', '20150715162162539', '1'),
(481, '07d068844f30f86cbc2074d9be9601fa.jpg', '20150715131153248', '1'),
(482, 'a7b04bf58432e30f7a34924d57223be3.jpg', '20150715176221455', '1'),
(483, '587965818fc72cc370e60a8e5dbb53f8.jpg', '20150714102152328', '1'),
(484, '76a3d3996735ff23017a145ed30e7658.jpg', '20150715197224334', '1'),
(485, '853f0af4b126cfe1b565b10049883645.jpg', '20150715186223013', '1'),
(486, 'aea0d3051984a7613feed924f1d0ca64.jpg', '20150715185222938', '1'),
(487, '969c153b96f3801c3f04dd9109958c14.jpg', '20150715194224032', '1'),
(488, '5be44ab65c0b7e16c851b4fcd5fec6c7.jpg', '20150715169213435', '1'),
(489, '378a33052035c600efe7794322e2bd99.jpg', '20150715151160048', '1'),
(490, '9544453c0cbdab236de8e8ea647f3b3d.jpg', '20150715139154057', '1'),
(491, 'b84124257aa8043dce9050ce262335ff.jpg', '20150715127152428', '1'),
(492, 'ba3b445d06abd4def11d02a5fecfd3d6.jpg', '20150715155160457', '1'),
(493, '894fc2e618963fb284bdb7df7740682b.jpg', '20150715143154327', '1'),
(494, '759f70d0bc1bb8dc4ec9213f282231a3.jpg', '20150715126152357', '1'),
(495, '0b8ed0c6c711262abfcac1f49d8efbb3.jpg', '20150715125152326', '1'),
(496, '5771e2aebeb529c96f9394bf9295953c.jpg', '20150715163162751', '1'),
(497, '567ed91ea1cfc79c2cc326a519624893.jpg', '20150715157161345', '1'),
(498, '67a839edc2e02003b78044de3020461b.jpg', '20150715135153901', '1'),
(499, '4c8dd9c0f0f046961bcf27c4f8bac308.jpg', '20150715166213249', '1'),
(500, '87b7fee7bf12d6e47fbe6f913b3e2678.jpg', '20150715159162014', '1'),
(501, 'c2e848e9a48c4d1ca411097c4da335c6.jpg', '20150715168213357', '1'),
(502, 'c5d2f280e895fb009718d1f324cade52.jpg', '20150720233205504', '1'),
(503, 'd28c87666e9851ef20156958ec9778b2.jpg', '20150715210225449', '1'),
(504, '36d86e95b4e7f246550b703f9da55989.jpg', '20150715182222006', '1'),
(505, '842d1417c69bcdbd13ca00bbdccc7a66.jpg', '20150715134153815', '1'),
(506, '3c3121f1939c838a87f3b33b4ec7edfe.jpg', '20150715206225246', '1'),
(507, 'd906e967ffe59598ac53df87d0719d52.jpg', '20150715132153641', '1'),
(508, 'cef210d56d130fb6f847d74897f12d48.jpg', '20150715133153718', '1'),
(509, '35a05113d58b4f31558884803b1f8efa.jpg', '20150715201224742', '1'),
(510, 'eb766b7f322dde08104372247b1c88e2.jpg', '20150715140154139', '1'),
(511, 'd71e753ba3124c6eecd7e7694e6008b4.jpg', '20150714105152512', '1'),
(512, '586b134a9dab4a74576e74cc72423571.jpg', '20150715203224907', '1'),
(513, '1a3c282a6c34a46c322506a7dd1cf2bd.jpg', '20150715167213326', '1'),
(514, '35c1991640f899b0c01840394f80f673.jpg', '20150715165162857', '1'),
(515, '7d5e06cc0840f3581d883853397f2c94.jpg', '20150715141154219', '1'),
(516, '20633e01745fb710bb597d2a1f68f84f.jpg', '20150714103152401', '1'),
(517, 'b8c567123855866d2c77f8158dde203a.jpg', '20150715184222857', '1'),
(518, '504f0efe95108ae5bfd863de1d1ca033.jpg', '20150715164162823', '1'),
(519, '136a5916d1e97f80ea3d263b46a83011.jpg', '20150715161162509', '1'),
(520, '6eafa532278bf84147e494f18a710631.jpg', '20150715142154252', '1'),
(521, 'ddaa0300b9f721b1b4f1941afe67a866.jpg', '20150715183222407', '1'),
(522, '897beee52ecbbcda47948adc46f4527b.jpg', '20150714120161010', '1'),
(523, 'a524d29d735d2fc8f9bd1105de82cee6.jpg', '20150715154160340', '1'),
(524, '614dc267cd93926acc40c98d02b7913d.jpg', '20150715153160257', '1'),
(525, 'c60dda8d4467f2dee5f7e30fee66e86d.jpg', '20150715146155446', '1'),
(526, 'dd83ea9129f3f5d2607326010e537ab3.jpg', '20150715148155849', '1'),
(527, 'a1b2b0c686ac44429bf8fc161fd85c34.jpg', '20150714118160208', '1'),
(528, 'a363f2a207f4d33d4465370a5ab52f36.jpg', '20150715152160130', '1'),
(529, '064d3503c5dc275194f8c21499d20f4c.jpg', '20150714116155250', '1'),
(530, 'dfd5349287c93612fca567d29b7438ac.jpg', '20150714115155127', '1'),
(531, 'b5ee51f29b18421cfd176195d8578c02.jpg', '20150714110154256', '1'),
(532, '800e6acaa38e72988648d876da0e8685.jpg', '20150715149155932', '1'),
(533, '1ca47f572d183cb6773c3d159cbbe931.jpg', '20150714107153404', '1'),
(534, '8c5d6e91662a22c8ae100bd8ab21ee8d.jpg', '20150714114155016', '1'),
(535, 'bd96bb65d546483880419f7723c7b5ad.jpg', '20150714113154731', '1'),
(536, '9c4c714844ee5bb312567c5311b0da84.jpg', '20150714111154456', '1'),
(537, 'db200bbb3eaf08a2d5d9e3a3790442ee.jpg', '20150714112154613', '1'),
(538, '2a8d66dc6a1d306830ef3e15bf1e6de0.jpg', '20150714106153328', '1'),
(539, 'c1dfd8229016a75696cafeb5298f0885.jpg', '20150715209225421', '1'),
(540, 'e412d3644e62ec906164d0d799c84ddb.jpg', '20150715207225318', '1'),
(541, 'd72e96b669f9a8c05e9de760f183afaf.jpg', '2015071499151811', '1'),
(542, '06cc3252c72acd48a2bbfc83dafccaee.jpg', '20150714101152210', '1'),
(543, '062f86227b9bf6416425881d1585d476.jpg', '20150810258164817', '1'),
(544, '0876573ffa788a2d7ed645896b534a5f.jpg', '20150810259164906', '1'),
(545, '1cf127401155172ce598430fd72ebe87.jpg', '20150810260164940', '1'),
(546, '274c6187c145140f0a9188aeff90bc70.jpg', '20150810261165103', '1'),
(547, '3375e446c3d2f21f4fd092235c91aaf6.jpg', '20150810262165144', '1'),
(548, 'a6e44f10eb1ce95092c3fb86d92dcd92.jpg', '20150810263165233', '1'),
(549, 'c3ba6cb911305c15172d5375eba711e5.jpg', '20150810264165312', '1'),
(550, 'd92d15ffc3919624c597f0e5be923856.jpg', '20150810266165350', '1'),
(551, '56f33bae951c1b43bb2b8c994051523f.jpg', '20150810267165700', '1'),
(552, '02f1ee8692fdc9f04d666258a7f79273.jpg', '20150810268165731', '1'),
(553, 'ffba36b6a87b906796a7b679c9f90c64.jpg', '20150810269165806', '1'),
(554, '70e5fc054642e7daf8dbd2c75350a7b5.jpg', '20150810270165843', '1'),
(555, 'ad5976e8202f46e549db02279b3958c7.jpg', '20150810271165921', '1'),
(556, '4292258998153eac5ecda5d3fe483405.jpg', '20150810272170000', '1'),
(557, 'd68a81169274f4f9c4824269b38ecc11.jpg', '20150810273170045', '1'),
(558, 'ae95083a6b62cc2ad94e458a0ca86e90.jpg', '20150810265165350', '1'),
(559, 'c79455d2dfe9391b23a19962ee91fa63.jpg', '20160225273210009', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `idpais` varchar(45) NOT NULL,
  `Pais` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idpais`, `Pais`) VALUES
('Chile', 'Chile'),
('Mexico', 'México');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `idPedido` varchar(45) NOT NULL,
  `tipopago` varchar(45) DEFAULT NULL,
  `paypal` varchar(45) DEFAULT NULL,
  `impreso` int(11) DEFAULT NULL,
  `Observacion` varchar(450) DEFAULT NULL,
  `registro` datetime DEFAULT NULL,
  `registroImpresion` datetime DEFAULT NULL,
  `personas` varchar(45) DEFAULT NULL,
  `timpo` varchar(45) DEFAULT NULL,
  `billeteTarjeta` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `calles` varchar(450) DEFAULT NULL,
  `asunto` varchar(45) DEFAULT NULL,
  `mensaje` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `receptor` varchar(45) DEFAULT NULL,
  `idCliente` varchar(45) DEFAULT NULL,
  `idSucursal` varchar(45) DEFAULT NULL,
  `iddiralternavitas` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `fk_Pedido_Cliente1_idx` (`idCliente`),
  KEY `fk_Pedido_Sucursal1_idx` (`idSucursal`),
  KEY `fk_Pedido_diralternavitas1_idx` (`iddiralternavitas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `tipopago`, `paypal`, `impreso`, `Observacion`, `registro`, `registroImpresion`, `personas`, `timpo`, `billeteTarjeta`, `estado`, `total`, `calles`, `asunto`, `mensaje`, `alias`, `receptor`, `idCliente`, `idSucursal`, `iddiralternavitas`) VALUES
('150601103232', 'trasnsferecia', NULL, 0, NULL, '2015-06-01 22:32:32', NULL, '8', NULL, '0', 'Pendiante', 0, 'efgh', NULL, '', NULL, NULL, '150601103232', 'Asian-Bistro', 1),
('150601110553', 'paypal', NULL, 0, NULL, '2015-06-01 23:05:53', NULL, '5', NULL, '0', 'Pendiante', 132, 'Gdnwiw', NULL, 'Desde el iPhone ', NULL, NULL, '150601110553', 'Asian-Bistro', 2),
('150622021327', 'efectivo', NULL, 0, NULL, '2015-06-22 14:13:27', NULL, '1', NULL, '2333', 'Pendiante', 390, 'adsda', NULL, 'dasd', NULL, NULL, '150622021327', 'Asian-Bistro', 3),
('150629114030', 'efectivo', NULL, 0, NULL, '2015-06-29 11:40:30', NULL, '1', NULL, '500', 'Pendiante', 85, 'Ghju', NULL, 'Prueba isra', NULL, NULL, '150629114030', 'Asian-Bistro', 5),
('150703083543', 'efectivo', NULL, 0, NULL, '2015-07-03 20:35:43', NULL, '2', NULL, '500', 'Pendiante', 85, 'l', NULL, '', NULL, NULL, '150703083543', 'Asian-Bistro', 6),
('170209081358', 'efectivo', NULL, 0, NULL, '2017-02-09 20:13:58', NULL, '5', NULL, '500', 'Pendiante', 1743, 'naxakjwhdfpiuahsdbv', NULL, '', NULL, NULL, '170209081358', 'Asian-Bistro', 7),
('170221114754', 'efectivo', NULL, 0, NULL, '2017-02-21 23:47:54', NULL, '3', NULL, '500', 'Pendiante', 173, 'montes de oca y agustin', NULL, '', NULL, NULL, '170221114754', 'Asian-Bistro', 8),
('187.233.249.102', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('187.234.161.40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('189.134.218.44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('189.137.167.68', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('189.140.0.246', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('189.141.85.121', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('189.189.223.44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('189.189.227.247', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('189.189.228.156', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('189.217.130.237', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('189.217.136.173', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('189.243.2.78', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('201.141.132.245', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('201.175.141.189', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidosproductos`
--

CREATE TABLE IF NOT EXISTS `pedidosproductos` (
  `idPedidosProductos` bigint(20) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `registro` datetime DEFAULT NULL,
  `idPedido` varchar(45) NOT NULL,
  `idSubproductos` varchar(45) NOT NULL,
  PRIMARY KEY (`idPedidosProductos`),
  KEY `fk_PedidosProductos_Pedido1_idx` (`idPedido`),
  KEY `fk_PedidosProductos_Subproductos1_idx` (`idSubproductos`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Volcado de datos para la tabla `pedidosproductos`
--

INSERT INTO `pedidosproductos` (`idPedidosProductos`, `cantidad`, `precio`, `registro`, `idPedido`, `idSubproductos`) VALUES
(3, 4, 33, '2015-06-01 22:58:27', '150601110553', '2015060111180440'),
(5, 1, 140, '2015-06-14 15:36:33', '189.134.218.44', '201506012-175632'),
(7, 1, 85, '2015-06-15 12:07:02', '187.233.249.102', '201506013175747'),
(8, 1, 140, '2015-06-19 18:18:50', '189.189.227.247', '201506014-175747'),
(9, 1, 175, '2015-06-19 18:19:05', '189.189.227.247', '2015060123200347'),
(10, 1, 175, '2015-06-19 18:19:07', '189.189.227.247', '2015060124200418'),
(11, 1, 175, '2015-06-19 18:19:10', '189.189.227.247', '2015060122200312'),
(12, 1, 78, '2015-06-19 18:19:13', '189.189.227.247', '2015060130200902'),
(13, 1, 45, '2015-06-19 18:19:21', '189.189.227.247', '2015060132-201035'),
(21, 1, 140, '2015-06-22 12:55:56', '150622021327', '201506012-175632'),
(22, 1, 85, '2015-06-22 13:02:45', '150622021327', '201506013175747'),
(23, 1, 110, '2015-06-22 13:27:02', '150622021327', '20150601109214809'),
(24, 1, 55, '2015-06-22 14:10:36', '150622021327', '201506015175827'),
(29, 1, 85, '2015-06-29 11:38:48', '150629114030', '201506017180247'),
(31, 1, 85, '2015-07-03 20:35:00', '150703083543', '201506013175747'),
(37, 1, 85, '2015-07-07 16:58:13', '189.140.0.246', '201506011175632'),
(38, 1, 160, '2015-07-07 17:02:53', '189.140.0.246', '2015060116195015'),
(39, 1, 160, '2015-07-07 17:02:55', '189.140.0.246', '2015060115180836'),
(40, 1, 160, '2015-07-07 17:02:57', '189.140.0.246', '2015060117195058'),
(41, 1, 175, '2015-07-07 17:02:58', '189.140.0.246', '2015060123200347'),
(42, 1, 175, '2015-07-07 17:02:59', '189.140.0.246', '2015060122200312'),
(43, 1, 78, '2015-07-07 17:03:01', '189.140.0.246', '2015060130200902'),
(44, 2, 17, '2015-07-07 17:03:09', '189.140.0.246', '2015060131201035'),
(45, 2, 160, '2015-07-09 11:50:54', '201.175.141.189', '2015060115180836'),
(46, 1, 160, '2015-07-09 11:50:58', '201.175.141.189', '2015060116195015'),
(47, 1, 75, '2015-07-14 22:42:42', '189.217.130.237', '20150714124153446'),
(48, 1, 280, '2015-07-20 19:53:14', '201.141.132.245', '2015060121195407'),
(49, 1, 80, '2015-07-20 21:06:23', '201.141.132.245', '20150715174155446'),
(50, 1, 33, '2015-07-21 13:24:51', '187.234.161.40', '2015060111180440'),
(51, 1, 280, '2015-07-21 13:27:58', '187.234.161.40', '2015060121195407'),
(52, 1, 280, '2015-08-04 15:18:24', '189.141.85.121', '2015060121195407'),
(53, 1, 150, '2015-09-01 19:32:46', '189.189.228.156', '20150715186161934'),
(54, 1, 110, '2015-09-01 19:32:56', '189.189.228.156', '20150601109214809'),
(55, 1, 110, '2015-09-01 19:32:57', '189.189.228.156', '20150601108214730'),
(56, 4, 55, '2015-09-01 19:33:10', '189.189.228.156', '20150601103214321'),
(57, 2, 89, '2015-09-14 18:24:46', '189.189.223.44', '20150714112151529'),
(58, 2, 78, '2016-02-25 21:04:57', '189.243.2.78', '2015060130200902'),
(60, 1, 37, '2016-02-25 21:05:38', '189.243.2.78', '20150810310164817'),
(61, 1, 21, '2016-02-25 21:05:39', '189.243.2.78', '20150810312164940'),
(65, 1, 160, '2017-02-09 20:08:55', '170209081358', '2015060186212405'),
(66, 1, 205, '2017-02-09 20:08:58', '170209081358', '2015060181211527'),
(67, 1, 185, '2017-02-09 20:08:59', '170209081358', '2015060182211606'),
(68, 1, 160, '2017-02-09 20:09:01', '170209081358', '2015060183211644'),
(69, 1, 175, '2017-02-09 20:09:04', '170209081358', '2015060123200347'),
(70, 1, 175, '2017-02-09 20:09:06', '170209081358', '2015060124200418'),
(71, 1, 175, '2017-02-09 20:09:08', '170209081358', '2015060122200312'),
(72, 1, 205, '2017-02-09 20:09:11', '170209081358', '2015060191213231'),
(73, 1, 78, '2017-02-09 20:09:20', '170209081358', '2015060130200902'),
(74, 5, 45, '2017-02-09 20:09:45', '170209081358', '2015060132-201035'),
(75, 2, 78, '2017-02-21 23:45:48', '170221114754', '2015060130200902'),
(76, 1, 17, '2017-02-21 23:45:58', '170221114754', '2015060131201035'),
(77, 1, 89, '2017-02-23 23:57:54', '189.137.167.68', '20150714112151529'),
(78, 1, 99, '2017-02-23 23:57:57', '189.137.167.68', '20150714114151656');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` varchar(45) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(450) DEFAULT NULL,
  `idSucursal` varchar(45) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `registro` datetime DEFAULT NULL,
  `idModelo` varchar(45) DEFAULT NULL,
  `keywork` varchar(45) DEFAULT NULL,
  `idCategoriaSubcate` varchar(45) NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `fk_Producto_Sucursal1_idx` (`idSucursal`),
  KEY `fk_Producto_CategoriaSubcate1_idx` (`idCategoriaSubcate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `Nombre`, `Descripcion`, `idSucursal`, `estado`, `registro`, `idModelo`, `keywork`, `idCategoriaSubcate`) VALUES
('2015060110180836', 'Pollo al Orange', 'Delicioso pollo salteado al wok en salsa oriental a la naranja (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 18:08:36', NULL, NULL, 'Asian-Bistro-Aves-Asiatica-Asian-Bistro'),
('2015060111195015', 'Pollo al Curry', 'Láminas de pollo con vegetales verdes salteados en salsa de curry Thai (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 19:50:15', NULL, NULL, 'Asian-Bistro-Aves-Asiatica-Asian-Bistro'),
('201506011175632', 'Arroz Shanghai tazón', 'Camarones, pulpo, callo de hacha, atún, todo salteado al wok con verduras.', 'Asian-Bistro', 1, '2015-06-01 17:56:32', NULL, NULL, 'Asian-Bistro-Arroz-Asiatica-Asian-Bistro'),
('2015060112195058', 'Bonsai Chicken', 'Espárragos envueltos en pollo, bañados en salsa hunan y arroz jazmín.', 'Asian-Bistro', 1, '2015-06-01 19:50:58', NULL, NULL, 'Asian-Bistro-Aves-Asiatica-Asian-Bistro'),
('2015060113195129', 'Pollo Thai', 'Trozos de pollo con piña y vegetales, salteados en salsa agridulce.', 'Asian-Bistro', 1, '2015-06-01 19:51:29', NULL, NULL, 'Asian-Bistro-Aves-Asiatica-Asian-Bistro'),
('2015060114195210', 'Pato Pekin', 'Tradicional pato laqueado servido con crepas, cebollín, pepino y salsa de ciruela.', 'Asian-Bistro', 1, '2015-06-01 19:52:10', NULL, NULL, 'Asian-Bistro-Aves-Asiatica-Asian-Bistro'),
('2015060115195407', 'Pato Yalong', 'Medio pato ligeramente ahumado en jazmín y anís con verduras al wok en salsa china de jengibre.', 'Asian-Bistro', 1, '2015-06-01 19:54:07', NULL, NULL, 'Asian-Bistro-Aves-Asiatica-Asian-Bistro'),
('2015060116200312', 'Thai Beef', 'Tiras de filete de res selladas al wok, acompañado de col marinada y cilantro fileteado.', 'Asian-Bistro', 1, '2015-06-01 20:03:12', NULL, NULL, 'Asian-Bistro-Carnes-Asiatica-Asian-Bistro'),
('2015060117200347', 'Vietnam Beef', 'Láminas de fielte de res marinadas en salsa oriental, servidas a la plancha con papas a la francesa.', 'Asian-Bistro', 1, '2015-06-01 20:03:47', NULL, NULL, 'Asian-Bistro-Carnes-Asiatica-Asian-Bistro'),
('2015060118200418', 'Crispy Beef', 'Crujientes tiras de res con pimiento, zanahoria y apio, salteados al wok en salsa agridulce china (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 20:04:18', NULL, NULL, 'Asian-Bistro-Carnes-Asiatica-Asian-Bistro'),
('2015060119200452', 'Res Szechuan', 'Tiras de res con castaña, hongos silvestres y bambú al wok en salsa de ajo (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 20:04:52', NULL, NULL, 'Asian-Bistro-Carnes-Asiatica-Asian-Bistro'),
('2015060120200524', 'Res Sizzling', 'Tiras de res, ejotes, pimientos y cebolla salteados en salsa de soya y especias chinas a la plancha (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 20:05:24', NULL, NULL, 'Asian-Bistro-Carnes-Asiatica-Asian-Bistro'),
('2015060121200556', 'Res Asian Bistro', 'Suaves láminas de res con brócoli al wok y salsa especial de ciruela (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 20:05:56', NULL, NULL, 'Asian-Bistro-Carnes-Asiatica-Asian-Bistro'),
('201506012175747', 'Arroz Asian Bistro', 'Camarones, res, pollo salteado al wok con vegetales y salsa de soya.', 'Asian-Bistro', 1, '2015-06-01 17:57:47', NULL, NULL, 'Asian-Bistro-Arroz-Asiatica-Asian-Bistro'),
('2015060122200625', 'Res Shitake', 'Láminas de res con hongos orientales en salsa especial de soya con un toque picante de chipotle (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 20:06:25', NULL, NULL, 'Asian-Bistro-Carnes-Asiatica-Asian-Bistro'),
('2015060123200703', 'Res Tangy', 'Láminas de res con tiernas verduras chinas en salsa especial a base de jengibre (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 20:07:03', NULL, NULL, 'Asian-Bistro-Carnes-Asiatica-Asian-Bistro'),
('2015060124200902', 'Beef Spring Roll', '2 rollos de filete con pimiento asado, verduras y chutney de mango.', 'Asian-Bistro', 1, '2015-06-01 20:09:02', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060125201035', 'Dumpling de Pescado', 'Dumpling relleno de pescado.', 'Asian-Bistro', 1, '2015-06-01 20:10:35', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060126201128', 'Dumpling de Camarón', 'Dumplings rellenos de camarón.', 'Asian-Bistro', 1, '2015-06-01 20:11:28', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060127201442', 'Dumpling de Kanikama', 'Dumplings de kanikama.', 'Asian-Bistro', 1, '2015-06-01 20:14:42', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060128201520', 'Dumpling de Mariscos', ' Dumplings rellenos de mariscos.', 'Asian-Bistro', 1, '2015-06-01 20:15:20', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060129203954', 'Dumpling de Salmón', 'Dumplings rellenos salmón.', 'Asian-Bistro', 1, '2015-06-01 20:39:54', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060130204035', 'Salmón Spring Roll', '2 Rollos de verduras, queso crema y salmón con aderezo cilantro.', 'Asian-Bistro', 1, '2015-06-01 20:40:35', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060131204124', 'Dumpling de Pollo', 'Dumplings de pollo.', 'Asian-Bistro', 1, '2015-06-01 20:41:24', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('201506013175827', 'Arroz Chino', 'Huevo, zanahoria, champiñón, elote baby, chícharo y brócoli al wok con salsa de soya.', 'Asian-Bistro', 1, '2015-06-01 17:58:27', NULL, NULL, 'Asian-Bistro-Arroz-Asiatica-Asian-Bistro'),
('2015060132204216', 'Pan al vapor de Rib Eye', 'Pan al vapor de Rib Eye.', 'Asian-Bistro', 1, '2015-06-01 20:42:16', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060133204303', 'Pan al vapor de cerdo BBQ', 'Pan al vapor de cerdo BBQ.', 'Asian-Bistro', 1, '2015-06-01 20:43:03', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060134204344', 'Dumpling de Vegetales', 'Dumpling relleno de vegetales.', 'Asian-Bistro', 1, '2015-06-01 20:43:44', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060135204416', 'Ebi Spring Roll', '2 rollos de camarón y verduras con chutney de mango.', 'Asian-Bistro', 1, '2015-06-01 20:44:16', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060136204454', 'Spring Roll', '2 rollos de verduras y hongos sazonados al wok con aderezo de mostaza y miel.', 'Asian-Bistro', 1, '2015-06-01 20:44:54', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060137204553', 'Mini Fish Cakes', '4 croquetas de diferentes pescados y mariscos con ensalada de espinaca, cilantro y chutney de mango.', 'Asian-Bistro', 1, '2015-06-01 20:45:53', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060138204629', 'Mariposas de Cangrejo', '5 Crujientes empanadas con queso crema, cangrejo y un toque de picante.', 'Asian-Bistro', 1, '2015-06-01 20:46:29', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060139204708', 'Gyo Samosa', '5 Mariposas de carne con chutney de mango.', 'Asian-Bistro', 1, '2015-06-01 20:47:08', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060140204747', 'Tori Gyoza', '5 raviollies japoneses rellenos de pollo, marinado con soya y aceite de ajonjolí.', 'Asian-Bistro', 1, '2015-06-01 20:47:47', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('2015060141204815', 'Ton Gyoza', '7 raviollies japoneses rellenos de cerdo marinado con jengibre y cebollín.', 'Asian-Bistro', 1, '2015-06-01 20:48:15', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('201506014180247', 'Arroz Pekin', 'Pato laqueado, salteado al wok con salsa de ciruela y vegetales.', 'Asian-Bistro', 1, '2015-06-01 18:02:47', NULL, NULL, 'Asian-Bistro-Arroz-Asiatica-Asian-Bistro'),
('2015060142204902', 'Salmón Grill Yasai', 'Salmón y espárragos al grill con ensalada de lechugas mixtas, germen, champiñón y nuez de la india, con aderezo de jitomate y jengibre.', 'Asian-Bistro', 1, '2015-06-01 20:49:02', NULL, NULL, 'Asian-Bistro-Ensaladas-Asiatica-Asian-Bistro'),
('2015060143204944', 'Thai Grill Yasai', 'Camarones y piña a la parrilla sobre una cama de espinacas y jitomate cherry, acompañado de papa al curry y aderezo del chef.', 'Asian-Bistro', 1, '2015-06-01 20:49:44', NULL, NULL, 'Asian-Bistro-Ensaladas-Asiatica-Asian-Bistro'),
('2015060144205010', 'Asian Garden', 'Pollo a la parrilla sobre ensalada con chícharo japonés, zanahoria fileteada, aguacate y nuez caramelizada, con aderezo Teriyaki y un toque de lluvia primavera.', 'Asian-Bistro', 1, '2015-06-01 20:50:10', NULL, NULL, 'Asian-Bistro-Ensaladas-Asiatica-Asian-Bistro'),
('2015060145205205', 'Tori Fry', 'Pechuga de pollo empanizada con ensalada de pepino, pimiento rojo, apio, ejote, aguacate y lechugas con aderezo oriental de perejil.', 'Asian-Bistro', 1, '2015-06-01 20:52:05', NULL, NULL, 'Asian-Bistro-Ensaladas-Asiatica-Asian-Bistro'),
('2015060146205358', 'Tacos de lechuga chinos', 'De verduras, hongos salteados al wok y nuez caramelizada.', 'Asian-Bistro', 1, '2015-06-01 20:53:58', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060147205434', 'Tacos de lechuga chinos con pollo', 'De verduras, hongos salteados al wok y nuez caramelizada con pollo salteado al wok.', 'Asian-Bistro', 1, '2015-06-01 20:54:34', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060148205517', 'Tacos de lechuga chinos con camarón', 'De verduras, hongos salteados al wok y nuez caramelizada con camarón salteado al wok.', 'Asian-Bistro', 1, '2015-06-01 20:55:17', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060149205552', 'Tacos de pereji fritos', 'Sazonado con ajo y limón, servidos en hojas de lechuga y salsa de ciruela.', 'Asian-Bistro', 1, '2015-06-01 20:55:52', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060150205650', 'Tacos de perejil fritos con camarón', 'Con camarón sazonado con ajo y limón, servidos en hojas de lechuga y salsa de ciruela', 'Asian-Bistro', 1, '2015-06-01 20:56:50', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060151205958', 'Steak Roll', 'Rollitos de ribe eye salteados el wok, con salsa de ajonjolí y espárragos al grill.', 'Asian-Bistro', 1, '2015-06-01 20:59:58', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('201506015180339', 'Arroz BanGkok', 'Combinación dulce de pollo, camarón, nuez de la india y vegetales al wok con curry y cilantro.', 'Asian-Bistro', 1, '2015-06-01 18:03:39', NULL, NULL, 'Asian-Bistro-Arroz-Asiatica-Asian-Bistro'),
('2015060152210054', 'Alitas BBQ', 'Deliciosas alitas caramelizadas al wok en salsa agridulce china.', 'Asian-Bistro', 1, '2015-06-01 21:00:54', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060153210519', 'Mo-Shu Tuna roll', 'Tacos de atún sellados al grill, verduras y aderezo de cilantro.', 'Asian-Bistro', 1, '2015-06-01 21:05:19', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060154210627', 'Tiger Satay', '2 Brochetas de camarón a las brasas, marinadas en salsa de coco, nuez caramelizada y cilantro.', 'Asian-Bistro', 1, '2015-06-01 21:06:27', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060155210702', 'Dragon Satay', '2 Brochetas de pollo a las brasas marinadas en salsa de coco, nuez caremelizada y cilantro.', 'Asian-Bistro', 1, '2015-06-01 21:07:02', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060156210740', 'Alitas Szechuan', 'Crujientes alitas de pollo rebozadas en salsa sriracha.', 'Asian-Bistro', 1, '2015-06-01 21:07:40', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060157210831', 'Saigon Roll', 'Fresco rollo vietnamita de hoja de arroz, con camarón, verdura, menta y cilantro', 'Asian-Bistro', 1, '2015-06-01 21:08:31', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060158210859', 'Costillas BBQ', '6 piezas caramelizadas al wok en salsa agridulce china', 'Asian-Bistro', 1, '2015-06-01 21:08:59', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060159210932', 'Tom tom cat fish', 'Crujientes láminas de pescado acompañado de sal y pimienta con aderezo de cítricos y perejil.', 'Asian-Bistro', 1, '2015-06-01 21:09:32', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060160211055', 'Calamares dragón', 'Crujientes aros de calamar salteados al wok con ajo, pimientos mixtos y cebolla con aderezo de chipotle.', 'Asian-Bistro', 1, '2015-06-01 21:10:55', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060161211227', 'Kushiague queso manchego', '2 Brochetas empanizadas de queso manchego.', 'Asian-Bistro', 1, '2015-06-01 21:12:27', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('201506016180440', 'Arroz Jazmín', 'Variedad de arroz de grano largo con un aroma y sabor particular, excelente como acompañamiento.', 'Asian-Bistro', 1, '2015-06-01 18:04:40', NULL, NULL, 'Asian-Bistro-Arroz-Asiatica-Asian-Bistro'),
('2015060162211300', 'Kushiague camarón queso crema', '2 Brochetas empanizadas de Camarón y queso crema.', 'Asian-Bistro', 1, '2015-06-01 21:13:00', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060163211332', 'Kushiague Salmón queso crema', '2 Brochetas empanizadas de Salmón y queso crema.', 'Asian-Bistro', 1, '2015-06-01 21:13:32', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060164211402', 'Kushiague kanikama y queso crema', '2 Brochetas empanizadas de Kanikama y queso crema.', 'Asian-Bistro', 1, '2015-06-01 21:14:02', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060165211447', 'Costillas Asian', '6 Piezas glaseadas al grill en salsa teriyaki y ajonjolí.', 'Asian-Bistro', 1, '2015-06-01 21:14:47', NULL, NULL, 'Asian-Bistro-Entradas-Asiatica-Asian-Bistro'),
('2015060166211527', 'Ebi Tempura', 'Camarones y verduras en salsa tempura.', 'Asian-Bistro', 1, '2015-06-01 21:15:27', NULL, NULL, 'Asian-Bistro-Especialidades-Asiatica-Asian-Bi'),
('2015060167211606', 'Mr. Chins Beef', 'Láminas de res salteadas con cebollín, salsa sizzling y un toque de chile serrano (incluye tazon de arroz).', 'Asian-Bistro', 1, '2015-06-01 21:16:06', NULL, NULL, 'Asian-Bistro-Especialidades-Asiatica-Asian-Bi'),
('2015060168211644', 'Asian Crab', 'Crujiente cangrejo concha suave, con papa al curry y aderezo de cilantro.', 'Asian-Bistro', 1, '2015-06-01 21:16:44', NULL, NULL, 'Asian-Bistro-Especialidades-Asiatica-Asian-Bi'),
('2015060169211728', 'Red Curry Tuna', 'Atún sellado y pulpo a la parrilla al curry con berenjenas al wok en aderezo de jitomate- jengibre.', 'Asian-Bistro', 1, '2015-06-01 21:17:28', NULL, NULL, 'Asian-Bistro-Especialidades-Asiatica-Asian-Bi'),
('2015060170211808', 'Sandwich Asian Bistro', 'Con pechuga teriyaki y cebolla morada a la parrilla, aguacate, germen de alfalfa y aderezo de curry, acompañado de papas a la francesa.', 'Asian-Bistro', 1, '2015-06-01 21:18:08', NULL, NULL, 'Asian-Bistro-Especialidades-Asiatica-Asian-Bi'),
('2015060171212405', 'Chiken Ginger', 'Noodle transparente con pollo y piña a la parrilla, cilantro, germen, jícama, zanahoria y aderezo teriyaki (se sirve frío).', 'Asian-Bistro', 1, '2015-06-01 21:24:05', NULL, NULL, 'Asian-Bistro-Noodles-Asiatica-Asian-Bistro'),
('201506017180605', 'Pollo Hunan', 'Crujientes trozos de pollo con ajonjolí salteados en salsa especial (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 18:06:05', NULL, NULL, 'Asian-Bistro-Aves-Asiatica-Asian-Bistro'),
('2015060172212441', 'Ebi Grill Noodles', 'Camarones a la parrilla con tallarines, champiñones, brócoli y germen de soya al wok con nuez de la india.', 'Asian-Bistro', 1, '2015-06-01 21:24:41', NULL, NULL, 'Asian-Bistro-Noodles-Asiatica-Asian-Bistro'),
('2015060173212508', 'Beef and Hokkien', 'Láminas de res salteadas al wok con noodles chinos, cebollín, brócoli, chícharo chino y salsa law chow.', 'Asian-Bistro', 1, '2015-06-01 21:25:08', NULL, NULL, 'Asian-Bistro-Noodles-Asiatica-Asian-Bistro'),
('2015060174212546', 'Stir Fry', 'Noodle udon, láminas de pollo y vegetales salteados al wok con salsa yakitori y cebollín.', 'Asian-Bistro', 1, '2015-06-01 21:25:46', NULL, NULL, 'Asian-Bistro-Noodles-Asiatica-Asian-Bistro'),
('2015060175212631', 'Chow Mein', 'Noodle chino con camarones y vegetales salteados al wok con salsa de ciruela y ajo.', 'Asian-Bistro', 1, '2015-06-01 21:26:31', NULL, NULL, 'Asian-Bistro-Noodles-Asiatica-Asian-Bistro'),
('2015060176213231', 'Salmón Grill', 'Salmón a la parrilla con mantequilla de jengibre, kanikama y verduras salteadas al wok (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 21:32:31', NULL, NULL, 'Asian-Bistro-Pescados-y-mariscos-Asiatica-Asi'),
('2015060177213338', 'Noodles Crujientes', 'Camarones y vegetales salteados al wok en salsa de ciruela y vino blanco sobre tallarín frito.', 'Asian-Bistro', 1, '2015-06-01 21:33:38', NULL, NULL, 'Asian-Bistro-Pescados-y-mariscos-Asiatica-Asi'),
('2015060178213422', 'Salmón Asian Bistro', 'Delicioso filete al vapor servido con vegetales al wok y salsa ponzu (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 21:34:22', NULL, NULL, 'Asian-Bistro-Pescados-y-mariscos-Asiatica-Asi'),
('2015060179213545', 'Camarones Malayos', 'Camarones con salsa de melón y licor de naranja en una cama de lechuga (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 21:35:45', NULL, NULL, 'Asian-Bistro-Pescados-y-mariscos-Asiatica-Asi'),
('2015060180213621', 'Camarones Beijing', 'Salteados al wok en salsa obscura ligeramente picantes y nuez caramelizada (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 21:36:21', NULL, NULL, 'Asian-Bistro-Pescados-y-mariscos-Asiatica-Asi'),
('2015060181213811', 'Hot Fish', 'Crujientes láminas de pescado en salsa obscura ligeramente picante.', 'Asian-Bistro', 1, '2015-06-01 21:38:11', NULL, NULL, 'Asian-Bistro-Pescados-y-mariscos-Asiatica-Asi'),
('201506018180720', 'Pollo Asian Bistro', 'Suaves láminas de pollo con brócoli al wok y salsa de ciruela (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 18:07:20', NULL, NULL, 'Asian-Bistro-Aves-Asiatica-Asian-Bistro'),
('2015060182213845', 'Camarones al Curry', 'Salteados al wok con pimientos, chícharo chino, brócoli y tallo de lechuga chicoria (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 21:38:45', NULL, NULL, 'Asian-Bistro-Pescados-y-mariscos-Asiatica-Asi'),
('2015060183213944', 'Camarones Asian Bistro', 'Crujientes camarones salteados en salsa agridulce law chow.', 'Asian-Bistro', 1, '2015-06-01 21:39:44', NULL, NULL, 'Asian-Bistro-Pescados-y-mariscos-Asiatica-Asi'),
('2015060184214018', 'Camarones Bora Bora', 'Empanizados, con salsa de coco-naranja y frutas tropicales.', 'Asian-Bistro', 1, '2015-06-01 21:40:18', NULL, NULL, 'Asian-Bistro-Pescados-y-mariscos-Asiatica-Asi'),
('2015060185214140', 'Sopa Kum Lee', 'Sopa de combinación de tres sabores.', 'Asian-Bistro', 1, '2015-06-01 21:41:40', NULL, NULL, 'Asian-Bistro-Sopas-Asiatica-Asian-Bistro'),
('2015060186214215', 'Sopa Ebi Thai', 'Sopa cristalina de camarón, verduras y tallarín harusame con esencia de lima y cilantro.', 'Asian-Bistro', 1, '2015-06-01 21:42:15', NULL, NULL, 'Asian-Bistro-Sopas-Asiatica-Asian-Bistro'),
('2015060187214245', 'Sopa Won Ton', 'Láminas y dumplings de cerdo con verduras chinas y consomé de vino blanco.', 'Asian-Bistro', 1, '2015-06-01 21:42:45', NULL, NULL, 'Asian-Bistro-Sopas-Asiatica-Asian-Bistro'),
('2015060188214321', 'Sopa Hot and Sour', 'Obscura sopa de hongos y vegetales orientales, con tofu y ligero sabor picante con o sin Pollo.', 'Asian-Bistro', 1, '2015-06-01 21:43:21', NULL, NULL, 'Asian-Bistro-Sopas-Asiatica-Asian-Bistro'),
('2015060190214547', 'Edamame', 'Frijol de soya al vapor, con aceite de ajonjolí, sal y pimienta.', 'Asian-Bistro', 1, '2015-06-01 21:45:47', NULL, NULL, 'Asian-Bistro-Veggie-Asiatica-Asian-Bistro'),
('2015060191214619', 'Ejotes y esparragos', 'Salteados al wok con ajo, jengibre y un toque de salsa dragón.', 'Asian-Bistro', 1, '2015-06-01 21:46:19', NULL, NULL, 'Asian-Bistro-Veggie-Asiatica-Asian-Bistro'),
('201506019180759', 'Pollo Kung Pao', 'Láminas de pollo con cacahuate y castaña, salteado al wok con salsa ligeramente picante (incluye un tazón de arroz jazmín para acompañar).', 'Asian-Bistro', 1, '2015-06-01 18:07:59', NULL, NULL, 'Asian-Bistro-Aves-Asiatica-Asian-Bistro'),
('2015060192214656', 'Esparragos Grill', 'Con salsa yakitori, cebollín y ajonjolí.', 'Asian-Bistro', 1, '2015-06-01 21:46:56', NULL, NULL, 'Asian-Bistro-Veggie-Asiatica-Asian-Bistro'),
('2015060193214730', 'Tofu raíz de loto', 'Láminas de tofu y raíz de loto salteadas al wok con berenjena y salsa del chef.', 'Asian-Bistro', 1, '2015-06-01 21:47:30', NULL, NULL, 'Asian-Bistro-Veggie-Asiatica-Asian-Bistro'),
('2015060194214809', 'Buddha Grill', 'Espárrago, champiñón, calabaza, zanahoria, berenjena, brócoli y col de asia, marinadas y asadas al grill con soya.', 'Asian-Bistro', 1, '2015-06-01 21:48:09', NULL, NULL, 'Asian-Bistro-Veggie-Asiatica-Asian-Bistro'),
('2015060195220603', 'Chirashi', 'Atún tataki, salmón tataki, pulpo, camarón, cangrejo, masago, esparrago, pepino, kisami nori, gari y wasabi. Sobre una cama de arroz avinagrado.', 'Asian-Bistro', 1, '2015-06-01 22:06:03', NULL, NULL, 'Asian-Bistro-Chirashi-Japonesa-Asian-Bistro'),
('20150714100151849', 'Tuna', 'Atún, aguacate, spicy de atún, kisami nori, sobre una cama de arroz avinagrado.', 'Asian-Bistro', 1, '2015-07-14 15:18:49', NULL, NULL, 'Asian-Bistro-Sushi-Oke-Japonesa-Asian-Bistro'),
('20150714101152210', 'Hamachi', 'Spicy de hamachi, aguacate, kisami nori, sobre una cama de arroz avinagrado.', 'Asian-Bistro', 1, '2015-07-14 15:22:10', NULL, NULL, 'Asian-Bistro-Sushi-Oke-Japonesa-Asian-Bistro'),
('20150714102152328', 'Sashimi Sake', 'Salmón tataki con salsa negi, chile, poro frito y microgreen.', 'Asian-Bistro', 1, '2015-07-14 15:23:28', NULL, NULL, 'Asian-Bistro-Sashimi-Japonesa-Asian-Bistro'),
('20150714103152401', 'Sashimi Tuna', 'Atún tataki con salsa negi, ajo frito, cebollín, nabo y microgreen.', 'Asian-Bistro', 1, '2015-07-14 15:24:01', NULL, NULL, 'Asian-Bistro-Sashimi-Japonesa-Asian-Bistro'),
('20150714104152438', 'Sashimi Mix', 'Salmón, hamachi, atún y huachinango, con salsa de negi, cilantro, chile, nabo y ajo frito.', 'Asian-Bistro', 1, '2015-07-14 15:24:38', NULL, NULL, 'Asian-Bistro-Sashimi-Japonesa-Asian-Bistro'),
('20150714105152512', 'Sashimi Hamachi', 'Hamachi acompañado con salsa negi, cilantro, poro frito, cebollín y microgreen.', 'Asian-Bistro', 1, '2015-07-14 15:25:12', NULL, NULL, 'Asian-Bistro-Sashimi-Japonesa-Asian-Bistro'),
('20150714106153328', 'Hamachi Especial', 'Cono de algo con arroz, lechuga, masago, salsa spicy, microgreen, ajo frito y Hamach', 'Asian-Bistro', 1, '2015-07-14 15:33:28', NULL, NULL, 'Asian-Bistro-Temaki-clasico-Japonesa-Asian-Bi'),
('20150714107153404', 'Sake Especial', 'Cono de algo con arroz, lechuga, masago, salsa spicy, microgreen, ajo frito y Sake.', 'Asian-Bistro', 1, '2015-07-14 15:34:04', NULL, NULL, 'Asian-Bistro-Temaki-clasico-Japonesa-Asian-Bi'),
('20150714108153446', 'Tuna Especial', 'Cono de algo con arroz, lechuga, masago, salsa spicy, microgreen, ajo frito y Tuna.', 'Asian-Bistro', 1, '2015-07-14 15:34:46', NULL, NULL, 'Asian-Bistro-Temaki-clasico-Japonesa-Asian-Bi'),
('20150714109153527', 'Unagui con Cono de;', 'Cono de pepino con unagui.', 'Asian-Bistro', 1, '2015-07-14 15:35:27', NULL, NULL, 'Asian-Bistro-Temaki-clasico-Japonesa-Asian-Bi'),
('20150714110154256', 'Ebi con Cono de;', 'Cono de alga con camarón ó Cono de pepino con camarón.', 'Asian-Bistro', 1, '2015-07-14 15:42:56', NULL, NULL, 'Asian-Bistro-Temaki-clasico-Japonesa-Asian-Bi'),
('20150714111154456', 'Zuzuki con Cono de;', 'Cono de pepino con róbalo ó Cono de alga con róbalo.', 'Asian-Bistro', 1, '2015-07-14 15:44:56', NULL, NULL, 'Asian-Bistro-Temaki-clasico-Japonesa-Asian-Bi'),
('20150714112154613', 'Tako con Cono de;', 'Cono de alga con pulpo ó Cono de pepino con pulpo.', 'Asian-Bistro', 1, '2015-07-14 15:46:13', NULL, NULL, 'Asian-Bistro-Temaki-clasico-Japonesa-Asian-Bi'),
('20150714113154731', 'Kanikama con Cono de;', 'Cono de pepino con cangrejo ó Cono de alga con cangrejo.', 'Asian-Bistro', 1, '2015-07-14 15:47:31', NULL, NULL, 'Asian-Bistro-Temaki-clasico-Japonesa-Asian-Bi'),
('20150714114155016', 'Spicy Tuna con Cono de;', 'Cono de pepino ó alga con atún, cebollín y sriracha.', 'Asian-Bistro', 1, '2015-07-14 15:50:16', NULL, NULL, 'Asian-Bistro-Temaki-clasico-Japonesa-Asian-Bi'),
('20150714115155127', 'Tobiko con Cono de;', 'Cono de pepino o alga con hueva de pez volador.', 'Asian-Bistro', 1, '2015-07-14 15:51:27', NULL, NULL, 'Asian-Bistro-Temaki-clasico-Japonesa-Asian-Bi'),
('20150714116155250', 'Ikura con Cono de;', 'Cono de pepino ó alga con hueva de salmón.', 'Asian-Bistro', 1, '2015-07-14 15:52:50', NULL, NULL, 'Asian-Bistro-Temaki-clasico-Japonesa-Asian-Bi'),
('20150714118160208', 'Sake con Cono de;', 'Cono de pepino ó alga con salmón.', 'Asian-Bistro', 1, '2015-07-14 16:02:08', NULL, NULL, 'Asian-Bistro-Temaki-clasico-Japonesa-Asian-Bi'),
('20150714120161010', 'Sake Ahumado con Cono de;', 'Cono de alga o pepino con salmón ahumado.', 'Asian-Bistro', 1, '2015-07-14 16:10:10', NULL, NULL, 'Asian-Bistro-Temaki-clasico-Japonesa-Asian-Bi'),
('2015071496151529', 'Sunomono', 'Camarón, cangrejo, pulpo, ikura con pepino y fideo de arroz, aderezado con vinagreta dashi.', 'Asian-Bistro', 1, '2015-07-14 15:15:29', NULL, NULL, 'Asian-Bistro-Entrada-Japonesa-Asian-Bistro'),
('2015071497151618', 'Tuna Salad', 'Atún sellado con sal y pimienta con ensalada de lechuga, aderezo con salsa de negi.', 'Asian-Bistro', 1, '2015-07-14 15:16:18', NULL, NULL, 'Asian-Bistro-Entrada-Japonesa-Asian-Bistro'),
('2015071498151656', 'Sea Sweet Salad', 'Ensalada de algas con vinagreta de arroz, ligeramente picante.', 'Asian-Bistro', 1, '2015-07-14 15:16:56', NULL, NULL, 'Asian-Bistro-Entrada-Japonesa-Asian-Bistro'),
('2015071499151811', 'Sake', 'Salmón fresco, aguacate, spicy de salmón, kisami nori, sobre una cama de arroz avinagrado.', 'Asian-Bistro', 1, '2015-07-14 15:18:11', NULL, NULL, 'Asian-Bistro-Sushi-Oke-Japonesa-Asian-Bistro'),
('20150715121152055', 'Tuna', 'Piezas de arroz con pescado/marisco encima.', 'Asian-Bistro', 1, '2015-07-15 15:20:55', NULL, NULL, 'Asian-Bistro-Niguiri-especial-Japonesa-Asian-'),
('20150715122152125', 'Ebi', 'Piezas de arroz con pescado/marisco encima.', 'Asian-Bistro', 1, '2015-07-15 15:21:25', NULL, NULL, 'Asian-Bistro-Niguiri-especial-Japonesa-Asian-'),
('20150715123152211', 'Tako', 'Piezas de arroz con pescado/marisco encima.', 'Asian-Bistro', 1, '2015-07-15 15:22:11', NULL, NULL, 'Asian-Bistro-Niguiri-especial-Japonesa-Asian-'),
('20150715124152246', 'Kanikama', 'Piezas de arroz con pescado/marisco encima.', 'Asian-Bistro', 1, '2015-07-15 15:22:46', NULL, NULL, 'Asian-Bistro-Niguiri-especial-Japonesa-Asian-'),
('20150715125152326', 'Sake', 'Piezas de arroz con pescado/marisco encima.', 'Asian-Bistro', 1, '2015-07-15 15:23:26', NULL, NULL, 'Asian-Bistro-Niguiri-especial-Japonesa-Asian-'),
('20150715126152357', 'Spicy Tuna', 'Piezas de arroz con pescado/marisco encima.', 'Asian-Bistro', 1, '2015-07-15 15:23:57', NULL, NULL, 'Asian-Bistro-Niguiri-especial-Japonesa-Asian-'),
('20150715127152428', 'Tobiko', 'Piezas de arroz con pescado/marisco encima.', 'Asian-Bistro', 1, '2015-07-15 15:24:28', NULL, NULL, 'Asian-Bistro-Niguiri-especial-Japonesa-Asian-'),
('20150715128152501', 'Unagui', '-', 'Asian-Bistro', 1, '2015-07-15 15:25:01', NULL, NULL, 'Asian-Bistro-Niguiri-especial-Japonesa-Asian-'),
('20150715129152542', 'Ikura', '-', 'Asian-Bistro', 1, '2015-07-15 15:25:42', NULL, NULL, 'Asian-Bistro-Niguiri-especial-Japonesa-Asian-'),
('20150715130152621', 'Hamachi', '-', 'Asian-Bistro', 1, '2015-07-15 15:26:21', NULL, NULL, 'Asian-Bistro-Niguiri-especial-Japonesa-Asian-'),
('20150715131153248', 'Nigiri Sampler', 'Piezas de arroz con pescado/marisco encima.', 'Asian-Bistro', 1, '2015-07-15 15:32:48', NULL, NULL, 'Asian-Bistro-Niguiri-especial-Japonesa-Asian-'),
('20150715132153641', 'Yanse Roll Tampico', 'XF: Hoja de arroz y hoja de soya, salsa asian XD: Tampico, aguacate, pepino y kanikama.', 'Asian-Bistro', 1, '2015-07-15 15:36:41', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715133153718', 'Yanse Roll Yasai', 'XF: Hoja de arroz y hoja de soya, salsa de chabacano XD: Pepino, zanahoria, espinaca, chuka (ensalada de algas).', 'Asian-Bistro', 1, '2015-07-15 15:37:18', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715134153815', 'Yanse Roll Spicy Sake', 'XF: Hoja de arroz y hoja de soya, salsa de negi XD: Spicy de salmón, lechuga y aguacate.', 'Asian-Bistro', 1, '2015-07-15 15:38:15', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715135153901', 'Tokken Roll', 'XF: Nori XD: Cangrejo, aguacate, queso dinamita y salsa chipotle.', 'Asian-Bistro', 1, '2015-07-15 15:39:01', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715137153941', 'Kawaii Roll', 'XF: Nori capeado, tampico, poro frito y salsa de negi XD: Salmón fresco, aguacate, zanahoria, espárrago, mezcla de mariscos.', 'Asian-Bistro', 1, '2015-07-15 15:39:41', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715138154020', 'Kyoto Roll', 'XF: Nori y salsa spicy XD: Queso crema, aguacate, zanahoria, lechuga y pollo empanizado.', 'Asian-Bistro', 1, '2015-07-15 15:40:20', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715139154057', 'Rainbow Roll', 'XF: Salmón y atún fresco, gari, cebollín y chile picado XD: Pepino, aguacate, canrgejo y masago.', 'Asian-Bistro', 1, '2015-07-15 15:40:57', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715140154139', 'Kazan Roll', 'XF: Camarón empanizado y salsa tampico XD: Aguacate y queso crema.', 'Asian-Bistro', 1, '2015-07-15 15:41:39', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715141154219', 'Niku Roll', 'XF: Filete a la mantequilla, queso crema, poro frito y rodaja de chile XD: Cangrejo, aguacate y espárrago, salsa de chipotle.', 'Asian-Bistro', 1, '2015-07-15 15:42:19', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715142154252', 'Haru Roll', 'XF: Masago XD: Salmón fresco, cangrejo, piel de salmón, tampico, pepino y aguacate.', 'Asian-Bistro', 1, '2015-07-15 15:42:52', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715143154327', 'Okinawa Roll', 'XF: Anguila, almendra y salsa de anguila XD: Camarón empanizado, queso crema, pepino, aguacate.', 'Asian-Bistro', 1, '2015-07-15 15:43:27', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715144154519', 'Osaka Roll', 'XF: Queso crema, espinaca, gratinado de mezcla de mariscos, con salsa spicy.XD: Zanahoria, aguacate, cebollin, Salmón humado.', 'Asian-Bistro', 1, '2015-07-15 15:45:19', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715145154648', 'Ryuu Roll', 'XF:Queso crema salmón a la plamcha y salsa dragón.XD: Camarón capeado, kakiague y aguacate.', 'Asian-Bistro', 1, '2015-07-15 15:46:48', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715146155446', 'Baby Squid', 'Calamares rellenos de pasta especial de cangrejo, con salsa de anguila.', 'Asian-Bistro', 1, '2015-07-15 15:54:46', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715147155549', 'Spider Roll', 'XF: Arroz, arare y salsa de anguila. XD: Crujiente jaiba suave, lechuga, aguacate, nori y queso crema.', 'Asian-Bistro', 1, '2015-07-15 15:55:49', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715148155849', 'Taiwan Roll', 'XF: Queso Philadelphia, lluvia primavera, ajonjolí y salsa de anguila. XD: Nori, ostión, espinaca y aguacate.', 'Asian-Bistro', 1, '2015-07-15 15:58:49', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715149155932', 'Teriyaki Roll', 'XF: Hoja de arroz, salsa de anguila y chipotle.XD: Lechuga, cilantro, zanahoria y pollo teriyaki.', 'Asian-Bistro', 1, '2015-07-15 15:59:32', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715150160012', 'Samurai Roll', 'XF: Salmón y aguacate con aderezo de cítricos.XD: Nori, pepino, camarón, tobiko.', 'Asian-Bistro', 1, '2015-07-15 16:00:12', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715151160048', 'Ebi Dragon Roll', 'XF: Mango y aguacate con salsa de anguila.XD: Camarón empanizado, tobiko, aguacate, nori y queso crema.', 'Asian-Bistro', 1, '2015-07-15 16:00:48', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715152160130', 'Asian Roll', 'XF: Envuelto en pepino con salsa de anguila, trozos de camarón empanizado.XD: Nori con tartar de atún, aguacate, chips de tempura.', 'Asian-Bistro', 1, '2015-07-15 16:01:30', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715153160257', 'Avocado Roll', 'XF: Aguacate con salsa de anguila y nuez caramelizada. XD: Anguila, espárragos y nori.', 'Asian-Bistro', 1, '2015-07-15 16:02:57', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715154160340', 'Sumo Roll', 'XF: Nori, pepino, ajonjolí blanco y negro con salsa de anguila.XD: Kanikama, tampico, kakiague, aguacate y tobiko.', 'Asian-Bistro', 1, '2015-07-15 16:03:40', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715155160457', 'Ebi Tempura Roll', 'XF: Kakiague, salsa de chipotle y anguila.XD: Camarón témpura, aguacate y espárrago.', 'Asian-Bistro', 1, '2015-07-15 16:04:57', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715157161345', 'Crunch Roll', 'XF: Pasta de camarón empanizado, salsa chipotle y salsa de anguila.XD: Espárrago, queso philadelphia, aguacate.', 'Asian-Bistro', 1, '2015-07-15 16:13:45', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715158161934', 'Maguro Yasai', 'Ensalada de atún, pepino, espincaca, aguacate, aderezo teriyaki, aceite de ajonjolí y tobiko.', 'Asian-Bistro', 1, '2015-07-15 16:19:34', NULL, NULL, 'Asian-Bistro-Ensaladas-Asiatica-Asian-Bistro'),
('20150715159162014', 'Tuna Sashimi', 'Atún marinado en aderezo especial, mayonesa, germen, cebollín y arare.', 'Asian-Bistro', 1, '2015-07-15 16:20:14', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715160162151', 'Sake Sashimi', 'Salmón marinado en aderezo de cítricos con aguacate y callo de hecha empanizado.', 'Asian-Bistro', 1, '2015-07-15 16:21:51', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20150715161162509', 'Bento Sampler', 'Mochi de té verde, mini tempura helado, mini cono de mango y banana spring roll con dip de chocolate.', 'Asian-Bistro', 1, '2015-07-15 16:25:09', NULL, NULL, 'Asian-Bistro-Postres-Postres-Asian-Bistro'),
('20150715162162539', 'Fuji Volcano', 'Pastel de chocolate con hot fudge y helado de vainilla.', 'Asian-Bistro', 1, '2015-07-15 16:25:39', NULL, NULL, 'Asian-Bistro-Postres-Postres-Asian-Bistro'),
('20150715163162751', 'Banana Mitzu', 'Plátano tempura con miel, coco y helado de vainilla.', 'Asian-Bistro', 1, '2015-07-15 16:27:51', NULL, NULL, 'Asian-Bistro-Postres-Postres-Asian-Bistro'),
('20150715164162823', 'Cheese Cake', 'Pastel de queso con helado y topping de fresa, zarzamora, fudge de chocolate o cajeta.', 'Asian-Bistro', 1, '2015-07-15 16:28:23', NULL, NULL, 'Asian-Bistro-Postres-Postres-Asian-Bistro'),
('20150715165162857', 'Kaju Cones', 'Tres conitos de lychee, mango, manzana y crema pastelera.', 'Asian-Bistro', 1, '2015-07-15 16:28:57', NULL, NULL, 'Asian-Bistro-Postres-Postres-Asian-Bistro'),
('20150715166213249', 'Asian Tower', 'Torre de wonton crujiente con frutos del bosque y crema pastelera.', 'Asian-Bistro', 1, '2015-07-15 21:32:49', NULL, NULL, 'Asian-Bistro-Postres-Postres-Asian-Bistro'),
('20150715167213326', 'Sweet Spring Roll', 'Crujientes rollitos primavera de plátano, piña, coco, y frutos del bosque con fudge de chocolate para dip.', 'Asian-Bistro', 1, '2015-07-15 21:33:26', NULL, NULL, 'Asian-Bistro-Postres-Postres-Asian-Bistro'),
('20150715168213357', 'Midori Mein', 'Gelatina de midori con moras de melón con crema inglesa de cardamomo.', 'Asian-Bistro', 1, '2015-07-15 21:33:57', NULL, NULL, 'Asian-Bistro-Postres-Postres-Asian-Bistro'),
('20150715169213435', 'Tempura Helado', 'Helado de vainilla envuelto en un panecillo crujiente con topping de fresa, fudge de chocolate o cajeta.', 'Asian-Bistro', 1, '2015-07-15 21:34:35', NULL, NULL, 'Asian-Bistro-Postres-Postres-Asian-Bistro'),
('20150715170213511', 'Trio Creme Brulee', 'De jengibre, lemon grass y ajonjolí negro.', 'Asian-Bistro', 1, '2015-07-15 21:35:11', NULL, NULL, 'Asian-Bistro-Postres-Postres-Asian-Bistro'),
('20150715171220732', 'Agua Yunan', 'Kiwi con jengibre.', 'Asian-Bistro', 1, '2015-07-15 22:07:32', NULL, NULL, 'Asian-Bistro-Aguas-Exoticas-Bebidas-Asian-Bis'),
('20150715172220814', 'Agua Guandong', 'Zapote con menta.', 'Asian-Bistro', 1, '2015-07-15 22:08:14', NULL, NULL, 'Asian-Bistro-Aguas-Exoticas-Bebidas-Asian-Bis'),
('20150715173220847', 'Agua Jilin', 'Tuna con pepino.', 'Asian-Bistro', 1, '2015-07-15 22:08:47', NULL, NULL, 'Asian-Bistro-Aguas-Exoticas-Bebidas-Asian-Bis'),
('20150715174220922', 'Agua Quingai', 'Hierbabuena con lychee.', 'Asian-Bistro', 1, '2015-07-15 22:09:22', NULL, NULL, 'Asian-Bistro-Aguas-Exoticas-Bebidas-Asian-Bis'),
('20150715176221455', 'Portillo 750 mL', 'Merlot.', 'Asian-Bistro', 1, '2015-07-15 22:14:55', NULL, NULL, 'Asian-Bistro-Vino-Tinto-Bebidas-Asian-Bistro'),
('20150715177221534', 'Casa Madero Shiraz 750 mL', 'Shiraz.', 'Asian-Bistro', 1, '2015-07-15 22:15:34', NULL, NULL, 'Asian-Bistro-Vino-Tinto-Bebidas-Asian-Bistro'),
('20150715178221659', 'Casa Madero Shiraz 375 mL', 'Shiraz.', 'Asian-Bistro', 1, '2015-07-15 22:16:59', NULL, NULL, 'Asian-Bistro-Vino-Tinto-Bebidas-Asian-Bistro'),
('20150715179221759', 'Casa Madero Cabernet 750 mL', 'Cabernet.', 'Asian-Bistro', 1, '2015-07-15 22:17:59', NULL, NULL, 'Asian-Bistro-Vino-Tinto-Bebidas-Asian-Bistro'),
('20150715180221834', 'Casa Madero Cabernet 375 mL', 'Cabernet.', 'Asian-Bistro', 1, '2015-07-15 22:18:34', NULL, NULL, 'Asian-Bistro-Vino-Tinto-Bebidas-Asian-Bistro'),
('20150715181221929', 'Matarromera 750 mL', 'Tempranillo.', 'Asian-Bistro', 1, '2015-07-15 22:19:29', NULL, NULL, 'Asian-Bistro-Vino-Tinto-Bebidas-Asian-Bistro'),
('20150715182222006', 'Matarromera 375 mL', 'Tempranillo.', 'Asian-Bistro', 1, '2015-07-15 22:20:06', NULL, NULL, 'Asian-Bistro-Vino-Tinto-Bebidas-Asian-Bistro'),
('20150715183222407', 'Santa Digna 750 mL', 'Cabernet.', 'Asian-Bistro', 1, '2015-07-15 22:24:07', NULL, NULL, 'Asian-Bistro-Vino-Tinto-Bebidas-Asian-Bistro'),
('20150715184222857', 'Santa Digna 375 mL', 'Cabernet.', 'Asian-Bistro', 1, '2015-07-15 22:28:57', NULL, NULL, 'Asian-Bistro-Vino-Tinto-Bebidas-Asian-Bistro'),
('20150715185222938', 'Sangre de Toro 375 mL', 'Garnacha, mazuelo.', 'Asian-Bistro', 1, '2015-07-15 22:29:38', NULL, NULL, 'Asian-Bistro-Vino-Tinto-Bebidas-Asian-Bistro'),
('20150715186223013', 'Gran Sangre de Toro 750 mL', 'Garnacha, mazuelo y tempranillo.', 'Asian-Bistro', 1, '2015-07-15 22:30:13', NULL, NULL, 'Asian-Bistro-Vino-Tinto-Bebidas-Asian-Bistro'),
('20150715187223045', 'Cune Rioja 750 mL', 'Garnacha, tempranillo y mazuelo.', 'Asian-Bistro', 1, '2015-07-15 22:30:45', NULL, NULL, 'Asian-Bistro-Vino-Tinto-Bebidas-Asian-Bistro'),
('20150715188223540', 'Blueberry', '-', 'Asian-Bistro', 1, '2015-07-15 22:35:40', NULL, NULL, 'Asian-Bistro-The-Berry-Company-Bebidas-Asian-'),
('20150715189223606', 'Acai Berry', '-', 'Asian-Bistro', 1, '2015-07-15 22:36:06', NULL, NULL, 'Asian-Bistro-The-Berry-Company-Bebidas-Asian-'),
('20150715190223636', 'Pomegranate', '-', 'Asian-Bistro', 1, '2015-07-15 22:36:36', NULL, NULL, 'Asian-Bistro-The-Berry-Company-Bebidas-Asian-'),
('20150715191223914', 'Superberries red', '-', 'Asian-Bistro', 1, '2015-07-15 22:39:14', NULL, NULL, 'Asian-Bistro-The-Berry-Company-Bebidas-Asian-'),
('20150715192223937', 'Cranberry', '-', 'Asian-Bistro', 1, '2015-07-15 22:39:37', NULL, NULL, 'Asian-Bistro-The-Berry-Company-Bebidas-Asian-'),
('20150715193224008', 'Goji Berry', '-', 'Asian-Bistro', 1, '2015-07-15 22:40:08', NULL, NULL, 'Asian-Bistro-The-Berry-Company-Bebidas-Asian-'),
('20150715194224032', 'Superberries Purple', '-', 'Asian-Bistro', 1, '2015-07-15 22:40:32', NULL, NULL, 'Asian-Bistro-The-Berry-Company-Bebidas-Asian-'),
('20150715195224208', 'O´Douls', 'O´Douls', 'Asian-Bistro', 1, '2015-07-15 22:42:08', NULL, NULL, 'Asian-Bistro-Cerveza-Bebidas-Asian-Bistro'),
('20150715196224248', 'Sapporo Silver', 'Sapporo silver', 'Asian-Bistro', 1, '2015-07-15 22:42:48', NULL, NULL, 'Asian-Bistro-Cerveza-Bebidas-Asian-Bistro'),
('20150715197224334', 'Santa Digna Rosado 750 mL', 'Cabernet.', 'Asian-Bistro', 1, '2015-07-15 22:43:34', NULL, NULL, 'Asian-Bistro-Vino-Rosado-Bebidas-Asian-Bistro'),
('20150715198224404', 'V Casa Madero 750 mL', 'Cabernet.', 'Asian-Bistro', 1, '2015-07-15 22:44:04', NULL, NULL, 'Asian-Bistro-Vino-Rosado-Bebidas-Asian-Bistro'),
('20150715199224639', 'Verde Jazmin (Verde)', '-', 'Asian-Bistro', 1, '2015-07-15 22:46:39', NULL, NULL, 'Asian-Bistro-Tes-Bebidas-Asian-Bistro'),
('20150715200224711', 'Dragon Blend (Tisana)', '-', 'Asian-Bistro', 1, '2015-07-15 22:47:11', NULL, NULL, 'Asian-Bistro-Tes-Bebidas-Asian-Bistro'),
('20150715201224742', 'Teallenium (Verde)', '-', 'Asian-Bistro', 1, '2015-07-15 22:47:42', NULL, NULL, 'Asian-Bistro-Tes-Bebidas-Asian-Bistro'),
('20150715202224825', 'Verde Chai (Verde)', '-', 'Asian-Bistro', 1, '2015-07-15 22:48:25', NULL, NULL, 'Asian-Bistro-Tes-Bebidas-Asian-Bistro'),
('20150715203224907', 'Genmai Matcha', '-', 'Asian-Bistro', 1, '2015-07-15 22:49:07', NULL, NULL, 'Asian-Bistro-Tes-Bebidas-Asian-Bistro'),
('20150715204224936', 'Cherry Banana (Tisana)', '-', 'Asian-Bistro', 1, '2015-07-15 22:49:36', NULL, NULL, 'Asian-Bistro-Tes-Bebidas-Asian-Bistro'),
('20150715205225157', 'Moscu (Tisana)', '-', 'Asian-Bistro', 1, '2015-07-15 22:51:57', NULL, NULL, 'Asian-Bistro-Tes-Bebidas-Asian-Bistro'),
('20150715206225246', 'Oriental Spice (Negro)', '-', 'Asian-Bistro', 1, '2015-07-15 22:52:46', NULL, NULL, 'Asian-Bistro-Tes-Bebidas-Asian-Bistro'),
('20150715207225318', 'Exotic cinnamon (Negro)', '-', 'Asian-Bistro', 1, '2015-07-15 22:53:18', NULL, NULL, 'Asian-Bistro-Tes-Bebidas-Asian-Bistro'),
('20150715208225352', 'Coco Thai (Blanco)', '-', 'Asian-Bistro', 1, '2015-07-15 22:53:52', NULL, NULL, 'Asian-Bistro-Tes-Bebidas-Asian-Bistro'),
('20150715209225421', 'Chocomint (Negro)', '-', 'Asian-Bistro', 1, '2015-07-15 22:54:21', NULL, NULL, 'Asian-Bistro-Tes-Bebidas-Asian-Bistro'),
('20150715210225449', 'Puerl Nepal (Rojo)', '-', 'Asian-Bistro', 1, '2015-07-15 22:54:49', NULL, NULL, 'Asian-Bistro-Tes-Bebidas-Asian-Bistro'),
('20150716211193602', 'Viña Esmeralda 375 mL', 'Gewuztraminer', 'Asian-Bistro', 1, '2015-07-16 19:36:02', NULL, NULL, 'Asian-Bistro-Vino-Blanco-Bebidas-Asian-Bistro'),
('20150716212193701', 'Diamante 750 mL', 'Viura', 'Asian-Bistro', 1, '2015-07-16 19:37:01', NULL, NULL, 'Asian-Bistro-Vino-Blanco-Bebidas-Asian-Bistro'),
('20150716213193826', 'Perrier', 'Perrier.', 'Asian-Bistro', 1, '2015-07-16 19:38:26', NULL, NULL, 'Asian-Bistro-Refrescos-Bebidas-Asian-Bistro'),
('20150716214193920', 'Coca Cola', 'Coca Cola.', 'Asian-Bistro', 1, '2015-07-16 19:39:20', NULL, NULL, 'Asian-Bistro-Refrescos-Bebidas-Asian-Bistro'),
('20150716215193952', 'Coca Cola Light', 'Coca Cola Light.', 'Asian-Bistro', 1, '2015-07-16 19:39:52', NULL, NULL, 'Asian-Bistro-Refrescos-Bebidas-Asian-Bistro'),
('20150716216194019', 'Coca Cola Zero', 'Coca Cola Zero.', 'Asian-Bistro', 1, '2015-07-16 19:40:19', NULL, NULL, 'Asian-Bistro-Refrescos-Bebidas-Asian-Bistro'),
('20150716217194053', 'Sprite', 'Sprite.', 'Asian-Bistro', 1, '2015-07-16 19:40:53', NULL, NULL, 'Asian-Bistro-Refrescos-Bebidas-Asian-Bistro'),
('20150716218194121', 'Sidral', 'Sidral.', 'Asian-Bistro', 1, '2015-07-16 19:41:21', NULL, NULL, 'Asian-Bistro-Refrescos-Bebidas-Asian-Bistro'),
('20150716219194159', 'Sidral Light', 'Sidral Light.', 'Asian-Bistro', 1, '2015-07-16 19:41:59', NULL, NULL, 'Asian-Bistro-Refrescos-Bebidas-Asian-Bistro'),
('20150716220194228', 'Freska', 'Freska.', 'Asian-Bistro', 1, '2015-07-16 19:42:28', NULL, NULL, 'Asian-Bistro-Refrescos-Bebidas-Asian-Bistro'),
('20150716221194256', 'Fanta', 'Fanta.', 'Asian-Bistro', 1, '2015-07-16 19:42:56', NULL, NULL, 'Asian-Bistro-Refrescos-Bebidas-Asian-Bistro'),
('20150716222194350', 'Ciel Agua Mineral', 'Ciel Agua Mineral.', 'Asian-Bistro', 1, '2015-07-16 19:43:50', NULL, NULL, 'Asian-Bistro-Refrescos-Bebidas-Asian-Bistro'),
('20150716223194454', 'Ciel Agua Natural', 'Ciel Agua Natural', 'Asian-Bistro', 1, '2015-07-16 19:44:54', NULL, NULL, 'Asian-Bistro-Refrescos-Bebidas-Asian-Bistro'),
('20150716224194522', 'Ramune', 'Ramune.', 'Asian-Bistro', 1, '2015-07-16 19:45:22', NULL, NULL, 'Asian-Bistro-Refrescos-Bebidas-Asian-Bistro'),
('20150716225194608', 'Hapi Mandarin', 'Hapi Mandarin.', 'Asian-Bistro', 1, '2015-07-16 19:46:08', NULL, NULL, 'Asian-Bistro-Refrescos-Bebidas-Asian-Bistro'),
('20150716226195658', 'Café Americano', 'Café Americano.', 'Asian-Bistro', 1, '2015-07-16 19:56:58', NULL, NULL, 'Asian-Bistro-Cafes-Bebidas-Asian-Bistro'),
('20150716227195753', 'Café Americano Descafeinado', 'Café Americano Descafeinado.', 'Asian-Bistro', 1, '2015-07-16 19:57:53', NULL, NULL, 'Asian-Bistro-Cafes-Bebidas-Asian-Bistro'),
('20150716228195827', 'Café Express', 'Café Express.', 'Asian-Bistro', 1, '2015-07-16 19:58:27', NULL, NULL, 'Asian-Bistro-Cafes-Bebidas-Asian-Bistro'),
('20150716229195904', 'Café Express Descafeinado', 'Café Express Descafeinado', 'Asian-Bistro', 1, '2015-07-16 19:59:04', NULL, NULL, 'Asian-Bistro-Cafes-Bebidas-Asian-Bistro'),
('20150716230195953', 'Café Express Doble', 'Café Express Doble.', 'Asian-Bistro', 1, '2015-07-16 19:59:53', NULL, NULL, 'Asian-Bistro-Cafes-Bebidas-Asian-Bistro'),
('20150716231200028', 'Café Capuchino', 'Café Capuchino.', 'Asian-Bistro', 1, '2015-07-16 20:00:28', NULL, NULL, 'Asian-Bistro-Cafes-Bebidas-Asian-Bistro'),
('20150716232200107', 'Café Capuchino Descafeinado', 'Café Capuchino Descafeinado.', 'Asian-Bistro', 1, '2015-07-16 20:01:07', NULL, NULL, 'Asian-Bistro-Cafes-Bebidas-Asian-Bistro'),
('20150720233202214', 'Ton Gyosa', '7 ravioles japoneses rellenos de cerdo marinado con jengibre y cebollín.', 'Asian-Bistro', 1, '2015-07-20 20:22:14', NULL, NULL, 'Asian-Bistro-Dim-Sum-Asiatica-Asian-Bistro'),
('20150720233205504', 'Abulón Vietnamita', 'Finas láminasde abulón marinado con yuzu y aceite de ajonjolí. pimiento rojo, cilantro, germen y cebollín.', 'Asian-Bistro', 1, '2015-07-20 20:55:04', NULL, NULL, 'Asian-Bistro-Sashimi-Japonesa-Asian-Bistro'),
('20150807229154842', 'Pollito Yeye', 'Pollo agridulce con zanahoria y piña. Acompañado de tazón de arroz chino o guarnición a elegir.', 'Asian-Bistro', 1, '2015-08-07 15:48:42', NULL, NULL, 'Asian-Bistro-Asian-Kids-Asian-Kids-Asian-Bist'),
('20150807230155208', 'Magic Noodles', 'Fideos con zanahoria, chícharo chino y camarón, en una salsa de la casa. Acompañado de costillas BBQ o guarnición a elegir.', 'Asian-Bistro', 1, '2015-08-07 15:52:08', NULL, NULL, 'Asian-Bistro-Asian-Kids-Asian-Kids-Asian-Bist'),
('20150807231155354', 'Rollitos Yin', 'XF: Plátano machoXD: Camarón empanizado y queso crema.     Guarnición a elegir', 'Asian-Bistro', 1, '2015-08-07 15:53:54', NULL, NULL, 'Asian-Bistro-Asian-Kids-Asian-Kids-Asian-Bist'),
('20150807232155552', 'Sabanita Fang', 'Filete de res a la planca, de 150g, sazonadon con salsa Hu (soya, ajo, jengibre y aceite de oliva). Guarnición a elegir.', 'Asian-Bistro', 1, '2015-08-07 15:55:52', NULL, NULL, 'Asian-Bistro-Asian-Kids-Asian-Kids-Asian-Bist'),
('20150807233160101', 'Ebi Sweet', 'Camarones empanizados con coco rallado, acompañados de salsa de chabacano. Guarnición a elegir.', 'Asian-Bistro', 1, '2015-08-07 16:01:01', NULL, NULL, 'Asian-Bistro-Asian-Kids-Asian-Kids-Asian-Bist'),
('20150807234160345', 'Sandwich Kids', 'Mini chapata con pechuga teriyaki, aguacate, germen dealfalfa y mayonesa. Guarnición a elegir', 'Asian-Bistro', 1, '2015-08-07 16:03:45', NULL, NULL, 'Asian-Bistro-Asian-Kids-Asian-Kids-Asian-Bist'),
('20150807235160446', 'Chicken Pops', 'Bolitas crujientes de pollo estilo oriental, empanizadas. Guarnición a elegir.', 'Asian-Bistro', 1, '2015-08-07 16:04:46', NULL, NULL, 'Asian-Bistro-Asian-Kids-Asian-Kids-Asian-Bist'),
('20150807236160612', 'Ebi Dragon Kids', 'Por fuera: Mango y aguacatePor dentro: Camarón empanizado y queso crema con salsa dulce. Guarnición a elegir', 'Asian-Bistro', 1, '2015-08-07 16:06:12', NULL, NULL, 'Asian-Bistro-Asian-Kids-Asian-Kids-Asian-Bist'),
('20150807237160706', 'Fishi Taco', 'Tacos a la parrilla de pescado tempura con verduras y aderezo. Guarnición a elegir', 'Asian-Bistro', 1, '2015-08-07 16:07:06', NULL, NULL, 'Asian-Bistro-Asian-Kids-Asian-Kids-Asian-Bist'),
('20150807238160757', 'Happy Burguer', 'Bollo de pan al vapor con carne de res al estilo oriental y queso. Guarnición a elegir.', 'Asian-Bistro', 1, '2015-08-07 16:07:57', NULL, NULL, 'Asian-Bistro-Asian-Kids-Asian-Kids-Asian-Bist'),
('20150807239162739', 'Tempura Kids', 'Helado de vainilla  envuelto en panecillo crujiente con toping de fresa, chocolate o cajeta', 'Asian-Bistro', 1, '2015-08-07 16:27:39', NULL, NULL, 'Asian-Bistro-Postres-Asian-Kids-Asian-Bistro'),
('20150807240162800', 'Fuji Kids', 'Pastelito de chocolate con salsa de chocolate y helado de vainilla', 'Asian-Bistro', 1, '2015-08-07 16:28:00', NULL, NULL, 'Asian-Bistro-Postres-Asian-Kids-Asian-Bistro'),
('20150807241162952', 'Mochi Ice Cream', 'Fresa, vainilla y chocolate.', 'Asian-Bistro', 1, '2015-08-07 16:29:52', NULL, NULL, 'Asian-Bistro-Postres-Asian-Kids-Asian-Bistro');
INSERT INTO `producto` (`idProducto`, `Nombre`, `Descripcion`, `idSucursal`, `estado`, `registro`, `idModelo`, `keywork`, `idCategoriaSubcate`) VALUES
('20150807242163048', 'Mochi Ice Cream de Té Verde', 'Delicioso helado especial de té verde.', 'Asian-Bistro', 1, '2015-08-07 16:30:48', NULL, NULL, 'Asian-Bistro-Postres-Asian-Kids-Asian-Bistro'),
('20150807243163222', 'Bola de Helado', 'Lychee, Coco y Vainilla', 'Asian-Bistro', 1, '2015-08-07 16:32:22', NULL, NULL, 'Asian-Bistro-Postres-Asian-Kids-Asian-Bistro'),
('20150807244163656', 'Bola de Helado Especial', 'Té verde y Choco Menta', 'Asian-Bistro', 1, '2015-08-07 16:36:56', NULL, NULL, 'Asian-Bistro-Postres-Asian-Kids-Asian-Bistro'),
('20150807245165847', 'Coca Cola', 'Coca Cola de 355 ml con vaso coleccionable.', 'Asian-Bistro', 1, '2015-08-07 16:58:47', NULL, NULL, 'Asian-Bistro-Bebidas-Asian-Kids-Asian-Bistro'),
('20150807247170524', 'Sprite', 'Sprite de 355 ml con vaso coleccionable.', 'Asian-Bistro', 1, '2015-08-07 17:05:24', NULL, NULL, 'Asian-Bistro-Bebidas-Asian-Kids-Asian-Bistro'),
('20150807248170554', 'Sidral', 'Sidral de 355 ml con vaso coleccionable.', 'Asian-Bistro', 1, '2015-08-07 17:05:54', NULL, NULL, 'Asian-Bistro-Bebidas-Asian-Kids-Asian-Bistro'),
('20150807249170643', 'Freska', 'Freska de 355 ml con vaso coleccionable.', 'Asian-Bistro', 1, '2015-08-07 17:06:43', NULL, NULL, 'Asian-Bistro-Bebidas-Asian-Kids-Asian-Bistro'),
('20150807250170710', 'Fanta', 'Fanta de 355 ml con vaso coleccionable.', 'Asian-Bistro', 1, '2015-08-07 17:07:10', NULL, NULL, 'Asian-Bistro-Bebidas-Asian-Kids-Asian-Bistro'),
('20150807251170743', 'Ciel Agua Mineral', 'Ciel Agua Mineral de 355 ml con vaso coleccionable.', 'Asian-Bistro', 1, '2015-08-07 17:07:43', NULL, NULL, 'Asian-Bistro-Bebidas-Asian-Kids-Asian-Bistro'),
('20150807252171033', 'Ramune', 'Ramune de 200 ml.', 'Asian-Bistro', 1, '2015-08-07 17:10:33', NULL, NULL, 'Asian-Bistro-Bebidas-Asian-Kids-Asian-Bistro'),
('20150807253171120', 'Hapi Mandarin', 'Hapi Mandarin de 240 ml.', 'Asian-Bistro', 1, '2015-08-07 17:11:20', NULL, NULL, 'Asian-Bistro-Bebidas-Asian-Kids-Asian-Bistro'),
('20150807254171242', 'Electric Panda', 'Soda de mango maracuyá 500 ml', 'Asian-Bistro', 1, '2015-08-07 17:12:42', NULL, NULL, 'Asian-Bistro-Bebidas-Asian-Kids-Asian-Bistro'),
('20150807255171355', 'Red Dragon', 'Frapé de frutos rojos 500 ml', 'Asian-Bistro', 1, '2015-08-07 17:13:55', NULL, NULL, 'Asian-Bistro-Bebidas-Asian-Kids-Asian-Bistro'),
('20150807256171438', 'Magic Samurai', 'Frapé de talando 500 ml', 'Asian-Bistro', 1, '2015-08-07 17:14:38', NULL, NULL, 'Asian-Bistro-Bebidas-Asian-Kids-Asian-Bistro'),
('20150807257171512', 'Vaso Coleccionable', 'Vaso Coleccionable.', 'Asian-Bistro', 1, '2015-08-07 17:15:12', NULL, NULL, 'Asian-Bistro-Bebidas-Asian-Kids-Asian-Bistro'),
('20150810258164817', 'Porción de Salmón', 'Porción de 80 gr de Salmón.', 'Asian-Bistro', 1, '2015-08-10 16:48:17', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810259164906', 'Porción de Pescado', 'Porción de 80 gr de pescado.', 'Asian-Bistro', 1, '2015-08-10 16:49:06', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810260164940', 'Tampico', '88 gr de Tampico.', 'Asian-Bistro', 1, '2015-08-10 16:49:40', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810261165103', 'Orden de Papas', 'Orden de 200 gr de papas a la francesa.', 'Asian-Bistro', 1, '2015-08-10 16:51:03', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810262165144', 'Queso por fuera/por dentro', 'Queso por fuera/por dentro.', 'Asian-Bistro', 1, '2015-08-10 16:51:44', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810263165233', 'Salsa Anguila', '50 ml de Salsa Anguila.', 'Asian-Bistro', 1, '2015-08-10 16:52:33', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810264165312', 'Aderezo', '50 ml de Aderezo *Especificar en su pedido que aderezo desea.', 'Asian-Bistro', 1, '2015-08-10 16:53:12', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810265165350', 'Chabacano', 'Salsa dulce.', 'Asian-Bistro', 1, '2015-08-10 16:53:50', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810266165350', 'Chabacano', 'Salsa dulce.', 'Asian-Bistro', 1, '2015-08-10 16:53:50', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810267165700', 'Chipotle', 'Salsa cremosa de chipotle.', 'Asian-Bistro', 1, '2015-08-10 16:57:00', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810268165731', 'Ciruela', 'Salsa dulce de ciruela.', 'Asian-Bistro', 1, '2015-08-10 16:57:31', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810269165806', 'Dragón', 'Salsa picante.', 'Asian-Bistro', 1, '2015-08-10 16:58:06', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810270165843', 'Hunan', 'Salsa agridulce con ajonjolí.', 'Asian-Bistro', 1, '2015-08-10 16:58:43', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810271165921', 'Ponzu', 'Salsa Soya', 'Asian-Bistro', 1, '2015-08-10 16:59:21', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810272170000', 'Porción de Atún', 'Porción de 80 gr de Atún.', 'Asian-Bistro', 1, '2015-08-10 17:00:00', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20150810273170045', 'Porción de Camarón', 'Porción de 30 gr de Camarón', 'Asian-Bistro', 1, '2015-08-10 17:00:45', NULL, NULL, 'Asian-Bistro-Extras-Extras-Asian-Bistro'),
('20160225273210009', 'Chamipiñones', 'pizza para veganos de solo champiñones', 'B1-Restobar', 1, '2016-02-25 21:00:09', NULL, NULL, 'B1-Restobar-Pizzaz-Veganas-Pizzaz-B1-Restobar'),
('20170209274195941', 'rafael', 'rafi welcome to the party!', 'Asian-Bistro', 1, '2017-02-09 19:59:41', NULL, NULL, 'Asian-Bistro-Sushi-Japonesa-Asian-Bistro'),
('20170209275200249', 'hola mundo', 'gola mundo', 'Asian-Bistro', 1, '2017-02-09 20:02:49', NULL, NULL, 'Asian-Bistro-Arroz-Asiatica-Asian-Bistro'),
('20170209276200418', 'dsfkjnñ', 'knbdvl', 'Asian-Bistro', 1, '2017-02-09 20:04:18', NULL, NULL, 'Asian-Bistro-Arroz-Asiatica-Asian-Bistro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE IF NOT EXISTS `respuesta` (
  `idRespuesta` varchar(45) NOT NULL,
  `respuesta` varchar(550) DEFAULT NULL,
  `registro` datetime DEFAULT NULL,
  `idComentario` varchar(45) NOT NULL,
  PRIMARY KEY (`idRespuesta`),
  KEY `fk_Respuesta_Comentario1_idx` (`idComentario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `idSubcategoria` varchar(45) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idSucursal` varchar(45) NOT NULL,
  PRIMARY KEY (`idSubcategoria`),
  KEY `fk_Subcategoria_Sucursal1_idx` (`idSucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`idSubcategoria`, `Nombre`, `Descripcion`, `url`, `estado`, `idSucursal`) VALUES
('Aguas-Exoticas', 'Aguas Exóticas', '   ', 'b9e39463732b4d14b89a591c30de8d72.jpg', 1, 'Asian-Bistro'),
('Arroz', 'Arroz', '  ', '8486dd1d24c65c0fc427e6dba29ffc3f.jpg', 1, 'Asian-Bistro'),
('Asian-Bistro-Extras', 'Extras', ' ', 'default.jpg', 1, 'Asian-Bistro'),
('Asian-Kids', 'Asian Kids', '  ', 'b6c7180fa8c3e9ad2e8a41c2db6a4874.jpg', 1, 'Asian-Bistro'),
('Aves', 'Aves', '  ', '2c113f221fdfb2e0adadf6a0b9d8d0a1.jpg', 1, 'Asian-Bistro'),
('B1-Restobar-Pizzaz-Veganas', 'Pizzaz Veganas', ' para vegerarianos', 'default.jpg', 1, 'B1-Restobar'),
('Bebidas', 'Bebidas', '  ', 'ee1fb1a512f263d576704a832d4e3731.jpg', 1, 'Asian-Bistro'),
('Cafes', 'Cafés', '  ', 'fc244e2ff12d9ae292008e13e7a02688.jpg', 1, 'Asian-Bistro'),
('Carnes', 'Carnes', '  ', 'e56e851ae218cb0f2fe0ed55467c640d.jpg', 1, 'Asian-Bistro'),
('Cerveza', 'Cerveza', '  ', 'f6e8f79e8928e0cf84891c78060e915e.jpg', 1, 'Asian-Bistro'),
('Chirashi', 'Chirashi', '  ', 'd0d3ceac6477f7374616b0d23c21da64.jpg', 1, 'Asian-Bistro'),
('Dim-Sum', 'Dim Sum ', '  ', 'b89e1fcaf104ba18d8ff27f94321e5dc.jpg', 1, 'Asian-Bistro'),
('Ensaladas', 'Ensaladas', '  ', '236e56847b02587b7dc70c0a58da8409.jpg', 1, 'Asian-Bistro'),
('Entrada', 'Entrada', '  ', '9741e6c804e53dfb720cbde8b3d5d149.jpg', 1, 'Asian-Bistro'),
('Entradas', 'Entradas', '  ', '0f137d6edffce5c3a75887064f925e5f.jpg', 1, 'Asian-Bistro'),
('Especialidades', 'Especialidades ', '  ', '89f18665746b4252f9debf137c0d8903.jpg', 1, 'Asian-Bistro'),
('Niguiri-clasico-y-especial', 'Niguiri clásico y especial', '    ', '45f827b0dac545ac02f41d87634ce9ff.jpg', 1, 'Asian-Bistro'),
('Noodles', 'Noodles', '  ', 'b3070463754daf7824fc73d13a7b8e6d.jpg', 1, 'Asian-Bistro'),
('Pescados-y-mariscos', 'Pescados y mariscos ', '   ', 'de70dbcaae08a19ad1b14696dcb862ce.jpg', 1, 'Asian-Bistro'),
('Pizz-Hot-Especiales', 'Especiales', ' Comida', 'default.jpg', 1, 'Pizz-Hot'),
('Pizz-Hot-Rapidas', 'Rapidas', ' Comimes', 'default.jpg', 1, 'Pizz-Hot'),
('Postres', 'Postres', '  ', 'b9b239547110f10b9fbb8f20ceadbeba.jpg', 1, 'Asian-Bistro'),
('Refrescos', 'Refrescos', '  ', '2451db21bf5a53c814f0c7e84689a80e.jpg', 1, 'Asian-Bistro'),
('Sashimi', 'Sashimi ', '  ', '78b0bb4a0d7b73c87b5816dabdaf4055.jpg', 1, 'Asian-Bistro'),
('Sopas', 'Sopas', '  ', '2c79a4799d619aa15a20fdc696f06883.jpg', 1, 'Asian-Bistro'),
('Sushi', 'Sushi', '  ', 'c230f15383f47ba08532ad3b69eecbb2.jpg', 1, 'Asian-Bistro'),
('Sushi-Oke', 'Sushi Oke', '  ', 'd12f2cf95cbaf2c722a0e6227c73c478.jpg', 1, 'Asian-Bistro'),
('Temaki-clasico-y-especial', 'Temaki clásico y especial', '    ', '75bbce67ea0d215fb6bb4476b3088b74.jpg', 1, 'Asian-Bistro'),
('Tes', 'Tés', '  ', '5ae4750d4f7aa21ebf501e53595dfb42.jpg', 1, 'Asian-Bistro'),
('The-Berry-Company', 'The Berry Company', '  ', '428075af392d9e677bd6ac5754c6d2b5.jpg', 1, 'Asian-Bistro'),
('Veggie', 'Veggie', '  ', 'cd6160d3d69937f5e05942857c908c01.jpg', 1, 'Asian-Bistro'),
('Vino-Blanco', 'Vino Blanco', '   ', '4b729917b1c0a28cfa01f6597b430365.jpg', 1, 'Asian-Bistro'),
('Vino-Rosado', 'Vino Rosado', '  ', 'b2868a4f44c89ee6fb313b485793d8f5.jpg', 1, 'Asian-Bistro'),
('Vino-Tinto', 'Vino Tinto', '  ', 'dc5594e4969f356cdbf358cfaa04feb7.jpg', 1, 'Asian-Bistro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subproductos`
--

CREATE TABLE IF NOT EXISTS `subproductos` (
  `idSubproductos` varchar(45) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `idProducto` varchar(45) NOT NULL,
  PRIMARY KEY (`idSubproductos`),
  KEY `fk_Subproductos_Producto1_idx` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subproductos`
--

INSERT INTO `subproductos` (`idSubproductos`, `Descripcion`, `precio`, `idProducto`) VALUES
('2015060110-180339', 'tazón u orden', 140, '201506015180339'),
('20150601100214140', 'orden', 70, '2015060185214140'),
('20150601101214215', 'orden', 70, '2015060186214215'),
('20150601102214245', 'orden', 55, '2015060187214245'),
('20150601103214321', 'orden', 55, '2015060188214321'),
('20150601105214547', 'orden', 55, '2015060190214547'),
('20150601106214619', 'orden', 70, '2015060191214619'),
('20150601107214656', 'orden', 110, '2015060192214656'),
('20150601108214730', 'orden', 110, '2015060193214730'),
('20150601109214809', 'orden', 110, '2015060194214809'),
('20150601110220603', 'media orden', 105, '2015060195220603'),
('20150601111-220603', 'orden completa', 185, '2015060195220603'),
('2015060111180440', 'tazón', 33, '201506016180440'),
('201506011175632', 'tazón u orden', 85, '201506011175632'),
('2015060112180605', 'orden', 160, '201506017180605'),
('2015060113180720', 'orden', 160, '201506018180720'),
('2015060114180759', 'orden', 160, '201506019180759'),
('2015060115180836', 'orden', 160, '2015060110180836'),
('2015060116195015', 'orden', 160, '2015060111195015'),
('2015060117195058', 'orden', 160, '2015060112195058'),
('2015060118195129', 'orden', 160, '2015060113195129'),
('2015060119195210', 'media orden', 280, '2015060114195210'),
('201506012-175632', 'orden', 140, '201506011175632'),
('2015060120195313', 'orden', 495, '2015060114195210'),
('2015060121195407', 'orden', 280, '2015060115195407'),
('2015060122200312', 'orden', 175, '2015060116200312'),
('2015060123200347', 'orden', 175, '2015060117200347'),
('2015060124200418', 'orden', 175, '2015060118200418'),
('2015060125200452', 'orden', 175, '2015060119200452'),
('2015060126200524', 'orden', 175, '2015060120200524'),
('2015060127200556', 'orden', 175, '2015060121200556'),
('2015060128200625', 'orden', 175, '2015060122200625'),
('2015060129200703', 'orden', 175, '2015060123200703'),
('2015060130200902', '2 piezas', 78, '2015060124200902'),
('2015060131201035', '1 pieza', 17, '2015060125201035'),
('201506013175747', 'tazón u orden', 85, '201506012175747'),
('2015060132-201035', 'Orden de 3 piezas', 45, '2015060125201035'),
('2015060133201128', '1 pieza', 17, '2015060126201128'),
('2015060134-201128', 'Orden de 3 piezas', 45, '2015060126201128'),
('2015060135201442', '1 pieza', 17, '2015060127201442'),
('2015060136-201442', 'Orden de 3 piezas', 45, '2015060127201442'),
('2015060137201520', '1 pieza', 17, '2015060128201520'),
('2015060138-201520', 'Orden de 3 piezas', 45, '2015060128201520'),
('2015060139203954', '1 pieza', 17, '2015060129203954'),
('201506014-175747', 'orden', 140, '201506012175747'),
('2015060140-203954', 'Oden de 3 piezas', 45, '2015060129203954'),
('2015060141204035', '2 piezas', 78, '2015060130204035'),
('2015060142204124', '1 pieza', 17, '2015060131204124'),
('2015060143-204124', 'Orden de 3 piezas', 45, '2015060131204124'),
('2015060144204216', '1 pieza', 17, '2015060132204216'),
('2015060145-204216', 'Orden de 3 piezas', 45, '2015060132204216'),
('2015060146204303', '1 pieza', 17, '2015060133204303'),
('2015060147-204303', 'Oden de 3 piezas', 45, '2015060133204303'),
('2015060148204344', '1 pieza', 17, '2015060134204344'),
('2015060149-204344', 'Orden de 3 piezas', 45, '2015060134204344'),
('2015060150204416', '2 piezas', 78, '2015060135204416'),
('2015060151204454', '2 piezas', 78, '2015060136204454'),
('201506015175827', 'tazón u orden', 55, '201506013175827'),
('2015060152204553', '4 piezas', 110, '2015060137204553'),
('2015060153204629', '5 piezas', 110, '2015060138204629'),
('2015060154204708', '5 piezas', 110, '2015060139204708'),
('2015060155204747', '5 piezas', 78, '2015060140204747'),
('2015060156204815', '7 piezas', 110, '2015060141204815'),
('2015060157204902', 'orden', 150, '2015060142204902'),
('2015060158204944', 'orden', 150, '2015060143204944'),
('2015060159205010', 'orden', 125, '2015060144205010'),
('2015060160205205', 'orden', 125, '2015060145205205'),
('2015060161205358', 'orden', 115, '2015060146205358'),
('201506016175907', 'orden', 100, '201506013175827'),
('2015060162205434', 'orden', 140, '2015060147205434'),
('2015060163205517', 'orden', 190, '2015060148205517'),
('2015060164205552', 'orden', 90, '2015060149205552'),
('2015060165205650', 'orden', 150, '2015060150205650'),
('2015060166205958', '9 piezas', 140, '2015060151205958'),
('2015060167210054', 'orden', 150, '2015060152210054'),
('2015060168210519', 'orden', 115, '2015060153210519'),
('2015060169210627', '2 piezas', 90, '2015060154210627'),
('2015060170210702', '2 piezas', 90, '2015060155210702'),
('2015060171210740', 'orden', 105, '2015060156210740'),
('201506017180247', 'tazón u orden', 85, '201506014180247'),
('2015060172210831', '1 pieza', 80, '2015060157210831'),
('2015060173210859', '6 piezas', 115, '2015060158210859'),
('2015060174210932', 'orden', 115, '2015060159210932'),
('2015060175211055', 'orden', 125, '2015060160211055'),
('2015060176211227', '2 piezas', 70, '2015060161211227'),
('2015060177211300', '2 piezas', 75, '2015060162211300'),
('2015060178211332', '2 piezas', 75, '2015060163211332'),
('2015060179211402', '2 piezas', 75, '2015060164211402'),
('201506018-180247', 'orden', 140, '201506014180247'),
('2015060180211447', '6 piezas', 115, '2015060165211447'),
('2015060181211527', 'orden', 205, '2015060166211527'),
('2015060182211606', 'orden', 185, '2015060167211606'),
('2015060183211644', 'orden', 160, '2015060168211644'),
('2015060184211728', 'orden', 215, '2015060169211728'),
('2015060185211808', 'orden', 130, '2015060170211808'),
('2015060186212405', 'orden', 160, '2015060171212405'),
('2015060187212441', 'orden', 195, '2015060172212441'),
('2015060188212508', 'orden', 195, '2015060173212508'),
('2015060189212546', 'orden', 160, '2015060174212546'),
('2015060190212631', 'orden', 195, '2015060175212631'),
('2015060191213231', 'orden', 205, '2015060176213231'),
('201506019180339', 'tazón', 85, '201506015180339'),
('2015060192213338', 'orden', 195, '2015060177213338'),
('2015060193213422', 'orden', 205, '2015060178213422'),
('2015060194213545', 'orden', 205, '2015060179213545'),
('2015060195213621', 'orden', 205, '2015060180213621'),
('2015060196213811', 'orden', 195, '2015060181213811'),
('2015060197213845', 'orden', 205, '2015060182213845'),
('2015060198213944', 'orden', 205, '2015060183213944'),
('2015060199214018', 'orden', 205, '2015060184214018'),
('20150714112151529', 'orden', 89, '2015071496151529'),
('20150714113151618', 'orden', 99, '2015071497151618'),
('20150714114151656', 'orden', 99, '2015071498151656'),
('20150714115151811', 'orden', 119, '2015071499151811'),
('20150714116151849', 'orden', 119, '20150714100151849'),
('20150714117152210', 'orden', 279, '20150714101152210'),
('20150714118152328', 'orden', 145, '20150714102152328'),
('20150714119152401', 'orden', 145, '20150714103152401'),
('20150714120152438', 'orden', 225, '20150714104152438'),
('20150714121152512', 'orden', 255, '20150714105152512'),
('20150714122153328', 'orden', 115, '20150714106153328'),
('20150714123153404', 'orden', 75, '20150714107153404'),
('20150714124153446', 'orden', 75, '20150714108153446'),
('20150714125153527', 'Pepino', 65, '20150714109153527'),
('20150714126153839', 'Alga', 65, '20150714109153527'),
('20150714127154256', 'Pepino', 50, '20150714110154256'),
('20150714128-154256', 'Alga', 50, '20150714110154256'),
('20150714129154456', 'Pepino', 50, '20150714111154456'),
('20150714130-154456', 'Alga', 50, '20150714111154456'),
('20150714131154613', 'Pepino', 50, '20150714112154613'),
('20150714132-154613', 'Alga', 50, '20150714112154613'),
('20150714133154731', 'Pepino', 50, '20150714113154731'),
('20150714134-154731', 'Alga', 50, '20150714113154731'),
('20150714135155016', 'Pepino', 60, '20150714114155016'),
('20150714136-155016', 'Alga', 60, '20150714114155016'),
('20150714137155127', 'Pepino', 60, '20150714115155127'),
('20150714138-155127', 'Alga', 60, '20150714115155127'),
('20150714139155250', 'Pepino', 65, '20150714116155250'),
('20150714140-155250', 'Alga', 65, '20150714116155250'),
('20150714143160208', 'Pepino', 50, '20150714118160208'),
('20150714144-160208', 'Alga', 50, '20150714118160208'),
('20150714147161010', 'Pepino', 55, '20150714120161010'),
('20150714148-161010', 'Alga', 55, '20150714120161010'),
('20150715149152055', 'pieza', 25, '20150715121152055'),
('20150715150152125', 'pieza', 25, '20150715122152125'),
('20150715151152211', 'pieza', 25, '20150715123152211'),
('20150715152152246', 'pieza', 25, '20150715124152246'),
('20150715153152326', 'pieza', 25, '20150715125152326'),
('20150715154152357', 'pieza', 42, '20150715126152357'),
('20150715155152428', 'pieza', 46, '20150715127152428'),
('20150715156152501', 'pieza', 48, '20150715128152501'),
('20150715157152542', 'pieza', 50, '20150715129152542'),
('20150715158152621', 'pieza', 65, '20150715130152621'),
('20150715159153248', '8 piezas', 125, '20150715131153248'),
('20150715160153641', '8 piezas', 80, '20150715132153641'),
('20150715161153718', '8 piezas', 80, '20150715133153718'),
('20150715162153815', '8 piezas', 80, '20150715134153815'),
('20150715163153901', '8 piezas', 90, '20150715135153901'),
('20150715165153941', '8 piezas', 85, '20150715137153941'),
('20150715166154020', '10 piezas', 110, '20150715138154020'),
('20150715167154057', '10 piezas', 115, '20150715139154057'),
('20150715168154139', '10 piezas', 115, '20150715140154139'),
('20150715169154219', '10 piezas', 120, '20150715141154219'),
('20150715170154252', '10 piezas', 130, '20150715142154252'),
('20150715171154327', '10 piezas', 160, '20150715143154327'),
('20150715172154519', '10 piezas', 115, '20150715144154519'),
('20150715173154648', '10 piezas', 115, '20150715145154648'),
('20150715174155446', '8 piezas', 80, '20150715146155446'),
('20150715175155549', '8 piezas', 110, '20150715147155549'),
('20150715176155849', '8 piezas', 110, '20150715148155849'),
('20150715177155932', '8 piezas', 110, '20150715149155932'),
('20150715178160012', '8 piezas', 120, '20150715150160012'),
('20150715179160048', '8 piezas', 120, '20150715151160048'),
('20150715180160130', '8 piezas', 125, '20150715152160130'),
('20150715181160257', '8 piezas', 125, '20150715153160257'),
('20150715182160340', '8 piezas', 125, '20150715154160340'),
('20150715183160457', '8 piezas', 130, '20150715155160457'),
('20150715185161345', '8 piezas', 130, '20150715157161345'),
('20150715186161934', 'orden', 150, '20150715158161934'),
('20150715187162014', '8 piezas', 175, '20150715159162014'),
('20150715188162151', '8 piezas', 175, '20150715160162151'),
('20150715189162509', 'pieza', 95, '20150715161162509'),
('20150715190162539', 'pieza', 75, '20150715162162539'),
('20150715191162751', 'pieza', 65, '20150715163162751'),
('20150715192162823', 'pieza', 75, '20150715164162823'),
('20150715193162857', 'pieza', 65, '20150715165162857'),
('20150715194213249', 'pieza', 65, '20150715166213249'),
('20150715195213326', 'pieza', 70, '20150715167213326'),
('20150715196213357', 'pieza', 65, '20150715168213357'),
('20150715197213435', 'pieza', 75, '20150715169213435'),
('20150715198213511', 'pieza', 70, '20150715170213511'),
('20150715199220732', '1 pieza', 39, '20150715171220732'),
('20150715200220814', '1 pieza', 39, '20150715172220814'),
('20150715201220847', '1 pieza', 39, '20150715173220847'),
('20150715202220922', '1 pieza', 39, '20150715174220922'),
('20150715204221455', '1 pieza', 370, '20150715176221455'),
('20150715205221534', '1 pieza', 490, '20150715177221534'),
('20150715206221659', '1 pieza', 260, '20150715178221659'),
('20150715207221759', '1 pieza', 490, '20150715179221759'),
('20150715208221834', '1 pieza', 260, '20150715180221834'),
('20150715209221929', '1 pieza', 900, '20150715181221929'),
('20150715210222006', '1 pieza', 455, '20150715182222006'),
('20150715211222407', '1 pieza', 420, '20150715183222407'),
('20150715212222857', '1 pieza', 240, '20150715184222857'),
('20150715213222938', '1 pieza', 245, '20150715185222938'),
('20150715214223013', '1 pieza', 450, '20150715186223013'),
('20150715215223045', '1 pieza', 450, '20150715187223045'),
('20150715216223540', '1 pieza', 35, '20150715188223540'),
('20150715217223606', '1 pieza', 35, '20150715189223606'),
('20150715218223636', '1 pieza', 35, '20150715190223636'),
('20150715219223914', 'Superberries Red', 35, '20150715191223914'),
('20150715220223937', '1 pieza', 35, '20150715192223937'),
('20150715221224008', '1 pieza', 35, '20150715193224008'),
('20150715222224032', '1 pieza', 35, '20150715194224032'),
('20150715223224208', '1 pieza', 40, '20150715195224208'),
('20150715224224248', '1 pieza', 79, '20150715196224248'),
('20150715225224334', '1 pieza', 360, '20150715197224334'),
('20150715226224404', '1 pieza', 370, '20150715198224404'),
('20150715227224639', '1 pieza', 47, '20150715199224639'),
('20150715228224711', '1 pieza', 47, '20150715200224711'),
('20150715229224742', '1 pieza', 47, '20150715201224742'),
('20150715230224825', '1 pieza', 47, '20150715202224825'),
('20150715231224907', '1 pieza', 47, '20150715203224907'),
('20150715232224936', '1 pieza', 47, '20150715204224936'),
('20150715233225157', '1 pieza', 47, '20150715205225157'),
('20150715234225246', '1 pieza', 47, '20150715206225246'),
('20150715235225318', '1 pieza', 47, '20150715207225318'),
('20150715236225352', '1 pieza', 47, '20150715208225352'),
('20150715237225421', '1 pieza', 47, '20150715209225421'),
('20150715238225449', '1 pieza', 47, '20150715210225449'),
('20150716239193602', '1 pieza', 215, '20150716211193602'),
('20150716240193701', '1 pieza', 365, '20150716212193701'),
('20150716241193826', '1 pieza', 48, '20150716213193826'),
('20150716242193920', '1 pieza', 33, '20150716214193920'),
('20150716243193952', '1 pieza', 33, '20150716215193952'),
('20150716244194019', '1 pieza', 33, '20150716216194019'),
('20150716245194053', '1 pieza', 33, '20150716217194053'),
('20150716246194121', '1 pieza', 33, '20150716218194121'),
('20150716247194159', '1 pieza', 33, '20150716219194159'),
('20150716248194228', '1 pieza', 33, '20150716220194228'),
('20150716249194256', '1 pieza', 33, '20150716221194256'),
('20150716250194350', '1 pieza', 33, '20150716222194350'),
('20150716251194454', '1 pieza', 29, '20150716223194454'),
('20150716252194522', '1 pieza', 48, '20150716224194522'),
('20150716253194608', '1 pieza', 27, '20150716225194608'),
('20150716254195658', '1 pieza', 29, '20150716226195658'),
('20150716255195753', '1 pieza', 29, '20150716227195753'),
('20150716256195827', '1 pieza', 31, '20150716228195827'),
('20150716257195904', '1 pieza', 31, '20150716229195904'),
('20150716258195953', '1 pieza', 39, '20150716230195953'),
('20150716259200028', '1 pieza', 39, '20150716231200028'),
('20150716260200107', '1 pieza', 39, '20150716232200107'),
('20150720261202214', '7 piezas', 110, '20150720233202214'),
('20150720261204708', 'con Pollo', 70, '2015060188214321'),
('20150720262205504', 'orden', 299, '20150720233205504'),
('20150807256154842', 'Chips de camote ó', 95, '20150807229154842'),
('20150807257-154842', 'Papas a la francesa ó', 95, '20150807229154842'),
('201508072583154842', 'Kushiague de queso', 95, '20150807229154842'),
('20150807259155208', 'Chips de camote ó', 97, '20150807230155208'),
('20150807260-155208', 'Papas a la francesa ó', 97, '20150807230155208'),
('201508072613155208', 'Kushiague de queso', 97, '20150807230155208'),
('20150807262155354', 'Chips de camote ó', 90, '20150807231155354'),
('20150807263-155354', 'Papas a la francesa ó', 90, '20150807231155354'),
('201508072643155354', 'Kushiague de queso', 90, '20150807231155354'),
('20150807265155552', 'Chips de camote ó', 97, '20150807232155552'),
('20150807266-155552', 'Papas a la francesa ó', 97, '20150807232155552'),
('201508072673155552', 'Kushiague de queso', 97, '20150807232155552'),
('20150807268160101', 'Chips de camote ó', 95, '20150807233160101'),
('20150807269-160101', 'Papas a la francesa ó', 95, '20150807233160101'),
('201508072703160101', 'Kushiague de queso', 95, '20150807233160101'),
('20150807271160345', 'Chips de camote ó', 95, '20150807234160345'),
('20150807272-160345', 'Papas a la francesa ó', 95, '20150807234160345'),
('201508072733160345', 'Kushiague de queso', 95, '20150807234160345'),
('20150807274160446', 'Chips de camote ó', 95, '20150807235160446'),
('20150807275-160446', 'Papas a la francesa ó', 95, '20150807235160446'),
('201508072763160446', 'Kushiague de queso', 95, '20150807235160446'),
('20150807277160612', 'Chips de camote ó', 95, '20150807236160612'),
('20150807278-160612', 'Papas a la francesa ó', 95, '20150807236160612'),
('201508072793160612', 'Kushiague de queso', 95, '20150807236160612'),
('20150807280160706', 'Chips de camote ó', 90, '20150807237160706'),
('20150807281-160706', 'Papas a la francesa ó', 90, '20150807237160706'),
('201508072823160706', 'Kushiague de queso', 90, '20150807237160706'),
('20150807283160757', 'Chips de camote ó', 90, '20150807238160757'),
('20150807284-160757', 'Papas a la francesa ó', 90, '20150807238160757'),
('201508072853160757', 'Kushiague de queso', 90, '20150807238160757'),
('20150807286162739', 'pieza', 38, '20150807239162739'),
('20150807287162800', 'pieza', 38, '20150807240162800'),
('20150807288162952', 'Fresa ó', 33, '20150807241162952'),
('20150807289-162952', 'Vainilla ó', 33, '20150807241162952'),
('201508072903162952', 'Chocolate', 33, '20150807241162952'),
('20150807291163048', 'pieza', 33, '20150807242163048'),
('20150807292163222', 'Lychee ó', 30, '20150807243163222'),
('20150807293-163222', 'Coco ó', 30, '20150807243163222'),
('201508072943163222', 'Vainilla', 30, '20150807243163222'),
('20150807295163656', 'Té Verde ó', 30, '20150807244163656'),
('20150807296-163656', 'Choco Menta', 30, '20150807244163656'),
('20150807297165847', '355 ml', 49, '20150807245165847'),
('20150807299170524', '355 ml', 49, '20150807247170524'),
('20150807300170554', '355 ml', 49, '20150807248170554'),
('20150807301170643', '355 ml', 49, '20150807249170643'),
('20150807302170710', '355 ml', 49, '20150807250170710'),
('20150807303170743', '355 ml', 49, '20150807251170743'),
('20150807304171033', '200 ml', 48, '20150807252171033'),
('20150807305171120', '240 ml', 38, '20150807253171120'),
('20150807306171242', '500 ml', 49, '20150807254171242'),
('20150807307171355', '500 ml', 49, '20150807255171355'),
('20150807308171438', '500 ml', 49, '20150807256171438'),
('20150807309171512', 'pieza', 20, '20150807257171512'),
('20150810310164817', '1 porción', 37, '20150810258164817'),
('20150810311164906', '1 porción', 37, '20150810259164906'),
('20150810312164940', '88 gr.', 21, '20150810260164940'),
('20150810313165103', '200 gr', 41, '20150810261165103'),
('20150810314165144', '1 porción', 21, '20150810262165144'),
('20150810315165233', '50 ml ', 21, '20150810263165233'),
('20150810316165312', '50 ml', 16, '20150810264165312'),
('20150810317165350', '1 porción', 21, '20150810265165350'),
('20150810318165350', '1 porción', 21, '20150810266165350'),
('20150810319165700', '1 porción', 21, '20150810267165700'),
('20150810320165731', '1 porción', 21, '20150810268165731'),
('20150810321165806', '1 porción', 21, '20150810269165806'),
('20150810322165843', '1 porción', 21, '20150810270165843'),
('20150810323165921', '1 porción', 21, '20150810271165921'),
('20150810324170000', '80 gr', 37, '20150810272170000'),
('20150810325170045', '30 gr', 37, '20150810273170045'),
('20160225325210009', 'Individual', 50, '20160225273210009'),
('20160225326-210009', 'Familiar', 100, '20160225273210009'),
('20170209327195941', '1 porcion de 60 kilogramos', 50000, '20170209274195941'),
('20170209328-195941', '2 porcion de 120 kilogramos', 90000, '20170209274195941'),
('201702093293195941', '3 porcion de 120 kilogramos', 99999, '20170209274195941'),
('20170209330200249', 'aqui uno mas', 120, '20170209275200249'),
('20170209331200418', 'pequeña', 15, '20170209276200418'),
('20170209332-200418', 'media', 28, '20170209276200418'),
('201702093333200418', 'gigante', 40, '20170209276200418');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE IF NOT EXISTS `sucursal` (
  `idSucursal` varchar(45) NOT NULL,
  `Sucursal` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `delgSucursal` varchar(45) DEFAULT NULL,
  `colSucursal` varchar(45) DEFAULT NULL,
  `Numero` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `registro` datetime DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `url` varchar(450) DEFAULT NULL,
  `termino` varchar(45) DEFAULT NULL,
  `notifiaciones` varchar(45) DEFAULT NULL,
  `pagoDomicilio` int(11) DEFAULT NULL,
  `pagoenLinea` int(11) DEFAULT NULL,
  `envioGratis` int(11) DEFAULT NULL,
  `Frases` varchar(450) DEFAULT NULL,
  `palabrasClaves` varchar(450) DEFAULT NULL,
  `pagoDepositos` int(11) DEFAULT NULL,
  `archivoTtranspaso` varchar(45) DEFAULT NULL,
  `archivoDeposito` varchar(45) DEFAULT NULL,
  `disponiblerecoger` int(11) DEFAULT NULL,
  `aceptobonos` int(11) DEFAULT NULL,
  `EntregaAprox` varchar(45) DEFAULT NULL,
  `costoenvio` varchar(45) DEFAULT NULL,
  `pedidominimo` varchar(45) DEFAULT NULL,
  `idCadena` varchar(45) NOT NULL,
  `pais_idpais` varchar(45) NOT NULL,
  `promociones` varchar(45) DEFAULT NULL,
  `posicion` int(11) DEFAULT '0',
  PRIMARY KEY (`idSucursal`),
  KEY `fk_Sucursal_Cadena1_idx` (`idCadena`),
  KEY `fk_Sucursal_pais1_idx` (`pais_idpais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`idSucursal`, `Sucursal`, `direccion`, `delgSucursal`, `colSucursal`, `Numero`, `telefono`, `email`, `municipio`, `estado`, `contrasena`, `Nombre`, `Apellido`, `registro`, `cp`, `url`, `termino`, `notifiaciones`, `pagoDomicilio`, `pagoenLinea`, `envioGratis`, `Frases`, `palabrasClaves`, `pagoDepositos`, `archivoTtranspaso`, `archivoDeposito`, `disponiblerecoger`, `aceptobonos`, `EntregaAprox`, `costoenvio`, `pedidominimo`, `idCadena`, `pais_idpais`, `promociones`, `posicion`) VALUES
('Asian-Bistro', 'Asian Bistro', 'Altavista', 'Coyoacan', 'Ajusco', '25', '5552266555', 'eduardopadillacz@gmail.com', NULL, 1, 'admin', 'Eduardo', 'Padilla', '2015-05-28 18:55:46', 4300, 'c8287bfdcfbdb860f24b0cbd7fbb6361.jpg', 'Aceptar', 'Aceptar', NULL, 1, 1, 'Comida China ,Japonesa, bebidas', 'bebidas , comida , china', NULL, NULL, NULL, 1, 1, '1 hrs', '0', '100', 'Bistro', 'Mexico', '1', 0),
('B1-Restobar', 'B1 Restobar', 'Niza 19', 'Alvaro Obregón', 'El Capulin', 'Niza 19', '0155854659', 'israel.ampudia@eenterprise.mx', NULL, 1, 'admin', 'B1', 'Restobar', '2016-02-25 20:56:37', 1110, '1253a9aed5b8f0f4f629bd8f47d60fec.jpg', 'Aceptar', 'Aceptar', NULL, 1, 1, 'Mexicana', 'Hamburguesas', NULL, NULL, NULL, 1, 1, '30', '0', '100', 'Bar', 'Mexico', '1', 0),
('Esperanza', 'Esperanza', 'Prolongación Palma', 'Tlalpan', 'San Andres Totoltepec', '55, Depto.23', '5555266608', 'demo@demo', NULL, 1, 'demo', 'Jose ', 'Padilla', '2015-02-06 19:30:01', 14400, 'd1462c585c91140c6d9837c36b262365.jpg', 'Aceptar', 'Aceptar', NULL, 1, 1, 'Sofwatre, comida, todos', 'palabritas', NULL, NULL, NULL, 1, 1, '1 hra', '50', '100', 'Bar', 'Mexico', '1', 0),
('Pizz-Hot', 'Pizz Hot', 'Tlapan', 'Coyoacan', 'Agua Bendita', '25', '5355555', 'pizaa@hot.com', NULL, 1, 'admin', 'Eduardo', 'Padilla', '2015-05-28 18:58:39', 5780, 'e8746891e447566011b9ea916a8e74a7.png', 'Aceptar', 'Aceptar', NULL, 1, 1, 'Pizza , Refrescos', 'Pizza , Refrescos', NULL, NULL, NULL, 1, 0, '45 min', '0', '1000', 'Pizzeria', 'Mexico', '0', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `fk_Calificacion_Sucursal1` FOREIGN KEY (`idSucursal`) REFERENCES `sucursal` (`idSucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fk_Categorias_Sucursal1` FOREIGN KEY (`idSucursal`) REFERENCES `sucursal` (`idSucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categoriasubcate`
--
ALTER TABLE `categoriasubcate`
  ADD CONSTRAINT `fk_CategoriaSubcate_Categorias1` FOREIGN KEY (`idCategorias`) REFERENCES `categorias` (`idCategorias`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_CategoriaSubcate_Subcategoria1` FOREIGN KEY (`idSubcategoria`) REFERENCES `subcategoria` (`idSubcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `colsucural`
--
ALTER TABLE `colsucural`
  ADD CONSTRAINT `fk_colSucural_Colonias1` FOREIGN KEY (`idColonias`) REFERENCES `colonias` (`idColonias`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_colSucural_Sucursal1` FOREIGN KEY (`idSucursal`) REFERENCES `sucursal` (`idSucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_Comentario_Sucursal1` FOREIGN KEY (`idSucursal`) REFERENCES `sucursal` (`idSucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diralternavitas`
--
ALTER TABLE `diralternavitas`
  ADD CONSTRAINT `fk_diralternavitas_Cliente1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_diralternavitas_Colonias1` FOREIGN KEY (`idColonias`) REFERENCES `colonias` (`idColonias`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_imagenes_Producto1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_Pedido_Cliente1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Pedido_diralternavitas1` FOREIGN KEY (`iddiralternavitas`) REFERENCES `diralternavitas` (`iddiralternavitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Pedido_Sucursal1` FOREIGN KEY (`idSucursal`) REFERENCES `sucursal` (`idSucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidosproductos`
--
ALTER TABLE `pedidosproductos`
  ADD CONSTRAINT `fk_PedidosProductos_Pedido1` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_PedidosProductos_Subproductos1` FOREIGN KEY (`idSubproductos`) REFERENCES `subproductos` (`idSubproductos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_Producto_CategoriaSubcate1` FOREIGN KEY (`idCategoriaSubcate`) REFERENCES `categoriasubcate` (`idCategoriaSubcate`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Producto_Sucursal1` FOREIGN KEY (`idSucursal`) REFERENCES `sucursal` (`idSucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_Respuesta_Comentario1` FOREIGN KEY (`idComentario`) REFERENCES `comentario` (`idComentario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `fk_Subcategoria_Sucursal1` FOREIGN KEY (`idSucursal`) REFERENCES `sucursal` (`idSucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subproductos`
--
ALTER TABLE `subproductos`
  ADD CONSTRAINT `fk_Subproductos_Producto1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `fk_Sucursal_Cadena1` FOREIGN KEY (`idCadena`) REFERENCES `cadena` (`idCadena`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Sucursal_pais1` FOREIGN KEY (`pais_idpais`) REFERENCES `pais` (`idpais`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
