<?php

class Database
{
    private string $host = "localhost";
    private string $dbname = "appointment_system";
    private string $user = "root";
    private string $password = "";

    public function connect(): PDO
    {
        try {
            $connection = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->user,
                $this->password
            );

            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            return $connection;
        } catch (PDOException $error) {
            die("Database connection error: " . $error->getMessage());
        }
    }
}
