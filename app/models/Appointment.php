<?php

require_once 'config/database.php';

class Appointment
{
    private PDO $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connect();
    }

    public function getAll(): array
    {
        $sql = "
            SELECT 
                appointments.id,
                appointments.appointment_date,
                appointments.appointment_time,
                appointments.status,
                clients.name AS client_name,
                services.name AS service_name
            FROM appointments
            INNER JOIN clients ON clients.id = appointments.client_id
            INNER JOIN services ON services.id = appointments.service_id
            ORDER BY appointments.appointment_date DESC, appointments.appointment_time DESC
        ";

        return $this->connection->query($sql)->fetchAll();
    }

    public function findById(int $id): array|false
    {
        $sql = "SELECT * FROM appointments WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
    }

    public function create(int $clientId, int $serviceId, string $date, string $time, string $status): bool
    {
        $sql = "
            INSERT INTO appointments 
                (client_id, service_id, appointment_date, appointment_time, status)
            VALUES (?, ?, ?, ?, ?)
        ";

        $statement = $this->connection->prepare($sql);
        return $statement->execute([$clientId, $serviceId, $date, $time, $status]);
    }

    public function update(int $id, int $clientId, int $serviceId, string $date, string $time, string $status): bool
    {
        $sql = "
            UPDATE appointments 
            SET client_id = ?, service_id = ?, appointment_date = ?, appointment_time = ?, status = ?
            WHERE id = ?
        ";

        $statement = $this->connection->prepare($sql);
        return $statement->execute([$clientId, $serviceId, $date, $time, $status, $id]);
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM appointments WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([$id]);
    }
}
