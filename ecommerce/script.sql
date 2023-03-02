DROP TABLE IF EXISTS `detalle_pedido`;
DROP TABLE IF EXISTS `detalle_temp`;
DROP TABLE IF EXISTS `permisos`;
DROP TABLE IF EXISTS `modulo`;
DROP TABLE IF EXISTS `producto`;
DROP TABLE IF EXISTS `categoria`;
DROP TABLE IF EXISTS `pedido`;
DROP TABLE IF EXISTS `persona`;
DROP TABLE IF EXISTS `rol`;

-- -- CATEGORIA

-- CREATE TABLE IF NOT EXISTS `categoria` (
--   `idcategoria` int(20) AUTO_INCREMENT,
--   `nombre` varchar(255),
--   `descripcion` text,
--   `portada` varchar(100),
--   `datecreated` datetime DEFAULT CURRENT_TIMESTAMP,
--   `ruta` varchar(255),
--   `status` int(11) DEFAULT '1',
--   PRIMARY KEY (`idcategoria`)
-- );

-- -- INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `portada`, `datecreated`, `ruta`) VALUES
--  (1, 'Cardiología', 'Mantén un corazón saludable con nuestros productos de cardiología de alta calidad.', '', '', 'cardiología'),
--  (2, 'Resfriado', 'Alivia los síntomas del resfriado con nuestra amplia selección de productos efectivos.', '', '', 'resfriado'),
--  (3, 'Analgésicos', 'Alivia el dolor con nuestros analgésicos efectivos y seguros.', '', '', 'analgésicos'),
--  (4, 'Dermatología', '"Cuida tu piel con nuestros productos de dermatología de alta calidad.', '', '', 'dermatología'),
--  (5, 'Nutrición', '"Mejora tu nutrición con nuestra amplia selección de productos saludables y efectivos.', '', '', 'nutrición'),
--  (6, 'Neurología', '"Mantén tu sistema nervioso en óptimas condiciones con nuestros productos de neurología de alta calidad.', '', '', 'neurología'),
--  (7, 'Aleria', 'Alivia tus síntomas de alergia con nuestra amplia selección de productos efectivos y seguros.', '', '', 'aleria'),
--  (8, 'Oftalmología', 'Cuida tus ojos con nuestros productos de oftalmología de alta calidad.', '', '', 'oftalmología'),
--  (9, 'Hematología', 'Mantén tu sistema sanguíneo saludable con nuestros productos de hematología de alta calidad.', '', '', 'hematología'),
--  (10, 'Semillas', 'Cultiva tu propio jardín con nuestra amplia selección de semillas de alta calidad.', '', '', 'semillas'),
--  (11, 'Herbicidas', 'Controla las malas hierbas en tus cultivos con nuestra amplia selección de herbicidas efectivos y seguros.', '', '', 'herbicidas'),
--  (12, 'Insecticidas', 'Lucha contra las plagas con nuestros insecticidas efectivos y seguros.', '', '', 'insecticidas'),
--  (13, 'Fungicidas', 'Controla los hongos en tus cultivos con nuestros fungicidas efectivos y seguros.', '', '', 'fungicidas');

-- -- PRODUCTO

-- CREATE TABLE IF NOT EXISTS `producto` (
--   `idproducto` int(20) AUTO_INCREMENT,
--   `categoriaid` int(20),
--   `codigo` varchar(30),
--   `nombre` varchar(255),
--   `descripcion` text,
--   `precio` decimal(11,2),
--   `stock` int(11),
--   `imagen` varchar(100),
--   `datecreated` datetime DEFAULT CURRENT_TIMESTAMP,
--   `ruta` varchar(255),
--   `status` int(11) DEFAULT '1',
--   PRIMARY KEY (`idproducto`),
--   KEY `categoriaid` (`categoriaid`)
-- );

