CREATE DATABASE IF NOT EXISTS appointment_system;
USE appointment_system;

CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL
);

CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    service_id INT NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    status VARCHAR(30) NOT NULL DEFAULT 'Scheduled',

    CONSTRAINT fk_appointments_clients
        FOREIGN KEY (client_id) REFERENCES clients(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_appointments_services
        FOREIGN KEY (service_id) REFERENCES services(id)
        ON DELETE CASCADE
);

INSERT INTO clients (name, phone, email) VALUES
('João Silva', '(49) 99999-1111', 'joao@email.com'),
('Maria Souza', '(49) 99999-2222', 'maria@email.com');

INSERT INTO services (name, description, price) VALUES
('Corte de cabelo', 'Corte masculino/feminino', 50.00),
('Consulta', 'Consulta de atendimento geral', 120.00);
