<?php require 'app/views/layout/header.php'; ?>

<div class="hero">
    <h2>✂️ Gestão de Serviços</h2>
    <p>Cadastre e gerencie todos os serviços oferecidos pela barbearia.</p>
</div>

<div class="page-header justify-content-end">

    <a class="btn btn-success"
       href="index.php?controller=services&action=create">

        ➕ Novo Serviço

    </a>

</div>

<div class="card p-4">

<table class="table table-hover align-middle">

    <thead>

        <tr>

            <th>#</th>

            <th>Serviço</th>

            <th>Descrição</th>

            <th>Valor</th>

            <th width="130" class="text-center">Ações</th>

        </tr>

    </thead>

    <tbody>

    <?php foreach ($services as $service): ?>

        <tr>

            <td><?= htmlspecialchars($service['id']); ?></td>

            <td>

                <i class="bi bi-scissors text-warning"></i>

                <strong><?= htmlspecialchars($service['name']); ?></strong>

            </td>

            <td>

                <?= htmlspecialchars($service['description']); ?>

            </td>

            <td>

                <span class="badge bg-success">

                    <i class="bi bi-cash-coin"></i>

                    R$ <?= number_format($service['price'], 2, ',', '.'); ?>

                </span>

            </td>

            <td class="text-center">

                <div class="d-flex justify-content-center gap-2">

                    <a
                        href="index.php?controller=services&action=edit&id=<?= $service['id']; ?>"
                        class="btn btn-outline-warning btn-sm"
                        title="Editar">

                        <i class="bi bi-pencil-fill"></i>

                    </a>

                    <a
                        href="index.php?controller=services&action=delete&id=<?= $service['id']; ?>"
                        class="btn btn-outline-danger btn-sm"
                        title="Excluir"
                        onclick="return confirm('Deseja realmente excluir este serviço?')">

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