-- ALTER TABLE `producto`
--   ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoriaid`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

-- ROL

CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` int(20) AUTO_INCREMENT,
  `nombrerol` varchar(50),
  `descripcion` text,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`idrol`)
);

 INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`) VALUES
 (1, 'Administrador', 'Acceso a todo el sistema'),
 (2, 'Supervisores', 'Supervisor de tienda'),
 (3, 'Vendedores', 'Acceso a módulo ventas'),
 (4, 'Servicio al cliente', 'Servicio al cliente sistema'),
 (5, 'Bodega', 'Bodega'),
 (6, 'Cliente', 'Clientes tienda'),
 (7, 'Coordinador', 'Coordinador'),
 (8, 'Consulta Ventas', 'Consulta Ventas');

-- USUARIOS

CREATE TABLE IF NOT EXISTS `persona` (
  `idpersona` int(20) AUTO_INCREMENT,
  `identificacion` varchar(30) DEFAULT NULL,
  `nombres` varchar(80),
  `apellidos` varchar(100),
  `telefono` int(20),
  `email_user` varchar(100),
  `password` varchar(75),
  `nit` varchar(20) DEFAULT NULL,
  `nombrefiscal` varchar(80) DEFAULT NULL,
  `direccionfiscal` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `rolid` int(20),
  `datecreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`idpersona`),
  KEY `rolid` (`rolid`)
);
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `persona` (`idpersona`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_user`, `password`, `nit`, `nombrefiscal`, `direccionfiscal`, `token`, `rolid`, `datecreated`, `status`) VALUES
(1, '7897987987', 'DAM', 'DAM', 78454121, 'dam@info.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '', '', '', '', 1, '2023-02-13 00:51:44', 1);

-- MODULO

CREATE TABLE IF NOT EXISTS `modulo` (
  `idmodulo` int(20) AUTO_INCREMENT,
  `titulo` varchar(50),
  `descripcion` text,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`idmodulo`)
);

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard', 1),
(2, 'Usuarios', 'Usuarios del sistema', 1),
(3, 'Clientes', 'Clientes de tienda', 1),
(4, 'Productos', 'Todos los productos', 1),
(5, 'Pedidos', 'Pedidos', 1),
(6, 'Caterogías', 'Caterogías Productos', 1),
(7, 'Suscriptores', 'Suscriptores del sitio web', 1),
(8, 'Contactos', 'Mensajes del formulario contacto', 1),
(9, 'Páginas', 'Páginas del sitio web', 1);

-- PERMISOS

CREATE TABLE `permisos` (
  `idpermiso` int(20) AUTO_INCREMENT,
  `rolid` int(20),
  `moduloid` int(20),
  `r` boolean DEFAULT false,
  `w` boolean DEFAULT false,
  `u` boolean DEFAULT false,
  `d` boolean DEFAULT false,
  PRIMARY KEY (`idpermiso`),
  KEY `rolid` (`rolid`),
  KEY `moduloid` (`moduloid`)
);

ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(1, 1, 1, 1, 1, 1, 1);

-- -- PEDIDOS

-- CREATE TABLE IF NOT EXISTS `pedido` (
--   `idpedido` int(20) AUTO_INCREMENT,
--   `referenciacobro` varchar(255) DEFAULT NULL,
--   `idtransaccionpaypal` varchar(255) DEFAULT NULL,
--   `datospaypal` text,
--   `idpersona` int(20),
--   `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
--   `costo_envio` decimal(10,2) DEFAULT '0.00',
--   `monto` decimal(11,2),
--   `tipopagoid` int(20),
--   `direccion_envio` text,
--   `status` varchar(100) DEFAULT NULL,
--   PRIMARY KEY (`idpedido`),
--   KEY `idpersona` (`idpersona`)
-- );
-- ALTER TABLE `pedido`
--   ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE;


-- -- DETALLE_PEDIDO

-- CREATE TABLE IF NOT EXISTS `detalle_pedido` (
--   `id` int(20) AUTO_INCREMENT,
--   `pedidoid` int(20),
--   `productoid` int(20),
--   `precio` decimal(11,2),
--   `cantidad` int(11),
--   PRIMARY KEY (`id`),
--   KEY `pedidoid` (`pedidoid`),
--   KEY `productoid` (`productoid`)
-- );
-- ALTER TABLE `detalle_pedido`
--   ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`pedidoid`) REFERENCES `pedido` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE,
--   ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`productoid`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;


-- -- DETALLE_TEPM

-- CREATE TABLE IF NOT EXISTS `detalle_temp` (
--   `id` int(20) AUTO_INCREMENT,
--   `idpersona` int(20),
--   `productoid` int(20),
--   `precio` decimal(11,2),
--   `cantidad` int(11),
--   `transaccionid` varchar(255),
--   PRIMARY KEY (`id`),
--   KEY `productoid` (`productoid`),
--   KEY `idpersona` (`idpersona`)
-- );
-- ALTER TABLE `detalle_temp`
--   ADD CONSTRAINT `detalle_temp_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;
