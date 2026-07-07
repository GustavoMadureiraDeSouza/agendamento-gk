<?php require 'app/views/layout/header.php'; ?>

<div class="hero">
    <h2><?= $service ? '✏️ Editar Serviço' : '➕ Novo Serviço'; ?></h2>
    <p>Cadastre ou atualize os serviços oferecidos pela barbearia.</p>
</div>

<div class="card p-4">

<form method="POST" action="index.php?controller=services&action=<?= $service ? 'update' : 'store'; ?>">

    <?php if ($service): ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($service['id']); ?>">
    <?php endif; ?>

    <div class="row">

        <div class="col-md-6 mb-3">

            <label class="form-label">
                <i class="bi bi-scissors"></i> Nome do Serviço
            </label>

            <input
                class="form-control"
                type="text"
                name="name"
                required
                value="<?= htmlspecialchars($service['name'] ?? ''); ?>">

        </div>

        <div class="col-md-6 mb-3">

            <label class="form-label">
                <i class="bi bi-cash-coin"></i> Preço
            </label>

            <input
                class="form-control"
                type="number"
                name="price"
                step="0.01"
                min="0"
                required
                value="<?= htmlspecialchars($service['price'] ?? ''); ?>">

        </div>

    </div>

    <div class="mb-4">

        <label class="form-label">
            <i class="bi bi-card-text"></i> Descrição
        </label>

        <textarea
            class="form-control"
            name="description"
            rows="4"><?= htmlspecialchars($service['description'] ?? ''); ?></textarea>

    </div>

    <button class="btn btn-success">
        <i class="bi bi-check-circle"></i>
        Salvar Serviço
    </button>

    <a href="index.php?controller=services"
       class="btn btn-secondary">

        Cancelar

    </a>

</form>

</div>

<?php require 'app/views/layout/footer.php'; ?>