<?php

require_once 'app/models/User.php';

class LoginController
{
    public function index()
    {
        require 'app/views/login/index.php';
    }

    public function auth()
    {
        session_start();

        $user = new User();

        $login = $user->login(
            $_POST['username'],
            $_POST['password']
        );

        if($login){

            $_SESSION['user']=$login;

            header("Location:index.php?controller=home");

        }else{

            header("Location:index.php?controller=login&error=1");

        }

    }

    public function logout()
    {
        session_start();

        session_destroy();

        header("Location:index.php");
    }
}