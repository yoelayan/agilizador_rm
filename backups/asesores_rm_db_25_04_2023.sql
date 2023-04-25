-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2023 a las 17:46:02
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asesores_rm_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acea`
--

CREATE TABLE `acea` (
  `id_acea` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `acea` int(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acea`
--

INSERT INTO `acea` (`id_acea`, `name`, `acea`, `created_at`, `updated_at`) VALUES
(21, 'piscina', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(22, 'terraza', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(23, 'jardín', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(24, 'patio', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(25, 'parrillera', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(26, 'parque infantil', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(27, 'cancha', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(28, 'estacionamiento para visitantes', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(29, 'caseta de vigilancia', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(30, 'churuata', 5, '2023-04-10 19:41:04', '2023-04-21 21:59:35'),
(31, 'caminerías', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(32, 'playa privada', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(34, 'amoblada', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(35, 'ascensores', 4, '2023-04-10 19:41:04', '2023-04-21 22:11:06'),
(36, 'cerca eléctrica', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(37, 'ascensor de carga', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(38, 'línea telefónica', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(39, 'suministro de energía a 110/220V', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(40, 'suministro de energía trifásica', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(41, 'servicio de televisión por subscripción', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(42, 'internet', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(43, 'suministro de gas directo', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(44, 'chimenea', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(45, 'lavadero', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(46, 'sala', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(47, 'cocina', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(48, 'comedor', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(49, 'sala de juegos', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(50, 'jacuzzi', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(51, 'sauna', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(52, 'vestier', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(53, 'clósets', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(54, 'habitación de servicio', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(55, 'baño de servicio', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(56, 'baño de visitas', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(57, 'solarium', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(58, 'tanque de agua residencial', 4, '2023-04-10 19:41:04', '2023-04-20 10:31:45'),
(59, 'tanque de reserva', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(60, 'calentador de agua', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(61, 'bomba hidroneumática', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(62, 'gimnasio', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(63, 'estacionamiento', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(64, 'filtro de agua', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(66, 'un centro comercial', 7, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(67, 'un centro de servicios para automóviles', 7, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(68, 'restaurantes', 7, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(69, 'colegios', 7, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(70, 'automercados', 7, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(71, 'fruterías', 7, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(72, 'servicios médicos', 7, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(73, 'una cocina empotrada', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(75, 'acondicionador de aire', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(76, 'estudio', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(77, 'piso de porcelanato', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(78, 'piso de cerámica', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(79, 'piso de granito', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(80, 'piso de parquet', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(81, 'piso laminado', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(82, 'piso de terracota', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(83, 'ascensor privado', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(84, 'ventanales', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(85, 'enrejado de seguridad', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(86, 'puerta blindada', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(87, 'balcón', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(88, 'portón de seguridad', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(89, 'piso de mármol', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(90, 'maletero', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(91, 'en un conjunto cerrado', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(92, 'con clima de montaña', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(93, 'habitación para chofer', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(94, 'ático', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(95, 'desayunador', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(96, 'bar', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(97, 'family room', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(101, 'sala de espera', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(102, 'recepción', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(103, 'sala de reuniones', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(105, 'local', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(106, 'galpón', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(107, 'bodega', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(108, 'planta eléctrica', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(109, 'piso alfombrado', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(110, 'iluminación LED', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(111, 'zona de carga y descarga', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(112, 'estacionamiento múltiple', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(116, 'ambiente dúplex', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(117, 'sistema anti-incendio', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(118, 'luces de emergencia', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(119, 'extractor de aire', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(120, 'cableado interno', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(121, 'acometidas', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(122, 'depósito', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(123, 'se entrega semi-amoblada', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(124, '´´area de atención', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(125, 'mezzanina', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(126, 'a pie de calle', 7, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(127, 'en una Av. principal', 7, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(128, 'vigilancia privada', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(129, 'terraza', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(130, 'en formato bifamiliar', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(131, 'aplanado', 1, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(132, 'tierras de cultivo', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(133, 'área comercial', 7, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(134, 'salón de fiesta', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(135, 'salón de reuniones ', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(136, 'tirolina ', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(137, 'granja de contacto', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(138, 'caballeriza', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(139, 'criadero de cerdos', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(140, 'cancha de bolas criollas', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(141, 'jaulas', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(142, 'casa de trabajadores ', 5, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(143, 'gas a propano', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(144, 'se aceptan mascotas', 4, '2023-04-10 19:41:04', '2023-04-10 19:41:04'),
(145, 'Yuaksjdnkjas', 5, '2023-04-13 09:34:46', '2023-04-13 09:34:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aceaoptions`
--

CREATE TABLE `aceaoptions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aceaoptions`
--

INSERT INTO `aceaoptions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ambientes', '2023-04-10 15:17:22', '2023-04-10 19:23:55'),
(4, 'Comodidades', '2023-04-10 15:16:57', '2023-04-10 19:23:39'),
(5, 'Exteriores', '2023-04-10 15:17:22', '2023-04-10 19:23:29'),
(7, 'Adyacencias', '2023-04-10 15:16:57', '2023-04-10 19:23:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areatype`
--

CREATE TABLE `areatype` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `areatype`
--

INSERT INTO `areatype` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'comercial', '2023-04-08 15:19:31', NULL),
(2, 'residencial', '2023-04-08 15:19:51', '2023-04-21 22:10:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `businessmodel`
--

CREATE TABLE `businessmodel` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `businessmodel`
--

INSERT INTO `businessmodel` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'venta', '2023-04-08 15:21:55', '2023-04-21 22:28:39'),
(2, 'alquiler', '2023-04-08 15:21:55', NULL),
(3, 'venta o alquiler', '2023-04-08 15:21:55', '2023-04-08 15:21:55'),
(4, 'Financiado', '2023-04-19 19:51:20', '2023-04-19 19:51:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `housingtype`
--

CREATE TABLE `housingtype` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `housingtype`
--

INSERT INTO `housingtype` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'apartamento', '2023-04-08 15:22:48', '2023-04-21 22:18:56'),
(2, 'casa', '2023-04-08 15:22:48', NULL),
(3, 'local', '2023-04-08 15:22:48', NULL),
(4, 'Town house', '2023-04-19 19:44:52', '2023-04-19 19:44:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `markettype`
--

CREATE TABLE `markettype` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `markettype`
--

INSERT INTO `markettype` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'primario', '2023-04-08 15:23:16', '2023-04-21 22:23:58'),
(2, 'secundario', '2023-04-08 15:23:16', NULL),
(3, 'Terciario', '2023-04-19 19:55:43', '2023-04-19 19:55:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-03-31-003304', 'App\\Database\\Migrations\\Users', 'default', 'App', 1680223952, 1),
(2, '2023-04-08-050500', 'App\\Database\\Migrations\\Properties', 'default', 'App', 1680932383, 2),
(3, '2023-04-08-054149', 'App\\Database\\Migrations\\AreaType', 'default', 'App', 1680932583, 3),
(4, '2023-04-08-054414', 'App\\Database\\Migrations\\HousingType', 'default', 'App', 1680932678, 4),
(5, '2023-04-08-054547', 'App\\Database\\Migrations\\BusinessModel', 'default', 'App', 1680932769, 5),
(6, '2023-04-08-054710', 'App\\Database\\Migrations\\MarketType', 'default', 'App', 1680932852, 6),
(7, '2023-04-08-054820', 'App\\Database\\Migrations\\State', 'default', 'App', 1680932977, 7),
(8, '2023-04-08-055046', 'App\\Database\\Migrations\\Municipality', 'default', 'App', 1680933062, 8),
(9, '2023-04-08-055140', 'App\\Database\\Migrations\\Status', 'default', 'App', 1680933115, 9),
(10, '2023-04-10-185550', 'App\\Database\\Migrations\\Acea', 'default', 'App', 1681152987, 10),
(11, '2023-04-10-190419', 'App\\Database\\Migrations\\AceaOptions', 'default', 'App', 1681153484, 11),
(12, '2023-04-25-011408', 'App\\Database\\Migrations\\Pages', 'default', 'App', 1682385565, 12),
(13, '2023-04-25-012151', 'App\\Database\\Migrations\\Pages', 'default', 'App', 1682385717, 13),
(14, '2023-04-25-012226', 'App\\Database\\Migrations\\Pages', 'default', 'App', 1682385754, 14),
(15, '2023-04-25-013102', 'App\\Database\\Migrations\\Permissions', 'default', 'App', 1682386330, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipality`
--

CREATE TABLE `municipality` (
  `id` int(11) NOT NULL,
  `id_fk_state` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipality`
--

INSERT INTO `municipality` (`id`, `id_fk_state`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 'libertador', '2023-04-08 15:30:25', '2023-04-21 22:56:53'),
(2, 1, 'zamora', '2023-04-08 15:30:25', NULL),
(7, 3, 'San cristóbal', '2023-04-19 20:10:08', '2023-04-19 20:10:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `group` varchar(100) NOT NULL,
  `route` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pages`
--

INSERT INTO `pages` (`id`, `name`, `group`, `route`, `created_at`, `updated_at`) VALUES
(1, 'panel', 'panel', '/dashboard', '2023-04-24 21:23:59', '2023-04-24 23:17:39'),
(2, 'Configuración A.C.E.A.', 'field_configuration', '/settings/acea_configuration', '2023-04-24 21:25:04', '2023-04-24 23:17:36'),
(3, 'usuarios', 'users', '', '2023-04-24 21:25:04', NULL),
(4, 'declaraciones', 'statements', '', '2023-04-24 21:26:30', NULL),
(5, 'mis propiedades', 'my_properties', '', '2023-04-24 21:26:30', NULL),
(6, 'propiedades', 'properties', '', '2023-04-24 21:26:52', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `user` int(100) NOT NULL,
  `page` int(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `user`, `page`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2023-04-24 22:19:37', '2023-04-24 23:31:13'),
(4, 1, 2, '2023-04-24 22:34:45', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `properties`
--

CREATE TABLE `properties` (
  `id_properties` int(11) NOT NULL,
  `agent` int(100) NOT NULL,
  `area_type` int(100) NOT NULL,
  `housing_type` int(100) NOT NULL,
  `business_model` int(100) NOT NULL,
  `bedrooms` int(100) NOT NULL,
  `bathrooms` int(100) NOT NULL,
  `garages` int(100) NOT NULL,
  `meters_construction` int(100) NOT NULL,
  `meters_land` int(100) NOT NULL,
  `environments` varchar(100) NOT NULL,
  `amenities` varchar(100) NOT NULL,
  `exterior` varchar(100) NOT NULL,
  `adjacencies` varchar(100) NOT NULL,
  `advertising_status` varchar(100) NOT NULL,
  `market_type` int(25) NOT NULL,
  `state` int(25) NOT NULL,
  `municipality` int(255) NOT NULL,
  `address` text NOT NULL,
  `price` int(255) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `owner_mail` varchar(255) NOT NULL,
  `owner_phone` tinytext NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `properties`
--

INSERT INTO `properties` (`id_properties`, `agent`, `area_type`, `housing_type`, `business_model`, `bedrooms`, `bathrooms`, `garages`, `meters_construction`, `meters_land`, `environments`, `amenities`, `exterior`, `adjacencies`, `advertising_status`, `market_type`, `state`, `municipality`, `address`, `price`, `owner`, `owner_mail`, `owner_phone`, `status`, `created_at`, `updated_at`) VALUES
(28, 1, 2, 3, 2, 1, 1, 2, 170, 240, '45,48,51,54,55,76,94,97,103,131', '35,36,38,41,60,73,78,81,84,89,110,123', '23,90,91,135,138,142', '70,126,133', '', 2, 2, 1, 'el encantado', 30000, 'Carlos garcia', 'carlos@gmail.com', '4120388680', 1, '2023-04-08 21:02:30', '2023-04-22 22:44:11'),
(42, 1, 1, 1, 1, 2, 2, 1, 125, 0, '46,131', '35,123', '142', '133', '', 1, 1, 2, 'Av. Intercomunal', 32000, 'Carlos david', 'carlos@unccorres.com', '+584120388680', 1, '2023-04-08 22:55:41', '2023-04-14 23:10:06'),
(44, 1, 2, 3, 1, 3, 2, 1, 125, 125, '', '', '', '', '', 2, 2, 1, 'Caracas, Distrito capital - Venezuela', 123123, 'Carlos david', 'carlos@unccorres.com', '123123', 2, '2023-04-19 18:14:17', '2023-04-19 18:14:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'real_estate_agent', 'Ejecutivo de ventas', '2023-03-30 21:11:25', '2023-03-30 21:12:33'),
(2, 'superuser_global_controls', 'ADMIN', '2023-04-03 12:24:29', '2023-04-03 12:24:53'),
(3, 'administrative_staff', 'Personal administrativo', '2023-04-19 18:02:19', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `state`
--

INSERT INTO `state` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'miranda', '2023-04-08 15:29:57', '2023-04-21 22:35:01'),
(2, 'distrito capital', '2023-04-08 15:29:57', NULL),
(3, 'Zulia', '2023-04-19 20:00:38', '2023-04-19 20:00:38'),
(4, 'Tachira', '2023-04-22 18:11:36', '2023-04-22 18:11:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'aprobado', '2023-04-08 15:31:14', '2023-04-22 00:12:12'),
(2, 'Sin aprobar', '2023-04-08 15:31:14', '2023-04-22 00:05:37'),
(3, 'Rechazado', '2023-04-08 15:31:45', '2023-04-22 00:05:14'),
(4, 'En espera de reevaluación', '2023-04-22 00:06:01', NULL),
(5, 'Aprobado condicionalmente', '2023-04-22 00:06:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` tinytext NOT NULL,
  `document_ci` tinytext NOT NULL,
  `id_fk_rol` int(11) NOT NULL,
  `profile_photo` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `full_name`, `phone`, `document_ci`, `id_fk_rol`, `profile_photo`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Cristian Trejo', '4120388680', '29992326', 2, '', 'ctrejo@tuasesorrm.com.ve', '$2y$10$s7IB.y28Gb/6jLqiINj3GOdaoCbSsGQ3doPiTyJFv31LfWDiHejty', '2023-03-30 21:12:38', '2023-04-23 00:35:28'),
(6, 'Yubisay Mendez', '4120388680', '29990629', 3, '', 'ymendez@tuasesorrm.com.ve', '$2y$10$9qVpI0sWx6sRzhR8eakQ7ukjKc3nlbK5rOkeN5y4V7KM7itI52VTS', '2023-04-23 00:28:10', '2023-04-23 00:28:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acea`
--
ALTER TABLE `acea`
  ADD PRIMARY KEY (`id_acea`),
  ADD KEY `fk_id_acea` (`acea`);

--
-- Indices de la tabla `aceaoptions`
--
ALTER TABLE `aceaoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `areatype`
--
ALTER TABLE `areatype`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `businessmodel`
--
ALTER TABLE `businessmodel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `housingtype`
--
ALTER TABLE `housingtype`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `markettype`
--
ALTER TABLE `markettype`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipality`
--
ALTER TABLE `municipality`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fk_state` (`id_fk_state`);

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_user` (`user`),
  ADD KEY `fk_id_page` (`page`);

--
-- Indices de la tabla `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id_properties`),
  ADD KEY `fk_id_agent` (`agent`),
  ADD KEY `fk_id_area_type` (`area_type`),
  ADD KEY `fk_id_housing_type` (`housing_type`),
  ADD KEY `fk_id_business_model` (`business_model`),
  ADD KEY `fk_id_market_type` (`market_type`),
  ADD KEY `fk_id_state` (`state`),
  ADD KEY `fk_id_municipality` (`municipality`),
  ADD KEY `fk_id_status` (`status`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `document_ci` (`document_ci`,`email`) USING HASH,
  ADD KEY `id_fk_rol` (`id_fk_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acea`
--
ALTER TABLE `acea`
  MODIFY `id_acea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `aceaoptions`
--
ALTER TABLE `aceaoptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `areatype`
--
ALTER TABLE `areatype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `businessmodel`
--
ALTER TABLE `businessmodel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `housingtype`
--
ALTER TABLE `housingtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `markettype`
--
ALTER TABLE `markettype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `municipality`
--
ALTER TABLE `municipality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `properties`
--
ALTER TABLE `properties`
  MODIFY `id_properties` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acea`
--
ALTER TABLE `acea`
  ADD CONSTRAINT `fk_id_acea` FOREIGN KEY (`acea`) REFERENCES `aceaoptions` (`id`);

--
-- Filtros para la tabla `municipality`
--
ALTER TABLE `municipality`
  ADD CONSTRAINT `id_fk_state` FOREIGN KEY (`id_fk_state`) REFERENCES `state` (`id`);

--
-- Filtros para la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `fk_id_page` FOREIGN KEY (`page`) REFERENCES `pages` (`id`),
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `fk_id_agent` FOREIGN KEY (`agent`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_id_area_type` FOREIGN KEY (`area_type`) REFERENCES `areatype` (`id`),
  ADD CONSTRAINT `fk_id_business_model` FOREIGN KEY (`business_model`) REFERENCES `businessmodel` (`id`),
  ADD CONSTRAINT `fk_id_housing_type` FOREIGN KEY (`housing_type`) REFERENCES `housingtype` (`id`),
  ADD CONSTRAINT `fk_id_market_type` FOREIGN KEY (`market_type`) REFERENCES `markettype` (`id`),
  ADD CONSTRAINT `fk_id_municipality` FOREIGN KEY (`municipality`) REFERENCES `municipality` (`id`),
  ADD CONSTRAINT `fk_id_state` FOREIGN KEY (`state`) REFERENCES `state` (`id`),
  ADD CONSTRAINT `fk_id_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `id_fk_rol` FOREIGN KEY (`id_fk_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
