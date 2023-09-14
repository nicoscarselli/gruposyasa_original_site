<?php
/**
 * @var User $user
 * @var Project[] $projects
 */
?>

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= images_folder('header_oportunidades.png'); ?>');">
    <div class="container position-relative d-flex flex-column align-items-center">
           <h2><?= $title; ?></h2>
		   <h4 class="text-white">Usuario: <?= $user->email; ?></h4>
    </div>
</div>
<!-- End Breadcrumbs -->


<section class="container">

	<div class="row justify-content-between mb-4">
		<div class="col-4">
			<form action="" method="POST">
				<div class="form-group mb-4">
					<label for="project_id" class="h5">Proyecto:</label>
					<select class="form-control select2" id="project_id" name="project_id">
						<?php foreach ($projects as $project): ?>
							<option value="<?= $project->id; ?>">
								<?= $project->name . ' (' . $project->code . ')'; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				
				<div class="form-group mb-4">
					<button type="submit" class="btn btn-primary">Asignar</button>
				</div>
			</form>
		</div>

		<div class="col-6">
			<h5>Asignados</h5>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Proyecto</th>
						<th>Código</th>
						<th>&nbsp;</th>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($user_projects as $project): ?>
						<tr>
							<td><?= $project->name; ?></td>
							<td><?= $project->code; ?></td>
							<td>
								<a href="<?= site_url('admin/remove_user_project/' . $user->id  . '/' . $project->id); ?>" class="btn btn-danger">Quitar</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>