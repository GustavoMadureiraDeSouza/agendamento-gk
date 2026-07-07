<?php

require_once 'config/database.php';

class User
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->connect();
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$username, $password]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}