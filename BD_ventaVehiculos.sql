create database ventaVehiculos

use ventaVehiculos;

create table usuarios(
	idUsuarios INT NOT NULL AUTO_INCREMENT,
    nombres VARCHAR(45) NOT NULL,
    apellidos VARCHAR(45) NOT NULL,
    nombreUsuario VARCHAR(45) NOT NULL UNIQUE,
    pasword VARCHAR(45) NOT NULL,
    celular VARCHAR(8) NOT NULL UNIQUE,
    telefono VARCHAR(8) UNIQUE,
    email VARCHAR(45) UNIQUE,
    fechaRegistro DATE,
    fotoPerfil BLOB,
    PRIMARY KEY (idUsuarios) 
);

create table marca(
	idMarca INT NOT NULL,
    descripcionMarca VARCHAR(45) NOT NULL,
    PRIMARY KEY (idMarca)
);

create table modelo(
	idModelo INT NOT NULL,
    idMarca INT NOT NULL,
    descripcionModelo VARCHAR(45) NOT NULL,
    PRIMARY KEY (idModelo),
    FOREIGN KEY (idMarca) REFERENCES marca(idMarca)
);

create table transmision(
	idTransmision INT NOT NULL,
    descripcionTransmision VARCHAR(45) NOT NULL,
    PRIMARY KEY (idTransmision)
);

create table combustible(
	idCombustible INT NOT NULL,
    descripcionCombustible VARCHAR(45) NOT NULL,
    PRIMARY KEY (idCombustible)
);

create table tipo(
	idTipo INT NOT NULL,
    descripcionTipo VARCHAR(45) NOT NULL,
    PRIMARY KEY (idTipo)
);

create table vehiculo(
	idVehiculo INT NOT NULL,
    fkMarca INT NOT NULL,
    fkModelo INT NOT NULL,
    color VARCHAR(45) NOT NULL,
    anio INT NOT NULL,
    cilindraje INT NOT NULL,
    fkTransmision INT NOT NULL,
    fkCombustible INT NOT NULL,
    fkTipo INT NOT NULL,
    precioVenta DECIMAL(10,2),
    fechaRegistro DATE NOT NULL,
    PRIMARY KEY(idVehiculo),
    FOREIGN KEY (fkMarca) REFERENCES marca(idMarca),
    FOREIGN KEY (fkModelo) REFERENCES modelo(idModelo),
    FOREIGN KEY (fkTransmision) REFERENCES transmision(idTransmision),
    FOREIGN KEY (fkCombustible) REFERENCES combustible(idCombustible),
    FOREIGN KEY (fkTipo) REFERENCES tipo(idTipo)
);

create table imagenesVehiculo(
	idImagen INT NOT NULL,
    fkVehiculo INT NOT NULL,
    imagen BLOB NOT NULL,
    PRIMARY KEY (idImagen),
    FOREIGN KEY (fkVehiculo) REFERENCES vehiculo(idVehiculo)
);

create table estatus(
	idEstatus INT NOT NULL,
    descripcionEstatus INT NOT NULL,
    PRIMARY KEY (idEstatus)
);


create table vehiculosEnVenta(
	idVehiculoEnVenta INT NOT NULL,
    fkVehiculo INT NOT NULL,
    fkUsuario INT NOT NULL,
    fkEstatus INT NOT NULL,
    PRIMARY KEY (idVehiculoEnVenta),
    FOREIGN KEY (fkVehiculo) REFERENCES vehiculo(idVehiculo),
	FOREIGN KEY (fkUsuario) REFERENCES usuario(idUsuario),
    FOREIGN KEY (fkEstatus) REFERENCES estatus(idEstatus)
);

create table precioSugerido(
	idPrecioSugerido INT NOT NULL,
    fkVehiculo INT NOT NULL,
    fkUsuario INT NOT NULL,
    precioSugerido DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (idPrecioSugerido),
    FOREIGN KEY (fkVehiculo) REFERENCES vehiculo(idVehiculo),
	FOREIGN KEY (fkUsuario) REFERENCES usuarios(idUsuarios)
);


create table vehiculoFavorito(
	idVehiculoFavorito INT NOT NULL,
    fkVehiculo INT NOT NULL,
    fkUsuario INT NOT NULL,
    fecha DATE,
    PRIMARY KEY (idVehiculoFavorito),
    FOREIGN KEY (fkVehiculo) REFERENCES vehiculo(idVehiculo),
	FOREIGN KEY (fkUsuario) REFERENCES usuarios(idUsuarios)
);