<?php require 'app/views/layout/header.php'; ?>

<div class="hero">
    <h2><?= $appointment ? '📅 Editar Agendamento' : '➕ Novo Agendamento'; ?></h2>
    <p>Cadastre e organize os horários de atendimento da barbearia.</p>
</div>

<div class="card p-4">

<form method="POST" action="index.php?controller=appointments&action=<?= $appointment ? 'update' : 'store'; ?>">

    <?php if ($appointment): ?>

        <input
            type="hidden"
            name="id"
            value="<?= htmlspecialchars($appointment['id']); ?>">

    <?php endif; ?>


    <!-- CLIENTE E SERVIÇO -->

    <div class="row">

        <div class="col-md-6 mb-3">

            <label class="form-label">

                <i class="bi bi-person-fill"></i>

                Cliente

            </label>

            <select
                class="form-select"
                name="client_id"
                required>

                <option value="">
                    Selecionar cliente
                </option>

                <?php foreach ($clients as $client): ?>

                    <option
                        value="<?= $client['id']; ?>"

                        <?= isset($appointment['client_id'])
                            && $appointment['client_id'] == $client['id']
                            ? 'selected'
                            : ''; ?>>

                        <?= htmlspecialchars($client['name']); ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <div class="col-md-6 mb-3">

            <label class="form-label">

                <i class="bi bi-scissors"></i>

                Serviço

            </label>

            <select
                class="form-select"
                name="service_id"
                required>

                <option value="">
                    Selecionar serviço
                </option>

                <?php foreach ($services as $service): ?>

                    <option
                        value="<?= $service['id']; ?>"

                        <?= isset($appointment['service_id'])
                            && $appointment['service_id'] == $service['id']
                            ? 'selected'
                            : ''; ?>>

                        <?= htmlspecialchars($service['name']); ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>

    </div>


    <!-- DATA, HORÁRIO E STATUS -->

    <div class="row">

        <div class="col-md-4 mb-3">

            <label class="form-label">

                <i class="bi bi-calendar-event"></i>

                Data

            </label>

            <input
                class="form-control"
                type="date"
                name="appointment_date"
                required
                value="<?= htmlspecialchars($appointment['appointment_date'] ?? ''); ?>">

        </div>


        <div class="col-md-4 mb-3">

            <label class="form-label">

                <i class="bi bi-clock"></i>

                Horário

            </label>

            <input
                class="form-control"
                type="time"
                name="appointment_time"
                required
                value="<?= htmlspecialchars($appointment['appointment_time'] ?? ''); ?>">

        </div>


        <div class="col-md-4 mb-3">

            <label class="form-label">

                <i class="bi bi-check-circle"></i>

                Status

            </label>

            <?php

                $statusList = [
                    'Aguardando',
                    'Confirmado',
                    'Concluído',
                    'Cancelado'
                ];

                $currentStatus = $appointment['status'] ?? 'Aguardando';

            ?>

            <select
                class="form-select"
                name="status"
                required>

                <?php foreach($statusList as $status): ?>

                    <option
                        value="<?= htmlspecialchars($status); ?>"

                        <?= $currentStatus == $status
                            ? 'selected'
                            : ''; ?>>

                        <?= htmlspecialchars($status); ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>

    </div>


    <!-- BOTÕES -->

    <button
        class="btn btn-success"
        type="submit">

        <i class="bi bi-check-circle"></i>

        Salvar Agendamento

    </button>


    <a
        href="index.php?controller=appointments"
        class="btn btn-secondary">

        Cancelar

    </a>

</form>

</div>

<?php require 'app/views/layout/footer.php'; ?>