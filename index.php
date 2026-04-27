<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$controller = $_GET['controller'] ?? 'clients';
$action = $_GET['action'] ?? 'index';

switch ($controller) {
    case 'clients':
        require_once 'app/controllers/ClientController.php';
        $controllerObject = new ClientController();
        break;

    case 'services':
        require_once 'app/controllers/ServiceController.php';
        $controllerObject = new ServiceController();
        break;

    case 'appointments':
        require_once 'app/controllers/AppointmentController.php';
        $controllerObject = new AppointmentController();
        break;

    default:
        die("Controller not found.");
}

if (method_exists($controllerObject, $action)) {
    $controllerObject->$action();
} else {
    die("Action not found.");
}
