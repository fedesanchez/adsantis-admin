CREATE TABLE `salon` (
  `id_salon` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `latitud` varchar(45) DEFAULT NULL,
  `longitud` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_salon`),
  UNIQUE KEY `id_salon_UNIQUE` (`id_salon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `punto_venta` (
  `id_punto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `latitud` varchar(45) DEFAULT NULL,
  `longitud` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_punto`),
  UNIQUE KEY `id_punto_UNIQUE` (`id_punto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
