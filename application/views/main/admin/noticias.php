<?php
/**
 * @var News[] $news
 */
?>

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= images_folder('header_noticias.png'); ?>');">
    <div class="container position-relative d-flex flex-column align-items-center">
           <h2>Noticias</h2>
    </div>
</div>
<!-- End Breadcrumbs -->


<section class="container">

    <div class="row mb-5">
        <div class="col text-right">
            <a href="<?= site_url('admin/news_form'); ?>" class="btn-primary">Nuevo</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-hover news-table">
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
                            <a href="<?= site_url('admin/news_form/' . $item->id); ?>" class="btn btn-success">Editar</a>
                            <a href="#" class="btn btn-danger" data-id="<?= $item->id; ?>">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
