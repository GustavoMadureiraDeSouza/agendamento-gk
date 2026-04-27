<?php require 'app/views/layout/header.php'; ?>

<h2><?= $appointment ? 'Edit Appointment' : 'New Appointment'; ?></h2>

<form method="POST" action="index.php?controller=appointments&action=<?= $appointment ? 'update' : 'store'; ?>">
    <?php if ($appointment): ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($appointment['id']); ?>">
    <?php endif; ?>

    <label>Cliente</label>
    <select name="client_id" required>
        <option value="">Selecionar cliente</option>
        <?php foreach ($clients as $client): ?>
            <option value="<?= $client['id']; ?>"
                <?= isset($appointment['client_id']) && $appointment['client_id'] == $client['id'] ? 'selected' : ''; ?>>
                <?= htmlspecialchars($client['name']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Serviço</label>
    <select name="service_id" required>
        <option value="">Selecionar serviço</option>
        <?php foreach ($services as $service): ?>
            <option value="<?= $service['id']; ?>"
                <?= isset($appointment['service_id']) && $appointment['service_id'] == $service['id'] ? 'selected' : ''; ?>>
                <?= htmlspecialchars($service['name']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Data</label>
    <input type="date" name="appointment_date" required value="<?= htmlspecialchars($appointment['appointment_date'] ?? ''); ?>">

    <label>Horário</label>
    <input type="time" name="appointment_time" required value="<?= htmlspecialchars($appointment['appointment_time'] ?? ''); ?>">

    <label>Status</label>
    <select name="status" required>
        <?php
            $statusList = ['Aguardando', 'Confirmado', 'Canceledo'];
            $currentStatus = $appointment['status'] ?? 'Scheduled';
        ?>

        <?php foreach ($statusList as $status): ?>
            <option value="<?= $status; ?>" <?= $currentStatus === $status ? 'selected' : ''; ?>>
                <?= $status; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <div class="form-actions">
        <button class="btn" type="submit">Salvar</button>
        <a class="btn btn-secondary" href="index.php?controller=appointments">Cancelar</a>
    </div>
</form>

<?php require 'app/views/layout/footer.php'; ?>
