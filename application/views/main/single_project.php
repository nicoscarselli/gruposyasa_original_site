<?php
	/**
	 * @var Project $project
	 * @var Project[] $related_projects
	 */
	?>
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center text-center" style="background-image: url('<?= project_files_image($project->id, $project->main_image); ?>');">
	<div class="container position-relative align-items-center">
		<h2><?= $project->name; ?></h2>
		<a href="<?= site_url(); ?>">Home</a> / <a href="<?= site_url('#proyectos'); ?>"><?= localized('projects'); ?></a>
	</div>
</div>
<!-- End Breadcrumbs -->
<!-- Photo gallery -->
<section class="proyecto-interno">
	<div class="container">
		<!-- Images gallery + Project Info -->
		<div class="row justify-content-between">
			<!-- Gallery -->
			<div class="col-lg-6">
				<div class="owl-carousel owl-theme photos-gallery">
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
							style="width: 100%">
						</video>
						<?php endif; ?>
					</div>
					<?php endforeach; ?>
				</div>
				<!-- Project map -->
				<div class="map mt-4">
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
			<!-- Info -->
			<div class="col-lg-5">
				<!-- Project description -->
				<div class="mb-4">
					<?= $project->description; ?>
				</div>
				<!-- Info -->
				<div class="project-info-table">
					<div class="info">
						<h6><?= localized('project_region_id'); ?></h6>
						<p><?= $project->localize('region_name'); ?></p>
					</div>
					<div class="info">
						<h6><?= localized('project_client'); ?></h6>
						<p><?= $project->client; ?></p>
					</div>
					<div class="info">
						<h6><?= localized('project_surface'); ?></h6>
						<p><?= $project->surface; ?></p>
					</div>
					<div class="info">
						<h6><?= localized('project_date_period'); ?></h6>
						<p><?= $project->date_period; ?></p>
					</div>
					<div class="info">
						<h6><?= localized('project_service_reach'); ?></h6>
						<p><?= $project->service_reach; ?></p>
					</div>
					<div class="info">
						<h6><?= localized('project_location'); ?></h6>
						<p><?= $project->location; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Related Projects -->
<section id="proyectos" class="proyectos section-bg-secondary-light">
	<div class="container">
		<div class="row mb-5">
			<div class="col-12">
				<h2><?= localized('related_projects'); ?></h2>
			</div>
		</div>
		<div class="row portfolio-container">
			<div class="owl-theme owl-carousel">
				<?php foreach ( $related_projects as $related_project ): ?>
				<?php
					$project_url = site_url('proyectos/proyecto/' . $related_project->id);
					if ( !empty($_GET['c']) ) $project_url .= '?c=' . $this->input->get('c');
					?>
				<div class="item carousel-project-item">
					<div class="portfolio-content">
						<img src="<?= base_url() . $related_project->image_url(); ?>" class="img-fluid" alt="">
						<div class="portfolio-info">
							<?php foreach ( $related_project->categories as $category ): ?>
							<h4><?= $category->localize('name'); ?></h4>
							<?php endforeach; ?>
							<p><?= $related_project->name; ?></p>
							<a class="ver-mas" href="<?= $project_url ?>">Ver detalles</a>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>