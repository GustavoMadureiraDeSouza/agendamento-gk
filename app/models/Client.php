<?php

require_once 'config/database.php';

class Client
{
    private PDO $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connect();
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM clients ORDER BY id DESC";
        return $this->connection->query($sql)->fetchAll();
    }

    public function findById(int $id): array|false
    {
        $sql = "SELECT * FROM clients WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
    }

    public function create(string $name, string $phone, string $email): bool
    {
        $sql = "INSERT INTO clients (name, phone, email) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([$name, $phone, $email]);
    }

    public function update(int $id, string $name, string $phone, string $email): bool
    {
        $sql = "UPDATE clients SET name = ?, phone = ?, email = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([$name, $phone, $email, $id]);
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM clients WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([$id]);
    }
}
