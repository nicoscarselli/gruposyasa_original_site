<?php
/**
 * @var Project $project
 * @var Project[] $related_projects
 */
?>

<!-- Description and related -->
<section class="container">
	<div class="row">
		<div class="col-12">
			<h2 class="subtitle"><?= $project->name; ?></h2>
			<span class="separator"></span>
		</div>
	</div>

	<div class="row">
		<!-- Project description -->
		<div class="col-12 col-md-10 blue-text">
			<?= $project->description; ?>
		</div>
	</div>
</section>

<!-- Related Projects -->
<section class="container-fluid secondary-section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="subtitle"><?= localized('related_projects'); ?></h2>
				<span class="separator"></span>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="projects-gallery owl-carousel">
					<?php foreach ( $related_projects as $related_project ): ?>
						<?php
						$project_url = site_url('proyectos/proyecto/' . $related_project->id);
						if ( !empty($_GET['c']) ) $project_url .= '?c=' . $this->input->get('c');
						?>

						<div class="item carousel-project-item">
							<div class="image">
								<a href="<?= $project_url ?>">
									<img src="<?= base_url() . $related_project->image_url(); ?>" class="img-fluid"/>
								</a>
							</div>
							<div class="title">
								<a href="<?= $project_url; ?>">
									<?= $related_project->name; ?>
								</a>
							</div>
							<div class="categories">
								<ul>
									<?php foreach ( $related_project->categories as $category ): ?>
										<li>- <?= $category->localize('name'); ?></li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Photo gallery -->
<section class="container-fluid grey-section">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="subtitle"><?= localized('photo_gallery'); ?></h2>
				<span class="separator"></span>
			</div>
		</div>

		<!-- Images gallery -->
		<div class="row">
			<div class="col-12">
				<div class="photos-gallery owl-carousel">
					<?php foreach ( $project_media as $media ): ?>
						<div class="item">
							<?php if ( is_a($media, Project_image::class) ): ?>
								<a href="<?= project_files_image($project->id, $media->file); ?>"
								   data-lightbox="project_images">
									<img src="<?= project_files_image($project->id, $media->file); ?>"
										 title="<?= $project->name . '-' . $media->id; ?>"/>
								</a>
							<?php else: ?>
								<video src="<?= project_files_image($project->id, $media->file); ?>" controls
									   controlsList="nodownload"
									   style="width: 100%"></video>
							<?php endif; ?>

						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Info table and map -->
<section class="container">
	<div class="row">
		<!-- Project info table -->
		<div class="col-12 col-md-6">
			<div class="project-info-table">
				<div class="row">
					<div class="title col-12"><?= $project->name; ?></div>
				</div>
				<div class="info row">
					<span class="key col-6"><?= localized('project_region_id'); ?></span>
					<span class="value col-6"><?= $project->localize('region_name'); ?></span>
				</div>
				<div class="info row">
					<span class="key col-6"><?= localized('project_code'); ?></span>
					<span class="value col-6"><?= $project->code; ?></span>
				</div>
				<div class="info row">
					<span class="key col-6"><?= localized('project_location'); ?></span>
					<span class="value col-6"><?= $project->location; ?></span>
				</div>
				<div class="info row">
					<span class="key col-6"><?= localized('project_client'); ?></span>
					<span class="value col-6"><?= $project->client; ?></span>
				</div>
				<div class="info row">
					<span class="key col-6"><?= localized('project_surface'); ?></span>
					<span class="value col-6"><?= $project->surface; ?></span>
				</div>
				<div class="info row">
					<span class="key col-6"><?= localized('project_date_period'); ?></span>
					<span class="value col-6"><?= $project->date_period; ?></span>
				</div>
				<div class="info row">
					<span class="key col-6"><?= localized('project_service_reach'); ?></span>
					<span class="value col-6"><?= $project->service_reach; ?></span>
				</div>
				<div class="info row">
					<span class="key col-6"><?= localized('project_status'); ?></span>
					<span class="value col-6"><?= $project->localize('status_name'); ?></span>
				</div>
				<span class="info row">
                    <span class="key col-6"><?= localized('project_timeframe'); ?></span>
                    <span class="value col-6"><?= $project->timeframe; ?></span>
                </span>
				<span class="info row">
                    <span class="key col-6"><?= localized('project_contracting_system'); ?></span>
                    <span class="value col-6"><?= $project->contracting_system; ?></span>
                </span>
				<span class="info row">
                    <span class="key col-6"><?= localized('project_address'); ?></span>
                    <span class="value col-6"><?= $project->address; ?></span>
                </span>
			</div>
		</div>

		<!-- Project map -->
		<div class="col-12 col-md-6">
			<?php if ( !empty($project->address) ): ?>
				<iframe
						width="100%"
						height="450"
						frameborder="0" style="border:0"
						src="https://www.google.com/maps/embed/v1/place?key=<?= config_item('google_maps_api_key'); ?>&q=<?= $project->address; ?>"
						allowfullscreen>
				</iframe>
			<?php endif; ?>
		</div>
	</div>
</section>