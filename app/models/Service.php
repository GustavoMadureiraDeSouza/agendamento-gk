<?php

require_once 'config/database.php';

class Service
{
    private PDO $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->connect();
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM services ORDER BY id DESC";
        return $this->connection->query($sql)->fetchAll();
    }

    public function findById(int $id): array|false
    {
        $sql = "SELECT * FROM services WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);
        return $statement->fetch();
    }

    public function create(string $name, string $description, float $price): bool
    {
        $sql = "INSERT INTO services (name, description, price) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([$name, $description, $price]);
    }

    public function update(int $id, string $name, string $description, float $price): bool
    {
        $sql = "UPDATE services SET name = ?, description = ?, price = ? WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([$name, $description, $price, $id]);
    }

    public function delete(int $id): bool
    {
        $sql = "DELETE FROM services WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([$id]);
    }
}
