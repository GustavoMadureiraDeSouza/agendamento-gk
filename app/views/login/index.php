<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Login - BarberPro</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body class="bg-dark d-flex justify-content-center align-items-center vh-100">

<div class="card shadow-lg p-5" style="width:420px; border-radius:20px;">

    <div class="text-center mb-4">

        <i class="bi bi-scissors text-warning" style="font-size:60px;"></i>

        <h2 class="mt-3">BarberPro</h2>

        <p class="text-muted">
            Sistema de Gestão para Barbearias
        </p>

    </div>

    <?php if(isset($_GET['error'])): ?>

        <div class="alert alert-danger">

            Usuário ou senha inválidos.

        </div>

    <?php endif; ?>

    <form action="index.php?controller=login&action=auth" method="POST">

        <div class="mb-3">

            <label class="form-label">

                Usuário

            </label>

            <input
                type="text"
                name="username"
                class="form-control"
                required>

        </div>

        <div class="mb-4">

            <label class="form-label">

                Senha

            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                required>

        </div>

        <button class="btn btn-warning w-100">

            <i class="bi bi-box-arrow-in-right"></i>

            Entrar

        </button>

    </form>

</div>

</body>

</html>