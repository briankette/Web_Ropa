-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-05-2018 a las 15:17:57
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Importe` varchar(255) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras_por_usuario`
--

DROP TABLE IF EXISTS `compras_por_usuario`;
CREATE TABLE IF NOT EXISTS `compras_por_usuario` (
  `idUsuario` int(11) NOT NULL,
  `idCompra` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`,`idCompra`),
  KEY `compra_fk` (`idCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Categoria` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Stock` int(11) NOT NULL,
  `Precio` varchar(255) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `Nombre`, `Categoria`, `Descripcion`, `Stock`, `Precio`, `Foto`) VALUES
(1, 'Blusa', 'Mujer', 'Blusa sin mangas', 10, '799', 'blusa_mujer.jpg'),
(2, 'Blusa2', 'Mujer', 'Blusa con volados', 10, '589', 'blusa2_mujer.jpg'),
(3, 'Blusa3', 'Mujer', 'Blusa lisa celeste', 10, '650', 'blusa3_mujer.jpg'),
(4, 'Blusa4', 'Mujer', 'Blusa con puntilla', 10, '499', 'blusa4_mujer.jpg'),
(5, 'Camisa', 'Hombre', 'Camisa sport manila', 10, '714', 'camisa_hombre.jpg'),
(6, 'Camisa2', 'Hombre', 'Camisa patch', 10, '799', 'camisa2_hombre.jpg'),
(7, 'Camisa3', 'Hombre', 'Camisa sport', 10, '990', 'camisa3_hombre.jpg'),
(8, 'Jean', 'Hombre', 'Jean dirty BLANCO', 10, '1330', 'jean_hombre.jpg'),
(9, 'Jean2', 'Hombre', 'Jean salto', 10, '990', 'jean2_hombre.jpg'),
(10, 'Jean3', 'Hombre', 'Jean maltinto gris', 10, '1290', 'jean3_hombre.jpg'),
(11, 'Jean4', 'Hombre', 'Jean basico JDSK', 10, '1390', 'jean4_hombre.jpg'),
(12, 'Jean', 'Mujer', 'Jean basico blanco', 10, '1190', 'jean_mujer.jpg'),
(13, 'Jean2', 'Mujer', 'Jean full roturas', 10, '1390', 'jean2_mujer.jpg'),
(14, 'Jean3', 'Mujer', 'Jean basic gris', 10, '990', 'jean3_mujer.jpg'),
(15, 'Pantalon', 'Mujer', 'Pantalon silver', 10, '899', 'pantalon_mujer.jpg'),
(16, 'Remera', 'Hombre', 'Remera neck', 10, '549', 'remera_hombre.jpg'),
(17, 'Remera2', 'Hombre', 'Remera marble', 10, '649', 'remera2_hombre.jpg'),
(18, 'Remera3', 'Hombre', 'Remera print blanca', 10, '529', 'remera3_hombre.jpg'),
(19, 'Sweater', 'Hombre', 'Sweater bomo azul', 10, '1290', 'sweater_hombre.jpg'),
(20, 'Sweater2', 'Hombre', 'Sweater basic rojo', 10, '1190', 'sweater2_hombre.jpg'),
(21, 'Top', 'Mujer', 'Top basic negro', 10, '990', 'top_mujer.jpg'),
(22, 'Vestido', 'Mujer', 'Vestido shabot', 10, '699', 'vestido_mujer.jpg'),
(23, 'Vestido2', 'Mujer', 'Vestido off shoulder', 10, '799', 'vestido2_mujer.jpg'),
(24, 'Vestido3', 'Mujer', 'Vestido rayado', 10, '769', 'vestido3_mujer.jpg'),
(25, 'Vestido4', 'Mujer', 'Vestido cagliar', 10, '999', 'vestido4_mujer.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_por_compra`
--

DROP TABLE IF EXISTS `productos_por_compra`;
CREATE TABLE IF NOT EXISTS `productos_por_compra` (
  `Producto_id` int(11) NOT NULL,
  `compra_id` int(11) NOT NULL,
  PRIMARY KEY (`Producto_id`,`compra_id`),
  KEY `compra_ppc_fk` (`compra_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellido` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `usuario`, `Password`, `Nombre`, `Apellido`, `Direccion`) VALUES
(9, 'briankette@gmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', NULL, NULL, NULL),
(10, 'juan@gmail.com', '673d4b1d7deabe33d0037d3a39927ec3d56397a45f5eb9ac0512c75808c293f0d022e04adc5555cd3644d18cf79e9e9ebaea7e3a8e96744b0c49312a7f8af398', NULL, NULL, NULL),
(11, 'gloria@gmail.com', '47cb016fc371a44dda83f884ae03798d2a2cd258a365e4af573c6faa70e9ee9abb75590a3b01a4ab48c50ea630ab17b53018ee045b144f40a8b1e41ebe9404c5', NULL, NULL, NULL),
(12, 'pepe@hotmail.com', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', NULL, NULL, NULL),
(13, 'pepe@gmail.com', '974f3036f39834082e23f4d70f1feba9d4805b3ee2cedb50b6f1f49f72dd83616c2155f9ff6e08a1cefbf9e6ba2f4aaa45233c8c066a65e002924abfa51590c4', NULL, NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras_por_usuario`
--
ALTER TABLE `compras_por_usuario`
  ADD CONSTRAINT `compra_fk` FOREIGN KEY (`idCompra`) REFERENCES `compra` (`Id`),
  ADD CONSTRAINT `usuario_fk` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`Id`);

--
-- Filtros para la tabla `productos_por_compra`
--
ALTER TABLE `productos_por_compra`
  ADD CONSTRAINT `compra_ppc_fk` FOREIGN KEY (`compra_id`) REFERENCES `compra` (`Id`),
  ADD CONSTRAINT `producto_ppc_fk` FOREIGN KEY (`Producto_id`) REFERENCES `producto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
