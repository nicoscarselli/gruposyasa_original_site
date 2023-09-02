<!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?= images_folder('logos/logo.png'); ?>" alt="" class="logo">
      </a>

      <div>
        <!-- .navbar -->
        <nav id="navbar" class="navbar">
          <a href="<?= base_url() . 'es' . uri_string(); ?>" class="langflags"><img src="<?= images_folder('icons/es.png'); ?>" alt="Español" /></a>
          <a href="<?= base_url() . 'en' . uri_string(); ?>" class="langflags"><img src="<?= images_folder('icons/en.png'); ?>" alt="English" /></a>
          <a href="https://gruposyasa.com/home/" class="btn-siges">Siges</a>

          <!-- .Menu -->
          <div id="menuToggle">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
            <ul id="menu" class="align-items-center">
              <li><a href="<?= site_url(); ?>">Home</a></li>
              <li><a href="<?= site_url('nosotros'); ?>"><?= localized('what_we_do');?></a></li>
              <li><a href="<?= site_url('proyectos'); ?>"><?= localized('projects'); ?></a></li>
              <li><a href="<?= site_url('noticias'); ?>"><?= localized('news'); ?></a></li>
              <li><a href="<?= site_url('oportunidades_laborales'); ?>"><?= localized('job_opportunities'); ?></a></li>
              <li><a href="https://gruposyasa.com/home/" class="btn btn-primary btn-siges-mobile">Siges</a></li>
            </ul>
          </div>
          <!-- .Menu -->
        </nav><!-- .navbar -->
  
      </div>
    </div>
  </header><!-- End Header -->