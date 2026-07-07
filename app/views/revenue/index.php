<?php require 'app/views/layout/header.php'; ?>

<!-- CABEÇALHO -->

<div class="mb-4">

    <h2 class="fw-bold mb-1">

        <i class="bi bi-cash-coin text-success"></i>
        Faturamento

    </h2>

    <p class="text-muted mb-0">

        Acompanhe os resultados financeiros da sua barbearia.

    </p>

</div>


<!-- CARDS -->

<div class="row g-4 mb-4">


    <!-- FATURAMENTO DO MÊS -->

    <div class="col-md-6">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-2">
                            Faturamento do mês
                        </p>

                        <h2 class="fw-bold mb-0">

                            R$ <?= number_format($faturamentoMes, 2, ',', '.'); ?>

                        </h2>

                    </div>

                    <div>

                        <i class="bi bi-cash-coin text-success fs-1"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- ATENDIMENTOS CONCLUÍDOS -->

    <div class="col-md-6">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <p class="text-muted mb-2">
                            Atendimentos concluídos
                        </p>

                        <h2 class="fw-bold mb-0">

                            <?= $totalConcluidos ?>

                        </h2>

                    </div>

                    <div>

                        <i class="bi bi-check-circle-fill text-primary fs-1"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- HISTÓRICO DE FATURAMENTO -->

<div class="card border-0 shadow-sm p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">

                <i class="bi bi-receipt text-success"></i>

                Histórico de Atendimentos

            </h4>

            <small class="text-muted">

                Serviços concluídos e contabilizados no faturamento.

            </small>

        </div>

    </div>


    <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Cliente</th>

                    <th>Serviço</th>

                    <th>Data</th>

                    <th>Valor</th>

                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

            <?php if(count($atendimentos) > 0): ?>


                <?php foreach($atendimentos as $atendimento): ?>

                    <tr>

                        <td>

                            <?= htmlspecialchars($atendimento['id']); ?>

                        </td>


                        <td>

                            <i class="bi bi-person-circle text-primary me-1"></i>

                            <strong>

                                <?= htmlspecialchars($atendimento['cliente']); ?>

                            </strong>

                        </td>


                        <td>

                            <i class="bi bi-scissors text-warning me-1"></i>

                            <?= htmlspecialchars($atendimento['servico']); ?>

                        </td>


                        <td>

                            <?= date(
                                'd/m/Y',
                                strtotime($atendimento['appointment_date'])
                            ); ?>

                        </td>


                        <td>

                            <strong class="text-success">

                                R$ <?= number_format(
                                    $atendimento['price'],
                                    2,
                                    ',',
                                    '.'
                                ); ?>

                            </strong>

                        </td>


                        <td>

                            <span class="badge bg-success">

                                <i class="bi bi-check-circle"></i>

                                Concluído

                            </span>

                        </td>

                    </tr>

                <?php endforeach; ?>


            <?php else: ?>


                <tr>

                    <td colspan="6"
                        class="text-center py-5 text-muted">

                        <i class="bi bi-receipt fs-1 d-block mb-2"></i>

                        Nenhum atendimento concluído até o momento.

                    </td>

                </tr>


            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>


<?php require 'app/views/layout/footer.php'; ?>