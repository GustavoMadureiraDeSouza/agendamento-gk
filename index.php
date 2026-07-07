<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

$controller = $_GET['controller'] ?? 'login';
$action = $_GET['action'] ?? 'index';

/*
|--------------------------------------------------------
| Se não estiver logado, só permite acessar o Login
|--------------------------------------------------------
*/

if (!isset($_SESSION['user']) && $controller != 'login') {
    header("Location: index.php");
    exit;
}


/*
|--------------------------------------------------------
| Controllers
|--------------------------------------------------------
*/

switch ($controller) {

    case 'login':
        require_once 'app/controllers/LoginController.php';
        $controllerObject = new LoginController();
        break;


    case 'home':
        require_once 'app/controllers/HomeController.php';
        $controllerObject = new HomeController();
        break;


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


    case 'finance':
        require_once 'app/controllers/FinanceController.php';
        $controllerObject = new FinanceController();
        break;


    default:
        die("Controller not found.");
}


/*
|--------------------------------------------------------
| Executa a ação do Controller
|--------------------------------------------------------
*/

if (method_exists($controllerObject, $action)) {

    $controllerObject->$action();

} else {

    die("Action not found.");

}