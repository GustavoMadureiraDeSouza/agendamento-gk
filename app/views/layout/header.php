<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BarberPro</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">

    <div class="container">

        <!-- LOGO -->

        <a class="navbar-brand fw-bold"
           href="index.php?controller=home">

            <i class="bi bi-scissors text-warning"></i>

            <span class="text-warning">
                BarberPro
            </span>

        </a>


        <!-- BOTÃO MOBILE -->

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menu">

            <span class="navbar-toggler-icon"></span>

        </button>


        <!-- MENU -->

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-auto align-items-lg-center">


                <!-- DASHBOARD -->

                <li class="nav-item">

                    <a class="nav-link"
                       href="index.php?controller=home">

                        <i class="bi bi-house-door-fill"></i>

                        Dashboard

                    </a>

                </li>


                <!-- USUÁRIO LOGADO -->

                <li class="nav-item">

                    <span class="nav-link text-warning">

                        <i class="bi bi-person-circle"></i>

                        <?= htmlspecialchars($_SESSION['user']['name'] ?? 'Administrador'); ?>

                    </span>

                </li>


                <!-- MENU TRÊS PONTOS -->

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        title="Menu">

                        <i class="bi bi-three-dots-vertical fs-5"></i>

                    </a>


                    <!-- OPÇÕES DO MENU -->

                    <ul class="dropdown-menu dropdown-menu-end shadow">


                        <!-- CLIENTES -->

                        <li>

                            <a
                                class="dropdown-item"
                                href="index.php?controller=clients">

                                <i class="bi bi-people-fill me-2 text-primary"></i>

                                Clientes

                            </a>

                        </li>


                        <!-- SERVIÇOS -->

                        <li>

                            <a
                                class="dropdown-item"
                                href="index.php?controller=services">

                                <i class="bi bi-scissors me-2 text-warning"></i>

                                Serviços

                            </a>

                        </li>


                        <!-- AGENDAMENTOS -->

                        <li>

                            <a
                                class="dropdown-item"
                                href="index.php?controller=appointments">

                                <i class="bi bi-calendar-check me-2 text-success"></i>

                                Agendamentos

                            </a>

                        </li>


                        <!-- FATURAMENTO -->

                        <li>

                            <a
                                class="dropdown-item"
                                href="index.php?controller=revenue">

                                <i class="bi bi-cash-coin me-2 text-success"></i>

                                Faturamento

                            </a>

                        </li>


                        <!-- LINHA SEPARADORA -->

                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <!-- SAIR -->

                        <li>

                            <a
                                class="dropdown-item text-danger"
                                href="index.php?controller=login&action=logout">

                                <i class="bi bi-box-arrow-right me-2"></i>

                                Sair

                            </a>

                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </div>

</nav>


<div class="container mt-4">