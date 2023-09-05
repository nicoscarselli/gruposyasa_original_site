<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center">
    <!-- .Menu -->
    <div class="hamburger-menu">
        <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
        <span></span>
        </label>
        <ul class="menu__box">
            <li><a class="menu__item" href="<?= site_url(); ?>">Home</a></li>
            <li><a class="menu__item" href="<?= site_url('nosotros'); ?>"><?= localized('about_us');?></a></li>
            <li><a class="menu__item" href="<?= site_url('proyectos'); ?>"><?= localized('projects'); ?></a></li>
            <li><a class="menu__item" href="<?= site_url('noticias'); ?>"><?= localized('news'); ?></a></li>
            <li><a class="menu__item" href="<?= site_url('oportunidades_laborales'); ?>"><?= localized('job_opportunities'); ?></a></li>
            <li><a class="menu__item btn btn-primary btn-siges-mobile" href="https://gruposyasa.com/home/">Siges</a></li>
        </ul>
    </div>
    <!-- .Menu -->
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
            </nav>
            <!-- .navbar -->
        </div>
    </div>
</header>
<!-- End Header -->