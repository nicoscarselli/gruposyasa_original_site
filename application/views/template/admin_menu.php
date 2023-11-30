<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center">
    <!-- .Menu -->
    <div class="hamburger-menu">
        <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
        <span></span>
        </label>
        <ul class="menu__box">
            <li><a class="menu__item" href="<?= site_url('admin'); ?>"><?= localized('home'); ?></a></li>
            <li><a class="menu__item" href="<?= site_url('admin/proyectos'); ?>">Proyectos</a></li>
            <?php if ($this->session->user_type == User::USER_TYPE_SUPERADMIN): ?>
            <li><a class="menu__item" href="<?= site_url('admin/noticias'); ?>">Noticias</a></li>
            <li><a class="menu__item" href="<?= site_url('admin/usuarios'); ?>">Usuarios</a></li>
            <?php endif; ?>
            <li><a class="menu__item" href="<?= site_url('login/logout'); ?>">Salir</a></li>
        </ul>
    </div>
    <!-- .Menu -->
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <a href="<?= site_url(); ?>" class="logo d-flex align-items-center">
        <img src="<?= images_folder('logos/logo.png'); ?>" alt="" class="logo">
        </a>
    </div>
</header>
<!-- End Header -->