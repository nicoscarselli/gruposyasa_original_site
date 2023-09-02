<?php
/**
 * @var News[] $news
 */
?>

<section class="container">
    <div class="row">
        <div class="col-12">
            <span class="table-title">Noticias</span>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col text-right">
            <a href="<?= site_url('admin/news_form'); ?>" class="btn">Nuevo</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped news-table">
                <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Fecha</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach ($news as $item): ?>
                    <tr>
                        <td><?= $item->title; ?></td>
                        <td><?= $item->date; ?></td>
                        <td class="text-right">
                            <a href="<?= site_url('admin/news_form/' . $item->id); ?>" class="btn">Editar</a>
                            <a href="#" class="btn delete-btn" data-id="<?= $item->id; ?>">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
