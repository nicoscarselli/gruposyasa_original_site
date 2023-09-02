<?php
/**
 * @var Project[] $projects
 */
?>

<section class="container">
    <div class="row">
        <div class="col-12">
            <span class="table-title">Proyectos</span>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col text-right">
            <a href="<?= site_url('admin/project_form'); ?>" class="btn">Nuevo</a>
			<a href="<?= base_url('pdfs/creacion_de_proyectos.pdf'); ?>" target="_blank" class="btn">Ayuda</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped projects-table">
                <thead>
                <tr>
                    <th>Obra</th>
                    <th>Region</th>
                    <th>Código</th>
                    <th>Status</th>
                    <th>Creado</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $project->name; ?></td>
                    <td><?= $project->localize('region_name'); ?></td>
                    <td><?= $project->code; ?></td>
                    <td><?= $project->localize('status_name'); ?></td>
                    <td><?= $project->created_date; ?></td>
                    <td class="text-right">
                        <a href="<?= site_url('admin/project_form/' . $project->id); ?>" class="btn">Editar</a>
                        <a href="#" class="btn delete-btn" data-id="<?= $project->id; ?>">Borrar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>