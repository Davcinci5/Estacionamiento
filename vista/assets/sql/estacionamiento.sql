-- Base de datos: `estacionamiento`

-- Estructura de tabla para la tabla `automovil`

CREATE TABLE `automovil` (
  `Folio` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Placas` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Modelo` varchar(20) COLLATE utf8_spanish_ci,
  `Color` varchar(20) COLLATE utf8_spanish_ci,
  `Cajon` varchar(10) COLLATE utf8_spanish_ci,
  `Observaciones` varchar(255) COLLATE utf8_spanish_ci,
  `Tipo_auto` varchar(20) COLLATE utf8_spanish_ci,
  `Hora_entrada` time(6),
  `Hora_Salida` time(6),
  `FechaEntrada` date,
  `FechaSalida` date,
  `Tiempo` time(6),
  `Lavado` int(2),
  `Adicional` varchar(50) COLLATE utf8_spanish_ci,
  `Monto_adicional` double,
  `Descuento` double,
  `Total` double
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcado de datos para la tabla `automovil`

INSERT INTO `automovil` (`Placas`, `Modelo`, `Color`, `Cajon`, `Tipo_auto`, `Hora_entrada`, `FechaEntrada`, `Lavado`)
                        VALUES
                        ('TXC-1023', 'Tsuru 2005', 'Amarillo', '12a', 'Automovil', '12:20:13.000000', '2017-11-08',  1),
                        ('TXC-9483', 'Focus 2005', 'Azul', '5b', 'Automovil', '15:30:13.000000', '2017-11-08',  0);

-- Estructura de tabla para la tabla `precios`

CREATE TABLE `precios` (
  `IdPrecio` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Fraccion` double,
  `Hora` double,
  `Dia` double,
  `Semana` double,
  `Mes` double
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Estructura de tabla para la tabla `usuarios`

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `Nombre_Usuario` varchar(50) COLLATE utf8_spanish_ci,
  `Password` int(255) NOT NULL,
  `Admin` int(2),
  `Activo` int(2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `config_ticket` (
  `nombre_estacionamiento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `domicilio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `sitio` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `pie_pagina` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  'logotipo' varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
