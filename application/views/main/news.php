<?php
/**
 * @var News[] $news
 */
?>

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= images_folder('header_noticias.png'); ?>');">
    <div class="container position-relative d-flex flex-column align-items-center">
           <h2><?= localized('news_main_title'); ?></h2>
    </div>
</div>
<!-- End Breadcrumbs -->

<section id="recent-blog-posts" class="recent-blog-posts">
    <div class="container">
        <div class="row gy-5">
            <?php foreach ($news as $item): ?>
            <div class="col-xl-4 col-md-6">
            
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
            
            </div><!-- End post item -->
            <?php endforeach; ?>
        </div>
    </div>
</section>