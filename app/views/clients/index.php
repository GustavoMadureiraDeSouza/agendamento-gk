<?php require 'app/views/layout/header.php'; ?>

<div class="page-header">
    <h2>Clientes</h2>
    <a class="btn" href="index.php?controller=clients&action=create">Novo Cliente</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Celular</th>
            <th>E-mail</th>
            <th class="actions">Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= htmlspecialchars($client['id']); ?></td>
                <td><?= htmlspecialchars($client['name']); ?></td>
                <td><?= htmlspecialchars($client['phone']); ?></td>
                <td><?= htmlspecialchars($client['email']); ?></td>
                <td>
                    <a class="btn btn-warning" href="index.php?controller=clients&action=edit&id=<?= $client['id']; ?>">Editar</a>
                    <a class="btn btn-danger" href="index.php?controller=clients&action=delete&id=<?= $client['id']; ?>" onclick="return confirm('Excluir este cliente?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require 'app/views/layout/footer.php'; ?>
