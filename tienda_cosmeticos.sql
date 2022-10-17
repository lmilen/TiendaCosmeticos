-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2022 a las 23:05:28
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_cosmeticos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaproducto`
--

CREATE TABLE `categoriaproducto` (
  `idCat` int(11) NOT NULL,
  `categoria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoriaproducto`
--

INSERT INTO `categoriaproducto` (`idCat`, `categoria`) VALUES
(1, 'cabello'),
(2, 'labios'),
(3, 'ojos'),
(4, 'rostro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idCompra` int(15) NOT NULL,
  `idPoductoCompra` int(15) NOT NULL,
  `idClienteCompra` int(15) NOT NULL,
  `cantidadCompra` int(15) NOT NULL,
  `valorEnvio` float(15,2) NOT NULL DEFAULT 1000.00,
  `fechaCompra` date NOT NULL DEFAULT current_timestamp(),
  `Total` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`idCompra`, `idPoductoCompra`, `idClienteCompra`, `cantidadCompra`, `valorEnvio`, `fechaCompra`, `Total`) VALUES
(11, 6, 5, 3, 1000.00, '2022-10-16', 16000.00),
(12, 5, 4, 2, 1000.00, '2022-10-16', 3000.00),
(13, 4, 10, 2, 1000.00, '2022-10-16', 12200.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProd` int(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` float(15,2) NOT NULL,
  `cantidad` int(15) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `imagen` varchar(200) DEFAULT '../img/product-img/default.jpg',
  `idCategoria` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProd`, `nombre`, `precio`, `cantidad`, `descripcion`, `imagen`, `idCategoria`) VALUES
(1, 'nombre1', 10000.00, 2, 'Producto essencial en el cuidado de cabello....', '../img/product-img/product-1.jpg', 1),
(2, 'nombre2', 2300.00, 3, 'Cuida tu cabello con el nuevo....', '../img/product-img/product-2.jpg', 1),
(4, 'nombre4', 5600.00, 0, 'Para la deshidratación en tus labios', '../img/product-img/product-4.jpg', 2),
(5, 'nombre5', 1000.00, 1, 'Tus ojos lo dicen todo', '../img/product-img/product-5.jpg', 3),
(6, 'Crema para la cara', 5000.00, 2, 'Para evitar manchas en la piel', '../img/product-img/product-6.jpg', 4),
(8, 'Acondicionador del cabello', 6000.00, 0, 'Si tienes el cabello reseco', '../img/product-img/default.jpg', 1),
(9, 'Producto Ojos', 25000.00, 6, 'Para las ojeras', '../img/product-img/default.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(15) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `rol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'USUARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(15) NOT NULL,
  `identificacion` int(20) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `celular` int(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `identificacion`, `nombres`, `apellidos`, `celular`, `correo`, `password`, `rol`) VALUES
(1, 123456789, 'Administrador', 'del Sistema', 1234567890, 'admin@mail.com', '12345', 1),
(4, 102346545, 'Santiago', 'Coral', 321455645, 'usuario1@gmail.com', '1234', 2),
(5, 13125, 'Andres', 'Cordoba', 2147483647, 'andres@gmail.com', '123', 2),
(8, 123, 'Nuevo', 'Administrador', 123, 'nadmin@gmail.com', '1234', 1),
(10, 1023456897, 'Daniela', 'Castro', 2147483647, 'dani@gmail.com', '1234', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoriaproducto`
--
ALTER TABLE `categoriaproducto`
  ADD PRIMARY KEY (`idCat`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompra`),
  ADD KEY `idPoducto` (`idPoductoCompra`),
  ADD KEY `idCliente` (`idClienteCompra`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProd`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompra` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProd` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`idClienteCompra`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`idPoductoCompra`) REFERENCES `productos` (`idProd`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoriaproducto` (`idCat`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`idRol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
