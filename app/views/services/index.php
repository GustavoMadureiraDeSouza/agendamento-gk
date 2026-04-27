<?php require 'app/views/layout/header.php'; ?>

<div class="page-header">
    <h2>Serviços</h2>
    <a class="btn" href="index.php?controller=services&action=create">Novo Serviço</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th class="actions">Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($services as $service): ?>
            <tr>
                <td><?= htmlspecialchars($service['id']); ?></td>
                <td><?= htmlspecialchars($service['name']); ?></td>
                <td><?= htmlspecialchars($service['description']); ?></td>
                <td>R$ <?= number_format($service['price'], 2, ',', '.'); ?></td>
                <td>
                    <a class="btn btn-warning" href="index.php?controller=services&action=edit&id=<?= $service['id']; ?>">Editar</a>
                    <a class="btn btn-danger" href="index.php?controller=services&action=delete&id=<?= $service['id']; ?>" onclick="return confirm('Excluir este serviço?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require 'app/views/layout/footer.php'; ?>
