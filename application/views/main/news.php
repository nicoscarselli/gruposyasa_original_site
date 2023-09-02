<?php
/**
 * @var News[] $news
 */
?>

<section class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="subtitle"><?= localized('news_main_title'); ?></h2>
            <span class="separator"></span>
        </div>
    </div>

    <div class="row">
        <?php foreach ($news as $item): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="news-item">
                    <div class="image">
                        <img src="<?= $item->image(); ?>" class="img-fluid" />
                    </div>
                    <div class="date"><?= localized('date'); ?>: <?= $item->date; ?></div>
                    <div class="title"><?= $item->title; ?></div>
                    <div class="button">
                        <a href="<?= $item->file(); ?>" target="_blank">
                            <?= localized('view_pdf'); ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>