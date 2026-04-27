<?php require 'app/views/layout/header.php'; ?>

<div class="page-header">
    <h2>Agendamentos</h2>
    <a class="btn" href="index.php?controller=appointments&action=create">Novo Agendamento</a>
</div>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Serviço</th>
            <th>Data</th>
            <th>Horário</th>
            <th>Status</th>
            <th class="actions">Ações</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($appointments as $appointment): ?>
            <tr>
                <td><?= htmlspecialchars($appointment['id']); ?></td>
                <td><?= htmlspecialchars($appointment['client_name']); ?></td>
                <td><?= htmlspecialchars($appointment['service_name']); ?></td>
                <td><?= date('d/m/Y', strtotime($appointment['appointment_date'])); ?></td>
                <td><?= substr($appointment['appointment_time'], 0, 5); ?></td>
                <td><?= htmlspecialchars($appointment['status']); ?></td>
                <td>
                    <a class="btn btn-warning" href="index.php?controller=appointments&action=edit&id=<?= $appointment['id']; ?>">Editar</a>
                    <a class="btn btn-danger" href="index.php?controller=appointments&action=delete&id=<?= $appointment['id']; ?>" onclick="return confirm('Excluir este agendamento?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php require 'app/views/layout/footer.php'; ?>
