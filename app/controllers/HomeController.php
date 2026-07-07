<?php

require_once 'config/database.php';

class HomeController
{
    public function index()
    {
        $database = new Database();
        $pdo = $database->connect();


        // TOTAL DE CLIENTES

        $totalClientes = $pdo
            ->query("SELECT COUNT(*) FROM clients")
            ->fetchColumn();


        // TOTAL DE SERVIÇOS

        $totalServicos = $pdo
            ->query("SELECT COUNT(*) FROM services")
            ->fetchColumn();


        // TOTAL DE AGENDAMENTOS

        $totalAgendamentos = $pdo
            ->query("SELECT COUNT(*) FROM appointments")
            ->fetchColumn();


        // FATURAMENTO DO MÊS
        // Soma apenas os serviços dos agendamentos concluídos

        $faturamentoMes = $pdo->query("
            SELECT COALESCE(SUM(services.price), 0)

            FROM appointments

            INNER JOIN services
                ON appointments.service_id = services.id

            WHERE LOWER(appointments.status) IN ('concluído', 'concluido')

            AND MONTH(appointments.appointment_date) = MONTH(CURRENT_DATE())

            AND YEAR(appointments.appointment_date) = YEAR(CURRENT_DATE())
        ")->fetchColumn();


        // PRÓXIMOS AGENDAMENTOS

        $proximos = $pdo->query("
            SELECT
                clients.name AS cliente,
                services.name AS servico,
                appointment_date,
                appointment_time,
                status

            FROM appointments

            INNER JOIN clients
                ON appointments.client_id = clients.id

            INNER JOIN services
                ON appointments.service_id = services.id

            ORDER BY appointment_date, appointment_time

            LIMIT 5

        ")->fetchAll();


        // CARREGA O DASHBOARD

        require 'app/views/home/index.php';
    }
}