<?php

require_once 'app/models/Appointment.php';
require_once 'app/models/Client.php';
require_once 'app/models/Service.php';

class AppointmentController
{
    private Appointment $appointmentModel;
    private Client $clientModel;
    private Service $serviceModel;

    public function __construct()
    {
        $this->appointmentModel = new Appointment();
        $this->clientModel = new Client();
        $this->serviceModel = new Service();
    }

    public function index(): void
    {
        $appointments = $this->appointmentModel->getAll();
        require 'app/views/appointments/index.php';
    }

    public function create(): void
    {
        $appointment = null;
        $clients = $this->clientModel->getAll();
        $services = $this->serviceModel->getAll();

        require 'app/views/appointments/form.php';
    }

    public function store(): void
    {
        $this->appointmentModel->create(
            (int) $_POST['client_id'],
            (int) $_POST['service_id'],
            $_POST['appointment_date'],
            $_POST['appointment_time'],
            $_POST['status']
        );

        header("Location: index.php?controller=appointments");
        exit;
    }

    public function edit(): void
    {
        $id = (int) $_GET['id'];

        $appointment = $this->appointmentModel->findById($id);
        $clients = $this->clientModel->getAll();
        $services = $this->serviceModel->getAll();

        require 'app/views/appointments/form.php';
    }

    public function update(): void
    {
        $this->appointmentModel->update(
            (int) $_POST['id'],
            (int) $_POST['client_id'],
            (int) $_POST['service_id'],
            $_POST['appointment_date'],
            $_POST['appointment_time'],
            $_POST['status']
        );

        header("Location: index.php?controller=appointments");
        exit;
    }

    public function delete(): void
    {
        $id = (int) $_GET['id'];
        $this->appointmentModel->delete($id);

        header("Location: index.php?controller=appointments");
        exit;
    }
}
