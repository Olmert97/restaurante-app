CREATE SCHEMA IF NOT EXISTS dbRestauranteApp;
USE dbRestauranteApp;

-- ======================
-- ROL EMPLEADO
-- ======================
CREATE TABLE tblRolEmpleado(
 idRol INT AUTO_INCREMENT PRIMARY KEY,
 nombreRol VARCHAR(45),
 nivelAutorizacion INT,
 porcentajeDescuentoPermitido DECIMAL(5,2)
) ENGINE=InnoDB;

-- ======================
-- SUCURSAL
-- ======================
CREATE TABLE tblSucursal(
 idSucursal INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(100),
 direccion VARCHAR(150),
 telefono VARCHAR(20),
 horarioAtencion VARCHAR(50)
) ENGINE=InnoDB;

-- ======================
-- MESA
-- ======================
CREATE TABLE tblMesa(
 idMesa INT AUTO_INCREMENT PRIMARY KEY,
 numero INT,
 capacidad INT,
 estado VARCHAR(20),
 ubicacion VARCHAR(45),
 idSucursal INT,
 FOREIGN KEY(idSucursal) REFERENCES tblSucursal(idSucursal)
) ENGINE=InnoDB;

-- ======================
-- EMPLEADO
-- ======================
CREATE TABLE tblEmpleado(
 idEmpleado INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(100),
 identificacion VARCHAR(50),
 estado VARCHAR(20),
 fechaIngreso DATE,
 idSucursal INT,
 idRol INT,
 FOREIGN KEY(idSucursal) REFERENCES tblSucursal(idSucursal),
 FOREIGN KEY(idRol) REFERENCES tblRolEmpleado(idRol)
) ENGINE=InnoDB;

-- ======================
-- TURNOS
-- ======================
CREATE TABLE tblTurnos(
 idTurno INT AUTO_INCREMENT PRIMARY KEY,
 fecha DATE,
 horaInicio TIME,
 horaFin TIME,
 idEmpleado INT,
 FOREIGN KEY(idEmpleado) REFERENCES tblEmpleado(idEmpleado)
) ENGINE=InnoDB;

-- ======================
-- ASIGNACION MESA
-- ======================
CREATE TABLE tblAsignacionMesa(
 idAsignacion INT AUTO_INCREMENT PRIMARY KEY,
 fecha DATE,
 horaInicio TIME,
 horaFin TIME,
 idMesa INT,
 idEmpleado INT,
 idTurno INT,
 FOREIGN KEY(idMesa) REFERENCES tblMesa(idMesa),
 FOREIGN KEY(idEmpleado) REFERENCES tblEmpleado(idEmpleado),
 FOREIGN KEY(idTurno) REFERENCES tblTurnos(idTurno)
) ENGINE=InnoDB;

-- ======================
-- PEDIDO
-- ======================
CREATE TABLE tblPedido(
 idPedido INT AUTO_INCREMENT PRIMARY KEY,
 fechaHora DATETIME,
 estado VARCHAR(20),
 observacionesCliente VARCHAR(200),
 idEmpleado INT,
 idMesa INT,
 FOREIGN KEY(idEmpleado) REFERENCES tblEmpleado(idEmpleado),
 FOREIGN KEY(idMesa) REFERENCES tblMesa(idMesa)
) ENGINE=InnoDB;

-- ======================
-- CAJA
-- ======================
CREATE TABLE tblCaja(
 idCaja INT AUTO_INCREMENT PRIMARY KEY,
 fechaApertura DATETIME,
 fechaCierre DATETIME,
 montoInicial DECIMAL(10,2),
 montoFinal DECIMAL(10,2),
 idSucursal INT,
 FOREIGN KEY(idSucursal) REFERENCES tblSucursal(idSucursal)
) ENGINE=InnoDB;

-- ======================
-- FACTURA
-- ======================
CREATE TABLE tblFactura(
 idFactura INT AUTO_INCREMENT PRIMARY KEY,
 subtotal DECIMAL(10,2),
 impuesto DECIMAL(10,2),
 propina DECIMAL(10,2),
 total DECIMAL(10,2),
 fechaHoraCierre DATETIME,
 idPedido INT,
 idCaja INT,
 FOREIGN KEY(idPedido) REFERENCES tblPedido(idPedido),
 FOREIGN KEY(idCaja) REFERENCES tblCaja(idCaja)
) ENGINE=InnoDB;

-- ======================
-- CATEGORIA PRODUCTO
-- ======================
CREATE TABLE tblCategoriaProducto(
 idCategoria INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(50)
) ENGINE=InnoDB;

-- ======================
-- PRODUCTO
-- ======================
CREATE TABLE tblProducto(
 idProducto INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(100),
 descripcion VARCHAR(200),
 precioVenta DECIMAL(10,2),
 costo DECIMAL(10,2),
 disponible BOOLEAN,
 informacionNutricional VARCHAR(200),
 alergenos VARCHAR(200),
 tiempoPreparacion INT,
 idCategoria INT,
 FOREIGN KEY(idCategoria) REFERENCES tblCategoriaProducto(idCategoria)
) ENGINE=InnoDB;

-- ======================
-- INGREDIENTE
-- ======================
CREATE TABLE tblIngrediente(
 idIngrediente INT AUTO_INCREMENT PRIMARY KEY,
 nombre VARCHAR(100),
 unidadMedida VARCHAR(20),
 stockActual DECIMAL(10,2),
 stockMinimo DECIMAL(10,2)
) ENGINE=InnoDB;

-- ======================
-- RECETA
-- ======================
CREATE TABLE tblReceta(
 idProducto INT,
 idIngrediente INT,
 cantidad DECIMAL(10,2),
 PRIMARY KEY(idProducto,idIngrediente),
 FOREIGN KEY(idProducto) REFERENCES tblProducto(idProducto),
 FOREIGN KEY(idIngrediente) REFERENCES tblIngrediente(idIngrediente)
) ENGINE=InnoDB;

-- ======================
-- DETALLE PEDIDO
-- ======================
CREATE TABLE tblDetallePedido(
 idDetalle INT AUTO_INCREMENT PRIMARY KEY,
 idPedido INT,
 idProducto INT,
 cantidad INT,
 precioUnitario DECIMAL(10,2),
 notaEspecial VARCHAR(200),
 FOREIGN KEY(idPedido) REFERENCES tblPedido(idPedido),
 FOREIGN KEY(idProducto) REFERENCES tblProducto(idProducto)
) ENGINE=InnoDB;

-- ======================
-- PAGO
-- ======================
CREATE TABLE tblPago(
 idPago INT AUTO_INCREMENT PRIMARY KEY,
 monto DECIMAL(10,2),
 metodoPago VARCHAR(30),
 fechaHora DATETIME,
 idFactura INT,
 FOREIGN KEY(idFactura) REFERENCES tblFactura(idFactura)
) ENGINE=InnoDB;

-- ======================
-- EVALUACION DESEMPEÑO
-- ======================
CREATE TABLE tblEvaluacionDesempeno(
 idEvaluacion INT AUTO_INCREMENT PRIMARY KEY,
 fecha DATE,
 calificacion INT,
 observaciones VARCHAR(200),
 idEmpleado INT,
 FOREIGN KEY(idEmpleado) REFERENCES tblEmpleado(idEmpleado)
) ENGINE=InnoDB;