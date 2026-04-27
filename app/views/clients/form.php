<?php require 'app/views/layout/header.php'; ?>

<h2><?= $client ? 'Editar Cliente' : 'Novo Cliente'; ?></h2>

<form method="POST" action="index.php?controller=clients&action=<?= $client ? 'update' : 'store'; ?>">
    <?php if ($client): ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($client['id']); ?>">
    <?php endif; ?>

    <label>Nome</label>
    <input type="text" name="name" required value="<?= htmlspecialchars($client['name'] ?? ''); ?>">

    <label>Telefone</label>
    <input type="text" name="phone" required value="<?= htmlspecialchars($client['phone'] ?? ''); ?>">

    <label>E-mail</label>
    <input type="email" name="email" required value="<?= htmlspecialchars($client['email'] ?? ''); ?>">

    <div class="form-actions">
        <button class="btn" type="submit">Salvar</button>
        <a class="btn btn-secondary" href="index.php?controller=clients">Cancelar</a>
    </div>
</form>

<?php require 'app/views/layout/footer.php'; ?>
