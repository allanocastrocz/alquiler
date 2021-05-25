-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 11:34 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alquiler`
--
CREATE DATABASE IF NOT EXISTS `alquiler` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `alquiler`;

-- --------------------------------------------------------

--
-- Table structure for table `alquiler`
--

DROP TABLE IF EXISTS `alquiler`;
CREATE TABLE `alquiler` (
  `id` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `tic_fol` varchar(8) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `matricula` varchar(9) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `alquiler`
--

INSERT INTO `alquiler` (`id`, `fecha_salida`, `fecha_entrada`, `tic_fol`, `matricula`) VALUES
('alqui001', '0000-00-00', '0000-00-00', '0531', 'CABA4532'),
('alqui002', '2021-05-11', '2021-06-16', '7915', 'RABA7634'),
('alqui003', '0000-00-00', '0000-00-00', '4582', 'PXTW4532'),
('alqui004', '0000-00-00', '0000-00-00', '7892', 'GARA3542'),
('alqui005', '2021-05-28', '2021-05-14', '7915', 'GARA3542');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `rfc` varchar(13) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cli_dni` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apaterno` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `amaterno` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(25) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `clave` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`rfc`, `cli_dni`, `nombre`, `apaterno`, `amaterno`, `email`, `clave`) VALUES
('CAVC7708221H0', 'CAVC000003', 'Carlos', 'Cabrera', 'Vergara', 'carlosc@hotmail.com', '$2y$10$yZ3g3RMZr8gdDt/qEyyPaOkeds2bY3ajGGqZ3ERHiHYUUhh02Rh5K'),
('CORL9805131N0', 'CORL000004', 'Luis Enrique', 'Coba', 'Roman', 'romanc@hotmail.com', '$2y$10$yZ3g3RMZr8gdDt/qEyyPaOkeds2bY3ajGGqZ3ERHiHYUUhh02Rh5K'),
('GAGJ7804142M0', 'GAGJ000005', 'Jesus', 'Garcia', 'Garcia', 'jesusg@hotmail.com', '$2y$10$yZ3g3RMZr8gdDt/qEyyPaOkeds2bY3ajGGqZ3ERHiHYUUhh02Rh5K'),
('MELM8305281H0', 'MELM000001', 'Mario', 'Merino', 'Lazaro', 'mmerino@hotmail.com', '$2y$10$yZ3g3RMZr8gdDt/qEyyPaOkeds2bY3ajGGqZ3ERHiHYUUhh02Rh5K'),
('RAPL9804123M2', 'RAPL000002', 'Luis', 'Ramirez', 'Perez', 'lramirez@hotmail.com', '$2y$10$yZ3g3RMZr8gdDt/qEyyPaOkeds2bY3ajGGqZ3ERHiHYUUhh02Rh5K');

-- --------------------------------------------------------

--
-- Table structure for table `cliente2`
--

DROP TABLE IF EXISTS `cliente2`;
CREATE TABLE `cliente2` (
  `cli_rfc` varchar(13) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cli_dni` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `cliente2`
--

INSERT INTO `cliente2` (`cli_rfc`, `cli_dni`, `direccion`, `telefono`) VALUES
('RAPL9804123M2', 'RAPL000002', 'AV LAS AMERICAS AV BOYACA', '2224789677'),
('MELM8305281H0', 'MELM000001', 'AUTOPISTA NORTE CALLE 153', '2224785691'),
('CORL9805131N0', 'CORL000004', 'CARRERA 15 CALLE 100', '2228566579'),
('GAGJ7804142M0', 'GAGJ000005', 'AUTOPISTA SUR CALLE 59 SUR', '2227568479'),
('CAVC7708221H0', 'CAVC000003', 'CALLE 80 CARRERA 114', '2226741589');

-- --------------------------------------------------------

--
-- Table structure for table `coche`
--

