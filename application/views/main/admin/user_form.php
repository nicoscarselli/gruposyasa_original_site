<?php
/**
 * @var User $user
 * @var bool $edit
 * @var User_type[] $user_types
 */
?>

<script>
    var user_id = <?= ($edit) ? $user->id : 0; ?>;
</script>

<section class="container user-form">
    <div class="row">
        <div class="col-12">
            <span class="form-title"><?= ($edit) ? 'Editar Usuario: ' . $user->email : 'Nuevo Usuario'; ?></span>
        </div>
    </div>

    <?php if (!empty(validation_errors())): ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger"><?= validation_errors(); ?></div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger"><?= $error; ?></div>
            </div>
        </div>
    <?php endif; ?>

    <?= form_open('', ['id' => 'user-form']); ?>
        <?php if ($edit): ?>
            <input type="hidden" name="id" value="<?= $user->id; ?>" />
        <?php endif; ?>

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email', ($edit) ? $user->email : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="user_type">Tipo</label>
                    <select class="form-control" name="user_type" id="user_type">
                        <?php foreach ($user_types as $type): ?>
                            <option value="<?= $type->id; ?>" <?= set_select('user_type', $type->id, ($edit && $user->user_type == $type->id)); ?>>
                                <?= $type->type; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input class="form-control" type="password" name="password" id="password" />
                </div>

                <div class="form-group">
                    <label for="repeat_password">Repetir contraseña</label>
                    <input class="form-control" type="password" name="repeat_password" id="repeat_password" />
                </div>
            </div>
        </div>

        <hr />

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-success" id="save-button">Guardar</button>
                <a href="<?= site_url('admin/usuarios'); ?>" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    <?= form_close(); ?>
</section>
