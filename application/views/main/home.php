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
        <div class="row justify-content-between">

          <div class="col-lg-4 d-flex align-items-center" >
            <div class="content">
              <h2><?= localized('nosotros_title'); ?></h2>
              <p><?= localized('nosotros_text'); ?></p>
              <a class="btn btn-primary" href="<?= site_url('nosotros'); ?>"><?= localized('about_us');?></a>
            </div>
          </div>

          <div class="col-lg-6">
            <img src="<?= images_folder('nosotros/nosotros_img_1.png'); ?>" alt="Grupo Syasa" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
    <!-- ======= Nosotros Section ======= -->

    <!-- ======= Proyectos Section ======= -->
    <section id="proyectos" class="proyectos">
      <div class="container">

        <div class="section-header justify-content-between justify-content-start mb-5">
          <div class="row">
            <div class="col-lg-6">
              <h2><?= localized('proyectos_main_title'); ?></h2>
            </div>
            <div class="col-lg-6 d-flex justify-content-end">
            <a class="btn btn-primary" href="<?= site_url('proyectos'); ?>"><?= localized('projects'); ?></a>
            </div>
          </div>
        </div>

        <div class="row gy-4 portfolio-container"  >
          <div class="col-lg-4 col-md-6 portfolio-item ">
            <div class="portfolio-content">
              <img src="assets/img/proyectos/1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>RESIDENCIALES</h4>
                <p>TOREO LIVING</p>
              </div>
            </div>
          </div><!-- End proyectos Item -->
          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-content">
              <img src="<?= images_folder('proyectos/town_square_metepec.png'); ?>" alt="">
              <div class="portfolio-info">
                <h4>CENTROS COMERCIALES</h4>
                <p>Town Square Metepec</p>
                <a class="ver-mas" href="<?= site_url('proyectos/proyecto/142'); ?>">Ver detalles</a>
              </div>
            </div>
          </div><!-- End proyectos Item -->
          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-content">
              <img src="assets/img/proyectos/3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>RESIDENCIALES</h4>
                <p>ARTHA OFICINA DE PRECON</p>
              </div>
            </div>
          </div><!-- End proyectos Item -->
          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-content">
              <img src="assets/img/proyectos/4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>BANCARIOS</h4>
                <p>HSBC CORPORATE BUILDING</p>
              </div>
            </div>
          </div><!-- End proyectos Item -->
          <div class="col-lg-4 col-md-6 portfolio-item ">
            <div class="portfolio-content">
              <img src="assets/img/proyectos/5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>HOTELES</h4>
                <p>FAENA HOTEL & UNIVERSE</p>
              </div>
            </div>
          </div><!-- End proyectos Item -->
          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-content">
              <img src="assets/img/proyectos/6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>EDIFICIOS DE VALOR PATRIMONIAL</h4>
                <p>LOS MOLINOS BUILDINGS & FAENA ART CENTER</p>
              </div>
            </div>
          </div><!-- End proyectos Item -->
        </div>
      </div>
    </section><!-- End proyectos Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <?php /** @var News[] $news **/ ?>
    <section id="recent-blog-posts" class="section-bg-secondary-light recent-blog-posts">
      <div class="container">

      <div class="section-header justify-content-between justify-content-start mb-5">
        <div class="row">
          <div class="col-lg-6">
            <h2><?= localized('noticias_main_title'); ?></h2>
          </div>
          <div class="col-lg-6 d-flex justify-content-end">
            <a class="btn btn-primary" href="<?= site_url('noticias'); ?>"><?= localized('news'); ?></a>
          </div>
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
                    <hr>
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
    <section id="oportunidadeslaborales" class="section text-white" style="background-image: url(<?= images_folder('header_oportunidades.png'); ?>); background-size: cover;">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-lg-6">
            <h4><?= localized('oportunidades_main_title'); ?></h4>
          </div>
          <div class="col-lg-6 d-flex justify-content-end">
            <a class="btn btn-primary" href="<?= site_url('oportunidades_laborales'); ?>"><?= localized('job_opportunities'); ?></a>
          </div>
        </div>
      </div>
    </section><!-- End Oportunidades Section -->

  </main><!-- End #main -->