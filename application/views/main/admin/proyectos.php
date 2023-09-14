<?php
/**
 * @var Project[] $projects
 */
?>

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= images_folder('header_proyectos.png'); ?>');">
    <div class="container position-relative d-flex flex-column align-items-center">
           <h2>Proyectos</h2>
    </div>
</div>
<!-- End Breadcrumbs -->

<section class="container">

    <div class="row mb-5">
        <div class="col text-right">
            <a href="<?= site_url('admin/project_form'); ?>" class="btn-primary">Nuevo</a>
			<a href="<?= base_url('pdfs/creacion_de_proyectos.pdf'); ?>" target="_blank" class="btn-primary">Ayuda</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-hover projects-table">
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
                        <a href="<?= site_url('admin/project_form/' . $project->id); ?>" class="btn btn-success">Editar</a>
                        <a href="#" class="btn btn-danger" data-id="<?= $project->id; ?>">Borrar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>