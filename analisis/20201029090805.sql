/*
MySQL Backup
Database: chapin
Backup Time: 2020-10-29 09:08:05
*/

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `chapin`.`asesor`;
DROP TABLE IF EXISTS `chapin`.`cliente`;
DROP TABLE IF EXISTS `chapin`.`empleados`;
DROP TABLE IF EXISTS `chapin`.`especialidad`;
DROP TABLE IF EXISTS `chapin`.`orden_trabajo`;
DROP TABLE IF EXISTS `chapin`.`roles`;
DROP TABLE IF EXISTS `chapin`.`servicio`;
DROP TABLE IF EXISTS `chapin`.`trabajo`;
DROP TABLE IF EXISTS `chapin`.`usuarios`;
DROP PROCEDURE IF EXISTS `chapin`.`actualizarcliente`;
DROP PROCEDURE IF EXISTS `chapin`.`crear_cliente`;
DROP PROCEDURE IF EXISTS `chapin`.`crear_empleados`;
DROP PROCEDURE IF EXISTS `chapin`.`sp_asesor`;
DROP PROCEDURE IF EXISTS `chapin`.`sp_servicio`;
DROP PROCEDURE IF EXISTS `chapin`.`sp_servicios`;
DROP PROCEDURE IF EXISTS `chapin`.`sp_venta`;
CREATE TABLE `asesor` (
  `id_asesor` int(11) NOT NULL AUTO_INCREMENT,
  `id_espe` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `departamento` varchar(35) DEFAULT NULL,
  `municipio` varchar(35) DEFAULT NULL,
  `dpi` bigint(20) DEFAULT NULL,
  `usuario` varchar(15) NOT NULL,
  `contra` varchar(10) NOT NULL,
  PRIMARY KEY (`id_asesor`),
  KEY `id_espe` (`id_espe`),
  CONSTRAINT `asesor_ibfk_1` FOREIGN KEY (`id_espe`) REFERENCES `especialidad` (`id_espe`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `departamento` varchar(35) DEFAULT NULL,
  `municipio` varchar(35) DEFAULT NULL,
  `dpi` bigint(20) DEFAULT NULL,
  `usuario` varchar(15) NOT NULL,
  `contra` varchar(12) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
CREATE TABLE `empleados` (
  `id_emple` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `departamento` varchar(35) DEFAULT NULL,
  `municipio` varchar(35) DEFAULT NULL,
  `dpi` bigint(20) DEFAULT NULL,
  `usuario` varchar(15) DEFAULT NULL,
  `contra` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_emple`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
CREATE TABLE `especialidad` (
  `id_espe` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `experiencia` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_espe`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
CREATE TABLE `orden_trabajo` (
  `id_orden` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `id_servicio` int(11) DEFAULT NULL,
  `id_asesor` int(11) DEFAULT NULL,
  `fecha_orden` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_orden`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_servicio` (`id_servicio`),
  KEY `id_asesor` (`id_asesor`),
  CONSTRAINT `orden_trabajo_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `orden_trabajo_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`),
  CONSTRAINT `orden_trabajo_ibfk_3` FOREIGN KEY (`id_asesor`) REFERENCES `asesor` (`id_asesor`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_ser` varchar(15) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
CREATE TABLE `trabajo` (
  `id_tra` int(11) NOT NULL AUTO_INCREMENT,
  `id_orden` int(11) DEFAULT NULL,
  `duracion` float DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_tra`),
  KEY `id_orden` (`id_orden`),
  CONSTRAINT `trabajo_ibfk_1` FOREIGN KEY (`id_orden`) REFERENCES `orden_trabajo` (`id_orden`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_asesor` int(11) DEFAULT NULL,
  `id_emple` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_asesor` (`id_asesor`),
  KEY `id_emple` (`id_emple`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`id_asesor`) REFERENCES `asesor` (`id_asesor`),
  CONSTRAINT `usuarios_ibfk_4` FOREIGN KEY (`id_emple`) REFERENCES `empleados` (`id_emple`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizarcliente`(
    in id_cliente int,
    in nombre varchar(50),
    in apellido varchar(50),
    in direccion varchar(100),
    in correo varchar(50),
    in telefono varchar(50),
    in departamento varchar(35),
    in municipio varchar(35),
    in dpi bigint,
    in usuario varchar(15),
    in contra varchar(12)
)
BEGIN
UPDATE cliente SET
id_cliente=id_cliente,
nombre=nombre,
apellido=apellido,
direccion=direccion,
correo=correo,
telefono=telefono,
departamento=departamento,
municipio=municipio,
dpi=dpi,
usuario=usuario,
contra=contra
WHERE cliente.id_cliente = 8;
END;
CREATE DEFINER=`root`@`localhost` PROCEDURE `crear_cliente`(
in nombre varchar(25),
in apellido varchar(25),
in direccion varchar(50),
in correo varchar(35),
in telefono varchar (12),
in departamento varchar(20),
in municipio varchar (35),
in dpi BIGINT,
in usuario varchar(15),
in contra varchar(10)
)
begin


INSERT INTO chapin.cliente
(nombre, apellido, direccion, correo, telefono, departamento, municipio, dpi, usuario, contra)
VALUES(nombre, apellido, direccion, correo, telefono, departamento, municipio, dpi, usuario, contra);

 select  @id_cli := max(id_cliente) as id_cliente from cliente;



INSERT INTO chapin.usuarios
(id_rol, id_cliente)
VALUES(2, @id_cli);

END;
CREATE DEFINER=`root`@`localhost` PROCEDURE `crear_empleados`(
in nombre varchar(25),
in apellido varchar(25),
in direccion varchar(50),
in correo varchar(35),
in telefono varchar (12),
in departamento varchar(20),
in municipio varchar (35),
in dpi BIGINT,
in usuario varchar(15),
in contra varchar(10)
)
begin


INSERT INTO chapin.empleados
(nombre, apellido, direccion, correo, telefono, departamento, municipio, dpi, usuario, contra)
VALUES(nombre, apellido, direccion, correo, telefono, departamento, municipio, dpi, usuario, contra);

 select  @id_em := max(id_emple) as id_emple from empleados;



INSERT INTO chapin.usuarios
(id_rol, id_emple)
VALUES(3, @id_em);

END;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_asesor`(

in codigo varchar(10),
in descripcion varchar(20),
in experiencia varchar (20),
in nombre varchar (35),
in apellido varchar(35),
in direccion varchar(30),
in correo varchar (35),
in telefono varchar(12),
in departamento varchar(25),
in municipio varchar (25),
in dpi bigint,
in usuario varchar(10),
in contra varchar(10)
)
BEGIN

INSERT INTO chapin.especialidad
(codigo, descripcion, experiencia)
VALUES(codigo,descripcion,experiencia);

 select  @id_es := max(id_espe) as id_espe from especialidad;

INSERT INTO chapin.asesor
(id_espe, nombre, apellido, direccion, correo, telefono, departamento, municipio, dpi, usuario, contra)
VALUES(@id_es, nombre, apellido, direccion, correo, telefono, departamento, municipio, dpi, usuario, contra);



select  @id_ase := max(id_asesor) as id_asesor from asesor;


INSERT INTO chapin.usuarios
(id_rol, id_asesor)
VALUES(4,@id_ase);

end;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_servicio`(

in id_cliente int,
in id_servicio int

)
begin

INSERT INTO chapin.orden_trabajo
(id_cliente, id_servicio, id_asesor, fecha_orden)
VALUES(id_cliente, id_servicio, NULL, CURDATE());


end;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_servicios`(
in codigo_ser varchar(10),
in descripcion varchar(100)
)
begin

INSERT INTO chapin.servicio
(codigo_ser, descripcion)
VALUES(codigo_ser, descripcion);

end;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_venta`(
in codigo varchar(10),
in marca varchar(10),
in modelo varchar(10),
in id_empresa int,
in precio_compra float,
in precio_venta float,
in cantidad int
)
begin
	
			declare diferencia float;
			declare total float;
			declare ganancia float;
			set total = precio_venta*cantidad;
		set diferencia = cantidad*precio_compra;
		set ganancia = total-diferencia;


select @upp:= 
    s.id_telefono,
   -- t.id_telefono,
   -- t.codigo
    s.cantidad 
from
    intercell.telefono t
inner join intercell.stock s on
    t.id_telefono = s.id_telefono where t.codigo = codigo;

  
  select  @ca :=
    s.cantidad
from
    intercell.telefono t
inner join intercell.stock s on
    t.id_telefono = s.id_telefono where s.id_telefono = @upp;
   
   
   if(@ca>=cantidad) then
   
   INSERT INTO intercell.venta
(codigo, marca, modelo, id_empresa, precio_compra, precio_venta, cantidad, total, ganancia, fecha, hora)
VALUES(codigo,marca,modelo,id_empresa, precio_compra, precio_venta,cantidad,total, ganancia, CURDATE(), CURTIME());

   set @tot = @ca-cantidad;
UPDATE intercell.stock
set cantidad=@tot
where  id_telefono=@upp;


end if;
end;
BEGIN;
LOCK TABLES `chapin`.`asesor` WRITE;
DELETE FROM `chapin`.`asesor`;
INSERT INTO `chapin`.`asesor` (`id_asesor`,`id_espe`,`nombre`,`apellido`,`direccion`,`correo`,`telefono`,`departamento`,`municipio`,`dpi`,`usuario`,`contra`) VALUES (18, 18, 'Hichos', 'Hic', 'gt', 'rhichosc@miumg.edu.gt', '45935511', 'izabal', 'morales', 3337435391804, 'Hichos', '12345678');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `chapin`.`cliente` WRITE;
DELETE FROM `chapin`.`cliente`;
INSERT INTO `chapin`.`cliente` (`id_cliente`,`nombre`,`apellido`,`direccion`,`correo`,`telefono`,`departamento`,`municipio`,`dpi`,`usuario`,`contra`) VALUES (24, 'Hichossss', 'Hic', 'gt', 'rhichosc@miumg.edu.gt', '45935511', 'izabal', 'morales', 3337435391804, 'Hichos', '12345678'),(25, 'Guilmar', 'Arroyo', 'Mitchal', 'rhichosc@miumg.edu.gt', '85747474', 'izabal', 'morales', 3337435391804, 'betico', '12345');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `chapin`.`empleados` WRITE;
DELETE FROM `chapin`.`empleados`;
INSERT INTO `chapin`.`empleados` (`id_emple`,`nombre`,`apellido`,`direccion`,`correo`,`telefono`,`departamento`,`municipio`,`dpi`,`usuario`,`contra`) VALUES (2, 'Hichos', 'Hic', 'gt', 'rhichosc@miumg.edu.gt', '45935511', 'izabal', 'morales', 3337435391804, 'Hichosss', '12345');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `chapin`.`especialidad` WRITE;
DELETE FROM `chapin`.`especialidad`;
INSERT INTO `chapin`.`especialidad` (`id_espe`,`codigo`,`descripcion`,`experiencia`) VALUES (15, '17004', 'camisa para hombre', '5 años'),(16, '17004', 'camisa para hombre', '5 años'),(17, '17004', 'camisa para hombre', '5 años'),(18, '17004', 'camisa para hombre', '5 años');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `chapin`.`orden_trabajo` WRITE;
DELETE FROM `chapin`.`orden_trabajo`;
INSERT INTO `chapin`.`orden_trabajo` (`id_orden`,`id_cliente`,`id_servicio`,`id_asesor`,`fecha_orden`) VALUES (9, 25, 10, NULL, '2020-10-27'),(10, 25, 9, NULL, '2020-10-27');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `chapin`.`roles` WRITE;
DELETE FROM `chapin`.`roles`;
INSERT INTO `chapin`.`roles` (`id_rol`,`descripcion`) VALUES (1, 'admin'),(2, 'cliente'),(3, 'empleado'),(4, 'asesor');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `chapin`.`servicio` WRITE;
DELETE FROM `chapin`.`servicio`;
INSERT INTO `chapin`.`servicio` (`id_servicio`,`codigo_ser`,`descripcion`) VALUES (9, '001-PC', 'MANTENIMIENTO Y REPARACIÓN DE COMPUTADORAS'),(10, '002-REFRI', 'REPARACIÓN Y MANTENIMENTO DE REGRIGERADORAS');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `chapin`.`trabajo` WRITE;
DELETE FROM `chapin`.`trabajo`;
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `chapin`.`usuarios` WRITE;
DELETE FROM `chapin`.`usuarios`;
INSERT INTO `chapin`.`usuarios` (`id_usuario`,`id_rol`,`id_cliente`,`id_asesor`,`id_emple`) VALUES (43, 4, NULL, 18, NULL),(44, 2, 24, NULL, NULL),(45, 3, NULL, NULL, 2),(46, 2, 25, NULL, NULL);
UNLOCK TABLES;
COMMIT;
