<?php

require_once 'app/models/Service.php';

class ServiceController
{
    private Service $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new Service();
    }

    public function index(): void
    {
        $services = $this->serviceModel->getAll();
        require 'app/views/services/index.php';
    }

    public function create(): void
    {
        $service = null;
        require 'app/views/services/form.php';
    }

    public function store(): void
    {
        $this->serviceModel->create(
            $_POST['name'],
            $_POST['description'],
            (float) $_POST['price']
        );

        header("Location: index.php?controller=services");
        exit;
    }

    public function edit(): void
    {
        $id = (int) $_GET['id'];
        $service = $this->serviceModel->findById($id);

        require 'app/views/services/form.php';
    }

    public function update(): void
    {
        $this->serviceModel->update(
            (int) $_POST['id'],
            $_POST['name'],
            $_POST['description'],
            (float) $_POST['price']
        );

        header("Location: index.php?controller=services");
        exit;
    }

    public function delete(): void
    {
        $id = (int) $_GET['id'];
        $this->serviceModel->delete($id);

        header("Location: index.php?controller=services");
        exit;
    }
}
