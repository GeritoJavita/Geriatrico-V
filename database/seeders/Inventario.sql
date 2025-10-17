CREATE TABLE `Rol`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(100) NOT NULL
);
CREATE TABLE `Usuario`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(100) NOT NULL,
    `apellido` VARCHAR(100) NULL,
    `correo` VARCHAR(100) NULL,
    `direccion` VARCHAR(100) NULL,
    `clave` VARCHAR(255) NOT NULL,
    `rol_id` INT NULL
);
ALTER TABLE
    `Usuario` ADD UNIQUE `usuario_correo_unique`(`correo`);
CREATE TABLE `Proveedor`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(255) NOT NULL,
    `direccion` VARCHAR(255) NULL,
    `telefono` VARCHAR(255) NULL,
    `correo` VARCHAR(255) NULL
);
CREATE TABLE `Categoria_Producto`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(100) NOT NULL,
    `descripcion` VARCHAR(100) NULL
);
CREATE TABLE `Producto`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(100) NOT NULL,
    `precio` DECIMAL(10, 2) NOT NULL,
    `fecha_caducidad` DATE NULL,
    `dosis` VARCHAR(100) NULL,
    `indicaciones` VARCHAR(100) NULL,
    `lote` VARCHAR(100) NULL,
    `presentacion` VARCHAR(100) NULL,
    `categoria_id` INT NULL,
    `proveedor_id` INT NULL
);
CREATE TABLE `Inventario`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_producto` INT NULL,
    `stock` INT NULL,
    `cantidad` INT NULL,
    `ubicacion` VARCHAR(255) NULL
);
CREATE TABLE `Factura`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `precio` DECIMAL(10, 2) NOT NULL,
    `nombre` VARCHAR(100) NULL,
    `fecha` DATE NOT NULL,
    `tipo` VARCHAR(100) NULL,
    `ruta` VARCHAR(100) NULL
);
CREATE TABLE `Detalle_producto`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `subtotal` DECIMAL(10, 2) NULL,
    `id_factura` INT NULL,
    `id_producto` INT NULL
);
ALTER TABLE
    `Producto` ADD CONSTRAINT `producto_proveedor_id_foreign` FOREIGN KEY(`proveedor_id`) REFERENCES `Proveedor`(`id`);
ALTER TABLE
    `Inventario` ADD CONSTRAINT `inventario_id_producto_foreign` FOREIGN KEY(`id_producto`) REFERENCES `Producto`(`id`);
ALTER TABLE
    `Producto` ADD CONSTRAINT `producto_categoria_id_foreign` FOREIGN KEY(`categoria_id`) REFERENCES `Categoria_Producto`(`id`);
ALTER TABLE
    `Detalle_producto` ADD CONSTRAINT `detalle_producto_id_factura_foreign` FOREIGN KEY(`id_factura`) REFERENCES `Factura`(`id`);
ALTER TABLE
    `Usuario` ADD CONSTRAINT `usuario_rol_id_foreign` FOREIGN KEY(`rol_id`) REFERENCES `Rol`(`id`);
ALTER TABLE
    `Detalle_producto` ADD CONSTRAINT `detalle_producto_id_producto_foreign` FOREIGN KEY(`id_producto`) REFERENCES `Producto`(`id`);