<?php
/**
 * @var User $user
 * @var Project[] $projects
 */
?>

<section class="container">
	<div class="row">
		<div class="col-12 table-title"><?= $title; ?></div>
	</div>

	<div class="row">
		<div class="col-12">Usuario: <?= $user->email; ?></div>
	</div>

	<hr class="my-3">

	<div class="row mb-4">
		<div class="col-12">
			<form action=""  method="POST">
				<div class="form-group">
					<label for="project_id">Proyecto:</label>
					<select class="form-control select2" id="project_id" name="project_id">
						<?php foreach ($projects as $project): ?>
							<option value="<?= $project->id; ?>">
								<?= $project->name . ' (' . $project->code . ')'; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Asignar</button>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-12 table-title">Proyectos Asignados</div>
		<div class="col-12">
			<table class="table table-striped">
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
								<a href="<?= site_url('admin/remove_user_project/' . $user->id  . '/' . $project->id); ?>">Quitar</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</section>