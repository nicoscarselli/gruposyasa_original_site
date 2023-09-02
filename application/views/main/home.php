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