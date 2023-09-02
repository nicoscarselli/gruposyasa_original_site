<nav class="navbar navbar-expand-lg">
    <a href="<?= site_url(); ?>" class="navbar-brand">
        <img src="<?= images_folder('logos/syasa.png'); ?>" />
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar-content">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url(); ?>"><?= localized('home'); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('admin/proyectos'); ?>">Proyectos</a>
            </li>
            <?php if ($this->session->user_type == User::USER_TYPE_SUPERADMIN): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('admin/noticias'); ?>">Noticias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('admin/usuarios'); ?>">Usuarios</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('login/logout'); ?>">Salir</a>
            </li>
        </ul>
    </div>
</nav>