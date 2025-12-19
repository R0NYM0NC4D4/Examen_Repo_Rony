DROP TABLE IF EXISTS proveedores;

CREATE TABLE proveedores (
    proveedor_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    contacto VARCHAR(100),
    telefono VARCHAR(20),
    estado VARCHAR(20)
);

-- 22 REGISTROS DE PROVEEDORES

INSERT INTO proveedores (nombre, contacto, telefono, estado) VALUES
('Distribuidora Alfa', 'Juan Pérez', '9876-1001', 'ACTIVO'),
('Comercial Beta', 'María López', '9876-1002', 'ACTIVO'),
('Suministros Gamma', 'Carlos Martínez', '9876-1003', 'ACTIVO'),
('Proveedor Delta', 'Ana Rodríguez', '9876-1004', 'INACTIVO'),
('Importadora Épsilon', 'Luis Hernández', '9876-1005', 'ACTIVO'),
('Servicios Zeta', 'Sofía Ramírez', '9876-1006', 'ACTIVO'),
('Abastecedora Eta', 'Pedro Flores', '9876-1007', 'ACTIVO'),
('Mayorista Theta', 'Lucía Gómez', '9876-1008', 'INACTIVO'),
('Logística Iota', 'Miguel Castro', '9876-1009', 'ACTIVO'),
('Comercial Kappa', 'Daniel Mejía', '9876-1010', 'ACTIVO'),
('Distribuciones Lambda', 'Paola Reyes', '9876-1011', 'ACTIVO'),
('Proveedor Mu', 'José Sánchez', '9876-1012', 'ACTIVO'),
('Insumos Nu', 'Claudia Ortiz', '9876-1013', 'INACTIVO'),
('Materiales Xi', 'Andrés Molina', '9876-1014', 'ACTIVO'),
('Abastecimientos Omicron', 'Karla Ávila', '9876-1015', 'ACTIVO'),
('Proveedora Pi', 'Fernando Torres', '9876-1016', 'ACTIVO'),
('Servicios Rho', 'Gabriela Díaz', '9876-1017', 'INACTIVO'),
('Distribuidora Sigma', 'Roberto Aguilar', '9876-1018', 'ACTIVO'),
('Comercial Tau', 'Elena Cruz', '9876-1019', 'ACTIVO'),
('Proveedor Upsilon', 'Óscar Morales', '9876-1020', 'ACTIVO'),
('Suministros Phi', 'Natalia Figueroa')