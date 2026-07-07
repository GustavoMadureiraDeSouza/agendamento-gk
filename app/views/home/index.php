<?php require 'app/views/layout/header.php'; ?>

<!-- BOAS-VINDAS -->

<div class="mb-4">

    <h2 class="fw-bold mb-1">

        Olá, <?= htmlspecialchars($_SESSION['user']['name'] ?? 'Administrador'); ?> 👋

    </h2>

    <p class="text-muted mb-0">

        Aqui está o resumo da sua barbearia.

    </p>

</div>


<!-- CARDS DO DASHBOARD -->

<div class="row g-4 mb-4">


    <!-- CLIENTES -->

    <div class="col-md-6 col-xl-3">

        <a href="index.php?controller=clients"
           class="text-decoration-none">

            <div class="dashboard-card text-center h-100">

                <div class="mb-3">

                    <i class="bi bi-people-fill text-primary fs-1"></i>

                </div>

                <h2 class="fw-bold text-dark">

                    <?= $totalClientes ?>

                </h2>

                <h5 class="text-dark mb-1">

                    Clientes

                </h5>

                <p class="text-muted mb-0">

                    Clientes cadastrados

                </p>

            </div>

        </a>

    </div>


    <!-- SERVIÇOS -->

    <div class="col-md-6 col-xl-3">

        <a href="index.php?controller=services"
           class="text-decoration-none">

            <div class="dashboard-card text-center h-100">

                <div class="mb-3">

                    <i class="bi bi-scissors text-warning fs-1"></i>

                </div>

                <h2 class="fw-bold text-dark">

                    <?= $totalServicos ?>

                </h2>

                <h5 class="text-dark mb-1">

                    Serviços

                </h5>

                <p class="text-muted mb-0">

                    Serviços disponíveis

                </p>

            </div>

        </a>

    </div>


    <!-- AGENDAMENTOS -->

    <div class="col-md-6 col-xl-3">

        <a href="index.php?controller=appointments"
           class="text-decoration-none">

            <div class="dashboard-card text-center h-100">

                <div class="mb-3">

                    <i class="bi bi-calendar-check-fill text-success fs-1"></i>

                </div>

                <h2 class="fw-bold text-dark">

                    <?= $totalAgendamentos ?>

                </h2>

                <h5 class="text-dark mb-1">

                    Agendamentos

                </h5>

                <p class="text-muted mb-0">

                    Agendamentos cadastrados

                </p>

            </div>

        </a>

    </div>


    <!-- FATURAMENTO -->

    <div class="col-md-6 col-xl-3">

        <a href="index.php?controller=finance"
           class="text-decoration-none">

            <div class="dashboard-card text-center h-100">

                <div class="mb-3">

                    <i class="bi bi-cash-coin text-success fs-1"></i>

                </div>

                <h2 class="fw-bold text-dark">

                    R$ <?= number_format($faturamentoMes, 2, ',', '.'); ?>

                </h2>

                <h5 class="text-dark mb-1">

                    Faturamento

                </h5>

                <p class="text-muted mb-0">

                    Faturamento do mês

                </p>

            </div>

        </a>

    </div>

</div>


<!-- PRÓXIMOS AGENDAMENTOS -->

<div class="card border-0 shadow-sm p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">

                <i class="bi bi-calendar3 text-primary"></i>

                Próximos Agendamentos

            </h4>

            <small class="text-muted">

                Confira os próximos atendimentos da barbearia

            </small>

        </div>


        <a href="index.php?controller=appointments"
           class="btn btn-dark">

            Ver Agenda

            <i class="bi bi-arrow-right ms-1"></i>

        </a>

    </div>


    <div class="table-responsive">

        <table class="table table-hover align-middle mb-0">

            <thead>

                <tr>

                    <th>Cliente</th>

                    <th>Serviço</th>

                    <th>Data</th>

                    <th>Hora</th>

                    <th>Status</th>

                </tr>

            </thead>


            <tbody>

            <?php if(count($proximos) > 0): ?>


                <?php foreach($proximos as $item): ?>

                    <tr>


                        <!-- CLIENTE -->

                        <td>

                            <i class="bi bi-person-circle text-primary me-1"></i>

                            <strong>

                                <?= htmlspecialchars($item['cliente']) ?>

                            </strong>

                        </td>


                        <!-- SERVIÇO -->

                        <td>

                            <i class="bi bi-scissors text-warning me-1"></i>

                            <?= htmlspecialchars($item['servico']) ?>

                        </td>


                        <!-- DATA -->

                        <td>

                            <?= date(
                                'd/m/Y',
                                strtotime($item['appointment_date'])
                            ) ?>

                        </td>


                        <!-- HORÁRIO -->

                        <td>

                            <?= substr(
                                $item['appointment_time'],
                                0,
                                5
                            ) ?>

                        </td>


                        <!-- STATUS -->

                        <td>

                            <?php

                            $status = strtolower($item['status']);

                            if($status == 'agendado' || $status == 'scheduled'){

                                echo '<span class="badge bg-success">Agendado</span>';

                            }elseif($status == 'confirmado'){

                                echo '<span class="badge bg-primary">Confirmado</span>';

                            }elseif($status == 'concluído' || $status == 'concluido'){

                                echo '<span class="badge bg-dark">Concluído</span>';

                            }elseif($status == 'cancelado' || $status == 'cancelled'){

                                echo '<span class="badge bg-danger">Cancelado</span>';

                            }elseif($status == 'aguardando'){

                                echo '<span class="badge bg-secondary">Aguardando</span>';

                            }else{

                                echo '<span class="badge bg-secondary">'
                                    . htmlspecialchars($item['status'])
                                    . '</span>';

                            }

                            ?>

                        </td>

                    </tr>

                <?php endforeach; ?>


            <?php else: ?>


                <tr>

                    <td colspan="5"
                        class="text-center py-5 text-muted">

                        <i class="bi bi-calendar-x fs-1 d-block mb-2"></i>

                        Nenhum agendamento encontrado.

                    </td>

                </tr>


            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>


<?php require 'app/views/layout/footer.php'; ?>