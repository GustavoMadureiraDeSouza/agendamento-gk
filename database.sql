CREATE DATABASE IF NOT EXISTS appointment_system
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE appointment_system;


-- TABELA DE USUÁRIOS

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL
);


-- TABELA DE CLIENTES

CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL
);


-- TABELA DE SERVIÇOS

CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL
);


-- TABELA DE AGENDAMENTOS

CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    service_id INT NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    status VARCHAR(30) NOT NULL DEFAULT 'Aguardando',

    CONSTRAINT fk_appointments_clients
        FOREIGN KEY (client_id)
        REFERENCES clients(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_appointments_services
        FOREIGN KEY (service_id)
        REFERENCES services(id)
        ON DELETE CASCADE
);


-- USUÁRIO PADRÃO DO SISTEMA

INSERT INTO users (username, password, name)
VALUES ('admin', '123456', 'Administrador');


-- CLIENTES PARA TESTE

INSERT INTO clients (name, phone, email) VALUES
('João Silva', '(49) 99999-1111', 'joao@email.com'),
('Maria Souza', '(49) 99999-2222', 'maria@email.com');


-- SERVIÇOS PARA TESTE

INSERT INTO services (name, description, price) VALUES
('Corte de cabelo', 'Corte de cabelo masculino', 50.00),
('Barba', 'Serviço completo de barba', 35.00);


-- AGENDAMENTO PARA TESTE

INSERT INTO appointments (
    client_id,
    service_id,
    appointment_date,
    appointment_time,
    status
)
VALUES (
    1,
    1,
    CURDATE(),
    '14:00:00',
    'Aguardando'
);