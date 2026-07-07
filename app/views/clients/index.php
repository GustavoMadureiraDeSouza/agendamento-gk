<?php require 'app/views/layout/header.php'; ?>

<div class="hero">
    <h2>👥 Gestão de Clientes</h2>
    <p>Gerencie todos os clientes cadastrados na sua barbearia.</p>
</div>

<div class="page-header justify-content-end">

    <a href="index.php?controller=clients&action=create"
       class="btn btn-success">

        ➕ Novo Cliente

    </a>

</div>

<div class="card p-4">

<table class="table table-hover align-middle">

    <thead>

        <tr>

            <th>#</th>

            <th>Nome</th>

            <th>Celular</th>

            <th>E-mail</th>

            <th width="130" class="text-center">Ações</th>

        </tr>

    </thead>

    <tbody>

    <?php foreach($clients as $client): ?>

        <tr>

            <td><?= htmlspecialchars($client['id']); ?></td>

            <td>

                <i class="bi bi-person-circle text-primary"></i>

                <strong><?= htmlspecialchars($client['name']); ?></strong>

            </td>

            <td>

                <?= htmlspecialchars($client['phone']); ?>

            </td>

            <td>

                <?= htmlspecialchars($client['email']); ?>

            </td>

            <td class="text-center">

                <div class="d-flex justify-content-center gap-2">

                    <a
                        href="index.php?controller=clients&action=edit&id=<?= $client['id']; ?>"
                        class="btn btn-outline-warning btn-sm"
                        title="Editar">

                        <i class="bi bi-pencil-fill"></i>

                    </a>

                    <a
                        href="index.php?controller=clients&action=delete&id=<?= $client['id']; ?>"
                        class="btn btn-outline-danger btn-sm"
                        title="Excluir"
                        onclick="return confirm('Deseja realmente excluir este cliente?')">

                        <i class="bi bi-trash-fill"></i>

                    </a>

                </div>

            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>

</div>

<?php require 'app/views/layout/footer.php'; ?>