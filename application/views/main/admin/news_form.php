<?php
/**
 * @var News $news
 * @var bool $edit
 */
?>

<script>
    var news_id = <?= ($edit) ? $news->id : 0; ?>;
</script>

<section class="container news-form">
    <div class="row">
        <div class="col-12">
            <span class="form-title"><?= ($edit) ? 'Editar Noticia: ' . $news->title : ''; ?></span>
        </div>
    </div>

    <?php if (!empty(validation_errors())): ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger"><?= validation_errors(); ?></div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger"><?= $errors; ?></div>
            </div>
        </div>
    <?php endif; ?>

    <?= form_open_multipart('', ['id' => 'news-form']); ?>
        <?php if ($edit): ?>
            <input type="hidden" name="id" value="<?= $news->id; ?>" />
        <?php endif; ?>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="title"><?= localized('news_title'); ?></label>
                    <input type="text" class="form-control" name="title" id="title"
                           value="<?= set_value('title', ($edit) ? $news->title : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="date"><?= localized('news_date'); ?></label>
                    <input type="text" class="form-control" name="date" id="date"
                           placeholder="yyyy-mm-dd" value="<?= set_value('date', ($edit) ? $news->date : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="file"><?= localized('news_file'); ?></label>
                    <input type="file" class="form-control" name="file" id="file"
                           value="<?= set_value('file', ($edit) ? $news->file : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="image"><?= localized('news_image'); ?></label>
                    <input type="file" class="form-control" name="image" id="image"
                           value="<?= set_value('image', ($edit) ? $news->image : ''); ?>" />
                </div>
            </div>
        </div>

        <hr/>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-success" id="save-button">Guardar</button>
                <a href="<?= site_url('admin/noticias'); ?>" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    <?= form_close(); ?>
</section>

<?php $this->load->view('main/admin/widgets/logs', [
    'logs' => $logs
]); ?>