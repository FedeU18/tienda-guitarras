CREATE DATABASE tienda_guitarras;

USE tienda_guitarras;

CREATE TABLE guitarras (
  id INT AUTO_INCREMENT PRIMARY KEY,
  marca VARCHAR(50) NOT NULL,
  modelo VARCHAR(50) NOT NULL,
  tipo VARCHAR(30) NOT NULL,
  -- Eléctrica, Acústica, Clásica, etc.
  precio DECIMAL(10, 2) NOT NULL,
  stock INT NOT NULL,
  fecha_ingreso DATE NOT NULL
);

INSERT INTO
  guitarras (
    marca,
    modelo,
    tipo,
    precio,
    stock,
    fecha_ingreso
  )
VALUES
  (
    'Fender',
    'Stratocaster',
    'Eléctrica',
    1200.00,
    10,
    '2024-01-15'
  ),
  (
    'Gibson',
    'Les Paul',
    'Eléctrica',
    2500.00,
    5,
    '2024-02-10'
  ),
  (
    'Ibanez',
    'RG550',
    'Eléctrica',
    1500.00,
    7,
    '2024-03-05'
  ),
  (
    'Taylor',
    '314ce',
    'Acústica',
    1800.00,
    4,
    '2024-04-20'
  ),
  (
    'Yamaha',
    'C40',
    'Clásica',
    150.00,
    20,
    '2024-05-15'
  ),
  (
    'Martin',
    'D-28',
    'Acústica',
    3000.00,
    3,
    '2024-06-10'
  ),
  (
    'PRS',
    'Custom 24',
    'Eléctrica',
    3500.00,
    2,
    '2024-07-25'
  );