DROP TABLE IF EXISTS `coche`;
CREATE TABLE `coche` (
  `matricula` varchar(9) COLLATE utf8mb4_spanish_ci NOT NULL,
  `modelo` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `marca` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ocupantes` int(11) DEFAULT NULL,
  `precioxdia` double(8,2) DEFAULT NULL,
  `observaciones` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `factura` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `gar_id` varchar(8) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `seg_id` varchar(8) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dist_id` varchar(8) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `mant_id` varchar(8) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `coche`
--

INSERT INTO `coche` (`matricula`, `modelo`, `marca`, `ocupantes`, `precioxdia`, `observaciones`, `factura`, `gar_id`, `seg_id`, `dist_id`, `mant_id`) VALUES
('CABA4532', '2015', 'VMW', 5, 1500.00, 'Rayón costado derecho', 'impresa', '001', 'seg01', 'ds01', 'mante001'),
('CHAP0997', '2021', 'FORD', 20, 6000.00, 'buen estado', 'eniada al correo', '005', 'seg05', 'ds05', 'mante005'),
('GARA3542', '2019', 'TOYOTA', 15, 3500.00, 'buen estado', 'impresa', '004', 'seg04', 'ds04', 'mante004'),
('PXTW4532', '2018', 'HONDA', 8, 2800.00, 'pocas fallas', 'impresa', '003', 'seg03', 'ds03', 'mante003'),
('RABA7634', '2019', 'NISAN', 10, 3000.00, 'buen estado', 'eniada al correo', '002', 'seg02', 'ds02', 'mante002'),
('VERP0238', '2020', 'Tesla X', 5, 50000.00, 'No sirve ventana', 'Escrita', '003', 'seg04', 'ds01', 'mante005');

-- --------------------------------------------------------

--
-- Table structure for table `distribuidor`
--

DROP TABLE IF EXISTS `distribuidor`;
CREATE TABLE `distribuidor` (
  `id` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `ciudad` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `distribuidor`
--

INSERT INTO `distribuidor` (`id`, `nombre`, `direccion`, `ciudad`, `telefono`, `email`) VALUES
('ds01', 'Juan', 'colonia tacuballa num 03', 'Puebla', '2222343656', 'dis01@gmail.com'),
('ds02', 'Manuel', 'av. albaro obregon', 'Veracruz', '2346544576', 'dis02@hotmail.com'),
('ds03', 'Josè', 'av. carrillo num. 03', 'Guadalajara', '2330003573', 'dis03@yahoo.com'),
('ds04', 'Alberto', 'colonia la sienega num. 98', 'Sonora', '3453545290', 'dis04@Outlook.com'),
('ds05', 'beto', 'colonia las animas num. 45', 'Yucatan', '5672349876', 'dis05@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `rfc` varchar(13) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apaterno` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `amaterno` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `puesto` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `loc_id` varchar(8) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `gar_id` varchar(8) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `jefe_id` varchar(13) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `clave` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `empleado`
--

INSERT INTO `empleado` (`rfc`, `nombre`, `apaterno`, `amaterno`, `puesto`, `telefono`, `loc_id`, `gar_id`, `jefe_id`, `clave`) VALUES
('GAOA004', 'ANTONIO', 'ORTIZ', 'GARCIA', 'EMPLEADO', '2221232425', '0004', '004', 'MORF008', '$2y$10$yZ3g3RMZr8gdDt/qEyyPaOkeds2bY3ajGGqZ3ERHiHYUUhh02Rh5K'),
('LOSR002', 'RAUL', 'SANCHEZ', 'LOPEZ', 'EMPLEADO', '2228954723', '0003', '003', 'MORF008', '$2y$10$yZ3g3RMZr8gdDt/qEyyPaOkeds2bY3ajGGqZ3ERHiHYUUhh02Rh5K'),
('MORF008', 'FELIPE', 'RAMIREZ', 'MORALES', 'JEFE', '2224414546', '0005', '005', 'MORF008', '$2y$10$yZ3g3RMZr8gdDt/qEyyPaOkeds2bY3ajGGqZ3ERHiHYUUhh02Rh5K'),
('PEHF003', 'FERNANDO', 'HUERTA', 'PEREZ', 'JEFE', '2225641237', '0001', '001', 'PEHF003', '$2y$10$yZ3g3RMZr8gdDt/qEyyPaOkeds2bY3ajGGqZ3ERHiHYUUhh02Rh5K'),
('PEPJ001', 'JOSE', 'PEREZ', 'PEREZ', 'EMPLEADO', '2224568971', '0002', '002', 'PEHF003', '$2y$10$yZ3g3RMZr8gdDt/qEyyPaOkeds2bY3ajGGqZ3ERHiHYUUhh02Rh5K');

-- --------------------------------------------------------

--
-- Table structure for table `faccliente`
--

DROP TABLE IF EXISTS `faccliente`;
CREATE TABLE `faccliente` (
  `id` int(8) NOT NULL,
  `gasto_adi` double DEFAULT NULL,
  `iva` double DEFAULT NULL,
  `descuento` double DEFAULT NULL,
  `costo_total` double DEFAULT NULL,
  `cli_rfc` varchar(13) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `cli_dni` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `tic_fol` varchar(8) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `faccliente`
--

INSERT INTO `faccliente` (`id`, `gasto_adi`, `iva`, `descuento`, `costo_total`, `cli_rfc`, `cli_dni`, `tic_fol`) VALUES
(11, 320.25, 15.28, 110.5, 2222.03, 'MELM8305281H0', 'MELM000001', '7915'),
(22, 349.5, 17.4, 125.78, 5489.25, 'GAGJ7804142M0', 'GAGJ000005', '4582'),
(33, 0, 10, 158.75, 9563, 'RAPL9804123M2', 'RAPL000002', '0531'),
(44, 489, 80, 110.2, 5784.24, 'CORL9805131N0', 'CORL000004', '4785'),
(55, 1200, 7.54, 115.45, 7845.36, 'CAVC7708221H0', 'CAVC000003', '7892');

-- --------------------------------------------------------

--
-- Table structure for table `garage`
--

DROP TABLE IF EXISTS `garage`;
CREATE TABLE `garage` (
  `id` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `total_coches` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `garage`
--

INSERT INTO `garage` (`id`, `direccion`, `telefono`, `email`, `capacidad`, `total_coches`) VALUES
('001', 'colonia tacuballa Puebla', '2334562457', 'garage001@gmail.com', 55, 100),
('002', 'avenida mira valles Puebla, num. 56', '234765294', 'garage002@hotmail.com', 65, 100),
('003', 'colonia los serritos num. 09', '2347654578', 'garage003@yahoo.com', 40, 100),
('004', 'calle obregon las animas 054', '6542340900', 'garage004@hotmail.com', 55, 100),
('005', 'calle azteca numero 13', '9875359988', 'garage005@gmail.com', 45, 100);

-- --------------------------------------------------------

--
-- Table structure for table `local`
--

DROP TABLE IF EXISTS `local`;
CREATE TABLE `local` (
  `id` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion` varchar(40) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `local`
--

INSERT INTO `local` (`id`, `nombre`, `direccion`, `telefono`, `email`) VALUES
('0001', 'Alquiler la uno', 'Avenida la sienega numero 03, puebla', '2331182121', 'elalquilerlauno@hotmail.com'),
('0002', 'Alquiler la dos', 'Colonia centro Puebla 5 de mayo', '2223456732', 'elalquilerdelados@gmail.com'),
('0003', 'Alquiler tres', 'Colonia san Francisco local 123, Puebla', '2342459875', 'elalquilerlatres@Outlook.com'),
('0004', 'Alquiler cuatro', 'Avenida Juares local 245, Puebla', '2365726609', 'elalquilerdelacuatro@Yahoo.com'),
('0005', 'Alquiler cinco', 'Cholula, Puebla centro 123', '2481542478', 'elalquilerdelacinco@gmail.com'),
('0006', 'Alquiler El Jal', 'Maravillas, Puebla', '234234234', 'eljale@pue.mx');

-- --------------------------------------------------------

--
-- Table structure for table `mantenimiento`
--

DROP TABLE IF EXISTS `mantenimiento`;
CREATE TABLE `mantenimiento` (
  `id` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_ultima` date DEFAULT NULL,
  `fecha_proxima` date DEFAULT NULL,
  `gasto_combustible` double(8,2) DEFAULT NULL,
  `refaccion` double(8,2) DEFAULT NULL,
  `costo_total` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `mantenimiento`
--

INSERT INTO `mantenimiento` (`id`, `fecha_ultima`, `fecha_proxima`, `gasto_combustible`, `refaccion`, `costo_total`) VALUES
('mante001', '2021-05-24', '2021-06-24', 550.00, 220.50, 857.36),
('mante002', '0000-00-00', '0000-00-00', 862.00, 120.50, 935.60),
('mante003', '0000-00-00', '0000-00-00', 165.00, 20.50, 89.00),
('mante004', '0000-00-00', '0000-00-00', 852.00, 45.00, 1020.00),
('mante005', '0000-00-00', '0000-00-00', 652.00, 452.00, 1207.20),
('mante006', '2021-05-24', '2021-06-24', 5000.00, 5465.00, 456465.00);

-- --------------------------------------------------------

--
-- Table structure for table `promocion`
--

DROP TABLE IF EXISTS `promocion`;
CREATE TABLE `promocion` (
  `id` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `costo` float(8,2) DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `promocion`
--

INSERT INTO `promocion` (`id`, `nombre`, `tipo`, `costo`, `inicio`, `fin`) VALUES
('ALPA0002', 'udam', 'Del mes', 350.75, '2021-05-17', '0000-00-00'),
('FERO0005', 'udids', 'Inicio de semana', 150.75, '0000-00-00', '0000-00-00'),
('GAMA0003', 'udaa', 'Del año', 650.75, '0000-00-00', '0000-00-00'),
('TERA0004', 'udaf', 'Fin de semana', 250.75, '0000-00-00', '0000-00-00'),
('TESLA000', 'spacex', 'Semana', 1000000.00, '2021-05-06', '2021-06-16'),
('UNIX0001', 'udas', 'De la semana', 450.75, '2021-05-17', '2021-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `seguro`
--

DROP TABLE IF EXISTS `seguro`;
CREATE TABLE `seguro` (
  `id` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `tipo` varchar(15) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `costo` float(8,2) DEFAULT NULL,
  `vigencia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `seguro`
--

INSERT INTO `seguro` (`id`, `descripcion`, `tipo`, `costo`, `vigencia`) VALUES
('seg01', 'AMPLIA', 'VUELCO', 1500.00, '0000-00-00'),
('seg02', 'AMPLIA', 'COLISION', 1500.00, '0000-00-00'),
('seg03', 'AMPLIA PLUS', 'QUEMADURA', 3000.00, '0000-00-00'),
('seg04', 'LIMITADA', 'VUELCO', 900.00, '0000-00-00'),
('seg05', 'AMPLIA', 'ROBO', 1500.00, '0000-00-00'),
('seg06', 'LIMITADA', 'Semana', 345345.00, '2021-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `folio` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(8) DEFAULT NULL,
  `prom_id` varchar(8) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`folio`, `fecha`, `cantidad`, `prom_id`) VALUES
('0531', '0000-00-00', 2, 'GAMA0003'),
('3458', '2021-05-12', 5, 'FERO0005'),
('4582', '0000-00-00', 1, 'FERO0005'),
('4785', '2021-05-10', 4, 'UNIX0001'),
('64577', '2021-05-11', 345345, 'FERO0005'),
('7892', '0000-00-00', 2, 'ALPA0002'),
('7915', '0000-00-00', 3, 'TERA0004');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_promocion`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_promocion`;
CREATE TABLE `view_promocion` (
`id` varchar(8)
,`nombre` varchar(15)
,`tipo` varchar(20)
,`costo` float(8,2)
,`inicio` varchar(10)
,`fin` varchar(10)
);

-- --------------------------------------------------------

--
-- Structure for view `view_promocion`
--
DROP TABLE IF EXISTS `view_promocion`;

DROP VIEW IF EXISTS `view_promocion`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_promocion`  AS SELECT `promocion`.`id` AS `id`, `promocion`.`nombre` AS `nombre`, `promocion`.`tipo` AS `tipo`, `promocion`.`costo` AS `costo`, date_format(`promocion`.`inicio`,'%d-%m-%Y') AS `inicio`, date_format(`promocion`.`fin`,'%Y/%m/%d') AS `fin` FROM `promocion` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticalq_fk` (`tic_fol`),
  ADD KEY `matalq_fk` (`matricula`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`rfc`,`cli_dni`);

--
-- Indexes for table `cliente2`
--
ALTER TABLE `cliente2`
  ADD KEY `cliclie_fk` (`cli_rfc`,`cli_dni`);

--
-- Indexes for table `coche`
--
ALTER TABLE `coche`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `garco_fk` (`gar_id`),
  ADD KEY `segco_fk` (`seg_id`),
  ADD KEY `distco_fk` (`dist_id`),
  ADD KEY `manco_fk` (`mant_id`);

--
-- Indexes for table `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`rfc`),
  ADD KEY `locemp_fk` (`loc_id`),
  ADD KEY `garemp_fk` (`gar_id`),
  ADD KEY `empemp_fk` (`jefe_id`);

--
-- Indexes for table `faccliente`
--
ALTER TABLE `faccliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clifac_fk` (`cli_rfc`,`cli_dni`),
  ADD KEY `ticfac_fk` (`tic_fol`);

--
-- Indexes for table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seguro`
--
ALTER TABLE `seguro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `protic_fk` (`prom_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faccliente`
--
ALTER TABLE `faccliente`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `matalq_fk` FOREIGN KEY (`matricula`) REFERENCES `coche` (`matricula`),
  ADD CONSTRAINT `ticalq_fk` FOREIGN KEY (`tic_fol`) REFERENCES `ticket` (`folio`);

--
-- Constraints for table `cliente2`
--
ALTER TABLE `cliente2`
  ADD CONSTRAINT `cliclie_fk` FOREIGN KEY (`cli_rfc`,`cli_dni`) REFERENCES `cliente` (`rfc`, `cli_dni`);

--
-- Constraints for table `coche`
--
ALTER TABLE `coche`
  ADD CONSTRAINT `distco_fk` FOREIGN KEY (`dist_id`) REFERENCES `distribuidor` (`id`),
  ADD CONSTRAINT `garco_fk` FOREIGN KEY (`gar_id`) REFERENCES `garage` (`id`),
  ADD CONSTRAINT `manco_fk` FOREIGN KEY (`mant_id`) REFERENCES `mantenimiento` (`id`),
  ADD CONSTRAINT `segco_fk` FOREIGN KEY (`seg_id`) REFERENCES `seguro` (`id`);

--
-- Constraints for table `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empemp_fk` FOREIGN KEY (`jefe_id`) REFERENCES `empleado` (`rfc`),
  ADD CONSTRAINT `garemp_fk` FOREIGN KEY (`gar_id`) REFERENCES `garage` (`id`),
  ADD CONSTRAINT `locemp_fk` FOREIGN KEY (`loc_id`) REFERENCES `local` (`id`);

--
-- Constraints for table `faccliente`
--
ALTER TABLE `faccliente`
  ADD CONSTRAINT `clifac_fk` FOREIGN KEY (`cli_rfc`,`cli_dni`) REFERENCES `cliente` (`rfc`, `cli_dni`),
  ADD CONSTRAINT `ticfac_fk` FOREIGN KEY (`tic_fol`) REFERENCES `ticket` (`folio`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `protic_fk` FOREIGN KEY (`prom_id`) REFERENCES `promocion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
