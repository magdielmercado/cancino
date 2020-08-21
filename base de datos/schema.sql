-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2017 a las 03:58:13
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

DROP DATABASE cancino;
CREATE DATABASE cancino;
USE cancino;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tickets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
CREATE TABLE puesto (
  idpuesto integer  primary key AUTO_INCREMENT, 
  nombrepuesto varchar (30) not null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into puesto (nombrepuesto) values 
  ('Director'),
  ('Gerente'),
  ('Subgerente'),
  ('Contador responsable'),
  ('Colaborador');

--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
CREATE TABLE cliente(
 rfccliente       varchar (13)  PRIMARY KEY NOT NULL,
 nombrecliente    varchar (120) NOT NULL,
 contactocliente  varchar (50)  NOT NULL,
 telefonocliente  varchar (18)  NOT NULL,
 correocliente    varchar (35)  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `business` varchar(80) NOT NULL,
  `fullname` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ruc` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `ban` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/
-- --------------------------------------------------------


INSERT INTO cliente(rfccliente,nombrecliente,contactocliente,telefonocliente,correocliente) values
('HIAA0811871T4','outsorsing','Pedro','9212667426','hector.ivan.alvarado@pemex');  
--
-- Estructura de tabla para la tabla `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `val` text,
  `cfg_id` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuration`
--

INSERT INTO `configuration` (`id`, `label`, `name`, `val`, `cfg_id`) VALUES
(1, 'Nombre del Sitio Web', 'website', 'Ticketly PRO', 1),
(2, 'Correo Electronico', 'email', 'waptoing7@gmail.com', 1),
(3, 'URL Base', 'url_base', 'http://localhost/project/abisoft/ticketly-pro/', 1),
(4, 'Favicon', 'favicon', 'favicon.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kind`
--

CREATE TABLE `kind` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kind`
--

INSERT INTO `kind` (`id`, `name`) VALUES
(1, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`) VALUES
(1, 'Registrado', '2017-11-27 20:57:15'),
(2, 'Asignado', '2017-11-27 20:57:15'),
(3, 'Con Incidencia', '2017-11-27 20:57:15'),
(4, 'Atendido', '2017-11-27 20:57:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `cell_phone` varchar(50) NOT NULL,
  `contact_schedule` varchar(50) DEFAULT NULL,
  `kind_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `image` varchar(150) NOT NULL,
  `area` int(11) NOT NULL,
  `asunt` varchar(150) NOT NULL,
  `id_team` varchar(50) NOT NULL,
  `pass_team` varchar(50) NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  `number_ticket` varchar(200) NOT NULL,
  `asigned_id` int(11) NOT NULL,
  `tipo_requerimiento` int(11) NOT NULL DEFAULT '0',
  `sistema` varchar(250) NOT NULL,
  `date_atendid` datetime NOT NULL,
  `finalizado` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_requerimientos`
--

CREATE TABLE `tipos_requerimientos` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`

CREATE TABLE usuario(
  idusuario integer PRIMARY KEY AUTO_INCREMENT,
  usuario varchar(30) not null,
  contrasena varchar(60) not null,
  nombreusuario varchar(50) not null,
  idpuesto integer not null REFERENCES puesto (idpuesto),
  fotousuario varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `usuario` ( `usuario`, `contrasena`, `nombreusuario`, `idpuesto`) VALUES
('admin','90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'admin',1),
('superh','90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'hector',1),
('jorge','90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'jorge',2),
('mag','90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'mag',3),
('edgar','90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'admin',2);

UPDATE usuario SET fotousuario = "superh.jpg" WHERE idusuario = 2;

--
/*
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `kind` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/
--
-- Volcado de datos para la tabla `user`
--
/*
INSERT INTO `user` (`id`, `username`, `name`, `lastname`, `email`, `password`, `profile_pic`, `is_active`, `is_admin`, `kind`, `created_at`) VALUES
(1, 'admin', NULL, NULL, NULL, '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'default.png', 1, 1, 1, '2017-11-27 20:57:14');
*/
--



-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
/* Indices de la tabla `clientes`
--
--ALTER TABLE `clientes`
--
--ADD PRIMARY KEY (`id`);
*/

--
-- Indices de la tabla `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `area` (`area`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `kind_id` (`kind_id`);

--
-- Indices de la tabla `tipos_requerimientos`
--
ALTER TABLE `tipos_requerimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
-- ALTER TABLE `user`
--  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
/*ALTER TABLE `clientes`
-- MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `configuration`
*/
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `kind`
--
ALTER TABLE `kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipos_requerimientos`
--
ALTER TABLE `tipos_requerimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user`
--
-- ALTER TABLE `user`
 -- MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`area`) REFERENCES `area` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
 -- ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`kind_id`) REFERENCES `kind` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


ALTER TABLE `tickets` ADD `date_asigned` DATETIME NULL AFTER `date_atendid`