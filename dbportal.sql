-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2016 a las 19:10:04
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dbportal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tanuncios`
--

CREATE TABLE IF NOT EXISTS `tanuncios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `fdesc` text NOT NULL,
  `fecha` date NOT NULL,
  `categoria` text NOT NULL,
  `tienda` tinyint(1) NOT NULL,
  `imgmin` text NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `img3` text NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `iduser` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Volcado de datos para la tabla `tanuncios`
--

INSERT INTO `tanuncios` (`id`, `titulo`, `fdesc`, `fecha`, `categoria`, `tienda`, `imgmin`, `img1`, `img2`, `img3`, `activo`, `iduser`, `tipo`, `precio`) VALUES
(100, 'Secretos para las Ventas', 'Libro de ventas pequeño', '2015-12-10', 'Libros', 0, 'pc_ada1ddd7b4.JPG', '', '', '', 0, 1, '1', 25000),
(101, 'Cubo de Rubik', 'Cubo de Rubik usado', '2015-12-10', 'Juegos Infantiles', 0, 'pc_0201d72151.JPG', '', '', '', 0, 1, '1', 2000),
(102, 'Carcasa telefono SII', 'muy usada', '2015-12-10', 'Celulares', 0, 'pc_9c52fa3144.JPG', '', '', '', 0, 1, '1', 3000),
(103, 'Goma de Borrar', 'Goma de borrar', '2015-12-10', 'Escuela', 0, 'pc_7919acba41.JPG', '', '', '', 0, 1, '1', 1500),
(104, 'Como triunfe en Ventas', 'Como triunfe en Ventas', '2015-12-10', 'Libros', 0, 'pc_b3c125dd34.JPG', '', '', '', 0, 1, '1', 15000),
(105, 'Por que consumimos', 'Por qué consumimos', '2015-12-10', 'Libros', 0, 'pc_63de0eb989.JPG', '', '', '', 0, 1, '1', 5000),
(106, 'Grandes casos empresariales', 'Grandes casos empresariales', '2015-12-10', 'Libros', 0, 'pc_cf49e2c8b9.JPG', '', '', '', 0, 1, '1', 15000),
(107, 'Secretos de vendedor', 'Libro', '2015-12-10', 'Libros', 0, 'pc_e24e0ef976.JPG', '', '', '', 0, 1, '1', 25000),
(108, 'Diseño de Página web a medida', 'Diseño de Página web a medida', '2015-12-10', 'Informática', 0, 'pc_44e6d809eb.jpg', '', '', '', 0, 1, '1', 100000),
(109, 'asas', 'asass', '2015-12-10', 'Casas', 0, '0', '', '', '', 0, 1, '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcomentarios`
--

CREATE TABLE IF NOT EXISTS `tcomentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  `correo` text NOT NULL,
  `comentario` text NOT NULL,
  `fecha` date NOT NULL,
  `ida` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tcomentarios`
--

INSERT INTO `tcomentarios` (`id`, `nombre`, `correo`, `comentario`, `fecha`, `ida`) VALUES
(2, 'Administrador', 'falconsoft.4d@gmail.com', 'Me pueden llamar al 66285622', '2015-12-10', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tc_deporte`
--

CREATE TABLE IF NOT EXISTS `tc_deporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tc_deporte`
--

INSERT INTO `tc_deporte` (`id`, `nombre`) VALUES
(1, 'Gimnasio'),
(2, 'Clases'),
(6, 'Juegos Infantiles'),
(7, 'Bicicletas'),
(8, 'Fitness');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tc_electronica`
--

CREATE TABLE IF NOT EXISTS `tc_electronica` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `tc_electronica`
--

INSERT INTO `tc_electronica` (`id`, `nombre`) VALUES
(1, 'Computadores'),
(2, 'Celulares'),
(5, 'Videojuegos'),
(6, 'Audio'),
(9, 'TV'),
(10, 'Videos'),
(13, 'fotografía'),
(17, 'Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tc_empleo`
--

CREATE TABLE IF NOT EXISTS `tc_empleo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tc_empleo`
--

INSERT INTO `tc_empleo` (`id`, `nombre`) VALUES
(1, 'Ofertas de empleo'),
(2, 'Busco empleo'),
(3, 'Empresas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tc_hogar`
--

CREATE TABLE IF NOT EXISTS `tc_hogar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tc_hogar`
--

INSERT INTO `tc_hogar` (`id`, `nombre`) VALUES
(1, 'Electrodomesticos'),
(2, 'Jardin'),
(6, 'Libros'),
(7, 'Escuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tc_hospedaje`
--

CREATE TABLE IF NOT EXISTS `tc_hospedaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tc_hospedaje`
--

INSERT INTO `tc_hospedaje` (`id`, `nombre`) VALUES
(1, 'Hotel'),
(2, 'Cabaña');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tc_inmuebles`
--

CREATE TABLE IF NOT EXISTS `tc_inmuebles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `tc_inmuebles`
--

INSERT INTO `tc_inmuebles` (`id`, `nombre`) VALUES
(2, 'Departamentos'),
(5, 'Piezas'),
(6, 'Casas'),
(7, 'Oficinas'),
(11, 'Industrial'),
(12, 'Comercial'),
(14, 'Terrenos'),
(19, 'Casas Prefabricadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tc_locales`
--

CREATE TABLE IF NOT EXISTS `tc_locales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `tc_locales`
--

INSERT INTO `tc_locales` (`id`, `nombre`) VALUES
(1, 'Viñas'),
(4, 'Restaurantes'),
(6, 'Farmacias'),
(7, 'Ferreterias'),
(10, 'Clínicas'),
(13, 'Tiendas'),
(14, 'Industrias'),
(18, 'Mercados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tc_moda`
--

CREATE TABLE IF NOT EXISTS `tc_moda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `tc_moda`
--

INSERT INTO `tc_moda` (`id`, `nombre`) VALUES
(1, 'Ropa de Mujer'),
(2, 'Ropa de Hombre'),
(5, 'Calzado de Mujer'),
(6, 'Calzado de Hombre'),
(10, 'Accesorios'),
(11, 'Bolsos'),
(13, 'Ropa de Niños'),
(14, 'Calzado de Niños');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tc_salud`
--

CREATE TABLE IF NOT EXISTS `tc_salud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tc_salud`
--

INSERT INTO `tc_salud` (`id`, `nombre`) VALUES
(1, 'Tratamientos'),
(4, 'Medicamentos'),
(6, 'Elementos de seguridad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tc_servicios`
--

CREATE TABLE IF NOT EXISTS `tc_servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `tc_servicios`
--

INSERT INTO `tc_servicios` (`id`, `nombre`) VALUES
(1, 'Taxi'),
(2, 'Transporte'),
(5, 'Clases'),
(6, 'Cursos'),
(9, 'Construccion'),
(10, 'Arquitectura'),
(13, 'Mecánica'),
(14, 'Electricidad'),
(18, 'Imprenta'),
(19, 'Telecomunicación'),
(20, 'Gasfitería'),
(25, 'Gastronomia'),
(26, 'Salones de Belleza'),
(27, 'Informática');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tc_turismo`
--

CREATE TABLE IF NOT EXISTS `tc_turismo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tc_turismo`
--

INSERT INTO `tc_turismo` (`id`, `nombre`) VALUES
(1, 'Recorridos'),
(4, 'Clases'),
(5, 'Parcela Fiestas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tc_vehiculos`
--

CREATE TABLE IF NOT EXISTS `tc_vehiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tc_vehiculos`
--

INSERT INTO `tc_vehiculos` (`id`, `nombre`) VALUES
(1, 'Autos'),
(2, 'Camionetas'),
(5, 'Motos'),
(6, 'Camiones'),
(9, 'Accesorios'),
(10, 'Barcos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_configuration`
--

CREATE TABLE IF NOT EXISTS `uc_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `value` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `uc_configuration`
--

INSERT INTO `uc_configuration` (`id`, `name`, `value`) VALUES
(1, 'website_name', 'portalcasablanca.cl'),
(2, 'website_url', 'www.portalcasablanca.cl/'),
(3, 'email', 'noreply@portalcasablanca.cl'),
(4, 'activation', 'true'),
(5, 'resend_activation_threshold', '0'),
(6, 'language', 'models/languages/es-cl.php'),
(7, 'template', 'models/site-templates/default.css');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_pages`
--

CREATE TABLE IF NOT EXISTS `uc_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(150) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `uc_pages`
--

INSERT INTO `uc_pages` (`id`, `page`, `private`) VALUES
(1, 'account.php', 1),
(2, 'activate-account.php', 0),
(3, 'admin_configuration.php', 1),
(4, 'admin_page.php', 1),
(5, 'admin_pages.php', 1),
(6, 'admin_permission.php', 1),
(7, 'admin_permissions.php', 1),
(8, 'admin_user.php', 1),
(9, 'admin_users.php', 1),
(10, 'forgot-password.php', 0),
(11, 'index.php', 0),
(12, 'left-nav.php', 0),
(13, 'login.php', 0),
(14, 'logout.php', 1),
(16, 'resend-activation.php', 0),
(17, 'user_settings.php', 1),
(19, 'panel.php', 1),
(23, 'buscar.php', 0),
(24, 'crear_aviso.php', 1),
(25, 'footer.php', 0),
(26, 'header.php', 0),
(28, 'registrar.php', 0),
(29, 'recuperar_pass.php', 0),
(30, 'articulo.php', 0),
(31, 'crear_aviso_user.php', 0),
(32, 'imagen-ajax.php', 0),
(33, 'eliminar.php', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_permissions`
--

CREATE TABLE IF NOT EXISTS `uc_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `uc_permissions`
--

INSERT INTO `uc_permissions` (`id`, `name`) VALUES
(1, 'New Member'),
(2, 'Administrator');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_permission_page_matches`
--

CREATE TABLE IF NOT EXISTS `uc_permission_page_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `uc_permission_page_matches`
--

INSERT INTO `uc_permission_page_matches` (`id`, `permission_id`, `page_id`) VALUES
(1, 1, 1),
(2, 1, 14),
(3, 1, 17),
(4, 2, 1),
(5, 2, 3),
(6, 2, 4),
(7, 2, 5),
(8, 2, 6),
(9, 2, 7),
(10, 2, 8),
(11, 2, 9),
(12, 2, 14),
(13, 2, 17),
(26, 1, 19),
(30, 1, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_users`
--

CREATE TABLE IF NOT EXISTS `uc_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(150) NOT NULL,
  `activation_token` varchar(225) NOT NULL,
  `last_activation_request` int(11) NOT NULL,
  `lost_password_request` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `title` varchar(150) NOT NULL,
  `sign_up_stamp` int(11) NOT NULL,
  `last_sign_in_stamp` int(11) NOT NULL,
  `telefono` text NOT NULL,
  `web` text NOT NULL,
  `Plan` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `uc_users`
--

INSERT INTO `uc_users` (`id`, `user_name`, `display_name`, `password`, `email`, `activation_token`, `last_activation_request`, `lost_password_request`, `active`, `title`, `sign_up_stamp`, `last_sign_in_stamp`, `telefono`, `web`, `Plan`) VALUES
(1, 'admin', 'Administrador', '584c5cd96587318af0eaa6f42a4c72428303df2d6e0273fa38112f5bdd30d4a9b', 'falconsoft.4d@gmail.com', '4b1c43eed40ca7fd6a9618cdc78cba64', 1447627061, 0, 1, 'New Member', 1447627061, 1449780086, '66285611', 'www.marlonfalcon.cl', 100),
(4, 'marlon', 'marlon', 'f9da5ee77d8f1884366820cf0b7358552e6d17e80aa6eea92e389a852d46b7252', 'falconsoft.3d@gmail.com', '950f466f744d351e5879188741d01407', 1449770824, 0, 0, 'New Member', 1449770824, 0, '', '', 3),
(5, 'maria2', 'maria2', '18455ee89058966415146221ba5251bf6f9c9e28951262025bfd4c0b7c6c34e19', 'maria@maria.es', '6f9b4d749777dc00872996ec36f64921', 1449771064, 0, 0, 'New Member', 1449771064, 0, '', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc_user_permission_matches`
--

CREATE TABLE IF NOT EXISTS `uc_user_permission_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `uc_user_permission_matches`
--

INSERT INTO `uc_user_permission_matches` (`id`, `user_id`, `permission_id`) VALUES
(1, 1, 2),
(2, 1, 1),
(6, 4, 1),
(7, 5, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
