-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-10-2024 a las 14:41:47
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pt04_pau_munoz`
--
CREATE DATABASE IF NOT EXISTS `pt04_pau_munoz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pt04_pau_munoz`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeones`
--

DROP TABLE IF EXISTS `campeones`;
CREATE TABLE IF NOT EXISTS `campeones` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id del Campio',
  `name` varchar(50) NOT NULL COMMENT 'Nom del campio',
  `description` text NOT NULL COMMENT 'Descripcio del Campio',
  `resource` varchar(30) NOT NULL COMMENT 'Que consumeixen les seves habilitats (mana, energia, vida...)',
  `role` varchar(30) NOT NULL COMMENT 'El rol que te (Mago, Assesion, Tanque...)',
  `creator` varchar(50) NOT NULL COMMENT 'Usuari que ha creat el campio',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `creator` (`creator`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

DROP TABLE IF EXISTS `usuaris`;
CREATE TABLE IF NOT EXISTS `usuaris` (
  `nom` varchar(50) NOT NULL COMMENT 'Nom del Usuari',
  `cognoms` varchar(100) NOT NULL COMMENT 'Cognoms del Usuari',
  `correu` varchar(150) NOT NULL COMMENT 'Correu del Usuari',
  `nickname` varchar(50) NOT NULL COMMENT 'NickName del Usuari (Identificador del Uusari i per el que filtrarem la gran majoria de vegadas)',
  `contrasenya` text NOT NULL COMMENT 'Contrasneya del Usuari encriptada',
  PRIMARY KEY (`nickname`),
  UNIQUE KEY `correu` (`correu`),
  UNIQUE KEY `nickname` (`nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `campeones`
--
ALTER TABLE `campeones`
  ADD CONSTRAINT `campeones_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `usuaris` (`nickname`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
