-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-04-2025 a las 16:34:11
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cimientos & sueños`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `stock` int NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `foto`, `stock`, `precio`, `description`) VALUES
(25, 'Taza', 'img/productos/taza.png', 104, 10.00, 'Taza color blanco 11 oz.'),
(26, 'Camiseta unisex', 'img/productos/camiseta_unisex.png', 300, 15.00, 'Camiseta unisex gris claro.'),
(27, 'Sudadera invierno', 'img/productos/sudadera.png', 500, 35.60, 'Sudadera invierno con capucha unisex.'),
(28, 'Funda para Samsung Galaxy S25 Ultra', 'img/productos/funda.png', 500, 15.99, 'Funda clásica para Samsung Galaxy S25 Ultra.'),
(29, 'Mochila Under Armour', 'img/productos/mochila.png', 500, 60.99, 'Mochila Under Armour resistente.'),
(30, 'Alfombrilla para ratón', 'img/productos/alfombrilla.png', 500, 16.99, 'Alfombrilla para ratón, incluye de regalo ratón y teclado inalámbrico RGB.'),
(31, 'Case for AirPods Pro Gen 2', 'img/productos/funda_airpod.png', 500, 16.94, 'Funda para AirPods Pro Gen 2 de silicona resistente.'),
(32, 'Bolsa deportiva all over', 'img/productos/bolsa_deporte.png', 500, 70.65, 'Bolsa deportiva all over de alta capacidad.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `rol` enum('invitado','usuario','administrador') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'usuario',
  `telefono` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `rol`, `telefono`, `email`, `contrasena`, `fecha_registro`) VALUES
(11, 'Paco', 'Sanz', 'administrador', '987654321', 'testeo@gmail.com', '$2y$10$R.TXRb0cYPLEJkBvfOeQq.ZEGVIFKz8dKgmYFe48t4USrYm3WWrzq', '2025-04-22 14:22:39'),
(13, 'juan', 'jose jimenez', 'usuario', '123456789', 'juan@gmail.com', '$2y$10$2Mc31uuFYE1pXWRuG7Z83unGavt5CZAFoCxQyCveStxkcn.A/oKTi', '2025-04-22 16:28:27'),
(10, 'usuario', 'usuario', 'usuario', '123456789', 'usuario@gmail.com', '$2y$10$VPZMJYaT2ddgCXykN4NiNuP4l9XKJni0ST/MMwCv91NyEFI3CrPo.', '2025-04-11 17:04:27'),
(9, 'administardor', 'administrador', 'administrador', '651557528', 'admin@gmail.com', '$2y$10$Z78WAeZyEZB/iIZVISXtkereY44orPaksxo7AH15aSsqJ1o/3MnvK', '2025-04-11 17:03:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
