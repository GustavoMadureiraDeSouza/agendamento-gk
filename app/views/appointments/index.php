<?php require 'app/views/layout/header.php'; ?>

<div class="hero">
    <h2>📅 Gestão de Agendamentos</h2>
    <p>Organize os horários e acompanhe todos os atendimentos da barbearia.</p>
</div>

<div class="page-header justify-content-end">

    <a class="btn btn-success"
       href="index.php?controller=appointments&action=create">

        ➕ Novo Agendamento

    </a>

</div>

<div class="card p-4">

<table class="table table-hover align-middle">

    <thead>

        <tr>

            <th>#</th>

            <th>Cliente</th>

            <th>Serviço</th>

            <th>Data</th>

            <th>Hora</th>

            <th>Status</th>

            <th width="130" class="text-center">Ações</th>

        </tr>

    </thead>

    <tbody>

    <?php foreach ($appointments as $appointment): ?>

        <tr>

            <td><?= htmlspecialchars($appointment['id']); ?></td>

            <td>
                <i class="bi bi-person-circle text-primary"></i>
                <strong><?= htmlspecialchars($appointment['client_name']); ?></strong>
            </td>

            <td>
                <i class="bi bi-scissors text-warning"></i>
                <?= htmlspecialchars($appointment['service_name']); ?>
            </td>

            <td>
                <?= date('d/m/Y', strtotime($appointment['appointment_date'])); ?>
            </td>

            <td>
                <?= substr($appointment['appointment_time'],0,5); ?>
            </td>

            <td>

                <?php

                $status = strtolower($appointment['status']);

                if($status == 'agendado' || $status == 'scheduled'){
                    echo '<span class="badge bg-success">Agendado</span>';
                }elseif($status == 'confirmado'){
                    echo '<span class="badge bg-primary">Confirmado</span>';
                }elseif($status == 'cancelado' || $status == 'cancelled'){
                    echo '<span class="badge bg-danger">Cancelado</span>';
                }elseif($status == 'aguardando'){
                    echo '<span class="badge bg-secondary">Aguardando</span>';
                }else{
                    echo '<span class="badge bg-dark">'.htmlspecialchars($appointment['status']).'</span>';
                }

                ?>

            </td>

            <td class="text-center">

                <div class="d-flex justify-content-center gap-2">

                    <a
                        href="index.php?controller=appointments&action=edit&id=<?= $appointment['id']; ?>"
                        class="btn btn-outline-warning btn-sm"
                        title="Editar">

                        <i class="bi bi-pencil-fill"></i>

                    </a>

                    <a
                        href="index.php?controller=appointments&action=delete&id=<?= $appointment['id']; ?>"
                        class="btn btn-outline-danger btn-sm"
                        title="Excluir"
                        onclick="return confirm('Deseja realmente excluir este agendamento?')">

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