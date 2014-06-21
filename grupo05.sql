BEGIN TRANSACTION;

DROP TABLE IF EXISTS roles CASCADE;
CREATE TABLE roles (
    pk serial NOT NULL,
    rol varchar(255) NOT NULL,
    descripcion text,
    UNIQUE (rol),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS usuarios CASCADE;
CREATE TABLE usuarios (
    pk serial NOT NULL,
    rut int NOT NULL,
    contrasena varchar(255) NOT NULL,
    UNIQUE (rut),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS roles_usuarios CASCADE;
CREATE TABLE roles_usuarios (
    pk serial NOT NULL,
    usuario_fk int NOT NULL REFERENCES usuarios(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    rol_fk int NOT NULL REFERENCES roles(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE (usuario_fk, rol_fk),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS facultades CASCADE;
CREATE TABLE facultades (
    pk serial NOT NULL,
    nombre varchar(255) NOT NULL,
    descripcion text,
    UNIQUE (nombre),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS departamentos CASCADE;
CREATE TABLE departamentos (
    pk serial NOT NULL,
    facultad_fk int NOT NULL REFERENCES facultades(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    nombre varchar(255) NOT NULL,
    descripcion text,
    UNIQUE(nombre, facultad_fk),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS escuelas CASCADE;
CREATE TABLE escuelas (
    pk serial NOT NULL,
    departamento_fk int NOT NULL REFERENCES departamentos(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    nombre varchar(255) NOT NULL,
    descripcion text,
    UNIQUE (nombre),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS carreras CASCADE;
CREATE TABLE carreras (
    pk serial NOT NULL,
    codigo int NOT NULL,
    nombre varchar(255) NOT NULL,
    escuela_fk int NOT NULL REFERENCES escuelas(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE (codigo,escuela_fk),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS areas_tematicas CASCADE;
CREATE TABLE areas_tematicas (
    pk serial NOT NULL,
    tema varchar(255) NOT NULL,
    descripcion text,
    UNIQUE (tema),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS rubros CASCADE;
CREATE TABLE rubros (
    pk serial NOT NULL,
    rubro varchar(255) NOT NULL,
    descripcion text,
    UNIQUE (rubro),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS empresas CASCADE;
CREATE TABLE empresas (
    pk bigserial NOT NULL,
    rut int NOT NULL,
    nombre_real varchar(255) NOT NULL,
    nombre_fantasia varchar(255) NOT NULL,
    direccion varchar(255) NOT NULL,
    rubro_fk int NOT NULL REFERENCES rubros(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    telefono varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    UNIQUE (rut),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS contactos_empresariales CASCADE;
CREATE TABLE contactos_empresariales (
    pk bigserial NOT NULL,
    empresa_fk bigint NOT NULL REFERENCES empresas(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    nombres varchar(255) NOT NULL,
    apellidos varchar(255) NOT NULL,
    rut int NOT NULL,
    telefono varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    UNIQUE (empresa_fk, rut),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS estudiantes CASCADE;
CREATE TABLE estudiantes (
    pk bigserial NOT NULL,
    rut int NOT NULL,
    nombres varchar(255) NOT NULL,
    apellidos varchar(255) NOT NULL,
    fecha_nacimiento date,
    genero int NOT NULL DEFAULT '0', -- 0 Femenino / 1 Masculino
    direccion varchar(255) NOT NULL,
    telefono varchar(15),
    email varchar(255) NOT NULL,
    estado varchar(255) NOT NULL,
    carrera_fk int NOT NULL REFERENCES carreras(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    UNIQUE (rut),
    PRIMARY KEY (pk)
);

DROP TABLE IF EXISTS practicas CASCADE;
CREATE TABLE practicas (
    pk bigserial NOT NULL,
    carrera_fk int NOT NULL REFERENCES carreras(pk) ON UPDATE CASCADE ON DELETE CASCADE, -- hipoteticamente un estudiante puede estudiar más de una carrera
    contacto_fk bigint NOT NULL REFERENCES contactos_empresariales(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    estudiante_fk bigint NOT NULL REFERENCES estudiantes(pk) ON UPDATE CASCADE ON DELETE CASCADE,
    fecha timestamp NOT NULL DEFAULT NOW(),
    fecha_inicio date NOT NULL,
    fecha_termino date,
    horas int NOT NULL DEFAULT '0',
    evaluacion numeric(2,1) NOT NULL DEFAULT '0',
    archivo varchar(255),
    UNIQUE (carrera_fk, contacto_fk, estudiante_fk),
    PRIMARY KEY (pk)
);


COMMIT;
