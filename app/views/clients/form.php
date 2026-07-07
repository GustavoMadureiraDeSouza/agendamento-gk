<?php require 'app/views/layout/header.php'; ?>

<div class="hero">
    <h2><?= $client ? '✏ Editar Cliente' : '👤 Novo Cliente'; ?></h2>
    <p>Cadastre ou atualize as informações do cliente.</p>
</div>

<div class="card p-4">

<form method="POST" action="index.php?controller=clients&action=<?= $client ? 'update' : 'store'; ?>">

    <?php if ($client): ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($client['id']); ?>">
    <?php endif; ?>

    <div class="mb-3">
        <label class="form-label">Nome do Cliente</label>
        <input class="form-control"
               type="text"
               name="name"
               required
               value="<?= htmlspecialchars($client['name'] ?? ''); ?>">
    </div>

    <div class="mb-3">
        <label class="form-label">Telefone</label>
        <input class="form-control"
               type="text"
               name="phone"
               required
               value="<?= htmlspecialchars($client['phone'] ?? ''); ?>">
    </div>

    <div class="mb-4">
        <label class="form-label">E-mail</label>
        <input class="form-control"
               type="email"
               name="email"
               required
               value="<?= htmlspecialchars($client['email'] ?? ''); ?>">
    </div>

    <button class="btn btn-primary">
        💾 Salvar Cliente
    </button>

    <a class="btn btn-secondary"
       href="index.php?controller=clients">

        Cancelar

    </a>

</form>

</div>

<?php require 'app/views/layout/footer.php'; ?>