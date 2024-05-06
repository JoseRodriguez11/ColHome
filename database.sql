-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2024 a las 09:39:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `col_home`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(250) NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `stakeholders_id` int(11) NOT NULL,
  `stakeholders_name` varchar(100) NOT NULL,
  `stakeholders_number` varchar(50) NOT NULL,
  `stakeholders_email` varchar(100) NOT NULL,
  `stakeholders_interest` varchar(100) NOT NULL DEFAULT 'Asesoramiento',
  `stakeholders_contact` varchar(50) NOT NULL DEFAULT 'Correo',
  `stakeholders_state` varchar(50) NOT NULL DEFAULT 'Sin contactar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `contact`
--

INSERT INTO `contact` (`stakeholders_id`, `stakeholders_name`, `stakeholders_number`, `stakeholders_email`, `stakeholders_interest`, `stakeholders_contact`, `stakeholders_state`) VALUES
(1, 'jose', '123456', 'jose@gmail.com', 'Asesoramiento', 'Correo', 'Sin contactar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `houses`
--

CREATE TABLE `houses` (
  `home_id` int(11) NOT NULL,
  `home_category` varchar(100) NOT NULL,
  `home_price` int(11) NOT NULL,
  `home_city` varchar(100) NOT NULL,
  `home_neighborhood` varchar(100) NOT NULL,
  `home_location` varchar(50) NOT NULL,
  `home_rooms` int(11) NOT NULL,
  `home_bathrooms` int(11) NOT NULL,
  `home_meters` int(11) NOT NULL,
  `home_description` varchar(255) NOT NULL,
  `home_importance` varchar(255) NOT NULL DEFAULT 'alta',
  `home_image1` varchar(255) NOT NULL,
  `home_image2` varchar(255) NOT NULL,
  `home_image3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `houses`
--

INSERT INTO `houses` (`home_id`, `home_category`, `home_price`, `home_city`, `home_neighborhood`, `home_location`, `home_rooms`, `home_bathrooms`, `home_meters`, `home_description`, `home_importance`, `home_image1`, `home_image2`, `home_image3`) VALUES
(1, 'apartamento', 450000000, 'pereira', 'Cerritos', 'Risaralda', 2, 1, 112, 'Este acogedor apartamento en el corazón de la ciudad ofrece comodidades modernas y una ubicación privilegiada. Con una sala luminosa, cocina elegante y acceso a gimnasio y piscina, este es el lugar ideal para vivir tu mejor vida urbana. ¡Ven y hazlo tuyo ', 'alta', 'apartamento1.jpg', 'apartamento1_sala.jpg', 'apartamento1.jpg'),
(2, 'Apartamento', 600000000, 'Medellín', 'El poblado', 'Antioquia', 3, 2, 120, 'Este acogedor apartamento en el corazón de la ciudad ofrece comodidades modernas y una ubicación privilegiada. Con una sala luminosa, cocina elegante y acceso a gimnasio y piscina, este es el lugar ideal para vivir tu mejor vida urbana. ¡Ven y hazlo tuyo ', 'alta', 'apartamento2.jpg', 'apartamento2_bano.jpg', 'apartamento2.jpg'),
(3, 'casa', 580000000, 'Cali', 'santa Rita', 'valle del Cauca', 2, 1, 100, 'Este acogedor apartamento en el corazón de la ciudad ofrece comodidades modernas y una ubicación privilegiada. Con una sala luminosa, cocina elegante y acceso a gimnasio y piscina, este es el lugar ideal para vivir tu mejor vida urbana. ¡Ven y hazlo tuyo ', 'alta', 'apartamento3.jpeg', 'apartamento3_cuarto.jpg', 'apartamento3.jpeg'),
(4, 'Apartamento', 620000000, 'pereira', 'Cerritos', 'Risaralda', 3, 1, 120, 'Este acogedor apartamento en el corazón de la ciudad ofrece comodidades modernas y una ubicación privilegiada. Con una sala luminosa, cocina elegante y acceso a gimnasio y piscina, este es el lugar ideal para vivir tu mejor vida urbana. ¡Ven y hazlo tuyo ', 'alta', 'apartamento4.jpg', 'apartamento4_sala.jpg', 'apartamento4.jpg'),
(5, 'Casa', 300000000, 'Cali', 'Norte', 'Valle del cauca', 2, 1, 90, 'Este acogedor hogar en el corazón de la ciudad ofrece comodidades modernas y una ubicación privilegiada. Con una sala luminosa, cocina elegante, este es el lugar ideal para vivir tu mejor vida urbana. ¡Ven y hazlo tuyo ahora mismo!', 'media', 'casa1.jpg', 'casa1_sala.jpg', 'casa1.jpg'),
(6, 'Casa', 400000000, 'Popayán', 'Norte', 'cauca', 4, 2, 130, 'Este acogedor hogar en el corazón de la ciudad ofrece comodidades modernas y una ubicación privilegiada. Con una sala luminosa, cocina elegante, este es el lugar ideal para vivir tu mejor vida urbana. ¡Ven y hazlo tuyo ahora mismo!', 'alta', 'casa2.jpg', 'casa2_sala.jpg', 'casa2.jpg'),
(7, 'Casa', 400000000, 'Villavicencio', 'Norte', 'Meta', 3, 2, 150, 'Este acogedor hogar en el corazón de la ciudad ofrece comodidades modernas y una ubicación privilegiada. Con una sala luminosa, cocina elegante, este es el lugar ideal para vivir tu mejor vida urbana. ¡Ven y hazlo tuyo ahora mismo!', 'alta', 'casa3.jpg', 'casa3.jpg', 'casa3.jpg'),
(8, 'Casa', 900000000, 'Bogota', 'Rosales', 'Cundinamarca', 4, 2, 140, 'Este acogedor hogar en el corazón de la ciudad ofrece comodidades modernas y una ubicación privilegiada. Con una sala luminosa, cocina elegante, este es el lugar ideal para vivir tu mejor vida urbana. ¡Ven y hazlo tuyo ahora mismo!', 'alta', 'casa4.jpg', 'casa4_sala.jpg', 'casa4.jpg'),
(9, 'Casa', 400000000, 'Bogota', 'Seminario', 'cundinamarca', 4, 2, 130, 'Este acogedor hogar en el corazón de la ciudad ofrece comodidades modernas y una ubicación privilegiada. Con una sala luminosa, cocina elegante, este es el lugar ideal para vivir tu mejor vida urbana. ¡Ven y hazlo tuyo ahora mismo!', 'alta', 'casa5.jpg', 'casa5_cosina.jpg', 'casa5.jpg'),
(10, 'finca', 1000000000, 'Popayán', 'Norte', 'cauca', 5, 3, 300, 'Este acogedor hogar en las afueras de la ciudad ofrece comodidades modernas.Con una sala luminosa, cocina elegante, este es el lugar ideal para vivir tu mejor vida urbana. ¡Ven y hazlo tuyo ahora mismo!', 'media', 'finca1.jpg', 'finca1_sala.jpg', 'finca1.jpg'),
(11, 'finca', 1200000000, 'Buga', 'Norte', 'Valle del cauca', 2, 1, 400, 'Este acogedor hogar en las afueras de la ciudad ofrece comodidades modernas.Con una sala luminosa, cocina elegante, este es el lugar ideal para vivir tu mejor vida urbana. ¡Ven y hazlo tuyo ahora mismo!', 'media', 'finca2.jpg', 'finca2_sala.jpg', 'finca2.jpg'),
(12, 'Casa', 1500000000, 'Popayán', 'Norte', 'cauca', 5, 3, 300, 'Este acogedor hogar en las afueras de la ciudad ofrece comodidades modernas.Con una sala luminosa, cocina elegante, este es el lugar ideal para vivir tu mejor vida urbana. ¡Ven y hazlo tuyo ahora mismo!', 'alta', 'home1.jpg', 'home1.jpg', 'home1.jpg'),
(14, 'finca', 1300000000, 'popayan', 'norte', 'cauca', 6, 4, 330, 'agradable finca a a las afueran de popayán con acabados de lujo , cuenta con piscina y cancha de futbol', 'media', 'i6.jpg', 'i6.jpg', 'i6.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `send_information`
--

CREATE TABLE `send_information` (
  `information_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `home_id` int(11) NOT NULL,
  `information_message` varchar(500) NOT NULL DEFAULT 'Me gustaria tener informacion sobre esta vivienda',
  `information_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status_answer` varchar(50) NOT NULL DEFAULT 'Correo pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `send_information`
--

INSERT INTO `send_information` (`information_id`, `user_id`, `home_id`, `information_message`, `information_date`, `status_answer`) VALUES
(1, 1, 2, 'dasda', '2024-05-06 02:13:25', 'Correo enviado'),
(2, 1, 2, 'dasdas', '2024-05-06 02:13:36', 'Correo enviado'),
(3, 1, 2, 'sadsdd', '2024-05-06 02:14:15', 'Correo enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'usuario1', 'usuario1@gmail.com', '122b738600a0f74f7c331c0ef59bc34c');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`stakeholders_id`);

--
-- Indices de la tabla `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`home_id`);

--
-- Indices de la tabla `send_information`
--
ALTER TABLE `send_information`
  ADD PRIMARY KEY (`information_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `stakeholders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `houses`
--
ALTER TABLE `houses`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `send_information`
--
ALTER TABLE `send_information`
  MODIFY `information_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
