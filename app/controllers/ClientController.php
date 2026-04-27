<?php

require_once 'app/models/Client.php';

class ClientController
{
    private Client $clientModel;

    public function __construct()
    {
        $this->clientModel = new Client();
    }

    public function index(): void
    {
        $clients = $this->clientModel->getAll();
        require 'app/views/clients/index.php';
    }

    public function create(): void
    {
        $client = null;
        require 'app/views/clients/form.php';
    }

    public function store(): void
    {
        $this->clientModel->create(
            $_POST['name'],
            $_POST['phone'],
            $_POST['email']
        );

        header("Location: index.php?controller=clients");
        exit;
    }

    public function edit(): void
    {
        $id = (int) $_GET['id'];
        $client = $this->clientModel->findById($id);

        require 'app/views/clients/form.php';
    }

    public function update(): void
    {
        $this->clientModel->update(
            (int) $_POST['id'],
            $_POST['name'],
            $_POST['phone'],
            $_POST['email']
        );

        header("Location: index.php?controller=clients");
        exit;
    }

    public function delete(): void
    {
        $id = (int) $_GET['id'];
        $this->clientModel->delete($id);

        header("Location: index.php?controller=clients");
        exit;
    }
}
