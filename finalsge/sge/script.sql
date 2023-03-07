-- Creación de la base de datos

CREATE DATABASE db_prueba;
USE db_prueba;

-- Creación de la tabla productos

CREATE TABLE productos (
  id INT(11) NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(25) NOT NULL,
  descripcion TEXT,
  precio DECIMAL(10, 2) NOT NULL,
  PRIMARY KEY (id)
);

-- Creación de la tabla pedidos

CREATE TABLE pedidos (
  id INT(11) NOT NULL AUTO_INCREMENT,
  cliente VARCHAR(25) NOT NULL,
  email VARCHAR(55) NOT NULL,
  direccion VARCHAR(55) NOT NULL,
  telefono VARCHAR(15) NOT NULL,
  productos TEXT NOT NULL,
  total DECIMAL(10, 2) NOT NULL,
  PRIMARY KEY (id)
);

-- Creación de la tabla usuarios

CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(25) NOT NULL,
  password VARCHAR(64) NOT NULL,
  email VARCHAR(55) NOT NULL,
  rol VARCHAR(25) NOT NULL,
  PRIMARY KEY (id)
);

-- Volcado de datos en la tabla productos

INSERT INTO productos (nombre, precio, descripcion) VALUES 
  ('Product 1', 10.99, 'Description for Product 1'),
  ('Product 2', 20.99, 'Description for Product 2'),
  ('Product 3', 30.99, 'Description for Product 3'),
  ('Product 4', 40.99, 'Description for Product 4'),
  ('Product 5', 50.99, 'Description for Product 5');

-- Volcado de datos en la tabla pedidos

INSERT INTO pedidos (cliente, email, direccion, telefono, productos, total) VALUES 
  ('John Doe', 'john.doe@example.com', '123 Main St, Anytown USA', '555-1234', 'Product 1', 10.99),
  ('Jane Smith', 'jane.smith@example.com', '456 High St, Anytown USA', '555-5678', 'Product 2, Product 3', 51.98),
  ('Bob Johnson', 'bob.johnson@example.com', '789 First St, Anytown USA', '555-9012', 'Product 4', 40.99),
  ('Alice Williams', 'alice.williams@example.com', '321 Fourth St, Anytown USA', '555-3456', 'Product 5, Product 3, Product 1', 92.97),
  ('Stefania Lissa', 'stefania.lissa@example.com', '123 Caoba St, Madrid ESP', '555-1234', 'Product 5, Product 2', 92.97);

