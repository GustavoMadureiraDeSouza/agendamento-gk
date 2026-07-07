<?php

require_once 'config/database.php';

class FinanceController
{
    public function index()
    {
        $database = new Database();
        $pdo = $database->connect();

        $faturamentoMes = $pdo->query("
            SELECT COALESCE(SUM(services.price), 0)
            FROM appointments
            INNER JOIN services
                ON appointments.service_id = services.id
            WHERE LOWER(appointments.status) IN ('concluído', 'concluido')
            AND MONTH(appointments.appointment_date) = MONTH(CURRENT_DATE())
            AND YEAR(appointments.appointment_date) = YEAR(CURRENT_DATE())
        ")->fetchColumn();

        $totalConcluidos = $pdo->query("
            SELECT COUNT(*)
            FROM appointments
            WHERE LOWER(status) IN ('concluído', 'concluido')
            AND MONTH(appointment_date) = MONTH(CURRENT_DATE())
            AND YEAR(appointment_date) = YEAR(CURRENT_DATE())
        ")->fetchColumn();

        $atendimentos = $pdo->query("
            SELECT
                appointments.id,
                clients.name AS cliente,
                services.name AS servico,
                services.price,
                appointments.appointment_date
            FROM appointments
            INNER JOIN clients
                ON appointments.client_id = clients.id
            INNER JOIN services
                ON appointments.service_id = services.id
            WHERE LOWER(appointments.status) IN ('concluído', 'concluido')
            ORDER BY appointments.appointment_date DESC
        ")->fetchAll();

        require 'app/views/revenue/index.php';
    }
}