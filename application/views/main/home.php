<!-- ======= Hero Section ======= -->
<div id="hero" class="d-flex flex-column justify-content-center">
	<div class="overlay"></div>
	<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
		<source src="<?= images_folder('syasa_hero_video.mp4'); ?>" type="video/mp4">
	</video>
	<div class="container h-100">
		<div class="d-flex h-100 text-center align-items-center">
			<div class="item-1">
				<h1><?= localized('hero_title'); ?></h1>
				<h2><?= localized('hero_text'); ?></h2>
			</div>
			<div class="item-2">
				<h1><?= localized('hero_title_2'); ?></h1>
				<h2><?= localized('hero_text_2'); ?></h2>
			</div>
			<div class="item-3">
				<h1><?= localized('hero_title_3'); ?></h1>
				<h2><?= localized('hero_text_3'); ?></h2>
			</div>
		</div>
	</div>
	<div class="social-icons">
		<a href="https://www.instagram.com/grupo.syasa/" class="instagram" target="_blank"><i class="bi bi-instagram"></i></a>
		<a href="https://www.linkedin.com/company/syasa/" class="linkedin" target="_blank"><i class="bi bi-linkedin"></i></i></a>
		<a href="https://www.youtube.com/@grupo_syasa" class="youtube" target="_blank"><i class="bi bi-youtube"></i></i></a>
	</div>
