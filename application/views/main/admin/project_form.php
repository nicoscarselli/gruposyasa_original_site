<?php
/**
 * @var Project $project
 * @var bool $edit
 * @var Project_region[] $regions
 * @var Project_status[] $status
 * @var Project_category[] $categories
 */
?>

<script>
    var project_id = <?= ($edit) ? $project->id : 0; ?>;
</script>

<section class="container project-form">
    <div class="row">
        <div class="col-12">
            <span class="form-title"><?= ($edit) ? 'Editar Proyecto: ' . $project->name : 'Nuevo Proyecto'; ?></span>
        </div>
    </div>

    <?php if (!empty(validation_errors())): ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger"><?= validation_errors(); ?></div>
        </div>
    </div>
    <?php endif; ?>

	<?php if (!empty($error)): ?>
		<div class="row">
			<div class="col-12">
				<div class="alert alert-danger"><?= $error; ?></div>
			</div>
		</div>
	<?php endif; ?>

    <?= form_open('', ['id' => 'project-form']); ?>
    <?php if ($edit): ?>
        <input type="hidden" name="id" value="<?= $project->id; ?>" />
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="name"><?= localized('project_name'); ?></label>
                <input type="text" class="form-control" name="name" id="name"
                       value="<?= set_value('name', ($edit) ? $project->name : ''); ?>"/>
            </div>

            <div class="form-group">
                <label for="region_id"><?= localized('project_region_id'); ?></label>
                <select class="form-control" name="region_id" id="region_id">
                    <?php foreach ($regions as $region): ?>
                        <option value="<?= $region->id; ?>" <?= set_select('region_id', $region->id, ($edit && $project->region_id == $region->id) ? true : false); ?>>
                            <?= $region->localized_name(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="code"><?= localized('project_code'); ?></label>
                <input type="text" class="form-control" name="code" id="code"
                       value="<?= set_value('code', ($edit) ? $project->code : ''); ?>" />
            </div>

            <div class="form-group">
                <label for="location"><?= localized('project_location'); ?></label>
                <textarea class="form-control" name="location" id="location"><?= set_value('location', ($edit) ? $project->location : ''); ?></textarea>
            </div>

            <div class="form-group">
                <label for="client"><?= localized('project_client'); ?></label>
                <textarea class="form-control" name="client" id="client"><?= set_value('client', ($edit) ? $project->client : ''); ?></textarea>
            </div>

            <div class="form-group">
                <label for="surface"><?= localized('project_surface'); ?></label>
                <input type="text" class="form-control" name="surface" id="surface"
                       value="<?= set_value('surface', ($edit) ? $project->surface : ''); ?>" />
            </div>

            <div class="form-group">
                <label for="date_period"><?= localized('project_date_period'); ?></label>
                <input type="text" class="form-control" name="date_period" id="date_period"
                       value="<?= set_value('date_period', ($edit) ? $project->date_period : ''); ?>"  />
            </div>

            <div class="form-group">
                <label for="service_reach"><?= localized('project_service_reach'); ?></label>
                <textarea class="form-control" name="service_reach" id="service_reach"><?= set_value('service_reach', ($edit) ? $project->service_reach : ''); ?></textarea>
            </div>

            <div class="form-group">
                <label for="status"><?= localized('project_status'); ?></label>
                <select class="form-control" name="status" id="status">
                    <?php foreach ($status as $project_status): ?>
                        <option value="<?= $project_status->id; ?>" <?= set_select('project_status', $project_status->id, ($edit && $project->status_id == $project_status->id) ? true: false); ?>>
                            <?= $project_status->localized_name(); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="timeframe"><?= localized('project_timeframe'); ?></label>
                <textarea class="form-control" name="timeframe" id="timeframe"><?= set_value('timeframe', ($edit) ? $project->timeframe : ''); ?></textarea>
            </div>

            <div class="form-group">
                <label for="contracting_system"><?= localized('project_contracting_system'); ?></label>
                <textarea class="form-control" name="contracting_system" id="contracting_system"><?= set_value('contracting_system', ($edit) ? $project->contracting_system : ''); ?></textarea>
            </div>

            <div class="form-group">
                <label for="cost"><?= localized('project_cost'); ?></label>
                <input class="form-control" type="text" id="cost" name="cost" value="<?= set_value('cost', ($edit) ? $project->cost : ''); ?>" />
            </div>

            <div class="form-group">
                <label for="address"><?= localized('project_address'); ?></label>
                <input class="form-control" type="text" maxlength="255" id="address" name="address" value="<?= set_value('address', ($edit) ? $project->address : ''); ?>" />
            </div>

            <div class="form-group">
                <label for="description"><?= localized('project_description'); ?></label>
                <textarea class="form-control summernote" name="description" id="description"><?= set_value('description', ($edit) ? $project->description : ''); ?></textarea>
            </div>
        </div>
    </div>

    <hr />

    <div class="row">
        <div class="col-12">
            <span class="section-title">Categorías del Proyecto</span>
        </div>

        <div class="col-12">
            <ul class="list-unstyled">
                <?php foreach ($categories as $category): ?>
                    <li>
                        <input type="checkbox" name="project_categories[]"
                               value="<?= $category->id; ?>" <?= (!empty($project) && $project->has_category($category->id)) ? 'checked' : ''; ?>/>
                        <?= $category->localized_name(); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <hr />

    <?php if ($edit): ?>
    <div class="row">
        <div class="col-12 mb-5">
            <span class="section-title">Imágenes/Videos del Proyecto</span>
        </div>

        <div class="col-12" id="project-images-list">
            <?php foreach ( $project_media as $media): ?>
                <?php $main_image = ($project->main_image == $media->file); ?>
                <div class="row image-row mb-3" id="image-<?= $media->id; ?>" data-order="<?= $media->order; ?>">
                    <div class="<?= (is_a($media, Project_video::class) ? 'video' : 'image'); ?> col-3">
						<?php if (is_a($media, Project_video::class)): ?>
							<video src="<?= base_url() . $media->video_url(); ?>" controls class="img-fluid"></video>
						<?php else: ?>
                        	<img src="<?= base_url() . $media->image_url(); ?>" class="img-fluid"/>
						<?php endif; ?>
                    </div>
                    <div class="order col-3">
                        # <span class="image-order-display"><?= $media->order; ?></span>
                        <button class="btn btn-primary increase-priority-button" data-image-id="<?= $media->id; ?>" data-type="<?= (is_a($media, Project_video::class) ? 'video' : 'image'); ?>">Bajar</button>
                        <button class="btn btn-danger decrease-priority-button" data-image-id="<?= $media->id; ?>" data-type="<?= (is_a($media, Project_video::class) ? 'video' : 'image'); ?>"
								style="display: <?= ($media->order > 1) ? 'inline-block' : 'none'; ?>;">Subir</button>
                    </div>
                    <div class="main-button col-3">
                        <?php if ($main_image): ?>
                            Principal
                        <?php elseif (is_a($media, Project_image::class)): ?>
                            <button class="btn btn-info set-main-image-button" data-image-id="<?= $media->id; ?>">Hacer principal</button>
                        <?php endif; ?>
                    </div>
                    <div class="delete col-3">
                        <button class="btn btn-danger delete-image-button"
								data-image-id="<?= $media->id; ?>" data-image-name="<?= $media->file; ?>" data-type="<?= (is_a($media, Project_video::class) ? 'video' : 'image'); ?>">Borrar</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <div class="dropzone">
                    <div class="dz-message">Haz click o arrastra archivos aquí</div>
                </div>
            </div>
        </div>
    </div>

    <hr />
    <?php endif; ?>

    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-success" id="save-button">Guardar</button>
            <a href="<?= site_url('admin/proyectos'); ?>" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
    <?= form_close(); ?>
</section>

<?php $this->load->view('main/admin/widgets/logs', [
    'logs' => $logs
]); ?>
