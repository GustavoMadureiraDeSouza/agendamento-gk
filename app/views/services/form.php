<?php require 'app/views/layout/header.php'; ?>

<h2><?= $service ? 'Editar Serviço' : 'Novo Serviço'; ?></h2>

<form method="POST" action="index.php?controller=services&action=<?= $service ? 'update' : 'store'; ?>">
    <?php if ($service): ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($service['id']); ?>">
    <?php endif; ?>

    <label>Nome</label>
    <input type="text" name="name" required value="<?= htmlspecialchars($service['name'] ?? ''); ?>">

    <label>Descrição</label>
    <textarea name="description" rows="4"><?= htmlspecialchars($service['description'] ?? ''); ?></textarea>

    <label>Preço</label>
    <input type="number" name="price" step="0.01" min="0" required value="<?= htmlspecialchars($service['price'] ?? ''); ?>">

    <div class="form-actions">
        <button class="btn" type="submit">Salvar</button>
        <a class="btn btn-secondary" href="index.php?controller=services">Cancelar</a>
    </div>
</form>

<?php require 'app/views/layout/footer.php'; ?>
