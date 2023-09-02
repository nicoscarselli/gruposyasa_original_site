<?php
/**
 * @var stdClass[] $logs
 */
?>

<div class="container">
    <div class="row">
        <div class="col-12 mb-5">
            <span class="form-title">Logs</span>
        </div>
        <div class="col">
            <table class="table table-striped" id="logs-table">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Acción</th>
                        <th>Fecha</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($logs as $log): ?>
                        <tr>
                            <td><?= $log->user_email; ?></td>
                            <td><?= $log->action; ?></td>
                            <td><?= $log->date; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