</div>
<!-- Hero -->
<main id="main">
	<!-- ======= Nosotros Section ======= -->
	<section id="nosotros" class="nosotros section-bg-primary-light">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-4 col-md-6 d-flex align-items-center">
					<div class="content" data-aos="fade-up">
						<h3 class="text-uppercase"><?= localized('quienes_somos_title'); ?></h3>
						<p><?= localized('quienes_somos_text'); ?></p>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<img src="<?= images_folder('nosotros/nosotros_img_1.png'); ?>" alt="Grupo Syasa" class="img-fluid" data-aos="fade-up" data-aos-delay="200">
				</div>
			</div>
		</div>
	</section>
	<!-- ======= Nosotros Section ======= -->
	<!-- ======= Que hacemos Section ======= -->
	<section class="section-bg-default">
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-lg-12 align-items-center" >
					<h3 class="text-white" data-aos="fade-up"><?= localized('que_hacemos_title'); ?></h3>
				</div>
			</div>
		</div>
	</section>
	<!-- ======= Que hacemos Section ======= -->

	<!-- ======= Services Section ======= -->
	<section class="services">
		<div class="container">
			<div class="row mb-5">
				<div class="col-lg-12">
					<h3 class="text-uppercase"><?= localized('servicios_main_title'); ?></h3>
				</div>
			</div>
			<div class="row gy-4">
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
					<div class="card-item">
						<div class="row">
							<div class="col-xl-4 col-md-4">
								<div class="card-bg" style="background-image: url(<?= images_folder('nosotros/img_construction_man.png'); ?>);"></div>
							</div>
							<div class="col-xl-8 col-md-8 d-flex align-items-center">
								<div class="card-body">
									<h4 class="card-title"><?= localized('servicio_1_title'); ?></h4>
									<p><?= localized('servicio_1_text'); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Card Item -->
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
					<div class="card-item">
						<div class="row">
							<div class="col-xl-4 col-md-4">
								<div class="card-bg" style="background-image: url(<?= images_folder('nosotros/img_leed.png'); ?>);"></div>
							</div>
							<div class="col-xl-8 col-md-8 d-flex align-items-center">
								<div class="card-body">
									<h4 class="card-title"><?= localized('servicio_2_title'); ?></h4>
									<p><?= localized('servicio_2_text'); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Card Item -->
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
					<div class="card-item">
						<div class="row">
							<div class="col-xl-4 col-md-4">
								<div class="card-bg" style="background-image: url(<?= images_folder('nosotros/img_due.png'); ?>);"></div>
							</div>
							<div class="col-xl-8 col-md-8 d-flex align-items-center">
								<div class="card-body">
									<h4 class="card-title"><?= localized('servicio_3_title'); ?></h4>
									<p><?= localized('servicio_3_text'); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Card Item -->
				<div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
					<div class="card-item">
						<div class="row">
							<div class="col-xl-4 col-md-4">
								<div class="card-bg" style="background-image: url(<?= images_folder('nosotros/img_pre_const.png'); ?>);"></div>
							</div>
							<div class="col-xl-8 col-md-8 d-flex align-items-center">
								<div class="card-body">
									<h4 class="card-title"><?= localized('servicio_4_title'); ?></h4>
									<p><?= localized('servicio_4_text'); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Card Item -->
			</div>
		</div>
	</section>
	<!-- End services Section -->

	<!-- ======= valores Section ======= -->
	<section id="valores" class="valores section-bg-default">
		<div class="container" >
			<div class="row mb-5">
				<div class="col-lg-12">
					<h3 class="text-white text-uppercase"><?= localized('valores_main_title'); ?></h3>
				</div>
			</div>
			<div class="row gy-4">
				<div class="col-lg-4 col-md-6">
					<div class="service-item position-relative" data-aos="fade-up" data-aos-delay="100">
						<div class="icon">
							<i class="fa-solid fa-shield-halved"></i>
						</div>
						<h3><?= localized('valores_1_title'); ?></h3>
						<p><?= localized('valores_1_text'); ?></p>
					</div>
				</div>
				<!-- End Service Item -->
				<div class="col-lg-4 col-md-6">
					<div class="service-item position-relative" data-aos="fade-up" data-aos-delay="200">
						<div class="icon">
							<i class="fa-solid fa-medal"></i>
						</div>
						<h3><?= localized('valores_2_title'); ?></h3>
						<p><?= localized('valores_2_text'); ?></p>
					</div>
				</div>
				<!-- End Service Item -->
				<div class="col-lg-4 col-md-6">
					<div class="service-item position-relative" data-aos="fade-up" data-aos-delay="300">
						<div class="icon">
							<i class="fa-solid fa-user-check"></i>
						</div>
						<h3><?= localized('valores_3_title'); ?></h3>
						<p><?= localized('valores_3_text'); ?></p>
					</div>
				</div>
				<!-- End Service Item -->
				<div class="col-lg-4 col-md-6">
					<div class="service-item position-relative" data-aos="fade-up" data-aos-delay="400">
						<div class="icon">
							<i class="fa-solid fa-user-group"></i>
						</div>
						<h3><?= localized('valores_4_title'); ?></h3>
						<p><?= localized('valores_4_text'); ?></p>
					</div>
				</div>
				<!-- End Service Item -->
				<div class="col-lg-4 col-md-6">
					<div class="service-item position-relative" data-aos="fade-up" data-aos-delay="500">
						<div class="icon">
							<i class="fa-solid fa-screwdriver-wrench"></i>
						</div>
						<h3><?= localized('valores_5_title'); ?></h3>
						<p><?= localized('valores_5_text'); ?></p>
					</div>
				</div>
				<!-- End Service Item -->
				<div class="col-lg-4 col-md-6">
					<div class="service-item position-relative" data-aos="fade-up" data-aos-delay="600">
						<div class="icon">
							<i class="fa-solid fa-globe-americas"></i>
						</div>
						<h3><?= localized('valores_6_title'); ?></h3>
						<p><?= localized('valores_6_text'); ?></p>
					</div>
				</div>
				<!-- End Service Item -->
			</div>
		</div>
	</section>
	<!-- End valores Section -->

	<!-- ======= Proyectos Section ======= -->
	<section id="proyectos" class="proyectos">
		<div class="container">
			<div class="row mb-5">
				<div class="col-12 text-center">
					<h3 class="text-uppercase"><?= localized('proyectos_destacados'); ?></h3>
				</div>
			</div>
			<div class="row portfolio-container">
				<div class="owl-theme owl-carousel proyectos_destacados">
					<?php foreach($projects_outstanding as $project){ ?>
						<div class="item">
							<div class="portfolio-content">
								<img src="https://www.gruposyasa.com/webpagedemo/project_files/<?php echo $project->id; echo '/'; echo $project->main_image;?>" 
									class="img-fluid" alt="">
								<div class="portfolio-info">
									<div>
										<h4><?php echo json_decode($project->categories[0]->name)->es; ?></h4>
									</div>
									<p><?= $project->name; ?></p>
									<a class="ver-mas" href="<?= site_url('proyectos/proyecto/'.$project->id); ?>"><?= localized('ver_detalles'); ?></a>
								</div>
							</div>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</section>

	<div id="filtro_proyectos" class="mb-5">
		<div class="container">
			<div class="row mb-5">
				<div class="col-12 text-center">
				<h3 class="text-uppercase"><?= localized('proyectos_syasa'); ?></h3>
				</div>
			</div>
			<div class="row justify-content-center mb-5 proyectos">
				<!-- Search bar -->
				<div class="col-lg-6 col-12">
					<div class="input-group">
						<input type="text" class="form-control search-control" name="search" id="search" />
						<span class="input-group-btn">
							<button class="btn btn-secondary search-button" type="button">
								<span class="bi bi-search"></span>
							</button>
						</span>
					</div>
				</div>
				<!-- Search bar -->
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-2 col-md-3 col-6 text-center mb-3" data-aos="fade-up">
					<a href="https://www.gruposyasa.com/webpagedemo/es/proyectos/region/1"><img src="<?= images_folder('proyectos/paises/argentina.svg'); ?>" alt="" class="mb-3 w-50"></a>
					<h5><?= localized('argentina'); ?></h5>
				</div>
				<div class="col-lg-2 col-md-3 col-6 text-center mb-3" data-aos="fade-up" data-aos-delay="100">
					<a href="https://www.gruposyasa.com/webpagedemo/es/proyectos/region/2"><img src="<?= images_folder('proyectos/paises/mexico.svg'); ?>" alt="" class="mb-3 w-50"></a>
					<h5><?= localized('mexico'); ?></h5> 
				</div>
				<div class="col-lg-2 col-md-3 col-6 text-center mb-3" data-aos="fade-up" data-aos-delay="200">
					<a href="https://www.gruposyasa.com/webpagedemo/es/proyectos/region/3"><img src="<?= images_folder('proyectos/paises/panama.svg'); ?>" alt="" class="mb-3 w-50"></a>
					<h5><?= localized('panama'); ?></h5> 
				</div>
				<div class="col-lg-2 col-md-3 col-6 text-center mb-3" data-aos="fade-up" data-aos-delay="300">
					<a href="https://www.gruposyasa.com/webpagedemo/es/proyectos/region/4"><img src="<?= images_folder('proyectos/paises/otros.svg'); ?>" alt="" class="mb-3 w-50"></a>
					<h5><?= localized('otro_pais'); ?></h5> 
				</div>
			</div>
		</div>
		<div class="container proyectos proyectos_por_tipo mt-5">
			<div class="row mb-4">
				<div class="col-12 text-center">
					<h4 class="text-uppercase" data-aos="fade-up"><?= localized('tipo_de_proyecto'); ?></h4>
				</div>
			</div>
			<div class="row">
				<div class="col-lg- col-md-4 mb-3">
					<div class="proyectos_por_tipo" data-aos="fade-up">
						<img src="<?= images_folder('proyectos/tipos/aeropuertos.png'); ?>" class="img-fluid" alt="">
						<div class="proyectos_por_tipo-info">
							<a href="https://www.gruposyasa.com/webpagedemo/es/proyectos/categoria/1"><h5><?= localized('aeropuertos'); ?></h5></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-3">
					<div class="proyectos_por_tipo" data-aos="fade-up" data-aos-delay="100">
						<img src="<?= images_folder('proyectos/tipos/bancarios.png'); ?>" class="img-fluid" alt="">
						<div class="proyectos_por_tipo-info">
							<a href="https://www.gruposyasa.com/webpagedemo/es/proyectos/categoria/2"><h5><?= localized('bancarios'); ?></h5></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-3">
					<div class="proyectos_por_tipo" data-aos="fade-up" data-aos-delay="200">
						<img src="<?= images_folder('proyectos/tipos/centros_comerciales.png'); ?>" class="img-fluid" alt="">
						<div class="proyectos_por_tipo-info">
							<a href="https://www.gruposyasa.com/webpagedemo/es/proyectos/categoria/3"><h5><?= localized('centros'); ?></h5></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-3">
					<div class="proyectos_por_tipo" data-aos="fade-up" data-aos-delay="300">
						<img src="<?= images_folder('proyectos/tipos/hospitales.png'); ?>" class="img-fluid" alt="">
						<div class="proyectos_por_tipo-info">
							<a href="https://www.gruposyasa.com/webpagedemo/es/proyectos/categoria/4"><h5><?= localized('hospitales'); ?></h5></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-3">
					<div class="proyectos_por_tipo" data-aos="fade-up" data-aos-delay="400">
						<img src="<?= images_folder('proyectos/tipos/hoteles.png'); ?>" class="img-fluid" alt="">
						<div class="proyectos_por_tipo-info">
							<a href="https://www.gruposyasa.com/webpagedemo/es/proyectos/categoria/5"><h5><?= localized('hoteles'); ?></h5></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-3">
					<div class="proyectos_por_tipo" data-aos="fade-up" data-aos-delay="500">
						<img src="<?= images_folder('proyectos/tipos/leed.png'); ?>" class="img-fluid" alt="">
						<div class="proyectos_por_tipo-info">
							<a href="https://www.gruposyasa.com/webpagedemo/es/proyectos/categoria/6"><h5><?= localized('leed'); ?></h5></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-3">
					<div class="proyectos_por_tipo" data-aos="fade-up" data-aos-delay="600">
						<img src="<?= images_folder('proyectos/tipos/oficinas.png'); ?>" class="img-fluid" alt="">
						<div class="proyectos_por_tipo-info">
							<a href="https://www.gruposyasa.com/webpagedemo/es/proyectos/categoria/7"><h5><?= localized('oficinas'); ?></h5></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-3">
					<div class="proyectos_por_tipo" data-aos="fade-up" data-aos-delay="700">
						<img src="<?= images_folder('proyectos/tipos/residenciales.png'); ?>" class="img-fluid" alt="">
						<div class="proyectos_por_tipo-info">
							<a href="https://www.gruposyasa.com/webpagedemo/es/proyectos/categoria/8"><h5><?= localized('residenciales'); ?></h5></a>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 mb-3">
					<div class="proyectos_por_tipo" data-aos="fade-up" data-aos-delay="800">
						<img src="<?= images_folder('proyectos/tipos/otros.png'); ?>" class="img-fluid" alt="">
						<div class="proyectos_por_tipo-info">
							<a href="https://www.gruposyasa.com/webpagedemo/es/proyectos/categoria/9"><h5><?= localized('otros'); ?></h5></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End proyectos Section -->

	<!-- ======= Recent Blog Posts Section ======= -->
	<?php /** @var News[] $news **/ ?>
	<section id="news-posts" class="section-bg-secondary-light news-posts">
		<div class="container">
			<div class="row justify-content-between align-items-center mb-5">
				<div class="col-lg-6 col-6">
					<h3 class="text-uppercase"><?= localized('noticias_main_title'); ?></h3>
				</div>
				<div class="col-lg-6 col-6 d-flex justify-content-end">
					<a class="btn btn-primary" href="<?= site_url('noticias'); ?>"><?= localized('ver_mas_boton'); ?></a>
				</div>
			</div>
			<div class="row gy-5">
				<div class="owl-carousel owl-theme news">
					<?php foreach ($news as $item): ?>  
					<div class="item">
						<div class="post-item position-relative h-100">
							<div class="post-img position-relative overflow-hidden">
								<img src="<?= $item->image(); ?>" class="img-fluid" />
								<span class="post-date"><?= localized('date'); ?>: <?= $item->date; ?></span>
							</div>
							<div class="post-content d-flex flex-column">
								<h3 class="post-title"><?= $item->title; ?></h3>
								<a href="<?= $item->file(); ?>" class="readmore stretched-link" target="_blank"><?= localized('view_pdf'); ?></a>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<!-- End Recent Blog Posts Section -->

	<!-- ======= Oportunidades Section ======= -->
	<?php
		/**
		 * @var Traduccion[] $translations
		 * @var Idioma $language
		 * @var Gender[] $genders
		 * @var Country[] $countries
		 * @var State[] $states
		 * @var Title[] $titles
		 * @var Job_area[] $job_areas
		 * @var Currency[] $currencies
		 */
		
		/**
		 * @param $code
		 * @param Idioma $language
		 * @param Traduccion[] $translations
		 * @return string
		 */
		
		 function translated($code, $language, $translations) {
		  if (empty($translations)) die('No translations');
		
		  foreach ($translations as $translation) {
		      if ($translation->codigo_traduccion == $code
		          && $translation->id_idioma == $language->id_idioma) {
		          return $translation->descripcion;
		      }
		  }
		
		  return '';
		}
		?>
	<script>
		var states = [
		    <?php foreach ($states as $state): ?>
		    {
		        id_recper_pais: <?= $state->id_recper_pais; ?>,
		        id_recper_provincia: <?= $state->id_recper_provincia; ?>,
		        nombre: "<?= translated($state->codigo_traduccion, $language, $translations); ?>"
		    },
		    <?php endforeach; ?>
		];
		
		var countries = [
		    <?php foreach ($countries as $country): ?>
		        <?= json_encode($country); ?>,
		    <?php endforeach; ?>
		];
	</script>
	<?php if (!empty(validation_errors()) || isset($error)): ?>
	<div class="row">
		<div class="col alert alert-danger">
			<?php if (!empty(validation_errors())) echo validation_errors();  ?>
			<?php if (isset($error)) echo $error; ?>
		</div>
	</div>
	<?php endif; ?>
	<section id="oportunidades" class="job_opportunities">
		<div class="container">
			<?php if (!isset($thank_you)): ?>
			<div class="row php-email-form justify-content-center">
				<div class="col-lg-3">
         			<div class="content">
						<h3 class="text-uppercase"><?= localized('oportunidades_main_title'); ?></h3>
						<p><?= localized('oportunidades_text'); ?></p>
					</div>
				</div>
				<div class="col-lg-9">
					<?= form_open_multipart('', ['id' => 'jobs-form']); ?>
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								<label for="nombre"><?= localized('job_opps_first_name'); ?></label>
								<input type="text" name="nombre" id="nombre" class="form-control" value="<?= set_value('nombre'); ?>" />
							</div>
							<div class="form-group">
								<label for="apellido"><?= localized('job_opps_last_name'); ?></label>
								<input type="text" name="apellido" id="apellido" class="form-control" value="<?= set_value('apellido'); ?>" />
							</div>
							<div class="form-group">
								<label for="email"><?= localized('job_opps_email'); ?></label>
								<input type="email" name="email" id="email" class="form-control" value="<?= set_value('email'); ?>" />
							</div>
							<div class="form-group">
								<label for="fechanacimiento"><?= localized('job_opps_birthday'); ?></label>
								<input type="text" name="fechanacimiento" id="fechanacimiento" class="form-control" value="<?= set_value('fechanacimiento'); ?>" />
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								<label for="id_recper_sexo"><?= localized('job_opps_gender'); ?></label>
								<select class="form-select" id="id_recper_sexo" name="id_recper_sexo">
									<?php foreach ($genders as $gender): ?>
									<option value="<?= $gender->id_recper_sexo; ?>" <?= set_radio('id_recper_sexo', $gender->id_recper_sexo, ($gender->id_recper_sexo == 1)); ?> />
										<?= translated($gender->codigo_traduccion, $language, $translations); ?>
									</option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="id_recper_pais"><?= localized('job_opps_country'); ?></label>
								<select class="form-select" id="id_recper_pais" name="id_recper_pais">
									<?php foreach ($countries as $country): ?>
									<option value="<?= $country->id_recper_pais; ?>" data-currency-id="<?= $country->id_recper_moneda; ?>" <?= set_select('id_recper_pais', $country->id_recper_pais); ?>>
										<?= translated($country->codigo_traduccion, $language, $translations); ?>
									</option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="id_recper_provincia"><?= localized('job_opps_state'); ?></label>
								<select class="form-control select2" id="id_recper_provincia" name="id_recper_provincia"></select>
							</div>


							<div class="form-group">
								<label for="telefono"><?= localized('job_opps_phone'); ?></label>
								<input type="text" class="form-control" id="telefono" name="telefono" value="<?= set_value('telefono'); ?>" />
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="form-group">
								<label for="id_recper_areatrabajo"><?= localized('job_opps_job_area'); ?></label>
								<select class="form-control select2" name="id_recper_areatrabajo" id="id_recper_areatrabajo">
									<?php foreach ($job_areas as $area): ?>
									<option value="<?= $area->id_recper_areatrabajo; ?>" <?= set_select('id_recper_areatrabajo', $area->id_recper_areatrabajo); ?>>
										<?= translated($area->codigo_traduccion, $language, $translations); ?>
									</option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="id_recper_titulo"><?= localized('job_opps_job_title'); ?></label>
								<select class="form-control select2" name="id_recper_titulo" id="id_recper_titulo">
									<?php foreach ($titles as $title): ?>
										<option value="<?= $title->id_recper_titulo; ?>" <?= set_select('id_recper_titulo', $title->id_recper_titulo); ?>>
											<?= translated($title->codigo_traduccion, $language, $translations); ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label for="id_recper_moneda"><?= localized('job_opps_salary'); ?></label>
								<div class="row">
									<div class="col-lg-6 col-4">
										<select class="form-control select2" name="id_recper_moneda" id="id_recper_moneda">
											<?php foreach ($currencies as $currency): ?>
											<option value="<?= $currency->id_recper_moneda; ?>" <?= set_select('id_recper_moneda', $currency->id_recper_moneda); ?>>
												<?= translated($currency->codigo_traduccion, $language, $translations); ?>
											</option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-lg-6 col-8">
										<input type="text" class="col form-control" name="monto" id="monto" value="<?= set_value('monto'); ?>" />
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="id_recper_areatrabajo"><?= localized('job_opps_cv'); ?></label>
								<input type="file" name="cv" id="cv" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-8 col-md-6">
							<div class="form-group">
								<label>
								<input type="checkbox" id="dispext" name="dispext" value="1" />
								<?= localized('job_opps_work_abroad'); ?>
								</label>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 d-flex justify-content-end">
							<div class="form-group">
								<button class="btn btn-primary"><?= localized('job_opps_submit'); ?></button>
							</div>
						</div>
					</div>
					<?= form_close(); ?>
				</div>
			</div>
			<?php else: //$thank_you isset?>
			<div class="row">
				<div class="col-lg-12">
					<h2 class="thank-you-header"><?= localized('job_opps_thank_you_header'); ?></h2>
					<p class="thank-you-text"><?= localized('job_opps_thank_you_text'); ?></p>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</section>
	<!-- End Oportunidades Section -->
</main>
<!-- End #main -->